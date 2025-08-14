<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Center_api extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->load->model('api/Center_api_model');
	}
	public function get_center_login(){
		$this->Center_api_model->get_center_login();
	} 
	public function get_center_profile(){
        // print_r();exit();
		$this->Center_api_model->get_center_profile();
	} 
	public function get_center_students(){
		$this->Center_api_model->get_center_students();
	} 
	public function get_center_students_payable_fees(){
		$this->Center_api_model->get_center_students_payable_fees();
	} 
	public function get_student_paid_addmission_fees(){
		$this->Center_api_model->get_student_paid_addmission_fees();
	} 
	public function set_alumni_center_password_update(){
		$this->Center_api_model->set_alumni_center_password_update();
	}
	public function get_center_ledger(){
		$this->Center_api_model->get_center_ledger();
	}
	public function get_center_ledger_all(){
		$this->Center_api_model->get_center_ledger_all();
	}
	public function get_center_submit_amount(){
		$this->Center_api_model->get_center_submit_amount();
	}
}