<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<div class="row col-md-12">
			<div class="col-md-12" style="margin:10px 0px;">
				<!--<a class="btn btn-primary btn-sm pull-right" href="#" id="btnExport" onclick="return exportexcel();">Export</a>-->
			</div>
			<div id="dvData" class="table-responsive"> 
                <table id="mytable" class="resultTable table table-striped table-bordered dt-responsive nowrap table-responsive" cellpadding="5" style="width:100%;">
				<thead>
						<tr>
						  <td class="heading">Examination</td>
						  <td class="heading">Student Name</td>
						  <td class="heading">Enrollment number</td>
						  <td class="heading">Course</td>
						  <td class="heading">Stream</td>
						  <td class="heading">Year/Sem</td>
						  <td class="heading">Internal</td>
						  <td class="heading">External</td>
						  <td class="heading">Result</td>
						  <td colspan="3" class="heading">Exam Type</td>
						  <td class="heading">Result Status</td>
						</tr>
					</thead>
					<tbody>
					<?php	
					$marksheetGenerated =0;
					if(!empty($result)){
						
						$i=0;
						foreach($result as $result_arr){ 
							if($result_arr->course_mode == 1){
								$ys=$result_arr->year_sem." Year";
							}else if($result_arr->course_mode == 2){
								$ys=$result_arr->year_sem." Sem";
							}else if($result_arr->course_mode == 3){
								$ys=$result_arr->year_sem." Both";
							}else{
								$ys=$result_arr->year_sem." Month";
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
								<td><?=$result_arr->examination_month."-".$result_arr->examination_year?></td>
                                <!-- <td><?php if(!empty($student)){ echo $student->student_name;}?></td> -->
                                <td><?=$result_arr->student_name?></td>
                                <td><?=$result_arr->enrollment_number?></td>
                                <td><?=$result_arr->course_name?></td>
                                <td><?=$result_arr->stream_name?></td>
                                <td><?=$ys?></td>
                                <td><?=$result_arr->internal_marks_obtained?></td>                             
                                <td><?=$result_arr->external_marks_obtained?></td>                          
                                <td><?=$res?></td>
                                <td colspan="3"><?php if($result_arr->examination_status == '0'){ echo "Main Exam";}else{ echo "Re-Exam";}?></td>
                                <td><?=$sta?></td>
                               
							</tr>
							
							<tr class="<?=$resultClass?>" id="subrow<?=$i?>" style="display:none;">
								<td colspan="10">
										<tr>
											<td class="heading">Subject Code</td>
											<td class="heading" colspan="3">Subject Name</td>
											<td class="heading" colspan="2">Internal Max Marks</td>
											<td class="heading" colspan="2">Internal Marks</td> 
											<td class="heading" colspan="2">External Max Marks</td>
											<td class="heading" colspan="2">External Marks</td>
											<td class="heading" colspan="2">Result</td>
										</tr>
                                <?php 
								$subject = $this->Center_details_model->get_selected_subject_for_result($result_arr->id);
                             
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
                                     <td colspan="3"><?=$subject_result->subject_name?></td>
                                     <td colspan="2"><?=$subject_result->internal_max_marks?></td>
                                     <td colspan="2"><?=$subject_result->internal_marks_obtained?></td>
                                     <td colspan="2"><?=$subject_result->external_max_marks?></td>
                                     <td colspan="2"><?=$subject_result->external_marks_obtained?></td>
                                     <td colspan="2"><?=$res1?></td>                            
                                 </tr>
							  <?php }}
                            
								  ?>
                              
								  
                             
                           </td>
                   </tr>
						<tr><td style="border:none;" colspan="14">&nbsp;</td></tr>	
					<?php 
						$i++;
						}
					}?>
					</tbody>
				</table>
		</div>
	</div>
					    
			
                </div>
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
<script type="text/javascript">   
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
