<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
//require_once 'vendor/autoload.php';
//require_once 'vendor/phpoffice/phpspreadsheet/src/Bootstrap.php';
require 'vendor/autoload.php';
   use PhpOffice\PhpSpreadsheet\Spreadsheet;
   use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Admin_model extends CI_Model { 
	public function login(){
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('password',md5($this->input->post('password')));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$result = $this->db->get('tbl_employees');
		$result = $result->row();
		if(!empty($result)){
			$data = array(
				'admin_id' => $result->id
			);
			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
	}
	public function forgot_password(){
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$result = $this->db->get('tbl_employees');
		$result = $result->row();
		$password = rand();
		if(!empty($result)){
			$data = array(
				'password' => md5($password)
			);			
			$this->db->where('id',$result->id);
			$this->db->update('tbl_employees',$data);
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE; 
			$this->email->initialize($config);

			$this->email->from('no-reply@tgu.com');
			$this->email->to($result->email);
			$this->email->subject('New Password |THE GLOBAL UNIVERSITY'); 
			$this->email->set_mailtype('html');
			$message = "Dear ".$result->first_name.",<br> below are the login details to continue.<br>";
			
			$message .= "<br>URL: ".base_url()."erp-access";
			$message .= "<br>Username: ".$result->email;
			$message .= "<br>Password: ".$password;
			$message .="<br>Regards<br>IT Team";
			$this->email->message($message); 
			if($this->email->send()){  
			}else{ 
			}	
			return true;
		}else{
			return false;
		}
	}
	public function get_profile(){
		$this->db->where('id',$this->session->userdata('admin_id'));
		$result = $this->db->get('tbl_employees');
		return $result->row();
	}
	public function get_old_paasword(){
		$this->db->where('id',$this->session->userdata('admin_id'));
		$this->db->where('password',md5($this->input->post('old_password')));
		$result = $this->db->get('tbl_employees');
		echo $result->num_rows();
	}
	public function set_password(){
		$data = array(
			'password' => md5($this->input->post('new_password'))
		);
		$this->db->where('id',$this->session->userdata('admin_id'));
		$this->db->update('tbl_employees',$data);
		return true;
	}
	public function get_all_country(){
		$this->db->order_by('name','ASC');
		$resullt = $this->db->get('countries');
		return $resullt->result();
	}
	public function get_state_ajax($country){
		$this->db->where('country_id',$country);
		$this->db->order_by('name','ASC');
		$resullt = $this->db->get('states');
		echo json_encode($resullt->result());
	}
	public function get_country_id_by_code($country_code){
		$this->db->where('sortname', $country_code);
		$result = $this->db->get('countries');
		return $result->row()->id;
	}
	public function get_state_ajax_by_country_code($country_code){
		$country = $this->get_country_id_by_code($country_code);
		$this->db->where('country_id',$country);
		$this->db->order_by('name','ASC');
		$resullt = $this->db->get('states');
		echo json_encode($resullt->result());
	}
	public function get_city_ajax($state){
		$this->db->where('state_id',$state);
		$this->db->order_by('name','ASC');
		$resullt = $this->db->get('cities');
		echo json_encode($resullt->result());
	}
	public function get_selected_state($country){
		$this->db->where('country_id',$country);
		$this->db->order_by('name','ASC');
		$resullt = $this->db->get('states');
		return $resullt->result();
	}
	public function get_selected_city($state){
		$this->db->where('state_id',$state);
		$this->db->order_by('name','ASC');
		$resullt = $this->db->get('cities');
		return $resullt->result();
	}
	public function set_profile($photo){
		if($photo == ""){
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
		$this->db->where('id',$this->session->userdata('admin_id'));
		$this->db->update('tbl_employees',$data);
		return true;
	}
	public function get_my_unique_email(){
		$this->db->where('id !=',$this->session->userdata('admin_id'));
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_employees');
		echo $result->num_rows();
	}
	public function get_my_unique_contact_number(){
		$this->db->where('id !=',$this->session->userdata('admin_id'));
		$this->db->where('contact_number',$this->input->post('contact_number'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_employees');
		echo $result->num_rows();
	}
	public function get_faculty_count(){
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_faculty');
		return $result->num_rows();
	}
	public function get_course_count(){
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_course');
		return $result->num_rows();
	}
	public function get_stream_count(){
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_stream');
		return $result->num_rows();
	}
	public function get_subject_count(){
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_subject');
		return $result->num_rows();
	}
	public function get_course_stream_relation_count(){
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->num_rows();
	}
    public function get_quiz_by_test_id($test_id){  
        $this->db->where('status','0');  
        $this->db->where('test_id',$test_id);  
        $result = $this->db->get('tbl_question_ans');  
        return $result->result();  
    }  
    public function check_student_login(){  
        $this->db->where('email_id',$this->input->post('student_email'));  
        $this->db->where('password',$this->input->post('student_password')); 
        $result = $this->db->get('tbl_phd_registration_form');  
        $result = $result->row();  
        if(!empty($result)){  
            return true;  
        }else{  
            return false;  
        }  
    }   
    public function get_question_paper($test_no){  
        $this->db->where('test_id',$test_no);  
        $this->db->where('status','0');  
        $result = $this->db->get('tbl_question_ans');  
        return $result->result();  
    }  
    public function get_question_ids_of_test($test_no){  
        $this->db->select('id');  
        $this->db->where('test_id',$test_no);  
        $this->db->where('status','0');  
        $result = $this->db->get('tbl_question_ans');  
        return $result->result();  
    }  
    public function save_test_answers($test_no){  
        $total_questions = intval($this->input->post('total_questions'));  
        $question_list = $this->get_question_ids_of_test($test_no);  
        $test_ans = [];  
        foreach ($question_list as $que) {  
            $ans_id = 'question_'.$que->id;  
            $ans =  is_null($this->input->post($ans_id))?0:intval($this->input->post($ans_id));  
            $option_json = array(  
                "selected_ans" => $ans,  
            );  
            $ans_json = array(  
                "q_id" =>$que->id,  
                "ans" => json_encode($option_json),   
            );  
            array_push($test_ans,$ans_json);  
        }  
        $data = array(  
            'student_email' => $this->input->post('student_email'),  
            'test_id' => $test_no,  
            'test_ans' => json_encode($test_ans),  
            "created_on" => date("Y-m-d H:i:s"),  
        );  
        $this->db->insert('tbl_test_phd_students',$data); 
        $this->save_phd_entrance_score($data['student_email'],$test_no); 
    }  
    public function get_question_id_ans($test_no){  
        $this->db->select('id,correct_ans');  
        $this->db->where('test_id',$test_no);  
        $this->db->where('status','0');  
        $result = $this->db->get('tbl_question_ans');  
        return $result->result();  
    }  
    public function save_phd_entrance_score($student_email,$test_no){  
        $this->db->where("student_email",$student_email);  
        $this->db->where("test_id",$test_no);  
        $result = $this->db->get('tbl_test_phd_students');  
        $data = $result->row()->test_ans;  
        var_dump($data);  
        $json = json_decode($data,true);  
        $answers = $this->get_question_id_ans($test_no);  
        $question_ans = array();  
        foreach ($answers as $key){  
            $question_ans[$key->id] = $key->correct_ans;  
        }  
        $score = 0;  
        foreach($json as $key){ 
            $q_id = $key['q_id']; 
            $j_ans = json_decode($key['ans'],true);  
            if($question_ans[$q_id] == $j_ans['selected_ans']){  
                $score++;  
            }                
        }  
        $this->set_phd_score($score,$student_email,$test_no);  
    }   
    public function set_phd_score($score,$student_email,$test_no){  
        $data = array(  
            'student_email' => $student_email,  
            'test_id' => $test_no,  
            'score' => $score,  
            "created_on" =>  date("Y-m-d H:i:s"),  
        );  
        $this->db->insert('tbl_phd_ent_scores',$data);   
    }   
    public function set_test_title(){   
        $data = array(  
            "test_name" => $this->input->post('test_name'),  
            "created_on" =>  date("Y-m-d H:i:s"),  
            "created_by" => $this->session->userdata('admin_id'),  
        );  
        $this->db->insert('tbl_test_title_for_phd',$data);  
        $id = $this->db->insert_id();  
        return $id;  
    }   
    public function get_test_title(){ 
        $this->db->where('is_deleted','0'); 
        $this->db->where('status','1'); 
        $result = $this->db->get('tbl_test_title_for_phd'); 
		$result = $result->row();
        if(!empty($result)){ 
			return $result->test_name; 
        }else{ 
            return "";
        } 
    }  
    public function get_all_test_titles(){  
        $this->db->where('status','0');  
        $result = $this->db->get('tbl_test_title_for_phd');  
        return $result->result();  
    }  
	public function set_quiz_question(){  
        $options = $this->input->post('ans');  
        $update_to = $this->input->post('question_number_id');  
        $photo ='';  
        if($_FILES['img_file']['name'] !=""){  
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
			} 
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
        $this->Admin_model->save_question_to_db($data,$update_to);  
    }  
    public function delete_question($question_id,$test_id){  
        $this->db->where('id',$question_id);  
        $this->db->where('test_id',$test_id);  
        $data = array(  
            'status' => '1',  
        );  
        $this->db->update('tbl_question_ans',$data);  
    }
	public function lead_cron(){ 
		$spreadsheet = new Spreadsheet();
		$enq_spreadsheet = new Spreadsheet();
		$cen_spreadsheet = new Spreadsheet();
		
		$this->db->where('is_deleted','0'); 
		$this->db->where('is_mail','0'); 
		$otp = $this->db->get('tbl_registration_lead');
		$otp = $otp->result();
		
		$sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Name'); 
		$sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Mobile');     
        $rows = 2;
        foreach ($otp as $val){			
			$update = array(
				'is_mail' => '1'
			);
			$this->db->where('id',$val->id);  
			$this->db->update('tbl_registration_lead');
            
			$sheet->setCellValue('A' . $rows, $val->name); 
            $sheet->setCellValue('B' . $rows, $val->email);
            $sheet->setCellValue('C' . $rows, $val->mobile); 
            $rows++;
        } 
		$fileName = "otp_lead_".date("d_m-Y").".xlsx";
        $writer = new Xlsx($spreadsheet);
		$writer->save("uploads/enquiry/".$fileName);
		
		
		$this->db->where('is_deleted','0');
		$this->db->where('is_mail','0');
		$enquiry = $this->db->get('tbl_enquiry');
		$enquiry = $enquiry->result();
		
		$enquiry_sheet = $enq_spreadsheet->getActiveSheet();
        $enquiry_sheet->setCellValue('A1', 'Name'); 
		$enquiry_sheet->setCellValue('B1', 'Email');
        $enquiry_sheet->setCellValue('C1', 'Mobile');     
        $enquiry_sheet->setCellValue('D1', 'Course');     
        $rows = 2;
        foreach ($enquiry as $val){
			$update = array(
				'is_mail' => '1'
			);
			$this->db->where('id',$val->id);  
			$this->db->update('tbl_enquiry');
			
            $enquiry_sheet->setCellValue('A' . $rows, $val->name); 
            $enquiry_sheet->setCellValue('B' . $rows, $val->email);
            $enquiry_sheet->setCellValue('C' . $rows, $val->mobile); 
            $enquiry_sheet->setCellValue('D' . $rows, $val->course); 
            $rows++;
        } 
		$enq_fileName = "student_enq_lead_".date("d_m-Y").".xlsx";
        $writer = new Xlsx($enq_spreadsheet);
		$writer->save("uploads/enquiry/".$enq_fileName);
		
		
		
		$this->db->where('is_deleted','0');
		$this->db->where('is_mail','0');
		$center_enquiry = $this->db->get('tbl_center_enquiry');
		$center_enquiry = $center_enquiry->result();
		
		$cen_enquiry_sheet = $cen_spreadsheet->getActiveSheet();
        $cen_enquiry_sheet->setCellValue('A1', 'Name'); 
		$cen_enquiry_sheet->setCellValue('B1', 'Email');
        $cen_enquiry_sheet->setCellValue('C1', 'Mobile');     
        $cen_enquiry_sheet->setCellValue('D1', 'Course');     
        $rows = 2;
        foreach ($enquiry as $val){
			$update = array(
				'is_mail' => '1'
			);
			$this->db->where('id',$val->id);  
			$this->db->update('tbl_center_enquiry');
			
            $cen_enquiry_sheet->setCellValue('A' . $rows, $val->name); 
            $cen_enquiry_sheet->setCellValue('B' . $rows, $val->email);
            $cen_enquiry_sheet->setCellValue('C' . $rows, $val->mobile); 
            $cen_enquiry_sheet->setCellValue('D' . $rows, $val->course); 
            $rows++;
        } 
		$cen_enq_fileName = "cen_enq_lead_".date("d_m-Y").".xlsx";
        $writer = new Xlsx($cen_spreadsheet);
		$writer->save("uploads/enquiry/".$cen_enq_fileName);
		
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

		$this->email->from('no-reply@tgu.com','Global University');
		$this->email->to('info@theglobaluniversity.edu.in');
		$this->email->cc('anujiips@gmail.com');
		$this->email->bcc('techwebsolutions11@gmail.com');
		
		$this->email->subject('New Leads | Global University');
		$this->email->message($admin_message);
		$this->email->set_mailtype('html');
		$this->email->attach('uploads/enquiry/'.$fileName);
		$this->email->attach('uploads/enquiry/'.$enq_fileName);
		$this->email->attach('uploads/enquiry/'.$cen_enq_fileName);
		if($this->email->send()){ 
		}else{ 
		} 
	}
	public function remove_duplicate_exam_form(){
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

	public function upload_exam_papper($papper){
		$data = array(
			"course"=>$this->input->post("course"),
			"stream"=>$this->input->post("stream"),
			"year_sem"=>$this->input->post("year_sem"),
			"subject"=>$this->input->post("subject"),
			"file"=>$papper,
		);
		if(empty($this->uri->segment(2))){
			$data["created_on"] = date("Y-m-d H:i:s");
			$this->db->insert("tbl_exam_pappers",$data);
			return "saved";
		}else{
			$this->db->where("id",$this->input->post("id"));
			$this->db->update("tbl_exam_pappers",$data);
			return "updated";
		}
	}

	public function get_exam_papper_data_for_edit(){
		$this->db->where("is_deleted","0");
		$this->db->where("id",$this->uri->segment(2));
		$result = $this->db->get("tbl_exam_pappers")->row();
		return $result;
	}
	
	

	public function get_session_data_for_dropdown(){
		$this->db->select('tbl_session.id,tbl_session.session_name');
		$this->db->where("is_deleted","0");
		// $this->db->where("status","1");
		$result = $this->db->get("tbl_session")->result();
		return $result;
	}

	public function get_center_data_for_dropdown(){
		$this->db->select('tbl_center.id,tbl_center.center_name');
		$this->db->where("is_deleted","0");
		// $this->db->where("status","1");
		$result = $this->db->get("tbl_center")->result();
		return $result;
	}

	public function get_student_data_for_dropdown(){
		$this->db->select('tbl_student.id,tbl_student.student_name');
		$this->db->where("is_deleted","0");
		$this->db->where("status","1");
		$this->db->where("admission_status",1);
		$this->db->or_where("admission_status",3);
		$this->db->or_where("admission_status",4);
		$this->db->where("verified_status","1");
		$result = $this->db->get("tbl_student")->result();
		return $result;
	}
	public function get_cbd_all_complaint($length,$start,$search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('first_name',$search);
			$this->db->or_like('last_name',$search);
			$this->db->or_like('gender',$search);
			$this->db->or_like('student_teacher',$search);
			$this->db->or_like('mobile_number',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('complaint',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_caste_discrimination');
		return $result->result();		
	}
	public function get_cbd_all_complaint_count($search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('first_name',$search);
			$this->db->or_like('last_name',$search);
			$this->db->or_like('gender',$search);
			$this->db->or_like('student_teacher',$search);
			$this->db->or_like('mobile_number',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('complaint',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_caste_discrimination');
		return $result->num_rows();
	}
	public function get_all_direct_success_payment_list($length,$start,$search){
		$this->db->where('is_deleted','0');
		$this->db->where('payment_status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('registration_number',$search);
			$this->db->or_like('name',$search);
			$this->db->or_like('mobile_number',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('amount',$search);
			$this->db->or_like('payment_id',$search);
			$this->db->or_like('payment_date',$search);
			$this->db->group_end();
		}
		$this->db->order_by('payment_date','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_direct_payment');
		return $result->result();		
	}
	public function get_all_direct_success_payment_list_count($search){
		$this->db->where('is_deleted','0');
		$this->db->where('payment_status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('registration_number',$search);
			$this->db->or_like('name',$search);
			$this->db->or_like('mobile_number',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('amount',$search);
			$this->db->or_like('payment_id',$search);
			$this->db->or_like('payment_date',$search);
			$this->db->group_end();
		}
		$this->db->order_by('payment_date','DESC');
		$result = $this->db->get('tbl_direct_payment');
		return $result->num_rows();
	}
	public function get_all_direct_failed_payment_list($length,$start,$search){
		$this->db->where('is_deleted','0');
		$this->db->where('payment_status','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('registration_number',$search);
			$this->db->or_like('name',$search);
			$this->db->or_like('mobile_number',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('amount',$search);
			$this->db->or_like('payment_date',$search);
			$this->db->group_end();
		}
		$this->db->order_by('payment_date','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_direct_payment');
		return $result->result();		
	}
	public function get_all_direct_failed_payment_list_count($search){
		$this->db->where('is_deleted','0');
		$this->db->where('payment_status','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('registration_number',$search);
			$this->db->or_like('name',$search);
			$this->db->or_like('mobile_number',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('amount',$search);
			$this->db->or_like('payment_date',$search);
			$this->db->group_end();
		}
		$this->db->order_by('payment_date','DESC');
		$result = $this->db->get('tbl_direct_payment');
		return $result->num_rows();
	}
	
	public function employee_left(){
		$data = array(  
            'is_left' => '1',  
        ); 
		$this->db->where('id',$this->uri->segment(2));
        $this->db->update('tbl_employees',$data);   
	}
	public function insert_seo_data(){
		$data = array(
	 		          'url'               =>$this->input->post('url'),
	 		          'meta_title'		  =>$this->input->post('meta_title'),
	 		          'keyword'           =>$this->input->post('keyword'),
	 		          'meta_description'  =>$this->input->post('meta_description'),
			          
		        );

		if($this->input->post('hidden_id') == ""){
			$date=array(
				'created_on'=> date('Y-m-d H:i:s'),
			);
			$new_arr=array_merge($data,$date);
			$this->db->insert('tbl_seo_title',$new_arr);

			return 1;
		}else{
			$this->db->where('id',$this->input->post('hidden_id'));
			$this->db->update('tbl_seo_title',$data);
			return 0;
		}
	}
	 public function get_single_seo_data(){
		$this->db->where('id',$this->uri->segment(2));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_seo_title');
	   	return $result->row();
	  }
	 public function get_seo_setup_list($length,$start,$search){
		$this->db->where('is_deleted', '0'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('url',$search);
			$this->db->or_like('meta_title',$search);
			$this->db->or_like('keyword',$search);
			$this->db->or_like('meta_description',$search);
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_seo_title');
		return $result->result();
	}
	public function get_seo_setup_list_count($search){
		$this->db->where('is_deleted', '0'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('url',$search);
			$this->db->or_like('meta_title',$search);
			$this->db->or_like('keyword',$search);
			$this->db->or_like('meta_description',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_seo_title');
		return $result->num_rows();
	}
	 public function get_monthly_count_admission($month){
	 	$this->db->where('is_deleted','0');
		$this->db->where('MONTH(admission_date)',$month);
		$this->db->where('YEAR(admission_date)',date('Y'));
		$result = $this->db->get('tbl_student');
		$result = $result->num_rows();
		return $result;
	 }
	 public function get_monthly_count_admission_seperate($month){
		$this->db->where('is_deleted','0');
		$this->db->where('MONTH(admission_date)',$month);
		$this->db->where('YEAR(admission_date)',date('Y'));
		$result = $this->db->get('tbl_separate_student');
		$result = $result->num_rows();
		return $result;
	 }
	 public function get_monthly_count_center($month){
		$this->db->where('is_deleted','0');
		$this->db->where('MONTH(created_on)',$month);
		$this->db->where('YEAR(created_on)',date('Y'));
		$result = $this->db->get('tbl_center');
		$result = $result->num_rows();
		return $result;
	 }
	 public function get_center_total_amount(){
		$this->db->select('SUM(amount) as total_amount');
		$this->db->where('is_deleted','0');
		$this->db->where('payment_status','1');
		$this->db->where('YEAR(payment_date)',date('Y'));
		$result = $this->db->get('tbl_center_payment');
		$result = $result->row();
		return $result->total_amount;
	 }
	 public function get_student_total_amount(){
		$type_of_fee = array('1','4','2');
        $this->db->select(" SUM(total_fees) as total_fees");
        $this->db->where('YEAR(tbl_student_fees.payment_date)',date("Y"));
        $this->db->where_in('tbl_student_fees.fees_type',$type_of_fee);
        $this->db->where('tbl_student_fees.is_deleted','0');
        $this->db->where('tbl_student_fees.payment_status','1');
        $result_student_fee_yearly = $this->db->get('tbl_student_fees');
        $result_student_fee_yearly = $result_student_fee_yearly->row();
		
        $this->db->select("SUM(amount) as total_fees_migration");
        $this->db->where('YEAR(tbl_student_migration.created_on)',date("Y"));
        $this->db->where('tbl_student_migration.is_deleted','0');
        $this->db->where('tbl_student_migration.payment_status','1');
        $result_student_migration_yearly  = $this->db->get('tbl_student_migration');
        $result_student_migration_yearly = $result_student_migration_yearly->row();

        $this->db->select("SUM(amount) as total_fees_provisinal");
        $this->db->where('YEAR(tbl_student_provisional_degree.created_on)',date("Y"));
        $this->db->where('tbl_student_provisional_degree.is_deleted','0');
        $this->db->where('tbl_student_provisional_degree.payment_status','1');
       
        $result_student_provisional_yearly  = $this->db->get('tbl_student_provisional_degree');
        $result_student_provisional_yearly = $result_student_provisional_yearly->row();
		
        $this->db->select("SUM(amount) as total_fees_transfer");
        $this->db->where('YEAR(tbl_student_transfer.created_on)',date("Y"));
        $this->db->where('tbl_student_transfer.is_deleted','0');
        $this->db->where('tbl_student_transfer.payment_status','1');
        $result_student_transfer_yearly = $this->db->get('tbl_student_transfer');
        $result_student_transfer_yearly = $result_student_transfer_yearly->row();

      	$this->db->select("SUM(amount) as total_fees_degree");
        $this->db->where('YEAR(tbl_student_degree.created_on)',date("Y"));
        $this->db->where('tbl_student_degree.is_deleted','0');
        $this->db->where('tbl_student_degree.payment_status','1');
        $this->db->join('tbl_student','tbl_student.id =  tbl_student_degree.student_id');
        $result_student_degree_yearly  = $this->db->get('tbl_student_degree');
        $result_student_degree_yearly = $result_student_degree_yearly->row();

        $this->db->select("SUM(amount) as total_fees_transcript");
       
        $this->db->where('YEAR(tbl_transcript.created_on)',date("Y"));
        $this->db->where('tbl_transcript.is_deleted','0');
        $this->db->where('tbl_transcript.payment_status','1');
        $result_student_transcript_yearly  = $this->db->get('tbl_transcript');
        $result_student_transcript_yearly = $result_student_transcript_yearly->row();
       
		$result = $result_student_fee_yearly->total_fees+$result_student_migration_yearly->total_fees_migration+$result_student_provisional_yearly->total_fees_provisinal+$result_student_transfer_yearly->total_fees_transfer+$result_student_degree_yearly->total_fees_degree+ $result_student_transcript_yearly->total_fees_transcript;
		return $result;


	 }

	 public function get_separate_student_total_amount(){
		
		$this->db->select("SUM(fees) as total_fees_separate_student");
        $this->db->where('YEAR(tbl_separate_student_fees.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_fees.is_deleted','0');
        $result_student_separate_fee = $this->db->get('tbl_separate_student_fees');
        $result_student_separate_fee = $result_student_separate_fee->row();
      
        $this->db->select("SUM(amount) as total_fees_separate_migration");
        $this->db->where('YEAR(tbl_separate_student_migration.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_migration.is_deleted','0');
        $this->db->where('tbl_separate_student_migration.payment_status','1');
        
        $result_student_separate_migration  = $this->db->get('tbl_separate_student_migration');
        $result_student_separate_migration = $result_student_separate_migration->row();

        $this->db->select("SUM(amount) as total_fees_separate_provisional");
        $this->db->where('YEAR(tbl_separate_student_provisional_degree.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_provisional_degree.is_deleted','0');
        $this->db->where('tbl_separate_student_provisional_degree.payment_status','1');
    	$result_student_separate_provisional  = $this->db->get('tbl_separate_student_provisional_degree');
        $result_student_separate_provisional = $result_student_separate_provisional->row();

        $this->db->select("SUM(amount) as total_fees_separate_transfer");
        $this->db->where('YEAR(tbl_separate_student_transfer.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_transfer.is_deleted','0');
        $this->db->where('tbl_separate_student_transfer.payment_status','1');
     
        $tbl_separate_student_transfer  = $this->db->get('tbl_separate_student_transfer');
        $tbl_separate_student_transfer = $tbl_separate_student_transfer->row();
		
        $this->db->select("SUM(amount) as total_fees_separate_degree");
        $this->db->where('YEAR(tbl_separate_student_degree.created_on)',date("Y"));
        $this->db->where('tbl_separate_student_degree.is_deleted','0');
        $this->db->where('tbl_separate_student_degree.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_degree.student_id');
        $result_separate_student_degree  = $this->db->get('tbl_separate_student_degree');
        $result_separate_student_degree = $result_separate_student_degree->row();
				
        $this->db->select("SUM(amount) as total_fees_separate_transcript");
        $this->db->where('YEAR(tbl_separate_transcript.payment_date)',date("Y"));
        $this->db->where('tbl_separate_transcript.is_deleted','0');
        $this->db->where('tbl_separate_transcript.payment_status','1');
        $this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_transcript.registration_id');
        $result_separate_student_transcript  = $this->db->get('tbl_separate_transcript');
        $result_separate_student_transcript = $result_separate_student_transcript->row();
        
		$result = $result_student_separate_fee->total_fees_separate_student + $result_student_separate_migration->total_fees_separate_migration+$result_student_separate_provisional->total_fees_separate_provisional+$tbl_separate_student_transfer->total_fees_separate_transfer+$result_separate_student_degree->total_fees_separate_degree+$result_separate_student_transcript->total_fees_separate_transcript;
		return $result;
	 }
	 public function get_active_course(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->order_by('course_name','ASC');
		$result = $this->db->get('tbl_course');
		return $result->result();
	}
	public function get_active_stream(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->order_by('stream_name','ASC');
		$result = $this->db->get('tbl_stream');
		return $result->result();
	}
	public function get_active_subject(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->order_by('subject_name','ASC');
		$result = $this->db->get('tbl_subject');
		return $result->result();
	}
	public function insert_paper_data($photo){
		if($photo != ""){
			if(file_exists("uploads/papers/".$this->input->post('old_file'))){
				unlink("uploads/papers/".$this->input->post('old_file'));
			}
			}	
			if($photo == ""){
	
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
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_papers',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_papers',$data);
			return 1;
		}
	}
	public function get_all_papers_ajax_count($search){
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted','0');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('file',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream','tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_papers.course_id ');
		$this->db->join('tbl_subject','tbl_subject.id = tbl_papers.subject_id ');
		$this->db->group_by('tbl_papers.stream_id');
	
		$result = $this->db->get('tbl_papers');
		return $result->num_rows();
	}

	public function get_all_papers_ajax($length,$start,$search){
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted','0');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('file',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream','tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_papers.course_id ');
		$this->db->join('tbl_subject','tbl_subject.id = tbl_papers.subject_id ');
		$this->db->group_by('tbl_papers.stream_id');
		$this->db->order_by('tbl_papers.course_id','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_papers');
		return $result->result();		
	}
	public function get_single_paper(){
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted','0');
		$this->db->where('tbl_papers.id',$this->uri->segment(2));
		$this->db->join('tbl_stream','tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_papers.course_id ');
		$this->db->join('tbl_subject','tbl_subject.id = tbl_papers.subject_id ');
		$result = $this->db->get('tbl_papers');
		return $result->row();

	}
	public function get_stream_name_course(){
		$this->db->select('tbl_course_stream_relation.course,tbl_course_stream_relation.stream,tbl_stream.id,tbl_stream.stream_name');
		$this->db->where('tbl_course_stream_relation.course',$this->input->post('course'));
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		echo json_encode($result->result());

	}
	public function get_subject_name_stream(){
		$this->db->select('subject_name,id');
		$this->db->where('stream',$this->input->post('stream'));
		$result = $this->db->get('tbl_subject');
		echo json_encode($result->result());

	}
	public function get_my_self_assesment(){
		$this->db->select('tbl_self_assesments.*,tbl_student.student_name');
		$this->db->where('tbl_self_assesments.is_deleted','0');
		$this->db->where('tbl_self_assesments.status','1'); 
		$this->db->join('tbl_student','tbl_student.id = tbl_self_assesments.student_id');
		$this->db->order_by('tbl_self_assesments.id','DESC'); 
		$result = $this->db->get('tbl_self_assesments');
		return $result->result();
	}
	public function get_my_teacher_assesment(){
		$this->db->select('tbl_teacher_assesments.*,tbl_student.student_name');
		$this->db->where('tbl_teacher_assesments.is_deleted','0');
		$this->db->where('tbl_teacher_assesments.status','1'); 
		$this->db->join('tbl_student','tbl_student.id = tbl_teacher_assesments.student_id');
		$this->db->order_by('tbl_teacher_assesments.id','DESC'); 
		$result = $this->db->get('tbl_teacher_assesments');
		return $result->result();
	}
	public function get_assignment(){
		$this->db->select('tbl_assignment.*,tbl_student.student_name');
		$this->db->where('tbl_assignment.is_deleted','0');
		$this->db->where('tbl_assignment.status','1'); 
		$this->db->join('tbl_student','tbl_student.id = tbl_assignment.student_id');
		$this->db->order_by('tbl_assignment.id','DESC'); 
		$result = $this->db->get('tbl_assignment');
		return $result->result();
	 }
	 public function get_my_self_assesment_separate(){
		$this->db->select('tbl_separate_student_self_assesments.*,tbl_student.student_name');
		$this->db->where('tbl_separate_student_self_assesments.is_deleted','0');
		$this->db->where('tbl_separate_student_self_assesments.status','1'); 
		$this->db->join('tbl_student','tbl_student.id = tbl_separate_student_self_assesments.separate_student_id	');
		$this->db->order_by('tbl_separate_student_self_assesments.id','DESC'); 
		$result = $this->db->get('tbl_separate_student_self_assesments');
		return $result->result();
	 }
	 public function get_my_teacher_assesment_separate(){
		$this->db->select('tbl_teacher_assesments_separate_student.*,tbl_student.student_name');
		$this->db->where('tbl_teacher_assesments_separate_student.is_deleted','0');
		$this->db->where('tbl_teacher_assesments_separate_student.status','1'); 
		$this->db->join('tbl_student','tbl_student.id = tbl_teacher_assesments_separate_student.seperate_student_id	');
		$this->db->order_by('tbl_teacher_assesments_separate_student.id','DESC'); 
		$result = $this->db->get('tbl_teacher_assesments_separate_student');
		return $result->result();
	 }
	 public function get_assignment_separate(){
		$this->db->select('tbl_assignment_separate_student.*,tbl_student.student_name');
		$this->db->where('tbl_assignment_separate_student.is_deleted','0');
		$this->db->where('tbl_assignment_separate_student.status','1'); 
		$this->db->join('tbl_student','tbl_student.id = tbl_assignment_separate_student.seperate_student_id	');
		$this->db->order_by('tbl_assignment_separate_student.id','DESC'); 
		$result = $this->db->get('tbl_assignment_separate_student');
		return $result->result();
	}
	public function get_all_pr_list($length,$start,$search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('name',$search);   
			$this->db->or_like('mobile_number',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('course',$search);
			$this->db->or_like('pay_for',$search);
			$this->db->or_like('date_of_payment',$search);
			$this->db->or_like('amount',$search);
			$this->db->or_like('payment_mode',$search);
			$this->db->or_like('transaction_id',$search);
			$this->db->or_like('collected_by',$search);
			$this->db->or_like('registration_id',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_generate_payment_receipt');
		return $result->result();		
	}
	public function get_all_pr_list_count($search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('name',$search);   
			$this->db->or_like('mobile_number',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('course',$search);
			$this->db->or_like('pay_for',$search);
			$this->db->or_like('date_of_payment',$search);
			$this->db->or_like('amount',$search);
			$this->db->or_like('payment_mode',$search);
			$this->db->or_like('transaction_id',$search);
			$this->db->or_like('collected_by',$search);
			$this->db->or_like('registration_id',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_generate_payment_receipt');
		return $result->num_rows();
	}
	public function get_dashboard_log(){
		$this->db->select('tbl_log.*,tbl_employees.employee_code,tbl_employees.employee_code,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->join('tbl_employees','tbl_employees.id = tbl_log.user_id');
		$this->db->order_by('id','DESC');
		$this->db->limit(10);
		$result = $this->db->get('tbl_log');
		return $result->result();
	}
	public function get_all_log(){
		$this->db->select('tbl_log.*,tbl_employees.employee_code,tbl_employees.employee_code,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->join('tbl_employees','tbl_employees.id = tbl_log.user_id');
		$this->db->where('tbl_log.is_deleted','0');
		$this->db->order_by('id','DESC');
		$this->db->limit(10);
		$result = $this->db->get('tbl_log');
		return $result->result();
	}
	public function get_all_logs($length,$start,$search){
		$this->db->select('tbl_log.*,tbl_employees.employee_code,tbl_employees.employee_code,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->where('tbl_log.is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_employees.first_name',$search);   
			$this->db->or_like('tbl_employees.last_name',$search);   
			$this->db->or_like('tbl_employees.employee_code',$search);
			$this->db->or_like('tbl_log.description',$search); 
			$this->db->group_end();
		}
		$this->db->join('tbl_employees','tbl_employees.id = tbl_log.user_id');
		$this->db->order_by('tbl_log.id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_log');
		return $result->result();		
	}
	public function get_all_logs_count($search){
		$this->db->select('tbl_log.*,tbl_employees.employee_code,tbl_employees.employee_code,tbl_employees.first_name,tbl_employees.last_name');
		$this->db->where('tbl_log.is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_employees.first_name',$search);   
			$this->db->or_like('tbl_employees.last_name',$search);   
			$this->db->or_like('tbl_employees.employee_code',$search);
			$this->db->or_like('tbl_log.description',$search); 
			$this->db->group_end();
		}
		$this->db->join('tbl_employees','tbl_employees.id = tbl_log.user_id');
		$this->db->order_by('tbl_log.id','DESC');
		$result = $this->db->get('tbl_log');
		return $result->num_rows();
	}
	public function get_active_session(){
		$this->db->where('is_deleted','0');
		//$this->db->where('status','1');
		$this->db->order_by('session_name','ASC');
		$result = $this->db->get('tbl_session');
		return $result->result();
	}
	public function get_selected_course_mode($course_id,$stream_id){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$course_id);
		$this->db->where('stream',$stream_id);
		$result = $this->db->get('tbl_course_stream_relation');
		$result = $result->row();
		return $result;
	}
	public function get_selected_year_sem($course_id,$stream_id,$course_mode){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$course_id);
		$this->db->where('stream',$stream_id);
		$result = $this->db->get('tbl_course_stream_relation');
		$result = $result->row();
		return $result;
	}
	public function insert_enquiry_lead(){
		$data = array(
			'name' 			=> $this->input->post('name'),
			'email' 		=> $this->input->post('email'),
			'mobile_number' => $this->input->post('mobile_number'),
			'course_name' 	=> $this->input->post('course_name'),
			'description' 	=> $this->input->post('description'),
			'date' 			=> date("Y-m-d",strtotime($this->input->post('date'))),	
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_enquiry_lead',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_enquiry_lead',$data);
			return 1;
		}
	}
	public function get_all_lead_ajx_count($search){
		$this->db->where('tbl_enquiry_lead.is_deleted','0');
	
		if($search !=""){
			$this->db->group_start();
			$this->db->group_start();
			$this->db->or_like('tbl_enquiry_lead.name',$search);
			$this->db->or_like('tbl_enquiry_lead.email',$search);
			$this->db->or_like('tbl_enquiry_lead.mobile_number',$search);
		
			$this->db->or_like('tbl_enquiry_lead.course_name',$search);
			$this->db->or_like('tbl_enquiry_lead.date',$search);
			$this->db->or_like('tbl_enquiry_lead.description',$search);
			$this->db->or_like('file',$search);
			$this->db->group_end();
		}
			$result = $this->db->get('tbl_enquiry_lead');
		return $result->num_rows();
	}

	public function get_all_lead_ajx($length,$start,$search){
		$this->db->where('tbl_enquiry_lead.is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_enquiry_lead.name',$search);
			$this->db->or_like('tbl_enquiry_lead.email',$search);
			$this->db->or_like('tbl_enquiry_lead.mobile_number',$search);
			$this->db->or_like('tbl_enquiry_lead.date',$search);
			$this->db->or_like('tbl_enquiry_lead.course_name',$search);
			$this->db->or_like('tbl_enquiry_lead.description',$search);
			$this->db->or_like('file',$search);
			$this->db->group_end();
		}
		//$this->db->order_by('tbl_enquiry_lead.id','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_enquiry_lead');
		return $result->result();		
	}
	public function get_single_lead(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_enquiry_lead');
		return $result->row();
	}
	
	public function get_paper_session($session_id){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$session_id);
		//$this->db->where('status','1');
		$result = $this->db->get('tbl_session');
		$result = $result->row();
		$session = '';
		if(!empty($result)){
			$session = $result->session_name;
		}
		return $session;
	}

	public function get_all_paper_ajax_course_wise_count($search,$uri){
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted','0');
		$this->db->where('tbl_papers.stream_id',$uri);
		if($search !=""){
			$this->db->group_start();
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('file',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream','tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_papers.course_id ');
		$this->db->join('tbl_subject','tbl_subject.id = tbl_papers.subject_id ');
		$result = $this->db->get('tbl_papers');
		return $result->num_rows();
	}

	public function get_all_paper_ajax_course_wise($length,$start,$search,$uri){
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name,tbl_subject.subject_name');
		$this->db->where('tbl_papers.is_deleted','0');
		$this->db->where('tbl_papers.stream_id',$uri);		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('file',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_stream','tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_papers.course_id ');
		$this->db->join('tbl_subject','tbl_subject.id = tbl_papers.subject_id ');		
		$this->db->order_by('tbl_papers.course_id','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_papers');
		return $result->result();
	}
	public function get_single_stream_name(){
		$this->db->select('tbl_papers.*,tbl_stream.stream_name,tbl_course.course_name');
		$this->db->where('tbl_papers.is_deleted','0');
		$this->db->where('tbl_papers.stream_id',$this->uri->segment(2));
		$this->db->join('tbl_stream','tbl_stream.id = tbl_papers.stream_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_papers.course_id ');
		$result = $this->db->get('tbl_papers');
		return $result->row();
	}
}


	
