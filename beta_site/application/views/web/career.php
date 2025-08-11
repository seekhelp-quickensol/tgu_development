<?php include('header.php');?>
			<!-- <div class="header_cc_area" style="background-image:url('<?=base_url();?>images/header_area.jpg')">
				<div class="container">
					<div class="row">
					<div class="col-lg-12 col-md-12">
						<h1>Career</h1>
						<p>Home / Career</p>
					</div>
						</div>
				</div>
			</div> -->

			<section>

	<div class="header_cc_area slide-bg">
		<div class="container  overlay-about" style="width: 100%;">
		<p>Home / Career</p>

			<div class=" container-fluid text-center inner-heading-content">
				<h2 class="main-heading-inner-pages border-b border">Career</h2>
				<p> We believe in providing education that cultivates creative understanding </p>

			</div>

		</div>
	</div>
</section>

				<div class="clearfix"></div>
				<section class="c-padding inner-bg-2">
			<div class="uni_mainWrapper container box-shadow-global">
				<div class="contact-service contact-us-bg">
					<div class="">
						<div class="contact-service ">
							<div class="contact-service contact-us-bg">
						<div class="col-md-12">
							<form method="post" name="enquiry_form" id="enquiry_form" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12">
										<div class="personal_details">
											<h2 class="title">Apply here</h2>
											<small>Start building Your future</small>
											<hr>
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-6">
										<div class="form-group">
											<label>Name<span class="req">*</span></label>
											<input type="text" name="name" id="name" required class="form-control charector" placeholder="Enter Your Name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Mobile Number<span class="req">*</span></label>
											<input type="text" name="mobile_number" id="mobile_number" required class="form-control number_only" placeholder="Enter Your Mobile Number">
											<div id="mobile_otp_error"></div>
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-6">
										<div class="form-group">
											<label>Email<span class="req">*</span></label>
											<input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email">
										</div>
									</div>
									<div class="col-lg-6">
									    <div class="form-group">
											<label>Applying for Position<span class="req">*</span></label>
											<input type="text" name="position" id="position" class="form-control" placeholder="Enter Your Position">
										</div>
									</div>
								</div>
							
								<div class="row edu">
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Qualification<span class="req">*</span></label>
											<input type="text" name="last_qualification" id="last_qualification" class="form-control" placeholder="Enter Your Last Qualification">
										</div>
									</div>
									<div class="col-md-6">
									    <div class="form-group">
											<label>Work Experience<span class="req">*</span></label>
											<input type="text" name="work_experience" id="work_experience" class="form-control" placeholder="Enter Your Work Experience">
										</div>
									</div>
								</div>
								
								<div class="row edu">
									<div class="col-md-6">
										<div class="form-group">
										<label>Please select presently working*</label>
										
										<select class="form-control" name="present_working" id="present_working">
                                            <option value="">Please select Presently working</option>
                                            <option value="yes" >Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        </div>
										</div>
										<div class="col-lg-6">
										    <div class="form-group">
											<label>Upload CV<span class="req">*</span></label>
											<input type="file" name="userfile" id="userfile" class="form-control">
										</div>
										</div>
										
									</div>
									<div class="row edu">
									<div class="col-md-6">
										<div class="form-group">
										<label>State<span class="req">*</span></label>
										<select class="form-control" name="state" id="state">
                                            <option value="">Select State</option>
                                            <?php if(!empty($state)){ foreach($state as $state_result){?>
                                            <option value="<?=$state_result->name?>" ><?=$state_result->name?></option>
                                        <?php }}?> 
                                        </select>
                                        </div>
										</div>
										<div class="col-lg-6">
										    <div class="form-group">
											<label>Full Address<span class="req">*</span></label>
											<input type="text" name="full_address" id="full_address" class="form-control">
										</div>
										</div>
										
									</div>
									<!--<div class="col-md-6">-->
									<!--    <div class="form-group">-->
									<!--		<label>Upload CV</label>-->
									<!--		<input type="file" name="userfile" id="userfile" class="form-control">-->
									<!--	</div>-->
									<!--</div>-->
									<div class="row edu">
    									<div class="col-md-12">
    										<strong>Captcha <span class="req">*</span></strong>
    									</div>
    									<div class="col-md-6">
    										<div class="form-group">
    											
    											<div class="g-recaptcha" data-sitekey="<?=GOOGLE_DATA_SITEKEY?>"></div>
    									
    										</div>
    									</div>
    								</div>
    								<div class="row">
    									<div class="col-md-12 edu">
    										<div class="form-group">
    											<label></label>
    											<button type="submit" class="btn btn-primary czzzz" name="generate" id="generate" value="Generate">Submit</button>
    											<div class="pull-right">
    											</div>
    										</div>
    									</div>	
    								</div> 
    								
								</div>
								<div class="clearfix"></div>
								
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
                        </div>
				</div>
			</div>
				</section>
	
	<?php include('footer.php');?>
	<script>
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

	$('#enquiry_form').validate({
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
			query: {
				required: true,
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
				minlength: "Please enter 10 gigit mobile number",
				maxlength: "Please enter 10 gigit mobile number",
				noHTMLtags:"HTML tags not allowed!",
			},
			email: {
				required: "Please enter your email",
				validate_email: "Please enter your valid email",
				noHTMLtags:"HTML tags not allowed!",
			},
			query: {
				required: "Please enter your query",
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

	</script>