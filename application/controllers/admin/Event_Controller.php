<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Event_Model','em');
    }

    public function events_list($page = 0)
    {
        $per_page = "10";
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        }
        $total_count = $this->em->get_events($per_page,$page,true);
        $data['pagination'] = $this->pagination('events',$total_count,$per_page);
        $data['events'] = $this->em->get_events($per_page,$page);
        $end = (($data['events'])?count($data['events']):0) + (($page) ? $page : 0);
        $start = (count($data['events']) > 0)?($page + 1):0;
        $data['result_count'] = "Showing " . $start . " - " . $end . " of " . $total_count . " Results";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/event_management/event-list',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function add_events()
    {
        $data['events'] = [];
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/event_management/add-event',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }
}
?>