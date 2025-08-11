<?php class Pulp_model extends CI_model{
	public function __construct(){
		parent::__construct();
	} 
	public function set_enquiry(){
	    $data = array(
	        'name' => $this->input->post('name'),     
	        'email' => $this->input->post('email'),     
	        'mobile' => $this->input->post('mobile'),     
	        'course' => $this->input->post('course'),     
	        'location' => $this->input->post('location'), 
	        'created_on' => date("Y-m-d H:i:s")
	   );
	   $this->db->insert('tbl_pulp_enquiry',$data);
	   redirect('thankyou-for-enq');
	}
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
	public function get_state_ajax(){
		$this->db->where('country_id',$this->input->post('country'));
		$this->db->order_by('name','ASC');
		$resullt = $this->db->get('states');
		echo json_encode($resullt->result());
	}
	public function get_city_ajax(){
		$this->db->where('state_id',$this->input->post('state'));
		$this->db->order_by('name','ASC');
		$resullt = $this->db->get('cities');
		echo json_encode($resullt->result());
	}
	public function get_all_course_stream_relation(){
		$this->db->select('tbl_course.course_name,tbl_course.id');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->where('tbl_course.course_type','1');
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
	public function get_lateral_entry_fees(){
		$result = $this->db->get('tbl_lateral_entry_fees');
		return $result->row();
	}
	public function get_active_challan_bank(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('show_for_challan','1');
		$this->db->order_by('bank_name','ASC');
		$result = $this->db->get('tbl_bank');
		return $result->result();
	}
	public function get_active_session(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->order_by('id','DESC'); 
		$result = $this->db->get('tbl_session');
		return $result->result();
	}
	public function set_registration($photo,$noc,$identity_file){
		$this->db->select('id,faculty,course_type,course_mode');
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$course = $this->db->get('tbl_course_stream_relation');
		$course = $course->row();
		$lateral_entry_fees = 0;
		$registration_fees = 0;
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
			'center_id'         => '2843',
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
			'photo' 			=> $photo,
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
			'course_for' 		=> '1',
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
			$registration_fees = $result->registration_fees;
		}else{
			$this->db->where('relation_id',$course->id);
			$this->db->where('course_id',$this->input->post('course'));
			$this->db->where('stream_id',$this->input->post('stream'));
			$this->db->order_by('id','DESC');
			$result = $this->db->get('tbl_fees_realtion');
			$result = $result->row();
			if(!empty($result)){
				$fees = $result->campus_fees;
				$registration_fees = $result->registration_fees;
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
			'registration_fees' => $registration_fees,
			'bank_fees' 	=> 0,
			'amount' 		=> $fees,
			'original_amount'=> $fees,
			'total_fees' 	=> $fees+$late_fees+$lateral_entry_fees+$registration_fees,
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->db->insert('tbl_student_fees',$fees_data);
		$fees_id = $this->db->insert_id();
		if($this->input->post('payment_mode') == "2"){
			redirect('https://www.birtikendrajituniversity.ac.in/upload_my_qualification/'.base64_encode($id)."/".base64_encode($fees_id));
		}else{
			redirect('https://www.birtikendrajituniversity.ac.in/upload_my_qualification/'.base64_encode($id)."/".base64_encode($fees_id));
		}
	}
	public function get_pulb_courses(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course_type','1');
		$result = $this->db->get('tbl_course');
		return $result->result();
	}
	public function set_pulb_enquiry(){
		$data = array(	
			'name' 			=> $this->input->post('name'),
			'mobile' 		=> $this->input->post('mobile'),	
			'course' 		=> $this->input->post('course'),
			'created_on' 	=> date("Y-m-d H:i:s"),
		);
		$this->db->insert(' tbl_pulp_enquiry',$data);
		redirect('thankyou-for-enq');
	}
}
    
	







