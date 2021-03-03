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

    public function get_message()
    {
        $lead_id = $this->input->post('lead_id');
        $data = $this->lm->get_data_row_array('tbl_leads',"message",['id' => $lead_id]);
        echo json_encode($data);
    }
}
?>