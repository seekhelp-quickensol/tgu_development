<?php include('header.php');?>
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-lg-8 grid-margin grid-margin-md-0">
							<div class="card">
								<div class="card-body col-lg-12">
									<h3 class="bold_bx"> Student Featured</h3>
									<div class="row icons-list">
									
										<div class="col-sm-12">
											<a href="<?=base_url();?>s_id_card_print">
											  <i class="mdi mdi-access-point"></i> ID Card
											</a>
										</div>
										<?php /*<div class="col-sm-12">
											<a href="<?=base_url();?>s_admission_form_print" target="_blank">
											  <i class="mdi mdi-file-check btn-icon-prepend"></i>
											  Admission Form
											</a>
										</div>
										<div class="col-sm-12">
											<a href="<?=base_url();?>s-student-qualification-details" target="_blank">
											  <i class="mdi mdi-file-check btn-icon-prepend"></i>
											  Qualifications
											</a>
										</div>
										<div class="col-sm-12">
											<a href="<?=base_url();?>s_my_results">
												<i class="mdi mdi-file-check btn-icon-prepend"></i>
												Results
											</a>
										</div>*/?>
										<div class="col-sm-12">
											<a href="<?=base_url("s_marksheets");?>">
												<i class="mdi mdi-file-check btn-icon-prepend"></i>
												Marksheet
											</a>
										</div>
										<?php /*
										<?php if(!empty($student_profile) && $student_profile->course_id == "23"){?>
											<div class="col-sm-12">
												<a href="<?=base_url("s-student-provisional-registration-letter")?>">
													<i class="mdi mdi-file-check btn-icon-prepend"></i>
													Provisional Registration Letter
												</a>									
											</div>
										<?php }?>
										<div class="col-sm-12">
											<a href="<?=base_url("s-student-provisional-degree")?>">
												<i class="mdi mdi-file-check btn-icon-prepend"></i>
												Provisional Degree
											</a>									
										</div>
										<div class="col-sm-12">
											<!--<a href="<?=base_url("s-student-degree")?>">
												<i class="mdi mdi-file-check btn-icon-prepend"></i>
												Degree
											</a>-->
											<a href="#">
												<i class="mdi mdi-file-check btn-icon-prepend"></i>
												Degree
											</a>
										</div>
										<div class="col-sm-12">
											<a href="javascript:void(0)">
											  <i class="fas fa-certificate" ></i>
											  Character Certificate
											</a>
										</div>
										<div class="col-sm-12">
											<a href="javascript:void(0)">
											  <i class="fas fa-certificate" ></i>        
												 Appear Course Bonafide
											</a>
										</div>
										<div class="col-sm-12">
											<a href="javascript:void(0)">
											  <i class="fas fa-certificate" ></i>        
												Complete Course Bonafide
											</a>
										</div>
										<div class="col-sm-12">
											<a href="javascript:void(0)">
											  <i class="mdi mdi-upload btn-icon-prepend" ></i>        
												Upload Assessment forms
											</a>
										</div>
										<div class="col-sm-12">
											<a href="<?=base_url("s-transfer-certificate")?>">
											 <i class="fas fa-certificate" ></i>                                                  
											  Transfer Certificate
											</a>										
										</div>
										<div class="col-sm-12">
											<a href="<?=base_url()?>s_transcript_application">
											  <i class="mdi mdi-upload btn-icon-prepend"></i>                                                    
											  Transcript
											</a>
										</div>
										<div class="col-sm-12">
											<a href="javascript:void(0)">
											 <i class="fas fa-bell" ></i>                                                                            
											  Notification's
											</a>
										</div>
										<div class="col-sm-12">
											<a href="javascript:void(0)">
											  <i class="fas fa-question-circle" ></i>                                                   
											  Query
											</a>
										</div>

										<div class="col-sm-12">
											<a href="<?=base_url("s-migration-certificate")?>">
												<i class="mdi mdi-file-check btn-icon-prepend"></i>
												Migration
											</a>
										</div>
										<div class="col-sm-12">
											<a href="<?=base_url("s-latter-of-recommendation")?>">
												<i class="mdi mdi-file-check btn-icon-prepend"></i>
												Latter Of recommendation
											</a>
										</div>
										<div class="col-sm-12">
											<a href="<?=base_url();?>s_e_library" > 
												<i class="fas fa-book" ></i>
												<b>E-Library</b>
											</a>
										</div> 


										<?php if(!empty($student_profile) && $student_profile->course_id == "23"){?>
											<div class="col-sm-12">
												<a href="<?=base_url("s-thesis_submission")?>">
													<i class="mdi mdi-file-check btn-icon-prepend"></i>
													Thesis Submission
												</a>									
											</div> 
											<div class="col-sm-12">
												<a href="<?=base_url("s-synopsis_submission")?>">
													<i class="mdi mdi-file-check btn-icon-prepend"></i>
													Synopsis Submission
												</a>									
											</div> 
										<div class="col-sm-12">
												<a href="<?=base_url("s-abstract_report")?>">
													<i class="mdi mdi-file-check btn-icon-prepend"></i>
													Abstract Report
												</a>									
										</div> 
										<div class="col-sm-12">
											<a href="<?=base_url("s-progress_report")?>">
												<i class="mdi mdi-file-check btn-icon-prepend"></i>
													Progress Report
											</a>									
										</div>
										<?php $course_resutl = $this->Separate_students_model->get_single_marksheet_result_separate_student(); 
										if(count($course_resutl)> 0){?>
										<div class="col-sm-12">
											<a target="blank" href="<?=base_url("course_work_result_separate_student")?>">
												<i class="mdi mdi-file-check btn-icon-prepend"></i>
													Course Work Result
											</a>									
										</div>
										<?php } }?>*/?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 flex-column d-flex stretch-card">
							<div class="card congratulation-bg text-center" style="background: url(<?=$this->Digitalocean_model->get_photo('images/sort_profile.jpg')?>);background-size: cover;">
								<div class="card-body pb-0">
									<img style="border-radius: 78px;height: 150px;" src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/default.jpg')?>" alt="">  
									<h2 class="mt-3 text-white mb-3 font-weight-bold">Welcome
										<?=$student_profile->student_name?>!
									</h2>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include('footer.php');?>
