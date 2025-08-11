<?php include("header.php"); ?>


<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/croppie.css">





<section>





	<div class="header_cc_area slide-bg">


		<div class="container  overlay-about" style="width: 100%;">


			<p>Home / Application For Guide/Supervisors</p>





			<div class=" container-fluid text-center inner-heading-content">


				<h2 class="main-heading-inner-pages border-b border"> Application For Guide/Supervisors </h2>


				<p> We believe in providing education that cultivates creative understanding </p>





			</div>








		</div>


	</div>





</section>


<section class="c-padding inner-bg-99">





	<div class="uni_mainWrapper container box-shadow-global" style="background:white;">


		<h2 class="title"> Application For Guide/Supervisors </h2>


		<div class="online_wrapper">





			<div class="admission_div">


				<form method="post" name="admission_form" id="admission_form" enctype="multipart/form-data">


					<div class="row">


						<div class="col-md-12">


							<div class="common_details">


								<div class="col-md-12">


									<h3>Personal Details</h3>


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


									<label>Name (Mr./Ms.) <span class="req">*</span></label>


									<input type="text" name="name" id="name" class="form-control charector" placeholder="Full Name">


								</div>


							</div>


							<div class="col-md-6">


								<div class="form-group">


									<label>Son/Daughter of <span class="req">*</span></label>


									<input type="text" name="son_of" id="son_of" class="form-control charector" placeholder="Son/Daughter of">


								</div>


							</div>


						</div>





						<div class="col-md-12">


							<div class="col-md-6">


								<div class="form-group">


									<label>Date of Birth <span class="req">*</span></label>


									<input type="text" name="date_of_birth" id="date_of_birth" class="form-control datepicker" placeholder="DD-MM-YY">


								</div>


							</div>


							<div class="col-md-6">


								<div class="form-group">


									<label>Phone Number </label>


									<input autocomplete="off" type="text" name="phone_number" id="phone_number" class="form-control number_only" placeholder="Phone Number" value="">


								</div>


							</div>


						</div>


						<div class="col-md-12">


							<div class="col-md-6">


								<div class="form-group">


									<label>Mobile Number <span class="req">*</span></label>


									<input autocomplete="off" type="text" name="mobile" id="mobile" class="form-control number_only" placeholder="Mobile Number" maxlength="10" minlength="10" value="">


									<div class="error" id="mobile_error"></div>


								</div>


							</div>


							<div class="col-md-6">


								<div class="form-group">


									<label>Email ID <span class="req">*</span></label>


									<input autocomplete="off" type="email" name="email" id="email" class="form-control" placeholder="Email ID">


									<div class="error" id="email_error"></div>


								</div>


							</div>


						</div>


						<div class="col-md-12">


							<div class="col-md-6">


								<div class="form-group">


									<label>Gender <span class="req">*</span></label>


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


									<label>Photo <span class="req">*</span></label>


									<input type="file" name="userfile" id="userfile" class="form-control upload_photo">


									<input type="hidden" name="hidden_image" id="hidden_image">


								</div>


							</div>


						</div>


						<div class="col-md-12">


							<div class="col-md-6">


								<div class="form-group">


									<label>Signature <span class="req">*</span></label>


									<input type="file" name="signature" id="signature" class="form-control">


								</div>


							</div>


							<div class="col-md-6">


								<label>Correspondence Address <span class="req">*</span></label>


								<input type="text" class="form-control rules" name="address" id="address" placeholder="Correspondence Address">


							</div>


						</div>





						<div class="col-md-12">


							<div class="col-md-6">


								<div class="form-group">


									<label>Country <span class="req">*</span></label>


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


							<div class="col-md-6">


								<div class="form-group">


									<label>State <span class="req">*</span></label>


									<select class="form-control" required name="state" id="state">


										<option value="">Select state</option>


									</select>


								</div>





							</div>


						</div>


						<div class="col-md-12">


							<div class="col-md-6">


								<div class="form-group">


									<label>City <span class="req">*</span></label>


									<select class="form-control" required name="city" id="city">


										<option value="">Select City</option>


									</select>


								</div>


							</div>


							<div class="col-md-6">


								<div class="form-group">


									<label>Pin Code <span class="req">*</span></label>


									<input class="form-control number_only" required name="pincode" id="pincode" placeholder="PinCode" <?php if (!empty($students)) { ?>value="<?= $students->pin_code ?>" <?php } ?>>


								</div>


							</div>


						</div>





						<div class="col-md-12">


							<div class="col-md-6">


								<label>Area of Specilisation <span class="req">*</span></label>


								<input type="text" class="form-control rules" name="specilisation" id="specilisation" placeholder="Area of Specilisation">


							</div>





							<div class="col-md-6">


								<label>Remark</label>


								<input type="text" class="form-control rules" name="remark" id="remark" placeholder="Remark">


							</div>


						</div>





						<div class="clearfix"></div>





						<div class="col-md-12">


							<div class="col-md-6">


								<label>Area of Research & Development<span class="req">*</span></label>


								<input type="text" class="form-control rules" name="research_area" id="research_area" placeholder="Area of Research & Development">


							</div>


							<div class="col-md-6">


								<div class="form-group">


									<label>Employment Details <span class="req">*</span></label>


									<select class="form-control" name="employement_type" id="employement_type">


										<option value="">Select Employment Type</option>


										<option value="Government Employee">Government Employee</option>


										<option value="Private Sector Employee">Private Sector Employee</option>


										<option value="Not Working">Not Working</option>


									</select>


								</div>


							</div>





						</div>








						<div class="col-md-12">


							<div class="col-md-6">


								<label>Work Experience <span class="req">*</span></label>


								<input type="text" class="form-control rules" name="work_experience" id="work_experience" placeholder="Work Experience">


							</div>


							<div class="col-md-6">


								<label>Present Working <span class="req">*</span></label>


								<input type="text" class="form-control rules" name="present_working" id="present_working" placeholder="Present Working">


							</div>





						</div>


						<div class="clearfix"></div>











						<br>





						<div class="common_details">


							<div class="col-md-12">


								<h3>Details of the Educational Progress of the Applicant</h3>


								<small>Please enter educational details</small>


							</div>


							<div class="clearfix"></div>


						</div>








						<br>








						<div class="col-md-12">


							<div class="col-md-3">


								<div class="form-group">


									<label>10th Year of Passing<span class="req">*</span></label>


									<input type="text" required name="secondary_year" id="secondary_year" class="form-control" maxlength="4" placeholder="Secondary Year">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Name of the School/Board/University<span class="req">*</span></label>


									<input type="text" name="secondary_university" id="secondary_university" class="form-control" placeholder="Secondary Board">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Subject Studied<span class="req">*</span></label>


									<input type="text" name="secondary_subject" id="secondary_subject" class="form-control" placeholder="Subject Studied">


								</div>


							</div>





							<div class="col-md-3">


								<div class="form-group">


									<label>Marksheet<span class="req">*</span></label>


									<input type="file" name="secondary_subject_marksheet" id="secondary_subject_marksheet" class="form-control">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>12th Year of Passing <span class="req">*</span></label>


									<input type="text" name="sr_secondary_year" id="sr_secondary_year" class="form-control" maxlength="4" placeholder="Sr. Secondary Year">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Name of the School/Board/University <span class="req">*</span></label>


									<input type="text" name="sr_secondary_university" id="sr_secondary_university" class="form-control" placeholder="Name of the School/Board/University">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Subject Studied <span class="req">*</span></label>


									<input type="text" name="sr_secondary_subject" id="sr_secondary_subject" class="form-control" placeholder="Subject Studied">


								</div>


							</div>





							<div class="col-md-3">


								<div class="form-group">


									<label>Marksheet <span class="req">*</span></label>


									<input type="file" name="sr_secondary_subject_marksheet" id="sr_secondary_subject_marksheet" class="form-control">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Graduation Year of Passing <span class="req">*</span></label>


									<input type="text" name="graduation_year" id="graduation_year" class="form-control" maxlength="4" placeholder="Graduation Year">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Name of the School/Board/University <span class="req">*</span></label>


									<input type="text" name="graduation_university" id="graduation_university" class="form-control" placeholder="Graduation University">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Subject Studied <span class="req">*</span></label>


									<input type="text" name="graduation_subject" id="graduation_subject" class="form-control" placeholder="Subject Studied">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Marksheet <span class="req">*</span></label>


									<input type="file" name="graduation_subject_marksheet" id="graduation_subject_marksheet" class="form-control">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Post Graduation Year of Passing <span class="req">*</span></label>


									<input type="text" name="post_graduation_year" id="post_graduation_year" class="form-control" maxlength="4" placeholder="Post Graduation Year">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Name of the School/Board/University <span class="req">*</span></label>


									<input type="text" name="post_graduation_university" id="post_graduation_university" class="form-control" placeholder="Post Graduation University">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Subject Studied <span class="req">*</span></label>


									<input type="text" name="post_graduation_subject" id="post_graduation_subject" class="form-control" placeholder="Subject Studied">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Marksheet <span class="req">*</span></label>


									<input type="file" name="post_graduation_subject_marksheet" id="post_graduation_subject_marksheet" class="form-control">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Ph.D Year of Passing <span class="req">*</span></label>


									<input type="text" name="phd_year" id="phd_year" class="form-control" maxlength="4" placeholder="Ph.D Year of Passing">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Name of the School/Board/University <span class="req">*</span></label>


									<input type="text" name="phd_university" id="phd_university" class="form-control" placeholder="Ph.D University">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Subject Studied <span class="req">*</span></label>


									<input type="text" name="phd_subject" id="phd_subject" class="form-control" placeholder="Subject Studied">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Degree <span class="req">*</span></label>


									<input type="file" name="phd_subject_marksheet" id="phd_subject_marksheet" class="form-control">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Any Other Qualification Year of Passing</label>


									<input type="text" name="other_qualification_year" id="other_qualification_year" class="form-control" maxlength="4" placeholder="Other Qualification Year of Passing">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Name of the School/Board/University</label>


									<input type="text" name="other_qualification_university" id="other_qualification_university" class="form-control" placeholder="Name of the School/Board/University">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Subject Studied</label>


									<input type="text" name="other_qualification_subject" id="other_qualification_subject" class="form-control" placeholder="Other Qualification Subject">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Certificate/Degree</label>


									<input type="file" name="other_qualification_subject_marksheet" id="other_qualification_subject_marksheet" class="form-control">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Biodata*</label>


									<input type="file" name="biodata" id="biodata" class="form-control">


								</div>


							</div>


							<div class="col-md-3">


								<div class="form-group">


									<label>Aadhar Card*</label>


									<input type="file" name="aadhar_card" id="aadhar_card" class="form-control">


								</div>


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





						<div class="row">


							<div class="col-md-12 terms">


								<table class="detailTable" cellspacing="5" cellpadding="5">


									<tr>


										<td>


											<br>


											<b>Declaration:</b>


											<p>By Guide</p>


											<br>


											<p align="justify"><b>I <span id="dec"></span> son/daughter of <span id="son_of_val"> </span> have read & hereby certify that the information given in the application is complete and accurate to the best of my knowledge.</b></p>


											<p align="justify">I understand all the rules and regulations laid down by the university and agree that misrepresentation or omission of the facts will justify that denial of enrollment, cancelation of enrollment. I will follow all the rules and reguations stated under UGC Norms and Birtikendrajit University</p>





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


									<input type="checkbox" name="mycheckbox" id="mycheckbox" value="0" required="required" /> <label style="color:red">I Agree to the declaration<span class="req">*</span></label>


								</div>


							</div>


						</div>


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


				<div class="clearfix"></div>





			</div>


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
	$("#son_of").keyup(function() {


		$("#son_of_val").html($(this).val());


	});


	$("#name").keyup(function() {


		$("#dec").html($(this).val());


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








	jQuery.validator.addMethod("validate_email", function(value, element) {


		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {


			return true;


		} else {


			return false;


		}


	}, "Please enter a valid Email.");





	$("#admission_form").validate({


		rules: {


			name: {


				required: true,


				noHTMLtags: true


			},


			son_of: {


				required: true,


				noHTMLtags: true


			},


			userfile: {


				required: true,


				noHTMLtags: true


			},


			signature: {


				required: true,


				noHTMLtags: true


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


				noHTMLtags: true


			},


			phone_number: {


				number: true,


				noHTMLtags: true


			},


			email: {


				required: true,


				validate_email: true,


				noHTMLtags: true


			},


			gender: {


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


			specilisation: {


				required: true,


				noHTMLtags: true


			},


			research_area: {


				required: true,


				noHTMLtags: true


			},


			employement_type: {


				required: true,


				noHTMLtags: true


			},


			work_experience: {


				required: true,


				noHTMLtags: true


			},


			present_working: {


				required: true,


				noHTMLtags: true


			},


			secondary_year: {


				required: true,


				noHTMLtags: true


			},


			secondary_university: {


				required: true,


				noHTMLtags: true


			},


			secondary_subject: {


				required: true,


				noHTMLtags: true


			},


			secondary_subject_marksheet: {


				required: true,


				noHTMLtags: true


			},


			sr_secondary_year: {


				required: true,


				noHTMLtags: true


			},


			sr_secondary_university: {


				required: true,


				noHTMLtags: true


			},


			sr_secondary_subject: {


				required: true,


				noHTMLtags: true


			},


			sr_secondary_subject_marksheet: {


				required: true,


				noHTMLtags: true


			},


			graduation_year: {


				required: true,


				noHTMLtags: true


			},


			graduation_university: {


				required: true,


				noHTMLtags: true


			},


			graduation_subject: {


				required: true,


				noHTMLtags: true


			},


			graduation_subject_marksheet: {


				required: true,


				noHTMLtags: true


			},


			post_graduation_year: {


				required: true,


				noHTMLtags: true


			},


			post_graduation_university: {


				required: true,


				noHTMLtags: true


			},


			post_graduation_subject: {


				required: true,


				noHTMLtags: true


			},


			post_graduation_subject_marksheet: {


				required: true,


				noHTMLtags: true


			},


			phd_year: {


				required: true,


				noHTMLtags: true


			},


			phd_university: {


				required: true,


				noHTMLtags: true


			},


			phd_subject: {


				required: true,


				noHTMLtags: true


			},


			phd_subject_marksheet: {


				required: true,


				noHTMLtags: true


			},


			biodata: {


				required: true,


				noHTMLtags: true


			},


			aadhar_card: {


				required: true,


				noHTMLtags: true


			},


			accept: {


				required: true,


				noHTMLtags: true


			},


		},


		messages: {


			name: {


				required: "Please enter name",


				noHTMLtags: "HTML tags not allowed!"


			},


			son_of: {


				required: "Please enter son/daughter of",


				noHTMLtags: "HTML tags not allowed!"


			},


			userfile: {


				required: "please upload your photo",


				noHTMLtags: "HTML tags not allowed!"


			},


			signature: {


				required: "please upload your signature",


				noHTMLtags: "HTML tags not allowed!"


			},


			date_of_birth: {


				required: "Please select date of birth",


				noHTMLtags: "HTML tags not allowed!"


			},


			mobile: {


				required: "Please enter mobile number",


				number: "Please enter valid mobile number",


				minlength: "Please enter valid mobile number",


				maxlength: "Please enter valid mobile number",


				noHTMLtags: "HTML tags not allowed!"


			},


			phone_number: {


				number: "Please enter valid phone number",


				noHTMLtags: "HTML tags not allowed!"


			},


			email: {


				required: "Please enter email",


				validate_email: "Please enter valid email",


				noHTMLtags: "HTML tags not allowed!"


			},


			gender: {


				required: "Please select gender",


				noHTMLtags: "HTML tags not allowed!"


			},


			address: {


				required: "Please enter valid address",


				noHTMLtags: "HTML tags not allowed!"


			},


			country: {


				required: "Please select country",


				noHTMLtags: "HTML tags not allowed!"


			},


			state: {


				required: "Please select state",


				noHTMLtags: "HTML tags not allowed!"


			},


			city: {


				required: "Please select city",


				noHTMLtags: "HTML tags not allowed!"


			},


			pincode: {


				required: "Please enter pincode",


				noHTMLtags: "HTML tags not allowed!"


			},


			specilisation: {


				required: "Please enter specilisation",


				noHTMLtags: "HTML tags not allowed!"


			},


			research_area: {


				required: "Please enter area of research",


				noHTMLtags: "HTML tags not allowed!"


			},


			employement_type: {


				required: "Please select employement type",


				noHTMLtags: "HTML tags not allowed!"


			},


			work_experience: {


				required: "Please enter work experience",


				noHTMLtags: "HTML tags not allowed!"


			},


			present_working: {


				required: "Please enter present working",


				noHTMLtags: "HTML tags not allowed!"


			},


			secondary_year: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			secondary_university: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			secondary_subject: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			secondary_subject_marksheet: {


				required: "Please upload marksheet",


				noHTMLtags: "HTML tags not allowed!"


			},


			sr_secondary_year: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			sr_secondary_university: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			sr_secondary_subject: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			sr_secondary_subject_marksheet: {


				required: "Please upload marksheet",


				noHTMLtags: "HTML tags not allowed!"


			},


			graduation_year: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			graduation_university: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			graduation_subject: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			graduation_subject_marksheet: {


				required: "Please upload marksheet",


				noHTMLtags: "HTML tags not allowed!"


			},


			post_graduation_year: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			post_graduation_university: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			post_graduation_subject: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			post_graduation_subject_marksheet: {


				required: "Please upload marksheet",


				noHTMLtags: "HTML tags not allowed!"


			},


			phd_year: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			phd_university: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			phd_subject: {


				required: "Please enter details",


				noHTMLtags: "HTML tags not allowed!"


			},


			phd_subject_marksheet: {


				required: "Please upload degree",


				noHTMLtags: "HTML tags not allowed!"


			},


			biodata: {


				required: "Please upload your biodata",


				noHTMLtags: "HTML tags not allowed!"


			},


			aadhar_card: {


				required: "Please upload your aadhar card",


				noHTMLtags: "HTML tags not allowed!"


			},


			accept: {


				required: "Please accept declaration",


				noHTMLtags: "HTML tags not allowed!"


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


					url: "<?= base_url(); ?>update_guide_photo.php",


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