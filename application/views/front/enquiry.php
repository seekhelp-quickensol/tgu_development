<?php include('header.php');?>

		<!-- Search Modal -->
		<div class="modal fade search-modal-area" id="exampleModalsrc">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<button type="button" data-bs-dismiss="modal" class="closer-btn">
						<i class="ri-close-line"></i>
					</button>

					<div class="modal-body">
						<form class="search-box">
							<div class="search-input">
								<input type="text" name="Search" placeholder="Search for..." class="form-control">

								<button type="submit" class="search-btn">
									<i class="ri-search-line"></i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Search Modal -->

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-15">
			<div class="container">
				<div class="page-title-content">
					<h2>Student Enquiry </h2>

					<ul>
						<li>
							<a href="">
								Home 
							</a>
						</li>
						<li class="active">Student Enquiry</li> 
					</ul>
				</div>
			</div>
		</div> 
	<section class="costing-area pt-100 pb-70">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-6 col-md-6" style="margin:0px auto"> 
                        <div class="admission_box">  
							<div class="candidates-resume-content">
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

									<div class="col-lg-12 col-md-12">

										<div class="form-group">

											<label>Name<span class="req">*</span></label>

											<input type="text" name="name" id="name" required class="form-control charector" placeholder="Enter Your Name">

										</div>

									</div>

								</div>

								<div class="row edu">

									<div class="col-lg-12  col-md-12">

										<div class="form-group">

											<label>Mobile Number<span class="req">*</span></label>

											<input type="text" name="mobile_number" id="mobile_number" required class="form-control number_only" placeholder="Enter Your Mobile Number">

											<div id="mobile_otp_error"></div>

										</div>

									</div>

								</div>

								<div class="row edu">

									<div class="col-lg-12  col-md-12">

										<div class="form-group">

											<label>Email</label>

											<input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email">

										</div>

									</div>

								</div>

								<div class="row edu">

									<div class="col-lg-12  col-md-12">

										<div class="form-group">

											<label>Course Interest<span class="req">*</span></label>

											<textarea name="query" id="query" required class="form-control" placeholder="Enter Your Course Interest"></textarea>

										</div>

									</div>

								</div>

								<div class="row" style="margin-top: 22px;">

									<div class="col-lg-2 col-md-2 edu">

										<strong>Captcha <span class="req">*</span></strong>

									</div>

									<div class="col-md-6 edu">

										<div class="form-group">



											<div class="g-recaptcha" data-sitekey="<?=GOOGLE_DATA_SITEKEY?>"></div>

									

										</div>

									</div>

								</div>

								<div class="row">

									<div class="col-md-12">

										<div class="form-group">

											<label></label>

											<button type="submit" class="default-btn" name="generate" id="generate" value="Generate">Submit</button>
											
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