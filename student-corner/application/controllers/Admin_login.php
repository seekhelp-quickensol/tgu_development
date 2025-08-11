<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
require_once APPPATH.'vendor/autoload.php';

class Admin_login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->check_login();
	}
	public function check_login(){
		if(!empty($this->session->userdata("user_id"))){
			redirect("dashboard");
		}
	}
	public function login(){
		$this->form_validation->set_rules("email","Email is required","required");
		if($this->form_validation->run()===FALSE){
			$this->load->view("admin/login");
		}else{
			if($this->Admin_model->login()){
				$this->session->set_flashdata("success","You are sucessfully logged In!");
				redirect("dashboard");
			}
			else{
				$this->session->set_flashdata("message","Email/Password is wrong !");
				redirect('login');
			}
		}
	}
	public function forgot_password(){
		$this->form_validation->set_rules("email","Email","required");
		if($this->form_validation->run()===FALSE){
	      $this->load->view("admin/forgot-password");
        }else{
			$result=$this->Admin_model->forgot_password(); 
			if($result == '1'){
				$this->session->set_flashdata("success","Password send to your register Email Address!");
				redirect('login');
			}else{
				$this->session->set_flashdata("message","Email does not exist, please try again!");
				redirect('forgot-password');
			}	
	   }
   }
}
  
