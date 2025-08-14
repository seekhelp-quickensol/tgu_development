<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body"> 
					<form id="fiil_blank" method="post" enctype="multipart/form-data">
        			 	<div class="col-lg-12">
					   		<div class="row">
				  				<p>Update one word answer question</p>
					 		</div>
				 		</div>
						 <div class="row questions_div">
						 	<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">
						 		<label for="exampleInputUsername1">Question<span class="required_input">*</span></label>
						 		<input type="text" name="question" id="question" class="form-control"  placeholder="Enter Question" value="<?php if($question){ echo($question->question);} ?>" required >
						 	</div>
						 	<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">
						 		<label for="exampleInputUsername1">Comma separeted options<span class="required_input">*</span></label>
								<input type="text" class="form-control" id="fill_blank_option" name="fill_blank_option" placeholder="Enter comma separeted value and include correct option first respectively" value="<?php if($question){ echo($question->fill_blank_option);} ?>" required >
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" >
								<label for="exampleInputUsername1">Comma separeted Correct option<span class="required_input">*</span></label>
								<input type="text" class="form-control" id="correct_answer" name="correct_answer" value="<?php if($question){ echo($question->correct_answer);} ?>" required >
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label for="exampleInputUsername1">Marks<span class="required_input">*</span></label>
								<input type="number" min="1" class="form-control" id="marks" name="marks" value="<?php if($question){ echo($question->marks);} ?>" placeholder="Enter Marks" required >
							</div>
						 	<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						 		<input class="form-control" type="hidden" value="<?=$this->uri->segment(2) ?>" name="question_id" id="question_id" placeholder="">
						 	</div>
						 </div>
						<hr>
						<div>
						<div class="user_error" id="user_error" style="color:red" ></div>
							<br><br>
							<button class="btn btn-sm btn-success submit-btn" type="submit">Submit</button>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php');?>
<script type="text/javascript">
$(document).ready(function(){
	$("#fiil_blank").validate({
		rules:{
			question:{
			required:true,
			},
			fill_blank_option:{
			required:true,
			},
			 correct_answer:{
			 required:true,
			},
			marks:{
			required:true,
			},
	

		},
		messages:{
			question:{
			required:"Enter question *",
			},
			fill_blank_option:{
			required:"Enter fill blank option *",
			},
			correct_answer:{
			required:"Enter correct answer*",
			},
			marks:{
			required:"Enter marks*",
			},
		}

	});
});	
</script>