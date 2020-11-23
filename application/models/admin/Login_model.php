<?php
defined('BASEPATH') or exit('No direct access allowed');

class Login_model extends MY_Model{
    function __construct(){
        parent::__construct();
    }

    public function check_admin($data){
        $query = $this->db->get_where('tbl_admin',['email' => $data['email'], 'password' => $data['password'], 'status' => '1']);
        if($query->num_rows() > 0){
            return $query->row();
        }
        return [];
    }
}
?>