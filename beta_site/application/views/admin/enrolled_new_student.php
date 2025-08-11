<?php

// echo "<pre>";print_r($student);exit;
include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Enrollment  Setting
					<a href="<?=base_url();?>new_pending_student" class="btn btn-primary mr-2 float-right">Back</a>
				  </h4>
				  
					<?php 
					if($this->session->userdata('enroled_password') == ""){ ?>
					<p class="card-description">Please enter password details</p>
					<form class="forms-sample" name="password_form" id="password_form" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Password *</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>
							</div>
						</div>
						<button type="submit" id="validate_password" name="validate_password" value="validate_password" class="btn btn-primary mr-2">Validate</button>
					</form>
				  
					<?php }else{?>
					  <p class="card-description">
						Please enter student fees details
					  </p>
				  
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Student Name *</label>
                      <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Student Name" value="<?php if(!empty($student)){ echo $student->student_name;}?>" readonly>
                    </div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Father Name *</label>
                      <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name" value="<?php if(!empty($student)){ echo $student->father_name;}?>" readonly>
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mother Name *</label>
                      <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name" value="<?php if(!empty($student)){ echo $student->mother_name;}?>" readonly>
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date of Birth*</label>
                      <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="<?php if(!empty($student)){ echo date("d-m-Y",strtotime($student->date_of_birth));}?>" readonly>
                    </div>
					</div>
					</div>
					<div class="row">
					
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Mobile Number *</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" value="<?php if(!empty($student)){ echo $student->mobile;}?>" readonly>
                    </div>
					</div>
					
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email *</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php if(!empty($student)){ echo $student->email;}?>" readonly>
                    </div>
					</div>
					
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Registration ID *</label>
                      <input type="text" class="form-control" id="registration_id" name="registration_id" placeholder="Registration ID" value="<?php if(!empty($student)){ echo $student->id;}?>" readonly>
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Session </label>
                      <input type="text" class="form-control" id="session" name="session" placeholder="Session" value="<?php if(!empty($student)){ echo $student->session_name;}?>" readonly>
                    </div>
					</div>
					
					</div>
					<div class="row">
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Faculty </label>
                      <input type="text" class="form-control" id="faculty" name="faculty" placeholder="Faculty" value="<?php if(!empty($student)){ echo $student->faculty_name;}?>" readonly>
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Course Type *</label>
                      <input type="text" class="form-control" id="course_type" name="course_type" placeholder="Course Type" value="<?php if(!empty($student)){ echo $student->course_type_name;}?>" readonly>
                    </div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Course Name *</label>
                      <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Course Name"  value="<?php if(!empty($student)){ echo $student->course_name;}?>" readonly>
					  </div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Stream *</label>
                      <input type="text" class="form-control" id="stream_name" name="stream_name" placeholder="Stream Name"  value="<?php if(!empty($student)){ echo $student->stream_name;}?>" readonly>
					  </div>
					</div>
					</div>
					
					<div class="row">
					
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Year/Sem *</label>
                      <select class="form-control js-example-basic-single" id="year_sem" name="year_sem">
						<?php for($y=1;$y<=10;$y++){?>
						<option value="<?=$y?>" <?php if(!empty($fees) && $fees->year_sem == $y){ ?>selected="selected"<?php }?>><?=$y?></option>
						<?php }?>
						</select>
					  </div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Bank *</label>
                      <select class="form-control js-example-basic-single" id="bank" name="bank">
						<option value="">Select</option>
						<?php if(!empty($bank)){ foreach($bank as $bank_result){?>
						<option value="<?=$bank_result->id?>" <?php if(!empty($fees) && $fees->bank_id == $bank_result->id){?>selected="selected"<?php }?>><?=$bank_result->bank_name?> | <?=$bank_result->account_number?></option>
						<?php }}?>
					  </select>
					  </div>
					</div>
					
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Payment Mode *</label>
						<select class="form-control js-example-basic-single" id="payment_mode" name="payment_mode">
						<option value="">Select</option>
						<option value="1" <?php if(!empty($fees) && $fees->payment_mode == "1"){?>selected="selected"<?php }?>>Online</option>
						<option value="2" <?php if(!empty($fees) && $fees->payment_mode == "2"){?>selected="selected"<?php }?>>By Challan</option>
						<option value="3" <?php if(!empty($fees) && $fees->payment_mode == "3"){?>selected="selected"<?php }?>>By Cash</option>
					  </select>
					 </div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Payment Date *</label>
                      <input type="text" class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Payment Date"  value="<?php if(!empty($fees)){ echo date("d-m-Y",strtotime($fees->payment_date));}?>">
					  </div>
					</div>
					</div>
					<div class="row">
					
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Transaction Number *</label>
                      <input type="text" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction Number"  value="<?php if(!empty($fees)){ echo $fees->transaction_id;}?>">
					  <div class="error" id="transaction_error"></div>
					  </div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Payment Status *</label>
                      <select class="form-control js-example-basic-single" id="payment_status" name="payment_status">
						<option value="">Select</option>
						<option value="1" <?php if(!empty($fees) && $fees->payment_status == '1'){?>selected="selected"<?php }?>>Success</option>
						<option value="0" <?php if(!empty($fees) && $fees->payment_status == '0'){?>selected="selected"<?php }?>>Failed</option>
					  </select>
					  </div>
					</div>
					<?php //$real_fee = $this->Student_model->get_student_enrolled_fees_cal($student->id);?>
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Late Fees *</label>
                      <input type="text" class="form-control discount" id="late_fees" name="late_fees" placeholder="Late Fees"  value="<?php if(!empty($fees)){ echo $fees->late_fees;}?>">
					  </div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Bank Fees *</label>
                      <input type="text" class="form-control discount" id="bank_fees" name="bank_fees" placeholder="Bank Fees"  value="<?php if(!empty($fees)){ echo $fees->bank_fees;}?>">
					  </div>
					</div>
					
					</div>
					<div class="row">
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Discount (in %) *</label>
                      <input type="text" class="form-control discount" id="discount" name="discount" placeholder="Discount"  value="<?php if(!empty($fees)){ echo $fees->discount;}?>">
					  </div>
					</div>

					<?php if(isset($student) && is_object($student) && $student->admission_type != "0"){ ?>
					<?php
						//  if($student->admission_type != "0"){
					?>
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Lateral Fees *</label>
                      <input type="text" class="form-control" id="lateral_entry_fees" name="lateral_entry_fees" placeholder="Lateral Fees"  value="<?php if(!empty($fees)){ echo $fees->lateral_entry_fees;}?>" readonly>
					  </div>
					</div>
					<?php }else{?>
					  <input type="hidden" class="form-control" id="lateral_entry_fees" name="lateral_entry_fees" placeholder="Lateral Fees"  value="<?php if(!empty($fees)){ echo $fees->lateral_entry_fees;}?>" readonly>
					
					<?php }?>
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Admission Fees *</label>
                      <input type="text" class="form-control" id="amount" name="amount" placeholder="Admission Fees"  value="<?php if(!empty($fees)){ echo $fees->amount;}?>" readonly>
                      <input type="hidden" class="form-control" id="hidden_amount" name="hidden_amount" value="<?php if(!empty($fees)){ echo $fees->amount;}?>">
                      <input type="hidden" class="form-control" id="original_amount" name="original_amount" value="<?php if(!empty($fees)){ echo $fees->original_amount;}?>">
					  </div>
					</div>
					
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Total Fees *</label>
                      <input type="text" class="form-control" id="total_fees" name="total_fees" placeholder="Total Fees"  value="<?php if(!empty($fees)){ echo $fees->total_fees;}?>" readonly>
					  </div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Remark</label>
                      <input type="text" class="form-control" id="remark" name="remark" placeholder="Remark"  value="<?php if(!empty($fees)){ echo $fees->remark;}?>">
                      <input type="hidden" class="form-control" id="student_id" name="student_id"  value="<?php if(!empty($student)){ echo $student->id;}?>">
                      <input type="hidden" class="form-control" id="fees_id" name="fees_id"  value="<?php if(!empty($fees)){ echo $fees->id;}?>">
					  </div>
					</div>
					
					
					
					</div>
					
					
                    <button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
                    
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
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	


	$.validator.addMethod("noSpaceatfirst", function (value, element) {
		return this.optional(element) || /^\s/.test(value) === false;
	}, "First Letter Can't Be Space!");

	$('#single_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			student_name: {
				required: true,
			},
			father_name: {
				required: true,
			},
			mother_name: {
				required: true,
			},
			date_of_birth: {
				required: true,
			},
			registration_id: {
				required: true,
			},
			email: {
				required: true,
				validate_email: true,
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
			faculty: {
				required: true,
			},
			course_type: {
				required: true,
			},
			course_name: {
				required: true,
			},
			stream_name: {
				required: true,
			},
			year_sem: {
				required: true,
			},
			bank: {
				required: true,
			},
			payment_mode: {
				required: true,
			},
			payment_date: {
				required: true,
			},
			transaction_id: {
				required: true,
				noSpaceatfirst:true,
			},
			payment_status: {
				required: true,
			},
			late_fees: {
				required: true,
				number: true,
			},
			bank_fees: {
				required: true,
				number: true,
			},
			amount: {
				required: true,
				number: true,
			},
			discount: {
				required: true,
				number: true,
			},
			total_fees: {
				required: true,
				number: true,
			},
			remark:{
				noSpaceatfirst: true,
			},
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
			date_of_birth: {
				required: "Please enter select date of birth",
			},
			registration_id: {
				required: "Please enter registration id",
			},
			email: {
				required: "Please enter valid email",
				validate_email: "Please enter valid email",
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
			faculty: {
				required: "Please enter faculty name",
			},
			course_type: {
				required: "Please enter course type",
			},
			course_name: {
				required: "Please enter course name",
			},
			stream_name: {
				required: "Please enter stream name",
			},
			year_sem: {
				required: "Please enter year/sem",
			},
			bank: {
				required: "Please select bank",
			},
			payment_mode: {
				required: "Please select payment mode",
			},
			payment_date: {
				required: "Please select payment date",
			},
			transaction_id: {
				required: "Please enter transaction number",
				noSpaceatfirst: "First letter can't be space",
			},
			payment_status: {
				required: "Please select payment status",
			},
			late_fees: {
				required: "Please enter late fees",
				number: "Please enter valid late fees",
			},
			bank_fees: {
				required: "Please enter bank fees",
				number: "Please enter valid bank fees",
			},
			amount: {
				required: "Please enter admission fees",
				number: "Please enter valid admission fees",
			},
			discount: {
				required: "Please enter discount",
				number: "Please enter valid discount",
			},
			total_fees: {
				required: "Please enter total fees",
				number: "Please enter valid total fees",
			},
			remark:{
				noSpaceatfirst: "First letter can't be space",
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
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
});
$("#transaction_id").keyup(function(){
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_transaction",
		data:{'transaction_id':$("#transaction_id").val(),'fees':$("#fees_id").val()},
		success: function(data){
			if(data == "0"){
				$("#single_button").show();
				$("#transaction_error").html("");
			}else{
				$("#single_button").hide();
				$("#transaction_error").html("This transaction number is already in used");
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$(".discount").keyup(function(){
	var main = $('#hidden_amount').val();
	var disc = $('#discount').val();
	var dec = (disc / 100).toFixed(2);
	var mult = main * dec;
	var discont = main - mult;
	
	$("#amount").val(discont);
	var total_amount = parseInt($("#late_fees").val())+parseInt($("#bank_fees").val())+parseInt($("#amount").val());
	$("#total_fees").val(parseInt(total_amount));
});


$('#bank').on('change', function() {
    $('#bank').valid();
});


$('#payment_mode').on('change', function() {
    $('#payment_mode').valid();
});

</script>
 