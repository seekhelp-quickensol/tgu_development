<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Student_controller extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->is_logged(); 
	}
	public function is_logged(){
		if($this->session->userdata('student_id') == ""){
			redirect('student-login');
		}
	}
//rohit
	public function student_dashboard(){
		$data['admission'] = $this->Students_model->get_admission_form();
		$data['marksheet'] = $this->Students_model->get_single_marksheet_result_count();
		$this->load->view('student/index',$data);
	}

	public function student_logout(){
		$this->session->sess_destroy();
		redirect('student-login');
	}
	public function student_password(){
		$this->form_validation->set_rules('old_password','old password','required');
		$this->form_validation->set_rules('new_password','New password','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('student/password');
		}else{
			$result = $this->Students_model->set_password();
			$this->session->set_flashdata('success','Password updated successfully');
			redirect('student-password');
		}
	}
	public function get_old_password(){
		$this->Students_model->get_old_password();
	}
	public function asmission_form_print(){
		$data['admission'] = $this->Students_model->get_admission_form();
		$this->load->view('student/print_admission_form',$data);
	}
	public function e_library(){
		$this->load->view('student/e_library');
	}
	public function id_card_print(){
		$data['admission'] = $this->Students_model->get_admission_form();
		$this->load->view('student/id_card',$data);
	}
	public function student_qualification_details(){
		$this->form_validation->set_rules('student','student','required');	
		if($this->form_validation->run() === FALSE){
			$data['qualification'] = $this->Students_model->get_my_qualification();
			$this->load->view('student/student_qualification_details',$data);
		}else{
			$secondary_marksheet ='';
			if($_FILES['secondary_marksheet']['name'] !=""){
				$secondary_marksheet = $this->Digitalocean_model->upload_photo($filename="secondary_marksheet",$path="images/qualification/");
				/*	
				$tmp = explode('.', $_FILES['secondary_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'		=> $this->input->post('student_id')."-secondary".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('secondary_marksheet')){
					$data = $this->upload->data();				
					$secondary_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			}
			$sr_secondary_marksheet ='';
			if($_FILES['sr_secondary_marksheet']['name'] !=""){
				$sr_secondary_marksheet = $this->Digitalocean_model->upload_photo($filename="sr_secondary_marksheet",$path="images/qualification/");
				/*
				$tmp = explode('.', $_FILES['sr_secondary_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-sr_secondary".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('sr_secondary_marksheet')){
					$data = $this->upload->data();				
					$sr_secondary_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			}
			$graduation_marksheet ='';
			if($_FILES['graduation_marksheet']['name'] !=""){
				$graduation_marksheet = $this->Digitalocean_model->upload_photo($filename="graduation_marksheet",$path="images/qualification/");
				/*
				$tmp = explode('.', $_FILES['graduation_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-graduation".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('graduation_marksheet')){
					$data = $this->upload->data();				
					$graduation_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			}
			$post_graduation_marksheet ='';
			if($_FILES['post_graduation_marksheet']['name'] !=""){
				$post_graduation_marksheet = $this->Digitalocean_model->upload_photo($filename="post_graduation_marksheet",$path="images/qualification/");
				/*
				$tmp = explode('.', $_FILES['post_graduation_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-pg".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('post_graduation_marksheet')){
					$data = $this->upload->data();				
					$post_graduation_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			}
			$other_qualification_marksheet ='';
			if($_FILES['other_qualification_marksheet']['name'] !=""){
				$other_qualification_marksheet = $this->Digitalocean_model->upload_photo($filename="other_qualification_marksheet",$path="images/qualification/");
				/*
				$tmp = explode('.', $_FILES['other_qualification_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-oth".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('other_qualification_marksheet')){
					$data = $this->upload->data();				
					$other_qualification_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			}
			$signature ='';
			if($_FILES['signature']['name'] !=""){
				$signature = $this->Digitalocean_model->upload_photo($filename="signature",$path="images/signature/");
				/*
				$tmp = explode('.', $_FILES['signature']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/signature",
					'allowed_types' => "jpg|jpeg|png",
					'file_name'	=> $this->input->post('student_id')."-sin".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('signature')){
					$data = $this->upload->data();				
					$signature = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			}
			$result = $this->Students_model->update_qualification($secondary_marksheet,$sr_secondary_marksheet,$graduation_marksheet,$post_graduation_marksheet,$other_qualification_marksheet,$signature);
			$this->session->set_flashdata('success','Details updated successfully!');
			redirect('student-qualification-details');
		}
	}	
	public function student_feedback(){
		$this->form_validation->set_rules('feedback','feedback','required');	
		if($this->form_validation->run() === FALSE){
			$data['feedback'] = $this->Students_model->get_all_feedback();
			$this->load->view('student/feedback_list',$data);
		}else{
			$result = $this->Students_model->set_feedback();
			$this->session->set_flashdata('success','Feedback added successfully!');
			redirect('student_feedback');
		}
	}
	public function my_results(){
		$data['result'] = $this->Students_model->get_my_all_result();
		$this->load->view('student/my_results',$data);
	}
	public function show_my_result(){
		$data['student'] = $this->Students_model->get_this_result();
		$this->load->view('student/show_my_result',$data);
	}
	public function upload_assessment(){
		if($this->input->post('save') == "Upload Form"){
			$self_assement = "";
			if($_FILES['userfile']['name'] !=""){


$allowed = array('pdf', 'png', 'jpg');
$filename = $_FILES['userfile']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (!in_array($ext, $allowed)) {
    die('error');
}

				$tmp = explode('.', $_FILES['userfile']['name']);
				$ext = end($tmp);
				$name = $this->session->userdata('student_id')."-".$this->input->post('year_sem');
				
				$self_assement = $this->Digitalocean_model->upload_photo($filename="userfile",$path="uploads/assesment_form/self_assement/");
				/* 
				$config = array(
					'upload_path' 	=> "uploads/assesment_form/self_assement",
					'allowed_types' => "*",
					'file_name'	=> $name.".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$data = $this->upload->data();				
					$self_assement = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			}
			$this->Students_model->upload_self_assesment($self_assement);
			$this->session->set_flashdata('success','Assesment uploaded successfully!');
			redirect('upload_assessment');
		}
		if($this->input->post('teacher') == "Upload Form"){
			$teacher_assement = "";
			if($_FILES['userfile']['name'] !=""){
				$teacher_assement = $this->Digitalocean_model->upload_photo($filename="userfile",$path="uploads/assesment_form/teacher_assement/");
				/*
				$tmp = explode('.', $_FILES['userfile']['name']);
				$ext = end($tmp);
				$name = $this->session->userdata('student_id')."-".$this->input->post('year_sem');
				$config = array(
					'upload_path' 	=> "uploads/assesment_form/teacher_assement",
					'allowed_types' => "*",
					'file_name'	=> $name.".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$data = $this->upload->data();				
					$teacher_assement = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			}
			$this->Students_model->upload_teacher_assesment($teacher_assement);
			$this->session->set_flashdata('success','Assesment uploaded successfully!');
			redirect('upload_assessment');
		}
		if($this->input->post('assignement') == "Upload Form"){
			$assignment = "";
			if($_FILES['userfile']['name'] !=""){
				$assignment = $this->Digitalocean_model->upload_photo($filename="userfile",$path="uploads/assesment_form/assignment/");
				/*
				$tmp = explode('.', $_FILES['userfile']['name']);
				$ext = end($tmp);
				$name = $this->session->userdata('student_id')."-".$this->input->post('year_sem');
				$config = array(
					'upload_path' 	=> "uploads/assesment_form/assignment",
					'allowed_types' => "*",
					'file_name'	=> $name.".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$data = $this->upload->data();				
					$assignment = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					print_r($this->upload->display_errors());
				}*/
			}
			$this->Students_model->upload_assignment($assignment);
			$this->session->set_flashdata('success','Assignment uploaded successfully!');
			redirect('upload_assessment');
		}
		
		if($this->input->post('industrial') == "Upload Form"){
			$industrial = "";
			if($_FILES['userfile']['name'] !=""){
				$industrial = $this->Digitalocean_model->upload_photo($filename="userfile",$path="uploads/assesment_form/industry_assesment/");
				/*
				$tmp = explode('.', $_FILES['userfile']['name']);
				$ext = end($tmp);
				$name = $this->session->userdata('student_id')."-".$this->input->post('year_sem');
				$config = array(
					'upload_path' 	=> "uploads/assesment_form/assignment",
					'allowed_types' => "*",
					'file_name'	=> $name.".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$data = $this->upload->data();				
					$assignment = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					print_r($this->upload->display_errors());
				}*/
			}
			$this->Students_model->upload_industrial($industrial);
			$this->session->set_flashdata('success','Assesment uploaded successfully!');
			redirect('upload_assessment');
		}
		if($this->input->post('guardian') == "Upload Form"){
			$guardian = "";
			if($_FILES['userfile']['name'] !=""){
				$guardian = $this->Digitalocean_model->upload_photo($filename="userfile",$path="uploads/assesment_form/industry_assesment/");
				/*
				$tmp = explode('.', $_FILES['userfile']['name']);
				$ext = end($tmp);
				$name = $this->session->userdata('student_id')."-".$this->input->post('year_sem');
				$config = array(
					'upload_path' 	=> "uploads/assesment_form/assignment",
					'allowed_types' => "*",
					'file_name'	=> $name.".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$data = $this->upload->data();				
					$assignment = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					print_r($this->upload->display_errors());
				}*/
			}
			$this->Students_model->upload_guardian($industrial);
			$this->session->set_flashdata('success','Assesment uploaded successfully!');
			redirect('upload_assessment');
		}
		$data['student'] = $this->Students_model->get_this_result();
		$data['self_assement'] = $this->Students_model->get_my_self_assesment();
		$data['teacher_assement'] = $this->Students_model->get_my_teacher_assesment();
		$data['assignment'] = $this->Students_model->get_assignment();
		$data['industrial'] = $this->Students_model->get_industrial();
		$data['guardian'] = $this->Students_model->get_guardian();
		$this->load->view('student/upload_assessment',$data);
	}


	public function video_list(){
		$result['data'] = $this->Students_model->video_list();
		$this->load->view("student/video_list",$result);
	}

	public function video(){
		$result['data'] = $this->db->where("id",$this->uri->segment(2))->get("tbl_course_video")->row();
		$this->load->view("student/video",$result);
	}
	
	public function provisional_registration_letter(){
		$stu = $this->Students_model->get_student_profile();
		if($stu->course_id==23){
			$data["stu_data"] = $this->Students_model->get_stu_data($stu->id);
			$this->load->view("student/provisional_registration_letter",$data);
		}
		else{
			redirect(base_url());
		}
	}
	
	// 10/6/2021 

	public function migration_certificate(){
		$data["migration"] = $this->Students_model->get_migration_certificate();
		//print_r($data);exit();
		$this->load->view("student/migration_certificate",$data);
	}
	
	public function transfer_certificate(){
		$data["transfer"] = $this->Students_model->get_transfer_certificate();
		$this->load->view("student/transfer_certificate",$data);
	}
	
	public function latter_of_recommendation(){
		$data["recommendation"] = $this->Students_model->get_recommendation_letter();
		$this->load->view("student/latter_of_recommendation",$data);
	}
	
	public function student_degree(){
		$data["degree"] = $this->Students_model->get_degree();
		$data["division"] = $this->Students_model->get_student_division_for_degree();
		$this->load->view("student/student_degree",$data);
	}
     

	public function student_provisional_degree(){
		$data["provisional_degree"] = $this->Students_model->get_student_provisional_degree();
		$data["division"] = $this->Students_model->get_student_division_for_degree();
		$this->load->view("student/student_provisional_degree",$data);
	}
	public function accept_provisional_undertaking(){
	    $this->Students_model->send_provisional_terms();
	    $this->load->view('student/accept_provisional_undertaking');
	}
	public function accept_transfer_undertaking(){
	    $this->Students_model->send_accept_transfer_undertaking();
	    $this->load->view('student/accept_transfer_undertaking');
	}    
	public function accept_transcript_undertaking(){
	    $this->Students_model->send_accept_transcript_undertaking();
	    $this->load->view('student/accept_transcript_undertaking');
	}    
	public function accept_migration_undertaking(){
	    $this->Students_model->send_accept_migration_undertaking();
	    $this->load->view('student/accept_migration_undertaking');
	}   
	   
	 

	public function marksheets(){
		$data["result"] = $this->Students_model->get_all_student_marksheet();
		//print_r($data["result"]);exit();
		$this->load->view('marksheet/SimpleFunctions');
		$this->load->view("student/marksheets",$data);
	}


	public function show_my_marksheet(){
		$data['marksheet'] = $this->Exam_model->get_single_marksheet(); 
		if($data['marksheet']->student_id == $this->session->userdata("student_id")){
		    $this->load->view('marksheet/SimpleFunctions');
			$this->load->view('marksheet/marksheet',$data);
		}
	}
	public function show_my_course_marksheet(){
		$data['marksheet_result'] = $this->Students_model->get_single_coursework_marksheet(); 
		$data['subject_details'] = $this->Students_model->get_course_work_marksheet_details($this->uri->segment(2));
		$this->load->view('marksheet/SimpleFunctions');
		$this->load->view('marksheet/coursework_marksheet',$data); 
	}
	public function upload_old_migration_certificate(){
		if($this->input->post('save') == "Upload_Form"){
			$file="";
			/*
			$config = array(
				'upload_path'   =>"uploads/migration_certificate",
				'allowed_types' =>"gif|jpg|png|jpeg",
				'encrypt_name'  =>true,
			);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('userfile')){
				$data= $this->upload->data();
				$file= $data['file_name'];
			}else{
				$error= array('error'=> $this->upload->display_errors());
				$this->upload->display_errors();
			}
			*/
			$file = $this->Digitalocean_model->upload_photo($filename="userfile",$path="uploads/migration_certificate/");
			// $result=$this->Admin_model->add_course($file);
		}
			// echo $file;exit();
			$this->Students_model->upload_old_migration_certificate($file);
			$this->session->set_flashdata('success','Migration certificatt uploaded successfully!');
			redirect('migration-certificate');
    }
	public function transcript_application(){
	   $this->form_validation->set_rules('enrollment_number','enrollment number','required');	
		if($this->form_validation->run() === FALSE){
    	    $data['student_details'] = $this->Students_model->get_admission_form();
    	    $data['transcript'] = $this->Students_model->get_transcript();
    	    $this->load->view('student/transcript_application',$data);
		}else{
		    $this->Students_model->set_transcript_form();
		    $this->session->set_flashdata('success','Transcript application submitted successfull!');
		    redirect('transcript_application');
		}
	}
	public function transcript_payment(){
	    $data['transcript'] = $this->Students_model->get_transcript();
	    $this->load->view('student/transcript_payment',$data);
	}
	
	public function print_transcript(){
	    $data['transcript'] = $this->Students_model->get_print_transcript();
	    $this->load->view('student/print_transcript',$data);
	}
	public function thesis_submission(){
		$this->form_validation->set_rules('thesis_title','Thesis Title','required');
		if($this->form_validation->run() === FALSE){
			$data['single_thesis'] = $this->Students_model->get_single_thesis_submission();
			$data['guide_data'] = $this->Students_model->get_active_guide_list();
			$this->load->view('student/thesis_submission_form',$data);
		}else{
			$file1 ='';
			/*
			$config = array(
				'upload_path' 	=> "images/thesis",
				'allowed_types' => "*",
				'encrypt_name'	=> true,
			);

			$this->upload->initialize($config);
			if($this->upload->do_upload('userfile2')){
				$data = $this->upload->data();				
				$file1 = $data['file_name'];
					
			}else{
				$error = array('error' => $this->upload->display_errors());	
				$this->upload->display_errors();
			}*/
			$file1 = $this->Digitalocean_model->upload_photo($filename="userfile2",$path="images/thesis/");
			$res = $this->Students_model->insert_thesis_submission($file1);
			if($res == 1){
				$this->session->set_flashdata("success","data added successfully!");
			}
			else{
			      $this->session->set_flashdata('sucess', 'Data updated successfully!!');
			}	
			redirect ('thesis_submission');
		}
	}
	public function synopsis_submission(){
		$this->form_validation->set_rules('thesis_title','Thesis Title','required');
		if($this->form_validation->run() === FALSE){
			$data['single_synopsis_thesis'] = $this->Students_model->get_single_synopsis_thesis();
			$data['guide'] = $this->Students_model->get_active_guide_synopsis_list();
			$this->load->view('student/thesis_synopsis_submission_form',$data);
		}else{
			$file1 ='';
			/*
			$config = array(
				'upload_path' 	=> "images/thesis",
				'allowed_types' => "*",
				'encrypt_name'	=> true,
			);

			$this->upload->initialize($config);
			if($this->upload->do_upload('userfile1')){
				$data = $this->upload->data();				
				$file1 = $data['file_name'];
					
			}else{
				$error = array('error' => $this->upload->display_errors());	
				$this->upload->display_errors();
			
			}*/
			$file1 = $this->Digitalocean_model->upload_photo($filename="userfile1",$path="images/thesis/");
			$res = $this->Students_model->insert_synopsis_thesis_submission($file1);
			if($res == 1){
				$this->session->set_flashdata("success","data added successfully!");
			}
			else{
			      $this->session->set_flashdata('sucess', 'Data updated successfully!!');
			}	
			redirect ('synopsis_submission');
		}
	}
	
	public function update_document(){
		$this->form_validation->set_rules('identity_numer','Identity numer','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('student/update_document');
		}else{
			$identity_file = "";
			if($_FILES['identity_file']['name'] !=""){
				$identity_file = $this->Digitalocean_model->upload_photo($filename="identity_file",$path="images/student_identity_softcopy/");
				/*
				$config = array(
					'upload_path' 	=> "images/student_identity_softcopy/",
					'allowed_types' => "*",
					'encrypt_name' => TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('identity_file')){
					$data = $this->upload->data();				
					$identity_file = $data['file_name'];	
				}else{ 
					$identity_file = $this->input->post('old_identity_file');
				}*/
			}
			$res = $this->Students_model->update_student_document($identity_file);
			$this->session->set_flashdata("success","Document updated successfully!");
			redirect ('student-dashboard');
		}
	}
	public function print_course_work_marksheet(){
		$data['marksheet_result'] = $this->Students_model->get_single_marksheet_result();
		//$data['subject_details'] = $this->Students_model->get_course_work_marksheet_details();
		$this->load->view('student/SimpleFunctions');
		$this->load->view('student/print_course_work_marksheet',$data);
	}
	public function abstract(){
		$this->form_validation->set_rules('validate','Upload Report','required');
		if($this->form_validation->run() === FALSE){
			$data['single_abstract'] = $this->Students_model->get_single_abstract();
			$this->load->view('student/abstract_form',$data);
		}else{
			$file1 ='';
			/*
			$config = array(
				'upload_path' 	=> "images/abstract",
				'allowed_types' => "*",
				'encrypt_name'	=> true,
			);

			$this->upload->initialize($config);
			if($this->upload->do_upload('userfile2')){
				$data = $this->upload->data();				
				$file1 = $data['file_name'];
					
			}else{
				$error = array('error' => $this->upload->display_errors());
				$this->upload->display_errors();
			}*/
			$file1 = $this->Digitalocean_model->upload_photo($filename="userfile2",$path="images/abstract/");
				
			$res = $this->Students_model->insert_abstract($file1);
			if($res == 1){
				$this->session->set_flashdata("success","data added successfully!");
			}
		
			redirect ('abstract');
		}
	}
	public function progress_report(){
		$this->form_validation->set_rules('validate','Progress Report','required');
		if($this->form_validation->run() === FALSE){
			$data['single_progress_report'] = $this->Students_model->get_single_progress_report();
			$this->load->view('student/progress_report_form',$data);
		}else{
			$file1 ='';
			/*
			$config = array(
				'upload_path' 	=> "images/progress_report",
				'allowed_types' => "*",
				'encrypt_name'	=> true,
			);

			$this->upload->initialize($config);
			if($this->upload->do_upload('userfile1')){
				$data = $this->upload->data();				
				$file1 = $data['file_name'];
					
			}else{
				$error = array('error' => $this->upload->display_errors());	
				$this->upload->display_errors();
			}
			*/
			$file1 = $this->Digitalocean_model->upload_photo($filename="userfile1",$path="images/progress_report/");
			$res = $this->Students_model->insert_progress_report($file1);
			if($res == 1){
				$this->session->set_flashdata("success","data added successfully!");
			}
			redirect ('progress_report');
		} 
	}
	public function student_consolidate_student_marksheet(){
		$data['consolidate'] = $this->Students_model->get_my_consolidated_marksheet();
		$this->load->view('student/student_consolidate_student_marksheet',$data);
	}
	public function consolidate_student_marksheet(){
		$data['marksheet'] = $this->Consolidated_model->get_single_markshhet();
		$data['signature'] = $this->Setting_model->get_all_signature();
		$data['marksheet_id'] = $this->Consolidated_model->get_single_marksheet_id();
		$this->load->view('marksheet/consolidate_student_marksheet',$data);
	}
	public function e_book_list(){
	    $data['book'] = $this->Students_model->get_all_ebook();
	    $this->load->view('student/e_book_list',$data);
	}
	public function course_work_result(){
		$data['marksheet_result'] = $this->Students_model->get_single_marksheet_result();
		$data['signature'] = $this->Setting_model->get_all_signature();
		//$data['subject_details'] = $this->Students_model->get_course_work_marksheet_details();
		$this->load->view('student/SimpleFunctions');
		$this->load->view('student/print_course_work_marksheet',$data);
	}
	public function my_noc(){
		$this->load->view('student/my_noc');
	}

}
