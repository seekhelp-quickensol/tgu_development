<?php

class Separate_student_model extends CI_Model{

    public function set_addmission_form($document,$identity_file,$multiple_document){
        $this->db->select('faculty,course_type,course_mode');
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$course = $this->db->get('tbl_course_stream_relation');
		$course = $course->row();

        $data = array(
			'session_id' 		=> $this->input->post('session'),
			'faculty_id' 		=> $course->faculty,
			'course_type' 		=> $course->course_type,
			'course_mode' 		=> $course->course_mode,
			'course_id' 		=> $this->input->post('course'),
			'stream_id' 		=> $this->input->post('stream'),
			'year_sem' 			=> $this->input->post('year_sem'),
			'student_name' 		=> $this->input->post('student_name'),
			'father_name' 		=> $this->input->post('father_name'),
			'mother_name' 		=> $this->input->post('mother_name'),
			'date_of_birth' 	=> date("Y-m-d",strtotime($this->input->post('date_of_birth'))),
			'date_of_registration' 	=> date("Y-m-d",strtotime($this->input->post('date_of_registration'))),
			'mobile' 			=> $this->input->post('mobile'),
			'email' 			=> $this->input->post('email'),
			'gender' 			=> $this->input->post('gender'),
			'address' 			=> $this->input->post('address'),
			'state' 			=> $this->input->post('state'),
			'document'          => $document,
			'other_document'    => $multiple_document,
			'student_fees'      => $this->input->post("fees"),
			'credit_note'      	=> $this->input->post("credit_note"),
            'center_id'         =>$this->input->post("center_id"),
           
            'id_number'         =>$this->input->post("identity_numer"),
            'identity_softcopy' =>$identity_file,
		);

        if(empty($this->input->post("student_id"))){
            $data["admission_date"] = date("Y-m-d");
            // $data['enrollment_number'] = "S".date("Y").$course->faculty.$this->input->post('course').date("mdH");
            $data['created_on'] = date("Y-m-d H:i:s");
            // $data['center_id'] = 1;
            
			
			$this->db->insert("tbl_separate_student",$data);
            $student_id  = $this->db->insert_id();

			$this->db->select("tbl_separate_student.*,tbl_faculty.faculty_code,tbl_course_stream_relation.course_code,tbl_session.session_start_date");
			$this->db->where("tbl_separate_student.id",$student_id);
			$this->db->join("tbl_faculty","tbl_faculty.id=tbl_separate_student.faculty_id");
			$this->db->join("tbl_course_stream_relation","tbl_course_stream_relation.faculty=tbl_separate_student.faculty_id AND tbl_course_stream_relation.course_type=tbl_separate_student.course_type AND tbl_course_stream_relation.course=tbl_separate_student.course_id AND tbl_course_stream_relation.stream=tbl_separate_student.stream_id AND tbl_course_stream_relation.course_mode=tbl_separate_student.course_mode");
			$this->db->join("tbl_session","tbl_session.id=tbl_separate_student.session_id");

             $stu_data = $this->db->get("tbl_separate_student")->row();
             $enrollment_number = "";
             $session_data = explode("-",strval($stu_data->session_start_date));
             $enrollment_number.=$session_data[0];
             $enrollment_number.=$session_data[1];

             $enrollment_number.=$stu_data->faculty_code;
             $enrollment_number.=$stu_data->course_code;

             $enrollment_number.= end(explode("-", strval($stu_data->date_of_birth)));
             $enrollment_number.=$student_id;
             
             
              $update_data = array(
             	'username' => "S".rand(1111,9999).$student_id,
            	'password' => "S".rand(1111,9999).$student_id,
            	"enrollment_number"=>$enrollment_number,
             );
             
			$profile = $this->Admin_model->get_profile();
			$log_description = $profile->first_name." ".$profile->last_name." has created new admission with the enrollment number ".$enrollment_number." admission of ".$this->input->post('student_name')." (".$student_id.")". " on ".date("d/m/Y");
			$log = array(
					'user_id' 		=> $this->session->userdata('admin_id'),
					'student_id' 	=> $student_id,
					'description' 	=> $log_description,
					'student_type' 	=> '1',
					'date' 			=> date("Y-m-d"),
					'created_on' 	=> date("Y-m-d H:i:s"),
				);
			$this->Setting_model->set_log($log); 
            $this->db->where("tbl_separate_student.id",$student_id);
            $this->db->update("tbl_separate_student",$update_data);
            return true;
        }else{
			$this->db->where("id",$this->input->post("student_id"));
            $student_row = $this->db->get("tbl_separate_student");
			$student_row = $student_row->row();
			if($student_row->student_name != $this->input->post('student_name')){
				$add_log = 0;
				$log_description .= "<br>Student name ".$student_row->student_name." to ". $this->input->post('student_name');
			}
			if($student_row->date_of_registration != date("Y-m-d",strtotime($this->input->post('date_of_registration')))){
				$add_log = 0;
				$log_description .= "<br>Registration date ".$student_row->date_of_registration." to ". date("Y-m-d",strtotime($this->input->post('date_of_registrations')));
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
			  
				$log = array(
				'user_id' 		=> $this->session->userdata('admin_id'),
				'student_id' 	=> $this->input->post("student_id"),
				'description' 	=> $log_description,
				'student_type' 	=> '1',
				'date' 			=> date("Y-m-d"),
				'created_on' 	=> date("Y-m-d H:i:s"),
			);
			$this->Setting_model->set_log($log);
			
            $this->db->where("id",$this->input->post("student_id"));
            $this->db->update("tbl_separate_student",$data);
            return false;
        }
    }

    public function get_student_addmission_data(){
        $this->db->where("is_deleted","0");
        $this->db->where("id",$this->uri->segment(2));
        $result = $this->db->get("tbl_separate_student");
        return $result->row();
    }        

    public function get_all_enrolled_student_admission_list($length,$start,$search){
		$this->db->select('tbl_separate_student.*,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_separate_student.is_deleted','0');
		
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_separate_student.student_name',$search);
			$this->db->or_like('tbl_separate_student.father_name',$search);
			$this->db->or_like('tbl_separate_student.mother_name',$search);
			$this->db->or_like('tbl_separate_student.enrollment_number',$search);
			$this->db->or_like('tbl_separate_student.mobile',$search);
			$this->db->or_like('tbl_separate_student.email',$search);
			$this->db->or_like('tbl_separate_student.admission_date',$search);
			
			$this->db->or_like('tbl_separate_student.gender',$search);
			
			$this->db->or_like('tbl_separate_student.address',$search);
		
			
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by("tbl_separate_student.id","DESC");
		$this->db->limit($length,$start);
		$this->db->join('tbl_center','tbl_center.id = tbl_separate_student.center_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_separate_student.course_id');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_separate_student.course_type');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_separate_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_separate_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_separate_student.session_id');
		
		$result = $this->db->get('tbl_separate_student');
		return $result->result();		
	}
	public function get_all_enrolled_student_admission_list_count($search){
        $this->db->select('tbl_separate_student.*,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.course_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name');
		$this->db->where('tbl_separate_student.is_deleted','0');
		
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_separate_student.student_name',$search);
			$this->db->or_like('tbl_separate_student.father_name',$search);
			$this->db->or_like('tbl_separate_student.admission_date',$search);
			$this->db->or_like('tbl_separate_student.mother_name',$search);
			$this->db->or_like('tbl_separate_student.enrollment_number',$search);
			$this->db->or_like('tbl_separate_student.mobile',$search);
			$this->db->or_like('tbl_separate_student.email',$search);
			
			$this->db->or_like('tbl_separate_student.gender',$search);
			
			$this->db->or_like('tbl_separate_student.address',$search);
		
			
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by("tbl_separate_student.id","DESC");

		$this->db->join('tbl_center','tbl_center.id = tbl_separate_student.center_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_separate_student.course_id');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_separate_student.course_type');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_separate_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_separate_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_separate_student.session_id');
		$result = $this->db->get('tbl_separate_student');
		return $result->num_rows();
	}

    //manage result work 

    public function get_result_student(){
		$this->db->select('tbl_separate_student.*,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_separate_student.is_deleted','0');
		$this->db->where('tbl_separate_student.enrollment_number',$this->input->post('enrollment'));
		
		$this->db->join('tbl_course','tbl_course.id = tbl_separate_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_separate_student.stream_id');
		$result = $this->db->get('tbl_separate_student');
		return $result->row();
	}
	public function get_result_subject(){
		$student = $this->get_result_student();
		if(!empty($student)){
			$this->db->where('tbl_subject.is_deleted','0');
			$this->db->where('tbl_subject.status','1'); 
			$this->db->where('tbl_subject.course',$student->course_id);
			$this->db->where('tbl_subject.stream',$student->stream_id);
			$this->db->where('tbl_subject.mode',$student->course_mode);

			$this->db->where('tbl_subject.year_sem',$this->input->post('year_sem'));
			$result = $this->db->get('tbl_subject'); 
			return $result->result();
		}else{
			return array();
		}
	}
	public function set_result(){
		
	    
		$totalIMM=0;        
		$totalIMO=0;
		$totalEMM=0;
		$totalEMO=0;    
		
		if($this->input->post('txtExamStatus') == '0'){
		    $this->db->where("is_deleted","0");
			$this->db->where('enrollment_number',$this->security->xss_clean($this->input->post('txtEnNo')));
			$this->db->where('year_sem',$this->security->xss_clean($this->input->post('txtYS')));
			$this->db->where('examination_status',$this->security->xss_clean($this->input->post('txtExamStatus')));
			$result = $this->db->get('tbl_separate_student_exam_results');
			 
			if($result->num_rows() > 0 && $this->security->xss_clean($this->input->post('txtExamStatus')) == '0'){ 
				return false;
			}
		} 
			$j=1;
			while(isset($_REQUEST["txtSubjectId".$j])){
				if(isset($_REQUEST["txtChoice".$j])){
					if($_REQUEST["txtSubjectId".$j]==6736 || $_REQUEST["txtSubjectId".$j]==6735 || $_REQUEST["txtSubjectId".$j]==6734){
						
					}else{
						$totalIMM+=$_REQUEST["txtIMM".$j];        
						$totalIMO+=$_REQUEST["txtIMO".$j];
						$totalEMM+=$_REQUEST["txtEMM".$j];
						$totalEMO+=$_REQUEST["txtEMO".$j];
					}
				}
				$j++;
			} 
			
		
			$result_declare_date = "";
			if($this->input->post('txtMonth') == "August" && $this->input->post('txtYear') == "2021"){
				$result_declare_date = "2021-08-10";
			}
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
				'added_by' 					=> $this->session->userdata('admin_id'),
				'added_show'                =>'1',
				'examination_status' 		=> $this->security->xss_clean($this->input->post('txtExamStatus')), 
				'created_on'				=> date("Y-m-d H:i:s")
			);
			
			$this->db->insert('tbl_separate_student_exam_results',$data);
			$result_id = $this->db->insert_id(); 
			$i=1;
			while(isset($_REQUEST["txtSubjectId".$i])){;
				if(isset($_REQUEST["txtChoice".$i])){                       
					$exam_details = array(
						'result_id' 				=> $result_id,
						'subject_id' 				=> $_REQUEST["txtSubjectId".$i],
						'internal_max_marks' 		=> $_REQUEST["txtIMM".$i],
						'internal_marks_obtained'	=> $_REQUEST["txtIMO".$i],
						'external_max_marks' 		=> $_REQUEST["txtEMM".$i],
						'external_marks_obtained' 	=> $_REQUEST["txtEMO".$i],
						'result' 					=> $_REQUEST["comboResult".$i],
						'created_on'				=> date("Y-m-d H:i:s")
					);
					$this->db->insert('tbl_separate_student_examination_result_details',$exam_details);
				}
				$i++;					
			}
			return true;
	}

    //manage result work ends here

    public function get_search_result(){ 
		$this->db->select('tbl_separate_student_exam_results.*,tbl_course.course_name,tbl_stream.stream_name,tbl_separate_student.student_name,tbl_separate_student.course_mode');
		if($this->input->post('month') != ""){
			$this->db->where('tbl_separate_student_exam_results.examination_month',$this->input->post('month'));
		}
		if($this->input->post('year') != ""){
			$this->db->where('tbl_separate_student_exam_results.examination_year',$this->input->post('year'));
		}
		if($this->input->post('course') != ""){
			$this->db->where('tbl_separate_student_exam_results.course_id',$this->input->post('course'));
		}
		if($this->input->post('stream') != ""){
			$this->db->where('tbl_separate_student_exam_results.stream_id',$this->input->post('stream'));
		}
		if($this->input->post('enrollment') != ""){
			$this->db->where('tbl_separate_student_exam_results.enrollment_number',$this->input->post('enrollment'));
		}
		if($this->input->post('result_status') != ""){
			$this->db->where('tbl_separate_student_exam_results.status',$this->input->post('result_status'));
		}
		if($this->input->post('result') != ""){
			$this->db->where('tbl_separate_student_exam_results.result',$this->input->post('result'));
		} 
		$this->db->where('tbl_separate_student_exam_results.is_deleted','0');
		$this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_exam_results.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_separate_student_exam_results.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_separate_student_exam_results.stream_id');
		$result = $this->db->get('tbl_separate_student_exam_results');
		return $result->result();
	}

    public function inactivate_results(){
		$data = array(
			'status' => '0'
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_separate_student_exam_results',$data);
		return true;
	}	
	public function activate_results(){
		$data = array(
			'status' => '1'
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_separate_student_exam_results',$data);
		return true;
	}

    public function get_single_result(){ 
		$this->db->select('tbl_separate_student_exam_results.*,tbl_course.course_name,tbl_stream.stream_name,tbl_separate_student.student_name,tbl_separate_student.course_mode');
		$this->db->where('tbl_separate_student_exam_results.id',$this->uri->segment(2));
		$this->db->where('tbl_separate_student_exam_results.is_deleted','0');
		$this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_exam_results.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_separate_student_exam_results.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_separate_student_exam_results.stream_id');
		$result = $this->db->get('tbl_separate_student_exam_results');
		return $result->row();
	}

    public function get_marksheet_student(){
		$this->db->select('tbl_separate_student.*,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_separate_student.is_deleted','0');
		$this->db->where('tbl_separate_student.enrollment_number',$this->uri->segment(3));
		$this->db->join('tbl_course','tbl_course.id = tbl_separate_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_separate_student.stream_id');
		$result = $this->db->get('tbl_separate_student');
		return $result->row();
	}

    public function generate_marksheet(){ 
		if($this->input->post('marksheet_number') == ""){
			$marksheet_number = date("Ymd");
			$data = array(
				'marksheet_status' 		=> $this->input->post('marksheet_status'),
				'result_declare_date' 	=> date("Y-m-d",strtotime($this->input->post('result_declare_date'))),
				'marksheet_issue_date' 	=> date("Y-m-d",strtotime($this->input->post('marksheet_issue_date'))),
				'print_stream' 			=> $this->input->post('print_stream'),
				'student_id' 			=> $this->input->post('student_id'),
				'final_status' 			=> $this->input->post('final_status'),
				'display_mode' 			=> $this->input->post('display_mode'),
				'year_sem' 				=> $this->input->post('year_sem'),
				'credit_transfer' 		=> $this->input->post('credit_transfer'),
				'result_id' 			=> $this->input->post('result_id'),
				'enrollment_number' 	=> $this->input->post('enrollment_number'),
				'credit_transfer_remark' => $this->input->post('remark'),
				'added_by' 				=> $this->session->userdata('admin_id'),
				'created_on'			=> date("Y-m-d H:i:s"),
			); 
			$this->db->insert('tbl_separate_student_marksheet',$data);
			$last_id = $this->db->insert_id();
			$update = array(
				'marksheet_number' => $marksheet_number.$last_id
			);
			$this->db->where('id',$last_id);
			$this->db->update('tbl_separate_student_marksheet',$update);
			return 0;
		}else{
			$data = array(
				'marksheet_status' 		=> $this->input->post('marksheet_status'),
				'result_declare_date' 	=> date("Y-m-d",strtotime($this->input->post('result_declare_date'))),
				'marksheet_issue_date' 	=> date("Y-m-d",strtotime($this->input->post('marksheet_issue_date'))),
				'print_stream' 			=> $this->input->post('print_stream'),
				'marksheet_number' 		=> $this->input->post('marksheet_number'),
				'student_id' 			=> $this->input->post('student_id'),
				'final_status' 			=> $this->input->post('final_status'),
				'display_mode' 			=> $this->input->post('display_mode'),
				'year_sem' 				=> $this->input->post('year_sem'),
				'credit_transfer' 		=> $this->input->post('credit_transfer'),
				'result_id' 			=> $this->input->post('result_id'),
				'enrollment_number' 	=> $this->input->post('enrollment_number'),
				'added_by' 				=> $this->session->userdata('admin_id'),
				'credit_transfer_remark' => $this->input->post('remark'),
			);
			$this->db->where('marksheet_number',$this->input->post('marksheet_number'));
			$this->db->where('student_id',$this->input->post('student_id'));
			$this->db->update('tbl_separate_student_marksheet',$data);
			return 1;
		} 
	}

    public function get_selected_subject_for_result($result_id){
		$this->db->select('tbl_separate_student_examination_result_details.*,tbl_subject.subject_name,tbl_subject.subject_code,tbl_subject.subject_type');
		$this->db->where('tbl_separate_student_examination_result_details.is_deleted','0');
		$this->db->where('tbl_separate_student_examination_result_details.status','1');
		$this->db->where('tbl_separate_student_examination_result_details.result_id',$result_id);
		$this->db->join('tbl_subject','tbl_subject.id = tbl_separate_student_examination_result_details.subject_id');
		$this->db->order_by('tbl_subject.subject_code','ASC');
		$result = $this->db->get('tbl_separate_student_examination_result_details');
		return $result->result();
	}	

    public function get_marksheet_status_by_result($result_id){
		$this->db->where('result_id',$result_id);
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_separate_student_marksheet');
		return $result->row();
	}


    public function update_result(){
		$month=$_POST['comboMonth'];        
		$year=$_POST['comboYear'];
		$totalIMM=$_POST['txtTIMM'];        
		$totalIMO=$_POST['txtTIMO'];
		$totalEMM=$_POST['txtTEMM'];
		$totalEMO=$_POST['txtTEMO'];
		$examStatus=$_POST['comboExamStatus'];        
		$totalResult=$_POST['comboTResult'];
		$resultId=$_POST['txtResultId'];
		$update = array(
			'examination_month' 		=> $month,
			'examination_year' 			=> $year,
			'internal_max_marks' 		=> $totalIMM,
			'internal_marks_obtained'	=> $totalIMO,
			'external_max_marks' 		=> $totalEMM,
			'external_marks_obtained' 	=> $totalEMO,
			'result' 					=> $totalResult,
			'added_by' 					=> $this->session->userdata('admin_id'),
			'examination_status' 		=> $examStatus,
		);  
		$this->db->where('id',$resultId);
		$this->db->update('tbl_separate_student_exam_results',$update);
		if(isset($_REQUEST["txtSubjectId1"]) && $_REQUEST["txtSubjectId1"] !=""){
			$this->db->where('result_id',$resultId);
			$this->db->delete('tbl_separate_student_examination_result_details');
			$i=1;
			while(isset($_REQUEST["txtSubjectId".$i])){
				$new_subject_id = $_REQUEST["txtSubjectId".$i];
				if(isset($_REQUEST["new_subject".$i]) && $_REQUEST["new_subject".$i] != ""){
					$new_subject_id = $_REQUEST["new_subject".$i];
				} 
				$data = array(
					'result_id' 				=> $resultId,
					'subject_id' 				=> $new_subject_id,
					'internal_max_marks' 		=> $_REQUEST["txtIMM".$i],
					'internal_marks_obtained' 	=> $_REQUEST["txtIMO".$i],
					'external_max_marks' 		=> $_REQUEST["txtEMM".$i],
					'external_marks_obtained' 	=> $_REQUEST["txtEMO".$i],
					'result' 					=> $_REQUEST["comboResult".$i],
				);
				$this->db->insert('tbl_separate_student_examination_result_details',$data);
				$i++;
			}
		}
		return true;
	}

    public function delete_result(){
		$data = array(
			'is_deleted' => '1'
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_separate_student_exam_results',$data);
		$this->db->where('result_id',$this->uri->segment(2));
		$this->db->update('tbl_separate_student_examination_result_details',$data);
		return true;
	}	
    
    
    public function activate_all_separate_student_results(){
		$data = array(
			"status"=>'1'
		);
		$this->db->update("tbl_separate_student_exam_results",$data);
	}

	public function deactivate_all_separate_student_results(){
		$data = array(
			"status"=>'0'
		);
		$this->db->update("tbl_separate_student_exam_results",$data);
	}
	
	public function get_all_centers(){
		$this->db->where("is_deleted","0");
		$this->db->where("status","1");
		$result = $this->db->get("tbl_center");
		return $result->result();
	}
	   
	   	public function get_all_separate_student_generated_result_ajax($length,$start,$search){
		$this->db->select('tbl_separate_student_exam_results.*,tbl_separate_student.student_name,tbl_center.center_name');
		$this->db->where('tbl_separate_student_exam_results.is_deleted','0');
		$this->db->where("tbl_separate_student_exam_results.examination_month","August");
		$this->db->where("tbl_separate_student_exam_results.examination_year","2021");
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_separate_student.student_name',$search);
			$this->db->or_like('tbl_separate_student_exam_results.enrollment_number',$search);
			$this->db->or_like('tbl_separate_student_exam_results.created_on',$search);
			$this->db->or_like('tbl_center.center_name',$search);

			$this->db->group_end();
		}
		$this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_exam_results.student_id');
		$this->db->join("tbl_center","tbl_center.id=tbl_separate_student_exam_results.added_by");
		$this->db->order_by('tbl_separate_student_exam_results.id','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_separate_student_exam_results');
		return $result->result();
	}

	public function get_all_separate_student_generated_result_ajax_count($search){
		$this->db->select('tbl_separate_student_exam_results.*,tbl_separate_student.student_name,tbl_center.center_name');
		$this->db->where('tbl_separate_student_exam_results.is_deleted','0');
		$this->db->where("tbl_separate_student_exam_results.examination_month","August");
		$this->db->where("tbl_separate_student_exam_results.examination_year","2021");

		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_separate_student.student_name',$search);
			$this->db->or_like('tbl_separate_student_exam_results.enrollment_number',$search);
			$this->db->or_like('tbl_separate_student_exam_results.created_on',$search);
			$this->db->or_like('tbl_center.center_name',$search);

			$this->db->group_end();
		}
		$this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_exam_results.student_id');
		$this->db->join("tbl_center","tbl_center.id=tbl_separate_student_exam_results.added_by");
		$this->db->order_by('tbl_separate_student_exam_results.id','ASC');
		
		$result = $this->db->get('tbl_separate_student_exam_results');
		return $result->num_rows();
	}
	   
    
    public function get_student_profile(){
		$this->db->where('id',$this->session->userdata('separate_student_id'));
		$result = $this->db->get('tbl_separate_student');
		return $result->row();
	}

	public function get_admission_form(){
		$this->db->select('tbl_separate_student.*,tbl_session.session_name,tbl_faculty.faculty_name,tbl_course.print_name,tbl_stream.stream_name,tbl_course_type.course_type as course_type_name,tbl_center.center_name, tbl_course_stream_relation.year_duration as duration');
		$this->db->where('tbl_separate_student.is_deleted','0');
		$this->db->where('tbl_separate_student.id',$this->session->userdata('separate_student_id'));

		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_separate_student.course_type');
		$this->db->join('tbl_course','tbl_course.id = tbl_separate_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_separate_student.stream_id');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_separate_student.faculty_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_separate_student.session_id');
	


		$this->db->join('tbl_center','tbl_center.id = tbl_separate_student.center_id');

		$this->db->join('tbl_course_stream_relation','tbl_separate_student.course_id = tbl_course_stream_relation.course');
		
		$result = $this->db->get('tbl_separate_student');
		return $result->row();
	}


	public function set_password(){
		$data = array(
			'password' => $this->input->post('new_password')
 		);
		$this->db->where('id',$this->session->userdata('separate_student_id'));
		$this->db->update('tbl_separate_student',$data);
		return true;
	}	

	public function get_old_password(){
		$this->db->where('id',$this->session->userdata('separate_student_id'));
		$this->db->where('password',$this->input->post('old_password'));
		$result = $this->db->get('tbl_separate_student');
		echo $result->num_rows();
	}


	public function get_my_all_result(){
		$this->db->where('is_deleted','0');	
		$this->db->where('status','1');	
		$this->db->where('student_id',$this->session->userdata('separate_student_id'));	
		$this->db->order_by('year_sem','ASC');
		$result = $this->db->get('tbl_separate_student_exam_results');
		return $result->result();
	}


	public function get_this_result(){
		$this->db->select('tbl_separate_student_exam_results.*,tbl_course.course_name,tbl_stream.stream_name,tbl_separate_student.student_name,tbl_separate_student.course_mode,tbl_separate_student.father_name,tbl_separate_student_exam_results.examination_month,tbl_separate_student_exam_results.examination_year');

		$this->db->where('tbl_separate_student_exam_results.id',$this->uri->segment(2));
		$this->db->where('tbl_separate_student_exam_results.student_id',$this->session->userdata('separate_student_id'));
		$this->db->where('tbl_separate_student_exam_results.is_deleted','0');
		$this->db->where('tbl_separate_student_exam_results.status','1');
		$this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_exam_results.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_separate_student_exam_results.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_separate_student_exam_results.stream_id');
		$result = $this->db->get('tbl_separate_student_exam_results');
		return $result->row();
	}
	
	//10/5/2021

	public function set_separate_student_account(){
		$data = array(
			"separate_student_id"=>$this->input->post("separate_student_id"),
			"fees"=>$this->input->post("fees"),
			"remark"=>$this->input->post("remark"),
		);

		if(empty($this->input->post("id"))){
			$data["year_sem"] = $this->input->post("year_sem");
			$data["created_on"] = date("Y-m-d H:i:s");

			$this->db->insert("tbl_separate_student_fees",$data);
			return "saved";
		}else{
			$this->db->where("id",$this->input->post("id"));
			$this->db->update("tbl_separate_student_fees",$data);
			return "updated";
		}
	}

	public function get_separate_student_fees_for_edit(){
		
		$this->db->where("is_deleted","0");
		$this->db->where("id",$this->uri->segment(3));
		$result = $this->db->get("tbl_separate_student_fees")->row();
		return $result;

	}

	public function get_separate_student_account_details(){
		$this->db->where("is_deleted","0");
		$this->db->where("separate_student_id",$this->uri->segment(2));
		$result = $this->db->get("tbl_separate_student_fees")->result();
		return $result;
	}
	
	public function separate_student_re_registration(){
		$data = array(
			"year_sem"=>$this->input->post("year_sem"),
		);

		$this->db->where("id",$this->input->post("separate_student_id"));
		$this->db->update("tbl_separate_student",$data);
	}
	
	
	
		public function get_search_markheet(){
		$this->db->select('tbl_separate_student_marksheet.*,tbl_separate_student.student_name,tbl_separate_student.enrollment_number,tbl_course.course_name,tbl_stream.stream_name,tbl_separate_student_exam_results.result,tbl_separate_student_exam_results.examination_month,tbl_separate_student_exam_results.examination_year');


		if($this->input->post('month') != ""){
			$this->db->where('tbl_separate_student_exam_results.examination_month',$this->input->post('month'));
		}
		if($this->input->post('year') != ""){
			$this->db->where('tbl_separate_student_marksheet.year_sem',$this->input->post('year'));
		}
		if($this->input->post('course') != ""){
			$this->db->where('tbl_separate_student.course_id',$this->input->post('course'));
		}
		if($this->input->post('stream') != ""){
			$this->db->where('tbl_separate_student.stream_id',$this->input->post('stream'));
		}
		if($this->input->post('enrollment') != ""){
			$this->db->where('tbl_separate_student_marksheet.enrollment_number',$this->input->post('enrollment'));
		}
		if($this->input->post('marksheet_number') != ""){
			$this->db->where('tbl_separate_student_marksheet.marksheet_number',$this->input->post('marksheet_number'));
		} 
		$this->db->where('tbl_separate_student_marksheet.is_deleted','0');
		$this->db->join('tbl_separate_student_exam_results','tbl_separate_student_exam_results.id = tbl_separate_student_marksheet.result_id');
		$this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_marksheet.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_separate_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_separate_student.stream_id');
		$result = $this->db->get('tbl_separate_student_marksheet');
		return $result->result();
	}

	public function get_single_marksheet(){
		$this->db->select('tbl_separate_student_marksheet.*,tbl_separate_student_exam_results.result,tbl_separate_student_exam_results.examination_month,tbl_separate_student_exam_results.examination_year,tbl_separate_student.student_name,tbl_separate_student.father_name,tbl_separate_student.date_of_birth,tbl_separate_student.mother_name,tbl_course.course_name,tbl_course.id as course_id,tbl_stream.stream_name,tbl_session.session_name,tbl_session.pre_session');
		$this->db->where('tbl_separate_student_marksheet.is_deleted','0');
		$this->db->where('tbl_separate_student_marksheet.id',$this->uri->segment(2));
		$this->db->join('tbl_separate_student_exam_results','tbl_separate_student_exam_results.id = tbl_separate_student_marksheet.result_id');
		$this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_marksheet.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_separate_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_separate_student.stream_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_separate_student.session_id');
		$result = $this->db->get('tbl_separate_student_marksheet');
		return $result->row();
	}


	public function edit_marksheet(){
		$data = array(
			'result_declare_date' 	=> date("Y-m-d",strtotime($this->input->post('result_declare_date'))),
			'marksheet_issue_date' 	=> date("Y-m-d",strtotime($this->input->post('marksheet_issue_date'))),
			'marksheet_status' 		=> $this->input->post('marksheet_status'),
			'print_stream' 			=> $this->input->post('print_stream'),
			'final_status' 			=> $this->input->post('final_status'),
			'display_mode' 			=> $this->input->post('display_mode'),
			'year_sem'		 		=> $this->input->post('year_sem'),
			'credit_transfer' 		=> $this->input->post('credit_transfer'),
			'credit_transfer_remark' => $this->input->post('remark'),
		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tbl_separate_student_marksheet',$data);
		return true;
	}


	public function delete_marksheet(){
		$data = array(
			'is_deleted' => '1'
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_separate_student_marksheet',$data);
		return true;
	}
	
	
// 	public function get_selected_subject_for_result($result_id){
// 		$this->db->select('tbl_separate_student_examination_result_details.*,tbl_subject.subject_name,tbl_subject.subject_code,tbl_subject.subject_type');
// 		$this->db->where('tbl_separate_student_examination_result_details.is_deleted','0');
// 		$this->db->where('tbl_separate_student_examination_result_details.status','1');
// 		$this->db->where('tbl_separate_student_examination_result_details.result_id',$result_id);
// 		$this->db->join('tbl_subject','tbl_subject.id = tbl_separate_student_examination_result_details.subject_id');
// 		$result = $this->db->get('tbl_separate_student_examination_result_details');
// 		return $result->result();
// 	}	
	
	
	
	public function generated_results_excel(){
		$courses = array(262,263,261,228);
		$to_date = date("Y-m-d",strtotime($this->input->post("date"))).' 00:00:00';
		$from_date = date("Y-m-d",strtotime($this->input->post("date"))).' 23:59:59';
		//echo date("Y-m-d",strtotime($this->input->post("date")));exit;
		$this->db->select("tbl_separate_student_marksheet.*,tbl_separate_student_exam_results.examination_month,tbl_separate_student_exam_results.examination_year,tbl_separate_student_exam_results.internal_max_marks,tbl_separate_student_exam_results.external_max_marks,tbl_separate_student_exam_results.internal_marks_obtained,tbl_separate_student_exam_results.external_marks_obtained,tbl_separate_student_exam_results.result,tbl_separate_student.student_name,tbl_separate_student.father_name, tbl_course.print_name, tbl_stream.stream_name,tbl_separate_student.username,tbl_separate_student.password,tbl_center.center_name");
		$this->db->where_not_in("tbl_separate_student.course_id",$courses);
		$this->db->where("tbl_separate_student_marksheet.is_deleted",'0');
		$this->db->where("tbl_separate_student_marksheet.status",'1');
		//$this->db->where("tbl_separate_student_marksheet.result_declare_date",date("Y-m-d",strtotime($this->input->post("date"))));
		//$this->db->where("tbl_separate_student_marksheet.created_on",date("Y-m-d",strtotime($this->input->post("date"))));
		if($this->input->post("date") != ""){
			$this->db->where("tbl_separate_student_marksheet.created_on >=",$to_date);
			$this->db->where("tbl_separate_student_marksheet.created_on <=",$from_date);
		}

		$this->db->join("tbl_separate_student_exam_results","tbl_separate_student_exam_results.id = tbl_separate_student_marksheet.result_id");
		$this->db->join("tbl_separate_student","tbl_separate_student.id = tbl_separate_student_marksheet.student_id");
		$this->db->join("tbl_course","tbl_course.id = tbl_separate_student.course_id");
		$this->db->join("tbl_stream","tbl_stream.id = tbl_separate_student.stream_id");
		$this->db->join("tbl_center","tbl_center.id = tbl_separate_student.center_id");
		$this->db->order_by('tbl_separate_student_marksheet.id','DESC');
		$result = $this->db->get("tbl_separate_student_marksheet")->result();
		//print_r($result);exit;

		// header('Content-Dispostion:attachment;');
		// $file_name = "student_results.csv";

		// $f  = fopen("result_excels/".$file_name,"w");
		$all_data = array();
		

		// fputcsv($f,$array_of_heading);
		// $all_data[] = $array_of_heading;
		$i = 1;
		foreach ($result as $res){
		
		
		if($res->examination_month == "August"  && $res->examination_year =="2021"){
			if(date("Y-m-d",strtotime($res->created_on)) <= '2022-02-12'){
				$image =  base_url("images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png");
			}else if(date("Y-m-d",strtotime($res->created_on)) >= '2022-02-19'){
				$image =  base_url("images/signature_contrroler/sahakhan.png");
			}
			}else if($res->examination_month == "January"  && $res->examination_year =="2022"){ 
			if(date("Y-m-d",strtotime($res->created_on)) <= '2022-02-12'){
				$image =  base_url("images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png");
			}else if(date("Y-m-d",strtotime($res->created_on)) >= '2022-02-19'){
				$image =  base_url("images/signature_contrroler/sahakhan.png");
			 }
		}else if($res->examination_month == "July"  && $res->examination_year =="2022"){
                  $image = base_url("images/signature_contrroler/sahakhan.png");
                 
             } 

			$this->db->select("tbl_separate_student_examination_result_details.*,tbl_subject.subject_code,tbl_subject.subject_name");
			$this->db->where("tbl_separate_student_examination_result_details.is_deleted","0");
			$this->db->where("tbl_separate_student_examination_result_details.status","1");
			$this->db->where("tbl_separate_student_examination_result_details.result_id",$res->result_id);

			$this->db->join("tbl_subject","tbl_subject.id = tbl_separate_student_examination_result_details.subject_id");

			$data = $this->db->get("tbl_separate_student_examination_result_details")->result();

			if(empty($data)){
				continue; // if $data is empty don't run the below code
			}

			$array_of_row = array();
			$array_of_row[] = $i++;
			$array_of_row[] = $image;
			$array_of_row[] = $res->center_name;
			$array_of_row[] = date("d-m-Y",strtotime($res->created_on));
			$array_of_row[] = intval($res->enrollment_number);
			$array_of_row[] = $res->username;
			$array_of_row[] = $res->password;
			$array_of_row[] = $res->student_name;
			$array_of_row[] = $res->father_name;
			
			

			if($res->display_mode == '1'){
				//if year
				if($res->year_sem==1){
					$array_of_row[] = "I";	
				}else if($res->year_sem==2){
					$array_of_row[] = "II";
				}else if($res->year_sem==3){
					$array_of_row[] = "III";
				}
				else if($res->year_sem==4){
					$array_of_row[] = "IV";
				}else if($res->year_sem==5){
					$array_of_row[] = "V";
				}else if($res->year_sem==6){
					$array_of_row[] = "VI";
				}else if($res->year_sem==7){
					$array_of_row[] = "VII";
				}else if($res->year_sem==8){
					$array_of_row[] = "VIII";
				}else if($res->year_sem==9){
					$array_of_row[] = "IX";
				}else{
					$array_of_row[] = "";
				}
				
				$array_of_row[] = "";
			}else{
				//if sem

				if($res->year_sem == 1 || $res->year_sem == 2){
					$array_of_row[] = "I";
				}else if($res->year_sem == 3 || $res->year_sem == 4){
					$array_of_row[] = "II";
				}else if($res->year_sem == 5 || $res->year_sem == 6){
					$array_of_row[] = "III";
				}else if($res->year_sem == 7 || $res->year_sem == 8){
					$array_of_row[] = "IV";
				}else if($res->year_sem == 9 || $res->year_sem == 10){
					$array_of_row[] = "V";
				}else if($res->year_sem == 11 || $res->year_sem == 12){
					$array_of_row[] = "VI";
				}else if($res->year_sem == 13 || $res->year_sem == 14){
					$array_of_row[] = "VII";
				}else{
					$array_of_row[] = "";
				}

				if($res->year_sem==1){
					$array_of_row[] = "I";	
				}else if($res->year_sem==2){
					$array_of_row[] = "II";
				}else if($res->year_sem==3){
					$array_of_row[] = "III";
				}
				else if($res->year_sem==4){
					$array_of_row[] = "IV";
				}else if($res->year_sem==5){
					$array_of_row[] = "V";
				}else if($res->year_sem==6){
					$array_of_row[] = "VI";
				}else if($res->year_sem==7){
					$array_of_row[] = "VII";
				}else if($res->year_sem==8){
					$array_of_row[] = "VIII";
				}else if($res->year_sem==9){
					$array_of_row[] = "IX";
				}else{
					$array_of_row[] = "";
				}

			}
			
			$array_of_row[] = strtoupper($res->print_name);
			$array_of_row[] = strtoupper($res->stream_name);


			$array_of_row[] = $res->examination_month.", ".$res->examination_year;
			
			$array_of_row[] = $res->external_max_marks+$res->internal_max_marks;
			$array_of_row[] = $res->external_marks_obtained+$res->internal_marks_obtained;
			$percentage = (($res->external_marks_obtained+$res->internal_marks_obtained)/($res->external_max_marks+$res->internal_max_marks))*100;
			$array_of_row[] = $percentage;

			

			if($percentage >= 60){
				$array_of_row[] = "A";
			}else if($percentage < 60 and $percentage >= 45){
				$array_of_row[] = "B";
			}else if($percentage < 45 and $percentage >= 35){
				$array_of_row[] = "C";
			}else{
				$array_of_row[] = "";
			}
			$array_of_row[] = $res->result=='0'?"PASS":"FAIL";
			$array_of_row[] = $res->result_declare_date;


			/*foreach ($data as $dt) {
				
				
				$subject_name = strtoupper($dt->subject_name);
				
				$string = htmlentities($subject_name, null, 'utf-8');
				$content = str_replace("&nbsp;", "", $string);
				$content = html_entity_decode($content);
				
				//echo "<pre>";
				//echo $content;
				
				$array_of_row[] = $dt->subject_code;
				$array_of_row[] = $content;

				$array_of_row[] = $dt->external_max_marks;
				$array_of_row[] = $dt->external_marks_obtained;
				$array_of_row[] = $dt->internal_max_marks;
				$array_of_row[] = $dt->internal_marks_obtained;
				$array_of_row[] = $dt->external_max_marks+$dt->internal_max_marks."/".ceil(($dt->external_max_marks+$dt->internal_max_marks)/3);

				$array_of_row[] =  $dt->external_marks_obtained+$dt->internal_marks_obtained;
				$array_of_row[] = $dt->result=='0'?"P":"F";

			}*/
			for($z=0;$z<20;$z++){
			//foreach ($data as $dt) {
    			if($data[$z]->subject_name != ""){
    				$subject_name = strtoupper($data[$z]->subject_name);
    					
    				$string = htmlentities($subject_name, null, 'utf-8');
    				$content = str_replace("&nbsp;", "", $string);
    				$content = html_entity_decode($content);
    				
    				$array_of_row[] = $data[$z]->subject_code;
    				$array_of_row[] = $content;
    				
    				$array_of_row[] = $data[$z]->external_max_marks;
    				$array_of_row[] = $data[$z]->external_marks_obtained;
    				$array_of_row[] = $data[$z]->internal_max_marks;
    				$array_of_row[] = $data[$z]->internal_marks_obtained;
    				$array_of_row[] = $data[$z]->external_max_marks+$data[$z]->internal_max_marks."/".ceil(($data[$z]->external_max_marks+$data[$z]->internal_max_marks)/3);
    
    				$array_of_row[] =  $data[$z]->external_marks_obtained+$data[$z]->internal_marks_obtained;
    				$array_of_row[] = $data[$z]->result=='0'?"P":"F";
    			}else{
    			    $array_of_row[] = '';
    				$array_of_row[] = '';
    				
    				$array_of_row[] = '';
    				$array_of_row[] = '';
    				$array_of_row[] = '';
    				$array_of_row[] = '';
    				$array_of_row[] = '';
    
    				$array_of_row[] = '';
    				$array_of_row[] = '';
    			}

			}
			$array_of_row[] = $res->credit_transfer_remark;
			
			// fputcsv($f,$array_of_row);

			if(count($array_of_row) <= 197){
				// $len = count($array_of_row) - count($array_of_heading;
					for($j=count($array_of_row);$j<=197;$j++){
						$array_of_row[] = "";
					}
			}

			$all_data[] = $array_of_row;

		}
		//exit;

		// fclose($f);
		return $all_data;
	}
	
	
	
	
	
	
	public function generated_pre_results_excel(){
		$courses = array(262,263,261,228);
		$to_date = date("Y-m-d",strtotime($this->input->post("date"))).' 00:00:00';
		$from_date = date("Y-m-d",strtotime($this->input->post("date"))).' 23:59:59';
		//echo date("Y-m-d",strtotime($this->input->post("date")));exit;
		$this->db->select("tbl_separate_student_marksheet.*,tbl_separate_student_exam_results.examination_month,tbl_separate_student_exam_results.examination_year,tbl_separate_student_exam_results.internal_max_marks,tbl_separate_student_exam_results.external_max_marks,tbl_separate_student_exam_results.internal_marks_obtained,tbl_separate_student_exam_results.external_marks_obtained,tbl_separate_student_exam_results.result,tbl_separate_student.student_name,tbl_separate_student.father_name,tbl_separate_student.mother_name, tbl_course.print_name, tbl_stream.stream_name");
		$this->db->where_in("tbl_separate_student.course_id",$courses);
		$this->db->where("tbl_separate_student_marksheet.is_deleted",'0');
		$this->db->where("tbl_separate_student_marksheet.status",'1');
		//$this->db->where("tbl_separate_student_marksheet.result_declare_date",date("Y-m-d",strtotime($this->input->post("date"))));
		//$this->db->where("tbl_separate_student_marksheet.created_on",date("Y-m-d",strtotime($this->input->post("date"))));
		if($this->input->post("date") != ""){
			$this->db->where("tbl_separate_student_marksheet.created_on >=",$to_date);
			$this->db->where("tbl_separate_student_marksheet.created_on <=",$from_date);
		}

		$this->db->join("tbl_separate_student_exam_results","tbl_separate_student_exam_results.id = tbl_separate_student_marksheet.result_id");
		$this->db->join("tbl_separate_student","tbl_separate_student.id = tbl_separate_student_marksheet.student_id");
		$this->db->join("tbl_course","tbl_course.id = tbl_separate_student.course_id");
		$this->db->join("tbl_stream","tbl_stream.id = tbl_separate_student.stream_id");
		$this->db->order_by('tbl_separate_student_marksheet.id','DESC');
		$result = $this->db->get("tbl_separate_student_marksheet")->result();
		//print_r($result);exit;

		// header('Content-Dispostion:attachment;');
		// $file_name = "student_results.csv";

		// $f  = fopen("result_excels/".$file_name,"w");
		$all_data = array();
		

		// fputcsv($f,$array_of_heading);
		// $all_data[] = $array_of_heading;
		$i = 1;
		foreach ($result as $res){
		
		
		if($res->examination_month == "August"  && $res->examination_year =="2021"){
			if(date("Y-m-d",strtotime($res->created_on)) <= '2022-02-12'){
				$image =  base_url("images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png");
			}else if(date("Y-m-d",strtotime($res->created_on)) >= '2022-02-19'){
				$image =  base_url("images/signature_contrroler/sahakhan.png");
			}
			}else if($res->examination_month == "January"  && $res->examination_year =="2022"){ 
			if(date("Y-m-d",strtotime($res->created_on)) <= '2022-02-12'){
				$image =  base_url("images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png");
			}else if(date("Y-m-d",strtotime($res->created_on)) >= '2022-02-19'){
				$image =  base_url("images/signature_contrroler/sahakhan.png");
			 }
		}

			$this->db->select("tbl_separate_student_examination_result_details.*,tbl_subject.subject_code,tbl_subject.subject_name");
			$this->db->where("tbl_separate_student_examination_result_details.is_deleted","0");
			$this->db->where("tbl_separate_student_examination_result_details.status","1");
			$this->db->where("tbl_separate_student_examination_result_details.result_id",$res->result_id);

			$this->db->join("tbl_subject","tbl_subject.id = tbl_separate_student_examination_result_details.subject_id");

			$data = $this->db->get("tbl_separate_student_examination_result_details")->result();

			if(empty($data)){
				continue; // if $data is empty don't run the below code
			}

	    	$array_of_row = array();
			$array_of_row[] = $i++; 
			$array_of_row[] = $image;
			 
			$array_of_row[] = intval($res->enrollment_number);
			$array_of_row[] = $res->student_name;
			$array_of_row[] = $res->father_name;
			$array_of_row[] = $res->mother_name; 
			$array_of_row[] = strtoupper($res->print_name);  
			$array_of_row[] = $res->external_max_marks+$res->internal_max_marks;
			$array_of_row[] = $res->external_marks_obtained+$res->internal_marks_obtained;
			
			$percentage = (($res->external_marks_obtained+$res->internal_marks_obtained)/($res->external_max_marks+$res->internal_max_marks))*100;
			//$array_of_row[] = $percentage; 
			$this->load->library('SimpleFunctions');
            $obj = new SimpleFunctions();
			$word = $res->external_marks_obtained+$res->internal_marks_obtained;
			$word = $obj->toText($word);
			$array_of_row[] = $word;
			$array_of_row[] = $res->result=='0'?"PASS":"FAIL";
			if($percentage >= 60){
				$array_of_row[] = "First";
			}else if($percentage < 60 and $percentage >= 45){
				$array_of_row[] = "Second";
			}else if($percentage < 45 and $percentage >= 35){
				$array_of_row[] = "Third";
			}else{
				$array_of_row[] = $percentage;
			}
			$array_of_row[] = $res->result_declare_date;


			foreach ($data as $dt) {
				$subject_name = strtoupper($dt->subject_name);
				
				$string = htmlentities($subject_name, null, 'utf-8');
				$content = str_replace("&nbsp;", "", $string);
				$content = html_entity_decode($content);
				
				$array_of_row[] = $dt->subject_code;
				$array_of_row[] = $content;
                
				$array_of_row[] = $dt->external_marks_obtained+$dt->internal_marks_obtained;
				//$array_of_row[] = $dt->external_max_marks+$dt->internal_max_marks; 
				$array_of_row[] =ceil(($dt->external_max_marks+$dt->internal_max_marks)/3);
            	$array_of_row[] = $dt->external_max_marks+$dt->internal_max_marks;
			
				//$array_of_row[] =  $dt->external_marks_obtained+$dt->internal_marks_obtained;
				//$array_of_row[] = $dt->result=='0'?"P":"F";

			}

			
			// fputcsv($f,$array_of_row);

			if(count($array_of_row) < 113){
				// $len = count($array_of_row) - count($array_of_heading;
					for($j=count($array_of_row);$j<113;$j++){
						$array_of_row[] = "";
					}
			}

			$all_data[] = $array_of_row;

		}
		// fclose($f);
		return $all_data;
	}
	
	
	public function get_separate_progress_report_list($length,$start,$search){
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
		$result = $this->db->get('tbl_separate_progress_report');
		return $result->result();
	}
	public function get_separate_progress_report_list_count($search){
		$this->db->where('is_deleted', '0'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('progress_report',$search);
			$this->db->or_like('remark',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_separate_progress_report');
		return $result->num_rows();
	} 
	public function get_separate_abstract_report_list($length,$start,$search){
		$this->db->where('is_deleted', '0');
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('upload_report',$search);
			$this->db->or_like('remark',$search);
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_separate_abstract');
		return $result->result();
	}
	public function get_separate_abstract_report_list_count($search){
		$this->db->where('is_deleted', '0'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('upload_report',$search);
			$this->db->or_like('remark',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_separate_abstract');
		return $result->num_rows();
	} 
	public function hold_separate_login(){
		$data = array(
			'hold_login' => '1' 
		);
		$this->db->update('tbl_separate_student',$data);
		return true;
	}
	public function activate_separate_login(){
		$data = array(
			'hold_login' => '0' 
		);
		$this->db->update('tbl_separate_student',$data);
		return true; 
	} 
	public function hold_separate_login_single(){
		$data = array(
			'hold_login' => '1' 
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_separate_student',$data);
		return true;
	}
	public function activate_separate_login_single(){
		$data = array(
			'hold_login' => '0' 
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_separate_student',$data);
		return true;
	}
	public function seprate_bulk_marksheet_activation(){
		$ids = array();
		$resukt_id = $this->input->post('resukt_id');
		for($i=0;$i<=count($resukt_id);$i++){
			$ids[] = $resukt_id[$i];
		} 
		if(!empty($ids)){
			$this->db->where_in('id',$ids);
			$result = $this->db->get('tbl_separate_student_exam_results');
			$result = $result->result();
			if(!empty($result)){
				foreach($result as $single_result){
					$result_date = "01-11-2021";
					$marksheet_date = "01-11-2021";
					if($single_result->examination_month == "August" && $single_result->examination_year == "2021"){
						$result_date = "01-11-2021";
						$marksheet_date = "01-11-2021";
					}else if($single_result->examination_month == "January" && $single_result->examination_year == "2022"){
						$result_date = "14-03-2022";
						$marksheet_date = "14-03-2022";
					}else if($single_result->examination_month == "July" && $single_result->examination_year == "2022"){
						$result_date = "25-08-2022";
						$marksheet_date = "25-08-2022";
					}
					$this->db->where('id',$single_result->student_id);
					$student = $this->db->get('tbl_separate_student');
					$student = $student->row();
					
					$this->db->where('course',$single_result->course_id);
					$this->db->where('stream',$single_result->stream_id);
					$course_stream = $result = $this->db->get('tbl_course_stream_relation');
					$course_stream = $course_stream->row();
					$marksheet_number = date("Ymd");
					$data = array(
						'marksheet_status' 		=> '0',
						'result_declare_date' 	=> $result_date,
						'marksheet_issue_date' 	=> $marksheet_date,
						'print_stream' 			=> "1",
						'student_id' 			=> $student->id,
						'final_status' 			=> "0",
						'display_mode' 			=> $course_stream->course_mode,
						'year_sem' 				=> $single_result->year_sem,
						'credit_transfer' 		=> '0',
						'result_id' 			=> $single_result->id,
						'enrollment_number' 	=> $student->enrollment_number,
						'credit_transfer_remark' => '',
						'added_by' 				=> $this->session->userdata('admin_id'),
						'created_on'			=> date("Y-m-d H:i:s"),
					); 
					 
					$this->db->insert('tbl_separate_student_marksheet',$data);
					$last_id = $this->db->insert_id();
					$update = array(
						'marksheet_number' => $marksheet_number.$last_id
					);
					$this->db->where('id',$last_id);
					$this->db->update('tbl_separate_student_marksheet',$update);
				}
			}
		}
		return 0;
	}
}
?>
