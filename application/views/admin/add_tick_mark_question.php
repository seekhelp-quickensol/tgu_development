<?php include('header.php');?>
	<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="col-md-12">
								<?php 
									 
									if(!empty($exam)){ 
								?>
								<h4>
									<span><?=$exam->course_name;?></span>
									<span>/</span>
									<span><?=$exam->stream_name;?></span>
									<span>/</span>
									<span><?=$exam->year_sem;?></span>
									<span>/</span>
									<span><?=$exam->exam_name;?></span> 
									<span>/</span>  
									<span>
										<?php   
										if($this->uri->segment(2) == 1){
											echo "Paper Set = A";
										}else if($this->uri->segment(2) == 2){
											echo "Paper Set = B";
										}else if($this->uri->segment(2) == 3){
											echo "Paper Set = C";
										}else if($this->uri->segment(2) == 4){
											echo "Paper Set = D";
										}
										}?>
									</span>
								</h4>
								</div>
								<div class="col-md-12">
				<form method="post" name="tick_mark" id="tick_mark" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label for="exampleInputUsername1">Number Of Questions <span class="required_input">*</span></label>
							<select class="form-control number_of_questions" style="height:34px;" id="number_of_questions" name="number_of_questions">
								<option value="">Please Select Number Of Questions</option>
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
							</select>
						</div>
					</div>
					<input type="hidden" name="paper_set" value="<?=$this->uri->segment(2)?>">
					<input type="hidden" name="exam_id" value="<?=$this->uri->segment(3)?>">
					<div class="dynamic_input"></div>
					 
							<div class="user_error" id="user_error" style="color:red" ></div>
						    <div class="form-group col-lg-4 col-md-3">
								<input name="audio" id="" type="hidden" value="<?php if(!empty($topic)){ echo $topic->topic_audio;}?>"  class="form-control "> 
							</div>
								<br><br>
								<button class="btn btn-sm btn-success submit-btn" type="submit">Submit</button>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include("footer.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#tick_mark").validate({
		rules:{
			number_of_questions:{
				required:true,
			},  
		},
		messages:{
			number_of_questions:{
				required:"Please select number of questions",
			}, 
		}

	});
});

$('.number_of_questions').change(function(){
	$('.dynamic_input').html('');
	$number_of_questions = $('#number_of_questions').val();
	for($i=1;$i<=$number_of_questions;$i++){
		$('.dynamic_input').append('<hr><div class="row questions_div">\
			<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">\
			   <label for="exampleInputUsername1">Question '+$i+'<span class="required_input">*</span></label>\
				<input type="text" class="form-control" id="question_'+$i+'" name="question_'+$i+'" placeholder="Enter Question '+$i+'" required>\
			</div>\
			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">\
			<label for="exampleInputUsername1">Option A<span class="required_input">*</span></label>\
				<input type="text" class="form-control" id="option_a_'+$i+'" name="option_a_'+$i+'" placeholder="Enter Option A" required>\
			</div>\
			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">\
			<label for="exampleInputUsername1">Option B<span class="required_input">*</span></label>\
				<input type="text" class="form-control" id="option_b_'+$i+'" name="option_b_'+$i+'" placeholder="Enter Option B" required>\
			</div>\
			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">\
			<label for="exampleInputUsername1">Marks<span class="required_input">*</span></label>\
				<input type="number" min="1" class="form-control" id="marks_'+$i+'" name="marks_'+$i+'" placeholder="Enter Marks" required>\
			</div>\
			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">\
			<label for="exampleInputUsername1">Correct Answer<span class="required_input">*</span></label>\
				<select style="height:34px;" class="form-control" id="correct_answer_'+$i+'" name="correct_answer_'+$i+'" required>\
					<option value="">Please Select Currect Answer</option>\
					<option value="A">A</option>\
					<option value="B">B</option>\
				</select>\
			</div><hr>\
		');
	}
});
</script>
