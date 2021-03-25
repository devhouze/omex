<?php
class WhatsNew_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/WhatsNew_Model','wsm');
    }

    public function whats_new($page=0,$column=null,$order=null)
    {
        $per_page = "10";
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        } else {
            $page = 0;
        }  

        if($this->input->post('search')){
            $search = array(
                'name'              => trim($this->input->post('name')),
                'status'            => $this->input->post('status')
            );

            $this->session->set_userdata('whats_new',$search);
        }

        if($this->input->post('reset')){
            $this->session->unset_userdata('whats_new');
        }
        $keyword = $this->session->userdata('whats_new');

        $total_count = $this->wsm->whats_new_list($per_page,$page,$keyword,$column,$order,true);
        $data['pagination'] = $this->pagination('whats-new',$total_count,$per_page);
        $data['whats_new'] = $this->wsm->whats_new_list($per_page,$page,$keyword,$column,$order);
        $end = (($data['whats_new'])?count($data['whats_new']):0) + (($page) ? $page : 0);
        $start = (count($data['whats_new']) > 0)?($page + 1):0;
        $data['result_count'] = "Showing " . $start . " - " . $end . " of " . $total_count . " Results";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/whats_new/whats-new',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }   
    
    public function add_whats_new()
    {
        if($this->input->post()){
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('about','About','required');
            if (empty($_FILES['banner_web']['name']))
            {
                $this->form_validation->set_rules('banner_web','Banner for web','required');
            }
            if (empty($_FILES['banner_mobile']['name']))
            {
                $this->form_validation->set_rules('banner_mobile','Banner for mobile','required');
            }
            $this->form_validation->set_rules('alt_tag','Banner Alt Tag','required');
            $this->form_validation->set_rules('show_reg_btn','Activate Register Button','required');

            if($this->form_validation->run())
            {
                $data_array = array(
                    'name'              => $this->input->post('name'),
                    'about'             => $this->input->post('about'),
                    'name_slug'         => url_title($this->input->post('name'), 'dash', true),
                    'alt_tag'           => $this->input->post('alt_tag'),
                    'show_reg_btn'      => $this->input->post('show_reg_btn'),
                    'created_on'        => date('Y-m-d H:i:s'),
                    'created_by'        => $this->wsm->admin_id()
                );

                if(!empty($_FILES['banner_mobile']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['banner_mobile']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['thumb_mob'] = $new_name;
                    $config1['upload_path'] = 'assets/images/public/home';
                    $config1['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config1['file_name'] = $new_name;
                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);
                    if(!$this->upload->do_upload('banner_mobile')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['banner_web']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['banner_web']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['thumb_web'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/home';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('banner_web')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                $save = $this->wsm->insert_data('tbl_whats_new',$data_array);
                // echo $this->db->last_query(); die;
                if($save){
                    echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
                } else {
                    echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
                }
                exit;
            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
                exit;
            }
        }
        $data['whats_new'] = [];
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/whats_new/add_whats_new',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function edit_whats_new($id)
    {
        if($this->input->post()){
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('about','About','required');
            $this->form_validation->set_rules('alt_tag','Banner Alt Tag','required');
            $this->form_validation->set_rules('show_reg_btn','Activate Register Button','required');

            if($this->form_validation->run())
            {
                $data_array = array(
                    'name'              => $this->input->post('name'),
                    'about'             => $this->input->post('about'),
                    'name_slug'         => url_title($this->input->post('name'), 'dash', true),
                    'alt_tag'           => $this->input->post('alt_tag'),
                    'show_reg_btn'      => $this->input->post('show_reg_btn'),
                    'updated_on'        => date('Y-m-d H:i:s'),
                    'updated_by'        => $this->wsm->admin_id()
                );

                if(!empty($_FILES['banner_mobile']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['banner_mobile']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['thumb_mob'] = $new_name;
                    $config1['upload_path'] = 'assets/images/public/home';
                    $config1['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config1['file_name'] = $new_name;
                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);
                    if(!$this->upload->do_upload('banner_mobile')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['banner_web']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['banner_web']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['thumb_web'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/home';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('banner_web')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                $save = $this->wsm->update_data('tbl_whats_new',$data_array,['id' => $id]);
                // echo $this->db->last_query(); die;
                if($save){
                    echo json_encode(['message' => 'Data updated successfully.', 'status' => 1]);
                } else {
                    echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
                }
                exit;
            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
                exit;
            }
        }
        $data['whats_new'] = $this->wsm->get_data_row_array('tbl_whats_new',"*", ['id' => $id]);
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/whats_new/add_whats_new',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function delete_whats_new()
    {
        $whats_new_id = $this->input->post('whats_new_id');
        $update = $this->wsm->update_data('tbl_whats_new',['status' => 2],['id' => $whats_new_id]);
        if($update){
            echo json_encode(['message' => 'Data deleted successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    public function change_whats_new_status()
    {
        $whats_new_id = $this->input->post('id');
        $stauts = $this->input->post('status');
        $update = $this->wsm->update_data('tbl_whats_new',['status' => $stauts],['id' => $whats_new_id]);
        if($update){
            echo json_encode(['message' => 'Status changed successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    public function whats_new_details()
    {
        $id = $this->input->post('id');
        $data = $this->wsm->get_data_row_array('tbl_whats_new',"*", ['id' => $id]);
        echo json_encode($data);
    }

    public function whats_new_gallery($page=0,$column=null,$order=null)
    {
        $per_page = "10";
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        } else {
            $page = 0;
        }  

        if($this->input->post('search')){
            $search = array(
                'name'              => trim($this->input->post('name')),
                'status'            => $this->input->post('status')
            );

            $this->session->set_userdata('whats_new_gallery',$search);
        }

        if($this->input->post('reset')){
            $this->session->unset_userdata('whats_new_gallery');
        }
        $keyword = $this->session->userdata('whats_new_gallery');

        $total_count = $this->wsm->whats_new_gallery_list($per_page,$page,$keyword,$column,$order,true);
        $data['pagination'] = $this->pagination('whats-new',$total_count,$per_page);
        $data['whats_new_gallery'] = $this->wsm->whats_new_gallery_list($per_page,$page,$keyword,$column,$order);
        $end = (($data['whats_new_gallery'])?count($data['whats_new_gallery']):0) + (($page) ? $page : 0);
        $start = (count($data['whats_new_gallery']) > 0)?($page + 1):0;
        $data['result_count'] = "Showing " . $start . " - " . $end . " of " . $total_count . " Results";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/whats_new/whats_new_gallery',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function add_whats_new_gallery()
    {
        if($this->input->post()){
            if (empty($_FILES['image_web']['name']))
            {
                $this->form_validation->set_rules('image_web','Image for web','required');
            }
            if (empty($_FILES['image_mob']['name']))
            {
                $this->form_validation->set_rules('image_mob','Image for mobile','required');
            }
            $this->form_validation->set_rules('alt_tag','Image Alt Tag','required');
            $this->form_validation->set_rules('whats_new','Whats New','required');

            if($this->form_validation->run())
            {
                $data_array = array(
                    'whats_new_slug'    => $this->input->post('whats_new'),
                    'image_alt'         => $this->input->post('alt_tag'),
                    'created_on'        => date('Y-m-d H:i:s'),
                    'created_by'        => $this->wsm->admin_id()
                );

                if(!empty($_FILES['image_mob']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['image_mob']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['image_mob'] = $new_name;
                    $config1['upload_path'] = 'assets/images/public/home';
                    $config1['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config1['file_name'] = $new_name;
                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);
                    if(!$this->upload->do_upload('image_mob')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['image_web']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['image_web']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['image_web'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/home';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('image_web')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                $save = $this->wsm->insert_data('tbl_whats_new_gallery',$data_array);
                // echo $this->db->last_query(); die;
                if($save){
                    echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
                } else {
                    echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
                }
                exit;
            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
                exit;
            }
        }
        $data['whats_new_gallery'] = [];
        $data['whats_new'] = $this->wsm->get_data_array('tbl_whats_new', "name_slug, name",['status' => 0]);

        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/whats_new/add-whats-new-gallery',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function edit_whats_new_gallery($id)
    {
        if($this->input->post()){
            
            $this->form_validation->set_rules('alt_tag','Image Alt Tag','required');
            $this->form_validation->set_rules('whats_new','Whats New','required');

            if($this->form_validation->run())
            {
                $data_array = array(
                    'whats_new_slug'    => $this->input->post('whats_new'),
                    'image_alt'         => $this->input->post('alt_tag'),
                    'updated_on'        => date('Y-m-d H:i:s'),
                    'updated_by'        => $this->wsm->admin_id()
                );

                if(!empty($_FILES['image_mob']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['image_mob']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['image_mob'] = $new_name;
                    $config1['upload_path'] = 'assets/images/public/home';
                    $config1['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config1['file_name'] = $new_name;
                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);
                    if(!$this->upload->do_upload('image_mob')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['image_web']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['image_web']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['image_web'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/home';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('image_web')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                $save = $this->wsm->update_data('tbl_whats_new_gallery',$data_array,['id' => $id]);
                // echo $this->db->last_query(); die;
                if($save){
                    echo json_encode(['message' => 'Data updated successfully.', 'status' => 1]);
                } else {
                    echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
                }
                exit;
            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
                exit;
            }
        }
        $data['whats_new_gallery'] = $this->wsm->get_data_row_array('tbl_whats_new_gallery','*',['id' => $id]);
        $data['whats_new'] = $this->wsm->get_data_array('tbl_whats_new', "name_slug, name",['status' => 0]);

        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/whats_new/add-whats-new-gallery',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function whats_new_gallery_details()
    {
        $id = $this->input->post('id');
        $data = $this->wsm->whats_new_gallery_details($id);
        echo json_encode($data);
    }

    public function change_whats_new_gallery_status()
    {
        $whats_new_id = $this->input->post('id');
        $stauts = $this->input->post('status');
        $update = $this->wsm->update_data('tbl_whats_new_gallery',['status' => $stauts],['id' => $whats_new_id]);
        if($update){
            echo json_encode(['message' => 'Status changed successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    public function delete_whats_new_gallery()
    {
        $whats_new_id = $this->input->post('whats_new_id');
        $update = $this->wsm->update_data('tbl_whats_new_gallery',['status' => 2],['id' => $whats_new_id]);
        if($update){
            echo json_encode(['message' => 'Data deleted successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }
}

?>