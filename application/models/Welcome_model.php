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
        $query = $this->db->select('event_name, thumbnail_message, event_start_time, event_end_time, date_available, start_date, end_date, thumbnail_image, about_event, event_category, show_reg_btn, event_id')
                          ->where('status',0)
                          ->where('end_date >',date('Y-m-d'))
                          ->get('tbl_event');
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return [];
    }

    public function get_event_detail($id)
    {
        $query = $this->db->select('event_name, thumbnail_message, event_start_time, event_end_time, date_available, start_date, end_date, thumbnail_image, about_event, event_category, show_reg_btn, event_id')
                          ->where('status',0)
                          ->where('event_id',$id)
                          ->get('tbl_event');
        if($query->num_rows() > 0)
        {
            return $query->row_array();
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

    public function get_all_brands($alphabet,$category)
    {
        $this->db->select('brand_name, brand_logo, logo_message, brand_location, brand_id');
        $this->db->where('status',0);
        ($alphabet !='null' && $alphabet != '')?$this->db->like('brand_name',$alphabet):'';    
        if(($category != 'null' && $category !='') && $category == 'fashion'){
            $this->db->where_in('brand_category',['Men’s Fashion','Women’s Fashion','	
            Footwear']);
        } elseif(($category != 'null' && $category !='') && $category == 'fitness'){
            $this->db->where_in('brand_category',['Sports & Fitness']);
        } elseif(($category != 'null' && $category !='')) {
            $this->db->where('brand_category',$category);
        }     
        $query = $this->db->get('tbl_brand');
        // echo $this->db->last_query(); die;
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return [];
    }

    public function get_gallery($type)
    {
        $this->db->select('id, media_name, media_alt');
        $this->db->where('status',0);
        $this->db->where('media_type',1);
        ($type!='all')?$this->db->where('filter_type',$type):'';
        $this->db->order_by('id','desc');
        $this->db->limit(10);
        $query = $this->db->get('tbl_gallery');
        // echo "<pre>";
        // echo $this->db->last_query();
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function gallery_video()
    {
        $this->db->select('id, media_type, media_name, media_alt');
        $this->db->where('status',0);
        $this->db->where('media_type !=',1);
        $this->db->order_by('id','desc');
        $this->db->limit(10);
        $query = $this->db->get('tbl_gallery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_what_new()
    {
        $this->db->select('brand_name, about_brand, brand_logo, brand_street, banner_web, banner_comment, logo_message');
        $this->db->where('status',0);
        $query = $this->db->get('tbl_brand');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_about_brand($id)
    {
        $query = $this->db->get_where('tbl_brand',['brand_id' => $id]);
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        return [];
    }

    public function key_information($category,$subcategory = 0)
    {   
        $category_id = explode(",",$category);
        foreach ($category_id as $value) {
            $cat_query = $this->db->select('category_name as name')
                              ->where('id',$value)
                              ->get('tbl_category')->row_array();
            $category_name[] = $cat_query['name'];
        }
        $subcategory_name = [];
        if($subcategory !=0){
            $subcat_query = $this->db->select('name')
                              ->where('id',$subcategory)
                              ->get('tbl_sub_category')->row_array();
            $subcategory_name[] = $subcat_query['name'];
        }
        
        $final_data = array_merge($category_name, $subcategory_name);
        return $final_data;
    }

    public function get_similar_brands($category_id)
    {
        $this->db->select('brand_name, brand_logo, logo_message');
        $this->db->where_in('brand_category',explode(',',$category_id));
        $query = $this->db->get('tbl_brand');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_past_events()
    {
        $query = $this->db->select('thumbnail_message, thumbnail_image, about_event')
                          ->where('end_date <',date('Y-m-d'))
                          ->get('tbl_event');
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return [];
    }

    public function get_filters()
    {
        $category = $this->db->select('id, category_name as name')->get('tbl_category')->result_array();
        $subcategory = $this->db->get('tbl_sub_category')->result_array();
        $final_data = array_merge($category,$subcategory);
        return $final_data;
    }
}

?>