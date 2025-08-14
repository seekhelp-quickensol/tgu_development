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
                     <p>Update Match The Following Question</p>
                  </div>
               </div>
               <div class="clearfix">
                  <div>
                     <hr>
                     <div class="dynamic_input">
                        <div class="row questions_div">
                           <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Question: <span class="required_input">*</span></label>
                              <input type="text" class="form-control" id="question
                              " name="question" placeholder="Enter Question" value="<?php if($question){ echo($question->question);} ?>" required>
                           </div>
                           <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Question A<span class="required_input">*</span></label>
                              <input type="text" class="form-control" id="question_a" name="question_a" placeholder="" value="<?php if($question){ echo($question->question_a);} ?>" required>
                           </div>
                           <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Answer A<span class="required_input">*</span></label>
                              <input type="text" class="form-control" id="answer_a" name="answer_a" placeholder="" value="<?php if($question){ echo($question->answer_a);} ?>" required>
                           </div>
                        </div>
                        <div class="row questions_div">
                           <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Question B<span class="required_input">*</span></label>
                              <input type="text" class="form-control" id="question_b" name="question_b" placeholder="" value="<?php if($question){ echo($question->question_b);} ?>" required>
                           </div>
                           <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Answer B<span class="required_input">*</span></label>
                              <input type="text" class="form-control" id="answer_b" name="answer_b" placeholder="" value="<?php if($question){ echo($question->answer_b);} ?>"required>
                           </div>
                        </div>
                        <div class="row questions_div">
                           <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Question C<span class="required_input">*</span></label>
                              <input type="text" class="form-control" id="question_c" name="question_c" placeholder="" value="<?php if($question){ echo($question->question_c);} ?>" required>
                           </div>
                           <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Answer C<span class="required_input">*</span></label>
                              <input type="text" class="form-control" id="answer_c" name="answer_c" placeholder="" value="<?php if($question){ echo($question->answer_c);} ?>" required>
                           </div>
                        </div>
                        <div class="row questions_div">
                           <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Question D<span class="required_input">*</span></label>
                              <input type="text" class="form-control" id="question_d" name="question_d" placeholder="" value="<?php if($question){ echo($question->question_d);} ?>" required>
                           </div>
                           <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Answer D<span class="required_input">*</span></label>
                              <input type="text" class="form-control" id="answer_d" name="answer_d" placeholder="" value="<?php if($question){ echo($question->answer_d);} ?>" required>
                           </div>
                        </div>
                        <div class="row questions_div">
                           <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Question E<span class="required_input">*</span></label>
                              <input type="text" class="form-control" id="question_e" name="question_e" placeholder="" value="<?php if($question){ echo($question->question_e);} ?>"required>
                           </div>
                           <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Answer E<span class="required_input">*</span></label>
                              <input type="text" class="form-control" id="answer_e" name="answer_e" placeholder="" value="<?php if($question){ echo($question->answer_e);} ?>" required>
                           </div>
                        </div>
                        <div class="row questions_div">
                           <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <label for="exampleInputUsername1">Marks<span class="required_input">*</span></label>
                              <input type="number" min="1" class="form-control" id="marks" name="marks" placeholder="Enter Marks" value="<?php if($question){ echo($question->marks);} ?>" required>
                           </div>
                        </div>
                        <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
						 	<input class="form-control" type="hidden" value="<?=$this->uri->segment(2) ?>" name="question_id" id="question_id" placeholder="">
						</div>
                     </div>
                  </div>
                  <div class="user_error" id="user_error" style="color:red" ></div>
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
   
   
</script>