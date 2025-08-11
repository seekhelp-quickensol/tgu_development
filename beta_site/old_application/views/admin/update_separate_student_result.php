<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Result</h4>
                  <p class="card-description">
                    Please enter result details
                  </p>
					<?php if(!empty($result)){?>
						<form name="edit_result_form" id="edit_result_form" style="margin-top: 0px;" onsubmit="return validation()" method="post">  
							<table class="detailTable" align="center"   cellspacing="5" cellpadding="4">
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td>Examination</td>
									<td class="info1">
										<select name="comboMonth" id="comboMonth" class="session_combo">
											<option value="January" <?php if($result->examination_month == "January"){?>selected="selected"<?php }?>>January</option>
											<option value="February" <?php if($result->examination_month == "February"){?>selected="selected"<?php }?>>February</option>
											<option value="March" <?php if($result->examination_month == "March"){?>selected="selected"<?php }?>>March</option>
											<option value="April" <?php if($result->examination_month == "April"){?>selected="selected"<?php }?>>April</option>
											<option value="May" <?php if($result->examination_month == "May"){?>selected="selected"<?php }?>>May</option>
											<option value="June" <?php if($result->examination_month == "June"){?>selected="selected"<?php }?>>June</option>
											<option value="July" <?php if($result->examination_month == "July"){?>selected="selected"<?php }?>>July</option>
											<option value="August" <?php if($result->examination_month == "August"){?>selected="selected"<?php }?>>August</option>
											<option value="September" <?php if($result->examination_month == "September"){?>selected="selected"<?php }?>>September</option>
											<option value="October" <?php if($result->examination_month == "October"){?>selected="selected"<?php }?>>October</option>
											<option value="November" <?php if($result->examination_month == "November"){?>selected="selected"<?php }?>>November</option>
											<option value="December" <?php if($result->examination_month == "December"){?>selected="selected"<?php }?>>December</option>
										</select>&nbsp;-&nbsp;
										<select name="comboYear" id="comboYear" class="session_combo">
											<?php
												$currentYear=date('Y'); 
												for($i=2021;$i<=date("Y");$i++){?>
													<option value="<?=$i?>" <?php if($result->examination_year == $i){?>selected="selected"<?php }?>><?=$i?></option>
											<?php }?>
										</select>
									</td> 
									<td class="reqfield">&nbsp;</td>
									<td width="50px">&nbsp;</td>
									<td>Exam Status</td>
									<td>
										<select name="comboExamStatus" id="comboExamStatus" class="detail_combo">
											<option value="0" <?php if($result->examination_status == '0'){?>selected="selected"<?php }?>>Main Exam</option>
											<option value="1" <?php if($result->examination_status == '1'){?>selected="selected"<?php }?>>Re-Exam</option>
										</select>
									</td>
									<td class="reqfield">*</td>
								</tr>
								<tr>
									<td>Course</td>
									<td class="info1"><?=$result->course_name?></td>
									<td class="reqfield">&nbsp;</td>
									<td width="50px">&nbsp;</td>
									<td>Stream</td>
										<td class="info1"><?=$result->stream_name?></td>
										<td class="reqfield">&nbsp;</td>
								</tr>
								<tr><td>Year/Sem</td>
									<td class="info1"><?=$result->year_sem?></td>
									<td class="reqfield">&nbsp;</td>
									<td width="50px">&nbsp;</td>
									<td>Enrollment No</td>
									<td class="info1"><?=$result->enrollment_number?></td>
									<td class="reqfield">&nbsp;</td>
								</tr>
							</table>
							<table  align="center" class="table-striped table-bordered" cellpadding="5">
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
									$i=1;
									$subject = $this->Separate_student_model->get_selected_subject_for_result($result->id);
									if(!empty($subject)){
										foreach($subject as $subject_result){
										  if($i%2==0){
											$resultClass="result";
										  }else{
											$resultClass="result1";
										  }
										  if($subject_result->subject_type == 0){
											$studyType="Theory";
										  }else{
											$studyType="Practical";
										  }
								?>
										<tr class="<?=$resultClass ?>">
											<td><?=$subject_result->subject_code?></td>
											<td><?=$subject_result->subject_name?></td>
											<td><?=$studyType?></td>
											<td align="center">
												<input type="text" value="<?=$subject_result->internal_max_marks?>" name='txtIMM<?=$i?>' id='txtIMM<?=$i?>' class="detail_text_right2" readonly="readonly" />
												<input type="hidden" value="<?=$subject_result->subject_id?>" name='txtSubjectId<?=$i?>' id='txtSubjectId<?=$i?>'/>
											</td>
											<td align="center"><input type="text" value="<?=$subject_result->internal_marks_obtained?>" name='txtIMO<?=$i?>' id='txtIMO<?=$i?>' onblur='addMarks();' class="detail_text_right2" maxlength="3" onkeypress='disableNonNumeric(event)' /></td>
											<td align="center"><input type="text" value="<?=$subject_result->external_max_marks?>" name='txtEMM<?=$i?>' id='txtEMM<?=$i?>' class="detail_text_right2" readonly="readonly" /></td>
											<td align="center"><input type="text" value="<?=$subject_result->external_marks_obtained?>" name='txtEMO<?=$i?>' id='txtEMO<?=$i?>' onblur='addMarks();' class="detail_text_right2" maxlength="3" onkeypress='disableNonNumeric(event)' /></td>
											<td align="center">
												<select name='comboResult<?=$i?>' id='comboResult<?=$i?>' class="detail_combo_status">
													<option value="1" <?php if($subject_result->result == 1){?>selected="selected"<?php }?>>Fail</option>
													<option value="2" <?php if($subject_result->result == 2){?>selected="selected"<?php }?>>Absent</option>                              
													<option value="0" <?php if($subject_result->result == 0){?>selected="selected"<?php }?>>Pass</option>
												</select>
											</td>
										</tr>
									<?php 
									$i++;}?>
									<tr class="result4">
										<td colspan="3" align="right"><b>TOTAL MARKS</b></td>
										<td align="center"><input type="text" value="<?=$result->internal_max_marks?>" name='txtTIMM' id='txtTIMM' class="detail_text_right2" readonly="readonly" /></td>
										<td align="center"><input type="text" value="<?=$result->internal_marks_obtained?>" name='txtTIMO' id='txtTIMO' class="detail_text_right2"  readonly="readonly" /></td>
										<td align="center"><input type="text" value="<?=$result->external_max_marks?>" name='txtTEMM' id='txtTEMM' class="detail_text_right2" readonly="readonly" /></td>
										<td align="center"><input type="text" value="<?=$result->external_marks_obtained?>" name='txtTEMO' id='txtTEMO' class="detail_text_right2" readonly="readonly" /></td>
										<td align="center">
											<select name='comboTResult' id='comboTResult' class="detail_combo_status">
												<option value=''>Select</option>
												<option value="2" <?php if($result->result == '2'){?>selected="selected"<?php }?>>Reappear</option>
												<option value="1" <?php if($result->result == '1'){?>selected="selected"<?php }?>>Fail</option>
												<option value="0" <?php if($result->result == '0'){?>selected="selected"<?php }?>>Pass</option>
												<option value="3" <?php if($result->result == '3'){?>selected="selected"<?php }?>>Absent</option>
											</select>
										</td>
									</tr>
									<tr><td colspan="8" align="center"><input type="submit" name="buttSubmit" id="buttSubmit" class="btn btn-primary" value='Edit Result' /> </td></tr>
									<input type="hidden" value="<?=$result->id?>" name='txtResultId' id='txtResultId' />
									<input type="hidden" value="0" name='txtContainDetails' id='txtContainDetails' />
									<?php
								}else{
									?>
										No Subject Found
									<?php 
									}
							}else{
                    ?>
                             
                    <?php
                            
                        }
                    ?>

                    </table>
					</form>
				
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
 function addMarks(){
                var i=1;
                var totalIntMM=0,totalExtMM=0,totalIntMO=0,totalExtMO=0;
                for (;;){

                    if(document.getElementById("txtIMO" + i)){
                        subjectId=document.getElementById("txtSubjectId" + i).value;
                        if(subjectId==6736 || subjectId==6735 || subjectId==6734){
                            if(document.getElementById("txtIMM" + i).value.length==0)
                                document.getElementById("txtIMM" + i).value=0;
                                
                            if(document.getElementById("txtEMM" + i).value.length==0)
                                document.getElementById("txtEMM" + i).value=0;
                                
                            if(document.getElementById("txtIMO" + i).value.length==0)
                                document.getElementById("txtIMO" + i).value=0;
                            
                            if(document.getElementById("txtEMO" + i).value.length==0)
                                document.getElementById("txtEMO" + i).value=0;  
                        }
                        else{
                            if(document.getElementById("txtIMM" + i).value.length==0)
                                    document.getElementById("txtIMM" + i).value=0;
                            else
                                totalIntMM+=parseInt(document.getElementById("txtIMM" + i).value);
                            
                            if(document.getElementById("txtEMM" + i).value.length==0)
                                document.getElementById("txtEMM" + i).value=0;
                            else
                                totalExtMM+=parseInt(document.getElementById("txtEMM" + i).value);
                            
                            if(document.getElementById("txtIMO" + i).value.length==0)
                                document.getElementById("txtIMO" + i).value=0;
                            else
                                totalIntMO+=parseInt(document.getElementById("txtIMO" + i).value);
                                
                            if(document.getElementById("txtEMO" + i).value.length==0)
                                document.getElementById("txtEMO" + i).value=0;
                            else
                                totalExtMO+=parseInt(document.getElementById("txtEMO" + i).value);
                        }
                    }
                    else
                        break;
                    i++;
                }
                if(document.getElementById("txtTIMM")){
                    document.getElementById("txtTIMM").value=totalIntMM;
                    document.getElementById("txtTEMM").value=totalExtMM;
                }
                if(document.getElementById("txtTIMO")){
                    document.getElementById("txtTIMO").value=totalIntMO;
                    document.getElementById("txtTEMO").value=totalExtMO;
                    return true;
                }
                else
                    return false;
                
            }
            function checkSubject(){
                var i=1;
                for (;;){
                    if(document.getElementById("txtIMO" + i)){
                        if(document.getElementById("txtIMO" + i).value.length==0)
                            document.getElementById("txtIMO" + i).value=0;
     
                        if(document.getElementById("txtEMO" + i).value.length==0)
                            document.getElementById("txtEMO" + i).value=0;
                    }
                    else
                        break;
                        
                    i++;
                }
                return true;
            }
    	    function validation()
            {
                    if(document.AddForm.txtContainDetails.value==0){
                        addMarks();
                        if (checkSubject()==false)
                            return false;
                        if (document.AddForm.comboTResult.selectedIndex==0)
                        {
                            alert("Please select complete result.");
                            return false;
                        }
                    }
                    else{
                        if (document.AddForm.txtTIMM.value.length==0)
                        {
                            document.AddForm.txtTIMM.value="0";
                        }
                        if (document.AddForm.txtTIMO.value.length==0)
                        {
                            document.AddForm.txtTIMO.value="0";
                        }
                        if (document.AddForm.txtTEMM.value.length==0)
                        {
                            document.AddForm.txtTEMM.value="0";
                        }
                        if (document.AddForm.txtTEMO.value.length==0)
                        {
                            document.AddForm.txtTEMO.value="0";
                        }
                        if (document.AddForm.comboTResult.selectedIndex==0)
                        {
                            alert("Please select complete result.");
                            return false;
                        }
                    }
                    return true;
            }
</script>     