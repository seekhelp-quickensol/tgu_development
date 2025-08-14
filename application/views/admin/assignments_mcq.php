<?php include('faculty_header.php');?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=TeX-MML-AM_CHTML' async></script>
<script type="text/x-mathjax-config">
MathJax.Hub.Config({
    messageStyle: "none",
    extensions: ["tex2jax.js"],
    jax: ["input/TeX", "output/PreviewHTML"],
	"HTML-CSS": { linebreaks: { automatic: true } },
	"SVG": { linebreaks: { automatic: true } },
    tex2jax: {
      inlineMath: [ ['$','$'], ["\\(","\\)"] ],
      displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
      processEscapes: true,
      skipTags: ["script","noscript","style","textarea"],
    }
});
</script>

    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">MCQ Assignments</h4>
                  <p class="card-description">
                    Please enter required details
                  </p>
				  <?php if(!isset($_GET['course'])){?>
					<form class="forms-sample" name="selection_form" id="selection_form" method="get" enctype="multipart/form-data">
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
						</div>
						<div class="row"> 
							<div class="col-md-3">
								<div class="form-group">
									<button type="submit" id="save_btn" class="btn btn-primary mr-2">Next</button> 
								</div>
							</div>
						</div>
					</form>		
					<?php }?>
					<?php if(isset($_GET['course'])){?>
					<form method="post" name="add_question" id="add_question" enctype="multipart/form-data">
						<div class="row"> 
							<div class="col-md-12">
								<a class="btn btn-primary" href="<?=base_url();?>view_mcq_list/<?=$_GET['course']?>/<?=$_GET['stream']?>/<?=$_GET['year_sem']?>/<?=$_GET['subject']?>">View List</a>
								<a class="btn btn-info float-right" href="<?=base_url();?>assignments_mcq">Start Over</a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="exampleInputUsername1">Question *</label>
									<select class="form-control" id="upload_type" name="upload_type"> 
										<option value="">Select</option>
										<option value="Form">Form</option>
										<option value="Upload">Upload</option>
									</select>
								</div>
							</div>
							<div class="form_div" style="display:none">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputUsername1">Question *</label>
											<textarea class="form-control" id="question" name="question" placeholder="Please enter question"><?php if(!empty($single_question)){ echo $single_question->question;}?></textarea>
											<input type="hidden" class="form-control" autocomplete="off" id="course" name="course" value="<?=$_GET['course']?>">
											<input type="hidden" class="form-control" autocomplete="off" id="stream" name="stream" value="<?=$_GET['stream']?>">
											<input type="hidden" class="form-control" autocomplete="off" id="year_sem" name="year_sem" value="<?=$_GET['year_sem']?>">
											<input type="hidden" class="form-control" autocomplete="off" id="subject" name="subject" value="<?=$_GET['subject']?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputUsername1">Option A *</label>
											<textarea class="form-control" id="option_a" name="option_a" placeholder="Option A"><?php if(!empty($single_question)){ echo $single_question->option_a;}?></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputUsername1">Option B *</label>
											<textarea class="form-control" id="option_b" name="option_b" placeholder="Option B"><?php if(!empty($single_question)){ echo $single_question->option_b;}?></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputUsername1">Option C *</label>
											<textarea class="form-control" id="option_c" name="option_c" placeholder="Option C"><?php if(!empty($single_question)){ echo $single_question->option_c;}?></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputUsername1">Option D *</label>
											<textarea class="form-control" id="option_d" name="option_d" placeholder="Option D"><?php if(!empty($single_question)){ echo $single_question->option_d;}?></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputUsername1">Correct Answer *</label>
											<select class="form-control" id="correct_answer" name="correct_answer">
												<option value="">Select Correct Answer</option>
												<option value="1" <?php if(!empty($single_question) && $single_question->correct_answer == "1"){ ?>selected="selected"<?php }?>>A</option>
												<option value="2" <?php if(!empty($single_question) && $single_question->correct_answer == "2"){ ?>selected="selected"<?php }?>>B</option>
												<option value="3" <?php if(!empty($single_question) && $single_question->correct_answer == "3"){ ?>selected="selected"<?php }?>>C</option>
												<option value="4" <?php if(!empty($single_question) && $single_question->correct_answer == "4"){ ?>selected="selected"<?php }?>>D</option>
											</select>
										</div>
									</div>
								</div>

							</div>
							<div class="row upload_div" style="display:none">
								<div class="col-md-12">
									<div class="form-group">
										<a href="<?php echo base_url('uploads/question/question_format.xlsx') ?>" class="btn btn-primary">Download Format</a>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="exampleInputUsername1">Upload *</label>
										<input type="file" class="form-control" id="userfile" name="userfile">
									</div>
								</div>
							</div>
							</div>
						
					 
						<button type="submit" id="save_btn" name="save_question" value="save_question" class="btn btn-primary mr-2">Submit</button> 
					</form>
					<?php }?>
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
<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    tex: {
      inlineMath: [ ['$','$'], ["\\(","\\)"] ],
      displayMath: [ ['$$','$$'], ["\\[","\\]"] ],
      processEscapes: true
    },
  });


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

$('#add_question').validate({
	rules: {
		question: {
			required: true,
		},
		option_a: {
			required: true,
		}, 
		option_b: {
			required: true,
		}, 
		option_c: {
			required: true,
		}, 
		option_d: {
			required: true,
		}, 
		correct_answer: {
			required: true,
		}, 
	},
	messages: {
		question: {
			required: "Please enter question",
		},
		option_a: {
			required: "Please enter option",
		}, 
		option_b: {
			required: "Please enter option",
		}, 
		option_c: {
			required: "Please enter option",
		}, 
		option_d: {
			required: "Please enter option",
		}, 
		correct_answer: {
			required: "Please select currect answer",
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
function matthy(obj) {
obj.value = eval(obj.value);
}
</script>

<script src="<?=base_url();?>css/ckeditor/ckeditor.js"></script>
<script type="text/javascript">

CKEDITOR.replace( 'question', {
	extraPlugins:'mathjax,image',  
	mathJaxLib : 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=TeX-MML-AM_CHTML',
	filebrowserUploadUrl: 'ck_upload.php',
    filebrowserUploadMethod: 'form',
	
});
CKEDITOR.replace( 'option_a', { 
	extraPlugins:'mathjax', 
	mathJaxLib : 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=TeX-MML-AM_CHTML'		
}); 
CKEDITOR.replace( 'option_b', { 
	extraPlugins:'mathjax', 
	mathJaxLib : 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=TeX-MML-AM_CHTML'		
}); 
CKEDITOR.replace( 'option_c', { 
	extraPlugins:'mathjax', 
	mathJaxLib : 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=TeX-MML-AM_CHTML'		
}); 
CKEDITOR.replace( 'option_d', { 
	extraPlugins:'mathjax', 
	mathJaxLib : 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=TeX-MML-AM_CHTML'		
}); 
</script> 
<style>.cke_editable{font-size:1.2em!important}</style>