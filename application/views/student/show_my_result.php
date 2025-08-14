<?php include('header.php');?>
<style>
#contentDiv{text-transform:uppercase};
 .panel-group .panel {
        border-radius: 0;
        box-shadow: none;
        border-color: #EEEEEE;
    }

    .panel-default > .panel-heading {
        padding: 0;
        border-radius: 0;
        color: #212121;
        background-color: #FAFAFA;
        border-color: #EEEEEE;
    }

    .panel-title {
        font-size: 14px;
    }

    .panel-title > a {
        display: block;
        padding: 15px;
        text-decoration: none;
    }

    .more-less {
        float: right;
        color: #212121;
    }

    .panel-default > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #EEEEEE;
    }

 
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  /*background-color: #dddddd;*/
} 
 
.align_center{
	text-align: center;
}
.image_height{
	height: 30px;
	width: 30px;
}
</style>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title" style="text-align:center"><?=$student->examination_month?> <?=$student->examination_year?></h4> 
								<?php 
									if(!empty($student)){
										$subject = $this->Exam_model->get_selected_subject_for_result($student->id);										
										$i=0;
								?> 
								<table align="center" class="detailTable" style="width:100%" cellpadding="2">
									<tr>
										<td width="180px" class="data">Name</td>
										<td width="250px" class="data"><?php echo $student->student_name?></td> 
										<td width="180px" class="data">Father/Husband Name</td>
										<td width="250px" class="data"><?php echo $student->father_name ?></td> 
										<td width="90px" class="data">Year/Sem</td>
										<td width="140px" class="data"><?php echo $student->year_sem?></td>
									</tr>
									<tr>
										<td width="<?php if($student->examination_status == '0'){?>90px<?php }else{?>100px<?php }?>" class="data"><?php if($student->examination_status == '0'){?>Exam. Held<?php }else{?>Re-Exam. Held<?php }?></td>
										<td width="140px" class="data"><?php echo $student->examination_month.' '.$student->examination_year?></td>
									 
										<td width="180px" class="data">Enrolment No</td>
										<td width="250px" class="data"><?=$student->enrollment_number ?></td>
										<td width="250px">Course</td>
										<td width="250px"><?=$student->course_name;?> - <?=$student->stream_name;?></td> 
									</tr>
								</table> 
								<table align="center" border="1"  cellpadding="3" style="width:100%" class="detailTable">
									<tr>
										<td class="data" rowspan="2" align="center">S.No</td>
										<td class="data" rowspan="2" align="center">Subject Code</td>
										<td class="data" rowspan="2" align="center">Subject(s)/Paper(s)</td>
										<td class="data" colspan="2" align="center">Internal Assessment</td>
										<td class="data" colspan="2" align="center">External Assessment</td>
										<td class="data" colspan="2" align="center">Total Marks</td>
										<td class="data" rowspan="2" align="center">Remarks</td>
									</tr>
									<tr>
										<td class="data" align="center">M.M.</td>
										<td class="data" align="center">M.O.</td>
										<td class="data" align="center">M.M.</td>
										<td class="data" align="center">M.O.</td>
										<td class="data" align="center">M.M.</td>
										<td class="data" align="center">M.O.</td>
									</tr>
								<?php 
								$sr=1;
								$total_internal = 0;
								$total_external = 0;
								foreach($subject as $subject_result){
								  if($subject_result->subject_type ==0){
									$subject_type="Theory";
								  }else{
									$subject_type="Practical";
								  }
								  if($subject_result->result ==0){
									$paper_result="Pass";
								  }else if($subject_result->result ==1){
									$paper_result="Reappear";
								  }else{
									$paper_result="Absent";
								  }
								  $total_internal += $subject_result->internal_max_marks+$subject_result->external_max_marks;
								  $total_external += $subject_result->internal_marks_obtained+$subject_result->external_marks_obtained;
								?>
									<tr>
										<td><?=$sr++?></td>
										<td  style="padding-left: 35px"><?=$subject_result->subject_code?></td>
										<td  style="padding-left: 35px"><?=$subject_result->subject_name?></td>
										<td ><?=$subject_result->internal_max_marks?></td>
										<td ><?=$subject_result->internal_marks_obtained?></td>
										<td ><?=$subject_result->external_max_marks?></td>
										<td ><?=$subject_result->external_marks_obtained?></td>
										<td ><?=$subject_result->internal_max_marks+$subject_result->external_max_marks?></td>
										<td ><?=$subject_result->internal_marks_obtained+$subject_result->external_marks_obtained?></td>
										<td ><?=$paper_result?></td>  
									</tr>
								<?php 		  
								} 
								?> 
								<tr>	
									<td colspan=7><b>Total Marks</b></td>
									  <td align=center><b><?=$total_internal?></b></td>
									  <td align=center><b><?=$total_external?></b></td>                      
									  <td align=center><b><?php if($student->result == "0"){ echo "Pass";}else if($student->result == "1"){ echo "Fail";}else if($student->result == "2"){ echo "Reappear";}else if($student->result == "3"){ echo "Absent";}?></b></td>
								</tr>
							<?php
						}
					?>
					</table>
				</div> 
			</div>
		</div>
	</div> 
	</div> 
	</div> 
	</div> 
			<?php include('footer.php');?>
			<script>
			$('#result_form').validate({
				rules: {
					enrollment_number: {
						required: true,
					},
					examination_status: {
						required: true,
					},
					year_sem: {
						required: true,
					},
				},
				messages: {
					enrollment_number: {
						required: "Please enter enrollment number",
					},
					examination_status: {
						required: "Please select exam",
					},
					year_sem: {
						required: "Please select year/sem",
					},
				},
				errorElement: 'span',
				errorPlacement: function (error, element) {
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function (element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function (element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				}
			});
			</script>
