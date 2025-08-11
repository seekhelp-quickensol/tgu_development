<?php include("header.php");?>

<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">

<style>

	

</style>

<div class="header_cc_area" style="background-image:url('<?=base_url();?>images/header_area.jpg')">

	<div class="container">

		<div class="row">

			<h1>CBD/Grievances</h1>

			<p>Home / CBD/Grievances</p>

		</div>

	</div>

</div>

<div class="uni_mainWrapper">

	<div class="container">

		<div class="row">	

			<div class="container">

				<div class="online_wrapper">

					<div id="exTab3" class="container">	

						<ul  class="nav nav-pills">

							<li class="active"><a  href="#1b" data-toggle="tab">Whom to approach?</a></li>

							<li><a href="#2b" data-toggle="tab">About</a></li>

						</ul>



						<div class="tab-content clearfix">

							<div class="tab-pane active" id="1b">

								<div class="admission_div whom_approach_div">

									<form method="post" name="admission_form" id="admission_form" enctype="multipart/form-data">

										<div class="row">

											<div class="col-md-12">

												<div class="common_details">

													<div class="col-md-12">

														<h3>Whom to Approach?</h3>

														<small>In Case of any such incident, Kindly make contact on (Mob. +91-7042550366) and register a Complaint or Register it Online Here.</small>

													</div>

													<div class="clearfix"></div>

												</div>

											</div>

											

										</div>

										<div class="row"> 
											<div class="col-md-12">
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label>Student / Teacher / Non-Teaching Staff/Others <span class="req">*</span></label> 
														<select name="student_teacher" id="student_teacher" class="form-control charector">

															<option value="" >Please Select</option> 
															<option value="Student">Student</option> 
															<option value="Teacher">Teacher</option> 
															<option value="Non-Teaching Staff">Non-Teaching Staff</option>
															<option value="Others">Others</option>

														</select>

													</div>

												</div>
												<div class="col-md-4" id="enrollment_div" style="display:none"> 
													<div class="form-group"> 
														<label>Enrollment Number <span class="req">*</span></label> 
														<input type="text" name="enrollment_number" id="enrollment_number" class="form-control" placeholder="Please enter your enrollment number">
													</div>

												</div>
												<div class="col-md-4">

													<div class="form-group">

														<label>First Name <span class="req">*</span></label>

														<input type="text" name="first_name" id="first_name" class="form-control charector" placeholder="First Name">

													</div>

												</div>

												<div class="col-md-4">

													<div class="form-group">

														<label>Last Name</label>

														<input type="text" name="last_name" id="last_name" class="form-control charector" placeholder="Last Name">

													</div>

												</div>

												<div class="col-md-4">

													<div class="form-group">

														<label>Address <span class="req">*</span></label>

														<input type="text" name="address" id="address" class="form-control charector" placeholder="Address">

													</div>

												</div>

												<div class="col-md-4">

													<div class="form-group">

														<label>City <span class="req">*</span></label>

														<input type="text" name="city" id="city" class="form-control charector" placeholder="City">

													</div>

												</div>

												<div class="col-md-4">

													<div class="form-group">

														<label>Pincode <span class="req">*</span></label>

														<input type="text" name="pincode" id="pincode" class="form-control charector" placeholder="Pincode">

													</div>

												</div>

												<div class="col-md-4">

													<div class="form-group">

														<label>Gender <span class="req">*</span></label>

														<select name="gender" id="gender" class="form-control charector"> 
															<option value="">Please Select Gender</option> 
															<option value="Male">Male</option> 
															<option value="Female">Female</option> 
														</select>

													</div>

												</div>

											 
												

												<div class="col-md-4">

													<div class="form-group">

														<label>Phone or Mobile <span class="req">*</span></label>

														<input type="text" name="mobile_number" id="mobile_number" class="form-control charector" placeholder="Phone / Mobile Number">

													</div>

												</div>

												<div class="col-md-4">

													<div class="form-group">

														<label>Email Address <span class="req">*</span></label>

														<input type="email" name="email" id="email" class="form-control charector" placeholder="Email Address">

													</div>

												</div>  
											 
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label>Upload file <small>(if any)</small> <span class="req">*</span></label> 
														<input type="file" name="userfile" id="userfile" class="form-control" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
													</div> 
												</div>  
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label>Complaint <span class="req">*</span></label> 
														<textarea name="complaint" id="complaint" class="form-control charector" rows="5"></textarea> 
													</div> 
												</div> 
											</div> 
										</div>

										<div class="col-md-12">

											<div class="row">

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

														<button type="submit" class="btn btn-primary" name="register" id="register">Register Complaint</button>

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

							<div class="tab-pane" id="2b">

								

							</div>

						</div>

					</div>

					<div class="clearfix"></div>

				</div>

			</div>

		</div>

	</div>

</div>







<?php include("footer.php");?>



<script>

$("#student_teacher").change(function(){
	if($(this).val() == "Student"){
		$("#enrollment_div").show();
	}else{
		$("#enrollment_div").hide(); 
	}
	$("#student_teacher").change(function(){
		window.location.href="<?=base_url();?>caste-based-discrimination";
	});
});



jQuery.validator.addMethod("validate_email", function(value, element) {

	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

		return true;

	}else {

		return false;

	}

}, "Please enter a valid Email.");	

$('#admission_form').validate({

	rules: {

		enrollment_number: { 
			required: true, 
		},
		first_name: { 
			required: true, 
		}, 
		address: { 
			required: true, 
		}, 
		city: { 
			required: true, 
		}, 
		pincode: { 
			required: true,
			number: true, 
		}, 
		gender: { 
			required: true, 
		}, 
		student_teacher: { 
			required: true, 
		}, 
		mobile_number: { 
			required: true, 
			number: true, 
			minlength: 10, 
			maxlength: 10, 
		}, 
		email: { 
			required: true, 
			validate_email: true, 
		}, 
		complaint: { 
			required: true, 
		},

	}, 
	messages: { 
		enrollment_number: { 
			required: "Please enter enrollment number.", 
		},
		first_name: { 
			required: "Please enter first name.", 
		},  
		address:{
			required: "Please enter address.", 
		}, 
		city:{
			required: "Please enter city.", 
		},
		pincode:{
			required: "Please enter pincode.", 
			number: "Only number allowed.",
		},
		gender: { 
			required: "Please select gender.", 
		}, 
		student_teacher: { 
			required: "Please select.", 
		}, 
		mobile_number: { 
			required: "Please enter mobile number.", 
			number: "Only number allowed.", 
			minlength: "Minimum 10 digit required.", 
			maxlength: "Maximum 10 digit allowed.", 
		}, 
		email: { 
			required: "Please enter email.", 
			validate_email: "Please enter valid email.",  
		}, 
		complaint: { 
			required: "Please enter your complaint.", 
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


$("#enrollment_number").keyup(function(){   
	$.ajax({ 
		type: "POST", 
		url: "<?=base_url();?>web/Web_controller/get_student_data_ajax", 
		data:{'enrollment_number':$("#enrollment_number").val()}, 
		// print_r(data);exit;
		success: function(data){ 
			var opts = $.parseJSON(data);  
			 if(opts){ 
				$("#first_name").val(opts['student_name']); 
				$("#address").val(opts['address']); 
				$("#city").val(opts['city']); 
				$("#pincode").val(opts['pincode']); 
				$("#mobile_number").val(opts['mobile']); 
				$("#email").val(opts['email']); 
				if(opts['gender'] == "0"){
					$("#gender").html("<option value'Male'>Male</option>");
				}else{
					$("#gender").html("<option value'Female'>Female</option>"); 
				}
			 }else{ 
				$("#first_name").val(''); 
				$("#last_name").val(''); 
				$("#address").val('');
				$("#city").val('');
				$("#pincode").val(''); 
				$("#mobile_number").val(''); 
				$("#email").val(''); 
				$("#gender").html("<option value''>Select Gender</option><option value'Male'>Male</option><option value'Female'>Female</option>"); 
			 }  
		}, 
		error: function(jqXHR, textStatus, errorThrown) { 
		   console.log(textStatus, errorThrown); 
		}

	});	 
}); 





</script>