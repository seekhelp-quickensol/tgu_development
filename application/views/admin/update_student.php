<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Update Student</h4>
							<p class="card-description">Please enter student fees details</p>
							<form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Student Name *</label>
											<input type="text" class="form-control" readonly id="student_name" name="student_name" placeholder="Student Name" value="<?php if(!empty($student)){ echo $student->student_name;}?>">
											<input type="hidden" class="form-control" id="student_id" name="student_id" value="<?php if(!empty($student)){ echo $student->id;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Gender <span class="req">*</span></label>
											<select id="gender" name="gender" class="form-control">
												<option value="">Select Gender</option>
												<option value="Male" <?php if(!empty($student) && $student->gender == "Male"){ ?>selected="selected"<?php }?>>Male</option>
												<option value="Female" <?php if(!empty($student) && $student->gender == "Female"){ ?>selected="selected"<?php }?>>Female</option>
												<option value="Transgender" <?php if(!empty($student) && $student->gender == "Transgender"){ ?>selected="selected"<?php }?>>Transgender</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Father Name *</label>
											<input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name" value="<?php if(!empty($student)){ echo $student->father_name;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Mother Name *</label>
											<input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name" value="<?php if(!empty($student)){ echo $student->mother_name;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Date of Birth*</label>
											<input type="text" class="form-control datepicker" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="<?php if(!empty($student)){ echo date("d-m-Y",strtotime($student->date_of_birth));}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputPassword1">Mobile Number *</label>
											<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" value="<?php if(!empty($student)){ echo $student->mobile;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputPassword1">Email *</label>
											<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php if(!empty($student)){ echo $student->email;}?>">
										</div>
										<div class="error" id="email_error"></div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputPassword1">Center *</label>
										
											<select class="form-control js-example-basic-single" id="center" name="center">
												<option value="">Select center</option>	
												<?php foreach($centers as $center): ?>
													<option value="<?=$center->id;?>" <?php if(!empty($student)){if($student->center_id == $center->id ){echo "selected"; }}?> > <?=$center->center_name;?></option>
												<?php endforeach;  ?>
											</select>
										</div>
									</div>
									
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Session </label>
											<select class="form-control js-example-basic-single" id="session" name="session">
												<?php if(!empty($session)){ foreach($session as $session_result){?>
												<option value="<?=$session_result->id?>" <?php if(!empty($student) && $student->session_id == $session_result->id){ ?>selected="selected"<?php }?>><?=$session_result->session_name?></option>
											<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Course Name *</label>
											<select class="form-control js-example-basic-single" id="course" name="course">
												<option value="">Select Course</option>
												<?php if(!empty($course)){ foreach($course as $course_result){?>
												<option value="<?=$course_result->course?>" <?php if(!empty($student) && $student->course_id == $course_result->course){ ?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									
									<div class="col-md-3 course_update_reason" <?php if(!empty($student) && $student->course_update_reason !=""){?>style="display:block;"<?php }else{?>style="display:none;"<?php }?>>
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Course Update Reason *</label>
											<input type="text" class="form-control" id="course_update_reason" name="course_update_reason" value="<?php if(!empty($student)){ echo $student->course_update_reason;}?>"> 
										</div>
									</div>
									
									<?php 
										$stream = array();
										if(!empty($student)){
											$stream = $this->Course_model->get_selected_course_stream($student->course_id);
										}
									?>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Stream *</label>
											<select class="form-control js-example-basic-single" id="stream" name="stream">
												<option value="">Select Stream</option>
												<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
												<option value="<?=$stream_result->stream?>" <?php if(!empty($student) && $student->stream_id == $stream_result->stream){ ?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Year/Sem *</label>
											<select class="form-control js-example-basic-single" id="year_sem" name="year_sem">
												<?php for($y=1;$y<=10;$y++){?>
												<option value="<?=$y?>" <?php if(!empty($student) && $student->year_sem == $y){ ?>selected="selected"<?php }?>><?=$y?></option>
												<?php }?>
											</select>
										</div>
									</div>
									
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Course Mode *</label>
											<select class="form-control js-example-basic-single" id="course_mode" name="course_mode"> 
												<option value="1" <?php if($student){if($student->course_mode == '1'){echo "selected";}}?>>Year</option>  
												<option value="2" <?php if($student){if($student->course_mode == '2'){echo "selected";}}?>>Sem</option>
												<option value="4" <?php if($student){if($student->course_mode == '4'){echo "selected";}}?>>Month</option> 
											</select>
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Entry Type *</label>
											<select class="form-control js-example-basic-single" id="admission_type" name="admission_type">
												<option value="0" <?php if(!empty($student) && $student->admission_type == 0){ ?>selected="selected"<?php }?>>Regular</option>
												<option value="1" <?php if(!empty($student) && $student->admission_type == 1){ ?>selected="selected"<?php }?>>Lateral Entry</option>
												<option value="2" <?php if(!empty($student) && $student->admission_type == 2){ ?>selected="selected"<?php }?>>Credit Transfer</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Study Mode *</label>
											<select class="form-control js-example-basic-single" id="study_mode" name="study_mode">
												<option value="1" <?php if(!empty($student) && $student->study_mode == 1){ ?>selected="selected"<?php }?>>Regular</option>
												<option value="2" <?php if(!empty($student) && $student->study_mode == 2){ ?>selected="selected"<?php }?>>Online</option>
												<?php if($student->course_id==23): ?>
												<option value="3" <?php if(!empty($student) && $student->study_mode == 3){ ?>selected="selected"<?php }?>>Part-Time</option>
													<?php endif; ?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Address </label>
											<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php if(!empty($student)){ echo $student->address;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Country <span class="req">*</span></label>
											<select class="form-control" name="country" id="country">
												<option value="">Select Country</option>
												<?php if(!empty($country)){
													foreach($country as $country_result){
												?>
												<option value="<?=$country_result->id?>" <?php if(!empty($student) && $student->country == $country_result->id){?>selected="selected"<?php }?>><?=$country_result->name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<?php 
										$state = array();
										$city = array();
										if(!empty($student)){
											$state = $this->Student_model->get_selected_state($student->country);
											$city = $this->Student_model->get_selected_city($student->state);
										}
									?>
									<div class="col-sm-3">
										<div class="form-group">
											<label>State <span class="req">*</span></label>
											<select class="form-control" required name="state" id="state">
												<option value="">Select state</option>
												<?php if(!empty($state)){ foreach($state as $state_result){?>
												<option value="<?=$state_result->id?>" <?php if(!empty($student) && $student->state == $state_result->id){?>selected="selected"<?php }?>><?=$state_result->name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>City <span class="req">*</span></label>
											<select class="form-control" required name="city" id="city">
												<option value="">Select City</option>
												<?php if(!empty($city)){ foreach($city as $city_result){?>
												<option value="<?=$city_result->id?>" <?php if(!empty($student) && $student->city == $city_result->id){?>selected="selected"<?php }?>><?=$city_result->name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Pin Code <span class="req">*</span></label>
											<input class="form-control number_only" required name="pincode" id="pincode" placeholder="PinCode" value="<?php if(!empty($student)){ echo $student->pincode;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Religion <span class="req">*</span></label>
											<select name="religion" id="religion" class="form-control charector" maxlength="100" placeholder="Religion">
												<option value="">Select Religion</option>
												<option value="Hindu" <?php if(!empty($student) && $student->religion == "Hindu"){ ?>selected="selected"<?php }?>>Hindu</option>
												<option value="DONYI POLO" <?php if(!empty($student) && $student->religion == "DONYI POLO"){ ?>selected="selected"<?php }?>>DONYI POLO</option>
												<option value="Sikh" <?php if(!empty($student) && $student->religion == "Sikh"){ ?>selected="selected"<?php }?>>Sikh</option>
												<option value="Christian" <?php if(!empty($student) && $student->religion == "Christian"){ ?>selected="selected"<?php }?>>Christian</option>
												<option value="Muslims" <?php if(!empty($student) && $student->religion == "Muslims"){ ?>selected="selected"<?php }?>>Muslims</option>
												<option value="Others" <?php if(!empty($student) && $student->religion == "Others"){ ?>selected="selected"<?php }?>>Others</option>
											</select>
										</div>
									</div>
									
									<div class="col-md-3" id="religin_specify_div" <?php if(empty($student)){ ?>style="display:none" <?php }else if($student->religion == "Others"){ ?> style="display:block" <?php }else{?>style="display:none;"<?php }?>>
										<div class="form-group">
											<label>Specify Religion <span class="req">*</span></label>
											<input type="text" name="religin_specify" id="religin_specify" class="form-control charector" placeholder="Please specify your religion" value="<?php if(!empty($student)){ echo $student->religin_specify;}?>"> 
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Photo <?php if(!empty($student) && $student->photo !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$student->photo)?>">View</a><?php }?></label>
											<input type="file" class="form-control" name="photo" id="photo">
											<input type="hidden" class="form-control" name="old_photo" id="old_photo" value="<?php if(!empty($student)){ echo $student->photo;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>NOC <?php if(!empty($student) && $student->noc !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/noc/'.$student->noc)?>">View</a><?php }?></label>
											<input type="file" class="form-control" name="noc" id="noc">
											<input type="hidden" class="form-control" name="old_noc" id="old_noc" value="<?php if(!empty($student)){ echo $student->noc;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Permission Letter <?php if(!empty($student) && $student->permission_letter !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/permission_letter/'.$student->permission_letter)?>">View</a><?php }?></label>
											<input type="file" class="form-control" name="permission_letter" id="permission_letter">
											<input type="hidden" class="form-control" name="old_permission_letter" id="old_permission_letter" value="<?php if(!empty($student)){ echo $student->permission_letter;}?>">
										</div>
									</div>
										
									<div class="col-sm-3">
										<div class="form-group">
											<label>Signature <?php if(!empty($student) && $student->signature !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/signature/'.$student->signature)?>">View</a><?php }?></label>
											<input type="file" class="form-control" name="signature" id="signature">
											<input type="hidden" class="form-control" name="old_signature" id="old_signature" value="<?php if(!empty($student)){ echo $student->signature;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Affidavit <?php if(!empty($student) && $student->affidavit_file !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/affidavit/'.$student->affidavit_file)?>">View</a><?php }?></label>
											<input type="file" name="affidavit_file" id="affidavit_file" class="form-control upload_photo" accept=".pdf,.doc,.docx,.jpeg,.png,.jpg">
											<input type="hidden" name="old_affidavit_file" id="old_affidavit_file" value="<?php if(!empty($student)){ echo $student->affidavit_file;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Adhar/Passport soft copy <?php if(!empty($student) && $student->identity_softcopy !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/student_identity_softcopy/'.$student->identity_softcopy)?>">View</a><?php }?></label>
											<input type="file" class="form-control" name="identity_softcopy" id="identity_softcopy">
											<input type="hidden" class="form-control" name="old_identity_softcopy" id="old_identity_softcopy" value="<?php if(!empty($student)){ echo $student->identity_softcopy;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Collaborator undertaking<?php if(!empty($student) && $student->ohter_files !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/student_identity_softcopy/'.$student->ohter_files)?>">View</a><?php }?></label>
											<input type="file" class="form-control" name="ohter_files" id="ohter_files">
											<input type="hidden" class="form-control" name="old_ohter_files" id="old_ohter_files" value="<?php if(!empty($student)){ echo $student->ohter_files;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Show Collaborator undertaking <small style="color:red">(in student login)</small></label>
											<select class="form-control" name="show_collaborator_undertaking" id="show_collaborator_undertaking">
												<option value="0" <?php if(!empty($student) && $student->show_collaborator_undertaking == "0"){?>selected="selected"<?php }?>>No</option>
												<option value="1" <?php if(!empty($student) && $student->show_collaborator_undertaking == "1"){?>selected="selected"<?php }?>>Yes</option> 
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Show Collaborator Undertaking <small style="color:red">(in center login)</small></label>
											<select class="form-control" name="show_center_collaborator_undertaking" id="show_center_collaborator_undertaking">
												<option value="0" <?php if(!empty($student) && $student->show_center_collaborator_undertaking == "0"){?>selected="selected"<?php }?>>No</option>
												<option value="1" <?php if(!empty($student) && $student->show_center_collaborator_undertaking == "1"){?>selected="selected"<?php }?>>Yes</option> 
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Student Undertaking <?php if(!empty($student) && $student->undertaking !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/permission_letter/'.$student->undertaking)?>">View</a><?php }?></label>
											<input type="file" class="form-control" name="undertaking" id="undertaking">
											<input type="hidden" class="form-control" name="old_undertaking" id="old_undertaking" value="<?php if(!empty($student)){ echo $student->undertaking;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Show Undertaking <small style="color:red">(in student login)</small></label>
											<select class="form-control" name="show_undertaking" id="show_undertaking">
												<option value="0" <?php if(!empty($student) && $student->show_undertaking == "0"){?>selected="selected"<?php }?>>No</option>
												<option value="1" <?php if(!empty($student) && $student->show_undertaking == "1"){?>selected="selected"<?php }?>>Yes</option> 
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Show Undertaking <small style="color:red">(in center login)</small></label>
											<select class="form-control" name="show_center_undertaking" id="show_center_undertaking">
												<option value="0" <?php if(!empty($student) && $student->show_center_undertaking == "0"){?>selected="selected"<?php }?>>No</option>
												<option value="1" <?php if(!empty($student) && $student->show_center_undertaking == "1"){?>selected="selected"<?php }?>>Yes</option> 
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Update Status <span class="req">*</span></label>
											<select class="form-control" required="required" name="admission_status" id="admission_status">
												<option value="">Select Admission Status</option>
												<option value="0" <?php if(!empty($student) && $student->admission_status == '0'){ echo "selected='selected'"; } ?>>Pending</option>
												<option value="1" <?php if(!empty($student) && $student->admission_status == '1'){ echo "selected='selected'"; } ?>>Active</option>
												<option value="2" <?php if(!empty($student) && $student->admission_status == '2'){ echo "selected='selected'"; } ?>>Cancel</option>
												<option value="3" <?php if(!empty($student) && $student->admission_status == '3'){ echo "selected='selected'"; } ?>>Hold</option>
												<option value="4" <?php if(!empty($student) && $student->admission_status == '4'){ echo "selected='selected'"; } ?>>Pass out</option>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Registration Date<span class="req">*</span></label>
											<input type="text" class="form-control datepicker" name="admission_date" id="admission_date" value="<?php if(!empty($student)){ echo date("d-m-Y",strtotime($student->admission_date));}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Change Employement Type<span class="req">*</span></label>
											<select class="form-control" required="required" name="employement_type" id="employement_type">
												<option value="">Select Employement Type</option>
												<option value="Government Employee" <?php if(!empty($student) && $student->employement_type == 'Government Employee'){ echo "selected='selected'"; } ?>>Government Employee</option>
												<option value="Private Sector Employee" <?php if(!empty($student) && $student->employement_type == 'Private Sector Employee'){ echo "selected='selected'"; } ?>>Private Sector Employee</option>
												<option value="Not Working" <?php if(!empty($student) && $student->employement_type == 'Not Working'){ echo "selected='selected'"; } ?>>Not Working</option>
												
											</select>
										</div>
									</div>
									<div class="col-sm-3"> 
										<div class="form-group"> 
											<label>Category<span class="req">*</span></label> 
											<select id="category" name="category" class="form-control js-example-basic-single"> 
												<option value="">Select Category</option> 
												<option value="General" <?php if(!empty($student) && $student->category == 'General'){ ?>selected="selected" <?php } ?>>General (Open)</option> 
												<option value="Other Backward Class" <?php if(!empty($student) && $student->category == 'Other Backward Class'){ ?>selected="selected" <?php } ?>>Other Backward Class (OBC)</option> 
												<option value="Scheduled Caste" <?php if(!empty($student) && $student->category == 'Scheduled Caste'){ ?>selected="selected" <?php } ?>>Scheduled Caste (SC)</option> 
												<option value="Scheduled Tribe" <?php if(!empty($student) && $student->category == 'Scheduled Tribe'){ ?>selected="selected" <?php } ?>>Scheduled Tribe (ST)</option> 
											</select>
										</div> 
									</div> 
									<div class="col-sm-12"></div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Year<span class="req">*</span></label>
											<input type="text" required name="secondary_year" id="secondary_year"  class="form-control" maxlength="4" placeholder="Secondary Year" value="<?php if(!empty($qualification)){ echo $qualification->secondary_year;}?>">
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
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Marksheet<span class="req">*</span> <?php if(is_object($qualification) && $qualification->secondary_marksheet !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->secondary_marksheet)?>">View</a><?php }?></label>
											<input type="file" name="secondary_marksheet" id="secondary_marksheet"  class="form-control">
											<input type="hidden" name="old_secondary_marksheet" id="old_secondary_marksheet"  class="form-control" value="<?php if(!empty($qualification)){ echo $qualification->secondary_marksheet;}?>">
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
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Marksheet <?php if(is_object($qualification) && $qualification->sr_secondary_marksheet !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->sr_secondary_marksheet)?>">View</a><?php }?></label>
											<input type="file" name="sr_secondary_marksheet" id="sr_secondary_marksheet"  class="form-control">
											<input type="hidden" name="old_sr_secondary_marksheet" id="old_sr_secondary_marksheet"  class="form-control" value="<?php if(!empty($qualification)){ echo $qualification->sr_secondary_marksheet;}?>">
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
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation Marksheet <?php if(is_object($qualification) && $qualification->graduation_marksheet !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->graduation_marksheet)?>">View</a><?php }?></label>
											<input type="file" name="graduation_marksheet" id="graduation_marksheet"  class="form-control">
											<input type="hidden" name="old_graduation_marksheet" id="old_graduation_marksheet"  class="form-control" value="<?php if(!empty($qualification)){ echo $qualification->graduation_marksheet;}?>">
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
											
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation Marksheet <?php if(is_object($qualification) && $qualification->post_graduation_marksheet !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->post_graduation_marksheet)?>">View</a><?php }?></label>
											<input type="file" name="post_graduation_marksheet" id="post_graduation_marksheet"  class="form-control">
											<input type="hidden" name="old_post_graduation_marksheet" id="old_post_graduation_marksheet"  class="form-control" value="<?php if(!empty($qualification)){ echo $qualification->post_graduation_marksheet;}?>">
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
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification Marksheet <?php if(is_object($qualification) && $qualification->other_qualification_marksheet !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->other_qualification_marksheet)?>">View</a><?php }?></label>
											<input type="file" name="other_qualification_marksheet" id="other_qualification_marksheet"  class="form-control">
											<input type="hidden" name="old_other_qualification_marksheet" id="old_other_qualification_marksheet"  class="form-control" value="<?php if(!empty($qualification)){ echo $qualification->other_qualification_marksheet;}?>">
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
			},
			religion: {
				required:true,
				noHTMLtags:true
			},
			religin_specify: {
				required:true,
				noHTMLtags:true
			},
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
			},
			religion: {
				required:"Please select religion!",
				noHTMLtags:"HTML tags not allowed",
			},
			religin_specify: {
				required:"Please specify your religin !",
				noHTMLtags:"HTML tags not allowed",
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
  $("#religion").change(function(){
	if($("#religion").val() == "Others"){
		$("#religin_specify_div").show(); 
	}else{
		$("#religin_specify_div").hide();
	}
});
</script>
<script>
	$("#email").keyup(function(){  
$.ajax({
	type: "POST",
	url: "<?=base_url();?>admin/Ajax_controller/get_admission_unique_email",
	data:{'email':$("#email").val(),'id':'<?=$id?>'},
	success: function(data){
		if (data == "0") {
			$("#email_error").html('');
			$("#single_button").show();
		} else {
			$("#email_error").html('This email is already added');
			$("#single_button").hide();
		}
		
	},
	 error: function(jqXHR, textStatus, errorThrown) {
	   console.log(textStatus, errorThrown);
	}
});	
});
</script>
 