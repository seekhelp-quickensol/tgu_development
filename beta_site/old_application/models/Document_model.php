<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Document_model extends CI_Model { 
	public function set_head_name(){
		$data = array(
			'head_name' => $this->input->post('head_name')
		);
		if($this->input->post('id')==""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_document_head',$new_arr);

			$head_id = $this->db->insert_id();
			// echo "<pre>";print_r($head_id);exit;
			$this->db->where('user_id',$this->session->userdata('admin_id'));
			$result = $this->db->get('tbl_user_documentation_privilege');
			$result = $result->row();
			if(empty($result)){	
				$data = array(
					'user_id' 		=> $this->session->userdata('admin_id'),
					'privilege' 	=> $head_id,
					'created_on' 	=> date("Y-m-d H:i:s"),
				);
				$this->db->insert('tbl_user_documentation_privilege',$data);
			}else{
				$str = $result->privilege;
				$new_str = $str.','.$head_id;
				$data = array(
					'user_id' 		=> $this->session->userdata('admin_id'),
					'privilege' 	=> $new_str,
				);
				$this->db->where('user_id',$this->session->userdata('admin_id'));
				$this->db->update('tbl_user_documentation_privilege',$data);
			}
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_document_head',$data);
			return 1;
		}
	}
	public function get_single_head(){
		$this->db->where('id',$this->uri->segment(2));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_document_head');
		return $result->row();
	}
	public function get_unique_head_name(){
		$this->db->where('head_name',$this->input->post('head_name'));
		$this->db->where('id !=',$this->input->post('id'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_document_head');
		echo $result->num_rows();
	}
	public function get_unique_sub_head_name(){
		// echo "<pre>";print_r($this->input->post('name'));exit;
		$this->db->where('head_id',$this->input->post('head_id'));  //
		$this->db->where('name',$this->input->post('name'));
		$this->db->where('id !=',$this->input->post('id'));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_sub_head');
		echo $result->num_rows();
	}
	public function get_all_head_name(){
		$this->db->where('is_deleted','0');
		$this->db->order_by('head_name','ASC');
		//$this->db->limit($length,$start);
		$result = $this->db->get('tbl_document_head');
		return $result->result();		
	}
	public function get_all_head_name_ajax($length,$start,$search,$array){
		$this->db->where('is_deleted','0');
		$this->db->where_in('id', $array);
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('head_name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('id','DESC');
		$this->db->limit($length,$start);
		$result = $this->db->get('tbl_document_head');
		return $result->result();		
	}
	public function get_all_head_name_count($search,$array){
		$this->db->where('is_deleted','0');
		$this->db->where_in('id',$array);
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('head_name',$search);
			$this->db->group_end();
		}
		$result = $this->db->get('tbl_document_head');
		return $result->num_rows();
	}
	public function get_active_head(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$result = $this->db->get('tbl_document_head');
		return $result->result();
	}
	public function set_documents($document){
		if($document == ""){
			$document = $this->input->post('old_document');
		}
		$data = array(
			'head_id' => $this->input->post('head_name'),
			'sub_head_id' => $this->input->post('sub_head_name'),
			'document' => $document,
		);
		if($this->input->post('id') == ""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_document',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_document',$data);
			return 1;
		}
	}
	public function get_all_document_ajax($length,$start,$search,$array){
		$this->db->select('tbl_sub_head.name,tbl_document_head.head_name,tbl_document.*');
		$this->db->where('tbl_document.is_deleted','0');
		$this->db->where_in('tbl_document.head_id',$array);
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_document_head.head_name',$search);
			$this->db->or_like('tbl_sub_head.name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_document_head.id','DESC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_document_head','tbl_document_head.id = tbl_document.head_id');
		$this->db->join('tbl_sub_head','tbl_sub_head.id = tbl_document.sub_head_id');
		$result = $this->db->get('tbl_document');
		return $result->result();		
	}
	public function get_all_document_count($search,$array){
		$this->db->select('tbl_sub_head.name,tbl_document_head.head_name,tbl_document.*');
		$this->db->where('tbl_document.is_deleted','0');
		$this->db->where_in('tbl_document.head_id',$array);
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_document_head.head_name',$search);
			$this->db->or_like('tbl_sub_head.name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_document_head','tbl_document_head.id = tbl_document.head_id');
		$this->db->join('tbl_sub_head','tbl_sub_head.id = tbl_document.sub_head_id');
		$result = $this->db->get('tbl_document');
		return $result->num_rows();
	}
	public function get_single_document(){
		$this->db->where('is_deleted','0');
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_document');
		return $result->row();
	}
	public function set_sub_head_name(){
		$data = array(
			'head_id' => $this->input->post('head_name'),
			'name' => $this->input->post('name'),
		);
		if($this->input->post('id')==""){
			$date = array(
				'created_on' => date("Y-m-d H:i:s")
			);
			$new_arr = array_merge($data,$date);
			$this->db->insert('tbl_sub_head',$new_arr);
			return 0;
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_sub_head',$data);
			return 1;
		}
	}
	public function get_single_sub_head(){
		$this->db->where('id',$this->uri->segment(2));
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_sub_head');
		return $result->row();
	}
	public function get_active_sub_head($head){
		$this->db->where('head_id',$head);
		$this->db->where('is_deleted','0');
		$result = $this->db->get('tbl_sub_head');
		return $result->result();
	}
	public function get_all_sub_head_name_ajax($length,$start,$search,$array){
		$this->db->select('tbl_document_head.head_name,tbl_sub_head.*');
		$this->db->where('tbl_sub_head.is_deleted','0');
		$this->db->where_in('tbl_sub_head.head_id',$array);
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_document_head.head_name',$search);
			$this->db->or_like('tbl_sub_head.name',$search);
			$this->db->group_end();
		}
		$this->db->order_by('tbl_document_head.id','DESC');
		$this->db->limit($length,$start);
		$this->db->join('tbl_document_head','tbl_document_head.id = tbl_sub_head.head_id');
		$result = $this->db->get('tbl_sub_head');
		return $result->result();		
	}
	public function get_all_sub_head_name_ajax_count($search,$array){
		$this->db->select('tbl_document_head.head_name,tbl_sub_head.*');
		$this->db->where('tbl_sub_head.is_deleted','0');
		$this->db->where_in('tbl_sub_head.head_id',$array);
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_document_head.head_name',$search);
			$this->db->or_like('tbl_sub_head.name',$search);
			$this->db->group_end();
		}
		$this->db->join('tbl_document_head','tbl_document_head.id = tbl_sub_head.head_id');
		$result = $this->db->get('tbl_sub_head');
		return $result->num_rows();
	}
	public function get_all_sub_head_ajax(){
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('head_id',$this->input->post('head_id'));
		$result = $this->db->get('tbl_sub_head');
		echo json_encode($result->result());
		
	}

	public function get_user_document_previledges(){
		$this->db->where('user_id',$this->session->userdata('admin_id'));
		$result = $this->db->get('tbl_user_documentation_privilege');
		$result = $result->row();
		return $result;
	}
} 