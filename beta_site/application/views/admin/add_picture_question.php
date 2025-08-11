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
										[Marks: <?=$added_mark?>/<?=$exam->total_marks?>] 
									</span>
								</h4>
								</div>
								<div class="col-md-12">
				<form method="post" enctype="multipart/form-data" name="topic" id="topic">
					<div class="row"> 
							<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">
								<label>Question Description <span class="required_input">*</span></label>
								<textarea type="text" class="form-control" id="question_description" name="question_description" placeholder="Quetion Description" required></textarea>
			    			</div>	
			    			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label>Question Image<span class="required_input">*</span></label>
								<input multiple="multiple" name="question_img[]" id="question_img" type="file" class="form-control" placeholder="Quetion Description" required></input>
								<br>
                                            (Note: Only .JPEG, .JPG, .PNG file extenstions are allowed)
							</div>
					    	<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
					    		<label>Marks<span class="required_input">*</span></label>
						      <input type="number" min="1" class="form-control marker" id="marks" name="marks" placeholder="Enter Marks" required>
					      </div>
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
							<div class="form-group col-lg-4 col-md-3">
								<button id="saver" class="btn btn-sm btn-success submit-btn" type="submit">Continue</button>
								<button id="saver_2" name="finish" value="Finish" class="btn btn-sm btn-success submit-btn" type="submit">Finish</button>
							</div>
						</div>	
					</form>
				</div> 
			</div> 
		</div> 
<input type="hidden" id="exam_total_mark" value="<?=$exam->total_marks?>">
<input type="hidden" id="exam_total_added_mark" value="<?=$added_mark?>">
<?php include("footer.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#topic").validate({
		rules:{
			question_description:{
				required:true,
			},
			question_img:{
				required:true,
			},
			marks:{
				required:true,
			},
			number_of_questions:{
				required:true,
			},   
		},
		messages:{
			question_description:{
				required:"Please enter description",
			},
			question_img:{
				required:"Please upload Image",
			},
			marks:{
				required:"Please enter marks",
			},
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
		$('.dynamic_input').append('<div class="row questions_div">\
			<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">\
				<textarea type="text" class="form-control" id="question_'+$i+'" name="question_'+$i+'" placeholder="Enter Question" required></textarea>\
			</div>\
			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">\
				<input type="text" class="form-control" id="option_a_'+$i+'" name="option_a_'+$i+'" placeholder="Enter Option A" required>\
			</div>\
			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">\
				<input type="text" class="form-control" id="option_b_'+$i+'" name="option_b_'+$i+'" placeholder="Enter Option B" required>\
			</div>\
			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">\
				<input type="text" class="form-control" id="option_c_'+$i+'" name="option_c_'+$i+'" placeholder="Enter Option C" required>\
			</div>\
			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">\
				<input type="text" class="form-control" id="option_d_'+$i+'" name="option_d_'+$i+'" placeholder="Enter Option D" required>\
			</div>\
			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">\
				<select style="height:34px;" class="form-control" id="correct_answer_'+$i+'" name="correct_answer_'+$i+'" required>\
					<option value="">Please Select Currect Answer</option>\
					<option value="A">A</option>\
					<option value="B">B</option>\
					<option value="C">C</option>\
					<option value="D">D</option>\
				</select>\
			</div>\
			</div>\
			<hr>\
		');
	}
});
$(".marker").keyup(function(){
	var total_new_mark = 0;
	$(".marker").each(function(){
		if($(this).val() != ""){
			total_new_mark = parseInt(total_new_mark)+parseInt($(this).val());
		}
	});
	calculate_total_mark(total_new_mark);
});
function calculate_total_mark(total_new_mark){
	var total_amt = parseInt(total_new_mark)+parseInt($("#exam_total_added_mark").val());
	if(total_amt > $("#exam_total_mark").val()){
		alert('You can not add marks greater than to <?=$exam->total_marks?>');
		$("#saver").hide();
		$("#saver_2").hide();
	}else{
		$("#saver").show();
		$("#saver_2").show();
	}
}
// var _URL = window.URL || window.webkitURL;
// $("#question_img").change(function (e) {
//     var file, img;
//     if((file = this.files[0])){
//         img = new Image();
//         var objectUrl = _URL.createObjectURL(file);
//         img.onload = function () {
//         		if(this.width==400 && this.height==400){
//         		}else{
//         			alert('Image size should be 400px X 400px');
//         			$("#question_img").val('');
//         		}
//             _URL.revokeObjectURL(objectUrl);
//         };
//         img.src = objectUrl;
//     }
// });
$('#question_img').change(function () {
	var files = $(this)[0].files;

    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var ext = file.name.split('.').pop().toLowerCase();

        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) === -1) {
        alert('Please select PNG or JPG files only.');
        $(this).val('');
        return;
        }
    }
    // var ext = this.value.match(/\.(.+)$/)[1];
    // console.log(ext)
    // switch (ext) {
    //     case 'jpeg':
    //       break;
    //     case 'jpg':
    //       break;
    //     case 'png':
    //       break;
    //     default:
    //          alert('Only image file with .jpeg, .jpg, .png extensions supported');
    //         this.value = '';
    // }
});
</script>
