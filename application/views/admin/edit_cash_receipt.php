<?php
// echo "<pre>";print_r($course);exit;
include('header.php');?>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/select2.min.css">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Update Cash Receipt</h4><p class="card-description">
                  <form class="forms-sample" name="relation_form" id="relation_form" method="Post" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    <div class="row"> 

							<div class="col-lg-4 col-md-4">

								<div class="form-group">	

									<label>Registration/Enrollment Number</label> 

									<input type="text" name="registration_number" id="registration_number" class="form-control" placeholder="Enter Your Registration Number" value="<?php if(!empty($single)){ echo $single->registration_id;}?>">
									<input type="hidden" name="hidden_id" id="hidden_id" class="form-control" placeholder="Enter Your Registration Number" value="<?php if(!empty($single)){ echo $single->id;}?>">

								</div>

							</div>  

							<div class="col-lg-4 col-md-4"> 

								<div class="form-group"> 

									<label>Name of Student<span class="req">*</span></label> 

									<input type="text" name="name" id="name" class="form-control charector" placeholder="Please enter name" value="<?php if(!empty($single)){ echo $single->name;}?>"> 

								</div> 

							</div>   

							<div class="col-lg-4 col-md-4"> 

								<div class="form-group"> 

									<label>Mobile Number<span class="req">*</span></label> 

									<input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Please enter mobile number" value="<?php if(!empty($single)){ echo $single->mobile_number;}?>"> 

								</div> 

							</div>  

							<div class="col-lg-4 col-md-4"> 

								<div class="form-group"> 

									<label>Email<span class="req">*</span></label> 

									<input type="text" name="email" id="email" class="form-control" placeholder="Please enter email" value="<?php if(!empty($single)){ echo $single->email;}?>"> 

								</div> 

							</div>  

							<div class="col-lg-4 col-md-4"> 

								<div class="form-group"> 

									<label>Course<span class="req">*</span></label> 

									<select id="course" name="course" class="form-control select2_single"> 

										<option value="">Select Course</option> 

										<?php if(!empty($course)){

											foreach($course as $course_result){

										?> 

										<option value="<?=$course_result->course_name;?>" <?php if(!empty($single) && $single->course == $course_result->course_name){?>selected<?php }?>><?=$course_result->course_name;?></option> 

										<?php }} ?>	 

									</select> 

									<label style="display:none;" id="course-error" class="error" for="course">Please select course name</label>

								</div>			 

							</div>
								<?php 
									$stream = [];
									if(!empty($single)){
										$stream = $this->Admin_model->get_course_streams($single->course);
									}
								
								?>
								<div class="col-lg-4 col-md-4"> 

								<div class="form-group"> 

									<label>Stream<span class="req">*</span></label> 

									<select id="stream" name="stream" class="form-control select2_single"> 

										<option value="">Select Stream</option> 
										<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
											<option value="<?=$stream_result->stream_name;?>" <?php if(!empty($single) && $single->stream == $stream_result->stream_name){?>selected<?php }?>><?=$stream_result->stream_name;?></option> 
										<?php }} ?>
									</select>  

								</div>			 

							</div>

								

							<div class="col-lg-4 col-md-4">

										<div class="form-group">

											<label>Year/Sem<span class="req">*</span></label>

											<select id="year_sem" name="year_sem" class="form-control select2_single">

												<option value="">Select Year/Sem</option> 

												<option value="1" <?php if(!empty($single) && $single->year_sem == '1'){?>selected<?php }?>>1</option> 

												<option value="2" <?php if(!empty($single) && $single->year_sem == '2'){?>selected<?php }?>>2</option> 

												<option value="3" <?php if(!empty($single) && $single->year_sem == '3'){?>selected<?php }?>>3</option> 

												<option value="4" <?php if(!empty($single) && $single->year_sem == '4'){?>selected<?php }?>>4</option> 

												<option value="5" <?php if(!empty($single) && $single->year_sem == '5'){?>selected<?php }?>>5</option> 

												<option value="6" <?php if(!empty($single) && $single->year_sem == '6'){?>selected<?php }?>>6</option> 

												<option value="7" <?php if(!empty($single) && $single->year_sem == '7'){?>selected<?php }?>>7</option> 

												<option value="8" <?php if(!empty($single) && $single->year_sem == '8'){?>selected<?php }?>>8</option> 

												<option value="9" <?php if(!empty($single) && $single->year_sem == '9'){?>selected<?php }?>>9</option> 

												<option value="10" <?php if(!empty($single) && $single->year_sem == '10'){?>selected<?php }?>>10</option> 

												<option value="11" <?php if(!empty($single) && $single->year_sem == '11'){?>selected<?php }?>>11</option> 

												<option value="12" <?php if(!empty($single) && $single->year_sem == '12'){?>selected<?php }?>>12</option> 

												

											</select>

											<label style="display:none;" id="year_sem-error" class="error" for="year_sem">Please select year/sem</label>

										</div>				

									</div>

									

									

							<div class="col-lg-4 col-md-4">

										<div class="form-group">

											<label>Payment For<span class="req">*</span></label>

											<select name="pay_for" id="pay_for" class="form-control select2_single">

												<option value="">Select Fees</option> 

												<option value="Registration Fees" <?php if(!empty($single) && $single->pay_for == 'Registration Fees'){?>selected<?php }?>>Registration Fees</option> 

												<option value="Tution Fees" <?php if(!empty($single) && $single->pay_for == 'Tution Fees'){?>selected<?php }?>>Tution Fees</option>

												<option value="Exam Fees" <?php if(!empty($single) && $single->pay_for == 'Exam Fees'){?>selected<?php }?>>Exam Fees</option>
												<option value="Re Appear Examination" <?php if(!empty($single) && $single->pay_for == 'Re Appear Examination'){?>selected<?php }?>>Re Appear Examination</option>

												<option value="Migration Fees" <?php if(!empty($single) && $single->pay_for == 'Migration Fees'){?>selected<?php }?>>Migration Fees</option>

												<option value="Convocation Fees" <?php if(!empty($single) && $single->pay_for == 'Convocation Fees'){?>selected<?php }?>>Convocation Fees</option>

												<option value="Degree Fees" <?php if(!empty($single) && $single->pay_for == 'Degree Fees'){?>selected<?php }?>>Degree Fees</option>

												<option value="TC Fees" <?php if(!empty($single) && $single->pay_for == 'TC Fees'){?>selected<?php }?>>TC Fees</option>

												<option value="Other" <?php if(!empty($single) && $single->pay_for == 'Other'){?>selected<?php }?>>Other</option>

											</select>

											<label style="display:none;" id="pay_for-error" class="error" for="pay_for">Please select payment reason</label>

										</div>

									</div>

									

								

							<div class="col-lg-4 col-md-4">

										<div class="form-group">

											<label>Date of Payment <span class="req">*</span></label>

											<input type="text" name="date_of_payment" id="date_of_payment" class="form-control datepicker" placeholder="DD-MM-YY" value="<?php if(!empty($single)){ echo $single->date_of_payment;}?>">

										</div>

									</div>

									

								

							<div class="col-lg-4 col-md-4">

										<div class="form-group">

											<label>Amount <span class="req">*</span></label>

											<input autocomplete="off" type="text" name="amount" id="amount" class="form-control number_only" placeholder="Please enter amount" value="<?php if(!empty($single)){ echo $single->amount;}?>">

											<div class="error" id="mobile_error"></div>

										</div>

									</div>

									

								

							<div class="col-lg-4 col-md-4">

								<div class="form-group">

									<label>Payment Mode <span class="req">*</span></label>

									<select name="payment_mode" id="payment_mode" class="form-control select2_single">

										<option value="">Select Mode</option>

										<option value="Cash" <?php if(!empty($single) && $single->payment_mode == 'Cash'){?>selected<?php }?>>Cash</option>

										<option value="IMPS" <?php if(!empty($single) && $single->payment_mode == 'IMPS'){?>selected<?php }?>>IMPS</option>

										<option value="NEFT" <?php if(!empty($single) && $single->payment_mode == 'NEFT'){?>selected<?php }?>>NEFT</option>

										<option value="RTGS" <?php if(!empty($single) && $single->payment_mode == 'RTGS'){?>selected<?php }?>>RTGS</option>

										<option value="UPI Payments" <?php if(!empty($single) && $single->payment_mode == 'UPI Payments'){?>selected<?php }?>>UPI Payments</option>

									</select>

									<label style="display:none;" id="payment_mode-error" class="error" for="payment_mode">Please select payment mode</label>

								</div>

							</div>

								

							<div class="col-lg-4 col-md-4">

								<div class="form-group">

									<label>Transaction ID <span class="req">*</span></label>

									<input autocomplete="off" type="text" name="transaction_id" id="transaction_id" class="form-control" placeholder="Transaction ID" value="<?php if(!empty($single)){ echo $single->transaction_id;}?>">

								</div>

							</div>

									

									

							<div class="col-lg-4 col-md-4">

										<div class="form-group">

											<label>Collected By <span class="req">*</span></label>

											<input autocomplete="off" type="text" name="collected_by" id="collected_by" class="form-control" placeholder="Collected by" value="<?php if(!empty($single)){ echo $single->collected_by;}?>">

											<div class="error" id="mobile_error"></div>

										</div>

									</div>

									

								

									<div class="col-lg-4 col-md-4">

										<div class="form-group">

											<label>Address of Student <span class="req">*</span></label>

											<textarea autocomplete="off" type="text" name="address" id="address" class="form-control" placeholder="Please enter address"><?php if(!empty($single)){ echo $single->address;}?></textarea>

										</div>

									</div>
					 
					<div class="col-lg-12 col-md-12">
						<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
					</div>
                  </form>
                </div>
              </div>
            </div>
			
          </div>
        </div>
      
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>

<script src="<?= base_url() ?>assets/js/select2.full.js"></script>

<script>
	$(document).ready(function() {
		$(".select2_single").select2({
			// placeholder: "Select a record",
			allowClear: true
		});
	});
	
	
	$("#course").change(function(){    

		$.ajax({

			type: "POST",

			url: "<?=base_url();?>web/Web_controller/get_course_stream_by_name",

			data:{'course':$("#course").val()},

			success: function(data){

				$("#stream").empty();

				$('#stream').append('<option value="">Select Stream</option>');

				var opts = $.parseJSON(data);

				$.each(opts, function(i, d) {

					$('#stream').append('<option value="' + d.stream_name + '">' + d.stream_name + '</option>');

				  // var selectedStream = ($('#pre_stream').val() == d.id) ? 'selected="selected"' : '';

					//$('#stream').append('<option value="' + d.id + '" ' + selectedStream + '>' + d.student_stream_name + '</option>');

				});

				$('#stream').trigger('change');

			},

			 error: function(jqXHR, textStatus, errorThrown) {

			   console.log(textStatus, errorThrown);

			}

		});	

	});
	
	
	
	$("#payment_form").validate({

		ignore: ":hidden:not(select)",

		rules: {

			name: {required:true,noHTMLtags:true}, 

			email: {required:true,email:true,noHTMLtags:true}, 

			mobile_number: {required:true,number:true,minlength:10,maxlength:10,noHTMLtags:true}, 

			course: {required:true,noHTMLtags:true}, 

			year_sem: {required:true,noHTMLtags:true}, 

			pay_for: {required:true,noHTMLtags:true}, 

			date_of_payment: {required:true,noHTMLtags:true}, 

			amount: {required:true,number:true,noHTMLtags:true}, 

			payment_mode: {required:true,noHTMLtags:true}, 

			transaction_id: {required:true,noHTMLtags:true}, 

			collected_by: {required:true,noHTMLtags:true}, 

			address: {required:true,noHTMLtags:true}, 

		},

		messages: {

			name: {required:"Please enter name",noHTMLtags:"HTML tags not allowed!"},	 

			email: {required:"Please enter email",email:"Please enter valid email",noHTMLtags:"Please enter valid value"}, 

			mobile_number: {required:"Please enter mobile number",number:"Please enter valid number",minlength:"Please enter 10 digit mobile number",maxlength:"Please enter 10 digit mobile number",noHTMLtags:true}, 

			course: {required:"Please select course name",noHTMLtags:"Please enter name"}, 

			year_sem: {required:"Please select year/sem",noHTMLtags:"Please enter name"}, 

			pay_for: {required:"Please select payment reason",noHTMLtags:"Please enter name"}, 

			date_of_payment: {required:"Please select payment date",noHTMLtags:"Please enter valid value"}, 

			amount: {required:"Please enter amount",number:"Please enter only number",noHTMLtags:"Please enter valid value"}, 

			payment_mode: {required:"Please select payment mode",noHTMLtags:"Please enter valid value"}, 

			transaction_id: {required:"Please enter transaction id",noHTMLtags:"Please enter valid value"}, 

			collected_by: {required:"Please enter collected by",noHTMLtags:"Please enter valid value"}, 

			address: {required:"Please enter address",noHTMLtags:"Please enter valid value"}, 

		}, 

		submitHandler: function(form){

			form.submit();

		} 

	});
</script>

 