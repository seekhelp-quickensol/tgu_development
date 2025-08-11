<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
              	<div class="card-title">
              		Activate / Deactivate results
              	</div>	
              	<a onclick="return confirm('Are you sure ?')" href="<?=base_url('activate_all_separate_student_results');?>" class="btn btn-danger">Activate all results</a>
              	<a onclick="return confirm('Are you sure ?')" href="<?=base_url('deactivate_all_separate_student_results');?>" class="btn btn-primary">Deactivate all results</a>

              	</div>
                <div class="card-body">
                  <h4 class="card-title">Search Result</h4>
                  <p class="card-description">
                    Please enter search details
                  </p>
					<form method="post" name="search_form" id="search_form">
					<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Examination</label>
						<select name="month" id="month" class="form-control">
							<option value="">Select Month</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Year</label>
						<select name="year" id="year" class="form-control">
							<option value="">Select Year</option>
							<?php for($year=2024;$year <= date("Y");$year++){?>
							<option value="<?=$year?>"><?=$year?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Course</label>
						<select name="course" id="course" class="form-control">
							<option value="">Select Course</option>
							<?php if(!empty($course)){ foreach($course as $course_result){?>
							<option value="<?=$course_result->id?>"><?=$course_result->course_name?></option>
							<?php }}?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Stream</label>
						<select name="stream" id="stream" class="form-control">
							<option value="">Select Stream</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Enrollment</label>
						<input type="text" name="enrollment" id="enrollment" class="form-control">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Result Status</label>
						<select name="result_status" id="result_status" class="form-control">
							<option value="">Select</option>
							<option value="0">Inactive</option>
							<option value="1">Active</option> 
						</select>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
						<label>Result</label>
						<select name="result" id="result" class="form-control">
							<option value="">Select</option>
							<option value="0">Pass</option>
							<option value="2">Re-Appear</option>
							<option value="1">Fail</option>
							<option value="3">Absent</option>
						</select>
					</div>
				</div>
				 
				<div class="col-md-12">
					<div class="form-group">
						<input type="submit" name="search" id="search" class="btn btn-primary btn-sm" value="Search">
					</div>
				</div>
				</div>
			</form>
                </div>
              </div>
            </div>
					<?php	
		if($this->input->post('search') == "Search"){ ?>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<div class="row col-md-12">
			<div class="col-md-12" style="margin:10px 0px;">
				<!--<a class="btn btn-primary btn-sm pull-right" href="#" id="btnExport" onclick="return exportexcel();">Export</a>-->
			</div>
			<div id="dvData"> 
				<?php if(!empty($exam_setup)){?>
				<form method="post" id="activate_marksheet"> 
				<input type="submit" name="activate_separate_marksheet_bulk" value="Activate Marksheet" class="btn btn-primary">
                <table id="mytable" class="resultTable table table-striped table-bordered dt-responsive nowrap" cellpadding="5">
				<thead>
						<tr>
						  <td class="heading"><input type="checkbox" class="checkall" name="checkall" id="checkAll"><br>Examination</td>
						  <td class="heading">Student Name</td>
						  <td class="heading">Enrollment number</td>
						  <td class="heading">Course</td>
						  <td class="heading">Stream</td>
						  <td class="heading">Year/Sem</td>
						  <td class="heading">Internal</td>
						  <td class="heading">External</td>
						  <td class="heading">Result</td>
						  <td colspan="3" class="heading">Exam Type</td>
						  <td class="heading">Status</td>
						  <td class="heading">Actions</td>
						</tr>
					</thead>
					<tbody>
					<?php	
					$marksheetGenerated =0;
					if(!empty($result)){
						$i=0;
						foreach($result as $result_arr){
							//$marksheetGenerated = $this->mics_model->get_marksheet_status($result_arr->result_id);
							//$student = $this->mics_model->get_student_name($result_arr->enrollment_number);
							if($result_arr->course_mode == 1){
								$ys=$result_arr->year_sem." Year";
							}else{
								$ys=$result_arr->year_sem." Sem";
							}
							if($result_arr->result == 0){
								$res="Pass";
							}else if($result_arr->result == 2){
								$res="Re-Appear";
							}else if($result_arr->result == 1){
								$res="Fail";
							}else{
								$res="Absent";
							}
							if($result_arr->status == 0){
								$sta="Inactive";
							}else if($result_arr->status == 1){
								$sta="Active";
							} 
							if($i%2==0){
								$resultClass="result";
							}else{
								$resultClass="result1";
							}
							  
						?>
							<tr>
								<td><input type="checkbox" name="resukt_id[]" value="<?=$result_arr->id?>"><?=$result_arr->examination_month."-".$result_arr->examination_year?></td>
                                <td><?php if(!empty($student)){ echo $student->student_name;}?></td>
                                <td><?=$result_arr->enrollment_number?></td>
                                <td><?=$result_arr->course_name?></td>
                                <td><?=$result_arr->stream_name?></td>
                                <td><?=$ys?></td>
                                <td><?=$result_arr->internal_marks_obtained?></td>                             
                                <td><?=$result_arr->external_marks_obtained?></td>                          
                                <td><?=$res?></td>
                                <td colspan="3"><?php if($result_arr->examination_status == '0'){ echo "Main Exam";}else{ echo "Re-Exam";}?></td>
                                <td><?=$sta?></td>
                                <td width="10%"> 
								<?php if($this->session->userdata("admin_id")!=15): ?>	 	
								<a href="<?=base_url();?>generate_separate_student_marksheet/<?=$result_arr->id.'/'.$result_arr->enrollment_number.'/'.$result_arr->year_sem?>" title="Generate Marksheet" target="_blank"><i class="mdi mdi-apps"></i></a>
									<?php endif; ?>
									 	<a href="<?=base_url();?>update_separate_student_result/<?=$result_arr->id?>" title="Edit Result"><i class="mdi mdi-table-edit"></i></a>
									 	<a href="<?=base_url();?>delete_separate_student_result/<?=$result_arr->id?>" onclick="return confirm('Are you sure to delete result?');" title="Delete Result"><i class="mdi mdi-delete"></i></a>
								</td>
							</tr>
							
							<tr class="<?=$resultClass?>" id="subrow<?=$i?>" style="display:none;">
								<td colspan="10">
										<tr>
											<td class="heading">Subject Code</td>
											<td class="heading" colspan="4">Subject Name</td>
											<td class="heading" colspan="2">Internal Max Marks</td>
											<td class="heading" colspan="2">Internal Marks</td> 
											<td class="heading" colspan="2">External Max Marks</td>
											<td class="heading" colspan="2">External Marks</td>
											<td class="heading" colspan="2">Result</td>
										</tr>
                                <?php 
								$subject = $this->Exam_model->get_selected_subject_for_saperate_student_result($result_arr->id);
                             
                              if(!empty($subject)){
								foreach($subject as $subject_result){
                                    if($subject_result->result == 0){
                                        $res1="Pass";
                                    }else if($subject_result->result == 1){
                                        $res1="Re-Appear";
                                    }else{
                                        $res1="Absent";
									}
							?>
                                 <tr>
                                     <td><?=$subject_result->subject_code?></td>
                                     <td colspan="4"><?=$subject_result->subject_name?></td>
                                     <td colspan="2"><?=$subject_result->internal_max_marks?></td>
                                     <td colspan="2"><?=$subject_result->internal_marks_obtained?></td>
                                     <td colspan="2"><?=$subject_result->external_max_marks?></td>
                                     <td colspan="2"><?=$subject_result->external_marks_obtained?></td>
                                     <td colspan="2"><?=$res1?></td>                            
                                 </tr>
							  <?php }}
                            
								  ?>
                                <tr>
									<td align="center" colspan="14">
										<?php if($result_arr->status == "1"){?>
										<a href="<?=base_url();?>inactivate_separate_student_results/<?=$result_arr->id?>" class="btnsml btn btn-primary btn-sm">Hide Result</a>&nbsp;
										<?php }else{?>
                                        <a href="<?=base_url();?>activate_separate_student_results/<?=$result_arr->id?>" class="btnsml btn btn-primary btn-sm">Show Result</a>&nbsp; 
										<?php }?>
									</td>
                                </tr>
                                
								  
                             
                           </td>
                   </tr>
						<tr><td style="border:none;" colspan="14">&nbsp;</td></tr>	
					<?php 
						$i++;
						}
					}?>
					</tbody>
				</table>
				</form>
				<?php }else{?>
					<div class="card">
						<div class="card-body">
							<div class="col-lg-12">
								<span class="error">Exam setup not found. Please add the exam setup first. <a href="<?=base_url();?>exam_setup" style="text-decoration:underline;">Add Now</a> </span>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
				</div>
                </div>
              </div>
            </div>
				<?php } ?>
          </div>
        </div>
      
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
<script type="text/javascript">   
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
}); 
$("#course").change(function(){  
	if($(this).val() == "23"){
		$("#payment_option").show();
	}else{
		$("#payment_option").hide();
	}
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
</script>     