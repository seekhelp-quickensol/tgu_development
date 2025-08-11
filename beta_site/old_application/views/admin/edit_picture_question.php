<?php include("header.php"); ?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							 		<form id="topic" name="topic" method="post" enctype="multipart/form-data"> 
							<div class="col-md-12">
                                    <div class="row"> 
                                        <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                            <label>Question Description <span class="required_input">*</span></label>
                                            <textarea type="text" class="form-control" id="question_description" name="question_description" placeholder="Question Description"><?php if(!empty($single)){ echo $single->question_description;}?></textarea>
                                        </div>	
                                        <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <label>Marks<span class="required_input">*</span></label>
                                            <input type="number" min="1" class="form-control" id="marks" name="marks" placeholder="Enter Marks" value="<?php if(!empty($single)){ echo $single->marks;}?>">
                                        </div>
                                        <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <label>Question Image<span class="required_input">*</span></label>
                                            <div>
                                                <?php
                                                    $name = explode(',',$single->question_image);
                                                    for($i=0;$i<count($name)-1;$i++){
                                                    $files_path = $this->Digitalocean_model->get_photo('uploads/question_image/'.$name[$i]);
                                                ?>
                                                    <a class="btn btn-primary" href="<?=$files_path;?>" target="_blank" style="margin-bottom:20px;">View Old</a>
                                                <?php } ?>
                                            </div>
                                            
                                        </div>
										 <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
										<input type="hidden" name="old_question_img" value="<?php if(!empty($single)){ echo $single->question_image;}?>">
                                            <input multiple="multiple" name="question_img[]" id="question_img" type="file" class="form-control"><br>
                                            (Note: Only .JPEG, .JPG, .PNG file extenstions are allowed)
											</div>
                                        <!-- <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
                                        </div> -->
                                </div>
								</div>
								<div class="col-md-12">
										<div class="clearfix"><div> 
										<div class="row questions_div">
                                            <?php $i=1;if(!empty($all_que)){ foreach($all_que as $all_que_result){?>
                                                <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                <label for="exampleInputUsername1">Question <?=$i++;?>: <span class="required_input">*</span></label>
                                                    <input type="text" class="form-control" id="question" name="question[]" placeholder="Enter Question" value="<?php if(!empty($all_que_result)){ echo $all_que_result->question;}?>" required>
                                                </div>
                                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <label for="exampleInputUsername1">Option A<span class="required_input">*</span></label>
                                                    <input type="text" class="form-control" id="option_a" name="option_a[]" placeholder="Enter Option A" value="<?php if(!empty($all_que_result)){ echo $all_que_result->option_a;}?>" required>
                                                </div>
                                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <label for="exampleInputUsername1">Option B<span class="required_input">*</span></label>
                                                    <input type="text" class="form-control" id="option_b" name="option_b[]" placeholder="Enter Option B" value="<?php if(!empty($all_que_result)){ echo $all_que_result->option_b;}?>" required>
                                                </div>
                                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <label for="exampleInputUsername1">Option C<span class="required_input">*</span></label>
                                                    <input type="text" class="form-control" id="option_c" name="option_c[]" placeholder="Enter Option C" value="<?php if(!empty($all_que_result)){ echo $all_que_result->option_c;}?>" required>
                                                </div>
                                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <label for="exampleInputUsername1">Option D<span class="required_input">*</span></label>
                                                    <input type="text" class="form-control" id="option_d" name="option_d[]" placeholder="Enter Option D" value="<?php if(!empty($all_que_result)){ echo $all_que_result->option_d;}?>" required>
                                                </div>
                                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <label for="exampleInputUsername1">Marks<span class="required_input">*</span></label>
                                                    <input type="number" min="1" class="form-control marker" id="each_marks" name="each_marks[]" placeholder="Enter Marks" value="<?php if(!empty($all_que_result)){ echo $all_que_result->marks;}?>" required>
                                                </div>
                                                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <label for="exampleInputUsername1">Correct Answer<span class="required_input">*</span></label>
                                                    <select style="height:34px;" class="form-control" id="correct_answer" name="correct_answer[]" required>
                                                        <option value="">Please Select Currect Answer</option>
                                                        <option value="A" <?php if(!empty($all_que_result) && $all_que_result->correct_answer == 'A'){?> selected="selected" <?php }?>>A</option>
                                                        <option value="B" <?php if(!empty($all_que_result) && $all_que_result->correct_answer == 'B'){?> selected="selected" <?php }?>>B</option>
                                                        <option value="C" <?php if(!empty($all_que_result) && $all_que_result->correct_answer == 'C'){?> selected="selected" <?php }?>>C</option>
                                                        <option value="D" <?php if(!empty($all_que_result) && $all_que_result->correct_answer == 'D'){?> selected="selected" <?php }?>>D</option>
                                                    </select>
                                                </div>
                                            <?php }} ?>
                                            <input type="hidden" name="main_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                                            <input type="hidden" name="paper_set" value="<?php if(!empty($single)){ echo $single->paper_set;}?>">
                                            <input type="hidden" name="exam_id" value="<?php if(!empty($single)){ echo $single->exam_id;}?>">
										</div>
										<div class="user_error" id="user_error" style="color:red" ></div>
										<br>									
											<button id="saver" class="btn btn-sm btn-success submit-btn" name="submit_pic" value="submit_pic" type="submit">Submit</button>
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
	<input type="hidden" id="exam_total_mark" value="<?=$exam->total_marks?>">
<input type="hidden" id="exam_total_added_mark" value="<?=$added_mark-$single->marks?>">

<?php include("footer.php"); ?>
<script type="text/javascript">
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
	}else{
		$("#saver").show();
	}
}
$(document).ready(function(){
	$("#topic").validate({
		rules:{
			question_description:{
				required:true,
			},
            <?php if($single->question_image == ""){?>
			question_img:{
				required:true,
			},
            <?php } ?>
			marks:{
				required:true,
			},
			question:{
				required:true,
			},  
			option_a:{
				required:true,
			}, 
			option_b:{
				required:true,
			}, 
			option_c:{
				required:true,
			}, 
			option_d:{
				required:true,
			}, 
			each_marks:{
				required:true,
			}, 
			correct_answer:{
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
			question:{
				required:"Please enter question",
			}, 
			option_a:{
				required:"Please enter option A",
			}, 
			option_b:{
				required:"Please enter option B",
			}, 
			option_c:{
				required:"Please enter option C",
			}, 
			option_d:{
				required:"Please enter option D",
			}, 
			each_marks:{
				required:"Please enter marks",
			}, 
			correct_answer:{
				required:"Please select correct answer",
			}, 
		}

	});

});
$('#question_img').change(function () {
    // alert();
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
        /*
    var ext = this.value.match(/\.(.+)$/)[1];
    console.log(ext)
    switch (ext) {
        case 'jpeg':
          break;
        case 'jpg':
          break;
        case 'png':
          break;
        default:
             alert('Only image file with .jpeg, .jpg, .png extensions supported');
            this.value = '';
    }*/
});
</script>
