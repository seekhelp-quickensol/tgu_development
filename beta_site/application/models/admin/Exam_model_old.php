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
			"created_by" 	=> $this->session->userdata('admin_id'),
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
		$this->db->where('year_sem',$this->input->post('year_sem'));
		$result = $this->db->get('tbl_subject');
		echo json_encode($result->result());	
	}
	public function get_selected_course_subject($course,$stream,$year_sem){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course',$course);
		$this->db->where('stream',$stream);
		$this->db->where('year_sem',$year_sem);
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
			$this->db->where('tbl_subject.year_sem',$student->year_sem);
			$result = $this->db->get('tbl_subject'); 
			return $result->result();
		}else{
			return array();
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
			$this->db->where('enrollment_number',$this->security->xss_clean($this->input->post('txtEnNo')));
			$this->db->where('year_sem',$this->security->xss_clean($this->input->post('txtYS')));
			$this->db->where('examination_status',$this->security->xss_clean($this->input->post('txtExamStatus')));
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
				'added_by' 					=> $this->session->userdata('admin_id'),
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
		$this->db->where('tbl_examination_result_details.is_deleted','0');
		$this->db->where('tbl_examination_result_details.status','1');
		$this->db->where('tbl_examination_result_details.result_id',$result_id);
		$this->db->join('tbl_subject','tbl_subject.id = tbl_examination_result_details.subject_id');
		$result = $this->db->get('tbl_examination_result_details');
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
		$this->db->select('tbl_marksheet.*,tbl_exam_results.result,tbl_exam_results.examination_month,tbl_exam_results.examination_year,tbl_exam_results.result_declare_date,tbl_student.student_name,tbl_student.father_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_marksheet.is_deleted','0');
		$this->db->where('tbl_marksheet.id',$this->uri->segment(2));
		$this->db->join('tbl_exam_results','tbl_exam_results.id = tbl_marksheet.result_id');
		$this->db->join('tbl_student','tbl_student.id = tbl_marksheet.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
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
		$this->db->select('tbl_center.center_name,tbl_examination_form.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.enrollment_number');
		$this->db->where('tbl_examination_form.is_deleted','0'); 
		$this->db->where('tbl_examination_form.payment_status','1');   
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_student.student_name',$search); 
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_student.mobile',$search); 
			$this->db->or_like('tbl_center.center_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');    
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');    
		$this->db->order_by('tbl_examination_form.created_on','DESC');  
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_examination_form');
		return $result->result();
	}
	public function get_all_examination_form_list_count($search){
		$this->db->select('tbl_center.center_name,tbl_examination_form.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.enrollment_number');
		$this->db->where('tbl_examination_form.is_deleted','0');  
		$this->db->where('tbl_examination_form.payment_status','1');  
		if($search !=""){
			$this->db->group_start(); 
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search); 
			$this->db->or_like('tbl_student.student_name',$search); 
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_student.email',$search);
			$this->db->or_like('tbl_student.mobile',$search);
			$this->db->or_like('tbl_center.center_name',$search); 
			$this->db->group_end();
		}
		$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');     
		$this->db->order_by('tbl_examination_form.created_on','DESC');  
		$result = $this->db->get('tbl_examination_form');
		return $result->num_rows();
	}

	public function get_all_examination_form_failed_list($length,$start,$search){
		$this->db->select('tbl_center.center_name,tbl_examination_form.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.enrollment_number');
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
			$this->db->group_end();
		}
		$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');    
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');    
		$this->db->order_by('tbl_examination_form.created_on','DESC');  
		$this->db->limit($length,$start);
		$this->db->group_by('tbl_examination_form.student_id');
		$result = $this->db->get('tbl_examination_form');
		return $result->result();
	}
	public function get_all_examination_form_list_failed_count($search){
		$this->db->select('tbl_center.center_name,tbl_examination_form.*,tbl_course.course_name,tbl_stream.stream_name,tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.enrollment_number');
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
			$this->db->group_end();
		}
		$this->db->join('tbl_student','tbl_student.id = tbl_examination_form.student_id');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id'); 
		$this->db->join('tbl_center','tbl_center.id = tbl_student.center_id');    
		$this->db->order_by('tbl_examination_form.created_on','DESC');  
		$this->db->group_by('tbl_examination_form.student_id');
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
} 