<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller { 
	public function index(){  
		$this->form_validation->set_rules("username","User name","required");
		if ($this->form_validation->run()===FALSE){
			$this->load->view("front/login");
		}else{
			$result=$this->Front_model->login(); 
			if($result){ 
				$this->session->set_flashdata("success","login is successfully!");
				redirect('dashboard');
			}else{
				$this->session->set_flashdata("message","Email/Password is wrong! ");
				redirect("login");
			}
		} 
	}
	public function forgot_password(){
		$this->form_validation->set_rules("email","Email is required","required");
		if ($this->form_validation->run()===FALSE){
			$this->load->view('front/forgot_password');
		}else{
			if($email=$this->Front_model->forgot_password()){
			$this->session->set_flashdata("success","Password check your email to continue!");
				redirect("login");
			}else{
				$this->session->set_flashdata("message","Email does not exist!");
				redirect("forgot-password");
			}
		}
	} 
	public function reset_your_password(){
		$this->form_validation->set_rules("new_password","new password","required");
		if ($this->form_validation->run()===FALSE){
			$this->load->view('front/reset_password');
		}else{
			if($email=$this->Front_model->reset_your_password()){
				$this->session->set_flashdata("success","Password has been reset!");
				redirect("login");
			}else{
				$this->session->set_flashdata("message","Something went wrong, Please try again");
				redirect("forgot-password");
			}
		}
	} 
	public function accept_provisional_terms(){
	    $this->Front_model->accept_provisional_terms();
	    $this->load->view('front/accept_provisional_terms');
	}
	public function accept_degree_terms(){
	    $this->Front_model->accept_degree_terms();
	    $this->load->view('front/accept_degree_terms');
	}
	public function accept_transfer_terms(){
	    $this->Front_model->accept_transfer_terms();
	    $this->load->view('front/accept_transfer_terms');
	}
	public function accept_transcript_terms(){
	    $this->Front_model->accept_transcript_terms();
	    $this->load->view('front/accept_transcript_terms');
	} 
	public function accept_migration_terms(){
	    $this->Front_model->accept_migration_terms();
	    $this->load->view('front/accept_migration_terms');
	}
	public function student_bonafide_ccavResponseHandler(){ 
		$this->load->view('front/student_bonafide_ccavResponseHandler'); 
	}
	public function student_medium_inst_ccavResponseHandler(){ 
		$this->load->view('front/student_medium_inst_ccavResponseHandler'); 
	}
	public function student_no_backlog_ccavResponseHandler(){ 
		$this->load->view('front/student_no_backlog_ccavResponseHandler'); 
	}
	public function student_no_split_ccavResponseHandler(){ 
		$this->load->view('front/student_no_split_ccavResponseHandler'); 
	}
	public function student_recommendation_ccavResponseHandler(){ 
		$this->load->view('front/student_recommendation_ccavResponseHandler'); 
	} 

	public function student_character_ccavResponseHandler(){ 
		$this->load->view('front/student_character_ccavResponseHandler'); 
	}
	public function print_bonafide_scholarship(){ 
		$this->Front_model->get_single_print_bonafied_scholarship_regular_student_login();
	    /*$data["single"] = $this->Front_model->get_single_bona_application_print();
		$data["division"] = $this->Front_model->get_student_division_for_degree();
		$this->load->view('front/print_bonafide',$data); */
	}
}

