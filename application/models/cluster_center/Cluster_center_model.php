<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Cluster_center_model extends CI_Model { 
	public function login(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('username',$this->input->post('email'));
		$this->db->where('password',($this->input->post('password')));
		$result = $this->db->get('tbl_cluster_center');
		$result = $result->row(); 
		if(!empty($result)){
			$data = array(
				'cluster_center_id' => $result->id
			);
			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
	}
	public function get_profile(){
		$this->db->where('id',$this->session->userdata('cluster_center_id'));
		$result = $this->db->get('tbl_cluster_center');
		return $result->row();
	}
	public function get_all_cluster_centers(){
		$this->db->where('id',$this->session->userdata('cluster_center_id'));
		$result = $this->db->get('tbl_cluster_center');
		$result = $result->row();
		$details = array();
		if(!empty($result)){
			$centers = explode(',',$result->centers);
			for($i=0;$i<count($centers);$i++){
				$this->db->where('id',$centers[$i]);
				$center_details = $this->db->get('tbl_center');
				$center_details = $center_details->row();
				$details[] = $center_details;
			}
		}
		return $details;
	}
	public function get_center_students($center){
		$this->db->select('tbl_student.*,tbl_course.course_name,tbl_stream.stream_name,tbl_session.session_name');
		$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
		$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
		$this->db->join('tbl_session','tbl_session.id = tbl_student.session_id');
		$this->db->where('tbl_student.center_id',$center);
		$this->db->order_by('tbl_student.id','DESC');
		$result = $this->db->get('tbl_student');
		return $result->result();		
	}
} 