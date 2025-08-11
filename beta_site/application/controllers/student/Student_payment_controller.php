<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Student_payment_controller extends CI_Controller {
	
	
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

 	public function pay_migration_certificate_fees(){
		$data['student'] = $this->Students_model->set_pay_migration_certificate_fees();
		
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
		 
		$this->load->view('student/migration_certificate_payment',$data);
	}

	public function payvia_freecharge_migration_certificate_fees($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "BTU_FC_PYMT_".$otp.$data['id'];
		$req->amount = $data['total_fees'].".00";
// 		$req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'migration_certificate_freecharge?id='.$data['id'];
		$req->surl = base_url().'migration_certificate_freecharge?id='.$data['id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function migration_certificate_freecharge(){
		$this->Students_model->update_migration_certificate_payment();
		// $this->session->set_flashdata("success","")
		redirect("migration-certificate");
	}
	
		public function pay_transfer_certificate_fees(){

		$data['student'] = $this->Students_model->set_pay_transfer_certificate_fees();

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
		 
		$this->load->view('student/transfer_certificate_payment',$data);
	}

	public function payvia_freecharge_transfer_certificate_fees($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "TGU_FC_PYMT_".$otp.$data['id'];
		$req->amount = $data['total_fees'].".00";
// 		$req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'transfer_certificate_freecharge?id='.$data['id'];
		$req->surl = base_url().'transfer_certificate_freecharge?id='.$data['id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function transfer_certificate_freecharge(){
		$this->Students_model->update_transfer_certificate_payment();
		// $this->session->set_flashdata("success","")
		redirect("transfer-certificate");
	}
	   
		public function pay_recommendation_letter_fees(){
		$data['student'] = $this->Students_model->set_pay_recommendation_letter_fees();

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
		 
		$this->load->view('student/recommendation_letter_payment',$data);
	}


	public function payvia_freecharge_recommendation_letter_fees($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "BTU_FC_PYMT_".$otp.$data['id'];
		$req->amount = $data['total_fees'].".00";
// 		$req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'recommendation_letter_freecharge?id='.$data['id'];
		$req->surl = base_url().'recommendation_letter_freecharge?id='.$data['id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function recommendation_letter_freecharge(){
		$this->Students_model->update_recommendation_letter_payment();
		// $this->session->set_flashdata("success","")
		redirect("latter-of-recommendation");
	}
	
	
	// degree related work

	public function pay_degree_fees(){
		$data['student'] = $this->Students_model->set_pay_degree_fees();
		//echo "<pre>";
		//print_r($data);exit;

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
		 
		$this->load->view('student/degree_payment',$data);
	}


	public function payvia_freecharge_degree_fees($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "BTU_FC_PYMT_".$otp.$data['id'];
		$req->amount = $data['total_fees'].".00";
		// $req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'degree_freecharge?id='.$data['id'];
		$req->surl = base_url().'degree_freecharge?id='.$data['id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function degree_freecharge(){
		$this->Students_model->update_degree_payment();
		// $this->session->set_flashdata("success","")
		redirect("student-degree");
	}
	
	// provisional degree related work

	public function pay_provisional_degree_fees(){
		$data['student'] = $this->Students_model->set_pay_provisional_degree_fees();
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
		 
		$this->load->view('student/provisional_degree_payment',$data);
	}


	public function payvia_freecharge_provisional_degree_fees($data){
		$req = new stdClass();
		$otp = rand ( 10000 , 99999 );
		$req->merchantTxnId = "BTU_FC_PYMT_".$otp.$data['id'];
		$req->amount = $data['total_fees'].".00";
		// $req->amount = "1.00";
		//$req->amount = number_format(1,2);
		$req->currency = "INR";
		$req->furl = base_url().'provisional_degree_freecharge?id='.$data['id'];
		$req->surl = base_url().'provisional_degree_freecharge?id='.$data['id'];
		$req->email = $data['email'];
		$req->mobile = $data['mobile'];
		$req->customerName = $data['student_name'];
		$req->channel = "WEB";
		$req->merchantId = "YpvEjekeEmpXRq";
		$req->customNote = "PAID VIA FREECHARGE";
		return (array)$req;
	}

	public function provisional_degree_freecharge(){
		$this->Students_model->update_provisional_degree_payment();
		// $this->session->set_flashdata("success","")
		redirect("student-provisional-degree");
	}
	public function student_degree_ccavRequestHandler(){
		$this->load->view('payment/student_degree_ccavRequestHandler');
	}
	public function student_degree_ccavResponseHandler(){
		$this->load->view('payment/student_degree_ccavResponseHandler');
	}
	public function student_migration_ccavRequestHandler(){
		$this->load->view('payment/student_migration_ccavRequestHandler');
	}
	public function student_migration_ccavResponseHandler(){
		$this->load->view('payment/student_migration_ccavResponseHandler');
	}
	public function student_transfer_ccavRequestHandler(){
		$this->load->view('payment/student_transfer_ccavRequestHandler');
	}
	public function student_transfer_ccavResponseHandler(){
		$this->load->view('payment/student_transfer_ccavResponseHandler');
	}
	public function student_recommendation_ccavRequestHandler(){
		$this->load->view('payment/student_recommendation_ccavRequestHandler');
	}
	public function student_recommendation_ccavResponseHandler(){
		$this->load->view('payment/student_recommendation_ccavResponseHandler');
	}
	public function student_provisional_ccavRequestHandler(){
		$this->load->view('payment/student_provisional_ccavRequestHandler');
	}
	public function student_provisional_ccavResponseHandler(){
		$this->load->view('payment/student_provisional_ccavResponseHandler');
	}
	public function pay_transcrip_certificate_fees(){
	    $data['transcript'] = $this->Students_model->get_transcript();
	    $this->load->view('student/transcript_payment',$data);
	}
	public function student_transcript_ccavRequestHandler(){
		$this->load->view('payment/student_transcript_ccavRequestHandler');
	}
	public function student_transcript_ccavResponseHandler(){
		$this->load->view('payment/student_transcript_ccavResponseHandler');
	}
	
}
