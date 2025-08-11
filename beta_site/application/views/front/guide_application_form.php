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
					<h2>Application For Guide/Supervisors</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>
						<li class="active">Research</li>
						<li class="active"> Guide/Supervisors</li>
						<li class="active">Application For Guide/Supervisors</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

	

		<section>
            <!-- <div class="container">

            </div> -->

			<section class="candidates-resume-area ptb-100">
			<div class="container">
				<div class="candidates-resume-content">
					<form class="resume-info" method="post" name="guide_application_form" id="guide_application_form" enctype="multipart/form-data" onsubmit="return validateForm();">
						
						<h3>Personal Details</h3>
						<p><small>Please provide your personal details</small></p>

						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
								<label>Name (Mr./Ms.) <span class="req">*</span></label>
								<input type="text" name="full_name" id="full_name" class="form-control charector" placeholder="Full Name">
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
								<label>Son/Daughter of <span class="req">*</span></label>
								<input type="text" name="son_of" id="son_of" class="form-control charector" placeholder="Son/Daughter of">

								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Date of Birth <span class="req">*</span></label>
									<div class="input-group date" id="datetimepicker">
										<input type="text" class="form-control datepicker" name="date_of_birth" id="date_of_birth" autocomplete="off">
										<span class="input-group-addon"></span>
										<i class="bx bx-calendar"></i>
									</div>	
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Phone Number</label>
									<input type="text" class="form-control" name="phone_number" id="phone_number" maxlength="10" minlength="10">
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Mobile Number <span class="req">*</span></label>
									<input type="text" class="form-control" name="mobile" id="mobile" maxlength="10" minlength="10">
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Email ID <span class="req">*</span></label>
									<input type="email" class="form-control" name="email" id="email">
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Gender <span class="req">*</span></label>
									<select id="gender" name="gender" class="form-control select2_single">
										<option value="">Select Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Transgender">Transgender</option>
									</select>
								</div>
							</div>


							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label for="img">Photo <span class="req">*</span></label>
									<input type="file" class="form-control" id="photo" name="photo" accept="image/*">
								</div>
							</div>


							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Signature <span class="req">*</span></label>
									<input type="file" name="signature" id="signature" class="form-control">
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Correspondence Address <span class="req">*</span></label>
									<input type="text" class="form-control rules" name="address" id="address" placeholder="Correspondence Address">
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
									<input class="form-control number_only"  name="pincode" id="pincode">
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Designation<span class="req">*</span></label>
									<input type="text" class="form-control rules" name="designation" id="designation" placeholder="Designation">
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Area of Specialization<span class="req">*</span></label>
									<input type="text" class="form-control rules" name="specilisation" id="specilisation" placeholder="Area of Specialization">
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Remark</label>
									<input type="text" class="form-control rules" name="remark" id="remark" placeholder="Remark">
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Area of Research & Development<span class="req">*</span></label>
									<input type="text" class="form-control rules" name="research_area" id="research_area" placeholder="Area of Research & Development">

								</div>
							</div>
							

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
								<label>Employment Details <span class="req">*</span></label>
								<select class="form-control select2_single" name="employement_type" id="employement_type">
									<option value="">Select Employment Type</option>
									<option value="Government Employee">Government Employee</option>
									<option value="Private Sector Employee">Private Sector Employee</option>
									<option value="Not Working">Not Working</option>
								</select>
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Work Experience <span class="req">*</span></label>
									<input type="text" class="form-control rules" name="work_experience" id="work_experience" placeholder="Work Experience">
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Present Working <span class="req">*</span></label>
									<input type="text" class="form-control rules" name="present_working" id="present_working" placeholder="Present Working">
								</div>
							</div>
						</div>
							
						<h3>Details of the Educational Progress of the Applicant</h3>
						<p><small>Please enter educational details</small></p>

						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>10th Year of Passing<span class="req">*</span></label>
									<input type="text" required name="secondary_year" id="secondary_year" class="form-control" maxlength="4" placeholder="Secondary Year">
								</div>
							</div>

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University<span class="req">*</span></label>
									<input type="text" name="secondary_university" id="secondary_university" class="form-control" placeholder="Secondary Board">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Subject Studied<span class="req">*</span></label>
									<input type="text" name="secondary_subject" id="secondary_subject" class="form-control" placeholder="Subject Studied">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Marksheet<span class="req">*</span></label>
									<input type="file" name="secondary_subject_marksheet" id="secondary_subject_marksheet" class="form-control">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>12th Year of Passing <span class="req">*</span></label>
									<input type="text" name="sr_secondary_year" id="sr_secondary_year" class="form-control" maxlength="4" placeholder="Sr. Secondary Year">
								</div>
							</div>

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University <span class="req">*</span></label>
									<input type="text" name="sr_secondary_university" id="sr_secondary_university" class="form-control" placeholder="Name of the School/Board/University">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Subject Studied <span class="req">*</span></label>
									<input type="text" name="sr_secondary_subject" id="sr_secondary_subject" class="form-control" placeholder="Subject Studied">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Marksheet<span class="req">*</span></label>
									<input type="file" name="sr_secondary_subject_marksheet" id="sr_secondary_subject_marksheet" class="form-control">
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Graduation Year of Passing <span class="req">*</span></label>
									<input type="text" name="graduation_year" id="graduation_year" class="form-control" maxlength="4" placeholder="Graduation Year">
								</div>
							</div>

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University <span class="req">*</span></label>
									<input type="text" name="graduation_university" id="graduation_university" class="form-control" placeholder="Graduation University">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Subject Studied <span class="req">*</span></label>
									<input type="text" name="graduation_subject" id="graduation_subject" class="form-control" placeholder="Subject Studied">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Marksheet<span class="req">*</span></label>
									<input type="file" name="graduation_subject_marksheet" id="graduation_subject_marksheet" class="form-control">
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Post Graduation Year of Passing</label>
									<input type="text" name="post_graduation_year" id="post_graduation_year" class="form-control" maxlength="4" placeholder="Post Graduation Year">
								</div>
							</div>

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University</label>
									<input type="text" name="post_graduation_university" id="post_graduation_university" class="form-control" placeholder="Post Graduation University">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Subject Studied</label>
									<input type="text" name="post_graduation_subject" id="post_graduation_subject" class="form-control" placeholder="Subject Studied">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Marksheet</label>
									<input type="file" name="post_graduation_subject_marksheet" id="post_graduation_subject_marksheet" class="form-control">
								</div>
							</div>
						</div>



						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Ph.D Year of Passing</label>
									<input type="text" name="phd_year" id="phd_year" class="form-control" maxlength="4" placeholder="Ph.D Year of Passing">
								</div>
							</div>

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University</label>
									<input type="text" name="phd_university" id="phd_university" class="form-control" placeholder="Ph.D University">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Subject Studied </label>
									<input type="text" name="phd_subject" id="phd_subject" class="form-control" placeholder="Subject Studied">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Degree</label>
									<input type="file" name="phd_subject_marksheet" id="phd_subject_marksheet" class="form-control">
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Any Other Qualification Year of Passing</label>
									<input type="text" name="other_qualification_year" id="other_qualification_year" class="form-control" maxlength="4" placeholder="Other Qualification Year of Passing">
								</div>
							</div>

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University</label>
									<input type="text" name="other_qualification_university" id="other_qualification_university" class="form-control" placeholder="Name of the School/Board/University">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Subject Studied</label>
									<input type="text" name="other_qualification_subject" id="other_qualification_subject" class="form-control" placeholder="Other Qualification Subject">
								</div>
							</div>
						
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Certificate/Degree</label>
									<input type="file" name="other_qualification_subject_marksheet" id="other_qualification_subject_marksheet" class="form-control">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Biodata*</label>
									<input type="file" name="biodata" id="biodata" class="form-control">
								</div>
							</div>

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Aadhar Card*</label>
									<input type="file" name="aadhar_card" id="aadhar_card" class="form-control">
								</div>
							</div>
						
						</div>
					
						<hr>

						<div class="row">
							<div class="col-md-12 col-lg-12 terms">
								<table class="detailTable" cellspacing="5" cellpadding="5">
									<tr>
										<td>
											<b>Declaration:</b>
											<br><br>
											<p>By Guide</p>
											<b>I <span id="dec"></span> son/daughter of <span id="son_of_val"> </span> have read & hereby certify that the information given in the application is complete and accurate to the best of my knowledge.</b>
											<br><br>
											<p align="justify">I understand all the rules and regulations laid down by the university and agree that misrepresentation or omission of the facts will justify that denial of enrollment, cancelation of enrollment. I will follow all the rules and reguations stated under UGC Norms and The Global University</p>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<hr>
						<div class="col-lg-12 col-md-12">
							<div class="form-group checkboxs">
								<input type="checkbox" name="mycheckbox" id="mycheckbox" value="0" required="required" /> <label>I Agree to the declaration<span class="req">*</span></label>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-2 col-md-2">
								<div class="form-group checkboxs">
									<strong>Captcha <span class="req">*</span></strong>
								</div>
							</div>

							<div class="col-lg-6 col-md-6">
								<div class="form-group"> 
									<div class="g-recaptcha" data-sitekey="<?=GOOGLE_DATA_SITEKEY?>"></div> 
								</div>
							</div>  
						</div>

						<div class="col-lg-12">
							<button type="submit" class="default-btn" name="generate" id="generate" value="Generate">Register<i class="ri-arrow-right-line"></i></button>
						</div>
					</form>
				</div>
			</div>
		</section>

        </section>

		<?php include('footer.php');?>



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
				// if (value.trim() === "") {
				// 	return true;
				// }
			// 	return /^(\d{1,2}(\.\d{1,2})?|100(\.0{1,2})?)$/.test(value);
			// }, "Please enter a valid percentage");


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
            
	$('#guide_application_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			full_name: {
				required: true,
				noHTMLtags: true,
			},
			son_of: {
				required: true,
				noHTMLtags: true,
			},
			date_of_birth: {
				required: true,
				noHTMLtags: true,
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
			},
			gender: {
				required: true,
				noHTMLtags: true,
			},
			photo: {
				required: true,
				noHTMLtags: true,
			},
			signature: {
				required: true,
				noHTMLtags: true,
			},
			address: {
				required: true,
				noHTMLtags: true,
			},
			country:{
				required: true,	
				noHTMLtags: true,
			},
			state:{
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
			specilisation: {
				required: true,
				noHTMLtags: true,
			},
			research_area:{
				required: true,
				noHTMLtags: true,
			},
			employement_type:{
				required: true,	
				noHTMLtags: true,
			},
			work_experience:{
				required: true,	
				noHTMLtags: true,
			},
			present_working:{
				required: true,	
				noHTMLtags: true,
			},
			secondary_year:{
				required: true,	
				numberOnly:true,
				noHTMLtags: true,
			},
			secondary_university:{
				required: true,	
				textOnly:true,
				noHTMLtags: true,
			},
			secondary_subject:{
				required: true,	
				noHTMLtags: true,
			},
			secondary_subject_marksheet:{
				required: true,	
				noHTMLtags: true,
			},
			sr_secondary_year:{
			// 	required: true,
				numberOnly:true,

			// 	noHTMLtags: true,
			},
			sr_secondary_university:{
				// required: true,	
				textOnly:true,
				// noHTMLtags: true,
			},
			// sr_secondary_subject:{
			// 	required: true,	
			// 	noHTMLtags: true,
			// },	
			// sr_secondary_subject_marksheet:{
			// 	required: true,	
			// 	noHTMLtags: true,
			// },
			graduation_year:{
			// 	required: true,
				numberOnly:true,

			// 	noHTMLtags: true,
			},
			graduation_university:{
				// required: true,	
				textOnly:true,
				// noHTMLtags: true,
			},
			// graduation_subject:{
			// 	required: true,	
			// 	noHTMLtags: true,
			// },	
			// graduation_subject_marksheet:{
			// 	required: true,	
			// 	noHTMLtags: true,
			// },
			post_graduation_year:{
			// 	required: true,	
				numberOnly:true,

			// 	noHTMLtags: true,
			},
			post_graduation_university:{
			// 	required: true,	
				textOnly:true,
			// 	noHTMLtags: true,
			},
			// post_graduation_subject:{
			// 	required: true,	
			// 	noHTMLtags: true,
			// },
			// post_graduation_subject_marksheet:{
			// 	required: true,	
			// 	noHTMLtags: true,
			// },
			phd_year:{
			// 	required: true,	
				numberOnly:true,

			// 	noHTMLtags: true,
			},
			phd_university:{
			// 	required: true,	
				textOnly:true,
			// 	noHTMLtags: true,
			},	
			// phd_subject:{
			// 	required: true,	
			// 	noHTMLtags: true,
			// },
			// phd_subject_marksheet:{
			// 	required: true,	
			// 	noHTMLtags: true,
			// },
			biodata:{
				required: true,	
				noHTMLtags: true,
			},
			aadhar_card:{
				required: true,	
				noHTMLtags: true,
			},
			designation:{
				required: true,	
				noHTMLtags: true,
			}
		},
		messages: {
			full_name: {
				required: "Please enter name",
				noHTMLtags:"HTML tags not allowed",
			},
			son_of: {
				required: "Please enter son/daughter of",
				noHTMLtags:"HTML tags not allowed",
			},
			date_of_birth: {
				required: "Please select date of birth",
				noHTMLtags:"HTML tags not allowed",
			},
			mobile: {
				required: "Please enter mobile number",
				mobile: "Please enter valid mobile number",
				minlength: "Please enter 10 digit mobile number ",
				maxlength: "Please enter 10 digit mobile number",
				noHTMLtags:"HTML tags not allowed",
			},
			gender: {
				required: "Please select gender",
				noHTMLtags:"HTML tags not allowed",
			},
			email: {
				required: "Please enter email",
				validate_email: "Please enter valid email",
				noHTMLtags:"HTML tags not allowed",
			},
			photo: {
				required: "please upload your photo",
				noHTMLtags:"HTML tags not allowed",
			},
			signature: {
				required: "please upload your signature",
				noHTMLtags:"HTML tags not allowed",
			},
			address: {
				required: "Please enter correspondence address",
				noHTMLtags:"HTML tags not allowed",
			},
			country:{
				required: "Please select country",
				noHTMLtags:"HTML tags not allowed",
			},
			state:{
				required: "Please select state",
				noHTMLtags:"HTML tags not allowed",
			},
			city:{
				required: "Please select city",
				noHTMLtags:"HTML tags not allowed",
			},
			pincode:{
				required: "Please enter pincode",
				number:"Please enter valid pincode",
				maxlength:"Please enter valid pincode",
				minlength:"Please enter valid pincode",
				noHTMLtags:"HTML tags not allowed!",
			},
			specilisation: {
				required: "Please enter area of specialization",
				noHTMLtags:"HTML tags not allowed",
			},
			research_area: {
				required: "Please enter area of research",
				noHTMLtags:"HTML tags not allowed",
			},
			employement_type:{
				required: "Please select employement type",
				noHTMLtags:"HTML tags not allowed",
			},
			work_experience:{
				required: "Please enter work experience",
				noHTMLtags:"HTML tags not allowed",
			},
			present_working:{
				required: "Please enter present working",
				noHTMLtags:"HTML tags not allowed",
			},
			secondary_year:{
				required: "Please enter details",
				numberOnly:"Please enter valid 4-digit year of passing",

				noHTMLtags:"HTML tags not allowed",
			},	
			secondary_university:{
				required: "Please enter details",
				textOnly:"Please enter valid board/university name",
				noHTMLtags:"HTML tags not allowed",
			},
			secondary_subject:{
				required: "Please enter details",
				noHTMLtags:"HTML tags not allowed",
			},
			secondary_subject_marksheet:{
				required: "Please upload marksheet",
				noHTMLtags:"HTML tags not allowed",
			},
			sr_secondary_year:{
			// 	required: "Please enter details",
				numberOnly:"Please enter valid 4-digit year of passing",
			// 	noHTMLtags:"HTML tags not allowed",
			},
			sr_secondary_university:{
				// required: "Please enter details",
				textOnly:"Please enter valid board/university name",
				// noHTMLtags:"HTML tags not allowed",
			},
			// sr_secondary_subject:{
			// 	required: "Please enter details",
			// 	noHTMLtags:"HTML tags not allowed",
			// },
			// sr_secondary_subject_marksheet:{
			// 	required: "Please upload marksheet",
			// 	noHTMLtags:"HTML tags not allowed",
			// },
			graduation_year:{
			// 	required: "Please enter details",
				numberOnly:"Please enter valid 4-digit year of passing",
			// 	noHTMLtags:"HTML tags not allowed",
			},
			graduation_university:{
				// required: "Please enter details",
				textOnly:"Please enter valid board/university name",
				// noHTMLtags:"HTML tags not allowed",
			},
			// graduation_subject:{
			// 	required: "Please enter details",
			// 	noHTMLtags:"HTML tags not allowed",
			// },
			// graduation_subject_marksheet:{
			// 	required: "Please upload marksheet",
			// 	noHTMLtags:"HTML tags not allowed",
			// },
			post_graduation_year:{
			// 	required: "Please enter details",
				numberOnly:"Please enter valid 4-digit year of passing",
			// 	noHTMLtags:"HTML tags not allowed",
			},
			post_graduation_university:{
			// 	required: "Please enter details",
				textOnly:"Please enter valid board/university name",
			// 	noHTMLtags:"HTML tags not allowed",
			},
			// post_graduation_subject:{
			// 	required: "Please enter details",
			// 	noHTMLtags:"HTML tags not allowed",
			// },
			// post_graduation_subject_marksheet:{
			// 	required: "Please upload marksheet",
			// 	noHTMLtags:"HTML tags not allowed",
			// },
			phd_year:{
			// 	required: "Please enter details",
				numberOnly:"Please enter valid 4-digit year of passing",

			// 	noHTMLtags:"HTML tags not allowed",
			},
			phd_university:{
			// 	required: "Please enter details",
				textOnly:"Please enter valid board/university name",
			// 	noHTMLtags:"HTML tags not allowed",
			},
			// phd_subject:{
			// 	required: "Please enter details",
			// 	noHTMLtags:"HTML tags not allowed",
			// },
			// phd_subject_marksheet:{
			// 	required: "Please upload degree",
			// 	noHTMLtags:"HTML tags not allowed",
			// },
			biodata:{
				required: "Please upload your biodata",
				noHTMLtags:"HTML tags not allowed",
			},
			aadhar_card:{
				required: "Please upload your aadhar card",
				noHTMLtags:"HTML tags not allowed",
			},
			designation:{
				required: "Please enter designation",
				noHTMLtags:"HTML tags not allowed",
			}
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

			
		$('#gender').on('change', function() {
			$('#gender').valid();
		});

		$('#employement_type').on('change', function() {
			$('#employement_type').valid();
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