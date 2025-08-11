
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class External_account_controller extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->is_logged();
	}
	public function is_logged(){
		if($this->session->userdata('admin_id') == ""){
			redirect('erp-access');
		}
	}
	public function create_account_team(){
		$this->form_validation->set_rules('name','name','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->External_account_model->get_single_user();
			$this->load->view('admin/add_external_account_user',$data);
		}else{
			$res = $this->External_account_model->set_verification_user();
			if($res == 1){
				$this->session->set_flashdata("success","User added successfully!");
			}else{
			    $this->session->set_flashdata('sucess', 'User updated successfully!!');
			}	
			redirect('create_account_team');
		}
	}
	public function list_account_team(){
		$this->load->view('admin/list_account_team');
	}
	public function verified_transaction_list(){
		$this->load->view('admin/list_verified_fees');
	}
	public function view_verified_transactions(){
		$data['transaction'] = $this->External_account_model->get_transaction_list();
		$this->load->view('admin/view_verified_transactions',$data);
	}
	
}	
