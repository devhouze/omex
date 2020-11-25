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
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/index');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	public function login()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/login');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}

	public function register()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/register');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	public function forgot_password()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/forgot_password');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	public function error404()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/404');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	public function blank()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/blank');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	
	public function utilities_other()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/utilities_other');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	public function utilities_color()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/utilities_color');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	public function utilities_border()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/utilities_border');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	public function utilities_animation()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/utilities_animation');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	public function tables()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/tables');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}

	public function cards()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/cards');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	public function buttons()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/buttons');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	public function charts()
	{
		$this->load->view('admin/include/header_satrt');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/charts');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/admin_js');
	}
	
	
}
