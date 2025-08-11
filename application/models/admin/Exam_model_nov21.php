<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Exam_model extends CI_Model { 
	public function get_all_exam_list($length,$start,$search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('test_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_test_title_for_phd');
		return $result->result();
	}
	public function get_all_exam_list_count($search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('test_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','ASC');
		$result = $this->db->get('tbl_test_title_for_phd');
		return $result->num_rows();
	}
	public function set_quiz_question(){
		if($this->input->post('question') == ""){
			return NULL;
		}
		$options = $this->input->post('ans');
		$update_to = $this->input->post('question_number_id');
		$photo ='';
		if($_FILES['img_file']['name'] !=""){
			$tmp = explode('.', $_FILES['img_file']['name']);
			$ext = end($tmp);
			$config = array(
				'upload_path' 	=> "images/phd_quiz/",
				'allowed_types' => "jpg|jpeg|png",
				'encrypt_name'	=> TRUE,
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
			"question" 		=> $this->input->post('question'),
			"selected_ans" 	=> $this->input->post('correct_ans'),
			"options" 		=> $options,
			"img_data" 		=> $photo,
		);
		$data = array(
			"created_by" 	=> $this->session->userdata('admin_id'),
			"test_id" 		=> $this->uri->segment(2),
			"text_data" 	=> json_encode(['options' => $text_data]),
			"correct_ans" 	=> $this->input->post('correct_ans'),
			"created_on" 	=> date("Y-m-d H:i:s"),
		);
		$this->save_question_to_db($data,$update_to);
	}
	public function save_question_to_db($data,$update_to){
		if($update_to){
			$this->db->where('id',$update_to);
			$this->db->update('tbl_question_ans', $data);	
		}else{
			$this->db->insert('tbl_question_ans', $data);
		}
	}
	public function get_quiz_by_test_id(){
		$this->db->where('test_id',$this->uri->segment(2)); 
		$this->db->where('question_type','1');
		$result = $this->db->get('tbl_question_ans');
		return $result->result();
	}
	public function get_test_title(){ 
        $this->db->where('is_deleted','0'); 
        $this->db->where('status','1'); 
        $this->db->where('id',$this->uri->segment(2)); 
        $result = $this->db->get('tbl_test_title_for_phd'); 
		return $result->row();
    } 
	public function delete_quiz_question(){
		$this->db->where('id',$this->input->post('question_id'));
		$this->db->where('test_id',$this->input->post('test_id'));
		$this->db->delete('tbl_question_ans');
		return true;
	}
	public function get_question_edit($id){ 
        $this->db->where('is_deleted','0'); 
        $this->db->where('id',$id); 
        $result = $this->db->get('tbl_question_ans'); 
        return $result->row(); 
    }
	public function get_all_test_titles(){
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_test_title_for_phd');
		return $result->result();
	}
	public function get_single_test(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_test_title_for_phd');
		return $result->row();
	}
	public function set_test_title(){
		$data = array(
			"test_name" 	=> $this->input->post('test_name'),	
			"common_question_limit" 	=> $this->input->post('common_question_limit'),	
			"stream_question_limit" 	=> $this->input->post('stream_question_limit'),	
			"created_by" 	            => $this->session->userdata('admin_id'),
		);
		if($this->input->post('id') == ""){
			$date = array(
				"created_on" 	=>  date("Y-m-d H:i:s"),
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_test_title_for_phd',$new_arr);
			$id = $this->db->insert_id();
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_test_title_for_phd',$data);
			$id = $this->input->post('id');
		}
		return $id;
	}
	
	
	
	
    
    public function get_question_by_id($id){ 
        $this->db->where('status','0'); 
        $this->db->where('id',$id); 
        $result = $this->db->get('tbl_question_ans'); 
        return $result->row(); 
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
        foreach ($answers as $key) { 
            $question_ans[$key->id] = $key->correct_ans; 
        } 
        $score = 0; 
        foreach ($json as $key) { 
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
   
	public function save_questions_from_csv($csv_file_name){
		$url = base_url().'uploads/csv/'.$csv_file_name;
		$handle = fopen($url,"r");
		$counter = 0;
		while (($row = fgetcsv($handle, 10000, ",")) != FALSE){
			if($counter > 0){
				$options = array(
					$row[2],$row[3],$row[4],$row[5],
				);
				$text_data = array(
					"question" 		=> $row[1],
					"selected_ans" 	=> $row[6],
					"options" 		=> $options,
				);
				$data = array(
					"created_by" 	=> 'CSV_UPLOAD',
					"test_id" 		=> $this->uri->segment(2),
					"text_data" 	=> json_encode(['options' => $text_data]),
					"correct_ans" 	=> '',
					"created_on" 	=> date("Y-m-d H:i:s"),
				);
				$this->db->insert('tbl_question_ans', $data);
			}
			$counter++;
		}
    }	
	public function clear_exam(){
		$this->db->where('student_email',$this->uri->segment(2));
		$this->db->where('test_id',$this->uri->segment(3));
		$this->db->delete('tbl_phd_ent_scores');
		
		$this->db->where('student_email',$this->uri->segment(2));
		$this->db->where('test_id',$this->uri->segment(3));
		$this->db->delete('tbl_test_phd_students');
		return true;
	}
	public function send_single_password(){
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_phd_registration_form');
		$result = $result->row();
		if(!empty($result)){
			$message = "Hi, Your Ph.D examination login details \n";
			$message .= "URL: ".base_url()."phd_exam_login \n";
			$message .="Username: ".$result->mobile_number." \n";
			$message .="Password: ".$result->password."";
			
			$this->Web_model->send_common_sms($result->mobile_number,$message);
		}
		return true;
	}
	public function set_examination(){
		$data = array(
			'exam_name' 			=> $this->input->post('exam_name'),
			'exam_duration' 		=> $this->input->post('exam_duration'),
			'course_id' 			=> $this->input->post('course'),
			'stream_id' 			=> $this->input->post('stream'),
			'subject_id' 			=> $this->input->post('subject'),
			'year_sem' 				=> $this->input->post('year_sem'),
			'exam_date' 			=> date("Y-m-d",strtotime($this->input->post('exam_date'))),
			'number_of_question' 	=> $this->input->post('number_of_question'),
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_examination',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_examination',$data);
			return 1;
		}
	}
	public function get_single_examination(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_examination');
		return $result->row();
	} 
	public function get_all_examination_list($length,$start,$search){
		$this->db->select('tbl_examination.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_subject.subject_code');
		$this->db->where('tbl_examination.is_deleted','0');
		$this->db->where('tbl_examination.status','1'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_examination.exam_name',$search);
			$this->db->or_like('tbl_examination.exam_duration',$search);
			$this->db->or_like('tbl_examination.number_of_question',$search);
			$this->db->or_like('tbl_examination.year_sem',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('tbl_subject.subject_code',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_examination.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_examination.stream_id');  
		$this->db->join('tbl_subject','tbl_subject.id = tbl_examination.subject_id');  
		$this->db->order_by('tbl_examination.id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_examination');
		return $result->result();
	}
	public function get_all_examination_list_count($search){
		$this->db->select('tbl_examination.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_subject.subject_code');
		$this->db->where('tbl_examination.is_deleted','0');
		$this->db->where('tbl_examination.status','1'); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_examination.exam_name',$search);
			$this->db->or_like('tbl_examination.exam_duration',$search);
			$this->db->or_like('tbl_examination.number_of_question',$search);
			$this->db->or_like('tbl_examination.year_sem',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('tbl_subject.subject_code',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_examination.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_examination.stream_id');  
		$this->db->join('tbl_subject','tbl_subject.id = tbl_examination.subject_id'); 
		$this->db->order_by('tbl_examination.id','DESC');
		$result = $this->db->get('tbl_examination');
		return $result->num_rows();
	}
	public function get_course_stream_duration($course,$stream){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$course);
		$this->db->where('stream',$stream);
		$result = $this->db->get('tbl_course_stream_relation');
		$result = $result->row();
		if(!empty($result)){
			if($result->course_mode == "1"){
				return $entry_year = $result->year_duration;
			}else if($result->course_mode == "2"){
				return $entry_year = $result->sem_duration;
			}
		}else{
			return 0;
		}
	}
	public function get_course_stream_subject(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		
		if(!empty($this->input->post('year_sem'))) $this->db->where('year_sem',$this->input->post('year_sem'));
		
		$result = $this->db->get('tbl_subject');
		echo json_encode($result->result());	
	}
	public function get_selected_course_subject($course,$stream,$year_sem = NULL){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$course);
		$this->db->where('stream',$stream);
		
		if($year_sem!=NULL) $this->db->where('year_sem',$year_sem);
		
		$result = $this->db->get('tbl_subject');
		return $result->result();	
	}
	public function insert_batch_question($store_data){
		$this->db->insert_batch(' tbl_exam_question',$store_data);
		return true;
	}
	public function set_examination_question(){
		$data = array(
			'exam_id' 			=> $this->input->post('exam_id'),
			'question' 			=> $this->input->post('question'),
			'option_a' 			=> $this->input->post('option_a'),
			'option_b' 			=> $this->input->post('option_b'),
			'option_c' 			=> $this->input->post('option_c'),
			'option_d' 			=> $this->input->post('option_d'),
			'correct_answer' 	=> $this->input->post('correct_answer'),
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' 		=> date("Y-m-d H:i:s"),
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_exam_question',$new_arr);
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_exam_question',$data);
		}
		return true;
	}
	public function get_all_exam_question(){
		$this->db->where('is_deleted','0');
		$this->db->where('exam_id',$this->uri->segment(2));
		$result = $this->db->get('tbl_exam_question');
		return $result->result();
	}
	public function get_single_exam_question(){
		$this->db->where('is_deleted','0');
		$this->db->where('exam_id',$this->uri->segment(2));
		$this->db->where('id',$this->uri->segment(3));
		$result = $this->db->get('tbl_exam_question');
		return $result->row();
	}
	public function get_appeared_exam_list(){
		$this->db->select('tbl_student_exam.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_student.center_id,tbl_course.course_name,tbl_stream.stream_name,tbl_examination.year_sem,tbl_examination.exam_name,tbl_examination.exam_date,tbl_examination.number_of_question,tbl_subject.subject_code,tbl_subject.subject_name');
		$this->db->where('tbl_student_exam.is_deleted','0');
		if(isset($_GET['course'])){
			//$this->db->where('tbl_examination,course_id',$_GET['course']);
		}
		if(isset($_GET['stream'])){
			//$this->db->where('tbl_examination,stream_id',$_GET['stream']);
		}
		if(isset($_GET['year_sem'])){
			//$this->db->where('tbl_examination,year_sem',$_GET['year_sem']);
		}
		$this->db->join('tbl_examination','tbl_examination.id = tbl_student_exam.exam_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_examination.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_examination.stream_id');
		$this->db->join('tbl_subject','tbl_subject.id = tbl_examination.subject_id');
		$this->db->join('tbl_student','tbl_student.id = tbl_student_exam.student_id');
		$result = $this->db->get('tbl_student_exam');
		return $result->result();
	}
	public function get_all_mcq_data_course_wise(){
		if(isset($_GET['course'])){
			$this->db->where('is_deleted','0');
			$this->db->where('course_id',$_GET['course']);
			$this->db->where('stream_id',$_GET['stream']);
			$this->db->where('year_sem',$_GET['year_sem']);
			$this->db->where('subject_id',$_GET['subject']);
			$result = $this->db->get('tbl_mcq_data');
			 return $result->result();
		}
	}

	public function get_all_theoretical_data_course_wise(){
		if(isset($_GET['course'])){
			$this->db->where('is_deleted','0');
			$this->db->where('course_id',$_GET['course']);
			$this->db->where('stream_id',$_GET['stream']);
			$this->db->where('year_sem',$_GET['year_sem']);
			$this->db->where('subject_id',$_GET['subject']);
			$result = $this->db->get('tbl_theoretical_data');
			 return $result->result();
		}
	}

	public function get_all_assignment_list($length,$start,$search){
		$this->db->select('tbl_mcq_data.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_subject.subject_code, tbl_staff_faculty.first_name, tbl_staff_faculty.last_name');
		$this->db->where('tbl_mcq_data.is_deleted','0');
		//$this->db->where('tbl_mcq_data.status','1'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_staff_faculty.first_name',$search); 
			$this->db->or_like('tbl_staff_faculty.last_name',$search); 
			$this->db->or_like('tbl_mcq_data.year_sem',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('tbl_subject.subject_code',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_mcq_data.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_mcq_data.stream_id');  
		$this->db->join('tbl_subject','tbl_subject.id = tbl_mcq_data.subject_id');  
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_mcq_data.added_by');  
		$this->db->order_by('tbl_mcq_data.id','DESC');
		$this->db->group_by('tbl_mcq_data.added_by,tbl_mcq_data.subject_id');

		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_mcq_data');
		return $result->result();
	}
	public function get_all_assignment_list_count($search){
		$this->db->select('tbl_mcq_data.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_subject.subject_code, tbl_staff_faculty.first_name, tbl_staff_faculty.last_name');
		$this->db->where('tbl_mcq_data.is_deleted','0');
		//$this->db->where('tbl_mcq_data.status','1'); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_staff_faculty.first_name',$search); 
			$this->db->or_like('tbl_staff_faculty.last_name',$search); 
			$this->db->or_like('tbl_mcq_data.year_sem',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('tbl_subject.subject_code',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_mcq_data.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_mcq_data.stream_id');  
		$this->db->join('tbl_subject','tbl_subject.id = tbl_mcq_data.subject_id'); 
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_mcq_data.added_by');  
		$this->db->order_by('tbl_mcq_data.id','DESC');
		$this->db->group_by('tbl_mcq_data.added_by,tbl_mcq_data.subject_id');
		$result = $this->db->get('tbl_mcq_data');
		return $result->num_rows();
	}

	public function get_faculty_wise_question_count($added_by,$course_id, $stream_id, $subject_id, $year_sem, $date){
		$this->db->where('added_by', $added_by);
		$this->db->where('course_id', $course_id);
		$this->db->where('stream_id', $stream_id);
		$this->db->where('subject_id', $subject_id);
		if ($date != 'all') {
			$this->db->where('date(created_on)', date('Y-m-d'));
		}
		$result= $this->db->get('tbl_mcq_data');
		return $result->num_rows();
	}

	//*************************************************************

	public function get_all_sub_assignment_list($length,$start,$search){
		$this->db->select('tbl_theoretical_data.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_subject.subject_code, tbl_staff_faculty.first_name, tbl_staff_faculty.last_name');
		$this->db->where('tbl_theoretical_data.is_deleted','0');
		//$this->db->where('tbl_theoretical_data.status','1'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_staff_faculty.first_name',$search); 
			$this->db->or_like('tbl_staff_faculty.last_name',$search); 
			$this->db->or_like('tbl_theoretical_data.year_sem',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('tbl_subject.subject_code',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_theoretical_data.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_theoretical_data.stream_id');  
		$this->db->join('tbl_subject','tbl_subject.id = tbl_theoretical_data.subject_id');  
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_theoretical_data.added_by');  
		$this->db->order_by('tbl_theoretical_data.id','DESC');
		$this->db->group_by('tbl_theoretical_data.added_by, tbl_theoretical_data.subject_id');

		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_theoretical_data');
		return $result->result();
	}
	public function get_all_sub_assignment_list_count($search){
		$this->db->select('tbl_theoretical_data.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_subject.subject_code, tbl_staff_faculty.first_name, tbl_staff_faculty.last_name');
		$this->db->where('tbl_theoretical_data.is_deleted','0');
		//$this->db->where('tbl_theoretical_data.status','1'); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_staff_faculty.first_name',$search); 
			$this->db->or_like('tbl_staff_faculty.last_name',$search); 
			$this->db->or_like('tbl_theoretical_data.year_sem',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('tbl_subject.subject_code',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_theoretical_data.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_theoretical_data.stream_id');  
		$this->db->join('tbl_subject','tbl_subject.id = tbl_theoretical_data.subject_id'); 
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_theoretical_data.added_by');  
		$this->db->order_by('tbl_theoretical_data.id','DESC');
		$this->db->group_by('tbl_theoretical_data.added_by, tbl_theoretical_data.subject_id');
		$result = $this->db->get('tbl_theoretical_data');
		return $result->num_rows();
	}


	public function get_today_sub_assignment_list($length,$start,$search){
		$this->db->select('tbl_theoretical_data.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_subject.subject_code, tbl_staff_faculty.first_name, tbl_staff_faculty.last_name');
		$this->db->where('tbl_theoretical_data.is_deleted','0');
		$this->db->where('Date(tbl_theoretical_data.created_on)',date("Y-m-d")); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_staff_faculty.first_name',$search); 
			$this->db->or_like('tbl_staff_faculty.last_name',$search); 
			$this->db->or_like('tbl_theoretical_data.year_sem',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('tbl_subject.subject_code',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_theoretical_data.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_theoretical_data.stream_id');  
		$this->db->join('tbl_subject','tbl_subject.id = tbl_theoretical_data.subject_id');  
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_theoretical_data.added_by');  
		$this->db->order_by('tbl_theoretical_data.id','DESC');
		$this->db->group_by('tbl_theoretical_data.added_by, tbl_theoretical_data.subject_id');

		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_theoretical_data');
		return $result->result();
	}
	public function get_today_sub_assignment_list_count($search){
		$this->db->select('tbl_theoretical_data.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_subject.subject_code, tbl_staff_faculty.first_name, tbl_staff_faculty.last_name');
		$this->db->where('tbl_theoretical_data.is_deleted','0');
		$this->db->where('Date(tbl_theoretical_data.created_on)',date("Y-m-d")); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_staff_faculty.first_name',$search); 
			$this->db->or_like('tbl_staff_faculty.last_name',$search); 
			$this->db->or_like('tbl_theoretical_data.year_sem',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('tbl_subject.subject_code',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_theoretical_data.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_theoretical_data.stream_id');  
		$this->db->join('tbl_subject','tbl_subject.id = tbl_theoretical_data.subject_id'); 
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_theoretical_data.added_by');  
		$this->db->order_by('tbl_theoretical_data.id','DESC');
		$this->db->group_by('tbl_theoretical_data.added_by, tbl_theoretical_data.subject_id');
		$result = $this->db->get('tbl_theoretical_data');
		return $result->num_rows();
	}

	public function get_faculty_wise_sub_question_count($added_by,$course_id, $stream_id, $subject_id, $year_sem, $date){
		$this->db->where('added_by', $added_by);
		$this->db->where('course_id', $course_id);
		$this->db->where('stream_id', $stream_id);
		$this->db->where('subject_id', $subject_id);
		if ($date != 'all') {
			$this->db->where('date(created_on)', date('Y-m-d'));
		}
		$result= $this->db->get('tbl_theoretical_data');
		return $result->num_rows();
	}

	public function get_selected_theory_question($length,$start,$search){
		$this->db->where('tbl_theoretical_data.is_deleted','0');
		$this->db->where('tbl_theoretical_data.status','1'); 
		$this->db->where('tbl_theoretical_data.added_by',$this->input->post('added_by'));
		$this->db->where('tbl_theoretical_data.course_id',$this->input->post('course_id'));
		$this->db->where('tbl_theoretical_data.stream_id',$this->input->post('stream_id'));
		$this->db->where('tbl_theoretical_data.subject_id',$this->input->post('subject_id'));
		$this->db->where('tbl_theoretical_data.year_sem',$this->input->post('year_sem')); 
		if($this->input->post('date')== 'no'){
			$this->db->where('Date(tbl_theoretical_data.created_on)',date("Y-m-d"));
		}
		
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('question',$search);
			$this->db->group_end();
		}
		
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_theoretical_data');
		return $result->result();
	}

	public function get_selected_theory_question_count($search){
		$this->db->where('tbl_theoretical_data.is_deleted','0');
		$this->db->where('tbl_theoretical_data.status','1'); 

		$this->db->where('tbl_theoretical_data.added_by',$this->input->post('added_by'));
		$this->db->where('tbl_theoretical_data.course_id',$this->input->post('course_id'));
		$this->db->where('tbl_theoretical_data.stream_id',$this->input->post('stream_id'));
		$this->db->where('tbl_theoretical_data.subject_id',$this->input->post('subject_id'));
		$this->db->where('tbl_theoretical_data.year_sem',$this->input->post('year_sem')); 
		if($this->input->post('date')== 'no'){
			$this->db->where('Date(tbl_theoretical_data.created_on)',date("Y-m-d"));
		}
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('question',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_theoretical_data');
		return $result->num_rows();
	}

	//**************************************************************

	public function get_selected_mcq_question($length,$start,$search){
		$this->db->where('tbl_mcq_data.is_deleted','0');
		//$this->db->where('tbl_mcq_data.status','1'); 
		$this->db->where('tbl_mcq_data.added_by',$this->input->post('added_by'));
		$this->db->where('tbl_mcq_data.course_id',$this->input->post('course_id'));
		$this->db->where('tbl_mcq_data.stream_id',$this->input->post('stream_id'));
		$this->db->where('tbl_mcq_data.subject_id',$this->input->post('subject_id'));
		$this->db->where('tbl_mcq_data.year_sem',$this->input->post('year_sem')); 
		if($this->input->post('date')== 'no'){
			$this->db->where('Date(tbl_mcq_data.created_on)',date("Y-m-d"));
		}
		
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('question',$search);
			$this->db->group_end();
		}
		
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_mcq_data');
		return $result->result();
	}

	public function get_selected_mcq_question_count($search){
		$this->db->where('tbl_mcq_data.is_deleted','0');
		//$this->db->where('tbl_mcq_data.status','1'); 

		$this->db->where('tbl_mcq_data.added_by',$this->input->post('added_by'));
		$this->db->where('tbl_mcq_data.course_id',$this->input->post('course_id'));
		$this->db->where('tbl_mcq_data.stream_id',$this->input->post('stream_id'));
		$this->db->where('tbl_mcq_data.subject_id',$this->input->post('subject_id'));
		$this->db->where('tbl_mcq_data.year_sem',$this->input->post('year_sem')); 
		if($this->input->post('date')== 'no'){
			$this->db->where('Date(tbl_mcq_data.created_on)',date("Y-m-d"));
		}
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('question',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_mcq_data');
		return $result->num_rows();
	} 
	public function get_today_assignment_list($length,$start,$search){
		$this->db->select('tbl_mcq_data.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_subject.subject_code, tbl_staff_faculty.first_name, tbl_staff_faculty.last_name');
		$this->db->where('tbl_mcq_data.is_deleted','0');
		//$this->db->where('tbl_mcq_data.status','1'); 
		$this->db->where('Date(tbl_mcq_data.created_on)',date("Y-m-d")); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_staff_faculty.first_name',$search); 
			$this->db->or_like('tbl_staff_faculty.last_name',$search); 
			$this->db->or_like('tbl_mcq_data.year_sem',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('tbl_subject.subject_code',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_mcq_data.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_mcq_data.stream_id');  
		$this->db->join('tbl_subject','tbl_subject.id = tbl_mcq_data.subject_id');  
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_mcq_data.added_by');  
		$this->db->order_by('tbl_mcq_data.created_on','DESC');
		$this->db->group_by('tbl_mcq_data.added_by, tbl_mcq_data.subject_id');

		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_mcq_data');
		return $result->result();
	}
	public function get_today_assignment_list_count($search){
		$this->db->select('tbl_mcq_data.*,tbl_course.course_name,tbl_stream.stream_name,tbl_subject.subject_name,tbl_subject.subject_code, tbl_staff_faculty.first_name, tbl_staff_faculty.last_name');
		$this->db->where('tbl_mcq_data.is_deleted','0');
		//$this->db->where('tbl_mcq_data.status','1');
		$this->db->where('Date(tbl_mcq_data.created_on)',date("Y-m-d"));  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_staff_faculty.first_name',$search); 
			$this->db->or_like('tbl_staff_faculty.last_name',$search); 
			$this->db->or_like('tbl_mcq_data.year_sem',$search);
			$this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->or_like('tbl_subject.subject_code',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_mcq_data.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_mcq_data.stream_id');  
		$this->db->join('tbl_subject','tbl_subject.id = tbl_mcq_data.subject_id'); 
		$this->db->join('tbl_staff_faculty','tbl_staff_faculty.id = tbl_mcq_data.added_by');  
		$this->db->order_by('tbl_mcq_data.id','DESC');
		$this->db->group_by('tbl_mcq_data.added_by, tbl_mcq_data.subject_id');
		$result = $this->db->get('tbl_mcq_data');
		return $result->num_rows();
	} 
	public function get_file_name(){
		$course_name = "";
		$stream_name = "";
		$subject_name = "";
		$this->db->where('id',$this->uri->segment(3));
		$course = $this->db->get('tbl_course');
		$course = $course->row();
		if(!empty($course)){
			$course_name = $course->course_name;
		}
		$this->db->where('id',$this->uri->segment(4));
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
		return $course_name.'-'.$stream_name.'-'.$this->uri->segment(6).'-'.$subject_name;
	}
	public function get_result_student(){
		$this->db->select('tbl_student.*,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.enrollment_number',$this->input->post('enrollment'));
		if($this->session->userdata("admin_id")==15){
			$this->db->where("tbl_student.center_id",1);
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_result_subject(){
		$student = $this->get_result_student();
		if(!empty($student)){
			$this->db->where('tbl_subject.is_deleted','0');
			$this->db->where('tbl_subject.status','1'); 
			$this->db->where('tbl_subject.course',$student->course_id);
			$this->db->where('tbl_subject.stream',$student->stream_id);
			$this->db->where_in('tbl_subject.mode',array($student->course_mode,3));
			$this->db->where('tbl_subject.year_sem',$this->input->post('year_sem'));
			$result = $this->db->get('tbl_subject'); 
			return $result->result();
		}else{
			return array();
		}
	}
	public function get_student_exam_form_status(){
		$student = $this->get_result_student();
		if(!empty($student)){
			$this->db->where('is_deleted','0');
			$this->db->where('status','1'); 
			$this->db->where('exam_status','1'); 
			$this->db->where('payment_status','1'); 
			$this->db->where('student_id',$student->id);
			$this->db->where('course_name',$student->course_id);
			$this->db->where('stream_name',$student->stream_id);
			$this->db->where('year_sem',$this->input->post('year_sem'));
			$result = $this->db->get('tbl_examination_form'); 
			return $result->num_rows();
		}else{
			return 0;
		}
	}
	public function set_result(){
		//echo "<pre>";print_r($_POST);exit;
		/*$this->db->where('enrollment_number',$this->input->post('txtEnNo'));
		$this->db->where('year_sem',$this->input->post('txtYS'));
		$this->db->where('status','1');
		$result = $this->db->get('examination_forms');
		if($result->num_rows() == '0'){
			$this->session->set_flashdata('message','Exam fees is not paid!');
			redirect($_SERVER['HTTP_REFERER']);
		}*/ 
		$month=$_POST['txtMonth'];
		$year=$_POST['txtYear'];
		$examStatus=$_POST['txtExamStatus'];
		$enrollNo=$_POST['txtEnNo'];
		$courseId=$_POST['txtCourseId'];
		$streamId=$_POST['txtStreamId'];    
		$yearSem=$_POST['txtYS'];     
		$totalIMM=0;        
		$totalIMO=0;
		$totalEMM=0;
		$totalEMO=0;    
		$totalResult=$_POST['comboTResult'];
		if($this->input->post('txtExamStatus') == '0'){
		    $this->db->where("is_deleted","0");
			$this->db->where('enrollment_number',$this->security->xss_clean($this->input->post('txtEnNo')));
			$this->db->where('year_sem',$this->security->xss_clean($this->input->post('txtYS')));
			$this->db->where('examination_status',$this->security->xss_clean($this->input->post('txtExamStatus')));
			$this->db->where('is_deleted','0');
			$result = $this->db->get('tbl_exam_results');
			 
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
			$ip_address=$_SERVER['REMOTE_ADDR']; 
			$up_city = '';
			$up_country = '';
			$ip = $_SERVER['REMOTE_ADDR']; 
		/*	$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
			if($query && $query['status'] == 'success') {
				$up_country = $query ['country'];
				$up_city = $query['regionName'].', '.$query['city'];
			} */
			$result_declare_date = "";
			if($this->input->post('txtMonth') == "May" && $this->input->post('txtYear') == "2021"){
				$result_declare_date = "2021-05-10";
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
				'added_by' 					=> $this->session->userdata("admin_id"),
				'added_show'                =>'1',
				'examination_status' 		=> $this->security->xss_clean($this->input->post('txtExamStatus')), 
				'created_on'				=> date("Y-m-d H:i:s")
			);
			
			$this->db->insert('tbl_exam_results',$data);
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
					$this->db->insert('tbl_examination_result_details',$exam_details);
				}
				$i++;					
			}
			
			if($this->security->xss_clean($this->input->post('comboTResult')) == '0'){
				$this->db->select("tbl_student.*,tbl_course_stream_relation.year_duration,tbl_course_stream_relation.sem_duration,tbl_course_stream_relation.month_duration");
				$this->db->where("tbl_student.id",$this->security->xss_clean($this->input->post('student_id')));

				$this->db->join("tbl_course_stream_relation","tbl_course_stream_relation.course = tbl_student.course_id AND tbl_course_stream_relation.stream = tbl_student.stream_id AND tbl_course_stream_relation.course_mode = tbl_student.course_mode AND tbl_course_stream_relation.course_type = tbl_student.course_type AND tbl_course_stream_relation.faculty = tbl_student.faculty_id");
				$stu = $this->db->get("tbl_student")->row();

				if($stu->course_mode == '1'){ //year
					$duration = $stu->year_duration;
				}else if($stu->course_mode == '2') {// sem
					$duration = $stu->sem_duration;
				}else{ // both
					$duration = $stu->sem_duration;
				}


				if($stu->year_sem < $duration){
					$text = "Dear Student, <br>
						Please clear your second year dues if any. <br>
						Please get in touch with the Accounts Department. <br>
						From <br>
						Accounts Dep. <br>
						BTU
				";
				// echo $duration."<br> ".$stu->year_sem."<br>".$stu->course_mode."<br>".$text;exit;
				$config["protocol"] = "sendmail";
				$config["mailpath"] = "/usr/sbin/sendmail";
				$config["mailtype"] = "html";
				$config["charset"] = "iso-8859-1";

				$this->load->library("email");
				$this->email->initialize($config);

				$this->email->from("info@theglobaluniversity.edu.in","THE GLOBAL UNIVERSITY");
				$this->email->to($stu->email);
				$this->email->set_mailtype("html");
				$this->email->subject("Information from BTU");
				$this->email->message($text);
				$this->email->send();
				}
				
			}
			
			return true;
	}

	public function get_search_result(){ 
		$this->db->select('tbl_exam_results.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.course_mode');
		if($this->input->post('month') != ""){
			$this->db->where('tbl_exam_results.examination_month',$this->input->post('month'));
		}
		if($this->input->post('year') != ""){
			$this->db->where('tbl_exam_results.examination_year',$this->input->post('year'));
		}
		if($this->input->post('course') != ""){
			$this->db->where('tbl_exam_results.course_id',$this->input->post('course'));
		}
		if($this->input->post('stream') != ""){
			$this->db->where('tbl_exam_results.stream_id',$this->input->post('stream'));
		}
		if($this->input->post('enrollment') != ""){
			$this->db->where('tbl_exam_results.enrollment_number',$this->input->post('enrollment'));
		}
		if($this->input->post('result_status') != ""){
			$this->db->where('tbl_exam_results.status',$this->input->post('result_status'));
		}
		if($this->input->post('result') != ""){
			$this->db->where('tbl_exam_results.result',$this->input->post('result'));
		}
		if($this->input->post('center') != ""){
			$this->db->where('tbl_student.center_id',$this->input->post('center'));
		} 
		if($this->input->post('year_sem') != ""){
			$this->db->where('tbl_exam_results.year_sem',$this->input->post('year_sem'));
		} 
		$this->db->where('tbl_exam_results.is_deleted','0');
		$this->db->join('tbl_student','tbl_student.id = tbl_exam_results.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_exam_results.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_exam_results.stream_id');
		$result = $this->db->get('tbl_exam_results');
		return $result->result();
	}
	
	public function get_single_result(){ 
		$this->db->select('tbl_exam_results.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.course_mode');
		$this->db->where('tbl_exam_results.id',$this->uri->segment(2));
		$this->db->where('tbl_exam_results.is_deleted','0');
		$this->db->join('tbl_student','tbl_student.id = tbl_exam_results.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_exam_results.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_exam_results.stream_id');
		$result = $this->db->get('tbl_exam_results');
		return $result->row();
	}
	public function get_selected_subject_for_result($result_id){
		$this->db->select('tbl_examination_result_details.*,tbl_subject.subject_name,tbl_subject.subject_code,tbl_subject.subject_type');
// 		$this->db->where('tbl_examination_result_details.is_deleted',"0");
// 		$this->db->where('tbl_examination_result_details.status',"1");
		$this->db->where('tbl_examination_result_details.result_id',$result_id);
		$this->db->join('tbl_subject','tbl_subject.id = tbl_examination_result_details.subject_id');
		$result = $this->db->get('tbl_examination_result_details');
// 		print_r($result->result());exit;
		return $result->result();
	}	
	
	public function get_selected_subject_for_saperate_student_result($result_id){
		$this->db->select('tbl_separate_student_examination_result_details.*,tbl_subject.subject_name,tbl_subject.subject_code,tbl_subject.subject_type');
		$this->db->where('tbl_separate_student_examination_result_details.is_deleted','0');
		$this->db->where('tbl_separate_student_examination_result_details.status','1');
		$this->db->where('tbl_separate_student_examination_result_details.result_id',$result_id);
		$this->db->join('tbl_subject','tbl_subject.id = tbl_separate_student_examination_result_details.subject_id');
		$result = $this->db->get('tbl_separate_student_examination_result_details');
		return $result->result();
	}
	
	public function inactivate_results(){
		$data = array(
			'status' => '0'
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_exam_results',$data);
		return true;
	}	
	public function activate_results(){
		$data = array(
			'status' => '1'
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_exam_results',$data);
		return true;
	}	
	public function delete_result(){
		$data = array(
			'is_deleted' => '1'
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_exam_results',$data);
		$this->db->where('result_id',$this->uri->segment(2));
		$this->db->update('tbl_examination_result_details',$data);
		return true;
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
		$this->db->update('tbl_exam_results',$update);
		if(isset($_REQUEST["txtSubjectId1"]) && $_REQUEST["txtSubjectId1"] !=""){
			$this->db->where('result_id',$resultId);
			$this->db->delete('tbl_examination_result_details');
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
				$this->db->insert('tbl_examination_result_details',$data);
				$i++;
			}
		}
		return true;
	}
	public function get_marksheet_student(){
		$this->db->select('tbl_student.*,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.enrollment_number',$this->uri->segment(3));
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$result = $this->db->get('tbl_student');
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
				'credit_transfer_remark'=> $this->input->post('remark'),
				'result_id' 			=> $this->input->post('result_id'),
				'enrollment_number' 	=> $this->input->post('enrollment_number'),
				'added_by' 				=> $this->session->userdata('admin_id'),
				'created_on'			=> date("Y-m-d H:i:s"),
			); 
			$this->db->insert('tbl_marksheet',$data);
			$last_id = $this->db->insert_id();
			$update = array(
				'marksheet_number' => $marksheet_number.$last_id
			);
			$this->db->where('id',$last_id);
			$this->db->update('tbl_marksheet',$update);
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
				'credit_transfer_remark'=> $this->input->post('remark'),
				'result_id' 			=> $this->input->post('result_id'),
				'enrollment_number' 	=> $this->input->post('enrollment_number'),
				'added_by' 				=> $this->session->userdata('admin_id'),
			);
			$this->db->where('marksheet_number',$this->input->post('marksheet_number'));
			$this->db->where('student_id',$this->input->post('student_id'));
			$this->db->update('tbl_marksheet',$data);
			return 1;
		} 
	}
	public function get_marksheet_status_by_result($result_id){
		$this->db->where('result_id',$result_id);
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_marksheet');
		return $result->row();
	}
	public function get_search_markheet(){
		$this->db->select('tbl_marksheet.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_course.course_name,tbl_stream.stream_name,tbl_exam_results.result,tbl_exam_results.examination_month,tbl_exam_results.examination_year');
		if($this->input->post('month') != ""){
			$this->db->where('tbl_exam_results.examination_month',$this->input->post('month'));
		}
		if($this->input->post('year') != ""){
			$this->db->where('tbl_marksheet.year_sem',$this->input->post('year'));
		}
		if($this->input->post('course') != ""){
			$this->db->where('tbl_student.course_id',$this->input->post('course'));
		}
		if($this->input->post('stream') != ""){
			$this->db->where('tbl_student.stream_id',$this->input->post('stream'));
		}
		if($this->input->post('enrollment') != ""){
			$this->db->where('tbl_marksheet.enrollment_number',$this->input->post('enrollment'));
		}
		if($this->input->post('marksheet_number') != ""){
			$this->db->where('tbl_marksheet.marksheet_number',$this->input->post('marksheet_number'));
		} 
		$this->db->where('tbl_marksheet.is_deleted','0');
		$this->db->where('tbl_exam_results.is_deleted','0');
		$this->db->where('tbl_exam_results.status','1');
		
		$this->db->join('tbl_exam_results','tbl_exam_results.id = tbl_marksheet.result_id');
		$this->db->join('tbl_student','tbl_student.id = tbl_marksheet.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$result = $this->db->get('tbl_marksheet');
		return $result->result();
	}
	public function delete_marksheet(){
		$data = array(
			'is_deleted' => '1'
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_marksheet',$data);
		return true;
	}
	public function get_single_marksheet(){
		$this->db->select('tbl_marksheet.*,tbl_exam_results.result,tbl_exam_results.examination_month,tbl_exam_results.examination_year,tbl_student.mother_name,tbl_student.student_name,tbl_student.father_name,tbl_student.date_of_birth,tbl_course.course_name,tbl_stream.stream_name,tbl_session.session_name,tbl_session.pre_session,tbl_course.course_name,tbl_course.id as course_id');
		$this->db->where('tbl_marksheet.is_deleted','0');
		$this->db->where('tbl_marksheet.id',$this->uri->segment(2));
		$this->db->join('tbl_exam_results','tbl_exam_results.id = tbl_marksheet.result_id');
		$this->db->join('tbl_student','tbl_student.id = tbl_marksheet.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$result = $this->db->get('tbl_marksheet');
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
			'credit_transfer_remark'=> $this->input->post('remark'),
		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tbl_marksheet',$data);
		return true;
	}
	public function get_total_added_question($id){
		$this->db->where('exam_id',$id);
		$this->db->where('is_deleted','0'); 
		$result = $this->db->get('tbl_exam_question');
		return $result->num_rows();
	}
	public function get_all_examination_form_list($length,$start,$search){
		$this->db->select('tbl_center.center_name,tbl_examination_form.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.enrollment_number,tbl_session.session_name');
		$this->db->where('tbl_examination_form.is_deleted','0'); 
		$this->db->where('tbl_examination_form.payment_status','1');    
		//$this->db->where('tbl_examination_form.exam_month','June');   
		//$this->db->where('tbl_examination_form.exam_year','2022');   
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_student.student_name',$search); 
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_student.mobile',$search); 
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');    
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');    
		$this->db->join('tbl_session','tbl_session.id = tbl_examination_form.session');    
		$this->db->order_by('tbl_examination_form.id','DESC');  
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_examination_form');
		return $result->result();
	}
	public function get_all_examination_form_list_count($search){
		$this->db->select('tbl_center.center_name,tbl_examination_form.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.enrollment_number,tbl_session.session_name');
		$this->db->where('tbl_examination_form.is_deleted','0');  
		$this->db->where('tbl_examination_form.payment_status','1');   
		//$this->db->where('tbl_examination_form.exam_month','June');   
		//$this->db->where('tbl_examination_form.exam_year','2022');   
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_student.student_name',$search); 
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_center.center_name',$search); 
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_examination_form.session'); 		
		$this->db->order_by('tbl_examination_form.created_on','DESC');  
		$result = $this->db->get('tbl_examination_form');
		return $result->num_rows();
	}

	public function get_all_examination_form_failed_list($length,$start,$search){
		$this->db->select('tbl_center.center_name,tbl_examination_form.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.enrollment_number,tbl_session.session_name');
		$this->db->where('tbl_examination_form.is_deleted','0'); 
		$this->db->where('tbl_examination_form.payment_status','0');   
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_student.student_name',$search); 
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_student.mobile',$search); 
			$this->db->or_like('tbl_center.center_name',$search); 
			$this->db->or_like('tbl_session.session_name',$search); 
			$this->db->group_end();
		}
		$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');    
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');    
		$this->db->join('tbl_session','tbl_session.id = tbl_examination_form.session');    
		$this->db->group_by('tbl_examination_form.student_id,tbl_examination_form.year_sem');  
		$this->db->order_by('tbl_examination_form.id','DESC');   
		$this->db->limit($length,$start);
		//$this->db->group_by('tbl_examination_form.student_id');
		$result = $this->db->get('tbl_examination_form');
		return $result->result();
	}
	public function get_all_examination_form_list_failed_count($search){
		$this->db->select('tbl_center.center_name,tbl_examination_form.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.enrollment_number,tbl_session.session_name');
		$this->db->where('tbl_examination_form.is_deleted','0');  
		$this->db->where('tbl_examination_form.payment_status','0');  
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_student.student_name',$search); 
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_student.mobile',$search); 
			$this->db->or_like('tbl_center.center_name',$search); 
			$this->db->or_like('tbl_session.session_name',$search); 
			$this->db->group_end();
		}
		$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id'); 
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');     
		$this->db->join('tbl_session','tbl_session.id = tbl_examination_form.session');    
		$this->db->order_by('tbl_examination_form.id','DESC');  
		//$this->db->group_by('tbl_examination_form.student_id');
		$result = $this->db->get('tbl_examination_form');
		return $result->num_rows();
	}
	public function active_hallticket(){
		$data = array(
			'exam_status' => '1'
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_examination_form',$data);
		return true;
	}
	public function inactive_hallticket(){
		$data = array(
			'exam_status' => '0'
		);
		$this->db->where('id',$this->uri->segment(2));
		$this->db->update('tbl_examination_form',$data);
		return true;
	}
	public function get_single_exam_payment_details(){
		$this->db->select('tbl_examination_form.*,tbl_student_fees.bank_id,tbl_student_fees.remark,tbl_student_fees.payment_mode');
		$this->db->where('tbl_examination_form.id',$this->uri->segment(2));
		$this->db->join('tbl_student_fees','tbl_student_fees.examination_id = tbl_examination_form.id');
		$result = $this->db->get('tbl_examination_form');
		return $result->row();
	}
	public function update_exam_payment(){ 
		$this->db->where('is_deleted','0');
		$this->db->where('payment_id',$this->input->post('transaction_id'));
		$exit = $this->db->get('tbl_examination_form');
		$exit = $exit->row(); 
		if(!empty($exit)){
			$this->session->set_flashdata('message','This transaction id is already in used!');
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->input->post('id'));
		$exit = $this->db->get('tbl_examination_form');
		$exit = $exit->row();
		if(!empty($exit)){ 
			$this->db->where('id',$exit->student_id);
			$student_row = $this->db->get('tbl_student');
			$student_row = $student_row->row();
			$exam = array(
				'payment_id' 			=> $this->input->post('transaction_id'),
				'year_sem' 				=> $this->input->post('year_sem'),
				'payment_date' 			=> date("Y-m-d",strtotime($this->input->post('payment_date'))),
				'payment_status' 		=> $this->input->post('payment_status'),
				'examination_fees' 		=> $this->input->post('total_fees'),
				'total_examination_fees'=> $this->input->post('total_fees'),
			);
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_examination_form',$exam);
			if($this->input->post('id') !=""){
				$this->db->where('examination_id',$this->input->post('id'));
				$exist_form = $this->db->get('tbl_student_fees');
				$exist_form = $exist_form->row();
				if(!empty($exist_form)){
					$exam = array(
						'transaction_id' 	=> $this->input->post('transaction_id'),
						'payment_mode' 		=> $this->input->post('payment_mode'),
						'year_sem' 			=> $this->input->post('year_sem'),
						'payment_date' 		=> date("Y-m-d",strtotime($this->input->post('payment_date'))),
						'payment_status' 	=> $this->input->post('payment_status'),
						'total_fees'		=> $this->input->post('total_fees'),
						'remark'			=> $this->input->post('remark'),
					);
					$this->db->where('examination_id',$this->input->post('id'));
					$this->db->update('tbl_student_fees',$exam);
				}
			}
			$profile = $this->Admin_model->get_profile();
			$add_log = 1;
			$log_description = $profile->first_name." ".$profile->last_name." has updated student exam details of ".$student_row->student_name." (".$student_row->id.")". " Transaction id  ".$this->input->post('transaction_id')." on ".date("d/m/Y");
			$log = array(
				'user_id' 		=> $this->session->userdata('admin_id'),
				'student_id' 	=> $student_row->id,
				'description' 	=> $log_description,
				'date' 			=> date("Y-m-d"),
				'created_on' 	=> date("Y-m-d H:i:s"),
			);
			$this->Setting_model->set_log($log);
		}else{
			$this->session->set_flashdata('message','Please cordinate with IT Team there is some issue');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function get_mcq_repost_course(){
		$this->db->select('tbl_course.course_name,tbl_stream.stream_name,tbl_mcq_data.course_id,tbl_mcq_data.stream_id,tbl_mcq_data.year_sem');
		$this->db->join('tbl_course','tbl_course.id = tbl_mcq_data.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_mcq_data.stream_id');
		$this->db->group_by('course_id,stream_id');
		$result = $this->db->get('tbl_mcq_data');
		return $result->result();
	}
	public function get_mcq_paper_details($course,$stream,$year){
		$this->db->where('course',$course);
		$this->db->where('stream',$stream);
		$this->db->where('year_sem',$year);
		$result = $this->db->get('tbl_subject');
		return $result->result();
	}
	public function get_total_subject_mcq_count($course,$stream,$year_sem,$subject){
		$this->db->where('is_deleted','0');
		$this->db->where('course_id',$course);
		$this->db->where('stream_id',$stream);
		$this->db->where('year_sem',$year_sem);
		$this->db->where('subject_id',$subject);
		$result = $this->db->get('tbl_mcq_data');
		return $result->num_rows();
	}


	public function get_all_generated_result_ajax($length,$start,$search){
		$this->db->select('tbl_exam_results.*,tbl_student.student_name');
		$this->db->where('tbl_exam_results.is_deleted','0');
		$this->db->where("tbl_exam_results.examination_month","August");
		$this->db->where("tbl_exam_results.examination_year","2021");
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_exam_results.enrollment_number',$search);
			$this->db->or_like('tbl_exam_results.created_on',$search);
			//$this->db->or_like('tbl_center.center_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_student','tbl_student.id = tbl_exam_results.student_id');
		//$this->db->join("tbl_center","tbl_center.id=tbl_exam_results.added_by");
		//$this->db->join("tbl_employees","tbl_employees.id=tbl_exam_results.added_by");

		$this->db->order_by('tbl_exam_results.id','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_exam_results');
		return $result->result();
	}

	public function get_all_generated_result_ajax_count($search){
		$this->db->select('tbl_exam_results.*,tbl_student.student_name');
		$this->db->where('tbl_exam_results.is_deleted','0');
		$this->db->where("tbl_exam_results.examination_month","August");
		$this->db->where("tbl_exam_results.examination_year","2021");

		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_exam_results.enrollment_number',$search);
			$this->db->or_like('tbl_exam_results.created_on',$search);
			//$this->db->or_like('tbl_center.center_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_student','tbl_student.id = tbl_exam_results.student_id');
		//$this->db->join("tbl_center","tbl_center.id=tbl_exam_results.added_by");
		//$this->db->join("tbl_employees","tbl_employees.id=tbl_exam_results.added_by");
		
		$this->db->order_by('tbl_exam_results.id','ASC');
		
		$result = $this->db->get('tbl_exam_results');
		return $result->num_rows();
	}
    
    public function get_added_employee_data($added_by){
        $this->db->select('tbl_employees.first_name');
        $this->db->where('id',$added_by);
        $result = $this->db->get('tbl_employees');
        $result = $result->row();
        $employee_name = "";
        if(!empty( $result)){
            $employee_name = $result->first_name;
        }
        return $employee_name;
    }
    public function get_added_center_data($added_by){
        $this->db->select('tbl_center.center_name');
        $this->db->where('id',$added_by);
        $result = $this->db->get('tbl_center');
        $result = $result->row();
        $employee_name = "";
        if(!empty( $result)){
            $employee_name = $result->center_name;
        }
        return $employee_name;
    }
    
//     public function generated_results_excel(){
// 		$this->db->select("tbl_marksheet.*,tbl_exam_results.examination_month,tbl_exam_results.examination_year,tbl_exam_results.internal_max_marks,tbl_exam_results.external_max_marks,tbl_exam_results.internal_marks_obtained,tbl_exam_results.external_marks_obtained,tbl_exam_results.result,tbl_student.student_name,tbl_student.father_name");

// 		$this->db->where("tbl_marksheet.is_deleted",'0');
// 		$this->db->where("tbl_marksheet.status",'1');
// 		$this->db->where("tbl_marksheet.result_declare_date",date("Y-m-d",strtotime($this->input->post("date"))));

// 		$this->db->join("tbl_exam_results","tbl_exam_results.id = tbl_marksheet.result_id");
// 		$this->db->join("tbl_student","tbl_student.id = tbl_marksheet.student_id");

// 		$result = $this->db->get("tbl_marksheet")->result();
// 		// print_r($result);exit;

// 		header('Content-Dispostion:attachment;');
// 		$file_name = "student_results.csv";

// 		$f  = fopen("result_excels/".$file_name,"w");

// 		$array_of_heading = array("S NO","Enroll No","Name","Father Name","Seat No","Year","Semester","Month And  Year of Exam","Grand Total MaxMin","Grand Total Marks Secu","Percentage","Grade","Result","Date of Issue");

// 		for($j = 1;$j<=10;$j++){
// 			$array_of_heading[] = "Paper".$j;
// 			$array_of_heading[] = "Sub".$j;
// 			$array_of_heading[] = "UMax Marks".$j;
// 			$array_of_heading[] = "UMarks Secu".$j;
// 			$array_of_heading[] = "I max marks".$j;
// 			$array_of_heading[] = "I Marks Secu".$j;
// 			$array_of_heading[] = "Total MaxMin Marks".$j;
// 			$array_of_heading[] = "Total Marks Secu".$j;
// 			$array_of_heading[] = "Remarks".$j;

// 		}

// 		fputcsv($f,$array_of_heading);
// 		$i = 1;
// 		foreach ($result as $res){
			
// 			$this->db->select("tbl_examination_result_details.*,tbl_subject.subject_code,tbl_subject.subject_name");
// 			$this->db->where("tbl_examination_result_details.is_deleted","0");
// 			$this->db->where("tbl_examination_result_details.status","1");
// 			$this->db->where("tbl_examination_result_details.result_id",$res->result_id);

// 			$this->db->join("tbl_subject","tbl_subject.id = tbl_examination_result_details.subject_id");

// 			$data = $this->db->get("tbl_examination_result_details")->result();

// 			if(empty($data)){
// 				continue; // if $data is empty don't run the below code
// 			}

// 			$array_of_row = array();
// 			$array_of_row[] = $i++;

// 			$array_of_row[] = intval($res->enrollment_number);
// 			$array_of_row[] = $res->student_name;
// 			$array_of_row[] = $res->father_name;
// 			$array_of_row[] = intval($res->marksheet_number);

// 			if($res->display_mode == '1'){
// 				//if year
// 				if($res->year_sem==1){
// 					$array_of_row[] = "I";	
// 				}else if($res->year_sem==2){
// 					$array_of_row[] = "II";
// 				}else if($res->year_sem==3){
// 					$array_of_row[] = "III";
// 				}
// 				else if($res->year_sem==4){
// 					$array_of_row[] = "IV";
// 				}else if($res->year_sem==5){
// 					$array_of_row[] = "V";
// 				}else if($res->year_sem==6){
// 					$array_of_row[] = "VI";
// 				}else if($res->year_sem==7){
// 					$array_of_row[] = "VII";
// 				}else if($res->year_sem==8){
// 					$array_of_row[] = "VIII";
// 				}else if($res->year_sem==9){
// 					$array_of_row[] = "IX";
// 				}else{
// 					$array_of_row[] = "";
// 				}
// 				$array_of_row[] = "";
// 			}else{
// 				//if sem

// 				if($res->year_sem == 1 || $res->year_sem == 2){
// 					$array_of_row[] = "I";
// 				}else if($res->year_sem == 3 || $res->year_sem == 4){
// 					$array_of_row[] = "II";
// 				}else if($res->year_sem == 5 || $res->year_sem == 6){
// 					$array_of_row[] = "III";
// 				}else if($res->year_sem == 7 || $res->year_sem == 8){
// 					$array_of_row[] = "IV";
// 				}else if($res->year_sem == 9 || $res->year_sem == 10){
// 					$array_of_row[] = "V";
// 				}else if($res->year_sem == 11 || $res->year_sem == 12){
// 					$array_of_row[] = "VI";
// 				}else if($res->year_sem == 13 || $res->year_sem == 14){
// 					$array_of_row[] = "VII";
// 				}else{
// 					$array_of_row[] = "";
// 				}

// 				if($res->year_sem==1){
// 					$array_of_row[] = "I";	
// 				}else if($res->year_sem==2){
// 					$array_of_row[] = "II";
// 				}else if($res->year_sem==3){
// 					$array_of_row[] = "III";
// 				}
// 				else if($res->year_sem==4){
// 					$array_of_row[] = "IV";
// 				}else if($res->year_sem==5){
// 					$array_of_row[] = "V";
// 				}else if($res->year_sem==6){
// 					$array_of_row[] = "VI";
// 				}else if($res->year_sem==7){
// 					$array_of_row[] = "VII";
// 				}else if($res->year_sem==8){
// 					$array_of_row[] = "VIII";
// 				}else if($res->year_sem==9){
// 					$array_of_row[] = "IX";
// 				}else{
// 					$array_of_row[] = "";
// 				}

// 			}



// 			$array_of_row[] = $res->examination_month.", ".$res->examination_year;
			
// 			$array_of_row[] = $res->external_max_marks+$res->internal_max_marks;
// 			$array_of_row[] = $res->external_marks_obtained+$res->internal_marks_obtained;
// 			$percentage = (($res->external_marks_obtained+$res->internal_marks_obtained)/($res->external_max_marks+$res->internal_max_marks))*100;
// 			$array_of_row[] = $percentage;

			

// 			if($percentage >= 60){
// 				$array_of_row[] = "A";
// 			}else if($percentage < 60 and $percentage >= 45){
// 				$array_of_row[] = "B";
// 			}else if($percentage < 45 and $percentage >= 35){
// 				$array_of_row[] = "C";
// 			}else{
// 				$array_of_row[] = "";
// 			}
// 			$array_of_row[] = $res->result=='0'?"PASS":"FAIL";
// 			$array_of_row[] = $res->result_declare_date;


// 			foreach ($data as $dt) {
// 				$array_of_row[] = $dt->subject_code;
// 				$array_of_row[] = $dt->subject_name;

// 				$array_of_row[] = $dt->external_max_marks;
// 				$array_of_row[] = $dt->external_marks_obtained;
// 				$array_of_row[] = $dt->internal_max_marks;
// 				$array_of_row[] = $dt->internal_marks_obtained;
// 				$array_of_row[] = $dt->external_max_marks+$dt->internal_max_marks."/".ceil(($dt->external_max_marks+$dt->internal_max_marks)/3);

// 				$array_of_row[] =  $dt->external_marks_obtained+$dt->internal_marks_obtained;
// 				$array_of_row[] = $dt->result=='0'?"P":"F";

// 			}

			
// 			fputcsv($f,$array_of_row);
// 		}
// 		fclose($f);
// 		return $file_name;
// 	}
	
	
    public function generated_results_excel(){
		$to_date = date("Y-m-d",strtotime($this->input->post("date"))).' 00:00:00';
		$from_date = date("Y-m-d",strtotime($this->input->post("date"))).' 23:59:59';
		$courses = array(228,261,262,263);
		$this->db->select("tbl_marksheet.*,tbl_exam_results.examination_month,tbl_exam_results.examination_year,tbl_exam_results.internal_max_marks,tbl_exam_results.external_max_marks,tbl_exam_results.internal_marks_obtained,tbl_exam_results.external_marks_obtained,tbl_exam_results.result,tbl_student.student_name,tbl_student.father_name,tbl_student.username,tbl_student.password,tbl_course.print_name, tbl_stream.stream_name,tbl_center.center_name");

		$this->db->where("tbl_marksheet.is_deleted",'0');
		$this->db->where("tbl_marksheet.status",'1');
			$this->db->where("tbl_exam_results.is_deleted",'0');
			$this->db->where("tbl_exam_results.status",'1');
		$this->db->where_not_in("tbl_student.course_id",$courses);
		//$this->db->where("tbl_marksheet.created_on",date("Y-m-d",strtotime($this->input->post("date"))));
		if($this->input->post("date") != ""){
			$this->db->where("tbl_marksheet.created_on >=",$to_date);
			$this->db->where("tbl_marksheet.created_on <=",$from_date);
		}
		$this->db->join("tbl_exam_results","tbl_exam_results.id = tbl_marksheet.result_id");
		$this->db->join("tbl_student","tbl_student.id = tbl_marksheet.student_id");
		$this->db->join("tbl_course","tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream","tbl_stream.id = tbl_student.stream_id");
		$this->db->join("tbl_center","tbl_center.id = tbl_student.center_id");
		$this->db->order_by('tbl_marksheet.id','DESC');
		$result = $this->db->get("tbl_marksheet")->result();
		 
		$all_data = array(); 
		$i = 1;
		foreach ($result as $res){
			
			$this->db->select("tbl_examination_result_details.*,tbl_subject.subject_code,tbl_subject.subject_name");
			$this->db->where("tbl_examination_result_details.is_deleted","0");
			$this->db->where("tbl_examination_result_details.status","1");
			$this->db->where("tbl_examination_result_details.result_id",$res->result_id);

			$this->db->join("tbl_subject","tbl_subject.id = tbl_examination_result_details.subject_id");

			$data = $this->db->get("tbl_examination_result_details")->result();

			if(empty($data)){
				continue; // if $data is empty don't run the below code
			}
			
			
			$image = '';
            if($res->examination_month == "August"  && $res->examination_year =="2021"){
                $image = base_url("images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png");  
             }else if($res->examination_month == "January"  && $res->examination_year =="2021"){
                  $image = base_url("images/signature_contrroler/sahakhan.png"); 
             }else if($res->examination_month == "January"  && $res->examination_year =="2022"){
                  $image = base_url("images/signature_contrroler/sahakhan.png");
                 
             }else if($res->examination_month == "July"  && $res->examination_year =="2022"){
                  $image = base_url("images/signature_contrroler/sahakhan.png");
                 
             }  
			/*$type = pathinfo($image, PATHINFO_EXTENSION);
			$data = file_get_contents($image);
			$imgData = base64_encode($data);
			$src = 'data:image/' . $type . ';base64,'.$imgData;*/
			$src = $image;


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
			//$array_of_row[] = intval($res->marksheet_number);

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
            if(count($array_of_row) < 201){
				// $len = count($array_of_row) - count($array_of_heading;
					for($j=count($array_of_row);$j<201;$j++){
						$array_of_row[] = "";
					}
			}

			$all_data[] = $array_of_row;

		}
		// fclose($f);
		return $all_data;
	}
	
	
	public function generated_results_excel_pre(){
		$to_date = date("Y-m-d",strtotime($this->input->post("date"))).' 00:00:00';
		$from_date = date("Y-m-d",strtotime($this->input->post("date"))).' 23:59:59';
		$courses = array(228,261,262,263);
		$this->db->select("tbl_marksheet.*,tbl_exam_results.examination_month,tbl_exam_results.examination_year,tbl_exam_results.internal_max_marks,tbl_exam_results.external_max_marks,tbl_exam_results.internal_marks_obtained,tbl_exam_results.external_marks_obtained,tbl_exam_results.result,tbl_student.student_name,tbl_student.father_name,tbl_student.mother_name,tbl_course.print_name, tbl_stream.stream_name");

		$this->db->where("tbl_marksheet.is_deleted",'0');
		$this->db->where("tbl_marksheet.status",'1');
		$this->db->where("tbl_exam_results.is_deleted",'0');
		$this->db->where("tbl_exam_results.status",'1');
		$this->db->where_in("tbl_student.course_id",$courses);
		
		//$this->db->where("tbl_marksheet.created_on",date("Y-m-d",strtotime($this->input->post("date"))));
		if($this->input->post("date") != ""){
			$this->db->where("tbl_marksheet.created_on >=",$to_date);
			$this->db->where("tbl_marksheet.created_on <=",$from_date);
		}
		$this->db->join("tbl_exam_results","tbl_exam_results.id = tbl_marksheet.result_id");
		$this->db->join("tbl_student","tbl_student.id = tbl_marksheet.student_id");
		$this->db->join("tbl_course","tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream","tbl_stream.id = tbl_student.stream_id");
		$this->db->order_by('tbl_marksheet.id','DESC');
		$result = $this->db->get("tbl_marksheet")->result();
		 
		$all_data = array(); 
		$i = 1;
		foreach ($result as $res){
			
			$this->db->select("tbl_examination_result_details.*,tbl_subject.subject_code,tbl_subject.subject_name");
			$this->db->where("tbl_examination_result_details.is_deleted","0");
			$this->db->where("tbl_examination_result_details.status","1");
			$this->db->where("tbl_examination_result_details.result_id",$res->result_id);

			$this->db->join("tbl_subject","tbl_subject.id = tbl_examination_result_details.subject_id");

			$data = $this->db->get("tbl_examination_result_details")->result();

			if(empty($data)){
				continue; // if $data is empty don't run the below code
			}
			
			
			$image = '';
            if($res->examination_month == "August"  && $res->examination_year =="2021"){
                $image = base_url("images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png");  
             }else if($res->examination_month == "January"  && $res->examination_year =="2021"){
                  $image = base_url("images/signature_contrroler/sahakhan.png"); 
             }else if($res->examination_month == "January"  && $res->examination_year =="2022"){
                  $image = base_url("images/signature_contrroler/sahakhan.png");
                 
             }  
			/*$type = pathinfo($image, PATHINFO_EXTENSION);
			$data = file_get_contents($image);
			$imgData = base64_encode($data);
			$src = 'data:image/' . $type . ';base64,'.$imgData;*/
			$src = $image;


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
	
	
    public function activate_all_results(){
		$data = array(
			"status"=>'1',
		);
		$this->db->update("tbl_exam_results",$data);
	}
	
	
	//showing document verification data


	public function get_all_document_verification_data($length,$start,$search){ 
		$this->db->where('tbl_document_verification.is_deleted','0');
		$this->db->where('tbl_document_verification.payment_status','1'); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_document_verification.name',$search);
			$this->db->or_like('tbl_document_verification.address',$search);
			$this->db->or_like('tbl_document_verification.city',$search);
			$this->db->or_like('tbl_document_verification.pin_code',$search);
			$this->db->or_like('tbl_document_verification.mobile_number',$search);
			$this->db->or_like('tbl_document_verification.email',$search);
			$this->db->or_like('tbl_document_verification.student_name',$search);
			$this->db->or_like('tbl_document_verification.enrollment_number',$search);
			$this->db->or_like('tbl_document_verification.passing_year',$search);
			$this->db->or_like('tbl_document_verification.course_name',$search);
			$this->db->or_like('tbl_document_verification.query',$search);
			$this->db->or_like('tbl_document_verification.payment_status',$search);
			$this->db->or_like('tbl_document_verification.transaction_id',$search);
			$this->db->or_like('tbl_document_verification.amount',$search);
			$this->db->or_like('tbl_document_verification.created_on',$search);

			$this->db->group_end();
		} 
		$this->db->order_by('tbl_document_verification.id','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_document_verification');
		return $result->result();
	} 
	public function get_all_document_verification_data_count($search){
		$this->db->where('tbl_document_verification.is_deleted','0');
		$this->db->where('tbl_document_verification.payment_status','1');  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_document_verification.name',$search);
			$this->db->or_like('tbl_document_verification.address',$search);
			$this->db->or_like('tbl_document_verification.city',$search);
			$this->db->or_like('tbl_document_verification.pin_code',$search);
			$this->db->or_like('tbl_document_verification.mobile_number',$search);
			$this->db->or_like('tbl_document_verification.email',$search);
			$this->db->or_like('tbl_document_verification.student_name',$search);
			$this->db->or_like('tbl_document_verification.enrollment_number',$search);
			$this->db->or_like('tbl_document_verification.passing_year',$search);
			$this->db->or_like('tbl_document_verification.course_name',$search);
			$this->db->or_like('tbl_document_verification.query',$search);
			$this->db->or_like('tbl_document_verification.payment_status',$search);
			$this->db->or_like('tbl_document_verification.transaction_id',$search);
			$this->db->or_like('tbl_document_verification.amount',$search);
			$this->db->or_like('tbl_document_verification.created_on',$search);

			$this->db->group_end();
		}
	
		$this->db->order_by('tbl_document_verification.id','ASC');
		
		$result = $this->db->get('tbl_document_verification');
		return $result->num_rows();
	}
	public function get_all_document_verification_failed_data($length,$start,$search){ 
		$this->db->where('tbl_document_verification.is_deleted','0');
		$this->db->where('tbl_document_verification.payment_status','0'); 
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_document_verification.name',$search);
			$this->db->or_like('tbl_document_verification.address',$search);
			$this->db->or_like('tbl_document_verification.city',$search);
			$this->db->or_like('tbl_document_verification.pin_code',$search);
			$this->db->or_like('tbl_document_verification.mobile_number',$search);
			$this->db->or_like('tbl_document_verification.email',$search);
			$this->db->or_like('tbl_document_verification.student_name',$search);
			$this->db->or_like('tbl_document_verification.enrollment_number',$search);
			$this->db->or_like('tbl_document_verification.passing_year',$search);
			$this->db->or_like('tbl_document_verification.course_name',$search);
			$this->db->or_like('tbl_document_verification.query',$search);
			$this->db->or_like('tbl_document_verification.payment_status',$search);
			$this->db->or_like('tbl_document_verification.transaction_id',$search);
			$this->db->or_like('tbl_document_verification.amount',$search);
			$this->db->or_like('tbl_document_verification.created_on',$search);

			$this->db->group_end();
		} 
		$this->db->order_by('tbl_document_verification.id','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_document_verification');
		return $result->result();
	} 
	public function get_all_document_verification_data_failed_count($search){
		$this->db->where('tbl_document_verification.is_deleted','0');
		$this->db->where('tbl_document_verification.payment_status','0');  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_document_verification.name',$search);
			$this->db->or_like('tbl_document_verification.address',$search);
			$this->db->or_like('tbl_document_verification.city',$search);
			$this->db->or_like('tbl_document_verification.pin_code',$search);
			$this->db->or_like('tbl_document_verification.mobile_number',$search);
			$this->db->or_like('tbl_document_verification.email',$search);
			$this->db->or_like('tbl_document_verification.student_name',$search);
			$this->db->or_like('tbl_document_verification.enrollment_number',$search);
			$this->db->or_like('tbl_document_verification.passing_year',$search);
			$this->db->or_like('tbl_document_verification.course_name',$search);
			$this->db->or_like('tbl_document_verification.query',$search);
			$this->db->or_like('tbl_document_verification.payment_status',$search);
			$this->db->or_like('tbl_document_verification.transaction_id',$search);
			$this->db->or_like('tbl_document_verification.amount',$search);
			$this->db->or_like('tbl_document_verification.created_on',$search);

			$this->db->group_end();
		} 
		$this->db->order_by('tbl_document_verification.id','ASC'); 
		$result = $this->db->get('tbl_document_verification');
		return $result->num_rows();
	}

		public function get_all_document_verification_detail_data($length,$start,$search){
		
		$this->db->where('tbl_document_verification_data.is_deleted','0');
		$this->db->where('tbl_document_verification_data.document_verification_rel',$this->input->post("document_verification_id"));
		
		if($search !=""){
			$this->db->group_start();
		
			$this->db->or_like('tbl_document_verification_data.document_name',$search);
			$this->db->or_like('tbl_document_verification_data.created_on',$search);

			$this->db->group_end();
		}

		$this->db->order_by('tbl_document_verification_data.id','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_document_verification_data');
		return $result->result();
	}

	public function get_all_document_verification_detail_data_count($search){
		$this->db->where('tbl_document_verification_data.is_deleted','0');
        $this->db->where('tbl_document_verification_data.document_verification_rel',$this->input->post("document_verification_id"));
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_document_verification_data.document_name',$search);
			$this->db->or_like('tbl_document_verification_data.created_on',$search);
			$this->db->group_end();
		}
	
		$this->db->order_by('tbl_document_verification_data.id','ASC');
		
		$result = $this->db->get('tbl_document_verification_data');
		return $result->num_rows();
	}
	public function get_stream_subject_ajax(){
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$result = $this->db->get('tbl_subject');
		echo json_encode($result->result());		
	}
	public function insert_batch_phd_questions($data){
		$this->db->insert_batch('tbl_question_ans',$data);
	}
	public function insert_single_phd_questions($data){
		$this->db->insert('tbl_question_ans',$data);
		return true;
	}
	public function get_all_phd_subject_questions($length,$start,$search){
		$this->db->select('tbl_question_ans.*,tbl_course.print_name,tbl_stream.stream_name');
		$this->db->where('tbl_question_ans.is_deleted','0');
		$this->db->where('tbl_question_ans.question_type','2');
		$this->db->where('tbl_question_ans.test_id',$this->input->post('exam_id'));
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.print_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			// $this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_question_ans.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_question_ans.stream_id');
		// $this->db->join('tbl_subject','tbl_subject.id = tbl_question_ans.subject_id');
		$this->db->order_by('tbl_question_ans.id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_question_ans');
		return $result->result();
	}
	public function get_all_phd_subject_questions_count($search){
		$this->db->select('tbl_question_ans.*,tbl_course.print_name,tbl_stream.stream_name');
		$this->db->where('tbl_question_ans.is_deleted','0');
		$this->db->where('tbl_question_ans.question_type','2');
		$this->db->where('tbl_question_ans.test_id',$this->input->post('exam_id'));
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.print_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			// $this->db->or_like('tbl_subject.subject_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_question_ans.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_question_ans.stream_id');
		// $this->db->join('tbl_subject','tbl_subject.id = tbl_question_ans.subject_id');
		$this->db->order_by('tbl_question_ans.id','DESC');
		$result = $this->db->get('tbl_question_ans');
		return $result->num_rows();
	}
	public function get_phd_subject_question(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_question_ans');
		return $result->row();
	}
	public function get_selected_stream($course_id){
		$this->db->select('tbl_course_stream_relation.*, tbl_stream.stream_name');
		$this->db->where('tbl_course_stream_relation.course',$course_id);
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();
	}
	public function get_selected_subject($course_id,$stream_id){
		//$this->db->select('subject_name, ');
	}
	public function update_phd_subject_question(){
			$options = [$this->input->post('option_1'),$this->input->post('option_2'),$this->input->post('option_3'),$this->input->post('option_4')];
			$text_data = array(
				"question" 		=> $this->input->post('question'),
				"selected_ans" 	=> $this->input->post('current_answer'),
				"options" 		=> $options,
				"img_data" 		=> '',
			);
			$data = array(
				"course_id" 	=> $this->input->post('course'),
				"stream_id" 	=> $this->input->post('stream'),
				// "subject_id" 	=> $this->input->post('subject'),
				"text_data" 	=> json_encode(['options' => $text_data]),
				"correct_ans" 	=> $this->input->post('current_answer'),
			);
			// print_r($new);exit();
		$this->db->where('id',$this->input->post('question_id'));
		if ($this->db->update('tbl_question_ans',$data)){
			$this->db->where('id',$this->input->post('question_id'));
			$result = $this->db->get('tbl_question_ans');
			$row=$result->row();
			$test_id = $row->test_id;
			return $test_id;

		} else {
			return false;
			
		}
	}
	public function add_course_work_exam(){
	    $time1 = strtotime($this->input->post('start_time'));
$time2 = strtotime($this->input->post('end_time'));

// Difference in seconds
$result = abs($time1 - $time2);

$hours = floor($result / 3600);  // 1 (hr)
$hour_minutes = floor(($result % 3600) / 60);  // 15 (min)
$minutes = floor($result / 60);  // 75 (min)
 if($this->input->post('exam_type') == "1"){
     $exam_name = $this->input->post('new_exam_name');
 }else{
     $exam_name = $this->input->post('exam_name');
 }
		$data=array(
			'course'           =>$this->input->post('course'),
			'exam_type'        =>$this->input->post('exam_type'),
			'stream'           =>$this->input->post('stream'),
			'exam_name'        =>$exam_name,
			'start_time'        =>$this->input->post('start_time'),
			'end_time'          =>$this->input->post('end_time'),
			'exam_duration'    =>$minutes,
			'no_of_question'   =>$this->input->post('no_of_question'),
			'exam_date'        =>date("Y-m-d",strtotime($this->input->post('exam_date'))),
		
		);
		$date=array('created_on'=>date('Y-m-d H:i:s'));
		if (!empty($this->input->post('course_work_exam_exam_id'))){
			$this->db->where('id',$this->input->post('course_work_exam_exam_id'));
			$this->db->update('tbl_course_work_exam',$data);
			return 0;
		}else{
			$newData=array_merge($data,$date);
			$this->db->insert('tbl_course_work_exam',$newData);
			return 1;
		}
	}
	public function get_single_course_work_exam(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_course_work_exam');
		return $result->row();
	}
	public function get_stream_course_work_exam_list_ajax($length,$start,$search){

		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('exam_name',$search);
			$this->db->or_like('exam_duration',$search);
			$this->db->or_like('no_of_question',$search);
			$this->db->or_like('exam_date',$search);
			$this->db->group_end();
		}

		$this->db->select('tbl_course_work_exam.*,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_course_work_exam.is_deleted','0');
		$this->db->join("tbl_course","tbl_course.id = tbl_course_work_exam.course");
		$this->db->join("tbl_stream","tbl_stream.id = tbl_course_work_exam.stream");
		$this->db->limit($length,$start);
		$this->db->order_by('tbl_course_work_exam.id','DESC');
		$result = $this->db->get('tbl_course_work_exam');
		return $result->result();
		
	}
	public function get_stream_course_work_exam_list_ajax_count($search){

		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->or_like('exam_name',$search);
			$this->db->or_like('exam_duration',$search);
			$this->db->or_like('no_of_question',$search);
			$this->db->or_like('exam_date',$search);
			$this->db->group_end();
		}

		$this->db->select('tbl_course_work_exam.*,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_course_work_exam.is_deleted','0');
		$this->db->join("tbl_course","tbl_course.id = tbl_course_work_exam.course");
		$this->db->join("tbl_stream","tbl_stream.id = tbl_course_work_exam.stream");
		$result = $this->db->get('tbl_course_work_exam');
		return $result->num_rows();
		
	}
	public function get_common_course_work_exam_list_ajax($length,$start,$search){

		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('exam_name',$search);
			$this->db->or_like('exam_duration',$search);
			$this->db->or_like('no_of_question',$search);
			$this->db->or_like('exam_date',$search);
			$this->db->group_end();
		}

		$this->db->select('tbl_course_work_exam.*,tbl_course.course_name');
		$this->db->where('tbl_course_work_exam.is_deleted','0');
		$this->db->where('tbl_course_work_exam.stream','0');
		$this->db->join("tbl_course","tbl_course.id = tbl_course_work_exam.course");
		$this->db->limit($length,$start);
		$this->db->order_by('tbl_course_work_exam.id','DESC');
		$result = $this->db->get('tbl_course_work_exam');
		return $result->result();
		
	}
	public function get_common_course_work_exam_list_ajax_count($search){

		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('exam_name',$search);
			$this->db->or_like('exam_duration',$search);
			$this->db->or_like('no_of_question',$search);
			$this->db->or_like('exam_date',$search);
			$this->db->group_end();
		}

		$this->db->select('tbl_course_work_exam.*,tbl_course.course_name');
		$this->db->where('tbl_course_work_exam.is_deleted','0');
		$this->db->where('tbl_course_work_exam.stream','0');
		$this->db->join("tbl_course","tbl_course.id = tbl_course_work_exam.course");
		$result = $this->db->get('tbl_course_work_exam');
		return $result->num_rows();
		
	}
	public function get_selected_stream_new($course){
		$this->db->select('tbl_course_stream_relation.*,tbl_stream.stream_name');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.course',$course);
		$this->db->order_by('tbl_stream.stream_name','ASC');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		$result = $result->result();
		return $result;

	}
	public function insert_batch_course_work_question($store_data){
		$this->db->insert_batch('tbl_course_work_question',$store_data);
		return true;
	}
	public function get_course_work_stream_wise_question($length,$start,$search){

		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}

		$this->db->select('tbl_course_work_question.*,tbl_course.course_name');
		$this->db->where('tbl_course_work_question.is_deleted','0');
		$this->db->where('tbl_course_work_question.course_work_data_id',$this->input->post('course_work_id'));
		$this->db->join("tbl_course_work_exam","tbl_course_work_exam.id = tbl_course_work_question.course_work_data_id");
		$this->db->join("tbl_course","tbl_course.id = tbl_course_work_exam.course");
		// $this->db->join("tbl_stream","tbl_stream.id = tbl_course_work_exam.stream");
		$this->db->limit($length,$start);
		$this->db->group_by('text_data');
		$this->db->order_by('tbl_course_work_question.id','DESC');
		$result = $this->db->get('tbl_course_work_question');
		return $result->result();
		
	}
	public function get_course_work_stream_wise_question_count($search){

		if($search !=""){
			$this->db->group_start();
				$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}

		$this->db->select('tbl_course_work_question.*,tbl_course.course_name');
		$this->db->where('tbl_course_work_question.is_deleted','0');
		$this->db->where('tbl_course_work_question.course_work_data_id',$this->input->post('course_work_id'));
		$this->db->join("tbl_course_work_exam","tbl_course_work_exam.id = tbl_course_work_question.course_work_data_id");
		$this->db->join("tbl_course","tbl_course.id = tbl_course_work_exam.course");
		// $this->db->join("tbl_stream","tbl_stream.id = tbl_course_work_exam.stream");
		$result = $this->db->get('tbl_course_work_question');
		return $result->num_rows();
		
	}
	public function get_course_work_common_question($length,$start,$search){

		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->group_end();
		}

		$this->db->select('tbl_course_work_question.*,tbl_course.course_name');
		$this->db->where('tbl_course_work_question.is_deleted','0');
		$this->db->where('tbl_course_work_exam.stream','0');
			$this->db->join("tbl_course_work_exam","tbl_course_work_exam.id = tbl_course_work_question.course_work_data_id");
		$this->db->join("tbl_course","tbl_course.id = tbl_course_work_exam.course");
		$this->db->limit($length,$start);
		$this->db->order_by('tbl_course_work_question.id','DESC');
		$result = $this->db->get('tbl_course_work_question');
		return $result->result();
		
	}
	public function get_course_work_common_question_count($search){

		if($search !=""){
			$this->db->group_start();
				$this->db->or_like('tbl_course.course_name',$search);
			$this->db->group_end();
		}

		$this->db->select('tbl_course_work_question.*,tbl_course.course_name');
		$this->db->where('tbl_course_work_question.is_deleted','0');
		$this->db->where('tbl_course_work_exam.stream','0');
		$this->db->join("tbl_course_work_exam","tbl_course_work_exam.id = tbl_course_work_question.course_work_data_id");
		$this->db->join("tbl_course","tbl_course.id = tbl_course_work_exam.course");
		$result = $this->db->get('tbl_course_work_question');
		return $result->num_rows();
		
	}
	public function get_single_course_work_exam_question(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_course_work_question');
		return $result->row();
	}
	public function update_course_work_question(){
			$options = [$this->input->post('option_1'),$this->input->post('option_2'),$this->input->post('option_3'),$this->input->post('option_4')];
			$text_data = array(
				"question" 		=> $this->input->post('question'),
				"selected_ans" 	=> $this->input->post('corrent_answer'),
				"options" 		=> $options,
				"img_data" 		=> '',
			);
			$data = array(
				
				// "subject_id" 	=> $this->input->post('subject'),
				"text_data" 	=> json_encode(['options' => $text_data]),
				"correct_ans" 	=> $this->input->post('corrent_answer'),
			);
			// print_r($new);exit();
		$this->db->where('id',$this->input->post('question_id'));
		if ($this->db->update('tbl_course_work_question',$data)){
			$this->db->where('id',$this->input->post('question_id'));
			$result = $this->db->get('tbl_course_work_question');
			$row=$result->row();
			$test_id = $row->course_work_data_id;
			return $test_id;

		} else {
			return false;
			
		}
	}
	public function get_course_work_exam_name($course){
		$this->db->select('tbl_course_work_exam.*,tbl_course.course_name');
		$this->db->where('tbl_course_work_exam.is_deleted','0');
		$this->db->where('tbl_course_work_exam.id',$course);
		$this->db->join("tbl_course","tbl_course.id = tbl_course_work_exam.course");
		// $this->db->join("tbl_stream","tbl_stream.id = tbl_course_work_exam.stream");
		$result = $this->db->get('tbl_course_work_exam');
		$result = $result->row();
		return $result;

	}
	public function add_single_course_work_question(){
			$options = [$this->input->post('option_1'),$this->input->post('option_2'),$this->input->post('option_3'),$this->input->post('option_4')];
			$text_data = array(
				"question" 		=> $this->input->post('question'),
				"selected_ans" 	=> $this->input->post('corrent_answer'),
				"options" 		=> $options,
				"img_data" 		=> '',
			);
			
			
			$this->db->where('is_deleted','0');
			$this->db->where('text_data',json_encode(['options' => $text_data]));
			$exist = $this->db->get('tbl_course_work_question');
			$exist = $exist->row();
			if(empty($exist)){
    			$data = array(
    				"course_work_data_id" => $this->uri->segment(2),
    				"created_by" 	=> $this->session->userdata('admin_id'),
    				"text_data" 	=> json_encode(['options' => $text_data]),
    				"correct_ans" 	=> $this->input->post('corrent_answer'),
    				"created_on" 	=> date("Y-m-d H:i:s"),
    			);
			
		
    		if ($this->db->insert('tbl_course_work_question',$data)){
    			 $insert_id = $this->db->insert_id();
    			$this->db->where('id',$insert_id);
    			$result = $this->db->get('tbl_course_work_question');
    			$row=$result->row();
    			$test_id = $row->course_work_data_id;
    			return $test_id;
    
    		} else {
    			return false;
    			
    		}
			}else{
			    return false;
			}
	}
	public function get_all_course_stream_relation(){
		$this->db->select('tbl_course.course_name,tbl_course.id');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.status','1');
		$this->db->where('tbl_course_stream_relation.course','23');
		$this->db->order_by('tbl_course.course_name','ASC');
		$this->db->group_by('tbl_course_stream_relation.course');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_course_stream_relation.faculty');
		$this->db->join('tbl_course','tbl_course.id = tbl_course_stream_relation.course');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();		
	}	
	public function get_course_work_answer_book_name(){
	    $this->db->select('tbl_course_work_exam.exam_name,tbl_course_work_exam_student.*');
	    $this->db->where('tbl_course_work_exam_student.id',$this->uri->segment(2)); 
	    $this->db->join('tbl_course_work_exam','tbl_course_work_exam.id = tbl_course_work_exam_student.exam_id');
	    $result = $this->db->get('tbl_course_work_exam_student');
	    return $result->row();
	}
	public function get_course_work_answer_book($exam_id,$student_id){
	    $this->db->select('tbl_course_work_question.text_data,tbl_course_work_question.correct_ans,tbl_course_work_exam_details.*');
	    $this->db->where('tbl_course_work_exam_details.exam_id',$exam_id);
	    $this->db->where('tbl_course_work_exam_details.student_id',$student_id);
	    $this->db->join('tbl_course_work_question','tbl_course_work_question.id = tbl_course_work_exam_details.question_id');
	    $result = $this->db->get('tbl_course_work_exam_details');
	    return $result->result();
	}
	public function set_course_work_result($file1){ 
		//echo "<pre>";print_r($_POST);exit;
		if($file1 == ""){
			$file1 = $this->input->post("review_report");
		}
		$data = array(
		  'student_id'         =>$this->input->post("student_id"),
		  'attending_status'   =>$this->input->post('attending_status'),
		  'issue_date'         =>date("Y-m-d",strtotime($this->input->post('issue_date'))),
		  'issue_status'       =>$this->input->post('issue_status'),
		  'review_report'	   =>$file1,	
		  'created_on'         => date('Y-m-d H:i:s'),
		);  
		$this->db->insert('tbl_course_work_result',$data);
		$id  = $this->db->insert_id();
		$marksheet_number_ref = '';
		if(strlen($id) == 1){
			$marksheet_number_ref = "0000000".$id;
		}else if(strlen($id) == 2){ 
			$marksheet_number_ref = "000000".$id;
		}else if(strlen($id) == 3){ 
			$marksheet_number_ref = "00000".$id;
		}else if(strlen($id) == 4){ 
			$marksheet_number_ref = "0000".$id;
		}else if(strlen($id) == 5){ 
			$marksheet_number_ref = "000".$id;
		}else if(strlen($id) == 6){ 
			$marksheet_number_ref = "00".$id;
		}else if(strlen($id) == 7){ 
			$marksheet_number_ref = "0".$id;
		}else{
			$marksheet_number_ref = $id;
		}
		$marksheet_number = array(
			'marksheet_number' => $marksheet_number_ref
		);
		$this->db->where('id',$id);
		$this->db->update('tbl_course_work_result',$marksheet_number);
		
		$details_result = array();
		for($i=1;$i<=3;$i++){ 
			$details_result[] = array( 
				'result_id'            =>$id,
				'subject_code'         =>$this->input->post('subject_code'.$i),
				'subject_name'         =>$this->input->post('subject_name'.$i),
				'int_max'              =>$this->input->post('int_max_mark'.$i),
				'int_min'	           =>$this->input->post('int_min_mark'.$i),
				'int_obt'              =>$this->input->post('txtIMO'.$i),
				'ext_max'	           =>$this->input->post('ext_max_mark'.$i),
				'ext_min'              =>$this->input->post('ext_min_mark'.$i),
				'ext_obt'	           =>$this->input->post('txtEMO'.$i),
				'total_int_max_marks'  =>$this->input->post('total_int_max_marks'),
				'total_int_min_marks'  =>$this->input->post('total_int_min_marks'),
				'total_int_obt_marks'  =>$this->input->post('txtTIMO'),
				'total_ext_max_marks'  =>$this->input->post('total_ext_max_marks'),
				'total_ext_min_marks'  =>$this->input->post('total_ext_min_marks'),
				'total_ext_obt_marks'  =>$this->input->post('txtTEMO'),
				'created_on'           => date('Y-m-d H:i:s'),
			);
		}
 		if(!empty($details_result)){
			$this->db->insert_batch('tbl_course_work_result_details',$details_result);
		}
		return true;
	}
	public function get_single_course_data(){
	    $this->db->select('tbl_phd_course_work.*,tbl_student.enrollment_number,tbl_stream.stream_name');
		$this->db->where('tbl_phd_course_work.is_deleted','0');
		$this->db->where('tbl_phd_course_work.status','1');
		$this->db->where('tbl_phd_course_work.id',$this->uri->segment(2));
		$this->db->join("tbl_student","tbl_student.id = tbl_phd_course_work.registration_id");
		$this->db->join("tbl_stream","tbl_stream.id = tbl_phd_course_work.stream_id");
		$result = $this->db->get('tbl_phd_course_work');
		return $result->row();
	} 
	 public function get_course_work_result_list($length,$start,$search){
		//$this->db->where('is_deleted', '0');
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('student_name',$search);
			$this->db->or_like('attending_status',$search);
			$this->db->or_like('issue_date',$search);
			$this->db->or_like('issue_status',$search);
			$this->db->or_like('review_report',$search);
			
			
		}
		$this->db->select('tbl_course_work_result.*,tbl_student.student_name');
		$this->db->where('tbl_course_work_result.is_deleted','0');
		$this->db->where('tbl_course_work_result.status','1');
		$this->db->join("tbl_student","tbl_student.id = tbl_course_work_result.student_id");
		//$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_course_work_result');
		return $result->result();
	}
	public function get_course_work_result_list_count($search){
		$this->db->where('is_deleted', '0'); 
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('student_name',$search);
			$this->db->or_like('attending_status',$search);
			$this->db->or_like('issue_date',$search);
			$this->db->or_like('issue_status',$search);
			$this->db->or_like('review_report',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_course_work_result');
		return $result->num_rows();
	}
	public function get_single_marksheet_result($id){
		$this->db->select('tbl_course_work_result.* ,tbl_student.student_name,tbl_student.father_name,tbl_student.enrollment_number,tbl_stream.stream_name');
        $this->db->where('tbl_course_work_result.is_deleted','0');
        $this->db->where('tbl_course_work_result.status','1');
        $this->db->where('tbl_course_work_result.id',$id);
		$this->db->join('tbl_student','tbl_student.id = tbl_course_work_result.student_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$query = $this->db->get('tbl_course_work_result');
     	$row = $query->row();
        return $row;
	}
	public function get_course_work_marksheet_details(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('result_id',$this->uri->segment(2));
		$result = $this->db->get('tbl_course_work_result_details');
     	$result = $result->result();
        return $result;		  
	}
	public function get_single_course_work_result_data(){
		/*$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_course_work_result');
		return $result->result();*/
		
		
		$this->db->select('tbl_course_work_result.*,tbl_student.enrollment_number,tbl_stream.stream_name');
		$this->db->where('tbl_course_work_result.is_deleted','0');
		$this->db->where('tbl_course_work_result.status','1');
		$this->db->where('tbl_course_work_result.id',$this->uri->segment(2));
		$this->db->join("tbl_student","tbl_student.id = tbl_course_work_result.student_id");
		$this->db->join("tbl_stream","tbl_stream.id = tbl_student.stream_id");
		$result = $this->db->get('tbl_course_work_result');
		return $result->row();
	}
	public function get_course_work_result_subjects($result_id){
		$this->db->where('is_deleted','0');
		$this->db->where('result_id',$result_id);
		$result = $this->db->get('tbl_course_work_result_details');
		return $result->result();
	}
	public function update_course_work_result(){
		//echo "<pre>";print_r($_POST);exit;
		if($file1 == ""){
			$file1 = $this->input->post("review_report");
		}
		$data = array(
		  'student_id'         =>$this->input->post("student_id"),
		  'attending_status'   =>$this->input->post('attending_status'),
		  'issue_date'         =>date("Y-m-d",strtotime($this->input->post('issue_date'))),
		  'issue_status'       =>$this->input->post('issue_status'),
		  'review_report'	   =>$file1,	
		  'created_on'         => date('Y-m-d H:i:s'),
		);
		$this->db->where('id',$this->input->post('result_id'));
		$this->db->update('tbl_course_work_result',$data);
		
		$this->db->where('result_id',$this->input->post('result_id'));
		$this->db->delete('tbl_course_work_result_details');
		
		$details_result = array();
		for($i=1;$i<=3;$i++){ 
			$details_result[] = array( 
				'result_id'            =>$this->input->post('result_id'),
				'subject_code'         =>$this->input->post('subject_code'.$i),
				'subject_name'         =>$this->input->post('subject_name'.$i),
				'int_max'              =>$this->input->post('int_max_mark'.$i),
				'int_min'	           =>$this->input->post('int_min_mark'.$i),
				'int_obt'              =>$this->input->post('txtIMO'.$i),
				'ext_max'	           =>$this->input->post('ext_max_mark'.$i),
				'ext_min'              =>$this->input->post('ext_min_mark'.$i),
				'ext_obt'	           =>$this->input->post('txtEMO'.$i),
				'total_int_max_marks'  =>$this->input->post('total_int_max_marks'),
				'total_int_min_marks'  =>$this->input->post('total_int_min_marks'),
				'total_int_obt_marks'  =>$this->input->post('txtTIMO'),
				'total_ext_max_marks'  =>$this->input->post('total_ext_max_marks'),
				'total_ext_min_marks'  =>$this->input->post('total_ext_min_marks'),
				'total_ext_obt_marks'  =>$this->input->post('txtTEMO'),
				'created_on'           => date('Y-m-d H:i:s'),
			);
		}
 		if(!empty($details_result)){
			$this->db->insert_batch('tbl_course_work_result_details',$details_result);
		}
		return true;
	}
	public function get_pre_courses(){		
		$this->db->select('tbl_student.id,tbl_course.id as c_id');
		$this->db->where('tbl_marksheet.is_deleted','0');
		$this->db->where('tbl_marksheet.id',$this->uri->segment(2));
		//$this->db->where('tbl_course.id',228);
		$this->db->join('tbl_student','tbl_student.id = tbl_marksheet.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$result = $this->db->get('tbl_marksheet');
		return $result->row();
	}
	public function get_bulk_hallticket_activate(){
		$data = array(
			'exam_status' => '1'
		);
		$ids = implode(",",$this->input->post('slecter'));
		$exp = explode(",",$ids);
		$this->db->where_in('id',$exp); 
		$this->db->update('tbl_examination_form',$data);
		return true;
	}
	public function bulk_marksheet_activation(){ 
		$ids = array();
		$resukt_id = $this->input->post('resukt_id'); 
		for($i=0;$i<=count($resukt_id);$i++){
			$ids[] = $resukt_id[$i];
		}
		if(!empty($ids)){
			$this->db->where_in('id',$ids);
			$result = $this->db->get('tbl_exam_results');
			$result = $result->result();
			
			if(!empty($result)){
				foreach($result as $single_result){
					$this->db->where('result_id',$single_result->id);
					$this->db->where('is_deleted','0');
					$exist = $this->db->get('tbl_marksheet');
					$exist = $exist->row();
					
					if(empty($exist)){ 
						$result_date = "01-11-2021";
						$issue_date = "01-11-2021";
						if($single_result->examination_month == 'May' && $single_result->examination_year == '2021'){
							$issue_date="01-11-2021";
							$result_date = "01-11-2021";
						}else if($single_result->examination_month =='August' && $single_result->examination_year =='2021'){
							$issue_date="01-11-2021";
							$result_date = "01-11-2021";
						}else if($single_result->examination_month =='January' && $single_result->examination_year =='2021'){
							$issue_date="14-03-2022";
							$result_date = "14-03-2022";
						}else if($single_result->examination_month =='January' && $single_result->examination_year =='2022'){
							$issue_date="14-03-2022";
							$result_date = "14-03-2022";
						}else if($single_result->examination_month =='July' && $single_result->examination_year =='2022'){
							$issue_date="25-08-2022";
							$result_date = "25-08-2022";
						}else if($single_result->examination_month =='August' && $single_result->examination_year =='2022'){
							$issue_date="25-08-2022";
							$result_date = "25-08-2022";
						} 
						$this->db->where('id',$single_result->student_id);
						$student = $this->db->get('tbl_student');
						$student = $student->row();					
						$this->db->where('course',$single_result->course_id);
						$this->db->where('stream',$single_result->stream_id);
						$course_stream = $result = $this->db->get('tbl_course_stream_relation');
						$course_stream = $course_stream->row();
						$marksheet_number = date("Ymd");					
						$data = array(
							'marksheet_status' 		=> '0',
							'result_declare_date' 	=> $result_date,
							'marksheet_issue_date' 	=> $issue_date,
							'print_stream' 			=> "1",
							'student_id' 			=> $student->id,
							'final_status' 			=> "0",
							'issue_status' 			=> "1",
							'display_mode' 			=> $course_stream->course_mode,
							'year_sem' 				=> $single_result->year_sem,
							'credit_transfer' 		=> '0',
							'result_id' 			=> $single_result->id,
							'enrollment_number' 	=> $student->enrollment_number,
							'credit_transfer_remark' => '',
							'status' 				=> '1',
							'added_by' 				=> $this->session->userdata('admin_id'),
							'created_on'			=> date("Y-m-d H:i:s"),
						);  
						$this->db->insert('tbl_marksheet',$data);
						$last_id = $this->db->insert_id();
						$update = array(
							'marksheet_number' => $marksheet_number.$last_id
						);
						$this->db->where('id',$last_id);
						$this->db->update('tbl_marksheet',$update);
					}else{ 
						$data = array(
							'status' => '1',
							'issue_status' => '1',
						);
						$this->db->where('result_id',$single_result->id); 
						$this->db->update('tbl_marksheet',$data);
					}
				}
			}
		}
		return 0;
	}
	public function bulk_marksheet_hold(){ 
		$ids = array();
		$resukt_id = $this->input->post('resukt_id');
		for($i=0;$i<=count($resukt_id);$i++){
			$ids[] = $resukt_id[$i];
		} 
		$data = array(
			'status' => '0',
			'issue_status' => '0',
		);
		if(!empty($ids)){
			$this->db->where_in('id',$ids);
			$result = $this->db->get('tbl_exam_results');
			$result = $result->result();
			if(!empty($result)){
				foreach($result as $single_result){
					$this->db->where('result_id',$single_result->id); 
					$exist = $this->db->update('tbl_marksheet',$data);
				}
			}
		}
		return 0;
	}
	public function activate_selected_result(){ 
		$ids = array();
		$resukt_id = $this->input->post('resukt_id');
		$data = array(
			'status' => '1'
		);
		for($i=0;$i<=count($resukt_id);$i++){ 
			$this->db->where('id',$resukt_id[$i]);
			$this->db->update('tbl_exam_results',$data);
		} 
		return 0;
	}
	public function hold_selected_result(){ 
		$ids = array();
		$resukt_id = $this->input->post('resukt_id'); 
		$data = array('status' => '0');
		for($i=0;$i<=count($resukt_id);$i++){ 
			$this->db->where('id',$resukt_id[$i]);
			$this->db->update('tbl_exam_results',$data);
		}  
		return 0;
	}
	public function get_active_center_list(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->order_by('center_name','ASC');
		$result = $this->db->get('tbl_center');
		return $result->result();
	}
	public function get_single_document_vefification_deatails(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_document_verification');
		return $result->row();
	}
	public function update_document_verification(){		
		$data = array(
			'transaction_id' => $this->input->post('transaction_id'),
			'payment_status' => $this->input->post('payment_status'),
		);
		$this->db->where('id',$this->input->post('hidden_id'));
		$this->db->update('tbl_document_verification',$data);
		if($this->input->post('payment_status')=='1'){
			redirect ('document_verification_success');
		}else{
			redirect ('document_verification_pending');
		}
	}
	
} 
