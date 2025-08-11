<?php
// echo "<pre>";print_r($exams);exit;
include('header.php');?>
<style>
@page {
	size: A4;
	margin: 0;
	border:1px solid #000;
	height: 100%
}
</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Consolidate Marksheet Application</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
								<div class="col-lg-12" style="display:block;">
									<form onsubmit="return checkSubject();" class="form-horizontal" name="transcript_form" id="transcript_form" method="post">
									<input type="hidden" name="student_id" value="<?=$this->session->userdata("student_id")?>">
										<?php if(!empty($exams)){ foreach($exams as $exams_result){
											$subjects = $this->Front_model->get_subject_for_consolidate($exams_result->id);
										?>
										
											<div class="block">
											<?php if(!empty($subjects)){ foreach($subjects as $subjects_result){?>
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-2">
															<label class="control-label" for="message">Sem/Year</label>
															<input type="text" readonly class="form-control" id="sem1" name="sem[]" value="<?=$exams_result->year_sem?>" readonly> 
														</div>
														<div class="col-md-4">
															<label class="control-label" for="message">Subject Name</label>
															<input type="text" class="form-control" id="subject1" name="subject[]" placeholder="Type only one Subject in one box" value="<?=$subjects_result->subject_name?>" readonly>
															<input type="hidden" class="form-control" id="subject1" name="subject_code[]" placeholder="Type only one Subject in one box" value="<?=$subjects_result->subject_code?>" readonly>
															<input type="hidden" class="form-control" id="credit" name="credit[]" placeholder="Type only one Subject in one box" value="<?=$subjects_result->credit?>" readonly>
														</div> 
														<div class="col-md-2">
															<label class="control-label" for="message">Type</label>
															<input type="text" class="form-control" id="type1" name="type[]" readonly value="<?php if($subjects_result->subject_type == "0"){ echo "Theory";}else{ echo "Practical";}?>"> 
														 </div> 
														<div class="col-md-2"> 
															<label class="control-label" for="message">Max Marks</label>
															<input type="text" class="form-control" id="max_mark1" name="max_mark[]" placeholder="Max Mark" value="<?=$subjects_result->internal_max_marks+$subjects_result->external_max_marks?>" readonly>
															<input type="hidden" class="form-control" id="max_mark1" name="internal_mark[]" placeholder="Max Mark" value="<?=$subjects_result->internal_marks_obtained?>" readonly>
															<input type="hidden" class="form-control" id="max_mark1" name="external_mark[]" placeholder="Max Mark" value="<?=$subjects_result->external_marks_obtained?>" readonly>
														</div> 
														<div class="col-md-2"> 
															<label class="control-label" for="message">Marks Obtained</label>
															<input type="text" class="form-control" id="obtained1" name="obtained[]" placeholder="Marks Obtained" value="<?=$subjects_result->internal_marks_obtained+$subjects_result->external_marks_obtained?>" readonly>
															<?php 
																$total_earn = $subjects_result->internal_marks_obtained+$subjects_result->external_marks_obtained;
																$grade ="F";
																if($total_earn >= 90){
																	$grade ="A+"; 
																}else if($total_earn >= 80 && $total_earn < 90){
																	$grade ="A"; 
																}else if($total_earn >= 70 && $total_earn < 80){
																	$grade ="B+"; 
																}else if($total_earn >= 60 && $total_earn < 70){
																	$grade ="B"; 
																}else if($total_earn >= 50 && $total_earn < 60){
																	$grade ="C"; 
																}else if($total_earn >= 45 && $total_earn < 50){
																	$grade ="D"; 
																}else if($total_earn >= 40 && $total_earn < 45){
																	$grade ="E"; 
																}else if($total_earn < 40){
																	$grade ="F"; 
															}?>
															<input type="hidden" class="form-control" id="grade" name="grade[]" value="<?=$grade?>" readonly>
														</div> 
													</div>
												</div> 
										<?php }}?>
											</div> 
										<?php }?>
										<div class="box_layer_t" style="margin-top:5px"> 
											<button type="submit" class="btn btn-success">Submit & Pay</button>   
										</div>
										<?php }else{?>
										    <p>Sorry! You are not eligible to apply consolidate now</p>
										<?php }?>
									</div>  
								</form> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
</div> 
<?php include('footer.php');?>
<script>  
</script>
 