<?php
class WhatsNew_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function whats_new_list($per_page,$page,$keyword,$column,$order,$count=false)
    {
        $this->db->select('id, tbl_whats_new.name, about, tbl_whats_new.status, tbl_admin.name as created_by, date_format(tbl_whats_new.created_on,"%d-%m-%Y") as created_on');
        $this->db->join('tbl_admin','admin_id = tbl_whats_new.created_by');
        $this->db->where('tbl_whats_new.status !=',2);
        (isset($keyword['name']))?$this->db->like('tbl_whats_new.name',$keyword['name']):'';
        (isset($keyword['status']))?$this->db->where('tbl_whats_new.status',$keyword['status']):'';
        (!$count)?$this->db->limit($per_page,$page):'';
        (!empty($column) && !empty($order))?$this->db->order_by($column,$order):$this->db->order_by('id','desc');
        $query = $this->db->get('tbl_whats_new');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->result_array();
        }
        return [];
    }

    public function whats_new_gallery_list($per_page,$page,$keyword,$column,$order,$count=false)
    {
        $this->db->select('tbl_whats_new_gallery.id, tbl_whats_new.name, tbl_whats_new_gallery.status, tbl_admin.name as created_by, date_format(tbl_whats_new_gallery.created_on,"%d-%m-%Y") as created_on');
        $this->db->join('tbl_admin','admin_id = tbl_whats_new_gallery.created_by');
        $this->db->join('tbl_whats_new','name_slug = tbl_whats_new_gallery.whats_new_slug');
        $this->db->where('tbl_whats_new_gallery.status !=',2);
        (isset($keyword['name']))?$this->db->like('tbl_whats_new.name',$keyword['name']):'';
        (isset($keyword['status']))?$this->db->where('tbl_whats_new_gallery.status',$keyword['status']):'';
        (!$count)?$this->db->limit($per_page,$page):'';
        (!empty($column) && !empty($order))?$this->db->order_by($column,$order):$this->db->order_by('id','desc');
        $query = $this->db->get('tbl_whats_new_gallery');
        // echo $this->db->last_query(); die;
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->result_array();
        }
        return [];
    }

    public function whats_new_gallery_details($id)
    {
        $this->db->select('tbl_whats_new_gallery.id, tbl_whats_new.name, tbl_whats_new_gallery.status, tbl_admin.name as created_by, date_format(tbl_whats_new_gallery.created_on,"%d-%m-%Y") as created_on, image_web, image_mob, image_alt');
        $this->db->join('tbl_admin','admin_id = tbl_whats_new_gallery.created_by');
        $this->db->join('tbl_whats_new','name_slug = tbl_whats_new_gallery.whats_new_slug');
        $this->db->where('tbl_whats_new_gallery.status !=',2);
        $this->db->where('tbl_whats_new_gallery.id',$id);
        $query = $this->db->get('tbl_whats_new_gallery');
        // echo $this->db->last_query(); die;
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->row_array();
        }
        return [];
    }
    
}

?>