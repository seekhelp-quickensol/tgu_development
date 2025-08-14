<?php defined('BASEPATH') or exit('No direct script access allowed');
class Web_controller extends CI_Controller{
	public function get_course_stream_fees(){
		$this->Web_model->get_course_stream_fees();
	}
	public function cron_setup_payment(){
		$this->Account_model->cron_setup_payment();
	}
	public function get_head_payment(){
		$this->Web_model->get_head_payment();
	}
	public function get_course_stream_duration(){
		$this->Web_model->get_course_stream_duration();
	}
	public function get_course_stream_total_duration(){
		$this->Web_model->get_course_stream_total_duration();
	}
	public function pro_chancler_message(){
		$this->load->view('front/pro_chancellor_message');
	}
	public function registrar_message(){
		$this->load->view('front/registrar_message');
	}
	public function get_course_stream_duration_separate(){
		$this->Web_model->get_course_stream_duration_separate();
	}
	public function get_course_stream(){
		$this->Web_model->get_course_stream();
	}
	public function get_course_stream_by_name(){
		$this->Web_model->get_course_stream_by_name();
	}
	public function get_course_stream_subject(){
		$this->Web_model->get_course_stream_subject();
	}
	public function get_course_stream_course_mode(){
		$this->Web_model->get_course_stream_course_mode();
	}
	public function resend_otp(){
		$this->Web_model->resend_otp();
		$this->session->set_flashdata('success', 'Please check your inbox to verify your OTP');
		redirect('admission-form');
	} 
	public function resend_e_otp(){
		$this->Web_model->resend_e_otp();
		$this->session->set_flashdata('success', 'Please check your inbox to verify your OTP');
		redirect('e-libraries');
	}
	public function get_ajax_course_list(){
		$this->Web_model->get_ajax_course_list();
	}
	public function apply_now(){
		$this->load->view('front/apply_now');
	}
	// public function phd_exam_login(){
	// 	$this->load->view('front/phd_exam_login');
	// } 
	public function event_details($id){
		$data['news'] = $this->News_model->get_single_news();
// 		echo "<pre>";print_r($data['news']);exit;
		$this->load->view('front/event-details', $data);
	} 
	public function blog_details($id){
		$data['blogs'] = $this->News_model->get_single_blogs();
		$data['latest_blogs'] = $this->News_model->get_all_blogs();
		$this->load->view('front/blog_details', $data);
		// echo "<pre>";print_r($data['blogs']);exit;
	} 
	public function course_work_login(){
		$this->load->view("front/course_work_login");
	} 
	public function all_news(){
		$data['news'] = $this->News_model->get_all_news();
		// $data['news_count']= $this->News_model->get_all_news_count();
		$this->load->view("front/all_news", $data);
		// echo "<pre>";print_r($data['news']);exit;
	} 
	public function blog(){
		$data['blogs'] = $this->News_model->get_all_blogs();
		// $data['blogs_count']= $this->News_model->get_all_blogs_count();
		$this->load->view('front/blog', $data);
	} 
	public function exam_timetable(){
		if ($this->input->post('search') == "Search") {
			$data['timesheet'] = $this->Web_model->get_course_wise_timesheet();
			if (!$data['timesheet']) {
				$this->session->set_flashdata('message', 'Timetable is not Available');
			}
		}
		// $data['single'] = $this->Web_model->get_single_course_stream_relation();
		$data['course'] = $this->Web_model->get_all_course_stream_relation(); 
		$this->load->view('front/exam_timetable', $data);
	} 
	public function admission_form(){
		if ($this->input->post('generate') == "Generate") {
			$this->Web_model->generate_registration_otp();
			$this->session->set_flashdata('success', 'Please check your inbox to verify your OTP');
			redirect('admission-form');
		}
		if ($this->input->post('verify') == "verify") {
			$result = $this->Web_model->verify_otp();
			if ($result) {
				$this->session->set_flashdata('success', 'OTP verified successfully');
			} else {
				$this->session->set_flashdata('message', 'Please enter valid otp');
			}
			redirect('admission-form');
		}
		$this->form_validation->set_rules('student_name', 'student name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['id_name'] = $this->Web_model->get_active_id_name();
			$data['country'] = $this->Web_model->get_all_country();
			$data['course'] = $this->Web_model->get_all_course_stream_relation();
			$data['session'] = $this->Web_model->get_active_session();
			$data['bank'] = $this->Web_model->get_active_challan_bank();
			// $data['lateral_fees'] = $this->Web_model->get_lateral_entry_fees();
			$data['stream'] = $this->Web_model->get_course_wise_stream();
			$data['old_student_details'] = $this->Web_model->get_old_student_details();
			// $data['old_admission_check'] = $this->Web_model->old_admission_check();
			if ($this->input->get('old_enrollment')) {
				if (empty($data['old_student_details'])) {
					$this->session->set_flashdata('message', 'Please enter valid enrollment number');
					redirect('apply-now');
				}
			}
			$this->load->view('front/admission_form', $data);
		} else {
			$secret = GOOGLE_CAPTCHA_SECRETE;
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if ($responseData->success) {
				$photo = "";
				if ($_FILES['userfile']['name'] != "") {
					$photo = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "images/profile_pic/");
				}
				$noc = "";
				if ($_FILES['noc']['name'] != "") {
					$noc = $this->Digitalocean_model->upload_photo($filename = "noc", $path = "images/noc/");
				}
				$identity_file = "";
				if ($_FILES['identity_file']['name'] != "") {
					$identity_file = $this->Digitalocean_model->upload_photo($filename = "identity_file", $path = "images/student_identity_softcopy/");
				}
				$undertaking_file = "";
				if ($_FILES['undertaking_file']['name'] != "") {
					$undertaking_file = $this->Digitalocean_model->upload_photo($filename = "undertaking_file", $path = "images/permission_letter/");
				}
				$affidavit_file = "";
				if ($_FILES['affidavit_file']['name'] != "") {
					$affidavit_file = $this->Digitalocean_model->upload_photo($filename = "affidavit_file", $path = "images/affidavit/");
				}
				$old_migration = "";

				if ($_FILES['old_migration']['name'] != "") {

					$old_migration = $this->Digitalocean_model->upload_photo($filename = "old_migration", $path = "images/old_migration/");

				}
				$old_admission_check = $this->Web_model->old_admission_check();
				if ($old_admission_check == "") {
					$this->Web_model->set_registration($photo, $noc, $identity_file,$undertaking_file,$affidavit_file,$old_migration);
				} else {
					$this->session->set_flashdata('message', 'Already taken admission. Please contact university');
					redirect('already_enrolled_message');
				}
			} else {
				$this->session->set_flashdata('message', 'Please tell us that you are not a robot');
				redirect(base_url());
			}
		}
	}
	public function already_enrolled_message()
	{
		$this->load->view('front/already_enrolled_message');
	}
	public function thank_you()
	{
		$this->load->view('front/thank_you');
	}
	public function thank_you_for_re_registration()
	{
		$this->load->view('front/thank_you_for_re_registration');
	}
	public function re_registration_form(){ 
		$data['student'] = array();
		if ($this->input->post('next') == "next") {
			$data['student'] = $this->Web_model->get_re_registration_form();
			if (empty($data['student'])) {
				$this->session->set_flashdata('message', 'Please enter valid details');
				redirect('re-registration-form');
			} else {
				$duration = $this->Web_model->get_last_year_sem_of_student($data["student"]->course_id,$data["student"]->stream_id);
				$exam_check = $this->Web_model->check_exam_before_reregistration($data["student"]->id,$data["student"]->year_sem);
				$result_check = $this->Web_model->check_result_before_reregistration($data["student"]->id,$data["student"]->year_sem);
				if(empty($exam_check)){
					$this->session->set_flashdata('message','You can not apply for re registration due to current year/sem examination form not filled');
					redirect('re-registration-form');
				}
				if(empty($result_check)){
					$this->session->set_flashdata('message','You can not apply for re registration due to current year/sem result is not generated');
					redirect('re-registration-form');
				}

				// if($data["student"]->course_mode == "1"){
				// 	if($duration->year_duration <= $data["student"]->year_sem){
				// 		$this->session->set_flashdata('message','You can not apply for re registration due to course duration is completed');
				// 		redirect('re-registration-form');
				// 	}
				// }else if($data["student"]->course_mode == "2"){
				// 	if($duration->sem_duration <= $data["student"]->year_sem){
				// 		$this->session->set_flashdata('message','You can not apply for re registration due to course duration is completed');
				// 		redirect('re-registration-form');
				// 	}
				// }else{
				// 	if($duration->month_duration <= $data["student"]->year_sem){
				// 		$this->session->set_flashdata('message','You can not apply for re registration due to course duration is completed');
				// 		redirect('re-registration-form');
				// 	}
				// }

				// code to block the student to re register 2 time 
				if ($this->Web_model->check_stu_re_registration($data['student']->enrollment_number, $data['student']->course_mode)) {
					$this->session->set_flashdata('message', 'You have submited the form. If you are unable to submit the form again please visit campus');
					redirect(base_url());
				}
				$session = array(
					're_registration_id' => $data['student']->id
				);
				$this->session->set_userdata($session);
			}
		}
		$isNameAutofilled  = isset($_POST['student_name']) && $_POST['student_name'] == true;
		if (!empty($isNameAutofilled)) {
			$this->form_validation->set_rules('student_name', 'name', 'required');
		}
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('front/re_registration_form', $data);
		} else {
			// echo $this->session->userdata("re_registration_id");exit;
			$stu = $this->Web_model->get_single_student_details($this->session->userdata("re_registration_id"));
			// echo "<pre>";print_r($stu);exit;
			$fees = $this->Web_model->get_student_fees($stu->course_id, $stu->stream_id, $stu->session_id, $stu->country);
			if ($stu->course_mode == 2) {
				if ($this->input->post("year_sem") % 2 == 0) {
					$this->Web_model->set_re_registration();
					$this->session->set_flashdata('success', 'Re registration successfull!');
					redirect('thank-you-for-re-registration');
				}
			}
			// for payment related work 
			$student_re_registration_id = $this->Web_model->set_re_registered_student($stu->id, $fees);
			$payment_id = $this->Web_model->student_reregistration_payment_process($stu->id, $fees, $this->input->post("year_sem"));
			// echo "<pre>";print_r($payment_id);exit;
			redirect('student_reregistration_payment/' . base64_encode($stu->id) . "/" . base64_encode($payment_id) . "/" . base64_encode($student_re_registration_id));
			//echo "<pre>";
			//print_r($student_re_registration_id);exit;
			/*$data['payment_details'] = array(
			'payment_id' 	=>$payment_id,
			'student_id'    =>$stu->id,
			'email' 		=> $stu->email,
			'mobile' 		=> $stu->mobile,
			'student_name' 	=> $stu->student_name,
			"year_sem"      => $this->input->post("year_sem"),
			'total_fees' 	=> $stu->fees, 	
    		'student_re_registration_id' => $student_re_registration_id,
			);
			$freecharge_data = $this->payvia_freecharge_re_registration_payment($data['payment_details']);
			$data['req'] = $freecharge_data;
			$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );
			 
			$this->load->view('web/student_reregistration_payment',$data);*/
		}
	}
	public function student_reregistration_payment()
	{
		$data['student'] = $this->Web_model->get_admission_challan_student();
		// echo "<pre>";print_r($data['student']);exit;
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		$this->load->view('front/student_reregistration_payment', $data);
	}
	public function payvia_freecharge_re_registration_payment($data)
	{
		$req = new stdClass();
		$otp = rand(10000, 99999);
		$req->merchantTxnId = "BTU_FC_PYMT_" . $otp . $data['payment_id'];
		$req->amount = $data['total_fees'] . ".00";
		$req->currency = "INR";
		$req->furl = base_url() . 'student_re_registration_freecharge_process_done?payment_id=' . $data['payment_id'] . '&student_id=' . $data['student_id'] . '&year_sem=' . $data['year_sem'] . '&student_re_registration_id=' . $data['student_re_registration_id'];
		$req->surl = base_url() . 'student_re_registration_freecharge_process_done?payment_id=' . $data['payment_id'] . '&student_id=' . $data['student_id'] . '&year_sem=' . $data['year_sem'] . '&student_re_registration_id=' . $data['student_re_registration_id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}
	public function student_re_registration_freecharge_process_done()
	{
		// "Array ( [success_freecharge] => [id] => 1 [txnId] => YpvEjekeEmpXRq_iTEST1_***sdsds%1244_1 [merchantTxnId] => iTEST1_***sdsds%1244 [amount] => 1.00 [merchantName] => [merchantLogo] => [metadata] => [status] => COMPLETED [authCode] => [checksum] => 97516f64cbd2006283f7f762879e6db1eb8b96cecf764848efabbcb0b9f84a66 ) "
		$data['student_data'] = $this->Web_model->update_student_reregistration_payment();
		if (!empty($data['student_data'])) {
			$this->load->view('front/student_reregistration_receipt_freecharge', $data);
		} else {
			$this->session->set_flashdata('message', 'Re-registration failed');
			redirect(base_url());
		}
	}
	public function generateChecksumForJson($json_decode, $merchantKey)
	{
		$sanitizedInput = $this->sanitizeInput($json_decode, $merchantKey);
		$serializedObj = $sanitizedInput . $merchantKey;
		return $this->calculateChecksum($serializedObj);
	}
	public function calculateChecksum($serializedObj)
	{
		$checksum = hash('sha256', $serializedObj, false);
		return $checksum;
	}
	public function recur_ksort(&$array)
	{
		foreach ($array as &$value) {
			if (is_array($value)) $this->recur_ksort($value);
		}
		return ksort($array);
	}
	public function sanitizeInput(array $json_decode, $merchantKey)
	{
		$reqWithoutNull = array_filter($json_decode, function ($k) {
			if (is_null($k)) {
				return false;
			}
			if (is_array($k)) {
				return true;
			}
			return !(trim($k) == "");
		});
		$this->recur_ksort($reqWithoutNull);
		$flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
		return json_encode($reqWithoutNull, $flags);
	}
	public function guide_application_form()
	{
		ini_set('memory_limit', '-1');
		$this->form_validation->set_rules('full_name', 'full name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['country'] = $this->Web_model->get_all_country();
			$this->load->view('front/guide_application_form', $data);
			// echo "form-submit";exit;
		} else {
			// echo "form_submit";exit;
			$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			// echo "<pre>";print_r($responseData);exit;
			if ($responseData->success) {
				$photo = '';
				if ($_FILES['photo']['name'] != "") {
					$photo = $this->Digitalocean_model->upload_photo($filename = "photo", $path = "images/guide_pic/");
					/*
					$tmp = explode('.', $_FILES['userfile']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic",
						'allowed_types' => "jpg|jpeg|png",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('userfile')){
						$data = $this->upload->data();				
						$photo = $data['file_name'];	
					}else{ 
						$this->session->set_flashdata('message','Please upload valid photo');
						redirect($_SERVER['HTTP_REFERER']);
						//$error = array('error' => $this->upload->display_errors());	
						//$this->upload->display_errors();
					}*/
				}
				$signature = '';
				if ($_FILES['signature']['name'] != "") {
					$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/guide_pic/");
					/*$tmp = explode('.', $_FILES['signature']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic",
						'allowed_types' => "jpg|jpeg|png",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('signature')){
						$data = $this->upload->data();				
						$signature = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid signature');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$secondary_subject_marksheet = '';
				if ($_FILES['secondary_subject_marksheet']['name'] != "") {
					$secondary_subject_marksheet = $this->Digitalocean_model->upload_photo($filename = "secondary_subject_marksheet", $path = "images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['secondary_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('secondary_subject_marksheet')){
						$data = $this->upload->data();				
						$secondary_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid marksheet of secondary');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$sr_secondary_subject_marksheet = '';
				if ($_FILES['sr_secondary_subject_marksheet']['name'] != "") {
					$sr_secondary_subject_marksheet = $this->Digitalocean_model->upload_photo($filename = "sr_secondary_subject_marksheet", $path = "images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['sr_secondary_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('sr_secondary_subject_marksheet')){
						$data = $this->upload->data();				
						$sr_secondary_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid sr. ceconadary marksheet');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$graduation_subject_marksheet = '';
				if ($_FILES['graduation_subject_marksheet']['name'] != "") {
					$graduation_subject_marksheet = $this->Digitalocean_model->upload_photo($filename = "graduation_subject_marksheet", $path = "images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['graduation_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('graduation_subject_marksheet')){
						$data = $this->upload->data();				
						$graduation_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid graduation marksheet');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$post_graduation_subject_marksheet = '';
				if ($_FILES['post_graduation_subject_marksheet']['name'] != "") {
					$post_graduation_subject_marksheet = $this->Digitalocean_model->upload_photo($filename = "post_graduation_subject_marksheet", $path = "images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['post_graduation_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('post_graduation_subject_marksheet')){
						$data = $this->upload->data();				
						$post_graduation_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid post graduation marksheet');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$phd_subject_marksheet = '';
				if ($_FILES['phd_subject_marksheet']['name'] != "") {
					$phd_subject_marksheet = $this->Digitalocean_model->upload_photo($filename = "phd_subject_marksheet", $path = "images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['phd_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('phd_subject_marksheet')){
						$data = $this->upload->data();				
						$phd_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid phd document');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$other_qualification_subject_marksheet = '';
				if ($_FILES['other_qualification_subject_marksheet']['name'] != "") {
					$other_qualification_subject_marksheet = $this->Digitalocean_model->upload_photo($filename = "other_qualification_subject_marksheet", $path = "images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['other_qualification_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('other_qualification_subject_marksheet')){
						$data = $this->upload->data();				
						$other_qualification_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid other certificate');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$biodata = '';
				if ($_FILES['biodata']['name'] != "") {
					$biodata = $this->Digitalocean_model->upload_photo($filename = "biodata", $path = "images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['biodata']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf|doc|docs|docx",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('biodata')){
						$data = $this->upload->data();				
						$biodata = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid biodata');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$aadhar_card = '';
				if ($_FILES['aadhar_card']['name'] != "") {
					$aadhar_card = $this->Digitalocean_model->upload_photo($filename = "aadhar_card", $path = "images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['aadhar_card']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('aadhar_card')){
						$data = $this->upload->data();				
						$aadhar_card = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid addhar card');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				// print_r('dsfs');exit;
				$this->Web_model->set_guide_application($photo, $signature, $secondary_subject_marksheet, $sr_secondary_subject_marksheet, $graduation_subject_marksheet, $post_graduation_subject_marksheet, $phd_subject_marksheet, $other_qualification_subject_marksheet, $biodata, $aadhar_card);
				$this->session->set_flashdata('success', 'Thanks for submitting your application, We will contact you soon! ');
				redirect('thank_you');
			} else {
				$this->session->set_flashdata('message', 'Please accept captha');
				redirect($_SERVER['HTTP_REFERER']);
				// $this->Web_model->set_guide_application($photo, $signature,$secondary_subject_marksheet,$sr_secondary_subject_marksheet,$graduation_subject_marksheet,$post_graduation_subject_marksheet,$phd_subject_marksheet,$other_qualification_subject_marksheet,$biodata,$aadhar_card);
				// $this->session->set_flashdata('success','Thanks for submitting your application, We will contact you soon! ');
				// redirect('thank_you');
			}
			redirect('guide-application-form');
		}
	}
	public function print_challan()
	{
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('front/print_admission_challan', $data);
	}
	public function print_cash_boucher()
	{
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('front/print_admission_cach_boucher', $data);
	}
	// placement record form
	public function placement_record_form()
	{
		$this->form_validation->set_rules('student_name', 'Please enter full name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['country'] = $this->Web_model->get_all_country();
			$this->load->view('front/placement_record_form', $data);
		} else {
			$this->Web_model->set_placement_record_form();
			$this->session->set_flashdata('success', 'Placement Record Form Submitted Successfully!');
			redirect('placement_record_form');
		}
	}
	public function get_student_data_placement_record_form()
	{
		$this->Web_model->get_student_data_placement_record_form();
	}
	public function admission_procedure()
	{
		$this->load->view('front/admission_procedure');
	}
	public function university_accouts()
	{
		$this->load->view('front/university_accouts');
	}
	public function notice_board()
	{
		$this->load->view('front/notice_board');
	}
	public function press_release()
	{
		$this->load->view('front/press_release');
	}
	public function advertisement()
	{
		$this->load->view('front/advertisement');
	}
	public function vision_and_mission()
	{
		$this->load->view('front/vision_and_mission');
	}
	public function about_us()
	{
		$this->load->view('front/about_us');
	}
	public function university_activities()
	{
		$data['image'] = $this->Web_model->get_activities_image();
		$data['video'] = $this->Web_model->get_activities_videos();
		$this->load->view('front/university_activities', $data);
	}
	public function all_rti()
	{
		$this->load->view('front/all_rti');
	}
	public function approvals()
	{
		$this->load->view('front/university_approvals');
	}
	public function information_center()
	{
		$this->load->view('front/information_center');
	}
	public function gurgaon_office()
	{
		$this->load->view('front/gurgaon_office');
	}
	public function aicte()
	{
		$this->load->view('front/aicte');
	}
	public function bci()
	{
		$this->load->view('front/bci');
	}
	public function pci()
	{
		$this->load->view('front/pci');
	}
	public function bpedvi()
	{
		$this->load->view('front/bpedvi');
	}
	public function dedidd()
	{
		$this->load->view('front/dedidd');
	}
	public function bpedhi()
	{
		$this->load->view('front/bpedhi');
	}
	public function dedhi()
	{
		$this->load->view('front/dedhi');
	}
	public function dedvi()
	{
		$this->load->view('front/dedvi');
	}
	public function nipam()
	{
		$this->load->view('front/nipam');
	}
	public function btu_brouchure()
	{
		$this->load->view('front/btu_brouchure');
	}
	public function inner_line_permit_news()
	{
		$this->load->view('front/inner_line_permit_news');
	}
	public function holiday_list()
	{
		$this->load->view('front/holiday_list');
	}
	public function indian_council_of_agricultural_research()
	{
		$this->load->view('front/indian_council_of_agricultural_research');
	}
	public function aicte_link()
	{
		$this->load->view('front/aicte_link');
	}
	public function rti_rules()
	{
		$this->load->view('front/rti_rules');
	}
	public function aiu()
	{
		$this->load->view('front/aiu');
	}
	public function grants_commission()
	{
		$this->load->view('front/grants_commission');
	}
	public function prospectus()
	{
		$this->load->view('front/prospectus');
	}
	public function llp_prospectus()
	{
		$this->load->view('front/llp_prospectus');
	}
	public function d_pharma_Brochure()
	{
		$this->load->view('front/d_pharma_Brochure');
	}
	public function phd_programme()
	{
		$this->load->view('front/phd_programme');
	}
	public function university_ugc()
	{
		$this->load->view('front/ugc');
	}
	public function campus()
	{
		$this->load->view('front/campus');
	}
	public function chairman_desk()
	{
		$this->load->view('front/chairman_desk');
	}
	public function chancler_message()
	{
		$this->load->view('front/chancler');
	}
	public function vice_chancler_message()
	{
		$this->load->view('front/vice_chancellor_message');
	}
	public function awards()
	{
		$this->load->view('front/awards');
	}
	public function international_innovative_education_summit_dubai()
	{
		$this->load->view('front/international_innovative_education_summit_dubai');
	}
	public function campus_enquiry()
	{
		$this->form_validation->set_rules('name', 'name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['head'] = $this->Web_model->get_enquiry_head();
			$this->load->view('front/campus_enquiry', $data);
		} else {
			$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if ($responseData->success) {
				$this->Web_model->set_campus_enquiry_form();
				$this->session->set_flashdata('success', 'Thanks for submitting your query, We will contact you soon! ');
			}
			redirect(base_url());
		}
	}
	public function enquiry()
	{
		$this->form_validation->set_rules('name', 'name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['country_quick'] = $this->Web_model->get_all_country();
			$this->load->view('front/enquiry', $data);
		} else {
			$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if ($responseData->success) {
				$this->Web_model->set_enquiry_form();
				$this->session->set_flashdata('success', 'Thanks for submitting your query, We will contact you soon! ');
			}
			redirect(base_url());
		}
	}
	public function thanks_for_enquiry()
	{
		$this->load->view('front/thanks_for_enquiry');
	}
	public function career()
	{
		$this->form_validation->set_rules('name', 'name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['state'] = $this->Web_model->get_indian_state();
			$this->load->view('front/career', $data);
		} else {
			$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if ($responseData->success) {
				$file = "";
				if ($_FILES['userfile']['name'] != "") {
					$file = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "images/career/");
					// $config = array(
					// 	'upload_path' 	=> "images/career/",
					// 	'allowed_types' => "jpg|jpeg|png|pdf|doc",
					// 	'encrypt_name'	=> TRUE,
					// );			
					// $this->upload->initialize($config);
					// if($this->upload->do_upload('userfile')){
					// 	$data = $this->upload->data();				
					// 	$file = $data['file_name']; 
					// }else{ 
					// 	$error = array('error' => $this->upload->display_errors());	
					// 	$this->upload->display_errors();
					// 	$this->session->set_flashdata('message','Please upload pdf format only!');
					// 	redirect($_SERVER['HTTP_REFERER']);
					// }
				}
				$this->Web_model->set_career_form($file);
				$this->session->set_flashdata('success', 'Thanks for submitting your information, We will contact you soon! ');
			}
			redirect('career');
		}
	}
	public function contact_us()
	{
		if ($this->input->post('register') == "Register") {
			$this->Web_model->set_contact();
		}
		// $this->form_validation->set_rules('name','name','required');
		// if($this->form_validation->run() === FALSE){
		// 	$this->Web_model->set_contact();
		// }
		$this->load->view('front/contact_us');
		$this->session->set_flashdata('success', 'Thanks for submitting your message!');
	}
	public function upload_my_qualification()
	{
		$this->form_validation->set_rules('student_id', 'student_id', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['student'] = $this->Web_model->get_qualification_student();
			if (empty($data['student'])) {
				redirect(base_url());
			}
			$data['fees'] = $this->Web_model->get_qualification_fees();
			if (empty($data['fees'])) {
				redirect(base_url());
			}
			$this->load->view('front/upload_my_qualification', $data);
		} else {
			$secondary_marksheet = '';
			if ($_FILES['secondary_marksheet']['name'] != "") {
				$secondary_marksheet = $this->Digitalocean_model->upload_photo($filename = "secondary_marksheet", $path = "images/qualification/");
				// $tmp = explode('.', $_FILES['secondary_marksheet']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/qualification",
				// 	'allowed_types' => "jpg|jpeg|png|pdf",
				// 	'file_name'		=> $this->input->post('student_id')."-secondary".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('secondary_marksheet')){
				// 	$data = $this->upload->data();				
				// 	$secondary_marksheet = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$sr_secondary_marksheet = '';
			if ($_FILES['sr_secondary_marksheet']['name'] != "") {
				$sr_secondary_marksheet = $this->Digitalocean_model->upload_photo($filename = "sr_secondary_marksheet", $path = "images/qualification/");
				// $tmp = explode('.', $_FILES['sr_secondary_marksheet']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/qualification",
				// 	'allowed_types' => "jpg|jpeg|png|pdf",
				// 	'file_name'	=> $this->input->post('student_id')."-sr_secondary".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('sr_secondary_marksheet')){
				// 	$data = $this->upload->data();				
				// 	$sr_secondary_marksheet = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$graduation_marksheet = '';
			if ($_FILES['graduation_marksheet']['name'] != "") {
				$graduation_marksheet = $this->Digitalocean_model->upload_photo($filename = "graduation_marksheet", $path = "images/qualification/");
				// $tmp = explode('.', $_FILES['graduation_marksheet']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/qualification",
				// 	'allowed_types' => "jpg|jpeg|png|pdf",
				// 	'file_name'	=> $this->input->post('student_id')."-graduation".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('graduation_marksheet')){
				// 	$data = $this->upload->data();				
				// 	$graduation_marksheet = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$post_graduation_marksheet = '';
			if ($_FILES['post_graduation_marksheet']['name'] != "") {
				$post_graduation_marksheet = $this->Digitalocean_model->upload_photo($filename = "post_graduation_marksheet", $path = "images/qualification/");
				// $tmp = explode('.', $_FILES['post_graduation_marksheet']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/qualification",
				// 	'allowed_types' => "jpg|jpeg|png|pdf",
				// 	'file_name'	=> $this->input->post('student_id')."-pg".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('post_graduation_marksheet')){
				// 	$data = $this->upload->data();				
				// 	$post_graduation_marksheet = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$other_qualification_marksheet = '';
			if ($_FILES['other_qualification_marksheet']['name'] != "") {
				$other_qualification_marksheet = $this->Digitalocean_model->upload_photo($filename = "other_qualification_marksheet", $path = "images/qualification/");
				// $tmp = explode('.', $_FILES['other_qualification_marksheet']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/qualification",
				// 	'allowed_types' => "jpg|jpeg|png|pdf",
				// 	'file_name'	=> $this->input->post('student_id')."-oth".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('other_qualification_marksheet')){
				// 	$data = $this->upload->data();				
				// 	$other_qualification_marksheet = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$signature = '';
			if ($_FILES['signature']['name'] != "") {
				$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/signature/");
				// $tmp = explode('.', $_FILES['signature']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/signature",
				// 	'allowed_types' => "jpg|jpeg|png",
				// 	'file_name'	=> $this->input->post('student_id')."-sin".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('signature')){
				// 	$data = $this->upload->data();				
				// 	$signature = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$result = $this->Web_model->update_qualification($secondary_marksheet, $sr_secondary_marksheet, $graduation_marksheet, $post_graduation_marksheet, $other_qualification_marksheet, $signature);
		}
	}
	public function get_unique_admission_contact()
	{
		$this->Web_model->get_unique_admission_contact();
	}
	public function get_unique_admission_email()
	{
		$this->Web_model->get_unique_admission_email();
	}
	public function all_courses()
	{
		$data['course'] = $this->Web_model->get_facilty_course_list();
		//$data['home_course'] = $this->Web_model->get_course_home_page();
		$this->load->view('front/all_courses', $data);
	}
	public function course_details()
	{
		$data['course'] = $this->Web_model->get_single_course_details();
		$this->load->view('front/course_details', $data);
	}
	public function e_libraries()
	{
		if ($this->input->post('generate') == "Generate") {
			$result = $this->Web_model->generate_enrollment_otp();
			if ($result) {
				$this->session->set_flashdata('success', 'Please check your inbox to verify your OTP');
			} else {
				$this->session->set_flashdata('message', 'Please enter valid enrollment number');
			}
			redirect('e-libraries');
		}
		if ($this->input->post('verify') == "verify") {
			$result = $this->Web_model->verify_e_library_otp();
			if ($result) {
				$this->session->set_flashdata('success', 'OTP verified successfully');
			} else {
				$this->session->set_flashdata('message', 'Please enter valid otp');
			}
			redirect('e-libraries');
		}
		$this->load->view('front/e_libraries');
	}
	public function collaboration_enquiry()
	{
		$this->form_validation->set_rules('center_name', 'center name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['country'] = $this->Web_model->get_all_country();
			$this->load->view('front/collaboration_enquiry', $data);
		} else {
		   
			$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			
			if ($responseData->success) {
			     //echo "<pre>";print_r($responseData);exit;
				$photo = '';
				if ($_FILES['photo']['name'] != "") {
					$photo = $this->Digitalocean_model->upload_photo($filename = "photo", $path = "images/center/photo/");
					// $tmp = explode('.', $_FILES['photo']['name']);
					// $ext = end($tmp);
					// $config = array(
					// 	'upload_path' 	=> "images/center/photo",
					// 	'allowed_types' => "jpg|jpeg|png",
					// 	'encrypt_name'	=> TRUE,
					// );
					// $this->upload->initialize($config);
					// if ($this->upload->do_upload('photo')) {
					// 	$data = $this->upload->data();
					// 	$photo = $data['file_name'];
					// } else {
					// 	$error = array('error' => $this->upload->display_errors());
					// 	$this->upload->display_errors();
					// }
				}
				$adharcard = '';
				if ($_FILES['adhar_card']['name'] != "") {
					$adharcard = $this->Digitalocean_model->upload_photo($filename = "adhar_card", $path = "images/center/adharcard/");
					// $tmp = explode('.', $_FILES['adhar_card']['name']);
					// $ext = end($tmp);
					// $config = array(
					// 	'upload_path' 	=> "images/center/adharcard",
					// 	'allowed_types' => "pdf|jpg|jpeg|png",
					// 	'encrypt_name'	=> TRUE,
					// );
					// $this->upload->initialize($config);
					// if ($this->upload->do_upload('adhar_card')) {
					// 	$data = $this->upload->data();
					// 	$adharcard = $data['file_name'];
					// } else {
					// 	$error = array('error' => $this->upload->display_errors());
					// 	$this->upload->display_errors();
					// }
				}
				$pan_card = '';
				if ($_FILES['pan_card']['name'] != "") {
					$pan_card = $this->Digitalocean_model->upload_photo($filename = "pan_card", $path = "images/center/pan_card/");
					// $tmp = explode('.', $_FILES['pan_card']['name']);
					// $ext = end($tmp);
					// $config = array(
					// 	'upload_path' 	=> "images/center/pan_card",
					// 	'allowed_types' => "pdf|jpg|jpeg|png",
					// 	'encrypt_name'	=> TRUE,
					// );
					// $this->upload->initialize($config);
					// if ($this->upload->do_upload('pan_card')) {
					// 	$data = $this->upload->data();
					// 	$pan_card = $data['file_name'];
					// } else {
					// 	$error = array('error' => $this->upload->display_errors());
					// 	$this->upload->display_errors();
					// }
				}
				$doc_data = "";
				if ($_FILES['other_document']['name'] != "") {
					$doc_data = $this->Digitalocean_model->upload_photo_multiple($filename = "other_document", $path = "images/center/other_document/");
					// $count = count($_FILES['other_document']['name']);
					// for ($i = 0; $i < $count; $i++) {
					// 	$_FILES['file']['name'] = $_FILES['other_document']['name'][$i];
					// 	$_FILES['file']['type'] = $_FILES['other_document']['type'][$i];
					// 	$_FILES['file']['tmp_name'] = $_FILES['other_document']['tmp_name'][$i];
					// 	$_FILES['file']['error'] = $_FILES['other_document']['error'][$i];
					// 	$_FILES['file']['size'] = $_FILES['other_document']['size'][$i];
					// 	$config['upload_path'] = 'images/center/other_document';
					// 	$config['allowed_types'] = 'pdf|jpg|jpeg|png';
					// 	$config['encrypt_name'] = true;
					// 	$this->upload->initialize($config);
					// 	if ($this->upload->do_upload('file')) {
					// 		$uploadData = $this->upload->data();
					// 		$filename = $uploadData['file_name'];
					// 		$doc_data[] = $filename;
					// 	} else {
					// 		$doc_data[] = "";
					// 	}
					// }
				}
				$result = $this->Web_model->set_center_enquiry($photo, $adharcard, $pan_card, $doc_data);
			}
			$this->session->set_flashdata('success', 'Thanks, we will contact to you soon!');
			redirect('thank_you');
		}
	}
	public function admission_enquiry()
	{
		$this->form_validation->set_rules('full_name', 'name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('front/admission_enquiry');
		} else {
			$secret = GOOGLE_CAPTCHA_SECRETE;
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if ($responseData->success) {
				$result = $this->Web_model->set_enquiry();
			}
			$this->session->set_flashdata('success', 'Thanks, we will contact to you soon!');
			redirect(base_url());
		}
	}
	public function phd_registration_form()
	{
		$this->form_validation->set_rules('student_name', 'name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['course'] = $this->Web_model->get_phd_course();
			$data['country'] = $this->Web_model->get_all_country();
			$data['session'] = $this->Web_model->get_active_session();
			$data['id_name'] = $this->Web_model->get_active_id_name();
			// $data['student_info'] = $this->Web_model->get_student_info();
			$this->load->view('front/phd_registration_form', $data);
		} else {
			$image_array = array(
				"secondary_marksheet",
				"sr_secondary_marksheet",
				"graduation_marksheet",
				"post_graduation_marksheet",
				"mphil_marksheet",
				"other_marksheet"
			);
			$image = array();
			foreach ($image_array as $img) {
				$image_upload_name = $this->phd_registration_images($img);
				$image[$img] = $image_upload_name;
			}
			$this->Web_model->save_phd_registration($image);
		}
	}
	public function phd_registration_cash()
	{
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_phd_registration_cash();
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('front/phd_registration_cash', $data);
	}
	public function phd_registration_images($image_name)
	{
		$photo = '';
		if ($_FILES[$image_name]['name'] != "") {
			$photo = $this->Digitalocean_model->upload_photo($filename = $image_name, $path = "images/phd_registration/");
			/*
				$tmp = explode('.', $_FILES[$image_name]['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/phd_registration/",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'encrypt_name'	=> TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload($image_name)){
					$data = $this->upload->data();				
					$photo = $data['file_name'];
					return $photo;	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
		}
		return $photo;
	}
	public function collaborations_with_apll()
	{
		$this->load->view('front/collaborations_with_apll');
	}
	public function former_president_letter()
	{
		$this->load->view('front/former_president_letter');
	}
	public function disaster_management()
	{
		$this->load->view('front/nukul_profile');
	}
	public function exam_time_table()
	{
		if ($this->input->post('search') == "Search") {
			$data['timesheet'] = $this->Web_model->get_course_wise_timesheet();
		}
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$this->load->view('front/exam_time_table', $data);
	}
	// public function examination_form(){
	// 	$data['student'] = $this->Web_model->get_examination_student(); 
	// 	$data['exam'] = $this->Web_model->get_examintion();  
	// 	if($this->input->post('register') == 'register'){
	// 		$result = $this->Web_model->set_examination_form();
	// 		redirect('make_exam_payment/'.$result);
	// 	}	
	// 	if(empty($data['student'])){
	// 		$this->load->view('front/examination_entry');
	// 	}else{
	// 		$data['subject'] = $this->Web_model->get_examination_subjct($data['student']->id,$data['student']->course_id,$data['student']->stream_id,$data['student']->year_sem,$data['student']->center_id);
	// 		$this->load->view('front/examination_form',$data); 
	// 	}
	// }
	public function examination_form()
	{
		$data['student'] = array();
		if ($this->input->post('generate') == "generate") {
			$data['student'] = $this->Web_model->get_examination_student();
			$exam_form_check = $this->Web_model->get_exam_form_check_new($data['student']->id, $data['student']->year_sem);
			if (!empty($exam_form_check)) {
				$this->session->set_flashdata('message', 'You have already filled exam form');
				redirect('examination-form');
			}
		}
		$data['exam'] = $this->Web_model->get_examintion();
		if ($this->input->post('register') == 'register') {
			$result = $this->Web_model->set_examination_form();
			redirect('make_exam_payment/' . $result);
		}
		if (empty($data['student'])) {
			$this->load->view('front/examination_entry');
		} else {
			$data['subject'] = $this->Web_model->get_examination_subjct($data['student']->id, $data['student']->course_id, $data['student']->stream_id, $data['student']->year_sem, $data['student']->center_id);
			$this->load->view('front/examination_form', $data);
		}
	}
	public function re_appear_form(){
		$data['student'] = array();
		if($this->input->post('generate') == "Generate"){
			$data['student'] = $this->Web_model->get_student_re_appear_exam(); 
			if(!empty($data['student'])){
				$data['subjects'] = $this->Web_model->get_student_re_appear_subject($data['student']->id,$this->input->post('year_sem')); 
			}else{
				$this->session->set_flashdata('message','You are not eligible to fill re appear form');
				redirect('re-appear-form');
			}
		}
		if($this->input->post('register') == "register"){
			$this->Web_model->set_re_appear();
		}
		$this->load->view('front/re_appear_form', $data);
	}
	public function re_appear_form_second(){
		$data['student'] = array();
		if($this->input->post('generate') == "Generate"){
			$data['student'] = $this->Web_model->get_student_re_appear_exam_second(); 
			if(empty($data['student'])){ 
				$this->session->set_flashdata('message','You are not eligible to fill re appear form');
				redirect('re-appear-form-second');
			}
		}
		if($this->input->post('register') == "register"){
			$this->Web_model->set_re_appear_second();
		}
		$this->load->view('front/re_appear_form_second', $data);
	}
	public function print_exam_cash_boucher()
	{
		$data['student'] = $this->Web_model->get_examination_cash_boucher_student();
		$this->load->view('admin/SimpleFunctions');
		$data['university_details'] = $this->Setting_model->get_university_details();
		$this->load->view('front/print_exam_cash_boucher', $data);
	}
	public function resend_exam_otp()
	{
		$result = $this->Web_model->re_generate_examination_otp();
		$this->session->set_flashdata('success', 'Please check your inbox to validate otp');
		redirect('examination-form');
	}
	public function reset_exam_form()
	{
		$session = array(
			'exam_session_id'	=> '',
			'exam_mobile' 		=> '',
			'exam_email' 		=> '',
			'exam_otp' 			=> '',
			'is_validated' 		=> '',
		);
		$this->session->set_userdata($session);
		redirect('examination-form');
	}
	public function extension_activities()
	{
		$this->load->view('front/extension_activities');
	}
	public function jivan_hospital()
	{
		$this->load->view('front/jivan_hospital');
	}
	public function get_hallticket_setup($exam_month, $exam_year)
	{
		$this->db->select('tbl_exam_setup.*,tbl_signature.name as signature_name,tbl_signature.signature,tbl_signature.dispalay_signature');
		$this->db->where('tbl_exam_setup.status', '1');
		$this->db->where('tbl_exam_setup.is_deleted', '0');
		$this->db->where('tbl_exam_setup.month', $exam_month);
		$this->db->where('tbl_exam_setup.year', $exam_year);
		$this->db->join("tbl_signature", "tbl_signature.id = tbl_exam_setup.signature", 'left');
		$result = $this->db->get('tbl_exam_setup');
		return  $result->row();
		// echo "<pre>";print_r($data['exam_setup']);exit;
	}
	public function hallticket()
	{
		// $data['students'] = $this->Web_model->get_hall_ticket();
		// if(empty($data['students'])){
		// 	$this->load->view('web/download_hallticket');
		// }else{
		// 	$data['subject'] = $this->Web_model->get_hall_ticket_subject($data['students']->id,$data['students']->student_id);
		// 	$this->load->view('web/hallticket',$data);
		// }
		// print_r($this->uri->segment(2));exit;
		if ($this->uri->segment(2) != "") {
			$data['student'] = $this->Web_model->get_center_student_hall_ticket();
			if (empty($data['student'])) {
				redirect('center_active_hall_ticket_list');
			} else {
				$data['subject'] = $this->Web_model->get_hall_ticket_subject($data['student']->id, $data['student']->student_id);
				$this->load->view('front/hallticket', $data);
			}
		} else {
			//code 
			$data['students'] = $this->Web_model->get_hall_ticket();
// 			echo "<pre>";print_r($data['students']);exit;
			if (!empty($data['students'])) {
				$data['exam_setup'] = $this->get_hallticket_setup($data['students']->exam_month, $data['students']->exam_year);
				// echo "<pre>";print_r($data['exam_setup']);exit;
			}
			if (empty($data['students'])) {
				$this->load->view('front/download_hallticket');
			} else {
				$data['subject'] = $this->Web_model->get_hall_ticket_subject($data['students']->id, $data['students']->student_id);
				$this->load->view('front/hallticket', $data);
			}
			//$this->load->view('web/download_hallticket');
		}
	}
	public function get_re_appear_sign()
	{
		$this->db->select('tbl_exam_setup.*,tbl_signature.name as signature_name,tbl_signature.signature,tbl_signature.dispalay_signature');
		$this->db->where('tbl_exam_setup.status', "1");
		$this->db->where('tbl_exam_setup.is_deleted', "0");
		$this->db->join("tbl_signature", "tbl_signature.id = tbl_exam_setup.signature", 'left');
		$result = $this->db->get('tbl_exam_setup');
		return  $result->row();
	}
	public function hallticket_re_appear()
	{
		$data['students'] = array();
		$data['exam_sign'] = $this->get_re_appear_sign();
		if (isset($_GET['enrollment_number']) && $_GET['enrollment_number'] != "") {
			$data['students'] = $this->Web_model->get_re_appear_hall_ticket();
			// echo "<pre>";print_r($data['students']);exit;
		}
		if (empty($data['students'])) {
			$this->load->view('front/re_appear_download_hallticket');
		} else {
			$this->load->view('front/re_appear_hallticket', $data);
			// $this->load->view('front/hallticket_re_appear',$data);
		}
	}
	public function syllabus_list()
	{
		$this->load->view('front/syllabus_list');
	}
	public function result_view()
	{
		$data['student'] = array();
		// echo "<pre>";print_r($data['student']);exit;
		if ($this->input->post('search')) {
			$data['student'] = $this->Web_model->get_my_result();
			// echo "<pre>";print_r($data['student']);exit;
			if (empty($data['student'])) {
				$this->session->set_flashdata('message', 'Your result is not generated. Please contact the admin.');
			}
		}
		$this->load->view('front/result_view', $data);
	}
	public function demo_form()
	{
		$this->form_validation->set_rules('enrollment_number', 'Enrollment number', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('front/demo_form');
		} else {
			$result = $this->Web_model->set_demo_payment();
		}
	}
	public function get_student_data_ajax()
	{
		$this->Web_model->get_student_data_ajax();
	}
	public function phd_course_work()
	{
		if ($this->input->post()) {
			if (!empty($this->input->post("generate"))) {
				$data['course_work_data'] = $this->Web_model->get_course_work_data();  //
				$data["stu_data"] = $this->Web_model->get_student_data_by_enrollment_no();
				$data["schedule_dates"] = $this->Web_model->get_phd_course_work_schedule_dates();
				if (!empty($data["stu_data"]) && !empty($data['course_work_data'])) {
					if ($data["stu_data"]->enrollment_number == $data['course_work_data']->enrollment_number) {
						$this->session->set_flashdata('message', 'Your form is already submitted');
						$this->load->view("front/phd_course_work_enrollment");
					}
				} else {
					$this->load->view("front/phd_course_work_form", $data);
				} 
			}
			if (!empty($this->input->post("payment_ammount"))) {
				$this->Web_model->set_phd_course_work_form_data();
			}
		} else {
			if (!empty($this->uri->segment(2))) {
				$this->load->view("front/phd_course_work_enrollment");
			} else {
				$this->load->view("front/phd_course_work");
			}
		}
	}
	// public function phd_course_work(){
	// 	if($this->input->post()){
	// 		if(!empty($this->input->post("generate"))){
	// 			$data["stu_data"] = $this->Web_model->get_student_data_by_enrollment_no();
	// 			$data["schedule_dates"] = $this->Web_model->get_phd_course_work_schedule_dates();
	// 			$this->load->view("front/phd_course_work_form",$data);
	// 		}
	// 		if(!empty($this->input->post("payment_ammount"))){
	// 			$this->Web_model->set_phd_course_work_form_data();
	// 		}
	// 	}else{
	// 		if(!empty($this->uri->segment(2))){
	// 			$this->load->view("front/phd_course_work_enrollment");
	// 		}
	// 		else{
	// 			$this->load->view("front/phd_course_work");
	// 		}
	// 	}
	// }
	public function enrollment_verification()
	{
		$data["data"] = array();
		if ($this->input->post()) {
			$data["data"] = $this->Web_model->enrollment_verification();
		}
		$this->load->view("front/enrollment_verification", $data);
	}
	public function document_verification()
	{
		$this->form_validation->set_rules("name", "name", "required");
		if ($this->form_validation->run() === FALSE) {
			// $data['city'] = $this->Web_model->get_all_city();
			// echo "<pre>";print_r($data['city']);exit;
			$this->load->view("front/document_verification");
		} else {
			$fileName = "";
			$fileName = $this->Digitalocean_model->upload_photo_multiple($filename = "files", $path = "uploads/document_verification/");
			/*
			$count = count($_FILES['files']['name']);
			// echo $count;exit;
			for($i=0; $i<$count; $i++){
		          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
		          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
		          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
		          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
 
		          $config['upload_path'] = 'uploads/document_verification/'; 
		          $config['allowed_types'] = '*';
		          $config['encrypt_name'] = true;
					
				  $this->upload->initialize($config); 
   				  if($this->upload->do_upload('file')){
                   		$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$doc_data[] = $filename;
          			}else{
						$doc_data[] = "";
          			}
			}*/
			$this->Web_model->document_verification($fileName);
			redirect("document-verification");
		}
	}
	public function caste_based_discrimination()
	{
		$this->form_validation->set_rules("student_teacher", "Select Student Teacher", "required");
		if ($this->form_validation->run() === FALSE) {
			$this->load->view("front/caste_based_discrimination");
		} else {
			$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			//  echo"<pre>";print_r($responseData);exit;
			//  if($responseData->success){
			$this->Web_model->set_caste_based_discrimination();
			$this->session->set_flashdata('success', 'Complaint successfully registered.');
			redirect("caste-based-discrimination");
			//  }else{
			//  	redirect("caste-based-discrimination");
			//  }
		}
	}
	public function appointment_letter_for_supervisors()
	{
		// echo"<pre>";print_r($_POST);exit;
		if ($this->input->post('generate') == "Generate") {
			$result = $this->Web_model->verify_supervisor();
			if ($result == 0) {
				$this->session->set_flashdata('message', 'Please enter vaild password.');
				redirect('appointment-letter-for-supervisors');
			}
		} else {
			$data['guide'] = $this->Web_model->get_single_guide_data();
			$this->load->view("front/appointment_letter_for_supervisors", $data);
		}
	}
	public function online_classes()
	{
		$data['classes'] = array();
		if ($this->input->get('enrollment')) {
			$data['classes'] = $this->Web_model->get_online_classes();
		}
		$this->load->view("front/online_classes_list", $data);
	}
	public function accreditation()
	{
		$this->load->view("front/accreditation");
	}
	public function terms()
	{
		$this->load->view('front/terms');
	}
	public function privacy_policy()
	{
		$data['policy'] = $this->Web_model->get_privacy_policy();
		$this->load->view('front/privacy_policy', $data);
	}
	public function phd_rules_and_regulations()
	{
		$this->load->view('front/phd_rules_and_regulations');
	}
	public function terms_conditions()
	{
		$data['terms_and_condition'] = $this->Web_model->get_terms_and_condition();
		$this->load->view('front/terms_conditions', $data);
	}
	public function members_and_certification()
	{
		$this->load->view('front/members_and_certification');
	}
	public function rehabilitation_council_of_india()
	{
		$this->load->view('front/rehabilitation_council_of_india');
	}
	public function membership_accreditation()
	{
		$this->load->view('front/membership_accreditation');
	}
	public function collaboration_form()
	{
		$this->form_validation->set_rules('center_name', 'Center name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['country'] = $this->Web_model->get_all_country();
			$data['information_center'] = $this->Web_model->get_auth_letter_information_center();
			$this->load->view('front/collaboration_form', $data);
		} else {
			$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if ($responseData->success) {
				$photo = '';
				if ($_FILES['photo']['name'] != "") {
					$photo = $this->Digitalocean_model->upload_photo($filename = "photo", $path = "images/center/photo/");
					/*
					$tmp = explode('.', $_FILES['photo']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/center/photo",
						'allowed_types' => "jpg|jpeg|png",
						'encrypt_name'	=> TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('photo')){
						$data = $this->upload->data();				
						$photo = $data['file_name'];	
					}else{ 
						$error = array('error' => $this->upload->display_errors());	
						$this->upload->display_errors();
					}*/
				}
				$adharcard = '';
				if ($_FILES['adhar_card']['name'] != "") {
					$adharcard = $this->Digitalocean_model->upload_photo($filename = "adhar_card", $path = "images/center/adharcard/");
					/*
					$tmp = explode('.', $_FILES['adhar_card']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/center/adharcard",
						'allowed_types' => "pdf|jpg|jpeg|png",
						'encrypt_name'	=> TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('adhar_card')){
						$data = $this->upload->data();				
						$adharcard = $data['file_name'];	
					}else{ 
						$error = array('error' => $this->upload->display_errors());	
						$this->upload->display_errors();
					}*/
				}
				$pan_card = '';
				if ($_FILES['pan_card']['name'] != "") {
					$pan_card = $this->Digitalocean_model->upload_photo($filename = "pan_card", $path = "images/center/pan_card/");
					/*
					$tmp = explode('.', $_FILES['pan_card']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/center/pan_card",
						'allowed_types' => "pdf|jpg|jpeg|png",
						'encrypt_name'	=> TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('pan_card')){
						$data = $this->upload->data();				
						$pan_card = $data['file_name'];	
					}else{ 
						$error = array('error' => $this->upload->display_errors());	
						$this->upload->display_errors();
					}*/
				}
				$fileName = "";
				if ($_FILES['other_document']['name'] != "") {
					$fileName = $this->Digitalocean_model->upload_photo_multiple($filename = "other_document", $path = "images/center/other_document/");
					/*$count = count($_FILES['other_document']['name']);
					for($i=0; $i<$count; $i++){
						$_FILES['file']['name'] = $_FILES['other_document']['name'][$i];
						$_FILES['file']['type'] = $_FILES['other_document']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['other_document']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['other_document']['error'][$i];
						$_FILES['file']['size'] = $_FILES['other_document']['size'][$i];
		 
						$config['upload_path'] = 'images/center/other_document'; 
						$config['allowed_types'] = 'pdf|jpg|jpeg|png';
						$config['encrypt_name'] = true;
							
						$this->upload->initialize($config); 
						if($this->upload->do_upload('file')){
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$doc_data[] = $filename;
						}else{
							$doc_data[] = "";
						}
					}*/
				}
				$this->Web_model->set_collaboration_form($photo, $adharcard, $pan_card, $fileName);
				$this->session->set_flashdata('success', 'Form submited successfully.');
				redirect("thank_you");
			} else {
				// redirect(base_url());
				$this->session->set_flashdata('success', 'Form submited successfully.');
				redirect("thank_you");
			}
		}
	}
	public function get_center_unique_email()
	{
		$this->Web_model->get_center_unique_email();
	}
	public function get_center_unique_contact_number()
	{
		$this->Web_model->get_center_unique_contact_number();
	}
	public function generate_cash_receipt()
	{
		if ($this->input->post('verify_btuutn') == "Verify Now") {
			if ($this->input->post('password') == "ABZB") {
				$session = array(
					'receipt_password' => $this->input->post('password')
				);
				$this->session->set_userdata($session);
				$this->session->set_flashdata('success', 'Password verified successfully');
				redirect('generate_cash_receipt');
			} else {
				$this->session->set_flashdata('message', 'Please enter valid password');
				redirect('generate_cash_receipt');
			}
		}
		$this->form_validation->set_rules('name', 'name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['course'] = $this->Web_model->get_all_course_stream_relation();
			$this->load->view('front/generate_cash_receipt', $data);
		} else {
			$this->Web_model->set_generate_cash_receipt();
		}
	}
	public function print_cash_receipt()
	{
		$data['payment']  = $this->Web_model->get_print_receipt();
		$data['university_details'] = $this->Setting_model->get_university_details();
		$this->load->view('front/print_cash_receipt', $data);
	}
	public function print_center_receipt()
	{
		$data['payment']  = $this->Web_model->get_center_print_receipt();
		// echo "<pre>";print_r($data['payment']);exit;
		$data['university_details'] = $this->Setting_model->get_university_details();
		$this->load->view('front/print_center_receipt', $data);
	}
	public function print_admission_receipt()
	{
		$data['payment']  = $this->Web_model->get_admission_print_receipt();
		// echo "<pre>";print_r($data['payment']);exit;
		$data['university_details'] = $this->Setting_model->get_university_details();
		$this->load->view('front/print_admission_receipt', $data);
	}
	public function get_student_data()
	{
		$this->Web_model->get_student_data();
	}
	public function course_detail_page()
	{
		$data['course']  = $this->Web_model->get_course_details();
		$this->load->view('front/course_detail_page', $data);
	}
	public function submit_enquiry()
	{
		$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		if ($responseData->success) {
			$this->Web_model->submit_enquiry();
		} else {
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function direct_submit_enquiry()
	{
		$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		if ($responseData->success) {
			$this->Web_model->direct_submit_enquiry();
		} else {
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function thank_you_for_enquiry()
	{
		$this->load->view('front/thank_you_for_enquiry');
	}
	public function education_minister_manipur()
	{
		$this->load->view('front/education_minister_manipur');
	}
	public function governor_massage()
	{
		$this->load->view('front/governor_massage');
	}
	public function collaboration_enquiry_foreign()
	{
		$this->form_validation->set_rules('center_name', 'center name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['country'] = $this->Web_model->get_all_country();
			$this->load->view('front/collaboration_enquiry_foreign', $data);
		} else {
			$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if ($responseData->success) {
				$photo = '';
				if ($_FILES['photo']['name'] != "") {
					$photo = $this->Digitalocean_model->upload_photo($filename = "photo", $path = "images/center/photo/");
					/*
					$tmp = explode('.', $_FILES['photo']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/center/photo",
						'allowed_types' => "jpg|jpeg|png",
						'encrypt_name'	=> TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('photo')){
						$data = $this->upload->data();				
						$photo = $data['file_name'];	
					}else{ 
						$error = array('error' => $this->upload->display_errors());	
						$this->upload->display_errors();
					}*/
				}
				$passport = '';
				if ($_FILES['passport']['name'] != "") {
					$passport = $this->Digitalocean_model->upload_photo($filename = "passport", $path = "images/center/passport/");
					/*
					$tmp = explode('.', $_FILES['passport']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/center/passport",
						'allowed_types' => "pdf|jpg|jpeg|png",
						'encrypt_name'	=> TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('passport')){
						$data = $this->upload->data();				
						$passport = $data['file_name'];	
					}else{ 
						$error = array('error' => $this->upload->display_errors());	
						$this->upload->display_errors();
					}*/
				}
				$doc_data = array();
				$fileName = "";
				if ($_FILES['other_document']['name'] != "") {
					$fileName = $this->Digitalocean_model->upload_photo_multiple($filename = "userfile", $path = "uploads/syllabus/");
					/*$count = count($_FILES['other_document']['name']);
					for($i=0; $i<$count; $i++){
						$_FILES['file']['name'] = $_FILES['other_document']['name'][$i];
						$_FILES['file']['type'] = $_FILES['other_document']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['other_document']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['other_document']['error'][$i];
						$_FILES['file']['size'] = $_FILES['other_document']['size'][$i];
		 
						$config['upload_path'] = 'images/center/other_document'; 
						$config['allowed_types'] = 'pdf|jpg|jpeg|png';
						$config['encrypt_name'] = true;
							
						$this->upload->initialize($config); 
						if($this->upload->do_upload('file')){
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$doc_data[] = $filename;
						}else{
							$doc_data[] = "";
						}
					}*/
				}
				$result = $this->Web_model->set_center_enquiry_foreign($photo, $passport, $fileName);
			}
			$this->session->set_flashdata('success', 'Thanks, we will contact to you soon!');
			redirect('thank_you');
		}
	}
	public function collaboration_form_foreign()
	{
		$this->form_validation->set_rules('center_name', 'Center name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['country'] = $this->Web_model->get_all_country();
			$this->load->view('front/collaboration_form_foreign', $data);
		} else {
			$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if ($responseData->success) {
				$photo = '';
				if ($_FILES['photo']['name'] != "") {
					$photo = $this->Digitalocean_model->upload_photo($filename = "photo", $path = "images/center/photo/");
					/*
					$tmp = explode('.', $_FILES['photo']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/center/photo",
						'allowed_types' => "jpg|jpeg|png",
						'encrypt_name'	=> TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('photo')){
						$data = $this->upload->data();				
						$photo = $data['file_name'];	
					}else{ 
						$error = array('error' => $this->upload->display_errors());	
						$this->upload->display_errors();
					}*/
				}
				$passport = '';
				if ($_FILES['passport']['name'] != "") {
					$passport = $this->Digitalocean_model->upload_photo($filename = "passport", $path = "images/center/passport/");
					/*
					$tmp = explode('.', $_FILES['passport']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/center/passport",
						'allowed_types' => "pdf|jpg|jpeg|png",
						'encrypt_name'	=> TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('passport')){
						$data = $this->upload->data();				
						$passport = $data['file_name'];	
					}else{ 
						$error = array('error' => $this->upload->display_errors());	
						$this->upload->display_errors();
					}*/
				}
				$doc_data = array();
				$fileName = "";
				if ($_FILES['other_document']['name'] != "") {
					$fileName = $this->Digitalocean_model->upload_photo_multiple($filename = "other_document", $path = "images/center/other_document/");
					/*
					$count = count($_FILES['other_document']['name']);
					for($i=0; $i<$count; $i++){
						$_FILES['file']['name'] = $_FILES['other_document']['name'][$i];
						$_FILES['file']['type'] = $_FILES['other_document']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['other_document']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['other_document']['error'][$i];
						$_FILES['file']['size'] = $_FILES['other_document']['size'][$i];
		 
						$config['upload_path'] = 'images/center/other_document'; 
						$config['allowed_types'] = 'pdf|jpg|jpeg|png';
						$config['encrypt_name'] = true;
							
						$this->upload->initialize($config); 
						if($this->upload->do_upload('file')){
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$doc_data[] = $filename;
						}else{
							$doc_data[] = "";
						}
					}*/
				}
				$this->Web_model->set_collaboration_form_foreign($photo, $passport, $doc_data);
				$this->session->set_flashdata('success', 'Form submited successfully.');
				redirect("thank_you");
			} else {
				redirect(base_url());
			}
		}
	}
	public function membership()
	{
		$this->load->view('front/membership');
	}
	public function appreciation_list()
	{
		$this->load->view('front/appreciation_list');
	}
	public function addesment_form_sample()
	{
		$this->load->view('front/addesment_form_sample');
	}
	public function teacher_assessment_form()
	{
		$this->load->view('front/teacher_assessment_form');
	}
	public function industry_assessment_form()
	{
		$this->load->view('front/industry_assessment_form');
	}
	public function indian_council_of_agricultural_research_approval()
	{
		$this->load->view('front/indian_council_of_agricultural_research_approval');
	}
	public function bar_council_of_india()
	{
		$this->load->view('front/bar_council_of_india');
	}
    
	// public function index() {
	//     $this->load->model('Blog_model');
	//     $data['blog_posts'] = $this->Blog_model->get_blog_posts();
	//     $this->load->view('blog/index', $data);
	// }
	public function get_unique_email()
	{
		$this->Web_model->get_unique_email();
	}
	public function print_inner_receipt()
	{
		$data = $this->Web_model->get_inner_receipt();
		$data['university_details'] = $this->Setting_model->get_university_details();
		$this->load->view('payment/final_receipt', $data);
	}
	public function phd_entrance_details()
	{
		$data['details'] = $this->Web_model->get_phd_entrance_details(base64_decode($this->uri->segment(2)));
		$this->load->view('front/phd_entrance_details', $data);
	}
	public function get_coupon_validator()
	{
		$this->Web_model->get_coupon_validator();
	}
	public function get_phd_student_data_ajax()
	{
		$this->Web_model->get_phd_student_data_ajax();
	}
	public function pharmacy_council_of_india_approval()
	{
		$this->load->view('front/pharmacy_council_of_india_approval');
	} 
	public function directorate_of_health_services_ap_notification(){
		$this->load->view('front/directorate_of_health_services_ap_notification');
	}
	public function directorate_of_medical_education_training_and_research_ap_notification(){
		$this->load->view('front/directorate_of_medical_education_training_and_research_ap_notification');
	}
	public function rti_grievance()
	{
		$this->form_validation->set_rules("city", "City", "required");
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('front/rti_grievance');
		} else {
			$secret = GOOGLE_CAPTCHA_SECRETE;
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			$this->Web_model->set_rti_grievance();
			$this->session->set_flashdata('success', 'RTI grievance successfully registered.');
			redirect("rti-grievance");
		}
	}
	public function re_evaluation(){ 
		$this->form_validation->set_rules('enrollment_number','enrollment number','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('front/re_evaluation');
		}else{
			$this->Web_model->set_re_evaluation_student(); 
			$this->session->set_flashdata('message','Sorry student is not eligible for this year/sem!');   
			redirect('re_evaluation');
		} 
	} 
	public function student_re_evaluation_payment(){
		$data['student_data'] = $this->Web_model->get_re_evaluation_payment_student();  
		$this->load->view('front/student_re_evaluation_payment',$data);
	}
	public function print_payment_receipt(){
		$this->load->view('payment/print_payment_receipt');
	}
	public function visitor_form(){
		if ($this->input->post('verify_button') == "Verify Now") {
			if ($this->input->post('password') == "ABVB") {
				$session = array(
					'receipt_password' => $this->input->post('password')
				);
				$this->session->set_userdata($session);
				$this->session->set_flashdata('success', 'Password verified successfully');
				redirect('visitor_form');
			} else {
				$this->session->set_flashdata('message', 'Please enter valid password');
				redirect('visitor_form');
			}
		}
		$this->form_validation->set_rules('name', 'name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('front/visitor_form');
		} else {
		
			$visitor_file = "";
			if ($_FILES['visitorfile']['name'] != "") {
				$visitor_file = $this->Digitalocean_model->upload_photo($filename = "visitorfile", $path = "images/visitor/");
			}
			$this->Web_model->set_visitor_form($visitor_file);
			redirect('visitor_form');
		}
	}
	
	public function direct_examination_form(){ 

		$this->form_validation->set_rules('year_sem','year/sem','required');

		if($this->form_validation->run() === FALSE){

			$data['student'] = $this->Web_model->get_direct_examination_student(); 

			$data['subject'] = $this->Web_model->get_examination_subjct($data['student']->id,$data['student']->course_id,$data['student']->stream_id,$data['student']->year_sem,$data['student']->center_id);

			$this->load->view('front/examination_form_direct',$data);

		}else{

			$result = $this->Web_model->set_direct_examination_form();
            redirect('make_exam_payment/' . $result);

		}  
	}

    
    public function direct_cc_login(){
		$this->db->where('email',$this->input->get('email'));
		$this->db->where('password',md5($this->input->get('password')));
		$this->db->where('is_deleted','0');
		$this->db->where('is_left','0');
		$this->db->where('status','1');
		$result = $this->db->get('tbl_employees');
		$access = $result->row();
		if(!empty($access)){
    		$this->db->where('is_deleted', '0');
    		$this->db->where('status', '1');
    		$this->db->where('operation', '1');
    		$this->db->where('start_date <=', date("Y-m-d"));
    		$this->db->where('end_date >=', date("Y-m-d"));
    		$this->db->where('id', $this->input->get('uid'));
    		$result = $this->db->get('tbl_center');
    		$result = $result->row();
    		if (!empty($result)) {
    			$data = array(
    				'center_id' => $result->id
    			);
    			$this->session->set_userdata($data);
    			$this->session->set_flashdata('success','Login successfully!');
    			redirect('center-dashboard');
    		} else {
    			$this->session->set_flashdata('message','Access denied!');
    			redirect('center-access');
    		}
		} else {
			$this->session->set_flashdata('message','Login failed!');
			redirect('center-access');
		}
    }
    public function update_examination_form_fees(){
        $this->db->select('tbl_examination_form.*,tbl_student_fees.examination_id,tbl_student_fees.transaction_id,tbl_student_fees.payment_status as fees_payment_status');
		$this->db->where('tbl_examination_form.is_deleted','0');
		$this->db->where('tbl_examination_form.payment_status','0');
		$this->db->where('tbl_student_fees.payment_status','1');
		$this->db->where('tbl_student_fees.is_deleted','0');
		$this->db->join('tbl_student_fees','tbl_student_fees.examination_id = tbl_examination_form.id');
		$exam_form = $this->db->get('tbl_examination_form');
		$exam_form = $exam_form->result();
	    if(!empty($exam_form)){
	        foreach($exam_form as $exam_form_result){
	           $data = array(
	                "payment_status"    =>    "1",
	                "payment_id"        =>    $exam_form_result->transaction_id,
	           );
	           $this->db->where('id',$exam_form_result->id);
	           $this->db->update('tbl_examination_form',$data);
	        }
	    }
		
	}
	public function public_self_disclosure(){
	    $data['university_details'] = $this->Setting_model->get_university_details();
	   
	    if(!empty($data['university_details']) && $data['university_details']->public_self_disclosure_status == '1'){
		    $this->load->view('front/public_self_disclosure');
	    }else{
	        $this->load->view('front/page_not_found');
	    }
	}
}