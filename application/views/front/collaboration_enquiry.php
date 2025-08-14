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
					<h2>Collaboration Enquiry </h2>

					<ul>
						<li>
							<a href="">
								Home 
							</a>
						</li>
						<li class="active">Collaboration</li>
						<li class="active">Collaboration Enquiry </li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

	

	<!-- Start Costing Area -->
	<section class="costing-area pt-100 pb-70">
			<div class="container">
				<div class="row">
					
					

					<div class="col-lg-12 col-md-12">
						
                        <!-- <div class="single-costing-card"> -->
                        <div class="admission_box">
							<!-- <h3>Enrollment Verification</h3>
                            <small>Please provide your enrollment number</small> -->
							<!-- <form class="enrollment_form_one" method="get"  name="old_admission_form" id="old_admission_form">
								<div class="form-group">
									<label><b>Enter Enrollment Number:</b><span class="req"></span></label>
									<input type="text" id="old_enrollment" name="old_enrollment" class="form-control new_control"></input>
								</div>
								<div class=" button_div mt-4">
                                <a href="javascript:void(0);" class="default-btn2">
                                Apply Now
											<i class="ri-arrow-right-line"></i>
										</a>
								</div>
								</div>
							</form> -->

							<div class="candidates-resume-content">

						<form class="resume-info" method="post" name="collaboration_enquiry_form" id="collaboration_enquiry_form" enctype="multipart/form-data" onsubmit="return validateForm();">
						<h3>Details Required</h3>
						<p><small>Please provide your personal details</small></p>

							<div class="row">
								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Center Name  <span class="req">*</span></label>
										<input type="text" class="form-control" autocomplete="off" id="center_name" name="center_name" placeholder="Center Name">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Head Name <span class="req">*</span></label>
										<input type="text" name="head_name" id="head_name" class="form-control charector" placeholder="Head Name" autocomplete="off">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Contact Person Name <span class="req">*</span></label>
										<input type="text" name="contact_person_name" id="contact_person_name" class="form-control charector" autocomplete="off" placeholder="Contact Person Name">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Contact Number <span class="req">*</span></label>
										<input autocomplete="off" type="text" name="contact_number" id="contact_number" class="form-control number_only" placeholder="Contact Number" maxlength="10" minlength="10">
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Email Address  <span class="req">*</span></label>
										<input autocomplete="off" type="email" name="email" id="email" class="form-control" placeholder="Email Address ">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Country <span class="req">*</span></label>
										<select class="form-control select2_single" name="country" id="country">
											<option value="">Select Country</option>
											<?php if(!empty($country)){ foreach($country as $country_result){?>
											<option value="<?=$country_result->id?>" ><?=$country_result->name?></option>
											<?php }}?> 
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>State <span class="req">*</span></label>
										<select class="form-control select2_single" name="state" id="state">
											<option value="">Select State</option>
											<?php if(!empty($state)){ foreach($state as $state_result){?>
											<option value="<?=$state_result->id?>" ><?=$state_result->name?></option>
											<?php }}?> 
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>

							
								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>City <span class="req">*</span></label>
										<select class="form-control select2_single" name="city" id="city">
											<option value="">Select City</option>
											<?php if(!empty($city)){ foreach($city as $city_result){?>
											<option value="<?=$city_result->id?>" ><?=$city_result->name?></option>
											<?php }}?> 
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Pin Code <span class="req">*</span></label>
										<input class="form-control number_only" autocomplete="off" required name="pincode" id="pincode" placeholder="Pin Code" >
									</div>
								</div>

								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label>Address <span class="req">*</span></label>
										<input type="text" class="form-control rules" autocomplete="off" name="address" id="address" placeholder="Address">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Reference Name</label> 
										<input type="text" placeholder="Please enter if any reference" autocomplete="off" name="reference" id="reference" class="form-control">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputPassword1">Account Name *</label>
										<input type="text" class="form-control" id="account_name" autocomplete="off" name="account_name" placeholder="Account Name" value="">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Account Number * </label>
										<input type="text" class="form-control" id="account_number" autocomplete="off" name="account_number" placeholder="Account Number" value="">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Bank Name *</label>
										<input type="text" class="form-control" id="bank_name" name="bank_name" autocomplete="off" placeholder="Bank Name" value="">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">IFSC Code * </label>
										<input type="text" class="form-control" id="ifsc" name="ifsc" autocomplete="off" placeholder="IFSC Code" value="">
									</div>
								</div>
							</div>
							<hr>

							<div class="row">
								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Head Photo *</label>
										<input type="file" name="photo" id="photo" class="form-control" accept=".jpg,.png,.gif,.jpeg">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Upload Head Aadhaar Card *</label>
										<input type="file" name="adhar_card" id="adhar_card" class="form-control" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Upload PAN Card *</label>
										<input type="file" name="pan_card" id="pan_card" class="form-control" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label class="uid_soft_label">Other Document </label> <br><small>(You can upload multiple document)</small>
										<input type="file" class="form-control" name="other_document[]" id="other_document" multiple placeholder="Upload Other Document" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-lg-2 col-md-2">
									<div class="form-group checkboxs">
										<strong>Captcha <span class="req">*</span></strong>
									</div>
								</div>

								<!-- <div class="col-lg-6 col-md-6">
									<div class="form-group checkboxs">
										<div class="g-recaptcha" data-sitekey="6LcwIJcoAAAAAHWA5hzVuHwZBU8Gmnb3yWs1NJR3"></div>
									</div>
								</div> -->

								<div class="col-lg-6 col-md-6">
									<div class="form-group"> 
										<div class="g-recaptcha" data-sitekey="<?=GOOGLE_DATA_SITEKEY?>"></div> 
									</div>
									<div id="captchaError" class="error"></div>
								</div> 
							</div>

							<div class="col-lg-12">
								<button type="submit" class="default-btn" name="generate" id="generate" value="Generate">Submit</button>

							</div>
						</form>
							</div>
                        </div>
						<!-- </div> -->
					</div>
				</div>
			</div>
		</section>
		<!-- End Costing Area -->

		<?php include('footer.php');?>


		<script>
			$("#country").change(function(){  
				$.ajax({
					type: "POST",
					url: "<?=base_url();?>admin/Ajax_controller/get_state_ajax",
					data:{'country':$("#country").val()},
					success: function(data){
						$("#state").empty();
						$('#state').append('<option value="">Select State</option>');
						var opts = $.parseJSON(data);
						$.each(opts, function(i, d) {
						$('#state').append('<option value="' + d.id + '">' + d.name + '</option>');
						});
						$('#state').trigger('change');
					},
					error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
					}
				});	
			});

			$("#state").change(function(){  
				$.ajax({
					type: "POST",
					url: "<?=base_url();?>admin/Ajax_controller/get_city_ajax",
					data:{'state':$("#state").val()},
					success: function(data){
						$("#city").empty();
						$('#city').append('<option value="">Select City</option>');
						var opts = $.parseJSON(data);
						$.each(opts, function(i, d) {
						$('#city').append('<option value="' + d.id + '">' + d.name + '</option>');
						});
						$('#city').trigger('change');
					},
					error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
					}
				});	
			});

	$(document).ready(function() {
		$.validator.addMethod("ifscValidation", function(value, element) {
            return /^[A-Z0-9]{11}$/.test(value);
        }, "Please enter valid ifsc code");

			$.validator.addMethod("contact_number", function(phone_number, element) {
                phone_number = phone_number.replace(/\s+/g, "");
                return phone_number.length > 9;
            }, "Please enter a valid contact number ");

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
            

	$('#collaboration_enquiry_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			center_name: {
				required: true,
				noHTMLtags: true,
			},
			head_name: {
				required: true,
				noHTMLtags: true,
			},
			contact_person_name: {
				required: true,
				noHTMLtags: true,
			},
			contact_number: {
				required: true,
				contact_number: true,
				minlength: 10,
				maxlength: 10,
				noHTMLtags: true,
			},
			email: {
				required: true,
				noHTMLtags: true,
			},
			country: {
				required: true,
				noHTMLtags: true,
			},
			state: {
				required: true,
				noHTMLtags: true,
			},
			city: {
				required: true,
				noHTMLtags: true,
			},
			pincode: {
				required: true,
				number : true,
				maxlength:6,
				minlength:6,
				noHTMLtags: true,
			},
			address: {
				required: true,
				noHTMLtags: true,
			},
			account_name: {
				required: true,
				noHTMLtags: true,
			},
			account_number: {
				required: true,
				noHTMLtags: true,
			},
			bank_name: {
				required: true,
				noHTMLtags: true,
			},
			ifsc: {
				required: true,
				noHTMLtags: true,
				ifscValidation:true,
			},
			photo: {
				required: true,
				noHTMLtags: true,
			},
			adhar_card: {
				required: true,
				noHTMLtags: true,
			},
			pan_card: {
				required: true,
				noHTMLtags: true,
			},
		},
		messages: {
			center_name: {
				required: "Please enter center name",
				noHTMLtags:"HTML tags not allowed",
			},
			head_name: {
				required: "Please enter head name",
				noHTMLtags:"HTML tags not allowed",
			},
			contact_person_name: {
				required: "Please enter contact person name",
				noHTMLtags:"HTML tags not allowed",
			},
			contact_number: {
				required: "Please enter contact number!",
				contact_number: "Please enter valid contact number",
				minlength: "Please enter 10 digit contact number",
				maxlength: "Please enter 10 digit contact number",
				noHTMLtags:"HTML tags not allowed",
			},
			email: {
				required: "Please enter email address",
				noHTMLtags:"HTML tags not allowed",
			},
			country: {
				required: "Please select country",
				noHTMLtags:"HTML tags not allowed",
			},
			state: {
				required: "Please select state",
				noHTMLtags:"HTML tags not allowed",
			},
			city: {
				required: "Please select city",
				noHTMLtags:"HTML tags not allowed",
			},
			pincode: {
				required: "Please enter pin code",
				number:"Please enter valid pin code",
				maxlength:"Please enter 6 digit pin code",
				minlength:"Please enter 6 digit pin code",
				noHTMLtags:"HTML tags not allowed",
			},
			address: {
				required: "Please enter address",
				noHTMLtags:"HTML tags not allowed",
			},
			account_name: {
				required: "Please enter account name",
				noHTMLtags:"HTML tags not allowed",
			},
			account_number: {
				required: "Please enter account number",
				noHTMLtags:"HTML tags not allowed",
			},
			bank_name: {
				required: "Please enter bank name",
				noHTMLtags:"HTML tags not allowed",
			},
			ifsc: {
				required: "Please enter ifsc code",
				noHTMLtags:"HTML tags not allowed",
				ifscValidation:"Please enter valid ifsc code",
			},
			photo: {
				required: "Please upload head photo",
				noHTMLtags:"HTML tags not allowed",
			},
			adhar_card: {
				required: "Please upload head aadhar card",
				noHTMLtags:"HTML tags not allowed",
			},
			pan_card: {
				required: "Please upload pan card",
				noHTMLtags:"HTML tags not allowed",
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
});


$('#country').on('change', function() {
    $('#country').valid();
});


$('#state').on('change', function() {
    $('#state').valid();
});


$('#city').on('change', function() {
    $('#city').valid();
});

	</script>

<script>
	function validateForm() {
		// Check if the reCAPTCHA checkbox is checked
		var recaptchaResponse = grecaptcha.getResponse();
		
		if (recaptchaResponse.length === 0) {
			// If not checked, display an error message
			alert("Please complete the captcha!");
			return false;
		}

		// Proceed with form submission
		return true;
	}
</script>
