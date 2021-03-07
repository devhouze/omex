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
        $query = $this->db->select('brand_logo, alt_comment')
                          ->where('status',0)
                          ->order_by('id','desc')
                          ->get('tbl_brand');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }
}

?>