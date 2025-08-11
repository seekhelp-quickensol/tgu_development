<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Created Exam Question Banks</h4>
                                <h5>
									<span><?=$exam->course_name;?></span>
									<span>/</span>
									<span><?=$exam->stream_name;?></span>
									<span>/</span>
									<span><?=$exam->year_sem;?></span>
									<span>/</span>
									<span><?=$exam->exam_name;?></span> 
									<span></span>  
								</h5>
							<form id="bank_form" method="get" enctype="multipart/form-data">
								<hr>
								<div class="row">
									<div class="form-group col-lg-3">
										<label class="col-form-label">Course Name<span style="color:red;">*</span></label>
										<select name="set" id="set" class="form-control" style="height:34px;">
                                            <option value="">Select Paper Set</option>
                                            <option value="1" <?php if(isset($_GET['set']) && $_GET['set'] == '1'){?> selected="selected"<?php } ?>>A</option>
                                            <option value="2" <?php if(isset($_GET['set']) && $_GET['set'] == '2'){?> selected="selected"<?php } ?>>B</option>
                                            <option value="3" <?php if(isset($_GET['set']) && $_GET['set'] == '3'){?> selected="selected"<?php } ?>>C</option>
                                            <option value="4" <?php if(isset($_GET['set']) && $_GET['set'] == '4'){?> selected="selected"<?php } ?>>D</option>
                                        </select>
									</div>	
                                    <div class="form-group col-lg-3" id="div_question_type" >
                                        <label class="col-form-label">Select Question Type<span style="color:red;">*</span></label>
                                        <select name="type" id="type" class="form-control" style="height:34px;">
                                            <option value="">Select Question Type</option>
                                            <option value="1" <?php if(isset($_GET['type']) && $_GET['type'] == '1'){?> selected="selected"<?php } ?>>MCQ</option>
                                        <?php /*	<option value="2">Fill In The Blanks</option>
                                            <!--<option value="3">One Word</option>-->
                                            <option value="5">TICK MARK</option>
                                            <option value="8">Match The Following</option>*/?>
                                            <option value="4" <?php if(isset($_GET['type']) && $_GET['type'] == '4'){?> selected="selected"<?php } ?>>Picture</option>
                                            <option value="6" <?php if(isset($_GET['type']) && $_GET['type'] == '6'){?> selected="selected"<?php } ?>>Passage Reading</option> 
                                            
                                        </select>
                                    </div>
									<div class="form-group col-lg-3">
								        <button class="btn btn-sm btn-success submit-btn" type="submit" style="margin-top:60px; float:center;">Submit</button>
									</div>			 
								</div> 
							</div>	
						</form>
					</div>
				</div>
                <?php 
                    if(isset($_GET['set']) && isset($_GET['type'])){ 
                        if($_GET['set'] == '1'){
                            $set_name = "A";
                        }else if($_GET['set'] == '2'){
                            $set_name = "B";
                        }else if($_GET['set'] == '3'){
                            $set_name = "C";
                        }else if($_GET['set'] == '4'){
                            $set_name = "D";
                        }else{
                            $set_name = "";
                        }
                        if($_GET['type'] == '1'){
                            $type = "MCQ";
                        }else if($_GET['type'] == '4'){
                            $type = "Picture";
                        }else if($_GET['type'] == '6'){
                            $type = "Passage Reading";
                        }else{
                            $type = "";
                        }
                        if($_GET['type'] == '1'){
                        $paper_set_questions = $this->Online_model->get_paper_set_questions();
                                if(!empty($paper_set_questions)){
                ?>
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Exam Set: <?=$set_name;?></h5>
							<h5 class="card-title">Question Type: <?=$type;?></h5>
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Question</th>
                                        <th>Opt A</th>
                                        <th>Opt B</th>
                                        <th>Opt C</th>
                                        <th>Opt D</th>
                                        <th>Correct Opt</th>
                                        <th>Marks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $i=1;
                                    foreach($paper_set_questions as $paper_set_questions_result){
                                ?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=$paper_set_questions_result->question;?></td>
                                    <td><?=$paper_set_questions_result->option_a;?></td>
                                    <td><?=$paper_set_questions_result->option_b;?></td>
                                    <td><?=$paper_set_questions_result->option_c;?></td>
                                    <td><?=$paper_set_questions_result->option_d;?></td>
                                    <td><?=$paper_set_questions_result->correct_answer;?></td>
                                    <td><?=$paper_set_questions_result->marks;?></td>
                                    <td>
                                        <a data-toggle="tooltip" title="Edit" href="<?=base_url();?>edit-question/<?=$paper_set_questions_result->id;?>" class="btn btn-success btn-sm"><i class="mdi mdi-table-edit"></i></a>   
                                        <a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle="tooltip" title="Permanently Delete" href="<?=base_url();?>delete/<?=$paper_set_questions_result->id;?>/tbl_mcq_question" class="btn btn-danger btn-sm delete_class"><i class="mdi mdi-delete"></i></a>   
                                        <?php if($paper_set_questions_result->status == '1'){?>
                                            <a onclick="return confirm('Are you sure, you want to deactivate this record?')" data-toggle="tooltip" title="Deactivate" href="<?=base_url();?>inactive/<?=$paper_set_questions_result->id;?>/tbl_mcq_question" class="btn btn-success btn-sm inactivate_clas"><i class="mdi mdi-bookmark-check"></i></a>   
                                        <?php }else{?>
                                            <a onclick="return confirm('Are you sure, you want to activate this record?')" data-toggle="tooltip" title="Activate" href="<?=base_url();?>active/<?=$paper_set_questions_result->id;?>/tbl_mcq_question" class="btn btn-danger btn-sm activate_clas"><i class="mdi mdi-playlist-remove"></i></a>   
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tbody>
                                </tbody>
                            </table>
					    </div>
				    </div>
			    </div>
            <?php }else{ ?>
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Questions not set yet.</h5>
					    </div>
				    </div>
			    </div>
            <?php 
                }}elseif($_GET['type'] == '4'){
                    $paper_set_questions = $this->Online_model->get_paper_set_questions(); 
                    if(!empty($paper_set_questions)){
            ?>
                <div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Exam Set: <?=$set_name;?></h5>
							<h5 class="card-title">Question Type: <?=$type;?></h5>
                            <?php
                                $j=1;
                                foreach($paper_set_questions as $paper_set_questions_result){
                                    $single_picture_questions = $this->Online_model->get_single_picture_questions($paper_set_questions_result->id);
                            ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h5 class="card-title"><?=$j++;?>] Description: <?=$paper_set_questions_result->question_description;?></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <h5 class="card-title">Images:</h5>
                                        <?php 
                                            $name = explode(',',$paper_set_questions_result->question_image);
                                            for($i=0;$i<count($name)-1;$i++){
                                            $files_path = $this->Digitalocean_model->get_photo('uploads/question_image/'.$name[$i]);
                                        ?>
                                            <a class="btn btn-primary" href="<?=$files_path;?>" target="_blank" style="margin-bottom:20px;">View</a>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <a style="float:right;" data-toggle="tooltip" title="Edit" href="<?=base_url();?>edit-picture-question/<?=$paper_set_questions_result->id;?>" class="btn btn-success btn-sm"><i class="mdi mdi-table-edit"></i></a>   
                                    </div>
                                </div>
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Question</th>
                                        <th>Opt A</th>
                                        <th>Opt B</th>
                                        <th>Opt C</th>
                                        <th>Opt D</th>
                                        <th>Correct Opt</th>
                                        <th>Marks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i=1;
                                        if(!empty($single_picture_questions)){
                                            foreach($single_picture_questions as $single_picture_questions_result){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$single_picture_questions_result->question;?></td>
                                        <td><?=$single_picture_questions_result->option_a;?></td>
                                        <td><?=$single_picture_questions_result->option_b;?></td>
                                        <td><?=$single_picture_questions_result->option_c;?></td>
                                        <td><?=$single_picture_questions_result->option_d;?></td>
                                        <td><?=$single_picture_questions_result->correct_answer;?></td>
                                        <td><?=$single_picture_questions_result->marks;?></td>
                                        <td>
                                            <a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle="tooltip" title="Permanently Delete" href="<?=base_url();?>delete/<?=$single_picture_questions_result->id;?>/tbl_picture_question" class="btn btn-danger btn-sm delete_class"><i class="mdi mdi-delete"></i></a>   
                                            <?php if($single_picture_questions_result->status == '1'){?>
                                                <a onclick="return confirm('Are you sure, you want to deactivate this record?')" data-toggle="tooltip" title="Deactivate" href="<?=base_url();?>inactive/<?=$single_picture_questions_result->id;?>/tbl_picture_question" class="btn btn-success btn-sm inactivate_clas"><i class="mdi mdi-bookmark-check"></i></a>   
                                            <?php }else{?>
                                                <a onclick="return confirm('Are you sure, you want to activate this record?')" data-toggle="tooltip" title="Activate" href="<?=base_url();?>active/<?=$single_picture_questions_result->id;?>/tbl_picture_question" class="btn btn-danger btn-sm activate_clas"><i class="mdi mdi-playlist-remove"></i></a>   
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
					    </div>
                            <?php } ?>
					    </div>
				    </div>
			    </div>
            <?php }else{?>
                <div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Questions not set yet.</h5>
					    </div>
				    </div>
			    </div>
            <?php }}elseif($_GET['type'] == '6'){ 
                    $paper_set_questions = $this->Online_model->get_paper_set_questions(); 
                    if(!empty($paper_set_questions)){
            ?>
                <div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Exam Set: <?=$set_name;?></h5>
							<h5 class="card-title">Question Type: <?=$type;?></h5>
                            <?php
                                $j=1;
                                foreach($paper_set_questions as $paper_set_questions_result){
                                    $single_passage_questions = $this->Online_model->get_single_passage_questions($paper_set_questions_result->id);
                            ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-11">
                                        <span><b><?=$j++;?>]</b> <?=$paper_set_questions_result->passage;?></span>
                                    </div>
                                    <div class="col-lg-1">
                                        <a style="float:right;" data-toggle="tooltip" title="Edit" href="<?=base_url();?>edit-passage-question/<?=$paper_set_questions_result->id;?>" class="btn btn-success btn-sm"><i class="mdi mdi-table-edit"></i></a>   
                                    </div>
                                </div>
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Question</th>
                                        <th>Opt A</th>
                                        <th>Opt B</th>
                                        <th>Opt C</th>
                                        <th>Opt D</th>
                                        <th>Correct Opt</th>
                                        <th>Marks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        $i=1;
                                        if(!empty($single_passage_questions)){
                                            foreach($single_passage_questions as $single_passage_questions_result){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$single_passage_questions_result->question;?></td>
                                        <td><?=$single_passage_questions_result->option_a;?></td>
                                        <td><?=$single_passage_questions_result->option_b;?></td>
                                        <td><?=$single_passage_questions_result->option_c;?></td>
                                        <td><?=$single_passage_questions_result->option_d;?></td>
                                        <td><?=$single_passage_questions_result->correct_answer;?></td>
                                        <td><?=$single_passage_questions_result->marks;?></td>
                                        <td>
                                            <a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle="tooltip" title="Permanently Delete" href="<?=base_url();?>delete/<?=$single_passage_questions_result->id;?>/tbl_passage_reading_question" class="btn btn-danger btn-sm delete_class"><i class="mdi mdi-delete"></i></a>   
                                            <?php if($single_passage_questions_result->status == '1'){?>
                                                <a onclick="return confirm('Are you sure, you want to deactivate this record?')" data-toggle="tooltip" title="Deactivate" href="<?=base_url();?>inactive/<?=$single_passage_questions_result->id;?>/tbl_passage_reading_question" class="btn btn-success btn-sm inactivate_clas"><i class="mdi mdi-bookmark-check"></i></a>   
                                            <?php }else{?>
                                                <a onclick="return confirm('Are you sure, you want to activate this record?')" data-toggle="tooltip" title="Activate" href="<?=base_url();?>active/<?=$single_passage_questions_result->id;?>/tbl_passage_reading_question" class="btn btn-danger btn-sm activate_clas"><i class="mdi mdi-playlist-remove"></i></a>   
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
					        </div>
                            <?php } ?>
					    </div>
				    </div>
			    </div>
            <?php }else{?>
                <div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Questions not set yet.</h5>
					    </div>
				    </div>
			    </div>
            <?php }}} ?>
		</div>
	</div>
</div>
</div>
      
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
    $id = $this->uri->segment(2);
}
?>
<script> 
$(document).ready(function(){
	$("#bank_form").validate({
		rules:{
			set:{
				required:true,
			},
			type:{
				required:true,
			},
		},
		messages:{
			set:{
				required:"Please select paper set",
			},
			type:{
				required:"Please select question type",
			},
		}, 
		errorPlacement: function(error, element) {
			  if (element.hasClass('select2-hidden-accessible')) {
				error.insertAfter(element.next('.select2-container').find('.select2-selection__rendered'));
			  } else {
				error.insertAfter(element);
			  }
			}
		});
}); 
</script>
<script>
$(document).ready(function() { 
    var urlParams = new URLSearchParams(window.location.search);
    var type = urlParams.get('type');
    var paper_set_questions = <?php echo json_encode($this->Online_model->get_paper_set_questions()); ?>;
    if(type){
        if(type != '1'){
            for($i=0;$i<paper_set_questions.length;$i++){
                $('#example_'.paper_set_questions[$i]).DataTable({
                    extend: "excelHtml5",
                    "ordering": false 
                });
            }
        }
    }
   else{
        $('#example').DataTable({
            extend: "excelHtml5",
            "ordering": false 
        });
    }
    
});
</script>
 