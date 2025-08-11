<?php include('header.php');
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
 <section class="py-5">
         <div class="container">
            <div class="row">
				<div class="layer_data">
            <ul class="main_ul">
                <li class="<?php if($this->uri->segment(1) == "dashboard"){?>active<?php }?>"><a href="<?=base_url();?>dashboard">Dashboard</a></li> 
                <!--<li class="<?php if($this->uri->segment(1) == "exams"){?>active<?php }?>"><a href="<?=base_url()?>exams">Exam</a></li>-->
				<?php if($student->course_id != "23"){?>
                <li class="<?php if($this->uri->segment(1) == "my_results"){?>active<?php }?>" ><a href="<?=base_url()?>my_results">Result</a></li>
				<?php }?>
                <li class="<?php if($this->uri->segment(1) == "marksheets"){?>active<?php }?>" ><a href="<?=base_url()?>marksheets">Marksheet</a></li>
             </ul>
             <div class="mt_10"></div>
				<div class="Dashboard_layer resp_pad">
				 <div>
					<div class="box assesment_layer shadow-sm rounded bg-white ">
                     <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Marksheets</h6>
                     </div>
                     <div class="box-body p-0">

                        <?php
						 
						if($student->course_id == "23"){
							if($result){ foreach($result as $result_result){ 
                        ?>
							<div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header respn_exam_btn">
								<div class="font-weight-bold mr-3 respn_exam_text">
									<div class="text-truncate">Coursework</div>
								</div>
								<span class="ml-auto mb-auto text-right">
									<div class="btn-group">
										<button class="click_course set_layer_<?=$result_result->id?> dropdown-item" type="button" data-course='<?=$result_result->id?>'> 
											<a target="_blank" href="<?=base_url();?>print_course_work_marksheet/<?=$result_result->id?>"><i class="fa fa-desktop" aria-hidden="true"></i> Print Marksheet</a>
										</button>
									</div>
									<br>
								</span> 
							</div>    
						<?php }}else{?>
							<div class="p-3 d-flex align-items-center justify-content-center bg-light border-bottom osahan-post-header nodata_img" style="background-image:url('<?=base_url();?>images/nodata.jpg')">
							<div class="font-weight-bold mr-3">
								<div class="btn-group"><p>Sorry! No result found yet</p></div>
							</div>
						</div>
						<?php }}else{
								if($result){ foreach($result as $result_result){ 
                        ?>
							<div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header respn_exam_btn">
								<div class="font-weight-bold mr-3 respn_exam_text">
									<div class="text-truncate">Year/Sem: <?=$roman_arr[$result_result->year_sem]?> - <?=$result_result->examination_month?> <?=$result_result->examination_year?> </div>
								</div>
								<span class="ml-auto mb-auto text-right">
									<div class="btn-group">
										<button class="click_course set_layer_<?=$result_result->id?> dropdown-item" type="button" data-course='<?=$result_result->id?>'> 
											<a target="_blank" href="<?=base_url();?>print_marksheet/<?=$result_result->id?>"><i class="fa fa-desktop" aria-hidden="true"></i> Print Marksheet</a>
										</button>
									</div>
									<br>
								</span> 
							</div>    
						<?php }}else{?>
							<div class="p-3 d-flex align-items-center justify-content-center bg-light border-bottom osahan-post-header nodata_img" style="background-image:url('<?=base_url();?>images/nodata.jpg')">
							<div class="font-weight-bold mr-3">
								<div class="btn-group"><p>Sorry! No result found yet</p></div>
							</div>
						</div>
						<?php }}?>
                  </div>
				</div>
				</div>
				</div>
            </div>
         </div>
      </section>
<?php include('footer.php');?>

