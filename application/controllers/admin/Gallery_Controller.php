<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Gallery_Model','gm');
    }

    public function gallery_list($page = 0)
    {
        $per_page = "10";
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        }
        $total_count = $this->gm->get_gallery($per_page,$page,true);
        $data['pagination'] = $this->pagination('gallery',$total_count,$per_page);
        $data['gallery'] = $this->gm->get_gallery($per_page,$page);
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

    public function add_gallery()
    {
        if($this->input->post()){
            $this->form_validation->set_rules('media_type','Media Type','required');
            $this->form_validation->set_rules('filter_type','Filter Type','required');
            $this->form_validation->set_rules('comment','Comment','required');
            
            $media_type = $this->input->post('media_type');

            if($media_type == 3){
                $this->form_validation->set_rules('youtube_link','YouTube Link','required');
            } elseif(empty($_FILES['gallery']['name']))
            {
                $this->form_validation->set_rules('gallery','Media File','required');
            }

            if($this->form_validation->run()){
                $data_array = array(
                    'media_type'        => $media_type,
                    'filter_type'       => $this->input->post('filter_type'),
                    'media_alt'         => $this->input->post('comment'),
                    'created_by'        => $this->gm->admin_id()
                );

                if($media_type == 3){
                    $data_array['media_name'] = $this->input->post('youtube_link');
                } elseif(!empty($_FILES['gallery']['name']))
                {
                    if($media_type == 1){
                        $gallery = $getfilename =  str_replace(' ', '_', $_FILES['gallery']['name']);
                        $file = pathinfo($gallery);
                        $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                        $data_array['media_name'] = $new_name;
                        $config['upload_path'] = 'assets/images/admin/gallery';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = $new_name;
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if(!$this->upload->do_upload('gallery')){
                            echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                            exit;
                        } 
                    } elseif($media_type == 2){
                        $configVideo['upload_path'] = 'assets/images/admin/gallery'; 
                        $configVideo['max_size'] = '102400';
                        $configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
                        $configVideo['overwrite'] = FALSE;
                        $configVideo['remove_spaces'] = TRUE;
                        $gallery = $getfilename =  str_replace(' ', '_', $_FILES['gallery']['name']);
                        $file = pathinfo($gallery);
                        $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                        $data_array['media_name'] = $new_name;
                        $configVideo['file_name'] = $new_name;

                        $this->load->library('upload', $configVideo);
                        $this->upload->initialize($configVideo);
                        if(!$this->upload->do_upload('gallery')){
                            echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                            exit;
                        } 
                    }
                    
                }

                $save = $this->gm->insert_data('tbl_gallery',$data_array);
                
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
}
?>