<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Center_controller extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->is_logged(); 
		$this->check_examination_form();
	}
	public function is_logged(){
		if($this->session->userdata('center_id') == ""){
			redirect('center-access');
		}
	}
	public function check_examination_form(){
		if($this->uri->segment(1) != "center_examination_form"){
			$this->Center_details_model->cancel_examination_form();
		}
	}
	public function center_dashboard(){
		// echo $this->session->userdata("center_id");exit;
		$data['faculty_count'] = $this->Admin_model->get_faculty_count();
		$data['course_count'] = $this->Admin_model->get_course_count();
		$data['stream_count'] = $this->Admin_model->get_stream_count();
		$data['subject_count'] = $this->Admin_model->get_subject_count();
		$data['course_stream_relation_count'] = $this->Admin_model->get_course_stream_relation_count();
		$this->load->view('center/index',$data);
	}
	public function center_logout(){
		$this->session->sess_destroy();
		redirect('center-access');
	}
	public function center_profile(){
		$this->form_validation->set_rules('center_name','center name','required');
		if($this->form_validation->run() === FALSE){
			$data['country'] = $this->Admin_model->get_all_country();
			$this->load->view('center/profile',$data);
		}else{
			$photo ='';
			if($_FILES['photo']['name'] !=""){
				$tmp = explode('.', $_FILES['photo']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/center/photo",
					'allowed_types' => "jpg|jpeg|png",
					'encrypt_name'	=> TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('photo')){
					$data = $this->upload->data();				
					$photo = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$mou ='';
			if($_FILES['mou']['name'] !=""){
				$tmp = explode('.', $_FILES['mou']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/center/mou",
					'allowed_types' => "pdf|jpg|jpeg|png",
					'encrypt_name'	=> TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('mou')){
					$data = $this->upload->data();				
					$mou = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$adharcard ='';
			if($_FILES['adhar_card']['name'] !=""){
				$tmp = explode('.', $_FILES['adhar_card']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/center/adharcard",
					'allowed_types' => "pdf|jpg|jpeg|png",
					'encrypt_name'	=> TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('adhar_card')){
					$data = $this->upload->data();				
					$adharcard = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$result = $this->Center_details_model->set_center($photo,$adharcard,$mou);
			if($result == "0"){
				$this->session->set_flashdata('success','Center added successfully');
			}else{
				$this->session->set_flashdata('success','Center updated successfully');
			}
			redirect('center-profile');
		}
	}
	public function center_password(){
		$this->form_validation->set_rules('old_password','old password','required');
		$this->form_validation->set_rules('new_password','New password','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('center/password');
		}else{
			$result = $this->Center_details_model->set_center_password();
			$this->session->set_flashdata('success','Password updated successfully');
			redirect('center-password');
		}
	}
	public function center_new_admisison(){
		$this->form_validation->set_rules('student_name','student name','required');
		if($this->form_validation->run() === FALSE){
			$data['id_name'] = $this->Web_model->get_active_id_name();
			$data['country'] = $this->Web_model->get_all_country();
			$data['course'] = $this->Center_details_model->get_all_course_stream_relation();
			$data['session'] = $this->Center_details_model->get_active_session();
			$data['bank'] = $this->Web_model->get_active_challan_bank();
			$data['lateral_fees'] = $this->Web_model->get_lateral_entry_fees();
			$this->load->view('center/center_new_admisison',$data);
		}else{
			/*$secret = '6LfinagZAAAAAIHQBJ71QUzeozbrTEjDeGl2E0E3';
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){
			}*/
			$noc = "";
			if($_FILES['noc']['name'] !=""){
				$config = array(
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
				}
			}
			$identity_file = "";
			if($_FILES['identity_file']['name'] !=""){
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
				}
			}
			$this->Center_details_model->set_registration($noc,$identity_file);
		}
	}
	public function upload_student_qualification(){
		$this->form_validation->set_rules('student_id','student_id','required');
		if($this->form_validation->run() === FALSE){
			$data['student'] = $this->Web_model->get_qualification_student();
			if(empty($data['student'])){
				redirect(base_url());
			}
			$data['fees'] = $this->Web_model->get_qualification_fees();
			if(empty($data['fees'])){
				redirect(base_url());
			}
			$this->load->view('center/upload_qualification',$data);
		}else{
			$secondary_marksheet ='';
			if($_FILES['secondary_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['secondary_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'		=> $this->input->post('student_id')."-secondary".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('secondary_marksheet')){
					$data = $this->upload->data();				
					$secondary_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$sr_secondary_marksheet ='';
			if($_FILES['sr_secondary_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['sr_secondary_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-sr_secondary".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('sr_secondary_marksheet')){
					$data = $this->upload->data();				
					$sr_secondary_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$graduation_marksheet ='';
			if($_FILES['graduation_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['graduation_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-graduation".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('graduation_marksheet')){
					$data = $this->upload->data();				
					$graduation_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$post_graduation_marksheet ='';
			if($_FILES['post_graduation_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['post_graduation_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-pg".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('post_graduation_marksheet')){
					$data = $this->upload->data();				
					$post_graduation_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$other_qualification_marksheet ='';
			if($_FILES['other_qualification_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['other_qualification_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-oth".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('other_qualification_marksheet')){
					$data = $this->upload->data();				
					$other_qualification_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$signature ='';
			if($_FILES['signature']['name'] !=""){
				$tmp = explode('.', $_FILES['signature']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/signature",
					'allowed_types' => "jpg|jpeg|png",
					'file_name'	=> $this->input->post('student_id')."-sin".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('signature')){
					$data = $this->upload->data();				
					$signature = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$result = $this->Center_details_model->update_qualification($secondary_marksheet,$sr_secondary_marksheet,$graduation_marksheet,$post_graduation_marksheet,$other_qualification_marksheet,$signature);
		}
	}
	public function print_student_challan(){
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('web/print_admission_challan',$data);
	}
	public function print_student_cash_boucher(){
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('web/print_admission_cach_boucher',$data);
	}
	public function center_admission_payment(){
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		
		$freecharge_data = $this->payvia_freecharge_admission($data['student'],$data['fees']);
		$data['req'] = $freecharge_data;
		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );
		
		$this->load->view('center/center_admission_payment',$data);
	}
	public function payvia_freecharge_admission($data,$fees){
		$req = new stdClass();
		$req->merchantTxnId = "BTU_FC_PYMT_".$fees->id;
		$req->amount = $fees->total_fees.".00";
		//$req->amount = "1.00";
		$req->currency = "INR";
		$req->furl = base_url().'admission_freecharge?id='.$data->id;
		$req->surl = base_url().'admission_freecharge?id='.$data->id;
		$req->email = $data->email;
		$req->mobile = $data->mobile;
		$req->customerName = $data->student_name;
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}
	public function generateChecksumForJson($json_decode, $merchantKey){
        $sanitizedInput = $this->sanitizeInput($json_decode, $merchantKey);
        $serializedObj = $sanitizedInput . $merchantKey;
        return $this->calculateChecksum($serializedObj);
    }
    public function calculateChecksum($serializedObj){
        $checksum = hash('sha256', $serializedObj, false);
        return $checksum;
    }
    public function recur_ksort(&$array){
        foreach ($array as & $value){
            if (is_array($value)) $this->recur_ksort($value);
        }
        return ksort($array);
    }
    public function sanitizeInput(array $json_decode, $merchantKey){
        $reqWithoutNull = array_filter($json_decode, function ($k){
            if (is_null($k)){
                return false;
            }
            if (is_array($k)){
                return true;
            }
            return !(trim($k) == "");
        });
        $this->recur_ksort($reqWithoutNull);
        $flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
        return json_encode($reqWithoutNull, $flags);
    }
	public function center_admission_freecharge(){
		$data['student_data'] = $this->Center_details_model->update_admission_payment();
		$this->load->view('center/center_admission_freecharge');
	}
	public function center_admission_ccavRequestHandler(){
		$this->load->view('center/center_admission_ccavRequestHandler');
	}
	
	public function center_pending_admission_list(){
		$this->load->view('center/center_pending_admission_list');
	}
	public function center_active_admisison(){
		$this->load->view('center/center_active_admisison');
	}
	public function center_print_admission_form(){
		$data['admission'] = $this->Center_details_model->get_admission_form();
		$data['qualification'] = $this->Center_details_model->get_admission_qualification();
		$this->load->view('center/print_admission_form',$data);
	}
	public function center__print_id(){
		$data['student_profile'] = $this->Center_details_model->get_admission_form();
		$this->load->view('center/id_card',$data);
	}
	public function center_student_qualification(){
		$this->form_validation->set_rules('secondary_year','Secondary year','required');
		if($this->form_validation->run() === FALSE){
			$data['student'] = $this->Center_details_model->get_admission_form();
			
			$data['qualification'] = $this->Center_details_model->get_admission_qualification();
			$this->load->view('center/student_qualification',$data);
		}else{
			$secondary_marksheet ='';
			if(isset($_FILES['secondary_marksheet']) && $_FILES['secondary_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['secondary_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'		=> $this->input->post('student_id')."-secondary".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('secondary_marksheet')){
					$data = $this->upload->data();				
					$secondary_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$sr_secondary_marksheet ='';
			if(isset($_FILES['sr_secondary_marksheet']) && $_FILES['sr_secondary_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['sr_secondary_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-sr_secondary".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('sr_secondary_marksheet')){
					$data = $this->upload->data();				
					$sr_secondary_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$graduation_marksheet ='';
			if(isset($_FILES['graduation_marksheet']) && $_FILES['graduation_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['graduation_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-graduation".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('graduation_marksheet')){
					$data = $this->upload->data();				
					$graduation_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$post_graduation_marksheet ='';
			if(isset($_FILES['post_graduation_marksheet']) && $_FILES['post_graduation_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['post_graduation_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-pg".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('post_graduation_marksheet')){
					$data = $this->upload->data();				
					$post_graduation_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$other_qualification_marksheet ='';
			if(isset($_FILES['other_qualification_marksheet']) && $_FILES['other_qualification_marksheet']['name'] !=""){
				$tmp = explode('.', $_FILES['other_qualification_marksheet']['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/qualification",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'file_name'	=> $this->input->post('student_id')."-oth".".".$ext,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload('other_qualification_marksheet')){
					$data = $this->upload->data();				
					$other_qualification_marksheet = $data['file_name'];	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}
			}
			$result = $this->Center_details_model->update_qualification_data($secondary_marksheet,$sr_secondary_marksheet,$graduation_marksheet,$post_graduation_marksheet,$other_qualification_marksheet);
			if($result == "0"){
				$this->session->set_flashdata('success','Subject added successfully');
			}else{
				$this->session->set_flashdata('success','Subject updated successfully');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function center_subject_list(){
		$this->form_validation->set_rules('course','course','required');
		if($this->form_validation->run() === FALSE){
			$data['single'] = $this->Course_model->get_single_course_stream_relation();
			$data['session'] = $this->Course_model->get_all_session();
			$data['course'] = $this->Course_model->get_all_course_stream_relation();
			$this->load->view('center/manage_subject',$data);
		}else{
			$result = $this->Center_details_model->set_subject();
			if($result == "0"){
				$this->session->set_flashdata('success','Subject added successfully');
			}else{
				$this->session->set_flashdata('success','Subject updated successfully');
			}
			redirect('center-subject-list');
		}
	}
	public function my_list_subject(){
		$this->load->view('center/list_subject');
	}
	public function center_search_result(){
		$data['result'] = array();
		if($this->input->post('search') == "Search"){
			$data['result'] = $this->Center_details_model->get_search_result(); 
		}
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$this->load->view('center/search_result',$data);
	}
	public function center_manage_result(){ 
		$data['subject'] = array();
		if($this->input->post('show_subject') == "Show Subject"){
			$data['subject'] = $this->Center_details_model->get_result_subject();
			$data['course_stream'] = $this->Center_details_model->get_result_student();
			$data['exam_form'] = $this->Center_details_model->get_student_exam_form_status();
		}
		if($this->input->post('add_result') == "Add Result"){ 
			$result = $this->Center_details_model->set_result();
			if($result){
				$this->session->set_flashdata('success','Result added successfull');
			}else{
				$this->session->set_flashdata('message','Result already created');
			} 
			redirect('center_manage_result');
		}
		$this->load->view('center/center_manage_result',$data);
	}	


	public function center_student_reregistration(){
		$this->form_validation->set_rules("student_name","name","required");
		if($this->form_validation->run()===FALSE){
			$data["fees"] = [];
			$data["stu_data"] = $this->Center_details_model->center_student_reregistration();
			if(!empty($data["stu_data"])){
				$data["fees"] = $this->Center_details_model->get_student_fees($data["stu_data"]->session_id,$data["stu_data"]->course_id,$data["stu_data"]->stream_id,$data["stu_data"]->country,$data["stu_data"]->course_mode,$data["stu_data"]->year_sem);
			}
			$data['country'] = $this->Web_model->get_all_country();
			//echo "<pre>";
			//print_r($data);exit;
			$this->load->view("center/center_student_reregistration",$data);
		}else{
			// code to block the student to re register 2 time 
				if($this->Web_model->check_stu_re_registration($this->input->post("enrollment_number"), $this->input->post("course_mode"))){
					$this->session->set_flashdata('message','Failed to re-registered. please visit campus');
					redirect(base_url("center-dashboard"));
				}
				// ends here


			if($this->input->post("course_mode")==2){
				if($this->input->post("re_registration_year_sem")%2==0){
					$result = $this->Center_details_model->center_student_reregistration_process();
					$this->session->set_flashdata('success','Re-registration successfull');
					redirect('center_active_admisison');
				}
			}
			
			$fees = $this->input->post("total_deposit")+$this->input->post("late_fees");
			//echo $fees;exit;
			
			// for payment related work 
			$student_re_registration_id = $this->Web_model->set_re_registered_student($this->input->post("student_id"),$fees);
			$id = $this->Center_details_model->center_student_reregistration_payment_process();
			
			redirect('center_student_reregistration_payment/'.base64_encode($this->input->post("student_id"))."/".base64_encode($id)."/".base64_encode($student_re_registration_id));
			
			/*$data['payment_details'] = array(
			'payment_id' 	=>$id,
			'student_id'    =>$this->input->post("student_id"),
			'email' 		=> $this->input->post("email"),
			'mobile' 		=> $this->input->post("mobile"),
			'student_name' 	=> $this->input->post("student_name"),
			'total_fees' 	=> $this->input->post("total_deposit"), 
			'student_re_registration_id'=>$student_re_registration_id,
			"year_sem"=>$this->input->post("re_registration_year_sem"),
			"address"=>$this->input->post("address"),
			"country"=>$this->input->post("country"),
			"state"=>$this->input->post("state"),
			"city"=>$this->input->post("city"),
			"pincode"=>$this->input->post("pincode"),
			
			"late_fees"=>$this->input->post("late_fees"),		
    		"original_amount"=>$this->input->post("original_amount"),		
    				
			);
			$freecharge_data = $this->payvia_freecharge_re_registration_payment($data['payment_details']);
			$data['req'] = $freecharge_data;
			$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );
			 
			$this->load->view('center/student_reregistration_payment',$data);*/

		}
	}
	public function student_reregistration_payment(){
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		
		$this->load->view('center/student_reregistration_payment',$data);
	}
	public function payvia_freecharge_re_registration_payment($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "BTU_FC_PYMT_".$otp.$data['payment_id'];
		$req->amount = $data['total_fees'].".00";
		 //$req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'student_re_registration_freecharge?payment_id='.$data['payment_id'].'&student_id='.$data['student_id'].'&year_sem='.$data['year_sem'].'&address='.$data['address'].'&country='.$data['country'].'&state='.$data['state'].'&city='.$data['city'].'&pincode='.$data['pincode'].'&email='.$data['email'].'&mobile='.$data['mobile'].'&student_name='.$data['student_name'].'&late_fees='.$data['late_fees'].'&original_amount='.$data['original_amount'].'&student_re_registration_id='.$data['student_re_registration_id'].'&ammount='.$data['total_fees'];

		$req->surl = base_url().'student_re_registration_freecharge?payment_id='.$data['payment_id'].'&student_id='.$data['student_id'].'&year_sem='.$data['year_sem'].'&address='.$data['address'].'&country='.$data['country'].'&state='.$data['state'].'&city='.$data['city'].'&pincode='.$data['pincode'].'&email='.$data['email'].'&mobile='.$data['mobile'].'&student_name='.$data['student_name'].'&late_fees='.$data['late_fees'].'&original_amount='.$data['original_amount'].'&student_re_registration_id='.$data['student_re_registration_id'].'&ammount='.$data['total_fees'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function student_re_registration_freecharge(){
		// "Array ( [success_freecharge] => [id] => 1 [txnId] => YpvEjekeEmpXRq_iTEST1_***sdsds%1244_1 [merchantTxnId] => iTEST1_***sdsds%1244 [amount] => 1.00 [merchantName] => [merchantLogo] => [metadata] => [status] => COMPLETED [authCode] => [checksum] => 97516f64cbd2006283f7f762879e6db1eb8b96cecf764848efabbcb0b9f84a66 ) "
		$data['student_data'] = $this->Center_details_model->update_student_reregistration_payment();
		if(!empty($data['student_data'])){
			$this->load->view('center/student_reregistration_receipt_freecharge',$data);
		}
		else{
			$this->session->set_flashdata('message','Re-registration failed');
			redirect('center_active_admisison');
		}

	}
	public function examination_form(){
		
		if($this->input->post('generate') == "Generate"){
			$result = $this->Center_details_model->generate_examination_otp();
			if($result){
				$this->session->set_flashdata('success','Please check your inbox to validate otp');
			}else{
				$this->session->set_flashdata('message','This examination not open for you.');
			}
			redirect('center_examination_form');
		}
		if($this->input->post('verify') == "verify"){
			if($this->input->post('otp_code') == $this->session->userdata('exam_otp')){
				$session = array(
					'is_validated' => '1' 
				);
				$this->session->set_userdata($session);
			}else{
				$this->session->set_flashdata('message','Please enter valid otp');
			}
			redirect('center_examination_form');
		}
		if($this->session->userdata('is_validated') == "1"){
			$this->form_validation->set_rules('year_sem','year/sem','required');
			if($this->form_validation->run() === FALSE){
				$data['student'] = $this->Center_details_model->get_examination_student();
				$data['subject'] = $this->Center_details_model->get_examination_subjct($data['student']->id,$data['student']->course_id,$data['student']->stream_id,$data['student']->year_sem,$data['student']->center_id);
				$this->load->view('center/examination_form',$data);
			}else{
				$result = $this->Center_details_model->set_examination_form();
				//echo $result;exit;
				//redirect('center_make_exam_payment/'.$result);
			}
		}else{
			$this->load->view('center/examination_entry');
		}
	}
	public function make_exam_payment(){
		$data['student'] = $this->Center_details_model->get_student_data();
		
		$data['fees'] = $this->Center_details_model->get_examination_form_fees_details();
		
		/*$freecharge_data = $this->payvia_freecharge_examination($data['fees'],$data['student']);
		$data['req'] = $freecharge_data;
		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		
		$this->load->view('center/make_exam_payment',$data);
	}
	/*public function payvia_freecharge_examination($data,$student){
		$otp = rand ( 10000 , 99999 ); 
		$req = new stdClass();
		$req->merchantTxnId = "BTU_FC_PYMT_".$otp.$data->id;
		$req->amount = $data->total_fees.".00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'examination_freecharge?id='.$data->id;
		$req->surl = base_url().'examination_freecharge?id='.$data->id;
		$req->email = $student->email;
		$req->mobile = $student->mobile;
		$req->customerName = $student->student_name;
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}
	public function generateChecksumForJson($json_decode, $merchantKey){
        $sanitizedInput = $this->sanitizeInput($json_decode, $merchantKey);
        $serializedObj = $sanitizedInput . $merchantKey;
        return $this->calculateChecksum($serializedObj);
    }*/
	public function center_exam_ccavRequestHandler(){
		$data['test'] = array();
		$this->load->view('center/center_exam_ccavRequestHandler',$data);
	}
	public function center_exam_ccavResponseHandler(){
		$data['test'] = array();
		$this->load->view('center/center_exam_ccavResponseHandler',$data);
	}
	public function re_registration_ccavRequestHandler(){
		$data['test'] = array();
		$this->load->view('center/re_registration_ccavRequestHandler',$data);
	}
	public function re_registration_ccavResponseHandler(){
		$data['test'] = array();
		$this->load->view('center/re_registration_ccavResponseHandler',$data);
	}
	public function center_active_hall_ticket_list(){
		$data['test'] = array();
		$this->load->view('center/active_hall_ticket_list',$data);
	}
	public function center_syllabus_list(){
		$this->load->view('center/syllabus_list');
	}
	public function add_consolidate_center_marksheet(){
		if($this->input->post('next') == "Next"){
			$this->Center_details_model->check_consolidated_form_status();
			redirect('add-consolidate-center-marksheet/'.$this->input->post('enrollment'));
		}
		$this->form_validation->set_rules('enrollment','enrollment ','required');
		if($this->form_validation->run() === FALSE){	
			$data['student'] = $this->Center_details_model->get_student_details();			
			$data['subject'] = $this->Center_details_model->get_student_result();
				$data['self'] = $this->Center_details_model->get_self_assement($this->uri->segment(2));
			$data['teacher'] = $this->Center_details_model->get_teacher_assement($this->uri->segment(2));
			$data['assignment'] = $this->Center_details_model->get_assignment_assement($this->uri->segment(2));

            $this->load->view('center/add_consolidate_center_marksheet',$data);
		}else{
			$result = $this->Center_details_model->set_consolidated_marksheet_center(); 
			redirect('make-consolidate-center-payment/'.base64_encode($result));
		}
	}
	public function make_consolidate_center_payment(){
		$data['student'] = $this->Center_details_model->get_student_consolidated_payment();
		$this->load->view('payment/make_consolidate_center_payment',$data);
	}
	public function consolidated_payment_ccavRequestHandler(){
		$this->load->view('payment/consolidated_payment_ccavRequestHandler');
	}
	public function consolidated_payment_ccavResponseHandler(){
		$this->load->view('payment/consolidated_payment_ccavResponseHandler');
	}
	public function consolidate_center_marksheet_list(){
			$this->load->view('center/consolidate_center_marksheet_list');
	}
	// public function consolidate_marksheet_print_center(){
	// 	$this->load->view('center/consolidate_marksheet_print_center');
	// }
	public function edit_consolidate_marksheet_center(){
		$this->form_validation->set_rules('hidden_consolidate_id','hidden_consolidate_id ','required');
		if($this->form_validation->run() === FALSE){		
			$data['single'] = $this->Center_details_model->get_single_note();
			$data['consolidate_details'] = $this->Center_details_model->get_single_consolidate_center();
			$this->load->view('center/edit_consolidate_marksheet_center',$data);
		}else{
			$result = $this->Center_details_model->edit_consolidate_center();
			if($result == "0"){
				$this->session->set_flashdata('success','Result added successfull');
			}
			redirect('consolidate-center-marksheet-list');
		} 
	}
	public function apply_transcript(){
		$this->form_validation->set_rules('enrollment_number','enrollment number ','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('center/apply_transcript');
		}else{
			$result = $this->Center_details_model->get_validate_sudent();
			$this->session->set_flashdata('mesage','Please enter valid enrollment number'); 
			redirect('apply_transcript');
		} 
	}
	public function transcript_application(){
	   $this->form_validation->set_rules('enrollment_number','enrollment number','required');	
		if($this->form_validation->run() === FALSE){
    	    $data['student_details'] = $this->Center_details_model->get_admission_form_details();
    	    $data['transcript'] = $this->Center_details_model->get_transcript();
    	    $this->load->view('center/transcript_application',$data);
		}else{
		    $this->Center_details_model->set_transcript_form();
		    $this->session->set_flashdata('success','Transcript application submitted successfull!');
		    redirect('center_transcript_application/'.$this->input->post("registration_id"));
		}
	}
	public function transcript_payment(){
	    $data['transcript'] = $this->Center_details_model->get_transcript();
	    $this->load->view('center/transcript_payment',$data);
	}
	public function print_transcript(){
	    $data['transcript'] = $this->Center_details_model->get_print_transcript();
	    $this->load->view('center/print_transcript',$data);
	}
	public function pay_transcrip_certificate_fees(){
		$data['transcript'] = $this->Center_details_model->get_transcript();
		$data['student_details'] = $this->Center_details_model->get_admission_form_details();
	    $this->load->view('center/transcript_payment',$data);
	}
	public function center_student_transcript_ccavRequestHandler(){
		$this->load->view('payment/center_student_transcript_ccavRequestHandler');
	}
	public function center_student_transcript_ccavResponseHandler(){ 
		$this->load->view('payment/center_student_transcript_ccavResponseHandler');
	}
	public function consolidate_marksheet_print_center(){
		$data['marksheet'] = $this->Center_details_model->get_single_markshhet();
		$data['marksheet_id'] = $this->Center_details_model->get_single_marksheet_id();
		$this->load->view('marksheet/consolidate_student_marksheet_center',$data);
	}
}