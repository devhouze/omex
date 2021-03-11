<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner_Controllers extends my_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Banner_Model','bm');
    }

    public function banner_list()
    {
        $per_page = "10";
        $page = $this->pagination->cur_page;
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        } else {
            $page = 0;
        }  

        if($this->input->post('search')){
            $search = array(
                'banner_type'       => trim($this->input->post('banner_type')),
                'status'            => $this->input->post('status')
            );

            $this->session->set_userdata('banner',$search);
        }

        if($this->input->post('reset')){
            $this->session->unset_userdata('banner');
        }
        $keyword = $this->session->userdata('banner');

        $total_count = $this->bm->banners_list($per_page,$page,$keyword,true);
        $data['pagination'] = $this->pagination('banners',$total_count,$per_page);
        $data['banners'] = $this->bm->banners_list($per_page,$page,$keyword);
        $end = (($data['banners'])?count($data['banners']):0) + (($page) ? $page : 0);
        $start = (count($data['banners']) > 0)?($page + 1):0;
        $data['result_count'] = "Showing " . $start . " - " . $end . " of " . $total_count . " Results";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/banners/banner-list',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function add_banners()
    {
        if($this->input->post()){
            $this->form_validation->set_rules('banner_type','Banner Type','required');
            if (empty($_FILES['banner_web']['name']))
            {
                $this->form_validation->set_rules('banner_web','Banner for web','required');
            }
            if (empty($_FILES['banner_mobile']['name']))
            {
                $this->form_validation->set_rules('banner_mobile','Banner for mobile','required');
            }
            $this->form_validation->set_rules('banner_comment','Banner Comment','required');
            // $this->form_validation->set_rules('banner_link','Banner Link','required');

            $banner_type = $this->input->post('banner_type');

            if($banner_type == '2'){
                $this->form_validation->set_rules('streets','Streerts','required');
            }
            //  || $banner_type == '5' || $banner_type == '6'
            if($banner_type == '3'){
                $this->form_validation->set_rules('streets','Streerts','required');
                $this->form_validation->set_rules('brand','Brands','required');
            }

            // if($banner_type == '4'){
            //     $this->form_validation->set_rules('brand','Brands','required');
            // }

            if($this->form_validation->run()){
                $data_array = array(
                    'banner_type'       => $this->input->post('banner_type'),
                    'comment'           => $this->input->post('banner_comment'),
                    'street'            => $this->input->post('streets'),
                    'brand'             => $this->input->post('brand'),
                    'banner_link'       => $this->input->post('banner_link'),
                    'created_by'        => $this->bm->admin_id()
                );

                if(!empty($_FILES['banner_mobile']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['banner_mobile']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['banner_mobile'] = $new_name;
                    if($banner_type == 1 || $banner_type == 2){
                        $config1['upload_path'] = 'assets/images/public/home';
                    }
                    if($banner_type == 3){
                        $config1['upload_path'] = 'assets/images/public/brand';
                    }
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
                    $data_array['banner_web'] = $new_name;
                    if($banner_type == 1 || $banner_type == 2){
                        $config['upload_path'] = 'assets/images/public/home';
                    }
                    if($banner_type == 3){
                        $config['upload_path'] = 'assets/images/public/brand';
                    }
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('banner_web')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                $save = $this->bm->insert_data('tbl_banner',$data_array);
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
        $data[] = '';
        $data['brands'] = $this->bm->get_data_array('tbl_brand',$column = "brand_id, brand_name");
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/banners/add-banners',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function edit_banners($id)
    {
        if($this->input->post()){
            $this->form_validation->set_rules('banner_type','Banner Type','required');
            $this->form_validation->set_rules('banner_comment','Banner Comment','required');
            // $this->form_validation->set_rules('banner_link','Banner Link','required');

            $banner_type = $this->input->post('banner_type');

            if($this->form_validation->run()){
                $data_array = array(
                    'banner_type'       => $this->input->post('banner_type'),
                    'comment'           => $this->input->post('banner_comment'),
                    'street'            => $this->input->post('streets'),
                    'brand'             => $this->input->post('brand'),
                    'banner_link'       => $this->input->post('banner_link'),
                    'updated_by'        => $this->bm->admin_id(),
                    'updated_on'        => date('Y-m-d H:i:s')
                );

                if(!empty($_FILES['banner_mobile']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['banner_mobile']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['banner_mobile'] = $new_name;
                    if($banner_type == 1 || $banner_type == 2){
                        $config1['upload_path'] = 'assets/images/public/home';
                    }
                    if($banner_type == 3){
                        $config1['upload_path'] = 'assets/images/public/brand';
                    }
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
                    $data_array['banner_web'] = $new_name;
                    if($banner_type == 1 || $banner_type == 2){
                        $config['upload_path'] = 'assets/images/public/home';
                    }
                    if($banner_type == 3){
                        $config['upload_path'] = 'assets/images/public/brand';
                    }
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('banner_web')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }
                // echo "<pre>"; print_r($data_array); die;
                $update = $this->bm->update_data('tbl_banner',$data_array,['id' => $id]);
                if($update){
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
        $data['banner'] = $this->bm->get_data_row_array('tbl_banner',"*",['id' => $id]);
        $data['brands'] = $this->bm->get_data_array('tbl_brand',$column = "brand_id, brand_name");
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/banners/add-banners',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function delete_banner()
    {
        $logo_id = $this->input->post('logo_id');
        $update = $this->bm->update_data('tbl_banner',['status' => 2],['id' => $logo_id]);
        if($update){
            echo json_encode(['message' => 'Data deleted successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    public function change_banner_status()
    {
        $banner_id = $this->input->post('id');
        $stauts = $this->input->post('status');
        $update = $this->bm->update_data('tbl_banner',['status' => $stauts],['id' => $banner_id]);
        if($update){
            echo json_encode(['message' => 'Status changed successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    public function get_banner_details()
    {
        $banner_id = $this->input->post('banner_id');
        $data = $this->bm->banner_details($banner_id);
        if(!empty($data)){
            echo json_encode(['message'=> 'Showing Details','status' => 1, $data]);
        } else {
            echo json_encode(['message'=> 'Something went wrong!.','status' => 0]);
        }
    } 
}
?>