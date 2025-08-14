<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Staff Faculty</h4>
                  <p class="card-description">
                    Please enter faculty details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Fisrt Name *</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php if(!empty($single)){ echo $single->first_name;}?>">
                    </div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Last Name *</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php if(!empty($single)){ echo $single->last_name;}?>">
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email *</label>
                      <input type="text" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email" value="<?php if(!empty($single)){ echo $single->email;}?>">
					  <div class="error" id="email_error"></div>
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Date of Birth *</label>
                      <input type="text" class="form-control datepicker" id="dob" name="dob" value="<?php if(!empty($single)){ echo $single->date_of_birth;}?>" Placeholder="Date of Birth" autocomplete="off">
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact Number *</label>
                      <input type="text" class="form-control" id="mobile_number" minlength="10" maxlength="10" name="mobile_number" autocomplete="off" placeholder="Mobile Number" value="<?php if(!empty($single)){ echo $single->mobile_number;}?>">
					  <div class="error" id="contact_number_error"></div>
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Join Date *</label>
                      <input type="text" class="form-control datepicker" id="join_date" name="join_date" autocomplete="off" placeholder="Join Date" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->join_date));}?>">
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Exit Date</label>
                      <input type="text" class="form-control datepicker" id="exit_date" name="exit_date" autocomplete="off" placeholder="Exit Date" value="<?php if(!empty($single)){ echo $single->exit_date;}?>">
                    </div>
					</div>
					 
				 
					<div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password *</label>
                      <input type="text" class="form-control" id="password" name="password" autocomplete="off" placeholder="Password"  value="<?php if(!empty($single)){ echo $single->password;}?>">
                    </div>
					</div> 
					<div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address </label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php if(!empty($single)){ echo $single->address;}?>">
                    </div>
                    </div>
            <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Family Contact Number </label>
                      <input type="text" class="form-control" id="family_contact_number" name="family_contact_number" placeholder="Family Contact Number" value="<?php if(!empty($single)){ echo $single->family_contact_number;}?>">
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Adharcard Number </label>
                      <input type="text" class="form-control" id="adharcard_number" name="adharcard_number" placeholder="Adharcard Number" value="<?php if(!empty($single)){ echo $single->adharcard_number;}?>">
                    </div>
            </div>
           
              <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Upload Aadhar File </label>
                        <input type="file" name="userfile1" class="form-control" id="userfile1">
                        <input type="hidden" name="adhar_file" class="form-control-file" id="adhar_file" value="<?php if(!empty($single)){ echo $single->adhar_file; } ?>">
                       <?php if(!empty($single) && $single->adhar_file != ""){?>
                        <div class="view_btn">
                          <a  title='view' target='_blank' href="<?=$this->Digitalocean_model->get_photo('images/faculty_staff/document/'.$single->adhar_file)?>">View</a>
                          <a title='view'  href="<?php echo base_url(); ?>delete_faculty_document/<?php echo $single->id; ?>">Clear Document
                          </a>
                      </div> 
                        <?php }?>
                        
                      </div>
                      
              </div>
              <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Upload photo </label>
                        <input type="file" name="userfile" class="form-control" id="userfile">
                        <input type="hidden" name="photo" class="form-control-file" id="photo" value="<?php if(!empty($single)){ echo $single->photo; } ?>">
                        <?php if(!empty($single) && $single->photo != ""){?>
                        <div class="view_btn">
                          <a  title='view' target='_blank' href="<?=$this->Digitalocean_model->get_photo('images/faculty_staff/photo/'.$single->photo)?>">View</a>
                       <a title='view'  href="<?php echo base_url(); ?>delete_faculty_document_image/<?php echo $single->id; ?>">Clear Document
                          </a>
                      </div> 
                       <?php }?>  
                      </div>
              </div>
              <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Upload CV </label>
                        <input type="file" name="userfile2" class="form-control" id="userfile2">
                        <input type="hidden" name="cv_file" class="form-control-file" id="cv_file" value="<?php if(!empty($single)){ echo $single->cv_file; } ?>">
                        <?php if(!empty($single) && $single->cv_file != ""){?>
                        <div class="view_btn">
                          <a  title='view' target='_blank' href="<?=$this->Digitalocean_model->get_photo('images/faculty_staff/cv/'.$single->cv_file)?>">View</a>

                       <a title='view'  href="<?php echo base_url(); ?>delete_faculty_cv_document/<?php echo $single->id; ?>">Clear Document
                        </a>
                      </div> 
                       <?php }?>  
                      </div>
              </div>
              <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Upload Eligibility Document </label>
                        <input type="file" name="userfile3" class="form-control" id="userfile3">
                        <input type="hidden" name="eligibility_document" class="form-control-file" id="eligibility_document" value="<?php if(!empty($single)){ echo $single->eligibility_document; } ?>">
                        <?php if(!empty($single) && $single->eligibility_document != ""){?>
                        <div class="view_btn">
                          <a  title='view' target='_blank' href="<?=$this->Digitalocean_model->get_photo('images/faculty_staff/ed/'.$single->eligibility_document)?>">View</a>

                       <a title='view'  href="<?php echo base_url(); ?>delete_faculty_eligible_document/<?php echo $single->id; ?>">Clear Document
                          </a>
                      </div> 
                       <?php }?>  
                      </div>
              </div>
					<div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">User Type *</label>
                      <select class="form-control" id="user_type" name="user_type" value="<?php if(!empty($single)){ echo $single->address;}?>">
						<option value="">User Type</option>
						<option value="0" <?php if(!empty($single) && $single->user_type == "0"){?>selected="selected"<?php }?>>Staff</option>
						<option value="1" <?php if(!empty($single) && $single->user_type == "1"){?>selected="selected"<?php }?>>Checker</option>
					  </select>
                    </div>
					 
					</div>
				
					    <?php $course = $this->Course_model->get_all_course_stream_relation(); ?>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Course *</label>
                      <select class="form-control js-example-basic-single" id="course" name="course">
						<option value="">Select</option>
						<?php if(!empty($course)){ foreach($course as $course_result){?>
						<option value="<?=$course_result->course?>" <?php if(!empty($single) && $single->course_id == $course_result->course){?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
						<?php }}?>
					  </select>
					</div>
					</div>


					<?php 
					$stream = array();
					if(!empty($single)){
						$stream = $this->Course_model->get_selected_stream($single->course_id);
					}
					?>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Stream *</label>
                      <select class="form-control js-example-basic-single" id="stream" name="stream">
						<option value="">Select Stream</option>
						<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
						<option value="<?=$stream_result->stream?>" <?php if(!empty($single) && $single->stream_id == $stream_result->stream){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
						<?php }}?>
					  </select>
					</div>
					</div>
						
					<?php 
					$subject = array();
					if(!empty($single)){
						$subject = $this->Exam_model->get_selected_course_subject($single->course_id,$single->stream_id);
					}
					?>

					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Subject</label>
                      <select class="form-control js-example-basic-single" id="subject" name="subject">
						<option value="">Select Subject</option>  
						<?php if(!empty($subject)){ foreach($subject as $subject_result){?>
						<option value="<?=$subject_result->id?>"  <?php if(!empty($single) && $single->subject_id ==$subject_result->id){?>selected="selected"<?php }?>><?=$subject_result->subject_code?> <?=$subject_result->subject_name?></option>  
						<?php }}?>
					  </select>
					</div>
					</div>
					
					<div class="col-md-6">
					 
					
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
				  <input type="hidden" class="form-control" id="email_val" name="email_val" value="0">
				  <input type="hidden" class="form-control" id="contact_number_val" name="contact_number_val" value="0">
					
                    <button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
                    </div>
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
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#single_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			first_name: {
				required: true,
			},
			last_name: {
				required: true,
			},
			email: {
				required: true,
				validate_email: true,
			},
			dob: {
				required: true,
			},
			mobile_number: {
				required: true,
				// minlength:true,
				// maxlength:true,
				number: true,
			},
			password: {
				required: true,
			},
			user_type: {
				required: true,
			},
			join_date: {
				required: true,
			},
			course: {
				required: true,
			},
			stream: {
				required: true,
			},  
			/* family_contact_number: {
          required: true,
          number:true,
          minlength:10,
          maxlength:12,
        },
         adharcard_number: {
          minlength:12,
          maxlength:12,
          required:true,
        },*/
         

        
		},
		messages: {
			first_name: {
				required: "Please enter first name",
			},
			last_name: {
				required: "Please enter last name",
			},
			email: {
				required: "Please enter email",
				validate_email: "Please eneter valid email",
			},
			dob: {
				required: "Please enter Date of Birth"
			},
			mobile_number: {
				required: "Please enter contact number",
				minlength:"Please enter 10 digit contact number",
				maxlength:"Please enter 10 digit contact number",

				number: "Please neter valid contact number",
			},
			password: {
				required: "Please enter password",
			},
			user_type: {
				required: "Please select user type",
			},
			join_date: {
				required: "Please select join date",
			},
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
		 
		/*	family_contact_number: {
        required: "Please enter family contact number",
        number: "Please enter valid contact number",
        minlength: "Please enter valid contact number",
        maxlength: "Please enter valid contact number",
      },
       adharcard_number: {
        required: "Please enter adharcard number",
      },*/
      
      
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


$('#course').on('change', function() {
	$('#course').valid();
});

$('#stream').on('change', function() {
	$('#stream').valid();
});
// $('#subject').on('change', function() {
// 	$('#subject').valid();
// });

$("#email").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_staff_faculty_email",
		data:{'email':$("#email").val(),'id':'<?=$id?>'},
		success: function(data){
			$("#email_val").val(data);
			check_avaliable();
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#mobile_number").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_staff_faculty_mobile_number",
		data:{'mobile_number':$("#mobile_number").val(),'id':'<?=$id?>'},
		success: function(data){
			$("#contact_number_val").val(data);
			check_avaliable();
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
function check_avaliable(){
	if($("#email_val").val() != "0"){
		$("#email_error").html("This email is already used, please try another.");
	}else{
		$("#email_error").html("");
	}
	if($("#contact_number_val").val() != "0"){
		$("#contact_number_error").html("This contact number is already used, please try another.");
	}else{
		$("#contact_number_error").html("");
	}
	if($("#contact_number_val").val() == "0" && $("#email_val").val() == "0"){
		$("#single_button").show();
	}else{
		$("#single_button").hide();
	}
}
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
  } );
  
  $("#course").change(function(){  
	
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
			// console.log(data)
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
	$('#subject').empty();
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_subject",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			// console.log(data)
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#subject').append('<option value="' + d.id + '">' + d.subject_code + ' ' + d.subject_name + '</option>');
			});
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});

 </script>
 