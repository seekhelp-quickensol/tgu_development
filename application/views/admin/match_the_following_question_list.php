<?php include("header.php");?>
	<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<form id="form_input" name="form_input" method="post" enctype="multipart/form-data" action="<?=base_url()?>filter_mcq">
								<div class="form-group col-md-4">
									<label for="">Select Course</label>
									<select id="course_name" name="course_name" class="form-control">
										<option value="">Select course</option>
										 <?php if(!empty($course)){ foreach($course as $course_result){?>
										<option value="<?=$course_result->id?>"><?=$course_result->course_name?></option>
										 <?php  }} ?> 
									</select>
								</div>
								<div class="form-group col-md-4">
									<span class="filter_course_btn">
										<input class="search_btn btn btn-primary" type="submit" id="save" name="save" value="Search">
										<input class="search_btn" type="hidden" id="" name="course" value="Search">
										<a href="<?=base_url()?>mcq_question_list">Refresh</a>
									</span>  
								</div>
							<hr>
					<p>Test Paper Match The Following Question list</p>
					<hr>
					<table id="example" class="table table-striped table-bordered table-responsive dt-responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Course name</th>
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
							<?php if(!empty($question)){
							    $i=1; 
								foreach ($question as $question_result){ ?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$question_result->course_name?></td>
								 <?php if(($question_result->paper_set)== 1){?>
								<td>A</td>
								 <?php } ?>
								 <?php if(($question_result->paper_set)== 2){?>
								<td>B</td>
								 <?php } ?> 
								 <?php if(($question_result->paper_set)== 3){?>
								<td>C</td>
								 <?php } ?>
								 <?php if(($question_result->paper_set)== 4){?>
								<td>D</td>
								 <?php } ?>
								<td><?=$question_result->question?></td>
								<td><?=$question_result->question_a?></td>
								<td><?=$question_result->answer_a?></td>
								<td><?=$question_result->question_b?></td>
								<td><?=$question_result->answer_b?></td>
								<td><?=$question_result->question_c?></td>
								<td><?=$question_result->answer_c?></td>
								<td><?=$question_result->question_d?></td>
								<td><?=$question_result->answer_d?></td>
								<td><?=$question_result->question_e?></td>
								<td><?=$question_result->answer_e?></td>
								<td><?=$question_result->marks?></td>
							<td>
								<a href="<?=base_url();?>delete/<?=$question_result->id;?>/tbl_match_the_following" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>
								<a href="<?=base_url();?>update_match_the_following_question/<?=$question_result->id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
							</td>
							<?php }} ?>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	 
<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/handsontable@10.2.0/dist/handsontable.full.min.js"></script>
<script>
$(document).ready(function () {
	$('#example').dataTable({
		"responsive":true,
	});        
}); 
	$('#collapseone').addClass('show');
$('#match_the_following').addClass('active');    
</script>

    
