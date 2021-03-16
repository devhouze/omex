<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function banners_list($per_page,$page,$keyword,$column,$order,$count=false)
    {
        $this->db->select('id, banner_web, banner_mobile, tbl_banner.status, tbl_admin.name as created_by, date_format(tbl_banner.created_on,"%d-%m-%Y") as created_on, (case when banner_type = 1 then "Home" when banner_type = 2 then "Event" when banner_type = 3 then "Brand Directory" when banner_type = 4 then "Brand Discount"  when banner_type = 5 then "Brand"  when banner_type = 6 then "About Brand" end) as banner_type, comment');
        $this->db->join('tbl_admin','admin_id = tbl_banner.created_by');
        $this->db->where('tbl_banner.status !=',2);
        (!empty($keyword['banner_type']))?$this->db->like('banner_type',$keyword['banner_type']):'';
        (!empty($keyword['status']))?$this->db->where('tbl_banner.status',$keyword['status']):'';
        (!$count)?$this->db->limit($per_page,$page):'';
        (!empty($column) && !empty($order))?$this->db->order_by($column,$order):$this->db->order_by('id','desc');
        $query = $this->db->get('tbl_banner');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->result_array();
        }
        return [];
    }

    public function banner_details($banner_id)
    {
        $query = $this->db->select('street, (case when banner_type = 1 then "Home Page" when banner_type = 2 then "Event Page" when banner_type = 3 then "Brand Directory Page" when banner_type = 4 then "Brand Discount" when banner_type = 5 then "Brand" when banner_type = 6 then "About Brand" end) as banner_type, tb.banner_web, tb.banner_mobile, comment, (case when tb.status = 0 then "Active" when tb.status = 2 then "Inactive" end) as status, brand_name')
                          ->join('tbl_brand','brand_id = brand','left')
                          ->where('tb.id',$banner_id)
                          ->get('tbl_banner tb');
        if($query->num_rows() > 0){
            return $query->row_array();
        }
        return [];
    }
}

?>