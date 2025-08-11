<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Web_controller extends CI_Controller {
	public function get_course_stream_fees(){
		$this->Web_model->get_course_stream_fees();
	}
	public function cron_setup_payment(){
		$this->Account_model->cron_setup_payment();
	}
	public function get_head_payment(){
		$this->Web_model->get_head_payment();
	}
	public function get_course_stream_duration(){
		$this->Web_model->get_course_stream_duration();
	}
	
	public function get_course_stream_duration_separate(){
		$this->Web_model->get_course_stream_duration_separate();
	}
	public function get_course_stream(){
		$this->Web_model->get_course_stream();
	}
	public function get_course_stream_subject(){
		$this->Web_model->get_course_stream_subject();
	}
	public function get_course_stream_course_mode(){
		$this->Web_model->get_course_stream_course_mode();
	}
	public function resend_otp(){
		$this->Web_model->resend_otp();
		$this->session->set_flashdata('success','Please check your inbox to verify your OTP');
		redirect('admission-form');
	}
	public function resend_e_otp(){
		$this->Web_model->resend_e_otp();
		$this->session->set_flashdata('success','Please check your inbox to verify your OTP');
		redirect('e-libraries');
	}
	public function get_ajax_course_list(){
		$this->Web_model->get_ajax_course_list();
	}
	public function apply_now(){
		$this->load->view('web/apply_now');
	}
	public function admission_form(){
		// echo "fd";exit;
		if($this->input->post('generate') == "Generate"){
			
			$this->Web_model->generate_registration_otp();
			$this->session->set_flashdata('success','Please check your inbox to verify your OTP');
			redirect('admission-form');
		}
		if($this->input->post('verify') == "verify"){
			$result = $this->Web_model->verify_otp();
			if($result){
				$this->session->set_flashdata('success','OTP verified successfully');
			}else{
				$this->session->set_flashdata('message','Please enter valid otp');
			}
				redirect('admission-form');
		}
		$this->form_validation->set_rules('student_name','student name','required');
		if($this->form_validation->run() === FALSE){
			$data['id_name'] = $this->Web_model->get_active_id_name();
			$data['country'] = $this->Web_model->get_all_country();
			$data['course'] = $this->Web_model->get_all_course_stream_relation();
			$data['session'] = $this->Web_model->get_active_session();
			$data['bank'] = $this->Web_model->get_active_challan_bank();
			$data['lateral_fees'] = $this->Web_model->get_lateral_entry_fees();
			$data['stream'] = $this->Web_model->get_course_wise_stream();
			$data['old_student_details'] = $this->Web_model->get_old_student_details();
			// $data['old_admission_check'] = $this->Web_model->old_admission_check();
			if($this->input->get('old_enrollment')){
				if(empty($data['old_student_details'])){
					$this->session->set_flashdata('message','Please enter valid enrollment number');
					redirect('apply_now');
				}
			}
			// echo "<pre>";print_r($data['course']);exit();
			$this->load->view('web/admission_form',$data);
		}else{
			$secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){
				$photo = "";
				if($_FILES['userfile']['name'] !=""){
					$photo = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/profile_pic/");
					// $config = array(
					// 	'upload_path' 	=> "images/noc/",
					// 	'allowed_types' => "*",
					// 	'encrypt_name' => TRUE,
					// );			
					// $this->upload->initialize($config);
					// if($this->upload->do_upload('noc')){
					// 	$data = $this->upload->data();				
					// 	$noc = $data['file_name'];	
					// }else{ 
					// 	$noc = "";
					// }
				}
				$noc = "";
				if($_FILES['noc']['name'] !=""){
					$noc = $this->Digitalocean_model->upload_photo($filename="noc",$path="images/noc/");
					// $config = array(
					// 	'upload_path' 	=> "images/noc/",
					// 	'allowed_types' => "*",
					// 	'encrypt_name' => TRUE,
					// );			
					// $this->upload->initialize($config);
					// if($this->upload->do_upload('noc')){
					// 	$data = $this->upload->data();				
					// 	$noc = $data['file_name'];	
					// }else{ 
					// 	$noc = "";
					// }
				}
				$identity_file = "";
				// if($_FILES['identity_file']['name'] !=""){
				// 	$identity_file = $this->Digitalocean_model->upload_photo($filename="identity_file",$path="images/student_identity_softcopy/");
					
				// 	$config = array(
				// 		'upload_path' 	=> "images/student_identity_softcopy/",
				// 		'allowed_types' => "*",
				// 		'encrypt_name' => TRUE,
				// 	);			
				// 	$this->upload->initialize($config);
				// 	if($this->upload->do_upload('identity_file')){
				// 		$data = $this->upload->data();				
				// 		$identity_file = $data['file_name'];	
				// 	}else{ 
				// 		$identity_file = "";
				// 	}
				// }
				$old_admission_check = $this->Web_model->old_admission_check();
				// echo "<pre>";print_r($old_admission_check);exit();
				if($old_admission_check == ""){
					$this->Web_model->set_registration($photo,$noc,$identity_file);
					// $this->load->view('payment/admission_form_RequestHandler');
				}else{
					$this->session->set_flashdata('message','Already taken admission. Please contact university');
					redirect('already_enrolled_message');
				}
			 }else{
			 	$this->session->set_flashdata('message','Please tell us that you are not a robot');
			 	redirect(base_url());
			 }
		}
	}

	// public function check(){
	// 	$old_admission_check = $this->Web_model->old_admission_check();
	// 	echo "<pre>";print_r($old_admission_check);exit();
	// }

	public function already_enrolled_message(){
		$this->load->view('web/already_enrolled_message');
	}
	public function thank_you()
	{
		$this->load->view('web/thank_you');
	}
	public function re_registration_form(){
		// echo "ok";exit;
		$data['student'] = array();
		if($this->input->post('next') == "next"){
			$data['student'] = $this->Web_model->get_re_registration_form();
			if(empty($data['student'])){
				$this->session->set_flashdata('message','Please enter valid details');
				redirect('re-registration-form');
			}else{ 
				// code to block the student to re register 2 time 
				if($this->Web_model->check_stu_re_registration($data['student']->enrollment_number, $data['student']->course_mode)){
					$this->session->set_flashdata('message','You have submited the form. If you are unable to submit the form again please visit campus');
					redirect(base_url());
				}
				// ends here
				$session = array(
					're_registration_id' => $data['student']->id
				);
				$this->session->set_userdata($session);
			}

		}

		$this->form_validation->set_rules('student_name','name','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('web/re_registration_form',$data);
		}else{
			// echo $this->session->userdata("re_registration_id");exit;
			$stu = $this->Web_model->get_single_student_details($this->session->userdata("re_registration_id"));
			$fees = $this->Web_model->get_student_fees($stu->course_id,$stu->stream_id,$stu->session_id,$stu->country);
			
			if($stu->course_mode==2){
				
				if($this->input->post("year_sem")%2==0){
					$this->Web_model->set_re_registration();
					$this->session->set_flashdata('success','Re registration successfull!');
					redirect(base_url());
				}
			}
			
			
			// for payment related work 

			$student_re_registration_id = $this->Web_model->set_re_registered_student($stu->id,$fees);
			
			$payment_id = $this->Web_model->student_reregistration_payment_process($stu->id,$fees,$this->input->post("year_sem"));
			
			redirect('student_reregistration_payment/'.base64_encode($stu->id)."/".base64_encode($payment_id)."/".base64_encode($student_re_registration_id));
			
			
			
			//echo "<pre>";
			//print_r($student_re_registration_id);exit;
			/*$data['payment_details'] = array(
			'payment_id' 	=>$payment_id,
			'student_id'    =>$stu->id,
			'email' 		=> $stu->email,
			'mobile' 		=> $stu->mobile,
			'student_name' 	=> $stu->student_name,
			"year_sem"      => $this->input->post("year_sem"),
			'total_fees' 	=> $stu->fees, 	
    		'student_re_registration_id' => $student_re_registration_id,
			);
			$freecharge_data = $this->payvia_freecharge_re_registration_payment($data['payment_details']);
			$data['req'] = $freecharge_data;
			$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );
			 
			$this->load->view('web/student_reregistration_payment',$data);*/
			
		}
	}
	public function student_reregistration_payment(){
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		
		$this->load->view('web/student_reregistration_payment',$data);
	}

	public function payvia_freecharge_re_registration_payment($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "BTU_FC_PYMT_".$otp.$data['payment_id'];
		$req->amount = $data['total_fees'].".00";
		$req->currency = "INR";
		$req->furl = base_url().'student_re_registration_freecharge_process_done?payment_id='.$data['payment_id'].'&student_id='.$data['student_id'].'&year_sem='.$data['year_sem'].'&student_re_registration_id='.$data['student_re_registration_id'];
		$req->surl = base_url().'student_re_registration_freecharge_process_done?payment_id='.$data['payment_id'].'&student_id='.$data['student_id'].'&year_sem='.$data['year_sem'].'&student_re_registration_id='.$data['student_re_registration_id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function student_re_registration_freecharge_process_done(){
		// "Array ( [success_freecharge] => [id] => 1 [txnId] => YpvEjekeEmpXRq_iTEST1_***sdsds%1244_1 [merchantTxnId] => iTEST1_***sdsds%1244 [amount] => 1.00 [merchantName] => [merchantLogo] => [metadata] => [status] => COMPLETED [authCode] => [checksum] => 97516f64cbd2006283f7f762879e6db1eb8b96cecf764848efabbcb0b9f84a66 ) "
		$data['student_data'] = $this->Web_model->update_student_reregistration_payment();
		if(!empty($data['student_data'])){
			$this->load->view('web/student_reregistration_receipt_freecharge',$data);
		}
		else{
			$this->session->set_flashdata('message','Re-registration failed');
			redirect(base_url());
		}

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
    
	public function guide_application_form(){
		ini_set('memory_limit', '-1');
		$this->form_validation->set_rules('name','name','required');
		if($this->form_validation->run() === FALSE){
			$data['country'] = $this->Web_model->get_all_country();
			$this->load->view('web/guide_application_form',$data);
		}else{
			$secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){

				$photo ='';
				if($_FILES['userfile']['name'] !=""){
					$photo = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/guide_pic/");
					/*
					$tmp = explode('.', $_FILES['userfile']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic",
						'allowed_types' => "jpg|jpeg|png",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('userfile')){
						$data = $this->upload->data();				
						$photo = $data['file_name'];	
					}else{ 
						$this->session->set_flashdata('message','Please upload valid photo');
						redirect($_SERVER['HTTP_REFERER']);
						//$error = array('error' => $this->upload->display_errors());	
						//$this->upload->display_errors();
					}*/
				}
			
				$signature ='';
				if($_FILES['signature']['name'] !=""){
					$signature = $this->Digitalocean_model->upload_photo($filename="signature",$path="images/guide_pic/");
					
					/*$tmp = explode('.', $_FILES['signature']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic",
						'allowed_types' => "jpg|jpeg|png",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('signature')){
						$data = $this->upload->data();				
						$signature = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid signature');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				
				$secondary_subject_marksheet ='';
				if($_FILES['secondary_subject_marksheet']['name'] !=""){
					$secondary_subject_marksheet = $this->Digitalocean_model->upload_photo($filename="secondary_subject_marksheet",$path="images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['secondary_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('secondary_subject_marksheet')){
						$data = $this->upload->data();				
						$secondary_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid marksheet of secondary');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				
				$sr_secondary_subject_marksheet ='';
				if($_FILES['sr_secondary_subject_marksheet']['name'] !=""){
					$sr_secondary_subject_marksheet = $this->Digitalocean_model->upload_photo($filename="sr_secondary_subject_marksheet",$path="images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['sr_secondary_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('sr_secondary_subject_marksheet')){
						$data = $this->upload->data();				
						$sr_secondary_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid sr. ceconadary marksheet');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				
				$graduation_subject_marksheet ='';
				if($_FILES['graduation_subject_marksheet']['name'] !=""){
					$graduation_subject_marksheet = $this->Digitalocean_model->upload_photo($filename="graduation_subject_marksheet",$path="images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['graduation_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('graduation_subject_marksheet')){
						$data = $this->upload->data();				
						$graduation_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid graduation marksheet');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$post_graduation_subject_marksheet ='';
				if($_FILES['post_graduation_subject_marksheet']['name'] !=""){
					$post_graduation_subject_marksheet = $this->Digitalocean_model->upload_photo($filename="post_graduation_subject_marksheet",$path="images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['post_graduation_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('post_graduation_subject_marksheet')){
						$data = $this->upload->data();				
						$post_graduation_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid post graduation marksheet');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$phd_subject_marksheet ='';
				if($_FILES['phd_subject_marksheet']['name'] !=""){
					$phd_subject_marksheet = $this->Digitalocean_model->upload_photo($filename="phd_subject_marksheet",$path="images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['phd_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('phd_subject_marksheet')){
						$data = $this->upload->data();				
						$phd_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid phd document');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$other_qualification_subject_marksheet ='';
				if($_FILES['other_qualification_subject_marksheet']['name'] !=""){
					$other_qualification_subject_marksheet = $this->Digitalocean_model->upload_photo($filename="other_qualification_subject_marksheet",$path="images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['other_qualification_subject_marksheet']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('other_qualification_subject_marksheet')){
						$data = $this->upload->data();				
						$other_qualification_subject_marksheet = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid other certificate');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$biodata ='';
				if($_FILES['biodata']['name'] !=""){
					$biodata = $this->Digitalocean_model->upload_photo($filename="biodata",$path="images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['biodata']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf|doc|docs|docx",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('biodata')){
						$data = $this->upload->data();				
						$biodata = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid biodata');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				$aadhar_card ='';
				if($_FILES['aadhar_card']['name'] !=""){
					$aadhar_card = $this->Digitalocean_model->upload_photo($filename="aadhar_card",$path="images/guide_pic/guide_document/");
					/*
					$tmp = explode('.', $_FILES['aadhar_card']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/guide_pic/guide_document",
						'allowed_types' => "jpg|jpeg|png|pdf",
						'encrypt_name' => TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('aadhar_card')){
						$data = $this->upload->data();				
						$aadhar_card = $data['file_name'];	
					}else{ 
						
					$this->session->set_flashdata('message','Please upload valid addhar card');
					redirect($_SERVER['HTTP_REFERER']);
					}*/
				}
				
				
				$this->Web_model->set_guide_application($photo, $signature,$secondary_subject_marksheet,$sr_secondary_subject_marksheet,$graduation_subject_marksheet,$post_graduation_subject_marksheet,$phd_subject_marksheet,$other_qualification_subject_marksheet,$biodata,$aadhar_card);
				$this->session->set_flashdata('success','Thanks for submitting your application, We will contact you soon! ');
			}else{
				$this->session->set_flashdata('message','Please accept captha');
				redirect($_SERVER['HTTP_REFERER']);
			}	
			redirect('thank_you');
		}
	}
	public function print_challan(){
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('web/print_admission_challan',$data);
	}
	public function print_cash_boucher(){
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_admission_challan_student();
		$data['fees'] = $this->Web_model->get_admission_challan_student_fees();
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('web/print_admission_cach_boucher',$data);
	}

	// placement record form
	public function placement_record_form(){
		$this->form_validation->set_rules('student_name','Please enter full name','required');
		if($this->form_validation->run() === FALSE){
			$data['country'] = $this->Web_model->get_all_country();
			$this->load->view('web/placement_record_form', $data);
		}else{
			$this->Web_model->set_placement_record_form();
			$this->session->set_flashdata('success','Placement Record Form Submitted Successfully!');
			redirect('placement_record_form');
		}
	}
	public function get_student_data_placement_record_form(){
		$this->Web_model->get_student_data_placement_record_form();
	}

	public function admission_procedure(){
		$this->load->view('web/admission_procedure');
	}
	public function university_accouts(){
		$this->load->view('web/university_accouts');
	}
	public function notice_board(){
		$this->load->view('web/notice_board');
	}
	public function press_release(){
		$this->load->view('web/press_release');
	}
	public function advertisement(){
		$this->load->view('web/advertisement');
	}
	public function vision_and_mission(){
		$this->load->view('web/vision_and_mission');
	}
	public function about_us(){
		$this->load->view('web/about');
	} 
	public function university_activities(){
		$data['image']=$this->Web_model->get_activities_image();
		$data['video']=$this->Web_model->get_activities_videos();
		$this->load->view('web/university_activities',$data);
	}
	public function all_rti(){
		$this->load->view('web/all_rti');
	}
	public function approvals(){
		$this->load->view('web/approval');
	}
	public function aicte(){
		$this->load->view('web/aicte');
	}
	public function bci(){
		$this->load->view('web/bci');
	}
	public function pci(){
		$this->load->view('web/pci');
	}
	public function bpedvi(){
		$this->load->view('web/bpedvi');
	}
	public function dedidd(){
		$this->load->view('web/dedidd');
	}
	public function bpedhi(){
		$this->load->view('web/bpedhi');
	}
	public function dedhi(){
		$this->load->view('web/dedhi');
	}
	public function dedvi(){
		$this->load->view('web/dedvi');
	}
	public function nipam(){
		$this->load->view('web/nipam');
	}
	public function btu_brouchure(){
		$this->load->view('web/btu_brouchure');
	}
	public function inner_line_permit_news(){
		$this->load->view('web/inner_line_permit_news');
	}
	public function holiday_list(){
		$this->load->view('web/holiday_list');
	}
	public function indian_council_of_agricultural_research(){
		$this->load->view('web/indian_council_of_agricultural_research');
	}
	public function aicte_link(){
		$this->load->view('web/aicte_link');
	}
	public function rti_rules(){
		$this->load->view('web/rti_rules');
	}
	public function aiu(){
		$this->load->view('web/aiu');
	}
	public function prospectus(){
		$this->load->view('web/prospectus');
	}
	public function llp_prospectus(){
		$this->load->view('web/llp_prospectus');
	}
	public function d_pharma_Brochure(){
		$this->load->view('web/d_pharma_Brochure');
	}
	public function phd_programme(){
		$this->load->view('web/phd_programme');
	}
	public function university_ugc(){
		$this->load->view('web/ugc');
	}
	public function campus(){
		$this->load->view('web/campus');
	}
	public function chairman_desk(){
		$this->load->view('web/chairman_desk');
	}
	public function chancler_message(){
		$this->load->view('web/chancler');
	}
	public function vice_chancler_message(){
		$this->load->view('web/vice_chancler');
	} 
	public function international_innovative_education_summit_dubai(){
		$this->load->view('web/international_innovative_education_summit_dubai');
	} 
	public function campus_enquiry(){
		$this->form_validation->set_rules('name','name','required');
		if($this->form_validation->run() === FALSE){
		    $data['head'] = $this->Web_model->get_enquiry_head();
			$this->load->view('web/campus_enquiry',$data);
		}else{
			$secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){				
				$this->Web_model->set_campus_enquiry_form();
				$this->session->set_flashdata('success','Thanks for submitting your query, We will contact you soon! ');
		 	}
			redirect(base_url());
		}
	}
	public function enquiry(){
	
		$this->form_validation->set_rules('name','name','required');
		if($this->form_validation->run() === FALSE){
			$data['country_quick'] = $this->Web_model->get_all_country();
			$this->load->view('web/enquiry',$data);
		}else{
			$secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){	
							
				$this->Web_model->set_enquiry_form();
				$this->session->set_flashdata('success','Thanks for submitting your query, We will contact you soon! ');
		 	}
			redirect(base_url());
		}
	}
	public function career(){
		
		$this->form_validation->set_rules('name','name','required');
		if($this->form_validation->run() === FALSE){
			$data['state'] = $this->Web_model->get_indian_state();
			$this->load->view('web/career',$data);
		}else{    
			$secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){
				$file = "";
				if($_FILES['userfile']['name'] !=""){
					$file = $this->Digitalocean_model->upload_photo($filename="userfile",$path="images/career/");
					// $config = array(
					// 	'upload_path' 	=> "images/career/",
					// 	'allowed_types' => "jpg|jpeg|png|pdf|doc",
					// 	'encrypt_name'	=> TRUE,
					// );			
					// $this->upload->initialize($config);
					// if($this->upload->do_upload('userfile')){
					// 	$data = $this->upload->data();				
					// 	$file = $data['file_name']; 
					// }else{ 
					// 	$error = array('error' => $this->upload->display_errors());	
					// 	$this->upload->display_errors();
					// 	$this->session->set_flashdata('message','Please upload pdf format only!');
					// 	redirect($_SERVER['HTTP_REFERER']);
					// }
				}
				 
				$this->Web_model->set_career_form($file);
				$this->session->set_flashdata('success','Thanks for submitting your information, We will contact you soon! ');
			}
			redirect('career');
		}
	}
	public function contact_us(){
		$this->load->view('web/contact_us');
	}
	public function upload_my_qualification(){
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
			$this->load->view('web/upload_my_qualification',$data);
		}else{
			$secondary_marksheet ='';
			if($_FILES['secondary_marksheet']['name'] !=""){
				$secondary_marksheet = $this->Digitalocean_model->upload_photo($filename="secondary_marksheet",$path="images/qualification/");
					
				// $tmp = explode('.', $_FILES['secondary_marksheet']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/qualification",
				// 	'allowed_types' => "jpg|jpeg|png|pdf",
				// 	'file_name'		=> $this->input->post('student_id')."-secondary".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('secondary_marksheet')){
				// 	$data = $this->upload->data();				
				// 	$secondary_marksheet = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$sr_secondary_marksheet ='';
			if($_FILES['sr_secondary_marksheet']['name'] !=""){
				$sr_secondary_marksheet = $this->Digitalocean_model->upload_photo($filename="sr_secondary_marksheet",$path="images/qualification/");
				
				// $tmp = explode('.', $_FILES['sr_secondary_marksheet']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/qualification",
				// 	'allowed_types' => "jpg|jpeg|png|pdf",
				// 	'file_name'	=> $this->input->post('student_id')."-sr_secondary".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('sr_secondary_marksheet')){
				// 	$data = $this->upload->data();				
				// 	$sr_secondary_marksheet = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$graduation_marksheet ='';
			if($_FILES['graduation_marksheet']['name'] !=""){
				$graduation_marksheet = $this->Digitalocean_model->upload_photo($filename="graduation_marksheet",$path="images/qualification/");
				
				// $tmp = explode('.', $_FILES['graduation_marksheet']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/qualification",
				// 	'allowed_types' => "jpg|jpeg|png|pdf",
				// 	'file_name'	=> $this->input->post('student_id')."-graduation".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('graduation_marksheet')){
				// 	$data = $this->upload->data();				
				// 	$graduation_marksheet = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$post_graduation_marksheet ='';
			if($_FILES['post_graduation_marksheet']['name'] !=""){
				$post_graduation_marksheet = $this->Digitalocean_model->upload_photo($filename="post_graduation_marksheet",$path="images/qualification/");
				
				// $tmp = explode('.', $_FILES['post_graduation_marksheet']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/qualification",
				// 	'allowed_types' => "jpg|jpeg|png|pdf",
				// 	'file_name'	=> $this->input->post('student_id')."-pg".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('post_graduation_marksheet')){
				// 	$data = $this->upload->data();				
				// 	$post_graduation_marksheet = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$other_qualification_marksheet ='';
			if($_FILES['other_qualification_marksheet']['name'] !=""){
				$other_qualification_marksheet = $this->Digitalocean_model->upload_photo($filename="other_qualification_marksheet",$path="images/qualification/");
				
				// $tmp = explode('.', $_FILES['other_qualification_marksheet']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/qualification",
				// 	'allowed_types' => "jpg|jpeg|png|pdf",
				// 	'file_name'	=> $this->input->post('student_id')."-oth".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('other_qualification_marksheet')){
				// 	$data = $this->upload->data();				
				// 	$other_qualification_marksheet = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$signature ='';
			if($_FILES['signature']['name'] !=""){
				$signature = $this->Digitalocean_model->upload_photo($filename="signature",$path="images/signature/");
				
				// $tmp = explode('.', $_FILES['signature']['name']);
				// $ext = end($tmp);
				// $config = array(
				// 	'upload_path' 	=> "images/signature",
				// 	'allowed_types' => "jpg|jpeg|png",
				// 	'file_name'	=> $this->input->post('student_id')."-sin".".".$ext,
				// );			
				// $this->upload->initialize($config);
				// if($this->upload->do_upload('signature')){
				// 	$data = $this->upload->data();				
				// 	$signature = $data['file_name'];	
				// }else{ 
				// 	//$error = array('error' => $this->upload->display_errors());	
				// 	//$this->upload->display_errors();
				// }
			}
			$result = $this->Web_model->update_qualification($secondary_marksheet,$sr_secondary_marksheet,$graduation_marksheet,$post_graduation_marksheet,$other_qualification_marksheet,$signature);
		}
	}
	public function get_unique_admission_contact(){
		$this->Web_model->get_unique_admission_contact();
	}
	public function get_unique_admission_email(){
		$this->Web_model->get_unique_admission_email();
	}
	public function all_courses(){
		$data['course'] = $this->Web_model->get_facilty_course_list();
		//echo"<pre>";
		//print_r($data);exit;
		$this->load->view('web/all_courses',$data);
	}
	public function view_course(){
		$data['course'] = $this->Web_model->get_all_course_list();
		$this->load->view('web/course_details',$data);
	}
	public function e_libraries(){
		if($this->input->post('generate') == "Generate"){
			$result = $this->Web_model->generate_enrollment_otp();
			if($result){
				$this->session->set_flashdata('success','Please check your inbox to verify your OTP');
			}else{
				$this->session->set_flashdata('message','Please enter valid enrollment number');
			}
			redirect('e-libraries');
		}
		if($this->input->post('verify') == "verify"){
			$result = $this->Web_model->verify_e_library_otp();
			if($result){
				$this->session->set_flashdata('success','OTP verified successfully');
			}else{
				$this->session->set_flashdata('message','Please enter valid otp');
			}
				redirect('e-libraries');
		}
		$this->load->view('web/e_libraries');
	}
	public function collaboration_enquiry()
	{
		$this->form_validation->set_rules('center_name', 'center name', 'required');
		if ($this->form_validation->run() === FALSE) {

			$data['country'] = $this->Web_model->get_all_country();
			$this->load->view('web/collaboration_enquiry', $data);
		} else {
			$secret = GOOGLE_CAPTCHA_SECRETE; //ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if ($responseData->success) {
				$photo = '';
				if ($_FILES['photo']['name'] != "") {
					$photo = $this->Digitalocean_model->upload_photo($filename="photo",$path="images/center/photo/");

					// $tmp = explode('.', $_FILES['photo']['name']);
					// $ext = end($tmp);
					// $config = array(
					// 	'upload_path' 	=> "images/center/photo",
					// 	'allowed_types' => "jpg|jpeg|png",
					// 	'encrypt_name'	=> TRUE,
					// );
					// $this->upload->initialize($config);
					// if ($this->upload->do_upload('photo')) {
					// 	$data = $this->upload->data();
					// 	$photo = $data['file_name'];
					// } else {
					// 	$error = array('error' => $this->upload->display_errors());
					// 	$this->upload->display_errors();
					// }
				}
				$adharcard = '';
				if ($_FILES['adhar_card']['name'] != "") {
					$adharcard = $this->Digitalocean_model->upload_photo($filename="adhar_card",$path="images/center/adharcard/");

					// $tmp = explode('.', $_FILES['adhar_card']['name']);
					// $ext = end($tmp);
					// $config = array(
					// 	'upload_path' 	=> "images/center/adharcard",
					// 	'allowed_types' => "pdf|jpg|jpeg|png",
					// 	'encrypt_name'	=> TRUE,
					// );
					// $this->upload->initialize($config);
					// if ($this->upload->do_upload('adhar_card')) {
					// 	$data = $this->upload->data();
					// 	$adharcard = $data['file_name'];
					// } else {
					// 	$error = array('error' => $this->upload->display_errors());
					// 	$this->upload->display_errors();
					// }
				}
				$pan_card = '';
				if ($_FILES['pan_card']['name'] != "") {
					$pan_card = $this->Digitalocean_model->upload_photo($filename="pan_card",$path="images/center/pan_card/");

					// $tmp = explode('.', $_FILES['pan_card']['name']);
					// $ext = end($tmp);
					// $config = array(
					// 	'upload_path' 	=> "images/center/pan_card",
					// 	'allowed_types' => "pdf|jpg|jpeg|png",
					// 	'encrypt_name'	=> TRUE,
					// );
					// $this->upload->initialize($config);
					// if ($this->upload->do_upload('pan_card')) {
					// 	$data = $this->upload->data();
					// 	$pan_card = $data['file_name'];
					// } else {
					// 	$error = array('error' => $this->upload->display_errors());
					// 	$this->upload->display_errors();
					// }
				}
				$doc_data = "";
				
				if ($_FILES['other_document']['name'] != "") {
					$doc_data = $this->Digitalocean_model->upload_photo_multiple($filename="other_document",$path="images/center/other_document/");
					// $count = count($_FILES['other_document']['name']);
					// for ($i = 0; $i < $count; $i++) {
					// 	$_FILES['file']['name'] = $_FILES['other_document']['name'][$i];
					// 	$_FILES['file']['type'] = $_FILES['other_document']['type'][$i];
					// 	$_FILES['file']['tmp_name'] = $_FILES['other_document']['tmp_name'][$i];
					// 	$_FILES['file']['error'] = $_FILES['other_document']['error'][$i];
					// 	$_FILES['file']['size'] = $_FILES['other_document']['size'][$i];


					// 	$config['upload_path'] = 'images/center/other_document';
					// 	$config['allowed_types'] = 'pdf|jpg|jpeg|png';
					// 	$config['encrypt_name'] = true;

					// 	$this->upload->initialize($config);

					// 	if ($this->upload->do_upload('file')) {
					// 		$uploadData = $this->upload->data();
					// 		$filename = $uploadData['file_name'];
					// 		$doc_data[] = $filename;
					// 	} else {
					// 		$doc_data[] = "";
					// 	}
					// }
				}
				$result = $this->Web_model->set_center_enquiry($photo, $adharcard, $pan_card, $doc_data);
			}
			$this->session->set_flashdata('success', 'Thanks, we will contact to you soon!');
			redirect('thank_you');
		}
	}
	public function admission_enquiry(){
		$this->form_validation->set_rules('full_name','name','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('web/admission_enquiry');
		}else{
			$secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){
				$result = $this->Web_model->set_enquiry();
			}
			$this->session->set_flashdata('success','Thanks, we will contact to you soon!');
			redirect(base_url());
		}
	}

	public function phd_registration_form()
	{
		$this->form_validation->set_rules('student_name', 'name', 'required');
		if ($this->form_validation->run() === FALSE) {
			$data['course'] = $this->Web_model->get_phd_course();
			$data['country'] = $this->Web_model->get_all_country();
			$data['session'] = $this->Web_model->get_active_session();
			$data['id_name'] = $this->Web_model->get_active_id_name();
			$this->load->view('web/phd_registration_form', $data);
		} else {
			$image_array = array(
				"secondary_marksheet", "sr_secondary_marksheet", "graduation_marksheet", "post_graduation_marksheet", "mphil_marksheet",
				"other_marksheet"
			);
			$image = array();
			foreach ($image_array as $img) {
				$image_upload_name = $this->phd_registration_images($img);
				$image[$img] = $image_upload_name;
			}
			$this->Web_model->save_phd_registration($image);
		}
	}
	public function phd_registration_cash(){
		$data['university_details'] = $this->Setting_model->get_university_details();
		$data['student'] = $this->Web_model->get_phd_registration_cash();
		$this->load->view('admin/SimpleFunctions');
		$this->load->view('web/phd_registration_cash',$data);
	}
	public function phd_registration_images($image_name){
		$photo ='';
			if($_FILES[$image_name]['name'] !=""){
				$photo = $this->Digitalocean_model->upload_photo($filename=$image_name,$path="images/phd_registration/");
				/*
				$tmp = explode('.', $_FILES[$image_name]['name']);
				$ext = end($tmp);
				$config = array(
					'upload_path' 	=> "images/phd_registration/",
					'allowed_types' => "jpg|jpeg|png|pdf",
					'encrypt_name'	=> TRUE,
				);			
				$this->upload->initialize($config);
				if($this->upload->do_upload($image_name)){
					$data = $this->upload->data();				
					$photo = $data['file_name'];
					return $photo;	
				}else{ 
					$error = array('error' => $this->upload->display_errors());	
					$this->upload->display_errors();
				}*/
			}
	}
	public function collaborations_with_apll(){
		$this->load->view('web/collaborations_with_apll');
	}
	public function former_president_letter(){
		$this->load->view('web/former_president_letter');
	}
	public function disaster_management(){
		$this->load->view('web/nukul_profile');
	}
	public function exam_time_table(){ 
		if($this->input->post('search') == "Search"){
			$data['timesheet'] = $this->Web_model->get_course_wise_timesheet(); 
		}
		$data['course'] = $this->Web_model->get_all_course_stream_relation();
		$this->load->view('web/exam_time_table',$data); 
	}
	public function examination_form(){
		//$this->load->view('web/examination_form');
		if($this->input->post('generate') == "Generate"){
		    $data['student'] = $this->Web_model->get_examination_student_details();
			if(!empty($data['student'])){
				$data['examination_form'] = $this->Web_model->get_student_current_examination($data['student']->id,$data['student']->year_sem);
				if($data['examination_form'] == '0'){
					$result = $this->Web_model->generate_examination_otp();
					if($result){
						$this->session->set_flashdata('success','Please check your inbox to validate otp');
					}else{
						$this->session->set_flashdata('message','This examination not open for you.');
					}
				}else{
					$this->session->set_flashdata('message','You have already filled out the form for this session.');
					redirect('examination-form');
				}
			}	
			redirect('examination-form');
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
			redirect('examination-form');
		}
		if($this->session->userdata('is_validated') == "1"){
			$this->form_validation->set_rules('year_sem','year/sem','required');
			if($this->form_validation->run() === FALSE){
				$data['student'] = $this->Web_model->get_examination_student(); 
				$data['subject'] = $this->Web_model->get_examination_subjct($data['student']->id,$data['student']->course_id,$data['student']->stream_id,$data['student']->year_sem,$data['student']->center_id);
				$this->load->view('web/examination_form',$data);
			}else{
				$result = $this->Web_model->set_examination_form();
				redirect('make_exam_payment/'.$result);
			}
		}else{
			$this->load->view('web/examination_entry');
		}
	}
	public function direct_examination_form(){ 
		$this->form_validation->set_rules('year_sem','year/sem','required');
		if($this->form_validation->run() === FALSE){
			$data['student'] = $this->Web_model->get_direct_examination_student(); 
			$data['subject'] = $this->Web_model->get_examination_subjct($data['student']->id,$data['student']->course_id,$data['student']->stream_id,$data['student']->year_sem,$data['student']->center_id);
			$this->load->view('web/examination_form_direct',$data);
		}else{
			$result = $this->Web_model->set_direct_examination_form();
			redirect('make_exam_payment/'.$result);
		}  
	}
	public function re_appear_form(){
		if($_GET['enrollment_number'] == ""){
			$this->load->view('web/re_appear_form');
		}else{
			$this->form_validation->set_rules('enrollment_number','enrollment number','required');
			if($this->form_validation->run() === FALSE){
				$data['student'] = $this->Web_model->get_student_re_appear_exam(); 
				$this->load->view('web/re_appear_form',$data);
			}else{
				$this->Web_model->set_re_appear();
			}
		}
	}
	public function print_exam_cash_boucher(){
		$data['student'] = $this->Web_model->get_examination_cash_boucher_student();
		$this->load->view('admin/SimpleFunctions');
		$data['university_details'] = $this->Setting_model->get_university_details();
		$this->load->view('web/print_exam_cash_boucher',$data);
	}
	public function resend_exam_otp(){
		$result = $this->Web_model->re_generate_examination_otp();
		$this->session->set_flashdata('success','Please check your inbox to validate otp'); 
		redirect('examination-form');
	}
	public function reset_exam_form(){
		$session = array(
			'exam_session_id'	=> '',
			'exam_mobile' 		=> '',
			'exam_email' 		=> '',
			'exam_otp' 			=> '',
			'is_validated' 		=> '',
		);
		$this->session->set_userdata($session);
		redirect('examination-form');
	}
	public function extension_activities(){
		$this->load->view('web/extension_activities');
	}
	public function jivan_hospital(){
		$this->load->view('web/jivan_hospital');
	}
	public function hallticket(){
		/*$data['students'] = $this->Web_model->get_hall_ticket();
		
		if(empty($data['students'])){
			$this->load->view('web/download_hallticket');
		}else{
			
			$data['subject'] = $this->Web_model->get_hall_ticket_subject($data['students']->id,$data['students']->student_id);
			
			$this->load->view('web/hallticket',$data);
		}*/
		
		if($this->uri->segment(2) != ""){
			
			$data['student'] = $this->Web_model->get_center_student_hall_ticket();
			
			if(empty($data['student'])){
				redirect('center_active_hall_ticket_list');
			}else{
				
				$data['subject'] = $this->Web_model->get_hall_ticket_subject($data['student']->id,$data['student']->student_id);
			
				$this->load->view('web/hallticket',$data);
			}
		}else{
		    $data['students'] = $this->Web_model->get_hall_ticket();
	
			if(empty($data['students'])){
				$this->load->view('web/download_hallticket');
			}else{
				
				$data['subject'] = $this->Web_model->get_hall_ticket_subject($data['students']->id,$data['students']->student_id);
				
				$this->load->view('web/hallticket',$data);
			}
			//$this->load->view('web/download_hallticket');
		}
		
	}
	public function hallticket_re_appear(){
		$data['students'] = array();
		if(isset($_GET['enrollment_number']) && $_GET['enrollment_number'] !=""){
			$data['students'] = $this->Web_model->get_re_appear_hall_ticket();  
		}
		if(empty($data['students'])){
			$this->load->view('web/re_appear_download_hallticket');
		}else{  
			$this->load->view('web/re_appear_hallticket',$data);
		}  
	}
	public function syllabus_list(){
		$this->load->view('web/syllabus_list');
	}
	public function result_view(){
		$data['student'] = array();
		if($this->input->post('search')){
			$data['student'] = $this->Web_model->get_my_result();
		}
		$this->load->view('web/result_view',$data);
	}
	public function demo_form(){
		$this->form_validation->set_rules('enrollment_number','Enrollment number','required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('web/demo_form');
		}else{
			$result = $this->Web_model->set_demo_payment();
		}
	}
	public function get_student_data_ajax(){
		$this->Web_model->get_student_data_ajax();
	}

	public function phd_course_work(){
		if($this->input->post()){
			if(!empty($this->input->post("generate"))){
				$data["stu_data"] = $this->Web_model->get_student_data_by_enrollment_no();
				$data["schedule_dates"] = $this->Web_model->get_phd_course_work_schedule_dates();
				$this->load->view("web/phd_course_work_form",$data);
			}
			if(!empty($this->input->post("payment_ammount"))){

				$this->Web_model->set_phd_course_work_form_data();
			}
			// print_r( $this->input->post());
		}else{
			if(!empty($this->uri->segment(2))){
				$this->load->view("web/phd_course_work_enrollment");
				
			}
			else{
				$this->load->view("web/phd_course_work");
			}
		}
	}
	
	public function enrollment_verification(){
		$data["data"] = array();
		if($this->input->post()){
			$data["data"] = $this->Web_model->enrollment_verification();
		}
		
		$this->load->view("web/enrollment_verification",$data);
	}
	
	public function document_verification(){ 
		$this->form_validation->set_rules("name","name","required");
		if($this->form_validation->run()===FALSE){
			$this->load->view("web/document_verification");
		}else{ 
			$fileName = ""; 
			$fileName = $this->Digitalocean_model->upload_photo_multiple($filename="files",$path="uploads/document_verification/");
			
			/*
			$count = count($_FILES['files']['name']);
			// echo $count;exit;
			for($i=0; $i<$count; $i++){

		          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
		          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
		          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
		          $_FILES['file']['size'] = $_FILES['files']['size'][$i];

 
		          $config['upload_path'] = 'uploads/document_verification/'; 
		          $config['allowed_types'] = '*';
		          $config['encrypt_name'] = true;
					
				  $this->upload->initialize($config); 

   				  if($this->upload->do_upload('file')){
                   		$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						$doc_data[] = $filename;
          			}else{
						$doc_data[] = "";
          			}
			}*/
			$this->Web_model->document_verification($fileName);
			redirect("document-verification");
		}

	}
	public function caste_based_discrimination(){
		$this->form_validation->set_rules("first_name","first name","required");
		if($this->form_validation->run()===FALSE){
			$this->load->view("web/caste_based_discrimination");
		}else{
			 $secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
			 $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			 $responseData = json_decode($verifyResponse);
			 if($responseData->success){
				$this->Web_model->set_caste_based_discrimination();
				$this->session->set_flashdata('success','Complaint successfully registered.'); 
				redirect("caste-based-discrimination");
			 }else{
			 	redirect("caste-based-discrimination");
			 }
		}
	}
	public function appointment_letter_for_supervisors(){
		if($this->input->post('generate') == "Generate"){
			$result = $this->Web_model->verify_supervisor();
			if($result == 0){
				$this->session->set_flashdata('message','Please enter vaild password.'); 
				redirect('appointment-letter-for-supervisors');
			}
		}else{
			$data['guide'] = $this->Web_model->get_single_guide_data();
			$this->load->view("web/appointment_letter_for_supervisors",$data);
		}
	}
	public function online_classes(){
	    $data['classes'] = array();
	    if($this->input->get('enrollment')){
		    $data['classes'] = $this->Web_model->get_online_classes();
	    }
		$this->load->view("web/online_classes_list",$data); 
	}
	public function accreditation(){ 
		$this->load->view("web/accreditation"); 
	}
	public function terms(){
		$this->load->view('web/terms');
	}
	public function privacy_policy(){
		$this->load->view('web/privacy_policy');
	}
	public function awards(){
		$this->load->view('web/awards');
	}
	public function members_and_certification(){
		$this->load->view('web/members_and_certification');
	}
	public function rehabilitation_council_of_india(){
		$this->load->view('web/rehabilitation_council_of_india');
	}
	public function membership_accreditation(){
		$this->load->view('web/membership_accreditation');
	}
	public function information_center(){
		$this->load->view('web/information_center');
	}
	public function collaboration_form(){
		$this->form_validation->set_rules('center_name','Center name','required');
		if($this->form_validation->run() === FALSE){
			$data['country'] = $this->Web_model->get_all_country();
			$data['information_center'] = $this->Web_model->get_auth_letter_information_center();
			$this->load->view('web/collaboration_form',$data);
		}else{
			$secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){
				$photo ='';
				if($_FILES['photo']['name'] !=""){
					$photo = $this->Digitalocean_model->upload_photo($filename="photo",$path="images/center/photo/");
					/*
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
					}*/
				}
				$adharcard ='';
				if($_FILES['adhar_card']['name'] !=""){
					$adharcard = $this->Digitalocean_model->upload_photo($filename="adhar_card",$path="images/center/adharcard/");
					/*
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
					}*/
				}
				$pan_card ='';
				if($_FILES['pan_card']['name'] !=""){
					$pan_card = $this->Digitalocean_model->upload_photo($filename="pan_card",$path="images/center/pan_card/");
					/*
					$tmp = explode('.', $_FILES['pan_card']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/center/pan_card",
						'allowed_types' => "pdf|jpg|jpeg|png",
						'encrypt_name'	=> TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('pan_card')){
						$data = $this->upload->data();				
						$pan_card = $data['file_name'];	
					}else{ 
						$error = array('error' => $this->upload->display_errors());	
						$this->upload->display_errors();
					}*/
				} 
				$fileName = ""; 
				
				if($_FILES['other_document']['name'] !=""){
					$fileName = $this->Digitalocean_model->upload_photo_multiple($filename="other_document",$path="images/center/other_document/");
					
					/*$count = count($_FILES['other_document']['name']);
					for($i=0; $i<$count; $i++){
						$_FILES['file']['name'] = $_FILES['other_document']['name'][$i];
						$_FILES['file']['type'] = $_FILES['other_document']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['other_document']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['other_document']['error'][$i];
						$_FILES['file']['size'] = $_FILES['other_document']['size'][$i];

		 
						$config['upload_path'] = 'images/center/other_document'; 
						$config['allowed_types'] = 'pdf|jpg|jpeg|png';
						$config['encrypt_name'] = true;
							
						$this->upload->initialize($config); 

						if($this->upload->do_upload('file')){
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$doc_data[] = $filename;
						}else{
							$doc_data[] = "";
						}
					}*/
				}
				$this->Web_model->set_collaboration_form($photo,$adharcard,$pan_card,$fileName);
				$this->session->set_flashdata('success','Form submited successfully.'); 
				redirect("thank_you");
			}else{
				redirect(base_url());
			}
		}
		 
	}
	
	public function get_center_unique_email(){
		$this->Web_model->get_center_unique_email();
	}
	public function get_center_unique_contact_number(){
		$this->Web_model->get_center_unique_contact_number();
	}
	public function generate_cash_receipt(){
		if($this->input->post('verify_btuutn') == "Verify Now"){
			if($this->input->post('password') == "ABZB"){
				$session = array(
					'receipt_password' => $this->input->post('password')
				);
				$this->session->set_userdata($session);
				$this->session->set_flashdata('success','Password verified successfully');
				redirect('generate_cash_receipt');
			}else{
				$this->session->set_flashdata('message','Please enter valid password');
				redirect('generate_cash_receipt'); 
			}
		}
		$this->form_validation->set_rules('name','name','required');
		if($this->form_validation->run() === FALSE){
			$data['course'] = $this->Web_model->get_all_course_stream_relation();
			$this->load->view('web/generate_cash_receipt',$data);
		}else{
			$this->Web_model->set_generate_cash_receipt(); 
		}
	}
	public function print_cash_receipt(){
		$data['payment']  = $this->Web_model->get_print_receipt();
		$this->load->view('web/print_cash_receipt',$data);
	}
	public function get_student_data(){
		$this->Web_model->get_student_data();
	}
	public function course_detail_page(){
		$data['course']  = $this->Web_model->get_course_details();
		$this->load->view('web/course_detail_page',$data);
	}
	public function submit_enquiry(){
		$secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		if($responseData->success){
			$this->Web_model->submit_enquiry();
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function direct_submit_enquiry(){
		$secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		if($responseData->success){
			$this->Web_model->direct_submit_enquiry();
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function thank_you_for_enquiry(){
		$this->load->view('web/thank_you_for_enquiry');
	}
	public function education_minister_manipur(){
		$this->load->view('web/education_minister_manipur');
	}
	public function governor_massage(){
		$this->load->view('web/governor_massage');
	}
	public function collaboration_enquiry_foreign(){
		$this->form_validation->set_rules('center_name','center name','required');
		if($this->form_validation->run() === FALSE){
			
			$data['country'] = $this->Web_model->get_all_country();
			$this->load->view('web/collaboration_enquiry_foreign',$data);
		}else{
		
			$secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){
				$photo ='';
				if($_FILES['photo']['name'] !=""){
					$photo = $this->Digitalocean_model->upload_photo($filename="photo",$path="images/center/photo/");
					/*
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
					}*/
				}
				$passport ='';
				if($_FILES['passport']['name'] !=""){
					$passport = $this->Digitalocean_model->upload_photo($filename="passport",$path="images/center/passport/");
					/*
					$tmp = explode('.', $_FILES['passport']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/center/passport",
						'allowed_types' => "pdf|jpg|jpeg|png",
						'encrypt_name'	=> TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('passport')){
						$data = $this->upload->data();				
						$passport = $data['file_name'];	
					}else{ 
						$error = array('error' => $this->upload->display_errors());	
						$this->upload->display_errors();
					}*/
				}
				$doc_data = array();
				$fileName = ""; 
				if($_FILES['other_document']['name'] !=""){
					
					$fileName = $this->Digitalocean_model->upload_photo_multiple($filename="userfile",$path="uploads/syllabus/");
					/*$count = count($_FILES['other_document']['name']);
					for($i=0; $i<$count; $i++){
						$_FILES['file']['name'] = $_FILES['other_document']['name'][$i];
						$_FILES['file']['type'] = $_FILES['other_document']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['other_document']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['other_document']['error'][$i];
						$_FILES['file']['size'] = $_FILES['other_document']['size'][$i];

		 
						$config['upload_path'] = 'images/center/other_document'; 
						$config['allowed_types'] = 'pdf|jpg|jpeg|png';
						$config['encrypt_name'] = true;
							
						$this->upload->initialize($config); 

						if($this->upload->do_upload('file')){
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$doc_data[] = $filename;
						}else{
							$doc_data[] = "";
						}
					}*/
				} 
				$result = $this->Web_model->set_center_enquiry_foreign($photo,$passport,$fileName);
			}
			$this->session->set_flashdata('success','Thanks, we will contact to you soon!');
			redirect('thank_you');
		}
	}
	public function collaboration_form_foreign(){
		$this->form_validation->set_rules('center_name','Center name','required');
		if($this->form_validation->run() === FALSE){
			$data['country'] = $this->Web_model->get_all_country();
			$this->load->view('web/collaboration_form_foreign',$data);
		}else{
			$secret = GOOGLE_CAPTCHA_SECRETE;//ac.in
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){
				$photo ='';
				if($_FILES['photo']['name'] !=""){
					$photo = $this->Digitalocean_model->upload_photo($filename="photo",$path="images/center/photo/");
					/*
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
					}*/
				}
				$passport ='';
				if($_FILES['passport']['name'] !=""){
					$passport = $this->Digitalocean_model->upload_photo($filename="passport",$path="images/center/passport/");
					/*
					$tmp = explode('.', $_FILES['passport']['name']);
					$ext = end($tmp);
					$config = array(
						'upload_path' 	=> "images/center/passport",
						'allowed_types' => "pdf|jpg|jpeg|png",
						'encrypt_name'	=> TRUE,
					);			
					$this->upload->initialize($config);
					if($this->upload->do_upload('passport')){
						$data = $this->upload->data();				
						$passport = $data['file_name'];	
					}else{ 
						$error = array('error' => $this->upload->display_errors());	
						$this->upload->display_errors();
					}*/
				}
				$doc_data = array();
				$fileName = ""; 
				if($_FILES['other_document']['name'] !=""){
					
					$fileName = $this->Digitalocean_model->upload_photo_multiple($filename="other_document",$path="images/center/other_document/");
					/*
					$count = count($_FILES['other_document']['name']);
					for($i=0; $i<$count; $i++){
						$_FILES['file']['name'] = $_FILES['other_document']['name'][$i];
						$_FILES['file']['type'] = $_FILES['other_document']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['other_document']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['other_document']['error'][$i];
						$_FILES['file']['size'] = $_FILES['other_document']['size'][$i];

		 
						$config['upload_path'] = 'images/center/other_document'; 
						$config['allowed_types'] = 'pdf|jpg|jpeg|png';
						$config['encrypt_name'] = true;
							
						$this->upload->initialize($config); 

						if($this->upload->do_upload('file')){
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];
							$doc_data[] = $filename;
						}else{
							$doc_data[] = "";
						}
					}*/
				}
				$this->Web_model->set_collaboration_form_foreign($photo,$passport,$doc_data);
				$this->session->set_flashdata('success','Form submited successfully.'); 
				redirect("thank_you");
			}else{
				redirect(base_url());
			}
		}
	}
	public function membership(){

	    $this->load->view('web/membership');
	} 
	public function appreciation_list(){
	    $this->load->view('web/appreciation_list');
	} 
	public function addesment_form_sample(){
	    $this->load->view('web/addesment_form_sample');
	}
	public function teacher_assessment_form(){
	    $this->load->view('web/teacher_assessment_form');
	}
	public function industry_assessment_form(){
	    $this->load->view('web/industry_assessment_form');
	}
	
}
