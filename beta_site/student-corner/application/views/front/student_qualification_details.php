<?php include('header.php');?>
<div class="main-page py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				
				<div id="syll" class="table-package">
					<h3>My Qualification Details</h3>
				</div>                      
				<div class="course_topics">
					<div class="accordion" id="accordionExample">
						<?php if(!empty($qualification)){?>
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Year<span class="req">*</span></label>
											<input type="text" required name="secondary_year" id="secondary_year"  class="form-control" maxlength="4" placeholder="Secondary Year" value="<?php if(!empty($qualification)){ echo $qualification->secondary_year;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Board<span class="req">*</span></label>
											<input type="text" name="secondary_university" id="secondary_university"  class="form-control" placeholder="Secondary Board" value="<?php if(!empty($qualification)){ echo $qualification->secondary_university;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Marks<span class="req">*</span></label>
											<input type="text" name="secondary_marks" id="secondary_marks"  class="form-control" placeholder="Secondary Marks" value="<?php if(!empty($qualification)){ echo $qualification->secondary_marks;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Marksheet</label>
											<br>
											<?php if(!empty($qualification) && $qualification->secondary_marksheet !=""){ ?>
												<a href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->secondary_marksheet)?>" class="btn btn-primary" target='_blank'><i class="mdi mdi mdi-eye"></i></a>
											<?php }?>
										</div>
									</div>
								</div>
							</div>
						</div> 
						<div class="mt_10"></div>
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Year</label>
											<input type="text" name="sr_secondary_year" id="sr_secondary_year"  class="form-control" maxlength="4" placeholder="Sr. Secondary Year" value="<?php if(!empty($qualification)){ echo $qualification->sr_secondary_year;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Board</label>
											<input type="text" name="sr_secondary_university" id="sr_secondary_university"  class="form-control" placeholder="Sr. Secondary Board" value="<?php if(!empty($qualification)){ echo $qualification->sr_secondary_university;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Marks</label>
											<input type="text" name="sr_secondary_marks" id="sr_secondary_marks"  class="form-control" placeholder="Sr. Secondary Marks" value="<?php if(!empty($qualification)){ echo $qualification->sr_secondary_marks;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Marksheet</label>
											<br>
											<?php if(!empty($qualification) && $qualification->sr_secondary_marksheet !=""){ ?>
												<a href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->sr_secondary_marksheet)?>" class="btn btn-primary" target='_blank'><i class="mdi mdi mdi-eye"></i></a>
											<?php }?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mt_10"></div>
						
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation Year</label>
											<input type="text" name="graduation_year" id="graduation_year"  class="form-control" maxlength="4" placeholder="Graduation Year" value="<?php if(!empty($qualification)){ echo $qualification->graduation_year;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation University</label>
											<input type="text" name="graduation_university" id="graduation_university"  class="form-control" placeholder="Graduation University" value="<?php if(!empty($qualification)){ echo $qualification->graduation_university;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation Marks</label>
											<input type="text" name="graduation_marks" id="graduation_marks"  class="form-control" placeholder="Graduation Marks" value="<?php if(!empty($qualification)){ echo $qualification->graduation_marks;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation Marksheet</label>
											<br>
											<?php if(!empty($qualification) && $qualification->graduation_marksheet !=""){ ?>
												<a href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->graduation_marksheet)?>" class="btn btn-primary" target='_blank'><i class="mdi mdi mdi-eye"></i></a>
											<?php }?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mt_10"></div>
						
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation Year</label>
											<input type="text" name="post_graduation_year" id="post_graduation_year" class="form-control" maxlength="4" placeholder="Post Graduation Year" value="<?php if(!empty($qualification)){ echo $qualification->post_graduation_year;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation University</label>
											<input type="text" name="post_graduation_university" id="post_graduation_university" class="form-control" placeholder="Post Graduation University" value="<?php if(!empty($qualification)){ echo $qualification->post_graduation_university;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation Marks</label>
											<input type="text" name="post_graduation_marks" id="post_graduation_marks" class="form-control" placeholder="Post Graduation Marks" value="<?php if(!empty($qualification)){ echo $qualification->post_graduation_marks;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation Marksheet</label>
											<br>
											<?php if(!empty($qualification) && $qualification->post_graduation_marksheet !=""){ ?>
												<a href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->post_graduation_marksheet)?>" class="btn btn-primary" target='_blank'><i class="mdi mdi mdi-eye"></i></a>
											<?php }?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mt_10"></div>
						
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification Year</label>
											<input type="text" name="other_qualification_year" id="other_qualification_year"  class="form-control" maxlength="4" placeholder="Other Qualification Year" value="<?php if(!empty($qualification)){ echo $qualification->other_qualification_year;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification University</label>
											<input type="text" name="other_qualification_university" id="other_qualification_university"  class="form-control" placeholder="Other Qualification University" value="<?php if(!empty($qualification)){ echo $qualification->other_qualification_university;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification Marks</label>
											<input type="text" name="other_qualification_marks" id="other_qualification_marks"  class="form-control" placeholder="Other Qualification Marks" value="<?php if(!empty($qualification)){ echo $qualification->other_qualification_marks;}?>" readonly>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification Marksheet</label>
											<input type="hidden" name="student" id="student"  class="form-control" value="11">
											<br>
											<?php if(!empty($qualification) && $qualification->other_qualification_marksheet !=""){ ?>
												<a href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->other_qualification_marksheet)?>" class="btn btn-primary" target='_blank'><i class="mdi mdi mdi-eye"></i></a>
											<?php }?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mt_10"></div>
					<?php }?> 
					
					
					<div class="mt_10"></div>
						
						<div class="card">
							<div class="card-body">
								<div class="row">
									<?php if($student->show_center_undertaking =="1"){?>
									<div class="col-md-3">
										<div class="form-group">
											<label>Undertaking</label>
											<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/student_identity_softcopy/'.$student->ohter_files)?>"><i class="mdi mdi mdi-eye"></i></a>
										</div>
									</div>
									<?php }?>
									<?php if($student->show_center_collaborator_undertaking =="1"){?>
									<div class="col-md-3">
										<div class="form-group">
											<label>Collaborator Undertaking</label>
											<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/student_identity_softcopy/'.$student->ohter_files)?>"><i class="mdi mdi mdi-eye"></i></a>
										</div>
									</div>
									<?php }?>
								</div>
							</div>
						</div>
						<div class="mt_10"></div>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php include('footer.php');?>
<script>
   $(document).ready(function(){
      $('#pay_button').click(function(){
         var user_id     = '<?=$this->session->userdata('user_id')?>';
         var course_name = '<?=$this->uri->segment(2)?>';
         // alert(course_name);
         $.ajax({
            type:"POST",
            url :"<?=base_url();?>front/User_ajax_controller/payment_data",
            data:{'user_id':user_id,'course_name':course_name},
            success:function(data){
               if(data !=="0"){
                  alert('Please pay');
               }
            },
            error:function(jqXHR,textStatus,errorThrown){
               cansol.log(textStatus,errorThrown);
            }
      });
   });
});
</script>

