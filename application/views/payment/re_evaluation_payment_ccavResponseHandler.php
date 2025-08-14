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
$data = array( 	'transaction_id' => $tracking_id, ); $this->db->where('id',$order_id); $this->db->update('tbl_re_evaluation_student',$data); $this->db->where('transaction_id',$tracking_id); $this->db->where('id !=',$order_id); $exist = $this->db->get('tbl_re_evaluation_student'); $exist = $exist->row();  
if(!empty($exist)){  
	$order_status = "Failure"; 
} 
$this->db->where('id',$order_id); 
$real_fees = $this->db->get('tbl_re_evaluation_student'); 
$real_fees =$real_fees->row(); 
if($order_status==="Success" && $real_fees->payment_amount == $amount){	$data = array( 		'payment_status' => '1', 	); 	$this->db->where('id',$order_id); 	$this->db->update('tbl_re_evaluation_student',$data);   
}else if($order_status==="Aborted"){
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
 
	
$this->db->select('tbl_student.student_name,tbl_student.mobile,tbl_student.email,tbl_student.center_id,tbl_student.address,tbl_student.id as registration_id,tbl_re_evaluation_student.*');$this->db->where('tbl_re_evaluation_student.id',$order_id);$this->db->join('tbl_student','tbl_student.enrollment_number = tbl_re_evaluation_student.enrollment_number');  $result = $this->db->get("tbl_re_evaluation_student"); $result = $result->row(); 

$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "RRF-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "RRF-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "RRF-0".$result->id;     
	}else{
	    $receipt_no = "RRF-".$result->id;
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
	$pay_for="Re-evaluation Fees";
	$transaction_id = $result->transaction_id;
	$print_amount = $result->payment_amount;
	include('final_receipt.php');
	
?> 
