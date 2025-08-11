<?php include('header.php'); ?>
<!-- <div class="header_cc_area" style="background-image:url('<?= base_url(); ?>images/header_area.jpg')">
	<div class="container">
		<div class="row">
			<h1>E-Library</h1>
			<p>Home / E-Library</p>
		</div>
	</div>
</div> -->

<section>

	<div class="header_cc_area slide-bg">
		<div class="container  overlay-about" style="width: 100%;">
		<p>Home / E-Library</p>

			<div class=" container-fluid text-center inner-heading-content">
				<h2 class="main-heading-inner-pages border-b border">E-Library</h2>
				<p> We believe in providing education that cultivates creative understanding </p>

			</div>

		</div>
	</div>
</section>

<section class="c-padding inner-bg-99">

	<div class="uni_mainWrapper container box-shadow-global">


	<div class="content_work">
		<div class="container">
			<div class="row">
				<?php if ($this->session->userdata('e_library') == "1") { ?>
					<div class="" style="margin-top:10px;">
						<div class="col-md-12" style="margin-bottom: 10px;">
							<div class="col-md-4">
								<a class="btn btn-primary" href="https://ndl.iitkgp.ac.in/" target="_blank">MHRD Library</a>
							</div>
							<div class="col-md-4">
								<a class="btn btn-primary" href="https://openlibrary.org/" target="_blank">Digital Library</a>
							</div>
							<div class="col-md-4">
								<a class="btn btn-primary" href="http://ebooksgo.org/" target="_blank">Ebooksgo Library</a>
							</div>
						</div>
					</div>
				<?php } else if ($this->session->userdata('en_otp') == "") { ?>
					<div class="main_div online_wrapper" >
						<div class="col-md-12">
							<form method="post" name="otp_form" id="otp_form" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12">
										<div class="personal_details">
											<h3 class="title" style="font-size: 24px;">Enrollment Number</h3>
											<small>Please provide your enrollment number</small>
											<hr>
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-12">
										<div class="form-group">
											<label>Enter Your Enrollment Number<span class="req">*</span></label>
											<input type="text" name="enrollment" id="enrollment" required class="form-control charector" placeholder="Enter Your Enrollment">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 edu">
										<div class="form-group">
											<label></label>
											<button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Generate OTP</button>
											<div class="pull-right">
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				<?php } else if ($this->session->userdata('otp_mobile') != "" && $this->session->userdata('en_otp') != "") { ?>
					<div class="main_div" >
						<div class="col-md-12">
							<form method="post" name="otp_verification" id="otp_verification" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12">
										<div class="personal_details">
											<h3>OTP Verification</h3>
											<small>Please provide your OTP</small>
											<hr>
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-12">
										<div class="form-group">
											<label>Enter One Time Password<span class="req">*</span></label>
											<input type="text" name="otp_code" id="otp_code" required class="form-control number_only" placeholder="Enter One Time Password">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 edu">
										<div class="form-group">
											<label></label>
											<button type="submit" class="btn btn-primary" name="verify" id="verify" value="verify">Verify</button>
											Didn't get OTP?<a href="<?= base_url(); ?>resend_e_otp">Click Here</a>
											<div class="pull-right">
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="clearfix"></div>
					</div>

				<?php } ?>
			</div>
		</div>

	</div>
	</div>
</section>
	<div class="clearfix"></div>


</div>

<?php include('footer.php'); ?>