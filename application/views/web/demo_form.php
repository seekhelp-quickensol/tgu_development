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
		<div class="header_cc_area" style="background-image:url('images/header_area.jpg')">
			<div class="container">
				<div class="row">
					<h1>Demo Payment Form</h1>
					<p>Payment Form</p>
				</div>
			</div>
		</div>
		<div class="uni_mainWrapper">
			<div class="container">
				<div class="row">	
					<div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4">
						<div class="online_wrapper">
							<div class="admission_div">
								<form method="post" name="admission_form" id="admission_form" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="common_details">
												<div class="col-md-12">
													<h3>Payment Details</h3>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<!--<div class="col-md-12">
												<div class="form-group">
													<label>Payment For <span class="req">*</span></label>
													<select name="payment_for" id="payment_for" class="form-control">
														<option value="">Please Select Payment For</option>
														<option value="1">Student</option>
														<option value="2">Center</option>
													</select>
												</div>
											</div>-->
											<div class="col-md-12">
												<div class="form-group">
													<label>Enrollment Number <span class="req">*</span></label>
													<input type="text" name="enrollment_number" id="enrollment_number" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Student Name <span class="req">*</span></label>
													<input type="text" name="student_name" id="student_name" readonly class="form-control charector" >
													<input type="hidden" name="student_id" id="student_id" class="form-control" >
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Mobile Number <span class="req">*</span></label>
													<input type="text" name="mobile_number" id="mobile_number" readonly class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Email <span class="req">*</span></label>
													<input type="text" name="email" id="email" readonly class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Fees Type <span class="req">*</span></label>
													<select name="fees_type" id="fees_type" class="form-control">
														<option value="">Please Select Fees Type</option>
														<option value="1">Admission Fees</option>
														<option value="2">Exam Fees</option>
														<option value="3">Re-Exam Fees</option>
														<option value="4">Tuition Fees</option>
													</select>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Total Fees <span class="req">*</span></label>
													<input type="text" name="total_fees" id="total_fees" class="form-control">
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label></label>
											<button type="submit" class="btn btn-primary" name="register" id="register">Submit</button>
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
<?php include("footer.php");?>

<script>

$("#enrollment_number").keyup(function(){
	$('#student_name').val('');
	$('#student_id').val('');
	$('#mobile_number').val('');
	$('#email').val('');
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_student_data_ajax",
		data:{'enrollment_number':$("#enrollment_number").val()},
		success: function(data){
			if(data != ""){
				var opts = $.parseJSON(data);
				$('#student_name').val(opts.student_name);
				$('#student_id').val(opts.id);
				$('#mobile_number').val(opts.mobile);
				$('#email').val(opts.email);
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});

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
		enrollment_number: "required",	
		fees_type: "required",		
		total_fees: "required",		
	},
	messages: {
		enrollment_number: "Please enter Full name!",
		fees_type: "Please select fees type!",
		total_fees: "Please enter total fees!",
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});


</script>