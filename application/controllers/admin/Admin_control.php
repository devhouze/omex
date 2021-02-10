<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_control extends CI_Controller {

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
		$this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/index');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
	}
	public function sign_in()
	{
		$this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/sign_in');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
	}
	public function sign_up()
	{
		$this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/sign_up');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
	}
	public function forgot_password()
	{
		$this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/forgot_password');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
	}	
	
}
