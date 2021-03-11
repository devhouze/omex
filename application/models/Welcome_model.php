<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_data_array($table,$column = "*", $where = "")
    {
        $this->db->select($column);
        ($where)?$this->db->where($where):"";
        $query = $this->db->get($table);
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_data_object($table,$column = "*",$where = "")
    {
        $this->db->select($column);
        ($where)?$this->db->where($where):"";
        $query = $this->db->get($table);
        if($query->num_rows() > 0){
            return $query->result();
        }
        return [];
    }

    public function get_data_row($table,$column = "*",$where = "")
    {
        $this->db->select($column);
        ($where)?$this->db->where($where):"";
        $query = $this->db->get($table);
        if($query->num_rows() > 0){
            return $query->row();
        }
        return [];
    }

    public function get_data_row_array($table,$column = "*",$where = "")
    {
        $this->db->select($column);
        ($where)?$this->db->where($where):"";
        $query = $this->db->get($table);
        if($query->num_rows() > 0){
            return $query->row_array();
        }
        return [];
    }

    public function insert_data($table,$data = [])
    {
        $save = $this->db->insert($table,$data);

        if($save)
        {
            return $this->db->insert_id();
        }
        else
        {
            return false;
        }
    }

    public function update_data($table,$data = [],$where = null)
    {
        $update = $this->db->update($table,$data,$where);

        if($update)
        {
            return true;
        }
        else
        {
            return false;
        }
    }



    public function get_home_banner()
    {
        $query = $this->db->select('banner_web, comment')
                          ->where('status',0)
                          ->where('banner_type',1)
                          ->limit(3)
                          ->order_by('id','desc')
                          ->get('tbl_banner');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_brand_logo()
    {
        $query = $this->db->select('brand_logo, banner_comment')
                          ->where('status',0)
                          ->where('show_on_home','Yes')
                          ->order_by('order_home','desc')
                          ->get('tbl_brand');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_events()
    {
        $query = $this->db->select('event_name, thumbnail_image, thumbnail_message, event_start_time, event_end_time, show_reg_btn, date_available, start_date, end_date, thumbnail_image, about_event, event_category, show_reg_btn')
                          ->where('status',0)
                          ->where('end_date >',date('Y-m-d'))
                          ->get('tbl_event');
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return [];
    }

    public function get_brands($type)
    {
        $query = $this->db->select('brand_logo, logo_message')
                          ->where('status',0)
                          ->where('show_on_home','Yes')
                          ->where('brand_type',$type)
                          ->order_by('brand_id','desc')
                          ->order_by('order_home','asc')
                          ->limit(10)
                          ->get('tbl_brand');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_brand_directory_banner()
    {
        $query = $this->db->select('banner_web, banner_mobile, comment')
                          ->where('status',0)
                          ->where('banner_type',3)
                          ->order_by('id','desc')
                          ->get('tbl_banner');
        if($query->num_rows() > 0){
        return $query->result_array();
        }
        return [];
    }

    public function get_brand_offers()
    {
        $query = $this->db->select('offer_thumbnail, thumbnail_alt, about_offer')
                          ->where('status',0)
                          ->get('tbl_brand_offer');
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return [];
    }

    public function get_all_brands()
    {
        $query = $this->db->select('brand_name, brand_logo, logo_message, brand_location, brand_id')
                          ->where('status',0)
                          ->get('tbl_brand');
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return [];
    }
}

?>