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
		// echo "<pre>"; print_r($data); die;
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('index',$data);
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('modal');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/home');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function athens()
	{
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('athens');
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/street');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function portugal()
	{
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('portugal');
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/portugal');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function hong_kong()
	{
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('hong_kong');
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/hong_kong');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function amsterdam()
	{
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('amsterdam');
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/amsterdam');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function san_francisco()
	{
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('san_francisco');
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/san_francisco');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function london()
	{
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('london');
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/london');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function paris()
	{
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('paris');
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/paris');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function brand()
	{
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('brand');
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
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('event');
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/event');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	public function brand_directory()
	{
		$data['brand_banner'] = $this->wm->get_brand_directory_banner();
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('brand_diractory',$data);
		$this->load->view('more_expoler');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/brand_diractory');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	
	public function contact_us()
	{
		if($this->input->post()){
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('contact','Contact','required');
			$this->form_validation->set_rules('query_type','Query Type','required');
			$this->form_validation->set_rules('message','Message','required');

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
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('contact_us');
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/common');
		$this->load->view('footer/body_end');
	}
	
	public function sign_up()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('contact','Mobile Number','required');

		if($this->form_validation->run()){
			$data_array = array(
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'contact'	=> $this->input->post('contact'),
				'source'	=> "Sign Up Form",
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
		$data = $this->wm->get_brands($type);
		echo json_encode($data);
	}
	
	
}
