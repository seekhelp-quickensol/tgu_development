<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Center_details_model extends CI_Model{
	public function login(){
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('operation', '1');
		$this->db->where('start_date <=', date("Y-m-d"));
		$this->db->where('end_date >=', date("Y-m-d"));
		$this->db->where('head_email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));
		$result = $this->db->get('tbl_center');
		$result = $result->row();
		if (!empty($result)) {
			$data = array(
				'center_id' => $result->id
			);
			$this->session->set_userdata($data);
			return true;
		} else {
			return false;
		}
	}
	public function get_active_session()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('status_for_center', '1');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_session');
		return $result->result();
	}
	public function get_profile()
	{
		$this->db->where('id', $this->session->userdata('center_id'));
		$result = $this->db->get('tbl_center');
		return $result->row();
	}
	public function get_student_name_ajax()
	{
		$this->db->where('enrollment_number', $this->input->post('enrollment_number'));
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		if (!empty($result)) {
			echo $result->student_name;
		} else {
			echo "";
		}
	}
	public function set_center($photo, $adharcard, $mou)
	{
		if ($photo == "") {
			$photo = $this->input->post('old_photo');
		}
		if ($adharcard == "") {
			$adharcard = $this->input->post('old_adhar_card');
		}
		$data = array(
			'center_name' 				=> $this->input->post('center_name'),
			'head_name' 				=> $this->input->post('head_name'),
			'head_email' 				=> $this->input->post('head_email'),
			'head_contact_number' 		=> $this->input->post('head_contact_number'),
			'contact_person_name' 		=> $this->input->post('contact_person_name'),
			'contact_person_contact' 	=> $this->input->post('contact_person_contact'),
			'contact_person_email' 		=> $this->input->post('contact_person_email'),
			'address' 					=> $this->input->post('address'),
			'country' 					=> $this->input->post('country'),
			'state' 					=> $this->input->post('state'),
			'city' 						=> $this->input->post('city'),
			'pincode' 					=> $this->input->post('pincode'),
			'photo' 					=> $photo,
			'adhar_card' 				=> $adharcard,
		);
		$this->db->where('id', $this->session->userdata('center_id'));
		$this->db->update('tbl_center', $data);
		if ($mou != "") {
			$mou_data = array(
				'center_id' 	=> $this->input->post('id'),
				'mou' 			=> $mou,
				'added_date' 	=> date("Y-m-d"),
			);
			$this->db->insert('tbl_center_mous', $mou_data);
		}
		return true;
	}
	public function pending_center_student_verification_remark()
	{
		$data = array(
			'pending_remark' => $this->input->post('pending_remark'),
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function get_center_unique_email()
	{
		$this->db->where('head_email', $this->input->post('head_email'));
		$this->db->where('id !=', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_center');
		echo $result->num_rows();
	}
	public function get_center_unique_contact_number()
	{
		$this->db->where('head_contact_number', $this->input->post('head_contact_number'));
		$this->db->where('id !=', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_center');
		echo $result->num_rows();
	}
	public function forgot_password()
	{
		$this->db->where('head_email', $this->input->post('email'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('operation', '1');
		$result = $this->db->get('tbl_center');
		$result = $result->row();
		$password = rand();
		if (!empty($result)) {
			$data = array(
				'password' => md5($password)
			);
			$this->db->where('id', $result->id);
			$this->db->update('tbl_center', $data);
			$message = "Dear " . $result->head_name . ",<br> below are the login details to continue.<br>";
			$message .= "<br>URL: " . base_url() . "center-access";
			$message .= "<br>Username: " . $result->head_email;
			$message .= "<br>Password: " . $password;
			$message .= "<br>Regards<br>IT Team";
			$to = array(
				"email" => $result->head_email,
				"name" => $result->head_name,
			);
			$subject = 'New Password |' . no_reply_name;
			$this->Admin_model->send_send_blue($to, $subject, $message);
			return true;
		} else {
			return false;
		}
	}
	public function get_old_password()
	{
		$this->db->where('id', $this->session->userdata('center_id'));
		$this->db->where('password', md5($this->input->post('old_password')));
		$result = $this->db->get('tbl_center');
		echo $result->num_rows();
	}
	public function set_center_password()
	{
		$data = array(
			'password' => md5($this->input->post('new_password'))
		);
		$this->db->where('id', $this->session->userdata('center_id'));
		$this->db->update('tbl_center', $data);
		return true;
	}
	public function set_registration($photo, $noc, $identity_file, $permission_letter, $undertaking,$affidavit_file)
	{
		// echo "<pre>";print_r($_POST);exit;
		$center = $this->get_profile();
		$this->db->select('id,faculty,course_type,course_mode');
		$this->db->where('course', $this->input->post('course'));
		$this->db->where('stream', $this->input->post('stream'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$course = $this->db->get('tbl_course_stream_relation');
		$course = $course->row();
		// $late_fee = $this->Web_model->get_lateral_entry_fees();
		$this->db->where('id', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$fees_result = $this->db->get('tbl_center');
		$fees_result = $fees_result->row();
		$lateral_entry_fees = 0;
		$admission_type = $this->input->post('admission_type');
		if ($this->input->post('year_sem') == "") {
			$year_sem = "1";
		} else {
			$year_sem = $this->input->post('year_sem');
		}
		if ($year_sem != "1") {
			$entry_year = $year_sem;
			// $lateral_entry_fees = $late_fee->fees_amount;
			$lateral_entry_fees = $fees_result->lateral_entry_fees;
		} else {
			$entry_year = "0";
		}
		if (empty($course)) {
			$this->session->set_flashdata('message', 'Something went wrong, please fill form again!');
			redirect('center_new_admisison');
		}
		$data = array(
			'center_id' 		=> $this->session->userdata('center_id'),
			'session_id' 		=> $this->input->post('session'),
			'faculty_id' 		=> $course->faculty,
			'course_type' 		=> $course->course_type,
			'course_mode' 		=> $this->input->post('course_mode'),
			'course_id' 		=> $this->input->post('course'),
			'stream_id' 		=> $this->input->post('stream'),
			'year_sem' 			=> $year_sem,
			'student_name' 		=> $this->input->post('student_name'),
			'father_name' 		=> $this->input->post('father_name'),
			'father_profession' => $this->input->post('father_profession'),
			'mother_name' 		=> $this->input->post('mother_name'),
			'date_of_birth' 	=> date("Y-m-d", strtotime($this->input->post('date_of_birth'))),
			'mobile' 			=> $this->input->post('mobile'),
			'email' 			=> $this->input->post('email'),
			'id_type' 			=> $this->input->post('id_type'),
			'id_number' 		=> $this->input->post('identity_numer'),
			'identity_softcopy' => $identity_file,
			'photo' 			=> $photo,
			'noc'               => $noc,
			'permission_letter' => $permission_letter,
			'undertaking' 		=> $undertaking,
			'affidavit_file' 	=> $affidavit_file, 
			'gender' 			=> $this->input->post('gender'),
			'category' 			=> $this->input->post('category'),
			'religion' 			=> $this->input->post('religion'),
			'religin_specify' 	=> $this->input->post('religin_specify'),
			'address' 			=> $this->input->post('address'),
			'nationality' 		=> $this->input->post('nationality'),
			'country' 			=> $this->input->post('country'),
			'state' 			=> $this->input->post('state'),
			'city'	 			=> $this->input->post('city'),
			'pincode' 			=> $this->input->post('pincode'),
			'study_mode' 		=> $this->input->post('study_mode'),
			'employement_type' 	=> $this->input->post('employement_type'),
			'credit_note' 		=> $this->input->post('credit_note'),
			'payment_term'		=> $this->input->post('payment_term'),
			'abc_apaar_id' 		=> $this->input->post('abc_apaar_id'),
			'admission_type' 	=> $admission_type,
			'lateral_year' 		=> $entry_year,
			'admission_date' 	=> date("Y-m-d"),
			'created_on' 		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_student', $data);
		$id = $this->db->insert_id();
		$prefix = rand(10000, 99999);
		$this->db->where('id', $id);
		$student_details = $this->db->get("tbl_student");
		$student_details = $student_details->row();
		$this->db->where('id', $student_details->faculty_id);
		$faculty = $this->db->get('tbl_faculty');
		$faculty = $faculty->row();
		$this->db->where('faculty', $student_details->faculty_id);
		$this->db->where('course', $student_details->course_id);
		$this->db->where('stream', $student_details->stream_id);
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$course_code = $this->db->get('tbl_course_stream_relation');
		$course_code = $course_code->row();
		$this->db->where('id', $this->session->userdata('center_id'));
		$center_details = $this->db->get("tbl_center");
		$center_details = $center_details->row();
		$this->db->where('id', $student_details->session_id);
		$session_year = $this->db->get('tbl_session');
		$session_year = $session_year->row();
		$session_date = $lastTwoDigits1 = substr($session_year->session_name, -2);
		$enrollment = "";
		$enrollment .= $session_date;
		if (!empty($center_details)) {
			//$enrollment .= $center_details->center_code;
		}
		if (!empty($course_code)) {
			$enrollment .= $course_code->course_code;
		}
		if (!empty($faculty)) {
			//$enrollment .= $faculty->faculty_code; 
		}
		$last_digit = 10000;
		if (strlen($student_details->id) == "1") {
			$last_digit = 10000;
		}
		if (strlen($student_details->id) == "2") {
			$last_digit = 1000;
		}
		if (strlen($student_details->id) == "3") {
			$last_digit = 100;
		}
		if (strlen($student_details->id) == "4") {
			$last_digit = 10;
		}
		if (strlen($student_details->id) == "5") {
			$last_digit = 1;
		}
		if (strlen($student_details->id) == "6") {
			$last_digit = "";
		}
		$enrollment .= $last_digit . $student_details->id;
		$enorlled_data = array(
			'username' => $prefix . $id,
			'password' => $prefix . $id,
			'enrollment_number' => $enrollment,
			'enrollment_date' 	=> date("Y-m-d"),
		);
		$this->db->where('id', $id);
		$this->db->update("tbl_student", $enorlled_data);
		/*$late_fees = 0;
		$this->db->where('id',$this->input->post('session'));
		$this->db->where('late_fees_date<',date("Y-m-d"));
		$seesion_late = $this->db->get('tbl_session');
		$seesion_late = $seesion_late->row();
		if(!empty($seesion_late)){
			$late_fees = $seesion_late->late_fees;
		}
		 
		$fees = 0;
		$actual_fees = 0;
		$this->db->where('course_id',$this->input->post('course'));
		$this->db->where('stream_id',$this->input->post('stream'));
		$this->db->where('session_id',$this->input->post('session'));
		$this->db->where('center_id',$this->session->userdata('center_id'));
		$this->db->where('is_deleted','0');
		$fees_result = $this->db->get('tbl_center_fees');
		$fees_result = $fees_result->row();
		if(empty($fees_result)){
			$this->db->where('course_id',$this->input->post('course'));
			$this->db->where('stream_id',$this->input->post('stream'));
			$this->db->where('center_id',$this->session->userdata('center_id'));
			$this->db->where('is_deleted','0');
			$this->db->order_by('session_id','DESC');
			$fees_result = $this->db->get('tbl_center_fees');
			$fees_result = $fees_result->row();
		}
		
		if(!empty($fees_result)){
			$registration_fees = $fees_result->registration_fees;
			if($this->input->post('country') != "101"){
				if($center->payment_term == "1"){
					$fees = $fees_result->foregin_fees;
					$actual_fees = $fees_result->actual_fees;
				}else{
					$fees = $fees_result->foregin_fees/2;
					$actual_fees = $fees_result->actual_fees/2;
				}
			}else{
				if($center->payment_term == "1"){
					$fees = $fees_result->fees;
					$actual_fees = $fees_result->actual_fees;
				}else{
					$fees = $fees_result->fees/2;
					$actual_fees = $fees_result->actual_fees/2;
				}
			}
		}*/
		$actual_fees = 0;
		$this->db->where('course_id', $this->input->post('course'));
		$this->db->where('stream_id', $this->input->post('stream'));
		$this->db->where('session_id', $this->input->post('session'));
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$fees_result = $this->db->get('tbl_center_fees');
		$fees_result = $fees_result->row();
		if (empty($fees_result)) {
			$this->db->where('course_id', $this->input->post('course'));
			$this->db->where('stream_id', $this->input->post('stream'));
			$this->db->where('center_id', $this->session->userdata('center_id'));
			$this->db->where('is_deleted', '0');
			$this->db->order_by('session_id', 'DESC');
			$fees_result = $this->db->get('tbl_center_fees');
			$fees_result = $fees_result->row();
		}
		if (!empty($fees_result)) {
			if ($this->input->post('payment_term') == "1") {
				$actual_fees = $fees_result->actual_fees;
			} else {
				//if($this->input->post('course_mode') == "2"){
					$actual_fees = $fees_result->actual_fees / 2; 
				/*}else{ 
					$actual_fees = $fees_result->actual_fees;
				}*/
			}
		}
		$fees = $this->input->post('admission_fees');
		$late_fees = $this->input->post('late_fees');
		$lateral_entry_fees = $this->input->post('lateral_entry_fees');
		$registration_fees = $this->input->post('registration_fees');
		$bank_id = 1;
		$transaction_id = "";
		$payment_status = "0";
		// 		$his_id = "0";
		// 		if ($this->input->post('payment_mode') == "4") {
		// 			$wallet = $this->get_my_wallet_balance();
		// 			$fianal_calculation = $fees + $late_fees + $lateral_entry_fees + $registration_fees;
		// 			if ($wallet->amount >= $fianal_calculation) {
		// 				$payment_status = "1";
		// 				$transaction_id = $prefix . $id . date("Ymd");
		// 				$enorlled_data = array(
		// 					'admission_status' => "1",
		// 				);
		// 				$this->db->where('id', $id);
		// 				$this->db->update("tbl_student", $enorlled_data);
		// 				$wallet_amount = array(
		// 					'amount' => $wallet->amount - $fianal_calculation
		// 				);
		// 				$this->db->where('id', $wallet->id);
		// 				$this->db->update('tbl_center_wallet', $wallet_amount);
		// 				$wallet_history = array(
		// 					'center_id' 		=> $this->session->userdata('center_id'),
		// 					'transaction_type' 	=> '2',
		// 					'payment_status' 	=> '1',
		// 					'wallet_id' 		=> $wallet->id,
		// 					'amount' 			=> $fianal_calculation,
		// 					'payment_date' 		=> date("Y-m-d"),
		// 					'created_on' 		=> date("Y-m-d H:I:s"),
		// 					'transaction_id' 	=> $enrollment . ' - Enrolled new student',
		// 				);
		// 				$this->db->insert('tbl_center_wallet_history', $wallet_history);
		// 				$his_id = $this->db->insert_id();
		// 			} else {
		// 				$this->session->set_flashdata('message', 'Something went wrong, Please try again!');
		// 				redirect($_SERVER['HTTP_REFERER']);
		// 			}
		// 		}
		$fees_data = array(
			'student_id' 		=> $id,
			'fees_type' 		=> 1,
			'year_sem' 			=> $this->input->post('year_sem'),
			'payment_mode' 		=> $this->input->post('payment_mode'),
			'payment_date' 		=> date("Y-m-d"),
			'payment_status' 	=> $payment_status,
			'bank_id' 			=> $bank_id,
			'late_fees' 		=> $late_fees,
			'lateral_entry_fees' => $lateral_entry_fees,
			'bank_fees' 		=> 0,
			'transaction_id' 	=> $transaction_id,
			'registration_fees' => $registration_fees,
			'amount' 			=> $fees,
			'original_amount'	=> $actual_fees,
			'total_fees' 		=> $fees + $late_fees + $lateral_entry_fees + $registration_fees,
			'created_on' 		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_student_fees', $fees_data);
		$fees_id = $this->db->insert_id();
		// 		$update_wallet = array(
		// 			'his_id'		=> $his_id,
		// 		);
		// 		$this->db->where('id', $fees_id);
		// 		$this->db->update('tbl_student_fees', $update_wallet);
		if ($admission_type == "2") {
			redirect('add_credit_student_subject/' . base64_encode($id) . "/" . base64_encode($fees_id));
		}
		if ($this->input->post('payment_mode') == "2") {
			redirect('upload_student_qualification/' . base64_encode($id) . "/" . base64_encode($fees_id));
		} else {
			redirect('upload_student_qualification/' . base64_encode($id) . "/" . base64_encode($fees_id));
		}
	}
	public function pay_admission_via_wallet()
	{
		$prefix = rand(10000, 99999);
		$student = base64_decode($this->uri->segment(2));
		$fees_id =  base64_decode($this->uri->segment(3));
		$this->db->where('id', $student);
		$student_details = $this->db->get("tbl_student");
		$student_details = $student_details->row();
		$this->db->where('id', $fees_id);
		$fees = $this->db->get('tbl_student_fees');
		$fees = $fees->row();
		$wallet = $this->get_my_wallet_balance();
		$fianal_calculation = $fees->total_fees;
		if ($wallet->amount >= $fianal_calculation) {
			$this->db->where('id', $student_details->faculty_id);
			$faculty = $this->db->get('tbl_faculty');
			$faculty = $faculty->row();
			$this->db->where('faculty', $student_details->faculty_id);
			$this->db->where('course', $student_details->course_id);
			$this->db->where('stream', $student_details->stream_id);
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$course_code = $this->db->get('tbl_course_stream_relation');
			$course_code = $course_code->row();
			$this->db->where('id', $this->session->userdata('center_id'));
			$center_details = $this->db->get("tbl_center");
			$center_details = $center_details->row();
			$enrollment = "";
			if (!empty($center_details)) {
				//$enrollment .= $center_details->center_code;
			}
			if (!empty($course_code)) {
				$enrollment .= $course_code->course_code;
			}
			$enrollment .= date("y");
			if (!empty($faculty)) {
				//$enrollment .= $faculty->faculty_code; 
			}
			$last_digit = 10000;
			if (strlen($student_details->id) == "1") {
				$last_digit = 10000;
			}
			if (strlen($student_details->id) == "2") {
				$last_digit = 1000;
			}
			if (strlen($student_details->id) == "3") {
				$last_digit = 100;
			}
			if (strlen($student_details->id) == "4") {
				$last_digit = 10;
			}
			if (strlen($student_details->id) == "5") {
				$last_digit = 1;
			}
			if (strlen($student_details->id) == "6") {
				$last_digit = "";
			}
			$enrollment .= $last_digit . $student_details->id;
			$enorlled_data = array(
				'username' 			=> $prefix . $student,
				'password' 			=> $prefix . $student,
				'admission_status' 	=> "1",
				'enrollment_number' => $enrollment,
				'enrollment_date' 	=> date("Y-m-d"),
			);
			$this->db->where('id', $student);
			$this->db->update("tbl_student", $enorlled_data);
			$payment_status = "1";
			$transaction_id = $prefix . $student . date("Ymd");
			$fees_data = array(
				'payment_mode' 		=> '4',
				'payment_date' 		=> date("Y-m-d"),
				'payment_status' 	=> '1',
				'transaction_id' 	=> $transaction_id,
				'total_fees'		=> $fianal_calculation,
			);
			$this->db->where('id', $fees_id);
			$this->db->update('tbl_student_fees', $fees_data);
			$wallet_amount = array(
				'amount' => $wallet->amount - $fianal_calculation
			);
			$this->db->where('id', $wallet->id);
			$this->db->update('tbl_center_wallet', $wallet_amount);
			$wallet_history = array(
				'center_id' 		=> $this->session->userdata('center_id'),
				'transaction_type' 	=> '2',
				'payment_status' 	=> '1',
				'wallet_id' 		=> $wallet->id,
				'amount' 			=> $fianal_calculation,
				'payment_date' 		=> date("Y-m-d"),
				'created_on' 		=> date("Y-m-d H:I:s"),
				'transaction_id' 	=> $enrollment . ' - Enrolled new student',
			);
			$this->db->insert('tbl_center_wallet_history', $wallet_history);
			$his_id = $this->db->insert_id();
			$update_wallet = array(
				'his_id'		=> $his_id,
			);
			$this->db->where('id', $fees_id);
			$this->db->update('tbl_student_fees', $update_wallet);
			redirect('center_print_admission_form/' . base64_encode($student_details->id));
		} else {
			$this->session->set_flashdata('message', 'Something went wrong!');
			redirect('center_payment_failed_admisison');
		}
	}
	public function set_credit_student_subject($file)
	{
		$subject_code    = $this->input->post('subject_code');
		$subject_name    = $this->input->post('subject_name');
		$year_sem        = $this->input->post('year_sem');
		$internal_mark   = $this->input->post('internal_mark');
		$external_mark   = $this->input->post('external_mark');
		$total           = $this->input->post('total');
		$created_on      = date("Y-m-d H:i:s");
		$total_marks     = $this->input->post('total_marks');
		$grade     		 = $this->input->post('grade');
		$credit     	 = $this->input->post('credit');
		$result_val      = $this->input->post('result');
		$year_sem      = $this->input->post('year_sem');
		$count = count($subject_code);
		$data12 = array();
		for ($i = 0; $i < $count; $i++) {
			$data = array(
				"student_id"		=> $this->input->post('student_id'),
				"subject_code"	    => $subject_code[$i],
				"subject_name"	    => $subject_name[$i],
				"year_sem"          => $year_sem[$i],
				"internal_mark"	    => $internal_mark[$i],
				"external_mark"	    => $external_mark[$i],
				"total"		   	    => $total[$i],
				"total_marks"		=> $total_marks[$i],
				"grade"				=> $grade[$i],
				"credit"			=> $credit[$i],
				"result"			=> $result_val[$i],
				"created_on"        => $created_on,
				"added_by"        	=> $this->session->userdata('center_id'),
				"university_name"   => $this->input->post('result_university'),
				"result_file"   	=> $file,
				"is_other"   		=> '0',
			);
			$this->db->insert('tbl_student_credit_transfer_subjects', $data);
		}
		$this->db->where('id', $this->input->post('fees_id'));
		$res = $this->db->get('tbl_student_fees');
		$res = $res->row();
		if ($res->payment_mode == "2") {
			redirect('upload_student_qualification/' . base64_encode($this->input->post('student_id')) . "/" . base64_encode($this->input->post('fees_id')));
		} else {
			redirect('upload_student_qualification/' . base64_encode($this->input->post('student_id')) . "/" . base64_encode($this->input->post('fees_id')));
		}
	}
	public function update_qualification($secondary_marksheet, $sr_secondary_marksheet, $graduation_marksheet, $post_graduation_marksheet, $other_qualification_marksheet, $signature)
	{
		$data = array(
			'student_id' 						=> $this->input->post('student_id'),
			'secondary_year' 					=> $this->input->post('secondary_year'),
			'secondary_university' 				=> $this->input->post('secondary_university'),
			'secondary_marks' 					=> $this->input->post('secondary_marks'),
			'secondary_marksheet' 				=> $secondary_marksheet,
			'sr_secondary_year' 				=> $this->input->post('sr_secondary_year'),
			'sr_secondary_university' 			=> $this->input->post('sr_secondary_university'),
			'sr_secondary_marks' 				=> $this->input->post('sr_secondary_marks'),
			'sr_secondary_marksheet' 			=> $sr_secondary_marksheet,
			'graduation_year' 					=> $this->input->post('graduation_year'),
			'graduation_university' 			=> $this->input->post('graduation_university'),
			'graduation_marks' 					=> $this->input->post('graduation_marks'),
			'graduation_marksheet' 				=> $graduation_marksheet,
			'post_graduation_year' 				=> $this->input->post('post_graduation_year'),
			'post_graduation_university' 		=> $this->input->post('post_graduation_university'),
			'post_graduation_marks' 			=> $this->input->post('post_graduation_marks'),
			'post_graduation_marksheet' 		=> $post_graduation_marksheet,
			'other_qualification_year' 			=> $this->input->post('other_qualification_year'),
			'other_qualification_university' 	=> $this->input->post('other_qualification_university'),
			'other_qualification_marks' 		=> $this->input->post('other_qualification_marks'),
			'other_qualification_marksheet' 	=> $other_qualification_marksheet,
			'created_on' 						=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_student_qualification', $data);
		$signature_data = array(
			'signature' => $signature
		);
		$this->db->where('id', $this->input->post('student_id'));
		$this->db->update('tbl_student', $signature_data);
		if ($this->input->post('payment_mode') == "1") {
			redirect('center_admission_payment/' . base64_encode($this->input->post('student_id')) . "/" . base64_encode($this->input->post('fees_id')));
		} else if ($this->input->post('payment_mode') == "3") {
			redirect('center_admission_payment/' . base64_encode($this->input->post('student_id')) . "/" . base64_encode($this->input->post('fees_id')));
			// redirect('print_student_cash_boucher/'.base64_encode($this->input->post('student_id'))."/".base64_encode($this->input->post('fees_id')));
		} else if ($this->input->post('payment_mode') == "4") {
			$this->session->set_flashdata('success', 'Admission has been completed');
			redirect('center_pending_admission_list');
		} else {
			redirect('center_admission_payment/' . base64_encode($this->input->post('student_id')) . "/" . base64_encode($this->input->post('fees_id')));
			// redirect('print_student_challan/'.base64_encode($this->input->post('student_id'))."/".base64_encode($this->input->post('fees_id')));
		}
	}
	public function update_admission_payment()
	{
		$id = $this->input->GET('id');
		$this->db->where('student_id', $id);
		$this->db->order_by('id', 'DESC');
		$fees = $this->db->get('tbl_student_fees');
		$fees = $fees->row();
		if (isset($_REQUEST['status'])) {
			if ($_REQUEST['status'] == 'COMPLETED') {
				$data = array(
					'payment_id' 		=> $_REQUEST['txnId'],
					'payment_status' 	=> '1',
				);
				$this->db->where('id', $fees->id);
				$this->db->update('tbl_student_fees', $data);
				$this->db->where('id', $id);
				$student_details = $this->db->get("tbl_student");
				$student_details = $student_details->row();
				$this->db->where('id', $student_details->faculty_id);
				$faculty = $this->db->get('tbl_faculty');
				$faculty = $faculty->row();
				$this->db->where('faculty', $student_details->faculty_id);
				$this->db->where('course', $student_details->course_id);
				$this->db->where('stream', $student_details->stream_id);
				$this->db->where('is_deleted', '0');
				$this->db->where('status', '1');
				$course_code = $this->db->get('tbl_course_stream_relation');
				$course_code = $course_code->row();
				$enrollment = "20100";
				if (!empty($faculty)) {
					$enrollment .= $faculty->faculty_code;
				}
				if (!empty($course_code)) {
					$enrollment .= $course_code->course_code;
				}
				$enrollment .= $student_details->id;
				$enorlled_data = array(
					'admission_status' 	=> '1',
					'enrollment_number' => $enrollment,
					'enrollment_date' 	=> date("Y-m-d"),
				);
				$this->db->where('id', $id);
				$this->db->update("tbl_student", $enorlled_data);
			} else {
				$data = array(
					'transaction_id' =>  $_REQUEST['txnId'],
				);
				$this->db->where('id', $fees->id);
				$this->db->update('tbl_student_fees', $data);
			}
			$this->db->where('id', $id);
			$result = $this->db->get('tbl_student');
			return $result->row();
		} else {
			redirect(base_url());
		}
	}
	public function get_all_new_admission_pending_ajax($length, $start, $search)
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.verified_status', '0');
		$this->db->where('tbl_student.admission_status !=', '0');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.father_name', $search);
			$this->db->or_like('tbl_student.mother_name', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_id_management.id_name', $search);
			$this->db->or_like('tbl_student.id_number', $search);
			$this->db->or_like('tbl_student.gender', $search);
			$this->db->or_like('tbl_student.category', $search);
			$this->db->or_like('tbl_student.address', $search);
			$this->db->or_like('tbl_student.nationality', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_student.pincode', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_faculty.faculty_name', $search);
			$this->db->or_like('tbl_course_type.course_type', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id', 'DESC');
		$this->db->limit($length, $start);
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$result = $this->db->get('tbl_student');
		return $result->result();
	}
	public function get_all_new_admission_pending_count($search)
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.verified_status', '0');
		$this->db->where('tbl_student.admission_status !=', '0');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.father_name', $search);
			$this->db->or_like('tbl_student.mother_name', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_id_management.id_name', $search);
			$this->db->or_like('tbl_student.id_number', $search);
			$this->db->or_like('tbl_student.gender', $search);
			$this->db->or_like('tbl_student.category', $search);
			$this->db->or_like('tbl_student.address', $search);
			$this->db->or_like('tbl_student.nationality', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_student.pincode', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_faculty.faculty_name', $search);
			$this->db->or_like('tbl_course_type.course_type', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id', 'DESC');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$result = $this->db->get('tbl_student');
		return $result->num_rows();
	}
	public function get_all_admission_ajax($length, $start, $search)
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '1');
		$this->db->where('tbl_student.verified_status', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.father_name', $search);
			$this->db->or_like('tbl_student.mother_name', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_id_management.id_name', $search);
			$this->db->or_like('tbl_student.id_number', $search);
			$this->db->or_like('tbl_student.gender', $search);
			$this->db->or_like('tbl_student.category', $search);
			$this->db->or_like('tbl_student.address', $search);
			$this->db->or_like('tbl_student.nationality', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_student.pincode', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_faculty.faculty_name', $search);
			$this->db->or_like('tbl_course_type.course_type', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id', 'DESC');
		$this->db->limit($length, $start);
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$result = $this->db->get('tbl_student');
		return $result->result();
	}
	public function get_all_admission_count($search)
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '1');
		$this->db->where('tbl_student.verified_status', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.father_name', $search);
			$this->db->or_like('tbl_student.mother_name', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_id_management.id_name', $search);
			$this->db->or_like('tbl_student.id_number', $search);
			$this->db->or_like('tbl_student.gender', $search);
			$this->db->or_like('tbl_student.category', $search);
			$this->db->or_like('tbl_student.address', $search);
			$this->db->or_like('tbl_student.nationality', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_student.pincode', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_faculty.faculty_name', $search);
			$this->db->or_like('tbl_course_type.course_type', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id', 'ASC');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$result = $this->db->get('tbl_student');
		return $result->num_rows();
	}
	public function get_total_active_admission()
	{
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '1');
		$this->db->where('tbl_student.verified_status', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$result = $this->db->get('tbl_student');
		return $result = $result->num_rows();
	}
	public function get_pending_verification_admission()
	{
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.verified_status', '0');
		$this->db->where('tbl_student.admission_status !=', '0');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$result = $this->db->get('tbl_student');
		return $result = $result->num_rows();
	}
	public function get_total_failed_payment_admission()
	{
		$this->db->select('tbl_student.*,tbl_student_fees.id as fees_id');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '0');
		$this->db->where('tbl_student.verified_status', '0');
		$this->db->where('tbl_student_fees.payment_status', '0');
		$this->db->where('tbl_student_fees.fees_type', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_student_fees', 'tbl_student_fees.student_id = tbl_student.id');
		$result = $this->db->get('tbl_student');
		return $result = $result->num_rows();
	}
	public function get_total_passout_students()
	{
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '4');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$result = $this->db->get('tbl_student');
		return $result = $result->num_rows();
	}
	public function get_total_active_admission_center($month)
	{
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '1');
		$this->db->where('tbl_student.verified_status', '1');
		$this->db->where('MONTH(created_on)', $month);
		$this->db->where('YEAR(created_on)', date('Y'));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$result = $this->db->get('tbl_student');
		return $result = $result->num_rows();
	}
	public function get_total_passout_students_center($month)
	{
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '4');
		$this->db->where('MONTH(created_on)', $month);
		$this->db->where('YEAR(created_on)', date('Y'));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$result = $this->db->get('tbl_student');
		return $result = $result->num_rows();
	}
	public function get_total_failed_payment_admission_center($month)
	{
		$this->db->select('tbl_student.*, tbl_student_fees.id as fees_id');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '0');
		$this->db->where('tbl_student.verified_status', '0');
		$this->db->where('tbl_student_fees.payment_status', '0');
		$this->db->where('tbl_student_fees.fees_type', '1');
		$this->db->where('MONTH(tbl_student.created_on)', $month);
		$this->db->where('YEAR(tbl_student.created_on)', date('Y'));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_student_fees', 'tbl_student_fees.student_id = tbl_student.id');
		$result = $this->db->get('tbl_student');
		return $result = $result->num_rows();
		// echo "<pre>"; print_r($result); exit;
	}
	public function get_all_pending_re_registration_ajax($length, $start, $search)
	{
		$this->db->select("tbl_student.*,tbl_exam_results.result,tbl_center.center_name");
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '0');
		// $this->db->where('tbl_student.verified_status','1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_student.status', '1');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.father_name', $search);
			$this->db->or_like('tbl_student.mother_name', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_student.created_on', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id', 'DESC');
		$this->db->limit($length, $start);
		$this->db->join("tbl_exam_results", "tbl_exam_results.student_id=tbl_student.id AND tbl_exam_results.year_sem = tbl_student.year_sem AND tbl_exam_results.is_deleted = '0'");
		$this->db->join("tbl_center", "tbl_center.id = tbl_student.center_id");
		$result = $this->db->get('tbl_student');
		return $result->result();
	}
	public function get_all_pending_re_registration_ajax_count($search)
	{
		$this->db->select("tbl_student.*,tbl_exam_results.result,tbl_center.center_name");
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '0');
		// $this->db->where('tbl_student.verified_status','1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_student.status', '1');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.father_name', $search);
			$this->db->or_like('tbl_student.mother_name', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_student.created_on', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id', 'DESC');
		$this->db->join("tbl_exam_results", "tbl_exam_results.student_id=tbl_student.id AND tbl_exam_results.year_sem = tbl_student.year_sem AND tbl_exam_results.is_deleted = '0'");
		$this->db->join("tbl_center", "tbl_center.id = tbl_student.center_id");
		$result = $this->db->get('tbl_student');
		return $result->num_rows();
	}
	public function get_all_payment_failed_admission_list_ajax($length, $start, $search){  
		$this->db->select('tbl_student_fees.id as fees_id,tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '0');
		//$this->db->where('tbl_student.verified_status', '0');
		//$this->db->where('tbl_student_fees.payment_status', '0');
		//$this->db->where('tbl_student_fees.fees_type', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.father_name', $search);
			$this->db->or_like('tbl_student.mother_name', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_id_management.id_name', $search);
			$this->db->or_like('tbl_student.id_number', $search);
			$this->db->or_like('tbl_student.gender', $search);
			$this->db->or_like('tbl_student.category', $search);
			$this->db->or_like('tbl_student.address', $search);
			$this->db->or_like('tbl_student.nationality', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_student.pincode', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_faculty.faculty_name', $search);
			$this->db->or_like('tbl_course_type.course_type', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id', 'DESC');
		$this->db->limit($length, $start);
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id', 'left');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id', 'left');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type', 'left');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$this->db->join('tbl_student_fees', 'tbl_student_fees.student_id = tbl_student.id', 'left');
		$result = $this->db->get('tbl_student');
		return $result->result(); 
	}
	public function get_all_payment_failed_admission_list_ajax_count($search)
	{
		$this->db->select('tbl_student_fees.id as fees_id,tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '0');
		//$this->db->where('tbl_student.verified_status', '0');
		//$this->db->where('tbl_student_fees.payment_status', '0');
		//$this->db->where('tbl_student_fees.fees_type', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		
	
		
		
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.father_name', $search);
			$this->db->or_like('tbl_student.mother_name', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_id_management.id_name', $search);
			$this->db->or_like('tbl_student.id_number', $search);
			$this->db->or_like('tbl_student.gender', $search);
			$this->db->or_like('tbl_student.category', $search);
			$this->db->or_like('tbl_student.address', $search);
			$this->db->or_like('tbl_student.nationality', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_student.pincode', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_faculty.faculty_name', $search);
			$this->db->or_like('tbl_course_type.course_type', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id', 'DESC'); 
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id', 'left');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id', 'left');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type', 'left');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$this->db->join('tbl_student_fees', 'tbl_student_fees.student_id = tbl_student.id', 'left');
		$result = $this->db->get('tbl_student');
		return $result->num_rows(); 
	}
	public function get_all_passout_admission_list_ajax($length, $start, $search)
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '4');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.father_name', $search);
			$this->db->or_like('tbl_student.mother_name', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_id_management.id_name', $search);
			$this->db->or_like('tbl_student.id_number', $search);
			$this->db->or_like('tbl_student.gender', $search);
			$this->db->or_like('tbl_student.category', $search);
			$this->db->or_like('tbl_student.address', $search);
			$this->db->or_like('tbl_student.nationality', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_student.pincode', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_faculty.faculty_name', $search);
			$this->db->or_like('tbl_course_type.course_type', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id', 'ASC');
		$this->db->limit($length, $start);
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$result = $this->db->get('tbl_student');
		return $result->result();
	}
	public function get_all_passout_admission_list_ajax_count($search)
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status', '4');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.father_name', $search);
			$this->db->or_like('tbl_student.mother_name', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_id_management.id_name', $search);
			$this->db->or_like('tbl_student.id_number', $search);
			$this->db->or_like('tbl_student.gender', $search);
			$this->db->or_like('tbl_student.category', $search);
			$this->db->or_like('tbl_student.address', $search);
			$this->db->or_like('tbl_student.nationality', $search);
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_student.pincode', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_faculty.faculty_name', $search);
			$this->db->or_like('tbl_course_type.course_type', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id', 'ASC');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$result = $this->db->get('tbl_student');
		return $result->num_rows();
	}
	public function get_admission_form()
	{
		// echo "<pre>";print_r($this->uri->segment(2));exit;
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_course.print_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.id', base64_decode($this->uri->segment(2)));
		//$this->db->where('tbl_student.id',$this->uri->segment(2));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		// $this->db->where('tbl_student_fees.payment_status','0');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id', 'left');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id', 'left');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type', 'left');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$this->db->join('tbl_student_fees', 'tbl_student_fees.id = tbl_student.id', 'left');
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_center_admission_form()
	{
		// echo "<pre>";print_r($this->uri->segment(2));exit;
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_course.print_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.id', base64_decode($this->uri->segment(2)));
		//$this->db->where('tbl_student.id',$this->uri->segment(2));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		// $this->db->where('tbl_student_fees.payment_status','0');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id', 'left');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id', 'left');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type', 'left');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$this->db->join('tbl_student_fees', 'tbl_student_fees.id = tbl_student.id', 'left');
		$result = $this->db->get('tbl_student');
		return $result->row();
		// $result = $result->row();
		// echo "<pre>";print_r($result);exit;
	}
	public function get_admission_qualification()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('student_id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_student_qualification');
		return $result->row();
	}
	public function get_center_admission_qualification()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_student_qualification');
		return $result->row();
	}
	public function get_center_admission_qualification_admission()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('student_id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_student_qualification');
		return $result->row();
	}
	public function update_document_status()
	{
		$data = array(
			'center_verification_status' => $this->input->post('center_verification_status'),
			'center_verifed_remark' 	 => $this->input->post('center_verifed_remark'),
		);
		$this->db->where('id', $this->input->post('student_id'));
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function get_course_stream_fees()
	{
		$center = $this->get_profile();
		$this->db->where('course_id', $this->input->post('course'));
		$this->db->where('stream_id', $this->input->post('stream'));
		$this->db->where('session_id', $this->input->post('session'));
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$fees_result = $this->db->get('tbl_center_fees');
		$fees_result = $fees_result->row();
		if (empty($fees_result)) {
			$this->db->where('course_id', $this->input->post('course'));
			$this->db->where('stream_id', $this->input->post('stream'));
			$this->db->where('center_id', $this->session->userdata('center_id'));
			$this->db->where('is_deleted', '0');
			$this->db->order_by('session_id', 'DESC');
			$fees_result = $this->db->get('tbl_center_fees');
			$fees_result = $fees_result->row();
			// echo "<pre>";print_r($fees_result);exit;
		}
		$registrtion_fees = 0;
		$fees = 0;
		if (!empty($fees_result)) {
			$registrtion_fees = $fees_result->registration_fees;
			if ($this->input->post('country') == "101") {
				// if($center->payment_term == "1"){
				// 	$fees = $fees_result->fees;
				// }else{
				// 	$fees = $fees_result->fees/2;
				// } 
				$fees = $fees_result->fees;
			} else {
				// if($center->payment_term == "1"){
				// 	$fees = $fees_result->foregin_fees;
				// }else{
				// 	$fees = $fees_result->foregin_fees/2;
				// }
				$fees = $fees_result->foregin_fees;
			}
		}
		// $this->db->where('id', $this->input->post('session'));
		// $session_fees = $this->db->get('tbl_session');
		// $session_fees = $session_fees->row();
		// $session_late_fees = 0;
		// if (!empty($session_fees)) {
		// 	if ($session_fees->late_fees_date < date("Y-m-d")) {
		// 		$session_late_fees = $session_fees->late_fees;
		// 	}
		// }
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->where('session_id', $this->input->post('session'));
		$this->db->where('course_mode', $this->input->post('course_mode'));
		$session_result = $this->db->get('tbl_center_active_session');
		$res = $session_result->row();
		$session_late_fees = 0;
		if(!empty($res)){
			if($res->course_mode == '1'){
				$session_late_fees = $res->year_late_fee;
			}else if($res->course_mode == '2'){
				$session_late_fees = $res->sem_late_fee;
			}else if($res->course_mode == '3'){
				$session_late_fees = $res->month_late_fee;
			}else if($res->course_mode == '4'){
				$session_late_fees = $res->year_late_fee + $res->sem_late_fee + $res->month_late_fee;
			}
		}
		echo $fees . "@@@" . $session_late_fees . "@@@" . $registrtion_fees;
	}
	public function set_subject()
	{
		$stream = $this->input->post('stream');
		$exp = explode("@@@", $stream);
		$code = $this->input->post('txtSubjectCode');
		$name = $this->input->post('txtSubjectName');
		$type = $this->input->post('comboType');
		$txtIMM = $this->input->post('txtIMM');
		$txtEMM = $this->input->post('txtEMM');
		$credit = $this->input->post('txtCredit');
		$min_credit = $this->input->post('min_credit');
		$data = array();
		for ($i = 0; $i < count($code); $i++) {
			if ($code[$i] != "") {
				$data[] = array(
					'course' 			=> $this->input->post('course'),
					'stream'		 	=> $exp[1],
					'year_sem' 			=> $this->security->xss_clean($this->input->post('year_sem')),
					'mode' 				=> $this->security->xss_clean($this->input->post('course_mode')),
					'subject_code' 		=> $code[$i],
					'subject_name' 		=> $name[$i],
					'subject_type' 		=> $type[$i],
					'internal_marks' 	=> $txtIMM[$i],
					'external_mark' 	=> $txtEMM[$i],
					'credit' 			=> $credit[$i],
					'status' 			=> '1',
					'is_center' 		=> '1',
					'center_id' 		=> $this->session->userdata('center_id'),
					'created_on' 		=> date("Y-m-d H:i:s"),
				);
			}
		}
		if (!empty($data)) {
			$this->db->insert_batch('tbl_subject', $data);
		}
		return true;
	}
	public function get_all_added_subject($length, $start, $search)
	{
		$this->db->select('tbl_subject.*,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_subject.is_deleted', '0');
		$this->db->where('tbl_subject.center_id', $this->session->userdata('center_id'));
		$this->db->where_in('tbl_subject.center_id', array($this->session->userdata('center_id'), 1));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course', 'tbl_course.id = tbl_subject.course');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_subject.stream');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_subject');
		return $result->result();
	}
	public function get_all_added_subject_count($search)
	{
		$this->db->select('tbl_subject.*,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_subject.is_deleted', '0');
		$this->db->where('tbl_subject.center_id', $this->session->userdata('center_id'));
		$this->db->where_in('tbl_subject.center_id', array($this->session->userdata('center_id'), 1));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course', 'tbl_course.id = tbl_subject.course');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_subject.stream');
		$result = $this->db->get('tbl_subject');
		return $result->num_rows();
	}
	public function get_all_course_stream_relation()
	{
		/*$profile = $this->get_profile();
		// echo "<pre>";print_r($profile);exit;
		$course = $profile->courses;
		$exp = explode(",",$course);
		$this->db->select('tbl_course.course_name,tbl_course.id');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->where_in('tbl_course_stream_relation.id',$exp);
		$this->db->order_by('tbl_course.course_name','ASC');
		$this->db->group_by('tbl_course_stream_relation.course');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_course_stream_relation.faculty','left');
		$this->db->join('tbl_course','tbl_course.id = tbl_course_stream_relation.course','left');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();	*/
		$this->db->select('tbl_course.course_name,tbl_course.id');
		$this->db->where('tbl_center_fees.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_fees.is_deleted', '0');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_center_fees.course_id');
		$this->db->group_by('tbl_center_fees.course_id');
		$this->db->order_by('tbl_course.course_name', 'ASC');
		$result = $this->db->get('tbl_center_fees');
		// echo "<pre>";print_r($result->result());exit;
		return $result->result();
	}
	public function get_course_stream_ajax()
	{
		/*$profile = $this->get_profile();
		$course = $profile->courses;
		$exp = explode(",",$course);
		$this->db->select('tbl_stream.stream_name,tbl_stream.id,tbl_course_stream_relation.id as relation_primary');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->where('tbl_course_stream_relation.course',$this->input->post('course'));
		$this->db->where_in('tbl_course_stream_relation.id',$exp);
		$this->db->order_by('tbl_stream.stream_name','ASC');
		//$this->db->group_by('tbl_course_stream_relation.course'); 
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$this->db->join('tbl_fees_realtion','tbl_fees_realtion.relation_id = tbl_course_stream_relation.id');
		$this->db->group_by('tbl_course_stream_relation.id');
		$result = $this->db->get('tbl_course_stream_relation');
		echo json_encode($result->result());*/
		$this->db->select('tbl_stream.stream_name,tbl_stream.id');
		$this->db->where('tbl_center_fees.is_deleted', '0');
		$this->db->where('tbl_center_fees.status', '1');
		$this->db->where('tbl_center_fees.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_fees.course_id', $this->input->post('course'));
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_center_fees.stream_id');
		$result = $this->db->get('tbl_center_fees');
		echo json_encode($result->result());
	}
	public function get_search_result()
	{
		$this->db->select('tbl_exam_results.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.course_mode');
		if ($this->input->post('month') != "") {
			$this->db->where('tbl_exam_results.examination_month', $this->input->post('month'));
		}
		if ($this->input->post('year') != "") {
			$this->db->where('tbl_exam_results.examination_year', $this->input->post('year'));
		}
		if ($this->input->post('course') != "") {
			$this->db->where('tbl_exam_results.course_id', $this->input->post('course'));
		}
		if ($this->input->post('stream') != "") {
			$this->db->where('tbl_exam_results.stream_id', $this->input->post('stream'));
		}
		if ($this->input->post('enrollment') != "") {
			$this->db->where('tbl_exam_results.enrollment_number', $this->input->post('enrollment'));
		}
		if ($this->input->post('result_status') != "") {
			$this->db->where('tbl_exam_results.status', $this->input->post('result_status'));
		}
		if ($this->input->post('result') != "") {
			$this->db->where('tbl_exam_results.result', $this->input->post('result'));
		}
		$this->db->where('tbl_exam_results.is_deleted', '0');
		// $this->db->where('tbl_exam_results.added_show','2');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_student', 'tbl_student.id = tbl_exam_results.student_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_exam_results.course_id', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_exam_results.stream_id', 'left');
		$result = $this->db->get('tbl_exam_results');
		return $result->result();
		// $result = $result->result();
		// echo"<pre>";print_r($result);exit;
	}
	public function get_selected_subject_for_result($result_id)
	{
		$this->db->select('tbl_examination_result_details.*,tbl_subject.subject_name,tbl_subject.subject_code,tbl_subject.subject_type');
		$this->db->where('tbl_examination_result_details.is_deleted', '0');
		$this->db->where('tbl_examination_result_details.status', '1');
		$this->db->where('tbl_examination_result_details.result_id', $result_id);
		//$this->db->where('tbl_subject.center_id',$this->session->userdata('center_id'));
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_examination_result_details.subject_id');
		// $this->db->join('tbl_subject','tbl_subject.id = tbl_examination_result_details.subject_id');
		$this->db->order_by('tbl_subject.subject_code', 'ASC');
		$result = $this->db->get('tbl_examination_result_details');
		return $result->result();
	}
	// public function get_result_student(){
	// 	$this->db->select('tbl_student.*,tbl_course.course_name,tbl_stream.stream_name');
	// 	$this->db->where('tbl_student.is_deleted','0');
	// 	$this->db->where('tbl_student.admission_status !=','4'); //
	// 	$this->db->where('tbl_student.center_id',$this->session->userdata('center_id'));
	// 	$this->db->where('tbl_student.enrollment_number',$this->input->post('enrollment'));
	// 	$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
	// 	$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
	// 	$result = $this->db->get('tbl_student');
	// 	return $result->row();
	// }
	public function get_result_student()
	{
		// echo "<pre>";print_r($this->input->post('enrollment'));exit;
		$this->db->select('tbl_student.*,tbl_course.course_name,tbl_stream.stream_name,tbl_center.id as center_id');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status !=', '4'); //
		// $this->db->where('tbl_student.center_id',$this->session->userdata('center_id'));
		$this->db->where('tbl_student.enrollment_number', $this->input->post('enrollment'));
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$result = $this->db->get('tbl_student');
		return $result->row();
		// $result = $result->row();
		// echo "<pre>";print_r($result);exit;
	}
	public function get_result_subject()
	{
		$student = $this->get_result_student();
		// echo "<pre>";print_r($this->session->userdata('center_id'));exit;
		if (!empty($student)) {
			$this->db->where_in('tbl_subject.center_id', array($this->session->userdata('center_id'), 1));
			$this->db->where('tbl_subject.is_deleted', '0');
			$this->db->where('tbl_subject.status', '1');
			$this->db->where('tbl_subject.course', $student->course_id);
			$this->db->where('tbl_subject.stream', $student->stream_id);
			//$this->db->where('tbl_subject.mode',$student->course_mode);
			$this->db->where('tbl_subject.year_sem', $this->input->post('year_sem'));
			// $this->db->where('tbl_subject.year_sem',$student->year_sem);
			$result = $this->db->get('tbl_subject');
			return $result->result();
			// $result =  $result->result();
			// echo "<pre>";print_r($result);exit;
		} else {
			return array();
		}
	}
	public function get_exam_status(){
		$student = $this->get_result_student(); 
		if (!empty($student)) {
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$this->db->where('payment_status', '1');
			$this->db->where('student_id', $student->id);
			//$this->db->where('course_name', $student->course_id);
			//$this->db->where('stream_name', $student->stream_id);
			$this->db->where('year_sem', $student->year_sem);
			$result = $this->db->get('tbl_examination_form');
			return $result->row(); 
		}
	}
	public function get_student_exam_form_status()
	{
		$student = $this->get_result_student();
		if (!empty($student)) {
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$this->db->where('exam_status', '1');
			$this->db->where('payment_status', '1');
			$this->db->where('course_name', $student->course_id);
			$this->db->where('stream_name', $student->stream_id);
			$this->db->where('year_sem', $student->year_sem);
			$result = $this->db->get('tbl_examination_form');
			return $result->num_rows();
		} else {
			return 0;
		}
	}
	public function set_result()
	{
		$month = $_POST['txtMonth'];
		$year = $_POST['txtYear'];
		$examStatus = $_POST['txtExamStatus'];
		$enrollNo = $_POST['txtEnNo'];
		$courseId = $_POST['txtCourseId'];
		$streamId = $_POST['txtStreamId'];
		$yearSem = $_POST['txtYS'];
		$totalIMM = 0;
		$totalIMO = 0;
		$totalEMM = 0;
		$totalEMO = 0;
		$totalResult = $_POST['comboTResult'];
		if ($this->input->post('txtExamStatus') == '0') {
			$this->db->where('enrollment_number', $this->security->xss_clean($this->input->post('txtEnNo')));
			$this->db->where('year_sem', $this->security->xss_clean($this->input->post('txtYS')));
			$this->db->where('examination_status', $this->security->xss_clean($this->input->post('txtExamStatus')));
			$this->db->where('is_deleted', '0');
			$result = $this->db->get('tbl_exam_results');
			if ($result->num_rows() > 0 && $this->security->xss_clean($this->input->post('txtExamStatus')) == '0') {
				return false;
			}
		}
		$j = 1;
		while (isset($_REQUEST["txtSubjectId" . $j])) {
			if (isset($_REQUEST["txtChoice" . $j])) {
				if ($_REQUEST["txtSubjectId" . $j] == 6736 || $_REQUEST["txtSubjectId" . $j] == 6735 || $_REQUEST["txtSubjectId" . $j] == 6734) {
				} else {
					$totalIMM += $_REQUEST["txtIMM" . $j];
					$totalIMO += $_REQUEST["txtIMO" . $j];
					$totalEMM += $_REQUEST["txtEMM" . $j];
					$totalEMO += $_REQUEST["txtEMO" . $j];
				}
			}
			$j++;
		}
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$up_city = '';
		$up_country = '';
		$ip = $_SERVER['REMOTE_ADDR'];
		/*	$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
			if($query && $query['status'] == 'success') {
				$up_country = $query ['country'];
				$up_city = $query['regionName'].', '.$query['city'];
			} */
		if ($this->input->post('txtExamStatus') == '0') {
			$this->db->where('month', $this->security->xss_clean($this->input->post('month')));
			$this->db->where('year', $this->security->xss_clean($this->input->post('year')));
			$this->db->where('is_deleted', '0');
			$result = $this->db->get('tbl_exam_setup');
			if ($result->num_rows() > 0 && $this->security->xss_clean($this->input->post('txtExamStatus')) == '0') {
				return false;
			}
		}
		$result_declare_date = "";
		// if($this->input->post('txtMonth') == $this->security->xss_clean($this->input->post('month')) && $this->input->post('txtYear') == $this->security->xss_clean($this->input->post('year'))){
		// 	$result_declare_date = "2021-05-10";
		// }
		if ($this->input->post('txtMonth') == $this->security->xss_clean($this->input->post('month')) && $this->input->post('txtYear') == $this->security->xss_clean($this->input->post('year'))) {
			$this->db->where('month', $this->security->xss_clean($this->input->post('txtMonth')));
			$this->db->where('year', $this->security->xss_clean($this->input->post('txtYear')));
			$this->db->where('is_deleted', '0');
			$setup_result = $this->db->get('tbl_exam_setup')->row();
			if ($setup_result) {
				$result_declare_date = $setup_result->result_declare_date;
			}
		}
		// if($this->input->post('txtMonth') == "July" && $this->input->post('txtYear') == "2022"){
		// 	$result_declare_date = "2021-08-10";
		// }
		// if($this->input->post('txtMonth') == "January" && $this->input->post('txtYear') == "2023"){
		// 	$result_declare_date = "2023-04-10";
		// }
		// if($this->input->post('txtMonth') == "June" && $this->input->post('txtYear') == "2023"){
		// 	$result_declare_date = "2021-08-10";
		// }
		// if($this->input->post('txtMonth') == "July" && $this->input->post('txtYear') == "2023"){
		// 	$result_declare_date = "2023-07-25";
		// }
		$added_by_center_id = $this->session->userdata("center_id");
		$data = array(
			'examination_month' 		=> $this->security->xss_clean($this->input->post('txtMonth')),
			'examination_year' 			=> $this->security->xss_clean($this->input->post('txtYear')),
			'enrollment_number' 		=> $this->security->xss_clean($this->input->post('txtEnNo')),
			'student_id' 				=> $this->security->xss_clean($this->input->post('student_id')),
			'course_id' 				=> $this->security->xss_clean($this->input->post('txtCourseId')),
			'stream_id'		 			=> $this->security->xss_clean($this->input->post('txtStreamId')),
			'year_sem' 					=> $this->security->xss_clean($this->input->post('txtYS')),
			'internal_max_marks' 		=> $totalIMM,
			'internal_marks_obtained' 	=> $totalIMO,
			'external_max_marks' 		=> $totalEMM,
			'external_marks_obtained' 	=> $totalEMO,
			'result' 					=> $this->security->xss_clean($this->input->post('comboTResult')),
			'status' 					=> '0',
			'result_declare_date'		=> $result_declare_date,
			'added_by' 					=> $added_by_center_id,
			'generated_by' 				=> '1',
			'added_show'                => '2',
			'examination_status' 		=> $this->security->xss_clean($this->input->post('txtExamStatus')),
			'created_on'				=> date("Y-m-d H:i:s")
		);
		$this->db->where('year_sem', $this->security->xss_clean($this->input->post('txtYS')));
		$this->db->where('enrollment_number', $this->security->xss_clean($this->input->post('txtEnNo')));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_exam_results');
		$exist = $exist->row();
		if (!empty($exist)) {
			$this->session->set_flashdata('message', 'Result already created');
			redirect('center_manage_result');
		}
		$this->db->insert('tbl_exam_results', $data);
		$result_id = $this->db->insert_id();
		$i = 1;
		while (isset($_REQUEST["txtSubjectId" . $i])) {;
			if (isset($_REQUEST["txtChoice" . $i])) {
				$exam_details = array(
					'result_id' 				=> $result_id,
					'subject_id' 				=> $_REQUEST["txtSubjectId" . $i],
					'internal_max_marks' 		=> $_REQUEST["txtIMM" . $i],
					'internal_marks_obtained'	=> $_REQUEST["txtIMO" . $i],
					'external_max_marks' 		=> $_REQUEST["txtEMM" . $i],
					'external_marks_obtained' 	=> $_REQUEST["txtEMO" . $i],
					'result' 					=> $_REQUEST["comboResult" . $i],
					'created_on'				=> date("Y-m-d H:i:s")
				);
				$this->db->insert('tbl_examination_result_details', $exam_details);
			}
			$i++;
		}
		return true;
	}
	public function center_student_reregistration(){
		$this->db->select("tbl_student.*,tbl_course.course_name,tbl_stream.stream_name,states.name as state_name,cities.name as city_name,countries.name as country_name");
		$this->db->where("tbl_student.is_deleted", "0");
		$this->db->where("tbl_student.status", "1");
		$this->db->where("tbl_student.admission_status", "1"); //
		$this->db->where("tbl_student.id", base64_decode($this->uri->segment(2)));
		$this->db->where("tbl_student.center_id", $this->session->userdata('center_id')); 
		$this->db->join("tbl_course", "tbl_course.id=tbl_student.course_id");
		$this->db->join("tbl_stream", "tbl_stream.id=tbl_student.stream_id"); 
		$this->db->join("states", "states.id=tbl_student.state", 'left');
		$this->db->join("cities", "cities.id=tbl_student.city", 'left');
		$this->db->join("countries", "countries.id=tbl_student.country", 'left');
		$result = $this->db->get("tbl_student")->row(); 
		return $result;
	}
	public function get_last_year_sem_of_student($course,$stream){
		 $this->db->where('course',$course);
		 $this->db->where('stream',$stream);
		 $this->db->where('is_deleted','0');
		 $result = $this->db->get('tbl_course_stream_relation');
		 return $result->row();
	}
	public function get_check_course_stream_payment_term(){
		$this->db->where('course_id',$this->input->post('course_id'));
		$this->db->where('stream_id',$this->input->post('stream_id'));
		$this->db->where('center_id',$this->session->userdata('center_id'));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$course_share = $this->db->get('tbl_center_subject_share');
		return $course_share->row();
	}
	public function get_rr_student($id, $year_sem)
	{ 
		$this->db->where('tbl_re_registered_student.is_deleted', '0');
		$this->db->where('tbl_re_registered_student.student_id', $id);
		$this->db->where('tbl_re_registered_student.previous_year_sem', $year_sem);
		$this->db->order_by('tbl_re_registered_student.id', 'DESC');
		$result = $this->db->get('tbl_re_registered_student');
		$result = $result->row();
		if ($result) {
			if ($result->payment_status == 1) {
				return $result;
			} else {
				$created_date = new DateTime($result->created_on);
				$current_date = new DateTime();
				$difference = $current_date->diff($created_date);
				$months_difference = ($difference->y * 12) + $difference->m;
				if ($months_difference <= 4) {
					return $result;
				}
			}
		} 
		return $result; 
	}
	public function get_rr_student_examination($id, $year_sem)
	{
		// echo "<pre>";print_r($year_sem);exit;
		$this->db->where('tbl_exam_results.is_deleted', '0');
		$this->db->where('tbl_exam_results.status', '1');
		$this->db->where('tbl_exam_results.student_id', $id);
		$this->db->where('tbl_exam_results.year_sem', $year_sem);
		$this->db->order_by('tbl_exam_results.id', 'DESC');
		$result = $this->db->get('tbl_exam_results');
		return $result->row();
	}
	public function get_rr_student_payment($id, $year_sem)
	{
		$this->db->where('tbl_student_fees.is_deleted', '0');
		$this->db->where('tbl_student_fees.student_id', $id);
		$this->db->where('tbl_student_fees.year_sem', $year_sem);
		$this->db->order_by('tbl_student_fees.id', 'DESC');
		$result = $this->db->get('tbl_student_fees');
		return $result->row();
	}
	public function center_student_reregistration_form()
	{
		$this->db->select("tbl_student.*,tbl_course.course_name,tbl_stream.stream_name,tbl_center.fee_share,states.name as state_name,cities.name as city_name,countries.name as country_name");
		$this->db->where("tbl_student.is_deleted", "0");
		$this->db->where("tbl_student.status", "1");
		// $this->db->where("tbl_student.id", base64_decode($this->uri->segment(2)));
		$this->db->where("tbl_student.center_id", $this->session->userdata('center_id'));
		$this->db->where("tbl_student.enrollment_number", $this->input->post('enrollment_number'));
		$this->db->join("tbl_course", "tbl_course.id=tbl_student.course_id");
		$this->db->join("tbl_stream", "tbl_stream.id=tbl_student.stream_id");
		$this->db->join("tbl_center", "tbl_center.id=tbl_student.center_id");
		$this->db->join("states", "states.id=tbl_student.state", 'left');
		$this->db->join("cities", "cities.id=tbl_student.city", 'left');
		$this->db->join("countries", "countries.id=tbl_student.country", 'left');
		$result = $this->db->get("tbl_student")->row();
		// if(!empty($result)){
		// 	redirect('center_student_reregistration/'.base64_encode($result->id));
		// }else{
		// 	$this->session->set_flashdata('message','You have entered wrong enrollment Number');  //
		// 	return false;
		// } 
		return $result;
	}
	// public function get_student_data(){
	// 	$this->db->where('is_deleted','0');
	// 	$this->db->where('status','1');
	// 	$result = $this->db->get("tbl_student")->row();
	// 	return $result;
	// }
	public function get_student_fees($session, $course, $stream, $country, $course_mode, $year_sem){
		$center = $this->get_profile();
		$this->db->where('course_id', $course);
		$this->db->where('stream_id', $stream);
		$this->db->where('session_id', $session);
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$fees_result = $this->db->get('tbl_center_fees');
		$fees_result = $fees_result->row();
		if (empty($fees_result)) {
			$this->db->where('course_id', $course);
			$this->db->where('stream_id', $stream);
			$this->db->where('center_id', $this->session->userdata('center_id'));
			$this->db->where('is_deleted', '0');
			$this->db->order_by('session_id', 'DESC');
			$fees_result = $this->db->get('tbl_center_fees');
			$fees_result = $fees_result->row(); 
		}
		$registrtion_fees = 0;
		$actual_fees = 0;
		$fees = 0;
		if (!empty($fees_result)) {
			$registrtion_fees = $fees_result->registration_fees;
			if ($country == "101") { 
				$fees = $fees_result->fees;
				$actual_fees = $fees_result->actual_fees;
			} else { 
				$fees = $fees_result->foregin_fees;
				$actual_fees = $fees_result->actual_fees;
			}
		}  
		if ($center->payment_term == "1") {
			$fees = $fees; 
		} else {
			if($course_mode == "2"){
				$fees = $fees / 2; 
			}else{ 
				$fees = $fees;
			}
		}
		$result_arr = array(
			'tuition_fees' => $fees,
			'late_fees' => '0',
			'student_course_fees' => $actual_fees
		); 
		return $result_arr;
		 
		 
	}
	public function center_student_reregistration_process()
	{
		$data = array(
			"year_sem" => $this->input->post("re_registration_year_sem"),
			"address" => $this->input->post("address"),
			"country" => $this->input->post("country"),
			"state" => $this->input->post("state"),
			"city" => $this->input->post("city"),
			"pincode" => $this->input->post("pincode"),
			"mobile" => $this->input->post("mobile"),
			"email" => $this->input->post("email"),
		);
		$this->db->where("tbl_student.id", $this->input->post("student_id"));
		$this->db->update("tbl_student", $data);
		$result =  $this->Web_model->get_single_student($this->input->post("student_id"));
		$maintain_data = array(
			"student_id" => $result->id,
			"enrollment_number" => $result->enrollment_number,
			"previous_year_sem" => $result->year_sem - 1,
			"current_year_sem" => $result->year_sem,
			"course_mode" => $result->course_mode,
			"created_on" => date("Y-m-d H:i:s"),
			"payment_status" => '1',
		);
		$this->db->insert("tbl_re_registered_student", $maintain_data);
	}
	public function center_student_reregistration_payment_process()
	{
		$data = array(
			"student_id"		=> $this->input->post("student_id"),
			"fees_type"			=> '4',
			"payment_mode"		=> '1',
			"bank_id"			=> '1',
			"payment_date"		=> date("Y-m-d"),
			"late_fees"			=> $this->input->post("late_fees"),
			"original_amount"	=> $this->input->post("original_amount"),
			"amount"			=> $this->input->post("total_deposit"),
			"total_fees"		=> $this->input->post("total_deposit") + $this->input->post("late_fees"),
			"year_sem"			=> $this->input->post("re_registration_year_sem"),
			"created_on"		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert("tbl_student_fees", $data);
		$id = $this->db->insert_id();
		return $id;
	}
    public function check_re_registration_before_result($student_id,$year_sem,$admission_type,$lateral_year){
		if($admission_type == "0"){
			$this->db->where('is_deleted','0');
			$this->db->where('student_id',$student_id);
			$this->db->where('current_year_sem',$year_sem);
			$this->db->where('payment_status','1');
			$result = $this->db->get('tbl_re_registered_student');
			return $result->row(); 
		}else{
			if($lateral_year == $year_sem){ 
				return array(
				        'student_id' => $student_id
				    ); 
			}else if($lateral_year < $year_sem){ 
				$this->db->where('is_deleted','0');
				$this->db->where('student_id',$student_id);
				$this->db->where('current_year_sem',$year_sem);
				$this->db->where('payment_status','1');
				$result = $this->db->get('tbl_re_registered_student');
				return $result->row(); 
			}
		}
	}
	public function check_exam_before_reregistration($student_id,$year_sem){
		$this->db->where('is_deleted','0');
		$this->db->where('student_id',$student_id);
		$this->db->where('year_sem',$year_sem);
		$this->db->where('payment_status','1');
		$result = $this->db->get('tbl_examination_form');
		return $result->row(); 
	}
	public function check_result_before_reregistration($student_id,$year_sem){
		$this->db->where('is_deleted','0');
		$this->db->where('student_id',$student_id);
		$this->db->where('year_sem',$year_sem); 
		$result = $this->db->get('tbl_exam_results');
		return $result->row(); 
	}
	public function update_student_reregistration_payment()
	{
		if (isset($_REQUEST['status'])) {
			if ($_REQUEST['status'] == 'COMPLETED') {
				$data = array(
					'transaction_id' 	=> $_REQUEST['txnId'],
					'payment_status' 	=> '1',
				);
				$this->db->where('tbl_student_fees.id', $this->input->get('payment_id'));
				$this->db->update('tbl_student_fees', $data);
				$stu_data = array(
					"year_sem" => $this->input->get("year_sem"),
					"address" => $this->input->get("address"),
					"country" => $this->input->get("country"),
					"state" => $this->input->get("state"),
					"city" => $this->input->get("city"),
					"pincode" => $this->input->get("pincode"),
					"mobile" => $this->input->get("mobile"),
					"email" => $this->input->get("email"),
				);
				$this->db->where("tbl_student.id", $this->input->get('student_id'));
				$this->db->update("tbl_student", $stu_data);
				$result =  $this->Web_model->get_single_student($this->input->get('student_id'));
				$maintain_data = array(
					"current_year_sem" => $result->year_sem,
					"transaction_id" => $_REQUEST['txnId'],
					"payment_status" => '1',
				);
				$this->db->where("tbl_re_registered_student.id", $this->input->get("student_re_registration_id"));
				$this->db->update("tbl_re_registered_student", $maintain_data);
				$details = array(
					"student_name" => $this->input->get('student_id'),
					"payment_status" => "Success",
					"address" => $this->input->get("address"),
					"mobile" => $this->input->get("mobile"),
					"email" => $this->input->get("email"),
					'transaction_id' => $_REQUEST['txnId'],
					"ammount" => $this->input->get('ammount'),
					"late_fees" => $this->input->get("late_fees"),
				);
				return $details;
			}
		}
	}
	public function check_exam_open($course_mode, $session){
    	$center_arr = array('23','31');
    	if(in_array($this->session->userdata('center_id'),$center_arr)){
    		$this->db->where('session', $session);
    		//$this->db->where('applicable_for',$course_mode);
    		if($this->session->userdata('center_id') == '23'){
    		$this->db->where('setup_id', '4'); 
    		}else if($this->session->userdata('center_id') == '31'){ 
    		    $this->db->where('setup_id', '2'); 
    		}
    		$this->db->where('student_type', '0');
    		$result = $this->db->get('tbl_exam_setup_details')->row(); 
    		// return $result;
    		if (!empty($result)) {
    			$applicable_for_array = explode(',', $result->applicable_for);			
    			if (in_array($course_mode, $applicable_for_array)) {
    				return $result;
    			} else {
    				return null;
    			}
    		}
    	}else{
    		$this->db->where('session', $session);
    		//$this->db->where('applicable_for',$course_mode);
    		$this->db->where('is_deleted', '0');
    		$this->db->where('status', '1');
    		$this->db->where('student_type', '0');
    		$result = $this->db->get('tbl_exam_setup_details')->row();
    		// return $result;
    		if (!empty($result)) {
    			$applicable_for_array = explode(',', $result->applicable_for);			
    			if (in_array($course_mode, $applicable_for_array)) {
    				return $result;
    			} else {
    				return null;
    			}
    		}
    		return null;
    	}
    }
	public function generate_examination_otp()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('admission_status', '1');
		//$this->db->where('session_id','2');
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->where('enrollment_number', $this->input->post('enrollment_number'));
		$result = $this->db->get('tbl_student');
		$result = $result->row(); 
		if (!empty($result)) { 
			$activate = $this->check_exam_open($result->course_mode, $result->session_id); 
			if (!empty($activate)) {
				if ($this->session->userdata('center_id') != "1") {
					$otp = '123';
					$session = array(
						'exam_session_id' => $result->id,
						'exam_mobile' 	=> $result->mobile,
						'exam_email' 	=> $result->email,
						'exam_otp' 		=> $otp,
						'is_validated' 	=> '1',
					);
					$this->session->set_userdata($session);
					redirect("center_examination_form/" . $result->id);
				} else {
					return false;
				}
			} else {
				return false;
			}
			// if($result->course_mode == "1"){
			// //	if($result->session_id == "1"  || $result->session_id == "2"  || $result->session_id == "3" || $result->session_id == "5" || $result->session_id == "5"){
			// 		$otp = '123';
			// 		$session = array(
			// 			'exam_session_id'=> $result->id,
			// 			'exam_mobile' 	=> $result->mobile,
			// 			'exam_email' 	=> $result->email,
			// 			'exam_otp' 		=> $otp,
			// 			'is_validated' 	=> '1',
			// 		);
			// 		$this->session->set_userdata($session);
			// 		redirect("center_examination_form/".$result->id);
			// //	}
			// }else if($result->course_mode == "2"){
			// //	if($result->session_id == "3" || $result->session_id == "2"  || $result->session_id == "5" || $result->session_id == "8" || $result->session_id == "6"){
			// 		$otp = '123';
			// 		$session = array(
			// 			'exam_session_id'=> $result->id,
			// 			'exam_mobile' 	=> $result->mobile,
			// 			'exam_email' 	=> $result->email,
			// 			'exam_otp' 		=> $otp,
			// 			'is_validated' 	=> '1',
			// 		);
			// 		$this->session->set_userdata($session);
			// 		redirect("center_examination_form/".$result->id);
			// //	}
			// }else{
			// 	return false;
			// }
		} else {
			return false;
		}
	}
	public function get_exam_form_check()
	{
		$this->db->select('tbl_examination_form.*,tbl_student.id');
		$this->db->where('tbl_examination_form.is_deleted', '0');
		$this->db->where('tbl_examination_form.status', '1');
		$this->db->where('tbl_student.id', $this->uri->segment(2));
		$this->db->join('tbl_student', 'tbl_student.id = tbl_examination_form.student_id', 'left');
		$this->db->where('tbl_examination_form.year_sem', $this->input->post('year_sem'));
		$result = $this->db->get('tbl_examination_form');
		return $result->row();
	}
	public function get_exam_form_check_new($id, $year)
	{
		$this->db->select('tbl_examination_form.*,tbl_student.id');
		$this->db->where('tbl_examination_form.is_deleted', '0');
		$this->db->where('tbl_examination_form.status', '1');
		$this->db->where('tbl_student.id', $id);
		$this->db->join('tbl_student', 'tbl_student.id = tbl_examination_form.student_id', 'left');
		$this->db->where('tbl_examination_form.year_sem', $year);
		$result = $this->db->get('tbl_examination_form');
		return $result->row();
	}
	public function cancel_examination_form()
	{
		$session = array(
			'exam_session_id'	=> '',
			'exam_mobile' 		=> '',
			'exam_email' 		=> '',
			'exam_otp' 			=> '',
			'is_validated' 		=> '',
		);
		$this->session->set_userdata($session);
		return true;
	}
	public function get_examination_student()
	{
		$this->db->select('tbl_student.*,tbl_course.print_name,tbl_stream.stream_name,tbl_session.session_name');
		$this->db->where('tbl_student.id', $this->uri->segment(2));
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$result = $this->db->get('tbl_student');
		return $result->row();
		// $result = $result->row();
		// echo "<pre>";print_r($result);exit;
	}
	public function get_student_exam_fees()
	{
		$this->db->where('tbl_student_fees.student_id', $this->uri->segment(2));
		$this->db->where('tbl_student_fees.payment_status', '1');
		$this->db->where('fees_type', '2');
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_student_fees');
		return $result->row();
	}
	public function get_exam_fees($session, $course, $stream, $center)
	{
		$this->db->where('tbl_center_fees.session_id', $session);
		$this->db->where('tbl_center_fees.course_id', $course);
		$this->db->where('tbl_center_fees.stream_id', $stream);
		$this->db->where('tbl_center_fees.center_id', $center);
		$this->db->order_by('tbl_center_fees.id', 'DESC');
		$result = $this->db->get('tbl_center_fees');
		$result = $result->row();
		if (empty($result)) {
			$this->db->where('tbl_center_fees.course_id', $course);
			$this->db->where('tbl_center_fees.stream_id', $stream);
			$this->db->where('tbl_center_fees.center_id', $center);
			$this->db->order_by('tbl_center_fees.id', 'DESC');
			$result = $this->db->get('tbl_center_fees');
			$result = $result->row();
		}
		return $result;
	}
	public function get_examination_subjct($student, $course, $stream, $year_Sem, $center)
	{
		$this->db->where('course', $course);
		$this->db->where('stream', $stream);
		$this->db->where('year_sem', $year_Sem);
		//$this->db->where('center_id',$center);
		$this->db->where('status', '1');
		$this->db->where('is_deleted', '0');
		$this->db->order_by('subject_type', 'DESC');
		$result = $this->db->get('tbl_subject');
		return $result->result();
	}
	public function set_examination_form()
	{
		$student_data = $this->get_examination_student();
		$exam_setup = $this->get_exam_setup();
		$center_arr = array('23','31');
		if(in_array($this->session->userdata('center_id'),$center_arr)){
			if($this->session->userdata('center_id') == "23"){
				$this->db->where('setup_id','4');
			}else if($this->session->userdata('center_id') == "31"){
			    $this->db->where('setup_id','2');
			}
				$exam_setup = $this->db->get('tbl_exam_setup_details');
				$exam_setup = $exam_setup->row();
		}
		// echo "<pre>";print_r($exam_setup);exit;
		$data = array(
			'student_id' 		=> $student_data->id, 
			'exam_month' 		=> $exam_setup->month,
			'exam_year' 		=> $exam_setup->year,
			'student_name' 		=> $student_data->student_name,
			'father_name' 		=> $student_data->father_name,
			'mother_name' 		=> $student_data->mother_name,
			'date_of_birth' 	=> $student_data->date_of_birth,
			'session' 			=> $student_data->session_id,
			'course_name' 		=> $student_data->course_id,
			'stream_name' 		=> $student_data->stream_id,
			'year_sem' 			=> $this->input->post('year_sem'),
			'late_fees' 		=> $this->input->post('late_fees'),
			'examination_fees' 	=> $this->input->post('examination_fees'),
			'total_examination_fees' => $this->input->post('total_examination_fees'),
			'exam_mode_type' => $this->input->post('exam_mode_type'),
			'payment_date' 		=> date("Y-m-d"),
			'created_on' 		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_examination_form', $data);
		$last_id = $this->db->insert_id();
		$subject = $this->input->post('subject');
		$subject_arr = array();
		if (!empty($subject)) {
			for ($i = 0; $i < count($subject); $i++) {
				$subject_arr[] = array(
					'student_id' 		=> $student_data->id,
					'exam_form_id' 		=> $last_id,
					'subject_id' 		=> $subject[$i],
					'created_on'		=> date("Y-m-d H:i:s")
				);
			}
			if (!empty($subject_arr)) {
				$this->db->insert_batch('tbl_exam_subject', $subject_arr);
			}
		}
		$fees_data = array(
			'student_id' 		=> $student_data->id,
			'examination_id' 	=> $last_id,
			'fees_type' 		=> 2,
			'payment_mode' 		=> $this->input->post('payment_mode'),
			'payment_date' 		=> date("Y-m-d"),
			'bank_id' 			=> 1,
			'late_fees' 		=> $this->input->post('late_fees'),
			'lateral_entry_fees' => '0',
			'bank_fees'			=> '0',
			'original_amount'	=> $this->input->post('examination_fees'),
			'amount'			=> $this->input->post('examination_fees'),
			'amount'			=> $this->input->post('examination_fees'),
			'discount'			=> '0',
			'total_fees'		=> $this->input->post('total_examination_fees'),
			'year_sem'			=> $this->input->post('year_sem'),
			'created_on'		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_student_fees', $fees_data);
		$fess_id = $this->db->insert_id();
		if ($this->input->post('payment_mode') == "3") {
			redirect('print_exam_cash_boucher/' . base64_encode($fess_id));
		} else if ($this->input->post('payment_mode') == "1") {
			//echo $this->input->post('payment_mode');exit;
			redirect('center_make_exam_payment/' . base64_encode($fess_id) . '/' . base64_encode($student_data->id));
		}
		//return base64_encode($fess_id);
	}
	public function get_examination_form_fees_details()
	{
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_student_fees');
		return $result->row();
	}
	public function get_student_data()
	{
		$this->db->where('id', base64_decode($this->uri->segment(3)));
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_selected_state($country)
	{
		$this->db->where('country_id', $country);
		$this->db->order_by('name', 'ASC');
		$result = $this->db->get('states');
		return $result->result();
	}
	public function get_selected_city($state)
	{
		$this->db->where('state_id', $state);
		$this->db->order_by('name', 'ASC');
		$result = $this->db->get('cities');
		return $result->result();
	}
	public function update_qualification_data($secondary_marksheet, $sr_secondary_marksheet, $graduation_marksheet, $post_graduation_marksheet, $other_qualification_marksheet)
	{
		if ($secondary_marksheet == '') {
			$secondary_marksheet = $this->input->post('secondary_marksheet_old');
		}
		if ($sr_secondary_marksheet == '') {
			$sr_secondary_marksheet = $this->input->post('sr_secondary_marksheet_old');
		}
		if ($graduation_marksheet == '') {
			$graduation_marksheet = $this->input->post('graduation_marksheet_old');
		}
		if ($post_graduation_marksheet == '') {
			$post_graduation_marksheet = $this->input->post('post_graduation_marksheet_old');
		}
		if ($other_qualification_marksheet == '') {
			$other_qualification_marksheet = $this->input->post('other_qualification_marksheet_old');
		}
		$data = array(
			'student_id' 						=> $this->input->post('student_id'),
			'secondary_year' 					=> $this->input->post('secondary_year'),
			'secondary_university' 				=> $this->input->post('secondary_university'),
			'secondary_marks' 					=> $this->input->post('secondary_marks'),
			'secondary_marksheet' 				=> $secondary_marksheet,
			'sr_secondary_year' 				=> $this->input->post('sr_secondary_year'),
			'sr_secondary_university' 			=> $this->input->post('sr_secondary_university'),
			'sr_secondary_marks' 				=> $this->input->post('sr_secondary_marks'),
			'sr_secondary_marksheet' 			=> $sr_secondary_marksheet,
			'graduation_year' 					=> $this->input->post('graduation_year'),
			'graduation_university' 			=> $this->input->post('graduation_university'),
			'graduation_marks' 					=> $this->input->post('graduation_marks'),
			'graduation_marksheet' 				=> $graduation_marksheet,
			'post_graduation_year' 				=> $this->input->post('post_graduation_year'),
			'post_graduation_university' 		=> $this->input->post('post_graduation_university'),
			'post_graduation_marks' 			=> $this->input->post('post_graduation_marks'),
			'post_graduation_marksheet' 		=> $post_graduation_marksheet,
			'other_qualification_year' 			=> $this->input->post('other_qualification_year'),
			'other_qualification_university' 	=> $this->input->post('other_qualification_university'),
			'other_qualification_marks' 		=> $this->input->post('other_qualification_marks'),
			'other_qualification_marksheet' 	=> $other_qualification_marksheet,
		);
		if ($this->input->post('qualification_id') == "") {
			$date = array(
				'created_on'		=> date("Y-m-d H:i:s"),
			);
			$newArray = array_merge($data, $date);
			$this->db->insert('tbl_student_qualification', $newArray);
		} else {
			$this->db->where('id', $this->input->post('qualification_id'));
			$this->db->update('tbl_student_qualification', $data);
		}
	}
	public function get_active_hall_ticket_list($length, $start, $search)
	{
		$this->db->select('tbl_examination_form.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student.email,tbl_session.session_name');
		$this->db->where('tbl_examination_form.is_deleted', '0');
		$this->db->where('tbl_examination_form.payment_status', '1');
		$this->db->where('tbl_examination_form.exam_status', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_examination_form.student_name', $search);
			$this->db->or_like('tbl_examination_form.father_name', $search);
			$this->db->or_like('tbl_examination_form.mother_name', $search);
			$this->db->or_like('tbl_examination_form.date_of_birth', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_student', 'tbl_student.id = tbl_examination_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_examination_form.course_name');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_examination_form.stream_name');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_examination_form.session');
		$this->db->order_by('tbl_examination_form.id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_examination_form');
		return $result->result();
	}
	public function get_active_hall_ticket_list_count($search)
	{
		$this->db->select('tbl_examination_form.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.enrollment_number,tbl_student.mobile,tbl_student.email,tbl_session.session_name');
		$this->db->where('tbl_examination_form.is_deleted', '0');
		$this->db->where('tbl_examination_form.payment_status', '1');
		$this->db->where('tbl_examination_form.exam_status', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_examination_form.student_name', $search);
			$this->db->or_like('tbl_examination_form.father_name', $search);
			$this->db->or_like('tbl_examination_form.mother_name', $search);
			$this->db->or_like('tbl_examination_form.date_of_birth', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_student', 'tbl_student.id = tbl_examination_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_examination_form.course_name');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_examination_form.stream_name');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_examination_form.session');
		$this->db->order_by('tbl_examination_form.id', 'DESC');
		$result = $this->db->get('tbl_examination_form');
		return $result->num_rows();
	}
	public function set_consolidated_marksheet_center()
	{
		$data = array(
			'enrollment'	=> $this->input->post('enrollment'),
			'note'			=> $this->input->post('note'),
			'center_id'		=> $this->session->userdata('center_id'),
		);
		$date = array('created_on' => date('y-m-d H:i:s'));
		$newData = array_merge($data, $date);
		$this->db->insert('tbl_consolidated_marksheet', $newData);
		$insert_id = $this->db->insert_id();
		$subject_code    = $this->input->post('subject_code');
		$subject_name    = $this->input->post('subject_name');
		$year_sem        = $this->input->post('year_sem');
		$internal_mark   = $this->input->post('internal_mark');
		$external_mark   = $this->input->post('external_mark');
		$total           = $this->input->post('total');
		$created_on      = date("Y-m-d H:i:s");
		$total_marks     = $this->input->post('total_marks');
		$grade     		 = $this->input->post('grade');
		$credit     	 = $this->input->post('credit');
		$result_val      = $this->input->post('result');
		$count = count($subject_code);
		$data12 = array();
		for ($i = 0; $i < $count; $i++) {
			$data12 = array(
				"consolidate_id"	=> $insert_id,
				"subject_code"	    => $subject_code[$i],
				"subject_name"	    => $subject_name[$i],
				"year_sem"          => $year_sem[$i],
				"internal_mark"	    => $internal_mark[$i],
				"external_mark"	    => $external_mark[$i],
				"total"		   	    => $total[$i],
				"total_marks"		=> $total_marks[$i],
				"grade"				=> $grade[$i],
				"result"			=> $result_val[$i],
				"credit"			=> $credit[$i],
				"created_on"        => $created_on,
			);
			$this->db->insert('tbl_consolidated_marksheet_details', $data12);
		}
		return $insert_id;
	}
	public function get_consolidate_center_list()
	{
		$this->db->select('tbl_consolidated_marksheet.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_consolidated_marksheet.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_consolidated_marksheet.enrollment', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_consolidated_marksheet.enrollment');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->order_by('tbl_consolidated_marksheet.id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_consolidated_marksheet');
		return $result->result();
	}
	public function get_consolidate_center_list_count()
	{
		$this->db->select('tbl_consolidated_marksheet.enrollment,tbl_consolidated_marksheet.id,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_consolidated_marksheet.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_consolidated_marksheet.enrollment', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_consolidated_marksheet.enrollment');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->order_by('tbl_consolidated_marksheet.id', 'DESC');
		$result = $this->db->get('tbl_consolidated_marksheet');
		return $result->num_rows();
	}
	public function get_single_note()
	{
		$this->db->select('tbl_consolidated_marksheet.*');
		$this->db->where('tbl_consolidated_marksheet.is_deleted', '0');
		$this->db->where('tbl_consolidated_marksheet.id', $this->uri->segment(2));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_consolidated_marksheet.enrollment');
		$result = $this->db->get('tbl_consolidated_marksheet');
		return $result->row();
	}
	public function get_single_consolidate_center()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('consolidate_id', $this->uri->segment(2));
		//$this->db->where('center_id',$this->session->userdata('center_id'));
		$result = $this->db->get('tbl_consolidated_marksheet_details');
		$result = $result->result();
		return $result;
	}
	public function get_single_consolidate_marksheet($enrollment)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('enrollment', $enrollment);
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$result = $this->db->get('tbl_consolidated_marksheet');
		$result = $result->row();
		return $result;
	}
	public function edit_consolidate_center()
	{
		$data = array(
			'note'	=>	$this->input->post('note'),
		);
		if (!empty($this->input->post('hidden_consolidate_id'))) {
			$this->db->where('id', $this->input->post('hidden_consolidate_id'));
			$this->db->where('center_id', $this->session->userdata('center_id'));
			$this->db->update('tbl_consolidated_marksheet', $data);
		}
		$this->db->where('consolidate_id', $this->input->post('hidden_consolidate_id'));
		$this->db->delete('tbl_consolidated_marksheet_details');
		$insert_id 		 = $this->input->post('hidden_consolidate_id');
		$subject_code    = $this->input->post('subject_code');
		$subject_name    = $this->input->post('subject_name');
		$year_sem        = $this->input->post('year_sem');
		$internal_mark   = $this->input->post('internal_mark');
		$external_mark   = $this->input->post('external_mark');
		$total           = $this->input->post('total');
		$total_marks     = $this->input->post('total_marks');
		$grade     		 = $this->input->post('grade');
		$credit     	 = $this->input->post('credit');
		$result_val      = $this->input->post('result');
		$created_on      = date("Y-m-d H:i:s");
		$count 			 = count($subject_code);
		$data12 	 	 = array();
		for ($i = 0; $i < $count; $i++) {
			$data12 = array(
				"consolidate_id"	=> $insert_id,
				"subject_code"	    => $subject_code[$i],
				"subject_name"	    => $subject_name[$i],
				"year_sem"          => $year_sem[$i],
				"internal_mark"	    => $internal_mark[$i],
				"external_mark"	    => $external_mark[$i],
				"total"		   	    => $total[$i],
				"total_marks"		=> $total_marks[$i],
				"grade"				=> $grade[$i],
				"result"			=> $result_val[$i],
				"credit"			=> $credit[$i],
				"created_on"        => $created_on,
			);
			$this->db->insert('tbl_consolidated_marksheet_details', $data12);
		}
		return true;
	}
	public function get_student_details()
	{
		$this->db->select('tbl_student.*,tbl_course.print_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.enrollment_number', $this->uri->segment(2));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_student_result()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('enrollment_number', $this->uri->segment(2));
		$exam = $this->db->get('tbl_exam_results');
		$exam = $exam->result();
		$result_ids = array();
		if (!empty($exam)) {
			foreach ($exam as $exam_result) {
				$result_ids[] = $exam_result->id;
			}
		}
		if (!empty($result_ids)) {
			$this->db->select('tbl_examination_result_details.*,tbl_subject.subject_code,tbl_subject.subject_name,,tbl_subject.year_sem');
			$this->db->where_in('tbl_examination_result_details.result_id', $result_ids);
			$this->db->where('tbl_examination_result_details.is_deleted', '0');
			$this->db->order_by('tbl_subject.year_sem,tbl_subject.subject_code', 'ASC');
			$this->db->join('tbl_subject', 'tbl_subject.id = tbl_examination_result_details.subject_id');
			$result = $this->db->get('tbl_examination_result_details');
			return $result->result();
		}
	}
	public function get_student_consolidated_payment()
	{
		$this->db->select('tbl_consolidated_marksheet.*,tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.address,tbl_student.pincode');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_consolidated_marksheet.id', base64_decode($this->uri->segment(2)));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_consolidated_marksheet.enrollment');
		$result = $this->db->get('tbl_consolidated_marksheet');
		return $result->row();
	}
	public function check_consolidated_form_status()
	{
		$this->db->select('tbl_consolidated_marksheet.*,tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.address,tbl_student.pincode');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.enrollment_number', $this->input->post('enrollment'));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_consolidated_marksheet.enrollment');
		$result = $this->db->get('tbl_consolidated_marksheet');
		$result = $result->row();
		if (!empty($result)) {
			if ($result->issue_status == "1" && $result->payment_status == "1") {
				$this->session->set_flashdata('message', 'Marksheet is already issued');
				redirect('add-consolidate-center-marksheet');
			} else if ($result->issue_status == "0" && $result->payment_status == "1") {
				$this->session->set_flashdata('message', 'Marksheet is waiting for approval');
				redirect('add-consolidate-center-marksheet');
			} else if ($result->issue_status == "0" && $result->payment_status == "0") {
				redirect('make-consolidate-center-payment/' . base64_encode($result->id));
			}
		}
	}
	public function get_validate_sudent()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('admission_status', '1');
		$this->db->where('enrollment_number', $this->input->post('enrollment_number'));
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		if (!empty($result)) {
			$this->db->where('student_id', $result->id);
			$this->db->where('year_sem', $result->year_sem);
			$assignment = $this->db->get('tbl_assignment');
			$assignment = $assignment->row();
			if (empty($assignment)) {
				$this->session->set_flashdata('message', 'Please upload assignment before applying transcript');
				redirect('apply_transcript');
			}
			$this->db->where('student_id', $result->id);
			$this->db->where('year_sem', $result->year_sem);
			$teacher_assesments = $this->db->get('tbl_teacher_assesments');
			$teacher_assesments = $teacher_assesments->row();
			if (empty($teacher_assesments)) {
				$this->session->set_flashdata('message', 'Please upload teacher assesment before applying transcript');
				redirect('apply_transcript');
			}
			$this->db->where('student_id', $result->id);
			$this->db->where('year_sem', $result->year_sem);
			$self_assesments = $this->db->get('tbl_self_assesments');
			$self_assesments = $self_assesments->row();
			if (empty($self_assesments)) {
				$this->session->set_flashdata('message', 'Please upload self assesment before applying transcript');
				redirect('apply_transcript');
			}
			$this->db->where('enrollment', $result->enrollment_number);
			$consolidated_marksheet = $this->db->get('tbl_consolidated_marksheet');
			$consolidated_marksheet = $consolidated_marksheet->row();
			if (empty($consolidated_marksheet)) {
				$this->session->set_flashdata('message', 'Please apply for consolidate marksheet before applying transcript');
				redirect('apply_transcript');
			}
			redirect('center_transcript_application/' . $result->id);
		} else {
			return false;
		}
	}
	public function get_transcript()
	{
		$this->db->where('registration_id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_transcript');
		return $result->row();
	}
	public function get_print_transcript()
	{
		$this->db->select('tbl_transcript.*,tbl_transcript_details.sem,tbl_student.student_name,tbl_student.course_id,tbl_student.enrollment_number,tbl_course.print_name,tbl_stream.stream_name');
		$this->db->where('tbl_transcript.registration_id', $this->uri->segment(2));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_transcript.is_deleted', '0');
		$this->db->where('tbl_transcript.status', '1');
		$this->db->where('tbl_transcript.approve_status', '1');
		$this->db->join('tbl_transcript_details', 'tbl_transcript_details.transcript_id = tbl_transcript.id');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_transcript.registration_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->group_by('tbl_transcript_details.sem');
		$this->db->order_by('tbl_transcript_details.sem', 'DESC');
		$result = $this->db->get('tbl_transcript');
		return $result->row();
	}
	public function get_admission_form_details()
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.print_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name, tbl_course_stream_relation.year_duration as duration');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status !=', '0');
		$this->db->where('tbl_student.id', $this->uri->segment(2));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('tbl_course_stream_relation', 'tbl_student.course_id = tbl_course_stream_relation.course');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function set_transcript_form()
	{
		$data = array(
			'enrollment_number' => $this->input->post('enrollment_number'),
			'registration_id'   => $this->input->post("registration_id"),
			'course_duration'   => $this->input->post('duration_of_course'),
			'year_of_passing'   => $this->input->post('year_of_passing'),
			'credit_note'  		=> $this->input->post('credit_note'),
			'payment_date'      => date("Y-m-d"),
			'created_on'        => date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_transcript', $data);
		$last_id = $this->db->insert_id();
		$sem = $this->input->post('sem');
		$subject = $this->input->post('subject');
		$type = $this->input->post('type');
		$max_mark = $this->input->post('max_mark');
		$obtained = $this->input->post('obtained');
		$detail_arr = array();
		for ($i = 0; $i < count($sem); $i++) {
			$detail_arr[] = array(
				'transcript_id' => $last_id,
				'sem'           => $sem[$i],
				'subject'       => $subject[$i],
				'type'          => $type[$i],
				'max_mark'      => $max_mark[$i],
				'obtained'      => $obtained[$i],
				'created_on'    => date("Y-m-d H:i:s")
			);
		}
		if (!empty($detail_arr)) {
			$this->db->insert_batch('tbl_transcript_details', $detail_arr);
		}
		return true;
	}
	public function get_self_assement($enrollment)
	{
		$this->db->where('enrollment_number', $enrollment);
		$student = $this->db->get('tbl_student');
		$student = $student->row();
		if (!empty($student)) {
			$this->db->where('student_id', $student->id);
			$result = $this->db->get('tbl_self_assesments');
			return $result->num_rows();
		} else {
			return 0;
		}
	}
	public function get_teacher_assement($enrollment)
	{
		$this->db->where('enrollment_number', $enrollment);
		$student = $this->db->get('tbl_student');
		$student = $student->row();
		if (!empty($student)) {
			$this->db->where('student_id', $student->id);
			$result = $this->db->get('tbl_teacher_assesments ');
			return $result->num_rows();
		} else {
			return 0;
		}
	}
	public function get_assignment_assement($enrollment)
	{
		$this->db->where('enrollment_number', $enrollment);
		$student = $this->db->get('tbl_student');
		$student = $student->row();
		if (!empty($student)) {
			$this->db->where('student_id', $student->id);
			$result = $this->db->get('tbl_assignment');
			return $result->num_rows();
		} else {
			return 0;
		}
	}
	public function get_single_markshhet()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_consolidated_marksheet');
		$enrollment =  $result->row()->enrollment;
		$this->db->select('tbl_student.*,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_student.enrollment_number', $enrollment);
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->order_by('year_sem', "ASC");
		$result =  $this->db->get('tbl_student');
		$result = $result->row();
		return $result;
	}
	public function get_single_marksheet_id()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_consolidated_marksheet');
		$result =  $result->row();
		return $result;
	}
	public function get_consolidate_marksheet_details_for_transcript($id)
	{
		$this->db->where('tbl_consolidated_marksheet_details.is_deleted', '0');
		$this->db->where('tbl_consolidated_marksheet_details.status', '1');
		$this->db->where('tbl_consolidated_marksheet_details.consolidate_id', $id);
		$this->db->order_by('year_sem', 'ASC');
		$result = $this->db->get('tbl_consolidated_marksheet_details');
		return $result->result();
	}
	public function set_answer_book_upload()
	{
		if ($_FILES['file']['name'] != "") {
			$photo = $this->Digitalocean_model->upload_photo($filename = "file", $path = "images/answer_sheet/");
		} else {
			$photo = '';
		}
		$data = array(
			'center_id' 	=> $this->session->userdata('center_id'),
			//'title' 		=> $this->input->post('title'),
			'course_id' 	=> $this->input->post('course'),
			'stream_id' 	=> $this->input->post('stream'),
			'subject_id' 	=> $this->input->post('subject'),
			'course_mode' 	=> $this->input->post('course_mode'),
			'year_sem' 		=> $this->input->post('year_sem'),
			'enrollment_number' => $this->input->post('enrollment_number'),
			'file_name' 	=> $photo,
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_center_answer_book', $data);
		return true;
	}
	public function get_single_answer_book()
	{
		$this->db->where('tbl_center_answer_book.is_deleted', '0');
		$this->db->where('tbl_center_answer_book.status', '1');
		$this->db->where('tbl_center_answer_book.id', $this->uri->segment(2));
		$result = $this->db->get('tbl_center_answer_book');
		return $result->row();
		// echo "<pre>";print_r($result);exit;
	}
	public function get_all_answer_book_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_answer_book.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_student.student_name,tbl_student.enrollment_number');
		$this->db->where('tbl_center_answer_book.is_deleted', '0');
		$this->db->where('tbl_center_answer_book.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_center_answer_book.title', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_subject.subject_name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course', 'tbl_course.id = tbl_center_answer_book.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_center_answer_book.stream_id');
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_center_answer_book.enrollment_number');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_center_answer_book.subject_id');
		$this->db->order_by('tbl_center_answer_book.id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_answer_book');
		return $result->result();
	}
	public function get_all_answer_book_ajax_count($search)
	{
		$this->db->select('tbl_center_answer_book.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_student.student_name,tbl_student.enrollment_number');
		$this->db->where('tbl_center_answer_book.is_deleted', '0');
		$this->db->where('tbl_center_answer_book.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_center_answer_book.title', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_subject.subject_name', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course', 'tbl_course.id = tbl_center_answer_book.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_center_answer_book.stream_id');
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_center_answer_book.enrollment_number');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_center_answer_book.subject_id');
		$this->db->order_by('tbl_center_answer_book.id', 'DESC');
		$result = $this->db->get('tbl_center_answer_book');
		return $result->num_rows();
	}
	public function get_subject_name_stream()
	{
		$this->db->select('subject_name,id');
		$this->db->where('stream', $this->input->post('stream'));
		$this->db->where('course', $this->input->post('course'));
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$result = $this->db->get('tbl_subject');
		echo json_encode($result->result());
	}
	public function get_single_paper_stream_wise()
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.course_id', $this->uri->segment(2));
		$this->db->where('tbl_papers.stream_id', $this->uri->segment(3));
		$this->db->where('tbl_papers.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id', 'left');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id', 'left');
		$result = $this->db->get('tbl_papers');
		return $result->row();
	}
	public function get_all_papers_ajax_count($search)
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_subject.subject_name', $search);
			$this->db->or_like('file', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id ');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id ');
		$this->db->group_by('tbl_papers.stream_id,tbl_papers.course_id');
		$result = $this->db->get('tbl_papers');
		return $result->num_rows();
	}
	public function get_all_papers_ajax($length, $start, $search)
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_subject.subject_name', $search);
			$this->db->or_like('file', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id ');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id ');
		$this->db->group_by('tbl_papers.stream_id,tbl_papers.course_id');
		$this->db->order_by('tbl_papers.course_id', 'ASC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_papers');
		return $result->result();
	}
	public function insert_paper_data($photo)
	{
		if ($photo == "") {
			$photo = $this->input->post('old_file');
		}
		$data = array(
			'course_id' 		=> $this->input->post('course'),
			'stream_id' 		=> $this->input->post('stream'),
			'subject_id' 		=> $this->input->post('subject'),
			'session_id' 		=> $this->input->post('session'),
			'course_mode' 		=> $this->input->post('course_mode'),
			'year_sem' 			=> $this->input->post('year_sem'),
			'center_id' 		=> $this->session->userdata('center_id'),
			'file' 				=> $photo,
		);
		if ($this->input->post('id') == "") {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_papers', $new_arr);
			return 0;
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_papers', $data);
			return 1;
		}
	}
	public function get_single_paper()
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.id', $this->uri->segment(2));
		$this->db->where('tbl_papers.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id', 'left');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id', 'left');
		$result = $this->db->get('tbl_papers');
		return $result->row();
	}
	public function get_all_paper_ajax_course_wise_count($search, $uri)
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.course_id', $this->input->post('course_id'));
		$this->db->where('tbl_papers.stream_id', $this->input->post('stream_id'));
		$this->db->where('tbl_papers.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_subject.subject_name', $search);
			$this->db->or_like('file', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id ');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id ');
		$result = $this->db->get('tbl_papers');
		return $result->num_rows();
	}
	public function get_all_paper_ajax_course_wise($length, $start, $search, $uri)
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.course_id', $this->input->post('course_id'));
		$this->db->where('tbl_papers.stream_id', $this->input->post('stream_id'));
		$this->db->where('tbl_papers.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_subject.subject_name', $search);
			$this->db->or_like('file', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id ');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id ');
		$this->db->order_by('tbl_papers.course_id', 'ASC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_papers');
		return $result->result();
	}
	public function get_student_fees_ajax()
	{
		// print_r($this->input->post('type'));exit;
		$this->db->select('tbl_student_fees.*');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_student_fees.student_id', $this->input->post('student'));
		$this->db->where('tbl_student_fees.is_deleted', '0');
		$this->db->where('tbl_student_fees.status', '1');
		$this->db->where('tbl_student_fees.payment_status', '1');
		$this->db->where_in('tbl_student.admission_status', array(1, 4));
		if ($this->input->post('type') == 1) {
			$this->db->where_in('tbl_student_fees.fees_type', array(1, 4));
		} else {
			$this->db->where_in('tbl_student_fees.fees_type', array(2));
		}
		$this->db->order_by('tbl_student_fees.year_sem', 'ASC');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_student_fees.student_id');
		$result = $this->db->get('tbl_student_fees');
		$result = $result->result();
		echo json_encode($result);
	}
	public function get_single_student_details()
	{
		$this->db->where('id', $this->uri->segment(2));
		return $this->db->get('tbl_student')->row();
	}
	public function get_single_student_details_new($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('tbl_student')->row();
	}
	public function set_ppc_report($pcc)
	{
		$data = array(
			'pcc' => $pcc,
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function get_old_bonafide($id)
	{
		$this->db->where('student_id', $id);
		return $this->db->get('tbl_bonafide_cer_application')->row();
	}
	public function get_old_med_inst($id)
	{
		$this->db->where('student_id', $id);
		return $this->db->get('tbl_medium_instruction_application')->row();
	}
	public function get_old_no_backlog($id)
	{
		$this->db->where('student_id', $id);
		return $this->db->get('tbl_no_backlog_application')->row();
	}
	public function get_old_no_split($id)
	{
		$this->db->where('student_id', $id);
		return $this->db->get('tbl_no_split_application')->row();
	}
	public function get_old_reccom($id)
	{
		$this->db->where('student_id', $id);
		return $this->db->get('tbl_reccom_letter_application')->row();
	}
	public function get_old_reccom_second_letter($id)
	{
		$this->db->where('student_id', $id);
		return $this->db->get('tbl_reccom_letter_application_second')->row();
	}
	public function get_old_migration($id)
	{
		$this->db->where('student_id', $id);
		return $this->db->get('tbl_student_migration')->row();
	}
	public function get_old_provisional($id)
	{
		$this->db->where('student_id', $id);
		return $this->db->get('tbl_student_provisional_degree')->row();
	}
	public function get_old_transfer($id)
	{
		$this->db->where('student_id', $id);
		return $this->db->get('tbl_student_transfer')->row();
	}
	public function get_old_character($id)
	{
		$this->db->where('student_id', $id);
		return $this->db->get('tbl_character_certificate')->row();
	}
	public function apply_student_bonafide()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_bonafide_cer_application')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('4');
			if (!empty($amount)) {
				$bonafide_amount = $amount->certificate_fees;
			} else {
				$bonafide_amount = '1000';
			}
			$data = array(
				'student_id'		=>	$this->uri->segment(2),
				'enrollment_no'		=>	$this->input->post('enrollment_no'),
				// 'amount'			=>	'1000',
				'amount'			=>	$bonafide_amount,
				'application_date'	=>	date("Y-m-d"),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_bonafide_cer_application', $data);
			$this->db->where('id', $this->db->insert_id());
			return $this->db->get('tbl_bonafide_cer_application')->row();
		} else {
			$this->db->where('id', $result->id);
			return $this->db->get('tbl_bonafide_cer_application')->row();
		}
	}
	// public function get_student_amount_details(){
	// 	$this->db->where('student_id',$this->uri->segment(2));
	// 	$result = $this->db->get('tbl_bonafide_cer_application')->row();
	// 	if(empty($result)){
	// 		$amount = $this->get_certificate_fees('4');
	// 		if(!empty($amount)){
	// 			$result = $amount->certificate_fees;
	// 		}else{
	// 			$result = '1000';
	// 		}
	// 		return $result;
	// 	}
	// 	return $result;
	// }
	public function get_student_recommendation_amount_details()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_reccom_letter_application')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('8');
			if (!empty($amount)) {
				$result = $amount->certificate_fees;
			} else {
				$result = '1000';
			}
			return $result;
		}
		return $result;
	}
	public function get_student_II_recommendation_amount_details()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_reccom_letter_application_second')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('9');
			if (!empty($amount)) {
				$result = $amount->certificate_fees;
			} else {
				$result = '1000';
			}
			return $result;
		}
		return $result;
	}
	// public function get_recommendation_fees($type){
	// 	$this->db->where('is_deleted','0');
	// 	$this->db->where('status','1');
	// 	$this->db->where('certificate_type',$type);
	// 	$result = $this->db->get('tbl_certificate_fees_relation');
	// 	return $result->row();
	// }
	public function get_single_bona_application_print()
	{
		$this->db->select("tbl_bonafide_cer_application.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_signature.name as signture_name,tbl_signature.dispalay_signature,tbl_signature.signature");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_bonafide_cer_application.enrollment_no");
		$this->db->where('tbl_bonafide_cer_application.is_deleted', '0');
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_bonafide_cer_application.signature_id', 'left');
		$this->db->where('tbl_bonafide_cer_application.status', '1');
		$this->db->where('tbl_bonafide_cer_application.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_bonafide_cer_application');
		return $result->row();
	}
	public function apply_student_medium_inst()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_medium_instruction_application')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('5');
			if (!empty($amount)) {
				$amount = $amount->certificate_fees;
			} else {
				$amount = '1000';
			}
			$data = array(
				'student_id'		=>	$this->uri->segment(2),
				'enrollment_no'		=>	$this->input->post('enrollment_no'),
				// 'amount'			=>	'1000',
				'amount' 			=> $amount,
				'application_date'	=>	date("Y-m-d"),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_medium_instruction_application', $data);
			$this->db->where('id', $this->db->insert_id());
			return $this->db->get('tbl_medium_instruction_application')->row();
		} else {
			$this->db->where('id', $result->id);
			return $this->db->get('tbl_medium_instruction_application')->row();
		}
	}
	public function get_single_inst_medium_print()
	{
		$this->db->select("tbl_medium_instruction_application.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_signature.name as signture_name,tbl_signature.dispalay_signature,tbl_signature.signature");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_medium_instruction_application.enrollment_no");
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_medium_instruction_application.signature_id', 'left');
		$this->db->where('tbl_medium_instruction_application.is_deleted', '0');
		$this->db->where('tbl_medium_instruction_application.status', '1');
		$this->db->where('tbl_medium_instruction_application.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_medium_instruction_application');
		return $result->row();
	}
	public function apply_student_no_backlog()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_no_backlog_application')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('6');
			if (!empty($amount)) {
				$amount = $amount->certificate_fees;
			} else {
				$amount = '1000';
			}
			$data = array(
				'student_id'		=>	$this->uri->segment(2),
				'enrollment_no'		=>	$this->input->post('enrollment_no'),
				// 'amount'			=>	'1000',
				'amount'			=> $amount,
				'application_date'	=>	date("Y-m-d"),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_no_backlog_application', $data);
			$this->db->where('id', $this->db->insert_id());
			return $this->db->get('tbl_no_backlog_application')->row();
		} else {
			$this->db->where('id', $result->id);
			return $this->db->get('tbl_no_backlog_application')->row();
		}
	}
	public function get_single_no_backlog_print()
	{
		$this->db->select("tbl_no_backlog_application.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_signature.name as signture_name,tbl_signature.dispalay_signature,tbl_signature.signature");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_no_backlog_application.enrollment_no");
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_no_backlog_application.signature_id', 'left');
		$this->db->where('tbl_no_backlog_application.is_deleted', '0');
		$this->db->where('tbl_no_backlog_application.status', '1');
		$this->db->where('tbl_no_backlog_application.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_no_backlog_application');
		return $result->row();
	}
	public function get_student_division_for_degree($id)
	{
		$this->db->select("examination_year,internal_max_marks,internal_marks_obtained,external_max_marks,external_marks_obtained,created_on");
		$this->db->where("is_deleted", "0");
		$this->db->where("status", "1");
		$this->db->where("result", "0");
		// $this->db->where("student_id",$id);
		$this->db->where("id", $id);
		$this->db->order_by("id", "DESC");
		$result = $this->db->get("tbl_exam_results");
		$result = $result->result();
		$total_marks = 0;
		$gained_marks = 0;
		if (!empty($result)) {
			foreach ($result as $res) {
				$total_marks = $total_marks + $res->internal_max_marks + $res->external_max_marks;
				$gained_marks = $gained_marks + $res->internal_marks_obtained + $res->external_marks_obtained;
			}
			$percentage = $total_marks == 0 ? 0 : ($gained_marks / $total_marks) * 100;
			if ($percentage >= 60) {
				$data["division"] = "First Division";
			} else if ($percentage < 60 & $percentage >= 45) {
				$data["division"] = "Second Division";
			} else {
				$data["division"] = "Third Division";
			}
			$data["date"] = $result[0]->examination_year;
			return $data;
		}
	}
	public function apply_student_no_split()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_no_split_application')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('7');
			if (!empty($amount)) {
				$certificate_amount = $amount->certificate_fees;
			} else {
				$certificate_amount = '1000';
			}
			$data = array(
				'student_id'		=>	$this->uri->segment(2),
				'enrollment_no'		=>	$this->input->post('enrollment_no'),
				// 'amount'			=>	'1000',
				'amount'			=>	$certificate_amount,
				'application_date'	=>	date("Y-m-d"),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_no_split_application', $data);
			$this->db->where('id', $this->db->insert_id());
			return $this->db->get('tbl_no_split_application')->row();
		} else {
			$this->db->where('id', $result->id);
			return $this->db->get('tbl_no_split_application')->row();
		}
	}
	public function get_single_no_split_print()
	{
		$this->db->select("tbl_no_split_application.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_signature.name as signture_name,tbl_signature.dispalay_signature,tbl_signature.signature");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_no_split_application.enrollment_no");
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_no_split_application.signature_id', 'left');
		$this->db->where('tbl_no_split_application.is_deleted', '0');
		$this->db->where('tbl_no_split_application.status', '1');
		$this->db->where('tbl_no_split_application.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_no_split_application');
		return $result->row();
	}
	public function apply_student_migration()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_student_migration')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('0');
			if (!empty($amount)) {
				$amount = $amount->certificate_fees;
			} else {
				$amount = '1000';
			}
			$data = array(
				'student_id'		=>	$this->uri->segment(2),
				// 'enrollment_no'		=>	$this->input->post('enrollment_no'),
				// 'amount'			=>	'1000',
				'amount' 			=> $amount,
				'issue_date'		=>	date("Y-m-d"),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_student_migration', $data);
			$this->db->where('id', $this->db->insert_id());
			return $this->db->get('tbl_student_migration')->row();
		} else {
			$this->db->where('id', $result->id);
			return $this->db->get('tbl_student_migration')->row();
		}
	}
	public function get_single_migration_print()
	{
		$this->db->select("tbl_student_migration.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_signature.name as signture_name,tbl_signature.dispalay_signature,tbl_signature.signature,tbl_student.date_of_birth,tbl_course.sort_name");
		// $this->db->join("tbl_student","tbl_student.enrollment_number = tbl_student_migration.enrollment_no");
		$this->db->join("tbl_student", "tbl_student.id = tbl_student_migration.student_id", 'left');
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id", 'left');
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id", 'left');
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_student_migration.signature_id', 'left');
		$this->db->where('tbl_student_migration.is_deleted', '0');
		$this->db->where('tbl_student_migration.status', '1');
		$this->db->where('tbl_student_migration.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_student_migration');
		return $result->row();
	}
	public function apply_student_provisional_degree()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_student_provisional_degree')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('3');
			if (!empty($amount)) {
				$amount = $amount->certificate_fees;
			} else {
				$amount = '1000';
			}
			$data = array(
				'student_id'		=>	$this->uri->segment(2),
				// 'enrollment_no'		=>	$this->input->post('enrollment_no'),
				// 'amount'			=>	'1000',
				'amount'			=>	$amount,
				// 'application_date'	=>	date("Y-m-d"),
				'issue_date'		=>	date("Y-m-d"),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_student_provisional_degree', $data);
			$this->db->where('id', $this->db->insert_id());
			return $this->db->get('tbl_student_provisional_degree')->row();
		} else {
			$this->db->where('id', $result->id);
			return $this->db->get('tbl_student_provisional_degree')->row();
		}
	}
	public function get_single_provisional_degree_print()
	{
		$this->db->select("tbl_student_provisional_degree.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_signature.name as signture_name,tbl_signature.dispalay_signature,tbl_signature.signature");
		// $this->db->join("tbl_student","tbl_student.enrollment_number = tbl_student_provisional_degree.enrollment_no");
		$this->db->join("tbl_student", "tbl_student.id = tbl_student_provisional_degree.student_id", 'left');
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_student_provisional_degree.signature_id', 'left');
		$this->db->where('tbl_student_provisional_degree.is_deleted', '0');
		$this->db->where('tbl_student_provisional_degree.status', '1');
		$this->db->where('tbl_student_provisional_degree.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_student_provisional_degree');
		return $result->row();
	}
	public function apply_student_transfer_certificate()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_student_transfer')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('1');
			if (!empty($amount)) {
				$amount = $amount->certificate_fees;
			} else {
				$amount = '1000';
			}
			$data = array(
				'student_id'		=>	$this->uri->segment(2),
				// 'enrollment_no'		=>	$this->input->post('enrollment_no'),
				// 'amount'			=>	'1000',
				'amount'			=>	$amount,
				// 'application_date'	=>	date("Y-m-d"),
				'issue_date'		=>	date("Y-m-d"),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_student_transfer', $data);
			$this->db->where('id', $this->db->insert_id());
			return $this->db->get('tbl_student_transfer')->row();
		} else {
			$this->db->where('id', $result->id);
			return $this->db->get('tbl_student_transfer')->row();
		}
	}
	public function get_single_transfer_certificate_print()
	{
		$this->db->select("tbl_student_transfer.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_student.date_of_birth,tbl_signature.name as signture_name,tbl_signature.dispalay_signature,tbl_signature.signature");
		// $this->db->join("tbl_student","tbl_student.enrollment_number = tbl_student_transfer.enrollment_no");
		$this->db->join("tbl_student", "tbl_student.id = tbl_student_transfer.student_id");
		$this->db->join("tbl_course", "tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream", "tbl_stream.id = tbl_student.stream_id");
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_student_transfer.signature_id', 'left');
		$this->db->where('tbl_student_transfer.is_deleted', '0');
		$this->db->where('tbl_student_transfer.status', '1');
		$this->db->where('tbl_student_transfer.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_student_transfer');
		return $result->row();
	}
	public function apply_student_recomm()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_reccom_letter_application')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('8');
			if (!empty($amount)) {
				$amount = $amount->certificate_fees;
			} else {
				$amount = '1000';
			}
			$data = array(
				'student_id'		=>	$this->uri->segment(2),
				'enrollment_no'		=>	$this->input->post('enrollment_no'),
				// 'amount'			=>	'1000',
				'amount' 			=> $amount,
				'application_date'	=>	date("Y-m-d"),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_reccom_letter_application', $data);
			$this->db->where('id', $this->db->insert_id());
			return $this->db->get('tbl_reccom_letter_application')->row();
		} else {
			$this->db->where('id', $result->id);
			return $this->db->get('tbl_reccom_letter_application')->row();
		}
	}
	public function get_single_recomm_application_print()
	{
		$this->db->select("tbl_reccom_letter_application.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_signature.name as signture_name,tbl_signature.dispalay_signature,tbl_signature.signature");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_reccom_letter_application.enrollment_no");
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_reccom_letter_application.signature_id', 'left');
		$this->db->where('tbl_reccom_letter_application.is_deleted', '0');
		$this->db->where('tbl_reccom_letter_application.status', '1');
		$this->db->where('tbl_reccom_letter_application.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_reccom_letter_application');
		return $result->row();
	}
	public function apply_student_recomm_second()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_reccom_letter_application_second')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('8');
			if (!empty($amount)) {
				$amount = $amount->certificate_fees;
			} else {
				$amount = '1000';
			}
			$data = array(
				'student_id'		=>	$this->uri->segment(2),
				'enrollment_no'		=>	$this->input->post('enrollment_no'),
				// 'amount'			=>	'1000',
				'amount' 			=> $amount,
				'application_date'	=>	date("Y-m-d"),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			// print_r($data);exit;
			$this->db->insert('tbl_reccom_letter_application_second', $data);
			$this->db->where('id', $this->db->insert_id());
			return $this->db->get('tbl_reccom_letter_application_second')->row();
		} else {
			$this->db->where('id', $result->id);
			return $this->db->get('tbl_reccom_letter_application_second')->row();
		}
	}
	public function get_single_recomm_second_application_print()
	{
		$this->db->select("tbl_reccom_letter_application_second.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_signature.name as signture_name,tbl_signature.dispalay_signature,tbl_signature.signature");
		$this->db->join("tbl_student", "tbl_student.enrollment_number = tbl_reccom_letter_application_second.enrollment_no", 'left');
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_reccom_letter_application_second.signature_id', 'left');
		$this->db->where('tbl_reccom_letter_application_second.is_deleted', '0');
		$this->db->where('tbl_reccom_letter_application_second.status', '1');
		$this->db->where('tbl_reccom_letter_application_second.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_reccom_letter_application_second');
		return $result->row();
	}
	public function apply_student_character_certificate()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_character_certificate')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('10');
			if (!empty($amount)) {
				$amount = $amount->certificate_fees;
			} else {
				$amount = '1000';
			}
			$data = array(
				'student_id'		=>	$this->uri->segment(2),
				// 'enrollment_no'		=>	$this->input->post('enrollment_no'),
				// 'amount'			=>	'1000',
				'amount' 			=> $amount,
				// 'application_date'	=>	date("Y-m-d"),
				'issue_date'		=>	date("Y-m-d"),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_character_certificate', $data);
			$this->db->where('id', $this->db->insert_id());
			return $this->db->get('tbl_character_certificate')->row();
		} else {
			$this->db->where('id', $result->id);
			return $this->db->get('tbl_character_certificate')->row();
		}
	}
	public function get_single_character_certificate_print()
	{
		$this->db->select("tbl_character_certificate.*,tbl_student.father_name,tbl_student.gender,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.email,tbl_student.mobile,tbl_student.session_id,tbl_student.course_id,tbl_student.stream_id,tbl_signature.name as signture_name,tbl_signature.dispalay_signature,tbl_signature.signature");
		// $this->db->join("tbl_student","tbl_student.enrollment_number = tbl_character_certificate.enrollment_no");
		$this->db->join("tbl_student", "tbl_student.id = tbl_character_certificate.student_id", 'left');
		$this->db->join('tbl_signature', 'tbl_signature.id = tbl_character_certificate.signature_id', 'left');
		$this->db->where('tbl_character_certificate.is_deleted', '0');
		$this->db->where('tbl_character_certificate.status', '1');
		$this->db->where('tbl_character_certificate.id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_character_certificate');
		return $result->row();
	}
	public function get_degree_enrollment()
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.print_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name, tbl_course_stream_relation.year_duration as duration');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status !=', '0');
		$this->db->where('tbl_student.enrollment_number', $this->input->post('enrollment_number'));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id', 'left');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id', 'left');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type', 'left');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('tbl_course_stream_relation', 'tbl_student.course_id = tbl_course_stream_relation.course', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		if (!empty($result)) {
			redirect('apply_degree_by_center/' . $this->input->post('enrollment_number'));
		} else {
			$this->session->set_flashdata('message', 'Please enter valid enrollment number');
			redirect('center_apply_degree');
		}
	}
	public function get_degree_enrollment_verified()
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.print_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name, tbl_course_stream_relation.year_duration as duration');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.admission_status !=', '0');
		$this->db->where('tbl_student.enrollment_number', $this->uri->segment(2));
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('tbl_course_stream_relation', 'tbl_student.course_id = tbl_course_stream_relation.course');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		return $result;
	}
	public function get_admission_qualification_during_degree($student)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('student_id', $student);
		$result = $this->db->get('tbl_student_qualification');
		return $result->row();
	}
	public function set_degree_application($secondary_marksheet, $sr_secondary_marksheet, $graduation_marksheet, $post_graduation_marksheet, $other_qualification_marksheet)
	{
		$this->db->where('student_id', $this->input->post('student_id'));
		$this->db->where('is_deleted', '0');
		$exist = $this->db->get('tbl_student_degree');
		$exist = $exist->row();
		if (empty($exist)) {
			$data = array(
				'student_id' 		=> $this->input->post('student_id'),
				'transaction_id' 	=> '',
				'reference_number' 	=> '',
				'payment_status' 	=> '',
				'amount' 			=> $this->input->post('payment'),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_student_degree', $data);
			$id = $this->db->insert_id();
			$this->db->where('student_id', $this->input->post('student_id'));
			$old_qual = $this->db->get('tbl_student_qualification');
			$old_qual = $old_qual->row();
			$this->db->where('id', $this->input->post('student_id'));
			$student_row = $this->db->get('tbl_student');
			$student_row = $student_row->row();
			$profile = $this->get_profile();
			$log_description = "";
			if (!empty($old_qual)) {
				$log_description = "Center: " . $profile->center_name . " has updated qualification details of " . $student_row->student_name . " (" . $student_row->id . ")" . " on " . date("d/m/Y");
				if ($old_qual->secondary_year != $this->input->post('secondary_year')) {
					$log_description .= "<br>Secondary year " . $student_row->secondary_year . " to " . $this->input->post('secondary_year');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->secondary_university != $this->input->post('secondary_university')) {
					$log_description .= "<br>Secondary University " . $student_row->secondary_university . " to " . $this->input->post('secondary_university');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->secondary_marks != $this->input->post('secondary_marks')) {
					$log_description .= "<br>Secondary Marks " . $student_row->secondary_marks . " to " . $this->input->post('secondary_marks');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->sr_secondary_year != $this->input->post('sr_secondary_year')) {
					$log_description .= "<br>Sr. Secondary Year " . $student_row->sr_secondary_year . " to " . $this->input->post('sr_secondary_year');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->sr_secondary_university != $this->input->post('sr_secondary_university')) {
					$log_description .= "<br>Sr. Secondary University " . $student_row->sr_secondary_university . " to " . $this->input->post('sr_secondary_university');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->sr_secondary_marks != $this->input->post('sr_secondary_marks')) {
					$log_description .= "<br>Sr. Secondary Marks " . $student_row->sr_secondary_marks . " to " . $this->input->post('sr_secondary_marks');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->graduation_year != $this->input->post('graduation_year')) {
					$log_description .= "<br>Graduation Year " . $student_row->graduation_year . " to " . $this->input->post('graduation_year');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->graduation_university != $this->input->post('graduation_university')) {
					$log_description .= "<br>Graduation University " . $student_row->graduation_university . " to " . $this->input->post('graduation_university');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->graduation_marks != $this->input->post('graduation_marks')) {
					$log_description .= "<br>Graduation Marks " . $student_row->graduation_marks . " to " . $this->input->post('graduation_marks');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->post_graduation_year != $this->input->post('post_graduation_year')) {
					$log_description .= "<br>Post Graduation Year " . $student_row->post_graduation_year . " to " . $this->input->post('post_graduation_year');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->post_graduation_university != $this->input->post('post_graduation_university')) {
					$log_description .= "<br>Post Graduation University " . $student_row->post_graduation_university . " to " . $this->input->post('post_graduation_university');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->post_graduation_marks != $this->input->post('post_graduation_marks')) {
					$log_description .= "<br>Post Graduation Marks " . $student_row->post_graduation_marks . " to " . $this->input->post('post_graduation_marks');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->other_qualification_year != $this->input->post('other_qualification_year')) {
					$log_description .= "<br>Other Year " . $student_row->other_qualification_year . " to " . $this->input->post('other_qualification_year');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->other_qualification_university != $this->input->post('other_qualification_university')) {
					$log_description .= "<br>Other University " . $student_row->other_qualification_university . " to " . $this->input->post('other_qualification_university');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($old_qual->other_qualification_marks != $this->input->post('other_qualification_marks')) {
					$log_description .= "<br>Other Marks " . $student_row->other_qualification_marks . " to " . $this->input->post('other_qualification_marks');
					$log = array(
						'user_id' 		=> $this->session->userdata('center_id'),
						'student_id' 	=> $student_row->id,
						'description' 	=> $log_description,
						'added_type' 	=> '1',
						'date' 			=> date("Y-m-d"),
						'created_on' 	=> date("Y-m-d H:i:s"),
					);
					$this->Setting_model->set_log($log);
				}
				if ($secondary_marksheet == "") {
					$secondary_marksheet = $this->input->post('old_secondary_marksheet');
				}
				if ($sr_secondary_marksheet == "") {
					$sr_secondary_marksheet = $this->input->post('old_sr_secondary_marksheet');
				}
				if ($graduation_marksheet == "") {
					$graduation_marksheet = $this->input->post('old_graduation_marksheet');
				}
				if ($post_graduation_marksheet == "") {
					$post_graduation_marksheet = $this->input->post('old_post_graduation_marksheet');
				}
				if ($other_qualification_marksheet == "") {
					$other_qualification_marksheet = $this->input->post('old_other_qualification_marksheet');
				}
				if ($undertaking == "") {
					$undertaking = $this->input->post('old_undertaking');
				}
				$qualification = array(
					'student_id' 					=> $this->input->post('student_id'),
					'secondary_year' 				=> $this->input->post('secondary_year'),
					'secondary_university' 			=> $this->input->post('secondary_university'),
					'secondary_marks' 				=> $this->input->post('secondary_marks'),
					'sr_secondary_year' 			=> $this->input->post('sr_secondary_year'),
					'sr_secondary_university' 		=> $this->input->post('sr_secondary_university'),
					'sr_secondary_marks' 			=> $this->input->post('sr_secondary_marks'),
					'graduation_year' 				=> $this->input->post('graduation_year'),
					'graduation_university' 		=> $this->input->post('graduation_university'),
					'graduation_marks' 				=> $this->input->post('graduation_marks'),
					'post_graduation_year' 			=> $this->input->post('post_graduation_year'),
					'post_graduation_university' 	=> $this->input->post('post_graduation_university'),
					'post_graduation_marks' 		=> $this->input->post('post_graduation_marks'),
					'other_qualification_year' 		=> $this->input->post('other_qualification_year'),
					'other_qualification_university' => $this->input->post('other_qualification_university'),
					'other_qualification_marks' 	=> $this->input->post('other_qualification_marks'),
					'secondary_marksheet' 			=> $secondary_marksheet,
					'sr_secondary_marksheet' 		=> $sr_secondary_marksheet,
					'graduation_marksheet' 			=> $graduation_marksheet,
					'post_graduation_marksheet' 	=> $post_graduation_marksheet,
					'other_qualification_marksheet' => $other_qualification_marksheet,
				);
				$this->db->where('student_id', $this->input->post('student_id'));
				$this->db->update('tbl_student_qualification', $qualification);
				if ($this->input->post('payment_mode') == "1") {
					redirect('make_center_degree_payment/' . $id);
				} else {
					$this->session->set_flashdata('success', 'Application submitted successfully');
					redirect('center_apply_degree');
				}
			}
		} else {
			$this->session->set_flashdata('message', 'Application already submitted');
			redirect('center_apply_degree');
		}
	}
	public function get_degree_payment_student()
	{
		$this->db->select('tbl_student.*,tbl_student_degree.amount,tbl_student_degree.id as order_id,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.print_name,tbl_stream.stream_name,tbl_center.center_name, tbl_course_stream_relation.year_duration as duration');
		$this->db->where('tbl_student_degree.id', $this->uri->segment(2));
		$this->db->join('tbl_student', 'tbl_student.id = tbl_student_degree.student_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id', 'left');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id', 'left');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type', 'left');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('tbl_course_stream_relation', 'tbl_student.course_id = tbl_course_stream_relation.course', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$result = $this->db->get('tbl_student_degree');
		return $result->row();
	}
	/*public function get_all_applied_degree(){
		$this->db->select('tbl_student.*,tbl_student_degree.created_on as created_date,tbl_student_degree.amount,tbl_student_degree.id as order_id,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.print_name,tbl_stream.stream_name,tbl_center.center_name, tbl_course_stream_relation.year_duration as duration');
		$this->db->where('tbl_student.center_id',$this->session->userdata('center_id'));  
		$this->db->join('tbl_student','tbl_student.id = tbl_student_degree.student_id','left');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id','left');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id','left');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id','left');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id','left');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type','left');
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id','left');
		$this->db->join('countries','countries.id = tbl_student.country','left');
		$this->db->join('tbl_course_stream_relation','tbl_student.course_id = tbl_course_stream_relation.course','left');
		$this->db->join('states','states.id = tbl_student.state','left');
		$this->db->join('cities','cities.id = tbl_student.city','left');
		$result = $this->db->get('tbl_student_degree');
		return $result->row();
	}*/
	public function get_all_applied_degree($length, $start, $search)
	{
		$this->db->select('tbl_student.*,tbl_student_degree.created_on as created_date,tbl_student_degree.amount,tbl_student_degree.id as order_id,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.print_name,tbl_stream.stream_name,tbl_center.center_name, tbl_course_stream_relation.year_duration as duration');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_student', 'tbl_student.id = tbl_student_degree.student_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id', 'left');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id', 'left');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type', 'left');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('tbl_course_stream_relation', 'tbl_student.course_id = tbl_course_stream_relation.course', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$this->db->group_by('tbl_student.id');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_student_degree');
		return $result->result();
	}
	public function get_all_applied_degree_count($search)
	{
		$this->db->select('tbl_student.*,tbl_student_degree.created_on as created_date,tbl_student_degree.amount,tbl_student_degree.id as order_id,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.print_name,tbl_stream.stream_name,tbl_center.center_name, tbl_course_stream_relation.year_duration as duration');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_student', 'tbl_student.id = tbl_student_degree.student_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id', 'left');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id', 'left');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type', 'left');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
		$this->db->join('countries', 'countries.id = tbl_student.country', 'left');
		$this->db->join('tbl_course_stream_relation', 'tbl_student.course_id = tbl_course_stream_relation.course', 'left');
		$this->db->join('states', 'states.id = tbl_student.state', 'left');
		$this->db->join('cities', 'cities.id = tbl_student.city', 'left');
		$this->db->group_by('tbl_student.id');
		$result = $this->db->get('tbl_student_degree');
		return $result->num_rows();
	}
	// public function get_unique_answer_book_relation(){
	// 	$this->db->where('is_deleted','0');
	// 	if($this->input->post('id') !=""){
	// 		$this->db->where('id !=',$this->input->post('id'));
	// 	}
	// 	$this->db->where('course',$this->input->post('course'));
	// 	$this->db->where('stream',$this->input->post('stream'));
	// 	$this->db->where('subject',$this->input->post('subject'));
	// 	$result = $this->db->get('tbl_center_answer_book');
	// 	echo $result->num_rows();
	// }
	public function get_unique_answer_book_relation()
	{
		// echo "<pre>";print_r($this->input->post('course'));exit;
		$this->db->where('course_id', $this->input->post('course'));
		$this->db->where('stream_id', $this->input->post('stream'));
		$this->db->where('subject_id', $this->input->post('subject'));
		if ($this->input->post('id') != "0") {
			$this->db->where('id !=', $this->input->post('id'));
		}
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_center_answer_book');
		echo $result->num_rows();
	}
	public function get_all_filled_exam_form_list_ajax($length, $start, $search)
	{
		$this->db->select('tbl_examination_form.*,tbl_student.id as student_id,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.mobile as mobile_number,tbl_student.email as email_id, tbl_session.session_name, tbl_course.course_name, tbl_stream.stream_name,  tbl_center.center_name,tbl_faculty.faculty_name');
		$this->db->where('tbl_examination_form.is_deleted', '0');
		$this->db->where('tbl_examination_form.status', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_examination_form.student_name', $search);
			$this->db->or_like('tbl_examination_form.father_name', $search);
			$this->db->or_like('tbl_examination_form.mother_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_examination_form.id', 'DESC');
		$this->db->limit($length, $start);
		$this->db->join('tbl_student', 'tbl_student.id = tbl_examination_form.student_id', 'left');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_examination_form.course_name', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_examination_form.stream_name', 'left');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id', 'left');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_examination_form.session', 'left');
		$result = $this->db->get('tbl_examination_form');
		return $result->result();
	}
	public function get_all_filled_exam_form_list_ajax_count($search)
	{
		$this->db->select('tbl_examination_form.*,tbl_student.id as student_id,tbl_student.center_id,tbl_student.enrollment_number,tbl_student.mobile as mobile_number,tbl_student.email as email_id, tbl_session.session_name, tbl_course.course_name, tbl_stream.stream_name,  tbl_center.center_name,tbl_faculty.faculty_name');
		$this->db->where('tbl_examination_form.is_deleted', '0');
		$this->db->where('tbl_examination_form.status', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_student.mobile', $search);
			$this->db->or_like('tbl_student.email', $search);
			$this->db->or_like('tbl_examination_form.student_name', $search);
			$this->db->or_like('tbl_examination_form.father_name', $search);
			$this->db->or_like('tbl_examination_form.mother_name', $search);
			$this->db->or_like('tbl_session.session_name', $search);
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_examination_form.id', 'DESC');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_examination_form.student_id', 'left');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_examination_form.course_name', 'left');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_examination_form.stream_name', 'left');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id', 'left');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_examination_form.session', 'left');
		$result = $this->db->get('tbl_examination_form');
		return $result->num_rows();
	}
	public function get_all_course_syllabus()
	{
		$this->db->select('tbl_course_syllabus.*,tbl_faculty.faculty_name,tbl_faculty.faculty_code');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_course_syllabus.faculty');
		$this->db->where('tbl_course_syllabus.is_deleted', '0');
		$this->db->where('tbl_course_syllabus.status', '1');
		$this->db->group_by('tbl_course_syllabus.faculty');
		$faculty = $this->db->get('tbl_course_syllabus')->result();
		$array = array();
		if (!empty($faculty)) {
			foreach ($faculty as $data) {
				$this->db->select('tbl_course_syllabus.*,tbl_faculty.faculty_name,tbl_faculty.faculty_code');
				$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_course_syllabus.faculty');
				$this->db->where('tbl_course_syllabus.is_deleted', '0');
				$this->db->where('tbl_course_syllabus.status', '1');
				$this->db->where('tbl_course_syllabus.faculty', $data->faculty);
				$result = $this->db->get('tbl_course_syllabus')->result();
				$array[] = array(
					'faculty_id'	=>	$data->faculty,
					'faculty_name'	=>	$data->faculty_name,
					'faculty_code'	=>	$data->faculty_code,
					'result'		=>	$result,
				);
			}
		}
		return $array;
	}
	public function get_student_re_registration($id, $year_sem)
	{
		$this->db->where('tbl_re_registered_student.is_deleted', '0');
		$this->db->where('tbl_re_registered_student.student_id', $id);
		$this->db->where('tbl_re_registered_student.previous_year_sem', $year_sem);
		$this->db->order_by('tbl_re_registered_student.id', 'DESC');
		$result = $this->db->get('tbl_re_registered_student'); 
		$result = $result->row();
		if ($result) {
			if ($result->payment_status == 1) {
				return $result;
			} else {
				$created_date = new DateTime($result->created_on);
				$current_date = new DateTime();
				$difference = $current_date->diff($created_date);
				$months_difference = ($difference->y * 12) + $difference->m;
				if ($months_difference <= 4) {
					return $result;
				}
			}
		}
		return null; 
	}
	public function get_scholar_details($id)
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.verified_status', '1');
		$this->db->where('tbl_student.course_id', '23');
		$this->db->where('tbl_student.admission_status !=', '0');
		$this->db->where('tbl_student.admission_status !=', '2');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('countries', 'countries.id = tbl_student.country');
		$this->db->join('states', 'states.id = tbl_student.state');
		$this->db->join('cities', 'cities.id = tbl_student.city');
		$this->db->where('tbl_student.id', $id);
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_scholar_extra_details($id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('student_id', $id);
		$result = $this->db->get('tbl_scholar_extra_details');
		return $result->row();
	}
	public function get_assigned_guide($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->get('tbl_guide_application');
		return $result->row();
	}
	public function set_scholar_details()
	{
		$student_details_id = $this->input->post('student_details_id');
		$student_id = $this->input->post('student_id');
		$details = $this->get_scholar_extra_details($student_id);
		if (!empty($details)) {
			if ($details->scholar_type != "") {
				$scholar_type = $details->scholar_type;
			} else {
				$scholar_type = $this->input->post('scholar_type');
			}
			if ($details->entrance_exam != "") {
				$entrance_exam = $details->entrance_exam;
			} else {
				$entrance_exam = $this->input->post('entrance_exam');
			}
			if ($details->is_regular_teacher != "") {
				$is_regular_teacher = $details->is_regular_teacher;
			} else {
				$is_regular_teacher = $this->input->post('is_regular_teacher');
			}
			if ($details->co_is_regular_teacher != "") {
				$co_is_regular_teacher = $details->co_is_regular_teacher;
			} else {
				$co_is_regular_teacher = $this->input->post('co_is_regular_teacher');
			}
			if ($details->course_work_report_type != "") {
				$course_work_report_type = $details->course_work_report_type;
			} else {
				$course_work_report_type = $this->input->post('course_work_report_type');
			}
			if ($details->examiner_from != "") {
				$examiner_from = $details->examiner_from;
			} else {
				$examiner_from = $this->input->post('examiner_from');
			}
		}
		if ($student_id != "") {
			$data = array(
				'student_id'						=>	$student_id,
				'scholar_type'						=>	$scholar_type,
				'entrance_exam'						=>	$entrance_exam,
				'guide_allocation_process'			=>	$this->input->post('guide_allocation_process'),
				'is_regular_teacher'				=>	$is_regular_teacher,
				'scholars_under_guide'				=>	$this->input->post('scholars_under_guide'),
				'co_is_regular_teacher'				=>	$co_is_regular_teacher,
				'scholars_under_co_guide'			=>	$this->input->post('scholars_under_co_guide'),
				'course_work_start_date'			=>	date('Y-m-d', strtotime($this->input->post('course_work_start_date'))),
				'research_proposal_link'			=>	$this->input->post('research_proposal_link'),
				'periodical_review_link'			=>	$this->input->post('periodical_review_link'),
				'presentation_date'					=>	date('Y-m-d', strtotime($this->input->post('presentation_date'))),
				'thesis_submission_date'			=>	date('Y-m-d', strtotime($this->input->post('thesis_submission_date'))),
				'examiner'							=>	$this->input->post('examiner'),
				'examiner_from'						=>	$examiner_from,
				'plagiarism_check_review_link'		=>	$this->input->post('plagiarism_check_review_link'),
				'thesis_examiner_submission_date'	=>	date('Y-m-d', strtotime($this->input->post('thesis_examiner_submission_date'))),
				'thesis_examiner_receive_date'		=>	date('Y-m-d', strtotime($this->input->post('thesis_examiner_receive_date'))),
				'examiner_thesis_suggestion_link'	=>	$this->input->post('examiner_thesis_suggestion_link'),
				'examiner_report_link'				=>	$this->input->post('examiner_report_link'),
				'viva_date'							=>	date('Y-m-d', strtotime($this->input->post('viva_date'))),
				'viva_report_link'					=>	$this->input->post('viva_report_link'),
				'phd_award_date'					=>	date('Y-m-d', strtotime($this->input->post('phd_award_date'))),
				'thesis_evidence_link'				=>	$this->input->post('thesis_evidence_link'),
				'other_information'					=>	$this->input->post('other_information'),
				'course_work_period_from'			=>	$this->input->post('course_work_period_from'),
				'course_work_period_to'				=>	$this->input->post('course_work_period_to'),
				'course_work_report_type'			=>	$course_work_report_type,
				'research_committee'				=>	$this->input->post('research_committee'),
				'research_papers'					=>	$this->input->post('research_papers'),
				'provisional_certificate'			=>	$this->input->post('provisional_certificate'),
			);
			// print_r($student_id);exit();
			if ($student_details_id != "") {
				$this->db->where('id', $student_details_id);
				$this->db->where('student_id', $student_id);
				$this->db->update('tbl_scholar_extra_details', $data);
				return 1;
			} else {
				$date = array(
					'created_on'	=>	date("Y-m-d H:i:s"),
				);
				$newArr = array_merge($data, $date);
				$this->db->insert('tbl_scholar_extra_details', $newArr);
				return 1;
			}
		} else {
			return 0;
		}
	}
	public function get_new_guide_list($length, $start, $search)
	{
		$this->db->select('tbl_guide_application.*,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_guide_application.is_deleted', '0');
		$this->db->where('tbl_guide_application.appliation_status', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_guide_application.name', $search);
			$this->db->or_like('tbl_guide_application.email', $search);
			$this->db->or_like('tbl_guide_application.mobile', $search);
			$this->db->or_like('tbl_guide_application.pincode', $search);
			$this->db->or_like('tbl_guide_application.address', $search);
			$this->db->or_like('tbl_guide_application.employement_type', $search);
			$this->db->or_like('tbl_guide_application.phone_number', $search);
			$this->db->or_like('tbl_guide_application.address', $search);
			$this->db->or_like('tbl_guide_application.specilisation', $search);
			$this->db->or_like('tbl_guide_application.research_area', $search);
			$this->db->group_end();
		}
		$this->db->join('countries', 'countries.id = tbl_guide_application.country');
		$this->db->join('states', 'states.id = tbl_guide_application.state');
		$this->db->join('cities', 'cities.id = tbl_guide_application.city');
		$this->db->order_by('tbl_guide_application.id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_guide_application');
		return $result->result();
	}
	public function get_new_guide_list_count($search)
	{
		$this->db->select('tbl_guide_application.*,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_guide_application.is_deleted', '0');
		$this->db->where('tbl_guide_application.appliation_status', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('countries.name', $search);
			$this->db->or_like('states.name', $search);
			$this->db->or_like('cities.name', $search);
			$this->db->or_like('tbl_guide_application.name', $search);
			$this->db->or_like('tbl_guide_application.email', $search);
			$this->db->or_like('tbl_guide_application.mobile', $search);
			$this->db->or_like('tbl_guide_application.pincode', $search);
			$this->db->or_like('tbl_guide_application.address', $search);
			$this->db->or_like('tbl_guide_application.phone_number', $search);
			$this->db->or_like('tbl_guide_application.address', $search);
			$this->db->or_like('tbl_guide_application.specilisation', $search);
			$this->db->or_like('tbl_guide_application.research_area', $search);
			$this->db->group_end();
		}
		$this->db->join('countries', 'countries.id = tbl_guide_application.country');
		$this->db->join('states', 'states.id = tbl_guide_application.state');
		$this->db->join('cities', 'cities.id = tbl_guide_application.city');
		$this->db->order_by('tbl_guide_application.id', 'DESC');
		$result = $this->db->get('tbl_guide_application');
		return $result->num_rows();
	}
	public function get_single_guide()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_guide_application');
		return $result->row();
	}
	public function approve_guide_application()
	{
		$password = rand(100000, 9999999);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_guide_application');
		$result = $result->row();
		if (!empty($result)) {
			$data = array(
				"appliation_status" => '1',
				"password" => $password,
			);
			$this->db->where("id", $result->id);
			$this->db->update("tbl_guide_application", $data);
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$this->email->initialize($config);
			$mail_message = "Dear " . $result->name . ",<br>Your application has been approved, below are the password for your approval lettar<br>Link:" . base_url() . "appointment-letter-for-supervisors<br>Password:" . $password . "<br>";
			$this->email->from('no-reply@tgu.ac.in');
			$this->email->to($result->email);
			$this->email->subject('Approve Application |THE GLOBAL UNIVERSITY');
			$this->email->set_mailtype('html');
			$message = $mail_message;
			$message .= "<br>Regards<br>IT Team<br>THE GLOBAL UNIVERSITY<br>Canchipur, near Arunachal Pradesh University, South View. Imphal West, Arunachal Pradesh-795003";
			$this->email->message($message);
			if ($this->email->send()) {
			} else {
			}
			return true;
		} else {
			return false;
		}
	}
	public function update_guide_application($photo, $signature, $secondary_subject_marksheet, $sr_secondary_subject_marksheet, $graduation_subject_marksheet, $post_graduation_subject_marksheet, $phd_subject_marksheet, $other_qualification_subject_marksheet, $biodata, $aadhar_card)
	{
		$data = array(
			'name' 								=> $this->input->post('name'),
			'son_of' 							=> $this->input->post('son_of'),
			'date_of_birth'					 	=> date("Y-m-d", strtotime($this->input->post('date_of_birth'))),
			'phone_number' 						=> $this->input->post('phone_number'),
			'mobile' 							=> $this->input->post('mobile'),
			'email' 							=> $this->input->post('email'),
			'gender' 							=> $this->input->post('gender'),
			'photo' 							=> $photo,
			'signature' 						=> $signature,
			'address' 							=> $this->input->post('address'),
			'country' 							=> $this->input->post('country'),
			'state' 							=> $this->input->post('state'),
			'city' 								=> $this->input->post('city'),
			'pincode' 							=> $this->input->post('pincode'),
			'specilisation' 					=> $this->input->post('specilisation'),
			'designation' 						=> $this->input->post('designation'),
			'remark' 							=> $this->input->post('remark'),
			'research_area' 					=> $this->input->post('research_area'),
			'employement_type' 					=> $this->input->post('employement_type'),
			'work_experience' 					=> $this->input->post('work_experience'),
			'present_working' 					=> $this->input->post('present_working'),
			'secondary_year' 					=> $this->input->post('secondary_year'),
			'secondary_university' 				=> $this->input->post('secondary_university'),
			'secondary_subject' 				=> $this->input->post('secondary_subject'),
			'secondary_subject_marksheet' 		=> $secondary_subject_marksheet,
			'sr_secondary_year' 				=> $this->input->post('sr_secondary_year'),
			'sr_secondary_university' 			=> $this->input->post('sr_secondary_university'),
			'sr_secondary_subject' 				=> $this->input->post('sr_secondary_subject'),
			'sr_secondary_subject_marksheet' 	=> $sr_secondary_subject_marksheet,
			'graduation_year' 					=> $this->input->post('graduation_year'),
			'graduation_university' 			=> $this->input->post('graduation_university'),
			'graduation_subject' 				=> $this->input->post('graduation_subject'),
			'graduation_subject_marksheet' 		=> $graduation_subject_marksheet,
			'post_graduation_year' 				=> $this->input->post('post_graduation_year'),
			'post_graduation_university' 		=> $this->input->post('post_graduation_university'),
			'post_graduation_subject' 			=> $this->input->post('post_graduation_subject'),
			'post_graduation_subject_marksheet' => $post_graduation_subject_marksheet,
			'phd_year' 							=> $this->input->post('phd_year'),
			'phd_university' 					=> $this->input->post('phd_university'),
			'phd_subject' 						=> $this->input->post('phd_subject'),
			'phd_subject_marksheet' 			=> $phd_subject_marksheet,
			'other_qualification_year' 			=> $this->input->post('other_qualification_year'),
			'other_qualification_university' 	=> $this->input->post('other_qualification_university'),
			'other_qualification_subject' 		=> $this->input->post('other_qualification_subject'),
			'other_qualification_subject_marksheet' => $other_qualification_subject_marksheet,
			'bank_name' 						=> $this->input->post('bank_name'),
			'account_name' 						=> $this->input->post('account_name'),
			'account_number' 					=> $this->input->post('account_number'),
			'ifsc_code' 						=> $this->input->post('ifsc_code'),
			'final_amount' 						=> $this->input->post('final_amount'),
			'final_remark' 						=> $this->input->post('final_remark'),
			'reference' 						=> $this->input->post('reference'),
			'biodata'							=> $biodata,
			'aadhar_card'						=> $aadhar_card,
			'signature_id'						=> $this->input->post('signature'),
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_guide_application', $data);
		return true;
	}
	public function get_certificate_fees($type)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('certificate_type', $type);
		$result = $this->db->get('tbl_certificate_fees_relation');
		return $result->row();
	}
	public function get_student_certificate_amount_details()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_medium_instruction_application')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('5');
			if (!empty($amount)) {
				$result = $amount->certificate_fees;
			} else {
				$result = '1000';
			}
			return $result;
		}
		return $result;
	}
	public function get_student_no_backlog_amount_details()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_no_backlog_application')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('6');
			if (!empty($amount)) {
				$result = $amount->certificate_fees;
			} else {
				$result = '1000';
			}
			return $result;
		}
		return $result;
	}
	public function get_migration_certificate_amount()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_student_migration')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('0');
			if (!empty($amount)) {
				$result = $amount->certificate_fees;
			} else {
				$result = '1000';
			}
			return $result;
		}
		return $result;
	}
	public function get_provisional_degree_amount()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('tbl_student_provisional_degree')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('0');
			if (!empty($amount)) {
				$result = $amount->certificate_fees;
			} else {
				$result = '1000';
			}
			return $result;
		}
		return $result;
	}
	public function get_character_amount()
	{
		$this->db->where('student_id', $this->uri->segment(2));
		$result = $this->db->get('')->row();
		if (empty($result)) {
			$amount = $this->get_certificate_fees('10');
			if (!empty($amount)) {
				$result = $amount->certificate_fees;
			} else {
				$result = '1000';
			}
			return $result;
		}
		return $result;
	}
	public function get_recommendation_letter($id)
	{
		// echo "<pre>";print_r($id);exit;
		// echo "<pre>";print_r($this->session->userdata("center_id"));exit;
		// $this->db->where('student_id',$this->session->userdata("student_id"));
		// $this->db->where('application_status','1');
		$this->db->where('tbl_reccom_letter_application.student_id', $id);
		$this->db->where('approve_status', '1');  //
		$result = $this->db->get('tbl_reccom_letter_application');
		$result = $result->row();
		return $result;
	}
	public function get_exam_setup()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('student_type', '0');
		$result = $this->db->get('tbl_exam_setup');
		return $result->row();
	}
	public function get_all_filled_re_registration_form_list($length, $start, $search)
	{
		$this->db->select("tbl_re_registered_student.*,tbl_student.center_id,tbl_student.student_name,tbl_center.center_name");
		$this->db->where('tbl_re_registered_student.is_deleted', '0');
		$this->db->where('tbl_re_registered_student.payment_status', '1');
		$this->db->where('tbl_re_registered_student.status', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_re_registered_student.enrollment_number', $search);
			$this->db->or_like('tbl_re_registered_student.previous_year_sem', $search);
			$this->db->or_like('tbl_re_registered_student.current_year_sem', $search);
			$this->db->or_like('tbl_re_registered_student.transaction_id', $search);
			$this->db->or_like('tbl_re_registered_student.created_on', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_re_registered_student.id', 'DESC');
		$this->db->limit($length, $start);
		$this->db->join("tbl_student", "tbl_student.id=tbl_re_registered_student.student_id");
		$this->db->join("tbl_center", "tbl_center.id=tbl_student.center_id");
		$result = $this->db->get('tbl_re_registered_student');
		return $result->result();
	}
	public function get_all_filled_re_registration_form_list_ajax_count($search)
	{
		$this->db->select("tbl_re_registered_student.*,tbl_student.center_id,tbl_student.student_name,tbl_center.center_name");
		$this->db->where('tbl_re_registered_student.is_deleted', '0');
		$this->db->where('tbl_re_registered_student.payment_status', '1');
		$this->db->where('tbl_re_registered_student.status', '1');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->or_like('tbl_re_registered_student.enrollment_number', $search);
			$this->db->or_like('tbl_re_registered_student.previous_year_sem', $search);
			$this->db->or_like('tbl_re_registered_student.current_year_sem', $search);
			$this->db->or_like('tbl_re_registered_student.transaction_id', $search);
			$this->db->or_like('tbl_re_registered_student.created_on', $search);
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_re_registered_student.id', 'DESC');
		$this->db->join("tbl_student", "tbl_student.id=tbl_re_registered_student.student_id");
		$this->db->join("tbl_center", "tbl_center.id=tbl_student.center_id");
		$result = $this->db->get('tbl_re_registered_student');
		return $result->num_rows();
	}
	public function get_my_wallet_balance()
	{
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_center_wallet');
		$result = $result->row();
		return $result;
	}
	public function get_my_wallet_balance_laast_recharge()
	{
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('payment_status', '1');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_wallet_history');
		$result = $result->row();
		return $result;
	}
	public function set_recharge_paymnet()
	{
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$center = $this->db->get('tbl_center_wallet');
		$center = $center->row();
		if (!empty($center)) {
			$wallet_id = $center->id;
		} else {
			$wallet_data = array(
				'center_id' 	=> $this->session->userdata('center_id'),
				'amount'		=> '0',
				'created_on'	=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_center_wallet', $wallet_data);
			$wallet_id = $this->db->insert_id();
		}
		$data = array(
			'center_id' 	=> $this->session->userdata('center_id'),
			'wallet_id' 	=> $wallet_id,
			'amount' 		=> $this->input->post('amount'),
			'payment_date' 	=> date("Y-m-d"),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_center_wallet_history', $data);
		$last_id = $this->db->insert_id();
		redirect('make_recharge_payment/' . base64_encode($last_id));
	}
	public function get_single_recharge_payment()
	{
		$this->db->where('id', base64_decode($this->uri->segment(2)));
		$result = $this->db->get('tbl_center_wallet_history');
		return $result->row();
	}
	public function get_my_recharge_history($length, $start, $search)
	{
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('amount', $search);
			$this->db->or_like('transaction_id', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_wallet_history');
		return $result->result();
	}
	public function get_my_recharge_history_count($search)
	{
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('amount', $search);
			$this->db->or_like('transaction_id', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_wallet_history');
		return $result->num_rows();
	}
	public function get_center_info()
	{
		$this->db->where('id', $this->session->userdata('center_id'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center');
		return $result->row();
	}
	public function get_syllabus_list()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_course_syllabus');
		return $result->result();
	}
	public function update_student_identity_soft($photo, $identity_file, $signature)
	{
		$data = array(
			'identity_softcopy' 	=> $identity_file,
			'photo' 				=> $photo,
			'signature' 			=> $signature,
		);
		$this->db->where('id', $this->input->post('student_id'));
		$this->db->update('tbl_student', $data);
		return true;
	}
	public function get_verified_center_student()
	{
		$this->db->select('tbl_student.*,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('enrollment_number', $this->input->post('enrollment_number'));
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		return $result;
	}
	public function get_center_student()
	{
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.center_id !=', '1');
		$this->db->where('tbl_student.enrollment_number', $this->input->post('enrollment_number'));
		$this->db->join('tbl_course_type', 'tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty', 'tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management', 'tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('countries', 'countries.id = tbl_student.country');
		$this->db->join('states', 'states.id = tbl_student.state');
		$this->db->join('cities', 'cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student')->row();
		return $result;
	}
	public function set_center_student_self_assessment($signature)
	{
		if ($this->input->post('hidden_id') == '') {
			$indices = $this->input->post('indices');
			if ($signature == "") {
				$signature = $this->input->post('old_signature');
			}
			$assign_data = array(
				'student_id' 		=> $this->input->post('student_id'),
				'center_id' 		=> $this->session->userdata('center_id'),
				'enrollment_number' => $this->input->post('enroll_number'),
				'study_mode' 		=> $this->input->post('study_mode'),
				'year_sem' 			=> $this->input->post('year_sem'),
				'assessment_status'	=> '0',
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_center_self_assessment_form', $assign_data);
			$assessment_id = $this->db->insert_id();
			// echo "<pre>";print_r($signature);exit;
			if (!empty($signature)) {
				$data = array(
					'signature' 		=> $signature,
				);
				$this->db->where('id', $this->input->post('student_id'));
				$this->db->update('tbl_student', $data);
			}
			if (!empty($indices)) {
				for ($i = 0; $i < count($indices); $i++) {
					$subject_name = $this->input->post('subject_name_' . $indices[$i]);
					$no_of_hours_study = $this->input->post('no_of_hours_study_' . $indices[$i]);
					$no_of_hours_subject = $this->input->post('no_of_hours_subject_' . $indices[$i]);
					$grade = $this->input->post('grade_' . $indices[$i]);
					if (!empty($subject_name) && is_array($subject_name)) {
						foreach ($subject_name as $key => $subject_names) {
							$study_hours = $no_of_hours_study[$key] ?? '';
							$subject_hours = $no_of_hours_subject[$key] ?? '';
							$grade = $grade[$key] ?? '';
							if (!empty($subject_name) || !empty($study_hours) || !empty($subject_hours) || !empty($grade)) {
								$assessment_data = array(
									'self_assessment_id' => $assessment_id,
									'student_id'         => $this->input->post('student_id'),
									'subject_name'       => $subject_names,
									'no_of_hours_study'  => $study_hours,
									'no_of_hours_subject' => $subject_hours,
									'grade'              => $grade,
									'assessment_status'	 => '0',
									'created_on'         => date('Y-m-d H:i:s'),
								);
								$this->db->insert('tbl_center_self_assessment_form_data', $assessment_data);
							}
						}
					}
				}
			}
			return 1;
		} else if ($this->input->post('hidden_id') != "") {
			$indices = $this->input->post('indices');
			if ($signature == "") {
				$signature = $this->input->post('old_signature');
			}
			$data = array(
				'student_id' 		=> $this->input->post('student_id'),
				'center_id' 		=> $this->session->userdata('center_id'),
				'enrollment_number' => $this->input->post('enroll_number'),
				'study_mode' 		=> $this->input->post('study_mode'),
				'year_sem' 		=> $this->input->post('year_sem'),
				'assessment_status'	=> '0',
			);
			$this->db->where('id', $this->input->post('hidden_id'));
			$this->db->update('tbl_center_self_assessment_form', $data);
			if (!empty($signature)) {
				$data = array(
					'signature' 		=> $signature,
				);
				$this->db->where('id', $this->input->post('student_id'));
				$this->db->update('tbl_student', $data);
			}
			$this->db->where('self_assessment_id', $this->input->post('hidden_id'));
			$this->db->delete('tbl_center_self_assessment_form_data');
			if (!empty($indices)) {
				for ($i = 0; $i < count($indices); $i++) {
					$subject_name = $this->input->post('subject_name_' . $indices[$i]);
					$no_of_hours_study = $this->input->post('no_of_hours_study_' . $indices[$i]);
					$no_of_hours_subject = $this->input->post('no_of_hours_subject_' . $indices[$i]);
					$grade = $this->input->post('grade_' . $indices[$i]);
					if (!empty($subject_name) && is_array($subject_name)) {
						foreach ($subject_name as $key => $subject_names) {
							$study_hours = $no_of_hours_study[$key] ?? '';
							$subject_hours = $no_of_hours_subject[$key] ?? '';
							$grade = $grade[$key] ?? '';
							if (!empty($subject_name) || !empty($study_hours) || !empty($subject_hours) || !empty($grade)) {
								$assessment_data = array(
									'self_assessment_id' => $this->input->post('hidden_id'),
									'student_id'         => $this->input->post('student_id'),
									'subject_name'       => $subject_names,
									'no_of_hours_study'  => $study_hours,
									'no_of_hours_subject' => $subject_hours,
									'grade'              => $grade,
									'assessment_status'	 => '0',
									'created_on'         => date('Y-m-d H:i:s'),
								);
								$this->db->insert('tbl_center_self_assessment_form_data', $assessment_data);
							}
						}
					}
				}
			}
			return 0;
		}
	}
	public function get_self_assessment_pending_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_self_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_self_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_self_assessment_form');
		return $result->result();
	}
	public function get_self_assessment_pending_ajax_count($search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_self_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_self_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_self_assessment_form');
		return $result->num_rows();
	}
	public function approve_self_assessment()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_center_self_assessment_form');
		$result = $result->row();
		if (!empty($result)) {
			$data = array(
				"assessment_status" => '2',
			);
			$this->db->where("id", $result->id);
			$this->db->update("tbl_center_self_assessment_form", $data);
			return true;
		} else {
			return false;
		}
	}
	public function get_self_center_student()
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.course_id,tbl_student.stream_id,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_self_assessment_form.id', $this->uri->segment(2));
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$result = $this->db->get('tbl_center_self_assessment_form');
		$result = $result->row();
		return $result;
	}
	public function get_self_center_student_table_data()
	{
		$this->db->where('self_assessment_id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_center_self_assessment_form_data');
		$result = $result->result();
		return $result;
	}
	public function center_self_reject_remark()
	{
		$data = array(
			'reject_remark' 	=> $this->input->post('reject_remark'),
			'assessment_status' => '1',
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_center_self_assessment_form', $data);
		return true;
	}
	public function get_self_assessment_rejected_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_self_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_self_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_self_assessment_form');
		return $result->result();
	}
	public function get_self_assessment_rejected_ajax_count($search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_self_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_self_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_self_assessment_form');
		return $result->num_rows();
	}
	public function get_self_assessment_approved_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_self_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_self_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_self_assessment_form');
		return $result->result();
	}
	public function get_self_assessment_approved_ajax_count($search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_self_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_self_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_self_assessment_form');
		return $result->num_rows();
	}
	//teacher
	public function set_center_student_teacher_assessment($signature)
	{
		if ($this->input->post('hidden_id') == '') {
			$indices = $this->input->post('indices');
			if ($signature == "") {
				$signature = $this->input->post('old_signature');
			}
			$assign_data = array(
				'student_id' 		=> $this->input->post('student_id'),
				'enrollment_number' => $this->input->post('enroll_number'),
				'assessor_name' 	=> $this->input->post('assessor_name'),
				'assessor_signature' => $signature,
				'year_sem' 		=> $this->input->post('year_sem'),
				'assessment_status'	=> '0',
				'center_id' 		=> $this->session->userdata('center_id'),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_center_teacher_assessment_form', $assign_data);
			$assessment_id = $this->db->insert_id();
			if (!empty($indices)) {
				for ($i = 0; $i < count($indices); $i++) {
					$subject_name = $this->input->post('subject_name_' . $indices[$i]);
					$assessment_knowledge = $this->input->post('assessment_knowledge_' . $indices[$i]);
					$assessment_application = $this->input->post('assessment_application_' . $indices[$i]);
					if (!empty($subject_name) && is_array($subject_name)) {
						foreach ($subject_name as $key => $subject_names) {
							$assessment_knowledge = $assessment_knowledge[$key] ?? '';
							$assessment_application = $assessment_application[$key] ?? '';
							if (!empty($subject_name) || !empty($assessment_knowledge) || !empty($assessment_application)) {
								$assessment_data = array(
									'teacher_assessment_id' 	=> $assessment_id,
									'student_id'         		=> $this->input->post('student_id'),
									'subject_name'       		=> $subject_names,
									'assessment_knowledge'  	=> $assessment_knowledge,
									'assessment_application'	=> $assessment_application,
									'created_on'         		=> date('Y-m-d H:i:s'),
								);
								$this->db->insert('tbl_center_teacher_assessment_form_data', $assessment_data);
							}
						}
					}
				}
			}
			return 1;
		} else if ($this->input->post('hidden_id') != "") {
			$indices = $this->input->post('indices');
			if ($signature == "") {
				$signature = $this->input->post('old_signature');
			}
			$assign_data = array(
				'student_id' 		=> $this->input->post('student_id'),
				'enrollment_number' => $this->input->post('enroll_number'),
				'assessor_name' 	=> $this->input->post('assessor_name'),
				'assessor_signature' => $signature,
				'year_sem' 			=> $this->input->post('year_sem'),
				'assessment_status'	=> '0',
				'center_id' 		=> $this->session->userdata('center_id'),
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->where('id', $this->input->post('hidden_id'));
			$this->db->update('tbl_center_teacher_assessment_form', $assign_data);
			$this->db->where('teacher_assessment_id', $this->input->post('hidden_id'));
			$this->db->delete('tbl_center_teacher_assessment_form_data');
			if (!empty($indices)) {
				for ($i = 0; $i < count($indices); $i++) {
					$subject_name = $this->input->post('subject_name_' . $indices[$i]);
					$assessment_knowledge = $this->input->post('assessment_knowledge_' . $indices[$i]);
					$assessment_application = $this->input->post('assessment_application_' . $indices[$i]);
					if (!empty($subject_name) && is_array($subject_name)) {
						foreach ($subject_name as $key => $subject_names) {
							$assessment_knowledge = $assessment_knowledge[$key] ?? '';
							$assessment_application = $assessment_application[$key] ?? '';
							if (!empty($subject_name) || !empty($assessment_knowledge) || !empty($assessment_application)) {
								$assessment_data = array(
									'teacher_assessment_id' 	=> $this->input->post('hidden_id'),
									'student_id'         		=> $this->input->post('student_id'),
									'subject_name'       		=> $subject_names,
									'assessment_knowledge'  	=> $assessment_knowledge,
									'assessment_application'	=> $assessment_application,
									'created_on'         		=> date('Y-m-d H:i:s'),
								);
								$this->db->insert('tbl_center_teacher_assessment_form_data', $assessment_data);
							}
						}
					}
				}
			}
			return 0;
		}
	}
	public function approve_teacher_assessment()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_center_teacher_assessment_form');
		$result = $result->row();
		if (!empty($result)) {
			$data = array(
				"assessment_status" => '2',
			);
			$this->db->where("id", $result->id);
			$this->db->update("tbl_center_teacher_assessment_form", $data);
			return true;
		} else {
			return false;
		}
	}
	public function get_teacher_center_student()
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_student.course_id,tbl_student.stream_id,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_teacher_assessment_form.id', $this->uri->segment(2));
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$result = $this->db->get('tbl_center_teacher_assessment_form');
		$result = $result->row();
		// echo "<pre>";print_r($result);exit;
		return $result;
	}
	public function get_teacher_center_student_table_data()
	{
		$this->db->where('teacher_assessment_id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_center_teacher_assessment_form_data');
		$result = $result->result();
		return $result;
	}
	public function center_teacher_reject_remark()
	{
		$data = array(
			'reject_remark' 	=> $this->input->post('reject_remark'),
			'assessment_status' => '1',
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_center_teacher_assessment_form', $data);
		return true;
	}
	public function get_teacher_assessment_pending_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_teacher_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_teacher_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_teacher_assessment_form');
		// echo "<pre>";print_r($result);exit;
		return $result->result();
	}
	public function get_teacher_assessment_pending_ajax_count($search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_teacher_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_teacher_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_teacher_assessment_form');
		return $result->num_rows();
	}
	public function get_teacher_assessment_rejected_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_teacher_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_teacher_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_teacher_assessment_form');
		return $result->result();
	}
	public function get_teacher_assessment_rejected_ajax_count($search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_teacher_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_teacher_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_teacher_assessment_form');
		return $result->num_rows();
	}
	public function get_teacher_assessment_approved_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_teacher_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_teacher_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_teacher_assessment_form');
		return $result->result();
	}
	public function get_teacher_assessment_approved_ajax_count($search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_teacher_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_teacher_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_teacher_assessment_form');
		return $result->num_rows();
	}
	//industry
	public function set_center_student_industry_assessment($signature, $company_seal)
	{
		if ($this->input->post('hidden_id') == '') {
			$indices = $this->input->post('indices');
			if ($signature == "") {
				$signature = $this->input->post('old_signature');
			}
			if ($company_seal == "") {
				$company_seal = $this->input->post('old_company_seal');
			}
			$assign_data = array(
				'student_id' 		=> $this->input->post('student_id'),
				'center_id' 		=> $this->session->userdata('center_id'),
				'enrollment_number' => $this->input->post('enroll_number'),
				'assessor_name' 	=> $this->input->post('assessor_name'),
				'year_sem' 			=> $this->input->post('year_sem'),
				'vaccancy' 			=> $this->input->post('vaccancy'),
				'job_opportunity' 	=> $this->input->post('job_opportunity'),
				'designation' 		=> $this->input->post('designation'),
				'company_name' 		=> $this->input->post('company_name'),
				'company_address' 	=> $this->input->post('company_address'),
				'contact_no' 		=> $this->input->post('contact_no'),
				'email' 			=> $this->input->post('email'),
				'assessor_signature' => $signature,
				'company_seal' 		=> $company_seal,
				'assessment_status'	=> '0',
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			// echo "<pre>";print_r($assign_data);exit;
			$this->db->insert('tbl_center_industry_assessment_form', $assign_data);
			$assessment_id = $this->db->insert_id();
			if (!empty($indices)) {
				for ($i = 0; $i < count($indices); $i++) {
					$subject_name = $this->input->post('subject_name_' . $indices[$i]);
					$assessment_knowledge = $this->input->post('assessment_knowledge_' . $indices[$i]);
					$assessment_skill = $this->input->post('assessment_skill_' . $indices[$i]);
					$suggestions = $this->input->post('suggestions_' . $indices[$i]);
					if (!empty($subject_name) && is_array($subject_name)) {
						foreach ($subject_name as $key => $subject_names) {
							$assessment_knowledge = $assessment_knowledge[$key] ?? '';
							$assessment_skill = $assessment_skill[$key] ?? '';
							$suggestions = $suggestions[$key] ?? '';
							if (!empty($subject_name) || !empty($assessment_knowledge) || !empty($assessment_skill) || !empty($suggestions)) {
								$assessment_data = array(
									'industry_assessment_id' 	=> $assessment_id,
									'student_id'         		=> $this->input->post('student_id'),
									'subject_name'       		=> $subject_names,
									'assessment_knowledge'  	=> $assessment_knowledge,
									'assessment_skill'			=> $assessment_skill,
									'suggestions'				=> $suggestions,
									'created_on'         		=> date('Y-m-d H:i:s'),
								);
								$this->db->insert('tbl_center_industry_assessment_form_data', $assessment_data);
							}
						}
					}
				}
			}
			return 1;
		} else if ($this->input->post('hidden_id') != "") {
			$indices = $this->input->post('indices');
			if ($signature == "") {
				$signature = $this->input->post('old_signature');
			}
			if ($company_seal == "") {
				$company_seal = $this->input->post('old_company_seal');
			}
			$assign_data = array(
				'student_id' 		=> $this->input->post('student_id'),
				'center_id' 		=> $this->session->userdata('center_id'),
				'enrollment_number' => $this->input->post('enroll_number'),
				'assessor_name' 	=> $this->input->post('assessor_name'),
				'year_sem' 			=> $this->input->post('year_sem'),
				'vaccancy' 			=> $this->input->post('vaccancy'),
				'job_opportunity' 	=> $this->input->post('job_opportunity'),
				'designation' 		=> $this->input->post('designation'),
				'company_name' 		=> $this->input->post('company_name'),
				'company_address' 	=> $this->input->post('company_address'),
				'contact_no' 		=> $this->input->post('contact_no'),
				'email' 			=> $this->input->post('email'),
				'assessor_signature' => $signature,
				'company_seal' 		=> $company_seal,
				'assessment_status'	=> '0',
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->where('id', $this->input->post('hidden_id'));
			$this->db->update('tbl_center_industry_assessment_form', $assign_data);
			$this->db->where('industry_assessment_id', $this->input->post('hidden_id'));
			$this->db->delete('tbl_center_industry_assessment_form_data');
			if (!empty($indices)) {
				for ($i = 0; $i < count($indices); $i++) {
					$subject_name = $this->input->post('subject_name_' . $indices[$i]);
					$assessment_knowledge = $this->input->post('assessment_knowledge_' . $indices[$i]);
					$assessment_skill = $this->input->post('assessment_skill_' . $indices[$i]);
					$suggestions = $this->input->post('suggestions_' . $indices[$i]);
					if (!empty($subject_name) && is_array($subject_name)) {
						foreach ($subject_name as $key => $subject_names) {
							$assessment_knowledge = $assessment_knowledge[$key] ?? '';
							$assessment_skill = $assessment_skill[$key] ?? '';
							$suggestions = $suggestions[$key] ?? '';
							if (!empty($subject_name) || !empty($assessment_knowledge) || !empty($assessment_skill) || !empty($suggestions)) {
								$assessment_data = array(
									'industry_assessment_id' 	=> $this->input->post('hidden_id'),
									'student_id'         		=> $this->input->post('student_id'),
									'subject_name'       		=> $subject_names,
									'assessment_knowledge'  	=> $assessment_knowledge,
									'assessment_skill'			=> $assessment_skill,
									'suggestions'				=> $suggestions,
									'created_on'         		=> date('Y-m-d H:i:s'),
								);
								$this->db->insert('tbl_center_industry_assessment_form_data', $assessment_data);
							}
						}
					}
				}
			}
			return 1;
		}
	}
	public function approve_industry_assessment()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_center_industry_assessment_form');
		$result = $result->row();
		if (!empty($result)) {
			$data = array(
				"assessment_status" => '2',
			);
			$this->db->where("id", $result->id);
			$this->db->update("tbl_center_industry_assessment_form", $data);
			return true;
		} else {
			return false;
		}
	}
	public function get_industry_center_student()
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_student.course_id,tbl_student.stream_id,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_industry_assessment_form.id', $this->uri->segment(2));
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$result = $this->db->get('tbl_center_industry_assessment_form');
		$result = $result->row();
		return $result;
	}
	public function get_industry_center_student_table_data()
	{
		$this->db->where('industry_assessment_id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_center_industry_assessment_form_data');
		$result = $result->result();
		return $result;
	}
	public function center_industry_reject_remark()
	{
		$data = array(
			'reject_remark' 	=> $this->input->post('reject_remark'),
			'assessment_status' => '1',
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_center_industry_assessment_form', $data);
		return true;
	}
	public function get_industry_assessment_pending_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_industry_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_industry_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_industry_assessment_form');
		// echo "<pre>";print_r($result);exit;
		return $result->result();
	}
	public function get_industry_assessment_pending_ajax_count($search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_industry_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_industry_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_industry_assessment_form');
		return $result->num_rows();
	}
	public function get_industry_assessment_rejected_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_industry_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_industry_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_industry_assessment_form');
		return $result->result();
	}
	public function get_industry_assessment_rejected_ajax_count($search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_industry_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_industry_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_industry_assessment_form');
		return $result->num_rows();
	}
	public function get_industry_assessment_approved_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_industry_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_industry_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_industry_assessment_form');
		return $result->result();
	}
	public function get_industry_assessment_approved_ajax_count($search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_industry_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_industry_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_industry_assessment_form');
		return $result->num_rows();
	}
	//parent
	public function set_center_student_parent_assessment($signature)
	{
		// echo "<pre>";print_r($_POST);exit;
		if ($this->input->post('hidden_id') == '') {
			if ($signature == "") {
				$signature = $this->input->post('old_signature');
			}
			$assign_data = array(
				'student_id' 		=> $this->input->post('student_id'),
				'father_name' 		=> $this->input->post('father_name'),
				'contact_no' 		=> $this->input->post('contact_no'),
				'center_id' 		=> $this->session->userdata('center_id'),
				'relation' 			=> $this->input->post('relation'),
				'year_sem' 			=> $this->input->post('year_sem'),
				'word' 				=> $this->input->post('word'),
				'satisfaction' 		=> $this->input->post('satisfaction'),
				'father_signature'	=> $signature,
				'assessment_status'	=> '0',
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert('tbl_center_parent_assessment_form', $assign_data);
			return 1;
		} else if ($this->input->post('hidden_id') != '') {
			if ($signature == "") {
				$signature = $this->input->post('old_signature');
			}
			$assign_data = array(
				'student_id' 		=> $this->input->post('student_id'),
				'father_name' 		=> $this->input->post('father_name'),
				'contact_no' 		=> $this->input->post('contact_no'),
				'center_id' 		=> $this->session->userdata('center_id'),
				'relation' 			=> $this->input->post('relation'),
				'year_sem' 			=> $this->input->post('year_sem'),
				'word' 				=> $this->input->post('word'),
				'satisfaction' 		=> $this->input->post('satisfaction'),
				'father_signature'	=> $signature,
				'assessment_status'	=> '0',
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$this->db->where('id', $this->input->post('hidden_id'));
			$this->db->update('tbl_center_parent_assessment_form', $assign_data);
			return 0;
		}
	}
	public function approve_parent_assessment()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_center_parent_assessment_form');
		$result = $result->row();
		if (!empty($result)) {
			$data = array(
				"assessment_status" => '2',
			);
			$this->db->where("id", $result->id);
			$this->db->update("tbl_center_parent_assessment_form", $data);
			return true;
		} else {
			return false;
		}
	}
	public function get_parent_center_student()
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name,tbl_student.course_id,tbl_student.stream_id,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_center_parent_assessment_form.id', $this->uri->segment(2));
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$result = $this->db->get('tbl_center_parent_assessment_form');
		$result = $result->row();
		return $result;
	}
	public function get_parent_center_student_table_data()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_center_parent_assessment_form');
		$result = $result->result();
		return $result;
	}
	public function center_parent_reject_remark()
	{
		$data = array(
			'reject_remark' 	=> $this->input->post('reject_remark'),
			'assessment_status' => '1',
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_center_parent_assessment_form', $data);
		return true;
	}
	public function get_parent_assessment_pending_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name');
		$this->db->where('tbl_center_parent_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_parent_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_parent_assessment_form');
		// echo "<pre>";print_r($result);exit;
		return $result->result();
	}
	public function get_parent_assessment_pending_ajax_count($search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name');
		$this->db->where('tbl_center_parent_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_parent_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_parent_assessment_form');
		return $result->num_rows();
	}
	public function get_parent_assessment_rejected_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name');
		$this->db->where('tbl_center_parent_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_parent_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_parent_assessment_form');
		return $result->result();
	}
	public function get_parent_assessment_rejected_ajax_count($search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name');
		$this->db->where('tbl_center_parent_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_parent_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_parent_assessment_form');
		return $result->num_rows();
	}
	public function get_parent_assessment_approved_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name');
		$this->db->where('tbl_center_parent_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_parent_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_center_parent_assessment_form');
		return $result->result();
	}
	public function get_parent_assessment_approved_ajax_count($search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name');
		$this->db->where('tbl_center_parent_assessment_form.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_center_parent_assessment_form.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_center_parent_assessment_form');
		return $result->num_rows();
	}
	public function get_validate_student()
	{
		$this->db->where('center_id', $this->session->userdata('center_id'));
		$this->db->where('enrollment_number', $this->input->post('enrollment'));
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function set_student_assignment($assignment)
	{
		$data = array(
			'student_id'			=> $this->input->post('student_id'),
			'year_sem' 				=> $this->input->post('year_sem'),
			'assignment_title'		=> $this->input->post('title'),
			'file' 					=> $assignment,
			'assessment_status' => '0',
			'created_on'			=> date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_assignment', $data);
		return true;
	}
	public function get_all_pending_assignment($length, $start, $search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '0');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_assignment');
		return $result->result();
	}
	public function get_all_pending_assignment_count($search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '0');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_assignment');
		return $result->num_rows();
	}
	public function get_all_rejected_assignment($length, $start, $search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '2');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_assignment');
		return $result->result();
	}
	public function get_all_rejected_assignment_count($search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '2');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_assignment');
		return $result->num_rows();
	}
	public function get_all_approved_assignment($length, $start, $search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '1');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_assignment');
		return $result->result();
	}
	public function get_all_approved_assignment_count($search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '1');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_assignment');
		return $result->num_rows();
	}
	// public function get_center_session_data(){
	// 	$this->db->select('tbl_center_active_session.*,tbl_course.course_name');
	// 	$this->db->where('tbl_center_active_session.center_id', $this->session->userdata('center_id'));
	// 	$this->db->where('tbl_center_active_session.is_deleted', '0');
	// 	$this->db->where('tbl_center_active_session.status', '1');
	// 	// $this->db->join('tbl_session','tbl_session.id = tbl_center_active_session.session_id','left');
	// 	// $this->db->join('tbl_center','tbl_center.id = tbl_center_active_session.center_id','left');
	// 	$this->db->join('tbl_course','tbl_course.id = tbl_center_active_session.course_id','left');
	// 	$this->db->order_by('tbl_center_active_session.id', 'DESC');
	// 	$this->db->group_by('tbl_center_active_session.course_id');
	// 	$result = $this->db->get('tbl_center_active_session')->result();
	// 	return $result;
	// }
	// public function get_session_ajax(){
	// 	$this->db->select('tbl_center_active_session.*,tbl_session.session_name');
	// 	$this->db->where('tbl_center_active_session.is_deleted','0');
	// 	$this->db->where('tbl_center_active_session.course_id',$this->input->post('course'));
	// 	$this->db->order_by('tbl_center_active_session.id','DESC');
	// 	$this->db->join('tbl_session','tbl_session.id = tbl_center_active_session.session_id','left');
	// 	$result = $this->db->get('tbl_center_active_session');
	// 	echo json_encode($result->result());
	// }
	// public function get_course_mode_ajax(){
	// 	$this->db->where('tbl_center_active_session.is_deleted','0');
	// 	$this->db->where('tbl_center_active_session.course_id',$this->input->post('course'));
	// 	$this->db->where('tbl_center_active_session.session_id',$this->input->post('session'));
	// 	$this->db->order_by('tbl_center_active_session.id','DESC');
	// 	$result = $this->db->get('tbl_center_active_session');
	// 	echo json_encode($result->result());
	// }
	// public function get_late_fees_data_ajax(){
	// 	$this->db->where('tbl_center_active_session.is_deleted','0');
	// 	$this->db->where('tbl_center_active_session.course_id',$this->input->post('course'));
	// 	$this->db->where('tbl_center_active_session.session_id',$this->input->post('session'));
	// 	$this->db->where('tbl_center_active_session.course_mode',$this->input->post('course_mode'));
	// 	$this->db->order_by('tbl_center_active_session.id','DESC');
	// 	$result = $this->db->get('tbl_center_active_session')->row();
	// 	if(!empty($result)){
	// 		$fees = $result->
	// 	}
	// 	echo $fees;
	// 	// echo json_encode($result->result());
	// }
	public function get_center_active_session(){
		$this->db->select('tbl_session.*');
		$this->db->where('tbl_center_active_session.is_deleted','0');
		$this->db->where('tbl_center_active_session.status','1');
		$this->db->where('tbl_center_active_session.center_id',$this->session->userdata('center_id'));
		$this->db->order_by('tbl_center_active_session.id','DESC');
		$this->db->join('tbl_session','tbl_session.id = tbl_center_active_session.session_id');
		$result = $this->db->get('tbl_center_active_session');
		return $result->result();
	} 
	public function get_course_stream_course_mode()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('session_id', $this->input->post('session'));
		$this->db->where('center_id',$this->session->userdata('center_id'));
		$center_mode = $this->db->get('tbl_center_active_session');
		$center_mode = $center_mode->row();
		if(!empty($center_mode)){
			$this->db->where('is_deleted', '0');
			$this->db->where('status', '1');
			$this->db->where('course', $this->input->post('course'));
			$this->db->where('stream', $this->input->post('stream'));
			$result = $this->db->get('tbl_course_stream_relation');
			$result = $result->row();
			if (!empty($result)) {
				if($center_mode->course_mode == "7"){  
					if ($result->course_mode == "1") {
						echo "<option value=''>Select Course Mode</option>
							<option value='1'>Year</option>
						";
					} else if ($result->course_mode == "2") {
						echo "<option value=''>Select Course Mode</option>
							<option value='2'>Semester</option>
						";
					} else if ($result->course_mode == "4") {
						echo "<option value=''>Select Course Mode</option>
							<option value='4'>Month</option>
						";
					} else if ($result->course_mode == "3") {
						echo "<option value=''>Select Course Mode</option>
							<option value='1'>Year</option>
							<option value='2'>Semester</option>
						";
					}
					
				}else if($center_mode->course_mode == "1"){
					if ($result->course_mode == "1" || $result->course_mode == "3") {
						echo "<option value=''>Select Course Mode</option>
							<option value='1'>Year</option>
						";
					}else{
						echo "<option value=''>Course not available on this mode</option>";
					}
				}else if($center_mode->course_mode == "2"){
					if ($result->course_mode == "1" || $result->course_mode == "3") {
						echo "<option value=''>Select Course Mode</option>
							<option value='2'>Semester</option>
						";
					}else{
						echo "<option value=''>Course not available on this mode</option>";
					}
				}else if($center_mode->course_mode == "3"){
					if ($result->course_mode == "3") {
						echo "<option value=''>Select Course Mode</option>
							<option value='1'>Year</option>
							<option value='2'>Semester</option>
						";
					}else if($result->course_mode == "1" || $result->course_mode == "3"){
						echo "<option value=''>Select Course Mode</option>
							<option value='1'>Year</option> 
						";
					}else if($result->course_mode == "2" || $result->course_mode == "3"){
						echo "<option value=''>Select Course Mode</option>
							<option value='2'>Semester</option> 
						";
					}else{
						echo "<option value=''>Course not available on this mode</option>";
					}
				}else if($center_mode->course_mode == "4"){
					echo "<option value=''>Select Course Mode</option>
							<option value='4'>Month</option> 
						";
				}else if($center_mode->course_mode == "5"){
					if($result->course_mode == "1"){
						echo "<option value=''>Select Course Mode</option>
							<option value='1'>Year</option> 
						"; 
					}else if($result->course_mode == "4"){
						echo "<option value=''>Select Course Mode</option>
								<option value='4'>Month</option> 
							";
					}else{
						echo "<option value=''>Course not available on this mode</option>";
					}
				}else if($center_mode->course_mode == "6"){
					if($result->course_mode == "2"){
						echo "<option value=''>Select Course Mode</option>
							<option value='2'>Semester</option> 
						"; 
					}else if($result->course_mode == "4"){
						echo "<option value=''>Select Course Mode</option>
								<option value='4'>Month</option> 
							";
					}else{
						echo "<option value=''>Course not available on this mode</option>";
					}
				}
			} else {
				echo "<option value=''>Select Course Mode</option>";
			}
		}else{
			echo "<option value=''>Mode not assigned</option>";
		}
	}  
}