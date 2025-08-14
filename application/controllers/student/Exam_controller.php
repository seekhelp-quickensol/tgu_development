<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Exam_controller extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->is_logged(); 
		$this->load->model('student/Student_exam_model');
	}
	public function is_logged(){
		if($this->session->userdata('exam_student_id') == ""){
			redirect('exam-login');
		}
	}
	public function exam_dashboard(){
		$data['upcoming'] = $this->Student_exam_model->get_upcoming_exam();
		$data['completed'] = $this->Student_exam_model->get_completed_exam();
		$this->load->view('student/exam_dashboard',$data);
	}
	public function start_exam(){
		$data['exam'] = $this->Student_exam_model->get_start_exam();
		// echo "<pre>";print_r($data['exam']);exit;

		$data['question'] = array();
		if(!empty($data['exam'])){
			$data['question'] = $this->Student_exam_model->get_exam_questions($data['exam']);

		}
		$this->form_validation->set_rules('exam_id','details','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('student/start_exam',$data);
		}else{
			$result = $this->Student_exam_model->set_student_exam();
			$this->session->set_flashdata('success','Exam submitted successfully1');
			redirect('exam-dashboard');
		}
	}
	public function exam_student_logout(){
		$this->session->sess_destroy();
		redirect('exam-login');
	}
}