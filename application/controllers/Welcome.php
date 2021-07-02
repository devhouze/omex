<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model','wm');
	}

	public function index()
	{
		$data['banner'] = $this->wm->get_home_banner();
		$data['brand_logo'] = $this->wm->get_brand_logo();
		$data['events'] = $this->wm->get_events();
		$data['all_gallery'] = $this->wm->get_gallery('all');
		// echo "<pre>";
		// print_r($data); die;
		$data['interior_gallery'] = $this->wm->get_gallery(1);
		$data['exterior_gallery'] = $this->wm->get_gallery(2);
		$data['construction_gallery'] = $this->wm->get_gallery(3);
		$data['gallery_video'] = $this->wm->gallery_video();
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		// echo "<pre>";
		// print_r($data['gallery_video']); die;
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('modal');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/home');
		//$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function athens()
	{
		$events = $this->wm->get_events_by_street('Athens Street');
		$data['events'] = $this->check_event_expiry($events);
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		// echo "<pre>"; print_r($data); die;
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/light');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('athens',$data);
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('modal');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/street');
		$this->load->view('js/light');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function portugal()
	{
		$events = $this->wm->get_events_by_street('Portugal Street');
		$data['events'] = $this->check_event_expiry($events);
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/light');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('portugal',$data);
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('modal');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/portugal');
		$this->load->view('js/light');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function hong_kong()
	{
		$events = $this->wm->get_events_by_street('Hong Kong Street');
		$data['events'] = $this->check_event_expiry($events);
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/light');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('hong_kong',$data);
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('modal');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/hong_kong');
		$this->load->view('js/light');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function amsterdam()
	{
		$events = $this->wm->get_events_by_street('Amsterdam Street');
		$data['events'] = $this->check_event_expiry($events);
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		// echo "<pre>"; print_r($data); die;
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/light');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('amsterdam',$data);
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('modal');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/amsterdam');
		$this->load->view('js/light');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function san_francisco()
	{
		$events = $this->wm->get_events_by_street('San Francisco Street');
		$data['events'] = $this->check_event_expiry($events);
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/light');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('san_francisco',$data);
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('modal');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/san_francisco');
		$this->load->view('js/light');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function whatsnew($slug)
	{
		$data = $this->wm->get_whats_new($slug);
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		// echo "<pre>"; print_r($data); die;
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('whatenew',$data);
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('modal');
		$this->load->view('footer/footer_common');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}

	public function register_whats_new()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required');
		// $this->form_validation->set_rules('message','Message','required');
		$this->form_validation->set_rules('contact','Mobile Number','required|regex_match[/^[0-9]{10,15}$/]');

		if($this->form_validation->run()){
			$data_array = array(
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'contact'	=> $this->input->post('contact'),
				'source'	=> 'whats_new/'.$this->input->post('whats_new_name'),
				'message'	=> $this->input->post('message'),
			);

			$save = $this->wm->insert_data('tbl_leads',$data_array);
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

	public function london()
	{
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		$events = $this->wm->get_events_by_street('London Street');
		$data['events'] = $this->check_event_expiry($events);
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/light');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('london',$data);
		$this->load->view('more_expoler');
		$this->load->view('street-modals');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('modal');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/london');
		$this->load->view('js/light');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function paris()
	{
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		$events = $this->wm->get_events_by_street('Paris Street');
		$data['events'] = $this->check_event_expiry($events);
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/light');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('paris',$data);
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('modal');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/paris');
		$this->load->view('js/light');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function privacy_policy()
	{
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		$data['events'] = $this->wm->get_events();
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('privacy_policy');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	
	public function term_conditions()
	{
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		$data['events'] = $this->wm->get_events();
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('term_conditions');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function brand($id)
	{
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		$data['events'] = $this->wm->get_events();
		$data['about_brand'] = $this->wm->get_about_brand($id);

		// $data['key_info'] = array_merge(explode(',',$data['about_brand']['brand_category']),(!empty($data['about_brand']['brand_sub_category']))?explode(',',$data['about_brand']['brand_sub_category']):[]);
		$data['key_info'] = explode(',',$data['about_brand']['brand_sub_category']);
		$data['what_new'] = $this->wm->get_what_new($id,$data['about_brand']['brand_street']);
		// echo $this->db->last_query(); die;
		$data['similar_brands'] = $this->wm->get_similar_brands($id,$data['about_brand']['brand_type'],null);
		$data['first_similar_brands'] = $this->wm->get_similar_brands($id,$data['about_brand']['brand_type'],6);
		$data['second_similar_brands'] = $this->wm->get_similar_brands($id,$data['about_brand']['brand_type'],6,6);
		$data['third_similar_brands'] = $this->wm->get_similar_brands($id,$data['about_brand']['brand_type'],6,12);
		// echo "<pre>"; print_r($data['first_similar_brands']);
		// echo "<pre>"; print_r($data['second_similar_brands']);
		// echo "<pre>"; print_r($data['third_similar_brands']); die;
		$this->load->view('header/header_start',$data['about_brand']);
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('brand',$data);
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/brand');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function event()
	{
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		$events = $this->wm->get_events();
		$data['events'] = $this->check_event_expiry($events);
		$data['what_new'] = $this->wm->get_what_new();
		$past_event= $this->wm->get_past_events();
		$data['past_event'] = $this->filter_expired_events($past_event);
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('event',$data);
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/event');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}

	public function event_details($slug)
	{
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		$data['event'] = $this->wm->get_event_detail($slug);
		$data['what_new'] = $this->wm->get_what_new();
		$past_event= $this->wm->get_past_events();
		$data['past_event'] = $this->filter_expired_events($past_event);
		// echo "<pre>"; print_r($data['event']); die;
		$this->load->view('header/header_start',$data['event']);
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('event-details',$data);
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/event');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}

	public function brand_directory($category=null,$limit=8)
	{
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		$category = str_replace('%20',' ',$category);
		$data['brand_banner'] = $this->wm->get_brand_directory_banner($category);
		$data['brand_offers'] = $this->wm->get_brand_offers();
		$data['main_category'] = $this->wm->main_category();
		$data['count'] = $this->wm->get_all_brands($category,$limit,true);
		$data['brand'] = $this->wm->get_all_brands($category,$limit);
		$data['what_new'] = $this->wm->get_what_new();
		$data['filter'] = $this->wm->get_filters();
		if($limit != 'null' && $data['count'] > $limit){
			$data['limit'] = $limit + 8;
		} else {
			$data['limit'] = '';
		}
		// echo "<pre>"; print_r($data); die;
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/select2_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('brand_diractory',$data);
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/brand_diractory');
		$this->load->view('js/select2_js');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	
	public function contact_us()
	{
		$data['whats_new_link'] = $this->wm->get_data_array('tbl_whats_new',"name_slug,name",$where = "status=0");
		if($this->input->post()){
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('contact','Contact','required|regex_match[/^[0-9]{10,15}$/]');
			$this->form_validation->set_rules('query_type','Query Type','required');
			// $this->form_validation->set_rules('message','Message','required');

			if($this->form_validation->run()){
				$data_array = array(
					'name'			=> $this->input->post('name'),
					'email'			=> $this->input->post('email'),
					'contact'		=> $this->input->post('contact'),
					'message'		=> $this->input->post('message'),
					'query_type'	=> $this->input->post('query_type'),
					'source'		=> "Contact Us"
				);

				$save = $this->wm->insert_data('tbl_leads',$data_array);
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
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/select2_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header',$data);
		$this->load->view('contact_us');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/select2_js');
		$this->load->view('js/common');
		$this->load->view('js/contact');
		$this->load->view('footer/body_end');
	}
	
	public function sign_up()
	{

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('contact','Mobile Number','required|regex_match[/^[0-9]{10,15}$/]');

		if($this->form_validation->run()){
			$data_array = array(
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'contact'	=> $this->input->post('contact'),
				'source'	=> "Sign Up Form",
				'source_url'	=>$this->input->post('source_url'),
			);



			$save = $this->wm->insert_data('tbl_leads',$data_array);
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

	public function register()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('message','Message','required');
		$this->form_validation->set_rules('contact','Mobile Number','required|regex_match[/^[0-9]{10,15}$/]');

		if($this->form_validation->run()){
			$data_array = array(
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'contact'	=> $this->input->post('contact'),
				'source'	=> 'events',
				'event_name'	=> $this->input->post('event_name'),
				'message'	=> $this->input->post('message'),
			);

			$save = $this->wm->insert_data('tbl_leads',$data_array);
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

	public function get_brands()
	{
		$type = $this->input->post('type');
		$data = $this->wm->get_brands($type,$street='');
		echo json_encode($data);
	}

	public function get_brands_like()
	{
		$type = $this->input->post('type');
		$street = str_replace("-"," ",$this->input->post('street'));
		$data = $this->wm->get_brands_like($type,$street);
		echo json_encode($data);
	}

	public function search_brand()
	{
		$street = ($this->input->post('street'))?$this->input->post('street'):'';
		$sort = ($this->input->post('sort'))?$this->input->post('sort'):'';
		$filter = ($this->input->post('filter'))?$this->input->post('filter'):'';
		$limit = ($this->input->post('limit'))?$this->input->post('limit'):"8";
		$letter = ($this->input->post('letter'))?$this->input->post('letter'):"";
		$category = ($this->input->post('category'))?$this->input->post('category'):'';
		$count = $this->wm->filter_brand($street,$sort,$filter,$limit,$letter,$category,true);
		$data['brand'] = $this->wm->filter_brand($street,$sort,$filter,$limit,$letter,$category);
		if($limit != 'null' && $count > $limit){
			$data['limit'] = $limit + 8;
			$data['count'] = $count;
		} else {
			$data['limit'] = '';
			$data['count'] = $count;
		}
		echo json_encode($data);
	}

	public function check_event_expiry($events)
	{
		$active_events = [];
		foreach($events as $event){
			if($event['end_date'] >= date('Y-m-d')|| $event['end_date']=== '1970-01-01'){
						$active_events[] = $event;
			}
		}
		return $active_events;
	}

	public function filter_expired_events($events)
	{
		// echo "<pre>";
		$expired_events = [];
		foreach($events as $event){
			if($event['end_date'] < date('Y-m-d') ){
						$expired_events[] = $event;
			}
		}
		// print_r($events);
		// print_r($expired_events); die;
		return $expired_events;
	}
	
	
}
