<?php 
$university_details = $this->Front_model->get_university_details(); 
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
		'transaction_id' 	=> $tracking_id, 
		'reference_number' 	=> $bank_ref_no, 
	); 
	$this->db->where('id',$order_id); 
	$this->db->update('tbl_reccom_letter_application',$data);  
	$this->db->where('transaction_id',$tracking_id); 
	$this->db->where('id !=',$order_id); 
	$exist = $this->db->get('tbl_reccom_letter_application'); 
	$exist = $exist->row(); 
	if(!empty($exist)){  
		$order_status = "Failure"; 
	} 
	/*echo $this->session->userdata('degree_order_id');exit; 
	//echo $this->session->userdata('session_amount')."a"	 
	if($this->session->userdata('session_amount') != $amount){ 
	   // echo "amount"; 
		$order_status = "Failure"; 
	};  
	if($this->session->userdata('degree_order_id') != $order_id){ 
	    //echo "order"; 
		$order_status = "Failure"; 
	}*/ 
	$this->db->where('id',$order_id); 
	$real_fees =$this->db->get('tbl_reccom_letter_application'); 
	$real_fees =$real_fees->row(); 
	if($order_status==="Success"){ 
		$data = array( 
			'transaction_id' 	=> $tracking_id, 
			'reference_number' 	=> $bank_ref_no, 
			'amount' 			=> $amount, 
			'payment_status' 	=> '1', 
			'application_status'=> '1', 
		); 
		$this->db->where('id',$order_id); 
		$this->db->update('tbl_reccom_letter_application',$data);   
		//echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
	}else if($order_status==="Aborted"){ 
		//echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";  
	}else if($order_status==="Failure"){ 
		//echo "<br>Thank you for shopping with us.However,the transaction has been declined."; 
	}else{
		//echo "<br>Security Error. Illegal access detected";
	}    
	/*echo "<table cellspacing=4 cellpadding=4>"; 
	for($i = 0; $i < $dataSize; $i++){ 
		$information=explode('=',$decryptValues[$i]); 
	    echo '<tr><td>'.$i.'-'.$information[0].'</td><td>'.urldecode($information[1]).'</td></tr>'; 
	}   
	echo "</table><br>"; 
	echo "</center>"; 
	*/ 
 
$this->db->select('tbl_course.print_name,tbl_stream.stream_name,tbl_reccom_letter_application.*,tbl_student.enrollment_number,tbl_student.email, tbl_student.student_name, tbl_student.mobile, tbl_student.address, tbl_student.pincode, countries.name as country_name, states.name as state_name, cities.name as city_name');
$this->db->where('tbl_reccom_letter_application.id',$order_id);
$this->db->join('tbl_student','tbl_student.id = tbl_reccom_letter_application.student_id');
$this->db->join('tbl_course','tbl_course.id = tbl_student.course_id');
$this->db->join('tbl_stream','tbl_stream.id = tbl_student.stream_id');
$this->db->join('countries','countries.id = tbl_student.country');
$this->db->join('states','states.id = tbl_student.state');
$this->db->join('cities','cities.id = tbl_student.city');
$result = $this->db->get('tbl_reccom_letter_application');
$result = $result->row();
$data = array(
	'student_id' => $result->student_id
); 
$this->session->set_userdata($data);
$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "REC-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "REC-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "REC-0".$result->id;     
	}else{
	    $receipt_no = "REC-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
	$enrollment_number = $result->enrollment_number;
	$student_name = $result->student_name;
	$print_name = $result->print_name;
	$stream_name = $result->stream_name;
	$address = $result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode;
	$mobile = $result->mobile;
	$email = $result->email;
	$ref_level = "Enrollment No";
	$pay_for="Recommendation Letter Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->amount;
	include('final_receipt.php');
?> 
 
  
