<?php
class Ajax_controller extends CI_Controller{

	public function get_exist_registered_email(){
		$this->Admin_model->get_exist_registered_email();
	}
	public function get_exist_mobile_number(){
		$this->Admin_model->get_exist_mobile_number();
	}
	public function get_exist_aadhar_no(){
		$this->Admin_model->get_exist_aadhar_no();
	}
	public function get_exist_pancard_no(){
		$this->Admin_model->get_exist_pancard_no();
	}
	public function get_city_ajax(){
		$this->Admin_model->get_city_ajax();
	} 
    public function get_all_renewal_after_15days_list(){
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
		$document = $this->Admin_model->get_all_renewal_after_15days_list($length,$start,$search);
		
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->agent_code;
				$sub_array[] = $print->name;
				$sub_array[] = $print->policy_number;
				if($print->aadhar_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/policy_copy/".$print->policy_copy.">View Policy Copy</a>";
				}else{
					$sub_array[] = "";
				}
                $sub_array[] = $print->start_date;
				$sub_array[] = $print->end_date;
                $sub_array[] = $print->tpa;
				$sub_array[] = $print->tpa_name;
				$sub_array[] = $print->number_of_policy_year;
				$sub_array[] = $print->insureds_pan;
                $sub_array[] = $print->insureds_aadhar;
				if($print->aadhar_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/insureds_aadhar/".$print->aadhar_upload.">View aadhar Copy</a>";
				}else{
					$sub_array[] = "";
				}
				if($print->pan_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/pan_upload/".$print->pan_upload.">View pancard Copy</a>";
				}else{
					$sub_array[] = "";
				}
				if($print->insured_photo != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/insured_photo/".$print->insured_photo.">View insured Copy</a>";
				}else{
					$sub_array[] = "";
				}
				$sub_array[] = $print->premium_rs;
                $sub_array[] = $print->gender; 
               
                
                
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" .$print->id ."/tbl_policy class='btn btn-success btn-sm inactive_record'><i class='fas fa-times-circle'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm delete_record'><i class='fas fa-trash-alt'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add-policy/".$print->id."  class='btn btn-success btn-sm'><i class='fas fa-pen'></i></a>   ";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm active_record'><i class='fas fa-times-circle'></i></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm delete_record'><i class='fas fa-trash-alt'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add-policy/".$print->id."  class='btn btn-success btn-sm'><i class='fas fa-pen'></i></a>";
				}
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Admin_model->get_all_renewal_after_15days_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
    public function get_all_policy_lists(){
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
		$document = $this->Admin_model->get_all_policy_lists($length,$start,$search);
		
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->agent_code;
				$sub_array[] = $print->name;
				$sub_array[] = $print->policy_number;
				if($print->aadhar_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/policy_copy/".$print->policy_copy.">View Policy Copy</a>";
				}else{
					$sub_array[] = "";
				}
                $sub_array[] = $print->start_date;
				$sub_array[] = $print->end_date;
                $sub_array[] = $print->tpa;
				$sub_array[] = $print->tpa_name;
				$sub_array[] = $print->number_of_policy_year;
				$sub_array[] = $print->insureds_pan;
                $sub_array[] = $print->insureds_aadhar;
				if($print->aadhar_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/insureds_aadhar/".$print->aadhar_upload.">View aadhar Copy</a>";
				}else{
					$sub_array[] = "";
				}
				if($print->pan_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/pan_upload/".$print->pan_upload.">View pancard Copy</a>";
				}else{
					$sub_array[] = "";
				}
				if($print->insured_photo != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/insured_photo/".$print->insured_photo.">View insured Copy</a>";
				}else{
					$sub_array[] = "";
				}
				$sub_array[] = $print->premium_rs;
                $sub_array[] = $print->gender; 
               
                
                
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" .$print->id ."/tbl_policy class='btn btn-success btn-sm inactive_record'><i class='fas fa-times-circle'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm delete_record'><i class='fas fa-trash-alt'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add-policy/".$print->id."  class='btn btn-success btn-sm'><i class='fas fa-pen'></i></a>   ";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm active_record'><i class='fas fa-times-circle'></i></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm delete_record'><i class='fas fa-trash-alt'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add-policy/".$print->id."  class='btn btn-success btn-sm'><i class='fas fa-pen'></i></a>";
				}
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Admin_model->get_all_policy_lists_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
    public function get_all_renewal_after_30days_list(){
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
		$document = $this->Admin_model->get_all_renewal_after_30days_list($length,$start,$search);
		
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->agent_code;
				$sub_array[] = $print->name;
				$sub_array[] = $print->policy_number;
				if($print->aadhar_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/policy_copy/".$print->policy_copy.">View Policy Copy</a>";
				}else{
					$sub_array[] = "";
				}
				$sub_array[] = $print->start_date;
				$sub_array[] = $print->end_date;
                $sub_array[] = $print->tpa;
				$sub_array[] = $print->tpa_name;
				$sub_array[] = $print->number_of_policy_year;
				$sub_array[] = $print->insureds_pan;
                $sub_array[] = $print->insureds_aadhar;
				if($print->aadhar_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/insureds_aadhar/".$print->aadhar_upload.">View aadhar Copy</a>";
				}else{
					$sub_array[] = "";
				}
				if($print->pan_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/pan_upload/".$print->pan_upload.">View pancard Copy</a>";
				}else{
					$sub_array[] = "";
				}
				if($print->insured_photo != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/insured_photo/".$print->insured_photo.">View insured Copy</a>";
				}else{
					$sub_array[] = "";
				}
				$sub_array[] = $print->premium_rs;
                $sub_array[] = $print->gender; 
                
                
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" .$print->id ."/tbl_policy class='btn btn-success btn-sm inactive_record'><i class='fas fa-times-circle'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm delete_record'><i class='fas fa-trash-alt'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add-policy/".$print->id."  class='btn btn-success btn-sm'><i class='fas fa-pen'></i></a>   ";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm active_record'><i class='fas fa-times-circle'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm delete_record'><i class='fas fa-trash-alt'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add-policy/".$print->id."  class='btn btn-success btn-sm'><i class='fas fa-pen'></i></a>";
				}
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Admin_model->get_all_renewal_after_30days_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_expired_date_list(){
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
		$document = $this->Admin_model->get_all_expired_date_list($length,$start,$search);
		
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->agent_code;
				$sub_array[] = $print->name;
				$sub_array[] = $print->policy_number;
				if($print->aadhar_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/policy_copy/".$print->policy_copy.">View Policy Copy</a>";
				}else{
					$sub_array[] = "";
				}
				$sub_array[] = $print->start_date;
				$sub_array[] = $print->end_date;
                $sub_array[] = $print->tpa;
				$sub_array[] = $print->tpa_name;
				$sub_array[] = $print->number_of_policy_year;
				$sub_array[] = $print->insureds_pan;
                $sub_array[] = $print->insureds_aadhar;
				if($print->aadhar_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/insureds_aadhar/".$print->aadhar_upload.">View aadhar Copy</a>";
				}else{
					$sub_array[] = "";
				}
				if($print->pan_upload != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/pan_upload/".$print->pan_upload.">View pancard Copy</a>";
				}else{
					$sub_array[] = "";
				}
				if($print->insured_photo != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/policy_document/insured_photo/".$print->insured_photo.">View insured Copy</a>";
				}else{
					$sub_array[] = "";
				}
				$sub_array[] = $print->premium_rs;
                $sub_array[] = $print->gender; 
                
                
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" .$print->id ."/tbl_policy class='btn btn-success btn-sm inactive_record'><i class='fas fa-times-circle'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm delete_record'><i class='fas fa-trash-alt'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add-policy/".$print->id."  class='btn btn-success btn-sm'><i class='fas fa-pen'></i></a>   ";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm active_record'><i class='fas fa-times-circle'></i></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_policy class='btn btn-danger btn-sm delete_record'><i class='fas fa-trash-alt'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add-policy/".$print->id."  class='btn btn-success btn-sm'><i class='fas fa-pen'></i></a>";
				}
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Admin_model->get_all_expired_date_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_all_agent_list_ajx(){
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
		$document = $this->Admin_model->get_all_agent_list($length,$start,$search);
		
        $data = array();
        if(!empty($document)){
			$zz=1;
			foreach($document as $print){
				$sub_array = array();
				$sub_array[] = $zz++;
				$sub_array[] = $print->name;
				$sub_array[] = $print->agent_code;
				$sub_array[] = $print->insurance_company_name;
				$sub_array[] = $print->email;
				$sub_array[] = $print->password;
                $sub_array[] = $print->mobile;
				$sub_array[] = $print->alternate_number;
				$sub_array[] = $print->address;
				$sub_array[] = $print->state_name;
                $sub_array[] = $print->citie_name;
				$sub_array[] = $print->pincode;
				$sub_array[] = $print->pancard;
                $sub_array[] = $print->aadhar_number;
				$sub_array[] = $print->account_number;
				$sub_array[] = $print->account_name;
				$sub_array[] = $print->bank_name;
                $sub_array[] = $print->ifsc_code;
				$sub_array[] = $print->branch_name;
				
				if($print->userfile != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/agent_document/".$print->userfile.">View aadhar Copy</a>";
				}else{
					$sub_array[] = "";
				}
				if($print->aadhar_photo != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/agent_document/".$print->aadhar_photo.">View pancard Copy</a>";
				}else{
					$sub_array[] = "";
				}
				if($print->pan_file != ""){
					$sub_array[] = "<a class='btn btn-info' target='_blank' href=".base_url()."admin_assets/images/agent_document/".$print->pan_file.">View insured Copy</a>";
				}else{
					$sub_array[] = "";
				}
				if($print->status == "1"){
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to deactivate this record?')\"' data-toggle='tooltip' title='Deactivate' href=" . base_url() . "inactive/" .$print->id ."/tbl_agent class='btn btn-success btn-sm inactive_record'><i class='fas fa-times-circle'></i></a>   
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_agent class='btn btn-danger btn-sm delete_record'><i class='fas fa-trash-alt'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add-agent/".$print->id."  class='btn btn-success btn-sm'><i class='fas fa-pen'></i></a>   ";
				}else{
					$sub_array[] = "<a onclick=\"return confirm('Are you sure, you want to activate this record?')\"' data-toggle='tooltip' title='Activate' href=" . base_url() . "active/" . $print->id . "/tbl_agent class='btn btn-danger btn-sm active_record'><i class='fas fa-times-circle'></i></a>
									<a onclick=\"return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href=" . base_url() . "delete/" . $print->id . "/tbl_agent class='btn btn-danger btn-sm delete_record'><i class='fas fa-trash-alt'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href=" . base_url() . "add-agent/".$print->id."  class='btn btn-success btn-sm'><i class='fas fa-pen'></i></a>";
				}
				$data[] = $sub_array; 
			}
		}
		$TotalProducts = $this->Admin_model->get_all_agent_list_count($search);
		
        $output = array(
            "draw" 				=> $draw,
            "recordsTotal" 		=> $TotalProducts,
            "recordsFiltered" 	=> $TotalProducts,
            "data" 				=> $data
        );
        echo json_encode($output);
        exit();
	}
	public function get_expiry_date(){
		$this->Admin_model->get_expiry_date();
	}
	public function get_calculation(){
		$this->Admin_model->get_calculation();
	}


}

?>