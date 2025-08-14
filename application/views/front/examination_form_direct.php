<?php include("header.php");?>
<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">
<style>

table {

  font-family: arial, sans-serif;

  border-collapse: collapse;

  width: 100%;

}



td, th {

  border: 1px solid #dddddd;

  text-align: left;

  padding: 8px;

}



tr:nth-child(even) {

  background-color: #dddddd;

}	

</style>

<?php 
	$exam_fees = '1000';
	if(!empty($student)){
		if($student->course_mode == '1'){
			if($student->course_id == '233' || $student->course_id == '234' || $student->course_id == '193' || $student->course_id == '17'){
				$exam_fees = '2500';
			}else{
				$exam_fees = '1000';
			}
		}else if($student->course_mode == '2'){
			if($student->course_id == '233' || $student->course_id == '234' || $student->course_id == '193' || $student->course_id == '17'){
				$exam_fees = '2500';
			}else{
				$exam_fees = '1000';
			}
		}
	}
?>
<div class="page-title-area bg-27">

			<div class="container">

				<div class="page-title-content">

					<h2>Examination Form</h2>



					<ul>

						<li>

							<a href="<?=base_url()?>">

							Examination 

							</a>

						</li>



						<li class="active">Examination Form</li>

					</ul>

				</div>

			</div>

		</div>
<div class="container">

				<div class="candidates-resume-content">

					<form class="resume-info" id="exam_form" name="exam_form" enctype="multipart/form-data" method="post" onsubmit="return validateForm();">

						<h3>Personal Details</h3>

						<p><Small>Please provide your personal details</Small></p>

							

							



						<div class="row">

							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Student Name <span class="req">*</span></label>							

									<input type="text" name="student_name" id="student_name" readonly class="form-control charector" placeholder="Student Full Name" value="<?php if(!empty($student)){ echo $student->student_name;}?>">

									<input type="hidden" name="std_id" id="std_id" class="form-control charectorz" placeholder="Student Full Name" value="<?php if(!empty($student)){ echo $student->id;}?>">



								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Father's name <span class="req">*</span></label>

									<input type="text" name="father_name" id="father_name" class="form-control charector" readonly placeholder="Fathers Name" value="<?php if(!empty($student)){ echo $student->father_name;}?>">

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

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



						<h3>Course/Programme Details</h3>

						<p><Small>Please enter course/programme details</Small></p>

							

						<div class="row">

							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Session<span class="req">*</span></label>

									<input type="text" readonly id="session" name="session" class="form-control" value="<?php if(!empty($student)){ echo $student->session_name;}?>"> 

								</div>				

							</div>

							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Course<span class="req">*</span></label>

									<input type="text" readonly id="course_name" name="course_name" class="form-control" value="<?php if(!empty($student)){ echo $student->print_name;}?>">

								</div>				

							</div>

							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Stream <span class="req">*</span></label>

									<input type="text" readonly id="stream_name" name="stream_name" class="form-control" value="<?php if(!empty($student)){ echo $student->stream_name;}?>">

								</div>

							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Exam Month <span class="req">*</span></label>
									<!--<input type="text" id="exam_month" name="exam_month" class="form-control" value="">-->
									<select name="exam_month" id="exam_month" class="form-control">
            							<option value="">Select Month</option>
            							<option value="January">January</option>
            							<option value="February">February</option>
            							<option value="March">March</option>
            							<option value="April">April</option>
            							<option value="May">May</option>
            							<option value="June">June</option>
            							<option value="July">July</option>
            							<option value="August">August</option>
            							<option value="September">September</option>
            							<option value="October">October</option>
            							<option value="November">November</option>
            							<option value="December">December</option>
            						</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label>Exam Year <span class="req">*</span></label>
									<input type="text" id="exam_year" name="exam_year" class="form-control" value="">
								</div>
							</div> 

							<div class="col-lg-6 col-md-6">

								<div class="form-group">

									<label>Semester/Year <span class="req">*</span></label>
									<input type="text" id="year_sem" name="year_sem" class="form-control" value="<?=$student->year_sem?>">

									<!--<select id="year_sem" name="year_sem" class="form-control">

										<option value="<?=$student->year_sem?>"><?=$student->year_sem?></option>

									</select>-->

								</div>

							</div>

							<div class="col-lg-6 col-md-6" id="bank_div" style="display:none">

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

							<div class="col-lg-6 col-md-6" style="display:none">

								<div class="form-group">

									<label>Subject Details <span class="req">*</span></label>

									<table>

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



						<h3>Payment Details</h3>

						<p><Small>Pay fees in university account only other accounts fees will not be accept</Small></p>



						<div class="row">

							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Late Fees <span class="req">*</span></label>

									<input placeholder="Late Fees" type="text" id="late_fees" name="late_fees" class="form-control" value="0" readonly>

								</div>				

							</div>

							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Examination Fees <span class="req">*</span></label>

									<input placeholder="Examination Fees" type="text" id="examination_fees" name="examination_fees" class="form-control" value="<?=$exam_fees;?>" readonly>

								</div>				

							</div>

							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Total Examination Fees <span class="req">*</span></label>

									<input placeholder="Total Examination Fees" type="text" id="total_examination_fees" name="total_examination_fees" class="form-control" value="<?=$exam_fees;?>" readonly>

								</div>				

							</div>



							



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Exam Type <span class="req">*</span></label>

									<!-- <select id="exam_type" name="exam_type" class="form-control">

										<option value="">Select Exam Type</option>

										<option value="1">Offline</option>

										<option value="2">Online</option> -->

										<!--<option value="2">By Challan</option>

										-->

									<!-- </select> -->



									<select id="exam_type" name="exam_type" class="form-control">

											<option value="0">Main Exam</option>  

									</select>

								</div>				

							</div>

							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Payment Mode <span class="req">*</span></label>

									<select id="payment_mode" name="payment_mode" class="form-control">

										<option value="1">Online</option> 

										<!-- <option value="3">Cash</option> -->

										<!--<option value="2">By Challan</option>

										--> 									

									</select>

								</div>				

							</div>

						<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Exam Mode <span class="req">*</span></label>

									<!-- <select id="exam_mode_type" name="exam_mode_type" class="form-control">

										<option value="">Select Exam Mode</option>

										<option value="1">Offline</option>

										<option value="2">Online</option>

										

									</select> -->



									<select id="exam_mode_type" name="exam_mode_type" class="form-control">

										<option value="2">Online</option>

										<option value="1">Offline</option>

									</select>

								</div>				

							</div>



						 

						</div>



						<div class="row">

							<div class="col-md-2 edu">

								<strong>Captcha <span class="req">*</span></strong>

							</div>



							<div class="col-lg-6 col-md-6">

								<div class="form-group"> 

									<div class="g-recaptcha" data-sitekey="<?=GOOGLE_DATA_SITEKEY?>"></div> 

								</div>

								<div id="captchaError" class="error"></div>

							</div>  

						</div>



						<div class="row">

							<div class="col-md-12 edu">

								<div class="form-group">

									<label></label>

									<button type="submit" class="default-btn2" name="register" id="register" value="register">Next</button>

									<div class="pull-right">

										

									</div>

								</div>

							</div>	

						</div> 

						</form> 

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

$("#exam_form").validate({
	ignore: ":hidden",
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
		religion: {
			required: true,
			noHTMLtags: true,
		},
		religin_specify: {
			required: true,
			noHTMLtags: true,
		},
		exam_month: {
			required: true,
		},
		exam_year: {
			required: true,
		},	
	},
	messages: {
		student_name: {
			required: "Please enter Full name!",
			noHTMLtags: "HTML tags not allowed!",
		},
		father_name: {
			required: "Please enter father name!",
			noHTMLtags: "HTML tags not allowed!",
		},
		mother_name: {
			required: "Please enter mother name!", 
			noHTMLtags: "HTML tags not allowed!",
		},
		date_of_birth: {
			required: "Select DOB!",
			noHTMLtags: "HTML tags not allowed!",
		},
		year_sem: {
			required: "Please select year/sem Name!",
			noHTMLtags: "HTML tags not allowed!",
		},
		payment_mode: {
			required: "Please select payment mode!",
			noHTMLtags: "HTML tags not allowed!",
		},
		exam_mode_type: {
			required: "Please select exam mode!",
			noHTMLtags: "HTML tags not allowed!",
		},
		exam_type: {
			required: "Please select exam type!",
			noHTMLtags: "HTML tags not allowed!",
		},
		religion: {
			required:"Please select religion!",
			noHTMLtags:"HTML tags not allowed",
		},
		religin_specify: {
			required:"Please specify your religin !",
			noHTMLtags:"HTML tags not allowed",
		},
		exam_month: {
				required:"Please enter exam month !",
		},	
		exam_year: {
			required:"Please enter exam year !",
		},	
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
 $("#religion").change(function(){
	if($("#religion").val() == "Others"){
		$("#religin_specify_div").show(); 
	}else{
		$("#religin_specify_div").hide();
	}
});
</script>
