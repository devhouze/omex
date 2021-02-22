<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_events($per_page,$page,$count = false)
    {
        $this->db->select('name as created_by, date_format(te.created_on,"%d-%M-%Y") as created_on');
        $this->db->join('tbl_admin ta','te.created_by = admin_id');
        (!$count)?$this->db->limit($per_page,$page):'';
        $query = $this->db->get('tbl_event te');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }
}
?>