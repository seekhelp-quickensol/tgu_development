<?php 
// echo "<pre>";print_r($result);exit;

include('header.php');
$roman_arr = array(
	'1' => 'I',
	'2' => 'II',
	'3' => 'III',
	'4' => 'IV',
	'5' => 'V',
	'6' => 'VI',
	'7' => 'VII',
	'8' => 'VIII',
	'9' => 'IX',
	'10' => 'X',
	'11' => 'XI',
	'12' => 'XII',
);
?>
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
	table{ 
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
<section class="py-5">
    <div class="container">
        <div class="row">
			<div class="layer_data">
					<ul class="main_ul">
					   <li class="<?php if($this->uri->segment(1) == "dashboard"){?>active<?php }?>"><a href="<?=base_url();?>dashboard">Dashboard</a></li> 
						<!-- <li class="<?php if($this->uri->segment(1) == "exams"){?>active<?php }?>"><a href="<?=base_url()?>exams">Exam</a></li> -->
						<li class="<?php if($this->uri->segment(1) == "my_results"){?>active<?php }?>" ><a href="<?=base_url()?>my_results">Result</a></li>
						<li class="<?php if($this->uri->segment(1) == "marksheets"){?>active<?php }?>" ><a href="<?=base_url()?>marksheets">Marksheet</a></li>
					</ul>
			
				<div class="mt_10"></div>
					<div class="Dashboard_layer resp_pad">
						<div>
							<div class="box assesment_layer shadow-sm rounded bg-white ">
								<div class="box-title border-bottom p-3">
									<h6 class="m-0"><b><?=$result->examination_month?> <?=$result->examination_year?> - Result</b></h6>
								</div>
								<div class="box-body p-0">
								 
									<?php  
										if(!empty($result)){ 
											$subject = $this->Front_model->get_selected_subject_for_result($result->id);										 
											$i=0; 
									?>  
									<table align="center" class="detailTable" style="width:100%" cellpadding="2"> 
										<tr> 
											<td width="180px" class="data">Name</td> 
											<td width="250px" class="data"><?php echo $result->student_name?></td>  
											<td width="180px" class="data">Father/Husband Name</td> 
											<td width="250px" class="data"><?php echo $result->father_name ?></td>  
											<td width="90px" class="data">Year/Sem</td> 
											<td width="140px" class="data"><?php echo $result->year_sem?></td> 
										</tr> 
										<tr> 
											<td width="<?php if($result->examination_status == '0'){?>90px<?php }else{?>100px<?php }?>" class="data"><?php if($result->examination_status == '0'){?>Exam. Held<?php }else{?>Re-Exam. Held<?php }?></td> 
											<td width="140px" class="data"><?php echo $result->examination_month.' '.$result->examination_year?></td>  
											<td width="180px" class="data">Enrolment No</td> 
											<td width="250px" class="data"><?=$result->enrollment_number ?></td> 
											<td width="250px">Course</td> 
											<td width="250px"><?=$result->course_name;?> - <?=$result->stream_name;?></td>  
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
											<td align=center><b><?php if($subject_result->result == "0"){ echo "Pass";}else if($subject_result->result == "1"){ echo "Fail";}else if($subject_result->result == "2"){ echo "Reappear";}else if($subject_result->result == "3"){ echo "Absent";}?></b></td> 
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
    </section>
<?php include('footer.php');?>

