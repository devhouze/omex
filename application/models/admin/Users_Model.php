<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_users($per_page,$page,$count = false)
    {
        $this->db->select('ta.admin_id, ta.name, ta.email, tbl_admin.name as created_by, (CASE WHEN ta.user_type = "0" THEN "Admin" WHEN ta.user_type = "1" THEN "Editor" WHEN ta.user_type = "2" THEN "Sales Executive" END) as user_type , date_format(ta.created_on,"%d-%M-%Y") as created_on');
        $this->db->join('tbl_admin','ta.created_by = tbl_admin.admin_id');
        (!$count)?$this->db->limit($per_page,$page):'';
        $this->db->where('ta.status',0);
        $this->db->order_by('ta.admin_id','desc');
        $query = $this->db->get('tbl_admin ta');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function check_username($username)
    {
        $query = $this->db->get_where('tbl_admin',['user_name' => $username]);
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }
}
?>