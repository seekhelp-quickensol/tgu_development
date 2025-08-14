<?php include("header.php");?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body"> 
					<form id="topic" method="post" enctype="multipart/form-data">
        			 	<div class="col-lg-12">
					   		<div class="row">
				  				<p>Update Picture question</p>
					 		</div>
				 		</div>
						 <div class="row questions_div">
						 	<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">
							<label >Quetion Description <span class="required_input">*</span></label>
					    	<textarea type="text" class="form-control" id="question_description" name="question_description" required ><?php if($question){ echo($question->question_description);} ?></textarea>
			    			</div>
						 	<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">
						 		<label >Quetion  <span class="required_input">*</span></label>
						 		<input type="text" name="question" id="question" class="form-control"  placeholder="Enter Question" value="<?php if($question){ echo($question->question);} ?>" required>
						 	</div>
						 <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
						 	<label >Option A <span class="required_input">*</span></label>
						 	<input class="form-control" type="text" value="<?php if($question){ echo($question->option_a);} ?>" name="option_a" id="option_a" placeholder="Enter Option A">
						 </div>	
	 					 <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
	 					 	<label >Option B <span class="required_input">*</span></label>
						 	<input class="form-control" type="text" value="<?php if($question){ echo($question->option_b);} ?>" name="option_b" id="option_b" placeholder="Enter Option B">
						 </div>
						 <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
						 	<label >Option C <span class="required_input">*</span></label>
						 	<input class="form-control" type="text" value="<?php if($question){ echo($question->option_c);} ?>" name="option_c" id="option_c" placeholder="Enter Option C">
						 </div>
						 <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
						 	<label >Option D <span class="required_input">*</span></label>
						 	<input class="form-control" type="text" value="<?php if($question){ echo($question->option_d);} ?>" name="option_d" id="option_d" placeholder="Enter Option D">
						 </div>
						 <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						 	<label >Marks<span class="required_input">*</span></label>
						 	<input class="form-control" type="number" min="1" value="<?php if($question){ echo($question->marks);} ?>" name="marks" id="marks" placeholder="Enter Marks">
						 </div> 
						 <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						 	<label >Select Correct Option <span class="required_input">*</span></label>
						 	<select class="form-control" style="height:34px;" name="correct_answer" id="correct_answer">
						 		<option value="">Please Select Correct Option</option>
						 		<option value="A"<?php if(($question->correct_answer) == "A"){?> selected <?php } ?> >A</option>
						 		<option value="B" <?php if(($question->correct_answer) == "B"){?> selected <?php } ?> >B</option>
						 		<option value="C" <?php if(($question->correct_answer) == "C"){?> selected <?php } ?>>C</option>
						 		<option value="D" <?php if(($question->correct_answer) == "D"){?> selected <?php } ?> >D</option>
						 	</select>
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