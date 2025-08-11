<?php
// echo "<pre>";print_r($this->session->userdata('center_id'));exit;

include('header.php'); ?>
<style>
	#mycheckbox {
		height: 24px !important;
	}

	input {
		height: 48px !important;
	}

	input[type="file"] {
		padding: 0.875rem 1.375rem !important;
		height: 48px !important;
	}

	.select2-selection {
		height: 48px !important;
	}

	.form-control,
	.typeahead,
	.tt-query,
	.tt-hint {
		padding: 0.875rem 1.375rem !important;
	}
</style>

<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/croppie.css">

<div class="container-fluid page-body-wrapper">

	<div class="main-panel">

		<div class="content-wrapper">

			<div class="row">

				<div class="col-md-12 grid-margin stretch-card">

					<div class="card">

						<div class="card-body">

							<h4 class="card-title">Admission Form

							</h4>

							<p class="card-description">

								Please enter student details

							</p>

							<form method="post" name="admission_form" id="admission_form" enctype="multipart/form-data">

								<div class="row">

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputUsername1">Student Name *</label>

											<input type="text" name="student_name" id="student_name" class="form-control" placeholder="Student Full Name">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Father's/Husband's Name <span class="req">*</span></label>

											<input type="text" name="father_name" id="father_name" class="form-control" placeholder="Father's/Husband's Name">

										</div>

									</div>


									<div class="col-md-3">

										<div class="form-group">

											<label>Father's/Husband's Profession <span class="req">*</span></label>

											<input type="text" name="father_profession" id="father_profession" class="form-control" placeholder="Father's/Husband's Profession">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Mother's Name <span class="req">*</span></label>

											<input type="text" name="mother_name" id="mother_name" class="form-control charector" placeholder="Mothers Name">

										</div>

									</div>


									<div class="col-md-3">

										<div class="form-group">

											<label>Date of Birth <span class="req">*</span></label>

											<input type="text" name="date_of_birth" id="date_of_birth" class="form-control datepicker" placeholder="DD-MM-YY">

										</div>

									</div>

									<!-- </div>

						<div class="row"> -->

									<div class="col-md-3">

										<div class="form-group">

											<label>Mobile Number <span class="req">*</span></label>

											<input autocomplete="off" type="text" name="mobile" id="mobile" class="form-control number_only" placeholder="Mobile Number" maxlength="10" value="">

											<div class="error" id="mobile_error"></div>

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Email ID <span class="req">*</span></label>

											<input autocomplete="off" type="email" name="email" id="email" class="form-control" placeholder="Email ID">

											<div class="error" id="email_error"></div>

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Gender <span class="req">*</span></label>

											<select id="gender" name="gender" class="form-control js-example-basic-single">

												<option value="">Select Gender</option>

												<option value="Male">Male</option>

												<option value="Female">Female</option>

												<option value="Transgender">Transgender</option>

											</select>

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Category <span class="req">*</span></label>

											<select id="category" name="category" class="form-control js-example-basic-single">

												<option value="">Select Category</option>

												<option value="General">General (Open)</option>

												<option value="Other Backward Class">Other Backward Class (OBC)</option>

												<option value="Scheduled Caste">Scheduled Caste (SC)</option>

												<option value="Scheduled Tribe">Scheduled Tribe (ST)</option>

											</select>

										</div>

									</div>

									<!-- </div>

						<div class="row"> -->

									<div class="col-md-6">
										<div class="form-group">
											<label>Current Address <span class="req">*</span></label>

											<input type="text" class="form-control" name="address" id="address" placeholder="Address">
										</div>
									</div>



									<div class="col-md-3">

										<div class="form-group">

											<label>Nationality <span class="req">*</span></label>

											<input type="text" name="nationality" id="nationality" class="form-control charector" maxlength="100" placeholder="Nationality" <?php if (!empty($students)) { ?>value="<?= $students->nationality ?>" <?php } ?>>

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Religion <span class="req">*</span></label>

											<select name="religion" id="religion" class="form-control js-example-basic-single" placeholder="Religion">

												<option value="">Select Religion</option>

												<option value="Hindu" <?php if (!empty($old_student_details) && $old_student_details->religion == "Hindu") { ?>selected="selected" <?php } ?>>Hindu</option>
												<option value="DONYI POLO" <?php if (!empty($old_student_details) && $old_student_details->religion == "DONYI POLO") { ?>selected="selected" <?php } ?>>DONYI POLO</option>

												<option value="Sikh" <?php if (!empty($old_student_details) && $old_student_details->religion == "Sikh") { ?>selected="selected" <?php } ?>>Sikh</option>

												<option value="Christian" <?php if (!empty($old_student_details) && $old_student_details->religion == "Christian") { ?>selected="selected" <?php } ?>>Christian</option>

												<option value="Muslims" <?php if (!empty($old_student_details) && $old_student_details->religion == "Muslims") { ?>selected="selected" <?php } ?>>Muslim</option>

												<option value="Others" <?php if (!empty($old_student_details) && $old_student_details->religion == "Others") { ?>selected="selected" <?php } ?>>Others</option>

											</select>

										</div>

									</div>



									<div class="col-md-3" id="religin_specify_div" <?php if (empty($old_student_details)) { ?>style="display:none" <?php } else if ($old_student_details->religion == "Others") { ?> style="display:block" <?php } ?>>

										<div class="form-group">

											<label>Specify Religion <span class="req">*</span></label>

											<input type="text" name="religin_specify" id="religin_specify" class="form-control charector" placeholder="Please specify your religion" value="<?php if (!empty($old_student_details)) {
																																																echo $old_student_details->religin_specify;
																																															} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Photo <span class="req">*</span></label>

											<input type="file" name="userfile" id="userfile" class="form-control">

											<input type="hidden" name="hidden_image" id="hidden_image">

										</div>

									</div>



									<div class="col-md-3">

										<div class="form-group">

											<label>NOC</label>

											<input type="file" name="noc" id="noc" class="form-control">



										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Permission Letter <small>(If required?)</small></label>

											<input type="file" name="permission_letter" id="permission_letter" class="form-control">



										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label>Undertaking <small>(If required?)</small></label>

											<input type="file" name="undertaking" id="undertaking" class="form-control">



										</div>

									</div>



									<div class="col-sm-3">

										<div class="form-group">

											<label>Employment Details <span class="req">*</span></label>

											<select class="form-control js-example-basic-single select2_single" name="employement_type" id="employement_type">

												<option value="">Select Employment Type</option>

												<option value="Government Employee">Government Employee</option>

												<option value="Private Sector Employee">Private Sector Employee</option>

												<option value="Not Working">Not Working</option>

											</select>

										</div>

									</div>

									<div class="col-sm-3">

										<div class="form-group">

											<label>Country <span class="req">*</span></label>

											<select class="form-control js-example-basic-single" name="country" id="country">

												<option value="">Select Country</option>

												<?php if (!empty($country)) {

													foreach ($country as $country_result) {

												?>
														<option value="<?= $country_result->id ?>" <?php if (!empty($students) && $students->country_code == $country_result->sortname) { ?>selected="selected" <?php } ?>><?= $country_result->name ?></option>

												<?php }
												} ?>

											</select>

										</div>

									</div>

									<div class="col-sm-3">

										<div class="form-group">

											<label>State <span class="req">*</span></label>

											<select class="form-control js-example-basic-single" required name="state" id="state">

												<option value="">Select state</option>

											</select>

										</div>
									</div>

									<div class="col-sm-3">

										<div class="form-group">

											<label>City <span class="req">*</span></label>

											<select class="form-control js-example-basic-single" required name="city" id="city">

												<option value="">Select City</option>

											</select>

										</div>

									</div>

									<div class="col-sm-3">

										<div class="form-group">

											<label>Pin Code <span class="req">*</span></label>
											<input type="text" class="form-control" maxlength="6" minlength="6" name="pincode" id="pincode" placeholder="PinCode" <?php if (!empty($students)) { ?>value="<?= $students->pin_code ?>" <?php } ?>>
										</div>

									</div>

									<div class="col-sm-3 uid_input">

										<div class="form-group">

											<label class="uid_label">Aadhaar Number <span class="req">*</span></label>

											<input type="text" class="form-control identity_numer" name="identity_numer" id="identity_numer" placeholder="Enter Aadhaar Number">

											<input type="hidden" class="form-control id_type" name="id_type" id="id_type" value="1">

										</div>

									</div>

									<div class="col-sm-3 uid_soft_input">

										<div class="form-group">

											<label class="uid_soft_label">Upload Aadhaar Softcopy <span class="req">*</span></label>

											<input type="file" class="form-control identity_file" name="identity_file" id="identity_file" placeholder="Upload Aadhaar Softcopy">

										</div>

									</div>


									<div class="col-sm-3 uid_soft_input">
										<div class="form-group">
											<label>ABC/APAAR ID</label>
											<input type="text" class="form-control" name="abc_apaar_id" autocomplete="off" id="abc_apaar_id" placeholder="ABC/APAAR ID" value="">
										</div>
									</div>

								</div>

								<div class="row">



									<div class="col-sm-3">

										<div class="form-group">
											<label>Course Name<span class="req">*</span></label>
											<select id="course" name="course" class="form-control js-example-basic-single">
												<option value="">Select Course</option>
												<?php
												if (!empty($course)) {
													foreach ($course as $course_result) {
												?>
													<option value="<?= $course_result->id; ?>"><?= $course_result->course_name; ?></option>
												<?php }
												} ?>

											</select>

										</div>

									</div>

									<div class="col-sm-3">
										<div class="form-group">
											<label>Session<span class="req">*</span></label>
											<select id="session" name="session" class="form-control js-example-basic-single">
												<option value="">Select Session</option>
												<?php if(!empty($session)){ foreach($session as $session_result){?>
													<option value="<?=$session_result->id?>"><?=$session_result->session_name?></option>
												<?php }}?>
											</select>
										</div>
									</div>

									<div class="col-sm-3">
										<div class="form-group">
											<label>Stream <span class="req">*</span></label>
											<select name="stream" id="stream" class="form-control js-example-basic-single">
												<option value="">Select Stream</option>
											</select>
										</div>
									</div>

									<div class="col-sm-3">

										<div class="form-group">

											<label>Course Mode <span class="req">*</span></label>

											<select id="course_mode" name="course_mode" class="form-control js-example-basic-single select2_single">

												<option value="">Select Course Mode</option>
												
							
											</select>

										</div>

									</div>

									<div class="col-sm-3">

										<div class="form-group">

											<label>Duration <span class="req">*</span></label>

											<select id="year_sem" name="year_sem" class="form-control js-example-basic-single">

												<option value="">Select Semester/Year</option>

											</select>

										</div>

									</div>

									<div class="col-md-3 credit_note_div" style="display:none">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Credit Note*</label>

											<input type="text" class="form-control" id="credit_note" name="credit_note" value="<?php if (!empty($student)) {
																																	echo $student->credit_note;
																																} ?>" placeholder="Enter only University Name">

										</div>

									</div>

									<div class="col-sm-3">

										<div class="form-group">

											<label>Study Mode</label>

											<select id="study_mode" name="study_mode" class="form-control js-example-basic-single select2_single">

												<option value="">Select Study Mode</option>

												<option value="1">Regular</option>

												<option value="2">Online</option>

												<!--<option value="2">By Challan</option>

										-->

											</select>

										</div>

									</div>


									<?php
									$payment_term = !empty($center_info) ? $center_info->payment_term : '';
									?>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Payment Terms *</label>
											<select class="form-control js-example-basic-single" id="payment_term" name="payment_term" onchange="updateAdmissionFees()">
												<option value="">Select Payment Terms</option>
												<?php if ($payment_term == "1") { ?>
													<option value="1" selected="selected">Year</option>
												<?php } elseif ($payment_term == "2") { ?>
													<option value="2" selected="selected">Semester</option>
												<?php } elseif ($payment_term == "3") { ?>
													<option value="1" <?php echo ($payment_term == "1") ? 'selected="selected"' : ''; ?>>Year</option>
													<option value="2" <?php echo ($payment_term == "2") ? 'selected="selected"' : ''; ?>>Semester</option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Payment Mode</label>
											<select id="payment_mode" name="payment_mode" class="form-control js-example-basic-single select2_single">
												<option value="">Select Payment Mode</option>
												<option value="1">Online</option>
												<!--<option value="4">Wallet</option> -->
												<?php /*<option value="2">By Challan</option> 
										<option value="3">Cash</option>*/ ?>
											</select>
										</div>
									</div>

									<!-- <div class="col-sm-3 lateral_entry" style="display:none;"> -->
									<div class="col-sm-3 entry_type" style="display:none;">
										<div class="form-group">
											<label>Entry Type</label>
											<select class="form-control js-example-basic-single select2_single" id="admission_type" name="admission_type" style="display:block;width:100%;">
												<option value="0">Regular</option>
												<option value="1">Lateral Entry</option>
												<option value="2">Credit Transfer</option>
											</select>
										</div>
									</div>

									<div class="col-sm-3" id="bank_div" style="display:none">

										<div class="form-group">

											<label>Bank</label>

											<select id="bank" name="bank" class="form-control js-example-basic-single">

												<option value="">Select Bank</option>

												<?php if (!empty($bank)) {
													foreach ($bank as $bank_result) { ?>

														<option value="<?= $bank_result->id ?>"><?= $bank_result->bank_name ?></option>

												<?php }
												} ?>

											</select>

										</div>

									</div>

								</div>



								<div class="row">

									<div class="col-sm-3">

										<div class="form-group">

											<label>Late Fees <span class="req">*</span></label>

											<input placeholder="Late Fees" type="text" id="late_fees" name="late_fees" class="form-control" value="" readonly>

										</div>

									</div>

									<div class="col-sm-3 entry_type" style="display:none;">

										<div class="form-group">

											<label>Lateral Entry/Credit Transfer Fees</label>
											<!-- <input  type="text" readonly name="lateral_entry_fees" id="lateral_entry_fees" class="form-control" value="<?php if (!empty($lateral_fees)) {
																																								echo $lateral_fees->fees_amount;
																																							} ?>">  -->
											<input type="text" readonly name="lateral_entry_fees" id="lateral_entry_fees" class="form-control" value="0">
										</div>

									</div>

									<div class="col-sm-3">

										<div class="form-group">

											<label>Registration Fees</label>

											<input type="text" readonly name="registration_fees" id="registration_fees" class="form-control" value="0">

										</div>

									</div>

									<div class="col-sm-3">

										<div class="form-group">

											<label>Admission Fees <span class="req">*</span></label>

											<input placeholder="Admission Fees" type="text" id="admission_fees" name="admission_fees" class="form-control" value="" readonly>
											<input type="hidden" id="hidden_admission_fees" name="hidden_admission_fees" class="form-control" value="">
										</div>

									</div>

									<div class="col-sm-3">

										<div class="form-group">

											<label>Total Admission Fees <span class="req">*</span></label>

											<input placeholder="Total Admission Fees" type="text" id="total_admission_fees" name="total_admission_fees" class="form-control" value="" readonly>

										</div>

									</div>

								</div>
								<hr>
								<div class="col-md-12">

									<div class="row collapseOne" style="display:none">

										<div class="col-md-12 terms">

											<table class="detailTable" cellspacing="5" cellpadding="5">

												<tr>

													<td>

														<h4 align="justify"><b>Declaration:</b></h4>

														<br>

													</td>

												</tr>

											</table>

										</div>

									</div>

									<input type="hidden" name="email_val" id="email_val" value="0">

									<input type="hidden" name="mobile_val" id="mobile_val" value="0">

									<div class="row">

										<div class="col-md-12 terms">

											<table class="detailTable" cellspacing="5" cellpadding="5">

												<tr>

													<td>

														<br>

														<b>Declaration:</b>

														<br>

														<p align="justify"><b>I confirm that I have not made payment of any other amount to anybody other than deposited in the prescribed University account.</b></p>

														<p align="justify"><b>I solemnly declare and confirm that I am duly qualified to take admission in the course for which I have applied and all the certificates and testimonials attached with my application are true and valid. I have fully satisfied myself about the legal status of the University i.e. it is an autonomous statutory body with regulations making power for it's functioning and the University is duly authorized and competent to take my admission in the course for which I have applied and also to award the degree / diploma as per rules and regulation of the University. I also undertake not to ever raise any objection about Universities legal status to take my admission and award degrees on qualifying prescribed examinations. I also undertake not to demand refund of fee/charges paid by me. In case of any dispute/differences/claim of any value settlement by University arbitration clause shall be applicable.</b></p>

														<p align="justify"><b>I shall always follow the rules and regulations of the University and in case of any breach thereto, I shall be liable to be penalized for the same which may include expulsion from the University.</b></p>

														<br>

														<p align="justify">As per law and legal opinion University is empowered by authority of law to award degree's, diplomas, & certificate in all course of Education, there being no requirement to take approval from any other authorities all certificate degrees diplomas certificate awarded by University are Sui - generis valid in law and degree/diploma/certificate holders are automatically entitled to be recognised for government jobs and for Registration with all Professional Council. For Legal opinion and relevent laws and Court Judgments Visit University website.</p>



													</td>

												</tr>

											</table>

										</div>

									</div>

									<hr>

								</div>

								<div class="col-md-12">

									<div class="row">

										<div class="col-md-12 edu">

											<div class="form-group">

												<input type="checkbox" name="mycheckbox" id="mycheckbox" value="0" required="required" /><label style=" margin:0px;">&nbsp; I Agree to the declaration<span class="req">*</span></label>

											</div>

										</div>

									</div>



									<div class="row">

										<div class="col-md-12 edu">

											<div class="form-group">

												<label></label>

												<button type="submit" class="btn btn-primary btn-sm" name="register" id="register">Register</button>

												<div class="pull-right">



												</div>

											</div>

										</div>

									</div>

								</div>

							</form>

						</div>

					</div>

				</div>



			</div>

		</div>



		<!--------------------------------------   CROPING TOOL   ----------------------------------------------->

		<div id="uploadimageModal" class="modal" role="dialog">

			<div class="modal-dialog">

				<div class="modal-content">

					<div class="modal-header">

						<h4 class="modal-title">Upload & Crop Image</h4>

						<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->

					</div>

					<div class="modal-body">

						<div class="row">

							<div class="col-md-8 col-sm-8 col-xs-12 text-center">

								<div id="profile_image_data" style="width:350px; margin-top:30px"></div>

							</div>

							<div class="col-md-4 col-sm-4 col-xs-12 croping_button">

								<button class="btn btn-success crop_image" data-dismiss="modal">Crop & Upload Image</button>

								<button type="button" class="btn btn-default close_crop_model" data-dismiss="modal">Cancel</button>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>
		<input type="hidden" id="wallet_amt" value="<?php if (!empty($wallet)) {
														echo $wallet->amount;
													} ?>">


		<?php include('footer.php');

		$id = 0;

		if ($this->uri->segment(2) != "") {

			$id = $this->uri->segment(2);
		}

		?>

		<script src="<?= base_url(); ?>back_panel/js/croppie.js"></script>



		<script>
			$("#year_sem").change(function() {
				if ($("#course_mode").val() == "2") {
					if ($(this).val() >= 5) {
						$(".credit_note_div").show();
					} else {
						$(".credit_note_div").hide();
					}
				} else {
					if ($(this).val() >= 3) {
						$(".credit_note_div").show();
					} else {
						$(".credit_note_div").hide();
					}
				}
				if ($("#year_sem").val() == "1" || $("#year_sem").val() == "") {
					$("#admission_type").html('<option value="0">Regular</option>');
					$("#lateral_entry_fees").val('0');
					$(".entry_type").hide();
				} else {
					$("#lateral_entry_fees").val('<?= $center_profile->lateral_entry_fees ?>');
					$("#admission_type").html('<option value="1">Lateral Entry</option><option value="2">Credit Transfer</option>');
					$(".entry_type").show();
				}
				final_calculation();
			});
			$("#country").change(function() {
				$.ajax({
					type: "POST",
					url: "<?= base_url(); ?>admin/Ajax_controller/get_state_ajax",
					data: {
						'country': $("#country").val()
					},
					success: function(data) {
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
				if ($('#country').val() == '101') {
					$('.uid_input').show();
					$('.uid_soft_input').show();
					$('.uid_label').html('Aadhaar Number <span class="req">*</span>');
					$('.uid_soft_label').html('Upload Aadhaar Softcopy <span class="req">*</span>');
					$('.identity_numer').attr("placeholder", "Enter Aadhaar Number");
					$('.identity_numer').prop('required', true);
					$('.identity_file').attr("placeholder", "Upload Aadhaar Softcopy");
					$('.identity_file').prop('required', true);
					$('.id_type').val('1');
				} else {
					$('.uid_input').show();
					$('.uid_soft_input').show();
					$('.uid_label').html('Passport Number <span class="req">*</span>');
					$('.uid_soft_label').html('Upload Passport Softcopy <span class="req">*</span>');
					$('.identity_numer').attr("placeholder", "Enter Passport Number");
					$('.identity_numer').prop('required', true);
					$('.identity_file').attr("placeholder", "Upload Passport Softcopy");
					$('.identity_file').prop('required', true);
					$('.id_type').val('2');
				}
				final_calculation();
			});
			$("#state").change(function() {
				$.ajax({
					type: "POST",
					url: "<?= base_url(); ?>admin/Ajax_controller/get_city_ajax",
					data: {
						'state': $("#state").val()
					},
					success: function(data) {
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

			$("#course").change(function() {
				$("#year_sem").html("<option value=''>Select Semester/Year</option>");
				$("#course_mode").html("<option value=''>Select Course Mode</option>"); 
				$.ajax({
					type: "POST",
					url: "<?= base_url(); ?>center/Center_ajax_controller/get_course_stream_ajax",
					data: {
						'course': $("#course").val()
					},
					success: function(data) {
						$("#stream").empty();
						$('#stream').append('<option value="">Select Stream</option>');
						var opts = $.parseJSON(data);
						$.each(opts, function(i, d) {
							$('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
						});
						$('#stream').trigger('change');
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});
			});
			$("#stream").change(function() {
				$("#year_sem").html("<option value=''>Select Semester/Year</option>");
				$("#course_mode").html("<option value=''>Select Course Mode</option>");
				$.ajax({
					type: "POST",
					url: "<?= base_url(); ?>center/Center_controller/get_course_stream_course_mode",
					data: {
						'course': $("#course").val(),
						'stream': $("#stream").val(),
						'session': $("#session").val()
					},
					success: function(data) {
						$("#course_mode").html(data);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});
			});
			$("#course_mode").change(function() {
				$("#year_sem").html("<option value=''>Select Semester/Year</option>");
				$.ajax({
					type: "POST",
					url: "<?= base_url(); ?>web/Web_controller/get_course_stream_duration",
					data: {
						'course': $("#course").val(),
						'stream': $("#stream").val(),
						'course_mode': $("#course_mode").val(),
						'country': $("#country").val(),

						'session': $("#session").val()
					},
					success: function(data) {
						$("#year_sem").html(data);
						final_calculation();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});
			});

			function updateAdmissionFees() {
				final_calculation();
			}

			function final_calculation() {
				if ($("#session").val() != "" && $("#course").val() != "" && $("#stream").val() != "" && $("#country").val() != "" && $("#course_mode").val() != "") {
					$.ajax({
						type: "POST",
						url: "<?= base_url(); ?>center/Center_ajax_controller/get_course_stream_fees",
						data: {
							'session': $("#session").val(),
							'course': $("#course").val(),
							'stream': $("#stream").val(),
							'country': $("#country").val(),
							'course_mode' : $("#course_mode").val(),
						},
						success: function(data) {
							data = data.split("@@@");
							$("#late_fees").val(data[1]);
							$("#registration_fees").val(data[2]);
							// $("#admission_fees").val(data[0]);
							$("#hidden_admission_fees").val(data[0]);
							var calculatedFees;
							if ($('#payment_term').val() == "2") {
								$("#admission_fees").val($('#hidden_admission_fees').val() / 2);
							} else {
								$("#admission_fees").val($('#hidden_admission_fees').val());
							}
							var total_fees = parseInt($("#admission_fees").val()) + parseInt($("#late_fees").val()) + parseInt($("#registration_fees").val()) + parseInt($("#lateral_entry_fees").val());
							$("#total_admission_fees").val(total_fees);
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(textStatus, errorThrown);
						}
					});
				}
				// 	if(parseInt($("#wallet_amt").val()) >= parseInt($("#total_admission_fees").val())){ 
				// 		$("#payment_mode").html('<option value="">Select Payment Mode</option><option value="1">Online</option><option value="4">Wallet</option>');
				// 	}else{
				// 		$("#payment_mode").html('<option value="">Select Payment Mode</option><option value="1">Online</option>');
				// 	} 
				$("#payment_mode").html('<option value="">Select Payment Mode</option><option value="1">Online</option>');
			}
			$("#session").change(function() {
				final_calculation();
			});
			$("#email").keyup(function() {
				if ($("#email").val() != "") {
					$.ajax({
						type: "POST",
						url: "<?= base_url(); ?>web/Web_controller/get_unique_admission_email",
						data: {
							'email': $("#email").val()
						},
						success: function(data) {
							$("#email_val").val(data);
							check_available();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(textStatus, errorThrown);
						}
					});
				}
			});

			function check_available() {
				if ($("#email_val").val() >= 1 || $("#mobile_val").val() >= 1) {
					$("#register").hide();
					if ($("#email_val").val() >= "1") {
						$("#email_error").html("This email is already registered");
					}
					if ($("#mobile_val").val() >= "1") {
						$("#mobile_error").html("This mobile is already registered");
					}
				} else {

					$("#register").show();
					$("#email_error").html("");
					$("#mobile_error").html("");
				}
			}
			$(function() {
				$(".datepicker").datepicker({
					dateFormat: "dd-mm-yy",
					changeMonth: true,
					changeYear: true,
					maxDate: "-12Y",
					minDate: "-80Y",
					yearRange: "-100:-0"
				});
			});
			jQuery.validator.addMethod("validate_email", function(value, element) {

				if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

					return true;

				} else {

					return false;

				}

			}, "Please enter a valid Email.");



			$("#admission_form").validate({

				// ignore:'hidden',
				ignore: ":hidden:not(select)",

				rules: {

					student_name: "required",

					father_name: "required",

					mother_name: "required",

					userfile: "required",

					father_profession: "required",

					date_of_birth: "required",

					mobile: {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 12
					},

					email: {
						required: true,
						validate_email: true
					},

					gender: "required",

					nationality: "required",

					religion: {

						required: true,

						noHTMLtags: true

					},

					religin_specify: {

						required: true,

						noHTMLtags: true

					},

					category: "required",

					session: "required",

					course: "required",

					stream: "required",

					year_sem: "required",

					address: "required",

					country: "required",

					state: "required",

					city: "required",
					pincode: {
						required: true,
						digits: true,
						minlength: 6,
						maxlength: 6,
					},
					payment_method: "required",

					accept: "required",

					late_fees: "required",

					admission_fees: "required",

					total_admission_fees: "required",


					id_number: {
						required: true
					},

					study_mode: {
						required: true
					},

					payment_mode: {
						required: true
					},

					employement_type: {
						required: true
					},

					credit_note: {
						required: true
					},

					mycheckbox: {
						required: true
					},


					identity_numer: {
						required: true,
						number: true,

						// minlength:12,maxlength:12
					},

					identity_file: {
						required: true
					},

					course_mode: {
						required: true
					},

				},

				messages: {

					student_name: "Please enter Full name",

					father_name: "Please enter father's/husband's name",

					mother_name: "Please enter mother name!",
					father_profession: "Please enter father's/husband's profession",

					userfile: "Please select photo",

					date_of_birth: "Select DOB",

					mobile: {

						required: "Please enter mobile number",

						number: "Please enter only number",

						minlength: "Please enter 10 to 12 digit mobile number",

						maxlength: "Please enter 10 to 12 digit mobile number",

					},

					email: {

						required: "Please enter email",

						validate_email: "Please enter valid email",

					},

					gender: "Please select gender",

					nationality: "Please enter nationality",

					religion: {

						required: "Please select religion",

						noHTMLtags: "HTML tags not allowed",

					},

					religin_specify: {

						required: "Please specify your religin",

						noHTMLtags: "HTML tags not allowed",

					},

					category: "Please select category",

					mode: "Please select payment mode",

					deposit_date: "Please select deposit date",

					session: "Please select session",

					course: "Please select Course Name",

					stream: "Please select stream Name",

					year_sem: "Please select semester/year Name",

					address: "Enter correspondence address",

					country: "Please select country",

					state: "Please select state",

					city: "Please select city",

					pincode: {
						required: "Please enter pincode",
						digits: "Please enter valid pincode",
						minlength: "Please enter 6 digit pincode",
						maxlength: "Please enter 6 digit pincode",
					},

					payment_method: "Please select payment method",

					accept: "Please accept our terms & conditions",

					late_fees: "Please enter late fees",

					admission_fees: "Please enter admission fees",

					total_admission_fees: "Please enter total admission fees",

					id_number: {
						required: "Please enter id number"
					},

					study_mode: {
						required: "Please select study mode"
					},

					payment_mode: {
						required: "Please select payment mode"
					},

					employement_type: {
						required: "Please select employement type"
					},

					credit_note: {
						required: "Please enter credit note"
					},

					mycheckbox: {
						required: "Please accept declaration"
					},

					identity_file: {
						required: "Please upload file"
					},

					identity_numer: {
						required: "Please enter id card number",
						number: "Please enter only number",

						// minlength:"Please enter 12 digit id card  number!",

						// maxlength:"Please enter 12 digit id card  number!",

					},
					course_mode: {
						required: "Please select course mode"
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
				},

				// errorPlacement: function(error, element) {

				//             if (element.attr("type") == "select") {

				//                 error.insertAfter(element.parent());

				//             } else {

				//                 if(element.parent('.input-group').length) {

				//                     error.insertAfter(element.parent());

				//                 } else {

				//                     error.insertAfter(element);

				//                 }

				//             }

				//         },

				submitHandler: function(form) {

					form.submit();

				}

			});


			$('#gender').on('change', function() {
				$('#gender').valid();
			});

			$('#category').on('change', function() {
				$('#category').valid();
			});


			$('#employement_type').on('change', function() {
				$('#employement_type').valid();
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


			$('#course').on('change', function() {
				$('#course').valid();
			});

			$('#session').on('change', function() {
				$('#session').valid();
			});

			$('#stream').on('change', function() {
				$('#stream').valid();
			});

			$('#course_mode').on('change', function() {
				$('#course_mode').valid();
			});

			$('#year_sem').on('change', function() {
				$('#year_sem').valid();
			});

			$('#study_mode').on('change', function() {
				$('#study_mode').valid();
			});

			$('#payment_mode').on('change', function() {
				$('#payment_mode').valid();
			});


			$(document).ready(function() {

				$image_crop = $('#profile_image_data').croppie({

					enableExif: true,

					viewport: {

						width: 200,

						height: 200,

						type: 'square' //circle

					},

					boundary: {

						width: 300,

						height: 300

					}

				});



				/* $('#userfile').on('change', function(e){

    var reader = new FileReader();

    reader.onload = function (event) {

      $image_crop.croppie('bind', {

        url: event.target.result

      }).then(function(){

        console.log('jQuery bind complete');

      });

    }

    reader.readAsDataURL(this.files[0]);

    $('#uploadimageModal').modal('show');

  });



  $('.crop_image').click(function(event){

    $image_crop.croppie('result', {

      type: 'canvas',

      size: 'viewport'

    }).then(function(response){

      $.ajax({

        url:"<?= base_url(); ?>update_pic_photo.php",

        type: "POST",

        data:{"image": response},

        success:function(data){

			$("#hidden_image").val(data);

          

        }

      });

    })

  });*/

			});

			$("#payment_mode").change(function() {

				if ($(this).val() == "2") {

					$("#bank_div").show();

				} else {

					$("#bank_div").hide();

				}

			});



			$("#noc").change(function() {

				var ext = this.value.split('.').pop().toLowerCase();

				switch (ext) {
					case 'jpg':
					case 'png':
					case 'pdf':
					case 'doc':
					case 'docx':
						break;
					default:
						alert('Only jpg, png, pdf, doc, docx files are supported.');
						this.value = '';
				}

			});

			$("#permission_letter").change(function() {

				var ext = this.value.split('.').pop().toLowerCase();

				switch (ext) {
					case 'jpg':
					case 'png':
					case 'pdf':
					case 'doc':
					case 'docx':
						break;
					default:
						alert('Only jpg, png, pdf, doc, docx files are supported.');
						this.value = '';
				}

			});

			$("#undertaking").change(function() {

				var ext = this.value.split('.').pop().toLowerCase();

				switch (ext) {
					case 'jpg':
					case 'png':
					case 'pdf':
					case 'doc':
					case 'docx':
						break;
					default:
						alert('Only jpg, png, pdf, doc, docx files are supported.');
						this.value = '';
				}

			});



			$("#identity_file").change(function() {

				var ext = this.value.split('.').pop().toLowerCase();

				switch (ext) {
					case 'jpg':
					case 'png':
					case 'pdf':
					case 'doc':
					case 'docx':
						break;
					default:
						alert('Only jpg, png, pdf, doc, docx, files are supported.');
						this.value = '';
				}

			});

			$("#employement_type").change(function() {

				if ($(this).val() == "Government Employee") {
					$("#noc").prop('required', true);
				} else {
					$("#noc").prop('required', false);
				}

			});

			$("#religion").change(function() {
				$('#admission_form').find('span[for="religion"].error').remove();
				if ($("#religion").val() == "Others") {
					$("#religin_specify_div").show();
				} else {
					$("#religin_specify_div").hide();
				}
			});
		</script>