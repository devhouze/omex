<?php

class Brands_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Brands_Model','bm');
    }

    public function brand_list()
    {
        $per_page = "10";
        $page = $this->uri->segment(2);
        if ($page != 0) {
			$page = ($page - 1) * $per_page;
        } else {
            $page = 0;
        }
        $total_count = $this->bm->get_brands($per_page,$page,true);
        $data['pagination'] = $this->pagination('brands',$total_count,$per_page);
        $data['brands'] = $this->bm->get_brands($per_page,$page);
        $end = (($data['brands'])?count($data['brands']):0) + (($page) ? $page : 0);
        $start = (count($data['brands']) > 0)?($page + 1):0;
        $data['result_count'] = "Showing " . $start . " - " . $end . " of " . $total_count . " Results";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/brands/brand-list',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }

    public function add_brand()
    {
        $data['brand'] = "";
        $this->load->view('admin/include/header_start');
		$this->load->view('admin/include/header_end');
		$this->load->view('admin/include/body_start');
        $this->load->view('admin/include/sidebar');
		$this->load->view('admin/brands/add-brand',$data);
		$this->load->view('admin/include/body_end');
		$this->load->view('admin/include/admin_js');
    }
}
?>