<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends MY_Controller {
	
	public function sign_up()
	{
		$this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/sign_up');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
	}
}
