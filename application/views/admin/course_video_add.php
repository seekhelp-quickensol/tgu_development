<?php include('faculty_header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">course video Setting </h4>
                  <p class="card-description">
                    Please enter required details
                  </p>
				  
					<form class="forms-sample" name="selection_form" id="selection_form" method="POST">
						<?php if(!empty($data)): ?>
							<input type="hidden" name="id" value="<?=$data->id; ?>">
						<?php endif; ?>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Course *</label>
									<select class="form-control" id="course" name="course"> 
										<option value="">Select</option>
										<?php if(!empty($course)){ foreach($course as $course_result){?>
										<option value="<?=$course_result->id?>"><?=$course_result->course_name?></option>
										<?php }}?> 
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Stream *</label>
									<select class="form-control" id="stream" name="stream"> 
										<option value="">Select</option>
										 
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Year/Sem *</label>
									<select class="form-control" id="year_sem" name="year_sem"> 
											<option value="">Select</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Subject *</label>
									<select class="form-control" id="subject" name="subject"> 
										<option value="">Select</option>
										 
									</select>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Video Url *</label>
									<input type="url" class="form-control" id="video_url" name="video_url">

								</div>
							</div>
						</div>
						<div class="row"> 
							<div class="col-md-3">
								<div class="form-group">
									<button type="submit" id="save_btn" class="btn btn-primary mr-2">Save</button> 
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
        </div>
      
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
<script>

 $("#upload_type").change(function(){ 
 if($(this).val() == "Form"){
	$(".upload_div").hide(); 
	$(".form_div").show(); 
 }else{  
	$(".form_div").hide(); 
	$(".upload_div").show();
 }
 });

$("#course").change(function(){   
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
			});
			<?php if(!empty($data)):?>
			document.getElementById("stream").value = "<?= $data->stream; ?>";
			<?php endif; ?>
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#stream").change(function(){   
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}); 

$("#year_sem").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_subject",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'year_sem':$("#year_sem").val()},
		success: function(data){
			$("#subject").empty();
			$('#subject').append('<option value="">Select</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#subject').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
			});
			<?php if(!empty($data)):?>
			document.getElementById("subject").value = "<?= $data->subject; ?>";
			<?php endif; ?>
			$('#subject').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	
$('#selection_form').validate({
	rules: {
		course: {
			required: true,
		},
		stream: {
			required: true,
		},
		year_sem: {
			required: true,
		},
		subject: {
			required: true,
		},
		video_url:{
			required:true,
		}
	},
	messages: {
		course: {
			required: "Please select course",
		},
		stream: {
			required: "Please select stream",
		},
		year_sem: {
			required: "Please select year/sem",
		},
		subject: {
			required: "Please select subject",
		},
		video_url:{
			required:"Please enter a valid video url",
		}
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

//this code will run in time of edit  
	
 $(document).ready(function(){
 	<?php if(!empty($data)):?>
 		document.getElementById("course").value = "<?= $data->course; ?>";
		$("#course").trigger("change");
	
		document.getElementById("video_url").value = "<?= $data->video_url; ?>";
	<?php endif; ?>
 });
</script>
