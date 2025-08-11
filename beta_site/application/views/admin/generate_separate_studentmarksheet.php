<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="col-md-12">
					<div class="row">
						<div class="col-md-6">	
							<div class="form-group">
								Enrollment Number
								<input readonly="readonly" type="text" class="form-control" name="enrollment_number" id="enrollment_number" placeholder="Enrollment Number" value="<?=$this->uri->segment(3)?>">
							</div>
						</div>
						<div class="col-md-6">	
							<div class="form-group">
								Sem/Year
								<select class="form-control" name="year_Sem" id="year_Sem">
									<option value="<?=$this->uri->segment(4)?>" selected="selected"><?=$this->uri->segment(4)?></option>
								</select>
							</div>
						</div>
					</div>
				</div>
                <div class="row">
					<?php 
						$courseName=$streamName="";
						$yearSem=$this->uri->segment(4);
						$enrollNo=$this->uri->segment(3);
						$totalRecordCount=0;
						$i=1;
						$totalIMM=0;
						$totalIMO=0;
						$totalEMM=0;
						$totalEMO=0;
						$totalResult="";
						$result2="";
						$values="";
						$resultId=0;
						$decDate="";
						$issueDate="";
						if(!empty($course_stream)){
					?>
						<table width="950" align="center" class="table table-condensed table-bordered"   cellpadding="5">
				<tr>
					<td>&nbsp;<br/></td>
				</tr>
                <?php 
                    $courseName = "";
                    $streamName = "";
                    $yearSem = "";
					if(!empty($course_stream)){						
						$courseName = $course_stream->course_name;
						$streamName = $course_stream->stream_name;
						$yearSem = $course_stream->year_sem;
					}
					$result = array();
					$marksheet_status = array();
					$totalResult = "";
					if(!empty($single_result)){
						$resultId = $single_result->id;
						if($single_result->result == 0){
							$totalResult="Pass";
						}else if($single_result->result ==1){
							$totalResult="Fail";
						}else if($single_result->result ==2){
							$totalResult="Reappear";
						}else{
							$totalResult="Absent";
						}
						$result = $this->Separate_student_model->get_selected_subject_for_result($single_result->id);
						$marksheet_status = $this->Separate_student_model->get_marksheet_status_by_result($single_result->id);
						$exam_setup = $this->Separate_student_model->get_exam_setup_blended($single_result->examination_month,$single_result->examination_year);
					}
					$issue_date = "01-11-2021";
					if($single_result->examination_month == 'May' && $single_result->examination_year == '2021'){
						$issue_date="01-11-2021";
					}/*else if($result_arr->examination_month =='December' && $result_arr->examination_year =='2012'){
						$issue_date="14-03-2013";
					}*/	
						  
                          
                        if(!empty($marksheet_status)){
                            $status="";
                            if($marksheet_status->marksheet_status ==0){
                                $status="Original";
                            }else if($marksheet_status->marksheet_status ==1){
                                $status="Duplicate";
                            }else{
                                $status="Cancelled";
							}
                            ?>    
                            <tr class="result2">
								<td colspan=8>
                                    <table width='80%' class="table table-condensed table-bordered" align=center>
										<tr>
											<td bgcolor="#62c0ff">Marksheet No</td>
											<td bgcolor="#62c0ff" class="data"><?=$marksheet_status->marksheet_number?></td>
											<td bgcolor="#62c0ff" >Issue Date</td>
											<td bgcolor="#62c0ff" class="data"><?=date("d-m-Y",strtotime($marksheet_status->marksheet_issue_date))?></td>
											<td bgcolor="#62c0ff">Marksheet Status</td>
											<td bgcolor="#62c0ff" class="data"><?=$status?></td>
										</tr>
									</table>
								</td>
							</tr>
                          <?php }else{
                          	$result_date = "01-11-2021";
                          	$marksheet_date = "01-11-2021";
                          	if($single_result->examination_month == "August" && $single_result->examination_year == "2021"){
                          		$result_date = "01-11-2021";
                          		$marksheet_date = "01-11-2021";
                          	}else if($single_result->examination_month == "January" && $single_result->examination_year == "2022"){
                          		$result_date = "14-03-2022";
                          		$marksheet_date = "14-03-2022";
                          	}else if($single_result->examination_month == "July" && $single_result->examination_year == "2022"){
                          		$result_date = "25-08-2022";
                          		$marksheet_date = "25-08-2022";
                          	}else if($single_result->examination_month == "January" && $single_result->examination_year == "2023"){
                          		$result_date = "10-04-2023";
                          		$marksheet_date = "10-04-2023";
                          	}else if($single_result->examination_month == "July" && $single_result->examination_year == "2023"){
                          		$result_date = "25-07-2023";
                          		$marksheet_date = "25-07-2023";
                          	}
                          	?> 
                                <tr class="result2">
									<td colspan="8">
										<form name="actionform" id="actionform" onsubmit="return validation()" method="post">
											<table width="95%" align="center" class="table table-condensed table-bordered">
                                             <tr>
												<td align="center" colspan=8><?=$courseName."-".$streamName."-".$yearSem?></td>
											</tr>
                                        <tr> 
                                          <td>Status</td>
										<td>
											<select name="marksheet_status" id="marksheet_status" class="">
                                               <option value="">Select</option>
                                               <option value="0" selected>Original</option>
                                               <option value="1">Duplicate</option>                      
                                               <option value="2">Cancelled</option>
                                           </select>
										</td>
                                        <td>Result Date</td>
										<td><input type="text" name="result_declare_date" id="result_declare_date" class="" value="<?=$result_date?>"/></td>                                              
                                        <td>Print Stream</td>
										<td>
											<select name="print_stream" id="print_stream" class="">
                                              <option value="">Select</option>
                                              <option value="1">Yes</option>
                                              <option value="0" selected="selected">No</option>                              
                                            </select>
											<label style="display:none;" for="print_stream" generated="true" class="error">Please select print stream</label>
										</td>
										<td>Marksheet No</td><td>
										    <input type="text" name="marksheet_number" id="marksheet_number" class="" maxlength="8" readonly />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Final Year Marksheet</td>
										<td>
											<select name="final_status" id="final_status" class="">
                                               <option value="">Select</option> 
                                               <option value="1">Yes</option>
                                               <option value="0" selected="selected">No</option>                              
                                             </select>
										</td>
                                        <td>Issue Date</td>
										<td>
											<input type="text" name="marksheet_issue_date" id="marksheet_issue_date"  class="" maxlength="10" value="<?=$marksheet_date?>">
										</td>                                              
                                        <td>Mode</td><td>
											<select name="display_mode" id="display_mode" class="">
												<option value="">Select Mode</option>
												<option value="1" <?php if($course_stream->course_mode == "1"){?>selected="selected"<?php }?>>Year</option>
												<option value="2" <?php if($course_stream->course_mode == "2"){?>selected="selected"<?php }?>>Semester</option>
											</select>
                                        </td>
                                        <td>Year/Sem</td>
										<td>
											<select name="year_sem" id="year_sem" class="">
                                               <option value="">Select</option> 
											   <?php for($y=1;$y<=12;$y++){?>
                                               <option value="<?=$y?>" <?php if($this->uri->segment(4) == $y){ ?>selected="selected"<?php }?>><?=$y?></option>
											   <?php }?>                            
                                             </select>
										</td>
                                    </tr>
									<tr>
                                        <td>Credit Transfer</td>
										<td colspan="2">
											<select name="credit_transfer" required id="credit_transfer" class="form-control">
											   <option value="">Select</option>  
											   <option value="0" selected="selected">No</option>
											   <option value="1">Yes</option>
											</select>
										</td>

										<td>Signature</td>
										<td colspan="2">
											<select class="form-control js-example-basic-single" name="signature" id="signature">
												<option value="">Select Signature</option>
												<?php if(!empty($signature)){ foreach($signature as $signature_result){?>
												<option value="<?=$signature_result->id?>"<?php if (!empty($exam_setup) &&  $exam_setup->id == $signature_result->id) { ?>selected="selected" <?php } ?>><?=$signature_result->dispalay_signature?> </option>
												<?php }}?>
											</select>
										</td>


										<td colspan="2" style="display:none;" class="credit_transfer_remark">
											<input type="text" name="remark" id="remark" placeholder="Remark" class="form-control">
										</td>
										<td>
											<input type="submit" name="generate" id="generate" class="butt3" value="Generate Marksheet" />
										</td>
									</tr>
								</table>
								<input type="hidden" value="<?=$resultId?>" name="result_id" id="result_id"/>
								<input type="hidden" value="<?=$enrollNo?>" name="enrollment_number" id="enrollment_number"/>
								<input type="hidden" value="<?php if(!empty($course_stream)){ echo $course_stream->id;}?>" name="student_id" id="student_id"/>
                            </form>
						</td>
					</tr>    
                    <?php }?>
					<tr>
						<td class="heading">Subject Code</td>
						<td class="heading">Subject Name</td>
						<td class="heading">Study Type</td>
						<td class="heading">Int. Max Marks</td>
						<td class="heading">Int. Marks Obt.</td>
						<td class="heading">Ext. Max Marks</td>
						<td class="heading">Ext. Marks Obt.</td>
						<td class="heading">Result</td>
					</tr>                       
                    <?php   
						foreach($result as $result_arr){  
							if($i%2==0){
								$resultClass="result";
							}else{
								$resultClass="result1";
							}
							if($result_arr->subject_type==0){
								$studyType="Theory";
							}else{
								$studyType="Practical";
							}
							if($result_arr->result == 0){
								$result2="Pass";
							}else if($result_arr->result == 1){
								$result2="Reappear";
							}else{
								$result2="Absent";
							}
					?>
					<tr class="<?=$resultClass?>">
                        <td><?=$result_arr->subject_code?></td>
                        <td><?=$result_arr->subject_name?></td>
                        <td><?=$studyType?></td>
                        <td align="center"><?=$result_arr->internal_max_marks?></td>
                        <td align="center"><?=$result_arr->internal_marks_obtained?></td>
                        <td align="center"><?=$result_arr->external_max_marks?></td>
                        <td align="center"><?=$result_arr->external_marks_obtained?></td>
                        <td align="center"><?=$result2?></td>
					</tr>
					<?php 
                    $totalIMM +=$result_arr->internal_max_marks;
                    $totalIMO +=$result_arr->internal_marks_obtained;
                    $totalEMM +=$result_arr->external_max_marks;
                    $totalEMO +=$result_arr->external_marks_obtained;
                    $i++;
                }
				?>
					<tr class="result4">
						<td colspan="3" align="right"><b>TOTAL MARKS</b></td>
						<td align="center"><?=$totalIMM?></td>
						<td align="center"><?=$totalIMO?></td>
						<td align="center"><?=$totalEMM?></td>
						<td align="center"><?=$totalEMO?></td>
						<td align="center"><?=$totalResult?></td>
					</tr>
				</table>                  
				<?php } else{ ?>
				<table width="950" align="center" class="table table-condensed table-bordered"  cellpadding="6">
					<tr>
						<td class="heading">Subject Code</td>
						<td class="heading">Subject Name</td>
						<td class="heading">Study Type</td>
						<td class="heading">Int. Max Marks</td>
						<td class="heading">Int. Marks Obt.</td>
						<td class="heading">Ext. Max Marks</td>
						<td class="heading">Ext. Marks Obt.</td>
						<td class="heading">Result</td>
					</tr>
					<tr class="result1">
						<td align="center" colspan="8">No subject found.</td>
					</tr>
				</table>
				<?php } ?>
            </div>
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
 
$(function(){
	$( ".datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd-mm-yy',

	});
} );

$("#actionform").validate({
	rules: {
		marksheet_status	: "required",
		// result_declare_date	: "required",
		print_stream: "required",
		final_status	: "required",
		// marksheet_issue_date: "required",
		display_mode: "required",
		year_sem: "required",
		credit_transfer: "required",
	},
	messages: {
		marksheet_status	: "Please select marksheet status",
		// result_declare_date	: "Please select date",
		print_stream: "Please select print stream",
		final_status	: "Please select status",
		// marksheet_issue_date: "Please select date",
		display_mode: "Please select mode",
		year_sem: "Please select year/sem",
		credit_transfer: "Please select credit transfer",
	},
	submitHandler: function(form) {		 
		form.submit();
	}
});
$('#credit_transfer').change(function(){
	if($('#credit_transfer').val() == '0'){
		$('.credit_transfer_remark').hide();
	}else if($('#credit_transfer').val() == '1'){
		$('.credit_transfer_remark').show();
	}else{
		$('.credit_transfer_remark').hide();
	}
});


</script>     