<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Enroll Student</h4>
							<p class="card-description">Please enter student details</p>
							<form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Student Name *</label>
											<input type="text" class="form-control" id="student_name" name="student_name" placeholder="Student Name" value="<?php if(!empty($student)){ echo $student->student_name;}?>">
											
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
									</div>
									<div class="col-sm-3 uid_input">
										<div class="form-group">
											<label class="uid_label">Aadhaar Number <span class="req"></span></label>
											<input type="text" class="form-control identity_numer" name="identity_numer" id="identity_numer" placeholder="Enter Aadhaar Number" value="<?php if(!empty($student)){ echo $student->id_number;}?>">
										</div>
									</div>
									<div class="col-sm-3 uid_soft_input">
										<div class="form-group">
											<label class="uid_soft_label">Upload Aadhaar Softcopy <span class="req"></span></label>
											<input type="file" class="form-control identity_file" name="identity_file" id="identity_file" placeholder="Upload Aadhaar Softcopy" accept=".png,.pdf,.jpeg,.jpg">
											<input type="hidden" name="old_identity_file" value="<?php if(!empty($student)){ echo $student->identity_softcopy;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Session </label>
											<select class="form-control" id="session" name="session">
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
                                            <option value="">Select Year/Sem</option>
												<?php if(!empty($student)){for($y=1;$y<=10;$y++){?>
												<option value="<?=$y?>" <?php if(!empty($student) && $student->year_sem == $y){ ?>selected="selected"<?php }?>><?=$y?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Course Mode *</label>
											<select class="form-control js-example-basic-single" id="course_mode" name="course_mode">
												<option value="">Select Course Mode</option>
												<option value="1" <?php if(!empty($student) && $student->course_mode == 1){ ?>selected="selected"<?php }?>>Year</option>
												<option value="2" <?php if(!empty($student) && $student->course_mode == 2){ ?>selected="selected"<?php }?>>Sem</option>
											</select>
										</div>
									</div>
									<div class="col-md-3 credit_note_div" style="display:none">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Credit Note*</label>
											<input type="text" class="form-control" id="credit_note" name="credit_note" value="<?php if(!empty($student)){ echo $student->credit_note;}?>" placeholder="Enter only University Name">
										</div>
									</div> 
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Address </label>
											<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php if(!empty($student)){ echo $student->address;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Country </label>
											
											<select class="form-control js-example-basic-single" id="country" name="country" placeholder="Country">

												<option value="">Select Country</option>

												<?php if(!empty($country)){ foreach($country as $country_result){?>

												<option value="<?=$country_result->id?>" <?php if(!empty($student) && $student->country == $country_result->id){?>selected="selected"<?php }?>><?=$country_result->name?></option>

												<?php }}?>

											</select>
										</div>
									</div>


									<?php 

										$state = array();

										if(!empty($student)){

											$state = $this->Admin_model->get_selected_state($student->country);

										}

										$city = array();

										if(!empty($student)){

											$city = $this->Admin_model->get_selected_city($student->state);

										}

									?>


									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">State </label>
											<!-- <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php if(!empty($student)){ echo $student->state;}?>"> -->
											<select class="form-control js-example-basic-single" id="state" name="state" placeholder="State">

												<option value="">Select State</option>

												<?php if(!empty($state)){ foreach($state as $state_result){?>

												<option value="<?=$state_result->id?>" <?php if(!empty($student) && $student->state == $state_result->id){?>selected="selected"<?php }?>><?=$state_result->name?></option>

												<?php }}?>

											</select>
										</div>
									</div>



									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">City </label>
											
											<select class="form-control js-example-basic-single" id="city" name="city" placeholder="City">

												<option value="">Select City</option>

												<?php if(!empty($city)){ foreach($city as $city_result){?>

												<option value="<?=$city_result->id?>" <?php if(!empty($student) && $student->city == $city_result->id){?>selected="selected"<?php }?>><?=$city_result->name?></option>

												<?php }}?>

											</select>
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Pincode </label>
											<input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?php if(!empty($student)){ echo $student->pincode;}?>">
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Document *</label>
											<input type="file" class="form-control" id="document" name="document" accept=".pdf,.png,.jpg,.jpeg">
											<input type="hidden" name="old_document" value="<?php if(!empty($student)){ echo $student->document;}?>">
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Photo * <?php if(!empty($student) && $student->photo !=""){ ?><a href="<?=$this->Digitalocean_model->get_photo('images/separate_student/photo/'.$student->photo)?>" target="_blank"><i class="fa fa-eye"></i></a><?php }?></label>
											<input type="file" class="form-control" id="photo" name="photo" accept=".pdf,.png,.jpg,.jpeg">
											<input type="hidden" name="old_photo" value="<?php if(!empty($student)){ echo $student->photo;}?>">
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Signature * <?php if(!empty($student) && $student->signature !=""){ ?><a href="<?=$this->Digitalocean_model->get_photo('images/separate_student/signature/'.$student->signature)?>" target="_blank"><i class="fa fa-eye"></i></a><?php }?></label>
											<input type="file" class="form-control" id="signature" name="signature" accept=".pdf,.png,.jpg,.jpeg">
											<input type="hidden" name="old_signature" value="<?php if(!empty($student)){ echo $student->signature;}?>">
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Center *</label>
											<select class="form-control js-example-basic-single" id="center_id" name="center_id">
												<?php foreach($centers as $center): ?>
													<option value="<?=$center->id;?>"

                                                       	<?php if(!empty($student)){if($student->center_id == $center->id){echo "selected";}}?>
														><?=$center->center_name;?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Registration Date*</label>
											<input type="text" class="form-control datepicker" id="date_of_registration" name="date_of_registration" placeholder="Date of Registration" value="<?php if(!empty($student)){ echo date("d-m-Y",strtotime($student->date_of_registration));}?>">
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">fees *</label>
											<input type="number" class="form-control" id="fees" name="fees" value="<?php if(!empty($student)){ echo $student->student_fees;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<label for="exampleInputConfirmPassword1">Employee Type *</label>
										<select class="form-control" name="employement_type" id="employement_type">
											<option value="">Select Employment Type</option> 
											<option value="Government Employee" <?php if(!empty($student) && $student->employement_type == "Government Employee"){?>selected="selected"<?php }?>>Government Employee</option> 
											<option value="Private Sector Employee"  <?php if(!empty($student) && $student->employement_type == "Private Sector Employee"){?>selected="selected"<?php }?>>Private Sector Employee</option> 
											<option value="Not Working"  <?php if(!empty($student) && $student->employement_type == "Not Working"){?>selected="selected"<?php }?>>Not Working</option> 
										</select>
									</div>		
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Remark</label>
											<input type="text" class="form-control" id="remark" name="remark" value="<?php if(!empty($student)){ echo $student->remark;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Admission Status</label>
											<select class="form-control" id="admission_status" name="admission_status">
												<option value="1" <?php if(!empty($student) && $student->admission_status == "1"){?>selected="selected"<?php }?>>Active</option>
												<option value="2" <?php if(!empty($student) && $student->admission_status == "2"){?>selected="selected"<?php }?>>Cancel</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Religion <span class="req">*</span></label>
											<select name="religion" id="religion" class="form-control charector" maxlength="100" placeholder="Religion">
												<option value="">Select Religion</option>
												<option value="Hindu" <?php if(!empty($student) && $student->religion == "Hindu"){ ?>selected="selected"<?php }?>>Hindu</option>
												<option value="Sikh" <?php if(!empty($student) && $student->religion == "Sikh"){ ?>selected="selected"<?php }?>>Sikh</option>
												<option value="Christian" <?php if(!empty($student) && $student->religion == "Christian"){ ?>selected="selected"<?php }?>>Christian</option>
												<option value="Muslims" <?php if(!empty($student) && $student->religion == "Muslims"){ ?>selected="selected"<?php }?>>Muslim</option>
												<option value="Others" <?php if(!empty($student) && $student->religion == "Others"){ ?>selected="selected"<?php }?>>Others</option>
											</select>
										</div>
									</div>
									
									<div class="col-md-3" id="religin_specify_div" <?php if(empty($student)){ ?>style="display:none" <?php }else if($student->religion == "Others"){ ?> style="display:block" <?php }?>>
										<div class="form-group">
											<label>Specify Religion <span class="req">*</span></label>
											<input type="text" name="religin_specify" id="religin_specify" class="form-control charector" placeholder="Please specify your religion" value="<?php if(!empty($student)){ echo $student->religin_specify;}?>"> 
										</div>
									</div>
									
									
									<?php if(!empty($student)){
								$k=1;
								if(!empty($other_document)){
								foreach($other_document as $other_document_result){
								?>
								

									<div class="row container count_loop coating-append-gap" id="appending_div_<?=$k?>">
                        
                                    	<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1"> Document Name </label>
											<input type="text" class="form-control" Placeholder="Other Document" accept="" value="<?php if(!empty($other_document_result->document_name)){ echo $other_document_result->document_name;}?>" id="other_document_name" name="other_document_name[]" >
											</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1"> Document File  </label><?php if(!empty($other_document_result->document_file)){?><a target="blank" href="<?=base_url();?>images/separate_student/<?=$other_document_result->document_file;?>"><i class="fa fa-eye" aria-hidden="true"></i></a><?php } ?>
											<input type="file" class="form-control" accept=".pdf,.png,.jpg,.jpeg" id="other_document_file" name="other_document_file[]" value="<?php if(!empty($other_document_result->document_file)){ echo $other_document_result->document_file;}?>" >
											<input type="hidden" name="old_document_other[]" value="<?php if(!empty($other_document_result->document_file)){ echo $other_document_result->document_file;}?>">
										</div>
									</div>
									<div class="col-md-4">
									<div class="form-group  <?php if($this->uri->segment(3)){?>display-hide<?php }?> col-lg-12 dlt-apnd text-dlt-left"> <span class="fa fa-trash remove_margin" id="appending_div<?=$k?>"   onclick="minus(<?=$k?>)"></span></div>
									</div>
									</div>
									
                                
									<?php $i++;  } } }else{?>
										<div class="row container count_loop coating-append-gap" id="appending_div_1">
                        
                                    	<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1"> Document Name </label>
											<input type="text" class="form-control" Placeholder="Other Document" accept="" id="other_document_name" name="other_document_name[]" >
											</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1"> Document File  </label>
											<input type="file" class="form-control" accept=".pdf,.png,.jpg,.jpeg" id="other_document_file" name="other_document_file[]"  >
											<input type="hidden" name="old_document" value="<?php if(!empty($student)){ echo $student->other_document;}?>">
										</div>
									</div>
									</div>
										<?php }?>
									<div class="appending_div col-md-12 "></div>   
                         
                            <?php if($this->uri->segment(3) != ''){}else{?>
								<div class="col-md-12 p-2">
									<div class="col-md-1">
									<!-- <span id="add" class="fa fa-plus add">Add</span> -->
									<span id="add_order" class="<?php if($this->uri->segment(3)){?>display-hide<?php }?> btn btn-primary p-2 mr-2"> Add More </span>
								</div>
								</div>

                            <?php }?>

                          
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
<?php if(!empty($other_document)){?>
<input type="hidden" id="initiate" value="<?=count($other_document)+1?>">
        <?php }else{
            ?>
            <input type="hidden" id="initiate" value="2">
            <?php 
        }?>
 <script>


$(".hide_delete").hide();
	 var i= $("#initiate").val();
    $("#add_order").click(function(){       	
		var field ='<div class="row" id="appending_div_'+i+'"> <div class="row container count_loop coating-append-gap"> <div class="col-md-4"><div class="form-group"><label for="exampleInputConfirmPassword1"> Document Name </label><input type="text" class="form-control" Placeholder="Other Document" accept="" id="other_document_name" name="other_document_name[]" multiple="multiple"></div>	</div><div class="col-md-4"><div class="form-group"><label for="exampleInputConfirmPassword1"> Document File  </label><input type="file" class="form-control" accept="" id="other_document_file" name="other_document_file[]" multiple="multiple"><input type="hidden" name="old_document" value=""></div></div>  <div class="col-lg-1 dlt-apend "><span class="fa fa-trash remove_margin" id="appending_div"   onclick="minus('+i+')"></span></div></div> </div>';
			 $(".appending_div").append(field);
             $(".hide_delete").show();
				i++;

    });

	function minus(obj) {
        
        if (confirm('Do you really want to delete these records?')) { 
        var i  = $('.count_loop').length;       
           
        if(i>1){
            
            $('#appending_div_'+obj).remove();
            $('#appending_div'+obj).remove();

            $(".alert-delete").show();
            $(".alert-delete").text('Success ✅ Record Deleted Successfully.');
            $(".alert-delete").fadeTo(5000, 500).slideUp(500, function(){
        $(".alert-delete").slideUp(300);
    }); 
            $('.ratexqty').each(function() {
               
        if (!isNaN(this.value) && this.value.length != 0) {
            total += parseFloat(this.value);        
          }
          
        });
        

        } }{}
    }

 $("#year_sem").change(function(){
	 if($(this).val() >=2){
		 $(".credit_note_div").show();
	 }else{ 
		 $(".credit_note_div").hide();
	 }
 });
$("#course").change(function(){  
	if($(this).val() == "23"){
		$("#study_mode").append('<option value="3">Part-Time</option>');
	}else{
		$("#study_mode option[value='3']").remove();
	}
	//console.log($("#course").val());
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
			//console.log(data)
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
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration_separate",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#year_sem").html(data);
			
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
 $(document).ready(function () {
	
	jQuery.validator.addMethod("student_name", function(value, element) {
		if (/^[a-zA-Z\s]*$/.test(value)) {
			return true;
		} else {
			return false;
		}
	}, "Please enter only alphabets");

	jQuery.validator.addMethod("validate_aadhar", function(value, element) {
		return /^\d{12}$/.test(value) || value.trim() === ''; 
	}, "Please enter a valid aadhaar number");

	$.validator.addMethod("positiveNumber", function(value, element) {
		return Number(value) > 0;
	}, "Please enter a positive amount");

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
			student_name: {
				required: true,
				student_name:true,
			},
			father_name: {
				required: true,
				student_name:true,
			},
			gender: {
				required: true,
			},
			mother_name: {
				required: true,
				student_name:true,
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
				// number: true,
				// minlength: 10,
				maxlength: 10,
			},
			session_name: {
				required: true,
			},
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			year_sem: {
				required: true,
			}, 
			course_mode: {
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
				number:true,
				maxlength:6,
				minlength:6,
			},
			identity_numer: {
				// required: true,
				validate_aadhar:true,
			},
			fees:{
				required:true,
				number:true,
				// positiveNumber:true,

			},
			credit_note:{
				required:true, 
			},
			religion: {
				required:true,
				noHTMLtags:true
			},
			religin_specify: {
				required:true,
				noHTMLtags:true
			},
			<?php 
			// if(empty($student)):
			 ?>
			document:{
				required:true,
			},
			// identity_file: {
			// 	required: true,
			// },
			<?php
		//  endif;
		  ?>
			signature:{
				required:true,
			},
			photo:{
				required:true,
			},
			date_of_registration:{
				required:true,
			},
			<?php
			//  if(empty($student)){
				?>
			employement_type:{
				required:true,
			},
			<?php
		//  } 
		 ?>
		},
		messages: {
			student_name: {
				required: "Please enter student name",
				student_name:"Please enter student name in alphabets",
			},
			father_name: {
				required: "Please enter father name",
				student_name:"Please enter father name in alphabets",
			},
			mother_name: {
				required: "Please enter mother name",
				student_name:"Please enter mother name in alphabets",
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
				// number: "Please enter valid mobile number",
				// minlength: "Please enter 10 digit mobile number",
				maxlength: "Please enter 10 digit mobile number",
			},
			session_name: {
				required: "Please enter session name",
			},
			course: {
				required: "Please enter course name",
			},
			stream: {
				required: "Please enter stream name",
			},
			year_sem: {
				required: "Please enter year/sem",
			},
			course_mode: {
				required: "Please enter course mode",
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
				number:"Please enter valid pincode",
				maxlength:"Please enter 6 digit pincode",
				minlength:"Please enter 6 digit pincode",
			},
			document:{
				required: "Please select a document",
			},
			identity_numer:{
				// required: "Please enter aadhaar number",
				validate_aadhar:"Please enter a valid aadhaar number",
			},
			identity_file:{
				required: "Please select aadhaar softcopy",
			},
			fees:{ 
				required:"Please enter student fees",
				number:"not a valid fees",
				// positiveNumber:"Please enter positive amount",
			},
			credit_note:{ 
				required:"Please enter credit note", 

			},
			religion: {
				required:"Please select religion",
				noHTMLtags:"HTML tags not allowed",
			},
			religin_specify: {
				required:"Please specify your religion",
				noHTMLtags:"HTML tags not allowed",
			},
			photo:{
				required:"Please select photo",
			},
			signature:{
				required:"Please select signature",
			},
			date_of_registration:{
				required:"Please select registration date",
			},
			<?php
			//  if(empty($student)){
				?>
			employement_type:{
				required:"Please select employement type",
			},
			<?php 
			// }
			 ?>
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
		maxDate: "18Y",
		minDate: "-80Y",
		yearRange: "-100:-0"
	});
});
 $("#religion").change(function(){
	if($("#religion").val() == "Others"){
		$("#religin_specify_div").show(); 
	}else{
		$("#religin_specify_div").hide();
	}
});

$('#course').on('change', function() {
    $('#course').valid();
});
$('#stream').on('change', function() {
    $('#stream').valid();
});
$('#year_sem').on('change', function() {
    $('#year_sem').valid();
});
$('#course_mode').on('change', function() {
    $('#course_mode').valid();
});
$('#country').on('change', function() {
    $('#country').valid();
});
$('#state').on('change', function() {
    $('#state').valid();
});
$('#city').on('change', function() {
    $('#city').valid();
});


	$("#country").change(function(){  

		$.ajax({

			type: "POST",

			url: "<?=base_url();?>admin/Ajax_controller/get_state_ajax",

			data:{'country':$("#country").val()},

			success: function(data){
				// console.log(data);

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


$(document).ready(function() {
      $('#identity_file').on('change', function() {
          var fileName = $(this).val();
          var extension = fileName.substring(fileName.lastIndexOf('.') + 1).toLowerCase();
          //alert(fileName);
          var allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
          if ($.inArray(extension, allowedExtensions) === -1) {
              alert('Only .png, .jpg, .jpeg, .pdf files are allowed.');
              // Clear the file input field
              $(this).val('');
          }
      });
  });

  $(document).ready(function() {
      $('#document').on('change', function() {
          var fileName = $(this).val();
          var extension = fileName.substring(fileName.lastIndexOf('.') + 1).toLowerCase();
          //alert(fileName);
          var allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
          if ($.inArray(extension, allowedExtensions) === -1) {
              alert('Only .png, .jpg, .jpeg, .pdf files are allowed.');
              // Clear the file input field
              $(this).val('');
          }
      });
  });

  $(document).ready(function() {
      $('#photo').on('change', function() {
          var fileName = $(this).val();
          var extension = fileName.substring(fileName.lastIndexOf('.') + 1).toLowerCase();
          //alert(fileName);
          var allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
          if ($.inArray(extension, allowedExtensions) === -1) {
              alert('Only .png, .jpg, .jpeg, .pdf files are allowed.');
              // Clear the file input field
              $(this).val('');
          }
      });
  });


  $(document).ready(function() {
      $('#other_document_file').on('change', function() {
          var fileName = $(this).val();
          var extension = fileName.substring(fileName.lastIndexOf('.') + 1).toLowerCase();
          //alert(fileName);
          var allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf'];
          if ($.inArray(extension, allowedExtensions) === -1) {
              alert('Only .png, .jpg, .jpeg, .pdf files are allowed.');
              // Clear the file input field
              $(this).val('');
          }
      });
  });




</script>
 