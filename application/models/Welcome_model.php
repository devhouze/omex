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
        $query = $this->db->select('banner_web,banner_mobile, comment,banner_link, link_to')
        ->where('status',0)
        ->where('banner_type',1)
        ->order_by('id','desc')
        ->get('tbl_banner');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_brand_logo()
    {
        $query = $this->db->select('brand_logo, banner_comment, brand_id,brand_slug')
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
        $query = $this->db->select('event_name, thumbnail_message, event_start_time, event_end_time, date_available, start_date, end_date, thumbnail_image, about_event, event_category, show_reg_btn, event_id, event_street, event_slug')
        ->where('status',0)
                        //   ->group_start()
                        //   ->where('end_date >',date('Y-m-d'))
                        //   ->or_where('start_date >=',date('Y-m-d'))
                        //   ->group_end()
        ->order_by('event_id','desc')
        ->get('tbl_event');
                        //   echo $this->db->last_query(); die;
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return [];
    }

    public function get_event_detail($slug)
    {
        $query = $this->db->select('event_name, thumbnail_message, event_start_time, event_end_time, date_available, start_date, end_date, thumbnail_image, about_event, event_category, show_reg_btn, event_slug')
        ->where('status',0)
        ->where('event_slug',$slug)
        ->get('tbl_event');
                        //   echo $this->db->last_query(); die;
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        return [];
    }
    

    public function get_brands($type)
    {
        $query = $this->db->select('brand_logo, logo_message, brand_id,brand_slug')
        ->where('status',0)
        ->where('show_on_home','Yes')
        ->where('brand_type',$type)
        ->order_by('rand()')
        ->limit(6)
        ->get('tbl_brand');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_brands_like($type,$street)
    {
        $query = $this->db->select('brand_logo, logo_message, brand_id,brand_slug')
        ->where('status',0)
        ->where('brand_type',$type)
        ->where("brand_street LIKE '%$street%'")
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
        $query = $this->db->select('banner_web, banner_mobile, comment, banner_mobile,banner_link, link_to')
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

    public function main_category()
    {
        $query = $this->db->select('id, name,')
        ->get('tbl_maincatgory');
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return [];
    }

    public function get_all_brands($category='',$limit,$count = false)
    {
        $this->db->select('DISTINCT(b.brand_id),b.brand_name, b.brand_logo, b.logo_message, b.brand_location, b.brand_id,b.brand_slug,b.brand_street');
        $this->db->join("tbl_category AS ct","find_in_set(ct.id,b.brand_category)<> 0","left",false);
        $this->db->where('b.status',0);
        if($category){
        $this->db->like('ct.category_name',$category);
        $this->db->or_like('b.brand_type',$category);
        }
        (!$count && $limit!='null')?$this->db->limit($limit):''; 
        $query = $this->db->get('tbl_brand as b');
        // echo $this->db->last_query(); die;
        if($count){
            return $query->num_rows();
        }
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
        $this->db->order_by('sequence','desc');
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
        $this->db->order_by('sequence','desc');
        $this->db->limit(10);
        $query = $this->db->get('tbl_gallery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_what_new($id='',$street='')
    {
        $this->db->select('brand_name, about_brand, brand_logo, brand_street, banner_web, banner_comment, logo_message');
        $this->db->where('status',0);
        $this->db->where('status',0);
        $this->db->where('brand_label','New In');
        if($id){
            $this->db->where('brand_slug !=',$id);
        }
        if($street){
            $this->db->where("brand_street LIKE '%$street%'");
        }
        $query = $this->db->get('tbl_brand');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }



    public function get_about_brand($id)
    {
        $query = $this->db->get_where('tbl_brand',['brand_slug' => $id,'status' => 0]);
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        return [];
    }

    public function get_sub_cat_name($id)
    {
        $query = $this->db->get_where('tbl_sub_category',['id' => $id]);
        if($query->num_rows() > 0)
        {
            $result=$query->row_array();
            return $result['name'];
        }
        return [];
    }

    public function get_similar_brands($id,$brand_type,$start=null,$end=null)
    {
        $this->db->select('brand_id, brand_name, brand_logo, logo_message,brand_slug');
        $this->db->like('brand_type',$brand_type);
        $this->db->where('brand_slug !=',$id);
        $this->db->where('status',0);
        ($start!='null')?$this->db->limit($start,$end):'';
        $this->db->order_by('brand_id','desc');
        $query = $this->db->get('tbl_brand');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_past_events()
    {
        $query = $this->db->select('thumbnail_message, thumbnail_image, about_event, date_available, start_date, end_date')
                        //   ->where('end_date <',date('Y-m-d'))
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

    public function filter_brand($street,$sort,$filter,$limit,$letter,$category,$count = false)
    {
        ($street !='null' && $street !='')?$this->db->like('b.brand_street',$street):'';
        ($letter !='null' && $letter !='')?$this->db->like('b.brand_name',$letter,'after'):'';
        if($sort == 'A-Z'){
            $this->db->order_by('b.brand_name','asc');
        } elseif($sort == 'Z-A'){
            $this->db->order_by('b.brand_name','desc');
        } else {
            $this->db->order_by('b.brand_name','desc');
        }
        $this->db->group_by('b.brand_id');
        if($filter != '')
        {

            $this->db->group_start();

            $this->db->where('find_in_set("'.$filter.'", b.brand_category) <> 0');
            $this->db->or_where('find_in_set("'.$filter.'", b.brand_sub_category) <> 0');
            
            $this->db->group_end();


        }

        if($category !='null' && $category !='')
        {

            $this->db->group_start();
            // $category=str_replace('!','',str_replace(' ','%',$category));

            $arr = explode(' ',trim($category));
            $category=$arr[0]; // will print Test

            $this->db->like('cm.name',$category);
            $this->db->or_like('b.brand_label',$category);
            
            $this->db->group_end();

        }
        $this->db->where('status',0);
        (!$count)?$this->db->limit($limit,0):'';
        // echo $this->db->last_query();
        $this->db->join("tbl_category AS ct","find_in_set(ct.id,b.brand_category)<> 0","left",false);
        $this->db->join("tbl_sub_category AS st","find_in_set(st.id,b.brand_sub_category)<> 0","left",false);
        $this->db->join("tbl_maincatgory AS cm","find_in_set(cm.id,ct.main_cat_id)<> 0","left",false);
        $query = $this->db->get('tbl_brand as b');
        if($count){
            return $query->num_rows();
        }
        if($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return [];
        }
    }

    public function get_events_by_street($street)
    {
        $query = $this->db->select('event_name, thumbnail_message, event_start_time, event_end_time, date_available, start_date, end_date, thumbnail_image, about_event, event_category, show_reg_btn, event_id, event_street, event_slug')
        ->where('status',0)
        ->where('find_in_set("'.$street.'",event_street)')
                        //   ->group_start()
                        //   ->where('end_date >',date('Y-m-d'))
                        //   ->or_where('start_date >=',date('Y-m-d'))
                        //   ->group_end()
        ->order_by('event_id','desc')
        ->get('tbl_event');
                        //   echo $this->db->last_query(); die;
        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return [];
    }

    public function get_whats_new($slug)
    {
        $query = $this->db->select('name, about, thumb_web, thumb_mob, alt_tag, show_reg_btn')
                          ->where('status',0)
                          ->where('name_slug',$slug)
                          ->get('tbl_whats_new');
        if($query->num_rows() > 0){
            $data['whats_new'] = $query->row_array();
            $gallery_query = $this->db->select('image_web, image_mob, image_alt')->get_where('tbl_whats_new_gallery',['whats_new_slug' => $slug]);
            $data['gallery'] = ($gallery_query->num_rows() > 0)?$gallery_query->result_array():[];
            return $data;
        }
        return [];
    }
    
}

?>