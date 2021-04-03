<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_leads($per_page,$page,$keyword,$column,$order,$count = false)
    {   
        (!empty($keyword['date_from']) && empty($keyword['date_to']))?$end_date = date('Y-m-d'):$end_date = $keyword['date_to'];
   $this->db->select('id, name, email,contact, source, event_name, query_type,message,source_url,date_format(registered_at,"%d-%m-%Y %H:%i") as registered_at');
        (!$count)?$this->db->limit($per_page,$page):'';
        (!empty($keyword['name']))?$this->db->like('name',$keyword['name']):'';
        (!empty($keyword['name']))?$this->db->or_like('email',$keyword['name']):'';
        (!empty($keyword['query_type']))?$this->db->where('query_type',$keyword['query_type']):'';
        (!empty($keyword['date_from']))?$this->db->where("registered_at between '".$keyword['date_from']."' and '".$end_date."'"):'';
        (!$count)?$this->db->limit($per_page,$page):'';
        (!empty($column) && !empty($order))?$this->db->order_by($column,$order):$this->db->order_by('id','desc');
        $query = $this->db->get('tbl_leads');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->result_array();
        }
        return [];
    }

}
?>