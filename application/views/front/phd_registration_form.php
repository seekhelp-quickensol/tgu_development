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

					<h2>Ph.D Entrance Form</h2>
					<ul>

						<li>

							<a href="<?=base_url()?>">

								Home 

							</a>

						</li>

						<li class="active">Research</li>

						<li class="active"> Ph.D Performa</li>

						<li class="active">Ph.D Entrance Form</li>

					</ul>

				</div>

			</div>

		</div>

		<!-- End Page Title Area -->



	



				<!-- Start Candidates Resume Area -->

				<section class="candidates-resume-area ptb-100">

			<div class="container">

				<div class="candidates-resume-content">

					<form class="resume-info" method="post" name="phd_entrance_form" id="phd_entrance_form" enctype="multipart/form-data" onsubmit="return validateForm();">

						<!-- <h3>Student basic information</h3>



						<div class="row">

							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Student Name <span class="req">*</span></label>

									<input class="form-control" type="text" name="student_name" id="student_name">

								</div>

							</div> -->



							<!-- <div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Degree Level</label>

									<select class="form-control" name="degree_level" id="degree_level">

										<option value="">Select Degree level</option>

										<option value="1">First Class</option>

										<option value="2">Second Class</option>

										<option value="3">Third Class</option>

									</select>

									<i class="ri-arrow-down-s-line"></i>

								</div>

							</div> -->



							<!-- <div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label for="img">Student Photo <span class="req">*</span></label>

									<input type="file" class="form-control" id="img" name="img" accept="image/*">

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label for="img">Upload Passport or Birth Documentation <span class="req">*</span></label>

									<input type="file" class="form-control" id="passport_img" name="passport_img" accept="image/*">

								</div>

							</div> -->



							<!-- <p>Photo Must be in Passport (PP) Size. Max Upload Size 256KB</p>

						</div> -->



						<h3>Student Personal Details</h3>

						<p><small>Please provide your personal details</small></p>



						<div class="row">

							<!-- <div class="col-lg-6 col-md-6">

								<div class="form-group"> -->

									<!-- <label for="img">Student Photo <span class="req">*</span></label>

									<input type="file" class="form-control" id="img" name="img" accept="image/*"> -->

								<!-- </div>

							</div> -->



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label for="img">Upload your photo <span class="req">*</span></label>

									<input type="file" class="form-control" id="photo_image" name="photo_image" accept="image/*">

									<input type="hidden" name="hidden_image" class="form-control" style="vertical-align:middle" id="hidden_image">

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Student Name <span class="req">*</span></label>

									<input placeholder="Student Name" class="form-control" type="text" autocomplete="off" name="student_name" id="student_name">

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Father's Name <span class="req">*</span></label>

									<input placeholder="Father's Name" type="text" class="form-control" name="father_name" autocomplete="off" id="father_name">

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Mother's Name <span class="req">*</span></label>

									<input placeholder="Mother's Name" type="text" class="form-control" name="mother_name" autocomplete="off" id="mother_name">

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Date of Birth <span class="req">*</span></label>

									<div class="input-group date" id="datetimepicker">

										<input placeholder="Date of Birth" type="text" class="form-control datepicker" autocomplete="off" name="date_of_birth" id="date_of_birth" autocomplete="off">

										<span class="input-group-addon"></span>

										<i class="bx bx-calendar"></i>

									</div>	

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Mobile Number <span class="req">*</span></label>

									<input placeholder="Mobile Number" type="text" class="form-control" autocomplete="off" name="mobile" id="mobile" maxlength="10" minlength="10">

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Email ID <span class="req">*</span></label>

									<input placeholder="Email ID" type="email" class="form-control" autocomplete="off" name="email" id="email">

								</div>

								<div class="error" id="email_error"></div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Gender <span class="req">*</span></label>

									<select id="gender" name="gender" class="form-control js-example-basic-single select2_single">

										<option value="">Select Gender</option>

										<option value="Male">Male</option>

										<option value="Female">Female</option>

										<option value="Transgender">Transgender</option>

									</select>

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Category <span class="req">*</span></label>

									<select id="category" name="category" class="form-control js-example-basic-single select2_single">

										<option value="">Select Category</option>

										<option value="General">General (Open)</option>

										<option value="Other Backward Class">Other Backward Class (OBC)</option>

										<option value="Scheduled Caste">Scheduled Caste (SC)</option>

										<option value="Scheduled Tribe">Scheduled Tribe (ST)</option>

									</select>

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Current Address <span class="req">*</span></label>

									<input placeholder="Current Address" type="text" class="form-control" autocomplete="off" name="address" id="address">

								</div>

							</div>



							<!-- <div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Id Type <span class="req">*</span></label>

									<select name="id_type" id="id_type" class="form-control">

										<option value="">Select ID Type</option>

										<option value="adharcard">Adharcard</option>

										<option value="passport">Passport</option>

										<option value="voterid">VoterID</option>

										<option value="pancard">Pan Card</option>

										<option value="driving licence">Driving License</option>

									</select>

									<i class="ri-arrow-down-s-line"></i>

								</div>

							</div> -->



							<!-- <div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>ID Number <span class="req">*</span></label>

									<input placeholder="ID Number" type="text" class="form-control" autocomplete="off" name="id_number" id="id_number" maxlength="100">

								</div>

							</div> -->



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Nationality <span class="req">*</span></label>

									<input placeholder="Nationality" type="text" class="form-control" autocomplete="off" name="nationality" id="nationality" maxlength="100">

								</div>

							</div>



						

							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Employment Details <span class="req">*</span></label>

									<select class="form-control mode_of_change js-example-basic-single select2_single" name="employment_details" id="employment_details">

										<option value="">Select Employment Type</option> 

										<option value="Government Employee">Government Employee</option> 

										<option value="Private Sector Employee">Private Sector Employee</option> 

										<option value="Not Working">Not Working</option> 

									</select>

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>NOC</label>

									<input type="file" name="noc" id="noc" class="form-control" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">

									<input type="hidden" name="hidden_noc" id="hidden_noc" value="">

								</div>

							</div>

							

							<div class="col-lg-6 col-md-6">

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





							<div class="col-lg-6 col-md-6">

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



							

							<div class="col-lg-6 col-md-6">

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



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Pin Code <span class="req">*</span></label>

									<input placeholder="Pin Code" class="form-control number_only" autocomplete="off" name="pincode" id="pincode">

								</div>

							</div>



						</div>

							

						<h3>Course/Programme Details</h3>

						<p><small>Please enter course/programme details</small></p>



						<div class="row">

							<div class="col-lg-6 col-md-6">

								<div class="form-group">

								<label>Course <span class="req">*</span></label>

								<select id="course" name="course" class="form-control js-example-basic-single select2_single">

									<option value="">Select Course</option>

									<option value="23">Ph.D </option>

								</select>

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

								<label>Stream <span class="req">*</span></label>

								<select name="stream" id="stream" class="form-control select2_single">

									<option value="">Select Stream</option>

									<?php if(!empty($stream)){ foreach($stream as $stream_result){?>

										<option value="<?=$stream_result->id?>" ><?=$stream_result->stream_name?></option>

										<?php }}?>

								</select>

								</div>

							</div>

						



						

							<div class="col-lg-6 col-md-6">

								<div class="form-group">

								<label>Semester/Year <span class="req">*</span></label>

								<select id="year_sem" name="year_sem" class="form-control js-example-basic-single select2_single">

									<option value="">Select Semester/Year</option>

									<option value="year1">Year 1</option>

								</select>

								</div>

							</div>

						</div>





						<h3>Qualification Details</h3>

						<p><small>Please provide your Qualification details</small></p>

						<div class="row">

							<div class="col-lg-2 col-md-2">

								<div class="form-group heading2" >

									<label class="control-label">Exam <span class="req">*</span></label>

								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group heading1">

									<label class="control-label">Year of Passing <span class="req">*</span></label>

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group heading1">

									<label class="control-label">Board/University <span class="req">*</span></label>

								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group heading1">

									<label class="control-label">Total Percentage (%) <span class="req">*</span></label>

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group heading1">

									<label class="control-label">Upload Marksheet <span class="req">*<br> <small>(Only pdf / jpg) </small></span></label>

								</div>

							</div>

						</div>



						<div class="row">

							<div class="col-lg-2 col-md-2">

								<div class="form-group heading2">

									<label class="control-label">Secondary</label>

								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Year of Passing" type="text" name="secondary_year" autocomplete="off" id="secondary_year" maxlength="4" class="form-control">

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="Board/University" type="text" name="secondary_board" autocomplete="off" id="secondary_board" maxlength="100" class="form-control">



								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Total Percentage" type="text" name="secondary_percentage" autocomplete="off" id="secondary_percentage" maxlength="6" class="form-control">



								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="" type="file" name="secondary_marksheet" id="secondary_marksheet" class="form-control" accept=".jpg ,.pdf" required="" aria-required="true">



								</div>

							</div>

						</div>





						<div class="row">

							<div class="col-lg-2 col-md-2">

								<div class="form-group heading2">

									<label class="control-label">Sr. Secondary</label>

								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Year of Passing" type="text" name="sr_secondary_year" autocomplete="off" id="sr_secondary_year" maxlength="4" class="form-control">

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="Board/University" type="text" name="sr_secondary_board" autocomplete="off" id="sr_secondary_board" maxlength="100" class="form-control">

								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Total Percentage" type="text" name="sr_secondary_percentage" autocomplete="off" id="sr_secondary_percentage" maxlength="6" class="form-control">



								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="" type="file" name="sr_secondary_marksheet" id="sr_secondary_marksheet" maxlength="100" accept=".jpg ,.pdf" class="form-control">

								</div>

							</div>

						</div>





						<div class="row">

							<div class="col-lg-2 col-md-2">

								<div class="form-group heading2">

									<label class="control-label">Graduation</label>

								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Year of Passing" type="text" name="graduation_year" autocomplete="off" id="graduation_year" maxlength="4" class="form-control">

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="Board/University" type="text" name="graduation_board" autocomplete="off" id="graduation_board" maxlength="100" class="form-control">



								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Total Percentage" type="text" name="graduation_percentage" autocomplete="off" id="graduation_percentage" maxlength="6" class="form-control">



								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="" type="file" name="graduation_marksheet" id="graduation_marksheet" maxlength="100" accept=".jpg ,.pdf" class="form-control">



								</div>

							</div>

						</div>



						<div class="row">

							<div class="col-lg-2 col-md-2">

								<div class="form-group heading2">

									<label class="control-label">Post Graduation</label>



								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Year of Passing" type="text" name="post_graduation_year" autocomplete="off" id="post_graduation_year" maxlength="4" class="form-control">



								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="Board/University" type="text" name="post_graduation_board" autocomplete="off" id="post_graduation_board" maxlength="100" class="form-control">



								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Total Percentage" type="text" name="post_graduation_percentage" autocomplete="off" id="post_graduation_percentage" maxlength="6" class="form-control">



								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="" type="file" name="post_graduation_marksheet" id="post_graduation_marksheet" accept=".jpg ,.pdf" maxlength="100" class="form-control">

								</div>

							</div>

						</div>



						<div class="row">

							<div class="col-lg-2 col-md-2">

								<div class="form-group heading2">

									<label class="control-label">Mphil</label>



								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Year of Passing" type="text" name="mphil_year" id="mphil_year" autocomplete="off" maxlength="4" class="form-control">



								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="Board/University" type="text" name="mphil_board" id="mphil_board" autocomplete="off" maxlength="100" class="form-control">



								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Total Percentage" type="text" name="mphil_percentage" id="mphil_percentage" autocomplete="off" maxlength="6" class="form-control">



								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="" type="file" name="mphil_marksheet" id="mphil_marksheet" maxlength="100" accept=".jpg ,.pdf" class="form-control">



								</div>

							</div>

						</div>



						<div class="row">

							<div class="col-lg-2 col-md-2">

								<div class="form-group heading2">

									<label class="control-label">Others</label>



								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Year of Passing" type="text" name="other_year" id="other_year" autocomplete="off" maxlength="4" class="form-control">



								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="Board/University" type="text" name="other_board" id="other_board" autocomplete="off" maxlength="100" class="form-control">



								</div>

							</div>



							<div class="col-lg-2 col-md-2">

								<div class="form-group">

									<input placeholder="Total Percentage" type="text" name="other_percentage" id="other_percentage" autocomplete="off" maxlength="6" class="form-control">

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<input placeholder="" type="file" name="other_marksheet" id="other_marksheet" maxlength="100" accept=".jpg ,.pdf" class="form-control">

								</div>

							</div>

						</div>



						<h3>Payment Details</h3>

						<p><small>Please choose details to make payment.</small></p>





						<div class="row">

							<div class="col-lg-6 col-md-6">

								<div class="form-group heading2">

								<label>Payment Mode <span class="req">*</span></label>

								<select id="payment_mode" name="payment_mode" class="form-control js-example-basic-single select2_single">

									<option value="">Select Payment Mode</option>

									<option value="online">Online</option>

									<!-- <option value="cash">Cash</option> -->

								</select>

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

								<label>Registration Fees <span class="cum">*</span></label>

									<input placeholder="Registration Fees" type="text" id="registraion_fees" name="registraion_fees" class="form-control" value="10000" readonly>

								</div>

							</div>

						</div>

						<hr>

						<br>

						<div class="row">

							<div class="col-lg-12 col-md-12">

								<div class="form-group">

									<p align="justify">As per law and legal opinion University is empowered by authority of law to award degree's, diplomas, & certificate in all course of Education including Medical Science, there being no requirement to take approval from any other authorities all certificate degrees diplomas certificate awarded by University are Sui - generis valid in law and degree/diploma/certificate holders are automatically entitled to be recognised for government jobs and for Registration with all Professional Council. For Legal opinion and relevent laws and Court Judgments Visit University website.</p>

								</div>

							</div>

						</div>





							<!-- <div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>School <span class="req">*</span></label>

									<input class="form-control" type="text" name="school" id="school">

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<div class="form-group">

										<label>Year of completion <span class="req">*</span></label>

										<div class="input-group date" id="datetimepicker-2">

											<input type="text" class="form-control" name="year_of_completion" id="year_of_completion">

											<span class="input-group-addon"></span>

											<i class="bx bx-calendar"></i>

										</div>	

									</div>

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Highest qualification <span class="req">*</span></label>

									<input type="text" class="form-control" name="qualification" id="qualification">

								</div>

							</div> -->



							<!-- <div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Current status <span class="req">*</span></label>

									<select class="form-control" name="current_status" id="current_status">

										<option value="">Select Current status</option>

										<option value="student">Student</option>

										<option value="worker">Worker</option>

									</select>

									<i class="ri-arrow-down-s-line"></i>

								</div>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Area of study <span class="req">*</span></label>

									<input type="text" class="form-control" name="area_of_study" id="area_of_study">

								</div>

							</div> -->



							<!-- <div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Degree level <span class="req">*</span></label>

									<select class="form-control" name="degree_level" id="degree_level">

										<option value="">Select Degree level</option>

										<option value="first class">First Class</option>

										<option value="second class">Second Class</option>

										<option value="third class">Third Class</option>

									</select>

									<i class="ri-arrow-down-s-line"></i>

								</div>

							</div> -->



							<div class="col-lg-12 col-md-12">

								<div class="form-group checkboxs">

									<input type="checkbox" name="mycheckbox" id="mycheckbox" value="0" required="required" /> <label>Read Instructions<span class="cum">*</span></label>



									<!-- <input type="checkbox" id="chb2">

									<p>

										By submitting this form, you agree to the <a href="terms-conditions.html">Terms &amp; Conditions</a> And <a href="privacy-policy.html">Privacy Policy</a> notice.

									</p> -->

								</div>

							</div>



							<div class="row">

								<div class="col-lg-2 col-md-2">

									<div class="form-group checkboxs">

										<strong>Captcha <span class="req">*</span></strong>

									</div>

								</div>



								<div class="col-lg-6 col-md-6">

									<div class="form-group checkboxs">

										<div class="g-recaptcha" data-sitekey="6LcwIJcoAAAAAHWA5hzVuHwZBU8Gmnb3yWs1NJR3"></div>

									</div>

								</div>

							</div>



							<div class="col-lg-12">

								<!-- <a href="#" class="default-btn">

									Submit application

									<i class="ri-arrow-right-line"></i>

								</a> -->

								<button type="submit" class="default-btn" name="generate" id="generate" value="Generate">Register<i class="ri-arrow-right-line"></i></button>



							</div>

						</div>

					</form>

				</div>

			</div>

		</section>

		<!-- End Candidates Resume Area -->



		<?php include('footer.php');

		$id = '0';

		if ($this->uri->segment(2) != " ") {

			$id = $this->uri->segment(2);

		}

		?>





		<script>



			$("#country").change(function() {

			$.ajax({

				type: "POST",

				url: "<?=base_url();?>admin/Ajax_controller/get_state_ajax",

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

					url: "<?=base_url();?>admin/Ajax_controller/get_city_ajax",

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

					url: "<?=base_url();?>web/Web_controller/get_course_stream",

					data: {

						'course': $("#course").val()

					},

					success: function(data) {

						console.log(data);

						// alert(data);

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



$( function() {

    $( ".datepicker" ).datepicker({

		format: 'dd-mm-yyyy',

		changeMonth:true,

		changeYear:true,

		maxDate: "-12Y",

		minDate: "-80Y",

		yearRange: "-100:-0"

	});

} );



	$(document).ready(function() {



		$.validator.addMethod("mobile", function(phone_number, element) {

                phone_number = phone_number.replace(/\s+/g, "");

                return phone_number.length > 9;

            }, "Please enter a valid mobile number ");



			$.validator.addMethod("textOnly", function(value, element) {

				if (value.trim() === "") {

					return true;

				}

				return /^[a-zA-Z\s]+$/.test(value);

			}, "Please enter valid board/university name");



			$.validator.addMethod("numberOnly", function(value, element) {

				if (value.trim() === "") {

					return true;

				}

				return /^[0-9]{1,4}$/.test(value);

			}, "Please enter valid 4-digit year of passing");





			// $.validator.addMethod("validPercentage", function(value, element) {

			// 	value = $.trim(value);

			// 	if (!$.isNumeric(value)) {

			// 		return false;

			// 	}

			// 	var percentage = parseFloat(value);

			// 	return percentage >= 0 && percentage <= 100;

			// }, "Please enter a valid percentage (0-100).");



			$.validator.addMethod("validPercentage", function(value, element) {

				if (value.trim() === "") {

					return true;

				}

				return /^(\d{1,2}(\.\d{1,2})?|100(\.0{1,2})?)$/.test(value);

			}, "Please enter a valid percentage");





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

            


			$.validator.addMethod("noSpaceatfirst", function (value, element) {
				return this.optional(element) || /^\s/.test(value) === false;
			}, "First Letter Can't Be Space!");
			
			$.validator.addMethod("alphabetsOnly", function(value, element) {
				return /^[a-zA-Z_ ]+$/.test(value);
			});


	$('#phd_entrance_form').validate({

		ignore: ":hidden:not(select)",

		rules: {

			

			student_name: {

				required: true,

				noHTMLtags: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,

			},

			photo_image: {

				required: true,

				noHTMLtags: true,

			},

			// passport_img: {

			// 	required: true,

			// 	noHTMLtags: true,

			// },

			father_name: {

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

			mobile: {

				required: true,

				mobile: true,

				minlength: 10,

				maxlength: 10,

				noHTMLtags: true,

			},

			email: {

				required:true,

				validate_email: true,

				noHTMLtags: true,
				noSpaceatfirst:true,

			},

			address: {

				required: true,

				noHTMLtags: true,
				noSpaceatfirst:true,

			},

			date_of_birth: {

				required: true,

				noHTMLtags: true,

			},

			gender: {

				required: true,

				noHTMLtags: true,

			},

			category:{

				required: true,

				noHTMLtags: true,

			},

			id_number:{

				required: true,	

				noHTMLtags: true,

			},

			id_type:{

				required: true,	

				noHTMLtags: true,

			},

			nationality:{

				required: true,	

				noHTMLtags: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,

			},

			noc:{

				required: function(element) {

					return $("#employment_details").val() === "Government Employee";

				},

			},

			state:{

				required: true,	

				noHTMLtags: true,

			},

			country:{

				required: true,	

				noHTMLtags: true,

			},

			city:{

				required: true,	

				noHTMLtags: true,

			},	

			pincode:{

				required: true,	

				number : true,

				maxlength:6,

				minlength:6,

				noHTMLtags: true,

			},

			course:{

				required: true,	

				noHTMLtags: true,

			},

			employment_details:{

				required: true,	

				noHTMLtags: true,

			},

			stream:{

				required: true,	

				noHTMLtags: true,

			},

			year_sem:{

				required: true,	

				noHTMLtags: true,

			},

			secondary_year:{

				required: true,

				numberOnly:true,	

				noHTMLtags: true,

			},

			secondary_board:{

				required: true,	

				textOnly:true,

				noHTMLtags: true,
				noSpaceatfirst:true,

			},

			secondary_percentage:{

				required: true,	

				validPercentage:true,

				noHTMLtags: true,

			},	

			secondary_marksheet:{

				required: true,	

				noHTMLtags: true,

			},

			sr_secondary_year:{

			// 	required: true,	

				numberOnly:true,

			// 	noHTMLtags: true,

			},

			sr_secondary_board:{

				// required: true,	

				textOnly:true,

				// noHTMLtags: true,
				noSpaceatfirst:true,

			},

			sr_secondary_percentage:{

				// required: true,	

				validPercentage:true,

				// noHTMLtags: true,

			},	

			// sr_secondary_marksheet:{

			// 	required: true,	

			// 	noHTMLtags: true,

			// },

			graduation_year:{

			// 	required: true,	

				numberOnly:true,



			// 	noHTMLtags: true,

			},

			graduation_board:{

				// required: true,	

				textOnly:true,

				// noHTMLtags: true,
				noSpaceatfirst:true,

			},

			graduation_percentage:{

				// required: true,

				validPercentage:true,	

				// noHTMLtags: true,

			},	

			// graduation_marksheet:{

			// 	required: true,	

			// 	noHTMLtags: true,

			// },

			post_graduation_year:{

			// 	required: true,	

				numberOnly:true,



			// 	noHTMLtags: true,

			},

			post_graduation_board:{

				// required: true,	

				textOnly:true,

				// noHTMLtags: true,
				noSpaceatfirst:true,

			},

			post_graduation_percentage:{

				// required: true,

				validPercentage:true,	

				// noHTMLtags: true,

			},	

			// post_graduation_marksheet:{

			// 	required: true,	

			// 	noHTMLtags: true,

			// },

			payment_mode:{

				required: true,	

				noHTMLtags: true,

			},

			

			// school:{

			// 	required: true,	

			// 	noHTMLtags: true,

			// },

			// year_of_completion:{

			// 	required: true,	

			// 	noHTMLtags: true,

			// },	

			// qualification:{

			// 	required: true,	

			// 	noHTMLtags: true,

			// },

			// current_status:{

			// 	required: true,	

			// 	noHTMLtags: true,

			// },

			// area_of_study:{

			// 	required: true,	

			// 	noHTMLtags: true,

			// },

			// degree_level:{

			// 	required: true,	

			// 	noHTMLtags: true,

			// },
			mphil_board:{
				noSpaceatfirst:true,
			},
			other_board:{
				noSpaceatfirst:true,
			},



		},

		messages: {

			student_name: {

				required: "Please enter student name",

				noHTMLtags:"HTML tags not allowed",
				noSpaceatfirst:"First letter can't be space",
				alphabetsOnly:'Student name must contain only alphabets',
			},

			photo_image: {

				required: "Please upload your photo",

				noHTMLtags:"HTML tags not allowed",

			},

			// passport_img: {

			// 	required: "Please upload passport or birth documentation",

			// 	noHTMLtags:"HTML tags not allowed!",

			// },

			father_name: {

				required: "Please enter father's name",

				noHTMLtags:"HTML tags not allowed",
				noSpaceatfirst:"First letter can't be space",
				alphabetsOnly:'Father name must contain only alphabets',
			},

			mother_name: {

				required: "Please enter mother's name",

				noHTMLtags:"HTML tags not allowed",
				noSpaceatfirst:"First letter can't be space",
				alphabetsOnly:'Mother name must contain only alphabets',
			},

			mobile: {

				required: "Please enter mobile number",

				mobile: "Please enter valid number",

				minlength: "Please enter 10 digit mobile number ",

				maxlength: "Please enter 10 digit mobile number",

				noHTMLtags:"HTML tags not allowed",

			},

			email: {

				required: "Please enter your email id",

				validate_email: "Please enter your valid email",

				noHTMLtags:"HTML tags not allowed",
				noSpaceatfirst:"First letter can't be space",

			},

			address: {

				required: "Please enter your current address",

				noHTMLtags:"HTML tags not allowed",
				noSpaceatfirst:"First letter can't be space",

			},

			date_of_birth: {

				required: "Please select your date of birth",

				noHTMLtags:"HTML tags not allowed",

			},

			gender: {

				required: "Please select gender",

				noHTMLtags:"HTML tags not allowed",

			},

			category: {

				required: "Please select category",

				noHTMLtags:"HTML tags not allowed",

			},

			id_number:{

				required: "Please enter ID number",

				noHTMLtags:"HTML tags not allowed",

			},

			id_type:{

				required: "Please select your id type",

				noHTMLtags:"HTML tags not allowed",

			},

			nationality:{

				required: "Please enter your nationality",

				noHTMLtags:"HTML tags not allowed",
				noSpaceatfirst:"First letter can't be space",
				alphabetsOnly:'Nationality must contain only alphabets',
			},

			noc:{

				required: "The NOC field is required for government employees",

			},

			state:{

				required: "Please select your state",

				noHTMLtags:"HTML tags not allowed",

			},

			country:{

				required: "Please select your country",

				noHTMLtags:"HTML tags not allowed",

			},

			city:{

				required: "Please select your city",

				noHTMLtags:"HTML tags not allowed",

			},

			pincode:{

				required: "Please enter your pin code",

				number:"Please enter valid pin code",

				maxlength:"Please enter 6 digit pin code",

				minlength:"Please enter 6 digit pin code",

				noHTMLtags:"HTML tags not allowed",

			},

			course:{

				required: "Please select course",

				noHTMLtags:"HTML tags not allowed",

			},

			employment_details:{

				required: "Please select employment details",

				noHTMLtags:"HTML tags not allowed",

			},

			stream:{

				required: "Please select your stream",

				noHTMLtags:"HTML tags not allowed",

			},

			year_sem:{

				required: "Please select semester/year",

				noHTMLtags:"HTML tags not allowed!",

			},

			secondary_year:{

				required: "Please enter your secondary year",

				numberOnly:"Please enter valid 4-digit year of passing",

				noHTMLtags:"HTML tags not allowed",

			},

			secondary_board:{

				required: "Please enter your secondary board",

				textOnly:"Please enter valid board/university name",

				noHTMLtags:"HTML tags not allowed",
				noSpaceatfirst:"First letter can't be space",

			},

			secondary_percentage:{

				required: "Please enter your secondary percentage",

				validPercentage:"Please enter a valid percentage",

				noHTMLtags:"HTML tags not allowed",

			},

			secondary_marksheet:{

				required: "Please upload your secondary marksheet",

				noHTMLtags:"HTML tags not allowed",

			},

			sr_secondary_year:{

			// 	required: "Please enter sr. secondary year",

				numberOnly:"Please enter valid 4-digit year of passing",



			// 	noHTMLtags:"HTML tags not allowed",

			},

			sr_secondary_board:{

				// required: "Please enter sr. secondary board",

				textOnly:"Please enter valid board/university name",

				// noHTMLtags:"HTML tags not allowed",
				noSpaceatfirst:"First letter can't be space",

			},

			sr_secondary_percentage:{

				// required: "Please enter your sr. secondary percentage",

				validPercentage:"Please enter a valid percentage",

				// noHTMLtags:"HTML tags not allowed",

			},

			// sr_secondary_marksheet:{

			// 	required: "Please upload your sr. secondary marksheet",

			// 	noHTMLtags:"HTML tags not allowed",

			// },

			graduation_year:{

			// 	required: "Please enter graduation year",

				numberOnly:"Please enter valid 4-digit year of passing",



			// 	noHTMLtags:"HTML tags not allowed",

			},

			graduation_board:{

				// required: "Please enter graduation university",

				textOnly:"Please enter valid board/university name",

				// noHTMLtags:"HTML tags not allowed",
				noSpaceatfirst:"First letter can't be space",

			},

			graduation_percentage:{

				// required: "Please enter graduation percentage",

				validPercentage:"Please enter a valid percentage",



				// noHTMLtags:"HTML tags not allowed",

			},

			// graduation_marksheet:{

			// 	required: "Please upload your graduation marksheet",

			// 	noHTMLtags:"HTML tags not allowed",

			// },

			post_graduation_year:{

			// 	required: "Please enter post graduation year",

				numberOnly:"Please enter valid 4-digit year of passing",



			// 	noHTMLtags:"HTML tags not allowed!",

			},

			post_graduation_board:{

				// required: "Please enter post graduation university",

				textOnly:"Please enter valid board/university name",

				// noHTMLtags:"HTML tags not allowed!",
				noSpaceatfirst:"First letter can't be space",

			},

			post_graduation_percentage:{

				// required: "Please enter post graduation percentage",

				validPercentage:"Please enter a valid percentage",



				// noHTMLtags:"HTML tags not allowed!",

			},

			// post_graduation_marksheet:{

			// 	required: "Please upload your post graduation marksheet",

			// 	noHTMLtags:"HTML tags not allowed!",

			// },
			payment_mode:{
				required: "Please select payment mode",
				noHTMLtags:"HTML tags not allowed",
			},
			mphil_board:{
				noSpaceatfirst:"First letter can't be space",
			},
			other_board:{
				noSpaceatfirst:"First letter can't be space",
			},

			// school:{

			// 	required: "Please enter school",

			// 	noHTMLtags:"HTML tags not allowed",

			// },

			// year_of_completion:{

			// 	required: "Please select your year of completion",

			// 	noHTMLtags:"HTML tags not allowed",

			// },

			// qualification:{

			// 	required: "Please enter your highest qualification",

			// 	noHTMLtags:"HTML tags not allowed",

			// },

			// current_status:{

			// 	required: "Please select your current status",

			// 	noHTMLtags:"HTML tags not allowed",

			// },

			// area_of_study:{

			// 	required: "Please enter your area of study",

			// 	noHTMLtags:"HTML tags not allowed",

			// },

			// degree_level:{

			// 	required: "Please select your degree level",

			// 	noHTMLtags:"HTML tags not allowed",

			// },

			

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



		$('#stream').on('change', function() {

			$('#stream').valid();

		});



		

		$('#gender').on('change', function() {

			$('#gender').valid();

		});



		



		$('#employment_details').on('change', function() {

		    // if($("#employment_details").val() == "Government Employee"){

			// 	$("#noc").prop("required", true);

			// }else{

			// 	$("#noc").prop("required", false);

			// }

			$("#phd_entrance_form").validate().element("#noc");

			$('#employment_details').valid();

		});



		$('#course').on('change', function() {

			$('#course').valid();

		});

		

		$('#year_sem').on('change', function() {

			$('#year_sem').valid();

		});



		$('#payment_mode').on('change', function() {

			$('#payment_mode').valid();

		});



		$('#category').on('change', function() {

			$('#category').valid();

		});







// $("#employment_details").change(function(){

// 	if($("#employment_details").val() == "Government Employee"){

// 		$("#noc").prop("required", true);

// 	}else{

// 		$("#noc").prop("required", false);

// 	}

// });

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



<script>

	$("#email").keyup(function() {

		if($("#email").val() != ''){

            $.ajax({

                type: "POST",

                url: "<?= base_url(); ?>admin/Ajax_controller/get_unique_email_id_ajax",

                data: {

                    'email': $("#email").val(),'id':'<?= $id ?>'},

                success: function(data) {

				console.log(data);

                    if (data == "0") {

                        $("#email_error").html('');

                        $("#submit").show();

                    } else {

                        $("#email_error").html('This email id is already added');

                        $("#submit").hide();

                    }

                },

                error: function(jqXHR, textStatus, errorThrown) {

                    console.log(textStatus, errorThrown);

                }

            });

		}

        });

		
$('#email').keyup(function(){
    this.value = this.value.toLowerCase();
});

</script>