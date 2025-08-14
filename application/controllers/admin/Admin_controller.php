<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->is_logged();
		//$this->check_access();
	}
	public function is_logged()
	{
		if ($this->session->userdata('admin_id') == "") {
			redirect('erp-access');
		}
	}
	public function check_access()
	{
		if ($this->session->userdata('admin_id') != "1") {
			$access = $this->Setting_model->get_user_privilege_link();
			if (!in_array($this->uri->segment(1), $access)) {
				$this->session->set_flashdata('message', 'Sorry! You dont have access to this module!');
				redirect(base_url());
			}
		}
	}
	public function all_logs_view()
	{
		$data['logs'] = $this->Admin_model->get_all_log();
		$this->load->view('admin/all_logs', $data);
	}
	public function reject_blen_kyc()
	{
		$this->Admin_model->reject_blen_kyc();
		$this->session->set_flashdata('success', 'KYC rejected successfully!');
		redirect('blended_kyc_list');
	}
	public function approve_blen_kyc()
	{
		$this->Admin_model->approve_blen_kyc();
		$this->session->set_flashdata('success', 'KYC approved successfully!');
		redirect('blended_kyc_list');
	}
	public function send_new_blen_kyc()
	{
		$this->Admin_model->send_new_blen_kyc();
		$this->session->set_flashdata('success', 'KYC moved to new list successfully!');
		redirect('blended_kyc_list');
	}
	public function kyc_list()
	{
		$data['kyc'] = $this->Admin_model->get_new_kyc_list();
		$this->load->view('admin/new_kyc_list', $data);
	}
	public function create_blended_kyc()
	{
		$this->form_validation->set_rules('enrollment_number', 'enrollment number', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['kyc'] = $this->Admin_model->get_blended_kyc_link();
			$this->load->view('admin/create_blended_kyc', $data);
		} else {
			$this->Admin_model->set_blended_kyc_link();
			$this->session->set_flashdata('success', 'Link added successfully');
			redirect('create_blended_kyc');
		}
	}
	public function blended_kyc_list()
	{
		$data['kyc'] = $this->Admin_model->get_new_blended_kyc_list();
		$this->load->view('admin/blended_kyc_list', $data);
	}
	public function rejected_blended_kyc_list()
	{
		$data['kyc'] = $this->Admin_model->get_rejected_blended_kyc_list();
		$this->load->view('admin/rejected_blended_kyc_list', $data);
	}
	public function approve_blended_kyc_list()
	{
		$data['kyc'] = $this->Admin_model->get_approved_blended_kyc_list();
		$this->load->view('admin/approved_blended_kyc_list', $data);
	}
	public function create_regular_kyc()
	{
		$this->form_validation->set_rules('enrollment_number', 'enrollment number', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['kyc'] = $this->Admin_model->get_regular_kyc_link();
			$this->load->view('admin/create_regular_kyc', $data);
		} else {
			$this->Admin_model->set_regular_kyc_link();
			$this->session->set_flashdata('success', 'Link added successfully');
			redirect('create_regular_kyc');
		}
	}
	public function regular_kyc_list()
	{
		$data['kyc'] = $this->Admin_model->get_new_reguar_kyc_list();
		$this->load->view('admin/regular_kyc_list', $data);
	}
	public function approve_regular_kyc_list()
	{
		$data['kyc'] = $this->Admin_model->get_approved_regular_kyc_list();
		$this->load->view('admin/get_approved_regular_kyc_list', $data);
	}
	public function rejected_regullar_kyc_list()
	{
		$data['kyc'] = $this->Admin_model->get_regular_rejected_kyc_list();
		$this->load->view('admin/rejected_regullar_kyc_list', $data);
	}
	public function rejected_direct_kyc_list()
	{
		$data['kyc'] = $this->Admin_model->rejected_direct_kyc_list();
		$this->load->view('admin/rejected_direct_kyc_list', $data);
	}
	public function approve_direct_kyc_list()
	{
		$data['kyc'] = $this->Admin_model->approve_direct_kyc_list();
		$this->load->view('admin/approve_direct_kyc_list', $data);
	}
	public function reject_regular_kyc()
	{
		$this->Admin_model->reject_regular_kyc();
		$this->session->set_flashdata('success', 'KYC rejected successfully!');
		redirect('regular_kyc_list');
	}
	public function reject_direct_kyc()
	{
		$this->Admin_model->reject_direct_kyc();
		$this->session->set_flashdata('success', 'KYC rejected successfully!');
		redirect('rejected_direct_kyc_list');
	}
	public function approve_direct_kyc()
	{
		$this->Admin_model->approve_direct_kyc();
		$this->session->set_flashdata('success', 'KYC approved successfully!');
		redirect('approve_direct_kyc_list');
	}
	public function approve_regular_kyc()
	{
		$this->Admin_model->approve_regular_kyc();
		$this->session->set_flashdata('success', 'KYC approved successfully!');
		redirect('regular_kyc_list');
	}
	public function send_new_regular_kyc()
	{
		$this->Admin_model->send_new_regular_kyc();
		$this->session->set_flashdata('success', 'KYC moved to new list successfully!');
		redirect('regular_kyc_list');
	}
	public function direct_kyc_list()
	{
		$data['kyc'] = $this->Admin_model->get_new_direcgt_kyc_list();
		$this->load->view('admin/direct_kyc_list', $data);
	}
	public function dashboard()
	{
		//$this->Admin_model->remove_duplicate_exam_form();
		$data['logs'] = $this->Admin_model->get_dashboard_log();
		$data['faculty_count'] = $this->Admin_model->get_faculty_count();
		$data['course_count'] = $this->Admin_model->get_course_count();
		$data['stream_count'] = $this->Admin_model->get_stream_count();
		$data['subject_count'] = $this->Admin_model->get_subject_count();
		$data['course_stream_relation_count'] = $this->Admin_model->get_course_stream_relation_count();
		$data['all_birthdays'] = $this->Admin_model->get_all_birthdays_new();
		// echo "<pre>"; print_r($data['all_birthdays']);exit;
		$this->load->view('admin/index', $data);
	}
	public function profile_setting()
	{
		/*$res = $this->db->get('tbl_separate_student_marksheet');
		$res = $res->result();
		if(!empty($res)){
			foreach($res as $res_result){
				$data = array(
					'sr_number' => $res_result->id
				);
				$this->db->where('id',$res_result->id);
				$this->db->update('tbl_separate_student_marksheet',$data);
			}
		}*/
		if ($this->input->post('password_submit') == "password_submit") {
			$this->Admin_model->set_password();
			$this->session->set_flashdata('success', 'Password updated successfully');
			redirect('profile-setting');
		}
		$this->form_validation->set_rules('first_name', 'first name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['country'] = $this->Admin_model->get_all_country();
			$this->load->view('admin/profile', $data);
		} else {
			$photo = '';
			if ($_FILES['userfile']['name'] != "") {
				$photo = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "images/employee/");
				/*$tmp = explode('.', $_FILES['userfile']['name']);
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
				}*/
			}
			$this->Admin_model->set_profile($photo);
			$this->session->set_flashdata('success', 'Profile updated successfully');
			redirect('profile-setting');
		}
	}
	// By govind potdar - 14-7-2021
	public function ammount_filter()
	{
		$data["sessions"] = $this->Admin_model->get_session_data_for_dropdown();
		$data["centers"] = $this->Admin_model->get_center_data_for_dropdown();
		$data["students"] = $this->Admin_model->get_student_data_for_dropdown();
		$data["datas"] = $this->Student_model->get_amount_filter();
		$this->load->view("admin/ammount_filter", $data);
	}
	//ends here
	public function cbd_complaint_list()
	{
		$this->load->view("admin/cbd_complaint_list");
	}
	public function delete_cbd_files()
	{
		$this->Admin_model->delete_cbd_files();
		$this->session->set_flashdata('success', 'File removed successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function delete_cbd_rtis()
	{
		$this->Admin_model->delete_cbd_rtis();
		$this->session->set_flashdata('success', 'RTI removed successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function placement_record_form_list()
	{
		$data['placement_record_form_list'] = $this->Admin_model->placement_record_form_list();
		// print_r($data['placement_record_form_list']);exit();
		$this->load->view("admin/placement_record_form_list", $data);
	}
	public function admin_edit_cdb_form()
	{
		$this->form_validation->set_rules("email", "Email", "required");
		if ($this->form_validation->run() === FALSE) {
			$data["single_cbd_form"] = $this->Admin_model->get_single_cbd_form_admin();
			$this->load->view("admin/admin_edit_cdb_form", $data);
		} else {
			$fileName = "";
			$fileName = $this->Digitalocean_model->upload_photo_multiple($filename = "upload_file", $path = "rti_reply/");
			$rti = "";
			$rti = $this->Digitalocean_model->upload_photo_multiple($filename = "file", $path = "rti_reply/");
			$this->Admin_model->update_cbd_form($fileName, $rti);
			redirect("cbd_complaint_list");
		}
	}
	public function edit_rti_grievance()
	{
		$this->form_validation->set_rules("email", "Email", "required");
		if ($this->form_validation->run() === FALSE) {
			$data["single_cbd_form"] = $this->Admin_model->get_single_rti_grievance();
			// echo "<pre>";
			// print_r($data["single_cbd_form"]);
			// exit;
			$this->load->view("admin/edit_rti_grievance", $data);
		} else {
			$fileName = "";
			$fileName = $this->Digitalocean_model->upload_photo_multiple($filename = "upload_file", $path = "rti_reply/");
			$rti = "";
			$rti = $this->Digitalocean_model->upload_photo_multiple($filename = "file", $path = "rti_reply/");
			$this->Admin_model->update_rti_grievance_form($fileName, $rti);
			redirect("rti_grievance_list");
		}
	}
	public function direct_payment_success_list()
	{
		$this->load->view("admin/direct_payment_success_list");
	}
	public function direct_payment_failed_list()
	{
		$this->load->view("admin/direct_payment_failed_list");
	}
	public function employee_left()
	{
		$this->Admin_model->employee_left();
		$this->session->set_flashdata('success', 'Employee left successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function seo_registration()
	{
		$this->form_validation->set_rules('url', 'Url', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['single_seo_data'] = $this->Admin_model->get_single_seo_data();
			//$data['seo_setup_list'] = $this->Admin_model->get_seo_setup_list();
			$this->load->view('admin/seo_registration_form', $data);
		} else {
			$res = $this->Admin_model->insert_seo_data();
			if ($res == 1) {
				$this->session->set_flashdata("success", "data added successfully!");
			} else {
				$this->session->set_flashdata('sucess', 'Data updated successfully!!');
			}
			redirect('seo_registration');
		}
	}
	public function delete()
	{
		$this->Admin_model->delete();
		$this->session->set_flashdata('success', 'Record deleted successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function add_paper()
	{
		$this->form_validation->set_rules('course', 'course', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['course'] = $this->Admin_model->get_active_course();
			$data['stream'] = $this->Admin_model->get_active_stream();
			$data['subject'] = $this->Admin_model->get_active_subject();
			$data['single'] = $this->Admin_model->get_single_paper();
			$data['session'] = $this->Admin_model->get_active_session();
			$this->load->view('admin/add_paper', $data);
		} else {
			$photo = '';
			if ($_FILES['file']['name'] != "") {
				$photo = $this->Digitalocean_model->upload_photo($filename = "file", $path = "uploads/papers/");
				/*$tmp = explode('.', $_FILES['file']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "uploads/papers/",
					'allowed_types' => "*",
					'encrypt_name' 	=> TRUE,
				);
				print_r($photo);
				
				$this->upload->initialize($config);
				if($this->upload->do_upload('file')){
					
					$data = $this->upload->data();
					$photo = $data['file_name'];
				}else{
					
					print_r($error = array('error' => $this->upload->display_errors()));
					$this->upload->display_errors();
					redirect($_SERVER['HTTP_REFERER']);
				}*/
			}
			$res = $this->Admin_model->insert_paper_data($photo);
			if ($res == 0) {
				$this->session->set_flashdata("success", "Papers added successfully!");
			} else {
				$this->session->set_flashdata('sucess', 'Papers updated successfully!!');
			}
			redirect('add_paper');
		}
	}
	public function center_paper_list()
	{
		$this->form_validation->set_rules('course', 'course', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['course'] = $this->Admin_model->get_active_course();
			$data['stream'] = $this->Admin_model->get_active_stream();
			$data['subject'] = $this->Admin_model->get_active_subject();
			$data['single'] = $this->Admin_model->get_single_paper();
			$data['session'] = $this->Admin_model->get_active_session();
			$this->load->view('admin/center_paper_list', $data);
		} else {
			$photo = '';
			if ($_FILES['file']['name'] != "") {
				$photo = $this->Digitalocean_model->upload_photo($filename = "file", $path = "uploads/papers/");
				/*$tmp = explode('.', $_FILES['file']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "uploads/papers/",
					'allowed_types' => "*",
					'encrypt_name' 	=> TRUE,
				);
				print_r($photo);
				
				$this->upload->initialize($config);
				if($this->upload->do_upload('file')){
					
					$data = $this->upload->data();
					$photo = $data['file_name'];
				}else{
					
					print_r($error = array('error' => $this->upload->display_errors()));
					$this->upload->display_errors();
					redirect($_SERVER['HTTP_REFERER']);
				}*/
			}
			$res = $this->Admin_model->insert_paper_data($photo);
			if ($res == 0) {
				$this->session->set_flashdata("success", "Papers added successfully!");
			} else {
				$this->session->set_flashdata('sucess', 'Papers updated successfully!!');
			}
			redirect('add_paper');
		}
	}
	public function reject_assesment()
	{
		$this->Admin_model->reject_assesment();
		$student_details = $this->Admin_model->get_student_details();
		// print_r($emailID->email);exit;
		$this->Admin_model->send_rejection_email($student_details);
		$this->Admin_model->send_rejection_sms($student_details);
		$this->session->set_flashdata('success', 'Rejection Email Sent Successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function approve_assesment()
	{
		$this->Admin_model->approve_assesment();
		// $student_details = $this->Admin_model->get_student_details();
		$this->session->set_flashdata('success', 'Assesment Is Approved Successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function student_assessments()
	{
		// print_r();exit;
		if ($this->input->post('reject') == "reject") {
			$this->Admin_model->reject_assesment();
			$this->session->set_flashdata('success', 'Rejection Email Sent Successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['self_assement'] = $this->Admin_model->get_my_self_assesments($this->uri->segment(2));
		// echo "<pre>";print_r($data['self_assement']);exit;
		$data['session'] = $this->Admin_model->get_session_data_for_dropdown();
		$this->load->view('admin/student_assessments', $data);
	}
	public function student_assessment()
	{
		// print_r();exit;
		if ($this->input->post('reject') == "reject") {
			$this->Admin_model->reject_assesment();
			$this->session->set_flashdata('success', 'Rejection Email Sent Successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['self_assement'] = $this->Admin_model->get_my_self_assesment();
		// echo "<pre>";print_r($data['self_assement']);exit;
		$data['session'] = $this->Admin_model->get_session_data_for_dropdown();
		$this->load->view('admin/student_assessment', $data);
	}
	public function teacher_assessment()
	{
		if ($this->input->post('reject_teacher') == "reject_teacher") {
			$this->Admin_model->reject_teacher_assesment();
			$this->session->set_flashdata('success', 'Rejection Email Sent Successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['teacher_assement'] = $this->Admin_model->get_my_teacher_assesment();
		$data['session'] = $this->Admin_model->get_session_data_for_dropdown();
		$this->load->view('admin/teacher_assessment', $data);
	}
	public function student_assignment()
	{
		if ($this->input->post('reject_assignment') == "reject_assignment") {
			$this->Admin_model->reject_assignment_assesment();
			$this->session->set_flashdata('success', 'Rejection Email Sent Successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['assignment'] = $this->Admin_model->get_assignment();
		$data['session'] = $this->Admin_model->get_session_data_for_dropdown();
		$this->load->view('admin/student_assignment', $data);
	}
	public function student_industry_assessment()
	{
		if ($this->input->post('reject_industry') == "reject_industry") {
			$this->Admin_model->reject_industry_assesment();
			$this->session->set_flashdata('success', 'Rejection Email Sent Successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['industry_assesment'] = $this->Admin_model->get_my_industry_assesment();
		$data['session'] = $this->Admin_model->get_session_data_for_dropdown();
		$this->load->view('admin/student_industry_assessment', $data);
	}
	public function student_guardian_assessment()
	{
		if ($this->input->post('reject_guardian') == "reject_guardian") {
			$this->Admin_model->reject_guardian_assesment();
			$this->session->set_flashdata('success', 'Rejection Email Sent Successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$data['guardian_assesment'] = $this->Admin_model->get_my_guardian_assesment_new_month();
		$data['session'] = $this->Admin_model->get_session_data_for_dropdown();
		$this->load->view('admin/student_guardian_assessment', $data);
	}
	public function rejected_assessment()
	{
		// $data['self_assement'] = array();
		// if(isset($_GET['start_date']) && $_GET['start_date'] !=""){ 
		$data['self_assement'] = $this->Admin_model->get_rejected_my_self_assesment();
		// print_r($data['self_assement']);exit;
		$data['teacher_assement'] = $this->Admin_model->get_rejected_my_teacher_assesment();
		$data['assignment'] = $this->Admin_model->get_rejected_assignment();
		$data['industry_assesment'] = $this->Admin_model->get_rejected_my_industry_assesment();
		$data['guardian_assesment'] = $this->Admin_model->get_rejected_my_guardian_assesment();
		$this->load->view('admin/rejected_assessment', $data);
		// }
	}
	public function approved_assessment()
	{
		$data['self_assement'] = $this->Admin_model->get_approved_my_self_assesments();
		// $data['teacher_assement'] = $this->Admin_model->get_approved_my_teacher_assesment();
		// $data['assignment'] = $this->Admin_model->get_approved_assignment();
		// $data['industry_assesment'] = $this->Admin_model->get_approved_my_industry_assesment();
		// $data['guardian_assesment'] = $this->Admin_model->get_approved_my_guardian_assesment();
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$this->load->view('admin/approved_assessment', $data);
		// }
	}
	// public function approved_assessment(){
	// 	// $data['self_assement'] = array();
	// 	// if(isset($_GET['start_date']) && $_GET['start_date'] !=""){ 
	// 		$data['self_assement'] = $this->Admin_model->get_approved_my_self_assesment();
	// 		$data['teacher_assement'] = $this->Admin_model->get_approved_my_teacher_assesment();
	// 		$data['assignment'] = $this->Admin_model->get_approved_assignment();
	// 		$data['industry_assesment'] = $this->Admin_model->get_approved_my_industry_assesment();
	// 		$data['guardian_assesment'] = $this->Admin_model->get_approved_my_guardian_assesment();
	// 		$this->load->view('admin/approved_assessment',$data);
	// 	// }
	// }
	public function get_course_stream()
	{
		$this->Admin_model->get_course_stream();
	}
	public function seperate_student_assessment()
	{
		$data['self_assement'] = $this->Admin_model->get_my_self_assesment_separate();
		$data['teacher_assement'] = $this->Admin_model->get_my_teacher_assesment_separate();
		$data['assignment'] = $this->Admin_model->get_assignment_separate();
		$this->load->view('admin/seperate_student_assessment', $data);
	}
	public function pr_list()
	{
		$this->load->view('admin/pr_list');
	}
	public function add_enquiry_lead()
	{
		$this->form_validation->set_rules('name', 'name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['single'] = $this->Admin_model->get_single_lead();
			$this->load->view('admin/add_enquiry_lead', $data);
		} else {
			$res = $this->Admin_model->insert_enquiry_lead();
			if ($res == 0) {
				$this->session->set_flashdata("success", "Lead added successfully!");
			} else {
				$this->session->set_flashdata('sucess', 'Lead updated successfully!!');
			}
			redirect('add_enquiry_lead');
		}
	}
	public function enquiry_lead_list()
	{
		$this->load->view('admin/enquiry_lead_list');
	}
	public function rti_grievance_list()
	{
		$this->load->view("admin/rti_grievance_list");
	}
	public function admin_self_Assessment_pending_list(){
		$this->load->view('admin/admin_self_Assessment_pending_list');
	}
	public function admin_self_Assessment_rejected_list(){
		$this->load->view('admin/admin_self_Assessment_rejected_list');
	}
	public function admin_self_Assessment_approved_list(){
		$this->load->view('admin/admin_self_Assessment_approved_list');
	}
	public function admin_teacher_Assessment_pending_list(){
		$this->load->view('admin/admin_teacher_Assessment_pending_list');
	}
	public function admin_teacher_Assessment_rejected_list(){
		$this->load->view('admin/admin_teacher_Assessment_rejected_list');
	}
	public function admin_teacher_Assessment_approved_list(){
		$this->load->view('admin/admin_teacher_Assessment_approved_list');
	}
	public function admin_industry_Assessment_pending_list(){
		$this->load->view('admin/admin_industry_Assessment_pending_list');
	}
	public function admin_industry_Assessment_rejected_list(){
		$this->load->view('admin/admin_industry_Assessment_rejected_list');
	}
	public function admin_industry_Assessment_approved_list(){
		$this->load->view('admin/admin_industry_Assessment_approved_list');
	}
	public function admin_parent_Assessment_pending_list(){
		$this->load->view('admin/admin_parent_Assessment_pending_list');
	}
	public function admin_parent_Assessment_rejected_list(){
		$this->load->view('admin/admin_parent_Assessment_rejected_list');
	}
	public function admin_parent_Assessment_approved_list(){
		$this->load->view('admin/admin_parent_Assessment_approved_list');
	}
	public function admin_center_approve_self_assessment()
	{
		$this->Admin_model->admin_approve_self_assessment();
		$this->session->set_flashdata("success", "Self assessment approve successfuly.");
		redirect('admin_self_Assessment_approved_list');
	}
	public function admin_center_self_reject_remark()
	{
		$this->Admin_model->admin_center_self_reject_remark();
		$this->session->set_flashdata('success', 'Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function admin_center_approve_teacher_assessment()
	{
		$this->Admin_model->admin_approve_teacher_assessment();
		$this->session->set_flashdata("success", "Teacher assessment approve successfuly.");
		redirect('admin_teacher_Assessment_approved_list');
	}
	public function admin_center_teacher_reject_remark()
	{
		$this->Admin_model->admin_center_teacher_reject_remark();
		$this->session->set_flashdata('success', 'Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function admin_center_approve_industry_assessment()
	{
		$this->Admin_model->admin_approve_industry_assessment();
		$this->session->set_flashdata("success", "Industry assessment approve successfuly.");
		redirect('admin_industry_Assessment_approved_list');
	}
	public function admin_center_industry_reject_remark()
	{
		$this->Admin_model->admin_center_industry_reject_remark();
		$this->session->set_flashdata('success', 'Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function admin_center_approve_parent_assessment()
	{
		$this->Admin_model->admin_approve_parent_assessment();
		$this->session->set_flashdata("success", "Parent assessment approve successfuly.");
		redirect('admin_parent_Assessment_approved_list');
	}
	public function admin_center_parent_reject_remark()
	{
		$this->Admin_model->admin_center_parent_reject_remark();
		$this->session->set_flashdata('success', 'Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function print_assessment_pdf(){
		$data['assessment'] = $this->Admin_model->get_print_assessment_pdf();
		$this->load->view('admin/print_assessment_pdf',$data);
	}
	public function pending_assignment_list(){ 
		$this->load->view('admin/pending_assignment_list');
	}
	public function rejected_assignment_list(){ 
		$this->load->view('admin/rejected_assignment_list');
	}
	public function approved_assignment_list(){ 
		$this->load->view('admin/approved_assignment_list');
	}
	public function admin_assignement_approval(){
		$this->Admin_model->admin_assignement_approval();		
		$this->session->set_flashdata('success','Assignment has been approved');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function admin_assignement_pending(){
		$this->Admin_model->admin_assignement_pending();		
		$this->session->set_flashdata('success','Assignment has been send to pending');
		redirect($_SERVER['HTTP_REFERER']);
	} 
	public function admin_assignement_reject_remrak(){
		$this->Admin_model->admin_assignement_reject_remrak();		
		$this->session->set_flashdata('success','Assignment has been rejected');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function send_custom_mail_via_erp(){
		$this->form_validation->set_rules('to','email','required'); 
		if($this->form_validation->run() === FALSE){ 
			$this->load->view('admin/send_custom_mail_via_erp');
		}else{ 
			$result = $this->Admin_model->send_custom_mail_via_erp(); 
			$this->session->set_flashdata('success','Mail has been sent'); 
			redirect('send_custom_mail_via_erp');  
		}  
	}
	public function student_appointments(){ 
		$this->load->view('admin/student_appointments'); 
	} 
	public function student_appointments_completed(){ 
		$this->load->view('admin/student_appointments_completed'); 
	} 
	public function complete_student_visit(){ 
		$this->Admin_model->set_complete_student_visit(); 
		$this->session->set_flashdata("success","Visit completed successfully!"); 
		redirect('student_appointments');  
	} 
	public function reschedule_student_appointments(){    
		$this->form_validation->set_rules('enrollment_number','enrollment number','required'); 
		if($this->form_validation->run() === FALSE){ 
			$data['single'] = $this->Admin_model->get_single_tudent_appointments(); 
			$this->load->view('admin/reschedule_student_appointments',$data); 
		}else{ 
			$result = $this->Admin_model->set_reschedule_student_appointments();  
			$this->session->set_flashdata('success','Appoinment has been changed Successfully'); 
			redirect('student_appointments');  
		}  
	} 
	public function visitor_list(){
		$this->load->view("admin/visitor_list");
	}
	
	public function edit_cash_receipt(){
		$this->form_validation->set_rules('name', 'name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['course'] = $this->Web_model->get_all_course_stream_relation();
			$data['single'] = $this->Admin_model->get_single_cash_receipt();
			$this->load->view('admin/edit_cash_receipt',$data);
		} else {
			$this->Admin_model->update_generate_cash_receipt();
			$this->session->set_flashdata('success','Cash Receipt Update Successfully'); 
			redirect('pr_list');  
		}
	}
	public function upload_answer_book_center()
	{
		$this->form_validation->set_rules('course', 'course', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['course'] = $this->Web_model->get_all_course_stream_relation();
			$data['single'] = $this->Center_details_model->get_single_answer_book();
		
			$this->load->view('admin/upload_answer_book_center', $data);
		} else {
			$this->Admin_model->set_answer_book_upload();
			$this->session->set_flashdata('success', 'Sheet uploaded successfull!');
			redirect('admin-upload-answer-book');
		}
	}
	public function center_document_status_list(){
		$this->load->view('admin/center_document_status_list');
    }
}