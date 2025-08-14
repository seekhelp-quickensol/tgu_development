<?php include("header.php"); ?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="col-md-12">
								</div>
								<div class="col-md-12">
							 		<form id="topic" name="topic" method="post" enctype="multipart/form-data"> 
										<div class="clearfix"><div> 
										<div class="row questions_div">
											<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">
											<label for="exampleInputUsername1">Question: <span class="required_input">*</span></label>
												<input type="text" class="form-control" id="question" name="question" placeholder="Enter Question" value="<?php if(!empty($single)){ echo $single->question;}?>" required>
											</div>
											<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<label for="exampleInputUsername1">Option A<span class="required_input">*</span></label>
												<input type="text" class="form-control" id="option_a" name="option_a" placeholder="Enter Option A" value="<?php if(!empty($single)){ echo $single->option_a;}?>" required>
											</div>
											<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<label for="exampleInputUsername1">Option B<span class="required_input">*</span></label>
												<input type="text" class="form-control" id="option_b" name="option_b" placeholder="Enter Option B" value="<?php if(!empty($single)){ echo $single->option_b;}?>" required>
											</div>
											<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<label for="exampleInputUsername1">Option C<span class="required_input">*</span></label>
												<input type="text" class="form-control" id="option_c" name="option_c" placeholder="Enter Option C" value="<?php if(!empty($single)){ echo $single->option_c;}?>" required>
											</div>
											<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<label for="exampleInputUsername1">Option D<span class="required_input">*</span></label>
												<input type="text" class="form-control" id="option_d" name="option_d" placeholder="Enter Option D" value="<?php if(!empty($single)){ echo $single->option_d;}?>" required>
											</div>
											<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<label for="exampleInputUsername1">Marks<span class="required_input">*</span></label>
												<input type="number" min="1" class="form-control marker" id="marks" name="marks" placeholder="Enter Marks" value="<?php if(!empty($single)){ echo $single->marks;}?>" required>
											</div>
											<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
											<label for="exampleInputUsername1">Correct Answer<span class="required_input">*</span></label>
												<select style="height:34px;" class="form-control" id="correct_answer" name="correct_answer" required>
													<option value="">Please Select Currect Answer</option>
													<option value="A" <?php if(!empty($single) && $single->correct_answer == 'A'){?> selected="selected" <?php }?>>A</option>
													<option value="B" <?php if(!empty($single) && $single->correct_answer == 'B'){?> selected="selected" <?php }?>>B</option>
													<option value="C" <?php if(!empty($single) && $single->correct_answer == 'C'){?> selected="selected" <?php }?>>C</option>
													<option value="D" <?php if(!empty($single) && $single->correct_answer == 'D'){?> selected="selected" <?php }?>>D</option>
												</select>
											</div>
										<input type="hidden" name="paper_set" value="<?php if(!empty($single)){ echo $single->paper_set;}?>">
										<input type="hidden" name="exam_id" value="<?php if(!empty($single)){ echo $single->exam_id;}?>">
										</div>
										<div class="user_error" id="user_error" style="color:red" ></div>
										<br>									
											<button id="saver" class="btn btn-sm btn-success submit-btn" name="submit_mcq" value="submit_mcq" type="submit">Submit</button>
										</div>	
									</form>
								</div>
								<div class="col-lg-4">
									
								</div>
							</div>
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
			marks:{
				required:true,
			}, 
			correct_answer:{
				required:true,
			}, 
		},
		messages:{
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
			marks:{
				required:"Please enter marks",
			}, 
			correct_answer:{
				required:"Please select correct answer",
			}, 
		}

	});

});
</script>
