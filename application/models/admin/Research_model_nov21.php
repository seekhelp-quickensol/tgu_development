<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Research_model extends CI_Model { 
	public function get_new_guide_list($length,$start,$search){
		$this->db->select('tbl_guide_application.*,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_guide_application.is_deleted','0');
		$this->db->where('tbl_guide_application.appliation_status','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_guide_application.name',$search);
			$this->db->or_like('tbl_guide_application.email',$search);
			$this->db->or_like('tbl_guide_application.mobile',$search);
			$this->db->or_like('tbl_guide_application.pincode',$search);
			$this->db->or_like('tbl_guide_application.address',$search);
			$this->db->or_like('tbl_guide_application.employement_type',$search);
			$this->db->group_end();
		}
		$this->db->join('countries','countries.id = tbl_guide_application.country');
		$this->db->join('states','states.id = tbl_guide_application.state');
		$this->db->join('cities','cities.id = tbl_guide_application.city');
		$this->db->order_by('tbl_guide_application.id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_guide_application');
		return $result->result();
	}
	public function get_new_guide_list_count($search){
		$this->db->select('tbl_guide_application.*,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_guide_application.is_deleted','0');
		$this->db->where('tbl_guide_application.appliation_status','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_guide_application.name',$search);
			$this->db->or_like('tbl_guide_application.email',$search);
			$this->db->or_like('tbl_guide_application.mobile',$search);
			$this->db->or_like('tbl_guide_application.pincode',$search);
			$this->db->or_like('tbl_guide_application.address',$search);
			$this->db->group_end();
		}
		
		$this->db->join('countries','countries.id = tbl_guide_application.country');
		$this->db->join('states','states.id = tbl_guide_application.state');
		$this->db->join('cities','cities.id = tbl_guide_application.city');
		$this->db->order_by('tbl_guide_application.id','DESC');
		$result = $this->db->get('tbl_guide_application');
		return $result->num_rows();
	}
	public function get_single_guide(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_guide_application');
		return $result->row();
	}
	public function get_phd_single_student(){
		$this->db->select('tbl_phd_registration_form.*,tbl_course.print_name,tbl_stream.stream_name,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_phd_registration_form.is_deleted','0');
		$this->db->where('tbl_phd_registration_form.id',$this->uri->segment(2));
		$this->db->join('tbl_course','tbl_course.id = tbl_phd_registration_form.course');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_phd_registration_form.stream');
		$this->db->join('countries','countries.id = tbl_phd_registration_form.country');
		$this->db->join('states','states.id = tbl_phd_registration_form.state');
		$this->db->join('cities','cities.id = tbl_phd_registration_form.city');
		$result = $this->db->get('tbl_phd_registration_form');
		return $result->row();
	}

	public function get_all_guide_application(){
		$this->db->where('tbl_guide_application.is_deleted', '0');
		$this->db->where('tbl_guide_application.status', '1');
		$this->db->where('tbl_guide_application.id', $this->uri->segment(2)); 
		$result = $this->db->get('tbl_guide_application'); 
		return $result->row();
	} 
	public function get_approved_guide_application(){
		$this->db->where('tbl_guide_application.is_deleted', '0');
		$this->db->where('tbl_guide_application.status', '1');
		$this->db->where('tbl_guide_application.appliation_status', '1'); 
		$result = $this->db->get('tbl_guide_application'); 
		return $result->result();
	} 
	public function get_phd_student(){ 
		$this->db->select('tbl_student.*,tbl_id_management.id_name,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.verified_status','1');
		$this->db->where('tbl_student.course_id','23');
		$this->db->where('tbl_student.admission_status !=','0');
		$this->db->where('tbl_student.admission_status !=','2'); 
		$this->db->order_by('tbl_student.enrollment_date','DESC'); 
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
	public function get_selected_country(){
		// $this->db->where('id', $id);
		$result = $this->db->get('countries');
		return $result->result();
	} 
	public function get_selected_state($id){
		$this->db->where('id', $id);
		$result = $this->db->get('states');
		return $result->row(); 
	}
	public function get_selected_city($id){
		$this->db->where('id', $id);
		$result = $this->db->get('cities');
		return $result->row(); 
	} 
	public function update_guide_application($photo,$signature,$secondary_subject_marksheet,$sr_secondary_subject_marksheet,$graduation_subject_marksheet,$post_graduation_subject_marksheet,$phd_subject_marksheet,$other_qualification_subject_marksheet,$biodata,$aadhar_card){
		$data = array(
			'name' 								=> $this->input->post('name'),
			'son_of' 							=> $this->input->post('son_of'),
			'date_of_birth'					 	=> date("Y-m-d",strtotime($this->input->post('date_of_birth'))),
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
			'bank_name' 						=> $this->input->post('bank_name'),
			'account_name' 						=> $this->input->post('account_name'),
			'account_number' 					=> $this->input->post('account_number'),
			'ifsc_code' 						=> $this->input->post('ifsc_code'),
			'biodata'							=> $biodata,
			'aadhar_card'						=> $aadhar_card,
		); 
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_guide_application',$data);
		return true;
	} 
	public function set_phd_course_work_schedule(){
		$data = array(
			"schedule_date"=>$this->input->post("schedule_date"),
		);
		if(empty($this->uri->segment(2))){
			$data["created_on"] = date("Y-m-d H:i:s");
			$this->db->insert("tbl_phd_course_work_schedules",$data);
			return "saved";
		}else{
			$this->db->where("is_deleted","0");
			$this->db->where("id",$this->input->post("id"));
			$this->db->update("tbl_phd_course_work_schedules",$data);
			return "updated";
		}
	} 
	public function get_phd_course_work_schedule_for_admin_dispaly(){
		$this->db->where("is_deleted","0");
		$result = $this->db->get("tbl_phd_course_work_schedules");
		return $result->result();
	} 
	public function edit_phd_course_work_schedule(){
		$this->db->where("is_deleted","0");
		$this->db->where("id",$this->uri->segment(2));
		$result = $this->db->get("tbl_phd_course_work_schedules");
		return $result->row();
	}  
	public function get_phd_course_work_list($length,$start,$search){
		$this->db->select('tbl_phd_course_work.*,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_phd_course_work.is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_phd_course_work.student_name',$search);
			$this->db->or_like('tbl_phd_course_work.email',$search);
			$this->db->or_like('tbl_phd_course_work.mobile',$search);
			$this->db->or_like('tbl_phd_course_work.pincode',$search);
			$this->db->or_like('tbl_phd_course_work.address',$search);
			$this->db->or_like('tbl_phd_course_work.enrollment_number',$search);
			$this->db->group_end();
		}
		$this->db->join("countries","countries.id=tbl_phd_course_work.country_id");
		$this->db->join("states","states.id=tbl_phd_course_work.state_id");
		$this->db->join("cities","cities.id=tbl_phd_course_work.city_id");
		$this->db->join("tbl_course","tbl_course.id=tbl_phd_course_work.course_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_phd_course_work.stream_id");

		$this->db->order_by('tbl_phd_course_work.id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_phd_course_work');
		return $result->result();
	}
	public function get_phd_course_work_list_count($search){
		$this->db->select('tbl_phd_course_work.*,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_phd_course_work.is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_phd_course_work.student_name',$search);
			$this->db->or_like('tbl_phd_course_work.email',$search);
			$this->db->or_like('tbl_phd_course_work.mobile',$search);
			$this->db->or_like('tbl_phd_course_work.pincode',$search);
			$this->db->or_like('tbl_phd_course_work.address',$search);
			$this->db->or_like('tbl_phd_course_work.enrollment_number',$search);
			$this->db->group_end();
		}
		$this->db->join("countries","countries.id=tbl_phd_course_work.country_id");
		$this->db->join("states","states.id=tbl_phd_course_work.state_id");
		$this->db->join("cities","cities.id=tbl_phd_course_work.city_id");
		$this->db->join("tbl_course","tbl_course.id=tbl_phd_course_work.course_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_phd_course_work.stream_id");
		
		$this->db->order_by('tbl_phd_course_work.id','DESC');
		$result = $this->db->get('tbl_phd_course_work');
		return $result->num_rows();
	}
	public function approve_guide_application(){
		$password = rand(100000,9999999);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_guide_application');
		$result = $result->row();
		if(!empty($result)){
			$data = array(
				"appliation_status" => '1',
				"password" => $password,
			);
			$this->db->where("id",$result->id);
			$this->db->update("tbl_guide_application",$data);
			
			$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE; 
			$this->email->initialize($config);

			$mail_message = "Dear ".$result->name.",<br>Your application has been approved, below are the password for your approval lettar<br>Link:".base_url()."appointment-letter-for-supervisors<br>Password:".$password."<br>";
			
			$this->email->from('no-reply@birtikendrajituniversity.com');
			$this->email->to($result->email);
			$this->email->subject('Approve Application |THE GLOBAL UNIVERSITY'); 
			$this->email->set_mailtype('html');
			$message = $mail_message;
			$message .="<br>Regards<br>IT Team<br>THE GLOBAL UNIVERSITY<br>Canchipur, near Arunachal Pradesh University, South View. Imphal West, Arunachal Pradesh-795003";
			
			$this->email->message($message); 
			if($this->email->send()){  
			}else{ 
			}
			return true;
		}else{
			return false;
		}
	}
	public function get_all_approve_guide_application($length,$start,$search){
		$this->db->select('tbl_guide_application.*,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_guide_application.is_deleted','0');
		$this->db->where('tbl_guide_application.appliation_status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_guide_application.name',$search);
			$this->db->or_like('tbl_guide_application.email',$search);
			$this->db->or_like('tbl_guide_application.mobile',$search);
			$this->db->or_like('tbl_guide_application.pincode',$search);
			$this->db->or_like('tbl_guide_application.address',$search);
			$this->db->group_end();
		}
		$this->db->join('countries','countries.id = tbl_guide_application.country');
		$this->db->join('states','states.id = tbl_guide_application.state');
		$this->db->join('cities','cities.id = tbl_guide_application.city');
		$this->db->order_by('tbl_guide_application.id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_guide_application');
		return $result->result();
	}
	public function get_all_approve_guide_application_count($search){
		$this->db->select('tbl_guide_application.*,countries.name as country_name,states.name as state_name,cities.name as city_name');
		$this->db->where('tbl_guide_application.is_deleted','0');
		$this->db->where('tbl_guide_application.appliation_status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_guide_application.name',$search);
			$this->db->or_like('tbl_guide_application.email',$search);
			$this->db->or_like('tbl_guide_application.mobile',$search);
			$this->db->or_like('tbl_guide_application.pincode',$search);
			$this->db->or_like('tbl_guide_application.address',$search);
			$this->db->group_end();
		}
		
		$this->db->join('countries','countries.id = tbl_guide_application.country');
		$this->db->join('states','states.id = tbl_guide_application.state');
		$this->db->join('cities','cities.id = tbl_guide_application.city');
		$this->db->order_by('tbl_guide_application.id','DESC');
		$result = $this->db->get('tbl_guide_application');
		return $result->num_rows();
	}
	
	public function get_single_guide_data(){
		$this->db->select('tbl_guide_application.*,cities.name as city_name, countries.name as country_name, states.name as state_name');
		$this->db->where('tbl_guide_application.id',$this->uri->segment(2));
		$this->db->where('tbl_guide_application.is_deleted','0');
		$this->db->where('tbl_guide_application.status','1');
		$this->db->join('countries','countries.id = tbl_guide_application.country');
		$this->db->join('states','states.id = tbl_guide_application.state');
		$this->db->join('cities','cities.id = tbl_guide_application.city');
		$result = $this->db->get('tbl_guide_application');
		return $result->row();
	}

 /********************* shubham code *****************************************/

	public function get_phd_course_work_list_success($length,$start,$search){
		$this->db->select('tbl_phd_course_work.*,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_phd_course_work.is_deleted','0');
		$this->db->where('tbl_phd_course_work.payment_status','1');
		$this->db->where('tbl_phd_course_work.approve','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_phd_course_work.student_name',$search);
			$this->db->or_like('tbl_phd_course_work.email',$search);
			$this->db->or_like('tbl_phd_course_work.mobile',$search);
			$this->db->or_like('tbl_phd_course_work.pincode',$search);
			$this->db->or_like('tbl_phd_course_work.address',$search);
			$this->db->or_like('tbl_phd_course_work.enrollment_number',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->group_end();
		}
		$this->db->join("countries","countries.id=tbl_phd_course_work.country_id");
		$this->db->join("states","states.id=tbl_phd_course_work.state_id");
		$this->db->join("cities","cities.id=tbl_phd_course_work.city_id");
		$this->db->join("tbl_course","tbl_course.id=tbl_phd_course_work.course_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_phd_course_work.stream_id");
		$this->db->join("tbl_student","tbl_student.enrollment_number=tbl_phd_course_work.enrollment_number");
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");
		$this->db->order_by('tbl_phd_course_work.id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_phd_course_work');
		return $result->result();
	}
	public function get_phd_course_work_list_success_count($search){
		$this->db->select('tbl_phd_course_work.*,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_phd_course_work.is_deleted','0');
		$this->db->where('tbl_phd_course_work.payment_status','1');
		$this->db->where('tbl_phd_course_work.approve','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_phd_course_work.student_name',$search);
			$this->db->or_like('tbl_phd_course_work.email',$search);
			$this->db->or_like('tbl_phd_course_work.mobile',$search);
			$this->db->or_like('tbl_phd_course_work.pincode',$search);
			$this->db->or_like('tbl_phd_course_work.address',$search);
			$this->db->or_like('tbl_phd_course_work.enrollment_number',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->group_end();
		}
		$this->db->join("countries","countries.id=tbl_phd_course_work.country_id");
		$this->db->join("states","states.id=tbl_phd_course_work.state_id");
		$this->db->join("cities","cities.id=tbl_phd_course_work.city_id");
		$this->db->join("tbl_course","tbl_course.id=tbl_phd_course_work.course_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_phd_course_work.stream_id");
		$this->db->join("tbl_student","tbl_student.enrollment_number=tbl_phd_course_work.enrollment_number");
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");
		
		$this->db->order_by('tbl_phd_course_work.id','DESC');
		$result = $this->db->get('tbl_phd_course_work');
		return $result->num_rows();
	}
	public function get_phd_course_work_list_fail($length,$start,$search){
	$this->db->select('tbl_phd_course_work.*,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_phd_course_work.is_deleted','0');
		$this->db->where('tbl_phd_course_work.payment_status','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_phd_course_work.student_name',$search);
			$this->db->or_like('tbl_phd_course_work.email',$search);
			$this->db->or_like('tbl_phd_course_work.mobile',$search);
			$this->db->or_like('tbl_phd_course_work.pincode',$search);
			$this->db->or_like('tbl_phd_course_work.address',$search);
			$this->db->or_like('tbl_phd_course_work.enrollment_number',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->group_end();
		}
		$this->db->join("countries","countries.id=tbl_phd_course_work.country_id");
		$this->db->join("states","states.id=tbl_phd_course_work.state_id");
		$this->db->join("cities","cities.id=tbl_phd_course_work.city_id");
		$this->db->join("tbl_course","tbl_course.id=tbl_phd_course_work.course_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_phd_course_work.stream_id");
		$this->db->join("tbl_student","tbl_student.enrollment_number=tbl_phd_course_work.enrollment_number");
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");

		$this->db->order_by('tbl_phd_course_work.id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_phd_course_work');
		return $result->result();
	}
	public function get_phd_course_work_list_fail_count($search){
		$this->db->select('tbl_phd_course_work.*,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_phd_course_work.is_deleted','0');
		$this->db->where('tbl_phd_course_work.payment_status','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_phd_course_work.student_name',$search);
			$this->db->or_like('tbl_phd_course_work.email',$search);
			$this->db->or_like('tbl_phd_course_work.mobile',$search);
			$this->db->or_like('tbl_phd_course_work.pincode',$search);
			$this->db->or_like('tbl_phd_course_work.address',$search);
			$this->db->or_like('tbl_phd_course_work.enrollment_number',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->group_end();
		}
		$this->db->join("countries","countries.id=tbl_phd_course_work.country_id");
		$this->db->join("states","states.id=tbl_phd_course_work.state_id");
		$this->db->join("cities","cities.id=tbl_phd_course_work.city_id");
		$this->db->join("tbl_course","tbl_course.id=tbl_phd_course_work.course_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_phd_course_work.stream_id");
		$this->db->join("tbl_student","tbl_student.enrollment_number=tbl_phd_course_work.enrollment_number");
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");
		
		$this->db->order_by('tbl_phd_course_work.id','DESC');
		$result = $this->db->get('tbl_phd_course_work');
		return $result->num_rows();
	}
	public function approve_course_work_registration(){
		$password = rand(100000,9999999);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_phd_course_work');
		$result = $result->row();
		if(!empty($result)){
			$data = array(
				"username" => $result->enrollment_number,
				"password" => $password,
				"approve" => '1',
			);
			$this->db->where("id",$result->id);
			$this->db->update("tbl_phd_course_work",$data);
			
			/*$this->load->library('email');
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE; 
			$this->email->initialize($config);

			$mail_message = "Dear ".$result->name.",<br>Your application has been approved, below are the password for your approval lettar<br>Link:".base_url()."course_work_exam_login<br>Username:".$result->enrollment_number."<br> Password:".$password."<br>";
			
			$this->email->from('no-reply@birtikendrajituniversity.com');
			$this->email->to($result->email);
			$this->email->subject('Approve Application |THE GLOBAL UNIVERSITY'); 
			$this->email->set_mailtype('html');
			$message = $mail_message;
			$message .="<br>Regards<br>IT Team<br>THE GLOBAL UNIVERSITY<br>Canchipur, near Arunachal Pradesh University, South View. Imphal West, Arunachal Pradesh-795003";
			
			$this->email->message($message); 
			if($this->email->send()){  
			}else{ 
			}*/
			return true;
		}else{
			return false;
		}
	}
	public function get_phd_course_work_list_approved($length,$start,$search){
		$this->db->select('tbl_phd_course_work.*,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_phd_course_work.is_deleted','0');
		$this->db->where('tbl_phd_course_work.payment_status','1');
		$this->db->where('tbl_phd_course_work.approve','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_phd_course_work.student_name',$search);
			$this->db->or_like('tbl_phd_course_work.email',$search);
			$this->db->or_like('tbl_phd_course_work.mobile',$search);
			$this->db->or_like('tbl_phd_course_work.pincode',$search);
			$this->db->or_like('tbl_phd_course_work.address',$search);
			$this->db->or_like('tbl_phd_course_work.enrollment_number',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->group_end();
		}
	$this->db->join("countries","countries.id=tbl_phd_course_work.country_id");
		$this->db->join("states","states.id=tbl_phd_course_work.state_id");
		$this->db->join("cities","cities.id=tbl_phd_course_work.city_id");
		$this->db->join("tbl_course","tbl_course.id=tbl_phd_course_work.course_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_phd_course_work.stream_id");
		$this->db->join("tbl_student","tbl_student.enrollment_number=tbl_phd_course_work.enrollment_number");
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");

		$this->db->order_by('tbl_phd_course_work.id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_phd_course_work');
		return $result->result();
	}
	public function get_phd_course_work_list_approved_count($search){
	 $this->db->select('tbl_phd_course_work.*,countries.name as country_name,states.name as state_name,cities.name as city_name,tbl_course.course_name,tbl_stream.stream_name,tbl_center.center_name');
		$this->db->where('tbl_phd_course_work.is_deleted','0');
		$this->db->where('tbl_phd_course_work.payment_status','1');
		$this->db->where('tbl_phd_course_work.approve','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('countries.name',$search);
			$this->db->or_like('states.name',$search);
			$this->db->or_like('cities.name',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('tbl_phd_course_work.student_name',$search);
			$this->db->or_like('tbl_phd_course_work.email',$search);
			$this->db->or_like('tbl_phd_course_work.mobile',$search);
			$this->db->or_like('tbl_phd_course_work.pincode',$search);
			$this->db->or_like('tbl_phd_course_work.address',$search);
			$this->db->or_like('tbl_phd_course_work.enrollment_number',$search);
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->group_end();
		}
		$this->db->join("countries","countries.id=tbl_phd_course_work.country_id");
		$this->db->join("states","states.id=tbl_phd_course_work.state_id");
		$this->db->join("cities","cities.id=tbl_phd_course_work.city_id");
		$this->db->join("tbl_course","tbl_course.id=tbl_phd_course_work.course_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_phd_course_work.stream_id");
		$this->db->join("tbl_student","tbl_student.enrollment_number=tbl_phd_course_work.enrollment_number");
		$this->db->join("tbl_center","tbl_center.id=tbl_student.center_id");
		
		$this->db->order_by('tbl_phd_course_work.id','DESC');
		$result = $this->db->get('tbl_phd_course_work');
		return $result->num_rows();
	}
	public function disapprove_course_work_registration(){
		$this->db->where('id',$this->uri->segment(2));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_phd_course_work');
		$result = $result->row();
		if(!empty($result)){
			$data = array(
				"approve" => '0',
			);
			$this->db->where("id",$result->id);
			$this->db->update("tbl_phd_course_work",$data);
			return true ;
		}else{
			return false;
		}
	}
	public function get_single_phd_course_work_payment_detail(){
		$this->db->where('tbl_phd_course_work.id',$this->uri->segment(2));
		$this->db->where('tbl_phd_course_work.is_deleted','0');
		$this->db->where('tbl_phd_course_work.status','1');
		$result = $this->db->get('tbl_phd_course_work');
		return $result->row();

	}	
	public function update_course_work_update_payment(){
		$this->db->where('id',$this->uri->segment(2));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_phd_course_work');
		$result = $result->row();
		if(!empty($result)){
			$data = array(
				"transaction_id" => $this->input->post('transaction_id'),
				"payment_mode"   => $this->input->post('payment_mode'),
				"payment_date"   => date('Y-m-d',strtotime($this->input->post('payment_date'))),
				"payment_status" => $this->input->post('payment_status'),
				"payment_ammount"=> $this->input->post('total_fees'),
				"remark"         => $this->input->post('remark'),
			);
			$this->db->where("id",$result->id);
			$this->db->update("tbl_phd_course_work",$data);
			return true ;
		}else{
			return false;
		}

	}
	public function get_unique_transaction_for_tbl_course_work(){
		$this->db->where("is_deleted","0");
		$this->db->where("status","1");
		$this->db->where("transaction_id",$this->input->post("transaction_id"));
		$result= $this->db->get("tbl_phd_course_work");
		$result = $result->num_rows();
		// echo $result;
		if ($result > 1) {
			echo 1;
		} else {
			echo 0;
		}
		
	}
	public function get_phd_course_work_exam_appeared_list($length,$start,$search){
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_phd_course_work.student_name',$search);
			$this->db->or_like('tbl_course_work_exam.exam_name',$search);
			$this->db->or_like('tbl_course_work_exam_student.score',$search);
			$this->db->or_like('tbl_course_work_exam_student.exam_date',$search);
		
			$this->db->group_end();
		}
		$this->db->select('tbl_course_work_exam_student.*,tbl_phd_course_work.student_name,tbl_course_work_exam.exam_name,tbl_phd_course_work.enrollment_number');
		$this->db->where("tbl_course_work_exam_student.is_deleted","0");
		$this->db->join("tbl_phd_course_work","tbl_phd_course_work.id=tbl_course_work_exam_student.student_id");
		$this->db->join("tbl_course_work_exam","tbl_course_work_exam.id=tbl_course_work_exam_student.exam_id");
		$this->db->limit($length,$start);
		$result = $this->db->get("tbl_course_work_exam_student");
		return $result->result();
	}
	public function get_phd_course_work_exam_appeared_list_count($search){
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_phd_course_work.student_name',$search);
			$this->db->or_like('tbl_course_work_exam.exam_name',$search);
			$this->db->or_like('tbl_course_work_exam_student.score',$search);
			$this->db->or_like('tbl_course_work_exam_student.exam_date',$search);
			$this->db->group_end();
		}
		$this->db->select('tbl_course_work_exam_student.*,tbl_phd_course_work.student_name,tbl_course_work_exam.exam_name,tbl_phd_course_work.enrollment_number');
		$this->db->where("tbl_course_work_exam_student.is_deleted","0");
		$this->db->join("tbl_phd_course_work","tbl_phd_course_work.id=tbl_course_work_exam_student.student_id");
		$this->db->join("tbl_course_work_exam","tbl_course_work_exam.id=tbl_course_work_exam_student.exam_id");
		$result = $this->db->get("tbl_course_work_exam_student");
		return $result->num_rows();
	}
	public function set_assigned_guide_to_scholar(){
		$data = array(
			'guide_id' => $this->input->post('guide_name')
		);
		$this->db->where('id',$this->input->post('student_name'));
		$this->db->update('tbl_student',$data);
		return true;
	}
	public function get_all_assigned_scholar_ajax($length,$start,$search){
		$this->db->select('tbl_student.*,tbl_guide_application.name,tbl_guide_application.mobile as guide_mobile,tbl_stream.stream_name,tbl_session.session_name'); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_guide_application.name',$search);  
			$this->db->group_end();
		}
		$this->db->where("tbl_student.is_deleted","0"); 
		$this->db->join("tbl_guide_application","tbl_guide_application.id=tbl_student.guide_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_student.stream_id");
		$this->db->join("tbl_session","tbl_session.id=tbl_student.session_id");
		$this->db->limit($length,$start);
		$result = $this->db->get("tbl_student");
		return $result->result();
	}
	public function get_all_assigned_scholar_ajax_count($search){
		$this->db->select('tbl_student.*,tbl_guide_application.name,tbl_guide_application.mobile as guide_mobile,tbl_stream.stream_name,tbl_session.session_name'); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_guide_application.name',$search);  
			$this->db->group_end();
		}
		$this->db->where("tbl_student.is_deleted","0"); 
		$this->db->join("tbl_guide_application","tbl_guide_application.id=tbl_student.guide_id");
		$this->db->join("tbl_stream","tbl_stream.id=tbl_student.stream_id");
		$this->db->join("tbl_session","tbl_session.id=tbl_student.session_id");
		$this->db->limit($length,$start);
		$result = $this->db->get("tbl_student");
		return $result->num_rows();
	}
	public function get_single_student(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
 } 