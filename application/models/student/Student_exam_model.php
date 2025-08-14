<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Student_exam_model extends CI_Model{ 
	public function login(){
		$this->db->select('tbl_student.*,tbl_examination_form.year_sem as year');
		$this->db->where('tbl_student.is_deleted','0');
		$this->db->where('tbl_student.status','1');
		$this->db->where('tbl_examination_form.exam_status','1');
		$this->db->where_in('tbl_student.admission_status',array(1,4));
		$this->db->where('tbl_student.username',$this->input->post('username'));
		$this->db->where('tbl_student.password',$this->input->post('password'));
		$this->db->join('tbl_examination_form','tbl_examination_form.student_id = tbl_student.id');
		$result = $this->db->get('tbl_student');
		$result = $result->row();
		if(!empty($result)){
			$data = array(
				'exam_student_id' 	=> $result->id,
				'exam_center_id' 	=> $result->center_id,
				'exam_course_id' 	=> $result->course_id,
				'exam_stream_id' 	=> $result->stream_id,
				'exam_student_name' => $result->student_name,
			);
			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
	}
	public function get_student_profile(){
		$this->db->where('id',$this->session->userdata('exam_student_id'));
		$result = $this->db->get('tbl_student');
		return $result->row();
	}
	public function get_completed_exam(){
		$student = $this->get_student_profile();
		$this->db->select('exam_id');
		$this->db->where('student_id',$student->id);
		$this->db->where('is_deleted','0');
		$completed = $this->db->get('tbl_student_exam');
		$completed = $completed->result();
		$ids = array();
		if(!empty($completed)){
			foreach($completed as $completed_result){
				$ids[] = $completed_result->exam_id;
			}
		}
		if(!empty($ids)){
			$this->db->where_in('id',$ids);		
			$this->db->where('is_deleted','0');
			$this->db->where('status','1');
			$this->db->where('course_id',$student->course_id);
			$this->db->where('stream_id',$student->stream_id);
			$this->db->where('year_sem',$student->year_sem);
			$result = $this->db->get('tbl_examination');
			return $result->result();
		}
	}
	public function get_upcoming_exam(){
		$student = $this->get_student_profile();
		$this->db->select('exam_id');
		$this->db->where('student_id',$student->id);
		$this->db->where('is_deleted','0');
		$completed = $this->db->get('tbl_student_exam');
		$completed = $completed->result();
		$ids = array();
		if(!empty($completed)){
			foreach($completed as $completed_result){
				$ids[] = $completed_result->exam_id;
			}
		}
		if(!empty($ids)){
			$this->db->where_not_in('id',$ids);
		}
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('course_id',$student->course_id);
		$this->db->where('stream_id',$student->stream_id);
		$this->db->where('year_sem',$student->year_sem);
		$this->db->where('exam_date',date("Y-m-d"));
		$result = $this->db->get('tbl_examination');
		return $result->result();
	}
	public function get_start_exam(){
		$student = $this->get_student_profile();
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('id',base64_decode($this->uri->segment(2)));
		$this->db->where('course_id',$student->course_id);
		$this->db->where('stream_id',$student->stream_id);
		$this->db->where('year_sem',$student->year_sem);
		$result = $this->db->get('tbl_examination');
		return $result->row();
	}
	public function get_exam_questions($data){
		$this->db->where('exam_id',$data->id);
		$this->db->order_by('id','RANDOM');
		$this->db->limit($data->number_of_question);
		$result = $this->db->get('tbl_exam_question');
		return $result->result();
	}
	public function set_student_exam(){
		$exam_details = array(
			'student_id'	 => $this->session->userdata('exam_student_id'),
			'exam_id' 		=> $this->input->post('exam_id'),
			'created_on'	=> date("Y-m-d H:i:s")
		);
		$this->db->insert('tbl_student_exam',$exam_details);
		$last_id = $this->db->insert_id();
		
		$data = array();
		$correct_answer = 0;
		$question = $this->input->post('question');
		if(!empty($question)){
			for($i=0;$i<count($question);$i++){
				$given_answer = '0';
				if($this->input->post('option'.$question[$i])){
					$ans = $this->input->post('option'.$question[$i]);
					$given_answer = $ans[0];
				}
				$this->db->where('exam_id',$this->input->post('exam_id'));
				$this->db->where('id',$question[$i]);
				$this->db->where('correct_answer',$given_answer);
				$exist = $this->db->get('tbl_exam_question');
				$exist = $exist->row();
				if(!empty($exist)){
					$correct_answer = $correct_answer+1;
				}
				
				$data[] = array(
					'student_id' 		=> $this->session->userdata('exam_student_id'),
					'student_exam_id'	=> $last_id,
					'question_id'		=> $question[$i],
					'given_answer'		=> $given_answer,
					'created_on'		=> date("Y-m-d H:i:s"),
				);
			}
			$this->db->insert_batch('tbl_student_exam_completed',$data);
		}
		$update_data = array(
			'correct_answer' => $correct_answer
		);
		$this->db->where('id',$last_id);
		$this->db->update('tbl_student_exam',$update_data);
		return true;
	}
} 