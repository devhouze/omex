<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Controller extends MY_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('admin/Dashboard_Model','dm');
    }

    public function index()
	{
		$data['counts'] = $this->dm->get_total_count();
		$this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/sidebar');
		$this->load->view('admin/index',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
	}

	public function admin_profile()
	{
		$admin_id = $this->dm->admin_id();
		$data['admin_profile'] = $this->dm->get_data_row('tbl_admin','*',['admin_id' => $admin_id]);
		unset($data['admin_profile']->password);
		$this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/sidebar');
		$this->load->view('admin/profile',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
	}

	public function save_admin_profile()
	{
		if($this->form_validation->run('admin_profile')){
			$data_array = array(
				'name'			=> $this->input->post('name'),
				'email'			=> $this->input->post('email'),
				'updated_by'	=> $this->dm->admin_id(),
				'updated_on'	=> date('Y-m-d H:i:s')
			);
			$admin_id = $this->dm->admin_id();
			(!empty($this->input->post('password')))?($data_array['password'] = md5($this->input->post('password'))):'';
			$update = $this->dm->update_data('tbl_admin',$data_array,['admin_id' => $admin_id]);
			if($update){
				echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
			} else {
				echo json_encode(['message' => 'Something went wrong!.', 'status' => 0]);
			}
		} else {
            echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
        }
	}

	public function change_password()
	{
		if($this->input->post()){
			if($this->form_validation->run('change_password')){
				$data_array = array(
					'password'	=> md5($this->input->post('password'))
				);
				$admin_id = $this->dm->admin_id();
				$update = $this->dm->update_data('tbl_admin',$data_array,['admin_id' => $admin_id]);
				if($update){
					echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
				} else {
					echo json_encode(['message' => 'Something went wrong!.', 'status' => 0]);
				}
			} else {
				echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
			}
			exit;
		}
		$this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
		$this->load->view('admin/include/sidebar');
		$this->load->view('admin/change-password');
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
	}
}
?>