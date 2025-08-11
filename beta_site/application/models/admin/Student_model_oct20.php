<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Student_model extends CI_Model { 
	public function get_all_new_admission_pending_ajax($length,$start,$search){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.admission_status','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(tbl_student.created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(tbl_student.created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_id_management.id_name',$search);
			$this->db->or_like('tbl_student.id_number',$search);
			$this->db->or_like('tbl_student.gender',$search);
			$this->db->or_like('tbl_student.category',$search);
			$this->db->or_like('tbl_student.address',$search);
			$this->db->or_like('tbl_student.nationality',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_student.pincode',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			//$this->db->or_like('tbl_stream.id_number',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id','DESC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->result();		
	}
	public function get_all_new_admission_pending_count($search){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.admission_status','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(tbl_student.created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(tbl_student.created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_id_management.id_name',$search);
			$this->db->or_like('tbl_student.id_number',$search);
			$this->db->or_like('tbl_student.gender',$search);
			$this->db->or_like('tbl_student.category',$search);
			$this->db->or_like('tbl_student.address',$search);
			$this->db->or_like('tbl_student.nationality',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_student.pincode',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			//$this->db->or_like('tbl_stream.id_number',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id','ASC');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->num_rows();
	}
	public function get_student_for_enrolled(){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.admission_status','0');
		$this->db->where('tbl_student.id',$this->uri->segment(2));
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_student_fees_for_enrolled(){
		$this->db->select('tbl_student_fees.*');
		$this->db->where('tbl_student_fees.is_deleted','0');
		$this->db->where('tbl_student_fees.status','1');
		$this->db->where('tbl_student_fees.fees_type','1');
		$this->db->where('tbl_student_fees.payment_status','0');
		$this->db->where('tbl_student_fees.student_id',$this->uri->segment(2));
		$result = $this->db->get('tbl_student_fees');
		return $result->row();
	}
	public function get_active_bank(){
		$this->db->where('is_deleted','0');
		$this->db->order_by('bank_name','ASC');
		$result = $this->db->get('tbl_bank');
		return $result->result();
	}
	public function enroll_validate_password(){
		$exist = $this->Setting_model->get_password_setting();
		if(!empty($exist) && $exist->enrollment == $this->input->post('password')){
			$session = array(
				'enroled_password' => '1' 
			);
			$this->session->set_userdata($session);
			return true;
		}else{
			return false;
		}
	}
	public function get_unique_transaction(){
		$this->db->where('is_deleted','0');
		$this->db->where('payment_status','1');
		$this->db->where('id !=',$this->input->post('fees'));
		$this->db->where('transaction_id',$this->input->post('transaction_id'));
		$result = $this->db->get('tbl_student_fees');
		echo $result->num_rows();
	}
	public function generate_enrollment_number(){
		$data = array(
			'year_sem' 			=> $this->input->post('year_sem'),
			'payment_mode' 		=> $this->input->post('payment_mode'),
			'payment_date' 		=> date("Y-m-d",strtotime($this->input->post('payment_date'))),
			'payment_status' 	=> $this->input->post('payment_status'),
			'transaction_id' 	=> $this->input->post('transaction_id'),
			'bank_id' 			=> $this->input->post('bank'),
			'late_fees' 		=> $this->input->post('late_fees'),
			'bank_fees' 		=> $this->input->post('bank_fees'),
			'amount' 			=> $this->input->post('amount'),
			'lateral_entry_fees' => $this->input->post('lateral_entry_fees'),
			'original_amount' 	=> $this->input->post('original_amount'),
			'discount' 			=> $this->input->post('discount'),
			'total_fees' 		=> $this->input->post('total_fees'),
			'remark' 			=> $this->input->post('remark'),
		);
		$this->db->where('id',$this->input->post('fees_id'));
		$this->db->update("tbl_student_fees",$data);
		$admission = array(
			'admission_status' => $this->input->post('payment_status')
		);
		$this->db->where('id',$this->input->post('student_id'));
		$this->db->update("tbl_student",$admission);
		if($this->input->post('payment_status') == "1"){
			
			$this->db->where('id',$this->input->post('student_id'));
			$student_details = $this->db->get("tbl_student");
			$student_details = $student_details->row();
			$this->db->where('id',$student_details->faculty_id);
			$faculty = $this->db->get('tbl_faculty');
			$faculty = $faculty->row();

			$this->db->where('faculty',$student_details->faculty_id);
			$this->db->where('course',$student_details->course_id);
			$this->db->where('stream',$student_details->stream_id);
			$this->db->where('is_deleted','0');
			$this->db->where('status','1');
			$course_code = $this->db->get('tbl_course_stream_relation');
			$course_code = $course_code->row();
			$enrollment = "20100";
			if(!empty($faculty)){
				$enrollment .= $faculty->faculty_code;
			}
			if(!empty($course_code)){
				$enrollment .= $course_code->course_code;
			}
			$enrollment .=$this->input->post('student_id');
			
			$enorlled_data = array(
				'admission_status' 	=> $this->input->post('payment_status'),
				'enrollment_number' => $enrollment,
				'enrollment_date' 	=> date("Y-m-d"),
			);
			$this->db->where('id',$this->input->post('student_id'));
			$this->db->update("tbl_student",$enorlled_data);
			
			$this->db->where('id',$this->input->post('student_id'));
			$student_data = $this->db->get("tbl_student");
			$student_data = $student_data->row();
			
			
			$sms_message = "Dear ".$this->input->post('student_name').",\n Your Admission has been confirmed, below are the login details of your account\n Username:".$student_data->username."\nPassword:".$student_data->password;
			$mail_message = "Dear ".$this->input->post('student_name').",<br> Your Admission has been confirmed, below are the login details of your account<br> Username:".$student_data->username."<br>Password:".$student_data->password;
			
			$this->send_common_sms($student_data->mobile,$sms_message);
			
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE; 
			$this->email->initialize($config);

			$this->email->from('no-reply@tgu.com');
			$this->email->to($student_data->email);
			$this->email->subject('New Password |THE GLOBAL UNIVERSITY'); 
			$this->email->set_mailtype('html');
			$message = $mail_message;
			$message .="<br>Regards<br>IT Team";
			$this->email->message($message); 
			if($this->email->send()){  
			}else{ 
			}
			redirect('print_admission_form/'.$student_data->id);
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
	public function get_admission_form(){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_course.print_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		//$this->db->where('tbl_student.admission_status !=','0');
		$this->db->where('tbl_student.id',$this->uri->segment(2));
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_admission_qualification(){
		$this->db->where('is_deleted','0');
		$this->db->where('student_id',$this->uri->segment(2));
		$result = $this->db->get('tbl_student_qualification');
		return $result->row();
	}
	public function get_all_admission_ajax($length,$start,$search){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.verified_status','1');
		$this->db->where('tbl_student.admission_status !=','0');
		$this->db->where('tbl_student.admission_status !=','2');
		if($this->input->post('start_date')!=""){
			$this->db->where('tbl_student.enrollment_date >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('tbl_student.enrollment_date <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_id_management.id_name',$search);
			$this->db->or_like('tbl_student.id_number',$search);
			$this->db->or_like('tbl_student.gender',$search);
			$this->db->or_like('tbl_student.category',$search);
			$this->db->or_like('tbl_student.address',$search);
			$this->db->or_like('tbl_student.nationality',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_student.pincode',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.enrollment_date','DESC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->result();		
	}
	public function get_all_admission_count($search){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.verified_status','1');
		$this->db->where('tbl_student.admission_status !=','0');
		$this->db->where('tbl_student.admission_status !=','2');
		if($this->input->post('start_date')!=""){
			$this->db->where('tbl_student.enrollment_date >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('tbl_student.enrollment_date <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_id_management.id_name',$search);
			$this->db->or_like('tbl_student.id_number',$search);
			$this->db->or_like('tbl_student.gender',$search);
			$this->db->or_like('tbl_student.category',$search);
			$this->db->or_like('tbl_student.address',$search);
			$this->db->or_like('tbl_student.nationality',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_student.pincode',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id','ASC');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->num_rows();
	}
	public function get_new_admission_list_ajax($length,$start,$search){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.verified_status','0');
		$this->db->where('tbl_student.admission_status !=','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('tbl_student.enrollment_date >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('tbl_student.enrollment_date <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_id_management.id_name',$search);
			$this->db->or_like('tbl_student.id_number',$search);
			$this->db->or_like('tbl_student.gender',$search);
			$this->db->or_like('tbl_student.category',$search);
			$this->db->or_like('tbl_student.address',$search);
			$this->db->or_like('tbl_student.nationality',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_student.pincode',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.enrollment_date','DESC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->result();		
	}
	public function get_new_admission_list_ajax_count($search){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.verified_status','0');
		$this->db->where('tbl_student.admission_status !=','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('tbl_student.enrollment_date >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('tbl_student.enrollment_date <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_id_management.id_name',$search);
			$this->db->or_like('tbl_student.id_number',$search);
			$this->db->or_like('tbl_student.gender',$search);
			$this->db->or_like('tbl_student.category',$search);
			$this->db->or_like('tbl_student.address',$search);
			$this->db->or_like('tbl_student.nationality',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_student.pincode',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id','ASC');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->num_rows();
	}
	public function get_today_admission_list_ajax($length,$start,$search){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.verified_status','1'); 
		$this->db->where('tbl_student.verified_date',date("Y-m-d")); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_id_management.id_name',$search);
			$this->db->or_like('tbl_student.id_number',$search);
			$this->db->or_like('tbl_student.gender',$search);
			$this->db->or_like('tbl_student.category',$search);
			$this->db->or_like('tbl_student.address',$search);
			$this->db->or_like('tbl_student.nationality',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_student.pincode',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_employees.first_name',$search);
			$this->db->or_like('tbl_employees.last_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.enrollment_date','DESC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$this->db->join('tbl_employees','tbl_employees.id = tbl_student.verified_by');
		$result = $this->db->get('tbl_student');
		return $result->result();		
	}
	public function get_today_admission_list_ajax_count($search){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.verified_status','1'); 
		$this->db->where('tbl_student.verified_date',date("Y-m-d")); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_id_management.id_name',$search);
			$this->db->or_like('tbl_student.id_number',$search);
			$this->db->or_like('tbl_student.gender',$search);
			$this->db->or_like('tbl_student.category',$search);
			$this->db->or_like('tbl_student.address',$search);
			$this->db->or_like('tbl_student.nationality',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_student.pincode',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_employees.first_name',$search);
			$this->db->or_like('tbl_employees.last_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id','ASC');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$this->db->join('tbl_employees','tbl_employees.id = tbl_student.verified_by');
		$result = $this->db->get('tbl_student');
		return $result->num_rows();
	}
	public function approved_admission(){
		$data = array(
			'verified_status' => '1',
			'verified_by' => $this->session->userdata('admin_id'),
			'verified_date' => date("Y-m-d"),
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_student',$data);
		
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		
		$profile = $this->Admin_model->get_profile();
		$log_description = $profile->first_name." ".$profile->last_name." has approved admission of ".$result->student_name." (".$result->id.")". " on ".date("d/m/Y");
		$log = array(
			'user_id' 		=> $this->session->userdata('admin_id'),
			'student_id' 	=> $result->id,
			'description' 	=> $log_description,
			'date' 			=> date("Y-m-d"),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->Setting_model->set_log($log);
		
		$this->load->library('email');
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE; 
		$this->email->initialize($config);
		
	/*	$this->load->library('email');  
		$config = array();  
		$config['protocol'] = 'smtp';  
		$config['smtp_host'] = '166.62.26.44';  
		$config['smtp_user'] = 'no-reply@birtikendrajituniversity.com';  
		$config['smtp_pass'] = 'no-reply@123';  
		$config['smtp_port'] = 25;
		$this->email->initialize($config);  
      */  
		$message = "Dear ".$result->student_name;
		$message .= "<br>Congratulations!<br> Your admission has been approved below are the login details";
		$message .= "<br>Username: ".$result->username;
		$message .= "<br>Username: ".$result->password;
		$message .= "<br><b>Regards</b> IT Team ";
		
		$this->email->from('no-reply@tgu.com','Global University');
		$this->email->to($result->email);  
		
		$this->email->subject('Admission Approved | Global University');
		$this->email->message($message);
		$this->email->set_mailtype('html');
		if($this->email->send()){ 
		}else{ 
		}
		return true;
	}
	public function get_single_student(){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.id',$this->uri->segment(2));
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	
	public function get_otp_lead_list($length,$start,$search){
		$this->db->where('is_deleted','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('mobile',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_registration_lead');
		return $result->result();		
	}
	public function get_otp_lead_list_count($search){
		$this->db->where('is_deleted','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('mobile',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_registration_lead');
		return $result->num_rows();
	}
	public function get_enquiry_list($length,$start,$search){
		$this->db->where('is_deleted','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('mobile',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('name',$search);
			$this->db->or_like('query',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_enquery');
		return $result->result();		
	}
	public function get_enquiry_list_count($search){
		$this->db->where('is_deleted','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('mobile',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('name',$search);
			$this->db->or_like('query',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_enquery');
		return $result->num_rows();
	}
	
	
	public function get_admin_campus_enquiry($length,$start,$search){
		$this->db->select('tbl_campus_enquery.*,tbl_followup_heads.head_name');
		$this->db->where('tbl_campus_enquery.is_deleted','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(tbl_campus_enquery.created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(tbl_campus_enquery.created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		} 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_followup_heads.head_name',$search);
			$this->db->or_like('tbl_campus_enquery.mobile_number',$search);
			$this->db->or_like('tbl_campus_enquery.email',$search);
			$this->db->or_like('tbl_campus_enquery.name',$search);
			$this->db->or_like('tbl_campus_enquery.father_name',$search);
			$this->db->or_like('tbl_campus_enquery.mother_name',$search);
			$this->db->or_like('tbl_campus_enquery.address',$search);
			$this->db->or_like('tbl_campus_enquery.course',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_followup_heads','tbl_followup_heads.id = tbl_campus_enquery.head_id');
		$result = $this->db->get('tbl_campus_enquery');
		return $result->result();		
	}
	public function get_admin_campus_enquiry_count($search){
		$this->db->select('tbl_campus_enquery.*,tbl_followup_heads.head_name');
		$this->db->where('tbl_campus_enquery.is_deleted','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(tbl_campus_enquery.created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(v.created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_followup_heads.head_name',$search);
			$this->db->or_like('tbl_campus_enquery.mobile_number',$search);
			$this->db->or_like('tbl_campus_enquery.email',$search);
			$this->db->or_like('tbl_campus_enquery.name',$search);
			$this->db->or_like('tbl_campus_enquery.father_name',$search);
			$this->db->or_like('tbl_campus_enquery.mother_name',$search);
			$this->db->or_like('tbl_campus_enquery.address',$search);
			$this->db->or_like('tbl_campus_enquery.course',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_followup_heads','tbl_followup_heads.id = tbl_campus_enquery.head_id');
		$result = $this->db->get('tbl_campus_enquery');
		return $result->num_rows();
	}
	
	public function get_pulp_enquiry_list($length,$start,$search){
		$this->db->where('is_deleted','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('mobile',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('name',$search);
			$this->db->or_like('location',$search);
			$this->db->or_like('course',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_pulp_enquiry');
		return $result->result();		
	}
	public function get_pulp_enquiry_list_count($search){
		$this->db->where('is_deleted','0');
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('mobile',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('name',$search);
			$this->db->or_like('location',$search);
			$this->db->or_like('course',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_pulp_enquiry');
		return $result->num_rows();
	}
	
	public function get_all_phd_registration_successfully($length,$start,$search){
		$this->db->select('tbl_phd_registration_form.*,tbl_course.print_name as course_name,tbl_stream.stream_name,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_phd_registration_form.is_deleted','0');
		$this->db->where('tbl_phd_registration_form.payment_status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_phd_registration_form.student_name',$search);
			$this->db->or_like('tbl_phd_registration_form.father_name',$search);
			$this->db->or_like('tbl_phd_registration_form.mother_name',$search);
			$this->db->or_like('tbl_phd_registration_form.mobile_number',$search);
			$this->db->or_like('tbl_phd_registration_form.email_id',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.print_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_phd_registration_form.id','DESC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_course','tbl_course.id = tbl_phd_registration_form.course');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_phd_registration_form.stream');
		$this->db->join('countries','countries.id = tbl_phd_registration_form.country');
		$this->db->join('states','states.id = tbl_phd_registration_form.state');
		$this->db->join('cities','cities.id = tbl_phd_registration_form.city');
		$result = $this->db->get('tbl_phd_registration_form');
		return $result->result();		
	}
	public function get_all_phd_registration_successfully_count($search){
		$this->db->select('tbl_phd_registration_form.*,tbl_course.print_name as course_name,tbl_stream.stream_name,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_phd_registration_form.is_deleted','0');
		$this->db->where('tbl_phd_registration_form.payment_status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_phd_registration_form.student_name',$search);
			$this->db->or_like('tbl_phd_registration_form.father_name',$search);
			$this->db->or_like('tbl_phd_registration_form.mother_name',$search);
			$this->db->or_like('tbl_phd_registration_form.mobile_number',$search);
			$this->db->or_like('tbl_phd_registration_form.email_id',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.print_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_phd_registration_form.id','ASC');
		$this->db->join('tbl_course','tbl_course.id = tbl_phd_registration_form.course');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_phd_registration_form.stream');
		$this->db->join('countries','countries.id = tbl_phd_registration_form.country');
		$this->db->join('states','states.id = tbl_phd_registration_form.state');
		$this->db->join('cities','cities.id = tbl_phd_registration_form.city');
		$result = $this->db->get('tbl_phd_registration_form');
		return $result->num_rows();
	}
	public function get_all_phd_registration_failed($length,$start,$search){
		$this->db->select('tbl_phd_registration_form.*,tbl_course.print_name as course_name,tbl_stream.stream_name,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_phd_registration_form.is_deleted','0');
		$this->db->where('tbl_phd_registration_form.payment_status','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_phd_registration_form.student_name',$search);
			$this->db->or_like('tbl_phd_registration_form.father_name',$search);
			$this->db->or_like('tbl_phd_registration_form.mother_name',$search);
			$this->db->or_like('tbl_phd_registration_form.mobile_number',$search);
			$this->db->or_like('tbl_phd_registration_form.email_id',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.print_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_phd_registration_form.id','ASC');
		$this->db->group_by('tbl_phd_registration_form.mobile_number');
		$this->db->limit($length,$start);
		$this->db->join('tbl_course','tbl_course.id = tbl_phd_registration_form.course');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_phd_registration_form.stream');
		$this->db->join('countries','countries.id = tbl_phd_registration_form.country');
		$this->db->join('states','states.id = tbl_phd_registration_form.state');
		$this->db->join('cities','cities.id = tbl_phd_registration_form.city');
		$result = $this->db->get('tbl_phd_registration_form');
		return $result->result();		
	}
	public function get_all_phd_registration_failed_count($search){
		$this->db->select('tbl_phd_registration_form.*,tbl_course.print_name as course_name,tbl_stream.stream_name,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_phd_registration_form.is_deleted','0');
		$this->db->where('tbl_phd_registration_form.payment_status','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_phd_registration_form.student_name',$search);
			$this->db->or_like('tbl_phd_registration_form.father_name',$search);
			$this->db->or_like('tbl_phd_registration_form.mother_name',$search);
			$this->db->or_like('tbl_phd_registration_form.mobile_number',$search);
			$this->db->or_like('tbl_phd_registration_form.email_id',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.print_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_phd_registration_form.id','ASC');
		$this->db->group_by('tbl_phd_registration_form.mobile_number');
		$this->db->join('tbl_course','tbl_course.id = tbl_phd_registration_form.course');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_phd_registration_form.stream');
		$this->db->join('countries','countries.id = tbl_phd_registration_form.country');
		$this->db->join('states','states.id = tbl_phd_registration_form.state');
		$this->db->join('cities','cities.id = tbl_phd_registration_form.city');
		$result = $this->db->get('tbl_phd_registration_form');
		return $result->num_rows();
	}
	public function get_failed_phd_single(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_phd_registration_form');
		return $result->row();
	}
	public function get_unique_phd_payment(){
		$this->db->where('id !=',$this->input->post('id'));
		$this->db->where('payment_id',$this->input->post('payment_id'));
		$result = $this->db->get('tbl_phd_registration_form');
		echo $result->num_rows();
	}
	public function set_update_phd_payment(){
		$data = array(
			'email_id' 			=> $this->input->post('email'), 
			'mobile_number' 	=> $this->input->post('mobile'), 
			'stream' 			=> $this->input->post('stream'), 
			'payment_id' 		=> $this->input->post('payment_id'), 
			'payment_status' 	=> $this->input->post('payment_status'), 
			'amount' 			=> $this->input->post('fees'), 
			'payment_date' 		=> date("Y-m-d",strtotime($this->input->post('payment_date'))), 
		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tbl_phd_registration_form',$data);
		return true;
	}
	public function get_phd_exam_student(){
		$this->db->select('tbl_phd_registration_form.*,tbl_phd_ent_scores.created_on,tbl_phd_ent_scores.score,tbl_phd_ent_scores.id as student_exam_id,tbl_phd_ent_scores.test_id,tbl_phd_ent_scores.created_on as date_of_exam,tbl_test_title_for_phd.test_name');
		$this->db->where('tbl_phd_registration_form.payment_status','1');
		$this->db->where('tbl_phd_ent_scores.is_deleted','0');
		$this->db->join('tbl_test_title_for_phd','tbl_test_title_for_phd.id = tbl_phd_ent_scores.test_id');
		$this->db->join('tbl_phd_registration_form','tbl_phd_registration_form.email_id = tbl_phd_ent_scores.student_email');
		
		$this->db->order_by('tbl_phd_ent_scores.id','DESC');
		$this->db->group_by('tbl_phd_ent_scores.student_email');
		//$this->db->group_by('tbl_phd_registration_form.email_id');
		$result = $this->db->get('tbl_phd_ent_scores');
		return $result->result();
	}
	public function update_student($photo,$noc,$signature,$secondary_marksheet,$sr_secondary_marksheet,$graduation_marksheet,$post_graduation_marksheet,$other_qualification_marksheet){
		
		$this->db->where('id',$this->input->post('student_id'));
		$student_row = $this->db->get('tbl_student');
		$student_row = $student_row->row();
		
		$profile = $this->Admin_model->get_profile();
		$add_log = 1;
		$log_description = $profile->first_name." ".$profile->last_name." has updated below details of ".$student_row->student_name." (".$student_row->id.")". " on ".date("d/m/Y");
		if($student_row->student_name != $this->input->post('student_name')){
			$add_log = 0;
			$log_description .= "<br>Student name ".$student_row->student_name." to ". $this->input->post('student_name');
		}
		if($student_row->admission_date != date("Y-m-d",strtotime($this->input->post('admission_date')))){
			$add_log = 0;
			$log_description .= "<br>Registration date ".$student_row->admission_date." to ". date("Y-m-d",strtotime($this->input->post('admission_date')));
		}
		if($student_row->gender != $this->input->post('gender')){
			$add_log = 0;
			$log_description .= "<br>Gender ".$student_row->gender." to ". $this->input->post('gender');
		}
		if($student_row->father_name != $this->input->post('father_name')){
			$add_log = 0;
			$log_description .= "<br>Father name ".$student_row->father_name." to ". $this->input->post('father_name');
		}
		if($student_row->mother_name != $this->input->post('mother_name')){
			$add_log = 0;
			$log_description .= "<br>Mother name ".$student_row->mother_name." to ". $this->input->post('mother_name');
		}
		if($student_row->date_of_birth != date("Y-m-d",strtotime($this->input->post('date_of_birth')))){
			$add_log = 0;
			$log_description .= "<br>Date of birth ".date("d-m-Y",strtotime($student_row->date_of_birth))." to ". $this->input->post('date_of_birth');
		}
		if($student_row->mobile != $this->input->post('mobile')){
			$add_log = 0;
			$log_description .= "<br>Mobile Number ".$student_row->mobile." to ". $this->input->post('mobile');
		}
		if($student_row->email != $this->input->post('email')){
			$add_log = 0;
			$log_description .= "<br>Email ".$student_row->email." to ". $this->input->post('email');
		}
		if($student_row->pincode != $this->input->post('pincode')){
			$add_log = 0;
			$log_description .= "<br>Pincode ".$student_row->pincode." to ". $this->input->post('pincode');
		}
		if($student_row->year_sem != $this->input->post('year_sem')){
			$add_log = 0;
			$log_description .= "<br>Year/Sem ".$student_row->year_sem." to ". $this->input->post('year_sem');
		}
		if($student_row->course_mode != $this->input->post('course_mode')){
			$add_log = 0;
			$log_description .= "<br>Course Mode ".$student_row->course_mode." to ". $this->input->post('course_mode');
		}
		if($student_row->address != $this->input->post('address')){
			$add_log = 0;
			$log_description .= "<br>Address ".$student_row->address." to ". $this->input->post('address');
		}
		if($student_row->course_id != $this->input->post('course')){
			$add_log = 0;
			$this->db->where('id',$student_row->course_id);
			$old_course = $this->db->get('tbl_course');
			$old_course = $old_course->row();
			
			$this->db->where('id',$this->input->post('course'));
			$new_course = $this->db->get('tbl_course');
			$new_course = $new_course->row();
			
			$log_description .= "<br>Course ".$old_course->print_name." to ". $new_course->print_name;
		}
		if($student_row->stream_id != $this->input->post('stream')){
			$add_log = 0;
			$this->db->where('id',$student_row->stream_id);
			$old_stream = $this->db->get('tbl_stream');
			$old_stream = $old_stream->row();
			
			$this->db->where('id',$this->input->post('stream'));
			$new_stream = $this->db->get('tbl_stream');
			$new_stream = $new_stream->row();
			$log_description .= "<br>Stream ".$old_stream->stream_name." to ". $new_stream->stream_name;
		}
		if($student_row->country != $this->input->post('country')){
			$add_log = 0;
			$this->db->where('id',$student_row->country);
			$old_data = $this->db->get('countries');
			$old_data = $old_data->row();
			
			$this->db->where('id',$this->input->post('country'));
			$new_data = $this->db->get('countries');
			$new_data = $new_data->row();
			$log_description .= "<br>Country ".$old_stream->name." to ". $new_data->name;
		}
		if($student_row->state != $this->input->post('state')){
			$add_log = 0;
			$this->db->where('id',$student_row->state);
			$old_data = $this->db->get('states');
			$old_data = $old_data->row();
			
			$this->db->where('id',$this->input->post('state'));
			$new_data = $this->db->get('states');
			$new_data = $new_data->row();
			$log_description .= "<br>State ".$old_stream->name." to ". $new_data->name;
		}
		if($student_row->city != $this->input->post('city')){
			$add_log = 0;
			$this->db->where('id',$student_row->city);
			$old_data = $this->db->get('cities');
			$old_data = $old_data->row();
			
			$this->db->where('id',$this->input->post('city'));
			$new_data = $this->db->get('cities');
			$new_data = $new_data->row();
			$log_description .= "<br>City ".$old_stream->name." to ". $new_data->name;
		}
		if($add_log == 0){
			$log = array(
				'user_id' 		=> $this->session->userdata('admin_id'),
				'student_id' 	=> $student_row->id,
				'description' 	=> $log_description,
				'date' 			=> date("Y-m-d"),
				'created_on' 	=> date("Y-m-d H:i:s"),
			);
			$this->Setting_model->set_log($log);
		}
		$add_log = 1;
		$log_description = "";
		$this->db->where('student_id',$this->input->post('student_id')); 
		$old_qual = $this->db->get('tbl_student_qualification');
		$old_qual = $old_qual->row();
		if(!empty($old_qual)){
			$log_description = $profile->first_name." ".$profile->last_name." has updated qualification details of ".$student_row->student_name." (".$student_row->id.")". " on ".date("d/m/Y");
			if($old_qual->secondary_year != $this->input->post('secondary_year')){
				$add_log = 0;
				$log_description .= "<br>Secondary year ".$student_row->secondary_year." to ". $this->input->post('secondary_year');
			}
			if($old_qual->secondary_university != $this->input->post('secondary_university')){
				$add_log = 0;
				$log_description .= "<br>Secondary University ".$student_row->secondary_university." to ". $this->input->post('secondary_university');
			}
			if($old_qual->secondary_marks != $this->input->post('secondary_marks')){
				$add_log = 0;
				$log_description .= "<br>Secondary Marks ".$student_row->secondary_marks." to ". $this->input->post('secondary_marks');
			}
			if($old_qual->sr_secondary_year != $this->input->post('sr_secondary_year')){
				$add_log = 0;
				$log_description .= "<br>Sr. Secondary Year ".$student_row->sr_secondary_year." to ". $this->input->post('sr_secondary_year');
			}
			if($old_qual->sr_secondary_university != $this->input->post('sr_secondary_university')){
				$add_log = 0;
				$log_description .= "<br>Sr. Secondary University ".$student_row->sr_secondary_university." to ". $this->input->post('sr_secondary_university');
			}
			if($old_qual->sr_secondary_marks != $this->input->post('sr_secondary_marks')){
				$add_log = 0;
				$log_description .= "<br>Sr. Secondary Marks ".$student_row->sr_secondary_marks." to ". $this->input->post('sr_secondary_marks');
			}
			if($old_qual->graduation_year != $this->input->post('graduation_year')){
				$add_log = 0;
				$log_description .= "<br>Graduation Year ".$student_row->graduation_year." to ". $this->input->post('graduation_year');
			}
			if($old_qual->graduation_university != $this->input->post('graduation_university')){
				$add_log = 0;
				$log_description .= "<br>Graduation University ".$student_row->graduation_university." to ". $this->input->post('graduation_university');
			}
			if($old_qual->graduation_marks != $this->input->post('graduation_marks')){
				$add_log = 0;
				$log_description .= "<br>Graduation Marks ".$student_row->graduation_marks." to ". $this->input->post('graduation_marks');
			}
			if($old_qual->post_graduation_year != $this->input->post('post_graduation_year')){
				$add_log = 0;
				$log_description .= "<br>Post Graduation Year ".$student_row->post_graduation_year." to ". $this->input->post('post_graduation_year');
			}
			if($old_qual->post_graduation_university != $this->input->post('post_graduation_university')){
				$add_log = 0;
				$log_description .= "<br>Post Graduation University ".$student_row->post_graduation_university." to ". $this->input->post('post_graduation_university');
			}
			if($old_qual->post_graduation_marks != $this->input->post('post_graduation_marks')){
				$add_log = 0;
				$log_description .= "<br>Post Graduation Marks ".$student_row->post_graduation_marks." to ". $this->input->post('post_graduation_marks');
			}
			if($old_qual->other_qualification_year != $this->input->post('other_qualification_year')){
				$add_log = 0;
				$log_description .= "<br>Other Year ".$student_row->other_qualification_year." to ". $this->input->post('other_qualification_year');
			}
			if($old_qual->other_qualification_university != $this->input->post('other_qualification_university')){
				$add_log = 0;
				$log_description .= "<br>Other University ".$student_row->other_qualification_university." to ". $this->input->post('other_qualification_university');
			}
			if($old_qual->other_qualification_marks != $this->input->post('other_qualification_marks')){
				$add_log = 0;
				$log_description .= "<br>Other Marks ".$student_row->other_qualification_marks." to ". $this->input->post('other_qualification_marks');
			}
		}else{
			$add_log = 0;
			$log_description = $profile->first_name." ".$profile->last_name." has added qualification details of ".$student_row->student_name." (".$student_row->id.")". " on ".date("d/m/Y");
			$log_description .= "<br>Secondary year ".$this->input->post('secondary_year');
			$log_description .= "<br>Secondary University ".$this->input->post('secondary_university');
			$log_description .= "<br>Secondary Marks ".$this->input->post('secondary_marks');
			$log_description .= "<br>Sr Secondary year ".$this->input->post('sr_secondary_year');
			$log_description .= "<br>Sr. Secondary University ".$this->input->post('sr_secondary_university');
			$log_description .= "<br>Sr. Secondary Marks ".$this->input->post('sr_secondary_marks');
			$log_description .= "<br>Graduation year ".$this->input->post('graduation_year');
			$log_description .= "<br>Graduation University ".$this->input->post('graduation_university');
			$log_description .= "<br>Graduation Marks ".$this->input->post('graduation_marks');
			$log_description .= "<br>Post Graduation year ".$this->input->post('post_graduation_year');
			$log_description .= "<br>Post Graduation University ".$this->input->post('post_graduation_university');
			$log_description .= "<br>Post Graduation Marks ".$this->input->post('post_graduation_marks');
			$log_description .= "<br>Other Year ".$this->input->post('other_qualification_year');
			$log_description .= "<br>Other University ".$this->input->post('other_qualification_university');
			$log_description .= "<br>Other Marks ".$this->input->post('other_qualification_marks');
			
		}
		if($add_log == 0){
			$log = array(
				'user_id' 		=> $this->session->userdata('admin_id'),
				'student_id' 	=> $student_row->id,
				'description' 	=> $log_description,
				'date' 			=> date("Y-m-d"),
				'created_on' 	=> date("Y-m-d H:i:s"),
			);
			$this->Setting_model->set_log($log);
		}
		
		$this->db->select('id,faculty,course_type,course_mode');
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$course = $this->db->get('tbl_course_stream_relation');
		$course = $course->row();
		$admission_type = $this->input->post('admission_type');
		if($this->input->post('year_sem') != "1"){
			$entry_year = $this->input->post('year_sem');
		}else{
			
			$entry_year = "0";
		}
		
		if($photo ==""){
			$photo = $this->input->post('old_photo');
		}
		if($signature ==""){
			$signature = $this->input->post('old_signature');
		}
		if($secondary_marksheet == ""){
			$secondary_marksheet = $this->input->post('old_secondary_marksheet');
		}
		if($sr_secondary_marksheet == ""){
			$sr_secondary_marksheet = $this->input->post('old_sr_secondary_marksheet');
		}
		if($graduation_marksheet == ""){
			$graduation_marksheet = $this->input->post('old_graduation_marksheet');
		}
		if($post_graduation_marksheet == ""){
			$post_graduation_marksheet = $this->input->post('old_post_graduation_marksheet');
		}
		if($other_qualification_marksheet == ""){
			$other_qualification_marksheet = $this->input->post('old_other_qualification_marksheet');
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
			'other_qualification_university'=> $this->input->post('other_qualification_university'),
			'other_qualification_marks' 	=> $this->input->post('other_qualification_marks'), 
			'secondary_marksheet' 			=> $secondary_marksheet,
			'sr_secondary_marksheet' 		=> $sr_secondary_marksheet,
			'graduation_marksheet' 			=> $graduation_marksheet,
			'post_graduation_marksheet' 	=> $post_graduation_marksheet,
			'other_qualification_marksheet' => $other_qualification_marksheet,
		);
		$this->db->where('student_id',$this->input->post('student_id')); 
		$qu_exist = $this->db->get('tbl_student_qualification');
		$qu_exist = $qu_exist->row();
		if(empty($qu_exist)){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_qualification = array_merge($qualification,$date);
			$this->db->insert('tbl_student_qualification',$new_qualification);
		}else{ 
			$this->db->where('student_id',$this->input->post('student_id')); 
			$this->db->update('tbl_student_qualification',$qualification);
		}
		$data = array(
			'faculty_id' 		=> $course->faculty,
			'course_type' 		=> $course->course_type,
			'course_mode' 		=> $this->input->post("course_mode"),
			'session_id' 		=> $this->input->post('session'),
			'course_id' 		=> $this->input->post('course'),
			'center_id' 		=> $this->input->post('center'),
			'stream_id' 		=> $this->input->post('stream'),
			'year_sem' 			=> $this->input->post('year_sem'),
			'father_name' 		=> $this->input->post('father_name'),
			'mother_name' 		=> $this->input->post('mother_name'),
			'date_of_birth' 	=> date("Y-m-d",strtotime($this->input->post('date_of_birth'))),
			'mobile' 			=> $this->input->post('mobile'),
			'email' 			=> $this->input->post('email'),
			'gender' 			=> $this->input->post('gender'),
			'admission_type' 	=> $admission_type,
			'study_mode' 	    => $this->input->post("study_mode"),
			'lateral_year' 		=> $entry_year,
			'address' 			=> $this->input->post('address'),
			'country' 			=> $this->input->post('country'),
			'state' 			=> $this->input->post('state'),
			'city' 				=> $this->input->post('city'),
			'pincode' 			=> $this->input->post('pincode'),
			'admission_status'	=> $this->input->post('admission_status'),
			'employement_type'	=> $this->input->post('employement_type'),
			'admission_date'	=> date("Y-m-d",strtotime($this->input->post('admission_date'))),
			'photo' 			=> $photo,
			'noc'               => $noc,
			'signature' 		=> $signature,
		);
		$this->db->where('id',$this->input->post('student_id'));
		$this->db->update('tbl_student',$data);
		
		$this->db->where('id',$this->input->post('student_id'));
		$old_data = $this->db->get('tbl_student');
		$old_data = $old_data->row();
		
		$this->db->where('session_id',$old_data->session_id);
		$this->db->where('relation_id',$course->id);
		$this->db->where('course_id',$old_data->course_id);
		$this->db->where('stream_id',$old_data->stream_id);
		$result = $this->db->get('tbl_fees_realtion');
		$result = $result->row();
		
		$late_fees = 0;
		$this->db->where('id',$old_data->session_id);
		$this->db->where('late_fees_date<',date("Y-m-d"));
		$seesion_late = $this->db->get('tbl_session');
		$seesion_late = $seesion_late->row();
		if(!empty($seesion_late)){
			$late_fees = $seesion_late->late_fees;
		}
		
		$fees = 0;
		if(!empty($result)){
			$fees = $result->fees;
		}else{
			$this->db->where('relation_id',$course->id);
			$this->db->where('course_id',$old_data->course_id);
			$this->db->where('stream_id',$old_data->stream_id);
			$this->db->order_by('id','DESC');
			$result = $this->db->get('tbl_fees_realtion');
			$result = $result->row();
			if(!empty($result)){
				$fees = $result->fees;
			}
		}
		if($old_data->country != "101"){
			$fees = $fees*2;
		}
		$bank_id = 1;
		$fees_data = array(
			'student_id' 	=> $this->input->post('student_id'),
			'fees_type' 	=> 1,
			'year_sem' 		=> $this->input->post('year_sem'),
			'payment_mode' 	=> '3',
			'payment_date' 	=> date("Y-m-d"),
			'bank_id' 		=> $bank_id,
			'late_fees' 	=> $late_fees,
			'bank_fees' 	=> 0,
			'amount' 		=> $fees,
			'original_amount'=> $fees,
			'total_fees' 	=> $fees+$late_fees,
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_student_fees',$fees_data);
		return true;
	}
	public function get_phd_stream($course){
		$this->db->select('tbl_stream.stream_name,tbl_stream.id');
		$this->db->where('tbl_course_stream_relation.course',$course);
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();
	}
	public function get_all_student_fees(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1'); 
 		$this->db->where('student_id',$this->uri->segment(2));
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_student_fees');
		return $result->result();
	}
	public function get_single_student_fees(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1'); 
		$this->db->where('student_id',$this->uri->segment(2));
		$this->db->where('id',$this->uri->segment(3));
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_student_fees');
		return $result->row();
	}
	public function update_student_account(){
		//echo "<pre>";print_r($_POST);exit;
		$data = array(
			'student_id' 		=> $this->input->post('student_id'),
			'fees_type' 		=> $this->input->post('fees_type'),
			'payment_mode' 		=> $this->input->post('payment_mode'),
			'payment_date' 		=> date("Y-m-d",strtotime($this->input->post('payment_date'))),
			'payment_status' 	=> $this->input->post('payment_status'),
			'transaction_id' 	=> $this->input->post('transaction_id'),
			'bank_id' 			=> $this->input->post('bank'),
			'late_fees' 		=> $this->input->post('late_fees'),
			'bank_fees' 		=> $this->input->post('bank_fees'),
			'original_amount' 	=> $this->input->post('amount'),
			'amount' 			=> $this->input->post('amount'),
			'discount' 			=> $this->input->post('discount'),
			'total_fees' 		=> $this->input->post('total_fees'),
			'year_sem' 			=> $this->input->post('year_sem'),
			'remark' 			=> $this->input->post('remark'),
		);
		
		if($this->input->post('id') == "0"){
			$date = array(
				'created_on' => date("Y-m-d H:i:s"),
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_student_fees',$new_arr);
			$last_fees = $this->db->insert_id();
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_student_fees',$data);
			$last_fees = $this->input->post('id');
		}
		$this->db->where('id',$this->input->post('student_id'));
		$student_row = $this->db->get('tbl_student');
		$student_row = $student_row->row();
		$profile = $this->Admin_model->get_profile();
		if($this->input->post('payment_status') == "1"){
			$pay_status = "Success";
		}else{
			$pay_status = "Failed";
		}
		if($this->input->post('id') == "0"){
			$log_description = $profile->first_name." ".$profile->last_name." has added fees Rs. ".$this->input->post('total_fees')." (".$last_fees.") and transaction no is ".$this->input->post('transaction_id')." and status ".$pay_status." of ".$student_row->student_name." (".$student_row->id.")". " on ".date("d/m/Y");
			$return =0;
		}else{
			$log_description = $profile->first_name." ".$profile->last_name." has updated fees Rs. ".$this->input->post('total_fees')." (".$last_fees.") and transaction no is ".$this->input->post('transaction_id')." and status ".$pay_status." of ".$student_row->student_name." (".$student_row->id.")". " on ".date("d/m/Y");
			$return =1;
		}
		$log = array(
			'user_id' 		=> $this->session->userdata('admin_id'),
			'student_id' 	=> $student_row->id,
			'description' 	=> $log_description,
			'date' 			=> date("Y-m-d"),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->Setting_model->set_log($log);
		return $return;
	}
	public function get_single_qualification(){
		$this->db->where('student_id',$this->uri->segment(2));
		$result = $this->db->get('tbl_student_qualification');
		return $result->row();
	}
	public function get_selected_state($country){
		$this->db->where('country_id',$country);
		$result = $this->db->get('states');
		return $result->result();
	}
	public function get_selected_city($state){
		$this->db->where('state_id',$state);
		$result = $this->db->get('cities');
		return $result->result();
	}
	public function get_all_student_feedback_list($length,$start,$search){
		$this->db->select('tbl_student.student_name,tbl_course.print_name,tbl_student_feedback.*');
		$this->db->where('tbl_student_feedback.is_deleted','0');
		$this->db->where('tbl_student_feedback.status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student_feedback.feedback',$search);
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_course.print_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student_feedback.id','ASC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_student','tbl_student.id = tbl_student_feedback.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$result = $this->db->get('tbl_student_feedback');
		return $result->result();		
	}
	public function get_all_student_feedback_list_count($search){
		$this->db->select('tbl_student.student_name,tbl_course.print_name,tbl_student_feedback.*');
		$this->db->where('tbl_student_feedback.is_deleted','0');
		$this->db->where('tbl_student_feedback.status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student_feedback.feedback',$search);
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_course.print_name',$search);
			$this->db->group_end();
		} 
		$this->db->join('tbl_student','tbl_student.id = tbl_student_feedback.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$result = $this->db->get('tbl_student_feedback');
		return $result->num_rows();
	}
	public function get_all_session(){
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_session');
		return $result->result();
	}



	public function get_amount_filter(){
		$this->db->select("tbl_student_fees.*,tbl_student.*,tbl_center.center_name,tbl_session.session_name");

		$this->db->where("tbl_student_fees.is_deleted","0");
		$this->db->where("tbl_student_fees.status","1");
		$this->db->where("tbl_student_fees.payment_status","1");

		if(!empty($_GET["student"])){
			$this->db->where("tbl_student_fees.student_id",$_GET["student"]);			
		}
		if(!empty($_GET["transaction_id"])){
			$this->db->where("tbl_student_fees.transaction_id",$_GET["transaction_id"]);			
		}
		if(!empty($_GET["year"])){
			$this->db->where("year(tbl_student_fees.created_on)",$_GET["year"]);			
		}
		if(!empty($_GET["month"])){
			$this->db->where("month(tbl_student_fees.created_on)",$_GET["month"]);			
		}
		if(!empty($_GET["center"])){
			$this->db->where("tbl_student.center_id",$_GET["center"]);			
		}
		if(!empty($_GET["session"])){
			$this->db->where("tbl_student.session_id",$_GET["session"]);			
		}

		$this->db->join("tbl_student","tbl_student.id=tbl_student_fees.student_id");
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");
		$this->db->join("tbl_session","tbl_session.id=tbl_student.session_id");
		$this->db->order_by("tbl_student_fees.id","DESC");
		$result = $this->db->get("tbl_student_fees")->result();
		return $result;

	}


	public function get_all_reregistered_student_ajax($length,$start,$search){
		$this->db->select("tbl_re_registered_student.*,tbl_student.center_id,tbl_student.student_name,tbl_center.center_name");
		$this->db->where('tbl_re_registered_student.is_deleted','0');
		$this->db->where('tbl_re_registered_student.payment_status','1');
		$this->db->where('tbl_re_registered_student.status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_re_registered_student.enrollment_number',$search);
			$this->db->or_like('tbl_re_registered_student.previous_year_sem',$search);
			$this->db->or_like('tbl_re_registered_student.current_year_sem',$search);
			$this->db->or_like('tbl_re_registered_student.transaction_id',$search);
			$this->db->or_like('tbl_re_registered_student.created_on',$search);

			$this->db->or_like('tbl_student.student_name',$search);

			$this->db->group_end();
		}
		$this->db->order_by('tbl_re_registered_student.id','DESC');
		$this->db->limit($length,$start);
		$this->db->join("tbl_student","tbl_student.id=tbl_re_registered_student.student_id");
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");
		$result = $this->db->get('tbl_re_registered_student');
		return $result->result();		
	}
	public function get_all_reregistered_student_ajax_count($search){
		$this->db->select("tbl_re_registered_student.*,tbl_student.center_id,tbl_student.student_name,tbl_center.center_name");
		$this->db->where('tbl_re_registered_student.is_deleted','0');
		$this->db->where('tbl_re_registered_student.payment_status','1');
		$this->db->where('tbl_re_registered_student.status','1');
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_re_registered_student.enrollment_number',$search);
			$this->db->or_like('tbl_re_registered_student.previous_year_sem',$search);
			$this->db->or_like('tbl_re_registered_student.current_year_sem',$search);
			$this->db->or_like('tbl_re_registered_student.transaction_id',$search);
			$this->db->or_like('tbl_re_registered_student.created_on',$search);

			$this->db->or_like('tbl_student.student_name',$search);

			$this->db->group_end();
		} 
		$this->db->join("tbl_student","tbl_student.id=tbl_re_registered_student.student_id");
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");
		$result = $this->db->get('tbl_re_registered_student');
		return $result->num_rows();
	}

	public function get_all_reregistered_student_failed_ajax($length,$start,$search){
		$this->db->select("tbl_re_registered_student.*,tbl_student.center_id,tbl_student.student_name,tbl_center.center_name");
	
		$this->db->where('tbl_re_registered_student.is_deleted','0');
		$this->db->where('tbl_re_registered_student.payment_status','0');
		$this->db->where('tbl_re_registered_student.status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_re_registered_student.enrollment_number',$search);
			$this->db->or_like('tbl_re_registered_student.previous_year_sem',$search);
			$this->db->or_like('tbl_re_registered_student.current_year_sem',$search);
			$this->db->or_like('tbl_re_registered_student.created_on',$search);

			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_re_registered_student.id','DESC');
		$this->db->limit($length,$start);
		$this->db->join("tbl_student","tbl_student.id=tbl_re_registered_student.student_id");
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");
		$result = $this->db->get('tbl_re_registered_student');
		return $result->result();		
	}
	public function get_all_reregistered_student_failed_ajax_count($search){
		$this->db->select("tbl_re_registered_student.*,tbl_student.center_id,tbl_student.student_name,tbl_center.center_name");
		$this->db->where('tbl_re_registered_student.is_deleted','0');
		$this->db->where('tbl_re_registered_student.payment_status','0');
		$this->db->where('tbl_re_registered_student.status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_re_registered_student.enrollment_number',$search);
			$this->db->or_like('tbl_re_registered_student.previous_year_sem',$search);
			$this->db->or_like('tbl_re_registered_student.current_year_sem',$search);

			$this->db->or_like('tbl_re_registered_student.created_on',$search);

			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->group_end();
		} 
		$this->db->join("tbl_student","tbl_student.id=tbl_re_registered_student.student_id");
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");

		$result = $this->db->get('tbl_re_registered_student');
		return $result->num_rows();
	}


	public function student_re_registration_edit(){
	    /*if($this->input->post("payment_status") == '1'){
	        $year_sem = $this->input->post("year_sem");
	    }else{
	         $year_sem = $this->input->post("year_sem") - 1;
	    }*/
	    
		$payment_data = array(
			"student_id"=>$this->input->post("student_id"),
    		"fees_type"=>'4',		
    		"bank_id"=>$this->input->post("bank"),
    		"payment_mode"=>$this->input->post("payment_mode"),		
    		"payment_date"=>date("Y-m-d",strtotime($this->input->post("payment_date"))),
    		"original_amount"=>$this->input->post("original_fees"),		
    		"amount"=>$this->input->post("university_share"),		
    		"total_fees"=>$this->input->post("original_fees"),		
    		"year_sem"=>$this->input->post("year_sem"),
    		"created_on"=>date("Y-m-d H:i:s"),
    		'transaction_id' 	=>$this->input->post("transaction_id"),
			'payment_status' 	=> $this->input->post("payment_status"),
			'remark' 	=> $this->input->post("remark"),

		);

		$this->db->insert("tbl_student_fees",$payment_data);

		$maintain_data = array(
			"current_year_sem"=>$this->input->post("year_sem"),
			'transaction_id' 	=>$this->input->post("transaction_id"),
			'payment_status' 	=> $this->input->post("payment_status"),
		);
		$this->db->where("tbl_re_registered_student.id",$this->uri->segment(2));
		$this->db->update("tbl_re_registered_student",$maintain_data);

		$stu_data = array(
			"year_sem"=> $this->input->post("year_sem"),
		);
		$this->db->where("tbl_student.id",$this->input->post("student_id"));
		$this->db->update("tbl_student",$stu_data);
	}

	public function get_failed_re_registered_student($id){
	    //echo $id;exit;
		$this->db->select("tbl_student.*,tbl_center.fee_share,tbl_fees_realtion.fees");

		$this->db->where("tbl_student.is_deleted","0");
		$this->db->where("tbl_student.status","1");
		$this->db->where("tbl_student.id",$id);
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");
	/*	$this->db->join('tbl_fees_realtion','tbl_fees_realtion.course_id = tbl_student.course_id AND tbl_fees_realtion.stream_id = tbl_student.stream_id AND tbl_fees_realtion.session_id = tbl_student.session_id');*/
		$this->db->join('tbl_fees_realtion','tbl_fees_realtion.course_id = tbl_student.course_id AND tbl_fees_realtion.stream_id = tbl_student.stream_id');
		$result = $this->db->get("tbl_student")->row();
		//echo "<pre>";
		//print_r($result);exit;

		$result_array = array();

		if(!empty($result->fee_share)){
			$result_array["university_share"]  = $result->fees - (($result->fee_share/100)*$result->fees);
		}else{
			$result_array["university_share"]  = $result->fees;
		}
		
		$result_array["original_fees"] = $result->fees;
		$result_array["id"] = $result->id;
		$result_array["enrollment_number"] = $result->enrollment_number;
		$result_array["year_sem"] = $result->year_sem;
		
		return $result_array;
	}
	
		public function get_all_panding_re_registration_student_list_ajax($length,$start,$search){
		$this->db->select("tbl_student.*,tbl_exam_results.result,tbl_center.center_name");
	
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.verified_status','1');
		$this->db->where('tbl_student.status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
		
			$this->db->or_like('tbl_student.created_on',$search);

	
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id','ASC');
		$this->db->limit($length,$start);
		$this->db->join("tbl_exam_results","tbl_exam_results.student_id=tbl_student.id AND tbl_exam_results.year_sem = tbl_student.year_sem AND tbl_exam_results.is_deleted = '0'");
		$this->db->join("tbl_center","tbl_center.id = tbl_student.center_id");
		$result = $this->db->get('tbl_student');
		return $result->result();		
	}
	public function get_all_panding_re_registration_student_list_ajax_count($search){
		$this->db->select("tbl_student.*,tbl_exam_results.result");
	
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.verified_status','1');
		$this->db->where('tbl_student.status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
		
			$this->db->or_like('tbl_student.created_on',$search);
			$this->db->group_end();
		} 
		$this->db->join("tbl_exam_results","tbl_exam_results.student_id=tbl_student.id AND tbl_exam_results.year_sem = tbl_student.year_sem AND tbl_exam_results.is_deleted = '0'");
		$this->db->join("tbl_center","tbl_center.id = tbl_student.center_id");

		$result = $this->db->get('tbl_student');
		return $result->num_rows();
	}
	public function get_student_paid_addmission_fees(){
		$this->db->where('status','1'); 
		$this->db->where('payment_status','1'); 
		$this->db->where('fees_type','1'); 
 		$this->db->where('student_id',$this->uri->segment(2));
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_student_fees');
		return $result->result();
	}
	public function get_student_paid_exam_fees(){
		$this->db->where('status','1'); 
		$this->db->where('payment_status','1'); 
		$this->db->where('fees_type','2'); 
 		$this->db->where('student_id',$this->uri->segment(2));
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_student_fees');
		return $result->result();
	}
	public function get_student_paid_addmission_fees_ajax($student_id){
		$this->db->where('status','1'); 
		$this->db->where('payment_status','1'); 
		$this->db->where('fees_type','1'); 
 		$this->db->where('student_id',$student_id);
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_student_fees');
		return $result->result();
	}
	public function get_student_paid_exam_fees_ajax($student_id){
		$this->db->where('status','1'); 
		$this->db->where('payment_status','1'); 
		$this->db->where('fees_type','2'); 
 		$this->db->where('student_id',$student_id);
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_student_fees');
		return $result->result();
	}
	public function get_student_total_payable_fees($student_id){
		$student_fees = 0;
		$course_fees = 0;
		$final_student_fees = 0;
		
		$this->db->where('id',$student_id);
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		if(!empty($result)){
			$this->db->where('is_deleted','0');
			$this->db->where('status','1');
			$this->db->where('course',$result->course_id);
			$this->db->where('stream',$result->stream_id);
			$relation = $this->db->get('tbl_course_stream_relation');
			$relation = $relation->row();
			if(!empty($relation)){
				$this->db->where('session_id',$result->session_id);
				$this->db->where('relation_id',$relation->id);
				$this->db->where('course_id',$result->course_id);
				$this->db->where('stream_id',$result->stream_id);
				$course_fee = $this->db->get('tbl_fees_realtion');
				$course_fee = $course_fee->row();
				if(!empty($course_fee)){
				    if($result->center_id == "1"){
					    $course_fees =  $course_fee->campus_fees;
				    }else{
				        $course_fees =  $course_fee->fees;
				    }
				}else{
					$this->db->where('relation_id',$relation->id);
					$this->db->where('course_id',$result->course_id);
					$this->db->where('stream_id',$result->stream_id);
					$this->db->order_by('id','DESC');
					$course_fee = $this->db->get('tbl_fees_realtion');
					$course_fee = $course_fee->row();
					if(!empty($course_fee)){
						if($result->center_id == "1"){
    					    $course_fees =  $course_fee->campus_fees;
    				    }else{
    				        $course_fees =  $course_fee->fees;
    				    }
					}
				}
			}
			if($result->country != "101"){
				$course_fees = $course_fees*2;
			}
			//echo $course_fees;exit;
			$course_yearly_fees = $course_fees;
			$course_halfyearly_fees = $course_fees/2;
			
			if($result->admission_type == '0'){
				if($result->course_mode == '1'){
					$student_fees = $course_yearly_fees*$result->year_sem;
				}else if($result->course_mode == '2'){
					
					$student_fees = $course_yearly_fees*$result->year_sem;
				}
			}else{
				if($result->course_mode == '1'){
					$lateral_diffrent = $result->year_sem - $result->lateral_year;
					$lateral_diffrent = $lateral_diffrent+1;
					$student_fees = $course_yearly_fees*$lateral_diffrent;
				}else if($result->course_mode == '2'){
					$lateral_diffrent = $result->year_sem - $result->lateral_year;
					$lateral_diffrent = $lateral_diffrent+1;
					$student_fees = $course_yearly_fees*$lateral_diffrent;
				}
			}
			if($result->center_id == '1'){
				$final_student_fees = $student_fees;
			}else if($result->center_id != '1'){
				$center_share = $this->get_center_fees_sharing($result->center_id);
				
				if($center_share != "0"){
					$final_student_fees = ($center_share/100)*$student_fees;
				}else{
					$final_student_fees = $student_fees;
				}
				//$final_student_fees = $student_fees;
			}
			//echo $final_student_fees;exit;
		}
		return $final_student_fees;
		
	}
	public function get_student_lateral_fees(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$result = $this->db->get('tbl_lateral_entry_fees');
		$result = $result->row();
		if(!empty($result)){
			return $result->fees_amount;
		}else{
			return 0;
		}
	}
	public function get_center_fees_sharing($center_id){
		$this->db->where('id',$center_id);
		$result = $this->db->get('tbl_center');
		$result = $result->row();
		if(!empty($result)){
			if($result->fee_share != ""){
				return $result->fee_share;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	public function set_cancel_student_remark(){
		$data = array(
			'admission_status' 	=> '2',
			'cancel_remark' 	=> $this->input->post('remark'),
		);
		$this->db->where('id',$this->input->post('student_id'));
		$this->db->update('tbl_student',$data);
		return true;
	}
	
	public function get_all_cancel_admission_list($length,$start,$search){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		//$this->db->where('tbl_student.verified_status','1');
		$this->db->where('tbl_student.admission_status','2');
		if($this->input->post('start_date')!=""){
			$this->db->where('tbl_student.enrollment_date >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('tbl_student.enrollment_date <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_id_management.id_name',$search);
			$this->db->or_like('tbl_student.id_number',$search);
			$this->db->or_like('tbl_student.gender',$search);
			$this->db->or_like('tbl_student.category',$search);
			$this->db->or_like('tbl_student.address',$search);
			$this->db->or_like('tbl_student.nationality',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_student.pincode',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.enrollment_date','DESC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->result();		
	}
	public function get_all_cancel_admission_list_count($search){
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		//$this->db->where('tbl_student.verified_status','1');
		$this->db->where('tbl_student.admission_status','2');
		if($this->input->post('start_date')!=""){
			$this->db->where('tbl_student.enrollment_date >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('tbl_student.enrollment_date <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.father_name',$search);
			$this->db->or_like('tbl_student.mother_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_id_management.id_name',$search);
			$this->db->or_like('tbl_student.id_number',$search);
			$this->db->or_like('tbl_student.gender',$search);
			$this->db->or_like('tbl_student.category',$search);
			$this->db->or_like('tbl_student.address',$search);
			$this->db->or_like('tbl_student.nationality',$search);
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_student.pincode',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_student.id','ASC');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_student.course_type');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_id_management','tbl_id_management.id = tbl_student.id_type');
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('countries','countries.id = tbl_student.country');
		$this->db->join('states','states.id = tbl_student.state');
		$this->db->join('cities','cities.id = tbl_student.city');
		$result = $this->db->get('tbl_student');
		return $result->num_rows();
	}
	
	public function get_student_enrolled_fees_cal($student_id){
		$student_fees = 0;
		$course_fees = 0;
		$final_student_fees = 0;
		
		$this->db->where('id',$student_id);
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		if(!empty($result)){
			$this->db->where('is_deleted','0');
			$this->db->where('status','1');
			$this->db->where('course',$result->course_id);
			$this->db->where('stream',$result->stream_id);
			$relation = $this->db->get('tbl_course_stream_relation');
			$relation = $relation->row();
			if(!empty($relation)){
				$this->db->where('session_id',$result->session_id);
				$this->db->where('relation_id',$relation->id);
				$this->db->where('course_id',$result->course_id);
				$this->db->where('stream_id',$result->stream_id);
				$course_fee = $this->db->get('tbl_fees_realtion');
				$course_fee = $course_fee->row();
				if(!empty($course_fee)){
				    if($result->center_id == "1"){
					    $course_fees =  $course_fee->campus_fees;
				    }else{
				        $course_fees =  $course_fee->fees;
				    }
				}else{
					$this->db->where('relation_id',$relation->id);
					$this->db->where('course_id',$result->course_id);
					$this->db->where('stream_id',$result->stream_id);
					$this->db->order_by('id','DESC');
					$course_fee = $this->db->get('tbl_fees_realtion');
					$course_fee = $course_fee->row();
					if(!empty($course_fee)){
						if($result->center_id == "1"){
    					    $course_fees =  $course_fee->campus_fees;
    				    }else{
    				        $course_fees =  $course_fee->fees;
    				    }
					}
				}
			}
			if($result->country != "101"){
				$course_fees = $course_fees*2;
			}
			//echo $course_fees;exit;
			$course_yearly_fees = $course_fees;
			$course_halfyearly_fees = $course_fees/2;
			$lateral_fees =0;
			if($result->admission_type == '0'){
				if($result->course_mode == '1'){
					$student_fees = $course_yearly_fees*$result->year_sem;
				}else if($result->course_mode == '2'){
					
					$student_fees = $course_yearly_fees*$result->year_sem;
				}
			}else{
			    $this->db->where('is_deleted','0');
			    $this->db->where('status','1');
			    $this->db->order_by('id','DESC');
			    $lateral_fee_result = $this->db->get('tbl_lateral_entry_fees');
			    $lateral_fee_result = $lateral_fee_result->row();
				if($result->course_mode == '1'){
				    if(!empty($lateral_fee_result)){
					    $lateral_fees = $lateral_fee_result->fees_amount;
				    }
				}else if($result->course_mode == '2'){
					if(!empty($lateral_fee_result)){
					    $lateral_fees = $lateral_fee_result->fees_amount;
				    }
				}
			}
			if($result->center_id == '1'){
				$final_student_fees = $student_fees;
			}else if($result->center_id != '1'){
				$center_share = $this->get_center_fees_sharing($result->center_id);
				
				if($center_share != "0"){
					$final_student_fees = ($center_share/100)*$student_fees;
				}else{
					$final_student_fees = $student_fees;
				}
				//$final_student_fees = $student_fees;
			}
			//echo $final_student_fees;exit;
		}
		return $final_student_fees+$lateral_fees;
		
	}
	public function get_new_thesis_list($length,$start,$search){
		$this->db->where('is_deleted', '0');
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('thesis_title',$search);
			$this->db->or_like('paper_journal1',$search);
			$this->db->or_like('softcopy',$search);
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		//$this->db->where('thesis_status','1');
		//$this->db->where('thesis_status','2');
		$result = $this->db->get('tbl_thesis');
		return $result->result();
	}
	public function get_new_thesis_list_count($search){
		$this->db->where('is_deleted', '0'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('thesis_title',$search);
			$this->db->or_like('paper_journal1',$search);
			$this->db->or_like('softcopy',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_thesis');
		return $result->num_rows();
	} 
	public function get_single_thesis(){
		$this->db->where('is_deleted', '0'); 
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_thesis');
		return $result->row();
	}	
	public function get_active_guide_list(){
		$this->db->where('is_deleted', '0'); 
		$this->db->where('status', '1');
		$this->db->where('appliation_status','1');
		$result = $this->db->get('tbl_guide_application');
		return $result->result();
	}
	public function get_update_thesis($file1){
		if($file1 == ""){
			$file1 = $this->input->post("softcopy");
		}
		$data = array(
			'thesis_title'	  =>$this->input->post('thesis_title'),
			'paper_journal1'  =>$this->input->post('paper_journal1'),
			'softcopy'        =>$file1,
			'guide_id'        =>$this->input->post('guide_name'),
			'thesis_status'   =>$this->input->post('thesis_status'),
			'remarks'        =>$this->input->post('remarks'),
			'submission_date' =>date("Y-m-d",strtotime($this->input->post('submission_date'))),
			
		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tbl_thesis',$data);
		return 1;
	}
	public function get_complete_thesis_list($length,$start,$search){
		$this->db->where('is_deleted', '0'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('thesis_title',$search);
			$this->db->or_like('paper_journal1',$search);
			$this->db->or_like('softcopy',$search);
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$this->db->where('thesis_status','0');
		$result = $this->db->get('tbl_thesis');
		return $result->result();
	}
	public function get_complete_thesis_list_count($search){
		$this->db->where('is_deleted', '0'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('thesis_title',$search);
			$this->db->or_like('paper_journal1',$search);
			$this->db->or_like('softcopy',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_thesis');
		return $result->num_rows();
	}
	public function get_new_synopsis_list($length,$start,$search){
		$this->db->where('is_deleted', '0');
		$this->db->where('synopsis_status','2');
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('thesis_title',$search);
			$this->db->or_like('soft_copy',$search);
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start); 
		$result = $this->db->get('tbl_synopsis');
		return $result->result();
	}
	public function get_new_synopsis_list_count($search){
		$this->db->where('is_deleted', '0'); 
		$this->db->where('synopsis_status','2');
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('thesis_title',$search);
			$this->db->or_like('soft_copy',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_synopsis');
		return $result->num_rows();
	} 
	public function get_single_synopsis(){
		$this->db->where('is_deleted', '0'); 
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_synopsis');
		return $result->row();
	}	
	public function get_active_guide_synopsis_list(){
		$this->db->where('is_deleted', '0'); 
		$this->db->where('status', '1');
		$this->db->where('appliation_status','1');
		$result = $this->db->get('tbl_guide_application');
		return $result->result();
	}
	public function get_update_synopsis($file1){
		if($file1 == ""){
			$file1 = $this->input->post("soft_copy");
		}
		$data = array(
			'thesis_title'	  =>$this->input->post('thesis_title'),
			'soft_copy'       =>$file1,
			'guide_id'        =>$this->input->post('guide'),			
			'synopsis_status' =>$this->input->post('synopsis_status'),
			'issue_date'      =>date("Y-m-d",strtotime($this->input->post('issue_date'))),
					
		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tbl_synopsis',$data);
		return 1;
	}
	public function get_complete_synopsis_list($length,$start,$search){
		$this->db->where('is_deleted', '0');
		$this->db->where('synopsis_status !=','2');
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('thesis_title',$search);
			$this->db->or_like('soft_copy',$search);
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start); 
		$result = $this->db->get('tbl_synopsis');
		return $result->result();
	}
	public function get_complete_synopsis_list_count($search){
		$this->db->where('is_deleted', '0');
		$this->db->where('synopsis_status !=','2'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('thesis_title',$search);
			$this->db->or_like('soft_copy',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC'); 
		$result = $this->db->get('tbl_synopsis');
		return $result->num_rows();
	}  
	public function get_progress_report_list($length,$start,$search){
		$this->db->where('is_deleted', '0');
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('progress_report',$search);
			$this->db->or_like('remark',$search);
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		//$this->db->where('thesis_status','1');
		//$this->db->where('thesis_status','2');
		$result = $this->db->get('tbl_progress_report');
		return $result->result();
	}
	public function get_progress_report_list_count($search){
		$this->db->where('is_deleted', '0'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('progress_report',$search);
			$this->db->or_like('remark',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_progress_report');
		return $result->num_rows();
	} 
	public function get_abstract_report_list($length,$start,$search){
		$this->db->where('is_deleted', '0');
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('upload_report',$search);
			$this->db->or_like('remark',$search);
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		//$this->db->where('thesis_status','1');
		//$this->db->where('thesis_status','2');
		$result = $this->db->get('tbl_abstract');
		return $result->result();
	}
	public function get_abstract_report_list_count($search){
		$this->db->where('is_deleted', '0'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('upload_report',$search);
			$this->db->or_like('remark',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_abstract');
		return $result->num_rows();
	} 
	public function hold_login(){
		$data = array(
			'hold_login' => '1' 
		);
		$this->db->update('tbl_student',$data);
		return true;
	}
	public function activate_login(){
		$data = array(
			'hold_login' => '0' 
		);
		$this->db->update('tbl_student',$data);
		return true; 
	} 
	public function hold_login_single(){
		$data = array(
			'hold_login' => '1' 
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_student',$data);
		return true;
	}
	public function activate_login_single(){
		$data = array(
			'hold_login' => '0' 
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_student',$data);
		return true;
	}
	public function get_phd_exam_student_ans_book_test_name(){
		/*$this->db->select('tbl_test_phd_students.*,tbl_test_title_for_phd.test_name');
		$this->db->where('tbl_test_phd_students.is_deleted','0');
		$this->db->where('tbl_test_phd_students.student_email',$this->uri->segment(2));
		$this->db->where('tbl_test_phd_students.test_id',$this->uri->segment(3));
		$this->db->join('tbl_test_title_for_phd','tbl_test_title_for_phd.id = tbl_test_phd_students.test_id');
		$result = $this->db->get('tbl_test_phd_students');
		return $result->row();*/
		$this->db->select('tbl_phd_entrance_details.*,tbl_test_title_for_phd.test_name');
		$this->db->where('tbl_phd_entrance_details.is_deleted','0');
		$this->db->where('tbl_phd_entrance_details.student_exam_id',$this->uri->segment(2)); 
		$this->db->join('tbl_test_title_for_phd','tbl_test_title_for_phd.id = tbl_phd_entrance_details.test_id');
		$result = $this->db->get('tbl_phd_entrance_details');
		return $result->result();
		
	}
	public function get_entrance_question_details($id){ 
		$this->db->where('id',$id); 
		$result = $this->db->get('tbl_question_ans');
		return $result->row();
	}
	public function get_enrolled_status_phd($email_id,$father_name,$mobile_number){ 
		//$this->db->where('email',$email_id); 
		//$this->db->where('father_name',$father_name); 
		$this->db->where('mobile',$mobile_number); 
		$this->db->where('course_id','23'); 
		$this->db->where('admission_status !=','0'); 
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		if(!empty($result)){
			return 1;
		}else{
			return 0;
		}
	}
	public function send_phd_result_mail(){
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_phd_registration_form');
		$result = $result->row();
		if(!empty($result)){
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config); 
			$this->email
				->from('no-reply@tgu.ac.in', 'THE GLOBAL UNIVERSITY')
				->to($result->email_id)
				->subject("Entrance Exam Result")
				->message('<h2>Dear Scholar</h2>,
				<br>
				<p>You have cleared the entrance exam.</p>
				<br>
				<p>Please follow the further process for admission.</p>
				
				')
				->set_mailtype('html'); 
			if($this->email->send()){
				return true;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}
	public function get_enquiry_head($length,$start,$search){
		$this->db->where('is_deleted','0');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('head_name',$search); 
			$this->db->group_end();
		}
		$this->db->order_by('head_name','ASC');
		$this->db->limit($length,$start); 
		$result = $this->db->get('tbl_followup_heads');
		return $result->result();		
	}
	public function get_enquiry_head_count($search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('head_name',$search); 
			$this->db->group_end();
		} 
		$result = $this->db->get('tbl_followup_heads');
		return $result->num_rows();
	}
	public function set_enquiry_head(){
	   $data = array(
	        'head_name' => $this->input->post('head_name'),
	   );
	   if($this->input->post('id') == ""){
	       $date = array(
	            'created_on' => date("Y-m-d H:i:s")
	       );
	       $new_arr = array_merge($data,$date);
	       $this->db->insert('tbl_followup_heads',$new_arr);
	       return 0;
	   }else{
	       $this->db->where('id',$this->input->post('id'));
	       $this->db->update('tbl_followup_heads',$data);
	       return 1;
	   }
	}
	public function get_single_followup_head(){
	    $this->db->where('is_deleted','0');
	    $this->db->where('id',$this->uri->segment(2));
	    $result = $this->db->get('tbl_followup_heads');
	    return $result->row(); 
	}
} 