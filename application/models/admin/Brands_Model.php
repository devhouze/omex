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
        $query = $this->db->select('brand_id, brand_name, tbl_brand.status, tbl_admin.name as created_by, date_format(tbl_brand.created_on,"%d-%M-%Y") as created_on')
                          ->join('tbl_admin','admin_id = tbl_brand.created_by')
                          ->get('tbl_brand');
        if($count){
            return $query->num_rows();
        } elseif($query->num_rows() > 0){
            
            return $query->result_array();
        }
        return [];
    }
}
?>