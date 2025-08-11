<?php 
$university_details = $this->Setting_model->get_university_details();
include('Authentication.php');
$query = $_REQUEST['encResponse']; 
$authKey = AUTH_KEY;
$authIV = AUTH_IV; 
$decText = null;
$AesCipher = new AesCipher();
$decText = $AesCipher->decrypt($authKey, $authIV, $query); 
$token = strtok($decText, "&");   
$rcvdString = $AesCipher->decrypt($authKey, $authIV, $query); 
$order_status = "";
$order_id = "";
$tracking_id = "";
$bank_ref_no = "";
$amount = "0";
$payment_by = "";
$decryptValues = explode('&', $rcvdString);

$dataSize = sizeof($decryptValues);
for ($i = 0; $i < $dataSize; $i++) {
	$information = explode('=', $decryptValues[$i]);
	if ($i == 11)	$order_status = $information[1];
	if ($i == 4)	$ex_order_id = $information[1];
	if ($i == 14)	$tracking_id = $information[1];
	if ($i == 5)	$amount = $information[1];
	if ($i == 8)	$payment_by = $information[1];
}
$order_id = explode("___", $ex_order_id);
$order_id = $order_id[1];


	$data = array(
		'transaction_id' => $tracking_id,
	);
	$this->db->where('id',$order_id);
	$this->db->update('tbl_document_verification',$data);

	$this->db->where('transaction_id',$tracking_id);
	// $this->db->where('id !=',$order_id);
	$exist = $this->db->get('tbl_document_verification');
	$exist = $exist->row();

	if(empty($exist)){
	    //echo "exist";
		$order_status = "Failure";
	}


	//echo $this->session->userdata('session_amount')."a"		
	/*if($this->session->userdata('session_amount') != $amount){
	   // echo "amount";
		$order_status = "Failure";
	};
	if($this->session->userdata('order_id') != $order_id){
	    //echo "order";
		$order_status = "Failure";
	}*/

	$this->db->where('id',$order_id);
	$real_fees = $this->db->get('tbl_document_verification');
	$real_fees = $real_fees->row();

	// echo "<pre>";print_r($real_fees);exit;

	if($order_status==="Success" && $real_fees->amount == $amount)
	{
			$data = array(
				'transaction_id' 		=> $tracking_id,
				'payment_ammount' 		=> $amount,
				'payment_status' 		=> '1',
			);

			// echo "<pre>";print_r($data);exit;
			$this->db->where('id',$order_id);
			$this->db->update('tbl_document_verification',$data);
			// echo "<pre>";print_r($data);exit;
			
			$this->db->where('id',$order_id);
			$suc_pay = $this->db->get('tbl_document_verification');
			$suc_pay = $suc_pay->row();	
			
			// echo "<pre>";print_r($suc_pay);exit;
			
			 
			$exam_data = array(
				'payment_id' 			=> $tracking_id,
				'payment_status' 		=> '1',
			);
			$this->db->where('id',$suc_pay->examination_id);
			$this->db->where('payment_status','0'); 
			$this->db->update('tbl_document_verification',$exam_data);
			
			// echo "<pre>";print_r($exam_data);exit;
			//echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
		
	}
	
	else if($order_status==="Aborted")
	{
		//echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
	
	}
	else if($order_status==="Failure")
	{
		//echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
	}
	else
	{
		//echo "<br>Security Error. Illegal access detected";
	
	}
	 

$this->db->where('id',$order_id);
$result = $this->db->get('tbl_document_verification');
$result = $result->row();	

$receipt_no = "";
if(strlen($result->id) == "1"){
	$receipt_no = "DVF-000".$result->id;    
}else if(strlen($result->id) == "2"){
	$receipt_no = "DVF-00".$result->id;     
}else if(strlen($result->id) == "3"){
	$receipt_no = "DVF-0".$result->id;     
}else{
	$receipt_no = "DVF-".$result->id;
}
$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
$enrollment_number = $result->enrollment_number;
$student_name = $result->name;
$print_name = $result->course_name;
$stream_name = "";
$address = $result->address;
$mobile = $result->mobile_number;
$email = $result->email;
$ref_level = "Enrollment No";
$pay_for="Document Verification Fees";
$transaction_id = $result->transaction_id;
$print_amount = $result->amount;
include('final_receipt.php');
	
?> 	 