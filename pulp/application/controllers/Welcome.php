<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Pulp_model');
		$this->load->model('Digitalocean_model');
	}
	public function index() {
		$this->form_validation->set_rules('name','name','required');
		if($this->form_validation->run() === FALSE){
		$data['course'] = $this->Pulp_model->get_pulb_courses();
		$this->load->view('front/index',$data);
		}else{
		  //  exit;
		$this->Pulp_model->set_pulb_enquiry();
		}
	}
	public function about() {
		$this->load->view('front/about');
	} 
	public function contact() {
		$this->load->view('front/contact');
	} 
	public function admissions() {
		$this->form_validation->set_rules('student_name','student name','required');
		if($this->form_validation->run() === FALSE){
			$data['id_name'] = $this->Pulp_model->get_active_id_name();
			$data['country'] = $this->Pulp_model->get_all_country();
			$data['course'] = $this->Pulp_model->get_all_course_stream_relation();
			//echo "<pre>";print_r($data['course']);exit;
			$data['session'] = $this->Pulp_model->get_active_session();
			$data['bank'] = $this->Pulp_model->get_active_challan_bank();
			$data['lateral_fees'] = $this->Pulp_model->get_lateral_entry_fees();
			$data['stream'] = $this->Pulp_model->get_course_wise_stream();
			$this->load->view('front/admissions',$data);
		}else{
		/*	$secret = '6Ld04bQZAAAAAC4Bw6rma3uEJ22Ko1y-vcVovVBl';//ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){*/
				$photo = "";
				if($_FILES['userfile']['name'] !=""){
					$photo = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/profile_pic/");
					/*$config = array(
						'upload_path' 	=> "images/noc/",
						'allowed_types' => "*",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('noc')){
						$data = $this->upload->data();				
						$noc = $data['file_name'];	
					}else{ 
						$noc = "";
					}*/
				}
				$noc = "";
				if($_FILES['noc']['name'] !=""){
					$noc = $this->Digitalocean_model->upload_photo($filename="noc",$path="images/noc/");
					/*$config = array(
						'upload_path' 	=> "images/noc/",
						'allowed_types' => "*",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('noc')){
						$data = $this->upload->data();				
						$noc = $data['file_name'];	
					}else{ 
						$noc = "";
					}*/
				}
				$identity_file = "";
				if($_FILES['identity_file']['name'] !=""){
					$identity_file = $this->Digitalocean_model->upload_photo($filename="identity_file",$path="images/student_identity_softcopy/");
					/*
					$config = array(
						'upload_path' 	=> "images/student_identity_softcopy/",
						'allowed_types' => "*",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('identity_file')){
						$data = $this->upload->data();				
						$identity_file = $data['file_name'];	
					}else{ 
						$identity_file = "";
					}*/
				}
				$this->Pulp_model->set_registration($photo,$noc,$identity_file);
			/*}else{
				redirect(base_url());
			}*/
		}
	} 
	public function membership() {
		// $this->load->view('front/membership');
		$this->load->view('front/members_and_certification');
	} 
	public function membership_inner() {
		$this->load->view('front/membership_inner');
	}
	public function accreditation(){ 
		$this->load->view("front/accreditation"); 
	}
	public function rehabilitation() {
		// $this->load->view('front/rehabilitation');
		$this->load->view('front/rehabilitation_new');
	}  
	public function diploma_in_electrical_engineering_air_conditioner() {
		$this->load->view('front/diploma_in_electrical_engineering_air_conditioner');
	}  
	public function diploma_in_mechanical_engineering_nanotechnology() {
		$this->load->view('front/diploma_in_mechanical_engineering_nanotechnology');
	}  
	public function diploma_in_electrical_electronics_engineering_instrumentation() {
		$this->load->view('front/diploma_in_electrical_electronics_engineering_instrumentation');
	}  
	public function diploma_in_computer_science() {
		$this->load->view('front/diploma_in_computer_science');
	}  
	public function diploma_in_civil_engineering() {
		$this->load->view('front/diploma_in_civil_engineering');
	}  
	public function diploma_in_electronics_communication() {
		$this->load->view('front/diploma_in_electronics_communication');
	}  
	public function diploma_in_automobile_engineering() {
		$this->load->view('front/diploma_in_automobile_engineering');
	}  
	public function mca() {
		$this->load->view('front/mca');
	}  
	public function online_mba() {
		$this->load->view('front/mba');
	}  
	public function remote_sensing() {
		$this->load->view('front/remote_sensing');
	}  
	public function m_tech_in_environmental_engineering() {
		$this->load->view('front/m_tech_in_environmental_engineering');
	}  
	public function construction_engineering_management() {
		$this->load->view('front/construction_engineering_management');
	}  
	public function power_system() {
		$this->load->view('front/power_system');
	}  
	public function VLSI() {
		$this->load->view('front/VLSI');
	}  
	public function structural_engineering() {
		$this->load->view('front/structural_engineering');
	}  
	public function transportation_engineering() {
		$this->load->view('front/transportation_engineering');
	}  
	public function industrial_engineering_management() {
		$this->load->view('front/industrial_engineering_management');
	}  
	public function thermal_engineering() {
		$this->load->view('front/thermal_engineering');
	}  
	public function civil_engineering() {
		$this->load->view('front/civil_engineering');
	}  
	public function computer_science() {
		$this->load->view('front/computer_science');
	}  
	public function electrical_engineering() {
		$this->load->view('front/electrical_engineering');
	}  
	public function mechanical_engineering() {
		$this->load->view('front/mechanical_engineering');
	}  
	public function electronics_communication() {
		$this->load->view('front/electronics_communication');
	}  
	public function environmental_engineering() {
		$this->load->view('front/environmental_engineering');
	}  
	public function b_tech_in_automobile() {
		$this->load->view('front/b_tech_in_automobile');
	}  
	public function b_tech_in_civil_engineering() {
		$this->load->view('front/b_tech_in_civil_engineering');
	}  
	public function b_tech_in_computer_science() {
		$this->load->view('front/b_tech_in_computer_science');
	}  
	public function b_tech_in_electrical_engineering() {
		$this->load->view('front/b_tech_in_electrical_engineering');
	}  
	public function b_tech_in_mechanical_engineering() {
		$this->load->view('front/b_tech_in_mechanical_engineering');
	}  
	public function b_tech_in_information_technology() {
		$this->load->view('front/b_tech_in_information_technology');
	}  
	public function b_tech_in_electronics_communication_telecommunication() {
		$this->load->view('front/b_tech_in_electronics_communication_telecommunication');
	} 
	public function b_tech_in_electrical_electronics_engineering() {
		$this->load->view('front/b_tech_in_electrical_electronics_engineering');
	} 
	public function diploma_in_mechanical_engineering(){ 				$this->load->view('front/diploma_in_mechanical_engineering'); 
	} 
	public function submit_enquiry(){
	    $secret = '6LcwIJcoAAAAADgRgWvrd7KtRbLuxq0dxA3VzkpQ';//ac.in
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		if($responseData->success){
		    $this->Pulp_model->set_enquiry();
		}else{
		    redirect(base_url());
		}
	}
	public function thankyou_for_enq(){
	    $this->load->view('front/thankyou_for_enq');
	}


	
	public function university_ugc(){
		$this->load->view('front/ugc');
	}
	public function approvals(){
		$this->load->view('front/approval');
	}
	public function aicte(){
		$this->load->view('front/aicte');
	}
	public function bci(){
		$this->load->view('front/bci');
	}
	public function pci(){
		$this->load->view('front/pci');
	}
	public function aiu(){
		$this->load->view('front/aiu');
	}
	public function bpedvi(){
		$this->load->view('front/bpedvi');
	}
	public function dedidd(){
		$this->load->view('front/dedidd');
	}
	public function bpedhi(){
		$this->load->view('front/bpedhi');
	}
	public function dedhi(){
		$this->load->view('front/dedhi');
	}
	public function dedvi(){
		$this->load->view('front/dedvi');
	}
	public function bedidd(){
		$this->load->view('front/bedidd');
	}
	public function get_state_ajax(){
		$this->Pulp_model->get_state_ajax();
	}
	public function get_city_ajax(){
		$this->Pulp_model->get_city_ajax();
	}
}
