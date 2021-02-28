<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function banners_list($per_page,$page,$count=false)
    {
        $query = $this->db->select('id, banner_web, banner_mobile, tbl_banner.status, tbl_admin.name as created_by, date_format(tbl_banner.created_on,"%d-%m-%Y") as created_on, (case when banner_type = 1 then "Home" when banner_type = 2 then "Event" when banner_type = 3 then "Brand Directory" when banner_type = 4 then "Brand Discount"  when banner_type = 5 then "Brand"  when banner_type = 6 then "About Brand" end) as banner_type, comment')
                          ->join('tbl_admin','admin_id = tbl_banner.created_by')
                          ->where('tbl_banner.status !=',2)
                          ->order_by('id','desc')
                          ->get('tbl_banner');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->result_array();
        }
        return [];
    }
}

?>