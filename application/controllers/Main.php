<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('loginmodel');

        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper('security');
		$this->load->helper('file');
        $this->load->library('session');  
        $this->load->library('form_validation');
        $this->load->library("pagination"); 
        $this->load->library('zip');
    }

	public function index(){
		// print_r($_SESSION);
		if (isset($_SESSION['user']['email'])) {
			redirect('/main/dashboard');
		} else {
			$this->load->view('login');
		}
	}

	public function dashboard(){
		// print_r($_SESSION['user']);
		if (isset($_SESSION['user']['email'])) {
			$data['first_name'] = $_SESSION['user']['first_name'];
            $data['last_name'] = $_SESSION['user']['last_name'];

			$this->load->view('main_dashboard', $data);
		} else {
			$this->load->view('login');
		}
	}

	public function buttons(){
		$this->load->view('buttons');
	}

	public function login(){
        /*Data that we receive from ajax*/
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $output = array('error' => false); 

        $data = $this->loginmodel->login($email, $password);
 
		if($data['result']){
			$this->session->set_userdata('user', $data['result']);
            $output['error'] = false;
            $output['message'] = $data['message']; 
        } else {
			$output['error'] = true;
			$output['message'] = $data['message']; 
		}
 
		echo json_encode("Success!");
    }

	public function logout(){  
        $this->session->sess_destroy();  
        redirect('main/index');  
    }
}
