<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_gallery($per_page,$page,$count = false)
    {
        $this->db->select('id, (case when media_type = 1 then "Image" when media_type = 2 then "Video" when media_type = 3 then "YouTubeLink" end) as file_type, (case when filter_type = 1 then "Interior" when filter_type = 2 then "Exterior" when filter_type = 3 then "Construction" end) as type, media_name, tbl_gallery.status, name as created_by, date_format(tbl_gallery.created_on,"%d-%m-%Y") as created_on');
        $this->db->join('tbl_admin ta','tbl_gallery.created_by = admin_id');
        (!$count)?$this->db->limit($per_page,$page):'';
        $this->db->where('tbl_gallery.status !=',2);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_gallery');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            return $query->result_array();
        }
        return [];
    }
}
?>