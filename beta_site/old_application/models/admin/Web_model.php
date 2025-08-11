<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Web_model extends CI_Model { 
	public function get_active_id_name(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->order_by('id_name','ASC');
		$result = $this->db->get('tbl_id_management');
		return $result->result();	
	}
	public function get_all_country(){
		$this->db->order_by('name','ASC');
		$resullt = $this->db->get('countries');
		return $resullt->result();
	}
	public function get_all_course_stream_relation(){
		$this->db->select('tbl_course.course_name,tbl_course.id');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->order_by('tbl_course.course_name','ASC');
		$this->db->group_by('tbl_course_stream_relation.course');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_course_stream_relation.faculty');
		$this->db->join('tbl_course','tbl_course.id = tbl_course_stream_relation.course');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();		
	}
	public function get_ajax_course_list(){
		$this->db->select('tbl_course.course_name,tbl_course.id');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->order_by('tbl_course.course_name','ASC');
		$this->db->group_by('tbl_course_stream_relation.course');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_course_stream_relation.faculty');
		$this->db->join('tbl_course','tbl_course.id = tbl_course_stream_relation.course');
		$result = $this->db->get('tbl_course_stream_relation');
		echo json_encode($result->result());		
	}
	
	public function get_course_stream(){
		$this->db->select('tbl_stream.stream_name,tbl_stream.id');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->where('tbl_course_stream_relation.course',$this->input->post('course'));
		$this->db->order_by('tbl_stream.stream_name','ASC');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		echo json_encode($result->result());
	}
	public function get_course_stream_subject(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		$this->db->where('year_sem',$this->input->post('year_sem'));
		$this->db->order_by('subject_name','ASC');
		$result = $this->db->get('tbl_subject');
		echo json_encode($result->result());
	}
	/*public function get_selected_course_stream($course){
		$this->db->select('tbl_stream.stream_name,tbl_stream.id');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->where('tbl_course_stream_relation.course',$course);
		$this->db->order_by('tbl_stream.stream_name','ASC');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();
	}*/
	public function get_selected_course_stream($course,$faculty){
		$this->db->select('tbl_stream.stream_name,tbl_stream.id');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->where('tbl_course_stream_relation.course',$course);
		$this->db->where('tbl_course_stream_relation.faculty',$faculty);
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();
	}
	
	public function generate_registration_otp(){
		$otp = rand ( 10000 , 99999 );
		$data = array(
			'name' 			=> $this->security->xss_clean($this->input->post('otp_name')),
			'mobile' 		=> $this->security->xss_clean($this->input->post('otp_mobile_number')),
			'email' 		=> $this->security->xss_clean($this->input->post('otp_email')),
			'created_on' 	=> date('Y-m-d H:i:s'),
		);
		$this->db->insert('tbl_registration_lead',$data);
		$session = array(
			'otp_mobile' 	=> $this->input->post('otp_mobile_number'),
			'otp_email' 	=> $this->input->post('otp_email'),
			'otp_otp' 		=> $otp,
		);
		$this->session->set_userdata($session);
		$message = "Your OTP is ".$otp. no_reply_name;
		$this->send_common_sms($this->input->post('otp_mobile_number'),$message);
		if($this->input->post('otp_email') != ""){
			$message = "Dear Student";
			$message .= "<br>Your One Time Password (OTP) for registration is ".$otp;
			$message .= "<br>";  
			$message .= "<br>Thanks<br>Team Global University";
			$this->load->library('email');
			$this->email->from(no_reply_mail ,no_reply_name);
			$this->email->to($this->input->post('otp_email')); 
			$this->email->subject('One Time Password | '.no_reply_name);
			$this->email->message($message);
			$this->email->set_mailtype('html');
			if($this->email->send()){ 
			}else{ 
			} 
		}
	}
	public function generate_enrollment_otp(){
		$otp = rand ( 10000 , 99999 );
		$this->db->where('enrollment_number',$this->input->post('enrollment'));
		$this->db->where_in('admission_status',array(1,4));
		$this->db->where('status','1');
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		if(!empty($result)){
			$session = array(
				'otp_mobile' 	=> $result->mobile,
				'en_otp' 		=> $otp,
			);
			$this->session->set_userdata($session);
			$message = "Your OTP is ".$otp. no_reply_name;
			$this->send_common_sms($result->mobile,$message);
			/*if($this->input->post('otp_email') != ""){
				$message = "Dear Student";
				$message .= "<br>Your One Time Password (OTP) for registration is ".$otp;
				$message .= "<br>";  
				$message .= "<br>Thanks<br>Team Demo University";
				$this->load->library('email');
				$this->email->from('no-replys@in','Demo University');
				$this->email->to($this->input->post('otp_email')); 
				$this->email->subject('One Time Password | Demo University');
				$this->email->message($message);
				$this->email->set_mailtype('html');
				if($this->email->send()){ 
				}else{ 
				}
			}*/
			return true;
		}else{
			return false;
		}
	}
	public function resend_e_otp(){
		$otp = rand ( 10000 , 99999 );
		$session = array(
			'en_otp' 		=> $otp,
		);
		$this->session->set_userdata($session);
		$message = "Your OTP is ".$otp."THE GLOBAL UNIVERSITY";
		$this->send_common_sms($this->session->userdata('otp_mobile'),$message);
		return true;
	}
	public function resend_otp(){
		$otp = rand ( 10000 , 99999 );
		$session = array(
			'otp_otp' 		=> $otp,
		);
		$this->session->set_userdata($session);
		$message = "Your OTP is ".$otp."THE GLOBAL UNIVERSITY";
		$this->send_common_sms($this->session->userdata('otp_mobile'),$message);
		return true;
	}
	public function verify_otp(){
		if($this->session->userdata('otp_otp') == $this->input->post('otp_code')){
			$data = array(
				'is_verified' => '1'
			);
			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
	}
	public function verify_e_library_otp(){
		if($this->session->userdata('en_otp') == $this->input->post('otp_code')){
			$data = array(
				'e_library' => '1'
			);
			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
	}
	public function send_common_sms($mobile_number,$msg){
		$authKey = SMSKEY;
		$senderId = SENDERID;
		$route = ROUTE;
		$message = $msg;
		$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobile_number,
				'message' => $message,
				'sender' => $senderId,
				'route' => $route
			);
		$url = "http://sms.bulksmsserviceproviders.com/api/send_http.php";
		$ch = curl_init();
		curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $postData
		));
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$output = curl_exec($ch);
		if (curl_errno($ch)) {
		echo 'error:' . curl_error($ch);
		}
		curl_close($ch);
		return true;
	}
	public function get_course_stream_duration(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		$result = $this->db->get('tbl_course_stream_relation');
		$result = $result->row();
		if(!empty($result)){
			if($this->input->post('course_mode') == "1"){
				$mode = "Year";
				$entry_year = $result->year_duration;
				echo "<option value=''>Select Year</option>";
				for($s=1;$s<=$entry_year;$s++){
					echo "<option value=".$s.">".$s." ".$mode." </option>";
				}
			}else if($this->input->post('course_mode') == "2"){
				$mode = "Semester";
				$entry_year = $result->sem_duration;
				echo "<option value=''>Select Semester</option>";
				for($s=1;$s<=$entry_year;$s++){
					echo "<option value=".$s.">".$s." ".$mode." </option>";
				}
			}else if($this->input->post('course_mode') == "4"){
				$mode = "Month";
				$entry_year = $result->month_duration;
				echo "<option value=''>Select Month</option>";
				for($s=1;$s<=$entry_year;$s++){
					echo "<option value=".$s.">".$s." ".$mode." </option>";
				}
			}
		}else{
			echo "<option value=''>Select Year/Semester</option>";
		}
	}
	
	public function get_course_stream_duration_separate(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		$result = $this->db->get('tbl_course_stream_relation');
		$result = $result->row();
		if(!empty($result)){
			if($result->course_mode == "1"){
				$mode = "Year";
				$entry_year = $result->year_duration;
				echo "<option value=''>Select Year</option>";
				for($s=1;$s<=$entry_year;$s++){
					echo "<option value=".$s.">".$s." ".$mode." </option>";
				}
			}else if($result->course_mode == "2"){
				$mode = "Semester";
				$entry_year = $result->sem_duration;
				echo "<option value=''>Select Semester</option>";
				for($s=1;$s<=$entry_year;$s++){
					echo "<option value=".$s.">".$s." ".$mode." </option>";
				}
			}else if($result->course_mode == "4"){
				$mode = "Month";
				$entry_year = $result->month_duration;
				echo "<option value=''>Select Month</option>";
				for($s=1;$s<=$entry_year;$s++){
					echo "<option value=".$s.">".$s." ".$mode." </option>";
				}
			}else if($result->course_mode == "3"){
				$mode = "";
				$entry_year = $result->month_duration;
				echo "<option value=''>Select duration</option>";
				for($s=1;$s<=$entry_year;$s++){
					echo "<option value=".$s.">".$s." ".$mode." </option>";
				}
			}
		}else{
			echo "<option value=''>Select Year/Semester</option>";
		}
	}
	public function get_course_stream_course_mode(){ 
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		$result = $this->db->get('tbl_course_stream_relation');
		$result = $result->row();
		if(!empty($result)){
			if($result->course_mode == "1"){ 
				echo "<option value=''>Select Course Mode</option>
					<option value='1'>Year</option>
				"; 
			}else if($result->course_mode == "2"){
				echo "<option value=''>Select Course Mode</option>
					<option value='2'>Semester</option>
				"; 
			}else if($result->course_mode == "4"){
				echo "<option value=''>Select Course Mode</option>
					<option value='4'>Month</option>
				"; 
			}else if($result->course_mode == "3"){
				echo "<option value=''>Select Course Mode</option>
					<option value='1'>Year</option>
					<option value='2'>Semester</option>
				"; 
			}
		}else{
			echo "<option value=''>Select Course Mode</option>";
		}
	}
	public function get_active_session(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$result = $this->db->get('tbl_session');
		return $result->result();
	}
	public function get_course_stream_fees(){
		//echo $this->input->post('course');
		//echo "<br>";
		//echo $this->input->post('stream');
		//exit;
		$fees = 0;
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		$relation = $this->db->get('tbl_course_stream_relation');
		$relation = $relation->row();
		if(!empty($relation)){
			$this->db->where('session_id',$this->input->post('session'));
			$this->db->where('relation_id',$relation->id);
			$this->db->where('course_id',$this->input->post('course'));
			$this->db->where('stream_id',$this->input->post('stream'));
			$result = $this->db->get('tbl_fees_realtion');
			$result = $result->row();
			if(!empty($result)){
				$fees =  $result->campus_fees;
			}else{
				$this->db->where('relation_id',$relation->id);
				$this->db->where('course_id',$this->input->post('course'));
				$this->db->where('stream_id',$this->input->post('stream'));
				$this->db->order_by('id','DESC');
				$result = $this->db->get('tbl_fees_realtion');
				$result = $result->row();
				if(!empty($result)){
					$fees =  $result->campus_fees;
				}
			}
		}
		
		if($this->input->post('country') != "101"){
			$fees = $fees*2;
		}
		$this->db->where('id',$this->input->post('session'));
		$session_fees = $this->db->get('tbl_session');
		$session_fees = $session_fees->row();
		$session_late_fees = 0;
		if(!empty($session_fees)){
			if($session_fees->late_fees_date < date("Y-m-d")){
				$session_late_fees = $session_fees->late_fees;
			}
		}
		echo $fees."@@@".$session_late_fees; 
	}
	public function set_registration($noc,$identity_file){
		$this->db->select('id,faculty,course_type,course_mode');
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$course = $this->db->get('tbl_course_stream_relation');
		$course = $course->row();
		$lateral_entry_fees = 0;
		$late_fee = $this->get_lateral_entry_fees();
		$lateral_entry_fees = 0;
		if($this->input->post('year_sem') != "1"){
			$admission_type = "1";
			$entry_year = $this->input->post('year_sem');
			$lateral_entry_fees = $late_fee->fees_amount;
		}else{
			$admission_type = "0";
			$entry_year = "0";
		}
		$data = array(
			'session_id' 		=> $this->input->post('session'),
			'faculty_id' 		=> $course->faculty,
			'course_type' 		=> $course->course_type,
			'course_mode' 		=> $this->input->post('course_mode'),
			'course_id' 		=> $this->input->post('course'),
			'stream_id' 		=> $this->input->post('stream'),
			'year_sem' 			=> $this->input->post('year_sem'),
			'student_name' 		=> $this->input->post('student_name'),
			'father_name' 		=> $this->input->post('father_name'),
			'mother_name' 		=> $this->input->post('mother_name'),
			'date_of_birth' 	=> date("Y-m-d",strtotime($this->input->post('date_of_birth'))),
			'mobile' 			=> $this->input->post('mobile'),
			'email' 			=> $this->input->post('email'),
			'id_type' 			=> $this->input->post('id_type'),
			'id_number' 		=> $this->input->post('identity_numer'),
			'identity_softcopy' => $identity_file,
			'photo' 			=> $this->input->post('hidden_image'),
			'noc'               => $noc,
			'gender' 			=> $this->input->post('gender'),
			'category' 			=> $this->input->post('category'),
			'address' 			=> $this->input->post('address'),
			'nationality' 		=> $this->input->post('nationality'),
			'country' 			=> $this->input->post('country'),
			'state' 			=> $this->input->post('state'),
			'city'	 			=> $this->input->post('city'),
			'pincode' 			=> $this->input->post('pincode'),
			'study_mode' 		=> $this->input->post('study_mode'),
			'employement_type' 	=> $this->input->post('employement_type'),
			'admission_type' 	=> $admission_type,
			'lateral_year' 		=> $entry_year,
			'admission_date' 	=> date("Y-m-d"),
			'created_on' 		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_student',$data);
		$id = $this->db->insert_id();
		$prefix = rand ( 10000 , 99999 );
		$username = array(
			'username' => $prefix.$id,
			'password' => $prefix.$id,
		);
		$this->db->where('id',$id);
		$this->db->update('tbl_student',$username);
		
		$this->db->where('session_id',$this->input->post('session'));
		$this->db->where('relation_id',$course->id);
		$this->db->where('course_id',$this->input->post('course'));
		$this->db->where('stream_id',$this->input->post('stream'));
		$result = $this->db->get('tbl_fees_realtion');
		$result = $result->row();
		$late_fees = 0;
		$this->db->where('id',$this->input->post('session'));
		$this->db->where('late_fees_date<',date("Y-m-d"));
		$seesion_late = $this->db->get('tbl_session');
		$seesion_late = $seesion_late->row();
		if(!empty($seesion_late)){
			$late_fees = $seesion_late->late_fees;
		}
		
		$fees = 0;
		if(!empty($result)){
			$fees = $result->campus_fees;
		}else{
			$this->db->where('relation_id',$course->id);
			$this->db->where('course_id',$this->input->post('course'));
			$this->db->where('stream_id',$this->input->post('stream'));
			$this->db->order_by('id','DESC');
			$result = $this->db->get('tbl_fees_realtion');
			$result = $result->row();
			if(!empty($result)){
				$fees = $result->campus_fees;
			}
		}
		if($this->input->post('country') != "101"){
			$fees = $fees*2;
		}
		
		if($this->input->post('course') == "23" && $this->input->post('fees_option') == "2"){
			$fees = $fees/2;
		}
		if($this->input->post('payment_mode') == "1"){
			$bank_id = 3;
		}else{
			$bank_id = 1;
		}
		$fees_data = array(
			'student_id' 	=> $id,
			'fees_type' 	=> 1,
			'year_sem' 		=> $this->input->post('year_sem'),
			'payment_mode' 	=> $this->input->post('payment_mode'),
			'payment_date' 	=> date("Y-m-d"),
			'bank_id' 		=> $bank_id,
			'late_fees' 	=> $late_fees,
			'lateral_entry_fees' => $lateral_entry_fees,
			'bank_fees' 	=> 0,
			'amount' 		=> $fees,
			'original_amount'=> $fees,
			'total_fees' 	=> $fees+$late_fees+$lateral_entry_fees,
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_student_fees',$fees_data);
		$fees_id = $this->db->insert_id();
		if($this->input->post('payment_mode') == "2"){
			redirect('upload_my_qualification/'.base64_encode($id)."/".base64_encode($fees_id));
		}else{
			redirect('upload_my_qualification/'.base64_encode($id)."/".base64_encode($fees_id));
		}
	}
	public function get_active_challan_bank(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('show_for_challan','1');
		$this->db->order_by('bank_name','ASC');
		$result = $this->db->get('tbl_bank');
		return $result->result();
	}
	public function get_admission_challan_student(){
		$this->db->select('tbl_student.*,tbl_course.course_name,tbl_stream.stream_name,tbl_faculty.faculty_name,tbl_session.session_name');
		$this->db->where('tbl_student.id',base64_decode($this->uri->segment(2)));
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_admission_challan_student_fees(){
		$this->db->select('tbl_student_fees.*,tbl_bank.account_holder,tbl_bank.account_number,tbl_bank.bank_name,tbl_bank.branch,tbl_bank.ifsc');
		$this->db->where('tbl_student_fees.id',base64_decode($this->uri->segment(3)));
		$this->db->where('tbl_student_fees.student_id',base64_decode($this->uri->segment(2)));
		$this->db->join('tbl_bank','tbl_bank.id = tbl_student_fees.bank_id');
		$result = $this->db->get('tbl_student_fees');
		return $result->row();
	}
	public function set_enquiry(){
		$data = array(
			'name' 			=> $this->input->post('full_name'),
			'mobile' 		=> $this->input->post('full_mobile'),
			'email' 		=> $this->input->post('full_email'),
			'query' 		=> $this->input->post('full_course'),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_enquery',$data); 
		return true;
	}
	public function get_qualification_student(){
		$this->db->where('id',base64_decode($this->uri->segment(2)));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		//$this->db->where('admission_status','0');
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_qualification_fees(){
		$this->db->where('id',base64_decode($this->uri->segment(3)));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$result = $this->db->get('tbl_student_fees');
		return $result->row();
	}
	public function update_qualification($secondary_marksheet,$sr_secondary_marksheet,$graduation_marksheet,$post_graduation_marksheet,$other_qualification_marksheet,$signature){
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
		$this->db->insert('tbl_student_qualification',$data);
		$signature_data = array(
			'signature' => $signature
		);
		$this->db->where('id',$this->input->post('student_id'));
		$this->db->update('tbl_student',$signature_data);
		if($this->input->post('payment_mode') == "1"){
			redirect('admission_payment/'.base64_encode($this->input->post('student_id'))."/".base64_encode($this->input->post('fees_id')));
		}else if($this->input->post('payment_mode') == "3"){
			redirect('print_cash_boucher/'.base64_encode($this->input->post('student_id'))."/".base64_encode($this->input->post('fees_id')));
		}else{
			redirect('print_challan/'.base64_encode($this->input->post('student_id'))."/".base64_encode($this->input->post('fees_id')));
		}
	}
	public function get_unique_admission_contact(){
		$this->db->where('mobile',$this->input->post('mobile'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_student');
		echo $result->num_rows();
	}
	public function get_unique_admission_email(){
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_student');
		echo $result->num_rows();
	}
	public function get_marquee_news(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_marquee_news');
		return $result->result();
	}
	public function get_all_course_list(){
		$this->db->select('tbl_course.course_name,tbl_course.sort_name,tbl_course.id,tbl_course_stream_relation.id as relation_id,tbl_course_stream_relation.course_mode,tbl_course_stream_relation.year_duration,tbl_course_stream_relation.sem_duration,tbl_fees_realtion.fees');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->order_by('tbl_course.course_name','ASC');
		$this->db->group_by('tbl_course_stream_relation.course');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_course_stream_relation.faculty');
		$this->db->join('tbl_course','tbl_course.id = tbl_course_stream_relation.course');
		$this->db->join('tbl_fees_realtion','tbl_fees_realtion.relation_id = tbl_course_stream_relation.id');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();		
	}
	public function get_all_active_faculty(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->order_by('faculty_name','ASC');
		$result = $this->db->get('tbl_faculty');
		return $result->result();
	}
	public function get_facilty_course_list(){
		$this->db->where('faculty_name',str_replace("-"," ",$this->uri->segment(1)));
		$faculty = $this->db->get('tbl_faculty');
		$faculty = $faculty->row(); 
		if(!empty($faculty)){
			$this->db->select('tbl_course.course_name,tbl_course.id as course_id,tbl_course.sort_name,tbl_course.id,tbl_course_stream_relation.id as relation_id,tbl_course_stream_relation.course_mode,tbl_course_stream_relation.year_duration,tbl_course_stream_relation.sem_duration,tbl_course_stream_relation.month_duration,tbl_course_stream_relation.faculty as faculty_id,tbl_fees_realtion.fees');
			$this->db->where('tbl_course_stream_relation.is_deleted','0');
			$this->db->where('tbl_course_stream_relation.status','1');
			$this->db->where('tbl_course_stream_relation.faculty',$faculty->id);
			$this->db->order_by('tbl_course.course_name','ASC');
			$this->db->group_by('tbl_course_stream_relation.course');
			$this->db->join('tbl_faculty','tbl_faculty.id = tbl_course_stream_relation.faculty');
			$this->db->join('tbl_course','tbl_course.id = tbl_course_stream_relation.course');
			$this->db->join('tbl_fees_realtion','tbl_fees_realtion.relation_id = tbl_course_stream_relation.id');
			$result = $this->db->get('tbl_course_stream_relation');
			return $result->result();		
		}
	}
	public function set_guide_application($signature,$secondary_subject_marksheet,$sr_secondary_subject_marksheet,$graduation_subject_marksheet,$post_graduation_subject_marksheet,$other_qualification_subject_marksheet,$phd_subject_marksheet,$biodata,$aadhar_card){
		$data = array(
			'name' 								=> $this->input->post('full_name'),
			'son_of' 							=> $this->input->post('son_of'),
			'date_of_birth'					 	=> date("Y-m-d",strtotime($this->input->post('date_of_birth'))),
			'phone_number' 						=> $this->input->post('phone_number'),
			'mobile' 							=> $this->input->post('mobile'),
			'email' 							=> $this->input->post('email'),
			'gender' 							=> $this->input->post('gender'),
			'photo' 							=> $this->input->post('hidden_image'),
			'signature' 						=> $signature,
			'address' 							=> $this->input->post('address'),
			'country' 							=> $this->input->post('country'),
			'state' 							=> $this->input->post('state'),
			'city' 								=> $this->input->post('city'),
			'pincode' 							=> $this->input->post('pincode'),
			'specilisation' 					=> $this->input->post('specilisation'),
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
			'other_qualification_subject_marksheet'=> $other_qualification_subject_marksheet,
			'biodata'							=> $biodata,
			'aadhar_card'                       => $aadhar_card,
			'created_on' 						=> date("Y-m-d H:i:S"),
		);
		$this->db->insert('tbl_guide_application',$data);
		return true;
	}
	public function set_enquiry_form(){
		$data = array(
			'name' 								=> $this->input->post('name'),
			'mobile' 							=> $this->input->post('mobile_number'),
			'email' 							=> $this->input->post('email'),
			'query' 							=> $this->input->post('query'),
			'created_on' 						=> date("Y-m-d H:i:S"),
		);
		$this->db->insert('tbl_enquery',$data);
		return true;
	}
	public function set_center_enquiry(){
		
		$data = array(
			'center_name' 				=> $this->input->post('center_name'),
			'head_name' 				=> $this->input->post('head_name'),
			'contact_person_name' 		=> $this->input->post('contact_person_name'),
			'mobile' 					=> $this->input->post('mobile'),
			'email' 					=> $this->input->post('email'),
			'country' 					=> $this->input->post('country'),
			'state' 					=> $this->input->post('state'),
			'city' 						=> $this->input->post('city'),
			'pincode' 					=> $this->input->post('pincode'),
			'address' 					=> $this->input->post('address'),
			'created_on' 				=> date("Y-m-d H:i:S"),
		);
		$this->db->insert('tbl_center_enquiry',$data); 
		return true;
	} 
	public function save_phd_registration($image){
		$data = array(
			'student_name' 					=> $this->input->post('student_name'),
			'father_name' 					=> $this->input->post('father_name'),
			'mother_name' 					=> $this->input->post('mother_name'),
			'profile_photo_link' 			=> $this->input->post('hidden_image'),
			'date_of_birth'					=> date("Y-m-d",strtotime($this->input->post('date_of_birth'))),
			'mobile_number' 				=> $this->input->post('mobile'),
			'email_id' 						=> $this->input->post('email'),
			'gender' 						=> $this->input->post('gender'),
			'category' 						=> $this->input->post('category'),
			'current_address' 				=> $this->input->post('address'),
			'id_type' 						=> $this->input->post('id_type'),
			'id_number' 					=> $this->input->post('id_number'),
			'nationality' 					=> $this->input->post('nationality'),
			'country' 						=> $this->input->post('country'),
			'state' 						=> $this->input->post('state'),
			'city' 							=> $this->input->post('city'),
			'pin_code' 						=> $this->input->post('pincode'),
			'course' 						=> $this->input->post('course'),
			'stream' 						=> $this->input->post('stream'),
			'semester' 						=> $this->input->post('year_sem'),
			'secondary_year' 				=> $this->input->post('secondary_year'),
			'secondary_board' 				=> $this->input->post('secondary_board'),
			'secondary_percentage' 			=> $this->input->post('secondary_percentage'),
			'secondary_marksheet' 			=> $image['secondary_marksheet'],
			'sr_secondary_year' 			=> $this->input->post('sr_secondary_year'),
			'sr_secondary_board' 			=> $this->input->post('sr_secondary_board'),
			'sr_secondary_percentage' 		=> $this->input->post('sr_secondary_percentage'),
			'sr_secondary_marksheet' 		=> $image['sr_secondary_marksheet'],
			'graduation_year' 				=> $this->input->post('graduation_year'),
			'graduation_board' 				=> $this->input->post('graduation_board'),
			'graduation_percentage' 		=> $this->input->post('graduation_percentage'),
			'graduation_marksheet' 			=> $image['graduation_marksheet'],
			'post_graduation_year' 			=> $this->input->post('post_graduation_year'),
			'post_graduation_board' 		=> $this->input->post('post_graduation_board'),
			'post_graduation_percentage' 	=> $this->input->post('post_graduation_percentage'),
			'post_graduation_marksheet' 	=> $image['post_graduation_marksheet'],
			'mphil_year' 					=> $this->input->post('mphil_year'),
			'mphil_board' 					=> $this->input->post('mphil_board'),
			'mphil_percentage' 				=> $this->input->post('mphil_percentage'),
			'mphil_marksheet' 				=> $image['mphil_marksheet'],
			'other_year' 					=> $this->input->post('other_year'),
			'other_board' 					=> $this->input->post('other_board'),
			'other_percentage' 				=> $this->input->post('other_percentage'),
			'other_marksheet' 				=> $image['other_marksheet'],
			'password'						=> rand(10,100000),
			'bank'							=> '3',
			'payment_mode'					=> $this->input->post('payment_mode'),
			'amount'						=> '10000',
			'payment_date'					=> date("Y-m-d"),
			'created_on' 					=> date("Y-m-d H:i:S"),
		);
		$this->db->insert('tbl_phd_registration_form',$data);
		$id = $this->db->insert_id();
		//$this->send_common_sms($data['mobile_number'],$sms_login);
		if($this->input->post('payment_mode') == "1"){
			redirect('phd_registration_payment/'.base64_encode($id));
			//redirect('phd_registration_payment_freecharge/'.base64_encode($id));
		}else{
			redirect('phd_registration_cash/'.base64_encode($id));
		}
	}
	public function get_phd_registration_cash(){
		$this->db->select('tbl_phd_registration_form.*,tbl_course.print_name,tbl_stream.stream_name');
		$this->db->where('tbl_phd_registration_form.id',base64_decode($this->uri->segment(2)));
		$this->db->join('tbl_course','tbl_course.id = tbl_phd_registration_form.course');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_phd_registration_form.stream');
		$result = $this->db->get('tbl_phd_registration_form');
		return $result->row();
	}
	public function get_phd_course(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('id','23');
		$result = $this->db->get('tbl_course');
		return $result->result();
	}
	public function set_career_form($file){
		$data = array(
			'name' 			         => $this->input->post('name'),
			'mobile_number'          => $this->input->post('mobile_number'),
			'email' 		         => $this->input->post('email'),
			'position' 		         => $this->input->post('position'),
			'last_qualification'     => $this->input->post('last_qualification'),
			'work_experience'        => $this->input->post('work_experience'),
			'present_working'        => $this->input->post('present_working'),
			'state'        => $this->input->post('state'),
			'full_address'        => $this->input->post('full_address'),
			'userfile' 		         => $file,
		);
		$this->db->insert('tbl_career',$data);
		$message = "Dear Sir";
		$message .= "<br>Please check below details for the postion of ".$this->input->post('position');
		$message .= "<br>";  
		$message .= "Name: ".$this->input->post('name');  
		$message .= "<br>";  
		$message .= "Mobile: ".$this->input->post('mobile_number');  
		$message .= "<br>";  
		$message .= "Email: ".$this->input->post('email');  
		$message .= "<br>";  
		$message .= "Position: ".$this->input->post('position');  
		$message .= "<br>";  
		$message .= "<br>Thanks,<br>Team Global University";
		$this->load->library('email');
		$this->email->from(no_reply_mail , no_reply_name);
		$this->email->to('info@theglobaluniversity.edu.in'); 
		$this->email->subject('Career Form | '. no_reply_name);
		$this->email->message($message);
		$this->email->attach("images/career/".$file);
		$this->email->set_mailtype('html');
		if($this->email->send()){ 
		}else{ 
		}
		return true;
	} 
	public function get_lateral_entry_fees(){
		$result = $this->db->get('tbl_lateral_entry_fees');
		return $result->row();
	}
	public function generate_examination_otp(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('admission_status','1');
		//$this->db->where('session_id','2');
		$this->db->where('enrollment_number',$this->input->post('enrollment_number'));
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		if(!empty($result)){
			if($result->course_mode == "1"){
				if($result->session_id == "2"){
					$otp = rand ( 10000 , 99999 );
					$session = array(
						'exam_session_id'=> $result->id,
						'exam_mobile' 	=> $result->mobile,
						'exam_email' 	=> $result->email,
						'exam_otp' 		=> $otp,
						'is_validated' 	=> '1',
					);
					$this->session->set_userdata($session);
					return true;
				}
			}else if($result->course_mode == "2"){
				if($result->session_id == "2" || $result->session_id == "3" || $result->session_id == "1"){
					$otp = rand ( 10000 , 99999 );
					$session = array(
						'exam_session_id'=> $result->id,
						'exam_mobile' 	=> $result->mobile,
						'exam_email' 	=> $result->email,
						'exam_otp' 		=> $otp,
						'is_validated' 	=> '1',
					);
					$this->session->set_userdata($session);
					return true;
				}
			}
			/*$message = "Your OTP is ".$otp."THE GLOBAL UNIVERSITY";
			$this->send_common_sms($result->mobile,$message);
			if($result->email != ""){
				$message = "Dear Student";
				$message .= "<br>Your One Time Password (OTP) for registration is ".$otp;
				$message .= "<br>";  
				$message .= "<br>Thanks<br>Team Birtikendrajit University";
				$this->load->library('email');
				$this->email->from('no-reply@birtikendrajituniversity.com','Birtikendrajit University');
				$this->email->to($result->email); 
				$this->email->subject('One Time Password | Birtikendrajit University');
				$this->email->message($message);
				$this->email->set_mailtype('html');
				if($this->email->send()){ 
				}else{ 
				} 
			}*/
			return false;
		}else{
			return false;
		}	
	}
	public function re_generate_examination_otp(){
		$otp = rand ( 10000 , 99999 );
		$session = array( 
			'exam_otp' 		=> $otp,
		);
		$this->session->set_userdata($session);
		$message = "Your One is ".$otp. no_reply_name;
		$this->send_common_sms($this->session->userdata('exam_mobile'),$message);
		if($result->email != ""){
			$message = "Dear Student";
			$message .= "<br>Your One Time Password (OTP) for registration is ".$otp;
			$message .= "<br>";  
			$message .= "<br>Thanks,<br>Team Global University";
			$this->load->library('email');
			$this->email->from(no_reply_mail , no_reply_name);
			$this->email->to($this->session->userdata('exam_email')); 
			$this->email->subject('One Time Password | '. no_reply_name);
			$this->email->message($message);
			$this->email->set_mailtype('html');
			if($this->email->send()){ 
			}else{ 
			} 
		}
		return true;
	}
	public function get_examination_student(){
		$this->db->select('tbl_student.*,tbl_course.print_name,tbl_stream.stream_name,tbl_session.session_name');
		$this->db->where('tbl_student.id',$this->session->userdata('exam_session_id'));
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_examination_cash_boucher_student(){
		$this->db->select('tbl_student.*,tbl_course.course_name,tbl_stream.stream_name,tbl_session.session_name,tbl_student_fees.payment_mode,tbl_student_fees.total_fees,tbl_student_fees.payment_date');
		$this->db->where('tbl_student_fees.id',base64_decode($this->uri->segment(2)));
		$this->db->join('tbl_student','tbl_student.id = tbl_student_fees.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$result = $this->db->get('tbl_student_fees');
		return $result->row();
	}
	public function set_examination_form(){
		$student_data = $this->get_examination_student();
		$data = array(
			'student_id' 		=> $student_data->id,
			'exam_month' 		=> "December",
			'exam_year' 		=> '2021',
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
		
		$this->db->insert('tbl_examination_form',$data);
		$last_id = $this->db->insert_id();
		$subject = $this->input->post('subject');
		$subject_arr = array();
		for($i=0;$i<count($subject);$i++){
			$subject_arr[] = array(
				'student_id' 		=> $student_data->id,
				'exam_form_id' 		=> $last_id,
				'subject_id' 		=> $subject[$i],
				'created_on'		=> date("Y-m-d H:i:s")
			);
		}
		if(!empty($subject_arr)){
			$this->db->insert_batch('tbl_exam_subject',$subject_arr);
		}
		$fees_data = array(
			'student_id' 		=> $student_data->id, 
			'examination_id' 	=> $last_id, 
			'fees_type' 		=> 2, 
			'payment_mode' 		=> $this->input->post('payment_mode'), 
			'payment_date' 		=> date("Y-m-d"), 
			'bank_id' 			=> 3,
			'late_fees' 		=> $this->input->post('late_fees'),
			'lateral_entry_fees'=> '0',
			'bank_fees'			=> '0',
			'original_amount'	=> $this->input->post('examination_fees'),
			'amount'			=> $this->input->post('examination_fees'),
			'amount'			=> $this->input->post('examination_fees'),
			'discount'			=> '0',
			'total_fees'		=> $this->input->post('total_examination_fees'),
			'year_sem'			=> $this->input->post('year_sem'),
			'created_on'		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_student_fees',$fees_data);
		$fess_id = $this->db->insert_id();
		if($this->input->post('payment_mode') == "3"){
			redirect('print_exam_cash_boucher/'.base64_encode($fess_id));
		}
		return base64_encode($fess_id);
	}
	public function get_examination_form_fees_details(){
		$this->db->where('id',base64_decode($this->uri->segment(2)));
		$this->db->where('student_id',$this->session->userdata('exam_session_id'));
		$result = $this->db->get('tbl_student_fees');
		return $result->row();
	}
	public function get_examination_subjct($student,$course,$stream,$year_Sem,$center){
		
		$this->db->where('course',$course);
		$this->db->where('stream',$stream);
		$this->db->where('year_sem',$year_Sem);
		//$this->db->where('center_id',$center);
		$this->db->where('status','1');
		$this->db->where('is_deleted','0');
		$this->db->order_by('subject_type','DESC');
		$result = $this->db->get('tbl_subject');
		
		return $result->result();
	}
	public function get_hall_ticket(){
		if($this->input->post('enrollment_number') !=""){
			//echo date("Y-m-d",strtotime($this->input->post('date_of_birth')));exit;
			$this->db->select('tbl_examination_form.*,tbl_student.student_name,tbl_student.father_name,tbl_student.category,tbl_student.address,tbl_student.enrollment_number,tbl_student.photo,tbl_student.signature,tbl_stream.stream_name,tbl_course.print_name,tbl_student.date_of_birth');
			$this->db->where('tbl_examination_form.exam_month',"December");
			$this->db->where('tbl_examination_form.exam_year',"2021");
			$this->db->where('tbl_examination_form.exam_status',"1");
			$this->db->where('tbl_examination_form.status',"1");
			$this->db->where('tbl_examination_form.is_deleted',"0");
			$this->db->where('tbl_student.admission_status',"1");
			$this->db->where('tbl_student.enrollment_number',$this->input->post('enrollment_number'));
			//$this->db->where('tbl_student.date_of_birth',date("Y-m-d",strtotime($this->input->post('date_of_birth'))));
			$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
			$this->db->join('tbl_course','tbl_course.id = tbl_examination_form.course_name');
			$this->db->join('tbl_stream','tbl_stream.id = tbl_examination_form.stream_name');
			$result = $this->db->get('tbl_examination_form');
			$result = $result->row();
			
			if(!empty($result)){
				return $result;
			}else{
				$this->session->set_flashdata('message','Hallticket is not available');
				redirect('hallticket');
			}
		}
	}
	public function get_center_student_hall_ticket(){
		$this->db->select('tbl_examination_form.*,tbl_student.student_name,tbl_student.father_name,tbl_student.category,tbl_student.address,tbl_student.enrollment_number,tbl_student.photo,tbl_student.signature,tbl_stream.stream_name,tbl_course.print_name,tbl_student.date_of_birth');
		//$this->db->where('tbl_examination_form.exam_month',"December");
		//$this->db->where('tbl_examination_form.exam_year',"2021");
		$this->db->where('tbl_examination_form.exam_status',"1");
		$this->db->where('tbl_examination_form.status',"1");
		$this->db->where('tbl_examination_form.is_deleted',"0");
		$this->db->where('tbl_student.admission_status',"1");
		$this->db->where('tbl_student.enrollment_number',$this->uri->segment(2));
		$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_examination_form.course_name');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_examination_form.stream_name');
		$result = $this->db->get('tbl_examination_form');
		$result = $result->row();
		if(!empty($result)){
			return $result;
		}else{
			$this->session->set_flashdata('message','Hallticket is not available');
			redirect('center_active_hall_ticket_list');
		}
	}
	public function get_hall_ticket_subject($exam,$student){
		$this->db->select('tbl_subject.*');
		$this->db->where('tbl_exam_subject.student_id',$student);
		$this->db->where('tbl_exam_subject.exam_form_id',$exam);
		$this->db->where('tbl_exam_subject.is_deleted','0');
		$this->db->join('tbl_subject','tbl_subject.id = tbl_exam_subject.subject_id');
		$result = $this->db->get('tbl_exam_subject');
		return $result->result();
	}
	public function get_my_result(){
		if(substr($this->input->post('enrollment_number'), 0,5)=="20100"){
			$this->db->select('tbl_exam_results.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.course_mode,tbl_student.father_name,tbl_exam_results.examination_month,tbl_exam_results.examination_year');
			$this->db->where('tbl_exam_results.enrollment_number',$this->input->post('enrollment_number'));
			$this->db->where('tbl_exam_results.examination_status',$this->input->post('examination_status'));
			$this->db->where('tbl_exam_results.year_sem',$this->input->post('year_sem'));
			$this->db->where('tbl_examination_form.year_sem',$this->input->post('year_sem'));
			$this->db->where('tbl_examination_form.exam_status','1');
			$this->db->where('tbl_examination_form.payment_status','1');
			$this->db->where('tbl_exam_results.is_deleted','0');
			$this->db->where('tbl_exam_results.status','1');
			$this->db->where('tbl_student.status','1');
			$this->db->join('tbl_student','tbl_student.id = tbl_exam_results.student_id');
			$this->db->join('tbl_examination_form','tbl_examination_form.student_id = tbl_exam_results.student_id');
			$this->db->join('tbl_course','tbl_course.id = tbl_exam_results.course_id');
			$this->db->join('tbl_stream','tbl_stream.id = tbl_exam_results.stream_id');
			$result = $this->db->get('tbl_exam_results');
		}else{
			$this->db->select('tbl_separate_student_exam_results.*,tbl_course.course_name,tbl_stream.stream_name,tbl_separate_student.student_name,tbl_separate_student.course_mode,tbl_separate_student.father_name,tbl_separate_student_exam_results.examination_month,tbl_separate_student_exam_results.examination_year');
			$this->db->where('tbl_separate_student_exam_results.enrollment_number',$this->input->post('enrollment_number'));
			$this->db->where('tbl_separate_student_exam_results.examination_status',$this->input->post('examination_status'));
			$this->db->where('tbl_separate_student_exam_results.year_sem',$this->input->post('year_sem'));
			$this->db->where('tbl_separate_student_exam_results.is_deleted','0');
			$this->db->where('tbl_separate_student_exam_results.status','1');
			
			$this->db->where('tbl_separate_student.status','1');
			
			$this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_exam_results.student_id');
			$this->db->join('tbl_course','tbl_course.id = tbl_separate_student_exam_results.course_id');
			$this->db->join('tbl_stream','tbl_stream.id = tbl_separate_student_exam_results.stream_id');
			$result = $this->db->get('tbl_separate_student_exam_results');
		}
		return $result->row();
	}
	public function get_re_registration_form(){
		$this->db->select('tbl_student.*,tbl_course.print_name,tbl_stream.stream_name,tbl_session.session_name');
		$this->db->where('tbl_student.enrollment_number',$this->input->post('enrollment_number'));
		$this->db->where('tbl_student.date_of_birth',date("Y-m-d",strtotime($this->input->post('date_of_birth'))));
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function set_re_registration(){
		$data = array(
			'year_sem' => $this->input->post('year_sem')
		);
		$this->db->where('id',$this->session->userdata('re_registration_id'));
		$this->db->update('tbl_student',$data);
		$result =  $this->get_single_student($this->session->userdata('re_registration_id'));

		$maintain_data = array(
			"student_id"=>$result->id,
			"enrollment_number"=>$result->enrollment_number,
			"previous_year_sem"=>$result->year_sem-1,
			"current_year_sem"=>$result->year_sem,
			"course_mode"=>$result->course_mode,
			"created_on"=>date("Y-m-d H:i:s"),
			"payment_status"=>'1',
		);
		$this->db->insert("tbl_re_registered_student",$maintain_data);
		return true;
	}

		

	public function get_single_student($id){
		$this->db->select('tbl_student.*,tbl_fees_realtion.fees');
		$this->db->where('tbl_student.id',$id);
		$this->db->join('tbl_fees_realtion','tbl_fees_realtion.course_id = tbl_student.course_id AND tbl_fees_realtion.stream_id = tbl_student.stream_id AND tbl_fees_realtion.session_id = tbl_student.session_id');
		$result = $this->db->get('tbl_student');
		// print_r($result->row());exit;
		return $result->row();
	}
	
	public function get_single_student_details($id){
		$this->db->where('id',$id);
		$result = $this->db->get('tbl_student');
		return $result->row();
	}

	public function student_reregistration_payment_process($stu_id,$stu_fees,$stu_year_sem){
		$data = array(
    		"student_id"		=> $stu_id,
    		"fees_type"			=> '4',		
    		"payment_mode"		=> '1',		
    		"bank_id"			=> '2',		
    		"payment_date"		=> date("Y-m-d"),
    		"original_amount"	=> $stu_fees,		
    		"amount"			=> $stu_fees,		
    		"total_fees"		=> $stu_fees,		
    		"year_sem"			=> $stu_year_sem,
    		"created_on"		=> date("Y-m-d H:i:s"),
    	);
    	$this->db->insert("tbl_student_fees",$data);
    	$id = $this->db->insert_id();
    	return $id;
	}

	public function update_student_reregistration_payment(){
		if(isset($_REQUEST['status'])){
				if($_REQUEST['status'] == 'COMPLETED'){ 
					$data = array(
						'transaction_id' 	=> $_REQUEST['txnId'],
						'payment_status' 	=> '1',
					);
				$this->db->where('tbl_student_fees.id',$this->input->get('payment_id'));
				$this->db->update('tbl_student_fees',$data);

				$stu_data = array(
					"year_sem"=>$this->input->get("year_sem"),
				);
				$this->db->where("tbl_student.id",$this->input->get('student_id'));
				$this->db->update("tbl_student",$stu_data);

				$result =  $this->get_single_student($this->input->get('student_id'));

				$maintain_data = array(
					"transaction_id"=>$_REQUEST['txnId'],
					"current_year_sem"=>$result->year_sem,
					"payment_status"=>'1',
				);
				$this->db->where("tbl_re_registered_student.id",$this->input->get("student_re_registration_id"));
				$this->db->update("tbl_re_registered_student",$maintain_data);
				$return_data = array(
					"transaction_id"=> $_REQUEST['txnId'],
					"student_name" =>$result->student_name,
					"address"       =>$result->address,
					"mobile"	=>$result->mobile,
					"fees"      =>$result->fees,
				);
				return $return_data;
			}
		}
	}

	public function set_re_registered_student($id,$fees){
		$result =  $this->get_single_student_details($id);
		$maintain_data = array(
			"student_id"		=> $result->id,
			"enrollment_number"	=> $result->enrollment_number,
			"previous_year_sem"	=> $result->year_sem,
			"course_mode"		=> $result->course_mode,
			"payment_amount"	=> $fees,
			"created_on"		=> date("Y-m-d H:i:s"),
		); 
		
		$this->db->insert("tbl_re_registered_student",$maintain_data);
		$ins_id = $this->db->insert_id();
		return $ins_id;
	}

	public function check_stu_re_registration($stu_enrollment_number,$stu_course_mode){
		$this->db->where("is_deleted","0");
		$this->db->where("status","1");
		$this->db->where("enrollment_number",$stu_enrollment_number);
		$this->db->order_by("id","DESC");
		$result = $this->db->get("tbl_re_registered_student")->row();
		if(!empty($result)){
			$create_date = $result->created_on;
		$create_date = strtotime($create_date);
		$today_date = strtotime(date("Y-m-d H:i:s"));
		$differ_date = round(($today_date-$create_date)/(60*60*24*30));
		if($stu_course_mode==1){
			if($differ_date<12){
				return true;
			}
		}else{
			if($differ_date<4){
				return true;
			}
		}
		}
	}

	public function get_course_wise_stream(){
		$course_id = base64_decode($this->uri->segment(2));
		$this->db->select('tbl_stream.stream_name,tbl_stream.id');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->where('tbl_course_stream_relation.course',$course_id);
		$this->db->order_by('tbl_stream.stream_name','ASC');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();
	}
	public function get_student_data_ajax(){
		$this->db->where('is_deleted','0');
		$this->db->where('enrollment_number',$this->input->post('enrollment_number'));
		$result = $this->db->get('tbl_student');
		echo json_encode($result->row());
	}
	public function set_demo_payment(){
		$data = array(
			'enrollment_number' 	=> $this->input->post('enrollment_number'),
			'student_name' 			=> $this->input->post('student_name'),
			'student_id' 			=> $this->input->post('student_id'),
			'mobile_number' 		=> $this->input->post('mobile_number'),
			'email' 				=> $this->input->post('email'),
			'fees_type' 			=> $this->input->post('fees_type'),
			'total_fees' 			=> $this->input->post('total_fees'),
			'created_on'			=> date("Y-m-d H:i:s"),
		);
		$this->db->update('tbl_demo_payment',$data);
		return true;
	}

	

	// 6/8/2021   
	public function get_student_data_by_enrollment_no(){
		$this->db->select("tbl_student.*,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_student.is_deleted","0");
		$this->db->where("tbl_student.status","1");
		$this->db->where("tbl_student.course_id","23");
		$this->db->where("tbl_student.enrollment_number",$this->input->post("enrollment_number"));


		$this->db->join("countries","countries.id=tbl_student.country");
		$this->db->join("states","states.id=tbl_student.state");
		$this->db->join("cities","cities.id=tbl_student.city");
		$this->db->join("tbl_course","tbl_course.id=tbl_student.course_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_student.stream_id");


		$result = $this->db->get("tbl_student");
		if(!empty($result->row())){
			return $result->row();
		}else{
			$this->session->set_flashdata("message","invalid enrollment no.");
			redirect("phd_course_work/enrollment");
		}
	}

	public function set_phd_course_work_form_data(){
		//  echo "hello";exit;
		$data = array(
			"registration_id"		=>$this->input->post("student_no"),
			"student_name"			=>$this->input->post("student_name"),
			"father_name"			=>$this->input->post("father_name"),
			"mother_name"			=>$this->input->post("mother_name"),
			"date_of_birth"			=>date("Y-m-d",strtotime($this->input->post("date_of_birth"))),
			"mobile"				=>$this->input->post("mobile"),
			"email"					=>$this->input->post("email"),
			"gender"				=>$this->input->post("gender"),
			"address"				=>$this->input->post("address"),
			"country_id"			=>$this->input->post("country_id"),
			"state_id"				=>$this->input->post("state_id"),
			"city_id"				=>$this->input->post("city_id"),
			"pincode"				=>$this->input->post("pincode"),
			"enrollment_number"		=>$this->input->post("enrollment_no"),
			"schedule"				=>$this->input->post("schedule"),
			"course_id"				=>$this->input->post("course_id"),
			"stream_id"				=>$this->input->post("stream_id"),
			"year_sem"				=>$this->input->post("year_sem"),
			"date_of_registration"	=>$this->input->post("date_of_registration"),
			"payment_ammount"		=>$this->input->post("payment_ammount"),
			"created_on"			=>date("Y-m-d H:i:s"),
		);
		
		$this->db->insert("tbl_phd_course_work",$data);
		$rel_id = $this->db->insert_id();

		$bank_name = $this->input->post("bank_name");
		$payment_mode = $this->input->post("payment_mode");
		$transaction_no = $this->input->post("transaction_no");
		$deposit_date = $this->input->post("deposit_date");
		$ammount = $this->input->post("ammount");

		for($i=0;$i<count($bank_name);$i++){
			$bank_data = array(
				"bank_name"			=> $bank_name[$i],
				"payment_mode"		=> $payment_mode[$i],
				"transaction_id"	=> $transaction_no[$i],
				"deposit_date"		=> $deposit_date[$i],
				"ammount"			=> $ammount[$i],
				"rel_id"			=> $rel_id,
				"enrollment_no"		=> $this->input->post("enrollment_no"),
				"created_on"		=> date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_phd_course_work_bank_details",$bank_data);
		}
		redirect("phd_course_work_payment/".base64_encode($rel_id));
	}

	public function get_phd_course_work_schedule_dates(){
		$this->db->where("is_deleted","0");
		$this->db->where("status","1");
		$result = $this->db->get("tbl_phd_course_work_schedules");
		return $result->result();
	}

	public function get_phd_course_work_student_data(){
		$this->db->select("tbl_phd_course_work.*,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_phd_course_work.id",base64_decode($this->uri->segment(2)));

		$this->db->join("countries","countries.id=tbl_phd_course_work.country_id");
		$this->db->join("states","states.id=tbl_phd_course_work.state_id");
		$this->db->join("cities","cities.id=tbl_phd_course_work.city_id");
		$this->db->join("tbl_course","tbl_course.id=tbl_phd_course_work.course_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_phd_course_work.stream_id");


		$result = $this->db->get("tbl_phd_course_work");
		return $result->row();
	}
	
	public function enrollment_verification(){
		if(substr($this->input->post("enrollment_number"), 0,5)=="20100"){
			$this->db->select("tbl_student.*,tbl_course.course_name,tbl_stream.stream_name");
			$this->db->where("tbl_student.is_deleted",'0');
			$this->db->where("tbl_student.status",'1');
			$this->db->where("tbl_student.verified_status",'1');
			$this->db->where('tbl_student.enrollment_number',$this->input->post("enrollment_number"));

			$this->db->join('tbl_course',"tbl_course.id = tbl_student.course_id");
			$this->db->join('tbl_stream',"tbl_stream.id = tbl_student.stream_id");

			$result = $this->db->get("tbl_student")->row();
		}else{
			$this->db->select("tbl_separate_student.*,tbl_course.course_name,tbl_stream.stream_name");
			$this->db->where("tbl_separate_student.is_deleted",'0');
			$this->db->where("tbl_separate_student.status",'1');
			
			$this->db->where('tbl_separate_student.enrollment_number',$this->input->post("enrollment_number"));

			$this->db->join('tbl_course',"tbl_course.id = tbl_separate_student.course_id");
			$this->db->join('tbl_stream',"tbl_stream.id = tbl_separate_student.stream_id");

			$result = $this->db->get("tbl_separate_student")->row();
			// print_r($result);exit;
		}
		return $result;
	}
	
	
	
	// document verification 

	public function document_verification($documents){
		$data = array(
			"name"=>$this->input->post("name"),
			"address"=>$this->input->post("address"),
			"city"=>$this->input->post("city"),
			"pin_code"=>$this->input->post("pin_code"),
			"mobile_number"=>$this->input->post("mobile_number"),
			"email"=>$this->input->post("email"),
			"student_name"=>$this->input->post("student_name"),
			"enrollment_number"=>$this->input->post("enrolment_number"),
			"passing_year"=>$this->input->post("passing_year"),
			"course_name"=>$this->input->post("course_name"),
			"query"=>$this->input->post("query"),
			"amount"=>1000,
			"created_on"=>date("Y-m-d H:i:s"),
		);
		$this->db->insert("tbl_document_verification",$data);
		$id = $this->db->insert_id();

		$count = count($documents);
		$document_name = $this->input->post("document_name");
		for($i=0;$i<$count;$i++){
			$detail_data = array(
				"document_name"=>$document_name[$i],
				"document"=>$documents[$i],
				"document_verification_rel"=>$id,
				"created_on"=>date("Y-m-d H:i:s"),
			);
			$this->db->insert("tbl_document_verification_data",$detail_data);
		}
		redirect("document_verification_payment/".base64_encode($id));
	}

	public function get_document_verification_student_data(){
		$this->db->where("is_deleted","0");
		$this->db->where("status","1");
		$this->db->where("id",base64_decode($this->uri->segment(2)));
		$result = $this->db->get("tbl_document_verification")->row();
		return $result;
	}
	public function set_caste_based_discrimination(){
		$data = array(
			'first_name' 		=> $this->input->post('first_name'),
			'last_name' 		=> $this->input->post('last_name'),
			'gender' 			=> $this->input->post('gender'),
			'student_teacher' 	=> $this->input->post('student_teacher'),
			'mobile_number' 	=> $this->input->post('mobile_number'),
			'email' 			=> $this->input->post('email'),
			'complaint' 		=> $this->input->post('complaint'),
			"created_on"		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert("tbl_caste_discrimination",$data);
		return true;
	}
	public function get_student_fees($course, $stream, $session, $country){
		$fees = 0;
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$course);
		$this->db->where('stream',$stream);
		$relation = $this->db->get('tbl_course_stream_relation');
		$relation = $relation->row();
		if(!empty($relation)){
			$this->db->where('session_id',$session);
			$this->db->where('relation_id',$relation->id);
			$this->db->where('course_id',$course);
			$this->db->where('stream_id',$stream);
			$result = $this->db->get('tbl_fees_realtion');
			$result = $result->row();
			if(!empty($result)){
				$fees =  $result->fees;
			}else{
				$this->db->where('relation_id',$relation->id);
				$this->db->where('course_id',$course);
				$this->db->where('stream_id',$stream);
				$this->db->order_by('id','DESC');
				$result = $this->db->get('tbl_fees_realtion');
				$result = $result->row();
				if(!empty($result)){
					$fees =  $result->fees;
				}
			}
		}
		return $fees;
		
	}
	public function update_payment_details($tracking_id,$order_id){
		$data = array(
			'transaction_id' 	=> $tracking_id,
			'payment_status' 	=> '1',
		);
		$this->db->where('id',$order_id);
		$this->db->update('tbl_student_fees',$data);
		
		$this->db->where('id',$this->session->userdata('re_reg_id'));
		$result = $this->db->get('tbl_re_registered_student');
		$result = $result->row();
		$previous_year_sem = 0;
		if(!empty($result)){
			$previous_year_sem = $result->previous_year_sem;
		}
		$current_year_sem = $previous_year_sem+1;
		
		$data_two = array(
			'transaction_id' 	=> $tracking_id,
			'payment_status' 	=> '1',
			'current_year_sem' 	=> $current_year_sem,
		);
		$this->db->where('id',$this->session->userdata('re_reg_id'));
		$this->db->update('tbl_re_registered_student',$data_two);
		
		$session = array(
			'session_amount' 	=> '',
			'order_id' 			=> '',
			're_reg_id' 		=> '',
		);
		$this->session->set_userdata($session);
		
		$this->session->set_flashdata('message','Re-registration Successfully.');
		redirect(base_url());
	}
	public function verify_supervisor(){
		$this->db->where('password',$this->input->post('password'));
		$this->db->where('appliation_status','1');
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$result = $this->db->get('tbl_guide_application');
		$result = $result->row();
		if(!empty($result)){
			redirect('appointment-letter-for-supervisors/'.base64_encode($result->id));
		}else{
			return 0;
		}
	}
	public function get_single_guide_data(){
		$this->db->select('tbl_guide_application.*,cities.name as city_name, countries.name as country_name, states.name as state_name');
		$this->db->where('tbl_guide_application.id',base64_decode($this->uri->segment(2)));
		$this->db->where('tbl_guide_application.is_deleted','0');
		$this->db->where('tbl_guide_application.status','1');
		$this->db->join('countries','countries.id = tbl_guide_application.country');
		$this->db->join('states','states.id = tbl_guide_application.state');
		$this->db->join('cities','cities.id = tbl_guide_application.city');
		$result = $this->db->get('tbl_guide_application');
		return $result->row();
	}
	public function get_meta_data(){
		$currentURL = current_url();
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('url',$currentURL);
		$result = $this->db->get('tbl_seo_title');
		$result = $result->row();
		return $result;
	}
	public function get_indian_state(){
		$this->db->where('country_id','101');
		$result = $this->db->get('states');
		return $result->result();
	}
	public function get_online_classes(){
		$this->db->where('enrollment_number',$this->input->post('enrollment'));
		$user = $this->db->get('tbl_student');
		$user = $user->row();
		$this->db->select('tbl_online_classes.*,tbl_course.course_name');
		$this->db->where('tbl_online_classes.is_deleted','0');
		$this->db->where('tbl_online_classes.course_id',$user->course_id);
		$this->db->where('Date(tbl_online_classes.created_on)',date("Y-m-d"));
		$this->db->join('tbl_course','tbl_course.id = tbl_online_classes.course_id');
		$result = $this->db->get('tbl_online_classes');
		return $result->result();
	}
} 