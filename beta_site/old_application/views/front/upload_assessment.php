<?php 
include('header.php');?>
<?php 
// echo "<pre>"; print_r($student);exit;

?>
<style>
  
</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Upload Assessment Form</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" id="printable_div">
								
											<ul class="nav nav-tabs tab-no-active-fill" role="tablist">
												<li class="nav-item">
													<a class="nav-link <?php if($this->uri->segment(2) == "" || $this->uri->segment(2) == "revenue-for-last-month"){?>active<?php }?> pl-2 pr-2" id="revenue-for-last-month-tab" data-toggle="tab" href="#revenue-for-last-month" role="tab" aria-controls="revenue-for-last-month" aria-selected="true">Self Assessment Form</a>
												</li>
												<li class="nav-item">
													<a class="nav-link <?php if($this->uri->segment(2) == "data-managed-tab"){?>active<?php }?> pl-2 pr-2" id="data-managed-tab" data-toggle="tab" href="#data-managed" role="tab" aria-controls="data-managed" aria-selected="false">Teachers Assessment Form</a>
												</li>
												
												<li class="nav-item">
													<a class="nav-link <?php if($this->uri->segment(2) == "data-managed-tab-assignment"){?>active<?php }?>  pl-2 pr-2" id="data-managed-tab1" data-toggle="tab" href="#data-managed-tab-assignment" role="tab" aria-controls="data-managed" aria-selected="false">Assignment Form</a>
												</li>
												<li class="nav-item">
													<a class="nav-link  <?php if($this->uri->segment(2) == "data-managed-tab-industrial"){?>active<?php }?> pl-2 pr-2" id="data-managed-tab1" data-toggle="tab" href="#data-managed-tab-industrial" role="tab" aria-controls="data-managed" aria-selected="false">Industrial Assessment</a>
												</li>
												<li class="nav-item">
													<a class="nav-link  <?php if($this->uri->segment(2) == "data-managed-tab-guardian"){?>active<?php }?> pl-2 pr-2" id="data-managed-tab1" data-toggle="tab" href="#data-managed-tab-guardian" role="tab" aria-controls="data-managed" aria-selected="false">Parent Assessment</a>
												</li>
											</ul>
											<div class="tab-content tab-no-active-fill-tab-content">
												<div class="tab-pane fade <?php if($this->uri->segment(2) == "" || $this->uri->segment(2) == "revenue-for-last-month"){?>show active<?php }?>" id="revenue-for-last-month" role="tabpanel" aria-labelledby="revenue-for-last-month-tab">
													<div class="d-lg-flex justify-content-between">
														<div class="full_layer">
															<form method="post" name="self_form" id="self_form" enctype="multipart/form-data">
															    <input type="hidden" name="page_tab" value="revenue-for-last-month">
																<table class="table table-responsive table-bordered" width="100%">
																	<tbody>
																		<tr>
																			<td>Form Name</td>
																			<td style="text-align:center">Download Form</td>
																			<td>Sem/Year</td>
																			<td>Upload Form(pdf,jpg,png,jpeg)</td>
																		</tr>
																		<tr>
																			<td>SELF ASSESSMENT & PARENT ASSESSMENT FORM</td>
																			<td style="text-align:center">
																				<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/assessment/SELF-ASSESSMENT.pdf')?>" download="" class="btn btn-primary download_form">Download</a>
																			</td>
																			<td style="text-align:center">
																				<input type="text" class="form-control" name="year_sem" id="year_sem" value="<?=$student->year_sem?>" readonly required>
																				 
																			</td>
																			<td style="text-align:center">
																				<input type="file" width="25%" class="form-control fileInput" name="userfile" id="userfile" accept=".jpg,.png,.jpeg,.pdf">
																			</td>
																		
																			<td style="text-align:center">
																			<?php
																				$disabled = ''; 
																				if (!empty($self_assement)) {
																					foreach ($self_assement as $self_assement_result) {
																						if ($student->year_sem === $self_assement_result->year_sem && ($self_assement_result->assessment_status == 0 || $self_assement_result->assessment_status == 1)) {
																							$disabled = 'disabled'; 
																							break; 
																						}
																					}
																				}
																				?>
																				<input class="btn btn-sm btn-primary" type="submit" name="save" value="Upload Form" <?=$disabled?>>
																			</td>
																		</tr>
																	</tbody>
																</table>																
															</form>	
															<table class="table  table-bordered" width="100%">
																<tbody>
																	<tr>
																		<td>Sem/Year</td>
																		<td>View</td>
																		<td>Status</td>
																		<td>Remark</td>
																	</tr>
																	<?php
																	if(!empty($self_assement)){ foreach($self_assement as $self_assement_result){?>
																		<tr>
																			<?php  
																			// print_r($self_assement_result);exit;
										
																			?>
																			<td><?=$self_assement_result->year_sem?></td>
																			<td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/self_assement/'.$self_assement_result->file)?>" target="_blank"><i class="mdi mdi-eye"></i></a></td>
																			<?php if($self_assement_result->assessment_status == 0) {?>
																			<td>Pending</td>
																			<?php }else if($self_assement_result->assessment_status == 1) {?>
																			<td>Approved</td>
																			<?php }else {?>
																				<td>Rejected</td>
																			<?php }?>
																			<td><?=$self_assement_result->rejection_remark?></td>
																		</tr>
																	<?php }}?>
																</tbody>
															</table>
													</div>
													</div> 
												</div> 
												<div class="tab-pane fade <?php if($this->uri->segment(2) == "data-managed"){?>show active<?php }?>" id="data-managed" role="tabpanel" aria-labelledby="data-managed-tab">
													<div class="d-flex justify-content-between">
														<div class="col-lg-12">
															<form method="post" name="teacher_form" id="teacher_form" enctype="multipart/form-data">
															    <input type="hidden" name="page_tab" value="data-managed">
																<table class="table table-responsive table-bordered" width="100%">
																	<tbody>
																		<tr>
																			<td>Form Name</td>
																			<td style="text-align:center">Download Form</td>
																			<td>Sem/Year</td>
																			<td>Upload Form(pdf,jpg,png,jpeg)</td>
																		</tr>
																		<tr>
																			<td>TEACHER ASSESSMENT FORM</td>
																			<td style="text-align:center">
																				<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/assessment/TEACHER_ASSESSMENT_FORM.pdf')?>" download="" class="btn btn-primary">Download Form</a>
																			</td>
																			<td style="text-align:center">
																				<input type="text" class="form-control" name="year_sem" id="year_sem" value="<?=$student->year_sem?>" readonly required>
																					 
																			</td>
																			<td style="text-align:center">
																				<input type="file" width="25%" class="form-control fileInput" name="userfile" id="userfile" accept=".jpg,.png,.jpeg,.pdf">
																			</td>
																			<td style="text-align:center">
																			<?php
																				$disabled = ''; 
																				if (!empty($teacher_assement)) {
																					foreach ($teacher_assement as $teacher_assement_result ) {
																						if ($student->year_sem === $teacher_assement_result->year_sem && ($teacher_assement_result->assessment_status == 0 || $teacher_assement_result->assessment_status == 1)) {
																							$disabled = 'disabled'; 
																							break; 
																						}
																					}
																				}
																				?>
																				<input class="btn btn-sm btn-primary" type="submit" name="teacher" value="Upload Form" <?=$disabled?>>
																			</td>
																		</tr>
																	</tbody>
																</table>
														
															</form>	
															<table class="table  table-bordered" width="100%">
																<tbody>
																	<tr>
																		<td>Sem/Year</td>
																		<td>View</td>
																		<td>Status</td>
																		<td>Remark</td>
																	</tr>
																	<?php if(!empty($teacher_assement)){ foreach($teacher_assement as $teacher_assement_result){?>
																		<tr>
																			<td><?=$teacher_assement_result->year_sem?></td>
																			<td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/teacher_assement/'.$teacher_assement_result->file)?>" target="_blank"><i class="mdi mdi-eye"></i></a></td>
																			<?php if($teacher_assement_result->assessment_status == 0) {?>
																				<td>Pending</td>
																				<?php }else if($teacher_assement_result->assessment_status == 1) {?>
																				<td>Approved</td>
																				<?php }else {?>
																					<td>Rejected</td>
																				<?php }?>
																				<td><?=$teacher_assement_result->rejection_remark?></td>
																		</tr>
																	<?php }}?>
																</tbody>
															</table>
														</div>
													</div>
												</div>


												<div class="tab-pane fade <?php if($this->uri->segment(2) == "data-managed-tab-assignment"){?>show active<?php }?>" id="data-managed-tab-assignment" role="tabpanel" aria-labelledby="data-managed-tab1">
													<div class="d-flex justify-content-between">
														<div class="col-lg-12">
															<form method="post" name="assignment_form" id="assignment_form" enctype="multipart/form-data">
															    <input type="hidden" name="page_tab" value="data-managed-tab-assignment">
																<table class="table table-responsive table-bordered" width="100%">
																	<tbody>
																		<tr>
																			<td>Form Name</td>
																			<td >Title</td>
																			<td>Sem/Year</td>
																			<td>Upload Form(pdf,jpg,png,jpeg)</td>
																		</tr>
																		<tr>
																			<td> ASSIGNMENT FORM</td>
																			<td style="text-align:center">
																		<input type="text" name="assignment_title" class="form-control" id ="assignment_title" 	>
																		</td>
																			<td style="text-align:center">
																				<input type="text" class="form-control" name="year_sem" id="year_sem" value="<?=$student->year_sem?>" readonly required>
																					 
																			</td>
																			<td style="text-align:center">
																				<input type="file" width="25%" class="form-control fileInput" name="userfile" id="userfile" accept=".jpg,.png,.jpeg,.pdf">
																			</td>
																			<td style="text-align:center">
																			<?php
																				$disabled = ''; 
																				if (!empty($assignment)) {
																					foreach ($assignment as $assignment_result) {
																						if ($student->year_sem === $assignment_result->year_sem && ($assignment_result->assessment_status == 0 || $assignment_result->assessment_status == 1)) {
																							$disabled = 'disabled'; 
																							break; 
																						}
																					}
																				}
																				?>
																				<input class="btn btn-sm btn-primary" type="submit" name="assignement" value="Upload Form" <?=$disabled?>>
																			</td>
																		</tr>
																	</tbody>
																</table>
																
															</form>	
															<table class="table  table-bordered" width="100%">
																<tbody>
																	<tr><td>Title</td>
																		<td>Sem/Year</td>
																		<td>View</td>
																		<td>Status</td>
																		<td>Remark</td>
																	</tr>
																	<?php 
													// print_r($assignment);exit;
																	if(!empty($assignment)){ foreach($assignment as $assignment_result){?>
																		<tr>
																		<td><?=$assignment_result->assignment_title?></td>
																			<td><?=$assignment_result->year_sem?></td>
																			<td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/assignment/'.$assignment_result->file)?>" target="_blank"><i class="mdi mdi-eye"></i></a></td>
																			<?php if($assignment_result->assessment_status == 0) {?>
																				<td>Pending</td>
																				<?php }else if($assignment_result->assessment_status == 1) {?>
																					<td>Approved</td>
																					<?php }else {?>
																						<td>Rejected</td>
																					<?php }?>
																					<td><?=$assignment_result->rejection_remark?></td>
																		</tr>
																	<?php }}?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
												
												
												<div class="tab-pane fade <?php if($this->uri->segment(2) == "data-managed-tab-industrial"){?>show active<?php }?>" id="data-managed-tab-industrial" role="tabpanel" aria-labelledby="data-managed-tab">
													<div class="d-flex justify-content-between">
														<div class="col-lg-12">
															<form method="post" name="industry_form" id="industry_form" enctype="multipart/form-data">
															    <input type="hidden" name="page_tab" value="data-managed-tab-industrial">
																<table class="table table-responsive table-bordered" width="100%">
																	<tbody>
																		<tr>
																			<td>Form Name</td>
																			<td style="text-align:center">Download Form</td>
																			<td>Sem/Year</td>
																			<td>Upload Form(pdf,jpg,png,jpeg)</td>
																		</tr>
																		<tr>
																			<td>INDUSTRY ASSESSMENT FORM</td>
																			<td style="text-align:center">
																				<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/assessment/POTENTIAL_EMPLOYER_ASSESSMENT_FORM.pdf')?>" download="" class="btn btn-primary">Download Form</a>
																			</td>
																			<td style="text-align:center">
																			<input type="text" class="form-control" name="year_sem" id="year_sem" value="<?=$student->year_sem?>" readonly required>
																			</td>
																			<td style="text-align:center">
																				<input type="file" width="25%" class="form-control fileInput" name="userfile" id="userfile" accept=".jpg,.png,.jpeg,.pdf">
																			</td>
																			<td style="text-align:center">
																			<?php
																				$disabled = ''; 
																				if (!empty($industrial)) {
																					foreach ($industrial as $industrial_result) {
																						if ($student->year_sem === $industrial_result->year_sem && ($industrial_result->assessment_status == 0 || $industrial_result->assessment_status == 1)) {
																							$disabled = 'disabled'; 
																							break; 
																						}
																					}
																				}
																				?>
																				<input class="btn btn-sm btn-primary" type="submit" name="industrial" value="Upload Form" <?=$disabled?>>
																			</td>
																		</tr>
																	</tbody>
																</table>
																
															</form>	
															<table class="table  table-bordered" width="100%">
																<tbody>
																	<tr>
																		<td>Sem/Year</td>
																		<td>View</td>
																		<td>Status</td>
																		<td>Remark</td>
																	</tr>
																	<?php if(!empty($industrial)){ foreach($industrial as $industrial_result){?>
																		<tr>
																			<td><?=$industrial_result->year_sem?></td>
																			<td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/industry_assesment/'.$industrial_result->file)?>" target="_blank"><i class="mdi mdi-eye"></i></a></td>
																			<?php if($industrial_result->assessment_status == 0) {?>
																				<td>Pending</td>
																				<?php }else if($industrial_result->assessment_status == 1) {?>
																					<td>Approved</td>
																					<?php }else {?>
																						<td>Rejected</td>
																					<?php }?>
																					<td><?=$industrial_result->rejection_remark?></td>
																		</tr>
																	<?php }}?>
																</tbody>
															</table>
														</div>
													</div>
												</div>

												<div class="tab-pane fade  <?php if($this->uri->segment(2) == "data-managed-tab-guardian"){?>show active<?php }?>" id="data-managed-tab-guardian" role="tabpanel" aria-labelledby="data-managed-tab">
													<div class="d-flex justify-content-between">
														<div class="col-lg-12">
															<form method="post" name="guardian_form" id="guardian_form" enctype="multipart/form-data">
															    <input type="hidden" name="page_tab" value="data-managed-tab-guardian">
																<table class="table table-responsive table-bordered" width="100%">
																	<tbody>
																		<tr>
																			<td>Form Name</td>
																			<td style="text-align:center">Download Form</td>
																			<td>Sem/Year</td>
																			<td>Upload Form(pdf,jpg,png,jpeg)</td>
																		</tr>
																		<tr>
																			<td>PARENT ASSESSMENT FORM</td>
																			<td style="text-align:center">
																				<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/assessment/parent-assessment-form.pdf')?>" download="" class="btn btn-primary">Download Form</a>
																			</td>
																			<td style="text-align:center">
																			<input type="text" class="form-control" name="year_sem" id="year_sem" value="<?=$student->year_sem?>" readonly required>
																			</td>
																			<td style="text-align:center">
																				<input type="file" width="25%" class="form-control fileInput" name="userfile" id="userfile" accept=".jpg,.png,.jpeg,.pdf">
																			</td>
																			<td style="text-align:center">
																			<?php
																				$disabled = ''; 
																				if (!empty($guardian)) {
																					foreach ($guardian as $guardian_result) {
																						if ($student->year_sem === $guardian_result->year_sem && ($guardian_result->assessment_status == 0 || $guardian_result->assessment_status == 1)) {
																							$disabled = 'disabled'; 
																							break; 
																						}
																					}
																				}
																				?>
																				<input class="btn btn-sm btn-primary" type="submit" name="guardian" value="Upload Form" <?=$disabled?>>
																			</td>
																		</tr>
																	</tbody>
																</table>
																
															</form>	
															<table class="table  table-bordered" width="100%">
																<tbody>
																	<tr>
																		<td>Sem/Year</td>
																		<td>View</td>
																		<td>Status</td>
																		<td>Remark</td>
																	</tr>
																	<?php if(!empty($guardian)){ foreach($guardian as $guardian_result){?>
																		<tr>
																			<td><?=$guardian_result->year_sem?></td>
																			<td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assesment_form/industry_assesment/'.$guardian_result->file)?>" target="_blank"><i class="mdi mdi-eye"></i></a></td>
																			<?php if($guardian_result->assessment_status == 0) {?>
																				<td>Pending</td>
																				<?php }else if($guardian_result->assessment_status == 1) {?>
																					<td>Approved</td>
																					<?php }else {?>
																						<td>Rejected</td>
																					<?php }?>
																					<td><?=$guardian_result->rejection_remark?></td>
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
	$('#self_form').validate({
		rules: {
			year_sem: {
				required: true,
			},
			userfile: {
				required: true,
			},
			
		},
		messages: {
			year_sem: {
				required: "please select sem/year",
			},
			userfile: {
				required: "please select file to upload",
			},
			
		},
		
	});
	$('#teacher_form').validate({
		rules: {
			year_sem: {
				required: true,
			},
			userfile: {
				required: true,
			},
			
		},
		messages: {
			year_sem: {
				required: "please select sem/year",
			},
			userfile: {
				required: "please select file to upload",
			},
		},
	});

	$('#assignment_form').validate({
		rules: {
			year_sem: {
				required: true,
			},
			userfile: {
				required: true,
			},
			assignment_title: {
				required: true,
			},
		},
		messages: {
			year_sem: {
				required: "please select sem/year",
			},
			userfile: {
				required: " please select file to upload",
			},
			assignment_title: {
				required: "please enter assignment title",
			},
			
		},
	});


	$('#industry_form').validate({
		rules: {
			year_sem: {
				required: true,
			},
			userfile: {
				required: true,
			},
			// assignment_title: {
			// 	required: true,
			// },
			
		},
		messages: {
			year_sem: {
				required: "please select sem/year",
			},
			userfile: {
				required: " please select file to upload",
			},
			// assignment_title: {
			// 	required: "please enter assignment title",
			// },
			
		},
	});

	$('#guardian_form').validate({
		rules: {
			year_sem: {
				required: true,
			},
			userfile: {
				required: true,
			},
			// assignment_title: {
			// 	required: true,
			// },
			
		},
		messages: {
			year_sem: {
				required: "please select sem/year",
			},
			userfile: {
				required: " please select file to upload",
			},
			// assignment_title: {
			// 	required: "please enter assignment title",
			// },
			
		},
	});
	});
	$(document).ready(function() {
      $('.fileInput').change(function() {
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
        var fileName = $(this).val();

        if (!allowedExtensions.exec(fileName)) {
          alert('Please choose a file with a valid extension (jpg, jpeg, png, pdf).');
          $(this).val(''); // Clear the input field
        } else { 
        }
      });
    });
</script>
