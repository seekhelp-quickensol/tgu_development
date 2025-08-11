<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<form id="form_input" name="form_input" method="post" enctype="multipart/form-data">
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
							</form>
							<div class="ibox-content">
								<p>Test Paper fill in the blanks question list</p>
								<hr>
								<table id="example" class="table table-striped table-bordered table-responsive dt-responsive nowrap" style="width:100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>Course name</th>
											<th>Paper Set</th> 
											<th>Question</th> 
											<th>Options</th> 
											<th>Correct Answer</th> 
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
											<td>
											<?php if(($question_result->paper_set)== 1){ 
												echo "A";
											} 
											if(($question_result->paper_set)== 2){
												echo "B";
											} 
											if(($question_result->paper_set)== 3){
												echo "C";
											} 
											if(($question_result->paper_set)== 4){
												echo "D";
											}
											?>
											</td>
											<td><?=$question_result->question?></td>
											<td><?=$question_result->fill_blank_option?></td>
											<td><?=$question_result->correct_answer?></td>
											<td><?=$question_result->marks?></td>
										<td>
											<a href="<?=base_url();?>delete/<?=$question_result->id;?>/tbl_fill_in_blank_question" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>
											<a href="<?=base_url();?>update_fill_in_blank_question/<?=$question_result->id;?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
										</td>
										<?php }} ?>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	 
<?php include("footer.php"); ?>
<script>
    $(document).ready(function () {
       	$("td:contains('blank_space')").each(function(){
    		var replaced = $(this).html().replace(/blank_space/g, "____");
    		$(this).html(replaced);
       	});
        $('#example').dataTable({
                    "responsive":true,
                });
        $('#example_1').dataTable({
                    "responsive":true,
                });

});
   var filter = '<?=$this->input->post('course_name')?>'
    if((filter)){
	
	}else{
		 $(document).ready(function (){
		$.ajax({
	        type: "POST",
	        url: "<?=base_url();?>admin/Admin_controller/get_course_list_ajax",
	        data:{},
	        success: function(data){
	            $("#course_name").empty();
				$('#course_name').append('<option value="">Select Course</option>');
	            var opts = $.parseJSON(data);
	            $.each(opts, function(i, d) {
	               $('#course_name').append('<option value="' + d.id + '">' + d.course_name + '</option>');
	            });
	        },
			 error: function(jqXHR, textStatus, errorThrown) {
	           console.log(textStatus, errorThrown);
	        	}
	    	});
		});

	}
$('#collapseone').addClass('show');
$('#fill_blank').addClass('active');
</script>

    
