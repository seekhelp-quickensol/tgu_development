<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Exam Question Setting <?php if(!empty($exam)){ echo $exam->exam_name;}?></h4>
                  <p class="card-description">
                    Please enter exam question
                  </p>
					<form class="forms-sample" name="question_form" id="question_form" method="post" enctype="multipart/form-data">
						<?php if(empty($single_question)){?>
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
						<?php }else{?>
						<input type="hidden" name="upload_type" id="upload_type" value="Form">
						<?php }?>
						<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single_question)){ echo $single_question->id;}?>">
						<input type="hidden" class="form-control" id="exam_id" name="exam_id" value="<?=$this->uri->segment(2)?>">
						<div class="row form_div" <?php if(!empty($single_question)){?>style="display:block"<?php }else{?>style="display:none"<?php }?>> 
							<div class="col-md-12">
								<div class="form-group">
									<label for="exampleInputUsername1">Question *</label>
									<input type="text" class="form-control" autocomplete="off" id="question" name="question" placeholder="Please enter question" value="<?php if(!empty($single_question)){ echo $single_question->question;}?>">
								</div>
							</div>
							<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputUsername1">Option A *</label>
									<input type="text" class="form-control" id="option_a" name="option_a" placeholder="Option A" value="<?php if(!empty($single_question)){ echo $single_question->option_a;}?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputUsername1">Option B *</label>
									<input type="text" class="form-control" id="option_b" name="option_b" placeholder="Option B" value="<?php if(!empty($single_question)){ echo $single_question->option_b;}?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputUsername1">Option C *</label>
									<input type="text" class="form-control" id="option_c" name="option_c" placeholder="Option C" value="<?php if(!empty($single_question)){ echo $single_question->option_c;}?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputUsername1">Option D *</label>
									<input type="text" class="form-control" id="option_d" name="option_d" placeholder="Option D" value="<?php if(!empty($single_question)){ echo $single_question->option_d;}?>">
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
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputUsername1">Upload *</label>
									<input type="file" class="form-control" id="userfile" name="userfile">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<a href="<?=base_url();?>uploads/question/question_format.xlsx" class="btn btn-primary">Download Format</a>
								</div>
							</div>
						</div> 
						<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
					</form>
                </div>
            </div>
        </div>
			
			
			<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Exam Question Setting <?php if(!empty($exam)){ echo $exam->exam_name;}?></h4>
					<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>Sr. No.</th>
								<th>Question</th>
								<th>Option A</th>
								<th>Option B</th>
								<th>Option C</th>
								<th>Option D</th>
								<th>Correct Answer</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $sr=1;if(!empty($questions)){ foreach($questions as $questions_result){?>
								<tr>
									<td><?=$sr++?></td>
									<td><?=$questions_result->question?></td>
									<td><?=$questions_result->option_a?></td>
									<td><?=$questions_result->option_b?></td>
									<td><?=$questions_result->option_c?></td>
									<td><?=$questions_result->option_d?></td>

									<?php if($questions_result->correct_answer == '1'){
										$correct_answer = 'A';
									}else if($questions_result->correct_answer == '2'){
										$correct_answer = 'B';
									}else if($questions_result->correct_answer == '3'){
										$correct_answer = 'C';
									}else if($questions_result->correct_answer == '4'){
										$correct_answer = 'D';
									} ?>

									<td><?=$correct_answer;?></td>
									<td>
										<?php if($questions_result->status == "1"){?>
											<a onclick="return confirm('Are you sure, you want to deactivate this record?')" title='Deactivate' href="<?=base_url()?>inactive/<?=$questions_result->id?>/tbl_exam_question" class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
											<a onclick="return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href="<?=base_url()?>delete/<?=$questions_result->id?>/tbl_exam_question" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
											<a type='button' title='Edit' data-toggle='tooltip' href="<?=base_url()?>manage_examination_question/<?=$this->uri->segment(2)?>/<?=$questions_result->id?>"  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
										<?php }else{?>
											<a onclick="return confirm('Are you sure, you want to deactivate this record?')" title='Deactivate' href="<?=base_url()?>active/<?=$questions_result->id?>/tbl_exam_question" class='btn btn-success btn-sm'><i class='mdi mdi-playlist-remove'></i></a>   
											<a onclick="return confirm('Are you sure, you want to delete this record permanently?')\"' data-toggle='tooltip' title='Permanently Delete' href="<?=base_url()?>delete/<?=$questions_result->id?>/tbl_exam_question" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
											<a type='button' title='Edit' data-toggle='tooltip' href="<?=base_url()?>manage_examination_question/<?=$this->uri->segment(2)?>/<?=$questions_result->id?>"  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
										<?php }?>
									</td>
								</tr>
							<?php }}?>
						</tbody>
					</table>
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
$(function(){
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
});
   
jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	
$('#question_form').validate({
	rules: {
		upload_type: {
			required: true,
		},
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
		userfile: {
			required: true,
		}, 
	},
	messages: {
		upload_type: {
			required: "Please select form type",
		},
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
		userfile: {
			required: "Please upload file",
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
            'excel'
        ]
 });
</script>
 