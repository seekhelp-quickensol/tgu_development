<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12">
				<div class="ibox-content text-left">
					<form id="topic" name="topic" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-6" style="border-right: 2px solid #ed7208;">
								<p>Create Question</p>
							</div>
							 <div class="col-lg-6">
								<p>Download Excel Format</p>
								<div class="download_quetions ml-4">
									<a class="btn btn-primary" href="<?=base_url()?>uploads/excel_fomat/mcq_question_excel_format.xlsx" download >MCQ</a>
									<?php /*<a class="btn btn-primary" href="<?=base_url()?>uploads/excel_fomat/fill_in_the _blank_format.xlsx">Fill Blank</a>
									<a class="btn btn-primary" href="<?=base_url()?>uploads/excel_fomat/match the foll excel format.xlsx">Match</a>
									<!--<a class="btn btn-primary" href="<?=base_url()?>uploads/excel_fomat/one word excel format.xlsx">One Word</a>-->
									<a class="btn btn-primary" href="<?=base_url()?>uploads/excel_fomat/tick mark excel format.xlsx">Tick Mark</a>
									<a class="btn btn-danger" href="<?=base_url()?>yearly_exam_questions_list/<?=$this->uri->segment(2)?>">Go to Question List</a>*/?>
								</div>
							</div>
						 </div>
						
						<hr>
						<div class="row">
								<div class="form-group col-lg-4 col-md-3" id="div_paper_set">
									<label class="col-form-label">Select Paper Set<span style="color:red;">*</span></label>
									<select name="paper_set" id="paper_set" class="form-control" style="height:34px;">
									<option value="">Select Paper Set</option>
									<option value="1">A</option>
									<option value="2">B</option>
									<option value="3">C</option>
									<option value="4">D</option>
									</select>
								</div>
							<div class="form-group col-lg-4 col-md-3" id="div_question_type" >
								<label class="col-form-label">Select Question Type<span style="color:red;">*</span></label>
								<select name="question_type" id="question_type" class="form-control" style="height:34px;">
									<option value="">Select Question Type</option>
									<option value="1">MCQ</option>
								<?php /*	<option value="2">Fill In The Blanks</option>
									<!--<option value="3">One Word</option>-->
									<option value="5">TICK MARK</option>
									<option value="8">Match The Following</option>*/?>
									<option value="4">Picture</option>
									<option value="6">Passage Reading</option> 
									
								</select>
							</div>
							<div class="form-group col-lg-4 col-md-3" id="upload_type_div">
								<label class="col-form-label">Select Upload Type<span style="color:red;">*</span></label>
								<select name="upload_type" id="upload_type" class="form-control" style="height:34px;">
								<option value="">Select Upload Type</option>
								<option value="1">Single Upload</option>
								<option value="2">Bulk Upload</option>
								</select>
							</div>
							<div class="form-group col-lg-4 col-md-3" id="bulk_upload">
								<label  class="col-form-label">Bulk Upload<span class="required_input">*</span></label>
								<input type="file" name="userfile" id="userfile" class="form-control bulk_upload" style="height:34px;" ></input>
								
							</div>
						</div>
							<div class="user_error" id="user_error" style="color:red" ></div>
						    <div class="form-group col-lg-6 col-md-3">
								<input name="audio" id="" type="hidden" value="<?php if(!empty($topic)){ echo $topic->topic_audio;}?>"  class="form-control "> 
								<input name="exam_id" id="exam_id" type="hidden" value="<?=$this->uri->segment(2)?>" class="form-control"> 
							</div>
								<br><br>
								<button class="create_question_btn btn btn-sm btn-success submit-btn " type="submit">Submit</button>
						</div>	
					</form>
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

$('#div_question_type').change(function(){
 	if ($('#question_type').val() == 1 || $('#question_type').val() == 2 || $('#question_type').val() == 3 || $('#question_type').val() == 5 || $('#question_type').val() == 8 ){
 		$('#upload_type_div').show();
 		//$('#bulk_upload').show();
 	}else{
 		$('#upload_type_div').hide();
 		$('#bulk_upload').hide();
 	}
});
$('#bulk_upload').hide()
$('#upload_type_div').hide()
$('#upload_type').change(function(){
  	if ($('#upload_type').val() == 1){
 		$('#bulk_upload').hide()
 	}else{
  		$('#bulk_upload').show()
 	} 
}); 

$(document).ready(function(){
	$("#topic").validate({
		rules:{
			paper_set:{
				required:true,
			},
			question_type:{
				required:true,
			},
			upload_type:{
				required:true,
			},
			userfile:{
				required:true,
			}, 
		},
		messages:{
			paper_set:{
				required:"Please select paper set",
			},
			question_type:{
				required:"Please select question type",
			},
			upload_type:{
				required:"Please select upload type",
			},
			userfile:{
				required:"Please upload file",
			}, 
		}, 
		errorPlacement: function(error, element) {
			  if (element.hasClass('select2-hidden-accessible')) {
				error.insertAfter(element.next('.select2-container').find('.select2-selection__rendered'));
			  } else {
				error.insertAfter(element);
			  }
			}
		});
		$('.js-example-basic-single').on('select2:select', function() {
    $(this).valid();
  });
}); 
</script>
 