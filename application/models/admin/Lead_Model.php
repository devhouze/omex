<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_leads($per_page,$page,$count = false)
    {
        $this->db->select('id, name, email, source, event_name, query_type, contact, date_format(registered_at,"%d-%m-%Y") as registered_at');
        (!$count)?$this->db->limit($per_page,$page):'';
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_leads');
        // echo $this->db->last_query(); die;
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->result_array();
        }
        return [];
    }

}
?>