<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'vendor/autoload.php';
class Admin_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->check_login();
	}
	public function check_login(){
		if(empty($this->session->userdata("user_id"))){
			redirect("login");
		}
	}
	public function index(){
		$this->load->view('admin/index');
	}
	public function employee_dashboard() {
		$data['student']=$this->Admin_model->get_new_verification_list();
		$data['verified_student'] = $this->Admin_model->get_my_verified_student();
		$this->load->view('admin/employee-dashboard',$data);
	} 
	public function new_verifications(){
		$data['student']=$this->Admin_model->get_new_verification_list();
		$data['session']=$this->Admin_model->get_session_list();
		$this->load->view('admin/new_verifications',$data);
	} 
	public function new_pending_list(){
		$data['student']=$this->Admin_model->get_new_pending_list();
		$data['session']=$this->Admin_model->get_session_list();
		$this->load->view('admin/new_verifications',$data);
	} 
	public function get_new_document_pending_list(){
		$data['student']=$this->Admin_model->get_new_document_pending_list();
		$data['session']=$this->Admin_model->get_session_list();
		$this->load->view('admin/new_verifications',$data);
	} 
	public function view_doc(){
		$this->load->view('admin/view_doc');
	}
	public function blended_student_list(){
		$data['student']=$this->Admin_model->blended_student_list();
		$data['session']=$this->Admin_model->get_session_list();
		$this->load->view('admin/new_blended_student_list',$data);
	} 
	public function verify_now(){
		$this->form_validation->set_rules("name_verified","name is required","required");
		if($this->form_validation->run()===FALSE){
			$data['admission'] = $this->Admin_model->get_single_verification_student();
			//echo "<pre>";print_r($data['admission']);exit;
			$data['qualification'] = $this->Admin_model->get_single_verification_student_qualification();
			$data['verified'] = $this->Admin_model->get_single_verified_date();
			$this->load->view('admin/verify_now',$data);
		}else{  
			$res = $this->Admin_model->set_verification_student();  
			$this->session->set_flashdata("success", "Details updated successfully");
			redirect("verify-now/".base64_encode($this->input->post('id'))); 
		}
	} 
	public function blended_verify_now(){
		$this->form_validation->set_rules("name_verified","name is required","required");
		if($this->form_validation->run()===FALSE){
			$data['admission'] = $this->Admin_model->get_single_blended_verification_student();
			//echo "<pre>";print_r($data['admission']);exit;
			$data['verified'] = $this->Admin_model->get_blended_single_verified_remark();
			$this->load->view('admin/blended_verify_now',$data);
		}else{  
			$res = $this->Admin_model->set_blended_erification_student();  
			$this->session->set_flashdata("success", "Details updated successfully");
			redirect("blended-verify-now/".base64_encode($this->input->post('id'))); 
		}
	} 
	public function verified_student_list(){
		$data['student'] = $this->Admin_model->get_my_verified_student();
		$this->load->view('admin/verified_student_list',$data);
	} 
	public function verified_blended_student_list(){
		$data['student'] = $this->Admin_model->verified_blended_student_list();
		$this->load->view('admin/verified_blended_student_list',$data);
	} 
	public function rejected_student_list(){
		$data['student'] = $this->Admin_model->rejected_student_list();
		$this->load->view('admin/rejected_student_list',$data);
	} 
	public function rejected_blended_student_list(){
		$data['student'] = $this->Admin_model->rejected_blended_student_list();
		$this->load->view('admin/rejected_blended_student_list',$data);
	} 
	public function forgot_password() {
		$this->load->view('admin/forgot-password');
	} 
	public function change_password(){
		$this->form_validation->set_rules("new_password","new password is required","required");
		if($this->form_validation->run()===FALSE){
			$this->load->view('admin/change_password');
		}else{
			$res = $this->Admin_model->update_password();  
			$this->session->set_flashdata("success", "Your Password updated successfully");
			redirect("change-password"); 
		}
	} 
	public function update_profile(){
		$this->form_validation->set_rules("name","name is required","required");
		if($this->form_validation->run()===FALSE){
			$data['profile']=$this->Admin_model->get_profile_details();
			$this->load->view("admin/update-profile",$data); 
		}else{ 
			$res = $this->Admin_model->update_profile();  
			$this->session->set_flashdata("success", "Your Profile Updated Successfully");
			redirect("update-profile"); 
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata("success","Logout successfully");
		redirect("login");
	}
   
}
