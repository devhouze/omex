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
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/home');
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
		$this->load->view('footer/footer_signup');
		$this->load->view('footer/main_footer');
		$this->load->view('footer/footer_common');
		$this->load->view('js/owl');
		$this->load->view('js/street');
		$this->load->view('footer/body_end');
	}
}
