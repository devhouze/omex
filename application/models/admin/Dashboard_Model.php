<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Model extends MY_Model
{
    function __construct(){
        parent::__construct();
    }

    public function get_total_count()
    {
        $data[] = $this->db->select('COUNT(*) as event_count')->where('status !=','2')->get('tbl_event')->row_array();
        $data[] = $this->db->select('COUNT(*) as brand_count')->where('status !=','2')->get('tbl_brand')->row_array();
        $data[] = $this->db->select('COUNT(*) as user_count')->where('status !=','2')->get('tbl_admin')->row_array();
        $data[] = $this->db->select('COUNT(*) as lead_count')->get('tbl_leads')->row_array();
        return $data;
    }
}
?>