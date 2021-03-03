<?php

class Brands_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Brands_Model','bm');
    }

    public function get_brands($per_page,$page,$count=false)
    {
        $query = $this->db->select('brand_id, brand_name, tbl_brand.status, tbl_admin.name as created_by, date_format(tbl_brand.created_on,"%d-%m-%Y") as created_on, brand_location, brand_logo')
                          ->join('tbl_admin','admin_id = tbl_brand.created_by')
                          ->where('tbl_brand.status !=',2)
                          ->order_by('brand_id','desc')
                          ->get('tbl_brand');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->result_array();
        }
        return [];
    }

    public function get_brands_logo($per_page,$page,$count=false)
    {
        $query = $this->db->select('id, bl.name, bl.status, brand_logo, tbl_admin.name as created_by, date_format(bl.created_on,"%d-%m-%Y") as created_on, alt_comment')
                          ->join('tbl_admin','admin_id = bl.created_by')
                          ->where('bl.status !=',2)
                          ->order_by('id','desc')
                          ->get('tbl_brand_logo bl');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->result_array();
        }
        return [];
    }

    public function get_brand_details($id)
    {
        $this->db->select('brand_id, brand_name, brand_logo, logo_message, about_brand, brand_website, brand_label, from_hour_week, to_week_hour, to_weekend_hour, from_hour_weekend, brand_location, brand_street, brand_type, brand_category, brand_sub_category, brand_audience, brand_contact, brand_contact_email, store_map, show_on_home, brand_offer_status, brand_offer_name,brand_offer, brand_offer_validity, brand_offer_validity, about_brand_offer, brand_tag,brand_offer_thumbnail, (case when tb.status = 0 then "Active" WHEN tb.status = 1 THEN "Inactive" end) as status, brand_offer, brand_offer_thumbnail_message');
        $this->db->join('tbl_admin ta','tb.created_by = admin_id');
        $this->db->where('brand_id',$id);
        $query = $this->db->get('tbl_brand tb');
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        } 
        return [];
    }
}
?>