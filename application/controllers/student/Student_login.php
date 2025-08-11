<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Student_login extends CI_Controller {
	public function login(){
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('student/login');
		}else{
			$result = $this->Students_model->login();
			if($result){
				$this->session->set_flashdata('success','Login successfully!');
				redirect('student-dashboard');
			}else{
				$this->session->set_flashdata('message','Login failed!');
				redirect('student-login');
			}
		}
	}
	public function student_forgot(){
		$this->form_validation->set_rules('email','email','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('student/forgot_password');
		}else{
			$result = $this->Students_model->forgot_password();
			if($result){
				$this->session->set_flashdata('success','Please check your inbox!');
				redirect('student-login');
			}else{
				$this->session->set_flashdata('message','Invalid details!');
				redirect('student-forgot');
			}
		}
	} 
	public function exam_login(){
		$this->load->model('student/Student_exam_model');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('student/exam_login');
		}else{
			$result = $this->Student_exam_model->login();
			if($result){
				$this->session->set_flashdata('success','Login successfully!');
				redirect('exam-dashboard');
			}else{
				$this->session->set_flashdata('message','Login failed!');
				redirect('exam-login');
			}
		}
	}
}
