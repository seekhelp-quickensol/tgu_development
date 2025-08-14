<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
class Setting_controller extends CI_Controller {  
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
	public function coupon_setting(){
		$this->form_validation->set_rules('coupon_code','coupon code','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_coupon();
			$this->load->view('admin/coupon_setting',$data);
		}else{
			$result = $this->Setting_model->set_coupon_code();
			if($result == "0"){
				$this->session->set_flashdata('success','Coupon added successfully');
			}else{
				$this->session->set_flashdata('success','Coupon updated successfully');
			}
			redirect('coupon_setting');
		}
	}
	public function designation_management(){
		$this->form_validation->set_rules('designation','designation','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_designation();
			$this->load->view('admin/designation_management',$data);
		}else{
			$result = $this->Setting_model->set_designation();
			if($result == "0"){
				$this->session->set_flashdata('success','Designation added successfully');
			}else{
				$this->session->set_flashdata('success','Designation updated successfully');
			}
			redirect('designation_management');
		}
	}
	public function id_management(){
		$this->form_validation->set_rules('id_name','id name','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_id_name();
			$this->load->view('admin/id_management',$data);
		}else{
			$result = $this->Setting_model->set_id_name();
			if($result == "0"){
				$this->session->set_flashdata('success','Id added successfully');
			}else{
				$this->session->set_flashdata('success','Id updated successfully');
			}
			redirect('id_management');
		}
	}
	public function bank_management(){
		$this->form_validation->set_rules('bank_name','bank name','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_bank();
			$this->load->view('admin/bank_management',$data);
		}else{
			$result = $this->Setting_model->set_bank();
			if($result == "0"){
				$this->session->set_flashdata('success','Bank added successfully');
			}else{
				$this->session->set_flashdata('success','Bank updated successfully');
			}
			redirect('bank_management');
		}
	}
	public function employee_list(){
		$this->load->view('admin/employee_list');
	}
	public function employee_progress_report(){
		$this->form_validation->set_rules('month','Please select month','required');
		if($this->form_validation->run() === FALSE){
			$data['employee']  = $this->Setting_model->get_single_employee();
			$data['single'] = $this->Setting_model->get_single_employee_progress_report();
			$this->load->view('admin/employee_progress_report',$data);
		}else{
			$upload_file ='';
			if($_FILES['upload_file']['name'] !=""){
				$file = $this->Digitalocean_model->upload_photo($filename="upload_file",$path="employee_progress_report/"); 
			}else{
				$file = $this->Digitalocean_model->get_photo($loc_of_file="employee_progress_report/"); 
			}
			$result = $this->Setting_model->set_employee_progress_report($file);
			if($result == 0){
				// $data['single'] = $this->Setting_model->get_single_employee_progress_report();
				$this->session->set_flashdata('success','Employee progress report added successfully');
				// $this->load->view('admin/employee_progress_report',$data);
				redirect('employee_progress_report/'.$this->uri->segment(2));
			}else{
				// $data['single'] = $this->Setting_model->get_single_employee_progress_report();
				$this->session->set_flashdata('success','Employee progress report updated successfully');
				// $this->load->view('admin/employee_progress_report',$data);
				redirect('employee_progress_report/'.$this->uri->segment(2));
			}
			
		}
	}
	public function add_employee(){
		$this->form_validation->set_rules('first_name','first name ','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_employee();
			// echo "<pre>";print_r($data['single']);exit;
			$data['country'] = $this->Admin_model->get_all_country();
			$data['designation'] = $this->Setting_model->get_active_designation();
			$this->load->view('admin/add_employee',$data);
		}else{
			$photo ='';
			if($_FILES['userfile']['name'] !=""){
				$photo = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/employee/"); 
				/*$tmp = explode('.', $_FILES['userfile']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/employee/",
					'allowed_types' => "*",
					'encrypt_name'	=> TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$data = $this->upload->data();				
					$photo = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			}
			$this->Setting_model->set_employee($photo);
			$this->session->set_flashdata('success','Employee saved successfully');
			redirect('employee_list');
		}
	}
	public function website_setting(){
		$this->form_validation->set_rules('university_name','University name','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_employee();
			$data['country'] = $this->Admin_model->get_all_country();
			$this->load->view('admin/website_setting',$data);
		}else{
			// $photo='';
			// if($_FILES['userfile']['name'] !=""){
			// 	$photo = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/logo/"); 
			// 	$tmp = explode('.', $_FILES['userfile']['name']);
			// 	$ext = end($tmp);
			// 	$config = array(
			// 		'upload_path' 	=> "images/logo/",
			// 		'allowed_types' => "jpg|jpeg|png",
			// 		'encrypt_name'	=> TRUE,
			// 	);			
			// 	$this->upload->initialize($config);
			// 	if($this->upload->do_upload('userfile')){
			// 		$data = $this->upload->data();				
			// 		$photo = $data['file_name'];	
			// 	}else{ 
			// 		$error = array('error' => $this->upload->display_errors());	
			// 		$this->upload->display_errors();
			// 	}
			// }
			// if($this->Setting_model->set_website_setting($photo)){
			// 	$this->session->set_flashdata('success','Details saved successfully');
			// }else{
			// 	$this->session->set_flashdata('messagge','Failed to save data');
			// }
			// redirect('website_setting');
			$photo ='';
			if($_FILES['userfile']['name'] !=""){ 
				$photo = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/logo/"); 
			} 
			$stamp ='';
			if($_FILES['userfile1']['name'] !=""){ 
				$stamp = $this->Digitalocean_model->upload_photo($filename="userfile1",$path="images/logo/"); 
			}   
			$result = $this->Setting_model->set_website_setting($photo,$stamp);
			if($result == "0"){
				$this->session->set_flashdata('success','Details saved successfully');
			}else{
				$this->session->set_flashdata('messagge','Failed to save data');
			}
			redirect('website_setting');
		}
	}
	public function password_setting(){
		$this->form_validation->set_rules('enrollment','enrollment password','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_password_setting();
			$this->load->view('admin/password_setting',$data);
		}else{
			$this->Setting_model->get_single_password_setting();
			$this->session->set_flashdata('success','Details saved successfully');
			redirect('password_setting');
		}
	}
	public function user_privilege(){
		$this->form_validation->set_rules('name','name','required');
		if($this->form_validation->run() === FALSE){
			$data['privilege'] = $this->Setting_model->get_all_privileges();
			$data['single'] = $this->Setting_model->get_single_privileges();
			$this->load->view('admin/user_privilege',$data);
		}else{
			$result = $this->Setting_model->set_privilege();
			if($result == "0"){
				$this->session->set_flashdata('success','Privilege added successfully');
			}else{
				$this->session->set_flashdata('success','Privilege updated successfully');
			}
			redirect('user_privilege');
		}
	}
	public function user_sub_privilege(){
		$this->form_validation->set_rules('link','link','required');
		if($this->form_validation->run() === FALSE){
			$data['privilege'] = $this->Setting_model->get_all_privileges();
			$data['active_privilege'] = $this->Setting_model->get_active_privileges();
			$data['sub_privilege'] = $this->Setting_model->get_all_privileges_link();
			$data['single'] = $this->Setting_model->get_single_privileges_link();
			$this->load->view('admin/user_sub_privilege',$data);
		}else{
			$result = $this->Setting_model->set_privilege_link();
			if($result == "0"){
				$this->session->set_flashdata('success','Privilege added successfully');
			}else{
				$this->session->set_flashdata('success','Privilege updated successfully');
			}
			redirect('user_sub_privilege');
		}
	}
	public function assign_user_privilege(){
		$this->form_validation->set_rules('user','user','required');
		if($this->form_validation->run() === FALSE){
			$data['user'] = $this->Setting_model->get_active_user();
			$data['sinlge_user'] = $this->Setting_model->get_single_privileges_user();
			$data['privilege'] = $this->Setting_model->get_active_privileges();
			$data['user_privilege'] = $this->Setting_model->get_user_added_privilege();
			$data['user_doc_privilege'] = $this->Setting_model->get_user_added_document_privilege($this->uri->segment(2));
			$data['document_heads'] = $this->Setting_model->get_all_document_heads();
			$this->load->view('admin/assign_user_privilege',$data);
		}else{
			$result = $this->Setting_model->set_user_privileges();
			$this->session->set_flashdata('success','Privileges Updated successfully!');
			redirect('assign_user_privilege');
		}
	}
	public function job_applications(){
		$this->load->view('admin/job_applications');
	}
	public function edit_job_application(){
		$this->form_validation->set_rules('name','name','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_job_application();
			// echo "<pre>";print_r($data['single']);exit; 
	
			$this->load->view('admin/edit_job_application',$data);
		}else{
			$file = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/career/");
			if($file ==""){
				$file = $this->input->post('old_file');
			}
			$result = $this->Setting_model->set_update_job_application($file);
			// echo "<pre>";print_r($result);exit;
			$this->session->set_flashdata('success','job application updated successfully!');
			redirect('job_applications');
		}
	}
	
	public function admin_employee_documents(){ 
		$this->form_validation->set_rules('head','document name','required');
		if($this->form_validation->run() === FALSE){
			$data['employee'] = $this->Setting_model->get_single_employee();
			$this->load->view('admin/admin_employee_documents',$data);
		}else{
			$file ='';
			if($_FILES['userfile']['name'] !=""){
				$file = $this->Digitalocean_model->upload_photo($filename="userfile",$path="uploads/employee_documents/");
				/*$tmp = explode('.', $_FILES['userfile']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "uploads/employee_documents",
					'allowed_types' => "*",
					'encrypt_name'	=> TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')){
					$data = $this->upload->data();				
					$file = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			}
			$result = $this->Setting_model->set_admin_employee_documents($file);
			if($result == "0"){
				$this->session->set_flashdata('success','Document added successfully');
			}else{
				$this->session->set_flashdata('success','Document updated successfully');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function employee_left(){
		$this->Setting_model->employee_left();
		$this->session->set_flashdata('success','Employee lefted successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function employee_not_left(){
		$this->Setting_model->employee_not_left();
		$this->session->set_flashdata('success','Employee not lefted successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}  
	public function left_employee_list(){ 
		$this->load->view('admin/left_employee_list'); 
	}
	public function signature_management(){ 
		$this->form_validation->set_rules('name_of_signature','name_of_signature','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_signature();
			$this->load->view('admin/signature_management',$data);  
		}else{
			$old_signature = $this->input->post('old_signature');  
			if ($_FILES['signature']['name'] != ""){  
			 	$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "certificate_signature/"); 
			} 
			if($signature == ""){ 
				$signature = $old_signature; 
			} 
			$this->Setting_model->set_signature($signature);
			$this->session->set_flashdata('success','Signture saved successfully');
			redirect('signature_management');
		}
	}
	public function exam_setup(){ 
		$this->form_validation->set_rules('month','Exam Month','required');
		if($this->form_validation->run() === FALSE){
			$data['signature'] = $this->Setting_model->get_all_signature();
			$data['session'] = $this->Setting_model->get_all_session();
			$data['single'] = $this->Setting_model->get_single_exam_setup($this->uri->segment(2));
			$data['single_details'] = $this->Setting_model->get_single_exam_setup_details($this->uri->segment(2));
			// echo '<pre>';print_r($data['single_details']);exit();
			$this->load->view('admin/exam_setup',$data);
		}else{
			$result = $this->Setting_model->set_exam_setup();
			if($result == "1"){
				$this->session->set_flashdata('success','Exam setup added successfully');
			}else{
				$this->session->set_flashdata('success','Exam setup updated successfully');
			}
			redirect('exam_setup');
		}
	}
	public function delete_exam_setup(){
		$this->Setting_model->delete_exam_setup();
		$this->session->set_flashdata('success','Exam setup deleted successfully');
		redirect('exam_setup');
	} 
	public function inactive_exam_setup(){
		$this->Setting_model->inactive_exam_setup();
		$this->session->set_flashdata('success','Exam setup inactivate successfully');
		redirect('exam_setup');
	} 
	public function active_exam_setup(){
		$this->Setting_model->active_exam_setup();
		$this->session->set_flashdata('success','Exam setup activate successfully');
		redirect('exam_setup');
	} 
	public function delete_center(){
		$this->Setting_model->delete_center();
		$this->session->set_flashdata('success','Center deleted successfully');
		redirect('list_manage_center');
	} 
	public function terms_and_conditions(){
		$this->form_validation->set_rules('terms_and_conditions','terms and condition','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_terms_and_conditions();
			// echo "<pre>";print_r($data['single']);exit;
			$this->load->view('admin/terms_and_conditions',$data);
		}else{
			$result = $this->Setting_model->set_terms_and_conditions();
			// echo "<pre>";print_r($result);exit;
			if($result == "0"){
				$this->session->set_flashdata('success','Terms and Condition added successfully');
			}else{
				$this->session->set_flashdata('success','Terms and Condition updated successfully');
			}
			redirect('terms_and_conditions');
		}
	}
	
	
	public function privacy_policy(){
		$this->form_validation->set_rules('privacy_policy','privacy policy','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_privacy_policy();
			// echo "<pre>";print_r($data['single']);exit;
			$this->load->view('admin/privacy_policy',$data);
		}else{
			$result = $this->Setting_model->set_privacy_policy();
			
			if($result == "0"){
				$this->session->set_flashdata('success','Privacy policy added successfully');
			}else{
				$this->session->set_flashdata('success','Privacy policy updated successfully');
			}
			redirect('privacy_policy');
		}
	}
	public function certificate_fees_management(){
		$this->form_validation->set_rules('certificate_type','certificate type','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_certificate_fees();
			$this->load->view('admin/certificate_fees_management',$data);
		}else{
			$result = $this->Setting_model->set_certificate_fees();
			if($result == "0"){
				$this->session->set_flashdata('success','Certificate fees added successfully');
			}else{
				$this->session->set_flashdata('success','Certificate fees updated successfully');
			}
			redirect('certificate_fees_management');
		}
	}
	public function delete_certificate_fees(){
		$this->Setting_model->delete_certificate_fees();
		$this->session->set_flashdata('success','Certificate fees deleted successfully');
		redirect('certificate_fees_management');
	} 
	public function inactive_certificate_fees(){
		$this->Setting_model->inactive_certificate_fees();
		$this->session->set_flashdata('success','Certificate fees inactivate successfully');
		redirect('certificate_fees_management');
	} 
	public function active_certificate_fees(){
		$this->Setting_model->active_certificate_fees();
		$this->session->set_flashdata('success','Certificate fees activate successfully');
		redirect('certificate_fees_management');
	} 
	public function list_manage_exam_fees(){
		$this->load->view('admin/list_manage_exam_fees');
	}
	
	public function help_setup_questions(){ 
		$this->form_validation->set_rules('question','question','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_question();
			$this->load->view('admin/help_setup_questions',$data);  
		}else{
			$this->Setting_model->set_question();
			$this->session->set_flashdata('success','Question saved successfully..');
			redirect('help_setup_questions');
		}
	}
	public function search_help_setup(){
		$data['help'] = $this->Setting_model->get_help_setup_record();
		$this->load->view('admin/search_help_setup',$data);
	}
	public function center_session(){
		$this->form_validation->set_rules('center_id','Center Name','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Setting_model->get_single_center_session_data();
			$data['center_data'] = $this->Setting_model->get_all_center_data();
			$data['session'] = $this->Setting_model->get_all_session();
			$data['course'] = $this->Setting_model->get_all_courses();
			$this->load->view('admin/center_session',$data);
		}else{
			$result = $this->Setting_model->set_center_session();
			if($result == "0"){
				$this->session->set_flashdata('success','Center session added successfully');
			}else{
				$this->session->set_flashdata('success','Center session updated successfully');
			}
			redirect('center_session_list');
		}
	}
	public function center_session_list(){
		$this->load->view('admin/center_session_list');
	}
}
	