<?php
class User_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//self::check_login();
	}
	public function check_login()
	{
		if ($this->session->userdata("student_id") == "") {
			redirect('login');
		}
	}
	public function student_logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function online_payment_RequestHandler()
	{
		$this->load->view('front/online_payment_RequestHandler');
	}

	public function dashboard()
	{
		$this->check_login();
		//$data['course_das']=$this->Front_model->get_all_course(); 
		$data['news'] = $this->Front_model->get_marquee_news();
		$data['admission'] = $this->Front_model->get_student_details();
		// echo "<pre>"; print_r($data['admission']); exit();
		$this->load->view('front/dashboard', $data);
	}
	public function undertaking_letter()
	{
		$this->check_login();
		$data['single'] = $this->Front_model->get_admission_form();
		$this->load->view('front/undertaking_letter', $data);
	}
	public function admission_form()
	{
		$this->check_login();
		$data['admission'] = $this->Front_model->get_admission_form();
		$data['qualification'] = $this->Front_model->get_my_qualification();
		$this->load->view('front/admission_form', $data);
	}
	public function id_card()
	{
		$this->check_login();
		$data['admission'] = $this->Front_model->get_admission_form();
		$this->load->view('front/id_card', $data);
	}
	public function student_qualification_details()
	{
		$this->check_login();
		$data['qualification'] = $this->Front_model->get_my_qualification();
		// echo "<pre>";print_r($data['qualification']);exit;
		$this->load->view('front/student_qualification_details', $data);
	}
	public function student_password()
	{
		$this->check_login();
		$this->form_validation->set_rules("new_password", "New password", "required");
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('front/student_password');
		} else {
			$res = $this->Front_model->change_password();
			if ($res) {
				$this->session->set_flashdata("success", "Password change successfully!");
				redirect('student_logout');
			} else {
				$this->session->set_flashdata("message", "Enter correct current password !");
				redirect('student-password');
			}
		}
	}
	public function e_library(){
		$this->check_login();
		$data['book'] = $this->Front_model->get_all_ebook();
		$this->load->view('front/e_library', $data);
	}
	public function book_visit_appoinment(){  
		$this->form_validation->set_rules('enrollment_number','enrollment number','required'); 
		if($this->form_validation->run() === FALSE){  
			$this->load->view("front/book_visit_appoinment"); 
		}else{ 
			$res = $this->Front_model->set_visit_appoinment(); 
			if($res){ 
				redirect('thank_you_for_visit_appoinment'); 
			}else{ 
				$this->session->set_flashdata('message','Your Appointment is already booked'); 
				redirect('book_visit_appoinment'); 
			} 
		}   
	} 
	public function thank_you_for_visit_appoinment(){  
		$this->load->view("front/thank_you_for_visit_appoinment");  
	}
	public function upload_assessment(){
		$this->check_login();
		if ($this->input->post('save') == "Upload Form") {
			$self_assement = "";
			if ($_FILES['userfile']['name'] != "") {
				$allowed = array('pdf', 'png', 'jpg');
				$filename = $_FILES['userfile']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if (!in_array($ext, $allowed)) {
					die('error');
				}
				$tmp = explode('.', $_FILES['userfile']['name']);
				$ext = end($tmp);
				$name = $this->session->userdata('student_id') . "-" . $this->input->post('year_sem');
				// echo "<pre>";print_r($name);exit;
				$self_assement = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "uploads/assesment_form/self_assement/");
			}
			$this->Front_model->upload_self_assesment($self_assement);
			$this->session->set_flashdata('success', 'Assesment uploaded successfully!');
			redirect('upload_assessment/' . $this->input->post('page_tab'));
		}
		if ($this->input->post('teacher') == "Upload Form") {
			$teacher_assement = "";
			if ($_FILES['userfile']['name'] != "") {
				$teacher_assement = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "uploads/assesment_form/teacher_assement/");
			}
			$this->Front_model->upload_teacher_assesment($teacher_assement);
			$this->session->set_flashdata('success', 'Assesment uploaded successfully!');
			redirect('upload_assessment/' . $this->input->post('page_tab'));
		}
		if ($this->input->post('assignement') == "Upload Form") {
			$assignment = "";
			if ($_FILES['userfile']['name'] != "") {
				$assignment = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "uploads/assesment_form/assignment/");
			}
			$this->Front_model->upload_assignment($assignment);
			$this->session->set_flashdata('success', 'Assignment uploaded successfully!');
			redirect('upload_assessment/' . $this->input->post('page_tab'));
		}
		if ($this->input->post('industrial') == "Upload Form") {
			$industrial = "";
			if ($_FILES['userfile']['name'] != "") {
				$industrial = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "uploads/assesment_form/industry_assesment/");
			}
			$this->Front_model->upload_industrial($industrial);
			$this->session->set_flashdata('success', 'Assesment uploaded successfully!');
			redirect('upload_assessment/' . $this->input->post('page_tab'));
		}
		if ($this->input->post('guardian') == "Upload Form") {
			$guardian = "";
			if ($_FILES['userfile']['name'] != "") {
				$guardian = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "uploads/assesment_form/industry_assesment/");
			}
			$this->Front_model->upload_guardian($guardian);
			$this->session->set_flashdata('success', 'Assesment uploaded successfully!');
			redirect('upload_assessment/' . $this->input->post('page_tab'));
		}
		$data['self_assement'] = $this->Front_model->get_my_self_assesment();
		$data['teacher_assement'] = $this->Front_model->get_my_teacher_assesment();
		$data['assignment'] = $this->Front_model->get_assignment();
		$data['industrial'] = $this->Front_model->get_industrial();
		$data['guardian'] = $this->Front_model->get_guardian();
		// echo"<pre>";print_r($data['self_assement']);exit();


		// $data['self_assessment'] =$this->Front_model->get_self_assessment_record();
		$this->load->view('front/upload_assessment', $data);
	}



	public function my_results()
	{
		$this->check_login();
		$data['result'] = $this->Front_model->get_my_all_result();
		$this->load->view('front/my_results', $data);
	}
	public function show_my_result()
	{
		$this->check_login();
		$data['result'] = $this->Front_model->get_this_result();
		$this->load->view('front/show_my_result', $data);
	}
	public function marksheets()
	{
		$this->check_login();
		$data["result"] = $this->Front_model->get_all_student_marksheet();
		// echo "<pre>";print_r($data['result']);exit;
		$this->load->view('front/SimpleFunctions');
		$this->load->view('front/marksheets', $data);
	}
	public function print_marksheet()
	{
		$this->check_login();
		$data['marksheet'] = $this->Front_model->get_print_new_marksheet();
		// echo "<pre>";print_r($data['marksheet']);exit;
		/*$data['marksheet'] = $this->Front_model->get_single_marksheet(); 
		if($data['marksheet']->student_id == $this->session->userdata("student_id")){
		    $this->load->view('front/SimpleFunctions');
			$this->load->view('front/marksheet',$data);
		}*/
	}

	public function show_my_course_marksheet()
	{
		$this->check_login();
		$data['marksheet_result'] = $this->Students_model->get_single_coursework_marksheet();
		$data['subject_details'] = $this->Students_model->get_course_work_marksheet_details($this->uri->segment(2));
		$this->load->view('front/SimpleFunctions');
		$this->load->view('front/coursework_marksheet', $data);
	}
	public function print_course_work_marksheet()
	{
		$this->check_login();
		$data['marksheet_result'] = $this->Front_model->get_single_marksheet_result_course_work();
		// echo "<pre>";print_r($data['marksheet_result']);exit;
		//$data['subject_details'] = $this->Students_model->get_course_work_marksheet_details();
		$this->load->view('front/SimpleFunctions');
		$this->load->view('front/print_course_work_marksheet', $data);
	}
	public function want_help()
	{
		$this->check_login();
		$this->form_validation->set_rules("feedback", "query/feedback", "required");
		if ($this->form_validation->run() === FALSE) {
			$data['feedback'] = $this->Front_model->get_all_feedback();
			$this->load->view('front/want_help', $data);
		} else {
			if ($this->Front_model->set_feedback()) {
				$this->session->set_flashdata("success", "Enquiry Recived We Will Get U Soon!");
				redirect("want_help");
			} else {
				$this->session->set_flashdata("message", "Error!");
				redirect("want_help");
			}
		}
	}
	/*public function latter_of_recommendation(){
		$data["recommendation"] = $this->Front_model->get_recommendation_letter();
		$this->load->view("front/latter_of_recommendation",$data);
	}*/
	/*public function pay_recommendation_letter_fees(){ 
		$data['student_fees'] = $this->Front_model->set_pay_recommendation_letter_fees();  
		/*$data['payment_details'] = array( 
			'id' 			=> $data['student']->id,          // Transfer table id 
			'email' 		=> $data['student']->email,           
			'mobile' 		=> $data['student']->mobile, 
			'student_name' 	=> $data['student']->student_name, 
			'total_fees' 	=> $data['student']->amount, 
		); 
		$freecharge_data = $this->payvia_freecharge_recommendation_letter_fees($data['payment_details']);   
		$data['req'] = $freecharge_data;   
		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
	//$this->load->view('front/recommendation_letter_payment',$data); 
	//	}


	/*public function print_recommendation_letter(){ 
	    $data["recommendation"] = $this->Front_model->get_recommendation_letter();
		$this->load->view('front/print_recommendation_letter',$data); 
	}*/

	public function student_provisional_degree()
	{
		$this->check_login();
		$data["provisional_degree"] = $this->Front_model->get_student_provisional_degree();
		$data["division"] = $this->Front_model->get_student_division_for_degree();
		$data['result_data'] = $this->Front_model->get_my_all_result();
		// echo "<pre>";print_r($data['result_data']);exit;
		$this->load->view("front/student_provisional_degree", $data);
	}
	public function print_provisional_degree()
	{
		$this->check_login();
		$data['provisional_degree'] = $this->Front_model->get_print_provisional_degree_certificate_regular_student_login();

		// echo "<pre>";print_r($data['provisional_degree']);exit;
		/*$data["provisional_degree"] = $this->Front_model->get_student_provisional_degree();
		$data["division"] = $this->Front_model->get_student_division_for_degree(); 
		$this->load->view("front/print_provisional_degree",$data);*/
	}
	public function accept_provisional_undertaking()
	{
		$this->check_login();
		$this->Front_model->send_provisional_terms();
		$this->load->view('front/accept_provisional_undertaking');
	}
	public function pay_provisional_degree_fees()
	{
		$data['student_fees'] = $this->Front_model->set_pay_provisional_degree_fees();
		// print_r($data['student']);exit; 
		/*$data['payment_details'] = array( 
			'id' 			=> $data['student']->id,
			'email' 		=> $data['student']->email,           
			'mobile' 		=> $data['student']->mobile, 
			'student_name' 	=> $data['student']->student_name, 
			'total_fees' 	=> $data['student']->amount, 
		);  
		$freecharge_data = $this->payvia_freecharge_provisional_degree_fees($data['payment_details']); 
		$data['req'] = $freecharge_data;  
		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		$this->load->view('front/provisional_degree_payment', $data);
	}
	public function student_provisional_ccavRequestHandler()
	{
		$this->load->view('front/student_provisional_ccavRequestHandler');
	}
	public function student_provisional_ccavResponseHandler()
	{
		$this->load->view('front/student_provisional_ccavResponseHandler');
	}


	public function student_degree()
	{
		$this->check_login();
		$data["degree"] = $this->Front_model->get_student_degree();
		$data["division"] = $this->Front_model->get_student_division_for_degree();
		//if($data["division"]['date'] >=2023){
		//$this->session->set_flashdata('message','You are not eligible for degree');
		//redirect('dashboard'); 
		//}
		$data['result_data'] = $this->Front_model->get_my_all_result();
		// echo "<pre>";print_r($data['result_data']);exit;
		$this->load->view("front/student_degree", $data);
	}
	public function accept_degree_undertaking()
	{
		$this->check_login();
		$this->Front_model->send_degree_terms();
		$this->load->view('front/accept_degree_undertaking');
	}
	public function pay_degree_fees()
	{
		$data['student_fees'] = $this->Front_model->set_pay_degree_fees();
		// print_r($data['student']);exit; 
		/*$data['payment_details'] = array( 
			'id' 			=> $data['student']->id,
			'email' 		=> $data['student']->email,           
			'mobile' 		=> $data['student']->mobile, 
			'student_name' 	=> $data['student']->student_name, 
			'total_fees' 	=> $data['student']->amount, 
		);  
		$freecharge_data = $this->payvia_freecharge_provisional_degree_fees($data['payment_details']); 
		$data['req'] = $freecharge_data;  
		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		$this->load->view('front/degree_payment', $data);
	}
	public function student_degree_ccavRequestHandler()
	{
		$this->load->view('front/student_degree_ccavRequestHandler');
	}
	public function student_degree_ccavResponseHandler()
	{
		$this->load->view('front/student_degree_ccavResponseHandler');
	}
	public function print_degree()
	{
		$this->check_login();
		$this->Front_model->get_print_degree_certificate_regular_studnet_login();
		/*$data["degree"] = $this->Front_model->get_student_degree();
		$data["division"] = $this->Front_model->get_student_division_for_degree_new_degree();
		$this->load->view("front/print_degree",$data);*/
	}
	/*
	
	
	 
	
	*/


	public function transfer_certificate()
	{
		// $this->check_login();
		// $userfile = ""; 
		// if($this->input->post('upload') == "Upload"){
		// 	if($_FILES['userfile']['name'] !=""){
		// 			$userfile = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/pcc");
		// 			$this->Front_model->set_ppc_report($userfile);
		// 		}
		// 	}
		$data["transfer"] = $this->Front_model->get_transfer_certificate();
		$this->load->view("front/transfer_certificate", $data);
	}

	public function print_transfer_certificate()
	{
		$this->check_login();
		$this->Front_model->get_printing_transfer_certificate_student_login();
		/*$data["transfer"] = $this->Front_model->get_transfer_certificate();
		$this->load->view("front/print_transfer_certificate",$data);*/
	}

	public function accept_transfer_undertaking()
	{
		$this->check_login();
		$this->Front_model->send_accept_transfer_undertaking();
		$this->load->view('front/accept_transfer_undertaking');
	}
	public function pay_transfer_certificate_fees()
	{
		$data['transfer'] = $this->Front_model->set_pay_transfer_certificate_fees();
		/*$data['payment_details'] = array(  
			'id' 			=> $data['student']->id,           
			'email' 		=> $data['student']->email,         
			'mobile' 		=> $data['student']->mobile, 
			'student_name' 	=> $data['student']->student_name, 
			'total_fees' 	=> $data['student']->amount, 
		);  
		$freecharge_data = $this->payvia_freecharge_transfer_certificate_fees($data['payment_details']);
		$data['req'] = $freecharge_data;
		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		$this->load->view('front/transfer_certificate_payment', $data);
	}
	public function student_transfer_ccavRequestHandler()
	{
		$this->load->view('front/student_transfer_ccavRequestHandler');
	}
	public function student_transfer_ccavResponseHandler()
	{
		$this->load->view('front/student_transfer_ccavResponseHandler');
	}
	public function transcript_application()
	{
		$this->check_login();
		$this->form_validation->set_rules('enrollment_number', 'enrollment number', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['student_details'] = $this->Front_model->get_admission_form();
			$data['transcript'] = $this->Front_model->get_transcript();
			// echo "<pre>";print_r($data['transcript']);exit;
			if ($data['student_details']->center_id == 9) {
				$data['consolidated'] = $this->Front_model->get_my_consolidated_marksheet();
				if (!empty($data['consolidated'])) {
					$data['consolidated_details'] = $this->Front_model->get_consolidated_marksheet_details($data['consolidated']->id);
				}
			} else {
				$data['consolidated_details'] = $this->Front_model->get_subject_result_for_transcript($data['student_details']->id);
				// echo "<pre>";print_r($data['consolidated_details']);exit;
			}

			$this->load->view('front/transcript_application', $data);
		} else {
			$this->Front_model->set_transcript_form();
			$this->session->set_flashdata('success', 'Transcript application submitted successfull!');
			redirect('pay_transcrip_certificate_fees');
		}
	}
	public function pay_transcrip_certificate_fees()
	{
		$this->check_login();
		$data['transcript'] = $this->Front_model->get_transcript();
		$this->load->view('front/transcript_payment', $data);
	}
	public function student_transcript_ccavRequestHandler()
	{
		$this->load->view('front/student_transcript_ccavRequestHandler');
	}
	public function student_transcript_ccavResponseHandler()
	{
		$this->load->view('front/student_transcript_ccavResponseHandler');
	}
	public function print_transcript()
	{
		$this->check_login();
		$data['transcript'] = $this->Front_model->get_print_transcript_list_student_login();

		// echo "<pre>";print_r($data['transcript']);exit;
		/*$data['transcript'] = $this->Front_model->get_print_transcript();
	    $this->load->view('front/print_transcript',$data);*/
	}
	public function migration_certificate()
	{
		$this->check_login();
		$data["migration"] = $this->Front_model->get_migration_certificate();
		// echo "<pre>";print_r($data['migration']);exit;
		$this->load->view("front/migration_certificate", $data);
	}

	public function print_migration_certificate()
	{
		$this->check_login();
		$this->Front_model->print_migration_certificate_regular_student_login();
		/*$data["migration"] = $this->Front_model->get_migration_certificate(); 
		$this->load->view("front/print_migration_certificate",$data);*/
	}



	public function upload_old_migration_certificate()
	{
		if ($this->input->post('save') == "Upload_Form") {
			$file = "";
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
			$file = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "uploads/migration_certificate/");
			// $result=$this->Admin_model->add_course($file);
		}
		// echo $file;exit();
		$this->Front_model->upload_old_migration_certificate($file);
		$this->session->set_flashdata('success', 'Migration certificate uploaded successfully!');
		redirect('migration-certificate');
	}
	public function accept_migration_undertaking()
	{
		$this->check_login();
		$this->Front_model->send_accept_migration_undertaking();
		$this->load->view('front/accept_migration_undertaking');
	}
	public function pay_migration_certificate_fees()
	{
		$data['migration'] = $this->Front_model->set_pay_migration_certificate_fees();
		/*$data['payment_details'] = array( 
			'id' 			=> $data['student']->id, // migration table id 
			'email' 		=> $data['student']->email, 
			'mobile' 		=> $data['student']->mobile, 
			'student_name' 	=> $data['student']->student_name, 
			'total_fees' 	=> $data['student']->amount, 
		); 
		$freecharge_data = $this->payvia_freecharge_migration_certificate_fees($data['payment_details']); 
		$data['req'] = $freecharge_data; 
		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		$this->load->view('front/migration_certificate_payment', $data);
	}
	public function student_migration_ccavResponseHandler()
	{
		$this->load->view('front/student_migration_ccavResponseHandler');
	}
	public function student_migration_ccavRequestHandler()
	{
		$this->load->view('front/student_migration_ccavRequestHandler');
	}
	public function student_consolidate_student_marksheet()
	{
		$this->check_login();
		$data['consolidate'] = $this->Front_model->get_my_consolidated_marksheet();
		$data["exist"] = $this->Front_model->get_exist_consolidate_form();
		if (!empty($data["exist"]) && $data["exist"]->payment_status == "0") {
			redirect('pay_consolidate_student_fees/' . base64_encode($data["exist"]->id));
		}
		$this->load->view('front/student_consolidate_student_marksheet', $data);
	}
	public function print_consolidate_student_marksheet()
	{
		$this->check_login();
		$this->Front_model->get_single_print_consolidate_regular_student_login();
		/*$data['marksheet'] = $this->Front_model->get_admission_form();
		$data['marksheet_id'] = $this->Front_model->get_single_consolidated_markshhet();
		$this->load->view('front/print_consolidate_student_marksheet',$data);*/
	}
	public function my_online_study()
	{
		$this->check_login();
		$data['topic'] = $this->Front_model->get_my_topic();
		$this->load->view('front/my_online_study', $data);
	}
	public function read_topic()
	{
		$this->check_login();
		$data['read_topic'] = $this->Front_model->get_single_my_topic();
		if (!empty($data['read_topic'])) {
			$data['pdf'] = $this->Front_model->get_topic_pdf();
			$data['video'] = $this->Front_model->get_topic_video();
		}
		$this->load->view('front/read_topic', $data);
	}
	public function update_document()
	{
		$this->check_login();
		$this->form_validation->set_rules('identity_numer', 'Identity numer', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('front/update_document');
		} else {
			$identity_file = "";
			if ($_FILES['identity_file']['name'] != "") {
				$identity_file = $this->Digitalocean_model->upload_photo($filename = "identity_file", $path = "images/student_identity_softcopy/");
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
			$res = $this->Front_model->update_student_document($identity_file);
			$this->session->set_flashdata("success", "Document updated successfully!");
			redirect('dashboard');
		}
	}
	public function upload_progress_report()
	{
		$this->check_login();
		if ($this->input->post('upload_report_1') == "upload_report_1") {
			$progress_report_one = "";
			if ($_FILES['progress_report_one']['name'] != "") {
				$progress_report_one = $this->Digitalocean_model->upload_photo($filename = "progress_report_one", $path = "images/progress_report/");
				$result = $this->Front_model->upload_progress_report_one($progress_report_one);
				$this->session->set_flashdata('success', 'Report uploaded successfully!');
				redirect('upload_progress_report');
			}
		}
		if ($this->input->post('upload_report_2') == "upload_report_2") {
			$progress_report_two = "";
			if ($_FILES['progress_report_two']['name'] != "") {
				$progress_report_two = $this->Digitalocean_model->upload_photo($filename = "progress_report_two", $path = "images/progress_report/");
				$result = $this->Front_model->upload_progress_report_two($progress_report_two);
				$this->session->set_flashdata('success', 'Report uploaded successfully!');
				redirect('upload_progress_report');
			}
		}
		if ($this->input->post('upload_report_3') == "upload_report_3") {
			$progress_report_three = "";
			if ($_FILES['progress_report_three']['name'] != "") {
				$progress_report_three = $this->Digitalocean_model->upload_photo($filename = "progress_report_three", $path = "images/progress_report/");
				$result = $this->Front_model->upload_progress_report_three($progress_report_three);
				$this->session->set_flashdata('success', 'Report uploaded successfully!');
				redirect('upload_progress_report');
			}
		}
		if ($this->input->post('upload_report_4') == "upload_report_4") {
			$progress_report_four = "";
			if ($_FILES['progress_report_four']['name'] != "") {
				$progress_report_four = $this->Digitalocean_model->upload_photo($filename = "progress_report_four", $path = "images/progress_report/");
				$result = $this->Front_model->upload_progress_report_four($progress_report_four);
				$this->session->set_flashdata('success', 'Report uploaded successfully!');
				redirect('upload_progress_report');
			}
		}
		if ($this->input->post('upload_report_5') == "upload_report_5") {
			$progress_report_five = "";
			if ($_FILES['progress_report_five']['name'] != "") {
				$progress_report_five = $this->Digitalocean_model->upload_photo($filename = "progress_report_five", $path = "images/progress_report/");
				$result = $this->Front_model->upload_progress_report_five($progress_report_five);
				$this->session->set_flashdata('success', 'Report uploaded successfully!');
				redirect('upload_progress_report');
			}
		}


		if ($this->input->post('upload_report_6') == "upload_report_6") {
			$progress_report_six = "";
			if ($_FILES['progress_report_six']['name'] != "") {
				$progress_report_six = $this->Digitalocean_model->upload_photo($filename = "progress_report_six", $path = "images/progress_report/");
				$result = $this->Front_model->upload_progress_report_six($progress_report_six);
				$this->session->set_flashdata('success', 'Report uploaded successfully!');
				redirect('upload_progress_report');
			}
		}
		$data['progress_report'] = $this->Front_model->get_my_progress_report_research();
		$this->load->view('front/upload_progree_report', $data);
	}
	//thesis,synopsis,abstract,progress report

	public function upload_thesis()
	{
		$this->check_login();
		$this->form_validation->set_rules('thesis_title', 'Thesis title', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['single_thesis'] = $this->Front_model->get_single_thesis_submission();
			$data['guide_data'] = $this->Front_model->get_active_guide_list();
			$this->load->view('front/thesis_submission_form', $data);
		} else {
			$file1 = '';
			$file1 = $this->Digitalocean_model->upload_photo($filename = "userfile2", $path = "images/thesis/");
			$res = $this->Front_model->insert_thesis_submission($file1);
			if ($res == 1) {
				$this->session->set_flashdata("success", "data added successfully!");
			} else {
				$this->session->set_flashdata('sucess', 'Data updated successfully!!');
			}
			redirect('upload_thesis');
		}
	}
	public function upload_synopsis()
	{
		$this->check_login();
		$this->form_validation->set_rules('thesis_title', 'Thesis title', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['single_synopsis_thesis'] = $this->Front_model->get_single_synopsis_thesis();
			$data['guide'] = $this->Front_model->get_active_guide_synopsis_list();
			$this->load->view('front/thesis_synopsis_submission_form', $data);
		} else {
			$file1 = '';
			$file1 = $this->Digitalocean_model->upload_photo($filename = "userfile1", $path = "images/thesis/");
			$res = $this->Front_model->insert_synopsis_thesis_submission($file1);
			if ($res == 1) {
				$this->session->set_flashdata("success", "data added successfully!");
			} else {
				$this->session->set_flashdata('sucess', 'Data updated successfully!!');
			}
			redirect('upload_synopsis');
		}
	}
	public function print_synopsis()
	{
		$this->Front_model->print_synopsis();
	}
	public function upload_abstract_report()
	{
		// $this->form_validation->set_rules('userfile2','Please upload file','required');
		// if($this->form_validation->run() === FALSE){
		// 	$data['single_abstract'] = $this->Front_model->get_single_abstract();
		// 	$this->load->view('front/abstract_form',$data);
		// }else{
		// 	$file1 ='';
		// 	$file1 = $this->Digitalocean_model->upload_photo($filename="userfile2",$path="images/abstract/");
		// 	$res = $this->Front_model->insert_abstract($file1);
		// 	if($res == 1){
		// 		$this->session->set_flashdata("success","data added successfully!");
		// 	}
		// 	redirect ('upload_abstract_report');
		// }
		if ($this->input->post('submit') == "submit") {
			$file1 = "";
			if ($_FILES['userfile2']['name'] != "") {
				$file1 = $this->Digitalocean_model->upload_photo($filename = "userfile2", $path = "images/abstract/");
				$result = $this->Front_model->insert_abstract($file1);
				$this->session->set_flashdata('success', 'Report uploaded successfully!');
				redirect('upload_abstract_report');
			}
		}
		$data['single_abstract'] = $this->Front_model->get_single_abstract();
		$this->load->view('front/abstract_form', $data);
	}

	public function exams()
	{
		$this->check_login();
		$data['exams'] = $this->Front_model->get_my_exams();
		$this->load->view('front/exams', $data);
	}
	public function start_capture()
	{
		$this->check_login();
		if ($this->input->post('submit') == "submit") {
			$img = $_POST['image'];
			if ($img == "") {
				$this->session->set_flashdata('message', 'Please take photo to proceed');
				redirect('start-capture/' . $this->input->post('exam'));
			}
			$folderPath = "exam_photo/";

			$image_parts = explode(";base64,", $img);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];

			$image_base64 = base64_decode($image_parts[1]);
			$fileName = uniqid() . '.png';

			$file = $folderPath . $fileName;
			file_put_contents($file, $image_base64);
			if ($fileName != "") {
				$this->Front_model->set_exam_photo($fileName, $this->input->post('exam'));
			} else {
				redirect('start-capture/' . $this->input->post('exam'));
			}
		}
		$this->load->view('front/start_capture');
	}
	public function start_exam()
	{
		$this->check_login();
		$this->form_validation->set_rules('exam_id', 'exam name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['exams'] = $this->Front_model->get_single_exams();
			$data['papaer_set'] = $this->Front_model->set_paper_set();

			$data['mcq'] = $this->Front_model->get_exam_paper_mcq($data['papaer_set']->paper_set, $data['papaer_set']->exam_id);
			$data['fill'] = $this->Front_model->get_exam_paper_fill($data['papaer_set']->paper_set, $data['papaer_set']->exam_id);
			$data['one_word'] = $this->Front_model->get_exam_paper_one_word($data['papaer_set']->paper_set, $data['papaer_set']->exam_id);
			$data['picture'] = $this->Front_model->get_exam_paper_picture($data['papaer_set']->paper_set, $data['papaer_set']->exam_id);
			$data['tick_mark'] = $this->Front_model->get_exam_paper_tick_mark($data['papaer_set']->paper_set, $data['papaer_set']->exam_id);
			$data['passage'] = $this->Front_model->get_exam_paper_passage($data['papaer_set']->paper_set, $data['papaer_set']->exam_id);
			$data['match'] = $this->Front_model->get_exam_paper_match($data['papaer_set']->paper_set, $data['papaer_set']->exam_id);
			$this->load->view('front/test_paper', $data);
		} else {
			$result = $this->Front_model->set_given_exam();
			redirect('submit-exam/' . $this->input->post("exam_id"));
		}
	}
	public function submit_exam()
	{
		$this->check_login();
		$this->load->view('front/submit_exam');
	}
	public function get_test_paper_question()
	{
		$this->check_login();
		$this->Front_model->get_test_paper_question();
	}





















	public function assesment()
	{
		$data['course'] = $this->Front_model->get_paid_course();
		$this->load->view('front/assesment', $data);
	}
	public function make_payment()
	{
		$data['order'] = $this->Front_model->get_complete_order();
		$this->load->view('front/make_payment', $data);
	}
	public function checkout_razorpay()
	{
		require_once('razorpay-php/Razorpay.php');
		$api = new Api('rzp_live_DNTSrfw6gp5eGs', 'reO1McX6XKA3vOcH8QgHYyEf');
		$payment = $api->payment->fetch($_REQUEST['razorpay_payment_id']);
		if ($payment->status == "authorized") {
			$payment = $this->Front_model->update_payment($this->input->post('hidden_id'), $payment->id);
		}
		$this->session->set_flashdata("success", "Thanks for purchasing the course. You can download the invoice from order and billing section.");
		redirect('dashboard-login');
	}
	public function exam_main()
	{
		$data['course'] = $this->Front_model->get_paid_course();
		$this->load->view('front/exam_main', $data);
	}
	public function result_main()
	{
		$data['course'] = $this->Front_model->get_paid_course();
		$this->load->view('front/result_main', $data);
	}
	public function certificate_main()
	{
		$this->load->view('front/certificate_main');
	}

	public function e_certificate()
	{
		$this->load->view('front/e_certificate');
	}
	public function exam()
	{
		if ($this->Front_model->check_for_payment()) {
			if ($this->Front_model->check_exam_attempt() < 4) {

				$this->load->view('front/test_paper');
			} else {
				$this->session->set_flashdata("message", "Sorry Your Attempts  Over");
				redirect('exam_main');
			}
		} else {
			$this->session->set_flashdata("message", "SORRY! You have not purchase this course");
			redirect('course_detail/' . $this->uri->segment(2));
		}
	}
	public function orders()
	{
		$this->load->view('front/orders');
	}
	public function get_receipt()
	{
		$this->load->view('front/receipt');
	}
	public function edit_account()
	{
		$this->form_validation->set_rules("first_name", "First name is required", "required");
		if ($this->form_validation->run() === FALSE) {
			$data['user'] = $this->Front_model->get_single_user_info();
			$this->load->view('front/edit_account', $data);
		} else {
			if ($this->Front_model->edit_account()) {
				$this->session->set_flashdata("success", "Account updated successfully!");
				redirect("edit-account");
			} else {
				$this->session->set_flashdata("message", "Account not updated!");
				redirect("edit-account");
			}
		}
	}

	public function faq()
	{
		$this->load->view('front/faq');
	}
	// public function learn(){
	// 	if($this->Front_model->check_for_payment()){
	// 		$data['topic']=$this->Front_model->get_course_data();
	// 		$this->load->view('front/learn',$data);
	// 	}else{
	// 		$this->session->set_flashdata("message","SORRY! You have not purchase this course");
	// 		redirect('course_detail/'.$this->uri->segment(2));
	// 	}
	// }
	public function product_detail()
	{
		$this->load->view('front/product_detail');
	}
	public function result()
	{
		$this->load->view('front/result');
	}
	public function get_certificate()
	{
		$this->load->view('front/get_certificate');
	}
	public function payment()
	{
		$this->form_validation->set_rules("email", "Email is required", "required");
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('front/payment');
		} else {
			if ($this->Front_model->register()) {
				$this->session->set_flashdata("success", "registeration done is successfully!");
				redirect("login");
			} else {
				$this->session->set_flashdata("message", "Email/Password is wrong !");
				redirect(base_url());
			}
		}
	}
	public function course()
	{
		// if($this->Front_model->check_for_payment()){
		$data['topic'] = $this->Front_model->get_course_data();
		$data['mcq_question'] = $this->Front_model->get_mcq_question_assessment();
		$data['picture_question'] = $this->Front_model->get_assessment_picture_question_list();
		$data['picture_question_img'] = $this->Front_model->get_assessment_picture();
		$data['assessment_passage'] = $this->Front_model->get_assessment_passage();
		$data['passage_question'] = $this->Front_model->get_assessment_passage_question_list();
		//echo "<pre>";
		//print_r($dataa);exit;
		$data['audio_list'] = $this->Front_model->get_assessment_audio_list();
		$data['audio_question'] = $this->Front_model->get_assessment_audio_mcq_question_list();
		$data['match_question'] = $this->Front_model->get_assessment_match_question_list();
		$this->load->view('front/learn', $data);
		// }
		// else{
		// 	$this->session->set_flashdata("message","SORRY! You have not purchase this course");
		// 	redirect('course_detail/'.$this->uri->segment(2));
		// }
	}
	public function conversation()
	{
		$data['conversation'] = $this->Front_model->get_conversation();
		$this->load->view('front/conversation', $data);
	}
	public function view_conversation()
	{
		$data['conversation'] = $this->Front_model->get_all_conversation_details();
		$this->load->view('front/view_conversation', $data);
	}
	public function my_videos()
	{
		$data['course'] = $this->Front_model->get_paid_course();
		$this->load->view('front/my_videos', $data);
	}
	public function video_gallery()
	{
		$data['video'] = $this->Front_model->get_all_course_video();
		$this->load->view('front/video_gallery', $data);
	}
	public function download_certificate()
	{

		//$this->load->view('front/get_certificate');
		$data['row'] = $this->Front_model->get_student_data_front($this->uri->segment(2));
		$data['course_name'] = $this->Front_model->get_course_name($this->uri->segment(3));

		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('front/download_certificate', $data, true);
		//echo "<pre>";
		//print_r($html);exit; 
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->defaultheaderline = 0;
		$mpdf->WriteHTML($html);

		$pdf_file_name = 'golinguistics_certificate.pdf';

		$mpdf->Output($pdf_file_name, 'D');
	}
	public function provisional_registration_letter()
	{
		$data["stu_data"] = $this->Front_model->get_stu_data();
		// echo "<pre>";print_r($data['stu_data']);exit;
		$this->load->view("front/provisional_registration_letter", $data);
	}


	public function latter_of_recommendation()
	{
		$data["recommendation"] = $this->Front_model->get_recommendation_letter();
		// echo "<pre>";print_r($data['recommendation']);exit;
		$this->load->view("front/latter_of_recommendation", $data);
	}
	public function pay_recommendation_letter_fees()
	{
		$data['student_fees'] = $this->Front_model->set_pay_recommendation_letter_fees();
		/*$data['payment_details'] = array( 
			'id' 			=> $data['student']->id,          // Transfer table id 
			'email' 		=> $data['student']->email,           
			'mobile' 		=> $data['student']->mobile, 
			'student_name' 	=> $data['student']->student_name, 
			'total_fees' 	=> $data['student']->amount, 
		); 
		$freecharge_data = $this->payvia_freecharge_recommendation_letter_fees($data['payment_details']);   
		$data['req'] = $freecharge_data;   
		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		$this->load->view('front/recommendation_letter_payment', $data);
	}
	public function student_recommendation_ccavRequestHandler()
	{
		$this->load->view('front/student_recommendation_ccavRequestHandler');
	}
	public function student_recommendation_ccavResponseHandler()
	{
		$this->load->view('front/student_recommendation_ccavResponseHandler');
	}
	public function print_recommendation_letter()
	{
		$this->Front_model->get_single_print_recom_regular_student_login();
		/*$data["single"] = $this->Front_model->get_recommendation_letter_print();
		$this->load->view('front/print_recommendation_letter',$data); */
	}

	public function second_latter_of_recommendation()
	{
		$data["recommendation"] = $this->Front_model->get_second_recommendation_letter();
		$data["first_recommendation"] = $this->Front_model->get_uploaded_lor();
		// echo "<pre>";print_r($data['first_recommendation']);exit;
		$this->load->view("front/second_latter_of_recommendation", $data);
	}
	public function second_pay_recommendation_letter_fees()
	{
		$data['student_fees'] = $this->Front_model->set_pay_second_recommendation_letter_fees();
		/*$data['payment_details'] = array( 
			'id' 			=> $data['student']->id,          // Transfer table id 
			'email' 		=> $data['student']->email,           
			'mobile' 		=> $data['student']->mobile, 
			'student_name' 	=> $data['student']->student_name, 
			'total_fees' 	=> $data['student']->amount, 
		); 
		$freecharge_data = $this->payvia_freecharge_recommendation_letter_fees($data['payment_details']);   
		$data['req'] = $freecharge_data;   
		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		$this->load->view('front/second_recommendation_letter_payment', $data);
	}
	public function second_student_recommendation_ccavRequestHandler()
	{
		$this->load->view('front/second_student_recommendation_ccavRequestHandler');
	}
	public function second_student_recommendation_ccavResponseHandler()
	{

		$this->load->view('front/second_student_recommendation_ccavResponseHandler');
	}
	public function second_print_recommendation_letter()
	{
		$this->Front_model->get_second_recommendation_letter_print_student_login();
		/*
	    $data["single"] = $this->Front_model->get_second_recommendation_letter_print(); 
		$this->load->view('front/second_print_recommendation_letter',$data); 
		*/
	}


	public function student_bonafide()
	{
		$data["bonafide"] = $this->Front_model->get_student_bonafide();
		// print_r($data["bonafide"]);exit();
		$this->load->view("front/student_bonafide", $data);
	}
	public function pay_bonafide_fees()
	{
		$data['student_fees'] = $this->Front_model->set_pay_bonafide_fees();
		// print_r($data["student_fees"]);exit();
		$this->load->view('front/pay_bonafide_fees', $data);
	}
	public function student_bonafide_ccavRequestHandler()
	{
		$this->load->view('front/student_bonafide_ccavRequestHandler');
	}
	public function student_bonafide_ccavResponseHandler()
	{
		$this->load->view('front/student_bonafide_ccavResponseHandler');
	}
	public function print_bonafide()
	{
		$this->Front_model->get_single_print_bonafied_regular_student_login();
		/*$data["single"] = $this->Front_model->get_single_bona_application_print();
		$data["division"] = $this->Front_model->get_student_division_for_degree();
		$this->load->view('front/print_bonafide',$data); */
	}


	public function bonafide_certificate_for_scholarship()
	{
		$data["bonafide"] = $this->Front_model->get_student_bonafide_scholarship();
		$this->load->view("front/bonafide_certificate_for_scholarship", $data);
	}
	public function pay_bonafide_scholarship_fees()
	{
		$data['student_fees'] = $this->Front_model->set_pay_bonafide_scholarship_fees();
		$this->load->view('front/pay_bonafide_scholarship_fees', $data);
	}
	public function student_bonafide_scholarship_ccavResponseHandler()
	{
		$this->load->view('front/student_bonafide_scholarship_ccavResponseHandler');
	}

	public function student_medium_inst()
	{
		$data["medium_inst"] = $this->Front_model->get_student_medium_inst();
		$this->load->view("front/student_medium_inst", $data);
	}
	public function pay_medium_inst_fees()
	{
		$data['student_fees'] = $this->Front_model->set_pay_medium_inst_fees();
		// echo "<pre>";print_r($data['student_fees']);exit;

		$this->load->view('front/pay_medium_inst_fees', $data);
	}
	public function student_medium_inst_ccavRequestHandler()
	{
		$this->load->view('front/student_medium_inst_ccavRequestHandler');
	}
	public function student_medium_inst_ccavResponseHandler()
	{
		$this->load->view('front/student_medium_inst_ccavResponseHandler');
	}
	public function print_cerdit_transfer_certificate()
	{
		$this->Front_model->print_credit_transfer_certificate();
		/*$data["single"] = $this->Front_model->get_single_medium_inst_application_print();
		$this->load->view('front/print_medium_inst',$data); */
	}

	public function print_medium_inst()
	{
		$this->Front_model->get_print_medium_inst_student_login();
		/*$data["single"] = $this->Front_model->get_single_medium_inst_application_print();
		$this->load->view('front/print_medium_inst',$data); */
	}

	public function student_no_backlog()
	{
		$data["no_backlog"] = $this->Front_model->get_student_no_backlog();
		$this->load->view("front/student_no_backlog", $data);
	}
	public function pay_no_backlog_fees()
	{
		$data['student_fees'] = $this->Front_model->set_pay_no_backlog_fees();
		$this->load->view('front/pay_no_backlog_fees', $data);
	}
	public function student_no_backlog_ccavRequestHandler()
	{
		$this->load->view('front/student_no_backlog_ccavRequestHandler');
	}
	public function student_no_backlog_ccavResponseHandler()
	{
		$this->load->view('front/student_no_backlog_ccavResponseHandler');
	}
	public function print_no_backlog()
	{
		$this->Front_model->get_single_no_backlog_application_print_student_login();
		/*$data["single"] = $this->Front_model->get_single_no_backlog_application_print();
		$data["division"] = $this->Front_model->get_student_division_for_degree(); 
		$this->load->view('front/print_no_backlog',$data); */
	}

	public function student_no_split()
	{
		$data["no_split"] = $this->Front_model->get_student_no_split();
		$this->load->view("front/student_no_split", $data);
	}
	public function pay_no_split_fees()
	{
		$data['student_fees'] = $this->Front_model->set_pay_no_split_fees();
		$this->load->view('front/pay_no_split_fees', $data);
	}
	public function student_no_split_ccavRequestHandler()
	{
		$this->load->view('front/student_no_split_ccavRequestHandler');
	}
	public function student_no_split_ccavResponseHandler()
	{
		$this->load->view('front/student_no_split_ccavResponseHandler');
	}
	public function print_no_split()
	{
		$this->Front_model->get_single_no_split_application_print_student_login();
		/*$data["single"] = $this->Front_model->get_single_no_split_application_print();
		$this->load->view('front/print_no_split',$data); */
	}


	public function student_character()
	{
		$this->check_login();
		$userfile = "";
		if ($this->input->post('upload') == "Upload") {
			if ($_FILES['userfile']['name'] != "") {
				$userfile = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "images/pcc");
				$this->Front_model->set_ppc_report($userfile);
			}
		}
		$data["character"] = $this->Front_model->get_student_character();
		// echo "<pre>";print_r($data['character']);exit;
		$this->load->view("front/student_character", $data);
	}
	public function pay_character_fees()
	{
		$data['student_fees'] = $this->Front_model->set_pay_character_fees();
		// echo "<pre>";print_r($data['student_fees']);exit;
		$this->load->view('front/pay_character_fees', $data);
	}
	public function student_character_ccavRequestHandler()
	{
		$this->load->view('front/student_character_ccavRequestHandler');
	}
	public function student_character_ccavResponseHandler()
	{
		$this->load->view('front/student_character_ccavResponseHandler');
	}
	public function print_character()
	{
		$this->Front_model->get_single_character_application_print_student_login();
		/*$data["single"] = $this->Front_model->get_single_character_application_print();
		$this->load->view('front/print_character',$data); */
	}


	public function apply_consolidate_student()
	{
		$this->form_validation->set_rules('student_id', 'student', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data["exams"] = $this->Front_model->get_consolidate_subject();
			$this->load->view('front/apply_consolidate_student', $data);
		} else {
			$this->Front_model->set_consolidate();
		}
	}
	public function pay_consolidate_student_fees()
	{
		$data["consolidate"] = $this->Front_model->get_single_consolidate();
		$data["student_details"] = $this->Front_model->get_student_details();
		$this->load->view('front/pay_consolidate_student_fees', $data);
	}
	public function student_consolidate_ccavRequestHandler()
	{
		$this->load->view('front/student_consolidate_ccavRequestHandler');
	}
	public function student_consolidate_ccavResponseHandler()
	{
		$this->load->view('front/student_consolidate_ccavResponseHandler');
	}
	public function upload_letter_of_recommendation()
	{
		$this->form_validation->set_rules('student_id', 'student', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['lor'] = $this->Front_model->get_uploaded_lor();
			$this->load->view('front/upload_lors', $data);
		} else {
			$lor = "";
			if ($_FILES['userfile']['name'] != "") {
				$lor = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "images/lor/");
				$result = $this->Front_model->set_uplod_lor($lor);
				$this->session->set_flashdata('success', 'Report uploaded successfully!');
				redirect('upload-letter-of-recommendation');
			}
		}
	}
	public function credit_transfer_certificate()
	{
		$data['credit_transfer'] = $this->Front_model->get_credit_transfer_certificate();
		$this->load->view('front/credit_transfer_certificate', $data);
	}
	public function pay_credit_transfer_certificate()
	{
		$data['student_fees'] = $this->Front_model->set_pay_credit_transfer_certificate();
		$this->load->view('front/pay_credit_transfer_certificate', $data);
	}
	public function credit_transfer_certificate_ccavRequestHandler()
	{
		$this->load->view('front/credit_transfer_certificate_ccavRequestHandler');
	}
	public function credit_transfer_certificate_ccavResponseHandler()
	{
		$this->load->view('front/credit_transfer_certificate_ccavResponseHandler');
	}


	public function set_scholar_details()
	{
		$this->form_validation->set_rules('guide_allocation_process', 'Allocation Process', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['single_student'] = $this->Front_model->get_scholar_details($this->session->userdata('student_id'));

			// echo "<pre>";print_r($data['single_student']);exit;
			$data['extra_details'] = $this->Front_model->get_scholar_extra_details($this->session->userdata('student_id'));
			// echo '<pre>';print_r($data['student']);exit();
			$this->load->view("front/scholar_details", $data);
		} else {
			$res = $this->Front_model->set_scholar_details();
			if ($res == 1) {
				$this->session->set_flashdata('success', 'Scholar details set successfully!');
			} else {
				$this->session->set_flashdata('message', 'Scholar not found!');
			}
			redirect('scholar-extra-details');
		}
	}
	public function student_self_Assessment_form()
	{
		$data['new'] = array();
		$this->form_validation->set_rules("student_name", "Student Name", "required");
		if ($this->form_validation->run() === FALSE) {
			$data['assement'] = $this->Front_model->get_single_student_self_assessment();
			$this->load->view('front/student_self_Assessment_form', $data);
		} else {
			$signature = '';
			if ($_FILES['signature']['name'] != "") {
				$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/signature/");
			}
			$this->Front_model->set_center_student_self_assessment($signature);
			$this->session->set_flashdata('success', 'Assessment Submitted Successfully');
			redirect('student_self_Assessment_form');
		}
	}
	public function student_assignment_form()
	{
		$data['student'] = array();
		$this->form_validation->set_rules('enrollment_number', 'enrollment number', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['assement'] = $this->Front_model->get_single_student_assignment();
			$this->load->view('front/student_assignment_form', $data);
		} else {
			$assignment = "";
			if ($_FILES['userfile']['name'] != "") {
				$assignment = $this->Digitalocean_model->upload_photo($filename = "userfile", $path = "uploads/assesment_form/assignment/");
			}
			$this->Front_model->set_student_assignment($assignment);
			$this->session->set_flashdata('success', 'Assignment uploaded successfully!');
			redirect('student_assignment_form');
		}
	}
	public function student_teacher_Assessment_form()
	{
		$this->form_validation->set_rules("student_name", "Student Name", "required");
		if ($this->form_validation->run() === FALSE) {
			$data['assement'] = $this->Front_model->get_single_teacher_assement();
			$this->load->view('front/student_teacher_Assessment_form', $data);
		} else {
			$signature = '';
			if ($_FILES['signature']['name'] != "") {
				$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/signature/");
			}
			$this->Front_model->set_center_student_teacher_assessment($signature);
			$this->session->set_flashdata('success', 'Assessment Submitted Successfully');
			redirect('student_teacher_Assessment_form');
		}
	}
	public function student_industry_Assessment_form()
	{
		$this->form_validation->set_rules("student_name", "Student Name", "required");
		if ($this->form_validation->run() === FALSE) {
			$data['assement'] = $this->Front_model->get_single_indestry_assment();
			$this->load->view('front/student_industry_Assessment_form', $data);
		} else {
			$signature = '';
			if ($_FILES['signature']['name'] != "") {
				$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/signature/");
			}
			$company_seal = '';
			if ($_FILES['company_seal']['name'] != "") {
				$company_seal = $this->Digitalocean_model->upload_photo($filename = "company_seal", $path = "images/logo/");
			}
			$this->Front_model->set_center_student_industry_assessment($signature, $company_seal);
			$this->session->set_flashdata('success', 'Assessment Submitted Successfully');
			redirect('student_industry_Assessment_form');
		}
	}
	public function student_parent_Assessment_form()
	{
		$data['center_student'] = array();

		$this->form_validation->set_rules("father_name", "Father Name", "required");
		if ($this->form_validation->run() === FALSE) {
			$data['assement'] = $this->Front_model->get_single_parent();
			$this->load->view('front/student_parent_Assessment_form', $data);
		} else {
			$signature = '';
			if ($_FILES['signature']['name'] != "") {
				$signature = $this->Digitalocean_model->upload_photo($filename = "signature", $path = "images/signature/");
			}
			$this->Front_model->set_center_student_parent_assessment($signature);
			$this->session->set_flashdata('success', 'Assessment Submitted Successfully');
			redirect('student_parent_Assessment_form');
		}
	}
}
