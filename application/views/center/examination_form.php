<?php include("header.php");?>
<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">
<style>
	.common_details {
		background: #4b0605;
		color: #fff;
		padding: 10px 0px;
		margin-bottom: 15px;
	}
</style>
<?php 			
	
	// echo "<pre>";print_r($student);
	$new_exam = $this->Center_details_model->get_exam_fees($student->session_id,$student->course_id,$student->stream_id,$student->center_id);
	if(!empty($new_exam)){ 
		$exam_fees = $new_exam->exam_fees;
	} 	$exam_fees = '1000';	
	if($this->session->userdata('center_id') == 31 && $center_profile->payment_term == 2){		
	    $exam_fees = '500';	
	}else if($this->session->userdata('center_id') == 58 && $center_profile->payment_term == "2"){		
	    $exam_fees = '500';	
	}
	if($this->session->userdata('center_id') != 31 && $this->session->userdata('center_id') != 58){
	    if($student->course_id == '14' && $student->stream_id == '139'){
    	    $exam_fees = '2500';
    	}
    	if($student->course_id == '233' || $student->course_id == '234' || $student->course_id == '17'){
    	    $exam_fees = '2500';
    	}
	}
?>

<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 col-md-offset-2 grid-margin stretch-card">
					<div class="card">
						<div class="">
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
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label>Student Name <span class="req">*</span></label>
													<input type="text" name="student_name" id="student_name" readonly class="form-control charector" placeholder="Student Full Name" value="<?php if(!empty($student)){ echo $student->student_name;}?>">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Father's Name <span class="req">*</span></label>
													<input type="text" name="father_name" id="father_name" readonly class="form-control charector" placeholder="Fathers Name" value="<?php if(!empty($student)){ echo $student->father_name;}?>">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Mother's Name <span class="req">*</span></label>
													<input type="text" name="mother_name" id="mother_name" readonly class="form-control charector" placeholder="Mothers Name" value="<?php if(!empty($student)){ echo $student->mother_name;}?>">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Date of Birth <span class="req">*</span></label>
													<input type="text" name="date_of_birth" id="date_of_birth" readonly class="form-control" placeholder="DD-MM-YY" value="<?php if(!empty($student)){ echo date("d/m/Y",strtotime($student->date_of_birth));}?>">
												</div>
											</div>
										</div>
									</div>
									 
									 
									 
									
									<div class="common_details">
										<div class="col-md-12">
											<h3>Course/Programme Details</h3>
											<small>Please enter course/programme details</small>
										</div>
										<div class="clearfix"></div>
									</div>
									
									<div class="col-md-12">
										<div class="edu">
											<div class="row">
												<div class="col-sm-3">
													<div class="form-group">
														<label>Session<span class="req">*</span></label>
														<input type="text" readonly id="session" name="session" class="form-control" value="<?php if(!empty($student)){ echo $student->session_name;}?>">
														<!--<input type="text" readonly id="session" name="session" class="form-control" value="January 2022">-->
													</div>				
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label>Course<span class="req">*</span></label>
														<input type="text" readonly id="course_name" name="course_name" class="form-control" value="<?php if(!empty($student)){ echo $student->print_name;}?>">
													</div>				
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label>Stream <span class="req">*</span></label>
														<input type="text" readonly id="stream_name" name="stream_name" class="form-control" value="<?php if(!empty($student)){ echo $student->stream_name;}?>">
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<label>Semester/Year <span class="req">*</span></label>
														<select id="year_sem" name="year_sem" class="form-control">
															<option value="<?=$student->year_sem?>"><?=$student->year_sem?></option>
														</select>
													</div>
												</div>
												 
												<div class="col-sm-3" id="bank_div" style="display:none">
													<div class="form-group">
														<label>Bank</label>
														<select id="bank" name="bank" class="form-control">
															<option value="">Select Bank</option>
															<?php if(!empty($bank)){ foreach($bank as $bank_result){?>
															<option value="<?=$bank_result->id?>"><?=$bank_result->bank_name?></option>
															<?php }}?>
														</select>
													</div>
												</div>
												<div class="col-sm-12" style="display:none">
													<div class="form-group">
														<label>Subject Details <span class="req">*</span></label>
														<table class="table table-striped table-bordered dt-responsive nowrap">
															<tr>
																<th>Select</th>
																<th>Subject Name</th> 
																<th>Subject Type</th> 
															</tr>
															<?php if(!empty($subject)){ foreach($subject as $subject_result){?>
															<tr>
																<td><input type="checkbox" class="subject" name="subject[]" value="<?=$subject_result->id?>"></td>
																<td><?=$subject_result->subject_name?></td>
																<td><?php if($subject_result->subject_type == "0"){ echo "Theory";}else{ echo "Practical";}?></td>
															</tr>
															<?php }}?>
														</table>
													</div>
												</div>
											</div>	
										</div>	
									</div>
									<div class="common_details">
										<div class="col-md-12">
											<h3>Payment Details</h3>
											<small>Pay fees in university account only other accounts fees will not be accept</small>
										</div>
										<div class="clearfix"></div>
									</div>
									
									<div class="col-md-12">
										<div class="row">
											<div class="col-sm-3">
												<div class="form-group">
													<label>Late Fees <span class="req">*</span></label>
													<input placeholder="Late Fees" type="text" id="late_fees" name="late_fees" class="form-control" value="0" readonly>
												</div>				
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>Examination Fees <span class="req">*</span></label>
													<input placeholder="Examination Fees" type="text" id="examination_fees" name="examination_fees" class="form-control" value="<?=$exam_fees;?>" readonly>
												</div>				
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>Total Examination Fees <span class="req">*</span></label>
													<input placeholder="Total Examination Fees" type="text" id="total_examination_fees" name="total_examination_fees" class="form-control" value="<?=$exam_fees;?>" readonly>
												</div>				
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>Exam Type <span class="req">*</span></label>
													<select id="exam_mode_type" name="exam_mode_type" class="form-control">
														<option value="">Select Exam Type</option>
														<option value="1">Offline</option>
														<option value="2">Online</option>
														<!--<option value="2">By Challan</option>
														-->
													</select>
												</div>				
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>Payment Mode <span class="req">*</span></label>
													<select id="payment_mode" name="payment_mode" class="form-control">
														<option value="">Select Payment Mode</option>
														<option value="1">Online</option>
														<!-- <option value="3">Cash</option> -->
														<!--<option value="2">By Challan</option>
														-->
													</select>
												</div>				
											</div>
										  
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-12 edu">
														<div class="form-group">
															<!--<input type="checkbox" name="mycheckbox" id="mycheckbox" value="0" required="required" /> <label style="color:red">I Agree to the declaration<span class="req">*</span></label>-->
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 edu">
														<div class="form-group">
															<label></label>
															<button type="submit" class="btn btn-primary" name="register" id="register">Next</button>
															
															
															<div class="pull-right">
																
															</div>
														</div>
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
	</div>
</div>



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

<?php include("footer.php");?>

<script>
 $("#religion").change(function(){
	if($("#religion").val() == "Others"){
		$("#religin_specify_div").show(); 
	}else{
		$("#religin_specify_div").hide();
	}
});
$("#fees_option").change(function(){
	var admission_fees = $("#admission_fees").val();
	admission_fees = admission_fees/2;
	var total = parseInt($("#late_fees").val())+parseInt(admission_fees);
	$("#total_admission_fees").val(total);
	
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
$("#course").change(function(){  
	if($(this).val() == "23"){
		$("#payment_option").show();
	}else{
		$("#payment_option").hide();
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
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#year_sem").html(data);
			$.ajax({
				type: "POST",
				url: "<?=base_url();?>web/Web_controller/get_course_stream_fees",
				data:{'session':$("#session").val(),'course':$("#course").val(),'stream':$("#stream").val(),'country':$("#country").val()},
				success: function(data){
					data =  data.split("@@@");
					$("#late_fees").val(data[1]);
					$("#admission_fees").val(data[0]);
					$("#total_admission_fees").val(parseInt(data[0])+parseInt(data[1]));
					late_cal();
				},
				 error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#session").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_fees",
		data:{'session':$("#session").val(),'course':$("#course").val(),'stream':$("#stream").val(),'country':$("#country").val()},
		success: function(data){
			data = data.split("@@@");
			$("#late_fees").val(data[1]);
			$("#admission_fees").val(data[0]);
			$("#total_admission_fees").val(parseInt(data[0])+parseInt(data[1]));
			late_cal();
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#country").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_fees",
		data:{'session':$("#session").val(),'course':$("#course").val(),'stream':$("#stream").val(),'country':$("#country").val()},
		success: function(data){
			data = data.split("@@@");
			$("#late_fees").val(data[1]);
			$("#admission_fees").val(data[0]);
			$("#total_admission_fees").val(parseInt(data[0])+parseInt(data[1]));
			late_cal();
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
function late_cal(){
	if($("#year_sem").val() == "1" || $("#year_sem").val() == ""){
		$(".lateral_entry").hide();
		$("#total_admission_fees").val(parseInt($("#admission_fees").val())+parseInt($("#late_fees").val()));
	}else{
		$(".lateral_entry").show();
		$("#total_admission_fees").val(parseInt($("#admission_fees").val())+parseInt($("#late_fees").val())+parseInt($("#lateral_entry_fees").val()));
	}
}
$("#year_sem").change(function(){
	if($(this).val() == "1"){
		$(".lateral_entry").hide();
		$("#total_admission_fees").val(parseInt($("#admission_fees").val())+parseInt($("#late_fees").val()));
	}else{
		$(".lateral_entry").show();
		$("#total_admission_fees").val(parseInt($("#admission_fees").val())+parseInt($("#late_fees").val())+parseInt($("#lateral_entry_fees").val()));
	}
});
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
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

$("#admission_form").validate({
	ignore:[],
	rules: {
		student_name: "required",		
		father_name: "required",		
		mother_name: "required",		
		date_of_birth: "required",		
		year_sem: "required",
		payment_mode: "required",
		exam_mode_type: "required",
		 			
	},
	messages: {
		student_name: "Please enter Full name!",
		father_name: "Please enter father name!",
		mother_name: "Please enter mother name!", 
		date_of_birth: "Select DOB!",
		year_sem: "Please select year/sem Name!",
		payment_mode: "Please select payment mode!",
		exam_mode_type: "Please select exam type!",
		 
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});

$(document).ready(function(){
   $image_crop = $('#profile_image_data').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#userfile').on('change', function(e){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"<?=base_url();?>update_pic_photo.php",
        type: "POST",
        data:{"image": response},
        success:function(data){
			$("#hidden_image").val(data);
          
        }
      });
    })
  });
});
$("#payment_mode").change(function(){
	if($(this).val() == "2"){
		$("#bank_div").show();
	}else{
		$("#bank_div").hide();
	}
});  
</script>