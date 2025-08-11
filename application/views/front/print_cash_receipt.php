<style>
	.tm_invoice.tm_style1.tm_type1 .tm_invoice_head {
  min-height: 250px;
  position: relative;
}
</style>
<?php $university_details = $this->Setting_model->get_university_details();
$receipt_no = "";
if(strlen($payment->id) == "1"){
	$receipt_no = "PR-000".$payment->id;    
}else if(strlen($payment->id) == "2"){
	$receipt_no = "PR-00".$payment->id;     
}else if(strlen($payment->id) == "3"){
	$receipt_no = "PR-0".$payment->id;     
}else{
	$receipt_no = "PR-".$payment->id;
}
if(!empty($payment) && $payment->registration_id != ""){ 
	$enrollment_number = $payment->registration_id;
}else{ 
	$enrollment_number  = "-";
}
$date_of_receipt = date("d/m/Y",strtotime($payment->date_of_payment));
$enrollment_number = $enrollment_number;
$student_name = $payment->name;
$print_name = $payment->course; 
$stream_name = $payment->stream;
$address = $payment->address;
$mobile = $payment->mobile_number;
$email = $payment->email;
$ref_level = "Registration No";
$pay_for=$payment->pay_for;
$transaction_id = $payment->transaction_id;
$print_amount = $payment->amount; 
$order_status = "Paid"; 
$payment_by = "Campus"; 
include(APPPATH . 'views/payment/final_receipt.php');
?>