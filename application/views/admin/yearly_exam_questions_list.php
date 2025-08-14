<?php include("header.php");?>
	<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4>Course: <?php if(!empty($exam)){ echo $exam->course_name;?> | Stream: <?=$exam->stream_name;?> | Year/Sem: <?=$exam->year_sem;?> | Exam Name: <?=$exam->exam_name;?> | Total Marks <?=$exam->total_marks;?> <?php }?>/<span id="set_total_added_marks"></span></h4>
							<hr>	
								<p>MCQ Question list</p>
							<hr>	
								<table id="example" class="table table-striped table-bordered table-responsive dt-responsive nowrap" style="width:100%">
									<thead>
										<tr>
											<th>Sr.No</th> 
											<th>Paper Set</th> 
											<th>Question</th> 
											<th>Option A</th> 
											<th>Option B</th> 
											<th>Option C</th> 
											<th>Option D</th> 
											<th>Mark</th> 
											<th>Correct option</th> 
											<th>Action</th> 
										</tr>
									</thead>
									<tbody>
										<?php 
											$total_mark_a=0;
											$total_mark_b=0;
											$total_mark_c=0;
											$total_mark_d=0;
										if(!empty($mcq_question)){
											$i=1; 
											foreach ($mcq_question as $mcq_question_result){ ?>
										<tr>
											<td><?=$i++?></td>
											<td>	
											<?php if(($mcq_question_result->paper_set)== 1){
													$total_mark_a +=$mcq_question_result->marks;
													echo "A"; 
											} 
											if(($mcq_question_result->paper_set)== 2){ 
												$total_mark_b +=$mcq_question_result->marks;
												echo "B";
											} 
											if(($mcq_question_result->paper_set)== 3){ 
												$total_mark_c +=$mcq_question_result->marks;
												echo "C";
											} 
											if(($mcq_question_result->paper_set)== 4){ 
												$total_mark_d +=$mcq_question_result->marks;
												echo "D";
											} ?>
											<td><?=$mcq_question_result->question?></td>
											<td><?=$mcq_question_result->option_a?></td>
											<td><?=$mcq_question_result->option_b?></td>
											<td><?=$mcq_question_result->option_c?></td>
											<td><?=$mcq_question_result->option_d?></td>
											<td><?=$mcq_question_result->marks?></td>
											<td><?=$mcq_question_result->correct_answer?></td>
											<td>
												<a href="<?=base_url();?>delete/<?=$mcq_question_result->id;?>/tbl_mcq_question" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>
												<a href="<?=base_url();?>update_mcq_question/<?=$mcq_question_result->id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
											</td>
										</tr>
										<?php } } ?>
										
										
									</tbody>
								</table> 
								
								<hr>	
								<p>Fill in the blank Question list</p>
								<hr>	
								<table id="example2" class="table table-striped table-bordered table-responsive dt-responsive nowrap" style="width:100%">
									<thead>
										<tr>
											<th>Sr.No</th> 
											<th>Paper Set</th> 
											<th>Question</th> 
											<th>Option A</th> 
											<th>Option B</th> 
											<th>Option C</th> 
											<th>Option D</th> 
											<th>Mark</th> 
											<th>Correct option</th> 
											<th>Action</th> 
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($fill_question)){
											$i=1; 
											foreach ($fill_question as $fill_question_result){ ?>
										<tr>
											<td><?=$i++?></td>
											<td>	
											<?php if(($fill_question_result->paper_set)== 1){
												$total_mark_a +=$fill_question_result->marks;
												echo "A"; 
											} 
											if(($fill_question_result->paper_set)== 2){ 
												$total_mark_b +=$fill_question_result->marks;
												echo "B";
											} 
											if(($fill_question_result->paper_set)== 3){
												$total_mark_c +=$fill_question_result->marks;
												echo "C";
											} 
											if(($fill_question_result->paper_set)== 4){
												$total_mark_d +=$fill_question_result->marks;
												echo "D";
											} ?>
											<td><?=$fill_question_result->question?></td>
											<td><?=$fill_question_result->option_a?></td>
											<td><?=$fill_question_result->option_b?></td>
											<td><?=$fill_question_result->option_c?></td>
											<td><?=$fill_question_result->option_d?></td>
											<td><?=$fill_question_result->marks?></td>
											<td><?=$fill_question_result->correct_answer?></td>
											<td>
												<a href="<?=base_url();?>delete/<?=$fill_question_result->id;?>/tbl_fill_in_blank_question" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>
												<a href="<?=base_url();?>update_fill_in_blank_question/<?=$fill_question_result->id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
											</td>
										</tr>
										<?php } } ?>
										
										
									</tbody>
								</table> 
								
								<hr>	
								<p>One Word Question list</p>
								<hr>	
								<table id="example3" class="table table-striped table-bordered table-responsive dt-responsive nowrap" style="width:100%">
									<thead>
										<tr>
											<th>Sr.No</th> 
											<th>Paper Set</th> 
											<th>Question</th> 
											<th>Option A</th> 
											<th>Option B</th> 
											<th>Option C</th> 
											<th>Option D</th> 
											<th>Mark</th> 
											<th>Correct option</th> 
											<th>Action</th> 
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($one_word_question)){
											$i=1; 
											foreach ($one_word_question as $one_word_question_result){ ?>
										<tr>
											<td><?=$i++?></td>
											<td>	
											<?php if(($one_word_question_result->paper_set)== 1){
													$total_mark_a +=$one_word_question_result->marks;
													echo "A"; 
											} 
											if(($one_word_question_result->paper_set)== 2){ 
												$total_mark_b +=$one_word_question_result->marks;
												echo "B";
											} 
											if(($one_word_question_result->paper_set)== 3){
												$total_mark_c +=$one_word_question_result->marks;
												echo "C";
											} 
											if(($one_word_question_result->paper_set)== 4){
												$total_mark_d +=$one_word_question_result->marks;
												echo "D";
											} ?>
											<td><?=$one_word_question_result->question?></td>
											<td><?=$one_word_question_result->option_a?></td>
											<td><?=$one_word_question_result->option_b?></td>
											<td><?=$one_word_question_result->option_c?></td>
											<td><?=$one_word_question_result->option_d?></td>
											<td><?=$one_word_question_result->marks?></td>
											<td><?=$one_word_question_result->correct_answer?></td>
											<td>
												<a href="<?=base_url();?>delete/<?=$one_word_question_result->id;?>/tbl_one_word_question" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>
												<a href="<?=base_url();?>update_one_word_ans_question/<?=$one_word_question_result->id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
											</td>
										</tr>
										<?php } } ?> 
									</tbody>
								</table> 
								
								
								<hr>	
								<p>Picture Question list</p>
								<hr>	
								<table id="example4" class="table table-striped table-bordered table-responsive dt-responsive nowrap" style="width:100%">
									<thead>
										<tr>
											<th>Sr.No</th> 
											<th>Paper Set</th> 
											<th>Description</th> 
											<th>Question</th> 
											<th>Option A</th> 
											<th>Option B</th> 
											<th>Option C</th> 
											<th>Option D</th> 
											<th>Mark</th> 
											<th>Correct option</th> 
											<th>Action</th> 
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($picture_question)){
											$i=1; 
											foreach ($picture_question as $picture_question_result){ ?>
										<tr>
											<td><?=$i++?></td>
											<td>	
											<?php if(($picture_question_result->paper_set)== 1){
													$total_mark_a +=$picture_question_result->marks;
													echo "A"; 
											} 
											if(($picture_question_result->paper_set)== 2){ 
												$total_mark_b +=$picture_question_result->marks;
												echo "B";
											} 
											if(($picture_question_result->paper_set)== 3){
												$total_mark_c +=$picture_question_result->marks;
												echo "C";
											} 
											if(($picture_question_result->paper_set)== 4){
												$total_mark_d +=$picture_question_result->marks;
												echo "D";
											} ?>
											<td><?=$picture_question_result->question_description?></td>
											<td><?=$picture_question_result->question?></td>
											<td><?=$picture_question_result->option_a?></td>
											<td><?=$picture_question_result->option_b?></td>
											<td><?=$picture_question_result->option_c?></td>
											<td><?=$picture_question_result->option_d?></td>
											<td><?=$picture_question_result->marks?></td>
											<td><?=$picture_question_result->correct_answer?></td>
											<td>
												<a href="<?=base_url();?>delete/<?=$picture_question_result->id;?>/tbl_picture_question" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>
												<a href="<?=base_url();?>update_picture_question/<?=$picture_question_result->id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
											</td>
										</tr>
										<?php } } ?>
										
										
									</tbody>
								</table> 
								
								<hr>	
								<p>Tick Mark Question list</p>
								<hr>	
								<table id="example5" class="table table-striped table-bordered table-responsive dt-responsive nowrap" style="width:100%">
									<thead>
										<tr>
											<th>Sr.No</th> 
											<th>Paper Set</th>  
											<th>Question</th> 
											<th>Option A</th> 
											<th>Option B</th> 
											<th>Mark</th> 
											<th>Correct option</th> 
											<th>Action</th> 
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($tick_mark_question)){
											$i=1; 
											foreach ($tick_mark_question as $tick_mark_question_result){ ?>
										<tr>
											<td><?=$i++?></td>
											<td>	
											<?php if(($tick_mark_question_result->paper_set)== 1){
													$total_mark_a +=$tick_mark_question_result->marks;
													echo "A"; 
											} 
											if(($tick_mark_question_result->paper_set)== 2){ 
												$total_mark_b +=$tick_mark_question_result->marks;
												echo "B";
											} 
											if(($tick_mark_question_result->paper_set)== 3){
												$total_mark_c +=$tick_mark_question_result->marks;
												echo "C";
											} 
											if(($tick_mark_question_result->paper_set)== 4){
												$total_mark_d +=$tick_mark_question_result->marks;
												echo "D";
											} ?> 
											<td><?=$tick_mark_question_result->question?></td>
											<td><?=$tick_mark_question_result->option_a?></td>
											<td><?=$tick_mark_question_result->option_b?></td> 
											<td><?=$tick_mark_question_result->marks?></td>
											<td><?=$tick_mark_question_result->correct_answer?></td>
											<td>
												<a href="<?=base_url();?>delete/<?=$tick_mark_question_result->id;?>/tbl_tick_mark_question" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>
												<a href="<?=base_url();?>update_tick_mark_question/<?=$tick_mark_question_result->id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
											</td>
										</tr>
										<?php } } ?>   
									</tbody>
								</table> 
								
								
								<hr>	
								<p>Read Passage Question list</p>
								<hr>	
								<table id="example6" class="table table-striped table-bordered table-responsive dt-responsive nowrap" style="width:100%">
									<thead>
										<tr>
											<th>ID</th> 
											<th>Paper Set</th>  
											<th>Question</th> 
											<th>Option A</th> 
											<th>Option B</th> 
											<th>Option C</th> 
											<th>Option D</th> 
											<th>Mark</th> 
											<th>Correct option</th> 
											<th>Action</th> 
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($passage_question)){
										$i=1; 
										foreach ($passage_question as $passage_question_result){ ?>
									<tr>
										<td><?=$i++?></td> 
										 <?php if(($passage_question_result->paper_set)== 1){
												$total_mark_a +=$passage_question_result->marks;
											 ?>
										<td>A</td>
										 <?php } ?>
										 <?php if(($passage_question_result->paper_set)== 2){
												$total_mark_b +=$passage_question_result->marks;
										?>
										<td>B</td>
										 <?php } ?> 
										 <?php if(($passage_question_result->paper_set)== 3){
												$total_mark_c +=$passage_question_result->marks;
											?>
										<td>C</td>
										 <?php } ?>
										 <?php if(($passage_question_result->paper_set)== 4){
												$total_mark_d +=$passage_question_result->marks;
										?>
										<td>D</td>
										 <?php } ?> 
										<td><?=$passage_question_result->question?></td>
										<td><?=$passage_question_result->option_a?></td>
										<td><?=$passage_question_result->option_b?></td>
										<td><?=$passage_question_result->option_c?></td>
										<td><?=$passage_question_result->option_d?></td>
										<td><?=$passage_question_result->marks?></td>
										<td><?=$passage_question_result->correct_answer?></td>
										<td>
											<a href="<?=base_url();?>delete/<?=$passage_question_result->id;?>/tbl_passage_reading_question" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>
											<a href="<?=base_url();?>update_passage_reading_question/<?=$passage_question_result->id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
										</td>
									</tr>
									<?php }} ?>
										
									</tbody>
								</table> 
								
								
								<hr>	
								<p>Match the Following Question list</p>
								<hr>	
								<table id="example7" class="table table-striped table-bordered table-responsive dt-responsive nowrap" style="width:100%">
									<thead>
										<tr>
											<th>ID</th> 
											<th>Paper Set</th> 
											<th>Main Question</th> 
											<th>Question A</th> 
											<th>Answer A</th> 
											<th>Question B</th> 
											<th>Answer B</th> 
											<th>Question C</th> 
											<th>Answer C</th> 
											<th>Question D</th> 
											<th>Answer D</th> 
											<th>Question E</th> 
											<th>Answer E</th> 
											<th>Mark</th> 
											<th>Action</th> 
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($match_question)){
										$i=1; 
										foreach ($match_question as $match_question_result){ ?>
									<tr>
										<td><?=$i++?></td> 
										 <?php if(($match_question_result->paper_set)== 1){
												$total_mark_a +=$match_question_result->marks;
											?>
										<td>A</td>
										 <?php } ?>
										 <?php if(($match_question_result->paper_set)== 2){
											 $total_mark_b +=$match_question_result->marks;
										?>
										<td>B</td>
										 <?php } ?> 
										 <?php if(($match_question_result->paper_set)== 3){
											 $total_mark_c +=$match_question_result->marks;
										?>
										<td>C</td>
										 <?php } ?>
										 <?php if(($match_question_result->paper_set)== 4){
											 $total_mark_d +=$match_question_result->marks;
										?>
										<td>D</td>
										 <?php } ?> 
										<td><?=$match_question_result->question?></td>
										<td><?=$match_question_result->question_a?></td>
										<td><?=$match_question_result->answer_a?></td>
										<td><?=$match_question_result->question_b?></td>
										<td><?=$match_question_result->answer_b?></td>
										<td><?=$match_question_result->question_c?></td>
										<td><?=$match_question_result->answer_c?></td>
										<td><?=$match_question_result->question_d?></td>
										<td><?=$match_question_result->answer_d?></td>
										<td><?=$match_question_result->question_e?></td>
										<td><?=$match_question_result->answer_e?></td>
										<td><?=$match_question_result->marks?></td>
										<td>
											<a href="<?=base_url();?>delete/<?=$match_question_result->id;?>/tbl_match_the_following" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>
											<a href="<?=base_url();?>update_match_the_following_question/<?=$match_question_result->id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
										</td>
									</tr>
									<?php }} ?>
										
									</tbody>
								</table> 
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	 
<?php include("footer.php"); ?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/handsontable/8.3.2/handsontable.full.min.js"></script>
 

<script>
$("#set_total_added_marks").html('[A-<?=$total_mark_a?>][B-<?=$total_mark_b?>][C-<?=$total_mark_c?>][D-<?=$total_mark_d?>]');
    $(document).ready(function () {
        $('#example').dataTable({
			"responsive":true,
		});
        $('#example2').dataTable({
			"responsive":true,
		});
		$('#example3').dataTable({
			"responsive":true,
		});
		$('#example4').dataTable({
			"responsive":true,
		});
		$('#example5').dataTable({
			"responsive":true,
		});
		$('#example6').dataTable({
			"responsive":true,
		});
		$('#example7').dataTable({
			"responsive":true,
		});
    });
   

</script>

    
