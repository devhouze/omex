<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function validate_admin($data)
    {
        $check_username = $this->db->get_where('tbl_admin',['user_name' => $data['username']]);
        
        if($check_username->num_rows() > 0){
             $check_password = $this->db->get_where('tbl_admin',['password' => md5($data['password']),'user_name' => $data['username']]);

            if($check_password->num_rows() > 0){
                $query = $this->db->get_where('tbl_admin',['user_name' => $data['username'], 'password' => md5($data['password'])]);

                return ['message' => 'Login success.', 'status' => 1, 'data' => $query->row_array()];
            } else {
                return ['message' => 'Password is incorrect.', 'status' => 0];
            }
        } else {
            return ['message' => 'Invalid Username/Password', 'status' => 0];
        }
    }

    public function validate_email($input)
    {
        $query = $this->db->get_where('tbl_admin',['email' => $input]);
        if($query->num_rows() > 0){
            return ['message' => 'Email will be sent on email ID.','status' => 1];
        } else {
            return ['status' => 0];
        }
    }
}
?>