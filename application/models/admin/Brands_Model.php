<?php

class Brands_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Brands_Model','bm');
    }

    public function get_brands($per_page,$page,$keyword,$column,$order,$count=false)
    {
        $this->db->select('brand_id, brand_name, tbl_brand.status, tbl_admin.name as created_by, date_format(tbl_brand.created_on,"%d-%m-%Y") as created_on, brand_location, brand_logo');
        $this->db->join('tbl_admin','admin_id = tbl_brand.created_by');
        $this->db->where('tbl_brand.status !=',2);
        (!empty($keyword['brand_name']))?$this->db->like('brand_name',$keyword['brand_name']):'';
        (!empty($keyword['status']))?$this->db->where('tbl_brand.status',$keyword['status']):'';
        (!$count)?$this->db->limit($per_page,$page):'';
        (!empty($column) && !empty($order))?$this->db->order_by($column,$order):$this->db->order_by('brand_id','desc');
        $query = $this->db->get('tbl_brand');
        // echo $this->db->last_query();
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->result_array();
        }
        return [];
    }

    public function get_brands_offer($per_page,$page,$keyword,$column,$order,$count=false)
    {
       $this->db->select('offer_id, offer_name, tbl_brand_offer.status, tbl_admin.name as created_by, date_format(tbl_brand_offer.created_on,"%d-%m-%Y") as created_on, offer_thumbnail, thumbnail_alt, brand_name');
        $this->db->join('tbl_admin','admin_id = tbl_brand_offer.created_by');
        $this->db->join('tbl_brand','tbl_brand_offer.brand_id = tbl_brand.brand_id');
        $this->db->where('tbl_brand_offer.status !=',2);
        (!empty($keyword['brand_name']))?$this->db->like('brand_name',$keyword['brand_name']):'';
        (!empty($keyword['offer_name']))?$this->db->like('offer_name',$keyword['offer_name']):'';
        (!empty($keyword['status']))?$this->db->where('tbl_brand.status',$keyword['status']):'';
        (!$count)?$this->db->limit($per_page,$page):'';
        (!empty($column) && !empty($order))?$this->db->order_by($column,$order):$this->db->order_by('offer_id','desc');
        $query = $this->db->get('tbl_brand_offer');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->result_array();
        }
        return [];
    } 

    public function get_brand_details($id)
    {
        $this->db->select('brand_id, brand_name, brand_logo, logo_message, about_brand, brand_website, brand_label, from_hour_week, to_week_hour, to_weekend_hour, from_hour_weekend, brand_location, brand_street, brand_type, brand_category, brand_sub_category, brand_audience, brand_contact, brand_contact_email, store_map, show_on_home, brand_offer_status, brand_tag, (case when tb.status = 0 then "Active" WHEN tb.status = 1 THEN "Inactive" end) as status');
        $this->db->join('tbl_admin ta','tb.created_by = admin_id');
        $this->db->where('brand_id',$id);
        $query = $this->db->get('tbl_brand tb');
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        } 
        return [];
    }

    public function get_offer_details($id)
    {
       $query = $this->db->select('offer_id, offer_name, (case when tbl_brand_offer.status = 0 then "Active" when tbl_brand_offer.status = 1 then "Inactive" end) as status, tbl_admin.name as created_by, date_format(tbl_brand_offer.created_on,"%d-%m-%Y") as created_on, offer_thumbnail, thumbnail_alt, brand_name, about_offer')
                          ->join('tbl_admin','admin_id = tbl_brand_offer.created_by')
                          ->join('tbl_brand','tbl_brand_offer.brand_id = tbl_brand.brand_id')
                          ->where('offer_id',$id)
                          ->get('tbl_brand_offer');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    } 

    public function get_sub_category($cat_name)
    {
        foreach (explode(',',$cat_name) as $value) {
            $cat_id_query = $this->db->select('id')
                                 ->where('category_name',$value)
                                 ->get('tbl_category')->row_array();
            
            $query = $this->db->select('id, name,cat_id')
                                 ->where('cat_id',$cat_id_query['id'])
                                 ->get('tbl_sub_category');
            if($query->num_rows() > 0)
            {
                $sb_cat = $query->result_array();
            }
        }
        if(!empty($sb_cat)){
            return $sb_cat;
        }
        return [];
    }
}
?>