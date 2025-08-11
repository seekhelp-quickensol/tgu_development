<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Admin_controller extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->is_logged();
		$this->check_access();
	}
	public function is_logged(){
		if($this->session->userdata('admin_id') == ""){
			redirect('erp-access');
		}
	}
	public function check_access(){
		if($this->session->userdata('admin_id') != "1"){
			$access = $this->Setting_model->get_user_privilege_link();
			if(!in_array($this->uri->segment(1),$access)){
				$this->session->set_flashdata('message','Sorry! You dont have access to this module!');
				redirect(base_url());
			}
		}
	}
	public function dashboard(){
		$this->Admin_model->remove_duplicate_exam_form();
		$data['faculty_count'] = $this->Admin_model->get_faculty_count();
		$data['course_count'] = $this->Admin_model->get_course_count();
		$data['stream_count'] = $this->Admin_model->get_stream_count();
		$data['subject_count'] = $this->Admin_model->get_subject_count();
		$data['course_stream_relation_count'] = $this->Admin_model->get_course_stream_relation_count();
		$this->load->view('admin/index',$data);
	}
	public function profile_setting(){
		if($this->input->post('password_submit') == "password_submit"){
			$this->Admin_model->set_password();
			$this->session->set_flashdata('success','Password updated successfully');
			redirect('profile-setting');
		}
		$this->form_validation->set_rules('first_name','first name','required');
		if($this->form_validation->run() === FALSE){
			$data['country'] = $this->Admin_model->get_all_country();
			$this->load->view('admin/profile',$data);
		}else{
			$photo ='';
			if($_FILES['userfile']['name'] !=""){
				$tmp = explode('.', $_FILES['userfile']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/employee/",
					'allowed_types' => "pdf|jpg|jpeg|png",
					'encrypt_name'	=> TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$data = $this->upload->data();				
					$photo = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$this->Admin_model->set_profile($photo);
			$this->session->set_flashdata('success','Profile updated successfully');
			redirect('profile-setting');
		}
	}
	

 
}