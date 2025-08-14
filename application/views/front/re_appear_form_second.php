<?php include('header.php')?> <style>table {  font-family: arial, sans-serif;  border-collapse: collapse;  width: 100%;}td, th {  border: 1px solid #dddddd;  text-align: left;  padding: 8px;}tr:nth-child(even) {  background-color: #dddddd;}</style>
		<div class="page-title-area bg-14"> 
			<div class="container"> 
				<div class="page-title-content"> 
					<h2>Re-Appear Examination Form</h2> 
					<ul> 
						<li> 
							<a href="javascript:void(0);"> 
                            Examination  
							</a> 
						</li> 
						<li class="active">Re-Appear Examination Form</li> 
					</ul> 
				</div> 
			</div> 
		</div> 
		<?php if($this->input->post('enrollment_number') == ""){ ?> 
		<section class="costing-area pt-100 pb-70"> 
			<div class="container"> 
				<div class="row justify-content-center align-items-center">  
					<div class="col-lg-6 col-md-6"> 
                        <div class="single-costing-card"> 
                        <div class="admission_box">  
                            <form class="Enrollmentform" method="post" name="re_appear_form" id="re_appear_form" enctype="multipart/form-data"> 
								<div class="row">   
									<div class="col-md-12"> 
										<div class="personal_details"> 
											<h3>Enrollment Verification</h3>	 
											<small>Please provide your enrollment number</small>  
										</div> 
									</div> 
								</div> 
                                <br> 
                                <div class="form-group">  
									<label><b>Enter Your Enrollment Number</b><span class="req">*</span></label> 
									<input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter Your Enrollment Number">                                </div> 
                                <br>    
                                <div class="form-group"> 
                                    <div class="mt-1 ">  
										<button type="submit" class="default-btn2" name="generate" id="generate" value="Generate">Next</button> 
                                    </div> 
									<div class="pull-right"> 
									</div> 
                                </div> 
							</form> 
                        </div> 
					</div> 
				</div> 
			</div> 
		</div>  
	</section>  
	<?php }else {?>  
			<div class="container"> 
				<div class="candidates-resume-content"> 
					<form class="resume-info" id="admission_form" name="admission_form" enctype="multipart/form-data" method="post" onsubmit="return validateForm();">						<h3>Personal Details</h3>						<p><Small>Please provide your personal details</Small></p>						<div class="row">							<div class="col-lg-3 col-md-3">								<div class="form-group">									<label>Student Name <span class="req">*</span></label>									<input type="text" name="student_name" readonly id="student_name" class="form-control charector" placeholder="Student Full Name" value="<?php if(!empty($student)){ echo $student->student_name;}?>">								</div>							</div>							<div class="col-lg-3 col-md-3">								<div class="form-group">									<label>Father's Name <span class="req">*</span></label>									<input type="text" name="father_name" readonly id="father_name" class="form-control charector" placeholder="Fathers Name" value="<?php if(!empty($student)){ echo $student->father_name;}?>">								</div>
							</div>

							
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Mother's Name <span class="req">*</span></label>
									<input type="text" name="mother_name"  readonly id="mother_name" class="form-control charector" placeholder="Mothers Name" value="<?php if(!empty($student)){ echo $student->mother_name;}?>">
									<input type="hidden" name="enrollment_number" id="enrollment_number" class="form-control" placeholder="Mothers Name" value="<?php if(!empty($student)){ echo $student->enrollment_number;}?>">
								</div>
							</div>
							
				
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Date of Birth <span class="req">*</span></label>
									<input type="text" name="date_of_birth" readonly id="date_of_birth" class="form-control" placeholder="DD-MM-YY" value="<?php if(!empty($student)){ echo date("d/m/Y",strtotime($student->date_of_birth));}?>">
								</div>
							</div> 
						</div>

						<h3>Course/Programme Details</h3>
						<p><Small>Please enter course/programme details</Small></p>


						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Course<span class="req">*</span></label>
									<input type="text"  id="course_name" name="course_name" readonly class="form-control" value="<?php if(!empty($student)){ echo $student->print_name;}?>">
								</div>	
							</div>

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Stream <span class="req">*</span></label>
									<input type="text"  id="stream_name" name="stream_name" readonly class="form-control" value="<?php if(!empty($student)){ echo $student->stream_name;}?>">
								</div>
							</div>

							
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Semester/Year <span class="req">*</span></label>
									<select id="year_sem" name="year_sem" class="form-control" value=""> 										<option value="">Select Year/Sem</option> 										<?php for($p=1;$p<=8;$p++){?> 										<option value="<?=$p?>"><?=$p?></option> 										<?php }?>									</select>
								</div>
							</div>
							

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Number of Paper <span class="req">*</span></label>
									<select id="number_of_paper" name="number_of_paper" class="form-control">
										<option value="">Select number of paper</option>
										<?php for($p=1;$p<=7;$p++){?>
										<option value="<?=$p?>"><?=$p?></option>
										<?php }?>
									</select>
								</div>
							</div> 
						</div>




						<h3>Payment Details</h3>
						<p><Small>Pay fees in university account only other accounts fees will not be accept</Small></p>


						<div class="row">
							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Total Examination Fees <span class="req">*</span></label>
									<input placeholder="Total Examination Fees" type="text" id="total_examination_fees" name="total_examination_fees" class="form-control" value="300" readonly>
								</div>	
							</div>

							<div class="col-lg-3 col-md-3">
								<div class="form-group">
									<label>Exam Mode <span class="req">*</span></label>
									<select id="exam_mode_type" name="exam_mode_type" class="form-control">
										<option value="">Select Exam Mode</option>
										<option value="1">Offline</option>
										<option value="2">Online</option>
										<!--<option value="2">By Challan</option>
										-->
									</select>
								</div>	
							</div>
						</div>						 
						<div class="row">
						<div class="col-lg-3 col-md-3">
								<strong>Captcha <span class="req">*</span></strong>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group"> 
									<div class="g-recaptcha" data-sitekey="<?=GOOGLE_DATA_SITEKEY?>"></div> 
								</div>
							</div> 
							<div class="col-lg-12">
								<button type="submit" class="default-btn" name="register" id="register" value="register">
									Register
									<i class="ri-arrow-right-line"></i>
								</button>
							</div>
						</div>

					</form>
				</div>
			</div>
			
					<?php }?>
				<!-- </div>
			</div>
		</div>
	</div>
</div> -->


	
		<!-- End Costing Area -->
		
		<?php include('footer.php')?>


		<script>$("#number_of_paper").change(function(){	$("#total_examination_fees").val($(this).val()*300);});
	$(document).ready(function(){  
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
		$('#re_appear_form').validate({ 
			rules: { 
				enrollment_number: { 
					required: true,   
				},	 
				year_sem: { 
					required: true,   
				},	 
			}, 
			messages: { 
				enrollment_number: { 
					required: "Please enter enrollment number", 
				}, 
				year_sem: { 
					required: "Please select year/sem", 
				}, 
			}, 
			submitHandler: function (form) { 
				form.submit(); 
			}, 
		}); 
		}); 
</script>

<script> 
$("#fees_option").change(function(){
	var admission_fees = $("#admission_fees").val();
	admission_fees = admission_fees/2;
	var total = parseInt($("#late_fees").val())+parseInt(admission_fees);
	$("#total_admission_fees").val(total);
	
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

jQuery.validator.addMethod("subject", function(value, elem, param) {
   return $(".subject:checkbox:checked").length > 0;
},"You must select at least one!");
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


$("#admission_form").validate({
	ignore:[],
	rules: {
		student_name: {
			required: true,
			noHTMLtags: true,
		},
		father_name: {
			required: true,
			noHTMLtags: true,
		},
		mother_name: {
			required: true,
			noHTMLtags: true,
		},
		date_of_birth: {
			required: true,
			noHTMLtags: true,
		},
		year_sem: {
			required: true,
			noHTMLtags: true,
		},
		payment_mode: {
			required: true,
			noHTMLtags: true,
		},
		exam_mode_type: {
			required: true,
			noHTMLtags: true,
		},
		exam_type: {
			required: true,
			noHTMLtags: true,
		},
		number_of_paper: {
			required: true,
			noHTMLtags: true,
		},
		'subject[]': {
			required:true,
			minlength:1,
			noHTMLtags: true,
		},	
		stream_name:{
			required: true,
			noHTMLtags: true,
		},
		course_name:{
			required: true,
			noHTMLtags: true,
		},			
	},
	messages: {
		student_name: {
			required: "Please enter full name",
			noHTMLtags: "HTML tags not allowed",
		},
		father_name: {
			required: "Please enter father name",
			noHTMLtags: "HTML tags not allowed",
		},
		mother_name: {
			required: "Please enter mother name", 
			noHTMLtags: "HTML tags not allowed",
		},
		date_of_birth: {
			required: "Select date of birth",
			noHTMLtags: "HTML tags not allowed",
		},
		year_sem: {
			required: "Please select year/sem Name",
			noHTMLtags: "HTML tags not allowed!",
		},
		payment_mode: {
			required: "Please select payment mode",
			noHTMLtags: "HTML tags not allowed",
		},
		exam_mode_type: {
			required: "Please select exam mode",
			noHTMLtags: "HTML tags not allowed",
		},
		exam_type: {
			required: "Please select exam type",
			noHTMLtags: "HTML tags not allowed",
		},
		number_of_paper: {
			required: "Please select number of paper",
			noHTMLtags: "HTML tags not allowed",
		},
		'subject[]': {
			required:"Please select subject",
			minlength:"Please select subject"
		},
		stream_name:{
			required:"Please enter stream",
			noHTMLtags: "HTML tags not allowed",
		},
		course_name:{
			required:"Please enter course",
			noHTMLtags: "HTML tags not allowed",
		},	
	}, 
	submitHandler: function(form){
		form.submit();
	} 
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



		