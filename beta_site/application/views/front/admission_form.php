<?php include('header.php') ?>
<style>
	.terms_para {
		display: none;
	}
</style>
<!-- Start Page Title Area -->
<div class="page-title-area bg-27">
	<div class="container">
		<div class="page-title-content">
			<h2>Admission Form</h2>
			<ul>
				<li>
					<a href="<?= base_url() ?>">
						Home
					</a>
				</li>
				<li class="active">Admission Form</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Page Title Area -->
<!-- Start Candidates Resume Area -->
<section class="candidates-resume-area ptb-100">
	<?php if ($this->session->userdata('otp_otp') == "vxcv") { ?>
		<div class="main_div">
			<div class="col-md-12">
				<form method="post" name="otp_form" id="otp_form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="personal_details">
								<h3>Mobile Number Verification</h3>
								<small>Please provide your mobile number</small>
								<hr>
							</div>
						</div>
					</div>
					<div class="row edu">
						<div class="col-md-12">
							<div class="form-group">
								<label>Enter Your Name<span class="req">*</span></label>
								<input type="text" name="otp_name" id="otp_name" required class="form-control charector" placeholder="Enter Your Name">
							</div>
						</div>
					</div>
					<div class="row edu">
						<div class="col-md-12">
							<div class="form-group">
								<label>Enter Your Mobile Number<span class="req">*</span></label>
								<input type="text" name="otp_mobile_number" id="otp_mobile_number" required class="form-control number_only" placeholder="Enter Your Mobile Number">
								<div id="mobile_otp_error"></div>
							</div>
						</div>
					</div>
					<div class="row edu">
						<div class="col-md-12">
							<div class="form-group">
								<label>Enter Your Email<span class="req">*</span></label>
								<input type="text" name="otp_email" id="otp_email" required class="form-control" placeholder="Enter Your Email">
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
	<?php } else if ($this->session->userdata('otp_otp') == "dsadsads" && $this->session->userdata('is_verified') == "dsadsads") { ?>
		<div class="main_div">
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
								<button type="submit" class="default-btn" name="verify" id="verify" value="verify">Verify</button>
								Didn't get OTP? <a href="<?= base_url(); ?>resend_otp">Click Here</a>
								<div class="pull-right">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	<?php } else { 
		// echo "<pre>";print_r($old_student_details);exit;
		?>
		<div class="container">
			<div class="candidates-resume-content">
				<form class="resume-info" id="admission_form" name="admission_form" enctype="multipart/form-data" method="post" onsubmit="return validateForm();">
					<div class="form_title_box">
						<h3>Personal Details</h3>
						<p><Small>Please provide your personal details</Small></p>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Email Address <span class="req">*</span></label>
								<input autocomplete="off" type="text" name="email" id="email" class="form-control" placeholder="Email Address" value="<?php if (!empty($old_student_details)) {
																																							echo $old_student_details->email;
																																						} ?>" placeholder="Email Address">
								<div class="error" id="email_error"></div>
							</div>
						</div>
						<!-- 							
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Student Name <span class="req">*</span></label>
									<input type="text" name="student_name" id="student_name" class="form-control charector" autocomplete="off" placeholder="Student Full Name" value="<?php if (!empty($old_student_details)) {
																																															echo $old_student_details->student_name;
																																														} ?>">
								</div>
							</div> -->
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Student Name <span class="req">*</span></label>
								<input type="text" name="student_name" id="student_name" class="form-control charector remove_mr no-dot" autocomplete="off" placeholder="Student Full Name" value="<?php if (!empty($old_student_details)) {
																																															echo $old_student_details->student_name;
																																														} ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Father's/Husband's Name <span class="req">*</span></label>
								<input type="text" name="father_name" id="father_name" class="form-control charector remove_mr no-dot" autocomplete="off" placeholder="Father's Full Name" value="<?php if (!empty($old_student_details)) {
																																														echo $old_student_details->father_name;
																																													} ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Father's/Husband's Profession <span class="req">*</span></label>
								<input type="text" name="father_profession" autocomplete="off" id="father_profession" class="form-control charector" placeholder="Father's/Husband's Profession" value="<?php if (!empty($old_student_details)) {
																																																			echo $old_student_details->father_profession;
																																																		} ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Mother's Name <span class="req">*</span></label>
								<input type="text" name="mother_name" id="mother_name" autocomplete="off" class="form-control charector remove_mr no-dot" placeholder="Mother's Full Name" value="<?php if (!empty($old_student_details)) {
																																														echo $old_student_details->mother_name;
																																													} ?>">
							</div>
						</div>
						<!-- <div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Mother's Profession <span class="req">*</span></label>
									<input type="text" name="mother_profession" autocomplete="off" id="mother_profession" class="form-control charector" placeholder="Mother's Profession" value="<?php if (!empty($old_student_details)) {
																																																		echo $old_student_details->mother_profession;
																																																	} ?>">
								</div>
							</div>  -->
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<!-- <label>Date of Birth</label>
									<div class="input-group date" id="datetimepicker">
										<input type="text"  name="date_of_birth" id="date_of_birth" class="form-control datepicker" placeholder="DD-MM-YY"> -->
								<!-- <span class="input-group-addon"></span> -->
								<!-- <i class="bx bx-calendar"></i> -->
								<!-- </div>	 -->
								<label>Date of Birth <span class="req">*</span></label>
								<input type="text" name="date_of_birth" id="date_of_birth" class="form-control datepicker" placeholder="DD-MM-YY" autocomplete="off" value="<?php if (!empty($old_student_details)) {
																																												echo $old_student_details->date_of_birth;
																																											} ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Mobile Number <span class="req">*</span></label>
								<!-- <input autocomplete="off" type="text" name="mobile" id="mobile" class="form-control number_only" placeholder="Mobile Number" maxlength="10" minlength="10" value="<?php echo $this->session->userdata('otp_mobile'); ?>"> -->
								<input autocomplete="off" type="text" name="mobile" id="mobile" class="form-control number_only" placeholder="Mobile Number" maxlength="10" minlength="10" value="<?php if (!empty($old_student_details)) {
																																												echo $old_student_details->mobile;
																																											} ?>">
								
								<div class="error" id="mobile_error"></div>
							</div>
						</div>
						<!-- <div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Email Address <span class="req">*</span></label>
									<input autocomplete="off" type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="<?php if (!empty($old_student_details)) {
																																								echo $old_student_details->email;
																																							} ?>">
									<div class="error" id="email_error"></div>
								</div>
							</div> -->
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Gender <span class="req">*</span></label>
								<select id="gender" name="gender" class="form-control js-example-basic-single select2_single">
									<option value="">Select Gender</option>
									<option value="Male" <?php if (!empty($old_student_details) && $old_student_details->gender == 'Male') { ?> selected="selected" <?php } ?>>Male</option>
									<option value="Female" <?php if (!empty($old_student_details) && $old_student_details->gender == 'Female') { ?> selected="selected" <?php } ?>>Female</option>
									<option value="Transgender" <?php if (!empty($old_student_details) && $old_student_details->gender == 'Transgender') { ?> selected="selected" <?php } ?>>Transgender</option>
								</select>
								<label style="display:none;" id="gender-error" class="error" for="gender">Please select gender</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Category <span class="req">*</span></label>
								<select id="category" name="category" class="form-control js-example-basic-single select2_single">
									<option value="">Select Category</option>
									<option value="General" <?php if (!empty($old_student_details) && $old_student_details->category == 'General') { ?> selected="selected" <?php } ?>>General (Open)</option>
									<option value="Other Backward Class" <?php if (!empty($old_student_details) && $old_student_details->category == 'Other Backward Class') { ?> selected="selected" <?php } ?>>Other Backward Class (OBC)</option>
									<option value="Scheduled Caste" <?php if (!empty($old_student_details) && $old_student_details->category == 'Scheduled Caste') { ?> selected="selected" <?php } ?>>Scheduled Caste (SC)</option>
									<option value="Scheduled Tribe" <?php if (!empty($old_student_details) && $old_student_details->category == 'Scheduled Tribe') { ?> selected="selected" <?php } ?>>Scheduled Tribe (ST)</option>
								</select>
								<label style="display:none;" id="category-error" class="error" for="category">Please select category</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Current Address <span class="req">*</span></label>
								<input type="text" class="form-control rules" name="address" id="address" placeholder="Current Address" autocomplete="off" value="<?php if (!empty($old_student_details)) {
																																										echo $old_student_details->address;
																																									} ?>">
							</div>
						</div>
						<!-- <div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>ID Type <span class="req">*</span></label>
									<select name="id_type" id="id_type" class="form-control select2_single">
										<option value="">Select ID Type</option>
										<?php if (!empty($id_name)) {
											foreach ($id_name as $id_name_result) { ?>
												<option value="<?= $id_name_result->id ?>"><?= $id_name_result->id_name ?></option>
										<?php }
										} ?>
									</select>
								</div>
							</div> -->
						<!-- <div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>ID Number <span class="req">*</span></label>
									<input type="text" name="id_number" id="id_number" placeholder="ID Number" autocomplete="off" class="form-control rules" maxlength="100" placeholder="" value="<?php if (!empty($old_student_details)) {
																																																		echo $old_student_details->id_number;
																																																	} ?>">
								</div>
							</div> -->
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Nationality <span class="req">*</span></label>
								<input type="text" name="nationality" id="nationality" autocomplete="off" class="form-control charector" maxlength="100" placeholder="Nationality" value="<?php if (!empty($old_student_details)) {
																																																echo $old_student_details->nationality;
																																															} ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Religion <span class="req">*</span></label>
								<select name="religion" id="religion" class="form-control charector js-example-basic-single select2_single" maxlength="100" placeholder="Religion">
									<option value="">Select Religion</option>
									<option value="Hindu" <?php if (!empty($old_student_details) && $old_student_details->religion == "Hindu") { ?>selected="selected" <?php } ?>>Hindu</option>
									<option value="DONYI POLO" <?php if (!empty($old_student_details) && $old_student_details->religion == "DONYI POLO") { ?>selected="selected" <?php } ?>>DONYI POLO</option>
									<option value="Sikh" <?php if (!empty($old_student_details) && $old_student_details->religion == "Sikh") { ?>selected="selected" <?php } ?>>Sikh</option>
									<option value="Christian" <?php if (!empty($old_student_details) && $old_student_details->religion == "Christian") { ?>selected="selected" <?php } ?>>Christian</option>
									<option value="Muslims" <?php if (!empty($old_student_details) && $old_student_details->religion == "Muslims") { ?>selected="selected" <?php } ?>>Muslim</option>
									<option value="Others" <?php if (!empty($old_student_details) && $old_student_details->religion == "Others") { ?>selected="selected" <?php } ?>>Others</option>
								</select>
								<label style="display:none;" id="religion-error" class="error" for="religion">Please select religion</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6" id="religin_specify_div" <?php if (empty($old_student_details)) { ?>style="display:none" <?php } else if ($old_student_details->religion == "Others") { ?> style="display:block" <?php } ?>>
							<div class="form-group">
								<label>Specify Religion <span class="req">*</span></label>
								<input type="text" name="religin_specify" id="religin_specify" class="form-control charector" placeholder="Please specify your religion" value="<?php if (!empty($old_student_details)) {
																																													echo $old_student_details->religin_specify;
																																												} ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="img">Photo <span class="req">*</span>  
							
								<?php if(!empty($old_student_details) && $old_student_details->photo != ""){?>
									<span style="float: right;">
										<a href="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$old_student_details->photo)?>" target="_blank" class="btn btn-info btn-small">View</a>
									</span>
								<?php }?>
							
							</label>
								<input type="file" name="userfile" id="userfile" class="form-control upload_photo" accept=".jpg,.jpeg,.png">
								<input type="hidden" name="hidden_userfile" id="hidden_userfile" value="<?php if (!empty($old_student_details)) {
																											echo $old_student_details->photo;
																										} ?>">
								<!-- <input type="hidden" name="hidden_image" id="hidden_image"> -->
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>NOC
									<?php if(!empty($old_student_details) && $old_student_details->noc != ""){?>
										<span style="float: right;">
											<a href="<?=$this->Digitalocean_model->get_photo('images/noc/'.$old_student_details->noc)?>" target="_blank" class="btn btn-info btn-small">View</a>
										</span>
									<?php }?>
								</label>
								<input type="file" name="noc" id="noc" class="form-control" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
								<input type="hidden" name="hidden_noc" id="hidden_noc" value="<?php if (!empty($old_student_details)) {
																									echo $old_student_details->noc;
																								} ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Employment Details <span class="req">*</span></label>
								<select class="form-control js-example-basic-single select2_single mode_of_change" name="employement_type" id="employement_type">
									<option value="">Select Employment Type</option>
									<option value="Government Employee" <?php if (!empty($old_student_details) && $old_student_details->employement_type == 'Government Employee') { ?> selected="selected" <?php } ?>>Government Employee</option>
									<option value="Private Sector Employee" <?php if (!empty($old_student_details) && $old_student_details->employement_type == 'Private Sector Employee') { ?> selected="selected" <?php } ?>>Private Sector Employee</option>
									<option value="Not Working" <?php if (!empty($old_student_details) && $old_student_details->employement_type == 'Not Working') { ?> selected="selected" <?php } ?>>Not Working</option>
								</select>
								<label style="display:none;" id="employement_type-error" class="error" for="employement_type">Please select employment type</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Country <span class="req">*</span></label>
								<select class="form-control js-example-basic-single select2_single" name="country" id="country">
									<option value="">Select Country</option>
									<?php if (!empty($country)) {
										foreach ($country as $country_result) {
									?>
											<option value="<?= $country_result->id ?>" <?php if (!empty($old_student_details) && $old_student_details->country == $country_result->id) { ?> selected="selected" <?php } ?>><?= $country_result->name ?></option>
									<?php }
									} ?>
								</select>
								<label style="display:none;" id="country-error" class="error" for="country">Please select country</label>
							</div>
						</div>
						<?php
						$old_state = array();
						$old_city = array();
						if (!empty($old_student_details)) {
							$old_state = $this->Web_model->get_old_state($old_student_details);
							$old_city = $this->Web_model->get_old_city($old_student_details);
						}
						?>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>State <span class="req">*</span></label>
								<select class="form-control js-example-basic-single select2_single" required name="state" id="state">
									<option value="">Select state</option>
									<?php if (!empty($old_state)) { ?>
										<option value="<?= $old_state->id ?>" selected="selected"><?= $old_state->name ?></option>
									<?php } ?>
								</select>
								<label style="display:none;" id="state-error" class="error" for="state">Please select state</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>City <span class="req">*</span></label>
								<select class="form-control js-example-basic-single select2_single" required name="city" id="city">
									<option value="">Select City</option>
									<?php if (!empty($old_city)) { ?>
										<option value="<?= $old_city->id ?>" selected="selected"><?= $old_city->name ?></option>
									<?php } ?>
								</select>
								<label style="display:none;" id="city-error" class="error" for="city">Please select city</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>PIN Code <span class="req">*</span></label>
								<input class="form-control number_only" required name="pincode" autocomplete="off" id="pincode" placeholder="PIN Code" value="<?php if (!empty($old_student_details)) {
																																									echo $old_student_details->pincode;
																																								} ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>ABC/APAAR ID</label>
								<input type="text" class="form-control" name="abc_apaar_id" autocomplete="off" id="abc_apaar_id" placeholder="ABC/APAAR ID" value="<?php if (!empty($old_student_details)) {
																																										echo $old_student_details->abc_apaar_id;
																																									} ?>">
							</div>
						</div>
						<div class="col-sm-6 uid_input" style="display:none;">
							<div class="form-group">
								<label class="uid_label">Aadhaar Number <span class="req">*</span></label>
								<input type="text" class="form-control identity_numer" name="identity_numer" id="identity_numer" placeholder="Enter Aadhaar Number">
								<input type="hidden" class="form-control id_type" name="id_type" id="id_type">
							</div>
						</div>
						<div class="col-sm-6 uid_soft_input" style="display:none;">
							<div class="form-group">
								<label class="uid_soft_label">Upload Aadhaar Softcopy <span class="req">*</span></label>
								<input type="file" class="form-control identity_file" name="identity_file" id="identity_file" placeholder="Upload Aadhaar Softcopy" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
							</div>
						</div>
					<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="img">Under taking
									<?php if(!empty($old_student_details) && $old_student_details->undertaking != ""){?>
										<span style="float: right;">
											<a href="<?=$this->Digitalocean_model->get_photo('images/permission_letter/'.$old_student_details->undertaking)?>" target="_blank" class="btn btn-info btn-small">View</a>
										</span>
									<?php }?>
								</label>
								<input type="file" name="undertaking_file" id="undertaking_file" class="form-control upload_photo" accept=".pdf,.doc,.docx,.jpeg,.png,.jpg">
								<input type="hidden" name="hidden_undertaking_file" id="hidden_undertaking_file" value="<?php if (!empty($old_student_details)) { echo $old_student_details->undertaking; } ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="img">Affidavit
									<?php if(!empty($old_student_details) && $old_student_details->affidavit_file != ""){?>
										<span style="float: right;">
											<a href="<?=$this->Digitalocean_model->get_photo('images/affidavit/'.$old_student_details->affidavit_file)?>" target="_blank" class="btn btn-info btn-small">View</a>
										</span>
									<?php }?>
								</label>
								<input type="file" name="affidavit_file" id="affidavit_file" class="form-control upload_photo" accept=".pdf,.doc,.docx,.jpeg,.png,.jpg">
								<input type="hidden" name="hidden_affidavit_file" id="hidden_affidavit_file" value="<?php if (!empty($old_student_details)) { echo $old_student_details->affidavit_file; } ?>">
							</div>
						</div>						<div class="col-lg-6 col-md-6">							<div class="form-group">								<label for="img">Anti-Ragging Reference ID of Student</label>								<input type="text" name="anti_ragging_student_ref_id" id="anti_ragging_student_ref_id" class="form-control">							</div>						</div>						<div class="col-lg-6 col-md-6">							<div class="form-group">								<label for="img">Anti-Ragging Reference ID of Parents</label>								<input type="text" name="anti_ragging_parents_ref_id" id="anti_ragging_parents_ref_id" class="form-control">							</div>						</div>						<div class="col-lg-6 col-md-6">							<div class="form-group">								<label for="img">Old Migration									<?php if(!empty($old_student_details) && $old_student_details->old_migration != ""){?>										<span style="float: right;">											<a href="<?=$this->Digitalocean_model->get_photo('images/old_migration/'.$old_student_details->old_migration)?>" target="_blank" class="btn btn-info btn-small">View</a>										</span>									<?php }?>								</label>								<input type="file" name="old_migration" id="old_migration" class="form-control upload_photo" accept=".pdf,.jpeg,.png,.jpg">								<input type="hidden" name="hidden_old_migration" id="hidden_old_migration" value="<?php if (!empty($old_student_details)) { echo $old_student_details->old_migration; } ?>">							</div>						</div>
					</div>
					<!-- 
						<h3>Course/Programme Details</h3>
						
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Father/Husband Profession <span class="req">*</span></label>
									<input type="text" name="father_profession" id="father_profession" class="form-control charector" placeholder="Father/Husband Profession" value="<?php if (!empty($old_student_details)) {
																																															echo $old_student_details->father_profession;
																																														} ?>">
								</div>
							</div> 
						</div>
						<h3>Student Address information</h3>
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Nationality <span class="req">*</span></label>
									<input type="text" name="nationality" id="nationality" class="form-control charector" maxlength="100" placeholder="Nationality" value="<?php if (!empty($old_student_details)) {
																																												echo $old_student_details->nationality;
																																											} ?>">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Religion <span class="req">*</span></label>
									<select name="religion" id="religion" class="form-control charector js-example-basic-single" maxlength="100" placeholder="Religion">
										<option value="">Select Religion</option>
										<option value="Hindu" <?php if (!empty($old_student_details) && $old_student_details->religion == "Hindu") { ?>selected="selected"<?php } ?>>Hindu</option>
										<option value="Sikh" <?php if (!empty($old_student_details) && $old_student_details->religion == "Sikh") { ?>selected="selected"<?php } ?>>Sikh</option>
										<option value="Christian" <?php if (!empty($old_student_details) && $old_student_details->religion == "Christian") { ?>selected="selected"<?php } ?>>Christian</option>
										<option value="Muslims" <?php if (!empty($old_student_details) && $old_student_details->religion == "Muslims") { ?>selected="selected"<?php } ?>>Muslim</option>
										<option value="Others" <?php if (!empty($old_student_details) && $old_student_details->religion == "Others") { ?>selected="selected"<?php } ?>>Others</option>
									</select>	
								</div>
							</div>
							<div class="col-lg-6 col-md-6" id="religin_specify_div" <?php if (empty($old_student_details)) { ?>style="display:none" <?php } else if ($old_student_details->religion == "Others") { ?> style="display:block" <?php } ?>>
								<div class="form-group">
									<label>Specify Religion <span class="req">*</span></label>
									<input type="text" name="religin_specify" id="religin_specify" class="form-control charector" placeholder="Please specify your religion" value="<?php if (!empty($old_student_details)) {
																																														echo $old_student_details->religin_specify;
																																													} ?>"> 
								</div>
							</div>
							
							
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<div class="form-group">
										<label>Address</label>
										<input type="text" class="form-control rules" name="address" id="address" placeholder="Address" value="<?php if (!empty($old_student_details)) {
																																					echo $old_student_details->address;
																																				} ?>">
									</div>
								</div>
							</div>
							
							
							<div class="col-lg-6 col-md-6 uid_input" style="display:none;">
								<div class="form-group">
									<label class="uid_label">Aadhaar Number <span class="req">*</span></label>
									<input type="text" class="form-control identity_numer" name="identity_numer" id="identity_numer" placeholder="Enter Aadhaar Number">
									<input type="hidden" class="form-control id_type" name="id_type" id="id_type">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 uid_soft_input" style="display:none;">
								<div class="form-group">
									<label class="uid_soft_label">Upload Aadhaar Softcopy <span class="req">*</span></label>
									<input type="file" class="form-control identity_file" name="identity_file" id="identity_file" placeholder="Upload Aadhaar Softcopy"  accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
								</div>
							</div>
						</div> -->
					<div class="form_title_box">
						<h3>Course/Programme Details</h3>
						<p><small>Please enter course/programme details</small></p>
					</div>
					<?php $course_id = "";
					if (!empty($this->uri->segment(2))) {
						$course_id = base64_decode($this->uri->segment(2));
					}
					//print_r($course_id);exit;
					?>
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Course Name<span class="req">*</span></label>
								<select id="course" name="course" class="form-control select2_single">
									<option value="">Select Course Name</option>
									<?php
									$not_course = array(24, 120, 267, 26, 227, 25, 42, 155, 33, 158, 260);
									if (!empty($course)) {
										foreach ($course as $course_result) {
											if (!in_array($course_result->id, $not_course)) {
									?>
												<option value="<?= $course_result->id; ?>" <?php if ($course_id != "" && $course_result->id == $course_id) { ?>selected<?php } ?>><?= $course_result->course_name; ?></option>
									<?php }
										}
									} ?>
								</select>
								<label style="display:none;" id="course-error" class="error" for="course">Please select course name</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Session<span class="req">*</span></label>
								<select id="session" name="session" class="form-control js-example-basic-single select2_single">
									<option value="">Select Session</option>
									<?php if (!empty($session)) {
										foreach ($session as $session_result) {
									?>
											<option value="<?= $session_result->id; ?>"  <?php if (!empty($old_student_details) && $old_student_details->session_id == $session_result->id) { ?> selected="selected" <?php } ?>><?= $session_result->session_name; ?></option>
									<?php }
									} ?>
								</select>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Stream Name <span class="req">*</span></label>
								<select name="stream" id="stream" class="form-control js-example-basic-single select2_single">
									<option value="">Select Stream Name</option>
									<?php if (!empty($stream)) {
										foreach ($stream as $stream_result) { ?>
											<option value="<?= $stream_result->id; ?>" <?php if (!empty($old_student_details) && $old_student_details->stream_id == $stream_result->id) { ?> selected="selected" <?php } ?>><?= $stream_result->stream_name; ?></option>
									<?php }
									} ?>
								</select>
								<label style="display:none;" id="stream-error" class="error" for="stream">Please select stream name</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Course Mode <span class="req">*</span></label>
								<select id="course_mode" name="course_mode" class="form-control js-example-basic-single select2_single" value="<?php if (!empty($old_student_details)) {
																																					echo $old_student_details->course_mode;
																																				} ?>">
									<option value="">Select Course Mode</option>
								</select>
								<label style="display:none;" id="course_mode-error" class="error" for="course_mode">Please select course mode</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Admission Type<span class="req">*</span></label>
								<select class="form-control js-example-basic-single select2_single mode_of_change" name="admission_type" id="admission_type">
									<option value="">Select Admission Type</option>
									<option value="0" selected>New Admission</option>
									<option value="1">Lateral Entry</option>
									<option value="2">Credit Transfer</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Duration </label>
								<input type="text" name="duration" readonly id="duration" class="form-control" placeholder="Enter Duration">																								
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Year/Sem <span class="req">*</span></label>
								<select id="year_sem" name="year_sem" class="form-control js-example-basic-single select2_single">
									<option value="1">1</option>
								</select>
								<label style="display:none;" id="year_sem-error" class="error" for="year_sem">Please select year/sem</label>
							</div>
						</div>
						 
						<div class="col-lg-6 col-md-6">
							<div class="form-group">

								<?php
									$study_mode = (!empty($old_student_details)) ? $old_student_details->study_mode : '';
								?>
								<label>Study Mode</label>
								<select id="study_mode" name="study_mode" class="form-control js-example-basic-single select2_single">
									<option value="">Select Study Mode</option>
									<option value="1" <?php if($study_mode == '1') {?>selected="selected"<?php } ?>>Regular</option>
									<option value="2" <?php if($study_mode == '2') {?>selected="selected"<?php } ?>>Online</option>
									<!-- <option value="3">Part-Time</option>
										<option value="4">Self Study/ Non-collegiate</option> 
										  -->
								</select>
								<label style="display:none;" id="study_mode-error" class="error" for="study_mode">Please select study mode</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							 	<?php
									$payment_mode = (!empty($old_student_details)) ? $old_student_details->payment_mode : '';
								?>
								<label>Payment Mode</label>
								<select id="payment_mode" name="payment_mode" class="form-control js-example-basic-single select2_single">
									<option value="">Select Payment Mode</option>
									<option value="1" <?php if($payment_mode == '1') {?>selected="selected"<?php } ?>>Online</option>
									<?php /*	<option value="3">Cash</option>
										<option value="2">By Challan</option>
										*/ ?>
								</select>
								<label style="display:none;" id="payment_mode-error" class="error" for="payment_mode">Please select payment mode</label>
							</div>
						</div>
						<!-- <div class="col-lg-6 col-md-6 lateral_entry" style="display:none;">
							<div class="form-group">
								<label>Entry Type</label>
								<input type="text" readonly name="entry_type" id="entry_type" class="form-control" value="Lateral Entry">
							</div>
						</div> -->
						<div class="col-lg-6 col-md-6" id="payment_option" style="display:none">
							<div class="form-group">
								<label>Fees Option</label>
								<select id="fees_option" name="fees_option" class="form-control">
									<option value="">Select Fees Option</option>
									<option value="1">Full</option>
									<option value="2">Half</option>
									<!--<option value="2">By Challan</option>
										-->
								</select>
							</div>
						</div>
						<div class="col-lg-6 col-md-6" id="bank_div" style="display:none">
							<div class="form-group">
								<label>Bank</label>
								<select id="bank" name="bank" class="form-control select2_single">
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
					<h3>Payment Details</h3>
					<p><small>Pay fees in university account only other accounts fees will not be accept</small></p>
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Late Fees <span class="req">*</span></label>
								<input placeholder="Late Fees" type="text" id="late_fees" name="late_fees" class="form-control" value="" readonly>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 lateral_entry" style="display:none;">
							<div class="form-group">
								<label>Lateral Entry Fees</label>
								<!-- <input  type="text" readonly name="lateral_entry_fees" id="lateral_entry_fees" class="form-control" value="<?php if (!empty($lateral_fees)) {
																																					echo $lateral_fees->fees_amount;
																																				} ?>">  -->
								<input type="text" readonly name="lateral_entry_fees" id="lateral_entry_fees" class="form-control" value="0">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Registration Fees</label>
								<input type="text" readonly name="registration_fees" id="registration_fees" class="form-control" value="0">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Admission Fees <span class="req">*</span></label>
								<input placeholder="Admission Fees" type="text" id="admission_fees" name="admission_fees" class="form-control" value="" readonly>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Total Admission Fees <span class="req">*</span></label>
								<input placeholder="Total Admission Fees" type="text" id="total_admission_fees" name="total_admission_fees" class="form-control" value="" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<table class="detailTable" cellspacing="5" cellpadding="5">
									<tr>
										<td>
											<br>
											<b>Declaration:</b>
											<br><br>
											<p align="justify"><b>I confirm that I have not made payment of any other amount to anybody other than deposited in the prescribed University account.</b></p>
											<p align="justify"><b>I solemnly declare and confirm that I am duly qualified to take admission in the course for which I have applied and all the certificates and testimonials attached with my application are true and valid. I have fully satisfied myself about the legal status of the University i.e. it is an autonomous statutory body with regulations making power for it's functioning and the University is duly authorized and competent to take my admission in the course for which I have applied and also to award the degree / diploma as per rules and regulation of the University. I also undertake not to ever raise any objection about Universities legal status to take my admission and award degrees on qualifying prescribed examinations. I also undertake not to demand refund of fee/charges paid by me. In case of any dispute/differences/claim of any value settlement by University arbitration clause shall be applicable.</b></p>
											<p align="justify"><b>I shall always follow the rules and regulations of the University and in case of any breach thereto, I shall be liable to be penalized for the same which may include expulsion from the University.</b></p>
											<br>
											<p align="justify">As per law and legal opinion, university is empowered by the authority of law to award degrees, diplomas, and certificates in all courses of education, there being no requirement to take approval from any other authorities. All certificate degrees, diplomas, certificates awarded by University are Sui - generis valid in law, and degree/diploma/certificates holders are automatically entitled to be recognised for government jobs and for registration with all Professional Councils. For legal opinion and relevant laws and court judgments visit the university website.</p>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<input type="checkbox" name="mycheckbox" id="mycheckbox" value="0" required="required" /> <label>I agree to the declaration<span class="req">*</span></label><br>
								<label style="display:none;" id="mycheckbox-error" class="error" for="mycheckbox">This field is required.</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<strong>Captcha <span class="req">*</span></strong>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="<?= GOOGLE_DATA_SITEKEY ?>"></div>
							</div>
							<div id="captchaError" class="error"></div>
						</div>
						<!-- <div class="col-lg-12 col-md-12">
								<div class="form-group checkboxs">
									<input type="checkbox" id="chb2">
									<p>
										By submitting this form, you agree to the <a href="javascript:void(0);">Terms &amp; Conditions</a> And <a href="javascript:void(0);">Privacy Policy</a> notice. 
									</p>
									<p class="terms_para" align="justify">I confirm that I have not made payment of any other amount to anybody other than deposited in the prescribed University account.</p>
									<p class="terms_para" align="justify">I solemnly declare and confirm that I am duly qualified to take admission in the course for which I have applied and all the certificates and testimonials attached with my application are true and valid. I have fully satisfied myself about the legal status of the University i.e. it is an autonomous statutory body with regulations making power for it's functioning and the University is duly authorized and competent to take my admission in the course for which I have applied and also to award the degree / diploma as per rules and regulation of the University. I also undertake not to ever raise any objection about Universities legal status to take my admission and award degrees on qualifying prescribed examinations. I also undertake not to demand refund of fee/charges paid by me. In case of any dispute/differences/claim of any value settlement by University arbitration clause shall be applicable.</p>
									<p class="terms_para" align="justify">I shall always follow the rules and regulations of the University and in case of any breach thereto, I shall be liable to be penalized for the same which may include expulsion from the University.</p>
									<br>
									<p class="terms_para" align="justify">As per law and legal opinion University is empowered by authority of law to award degree's, diplomas, & certificate in all course of Education, there being no requirement to take approval from any other authorities all certificate degrees diplomas certificate awarded by University are Sui - generis valid in law and degree/diploma/certificate holders are automatically entitled to be recognised for government jobs and for Registration with all Professional Council. For Legal opinion and relevent laws and Court Judgments Visit University website.</p>
				
								</div>
							</div> -->
						<div class="col-lg-12">
							<button type="submit" class="default-btn" id="submit" name="submit">
								Register
								<i class="ri-arrow-right-line"></i>
							</button>
						</div>
					</div>
					<input type="hidden" id="pre_city" value="">
					<input type="hidden" id="pre_stream" value="">
				</form>
			<?php } ?>
			</div>
		</div>
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
</section>
<input type="hidden" name="email_val" id="email_val" value="0"> 
<input type="hidden" name="mobile_val" id="mobile_val" value="0">
<!-- End Candidates Resume Area -->
<?php include('footer.php');
$id = '0';
if ($this->uri->segment(2) != " ") {
	$id = $this->uri->segment(2);
}
?>
<!--------------------------------------   CROPING TOOL   ----------------------------------------------->
<script>
	$("#chb2").change(function() {
		if ($(this).prop('checked') == true) {
			$(".terms_para").show();
		} else {
			$(".terms_para").hide();
		}
	});
	// $(".mode_of_change").change(function(){
	//     if($("#course").val() == "23"){
	//         if($("#employement_type").val() !="Not Working"){
	//             $("#study_mode").html('<option value="">Select Study Mode</option><option value="3">Part-Time</option>');
	//         }else{ 
	//             $("#study_mode").html('<option value="1">Regular</option><option value="2">Online</option><option value="3">Part-Time</option><option value="4">Self Study/ Non-collegiate</option> '); 
	//         }
	//     }else{
	//         if($("#employement_type").val() !="Not Working"){
	//             $("#study_mode").html('<option value="1">Regular</option><option value="2">Online</option><option value="3">Part-Time</option><option value="4">Self Study/ Non-collegiate</option>');
	//         }else{ 
	//             $("#study_mode").html('<option value=""><option value="1">Regular</option><option value="2">Online</option><option value="3">Part-Time</option><option value="4">Self Study/ Non-collegiate</option>'); 
	//         }
	//     }
	// });
	$(".mode_of_change").change(function() {
		if ($("#course").val() == "23") {
			if ($("#employement_type").val() != "Not Working") {
				$("#study_mode").html('<option value="">Select Study Mode</option><option value="3">Part-Time</option>');
			} else if ($("#employement_type").val() == "Government Employee") {
				$("#study_mode").html('<option value="3">Part-Time</option><option value="4">Self Study/ Non-collegiate</option> ');
			} else {
				$("#study_mode").html('<option value="1">Regular</option><option value="2">Online</option><option value="3">Part-Time</option><option value="4">Self Study/ Non-collegiate</option> ');
			}
		} else {
			if ($("#employement_type").val() == "Not Working") {
				$("#study_mode").html('<option value="">Select Study Mode</option><option value="1">Regular</option><option value="2">Online</option><option value="3">Part-Time</option><option value="4">Self Study/ Non-collegiate</option>');
			} else if ($("#employement_type").val() == "Government Employee") {
				$("#study_mode").html('<option value="3">Part-Time</option><option value="4">Self Study/ Non-collegiate</option> ');
			} else {
				$("#study_mode").html('<option value=""><option value="1">Regular</option><option value="2">Online</option><option value="3">Part-Time</option><option value="4">Self Study/ Non-collegiate</option>');
			}
		}
	});
	$("#fees_option").change(function() {
		var admission_fees = $("#admission_fees").val();
		if ($("#fees_option").val() == 2) admission_fees = admission_fees / 2;
		var total = parseInt($("#late_fees").val()) + parseInt(admission_fees);
		$("#total_admission_fees").val(total);
	});
	$("#country").change(function() {
		//alert($('#country').val());
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
		} else if ($('#country').val() == '25') {
			$('.uid_input').show();
			$('.uid_soft_input').show();
			$('.uid_label').html('Passport Number <span class="req"></span>');
			$('.uid_soft_label').html('Upload Passport Softcopy <span class="req"></span>');
			$('.identity_numer').attr("placeholder", "Enter Passport Number");
			$('.identity_numer').prop('required', false);
			$('.identity_file').attr("placeholder", "Upload Passport Softcopy");
			$('.identity_file').prop('required', false);
			$('.id_type').val('2');
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
	$(document).ready(function() {
		$('#identity_numer').on('blur', function() {
			if ($('#country').val() == '101') {
				var aadharInput = $(this).val();
				var aadharRegex = /^\d{12}$/;
				if (!aadharRegex.test(aadharInput)) {
					alert("Please enter a valid Aadhaar number");
				}
			} else {
				var passportInput = $(this).val();
				var passportRegex = /^[A-Z0-9]{8,15}$/;
				if (!passportRegex.test(passportInput)) {
					alert("Please enter a valid Passport number");
				}
			}
		});
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
					//    $('#city').append('<option value="' + d.id + '">' + d.name + '</option>');
					var selectedCity = ($("#pre_city").val() == d.id) ? 'selected="selected"' : '';
					$('#city').append('<option value="' + d.id + '" ' + selectedCity + '>' + d.name + '</option>');
				});
				$('#city').trigger('change');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	});
	$("#course").change(function() {
		if($(this).val() == "23"){
			$("#payment_option").show(); 
		}else{
			$("#payment_option").hide(); 
		} 
		$("#course_mode").html("<option value=''>Select Course Mode</option>");
		$('#course_mode').trigger('change');
		$.ajax({
			type: "POST",
			url: "<?= base_url(); ?>web/Web_controller/get_course_stream",
			data: {
				'course': $("#course").val()
			},
			success: function(data) {
				$("#stream").empty();
				$('#stream').append('<option value="">Select Stream</option>');
				var opts = $.parseJSON(data);
				$.each(opts, function(i, d) {
					$('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
					// var selectedStream = ($('#pre_stream').val() == d.id) ? 'selected="selected"' : '';
					//$('#stream').append('<option value="' + d.id + '" ' + selectedStream + '>' + d.student_stream_name + '</option>');
				});
				$('#stream').trigger('change');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	});
	$("#stream").change(function() { 
		$("#course_mode").html("<option value=''>Select Course Mode</option>");
		$.ajax({
			type: "POST",
			url: "<?= base_url(); ?>web/Web_controller/get_course_stream_course_mode",
			data: {
				'course': $("#course").val(),
				'stream': $("#stream").val()
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
		$.ajax({
			type: "POST",
			url: "<?= base_url(); ?>web/Web_controller/get_course_stream_total_duration",
			data: {
				'course': $("#course").val(),
				'stream': $("#stream").val(),
				'course_mode': $("#course_mode").val(), 
			},
			success: function(data) {
				if($("#course_mode").val() == "1"){
					$("#duration").val(data+' Year'); 
				}else{
					$("#duration").val(data*2+' Semester');
				}
				final_calculation();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		}); 
	});

	$("#admission_type").change(function() {
		if($("#course_mode").val() ==""){
			alert('Please select course mode');
		}else if($("#admission_type").val() =="0"){
			$("#year_sem").html("<option value='1'>1</option>");
		}else if($("#admission_type").val() =="1"){
			if($("#course_mode").val() =="1"){
				$("#year_sem").html("<option value='2'>2</option>");
			}else{
				$("#year_sem").html("<option value='3'>3</option>");
			}
		}else if($("#admission_type").val() =="2"){
			var total_duration = $("#duration").val();
			total_duration = total_duration.split(" ");
			if($("#course_mode").val() =="1"){
				var html = "<option value=''>Select Semester/Year</option>";				
				for(var y=2;y<=total_duration[0];y++){
					html += "<option value='"+y+"'>"+y+"</option>";
				} 
				$("#year_sem").html(html);
			}else{
				var html = "<option value=''>Select Semester/Year</option>";				
				for(var y=2;y<=total_duration[0];y++){
					html += "<option value='"+y+"'>"+y+"</option>";
				} 
				$("#year_sem").html(html);
			} 
		}		
		$('#year_sem').trigger('change'); 
	});

	$("#session").change(function() {
		final_calculation();
	});
	$("#religion").change(function() {
		if ($("#religion").val() == "Others") {
			$("#religin_specify_div").show();
		} else {
			$("#religin_specify_div").hide();
		}
	});
	$("#year_sem").change(function() {
		if ($("#year_sem").val() == "1" || $("#year_sem").val() == "") {
			$(".lateral_entry").hide();
			$("#lateral_entry_fees").val('0');
			$("#total_admission_fees").val(parseInt($("#admission_fees").val()) + parseInt($("#late_fees").val()) + parseInt($("#registration_fees").val()));
		} else {
			$(".lateral_entry").show();
			$("#lateral_entry_fees").val('<?= $center_profile->lateral_entry_fees ?>');
			$("#total_admission_fees").val(parseInt($("#admission_fees").val()) + parseInt($("#late_fees").val()) + parseInt($("#lateral_entry_fees").val()) + parseInt($("#registration_fees").val()));
		}
		final_calculation();
	});
	function final_calculation() {
		if ($("#session").val() != "" && $("#course").val() != "" && $("#stream").val() != "") {
			$.ajax({
				type: "POST",
				url: "<?= base_url(); ?>web/Web_controller/get_course_stream_fees",
				data: {
					'session': $("#session").val(),
					'course': $("#course").val(),
					'stream': $("#stream").val(),
					'country': $("#country").val()
				},
				success: function(data) {
					data = data.split("@@@");
					$("#late_fees").val(data[1]);
					$("#admission_fees").val(data[0]);
					$("#registration_fees").val(data[2]);
					var total_fees = parseInt($("#admission_fees").val()) + parseInt($("#late_fees").val()) + parseInt($("#registration_fees").val()) + parseInt($("#lateral_entry_fees").val());
					$("#total_admission_fees").val(total_fees);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}
			});
		}
	}
	$(function() {
		$(".datepicker").datepicker({
			format: 'dd-mm-yyyy',
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
	jQuery.validator.addMethod("noHTMLtags", function(value, element) {
		if (this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)) {
			if (value == "") {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}
	}, "HTML tags are Not allowed.");
	$('#otp_form').validate({
		rules: {
			otp_name: {
				required: true,
				noHTMLtags: true,
			},
			otp_mobile_number: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10,
				noHTMLtags: true,
			},
			otp_email: {
				required: true,
				validate_email: true,
				noHTMLtags: true,
			},
		},
		messages: {
			otp_name: {
				required: "Please enter your name",
				noHTMLtags: "HTML tags not allowed!",
			},
			otp_mobile_number: {
				required: "Please enter mobile number",
				number: "Please enter valid number",
				minlength: "Please enter 10 gigit mobile number",
				maxlength: "Please enter 10 gigit mobile number",
				noHTMLtags: "HTML tags not allowed!",
			},
			otp_email: {
				required: "Please enter your email",
				validate_email: "Please enter your valid email",
				noHTMLtags: "HTML tags not allowed!",
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



	$.validator.addMethod("noSpaceatfirst", function (value, element) {
            return this.optional(element) || /^\s/.test(value) === false;
        }, "First Letter Can't Be Space!");

	$.validator.addMethod("alphabetsOnly", function(value, element) {
		return /^[a-zA-Z_ ]+$/.test(value);
	});


	$("#admission_form").validate({
		ignore: ":hidden:not(select)",
		rules: {
			student_name: {
				required: true,
				noHTMLtags: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,
			},
			father_name: {
				required: true,
				noHTMLtags: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,
			},
			father_profession: {
				required: true,
				noHTMLtags: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,
			},
			mother_profession: {
				required: true,
				noHTMLtags: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,
			},
			mother_name: {
				required: true,
				noHTMLtags: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,
			},
			<?php if ($old_student_details == "") { ?>
				userfile: {
					required: true
				},
			<?php } ?>
			noc: {
				required: function(element) {
					return $("#employement_type").val() === "Government Employee";
				},
			},
			date_of_birth: {
				required: true,
				noHTMLtags: true
			},
			mobile: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 12,
				noHTMLtags: true,
				noSpaceatfirst:true,
			},
			email: {
				required: true,
				validate_email: true,
				noHTMLtags: true,
				noSpaceatfirst:true,
			},
			gender: {
				required: true,
				noHTMLtags: true
			},
			nationality: {
				required: true,
				noHTMLtags: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,
			},
			religion: {
				required: true,
				noHTMLtags: true
			},
			religin_specify: {
				required: true,
				noHTMLtags: true
			},
			category: {
				required: true,
				noHTMLtags: true
			},
			// session: {
			// 	required:true,
			// 	noHTMLtags:true
			// },			
			course: {
				required: true,
				noHTMLtags: true
			},
			stream: {
				required: true,
				noHTMLtags: true
			},
			year_sem: {
				required: true,
				noHTMLtags: true
			},
			address: {
				required: true,
				noHTMLtags: true,
				noSpaceatfirst: true,
			},
			country: {
				required: true,
				noHTMLtags: true
			},
			state: {
				required: true,
				noHTMLtags: true
			},
			city: {
				required: true,
				noHTMLtags: true
			},
			pincode: {
				required: true,
				number: true,
				maxlength: 6,
				minlength: 6,
				noHTMLtags: true
			},
			payment_method: {
				required: true,
				noHTMLtags: true
			},
			accept: {
				required: true,
				noHTMLtags: true
			},
			// late_fees: {
			// 	required:true,
			// 	noHTMLtags:true
			// },		
			// admission_fees: {
			// 	required:true,
			// 	noHTMLtags:true
			// },		
			// total_admission_fees: {
			// 	required:true,
			// 	noHTMLtags:true
			// },					
			study_mode: {
				required: true,
				noHTMLtags: true
			},
			payment_mode: {
				required: true,
				noHTMLtags: true
			},
			employement_type: {
				required: true,
				noHTMLtags: true
			},
			// id_type:{
			// 	required:true,
			// 	noHTMLtags:true
			// },
			// id_number:{
			// 	required:true,
			// 	noHTMLtags:true
			// },	
			course_mode: {
				required: true,
				noHTMLtags: true
			},
			identity_numer: {
				required: true,
				// 			validateAadhaarNumber:true,
				noHTMLtags: true
			},
			identity_file: {
				required: true,
				noHTMLtags: true
			},
			abc_apaar_id:{
				noSpaceatfirst:true,
				number:true,
			},
		},
		messages: {
			student_name: {
				required: "Please enter full name",
				noHTMLtags: "HTML tags not allowed",
				noSpaceatfirst: "First letter can't be space",
				alphabetsOnly:"Student name must contain only alphabets",
			},
			father_name: {
				required: "Please enter father's full name",
				noHTMLtags: "HTML tags not allowed",
				noSpaceatfirst: "First letter can't be space",
				alphabetsOnly:"Father's name must contain only alphabets",
			},
			father_profession: {
				required: "Please enter father's/husband's profession",
				noHTMLtags: "HTML tags not allowed",
				noSpaceatfirst: "First letter can't be space",
				alphabetsOnly:"Father's profession must contain only alphabets",
			},
			mother_name: {
				required: "Please enter mother's full name",
				noHTMLtags: "HTML tags not allowed",
				noSpaceatfirst: "First letter can't be space",
				alphabetsOnly:"Mother's name must contain only alphabets",
			},
			mother_profession: {
				required: "Please enter mother's profession",
				noHTMLtags: "HTML tags not allowed",
				noSpaceatfirst: "First letter can't be space",
				alphabetsOnly:"Mother's profession must contain only alphabets",
			},
			userfile: {
				required: "Please select photo",
			},
			noc: {
				required: "The NOC field is required for government employees",
			},
			date_of_birth: {
				required: "Please select date of birth",
				noHTMLtags: "HTML tags not allowed",
			},
			mobile: {
				required: "Please enter mobile number",
				number: "Please enter only number",
				minlength: "Please enter 10 digit mobile number",
				maxlength: "Please enter 10 digit mobile number",
				noHTMLtags: "HTML tags not allowed",
				noSpaceatfirst: "First letter can't be space",
			},
			email: {
				required: "Please enter email address",
				validate_email: "Please enter valid email",
				noHTMLtags: "HTML tags not allowed",
				noSpaceatfirst: "First letter can't be space",
			},
			gender: {
				required: "Please select gender",
				noHTMLtags: "HTML tags not allowed",
			},
			nationality: {
				required: "Please enter nationality",
				noHTMLtags: "HTML tags not allowed",
				noSpaceatfirst: "First letter can't be space",
				alphabetsOnly:'Nationality must contain only alphabets',
			},
			religion: {
				required: "Please select religion",
				noHTMLtags: "HTML tags not allowed",
			},
			religin_specify: {
				required: "Please specify your religion",
				noHTMLtags: "HTML tags not allowed",
			},
			category: {
				required: "Please select category",
				noHTMLtags: "HTML tags not allowed",
			},
			mode: {
				required: "Please select payment mode",
				noHTMLtags: "HTML tags not allowed",
			},
			// deposit_date: {
			// 	required:"Please select deposit date",	
			// 	noHTMLtags:"HTML tags not allowed",
			// },		
			// session: {
			// 	required:"Please select session!",
			// 	noHTMLtags:"HTML tags not allowed",
			// },		
			course: {
				required: "Please select course name",
				noHTMLtags: "HTML tags not allowed",
			},
			stream: {
				required: "Please select stream name",
				noHTMLtags: "HTML tags not allowed",
			},
			year_sem: {
				required: "Please select duration",
				noHTMLtags: "HTML tags not allowed",
			},
			address: {
				required: "Please enter current address",
				noHTMLtags: "HTML tags not allowed",
				noSpaceatfirst: "First letter can't be space",
			},
			country: {
				required: "Please select country",
				noHTMLtags: "HTML tags not allowed",
			},
			state: {
				required: "Please select state",
				noHTMLtags: "HTML tags not allowed",
			},
			city: {
				required: "Please select city",
				noHTMLtags: "HTML tags not allowed",
			},
			pincode: {
				required: "Please enter PIN Code",
				number: "Please enter valid PIN Code",
				maxlength: "Please enter 6 digit PIN Code",
				minlength: "Please enter 6 digit PIN Code",
				noHTMLtags: "HTML tags not allowed",
			},
			payment_method: {
				required: "Please select payment method",
				noHTMLtags: "HTML tags not allowed",
			},
			accept: {
				required: "Please accept our terms & conditions",
				noHTMLtags: "HTML tags not allowed",
			},
			// late_fees: {
			// 	required:"Please enter late fees",
			// 	noHTMLtags:"HTML tags not allowed",
			// },		
			// admission_fees: {
			// 	required:"Please enter admission fees",
			// 	noHTMLtags:"HTML tags not allowed",
			// },		
			// total_admission_fees: {
			// 	required:"Please enter total admission fees",
			// 	noHTMLtags:"HTML tags not allowed",
			// },
			study_mode: {
				required: "Please select study mode",
				noHTMLtags: "HTML tags not allowed",
			},
			payment_mode: {
				required: "Please select payment mode",
				noHTMLtags: "HTML tags not allowed",
			},
			employement_type: {
				required: "Please select employment type",
				noHTMLtags: "HTML tags not allowed",
			},
			// id_type: {
			// 	required:"Please select ID type",
			// 	noHTMLtags:"HTML tags not allowed",
			// },
			// id_number: {
			// 	required:"Please enter ID number",
			// 	noHTMLtags:"HTML tags not allowed",
			// },
			course_mode: {
				required: "Please select course mode",
				noHTMLtags: "HTML tags not allowed",
			},
			abc_apaar_id:{
				noSpaceatfirst: "First letter can't be space",
				number:"Please enter valid ABC/APAAR ID",
			},
		},
		submitHandler: function(form) {
			form.submit();
		}
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
	$('#stream').on('change', function() {
		$('#stream').valid();
	});
	$('#id_type').on('change', function() {
		$('#id_type').valid();
	});
	$('#gender').on('change', function() {
		$('#gender').valid();
	});
	$('#category').on('change', function() {
		$('#category').valid();
	});
	$('#religion').on('change', function() {
		$('#religion').valid();
	});
	// $('#employement_type').on('change', function() {
	//     $('#employement_type').valid();
	// });
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
		$('#userfile').on('change', function(e) {
			var reader = new FileReader();
			reader.onload = function(event) {
				$image_crop.croppie('bind', {
					url: event.target.result
				}).then(function() {
					console.log('jQuery bind complete');
				});
			}
			reader.readAsDataURL(this.files[0]);
			$('#uploadimageModal').modal('show');
		});
		$('.crop_image').click(function(event) {
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {
				$.ajax({
					url: "<?= base_url(); ?>update_pic_photo.php",
					type: "POST",
					data: {
						"image": response
					},
					success: function(data) {
						$("#hidden_image").val(data);
					}
				});
			})
		});
	});
	$("#payment_mode").change(function() {
		if ($(this).val() == "2") {
			$("#bank_div").show();
		} else {
			$("#bank_div").hide();
		}
	});
	/*
	 $('#session').change(function() {
	 	$("#course").empty();
	 	if($("#session").val() =="2"){ 
	 		$('#course').append('<option value="">Select Course</option>');
	 		 $('#course').append('<option value="23">Ph.D</option>');
	        }else{
	        	$.ajax({
					type: "POST",
					url: "<?= base_url(); ?>web/Web_controller/get_ajax_course_list",
					data:{},
					success: function(data){
						$("#course").empty();
						$('#course').append('<option value="">Select Course</option>');
						var opts = $.parseJSON(data);
						$.each(opts, function(i, d) {
						   $('#course').append('<option value="' + d.id + '">' + d.course_name + '</option>');
						});
						$('#course').trigger('change');
					},
					 error: function(jqXHR, textStatus, errorThrown) {
					   console.log(textStatus, errorThrown);
					}
				});	
	        }
	    }); */
	$("#noc").change(function() {
		var ext = this.value.match(/\.(.+)$/)[1];
		switch (ext) {
			case 'jpg':
			case 'pdf':
				break;
			default:
				alert('Only jpg,pdf file supported');
				this.value = '';
		}
	});
	$("#identity_file").change(function() {
		var ext = this.value.match(/\.(.+)$/)[1];
		switch (ext) {
			case 'JPEG':
			case 'jpeg':
			case 'jpg':
			case 'pdf':
				break;
			default:
				alert('Only jpg, pdf file supported');
				this.value = '';
		}
	});
	$("#employement_type").change(function() {
		// 	 if($(this).val() == "Government Employee"){
		// 		 $("#noc").prop('required',true);
		// 	 }else{
		// 		 $("#noc").prop('required',false);
		// 	 }
		$("#admission_form").validate().element("#noc");
		$('#employement_type').valid();
	});
	$("#religion").change(function() {
		if ($("#religion").val() == "Others") {
			$("#religin_specify_div").show();
		} else {
			$("#religin_specify_div").hide();
		}
	});
 
// $("#mobile").keyup(function(){    
// 	$.ajax({  
// 		type: "POST",  
// 		url: "<?=base_url();?>web/Web_controller/get_unique_admission_contact",  
// 		data:{'mobile':$("#mobile").val()},  
// 		success: function(data){  
// 			$("#mobile_val").val(data);  
// 			check_available();  
// 		},  
// 		 error: function(jqXHR, textStatus, errorThrown) {  
// 		   console.log(textStatus, errorThrown);  
// 		}  
// 	});	  
// });  
// $("#email").keyup(function(){    
// 	$.ajax({  
// 		type: "POST",  
// 		url: "<?=base_url();?>web/Web_controller/get_unique_admission_email",  
// 		data:{'email':$("#email").val()},  
// 		success: function(data){  
// 			$("#email_val").val(data);  
// 			check_available();  
// 		},  
// 		 error: function(jqXHR, textStatus, errorThrown) {  
// 		   console.log(textStatus, errorThrown);  
// 		}  
// 	});	  
// });

$('#email').on('keyup', function() {
	var email = $("#email").val();
	var id = "<?= $id ?>";
	if (email.trim() != ""){
		$.ajax({
			url: "<?= base_url() ?>admin/Ajax_controller/check_unique_email_number_ajx",
			method: 'POST',
			data: {
				email: email,
				id: id
			},
			success: function(response) {
				if (response == '1') {
					$('#email_error').text("This email is already added !");
					$('#submit').prop('disabled', true);
				} else {
					$('#email_error').text("");
					$('#submit').prop('disabled', false);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.error('AJAX Error: ' + textStatus, errorThrown);
			}
		});
	}else if(email.trim() == ""){
		$('#email_error').text("");
		$('#submit').prop('disabled', false);
	}
});

// function check_available(){  
// 	if($("#email_val").val() >= 1 || $("#mobile_val").val() >= 1){  
// 		$("#register").hide();  
// 		if($("#email_val").val() >= "1"){  
// 			$("#email_error").html("This email is already registered");  
// 		}  
// 		if($("#mobile_val").val() >= "1"){  
// 			$("#mobile_error").html("This mobile is already registered");  
// 		}  
// 	}else{  
// 		$("#register").show();  
// 		$("#email_error").html("");  
// 		$("#mobile_error").html("");  
// 	}  
// }

$('#email').keyup(function(){
    this.value = this.value.toLowerCase();
});

</script>
<script>
	function validateForm() {
		var recaptchaResponse = grecaptcha.getResponse();
		if (recaptchaResponse.length === 0) {
			alert("Please complete the captcha!");
			return false;
		}
		return true;
	}
</script>
<script>
	$("#email").keyup(function() {
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>web/Web_controller/get_phd_student_data_ajax",
			data: {
				'email': $("#email").val()
			},
			success: function(data) {
				var opts = $.parseJSON(data);
				if (opts) {
					console.log(opts);
					$("#student_name").val(opts.student_name);
					$("#father_name").val(opts.father_name);
					$("#mother_name").val(opts.mother_name);
					$("#date_of_birth").val(opts.date_of_birth);
					$("#mobile").val(opts.mobile_number);
					$("#gender").val(opts.gender).trigger('change');
					$("#category").val(opts.category).trigger('change');
					$("#address").val(opts.current_address);
					$("#nationality").val(opts.nationality);
					$("#pre_city").val(opts.city);
					// $("#pre_city").val(opts.city);
					$("#country").html('<option value="' + opts.country + '" selected="selected">' + opts.country_name + '</option>').trigger('change');
					$.ajax({
						type: "POST",
						url: "<?= base_url(); ?>admin/Ajax_controller/get_state_ajax",
						data: {
							'country': opts.country
						},
						success: function(data) {
							$("#state").empty();
							$('#state').append('<option value="">Select State</option>');
							var test = $.parseJSON(data);
							$.each(test, function(i, d) {
								var selectedState = (opts.state == d.id) ? 'selected="selected"' : '';
								$('#state').append('<option value="' + d.id + '" ' + selectedState + '>' + d.name + '</option>');
							});
							$('#state').trigger('change');
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(textStatus, errorThrown);
						}
					});
					// $("#state").html('<option value="' + opts.state + '" selected="selected">' + opts.state_name + '</option>').trigger('change');
					$.ajax({
						type: "POST",
						url: "<?= base_url(); ?>admin/Ajax_controller/get_city_ajax",
						data: {
							'state': opts.state
						},
						success: function(data) {
							$("#city").empty();
							$('#city').append('<option value="">Select City</option>');
							var test1 = $.parseJSON(data);
							$.each(test1, function(i, d) {
								var selectedCity = (opts.city == d.id) ? 'selected="selected"' : '';
								$('#city').append('<option value="' + d.id + '" ' + selectedCity + '>' + d.name + '</option>');
							});
							$('#city').trigger('change');
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(textStatus, errorThrown);
						}
					});
					// $("#city").html('<option value="' + opts.city + '" selected="selected">' + opts.city_name + '</option>').trigger('change');
					$("#pincode").val(opts.pin_code);
					$("#employement_type").val(opts.employment_details).trigger('change');
					$("#course").html('<option value="' + opts.course + '" selected="selected">' + opts.student_course_name + '</option>').trigger('change');
					// $("#stream").html('<option value="' + opts.stream + '" selected="selected">' + opts.student_stream_name + '</option>').trigger('change');
					$.ajax({
						type: "POST",
						url: "<?= base_url(); ?>web/Web_controller/get_course_stream",
						data: {
							'course': $("#course").val()
						},
						success: function(data) {
							$("#stream").empty();
							$('#stream').append('<option value="">Select Stream</option>');
							var streadata = $.parseJSON(data);
							$.each(streadata, function(i, d) {
								console.log(opts.stream + '-' + d.id);
								var selectedStream = (opts.stream == d.id) ? 'selected="selected"' : '';
								$('#stream').append('<option value="' + d.id + '"' + selectedStream + '>' + d.stream_name + '</option>');
								// var selectedStream = ($('#pre_stream').val() == d.id) ? 'selected="selected"' : '';
								//$('#stream').append('<option value="' + d.id + '" ' + selectedStream + '>' + d.student_stream_name + '</option>');
							});
							$('#stream').trigger('change');
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(textStatus, errorThrown);
						}
					});
				} else {
					$("#student_name").val();
					$("#father_name").val();
					$("#mother_name").val();
					$("#date_of_birth").val();
					$("#mobile").val();
					$("#gender").val();
					$("#category").val();
					$("#address").val();
					$("#nationality").val();
					$("#country").val('').trigger('change');
					$("#state").val('').trigger('change');
					$("#city").val('').trigger('change');
					$("#pincode").val();
					$("#course").val('').trigger('change');
					$("#stream").val('').trigger('change');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	});
	
	
	$('#mobile').on('keyup', function() {
		var mobile = $("#mobile").val();
		var id = "<?= $id ?>";
		if (mobile.trim() != ""){
			$.ajax({
				url: "<?= base_url() ?>admin/Ajax_controller/check_unique_mobile_number_ajx",
				method: 'POST',
				data: {
					mobile: mobile,
					id: id
				},
				success: function(response) {
					if (response == '1') {
						$('#mobile_error').text("This mobile number is already added !");
						$('#submit').prop('disabled', true);
					} else {
						$('#mobile_error').text("");
						$('#submit').prop('disabled', false);
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.error('AJAX Error: ' + textStatus, errorThrown);
				}
			});
		}else if(mobile.trim() == ""){
			$('#mobile_error').text("");
			$('#submit').prop('disabled', false);
		}
	});
$(document).ready(function () {
    $(".remove_mr").on("keyup", function () {
        let forbiddenTitles = ["mr", "mr.", "mrs", "mrs.", "ms", "ms."];  
        let inputValue = $(this).val().trim().toLowerCase(); 
        for (let title of forbiddenTitles) {
            if (inputValue.startsWith(title + " ") || inputValue === title) {
                alert("Titles like 'Mr.', 'Mrs.', and 'Ms.' are not allowed.");
                $(this).val(""); 
                break; 
            }
        }
    });
});
document.querySelectorAll(".no-dot").forEach(input => {
    input.addEventListener("keypress", function(event) {
        if (event.key === ".") {
            event.preventDefault(); // Prevent the input
        }
    });
});
</script>