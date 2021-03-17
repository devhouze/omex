<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_events($per_page,$page,$keyword,$column,$order,$count = false)
    {
        $this->db->select('event_name, date_available, start_date, end_date, event_type, te.status, event_id, name as created_by, date_format(te.created_on,"%d-%m-%Y") as created_on');
        $this->db->join('tbl_admin ta','te.created_by = admin_id');
        (!$count)?$this->db->limit($per_page,$page):'';
        (!empty($keyword['event_name']))?$this->db->like('event_name',$keyword['event_name']):'';
        (!empty($keyword['status']))?$this->db->where('status',$keyword['status']):'';
        (!empty($keyword['event_type']))?$this->db->like('event_type',$keyword['event_type']):'';
        (!$count)?$this->db->limit($per_page,$page):'';
        $this->db->where('te.status !=',2);
        (!empty($column) && !empty($order))?$this->db->order_by($column,$order):$this->db->order_by('event_id','desc');
        $query = $this->db->get('tbl_event te');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_event_details($id)
    {
        $this->db->select('event_name, date_available, start_date, end_date, event_type, (case when te.status = 0 then "Active" WHEN te.status = 1 THEN "Inactive" end) as status, event_id, brand_name, event_location, event_start_time, event_end_time, about_event, event_label, event_street, event_category, show_brand, ');
        $this->db->join('tbl_admin ta','te.created_by = admin_id');
        $this->db->join('tbl_brand','te.brands = brand_id','left');
        $this->db->where('event_id',$id);
        $query = $this->db->get('tbl_event te');
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        } 
        return [];
    }
}
?>