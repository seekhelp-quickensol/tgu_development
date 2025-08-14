<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Center_login extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->is_logged();
	}
	public function is_logged(){
		if($this->session->userdata('center_id') != ""){
			redirect('center-dashboard');
		}
	}
	public function login(){
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('center/login');
		}else{
			$result = $this->Center_details_model->login();
			if($result){
				$this->session->set_flashdata('success','Login successfully!');
				redirect('center-dashboard');
			}else{
				$this->session->set_flashdata('message','Login failed!');
				redirect('center-access');
			}
		}
	}
	public function center_forgot(){
		$this->form_validation->set_rules('email','email','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('center/forgot_password');
		}else{
			$result = $this->Center_details_model->forgot_password();
			if($result){
				$this->session->set_flashdata('success','Please check your inbox!');
				redirect('center-access');
			}else{
				$this->session->set_flashdata('message','Invalid details!');
				redirect('center-forgot');
			}
		}
	}  
}