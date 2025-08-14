<?php include('header.php');?>
<style>
	.btn-small{
		padding: 5px 10px;
	}
	.no_doc{
		margin-bottom: 0px;
		padding: 5px;
		background: #ddd;
		color: #000;
		text-align: center;
	}
</style>
<?php 
	$exam_fees = '0';
		// echo "<pre>";print_r($student);
	// if(!empty($student)){
	// 	if($student->course_mode == '1'){
	// 		if($student->course_id == '233' || $student->course_id == '234' || $student->course_id == '193' || $student->course_id == '17'){
	// 			$exam_fees = '2500';
	// 		}else{
	// 			$exam_fees = '1000';
	// 		}
	// 	}else if($student->course_mode == '2'){
	// 		if($student->course_id == '233' || $student->course_id == '234' || $student->course_id == '193' || $student->course_id == '17'){
	// 			$exam_fees = '2500';
	// 		}else{
	// 			$exam_fees = '1000';
	// 		}
	// 	}
	// }
	
	$new_exam = "";
	if ($student && isset($student->course_id) && isset($student->stream_id)) {
		$new_exam = $this->Student_model->get_exam_fees($student->session_id,$student->course_id,$student->stream_id);
		// echo "<pre>";print_r($new_exam);exit;
	}
	if(!empty($new_exam)){ 
		$exam_fees = $new_exam->exam_fees;
	}
	//  echo $exam_fees;
?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fill Exam Form
				  </h4>
                  <!-- <p class="card-description">
                    Please enter Exam details
                  </p> -->
				  <?php if(empty($student)){?>
					<form method="post" name="verification_form" id="verification_form" enctype="multipart/form-data">
						<div class="row"> 
							<div class="col-md-12"> 
								<div class="personal_details"> 
									<!-- <h3>Enrollment Verification</h3>	 
									<small>Please provide your enrollment number</small> 
									<hr>  -->
								</div> 
							</div> 
						</div> 
						<div class="row edu"> 
							<div class="col-md-12"> 
								<div class="form-group"> 
									<label>Enter Your Enrollment Number<span class="req">*</span></label> 
									<input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter Your Enrollment Number"> 
								</div> 
							</div> 
						</div>  
						<div class="row"> 
							<div class="col-md-12 edu"> 
								<div class="form-group"> 
									<label></label> 
									<button type="submit" class="btn btn-primary" name="next" id="next" value="next">Next</button> 
									<div class="pull-right"> 
									</div> 
								</div>
							</div>	
						</div> 
					</form>
				  
				  <?php }else{?>
						<form class="forms-sample" name="exam_form" id="exam_form" method="post" enctype="multipart/form-data">
							<div class="col-md-12">
								<div class="row"> 
									<div class="col-md-3">
										<div class="form-group">
											<label>Student Name <span class="req">*</span></label>
											<input type="text" name="student_name" id="student_name" readonly class="form-control charector" placeholder="Student Full Name" value="<?php if(!empty($student)){ echo $student->student_name;}?>">
											<input type="hidden" name="id" id="id" class="form-control" value="<?php if(!empty($student)){ echo $student->id;}?>">
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
							<div class="col-md-12"> 
								<div class="row"> 
									<!-- <div class="col-sm-3">
										<div class="form-group">
											<label>Session Month<span class="req">*</span></label> -->
											<!--<input type="text" readonly id="session" name="session" class="form-control" value="<?php if(!empty($student)){ echo $student->session_name;}?>">-->
											<!-- <input type="text" id="exam_month" name="exam_month" class="form-control" placeholder="eg. January" required>
										</div>				
									</div> -->

									<div class="col-sm-3">
										<div class="form-group">
											<label class=" form-control-label">Session Month * </label>
											<select name="exam_month" id="exam_month" class="form-control js-example-basic-single">
												<option value="">Select Exam Month</option>
													<?php
														if (!empty($student) && property_exists($student, 'exam_month')) {
															$selected_month = $student->exam_month;
														} else {
															$selected_month = ''; 
														}
													?>


												
												<option value="January" <?php if($selected_month == 'January'){ echo 'selected';}?>>January</option>
												<option value="February" <?php if($selected_month == 'February'){ echo 'selected';}?>>February</option>
												<option value="March" <?php if($selected_month == 'March'){ echo 'selected';}?>>March</option>
												<option value="April" <?php if($selected_month == 'April'){ echo 'selected';}?>>April</option>
												<option value="May" <?php if($selected_month == 'May'){ echo 'selected';}?>>May</option>
												<option value="June" <?php if($selected_month == 'June'){ echo 'selected';}?>>June</option>
												<option value="July" <?php if($selected_month == 'July'){ echo 'selected';}?>>July</option>
												<option value="August" <?php if($selected_month == 'August'){ echo 'selected';}?>>August</option>
												<option value="September" <?php if($selected_month == 'September'){ echo 'selected';}?>>September</option>
												<option value="October" <?php if($selected_month == 'October'){ echo 'selected';}?>>October</option>
												<option value="November" <?php if($selected_month == 'November'){ echo 'selected';}?>>November</option>
												<option value="December" <?php if($selected_month == 'December'){ echo 'selected';}?>>December</option>
											</select>	
										</div>				
									</div>

									<!-- <div class="col-sm-3">
										<div class="form-group">
											<label>Session Year<span class="req">*</span></label>
											<input type="text" id="exam_year" name="exam_year" class="form-control" placeholder="eg. 2022" required>
										</div>				
									</div> -->

									<div class="col-sm-3">
										<div class="form-group">
											<label>Session Year<span class="req">*</span></label>
											<select name="exam_year" id="exam_year" class="form-control js-example-basic-single">
												<option value="">Select Exam Year</option>
												<?php
														if (!empty($student) && property_exists($student, 'exam_year')) {
															$selected_year = $student->exam_year;
														} else {
															$selected_year = ''; 
														}
												?>
												<?php for($exam_year=2024;$exam_year <= date("Y");$exam_year++){?>
												<option value="<?=$exam_year?>" <?php if($selected_year == $exam_year){ echo 'selected';}?>><?=$exam_year?></option>
												<?php }?>
											</select>	
										</div>				
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Course<span class="req">*</span></label>
											<input type="text" readonly id="course_name" name="course_name" class="form-control" value="<?php if(!empty($student)){ echo $student->course_name;}?>">
										</div>				
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Stream <span class="req">*</span></label>
											<input type="text" readonly id="stream_name" name="stream_name" class="form-control" value="<?php if(!empty($student)){ echo $student->stream_name;}?>">
										</div>
									</div>
									<!-- <div class="col-sm-3">
										<div class="form-group">
											<label>Semester/Year <span class="req">*</span></label>
											<select id="year_sem" name="year_sem" class="form-control">
												<?php for($i=1;$i<=12;$i++){?>
												<option value="<?=$i?>"><?=$i?></option>
												<?php }?>
											</select>
										</div>
									</div>  -->
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
											<select id="exam_mode_type" name="exam_mode_type" class="form-control" required>
												<option value="">Select Exam Type</option>
												<option value="1">Offline</option>
												<option value="2">Online</option>
												<!--<option value="2">By Challan</option>
												-->
											</select>
										</div>				
									</div>
									<div class="col-sm-3" style="display:none">
										<div class="form-group">
											<label>Payment Mode <span class="req">*</span></label>
											<select id="payment_mode" name="payment_mode" class="form-control">  
												<option value="3">Cash</option>  
											</select>
										</div>				
									</div> 
									<div class="col-md-12"> 
										<div class="row">
											<div class="col-md-12 edu">
												<div class="form-group">
													<label></label>
													<button type="submit" class="btn btn-primary" name="register" id="register">Submit</button>
													<div class="pull-right"></div>
												</div>
											</div>	
										</div>
									</div>	
								</div>
							</div>
						</form>
				  <?php }?>
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
 $.validator.addMethod("noHTMLtags", function(value, element) {
    var htmlPattern = /<\/?[^>]+(>|$)/g;
    return !htmlPattern.test(value);
}, "HTML tags are not allowed!");
$("#verification_form").validate({ 
	ignore:[], 
	rules: { 
		enrollment_number: { 
			required: true, 
			noHTMLtags: true, 
		},	 
	}, 
	messages: { 
		enrollment_number: { 
			required: "Please enter enrollment number!", 
			noHTMLtags:"HTML tags not allowed!", 
		}, 
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});
 
  
$("#exam_form").validate({ 
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
		session: {
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
		exam_mode_type: {
			required: true,
			noHTMLtags: true,
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
		session: {
			required: "Please enter session!", 
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
		exam_mode_type: {
			required: "Please select exam type!",
			noHTMLtags: "HTML tags not allowed!",
		}, 
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});
 </script>
 