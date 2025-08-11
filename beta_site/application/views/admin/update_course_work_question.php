<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Question </h4> 
                      <?php $test_data = json_decode($question->text_data);?>
                <form class="forms-sample" name="exam_form" id="exam_form" method="post" enctype="multipart/form-data">
					<div class="row">
			<!-- 			<div class="form-group col-lg-4">
							<label for="exampleInputUsername1">Course *</label>
							<select class="form-control js-example-basic-single course_relation" id="course" name="course" placeholder="Select Course">
								<option value="">Please Select Course</option>
								<?php if(!empty($course)){foreach($course as $course_result){?>
									<option value="<?=$course_result->id;?>" <?php if(!empty($question) && $question->course_id == $course_result->id){?>selected<?php }?>><?=$course_result->course_name;?></option>
								<?php }}?>
							</select>
							<input type="hidden" name="question_id" id="question_id" value="<?php if(!empty($question)){ echo $question->id; }?>">
						</div> -->
				<!-- 		<?php 
							if(!empty($question)){
								$stream = $this->Exam_model->get_selected_stream($question->course_id);
							}
						?> -->
			<!-- 			<div class="form-group col-lg-4">
							<label for="exampleInputUsername1">Stream *</label>
							<select class="form-control js-example-basic-single stream_relation" id="stream" name="stream" placeholder="Select Stream">
								<option value="">Please Select Stream</option>
								<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
									<option value="<?=$stream_result->stream;?>" <?php if(!empty($question) && $question->stream_id == $stream_result->stream){?>selected<?php }?>><?=$stream_result->stream_name;?></option>
								<?php }}?>
							</select>
						</div>  -->
					<!-- 	<?php 
							if(!empty($question)){
								$stream = $this->Exam_model->get_selected_subject($question->course_id,$question->stream_id);
							}
						
						?> -->
<!-- 
						<div class="form-group col-lg-4">
							<label for="exampleInputUsername1">Subject *</label>
							<select class="form-control js-example-basic-single" id="subject" name="subject"
							 value="<?php if(!empty($question)){ echo $question->question ; } ?>" placeholder="Select Subject">
								<option value="">Please Select Subject</option>
							</select>
						</div> -->
						<div class="form-group col-lg-12">
							<label for="exampleInputUsername1">Question *</label>
							<input type="text" class="form-control" value="<?php if(!empty($question)){ echo $test_data->options->question ; } ?>" id="question" name="question" placeholder="Enter Question">
						</div>
						<div class="form-group col-lg-3">
							<label for="exampleInputUsername1">Option 1st *</label>
							<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[0] ; } ?>" id="option_1" name="option_1" placeholder="Option 1st">
						</div>
						<div class="form-group col-lg-3">
							<label for="exampleInputUsername1">Option 2nd *</label>
							<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[1] ; } ?>" id="option_2" name="option_2" placeholder="Option 2nd">
						</div>
						<div class="form-group col-lg-3">
							<label for="exampleInputUsername1">Option 3rd *</label>
							<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[2] ; } ?>" id="option_3" name="option_3" placeholder="Option 3rd">
						</div>
						<div class="form-group col-lg-3">
							<label for="exampleInputUsername1">Option 4th *</label>
							<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[3] ; } ?>" id="option_4" name="option_4" placeholder="Option 4th">
						</div>
				<!-- 		<div class="form-group col-lg-3">
							<label for="exampleInputUsername1">Correct Answer *</label>
							<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->selected_ans ; } ?>" id="corrent_answer" name="corrent_answer" placeholder="Correct Answer">
						</div> -->
						<div class="form-group col-lg-3">
							<label for="exampleInputUsername1">Correct Answer *</label>
							<select class="form-control" id="corrent_answer" name="corrent_answer"
							  placeholder="Select Subject">
								<option value="" selected disabled >Please Correct Option</option>
								<option value="1" <?php if(!empty($question) && $test_data->options->selected_ans == 1){?>selected<?php }?> >1</option>
								<option value="2" <?php if(!empty($question) && $test_data->options->selected_ans == 2){?>selected<?php }?> >2</option>
								<option value="3" <?php if(!empty($question) && $test_data->options->selected_ans == 3){?>selected<?php }?> >3</option>
								<option value="4" <?php if(!empty($question) && $test_data->options->selected_ans == 4){?>selected<?php }?> >4</option>
							</select>
						</div>
					</div>
					<input type="hidden" name="question_id" id="question_id" value="<?=$this->uri->segment(2);?>">
            <button type="submit" id="save_btn" name="upload" value="Upload" class="btn btn-primary mr-2">Submit</button>
            
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
	$('#exam_form').validate({
		rules: {
			question: {
				required: true,
			},
			option_1: {
				required: true,
			},
			option_2: {
				required: true,
			},
			option_3: {
				required: true,
			},
			option_4: {
				required: true,
			},
			corrent_answer: {
				required: true,
			},
		},
		messages: {
			question: {
				required: "Please enter question",
			},
			option_1: {
				required: "Please enter option 1 ",
			},
			option_2: {
				required: "Please enter option 2",
			},
			option_3: {
				required: "Please enter option 3",
			},
			option_4: {
				required: "Please enter option 4",
			},
			corrent_answer: {
				required: "Please enter current_answer",
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


$('.course_relation').change(function(){
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Please Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.stream + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$('.stream_relation').change(function(){
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_stream_subject_ajax",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#subject").empty();
			$('#subject').append('<option value="">Please Select Subject</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#subject').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
			});
			$('#subject').trigger('change');	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
</script>
 