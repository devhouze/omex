<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Controller extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Users_Model','um');
	}
	
	public function users_list($page = 0)
	{
		$per_page = "10";
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        }
        $total_count = $this->um->get_users($per_page,$page,true);
        $data['pagination'] = $this->pagination('users',$total_count,$per_page);
        $data['users'] = $this->um->get_users($per_page,$page);
        $end = (($data['users'])?count($data['users']):0) + (($page) ? $page : 0);
        $start = (count($data['users']) > 0)?($page + 1):0;
        $data['result_count'] = "Showing " . $start . " - " . $end . " of " . $total_count . " Results";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/user_management/users-list',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
	}

	public function add_users()
	{
		$data['users'] = [];
		if($this->input->post()){
			if($this->form_validation->run('add_users')){
				$data_array = array(
					'user_type'		=> $this->input->post('user_type'),
					'user_name'		=> $this->input->post('user_name'),
					'name'			=> $this->input->post('name'),
					'email'			=> $this->input->post('email'),
					'password'		=> $this->input->post('password'),
					'created_by'	=> $this->um->admin_id()
				);
				$save = $this->um->insert_data('tbl_admin',$data_array);
				if($save){
					echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
				} else {
					echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
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
		$this->load->view('admin/user_management/add-users',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
	}
}
