<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Ajax_controller extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->activate = '<span class="btn btn-success btn-sm" title="Activated" data-toggle="tooltip"><i class="fa fa-check-circle"></i></span>';
		$this->deactivate = '<span class="btn btn-danger btn-sm" title="Deactivated" data-toggle="tooltip"><i class="fa fa-times-circle"></i></span>';
	}
	public function get_old_paasword(){
		$this->Admin_model->get_old_paasword();
	}
	public function get_state_ajax(){
		$this->Admin_model->get_state_ajax($this->input->post('country'));
	}
	public function get_state_ajax_by_country_code(){
		$this->Admin_model->get_state_ajax_by_country_code($this->input->post('country'));
	}
	public function get_city_ajax(){
		$this->Admin_model->get_city_ajax($this->input->post('state'));
	}
	public function get_my_unique_email(){
		$this->Admin_model->get_my_unique_email();
	}
	public function get_my_unique_contact_number(){
		$this->Admin_model->get_my_unique_contact_number();
	}
	public function get_unique_designation(){
		$this->Setting_model->get_unique_designation();
	}
	public function get_all_designation_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$document = $this->Setting_model->get_all_designation($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->designation;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_designation class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_designation class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_case_type/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_designation class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_designation class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_case_type/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Setting_model->get_all_designation_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_emp_unique_contact_number(){
		$this->Setting_model->get_emp_unique_contact_number();
	}
	public function get_emp_unique_email(){
		$this->Setting_model->get_emp_unique_email();
	}
	public function get_all_employee_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_employees');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Setting_model->get_all_employees_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->designation;
				$sub_array[] = $print->name_prefix." ".$print->first_name." ".$print->last_name;
				$sub_array[] = $print->email;
				$sub_array[] = $print->contact_number;
				$sub_array[] = $print->alternate_number;
				$sub_array[] = date("d-m-Y",strtotime($print->join_date));
				$sub_array[] = $print->address;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->country_name;

				if(!empty($print->profile_pic)){
					$sub_array[] = "<img src=".base_url("images/employee/".$print->profile_pic).">";
				}else{
					$sub_array[] = "<img src=".base_url("images/employee/no-profile-image.png").">";
				}

				$sub_array[] = $print->pincode;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_employees class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_employee_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>

									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_employee/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "employee_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-logout'></i></a>
									
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_employee_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_employee/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "employee_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-logout'></i></a>
									
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Setting_model->get_all_employee_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_course(){
		$this->Course_model->get_unique_course();
	}
	public function get_all_course_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_course');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Course_model->get_all_course_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->print_name;
				$sub_array[] = $print->sort_name;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_course class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_course/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_course class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_course/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Course_model->get_all_course_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_stream(){
		$this->Course_model->get_unique_stream();
	}
	public function get_all_stream_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_stream');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Course_model->get_all_stream_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->stream_name;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_stream class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_stream class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_stream/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_stream class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_stream class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_stream/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Course_model->get_all_stream_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_faculty(){
		$this->Course_model->get_unique_faculty();
	}
	public function get_all_faculty_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_faculty');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Course_model->get_all_faculty_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->faculty_code;
				$sub_array[] = $print->faculty_name;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_faculty class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_faculty/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_faculty/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Course_model->get_all_faculty_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_session(){
		$this->Course_model->get_unique_session();
	}
	public function get_all_session_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_session');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Course_model->get_all_session_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->session_name;
				$sub_array[] = date("Y-m-d",strtotime($print->session_start_date));
				$sub_array[] = date("Y-m-d",strtotime($print->session_end_date));
				$sub_array[] = date("Y-m-d",strtotime($print->late_fees_date));
				$sub_array[] = $print->late_fees;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_session class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_session class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_session/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_session class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_session class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_session/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				if($print->status_for_center == '1'){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "center_inactive/" . $print->id . "/tbl_session class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "center_active/" . $print->id . "/tbl_session class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Course_model->get_all_session_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_course_type(){
		$this->Course_model->get_unique_course_type();
	}
	public function get_all_course_type_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_course_type');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Course_model->get_all_course_type_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->course_type;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_course_type class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_type class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_course_type/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_course_type class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_type class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_course_type/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Course_model->get_all_course_type_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_course_stream_relation(){
		$this->Course_model->get_unique_course_stream_relation();
	}
	public function get_all_course_stream_relation_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_course_stream_relation');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Course_model->get_all_course_stream_relation_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->course_code;
				$sub_array[] = $print->faculty_name;
				$sub_array[] = $print->course_type_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if($print->course_mode == "1"){
					$sub_array[] = "Year";
				}
				if($print->course_mode == "2"){
					$sub_array[] = "Semester";
				}
				if($print->course_mode == "3"){
					$sub_array[] = "Both";
				}
				if($print->course_mode == "4"){
					$sub_array[] = "Month";
				}
				if($print->course_mode == "1"){
					$sub_array[] = $print->year_duration." Year";
				}
				if($print->course_mode == "2"){
					$sub_array[] = $print->sem_duration." Semester";
				}
				if($print->course_mode == "3"){
					$sub_array[] = $print->year_duration."/".$print->sem_duration;
				}
				if($print->course_mode == "4"){
					$sub_array[] = $print->month_duration." Month";
				}
				
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_course_stream_relation class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_stream_relation class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "course_stream_relation/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_course_stream_relation class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_stream_relation class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "course_stream_relation/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Course_model->get_all_course_stream_relation_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_course_stream_ajax(){
		$this->Course_model->get_course_stream_ajax();
	}
	public function get_course_stream_mode(){
		$this->Course_model->get_course_stream_mode();
	}
	public function get_unique_course_stream_fees(){
		$this->Course_model->get_unique_course_stream_fees();
	}
	public function get_all_course_stream_fees_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_fees_realtion');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Course_model->get_all_course_stream_fees_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->session_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->fees;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_fees_realtion class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_fees_realtion class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_fees/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_fees_realtion class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_fees_realtion class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_fees/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Course_model->get_all_course_stream_fees_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_center_unique_email(){
		$this->Center_model->get_center_unique_email();
	}
	public function get_center_unique_contact_number(){
		$this->Center_model->get_center_unique_contact_number();
	}
	public function get_all_center_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_center');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Center_model->get_all_center_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->head_name;
				$sub_array[] = $print->head_email;
				$sub_array[] = $print->head_contact_number;
				$sub_array[] = $print->contact_person_name;
				$sub_array[] = $print->contact_person_contact;
				$sub_array[] = $print->contact_person_email;
				$sub_array[] = date("d-m-Y",strtotime($print->start_date));
				$sub_array[] = date("d-m-Y",strtotime($print->end_date));
				$sub_array[] = $print->address;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->country_name;
				$sub_array[] = $print->pincode;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_center class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_center class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_center/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='MOU' data-toggle='tooltip' href=" . base_url() . "center_mou/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-file-check'></i></a>
									<a type='button' title='Payment Details' data-toggle='tooltip' href=" . base_url() . "center_finance/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-credit-card'></i></a>
									<a type='button' title='Reset Password' data-toggle='tooltip' href=" . base_url() . "center_reset_password/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-settings'></i></a>
									<a type='button' title='Assign Courses' data-toggle='tooltip' href=" . base_url() . "assign_course/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-file-check'></i></a>
									<a type='button' title='Send Login Details' data-toggle='tooltip' href=" . base_url() . "center_send_login/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-settings'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_center class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_center class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_center/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='MOU' data-toggle='tooltip' href=" . base_url() . "center_mou/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-file-check'></i></a>
									<a type='button' title='Payment Details' data-toggle='tooltip' href=" . base_url() . "center_finance/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-credit-card'></i></a>
									<a type='button' title='Reset Password' data-toggle='tooltip' href=" . base_url() . "center_reset_password/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-settings'></i></a>
									<a type='button' title='Assign Courses' data-toggle='tooltip' href=" . base_url() . "assign_course/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-file-check'></i></a>
									<a type='button' title='Send Login Details' data-toggle='tooltip' href=" . base_url() . "center_send_login/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-settings'></i></a>
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Center_model->get_all_center_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_pending_center_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_center');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Center_model->get_all_pending_center_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->head_name;
				$sub_array[] = $print->head_email;
				$sub_array[] = $print->head_contact_number;
				$sub_array[] = $print->contact_person_name;
				$sub_array[] = $print->contact_person_contact;
				$sub_array[] = $print->contact_person_email;
				$sub_array[] = date("d-m-Y",strtotime($print->start_date));
				$sub_array[] = date("d-m-Y",strtotime($print->end_date));
				$sub_array[] = $print->address;
				$sub_array[] = $print->city;
				$sub_array[] = $print->state;
				$sub_array[] = $print->country;
				$sub_array[] = $print->pincode;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_center class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_center class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_center/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='MOU' data-toggle='tooltip' href=" . base_url() . "center_mou/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-file-check'></i></a>
									<a type='button' title='Payment Details' data-toggle='tooltip' href=" . base_url() . "center_finance/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-credit-card'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_center class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_center class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_center/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='MOU' data-toggle='tooltip' href=" . base_url() . "center_mou/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-file-check'></i></a>
									<a type='button' title='Payment Details' data-toggle='tooltip' href=" . base_url() . "center_finance/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-credit-card'></i></a>
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Center_model->get_all_pending_center_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_center_mou_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_center_mous');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Center_model->get_all_center_mou_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = date("d-m-Y",strtotime($print->added_date));
				$sub_array[] = "<a target='_blank' href='" . base_url() . "images/center/mou/" . $print->mou . "'><i class='mdi mdi-eye'></i></a>";
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_center_mous class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_center_mous class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_center_mous class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_center_mous class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Center_model->get_all_center_mou_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_center_payment_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_center_payment');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Center_model->get_all_center_payment_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = date("d-m-Y",strtotime($print->payment_date));
				if($print->payment_mode == "1"){
					$sub_array[] = "Online";
				}else if($print->payment_mode == "2"){
					$sub_array[] = "Cash";
				}else if($print->payment_mode == "3"){
					$sub_array[] = "Cheque";
				}else if($print->payment_mode == "4"){
					$sub_array[] = "DD";
				}
				$sub_array[] = $print->transaction_no;
				$sub_array[] = $print->amount;
				
				if($print->payment_status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_center_payment class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_center_payment class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "center_finance/".$print->center_id."/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_center_payment class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_center_payment class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "center_finance/".$print->center_id."/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Center_model->get_all_center_payment_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_head_name_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_document_head');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Document_model->get_all_head_name_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->head_name;
				
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_document_head class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_document_head class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_head/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_document_head class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_document_head class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_head/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Document_model->get_all_head_name_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_head_name(){
		$this->Document_model->get_unique_head_name();
	}
	
	public function get_all_document_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_document');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Document_model->get_all_document_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->head_name;
				$sub_array[] = "<a type='button' target='_blank' title='View' data-toggle='tooltip' href=" . base_url() . "uploads/".$print->document."  class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_document_head class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_document_head class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_head/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_document_head class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_document_head class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_head/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Document_model->get_all_document_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function get_all_id_name_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_id_management');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Setting_model->get_all_id_name_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->id_name;
				
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_id_management class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_id_management class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "id_management/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_id_management class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_id_management class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "id_management/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Setting_model->get_all_id_name_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_id_name(){
		$this->Setting_model->get_unique_id_name();
	}
	public function get_all_bank_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_bank');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Setting_model->get_all_bank_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->account_holder;
				$sub_array[] = $print->account_number;
				$sub_array[] = $print->bank_name;
				$sub_array[] = $print->branch;
				$sub_array[] = $print->ifsc;
				if($print->show_for_challan == "1"){
					$sub_array[] = "Yes";
				}else{
					$sub_array[] = "No";
				}
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_bank class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_bank class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "bank_management/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_bank class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_bank class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "bank_management/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Setting_model->get_all_bank_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_bank(){
		$this->Setting_model->get_unique_bank();
	}
	public function get_all_new_admission_pending(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_student');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Student_model->get_all_new_admission_pending_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->id;
				$sub_array[] = date("d/m/Y",strtotime($print->created_on));
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->employement_type;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->session_name;
				$sub_array[] = $print->faculty_name;
				$sub_array[] = $print->course_type_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if($print->course_mode == "1"){
					$sub_array[] = "Year";
					$mode = "Year";
				}else if($print->course_mode == "2"){
					$sub_array[] = "Semester";
					$mode = "Semester";
				}else if($print->course_mode == "4"){
					$sub_array[] = "Month";
					$mode = "Month";
				}
				if($print->admission_type == "0"){
					$sub_array[] = "Regular Entry";
				}else if($print->admission_type == "1"){
					$sub_array[] = "Lateral Entry";
				}else{
					$sub_array[] = "Credit Transfer";
				}

				if($print->study_mode == "1"){
					$sub_array[] = "Regular";
				}else if($print->study_mode == "2"){
					$sub_array[] = "Online";
				}else{
					$sub_array[] = "Part-Time";
				}

				$sub_array[] = $print->year_sem." ".$mode;
				
				$sub_array[] = "<a data-toggle='tooltip' title='Enrolled Now' href=" . base_url() . "enrolled_new_student/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>
				<a data-toggle='tooltip' title='View Qualifications' href=" . base_url() . "student_qualification/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
				<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a type='button' title='Accounts' data-toggle='tooltip' href=" . base_url() . "manage_student_account/".$print->id."  class='btn btn-success btn-sm'><i class='mdi-credit-card'></i></a>
				<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_student class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				";
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_all_new_admission_pending_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_transaction(){
		$this->Student_model->get_unique_transaction();
	}
	
	public function get_all_admission_list(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_student');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Student_model->get_all_admission_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->id;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = date("d-m-Y",strtotime($print->enrollment_date));
				if($print->admission_status == "1"){
					$sub_array[] = "Active";
				}else if($print->admission_status == "2"){
					$sub_array[] = "Cancel";
				}else if($print->admission_status == "3"){
					$sub_array[] = "Hold";
				}else if($print->admission_status == "4"){
					$sub_array[] = "Passout";
				}else{
					$sub_array[] = "Pending";
				}
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->employement_type;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->session_name;
				$sub_array[] = $print->faculty_name;
				$sub_array[] = $print->course_type_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if($print->course_mode == "1"){
					$sub_array[] = "Year";
					$mode = "Year";
				}else if($print->course_mode == "2"){
					$sub_array[] = "Semester";
					$mode = "Semester";
				}else if($print->course_mode == "4"){
					$sub_array[] = "Month";
					$mode = "Month";
				}
				if($print->admission_type == "0"){
					$sub_array[] = "Regular Entry";
				}else if($print->admission_type == "1"){
					$sub_array[] = "Lateral Entry";
				}else{
					$sub_array[] = "Credit Transfer";
				}

				if($print->study_mode == "1"){
					$sub_array[] = "Regular";
				}else if($print->study_mode == "2"){
					$sub_array[] = "Online";
				}else{
					$sub_array[] = "Part-Time";
				}


				$sub_array[] = $print->year_sem." ".$mode;
				
				$sub_array[] = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "print_admission_form/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-printer'></i></a>
				<a data-toggle='tooltip' title='View Qualifications' href=" . base_url() . "student_qualification/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
				<a data-toggle='tooltip' title='Print ID Card' href=" . base_url() . "admin_print_id/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-printer'></i></a>
				<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a type='button' title='Accounts' data-toggle='tooltip' href=" . base_url() . "manage_student_account/".$print->id."  class='btn btn-success btn-sm'><i class='mdi-credit-card'></i></a>
				<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_student class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									
				";
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_all_admission_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_new_admission_list(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_student');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Student_model->get_new_admission_list_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->id;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = date("d-m-Y",strtotime($print->enrollment_date));
				if($print->admission_status == "1"){
					$sub_array[] = "Active";
				}else if($print->admission_status == "2"){
					$sub_array[] = "Cancel";
				}else if($print->admission_status == "3"){
					$sub_array[] = "Hold";
				}else if($print->admission_status == "4"){
					$sub_array[] = "Passout";
				}else{
					$sub_array[] = "Pending";
				}
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->employement_type;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->session_name;
				$sub_array[] = $print->faculty_name;
				$sub_array[] = $print->course_type_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if($print->course_mode == "1"){
					$sub_array[] = "Year";
					$mode = "Year";
				}else if($print->course_mode == "2"){
					$sub_array[] = "Semester";
					$mode = "Semester";
				}else if($print->course_mode == "4"){
					$sub_array[] = "Month";
					$mode = "Month";
				}
				if($print->admission_type == "0"){
					$sub_array[] = "Regular Entry";
				}else if($print->admission_type == "1"){
					$sub_array[] = "Lateral Entry";
				}else{
					$sub_array[] = "Credit Transfer";
				}
				$sub_array[] = $print->year_sem." ".$mode;
				
				$sub_array[] = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "print_admission_form/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-printer'></i></a>
				<a data-toggle='tooltip' title='View Qualifications' href=" . base_url() . "student_qualification/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
				<a data-toggle='tooltip' title='Print ID Card' href=" . base_url() . "admin_print_id/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-printer'></i></a>
				<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a type='button' title='Accounts' data-toggle='tooltip' href=" . base_url() . "manage_student_account/".$print->id."  class='btn btn-success btn-sm'><i class='mdi-credit-card'></i></a>
				<a onclick=\"return confirm('Are you sure to approved admission?')\"' data-toggle='tooltip' title='Approved Admission' href=" . base_url() . "approved_admission/" . $print->id . " class='btn btn-danger btn-sm'><i class='mdi mdi-check'></i></a>
									
				";
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_new_admission_list_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_today_admission_list(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_student');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Student_model->get_today_admission_list_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name;
				$sub_array[] = $print->id;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = date("d-m-Y",strtotime($print->enrollment_date));
				if($print->admission_status == "1"){
					$sub_array[] = "Active";
				}else if($print->admission_status == "2"){
					$sub_array[] = "Cancel";
				}else if($print->admission_status == "3"){
					$sub_array[] = "Hold";
				}else if($print->admission_status == "4"){
					$sub_array[] = "Passout";
				}else{
					$sub_array[] = "Pending";
				}
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->employement_type;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->session_name;
				$sub_array[] = $print->faculty_name;
				$sub_array[] = $print->course_type_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				if($print->course_mode == "1"){
					$sub_array[] = "Year";
					$mode = "Year";
				}else{
					$sub_array[] = "Semester";
					$mode = "Semester";
				}
				if($print->admission_type == "0"){
					$sub_array[] = "Regular Entry";
				}else if($print->admission_type == "1"){
					$sub_array[] = "Lateral Entry";
				}else{
					$sub_array[] = "Credit Transfer";
				}
				$sub_array[] = $print->year_sem." ".$mode;
				
			 
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_today_admission_list_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_marquee_news_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_marquee_news');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->News_model->get_all_marquee_news_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->news;
				if($print->is_new == "0"){
					$sub_array[] = "New";
				}else{
					$sub_array[] = "Old";
				}
				if($print->file !=""){
					$sub_array[] = "<a type='button' target='_blank' title='View' data-toggle='tooltip' href=" . base_url() . "uploads/news/".$print->file."  class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = "";
				}
				
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_marquee_news class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_marquee_news class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "marquee_news/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_marquee_news class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_marquee_news class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "marquee_news/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->News_model->get_all_marquee_news_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_news_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_news');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->News_model->get_all_news_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->heading;
				$sub_array[] = date("d-m-Y",strtotime($print->date));
				
				if($print->file !=""){
					$sub_array[] = "<a type='button' target='_blank' title='View' data-toggle='tooltip' href=" . base_url() . "uploads/news/".$print->file."  class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = "";
				}
				
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_news class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_news class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_news/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_news class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_news class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_news/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->News_model->get_all_news_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_conference_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_conference');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->News_model->get_all_conference_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->heading;
				$sub_array[] = date("d-m-Y",strtotime($print->date));
				
				if($print->file !=""){
					$sub_array[] = "<a type='button' target='_blank' title='View' data-toggle='tooltip' href=" . base_url() . "uploads/news/".$print->file."  class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = "";
				}
				
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_conference class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_conference class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_conference/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_conference class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_conference class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_conference/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->News_model->get_all_conference_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function upload_news_image(){
		if ($_FILES['image']['name']) {
			if (!$_FILES['image']['error']) {
				$ext = explode('.', $_FILES['image']['name']);
				$filename = $ext[0] . '.' . $ext[1];
				$destination = 'uploads/news/' . $filename; //change path of the folder...
				$location = $_FILES["image"]["tmp_name"];
				move_uploaded_file($location, $destination);
				echo base_url() . 'uploads/news/' . $filename;
			} else {
				echo $message = 'The following error occured:  ' . $_FILES['image']['error'];
			}
		}
	}
	
	public function get_all_center_subject_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_subject');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Center_model->get_all_added_subject($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->subject_code;
				$sub_array[] = $print->subject_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				
				if($print->mode == "1"){
					$sub_array[] = "Year";
					$mode = "Year";
				}else{
					$sub_array[] = "Semester";
					$mode = "Semester";
				}
				$sub_array[] = $print->year_sem;
				if($print->subject_type == "1"){
					$sub_array[] = "Practical";
				}else{
					$sub_array[] = "Theory";
				}
				$sub_array[] = $print->internal_marks;
				$sub_array[] = $print->external_mark;
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_subject class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_subject class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Center_model->get_all_added_subject_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_guide_application(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_guide_application');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Research_model->get_new_guide_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->registration_number;
				$sub_array[] = $print->name;
				$sub_array[] = date("d/m/Y",strtotime($print->date_of_birth));
				$sub_array[] = date("d/m/Y",strtotime($print->created_on));
				$sub_array[] = $print->phone_number;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;

				$sub_array[] = $print->gender;
				$sub_array[] = $print->address;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->country_name;
				$sub_array[] = $print->pincode;

				$sub_array[] = $print->specilisation;
				$sub_array[] = $print->remark;
				$sub_array[] = $print->research_area;
				$sub_array[] = $print->work_experience;
				$sub_array[] = $print->present_working;
				$sub_array[] = "<img src='".base_url('images/guide_pic/'.$print->photo)."' height='100' width='100'> ";

				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_guide_application class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>
									<a data-toggle='tooltip' title='Documents' href=" . base_url() . "guide_documents/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "guide_application_update/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_guide_application class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
					<a data-toggle='tooltip' title='Documents' href=" . base_url() . "guide_documents/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
					<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "guide_application_update/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Research_model->get_new_guide_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_otp_lead_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_registration_lead');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Student_model->get_otp_lead_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = date("d/m/Y",strtotime($print->created_on));
				$sub_array[] = $print->name;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email; 
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_otp_lead_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_enquiry_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_enquiry');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Student_model->get_enquiry_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = date("d/m/Y",strtotime($print->created_on));
				$sub_array[] = $print->name;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->query;
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_enquiry_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_center_new_enquiry_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_center_enquiry');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Center_model->get_all_center_new_enquiry_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = date("d/m/Y",strtotime($print->created_on));
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->head_name;
				$sub_array[] = $print->contact_person_name;
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->address;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->country_name;
				$sub_array[] = $print->pincode;
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Center_model->get_all_center_new_enquiry_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_privilege_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_privilege_level');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Setting_model->get_all_privilege_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->name;
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_privilege_level class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_privilege_level class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "user_privilege/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_privilege_level class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_privilege_level class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "user_privilege/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Setting_model->get_all_privilege_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_privilege_link_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_privilege_link');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Setting_model->get_all_privilege_link_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->name;
				$sub_array[] = $print->level;
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_privilege_link class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_privilege_link class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "user_sub_privilege/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_privilege_link class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_privilege_link class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "user_sub_privilege/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Setting_model->get_all_privilege_link_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_privilege_label(){
		$this->Setting_model->get_unique_privilege_label();
	}
	public function get_unique_privilege_link(){
		$this->Setting_model->get_unique_privilege_link();
	}

	public function set_quiz_question(){
		$options = $this->input->post('options');
		$update_to = $this->input->post('question_id');
		$options_data = [];
		foreach ($options as $key ) {
			array_push($options_data,$key['option_text']);
		}
		$text_data = array(
			"question" => $this->input->post('question'),
			"selected_ans" => $this->input->post('selected_ans'),
			"options" => $options_data,
		);
		$data = array(
			"created_by" => "Test",
			"test_id" => $this->input->post('test_id'),
			"text_data" => json_encode(['options' => $text_data]),
			"correct_ans" => $this->input->post('selected_ans'),
			"created_on" => date("Y-m-d H:i:s"),

		);
		$this->Exam_model->save_question_to_db($data,$update_to);
	}

	public function get_quiz_question_by_id(){
		echo json_encode($this->Exam_model->get_question_edit($this->input->post('question_id')));
	}
	public function get_successfull_phd_registration(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Student_model->get_all_phd_registration_successfully($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->mobile_number;
				$sub_array[] = $print->email_id;
				$sub_array[] = $print->category;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->current_address.' '.$print->city_name.' '.$print->state_name.' '.$print->country_name.' '.$print->pin_code;
				$sub_array[] = $print->amount;
				$sub_array[] = $print->payment_id;
				$sub_array[] = date("d/m/Y",strtotime($print->payment_date));
				$sub_array[] = $print->mobile_number;
				$sub_array[] = $print->password;
				 
				$sub_array[] = "
				
				<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "print_phd_registration_form/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-printer'></i></a>
				<a type='button' title='Send Password' data-toggle='tooltip' href=" . base_url() . "send_single_password/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-message-text-outline'></i></a>
					<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "edit_phd_registration_payment/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
					<a type='button' title='View Qualifications' data-toggle='tooltip' href=" . base_url() . "view_phd_registration_payment/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
					<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_phd_registration_form class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									
				";
			
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_all_phd_registration_successfully_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_failed_phd_registration(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Student_model->get_all_phd_registration_failed($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->mobile_number;
				$sub_array[] = $print->email_id;
				$sub_array[] = $print->category;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->current_address.' '.$print->city_name.' '.$print->state_name.' '.$print->country_name.' '.$print->pin_code;
				$sub_array[] = $print->amount;
				$sub_array[] = $print->payment_id;
				$sub_array[] = date("d/m/Y",strtotime($print->payment_date));
					$sub_array[] = "
					<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "print_phd_registration_form/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-printer'></i></a>
					<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "edit_phd_registration_payment/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
					<a type='button' title='View Qualifications' data-toggle='tooltip' href=" . base_url() . "view_phd_registration_payment/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
					<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_phd_registration_form class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
					";
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_all_phd_registration_failed_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_phd_payment(){
		$this->Student_model->get_unique_phd_payment();
	}
	public function get_all_exam_list_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Exam_model->get_all_exam_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->test_name;
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_test_title_for_phd class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_test_title_for_phd class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "create_tests/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='Questions' data-toggle='tooltip' href=" . base_url() . "create_quiz/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-help-circle'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_test_title_for_phd class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_test_title_for_phd class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "create_tests/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='Questions' data-toggle='tooltip' href=" . base_url() . "create_quiz/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-help-circle'></i></a>";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_all_exam_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function delete_quiz_question(){
		$this->Exam_model->delete_quiz_question();
	}
	public function get_all_staff_faculty(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_all_staff_faculty($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				if($print->user_type == "0"){ 
					$user_tpe = "Staff";
				}else{ 
					$user_tpe = "Checker";
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name;
				$sub_array[] = $print->email;
				$sub_array[] = $print->mobile_number;
				$sub_array[] = $user_tpe; 
				$sub_array[] = $print->alternate_number;
				$sub_array[] = $print->address;
				$sub_array[] = date("d-M-Y", strtotime($print->reminder_date));
				$sub_array[] = date("d-M-Y", strtotime($print->join_date));
				$sub_array[] = date("d-M-Y", strtotime($print->exit_date));
				$sub_array[] = $print->password;
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_staff_faculty class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_staff_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_staff_faculty/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_faculty_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "faculty_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-logout'></i></a>
									
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_staff_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_staff_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_staff_faculty/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_faculty_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "faculty_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-logout'></i></a>
									";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_all_staff_faculty_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_all_left_staff_faculty(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_all_left_staff_faculty($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				if($print->user_type == "0"){ 
					$user_tpe = "Staff";
				}else{ 
					$user_tpe = "Checker";
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name;
				$sub_array[] = $print->email;
				$sub_array[] = $print->mobile_number;
				$sub_array[] = $user_tpe; 
				$sub_array[] = $print->alternate_number;
				$sub_array[] = $print->address;
				$sub_array[] = date("d-M-Y", strtotime($print->reminder_date));
				$sub_array[] = date("d-M-Y", strtotime($print->join_date));
				$sub_array[] = date("d-M-Y", strtotime($print->exit_date));
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_staff_faculty class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_staff_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_staff_faculty/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='Reset Password' data-toggle='tooltip' href='javascript:void(0)' id=".$print->id." class='reset btn btn-success btn-sm'><i class='mdi mdi-settings'></i></a>
									<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_faculty_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Not Left' href=" . base_url() . "faculty_not_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_staff_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_staff_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_staff_faculty/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='Reset Password' data-toggle='tooltip' href='javascript:void(0)' id=".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-settings'></i></a>
									<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_faculty_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Not Left' href=" . base_url() . "faculty_not_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_all_left_staff_faculty_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_unique_staff_faculty_mobile_number(){
		$this->Faculty_model->get_unique_staff_faculty_mobile_number();
	}
	public function get_unique_staff_faculty_email(){
		$this->Faculty_model->get_unique_staff_faculty_email();
	}
	public function get_old_paasword_faculty(){
		$this->Faculty_model->get_old_paasword_faculty();
	}
	public function get_all_my_daily_report(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_all_my_daily_report($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				if($print->approved_status == "0"){ 
					$approved_status = "Pending";
				}else if($print->approved_status == "1"){ 
					$approved_status = "Approved";
				}else{
					$approved_status = "Rejected";
				}
				$this->db->where('id',$print->approved_by);
				$approve_by = $this->db->get('tbl_staff_faculty');
				$approve_by = $approve_by->row();
				$approved_by = "";
				if(!empty($approve_by)){
					$approved_by = $approve_by->first_name.' '.$approve_by->last_name;
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = date("d/m/Y H:i A",strtotime($print->created_on));
				$sub_array[] = $print->present_student;
				$sub_array[] = $print->details;
				$sub_array[] = $approved_status;
				$sub_array[] = $approved_by;
				$sub_array[] = $print->approved_date; 
				$sub_array[] = $print->remark; 
				 

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_all_my_daily_report_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_new_daily_report(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_all_new_daily_report($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				if($print->approved_status == "0"){ 
					$approved_status = "Pending";
				}else if($print->approved_status == "1"){ 
					$approved_status = "Approved";
				}else{
					$approved_status = "Rejected";
				}
				$this->db->where('id',$print->approved_by);
				$approve_by = $this->db->get('tbl_staff_faculty');
				$approve_by = $approve_by->row();
				$approved_by = "";
				if(!empty($approve_by)){
					$approved_by = $approve_by->first_name.' '.$approve_by->last_name;
				}
				
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name;
				$sub_array[] = date("d/m/Y H:i A",strtotime($print->created_on));
				$sub_array[] = $print->present_student;
				$sub_array[] = $print->details;
				$sub_array[] = $approved_status;
				$sub_array[] = $approved_by;
				$sub_array[] = $print->approved_date; 
				$sub_array[] = $print->remark; 
				$sub_array[] = "	
								<a type='button' title='Update' data-toggle='tooltip' href=" . base_url() . "update_daily_report/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
								";

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_all_new_daily_report_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function get_all_daily_report(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_all_daily_report($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				if($print->approved_status == "0"){ 
					$approved_status = "Pending";
				}else if($print->approved_status == "1"){ 
					$approved_status = "Approved";
				}else{
					$approved_status = "Rejected";
				}
				$this->db->where('id',$print->approved_by);
				$approve_by = $this->db->get('tbl_staff_faculty');
				$approve_by = $approve_by->row();
				$approved_by = "";
				if(!empty($approve_by)){
					$approved_by = $approve_by->first_name.' '.$approve_by->last_name;
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name; 
				$sub_array[] = date("d/m/Y H:i A",strtotime($print->created_on));
				$sub_array[] = $print->present_student;
				$sub_array[] = $print->details;
				$sub_array[] = $approved_status;
				$sub_array[] = $approved_by;
				$sub_array[] = $print->approved_date; 
				$sub_array[] = $print->remark; 
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_all_daily_report_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_today_daily_report(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_today_daily_report($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				if($print->approved_status == "0"){ 
					$approved_status = "Pending";
				}else if($print->approved_status == "1"){ 
					$approved_status = "Approved";
				}else{
					$approved_status = "Rejected";
				}
				$this->db->where('id',$print->approved_by);
				$approve_by = $this->db->get('tbl_staff_faculty');
				$approve_by = $approve_by->row();
				$approved_by = "";
				if(!empty($approve_by)){
					$approved_by = $approve_by->first_name.' '.$approve_by->last_name;
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name;
				$sub_array[] = date("d/m/Y H:i A",strtotime($print->created_on));
				$sub_array[] = $print->present_student;
				$sub_array[] = $print->details;
				$sub_array[] = $approved_status;
				$sub_array[] = $approved_by;
				$sub_array[] = $print->approved_date; 
				$sub_array[] = $print->remark; 
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_today_daily_report_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_my_register_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_my_register_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){ 
				$this->db->where('id',$print->stream);
				$stream = $this->db->get('tbl_stream');
				$stream = $stream->row();
				$stream_name = "";
				if(!empty($stream)){
					$stream_name = "(".$stream->stream_name.")";
				}
				$explode = explode(',',$print->syllabus);
				$file = "";
				if(!empty($explode)){
					for($i=0;$i<count($explode);$i++){
						$file .= "<a type='button' target='_blank' title='View Student' data-toggle='tooltip' href=" . base_url() . "uploads/syllabus/".$explode[$i]."  class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>";
									
					}
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->register_name; 
				$sub_array[] = $print->course_name.' '.$stream_name; 
				$sub_array[] = $print->subject_name; 
				$sub_array[] = $print->year_sem; 
				$sub_array[] = $file; 
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_staff_register class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_staff_register class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_register/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='View Student' data-toggle='tooltip' href=" . base_url() . "view_register_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									<a type='button' title='Attendance' data-toggle='tooltip' href=" . base_url() . "add_student_attendance/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-account-plus'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_staff_register class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_staff_register class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_register/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='View Student' data-toggle='tooltip' href=" . base_url() . "view_register_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									<a type='button' title='Attendance' data-toggle='tooltip' href=" . base_url() . "add_student_attendance/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-account-plus'></i></a>
									";
				}
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_my_register_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_register_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_all_register_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){  
				$explode = explode(',',$print->syllabus);
				$file = "";
				if(!empty($explode)){
					for($i=0;$i<count($explode);$i++){
						if($explode[$i] !=""){
							$file .= "<a type='button' target='_blank' title='View Student' data-toggle='tooltip' href=" . base_url() . "uploads/syllabus/".$explode[$i]."  class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>";
						}
									
					}
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name." ".$print->last_name; 
				$sub_array[] = $print->register_name; 
				$sub_array[] = $print->course_name; 
				$sub_array[] = $print->subject_name; 
				$sub_array[] = $print->year_sem; 
				$sub_array[] = $file; 
				$sub_array[] = "
					<a type='button' title='Attendance' data-toggle='tooltip' href=" . base_url() . "admin_view_attendance/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-account-plus'></i></a>
				";
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_all_register_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_my_all_syllabus(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_my_all_syllabus($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$explode = explode(',',$print->files);
				$file = "";
				if(!empty($explode)){
					for($i=0;$i<count($explode);$i++){
						$file .= "<a type='button' target='_blank' title='View Student' data-toggle='tooltip' href=" . base_url() . "uploads/syllabus/".$explode[$i]."  class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>";
									
					}
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->syllabus_name; 
				$sub_array[] = $file; 
				$sub_array[] = $print->description; 
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_syllabus class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_syllabus class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_syllabus/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_syllabus class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_syllabus class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_syllabus/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_my_all_syllabus_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_feedback_list(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_all_feedback_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){ 
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name;  
				$sub_array[] = date("d/m/Y",strtotime($print->created_on));  
				$sub_array[] = $print->feedback;  
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_all_feedback_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function get_job_application(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Setting_model->get_all_job_application($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				$file = "<a type='button' target='_blank' title='View Student' data-toggle='tooltip' href=" . base_url() . "images/career/".$print->userfile."  class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>";
									
				
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->name; 
				$sub_array[] = $print->mobile_number; 
				$sub_array[] = $print->email; 
				$sub_array[] = $print->position; 
				$sub_array[] = $file;  
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Setting_model->get_all_job_application_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_student_feedback_list(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Student_model->get_all_student_feedback_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name; 
				$sub_array[] = $print->print_name; 
				$sub_array[] = date("d/m/Y",strtotime($print->created_on)); 
				$sub_array[] = $print->feedback; 
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_all_student_feedback_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_my_faculty_documents(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_my_faculty_documents($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->head; 
				$sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "uploads/faculty_documents/".$print->file." target='_blank'  class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>";  
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_my_faculty_documents_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_faculty_documents(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_all_faculty_documents($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name; 
				$sub_array[] = $print->head; 
				$sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "uploads/faculty_documents/".$print->file." target='_blank'  class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
				<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_faculty_documents class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				";  
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_all_faculty_documents_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_examination_list_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Exam_model->get_all_examination_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				$total_question_count = $this->Exam_model->get_total_added_question($print->id);
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->exam_name; 
				$sub_array[] = $print->exam_date; 
				$sub_array[] = $print->exam_duration; 
				$sub_array[] = $print->course_name; 
				$sub_array[] = $print->stream_name; 
				$sub_array[] = $print->subject_name; 
				$sub_array[] = $print->year_sem;  
				$sub_array[] = $total_question_count; 
				$sub_array[] = "<a type='button' title='Manage Question' data-toggle='tooltip' href=" . base_url() . "manage_examination_question/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-settings'></i></a>
									";
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_examination class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_examination class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_examination/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_examination class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_examination class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_examination/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_all_examination_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_course_stream_subject(){
		$this->Exam_model->get_course_stream_subject();
	}

	public function get_all_assignment_list(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Exam_model->get_all_assignment_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				$total_question = $this->Exam_model->get_faculty_wise_question_count($print->added_by,$print->course_id, $print->stream_id, $print->subject_id, $print->year_sem, $date='all');
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name; 
				$sub_array[] = date("d/m/Y", strtotime($print->created_on)); 
				$sub_array[] = $print->course_name; 
				$sub_array[] = $print->stream_name; 
				$sub_array[] = $print->subject_name; 
				$sub_array[] = $print->year_sem;  
				$sub_array[] = $total_question; 
				$sub_array[] = "<a type='button' title='View Question' data-toggle='tooltip' href=" . base_url() . "view_assignment_question_mcq/".$print->added_by."/".$print->course_id."/".$print->stream_id."/".$print->subject_id."/".$print->year_sem."/all  class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									";
			
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_all_assignment_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_all_sub_assignment_list(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Exam_model->get_all_sub_assignment_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				$total_question = $this->Exam_model->get_faculty_wise_sub_question_count($print->added_by,$print->course_id, $print->stream_id, $print->subject_id, $print->year_sem, $date='all');
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name; 
				$sub_array[] = date("d/m/Y", strtotime($print->created_on)); 
				$sub_array[] = $print->course_name; 
				$sub_array[] = $print->stream_name; 
				$sub_array[] = $print->subject_name; 
				$sub_array[] = $print->year_sem;  
				$sub_array[] = $total_question; 
				$sub_array[] = "<a type='button' title='View Question' data-toggle='tooltip' href=" . base_url() . "view_assignment_question_theory/".$print->added_by."/".$print->course_id."/".$print->stream_id."/".$print->subject_id."/".$print->year_sem."/all  class='btn btn-warning btn-sm'><i class='mdi mdi-eye'></i></a>
									";
			
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_all_sub_assignment_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}


	public function get_today_sub_assignment_list(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Exam_model->get_today_sub_assignment_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				$total_question = $this->Exam_model->get_faculty_wise_sub_question_count($print->added_by,$print->course_id, $print->stream_id, $print->subject_id, $print->year_sem, $date='all');
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name; 
				$sub_array[] = date("d/m/Y", strtotime($print->created_on)); 
				$sub_array[] = $print->course_name; 
				$sub_array[] = $print->stream_name; 
				$sub_array[] = $print->subject_name; 
				$sub_array[] = $print->year_sem;  
				$sub_array[] = $total_question; 
				$sub_array[] = "<a type='button' title='View Question' data-toggle='tooltip' href=" . base_url() . "view_assignment_question_theory/".$print->added_by."/".$print->course_id."/".$print->stream_id."/".$print->subject_id."/".$print->year_sem."/all  class='btn btn-warning btn-sm'><i class='mdi mdi-eye'></i></a>
									";
			
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_today_sub_assignment_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}


	public function get_selected_theory_question(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Exam_model->get_selected_theory_question($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
					$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->question;  
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_theoretical_data class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>";
			
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_selected_theory_question_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_selected_mcq_question(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Exam_model->get_selected_mcq_question($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
					$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->question; 
				$sub_array[] = $print->option_a; 
				$sub_array[] = $print->option_b; 
				$sub_array[] = $print->option_c; 
				$sub_array[] = $print->option_d;  
				$correct_answer = '';
				if(!empty($print->correct_answer)){
					if($print->correct_answer == '1'){
						$correct_answer = 'A';
					}else if($print->correct_answer == '2'){
						$correct_answer = 'B';
					}else if($print->correct_answer == '3'){
						$correct_answer = 'C';
					}else if($print->correct_answer == '4'){
						$correct_answer = 'D';
					}
				}
				$sub_array[] = $correct_answer; 
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_mcq_data class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>";
			
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_selected_mcq_question_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_today_assignment_list(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Exam_model->get_today_assignment_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				$total_question = $this->Exam_model->get_faculty_wise_question_count($print->added_by,$print->course_id, $print->stream_id, $print->subject_id, $print->year_sem, $date='all');
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name; 
				$sub_array[] = date("d/m/Y", strtotime($print->created_on)); 
				$sub_array[] = $print->course_name; 
				$sub_array[] = $print->stream_name; 
				$sub_array[] = $print->subject_name; 
				$sub_array[] = $print->year_sem;  
				$sub_array[] = $total_question; 
				$sub_array[] = "<a type='button' title='View Question' data-toggle='tooltip' href=" . base_url() . "view_assignment_question_mcq/".$print->added_by."/".$print->course_id."/".$print->stream_id."/".$print->subject_id."/".$print->year_sem."/no  class='btn btn-success btn-sm'><i class='mdi mdi-settings'></i></a>
									";
			
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_today_assignment_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}	
	public function get_all_examination_form_list(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		 
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        } 
		if(!empty($search)){
			$x = 0;
        }		
		$document = $this->Exam_model->get_all_examination_form_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				if($print->payment_status == "0"){
					$pay_status = "Failed";
				}else{
					$pay_status = "Success";
				}
				if($print->exam_status == "1"){
					$hallticket_status = "Active";
					$hallticket_activate = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' type='button' title='Inactivate Hallticket' data-toggle='tooltip' href=" . base_url() . "inactive_hallticket/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>";
				}else{
					$hallticket_status = "Pending";
					$hallticket_activate = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"'  type='button' title='Activate Hallticket' data-toggle='tooltip' href=" . base_url() . "active_hallticket/".$print->id."  class='btn btn-danger btn-sm'><i class='mdi mdi-bookmark-check'></i></a>";
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $hallticket_status; 
				$sub_array[] = $print->center_name; 
				$sub_array[] = date("d/m/Y",strtotime($print->date_of_birth));
				$sub_array[] = $print->enrollment_number; 
				$sub_array[] = date("d/m/Y", strtotime($print->created_on)); 
				$sub_array[] = $pay_status; 
				$sub_array[] = $print->year_sem; 
				$sub_array[] = $print->student_name; 
				$sub_array[] = $print->father_name; 
				$sub_array[] = $print->mother_name; 
				$sub_array[] = $print->mobile; 
				$sub_array[] = $print->email; 
				$sub_array[] = $print->course_name;  
				$sub_array[] = $print->stream_name; 
				 
				$sub_array[] = $hallticket_activate." <a type='button' title='Update Payment' data-toggle='tooltip' href=" . base_url() . "update_exam_payment/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";  
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_all_examination_form_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_examination_form_list_failed(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		 
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        } 
		if(!empty($search)){
			$x = 0;
        }		
		$document = $this->Exam_model->get_all_examination_form_failed_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				if($print->payment_status == "0"){
					$pay_status = "Failed";
				}else{
					$pay_status = "Success";
				}
				if($print->exam_status == "1"){
					$hallticket_status = "Active";
					$hallticket_activate = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' type='button' title='Inactivate Hallticket' data-toggle='tooltip' href=" . base_url() . "inactive_hallticket/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>";
				}else{
					$hallticket_status = "Pending";
					$hallticket_activate = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"'  type='button' title='Activate Hallticket' data-toggle='tooltip' href=" . base_url() . "active_hallticket/".$print->id."  class='btn btn-danger btn-sm'><i class='mdi mdi-bookmark-check'></i></a>";
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $hallticket_status;  
				$sub_array[] = $print->center_name; 
				$sub_array[] = date("d/m/Y",strtotime($print->date_of_birth)); 
				$sub_array[] = $print->enrollment_number; 
				$sub_array[] = date("d/m/Y", strtotime($print->created_on)); 
				$sub_array[] = $pay_status; 
				$sub_array[] = $print->year_sem; 
				$sub_array[] = $print->student_name; 
				$sub_array[] = $print->father_name; 
				$sub_array[] = $print->mother_name; 
				$sub_array[] = $print->mobile; 
				$sub_array[] = $print->email; 
				$sub_array[] = $print->course_name;  
				$sub_array[] = $print->stream_name; 
				$sub_array[] = $hallticket_activate." <a type='button' title='Update Payment' data-toggle='tooltip' href=" . base_url() . "update_exam_payment/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";  
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_all_examination_form_list_failed_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}



	public function get_all_course_video_data(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_all_course_video_data($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $this->db->where("id",$print->course)->get("tbl_course")->row()->course_name;
				$sub_array[] = $this->db->where("id",$print->stream)->get("tbl_stream")->row()->stream_name;
				$sub_array[] = $print->year_sem;
				$sub_array[] = $this->db->where("id",$print->subject)->get("tbl_subject")->row()->subject_name;
				$sub_array[] = "<a href='$print->video_url'>$print->video_url</a>"; 
				$sub_array[] = $print->video_title;
				$sub_array[] = $print->created_on; 
				
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_course_video class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_video class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "course_video_add/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_course_video class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_video class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "course_video_add/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_all_course_video_data_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_today_attendanc_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_today_attendanc_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$sub_array[] = $print->subject_name;
				$sub_array[] = $print->present_student;
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_today_attendanc_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_bulk_attendance(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Faculty_model->get_all_bulk_attendance($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = date("d/m/Y",strtotime($print->date));
				$sub_array[] = $print->first_name." ".$print->last_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$sub_array[] = $print->subject_name;
				$sub_array[] = $print->present_student;
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_all_bulk_attendance_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}



	public function get_all_examination_papper_list_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Exam_model->get_all_examination_papper_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			
			foreach($document as $print){
				
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->course_name; 
				$sub_array[] = $print->stream_name; 
				$sub_array[] = $print->subject_name; 
				$sub_array[] = $print->year_sem;  
				
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_exam_pappers class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "upload-exam-papper/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_exam_pappers class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "upload-exam-papper/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}
				// if($print->status == "1"){
				// 	$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_exam_pappers class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
				// 					<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_exam_pappers class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				// 					<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "upload-exam-pappe/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
				// 					";
				// }else{
				// 	$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_exam_pappers class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
				// 					<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_exam_pappers class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				// 					<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "upload-exam-pappe/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
				// 					";
				// }
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_all_examination_papper_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	
	
	public function get_all_employee_documents(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
			
        }
		
		$document = $this->Setting_model->get_all_employee_documents($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			$file = "";
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name; 
				$sub_array[] = $print->head; 
				$sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "uploads/employee_documents/".$print->file." target='_blank'  class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
				<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_employee_documents class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				";  
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Setting_model->get_all_employee_documents_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function get_all_left_employee_ajax(){
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
		$search = $search['value'];
		$col = 0;
        $dir = "";
		if(!empty($order)){
            foreach($order as $o){
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
		if($dir != "asc" && $dir != "desc"){
            $dir = "desc";
        }		
		$valid_columns = $this->db->list_fields('tbl_employees');
		if(!isset($valid_columns[$col])){
            $order = null;
        }else{
            $order = $valid_columns[$col];
        }
        if($order !=null){
           // $this->db->order_by('tbl_topic.id'.$order,$dir);
        }
		
		if(!empty($search)){
			$x = 0;
           /*foreach($valid_columns as $sterm){
                if($x==0){
                    $this->db->like("tbl_designation.".$sterm,$search);
                }else{
                    $this->db->or_like("tbl_designation.".$sterm,$search);
                }
                $x++;
            }*/
			
        }
		
		$document = $this->Setting_model->get_all_left_employee_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->designation;
				$sub_array[] = $print->name_prefix." ".$print->first_name." ".$print->last_name;
				$sub_array[] = $print->email;
				$sub_array[] = $print->contact_number;
				$sub_array[] = $print->alternate_number;
				$sub_array[] = date("d-m-Y",strtotime($print->join_date));
				$sub_array[] = $print->address;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->country_name;

				if(!empty($print->profile_pic)){
					$sub_array[] = "<img src=".base_url("images/employee/".$print->profile_pic).">";
				}else{
					$sub_array[] = "<img src=".base_url("images/employee/no-profile-image.png").">";
				}

				$sub_array[] = $print->pincode;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_employees class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_employee_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>

									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_employee/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "employee_not_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_employee_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_employee/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "employee_not_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Setting_model->get_all_left_employee_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
}