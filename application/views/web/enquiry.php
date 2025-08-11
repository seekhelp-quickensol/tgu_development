<?php include('header.php');?>

			<div class="header_cc_area" style="background-image:url('<?=base_url();?>images/header_area.jpg')">

				<div class="container">

					<div class="row">

					<div class="col-lg-12 col-md-12">

						<h1>Enquiry</h1>

						<p>Home / Enquiry</p>

					</div>

						</div>

				</div>

			</div>

				<div class="clearfix"></div>

			<div class="uni_mainWrapper uni_contact " style="min-height:500px;background-color:#f4f4f4;">

				<div class="container">

					<div class="row">

						<div class="contact-service ">

							<div class="main_div uni_eq" style="box-shadow: 0px 1px 13px rgba(60, 60, 60, 0.5);">

						<div class="col-md-12">

							<form method="post" name="enquiry_form" id="enquiry_form" enctype="multipart/form-data">

								<div class="row">

									<div class="col-md-12">

										<div class="personal_details">

											<h3>Submit your details</h3>

											<small>Fill in your details and we will get in touch with you shortly</small>

											<hr>

										</div>

									</div>

								</div>

								<div class="row edu">

									<div class="col-md-12">

										<div class="form-group">

											<label>Name<span class="req">*</span></label>

											<input type="text" name="name" id="name" required class="form-control charector" placeholder="Enter Your Name">

										</div>

									</div>

								</div>

								<div class="row edu">

									<div class="col-md-12">

										<div class="form-group">

											<label>Mobile Number<span class="req">*</span></label>

											<input type="text" name="mobile_number" id="mobile_number" required class="form-control number_only" placeholder="Enter Your Mobile Number">

											<div id="mobile_otp_error"></div>

										</div>

									</div>

								</div>

								<div class="row edu">

									<div class="col-md-12">

										<div class="form-group">

											<label>Email</label>

											<input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email">

										</div>

									</div>

								</div>

								<div class="row edu">

									<div class="col-md-12">

										<div class="form-group">

											<label>Course Interest<span class="req">*</span></label>

											<textarea name="query" id="query" required class="form-control" placeholder="Enter Your Course Interest"></textarea>

										</div>

									</div>

								</div>

								<div class="row">

									<div class="col-md-2 edu">

										<strong>Captcha <span class="req">*</span></strong>

									</div>

									<div class="col-md-6 edu">

										<div class="form-group">



											<div class="g-recaptcha" data-sitekey="6LdOEaYoAAAAAGu8KcJ4_IfN2oBUDCxwTBrW_imT"></div>

									

										</div>

									</div>

								</div>

								<div class="row">

									<div class="col-md-12 edu">

										<div class="form-group">

											<label></label>

											<button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Submit</button>

											<div class="pull-right">

											</div>

										</div>

									</div>	

								</div> 

							</form>

						</div>

						<div class="clearfix"></div>

					</div>

                        </div>

				</div>

			</div>

			</div>

	<?php include('footer.php');?>

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

	

	$('#enquiry_form').validate({

		rules: {

			name: {

				required: true,

				noHTMLtags: true,

			},

			mobile_number: {

				required: true,

				number: true,

				minlength: 10,

				maxlength: 10,

				noHTMLtags: true,

			},

			email: {

				validate_email: true,

				noHTMLtags: true,

			},

			query: {

				required: true,

				noHTMLtags: true,

			},

		},

		messages: {

			name: {

				required: "Please enter your name",

				noHTMLtags: "HTML tags not allowed!",

			},

			mobile_number: {

				required: "Please enter mobile number",

				number: "Please enter valid number",

				minlength: "Please enter 10 gigit mobile number",

				maxlength: "Please enter 10 gigit mobile number",

				noHTMLtags: "HTML tags not allowed!",

			},

			email: {

				validate_email: "Please enter your valid email",

				noHTMLtags: "HTML tags not allowed!",

			},

			query: {

				required: "Please enter your query",

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