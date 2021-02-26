<?php

class Lead_controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Lead_Model','lm');
    }

    public function lead_list($page = 0)
    {
        $per_page = "10";
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        }
        $total_count = $this->lm->get_leads($per_page,$page,true);
        $data['pagination'] = $this->pagination('leads',$total_count,$per_page);
        $data['leads'] = $this->lm->get_leads($per_page,$page);
        $end = (($data['leads'])?count($data['leads']):0) + (($page) ? $page : 0);
        $start = (count($data['leads']) > 0)?($page + 1):0;
        $data['result_count'] = "Showing " . $start . " - " . $end . " of " . $total_count . " Results";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/lead_management/lead-list',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function add_lead()
    {
        $data['lead'] = '';
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/lead_management/add_lead',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function save_lead()
    {
        if($this->form_validation->run('add_lead')){
            $data_array = array(
                'name'          => $this->input->post('name'),
                'email'         => $this->input->post('email'),
                'contact'       => $this->input->post('contact'),
                'password'      => md5($this->input->post('password')),
                'created_on'    => date('Y-m-d H:i:s'),
                'created_by'    => $this->lm->admin_id()
            );
            $data = $this->security->xss_clean($data_array);
            $save = $this->lm->insert_data('tbl_leads',$data);
            if($save){
                echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
            } else {
                echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
            }
        } else {
            echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
        }
    }

    public function edit_lead($id)
    {
        $data['lead'] = $this->lm->get_data_row('tbl_leads','*',['id' => $id]);
        unset($data['lead']->password);
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/lead_management/add_lead',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function update_lead()
    {
        if($this->form_validation->run('edit_lead')){
            $data_array = array(
                'name'          => $this->input->post('name'),
                'email'         => $this->input->post('email'),
                'contact'       => $this->input->post('contact'),
                'updated_on'    => date('Y-m-d H:i:s'),
                'updated_by'    => $this->lm->admin_id()
            );
            (!empty($this->input->post('password')))?($data_array['password'] = md5($this->input->post('password'))):'';
            $id = $this->input->post('lead_id');
            $data = $this->security->xss_clean($data_array);
            $save = $this->lm->update_data('tbl_leads',$data,['id' => $id]);
            if($save){
                echo json_encode(['message' => 'Data saved successfully.', 'status' => 1]);
            } else {
                echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
            }
        } else {
            echo json_encode(['message' => 'Something went wrong!.', 'error' => $this->form_validation->error_array(), 'status' => 0]);
        }
    }

    public function delete_lead()
    {
        $lead_id = $this->input->post('lead_id');
        $update = $this->lm->update_data('tbl_leads',['status' => 2],['id' => $lead_id]);
        if($update){
            echo json_encode(['message' => 'Data deleted successfully.', 'status' => 1]);
        } else {
            echo json_encode(['message' => 'Something went wrong!.','status' => 0]);
        }
    }
}
?>