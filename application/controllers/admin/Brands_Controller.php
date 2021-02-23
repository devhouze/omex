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
        $total_count = $this->bm->get_brands($per_page,$page,true);
        $data['pagination'] = $this->pagination('brands',$total_count,$per_page);
        $data['brands'] = $this->bm->get_brands($per_page,$page);
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
            $this->form_validation->set_rules('show_brand_offer','Activate Brand Offer','required');

            $show_brand_offer = $this->input->post('show_brand_offer');
            if($show_brand_offer == "Yes"){
                $this->form_validation->set_rules('','','required');
                $this->form_validation->set_rules('brand_offer_name','Brand Offer Name','required');
                $this->form_validation->set_rules('brand_custom_offer','Brand Custom Offer','required');
                $this->form_validation->set_rules('offer_validity','Offer Validity','required');
                if (empty($_FILES['offer_thumbnail']['name']))
                {
                    $this->form_validation->set_rules('offer_thumbnail','Brand Offer Thumbnail','required');
                }
                $this->form_validation->set_rules('thumbnail_message','Thumbnail Comment','required');
                $this->form_validation->set_rules('about_brand_offer','About Brand Offer','required');
            }
            
            if($this->form_validation->run()){
                $data_array = array(
                    'brand_name'                    => $this->input->post('brand_name'),
                    'logo_message'                  => $this->input->post('logo_comment'),
                    'brand_website'                 => $this->input->post('brand_website'),
                    'about_brand'                   => $this->input->post('about_brand'),
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
                    'brand_offer_status'            => $this->input->post('show_brand_offer'),
                    'brand_audience'                => $this->input->post('brand_audience'),
                    'created_by'                    => $this->bm->admin_id()
                );

                
                if(!empty($_FILES['brand_logo']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['brand_logo']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['brand_logo'] = $new_name;
                    $config['upload_path'] = 'assets/images/admin/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('brand_logo')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }

                if($this->input->post('show_brand_offer') == "Yes"){
                    $offer_array = array(
                        'brand_offer_name'                      => $this->input->post('brand_offer_name'),
                        'brand_offer'                           => $this->input->post('brand_custom_offer'),
                        'brand_offer_validity'                  => $this->input->post('offer_validity'),
                        'brand_offer_thumbnail_message'         => $this->input->post('thumbnail_message'),
                        'about_brand_offer'                     => $this->input->post('about_brand_offer')
                    );
                    if(!empty($_FILES['offer_thumbnail']['name'])){
                        $offer_thumbnail = $getfilename =  str_replace(' ', '_', $_FILES['offer_thumbnail']['name']);
                        $file = pathinfo($offer_thumbnail);
                        $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                        $offer_array['brand_offer_thumbnail'] = $new_name;
                        $config['upload_path'] = 'assets/images/admin/brand/brand_offer';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = $new_name;
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if(!$this->upload->do_upload('offer_thumbnail')){
                            echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                            exit;
                        }
                    }
                }
                $final_data = array_merge($data_array,$offer_array);
                $save = $this->bm->insert_data('tbl_brand',$final_data);
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
            $this->form_validation->set_rules('show_brand_offer','Activate Brand Offer','required');

            $show_brand_offer = $this->input->post('show_brand_offer');
            if($show_brand_offer == "Yes"){
                $this->form_validation->set_rules('','','required');
                $this->form_validation->set_rules('brand_offer_name','Brand Offer Name','required');
                $this->form_validation->set_rules('brand_custom_offer','Brand Custom Offer','required');
                $this->form_validation->set_rules('offer_validity','Offer Validity','required');
                $this->form_validation->set_rules('thumbnail_message','Thumbnail Comment','required');
                $this->form_validation->set_rules('about_brand_offer','About Brand Offer','required');
            }
            
            if($this->form_validation->run()){
                $data_array = array(
                    'brand_name'                    => $this->input->post('brand_name'),
                    'logo_message'                  => $this->input->post('logo_comment'),
                    'brand_website'                 => $this->input->post('brand_website'),
                    'about_brand'                   => $this->input->post('about_brand'),
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
                    'brand_offer_status'            => $this->input->post('show_brand_offer'),
                    'brand_audience'                => $this->input->post('brand_audience'),
                    'updated_by'                    => $this->bm->admin_id(),
                    'updated_on'                    => date('Y-m-d H:i:s')
                );

                
                if(!empty($_FILES['brand_logo']['name'])){
                    $logo = $getfilename =  str_replace(' ', '_', $_FILES['brand_logo']['name']);
                    $file = pathinfo($logo);
                    $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                    $data_array['brand_logo'] = $new_name;
                    $config['upload_path'] = 'assets/images/admin/brand';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $new_name;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('brand_logo')){
                        echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                        exit;
                    }
                }
                $offer_array = [];
                if($this->input->post('show_brand_offer') == "Yes"){
                    $offer_array = array(
                        'brand_offer_name'                      => $this->input->post('brand_offer_name'),
                        'brand_offer'                           => $this->input->post('brand_custom_offer'),
                        'brand_offer_validity'                  => $this->input->post('offer_validity'),
                        'brand_offer_thumbnail_message'         => $this->input->post('thumbnail_message'),
                        'about_brand_offer'                     => $this->input->post('about_brand_offer')
                    );
                    if(!empty($_FILES['offer_thumbnail']['name'])){
                        $offer_thumbnail = $getfilename =  str_replace(' ', '_', $_FILES['offer_thumbnail']['name']);
                        $file = pathinfo($offer_thumbnail);
                        $new_name = $file['filename']."_".rand(0000,9999).".".strtolower($file['extension']);
                        $offer_array['brand_offer_thumbnail'] = $new_name;
                        $config['upload_path'] = 'assets/images/admin/brand/brand_offer';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = $new_name;
                        $this->load->library('upload',$config);
                        $this->upload->initialize($config);
                        if(!$this->upload->do_upload('offer_thumbnail')){
                            echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->upload->display_errors(), 'status' => 0]);
                            exit;
                        }
                    }
                }
                // echo "<pre>"; print_r($data_array); die;
                $final_data = array_merge($data_array,$offer_array);
                $save = $this->bm->update_data('tbl_brand',$final_data,['brand_id' => $id]);
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
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/brands/add-brand',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }
}
?>