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
        $this->db->select('id, tbl_leads.name, tbl_leads.email, contact, tbl_admin.name as created_by, date_format(tbl_leads.created_on,"%d-%M-%Y") as created_on');
        $this->db->join('tbl_admin','admin_id = tbl_leads.created_by');
        (!$count)?$this->db->limit($per_page,$page):'';
        $this->db->where('tbl_leads.status !=',2);
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