<?php include("header.php"); ?>

<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/croppie.css">

<style>



</style>

<!-- <div class="header_cc_area" style="background-image:url('<?= $this->Digitalocean_model->get_photo('images/header_area.jpg') ?>')"> -->
<div class="header_cc_area" style="background-image:url('images/header_area.jpg')">

	<div class="container">

		<div class="row">

			<h1>Collaboration Form</h1>

			<p>Home / Collaboration Form</p>

		</div>

	</div>

</div>

<div class="uni_mainWrapper">

	<div class="container">

		<div class="row">

			<div class="container">

				<div class="online_wrapper">





					<div class="admission_div">

						<form method="post" name="single_form" id="single_form" enctype="multipart/form-data">

							<div class="row">

								<div class="col-md-12">

									<div class="common_details">

										<div class="col-md-12">

											<h3>Center Details </h3>
											<?php if (!empty($information_center)) { ?><p>You will get 50% rewards on each admissions</p><?php } ?>



										</div>

										<div class="clearfix"></div>

									</div>

								</div>



							</div>

							<div class="row">

								<div class="col-md-12">

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputUsername1">Center Name *</label>

											<input type="text" class="form-control" id="center_name" name="center_name" placeholder="Center Name" value="<?php if (!empty($single)) {
																																								echo $single->center_name;
																																							}
																																							if (!empty($information_center)) {
																																								echo $information_center->center_name;
																																							} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputUsername1">Head Name *</label>

											<input type="text" class="form-control" id="head_name" name="head_name" placeholder="Head Name" value="<?php if (!empty($single)) {
																																						echo $single->head_name;
																																					}
																																					if (!empty($information_center)) {
																																						echo $information_center->information_person_name;
																																					} ?>">
											<input type="hidden" name="is_information" value="<?php if (!empty($information_center)) {
																									echo "1";
																								} else {
																									echo "0";
																								} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputEmail1">Head Email *</label>

											<input type="text" class="form-control" id="head_email" name="head_email" placeholder="Head Email" value="<?php if (!empty($single)) {
																																							echo $single->head_email;
																																						}
																																						if (!empty($information_center)) {
																																							echo $information_center->information_email;
																																						} ?>">

											<div class="error" id="email_error"></div>

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputEmail1">Head Contact Number *</label>

											<input type="text" class="form-control" id="head_contact_number" name="head_contact_number" placeholder="Head Contact Number" value="<?php if (!empty($single)) {
																																														echo $single->head_contact_number;
																																													}
																																													if (!empty($information_center)) {
																																														echo $information_center->information_mobile;
																																													} ?>">

											<div class="error" id="contact_number_error"></div>

										</div>

									</div>

								</div>

							</div>

							<div class="row">

								<div class="col-md-12">

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputPassword1">Contact Person Name *</label>

											<input type="text" class="form-control" id="contact_person_name" name="contact_person_name" placeholder="Contact Person Name" value="<?php if (!empty($single)) {
																																														echo $single->contact_person_name;
																																													} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Contact Person Contact </label>

											<input type="text" class="form-control" id="contact_person_contact" name="contact_person_contact" placeholder="Contact Person Contact" value="<?php if (!empty($single)) {
																																																echo $single->contact_person_contact;
																																															} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Contact Person Email </label>

											<input type="text" class="form-control" id="contact_person_email" name="contact_person_email" placeholder="Contact Person Email" value="<?php if (!empty($single)) {
																																														echo $single->contact_person_email;
																																													} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Organization PAN Card Number*</label>

											<input type="text" placeholder="Organization PAN Card " name="pan_card_orgnization" id="pan_card_orgnization" class="form-control">

										</div>

									</div>
									<div class="col-md-3">

										<div class="form-group">
											<label>Reference Name*</label>
											<input type="text" placeholder="Please enter if any reference" name="reference" id="reference" class="form-control">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Organization Head PAN Card Number*</label>

											<input type="text" placeholder="Organization Head PAN Card " name="pan_card_orgnization_head" id="pan_card_orgnization_head" class="form-control">

										</div>

									</div>

								</div>

							</div>

							<hr>

							<div class="row">

								<div class="col-md-12">

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Present Address *</label>

											<input type="text" class="form-control" id="present_address" name="present_address" placeholder="Present Address" value="<?php if (!empty($single)) {
																																											echo $single->present_address;
																																										} ?>">

										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Country *</label>

											<select class="form-control js-example-basic-single" id="present_country" name="present_country" placeholder="Country">

												<option value="">Select Country</option>

												<?php if (!empty($country)) {
													foreach ($country as $country_result) { ?>

														<option value="<?= $country_result->id ?>" <?php if (!empty($single) && $single->country == $country_result->id) { ?>selected="selected" <?php } ?>><?= $country_result->name ?></option>

												<?php }
												} ?>

											</select>

										</div>

									</div>



									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">State *</label>

											<select class="form-control js-example-basic-single" id="present_state" name="present_state" placeholder="State">

												<option value="">Select State</option>



											</select>

										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">City *</label>

											<select class="form-control js-example-basic-single" id="present_city" name="present_city" placeholder="City">

												<option value="">Select City</option>



											</select>

										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Pincode *</label>

											<input type="text" class="form-control" id="present_pincode" name="present_pincode" placeholder="Pincode" value="<?php if (!empty($single)) {
																																									echo $single->pincode;
																																								} ?>">

										</div>

									</div>

								</div>

							</div>

							<hr>

							<div class="row">

								<div class="col-md-12">

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Collaboration Address *</label>

											<input type="text" class="form-control" id="collaboration_address" name="collaboration_address" placeholder="Present Address" value="<?php if (!empty($single)) {
																																														echo $single->present_address;
																																													} ?>">

										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Country *</label>

											<select class="form-control js-example-basic-single" id="collaboration_country" name="collaboration_country" placeholder="Country">

												<option value="">Select Country</option>

												<?php if (!empty($country)) {
													foreach ($country as $country_result) { ?>

														<option value="<?= $country_result->id ?>" <?php if (!empty($single) && $single->country == $country_result->id) { ?>selected="selected" <?php } ?>><?= $country_result->name ?></option>

												<?php }
												} ?>

											</select>

										</div>

									</div>



									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">State *</label>

											<select class="form-control js-example-basic-single" id="collaboration_state" name="collaboration_state" placeholder="State">

												<option value="">Select State</option>



											</select>

										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">City *</label>

											<select class="form-control js-example-basic-single" id="collaboration_city" name="collaboration_city" placeholder="City">

												<option value="">Select City</option>



											</select>

										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Pincode *</label>

											<input type="text" class="form-control" id="collaboration_pincode" name="collaboration_pincode" placeholder="Pincode" value="<?php if (!empty($single)) {
																																												echo $single->pincode;
																																											} ?>">

										</div>

									</div>



								</div>

							</div>

							<hr>

							<div class="row">

								<div class="col-md-12">

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Permanent/Corresponding Address *</label>

											<input type="text" class="form-control" id="permanent_address" name="permanent_address" placeholder="Permanent Address">

										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Country *</label>

											<select class="form-control js-example-basic-single" id="permanent_country" name="permanent_country" placeholder="Country">

												<option value="">Select Country</option>

												<?php if (!empty($country)) {
													foreach ($country as $country_result) { ?>

														<option value="<?= $country_result->id ?>" <?php if (!empty($single) && $single->country == $country_result->id) { ?>selected="selected" <?php } ?>><?= $country_result->name ?></option>

												<?php }
												} ?>

											</select>

										</div>

									</div>



									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">State *</label>

											<select class="form-control js-example-basic-single" id="permanent_state" name="permanent_state" placeholder="State">

												<option value="">Select State</option>



											</select>

										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">City *</label>

											<select class="form-control js-example-basic-single" id="permanent_city" name="permanent_city" placeholder="City">

												<option value="">Select City</option>



											</select>

										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Pincode *</label>

											<input type="text" class="form-control" id="permanent_pincode" name="permanent_pincode" placeholder="Pincode">

										</div>

									</div>



								</div>

							</div>

							<hr>

							<div class="row">

								<div class="col-md-12">

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputPassword1">Account Name *</label>

											<input type="text" class="form-control" id="account_name" name="account_name" placeholder="Account Name" value="<?php if (!empty($single)) {
																																								echo $single->account_name;
																																							} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Account Number * </label>

											<input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" value="<?php if (!empty($single)) {
																																										echo $single->account_number;
																																									} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Bank Name </label>

											<input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" value="<?php if (!empty($single)) {
																																						echo $single->bank_name;
																																					} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">IFSC Code * </label>

											<input type="text" class="form-control" id="ifsc" name="ifsc" placeholder="IFSC Code" value="<?php if (!empty($single)) {
																																				echo $single->ifsc;
																																			} ?>">

										</div>

									</div>

								</div>

							</div>

							<hr>

							<div class="row">

								<div class="col-md-12">



									<div class="col-md-3">

										<div class="form-group">

											<label>Head Photo *</label>

											<input type="file" name="photo" id="photo" class="form-control" accept=".jpg,.png,.gif,.jpeg">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Upload Head Adharcard *</label>

											<input type="file" name="adhar_card" id="adhar_card" class="form-control" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Upload PAN Card *</label>

											<input type="file" name="pan_card" id="pan_card" class="form-control" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">

										</div>

									</div>



									<div class="col-sm-3">

										<div class="form-group">

											<label class="uid_soft_label">Other Multiple Document</label>

											<input type="file" class="form-control" name="other_document[]" id="other_document" multiple placeholder="Upload Other Document" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">

										</div>

									</div>

								</div>

							</div>
                            <div class="col-md-12"> 
								<div class="row"> 
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
							<div class="col-md-12">

								<div class="row">

									<div class="col-md-2 edu">

										<strong>Captcha <span class="req">*</span></strong>

									</div>

									<div class="col-md-6 edu">

										<div class="form-group">
												<div class="g-recaptcha" data-sitekey="<?=GOOGLE_DATA_SITEKEY?>"></div>

										</div>

									</div>

								</div>

							</div>





							<div class="col-md-12">



								<div class="row">

									<div class="col-md-12 edu">

										<div class="form-group">

											<label></label>

											<input type="hidden" class="form-control" id="email_val" name="email_val" value="0">

											<input type="hidden" class="form-control" id="contact_number_val" name="contact_number_val" value="0">

											<button type="submit" class="btn btn-primary" name="register" id="register">Submit</button>

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









<?php include("footer.php"); ?>

<script>
$("#coupon_code").keyup(function(){   
	$.ajax({ 
		type: "POST", 
		url: "<?=base_url();?>web/Web_controller/get_coupon_validator", 
		data:{'coupon_code':$("#coupon_code").val()}, 
		success: function(data){ 
			if(data == 0){
				$("#coupon_success").html('');
				$("#coupon_error").html('Hmm. Invalid coupon, please enter valid coupon!');
			}else{
				$("#coupon_error").html('');
				$("#coupon_success").html('Congratulations.coupon, has been applied successfully!');
			} 
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

		$('#single_form').validate({

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

					number: true,

				},

				contact_person_name: {

					required: true,

				},

				contact_person_contact: {

					number: true,

				},

				contact_person_email: {

					validate_email: true,

				},

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

				},

				pan_card_orgnization_head: {

					required: true,

					validate_pan: true,

				},

				pan_card_orgnization: {

					required: true,

					validate_pan: true,

				},
				reference:{
				  	required: true,  
				}



			},

			messages: {

				center_name: {

					required: "Please enter center name",

				},

				head_name: {

					required: "Please enter head name",

				},

				head_email: {

					required: "Please enter email",

					validate_email: "Please eneter valid email",

				},

				head_contact_number: {

					required: "Please enter contact number",

					number: "Please neter valid contact number",

				},

				contact_person_name: {

					required: "Please enter contact person name",

				},

				contact_person_contact: {

					number: "Please neter valid contact number",

				},

				contact_person_email: {

					validate_email: "Please eneter valid email",

				},

				present_address: {

					required: "Please eneter address",

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

					required: "Please enter pincode",

					number: "Please enter valid pincode",

					minlength: "Please enter valid pincode",

					maxlength: "Please enter valid pincode",

				},

				collaboration_address: {

					required: "Please eneter address",

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

					required: "Please enter pincode",

					number: "Please enter valid pincode",

					minlength: "Please enter valid pincode",

					maxlength: "Please enter valid pincode",

				},

				permanent_address: {

					required: "Please eneter address",

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

					required: "Please enter pincode",

					number: "Please enter valid pincode",

					minlength: "Please enter valid pincode",

					maxlength: "Please enter valid pincode",

				},

				photo: {

					required: "Please select head photo",

				},

				adhar_card: {

					required: "Please select aadhar card",

				},

				pan_card: {

					required: "Please select pan card",

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

				},

				pan_card_orgnization_head: {

					required: "Please enter oranization head PAN Card number",

					validate_pan: "Please enter valid PAN Card Number",



				},



				pan_card_orgnization: {

					required: "Please enter oranization PAN Card number",

					validate_pan: "Please enter valid PAN Card Number",

				},
				reference:{
				  	required: "Please enter reference name",  
				}

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

	});

	$("#collaboration_state").change(function() {

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

	});

	$("#permanent_country").change(function() {

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

	});

	$("#permanent_state").change(function() {

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

	});

	$("#head_email").keyup(function() {
		$.ajax({

			type: "POST",

			url: "<?= base_url(); ?>web/Web_controller/get_center_unique_email",

			data: {
				'head_email': $("#head_email").val()
			},

			success: function(data) {
				if(data==0){
					$("#email_val").val(data);
				}else{
					check_avaliable();
				}


			},

			error: function(jqXHR, textStatus, errorThrown) {

				console.log(textStatus, errorThrown);

			}

		});

	});

	$("#head_contact_number").keyup(function() {

		$.ajax({

			type: "POST",

			url: "<?= base_url(); ?>web/Web_controller/get_center_unique_contact_number",

			data: {
				'head_contact_number': $("#head_contact_number").val()
			},

			success: function(data) {
				if(data==0){
					$("#contact_number_val").val(data);
				}else{
					check_avaliable();
				}
				
			},

			error: function(jqXHR, textStatus, errorThrown) {

				console.log(textStatus, errorThrown);

			}

		});

	});

	function check_avaliable() {

		if ($("#email_val").val() != "0") {

			$("#email_error").html("This email is already used, please try another.");

		} else {

			$("#email_error").html("");

		}

		if ($("#contact_number_val").val() != "0") {

			$("#contact_number_error").html("This contact number is already used, please try another.");

		} else {

			$("#contact_number_error").html("");

		}

		if ($("#contact_number_val").val() == "0" && $("#email_val").val() == "0") {

			$("#single_button").show();

		} else {

			$("#single_button").hide();

		}

	}

	$(function() {

		$(".datepicker").datepicker({

			dateFormat: "dd-mm-yy",

			changeMonth: true,

			changeYear: true,

			/*maxDate: "-12Y",

			minDate: "-80Y",

			yearRange: "-100:-0"*/

		});

	});
</script>