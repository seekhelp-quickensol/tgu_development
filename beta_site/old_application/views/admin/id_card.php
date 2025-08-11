<?php
//  include('header.php');
 ?>
<!-- <style>
	td{
		color:#000;
	}

</style>
<title>ID Card</title>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          
		  <button id="btn" class="btn btn-primary">Print</button>
		  <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
			
		   <div id="print_id" style="width: 1000px;height:335px;border:4px solid #e8ae52;margin:0px auto;margin-top: 50px;position: relative;background:#fff;">
	<div style="width: 487px;border-right: 4px solid #e8ae52;height:100%;float:left;">
					<div style="text-align: center;height: 85px;"><img style="width: 348px;margin-top:2px; opacity: 0.2;" src="<?=base_url();?>images/logo/logo.png"></div>
					<div style="height:40px;background: #500405;padding-top:9px;text-align: center;">	
					<p style="margin:0px;font-size: 14px;font-family: arial;font-weight: 600;text-transform: uppercase;color: #fff;">Student ID Card</p></div>
					<div style="position:relative;padding: 10px 0px;">
						<table style="width:84%;font-family:arial;font-size:14px">
							
							<tr>
								<td style="padding:10px;font-weight:600;width:40%">Registration No:</td>
								<td style="padding:10px;"><?=$student_profile->id?></td>
							</tr>
							<tr>
								<td style="padding:8px;font-weight:600;">Student Name:</td>
								<td style="padding:8px;"><?=$student_profile->student_name?></td>
							</tr>
							<tr>
								<td style="padding:8px;font-weight:600;">Father's/ Husband Name:</td>
								<td style="padding:8px;"><?=$student_profile->father_name?></td>
							</tr>
							<tr>
								<td style="padding:8px;font-weight:600;">Faculty:</td>
								<td style="padding:8px;"><?=$student_profile->faculty_name?></td>
							</tr>
						</table>
						<div style="position:absolute;right:30px;top:10px;">
							<img src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$student_profile->photo)?>" style="height:100px;border-radius: 6px;">
						</div>
					</div>
		</div>
				<div style="width:505px;height:100%;float:left;position: relative;" >
				<img src="<?=$this->Digitalocean_model->get_photo('images/logo/logo-for-id.png')?>" style="position: absolute;right: 0;top: 9px;"> -->
					<!-- <img src="<?=base_url(); ?>images/logo-for-id.png" style="position: absolute;right: 0;top: 9px;"> -->
					
					<!-- <div style="position:relative;padding: 10px 0px;">
						<table style="width:84%;font-family:arial;font-size:14px">
							<tr>
								<td style="padding:10px;font-weight:600;width:40%">Course : </td>
								<td style="padding:10px;"> <?=$student_profile->print_name?> </td>
							</tr>
							<tr>
								<td style="padding:10px;font-weight:600;width:40%">Registration Date:</td>
								<td style="padding:10px;"><?=date("d/m/Y",strtotime($student_profile->admission_date))?></td>
							</tr>
							
							<tr>
								<td style="padding:8px;font-weight:600;">Address:</td>
								<td style="padding:8px;"><?=$student_profile->address?></td>
							</tr>
							<tr>
								<td style="padding:8px;font-weight:600;">Contact No:</td>
								<td style="padding:8px;"><?=$student_profile->mobile?></td>
							</tr>
							
							<tr>
								<td style="padding:8px;font-weight:600;">Signature:</td>
								<td style="padding:8px;"><img style="width:100px;height:50px" src="<?=$this->Digitalocean_model->get_photo('images/signature/'.$student_profile->signature)?>"></td>
							</tr>
						</table>
						
					</div>
					<div style="position:absolute;left:0px;right:0;bottom:0px;background: #500405;height: 45px;width: 100%;"><p style="text-align: center;color: #fff;font-family: arial;font-size: 14px;margin: 0px;padding-top: 14px;font-weight: 600;">www.theglobaluniversity.edu.in</p></div>
		</div>
		</div>
	</div>
	</div>
	
        </div>
       -->
<?php
//  include('footer.php');
 ?>
<!-- <script>

function printData()
{
   var divToPrint=document.getElementById("print_id");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
</script> -->






<?php include('header.php'); ?>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@400;500&display=swap');



	body {
		font-family: Times New Roman;
		font-weight: 400;
		line-height: 1.5;
		color: #212529;
		text-align: left;
	}

	.card-wrapper {
		width: 640px;
		/* height: 420px; */
		margin: auto;
	}

	.card-inside {
		padding: 15px;
	}

	.card-header {
		background: #4b0605;
	}

	.header-logo {
		width: 90px;
		background-color:#fff;
	}

	.header-brand {
		color: #FFF;
		text-transform: uppercase;
		text-align: center;
		font-weight: 600;
	}

	.header-text {
		color: #FFF;
		font-size: 14px;
		text-align: center;
	}

	.card-body {
		padding: 5px 15px;
	}

	.id-image {
		width: 170px;
	}

	.card-holder-name {
		font-weight: 600;
		font-stretch: expanded;
	}

	.body-text {
		font-size: 15px;
		font-family: Arial;
		line-height: 1.5 !important;
	}

	.body-image {
		position: absolute;
		width: 170px;
		opacity: 0.2;
		z-index: 0;
		text-align: center;
		margin: auto;
		top: 30px;
		left: 110px;
	}

	.body-text-wrapper {
		position: absolute;
	}

	.validity-text {
		font-size: 15px;
		font-family: Arial;
	}

	.body-bottom-right {
		color: #4b0605;
		font-weight: 600;
		font-family: Arial;
		font-size: 17px;
	}

	.card-footer {
		background: #4b0605;
		padding: 5px;
		text-align: center;
	}

	.footer-text {
		color: #FFF;
		font-family: Arial;
		font-size: 15px;
	}

	.card-back-header {
		font-weight: 600;
		padding: 5px 15px;
	}

	.back-image {
		width: 200px;
		left: 100px;
		position: relative;
		left: 220px;
		top: 50px;
	}

	.body-back-image {
		position: absolute;
		z-index: -1;
		opacity: 0.2;
	}

	.back-footer {
		float: right;
		font-weight: 600;
	}

	ol {
		padding: 0 40px;
	}

	ol li {
		font-weight: 600;
		font-stretch: semi-expanded;
	}


	.print_btn {

		right: 18px;
		margin-top: 10px;
	}

	.main-panel {
		background: transparent
	}

	@media print {
		.main-panel {
			background: transparent
		}

		.print_btn {
			display: none;
		}

		.footer_file {
			display: none
		}
	}
</style>

<div class="container-fluid page-body-wrapper">
	<div class="main-panel py-3 px-4">
		<div class="">

			<div class="row">
				<div class="col-md-12 my-4">

					<!--<div id="print_id" style="width: 1000px;height:335px;border:4px solid #0566b1;margin:0px auto;margin-top: 50px;position: relative;background:#fff;">-->
					<!-- <div style="width: 487px;border-right: 3px solid #0566b1;height:335px;float:left;">
				<div style="text-align: center;height: 85px;"><img style="width: 348px;margin-top:2px" src="<?= base_url(); ?>images/logo/logo.png"></div>
				<div style="height:40px;background: linear-gradient(to right, #b73710, #184098);padding-top:9px;text-align: center;">	
				<p style="margin:0px;font-size: 14px;font-family: arial;font-weight: 600;text-transform: uppercase;color: #fff;">Student ID Card</p></div>
				<div style="position:relative;padding: 10px 0px;">
					<table style="width:84%;font-family:arial;font-size:14px">
						
						<tr>
							<td style="padding:10px;font-weight:600;width:40%">Registration No:</td>
							<td style="padding:10px;"><?= $student_profile->id ?></td>
						</tr>
						<tr>
							<td style="padding:8px;font-weight:600;">Student Name:</td>
							<td style="padding:8px;"><?= $student_profile->student_name ?></td>
						</tr>
						<tr>
							<td style="padding:8px;font-weight:600;">Father's/ Husband Name:</td>
							<td style="padding:8px;"><?= $student_profile->father_name ?></td>
						</tr>
						<tr>
							<td style="padding:8px;font-weight:600;">Faculty:</td>
							<td style="padding:8px;"><?= $admission->faculty_name ?></td>
						</tr>
					</table>
					<div style="position:absolute;right:30px;top:10px;">
						<img src="<?= base_url(); ?>images/profile_pic/<?php if (!empty($student_profile) && $student_profile->photo != "") {
																			echo $student_profile->photo;
																		} else { ?>default.jpg<?php } ?>" style="height:100px;border-radius: 6px;">
					</div>
				</div>
			</div>
			<div style="width:505px;height:335px;float:left;position: relative;" >
				<img src="<?= base_url(); ?>images/logo/bir.png" style="position: absolute;right: 0;top: 9px;">
				
				<div style="position:relative;padding: 10px 0px;">
					<table style="width:84%;font-family:arial;font-size:14px">
						<tr>
							<td style="padding:10px;font-weight:600;width:40%">Course : </td>
							<td style="padding:10px;"> <?= $admission->print_name ?> </td>
						</tr>
						<tr>
							<td style="padding:10px;font-weight:600;width:40%">Registration Date:</td>
							<td style="padding:10px;"><?= date("d/m/Y", strtotime($student_profile->admission_date)) ?></td>
						</tr>
						
						<tr>
							<td style="padding:8px;font-weight:600;">Address:</td>
							<td style="padding:8px;"><?= $student_profile->address ?> - <?= $student_profile->mobile ?></td>
						</tr>
						<tr>
							<td style="padding:8px;font-weight:600;">Signature:</td>
							<td style="padding:8px;"><img style="width:150px;height:100px" src="<?= base_url(); ?>images/signature/<?= $student_profile->signature ?>"></td>
						</tr>
					</table>
					
				</div>
				<div style="position:absolute;left:0px;right:0;bottom:0px;background: linear-gradient(to right, #b73710, #184098);height: 45px;width: 509px;"><p style="text-align: center;color: #fff;font-family: arial;font-size: 14px;margin: 0px;padding-top: 14px;font-weight: 600;">www.birtikendrajituniversity.com</p></div>
			</div> -->
					<!--</div>-->

					<!-- Card Front -->
					<div class="card-wrapper">
						<div class="card-header">
							<button id="btn" class="btn btn-primary print_btn" style="position:absolute; top:10px; right:18px;" onclick="window.print()">Click Here To Print</button>

							<div class="row">
								<div class="col-2">
									<img class="header-logo" src="<?= $this->Digitalocean_model->get_photo('images/logo/logo.png') ?>">
									<!-- <img class="header-logo" src="<?= base_url() ?>images/logo/logo.png"> -->
								</div>
								<div class="col-10">
									<h3 class="header-brand"><?php if(!empty($university_details)){ echo $university_details->university_name;}?></h3>
									<p class="header-text m-0 p-0"><?php if(!empty($university_details)){ echo $university_details->address;}?></p>
									<p class="header-text m-0 p-0"><?php if(!empty($university_details)){ echo $university_details->website;}?></p>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-4" style="height: 220px;">
									<img class="id-image" src="<?= $this->Digitalocean_model->get_photo('images/profile_pic/' . $student_profile->photo) ?>">  
								</div>
								<div class="col-8">
									<img class="body-image" src="<?= $this->Digitalocean_model->get_photo('images/logo/logo.png') ?>">
									<!-- <img class="header-logo" src="<?= base_url() ?>images/logo/logo.png"> -->
									<div class="body-text-wrapper" style="position:relative !important">
										<h2 class="card-holder-name pt-2"><?= $student_profile->student_name ?></h2>
										<p class="p-0 m-0 body-text">Session: <?= $student_profile->session_name; ?></p>
										<p class="p-0 m-0 body-text">Course: <?= $student_profile->print_name; ?></p>
										<p class="p-0 m-0 body-text">Stream: <?= $student_profile->stream_name; ?></p>
										<p class="p-0 m-0 body-text">Enrollment No: <?= $student_profile->enrollment_number ?>&nbsp;</p>
										<p class="p-0 m-0 body-text">D.O.B: <?=date("d/m/Y",strtotime($student_profile->date_of_birth))?></p>
										<p class="p-0 m-0 body-text">F/H Name: <?= $student_profile->father_name ?></p>
										<p class="p-0 m-0 body-text">Address: <?= $student_profile->address ?></p>
										<p class="p-0 m-0 body-text">Contact No: <?= $student_profile->mobile ?></p>
									</div>
								</div>
							</div>
							<div>
								<br>
								<div class="row">
									<div class="col-8">
										<!--<p class="m-0 p-0 text-danger validity-text">Valid: <?php echo date('Y', strtotime($admission->admission_date)) . " - " . date('Y', strtotime($admission->admission_date . '+ ' . $admission->duration . ' years')); ?></p>-->
									</div>
									<div class="col">
										<!-- <p class="m-0 p-0 body-bottom-right">Deputy registrar</p> -->
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<p class="p-0 m-0 footer-text">Powered by: TGU</p>
						</div>
					</div>
					<!-- ./ Card Front -->
					<br>
					<!-- Card Back -->
					<div class="card-wrapper">

						<div class="card-header">
							<div class="row">
								<div class="col-2">
									<img class="header-logo" src="<?= $this->Digitalocean_model->get_photo('images/logo/logo.png') ?>">
									<!-- <img class="header-logo" src="<?= base_url() ?>images/logo/logo.png"> -->
								</div>
								<div class="col-10">
									<h3 class="header-brand"><?php if(!empty($university_details)){ echo $university_details->university_name;}?></h3>
									<p class="header-text m-0 p-0"><?php if(!empty($university_details)){ echo $university_details->address;}?></p>
									<p class="header-text m-0 p-0"><?php if(!empty($university_details)){ echo $university_details->website;}?></p>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<h2 class="card-back-header text-danger">INSTRUCTION:</h2>
								<div class="body-back-image">
									<img class="back-image" src="<?= $this->Digitalocean_model->get_photo('images/logo/logo.png') ?>">
								</div>
								<ol>
									<li>The holder of the Identity card is identify as the student of theTHE GLOBAL UNIVERSITY.</li>
									<li>In case of loss, student should report immediately and will pay Rs.100/- for issuing a new card. </li>
									<li>This identity card is only for the bonafid student of THE GLOBAL UNIVERSITY.</li>
									<li>Unauthorized use is denied and punishable by law.</li>
								</ol>
							</div>
							<!-- <div class="back-footer">
		            <p class="text-center">
		              Sd/-<br>Principal
		            </p>
		          </div> -->
						</div>
					</div>
					<!-- ./ Card Back -->

				</div>
			</div>

		</div>

		<div class="footer_file">

			<?php include('footer.php'); ?>

		</div>
		<!-- <script>

function printData()
{
   var divToPrint=document.getElementById("print_id");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
</script>
  -->