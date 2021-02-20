<?php
defined('BASEPATH') or exit('No Direct Access Allowed');

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $check_admin = $this->session->userdata('admin_details');
        if(empty($check_admin)){
            return redirect('admin');
        }
    }

    public function pagination($base_url, $total_row, $per_page = 5, $uri = 3)
    {
        $config = array();
        $config["base_url"] = admin_url($base_url);
        $config["total_rows"] = $total_row;
        $config["per_page"] = $per_page;
        $config["uri_segment"] = $uri;

        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);

        $data["page"] = ($this->uri->segment($uri)) ? $this->uri->segment($uri) : 0;
        $data["per_page"] = $per_page;
        $data["links"] = $this->pagination->create_links();

        return $data;
    }
    
}
?>