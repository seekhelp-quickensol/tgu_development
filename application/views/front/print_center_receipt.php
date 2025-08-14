<style>
	.tm_invoice.tm_style1.tm_type1 .tm_invoice_head {
  min-height: 250px;
  position: relative;
}
</style>
<?php $university_details = $this->Setting_model->get_university_details();
$receipt_no = "";

// echo "<pre>";print_r($payment);exit;
if(strlen($payment->id) == "1"){
	$receipt_no = "CE-000".$payment->id;    
}else if(strlen($payment->id) == "2"){
	$receipt_no = "CE-00".$payment->id;     
}else if(strlen($payment->id) == "3"){
	$receipt_no = "CE-0".$payment->id;     
}else{
	$receipt_no = "CE-".$payment->id;
}

$date_of_receipt = date("d/m/Y",strtotime($payment->payment_date));

$center_name = $payment->center_name;
$head_name = $payment->head_name;

$head_email = $payment->head_email;
$head_contact_number = $payment->head_contact_number;
$address_display = $payment->address;

// $address = $payment->address .', '. $payment->country_name.' , '.  $payment->state_name.' ,'. $payment->city_name .' ,'.  $payment->pincode;
// if (strlen($address) > 50) {
//     $address_display = substr($address, 0, 50) . '...';
// } else {
//     $address_display = $address;
// }

// $pay_for=$payment->pay_for;
$transaction_id = $payment->transaction_no;
$print_amount = $payment->amount; 
if ($payment->payment_status == 0) {
    $payment_status_display = "Failed";
} else {
    $payment_status_display = "Success";
}
$payment_by = "Center"; 
include(APPPATH . 'views/payment/final_center_receipt.php');
?>