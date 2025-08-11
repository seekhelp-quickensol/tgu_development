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
                    <h2 class="mb-3">Self Assessment Form</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
							<form class="forms-sample" name="exam_form" id="exam_form" method="post" enctype="multipart/form-data">

							<div class="col-md-12">

								<div class="row"> 

									<div class="col-md-3">

										<div class="form-group">

											<label>Student Name <span class="req">*</span></label>

											<input type="text" name="student_name" id="student_name" readonly class="form-control charector" placeholder="Student Full Name" value="<?php if(!empty($local_data)){ echo $local_data->student_name;}?>">

											<input type="hidden" name="hidden_id" id="hidden_id" class="form-control" value="<?= $hidden_id; ?>">

											<input type="hidden" name="student_id" id="student_id" class="form-control" value="<?= $student_id; ?>">
											<input type="hidden" name="year_sem" id="year_sem" class="form-control" value="<?= $year_sem; ?>">

                                        </div>

									</div>



									<div class="col-md-3">

										<div class="form-group">

											<label>Enrollment Number <span class="req">*</span></label>

											<input type="text" name="enroll_number" id="enroll_number" readonly class="form-control charector" placeholder="Enrollment Number" value="<?php if(!empty($local_data)){ echo $local_data->enrollment_number;}?>">

										</div>

									</div>



                                    <div class="col-md-3">

										<div class="form-group">

                                            <?php

                                                $study_mode = (!empty($local_data)) ? $local_data->study_mode : '';

                                            ?>

											<label>Mode of Study <span class="req">*</span></label>

                                            <select class="form-control" name="study_mode" id="study_mode">

                                                <option value="">Select Mode of Study</option>

                                                <option value="0" <?php echo ($study_mode == '0') ? 'selected' : ''; ?>>Assisted Self Study</option>

                                                <option value="1" <?php echo ($study_mode == '1') ? 'selected' : ''; ?>>Blended Learning</option>

                                                <option value="2" <?php echo ($study_mode == '2') ? 'selected' : ''; ?>>Conventional Classroom Learning</option>

                                            </select>

                                            <label for="study_mode" generated="true" class="error" style="display:none;">Please select study mode!</label>

                                        </div>

									</div>

                                    <div class="col-md-3">

										<div class="form-group">

											<label>Course & Stream <span class="req">*</span></label>

                                            <input type="text" name="course_stream" id="course_stream" readonly class="form-control charector" placeholder="Course & Stream" value="<?php if (!empty($local_data)) { echo $local_data->course_name . ' ' . '(' .$local_data->stream_name .')'; } ?>">

                                            <input type="hidden" name="course" id="course" readonly class="form-control charector" value="<?php if (!empty($local_data)) { echo $local_data->course_id; } ?>">

                                            <input type="hidden" name="stream" id="stream" readonly class="form-control charector" value="<?php if (!empty($local_data)) { echo $local_data->stream_id; } ?>">	

                                        </div>

									</div>

                                     

								</div>

							</div> 



							<div class="col-md-12"> 

								<div class="row"> 

                                    <div class="col-md-12">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <table class="table table-bordered" id="example">

                                                        <thead>

                                                            <tr>

                                                                <th>SUBJECT(S) NAME</th>

                                                                <th>NO. OF HOURS OF STUDY/RESEARCH</th>

                                                                <th>NO. OF HOURS OF APPLICATION OF SUBJECT KNOWLEDGE / SKILLS</th>

                                                                <th>GRADE YOUR KNOWLEDGE / SKILL (Between 1 to 10)</th>

                                                            </tr>

                                                        </thead>

                                                        <tbody>

                                                        <?php $i = 0; 

                                                          if(!empty($local_data) && !empty($student)){ 

                                                            foreach($student as $student_result){

                                                                // echo "<pre>";print_r($student_result);exit;

                                                        ?>

                                                         <tr id="removable_details_<?php echo $student_result->id;?>">

                                                                <input type="hidden" value="<?=$i;?>" name="indices[]">

                                                                <td>

                                                                    <input type="input" name="subject_name_<?=$i;?>[]" id="subject_name_<?=$i;?>" class="form-control" value="<?php if(!empty($student_result)){ echo $student_result->subject_name;}?>">

                                                                </td>

                                                                <td>

                                                                    <input type="input" name="no_of_hours_study_<?=$i;?>[]" id="no_of_hours_study_<?=$i;?>" class="form-control" value="<?php if(!empty($student_result)){ echo $student_result->no_of_hours_study;}?>">

                                                                </td>

                                                                <td>

                                                                    <input type="input" name="no_of_hours_subject_<?=$i;?>[]" id="no_of_hours_subject_<?=$i;?>" class="form-control" value="<?php if(!empty($student_result)){ echo $student_result->no_of_hours_subject;}?>">

                                                                </td>

                                                                <td>

                                                                    <input type="input" name="grade_<?=$i;?>[]" id="grade_<?=$i;?>" class="form-control" value="<?php if(!empty($student_result)){ echo $student_result->grade;}?>">

                                                                </td>

                                                                <td class="form-group col-lg-1 ">

                                                                    <span onclick="deleteRow(<?=$student_result->id;?>)" class="delete_area"><i class="fa fa-close" style="color:red;margin-top:35px;" aria-hidden="true"></i></span>

                                                                </td>

                                                            </tr>

                                                            <?php $i++; }}else{ ?>

                                                            <tr>

                                                                <input type="hidden" value="<?=$i;?>" name="indices[]">

                                                                <td>

                                                                    <input type="input" name="subject_name_<?=$i;?>[]" id="subject_name_<?=$i;?>" class="form-control" value="">

                                                                </td>

                                                                <td>

                                                                    <input type="input" name="no_of_hours_study_<?=$i;?>[]" id="no_of_hours_study_<?=$i;?>" class="form-control" value="">

                                                                </td>

                                                                <td>

                                                                    <input type="input" name="no_of_hours_subject_<?=$i;?>[]" id="no_of_hours_subject_<?=$i;?>" class="form-control" value="">

                                                                </td>

                                                                <td>

                                                                    <input type="input" name="grade_<?=$i;?>[]" id="grade_<?=$i;?>" class="form-control" value="">

                                                                </td>

                                                            </tr>

                                                            <?php $i++; } ?>

                                                        </tbody>

                                                        <tbody id="add_more_div"></tbody>

                                                    </table>

                                                    <div class="row">

                                                        <div class="form-group col-lg-12">

                                                            <a id="add_more_button" class="btn btn-primary mr-2" style="margin-top:30px;color:white;" onclick="createAddMoreFields()">Add More</a>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-md-12">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label>DECLARATION BY THE STUDENT:</label>

                                                    <label>I hereby declare that the above information provided by me is true to my knowledge and i feel very happy and satisfied in continuing my further studies in the University</label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-md-12"> 

								        <div class="row"> 

                                            <div class="col-md-3">

										        <div class="form-group">

                                                    <label>Signature of Student <?php if($local_data->signature !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/signature/'.$local_data->signature)?>">View</a><?php }?></label>

                                                    <input type="file" class="form-control" name="signature" id="signature">

											        <input type="hidden" class="form-control" name="old_signature" id="old_signature" value="<?=$local_data->signature?>">

                                                </div>

                                            </div>

                                        </div>

                                    </div>



									<div class="col-md-12"> 

										<div class="row">

											<div class="col-md-12 edu">

												<div class="form-group">

													<label></label>

													<button type="submit" class="btn btn-primary" name="register" id="register" value="Register">Submit</button>

													<div class="pull-right"></div>

												</div>

											</div>	

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
