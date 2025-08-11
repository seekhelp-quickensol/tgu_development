<?php include("header.php");?>
<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">
<style>
	
</style>
<div class="header_cc_area" style="background-image:url('images/header_area.jpg')">
				<div class="container">
					<div class="row">
						<h1>Admission Enquiry Form</h1>
						<p>Admission / Enquiry Form</p>
					</div>
				</div>
			</div>
<div class="uni_mainWrapper">
	<div class="container">
		<div class="row">	
			<div class="container">
				<div class="online_wrapper">
					
					<!--<h1>University Admission Form 2020-2021</h1>-->
					
					<div class="admission_div">
						<form method="post" name="admission_form" id="admission_form" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="common_details">
										<div class="col-md-12">
											<h3>Details Required</h3>
											<small>Please provide your personal details</small>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									
									<div class="col-md-6">
										<div class="form-group">
											<label>Full Name <span class="req">*</span></label>
											<input type="text" name="full_name" id="full_name" class="form-control charector" placeholder="Enter Full Name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email <span class="req">*</span></label>
											<input type="text" name="full_email" id="full_email" class="form-control" placeholder="Enter Email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Mobile Number <span class="req">*</span></label>
											<input type="text" name="full_mobile" id="full_mobile" class="form-control" placeholder="Enter Mobile Number">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Course Name <span class="req">*</span></label>
											<input autocomplete="off" type="text" name="full_course" id="full_course" class="form-control" placeholder="Couse Name">
											<div class="error" id="mobile_error"></div>
										</div>
									</div>
									
								</div>
							</div>
							
							
							
							
							<hr>
							
							
							<div class="col-md-12">
								
								<div class="row">
									<div class="col-md-2 edu">
										<strong>Captcha <span class="req">*</span></strong>
									</div>
									<div class="col-md-6 edu">
										<div class="form-group">
											<div class="g-recaptcha" data-sitekey="6Ld04bQZAAAAAESEZ2t9Z8jge9k860wPt59Pcwus"></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 edu">
										<div class="form-group">
											<label></label>
											<button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
											<div class="pull-right">
											</div>
										</div>
									</div>	
								</div>
							</div>
						</form>
					<div class="clearfix"></div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!--------------------------------------   CROPING TOOL   -----------------------------------------------> 


<?php include("footer.php");?>

<script>
jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	
$('#admission_form').validate({
	rules: {
		full_name: {
			required: true,
		},
		full_mobile: {
			required: true,
			number: true,
			minlength: 10,
			maxlength: 10,
		},
		full_email: {
			required: true,
			validate_email: true,
		},
		full_course: {
			required: true,
		},
	},
	messages: {
		full_name: {
			required: "Please enter your name",
		},
		full_mobile: {
			required: "Please enter mobile number",
			number: "Please enter valid number",
			minlength: "Please enter 10 gigit mobile number",
			maxlength: "Please enter 10 gigit mobile number",
		},
		full_email: {
			required: "Please enter email",
			validate_email: "Please enter valid email",
		},
		full_course: {
			required: "Please enter course",
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