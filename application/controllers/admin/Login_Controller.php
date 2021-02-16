<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Login_Model','lm');
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

    public function validate_login()
    {
        if($this->input->post()){
            if($this->form_validation->run('admin_login')){
                $data = array(
                    'username'      => $this->input->post('username'),
                    'password'      => $this->input->post('password')
                );
                $validate = $this->lm->validate_admin($data);
                if($validate['status'] == 0){
                    echo json_encode($validate);
                } else {
                    unset($validate['data']['password']);
                    $this->session->set_userdata('admin_details',$validate['data']);
                    echo json_encode(['message' => 'Login Success', 'status' => 1]);
                }
            } else {
                echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
            }
        }
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

    public function validate_email(){
        $input = $this->input->post('email');
        $this->form_validation->set_rules('email','Email','required|trim');
        if($this->form_validation->run()){
            $validate_email = $this->lm->validate_email($input);
            if($validate_email['status'] == 1){
                echo json_encode($validate_email);
            } else {
                echo json_encode(['message' => 'Email does not belong to any account.', 'status' => 0]);
            }
        } else {
            echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
        }
    }

    public function logout(){
        $this->session->sess_destroy('admin_details');
        return redirect('admin');
    }
}
?>