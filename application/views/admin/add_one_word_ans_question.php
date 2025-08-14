<?php include("header.php"); ?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
						<form method="post">
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
						<div class="form-group col-lg-4 col-md-3">
							<label for="exampleInputUsername1">Number Of Questions <span class="required_input">*</span></label>
							<select class="form-control number_of_questions" style="height:34px;" id="number_of_questions" name="number_of_questions" required >
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
						<input name="question_data_id" id="question_data_id" type="hidden" value="<?=$this->uri->segment('2');?>"  class="form-control " required> 
					</div>
					<br><br>
					<button class="btn btn-sm btn-success submit-btn" type="submit">Submit</button>
				</form>
			</div>	 
			</div>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#topic").validate({
		rules:{
			course_name:{
			required:true,
			},
			course_level:{
			required:true,
			},
			 topic_name:{
			 required:true,
			},
			topic_info:{
			required:true,
			},
			<?php if (empty($topic)){ ?>
			audio:{
			// required:true,
			},
      <?php }?>

		},
		messages:{
			course_name:{
			required:"Select course *",
			},
			course_level:{
			required:"Select course level*",
			},
			topic_name:{
			required:"Enter exam topic name*",
			},
			topic_info:{
			required:"Enter assessment*",
			},
			audio:{
			required:"Topic audio*",
			},
		}

	});

});

$('.number_of_questions').change(function(){
	$('.dynamic_input').html('');
	$number_of_questions = $('#number_of_questions').val();
	for($i=1;$i<=$number_of_questions;$i++){
		$('.dynamic_input').append('<div class="row questions_div">\
			<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">\
			<label for="exampleInputUsername1">Enter Question(use blank_space where you have blank space and <br> for next line)<span class="required_input">*</span></label>\
				<textarea type="text" class="form-control" id="question_'+$i+'" name="question_'+$i+'" placeholder="Eg: i blank_space a boy.i like to blank_space cricket" required></textarea>\
			</div>\
			<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">\
			<label for="exampleInputUsername1">Enter option for users (Use Comma Separator):<span class="required_input">*</span></label>\
				<input type="text" class="form-control" id="fill_blank_option_'+$i+'" name="fill_blank_option_'+$i+'" placeholder="Eg:i,am,the,this,play" required>\
			</div>\
			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">\
			<label for="exampleInputUsername1">Marks<span class="required_input">*</span></label>\
				<input type="number" min="1" class="form-control" id="marks_'+$i+'" name="marks_'+$i+'" placeholder="Enter Marks" required>\
			</div>\
			<div class"form-control col-lg-3 col-md-3 col-sm-6 col-xs-12">\
			<label for="exampleInputUsername1">Enter correct options(Use Comma Separator)\
			<span class="required_input">*</span></label>\
			<input type="text" class="form-control" id="correct_answer_'+$i+'" name="correct_answer_'+$i+'" placeholder="Eg:am,play" required>\
			</div>\
			</div>\
			<hr>\
		');
	}
});
</script>
