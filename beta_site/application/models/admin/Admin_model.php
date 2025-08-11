<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//require_once 'vendor/autoload.php';
//require_once 'vendor/phpoffice/phpspreadsheet/src/Bootstrap.php';
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Admin_model extends CI_Model
{
	public function login()
	{
		$this->db->where('email', $this->input->post('email'));
		// $this->db->where('password',md5($this->input->post('password')));
		$this->db->where('password', md5($this->input->post('password')));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('is_left', '0');
		$result = $this->db->get('tbl_employees');
		$result = $result->row();
		if (!empty($result)) {
			$data = array(
				'admin_id' => $result->id,
				'des_id' => $result->designation_id
			);
			$this->session->set_userdata($data);
			$log_description = $result->first_name . " " . $result->last_name . " has just logged in on erp at " . date("d/m/Y");
			$log = array(
				'user_id' 		=> $this->session->userdata('admin_id'),
				'student_id' 	=> '0',
				'description' 	=> $log_description,
				'date' 			=> date("Y-m-d"),
				'created_on' 	=> date("Y-m-d H:i:s"),
			);
			$this->Setting_model->set_log($log);
			return true;
		} else {
			return false;
		}
	}
	public function get_state_ajax_phd($country)
	{
		$this->db->where('country_id', $country);
		$this->db->order_by('name', 'ASC');
		$resullt = $this->db->get('states');
		echo json_encode($resullt->result());
	}
	public function forgot_password()
	{
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_employees');
		$result = $result->row();
		$password = rand();
		if (!empty($result)) {
			$data = array(
				'password' => md5($password)
			);
			$this->db->where('id', $result->id);
			$this->db->update('tbl_employees', $data);
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$this->email->initialize($config);
			$this->email->from(no_reply_mail);
			$this->email->to($result->email);
			$this->email->subject('New Password | ' . no_reply_name);
			$this->email->set_mailtype('html');
			$message = "Dear " . $result->first_name . ",<br> below are the login details to continue.<br>";
			$message .= "<br>URL: " . base_url() . "erp-access";
			$message .= "<br>Username: " . $result->email;
			$message .= "<br>Password: " . $password;
			$message .= "<br>Regards,<br>IT Team";
			$to = array(
				"email" => $result->email,
				"name" => $result->first_name,
			);
			$this->Admin_model->send_send_blue($to, $subject, $message);
			/*$this->email->message($message); 
			if($this->email->send()){  
			}else{ 
			}*/
			return true;
		} else {
			return false;
		}
	}
	public function get_profile()
	{
		$this->db->where('id', $this->session->userdata('admin_id'));
		$result = $this->db->get('tbl_employees');
		return $result->row();
	}
	public function get_unique_email()
	{
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('is_deleted', '0');
		$this->db->where('admission_status', '1');
		$result = $this->db->get('tbl_separate_student');
		echo $result->num_rows();
	}
	public function get_old_paasword()
	{
		$this->db->where('id', $this->session->userdata('admin_id'));
		$this->db->where('password', md5($this->input->post('old_password')));
		$result = $this->db->get('tbl_employees');
		echo $result->num_rows();
	}
	public function set_password()
	{
		$data = array(
			'password' => md5($this->input->post('new_password'))
		);
		$this->db->where('id', $this->session->userdata('admin_id'));
		$this->db->update('tbl_employees', $data);
		return true;
	}
	public function get_all_country()
	{
		$this->db->order_by('name', 'ASC');
		$resullt = $this->db->get('countries');
		return $resullt->result();
	}
	public function get_state_ajax($country)
	{
		$this->db->where('country_id', $country);
		$this->db->order_by('name', 'ASC');
		$resullt = $this->db->get('states');
		echo json_encode($resullt->result());
	}
	public function get_country_id_by_code($country_code)
	{
		$this->db->where('sortname', $country_code);
		$result = $this->db->get('countries');
		return $result->row()->id;
	}
	public function get_state_ajax_by_country_code($country_code)
	{
		$country = $this->get_country_id_by_code($country_code);
		$this->db->where('country_id', $country);
		$this->db->order_by('name', 'ASC');
		$resullt = $this->db->get('states');
		echo json_encode($resullt->result());
	}
	public function get_city_ajax($state)
	{
		$this->db->where('state_id', $state);
		$this->db->order_by('name', 'ASC');
		$resullt = $this->db->get('cities');
		echo json_encode($resullt->result());
	}
	public function get_stream_ajax($course)
	{
		$this->db->select('tbl_course_stream_relation.*,tbl_course.course_name as course_name_name,tbl_stream.stream_name as stream_name_name');
		$this->db->where('tbl_course_stream_relation.course', $course);
		$this->db->order_by('id', 'ASC');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_course_stream_relation.course');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_course_stream_relation.stream');
		$resullt = $this->db->get('tbl_course_stream_relation');
		echo json_encode($resullt->result());
	}
	public function get_selected_state($country)
	{
		$this->db->where('country_id', $country);
		$this->db->order_by('name', 'ASC');
		$resullt = $this->db->get('states');
		return $resullt->result();
	}
	public function get_selected_city($state)
	{
		$this->db->where('state_id', $state);
		$this->db->order_by('name', 'ASC');
		$resullt = $this->db->get('cities');
		return $resullt->result();
	}
	public function set_profile($photo)
	{
		if ($photo == "") {
			$photo = $this->input->post('old_userfile');
		}
		$data = array(
			'name_prefix' 		=> $this->input->post('name_prefix'),
			'first_name' 		=> $this->input->post('first_name'),
			'last_name' 		=> $this->input->post('last_name'),
			'contact_number' 	=> $this->input->post('contact_number'),
			'email' 			=> $this->input->post('email'),
			'address' 			=> $this->input->post('address'),
			'country' 			=> $this->input->post('country'),
			'state' 			=> $this->input->post('state'),
			'city' 				=> $this->input->post('city'),
			'pincode'	 		=> $this->input->post('pincode'),
			'profile_pic' 		=> $photo,
		);
		$this->db->where('id', $this->session->userdata('admin_id'));
		$this->db->update('tbl_employees', $data);
		return true;
	}
	public function get_my_unique_email()
	{
		$this->db->where('id !=', $this->session->userdata('admin_id'));
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_employees');
		echo $result->num_rows();
	}
	public function get_my_unique_contact_number()
	{
		$this->db->where('id !=', $this->session->userdata('admin_id'));
		$this->db->where('contact_number', $this->input->post('contact_number'));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_employees');
		echo $result->num_rows();
	}
	public function get_faculty_count()
	{
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_faculty');
		return $result->num_rows();
	}
	public function get_course_count()
	{
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_course');
		return $result->num_rows();
	}
	public function get_stream_count()
	{
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_stream');
		return $result->num_rows();
	}
	public function get_subject_count()
	{
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_subject');
		return $result->num_rows();
	}
	public function get_course_stream_relation_count()
	{
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->num_rows();
	}
	public function get_quiz_by_test_id($test_id)
	{
		$this->db->where('status', '0');
		$this->db->where('test_id', $test_id);
		$result = $this->db->get('tbl_question_ans');
		return $result->result();
	}
	public function check_student_login()
	{
		$this->db->where('email_id', $this->input->post('student_email'));
		$this->db->where('password', $this->input->post('student_password'));
		$result = $this->db->get('tbl_phd_registration_form');
		$result = $result->row();
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}
	public function get_question_paper($test_no)
	{
		$this->db->where('test_id', $test_no);
		$this->db->where('status', '0');
		$result = $this->db->get('tbl_question_ans');
		return $result->result();
	}
	public function get_question_ids_of_test($test_no)
	{
		$this->db->select('id');
		$this->db->where('test_id', $test_no);
		$this->db->where('status', '0');
		$result = $this->db->get('tbl_question_ans');
		return $result->result();
	}
	public function save_test_answers($test_no)
	{
		$total_questions = intval($this->input->post('total_questions'));
		$question_list = $this->get_question_ids_of_test($test_no);
		$test_ans = [];
		foreach ($question_list as $que) {
			$ans_id = 'question_' . $que->id;
			$ans =  is_null($this->input->post($ans_id)) ? 0 : intval($this->input->post($ans_id));
			$option_json = array(
				"selected_ans" => $ans,
			);
			$ans_json = array(
				"q_id" => $que->id,
				"ans" => json_encode($option_json),
			);
			array_push($test_ans, $ans_json);
		}
		$data = array(
			'student_email' => $this->input->post('student_email'),
			'test_id' => $test_no,
			'test_ans' => json_encode($test_ans),
			"created_on" => date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_test_phd_students', $data);
		$this->save_phd_entrance_score($data['student_email'], $test_no);
	}
	public function get_question_id_ans($test_no)
	{
		$this->db->select('id,correct_ans');
		$this->db->where('test_id', $test_no);
		$this->db->where('status', '0');
		$result = $this->db->get('tbl_question_ans');
		return $result->result();
	}
	public function save_phd_entrance_score($student_email, $test_no)
	{
		$this->db->where("student_email", $student_email);
		$this->db->where("test_id", $test_no);
		$result = $this->db->get('tbl_test_phd_students');
		$data = $result->row()->test_ans;
		var_dump($data);
		$json = json_decode($data, true);
		$answers = $this->get_question_id_ans($test_no);
		$question_ans = array();
		foreach ($answers as $key) {
			$question_ans[$key->id] = $key->correct_ans;
		}
		$score = 0;
		foreach ($json as $key) {
			$q_id = $key['q_id'];
			$j_ans = json_decode($key['ans'], true);
			if ($question_ans[$q_id] == $j_ans['selected_ans']) {
				$score++;
			}
		}
		$this->set_phd_score($score, $student_email, $test_no);
	}
	public function set_phd_score($score, $student_email, $test_no)
	{
		$data = array(
			'student_email' => $student_email,
			'test_id' => $test_no,
			'score' => $score,
			"created_on" =>  date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_phd_ent_scores', $data);
	}
	public function set_test_title()
	{
		$data = array(
			"test_name" => $this->input->post('test_name'),
			"created_on" =>  date("Y-m-d H:i:s"),
			"created_by" => $this->session->userdata('admin_id'),
		);
		$this->db->insert('tbl_test_title_for_phd', $data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function get_test_title()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$result = $this->db->get('tbl_test_title_for_phd');
		$result = $result->row();
		if (!empty($result)) {
			return $result->test_name;
		} else {
			return "";
		}
	}
	public function get_all_test_titles()
	{
		$this->db->where('status', '0');
		$result = $this->db->get('tbl_test_title_for_phd');
		return $result->result();
	}
	public function set_quiz_question()
	{
		$options = $this->input->post('ans');
		$update_to = $this->input->post('question_number_id');
		$photo = '';
		if ($_FILES['img_file']['name'] != "") {
			$photo = $this->Digitalocean_model->upload_photo($filename = "img_file", $path = "images/phd_quiz/");
			/*
			$tmp = explode('.', $_FILES['img_file']['name']);  
			$ext = end($tmp);  
			$config = array(  
				'upload_path'     => "images/phd_quiz/",  
				'allowed_types' => "jpg|jpeg|png",  
				'encrypt_name'    => TRUE,  
			);             
            $this->upload->initialize($config);  
			if($this->upload->do_upload('img_file')){  
				$data = $this->upload->data();          
				$photo = $data['file_name'];  
			}else{   
				$error = array('error' => $this->upload->display_errors());      
				$this->upload->display_errors();  
			} */
		}
		$text_data = array(
			"question" => $this->input->post('question'),
			"selected_ans" => $this->input->post('correct_ans'),
			"options" => $options,
			"img_data" => $photo,
		);
		$data = array(
			"created_by" => $this->session->userdata('admin_id'),
			"test_id" => $id = $this->uri->segment(2),
			"text_data" => json_encode(['options' => $text_data]),
			"correct_ans" => $this->input->post('correct_ans'),
			"created_on" => date("Y-m-d H:i:s"),
		);
		$this->Admin_model->save_question_to_db($data, $update_to);
	}
	public function delete_question($question_id, $test_id)
	{
		$this->db->where('id', $question_id);
		$this->db->where('test_id', $test_id);
		$data = array(
			'status' => '1',
		);
		$this->db->update('tbl_question_ans', $data);
	}
	public function lead_cron()
	{
		$spreadsheet = new Spreadsheet();
		$enq_spreadsheet = new Spreadsheet();
		$cen_spreadsheet = new Spreadsheet();
		$this->db->where('is_deleted', '0');
		$this->db->where('is_mail', '0');
		$otp = $this->db->get('tbl_registration_lead');
		$otp = $otp->result();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Name');
		$sheet->setCellValue('B1', 'Email');
		$sheet->setCellValue('C1', 'Mobile');
		$rows = 2;
		foreach ($otp as $val) {
			$update = array(
				'is_mail' => '1'
			);
			$this->db->where('id', $val->id);
			$this->db->update('tbl_registration_lead');
			$sheet->setCellValue('A' . $rows, $val->name);
			$sheet->setCellValue('B' . $rows, $val->email);
			$sheet->setCellValue('C' . $rows, $val->mobile);
			$rows++;
		}
		$fileName = "otp_lead_" . date("d_m-Y") . ".xlsx";
		$writer = new Xlsx($spreadsheet);
		$writer->save("uploads/enquiry/" . $fileName);
		$this->db->where('is_deleted', '0');
		$this->db->where('is_mail', '0');
		$enquiry = $this->db->get('tbl_enquiry');
		$enquiry = $enquiry->result();
		$enquiry_sheet = $enq_spreadsheet->getActiveSheet();
		$enquiry_sheet->setCellValue('A1', 'Name');
		$enquiry_sheet->setCellValue('B1', 'Email');
		$enquiry_sheet->setCellValue('C1', 'Mobile');
		$enquiry_sheet->setCellValue('D1', 'Course');
		$rows = 2;
		foreach ($enquiry as $val) {
			$update = array(
				'is_mail' => '1'
			);
			$this->db->where('id', $val->id);
			$this->db->update('tbl_enquiry');
			$enquiry_sheet->setCellValue('A' . $rows, $val->name);
			$enquiry_sheet->setCellValue('B' . $rows, $val->email);
			$enquiry_sheet->setCellValue('C' . $rows, $val->mobile);
			$enquiry_sheet->setCellValue('D' . $rows, $val->course);
			$rows++;
		}
		$enq_fileName = "student_enq_lead_" . date("d_m-Y") . ".xlsx";
		$writer = new Xlsx($enq_spreadsheet);
		$writer->save("uploads/enquiry/" . $enq_fileName);
		$this->db->where('is_deleted', '0');
		$this->db->where('is_mail', '0');
		$center_enquiry = $this->db->get('tbl_center_enquiry');
		$center_enquiry = $center_enquiry->result();
		$cen_enquiry_sheet = $cen_spreadsheet->getActiveSheet();
		$cen_enquiry_sheet->setCellValue('A1', 'Name');
		$cen_enquiry_sheet->setCellValue('B1', 'Email');
		$cen_enquiry_sheet->setCellValue('C1', 'Mobile');
		$cen_enquiry_sheet->setCellValue('D1', 'Course');
		$rows = 2;
		foreach ($enquiry as $val) {
			$update = array(
				'is_mail' => '1'
			);
			$this->db->where('id', $val->id);
			$this->db->update('tbl_center_enquiry');
			$cen_enquiry_sheet->setCellValue('A' . $rows, $val->name);
			$cen_enquiry_sheet->setCellValue('B' . $rows, $val->email);
			$cen_enquiry_sheet->setCellValue('C' . $rows, $val->mobile);
			$cen_enquiry_sheet->setCellValue('D' . $rows, $val->course);
			$rows++;
		}
		$cen_enq_fileName = "cen_enq_lead_" . date("d_m-Y") . ".xlsx";
		$writer = new Xlsx($cen_spreadsheet);
		$writer->save("uploads/enquiry/" . $cen_enq_fileName);
		$admin_message = "Dear Admin";
		$admin_message .= "<br>Please find attached leads";
		$admin_message .= "<br>Thanks<br>Team Global University";
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
		$config['smtp_user'] = 'no-reply@tgu.com';  
		$config['smtp_pass'] = 'no-reply@123';  
		$config['smtp_port'] = 25;
		$this->email->initialize($config);  
      */
		$this->email->from(no_reply_mail, no_reply_name);
		$this->email->to('info@tgu.ac.in');
		// $this->email->cc('anujiips@gmail.com');
		// $this->email->bcc('techwebsolutions11@gmail.com');
		$this->email->subject('New Leads | ' . no_reply_name);
		$this->email->message($admin_message);
		$this->email->set_mailtype('html');
		$this->email->attach('uploads/enquiry/' . $fileName);
		$this->email->attach('uploads/enquiry/' . $enq_fileName);
		$this->email->attach('uploads/enquiry/' . $cen_enq_fileName);
		if ($this->email->send()) {
		} else {
		}
	}
	public function remove_duplicate_exam_form()
	{
		/*	$this->db->select('student_id');
		$this->db->where('payment_status','1');
		$this->db->where('status','1');
		$result = $this->db->get('tbl_examination_form');
		$result = $result->result();
		$ids = array();
		if(!empty($result)){
			foreach($result as $result_arr){
				$ids[] = $result_arr->student_id;
			}
		} 
		if(!empty($ids)){
			$data = array(
				'is_deleted' => '1'
			);
			$this->db->where_in('student_id',$ids);
			$this->db->where('payment_status','0');
			$this->db->update('tbl_examination_form',$data);
		}*/
		return true;
	}
	public function upload_exam_papper($papper)
	{
		$data = array(
			"course" => $this->input->post("course"),
			"stream" => $this->input->post("stream"),
			"year_sem" => $this->input->post("year_sem"),
			"subject" => $this->input->post("subject"),
			"file" => $papper,
		);
		if (empty($this->uri->segment(2))) {
			$data["created_on"] = date("Y-m-d H:i:s");
			$this->db->insert("tbl_exam_pappers", $data);
			return "saved";
		} else {
			$this->db->where("id", $this->input->post("id"));
			$this->db->update("tbl_exam_pappers", $data);
			return "updated";
		}
	}
	public function get_exam_papper_data_for_edit()
	{
		$this->db->where("is_deleted", "0");
		$this->db->where("id", $this->uri->segment(2));
		$result = $this->db->get("tbl_exam_pappers")->row();
		return $result;
	}
	// all birthdays
	public function get_all_birthdays_new()
	{
		if ($this->uri->segment(2) == "") {
			$this->db->where("is_deleted", "0");
			$this->db->where("appliation_status", "1");
			$this->db->where("DATE_FORMAT(date_of_birth, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')");
			$result = $this->db->get("tbl_guide_application");
			$guide = $result->result();
		} else {
			$month = $this->uri->segment(2);
			$this->db->where("is_deleted", "0");
			$this->db->where("appliation_status", "1");
			$this->db->where("MONTH(date_of_birth) = '$month'");
			$result = $this->db->get("tbl_guide_application");
			$guide = $result->result();
		}
		if ($this->uri->segment(2) == "") {
			$this->db->where("is_deleted", "0");
			$this->db->where("DATE_FORMAT(date_of_birth, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')");
			$result = $this->db->get("tbl_employees");
			$employee = $result->result();
		} else {
			$month = $this->uri->segment(2);
			$this->db->where("is_deleted", "0");
			$this->db->where("MONTH(date_of_birth) = '$month'");
			$result = $this->db->get("tbl_employees");
			$employee = $result->result();
		}
		if ($this->uri->segment(2) == "") {
			$this->db->where("is_deleted", "0");
			$this->db->where("DATE_FORMAT(date_of_birth, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')");
			$result = $this->db->get("tbl_staff_faculty");
			$staff = $result->result();
		} else {
			$month = $this->uri->segment(2);
			$this->db->where("is_deleted", "0");
			$this->db->where("MONTH(date_of_birth) = '$month'");
			$result = $this->db->get("tbl_staff_faculty");
			$staff = $result->result();
		}
		return array($guide, $employee, $staff);
	}
	public function send_birthday_wishes(){ 
		$this->db->select('name as first_name,email'); 
		$this->db->where("is_deleted", "0"); 
		$this->db->where("appliation_status", "1"); 
		$this->db->where("DATE_FORMAT(date_of_birth, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')"); 
		$result = $this->db->get("tbl_guide_application"); 
		$guide = $result->result();  
		$this->db->select('first_name,last_name,email'); 
		$this->db->where("is_deleted", "0"); 
		$this->db->where("DATE_FORMAT(date_of_birth, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')"); 
		$result = $this->db->get("tbl_employees"); 
		$employee = $result->result();  
		$this->db->select('first_name,email'); 
		$this->db->where("is_deleted", "0"); 
		$this->db->where("DATE_FORMAT(date_of_birth, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')"); 
		$result = $this->db->get("tbl_staff_faculty"); 
		$staff = $result->result(); 
		$new_arr = array_merge($staff, $guide); 
		if (!empty($new_arr)) { 
			foreach ($new_arr as $new_arr_result) { 
				$message = ' 
						<!DOCTYPE html> 
							<html> 
								<head> 
									<title></title>
									<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
									<meta name="viewport" content="width=device-width, initial-scale=1">
									<meta http-equiv="X-UA-Compatible" content="IE=edge" />
									<style type="text/css">
										@media screen {
											@font-face {
												font-family: "Lato";
												font-style: normal;
												font-weight: 400;
												src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
											}
								
											@font-face {
												font-family: "Lato";
												font-style: normal;
												font-weight: 700;
												src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
											}
								
											@font-face {
												font-family:  "Lato";
												font-style: italic;
												font-weight: 400;
												src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
											}
								
											@font-face {
												font-family: v
												font-style: italic;
												font-weight: 700;
												src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
											}
										}
								
										/* CLIENT-SPECIFIC STYLES */
										body,
										table,
										td,
										a {
											-webkit-text-size-adjust: 100%;
											-ms-text-size-adjust: 100%;
										}
								
										table,
										td {
											mso-table-lspace: 0pt;
											mso-table-rspace: 0pt;
										}
								
										img {
											-ms-interpolation-mode: bicubic;
										}
								
										/* RESET STYLES */
										img {
											border: 0;
											height: auto;
											line-height: 100%;
											outline: none;
											text-decoration: none;
										}
								
										table {
											border-collapse: collapse !important;
										}
								
										body {
											height: 100% !important;
											margin: 0 !important;
											padding: 0 !important;
											width: 100% !important;
										}
								
										/* iOS BLUE LINKS */
										a[x-apple-data-detectors] {
											color: inherit !important;
											text-decoration: none !important;
											font-size: inherit !important;
											font-family: inherit !important;
											font-weight: inherit !important;
											line-height: inherit !important;
										}
								
										/* MOBILE STYLES */
										@media screen and (max-width:600px) {
											h1 {
												font-size: 32px !important;
												line-height: 32px !important;
											}
										}
								
										/* ANDROID CENTER FIX */
										div[style*="margin: 16px 0;"] {
											margin: 0 !important;
										}
									</style>
								</head> 
								<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
									<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
				</div>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<!-- LOGO -->
					<tr>
						<td bgcolor="#FFA73B" align="center">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
								<tr>
									<td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
								<tr>
									<td bgcolor="#ffffff" align="center" valign="top" style=" border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
										<img src="' . base_url() . 'images/birthday_image.png" style="width: 100%;display: block; border: 0px;" />
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
								<tr>
									<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
										<p style="padding: 10px;margin: 0;">Dear ' . $new_arr_result->first_name . ',<br>Happy Birthday! Wishing you a year filled with happiness and success. Thank you for being an important part of our team. Enjoy your special day!</p>
										<br>
										
									</td>
								</tr>
								 
								
								
								<tr>
									<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
										<p style="padding: 10px;margin: 0;">Cheers,<br>THE GLOBAL UNIVERSITY</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					 
					 
				</table>
			</body>
			</html>
		'; 
				$this->load->library('email');
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['mailtype'] = 'html';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$this->email->initialize($config);
				$subject = 'Birthday Wishes | ' . no_reply_name;
				$this->email->from(no_reply_mail, no_reply_name);
				$this->email->to($new_arr_result->email);
				//$this->email->cc('shubham.btuniversity@gmail.com'); 
				//$this->email->cc('btumanipur@gmail.com'); 
				$this->email->cc('info@tgu.ac.in');
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->set_mailtype('html');
				if ($this->email->send()) {
				} else {
				}
			}
		}
		if (!empty($employee)) {
			foreach ($employee as $new_arr_result) {
				$message = '
						<!DOCTYPE html>
							<html>
								<head>
									<title></title>
									<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
									<meta name="viewport" content="width=device-width, initial-scale=1">
									<meta http-equiv="X-UA-Compatible" content="IE=edge" />
									<style type="text/css">
										@media screen {
											@font-face {
												font-family: "Lato";
												font-style: normal;
												font-weight: 400;
												src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
											}
								
											@font-face {
												font-family: "Lato";
												font-style: normal;
												font-weight: 700;
												src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
											}
								
											@font-face {
												font-family:  "Lato";
												font-style: italic;
												font-weight: 400;
												src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
											}
								
											@font-face {
												font-family: v
												font-style: italic;
												font-weight: 700;
												src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
											}
										}
								
										/* CLIENT-SPECIFIC STYLES */
										body,
										table,
										td,
										a {
											-webkit-text-size-adjust: 100%;
											-ms-text-size-adjust: 100%;
										}
								
										table,
										td {
											mso-table-lspace: 0pt;
											mso-table-rspace: 0pt;
										}
								
										img {
											-ms-interpolation-mode: bicubic;
										}
								
										/* RESET STYLES */
										img {
											border: 0;
											height: auto;
											line-height: 100%;
											outline: none;
											text-decoration: none;
										}
								
										table {
											border-collapse: collapse !important;
										}
								
										body {
											height: 100% !important;
											margin: 0 !important;
											padding: 0 !important;
											width: 100% !important;
										}
								
										/* iOS BLUE LINKS */
										a[x-apple-data-detectors] {
											color: inherit !important;
											text-decoration: none !important;
											font-size: inherit !important;
											font-family: inherit !important;
											font-weight: inherit !important;
											line-height: inherit !important;
										}
								
										/* MOBILE STYLES */
										@media screen and (max-width:600px) {
											h1 {
												font-size: 32px !important;
												line-height: 32px !important;
											}
										}
								
										/* ANDROID CENTER FIX */
										div[style*="margin: 16px 0;"] {
											margin: 0 !important;
										}
									</style>
								</head> 
								<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
									<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
				</div>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<!-- LOGO -->
					<tr>
						<td bgcolor="#FFA73B" align="center">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
								<tr>
									<td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
								<tr>
									<td bgcolor="#ffffff" align="center" valign="top" style=" border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
										<img src="' . base_url() . 'images/birthday_image.png" style="width: 100%;display: block; border: 0px;" />
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
								<tr>
									<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
										<p style="padding: 10px;margin: 0;">Dear ' . $new_arr_result->first_name . ' ' . $new_arr_result->last_name . ',<br>Happy Birthday! Wishing you a year filled with happiness and success. Thank you for being an important part of our team. Enjoy your special day!</p>
										<br>
										
									</td>
								</tr>
								 
								
								
								<tr>
									<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
										<p style="padding: 10px;margin: 0;">Cheers,<br>THE GLOBAL UNIVERSITY</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					 
					 
				</table>
			</body>
			</html>
		';
				$this->load->library('email');
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['mailtype'] = 'html';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$this->email->initialize($config);
				$subject = 'Birthday Wishes | ' . no_reply_name;
				$this->email->from(no_reply_mail, no_reply_name);
				$this->email->to($new_arr_result->email);
				//$this->email->cc('shubham.btuniversity@gmail.com'); 
				//$this->email->cc('btumanipur@gmail.com'); 
				$this->email->cc('info@tgu.ac.in');
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->set_mailtype('html');
				if ($this->email->send()) {
				} else {
				}
			}
		}
	}
	public function get_birthday_students()
	{
		// $this->db->where("is_deleted","0");
		// $this->db->where('id','2');
		// // $this->db->where('Month(date_of_birth)',date("m"));
		// // $this->db->where('Date(date_of_birth)',date("d"));
		// $result = $this->db->get("tbl_student");
		// return $result->row();
		// $query = "SELECT * FROM tbl_student WHERE DATE_FORMAT(date_of_birth, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')";
		$query = "SELECT * FROM 
            (SELECT id, student_name, date_of_birth FROM tbl_student UNION 
             SELECT id, first_name, date_of_birth FROM tbl_employees UNION 
             SELECT id, first_name, date_of_birth FROM tbl_staff_faculty) AS all_people 
          WHERE DATE_FORMAT(date_of_birth, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')";
		$result = $this->db->query($query);
		return $result->num_rows();
	}
	public function get_birthday_seperate_students()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('Month(date_of_birth)', date("m"));
		$this->db->where('Date(date_of_birth)', date("d"));
		$result = $this->db->get("tbl_separate_student");
		return $result->result();
	}
	public function get_birthday_employee()
	{
		// $this->db->where('is_deleted','0');
		// $this->db->where('Month(date_of_birth)',date("m"));
		// $this->db->where('Date(date_of_birth)',date("d"));
		// $result = $this->db->get("tbl_separate_student");
		// return $result->result();
	}
	public function get_birthday_faculty()
	{
		// $this->db->where('is_deleted','0');
		// $this->db->where('Month(date_of_birth)',date("m"));
		// $this->db->where('Date(date_of_birth)',date("d"));
		// $result = $this->db->get("tbl_staff_faculty");
		// return $result->result();
	}
	// public function get_course_data_for_dropdown()
	// {
	// 	$this->db->select('tbl_course.id,tbl_course.course_name');
	// 	$this->db->where("is_deleted", "0");
	// 	$this->db->where("status","1");
	// 	$result = $this->db->get("tbl_course")->result();
	// 	return $result;
	// }
	public function get_session_data_for_dropdown()
	{
		$this->db->select('tbl_session.id,tbl_session.session_name');
		$this->db->where("is_deleted", "0");
		// $this->db->where("status","1");
		$result = $this->db->get("tbl_session")->result();
		return $result;
	}
	public function get_center_data_for_dropdown()
	{
		$this->db->select('tbl_center.id,tbl_center.center_name');
		$this->db->where("is_deleted", "0");
		// $this->db->where("status","1");
		$result = $this->db->get("tbl_center")->result();
		return $result;
	}
	public function get_student_data_for_dropdown()
	{
		$this->db->select('tbl_student.id,tbl_student.student_name');
		$this->db->where("is_deleted", "0");
		$this->db->where("status", "1");
		$this->db->where("admission_status", 1);
		$this->db->or_where("admission_status", 3);
		$this->db->or_where("admission_status", 4);
		$this->db->where("verified_status", "1");
		$result = $this->db->get("tbl_student")->result();
		return $result;
	}
	// public function get_cbd_all_complaint($length, $start, $search)
	// {
	// 	$this->db->where('is_deleted', '0');
	// 	if ($search != "") {
	// 		$this->db->group_start();
	// 		$this->db->or_like('first_name', $search);
	// 		$this->db->or_like('last_name', $search);
	// 		$this->db->or_like('gender', $search);
	// 		$this->db->or_like('student_teacher', $search);
	// 		$this->db->or_like('mobile_number', $search);
	// 		$this->db->or_like('email', $search);
	// 		$this->db->or_like('complaint', $search);
	// 		$this->db->group_end();
	// 	}
	// 	$this->db->order_by('id', 'DESC');
	// 	$this->db->limit($length, $start);
	// 	$result = $this->db->get('tbl_caste_discrimination');
	// 	return $result->result();
	// }
	public function get_cbd_all_complaint($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('first_name', $search);
			$this->db->or_like('last_name', $search);
			$this->db->or_like('gender', $search);
			$this->db->or_like('student_teacher', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('complaint', $search);
			$this->db->or_like('enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_caste_discrimination');
		return $result->result();
	}
	public function get_cbd_all_complaint_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('first_name', $search);
			$this->db->or_like('last_name', $search);
			$this->db->or_like('gender', $search);
			$this->db->or_like('student_teacher', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('complaint', $search);
			$this->db->or_like('enrollment_number', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_caste_discrimination');
		return $result->num_rows();
	}
	// public function get_cbd_all_complaint_count($search)
	// {
	// 	$this->db->where('is_deleted', '0');
	// 	if ($search != "") {
	// 		$this->db->group_start();
	// 		$this->db->or_like('first_name', $search);
	// 		$this->db->or_like('last_name', $search);
	// 		$this->db->or_like('gender', $search);
	// 		$this->db->or_like('student_teacher', $search);
	// 		$this->db->or_like('mobile_number', $search);
	// 		$this->db->or_like('email', $search);
	// 		$this->db->or_like('complaint', $search);
	// 		$this->db->group_end();
	// 	}
	// 	$this->db->order_by('id', 'DESC');
	// 	$result = $this->db->get('tbl_caste_discrimination');
	// 	return $result->num_rows();
	// }
	public function get_single_cbd_form_admin()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_caste_discrimination');
		return $result->row();
	}
	public function delete()
	{
		$data = array(
			"is_deleted" => "1"
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update($this->uri->segment(3), $data);
		return true;
	}
	public function get_single_student_details($single_cbd_form)
	{
		$this->db->join('tbl_session', 'tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_type');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.status', '1');
		$this->db->where('tbl_student.enrollment_number', $single_cbd_form->enrollment_number);
		$result = $this->db->get('tbl_student');
		return $result->row();
		// $result = $result->row();
		// echo "<pre>";print_r($result);exit;
	}
	public function get_single_seperate_student_details($single_cbd_form)
	{
		$this->db->join('tbl_session', 'tbl_session.id = tbl_separate_student.session_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_separate_student.course_type');
		$this->db->where('tbl_separate_student.is_deleted', '0');
		$this->db->where('tbl_separate_student.status', '1');
		$this->db->where('tbl_separate_student.enrollment_number', $single_cbd_form->enrollment_number);
		$result = $this->db->get('tbl_separate_student');
		return $result->row();
		// $result = $result->row();
		// echo "<pre>";print_r($result);exit;
	}
	// public function update_cbd_form($file_name, $file)
	// {
	// 	if ($file_name != "") {
	// 		$this->db->where("id", $this->uri->segment(2));
	// 		$res = $this->db->get("tbl_caste_discrimination");
	// 		$res = $res->row();
	// 		if (!empty($res)) {
	// 			$file_name = $res->rti_reply . ',' . $file_name;
	// 		}
	// 	} else {
	// 		$file_name = $this->input->post('old_userfile');
	// 	}
	// 	if ($file != "") {
	// 		$this->db->where("id", $this->uri->segment(2));
	// 		$res = $this->db->get("tbl_caste_discrimination");
	// 		$res = $res->row();
	// 		if (!empty($res)) {
	// 			$file = $res->file . ',' . $file;
	// 		}
	// 	} else {
	// 		$file = $this->input->post('old_file');
	// 	}
	// 	$data = array(
	// 		'first_name' 		=> $this->input->post('first_name'),
	// 		'last_name' 		=> $this->input->post('last_name'),
	// 		'gender' 			=> $this->input->post('gender'),
	// 		'student_teacher' 	=> $this->input->post('complainant'),
	// 		'mobile_number' 	=> $this->input->post('contact'),
	// 		'email' 			=> $this->input->post('email'),
	// 		'complaint' 		=> $this->input->post('complaint'),
	// 		'address' 			=> $this->input->post('address'),
	// 		'city' 				=> $this->input->post('city'),
	// 		'pincode' 			=> $this->input->post('pin_code'),
	// 		'enrollment_number' => $this->input->post('enrollment'),
	// 		'tracking_id' 		=> $this->input->post('tracking_id'),
	// 		'dispatch_date' 	=> $this->input->post('dispatch_date'),
	// 		'rti_reply'			=> $file_name,
	// 		'file'				=> $file,
	// 	);
	// 	$this->db->where("id", $this->uri->segment(2));
	// 	$this->db->update("tbl_caste_discrimination", $data);
	// 	return true;
	// }
	public function update_cbd_form($file_name, $file)
	{
		if ($file_name != "") {
			$this->db->where("id", $this->uri->segment(2));
			$res = $this->db->get("tbl_caste_discrimination");
			$res = $res->row();
			if (!empty($res)) {
				$file_name = $res->rti_reply . ',' . $file_name;
			}
		} else {
			$file_name = $this->input->post('old_userfile');
		}
		if ($file != "") {
			$this->db->where("id", $this->uri->segment(2));
			$res = $this->db->get("tbl_caste_discrimination");
			$res = $res->row();
			if (!empty($res)) {
				$file = $res->file . ',' . $file;
			}
		} else {
			$file = $this->input->post('old_file');
		}
		$data = array(
			'first_name' 		=> $this->input->post('first_name'),
			'last_name' 		=> $this->input->post('last_name'),
			'gender' 			=> $this->input->post('gender'),
			'student_teacher' 	=> $this->input->post('complainant'),
			'mobile_number' 	=> $this->input->post('contact'),
			'email' 			=> $this->input->post('email'),
			'complaint' 		=> $this->input->post('complaint'),
			'address' 			=> $this->input->post('address'),
			'city' 				=> $this->input->post('city'),
			'pincode' 			=> $this->input->post('pin_code'),
			'enrollment_number' => $this->input->post('enrollment'),
			'added_by_name' => $this->input->post('added_by_name'),
			'tracking_id' 		=> $this->input->post('tracking_id'),
			'dispatch_date' 	=> date("Y-m-d", strtotime($this->input->post('dispatch_date'))),
			'rti_reply'			=> $file_name,
			'file'				=> $file,
		);
		$this->db->where("id", $this->uri->segment(2));
		$this->db->update("tbl_caste_discrimination", $data);
		return true;
	}
	public function update_rti_grievance_form()
	{
		if ($file_name != "") {
			$this->db->where("id", $this->uri->segment(2));
			$res = $this->db->get("tbl_rti_grievance");
			$res = $res->row();
			if (!empty($res)) {
				$file_name = $res->rti_reply . ',' . $file_name;
			}
		} else {
			$file_name = $this->input->post('old_userfile');
		}
		if ($file != "") {
			$this->db->where("id", $this->uri->segment(2));
			$res = $this->db->get("tbl_rti_grievance");
			$res = $res->row();
			if (!empty($res)) {
				$file = $res->file . ',' . $file;
			}
		} else {
			$file = $this->input->post('old_file');
		}
		$data = array(
			'first_name' 		=> $this->input->post('first_name'),
			'last_name' 		=> $this->input->post('last_name'),
			'gender' 			=> $this->input->post('gender'),
			'student_teacher' 	=> $this->input->post('complainant'),
			'mobile_number' 	=> $this->input->post('contact'),
			'email' 			=> $this->input->post('email'),
			'complaint' 		=> $this->input->post('complaint'),
			'address' 			=> $this->input->post('address'),
			'city' 				=> $this->input->post('city'),
			'pincode' 			=> $this->input->post('pin_code'),
			'enrollment_number' => $this->input->post('enrollment'),
			'added_by_name' => $this->input->post('added_by_name'),
			'tracking_id' 		=> $this->input->post('tracking_id'),
			'dispatch_date' 	=> date("Y-m-d", strtotime($this->input->post('dispatch_date'))),
			'rti_reply'			=> $file_name,
			'file'				=> $file,
		);
		$this->db->where("id", $this->uri->segment(2));
		$this->db->update("tbl_rti_grievance", $data);
		return true;
	}
	public function placement_record_form_list()
	{
		$this->db->select('tbl_placement_records.*,countries.name as country_name, states.name as state_name, cities.name as city_name');
		$this->db->join('countries', 'countries.id = tbl_placement_records.country');
		$this->db->join('states', 'states.id = tbl_placement_records.state');
		$this->db->join('cities', 'cities.id = tbl_placement_records.city');
		$this->db->where('tbl_placement_records.is_deleted', '0');
		$this->db->where('tbl_placement_records.status', '1');
		$this->db->where('tbl_placement_records.id', 'DESC');
		$result = $this->db->get('tbl_placement_records');
		return $result->result();
	}
	public function get_all_direct_success_payment_list($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('payment_status', '1');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('registration_number', $search);
			$this->db->or_like('name', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('amount', $search);
			$this->db->or_like('payment_id', $search);
			$this->db->or_like('payment_date', $search);
			$this->db->group_end();
		}
		$this->db->order_by('payment_date', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_direct_payment');
		return $result->result();
	}
	public function get_all_direct_success_payment_list_count($search)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('payment_status', '1');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('registration_number', $search);
			$this->db->or_like('name', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('amount', $search);
			$this->db->or_like('payment_id', $search);
			$this->db->or_like('payment_date', $search);
			$this->db->group_end();
		}
		$this->db->order_by('payment_date', 'DESC');
		$result = $this->db->get('tbl_direct_payment');
		return $result->num_rows();
	}
	public function get_all_direct_failed_payment_list($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('payment_status', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('registration_number', $search);
			$this->db->or_like('name', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('amount', $search);
			$this->db->or_like('payment_date', $search);
			$this->db->group_end();
		}
		$this->db->order_by('payment_date', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_direct_payment');
		return $result->result();
	}
	public function get_all_direct_failed_payment_list_count($search)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('payment_status', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('registration_number', $search);
			$this->db->or_like('name', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('amount', $search);
			$this->db->or_like('payment_date', $search);
			$this->db->group_end();
		}
		$this->db->order_by('payment_date', 'DESC');
		$result = $this->db->get('tbl_direct_payment');
		return $result->num_rows();
	}
	public function employee_left()
	{
		$data = array(
			'is_left' => '1',
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_employees', $data);
	}
	public function insert_seo_data()
	{
		$data = array(
			'url'               => $this->input->post('url'),
			'meta_title'		  => $this->input->post('meta_title'),
			'keyword'           => $this->input->post('keyword'),
			'meta_description'  => $this->input->post('meta_description'),
		);
		if ($this->input->post('hidden_id') == "") {
			$date = array(
				'created_on' => date('Y-m-d H:i:s'),
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_seo_title', $new_arr);
			return 1;
		} else {
			$this->db->where('id', $this->input->post('hidden_id'));
			$this->db->update('tbl_seo_title', $data);
			return 0;
		}
	}
	public function get_single_seo_data()
	{
		$this->db->where('id', $this->uri->segment(2));
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_seo_title');
		return $result->row();
	}
	public function get_seo_setup_list($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('url', $search);
			$this->db->or_like('meta_title', $search);
			$this->db->or_like('keyword', $search);
			$this->db->or_like('meta_description', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_seo_title');
		return $result->result();
	}
	public function get_seo_setup_list_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('url', $search);
			$this->db->or_like('meta_title', $search);
			$this->db->or_like('keyword', $search);
			$this->db->or_like('meta_description', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_seo_title');
		return $result->num_rows();
	}
	public function get_monthly_count_admission($month)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('MONTH(admission_date)', $month);
		$this->db->where('YEAR(admission_date)', date('Y'));
		$result = $this->db->get('tbl_student');
		$result = $result->num_rows();
		return $result;
	}
	public function get_monthly_count_admission_seperate($month)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('MONTH(admission_date)', $month);
		$this->db->where('YEAR(admission_date)', date('Y'));
		$result = $this->db->get('tbl_separate_student');
		$result = $result->num_rows();
		return $result;
	}
	public function get_monthly_count_center($month)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('MONTH(created_on)', $month);
		$this->db->where('YEAR(created_on)', date('Y'));
		$result = $this->db->get('tbl_center');
		$result = $result->num_rows();
		return $result;
	}
	public function get_center_total_amount()
	{
		$this->db->select('SUM(amount) as total_amount');
		$this->db->where('is_deleted', '0');
		$this->db->where('payment_status', '1');
		$this->db->where('YEAR(payment_date)', date('Y'));
		$result = $this->db->get('tbl_center_payment');
		$result = $result->row();
		return $result->total_amount;
	}
	public function get_student_total_amount()
	{
		$type_of_fee = array('1', '4', '2');
		$this->db->select(" SUM(total_fees) as total_fees");
		$this->db->where('YEAR(tbl_student_fees.payment_date)', date("Y"));
		$this->db->where_in('tbl_student_fees.fees_type', $type_of_fee);
		$this->db->where('tbl_student_fees.is_deleted', '0');
		$this->db->where('tbl_student_fees.payment_status', '1');
		$result_student_fee_yearly = $this->db->get('tbl_student_fees');
		$result_student_fee_yearly = $result_student_fee_yearly->row();
		$this->db->select("SUM(amount) as total_fees_migration");
		$this->db->where('YEAR(tbl_student_migration.created_on)', date("Y"));
		$this->db->where('tbl_student_migration.is_deleted', '0');
		$this->db->where('tbl_student_migration.payment_status', '1');
		$result_student_migration_yearly  = $this->db->get('tbl_student_migration');
		$result_student_migration_yearly = $result_student_migration_yearly->row();
		$this->db->select("SUM(amount) as total_fees_provisinal");
		$this->db->where('YEAR(tbl_student_provisional_degree.created_on)', date("Y"));
		$this->db->where('tbl_student_provisional_degree.is_deleted', '0');
		$this->db->where('tbl_student_provisional_degree.payment_status', '1');
		$result_student_provisional_yearly  = $this->db->get('tbl_student_provisional_degree');
		$result_student_provisional_yearly = $result_student_provisional_yearly->row();
		$this->db->select("SUM(amount) as total_fees_transfer");
		$this->db->where('YEAR(tbl_student_transfer.created_on)', date("Y"));
		$this->db->where('tbl_student_transfer.is_deleted', '0');
		$this->db->where('tbl_student_transfer.payment_status', '1');
		$result_student_transfer_yearly = $this->db->get('tbl_student_transfer');
		$result_student_transfer_yearly = $result_student_transfer_yearly->row();
		$this->db->select("SUM(amount) as total_fees_degree");
		$this->db->where('YEAR(tbl_student_degree.created_on)', date("Y"));
		$this->db->where('tbl_student_degree.is_deleted', '0');
		$this->db->where('tbl_student_degree.payment_status', '1');
		$this->db->join('tbl_student', 'tbl_student.id =  tbl_student_degree.student_id');
		$result_student_degree_yearly  = $this->db->get('tbl_student_degree');
		$result_student_degree_yearly = $result_student_degree_yearly->row();
		$this->db->select("SUM(amount) as total_fees_transcript");
		$this->db->where('YEAR(tbl_transcript.created_on)', date("Y"));
		$this->db->where('tbl_transcript.is_deleted', '0');
		$this->db->where('tbl_transcript.payment_status', '1');
		$result_student_transcript_yearly  = $this->db->get('tbl_transcript');
		$result_student_transcript_yearly = $result_student_transcript_yearly->row();
		$result = $result_student_fee_yearly->total_fees + $result_student_migration_yearly->total_fees_migration + $result_student_provisional_yearly->total_fees_provisinal + $result_student_transfer_yearly->total_fees_transfer + $result_student_degree_yearly->total_fees_degree + $result_student_transcript_yearly->total_fees_transcript;
		return $result;
	}
	public function get_separate_student_total_amount()
	{
		$this->db->select("SUM(fees) as total_fees_separate_student");
		$this->db->where('YEAR(tbl_separate_student_fees.created_on)', date("Y"));
		$this->db->where('tbl_separate_student_fees.is_deleted', '0');
		$result_student_separate_fee = $this->db->get('tbl_separate_student_fees');
		$result_student_separate_fee = $result_student_separate_fee->row();
		$this->db->select("SUM(amount) as total_fees_separate_migration");
		$this->db->where('YEAR(tbl_separate_student_migration.created_on)', date("Y"));
		$this->db->where('tbl_separate_student_migration.is_deleted', '0');
		$this->db->where('tbl_separate_student_migration.payment_status', '1');
		$result_student_separate_migration  = $this->db->get('tbl_separate_student_migration');
		$result_student_separate_migration = $result_student_separate_migration->row();
		$this->db->select("SUM(amount) as total_fees_separate_provisional");
		$this->db->where('YEAR(tbl_separate_student_provisional_degree.created_on)', date("Y"));
		$this->db->where('tbl_separate_student_provisional_degree.is_deleted', '0');
		$this->db->where('tbl_separate_student_provisional_degree.payment_status', '1');
		$result_student_separate_provisional  = $this->db->get('tbl_separate_student_provisional_degree');
		$result_student_separate_provisional = $result_student_separate_provisional->row();
		$this->db->select("SUM(amount) as total_fees_separate_transfer");
		$this->db->where('YEAR(tbl_separate_student_transfer.created_on)', date("Y"));
		$this->db->where('tbl_separate_student_transfer.is_deleted', '0');
		$this->db->where('tbl_separate_student_transfer.payment_status', '1');
		$tbl_separate_student_transfer  = $this->db->get('tbl_separate_student_transfer');
		$tbl_separate_student_transfer = $tbl_separate_student_transfer->row();
		$this->db->select("SUM(amount) as total_fees_separate_degree");
		$this->db->where('YEAR(tbl_separate_student_degree.created_on)', date("Y"));
		$this->db->where('tbl_separate_student_degree.is_deleted', '0');
		$this->db->where('tbl_separate_student_degree.payment_status', '1');
		$this->db->join('tbl_separate_student', 'tbl_separate_student.id = tbl_separate_student_degree.student_id');
		$result_separate_student_degree  = $this->db->get('tbl_separate_student_degree');
		$result_separate_student_degree = $result_separate_student_degree->row();
		$this->db->select("SUM(amount) as total_fees_separate_transcript");
		$this->db->where('YEAR(tbl_separate_transcript.payment_date)', date("Y"));
		$this->db->where('tbl_separate_transcript.is_deleted', '0');
		$this->db->where('tbl_separate_transcript.payment_status', '1');
		$this->db->join('tbl_separate_student', 'tbl_separate_student.id = tbl_separate_transcript.registration_id');
		$result_separate_student_transcript  = $this->db->get('tbl_separate_transcript');
		$result_separate_student_transcript = $result_separate_student_transcript->row();
		$result = $result_student_separate_fee->total_fees_separate_student + $result_student_separate_migration->total_fees_separate_migration + $result_student_separate_provisional->total_fees_separate_provisional + $tbl_separate_student_transfer->total_fees_separate_transfer + $result_separate_student_degree->total_fees_separate_degree + $result_separate_student_transcript->total_fees_separate_transcript;
		return $result;
	}
	public function get_active_course()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('course_name', 'ASC');
		$result = $this->db->get('tbl_course');
		return $result->result();
	}
	public function get_active_stream()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('stream_name', 'ASC');
		$result = $this->db->get('tbl_stream');
		return $result->result();
	}
	public function get_active_subject()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->order_by('subject_name', 'ASC');
		$result = $this->db->get('tbl_subject');
		return $result->result();
	}
	public function insert_paper_data($photo)
	{
		if ($photo != "") {
			$file_path = "uploads/papers/" . $this->input->post('old_file');
			if (file_exists($file_path) && is_file($file_path)) {
				unlink($file_path);
			}
		} else {
			$photo = $this->input->post('old_file');
		}
		$data = array(
			'course_id' 		=> $this->input->post('course'),
			'stream_id' 		=> $this->input->post('stream'),
			'subject_id' 		=> $this->input->post('subject'),
			'session_id' 		=> $this->input->post('session'),
			'course_mode' 		=> $this->input->post('course_mode'),
			'year_sem' 		=> $this->input->post('year_sem'),
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
	public function get_all_papers_ajax_count($search)
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.center_id', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_subject.subject_name', $search);
			$this->db->or_like('tbl_papers.file', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id');
		$this->db->order_by('tbl_papers.id', 'DESC');
		$this->db->group_by('tbl_papers.stream_id');
		$result = $this->db->get('tbl_papers');
		return $result->num_rows();
	}
	public function get_all_papers_ajax($length, $start, $search)
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.center_id', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_subject.subject_name', $search);
			$this->db->or_like('tbl_papers.file', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id');
		// $this->db->order_by('tbl_papers.course_id', 'ASC');
		$this->db->order_by('tbl_papers.id', 'DESC');
		$this->db->group_by('tbl_papers.stream_id');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_papers');
		return $result->result();
	}
	public function get_center_all_papers_ajax_count($search)
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name,tbl_center.center_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_subject.subject_name', $search);
			$this->db->or_like('tbl_papers.file', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id', 'left');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id', 'left');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_papers.center_id', 'left');
		$this->db->group_by('tbl_papers.stream_id,tbl_papers.course_id,tbl_center.id');
		$result = $this->db->get('tbl_papers');
		return $result->num_rows();
	}
	public function get_center_all_papers_ajax($length, $start, $search)
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name,tbl_center.center_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name', $search);
			$this->db->or_like('tbl_stream.stream_name', $search);
			$this->db->or_like('tbl_subject.subject_name', $search);
			$this->db->or_like('tbl_papers.file', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id', 'left');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id', 'left');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id', 'left');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_papers.center_id', 'left');
		$this->db->group_by('tbl_papers.stream_id,tbl_papers.course_id,tbl_center.id');
		$this->db->order_by('tbl_papers.id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_papers');
		return $result->result();
	}
	public function get_single_paper()
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.id', $this->uri->segment(2));
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id ');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id ');
		$result = $this->db->get('tbl_papers');
		return $result->row();
	}
	public function get_stream_name_course()
	{
		$this->db->select('tbl_course_stream_relation.course,tbl_course_stream_relation.stream,tbl_stream.id,tbl_stream.stream_name');
		$this->db->where('tbl_course_stream_relation.course', $this->input->post('course'));
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		echo json_encode($result->result());
	}
	public function get_subject_name_stream()
	{
		$this->db->select('subject_name,id');
		$this->db->where('stream', $this->input->post('stream'));
		$result = $this->db->get('tbl_subject');
		echo json_encode($result->result());
	}
	// approve assesment
	// public function approve_assesment()
	// {
	// 	$data = array(
	// 		'assessment_status' => '1',
	// 		'updated_by' 		=> $this->session->userdata('admin_id'),
	// 	);
	// 	$this->db->where('id', $this->uri->segment(2));
	// 	$this->db->update($this->uri->segment(3), $data);
	// 	return true;
	// }
	public function approve_assesment(){ 
		$id = $this->uri->segment(2);
		$data = array(
			'assessment_status' => '1',
			'updated_by' 		=> $this->session->userdata('admin_id'),
		);
		$this->db->where('id', $id);
		$this->db->update($this->uri->segment(3), $data);
		return true;
	} 
    public function reject_assesment()
	{
		$rejection_remark = $this->input->post('rejection_remark');
		$id = $this->input->post('id');
		$table = $this->uri->segment(3); 
		$data = array(
			'rejection_remark' => $this->input->post('rejection_remark'),
			'assessment_status' => '2',
			'updated_by' 		=> $this->session->userdata('admin_id'),
		); 
		$this->db->where('id', $id);
		$this->db->update('tbl_self_assesments', $data);
		$student_details = $this->get_student_details();
		$this->send_rejection_email($student_details, $rejection_remark); 
		return true;
	}
	public function reject_teacher_assesment()
	{
		$rejection_remark = $this->input->post('rejection_remark_teacher');
		$data = array(
			'rejection_remark' => $this->input->post('rejection_remark_teacher'),
			'assessment_status' => '2',
			'updated_by' 		=> $this->session->userdata('admin_id'),
		);
		$this->db->where('id', $this->input->post('teacher_id'));
		$this->db->update('tbl_teacher_assesments', $data);
		$student_details = $this->get_student_details_teacher();
		$this->send_rejection_email($student_details, $rejection_remark);
		//$this->send_rejection_sms($student_details, $rejection_remark);
		return true;
	}
	public function reject_assignment_assesment()
	{
		$rejection_remark = $this->input->post('rejection_remark_assignment');
		$data = array(
			'rejection_remark' => $this->input->post('rejection_remark_assignment'),
			'assessment_status' => '2',
			'updated_by' 		=> $this->session->userdata('admin_id'),
		);
		$this->db->where('id', $this->input->post('assignment_id'));
		$this->db->update('tbl_assignment', $data);
		$student_details = $this->get_student_details_assignment();
		$this->send_rejection_email($student_details, $rejection_remark);
		$this->send_rejection_sms($student_details, $rejection_remark);
		return true;
	}
	public function reject_industry_assesment()
	{
		$rejection_remark = $this->input->post('rejection_remark_industry');
		$data = array(
			'rejection_remark' => $this->input->post('rejection_remark_industry'),
			'assessment_status' => '2',
			'updated_by' 		=> $this->session->userdata('admin_id'),
		);
		$this->db->where('id', $this->input->post('industry_id'));
		$this->db->update('tbl_industry_assesment', $data);
		$student_details = $this->get_student_details_industry();
		$this->send_rejection_email($student_details, $rejection_remark);
		$this->send_rejection_sms($student_details, $rejection_remark);
		return true;
	}
	public function reject_guardian_assesment()
	{
		$rejection_remark = $this->input->post('rejection_remark_guardian');
		$data = array(
			'rejection_remark' => $this->input->post('rejection_remark_guardian'),
			'assessment_status' => '2',
			'updated_by' 		=> $this->session->userdata('admin_id'),
		);
		$this->db->where('id', $this->input->post('guardian_id'));
		$this->db->update('tbl_guardian_assesment', $data);
		$student_details = $this->get_student_details_guardian();
		$this->send_rejection_email($student_details, $rejection_remark);
		$this->send_rejection_sms($student_details, $rejection_remark);
		return true;
	}
	public function get_student_details()
	{
		$this->db->join('tbl_student', 'tbl_student.id = tbl_self_assesments.student_id');
		$this->db->where('tbl_self_assesments.is_deleted', '0');
		$this->db->where('tbl_self_assesments.id', $this->input->post('id'));
		$result = $this->db->get('tbl_self_assesments');
		return $result->row();
	}
	public function get_student_details_industry()
	{
		$this->db->join('tbl_student', 'tbl_student.id = tbl_industry_assesment.student_id');
		$this->db->where('tbl_industry_assesment.is_deleted', '0');
		$this->db->where('tbl_industry_assesment.id', $this->input->post('industry_id'));
		$result = $this->db->get('tbl_industry_assesment');
		return $result->row();
	}
	public function get_student_details_guardian()
	{
		$this->db->join('tbl_student', 'tbl_student.id = tbl_guardian_assesment.student_id');
		$this->db->where('tbl_guardian_assesment.is_deleted', '0');
		$this->db->where('tbl_guardian_assesment.id', $this->input->post('guardian_id'));
		$result = $this->db->get('tbl_guardian_assesment');
		return $result->row();
	}
	public function get_student_details_assignment()
	{
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.id', $this->input->post('assignment_id'));
		$result = $this->db->get('tbl_assignment');
		return $result->row();
	}
	public function get_student_details_teacher()
	{
		$this->db->join('tbl_student', 'tbl_student.id = tbl_teacher_assesments.student_id');
		$this->db->where('tbl_teacher_assesments.is_deleted', '0');
		$this->db->where('tbl_teacher_assesments.id', $this->input->post('teacher_id'));
		$result = $this->db->get('tbl_teacher_assesments');
		return $result->row();
	}
	public function send_rejection_email($student_details, $rejection_remark)
	{
		// print_r($student_details);exit;
		// $message = " $student_details->student_name / $student_details->email";
		$message = '
			<!DOCTYPE html>
                <html>
                    <head>
                        <title></title>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <style type="text/css">
                            @media screen {
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 400;
                                    src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: "Lato";
                                    font-style: normal;
                                    font-weight: 700;
                                    src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family:  "Lato";
                                    font-style: italic;
                                    font-weight: 400;
                                    src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                                }
                    
                                @font-face {
                                    font-family: v
                                    font-style: italic;
                                    font-weight: 700;
                                    src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                                }
                            }
                    
                            /* CLIENT-SPECIFIC STYLES */
                            body,
                            table,
                            td,
                            a {
                                -webkit-text-size-adjust: 100%;
                                -ms-text-size-adjust: 100%;
                            }
                    
                            table,
                            td {
                                mso-table-lspace: 0pt;
                                mso-table-rspace: 0pt;
                            }
                    
                            img {
                                -ms-interpolation-mode: bicubic;
                            }
                    
                            /* RESET STYLES */
                            img {
                                border: 0;
                                height: auto;
                                line-height: 100%;
                                outline: none;
                                text-decoration: none;
                            }
                    
                            table {
                                border-collapse: collapse !important;
                            }
                    
                            body {
                                height: 100% !important;
                                margin: 0 !important;
                                padding: 0 !important;
                                width: 100% !important;
                            }
                    
                            /* iOS BLUE LINKS */
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }
                    
                            /* MOBILE STYLES */
                            @media screen and (max-width:600px) {
                                h1 {
                                    font-size: 32px !important;
                                    line-height: 32px !important;
                                }
                            }
                    
                            /* ANDROID CENTER FIX */
                            div[style*="margin: 16px 0;"] {
                                margin: 0 !important;
                            }
                        </style>
                    </head> 
                    <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
                        <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We are thrilled to have you here! Get ready to drive into your new account.
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#FFA73B" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 35px; font-weight: 400; margin: 2;">Assesment is Rejected!</h1>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Dear ' . $student_details->student_name . ',<br><br> Please upload valid assessment as we have verified it and it is not valid.<br>Please check below reason of rejection.<br><b>' . $rejection_remark . '</b><br></p>
                            <br>
                            
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If you have any questions, just reply to email: info@theglobaluniversity.edu.in <br> We are always happy to help out.</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;"><br>THE GLOBAL UNIVERSITY</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                            <p style="margin: 0;"><a href="' . base_url() . 'contact-us" target="_blank" style="color: #FFA73B;">We&rsquo;re here to help you out</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
         
    </table>
</body>
</html>
			';
		//echo $message;exit();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = smtp_host;
		$config['smtp_port'] = 587;
		$config['smtp_user'] = smtp_user;
		$config['smtp_pass'] = smtp_pass;
		$config['newline'] = "\r\n";
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from(no_reply_mail, 'tgu.ac.in');
		$this->email->to($student_details->email);
		//$this->email->to('imsidgade@gmail.com');
		$this->email->subject('Assesment Rejected | ' . no_reply_name);
		$this->email->message($message);
		$this->email->set_mailtype('html');
		if ($this->email->send()) {
		} else {
		}
	}
	public function send_rejection_sms($student_details, $rejection_remark)
	{
		$name = "$student_details->student_name";
		// $mobile_number = $student_details->mobile;
		$mobile_number = "8999459806";
		$authKey = SMSKEY;
		$senderId = SENDERID;
		$route = ROUTE;
		$message = "Dear " . $name . ", " . $rejection_remark . "";
		// print_r($message);exit;
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
	}
	public function get_my_guardian_assesment()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_guardian_assesment.*,tbl_student.student_name');
		$this->db->where('tbl_guardian_assesment.is_deleted', '0');
		$this->db->where('tbl_guardian_assesment.status', '1');
		$this->db->where('tbl_guardian_assesment.status', '1');
		$this->db->where('tbl_guardian_assesment.student_id', $this->uri->segment(2));
		$this->db->join('tbl_student', 'tbl_student.id = tbl_guardian_assesment.student_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_guardian_assesment.updated_by', 'left');
		$this->db->order_by('tbl_guardian_assesment.year_sem', 'DESC');
		$result = $this->db->get('tbl_guardian_assesment');
		return $result->result();
	}
	public function get_my_guardian_assesment_new()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_guardian_assesment.*,tbl_student.student_name');
		$this->db->where('tbl_guardian_assesment.is_deleted', '0');
		$this->db->where('tbl_guardian_assesment.status', '1');
		$this->db->where('tbl_guardian_assesment.assessment_status', '0');
		if ($_GET['start_date'] != "") {
			$this->db->where('DATE(tbl_guardian_assesment.created_on) >=', date("Y-m-d", strtotime($_GET['start_date'])));
			$this->db->where('DATE(tbl_guardian_assesment.created_on) <=', date("Y-m-d", strtotime($_GET['end_date'])));
		}
		//$this->db->where('tbl_guardian_assesment.student_id',$this->uri->segment(2));   
		$this->db->join('tbl_student', 'tbl_student.id = tbl_guardian_assesment.student_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_guardian_assesment.updated_by', 'left');
		$this->db->order_by('tbl_guardian_assesment.year_sem', 'DESC');
		$result = $this->db->get('tbl_guardian_assesment');
		return $result->result();
	}
	public function get_my_industry_assesment()
	{
		if (isset($_GET['session'])) {
			$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_industry_assesment.*,tbl_student.student_name,tbl_center.center_name,tbl_assignment.assignment_title');
			$this->db->where('tbl_industry_assesment.is_deleted', '0');
			$this->db->where('tbl_industry_assesment.status', '1');
			$this->db->where('tbl_industry_assesment.assessment_status', '0');
			if (isset($_GET['session']) && $_GET['session'] != "") {
				$this->db->where('tbl_student.session_id', $_GET['session']);
			}
			if (isset($_GET['name']) && $_GET['name'] != "") {
				$this->db->like('tbl_student.student_name', $_GET['name']);
			}
			if (isset($_GET['enrollment_number']) && $_GET['enrollment_number'] != "") {
				$this->db->where('tbl_student.enrollment_number', $_GET['enrollment_number']);
			}
			if (isset($_GET['month']) && $_GET['month'] != "") {
				$this->db->where('Month(tbl_industry_assesment.created_on)', $_GET['month']);
			}
			if (isset($_GET['year']) && $_GET['year'] != "") {
				$this->db->where('Year(tbl_industry_assesment.created_on)', $_GET['year']);
			}
			if (isset($_GET['start_date']) && $_GET['start_date'] != "") {
				$this->db->where('DATE(tbl_industry_assesment.created_on) >=', date("Y-m-d", strtotime($_GET['start_date'])));
			}
			if (isset($_GET['end_date']) && $_GET['end_date'] != "") {
				$this->db->where('DATE(tbl_industry_assesment.created_on) <=', date("Y-m-d", strtotime($_GET['end_date'])));
			}
			$this->db->join('tbl_student', 'tbl_student.id = tbl_industry_assesment.student_id');
			$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
			$this->db->join('tbl_employees', 'tbl_employees.id = tbl_industry_assesment.updated_by', 'left');
			$this->db->join('tbl_assignment', 'tbl_assignment.id = tbl_industry_assesment.student_id', 'left');
			$this->db->order_by('tbl_industry_assesment.year_sem', 'DESC');
			$result = $this->db->get('tbl_industry_assesment');
			return $result->result();
		} else {
			return array();
		}
	}
	public function get_my_self_assesment()
	{
		if (isset($_GET['session'])) {
			$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_self_assesments.*,tbl_student.student_name,tbl_student.email,tbl_center.center_name');
			$this->db->where('tbl_self_assesments.is_deleted', '0');
			$this->db->where('tbl_self_assesments.status', '1');
			$this->db->where('tbl_self_assesments.assessment_status', '0');
			if (isset($_GET['session']) && $_GET['session'] != "") {
				$this->db->where('tbl_student.session_id', $_GET['session']);
			}
			if (isset($_GET['name']) && $_GET['name'] != "") {
				$this->db->like('tbl_student.student_name', $_GET['name']);
			}
			if (isset($_GET['enrollment_number']) && $_GET['enrollment_number'] != "") {
				$this->db->where('tbl_student.enrollment_number', $_GET['enrollment_number']);
			}
			if (isset($_GET['month']) && $_GET['month'] != "") {
				$this->db->where('Month(tbl_self_assesments.created_on)', $_GET['month']);
			}
			if (isset($_GET['year']) && $_GET['year'] != "") {
				$this->db->where('Year(tbl_self_assesments.created_on)', $_GET['year']);
			}
			if (isset($_GET['start_date']) && $_GET['start_date'] != "") {
				$this->db->where('DATE(tbl_self_assesments.created_on) >=', date("Y-m-d", strtotime($_GET['start_date'])));
			}
			if (isset($_GET['end_date']) && $_GET['end_date'] != "") {
				$this->db->where('DATE(tbl_self_assesments.created_on) <=', date("Y-m-d", strtotime($_GET['end_date'])));
			}
			$this->db->join('tbl_student', 'tbl_student.id = tbl_self_assesments.student_id');
			$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
			$this->db->join('tbl_employees', 'tbl_employees.id = tbl_self_assesments.updated_by', 'left');
			$this->db->order_by('tbl_self_assesments.year_sem', 'DESC');
			$result = $this->db->get('tbl_self_assesments');
			return $result->result();
			// $result = $result->result();
			// echo "<pre>";print_r($result);exit;
		} else {
			return array();
		}
	}
	public function get_my_teacher_assesment()
	{
		if (isset($_GET['session'])) {
			$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_teacher_assesments.*,tbl_student.student_name,tbl_center.center_name');
			$this->db->where('tbl_teacher_assesments.is_deleted', '0');
			$this->db->where('tbl_teacher_assesments.status', '1');
			$this->db->where('tbl_teacher_assesments.assessment_status', '0');
			if (isset($_GET['session']) && $_GET['session'] != "") {
				$this->db->where('tbl_student.session_id', $_GET['session']);
			}
			if (isset($_GET['name']) && $_GET['name'] != "") {
				$this->db->like('tbl_student.student_name', $_GET['name']);
			}
			if (isset($_GET['enrollment_number']) && $_GET['enrollment_number'] != "") {
				$this->db->where('tbl_student.enrollment_number', $_GET['enrollment_number']);
			}
			if (isset($_GET['month']) && $_GET['month'] != "") {
				$this->db->where('Month(tbl_teacher_assesments.created_on)', $_GET['month']);
			}
			if (isset($_GET['year']) && $_GET['year'] != "") {
				$this->db->where('Year(tbl_teacher_assesments.created_on)', $_GET['year']);
			}
			if (isset($_GET['start_date']) && $_GET['start_date'] != "") {
				$this->db->where('DATE(tbl_teacher_assesments.created_on) >=', date("Y-m-d", strtotime($_GET['start_date'])));
			}
			if (isset($_GET['end_date']) && $_GET['end_date'] != "") {
				$this->db->where('DATE(tbl_teacher_assesments.created_on) <=', date("Y-m-d", strtotime($_GET['end_date'])));
			}
			$this->db->join('tbl_student', 'tbl_student.id = tbl_teacher_assesments.student_id');
			$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
			$this->db->join('tbl_employees', 'tbl_employees.id = tbl_teacher_assesments.updated_by', 'left');
			$this->db->order_by('tbl_teacher_assesments.year_sem', 'DESC');
			$result = $this->db->get('tbl_teacher_assesments');
			return $result->result();
		} else {
			return array();
		}
	}
	public function get_assignment()
	{
		if (isset($_GET['session'])) {
			$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_assignment.*,tbl_student.student_name,tbl_center.center_name');
			$this->db->where('tbl_assignment.is_deleted', '0');
			$this->db->where('tbl_assignment.status', '1');
			$this->db->where('tbl_assignment.assessment_status', '0');
			if (isset($_GET['session']) && $_GET['session'] != "") {
				$this->db->where('tbl_student.session_id', $_GET['session']);
			}
			if (isset($_GET['name']) && $_GET['name'] != "") {
				$this->db->like('tbl_student.student_name', $_GET['name']);
			}
			if (isset($_GET['enrollment_number']) && $_GET['enrollment_number'] != "") {
				$this->db->where('tbl_student.enrollment_number', $_GET['enrollment_number']);
			}
			if (isset($_GET['month']) && $_GET['month'] != "") {
				$this->db->where('Month(tbl_assignment.created_on)', $_GET['month']);
			}
			if (isset($_GET['year']) && $_GET['year'] != "") {
				$this->db->where('Year(tbl_assignment.created_on)', $_GET['year']);
			}
			if (isset($_GET['start_date']) && $_GET['start_date'] != "") {
				$this->db->where('DATE(tbl_assignment.created_on) >=', date("Y-m-d", strtotime($_GET['start_date'])));
			}
			if (isset($_GET['end_date']) && $_GET['end_date'] != "") {
				$this->db->where('DATE(tbl_assignment.created_on) <=', date("Y-m-d", strtotime($_GET['end_date'])));
			}
			$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
			$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
			$this->db->join('tbl_employees', 'tbl_employees.id = tbl_assignment.updated_by', 'left');
			$this->db->order_by('tbl_assignment.year_sem', 'DESC');
			$result = $this->db->get('tbl_assignment');
			return $result->result();
		} else {
			return array();
		}
	}
	//monthwise assessment
	public function get_my_guardian_assesment_new_month()
	{
		if (isset($_GET['session'])) {
			$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_guardian_assesment.*,tbl_student.student_name,tbl_center.center_name,tbl_assignment.assignment_title');
			$this->db->where('tbl_guardian_assesment.is_deleted', '0');
			$this->db->where('tbl_guardian_assesment.status', '1');
			$this->db->where('tbl_guardian_assesment.assessment_status', '0');
			if (isset($_GET['session']) && $_GET['session'] != "") {
				$this->db->where('tbl_student.session_id', $_GET['session']);
			}
			if (isset($_GET['name']) && $_GET['name'] != "") {
				$this->db->like('tbl_student.student_name', $_GET['name']);
			}
			if (isset($_GET['enrollment_number']) && $_GET['enrollment_number'] != "") {
				$this->db->where('tbl_student.enrollment_number', $_GET['enrollment_number']);
			}
			if (isset($_GET['month']) && $_GET['month'] != "") {
				$this->db->where('Month(tbl_guardian_assesment.created_on)', $_GET['month']);
			}
			if (isset($_GET['year']) && $_GET['year'] != "") {
				$this->db->where('Year(tbl_guardian_assesment.created_on)', $_GET['year']);
			}
			if (isset($_GET['start_date']) && $_GET['start_date'] != "") {
				$this->db->where('DATE(tbl_guardian_assesment.created_on) >=', date("Y-m-d", strtotime($_GET['start_date'])));
			}
			if (isset($_GET['end_date']) && $_GET['end_date'] != "") {
				$this->db->where('DATE(tbl_guardian_assesment.created_on) <=', date("Y-m-d", strtotime($_GET['end_date'])));
			}
			$this->db->join('tbl_student', 'tbl_student.id = tbl_guardian_assesment.student_id');
			$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
			$this->db->join('tbl_employees', 'tbl_employees.id = tbl_guardian_assesment.updated_by', 'left');
			$this->db->join('tbl_assignment', 'tbl_assignment.id = tbl_guardian_assesment.student_id', 'left');
			$this->db->order_by('tbl_guardian_assesment.year_sem', 'DESC');
			$result = $this->db->get('tbl_guardian_assesment');
			return $result->result();
		} else {
			return array();
		}
	}
	public function get_my_self_assesment_month()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_self_assesments.*,tbl_student.student_name, tbl_student.email');
		$this->db->where('tbl_self_assesments.is_deleted', '0');
		$this->db->where('tbl_self_assesments.status', '1');
		$this->db->where('tbl_self_assesments.assessment_status', '0');
		$month = $this->uri->segment(2);
		$currentYear = date('Y-') . $month;
		$this->db->where("DATE_FORMAT(tbl_self_assesments.created_on, '%Y-%m') = '$currentYear'");
		// $this->db->where("MONTH(tbl_self_assesments.created_on) = '$month'"); 
		$this->db->join('tbl_student', 'tbl_student.id = tbl_self_assesments.student_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_self_assesments.updated_by', 'left');
		$this->db->order_by('tbl_self_assesments.year_sem', 'DESC');
		$result = $this->db->get('tbl_self_assesments');
		return $result->result();
	}
	public function get_my_teacher_assesment_month()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_teacher_assesments.*,tbl_student.student_name');
		$this->db->where('tbl_teacher_assesments.is_deleted', '0');
		$this->db->where('tbl_teacher_assesments.status', '1');
		$this->db->where('tbl_teacher_assesments.assessment_status', '0');
		$month = $this->uri->segment(2);
		$currentYear = date('Y-') . $month;
		$this->db->where("DATE_FORMAT(tbl_teacher_assesments.created_on, '%Y-%m') = '$currentYear'");
		// $this->db->where("MONTH(tbl_teacher_assesments.created_on) = '$month'");
		$this->db->join('tbl_student', 'tbl_student.id = tbl_teacher_assesments.student_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_teacher_assesments.updated_by', 'left');
		$this->db->order_by('tbl_teacher_assesments.year_sem', 'DESC');
		$result = $this->db->get('tbl_teacher_assesments');
		return $result->result();
	}
	public function get_my_self_assesment_separate()
	{
		$this->db->select('tbl_separate_student_self_assesments.*,tbl_student.student_name');
		$this->db->where('tbl_separate_student_self_assesments.is_deleted', '0');
		$this->db->where('tbl_separate_student_self_assesments.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_separate_student_self_assesments.separate_student_id	');
		$this->db->order_by('tbl_separate_student_self_assesments.id', 'DESC');
		$result = $this->db->get('tbl_separate_student_self_assesments');
		return $result->result();
	}
	public function get_my_teacher_assesment_separate()
	{
		$this->db->select('tbl_teacher_assesments_separate_student.*,tbl_student.student_name');
		$this->db->where('tbl_teacher_assesments_separate_student.is_deleted', '0');
		$this->db->where('tbl_teacher_assesments_separate_student.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_teacher_assesments_separate_student.seperate_student_id	');
		$this->db->order_by('tbl_teacher_assesments_separate_student.id', 'DESC');
		$result = $this->db->get('tbl_teacher_assesments_separate_student');
		return $result->result();
	}
	// rejected
	public function get_rejected_my_teacher_assesment()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_teacher_assesments.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_center.center_name');
		$this->db->where('tbl_teacher_assesments.is_deleted', '0');
		$this->db->where('tbl_teacher_assesments.assessment_status', '2');
		// if($_GET['start_date'] !=""){
		// 	$this->db->where('DATE(tbl_teacher_assesments.created_on) >=',date("Y-m-d",strtotime($_GET['start_date'])));  
		// 	$this->db->where('DATE(tbl_teacher_assesments.created_on) <=',date("Y-m-d",strtotime($_GET['end_date'])));  
		// }
		$this->db->join('tbl_student', 'tbl_student.id = tbl_teacher_assesments.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_teacher_assesments.updated_by', 'left');
		$this->db->order_by('tbl_teacher_assesments.updated_on', 'DESC');
		$result = $this->db->get('tbl_teacher_assesments');
		return $result->result();
	}
	public function get_rejected_my_self_assesment()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_self_assesments.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_center.center_name');
		$this->db->where('tbl_self_assesments.is_deleted', '0');
		$this->db->where('tbl_self_assesments.assessment_status', '2');
		// if($_GET['start_date'] !=""){
		// 	$this->db->where('DATE(tbl_self_assesments.created_on) >=',date("Y-m-d",strtotime($_GET['start_date'])));  
		// 	$this->db->where('DATE(tbl_self_assesments.created_on) <=',date("Y-m-d",strtotime($_GET['end_date'])));  
		// }
		$this->db->join('tbl_student', 'tbl_student.id = tbl_self_assesments.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_self_assesments.updated_by', 'left');
		$this->db->order_by('tbl_self_assesments.updated_on', 'DESC');
		$result = $this->db->get('tbl_self_assesments');
		return $result->result();
	}
	public function get_rejected_assignment()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_assignment.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_center.center_name');
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '2');
		// if($_GET['start_date'] !=""){
		// 	$this->db->where('DATE(tbl_assignment.created_on) >=',date("Y-m-d",strtotime($_GET['start_date'])));  
		// 	$this->db->where('DATE(tbl_assignment.created_on) <=',date("Y-m-d",strtotime($_GET['end_date'])));  
		// }
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_assignment.updated_by', 'left');
		$this->db->order_by('tbl_assignment.updated_on', 'DESC');
		$result = $this->db->get('tbl_assignment');
		return $result->result();
	}
	public function get_rejected_my_industry_assesment()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_industry_assesment.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_center.center_name,tbl_assignment.assignment_title');
		$this->db->where('tbl_industry_assesment.is_deleted', '0');
		$this->db->where('tbl_industry_assesment.assessment_status', '2');
		// if($_GET['start_date'] !=""){
		// 	$this->db->where('DATE(tbl_industry_assesment.created_on) >=',date("Y-m-d",strtotime($_GET['start_date'])));  
		// 	$this->db->where('DATE(tbl_industry_assesment.created_on) <=',date("Y-m-d",strtotime($_GET['end_date'])));  
		// } 
		$this->db->join('tbl_student', 'tbl_student.id = tbl_industry_assesment.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_industry_assesment.updated_by', 'left');
		$this->db->join('tbl_assignment', 'tbl_assignment.student_id = tbl_industry_assesment.student_id', 'left');
		$this->db->order_by('tbl_industry_assesment.updated_on', 'DESC');
		$result = $this->db->get('tbl_industry_assesment');
		return $result->result();
	}
	public function get_rejected_my_guardian_assesment()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_guardian_assesment.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_center.center_name,tbl_assignment.assignment_title');
		$this->db->where('tbl_guardian_assesment.is_deleted', '0');
		$this->db->where('tbl_guardian_assesment.assessment_status', '2');
		// if($_GET['start_date'] !=""){
		// 	$this->db->where('DATE(tbl_guardian_assesment.created_on) >=',date("Y-m-d",strtotime($_GET['start_date'])));  
		// 	$this->db->where('DATE(tbl_guardian_assesment.created_on) <=',date("Y-m-d",strtotime($_GET['end_date'])));  
		// } 
		$this->db->join('tbl_student', 'tbl_student.id = tbl_guardian_assesment.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_guardian_assesment.updated_by', 'left');
		$this->db->join('tbl_assignment', 'tbl_assignment.student_id = tbl_guardian_assesment.student_id', 'left');
		$this->db->order_by('tbl_guardian_assesment.updated_on', 'DESC');
		$result = $this->db->get('tbl_guardian_assesment');
		return $result->result();
	}
	// approved
	public function get_course_stream()
	{
		$this->db->select('tbl_stream.stream_name,tbl_stream.id');
		$this->db->where('tbl_course_stream_relation.is_deleted', '0');
		$this->db->where('tbl_course_stream_relation.status', '1');
		$this->db->where('tbl_course_stream_relation.course', $this->input->get('course'));
		$this->db->order_by('tbl_stream.stream_name', 'ASC');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_course_stream_relation.stream');
		$this->db->join('tbl_fees_realtion', 'tbl_fees_realtion.relation_id = tbl_course_stream_relation.id');
		$this->db->group_by('tbl_course_stream_relation.id');
		$result = $this->db->get('tbl_course_stream_relation');
		echo json_encode($result->result());
		// $result = $result->result();
		// echo "<pre>";print_r($result);exit;
	}
	public function get_approved_my_teacher_assesment()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_teacher_assesments.*,tbl_student.student_name,tbl_center.center_name');
		$this->db->where('tbl_teacher_assesments.is_deleted', '0');
		$this->db->where('tbl_teacher_assesments.assessment_status', '1');
		// if($_GET['start_date'] !=""){
		// 	$this->db->where('DATE(tbl_teacher_assesments.created_on) >=',date("Y-m-d",strtotime($_GET['start_date'])));  
		// 	$this->db->where('DATE(tbl_teacher_assesments.created_on) <=',date("Y-m-d",strtotime($_GET['end_date'])));  
		// }
		$this->db->join('tbl_student', 'tbl_student.id = tbl_teacher_assesments.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_teacher_assesments.updated_by', 'left');
		$this->db->order_by('tbl_teacher_assesments.updated_on', 'DESC');
		$result = $this->db->get('tbl_teacher_assesments');
		return $result->result();
	}
	public function get_approved_my_self_assesment()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_self_assesments.*,tbl_student.student_name,tbl_center.center_name');
		$this->db->where('tbl_self_assesments.is_deleted', '0');
		$this->db->where('tbl_self_assesments.assessment_status', '1');
		// if($_GET['start_date'] !=""){
		// 	$this->db->where('DATE(tbl_self_assesments.created_on) >=',date("Y-m-d",strtotime($_GET['start_date'])));  
		// 	$this->db->where('DATE(tbl_self_assesments.created_on) <=',date("Y-m-d",strtotime($_GET['end_date'])));  
		// }
		$this->db->join('tbl_student', 'tbl_student.id = tbl_self_assesments.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_self_assesments.updated_by', 'left');
		$this->db->order_by('tbl_self_assesments.updated_on', 'DESC');
		$result = $this->db->get('tbl_self_assesments');
		return $result->result();
	}
	public function get_approved_assignment()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_assignment.*,tbl_student.student_name,tbl_center.center_name');
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '1');
		// if($_GET['start_date'] !=""){
		// 	$this->db->where('DATE(tbl_assignment.created_on) >=',date("Y-m-d",strtotime($_GET['start_date'])));  
		// 	$this->db->where('DATE(tbl_assignment.created_on) <=',date("Y-m-d",strtotime($_GET['end_date'])));  
		// }
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_assignment.updated_by', 'left');
		$this->db->order_by('tbl_assignment.updated_on', 'DESC');
		$result = $this->db->get('tbl_assignment');
		return $result->result();
	}
	public function get_approved_my_industry_assesment()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_industry_assesment.*,tbl_student.student_name,tbl_center.center_name,tbl_assignment.assignment_title');
		$this->db->where('tbl_industry_assesment.is_deleted', '0');
		$this->db->where('tbl_industry_assesment.assessment_status', '1');
		// if($_GET['start_date'] !=""){
		// 	$this->db->where('DATE(tbl_industry_assesment.created_on) >=',date("Y-m-d",strtotime($_GET['start_date'])));  
		// 	$this->db->where('DATE(tbl_industry_assesment.created_on) <=',date("Y-m-d",strtotime($_GET['end_date'])));  
		// } 
		$this->db->join('tbl_student', 'tbl_student.id = tbl_industry_assesment.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_industry_assesment.updated_by', 'left');
		$this->db->join('tbl_assignment', 'tbl_assignment.id = tbl_industry_assesment.student_id');
		$this->db->order_by('tbl_industry_assesment.updated_on', 'DESC');
		$result = $this->db->get('tbl_industry_assesment');
		return $result->result();
	}
	public function get_approved_my_guardian_assesment()
	{
		$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_guardian_assesment.*,tbl_student.student_name,tbl_center.center_name,tbl_assignment.assignment_title');
		$this->db->where('tbl_guardian_assesment.is_deleted', '0');
		$this->db->where('tbl_guardian_assesment.assessment_status', '1');
		// if($_GET['start_date'] !=""){
		// 	$this->db->where('DATE(tbl_guardian_assesment.created_on) >=',date("Y-m-d",strtotime($_GET['start_date'])));  
		// 	$this->db->where('DATE(tbl_guardian_assesment.created_on) <=',date("Y-m-d",strtotime($_GET['end_date'])));  
		// } 
		$this->db->join('tbl_student', 'tbl_student.id = tbl_guardian_assesment.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_guardian_assesment.updated_by', 'left');
		$this->db->join('tbl_assignment', 'tbl_assignment.id = tbl_guardian_assesment.student_id', 'left');
		$this->db->order_by('tbl_guardian_assesment.updated_on', 'DESC');
		$result = $this->db->get('tbl_guardian_assesment');
		return $result->result();
	}
	public function get_assignment_separate()
	{
		$this->db->select('tbl_assignment_separate_student.*,tbl_student.student_name');
		$this->db->where('tbl_assignment_separate_student.is_deleted', '0');
		$this->db->where('tbl_assignment_separate_student.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment_separate_student.seperate_student_id	');
		$this->db->order_by('tbl_assignment_separate_student.id', 'DESC');
		$result = $this->db->get('tbl_assignment_separate_student');
		return $result->result();
	}
	public function get_all_pr_list($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('name', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('course', $search);
			$this->db->or_like('pay_for', $search);
			$this->db->or_like('date_of_payment', $search);
			$this->db->or_like('amount', $search);
			$this->db->or_like('payment_mode', $search);
			$this->db->or_like('transaction_id', $search);
			$this->db->or_like('collected_by', $search);
			$this->db->or_like('registration_id', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_generate_payment_receipt');
		return $result->result();
	}
	public function get_all_pr_list_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('name', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('course', $search);
			$this->db->or_like('pay_for', $search);
			$this->db->or_like('date_of_payment', $search);
			$this->db->or_like('amount', $search);
			$this->db->or_like('payment_mode', $search);
			$this->db->or_like('transaction_id', $search);
			$this->db->or_like('collected_by', $search);
			$this->db->or_like('registration_id', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_generate_payment_receipt');
		return $result->num_rows();
	}
	public function get_dashboard_log()
	{
		$this->db->select('tbl_log.*,tbl_employees.employee_code,tbl_employees.employee_code,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_log.user_id');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(10);
		$result = $this->db->get('tbl_log');
		return $result->result();
	}
	public function get_all_log()
	{
		$this->db->select('tbl_log.*,tbl_employees.employee_code,tbl_employees.employee_code,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_log.user_id');
		$this->db->where('tbl_log.is_deleted', '0');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(10);
		$result = $this->db->get('tbl_log');
		return $result->result();
	}
	public function get_all_logs($length, $start, $search)
	{
		$this->db->select('tbl_log.*,tbl_employees.employee_code,tbl_employees.employee_code,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->where('tbl_log.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_employees.first_name', $search);
			$this->db->or_like('tbl_employees.last_name', $search);
			$this->db->or_like('tbl_employees.employee_code', $search);
			$this->db->or_like('tbl_log.description', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_log.user_id');
		$this->db->order_by('tbl_log.id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_log');
		return $result->result();
	}
	public function get_all_logs_count($search)
	{
		$this->db->select('tbl_log.*,tbl_employees.employee_code,tbl_employees.employee_code,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->where('tbl_log.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_employees.first_name', $search);
			$this->db->or_like('tbl_employees.last_name', $search);
			$this->db->or_like('tbl_employees.employee_code', $search);
			$this->db->or_like('tbl_log.description', $search);
			$this->db->group_end();
		}
		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_log.user_id');
		$this->db->order_by('tbl_log.id', 'DESC');
		$result = $this->db->get('tbl_log');
		return $result->num_rows();
	}
	public function get_active_session()
	{
		$this->db->where('is_deleted', '0');
		//$this->db->where('status','1');
		$this->db->order_by('session_name', 'ASC');
		$result = $this->db->get('tbl_session');
		return $result->result();
	}
	public function get_selected_course_mode($course_id, $stream_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('course', $course_id);
		$this->db->where('stream', $stream_id);
		$result = $this->db->get('tbl_course_stream_relation');
		$result = $result->row();
		return $result;
	}
	public function get_selected_year_sem($course_id, $stream_id, $course_mode)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('course', $course_id);
		$this->db->where('stream', $stream_id);
		$result = $this->db->get('tbl_course_stream_relation');
		$result = $result->row();
		return $result;
	}
	public function insert_enquiry_lead()
	{
		$data = array(
			'name' 			=> $this->input->post('name'),
			'email' 		=> $this->input->post('email'),
			'mobile_number' => $this->input->post('mobile_number'),
			'course_name' 	=> $this->input->post('course_name'),
			'description' 	=> $this->input->post('description'),
			'date' 			=> date("Y-m-d", strtotime($this->input->post('date'))),
		);
		if ($this->input->post('id') == "") {
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data, $date);
			$this->db->insert('tbl_enquiry_lead', $new_arr);
			return 0;
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_enquiry_lead', $data);
			return 1;
		}
	}
	public function get_all_lead_ajx_count($search)
	{
		$this->db->where('tbl_enquiry_lead.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_enquiry_lead.name', $search);
			$this->db->or_like('tbl_enquiry_lead.email', $search);
			$this->db->or_like('tbl_enquiry_lead.mobile_number', $search);
			$this->db->or_like('tbl_enquiry_lead.course_name', $search);
			$this->db->or_like('tbl_enquiry_lead.description', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_enquiry_lead');
		return $result->num_rows();
	}
	public function get_all_lead_ajx($length, $start, $search)
	{
		$this->db->where('tbl_enquiry_lead.is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_enquiry_lead.name', $search);
			$this->db->or_like('tbl_enquiry_lead.email', $search);
			$this->db->or_like('tbl_enquiry_lead.mobile_number', $search);
			$this->db->or_like('tbl_enquiry_lead.course_name', $search);
			$this->db->or_like('tbl_enquiry_lead.description', $search);
			$this->db->group_end();
		}
		//$this->db->order_by('tbl_enquiry_lead.id','ASC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_enquiry_lead');
		return $result->result();
	}
	public function get_single_lead()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_enquiry_lead');
		return $result->row();
	}
	public function get_paper_session($session_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $session_id);
		//$this->db->where('status','1');
		$result = $this->db->get('tbl_session');
		$result = $result->row();
		$session = '';
		if (!empty($result)) {
			$session = $result->session_name;
		}
		return $session;
	}
	public function get_stream($session_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $session_id);
		//$this->db->where('status','1');
		$result = $this->db->get('tbl_stream');
		$result = $result->row();
		$session = '';
		if (!empty($result)) {
			$session = $result->stream_name;
		}
		return $session;
	}
	public function get_course($session_id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $session_id);
		//$this->db->where('status','1');
		$result = $this->db->get('tbl_course');
		$result = $result->row();
		$session = '';
		if (!empty($result)) {
			$session = $result->print_name;
		}
		return $session;
	}
	public function get_all_paper_ajax_course_wise_count($search, $uri)
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.stream_id', $uri);
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
		$this->db->where('tbl_papers.stream_id', $uri);
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
	public function get_single_stream_name()
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.stream_id', $this->uri->segment(2));
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id ');
		$result = $this->db->get('tbl_papers');
		return $result->row();
	}
	public function get_single_paper_stream_wise()
	{
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted', '0');
		$this->db->where('tbl_papers.id', $this->uri->segment(3));
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_papers.course_id ');
		$this->db->join('tbl_subject', 'tbl_subject.id = tbl_papers.subject_id ');
		$result = $this->db->get('tbl_papers');
		return $result->row();
	}
	public function get_refunded_student($id)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('student_id', $id);
		$refund = $this->db->get('tbl_student_refund');
		return $refund->num_rows();
	}
	public function get_Separate_student_data_by_enrollment_no()
	{
		$this->db->select(" tbl_separate_student.*,tbl_course.course_name,tbl_stream.stream_name");
		$this->db->where("tbl_separate_student.is_deleted", "0");
		$this->db->where("tbl_separate_student.course_id", "23");
		$this->db->where("tbl_separate_student.enrollment_number", $this->input->post("enrollment_number"));
		//$this->db->join("states","states.name = tbl_separate_student.state");
		$this->db->join("tbl_course", "tbl_course.id= tbl_separate_student.course_id");
		$this->db->join("tbl_stream", "tbl_stream.id= tbl_separate_student.stream_id");
		$result = $this->db->get("tbl_separate_student");
		if (!empty($result->row())) {
			return $result->row();
		} else {
			$this->session->set_flashdata("message", "Please enter the valid enrollment number");
			redirect("add_phd_course_work_application");
		}
	}
	public function set_phd_course_work_form_data_separate_student()
	{
		$data = array(
			"registration_id"		=> $this->input->post("student_no"),
			"student_name"			=> $this->input->post("student_name"),
			"father_name"			=> $this->input->post("father_name"),
			"mother_name"			=> $this->input->post("mother_name"),
			"date_of_birth"			=> date("Y-m-d", strtotime($this->input->post("date_of_birth"))),
			"mobile"				=> $this->input->post("mobile"),
			"email"					=> $this->input->post("email"),
			"gender"				=> $this->input->post("gender"),
			"address"				=> $this->input->post("address"),
			"state_id"				=> $this->input->post("state_id"),
			"payment_status"		=> $this->input->post("payment_status"),
			"enrollment_number"		=> $this->input->post("enrollment_no"),
			"schedule"				=> $this->input->post("schedule"),
			"course_id"				=> $this->input->post("course_id"),
			"stream_id"				=> $this->input->post("stream_id"),
			"year_sem"				=> $this->input->post("year_sem"),
			"date_of_registration"	=> $this->input->post("date_of_registration"),
			"payment_ammount"		=> $this->input->post("payment_ammount"),
			'transaction_id'        => $this->input->post("transaction_id"),
			'course_work_type'      => $this->input->post("course_work_type"),
			"created_on"			=> date("Y-m-d H:i:s"),
		);
		$this->db->insert("tbl_separate_student_phd_course_work", $data);
		$rel_id = $this->db->insert_id();
		$bank_name = $this->input->post("bank_name");
		$payment_mode = $this->input->post("payment_mode");
		$transaction_no = $this->input->post("transaction_no");
		$deposit_date = $this->input->post("deposit_date");
		$ammount = $this->input->post("ammount");
		for ($i = 0; $i < count($bank_name); $i++) {
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
			$this->db->insert("tbl_separate_student_phd_course_work_bank_details", $bank_data);
		}
		$this->session->set_flashdata("success", "Course Work Added Successfully");
		if ($this->input->post("payment_status") == '1') {
			redirect("phd_course_work_application_success_list");
		} else {
			redirect("phd_course_work_application_failed_list");
		}
	}
	public function  get_unique_enrollment()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('enrollment_number', ($this->input->post('enrollment_number')));
		$result = $this->db->get('tbl_separate_student_phd_course_work');
		echo  $result = $result->num_rows();
	}
	public function send_send_blue($to, $subject, $message)
	{
		$data = array(
			"sender" => array(
				"email" => 'noreply@tgu.ac.in',
				"name" => 'THE GLOBAL UNIVERSITY'
			),
			"to" => array(
				$to
			),
			"subject" => $subject,
			"htmlContent" => $message
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Api-Key: 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';
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
		//echo "<pre>";print_r($result);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		//print_r($ch);
		//exit;
		return true;
	}
	public function send_in_blue_cc($to, $subject, $message, $cc)
	{
		$data = array(
			"sender" => array(
				"email" => 'noreply@tgu.ac.in',
				"name" => 'THE GLOBAL UNIVERSITY'
			),
			"to" => array(
				$to
			),
			"cc" => array(
				$cc
			),
			"subject" => $subject,
			"htmlContent" => $message
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Api-Key: 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';
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		return true;
	}
	public function hold_blended_login()
	{
		$this->db->where('Date(created_on) <', date('Y-m-d', strtotime('-30 days')));
		$this->db->where('re_active', '0');
		$query = $this->db->get('tbl_separate_student');
		$query = $query->result();
		if (!empty($query)) {
			foreach ($query as $query_result) {
				$data = array(
					'hold_login' => '1'
				);
				$this->db->where('id', $query_result->id);
				$this->db->update('tbl_separate_student', $data);
			}
		}
		$this->db->where('Date(hold_date) <', date('Y-m-d', strtotime('-7 days')));
		$this->db->where('re_active', '1');
		$query = $this->db->get('tbl_separate_student');
		$query = $query->result();
		if (!empty($query)) {
			foreach ($query as $query_result) {
				$data = array(
					'hold_login' => '1'
				);
				$this->db->where('id', $query_result->id);
				$this->db->update('tbl_separate_student', $data);
			}
		}
	}
	public function get_candidate_info()
	{
		$this->db->select('tbl_student.*,tbl_guide_application.name as guide_name, tbl_synopsis.thesis_title');
		$this->db->join('tbl_guide_application', 'tbl_guide_application.id = tbl_student.guide_id');
		$this->db->join('tbl_synopsis', 'tbl_synopsis.student_id = tbl_student.id');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.id', ($this->uri->segment(2)));
		$result = $this->db->get('tbl_student');
		return  $result = $result->row();
	}
	public function reject_blen_kyc()
	{
		$data = array(
			'kyc_status' => '2',
			'reject_remark' => $this->input->post('reject_remark'),
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_blended_video_kyc', $data);
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_blended_video_kyc');
		$result = $result->row();
		$this->db->where('enrollment_number', $result->enrollment_number);
		$student = $this->db->get('tbl_separate_student');
		$student = $student->row();
		$student_id = 0;
		if (!empty($student)) {
			$student_id = $student->id;
		}
		$profile = $this->Admin_model->get_profile();
		$log_description = $profile->first_name . " " . $profile->last_name . " has rejected video kyc with remark " . $this->input->post('reject_remark') . " on " . date("d/m/Y");
		$log = array(
			'user_id' 		=> $this->session->userdata('admin_id'),
			'student_id' 	=> $student_id,
			'student_type' 	=> '1',
			'description' 	=> $log_description,
			'date' 			=> date("Y-m-d"),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->Setting_model->set_log($log);
		return true;
	}
	public function approve_blen_kyc()
	{
		$data = array(
			'kyc_status' => '1'
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_blended_video_kyc', $data);
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_blended_video_kyc');
		$result = $result->row();
		$this->db->where('enrollment_number', $result->enrollment_number);
		$student = $this->db->get('tbl_separate_student');
		$student = $student->row();
		$student_id = 0;
		if (!empty($student)) {
			$student_id = $student->id;
		}
		$profile = $this->Admin_model->get_profile();
		$log_description = $profile->first_name . " " . $profile->last_name . " has approved video kyc on " . date("d/m/Y");
		$log = array(
			'user_id' 		=> $this->session->userdata('admin_id'),
			'student_id' 	=> $student_id,
			'student_type' 	=> '1',
			'description' 	=> $log_description,
			'date' 			=> date("Y-m-d"),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->Setting_model->set_log($log);
		return true;
	}
	public function send_new_blen_kyc()
	{
		$data = array(
			'kyc_status' => '0'
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_blended_video_kyc', $data);
		return true;
	}
	public function get_new_kyc_list()
	{
		$this->db->select('tbl_student.*,tbl_video_kyc.video,tbl_video_kyc.created_on as create_date');
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_video_kyc.enrollment_number');
		$this->db->where('tbl_student.is_deleted', '0');
		$result = $this->db->get('tbl_video_kyc');
		return  $result->result();
	}
	public function get_new_blended_kyc_list()
	{
		$this->db->select('tbl_separate_student.*,tbl_blended_video_kyc.id as kyc_id,tbl_blended_video_kyc.video,tbl_blended_video_kyc.created_on as create_date');
		$this->db->join('tbl_separate_student', 'tbl_separate_student.enrollment_number = tbl_blended_video_kyc.enrollment_number');
		$this->db->where('tbl_separate_student.is_deleted', '0');
		$this->db->where('tbl_blended_video_kyc.is_deleted', '0');
		$this->db->where('tbl_blended_video_kyc.kyc_status', '0');
		$this->db->order_by('tbl_blended_video_kyc.id', 'DESC');
		$result = $this->db->get('tbl_blended_video_kyc');
		return  $result->result();
	}
	public function get_rejected_blended_kyc_list()
	{
		$this->db->select('tbl_separate_student.*,tbl_blended_video_kyc.reject_remark, tbl_blended_video_kyc.id as kyc_id,tbl_blended_video_kyc.video,tbl_blended_video_kyc.created_on as create_date');
		$this->db->join('tbl_separate_student', 'tbl_separate_student.enrollment_number = tbl_blended_video_kyc.enrollment_number');
		$this->db->where('tbl_separate_student.is_deleted', '0');
		$this->db->where('tbl_blended_video_kyc.is_deleted', '0');
		$this->db->where('tbl_blended_video_kyc.kyc_status', '2');
		$this->db->order_by('tbl_blended_video_kyc.id', 'DESC');
		$result = $this->db->get('tbl_blended_video_kyc');
		return  $result->result();
	}
	public function get_approved_blended_kyc_list()
	{
		$this->db->select('tbl_separate_student.*,tbl_blended_video_kyc.id as kyc_id,tbl_blended_video_kyc.video,tbl_blended_video_kyc.created_on as create_date');
		$this->db->join('tbl_separate_student', 'tbl_separate_student.enrollment_number = tbl_blended_video_kyc.enrollment_number');
		$this->db->where('tbl_separate_student.is_deleted', '0');
		$this->db->where('tbl_blended_video_kyc.is_deleted', '0');
		$this->db->where('tbl_blended_video_kyc.kyc_status', '1');
		$this->db->order_by('tbl_blended_video_kyc.id', 'DESC');
		$result = $this->db->get('tbl_blended_video_kyc');
		return  $result->result();
	}
	public function get_new_direcgt_kyc_list()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('kyc_status', '0');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_direct_video_kyc');
		return $result->result();
	}
	public function set_blended_kyc_link()
	{
		$data = array(
			'enrollment_number' => $this->input->post('enrollment_number'),
			'created_on' 		=> date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_blended_kyc_link', $data);
		$this->db->where('enrollment_number', $this->input->post('enrollment_number'));
		$student = $this->db->get('tbl_separate_student');
		$student = $student->row();
		$student_id = 0;
		if (!empty($student)) {
			$student_id = $student->id;
		}
		$profile = $this->Admin_model->get_profile();
		$log_description = $profile->first_name . " " . $profile->last_name . " has created new mail link  with https://personalkyc.com/start_kyc/" . base64_encode($this->input->post('enrollment_number')) . " on " . date("d/m/Y");
		$log = array(
			'user_id' 		=> $this->session->userdata('admin_id'),
			'student_id' 	=> $student_id,
			'student_type' 	=> '1',
			'description' 	=> $log_description,
			'date' 			=> date("Y-m-d"),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->Setting_model->set_log($log);
		return true;
	}
	public function get_blended_kyc_link()
	{
		$this->db->where('is_deleted', '0');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_blended_kyc_link');
		return $result->result();
	}
	public function set_regular_kyc_link()
	{
		$data = array(
			'enrollment_number' => $this->input->post('enrollment_number'),
			'created_on' 		=> date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_regular_kyc_link', $data);
		$this->db->where('enrollment_number', $this->input->post('enrollment_number'));
		$student = $this->db->get('tbl_student');
		$student = $student->row();
		$student_id = 0;
		if (!empty($student)) {
			$student_id = $student->id;
		}
		$profile = $this->Admin_model->get_profile();
		$log_description = $profile->first_name . " " . $profile->last_name . " has created new mail link  with https://personalkyc.com/start_my_kyc/" . base64_encode($this->input->post('enrollment_number')) . " on " . date("d/m/Y");
		$log = array(
			'user_id' 		=> $this->session->userdata('admin_id'),
			'student_id' 	=> $student_id,
			'student_type' 	=> '0',
			'description' 	=> $log_description,
			'date' 			=> date("Y-m-d"),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->Setting_model->set_log($log);
		return true;
	}
	public function get_regular_kyc_link()
	{
		$this->db->where('is_deleted', '0');
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_regular_kyc_link');
		return $result->result();
	}
	public function reject_regular_kyc()
	{
		$data = array(
			'kyc_status' => '2',
			'reject_remark' => $this->input->post('reject_remark'),
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_regular_video_kyc', $data);
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_regular_video_kyc');
		$result = $result->row();
		$this->db->where('enrollment_number', $result->enrollment_number);
		$student = $this->db->get('tbl_student');
		$student = $student->row();
		$student_id = 0;
		if (!empty($student)) {
			$student_id = $student->id;
		}
		$profile = $this->Admin_model->get_profile();
		$log_description = $profile->first_name . " " . $profile->last_name . " has rejected video kyc with remark " . $this->input->post('reject_remark') . " on " . date("d/m/Y");
		$log = array(
			'user_id' 		=> $this->session->userdata('admin_id'),
			'student_id' 	=> $student_id,
			'student_type' 	=> '0',
			'description' 	=> $log_description,
			'date' 			=> date("Y-m-d"),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->Setting_model->set_log($log);
		return true;
	}
	public function approve_regular_kyc()
	{
		$data = array(
			'kyc_status' => '1'
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_regular_video_kyc', $data);
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_regular_video_kyc');
		$result = $result->row();
		$this->db->where('enrollment_number', $result->enrollment_number);
		$student = $this->db->get('tbl_student');
		$student = $student->row();
		$student_id = 0;
		if (!empty($student)) {
			$student_id = $student->id;
		}
		$profile = $this->Admin_model->get_profile();
		$log_description = $profile->first_name . " " . $profile->last_name . " has approved video kyc on " . date("d/m/Y");
		$log = array(
			'user_id' 		=> $this->session->userdata('admin_id'),
			'student_id' 	=> $student_id,
			'student_type' 	=> '0',
			'description' 	=> $log_description,
			'date' 			=> date("Y-m-d"),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->Setting_model->set_log($log);
		return true;
	}
	public function send_new_regular_kyc()
	{
		$data = array(
			'kyc_status' => '0'
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_regular_video_kyc', $data);
		return true;
	}
	public function get_new_reguar_kyc_list()
	{
		$this->db->select('tbl_student.*,tbl_regular_video_kyc.id as kyc_id,tbl_regular_video_kyc.video,tbl_regular_video_kyc.created_on as create_date');
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_regular_video_kyc.enrollment_number');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_regular_video_kyc.is_deleted', '0');
		$this->db->where('tbl_regular_video_kyc.kyc_status', '0');
		$this->db->order_by('tbl_regular_video_kyc.id', 'DESC');
		$this->db->group_by('tbl_regular_video_kyc.id');
		$result = $this->db->get('tbl_regular_video_kyc');
		return  $result->result();
	}
	public function get_approved_regular_kyc_list()
	{
		$this->db->select('tbl_student.*,tbl_regular_video_kyc.id as kyc_id,tbl_regular_video_kyc.video,tbl_regular_video_kyc.created_on as create_date');
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_regular_video_kyc.enrollment_number');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_regular_video_kyc.is_deleted', '0');
		$this->db->where('tbl_regular_video_kyc.kyc_status', '1');
		$this->db->order_by('tbl_regular_video_kyc.id', 'DESC');
		$result = $this->db->get('tbl_regular_video_kyc');
		return  $result->result();
	}
	public function get_regular_rejected_kyc_list()
	{
		$this->db->select('tbl_student.*,tbl_regular_video_kyc.reject_remark, tbl_regular_video_kyc.id as kyc_id,tbl_regular_video_kyc.video,tbl_regular_video_kyc.created_on as create_date');
		$this->db->join('tbl_student', 'tbl_student.enrollment_number = tbl_regular_video_kyc.enrollment_number');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_regular_video_kyc.is_deleted', '0');
		$this->db->where('tbl_regular_video_kyc.kyc_status', '2');
		$this->db->order_by('tbl_regular_video_kyc.id', 'DESC');
		$result = $this->db->get('tbl_regular_video_kyc');
		return  $result->result();
	}
	public function rejected_direct_kyc_list()
	{
		// $this->db->select('tbl_student.*,tbl_direct_video_kyc.id as kyc_id,tbl_direct_video_kyc.video,tbl_direct_video_kyc.created_on as create_date');
		// $this->db->join('tbl_student','tbl_student.enrollment_number = tbl_direct_video_kyc.enrollment_number'); 
		// $this->db->where('tbl_student.is_deleted','0'); 
		$this->db->where('tbl_direct_video_kyc.is_deleted', '0');
		$this->db->where('tbl_direct_video_kyc.kyc_status', '2');
		$this->db->order_by('tbl_direct_video_kyc.id', 'DESC');
		$result = $this->db->get('tbl_direct_video_kyc');
		return  $result->result();
	}
	public function approve_direct_kyc_list()
	{
		// $this->db->select('tbl_student.*,tbl_direct_video_kyc.id as kyc_id,tbl_direct_video_kyc.video,tbl_direct_video_kyc.created_on as create_date');
		// $this->db->join('tbl_student','tbl_student.enrollment_number = tbl_direct_video_kyc.enrollment_number'); 
		// $this->db->where('tbl_student.is_deleted','0'); 
		$this->db->where('tbl_direct_video_kyc.is_deleted', '0');
		$this->db->where('tbl_direct_video_kyc.kyc_status', '1');
		$this->db->order_by('tbl_direct_video_kyc.id', 'DESC');
		$result = $this->db->get('tbl_direct_video_kyc');
		return  $result->result();
	}
	public function delete_cbd_files()
	{
		$valueToRemove = base64_decode($_GET['name']);
		$this->db->where('id', $_GET['id']);
		$result = $this->db->get('tbl_caste_discrimination');
		$result = $result->row();
		if (!empty($result)) {
			$files = $result->file;
			$exp = explode(",", $files);
			$new_arr = array_diff($exp, [$valueToRemove]);
			// print_r($new_arr);
			$data = array(
				'file' => implode(",", $new_arr)
			);
			$this->db->where('id', $_GET['id']);
			$this->db->update('tbl_caste_discrimination', $data);
		}
	}
	public function delete_cbd_rtis()
	{
		$valueToRemove = base64_decode($_GET['name']);
		$this->db->where('id', $_GET['id']);
		$result = $this->db->get('tbl_caste_discrimination');
		$result = $result->row();
		if (!empty($result)) {
			$files = $result->rti_reply;
			$exp = explode(",", $files);
			$new_arr = array_diff($exp, [$valueToRemove]);
			// print_r($new_arr);
			$data = array(
				'rti_reply' => implode(",", $new_arr)
			);
			$this->db->where('id', $_GET['id']);
			$this->db->update('tbl_caste_discrimination', $data);
		}
	}
	public function get_reject_popup()
	{
?>
		<form class="forms-sample" name="session_form" id="session_form" method="post" enctype="multipart/form-data" action="<?= base_url(); ?>reject_direct_kyc/<?= $this->input->post('id') ?>">
			<div class="form-group">
				<label for="exampleInputUsername1">Rejection Remark*</label>
				<textarea required type="text" class="form-control" id="reject_remark" name="reject_remark"></textarea>
				<div class="error" id="session_error"></div>
			</div>
			<button type="submit" id="save_btn" class="btn btn-danger mr-2">Submit</button>
		</form>
		<script>
			$('#session_form').validate({
				rules: {
					reject_remark: {
						required: true,
					},
				},
				messages: {
					reject_remark: {
						required: "Please enter rejection remark",
					},
				},
				errorElement: 'span',
				errorPlacement: function(error, element) {
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function(element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				}
			});
		</script>
	<?php
	}
	public function reject_direct_kyc()
	{
		$data = array(
			'kyc_status' => '2',
			'reject_remark' => $this->input->post('reject_remark'),
		);
		// print_r($data);exit();
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_direct_video_kyc', $data);
		return true;
	}
	public function approve_direct_kyc()
	{
		$data = array(
			'kyc_status' => '1'
		);
		// print_r($data);exit();
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_direct_video_kyc', $data);
		return true;
	}
	public function get_reject_popup_blended()
	{
	?>
		<form class="forms-sample" name="session_form" id="session_form" method="post" enctype="multipart/form-data" action="<?= base_url(); ?>reject_blen_kyc/<?= $this->input->post('id') ?>">
			<div class="form-group">
				<label for="exampleInputUsername1">Rejection Remark*</label>
				<textarea required type="text" class="form-control" id="reject_remark" name="reject_remark"></textarea>
				<div class="error" id="session_error"></div>
			</div>
			<button type="submit" id="save_btn" class="btn btn-danger mr-2">Submit</button>
		</form>
		<script>
			$('#session_form').validate({
				rules: {
					reject_remark: {
						required: true,
					},
				},
				messages: {
					reject_remark: {
						required: "Please enter rejection remark",
					},
				},
				errorElement: 'span',
				errorPlacement: function(error, element) {
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function(element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				}
			});
		</script>
	<?php
	}
	public function get_reject_popup_regular()
	{
	?>
		<form class="forms-sample" name="session_form" id="session_form" method="post" enctype="multipart/form-data" action="<?= base_url(); ?>reject_regular_kyc/<?= $this->input->post('id') ?>">
			<div class="form-group">
				<label for="exampleInputUsername1">Rejection Remark*</label>
				<textarea required type="text" class="form-control" id="reject_remark" name="reject_remark"></textarea>
				<div class="error" id="session_error"></div>
			</div>
			<button type="submit" id="save_btn" class="btn btn-danger mr-2">Submit</button>
		</form>
		<script>
			$('#session_form').validate({
				rules: {
					reject_remark: {
						required: true,
					},
				},
				messages: {
					reject_remark: {
						required: "Please enter rejection remark",
					},
				},
				errorElement: 'span',
				errorPlacement: function(error, element) {
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function(element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				}
			});
		</script>
<?php
	}
	public function hide_alumni()
	{
		$data = array(
			'is_alumni' => '1'
		);
		$this->db->where('id', '1');
		$this->db->update('tbl_university_details', $data);
		return true;
	}
	public function show_alumni()
	{
		$data = array(
			'is_alumni' => '0'
		);
		$this->db->where('id', '1');
		$this->db->update('tbl_university_details', $data);
		return true;
	}
	public function get_student_division_for_degree($id)
	{
		$this->db->select("examination_year,internal_max_marks,internal_marks_obtained,external_max_marks,external_marks_obtained,created_on");
		$this->db->where("is_deleted", "0");
		$this->db->where("status", "1");
		$this->db->where("result", "0");
		$this->db->where("student_id", $id);
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
	public function get_unique_course_relation()
	{
		$this->db->where('course_id', $this->input->post('course'));
		$this->db->where('stream_id', $this->input->post('stream'));
		$this->db->where('subject_id', $this->input->post('subject'));
		$this->db->where('course_mode', $this->input->post('course_mode'));
		if ($this->input->post('id') != "0") {
			$this->db->where('id !=', $this->input->post('id'));
		}
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_papers');
		echo $result->num_rows();
	}
	public function get_unique_course_stream_year_relation()
	{
		$this->db->where('course', $this->input->post('course'));
		$this->db->where('stream', $this->input->post('stream'));
		$this->db->where('mode', $this->input->post('course_mode'));
		$this->db->where('year_sem', $this->input->post('year_sem'));
		if ($this->input->post('id') != "0") {
			$this->db->where('id !=', $this->input->post('id'));
		}
		$this->db->where('is_deleted', '0');
		$result = $this->db->get('tbl_subject');
		echo $result->num_rows();
	}
	public function get_candidate_info_api($id)
	{
		// echo "<pre>";print_r($id);exit;
		$this->db->select('tbl_signature.signature,tbl_signature.dispalay_signature,tbl_student.*,tbl_guide_application.name as guide_name,tbl_synopsis.thesis_title,tbl_synopsis.issue_date');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_student.id', $id);
		$this->db->join('tbl_guide_application', 'tbl_guide_application.id = tbl_student.guide_id');
		$this->db->join('tbl_synopsis', 'tbl_synopsis.student_id = tbl_student.id');
		$this->db->join("tbl_signature", "tbl_signature.id = tbl_synopsis.signature_id", "left");
		$result = $this->db->get('tbl_student');
		return  $result = $result->row();
		// echo "<pre>";print_r($result);exit;
	}
	public function get_candidate_info_api_print($id)
	{
		$this->db->select('tbl_student.*,tbl_guide_application.name as guide_name,tbl_synopsis.thesis_title,tbl_synopsis.issue_date');
		$this->db->join('tbl_guide_application', 'tbl_guide_application.id = tbl_student.guide_id', 'left');
		$this->db->join('tbl_synopsis', 'tbl_synopsis.student_id = tbl_student.id');
		$this->db->where('tbl_student.is_deleted', '0');
		$this->db->where('tbl_synopsis.id', $id);
		$result = $this->db->get('tbl_student');
		return  $result = $result->row();
	}
	public function get_my_self_assesments($id)
	{
		if (isset($_GET['assessment_name'])) {
			// echo "<pre>";print_r($_GET['assessment_name']);exit;
			if ($_GET['assessment_name'] == 0) {
				$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_self_assesments.*,tbl_student.student_name,tbl_student.email,tbl_center.center_name');
				$this->db->where('tbl_self_assesments.is_deleted', '0');
				$this->db->where('tbl_self_assesments.status', '1');
				$this->db->where('tbl_self_assesments.assessment_status', '0');
				$this->db->where('tbl_self_assesments.student_id', $id);
				$this->db->join('tbl_student', 'tbl_student.id = tbl_self_assesments.student_id');
				$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
				$this->db->join('tbl_employees', 'tbl_employees.id = tbl_self_assesments.updated_by', 'left');
				$this->db->order_by('tbl_self_assesments.year_sem', 'DESC');
				$result = $this->db->get('tbl_self_assesments');
				return $result->result();
			} else if ($_GET['assessment_name'] == 1) {
				$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_teacher_assesments.*,tbl_student.student_name,tbl_student.email,tbl_center.center_name');
				$this->db->where('tbl_teacher_assesments.is_deleted', '0');
				$this->db->where('tbl_teacher_assesments.status', '1');
				$this->db->where('tbl_teacher_assesments.assessment_status', '0');
				$this->db->where('tbl_teacher_assesments.student_id', $id);
				$this->db->join('tbl_student', 'tbl_student.id = tbl_teacher_assesments.student_id');
				$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
				$this->db->join('tbl_employees', 'tbl_employees.id = tbl_teacher_assesments.updated_by', 'left');
				$this->db->order_by('tbl_teacher_assesments.year_sem', 'DESC');
				$result = $this->db->get('tbl_teacher_assesments');
				return $result->result();
			} else if ($_GET['assessment_name'] == 2) {
				$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_assignment.*,tbl_student.student_name,tbl_student.email,tbl_center.center_name');
				$this->db->where('tbl_assignment.is_deleted', '0');
				$this->db->where('tbl_assignment.status', '1');
				$this->db->where('tbl_assignment.assessment_status', '0');
				$this->db->where('tbl_assignment.student_id', $id);
				$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
				$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
				$this->db->join('tbl_employees', 'tbl_employees.id = tbl_assignment.updated_by', 'left');
				$this->db->order_by('tbl_assignment.year_sem', 'DESC');
				$result = $this->db->get('tbl_assignment');
				return $result->result();
			} else if ($_GET['assessment_name'] == 3) {
				$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_industry_assesment.*,tbl_student.student_name,tbl_student.email,tbl_center.center_name');
				$this->db->where('tbl_industry_assesment.is_deleted', '0');
				$this->db->where('tbl_industry_assesment.status', '1');
				$this->db->where('tbl_industry_assesment.assessment_status', '0');
				$this->db->where('tbl_industry_assesment.student_id', $id);
				$this->db->join('tbl_student', 'tbl_student.id = tbl_industry_assesment.student_id');
				$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
				$this->db->join('tbl_employees', 'tbl_employees.id = tbl_industry_assesment.updated_by', 'left');
				$this->db->order_by('tbl_industry_assesment.year_sem', 'DESC');
				$result = $this->db->get('tbl_industry_assesment');
				return $result->result();
			} else if ($_GET['assessment_name'] == 4) {
				// echo "<pre>";print_r($id);exit;
				$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_guardian_assesment.*,tbl_student.student_name,tbl_center.center_name,tbl_assignment.assignment_title,tbl_course.course_name,tbl_stream.stream_name');
				$this->db->where('tbl_guardian_assesment.is_deleted', '0');
				$this->db->where('tbl_guardian_assesment.assessment_status', '0');
				$this->db->where('tbl_guardian_assesment.student_id', $id);
				$this->db->join('tbl_student', 'tbl_student.id = tbl_guardian_assesment.student_id', 'left');
				$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
				$this->db->join('tbl_employees', 'tbl_employees.id = tbl_guardian_assesment.updated_by', 'left');
				$this->db->join('tbl_assignment', 'tbl_assignment.id = tbl_guardian_assesment.student_id', 'left');
				$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
				$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
				$this->db->order_by('tbl_guardian_assesment.updated_on', 'DESC');
				$result = $this->db->get('tbl_guardian_assesment');
				return $result->result();
			} else {
				return array();
			}
		} else {
			return array();
		}
	}
	// public function get_my_self_assesments($id)
	// {
	// 	if (isset($_GET['assessment_name']) != "" && $_GET['assessment_name'] == "0") {
	// 		$this->db->select('tbl_employees.first_name, tbl_employees.last_name, tbl_self_assesments.*, tbl_student.student_name, tbl_student.email, tbl_center.center_name');
	// 		$this->db->from('tbl_self_assesments');
	// 		$this->db->where('tbl_self_assesments.is_deleted', '0');
	// 		$this->db->where('tbl_self_assesments.status', '1');
	// 		$this->db->where('tbl_self_assesments.assessment_status', '0');
	// 		$this->db->where('tbl_self_assesments.student_id', $id);
	// 		if (isset($_GET['assessment_name']) && $_GET['assessment_name'] != "") {
	// 			$this->db->like('tbl_student.assessment_name', $_GET['assessment_name']);
	// 		}
	// 		$this->db->join('tbl_student', 'tbl_student.id = tbl_self_assesments.student_id');
	// 		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
	// 		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_self_assesments.updated_by', 'left');
	// 		$this->db->order_by('tbl_self_assesments.year_sem', 'DESC');
	// 		$result = $this->db->get('tbl_self_assesments');
	// 		return $result->result();
	// 	} elseif (isset($_GET['assessment_name']) != "" && $_GET['assessment_name'] == "1") {
	// 		$this->db->select('tbl_employees.first_name, tbl_employees.last_name, tbl_teacher_assesments.*, tbl_student.student_name, tbl_student.email, tbl_center.center_name');
	// 		$this->db->from('tbl_teacher_assesments');
	// 		$this->db->where('tbl_teacher_assesments.is_deleted', '0');
	// 		$this->db->where('tbl_teacher_assesments.status', '1');
	// 		$this->db->where('tbl_teacher_assesments.assessment_status', '0');
	// 		$this->db->where('tbl_teacher_assesments.student_id', $id);
	// 		if (isset($_GET['assessment_name']) && $_GET['assessment_name'] != "") {
	// 			$this->db->like('tbl_student.assessment_name', $_GET['assessment_name']);
	// 		}
	// 		$this->db->join('tbl_student', 'tbl_student.id = tbl_teacher_assesments.student_id');
	// 		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
	// 		$this->db->join('tbl_employees', 'tbl_employees.id = tbl_teacher_assesments.updated_by', 'left');
	// 		$this->db->order_by('tbl_teacher_assesments.year_sem', 'DESC');
	// 		$result = $this->db->get('tbl_teacher_assesments');
	// 		return $result->result();
	// 	}
	// }
	public function get_approved_my_self_assesments(){ 
		if (isset($_GET['assessment_name'])) {
			if ($_GET['assessment_name'] == 0) { 
				$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_self_assesments.*,tbl_student.student_name,tbl_center.center_name,tbl_course.print_name,tbl_stream.stream_name');
				$this->db->where('tbl_self_assesments.is_deleted', '0');
				$this->db->where('tbl_self_assesments.assessment_status', '1');
				if (isset($_GET['year_sem']) && $_GET['year_sem'] != "") {
					$this->db->where('tbl_student.year_Sem', $_GET['year_sem']);
				}
				if (isset($_GET['enrollment_number']) && $_GET['enrollment_number'] != "") {
					$this->db->where('tbl_student.enrollment_number', $_GET['enrollment_number']);
				}
				if (isset($_GET['course']) && $_GET['course'] != "") {
					$this->db->where('tbl_student.course_id', $_GET['course']);
				}
				if (isset($_GET['stream']) && $_GET['stream'] != "") {
					$this->db->where('tbl_student.stream_id', $_GET['stream']);
				}
				$this->db->join('tbl_student', 'tbl_student.id = tbl_self_assesments.student_id', 'left');
				$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
				$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
				$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
				$this->db->join('tbl_employees', 'tbl_employees.id = tbl_self_assesments.updated_by', 'left');
				$this->db->order_by('tbl_self_assesments.updated_on', 'DESC');
				$result = $this->db->get('tbl_self_assesments');
				return $result->result(); 
			} else if ($_GET['assessment_name'] == 1) {
				$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_teacher_assesments.*,tbl_student.student_name,tbl_center.center_name,tbl_course.course_name,tbl_stream.stream_name');
				$this->db->where('tbl_teacher_assesments.is_deleted', '0');
				$this->db->where('tbl_teacher_assesments.assessment_status', '1'); 
				if (isset($_GET['year_sem']) && $_GET['year_sem'] != "") {
					$this->db->where('tbl_student.year_Sem', $_GET['year_sem']);
				}
				if (isset($_GET['enrollment_number']) && $_GET['enrollment_number'] != "") {
					$this->db->where('tbl_student.enrollment_number', $_GET['enrollment_number']);
				}
				if (isset($_GET['course']) && $_GET['course'] != "") {
					$this->db->where('tbl_student.course_id', $_GET['course']);
				}
				if (isset($_GET['stream']) && $_GET['stream'] != "") {
					$this->db->where('tbl_student.stream_id', $_GET['stream']);
				}
				$this->db->join('tbl_student', 'tbl_student.id = tbl_teacher_assesments.student_id', 'left');
				$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
				$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
				$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
				$this->db->join('tbl_employees', 'tbl_employees.id = tbl_teacher_assesments.updated_by', 'left');
				$this->db->order_by('tbl_teacher_assesments.updated_on', 'DESC');
				$result = $this->db->get('tbl_teacher_assesments');
				return $result->result();
			} else if ($_GET['assessment_name'] == 2) {
				$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_assignment.*,tbl_student.student_name,tbl_center.center_name,tbl_course.course_name,tbl_stream.stream_name');
				$this->db->where('tbl_assignment.is_deleted', '0');
				$this->db->where('tbl_assignment.assessment_status', '1');
				 
				if (isset($_GET['year_sem']) && $_GET['year_sem'] != "") {
					$this->db->where('tbl_student.year_Sem', $_GET['year_sem']);
				}
				if (isset($_GET['enrollment_number']) && $_GET['enrollment_number'] != "") {
					$this->db->where('tbl_student.enrollment_number', $_GET['enrollment_number']);
				}
				if (isset($_GET['course']) && $_GET['course'] != "") {
					$this->db->where('tbl_student.course_id', $_GET['course']);
				}
				if (isset($_GET['stream']) && $_GET['stream'] != "") {
					$this->db->where('tbl_student.stream_id', $_GET['stream']);
				}
				$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id', 'left');
				$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
				$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
				$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
				$this->db->join('tbl_employees', 'tbl_employees.id = tbl_assignment.updated_by', 'left');
				$this->db->order_by('tbl_assignment.updated_on', 'DESC');
				$result = $this->db->get('tbl_assignment');
				return $result->result();
			} else if ($_GET['assessment_name'] == 3) {
				$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_industry_assesment.*,tbl_student.student_name,tbl_center.center_name,tbl_assignment.assignment_title,tbl_course.course_name,tbl_stream.stream_name');
				$this->db->where('tbl_industry_assesment.is_deleted', '0');
				$this->db->where('tbl_industry_assesment.assessment_status', '1');
				 
				if (isset($_GET['year_sem']) && $_GET['year_sem'] != "") {
					$this->db->where('tbl_student.year_Sem', $_GET['year_sem']);
				}
				if (isset($_GET['enrollment_number']) && $_GET['enrollment_number'] != "") {
					$this->db->where('tbl_student.enrollment_number', $_GET['enrollment_number']);
				}
				if (isset($_GET['course']) && $_GET['course'] != "") {
					$this->db->where('tbl_student.course_id', $_GET['course']);
				}
				if (isset($_GET['stream']) && $_GET['stream'] != "") {
					$this->db->where('tbl_student.stream_id', $_GET['stream']);
				}
				$this->db->join('tbl_student', 'tbl_student.id = tbl_industry_assesment.student_id', 'left');
				$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
				$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
				$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
				$this->db->join('tbl_employees', 'tbl_employees.id = tbl_industry_assesment.updated_by', 'left');
				$this->db->join('tbl_assignment', 'tbl_assignment.id = tbl_industry_assesment.student_id');
				$this->db->order_by('tbl_industry_assesment.updated_on', 'DESC');
				$result = $this->db->get('tbl_industry_assesment');
				return $result->result();
			} else if ($_GET['assessment_name'] == 4) {
				$this->db->select('tbl_employees.first_name,tbl_employees.last_name,tbl_guardian_assesment.*,tbl_student.student_name,tbl_center.center_name,tbl_assignment.assignment_title,tbl_course.course_name,tbl_stream.stream_name');
				$this->db->where('tbl_guardian_assesment.is_deleted', '0');
				$this->db->where('tbl_guardian_assesment.assessment_status', '1');
				 
				if (isset($_GET['year_sem']) && $_GET['year_sem'] != "") {
					$this->db->where('tbl_student.year_Sem', $_GET['year_sem']);
				}
				if (isset($_GET['enrollment_number']) && $_GET['enrollment_number'] != "") {
					$this->db->where('tbl_student.enrollment_number', $_GET['enrollment_number']);
				}
				if (isset($_GET['course']) && $_GET['course'] != "") {
					$this->db->where('tbl_student.course_id', $_GET['course']);
				}
				if (isset($_GET['stream']) && $_GET['stream'] != "") {
					$this->db->where('tbl_student.stream_id', $_GET['stream']);
				}
				$this->db->join('tbl_student', 'tbl_student.id = tbl_guardian_assesment.student_id', 'left');
				$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
				$this->db->join('tbl_employees', 'tbl_employees.id = tbl_guardian_assesment.updated_by', 'left');
				$this->db->join('tbl_assignment', 'tbl_assignment.id = tbl_guardian_assesment.student_id', 'left');
				$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
				$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
				$this->db->order_by('tbl_guardian_assesment.updated_on', 'DESC');
				$result = $this->db->get('tbl_guardian_assesment');
				return $result->result();
			} else {
				return array();
			}
		} else {
			return array();
		}
	}
	public function get_rti_all_complaint($length, $start, $search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('first_name', $search);
			$this->db->or_like('last_name', $search);
			$this->db->or_like('gender', $search);
			$this->db->or_like('student_teacher', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('complaint', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_rti_grievance');
		return $result->result();
	}
	public function get_rti_all_complaint_count($search)
	{
		$this->db->where('is_deleted', '0');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('first_name', $search);
			$this->db->or_like('last_name', $search);
			$this->db->or_like('gender', $search);
			$this->db->or_like('student_teacher', $search);
			$this->db->or_like('mobile_number', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('complaint', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get('tbl_rti_grievance');
		return $result->num_rows();
	}
	public function get_single_rti_grievance()
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('status', '1');
		$this->db->where('id', $this->uri->segment(2));
		$result = $this->db->get('tbl_rti_grievance');
		return $result->row();
	}
	public function admin_get_self_assessment_pending_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_self_assessment_form.center_id');
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
	public function admin_get_self_assessment_pending_ajax_count($search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_self_assessment_form.center_id');
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
	public function admin_get_self_assessment_rejected_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_self_assessment_form.center_id');
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
	public function admin_get_self_assessment_rejected_ajax_count($search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_self_assessment_form.center_id');
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
	public function admin_get_self_assessment_approved_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_self_assessment_form.center_id');
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
	public function admin_get_self_assessment_approved_ajax_count($search)
	{
		$this->db->select('tbl_center_self_assessment_form.*,tbl_student.student_name,tbl_student.signature,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_self_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_self_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_self_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_self_assessment_form.center_id');
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
	public function admin_get_teacher_assessment_pending_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_teacher_assessment_form.center_id');
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
	public function admin_get_teacher_assessment_pending_ajax_count($search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_teacher_assessment_form.center_id');
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
	public function admin_get_teacher_assessment_rejected_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_teacher_assessment_form.center_id');
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
	public function admin_get_teacher_assessment_rejected_ajax_count($search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_teacher_assessment_form.center_id');
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
	public function admin_get_teacher_assessment_approved_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_teacher_assessment_form.center_id');
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
	public function admin_get_teacher_assessment_approved_ajax_count($search)
	{
		$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_teacher_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_teacher_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_teacher_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_teacher_assessment_form.center_id');
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
	public function admin_get_industry_assessment_pending_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_industry_assessment_form.center_id');
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
	public function admin_get_industry_assessment_pending_ajax_count($search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_industry_assessment_form.center_id');
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
	public function admin_get_industry_assessment_rejected_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_industry_assessment_form.center_id');
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
	public function admin_get_industry_assessment_rejected_ajax_count($search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_industry_assessment_form.center_id');
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
	public function admin_get_industry_assessment_approved_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_industry_assessment_form.center_id');
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
	public function admin_get_industry_assessment_approved_ajax_count($search)
	{
		$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_center_industry_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_industry_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_industry_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_industry_assessment_form.center_id');
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
	public function admin_get_parent_assessment_pending_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_center.center_name');
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_parent_assessment_form.center_id');
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
	public function admin_get_parent_assessment_pending_ajax_count($search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_center.center_name');
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '0');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_parent_assessment_form.center_id');
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
	public function admin_get_parent_assessment_rejected_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_center.center_name');
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_parent_assessment_form.center_id');
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
	public function admin_get_parent_assessment_rejected_ajax_count($search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_center.center_name');
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '1');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_parent_assessment_form.center_id');
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
	public function admin_get_parent_assessment_approved_ajax($length, $start, $search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_center.center_name');
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_parent_assessment_form.center_id');
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
	public function admin_get_parent_assessment_approved_ajax_count($search)
	{
		$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_center.center_name');
		$this->db->where('tbl_center_parent_assessment_form.is_deleted', '0');
		$this->db->where('tbl_center_parent_assessment_form.assessment_status', '2');
		$this->db->where('tbl_center_parent_assessment_form.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_center_parent_assessment_form.center_id');
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
	public function admin_approve_self_assessment()
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
	public function admin_center_self_reject_remark()
	{
		$data = array(
			'reject_remark' 	=> $this->input->post('reject_remark'),
			'assessment_status' => '1',
		);
		// echo "<pre>";print_r($this->input->post('id'));exit;
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_center_self_assessment_form', $data);
		return true;
	}
	public function admin_approve_teacher_assessment()
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
	public function admin_center_teacher_reject_remark()
	{
		$data = array(
			'reject_remark' 	=> $this->input->post('reject_remark'),
			'assessment_status' => '1',
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_center_teacher_assessment_form', $data);
		return true;
	}
	public function admin_approve_industry_assessment()
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
	public function admin_center_industry_reject_remark()
	{
		$data = array(
			'reject_remark' 	=> $this->input->post('reject_remark'),
			'assessment_status' => '1',
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_center_industry_assessment_form', $data);
		return true;
	}
	public function admin_approve_parent_assessment()
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
	public function admin_center_parent_reject_remark()
	{
		$data = array(
			'reject_remark' 	=> $this->input->post('reject_remark'),
			'assessment_status' => '1',
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_center_parent_assessment_form', $data);
		return true;
	}
	public function get_print_assessment_pdf()
	{
		if (isset($_GET['type']) && $_GET['type'] == "self_Assessmen") {
			$this->db->select('tbl_center_self_assessment_form.*,tbl_student.signature,tbl_student.student_name,tbl_center.center_name,tbl_course.print_name,tbl_stream.stream_name');
			$this->db->where('tbl_center_self_assessment_form.id', $this->uri->segment(2));
			$this->db->join('tbl_student', 'tbl_student.id = tbl_center_self_assessment_form.student_id');
			$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
			$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
			$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
			$result = $this->db->get('tbl_center_self_assessment_form');
			return $result->row();
		} else if (isset($_GET['type']) && $_GET['type'] == "teacher_Assessmen") {
			$this->db->select('tbl_center_teacher_assessment_form.*,tbl_student.signature,tbl_student.student_name,tbl_center.center_name,tbl_course.print_name,tbl_stream.stream_name');
			$this->db->where('tbl_center_teacher_assessment_form.id', $this->uri->segment(2));
			$this->db->join('tbl_student', 'tbl_student.id = tbl_center_teacher_assessment_form.student_id');
			$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
			$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
			$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
			$result = $this->db->get('tbl_center_teacher_assessment_form');
			return $result->row();
		} else if (isset($_GET['type']) && $_GET['type'] == "industry_Assessmen") {
			$this->db->select('tbl_center_industry_assessment_form.*,tbl_student.signature,tbl_student.student_name,tbl_center.center_name,tbl_course.print_name,tbl_stream.stream_name');
			$this->db->where('tbl_center_industry_assessment_form.id', $this->uri->segment(2));
			$this->db->join('tbl_student', 'tbl_student.id = tbl_center_industry_assessment_form.student_id');
			$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
			$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
			$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
			$result = $this->db->get('tbl_center_industry_assessment_form');
			return $result->row();
		} else if (isset($_GET['type']) && $_GET['type'] == "parent_Assessmen") {
			$this->db->select('tbl_center_parent_assessment_form.*,tbl_student.signature,tbl_student.student_name,tbl_center.center_name,tbl_course.print_name,tbl_stream.stream_name');
			$this->db->where('tbl_center_parent_assessment_form.id', $this->uri->segment(2));
			$this->db->join('tbl_student', 'tbl_student.id = tbl_center_parent_assessment_form.student_id');
			$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id', 'left');
			$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id', 'left');
			$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id', 'left');
			$result = $this->db->get('tbl_center_parent_assessment_form');
			return $result->row();
		}
	}
	public function get_assement_subject_details($table, $column, $id)
	{
		$this->db->where($column, $id);
		$result = $this->db->get($table);
		return $result->result();
	}
	public function admin_assignement_approval()
	{
		$data = array(
			'assessment_status' => '1'
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_assignment', $data);
		return true;
	}
	public function admin_assignement_pending()
	{
		$data = array(
			'assessment_status' => '0'
		);
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_assignment', $data);
		return true;
	}
	public function admin_assignement_reject_remrak()
	{
		$data = array(
			'assessment_status' => '2',
			'rejection_remark' => $this->input->post('reject_remark'),
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_assignment', $data);
		return true;
	}
	public function get_all_pending_assignment_ajax($length, $start, $search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '0');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->group_end();
		}
		$this->db->order_by('id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_assignment');
		return $result->result();
	}
	public function get_all_pending_assignment_ajax_count($search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '0');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->or_like('tbl_center.center_name', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_assignment');
		return $result->num_rows();
	}
	public function get_all_rejected_assignment_ajax($length, $start, $search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
// 		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '2');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
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
	public function get_all_rejected_assignment_ajax_count($search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
// 		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '2');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_assignment');
		return $result->num_rows();
	}
	public function get_all_approved_assignment_ajax($length, $start, $search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
// 		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '1');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
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
	public function get_all_approved_assignment_ajax_count($search)
	{
		$this->db->select('tbl_assignment.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
// 		$this->db->where('tbl_student.center_id', $this->session->userdata('center_id'));
		$this->db->where('tbl_assignment.is_deleted', '0');
		$this->db->where('tbl_assignment.assessment_status', '1');
		$this->db->where('tbl_assignment.status', '1');
		$this->db->join('tbl_student', 'tbl_student.id = tbl_assignment.student_id');
		$this->db->join('tbl_course', 'tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream', 'tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center', 'tbl_center.id = tbl_student.center_id');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name', $search);
			$this->db->or_like('tbl_student.enrollment_number', $search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_assignment');
		return $result->num_rows();
	}
	public function send_custom_mail_via_erp(){  
        $to = $this->input->post('to');
        $to_email = array(
                "email" => $to,
                "name" => "BTU"
            );
    	$cc_email = array();
        $cc = array();
        
        if ($this->input->post('cc') != "") {
            $cc_email = explode(";", $this->input->post('cc'));
        
            if (!empty($cc_email)) {
                for ($e = 0; $e < count($cc_email); $e++) {
                    $email = trim($cc_email[$e]); // Trim spaces to avoid empty entries
                    if (!empty($email)) {
                        $cc[] = array(
                            "email" => $email,
                            "name" => 'BTU', 
                        );
                    }
                }
            }
        } 
		$subject = $this->input->post('subject');
		$message = $this->input->post('content'); 
		if(!empty($cc)){
			  $data = array( 
				"sender" => array( 
					"email" => no_reply_mail, 
					"name" => no_reply_name          
				), 
				"to" => array( 
					$to_email 
				),  			 
				 "cc" => $cc , 
				 "replyTo" => array(
					"email" => "shruti@tgu.ac.in",  
					"name" => "Support Team"  
				),
				"subject" => $subject, 
				"htmlContent" => $message   
			); 
		}else{
			$data = array( 
				"sender" => array( 
					"email" => no_reply_mail, 
					"name" => no_reply_name          
				), 
				"to" => array( 
					$to_email 
				),  			 
				 "replyTo" => array(
					"email" => "shruti@tgu.ac.in",  
					"name" => "Support Team"  
				),
				"subject" => $subject, 
				"htmlContent" => $message   
			); 
		}
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email'); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  
        $headers = array(); 
        $headers[] = 'Accept: application/json'; 
        $headers[] = 'Api-Key: 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'; 
        $headers[] = 'Content-Type: application/json'; 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);   
        $result = curl_exec($ch);  
		//echo $result;exit;
        if (curl_errno($ch)) {  
            echo 'Error:' . curl_error($ch); 
        } 
        curl_close($ch); 
        return true; 
	 }
	 public function set_complete_student_visit(){
		$data = array(
			'visit_status' => '1'
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_visit_appoinment',$data);
		return true;
	}
	public function get_all_campus_visit_appointments_ajx($length,$start,$search){
		$this->db->select('tbl_visit_appoinment.*,tbl_center.center_name');
		$this->db->join('tbl_center','tbl_center.id = tbl_visit_appoinment.center_id');
		$this->db->where('tbl_visit_appoinment.is_deleted','0');
		$this->db->where('tbl_visit_appoinment.visit_status','0');
	
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_visit_appoinment.enrollment_number',$search);
			$this->db->or_like('tbl_visit_appoinment.student_name',$search);
			$this->db->or_like('tbl_visit_appoinment.course',$search); 
			$this->db->or_like('tbl_visit_appoinment.branch',$search); 
			$this->db->or_like('tbl_visit_appoinment.year_of_completion',$search); 
			$this->db->or_like('tbl_visit_appoinment.place',$search);
			$this->db->or_like('tbl_visit_appoinment.country',$search);
			$this->db->or_like('tbl_visit_appoinment.state',$search); 
			$this->db->or_like('tbl_visit_appoinment.date_of_visiting_in_university',$search); 
			$this->db->or_like('tbl_visit_appoinment.time_of_visiting_in_university',$search); 
			$this->db->or_like('tbl_visit_appoinment.mobile_number',$search);
			$this->db->or_like('tbl_visit_appoinment.alternamte_mobile_number',$search);
			$this->db->or_like('tbl_visit_appoinment.purpose_of_visit',$search); 
			$this->db->or_like('tbl_center.center_name',$search); 
			$this->db->group_end();
		}
		$this->db->order_by('tbl_visit_appoinment.id','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_visit_appoinment');
		return $result->result();		
	}
	public function get_all_campus_visit_appointments_ajx_count($search){
		$this->db->select('tbl_visit_appoinment.*,tbl_center.center_name');
		$this->db->join('tbl_center','tbl_center.id = tbl_visit_appoinment.center_id');
		$this->db->where('tbl_visit_appoinment.is_deleted','0');
		$this->db->where('tbl_visit_appoinment.visit_status','0');
	
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_visit_appoinment.enrollment_number',$search);
			$this->db->or_like('tbl_visit_appoinment.student_name',$search);
			$this->db->or_like('tbl_visit_appoinment.course',$search); 
			$this->db->or_like('tbl_visit_appoinment.branch',$search); 
			$this->db->or_like('tbl_visit_appoinment.year_of_completion',$search); 
			$this->db->or_like('tbl_visit_appoinment.place',$search);
			$this->db->or_like('tbl_visit_appoinment.country',$search);
			$this->db->or_like('tbl_visit_appoinment.state',$search); 
			$this->db->or_like('tbl_visit_appoinment.date_of_visiting_in_university',$search); 
			$this->db->or_like('tbl_visit_appoinment.time_of_visiting_in_university',$search); 
			$this->db->or_like('tbl_visit_appoinment.mobile_number',$search);
			$this->db->or_like('tbl_visit_appoinment.alternamte_mobile_number',$search);
			$this->db->or_like('tbl_visit_appoinment.purpose_of_visit',$search); 
			$this->db->or_like('tbl_center.center_name',$search); 
			$this->db->group_end();
		}
		$this->db->order_by('tbl_visit_appoinment.id','ASC');
		$result = $this->db->get('tbl_visit_appoinment');
		return $result->num_rows();
	}
	public function get_all_completed_campus_visit_appointments_ajx($length,$start,$search){
		$this->db->select('tbl_visit_appoinment.*,tbl_center.center_name');
		$this->db->join('tbl_center','tbl_center.id = tbl_visit_appoinment.center_id');
		$this->db->where('tbl_visit_appoinment.is_deleted','0');
		$this->db->where('tbl_visit_appoinment.visit_status','1');
	
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_visit_appoinment.enrollment_number',$search);
			$this->db->or_like('tbl_visit_appoinment.student_name',$search);
			$this->db->or_like('tbl_visit_appoinment.course',$search); 
			$this->db->or_like('tbl_visit_appoinment.branch',$search); 
			$this->db->or_like('tbl_visit_appoinment.year_of_completion',$search); 
			$this->db->or_like('tbl_visit_appoinment.place',$search);
			$this->db->or_like('tbl_visit_appoinment.country',$search);
			$this->db->or_like('tbl_visit_appoinment.state',$search); 
			$this->db->or_like('tbl_visit_appoinment.date_of_visiting_in_university',$search); 
			$this->db->or_like('tbl_visit_appoinment.time_of_visiting_in_university',$search); 
			$this->db->or_like('tbl_visit_appoinment.mobile_number',$search);
			$this->db->or_like('tbl_visit_appoinment.alternamte_mobile_number',$search);
			$this->db->or_like('tbl_visit_appoinment.purpose_of_visit',$search); 
			$this->db->or_like('tbl_center.center_name',$search); 
			$this->db->group_end();
		}
		$this->db->order_by('tbl_visit_appoinment.id','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_visit_appoinment');
		return $result->result();		
	}
	public function get_all_completed_campus_visit_appointments_ajx_count($search){
		$this->db->select('tbl_visit_appoinment.*,tbl_center.center_name');
		$this->db->join('tbl_center','tbl_center.id = tbl_visit_appoinment.center_id');
		$this->db->where('tbl_visit_appoinment.is_deleted','0');
		$this->db->where('tbl_visit_appoinment.visit_status','1');
	
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_visit_appoinment.enrollment_number',$search);
			$this->db->or_like('tbl_visit_appoinment.student_name',$search);
			$this->db->or_like('tbl_visit_appoinment.course',$search); 
			$this->db->or_like('tbl_visit_appoinment.branch',$search); 
			$this->db->or_like('tbl_visit_appoinment.year_of_completion',$search); 
			$this->db->or_like('tbl_visit_appoinment.place',$search);
			$this->db->or_like('tbl_visit_appoinment.country',$search);
			$this->db->or_like('tbl_visit_appoinment.state',$search); 
			$this->db->or_like('tbl_visit_appoinment.date_of_visiting_in_university',$search); 
			$this->db->or_like('tbl_visit_appoinment.time_of_visiting_in_university',$search); 
			$this->db->or_like('tbl_visit_appoinment.mobile_number',$search);
			$this->db->or_like('tbl_visit_appoinment.alternamte_mobile_number',$search);
			$this->db->or_like('tbl_visit_appoinment.purpose_of_visit',$search); 
			$this->db->or_like('tbl_center.center_name',$search); 
			$this->db->group_end();
		}
		$this->db->order_by('tbl_visit_appoinment.id','ASC');
		$result = $this->db->get('tbl_visit_appoinment');
		return $result->num_rows();
	}
	public function get_single_tudent_appointments(){
		$this->db->where('tbl_visit_appoinment.is_deleted','0');
		$this->db->where('tbl_visit_appoinment.id',$this->uri->segment(2));
		$result = $this->db->get('tbl_visit_appoinment');
		return $result->row();
	}
	public function set_reschedule_student_appointments(){
		$data = array(
			'email' 						=> $this->input->post('email'),
			'mobile_number' 				=> $this->input->post('mobile_number'),
			'time_of_visiting_in_university'=> $this->input->post('time_of_visiting_in_university'),
			'date_of_visiting_in_university'=> $this->input->post('date_of_visiting_in_university')
		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tbl_visit_appoinment',$data);
		
		$message = "Dear ".$this->input->post('student_name');
		$message .= ",<br><br>Your Appointment has been re-scheduled on ".date("d/m/Y",strtotime( $this->input->post('date_of_visiting_in_university')))." at ".$this->input->post('time_of_visiting_in_university');
		$message .= "<br>";  
		$message .= "<br>Thanks<br>Team Bir Tikendrajit University";
		
		
		
		  $to = array(
			"email" => $this->input->post('email'),
			"name" => $this->input->post('student_name'),
		);
		$subject = 'Appointment Details | Bir Tikendrajit University';    
		$this->Admin_model->send_send_blue($to,$subject,$message);
			
		/*
		 
		$mobile_number = $this->input->post("mobile_number");
		$authKey = SMSKEY;
		$senderId = SENDERID;
		$route = ROUTE;
		$message = "Dear ".$this->input->post('student_name')." Your appoinment has been re-scheduled on". date("d/m/Y",strtotime($this->input->post('date_of_visiting_in_university'))) ."at".$this->input->post('time_of_visiting_in_university') ;
		// print_r($message);exit;
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
		*/
		return true;
	}
	public function get_all_visitor_ajax($length, $start, $search){
		$this->db->where('tbl_visitor.is_deleted', '0');
		$this->db->where('tbl_visitor.status', '1');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_visitor.name', $search);
			$this->db->or_like('tbl_visitor.email', $search);
			$this->db->or_like('tbl_visitor.mobile_number', $search);
			$this->db->or_like('tbl_visitor.visit_for', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_visitor.id', 'DESC');
		$this->db->limit($length, $start);
		$result = $this->db->get('tbl_visitor');
		return $result->result();
	}
	public function get_all_visitor_ajax_count($search){
		$this->db->where('tbl_visitor.is_deleted', '0');
		$this->db->where('tbl_visitor.status', '1');
		if ($search != "") {
			$this->db->group_start();
			$this->db->or_like('tbl_visitor.name', $search);
			$this->db->or_like('tbl_visitor.email', $search);
			$this->db->or_like('tbl_visitor.mobile_number', $search);
			$this->db->or_like('tbl_visitor.visit_for', $search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_visitor.id', 'DESC');
		$result = $this->db->get('tbl_visitor');
		return $result->num_rows();
	} 
}