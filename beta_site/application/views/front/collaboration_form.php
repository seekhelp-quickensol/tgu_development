<?php include('header.php'); ?>



<!-- Start Page Title Area -->
<div class="page-title-area bg-15">
	<div class="container">
		<div class="page-title-content">
			<!-- <h2>Collaboration Form</h2> -->
			<h2><?php if (isset($_GET['pulp'])) {
					echo 'Pulp ';
				} else if (isset($_GET['bvoc'])) {
					echo 'B.VOC ';
				} else {
					echo '';
				} ?>Collaboration Form</h2>
			<ul>
				<li>
					<a href="">
						Home
					</a>
				</li>
				<!-- <li class="active">Collaboration</li> -->
				<li class="active"><?php if (isset($_GET['pulp'])) {
										echo 'Pulp ';
									} else if (isset($_GET['bvoc'])) {
										echo 'B.VOC ';
									} else {
										echo '';
									} ?>Collaboration Form</li>
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

						<form class="resume-info" method="post" name="collaboration_form" id="collaboration_form" enctype="multipart/form-data" onsubmit="return validateForm();">						
							<h3>Center Details</h3>


							<div class="row">
								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Center Name <span class="req">*</span></label>
										<input type="text" class="form-control" id="center_name" name="center_name" placeholder="Center Name" autocomplete="off">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Head Name <span class="req">*</span></label>
										<input type="text" name="head_name" id="head_name" class="form-control charector" placeholder="Head Name" autocomplete="off">
										<input type="hidden" name="is_information" value="0">
									</div>
								</div>



								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputEmail1">Head Email Address *</label>
										<input type="text" class="form-control" id="head_email" name="head_email" placeholder="Head Email Address" value="" autocomplete="off">
									</div>
									<div class="error" id="head_email_error"></div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputEmail1">Head Contact Number *</label>
										<input type="text" class="form-control" id="head_contact_number" name="head_contact_number" autocomplete="off" placeholder="Head Contact Number" value="" maxlength="10" minlength="10">
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputPassword1">Contact Person Name *</label>
										<input type="text" class="form-control" id="contact_person_name" autocomplete="off" name="contact_person_name" placeholder="Contact Person Name" value="">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Contact Person Contact </label>
										<input type="text" class="form-control" id="contact_person_contact" autocomplete="off" name="contact_person_contact" placeholder="Contact Person Contact" value="" maxlength="10" minlength="10">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Contact Person Email </label>
										<input type="text" class="form-control" id="contact_person_email" autocomplete="off" name="contact_person_email" placeholder="Contact Person Email" value="">
									</div>
									<!-- <div class="error" id="contact_person_email_error"></div> -->
								</div>


								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Organization PAN Card Number*</label>
										<input type="text" placeholder="Organization PAN Card" autocomplete="off" name="orgnization_pan_card_number" id="orgnization_pan_card_number" class="form-control">
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Reference Name*</label>
										<input type="text" placeholder="Please enter if any reference" autocomplete="off" name="reference" id="reference" class="form-control">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label>Organization Head PAN Card Number*</label>
										<input type="text" placeholder="Organization Head PAN Card" autocomplete="off" name="orgnization_head_pan_card_number" id="orgnization_head_pan_card_number" class="form-control">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Present Address *</label>
										<input type="text" class="form-control" id="present_address" autocomplete="off" name="present_address" placeholder="Present Address" value="">
									</div>
								</div>

								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>Country <span class="req">*</span></label>
										<select class="form-control select2_single" name="present_country" id="present_country">
											<option value="">Select Country</option>
											<?php if (!empty($country)) {
												foreach ($country as $country_result) { ?>
													<option value="<?= $country_result->id ?>"><?= $country_result->name ?></option>
											<?php }
											} ?>
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>


								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>State <span class="req">*</span></label>
										<select class="form-control select2_single" name="present_state" id="present_state">
											<option value="">Select State</option>
											<?php if (!empty($present_state)) {
												foreach ($present_state as $state_result) { ?>
													<option value="<?= $state_result->id ?>"><?= $state_result->name ?></option>
											<?php }
											} ?>
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>City <span class="req">*</span></label>
										<select class="form-control select2_single" name="present_city" id="present_city">
											<option value="">Select City</option>
											<?php if (!empty($present_city)) {
												foreach ($present_city as $city_result) { ?>
													<option value="<?= $city_result->id ?>"><?= $city_result->name ?></option>
											<?php }
											} ?>
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>

								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Pin Code *</label>
										<input type="text" class="form-control" id="present_pincode" name="present_pincode" autocomplete="off" placeholder="Pin Code" value="">
									</div>
								</div>
							</div>


							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
								<label class="form-check-label" for="flexCheckDefault">
									Same as Present Address
								</label>
							</div>

							<hr>
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Collaboration Address *</label>
										<input type="text" class="form-control" id="collaboration_address" autocomplete="off" name="collaboration_address" placeholder="Collaboration Address" value="">
									</div>
								</div>

								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>Country <span class="req">*</span></label>
										<select class="form-control select2_single" name="collaboration_country" id="collaboration_country">
											<option value="">Select Country</option>
											<?php if (!empty($country)) {
												foreach ($country as $country_result) { ?>
													<option value="<?= $country_result->id ?>"><?= $country_result->name ?></option>
											<?php }
											} ?>
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>


								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>State <span class="req">*</span></label>
										<select class="form-control select2_single" name="collaboration_state" id="collaboration_state">
											<option value="">Select State</option>
											<?php if (!empty($collaboration_state)) {
												foreach ($collaboration_state as $state_result) { ?>
													<option value="<?= $state_result->id ?>"><?= $state_result->name ?></option>
											<?php }
											} ?>
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>City <span class="req">*</span></label>
										<select class="form-control select2_single" name="collaboration_city" id="collaboration_city">
											<option value="">Select City</option>
											<?php if (!empty($collaboration_city)) {
												foreach ($collaboration_city as $city_result) { ?>
													<option value="<?= $city_result->id ?>"><?= $city_result->name ?></option>
											<?php }
											} ?>
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>

								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Pin Code *</label>
										<input type="text" class="form-control" id="collaboration_pincode" autocomplete="off" name="collaboration_pincode" placeholder="Pin Code" value="">
									</div>
								</div>
							</div>

							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault_collaboration">
								<label class="form-check-label" for="flexCheckDefault_collaboration">
									Same as Collaboration Address
								</label>
							</div>
							<hr>

							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Permanent/Corresponding Address *</label>
										<input type="text" class="form-control" id="permanent_address" autocomplete="off" name="permanent_address" placeholder="Permanent/Corresponding Address">
									</div>
								</div>

								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>Country <span class="req">*</span></label>
										<select class="form-control select2_single" name="permanent_country" id="permanent_country">
											<option value="">Select Country</option>
											<?php if (!empty($country)) {
												foreach ($country as $country_result) { ?>
													<option value="<?= $country_result->id ?>"><?= $country_result->name ?></option>
											<?php }
											} ?>
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>


								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>State <span class="req">*</span></label>
										<select class="form-control select2_single" name="permanent_state" id="permanent_state">
											<option value="">Select State</option>
											<?php if (!empty($permanent_state)) {
												foreach ($permanent_state as $state_result) { ?>
													<option value="<?= $state_result->id ?>"><?= $state_result->name ?></option>
											<?php }
											} ?>
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label>City <span class="req">*</span></label>
										<select class="form-control select2_single" name="permanent_city" id="permanent_city">
											<option value="">Select City</option>
											<?php if (!empty($permanent_city)) {
												foreach ($permanent_city as $city_result) { ?>
													<option value="<?= $city_result->id ?>"><?= $city_result->name ?></option>
											<?php }
											} ?>
										</select>
										<i class="ri-arrow-down-s-line"></i>
									</div>
								</div>

								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Pin Code *</label>
										<input type="text" class="form-control" autocomplete="off" id="permanent_pincode" name="permanent_pincode" placeholder="Pin Code">
									</div>
								</div>
							</div>
							<hr>

							<div class="row">
								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputPassword1">Account Name *</label>
										<input type="text" class="form-control" autocomplete="off" id="account_name" name="account_name" placeholder="Account Name" value="">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Account Number * </label>
										<input type="text" class="form-control" autocomplete="off" id="account_number" name="account_number" placeholder="Account Number" value="">
									</div>
								</div>

								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">Bank Name *</label>
										<input type="text" class="form-control" autocomplete="off" id="bank_name" name="bank_name" placeholder="Bank Name" value="">
									</div>
								</div>


								<div class="col-lg-3 col-md-3">
									<div class="form-group">
										<label for="exampleInputConfirmPassword1">IFSC Code * </label>
										<input type="text" class="form-control" autocomplete="off" id="ifsc" name="ifsc" placeholder="IFSC Code" value="">
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
										<label class="uid_soft_label">Other Document</label>
										<small class="d-block">(You can upload multiple document)</small>
										<input type="file" class="form-control" name="other_document[]" id="other_document" multiple placeholder="Upload Other Document" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">

									<div class="col-sm-3">
										<div class="form-group">
											<label class="uid_soft_label">Do you have coupon code?</label>
											<input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Please enter coupon code?">
											<div class="error" id="coupon_error"></div>
											<div class="" style="color:green" id="coupon_success"></div>
										</div>
									</div>
								</div>
							</div>
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
										<div class="g-recaptcha" data-sitekey="<?= GOOGLE_DATA_SITEKEY ?>"></div>
									</div>
									<div id="captchaError" class="error"></div>
								</div>
							</div>

							<div class="col-lg-12">
								<input type="hidden" name="is_pulp" id="is_pulp" value="<?php if (isset($_GET['pulp'])) {
																							echo '1';
																						} else {
																							echo '0';
																						} ?>">
								<input type="hidden" name="is_bvoc" id="is_bvoc" value="<?php if (isset($_GET['bvoc'])) {
																							echo '2';
																						} else {
																							echo '0';
																						} ?>">
								<input type="hidden" name="center_type" id="center_type" value="<?php if (isset($_GET['bvoc'])) {
																									echo '2';
																								} elseif (isset($_GET['pulp'])) {
																									echo '1';
																								} else {
																									echo '0';
																								} ?>">

								<button type="submit" class="default-btn" onclick="validateCaptcha()" name="generate" id="generate" value="Generate">Submit</button>

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

<?php include('footer.php');

$id = '0';
if ($this->uri->segment(2) != " ") {
	$id = $this->uri->segment(2);
}
?>


<script>
	$("#present_country").change(function() {
		$.ajax({
			type: "POST",
			url: "<?= base_url(); ?>admin/Ajax_controller/get_state_ajax",
			data: {
				'country': $("#present_country").val()
			},
			success: function(data) {

				$("#present_state").empty();
				$('#present_state').append('<option value="">Select State</option>');
				var opts = $.parseJSON(data);
				$.each(opts, function(i, d) {
					$('#present_state').append('<option value="' + d.id + '">' + d.name + '</option>');
				});
				$('#present_state').trigger('change');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	});

	$("#present_state").change(function() {
		$.ajax({
			type: "POST",
			url: "<?= base_url(); ?>admin/Ajax_controller/get_city_ajax",
			data: {
				'state': $("#present_state").val()
			},
			success: function(data) {
				$("#present_city").empty();
				$('#present_city').append('<option value="">Select City</option>');
				var opts = $.parseJSON(data);
				$.each(opts, function(i, d) {
					$('#present_city').append('<option value="' + d.id + '">' + d.name + '</option>');
				});
				$('#present_city').trigger('change');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	});

	$("#collaboration_country").change(function() {

		if ($('#flexCheckDefault').is(':checked')) {

		} else {
			$.ajax({
				type: "POST",
				url: "<?= base_url(); ?>admin/Ajax_controller/get_state_ajax",
				data: {
					'country': $("#collaboration_country").val()
				},
				success: function(data) {
					$("#collaboration_state").empty();
					$('#collaboration_state').append('<option value="">Select State</option>');
					var opts = $.parseJSON(data);
					$.each(opts, function(i, d) {
						$('#collaboration_state').append('<option value="' + d.id + '">' + d.name + '</option>');
					});
					$('#collaboration_state').trigger('change');
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}
			});
		}
	});


	$("#collaboration_state").change(function() {
		if ($('#flexCheckDefault').is(':checked')) {

		} else {
			$.ajax({
				type: "POST",
				url: "<?= base_url(); ?>admin/Ajax_controller/get_city_ajax",
				data: {
					'state': $("#collaboration_state").val()
				},
				success: function(data) {
					$("#collaboration_city").empty();
					$('#collaboration_city').append('<option value="">Select City</option>');
					var opts = $.parseJSON(data);
					$.each(opts, function(i, d) {
						$('#collaboration_city').append('<option value="' + d.id + '">' + d.name + '</option>');
					});
					$('#collaboration_city').trigger('change');
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}
			});
		}
	});


	$("#permanent_country").change(function() {

		if ($('#flexCheckDefault_collaboration').is(':checked')) {} else {

			$.ajax({
				type: "POST",
				url: "<?= base_url(); ?>admin/Ajax_controller/get_state_ajax",
				data: {
					'country': $("#permanent_country").val()
				},
				success: function(data) {
					$("#permanent_state").empty();
					$('#permanent_state').append('<option value="">Select State</option>');
					var opts = $.parseJSON(data);
					$.each(opts, function(i, d) {
						$('#permanent_state').append('<option value="' + d.id + '">' + d.name + '</option>');
					});
					$('#permanent_state').trigger('change');
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}
			});
		}
	});

	$("#permanent_state").change(function() {

		if ($('#flexCheckDefault_collaboration').is(':checked')) {

		} else {
			$.ajax({
				type: "POST",
				url: "<?= base_url(); ?>admin/Ajax_controller/get_city_ajax",
				data: {
					'state': $("#permanent_state").val()
				},
				success: function(data) {
					$("#permanent_city").empty();
					$('#permanent_city').append('<option value="">Select City</option>');
					var opts = $.parseJSON(data);
					$.each(opts, function(i, d) {
						$('#permanent_city').append('<option value="' + d.id + '">' + d.name + '</option>');
					});
					$('#permanent_city').trigger('change');
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}
			});
		}
	});


	$('#present_country').on('change', function() {
		$('#present_country').valid();
	});


	$('#present_state').on('change', function() {
		$('#present_state').valid();
	});


	$('#present_city').on('change', function() {
		$('#present_city').valid();
	});

	$('#collaboration_country').on('change', function() {
		$('#collaboration_country').valid();
	});


	$('#collaboration_state').on('change', function() {
		$('#collaboration_state').valid();
	});


	$('#collaboration_city').on('change', function() {
		$('#collaboration_city').valid();
	});

	$('#permanent_country').on('change', function() {
		$('#permanent_country').valid();
	});


	$('#permanent_state').on('change', function() {
		$('#permanent_state').valid();
	});


	$('#permanent_city').on('change', function() {
		$('#permanent_city').valid();
	});


	$(document).ready(function() {
		$.validator.addMethod("ifscValidation", function(value, element) {
			return /^[A-Z0-9]{11}$/.test(value);
		}, "Please enter valid ifsc code");

		$.validator.addMethod("head_contact_number", function(phone_number, element) {
			phone_number = phone_number.replace(/\s+/g, "");
			return phone_number.length > 9;
		}, "Please enter a valid head contact number ");

		jQuery.validator.addMethod("validate_email", function(value, element) {
			if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
				return true;
			} else {
				return false;
			}
		}, "Please enter a valid Email.");
		jQuery.validator.addMethod("validate_pan", function(value, element) {
			if (/[A-Z]{5}\d{4}[A-Z]{1}/.test(value)) {
				return true;
			} else {
				return false;
			}
		}, "Please enter a valid PAN.");

		$('#collaboration_form').validate({
			ignore: ":hidden:not(select)",
			rules: {
				center_name: {
					required: true,
				},
				head_name: {
					required: true,
				},
				head_email: {
					required: true,
					validate_email: true,
				},
				head_contact_number: {
					required: true,
					head_contact_number: true,
					minlength: 10,
					maxlength: 10,
					number: true,
				},
				contact_person_name: {
					required: true,
				},
				// contact_person_contact: {
				// 	number: true,
				// },
				// contact_person_email: {
				// 	validate_email: true,
				// },
				present_address: {
					required: true,
				},
				present_country: {
					required: true,
				},
				present_state: {
					required: true,
				},
				present_city: {
					required: true,
				},
				present_pincode: {
					required: true,
					number: true,
					minlength: 6,
					maxlength: 6,
				},
				collaboration_address: {
					required: true,
				},
				collaboration_country: {
					required: true,
				},
				collaboration_state: {
					required: true,
				},
				collaboration_city: {
					required: true,
				},
				collaboration_pincode: {
					required: true,
					number: true,
					minlength: 6,
					maxlength: 6,
				},
				permanent_address: {
					required: true,
				},
				permanent_country: {
					required: true,
				},
				permanent_state: {
					required: true,
				},
				permanent_city: {
					required: true,
				},
				permanent_pincode: {
					required: true,
					number: true,
					minlength: 6,
					maxlength: 6,
				},
				photo: {
					required: true,
				},
				adhar_card: {
					required: true,
				},
				pan_card: {
					required: true,
				},
				account_name: {
					required: true,
				},
				account_number: {
					required: true,
				},
				bank_name: {
					required: true,
				},
				ifsc: {
					required: true,
					ifscValidation: true,
				},
				orgnization_head_pan_card_number: {
					required: true,
					validate_pan: true,
				},
				orgnization_pan_card_number: {
					required: true,
					validate_pan: true,
				},
				reference: {
					required: true,
				},
			},

			messages: {
				center_name: {
					required: "Please enter center name",
				},
				head_name: {
					required: "Please enter head name",
				},
				head_email: {
					required: "Please enter head email address",
					validate_email: "Please enter valid email",
				},
				head_contact_number: {
					required: "Please enter head contact number",
					head_contact_number: "Please enter head contact number",
					minlength: "Please enter 10 digit head contact number ",
					maxlength: "Please enter 10 digit head contact number",
					number: "Please enter valid head contact number",
				},
				contact_person_name: {
					required: "Please enter contact person name",
				},
				// contact_person_contact: {
				// 	number: "Please neter valid contact number",
				// },
				// contact_person_email: {
				// 	validate_email: "Please enter valid email",
				// },
				present_address: {
					required: "Please enter present address",
				},
				present_country: {
					required: "Please select country",
				},
				present_state: {
					required: "Please select state",
				},
				present_city: {
					required: "Please select city",
				},
				present_pincode: {
					required: "Please enter pin code",
					number: "Please enter valid pin code",
					minlength: "Please enter valid pin code",
					maxlength: "Please enter valid pin code",
				},
				collaboration_address: {
					required: "Please enter collaboration address",
				},
				collaboration_country: {
					required: "Please select country",
				},
				collaboration_state: {
					required: "Please select state",
				},
				collaboration_city: {
					required: "Please select city",
				},
				collaboration_pincode: {
					required: "Please enter pin code",
					number: "Please enter valid pin code",
					minlength: "Please enter valid pin code",
					maxlength: "Please enter valid pin code",
				},
				permanent_address: {
					required: "Please enter permanent/corresponding address",
				},
				permanent_country: {
					required: "Please select country",
				},
				permanent_state: {
					required: "Please select state",
				},
				permanent_city: {
					required: "Please select city",
				},
				permanent_pincode: {
					required: "Please enter pin code",
					number: "Please enter valid pin code",
					minlength: "Please enter valid pin code",
					maxlength: "Please enter valid pin code",
				},
				photo: {
					required: "Please upload head photo",
				},
				adhar_card: {
					required: "Please upload head aadhar card",
				},
				pan_card: {
					required: "Please upload pan card",
				},
				account_name: {
					required: "Please enter account name",
				},
				account_number: {
					required: "Please enter account number",
				},
				bank_name: {
					required: "Please enter bank name",
				},
				ifsc: {
					required: "Please enter ifsc code",
					ifscValidation: "Please enter valid ifsc code",
				},
				orgnization_head_pan_card_number: {
					required: "Please enter organization head PAN Card number",
					validate_pan: "Please enter valid PAN Card Number",
				},
				orgnization_pan_card_number: {
					required: "Please enter organization PAN Card number",
					validate_pan: "Please enter valid PAN Card Number",
				},
				reference: {
					required: "Please enter reference name",
				},

			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
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


<!-- <script>
    $(document).ready(function () {
        $('#flexCheckDefault').on('click', function () {
            if ($(this).is(':checked')) {
                $('#collaboration_address').val($('#present_address').val());
                $('#collaboration_country').val($('#present_country').val());

                $('#collaboration_state').val($('#present_state').val());

                $('#collaboration_city').val($('#present_city').val());
                $('#collaboration_pincode').val($('#present_pincode').val());
            } else {
                $('#collaboration_address').val('');
				$('#collaboration_country').val('');
                $('#collaboration_state').val('');
                $('#collaboration_city').val('');
                $('#collaboration_pincode').val('');
            }
        });
    });
</script> -->

<script>
	$(document).ready(function() {
		// Handle checkbox click event
		$('#flexCheckDefault').on('click', function() {
			// If checkbox is checked, copy values from present address to collaboration address
			if ($(this).is(':checked')) {
				$('#collaboration_address').val($('#present_address').val());
				$('#collaboration_pincode').val($('#present_pincode').val());
				$('#collaboration_country').val($('#present_country').val());
				$('#collaboration_country').trigger('change');

				$.ajax({
					type: "POST",
					url: "<?= base_url(); ?>admin/Ajax_controller/get_state_ajax",
					data: {
						'country': $("#present_country").val()
					},
					success: function(data) {
						console.log(data);
						$("#collaboration_state").empty();
						$('#collaboration_state').append('<option value="">Select State</option>');
						var opts = $.parseJSON(data);
						$.each(opts, function(i, d) {
							if (d.id == $('#present_state').val()) {
								$('#collaboration_state').append('<option selected value="' + d.id + '">' + d.name + '</option>');
							} else {
								$('#collaboration_state').append('<option value="' + d.id + '">' + d.name + '</option>');
							}
						});
						$('#collaboration_state').trigger('change');
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});

				$.ajax({
					type: "POST",
					url: "<?= base_url(); ?>admin/Ajax_controller/get_city_ajax",
					data: {
						'state': $("#present_state").val()
					},
					success: function(data) {
						console.log(data);
						$("#collaboration_city").empty();
						$('#collaboration_city').append('<option value="">Select City</option>');
						var opts = $.parseJSON(data);
						$.each(opts, function(i, d) {
							console.log(data);
							if (d.id == $('#present_city').val()) {
								$('#collaboration_city').append('<option selected value="' + d.id + '">' + d.name + '</option>');
							} else {
								$('#collaboration_city').append('<option value="' + d.id + '">' + d.name + '</option>');
							}
						});
						$('#collaboration_city').trigger('change');
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});
			} else {
				$('#collaboration_address').val('');
				$('#collaboration_country').val('');
				$('#collaboration_state').val('');
				$('#collaboration_city').val('');
				$('#collaboration_pincode').val('');
			}
		});
	});



	$(document).ready(function() {

		$('#flexCheckDefault_collaboration').on('click', function() {

			if ($(this).is(':checked')) {
				$('#permanent_address').val($('#collaboration_address').val());
				$('#permanent_pincode').val($('#collaboration_pincode').val());

				$('#permanent_country').val($('#collaboration_country').val());
				$('#permanent_country').trigger('change');


				$.ajax({
					type: "POST",
					url: "<?= base_url(); ?>admin/Ajax_controller/get_state_ajax",
					data: {
						'country': $("#collaboration_country").val()
					},
					success: function(data) {
						console.log(data);

						$("#permanent_state").empty();
						$('#permanent_state').append('<option value="">Select State</option>');
						var opts = $.parseJSON(data);
						$.each(opts, function(i, d) {
							if (d.id == $("#collaboration_state").val()) {
								$('#permanent_state').append('<option selected value="' + d.id + '">' + d.name + '</option>');
							} else {
								$('#permanent_state').append('<option value="' + d.id + '">' + d.name + '</option>');
							}
						});
						$('#permanent_state').trigger('change');
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});

				$.ajax({
					type: "POST",
					url: "<?= base_url(); ?>admin/Ajax_controller/get_city_ajax",
					data: {
						'state': $("#collaboration_state").val()
					},
					success: function(data) {
						console.log(data);
						$("#permanent_city").empty();
						$('#permanent_city').append('<option value="">Select City</option>');
						var opts = $.parseJSON(data);
						$.each(opts, function(i, d) {

							if (d.id == $("#collaboration_city").val()) {
								$('#permanent_city').append('<option selected value="' + d.id + '">' + d.name + '</option>');
							} else {
								$('#permanent_city').append('<option value="' + d.id + '">' + d.name + '</option>');
							}
						});
						$('#permanent_city').trigger('change');
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});

			} else {
				$('#permanent_address').val('');
				$('#permanent_country').val('');
				$('#permanent_state').val('');
				$('#permanent_city').val('');
				$('#permanent_pincode').val('');

			}
		});
	});
</script>

<script>
	$("#head_email").keyup(function() {
		if ($("#head_email").val() != '') {
			$.ajax({
				type: "POST",
				url: "<?= base_url(); ?>admin/Ajax_controller/get_unique_email_id",
				data: {
					'head_email': $("#head_email").val(),
					'center_type': $("#center_type").val(),
					'is_pulp': $("#is_pulp").val(),
					'is_bvoc': $("#is_bvoc").val(),
					'id': '<?= $id ?>'
				},
				success: function(data) {
					console.log(data);
					if (data == "0") {
						$("#head_email_error").html('');
						$("#submit").show();
					} else {
						$("#head_email_error").html('This email is already added');
						$("#submit").hide();
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}
			});
		}
	});

	$("#contact_person_email").keyup(function() {
		if ($("#contact_person_email").val() != '') {
			$.ajax({
				type: "POST",
				url: "<?= base_url(); ?>admin/Ajax_controller/get_unique_contact_person_email_id",
				data: {
					'contact_person_email': $("#contact_person_email").val(),
					'id': '<?= $id ?>'
				},
				success: function(data) {
					console.log(data);
					if (data == "0") {
						$("#contact_person_email_error").html('');
						$("#submit").show();
					} else {
						$("#contact_person_email_error").html('This contact person email is already added');
						$("#submit").hide();
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}
			});
		}
	});

	$("#coupon_code").keyup(function() {
		$.ajax({
			type: "POST",
			url: "<?= base_url(); ?>web/Web_controller/get_coupon_validator",
			data: {
				'coupon_code': $("#coupon_code").val()
			},
			success: function(data) {
				if (data == 0) {
					$("#coupon_success").html('');
					$("#coupon_error").html('Hmm. Invalid coupon, please enter valid coupon!');
				} else {
					$("#coupon_error").html('');
					$("#coupon_success").html('Congratulations.coupon, has been applied successfully!');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	});
</script>