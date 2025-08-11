<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Update your details</h4>
							<p class="card-description">Please update details</p>
							<form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Student Name *</label>
											<input type="text" class="form-control" readonly id="student_name" name="student_name" placeholder="Student Name" value="<?php if(!empty($student)){ echo $student->student_name;}?>">
											<input type="hidden" class="form-control" id="student_id" name="student_id" value="<?php if(!empty($student)){ echo $student->student_id;}?>">
											<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($student)){ echo $student->id;}?>">
										</div>
									</div>
									 
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Enrollment Number *</label>
											<input readonly  type="text" class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enrollment Number" value="<?php if(!empty($student)){ echo $student->enrollment_number;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Year/Sem *</label>
											<input readonly type="text" class="form-control" id="year_sem" name="year_sem" placeholder="Year/Sem" value="<?php if(!empty($student)){ echo $student->year_sem;}?>">
										</div>
									</div>        
									<div class="col-sm-3">
										<div class="form-group">
											<label>Upload Documents </label>
											<input type="file" class="form-control" name="document" id="document">
											<input type="hidden" class="form-control" name="old_document" id="old_document" value="<?=$student->document?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputUsername1">Remarks </label>
											<textarea class="form-control" id="remark" name="remark" placeholder=""><?php if(!empty($student)){ echo $student->remark;}?></textarea>
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
 
$("#course").change(function(){  
	$(".course_update_reason").show();
	if($(this).val() == "23"){
		$("#study_mode").append('<option value="3">Part-Time</option>');
	}else{
		$("#study_mode option[value='3']").remove();
	}

	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
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
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'course_mode':$("#course_mode").val()},
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
			center:{
				required:true,
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
			course_update_reason: {
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
			admission_date:{
				required: true,	
			}
		},
		messages: {
			student_name: {
				required: "Please enter student name",
			},
			center:{
				required:"Please select center",
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
			course_update_reason: {
				required: "Please enter course change reason",
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
			admission_date:{
				required: "Please select date",	
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
		maxDate:0,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
});
$("#country").change(function(){  
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
 $("#noc").change(function(){
 	var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case 'jpg':
        case 'pdf':
            break;
        default:
            alert('Only jpg,pdf file supported');
            this.value = '';
    }
 });
</script>
 