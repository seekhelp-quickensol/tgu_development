<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Course_model extends CI_Model { 
	public function set_course(){
		$data = array(
			'course_name' => $this->input->post('course_name'),
			'print_name' => $this->input->post('print_name'),
			'sort_name'  => $this->input->post('sort_name'),
			'course_link' => $this->input->post('course_link'),
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_course',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_course',$data);
			return 1;
		}
	}
	public function get_unique_course(){
		$this->db->where('course_name',$this->input->post('course_name'));
		$this->db->where('id !=',$this->input->post('id'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_course');
		echo $result->num_rows();
	}
	public function get_all_course_ajax($length,$start,$search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('course_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('course_name','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_course');
		return $result->result();		
	}
	public function get_all_course_count($search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('course_name',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_course');
		return $result->num_rows();
	}
	public function get_single_course(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_course');
		return $result->row();
	}
	public function set_stream(){
		$data = array(
			'stream_name' => $this->input->post('stream_name')
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_stream',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_stream',$data);
			return 1;
		}
	}
	public function get_unique_stream(){
		$this->db->where('stream_name',$this->input->post('stream_name'));
		$this->db->where('id !=',$this->input->post('id'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_stream');
		echo $result->num_rows();
	}
	public function get_all_stream_ajax($length,$start,$search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('stream_name','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_stream');
		return $result->result();		
	}
	public function get_all_stream_count($search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('stream_name',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_stream');
		return $result->num_rows();
	}
	public function get_single_stream(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_stream');
		return $result->row();
	}
	public function set_faculty(){
		$data = array(
			'faculty_code' => $this->input->post('faculty_code'),
			'faculty_name' => $this->input->post('faculty_name')
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_faculty',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_faculty',$data);
			return 1;
		}
	}
	public function get_unique_faculty(){
		$this->db->where('faculty_name',$this->input->post('faculty_name'));
		$this->db->where('id !=',$this->input->post('id'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_faculty');
		echo $result->num_rows();
	}
	public function get_all_faculty_ajax($length,$start,$search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('faculty_code',$search);
			$this->db->or_like('faculty_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('faculty_name','ASC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_faculty');
		return $result->result();		
	}
	public function get_all_faculty_count($search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('faculty_code',$search);
			$this->db->or_like('faculty_name',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_faculty');
		return $result->num_rows();
	}
	public function get_single_faculty(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_faculty');
		return $result->row();
	}
	public function set_session(){
		$data = array(
			'session_name' 			=> $this->input->post('session_name'),
			'session_start_date' 	=> date("Y-m-d",strtotime($this->input->post('session_start_date'))),
			'session_end_date' 		=> date("Y-m-d",strtotime($this->input->post('session_end_date'))),
			'late_fees_date' 		=> date("Y-m-d",strtotime($this->input->post('late_fees_date'))),
			'late_fees' 			=> $this->input->post('late_fees'),
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_session',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_session',$data);
			return 1;
		}
	}
	public function get_unique_session(){
		$this->db->where('session_name',$this->input->post('session_name'));
		$this->db->where('id !=',$this->input->post('id'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_session');
		echo $result->num_rows();
	}
	public function get_all_session_ajax($length,$start,$search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('session_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_session');
		return $result->result();		
	}
	public function get_all_session_count($search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('session_name',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_session');
		return $result->num_rows();
	}
	public function get_single_session(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_session');
		return $result->row();
	}
	public function set_course_type(){
		$data = array(
			'course_type' 			=> $this->input->post('course_type'),
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_course_type',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_course_type',$data);
			return 1;
		}
	}
	public function get_unique_course_type(){
		$this->db->where('course_type',$this->input->post('course_type'));
		$this->db->where('id !=',$this->input->post('id'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_course_type');
		echo $result->num_rows();
	}
	public function get_all_course_type_ajax($length,$start,$search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('course_type',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_course_type');
		return $result->result();		
	}
	public function get_all_course_type_count($search){
		$this->db->where('is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('course_type',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_course_type');
		return $result->num_rows();
	}
	public function get_single_course_type(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_course_type');
		return $result->row();
	}
	public function get_active_couse_type(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->order_by('course_type','ASC');
		$result = $this->db->get('tbl_course_type');
		return $result->result();
	}
	public function get_active_faculty(){
		$this->db->where('is_deleted','0');
		//$this->db->where('status','1');
		$this->db->order_by('faculty_name','ASC');
		$result = $this->db->get('tbl_faculty');
		return $result->result();
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
	public function get_unique_course_stream_relation(){
		$this->db->where('is_deleted','0');
		if($this->input->post('id') !=""){
			$this->db->where('id !=',$this->input->post('id'));
		}
		$this->db->where('faculty',$this->input->post('faculty'));
		$this->db->where('course',$this->input->post('course'));
		$this->db->where('stream',$this->input->post('stream'));
		$result = $this->db->get('tbl_course_stream_relation');
		echo $result->num_rows();
	}
	public function set_course_stream_relation(){
		$data = array(
			'course_code' 	=> $this->input->post('course_code'),
			'faculty' 		=> $this->input->post('faculty'),
			'course_type' 	=> $this->input->post('course_type'),
			'course' 		=> $this->input->post('course'),
			'stream' 		=> $this->input->post('stream'),
			'course_mode' 	=> $this->input->post('course_mode'),
			'year_duration' => $this->input->post('year_duration'),
			'sem_duration' 	=> $this->input->post('sem_duration'),
			'month_duration' => $this->input->post('month_duration'),
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$this->db->where('is_deleted','0');
			$this->db->where('faculty',$this->input->post('faculty'));
			$this->db->where('course',$this->input->post('course'));
			$this->db->where('stream',$this->input->post('stream'));
			$exist = $this->db->get('tbl_course_stream_relation');
			$exist = $exist->row();
			if(empty($exist)){
				$new_arr = array_merge($data,$date);
				$this->db->insert('tbl_course_stream_relation',$new_arr);
			}
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_course_stream_relation',$data);
			return 1;
		}
	}
	public function get_all_course_stream_relation_ajax($length,$start,$search){
		$this->db->select('tbl_course_stream_relation.*,tbl_faculty.faculty_name,tbl_course_type.course_type as course_type_name,tbl_course.course_name,tbl_stream.stream_name');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course_stream_relation.course_code',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_course_stream_relation.id','DESC');
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_course_stream_relation.faculty');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_course_stream_relation.course_type');
		$this->db->join('tbl_course','tbl_course.id = tbl_course_stream_relation.course');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();		
	}
	public function get_all_course_stream_relation_count($search){
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_course_stream_relation.course_code',$search);
			$this->db->or_like('tbl_faculty.faculty_name',$search);
			$this->db->or_like('tbl_course_type.course_type',$search);
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_faculty','tbl_faculty.id = tbl_course_stream_relation.faculty');
		$this->db->join('tbl_course_type','tbl_course_type.id = tbl_course_stream_relation.course_type');
		$this->db->join('tbl_course','tbl_course.id = tbl_course_stream_relation.course');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->num_rows();
	}
	public function get_single_course_stream_relation(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->row();
	}
	public function get_all_course_stream_relation(){
		$this->db->select('tbl_course_stream_relation.*,tbl_course.course_name');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->order_by('tbl_course.course_name','ASC');
		$this->db->group_by('tbl_course_stream_relation.course');
		$this->db->join('tbl_course','tbl_course.id = tbl_course_stream_relation.course');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();		
	}
	public function get_all_session(){
		$this->db->where('is_deleted','0');
		$this->db->order_by('id','DESC');
		$result = $this->db->get('tbl_session');
		return $result->result();
	}
	public function get_course_stream_ajax(){
		$this->db->select('tbl_course_stream_relation.*,tbl_stream.stream_name');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.course',$this->input->post('course'));
		$this->db->order_by('tbl_stream.stream_name','ASC');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		echo json_encode($result->result());
	}
	public function get_selected_course_stream($course){
		$this->db->select('tbl_course_stream_relation.*,tbl_stream.stream_name');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.course',$course);
		$this->db->order_by('tbl_stream.stream_name','ASC');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();
	}
	public function get_unique_course_stream_fees(){
		$exp = explode('@@@',$this->input->post('stream'));
		if($this->input->post('stream') !=""){
			$this->db->where('is_deleted','0');
			if($this->input->post('id') !=""){
				$this->db->where('id !=',$this->input->post('id'));
			}
			$this->db->where('course_id',$this->input->post('course'));
			$this->db->where('stream_id',$exp[1]);
			$this->db->where('session_id',$this->input->post('session'));
			$result = $this->db->get('tbl_fees_realtion');
			echo $result->num_rows();
		}else{
			echo 0;
		}
	}
	public function set_course_stream_fees(){
		$exp = explode("@@@",$this->input->post('stream'));
		$data = array(
			'course_id' 	=> $this->input->post('course'),
			'relation_id' 	=> $exp[0],
			'stream_id' 	=> $exp[1],
			'session_id' 	=> $this->input->post('session'),
			'fees' 			=> $this->input->post('fees'),
			'campus_fees' 	=> $this->input->post('campus_fees'),

		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_fees_realtion',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_fees_realtion',$data);
			return 1;
		}
	}
	public function get_all_course_stream_fees_ajax($length,$start,$search){
		$this->db->select('tbl_fees_realtion.*,tbl_course.course_name,tbl_stream.stream_name,tbl_session.session_name');
		$this->db->where('tbl_fees_realtion.is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_fees_realtion.fees',$search);
			$this->db->or_like('tbl_fees_realtion.campus_fees',$search);

			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_fees_realtion.id','DESC');
		$this->db->join('tbl_course','tbl_course.id = tbl_fees_realtion.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_fees_realtion.stream_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_fees_realtion.session_id');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_fees_realtion');
		return $result->result();		
	}
	public function get_all_course_stream_fees_count($search){
		$this->db->where('tbl_fees_realtion.is_deleted','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_session.session_name',$search);
			$this->db->or_like('tbl_fees_realtion.fees',$search);
			$this->db->or_like('tbl_fees_realtion.campus_fees',$search);
			
			$this->db->or_like('tbl_course.course_name',$search);
			$this->db->or_like('tbl_stream.stream_name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_course','tbl_course.id = tbl_fees_realtion.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_fees_realtion.stream_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_fees_realtion.session_id');
		$result = $this->db->get('tbl_fees_realtion');
		return $result->num_rows();
	}
	
	public function get_single_course_stream_fees(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_fees_realtion');
		return $result->row();
	}
	public function get_course_stream_mode(){
		if($this->input->post('stream') !=""){
			$exp = explode("@@@",$this->input->post('stream'));
			$this->db->where('is_deleted','0');
			$this->db->where('course',$this->input->post('course'));
			$this->db->where('stream',$exp[1]);
			$result = $this->db->get('tbl_course_stream_relation');
			$result = $result->row();
			if(!empty($result)){
				if($result->course_mode =="3"){
					echo "
						<option value=''>Select Course Mode</option>
						<option value='1'>Year</option>
						<option value='2'>Semester</option>
						<option value='3'>Both</option>
					";
				}else if($result->course_mode =="2"){
					echo "
						<option value=''>Select Course Mode</option>
						<option value='2'>Semester</option>
						<option value='3'>Both</option>
					";
				}else if($result->course_mode =="1"){
					echo "
						<option value=''>Select Course Mode</option>
						<option value='1'>Year</option>
					";
				}else if($result->course_mode =="4"){
					echo "
						<option value=''>Select Course Mode</option>
						<option value='4'>Month</option>
					";
				}
			}
		}
	}
	public function insert_batch_subject($data){
		$this->db->insert_batch('tbl_subject',$data);
	}
	public function set_subject(){
		$stream = $this->input->post('stream');
		$exp = explode("@@@",$stream);
		$code = $this->input->post('txtSubjectCode');
		$name = $this->input->post('txtSubjectName');
		$type = $this->input->post('comboType');
		$txtIMM = $this->input->post('txtIMM');
		$txtEMM = $this->input->post('txtEMM');
		$credit = $this->input->post('txtCredit');
		$min_credit = $this->input->post('min_credit');
		$data = array();
		for($i=0;$i<count($code);$i++){
			if($code[$i] != ""){
				$data[] = array(
					'course' 			=> $this->input->post('course'),
					'stream'		 	=> $exp[1],
					'year_sem' 			=> $this->security->xss_clean($this->input->post('year_sem')),
					'mode' 				=> $this->security->xss_clean($this->input->post('course_mode')),
					'subject_code' 		=> $code[$i],
					'subject_name' 		=> $name[$i],
					'subject_type' 		=> $type[$i],
					'internal_marks' 	=> $txtIMM[$i],
					'external_mark' 	=> $txtEMM[$i],
					'credit' 			=> $credit[$i],
					'center_id' 		=> '1',
					'created_on' 		=> date("Y-m-d H:i:s"),
				);
			}				
		}
		if(!empty($data)){
			$this->db->insert_batch('tbl_subject',$data);
		}
		return true;
	}
	public function get_selected_subject(){
		if(isset($_GET['stream'])){
			$exp = explode("@@@",$_GET['stream']);
			$this->db->select('tbl_subject.*,tbl_course.course_name,tbl_stream.stream_name');
			$this->db->where('tbl_subject.year_sem',$_GET['year_sem']);
			$this->db->where('tbl_subject.course',$_GET['course']);
			$this->db->where('tbl_subject.stream',$exp[1]);
			$this->db->where('tbl_subject.is_deleted','0');
			$this->db->join('tbl_course','tbl_course.id = tbl_subject.course');
			$this->db->join('tbl_stream','tbl_stream.id = tbl_subject.stream');
			$result = $this->db->get('tbl_subject');
			return $result->result();
		}else{
			return array();
		}
	}
	public function get_single_subject(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$_GET['id']);
		$result = $this->db->get('tbl_subject');
		return $result->row();
	}
	public function get_selected_stream($course){
		$this->db->select('tbl_course_stream_relation.*,tbl_stream.stream_name');
		$this->db->where('tbl_course_stream_relation.is_deleted','0');
		$this->db->where('tbl_course_stream_relation.course',$course);
		$this->db->order_by('tbl_stream.stream_name','ASC');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_course_stream_relation.stream');
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->result();
	}
	public function get_selected_course_mode($course,$stream){
		$this->db->where('is_deleted','0');
		$this->db->where('course',$course);
		$this->db->where('stream',$stream);
		$result = $this->db->get('tbl_course_stream_relation');
		return $result->row();
	}
	public function set_edit_subject(){
		$stream = $this->input->post('stream');
		$exp = explode("@@@",$stream);
		$data = array(
			'course' 			=> $this->input->post('course'),
			'stream'		 	=> $exp[1],
			'year_sem' 			=> $this->security->xss_clean($this->input->post('year_sem')),
			'mode' 				=> $this->security->xss_clean($this->input->post('course_mode')),
			'subject_code' 		=> $this->input->post('txtSubjectCode'),
			'subject_name' 		=> $this->input->post('txtSubjectName'),
			'subject_type' 		=> $this->input->post('comboType'),
			'internal_marks' 	=> $this->input->post('txtIMM'),
			'external_mark' 	=> $this->input->post('txtEMM'),
			'credit' 			=> $this->input->post('txtCredit'),
		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tbl_subject',$data);
		return true;
	}
	public function set_lateral_entry_fees(){
		$data = array(
			'fees_amount' 	=> $this->input->post('fees_amount'),
			'updated_by'	=> $this->session->userdata('admin_id')
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_by' => $this->session->userdata('admin_id'),
				'created_on' => date("Y-m-d H:i:s")
			); 
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_lateral_entry_fees',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_lateral_entry_fees',$data);
			return 1;
		}
	}
	public function get_lateral_entry_fees(){
		$result = $this->db->get('tbl_lateral_entry_fees');
		return $result->row();
	}
} 