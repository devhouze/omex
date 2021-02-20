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
        $this->db->select('ta.admin_id, ta.name, ta.email, (CASE WHEN ta.user_type = "0" THEN "Admin" WHEN ta.user_type = "1" THEN "Editor" WHEN ta.user_type = "2" THEN "Sales Executive" END) as user_type, cb.name as created_by, date_format(ta.created_on,"%d-%M-%Y") as created_on');
        $this->db->join('tbl_admin cb','cb.created_by = ta.admin_id');
        (!$count)?$this->db->limit($per_page,$page):'';
        $query = $this->db->get('tbl_admin ta');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }
}
?>