
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Account_controller extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->is_logged();
		
	}
	public function is_logged(){
		if($this->session->userdata('admin_id') == ""){
			redirect('erp-access');
		}
	}
	
	/*public function check_access(){
		if($this->session->userdata('admin_id') != "1"){
			$access = $this->Setting_model->get_user_privilege_link();
			if(!in_array($this->uri->segment(1),$access)){
				$this->session->set_flashdata('message','Sorry! You dont have access to this module!');
				redirect(base_url());
			}
		}
	}	*/
	public function center_account_details(){
		$data['account_details_center'] = $this->Account_model->get_account_details_center();
		$data['center_info'] = $this->Account_model->get_center_info(); 
		$this->load->view('admin/center_account_details',$data);
	 }
	public function account_monthly_collection(){
		
		$data['monthly_account_student'] = $this->Account_model->get_monthly_account_details();
		$data['mothly_account_center'] = $this->Account_model->get_monthly_account_center();
		$data['monthly_account_separate_student'] = $this->Account_model->get_monthly_account_seperate_student();
		$this->load->view('admin/account_monthly_collection',$data);
	} 
	
	public function student_account_statement(){
		$data['single_student'] = $this->Account_model->get_single_student_account();
		$data['student_account'] = $this->Account_model->get_student_account_details();
		$this->load->view('admin/student_account_statement',$data);
	} 
	 
	 public function seperate_student_account_statement(){
		 $data['single_separete_student'] = $this->Account_model->get_single_separate_account();
		 $data['seperate_student_account'] = $this->Account_model->get_separate_student_account_details();
		 $this->load->view('admin/seperate_student_account_statement',$data);
	 }
	 
	 public function center_account_details_all(){
		$data['center_info'] = $this->Account_model->get_center_info(); 
		$data['account_details_center'] = $this->Account_model->get_account_details_center_yearly_all();
		 $this->load->view('admin/center_account_details_all',$data);
	 }
	 public function account_yearly_collection(){
		$data['yearly_account_student'] = $this->Account_model->get_yearly_account_details();
	   $data['yearly_account_center'] = $this->Account_model->get_yealy_account_center();
	   $data['yearly_account_seperate_student'] = $this->Account_model->get_yearly_account_separate_students();
		$this->load->view('admin/account_yearly_collection',$data);
	}
	public function student_account_statement_yearly(){
		$data['single_student'] = $this->Account_model->get_single_student_account();
		$data['student_account'] = $this->Account_model->get_student_account_details();
		$this->load->view('admin/student_account_statement_yearly',$data);
	}
	public function separate_student_account_statement_yearly(){
		$data['single_separete_student'] = $this->Account_model->get_single_separate_account();
		$data['seperate_student_account'] = $this->Account_model->get_separate_student_account_details();
		$this->load->view('admin/separate_student_account_statement_yearly',$data);

	}
	public function total_collection(){
		$data['total_collection_center']  = $this->Account_model->get_account_total_collection();
		$data['student_account_total'] = $this->Account_model->get_student_total_collection();
		$data['separate_student_account_total'] = $this->Account_model->get_seperate_student_total_collection();
		$this->load->view('admin/total_collection',$data);
	}
	
	public function center_payment_pending(){
		$data['payment_pending_center'] = $this->Account_model->get_account_payment_pending_center();
		$this->load->view('admin/center_payment_pending',$data);
	}
	public function center_account_details_pending(){
		$data['account_details_center'] = $this->Account_model->get_account_details_center_pending();
		$data['center_info'] = $this->Account_model->get_center_info(); 
		$this->load->view('admin/center_account_details_pending',$data);
	}
	public function student_payment_pending(){
		$data['student_pending']= $this->Account_model->get_student_payment_pending();
		$data['student_reregistration_data']  = $this->Account_model->get_student_pending_reregistration();
		$this->load->view('admin/student_payment_pending',$data);
	}
	public function student_pending_info_examinatiom(){
		$data['student'] = $this->Account_model->get_student_name_center();
		$data['student_examination'] = $this->Account_model->get_examination_all();
		$this->load->view('admin/student_pending_info_examinatiom',$data);
	}
	public function student_pending_info_reregistration(){
		$data['student'] = $this->Account_model->get_student_name_center();
		$data['student_reregistration'] = $this->Account_model->get_reregistration_all();
		$this->load->view('admin/student_pending_info_reregistration',$data);

	}

}	
