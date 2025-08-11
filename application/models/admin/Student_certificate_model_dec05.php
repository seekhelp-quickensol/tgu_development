<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Student_certificate_model extends CI_Model { 
	
	public function get_all_migration_certificate_requests_list($length,$start,$search){
		$this->db->select("tbl_student_migration.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_migration.is_deleted','0');
		$this->db->where('tbl_student_migration.status','0');
		//$this->db->where('tbl_student_migration.payment_status','1');

		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_migration.transaction_id',$search);
			$this->db->or_like('tbl_student_migration.created_on',$search);

			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_migration.student_id");
		$this->db->order_by('tbl_student_migration.id','DESC');
		$this->db->limit($length,$start);

		$result = $this->db->get('tbl_student_migration');
		return $result->result();		
	}

	public function get_all_migration_certificate_requests_list_count($search){
		$this->db->select("tbl_student_migration.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_migration.is_deleted','0');
		$this->db->where('tbl_student_migration.status','0');
		//$this->db->where('tbl_student_migration.payment_status','1');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_migration.transaction_id',$search);
			$this->db->or_like('tbl_student_migration.created_on',$search);
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_migration.student_id");
		$this->db->order_by('tbl_student_migration.id','DESC');
		$result = $this->db->get('tbl_student_migration');
		return $result->num_rows();
	}
	public function get_single_migration(){
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_student_migration');
		return $result->row();
	}
	public function update_migration_issue_date(){
	    $data = array(
	        'approve_status' => '1',
	        "status"=>'1',
	        'issue_date' => date("Y-m-d",strtotime($this->input->post('issue_date'))),
	        );
	    $this->db->where('id',$this->input->post('id'));
	    $this->db->update('tbl_student_migration',$data);
	    return true;
	}

	public function verify_student_migration_requests(){
		$data = array(
			"status"=>'1'
		);

		$this->db->where("id",$this->uri->segment(2));
		$this->db->update("tbl_student_migration",$data);
	}

	public function unverify_student_migration_certificate(){
		$data = array(
			"status"=>'0'
		);

		$this->db->where("id",$this->uri->segment(2));
		$this->db->update("tbl_student_migration",$data);
	}

	public function get_all_migration_certificates_list($length,$start,$search){
		$this->db->select("tbl_student_migration.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_migration.is_deleted','0');
		$this->db->where('tbl_student_migration.status','1');
		$this->db->where('tbl_student_migration.payment_status','1');

		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_migration.transaction_id',$search);
			$this->db->or_like('tbl_student_migration.created_on',$search);

			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_migration.student_id");
		$this->db->order_by('tbl_student_migration.id','DESC');
		$this->db->limit($length,$start);

		$result = $this->db->get('tbl_student_migration');
		return $result->result();		
	}

	public function get_all_migration_certificates_list_count($search){
		$this->db->select("tbl_student_migration.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_migration.is_deleted','0');
		$this->db->where('tbl_student_migration.status','1');
		$this->db->where('tbl_student_migration.payment_status','1');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_migration.transaction_id',$search);
			$this->db->or_like('tbl_student_migration.created_on',$search);
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_migration.student_id");
		$this->db->order_by('tbl_student_migration.id','DESC');
		$result = $this->db->get('tbl_student_migration');
		return $result->num_rows();
	}
    
    
    public function approve_student_transfer_certificate_requests(){
		$data = array(
			"reason_of_transfer"=>$this->input->post("reason_of_transfer"),
			"character_conduct"=>$this->input->post("character_conduct"),
			"status"=>"1",
		);
		$this->db->where("id",$this->input->post("id"));
		$this->db->update("tbl_student_transfer",$data);
	}


	public function get_all_transfer_certificate_requests_list($length,$start,$search){
		$this->db->select("tbl_student_transfer.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_transfer.is_deleted','0');
		$this->db->where('tbl_student_transfer.status','0');
		$this->db->where('tbl_student_transfer.payment_status','1');

		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_transfer.transaction_id',$search);
			$this->db->or_like('tbl_student_transfer.created_on',$search);

			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_transfer.student_id");
		$this->db->order_by('tbl_student_transfer.id','DESC');
		$this->db->limit($length,$start);

		$result = $this->db->get('tbl_student_transfer');
		return $result->result();		
	}

	public function get_all_transfer_certificate_requests_list_count($search){
		$this->db->select("tbl_student_transfer.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_transfer.is_deleted','0');
		$this->db->where('tbl_student_transfer.status','0');
		$this->db->where('tbl_student_transfer.payment_status','1');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_transfer.transaction_id',$search);
			$this->db->or_like('tbl_student_transfer.created_on',$search);
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_transfer.student_id");
		$this->db->order_by('tbl_student_transfer.id','DESC');
		$result = $this->db->get('tbl_student_transfer');
		return $result->num_rows();
	}
	public function get_single_transfer(){
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_student_transfer');
		return $result->row();
	}
	public function update_transfer_issue_date(){
	    $data = array(
	        'approve_status' => '1',
	        "status"=>'1',
	        'issue_date' => date("Y-m-d",strtotime($this->input->post('issue_date'))),
	        );
	    $this->db->where('id',$this->input->post('id'));
	    $this->db->update('tbl_student_transfer',$data);
	    return true;
	}


		public function get_all_appproved_student_transfer_certificate_list($length,$start,$search){
		$this->db->select("tbl_student_transfer.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_transfer.is_deleted','0');
		$this->db->where('tbl_student_transfer.status','1');
		$this->db->where('tbl_student_transfer.payment_status','1');

		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_transfer.transaction_id',$search);
			$this->db->or_like('tbl_student_transfer.created_on',$search);

			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_transfer.student_id");
		$this->db->order_by('tbl_student_transfer.id','DESC');
		$this->db->limit($length,$start);

		$result = $this->db->get('tbl_student_transfer');
		return $result->result();		
	}

	public function get_all_appproved_student_transfer_certificate_list_count($search){
		$this->db->select("tbl_student_transfer.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_transfer.is_deleted','0');
		$this->db->where('tbl_student_transfer.status','1');
		$this->db->where('tbl_student_transfer.payment_status','1');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_transfer.transaction_id',$search);
			$this->db->or_like('tbl_student_transfer.created_on',$search);
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_transfer.student_id");
		$this->db->order_by('tbl_student_transfer.id','DESC');
		$result = $this->db->get('tbl_student_transfer');
		return $result->num_rows();
	}

	public function unapproved_student_transfer_certificate(){
		$this->db->where("id",$this->uri->segment(2));
		$this->db->update("tbl_student_transfer",array("status"=>'0'));
	}
	   
	   
	public function get_all_student_recommendation_letter_requests_list($length,$start,$search){
		$this->db->select("tbl_student_recommendation_letter.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_recommendation_letter.is_deleted','0');
		$this->db->where('tbl_student_recommendation_letter.status','0');
		$this->db->where('tbl_student_recommendation_letter.payment_status','1');

		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_recommendation_letter.transaction_id',$search);
			$this->db->or_like('tbl_student_recommendation_letter.created_on',$search);

			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_recommendation_letter.student_id");
		$this->db->order_by('tbl_student_recommendation_letter.id','DESC');
		$this->db->limit($length,$start);

		$result = $this->db->get('tbl_student_recommendation_letter');
		return $result->result();		
	}

	public function get_all_student_recommendation_letter_requests_list_count($search){
		$this->db->select("tbl_student_recommendation_letter.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_recommendation_letter.is_deleted','0');
		$this->db->where('tbl_student_recommendation_letter.status','0');
		$this->db->where('tbl_student_recommendation_letter.payment_status','1');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_recommendation_letter.transaction_id',$search);
			$this->db->or_like('tbl_student_recommendation_letter.created_on',$search);
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_recommendation_letter.student_id");
		$this->db->order_by('tbl_student_recommendation_letter.id','DESC');
		$result = $this->db->get('tbl_student_recommendation_letter');
		return $result->num_rows();
	}

	public function approve_student_recommendation_letter(){
		$data = array(
			"status"=>"1"
		);
		$this->db->where("id",$this->uri->segment(2));
		$this->db->update("tbl_student_recommendation_letter",$data);
	}

	public function unapproved_student_recommendation_letter(){
		$data = array(
			"status"=>"0"
		);
		$this->db->where("id",$this->uri->segment(2));
		$this->db->update("tbl_student_recommendation_letter",$data);
	}

	public function get_all_approved_student_recommendation_letter_list($length,$start,$search){
		$this->db->select("tbl_student_recommendation_letter.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_recommendation_letter.is_deleted','0');
		$this->db->where('tbl_student_recommendation_letter.status','1');
		$this->db->where('tbl_student_recommendation_letter.payment_status','1');

		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_recommendation_letter.transaction_id',$search);
			$this->db->or_like('tbl_student_recommendation_letter.created_on',$search);

			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_recommendation_letter.student_id");
		$this->db->order_by('tbl_student_recommendation_letter.id','DESC');
		$this->db->limit($length,$start);

		$result = $this->db->get('tbl_student_recommendation_letter');
		return $result->result();		
	}

	public function get_all_approved_student_recommendation_letter_list_count($search){
		$this->db->select("tbl_student_recommendation_letter.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_recommendation_letter.is_deleted','0');
		$this->db->where('tbl_student_recommendation_letter.status','1');
		$this->db->where('tbl_student_recommendation_letter.payment_status','1');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_recommendation_letter.transaction_id',$search);
			$this->db->or_like('tbl_student_recommendation_letter.created_on',$search);
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_recommendation_letter.student_id");
		$this->db->order_by('tbl_student_recommendation_letter.id','DESC');
		$result = $this->db->get('tbl_student_recommendation_letter');
		return $result->num_rows();
	}
	
	
		public function get_all_student_degree_requests_list($length,$start,$search){
		$this->db->select("tbl_student_degree.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_degree.is_deleted','0');
		$this->db->where('tbl_student_degree.status','0');
		$this->db->where('tbl_student_degree.payment_status','1');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_degree.transaction_id',$search);
			$this->db->or_like('tbl_student_degree.created_on',$search);

			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_degree.student_id");
		$this->db->order_by('tbl_student_degree.id','DESC');
		$this->db->limit($length,$start);

		$result = $this->db->get('tbl_student_degree');
		return $result->result();		
	}

	public function get_all_student_degree_requests_list_count($search){
		$this->db->select("tbl_student_degree.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_degree.is_deleted','0');
		$this->db->where('tbl_student_degree.status','0');
		$this->db->where('tbl_student_degree.payment_status','1');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_degree.transaction_id',$search);
			$this->db->or_like('tbl_student_degree.created_on',$search);
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_degree.student_id");
		$this->db->order_by('tbl_student_degree.id','DESC');
		$result = $this->db->get('tbl_student_degree');
		return $result->num_rows();
	}

	// public function approved_student_degree_request(){
	// 	$data = array(
	// 		"status"=>"1"
	// 	);
	// 	$this->db->where("id",$this->uri->segment(2));
	// 	$this->db->update("tbl_student_degree",$data);
	// }
	public function update_degree_issue_date(){
	    $data = array(
	        'approve_status' => '1',
	        "status"=>'1',
	        'issue_date' => date("Y-m-d",strtotime($this->input->post('issue_date'))),
	        );

	    $this->db->where('id',$this->input->post('id'));
	    $this->db->update('tbl_student_degree',$data);
	    return true;
	}
	public function get_single_degree(){
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_student_degree');
		return $result->row();
	}


	public function unapproved_student_degree(){
		$data = array(
			"status"=>"0"
		);
		$this->db->where("id",$this->uri->segment(2));
		$this->db->update("tbl_student_degree",$data);
	}


		public function get_all_approved_student_degree_list($length,$start,$search){
		$this->db->select("tbl_student_degree.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_degree.is_deleted','0');
		$this->db->where('tbl_student_degree.status','1');
		$this->db->where('tbl_student_degree.payment_status','1');

		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_degree.transaction_id',$search);
			$this->db->or_like('tbl_student_degree.created_on',$search);

			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_degree.student_id");
		$this->db->order_by('tbl_student_degree.id','DESC');
		$this->db->limit($length,$start);

		$result = $this->db->get('tbl_student_degree');
		return $result->result();		
	}

	public function get_all_approved_student_degree_list_count($search){
		$this->db->select("tbl_student_degree.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_degree.is_deleted','0');
		$this->db->where('tbl_student_degree.status','1');
		$this->db->where('tbl_student_degree.payment_status','1');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_degree.transaction_id',$search);
			$this->db->or_like('tbl_student_degree.created_on',$search);
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_degree.student_id");
		$this->db->order_by('tbl_student_degree.id','DESC');
		$result = $this->db->get('tbl_student_degree');
		return $result->num_rows();
	}
	
	public function get_all_student_provisional_degree_requests_list($length,$start,$search){
		$this->db->select("tbl_student_provisional_degree.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_provisional_degree.is_deleted','0');
		$this->db->where('tbl_student_provisional_degree.status','0');
		//$this->db->where('tbl_student_provisional_degree.payment_status','1');

		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_provisional_degree.transaction_id',$search);
			$this->db->or_like('tbl_student_provisional_degree.created_on',$search);

			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_provisional_degree.student_id");
		$this->db->order_by('tbl_student_provisional_degree.id','DESC');
		$this->db->limit($length,$start);

		$result = $this->db->get('tbl_student_provisional_degree');
		return $result->result();		
	}

	public function get_all_student_provisional_degree_requests_list_count($search){
		$this->db->select("tbl_student_provisional_degree.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_provisional_degree.is_deleted','0');
		$this->db->where('tbl_student_provisional_degree.status','0');
		//$this->db->where('tbl_student_provisional_degree.payment_status','1');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_provisional_degree.transaction_id',$search);
			$this->db->or_like('tbl_student_provisional_degree.created_on',$search);
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_provisional_degree.student_id");
		$this->db->order_by('tbl_student_provisional_degree.id','DESC');
		$result = $this->db->get('tbl_student_provisional_degree');
		return $result->num_rows();
	}
	public function update_provisional_degree_issue_date(){
	    $data = array(
	        'approve_status' => '1',
	        "status"=>'1',
	        'issue_date' => date("Y-m-d",strtotime($this->input->post('issue_date'))),
	        );
	    
	    $this->db->where('id',$this->input->post('id'));
	    $this->db->update('tbl_student_provisional_degree',$data);
	    return true;
	}
	public function get_single_provisional_degree(){
		$this->db->where('id',$this->uri->segment(2));
		$result = $this->db->get('tbl_student_provisional_degree');
		return $result->row();
	}
	

	public function get_all_approved_student_provisional_degrees_list($length,$start,$search){
		$this->db->select("tbl_student_provisional_degree.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_provisional_degree.is_deleted','0');
		$this->db->where('tbl_student_provisional_degree.status','1');
		$this->db->where('tbl_student_provisional_degree.payment_status','1');

		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_provisional_degree.transaction_id',$search);
			$this->db->or_like('tbl_student_provisional_degree.created_on',$search);

			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_provisional_degree.student_id");
		$this->db->order_by('tbl_student_provisional_degree.id','DESC');
		$this->db->limit($length,$start);

		$result = $this->db->get('tbl_student_provisional_degree');
		return $result->result();		
	}

	public function get_all_approved_student_provisional_degrees_list_count($search){
		$this->db->select("tbl_student_provisional_degree.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_student_provisional_degree.is_deleted','0');
		$this->db->where('tbl_student_provisional_degree.status','1');
		$this->db->where('tbl_student_provisional_degree.payment_status','1');
		
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search);
			$this->db->or_like('tbl_student_provisional_degree.transaction_id',$search);
			$this->db->or_like('tbl_student_provisional_degree.created_on',$search);
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_student_provisional_degree.student_id");
		$this->db->order_by('tbl_student_provisional_degree.id','DESC');
		$result = $this->db->get('tbl_student_provisional_degree');
		return $result->num_rows();
	}
	
	
	public function get_student_transcript_certificate_failed($length,$start,$search){
		$this->db->select("tbl_transcript.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_transcript.is_deleted','0');
		$this->db->where('tbl_transcript.status','1');
		$this->db->where('tbl_transcript.payment_status','0');  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_transcript.created_on',$search); 
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_transcript.registration_id");
		$this->db->order_by('tbl_transcript.id','DESC');
		$this->db->limit($length,$start); 
		$result = $this->db->get('tbl_transcript');
		return $result->result();		
	}

	public function get_student_transcript_certificate_failed_count($search){
		$this->db->select("tbl_transcript.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_transcript.is_deleted','0');
		$this->db->where('tbl_transcript.status','1');
		$this->db->where('tbl_transcript.payment_status','0');  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_transcript.created_on',$search); 
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_transcript.registration_id");
		$this->db->order_by('tbl_transcript.id','DESC'); 
		$result = $this->db->get('tbl_transcript');
		return $result->num_rows();
	}
	public function get_student_transcript_certificate_success($length,$start,$search){
		$this->db->select("tbl_transcript.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_transcript.is_deleted','0');
		$this->db->where('tbl_transcript.status','1');
		$this->db->where('tbl_transcript.payment_status','1');
		$this->db->where('tbl_transcript.approve_status','0');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_transcript.created_on',$search); 
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_transcript.registration_id");
		$this->db->order_by('tbl_transcript.id','DESC');
		$this->db->limit($length,$start); 
		$result = $this->db->get('tbl_transcript');
		return $result->result();		
	}
	public function get_student_transcript_certificate_success_count($search){
		$this->db->select("tbl_transcript.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_transcript.is_deleted','0');
		$this->db->where('tbl_transcript.status','1');
		$this->db->where('tbl_transcript.payment_status','1');
		$this->db->where('tbl_transcript.approve_status','0');  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_transcript.created_on',$search); 
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_transcript.registration_id");
		$this->db->order_by('tbl_transcript.id','DESC'); 
		$result = $this->db->get('tbl_transcript');
		return $result->num_rows();
	}
	public function get_student_transcript_certificate_approved($length,$start,$search){
		$this->db->select("tbl_transcript.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_transcript.is_deleted','0');
		$this->db->where('tbl_transcript.status','1');
		$this->db->where('tbl_transcript.payment_status','1');
		$this->db->where('tbl_transcript.approve_status','1');
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_transcript.created_on',$search); 
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_transcript.registration_id");
		$this->db->order_by('tbl_transcript.id','DESC');
		$this->db->limit($length,$start); 
		$result = $this->db->get('tbl_transcript');
		return $result->result();		
	}
	public function get_student_transcript_certificate_approved_count($search){
		$this->db->select("tbl_transcript.*,tbl_student.student_name,tbl_student.enrollment_number");
		$this->db->where('tbl_transcript.is_deleted','0');
		$this->db->where('tbl_transcript.status','1');
		$this->db->where('tbl_transcript.payment_status','1');
		$this->db->where('tbl_transcript.approve_status','1');  
		if($search !=""){
			$this->db->group_start();
			$this->db->or_like('tbl_student.student_name',$search);
			$this->db->or_like('tbl_student.enrollment_number',$search); 
			$this->db->or_like('tbl_transcript.created_on',$search); 
			$this->db->group_end();
		}
		$this->db->join("tbl_student","tbl_student.id = tbl_transcript.registration_id");
		$this->db->order_by('tbl_transcript.id','DESC'); 
		$result = $this->db->get('tbl_transcript');
		return $result->num_rows();
	}
	public function approve_transcript(){
	    $data = array(
	        'approve_status' => '1',
	        'issue_date' => date("Y-m-d",strtotime($this->input->post('issue_date'))),
	        );
	    $this->db->where('id',$this->input->post('id'));
	    $this->db->update('tbl_transcript',$data);
	    return true;
	}
	public function disapprove_transcript(){
	    $data = array(
	        'approve_status' => '0'
	        );
	    $this->db->where('id',$this->uri->segment(2));
	    $this->db->update('tbl_transcript',$data);
	    return true;
	}
	public function get_single_transcript(){
	    $this->db->select("tbl_transcript.*,tbl_student.student_name,tbl_student.enrollment_number,tbl_course.print_name,tbl_stream.stream_name");
		$this->db->where('tbl_transcript.is_deleted','0');
		$this->db->where('tbl_transcript.status','1');
		$this->db->where('tbl_transcript.id',$this->uri->segment(2));  
		$this->db->join("tbl_student","tbl_student.id = tbl_transcript.registration_id");
		$this->db->join("tbl_course","tbl_course.id = tbl_student.course_id");
		$this->db->join("tbl_stream","tbl_stream.id = tbl_student.stream_id");
		$result = $this->db->get('tbl_transcript');
		return $result->row();
	}
	public function get_single_transcript_details(){ 
		$this->db->where('is_deleted','0');
		$this->db->where('status','1');
		$this->db->where('transcript_id',$this->uri->segment(2));    
		$result = $this->db->get('tbl_transcript_details');
		return $result->result();
	}
	public function update_transcript(){
	    $data = array( 
                'course_duration'   => $this->input->post('duration_of_course'),
                'year_of_passing'   => $this->input->post('year_of_passing'), 
                'issue_date'   		=> date("Y-m-d",strtotime($this->input->post('issue_date'))), 
            );
            $this->db->where('id',$this->input->post('id'));
            $this->db->update('tbl_transcript',$data);
            
            $this->db->where('transcript_id',$this->input->post('id'));
            $this->db->delete('tbl_transcript_details');
            
            $sem = $this->input->post('sem');
            $subject = $this->input->post('subject');
            $type = $this->input->post('type');
            $max_mark = $this->input->post('max_mark');
            $obtained = $this->input->post('obtained');
            $detail_arr = array();
            for($i=0;$i<count($sem);$i++){
                $detail_arr[] = array(
                        'transcript_id' => $this->input->post('id'),
                        'sem'           => $sem[$i],
                        'subject'       => $subject[$i],
                        'type'          => $type[$i],
                        'max_mark'      => $max_mark[$i],
                        'obtained'      => $obtained[$i],
                        'created_on'    => date("Y-m-d H:i:s")
                    );    
            }
            if(!empty($detail_arr)){
                $this->db->insert_batch('tbl_transcript_details',$detail_arr);
            }
            return true;
	}
	public function update_transcript_payment(){
	    $data = array( 
            'transaction_id'   => $this->input->post('transaction_id'),
            'payment_date'   =>  date("Y-m-d",strtotime($this->input->post('payment_date'))), 
            'payment_mode'   => $this->input->post('payment_mode'), 
            'bank_id'   => $this->input->post('bank'), 
            'amount'   => $this->input->post('amount'),
            'payment_status'   => $this->input->post('payment_status'),
        );
        $this->db->where('id',$this->input->post('id'));
        $this->db->update('tbl_transcript',$data);
        return true;
	}
	public function get_student_details(){
		$this->db->where('enrollment_number',$this->input->post('enrollment_number'));
		$result = $this->db->get('tbl_student');
		echo json_encode($result->row()); 
	}
	public function set_migration_application(){ 
		$data = array(
			'student_id' 		=> $this->input->post('student_id'),
			'transaction_id' 	=> $this->input->post('transaction_id'),
			'amount' 			=> $this->input->post('amount'),
			'issue_date' 		=> date("Y-m-d",strtotime($this->input->post('issue_date'))),
			'payment_status' 	=> $this->input->post('payment_status'),
			'approve_status' 	=> $this->input->post('approve_status'),
			'status' 			=> $this->input->post('status'),
			'created_on'		=> date("Y-m-d H:i:s")
		);
		if($this->input->post('id') == ""){
			$this->db->insert('tbl_student_migration',$data);
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_student_migration',$data);
		}
		return true;
	}
	public function get_single_migration_student(){
		$this->db->select('tbl_student_migration.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_student.father_name');
		$this->db->where('tbl_student_migration.id',$this->uri->segment(2));
		$this->db->join('tbl_student','tbl_student.id = tbl_student_migration.student_id');
		$result = $this->db->get('tbl_student_migration');
		return $result->row();
	}
	public function apply_student_provisional_degrees(){ 
		$data = array(
			'student_id' 		=> $this->input->post('student_id'),
			'transaction_id' 	=> $this->input->post('transaction_id'),
			'amount' 			=> $this->input->post('amount'),
			'issue_date' 		=> date("Y-m-d",strtotime($this->input->post('issue_date'))),
			'payment_status' 	=> $this->input->post('payment_status'),
			'approve_status' 	=> $this->input->post('approve_status'),
			'status' 			=> $this->input->post('status'),
			'created_on'		=> date("Y-m-d H:i:s")
		);
		if($this->input->post('id') == ""){
			$this->db->insert('tbl_student_provisional_degree',$data);
		}else{
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_student_provisional_degree',$data);
		}
		return true;
	}
	public function get_single_provisional_student(){
		$this->db->select('tbl_student_provisional_degree.*,tbl_student.enrollment_number,tbl_student.student_name,tbl_student.father_name');
		$this->db->where('tbl_student_provisional_degree.id',$this->uri->segment(2));
		$this->db->join('tbl_student','tbl_student.id = tbl_student_provisional_degree.student_id');
		$result = $this->db->get('tbl_student_provisional_degree');
		return $result->row();
	}
}  