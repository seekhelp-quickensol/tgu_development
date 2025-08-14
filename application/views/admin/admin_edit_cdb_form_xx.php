<?php include('header.php')?>
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Caste Based Discrimination Form</h4>
                  <!-- <h6 class="card-title">Enrollment No. [<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->enrollment_number;}?>]</h6> -->
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <?php if($single_cbd_form->student_teacher == 'Student'){
                      $single_student_detail = $this->Admin_model->get_single_student_details($single_cbd_form);
                      // print_r($single_student_detail);exit;
                      if($single_student_detail == ""){
                        $single_student_detail = $this->Admin_model->get_single_seperate_student_details($single_cbd_form);
                        // print_r($single_student_detail);exit;
                      }
                    ?>
                      
                    <div class="row">
					            <div class="col-md-4">
					            <div div class="form-group">
                      <label for="">Student/Teacher/Non-Teaching Staff/Others *</label>
                      <select type="text" class="form-control" id="complainant" name="complainant" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->student_teacher;}?>"> 
						            <option value="Student" <?php if($single_cbd_form->student_teacher == 'Student'){?> selected <?php }?>>Student</option> 
						            <option value="Teacher" <?php if($single_cbd_form->student_teacher == 'Teacher'){?> selected <?php }?>>Teacher</option> 
						            <option value="Non-Teaching Staff" <?php if($single_cbd_form->student_teacher == 'Non-Teaching Staff'){?> selected<?php }?>>Non-Teaching Staff</option>
						            <option value="Others" <?php if($single_cbd_form->student_teacher == 'Others'){?> selected<?php }?>>Others</option>
                      </select>
                      </div>
					            </div>
                      <div class="col-md-4" id="enrollment_div" style=""> 
						          <div class="form-group"> 
							          <label>Enrollment Number </label> 
							          <input type="text" name="enrollment" id="enrollment" class="form-control" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->enrollment_number;}?>">
						          </div>
                      </div>
					            <div class="col-md-4">
					            <div class="form-group">
                        <label for="">First Name *</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->first_name;}?>">
                      </div>
					            </div>
					            <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Last Name *</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->last_name;}?>">
                      </div>
					            </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Session Year </label>
                        <input type="text" class="form-control" id="session_year" name="session_year" placeholder="" value="<?php if(!empty($single_student_detail)){ echo $single_student_detail->session_name;}?>">
                      </div>
					            </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Course Name </label>
                        <input type="text" class="form-control" id="course" name="course" placeholder="" value="<?php if(!empty($single_student_detail)){ echo $single_student_detail->course_name;}?>">
                      </div>
					            </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->address;}?>">
                      </div>
					            </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        <label for="">City </label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->city;}?>">
                      </div>
					            </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Pin Code</label>
                      <input type="text" class="form-control" id="pin_code" name="pin_code" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->pincode;}?>">
                    </div>
					          </div>
					          <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Email *</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->email;}?>">
					          </div>
					          </div>
					          <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Gender *</label>
                      <select type="text" class="form-control" id="gender" name="gender">
                        <option value="Male" <?php if($single_cbd_form->gender == 'Male'){?> selected <?php }?>>Male</option> 
						            <option value="Female" <?php if($single_cbd_form->gender == 'Female'){?> selected <?php }?>>Female</option> 
                    </select>
                    </div>
					          </div>
					          <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Phone or Mobile*</label>
                      <input type="text" class="form-control" id="contact" name="contact" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->mobile_number;}?>">
					          </div>
					          </div>
					
					          <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Complaint *</label>
                      <textarea class="form-control" id="complaint" name="complaint" placeholder=""><?php if(!empty($single_cbd_form)){ echo $single_cbd_form->complaint;}?></textarea>
                    </div>
					          </div>

                   <div class="col-md-4">
                    <div class="form-group">
                      <label>Upload New Files</label>

                      &nbsp; &nbsp; &nbsp;
                          <?php if (!empty($single_cbd_form->file)) {
                            $files = explode(',', $single_cbd_form->file);
                            $uploadedFiles = array();

                            foreach ($files as $file) {
                                if ($file !== "") {
                                    $original_name = $file;
                                    $fileUrl = $this->Digitalocean_model->get_photo('rti_reply/' . $original_name);
                                    $deleteUrl = base_url() . "delete_cbd_files?id=" . $single_cbd_form->id . "&name=" . base64_encode($original_name);
                                    
                                    $uploadedFiles[] = "<a class='btn btn-primary' href='$fileUrl' target='_blank'>View</a>";
                                }
                            }

                            echo implode(" ", $uploadedFiles);
                        } ?>



                      <input type="file" name="file[]" id="file" class="file-upload-default" value="" multiple="multiple">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
					              <input type="hidden" class="form-control" id="old_file" name="old_file" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->file;}?>">
					            </div>
					            </div>
								
								
                    <div class="col-md-4">
                    <div class="form-group">
                      <label>Upload New RTI Reply File</label>

                      &nbsp; &nbsp; &nbsp;
                          <?php if (!empty($single_cbd_form->rti_reply)) {
                            $files = explode(',', $single_cbd_form->rti_reply);
                            $uploadedFiles = array();

                            foreach ($files as $file) {
                                if ($file !== "") {
                                    $original_name = $file;
                                    $fileUrl = $this->Digitalocean_model->get_photo('rti_reply/' . $original_name);
                                    $deleteUrl = base_url() . "delete_cbd_files?id=" . $single_cbd_form->id . "&name=" . base64_encode($original_name);
                                    
                                    $uploadedFiles[] = "<a class='btn btn-primary' href='$fileUrl' target='_blank'>View</a>";
                                }
                            }

                            echo implode(" ", $uploadedFiles);
                        } ?>

                      <input type="file" name="upload_file[]" id="upload_file" class="file-upload-default" value="" multiple="multiple">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
					              <input type="hidden" class="form-control" id="old_userfile" name="old_userfile" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->rti_reply;}?>">
					            </div>
					            </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Courier/Speed Post Tracking *</label>
                        <input type="text" class="form-control" id="tracking_id" name="tracking_id" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->tracking_id;}?>">
					            </div>
					            </div>
                      <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Dispatch Date *</label>
                      <input type="date" class="form-control" id="dispatch_date" name="dispatch_date" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->dispatch_date;}?>">
					          </div>
					          </div>
                 </div>
                 <button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
                <?php } else {?>
                 <div class="row">
					        <div class="col-md-4">
					        <div class="form-group">
                      <label for="">Student/Teacher/Non-Teaching Staff/Others *</label>
                      <select type="text" class="form-control" id="complainant" name="complainant" > 
						            <option value="Student" <?php if($single_cbd_form->student_teacher == 'Student'){?> selected="selected" <?php }?>>Student</option> 
						            <option value="Teacher" <?php if($single_cbd_form->student_teacher == 'Teacher'){?> selected="selected" <?php }?>>Teacher</option> 
						            <option value="Non-Teaching Staff" <?php if($single_cbd_form->student_teacher == 'Non-Teaching Staff'){?> selected="selected"<?php }?>>Non-Teaching Staff</option>
						            <option value="Others" <?php if($single_cbd_form->student_teacher == 'Others'){?> selected="selected"<?php }?>>Others</option>
                      </select>
                    </div>
					        </div>
					        <div class="col-md-4">
					        <div class="form-group">
                      <label for="">First Name *</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->first_name;}?>">
                  </div>
					        </div>
					        <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Last Name *</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->last_name;}?>">
                    </div>
					        </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Address*</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->address;}?>">
                      </div>
					            </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        <label for="">City *</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->city;}?>">
                      </div>
					            </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Pin Code *</label>
                      <input type="text" class="form-control" id="pin_code" name="pin_code" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->pincode;}?>">
                    </div>
					          </div>
					          <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Email *</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->email;}?>">
					          </div>
					        </div>
					        <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Gender *</label>
                      <select type="text" class="form-control" id="gender" name="gender">
                        <option value="Male" <?php if($single_cbd_form->gender == 'Male'){?> selected="selected" <?php }?>>Male</option> 
						            <option value="Female" <?php if($single_cbd_form->gender == 'Female'){?> selected="selected" <?php }?>>Female</option> 
                    </select>
                    </div>
					        </div>
					        <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Phone or Mobile*</label>
                      <input type="text" class="form-control" id="contact" name="contact" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->mobile_number;}?>">
					          </div>
					        </div>
					        <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Complaint *</label>
                      <textarea class="form-control" id="complaint" name="complaint" placeholder=""><?php if(!empty($single_cbd_form)){ echo $single_cbd_form->complaint;}?></textarea>
                    </div>
					          </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Upload New File</label>

                      <!-- <?php if(!empty($single) && $single->file != ""){?>

                          <span style="float: right;">

                            <a href="<?=$this->Digitalocean_model->get_photo('rti_reply/'.$single->file)?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>

                          </span>

                        <?php }?> -->
                        <input type="file" name="file[]" id="file" class="file-upload-default" value="" multiple="multiple">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
					              <input type="hidden" class="form-control" id="old_file" name="old_file" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->file;}?>">
					            </div>
					            </div>
								
								
                    <div class="col-md-4">
                    <div class="form-group">
                      <label>Upload New RTI Reply File</label>
                      <input type="file" name="upload_file[]" id="upload_file" class="file-upload-default" value="" multiple="multiple">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
					              <input type="hidden" class="form-control" id="old_userfile" name="old_userfile" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->rti_reply;}?>">
					            </div>
					            </div>
                      <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Courier/Speed Post Tracking *</label>
                        <input type="text" class="form-control" id="tracking_id" name="tracking_id" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->tracking_id;}?>">
					            </div>
					            </div>
                      <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Dispatch Date *</label>
                      <input type="date" class="form-control" id="dispatch_date" name="dispatch_date" placeholder="" value="<?php if(!empty($single_cbd_form)){ echo $single_cbd_form->dispatch_date;}?>">
					          </div>
					          </div>
                 </div>
                 <button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
                <?php }?>
                </form>
              </div>
            </div>
          </div>
        </div>
<?php include('footer.php')?>

<script>
//     $("#enrollment_div").change(function(){
// 	if($(this).val() == "Student"){
// 		$("#enrollment").show();
// 	}else{
// 		$("#enrollment").hide(); 
// 	}
// });
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
			complainant: {
				required: true,
			},
			first_name: {
				required: true,
			}, 
			gender: {
				required: true,
			},
			contact: {
				required: true,
				number: true,
			},
			complaint: {
				required: true,
			},
      tracking_id:{
        required: true,
      },
      dispatch_date:{
        required: true,
      }, 
		},
		messages: {
			complainant: {
				required: "Please",
			},
			first_name: {
				required: "Please enter first name",
			}, 
			gender: {
				required: "Please enter gender",
			},
			contact: {
				required: "Please enter mobile number",
				number: "Please enter valid mobile number",
			},
			complaint: {
				required: "Please enter complaint",
			}, 
      tracking_id:{
        required: "Please enter tracking id",
      },
      dispatch_date:{
        required: "Please enter dispatch date",
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
</script>