<?php include('Crypto.php');

	//error_reporting(0);

	

	$workingKey=WORKINGAC;		//Working Key should be provided here.

	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server

	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.

	$order_status="";

	$order_id="";

	$tracking_id="";

	$bank_ref_no="";

	$amount="0";

	$decryptValues=explode('&', $rcvdString);

	$dataSize=sizeof($decryptValues);

	//echo "<center>";



	for($i = 0; $i < $dataSize; $i++) 

	{

		$information=explode('=',$decryptValues[$i]);

		if($i==3)	$order_status=$information[1];

		if($i==0)	$order_id=$information[1];

		if($i==1)	$tracking_id=$information[1];

		if($i==2)	$bank_ref_no=$information[1];

		if($i==10)	$amount=$information[1];

	}

	

	$data = array(

		'transaction_id' 		=> $tracking_id,

		'reference_number' => $bank_ref_no,

	);

	$this->db->where('id',$order_id);

	$this->db->update('tbl_separate_student_migration',$data);

	

	

	$this->db->where('transaction_id',$tracking_id);

	$this->db->where('id !=',$order_id);

	$exist = $this->db->get('tbl_separate_student_migration');

	$exist = $exist->row();

	if(!empty($exist)){

	    //echo "exist";

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

	$real_fees =$this->db->get('tbl_separate_student_migration');

	$real_fees =$real_fees->row();

	if($order_status==="Success" && $real_fees->amount == $amount)  

	{

			$data = array(

				'transaction_id' 	=> $tracking_id,

				'reference_number' 	=> $bank_ref_no,

				'amount' 			=> $amount,

				'payment_status' 	=> '1',

			);

			$this->db->where('id',$order_id);

			$this->db->update('tbl_separate_student_migration',$data);

			

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
BIR TIKENDRAJIT UNIVERSITY


	echo "</table><br>";

	echo "</center>";

	*/

	//echo $order_status;

$order_id = "";	

$tracking_id = "";	

$bank_ref_no = "";	

$payment_mode = "";	

$billing_tel = "";	

$billing_email = "";	







for($i = 0; $i < $dataSize; $i++) 

	{

		$information=explode('=',$decryptValues[$i]);

		if($i==0)	$order_id=$information[1];

		if($i==1)	$tracking_id=$information[1];

		if($i==2)	$bank_ref_no=$information[1];

		if($i==5)	$payment_mode=$information[1];

		if($i==17)	$billing_tel=$information[1];

		if($i==18)	$billing_email=$information[1];

	}

	$this->db->select('tbl_separate_student_migration.*, tbl_separate_student.student_name, tbl_separate_student.mobile, tbl_separate_student.address');

	$this->db->where('tbl_separate_student_migration.id',$order_id);

	$this->db->join('tbl_separate_student','tbl_separate_student.id = tbl_separate_student_migration.student_id');

	$result = $this->db->get('tbl_separate_student_migration');

	$result = $result->row();



	$data = array(

		'separate_student_id' => $result->student_id

	);

	$this->session->set_userdata($data);	

?>



<!DOCTYPE html>

<html lang="en">

<head>

	<title>Receipt</title>

	<style>

		body{

			font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;

		}

		table{

			border:1px solid #000;

			border-collapse: collapse;

			white-space: nowrap;

			position: relative;

		}

		th{

			background: #ddd;

			font-size: 25px;

			padding: 14px;

		}

		td{

			border-right: 1px solid #000;

			border-bottom: 1px solid #000;

			padding-top: 12px;

			vertical-align: middle;

			height: 62px;

			font-size: 13px;

			padding: 5px 20px;

			width: 80px;

			

		}

		.container{

			width: 100%;

			padding-left:5px;

			padding-right:5px;

			margin-right: auto;

			margin-left: auto;

			max-width: 1020px;

			margin-top: 50px;

			margin-bottom: 50px;

		}

	

		table{

			width:100%;

		}

	</style>

</head>

<body>

	<div class="container">

		<?php if(!empty($result)){?>

		<table>

			<thead>

				<td colspan="1" rowspan="2" style="border-top: 1px solid #000; border-bottom: 1px solid #000;text-align:center;">
				<img src="<?=$this->Digitalocean_model->get_photo('images/logo/5946920e9234e40ca915a088283a8e5c.png')?>"></td>

				<td colspan="1" rowspan="2" style="border-top: 1px solid #000; border-bottom: 1px solid #000;">

					<h2 style="font-size: 15px;margin: 0px;margin-bottom:5px;">Univerity Details:  

					</h2>

					<span>Name: THE GLOBAL UNIVERSITY</span><br/>

					<span>Address: Canchipur, South View. Imphal West, Arunachal Pradesh-795003 </span><br/>

					<span>Contact Number: +91 93546 65694</span><br/>

				</td>

				<td colspan="3" rowspan="2" style="border-top: 1px solid #000; border-bottom: 1px solid #000;">

					<h2 style="font-size: 15px;margin: 0px;margin-bottom:5px; text-align:;left">User Details:</h2>

					<span style="float:left">Name- <?=$result->student_name?></span><br>

					<span style="float:left">Invoice No - <?=$result->transaction_id?></span><br>

					<span style="float:left">Payment status - <?=$order_status?></span><br>

					<span style="float:left">Address: <?=$result->address;?></span><br/>

					<span style="float:left">Contact Number: <?=$result->mobile?></span><br/>

				</td>

			</thead>

				<tbody>

					<tr style="background:#ccc;text-align:center;">

						<td style="font-weight:600;">No.</td>

						<td style="font-weight:600;">Date</td>

						<td style="font-weight:600;">Pay For</td>

						<td style="font-weight:600;">Payment ID</td>

						<td style="font-weight:600;">Amount</td>

					</tr>	

				<tr style="text-align:center;">

					<td>1</td>

					<td><?=date("d/m/Y",strtotime($result->created_on));?></td>

					<td>Migration Certificate Fees</td>

					<td><?=$result->transaction_id?></td>

					<td>Rs. <?=$result->amount?></td>

					

				</tr>

				<tr style="background:#ccc;text-align:center;">

					<td><b>Total</b></td>

					<td>-</td>

					<td>-</td>

					<td>-</td>

					<td><b>Rs.<?=$result->amount;?></b></td>

				</tr>

				

				

			</tbody>

		</table>

		<button onclick="myFunction()" style="margin-top:10px;background:#000;color:#fff;padding:10px 15px;border-radius:3px;border:none;cursor:pointer">Print Bill</button>

		<a href="<?=base_url()?>s-migration-certificate" style="text-decoration: none;margin-top:10px;background:#000;color:#fff;padding:10px 21px;border-radius:3px;border:none;cursor:pointer;font-size: 13px;">Back</a>

		<?php }?>

	</div>

<script>

	function myFunction() {

		window.print();

	}

</script>

</body>

</html>

