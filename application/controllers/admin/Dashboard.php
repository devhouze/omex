<?php
defined('BASEPATH') or exit('No direct access allowed');

class Dashboard extends MY_Controller{
    function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('admin/includes/header');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/includes/footer');
    }
}
?>