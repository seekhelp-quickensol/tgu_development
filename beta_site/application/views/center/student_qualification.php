<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Qualification Form
				  </h4>
                  <p class="card-description">
                    Please enter qualification details
                  </p>
					<form method="post" name="verification_form" id="verification_form" enctype="multipart/form-data">
						<div class="row edu">
							<div class="col-md-3">
								<div class="form-group">
									<label>Verification Status<span class="req">*</span></label>
									<select required name="center_verification_status" id="center_verification_status"  class="form-control">
										<option value="">Select Status</option>
										<option value="1" <?php if(!empty($student) && $student->center_verification_status == "1"){ ?>selected="selected"<?php }?>>Verified</option>
										<option value="2" <?php if(!empty($student) && $student->center_verification_status == "2"){ ?>selected="selected"<?php }?>>Unverified</option>
										<option value="3"  <?php if(!empty($student) && $student->center_verification_status == "3"){ ?>selected="selected"<?php }?>>On Hold</option>
									</select>
									<input type="hidden" name="student_id" id="student_id"  class="form-control" placeholder="Secondary Year" value="<?php if(!empty($student)){ echo $student->id; }?>">
								</div>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<label>Remark</label>
									<textarea name="center_verifed_remark" id="center_verifed_remark"  class="form-control" placeholder="Remark if any"><?=$student->center_verifed_remark ?? ''?></textarea>
								</div>
							</div>
						</div> 
						<div class="row">
							<div class="col-md-12 edu">
								<div class="form-group">
									<label></label>
									<button type="submit" class="btn btn-primary" name="verify" id="verify" value="Verify">Submit</button>
									<div class="pull-right">
									</div>
								</div>
							</div>	
						</div> 
					</form>
                </div>
              </div>
            </div>
		  </div>
          <div class="row">
		  <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Other Documents List of 
						<?php if(!empty($student)){?>
							<!-- <a target="_blank" href="<?=base_url();?>center_print_admission_form/<?=$student->id?>"> -->
								<?=$student->student_name?>
							<!-- </a> -->
						<?php }?>
					</h4>
				<p class="card-description">
                 <p class="card-description">
                    All list of Documents 
                  </p>
				  <form method="post" enctype="multipart/form-data">
					<table id="examplea" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>ID Proof</th>
								<th>Photo</th>
								<th>Signature</th>
								<?php if(!empty($student) && $student->show_center_undertaking =="1"){?>
								<th>Undertaking</th>
								<?php }?>
								<?php if(!empty($student) && $student->show_center_collaborator_undertaking =="1"){?>
								<th>Collaborator Undertaking</th>
								<?php }?>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<?php if(!empty($student) && $student->identity_softcopy !=""){?>
										<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/student_identity_softcopy/'.$student->identity_softcopy)?>"><i class="mdi mdi mdi-eye"></i></a>
									<?php }?>
									<input type="file" name="identity_file">
									<input type="hidden" name="old_id_proof" value="<?=$student->identity_softcopy?>">
								</td> 
								<td>
									<?php if(!empty($student) && $student->photo !=""){?>
									<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$student->photo)?>"><i class="mdi mdi mdi-eye"></i></a>
									<?php }?>
									<input type="file" name="userfile">
									<input type="hidden" name="old_photo" value="<?=$student->photo?>">
								</td>
								<td>
									<?php if(!empty($student) && $student->signature !=""){?>
									<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/signature/'.$student->signature)?>"><i class="mdi mdi mdi-eye"></i></a>
									<?php }?>
									<input type="file" name="signature">
									<input type="hidden" name="old_signature" value="<?=$student->signature?>">
								</td>
								
								<?php if(!empty($student) && $student->show_center_undertaking =="1"){?>
								<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/student_identity_softcopy/'.$student->ohter_files)?>"><i class="mdi mdi mdi-eye"></i></a></td>
								<?php }?>
								<?php if(!empty($student) && $student->show_center_collaborator_undertaking =="1"){?>
								<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/student_identity_softcopy/'.$student->ohter_files)?>"><i class="mdi mdi mdi-eye"></i></a></td>
								<?php }?>
							</tr>
						</tbody>
					</table>
					<input type="hidden" name="student_id" id="student_id"  class="form-control" placeholder="Secondary Year" value="<?php if(!empty($student)){ echo $student->id; }?>">
					<input type="submit" value="Upload" name="upload_photo" class="btn btn-primary">
					</form>
					
                </div>
              </div>
            </div>
            </div>
			<div class="row">
		  <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Qualification List of 
						<?php if(!empty($student)){?>
							<!-- <a target="_blank" href="<?=base_url();?>center_print_admission_form/<?=$student->id?>"> -->
								<?=$student->student_name?>
							<!-- </a> -->
						<?php }?>
					</h4>
				<p class="card-description">
                 <p class="card-description">
                    All list of Qualification 
                  </p>
					<table id="examples" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>Qualification</th>
								<th>Year</th>
								<th>Board/University</th>
								<th>Marks</th>
								<th>Marksheet</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($qualification) && $qualification->secondary_year !=""){?>
							<tr>
								<td>Secondary</td>
								<td><?=$qualification->secondary_year?></td>
								<td><?=$qualification->secondary_university?></td>
								<td><?=$qualification->secondary_marks?></td>
								<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->secondary_marksheet)?>"><i class="mdi mdi mdi-eye"></i></a></td>
							</tr>
							<?php }?>
							<?php if(!empty($qualification) && $qualification->sr_secondary_year !=""){?>
							<tr>
								<td>Sr. Secondary</td>
								<td><?=$qualification->sr_secondary_year?></td>
								<td><?=$qualification->sr_secondary_university?></td>
								<td><?=$qualification->sr_secondary_marks?></td>
								<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->sr_secondary_marksheet)?>"><i class="mdi mdi mdi-eye"></i></a></td>
							</tr>
							<?php }?>
							<?php if(!empty($qualification) && $qualification->graduation_year !=""){?>
							<tr>
								<td>Graduation</td>
								<td><?=$qualification->graduation_year?></td>
								<td><?=$qualification->graduation_university?></td>
								<td><?=$qualification->graduation_marks?></td>
								<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->graduation_marksheet)?>"><i class="mdi mdi mdi-eye"></i></a></td>
							</tr>
							<?php }?>
							<?php if(!empty($qualification) && $qualification->post_graduation_year !=""){?>
							<tr>
								<td>Post Graduation</td>
								<td><?=$qualification->post_graduation_year?></td>
								<td><?=$qualification->post_graduation_university?></td>
								<td><?=$qualification->post_graduation_marks?></td>
								<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->post_graduation_marksheet)?>"><i class="mdi mdi mdi-eye"></i></a></td>
							</tr>
							<?php }?>
							<?php if(!empty($qualification) && $qualification->other_qualification_year !=""){?>
							<tr>
								<td>Other</td>
								<td><?=$qualification->other_qualification_year?></td>
								<td><?=$qualification->other_qualification_university?></td>
								<td><?=$qualification->other_qualification_marks?></td>
								<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->other_qualification_marksheet)?>"><i class="mdi mdi mdi-eye"></i></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
                </div>
              </div>
            </div>
			
			<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Qualification Form
				  </h4>
                  <p class="card-description">
                    Please enter qualification details
                  </p>
					<form method="post" name="qualification_form" id="qualification_form" enctype="multipart/form-data">
						<div class="row edu">
							<div class="col-md-3">
								<div class="form-group">
									<label>Secondary Year<span class="req">*</span></label>
									<input type="text" required name="secondary_year" id="secondary_year"  class="form-control" maxlength="4" placeholder="Secondary Year" value="<?php if(!empty($qualification) && $qualification->secondary_year !=""){ echo $qualification->secondary_year; }?>" <?php if(!empty($qualification) && $qualification->secondary_year !=""){?> readonly <?php }?>>
									<input type="hidden" name="student_id" id="student_id"  class="form-control" placeholder="Secondary Year" value="<?php if(!empty($student)){ echo $student->id; }?>">
									<input type="hidden" name="qualification_id" id="qualification_id"  class="form-control" placeholder="Secondary Year" value="<?php if(!empty($qualification)){ echo $qualification->id; }?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Secondary Board<span class="req">*</span></label>
									<input type="text" name="secondary_university" id="secondary_university"  class="form-control" placeholder="Secondary Board" value="<?php if(!empty($qualification) && $qualification->secondary_university !=""){ echo $qualification->secondary_university; }?>" <?php if(!empty($qualification) && $qualification->secondary_university !=""){?> readonly <?php }?>>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Secondary Marks<span class="req">*</span></label>
									<input type="text" name="secondary_marks" id="secondary_marks"  class="form-control" placeholder="Secondary Marks" value="<?php if(!empty($qualification) && $qualification->secondary_marks !=""){ echo $qualification->secondary_marks; }?>" <?php if(!empty($qualification) && $qualification->secondary_marks !=""){?> readonly <?php }?>>
								</div>
							</div>
							<?php if(!empty($qualification) && $qualification->secondary_marksheet !=""){ ?>
								<div class="col-md-3">
									<div class="form-group">
										<label>Secondary Marksheet</span></label>
										<br>
										<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->secondary_marksheet)?>" class="btn btn-primary"><i class="mdi mdi mdi-eye"></i></a>
										<input type="hidden" name="secondary_marksheet_old" id="secondary_marksheet_old" class="form-control" value="<?=$qualification->secondary_marksheet?>">
									</div>
								</div>
							<?php }else{?>
								<div class="col-md-3">
									<div class="form-group">
										<label>Secondary Marksheet<span class="req">*</span></label>
										<input type="file" name="secondary_marksheet" id="secondary_marksheet"  class="form-control">
									</div>
								</div>
							<?php }?>
						</div>
						<div class="row edu">
							<div class="col-md-3">
								<div class="form-group">
									<label>Sr. Secondary Year</label>
									<input type="text" name="sr_secondary_year" id="sr_secondary_year"  class="form-control" maxlength="4" placeholder="Sr. Secondary Year" value="<?php if(!empty($qualification) && $qualification->sr_secondary_year !=""){ echo $qualification->sr_secondary_year; }?>" <?php if(!empty($qualification) && $qualification->sr_secondary_year !=""){?> readonly <?php }?>>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Sr. Secondary Board</label>
									<input type="text" name="sr_secondary_university" id="sr_secondary_university"  class="form-control" placeholder="Sr. Secondary Board" value="<?php if(!empty($qualification) && $qualification->sr_secondary_university !=""){ echo $qualification->sr_secondary_university; }?>" <?php if(!empty($qualification) && $qualification->sr_secondary_university !=""){?> readonly <?php }?>>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Sr. Secondary Marks</label>
									<input type="text" name="sr_secondary_marks" id="sr_secondary_marks"  class="form-control" placeholder="Sr. Secondary Marks" value="<?php if(!empty($qualification) && $qualification->sr_secondary_marks !=""){ echo $qualification->sr_secondary_marks; }?>" <?php if(!empty($qualification) && $qualification->sr_secondary_marks !=""){?> readonly <?php }?>>
								</div>
							</div>
							<?php if(!empty($qualification) && $qualification->sr_secondary_marksheet !=""){ ?>
								<div class="col-md-3">
									<div class="form-group">
										<label>Sr. Secondary Marksheet</label>
										<br>
										<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->sr_secondary_marksheet)?>" class="btn btn-primary"><i class="mdi mdi mdi-eye"></i></a>
										<input type="hidden" name="sr_secondary_marksheet_old" id="sr_secondary_marksheet_old" class="form-control" value="<?=$qualification->sr_secondary_marksheet?>">
									</div>
								</div>
							<?php }else{?>
								<div class="col-md-3">
									<div class="form-group">
										<label>Sr. Secondary Marksheet</label>
										<input type="file" name="sr_secondary_marksheet" id="sr_secondary_marksheet"  class="form-control">
									</div>
								</div>
							<?php }?>
						</div>
						
						<div class="row edu">
							<div class="col-md-3">
								<div class="form-group">
									<label>Graduation Year</label>
									<input type="text" name="graduation_year" id="graduation_year"  class="form-control" maxlength="4" placeholder="Graduation Year" value="<?php if(!empty($qualification) && $qualification->graduation_year !=""){ echo $qualification->graduation_year; }?>" <?php if(!empty($qualification) && $qualification->graduation_year !=""){?> readonly <?php }?>>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Graduation University</label>
									<input type="text" name="graduation_university" id="graduation_university"  class="form-control" placeholder="Graduation University" value="<?php if(!empty($qualification) && $qualification->graduation_university !=""){ echo $qualification->graduation_university; }?>" <?php if(!empty($qualification) && $qualification->graduation_university !=""){?> readonly <?php }?>>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Graduation Marks</label>
									<input type="text" name="graduation_marks" id="graduation_marks"  class="form-control" placeholder="Graduation Marks" value="<?php if(!empty($qualification) && $qualification->graduation_marks !=""){ echo $qualification->graduation_marks; }?>" <?php if(!empty($qualification) && $qualification->graduation_marks !=""){?> readonly <?php }?>>
								</div>
							</div>
							<?php if(!empty($qualification) && $qualification->graduation_marksheet !=""){ ?>
								<div class="col-md-3">
									<div class="form-group">
										<label>Graduation Marksheet</label>
										<br>
										<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->graduation_marksheet)?>" class="btn btn-primary"><i class="mdi mdi mdi-eye"></i></a>
										<input type="hidden" name="graduation_marksheet_old" id="graduation_marksheet_old" class="form-control" value="<?=$qualification->graduation_marksheet?>">
									</div>
								</div>
							<?php }else{?>
								<div class="col-md-3">
									<div class="form-group">
										<label>Graduation Marksheet</label>
										<input type="file" name="graduation_marksheet" id="graduation_marksheet"  class="form-control">
									</div>
								</div>
							<?php }?>
						</div>
						<div class="row edu">
							<div class="col-md-3">
								<div class="form-group">
									<label>Post Graduation Year</label>
									<input type="text" name="post_graduation_year" id="post_graduation_year" class="form-control" maxlength="4" placeholder="Post Graduation Year" value="<?php if(!empty($qualification) && $qualification->post_graduation_year !=""){ echo $qualification->post_graduation_year; }?>" <?php if(!empty($qualification) && $qualification->post_graduation_year !=""){?> readonly <?php }?>>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Post Graduation University</label>
									<input type="text" name="post_graduation_university" id="post_graduation_university" class="form-control" placeholder="Post Graduation University" value="<?php if(!empty($qualification) && $qualification->post_graduation_university !=""){ echo $qualification->post_graduation_university; }?>" <?php if(!empty($qualification) && $qualification->post_graduation_university !=""){?> readonly <?php }?>>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Post Graduation Marks</label>
									<input type="text" name="post_graduation_marks" id="post_graduation_marks" class="form-control" placeholder="Post Graduation Marks" value="<?php if(!empty($qualification) && $qualification->post_graduation_marks !=""){ echo $qualification->post_graduation_marks; }?>" <?php if(!empty($qualification) && $qualification->post_graduation_marks !=""){?> readonly <?php }?>>
									<!--<input type="hidden" name="student_id" id="student_id" value="<?=$student->id?>">-->
									<!--<input type="hidden" name="fees_id" id="fees_id" value="<?=$fees->id?>">
									<input type="hidden" name="payment_mode" id="payment_mode" value="<?=$fees->payment_mode?>">-->
								</div>
							</div>
							<?php if(!empty($qualification) && $qualification->post_graduation_marksheet !=""){ ?>
								<div class="col-md-3">
									<div class="form-group">
										<label>Post Graduation Marksheet</label>
										<br>
										<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->post_graduation_marksheet)?>" class="btn btn-primary"><i class="mdi mdi mdi-eye"></i></a>
										<input type="hidden" name="post_graduation_marksheet_old" id="post_graduation_marksheet_old" class="form-control" value="<?=$qualification->post_graduation_marksheet?>">
									</div>
								</div>
							<?php }else{?>
								<div class="col-md-3">
									<div class="form-group">
										<label>Post Graduation Marksheet</label>
										<input type="file" name="post_graduation_marksheet" id="post_graduation_marksheet"  class="form-control">
									</div>
								</div>
							<?php }?>
						</div>
						<div class="row edu">
							<div class="col-md-3">
								<div class="form-group">
									<label>Other Qualification Year</label>
									<input type="text" name="other_qualification_year" id="other_qualification_year"  class="form-control" maxlength="4" placeholder="Other Qualification Year" value="<?php if(!empty($qualification) && $qualification->other_qualification_year !=""){ echo $qualification->other_qualification_year; }?>" <?php if(!empty($qualification) && $qualification->other_qualification_year !=""){?> readonly <?php }?>>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Other Qualification University</label>
									<input type="text" name="other_qualification_university" id="other_qualification_university"  class="form-control" placeholder="Other Qualification University" value="<?php if(!empty($qualification) && $qualification->other_qualification_university !=""){ echo $qualification->other_qualification_university; }?>" <?php if(!empty($qualification) && $qualification->other_qualification_university !=""){?> readonly <?php }?>>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Other Qualification Marks</label>
									<input type="text" name="other_qualification_marks" id="other_qualification_marks"  class="form-control" placeholder="Other Qualification Marks" value="<?php if(!empty($qualification) && $qualification->other_qualification_marks !=""){ echo $qualification->other_qualification_marks; }?>" <?php if(!empty($qualification) && $qualification->other_qualification_marks !=""){?> readonly <?php }?>>
								</div>
							</div>
							<?php if(!empty($qualification) && $qualification->other_qualification_marksheet !=""){ ?>
								<div class="col-md-3">
									<div class="form-group">
										<label>Other Qualification Marksheet</label>
										<br>
										<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->other_qualification_marksheet)?>" class="btn btn-primary"><i class="mdi mdi mdi-eye"></i></a>
										<input type="hidden" name="other_qualification_marksheet_old" id="other_qualification_marksheet_old" class="form-control" value="<?=$qualification->other_qualification_marksheet?>">
									</div>
								</div>
							<?php }else{?>
								<div class="col-md-3">
									<div class="form-group">
										<label>Other Qualification Marksheet</label>
										<input type="file" name="other_qualification_marksheet" id="other_qualification_marksheet"  class="form-control">
									</div>
								</div>
							<?php }?>
						</div>
						
						<div class="row">
							<div class="col-md-12 edu">
								<div class="form-group">
									<label></label>
									<button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Submit</button>
									<div class="pull-right">
									</div>
								</div>
							</div>	
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
 <script>
 
 $('#verification_form').validate({
	rules: {
		center_verification_status: {
			required: true,
		}, 
	},
	messages: {
		center_verification_status: {
			required: "Please select status of verification",
		}, 
	},
	
});
$(document).ready(function() {
	$('#example').DataTable({
		buttons: [
			{
				extend: 'copyHtml5',
				exportOptions: {
				 columns: ':contains("Office")'
				}
			},
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5'
		],
    }); 
});
</script>
 