<?php include('header.php'); ?>

<div class="header_cc_area" style="background-image:url('<?=$this->Digitalocean_model->get_photo('images/header_area.jpg')?>')">
	<div class="container">
		<div class="row">
		    <h1>Placement Record Form</h1>
		    <p>Placement Details / Form</p>
		</div>
	</div>
</div>
<div class="uni_mainWrapper">
	<div class="container">
		<div class="row">	
			<div class="container">
				<div class="online_wrapper">
					<div class="admission_div">
						<form method="post" name="placement_record_form" id="placement_record_form" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="common_details">
										<div class="col-md-12">
											<h3>Placement Details</h3>
											<small>Please provide your placement details</small>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-3">
										<div class="form-group">
											<label>Enrollment Number </label>
											<input type="text" name="enrollment_number" id="enrollment_number" class="form-control charector" placeholder="Enrollment Number" value="<?php if(!empty($old_student_details)){ echo $old_student_details->student_name;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Student Name <span class="req">*</span></label>
											<input type="text" name="student_name" id="student_name" class="form-control charector" placeholder="Student Full Name" value="<?php if(!empty($old_student_details)){ echo $old_student_details->student_name;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Mobile Number <span class="req">*</span></label>
											<input autocomplete="off" type="text" name="mobile" id="mobile" class="form-control number_only" placeholder="Mobile Number" maxlength="10" minlength="10" value="<?php if(!empty($old_student_details)){ echo $old_student_details->mobile;}?>">
											<div class="error" id="mobile_error"></div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Email ID <span class="req">*</span></label>
											<input autocomplete="off" type="email" name="email" id="email" class="form-control" placeholder="Email ID" value="<?php if(!empty($old_student_details)){ echo $old_student_details->email;}?>">
											<div class="error" id="email_error"></div>
										</div>
									</div>
                                    <div class="col-md-3">
										<div class="form-group">
											<label>Course Name<span class="req">*</span></label>
											<input autocomplete="off" type="text" name="course_name" id="course_name" class="form-control" placeholder="Course Name" value="<?php if(!empty($old_student_details)){ echo $old_student_details->email;}?>">
										</div>
									</div>
                                    <div class="col-md-3">
										<div class="form-group">
											<label>Passout Year<span class="req">*</span></label>
											<input autocomplete="off" type="text" name="passout_year" id="passout_year" class="form-control" placeholder="Passout Year" value="<?php if(!empty($old_student_details)){ echo $old_student_details->email;}?>">
										</div>
									</div>
                                    </div>
                                    </div>
                                    <div class="row">
								    <div class="col-md-12">
									<div class="col-md-3">
										<div class="form-group">
											<label>Employment Type <span class="req">*</span></label>
											<select id="employment_type" name="employment_type" class="form-control">
												<option value="">Select Employment Type</option>
												<option value="Govenment">Govenment</option>
												<option value="Private">Private</option>
												<option value="Self">Self</option>
											</select>
										</div>
									</div> 
                                    <div class="col-md-3">
										<div class="form-group">
											<label>Organization Name <span class="req">*</span></label>
											<input type="text" name="organization" id="organization" class="form-control charector" placeholder="Organization Name" value="">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Department Name <span class="req">*</span></label>
											<input type="text" name="department" id="department" class="form-control charector" placeholder="Department Name" value="">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Designation <span class="req">*</span></label>
											<input type="text" name="designation" id="designation" class="form-control charector" placeholder="Designation" value="">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Country <span class="req">*</span></label>
											<select class="form-control" name="country" id="country">
												<option value="">Select Country</option>
                                                <?php if(!empty($country)){
													foreach($country as $country_result){
												?>
												<option value="<?=$country_result->id?>"><?=$country_result->name?></option>
												<?php }}?>
                                            </select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>State <span class="req">*</span></label>
											<select class="form-control" required name="state" id="state">
												<option value="">Select state</option>
											</select>
										</div>
									</div> 
                                    <div class="col-sm-3">
										<div class="form-group">
											<label>City <span class="req">*</span></label>
											<select class="form-control" required name="city" id="city">
												<option value="">Select City</option>
											</select>
										</div>
									</div> 
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12 edu">
										<div class="form-group">
											<label></label>
											<button type="submit" class="btn btn-primary" name="register" id="register">Submit</button>
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
		</div>
	</div>
</div>

<?php include('footer.php'); ?>
<script>
$("#enrollment_number").keyup(function(){   
	$.ajax({ 
		type: "POST", 
		url: "<?=base_url();?>web/Web_controller/get_student_data_placement_record_form", 
		data:{'enrollment_number':$("#enrollment_number").val()}, 
		// print_r(data);exit;
		success: function(data){ 
			var opts = $.parseJSON(data);  
			 if(opts){ 
				$("#student_name").val(opts['student_name']); 
				$("#mobile").val(opts['mobile']); 
				$("#email").val(opts['email']);
                $("#course_name").val(opts['course_name']); 
			 }else{ 
				$("#student_name").val(''); 
				$("#mobile").val(''); 
				$("#email").val(''); 
				$("#course_name").val(''); 
            }  
		}, 
		error: function(jqXHR, textStatus, errorThrown) { 
		   console.log(textStatus, errorThrown); 
		}
	});	 
}); 

$("#country").change(function(){ 
	//alert($('#country').val());
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_state_ajax",
		data:{'country':$("#country").val()},
		success: function(data){
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
$("#state").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_city_ajax",
		data:{'state':$("#state").val()},
		success: function(data){
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

jQuery.validator.addMethod("validate_email", function(value, element) {
if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
    return true;
}else {
    return false;
}
}, "Please enter a valid Email.");	

$('#placement_record_form').validate({

rules: {
    // enrollment_number: { 
    //     required: true, 
    // },
    student_name: { 
        required: true, 
    }, 
    mobile: { 
        required: true, 
        number: true, 
        minlength: 10, 
        maxlength: 10, 
    }, 
    email: { 
        required: true, 
        validate_email: true, 
    }, 
    course_name: { 
        required: true, 
    },  
    passout_year: { 
        required: true, 
        number: true, 
        minlength: 4, 
        maxlength: 4, 
    }, 
    employment_type: { 
        required: true,
    }, 
    organization: {
        required: true,
    },
    department: { 
        required: true, 
    },
    designation: { 
        required: true, 
    },
    country: { 
        required: true, 
    },
    state: { 
        required: true, 
    },
    city: { 
        required: true, 
    },
}, 
messages: { 
    // enrollment_number: { 
    //     required: "Please enter enrollment number.", 
    // },
    student_name: { 
        required: "Please enter full name", 
    },  
    mobile: { 
        required: "Please enter mobile number.", 
        number: "Only number allowed.", 
        minlength: "Minimum 10 digit required.", 
        maxlength: "Maximum 10 digit allowed.", 
    }, 
    email: { 
        required: "Please enter email.", 
        validate_email: "Please enter valid email.",  
    }, 
    course_name:{
        required: "Please enter course name.", 
    },  
    passout_year: { 
        required: "Please enter passout year.", 
        number: "Only number allowed.", 
        minlength: "Minimum 4 digit required.", 
        maxlength: "Maximum 4 digit allowed.", 
    },
    employment_type:{
        required: "Please select employment type.", 
    },
    organization:{
        required: "Please enter organization name.", 
    },
    department: { 
        required: "Please enter department name.", 
    }, 
    designation: { 
        required: "Please enter designation.", 
    }, 
    country: { 
        required: "Please enter country.", 
    }, 
    state: { 
        required: "Please enter state.", 
    }, 
    city: { 
        required: "Please enter city.", 
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