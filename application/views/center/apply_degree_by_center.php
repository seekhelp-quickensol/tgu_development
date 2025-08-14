<?php include('header.php');
if(empty($student)){
	$this->session->set_flashdata('message','Please enter valid enrollment number');
	redirect('center_apply_degree');
}
?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Apply for degree</h4>
                  <p class="card-description">
                    Please enter enrollment number
                  </p>
					<form class="forms-sample" name="paper_form" id="paper_form" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Enrollment Number*</label>
									<input type="text" readonly class="form-control" id="enrollment_number" name="enrollment_number" value="<?=$student->enrollment_number?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Student Name*</label>
									<input type="text" readonly class="form-control" id="student_name" name="student_name" value="<?=$student->student_name?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Course Name*</label>
									<input type="text" readonly class="form-control" id="course_name" name="course_name" value="<?=$student->print_name?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Stream Name*</label>
									<input type="text" readonly class="form-control" id="stream_name" name="stream_name" value="<?=$student->stream_name?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Session*</label>
									<input type="text" readonly class="form-control" id="session_name" name="session_name" value="<?=$student->session_name?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Father Name*</label>
									<input type="text" readonly class="form-control" id="father_name" name="father_name" value="<?=$student->father_name?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Mother Name*</label>
									<input type="text" readonly class="form-control" id="mother_name" name="mother_name" value="<?=$student->mother_name?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Email*</label>
									<input type="text" readonly class="form-control" id="email" name="email" value="<?=$student->email?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Mobile Number*</label>
									<input type="text" readonly class="form-control" id="mobile_number" name="mobile_number" value="<?=$student->mobile?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Payment*</label>
									<input type="text" readonly class="form-control" id="payment" name="payment" value="<?php if($this->session->userdata('center_id') == 9){ echo "10000";}else{ echo "3500";}?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Payment Mode*</label>
									<select class="form-control" id="payment_mode" name="payment_mode">
										<option value="1">Online</option>
										<option value="0">Manual</option>
									</select>
								</div>
							</div>
						</div>
						<?php 
							$qualification = $this->Center_details_model->get_admission_qualification_during_degree($student->id);
						?>
						<div class="row edu">
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Year<span class="req">*</span></label>
											<input type="text" required name="secondary_year" id="secondary_year"  class="form-control" maxlength="4" placeholder="Secondary Year" value="<?php if(!empty($qualification)){ echo $qualification->secondary_year;}?>">
											<input type="hidden" required name="student_id" id="student_id"  class="form-control" value="<?=$student->id?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Board<span class="req">*</span></label>
											<input type="text" name="secondary_university" id="secondary_university"  class="form-control" placeholder="Secondary Board" value="<?php if(!empty($qualification)){ echo $qualification->secondary_university;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Marks<span class="req">*</span></label>
											<input type="text" name="secondary_marks" id="secondary_marks"  class="form-control" placeholder="Secondary Marks" value="<?php if(!empty($qualification)){ echo $qualification->secondary_marks;}?>">
											<input type="hidden" name="old_secondary_marksheet" id="old_secondary_marksheet"  class="form-control" placeholder="Secondary Marks" value="<?php if(!empty($qualification)){ echo $qualification->secondary_marksheet;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Marksheet<span class="req">*</span> <?php if(!empty($qualification) && $qualification->secondary_marksheet !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->secondary_marksheet)?>"><i class="mdi mdi mdi-eye"></i></a><?php }?></label>
											<input type="file" name="secondary_marksheet" id="secondary_marksheet"  class="form-control">
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Year</label>
											<input type="text" name="sr_secondary_year" id="sr_secondary_year"  class="form-control" maxlength="4" placeholder="Sr. Secondary Year" value="<?php if(!empty($qualification)){ echo $qualification->sr_secondary_year;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Board</label>
											<input type="text" name="sr_secondary_university" id="sr_secondary_university"  class="form-control" placeholder="Sr. Secondary Board" value="<?php if(!empty($qualification)){ echo $qualification->sr_secondary_university;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Marks</label>
											<input type="text" name="sr_secondary_marks" id="sr_secondary_marks"  class="form-control" placeholder="Sr. Secondary Marks" value="<?php if(!empty($qualification)){ echo $qualification->sr_secondary_marks;}?>">
											<input type="hidden" name="old_sr_secondary_marksheet" id="old_sr_secondary_marksheet"  class="form-control" placeholder="Sr. Secondary Marks" value="<?php if(!empty($qualification)){ echo $qualification->sr_secondary_marksheet;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Marksheet <?php if(!empty($qualification) && $qualification->sr_secondary_marksheet !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->sr_secondary_marksheet)?>"><i class="mdi mdi mdi-eye"></i></a><?php }?></label>
											<input type="file" name="sr_secondary_marksheet" id="sr_secondary_marksheet"  class="form-control">
										</div>
									</div>
								</div>
								
								<div class="row edu">
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation Year</label>
											<input type="text" name="graduation_year" id="graduation_year"  class="form-control" maxlength="4" placeholder="Graduation Year" value="<?php if(!empty($qualification)){ echo $qualification->graduation_year;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation University</label>
											<input type="text" name="graduation_university" id="graduation_university"  class="form-control" placeholder="Graduation University" value="<?php if(!empty($qualification)){ echo $qualification->graduation_university;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation Marks</label>
											<input type="text" name="graduation_marks" id="graduation_marks"  class="form-control" placeholder="Graduation Marks" value="<?php if(!empty($qualification)){ echo $qualification->graduation_marks;}?>">
											<input type="hidden" name="old_graduation_marksheet" id="old_graduation_marksheet"  class="form-control" placeholder="Graduation Marks" value="<?php if(!empty($qualification)){ echo $qualification->graduation_marksheet;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation Marksheet  <?php if(!empty($qualification) && $qualification->graduation_marksheet !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->graduation_marksheet)?>"><i class="mdi mdi mdi-eye"></i></a><?php }?></label>
											<input type="file" name="graduation_marksheet" id="graduation_marksheet"  class="form-control">
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation Year</label>
											<input type="text" name="post_graduation_year" id="post_graduation_year" class="form-control" maxlength="4" placeholder="Post Graduation Year" value="<?php if(!empty($qualification)){ echo $qualification->post_graduation_year;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation University</label>
											<input type="text" name="post_graduation_university" id="post_graduation_university" class="form-control" placeholder="Post Graduation University" value="<?php if(!empty($qualification)){ echo $qualification->post_graduation_university;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation Marks</label>
											<input type="text" name="post_graduation_marks" id="post_graduation_marks" class="form-control" placeholder="Post Graduation Marks" value="<?php if(!empty($qualification)){ echo $qualification->post_graduation_marks;}?>">
											<input type="hidden" name="old_post_graduation_marksheet" id="old_post_graduation_marksheet" class="form-control" placeholder="Post Graduation Marks" value="<?php if(!empty($qualification)){ echo $qualification->post_graduation_marksheet;}?>">
											 
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation Marksheet <?php if(!empty($qualification) && $qualification->post_graduation_marksheet !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->post_graduation_marksheet)?>"><i class="mdi mdi mdi-eye"></i></a><?php }?></label>
											<input type="file" name="post_graduation_marksheet" id="post_graduation_marksheet"  class="form-control">
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification Year</label>
											<input type="text" name="other_qualification_year" id="other_qualification_year"  class="form-control" maxlength="4" placeholder="Other Qualification Year" value="<?php if(!empty($qualification)){ echo $qualification->other_qualification_year;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification University</label>
											<input type="text" name="other_qualification_university" id="other_qualification_university"  class="form-control" placeholder="Other Qualification University" value="<?php if(!empty($qualification)){ echo $qualification->other_qualification_university;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification Marks</label>
											<input type="text" name="other_qualification_marks" id="other_qualification_marks"  class="form-control" placeholder="Other Qualification Marks" value="<?php if(!empty($qualification)){ echo $qualification->other_qualification_marks;}?>">
											<input type="hidden" name="old_other_qualification_marksheet" id="old_other_qualification_marksheet"  class="form-control" placeholder="Other Qualification Marks" value="<?php if(!empty($qualification)){ echo $qualification->other_qualification_marksheet;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification Marksheet <?php if(!empty($qualification) && $qualification->other_qualification_marksheet !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->other_qualification_marksheet)?>"><i class="mdi mdi mdi-eye"></i></a><?php }?></label>
											<input type="file" name="other_qualification_marksheet" id="other_qualification_marksheet"  class="form-control">
										</div>
									</div> 
									<p><input type="checkbox" checked="checked" disabled> I commit & declare that all the provided eligibility doccuments and information are genuine & correct and If in future anything  will be found wrong, the University may dismiss/cancel my/this admission and forefeit the fees and University May initiate legal action also I also acknowledge that It is sole my responsibility.</p>
						<button type="submit" id="save_btn" class="btn btn-primary mr-2">Next</button> 
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
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#paper_form').validate({
		rules: {
			enrollment_number: {
				required: true,
			}, 
			/*secondary_year: {
				required: true,
				number: true,
				minlength: 4,
				maxlength: 4,
			},
			secondary_university: {
				required: true,
			},
			secondary_marks: {
				required: true,
			},
			secondary_marksheet: {
				required: true,
			},
			sr_secondary_year: {
				number: true,
				minlength: 4,
				maxlength: 4,
			},
			graduation_year: {
				number: true,
				minlength: 4,
				maxlength: 4,
			},
			post_graduation_year: {
				number: true,
				minlength: 4,
				maxlength: 4,
			},
			other_qualification_year: {
				number: true,
				minlength: 4,
				maxlength: 4,
			},*/
		},
		messages: {
			enrollment_number: {
				required: "Please enter enrollment number",
			}, 
			/*secondary_year: {
				required: "Please enter year",
				number: "Please enter valid year",
				minlength: "Please enter 4 digit year",
				maxlength: "Please enter 4 digit year",
			},
			secondary_university: {
				required: "Please enter board",
			},
			secondary_marks: {
				required: "Please enter marks",
			},
			secondary_marksheet: {
				required: "Please enter upload marksheet",
			},
			sr_secondary_year: {
				number: "Please enter valid year",
				minlength: "Please enter 4 digit year",
				maxlength: "Please enter 4 digit year",
			},
			graduation_year: {
				number: "Please enter valid year",
				minlength: "Please enter 4 digit year",
				maxlength: "Please enter 4 digit year",
			},
			post_graduation_year: {
				number: "Please enter valid year",
				minlength: "Please enter 4 digit year",
				maxlength: "Please enter 4 digit year",
			},
			other_qualification_year: {
				number: "Please enter valid year",
				minlength: "Please enter 4 digit year",
				maxlength: "Please enter 4 digit year",
			}, 
			*/
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

</script>
 