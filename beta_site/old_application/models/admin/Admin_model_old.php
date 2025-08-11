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
			$this->email->subject('New Password | THE GLOBAL UNIVERSITY'); 
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
		$this->db->select('student_id');
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
		}
		return true;
	}
} 