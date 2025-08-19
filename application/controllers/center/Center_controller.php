<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Center_controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->is_logged();
		$this->check_examination_form();
	}
	public function is_logged(){
		if ($this->session->userdata('center_id') == "") {
			if ($this->uri->segment(1) != "center_exam_ccavResponseHandler") {
				redirect('center-access');
			}
		}
	}
	public function check_examination_form(){
		if ($this->uri->segment(1) != "center_examination_form") {
			$this->Center_details_model->cancel_examination_form();
		}
	}
	public function center_dashboard(){ 
		$data['syllabus'] = $this->Center_details_model->get_syllabus_list();
		$data['faculty_count'] = $this->Admin_model->get_faculty_count();
		$data['course_count'] = $this->Admin_model->get_course_count();
		$data['stream_count'] = $this->Admin_model->get_stream_count();
		$data['subject_count'] = $this->Admin_model->get_subject_count();
		$data['course_stream_relation_count'] = $this->Admin_model->get_course_stream_relation_count();
		$data['allAdmissionCount'] = $this->Center_details_model->get_total_active_admission();
		$data['allPendingVerification'] = $this->Center_details_model->get_pending_verification_admission();
		$data['failedPaymentCount'] = $this->Center_details_model->get_total_failed_payment_admission();
		$data['passoutStudents'] = $this->Center_details_model->get_total_passout_students();
		$this->load->view('center/index', $data);
	}
	public function center_logout(){
		$this->session->sess_destroy();
		redirect('center-access');
	}
	public function center_profile(){
	    if($this->input->post('submit_documents') != ""){
			$this->Common_model->upload_center_document($this->session->userdata('center_id'));
			$this->session->set_flashdata('success', 'Document uploaded successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
    		$this->form_validation->set_rules('center_name', 'center name', 'required');
    		if ($this->form_validation->run() === FALSE) {
    			$data['country'] = $this->Admin_model->get_all_country();
    			$this->load->view('center/profile', $data);
    		} else {
    			$photo = '';
    			if ($_FILES['photo']['name'] != "") {
    				$photo = $this->Digitalocean_model->upload_photo($filename = "photo", $path = "images/center/photo/");
    				/*$tmp = explode('.', $_FILES['photo']['name']);
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
    			$mou = '';
    			if ($_FILES['mou']['name'] != "") {
    				$mou = $this->Digitalocean_model->upload_photo($filename = "mou", $path = "images/center/mou/");
    				/*
    				$tmp = explode('.', $_FILES['mou']['name']);
    				$ext = end($tmp);
    				$config = array(
    					'upload_path' 	=> "images/center/mou",
    					'allowed_types' => "pdf|jpg|jpeg|png",
    					'encrypt_name'	=> TRUE,
    				);			
    				$this->upload->initialize($config);
    				if($this->upload->do_upload('mou')){
    					$data = $this->upload->data();				
    					$mou = $data['file_name'];	
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
    			$undertaking ='';
    			if($_FILES['undertaking']['name'] !=""){
    				$undertaking = $this->Digitalocean_model->upload_photo($filename="undertaking",$path="images/center/undertaking/");
    				if($undertaking == ""){
    					$this->session->set_flashdata('message','Undertaking is not uploaded please upload it again with correct extension.');
    					redirect($_SERVER['HTTP_REFERER']);
    				}
    			}
    			$result = $this->Center_details_model->set_center($photo, $adharcard, $mou, $undertaking);
    			if ($result == "0") {
    				$this->session->set_flashdata('success', 'Center added successfully');
    			} else {
    				$this->session->set_flashdata('success', 'Center updated successfully');
    			}
    			redirect('center-profile');
    		}
		}
	}
	public function center_password()
	{
		$this->form_validation->set_rules('old_password', 'old password', 'required');
		$this->form_validation->set_rules('new_password', 'New password', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('center/password');
		} else {
			$result = $this->Center_details_model->set_center_password();
			$this->session->set_flashdata('success', 'Password updated successfully');
			redirect('center-password');
		}
	}
	public function get_course_stream_course_mode(){
		$this->Center_details_model->get_course_stream_course_mode();
	}
	public function center_new_admisison(){
		if($this->session->userdata('center_id') == 154){
			$this->session->set_flashdata('message', 'Admission form is closed now');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
    		$this->form_validation->set_rules('student_name', 'student name', 'required');
    		if ($this->form_validation->run() === FALSE) {
    			$data['id_name'] = $this->Web_model->get_active_id_name();
    			$data['country'] = $this->Web_model->get_all_country();
    			$data['course'] = $this->Center_details_model->get_all_course_stream_relation();
    			$data['session'] = $this->Center_details_model->get_center_active_session();
    			$data['bank'] = $this->Web_model->get_active_challan_bank();
    			// $data['lateral_fees'] = $this->Web_model->get_lateral_entry_fees();
    			$data['wallet'] = $this->Center_details_model->get_my_wallet_balance();
    			$data['center_info'] =  $this->Center_details_model->get_center_info();
    			// echo "<pre>";print_r($data['center_info']);exit;
    			$this->load->view('center/center_new_admisison', $data);
    		} else {
    			/*$secret = '6LfinagZAAAAAIHQBJ71QUzeozbrTEjDeGl2E0E3';
    			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    			$responseData = json_decode($verifyResponse);
    			if($responseData->success){
    			}*/
    			$photo = "";
    			if ($_FILES['userfile']['name'] != "") {
    				$photo = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "images/profile_pic/");
    				if ($photo == "") {
    					$this->session->set_flashdata('message', 'Photo is not uploaded please upload it again with correct extension.');
    					redirect($_SERVER['HTTP_REFERER']);
    				}
    				/*$config = array(
    					'upload_path' 	=> "images/noc/",
    					'allowed_types' => "*",
    					'encrypt_name' => TRUE,
    				);			
    				$this->upload->initialize($config);
    				if($this->upload->do_upload('noc')){
    					$data = $this->upload->data();				
    					$noc = $data['file_name'];	
    				}else{ 
    					$noc = "";
    				}*/
    			}
    			$noc = "";
    			if ($_FILES['noc']['name'] != "") {
    				$noc = $this->Digitalocean_model->upload_photo($filename = "noc", $path = "images/noc/");
    				if ($noc == "") {
    					$this->session->set_flashdata('message', 'NOC is not uploaded please upload it again with correct extension.');
    					redirect($_SERVER['HTTP_REFERER']);
    				}
    				/*$config = array(
    					'upload_path' 	=> "images/noc/",
    					'allowed_types' => "*",
    					'encrypt_name' => TRUE,
    				);			
    				$this->upload->initialize($config);
    				if($this->upload->do_upload('noc')){
    					$data = $this->upload->data();				
    					$noc = $data['file_name'];	
    				}else{ 
    					$noc = "";
    				}*/
    			}
    			$permission_letter = "";
    			if ($_FILES['permission_letter']['name'] != "") {
    				$permission_letter = $this->Digitalocean_model->upload_photo($filename = "permission_letter", $path = "images/permission_letter/");
    				if ($permission_letter == "") {
    					$this->session->set_flashdata('message', 'Permission letter is not uploaded please upload it again with correct extension.');
    					redirect($_SERVER['HTTP_REFERER']);
    				}
    				/*$config = array(
    					'upload_path' 	=> "images/noc/",
    					'allowed_types' => "*",
    					'encrypt_name' => TRUE,
    				);			
    				$this->upload->initialize($config);
    				if($this->upload->do_upload('noc')){
    					$data = $this->upload->data();				
    					$noc = $data['file_name'];	
    				}else{ 
    					$noc = "";
    				}*/
    			}
    			$undertaking = "";
    			if ($_FILES['undertaking']['name'] != "") {
    				$undertaking = $this->Digitalocean_model->upload_photo($filename = "undertaking", $path = "images/permission_letter/");
    				if ($undertaking == "") {
    					$this->session->set_flashdata('message', 'Undertaking is not uploaded please upload it again with correct extension.');
    					redirect($_SERVER['HTTP_REFERER']);
    				}
    				/*$config = array(
    					'upload_path' 	=> "images/noc/",
    					'allowed_types' => "*",
    					'encrypt_name' => TRUE,
    				);			
    				$this->upload->initialize($config);
    				if($this->upload->do_upload('noc')){
    					$data = $this->upload->data();				
    					$noc = $data['file_name'];	
    				}else{ 
    					$noc = "";
    				}*/
    			}
    			$identity_file = "";
    			if ($_FILES['identity_file']['name'] != "") {
    				$identity_file = $this->Digitalocean_model->upload_photo($filename = "identity_file", $path = "images/student_identity_softcopy/");
    				if ($identity_file == "") {
    					$this->session->set_flashdata('message', 'Identity file is not uploaded please upload it again with correct extension.');
    					redirect($_SERVER['HTTP_REFERER']);
    				}
    				/*$config = array(
    					'upload_path' 	=> "images/student_identity_softcopy/",
    					'allowed_types' => "*",
    					'encrypt_name' => TRUE,
    				);			
    				$this->upload->initialize($config);
    				if($this->upload->do_upload('identity_file')){
    					$data = $this->upload->data();				
    					$identity_file = $data['file_name'];	
    				}else{ 
    					$identity_file = "";
    				}*/
    			}
    			
    			$affidavit_file = "";
    			if ($_FILES['affidavit_file']['name'] != "") {
    				$affidavit_file = $this->Digitalocean_model->upload_photo($filename = "affidavit_file", $path = "images/affidavit/");
    				if ($affidavit_file == "") {
    					$this->session->set_flashdata('message', 'Affidavit is not uploaded please upload it again with correct extension.');
    					redirect($_SERVER['HTTP_REFERER']);
    				}
    			}
    			
    			$old_migration = "";
    
    			if ($_FILES['old_migration']['name'] != "") {
    
    				$old_migration = $this->Digitalocean_model->upload_photo($filename = "old_migration", $path = "images/old_migration/");
    				
    				if ($old_migration == "") {
    
    					$this->session->set_flashdata('message', 'Old migration is not uploaded please upload it again with correct extension.');
    
    					redirect($_SERVER['HTTP_REFERER']);
    
    				}
    			}
    			$this->Center_details_model->set_registration($photo, $noc, $identity_file, $permission_letter, $undertaking,$affidavit_file, $old_migration);
    		}
		}
	}
	public function add_credit_student_subject(){
		$this->form_validation->set_rules('student_id', 'student_id', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('center/add_credit_student_subject');
		} else {
			$userfile = '';
			if ($_FILES['userfile']['name'] != "") {
				$userfile = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "images/consolidate_extra_result/");
			}
			$result = $this->Center_details_model->set_credit_student_subject($userfile);
		}
	}
	public function upload_student_qualification(){
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
			$this->load->view('center/upload_qualification', $data);
		} else {
			$secondary_marksheet = '';
			if ($_FILES['secondary_marksheet']['name'] != "") {
				$secondary_marksheet = $this->Digitalocean_model->upload_photo($filename = "secondary_marksheet", $path = "images/qualification/");
				/*$tmp = explode('.', $_FILES['secondary_marksheet']['name']);
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
			$sr_secondary_marksheet = '';
			if ($_FILES['sr_secondary_marksheet']['name'] != "") {
				$sr_secondary_marksheet = $this->Digitalocean_model->upload_photo($filename = "sr_secondary_marksheet", $path = "images/qualification/");
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
			$graduation_marksheet = '';
			if ($_FILES['graduation_marksheet']['name'] != "") {
				$graduation_marksheet = $this->Digitalocean_model->upload_photo($filename = "graduation_marksheet", $path = "images/qualification/");
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
			$post_graduation_marksheet = '';
			if ($_FILES['post_graduation_marksheet']['name'] != "") {
				$post_graduation_marksheet = $this->Digitalocean_model->upload_photo($filename = "post_graduation_marksheet", $path = "images/qualification/");
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
			$other_qualification_marksheet = '';
			if ($_FILES['other_qualification_marksheet']['name'] != "") {
				$other_qualification_marksheet = $this->Digitalocean_model->upload_photo($filename = "other_qualification_marksheet", $path = "images/qualification/");
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
			$signature = '';
			if ($_FILES['signature']['name'] != "") {
				$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/signature/");
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
			$result = $this->Center_details_model->update_qualification($secondary_marksheet, $sr_secondary_marksheet, $graduation_marksheet, $post_graduation_marksheet, $other_qualification_marksheet, $signature);
		}
	}
	public function print_student_challan(){
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('web/print_admission_challan', $data);
	}
	public function print_student_cash_boucher()
	{
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('web/print_admission_cach_boucher', $data);
	}
	public function center_admission_payment(){
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		$freecharge_data = $this->payvia_freecharge_admission($data['student'], $data['fees']);
		$data['req'] = $freecharge_data;
		$data['checksum'] = $this->generateChecksumForJson(json_decode(json_encode($data['req']), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), "67726486-8226-41d2-a062-93702cc630ba");
		$this->load->view('center/center_admission_payment', $data);
	}
	public function pay_admission_via_wallet()
	{
		$this->Center_details_model->pay_admission_via_wallet();
	}
	public function payvia_freecharge_admission($data, $fees)
	{
		$req = new stdClass();
		$req->merchantTxnId = "TGU_FC_PYMT_" . $fees->id;
		$req->amount = $fees->total_fees . ".00";
		$req->currency = "INR";
		$req->furl = base_url() . 'admission_freecharge?id=' . $data->id;
		$req->surl = base_url() . 'admission_freecharge?id=' . $data->id;
		$req->email = $data->email;
		$req->mobile = $data->mobile;
		$req->customerName = $data->student_name;
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
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
	public function center_admission_freecharge()
	{
		$data['student_data'] = $this->Center_details_model->update_admission_payment();
		$this->load->view('center/center_admission_freecharge');
	}
	public function center_admission_ccavRequestHandler()
	{
		$this->load->view('center/center_admission_ccavRequestHandler');
	}
	public function center_pending_admission_list()
	{
		$this->load->view('center/center_pending_admission_list');
	}
	public function center_active_admisison()
	{
		$this->load->view('center/center_active_admisison');
	}
	public function pending_center_student_verification_remark()
	{
		$this->Center_details_model->pending_center_student_verification_remark();
		$this->session->set_flashdata('success', 'Record update successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function center_pending_re_registration()
	{
		$this->load->view('center/center_pending_re_registration');
	}
	public function center_payment_failed_admisison()
	{
		$this->load->view('center/center_payment_failed_admisison');
	}
	public function center_examination_form_list()
	{
		$this->load->view('center/center_examination_form_list');
	}
	public function center_student_reregistration_form_list()
	{
		$this->load->view('center/center_student_reregistration_form_list');
	}
	public function center_passout_admisison()
	{
		$this->load->view('center/center_passout_admisison');
	}
	public function center_print_admission_form()
	{
		$data['admission'] = $this->Center_details_model->get_center_admission_form();
		// print_r($data['admission']);exit;
		$data['qualification'] = $this->Center_details_model->get_center_admission_qualification_admission();
		// print_r($data['qualification']);exit;
		$this->load->view('center/print_admission_form', $data);
	}
	public function center__print_id()
	{
		$data['student_profile'] = $this->Center_details_model->get_admission_form();
		$this->load->view('center/id_card', $data);
	}
	public function center_student_qualification()
	{
		if ($this->input->post('upload_photo') == "Upload") {
			$this->db->where('id',$this->input->post('student_id'));
			$student = $this->db->get('tbl_student')->row();

			$photo = $this->input->post('old_photo');
			if ($_FILES['userfile']['name'] != "") {
				$storedName = !empty($student) ? "student_photo_". $student->enrollment_number."_".round(microtime(true)) : '';
				$photo = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "images/profile_pic/", $storedName);
			}
			$identity_file = $this->input->post('old_id_proof');
			if ($_FILES['identity_file']['name'] != "") {
				$storedName = !empty($student) ? "student_id_proof_". $student->enrollment_number."_".round(microtime(true)) : '';
				$identity_file = $this->Digitalocean_model->upload_photo($filename = "identity_file", $path = "images/student_identity_softcopy/", $storedName);
			}
			$signature = $this->input->post('old_signature');
			if ($_FILES['signature']['name'] != "") {
				$storedName = !empty($student) ? "student_signature_". $student->enrollment_number."_".round(microtime(true)) : '';
				$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/signature/", $storedName);
			}
			$undertaking = $this->input->post('old_undertaking');
			if ($_FILES['undertaking']['name'] != "") {
				$storedName = !empty($student) ? "student_undertaking_". $student->enrollment_number."_".round(microtime(true)) : '';
				$undertaking = $this->Digitalocean_model->upload_photo($filename = "undertaking", $path = "images/permission_letter/", $storedName);
			}
			$this->Center_details_model->update_student_identity_soft($photo, $identity_file, $signature,$undertaking);
			$this->session->set_flashdata('success', 'Document has been uploaded successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if ($this->input->post('verify') == "Verify") {
			$this->Center_details_model->update_document_status();
			$this->session->set_flashdata('success', 'Status updated successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$this->form_validation->set_rules('secondary_year', 'Secondary year', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['student'] = $this->Center_details_model->get_admission_form();
			$data['qualification'] = $this->Center_details_model->get_admission_qualification();
			$this->load->view('center/student_qualification', $data);
		} else {
			$secondary_marksheet = '';
			if (isset($_FILES['secondary_marksheet']) && $_FILES['secondary_marksheet']['name'] != "") {
				$secondary_marksheet = $this->Digitalocean_model->upload_photo($filename = "secondary_marksheet", $path = "images/qualification/");
				/*$tmp = explode('.', $_FILES['secondary_marksheet']['name']);
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
			$sr_secondary_marksheet = '';
			if (isset($_FILES['sr_secondary_marksheet']) && $_FILES['sr_secondary_marksheet']['name'] != "") {
				$sr_secondary_marksheet = $this->Digitalocean_model->upload_photo($filename = "sr_secondary_marksheet", $path = "images/qualification/");
				/*$tmp = explode('.', $_FILES['sr_secondary_marksheet']['name']);
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
			$graduation_marksheet = '';
			if (isset($_FILES['graduation_marksheet']) && $_FILES['graduation_marksheet']['name'] != "") {
				$graduation_marksheet = $this->Digitalocean_model->upload_photo($filename = "graduation_marksheet", $path = "images/qualification/");
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
			$post_graduation_marksheet = '';
			if (isset($_FILES['post_graduation_marksheet']) && $_FILES['post_graduation_marksheet']['name'] != "") {
				$post_graduation_marksheet = $this->Digitalocean_model->upload_photo($filename = "post_graduation_marksheet", $path = "images/qualification/");
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
			$other_qualification_marksheet = '';
			if (isset($_FILES['other_qualification_marksheet']) && $_FILES['other_qualification_marksheet']['name'] != "") {
				$other_qualification_marksheet = $this->Digitalocean_model->upload_photo($filename = "other_qualification_marksheet", $path = "images/qualification/");
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
			$result = $this->Center_details_model->update_qualification_data($secondary_marksheet, $sr_secondary_marksheet, $graduation_marksheet, $post_graduation_marksheet, $other_qualification_marksheet);
			if ($result == "0") {
				$this->session->set_flashdata('success', 'Details added successfully');
			} else {
				$this->session->set_flashdata('success', 'Details updated successfully');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function center_subject_list()
	{
		$this->form_validation->set_rules('course', 'course', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['single'] = $this->Course_model->get_single_course_stream_relation();
			$data['session'] = $this->Course_model->get_all_session();
			$data['course'] = $this->Course_model->get_all_course_stream_relation();
			$this->load->view('center/manage_subject', $data);
		} else {
			$result = $this->Center_details_model->set_subject();
			if ($result == "0") {
				$this->session->set_flashdata('success', 'Subject added successfully');
			} else {
				$this->session->set_flashdata('success', 'Subject updated successfully');
			}
			redirect('center-subject-list');
		}
	}
	public function my_list_subject()
	{
		$this->load->view('center/list_subject');
	}
	public function center_search_result()
	{
		$data['result'] = array();
		if ($this->input->post('search') == "Search") {
			$data['result'] = $this->Center_details_model->get_search_result();
			// echo "<pre>";print_r($data['result']);exit;	
		}
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$this->load->view('center/search_result', $data);
	}
	public function center_manage_result()
	{
		$data['subject'] = array();
		if ($this->input->post('show_subject') == "Show Subject") {
			$data['subject'] = $this->Center_details_model->get_result_subject();
			$data['student'] = $this->Center_details_model->get_result_student();
			$data['course_stream'] = $this->Center_details_model->get_result_student();
		
			//$data['student_exam_status'] = $this->Center_details_model->get_exam_status();
			$data['student_exam_status'] = $this->Center_details_model->get_exam_status($this->input->post('year_sem'));
			if(empty($data['student_exam_status'])){
			    $this->session->set_flashdata('message', 'Result generation is not allowed because student exam form not filled.');
				redirect('center_manage_result');
			}
			if($data['student']){
			    if($data['student']->admission_type == '1' || $data['student']->admission_type == '2'){
			        if($data['student']->lateral_year > $this->input->post('year_sem')){
			            $this->session->set_flashdata('message', 'Result generation is not allowed for previous years or semesters. Please select the current academic year and semester to proceed.');
				        redirect('center_manage_result');
			        }
			    }
			}
			
			if ($data['student_exam_status'] && $data['student_exam_status']->exam_status == '0') {
				$this->session->set_flashdata('message', 'Hallticket is not activate for student, Please activate hallticket to generate marksheet');
				redirect('center_manage_result');
			}
			// $data['exam_setup'] =  $this->Center_details_model->get_exam_setup($this->input->post('month'),$this->input->post('year'));
			if ($data['student']->center_id == '1') {
				$this->session->set_flashdata('message', 'Please enter valid enrollment number');
				redirect('center_manage_result');
			}
			if (!empty($data['course_stream'])) {
				if($this->input->post('year_sem') > 1){
					$re_registration = $this->Center_details_model->check_re_registration_before_result($data['course_stream']->id,$this->input->post('year_sem'),$data['course_stream']->admission_type,$data['course_stream']->lateral_year);
					if(empty($re_registration)){
						$this->session->set_flashdata('message', 'Please fill Re-registration form to fill this result');
						redirect('center_manage_result');
					}
				}
				if ($this->session->userdata('center_id') != "31" && $this->session->userdata('center_id') != "12") {
				   
					/*$this->db->where('student_id',$data['course_stream']->id);
					$this->db->where('year_sem',$data['course_stream']->year_sem);
					$this->db->where('assessment_status','1');
					$assignment = $this->db->get('tbl_assignment');
					$assignment = $assignment->row();
					if(empty($assignment)){
						$this->session->set_flashdata('message','Please upload assignment before applying for result');
						redirect('center_manage_result');
					}*/
					 
					$allowed_student = array("24259105471","23898105303"); 
					if(!in_array($this->input->post('enrollment'),$allowed_student)){
    					$this->db->where('student_id', $data['course_stream']->id);
    					$this->db->where('year_sem', $data['course_stream']->year_sem);
    					$this->db->where('assessment_status', '2');
    					$teacher_assesments = $this->db->get('tbl_center_teacher_assessment_form');
    					$teacher_assesments = $teacher_assesments->row();
    					if (empty($teacher_assesments)) {
    					    $this->db->where('student_id', $data['course_stream']->id);
        					$this->db->where('year_sem', $data['course_stream']->year_sem);
        					$this->db->where('assessment_status', '1');
        					$teach_assesments = $this->db->get('tbl_teacher_assesments');
        					$teach_assesments = $teach_assesments->row();
        					    
    					    if(empty($teach_assesments)){
    					        $this->session->set_flashdata('message', 'Please upload teacher assesment before applying for result');
    						    redirect('center_manage_result');
    					    }
    					}
    					$this->db->where('student_id', $data['course_stream']->id);
    					$this->db->where('year_sem', $data['course_stream']->year_sem);
    					$this->db->where('assessment_status', '2');
    					$self_assesments = $this->db->get('tbl_center_self_assessment_form');
    					$self_assesments = $self_assesments->row();
    					if (empty($self_assesments)) {
					    	$this->db->where('student_id', $data['course_stream']->id);
                    		$this->db->where('is_deleted', '0');
                    		$this->db->where('status', '1');
                    		$this->db->where('assessment_status', '1');
                    		$this->db->order_by('id', 'DESC');
                    		$self_result = $this->db->get('tbl_self_assesments');
                    		$self_result = $self_result->row();
                    		if(empty($self_result)){
                    		    $this->session->set_flashdata('message', 'Please upload self assesment before applying for result');
    						    redirect('center_manage_result');
                    		}
    					} 
				   
    					$this->db->where('student_id', $data['course_stream']->id);
    					$this->db->where('year_sem', $data['course_stream']->year_sem);
    					$this->db->where('assessment_status', '2');
    					$self_assesments = $this->db->get('tbl_center_parent_assessment_form');
    					$self_assesments = $self_assesments->row();
    					if (empty($self_assesments)) {
					    	$this->db->where('student_id', $data['course_stream']->id);
                    		$this->db->where('is_deleted', '0');
                    		$this->db->where('status', '1');
                    		$this->db->where('assessment_status', '1');
                    		$parent_result = $this->db->get('tbl_guardian_assesment');
                    		$parent_result = $parent_result->row();
					        if(empty($parent_result)){
        						$this->session->set_flashdata('message', 'Please upload parent assesment before applying for result');
        						redirect('center_manage_result');
					        }
    					}
					}
				}
			}
			$data['exam_form'] = $this->Center_details_model->get_student_exam_form_status();
			$month = $this->input->post('month');
			$year = $this->input->post('year');
			$exam_status = $this->input->post('exam_status');
		
			$year_sem = $this->input->post('year_sem');
			$enrollment = $this->input->post('enrollment');
			$result_exists = $this->Exam_model->check_result_exists($month, $year, $exam_status, $year_sem, $enrollment);
			if ($result_exists == '1') {
				$this->session->set_flashdata('message', 'Result already created');
				redirect('center_manage_result');
			}
		}
		if ($this->input->post('add_result') == "Add Result") {
			$result = $this->Center_details_model->set_result();
			if ($result) {
				$this->session->set_flashdata('success', 'Result added successfull');
			} else {
				$this->session->set_flashdata('message', 'Result already created');
			}
			redirect('center_manage_result');
		}
		$this->load->view('center/center_manage_result', $data);
	}
	/*public function center_student_reregistration(){
		$this->form_validation->set_rules("student_name", "name", "required");
		if ($this->form_validation->run() === FALSE) {
			$data["fees"] = [];
			$data["stu_data"] = $this->Center_details_model->center_student_reregistration();
			if (!empty($data["stu_data"])) {
				$data["fees"] = $this->Center_details_model->get_student_fees($data["stu_data"]->session_id, $data["stu_data"]->course_id, $data["stu_data"]->stream_id, $data["stu_data"]->country, $data["stu_data"]->course_mode, $data["stu_data"]->year_sem);
				$check_get_rr_student = $this->Center_details_model->get_rr_student($data["stu_data"]->id, $data["stu_data"]->year_sem);
				$check_rr_student_examination = $this->Center_details_model->get_rr_student_examination($data["stu_data"]->id, $data["stu_data"]->year_sem);
				if (empty($check_get_rr_student)) {
					$this->session->set_flashdata('message', 'You are not eligible to Fill Re-registration form');
					redirect('center_student_reregistration_form');
				} else {
					if (empty($check_rr_student_examination)) {
						$this->session->set_flashdata('message', 'Your Result Not Generated');
						redirect('center_student_reregistration_form');
					} else {
						$data['country'] = $this->Web_model->get_all_country();
						$this->load->view("center/center_student_reregistration", $data);
					}
				}
			}
		} else {
			$enrollment_number = $this->input->post("enrollment_number");
			$course_mode = $this->input->post("course_mode");
			if ($this->Web_model->check_stu_re_registration($enrollment_number, $course_mode)) {
				$this->session->set_flashdata('message', 'Failed to re-registered. please visit campus');
				redirect(base_url("center-dashboard"));
			}
			$payment_term =  $this->Center_details_model->get_profile();
			if($this->input->post("course_mode") == 2 && $payment_term->payment_term == "2"){
				$fees = $this->input->post("total_deposit") + $this->input->post("late_fees");
				$student_re_registration_id = $this->Web_model->set_re_registered_student($this->input->post("student_id"), $fees);
				$id = $this->Center_details_model->center_student_reregistration_payment_process();
				redirect('center_student_reregistration_payment/' . base64_encode($this->input->post("student_id")) . "/" . base64_encode($id) . "/" . base64_encode($student_re_registration_id));
			}else{
				if ($this->input->post("course_mode") == 2) {
					if ($this->input->post("re_registration_year_sem") % 2 == 0) {
						$result = $this->Center_details_model->center_student_reregistration_process();
						$this->session->set_flashdata('success', 'Re-registration successful');
						redirect('center_active_admisison');
					}
				}
			}
			$fees = $this->input->post("total_deposit") + $this->input->post("late_fees");
			$student_re_registration_id = $this->Web_model->set_re_registered_student($this->input->post("student_id"), $fees);
			$id = $this->Center_details_model->center_student_reregistration_payment_process();
			redirect('center_student_reregistration_payment/' . base64_encode($this->input->post("student_id")) . "/" . base64_encode($id) . "/" . base64_encode($student_re_registration_id));
		}
	}*/
	public function center_student_reregistration(){
		
		$this->form_validation->set_rules("student_name","name","required");
		if($this->form_validation->run()===FALSE){
			$data["fees"] = [];
			$data["stu_data"] = $this->Center_details_model->center_student_reregistration(); 
			
			if(!empty($data["stu_data"])){
				$duration = $this->Center_details_model->get_last_year_sem_of_student($data["stu_data"]->course_id,$data["stu_data"]->stream_id);
				$exam_check = $this->Center_details_model->check_exam_before_reregistration($data["stu_data"]->id,$data["stu_data"]->year_sem);
				$result_check = $this->Center_details_model->check_result_before_reregistration($data["stu_data"]->id,$data["stu_data"]->year_sem);
				
				if(empty($exam_check)){
					$this->session->set_flashdata('message','You can not apply for re registration due to current year/sem examination form not filled');
					redirect('center_active_admisison');
				}
				if(empty($result_check)){
					$this->session->set_flashdata('message','You can not apply for re registration due to current year/sem result is not generated');
					redirect('center_active_admisison');
				}
				if($data["stu_data"]->course_mode == "1"){
					if($duration->year_duration <= $data["stu_data"]->year_sem){
						$this->session->set_flashdata('message','You can not apply for re registration due to course duration is completed');
						redirect('center_active_admisison');
					}
				}else if($data["stu_data"]->course_mode == "2"){
					if($duration->sem_duration <= $data["stu_data"]->year_sem){
						$this->session->set_flashdata('message','You can not apply for re registration due to course duration is completed');
						redirect('center_active_admisison');
					}
				}else{
					if($duration->month_duration <= $data["stu_data"]->year_sem){
						$this->session->set_flashdata('message','You can not apply for re registration due to course duration is completed');
						redirect('center_active_admisison');
					}
				}
				$data["fees"] = $this->Center_details_model->get_student_fees($data["stu_data"]->session_id,$data["stu_data"]->course_id,$data["stu_data"]->stream_id,$data["stu_data"]->country,$data["stu_data"]->course_mode,$data["stu_data"]->year_sem);
				// echo "<pre>";
				// print_r($data["fees"]);exit;
			}
			
			$data['country'] = $this->Web_model->get_all_country();
			$this->load->view("center/center_student_reregistration",$data);
		}else{
			if($this->Web_model->check_stu_re_registration($this->input->post("enrollment_number"), $this->input->post("course_mode"))){
				
				$this->session->set_flashdata('message','Failed to re-registered. please visit campus');
				redirect(base_url("center-dashboard"));
			}
			$payment_term = $this->Center_details_model->get_check_course_stream_payment_term();
			if(!empty($payment_term)){
				if($payment_term->payment_term == "0"){
					$fees = $this->input->post("total_deposit"); 
					$student_re_registration_id = $this->Web_model->set_re_registered_student($this->input->post("student_id"),$fees);
					$id = $this->Center_details_model->center_student_reregistration_payment_process();
					if($fees == 0){
						$this->session->set_flashdata('success','Re-registration successfull');
						redirect('center_active_admisison');
					}else{
						redirect('center_student_reregistration_payment/'.base64_encode($this->input->post("student_id"))."/".base64_encode($id)."/".base64_encode($student_re_registration_id));
					}
				}
			}
			$center_profile = $this->Center_details_model->get_profile();
			if($center_profile->payment_term == "1"){
				if($this->input->post("course_mode") == "1"){
					$fees = $this->input->post("total_deposit"); 
					$student_re_registration_id = $this->Web_model->set_re_registered_student($this->input->post("student_id"),$fees);
					$id = $this->Center_details_model->center_student_reregistration_payment_process();
					if($fees == 0){
						$this->session->set_flashdata('success','Re-registration successfull');
						redirect('center_active_admisison');
					}else{
						redirect('center_student_reregistration_payment/'.base64_encode($this->input->post("student_id"))."/".base64_encode($id)."/".base64_encode($student_re_registration_id));
					}
				}else{ 
					$divide = $this->input->post("total_deposit");
					$fees = $divide+$this->input->post("late_fees"); 
					$student_re_registration_id = $this->Web_model->set_re_registered_student($this->input->post("student_id"),$fees);
					$id = $this->Center_details_model->center_student_reregistration_payment_process();
					if($fees == 0){
						$this->session->set_flashdata('success','Re-registration successfull');
						redirect('center_active_admisison');
					}else{
						redirect('center_student_reregistration_payment/'.base64_encode($this->input->post("student_id"))."/".base64_encode($id)."/".base64_encode($student_re_registration_id));
					}
				} 
			}else{	
				if($this->input->post("course_mode")==2){ 
					if($this->input->post("re_registration_year_sem")%2==0){ 
						if($center_profile->payment_term == "2"){
							$fees = $this->input->post("total_deposit");
							$student_re_registration_id = $this->Web_model->set_re_registered_student($this->input->post("student_id"),$fees);
							$id = $this->Center_details_model->center_student_reregistration_payment_process();
							if($fees == 0){
								$this->session->set_flashdata('success','Re-registration successfull');
								redirect('center_active_admisison');
							}else{
								redirect('center_student_reregistration_payment/'.base64_encode($this->input->post("student_id"))."/".base64_encode($id)."/".base64_encode($student_re_registration_id));
							}
						}else{
							$result = $this->Center_details_model->center_student_reregistration_process();
							$this->session->set_flashdata('success','Re-registration successfull');
							redirect('center_active_admisison');
						}
					}
				}
				$fees = $this->input->post("total_deposit");
				$student_re_registration_id = $this->Web_model->set_re_registered_student($this->input->post("student_id"),$fees);
				$id = $this->Center_details_model->center_student_reregistration_payment_process();
				if($fees == 0){
					$this->session->set_flashdata('success','Re-registration successfull');
					redirect('center_active_admisison');
				}else{
					redirect('center_student_reregistration_payment/'.base64_encode($this->input->post("student_id"))."/".base64_encode($id)."/".base64_encode($student_re_registration_id));
				}
			} 
		}
	}
	public function student_reregistration_payment(){
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		$this->load->view('center/student_reregistration_payment', $data);
	}
	public function payvia_freecharge_re_registration_payment($data)
	{
		$req = new stdClass();
		$otp = rand(10000, 99999);
		$req->merchantTxnId = "TGU_FC_PYMT_" . $otp . $data['payment_id'];
		$req->amount = $data['total_fees'] . ".00";
		//$req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url() . 'student_re_registration_freecharge?payment_id=' . $data['payment_id'] . '&student_id=' . $data['student_id'] . '&year_sem=' . $data['year_sem'] . '&address=' . $data['address'] . '&country=' . $data['country'] . '&state=' . $data['state'] . '&city=' . $data['city'] . '&pincode=' . $data['pincode'] . '&email=' . $data['email'] . '&mobile=' . $data['mobile'] . '&student_name=' . $data['student_name'] . '&late_fees=' . $data['late_fees'] . '&original_amount=' . $data['original_amount'] . '&student_re_registration_id=' . $data['student_re_registration_id'] . '&ammount=' . $data['total_fees'];
		$req->surl = base_url() . 'student_re_registration_freecharge?payment_id=' . $data['payment_id'] . '&student_id=' . $data['student_id'] . '&year_sem=' . $data['year_sem'] . '&address=' . $data['address'] . '&country=' . $data['country'] . '&state=' . $data['state'] . '&city=' . $data['city'] . '&pincode=' . $data['pincode'] . '&email=' . $data['email'] . '&mobile=' . $data['mobile'] . '&student_name=' . $data['student_name'] . '&late_fees=' . $data['late_fees'] . '&original_amount=' . $data['original_amount'] . '&student_re_registration_id=' . $data['student_re_registration_id'] . '&ammount=' . $data['total_fees'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}
	public function student_re_registration_freecharge(){ 
		$data['student_data'] = $this->Center_details_model->update_student_reregistration_payment();
		if (!empty($data['student_data'])) {
			$this->load->view('center/student_reregistration_receipt_freecharge', $data);
		} else {
			$this->session->set_flashdata('message', 'Re-registration failed');
			redirect('center_active_admisison');
		}
	}
	public function examination_form(){ 
	    $this->session->set_flashdata('message', 'Examination not open for you.');
	   	redirect('center-dashboard');
		if ($this->input->post('generate') == "Generate") { 
			$result = $this->Center_details_model->generate_examination_otp(); 
			if ($result) {
				$this->session->set_flashdata('success', 'Please check your inbox to validate otp');
			} else {
				$this->session->set_flashdata('message', 'This examination not open for you.');
			}
			redirect('center_examination_form');
		}
		// if($this->input->post('verify') == "verify"){
		// 	if($this->input->post('otp_code') == $this->session->userdata('exam_otp')){
		// 		$session = array(
		// 			'is_validated' => '1' 
		// 		);
		// 		$this->session->set_userdata($session);
		// 	}else{
		// 		$this->session->set_flashdata('message','Please enter valid otp');
		// 	}
		// 	redirect('center_examination_form');
		// }
		$data['student'] = $this->Center_details_model->get_examination_student();
	
		// $data['fees'] = $this->Center_details_model->get_student_exam_fees($data['student']->id);
		if (!empty($data['student'])) {
			$this->form_validation->set_rules('year_sem', 'year/sem', 'required');
			if ($this->form_validation->run() === FALSE) {
				$data['subject'] = $this->Center_details_model->get_examination_subjct($data['student']->id, $data['student']->course_id, $data['student']->stream_id, $data['student']->year_sem, $data['student']->center_id);
				
				$exam_form_check = $this->Center_details_model->get_exam_form_check_new($data['student']->id, $data['student']->year_sem);
				// echo "<pre>";
				// print_r($exam_form_check);exit;
				if (!empty($exam_form_check)) {
					$this->session->set_flashdata('message', 'You have already filled exam form');
					redirect('center_examination_form');
				} else {
					/*if ($data['student']->center_id == '1') {
						$this->session->set_flashdata('message', 'Please enter valid enrollment number');
					} else {
						$this->load->view('center/examination_form', $data);
					}*/
					$this->load->view('center/examination_form', $data);
				}
				
			} else {
				$exam_form_check = $this->Center_details_model->get_exam_form_check();
			
				if (!empty($exam_form_check)) {
					$this->session->set_flashdata('message', 'You have already filled exam form');
					redirect('center_examination_form');
				} else {
					$result = $this->Center_details_model->set_examination_form();
				}
				//redirect('center_make_exam_payment/'.$result);
			}
		} else {
			$this->load->view('center/examination_entry');
		}
	}
	public function center_student_reregistration_form(){
		if ($this->input->post('generate') == "Generate") { 
			$data["fees"] = [];
			$data["stu_data"] = $this->Center_details_model->center_student_reregistration_form();
		
		}
		if ($this->input->post('register') == "Register") {
			$enrollment_number = $this->input->post("enrollment_number");
			$course_mode = $this->input->post("course_mode");
			if ($this->Web_model->check_stu_re_registration($enrollment_number, $course_mode)) {
				$this->session->set_flashdata('message', 'Failed to re-registered. please visit campus');
				redirect(base_url("center-dashboard"));
			}
			  
			if ($this->input->post("course_mode") == 2 && $this->input->post("re_registration_year_sem") % 2 == 0) {
				$result = $this->Center_details_model->center_student_reregistration_process();
				$this->session->set_flashdata('success', 'Re-registration successfull');
				redirect('center_active_admisison');
			} 
			$fees = $this->input->post("total_deposit") + $this->input->post("late_fees");
			// for payment related work 
			$student_re_registration_id = $this->Web_model->set_re_registered_student($this->input->post("student_id"), $fees);
			$id = $this->Center_details_model->center_student_reregistration_payment_process();
			redirect('center_student_reregistration_payment/' . base64_encode($this->input->post("student_id")) . "/" . base64_encode($id) . "/" . base64_encode($student_re_registration_id));
		}
		if (!empty($data["stu_data"])) {
			$enrollment_number = $this->input->post("enrollment_number");
			$data["fees"] = $this->Center_details_model->get_student_fees($data["stu_data"]->session_id, $data["stu_data"]->course_id, $data["stu_data"]->stream_id, $data["stu_data"]->country, $data["stu_data"]->course_mode, $data["stu_data"]->year_sem);
			$check_rr_student_examination = $this->Center_details_model->get_rr_student_examination($data["stu_data"]->id, $data["stu_data"]->year_sem);
			$check_get_rr_student = $this->Center_details_model->get_rr_student($data["stu_data"]->id, $data["stu_data"]->year_sem);
			$check_get_rr_student_fees = $this->Center_details_model->get_rr_student_payment($data["stu_data"]->id, $data["stu_data"]->year_sem);
			if (!empty($data['stu_data'])) {
				if (!empty($check_rr_student_examination)) {
					if (empty($check_get_rr_student)) {
						// if(empty($check_get_rr_student_fees)){
						// 	$this->load->view("center/center_student_reregistration",$data);
						// }else{
						// 	$this->session->set_flashdata('message','Your payment is already added');
						// 	redirect('center_student_reregistration_form');
						// }
						$this->load->view("center/center_student_reregistration", $data);
					} else {
						$this->session->set_flashdata('message', 'You have already Filled Re-registration form');
						redirect('center_student_reregistration_form');
					}
				} else {
					$this->session->set_flashdata('message', 'Your Result Not Generated');
					redirect('center_student_reregistration_form');
				}
				// }
				// else{
				// 	$this->session->set_flashdata('message','Please enter valid enrollment number');
				// 	redirect('center_student_reregistration_form');	
				// }
			} else {
				$this->session->set_flashdata('message', 'Please enter valid enrollment number');
				redirect('center_student_reregistration_form');
			}
		}
		// $this->load->view("center/re_registration_entry");			 
		$this->load->view("center/re_registration_entry");
	}
	public function make_exam_payment()
	{
		$data['student'] = $this->Center_details_model->get_student_data();
		$data['fees'] = $this->Center_details_model->get_examination_form_fees_details();
		/*$freecharge_data = $this->payvia_freecharge_examination($data['fees'],$data['student']);
		$data['req'] = $freecharge_data;
		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		$this->load->view('center/make_exam_payment', $data);
	}
	/*public function payvia_freecharge_examination($data,$student){
		$otp = rand ( 10000 , 99999 ); 
		$req = new stdClass();
		$req->merchantTxnId = "BTU_FC_PYMT_".$otp.$data->id;
		$req->amount = $data->total_fees.".00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'examination_freecharge?id='.$data->id;
		$req->surl = base_url().'examination_freecharge?id='.$data->id;
		$req->email = $student->email;
		$req->mobile = $student->mobile;
		$req->customerName = $student->student_name;
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}
	public function generateChecksumForJson($json_decode, $merchantKey){
        $sanitizedInput = $this->sanitizeInput($json_decode, $merchantKey);
        $serializedObj = $sanitizedInput . $merchantKey;
        return $this->calculateChecksum($serializedObj);
    }*/
	public function center_exam_ccavRequestHandler()
	{
		$data['test'] = array();
		$this->load->view('center/center_exam_ccavRequestHandler', $data);
	}
	public function center_exam_ccavResponseHandler()
	{
		$data['test'] = array();
		$this->load->view('center/center_exam_ccavResponseHandler', $data);
	}
	public function re_registration_ccavRequestHandler()
	{
		$data['test'] = array();
		$this->load->view('center/re_registration_ccavRequestHandler', $data);
	}
	public function re_registration_ccavResponseHandler()
	{
		$data['test'] = array();
		$this->load->view('center/re_registration_ccavResponseHandler', $data);
	}
	public function center_active_hall_ticket_list()
	{
		$data['test'] = array();
		$this->load->view('center/active_hall_ticket_list', $data);
	}
	// public function center_syllabus_list(){
	// 	$this->load->view('center/syllabus_list');
	// }
	public function add_consolidate_center_marksheet()
	{
		if ($this->input->post('next') == "Next") {
			$this->Center_details_model->check_consolidated_form_status();
			redirect('add-consolidate-center-marksheet/' . $this->input->post('enrollment'));
		}
		$this->form_validation->set_rules('enrollment', 'enrollment ', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['student'] = $this->Center_details_model->get_student_details();
			$data['subject'] = $this->Center_details_model->get_student_result();
			$data['self'] = $this->Center_details_model->get_self_assement($this->uri->segment(2));
			$data['teacher'] = $this->Center_details_model->get_teacher_assement($this->uri->segment(2));
			$data['assignment'] = $this->Center_details_model->get_assignment_assement($this->uri->segment(2));
			$this->load->view('center/add_consolidate_center_marksheet', $data);
		} else {
			$result = $this->Center_details_model->set_consolidated_marksheet_center();
			redirect('make-consolidate-center-payment/' . base64_encode($result));
		}
	}
	public function make_consolidate_center_payment()
	{
		$data['student'] = $this->Center_details_model->get_student_consolidated_payment();
		$this->load->view('payment/make_consolidate_center_payment', $data);
	}
	public function consolidated_payment_ccavRequestHandler()
	{
		$this->load->view('payment/consolidated_payment_ccavRequestHandler');
	}
	public function consolidated_payment_ccavResponseHandler()
	{
		$this->load->view('payment/consolidated_payment_ccavResponseHandler');
	}
	public function consolidate_center_marksheet_list()
	{
		$this->load->view('center/consolidate_center_marksheet_list');
	}
	// public function consolidate_marksheet_print_center(){
	// 	$this->load->view('center/consolidate_marksheet_print_center');
	// }
	public function edit_consolidate_marksheet_center()
	{
		$this->form_validation->set_rules('hidden_consolidate_id', 'hidden_consolidate_id ', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['single'] = $this->Center_details_model->get_single_note();
			$data['consolidate_details'] = $this->Center_details_model->get_single_consolidate_center();
			$this->load->view('center/edit_consolidate_marksheet_center', $data);
		} else {
			$result = $this->Center_details_model->edit_consolidate_center();
			if ($result == "0") {
				$this->session->set_flashdata('success', 'Result added successfull');
			}
			redirect('consolidate-center-marksheet-list');
		}
	}
	public function apply_transcript()
	{
		$this->form_validation->set_rules('enrollment_number', 'enrollment number ', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('center/apply_transcript');
		} else {
			$result = $this->Center_details_model->get_validate_sudent();
			$this->session->set_flashdata('message', 'Please enter valid enrollment number');
			redirect('apply_transcript');
		}
	}
	public function transcript_application()
	{
		$this->form_validation->set_rules('enrollment_number', 'enrollment number', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['student_details'] = $this->Center_details_model->get_admission_form_details();
			if (!empty($data['student_details'])) {
				$data['consolidate'] = $this->Center_details_model->get_single_consolidate_marksheet($data['student_details']->enrollment_number);
				if (!empty($data['consolidate'])) {
					$data['consolidate_details'] = $this->Center_details_model->get_consolidate_marksheet_details_for_transcript($data['consolidate']->id);
				}
			}
			$data['transcript'] = $this->Center_details_model->get_transcript();
			$data['self'] = $this->Center_details_model->get_self_assement($this->uri->segment(2));
			$data['teacher'] = $this->Center_details_model->get_teacher_assement($this->uri->segment(2));
			$data['assignment'] = $this->Center_details_model->get_assignment_assement($this->uri->segment(2));
			$this->load->view('center/transcript_application', $data);
		} else {
			$this->Center_details_model->set_transcript_form();
			$this->session->set_flashdata('success', 'Transcript application submitted successfull!');
			redirect('center_transcript_application/' . $this->input->post("registration_id"));
		}
	}
	public function transcript_payment()
	{
		$data['transcript'] = $this->Center_details_model->get_transcript();
		$this->load->view('center/transcript_payment', $data);
	}
	public function print_transcript()
	{
		$data['transcript'] = $this->Center_details_model->get_print_transcript();
		$this->load->view('center/print_transcript', $data);
	}
	public function pay_transcrip_certificate_fees()
	{
		$data['transcript'] = $this->Center_details_model->get_transcript();
		$data['student_details'] = $this->Center_details_model->get_admission_form_details();
		$this->load->view('center/transcript_payment', $data);
	}
	public function center_student_transcript_ccavRequestHandler()
	{
		$this->load->view('payment/center_student_transcript_ccavRequestHandler');
	}
	public function center_student_transcript_ccavResponseHandler()
	{
		$this->load->view('payment/center_student_transcript_ccavResponseHandler');
	}
	public function consolidate_marksheet_print_center()
	{
		$data['marksheet'] = $this->Center_details_model->get_single_markshhet();
		$data['marksheet_id'] = $this->Center_details_model->get_single_marksheet_id();
		$this->load->view('marksheet/consolidate_student_marksheet_center', $data);
	}
	public function upload_answer_book_center()
	{
		$this->form_validation->set_rules('course', 'course', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['course'] = $this->Center_details_model->get_all_course_stream_relation();
			$data['single'] = $this->Center_details_model->get_single_answer_book();
			$this->load->view('center/upload_answer_book_center', $data);
		} else {
			$this->Center_details_model->set_answer_book_upload();
			$this->session->set_flashdata('success', 'Sheet uploaded successfull!');
			redirect('upload-answer-book-center');
		}
	}
	public function get_subject_name_stream()
	{
		$this->Center_details_model->get_subject_name_stream();
	}
	public function center_add_paper()
	{
		$this->form_validation->set_rules('course', 'course', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['course'] = $this->Center_details_model->get_all_course_stream_relation();
			$data['stream'] = $this->Admin_model->get_active_stream();
			$data['subject'] = $this->Admin_model->get_active_subject();
			$data['single'] = $this->Center_details_model->get_single_paper();
			// echo "<pre>";print_r($data['single']);exit;
			$data['session'] = $this->Admin_model->get_active_session();
			$this->load->view('center/add_paper', $data);
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
			$res = $this->Center_details_model->insert_paper_data($photo);
			if ($res == 0) {
				$this->session->set_flashdata("success", "Papers added successfully!");
			} else {
				$this->session->set_flashdata('sucess', 'Papers updated successfully!!');
			}
			redirect('center_add_paper');
		}
	}
	public function get_all_paper_ajax()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_papers');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_all_papers_ajax($length, $start, $search);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$session = $this->Admin_model->get_paper_session($print->session_id);
				$course_mode = '';
				if ($print->course_mode == 1) {
					$course_mode = 'Year';
				} else if ($print->course_mode == 2) {
					$course_mode = 'Semester';
				} else if ($print->course_mode == 3) {
					$course_mode = 'Both';
				} else if ($print->course_mode == 4) {
					$course_mode = 'Month';
				} else {
					$course_mode = '';
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				// $sub_array[] = $print->subject_name;
				// $sub_array[] = $course_mode;
				// $sub_array[] = $print->year_sem;
				// $sub_array[] = $session;
				// if($print->file != ""){
				// 	$sub_array[] = "<a data-toggle='tooltip' title='View Identity Softcopy' href=" . base_url() . "uploads/papers/" . $print->file . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				// }else{
				// 	$sub_array[] = '';
				// }
				// if($print->status == "1"){
				// 	$sub_array[] = "Active";
				// }else{
				// 	$sub_array[] = "Inactive";
				// }
				if ($print->status == "1") {
					$sub_array[] = "<a data-toggle='tooltip' title='View' href=" . base_url() . "center_view_all_paper/" . $print->course_id . "/" . $print->stream_id . "  class='btn btn-success btn-sm'>Click to View List</a>";
				} else {
					$sub_array[] = "<a data-toggle='tooltip' title='View' href=" . base_url() . "center_view_all_paper/" . $print->course_id . "/" . $print->stream_id . "  class='btn btn-success btn-sm'>Click to View List</a>";
				}
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_papers_ajax_count($search);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	public function center_view_all_paper()
	{
		$this->form_validation->set_rules('course', 'course', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['course'] = $this->Center_details_model->get_all_course_stream_relation();
			$data['stream'] = $this->Admin_model->get_active_stream();
			$data['subject'] = $this->Admin_model->get_active_subject();
			$data['single'] = $this->Center_details_model->get_single_paper_stream_wise();
			// echo "<pre>";print_r($data['single']->file);exit;
			$data['session'] = $this->Admin_model->get_active_session();
			//$data['single'] = $this->Admin_model->get_single_stream_name();
			$this->load->view('center/view_all_paper', $data);
		} else {
			$photo = '';
			if ($_FILES['file']['name'] != "") {
				$photo = $this->Digitalocean_model->upload_photo($filename = "file", $path = "uploads/papers/");
				/*
			$tmp = explode('.', $_FILES['file']['name']);
			$ext = end($tmp);
			$config = array(
				'upload_path' 	=> "uploads/papers/",
				'allowed_types' => "*",
				'encrypt_name' 	=> TRUE,
			);
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
			$res = $this->Center_details_model->insert_paper_data($photo);
			if ($res == 0) {
				$this->session->set_flashdata("success", "Papers added successfully!");
			} else {
				$this->session->set_flashdata('sucess', 'Papers updated successfully!!');
			}
			redirect('center_add_paper');
		}
	}
	public function get_all_paper_ajax_course_wise()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];
		$uri = $this->input->post('stream_id');
		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}
		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}
		$valid_columns = $this->db->list_fields('tbl_papers');
		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			// $this->db->order_by('tbl_topic.id'.$order,$dir);
		}
		if (!empty($search)) {
			$x = 0;
			/*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
		}
		$document = $this->Center_details_model->get_all_paper_ajax_course_wise($length, $start, $search, $uri);
		$data = array();
		if (!empty($document)) {
			$zz = 1;
			foreach ($document as $print) {
				$session = $this->Admin_model->get_paper_session($print->session_id);
				$course_mode = '';
				if ($print->course_mode == 1) {
					$course_mode = 'Year';
				} else if ($print->course_mode == 2) {
					$course_mode = 'Semester';
				} else if ($print->course_mode == 3) {
					$course_mode = 'Both';
				} else if ($print->course_mode == 4) {
					$course_mode = 'Month';
				} else {
					$course_mode = '';
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				// $sub_array[] = $print->course_name;
				// $sub_array[] = $print->stream_name;
				$sub_array[] = $print->subject_name;
				$sub_array[] = $course_mode;
				$sub_array[] = $print->year_sem;
				$sub_array[] = $session;
				if ($print->file != "") {
					$files = $this->Digitalocean_model->get_photo('uploads/papers/' . $print->file);
					$sub_array[] = "<a data-toggle='tooltip' title='View' href=" . $files . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				} else {
					$sub_array[] = '';
				}
				if ($print->status == "1") {
					$sub_array[] = "Active";
				} else {
					$sub_array[] = "Inactive";
				}
				$data[] = $sub_array;
			}
		}
		$TotalProducts = $this->Center_details_model->get_all_paper_ajax_course_wise_count($search, $uri);
		$output = array(
			"draw" 				=> $draw,
			"recordsTotal" 		=> $TotalProducts,
			"recordsFiltered" 	=> $TotalProducts,
			"data" 				=> $data
		);
		echo json_encode($output);
		exit();
	}
	//letters
	public function apply_student_bonafide()
	{
		$data['student'] = $this->Center_details_model->get_single_student_details();
		// $data['bonafide'] = $this->Center_details_model->get_student_amount_details(); //
		$data['bonafide'] = $this->Center_details_model->get_certificate_fees('4');
		$this->load->view('center/apply_student_bonafide', $data);
	}
	public function student_bonafide_ccavRequestHandler()
	{
		$this->load->view('center/student_bonafide_ccavRequestHandler');
	}
	public function pay_student_bonafide(){
		$data['bonafide'] = $this->Center_details_model->apply_student_bonafide();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('4');
		$this->load->view('center/pay_student_bonafide', $data);
	}
	public function print_student_bonafide()
	{
		$data['single'] = $this->Center_details_model->get_single_bona_application_print();
		$this->load->view('center/print_student_bonafide', $data);
	}
	public function apply_student_recomm()
	{
		$data['student'] = $this->Center_details_model->get_single_student_details();
		// $data['recommendation'] = $this->Center_details_model->get_student_recommendation_amount_details(); //
		$data['amount'] = $this->Center_details_model->get_certificate_fees('8');
		// echo "<pre>"; print_r($data['recommendation'] ); exit();
		$this->load->view('center/apply_student_recomm', $data);
	}
	public function student_recomm_ccavRequestHandler()
	{
		$this->load->view('center/student_recomm_ccavRequestHandler');
	}
	public function pay_student_recomm(){
		$data['bonafide'] = $this->Center_details_model->apply_student_recomm();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('8'); 
		$this->load->view('center/pay_student_recomm', $data);
	}
	public function print_student_recomm()
	{
		$data['single'] = $this->Center_details_model->get_single_recomm_application_print();
		// echo "<pre>"; print_r($data['single']); exit();
		$this->load->view('center/print_student_recomm', $data);
	}
	public function apply_student_recomm_second()
	{
		$data['student'] = $this->Center_details_model->get_single_student_details();
		// $data['IIrecommendation'] = $this->Center_details_model->get_student_II_recommendation_amount_details(); //
		$data['amount'] = $this->Center_details_model->get_certificate_fees('9');
		// echo "<pre>"; print_r($data['student'] ); exit();
		$this->load->view('center/apply_student_recomm_second', $data);
	}
	public function student_recomm_second_ccavRequestHandler()
	{
		$this->load->view('center/student_recomm_second_ccavRequestHandler');
	}
	public function pay_student_recomm_second()
	{
		$data['bonafide'] = $this->Center_details_model->apply_student_recomm_second();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('9');
		$this->load->view('center/pay_student_recomm_second', $data);
	}
	public function print_student_recomm_second()
	{
		$data['single'] = $this->Center_details_model->get_single_recomm_second_application_print();
		// echo "<pre>"; print_r($data['single']); exit();
		$this->load->view('center/print_student_recomm_second', $data);
	}
	public function apply_student_medium_inst()
	{
		$data['student'] = $this->Center_details_model->get_single_student_details(); 
		// echo "<pre>"; print_r($data['certificate']); exit();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('5');
		$this->load->view('center/apply_student_medium_inst', $data);
	}
	public function student_medium_inst_ccavRequestHandler()
	{
		$this->load->view('center/student_medium_inst_ccavRequestHandler');
	}
	public function pay_student_medium_inst()
	{
		$data['bonafide'] = $this->Center_details_model->apply_student_medium_inst();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('5');
		$this->load->view('center/pay_student_medium_inst', $data);
	}
	public function print_student_medium_inst()
	{
		$data['single'] = $this->Center_details_model->get_single_inst_medium_print();
		$this->load->view('center/print_student_medium_inst', $data);
	}
	public function apply_student_no_backlog()
	{
		$data['student'] = $this->Center_details_model->get_single_student_details();
		// $data['certificate'] = $this->Center_details_model->get_student_no_backlog_amount_details(); //
		$data['amount'] = $this->Center_details_model->get_certificate_fees('6');
		// echo "<pre>"; print_r($data['student'] ); exit();
		$this->load->view('center/apply_student_no_backlog', $data);
	}
	public function student_no_backlog_ccavRequestHandler()
	{
		$this->load->view('center/student_no_backlog_ccavRequestHandler');
	}
	public function pay_student_no_backlog()
	{
		$data['bonafide'] = $this->Center_details_model->apply_student_no_backlog();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('6');
		$this->load->view('center/pay_student_no_backlog', $data);
	}
	public function print_student_no_backlog()
	{
		$data['single'] = $this->Center_details_model->get_single_no_backlog_print();
		$this->load->view('center/print_student_no_backlog', $data);
	}
	public function apply_student_no_split()
	{
		$data['student'] = $this->Center_details_model->get_single_student_details();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('7');
		// echo "<pre>"; print_r($data['student'] ); exit();
		$this->load->view('center/apply_student_no_split', $data);
	}
	public function student_no_split_ccavRequestHandler()
	{
		$this->load->view('center/student_no_split_ccavRequestHandler');
	}
	public function pay_student_no_split()
	{
		$data['bonafide'] = $this->Center_details_model->apply_student_no_split();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('7');
		$this->load->view('center/pay_student_no_split', $data);
	}
	public function print_student_no_split()
	{
		$data['single'] = $this->Center_details_model->get_single_no_split_print();
		$this->load->view('center/print_student_no_split', $data);
	}
	public function apply_student_migration()
	{
		$data['student'] = $this->Center_details_model->get_single_student_details();
		// $data['certificate'] = $this->Center_details_model->get_migration_certificate_amount();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('0');
		$this->load->view('center/apply_student_migration', $data);
	}
	public function student_migration_ccavRequestHandler()
	{
		$this->load->view('center/student_migration_ccavRequestHandler');
	}
	public function pay_student_migration()
	{
		$data['bonafide'] = $this->Center_details_model->apply_student_migration();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('0');
		$this->load->view('center/pay_student_migration', $data);
	}
	public function print_student_migration()
	{
		$data['single'] = $this->Center_details_model->get_single_migration_print();
		$this->load->view('center/print_student_migration', $data);
	}
	public function apply_student_provisional_degree()
	{
		$data['student'] = $this->Center_details_model->get_single_student_details();
		// $data['certificate'] = $this->Center_details_model->get_provisional_degree_amount();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('3');
		$this->load->view('center/apply_student_provisional_degree', $data);
	}
	public function student_provisional_degree_ccavRequestHandler()
	{
		$this->load->view('center/student_provisional_degree_ccavRequestHandler');
	}
	public function pay_student_provisional_degree()
	{
		$data['bonafide'] = $this->Center_details_model->apply_student_provisional_degree(); 
		$data['amount'] = $this->Center_details_model->get_certificate_fees('3');
		$this->load->view('center/pay_student_provisional_degree', $data);
	}
	public function print_student_provisional_degree()
	{
		$data['single'] = $this->Center_details_model->get_single_provisional_degree_print();
		$this->load->view('center/print_student_provisional_degree', $data);
	}
	public function apply_student_transfer_certificate()
	{
		$data['student'] = $this->Center_details_model->get_single_student_details();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('1');
		$this->load->view('center/apply_student_transfer_certificate', $data);
	}
	public function student_transfer_certificate_ccavRequestHandler()
	{
		$this->load->view('center/student_transfer_certificate_ccavRequestHandler');
	}
	public function pay_student_transfer_certificate()
	{
		$data['bonafide'] = $this->Center_details_model->apply_student_transfer_certificate();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('1');
		$this->load->view('center/pay_student_transfer_certificate', $data);
	}
	public function print_student_transfer_certificate()
	{
		$data['single'] = $this->Center_details_model->get_single_transfer_certificate_print();
		$this->load->view('center/print_student_transfer_certificate', $data);
	}
	public function apply_student_character_certificate()
	{
		$data['student'] = $this->Center_details_model->get_single_student_details();
		// $data['certificate'] = $this->Center_details_model->get_character_amount();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('10');
		// echo "<pre>"; print_r($data['student'] ); exit();
		$userfile = "";
		if ($this->input->post('upload') == "Upload") {
			if ($_FILES['userfile']['name'] != "") {
				$userfile = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "images/pcc/");
				$this->Center_details_model->set_ppc_report($userfile);
			}
		}
		$this->load->view('center/apply_student_character_certificate', $data);
	}
	public function student_character_certificate_ccavRequestHandler()
	{
		$this->load->view('center/student_character_certificate_ccavRequestHandler');
	}
	public function pay_student_character_certificate()
	{
		$data['bonafide'] = $this->Center_details_model->apply_student_character_certificate();
		$data['amount'] = $this->Center_details_model->get_certificate_fees('10');
		$this->load->view('center/pay_student_character_certificate', $data);
	}
	public function print_student_character_certificate()
	{
		$data['single'] = $this->Center_details_model->get_single_character_certificate_print();
		$this->load->view('center/print_student_character_certificate', $data);
	}
	public function center_apply_degree()
	{
		$this->form_validation->set_rules('enrollment_number', 'enrollment number', 'required');
		if ($this->form_validation->run() === FALSE) {
			//$data['single'] = $this->Center_details_model->get_degree_enrollment();
			$this->load->view('center/center_apply_degree', $data);
		} else {
			$this->Center_details_model->get_degree_enrollment();
		}
	}
	public function apply_degree_by_center()
	{
		$this->form_validation->set_rules('enrollment_number', 'enrollment number', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['student'] = $this->Center_details_model->get_degree_enrollment_verified();
			$this->load->view('center/apply_degree_by_center', $data);
		} else {
			$secondary_marksheet = '';
			if ($_FILES['secondary_marksheet']['name'] != "") {
				$secondary_marksheet = $this->Digitalocean_model->upload_photo($filename = "secondary_marksheet", $path = "images/qualification/");
				/*$tmp = explode('.', $_FILES['secondary_marksheet']['name']);
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
			$sr_secondary_marksheet = '';
			if ($_FILES['sr_secondary_marksheet']['name'] != "") {
				$sr_secondary_marksheet = $this->Digitalocean_model->upload_photo($filename = "sr_secondary_marksheet", $path = "images/qualification/");
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
			$graduation_marksheet = '';
			if ($_FILES['graduation_marksheet']['name'] != "") {
				$graduation_marksheet = $this->Digitalocean_model->upload_photo($filename = "graduation_marksheet", $path = "images/qualification/");
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
			$post_graduation_marksheet = '';
			if ($_FILES['post_graduation_marksheet']['name'] != "") {
				$post_graduation_marksheet = $this->Digitalocean_model->upload_photo($filename = "post_graduation_marksheet", $path = "images/qualification/");
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
			$other_qualification_marksheet = '';
			if ($_FILES['other_qualification_marksheet']['name'] != "") {
				$other_qualification_marksheet = $this->Digitalocean_model->upload_photo($filename = "other_qualification_marksheet", $path = "images/qualification/");
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
			$this->Center_details_model->set_degree_application($secondary_marksheet, $sr_secondary_marksheet, $graduation_marksheet, $post_graduation_marksheet, $other_qualification_marksheet);
		}
	}
	public function make_center_degree_payment()
	{
		$data['student'] = $this->Center_details_model->get_degree_payment_student();
		$this->load->view('center/make_center_degree_payment', $data);
	}
	public function center_degree_ccavRequestHandler()
	{
		$data['test'] = array();
		$this->load->view('center/center_degree_ccavRequestHandler', $data);
	}
	public function center_degree_ccavResponseHandler()
	{
		$data['test'] = array();
		$this->load->view('center/center_degree_ccavResponseHandler', $data);
	}
	public function center_syllabus_list()
	{
		// $this->load->view('center/syllabus_list');
		$data['result'] = $this->Center_details_model->get_all_course_syllabus();
		$this->load->view('center/course_syllabus_list', $data);
	}
	public function set_scholar_details()
	{
		$this->form_validation->set_rules('guide_allocation_process', 'Allocation Process', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['student'] = $this->Center_details_model->get_scholar_details($this->uri->segment(2));
			$data['extra_details'] = $this->Center_details_model->get_scholar_extra_details($this->uri->segment(2));
			// echo '<pre>';print_r($data['single']);exit();
			$this->load->view("center/scholar_details", $data);
		} else {
			$res = $this->Center_details_model->set_scholar_details();
			if ($res == 1) {
				$this->session->set_flashdata('success', 'Scholar details set successfully!');
			} else {
				$this->session->set_flashdata('message', 'Scholar not found!');
			}
			redirect('center-set-scholar-details/' . $this->input->post('student_id'));
		}
	}
	public function center_guide_application_list()
	{
		$this->load->view('center/guide_application_list');
	}
	public function center_approve_guide_application_list()
	{
		$this->load->view("center/approve_guide_application_list");
	}
	public function center_guide_documents()
	{
		$data['qualification'] = $this->Center_details_model->get_single_guide();
		$this->load->view('center/guide_documents', $data);
	}
	public function center_approve_guide_application()
	{
		$this->Center_details_model->approve_guide_application();
		$this->session->set_flashdata("success", "Guide application approve successfuly.");
		redirect('center_approve_guide_application_list');
	}
	public function center_view_supervisors_appointment_letter()
	{
		$data['guide'] = $this->Research_model->get_single_guide_data();
		$this->load->view("center/appointment_letter_for_supervisors", $data);
	}
	public function center_guide_application_update()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['single_guide_applications'] = $this->Research_model->get_all_guide_application();
			// echo "<pre>";print_r($data['single_guide_applications']);exit;
			$data['country'] = $this->Web_model->get_all_country();
			$data['signature'] = $this->Setting_model->get_all_signature();
			$this->load->view('center/guide_application_update', $data);
		} else {
			$photo = '';
			if ($_FILES['photo']['name'] != "") {
				$photo = $this->Digitalocean_model->upload_photo($filename = "photo", $path = "images/guide_pic/");
				/*$tmp = explode('.', $_FILES['photo']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/guide_pic",
					'allowed_types' => "jpg|jpeg|png",
					'encrypt_name' => TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('photo')){
					$data = $this->upload->data();				
					$photo = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			} else {
				$photo = $this->input->post('old_photo');
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
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			} else {
				$signature = $this->input->post('old_signature');
			}
			$secondary_subject_marksheet = '';
			if ($_FILES['secondary_subject_marksheet']['name'] != "") {
				$secondary_subject_marksheet = $this->Digitalocean_model->upload_photo($filename = "secondary_subject_marksheet", $path = "images/guide_pic/guide_document/");
				/*$tmp = explode('.', $_FILES['secondary_subject_marksheet']['name']);
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
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			} else {
				$secondary_subject_marksheet = $this->input->post('old_secondary_subject_marksheet');
			}
			$sr_secondary_subject_marksheet = '';
			if ($_FILES['sr_secondary_subject_marksheet']['name'] != "") {
				$sr_secondary_subject_marksheet = $this->Digitalocean_model->upload_photo($filename = "sr_secondary_subject_marksheet", $path = "images/guide_pic/guide_document/");
				/*$tmp = explode('.', $_FILES['sr_secondary_subject_marksheet']['name']);
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
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			} else {
				$sr_secondary_subject_marksheet = $this->input->post('old_sr_secondary_subject_marksheet');
			}
			$graduation_subject_marksheet = '';
			if ($_FILES['graduation_subject_marksheet']['name'] != "") {
				$graduation_subject_marksheet = $this->Digitalocean_model->upload_photo($filename = "graduation_subject_marksheet", $path = "images/guide_pic/guide_document/");
				/*$tmp = explode('.', $_FILES['graduation_subject_marksheet']['name']);
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
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			} else {
				$graduation_subject_marksheet = $this->input->post('old_graduation_subject_marksheet');
			}
			$post_graduation_subject_marksheet = '';
			if ($_FILES['post_graduation_subject_marksheet']['name'] != "") {
				$post_graduation_subject_marksheet = $this->Digitalocean_model->upload_photo($filename = "post_graduation_subject_marksheet", $path = "images/guide_pic/guide_document/");
				/*$tmp = explode('.', $_FILES['post_graduation_subject_marksheet']['name']);
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
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			} else {
				$post_graduation_subject_marksheet = $this->input->post('old_post_graduation_subject_marksheet');
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
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			} else {
				$phd_subject_marksheet = $this->input->post('old_phd_subject_marksheet');
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
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			} else {
				$other_qualification_subject_marksheet = $this->input->post('old_other_qualification_subject_marksheet');
			}
			$biodata = '';
			if ($_FILES['biodata']['name'] != "") {
				$biodata = $this->Digitalocean_model->upload_photo($filename = "biodata", $path = "images/guide_pic/guide_document/");
				/*
				$tmp = explode('.', $_FILES['biodata']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/guide_pic/guide_document",
					'allowed_types' => "*",
					'encrypt_name' => TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('biodata')){
					$data = $this->upload->data();				
					$biodata = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			} else {
				$biodata = $this->input->post('old_biodata');
			}
			$aadhar_card = '';
			if ($_FILES['aadhar_card']['name'] != "") {
				$aadhar_card = $this->Digitalocean_model->upload_photo($filename = "aadhar_card", $path = "images/guide_pic/guide_document/");
				/*$tmp = explode('.', $_FILES['aadhar_card']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/guide_pic/guide_document",
					'allowed_types' => "*",
					'encrypt_name' => TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('aadhar_card')){
					$data = $this->upload->data();				
					$aadhar_card = $data['file_name'];	
				}*/
			} else {
				$aadhar_card = $this->input->post('old_aadhar_card');
			}
			$this->Center_details_model->update_guide_application($photo, $signature, $secondary_subject_marksheet, $sr_secondary_subject_marksheet, $graduation_subject_marksheet, $post_graduation_subject_marksheet, $phd_subject_marksheet, $other_qualification_subject_marksheet, $biodata, $aadhar_card);
			$this->session->set_flashdata('success', 'Guide Application Updated Successfully');
			redirect('center_guide_application_list');
		}
	}
	public function recharge_wallet()
	{
		$this->form_validation->set_rules('amount', 'amount', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['wallet'] = $this->Center_details_model->get_my_wallet_balance();
			$data['last_recharge'] = $this->Center_details_model->get_my_wallet_balance_laast_recharge();
			$this->load->view('center/recharge_wallet', $data);
		} else {
			$this->Center_details_model->set_recharge_paymnet();
		}
	}
	public function make_recharge_payment()
	{
		$data['payment'] = $this->Center_details_model->get_single_recharge_payment();
		$this->load->view('payment/make_recharge_payment', $data);
	}
	public function wallet_recharge_history()
	{
		$this->load->view('center/wallet_recharge_history');
	}
	public function recharge_ccavResponseHandler()
	{
		$data['payment'] = $this->Center_details_model->get_single_recharge_payment();
		$this->load->view('payment/recharge_ccavResponseHandler', $data);
	}
	public function student_self_Assessment_form()
	{
		$data['new'] = array();
		if ($this->input->post('generate') == "Generate") {
			$data['center_student'] = $this->Center_details_model->get_verified_center_student();
		} else if ($this->input->post('register') == "Register") {
			$this->form_validation->set_rules("student_name", "Student Name", "required");
			if ($this->form_validation->run() === FALSE) {
				$data['center_student'] = $this->Center_details_model->get_center_student($enrollment_number);
				$this->load->view('center/student_self_Assessment_form', $data);
			} else {
				$signature = '';
				if ($_FILES['signature']['name'] != "") {
					$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/signature/");
				}
				$this->Center_details_model->set_center_student_self_assessment($signature);
				$this->session->set_flashdata('success', 'Assessment Submitted Successfully');
				redirect('self_Assessment_pending_list');
			}
		}
		if ($this->uri->segment(2) != "") {
			$data['single'] = $this->Center_details_model->get_self_center_student();
			$data['student'] = $this->Center_details_model->get_self_center_student_table_data();
		}
		$this->load->view('center/student_self_Assessment_form', $data);
	}
	public function self_Assessment_pending_list()
	{
		$this->load->view('center/self_Assessment_pending_list');
	}
	public function self_Assessment_rejected_list()
	{
		$this->load->view('center/self_Assessment_rejected_list');
	}
	public function self_Assessment_approved_list()
	{
		$this->load->view('center/self_Assessment_approved_list');
	}
	public function center_approve_self_assessment()
	{
		$this->Center_details_model->approve_self_assessment();
		$this->session->set_flashdata("success", "Self assessment approve successfully.");
		redirect('self_Assessment_approved_list');
	}
	public function center_self_reject_remark()
	{
		$this->Center_details_model->center_self_reject_remark();
		$this->session->set_flashdata('success', 'Self assessment reject successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function student_teacher_Assessment_form()
	{
		$data['center_student'] = array();
		if ($this->input->post('generate') == "Generate") {
			$data['center_student'] = $this->Center_details_model->get_verified_center_student();
		} else if ($this->input->post('register') == "Register") {
			$this->form_validation->set_rules("student_name", "Student Name", "required");
			if ($this->form_validation->run() === FALSE) {
				$data['center_student'] = $this->Center_details_model->get_center_student($enrollment_number);
				$this->load->view('center/student_teacher_Assessment_form', $data);
			} else {
				$signature = '';
				if ($_FILES['signature']['name'] != "") {
					$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/signature/");
				}
				$this->Center_details_model->set_center_student_teacher_assessment($signature);
				$this->session->set_flashdata('success', 'Assessment Submitted Successfully');
				redirect('teacher_Assessment_pending_list');
			}
		}
		if ($this->uri->segment(2) != "") {
			$data['single'] = $this->Center_details_model->get_teacher_center_student();
			$data['student'] = $this->Center_details_model->get_teacher_center_student_table_data();
		}
		$this->load->view('center/student_teacher_Assessment_form', $data);
	}
	public function teacher_Assessment_pending_list()
	{
		$this->load->view('center/teacher_Assessment_pending_list');
	}
	public function teacher_Assessment_rejected_list()
	{
		$this->load->view('center/teacher_Assessment_rejected_list');
	}
	public function teacher_Assessment_approved_list()
	{
		$this->load->view('center/teacher_Assessment_approved_list');
	}
	public function center_approve_teacher_assessment()
	{
		$this->Center_details_model->approve_teacher_assessment();
		$this->session->set_flashdata("success", "Teacher assessment approve successfully.");
		redirect('teacher_Assessment_approved_list');
	}
	public function center_teacher_reject_remark()
	{
		$this->Center_details_model->center_teacher_reject_remark();
		$this->session->set_flashdata('success', 'Teacher assessment reject successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function student_industry_Assessment_form()
	{
		$data['center_student'] = array();
		if ($this->input->post('generate') == "Generate") {
			$data['center_student'] = $this->Center_details_model->get_verified_center_student();
		} else if ($this->input->post('register') == "Register") {
			$this->form_validation->set_rules("student_name", "Student Name", "required");
			if ($this->form_validation->run() === FALSE) {
				$data['center_student'] = $this->Center_details_model->get_center_student($enrollment_number);
				$this->load->view('center/student_industry_Assessment_form', $data);
			} else {
				$signature = '';
				if ($_FILES['signature']['name'] != "") {
					$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/signature/");
				}
				$company_seal = '';
				if ($_FILES['company_seal']['name'] != "") {
					$company_seal = $this->Digitalocean_model->upload_photo($filename = "company_seal", $path = "images/logo/");
				}
				$this->Center_details_model->set_center_student_industry_assessment($signature, $company_seal);
				$this->session->set_flashdata('success', 'Assessment Submitted Successfully');
				redirect('industry_Assessment_pending_list');
			}
		}
		if ($this->uri->segment(2) != "") {
			$data['single'] = $this->Center_details_model->get_industry_center_student();
			$data['student'] = $this->Center_details_model->get_industry_center_student_table_data();
		}
		$this->load->view('center/student_industry_Assessment_form', $data);
	}
	public function industry_Assessment_pending_list()
	{
		$this->load->view('center/industry_Assessment_pending_list');
	}
	public function industry_Assessment_rejected_list()
	{
		$this->load->view('center/industry_Assessment_rejected_list');
	}
	public function industry_Assessment_approved_list()
	{
		$this->load->view('center/industry_Assessment_approved_list');
	}
	public function center_approve_industry_assessment()
	{
		$this->Center_details_model->approve_industry_assessment();
		$this->session->set_flashdata("success", "Industry assessment approve successfully.");
		redirect('industry_Assessment_approved_list');
	}
	public function center_industry_reject_remark()
	{
		$this->Center_details_model->center_industry_reject_remark();
		$this->session->set_flashdata('success', 'Industry assessment reject successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function student_parent_Assessment_form()
	{
		$data['center_student'] = array();
		if ($this->input->post('generate') == "Generate") {
			$data['center_student'] = $this->Center_details_model->get_verified_center_student();
		} else if ($this->input->post('register') == "Register") {
			$this->form_validation->set_rules("father_name", "Father Name", "required");
			if ($this->form_validation->run() === FALSE) {
				$data['center_student'] = $this->Center_details_model->get_center_student($enrollment_number);
				$this->load->view('center/student_parent_Assessment_form', $data);
			} else {
				$signature = '';
				if ($_FILES['signature']['name'] != "") {
					$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/signature/");
				}
				$this->Center_details_model->set_center_student_parent_assessment($signature);
				$this->session->set_flashdata('success', 'Assessment Submitted Successfully');
				redirect('parent_Assessment_pending_list');
			}
		}
		if ($this->uri->segment(2) != "") {
			$data['single'] = $this->Center_details_model->get_parent_center_student();
			$data['student'] = $this->Center_details_model->get_parent_center_student_table_data();
		}
		$this->load->view('center/student_parent_Assessment_form', $data);
	}
	public function parent_Assessment_pending_list()
	{
		$this->load->view('center/parent_Assessment_pending_list');
	}
	public function parent_Assessment_rejected_list()
	{
		$this->load->view('center/parent_Assessment_rejected_list');
	}
	public function parent_Assessment_approved_list()
	{
		$this->load->view('center/parent_Assessment_approved_list');
	}
	public function center_approve_parent_assessment()
	{
		$this->Center_details_model->approve_parent_assessment();
		$this->session->set_flashdata("success", "Parent assessment approve successfully.");
		redirect('parent_Assessment_approved_list');
	}
	public function center_parent_reject_remark()
	{
		$this->Center_details_model->center_parent_reject_remark();
		$this->session->set_flashdata('success', 'Parent assessment reject successfully');
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function student_assignment_form()
	{
		$data['student'] = array();
		if ($this->input->post('generate') == "Generate") {
			$data['validate'] = $this->Center_details_model->get_validate_student();
			if (!empty($data['validate'])) {
				redirect('student_assignment_form/' . $data['validate']->enrollment_number);
			} else {
				$this->session->set_flashdata('message', 'Please enter valid enrollment number');
				redirect('student_assignment_form');
			}
		}
		$data['student'] = $this->Center_details_model->get_student_details();
		$this->form_validation->set_rules('enrollment_number', 'enrollment number', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('center/student_assignment_form', $data);
		} else {
			$assignment = "";
			if ($_FILES['userfile']['name'] != "") {
				$assignment = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "uploads/assesment_form/assignment/");
			}
			$this->Center_details_model->set_student_assignment($assignment);
			$this->session->set_flashdata('success', 'Assignment uploaded successfully!');
			redirect('student_assignment_form');
		}
	}
	public function student_assignment_pending_list()
	{
		$this->load->view('center/student_assignment_pending_list');
	}
	public function student_assignment_rejected_list()
	{
		$this->load->view('center/student_assignment_rejected_list');
	}
	public function student_assignment_approved_list()
	{
		$this->load->view('center/student_assignment_approved_list');
	}
	public function center_guide()
	{
		$this->load->view('center/center_login_guide');
	} 
	public function complete_balance_fees(){ 	
		$this->load->view('center/complete_balance_fees'); 	
	}
	public function update_center_subject(){ 
	    $this->form_validation->set_rules('course_id', 'course_id', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['single'] = $this->Center_details_model->get_single_subject_details();
    		$data['session'] = $this->Course_model->get_all_session();
    		$data['course'] = $this->Course_model->get_all_course_stream_relation();
    		$this->load->view('center/update_center_subject',$data); 	
		} else {
			$result = $this->Center_details_model->update_subject();
			$this->session->set_flashdata('success', 'Subject updated successfully');
			redirect('center-subject-list');
		}
	}
}