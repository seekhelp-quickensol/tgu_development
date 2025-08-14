<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<ul class="nav nav-tabs tab-no-active-fill" role="tablist">
						<li class="nav-item">
							<a class="nav-link active pl-2 pr-2" id="revenue-for-last-month-tab" data-toggle="tab" href="#revenue-for-last-month" role="tab" aria-controls="revenue-for-last-month" aria-selected="true">Self & Parent Assessment Form</a>
						</li>
						<li class="nav-item">
							<a class="nav-link pl-2 pr-2" id="data-managed-tab" data-toggle="tab" href="#data-managed" role="tab" aria-controls="data-managed" aria-selected="false">Teachers Assessment Form</a>
						</li>
						
					</ul>
					<div class="tab-content tab-no-active-fill-tab-content">
						<div class="tab-pane fade show active" id="revenue-for-last-month" role="tabpanel" aria-labelledby="revenue-for-last-month-tab">
							<div class="d-lg-flex justify-content-between">
								<div class="col-lg-12">
									<form method="post" name="self_form" id="self_form" enctype="multipart/form-data">
										<table class="table table-responsive table-bordered" width="100%">
											<tbody>
												<tr>
													<td>Form Name</td>
													<td style="text-align:center">Download Form</td>
													<td>Sem/Year</td>
													<td>Upload Form(pdf,jpg,png)</td>
												</tr>
												<tr>
													<td>SELF ASSESSMENT & PARENT ASSESSMENT FORM</td>
													<td style="text-align:center">
														<a target="_blank" href="<?=base_url();?>images/assessment/self-&-parent-assessment-form.pdf" download="" class="btn btn-primary">Download Form</a>
													</td>
													<td style="text-align:center">
														<select class="form-control" name="year_sem" id="year_sem" required="">
															<option value="">Select Your Sem/Year</option>
															<?php for($y=1;$y<=12;$y++){?>
															<option value="<?=$y?>"><?=$y?></option>
															<?php }?>
														</select>
													</td>
													<td style="text-align:center">
														<input type="file" width="25%" class="form-control" name="userfile" id="userfile" required="">
													</td>
													<td style="text-align:center">
														<input class="btn btn-sm btn-primary" type="submit" name="save" value="Upload Form">
													</td>
												</tr>
											</tbody>
										</table>
										
									</form>	
									<table class="table  table-bordered" width="100%">
										<tbody>
											<tr>
												<td>Year/Sem</td>
												<td>View</td>
											</tr>
											<?php if(!empty($self_assement)){ foreach($self_assement as $self_assement_result){?>
												<tr>
													<td><?=$self_assement_result->year_sem?></td>
													<td><a href="<?=base_url();?>uploads/assesment_form/self_assement/<?=$self_assement_result->file?>" target="_blank"><i class="mdi mdi-eye"></i></a></td>
												</tr>
											<?php }}?>
										</tbody>
									</table>
							</div>
							</div> 
						</div> 
						<div class="tab-pane fade" id="data-managed" role="tabpanel" aria-labelledby="data-managed-tab">
							<div class="d-flex justify-content-between">
								<div class="col-lg-12">
									<form method="post" name="teacher_form" id="teacher_form" enctype="multipart/form-data">
										<table class="table table-responsive table-bordered" width="100%">
											<tbody>
												<tr>
													<td>Form Name</td>
													<td style="text-align:center">Download Form</td>
													<td>Sem/Year</td>
													<td>Upload Form(pdf,jpg,png)</td>
												</tr>
												<tr>
													<td>TEACHER ASSESSMENT FORM</td>
													<td style="text-align:center">
														<a target="_blank" href="<?=base_url();?>images/assessment/teacher-assessment-form.pdf" download="" class="btn btn-primary">Download Form</a>
													</td>
													<td style="text-align:center">
														<select class="form-control" name="year_sem" id="year_sem" required="">
															<option value="">Select Your Sem/Year</option>
															<?php for($y=1;$y<=12;$y++){?>
															<option value="<?=$y?>"><?=$y?></option>
															<?php }?>
														</select>
													</td>
													<td style="text-align:center">
														<input type="file" width="25%" class="form-control" name="userfile" id="userfile" required="">
													</td>
													<td style="text-align:center">
														<input class="btn btn-sm btn-primary" type="submit" name="teacher" value="Upload Form">
													</td>
												</tr>
											</tbody>
										</table>
										
									</form>	
									<table class="table  table-bordered" width="100%">
										<tbody>
											<tr>
												<td>Year/Sem</td>
												<td>View</td>
											</tr>
											<?php if(!empty($teacher_assement)){ foreach($teacher_assement as $teacher_assement_result){?>
												<tr>
													<td><?=$teacher_assement_result->year_sem?></td>
													<td><a href="<?=base_url();?>uploads/assesment_form/teacher_assement/<?=$teacher_assement_result->file?>" target="_blank"><i class="mdi mdi-eye"></i></a></td>
												</tr>
											<?php }}?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
              </div>
            </div>
          </div>
        </div>
      
<?php include('footer.php');?>
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#password_form').validate({
		rules: {
			old_password: {
				required: true,
			},
			new_password: {
				required: true,
			},
			confirm_password: {
				required: true,
				equalTo:"#new_password",
			},
		},
		messages: {
			old_password: {
				required: "Please enter your old password",
			},
			new_password: {
				required: "Please enter your new password",
			},
			confirm_password: {
				required: "Please enter confirm password",
				EqualTo: "Password does not match",
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
	
$("#old_password").keyup(function(){
	$.ajax({
	   type: "POST",
	   url: "<?=base_url();?>student/Student_controller/get_old_password",
	   data:{'old_password':$("#old_password").val()},
	   success: function(data){console.log(data);
		 if(data == "0"){
			 $(".password_submit").hide();
			 $("#password_error").html("Password does not match");
		 }else{
			 $(".password_submit").show();
			 $("#password_error").html("");
		 }
	   },
	  error: function(jqXHR, textStatus, errorThrown) {
		console.log(textStatus, errorThrown);
	   }
	});  
});
 </script>
 