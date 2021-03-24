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

           if($this->sendpassword($input)){
            return ['message' => 'Password sent to your email!','status' => 1];

           }else{

            return ['message' => 'Failed to send password, please try again!','status' => 1];
           }

        } else {
            return ['status' => 0];
        }
    }






public function sendpassword($email)
{
    $query1=$this->db->query("SELECT *  from tbl_admin where email = '".$email."' ");
    $row=$query1->result_array();
    
        $passwordplain = "";
        $passwordplain  = rand(999999999,9999999999);
        $newpass['password'] = md5($passwordplain);
        $this->db->where('email', $email);
        $this->db->update('tbl_admin', $newpass);
        $mail_message='Dear '.$row[0]['name'].','. "\r\n";
        $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
        $mail_message.='<br>Please Update your password.';
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>Support Team';

       // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        $mail->IsSendmail();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "hostname";
        $subject = 'Testing Email';
        $mail->AddAddress($email);
        $mail->IsMail();
        $mail->From = 'admin@***.com';
        $mail->FromName = 'admin';
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $mail_message;
        return $mail->Send();
        
   
}















}
?>