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
		'reference_number' => $bank_ref_no,
	);
	$this->db->where('id',$order_id);
	$this->db->update('tbl_direct_payment',$data);
	
	
	$this->db->where('payment_id',$tracking_id);
	$this->db->where('id !=',$order_id);
	$exist = $this->db->get('tbl_direct_payment');
	$exist = $exist->row();
	if(!empty($exist)){
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
	$real_fees =$this->db->get('tbl_direct_payment');
	$real_fees =$real_fees->row();
	if($order_status==="Success" && $real_fees->amount == $amount) 
	{
			$data = array(
				'payment_id' 		=> $tracking_id,
				'reference_number' => $bank_ref_no,
				'amount' 			=> $amount,
				'payment_status' 	=> '1',
			);
			$this->db->where('id',$order_id);
			$this->db->update('tbl_direct_payment',$data);
			
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
 
	$this->db->where('id',$order_id);
	$result = $this->db->get('tbl_direct_payment');
	$result = $result->row();		
?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>Payment Receipt</title>
  <link rel="stylesheet" href="invoice_assests/style.css">
</head>

<body>
  <div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1 tm_type1" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_top_head tm_mb15 tm_align_center">
            <div class="tm_invoice_left">
              <div class="tm_logo"><img src="assets/images/global_university_logo.png" style="max-height: 107px;" alt="Logo"></div>
            </div>
            <div class="tm_invoice_right tm_text_right tm_mobile_hide">
              <div class="tm_f50 tm_text_uppercase tm_white_color">Receipt</div>
            </div>
            <div class="tm_shape_bg tm_accent_bg tm_mobile_hide"></div>
          </div>
          <div class="tm_invoice_info tm_mb25">
            <div class="tm_card_note tm_mobile_hide"><b class="tm_primary_color">Payment Status: </b><?=$order_status?></div>
            <div class="tm_invoice_info_list tm_white_color">
              <p class="tm_invoice_number tm_m0" style="margin-right:10px">Receipt No: <b>#<?=$result->payment_id?></b></p>
              <p class="tm_invoice_date tm_m0" style="margin-right:-30px">Date: <b><?=date("d/m/Y",strtotime($result->created_on));?></b></p>
            </div>
            <div class="tm_invoice_seperator tm_accent_bg"></div>
          </div>
          <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
			 <p class="tm_mb2"><b class="tm_primary_color">Receipt To:</b></p>
              <p>
                <?=$result->student_name?><br>
               <?=$result->address.', '.$result->city_name.', '.$result->state_name.', '.$result->country_name.'-'.$result->pincode?><br>
                <?=$result->mobile?>
              </p>
            </div>
            <div class="tm_invoice_right tm_text_right">
              <p class="tm_mb2"><b class="tm_primary_color">Pay To:</b></p>
              <p>
                <?=$university_details->university_name?><br>
				<?=$university_details->address?><br>
                <?=$university_details->email?>
              </p>
            </div>
          </div>
          <div class="tm_table tm_style1">
            <div class="">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                    <tr class="tm_accent_bg">
                     <th class="tm_width_3 tm_semi_bold tm_white_color">Sr.No</th>
                      <th class="tm_width_4 tm_semi_bold tm_white_color">Description</th>
                      <th class="tm_width_2 tm_semi_bold tm_white_color">Transaction No</th>
                      <th class="tm_width_1 tm_semi_bold tm_white_color">Amount</th>
                      <th class="tm_width_2 tm_semi_bold tm_white_color tm_text_right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
						<td class="tm_width_3">1.</td>
						<td class="tm_width_4">Transcript Fees</td>
						<td class="tm_width_2"><?=$result->payment_id?></td>
						<td class="tm_width_1"><?=$result->amount?></td>
						<td class="tm_width_2 tm_text_right"><?=$result->amount?></td>
                    </tr> 
                  </tbody>
                </table>
              </div> 
            </div>
            <div class="tm_invoice_footer tm_border_top tm_mb15 tm_m0_md">
              <div class="tm_left_footer">
                <p class="tm_mb2"><b class="tm_primary_color">Payment info:</b></p>
                <p class="tm_m0">Payment By: <?=$payment_by?> <br>Amount: <?=$result->amount?></p>
              </div>
              <div class="tm_right_footer">
                <table class="tm_mb15">
                  <tbody>
                    <tr class="tm_gray_bg ">
                      <td class="tm_width_3 tm_primary_color tm_bold">Subtoal</td>
                      <td class="tm_width_3 tm_primary_color tm_bold tm_text_right"><?=$result->amount?></td>
                    </tr>
                    <tr class="tm_gray_bg">
                      <td class="tm_width_3 tm_primary_color">Tax <span class="tm_ternary_color">(0%)</span></td>
                      <td class="tm_width_3 tm_primary_color tm_text_right">+00.00</td>
                    </tr>
                    <tr class="tm_accent_bg">
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color">Grand Total	</td>
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color tm_text_right"><?=$result->amount?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer tm_type1">
              <div class="tm_left_footer"></div>
              <div class="tm_right_footer">
                <div class="tm_sign tm_text_center">
                  <!--<img src="assets/img/sign.svg" alt="Sign">-->
                  <p class="tm_m0 tm_ternary_color"><?=$university_details->university_name?></p>
                  <p class="tm_m0 tm_f16 tm_primary_color"> Itanagar, Arunachal Pradesh</p>
                </div>
              </div>
            </div>
          </div>
          <div class="tm_note tm_text_center tm_font_style_normal">
            <hr class="tm_mb15">
            <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p>
            <p class="tm_m0">This is a computer-generated receipt; no signature is required<br><?=$university_details->address?>.</p>
          </div><!-- .tm_note -->
        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
          <span class="tm_btn_text">Print</span>
        </a>
        <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span class="tm_btn_text">Download</span>
        </button>
      </div>
    </div>
  </div>
  <script src="invoice_assests/jquery.min.js"></script>
  <script src="invoice_assests/jspdf.min.js"></script>
  <script src="invoice_assests/html2canvas.min.js"></script>
  <script src="invoice_assests/main.js"></script>
</body>
</html> 
