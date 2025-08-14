<?php include("header.php");?>
<style>
	
</style>
<div class="container-fluid">
	<div class="row">	
		<div class="col-md-12 grid-margin strech-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Update Guide Application Form</h4>
					<p class="card-description">Please Enter the basic Details</p>

					<form method="post" name="admission_form" id="admission_form" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Name (Mr./Ms.) <span class="req">*</span></label>
									<input 
									type="text" 
									name="name" 
									id="name" 
									class="form-control charector" 
									placeholder="Full Name"
									value="<?php if(!empty($single_guide_applications->name)){ echo $single_guide_applications->name; } ?>" >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Son/Daughter of <span class="req">*</span></label>
									<input 
									type="text" 
									name="son_of" 
									id="son_of" 
									class="form-control charector" 
									placeholder="Son/Daughter of"
									value="<?php if(!empty($single_guide_applications->son_of)){ echo $single_guide_applications->son_of; } ?>" >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Date of Birth <span class="req">*</span></label>
									<input 
									type="text" 
									name="date_of_birth" 
									id="date_of_birth" 
									class="form-control datepicker" 
									placeholder="DD-MM-YY"
									value="<?php if(!empty($single_guide_applications->date_of_birth)){ echo $single_guide_applications->date_of_birth; } ?>" >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Phone Number </label>
									<input 
									autocomplete="off" 
									type="text" 
									name="phone_number" 
									id="phone_number" 
									class="form-control number_only" 
									placeholder="Phone Number" 
									value="<?php if(!empty($single_guide_applications->phone_number)){ echo $single_guide_applications->phone_number; } ?>" >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Mobile Number <span class="req">*</span></label>
									<input 
									autocomplete="off" 
									type="text" 
									name="mobile" 
									id="mobile" 
									class="form-control number_only" 
									placeholder="Mobile Number" 
									maxlength="10" 
									minlength="10" 
									value="<?php if(!empty($single_guide_applications->mobile)){ echo $single_guide_applications->mobile; } ?>" >
									<div class="error" id="mobile_error"></div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Email ID <span class="req">*</span></label>
									<input 
									autocomplete="off" 
									type="email" 
									name="email" 
									id="email" 
									class="form-control" 
									placeholder="Email ID"
									value="<?php if(!empty($single_guide_applications->email)){ echo $single_guide_applications->email; } ?>" >
									<div class="error" id="email_error"></div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
								<label>Gender <span class="req">*</span></label>
									<select id="gender" name="gender" class="form-control">
										<option value="">Select Gender</option>
										<option value="Male" <?php if(!empty($single_guide_applications->gender)){ if($single_guide_applications->gender == 'Male'){ echo 'selected="selected"'; } } ?> >Male</option>
										<option value="Female" <?php if(!empty($single_guide_applications->gender)){ if($single_guide_applications->gender == 'Female'){ echo 'selected="selected"'; } } ?>  >Female</option>
										<option value="Transgender" <?php if(!empty($single_guide_applications->gender)){ if($single_guide_applications->gender == 'Transgender'){ echo 'selected="selected"'; } } ?> >Transgender</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									<label>Photo <span class="req">*</span></label>
									<input type="file" name="photo" id="photo" class="form-control upload_photo">
									<?php if(!empty($single_guide_applications->photo )){ ?>
									<input type="hidden" class="form-control" name="old_photo" id="old_photo" value="<?=$single_guide_applications->photo ?>">
									<?php } ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Signature <span class="req">*</span></label>
									<input type="file" name="signature" id="signature" class="form-control">
									<?php if(!empty($single_guide_applications->signature )){ ?>
									<input type="hidden" class="form-control" name="old_signature" id="old_signature" value="<?=$single_guide_applications->signature?>">
								<?php } ?>
								</div>
							</div>
							<div class="col-md-3">
								<label>Correspondence Address <span class="req">*</span></label>
								<input 
								type="text" 
								class="form-control rules" 
								name="address" 
								id="address" 
								placeholder="Correspondence Address"
								value="<?php if(!empty($single_guide_applications->address)){ echo $single_guide_applications->address; } ?>" >
							</div>
							<?php 
							$country = array();
							$state = array();
							$city = array();
							if(!empty($single_guide_applications)){
								$country = $this->Research_model->get_selected_country($single_guide_applications->country);
								$state = $this->Research_model->get_selected_state($single_guide_applications->state);
								$city = $this->Research_model->get_selected_city($single_guide_applications->city);
							}
							// print_r($country ); exit();
							?>

							<div class="col-sm-3">
								<div class="form-group">
									<label>Country <span class="req">*</span></label>
									<select class="form-control" name="country" id="country">
										<option value="">Select Country</option>
										<?php if(!empty($country)){
											foreach($country as $country_result){
										?>
										<option value="<?=$country_result->id?>" <?php if(!empty($country_result) && $single_guide_applications->country == $country_result->id){?>selected="selected"<?php }?>><?=$country_result->name?></option>
										<?php }} ?>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>State <span class="req">*</span></label>
									<select class="form-control" required name="state" id="state">
										<option value="">Select state</option>
										<?php if(!empty($state)){ ?>
										<option value="<?php echo $state->id; ?>" selected="selected"> <?php echo $state->name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>City <span class="req">*</span></label>
									<select class="form-control" required name="city" id="city">
										<option value="">Select City</option>
										<?php if(!empty($city)){ ?>
										<option value="<?php echo $city->id; ?>" selected="selected"> <?php echo $city->name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>Pin Code <span class="req">*</span></label>
									<input 
									class="form-control number_only" 
									required name="pincode" 
									id="pincode" 
									placeholder="PinCode" 
									value="<?php if(!empty($single_guide_applications->pincode)){ echo $single_guide_applications->pincode; } ?>" >
								</div>
							</div>
							
							<div class="col-md-3">
								<label>Subject<span class="req">*</span></label>
								<input 
								type="text" 
								class="form-control rules" 
								name="specilisation" 
								id="specilisation" 
								placeholder="Area of Specilisation" 
								value="<?php if(!empty($single_guide_applications->specilisation)){ echo $single_guide_applications->specilisation; } ?>" >
							</div>
							
							<div class="col-md-3">
								<label>Remark</label>
								<input 
								type="text" 
								class="form-control rules" 
								name="remark" 
								d="remark" 
								placeholder="Remark"
								value="<?php if(!empty($single_guide_applications->remark)){ echo $single_guide_applications->remark; } ?>"  >
							</div>
							
							<div class="clearfix"></div>

							<div class="col-md-3">
								<label>Designation<span class="req">*</span></label>
								<input 
								type="text" 
								class="form-control rules" 
								name="designation" 
								id="designation" 
								placeholder="Designation"
								value="<?php if(!empty($single_guide_applications->designation)){ echo $single_guide_applications->designation; } ?>" >
							</div>



							<div class="col-md-3">
								<label>Area of Research & Development<span class="req">*</span></label>
								<input 
								type="text" 
								class="form-control rules" 
								name="research_area" 
								id="research_area" 
								placeholder="Area of Research & Development"
								value="<?php if(!empty($single_guide_applications->research_area)){ echo $single_guide_applications->research_area; } ?>" >
							</div>
							<div class="col-sm-3">
										<div class="form-group">
											<label>Employment Details <span class="req">*</span></label>
											<select class="form-control" name="employement_type" id="employement_type">
												<option value="">Select Employment Type</option> 
												<option value="Government Employee" <?php if(!empty($single_guide_applications->employement_type == "Government Employee")){?>selected="selected"<?php }?>>Government Employee</option> 
												<option value="Private Sector Employee" <?php if(!empty($single_guide_applications->employement_type == "Private Sector Employee")){?>selected="selected"<?php }?>>Private Sector Employee</option> 
												<option value="Not Working" <?php if(!empty($single_guide_applications->employement_type == "Not Working")){?>selected="selected"<?php }?>>Not Working</option> 
											</select>
										</div>
									</div>
							<div class="col-md-3">
								<label>Work Experience <span class="req">*</span></label>
								<input t
								ype="text" 
								class="form-control rules" 
								name="work_experience" 
								id="work_experience" 
								placeholder="Work Experience" 
								value="<?php if(!empty($single_guide_applications->work_experience)){ echo $single_guide_applications->work_experience; } ?>" >
							</div>
							<div class="col-md-3">
								<label>Present Working <span class="req">*</span></label>
								<input 
								type="text" 
								class="form-control rules" 
								name="present_working" 
								id="present_working" 
								placeholder="Present Working" 
								value="<?php if(!empty($single_guide_applications->present_working)){ echo $single_guide_applications->present_working; } ?>" >
							</div>
							<div class="col-md-3">
								<label class="control-label" for="message">Signature</label>
								<select class="form-control" id="signature" name="signature">
									<option value="">Select Signature</option>
									<?php if(!empty($signature)){ foreach($signature as $signature_result){?>									
									<option value="<?=$signature_result->id?>" <?php if(!empty($single_guide_applications) && $single_guide_applications->signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
									<?php }}?> 
								</select>									
							</div>

							</div>
							<div class="row">
							<div class="row">
								<div class="col-md-12">
									<hr class="mw-100">
									<h4 class="card-title">Details of the Educational Progress of the Applicant</h4>
								</div>
							</div>

							<div class="row">
								<div class="col-md-3">
								<div class="form-group">
									<label>10th Year of Passing<span class="req">*</span></label>
									<input 
									type="text" required 
									name="secondary_year" 
									id="secondary_year"  
									class="form-control" 
									maxlength="4" 
									placeholder="Secondary Year" 
									value="<?php if(!empty($single_guide_applications->secondary_year)){ echo $single_guide_applications->secondary_year; } ?> ">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University<span class="req">*</span></label>
									<input 
									type="text" 
									name="secondary_university" 
									id="secondary_university"  
									class="form-control" 
									placeholder="Secondary Board"
									value="<?php if(!empty($single_guide_applications->secondary_university)){ echo $single_guide_applications->secondary_university; } ?>" >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Subject Studied<span class="req">*</span></label>
									<input 
									type="text" 
									name="secondary_subject" 
									id="secondary_subject"  
									class="form-control" 
									placeholder="Subject Studied" 
									value="<?php if(!empty($single_guide_applications->secondary_subject)){ echo $single_guide_applications->secondary_subject; } ?>" >
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									<label>Marksheet<span class="req">*</span></label>
									<input type="file" name="secondary_subject_marksheet" id="secondary_subject_marksheet"  class="form-control">
									<?php if(!empty($single_guide_applications->secondary_subject_marksheet )){ ?>
									<input type="hidden" class="form-control" name="old_secondary_subject_marksheet" id="old_secondary_subject_marksheet" value="<?=$single_guide_applications->secondary_subject_marksheet?>">
									<?php } ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>12th Year of Passing <span class="req">*</span></label>
									<input 
									type="text" 
									name="sr_secondary_year" 
									id="sr_secondary_year"  
									class="form-control" 
									maxlength="4" 
									placeholder="Sr. Secondary Year"
									value="<?php if(!empty($single_guide_applications->sr_secondary_year)){ echo $single_guide_applications->sr_secondary_year; } ?> ">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University <span class="req">*</span></label>
									<input 
									type="text" 
									name="sr_secondary_university" 
									id="sr_secondary_university"  
									class="form-control" 
									placeholder="Name of the School/Board/University"
									value="<?php if(!empty($single_guide_applications->sr_secondary_university)){ echo $single_guide_applications->sr_secondary_university; } ?> " >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Subject Studied <span class="req">*</span></label>
									<input 
									type="text" 
									name="sr_secondary_subject" 
									id="sr_secondary_subject"  
									class="form-control" 
									placeholder="Subject Studied"
									value="<?php if(!empty($single_guide_applications->sr_secondary_subject)){ echo $single_guide_applications->sr_secondary_subject; } ?> " >
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									<label>Marksheet <span class="req">*</span></label>
									<input type="file" name="sr_secondary_subject_marksheet" id="sr_secondary_subject_marksheet"  class="form-control">
									<?php if(!empty($single_guide_applications->sr_secondary_subject_marksheet )){ ?>
									<input type="hidden" class="form-control" name="old_sr_secondary_subject_marksheet" id="old_sr_secondary_subject_marksheet" value="<?=$single_guide_applications->sr_secondary_subject_marksheet?>">
								<?php } ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Graduation Year of Passing <span class="req">*</span></label>
									<input 
									type="text" 
									name="graduation_year" 
									id="graduation_year"  
									class="form-control" 
									maxlength="4" 
									placeholder="Graduation Year"
									value="<?php if(!empty($single_guide_applications->graduation_year)){ echo $single_guide_applications->graduation_year; } ?> ">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University <span class="req">*</span></label>
									<input 
									type="text" 
									name="graduation_university" 
									id="graduation_university"  
									class="form-control" 
									placeholder="Graduation University" 
									value="<?php if(!empty($single_guide_applications->graduation_university)){ echo $single_guide_applications->graduation_university; } ?> ">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Subject Studied <span class="req">*</span></label>
									<input 
									type="text" 
									name="graduation_subject" 
									id="graduation_subject"  
									class="form-control" 
									placeholder="Subject Studied" 
									value="<?php if(!empty($single_guide_applications->graduation_subject)){ echo $single_guide_applications->graduation_subject; } ?> ">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Marksheet <span class="req">*</span></label>
									<input type="file" name="graduation_subject_marksheet" id="graduation_subject_marksheet"  class="form-control">
									<?php if(!empty($single_guide_applications->sr_secondary_subject_marksheet )){ ?>
									<input type="hidden" class="form-control" name="old_graduation_subject_marksheet" id="old_graduation_subject_marksheet" value="<?=$single_guide_applications->sr_secondary_subject_marksheet?>">
								<?php } ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Post Graduation Year of Passing <span class="req">*</span></label>
									<input 
									type="text" 
									name="post_graduation_year" 
									id="post_graduation_year" 
									class="form-control" 
									maxlength="4" 
									placeholder="Post Graduation Year"
									value="<?php if(!empty($single_guide_applications->post_graduation_year)){ echo $single_guide_applications->post_graduation_year; } ?> ">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University <span class="req">*</span></label>
									<input 
									type="text" 
									name="post_graduation_university" 
									id="post_graduation_university" 
									class="form-control" 
									placeholder="Post Graduation University"
									value="<?php if(!empty($single_guide_applications->post_graduation_university)){ echo $single_guide_applications->post_graduation_university; } ?> ">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Subject Studied <span class="req">*</span></label>
									<input 
									type="text" 
									name="post_graduation_subject" 
									id="post_graduation_subject" 
									class="form-control" 
									placeholder="Subject Studied"
									value="<?php if(!empty($single_guide_applications->post_graduation_subject)){ echo $single_guide_applications->post_graduation_subject; } ?> ">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Marksheet <span class="req">*</span></label>
									<input type="file" name="post_graduation_subject_marksheet" id="post_graduation_subject_marksheet" class="form-control">
									<?php if(!empty($single_guide_applications->post_graduation_subject_marksheet )){ ?>
									<input type="hidden" class="form-control" name="old_post_graduation_subject_marksheet" id="old_post_graduation_subject_marksheet" value="<?=$single_guide_applications->post_graduation_subject_marksheet?>">
								<?php } ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Ph.D Year of Passing <span class="req">*</span></label>
									<input 
									type="text" 
									name="phd_year" 
									id="phd_year" 
									class="form-control" 
									maxlength="4" 
									placeholder="Ph.D Year of Passing"
									value="<?php if(!empty($single_guide_applications->phd_year)){ echo $single_guide_applications->phd_year; } ?> ">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University <span class="req">*</span></label>
									<input 
									type="text" 
									name="phd_university" 
									id="phd_university" 
									class="form-control" 
									placeholder="Ph.D University"
									value="<?php if(!empty($single_guide_applications->phd_university)){ echo $single_guide_applications->phd_university; } ?> " >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Subject Studied <span class="req">*</span></label>
									<input 
									type="text" 
									name="phd_subject" 
									id="phd_subject" 
									class="form-control" 
									placeholder="Subject Studied" 
									value="<?php if(!empty($single_guide_applications->phd_subject)){ echo $single_guide_applications->phd_subject; } ?> " >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Degree <span class="req">*</span></label>
									<input type="file" name="phd_subject_marksheet" id="phd_subject_marksheet" class="form-control">
									<?php if(!empty($single_guide_applications->phd_subject_marksheet )){ ?>
									<input type="hidden" class="form-control" name="old_phd_subject_marksheet" id="old_phd_subject_marksheet" value="<?=$single_guide_applications->phd_subject_marksheet?>">
								<?php } ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Any Other Qualification Year of Passing</label>
									<input 
									type="text" 
									name="other_qualification_year" 
									id="other_qualification_year"  
									class="form-control" 
									maxlength="4" 
									placeholder="Other Qualification Year of Passing" 
									value="<?php if(!empty($single_guide_applications->other_qualification_year)){ echo $single_guide_applications->other_qualification_year; } ?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Name of the School/Board/University</label>
									<input 
									type="text" 
									name="other_qualification_university" 
									id="other_qualification_university"  
									class="form-control" 
									placeholder="Name of the School/Board/University" 
									value="<?php if(!empty($single_guide_applications->other_qualification_university)){ echo $single_guide_applications->other_qualification_university; } ?> ">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Subject Studied</label>
									<input 
									type="text" 
									name="other_qualification_subject" 
									id="other_qualification_subject"  
									class="form-control" 
									placeholder="Other Qualification Subject"
									value="<?php if(!empty($single_guide_applications->other_qualification_subject)){ echo $single_guide_applications->other_qualification_subject; } ?> " >
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Certificate/Degree</label>
									<input type="file" name="other_qualification_subject_marksheet" id="other_qualification_subject_marksheet"  class="form-control">
									<?php if(!empty($single_guide_applications->other_qualification_subject_marksheet )){ ?>
									<input type="hidden" class="form-control" name="old_other_qualification_subject_marksheet" id="old_other_qualification_subject_marksheet" value="<?=$single_guide_applications->other_qualification_subject_marksheet?>">
								<?php } ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Biodata</label>
									<input type="file" name="biodata" id="biodata"  class="form-control">
									<?php if(!empty($single_guide_applications->biodata )){ ?>
									<input type="hidden" class="form-control" name="old_biodata" id="old_biodata" value="<?=$single_guide_applications->biodata?>">
								<?php } ?>
								</div>
							</div> 
							<div class="col-md-3">
								<div class="form-group">
									<label>Aadhar Card</label>
									<input type="file" name="aadhar_card" id="aadhar_card"  class="form-control">
									<?php if(!empty($single_guide_applications->aadhar_card )){ ?>
									<input type="hidden" class="form-control" name="old_aadhar_card" id="old_aadhar_card" value="<?=$single_guide_applications->aadhar_card?>">
								<?php } ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Reference </label>
									<input type="text" name="reference" id="reference"  class="form-control" value="<?=$single_guide_applications->reference?>">
								</div>
							</div>
							
							</div>
						</div>
						<div class="row">
								<div class="col-md-12">
									<hr class="mw-100">
									<h4 class="card-title">Details of the Bank Account of the Applicant</h4>
								</div>
							</div>
						 
							<div class="row">
								<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Bank Name<span class="req">*</span></label>
											<input type="text" name="bank_name" id="bank_name"  class="form-control" placeholder="Bank Name" value="<?php if(!empty($single_guide_applications)){ echo $single_guide_applications->bank_name; } ?>">
										</div>
									</div> 
									<div class="col-md-3">
										<div class="form-group">
											<label>Account Name<span class="req">*</span></label>
											<input type="text" name="account_name" id="account_name"  class="form-control" placeholder="Account Name" value="<?php if(!empty($single_guide_applications)){ echo $single_guide_applications->account_name;}?>">
										</div>
									</div> 
									<div class="col-md-3">
										<div class="form-group">
											<label>Account Number<span class="req">*</span></label>
											<input type="text" name="account_number" id="account_number"  class="form-control" placeholder="Account Number" value="<?php if(!empty($single_guide_applications)){ echo $single_guide_applications->account_number;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>IFSC Code<span class="req">*</span></label>
											<input type="text" name="ifsc_code" id="ifsc_code"  class="form-control" placeholder="IFSC Code" value="<?php if(!empty($single_guide_applications)){ echo $single_guide_applications->ifsc_code;}?>">
										</div>
									</div> 
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<hr class="mw-100">
								<h4 class="card-title">Payment Remarks</h4>
							</div>
						</div>
						<div class="row">
								<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Final Amount</label>
											<input type="text" name="final_amount" id="final_amount"  class="form-control" placeholder="" value="<?php if(!empty($single_guide_applications)){ echo $single_guide_applications->final_amount; } ?>">
										</div>
									</div> 
									<div class="col-md-8">
										<div class="form-group">
											<label>Remark if any</label>
											<textarea name="final_remark" id="final_remark"  class="form-control"><?php if(!empty($single_guide_applications)){ echo $single_guide_applications->final_remark;}?></textarea>
										</div>
									</div>  
								</div>
							</div>
						</div>
						<input type="hidden" name="id" value="<?php if(!empty($single_guide_applications->id)){ echo $single_guide_applications->id; } ?> " >
						<button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
					</form>
					
				</div>
			</div>
			
		</div>
	</div>
</div>

<?php include("footer.php");?>

<script>
$("#son_of").keyup(function(){
	$("#son_of_val").html($(this).val());
});
$("#name").keyup(function(){
	$("#dec").html($(this).val());
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

jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	

$("#admission_form").validate({
	rules: {
		name: "required",		
		son_of: "required",			
		date_of_birth: "required",		
		mobile: {required:true,number:true,minlength:10,maxlength:12},		
		email: {required:true,validate_email:true},	
		gender: "required",	
		address: "required",		
		country: "required",		
		state: "required",		
		city: "required",		
		pincode: "required",		
		specilisation: "required",		
		research_area: "required",
		employement_type: "required",
		work_experience: "required",		
		present_working: "required",		
		secondary_year: "required",		
		secondary_university: "required",		
		secondary_subject: "required",				
		sr_secondary_year: "required",		
		sr_secondary_university: "required",		
		sr_secondary_subject: "required",			
		graduation_year: "required",		
		graduation_university: "required",		
		graduation_subject: "required",			
		post_graduation_year: "required",		
		post_graduation_university: "required",		
		post_graduation_subject: "required",			
		phd_year: "required",		
		phd_university: "required",		
		phd_subject: "required",	
		accept: "required",	
		designation: "required",	
	},
	messages: {
		name: "Please enter name",		
		son_of: "Please enter son/daughter of",				
		date_of_birth: "Please select date of birth",		
		mobile: {required:"Please enter mobile number",number:"Please enter valid mobile number",minlength:"Please enter valid mobile number",maxlength:"Please enter valid mobile number"},		
		email: {required:"Please enter email",validate_email:"Please enter valid email"},	
		gender: "Please select gender",	
		address: "Please enter valid address",		
		country: "Please select country",		
		state: "Please select state",		
		city: "Please select city",		
		pincode: "Please enter pincode",		
		specilisation: "Please enter specilisation",		
		research_area: "Please enter area of research",	
		employement_type: "Please select employement type",
		work_experience: "Please enter work experience",		
		present_working: "Please enter present working",		
		secondary_year: "Please enter details",		
		secondary_university: "Please enter details",		
		secondary_subject: "Please enter details",			
		sr_secondary_year: "Please enter details",		
		sr_secondary_university: "Please enter details",		
		sr_secondary_subject: "Please enter details",			
		graduation_year: "Please enter details",		
		graduation_university: "Please enter details",		
		graduation_subject: "Please enter details",				
		post_graduation_year: "Please enter details",		
		post_graduation_university: "Please enter details",		
		post_graduation_subject: "Please enter details",				
		phd_year: "Please enter details",		
		phd_university: "Please enter details",		
		phd_subject: "Please enter details",			
		accept: "Please accept declaration",	
		designation: "Please enter designation",	
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});
 
</script>