<style>
	.tm_invoice.tm_style1.tm_type1 .tm_invoice_head {
  min-height: 250px;
  position: relative;
}
</style>
<?php $university_details = $this->Setting_model->get_university_details();
// echo "<pre>";print_r($university_details);exit;
$receipt_no = "";
if(strlen($payment->id) == "1"){
	$receipt_no = "AP-000".$payment->id;    
}else if(strlen($payment->id) == "2"){
	$receipt_no = "AP-00".$payment->id;     
}else if(strlen($payment->id) == "3"){
	$receipt_no = "AP-0".$payment->id;     
}else{
	$receipt_no = "AP-".$payment->id;
}
if(!empty($payment) && $payment->enrollment_number != ""){ 
	$enrollment_number = $payment->enrollment_number;
}else{ 
	$enrollment_number  = "-";
}
$date_of_receipt = date("d/m/Y",strtotime($payment->payment_date));
$enrollment_number = $enrollment_number;
$student_name = $payment->student_name;
$print_name = $payment->print_name;
$stream_name = $payment->stream_name;
$address = $payment->address;
// $address = $payment->address .''.  $payment->address .','.  $payment->country_name .','. $payment->state_name.','. $payment->city_name .',' .$payment->pincode;
// if (strlen($address_data) > 50) {
//     $address = substr($address_data, 0, 50) . '...';
// } else {
//     $address = $address_data;
// }
$mobile = $payment->mobile;
$email = $payment->email;
$ref_level = "Registration No";
// $pay_for=$payment->pay_for;
$transaction_id = $payment->transaction_id;
$print_amount = $payment->total_fees; 
if ($payment->payment_status == 0) {
    $order_status = "Failed";
} else {
    $order_status = "Success";
}
$payment_by = "Campus"; 
include(APPPATH . 'views/payment/final_receipt.php');
?>