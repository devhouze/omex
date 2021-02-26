<?php
defined('BASEPATH') or exit('No Direct Access Allowed');

class MY_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function admin_id()
    {
        $check_admin = $this->session->userdata('admin_details');
        if(!empty($check_admin)){
            return $check_admin['admin_id'];
        }
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
    
}
?>