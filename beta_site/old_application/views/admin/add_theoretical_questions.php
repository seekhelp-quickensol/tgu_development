<?php include('faculty_header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
		  <?php if(!isset($_GET['course'])){?>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Theoretical Question </h4>
                  <p class="card-description">
                    Please enter required details
                  </p>
				  
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
				</div>
            </div>
        </div>
		<?php }?>
		<?php if(isset($_GET['course'])){?>
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Theoretical Question </h4>
						<p class="card-description">Please enter required details</p>
						<form method="post" name="add_question" id="add_question" enctype="multipart/form-data">
							<div class="row"> 
								<div class="col-md-12">
									<a class="btn btn-info float-right" href="<?=base_url();?>add_theoretical_questions">Start Over</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="exampleInputUsername1">Upload Type *</label>
										<select class="form-control" id="upload_type" name="upload_type"> 
											<option value="">Select</option>
											<option value="Form">Form</option>
											<option value="Upload">Upload</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row form_div" style="display:none">
								<div class="col-md-12">
									<div class="form-group">
										<label for="exampleInputUsername1">Question *</label>
										<input type="text" class="form-control" autocomplete="off" id="question" name="question" placeholder="Please enter question" value="<?php if(!empty($single_question)){ echo $single_question->question;}?>">
										<input type="hidden" class="form-control" autocomplete="off" id="course" name="course" value="<?=$_GET['course']?>">
										<input type="hidden" class="form-control" autocomplete="off" id="stream" name="stream" value="<?=$_GET['stream']?>">
										<input type="hidden" class="form-control" autocomplete="off" id="year_sem" name="year_sem" value="<?=$_GET['year_sem']?>">
										<input type="hidden" class="form-control" autocomplete="off" id="subject" name="subject" value="<?=$_GET['subject']?>">
									</div>
								</div>
							</div> 
							<div class="row upload_div" style="display:none">
								<div class="col-md-12">
									<div class="form-group">
										<a href="<?=$this->Digitalocean_model->get_photo('uploads/question/theory/theoretical_questions_format.xlsx')?>" class="btn btn-primary">Download Format</a>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="exampleInputUsername1">Upload *</label>
										<input type="file" class="form-control" id="userfile" name="userfile">
									</div>
								</div>
							</div>
							<button type="submit" id="save_btn" name="save_question" value="save_question" class="btn btn-primary mr-2">Submit</button> 
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Question List<?=$course_name?></h4>
					<table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
						<thead>
							<tr>
								<th>Sr. No.</th>
								<th>Question</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $sr=1;if(!empty($questions)){ foreach($questions as $questions_result){?>
								<tr>
									<td><?=$sr++?></td>
									<td><?=$questions_result->question?></td> 
									<td>
										<a onclick="return confirm('Are you sure, you want to delete this record permanently?')"' data-toggle='tooltip' title='Permanently Delete' href="<?=base_url()?>delete/<?=$questions_result->id?>/tbl_mcq_data" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
										
										<?php /*if($questions_result->status == "1"){?>
											<a onclick="return confirm('Are you sure, you want to deactivate this record?')" title='Deactivate' href="<?=base_url()?>inactive/<?=$questions_result->id?>/tbl_exam_question" class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
											<a onclick="return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href="<?=base_url()?>delete/<?=$questions_result->id?>/tbl_exam_question" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
											<a type='button' title='Edit' data-toggle='tooltip' href="<?=base_url()?>manage_examination_question/<?=$this->uri->segment(2)?>/<?=$questions_result->id?>"  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
										<?php }else{?>
											<a onclick="return confirm('Are you sure, you want to deactivate this record?')" title='Deactivate' href="<?=base_url()?>active/<?=$questions_result->id?>/tbl_exam_question" class='btn btn-success btn-sm'><i class='mdi mdi-playlist-remove'></i></a>   
											<a onclick="return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href="<?=base_url()?>delete/<?=$questions_result->id?>/tbl_exam_question" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
											<a type='button' title='Edit' data-toggle='tooltip' href="<?=base_url()?>manage_examination_question/<?=$this->uri->segment(2)?>/<?=$questions_result->id?>"  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
										<?php }*/?>
									</td>
								</tr>
							<?php }}?>
						</tbody>
					</table>
                </div>
              </div>
            </div>
		<?php }?>
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
	},
	messages: {
		question: {
			required: "Please enter question",
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
 $('#example').DataTable({
	 dom: 'Bfrtip',
        buttons: [
			{
				extend:'excel',
				title:"Question List",
				exportOptions: {
                    columns: [0, 1],
                },
			}
           
        ]
 });
</script>
 