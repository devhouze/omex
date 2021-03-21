<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_gallery($per_page,$page,$keyword,$column,$order,$count = false)
    {
        $this->db->select('id, (case when media_type = 1 then "Image" when media_type = 2 then "Video" when media_type = 3 then "YouTubeLink" end) as file_type, (case when filter_type = 1 then "Interior" when filter_type = 2 then "Exterior" when filter_type = 3 then "Construction" when filter_type = 4 then "Video" end) as type, media_name, media_video, tbl_gallery.status, name as created_by, date_format(tbl_gallery.created_on,"%d-%m-%Y") as created_on, sequence, media_type');
        $this->db->join('tbl_admin ta','tbl_gallery.created_by = admin_id');
        (!$count)?$this->db->limit($per_page,$page):'';
        (!empty($keyword['media_type']))?$this->db->where('media_type',$keyword['media_type']):'';
        (!empty($keyword['status']))?$this->db->where('tbl_gallery.status',$keyword['status']):'';
        $this->db->where('tbl_gallery.status !=',2);
        (!$count)?$this->db->limit($per_page,$page):'';
        (!empty($column) && !empty($order))?$this->db->order_by($column,$order):$this->db->order_by('id','desc');
        $query = $this->db->get('tbl_gallery');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }

    public function get_sequence($media_type,$filter_type)
    {
        $this->db->select('distinct(sequence) as sequence');
        $this->db->where('media_type',$media_type);
        $this->db->where('filter_type',$filter_type);
        $query = $this->db->get('tbl_gallery');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }
}
?>