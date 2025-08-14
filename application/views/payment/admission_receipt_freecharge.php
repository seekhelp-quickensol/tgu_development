



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

		.container{BIR TIKENDRAJIT UNIVERSITY

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

		<?php if(!empty($student_data)){

				$result = $this->Payment_model->get_current_fees($student_data->id);

				if($result->payment_status == "1"){

					$order_status = "Success";

				}else{

					$order_status = "Failed";

				}

		?>

		<table>

				<thead>

				<td colspan="2" rowspan="2" style="border-top: 1px solid #000; border-bottom: 1px solid #000;text-align:center;"><img src="<?=base_url();?>images/logo/5946920e9234e40ca915a088283a8e5c.png"></td>

				<td colspan="3" rowspan="2" style="border-top: 1px solid #000; border-bottom: 1px solid #000;">

					<h2 style="font-size: 15px;margin: 0px;margin-bottom:5px;">Univerity Details:  

					</h2>

					<span>Name: THE GLOBAL UNIVERSITY</span><br/>

					<span>Address: Canchipur, South View. Imphal West, Arunachal Pradesh-795003</span><br/>

					<span>Contact Number: +91 93546 65694</span><br/>

				</td>

				<td colspan="3" rowspan="2" style="border-top: 1px solid #000; border-bottom: 1px solid #000;">

				<h2 style="font-size: 15px;margin: 0px;margin-bottom:5px; text-align:;left">Student Details:</h2>

					<span style="float:left">Registration Number- <?=$student_data->id?></span><br>

					<span style="float:left">Name- <?=$student_data->student_name?></span><br>

					<span style="float:left">Invoice No - <?=$result->transaction_id?></span><br>

					<span style="float:left">Payment status - <?=$order_status?></span><br>

					<span style="float:left">Address: <?=$student_data->address?></span><br/>

					<span style="float:left">Contact Number: <?=$student_data->mobile?></span><br/>

					<?php if($order_status == "Success"){?>

					<span style="float:left">Login ID: <?=$student_data->username?></span><br/>

					<span style="float:left">Login Password: <?=$student_data->password?></span><br/>

					<?php }?>

				</td>

				</thead>

				<tbody>

					<tr style="background:#ccc;text-align:center;">

						<td style="font-weight:600;">No.</td>

						<td style="font-weight:600;">Date</td>

						<td style="font-weight:600;">Fees Type</td>

						<td colspan="4" style="font-weight:600;">Payment ID</td>

						<td style="font-weight:600;">Amount</td>

					</tr>	

				<tr style="text-align:center;">

					<td>1</td>

					<td><?=date("d/m/Y",strtotime($result->payment_date));?></td>

					<td>Admission</td>

					<td colspan="4"><?=$result->transaction_id?></td>

					<td>Rs. <?=$result->total_fees?></td>

					

				</tr>

				<tr style="background:#ccc;text-align:center;">

					<td><b>Total</b></td>

					<td>-</td>

					<td>-</td>

					<td colspan="4">-</td>

					<td><b>Rs.<?=$result->total_fees;?></b></td>

				</tr>

				

				

			</tbody>

		</table>

		<button onclick="myFunction()" style="margin-top:10px;background:#000;color:#fff;padding:10px 15px;border-radius:3px;border:none;cursor:pointer">Print Bill</button>

		<a href="<?=base_url()?>" style="text-decoration: none;margin-top:10px;background:#000;color:#fff;padding:10px 21px;border-radius:3px;border:none;cursor:pointer;font-size: 13px;">Back</a>

		<?php }?>

	</div>

	<?php 

		$session_data = array(

			'otp_otp' => '',

			'is_verified' => '',

		);

		$this->session->set_userdata($session_data);

	?>

<script>

	function myFunction() {

		window.print();

	}

</script>

</body>

</html>