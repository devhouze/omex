<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('index');
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
	public function brand_diractory()
	{
		$this->load->view('header/header_start');
		$this->load->view('header/header_common');
		$this->load->view('header/owl_css');
		$this->load->view('header/header_end');
		$this->load->view('header/body_start');
		$this->load->view('header/main_header');
		$this->load->view('brand_diractory');
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
	
	
	
	
}
