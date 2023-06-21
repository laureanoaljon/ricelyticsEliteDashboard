<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class LoginModel extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /*function to use fetch the data from users table*/
    public function validate($email, $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('password', $pass);
        $this->db->where('email', $user);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function login($email, $password){
        $data = array();

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('status', 'active');
        
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            $user = $query->result_array();

            $data['message'] = 'Successfully login!';
            $data['result'] = $query->row_array();
        } else {
            $data['result'] = array();
            $data['message'] = 'User not found!';
        }
        
        // // ADVANCE PASSWORD
        // if ($query->num_rows() > 0){
        //     $user = $query->result_array();
        //     $hash = $user[0]['USER_PASSWORD'];

        //     if (password_verify($password, $hash)) {
        //         $query = $this->db->get_where('tbl_user_priv', array('user_email'=>$email));
        //         $data['message'] = 'Successfully login!';
        //         $data['result'] = $query->row_array();
        //     } else {
        //         $data['result'] = array();
        //         $data['message'] = 'Incorrect Password!';
        //     }
        // } else {
        //     $this->db->select('*');
        //     $this->db->from('tbl_user_priv');
        //     $this->db->where('user_email', $email);
        //     $this->db->where('is_verified', 0);
        //     $query = $this->db->get(); 

        //     if ($query->num_rows() > 0){
        //         $user = $query->result_array();
        //         $hash = $user[0]['USER_PASSWORD'];

        //         if (password_verify($password, $hash)) {
        //             $data['result'] = array();
        //             $data['message'] = 'Email not yet verified, Please check your email inbox.';
        //         } else {
        //             $data['result'] = array();
        //             $data['message'] = 'Email and Password do not match!';
        //         }
        //     } else {
        //         $data['result'] = array();
        //         $data['message'] = 'Email not registered!';
        //     }
        // }

        return $data;
    }
}