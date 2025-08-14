<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title">Job Application<p class="card-description">
                    Please enter job details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    <div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Name <span class="req">*</span></label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php if(!empty($single)){ echo $single->name;}?>">
							</div>
						</div> 
						<div class="col-md-3">
							<div class="form-group">
								<label>Mobile Number <span class="req">*</span></label>
								<input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile Number" value="<?php if(!empty($single)){ echo $single->mobile_number;}?>">
							</div>
						</div> 
						<div class="col-md-3">
							<div class="form-group">
								<label>Email <span class="req">*</span></label>
								<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php if(!empty($single)){ echo $single->email;}?>">
							</div>
						</div> 
						<div class="col-md-3">
							<div class="form-group">
								<label>Position <span class="req">*</span></label>
								<input type="text" name="position" id="position" class="form-control" placeholder="Position" value="<?php if(!empty($single)){ echo $single->position;}?>">
							</div>
						</div> 
						<div class="col-md-3">
							<div class="form-group">
								<label>Last Qualification <span class="req">*</span></label>
								<input type="text" name="last_qualification" id="last_qualification" class="form-control" placeholder="Last Qualification" value="<?php if(!empty($single)){ echo $single->last_qualification;}?>">
							</div>
						</div> 
						<div class="col-md-3">
							<div class="form-group">
								<label>Work Experience <span class="req">*</span></label>
								<input type="text" name="work_experience" id="work_experience" class="form-control" placeholder="Work Experience" value="<?php if(!empty($single)){ echo $single->work_experience;}?>">
							</div>
						</div>  
						<div class="col-md-3">
							<div class="form-group">
								<label>Present Working <span class="req">*</span></label>
								<input type="text" name="present_working" id="present_working" class="form-control" placeholder="Present Working" readonly value="<?php if(!empty($single)){ echo $single->present_working;}?>">
							</div>
						</div> 
						
						<?php if (!empty($single) && $single->present_working === 'yes'){?>
							<div class="col-md-3" id="job_title">
								<div class="form-group">
									<label>Present Job Title <span class="req">*</span></label>
									<input class="form-control" type="text" name="present_job_title" id="present_job_title" autocomplete="off" placeholder="Enter Your Present Job Title" value="<?php if(!empty($single)){ echo $single->present_job_title;}?>">
								</div>
							</div>

							<div class="col-md-3" id="job_loc">
								<div class="form-group">
									<label>Present Job Location <span class="req">*</span></label>
									<input class="form-control" type="text" name="present_job_location" id="present_job_location" autocomplete="off" placeholder="Enter Your Present Job Location" value="<?php if(!empty($single)){ echo $single->present_job_location;}?>">
								</div>
							</div>
						<?php } ?>
							
							

						<div class="col-md-3">
							<div class="form-group">
								<label>Address <span class="req">*</span></label>
								<input type="text" name="full_address" id="full_address" class="form-control" placeholder="Full Address" value="<?php if(!empty($single)){ echo $single->full_address;}?>">
							</div>
						</div> 
						<div class="col-md-3">
							<div class="form-group">
								<label>State <span class="req">*</span></label>
								<input type="text" name="state" id="state" class="form-control" placeholder="State" value="<?php if(!empty($single)){ echo $single->state;}?>">
							</div>
						</div> 
						<div class="col-md-3">
							<div class="form-group">
								<label>CV <span class="req">*</span>
									<?php 
									if(!empty($single) && $single->userfile != ""){
										?>
										<a href="<?=$this->Digitalocean_model->get_photo('images/career/'.$single->userfile)?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>
									<?php
									}
									?>
								</label>
								<input type="file" name="userfile" id="userfile" class="form-control" placeholder="CV">
								<input type="hidden" name="old_file" id="old_file" class="form-control" value="<?php if(!empty($single)){ echo $single->userfile;}?>">
								
							</div>
						</div>  
					</div>

                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
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
			name: {
				required: true,
			},
			mobile_number: {
				required: true,
				number: true,
			},
			email: {
				required: true,
				email: true,
			},
			position :{
				required: true,
			},
			last_qualification:{
				required: true,
			},
			work_experience:{
				required: true,
			},
			present_working:{
				required: true,
			},
			full_address:{
				required: true,
			},
			state:{
				required: true,
			},
			<?php 
			if(!empty($single) && $single->userfile == ""){?>
                userfile:{
				required: true,
			},
          <?php }?>
			
		},
		messages: {
			name: {
				required: "Please enter name",
			},
			mobile_number: {
				required: "Please enter mobile number",
				number: "Please enter valid mobile number",
			},
			email: {
				required: "Please enter email",
				email: "Please enter valid email",
			}, 
			position :{
				required: "Please enter position",
			},
			last_qualification:{
				required: "Please enter last qualification",
			},
			work_experience:{
				required: "Please enter work experience",
			},
			present_working:{
				required: "Please enter present working (Yes/No)",
			},
			full_address:{
				required: "Please enter address",
			},
			state:{
				required: "Please enter state",
			},
			userfile:{
				required: "Please upload cv",
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
		},
		submitHandler: function(form) {
			if(checkSubject()==false){
				return false;
			}else{
				form.submit();
			}
		}
	});
});
$(".fees_add").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_course_stream_fees",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'session':$("#session").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "0"){
				$("#relation_error").html("");
				$("#save_btn").show();
			}else{
				$("#relation_error").html("This relation is already added");
				$("#save_btn").hide();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#course").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.id + '@@@' + d.stream + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$(".exist_fees").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_mode",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#course_mode").empty();
			$("#course_mode").html(data);
			$('#course_mode').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
function checkSubject(){
	var valid=true;

	if (document.getElementById("txtSubjectCode1").value.length==0 || document.getElementById("txtSubjectName1").value.length==0 || document.getElementById("txtIMM1").value.length==0 || document.getElementById("txtEMM1").value.length==0 || document.getElementById("txtCredit1").value.length==0)
	{
		alert ("Please fill all fields for subject 1");
		valid=false;
	}
	return valid;
	
}
</script>
 