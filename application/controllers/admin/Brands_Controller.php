<?php

class Brands_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Brands_Model','bm');
    }

    public function brand_list()
    {
        $per_page = "10";
        $page = $this->uri->segment(2);
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        } else {
            $page = 0;
        }
        
        if($this->input->post('search')){
            $search = array(
                'brand_name'    => trim($this->input->post('name')),
                'status'        => $this->input->post('status')
            );

            $this->session->set_userdata('brand',$search);
        }

        if($this->input->post('reset')){
            $this->session->unset_userdata('brand');
        }
        $keyword = $this->session->userdata('brand');

        $total_count = $this->bm->get_brands($per_page,$page,$keyword,true);
        $data['pagination'] = $this->pagination('brands',$total_count,$per_page);
        $data['brands'] = $this->bm->get_brands($per_page,$page,$keyword);
        $end = (($data['brands'])?count($data['brands']):0) + (($page) ? $page : 0);
        $start = (count($data['brands']) > 0)?($page + 1):0;
        $data['result_count'] = "Showing " . $start . " - " . $end . " of " . $total_count . " Results";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/brands/brand-list',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function add_brand()
    {
        $data['brands'] = "";
        if($this->input->post()){
            // Form Validation rules
            $this->form_validation->set_rules('brand_name','Brand Name','required');
            if (empty($_FILES['brand_logo']['name']))
            {
                $this->form_validation->set_rules('brand_logo','Brand Logo','required');
            }
            $this->form_validation->set_rules('logo_comment','Logo Comment','required');
            $this->form_validation->set_rules('brand_website','Brand Website','required');
            $this->form_validation->set_rules('about_brand','About Brand','required');
            $this->form_validation->set_rules('brand_label','Brand Label','required');
            $this->form_validation->set_rules('from_week_hour','Week Hours','required');
            $this->form_validation->set_rules('to_week_hour','Week Hours','required');
            $this->form_validation->set_rules('from_weekend_hour','Weekend Hours','required');
            $this->form_validation->set_rules('to_weekend_hour','Weekend Hours','required');
            $this->form_validation->set_rules('brand_location','Brand Location','required');
            $this->form_validation->set_rules('brand_street','Brand Street','required');
            $this->form_validation->set_rules('brand_type','Brand Type','required');
            $this->form_validation->set_rules('brand_contact','Brand Contact','required');
            $this->form_validation->set_rules('brand_category[]','Brand Category','required');
            $this->form_validation->set_rules('sub_category','Brand Sub Category','required');
            $this->form_validation->set_rules('email_contact','Email Contact','required');
            $this->form_validation->set_rules('brand_audience','Brand Audience','required');
            $this->form_validation->set_rules('store_map','Store Map','required');
            $this->form_validation->set_rules('show_on_home','Show On Home','required');
            $this->form_validation->set_rules('banner_comment','Brand Banner Alt Tag','required');
            $this->form_validation->set_rules('about_brand_banner_alt','About Brand Banner Alt Tag','required');
            $this->form_validation->set_rules('show_brand_offers','Show Brand Offer','required');
            $this->form_validation->set_rules('order_home','Order On Home Page','required');
            if (empty($_FILES['banner_web']['name']))
            {
            $this->form_validation->set_rules('banner_web','Brand Banner Web','required');
            }
            if (empty($_FILES['about_brand_banner_web']['name']))
            {
            $this->form_validation->set_rules('about_brand_banner_web','About Brand Banner Web','required');
            }
            if (empty($_FILES['banner_mobile']['name']))
            {
            $this->form_validation->set_rules('banner_mobile','Brand Banner Mobile','required');
            }
         
            if($this->form_validation->run()){
                if(empty($this->input->post('brand_category'))){
                    echo json_encode(['message' => 'The Brand Category field is required.', 'error' => 'The Brand Category field is required.', 'status' => 0]);
                    exit;
                }
                $data_array = array(
                    'brand_name'                    => $this->input->post('brand_name'),
                    'brand_website'                 => $this->input->post('brand_website'),
                    'logo_message'                  => $this->input->post('logo_comment'),
                    'about_brand'                   => trim($this->input->post('about_brand')),
                    'brand_label'                   => $this->input->post('brand_label'),
                    'from_hour_week'                => $this->input->post('from_week_hour'),
                    'to_week_hour'                  => $this->input->post('to_week_hour'),
                    'from_hour_weekend'             => $this->input->post('from_weekend_hour'),
                    'to_weekend_hour'               => $this->input->post('to_weekend_hour'),
                    'brand_location'                => $this->input->post('brand_location'),
                    'brand_street'                  => $this->input->post('brand_street'),
                    'brand_category'                => implode(",",$this->input->post('brand_category')),
                    'brand_sub_category'            => $this->input->post('sub_category'),
                    'brand_type'                    => $this->input->post('brand_type'),
                    'brand_contact'                 => $this->input->post('brand_contact'),
                    'brand_contact_email'           => $this->input->post('email_contact'),
                    'store_map'                     => $this->input->post('store_map'),
                    'show_on_home'                  => $this->input->post('show_on_home'),
                    'brand_offer_status'            => $this->input->post('show_brand_offers'),
                    'brand_audience'                => $this->input->post('brand_audience'),
                    'order_home'                    => $this->input->post('order_home'),
                    'about_brand_banner_alt'        => $this->input->post('about_brand_banner_alt'),
                    'banner_comment'                => $this->input->post('banner_comment'),
                    'created_by'                    => $this->bm->admin_id()
                );

                
                if(!empty($_FILES['brand_logo']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['brand_logo']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['brand_logo'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('brand_logo')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['banner_web']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['banner_web']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['banner_web'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('banner_web')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['banner_mobile']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['banner_mobile']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['banner_mobile'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('banner_mobile')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['about_brand_banner_web']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['about_brand_banner_web']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['about_brand_banner_web'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('about_brand_banner_web')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['about_brand_banner_mobile']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['about_brand_banner_mobile']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['about_brand_banner_mobile'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('about_brand_banner_mobile')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }
                // echo "<pre>"; print_r($data_array); die;
                $save = $this->bm->insert_data('tbl_brand',$data_array);
                if($save){
                    echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
                } else {
                    echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
                }
            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
            }
            exit;
        }
                
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/brands/add-brand',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function edit_brand($id)
    {
        if($this->input->post()){
            // Form Validation rules
            $this->form_validation->set_rules('brand_name','Brand Name','required');
            $this->form_validation->set_rules('logo_comment','Logo Comment','required');
            $this->form_validation->set_rules('brand_website','Brand Website','required');
            $this->form_validation->set_rules('about_brand','About Brand','required');
            $this->form_validation->set_rules('brand_label','Brand Label','required');
            $this->form_validation->set_rules('from_week_hour','Week Hours','required');
            $this->form_validation->set_rules('to_week_hour','Week Hours','required');
            $this->form_validation->set_rules('from_weekend_hour','Weekend Hours','required');
            $this->form_validation->set_rules('to_weekend_hour','Weekend Hours','required');
            $this->form_validation->set_rules('brand_location','Brand Location','required');
            $this->form_validation->set_rules('brand_street','Brand Street','required');
            $this->form_validation->set_rules('brand_type','Brand Type','required');
            $this->form_validation->set_rules('brand_contact','Brand Contact','required');
            $this->form_validation->set_rules('brand_category[]','Brand Category','required');
            $this->form_validation->set_rules('sub_category','Brand Sub Category','required');
            $this->form_validation->set_rules('email_contact','Email Contact','required');
            $this->form_validation->set_rules('brand_audience','Brand Audience','required');
            $this->form_validation->set_rules('store_map','Store Map','required');
            $this->form_validation->set_rules('show_on_home','Show On Home','required');
            $this->form_validation->set_rules('banner_comment','Brand Banner Alt Tag','required');
            $this->form_validation->set_rules('about_brand_banner_alt','About Brand Banner Alt Tag','required');
            $this->form_validation->set_rules('show_brand_offers','Show Brand Offer','required');
            $this->form_validation->set_rules('order_home','Order On Home Page','required');
            
            if($this->form_validation->run()){
                $data_array = array(
                    'brand_name'                    => $this->input->post('brand_name'),
                    'brand_website'                 => $this->input->post('brand_website'),
                    'logo_message'                  => $this->input->post('logo_comment'),
                    'about_brand'                   => trim($this->input->post('about_brand')),
                    'brand_label'                   => $this->input->post('brand_label'),
                    'from_hour_week'                => $this->input->post('from_week_hour'),
                    'to_week_hour'                  => $this->input->post('to_week_hour'),
                    'from_hour_weekend'             => $this->input->post('from_weekend_hour'),
                    'to_weekend_hour'               => $this->input->post('to_weekend_hour'),
                    'brand_location'                => $this->input->post('brand_location'),
                    'brand_street'                  => $this->input->post('brand_street'),
                    'brand_category'                => implode(",",$this->input->post('brand_category')),
                    'brand_sub_category'            => $this->input->post('sub_category'),
                    'brand_type'                    => $this->input->post('brand_type'),
                    'brand_contact'                 => $this->input->post('brand_contact'),
                    'brand_contact_email'           => $this->input->post('email_contact'),
                    'store_map'                     => $this->input->post('store_map'),
                    'show_on_home'                  => $this->input->post('show_on_home'),
                    'brand_offer_status'            => $this->input->post('show_brand_offers'),
                    'brand_audience'                => $this->input->post('brand_audience'),
                    'order_home'                    => $this->input->post('order_home'),
                    'about_brand_banner_alt'        => $this->input->post('about_brand_banner_alt'),
                    'banner_comment'                => $this->input->post('banner_comment'),
                    'created_by'                    => $this->bm->admin_id()
                );

                
                if(!empty($_FILES['brand_logo']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['brand_logo']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['brand_logo'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('brand_logo')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['banner_web']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['banner_web']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['banner_web'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('banner_web')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['banner_mobile']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['banner_mobile']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['banner_mobile'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('banner_mobile')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['about_brand_banner_web']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['about_brand_banner_web']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['about_brand_banner_web'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('about_brand_banner_web')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if(!empty($_FILES['about_brand_banner_mobile']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['about_brand_banner_mobile']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['about_brand_banner_mobile'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('about_brand_banner_mobile')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }
                $save = $this->bm->update_data('tbl_brand',$data_array,['brand_id' => $id]);
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
        $data['brands'] = $this->bm->get_data_row('tbl_brand','*',['brand_id' => $id]);
        // echo "<pre>"; print_r($data); die;
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/brands/add-brand',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function delete_brand()
    {
        $brand_id = $this->input->post('brand_id');
        $update = $this->bm->update_data('tbl_brand',['status' => 2],['brand_id' => $brand_id]);
        if($update){
            echo json_encode(['message' => 'Data deleted successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    public function change_brand_status()
    {
        $brand_id = $this->input->post('id');
        $stauts = $this->input->post('status');
        $update = $this->bm->update_data('tbl_brand',['status' => $stauts],['brand_id' => $brand_id]);
        if($update){
            echo json_encode(['message' => 'Status changed successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    public function get_brand_details()
    {
        $brand_id = $this->input->post('brand_id');
        $data = $this->bm->get_brand_details($brand_id);
        echo json_encode($data);
    }

    public function add_brand_offer()
    {
        $data['brand_offers'] = [];
        $data['brands'] = $this->bm->get_data_array('tbl_brand','brand_id,brand_name','status !=2 and brand_offer_status = "Yes"');
        if($this->input->post()){
            $this->form_validation->set_rules('brand_offer_name','Offer Name','required');
            $this->form_validation->set_rules('brand_id','Brand','required');
            if(empty($_FILES['offer_thumbnail']['name'])){
                $this->form_validation->set_rules('offer_thumbnail','Brand Offer Thumbnail','required');
            }
            $this->form_validation->set_rules('thumbnail_alt','Thumbnail Alt Tag','required');
            $this->form_validation->set_rules('about_brand_offer','About Brand Offer','required');

            if($this->form_validation->run()){

                $data_array = array(
                    'brand_id'          => $this->input->post('brand_id'),
                    'offer_name'        => $this->input->post('brand_offer_name'),
                    'thumbnail_alt'     => $this->input->post('thumbnail_alt'),
                    'about_offer'       => $this->input->post('about_brand_offer'),
                    'created_by'        => $this->bm->admin_id(),
                );

                if(!empty($_FILES['offer_thumbnail']['name'])){
                    $brand_logo = $getfilename =  str_replace(' ', '_', $_FILES['offer_thumbnail']['name']);
                    $file = pathinfo($brand_logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['offer_thumbnail'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('offer_thumbnail')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }
                $save = $this->bm->insert_data('tbl_brand_offer',$data_array);
                if($save){
                    echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
                } else {
                    echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
                }
            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
            }
            exit;
        }
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/brands/add-brand-offer',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    } 

    public function edit_brand_offer($id)
    {
        $data['brand_offers'] = $this->bm->get_data_row('tbl_brand_offer','*',['offer_id' => $id]);
        $data['brands'] = $this->bm->get_data_array('tbl_brand','brand_id,brand_name','status !=2 and brand_offer_status = "Yes"');
        if($this->input->post()){
            $this->form_validation->set_rules('brand_offer_name','Offer Name','required');
            $this->form_validation->set_rules('brand_id','Brand','required');
            $this->form_validation->set_rules('thumbnail_alt','Thumbnail Alt Tag','required');
            $this->form_validation->set_rules('about_brand_offer','About Brand Offer','required');

            if($this->form_validation->run()){

                $data_array = array(
                    'brand_id'          => $this->input->post('brand_id'),
                    'offer_name'        => $this->input->post('brand_offer_name'),
                    'thumbnail_alt'     => $this->input->post('thumbnail_alt'),
                    'about_offer'       => $this->input->post('about_brand_offer'),
                    'created_by'        => $this->bm->admin_id(),
                );

                if(!empty($_FILES['offer_thumbnail']['name'])){
                    $brand_logo = $getfilename =  str_replace(' ', '_', $_FILES['offer_thumbnail']['name']);
                    $file = pathinfo($brand_logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['offer_thumbnail'] = $new_name;
                    $config['upload_path'] = 'assets/images/public/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('offer_thumbnail')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }
                // echo "<pre>"; print_r($data_array);
                $save = $this->bm->update_data('tbl_brand_offer',$data_array,['offer_id' => $id]);
                if($save){
                    echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
                } else {
                    echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
                }
            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
            }
            exit;
        }
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/brands/add-brand-offer',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function delete_brand_offer()
    {
        $logo_id = $this->input->post('logo_id');
        $update = $this->bm->update_data('tbl_brand_offer',['status' => 2],['offer_id' => $logo_id]);
        if($update){
            echo json_encode(['message' => 'Data deleted successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    public function get_offer_details()
    {
        $offer_id = $this->input->post('offer_id');
        $data = $this->bm->get_offer_details($offer_id);
        echo json_encode($data);
    }
    

    public function change_brand_offer_status()
    {
        $offer_id = $this->input->post('id');
        $stauts = $this->input->post('status');
        $update = $this->bm->update_data('tbl_brand_offer',['status' => $stauts],['offer_id' => $offer_id]);
        if($update){
            echo json_encode(['message' => 'Status changed successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }

    

    public function brand_offer_list()
    {
        $per_page = "10";
        $page = $this->uri->segment(2);
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        } else {
            $page = 0;
        }

        if($this->input->post('search')){
            $search = array(
                'brand_name'            => trim($this->input->post('brand_name')),
                'offer_name'            => trim($this->input->post('offer_name')),
                'status'                => $this->input->post('status')
            );

            $this->session->set_userdata('brand_offer',$search);
        }

        if($this->input->post('reset')){
            $this->session->unset_userdata('brand_offer');
        }
        $keyword = $this->session->userdata('brand_offer');

        $total_count = $this->bm->get_brands_offer($per_page,$page,$keyword,true);
        $data['pagination'] = $this->pagination('brand-offer',$total_count,$per_page);
        $data['brands_offer'] = $this->bm->get_brands_offer($per_page,$page,$keyword);
        $end = (($data['brands_offer'])?count($data['brands_offer']):0) + (($page) ? $page : 0);
        $start = (count($data['brands_offer']) > 0)?($page + 1):0;
        $data['result_count'] = "Showing " . $start . " - " . $end . " of " . $total_count . " Results";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/brands/brand-offer-list',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    } 
    
}
?>