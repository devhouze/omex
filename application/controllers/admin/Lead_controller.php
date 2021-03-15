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

        if($this->input->post('search')){
           
            $search = array(
                'name'              => trim($this->input->post('name')),
                'email'             => trim($this->input->post('email')),
                'query_type'        => $this->input->post('query_type'),
                'date_from'         => date('Y-m-d',strtotime($this->input->post('from_date'))),
                'date_to'           => date('Y-m-d',strtotime($this->input->post('to_date')))
            );

            $this->session->set_userdata('lead',$search);
        }

        if($this->input->post('reset')){
            $this->session->unset_userdata('lead');
        }
        $keyword = $this->session->userdata('lead');
        
        $total_count = $this->lm->get_leads($per_page,$page,$keyword,true);
        $data['pagination'] = $this->pagination('leads',$total_count,$per_page);
        $data['leads'] = $this->lm->get_leads($per_page,$page,$keyword);
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

    public function exportCSV(){ 
        // file name 
        $filename = 'leads_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");
        
        // get data 
        $lead_data = $this->lm->get_data_array('tbl_leads');
     
        // file creation 
        $file = fopen('php://output', 'w');
      
        $header = array("S.No","Name","Email","Contact","Source","Event Name","Query Type","Message","Registered At"); 
        fputcsv($file, $header);
        foreach ($lead_data as $key=>$line){ 
          fputcsv($file,$line); 
        }
        fclose($file); 
        exit; 
       }
}
?>