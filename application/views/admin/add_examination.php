<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Exam Setting</h4>
                  <p class="card-description">
                    Please enter Exam details
                  </p>
                  <form class="forms-sample" name="exam_form" id="exam_form" method="post" enctype="multipart/form-data">
				  <div class="row">
				  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Exam Name *</label>
                      <input type="text" class="form-control" id="exam_name" name="exam_name" placeholder="Exam Name" value="<?php if(!empty($single)){ echo $single->exam_name;}?>">
					  <div class="error" id="session_error"></div>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    </div>
                    </div>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Exam Date *</label>
                      <input type="text" class="form-control datepicker" autocomplete="off" id="exam_date" name="exam_date" placeholder="Exam Date" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->exam_date));}?>">
					</div>
					</div>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Total Exam Duration(In Minutes) *</label>
                      <input type="text" class="form-control" id="exam_duration" name="exam_duration" placeholder="Exam Duration" value="<?php if(!empty($single)){ echo $single->exam_duration;}?>">
					</div>
					</div>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Course *</label>
                      <select class="form-control" id="course" name="course">
						<option value="">Select</option>
						<?php if(!empty($course)){ foreach($course as $course_result){?>
						<option value="<?=$course_result->id?>" <?php if(!empty($single) && $single->course_id == $course_result->id){?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
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
                      <select class="form-control" id="stream" name="stream">
						<option value="">Select Stream</option>
						<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
						<option value="<?=$stream_result->stream?>" <?php if(!empty($single) && $single->stream_id == $stream_result->stream){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
						<?php }}?>
					  </select>
					</div>
					</div>
					<?php $duration = 0;
						if(!empty($single)){
							$duration = $this->Exam_model->get_course_stream_duration($single->course_id,$single->stream_id);
						}
					?>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Year/Sem*</label>
                      <select class="form-control" id="year_sem" name="year_sem">
						<option value="">Select Year/Sem</option>
						<?php for($y=1;$y<=$duration;$y++){?>
						<option value="<?=$y?>" <?php if(!empty($single) && $single->year_sem ==$y){?>selected="selected"<?php }?>><?=$y?></option>
						<?php }?>
					  </select>
					</div>
					</div>
					<?php 
					$subject = array();
					if(!empty($single)){
						$subject = $this->Exam_model->get_selected_course_subject($single->course_id,$single->stream_id,$single->year_sem);
					}
					?>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Subject*</label>
                      <select class="form-control" id="subject" name="subject">
						<option value="">Select Subject</option>  
						<?php if(!empty($subject)){ foreach($subject as $subject_result){?>
						<option value="<?=$subject_result->id?>"  <?php if(!empty($single) && $single->subject_id ==$subject_result->id){?>selected="selected"<?php }?>><?=$subject_result->subject_code?> <?=$subject_result->subject_name?></option>  
						<?php }}?>
					  </select>
					</div>
					</div>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Number of Question Display *</label>
                      <input type="number" class="form-control" id="number_of_question" name="number_of_question" placeholder="Number of Question Display" value="<?php if(!empty($single)){ echo $single->number_of_question;}?>">
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
	if($(this).val() == "23"){
		$("#payment_option").show();
	}else{
		$("#payment_option").hide();
	}
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
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
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#year_sem").html(data);
			$.ajax({
				type: "POST",
				url: "<?=base_url();?>web/Web_controller/get_course_stream_fees",
				data:{'session':$("#session").val(),'course':$("#course").val(),'stream':$("#stream").val(),'country':$("#country").val()},
				success: function(data){
					data =  data.split("@@@");
					$("#late_fees").val(data[1]);
					$("#admission_fees").val(data[0]);
					$("#total_admission_fees").val(parseInt(data[0])+parseInt(data[1]));
					late_cal();
				},
				 error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#year_sem").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_subject",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'year_sem':$("#year_sem").val()},
		success: function(data){
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

jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	
$('#exam_form').validate({
	rules: {
		exam_name: {
			required: true,
		},
		exam_date: {
			required: true,
		},
		exam_duration: {
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
		number_of_question: {
			required: true,
		}, 
	},
	messages: {
		exam_name: {
			required: "Please enter exam name",
		},
		exam_date: {
			required: "Please select exam date",
		},
		exam_duration: {
			required: "Please enter exam duration",
		}, 
		course: {
			required: "Please select course",
		}, 
		stream: {
			required: "Please select stream",
		}, 
		year_sem: {
			required: "Please select year/sem",
		}, 
		number_of_question: {
			required: "Please enter number of question",
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
</script>
 