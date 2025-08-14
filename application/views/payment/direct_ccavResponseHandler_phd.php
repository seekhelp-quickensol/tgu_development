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
	'payment_id' 		=> $tracking_id,
);
$this->db->where('id', $order_id);
$this->db->update('tbl_phd_registration_form', $data);


// $this->db->where('payment_id', $tracking_id);
$this->db->where('id', $order_id);
$exist = $this->db->get('tbl_phd_registration_form');
$exist = $exist->row();


if (!empty($exist)) {
	//echo "exist";
	$order_status = "Failure";
}
//echo $this->session->userdata('session_amount')."a"		
/*if($this->session->userdata('session_amount') != $amount){
	    echo "amount";
		$order_status = "Failure";
	};
	if($this->session->userdata('order_id') != $order_id){
	   echo "order";
		$order_status = "Failure";
	}*/
$this->db->where('id', $order_id);
$real_fees = $this->db->get('tbl_phd_registration_form');
$real_fees = $real_fees->row();

// echo "<pre>";print_r($real_fees);exit;  
if ($order_status === "SUCCESS" && $real_fees->amount == $amount) {
	$data = array(
		'payment_id' 		=> $tracking_id,
		'amount' 			  => $amount,
		'payment_status' 	=> '1',
	);
	$this->db->where('id', $order_id);
	$this->db->update('tbl_phd_registration_form', $data);

	//echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";

} else if ($order_status === "Aborted") {
	//echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";

} else if ($order_status === "Failure") {
	//echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
} else {
	//echo "<br>Security Error. Illegal access detected";

}

//echo "<br><br>";

/*echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$i.'-'.$information[0].'</td><td>'.urldecode($information[1]).'</td></tr>';
	}

	echo "</table><br>";
	echo "</center>";
	*/
 
// $this->db->where('id', $order_id);
// $result = $this->db->get('tbl_phd_registration_form');
// $result = $result->row();



$this->db->select('tbl_phd_registration_form.*,tbl_course.print_name,tbl_stream.stream_name,countries.name as country_name, states.name as state_name, cities.name as city_name'); 
$this->db->where('tbl_phd_registration_form.id', $order_id);
$this->db->join('tbl_course','tbl_course.id = tbl_phd_registration_form.course');
$this->db->join('tbl_stream','tbl_stream.id = tbl_phd_registration_form.stream');
$this->db->join('countries','countries.id = tbl_phd_registration_form.country','left');
$this->db->join('states','states.id = tbl_phd_registration_form.state','left');
$this->db->join('cities','cities.id = tbl_phd_registration_form.city','left'); 
$result = $this->db->get('tbl_phd_registration_form');
$result = $result->row();  

// echo "<pre>";print_r($result);exit;
$receipt_no = "";
	if(strlen($result->id) == "1"){
	    $receipt_no = "PEF-000".$result->id;    
	}else if(strlen($result->id) == "2"){
	    $receipt_no = "PEF-00".$result->id;     
	}else if(strlen($result->id) == "3"){
	    $receipt_no = "PEF-0".$result->id;     
	}else{
	    $receipt_no = "PEF-".$result->id;
	}
	$date_of_receipt = date("d/m/Y",strtotime($result->created_on));
 $enrollment_number = $result->id;
	$student_name = $result->student_name;
	$print_name = $result->print_name;
	$stream_name = '';
	$address = $result->current_address;
	$mobile = $result->mobile_number;
	$email = $result->email_id;
	$ref_level = "Registration No";
	$pay_for="Ph.D Entrance Fees";
	$transaction_id = $result->payment_id;
	$print_amount = $result->amount;
	include('final_receipt.php');
?> 































