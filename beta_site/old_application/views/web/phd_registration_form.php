<?php include("header.php"); ?>

<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/croppie.css">



<!-- <div class="header_cc_area" style="background-image:url('<?= base_url(); ?>images/header_area.jpg')">

	<div class="container">

		<div class="row">

			<h1>Ph.D Entrance Form</h1>

			<p>Admission / Ph.D Entrance Form</p>

		</div>

	</div>

</div> -->



<section>



	<div class="header_cc_area slide-bg">

		<div class="container  overlay-about" style="width: 100%;">

			<p>Research / Ph.D Performa  / Ph.D Entrance Form</p>



			<div class=" container-fluid text-center inner-heading-content">

				<h2 class="main-heading-inner-pages border-b border">Ph.D Entrance Form</h2>

				<p> We believe in providing education that cultivates creative understanding </p>



			</div>



		</div>

	</div>

</section>



<section class="c-padding inner-bg-2" id="about">



	<div class="uni_mainWrapper container box-shadow-global" style="background:white;">



		<!--<h1>University Admission Form 2020-2021</h1>-->





		<div class="online_wrapper">

			<h2 class="title">Ph.D Entrance Form <?= date('Y'); ?>

			</h2>

			<div class="form-start">

				<form method="post" name="registration_form" id="registration_form" enctype="multipart/form-data">

					<div class="row">

						<div class="col-md-12">

							<div class="personal_details">

								<div class="p_details">

									<h3>Personal Details</h3>

									<small>Please provide your personal details</small>

								</div>

								<hr>

							</div>

						</div>

						<div class="col-md-6 pull-right">

							<div class="form-group">

								<label>Upload your photo <span class="cum">*</span></label>

								<input required type="file" name="userfile" class="form-control" style="vertical-align:middle" id="userfile">

								<input type="hidden" name="hidden_image" class="form-control" style="vertical-align:middle" id="hidden_image">

							</div>

						</div>

					</div>

					<div class="row edu">

						<div class="col-md-6">

							<div class="form-group">

								<label>Student Name <span class="cum">*</span></label>

								<input type="text" name="student_name" id="student_name" class="form-control" maxlength="55" placeholder="Student Full Name" value="">

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label>Father's Name <span class="cum">*</span></label>

								<input type="text" name="father_name" id="father_name" class="form-control" maxlength="55" placeholder="Fathers Name" value="">

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label>Mother's Name <span class="cum">*</span></label>

								<input type="text" name="mother_name" id="mother_name" class="form-control" maxlength="55" placeholder="Mothers Name" value="">

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label>Date of Birth <span class="cum">*</span></label>

								<input type="text" name="date_of_birth" id="date_of_birth" class="form-control datepicker" placeholder="DD-MM-YY" value="">

							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-md-6">

							<div class="form-group">

								<label>Mobile Number <span class="cum">*</span></label>

								<input autocomplete="off" type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" maxlength="13" minlength="10" value="">

								<div class="error" id="mobile_error"></div>

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label>Email ID <span class="cum">*</span></label>

								<input autocomplete="off" type="email" name="email" id="email" class="form-control" maxlength="100" placeholder="Email ID" value="">

								<div class="error" id="email_error"></div>

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label>Gender <span class="cum">*</span></label>

								<select id="gender" name="gender" class="form-control">

									<option value="">Select Gender</option>

									<option value="Male">Male</option>

									<option value="Female">Female</option>

									<option value="Transgender">Transgender</option>

								</select>

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label>Category <span class="cum">*</span></label>

								<select id="category" name="category" class="form-control">

									<option value="">Select Category</option>

									<option value="General">General (Open)</option>

									<option value="Other Backward Class">Other Backward Class (OBC)</option>

									<option value="Scheduled Caste">Scheduled Caste (SC)</option>

									<option value="Scheduled Tribe">Scheduled Tribe (ST)</option>

								</select>

							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-md-6">

							<label>Current Address <span class="cum">*</span></label>

							<input type="text" class="form-control" name="address" id="address" placeholder="Address">

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label>Id Type <span class="cum">*</span></label>

								<select name="id_type" id="id_type" class="form-control">

									<option value="">Select ID Type</option>

									<?php if (!empty($id_name)) {

										foreach ($id_name as $id_name_result) { ?>

											<option value="<?= $id_name_result->id ?>"><?= $id_name_result->id_name ?></option>

									<?php }

									} ?>

								</select>

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label>Id Number <span class="cum">*</span></label>

								<input type="text" name="id_number" id="id_number" class="form-control" maxlength="100" placeholder="" value="">

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label>Nationality <span class="cum">*</span></label>

								<input type="text" name="nationality" id="nationality" class="form-control" maxlength="100" placeholder="Nationality" value="">

							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-sm-6">

							<div class="form-group">

								<label>Country <span class="cum">*</span></label>

								<select class="form-control" name="country" id="country">

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



						<div class="col-sm-6">

							<div class="form-group">

								<label>State <span class="cum">*</span></label>

								<select class="form-control" required name="state" id="state">

									<option value="">Select state</option>

								</select>



							</div>

						</div>

						<div class="col-sm-6">

							<div class="form-group">

								<label>City <span class="cum">*</span></label>

								<select class="form-control" required name="city" id="city">

									<option value="">Select City</option>

								</select>



							</div>

						</div>

						<div class="col-sm-6">

							<div class="form-group">

								<label>Pin Code <span class="cum">*</span></label>

								<input class="form-control" required name="pincode" id="pincode" placeholder="PinCode">

							</div>

						</div>

					</div>

					<hr>

					<div class="personal_details">

						<div class="p_details">

							<h3>Course/Programme Details</h3>

							<small>Please enter course/programme details</small>



						</div>



						<hr>

					</div>

					<div class="row">

						<div class="">



							<div class="col-sm-6">

								<div class="form-group">

									<label>Course <span class="cum">*</span></label>

									<select id="course" name="course" class="form-control">

										<option value="">Select Course</option>

										<?php if (!empty($course)) {

											foreach ($course as $course_result) { ?>

												<option value="<?= $course_result->id ?>"><?= $course_result->print_name ?> </option>

										<?php }

										} ?>

									</select>

								</div>

							</div>

							<div class="col-sm-6">

								<div class="form-group">

									<label>Stream <span class="cum">*</span></label>

									<select name="stream" id="stream" class="form-control">

										<option value="">Select Stream</option>

									</select>



								</div>

							</div>

							<div class="col-sm-6">

								<div class="form-group">

									<label>Semester/Year <span class="cum">*</span></label>

									<select id="year_sems" name="year_sem" class="form-control">

										<option value="1">Year 1</option>

									</select>

									<input type="hidden" id="lateral_entry_in" name="lateral_entry_in" class="form-control" readonly="readonly" value="Normal Entry">

								</div>

							</div>



						</div>

					</div>

					<hr>

					<div class="personal_details">

						<div class="p_details">

							<h3>Qualification Details</h3>

							<small>Please provide your educaational details</small>

						</div>

						<hr>

					</div>

					<div class="row">

						<div class="col-md-12">

							<div class="card card-default">



								<div class="col-md-12">

									<div class="col-md-2 col-sm-2">

										<div class="form-group heading2" style="color:#1042a7;">

											<label class="control-label">Exam <span class="cum">*</span></label>

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group heading1">

											<label class="control-label">Year of Passing <span class="cum">*</span></label>

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group heading1">

											<label class="control-label">Board/University <span class="cum">*</span></label>

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group heading1">

											<label class="control-label">Total Percentage (%) <span class="cum">*</span></label>

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group heading1">

											<label class="control-label">Upload Document <span class="cum">* (Only pdf / jpg)</span></label>

										</div>

									</div>

								</div>

							</div>

							<div class="row">

								<div class="col-md-12">

									<div class="col-md-2 col-sm-2">

										<div class="form-group heading2">

											<label class="control-label">Secondary</label>

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="secondary_year" id="secondary_year" maxlength="4" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="text" name="secondary_board" id="secondary_board" maxlength="100" class="form-control">

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="secondary_percentage" id="secondary_percentage" maxlength="6" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="file" name="secondary_marksheet" id="secondary_marksheet" class="form-control " required="" aria-required="true">

										</div>

									</div>

									<div class="col-md-12 col-sm-12">

										<div class="form-group">

											<small style="color:red;" id="s_error"></small>

										</div>

									</div>

								</div>

							</div>

							<div class="row">

								<div class="col-md-12">

									<div class="col-md-2 col-sm-2">

										<div class="form-group heading2">

											<label class="control-label">Sr. Secondary</label>

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="sr_secondary_year" id="sr_secondary_year" maxlength="4" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="text" name="sr_secondary_board" id="sr_secondary_board" maxlength="100" class="form-control">

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="sr_secondary_percentage" id="sr_secondary_percentage" maxlength="6" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="file" name="sr_secondary_marksheet" id="sr_secondary_marksheet" maxlength="100" class="form-control">

										</div>

									</div>

									<div class="col-md-12 col-sm-12">

										<div class="form-group">

											<small style="color:red;" id="ss_error"></small>

										</div>

									</div>

								</div>

							</div>

							<div class="row">

								<div class="col-md-12">

									<div class="col-md-2 col-sm-2">

										<div class="form-group heading2">

											<label class="control-label">Graduation</label>

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="graduation_year" id="graduation_year" maxlength="4" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="text" name="graduation_board" id="graduation_board" maxlength="100" class="form-control">

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="graduation_percentage" id="graduation_percentage" maxlength="6" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="file" name="graduation_marksheet" id="graduation_marksheet" maxlength="100" class="form-control">

										</div>

									</div>

									<div class="col-md-12 col-sm-12">

										<div class="form-group">

											<small style="color:red;" id="g_error"></small>

										</div>

									</div>

								</div>

							</div>

							<div class="row">

								<div class="col-md-12">

									<div class="col-md-2 col-sm-2">

										<div class="form-group heading2">

											<label class="control-label">Post Graduation</label>

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="post_graduation_year" id="post_graduation_year" maxlength="4" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="text" name="post_graduation_board" id="post_graduation_board" maxlength="100" class="form-control">

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="post_graduation_percentage" id="post_graduation_percentage" maxlength="6" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="file" name="post_graduation_marksheet" id="post_graduation_marksheet" maxlength="100" class="form-control">

										</div>

									</div>

									<div class="col-md-12 col-sm-12">

										<div class="form-group">

											<small style="color:red;" id="p_error"></small>

										</div>

									</div>

								</div>

							</div>



							<div class="row">

								<div class="col-md-12">

									<div class="col-md-2 col-sm-2">

										<div class="form-group heading2">

											<label class="control-label">Mphil</label>

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="mphil_year" id="mphil_year" maxlength="4" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="text" name="mphil_board" id="mphil_board" maxlength="100" class="form-control">

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="mphil_percentage" id="mphil_percentage" maxlength="6" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="file" name="mphil_marksheet" id="mphil_marksheet" maxlength="100" class="form-control">

										</div>

									</div>

									<div class="col-md-12 col-sm-12">

										<div class="form-group">

											<small style="color:red;" id="o_error"></small>

										</div>

									</div>

								</div>

							</div>



							<div class="row">

								<div class="col-md-12">

									<div class="col-md-2 col-sm-2">

										<div class="form-group heading2">

											<label class="control-label">Others</label>

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="other_year" id="other_year" maxlength="4" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="text" name="other_board" id="other_board" maxlength="100" class="form-control">

										</div>

									</div>

									<div class="col-md-2 col-sm-2">

										<div class="form-group">

											<input type="text" name="other_percentage" id="other_percentage" maxlength="6" class="form-control">

										</div>

									</div>

									<div class="col-md-3 col-sm-3">

										<div class="form-group">

											<input type="file" name="other_marksheet" id="other_marksheet" maxlength="100" class="form-control">

										</div>

									</div>

									<div class="col-md-12 col-sm-12">

										<div class="form-group">

											<small style="color:red;" id="o_error"></small>

										</div>

									</div>

								</div>

							</div>



						</div>

					</div>

					<hr>



					<div class="personal_details">

						<div class="p_details">

							<h3>Payment Details</h3>

							<small>Please choose details to make payment.</small>

						</div>

						<hr>

					</div>

					<div class="row">

						<div class="">

							<input type="hidden" id="mode" name="mode" class="form-control" value="2">

							<input placeholder="Deposit Date" type="hidden" id="deposit_date" name="deposit_date" class="form-control" value="2020-09-26">

							<input type="hidden" name="bank" id="bank" value="3">

							<div class="col-sm-6">

								<div class="form-group">

									<label>Payment Mode <span class="cum">*</span></label>

									<select id="payment_mode" name="payment_mode" class="form-control">

										<option value="">Select</option>

										<option value="1">Online</option>

										<option value="3">Cash</option>

									</select>

								</div>

							</div>

							<div class="col-sm-6">

								<div class="form-group">

									<label>Registration Fees <span class="cum">*</span></label>

									<input placeholder="Registration Fees" type="text" id="registraion_fees" name="registraion_fees" class="form-control" value="10000" readonly>

								</div>

							</div>

						</div>

					</div>

					<hr>



					<div class="row collapseOne" style="display:none">

						<div class="col-md-12  terms">

							<table class="detailTable" cellspacing="5" cellpadding="5">

								<tr>

									<td>

										<h4 align="justify"><b>Declaration:</b></h4>

										<br>

										<p align="justify"><b>I confirm that I have not made payment of any other amount to anybody other than deposited in the prescribed University account.</b></p>

										<p align="justify"><b>I solemnly declare and confirm that I am duly qualified to take admission in the course for which I have applied and all the certificates and testimonials attached with my application are true and valid. I have fully satisfied myself about the legal status of the University i.e. it is an autonomous statutory body with regulations making power for it's functioning and the University is duly authorized and competent to take my admission in the course for which I have applied and also to award the degree / diploma as per rules and regulation of the University. I also undertake not to ever raise any objection about Universities legal status to take my admission and award degrees on qualifying prescribed examinations. I also undertake not to demand refund of fee/charges paid by me. In case of any dispute/differences/claim of any value settlement by University arbitration clause shall be applicable.</b></p>

										<p align="justify"><b>I shall always follow the rules and regulations of the University and in case of any breach thereto, I shall be liable to be penalized for the same which may include expulsion from the University.</b></p>

									</td>

								</tr>

							</table>

						</div>

					</div>

					<div class="row">

						<div class="col-md-12  terms">

							<table class="detailTable" cellspacing="5" cellpadding="5">

								<tr>

									<td>

										<br>

										<p align="justify">As per law and legal opinion University is empowered by authority of law to award degree's, diplomas, & certificate in all course of Education including Medical Science, there being no requirement to take approval from any other authorities all certificate degrees diplomas certificate awarded by University are Sui - generis valid in law and degree/diploma/certificate holders are automatically entitled to be recognised for government jobs and for Registration with all Professional Council. For Legal opinion and relevent laws and Court Judgments Visit University website.</p>

									</td>

								</tr>

							</table>

						</div>

					</div>

					<hr>

					<div class="row" id="mbbs" style="display:none;">

						<div class="col-md-12 edu terms">

							<table class="detailTable" cellspacing="5" cellpadding="5">

								<tr>

									<td>

										<br>

										<h3>For MBBS Students</h3>

										<p align="justify">

											After fully knowing and understanding the legal position of MBBS admission & also after knowing and understanding the changes which are likely to take place in the medical education system in country I am taking admission in MBBS course in Singhania University with my free will & not because of persuasion by somebody else. In case I find difficulty in continuing my education within 4 month of admission, Singhania University has assured that fee of Rs 2.0 lakh will be refunded which is deposited by me in bank account of the Singhania University .Singhania University’s responsibility in case of my taking admission in MBBS course is maximum refunding of Rs 2.0 lakhs fee paid by me.



											I, having read and completely understood all legal position of MBBS admission in SINGHANIA UNIVERSITY pertaining to the matters here in before stated, hereby agree and undertake that I will be sole responsible.



											University Administrative staff, Teaching Staff & any other allied staff will not be liable / responsible for any future contingency/complications regarding my admission/registration after completion of my M.B.B.S. course as stated above.

										</p>

									</td>

								</tr>

							</table>

						</div>

					</div>



					<div class="row">

						<div class="col-md-12 edu">

							<div class="form-group">

								<input type="checkbox" name="mycheckbox" id="mycheckbox" value="0" required="required" /> <label>Read Instructions<span class="cum">*</span></label>

							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-md-2 edu">

							<strong>Captcha <span class="cum">*</span></strong>

						</div>

						<div class="col-md-6 edu">

							<div class="form-group">

								<div class="g-recaptcha" data-sitekey="<?=GOOGLE_DATA_SITEKEY?>"></div>

							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-md-12 edu">

							<div class="form-group">

								<label></label>

								<button type="submit" class="btn btn-primary" name="register" id="register">Register</button>

								<div class="pull-right">



								</div>

							</div>

						</div>

					</div>



			</div>

			</form>

		</div>

	</div>





</section>





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



<?php include("footer.php"); ?>



<script>

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

				});

				$('#stream').trigger('change');

			},

			error: function(jqXHR, textStatus, errorThrown) {

				console.log(textStatus, errorThrown);

			}

		});

	});



	$(function() {

		$(".datepicker").datepicker({

			dateFormat: "dd-mm-yy",

			changeMonth: true,

			changeYear: true,

			maxDate: "-18Y",

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



	$("#registration_form").validate({

		rules: {

			student_name: {

				required: true,

				noHTMLtags: true

			},

			father_name: {

				required: true,

				noHTMLtags: true

			},

			mother_name: {

				required: true,

				noHTMLtags: true

			},

			userfile: "required",

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

			},

			email: {

				required: true,

				validate_email: true,

				noHTMLtags: true,

			},

			gender: {

				required: true,

				noHTMLtags: true

			},

			nationality: {

				required: true,

				noHTMLtags: true

			},

			category: {

				required: true,

				noHTMLtags: true

			},

			session: {

				required: true,

				noHTMLtags: true

			},

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

				noHTMLtags: true

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

			registraion_fees: {

				required: true,

				noHTMLtags: true

			},

			id_type: {

				required: true,

				noHTMLtags: true

			},

			id_number: {

				required: true,

				noHTMLtags: true

			},

			secondary_year: {

				required: true,

				noHTMLtags: true

			},

			secondary_board: {

				required: true,

				noHTMLtags: true

			},

			secondary_percentage: {

				required: true,

				noHTMLtags: true

			},

			secondary_marksheet: {

				required: true,

				noHTMLtags: true

			},

			sr_secondary_year: {

				required: true,

				noHTMLtags: true

			},

			sr_secondary_board: {

				required: true,

				noHTMLtags: true

			},

			sr_secondary_percentage: {

				required: true,

				noHTMLtags: true

			},

			sr_secondary_marksheet: {

				required: true,

				noHTMLtags: true

			},

			graduation_year: {

				required: true,

				noHTMLtags: true

			},

			graduation_board: {

				required: true,

				noHTMLtags: true

			},

			graduation_percentage: {

				required: true,

				noHTMLtags: true

			},

			graduation_marksheet: {

				required: true,

				noHTMLtags: true

			},

			post_graduation_year: {

				required: true,

				noHTMLtags: true

			},

			post_graduation_board: {

				required: true,

				noHTMLtags: true

			},

			post_graduation_percentage: {

				required: true,

				noHTMLtags: true

			},

			post_graduation_marksheet: {

				required: true,

				noHTMLtags: true

			},

			payment_mode: {

				required: true,

				noHTMLtags: true

			},

			mphil_year: {

				noHTMLtags: true

			},

			mphil_board: {

				noHTMLtags: true

			},

			mphil_percentage: {

				noHTMLtags: true

			},

			other_year: {

				noHTMLtags: true

			},

			other_board: {

				noHTMLtags: true

			},

			other_percentage: {

				noHTMLtags: true

			},

		},

		messages: {

			student_name: {

				required: "Please enter Full name!",

				noHTMLtags: "HTML tags not allowed!",

			},

			father_name: {

				required: "Please enter father name!",

				noHTMLtags: "HTML tags not allowed!",

			},

			mother_name: {

				required: "Please enter mother name!",

				noHTMLtags: "HTML tags not allowed!",

			},

			userfile: "Please select photo!",

			date_of_birth: {

				required: "Select DOB!",

				noHTMLtags: "HTML tags not allowed!",

			},

			mobile: {

				required: "Please enter mobile number",

				number: "Please enter only number",

				minlength: "Please enter 10 to 12 digit mobile number.",

				maxlength: "Please enter 10 to 12 digit mobile number.",

				noHTMLtags: "HTML tags not allowed!",

			},

			email: {

				required: "Please enter email",

				validate_email: "Please enter valid email",

				noHTMLtags: "HTML tags not allowed!",

			},

			gender: {

				required: "Please select gender!",

				noHTMLtags: "HTML tags not allowed!",

			},

			nationality: {

				required: "Please enter nationality!",

				noHTMLtags: "HTML tags not allowed!",

			},

			category: {

				required: "Please select category!",

				noHTMLtags: "HTML tags not allowed!",

			},

			mode: {

				required: "Please select payment mode",

				noHTMLtags: "HTML tags not allowed!",

			},

			deposit_date: {

				required: "Please select deposit date",

				noHTMLtags: "HTML tags not allowed!",

			},

			session: {

				required: "Please select session!",

				noHTMLtags: "HTML tags not allowed!",

			},

			course: {

				required: "Please select Course Name!",

				noHTMLtags: "HTML tags not allowed!",

			},

			stream: {

				required: "Please select stream Name!",

				noHTMLtags: "HTML tags not allowed!",

			},

			year_sem: {

				required: "Please select year/sem Name!",

				noHTMLtags: "HTML tags not allowed!",

			},

			address: {

				required: "Enter correspondence address!",

				noHTMLtags: "HTML tags not allowed!",

			},

			country: {

				required: "Please select country!",

				noHTMLtags: "HTML tags not allowed!",

			},

			state: {

				required: "Please select state!",

				noHTMLtags: "HTML tags not allowed!",

			},

			city: {

				required: "Please select city!",

				noHTMLtags: "HTML tags not allowed!",

			},

			pincode: {

				required: "Please enter pincode!",

				noHTMLtags: "HTML tags not allowed!",

			},

			payment_method: {

				required: "Please select payment method!",

				noHTMLtags: "HTML tags not allowed!",

			},

			accept: {

				required: "Please accept our terms & conditions!",

				noHTMLtags: "HTML tags not allowed!",

			},

			registraion_fees: {

				required: "Please enter fees!",

				noHTMLtags: "HTML tags not allowed!",

			},

			id_type: {

				required: "Please select ID Type!",

				noHTMLtags: "HTML tags not allowed!",

			},

			id_number: {

				required: "Please enter id number!",

				noHTMLtags: "HTML tags not allowed!",

			},

			secondary_year: {

				required: "Please enter your secondary year!",

				noHTMLtags: "HTML tags not allowed!",

			},

			secondary_board: {

				required: "Please enter your secondary board!",

				noHTMLtags: "HTML tags not allowed!",

			},

			secondary_percentage: {

				required: "Please enter your secondary percentage!",

				noHTMLtags: "HTML tags not allowed!",

			},

			secondary_marksheet: {

				required: "Please upload your secondary marksheet!",

				noHTMLtags: "HTML tags not allowed!",

			},

			sr_secondary_year: {

				required: "Please enter sr. secondary year!",

				noHTMLtags: "HTML tags not allowed!",

			},

			sr_secondary_board: {

				required: "Please enter sr. secondary board!",

				noHTMLtags: "HTML tags not allowed!",

			},

			sr_secondary_percentage: {

				required: "Please enter your sr. secondary percentage!",

				noHTMLtags: "HTML tags not allowed!",

			},

			sr_secondary_marksheet: {

				required: "Please upload marksheet!",

				noHTMLtags: "HTML tags not allowed!",

			},

			graduation_year: {

				required: "Please enter graduation year!",

				noHTMLtags: "HTML tags not allowed!",

			},

			graduation_board: {

				required: "Please enter graduation university!",

				noHTMLtags: "HTML tags not allowed!",

			},

			graduation_percentage: {

				required: "Please enter graduation percentage!",

				noHTMLtags: "HTML tags not allowed!",

			},

			graduation_marksheet: {

				required: "Please upload marksheet!",

				noHTMLtags: "HTML tags not allowed!",

			},

			post_graduation_year: {

				required: "Please enter post graduation year!",

				noHTMLtags: "HTML tags not allowed!",

			},

			post_graduation_board: {

				required: "Please enter post graduation university!",

				noHTMLtags: "HTML tags not allowed!",

			},

			post_graduation_percentage: {

				required: "Please enter post graduation percentage!",

				noHTMLtags: "HTML tags not allowed!",

			},

			post_graduation_marksheet: {

				required: "Please upload marksheet!",

				noHTMLtags: "HTML tags not allowed!",

			},

			payment_mode: {

				required: "Please select payment mode!",

				noHTMLtags: "HTML tags not allowed!",

			},

			mphil_year: {

				noHTMLtags: "HTML tags not allowed!",

			},

			mphil_board: {

				noHTMLtags: "HTML tags not allowed!",

			},

			mphil_percentage: {

				noHTMLtags: "HTML tags not allowed!",

			},

			other_year: {

				noHTMLtags: "HTML tags not allowed!",

			},

			other_board: {

				noHTMLtags: "HTML tags not allowed!",

			},

			other_percentage: {

				noHTMLtags: "HTML tags not allowed!",

			},

		},

		submitHandler: function(form) {

			form.submit();

		}

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

</script>