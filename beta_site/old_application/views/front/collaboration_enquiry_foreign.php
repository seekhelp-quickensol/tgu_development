<?php include('header.php');?>

		
		<!-- Start Page Title Area -->
		<div class="page-title-area bg-15">
			<div class="container">
				<div class="page-title-content">
					<h2>Collaboration Foreign Enquiry </h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>
						<li class="active">Collaboration</li>
						<li class="active">Collaboration Foreign Enquiry </li>
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
							
							<div class="candidates-resume-content">

						<form class="resume-info" method="post" name="collaboration_enquiry_foreign_form" id="collaboration_enquiry_foreign_form" enctype="multipart/form-data" onsubmit="return validateForm();">
						<h3>Center Details</h3>
						

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
										<input type="text" name="head_name" id="head_name" autocomplete="off" class="form-control charector" placeholder="Head Name">
									</div>
								</div>

								

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputPassword1">Contact Person Name *</label>
										<input type="text" class="form-control" id="contact_person_name" autocomplete="off" name="contact_person_name" placeholder="Contact Person Name" value="">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputEmail1">Contact Number *</label>
										<input type="text" class="form-control" id="contact_number" autocomplete="off" name="contact_number" placeholder="Contact Number" value="">
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
										<label for="exampleInputConfirmPassword1">Pin Code *</label>
										<input type="text" class="form-control" id="pincode" autocomplete="off" name="pincode" placeholder="Pin Code" value="">
									</div>
								</div>

								<div class="col-lg-6 col-md-6">
									<div class="form-group">
										<label>Address <span class="req">*</span></label>
										<input type="text" class="form-control rules" name="address" id="address" autocomplete="off" placeholder="Address">
									</div>
								</div>	
							</div>
						
							
							<div class="row">
								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Head Photo *</label>
										<input type="file" name="photo" id="photo" class="form-control" accept=".jpg,.png,.gif,.jpeg">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Upload Head Passport *</label>
										<input type="file" name="passport" id="passport" class="form-control" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label class="uid_soft_label">Other Document(You can upload multiple document)</label>
										<input type="file" class="form-control" name="other_document[]" id="other_document" multiple placeholder="Upload Other Document" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
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
            

	$('#collaboration_enquiry_foreign_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			center_name: {
			required:true,
			noHTMLtags:true
		},
		head_name: {
			required:true,
			noHTMLtags:true
		},
		contact_person_name: {
			required:true,
			noHTMLtags:true
		},
		contact_number: {
			required:true,
			number:true,
			minlength:10,
			maxlength:12,
			noHTMLtags:true
		},		
		email: {
			required:true,
			validate_email:true,
			noHTMLtags:true
		},	
		address: {
			required:true,
			noHTMLtags:true
		},
		country: {
			required:true,
			noHTMLtags:true
		},
		state: {
			required:true,
			noHTMLtags:true
		},
		city: {
			required:true,
			noHTMLtags:true
		},
		pincode: {
			required:true,
			noHTMLtags:true
		},
		photo: {
				required: true,
			},
			passport: {
				required: true,
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
			required:"Please enter contact number",
			number:"Please enter only number",
			minlength:"Please enter 10 to 12 digit contact number",
			maxlength:"Please enter 10 to 12 digit contact number",
			noHTMLtags:"HTML tags not allowed",
		},
		email: {
			required:"Please enter email address",
			validate_email:"Please enter valid email address",
			noHTMLtags:"HTML tags not allowed",
		},
		address: {
			required: "Please enter address",
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
		photo: {
				required: "Please select head photo",
			},
			passport: {
				required: "Please select head passport",
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
