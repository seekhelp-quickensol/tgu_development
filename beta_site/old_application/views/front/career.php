<?php include('header.php')?>

		
		<!-- Start Page Title Area -->
		<div class="page-title-area bg-15">
			<div class="container">
				<div class="page-title-content">
					<h2>Career</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>

						<li class="active">Career</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Find A Courses Area -->
		<section class="carrer-form-area pt-100 pb-100">
			<div class="container">
				<form class="career-form-main mt-0" method="post" name="career_form" id="career_form" enctype="multipart/form-data" onsubmit="return validateForm();">
					<div class="text-center mb-5">
					<h3 class="">Apply Here</h3>
					<small>Start building Your future</small>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="name">Name<span class="req">*</span></label>
								<input class="form-control" name="name" id="name" type="text" autocomplete="off" placeholder="Enter Your Name">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Mobile Number<span class="req">*</span></label>
								<input class="form-control" type="text" name="mobile_number" autocomplete="off" id="mobile_number" placeholder="Enter Your Mobile Number">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label>Email<span class="req">*</span></label>	
								<input class="form-control" type="text" name="email" id="email" autocomplete="off" placeholder="Enter Your Email">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label>Applying for Position<span class="req">*</span></label>
								<input class="form-control" type="text" name="position" id="position" autocomplete="off" placeholder="Enter Your Position">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label>Last Qualification<span class="req">*</span></label>
								<input class="form-control" type="text" name="last_qualification" autocomplete="off" id="last_qualification" placeholder="Enter Your Last Qualification">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label>Work Experience<span class="req">*</span></label>
								<input class="form-control" type="text" name="work_experience" id="work_experience" autocomplete="off" placeholder="Enter Your Work Experience">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label>Please select presently working*</label>
							<select class="form-control" name="present_working" id="present_working">
									<!-- <option value="1">Category course</option>	
									<option value="2">Web Design</option>
									<option value="3">Web Developement</option>
									<option value="4">Graphic Design</option>
									<option value="5">App Developement</option> -->
									<option value="">Please select Presently working</option>
                                        <option value="yes" >Yes</option>
                                        <option value="no">No</option>
								</select>
								<i class="ri-arrow-down-s-line"></i>
							</div>
						</div>

						<div class="col-lg-6 col-md-6" id="job_title">
							<div class="form-group">
							<label>Present Job Title <span class="req">*</span></label>
								<input class="form-control" type="text" name="present_job_title" id="present_job_title" autocomplete="off" placeholder="Enter Your Present Job Title">
							</div>
						</div>

						<div class="col-lg-6 col-md-6" id="job_loc">
							<div class="form-group">
							<label>Present Job Location <span class="req">*</span></label>
								<input class="form-control" type="text" name="present_job_location" id="present_job_location" autocomplete="off" placeholder="Enter Your Present Job Location">
							</div>
						</div>

						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label>Upload CV<span class="req">*</span></label>
								<input class="form-control" type="file" name="userfile" id="userfile">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label>State<span class="req">*</span></label>
							<select class="form-control select2_single" name="state" id="state">
                                <option value="">Select State</option>
                                <?php if(!empty($state)){ foreach($state as $state_result){?>
                                	<option value="<?=$state_result->name?>" ><?=$state_result->name?></option>
                                <?php }}?> 
                            </select>
								<i class="ri-arrow-down-s-line"></i>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label>Full Address<span class="req">*</span></label>
								<input class="form-control" type="text" autocomplete="off" name="full_address" id="full_address">
							</div>
						</div>

						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label>Captcha<span class="req">*</span></label>
								<div class="g-recaptcha" data-sitekey="<?=GOOGLE_DATA_SITEKEY?>"></div>
							</div>
						</div>

						
						<div class="form-group">
							<div class="mt-1 ">
								<!-- <a href="javascript:void(0);" class="default-btn2">Submit</a> -->
								<button type="submit" class="default-btn2" name="generate" id="generate" value="Generate">Submit</button>
							</div>
                        </div>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
		</section>
		<!-- End Find A Courses Area -->

		
<?php include('footer.php') ?>

<script>

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
            

	$('#career_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			name: {
				required: true,
				noHTMLtags: true,
			},
			mobile_number: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10,
				noHTMLtags: true,
			},
			email: {
				required:true,
				validate_email: true,
				noHTMLtags: true,
			},
			last_qualification: {
				required: true,
				noHTMLtags: true,
			},
			work_experience: {
				required: true,
				noHTMLtags: true,
			},
			userfile:{
				required: true,
				noHTMLtags: true,
			},
			present_working:{
				required: true,	
				noHTMLtags: true,
			},
			present_job_title:{
				required: true,	
				noHTMLtags: true,
			},
			present_job_location:{
				required: true,	
				noHTMLtags: true,
			},
			state:{
				required: true,	
				noHTMLtags: true,
			},
			full_address:{
				required: true,	
				noHTMLtags: true,
			},
			position:{
				required: true,	
				noHTMLtags: true,
			},
		},
		messages: {
			name: {
				required: "Please enter your name",
				noHTMLtags:"HTML tags not allowed!",
			},
			mobile_number: {
				required: "Please enter mobile number",
				number: "Please enter valid number",
				minlength: "Please enter 10 digit mobile number",
				maxlength: "Please enter 10 digit mobile number",
				noHTMLtags:"HTML tags not allowed!",
			},
			email: {
				required: "Please enter your email",
				validate_email: "Please enter your valid email",
				noHTMLtags:"HTML tags not allowed!",
			},
			last_qualification: {
				required: "Please enter your last qualification",
				noHTMLtags:"HTML tags not allowed!",
			},
			work_experience: {
				required: "Please enter your work experience",
				noHTMLtags:"HTML tags not allowed!",
			},
			userfile: {
				required: "Please upload cv",
				noHTMLtags:"HTML tags not allowed!",
			},
			present_working:{
				required: "Please select working status",
				noHTMLtags:"HTML tags not allowed!",
			},
			present_job_title:{
				required: "Please enter present job title",
				noHTMLtags:"HTML tags not allowed!",
			},
			present_job_location:{
				required: "Please enter present job location",
				noHTMLtags:"HTML tags not allowed!",
			},
			state:{
				required: "Please select your state",
				noHTMLtags:"HTML tags not allowed!",
			},
			full_address:{
				required: "Please enter your full address",
				noHTMLtags:"HTML tags not allowed!",
			},
			position:{
				required: "Please enter position name",
				noHTMLtags:"HTML tags not allowed!",
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


$('#state').on('change', function() {
	$('#state').valid();
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


<script>
$(document).ready(function(){
	$("#job_loc ,#job_title").hide();
    // Add change event listener to the dropdown
    $("#present_working").change(function(){
        
		

        var selectedValue = $(this).val();

        // Check if the selected value is "yes" or "no"
        if(selectedValue === "yes") {
            // If "yes" is selected, show the fields
            $("#job_loc ,#job_title").show();
        } else {
            // If "no" is selected, hide the fields
            $("#job_loc ,#job_title").hide();
        }
    });
});
</script>