<?php 
defined('BASEPATH') or exit('No direct access allowed');

class Login extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('admin/login_model','login');
    }

    public function index(){
        if($this->input->post()){
            if($this->form_validation->run('admin_login')){
            $credentials = array(
                'email'      => $this->input->post('email'),
                'password'   => md5($this->input->post('password'))
            );    
            $check = $this->login->check_admin($credentials);
            unset($check->password);
            // $this->session->set_userdata('admin_detail',$check);
            return redirect('admin/dashboard');
            }
        }
        $this->load->view('admin/login');
    }
}
?>