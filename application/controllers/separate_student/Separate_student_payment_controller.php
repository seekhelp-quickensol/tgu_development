<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Separate_student_payment_controller extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
// 		$this->is_logged(); 
	}
// 	public function is_logged(){
// 		if($this->session->userdata('separate_student_id') == ""){
// 			redirect('student-login');
// 		}
// 	}

	

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
	

	// ---------------------------   10/6/2021     ----------------------------

 	public function s_pay_migration_certificate_fees(){
		$data['student'] = $this->Separate_students_model->set_pay_migration_certificate_fees();
		
		/*$data['payment_details'] = array(
			'id' 			=> $data['student']->id, // migration table id
			'email' 		=> $data['student']->email,
			'mobile' 		=> $data['student']->mobile,
			'student_name' 	=> $data['student']->student_name,
			'total_fees' 	=> $data['student']->amount,
		);
		$freecharge_data = $this->payvia_freecharge_migration_certificate_fees($data['payment_details']);
		$data['req'] = $freecharge_data;
		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		 
		$this->load->view('separate_student/migration_certificate_payment',$data);
	}

	public function payvia_freecharge_migration_certificate_fees($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "TGU_FC_PYMT_".$otp.$data['id'];
		$req->amount = $data['total_fees'].".00";
// 		$req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'s_migration_certificate_freecharge?id='.$data['id'];
		$req->surl = base_url().'s_migration_certificate_freecharge?id='.$data['id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function s_migration_certificate_freecharge(){
		$this->Separate_students_model->update_migration_certificate_payment();
		// $this->session->set_flashdata("success","")
		redirect("s-migration-certificate");
	}


	public function s_pay_transfer_certificate_fees(){

		$data['student'] = $this->Separate_students_model->set_pay_transfer_certificate_fees();

		/*$data['payment_details'] = array(
			'id' 			=> $data['student']->id,          // Transfer table id
			'email' 		=> $data['student']->email,          
			'mobile' 		=> $data['student']->mobile,
			'student_name' 	=> $data['student']->student_name,
			'total_fees' 	=> $data['student']->amount,
		);

		$freecharge_data = $this->payvia_freecharge_transfer_certificate_fees($data['payment_details']);

		$data['req'] = $freecharge_data;

		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		 
		$this->load->view('separate_student/transfer_certificate_payment',$data);
	}

	public function payvia_freecharge_transfer_certificate_fees($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "TGU_FC_PYMT_".$otp.$data['id'];
		$req->amount = $data['total_fees'].".00";
// 		$req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'s_transfer_certificate_freecharge?id='.$data['id'];
		$req->surl = base_url().'s_transfer_certificate_freecharge?id='.$data['id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function s_transfer_certificate_freecharge(){
		$this->Separate_students_model->update_transfer_certificate_payment();
		// $this->session->set_flashdata("success","")
		redirect("s-transfer-certificate");
	}


	public function s_pay_recommendation_letter_fees(){
		$data['student'] = $this->Separate_students_model->set_pay_recommendation_letter_fees();

		/*$data['payment_details'] = array(
			'id' 			=> $data['student']->id,          // Transfer table id
			'email' 		=> $data['student']->email,          
			'mobile' 		=> $data['student']->mobile,
			'student_name' 	=> $data['student']->student_name,
			'total_fees' 	=> $data['student']->amount,
		);

		$freecharge_data = $this->payvia_freecharge_recommendation_letter_fees($data['payment_details']);

		$data['req'] = $freecharge_data;

		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		 
		$this->load->view('separate_student/recommendation_letter_payment',$data);
	}


	public function payvia_freecharge_recommendation_letter_fees($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "TGU_FC_PYMT_".$otp.$data['id'];
		$req->amount = $data['total_fees'].".00";
// 		$req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'s_recommendation_letter_freecharge?id='.$data['id'];
		$req->surl = base_url().'s_recommendation_letter_freecharge?id='.$data['id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function s_recommendation_letter_freecharge(){
		$this->Separate_students_model->update_recommendation_letter_payment();
		// $this->session->set_flashdata("success","")
		redirect("s-latter-of-recommendation");
	}


	// degree related work

	public function s_pay_degree_fees(){
		$data['student'] = $this->Separate_students_model->set_pay_degree_fees();

		/*$data['payment_details'] = array(
			'id' 			=> $data['student']->id,          // Transfer table id
			'email' 		=> $data['student']->email,          
			'mobile' 		=> $data['student']->mobile,
			'student_name' 	=> $data['student']->student_name,
			'total_fees' 	=> $data['student']->amount,
		);

		$freecharge_data = $this->payvia_freecharge_degree_fees($data['payment_details']);

		$data['req'] = $freecharge_data;

		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		 
		$this->load->view('separate_student/degree_payment',$data);
	}


	public function payvia_freecharge_degree_fees($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "TGU_FC_PYMT_".$otp.$data['id'];
		$req->amount = $data['total_fees'].".00";
// 		$req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'s_degree_freecharge?id='.$data['id'];
		$req->surl = base_url().'s_degree_freecharge?id='.$data['id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function s_degree_freecharge(){
		$this->Separate_students_model->update_degree_payment();
		// $this->session->set_flashdata("success","")
		redirect("s-student-degree");
	}


	// provisional degree related work

	public function s_pay_provisional_degree_fees(){
		$data['student'] = $this->Separate_students_model->set_pay_provisional_degree_fees();
		
		// print_r($data['student']);exit;
		/*$data['payment_details'] = array(
			'id' 			=> $data['student']->id,          // Transfer table id
			'email' 		=> $data['student']->email,          
			'mobile' 		=> $data['student']->mobile,
			'student_name' 	=> $data['student']->student_name,
			'total_fees' 	=> $data['student']->amount,
		);

		$freecharge_data = $this->payvia_freecharge_provisional_degree_fees($data['payment_details']);

		$data['req'] = $freecharge_data;

		$data['checksum'] = $this->generateChecksumForJson ( json_decode ( json_encode ( $data['req'] ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "67726486-8226-41d2-a062-93702cc630ba" );*/
		 
		$this->load->view('separate_student/provisional_degree_payment',$data);
	}


	public function payvia_freecharge_provisional_degree_fees($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "TGU_FC_PYMT_".$otp.$data['id'];
		$req->amount = $data['total_fees'].".00";
// 		$req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'s_provisional_degree_freecharge?id='.$data['id'];
		$req->surl = base_url().'s_provisional_degree_freecharge?id='.$data['id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function s_provisional_degree_freecharge(){
		$this->Separate_students_model->update_provisional_degree_payment();
		// $this->session->set_flashdata("success","")
		redirect("s-student-provisional-degree");
	}
	
	
	
	public function student_provisional_ccavRequestHandler(){
		$this->load->view('payment/separate_student_provisional_ccavRequestHandler');
	}
	public function student_provisional_ccavResponseHandler(){
		$this->load->view('payment/separate_student_provisional_ccavResponseHandler');
	}
	public function student_degree_ccavRequestHandler(){
		$this->load->view('payment/separate_student_degree_ccavRequestHandler');
	}
	public function student_degree_ccavResponseHandler(){
		$this->load->view('payment/separate_student_degree_ccavResponseHandler');
	}
	public function student_migration_ccavRequestHandler(){
		$this->load->view('payment/separate_student_migration_ccavRequestHandler');
	}
	public function student_migration_ccavResponseHandler(){
		$this->load->view('payment/separate_student_migration_ccavResponseHandler');
	}
	public function student_transfer_ccavRequestHandler(){
		$this->load->view('payment/separate_student_transfer_ccavRequestHandler');
	}
	public function student_transfer_ccavResponseHandler(){
		$this->load->view('payment/separate_student_transfer_ccavResponseHandler');
	}
	public function student_recommendation_ccavRequestHandler(){
		$this->load->view('payment/separate_student_recommendation_ccavRequestHandler');
	}
	public function student_recommendation_ccavResponseHandler(){
		$this->load->view('payment/separate_student_recommendation_ccavResponseHandler');
	}
    public function pay_transcrip_certificate_fees(){
	    $data['transcript'] = $this->Separate_students_model->get_transcript();
	    $data['student'] = $this->Separate_students_model->get_student_profile_with_course();
	    $this->load->view('separate_student/transcript_payment',$data);
	}
	public function student_transcript_ccavRequestHandler(){
		$this->load->view('payment/student_transcript_ccavRequestHandler');
	}
	public function student_transcript_ccavResponseHandler(){
		$this->load->view('payment/student_transcript_ccavResponseHandler');
	}
}
