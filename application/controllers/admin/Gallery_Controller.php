<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Gallery_Model','gm');
    }

    public function gallery_list($page = 0,$column=null,$order=null)
    {
        $per_page = "10";
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        }

        if($this->input->post('search')){
            $search = array(
                'media_type'        => trim($this->input->post('media_type')),
                'status'            => $this->input->post('status')
            );

            $this->session->set_userdata('gallery',$search);
        }

        if($this->input->post('reset')){
            $this->session->unset_userdata('gallery');
        }
        $keyword = $this->session->userdata('gallery');

        $total_count = $this->gm->get_gallery($per_page,$page,$keyword,$column,$order,true);
        $data['pagination'] = $this->pagination('gallery',$total_count,$per_page);
        $data['gallery'] = $this->gm->get_gallery($per_page,$page,$keyword,$column,$order);
        $end = (($data['gallery'])?count($data['gallery']):0) + (($page) ? $page : 0);
        $start = (count($data['gallery']) > 0)?($page + 1):0;
        $data['result_count'] = "Showing " . $start . " - " . $end . " of " . $total_count . " Results";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/gallery/gallery_list',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function get_sequence()
    {
        $media_type = $this->input->post('media_type');
        $filter_type = $this->input->post('filter_type');
        $data = $this->gm->get_sequence($media_type,$filter_type);
        echo json_encode($data);
    }

    public function add_gallery()
    {
        if($this->input->post()){
            
            $this->form_validation->set_rules('media_type','Media Type','required');
            $this->form_validation->set_rules('filter_type','Filter Type','required');
            $this->form_validation->set_rules('comment','Comment','required');
            $this->form_validation->set_rules('sequence','Order Preference','required');
            
            $media_type = $this->input->post('media_type');

            if($media_type == 3){
                $this->form_validation->set_rules('youtube_link','YouTube Link','required');
            } elseif($media_type == 2)
            {
                if(empty($_FILES['video']['name'])){
                    $this->form_validation->set_rules('video','Video File','required');
                }
            } elseif($media_type == 1)
            {
                if(empty($_FILES['image']['name'])){
                    $this->form_validation->set_rules('image','Image File','required');
                }
            }

            if($this->form_validation->run()){
                $data_array = array(
                    'media_type'        => $media_type,
                    'filter_type'       => $this->input->post('filter_type'),
                    'media_alt'         => $this->input->post('comment'),
                    'sequence'          => $this->input->post('sequence'),
                    'created_by'        => $this->gm->admin_id()
                );

                if($media_type == 3){
                    $data_array['media_name'] = $this->input->post('youtube_link');
                }
                elseif($media_type == 1)
                {
                    if(!empty($_FILES['image']['name'])){
                        $gallery = $getfilename =  str_replace(' ', '_', $_FILES['image']['name']);
                        $file = pathinfo($gallery);
                        $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                        $data_array['media_name'] = $new_name;
                        $config['upload_path'] = 'assets/images/public/home';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = $new_name;
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if(!$this->upload->do_upload('image')){
                            echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                            exit;
                        } 
                    } 
                    
                } 
                elseif($media_type == 2){
                    if(!empty($_FILES['video']['name'])){
                    $configVideo['upload_path'] = 'assets/images/public/home'; 
                    $configVideo['max_size'] = '102400';
                    $configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
                    $configVideo['overwrite'] = FALSE;
                    $configVideo['remove_spaces'] = TRUE;
                    $gallery = $getfilename =  str_replace(' ', '_', $_FILES['video']['name']);
                    $file = pathinfo($gallery);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['media_video'] = $new_name;
                    $configVideo['file_name'] = $new_name;

                    $this->load->library('upload', $configVideo);
                    $this->upload->initialize($configVideo);
                    if(!$this->upload->do_upload('video')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    } 
                }
                }

                $save = $this->gm->insert_data('tbl_gallery',$data_array);
                // echo $this->db->last_query(); die;
                if($save){
                    echo json_encode(['message' => 'Data updated successfully.', 'status' => 1]);
                } else {
                    echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
                }

            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
            }
            exit;
        }
        $data['gallery'] = '';
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/gallery/add-gallery',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function change_gallery_status()
    {
        $gallery_id = $this->input->post('id');
        $stauts = $this->input->post('status');
        $update = $this->gm->update_data('tbl_gallery',['status' => $stauts],['id' => $gallery_id]);
        if($update){
            echo json_encode(['message' => 'Status changed successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }
    public function delete_media()
    {
        $media_id = $this->input->post('media_id');
        $update = $this->gm->update_data('tbl_gallery',['status' => 2],['id' => $media_id]);
        if($update){
            echo json_encode(['message' => 'Data deleted successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    public function edit_gallery($id)
    {
        if($this->input->post()){
            $this->form_validation->set_rules('media_type','Media Type','required');
            $this->form_validation->set_rules('filter_type','Filter Type','required');
            $this->form_validation->set_rules('comment','Comment','required');
            $this->form_validation->set_rules('sequence','Order Preference','required');
            
            $media_type = $this->input->post('media_type');

            if($media_type == 3){
                $this->form_validation->set_rules('youtube_link','YouTube Link','required');
            } 

            if($this->form_validation->run()){
                $data_array = array(
                    'media_type'        => $media_type,
                    'filter_type'       => $this->input->post('filter_type'),
                    'media_alt'         => $this->input->post('comment'),
                    'sequence'          => $this->input->post('sequence'),
                    'created_by'        => $this->gm->admin_id()
                );

                if($media_type == 3){
                    $data_array['media_name'] = $this->input->post('youtube_link');
                } elseif($media_type == 1)
                {
                    if(!empty($_FILES['image']['name'])){
                        $gallery = $getfilename =  str_replace(' ', '_', $_FILES['image']['name']);
                        $file = pathinfo($gallery);
                        $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                        $data_array['media_name'] = $new_name;
                        $config['upload_path'] = 'assets/images/public/home';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = $new_name;
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if(!$this->upload->do_upload('image')){
                            echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                            exit;
                        } 
                    } 
                    
                } elseif($media_type == 2){
                    if(!empty($_FILES['video']['name'])){
                    $configVideo['upload_path'] = 'assets/images/public/home'; 
                    $configVideo['max_size'] = '102400';
                    $configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
                    $configVideo['overwrite'] = FALSE;
                    $configVideo['remove_spaces'] = TRUE;
                    $gallery = $getfilename =  str_replace(' ', '_', $_FILES['video']['name']);
                    $file = pathinfo($gallery);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['media_video'] = $new_name;
                    $configVideo['file_name'] = $new_name;

                    $this->load->library('upload', $configVideo);
                    $this->upload->initialize($configVideo);
                    if(!$this->upload->do_upload('video')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    } 
                }
                }

                $save = $this->gm->update_data('tbl_gallery',$data_array,['id' => $id]);
                if($save){
                    echo json_encode(['message' => 'Data updated successfully.', 'status' => 1]);
                } else {
                    echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
                }

            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
            }
            exit;
        }
        $data['gallery'] = $this->gm->get_data_row_array('tbl_gallery',"*",['id' => $id]);
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/gallery/add-gallery',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function get_gallery_details()
    {
        $gallery_id = $this->input->post('gallery_id');
        $data = $this->gm->get_data_row_array('tbl_gallery',"media_type, media_name, media_video",['id' => $gallery_id]);
        echo json_encode($data);
    }
}
?>