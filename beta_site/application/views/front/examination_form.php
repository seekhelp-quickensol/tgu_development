<?php include('header.php');
?>

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

	$new_exam = $this->Web_model->get_exam_fees($student->course_id,$student->stream_id,$student->center_id);
	// print_r($new_exam);
	if(!empty($new_exam) && $new_exam->exam_fees != ""){ 
		$exam_fees = $new_exam->exam_fees;
	}

	// if(!empty($student)){
	// 	$exam_setup = $this->Web_model->get_hallticket_setup($student->exam_month,$student->exam_year);
	// 	print_r($exam_setup);exit;
	// 	// $data['exam_setup'] = !empty($session_name) ? $session_name : ''; 
	// }
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
									<label>Semester/Year <span class="req">*</span></label>
									<select id="year_sem" name="year_sem" class="form-control">
										<!-- <option value="">Select Semester/Year</option> -->
										<!-- <?php if(!empty($student)){ foreach($student as $student_result){?>
										<option value="<?=$student_result->id?>"><?=$student_result->year_sem?></option>
										<?php }}?> -->
										<option value="<?=$student->year_sem?>"><?=$student->year_sem?></option>
									</select>
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

<?php include("footer.php");?>

<script> 
$( function() {
    $( ".datepicker" ).datepicker({
		format: 'dd-mm-yyyy',
		changeMonth:true,
		changeYear:true,
		maxDate: "-18Y",
		minDate: "-80Y",
		yearRange: "-100:-0"
	});
} );
 
$("#exam_form").validate({
	ignore:[],
	rules: { 
		payment_mode: {
			required: true,
			noHTMLtags: true,
		},
		exam_mode_type: {
			required: true,
			noHTMLtags: true,
		},
		exam_type:{
			required: true,
			noHTMLtags: true,
		}, 
	},
	messages: {
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
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});  
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