<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Controller extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('admin/Dashboard_model','dm');
    }

    public function index()
	{
		$this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/sidebar');
		$this->load->view('admin/index');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
	}
}
?>