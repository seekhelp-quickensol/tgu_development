<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Faculty_model extends CI_Model { 
    
    
	public function get_all_staff_faculty($length,$start,$search){
		$this->db->select("tbl_staff_faculty.*,tbl_stream.stream_name,tbl_course.course_name");
		$this->db->where('tbl_staff_faculty.is_deleted','0');
		$this->db->where('tbl_staff_faculty.is_left','0');
		//$this->db->where('state_id',$this->input->post('state_id'));
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->or_like('tbl_staff_faculty.email',$search);
			$this->db->or_like('tbl_staff_faculty.mobile_number',$search);
			$this->db->or_like('tbl_staff_faculty.address',$search);
			$this->db->or_like('tbl_staff_faculty.family_contact_number',$search);
			$this->db->or_like('tbl_staff_faculty.adharcard_number',$search);
			$this->db->or_like('tbl_staff_faculty.adhar_file',$search);
			$this->db->or_like('tbl_staff_faculty.photo',$search);
			$this->db->or_like('tbl_staff_faculty.state',$search);
			$this->db->or_like('tbl_staff_faculty.city',$search);
			$this->db->or_like('tbl_staff_faculty.pincode',$search);
			$this->db->group_end();
		}

		$this->db->join("tbl_stream","tbl_stream.id = tbl_staff_faculty.stream_id");
		$this->db->join("tbl_course","tbl_course.id = tbl_staff_faculty.course_id");
		//$this->db->join("states","states.id = tbl_staff_faculty.state");
		//$this->db->join("cities","cities.state_id = tbl_staff_faculty.state");
		//$this->db->join("tbl_subject","tbl_subject.id = tbl_staff_faculty.subject_id");

		$this->db->order_by('tbl_staff_faculty.id','DESC');
		$this->db->limit($length,$start); 
		$result = $this->db->get('tbl_staff_faculty');
		return $result->result();		
	}
	public function get_all_staff_faculty_count($search){
		$this->db->select("tbl_staff_faculty.*,tbl_stream.stream_name,tbl_course.course_name");
		$this->db->where('tbl_staff_faculty.is_deleted','0');
		$this->db->where('tbl_staff_faculty.is_left','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->or_like('tbl_staff_faculty.email',$search);
			$this->db->or_like('tbl_staff_faculty.mobile_number',$search);
			$this->db->or_like('tbl_staff_faculty.address',$search);
			$this->db->or_like('tbl_staff_faculty.family_contact_number',$search);
			$this->db->or_like('tbl_staff_faculty.adharcard_number',$search);
			$this->db->or_like('tbl_staff_faculty.adhar_file',$search);
			$this->db->or_like('tbl_staff_faculty.photo',$search);
			$this->db->or_like('tbl_staff_faculty.state',$search);
			$this->db->or_like('tbl_staff_faculty.city',$search);
			$this->db->or_like('tbl_staff_faculty.pincode',$search);
			$this->db->group_end();
		}

		$this->db->join("tbl_stream","tbl_stream.id = tbl_staff_faculty.stream_id");
		$this->db->join("tbl_course","tbl_course.id = tbl_staff_faculty.course_id");
		//$this->db->join("tbl_subject","tbl_subject.id = tbl_staff_faculty.subject_id");
		
		$result = $this->db->get('tbl_staff_faculty');
		return $result->num_rows();
	}		
	public function get_staff_faculty_subject($subject_id){
		$this->db->select('subject_name');
		$this->db->where('is_deleted','0');
		$this->db->where('id',$subject_id);
		$result = $this->db->get('tbl_subject');
		$result = $result->row();
		$subject_name = "";
		if(!empty($result)){
			$subject_name = $result->subject_name;
		}
		return $subject_name;
	}
	public function get_staff_faculty_state($state){
		$this->db->select('name');
		$this->db->where('country_id','101');
		$this->db->where('id',$state);
		$result = $this->db->get('states');
		$result = $result->row();
		$name = "";
		if(!empty($result)){
			$name = $result->name;
		}
		return $name;
	}
	public function get_staff_faculty_city($city){
		$this->db->select('name');
		$this->db->where('id',$city);
		$result = $this->db->get('cities');
		$result = $result->row();
		$name = "";
		if(!empty($result)){
			$name = $result->name;
		}
		return $name;
	}

	public function get_all_left_staff_faculty($length,$start,$search){
		$this->db->where('is_deleted','0');
		$this->db->where('is_left','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('first_name',$search);
			$this->db->or_like('last_name',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('mobile_number',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start); 
		$result = $this->db->get('tbl_staff_faculty');
		return $result->result();		
	}
	public function get_all_left_staff_faculty_count($search){
		$this->db->where('is_deleted','0');
		$this->db->where('is_left','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('first_name',$search);
			$this->db->or_like('last_name',$search);
			$this->db->or_like('email',$search);
			$this->db->or_like('mobile_number',$search);
			$this->db->group_end();
		} 
		$result = $this->db->get('tbl_staff_faculty');
		return $result->num_rows();
	}
	
	public function faculty_left(){
		$data = [
			'is_left'	=> '1',
		];
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_staff_faculty', $data);
	} 

	public function faculty_not_left(){
		$data = [
			'is_left'	=> '0',
		];
		$this->db->where('id', $this->uri->segment(2));
		$this->db->update('tbl_staff_faculty', $data);
	} 
	

	public function get_unique_staff_faculty_email(){
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('id !=',$this->input->post('id'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_staff_faculty');
		echo $result->num_rows();	
	} 
	public function get_unique_staff_faculty_mobile_number(){
		$this->db->where('mobile_number',$this->input->post('mobile_number'));
		$this->db->where('id !=',$this->input->post('id'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_staff_faculty');
		echo $result->num_rows();
	}	
	public function set_staff_faculty($image,$adhacard){
		 if($image == ""){
			$image = $this->input->post('photo');
		}
		if($adhacard == ""){
		    $adhacard = $this->input->post("adhar_file");
		} 
		$data = array(
			'first_name' 	=> $this->input->post('first_name'),
			'last_name' 	=> $this->input->post('last_name'),
			'email' 		=> $this->input->post('email'),
			'mobile_number' => $this->input->post('mobile_number'),
			'address' 		=> $this->input->post('address'),
			'family_contact_number' => $this->input->post('family_contact_number'),
			'adharcard_number' 	=> $this->input->post('adharcard_number'),
			'user_type' 	=> $this->input->post('user_type'),
			'join_date' 	=> date("Y-m-d",strtotime($this->input->post('join_date'))),
			'exit_date' 	=> $this->input->post('exit_date'),
			'course_id'     => $this->input->post("course"),
			'stream_id'     => $this->input->post("stream"),
			'subject_id'    => $this->input->post("subject"),
			'photo'         => $image,
			'adhar_file'    => $adhacard,
		);
		if($this->input->post('id') == ""){
			$date = array(
				'password' 		=> $this->input->post('password'),
				'created_on' 	=> date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_staff_faculty',$new_arr);
			
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE; 
			$this->email->initialize($config);

			$this->email->from(no_reply_mail);
			$this->email->to($this->input->post('email'));
			// $this->email->bcc('techwebsolutions11@gmail.com');
			$this->email->subject('Login Details | '. no_reply_name); 
			$this->email->set_mailtype('html');
			$message = "Dear ".$this->input->post('first_name').",<br> below are the login details to continue.<br>";
			
			$message .= "<br>URL: ".base_url()."faculty_login";
			$message .= "<br>Username: ".$this->input->post('email');
			$message .= "<br>Password: ".$this->input->post('password');
			$message .="<br>Regards,<br>IT Team";
			$this->email->message($message); 
			if($this->email->send()){  
			}else{ 
			}
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_staff_faculty',$data);
			return 1;
		}
	}
	public function get_faculty_document(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_staff_faculty');
		return $result->row();
	}
	public function delete_faculty_document(){
		$this->db->where('id',$this->uri->segment(2));
  		$file = $this->db->get('tbl_staff_faculty');
  		$file = $file->row();
  		if(!empty($file) && file_exists("images/faculty_staff/photo/".$file->adhar_file)){
			unlink("images/faculty_staff/document/".$file->adhar_file);
		}
		$data = array(
					 'adhar_file' => '',
		);
		$this->db->where('id',$this->uri->segment(2));
  		$this->db->update('tbl_staff_faculty', $data);
  		return true;
  		
	}
	public function delete_faculty_document_image(){
		$this->db->where('id',$this->uri->segment(2));
  		$file = $this->db->get('tbl_staff_faculty');
  		$file = $file->row();
  		if(!empty($file) && file_exists("images/faculty_staff/photo/".$file->photo)){
			unlink("images/faculty_staff/photo/".$file->photo);
		} 
		$data = array(
					 'photo' => '',
		);
		$this->db->where('id',$this->uri->segment(2));
  		$this->db->update('tbl_staff_faculty', $data);
  		return true;
  		
	}
	public function get_single_faculty_staff(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_staff_faculty');
		return $result->row();
	}
	public function login(){
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('password',$this->input->post('password'));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('is_left','0');
		$result = $this->db->get('tbl_staff_faculty');
		$result = $result->row();
		if(!empty($result)){
			$data = array(
				'faculty_id' => $result->id,
				'user_type' => $result->user_type,
			);
			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
	}
	public function get_profile(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->session->userdata('faculty_id'));
		$result = $this->db->get('tbl_staff_faculty');
		return $result->row();
	}
	public function get_old_paasword_faculty(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->session->userdata('faculty_id'));
		$this->db->where('password',$this->input->post('old_password'));
		$result = $this->db->get('tbl_staff_faculty');
		echo $result->num_rows();
	}
	public function set_password(){
		$data = array(
			'password' => $this->input->post('new_password')
		);
		$this->db->where('id',$this->session->userdata('faculty_id'));
		$this->db->update('tbl_staff_faculty',$data);
		return true;
	}
	public function set_profile($file,$adhar){
		//$faculty_id = $this->session->userdata('faculty_id');
	    if($file == ""){
			$file = $this->input->post('photo');
		}
		if($adhar == ""){
		    $adhar = $this->input->post("adhar_file");
		} 
		$data = array(
			'first_name' 		      => $this->input->post('first_name'),
			'last_name' 		      => $this->input->post('last_name'),
			'alternate_number' 		  => $this->input->post('alternate_number'),
			'address' 				  => $this->input->post('address'),
			'email'             	  => $this->input->post('email'),
			'family_contact_number'   => $this->input->post('family_contact_number'),
			'adharcard_number'        => $this->input->post('adharcard_number'),
			'state'                   => $this->input->post('state'),
			'city'                    => $this->input->post('city'),
			'pincode'				  => $this->input->post('pincode'),
			'photo'                   => $file,
			'adhar_file'			  => $adhar,

		);

		$this->db->where('id',$this->session->userdata('faculty_id'));
		$this->db->update('tbl_staff_faculty',$data);
		return true;
	}
	public function get_india_state(){
		$this->db->where('country_id','101');
		$result = $this->db->get('states');
		return $result->result();
	}
	public function get_selected_state_city(){
		$this->db->where('state_id',$this->input->post('state_id'));		
		$result = $this->db->get('cities');
		echo json_encode($result->result());
	} 	
	public function get_selected_city($state){
		$this->db->where('state_id',$state);		
		$result = $this->db->get('cities');
		return $result->result();
	} 
	public function forgot_password(){
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$result = $this->db->get('tbl_staff_faculty');
		$result = $result->row();
		$password = rand();
		if(!empty($result)){
			$data = array(
				'password' => $password
			);			
			$this->db->where('id',$result->id);
			$this->db->update('tbl_staff_faculty',$data);
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE; 
			$this->email->initialize($config);

			$this->email->from(no_reply_mail);
			$this->email->to($result->email);
			$this->email->subject('New Password | '. no_reply_name); 
			$this->email->set_mailtype('html');
			$message = "Dear ".$result->first_name.",<br> below are the login details to continue.<br>";
			
			$message .= "<br>URL: ".base_url()."faculty_login";
			$message .= "<br>Username: ".$result->email;
			$message .= "<br>Password: ".$password;
			$message .="<br>Regards,<br>IT Team";
			$this->email->message($message); 
			if($this->email->send()){  
			}else{ 
			}	
			return true;
		}else{
			return false;
		}
	}
	public function set_daily_report(){
		$data = array(
			'faculty_id' 	=> $this->session->userdata('faculty_id'),
			'date' 			=> date("d/m/Y",strtotime($this->input->post('date'))),
			'details' 		=> $this->input->post('content'),
			'present_student' => $this->input->post('present_student'),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_faculty_report',$data);
		return true;
	} 
	public function get_all_my_daily_report($length,$start,$search){
		$this->db->where('is_deleted','0'); 
		$this->db->where('faculty_id',$this->session->userdata('faculty_id')); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('created_on',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_faculty_report');
		return $result->result();
	}
	public function get_all_my_daily_report_count($search){
		$this->db->where('is_deleted','0'); 
		$this->db->where('faculty_id',$this->session->userdata('faculty_id'));
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('created_on',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_faculty_report');
		return $result->num_rows();
	}
	public function get_all_new_daily_report($length,$start,$search){
		$this->db->select('tbl_faculty_report.*,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name');
		$this->db->where('tbl_faculty_report.is_deleted','0'); 
		$this->db->where('tbl_faculty_report.approved_status','0'); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('tbl_faculty_report.id','DESC');
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_faculty_report.faculty_id');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_faculty_report');
		return $result->result();
	}
	public function get_all_new_daily_report_count($search){
		$this->db->select('tbl_faculty_report.*,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name');
		$this->db->where('tbl_faculty_report.is_deleted','0'); 
		$this->db->where('tbl_faculty_report.approved_status','0'); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('tbl_faculty_report.id','DESC');
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_faculty_report.faculty_id');
		$result = $this->db->get('tbl_faculty_report');
		return $result->num_rows();
	}
	public function get_today_daily_report($length,$start,$search){
		$this->db->select('tbl_faculty_report.*,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name');
		$this->db->where('tbl_faculty_report.is_deleted','0'); 
		$this->db->where('Date(tbl_faculty_report.created_on)',date("Y-m-d"));  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('tbl_faculty_report.id','DESC');
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_faculty_report.faculty_id');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_faculty_report');
		return $result->result();
	}
	public function get_today_daily_report_count($search){
		$this->db->select('tbl_faculty_report.*,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name');
		$this->db->where('tbl_faculty_report.is_deleted','0'); 
		$this->db->where('Date(tbl_faculty_report.created_on)',date("Y-m-d"));  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->group_end();
		} 
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_faculty_report.faculty_id');
		$result = $this->db->get('tbl_faculty_report');
		return $result->num_rows();
	}
	public function get_single_daily_report(){
		$this->db->where('is_deleted','0');
		$this->db->where('approved_status','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_faculty_report');
		return $result->row();
	}
	public function set_update_daily_report(){
		$data = array(
			'approved_status' 	=> $this->input->post('status'),
			'approved_by' 		=> $this->session->userdata('faculty_id'),
			'remark'	 		=> $this->input->post('content'),
			'approved_date'	 	=> date("d/m/Y"),
		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tbl_faculty_report',$data);
		return true;
	}
	public function get_all_daily_report($length,$start,$search){
		$this->db->select('tbl_faculty_report.*,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name'); 
		$this->db->where('tbl_faculty_report.is_deleted','0'); 
// 		$this->db->where('tbl_faculty_report.approved_status !=','0');  
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(tbl_faculty_report.created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(tbl_faculty_report.created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('tbl_faculty_report.id','DESC');
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_faculty_report.faculty_id');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_faculty_report');
		return $result->result();
	}
	public function get_all_daily_report_count($search){ 
		$this->db->select('tbl_faculty_report.*,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name'); 
		$this->db->where('tbl_faculty_report.is_deleted','0');  
// 		$this->db->where('tbl_faculty_report.approved_status !=','0');  
		if($this->input->post('start_date')!=""){
			$this->db->where('Date(tbl_faculty_report.created_on) >=',date("Y-m-d",strtotime($this->input->post('start_date'))));  
		}
		if($this->input->post('end_date')!=""){
			$this->db->where('Date(tbl_faculty_report.created_on) <=',date("Y-m-d",strtotime($this->input->post('end_date'))));  
		}
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_faculty_report.faculty_id'); 
		$result = $this->db->get('tbl_faculty_report');
		return $result->num_rows();
	}
	public function set_register($fileName){ 
		if($fileName ==""){
			$fileName = $this->input->post('old_syllabus');
		}
		$data = array(
			'staff_id' 		=> $this->session->userdata('faculty_id'),
			'register_name' => $this->input->post('register_name'), 
			'course' 		=> $this->input->post('course'), 
			'stream' 		=> $this->input->post('stream'), 
			'subject_name' 	=> $this->input->post('subject_name'), 
			'mode_of_study' => $this->input->post('mode_of_study'), 
			'year_sem' 		=> $this->input->post('year_sem'), 
			'syllabus'		=> $fileName
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_staff_register',$new_arr);
			$id = $this->db->insert_id();
			$return = 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_staff_register',$data);
			$id = $this->input->post('id');
			$return = 1;
		}
		$student_name = $this->input->post('student_name');
		$contact_number = $this->input->post('contact_number');
		if(!empty($student_name)){
			$register = array();
			for($i=0;$i<count($student_name);$i++){
				$register[] = array(
					'register_id' 		=> $id,
					'student_name' 		=> $student_name[$i],
					'contact_number' 	=> $contact_number[$i],
					'created_on'		=> date("Y-m-d H:i:S")
				);
			}
			$this->db->insert_batch('tbl_staff_register_student',$register);
		}
		return $return;
	}
	public function set_update_register(){ 
		$student_name = $this->input->post('student_name');
		$contact_number = $this->input->post('contact_number'); 
		if($this->input->post('id') == ""){
			$register = array();
			for($i=0;$i<count($student_name);$i++){
				$register[] = array(
					'register_id' 		=> $this->input->post('register_name'),
					'student_name' 		=> $student_name[$i],
					'contact_number' 	=> $contact_number[$i],
					'created_on'		=> date("Y-m-d H:i:S")
				);
			}
			$this->db->insert_batch('tbl_staff_register_student',$register); 			
			return 0;
		}else{
			$register = array(
				'student_name' 		=> $this->input->post('student_name'),
				'contact_number' 	=> $this->input->post('contact_number'), 
			);
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_staff_register_student',$register);
			return 1;
		} 
	}
	public function get_single_register(){
		$this->db->where('id',$this->uri->segment(2));
		$this->db->where('staff_id',$this->session->userdata('faculty_id'));
		$result = $this->db->get('tbl_staff_register');
		return $result->row();
	}
	public function get_single_register_student(){
		$this->db->where('id',$this->uri->segment(3));
		$this->db->where('register_id',$this->uri->segment(2));
		$result = $this->db->get('tbl_staff_register_student');
		return $result->row();
	}
	public function get_my_register_ajax($length,$start,$search){
		$this->db->select('tbl_staff_register.*,tbl_course.course_name');
		$this->db->where('tbl_staff_register.is_deleted','0'); 
		$this->db->where('tbl_staff_register.staff_id',$this->session->userdata('faculty_id'));  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_staff_register.register_name',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('tbl_staff_register.id','DESC');
		$this->db->join('tbl_course','tbl_course.id = tbl_staff_register.course');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_staff_register');
		return $result->result();
	}
	public function get_my_register_ajax_count($search){
		$this->db->select('tbl_staff_register.*,tbl_course.course_name');
		$this->db->where('tbl_staff_register.is_deleted','0');  
		$this->db->where('tbl_staff_register.staff_id',$this->session->userdata('faculty_id'));  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_staff_register.register_name',$search);
			$this->db->group_end();
		} 
		$this->db->join('tbl_course','tbl_course.id = tbl_staff_register.course');
		$result = $this->db->get('tbl_staff_register');
		return $result->num_rows();
	}
	public function get_all_register_ajax($length,$start,$search){
		$this->db->select('tbl_staff_register.*,tbl_course.course_name,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name');
		$this->db->where('tbl_staff_register.is_deleted','0'); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_staff_register.register_name',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('tbl_staff_register.id','DESC');
		$this->db->join('tbl_course','tbl_course.id = tbl_staff_register.course');
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_staff_register.staff_id');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_staff_register');
		return $result->result();
	}
	public function get_all_register_ajax_count($search){
		$this->db->select('tbl_staff_register.*,tbl_course.course_name,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name');
		$this->db->where('tbl_staff_register.is_deleted','0');  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_staff_register.register_name',$search);
			$this->db->group_end();
		} 
		$this->db->join('tbl_course','tbl_course.id = tbl_staff_register.course');
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_staff_register.staff_id');
		$result = $this->db->get('tbl_staff_register');
		return $result->num_rows();
	}
	public function get_single_register_details(){
		$this->db->where('is_deleted','0');  
		$this->db->where('id',$this->uri->segment(2));  
		//$this->db->where('staff_id',$this->session->userdata('faculty_id'));  
		$result = $this->db->get('tbl_staff_register');
		return $result->row();
	}
	public function get_single_register_student_details($register){
		$this->db->where('is_deleted','0');
		$this->db->where('register_id',$register);
		$this->db->order_by('student_name','ASC');
		$result = $this->db->get('tbl_staff_register_student');
		return $result->result();
	}
	
	public function get_my_single_register(){
		$this->db->where('is_deleted','0');  
		$this->db->where('id',$this->uri->segment(2));  
		$this->db->where('staff_id',$this->session->userdata('faculty_id'));  
		$result = $this->db->get('tbl_staff_register');
		return $result->row();
	}
	public function get_my_single_register_student($register){
		$this->db->where('is_deleted','0');
		$this->db->where('register_id',$register);
		$this->db->order_by('student_name','ASC');
		$result = $this->db->get('tbl_staff_register_student');
		return $result->result();
	}
	public function set_student_attendance(){
		$student_name = $this->input->post('student_name');
		$student_id = "";
		if(!empty($student_name)){
			for($i=0;$i<count($student_name);$i++){
				$student_id .= $student_name[$i].',';
			} 
			$this->db->where('staff_id',$this->session->userdata('faculty_id'));
			$this->db->where('register_id',$this->input->post('register_name'));
			$this->db->where('date',date("Y-m-d",strtotime($this->input->post('date'))));
			$exist = $this->db->get('tbl_student_attendance');
			$exist = $exist->row();
			$data = array(
				'staff_id' 		=> $this->session->userdata('faculty_id'),
				'register_id' 	=> $this->input->post('register_name'),
				'student_id'	=> $student_id,
			);
			if(!empty($exist)){
				$this->db->where('id',$exist->id);
				$this->db->update('tbl_student_attendance',$data);
				return 1;
			}else{
				$date = array(
					'date'			=> date("Y-m-d",strtotime($this->input->post('date'))),
					'created_on'	=> date("Y-m-d H:i:s")
				);	
				$new_arr = array_merge($data,$date);
				$this->db->insert('tbl_student_attendance',$new_arr);
				return 0;
			}
		}
	}
	public function get_single_student_attendance(){
		$this->db->where('register_id',$this->uri->segment(2));  
		$this->db->where('date',date("Y-m-d",strtotime($this->uri->segment(3))));  
		$this->db->where('staff_id',$this->session->userdata('faculty_id'));  
		$result = $this->db->get('tbl_student_attendance');
		return $result->row();
	}
	public function get_single_student_attendance_admin(){
		$this->db->where('register_id',$this->uri->segment(2));  
		$this->db->where('date',date("Y-m-d",strtotime($this->uri->segment(3))));   
		$result = $this->db->get('tbl_student_attendance');
		return $result->row();
	}
	public function set_syllabus($file){
		if($file == ""){
			$file = $this->input->post('old_file');
		}
		$data = array(
			'staff_id' 		=> $this->session->userdata('faculty_id'),
			'syllabus_name' => $this->input->post('syllabus_name'),
			'description' 	=> $this->input->post('description'),
			'files'			=> $file,
		); 
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_syllabus',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_syllabus',$data);
			return 1;
		}
	}
	public function get_single_syllabus(){
		$this->db->where('id',$this->uri->segment(2));   
		$this->db->where('staff_id',$this->session->userdata('faculty_id'));  
		$result = $this->db->get('tbl_syllabus');
		return $result->row();
	} 
	public function get_my_all_syllabus($length,$start,$search){
		$this->db->where('is_deleted','0');   
		$this->db->where('staff_id',$this->session->userdata('faculty_id'));  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('syllabus_name',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_syllabus');
		return $result->result();
	}
	public function get_my_all_syllabus_count($search){
		$this->db->where('is_deleted','0');  
		$this->db->where('staff_id',$this->session->userdata('faculty_id'));  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('syllabus_name',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_syllabus');
		return $result->num_rows();
	}  
	public function set_feedback(){
		$data = array(
			'feedback' 	 => $this->input->post('feedback'),
			'staff_id'	 => $this->session->userdata('faculty_id'),
			'created_on' => date("Y-m-d H:i:s") 
		);
		$this->db->insert('tbl_feedback',$data);
		return true;
	}
	public function get_my_feed_back(){
		$this->db->where('is_deleted','0');
		$this->db->where('staff_id',$this->session->userdata('faculty_id'));
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_feedback');
		return $result->result();
	}
	public function get_all_feedback_list($length,$start,$search){
		$this->db->select('tbl_staff_faculty.first_name,tbl_staff_faculty.last_name,tbl_feedback.*');
		$this->db->where('tbl_feedback.is_deleted','0');   
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_feedback.staff_id');
		$result = $this->db->get('tbl_feedback');
		return $result->result();
	}
	public function get_all_feedback_list_count($search){
		$this->db->select('tbl_staff_faculty.first_name,tbl_staff_faculty.last_name,tbl_feedback.*');
		$this->db->where('tbl_feedback.is_deleted','0');  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_feedback.staff_id');
		$result = $this->db->get('tbl_feedback');
		return $result->num_rows();
	} 
	public function get_all_waiting_report_list(){
		$this->db->where('tbl_staff_faculty.is_deleted','0');
		$this->db->where('tbl_staff_faculty.status','1');
		$this->db->where('tbl_staff_faculty.user_type','0');
		$faculty_result = $this->db->get('tbl_staff_faculty');
		$faculty_result = $faculty_result->result();
		$main_result = array();
		if(!empty($faculty_result)){
			foreach($faculty_result as $faculty_result_res){
				$this->db->where('faculty_id',$faculty_result_res->id); 
				$this->db->where('tbl_faculty_report.date',date("Y-m-d")); 
				$result = $this->db->get('tbl_faculty_report');
				$result = $result->row();  
				if(empty($result)){
					$main_result[] = $faculty_result_res;
				}
			}
			return $main_result;
		}
	}
	public function send_report_reminder(){
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_staff_faculty');
		$result = $result->row(); 
		$data = array(
			'reminder_date' => date("Y-m-d")
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_staff_faculty',$data);
		
		$this->load->library('email');
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE; 
		$this->email->initialize($config);

		$this->email->from(no_reply_mail);
		$this->email->to($result->email); 
		$this->email->subject('Today work report | '. no_reply_name); 
		$this->email->set_mailtype('html');
		$message = "Dear ".$result->first_name.",<br> Hope you are doing well.<br>"; 
		$message .= "This mail is regarding to inform you that, you did not send today working report. Please submit your daily work report from your login"; 
		$message .="<br>Regards,<br>IT Team";
		$this->email->message($message); 
		if($this->email->send()){  
		}else{ 
		}
	}
	public function get_selected_course_stream($course){
		$this->db->select('tbl_stream.stream_name,tbl_stream.id');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->where('tbl_course_stream_relation.course',$course);
		$this->db->order_by('tbl_stream.stream_name','ASC');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();
	}	
	public function set_faculty_documents($file){
		if($file == ""){
			$file = $this->input->post('old_userfile');
		}
		$data = array(
			'staff_id' 		=> $this->session->userdata('faculty_id'),
			'head' 			=> $this->input->post('head'),
			'file' 			=> $file,
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' 	=> date("Y-m-d H:i:s"),
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_faculty_documents',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_faculty_documents',$data);
			return 1;
		}
	}
	public function set_admin_faculty_documents($file){
		$data = array(
			'staff_id' 		=> $this->input->post('faculty_id'),
			'head' 			=> $this->input->post('head'),
			'file' 			=> $file,
			'created_on' 	=> date("Y-m-d H:i:s"),
		);  
		$this->db->insert('tbl_faculty_documents',$data);
		return 0;
	}
	public function get_single_staff_faculty(){
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_staff_faculty');
		return $result->row();
	}
	public function get_my_faculty_documents($length,$start,$search){
		$this->db->where('is_deleted','0');   
		$this->db->where('staff_id',$this->session->userdata('faculty_id'));  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('head',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_faculty_documents');
		return $result->result();
	}
	public function get_my_faculty_documents_count($search){
		$this->db->where('is_deleted','0');  
		$this->db->where('staff_id',$this->session->userdata('faculty_id'));  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('head',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_faculty_documents');
		return $result->num_rows();
	}  
	public function get_available_documents(){
		$this->db->where('is_deleted','0');
		$this->db->where('staff_id',$this->session->userdata('faculty_id')); 
		$result = $this->db->get('tbl_faculty_documents');
		return $result->row();
	}
	public function get_all_faculty_documents($length,$start,$search){
		$this->db->select('tbl_faculty_documents.*,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name');
		$this->db->where('tbl_faculty_documents.is_deleted','0');   
		$this->db->where('tbl_faculty_documents.staff_id',$this->input->post('staff_id'));   
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_faculty_documents.head',$search);
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_faculty_documents.staff_id');
		$result = $this->db->get('tbl_faculty_documents');
		return $result->result();
	}
	public function get_all_faculty_documents_count($search){
		$this->db->select('tbl_faculty_documents.*,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name');
		$this->db->where('tbl_faculty_documents.is_deleted','0');  
		$this->db->where('tbl_faculty_documents.staff_id',$this->input->post('staff_id'));   
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_faculty_documents.head',$search);
			$this->db->or_like('tbl_staff_faculty.first_name',$search);
			$this->db->or_like('tbl_staff_faculty.last_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_faculty_documents.staff_id');
		$result = $this->db->get('tbl_faculty_documents');
		return $result->num_rows();
	}
	public function set_mcq_question(){ 
		$data = array(
			'added_by' 			=> $this->session->userdata('faculty_id'),
			'added_type' 		=> '1',
			'course_id' 		=> $this->input->post('course'),
			'stream_id' 		=> $this->input->post('stream'),
			'year_sem' 			=> $this->input->post('year_sem'),
			'subject_id' 		=> $this->input->post('subject'),
			'question' 			=> $this->input->post('question'),
			'option_a' 			=> $this->input->post('option_a'),
			'option_b' 			=> $this->input->post('option_b'),
			'option_c' 			=> $this->input->post('option_c'),
			'option_d' 			=> $this->input->post('option_d'),
			'correct_answer' 	=> $this->input->post('correct_answer'),
			'created_on' 		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_mcq_data',$data);
		return true;
	}
	public function insert_batch_mcq_question($data){ 
		$this->db->insert_batch('tbl_mcq_data',$data);
		return true;
	}
	
	public function get_mcq_my_question(){
		$this->db->where('is_deleted','0');
		$this->db->where('added_type','1');
		$this->db->where('course_id',$this->uri->segment(2));
		$this->db->where('stream_id',$this->uri->segment(3));
		$this->db->where('year_sem',$this->uri->segment(4));
		$this->db->where('subject_id',$this->uri->segment(5));
		$this->db->where('added_by',$this->session->userdata('faculty_id'));
		$result = $this->db->get('tbl_mcq_data');
		return $result->result();
	}
	public function get_course_stream_subject_name(){
		$course_name = "";
		$stream_name = "";
		$subject_name = "";
		$this->db->where('id',$this->uri->segment(2));
		$course = $this->db->get('tbl_course');
		$course = $course->row();
		if(!empty($course)){
			$course_name = $course->course_name;
		}
		$this->db->where('id',$this->uri->segment(3));
		$stream = $this->db->get('tbl_stream');
		$stream = $stream->row();
		if(!empty($stream)){
			$stream_name = $stream->stream_name;
		}
		$this->db->where('id',$this->uri->segment(5));
		$subject = $this->db->get('tbl_subject');
		$subject = $subject->row();
		if(!empty($subject)){
			$subject_name = $subject->subject_name;
		}
		return $course_name.'-'.$stream_name.'-'.$this->uri->segment(4).'-'.$subject_name;
	}
	
	public function set_theoretical_questions(){ 
		$data = array(
			'added_by' 			=> $this->session->userdata('faculty_id'),
			'added_type' 		=> '1',
			'course_id' 		=> $this->input->post('course'),
			'stream_id' 		=> $this->input->post('stream'),
			'year_sem' 			=> $this->input->post('year_sem'),
			'subject_id' 		=> $this->input->post('subject'),
			'question' 			=> $this->input->post('question'),
			'created_on' 		=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_theoretical_data',$data);
		return true;
	}

	public function insert_batch_theoretical_questions($data){ 
		$this->db->insert_batch('tbl_theoretical_data',$data);
		return true;
	}
	public function get_theoretical_my_question(){
		if(isset($_GET['course'])){
			$this->db->where('is_deleted','0');
			$this->db->where('added_type','1');
			$this->db->where('course_id',$_GET['course']);
			$this->db->where('stream_id',$_GET['stream']);
			$this->db->where('year_sem',$_GET['year_sem']);
			$this->db->where('subject_id',$_GET['subject']);
			$this->db->where('added_by',$this->session->userdata('faculty_id'));
			$result = $this->db->get('tbl_theoretical_data');
			return $result->result();
		}
	}
	public function get_course_stream_subject_name_theoretical(){
		$course_name = "";
		$stream_name = "";
		$subject_name = "";
		if(isset($_GET['course'])){
			$this->db->where('id',$_GET['course']);
			$course = $this->db->get('tbl_course');
			$course = $course->row();
			if(!empty($course)){
				$course_name = $course->course_name;
			}
			$this->db->where('id',$_GET['stream']);
			$stream = $this->db->get('tbl_stream');
			$stream = $stream->row();
			if(!empty($stream)){
				$stream_name = $stream->stream_name;
			}
			$this->db->where('id',$_GET['subject']);
			$subject = $this->db->get('tbl_subject');
			$subject = $subject->row();
			if(!empty($subject)){
				$subject_name = $subject->subject_name;
			}
			return $course_name.'-'.$stream_name.'-'.$_GET['year_sem'].'-'.$subject_name;
		}
	}

	public function course_video_add(){
		$data = array(
				"course"=>$this->input->post("course"),
				"stream"=>$this->input->post("stream"),
				"year_sem"=>$this->input->post("year_sem"),
				"subject"=>$this->input->post("subject"),
				"video_url"=>$this->input->post("video_url"),
				"video_title"=>$this->input->post("video_title"),
			);
		if(!empty($this->uri->segment(2))){
			$id = $this->input->post("id");
			$this->db->where("id",$id)
					->update("tbl_course_video",$data);
			return "updated";
		}else{
			$data["added_by"] = $this->session->userdata("faculty_id");	
			$data["created_on"]=date("Y-m-d H:i:s");
			$this->db->insert("tbl_course_video",$data);
			return "saved";
		}
	}

	public function get_course_video($id){
		$result = $this->db->where("id",$id)
							->get("tbl_course_video");
		return $result->row();
	}


	public function get_all_course_video_data($length,$start,$search){
		$this->db->where('tbl_course_video.is_deleted','0'); 
		$this->db->where('tbl_course_video.added_by',$this->session->userdata('faculty_id')); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course_video.created_on',$search);
			$this->db->group_end();
		} 
		$this->db->order_by('tbl_course_video.id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_course_video');
		return $result->result();
	}
	public function get_all_course_video_data_count($search){
		$this->db->where('tbl_course_video.is_deleted','0'); 
		$this->db->where('tbl_course_video.added_by',$this->session->userdata('faculty_id'));
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course_video.created_on',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_course_video');
		return $result->num_rows();
	}
 	public function set_bulk_attendance(){
		$data = array(
			'added_by' 			=> $this->session->userdata('faculty_id'),
			'course_id' 		=> $this->input->post('course'),
			'stream_id' 		=> $this->input->post('stream'),
			'subject_id' 		=> $this->input->post('subject_name'),
			'year_sem' 			=> $this->input->post('year_sem'),
			'present_student' 	=> $this->input->post('present_student'),
			'date' 				=> date("Y-m-d"),
			'created_on' 		=> date("Y-m-d H:i:S"),
		);
		$this->db->insert('tbl_bulk_attendance',$data);
		return true;
	}
	public function get_today_attendanc_ajax($length,$start,$search){
		$this->db->select('tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_bulk_attendance.*');
		$this->db->where('tbl_bulk_attendance.is_deleted','0'); 
		$this->db->where('tbl_bulk_attendance.date',date("Y-m-d")); 
		$this->db->where('tbl_bulk_attendance.added_by',$this->session->userdata('faculty_id'));
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_bulk_attendance.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_bulk_attendance.stream_id');
		$this->db->join('tbl_subject','tbl_subject.id = tbl_bulk_attendance.subject_id');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_bulk_attendance');
		return $result->result();
	}
	public function get_today_attendanc_ajax_count($search){
		$this->db->select('tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_bulk_attendance.*');
		$this->db->where('tbl_bulk_attendance.is_deleted','0'); 
		$this->db->where('tbl_bulk_attendance.date',date("Y-m-d")); 
		$this->db->where('tbl_bulk_attendance.added_by',$this->session->userdata('faculty_id'));
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_bulk_attendance.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_bulk_attendance.stream_id');
		$this->db->join('tbl_subject','tbl_subject.id = tbl_bulk_attendance.subject_id');
		$result = $this->db->get('tbl_bulk_attendance');
		return $result->num_rows();
	}
	public function get_all_bulk_attendance($length,$start,$search){
		$this->db->select('tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_bulk_attendance.*,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name');
		$this->db->where('tbl_bulk_attendance.is_deleted','0'); 
		$this->db->where('tbl_bulk_attendance.date',date("Y-m-d")); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_bulk_attendance.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_bulk_attendance.stream_id');
		$this->db->join('tbl_subject','tbl_subject.id = tbl_bulk_attendance.subject_id');
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_bulk_attendance.added_by');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_bulk_attendance');
		return $result->result();
	}
	public function get_all_bulk_attendance_count($search){
		$this->db->select('tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_bulk_attendance.*,tbl_staff_faculty.first_name,tbl_staff_faculty.last_name');
		$this->db->where('tbl_bulk_attendance.is_deleted','0'); 
		$this->db->where('tbl_bulk_attendance.date',date("Y-m-d")); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_bulk_attendance.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_bulk_attendance.stream_id');
		$this->db->join('tbl_subject','tbl_subject.id = tbl_bulk_attendance.subject_id');
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_bulk_attendance.added_by');
		$result = $this->db->get('tbl_bulk_attendance');
		return $result->num_rows();
	}
	public function get_staff_attebdance(){
		$this->db->select('first_name,last_name,id');
		$this->db->where('is_deleted','0');
		$this->db->where('is_left','0');
		$result = $this->db->get('tbl_staff_faculty');
		return $result->result();
	}
	public function get_total_attendance($id){
		if($this->input->get('date') ==""){
			$month = date("m");
			$year  = date("Y");
		}else{
			$month = date("m",strtotime($this->input->get('date')));
			$year  = date("Y",strtotime($this->input->get('date')));
		}
		$this->db->where('faculty_id',$id);
		$this->db->where('is_deleted','0');
		$this->db->where('Month(created_on)',$month);
		$this->db->where('Year(created_on)',$year);
		$result = $this->db->get('tbl_faculty_report');
		return $result->num_rows();
	}

	public function get_total_added_mcq($id){
		$this->db->where('added_by',$id);
		$this->db->where('is_deleted','0');
		if($this->input->get('date') !=""){
			$this->db->where('Date(created_on)',date("Y-m-d",strtotime($this->input->get('date'))));
		}else{
			$this->db->where('Date(created_on)',date("Y-m-d"));
		}
		$result = $this->db->get('tbl_mcq_data');
		return $result->num_rows();
	}
	public function set_faculty_report_reply(){
		$data = array(
			'faculty_id' 		=> $this->input->post('faculty_id'),
			'report_id' 		=> $this->input->post('report_id'),
			'description' 		=> $this->input->post('description'),
			'created_on' 		=> date("Y-m-d H:i:S"),
		);
		$this->db->insert('tbl_faculty_report_reply',$data);
		
		$this->db->where('id',$this->input->post('faculty_id'));
		$result = $this->db->get('tbl_staff_faculty');
		$result = $result->row();
		if(!empty($result)){
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from(no_reply_mail);
			$this->email->to($result->email);
			//$mail->addReplyTo('info@theglobaluniversity.edu.in');
			$this->email->subject('New Password | '.no_reply_name); 
			$this->email->set_mailtype('html');
			$message .= "Dear ".$result->first_name.",<br>
				We added below comment for your report.<br>
				<br>
				<b>Comment:</b>
				<br>
				".$this->input->post('description')."<br>
				<br>
				If any query please reply to <a href='mailto:info@theglobaluniversity.edu.in'>info@theglobaluniversity.edu.in</a>
				
			";
			$this->email->message($message); 
			if($this->email->send()){
				
			}else{
				
			}
		}
		
		return true;
	}
	public function get_report_all_comments(){
		$this->db->where('is_deleted','0');
		$this->db->where('report_id',$this->uri->segment(2));
		$result = $this->db->get('tbl_faculty_report_reply');
		return $result->result();
	}
	public function get_report_all_comments_count($search){
		$this->db->where('is_deleted','0');
		$this->db->where('report_id',$this->uri->segment(2));
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('description',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_faculty_report_reply');
		return $result->num_rows();
	}
}