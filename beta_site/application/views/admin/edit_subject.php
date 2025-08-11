<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title">Subject Setting <a href="<?=base_url();?>list_subject?id=&course=<?=$_GET['course']?>&stream=<?=$_GET['stream']?>&course_mode=<?=$_GET['course_mode']?>&year_sem=<?=$_GET['year_sem']?>" class="btn btn-primary mr-2 float-right">View List</a></h4><p class="card-description">
                    Please enter Subject details
                  </p>
                  <form class="forms-sample" name="relation_form" id="relation_form" method="post" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Course Name *</label>
							  <select class="form-control js-example-basic-single exist_fees course_list" id="course" name="course">
								<option value="">Select Course</option>
								<?php if(!empty($course)){ foreach($course as $course_result){?>
								<option value="<?=$course_result->course?>" <?php if(!empty($single) && $single->course == $course_result->course){?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
								<?php }}?>
							  </select>
							  <div class="error" id="relation_error"></div>
							</div>
						</div>
						<?php 
							$stream = array();
							if(!empty($single)){
								$stream = $this->Course_model->get_selected_stream($single->course);
							}
						?>
						<div class="col-md-6">
						<div class="form-group">
						  <label for="exampleInputUsername1">Stream Name *</label>
						  <select class="form-control js-example-basic-single exist_fees course_list" id="stream" name="stream">
							<option value="">Select Stream</option>
							<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
							<option value="<?=$stream_result->id?>@@@<?=$stream_result->stream?>" <?php if(!empty($single) && $single->stream == $stream_result->stream){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
							<?php }}?>
						  </select>
						</div>
					</div>
					</div>
					<?php 
						$course_mode = array();
						if(!empty($single)){
							$course_mode = $this->Course_model->get_selected_course_mode($single->course,$single->stream);
						}
					?>
					 <div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Course Mode *</label>
							  <select class="form-control js-example-basic-single" id="course_mode" name="course_mode">
								<option value="">Select Mode</option>
								<?php if(!empty($course_mode)){ 
									if($course_mode->course_mode=="3"){
								?>
								<option value="1" <?php if(!empty($single) && $single->mode == "1"){?>selected="selected"<?php }?>>Year</option>
								<option value="2" <?php if(!empty($single) && $single->mode == "2"){?>selected="selected"<?php }?>>Semester</option>
								<?php }else if($course_mode->course_mode=="2"){?>
								<option value="2" <?php if(!empty($single) && $single->mode == "2"){?>selected="selected"<?php }?>>Semester</option>
								<?php }else if($course_mode->course_mode=="1"){?>
								<option value="1" <?php if(!empty($single) && $single->mode == "1"){?>selected="selected"<?php }?>>Year</option>
								<?php }}?>
							  </select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Year/Sem *</label>
							  <select class="form-control js-example-basic-single" id="year_sem" name="year_sem">
								<option value="">Select</option>
								<?php for($y=1;$y<=12;$y++){?>
								<option value="<?=$y?>" <?php if(!empty($single) && $single->year_sem == $y){?>selected="selected"<?php }?>><?=$y?></option>
								<?php }?>
							  </select>
							</div>
						</div>
					</div>
					
					 <div class="row">
						<div class="col-md-12">
							 <table class="resultTable">
								<tr><td class="heading">Subject Code</td>
									<td  class="heading">Subject Name</td>
									<td  class="heading">Subject Type</td>
									<td  class="heading">Internal Marks</td>
									<td  class="heading">External Marks</td>
									<td  class="heading">Credits</td>
								</tr>   
									<tr><td><input type="text" name="txtSubjectCode" id="txtSubjectCode1" class="form-control" maxlength="20" value="<?php if(!empty($single)){ echo $single->subject_code;}?>"/></td>
										<td><input type="text" name="txtSubjectName" id="txtSubjectName1" class="form-control" maxlength="254" value="<?php if(!empty($single)){ echo $single->subject_name;}?>"/></td>
										<td>
											<select name="comboType" id="comboType1" class="form-control">
												<option value="0" <?php if(!empty($single) && $single->subject_type == "0"){?>selected="selected"<?php }?>>Theory</option>
												<option value="1" <?php if(!empty($single) && $single->subject_type == "1"){?>selected="selected"<?php }?>>Practical</option>                            
											</select>
										</td>                    
										<td><input type="text" name="txtIMM" id="txtIMM1" class="form-control" maxlength="4" onkeypress="return isNumber(event)" value="<?php if(!empty($single)){ echo $single->internal_marks;}?>"/></td>
										<td><input type="text" name="txtEMM" id="txtEMM1" class="form-control" maxlength="4" onkeypress="return isNumber(event)" value="<?php if(!empty($single)){ echo $single->external_mark;}?>"/></td>
										<td><input type="text" name="txtCredit" id="txtCredit1" class="form-control" maxlength="2" onkeypress="return isNumber(event)" value="<?php if(!empty($single)){ echo $single->credit;}?>" /></td>
									</tr>
							</table>
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
	$('#relation_form').validate({
		rules: {
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			course_mode: {
				required: true,
			},
			year_sem: {
				required: true,
			},
		},
		messages: {
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
			course_mode: {
				required: "Please select course mode",
			},
			year_sem: {
				required: "Please select year/sem",
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
 