<?php include("header.php");?>

<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">

<style>

.letter_div{

	width: 80%;

    margin: 30px auto;

}

</style>

<!-- <div class="header_cc_area" style="background-image:url('<?=base_url();?>images/header_area.jpg')">

				<div class="container">

					<div class="row">

						<h1>Appointment Letter</h1>

						<p>Research / Appointment Letter</p>

					</div>

				</div>

			</div> -->



			<section>



	<div class="header_cc_area slide-bg">

		<div class="container  overlay-about" style="width: 100%;">

		<p>Research / Appointment Letter</p>



			<div class=" container-fluid text-center inner-heading-content">

				<h2 class="main-heading-inner-pages border-b border">Appointment Letter</h2>

				<p> We believe in providing education that cultivates creative understanding </p>



			</div>



		</div>

	</div>

</section>



<section class="c-padding inner-bg-99">



	<div class="uni_mainWrapper container box-shadow-global ">



				<div class="online_wrapper">

					 

					<?php if($this->uri->segment(2) == ""){?>

						<div class="main_div">

							<div class="col-md-12">

								<form method="post" name="otp_form" id="otp_form" enctype="multipart/form-data">

									<div class="row">

										<div class="col-md-12">

											<div class="personal_details">

												<h3 class="title" style="font-size:24px;">Password Verification</h3>

												<small>Please provide your password</small>

												<hr>

											</div>

										</div>

									</div>

									<div class="row edu">

										<div class="col-md-12">

											<div class="form-group">

												<label>Enter Your Password<span class="req">*</span></label>

												<input type="text" name="password" id="password" required class="form-control" placeholder="Enter Your Password">

											</div>

										</div>

									</div>

									

									<div class="row">

										<div class="col-md-12 edu">

											<div class="form-group">

												<label></label>

												<button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Next</button>

												<div class="pull-right">

												</div>

											</div>

										</div>	

									</div> 

								</form>

							</div>

							<div class="clearfix"></div>

						</div>

					<?php }?>

					<?php if($this->uri->segment(2) != ""){?>

						<div class="letter_div">

							<div class="col-md-12">

								<div class="row letter_section" id="letter_section">

									<div class="col-md-10 mt-15 full-width">

										<div class="letter-padding" style="background-image:url(<?=base_url();?>images/BTU.jpeg);background-position: top;background-size: cover;padding: 297px 25px 165px;border: 2px solid #e8612b;">

										

											

											<div class="row">

												<!--<div class="col-lg-6 col-md-6">

													<p class="letter-ref" style="color: #000;font-weight: 700;font-size: 14px;margin-top: 20px;">Ref. No.: BTU/PRL/<?=date("Y",strtotime($stu_data->enrollment_date));?>/<?php print_r(array_reduce(array_slice(str_split((string)$stu_data->enrollment_number),-5),function($a,$b){return $a.$b;}))?></p>

												</div>

												<div class="col-lg-6 col-md-6">

													<p class="letter-ref" style="color: #000;font-weight: 700;font-size: 14px;text-align: right;margin-top: 20px;">Dated: <?=date("d-m-Y",strtotime($stu_data->enrollment_date));?></p>

												</div>-->

												<div class="col-lg-12 col-md-12">

													<p style="color: #000;font-size: 16px;font-weight: 500;">To,

														<span style="display: block;font-weight: 700;"><?php if(!empty($guide)){ echo $guide->name;}?></span>

													</p>

												</div>

												<div class="col-lg-12 col-md-12">

													<p style="font-size: 16px;color: #000;font-weight: 700;margin-top: 10px;margin-bottom: 10px;">Address: <?php if(!empty($guide)){ echo $guide->address.', '.$guide->city_name.', '.$guide->state_name.', '.$guide->country_name.', Pincode - '.$guide->pincode;}?></p>

												</div>

												<div class="col-lg-12 col-md-12">

													<p style="font-size: 16px;color: #000;font-weight: 700;margin-top: 10px;margin-bottom: 10px;">Subject: Appointment of Research Supervisor</p>

												</div>

												<div class="col-lg-12 col-md-12">
www.theglobaluniversity.edu.in
													<p style="margin-top: 10px;color: #000;font-size: 16www.theglobaluniversity.edu.in 2px;">Sir/Madam,</p>
www.theglobaluniversity.edu.in
													<p style="color: #000;font-weight: 500;font-size: 16www.theglobaluniversity.edu.inrence to the above, we are pleased to inform you that your name has been approved as Research Supervisor in the <b><u><?php if(!empty($guide)){ echo $guide->specilisation;}?></u></b> by a committee constituted to such effect by the University.</p>

													<p style="font-size: 16px;font-weight: 500;color: #000;margin-bottom: 15px;">The name and numbers of Research Scholars under your guidance, as recommendedby the Research Committee will be shortly informed to you for providing all the research scholars till final submission of thesis for award of Ph.D by the University.</p>

													<p style="font-size: 16px;font-weight: 500;color: #000;">With regards and best wishes,</p>

												</div>

												<div class="col-lg-12 col-md-12">

													<div style="width: 205px;text-align: center;margin-top: 35px;">

														<img style="width: 140px;" src="<?=base_url();?>images/AR-sign.jpeg">

													</div>

													<div style="width: 205px;text-align: center;margin-top: 0px;margin-bottom: 10px;">

														<img style="width: 155px;transform: rotate(-15deg);margin-bottom: 20px;" src="<?=base_url();?>images/btu-seal.png">

													</div>

												</div>

												<div class="col-lg-12 col-md-12">

													<p style="color: #000;font-size: 14px;font-weight: 500;margin-bottom: 2px;">Copy to:</p>

													<p style="color: #000;font-size: 14px;font-weight: 500;margin-bottom: 2px;">1. Chancellor /Vice Chancellor /Director /Pro.VC./Registrar /Deputy Registrar</p>

													<p style="color: #000;font-size: 14px;font-weight: 500;margin-bottom: 2px;">2. Academics</p>

												</div>

											</div>

										</div>

									</div>

								</div>

								<div style="position: absolute;top: 25px;right: 85px;">

									<!--<button type="button" class="btn btn-primary" onclick="PrintElem('.letter_section')" id="print_btn">Print &nbsp <i class="fas fa-print"></i></button>-->

									<button type="button" class="btn btn-primary" id="print_btn">Print &nbsp <i class="fas fa-print"></i></button>

								</div>

							</div>

							<div class="clearfix"></div>

						</div>

					<?php }?>

				</div>

			</div>

</section>







<?php include("footer.php");?>



<script>    

jQuery.validator.addMethod("validate_email", function(value, element) {

	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

		return true;

	}else {

		return false;

	}

}, "Please enter a valid Email.");	





jQuery.validator.addMethod("noHTMLtags", function(value, element){

	if(this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)){

		if(value == ""){

			return true;

		}else{

			return false;

		}

	} else {

		return true;

	}

}, "HTML tags are Not allowed."); 



$('#otp_form').validate({

	rules: {

		password: {

			required: true,

			noHTMLtags: true,

		},

	},

	messages: {

		password: {

			required: "Please enter your password!",

			noHTMLtags: "HTML tags not allowed!",

		},

	},

	errorElement: 'span',

	errorPlacement: function (error, element) {

		error.addClass('invalid-feedback');

		element.closest('.form-group').append(error);

	},

	highlight: function (element, errorClass, validClass) {

		$(element).addClass('is-invalid');

	},

	unhighlight: function (element, errorClass, validClass) {

		$(element).removeClass('is-invalid');

	}

});

  

</script>

<script>

	$("#print_btn").click(function () {

		//$("#letter_section").print();

		//$("#letter_section").printThis();

		

		var divToPrint=document.getElementById('letter_section');



		  var newWin=window.open('','Print-Window');



		  newWin.document.open();



		  /*newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

		  newWin.document.write('<link rel="stylesheet" href="/css/custom.css" type="text/css"/>');

		  newWin.document.write('</head><body>');*/

			newWin.document.write('<html><head><title></title>');

			//newWin.document.write('<link rel="stylesheet" href="https://www.birtikendrajituniversity.ac.in/css/bootstrap.css" type="text/css"/>');

			//newWin.document.write('<link rel="stylesheet" href="https://www.birtikendrajituniversity.ac.in/css/style.css" type="text/css"/>');

			//newWin.document.write('<link rel="stylesheet" href="https://www.birtikendrajituniversity.ac.in/css/responsive.css" type="text/css"/>');

			//newWin.document.write('<link rel="stylesheet" href="https://www.birtikendrajituniversity.ac.in/css/animate.css" type="text/css"/>');

			newWin.document.write('<style type="text/css">.mt-15 { margin-top: 17px; } .letter-padding{padding: 250px 50px 125px !important;} .letter-ref{margin-bottom: 25px;} @media print { .col-lg-6 {flex: 0 0 50%;max-width: 50%;position: relative;width: 100%;padding-right: 15px;padding-left: 15px;}}</style></head><body>');

			newWin.document.write(divToPrint.innerHTML);

			newWin.document.write('</body></html>');



			newWin.document.close();

			setTimeout(function(){

				newWin.print();

				//newWin.close();

			}, 25);

			



		  //setTimeout(function(){},10);

	});

	

 </script>