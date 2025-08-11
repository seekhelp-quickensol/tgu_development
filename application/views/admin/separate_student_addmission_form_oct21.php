<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Enroll Student</h4>
							<p class="card-description">Please enter student details</p>
							<form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Student Name *</label>
											<input type="text" class="form-control" id="student_name" name="student_name" placeholder="Student Name" value="<?php if(!empty($student)){ echo $student->student_name;}?>">
											
                                            <input type="hidden" class="form-control" id="student_id" name="student_id" value="<?php if(!empty($student)){ echo $student->id;}?>">
                                            
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Gender <span class="req">*</span></label>
											<select id="gender" name="gender" class="form-control">
												<option value="">Select Gender</option>
												<option value="Male" <?php if(!empty($student) && $student->gender == "Male"){ ?>selected="selected"<?php }?>>Male</option>
												<option value="Female" <?php if(!empty($student) && $student->gender == "Female"){ ?>selected="selected"<?php }?>>Female</option>
												<option value="Transgender" <?php if(!empty($student) && $student->gender == "Transgender"){ ?>selected="selected"<?php }?>>Transgender</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Father Name *</label>
											<input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name" value="<?php if(!empty($student)){ echo $student->father_name;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Mother Name *</label>
											<input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name" value="<?php if(!empty($student)){ echo $student->mother_name;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Date of Birth*</label>
											<input type="text" class="form-control datepicker" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="<?php if(!empty($student)){ echo date("d-m-Y",strtotime($student->date_of_birth));}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputPassword1">Mobile Number *</label>
											<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" value="<?php if(!empty($student)){ echo $student->mobile;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputPassword1">Email *</label>
											<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php if(!empty($student)){ echo $student->email;}?>">
										</div>
									</div>
									<div class="col-sm-3 uid_input">
										<div class="form-group">
											<label class="uid_label">Aadhaar Number <span class="req">*</span></label>
											<input type="text" class="form-control identity_numer" name="identity_numer" id="identity_numer" placeholder="Enter Aadhaar Number" value="<?php if(!empty($student)){ echo $student->id_number;}?>">
										</div>
									</div>
									<div class="col-sm-3 uid_soft_input">
										<div class="form-group">
											<label class="uid_soft_label">Upload Aadhaar Softcopy <span class="req">*</span></label>
											<input type="file" class="form-control identity_file" name="identity_file" id="identity_file" placeholder="Upload Aadhaar Softcopy">
											<input type="hidden" name="old_identity_file" value="<?php if(!empty($student)){ echo $student->identity_softcopy;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Session </label>
											<select class="form-control" id="session" name="session">
												<?php if(!empty($session)){ foreach($session as $session_result){?>
												<option value="<?=$session_result->id?>" <?php if(!empty($student) && $student->session_id == $session_result->id){ ?>selected="selected"<?php }?>><?=$session_result->session_name?></option>
											<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Course Name *</label>
											<select class="form-control js-example-basic-single" id="course" name="course">
												<option value="">Select Course</option>
												<?php if(!empty($course)){ foreach($course as $course_result){?>
												<option value="<?=$course_result->course?>" <?php if(!empty($student) && $student->course_id == $course_result->course){ ?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<?php 
										$stream = array();
										if(!empty($student)){
											$stream = $this->Course_model->get_selected_course_stream($student->course_id);
										}
									?>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Stream *</label>
											<select class="form-control js-example-basic-single" id="stream" name="stream">
												<option value="">Select Stream</option>
												<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
												<option value="<?=$stream_result->stream?>" <?php if(!empty($student) && $student->stream_id == $stream_result->stream){ ?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Year/Sem *</label>
											<select class="form-control js-example-basic-single" id="year_sem" name="year_sem">
                                            <option value="">Select Year/Sem</option>
												<?php if(!empty($student)){for($y=1;$y<=10;$y++){?>
												<option value="<?=$y?>" <?php if(!empty($student) && $student->year_sem == $y){ ?>selected="selected"<?php }?>><?=$y?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-md-3 credit_note_div" style="display:none">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Credit Note*</label>
											<input type="text" class="form-control" id="credit_note" name="credit_note" value="<?php if(!empty($student)){ echo $student->credit_note;}?>" placeholder="Enter only University Name">
										</div>
									</div> 
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Address </label>
											<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php if(!empty($student)){ echo $student->address;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">State </label>
											<input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php if(!empty($student)){ echo $student->state;}?>">
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Document *</label>
											<input type="file" class="form-control" accept=".pdf, .png, .jpg,.jpeg" id="document" name="document">
											<input type="hidden" name="old_document" value="<?php if(!empty($student)){ echo $student->document;}?>">
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Center *</label>
											<select class="form-control js-example-basic-single" id="center_id" name="center_id">
												<?php foreach($centers as $center): ?>
													<option value="<?=$center->id;?>"

                                                       	<?php if(!empty($student)){if($student->center_id == $center->id){echo "selected";}}?>
														><?=$center->center_name;?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Registration Date*</label>
											<input type="text" class="form-control datepicker" id="date_of_registration" name="date_of_registration" placeholder="Date of Registration" value="<?php if(!empty($student)){ echo date("d-m-Y",strtotime($student->date_of_registration));}?>">
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">fees *</label>
											<input type="number" class="form-control" id="fees" name="fees" value="<?php if(!empty($student)){ echo $student->student_fees;}?>">
											
										</div>
									</div>


								</div>
								<button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
<?php include('footer.php');
$id=0;
if($this->uri->segment(2) != ""){
	$id = $this->uri->segment(2);
}
?>
 <script>
 $("#year_sem").change(function(){
	 if($(this).val() == 3){
		 $(".credit_note_div").show();
	 }else{ 
		 $(".credit_note_div").hide();
	 }
 });
$("#course").change(function(){  
	if($(this).val() == "23"){
		$("#study_mode").append('<option value="3">Part-Time</option>');
	}else{
		$("#study_mode option[value='3']").remove();
	}
	//console.log($("#course").val());
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
			//console.log(data)
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
$("#stream").change(function(){  
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration_separate",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#year_sem").html(data);
			
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#single_form').validate({
		rules: {
			student_name: {
				required: true,
			},
			father_name: {
				required: true,
			},
			gender: {
				required: true,
			},
			mother_name: {
				required: true,
			},
			date_of_birth: {
				required: true,
			},
			email: {
				required: true,
				validate_email: true,
			},
			study_mode: {
				required: true,
			},
			mobile: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10,
			},
			session_name: {
				required: true,
			},
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			year_sem: {
				required: true,
			}, 
			address: {
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
			pincode: {
				required: true,
			},
			identity_numer: {
				required: true,
			},
			fees:{
				required:true,
				number:true,
			},
			credit_note:{
				required:true, 
			},
			<?php if(empty($student)): ?>
			document:{
				required:true,
			},
			identity_file: {
				required: true,
			},
			<?php endif; ?>
		},
		messages: {
			student_name: {
				required: "Please enter student name",
			},
			father_name: {
				required: "Please enter father name",
			},
			mother_name: {
				required: "Please enter mother name",
			},
			gender: {
				required: "Please select gender",
			},
			date_of_birth: {
				required: "Please enter select date of birth",
			},
			email: {
				required: "Please enter valid email",
				validate_email: "Please enter valid email",
			},
			study_mode: {
				required: "Please select study mode",
			},
			mobile: {
				required: "Please enter mobile number",
				number: "Please enter valid mobile number",
				minlength: "Please enter valid mobile number",
				maxlength: "Please enter valid mobile number",
			},
			session_name: {
				required: "Please enter session name",
			},
			course: {
				required: "Please enter course name",
			},
			stream: {
				required: "Please enter stream name",
			},
			year_sem: {
				required: "Please enter year/sem",
			},
			address: {
				required: "Please enter address",
			},
			country: {
				required: "Please select country",
			},
			state: {
				required: "Please select state",
			},
			city: {
				required: "Please select city",
			},
			pincode: {
				required: "Please enter pincode",
			},
			document:{
				required: "Please select a document",
			},
			identity_numer:{
				required: "Please enter aadhaar number",
			},
			identity_file:{
				required: "Please select aadhaar softcopy",
			},
			fees:{ 
				required:"Please enter student fees",
				number:"not a valid fees",

			},
			credit_note:{ 
				required:"Please enter credit note", 

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
	$('#password_form').validate({
		rules: {
			password: {
				required: true,
			},
		},
		messages: {
			password: {
				required: "Please enter password",
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
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		maxDate: "18Y",
		minDate: "-80Y",
		yearRange: "-100:-0"
	});
});


 

</script>
 