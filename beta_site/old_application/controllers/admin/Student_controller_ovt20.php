<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Student_controller extends CI_Controller { 
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
		$access = $this->Setting_model->get_user_privilege_link();
		if(!in_array($this->uri->segment(1),$access)){
			//$this->session->set_flashdata('message','Sorry! You dont have access to this module!');
			//redirect(base_url());
		}
	}
	public function new_pending_student(){
		if($this->input->post('save_btn') == 'reply_submit'){
			$this->Student_model->set_cancel_student_remark();
			$this->session->set_flashdata('success','Admission cancel successfully!');
			redirect('new_pending_student');
		}
		$this->load->view('admin/new_pending_student');
	}
	public function enrolled_new_student(){
		if($this->input->post('validate_password') == "validate_password"){
			$result = $this->Student_model->enroll_validate_password();
			if($result){
				$this->session->set_flashdata('success','Password validated');
			}else{
				$this->session->set_flashdata('message','invalid password');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
		$this->form_validation->set_rules('student_name','student name','required');
		if($this->form_validation->run() === FALSE){
			$data['student'] = $this->Student_model->get_student_for_enrolled();
			$data['fees'] = $this->Student_model->get_student_fees_for_enrolled();
			$data['bank'] = $this->Student_model->get_active_bank();
			$this->load->view('admin/enrolled_new_student',$data);
		}else{
			$result = $this->Student_model->generate_enrollment_number();
			$this->session->set_flashdata('success','Fees record updated successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function print_admission_form(){
		$data['admission'] = $this->Student_model->get_admission_form();
		$data['qualification'] = $this->Student_model->get_admission_qualification();
		$this->load->view('admin/print_admission_form',$data);
	}
	public function admin_print_id(){
		$data['student_profile'] = $this->Student_model->get_admission_form();
		$this->load->view('admin/id_card',$data);
	}
	public function admission_list(){
		if($this->input->post('save_btn') == 'reply_submit'){
			$this->Student_model->set_cancel_student_remark();
			$this->session->set_flashdata('success','Admission cancel successfully!');
			redirect('admission_list');
		}
		$this->load->view('admin/admission_list');
	}
	public function new_admission(){
		$this->load->view('admin/new_admission');
	}
	public function today_admission(){
		$this->load->view('admin/today_admission');
	}
	public function approved_admission(){
		$this->Student_model->approved_admission();
		$this->session->set_flashdata('success','Admission approved successfully!');
		redirect('new_admission');
	}
	public function update_student(){
		$this->form_validation->set_rules('student_name','student name','required');
		$this->form_validation->set_rules('student_id','student name','required');
		if($this->form_validation->run() === FALSE){
			$data['student'] = $this->Student_model->get_single_student();
			$data['course'] = $this->Course_model->get_all_course_stream_relation();
			$data['country'] = $this->Web_model->get_all_country();
			$data['qualification'] = $this->Student_model->get_single_qualification();
			$data['session'] = $this->Student_model->get_all_session();
			$data["centers"] = $this->Separate_student_model->get_all_centers();
			$this->load->view('admin/update_student',$data);
		}else{
			$photo ='';
			if($_FILES['photo']['name'] !=""){
				$tmp = explode('.', $_FILES['photo']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/profile_pic/",
					'allowed_types' => "jpg|jpeg|png",
					'file_name'		=> $this->input->post('student_id')."-sin".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('photo')){
					$data = $this->upload->data();				
					$photo = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$signature ='';
			if($_FILES['signature']['name'] !=""){
				$tmp = explode('.', $_FILES['signature']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/signature/",
					'allowed_types' => "*",
					'file_name'		=> $this->input->post('student_id')."-sin".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('signature')){
					$data = $this->upload->data();				
					$signature = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$noc = "";
			if($_FILES['noc']['name'] !=""){
				
					$config = array(
						'upload_path' 	=> "images/noc/",
						'allowed_types' => "*",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('noc')){
						$data = $this->upload->data();				
						$noc = $data['file_name'];	
					}
			}
			//echo $signature;exit;
			$secondary_marksheet ='';
			if($_FILES['secondary_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['secondary_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "*",
					'file_name'		=> $this->input->post('student_id')."-secondary".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('secondary_marksheet')){
					$data = $this->upload->data();				
					$secondary_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$sr_secondary_marksheet ='';
			if($_FILES['sr_secondary_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['sr_secondary_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "*",
					'file_name'	=> $this->input->post('student_id')."-sr_secondary".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('sr_secondary_marksheet')){
					$data = $this->upload->data();				
					$sr_secondary_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$graduation_marksheet ='';
			if($_FILES['graduation_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['graduation_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "*",
					'file_name'	=> $this->input->post('student_id')."-graduation".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('graduation_marksheet')){
					$data = $this->upload->data();				
					$graduation_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$post_graduation_marksheet ='';
			if($_FILES['post_graduation_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['post_graduation_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "*",
					'file_name'	=> $this->input->post('student_id')."-pg".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('post_graduation_marksheet')){
					$data = $this->upload->data();				
					$post_graduation_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$other_qualification_marksheet ='';
			if($_FILES['other_qualification_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['other_qualification_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "*",
					'file_name'	=> $this->input->post('student_id')."-oth".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('other_qualification_marksheet')){
					$data = $this->upload->data();				
					$other_qualification_marksheet = $data['file_name'];	
				}else{ echo $this->upload->display_errors();exit;
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			} 
			$result = $this->Student_model->update_student($photo,$noc,$signature,$secondary_marksheet,$sr_secondary_marksheet,$graduation_marksheet,$post_graduation_marksheet,$other_qualification_marksheet);
			$this->session->set_flashdata('success','Student updated successfully!');
			redirect('new_pending_student');
		}
	}
	public function manage_student_account(){ 
		$this->form_validation->set_rules('student_id','student name','required');
		if($this->form_validation->run() === FALSE){
			$data['student'] = $this->Student_model->get_single_student();
			$data['bank'] = $this->Setting_model->get_all_bank_list(); 
			$data['payment'] = $this->Student_model->get_all_student_fees(); 
			$data['single'] = $this->Student_model->get_single_student_fees(); 
			$data['paid_amt'] = $this->Student_model->get_student_paid_addmission_fees(); 
			$data['exam_amt'] = $this->Student_model->get_student_paid_exam_fees();
			$data['lateral_amt'] = $this->Student_model->get_student_lateral_fees();
			$this->load->view('admin/manage_student_account',$data);
		}else{
			$result = $this->Student_model->update_student_account();
			$this->session->set_flashdata('success','Account updated successfully!');
			redirect('manage_student_account/'.$this->input->post('student_id'));
		}
	}
	public function student_qualification(){
		$data['student'] = $this->Student_model->get_single_student();
		$data['qualification'] = $this->Student_model->get_admission_qualification();
		$this->load->view('admin/student_qualification',$data);
	}
	public function otp_lead(){
		$this->load->view('admin/otp_lead');
	}
	public function enquiry_list(){
		$this->load->view('admin/enquiry_list');
	}
	public function pulp_enquiry_list(){
		$this->load->view('admin/pulp_enquiry_list');
	}
	public function admin_campus_enquiry(){
		$this->load->view('admin/admin_campus_enquiry');
	}
	
	public function successfull_phd_registration(){
		$this->load->view('admin/successfull_phd_registration');
	}
	public function failed_phd_registration(){
		$this->load->view('admin/failed_phd_registration');
	}
	public function edit_phd_registration_payment(){
		$this->form_validation->set_rules('student_name','student name','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Student_model->get_failed_phd_single();
			$this->load->view('admin/edit_phd_registration_payment',$data);
		}else{
			$result = $this->Student_model->set_update_phd_payment();
			$this->session->set_flashdata('success','Payment updated successfully!');
			redirect('failed_phd_registration');
		}
	}
	public function view_phd_registration_payment(){
		$data['student'] = $this->Student_model->get_failed_phd_single();
		$this->load->view('admin/view_phd_registration_payment',$data);
	}
	public function phd_exams_student(){
		$data['student'] = $this->Student_model->get_phd_exam_student();
		$this->load->view('admin/phd_exams_student',$data);
	}
	public function student_feedback_list(){
		$this->load->view('admin/student_feedback_list');
	}
	public function phd_exam_student_ans_book(){
		$data['student_ans_book_test_name'] = $this->Student_model->get_phd_exam_student_ans_book_test_name(); 
		$this->load->view('admin/phd_exam_student_ans_book',$data);
	}
	public function send_phd_result_mail(){
		$this->Student_model->send_phd_result_mail();
		$this->session->set_flashdata('success','Mail sent successfully!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function re_registered_student_success(){
		$this->load->view("admin/re_registered_student_success");
	}

	public function re_registered_student_fail(){
		$this->load->view("admin/re_registered_student_success");
	}

	public function student_re_registration_edit(){
		$this->form_validation->set_rules("bank","bank","required");
		if($this->form_validation->run()===FALSE){
			$data['bank'] = $this->Student_model->get_active_bank();
			$data["stu_data"] = $this->Student_model->get_failed_re_registered_student($this->uri->segment(3));
			//echo "<pre>";
			//print_r($data);exit;
			$this->load->view("admin/student_re_registration_edit",$data);
		}
		else{
			$this->Student_model->student_re_registration_edit();
			$this->session->set_flashdata('success','Payment updated successfully!');
			redirect("re-registered-student-success");
		}
	}
	
	public function pendding_reregistration_student_list(){
		$this->load->view("admin/pendding_reregistration_student_list");
	}
	public function cancel_admission_list(){
		$this->load->view("admin/cancel_admission_list");
	}
	public function new_thesis_list(){
		$this->load->view("admin/new_thesis_list");
	}
	public function complete_thesis_list(){
		$this->load->view("admin/complete_thesis_list");
	}
	public function update_thesis(){
		$this->form_validation->set_rules("thesis_title","thesis title","required");
		if($this->form_validation->run()===FALSE){
			$data['single'] = $this->Student_model->get_single_thesis();
			$data['guide'] = $this->Student_model->get_active_guide_list();
			$this->load->view("admin/update_thesis",$data);	
		}else{
			$file1 ='';
			if(isset($_FILES['file1'])){
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
				}
		    }
			$res = $this->Student_model->get_update_thesis($file1);
			if($res == 1){
			      $this->session->set_flashdata('sucess', 'Data updated successfully!!');
			}	
			redirect ('new_thesis_list');

		}
	}
	public function new_synopsis_list(){
		$this->load->view("admin/new_synopsis_list");
	}
	public function complete_synopsis_list(){
		$this->load->view("admin/complete_synopsis_list");
	}
	public function update_synopsis(){
		$this->form_validation->set_rules("thesis_title","thesis title","required");
		if($this->form_validation->run()===FALSE){
			$data['single_synopsis'] = $this->Student_model->get_single_synopsis();
			$data['guide_list'] = $this->Student_model->get_active_guide_synopsis_list();
			$this->load->view("admin/update_synopsis",$data);	
		}else{
			$file1 ='';
			if(isset($_FILES['file1'])){
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
				}
		    }
			$res = $this->Student_model->get_update_synopsis($file1);
			if($res == 1){
			      $this->session->set_flashdata('sucess', 'Data updated successfully!!');
			}	
			redirect ('new_synopsis_list');

		}
	}
	public function abstract_report_list(){
		$this->load->view("admin/abstract_report_list");
	}
	public function progress_report_list(){
		$this->load->view("admin/progress_report_list");
	}
	public function hold_login(){
		$this->Student_model->hold_login();
		$this->session->set_flashdata('success','Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function activate_login(){
		$this->Student_model->activate_login();
		$this->session->set_flashdata('success','Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	} 
	public function hold_login_single(){
		$this->Student_model->hold_login_single();
		$this->session->set_flashdata('success','Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function activate_login_single(){
		$this->Student_model->activate_login_single();
		$this->session->set_flashdata('success','Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function enquiry_head(){
	    $this->form_validation->set_rules("head_name","head name","required");
		if($this->form_validation->run()===FALSE){
		    $data['single'] = $this->Student_model->get_single_followup_head();
		    $this->load->view("admin/enquiry_head",$data);
		}else{
			$result = $this->Student_model->set_enquiry_head();
			if($result == 1){
			      $this->session->set_flashdata('sucess', 'Head updated successfully!!');
			}else{
			    $this->session->set_flashdata('sucess', 'Head added successfully!!');
			}
			redirect ('enquiry_head');
		}
	}

}