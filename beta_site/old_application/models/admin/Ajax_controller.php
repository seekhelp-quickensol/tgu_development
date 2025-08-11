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
									<a onclick=\"return confirm('Are you sure, employee is left?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "employee_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-logout'></i></a>
									
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_employee_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_employee/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, employee is left?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "employee_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-logout'></i></a>
									
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

	public function get_all_paper_ajax(){
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
		$valid_columns = $this->db->list_fields('tbl_papers');
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
		
		$document = $this->Admin_model->get_all_papers_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->subject_name;
				if($print->file != ""){
					$sub_array[] = "<a data-toggle='tooltip' title='View Identity Softcopy' href=" . base_url() . "uploads/papers/" . $print->file . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = '';
				}
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_papers class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_papers class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_paper/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_papers class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_papers class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_paper/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Admin_model->get_all_papers_ajax_count($search);
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
				$sub_array[] = $print->pre_session;
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
				$sub_array[] = $print->campus_fees;

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
				$sub_array[] = date("d/m/Y",strtotime($print->created_on));
				if($print->collaboration_status == "0"){
				$sub_array[] = "Indian";
				}else{
					$sub_array[] = "Foreign";
				}

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
				
				if($print->id_type == '1'){
					$sub_array[] = "Aadhar Card";
				}else if($print->id_type == '2'){
					$sub_array[] = "Passport";
				}else if($print->id_type == '3'){
					$sub_array[] = "Voter Id";
				}else{
					$sub_array[] = "";
				}
				$sub_array[] = $print->id_number;
				if($print->identity_softcopy != ""){
					$sub_array[] = "<a data-toggle='tooltip' title='View Identity Softcopy' href=" . base_url() . "images/student_identity_softcopy/" . $print->identity_softcopy . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = '';
				}
				$sub_array[] = "<a data-toggle='tooltip' title='Enroll Now' href=" . base_url() . "enrolled_new_student/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>
				<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "print_admission_form/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-printer'></i></a>
				<a data-toggle='tooltip' title='View Qualifications' href=" . base_url() . "student_qualification/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
				<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a type='button' title='Accounts' data-toggle='tooltip' href=" . base_url() . "manage_student_account/".$print->id."  class='btn btn-success btn-sm'><i class='mdi-credit-card'></i></a>
				<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_student class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='cancel_student(".$print->id.")'>Cancel</button>					
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
				$total_paid_amt = 0;
				$total_exam_amt = 0;
				
				$payable_amt = $this->Student_model->get_student_total_payable_fees($print->id);
				
				$paid_amt = $this->Student_model->get_student_paid_addmission_fees_ajax($print->id);
				$exam_amt = $this->Student_model->get_student_paid_exam_fees($print->id);
				
				if(!empty($paid_amt)){foreach($paid_amt as $paid_amt_result){
					$total_paid_amt = $total_paid_amt + $paid_amt_result->amount;
				}}
				
				if(!empty($exam_amt)){foreach($exam_amt as $exam_amt_result){
					$total_exam_amt = $total_exam_amt + $exam_amt_result->amount;
				}}
				
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->id;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = date("d-m-Y",strtotime($print->enrollment_date));
				$sub_array[] = date("d-m-Y",strtotime($print->created_on));
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
				$mode = "";
				if($print->course_mode == "1"){
					$sub_array[] = "Year";
					$mode = "Year";
				}else if($print->course_mode == "2"){
					$sub_array[] = "Semester";
					$mode = "Semester";
				}
				else if($print->course_mode == "3"){
					$sub_array[] = "both";
					$mode = "both";
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
				$sub_array[] = number_format($payable_amt,2);
				$sub_array[] = number_format($total_paid_amt,2);
				$sub_array[] = number_format($total_exam_amt,2);
				
				if($print->id_type == '1'){
					$sub_array[] = "Aadhar Card";
				}else if($print->id_type == '2'){
					$sub_array[] = "Passport";
				}else if($print->id_type == '3'){
					$sub_array[] = "Voter Id";
				}else{
					$sub_array[] = "";
				}
				$sub_array[] = $print->id_number;
				if($print->identity_softcopy != ""){
					$sub_array[] = "<a data-toggle='tooltip' title='View Identity Softcopy' href=" . base_url() . "images/student_identity_softcopy/" . $print->identity_softcopy . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = '';
				}
				
				$sub_array[] = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "print_admission_form/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-printer'></i></a>
				<a data-toggle='tooltip' title='View Qualifications' href=" . base_url() . "student_qualification/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
				<a data-toggle='tooltip' title='Print ID Card' href=" . base_url() . "admin_print_id/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-printer'></i></a>
				<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a type='button' title='Accounts' data-toggle='tooltip' href=" . base_url() . "manage_student_account/".$print->id."  class='btn btn-success btn-sm'><i class='mdi-credit-card'></i></a>
				<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_student class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='cancel_student(".$print->id.")'>Cancel</button>					
				";
				if($print->hold_login == "0"){
					$sub_array[] = "<a data-toggle='tooltip' title='Hold Login' href=" . base_url() . "hold-login-single/" . $print->id . " class='btn btn-danger btn-sm'><i class='mdi mdi-silverware'></i></a>";
				}else{
					$sub_array[] = "<a data-toggle='tooltip' title='Activate Login' href=" . base_url() . "activate-login-single/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi-checkbox-marked-circle-outline'></i></a>";
				}
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
				
				if($print->id_type == '1'){
					$sub_array[] = "Aadhar Card";
				}else if($print->id_type == '2'){
					$sub_array[] = "Passport";
				}else if($print->id_type == '3'){
					$sub_array[] = "Voter Id";
				}else{
					$sub_array[] = "";
				}
				$sub_array[] = $print->id_number;
				if($print->identity_softcopy != ""){
					$sub_array[] = "<a data-toggle='tooltip' title='View Identity Softcopy' href=" . base_url() . "images/student_identity_softcopy/" . $print->identity_softcopy . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = '';
				}
				
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

				if($print->study_mode == "1"){
					$sub_array[] = "Regular";
				}else if($print->study_mode == "2"){
					$sub_array[] = "Online";
				}else{
					$sub_array[] = "Part-Time";
				}

				$sub_array[] = $print->year_sem." ".$mode;
				
				if($print->id_type == '1'){
					$sub_array[] = "Aadhar Card";
				}else if($print->id_type == '2'){
					$sub_array[] = "Passport";
				}else if($print->id_type == '3'){
					$sub_array[] = "Voter Id";
				}else{
					$sub_array[] = "";
				}
				$sub_array[] = $print->id_number;
				if($print->identity_softcopy != ""){
					$sub_array[] = "<a data-toggle='tooltip' title='View Identity Softcopy' href=" . base_url() . "images/student_identity_softcopy/" . $print->identity_softcopy . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = '';
				}
			 
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
				$sub_array[] = $print->employement_type;
				$sub_array[] = $print->work_experience;
				$sub_array[] = $print->present_working;
				$sub_array[] = "<img src='".base_url('images/guide_pic/'.$print->photo)."' height='100' width='100'> ";

				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_guide_application class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>
									<a data-toggle='tooltip' title='Documents' href=" . base_url() . "guide_documents/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "guide_application_update/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to approve this record?')\"' type='button' title='Approve Now' data-toggle='tooltip' href=" . base_url() . "approve_guide_application/".$print->id."  class='btn btn-success btn-sm'>Approve Now</a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_guide_application class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a data-toggle='tooltip' title='Documents' href=" . base_url() . "guide_documents/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "guide_application_update/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to approve this record?')\"' type='button' title='Approve Now' data-toggle='tooltip' href=" . base_url() . "approve_guide_application/".$print->id."  class='btn btn-success btn-sm'>Approve Now</a>
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
				$sub_array[] = $print->state;
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
	/*public function get_all_center_new_enquiry_ajax(){
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
				$photo_img="No Photo";
				if($print->photo !=""){
						$photo_img="<a href='".base_url().'/images/center/photo/'.$print->photo."' target='_blank'>Clcik to view Photo</a>";
				}
				
				$adhar_card="No Aadharcard";
				if($print->adhar_card !=""){
						$adhar_card="<a href='".base_url().'/images/center/adharcard/'.$print->adhar_card."' target='_blank'>Clcik to view </a>";
				}
				
				$pan_card="No Pan card";
				if($print->pan_card !=""){
						$pan_card="<a href='".base_url().'/images/center/pan_card'.$print->pan_card."' target='_blank'>Clcik to view</a>";
				}
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
				$sub_array[] = $photo_img;
				$sub_array[] = $adhar_card;
				$sub_array[] = $pan_card;
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
	}*/
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
				$photo_img="No Photo";
				if($print->photo !=""){
						$photo_img="<a href='".base_url().'/images/center/photo/'.$print->photo."' target='_blank'>Clcik to view Photo</a>";
				}
				
				$adhar_card="No Aadharcard";
				if($print->adhar_card !=""){
						$adhar_card="<a href='".base_url().'/images/center/adharcard/'.$print->adhar_card."' target='_blank'>Clcik to view </a>";
				}
				
				$pan_card="No Pan card";
				if($print->pan_card !=""){
						$pan_card="<a href='".base_url().'/images/center/pan_card'.$print->pan_card."' target='_blank'>Clcik to view</a>";
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = date("d/m/Y",strtotime($print->created_on));
				if($print->collaboration_status == "0"){
				$sub_array[] = "Indian";
				}else{
					$sub_array[] = "Foreign";
				}
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
				$sub_array[] = $photo_img;
				$sub_array[] = $adhar_card;
				$sub_array[] = $pan_card;
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
				$get_enrolled = $this->Student_model->get_enrolled_status_phd($print->email_id,$print->father_name,$print->mobile_number);
				$sub_array = array();
				$sub_array[] = $zz++;
				if($get_enrolled == 1){
					$sub_array[] = "Enrolled"; 
				}else{
					$sub_array[] = "Pending"; 
				}
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
				$get_enrolled = $this->Student_model->get_enrolled_status_phd($print->email_id,$print->father_name,$print->mobile_number);
				$sub_array = array();
				$sub_array[] = $zz++;
				if($get_enrolled == 1){
					$sub_array[] = "Enrolled"; 
				}else{
					$sub_array[] = "Pending"; 
				}
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
									<a type='button' title='Add Common Questions' data-toggle='tooltip' href=" . base_url() . "create_quiz/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-help-circle'></i></a>
									<a type='button' title='Add Subject Questions' data-toggle='tooltip' href=" . base_url() . "create_subject_quiz/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-help-circle'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_test_title_for_phd class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_test_title_for_phd class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "create_tests/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='Add Common Questions' data-toggle='tooltip' href=" . base_url() . "create_quiz/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-help-circle'></i></a>
									<a type='button' title='Add Subject Questions' data-toggle='tooltip' href=" . base_url() . "create_subject_quiz/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-help-circle'></i></a>";
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
				$subject = $this->Faculty_model->get_staff_faculty_subject($print->subject_id);
				
				if($print->user_type == "0"){ 
					$user_tpe = "Staff";
				}else{ 
					$user_tpe = "Checker";
				}

				$faculty_state = $this->Faculty_model->get_staff_faculty_state($print->state);
				
				$faculty_city = $this->Faculty_model->get_staff_faculty_city($print->city);

				

				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->first_name.' '.$print->last_name;
				$sub_array[] = $print->email;
				$sub_array[] = $print->mobile_number;
				$sub_array[] = $user_tpe; 
				$sub_array[] = $print->alternate_number;
				$sub_array[] = $print->address;
				$sub_array[] = $print->family_contact_number;
				$sub_array[] = $print->adharcard_number;
				$document_list = "";
				if($print->adhar_file != ""){

				$sub_array[] = "<a type='button' title='Aadhar File' target= '_blank' data-toggle='tooltip' href=" . base_url() ."images/faculty_staff/document/".$print->adhar_file." class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
			 }else{
				$sub_array[] = "Not Uploaded";
			} 
			 if($print->photo != ""){
				$sub_array[] = "<a type='button' title='Photo'  target= '_blank' data-toggle='tooltip' href=" . base_url() . "images/faculty_staff/photo/".$print->photo."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
			}else{
				$sub_array[] = "Not Uploaded";
			} 
			 if($print->cv_file != ""){
				$sub_array[] = "<a type='button' title='CV'  target= '_blank' data-toggle='tooltip' href=" . base_url() . "images/faculty_staff/cv/".$print->cv_file."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
			}else{
				$sub_array[] = "Not Uploaded";
			} 
			 if($print->eligibility_document != ""){
				$sub_array[] = "<a type='button' title='Eligibility Document'  target= '_blank' data-toggle='tooltip' href=" . base_url() . "images/faculty_staff/ed/".$print->eligibility_document."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
			}else{
				$sub_array[] = "Not Uploaded";
			}
			$sub_array[] = "<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_faculty_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>";
				$sub_array[] = $faculty_state;
				$sub_array[] = $faculty_city;
				if($print->pincode != '0'){
					$sub_array[] = $print->pincode;
				}else{
					$sub_array[] = '';
				}
				
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $subject;

				if($print-";">reminder_date !=''){
					$sub_array[] = date("d-M-Y", strtotime($print->reminder_date));
				}else{
					$sub_array[] = '';
				}
				//$sub_array[] = date("d-M-Y", strtotime($print->reminder_date));
				$sub_array[] = date("d-M-Y", strtotime($print->join_date));
				$sub_array[] = date("d-M-Y", strtotime($print->exit_date));
				$sub_array[] = $print->password;
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_staff_faculty class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_staff_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_staff_faculty/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "faculty_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-logout'></i></a>
									
									"; 
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_staff_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_staff_faculty class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_staff_faculty/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "faculty_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-logout'></i></a>
									";
									/*<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_faculty_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>*/
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
				$sub_array[] = "<a href='".base_url()."view_report_comments/".$print->id."' class='btn btn-primary'>View Comments</a>";

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
				$sub_array[] = !empty($print->approved_date)?$print->approved_date:''; 
				$sub_array[] = $print->remark; 
				$sub_array[] = "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='reply_faculty(".$print->id.",".$print->faculty_id.")'>Reply</button>
				"; 
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
				$sub_array[] = "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='reply_faculty(".$print->id.",".$print->faculty_id.")'>Reply</button>";
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
				$sub_array[] = date("d-m-Y",strtotime($print->updated_on));
				$sub_array[] = $print->name; 
				$sub_array[] = $print->mobile_number; 
				$sub_array[] = $print->email; 
				$sub_array[] = $print->position;
				$sub_array[] = $print->last_qualification;
				$sub_array[] = $print->work_experience;
				$sub_array[] = $print->present_working; 
				$sub_array[] = $print->full_address; 
				$sub_array[] = $print->state; 
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
				if($print->exam_mode_type == "1"){
					$exam_mode = "Offline";
				}else if($print->exam_mode_type == "2"){
					$exam_mode = "Online";
				}else{
					$exam_mode = "";
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = "<input type='checkbox' name='slecter[]' class='selecter' value='".$print->id."'>";
				$sub_array[] = $hallticket_activate." <a type='button' title='Update Payment' data-toggle='tooltip' href=" . base_url() . "update_exam_payment/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>	"; 
				$sub_array[] = $print->student_name; 
				$sub_array[] = $print->enrollment_number; 
				$sub_array[] = $print->center_name; 
				$sub_array[] = $print->payment_id; 
				$sub_array[] = $print->exam_month.' '.$print->exam_year; 
				$sub_array[] = $exam_mode; 
				$sub_array[] = $hallticket_status; 
				$sub_array[] = date("d/m/Y",strtotime($print->date_of_birth));
				$sub_array[] = date("d/m/Y", strtotime($print->created_on)); 
				$sub_array[] = $pay_status; 
				$sub_array[] = $print->year_sem; 
				$sub_array[] = $print->father_name; 
				$sub_array[] = $print->mother_name; 
				$sub_array[] = $print->mobile; 
				$sub_array[] = $print->email; 
				$sub_array[] = $print->course_name;  
				$sub_array[] = $print->stream_name; 
				 
								 
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
				if($print->exam_mode_type == "1"){
					$exam_mode = "Offline";
				}else if($print->exam_mode_type == "2"){
					$exam_mode = "Online";
				}else{
					$exam_mode = "";
				}
				$sub_array = array();
				$sub_array[] = $zz++;  
				$sub_array[] = $print->exam_month.' '.$print->exam_year; 
				$sub_array[] = $exam_mode; 
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
				/*$sub_array[] = $hallticket_activate." <a type='button' title='Update Payment' data-toggle='tooltip' href=" . base_url() . "update_exam_payment/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";*/
				$sub_array[] = " <a type='button' title='Update Payment' data-toggle='tooltip' href=" . base_url() . "update_exam_payment/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";  
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
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Rejoin' href=" . base_url() . "employee_not_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_employee_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_employee/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Rejoin' href=" . base_url() . "employee_not_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									
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


	public function get_all_phd_course_work_data_ajax(){
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
		
		$document = $this->Research_model->get_phd_course_work_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				if($print->date_of_birth != "0000-00-00"){
					$sub_array[] = date("Y-m-d",strtotime($print->date_of_birth));
				}else{
					$sub_array[] = '';
				}
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->gender;
				$sub_array[] = $print->address;
				$sub_array[] = $print->country_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->pincode;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->schedule;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$sub_array[] = $print->date_of_registration;
				$sub_array[] = $print->payment_ammount;
				$sub_array[] = $print->payment_status=='0'?"Failed":"Success";
				$sub_array[] = empty($print->transaction_id)?"":$print->transaction_id;
				
				// if($print->status == "1"){
				// 	$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_employees class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
				// 					<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				// 					<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_employee_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>

				// 					<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_employee/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
				// 					<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "employee_not_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									
				// 					";
				// }else{
				// 	$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
				// 					<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_employees class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				// 					<a type='button' title='View Documents' data-toggle='tooltip' href=".base_url()."admin_employee_documents/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
				// 					<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add_employee/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
				// 					<a onclick=\"return confirm('Are you sure, you want to Update this record ?')\"' data-toggle='tooltip' title='Is Left' href=" . base_url() . "employee_not_left/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									
				// 					";
				// }
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_phd_course_work class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>";
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Research_model->get_phd_course_work_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	


	public function get_all_generated_result_ajax(){
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
          
			
        }
		
		$document = $this->Exam_model->get_all_generated_result_ajax($length,$start,$search);
		
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
			    if($print->added_show == "1"){
			        $added_by_name = $this->Exam_model->get_added_employee_data($print->added_by);
			    }else if($print->added_show == "2"){
			        $added_by_name = $this->Exam_model->get_added_center_data($print->added_by);
			    }
			    
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->examination_month;
				$sub_array[] = $print->examination_year;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->examination_status==0?"main":"reappear";
				
				//$sub_array[] = $print->added_show == '2'?$print->center_name:$print->employee_name;
				$sub_array[] = $added_by_name;

				if($print->result==0){
					$sub_array[] = "Pass";
				}
				else if($print->result==1){
					$sub_array[] = "Fail";
				}
				else if($print->result==2){
					$sub_array[] = "Reappear";
				}
				else{
					$sub_array[] = "Absent";
				}
				
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/".$print->id."/tbl_exam_results class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>";

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_all_generated_result_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_all_reregistered_student_success_ajax(){
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
          
			
        }
		
		$document = $this->Student_model->get_all_reregistered_student_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] =  $print->student_name;
				$sub_array[] =  $print->transaction_id;

				
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_mode==1?"Year":"Sem";
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->previous_year_sem;
				$sub_array[] = $print->current_year_sem;
				$sub_array[] = date("Y-m-d",strtotime($print->created_on));
				
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_re_registered_student class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>";

				
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_all_reregistered_student_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_all_reregistered_student_fail_ajax(){
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
          
			
        }
		
		$document = $this->Student_model->get_all_reregistered_student_failed_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;
				$sub_array[] =  "";

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_mode==1?"Year":"Sem";
				$sub_array[] = $print->center_name;

				$sub_array[] = $print->previous_year_sem;
				$sub_array[] = $print->current_year_sem==0?"":$print->current_year_sem;
				$sub_array[] = date("Y-m-d",strtotime($print->created_on));

				$sub_array[] = "<a data-toggle='tooltip' title='Edit' href=" . base_url() . "student_re_registration_edit/".$print->id."/".$print->student_id." class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>

				<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_re_registered_student class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>

				";
				
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_all_reregistered_student_failed_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}



	public function get_all_enrolled_student_admission_list(){
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
           
			
        }
		
		$document = $this->Separate_student_model->get_all_enrolled_student_admission_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;

				$sub_array[] = $print->id;

				$sub_array[] = $print->enrollment_number;  
				$sub_array[] = date("d/m/Y",strtotime($print->admission_date));  
				$sub_array[] = $print->center_name;
				
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				$sub_array[] = $print->mobile;
				
				$sub_array[] = $print->username;
				$sub_array[] = $print->password;
				
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
				}else if($print->course_mode == "3"){
					$sub_array[] = "Both";
					$mode = "Both";
				}
				


				$sub_array[] = $print->year_sem." ".$mode;
				$sub_array[] = $print->student_fees;
				$sub_array[] = $print->address; 
				$sub_array[] = $print->state; 
				
				
				$sub_array[] = "Aadhar Card";
				
				$sub_array[] = $print->id_number;
				if($print->identity_softcopy != ""){
					$sub_array[] = "<a data-toggle='tooltip' title='View Identity Softcopy' href=" . base_url() . "images/separate_student/" . $print->identity_softcopy . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = '';
				}
				$sub_array[] = "

				<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "student_addmission_form/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>

			

				<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_student class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									
				<a target='_blank' data-toggle='tooltip' title='show document' href=" . base_url('images/separate_student/'.$print->document) . " class='btn btn-danger btn-sm'>show document</a>
				
				<a  data-toggle='tooltip' title='Account Maintain' href=" . base_url('manage_separate_student_account/'.$print->id) . " class='btn btn-primary btn-sm'>Account</a>
				
				<a  data-toggle='tooltip' title='Re Registration' href=" . base_url('separate_student_re_registration/'.$print->id) . " class='btn btn-warning btn-sm'>Re-Reg.</a>
				";
				if($print->hold_login == "0"){
					$sub_array[] = "<a data-toggle='tooltip' title='Hold Login' href=" . base_url() . "hold-separate-login-single/" . $print->id . " class='btn btn-danger btn-sm'><i class='mdi mdi-silverware'></i></a>";
				}else{
					$sub_array[] = "<a data-toggle='tooltip' title='Activate Login' href=" . base_url() . "activate-separate-login-single/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi-checkbox-marked-circle-outline'></i></a>";
				}
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Separate_student_model->get_all_enrolled_student_admission_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
    
    public function get_all_document_verification_data(){
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
           
			
        }
		
		$document = $this->Exam_model->get_all_document_verification_data($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;

				$sub_array[] = $print->name;

				$sub_array[] = $print->address;

				
				$sub_array[] = $print->city;
				
				$sub_array[] = $print->pin_code;
				$sub_array[] = $print->mobile_number;
				$sub_array[] = $print->email;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->passing_year;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->query;
				$sub_array[] = $print->payment_status == 0?"failed":"success";
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;

				$sub_array[] = $print->created_on;
				$sub_array[] = '<a class="btn btn-primary" href="'.base_url('all_document_verification_detail_data/'.$print->id).'" >show all documents</a>';
				
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_all_document_verification_data_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_all_document_verification_detail_data(){
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
           
			
        }
		
		$document = $this->Exam_model->get_all_document_verification_detail_data($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;

				$sub_array[] = $print->document_name;
				$sub_array[] ='<a class="btn btn-success" href="'.base_url('uploads/document_verification/'.$print->document).'">show document</a>';

				
				$sub_array[] = $print->created_on;
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_all_document_verification_detail_data_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
    
    
	public function get_all_separate_student_generated_result_ajax(){
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
          
			
        }
		
		$document = $this->Separate_student_model->get_all_separate_student_generated_result_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->examination_month;
				$sub_array[] = $print->examination_year;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->examination_status==0?"main":"reappear";
				$sub_array[] = $print->center_name;

				if($print->result==0){
					$sub_array[] = "Pass";
				}
				else if($print->result==1){
					$sub_array[] = "Fail";
				}
				else if($print->result==2){
					$sub_array[] = "Reappear";
				}
				else{
					$sub_array[] = "Absent";
				}

				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_separate_student_exam_results class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
					
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/".$print->id."/tbl_separate_student_exam_results class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_separate_student_exam_results class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/".$print->id."/tbl_separate_student_exam_results class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
								}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Separate_student_model->get_all_separate_student_generated_result_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	
	
	
	public function get_all_panding_re_registration_student_list_ajax(){
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
          
			
        }
		
		// $document = $this->Student_model->get_all_panding_re_registration_student_list_ajax(10,0,$search);
		$document = $this->Student_model->get_all_panding_re_registration_student_list_ajax($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;
				$sub_array[] =  $print->father_name;
				$sub_array[] =  $print->mother_name;
				$sub_array[] =  $print->mobile;
				$sub_array[] =  $print->email;
				

	

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->course_mode==1?"Year":"Sem";
				$sub_array[] = $print->center_name;

		
				
				
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Student_model->get_all_panding_re_registration_student_list_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	
	
	public function get_all_migration_certificate_requests_list(){
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
          
			
        }
		
		
		$document = $this->Student_certificate_model->get_all_migration_certificate_requests_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				if($print->payment_status == "0"){
					$pay_status = "Failed";
					$approve = "";
				}else{
					$approve = "<a data-toggle='tooltip' title='verify' href=" . base_url() . "verify_student_migration_requests/" . $print->id ." class='btn btn-success btn-sm'>verify</a>";
					$pay_status = "Success";
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	
				$sub_array[] = $pay_status;	
				
				$sub_array[] = $approve."<a data-toggle='tooltip' title='Update' href=" . base_url() . "student_migration_certificate_add_requests/" . $print->id ." class='btn btn-warning btn-sm'>Update Details</a>
				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Student_certificate_model->get_all_migration_certificate_requests_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

		public function get_all_migration_certificates_list(){
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
          
			
        }
		
		
		$document = $this->Student_certificate_model->get_all_migration_certificates_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "
				<a onclick=\"return confirm('Are you sure, you want to delete this ?')\"' data-toggle='tooltip' title='Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_student_migration class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>  
				<a onclick=\"return confirm('Are you sure, you want to unverify this request?')\"' data-toggle='tooltip' title='unverify' href=" . base_url() . "unverify_student_migration_certificate/" . $print->id ." class='btn btn-success btn-sm'>unverify</a>";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Student_certificate_model->get_all_migration_certificates_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	 
	 public function get_all_transfer_certificate_requests_list(){
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
          
			
        }
		
		
		$document = $this->Student_certificate_model->get_all_transfer_certificate_requests_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "<a data-toggle='tooltip' title='verify' href=" . base_url() . "approved_student_certificate/" . $print->id ." class='btn btn-success btn-sm'>verify</a>";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Student_certificate_model->get_all_transfer_certificate_requests_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_all_appproved_student_transfer_certificate_list(){
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
          
			
        }
		
		
		$document = $this->Student_certificate_model->get_all_appproved_student_transfer_certificate_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this ?')\"' data-toggle='tooltip' title='Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_student_transfer class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a> 


				<a onclick=\"return confirm('Are you sure, you want to unapproved this request?')\"' data-toggle='tooltip' title='unverify' href=" . base_url() . "unapproved_student_transfer_certificate/" . $print->id ." class='btn btn-success btn-sm'>unapproved</a>
				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Student_certificate_model->get_all_appproved_student_transfer_certificate_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	
		public function get_all_student_recommendation_letter_requests_list(){
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
          
			
        }
		
		
		$document = $this->Student_certificate_model->get_all_student_recommendation_letter_requests_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "
				<a onclick=\"return confirm('Are you sure, you want to approved this request?')\"' data-toggle='tooltip' title='approve' href=" . base_url() . "approve_student_recommendation_letter/" . $print->id ." class='btn btn-success btn-sm'>Approved</a>
				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Student_certificate_model->get_all_student_recommendation_letter_requests_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}


	public function get_all_approved_student_recommendation_letter_list(){
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
          
			
        }
		
		
		$document = $this->Student_certificate_model->get_all_approved_student_recommendation_letter_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "
				
				<a onclick=\"return confirm('Are you sure, you want to delete this ?')\"' data-toggle='tooltip' title='Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_student_recommendation_letter class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a> 


				<a onclick=\"return confirm('Are you sure, you want to unapproved this request?')\"' data-toggle='tooltip' title='unverify' href=" . base_url() . "unapproved_student_recommendation_letter/" . $print->id ." class='btn btn-success btn-sm'>unapproved</a>


				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Student_certificate_model->get_all_approved_student_recommendation_letter_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
		public function get_all_student_degree_requests_list(){
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
        }
		
		
		$document = $this->Student_certificate_model->get_all_student_degree_requests_list($length,$start,$search);
        //print_r($document);exit();
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "


				<a data-toggle='tooltip' title='verify' href=" . base_url() . "approved_student_degree_request/" . $print->id ." class='btn btn-success btn-sm'>verify</a>	

				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Student_certificate_model->get_all_student_degree_requests_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}


	public function get_all_approved_student_degree_list(){
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
        }
		
		
		$document = $this->Student_certificate_model->get_all_approved_student_degree_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "
				
				<a onclick=\"return confirm('Are you sure, you want to delete this ?')\"' data-toggle='tooltip' title='Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_student_degree class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a> 


				<a onclick=\"return confirm('Are you sure, you want to unapproved this ?')\"' data-toggle='tooltip' title='unverify' href=" . base_url() . "unapproved_student_degree/" . $print->id ." class='btn btn-success btn-sm'>Unapprove</a>


				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Student_certificate_model->get_all_approved_student_degree_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	
	
	public function get_all_student_provisional_degree_requests_list(){
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
        }
		
		
		$document = $this->Student_certificate_model->get_all_student_provisional_degree_requests_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				if($print->payment_status == "0"){
					$payment_status = "Failed";
					$approved = "";
				}else{
					$payment_status = "Success";
					$approved = "<a data-toggle='tooltip' title='verify' href=" . base_url() . "approved_student_provisional_degrees/" . $print->id ." class='btn btn-success btn-sm'>verify</a>";
				}
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	
				$sub_array[] = $payment_status;	

				$sub_array[] = $approved."<a data-toggle='tooltip' title='verify' href=" . base_url() . "apply_student_provisional_degrees/" . $print->id ." class='btn btn-warning btn-sm'>Update Details</a>";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Student_certificate_model->get_all_student_provisional_degree_requests_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}


	public function get_all_approved_student_provisional_degrees_list(){
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
        }
		
		
		$document = $this->Student_certificate_model->get_all_approved_student_provisional_degrees_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "
				
				<a onclick=\"return confirm('Are you sure, you want to delete this ?')\"' data-toggle='tooltip' title='Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_student_provisional_degree class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a> 


				<a onclick=\"return confirm('Are you sure, you want to unapproved this ?')\"' data-toggle='tooltip' title='unverify' href=" . base_url() . "inactive/" . $print->id ."/tbl_student_provisional_degree class='btn btn-success btn-sm'>Unapprove</a>


				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Student_certificate_model->get_all_approved_student_provisional_degrees_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	
	// separate student work started form here

	public function get_all_separate_student_migration_certificate_requests_list(){
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
          
			
        }
		
		
		$document = $this->Separate_student_certificate_model->get_all_migration_certificate_requests_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "<a data-toggle='tooltip' title='verify' href=" . base_url() . "verify_separate_student_migration_requests/" . $print->id ." class='btn btn-success btn-sm'>verify</a>";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Separate_student_certificate_model->get_all_migration_certificate_requests_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}


	public function get_all_separate_student_migration_certificates_list(){
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
          
			
        }
		
		
		$document = $this->Separate_student_certificate_model->get_all_migration_certificates_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "
				<a onclick=\"return confirm('Are you sure, you want to delete this ?')\"' data-toggle='tooltip' title='Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_student_migration class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>  
				<a onclick=\"return confirm('Are you sure, you want to unverify this request?')\"' data-toggle='tooltip' title='unverify' href=" . base_url() . "unverify_separate_student_migration_certificate/" . $print->id ." class='btn btn-success btn-sm'>unverify</a>";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Separate_student_certificate_model->get_all_migration_certificates_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}



	public function get_all_seprate_student_transfer_certificate_requests_list(){
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
          
			
        }
		
		
		$document = $this->Separate_student_certificate_model->get_all_separate_student_transfer_certificate_requests_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "<a data-toggle='tooltip' title='verify' href=" . base_url() . "separate_student_transfer_certificate/" . $print->id ." class='btn btn-success btn-sm'>verify</a>";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Separate_student_certificate_model->get_all_separate_student_transfer_certificate_requests_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_all_appproved_separate_student_transfer_certificate_list(){
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
          
			
        }
		
		
		$document = $this->Separate_student_certificate_model->get_all_appproved_separate_student_transfer_certificate_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this ?')\"' data-toggle='tooltip' title='Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_student_transfer class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a> 


				<a onclick=\"return confirm('Are you sure, you want to unapproved this request?')\"' data-toggle='tooltip' title='unverify' href=" . base_url() . "unapproved_separate_student_transfer_certificate/" . $print->id ." class='btn btn-success btn-sm'>unapproved</a>
				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Separate_student_certificate_model->get_all_appproved_separate_student_transfer_certificate_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}



	public function get_all_separate_student_recommendation_letter_requests_list(){
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
          
			
        }
		
		
		$document = $this->Separate_student_certificate_model->get_all_separate_student_recommendation_letter_requests_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "
				<a onclick=\"return confirm('Are you sure, you want to approved this request?')\"' data-toggle='tooltip' title='approve' href=" . base_url() . "approve_separate_student_recommendation_letter/" . $print->id ." class='btn btn-success btn-sm'>Approved</a>
				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Separate_student_certificate_model->get_all_separate_student_recommendation_letter_requests_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_all_approved_separate_student_recommendation_letter_list(){
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
          
			
        }
		
		
		$document = $this->Separate_student_certificate_model->get_all_approved_separate_student_recommendation_letter_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "
				
				<a onclick=\"return confirm('Are you sure, you want to delete this ?')\"' data-toggle='tooltip' title='Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_student_recommendation_letter class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a> 


				<a onclick=\"return confirm('Are you sure, you want to unapproved this request?')\"' data-toggle='tooltip' title='unverify' href=" . base_url() . "unapproved_separate_student_recommendation_letter/" . $print->id ." class='btn btn-success btn-sm'>unapprove</a>


				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Separate_student_certificate_model->get_all_approved_separate_student_recommendation_letter_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_all_separate_student_degree_requests_list(){
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
        }
		
		
		$document = $this->Separate_student_certificate_model->get_all_separate_student_degree_requests_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "

				<a data-toggle='tooltip' title='verify' href=" . base_url() . "approved_separate_student_degree_request/" . $print->id ." class='btn btn-success btn-sm'>verify</a>

				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Separate_student_certificate_model->get_all_separate_student_degree_requests_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}


	public function get_all_approved_separate_student_degree_list(){
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
        }
		
		
		$document = $this->Separate_student_certificate_model->get_all_approved_separate_student_degree_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "
				
				<a onclick=\"return confirm('Are you sure, you want to delete this ?')\"' data-toggle='tooltip' title='Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_student_degree class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a> 


				<a onclick=\"return confirm('Are you sure, you want to unapproved this ?')\"' data-toggle='tooltip' title='unverify' href=" . base_url() . "unapproved_separate_student_degree/" . $print->id ." class='btn btn-success btn-sm'>Unapprove</a>


				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Separate_student_certificate_model->get_all_approved_separate_student_degree_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}


	public function get_all_separate_student_provisional_degree_requests_list(){
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
        }
		
		
		$document = $this->Separate_student_certificate_model->get_all_separate_student_provisional_degree_requests_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "

				<a data-toggle='tooltip' title='verify' href=" . base_url() . "separate_student_provisional_degrees/" . $print->id ." class='btn btn-success btn-sm'>verify</a>

				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Separate_student_certificate_model->get_all_separate_student_provisional_degree_requests_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}


	public function get_all_approved_separate_student_provisional_degrees_list(){
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
        }
		
		
		$document = $this->Separate_student_certificate_model->get_all_approved_separate_student_provisional_degrees_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->student_name;

				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = $print->amount;	
				$sub_array[] = $print->created_on;	

				$sub_array[] = "
				
				<a onclick=\"return confirm('Are you sure, you want to delete this ?')\"' data-toggle='tooltip' title='Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_student_provisional_degree class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a> 


				<a onclick=\"return confirm('Are you sure, you want to unapproved this ?')\"' data-toggle='tooltip' title='unverify' href=" . base_url() . "inactive/" . $print->id ."/tbl_separate_student_provisional_degree class='btn btn-success btn-sm'>Unapprove</a>


				";	
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Separate_student_certificate_model->get_all_approved_separate_student_provisional_degrees_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function get_cbd_all_complaint(){
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
        }
		
		
		$document = $this->Admin_model->get_cbd_all_complaint($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] =  $print->first_name.' '.$print->last_name;
				$sub_array[] = $print->gender;
				$sub_array[] = $print->student_teacher;
				$sub_array[] = $print->mobile_number;	
				$sub_array[] = $print->email;	
				$sub_array[] = $print->complaint;
				$sub_array[] = date("d-m-Y",strtotime($print->created_on));
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Admin_model->get_cbd_all_complaint_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_course_stream_subject_ajax(){
		$this->Center_model->get_course_stream_subject_ajax();
	}
	public function get_all_course_share_ajx(){
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
        }
		
		$document = $this->Center_model->get_all_course_share($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->share;	
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_center_subject_share class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_center_subject_share class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_center_course/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_center_subject_share class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_center_subject_share class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "manage_center_course/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Center_model->get_all_course_share_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_direct_success_payment_list(){
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
        }
		
		$document = $this->Admin_model->get_all_direct_success_payment_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				
				$sub_array[] = $print->registration_number;
				$sub_array[] = $print->name;
				$sub_array[] = $print->mobile_number;
				$sub_array[] = $print->email;
				if($print->pay_for == '1'){
					$sub_array[] = 'Registration Fees';	
				}else if($print->pay_for == '2'){
					$sub_array[] = 'Admission Fees';	
				}else{
					$sub_array[] = '';	
				}
				$sub_array[] = $print->amount;
				$sub_array[] = $print->payment_id;
				$sub_array[] = date("d-m-Y",strtotime($print->payment_date));
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Admin_model->get_all_direct_success_payment_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_direct_failed_payment_list(){
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
        }
		
		$document = $this->Admin_model->get_all_direct_failed_payment_list($length,$start,$search);
        
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->registration_number;
				$sub_array[] = $print->name;
				$sub_array[] = $print->mobile_number;
				$sub_array[] = $print->email;
				if($print->pay_for == '1'){
					$sub_array[] = 'Registration Fees';	
				}else if($print->pay_for == '2'){
					$sub_array[] = 'Admission Fees';	
				}else{
					$sub_array[] = '';	
				}
				$sub_array[] = $print->amount;
				$sub_array[] = date("d-m-Y",strtotime($print->payment_date));
				
				$data[] = $sub_array; 
			}
		}
		// print_r($data);exit;
		$TotalProducts = $this->Admin_model->get_all_direct_failed_payment_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_cancel_admission_list(){
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
		
		$document = $this->Student_model->get_all_cancel_admission_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$total_paid_amt = 0;
				$total_exam_amt = 0;
				
				$payable_amt = $this->Student_model->get_student_total_payable_fees($print->id);
				
				$paid_amt = $this->Student_model->get_student_paid_addmission_fees_ajax($print->id);
				$exam_amt = $this->Student_model->get_student_paid_exam_fees($print->id);
				
				if(!empty($paid_amt)){foreach($paid_amt as $paid_amt_result){
					$total_paid_amt = $total_paid_amt + $paid_amt_result->amount;
				}}
				
				if(!empty($exam_amt)){foreach($exam_amt as $exam_amt_result){
					$total_exam_amt = $total_exam_amt + $exam_amt_result->amount;
				}}
				
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
				$mode = "";
				if($print->course_mode == "1"){
					$sub_array[] = "Year";
					$mode = "Year";
				}else if($print->course_mode == "2"){
					$sub_array[] = "Semester";
					$mode = "Semester";
				}
				else if($print->course_mode == "3"){
					$sub_array[] = "both";
					$mode = "both";
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
				$sub_array[] = number_format($payable_amt,2);
				$sub_array[] = number_format($total_paid_amt,2);
				$sub_array[] = number_format($total_exam_amt,2);
				
				if($print->id_type == '1'){
					$sub_array[] = "Aadhar Card";
				}else if($print->id_type == '2'){
					$sub_array[] = "Passport";
				}else if($print->id_type == '3'){
					$sub_array[] = "Voter Id";
				}else{
					$sub_array[] = "";
				}
				$sub_array[] = $print->id_number;
				if($print->identity_softcopy != ""){
					$sub_array[] = "<a data-toggle='tooltip' title='View Identity Softcopy' href=" . base_url() . "images/student_identity_softcopy/" . $print->identity_softcopy . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = '';
				}
				
				$sub_array[] = $print->cancel_remark;
				
				/*$sub_array[] = "<a data-toggle='tooltip' title='Print Admission Form' href=" . base_url() . "print_admission_form/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-printer'></i></a>
				<a data-toggle='tooltip' title='View Qualifications' href=" . base_url() . "student_qualification/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
				<a data-toggle='tooltip' title='Print ID Card' href=" . base_url() . "admin_print_id/" . $print->id . " target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-printer'></i></a>
				<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a type='button' title='Accounts' data-toggle='tooltip' href=" . base_url() . "manage_student_account/".$print->id."  class='btn btn-success btn-sm'><i class='mdi-credit-card'></i></a>
				<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_student class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick='cancel_student(".$print->id.")'>Cancel</button>					
				";*/
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_all_cancel_admission_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
	}
	
	public function get_all_approve_guide_application(){
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
		
		$document = $this->Research_model->get_all_approve_guide_application($length,$start,$search);
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
				$sub_array[] = $print->password;
				$sub_array[] = $print->gender;
				$sub_array[] = $print->address;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->country_name;
				$sub_array[] = $print->pincode;

				$sub_array[] = $print->specilisation;
				$sub_array[] = $print->remark;
				$sub_array[] = $print->research_area;
				$sub_array[] = $print->employement_type;
				$sub_array[] = $print->work_experience;
				$sub_array[] = $print->present_working;
				$sub_array[] = "<img src='".base_url('images/guide_pic/'.$print->photo)."' height='100' width='100'> ";

				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_guide_application class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>
									<a data-toggle='tooltip' title='Documents' href=" . base_url() . "guide_documents/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "guide_application_update/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='View Appointment Letter' data-toggle='tooltip' href=" . base_url() . "view-supervisors-appointment-letter/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-certificate'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_guide_application class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a data-toggle='tooltip' title='Documents' href=" . base_url() . "guide_documents/" . $print->id . " class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "guide_application_update/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a type='button' title='View Appointment Letter' data-toggle='tooltip' href=" . base_url() . "view-supervisors-appointment-letter/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-certificate'></i></a>
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Research_model->get_all_approve_guide_application_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_stream_subject_ajax(){
		$this->Exam_model->get_stream_subject_ajax();
	}
	public function get_all_phd_subject_questions_ajax(){
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
        }
		
		$document = $this->Exam_model->get_all_phd_subject_questions($length,$start,$search);
		
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$test_data = json_decode($print->text_data);
				
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->print_name;
				$sub_array[] = $print->stream_name;
				// $sub_array[] = $print->subject_name;
				$sub_array[] = $test_data->options->question;
				$sub_array[] = $test_data->options->options[0];
				$sub_array[] = $test_data->options->options[1];
				$sub_array[] = $test_data->options->options[2];
				$sub_array[] = $test_data->options->options[3];
				$sub_array[] = $test_data->options->selected_ans;
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_question_ans class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_phd_subject_question/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_question_ans class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_question_ans class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_phd_subject_question/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_question_ans class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_all_phd_subject_questions_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_stream_course_work_exam_list_ajax(){
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
		
		$document = $this->Exam_model->get_stream_course_work_exam_list_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->exam_name;
				$sub_array[] = $print->exam_duration;
				$sub_array[] = $print->no_of_question;
				$sub_array[] = date("d-m-Y",strtotime($print->exam_date));
				$sub_array[] = $print->start_time."-".$print->end_time;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_course_work_exam class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_work_exam class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>

									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "course_work_exam/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a 'data-toggle='tooltip' title='Add Bulk Question' href=" . base_url() . "add_course_work_exam_question/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									
									
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_course_work_exam class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_work_exam class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "course_work_exam/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a 'data-toggle='tooltip' title='Add Bulk Question' href=" . base_url() . "add_course_work_exam_question/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									
									
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_stream_course_work_exam_list_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_common_course_work_exam_list_ajax(){
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
		
		$document = $this->Exam_model->get_common_course_work_exam_list_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->course_name;
				// if($print->exam_type == "1"){
				// 	$sub_array[] = "Common";
				// }else{
				// 	$sub_array[] = "Stream Wise";
				// }
				$sub_array[] = $print->exam_name;
				$sub_array[] = $print->exam_duration;
				$sub_array[] = $print->no_of_question;
				$sub_array[] = date("d-m-Y",strtotime($print->exam_date));
				$sub_array[] = $print->start_time."-".$print->end_time;
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_course_work_exam class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_work_exam class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									

									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "course_work_exam/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a 'data-toggle='tooltip' title='Add Bluk Question' href=" . base_url() . "add_course_work_exam_question/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									
									
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_course_work_exam class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_work_exam class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "course_work_exam/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a 'data-toggle='tooltip' title='Add Bulk Question' href=" . base_url() . "add_course_work_exam_question/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-login'></i></a>
									
									
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_common_course_work_exam_list_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_course_work_stream_wise_question(){
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
        }
		
		$document = $this->Exam_model->get_course_work_stream_wise_question($length,$start,$search);
		
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$test_data = json_decode($print->text_data);
				
				$sub_array = array();
				$sub_array[] = $zz++;
				// $sub_array[] = $print->course_name;
				// $sub_array[] = $print->stream_name;
				// $sub_array[] = $print->subject_name;
				$sub_array[] = $test_data->options->question;
				$sub_array[] = $test_data->options->options[0];
				$sub_array[] = $test_data->options->options[1];
				$sub_array[] = $test_data->options->options[2];
				$sub_array[] = $test_data->options->options[3];
				$sub_array[] = $test_data->options->selected_ans;
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_course_work_question class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_course_work_question/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_course_work_question class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_course_work_question/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_course_work_stream_wise_question_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_course_work_common_question(){
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
        }
		
		$document = $this->Exam_model->get_course_work_common_question($length,$start,$search);
		
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$test_data = json_decode($print->text_data);
				
				$sub_array = array();
				$sub_array[] = $zz++;
				// $sub_array[] = $print->course_name;
				// $sub_array[] = $print->subject_name;
				$sub_array[] = $test_data->options->question;
				$sub_array[] = $test_data->options->options[0];
				$sub_array[] = $test_data->options->options[1];
				$sub_array[] = $test_data->options->options[2];
				$sub_array[] = $test_data->options->options[3];
				$sub_array[] = $test_data->options->selected_ans;
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_course_work_question class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_course_work_question/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_course_work_question class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_course_work_question/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_course_work_common_question_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	 // *************************shubham code *************************	*/

	public function get_phd_course_work_list_success(){
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
		
		$document = $this->Research_model->get_phd_course_work_list_success($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				if($print->date_of_birth != "0000-00-00"){
					$sub_array[] = date("Y-m-d",strtotime($print->date_of_birth));
				}else{
					$sub_array[] = '';
				}
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->gender;
				$sub_array[] = $print->address;
				$sub_array[] = $print->country_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->pincode;
				
				$sub_array[] = $print->schedule;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->date_of_registration;
				$sub_array[] = $print->payment_ammount;
				$sub_array[] = $print->payment_status=='0'?"Failed":"Success";
				$sub_array[] = empty($print->transaction_id)?"":$print->transaction_id;
				
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_phd_course_work class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_phd_course_work class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to approve this record ?')\"' title='Approve' data-toggle='tooltip' href=".base_url()."approve_course_work_registration/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									
									";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_phd_course_work class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_phd_course_work class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to approve this record ?')\"' title='Approve' data-toggle='tooltip' href=".base_url()."approve_course_work_registration/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									";
				}
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_phd_course_work class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>";
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Research_model->get_phd_course_work_list_success_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}


	public function get_phd_course_work_list_fail(){
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
		
		$document = $this->Research_model->get_phd_course_work_list_fail($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				if($print->date_of_birth != "0000-00-00"){
					$sub_array[] = date("Y-m-d",strtotime($print->date_of_birth));
				}else{
					$sub_array[] = '';
				}
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->gender;
				$sub_array[] = $print->address;
				$sub_array[] = $print->country_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->pincode;
				$sub_array[] = $print->schedule;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->date_of_registration;
				$sub_array[] = $print->payment_ammount;
				$sub_array[] = $print->payment_status=='0'?"Failed":"Success";
				$sub_array[] = empty($print->transaction_id)?"":$print->transaction_id;
				
				
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_phd_course_work class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a> 
			        <a type='button' title='update_payment' data-toggle='tooltip' href=".base_url()."course_work_update_payment/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-login'></i></a>";
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Research_model->get_phd_course_work_list_fail_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_phd_course_work_list_approved(){
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
		
		$document = $this->Research_model->get_phd_course_work_list_approved($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){

				$this->db->where('is_deleted','0'); 
				$this->db->where('student_id',$print->registration_id); 
				$exist = $this->db->get('tbl_course_work_result');
				$exist = $exist->row();
				if(empty($exist)){
				$result_link = "<a title='Generate Result' data-toggle='tooltip' href=".base_url()."generate_course_work_result/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi-checkbox-multiple-marked-circle'></i></a>
									";
					}else{
						$result_link = "";
					}	

				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->username;
				$sub_array[] = $print->password;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->father_name;
				$sub_array[] = $print->mother_name;
				if($print->date_of_birth != "0000-00-00"){
					$sub_array[] = date("Y-m-d",strtotime($print->date_of_birth));
				}else{
					$sub_array[] = '';
				}
				$sub_array[] = $print->mobile;
				$sub_array[] = $print->email;
				$sub_array[] = $print->gender;
				$sub_array[] = $print->address;
				$sub_array[] = $print->country_name;
				$sub_array[] = $print->state_name;
				$sub_array[] = $print->city_name;
				$sub_array[] = $print->pincode;
			
				$sub_array[] = $print->schedule;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
				$sub_array[] = $print->year_sem;
				$sub_array[] = $print->center_name;
				$sub_array[] = $print->date_of_registration;
				$sub_array[] = $print->payment_ammount;
				$sub_array[] = $print->payment_status=='0'?"Failed":"Success";
				$sub_array[] = empty($print->transaction_id)?"":$print->transaction_id;
				
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_phd_course_work class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_phd_course_work class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to disapprove this record ?')\"' title='Disapprove' data-toggle='tooltip' href=".base_url()."disapprove_course_work_registration/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									
									".$result_link;
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_phd_course_work class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_phd_course_work class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to disapprove this record ?')\"' title='Disapprove' data-toggle='tooltip' href=".base_url()."disapprove_course_work_registration/".$print->id."  class='reset btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>
									
									".$result_link;
				}
					
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Research_model->get_phd_course_work_list_approved_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_unique_transaction_for_tbl_course_work(){
		$this->Research_model->get_unique_transaction_for_tbl_course_work();
	}
	public function get_phd_course_work_exam_appeared_list(){
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
		
		$document = $this->Research_model->get_phd_course_work_exam_appeared_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->exam_name;
				$sub_array[] = $print->score;
				$sub_array[] = date('d-m-Y',strtotime($print->exam_date));
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_work_exam_student class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				<a  data-toggle='tooltip' title='View Answer Book' href=" . base_url() . "course_work_answer_book/" . $print->id . " class='btn btn-primary btn-sm'><i class='mdi mdi-eye'></i></a>
				"; 
			        
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Research_model->get_phd_course_work_exam_appeared_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_student_transcript_certificate_failed(){
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
		
		$document = $this->Student_certificate_model->get_student_transcript_certificate_failed($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;  
				$sub_array[] = date('d-m-Y',strtotime($print->payment_date));
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_transcript class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				<a  data-toggle='tooltip' title='Edit Transcript' href=" . base_url() . "edit_transcript/" . $print->id . " class='btn btn-primary btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a  data-toggle='tooltip' title='Payment Update' href=" . base_url() . "update_transcript_payment/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-credit-card'></i></a>
				"; 
			        
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_certificate_model->get_student_transcript_certificate_failed_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function get_student_transcript_certificate_success(){
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
		
		$document = $this->Student_certificate_model->get_student_transcript_certificate_success($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = date('d-m-Y',strtotime($print->payment_date));
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_transcript class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				<a  data-toggle='tooltip' title='Edit Transcript' href=" . base_url() . "edit_transcript/" . $print->id . " class='btn btn-primary btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a  data-toggle='tooltip' title='Payment Update' href=" . base_url() . "update_transcript_payment/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-credit-card'></i></a>
				<a  data-toggle='tooltip'  title='Approve Now' href=" . base_url() . "approve_transcript/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi mdi-login'></i></a>
				"; 
			        
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_certificate_model->get_student_transcript_certificate_success_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_student_transcript_certificate_approved(){
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
		
		$document = $this->Student_certificate_model->get_student_transcript_certificate_approved($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = date('d-m-Y',strtotime($print->payment_date));
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_transcript class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				<a  data-toggle='tooltip' title='Edit Transcript' href=" . base_url() . "edit_transcript/" . $print->id . " class='btn btn-primary btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a  data-toggle='tooltip' title='Payment Update' href=" . base_url() . "update_transcript_payment/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-credit-card'></i></a>
				<a  data-toggle='tooltip' onclick=\"return confirm('Are you sure, you want to un approve this record permanently?')\"'   title='Un Approve Now' href=" . base_url() . "disapprove_transcript/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi mdi-login'></i></a>
				"; 
			        
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_certificate_model->get_student_transcript_certificate_approved_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function get_s_student_transcript_certificate_failed(){
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
		
		$document = $this->Separate_student_certificate_model->get_student_transcript_certificate_failed($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;  
				$sub_array[] = date('d-m-Y',strtotime($print->payment_date));
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_transcript class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				<a  data-toggle='tooltip' title='Edit Transcript' href=" . base_url() . "s_edit_transcript/" . $print->id . " class='btn btn-primary btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a  data-toggle='tooltip' title='Payment Update' href=" . base_url() . "s_update_transcript_payment/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-credit-card'></i></a>
				"; 
			        
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Separate_student_certificate_model->get_student_transcript_certificate_failed_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function get_s_student_transcript_certificate_success(){
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
		
		$document = $this->Separate_student_certificate_model->get_student_transcript_certificate_success($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = date('d-m-Y',strtotime($print->payment_date));
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_transcript class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				<a  data-toggle='tooltip' title='Edit Transcript' href=" . base_url() . "s_edit_transcript/" . $print->id . " class='btn btn-primary btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a  data-toggle='tooltip' title='Payment Update' href=" . base_url() . "s_update_transcript_payment/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-credit-card'></i></a>
				<a  data-toggle='tooltip'   title='Approve Now' href=" . base_url() . "s_approve_transcript/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi mdi-login'></i></a>
				"; 
			        
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Separate_student_certificate_model->get_student_transcript_certificate_success_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_s_student_transcript_certificate_approved(){
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
		
		$document = $this->Separate_student_certificate_model->get_student_transcript_certificate_approved($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->enrollment_number;
				$sub_array[] = $print->transaction_id;
				$sub_array[] = date('d-m-Y',strtotime($print->payment_date));
				$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_transcript class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
				<a  data-toggle='tooltip' title='Edit Transcript' href=" . base_url() . "s_edit_transcript/" . $print->id . " class='btn btn-primary btn-sm'><i class='mdi mdi-table-edit'></i></a>
				<a  data-toggle='tooltip' title='Payment Update' href=" . base_url() . "s_update_transcript_payment/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi-credit-card'></i></a>
				<a  data-toggle='tooltip' onclick=\"return confirm('Are you sure, you want to un approve this record permanently?')\"'   title='Un Approve Now' href=" . base_url() . "s_disapprove_transcript/" . $print->id . " class='btn btn-warning btn-sm'><i class='mdi mdi mdi-login'></i></a>
				"; 
			        
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Separate_student_certificate_model->get_student_transcript_certificate_approved_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_seo_setup_list(){
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
		$document = $this->Admin_model->get_seo_setup_list($length,$start,$search);
		 
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    ";
				$sub_array[] = $print->url;
				$sub_array[] = $print->meta_title;
				$sub_array[] = $print->keyword;
				$sub_array[] = $print->meta_description;
				
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_seo_title class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_seo_title class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "seo_registration/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_seo_title class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_seo_title class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "seo_registration/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Admin_model->get_seo_setup_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();

	}
	public function get_new_thesis_list(){
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
		$document = $this->Student_model->get_new_thesis_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = $print->thesis_title;
				$sub_array[] = $print->paper_journal1;
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/thesis/".$print->softcopy."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_thesis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_thesis/".$print->id."  class='btn btn-info btn-sm  btn-primary' title='Edit'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_thesis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_thesis/".$print->id."  class='btn btn-info btn-sm' title='Edit'><i class='mdi mdi-table-edit'></i></a>";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_new_thesis_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_complete_thesis_list(){
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
		$document = $this->Student_model->get_complete_thesis_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = $print->thesis_title;
				$sub_array[] = $print->paper_journal1;
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/thesis/".$print->softcopy."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_thesis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_thesis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_complete_thesis_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_new_separate_thesis_list(){
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
		$document = $this->Separate_student_certificate_model->get_new_separate_thesis_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = $print->thesis_title;
				$sub_array[] = $print->paper_journal1;
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/thesis/".$print->softcopy."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_seprate_thesis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_separate_thesis/".$print->id."  class='btn btn-info btn-sm  btn-primary' title='Edit'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_seprate_thesis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_separate_thesis/".$print->id."  class='btn btn-info btn-sm' title='Edit'><i class='mdi mdi-table-edit'></i></a>";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Separate_student_certificate_model->get_new_separate_thesis_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_separate_complete_thesis_list(){
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
		$document = $this->Separate_student_certificate_model->get_separate_complete_thesis_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = $print->thesis_title;
				$sub_array[] = $print->paper_journal1;
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/thesis/".$print->softcopy."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_seprate_thesis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_separate_thesis/".$print->id."  class='btn btn-info btn-sm' title='Edit'><i class='mdi mdi-table-edit'></i></a>
									";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_seprate_thesis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_separate_thesis/".$print->id."  class='btn btn-info btn-sm' title='Edit'><i class='mdi mdi-table-edit'></i></a>
									";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Separate_student_certificate_model->get_separate_complete_thesis_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_new_synopsis_list(){
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
		$document = $this->Student_model->get_new_synopsis_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				 
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = $print->thesis_title;
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/thesis/".$print->soft_copy."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_synopsis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_synopsis/".$print->id."  class='btn btn-info btn-sm  btn-primary' title='Edit'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_synopsis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_synopsis/".$print->id."  class='btn btn-info btn-sm' title='Edit'><i class='mdi mdi-table-edit'></i></a>";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_new_synopsis_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_complete_synopsis_list(){
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
		$document = $this->Student_model->get_complete_synopsis_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = $print->thesis_title;
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/thesis/".$print->softcopy."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>
				<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_synopsis/".$print->id."  class='btn btn-info btn-sm  btn-primary' title='Edit'><i class='mdi mdi-table-edit'></i></a>";
				
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_synopsis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_synopsis/".$print->id."  class='btn btn-info btn-sm  btn-primary' title='Edit'><i class='mdi mdi-table-edit'></i></a>
									";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_synopsis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_complete_synopsis_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_new_separate_synopsis_list(){
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
		$document = $this->Separate_student_certificate_model->get_new_separate_synopsis_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = $print->thesis_title;
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/thesis/".$print->soft_copy."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_synopsis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_separate_synopsis/".$print->id."  class='btn btn-info btn-sm  btn-primary' title='Edit'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_synopsis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_separate_synopsis/".$print->id."  class='btn btn-info btn-sm' title='Edit'><i class='mdi mdi-table-edit'></i></a>";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Separate_student_certificate_model->get_new_separate_synopsis_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_separate_complete_synopsis_list(){
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
		$document = $this->Separate_student_certificate_model->get_separate_complete_synopsis_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = $print->thesis_title;
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/thesis/".$print->softcopy."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_synopsis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_separate_synopsis/".$print->id."  class='btn btn-info btn-sm' title='Edit'><i class='mdi mdi-table-edit'></i></a>
									";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_synopsis class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "update_separate_synopsis/".$print->id."  class='btn btn-info btn-sm' title='Edit'><i class='mdi mdi-table-edit'></i></a>
									";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Separate_student_certificate_model->get_separate_complete_synopsis_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_course_work_result_list(){
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
		
		$document = $this->Exam_model->get_course_work_result_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				if($print->issue_status == "1"){ 
					$issue_status = "Yes";
				}else{ 
					$issue_status = "No";
				}
				if($print->review_report != ""){ 
					$review_report = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/course/".$print->review_report."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				
				}else{ 
					$review_report = "NA";
				}
				
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->attending_status;
				$sub_array[] = $print->issue_date;
				$sub_array[] = $issue_status;
				$sub_array[] = $review_report;
				if($print->status == "1"){
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_work_result class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='print' target='_blank' data-toggle='tooltip' href=" . base_url() . "print_course_work_marksheet/".$print->id."  class='btn btn-info btn-sm  btn-primary' title='Edit'><i class='mdi-printer-alert'></i></a>


									
									";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_course_work_result class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='print' target='_blank' data-toggle='tooltip' href=" . base_url() . "print_course_work_marksheet/".$print->id."  class='btn btn-info btn-sm  btn-primary' title='Edit'><i class='mdi-printer-alert'></i></a>
									
									
									";
				}
					
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Exam_model->get_course_work_result_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_selected_state_city(){
		$this->Faculty_model->get_selected_state_city();
	}
	public function get_all_online_class_meet(){
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
		
		$document = $this->Faculty_model->get_all_online_class_meet($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){ 
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->title;
				$sub_array[] = $print->timie_duration;
				$sub_array[] = $print->course_name;
				$sub_array[] = date("d-m-Y",strtotime($print->created_on));
				$sub_array[] = $print->description;	
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Faculty_model->get_all_online_class_meet_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_abstract_report_list(){
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
		$document = $this->Student_model->get_abstract_report_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/abstract/".$print->upload_report."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				$sub_array[] = $print->remark;
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_abstract class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_abstract class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_abstract_report_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_progress_report_list(){
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
		$document = $this->Student_model->get_progress_report_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/progress_report/".$print->progress_report."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				$sub_array[] = $print->remark;
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_progress_report class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_progress_report class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Student_model->get_progress_report_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_separate_abstract_report_list(){
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
		$document = $this->Separate_student_model->get_separate_abstract_report_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/abstract/".$print->upload_report."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				$sub_array[] = $print->remark;
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_abstract class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_abstract class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Separate_student_model->get_separate_abstract_report_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_separate_progress_report_list(){
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
		$document = $this->Separate_student_model->get_separate_progress_report_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = "<a type='button' title='view' target= 'blank' data-toggle='tooltip' href=" . base_url() . "images/abstract/".$print->progress_report."  class='btn btn-info btn-sm  btn-primary' title='view'><i class='mdi mdi-eye'></i></a>";
				$sub_array[] = $print->remark;
				if($print->status == "1"){
					$sub_array[] = "  
									<a onclick=\"return confirm('Are you sure, you want to delete this record?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_progress_report class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}else{
					$sub_array[] = "
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_separate_progress_report class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Separate_student_model->get_separate_progress_report_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}

	public function get_all_images_ajax(){
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
		$valid_columns = $this->db->list_fields('tbl_university_activity_image');
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
		$document = $this->News_model->get_all_image_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->image_title;				
				if($print->file !=""){
					$sub_array[] = "<a type='button' target='_blank' title='View' data-toggle='tooltip' href=" . base_url() . "images/university_activity/images/".$print->file."  class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = "";
				}
				
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_university_activity_image class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_university_activity_image class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "university_activity/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_university_activity_image class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_university_activity_image class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "university_activity/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->News_model->get_all_image_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	
	
	public function get_all_video_ajax(){
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
		$valid_columns = $this->db->list_fields('tbl_university_activity_video');
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
		$document = $this->News_model->get_all_video_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->video_tiltle;				
				if($print->file !=""){
					$sub_array[] = "<a type='button' target='_blank' title='View' data-toggle='tooltip' href=" . base_url() . "images/university_activity/video/".$print->file."  class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>";
				}else{
					$sub_array[] = "";
				}
				
				if($print->status == "1"){
					$sub_array[] = "Active";
				}else{
					$sub_array[] = "Inactive";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" . $print->id . "/tbl_university_activity_video class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_university_activity_video class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "university_activity/".$print->id."/video  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_university_activity_video class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_university_activity_video class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "university_activity/".$print->id."/video  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}
				
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->News_model->get_all_video_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_assigned_scholar_ajax(){
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
		$document = $this->Research_model->get_all_assigned_scholar_ajax($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->name;				
				$sub_array[] = $print->guide_mobile;				
				$sub_array[] = $print->student_name;				
				$sub_array[] = $print->mobile;				
				$sub_array[] = $print->enrollment_number;				 
				$sub_array[] = $print->stream_name;				 
				$sub_array[] = $print->session_name;				 
				$sub_array[] = "<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "assigned_guide_to_scholar/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				 
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Research_model->get_all_assigned_scholar_ajax_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_stream_name_course(){
		$this->Admin_model->get_stream_name_course();
	}
	public function get_subject_name_stream(){
		$this->Admin_model->get_subject_name_stream();
	}
	public function get_student_details(){
		$this->Student_certificate_model->get_student_details();
	}
	public function get_seprate_student_details(){
		$this->Separate_student_certificate_model->get_student_details();
	}
	public function get_all_pr_list(){
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
		$document = $this->Admin_model->get_all_pr_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->date_of_payment;				
				$sub_array[] = $print->registration_id;				
				$sub_array[] = $print->name;				
				$sub_array[] = $print->mobile_number;				
				$sub_array[] = $print->email;				
				$sub_array[] = $print->pay_for;				
				$sub_array[] = $print->amount;				 
				$sub_array[] = $print->transaction_id;				 
				$sub_array[] = $print->collected_by;				 
				$sub_array[] = $print->payment_mode;				 
				$sub_array[] = "<a type='button' title='Print' target='_blank' data-toggle='tooltip' href=" . base_url() . "print_cash_receipt/".base64_encode($print->id)."  class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>";
				 
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Admin_model->get_all_pr_list_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_logs_ajax(){
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
		$document = $this->Admin_model->get_all_logs($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->employee_code;				
				$sub_array[] = $print->first_name.' '.$print->last_name;				
				$sub_array[] = $print->description;				 
				$sub_array[] = date("d/m/Y H:i A",strtotime($print->created_on));				 
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Admin_model->get_all_logs_count($search);
		$output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	
	public function get_name_student(){
		$this->Consolidated_model->get_name_student();
	}
	public function get_consolidate_list(){
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
		$document = $this->Consolidated_model->get_consolidate_list($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = $print->enrollment;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
					if($print->status == "1"){
					$sub_array[] = "  
								<a type='button' title='Marksheet Print' data-toggle='tooltip' href=" . base_url() . "marksheet_print_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-printer'></i></a>
								<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "edit_consolidate/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "
								<a type='button' title='Marksheet Print' data-toggle='tooltip' href=" . base_url() . "marksheet_print_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-printer'></i></a>
								<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "edit_consolidate/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Consolidated_model->get_consolidate_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_name_separate_student(){
		$this->Consolidated_model->get_name_separate_student();
	}
	public function get_consolidate_list_separate_student(){
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
		$document = $this->Consolidated_model->get_consolidate_list_separate_student($length,$start,$search);
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();

				$sub_array[] = $zz++ ."    <span ><i class='fa fa-plus'></i></span>";
				$sub_array[] = $print->enrollment;
				$sub_array[] = $print->student_name;
				$sub_array[] = $print->course_name;
				$sub_array[] = $print->stream_name;
					if($print->status == "1"){
					$sub_array[] = "  
								<a type='button' title='Marksheet Print' data-toggle='tooltip' href=" . base_url() . "marksheet_print_separate_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-printer'></i></a>
								<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "edit_consolidate_separate_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}else{
					$sub_array[] = "
								<a type='button' title='Marksheet Print' data-toggle='tooltip' href=" . base_url() . "marksheet_print_separate_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-printer'></i></a>
								<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "edit_consolidate_separate_student/".$print->id."  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>";
				}

				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Consolidated_model->get_consolidate_list_separate_student_count($search);
		
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
