<?php
$university_details = $this->Setting_model->get_university_details();

if (!empty($migration)) {
	$division = $this->Student_certificate_model->get_student_division_for_degree($migration->student_id);
// echo "<pre>";print_r($division);exit;
	
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>Migration Certificate</title>
		<meta name="description">
		<meta name="keywords">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&display=swap" rel="stylesheet">
		<style>
			@import "https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap";
			@import "https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap";

			body {
				width: 100%;
				height: 100%;
				margin: 0;
				background-color: #FAFAFA;
				font-family: 'Abel', sans-serif;
				font-family: 'Barlow Semi Condensed', sans-serif;
				color: #444444;
				font-size: 13px;
				padding: 10px;
			}

			* {
				box-sizing: border-box;
				-moz-box-sizing: border-box;
			}

			.form-control {
				background-color: #e9ecef00 !important;
				opacity: 1;
			}

			.page {

				width: 205mm;
				min-height: 291mm;
				padding: 0mm;
				margin: 0mm auto;
				background: white;
				position: relative;
			}

			.letter_area {
				height: 291mm !important;
			}

			.head_top_logo {
				height: 219px;
				text-align: center;
			}

			.padd_wrapper {

				height: 100%;
				padding: 250px 38px 0px 38px;
			}

			.head_top_logo img {
				width: 350px;
			}
			p{
				color:#000 !important;
			}
		</style>
	</head>
	<body>

		<div class="page">
			<?php if(!empty($division)){?>
			<!-- <div class="letter_area" style=" background-image:url(<?= $this->Digitalocean_model->get_photo('images/new_marksheet-without.jpeg') ?>);background-position: center;background-size: cover;border: 2px solid #e8612b;height: 100%;"> -->
			<div class="letter_area" style=" background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet_background.png')?>);background-position: center top; background-size: cover;border: 2px solid #e8612b;height: 100%;">
			<!-- <p style="float: left;padding-left: 30px; margin-bottom:0px;font:bold; font-weight: 700">Sr No. : <?= $migration->id; ?></p>	 -->

			<p style="float: left;padding-left: 30px; margin-bottom:0px;font:bold; font-weight: 700">Sr No. : <?=date('Y',strtotime($migration->created_on));?><?=substr($migration->enrollment_number,-6);?></p>	
			
			<div class="padd_wrapper">
					<!-- <div class="head_top_logo"><img src="<?= base_url('images/only-logo.png') ?>"></div> -->
					<!-- <div class="head_top_logo"><img src="<?= $this->Digitalocean_model->get_photo('images/only-logo.png') ?>"></div> -->

					<p style="text-align: center"><b>University Campus: </b><?php if(!empty($university_details)){ echo $university_details->address;}?></p>
					<br>

					<br>
					<p style="width: 285px;margin: 0px auto;color: #000;font-weight: 700;font-size: 17px; text-align: center">MIGRATION CERTIFICATE </p>

					<div class="row" style="padding-right: 20px;padding-left: 20px">

						<div class="col-lg-12 col-md-12">
							<p style="font-size: 15px;color: #000;font-weight: 700;margin-top: 10px;margin-bottom: 10px;">Enrollment No.: <?= $migration->enrollment_number; ?></p>
						</div>
						<br>
						<div class="col-lg-12 col-md-12">
							<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 200;margin-bottom: 0px;line-height: 30px; word-spacing: 10px">This is to certify that this University has no objection to permit <b><?=$migration->student_name; ?></b> son/daughter of <b><?=$migration->father_name; ?></b> who has studied <b><?=$migration->course_name; ?> (<?=$migration->sort_name; ?>) in <?= $migration->stream_name; ?></b> course with enrollment no. <b><?=$migration->enrollment_number; ?></b> during academic/calender year <b><?=$division["date"]; ?></b> in this University, for pursuing his/her futher studies in any other University/Institution.</p>

							<br>
							<br>
							<br>

							<!--<p style="font-size: 16px;color: #000;margin-bottom: 2px;"> Address<span style="margin-left: 112px;"></span></p>-->
							<br>
							<p style="font-size: 16px;color: #000;margin-bottom: 2px;font-weight: 600;line-height: 30px;word-spacing: 10px;">Date: <span style="margin-left: 10px;"><?= date("d-m-Y", strtotime($migration->issue_date)); ?></span></p>


						</div>
						<div class="col-lg-12 col-md-12">
							<div style="width: 312px;float: right;text-align: center;margin-top: 35px;">
								<img src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$migration->signature)?>" style="width:100%">   
								<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$migration->dispalay_signature;?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php }else{?>
			<div class="row">
				<div class="col-md-12" style="margin: 0px auto;text-align: center;padding-top: 20%;">
					<h4>Result not generated Please cordinate to administrative</h4>
				</div>
			</div>
			<?php }?>
		<!-- </div> -->
			</div>

	</body>
<?php } ?>