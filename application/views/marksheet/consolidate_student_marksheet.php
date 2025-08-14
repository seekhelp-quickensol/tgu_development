<?php



// echo "<pre>";print_r($marksheet_id);exit;

if(empty($marksheet)){ redirect(base_url());}

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



<!DOCTYPE html>

<html lang="en">



<head>

    <title>Marksheet</title>

    <meta name="description" content="India's leading manufacturer of premium Aluminium Sliding Windows and Doors">

    <meta name="keywords" content="aluminium, sliding, window, section, glass, door">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&display=swap" rel="stylesheet">

       <style>

        @import "https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap";

        @import "https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap";

        body {

            width: 100%;

            height: 100%;

            margin: 0;

            padding: 0;

            background-color: #FAFAFA;

            font-family: 'Abel', sans-serif;

            font-family: 'Barlow Semi Condensed', sans-serif;

            color: #444444;

            font-size: 13px;

        } 

        * {

            box-sizing: border-box;

            -moz-box-sizing: border-box;

        }

        

        .page {

            width: 250mm;

            min-height: 349mm;

            padding: 0mm;

            margin: 0mm auto;

            border-radius: 5px;

            background: white;

            

			position: relative;

        }

        

        .subpage {

           

			position:relative;

            min-height: 349mm;

            /*border: 2px solid transparent;*/

			background-size: cover;

            background-position: center;

			/*border: none;*/

			/*border-left: 6px solid #fff;

			border-right: 7px solid #fff;*/

        }

        

        .print {

            background: #ed1765;

            color: #fff;

            width: 100px;

            font-weight: 500;

            border: none;

            outline: navajowhite;

            padding: 10px;

            cursor: pointer;

            position: absolute;

            right: 10px;

            top: 10px;

            font-size: 14px;

        }

        

        .print-title {

            text-align: center;

            font-weight: 600;

            color: #262626;

            font-size: 32px;

        }

        

        .right-bar-code p {

            color: #000;

            font-size: 14px;

            text-align: center;

            padding: 0 0 0 90px;

            margin-bottom: 0;

			margin-top: 0;

			font-weight: 600;

        }

        

        .scan-img {

            float: left;

        }

        

        .right-bar-code {

            float: right;

        }

        

        .markshit-header {

            text-align: center;

        }

        

        .markshit-header {

            text-align: center;

            padding-top:90px;

			padding-right: 15px;

        }

        

        .markshit-header h2 {

            font-size: 28px;

            font-weight: 700;

            text-align: center;

            color: #b73710;

            text-transform: uppercase;

            margin-bottom: 15px;

            position: relative;

            margin-top: 15px;

        }

        

        .statement::before {

            position: absolute;

            top: 0%;

            left: 30px;

            content: " ";

            width: 94%;

            height: 2px;

            background: #a60000;

            background-image: -webkit-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);

            background-image: -moz-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);

            background-image: -ms-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);

            background-image: -o-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);

        }

        

        .statement::after {

            position: absolute;

            top: 100%;

            left: 30px;

            content: " ";

            width: 94%;

            height: 2px;

            background: #a60000;

            background-image: -webkit-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);

            background-image: -moz-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);

            background-image: -ms-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);

            background-image: -o-linear-gradient(left, #d53a9d, #743ad5, #d53a9d);

        }

        

        .markshit-header h3 {

            color: #05549e;

            text-align: center;

            font-size: 24px;

            text-transform: uppercase;

            font-weight: 600;

            margin-bottom: 10px;

            margin-top: 10px;

            padding-left: 28px;

            padding-right: 28px;

        }

        

        .students-info.student-info-left {

            float: left;

            width: 50%;

            padding-left: 30px;

            margin-bottom: 10px;

        }

        

		

        .students-info.student-info-right {

            float: left;

            width: 50%;

            padding-left: 30px;

            margin-bottom: 10px;v



        }

        

        .students-info p {

            font-size: 13px;

            font-weight: 500;

            color: #000;

            line-height: 1;

            margin-top: 5px;

            margin-bottom: 3px;

        }

        

        .students-exam-details th {

            color: #d53a9d;

        }

        .students-exam-details .heading_table {

			height: 47px;

        }

        

        table {

            border-collapse: collapse;

        }

        

        .students-exam-details th,

        td {

            font-size:10px;

            font-weight: 500;

            border-collapse: collapse !important;

            /*background: #ffffffa3 !important;*/

            border-color: #8a6eaf;

            border: 1px solid #8a6eaf;

            border-collapse: collapse;

            padding:2px 3px;

        }

        

        tbody tr {

            border-image-source: linear-gradient(to left, #743ad5, #d53a9d) !important;

            border-collapse: collapse !important;

        }

        

        .student-marks-total {

            text-align: center;

        }

        

        .remark-info {

            font-size: 12px;

			color: #000;

			font-weight: 500;

        }

        .result-date span{

            font-size: 12px;

			color: #000;

			font-weight: 500;

        }

        

        .result-date {

            font-size: 15px;

            color: #000000ba;

        }

        

        .result-date span {

            display: inline-block;

        }

        

        .result-date p {

            display: inline;

            padding: 0 5px;

        }

        .first-row{

			display: block;

			height: 80px;

			padding: 35px 15px 0px;

		}

 .left-remark {

    float: left;

    width: 32.5%;

    position: relative;

    top: 80px;

}

        

		.barcode-middle {

			

			  float: left;

            width:32.5%;

		}

		

		.bottom-sign-section {

			/*height: 90px;*/

			position: absolute;

			width: 20.4cm;

			bottom: 95px;

			width: 100%;

			padding:0px 15px;

		}

.barcode-img {

    max-width: 85%;

    height: 33px;

    position: relative;

    top: 77px;

}

        .right-controller {

            float: left;

            width: 32.5%;

		

			position:relative;

			top:46px;

        }

        

        .marks-center {

            text-align: center;

        }

        

        .students-exam-details {

            margin-bottom: 15px;

			width: 100%;	

			margin: 0px auto;

        }

		

		.bottom_strip{

			position: relative;

			bottom: 0px;

			display: none;



		

		}

		.bottom_strip img{

			width: 100%;

			height: 35px;

			position:absolute;

bottom:0px;		}

		.scan-img img{

			width: 75%;

		}

		.total_marks{

		    width: 92%;

            margin: 15px auto;

		}

        

    

		.credit_note {

		      position: absolute;

				padding: 0px 15px;

				margin: 2px 0px;

		}

		.col-lg-6{

			width: 50%;

			float:left;

		}

		.row {

			display: table;

			width: 97%;

			clear: both;

			margin: 0px auto;

		}

		.rotate {

    -ms-transform: rotate(270deg);

    -moz-transform: rotate(270deg);

    -webkit-transform: rotate(270deg);



 



   /* -ms-transform-origin: left top 0;

    -moz-transform-origin: left top 0;

    -webkit-transform-origin: center top 0; 

 transform-origin: center top 0; */

}

.month-and-year {

	font-size: 12px;

	margin:2px 15px;

	font-weight: 500;

}

.month-and-year  span {font-weight:600;}

        @media print {

            html,

            body {

				width: 250mm;

            min-height: 350mm;

			margin: 0px;

			padding:0px;

            }

            .print {

                display: none;

            }

			

			.col-lg-6{

				width: 50%;

				float:left;

			}

			.row {

				display: table;

				width: 97%;

				clear: both;

				margin: 0px auto;

			}

			

        }

		

		@media print {

  body, page[size=""] {

  size: 250mm 350mm;

    margin: 0;

    box-shadow: 0;

  }

}

		@page {

            size: 250mm 350mm;

            margin: 0;

        }

		/*@media all{

			.rotate{

				writing-mode: vertical-rl;

				transform: rotate(-90deg);

				white-space: nowrap;

				vertical-align: middle;

			}

		}*/

		

		

    </style>

</head>



<body>

<?php  

$course_details = $this->Consolidated_model->get_selected_marksheet_course_stream_details($marksheet->course_id,$marksheet->stream_id,$marksheet->course_type,$marksheet->course_mode);



//if($marksheet->course_mode == '2'){

	

$subject = $this->Consolidated_model->get_selected_subject_for_result($marksheet_id->id);



// echo "<pre>";print_r($subject);exit;

$cgpa_subject_count = $subject; 

$cgpa_total_marks = 0; 

	

$total_page =  $marksheet->year_sem/4;



$total_page = ceil($total_page);





for($p=1;$p<=$total_page;$p++){

	

	if($p==1){

?>



		<div class="book letter_section" id="letter_section">

			<div class="page">

				<div class="subpage"  style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/250-350.png')?>)">



				

					<div class="print-wrapper">

						<?php  

							$smart = $marksheet_id->id."-".$marksheet->id."-".$marksheet->enrollment_number."-".$marksheet->student_name."-".$marksheet->father_name."-".$marksheet->created_on;

							$generated_qr = $this->Common_model->generate_qrcode_data($smart);

							$barcode = $marksheet->enrollment_number."-".$marksheet_id->id;

							$last_exam = $this->Consolidated_model->get_last_exam_year($marksheet->id);

							?>

						<div class="first-row">

							<div class="scan-img">

								<!-- <img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?=$smart?>&choe=UTF-8"/> -->
								<img style="width:78px !important;" src="<?=$generated_qr;?>"/>

							</div>

							<div class="right-bar-code">

								<p>Serial No:<?=$marksheet_id->id?></p>

							</div>

						</div>

						<div style="clear:both"></div>

						<div class="markshit-header ">

							<h2 style="font-size:14px;color: #335c9e;margin-bottom: 6px; margin-top: 66px; visibility:hidden;">Imphal Arunachal Pradesh, INDIA</h2>

							<h2 class="statement"> Consolidated statement of marks</h2>

							<h3><?=$marksheet->course_name?> (<?=$marksheet->stream_name?>)</h3>

						</div>

						<div class="students-info student-info-left" style="margin-bottom: 0px;">

							<p>Name of Student: <?=$marksheet->student_name?></p>

							<p>Father's Name: <?=$marksheet->father_name?></p>

							<!--<p>Month and Year of last Exam Examination: <?php if(!empty($last_exam)){ echo $last_exam->exam_month.' '.$last_exam->exam_year;}?></p>-->

						</div>

						

						<div class="students-info student-info-right" style="height:35px;">

						  <p>Mother Name : <?=$marksheet->mother_name?></p>

						  <p>Enrollment .No. : <?=$marksheet->enrollment_number?></p>

						</div>

						<div style="clearboth"></div>

						<!-- <div style="text-align:center;color:#05549e"><h2 style="margin-top: 0px;">Annual Examination<h2></div> -->

						<div class="row">

							<div class="col-lg-6">

								<table class="students-exam-details" style="table-layout: fixed;">

									<thead>

										<tr class="heading_table"> 

											<th class="sr_no rotate" style="width: 15px; transform: translate(-3px, -1px);rotate: 270deg;">S.No.</th>

											<th style="width: 47px;">SUBJECT CODE</th>

											<th style="width: 200px;">SUBJECT TITLE</th>

											<th style="width: 13px;transform: translate(-13px, -1px);rotate: 270deg;" class="rotate">CREDITS</th>

											<th style="width: 13px;transform: translate(-15px, -1px);rotate: 270deg;" class="rotate">INTERNAL</th>

											<th style="width: 13px;transform: translate(-17px, -1px);rotate: 270deg;" class="rotate">EXTERNAL</th>

											<th style="width: 24px;transform: translate(-8px, -1px);rotate: 270deg;" class="rotate">MARKS OBTAINED</th>

											<th style="width: 20px;transform: translate(-11px, -1px);rotate: 270deg;" class="rotate">MAX.PASS MARK</th>

											<th style="width: 13px;transform: translate(-8px, -1px);rotate: 270deg;" class="rotate">GRADE</th>

											<th style="width: 22px;transform: translate(-6px, -1px);rotate: 270deg;" class="rotate">RESULT</th>

										</tr> 

									</thead>

								</table>

							</div>

							<div class="col-lg-6">

								<table class="students-exam-details" style="table-layout: fixed;">

									<thead>

										<tr class="heading_table"> 

											<th class="sr_no rotate" style="width: 15px; transform: translate(-3px, -1px);rotate: 270deg;">S.No.</th>

											<th style="width: 47px;">SUBJECT CODE</th>

											<th style="width: 200px;">SUBJECT TITLE</th>

											<th style="width: 13px;transform: translate(-13px, -1px);rotate: 270deg;"  class="rotate">CREDITS</th>

											<th style="width: 13px;transform: translate(-15px, -1px);rotate: 270deg;" class="rotate">INTERNAL</th>

											<th style="width: 13px;transform: translate(-17px, -1px);rotate: 270deg;" class="rotate">EXTERNAL</th>

											<th style="width: 24px;transform: translate(-8px, -1px);rotate: 270deg;" class="rotate">MARKS OBTAINED</th>

											<th style="width: 20px;transform: translate(-11px, -1px);rotate: 270deg;"  class="rotate" >MAX.PASS MARK</th>

											<th style="width: 13px;transform: translate(-8px, -1px);rotate: 270deg;" class="rotate">GRADE</th>

											<th style="width: 22px;transform: translate(-6px, -1px);rotate: 270deg;"  class="rotate">RESULT</th>

										</tr> 

									</thead>

								</table>

							</div>

						</div>

						

						<div class="row">

							

								<?php 

									$devid=1;

									$k=0;

									$year_sem_start_end = $this->Consolidated_model->get_selected_semester_subject_for_result_year_sem($marksheet_id->id);

									$xp_year = explode("@@@",$year_sem_start_end);

									

									for($i=$xp_year[0];$i<=$xp_year[1];$i++){$k++;

										if($k <= 4 && $k <= $xp_year[1]){

									$subject = $this->Consolidated_model->get_selected_semester_subject_for_result($marksheet_id->id,$i);

									

										$sem_name = '';

										if($i == '1'){

											$sem_name = 'I';

										}else if($i == '2'){

											$sem_name = 'II';

										}else if($i == '3'){

											$sem_name = 'III';

										}else if($i == '4'){

											$sem_name = 'IV';

										}else if($i == '5'){

											$sem_name = 'V';

										}else if($i == '6'){

											$sem_name = 'VI';

										}else if($i == '7'){

											$sem_name = 'VII';

										}else if($i == '8'){

											$sem_name = 'VIII';

										}else if($i == '9'){

											$sem_name = 'IX';

										}else if($i == '10'){

											$sem_name = 'X';

										}else if($i == '11'){

											$sem_name = 'XI';

										}else if($i == '12'){

											$sem_name = 'XII';

										}

								?>

									<div class="col-lg-6">

										<table class="students-exam-details" style="table-layout: fixed;">

											<tbody>

												<tr class=""> 

													<th class="" colspan='10'><?=$sem_name;?> Year/Semester</th>

												</tr>

											</tbody>

										</table>

										<table class="students-exam-details" style="table-layout: fixed;">

											<tbody>

												<?php if(!empty($subject)){

													$j=1; 

													$subject_count = count($subject);

													$remaining_row =10-$subject_count;

													foreach($subject as $subject_result){

														$total_year = $subject_result->year_sem;	

														$cgpa_total_marks = (int)$cgpa_total_marks+(int)$subject_result->internal_mark+(int)$subject_result->external_mark;

														$cgpa_subject_count++;

												?>

													<tr style="text-align: center;">

														<td style="width: 15px;"><?=$j++;?></td>

														<td style="text-align:left;width: 47px;"><?=$subject_result->subject_code;?></td>

														<td style="text-align:left; width: 175px;height:30px"><?=$subject_result->subject_name;?></td>

														<td style="width: 13px;"><?=$subject_result->credit?></td>

														<td style="width: 13px;"><?=$subject_result->internal_mark?></td>

														<td style="width: 13px;"><?=$subject_result->external_mark?></td>						

														<td style="width: 24px;"><?=$subject_result->internal_mark+$subject_result->external_mark?></td>

														<td style="width: 20px;"><?=$subject_result->total_marks?></td>

														<td style="width: 13px;"><?=$subject_result->grade?></td>

														<td style="width: 22px;"><?=$subject_result->result?></td>

													</tr>

												<?php }?>

												<?php if($remaining_row != 0){

													for($q=1;$q<=$remaining_row;$q++){

												?>

													<tr style="text-align: center;">

														<td style="width: 15px;"> &nbsp </td>

														<td style="text-align:left;width: 47px;"> &nbsp </td> 

														<td style="text-align:left; width: 175px;height:30px">&nbsp</td>

														<td style="width: 13px;"> &nbsp </td>

														<td style="width: 13px;"> &nbsp </td>

														<td style="width: 13px;"> &nbsp </td>						

														<td style="width: 24px;"> &nbsp </td>

														<td style="width: 20px;"> &nbsp </td>

														<td style="width: 13px;"> &nbsp </td>

														<td style="width: 22px;"> &nbsp </td>

													</tr>

												<?php }}?>

												<?php }else{?>

													<?php for($k=1;$k<=10;$k++){?>

														<tr style="text-align: center;">

															<td style="width: 15px;"> &nbsp </td>

															<td style="text-align:left;width: 47px;"> &nbsp </td>

															<td style="text-align:left; width: 175px;height:30px"> &nbsp </td>

															<td style="width: 13px;"> &nbsp </td>

															<td style="width: 13px;"> &nbsp </td>

															<td style="width: 13px;"> &nbsp </td>						

															<td style="width: 24px;"> &nbsp </td>

															<td style="width: 20px;"> &nbsp </td>

															<td style="width: 13px;"> &nbsp </td>

															<td style="width: 22px;"> &nbsp </td>

														</tr>

													<?php }?>

												<?php }?>

											</tbody>

										</table>

									</div>

									<?php if($devid == 2){?>

									</div>

									<div class="row">

									<?php $devid=0;}?>

								<?php $devid++;

								}}?>

							

						</div>

						<p class="credit_note"><b><?=$marksheet_id->note?></b></p>

					</div>

					



					<!-----------------Final statement start----------------------->

							<?php if($total_page == $p){

								$total_mark_obtaind = 0;

								$mark_obtaind = 0;

								$total_mark = 0;

								$mark = 0;	

								//$percent=(int)($total_mark*100)/(int)$mark_obtaind;

								$percent =0;

							?>

								

							

							

							<table class="students-exam-details" style="margin-top: 44px;width: 97%;">

								<body>

									<div class="clearfix"></div>

									<tr class="student-marks-total">

										<td>SEM/YEAR</td>

										<?php 

										$year_sem_start_end = $this->Consolidated_model->get_selected_semester_subject_for_result_year_sem($marksheet_id->id);

										$xp_year = explode("@@@",$year_sem_start_end);

										

										for($y=$xp_year[0];$y<=$xp_year[1];$y++){$k++;

										?>

										<td><?=$y?></td>

										<?php }?> 

										<td>Grand Total</td>

										<td>Result</td>

										<td>SGPA/CGPA</td>

									</tr>

									<tr class="student-marks-total">

										<td>Full Marks</td>

										<?php 

										

										$year_sem_start_end = $this->Consolidated_model->get_selected_semester_subject_for_result_year_sem($marksheet_id->id);

										$xp_year = explode("@@@",$year_sem_start_end);

										

										for($y=$xp_year[0];$y<=$xp_year[1];$y++){$k++;

											  

												$mark = $this->Consolidated_model->get_total_marks_cons($y,$marksheet_id->id);	

												$total_mark += $mark;

										?>

										<td><?=$mark?></td>

										<?php }?> 	

												<td><?=$total_mark?></td>	

												<td  rowspan="2">PASS</td>	

												<td  rowspan="2">

													<?php  

													$percent =($cgpa_total_marks*100)/$total_mark;

													$cgpa = $percent/9.5;

													echo number_format($cgpa,2);

													//echo $cgpa_total_marks/$cgpa_subject_count;  

													?>

												</td>

									</tr>

									<tr class="student-marks-total">

										<td>Mark Obtained</td>

										<?php 

										$year_sem_start_end = $this->Consolidated_model->get_selected_semester_subject_for_result_year_sem($marksheet_id->id);

										$xp_year = explode("@@@",$year_sem_start_end);

										

										for($y=$xp_year[0];$y<=$xp_year[1];$y++){$k++;

											$mark_obtaind = $this->Consolidated_model->get_total_obt_marks_cons($y,$marksheet_id->id);

											$total_mark_obtaind += $mark_obtaind;

										?>

										<td><?=$mark_obtaind?></td>

										<?php }?> 

											<td><?=$total_mark_obtaind?></td>

									</tr>

								</tbody>

							</table> 

							<?php $exam_month_year = $this->Consolidated_model->get_student_last_exam_month_year($marksheet->id)?>

							

							<div class="month-and-year">Month and Year of final exam : <span><?=$exam_month_year;?></span> </div>

							<?php } ?>	

					<!-----------------Final statement end----------------------->

					

					<div class="bottom-sign-section" style="bottom:95px">



					 <div class="left-remark" style="top:118px;">

							<div class="remark-info">

							   <!-- <span>Remarks:P- Pass; F- Fail; A- Absent Gm Grace Marks</span>-->

							</div>

							<div class="result-date">

							   <span>Date of issue: <p class="date-text"> <strong><?=date("d-M-Y",strtotime($marksheet_id->issue_date))?></p></strong></span>

							</div>

						</div>

						<div class="barcode-middle" style="text-align:center;">

						<img class="barcode-img" style="top:106px; height: 35px;" alt="<?=$barcode?>" src="<?=base_url();?>barcode.php?codetype=Code39&size=40&text=<?=$barcode?>&print=true" />

						</div>

					<!-- <div class="right-controller">

							<div style="text-align:center;">

				 <img style="width: 90px;display: block;margin: 0px auto;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">

				 <strong class="marksheet_sign">Registrar / Controller of Examination</strong>

			</div>

			</div> -->



			<div class="right-controller">

				<div style="text-align:center;">

					<img style="width: 90px;display: block;margin: 0px auto;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$single->signature)?>">

					<strong class="marksheet_sign"><?=$single->dispalay_signature;?></strong>

				</div>

			</div>

	 

			</div>

			

		</div>  

		<!-- <div class="bottom_strip">

			<img src="<?=base_url();?>images/marksheet_footer_strip.png">

		</div> -->

		</div>

		</div>

		

	<?php }else if($p==2){?>	

		<div class="book letter_section" id="letter_section">

			<div class="page" >

				<div class="subpage"  style="background-image:url(<?=base_url();?>images/250-350.png);min-height: 349mm !important;

    padding-top: 5px;">



			

					<div class="print-wrapper">

						<?php  

							$smart = $marksheet_id->id."-".$marksheet->id."-".$marksheet->enrollment_number."-".$marksheet->student_name."-".$marksheet->father_name."-".$marksheet->created_on;

							$barcode = $marksheet->enrollment_number."-".$marksheet_id->id;

							$last_exam = $this->Consolidated_model->get_last_exam_year($marksheet->id);

							?>

						<div class="first-row">

							<div class="scan-img">

								<img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?=$smart?>&choe=UTF-8"/>

							</div>

							<div class="right-bar-code">

								<p>Serial No:<?=$marksheet_id->id?></p>

							</div>

						</div>

						<div style="clear:both"></div>

						<div class="markshit-header ">

							<h2 style="font-size:14px;color: #335c9e;margin-bottom: 6px; margin-top: 66px; visibility:hidden;">Imphal Arunachal Pradesh, INDIA</h2>

							<h2 class="statement"> Consolidated statement of marks</h2>

							<h3><?=$marksheet->course_name?> (<?=$marksheet->stream_name?>)</h3>

						</div>

						<div class="students-info student-info-left" style="margin-bottom: 0px;">

							<p>Name of Student: <?=$marksheet->student_name?></p>

							<p>Father's Name: <?=$marksheet->father_name?></p>

							<!--<p>Month and Year of last Exam Examination: <?php if(!empty($last_exam)){ echo $last_exam->exam_month.' '.$last_exam->exam_year;}?></p>-->

						</div>

						

						<div class="students-info student-info-right" style="height:35px;">

						  <p>Mother Name : <?=$marksheet->mother_name?></p>

						  <p>Enrollment .No. : <?=$marksheet->enrollment_number?></p>

						</div>

						<div style="clearboth"></div>

						<!-- <div style="text-align:center;color:#05549e"><h2 style="margin-top: 0px;">Annual Examination<h2></div> -->

						<div class="row">

							<div class="col-lg-6">

								<table class="students-exam-details" style="table-layout: fixed;">

									<thead>

										<tr class="heading_table"> 

											<th class="sr_no rotate" style="width: 15px; transform: translate(-3px, -1px);rotate: 270deg;">S.No.</th>

											<th style="width: 47px;">SUBJECT CODE</th>

											<th style="width: 200px;">SUBJECT TITLE</th>

											<th style="width: 13px;transform: translate(-13px, -1px);rotate: 270deg;" class="rotate">CREDITS</th>

											<th style="width: 13px;transform: translate(-15px, -1px);rotate: 270deg;" class="rotate">INTERNAL</th>

											<th style="width: 13px;transform: translate(-17px, -1px);rotate: 270deg;" class="rotate">EXTERNAL</th>

											<th style="width: 24px;transform: translate(-8px, -1px);rotate: 270deg;" class="rotate">MARKS OBTAINED</th>

											<th style="width: 20px;transform: translate(-11px, -1px);rotate: 270deg;" class="rotate">MAX.PASS MARK</th>

											<th style="width: 13px;transform: translate(-8px, -1px);rotate: 270deg;" class="rotate">GRADE</th>

											<th style="width: 22px;transform: translate(-6px, -1px);rotate: 270deg;" class="rotate">RESULT</th>

										</tr> 

									</thead>

								</table>

							</div>

							<div class="col-lg-6">

								<table class="students-exam-details" style="table-layout: fixed;">

									<thead>

										<tr class="heading_table"> 

											<th class="sr_no rotate" style="width: 15px; transform: translate(-3px, -1px);rotate: 270deg;">S.No.</th>

											<th style="width: 47px;">SUBJECT CODE</th>

											<th style="width: 200px;">SUBJECT TITLE</th>

											<th style="width: 13px;transform: translate(-13px, -1px);rotate: 270deg;"  class="rotate">CREDITS</th>

											<th style="width: 13px;transform: translate(-15px, -1px);rotate: 270deg;" class="rotate">INTERNAL</th>

											<th style="width: 13px;transform: translate(-17px, -1px);rotate: 270deg;" class="rotate">EXTERNAL</th>

											<th style="width: 24px;transform: translate(-8px, -1px);rotate: 270deg;" class="rotate">MARKS OBTAINED</th>

											<th style="width: 20px;transform: translate(-11px, -1px);rotate: 270deg;"  class="rotate" >MAX.PASS MARK</th>

											<th style="width: 13px;transform: translate(-8px, -1px);rotate: 270deg;" class="rotate">GRADE</th>

											<th style="width: 22px;transform: translate(-6px, -1px);rotate: 270deg;"  class="rotate">RESULT</th>

										</tr> 

									</thead>

								</table>

							</div>

						</div>

						

						<div class="row">

							

								<?php 

								$k=0;

									$year_sem_start_end = $this->Consolidated_model->get_selected_semester_subject_for_result_year_sem($marksheet_id->id);

									$xp_year = explode("@@@",$year_sem_start_end);

									

									for($i=$xp_year[0];$i<=$xp_year[1];$i++){$k++;

										if($k > 4 && $k <= $xp_year[1]){

											

									//for($i=1;$i<=$marksheet->year_sem;$i++){

									//if($i > 4 && $i <= 8 && $i <= $marksheet->year_sem){

									$subject = $this->Consolidated_model->get_selected_semester_subject_for_result($marksheet_id->id,$i);

									

										$sem_name = '';

										if($i == '1'){

											$sem_name = 'I';

										}else if($i == '2'){

											$sem_name = 'II';

										}else if($i == '3'){

											$sem_name = 'III';

										}else if($i == '4'){

											$sem_name = 'IV';

										}else if($i == '5'){

											$sem_name = 'V';

										}else if($i == '6'){

											$sem_name = 'VI';

										}else if($i == '7'){

											$sem_name = 'VII';

										}else if($i == '8'){

											$sem_name = 'VIII';

										}else if($i == '9'){

											$sem_name = 'IX';

										}else if($i == '10'){

											$sem_name = 'X';

										}else if($i == '11'){

											$sem_name = 'XI';

										}else if($i == '12'){

											$sem_name = 'XII';

										}

								?>

									<div class="col-lg-6">

										<table class="students-exam-details" style="table-layout: fixed;">

											<tbody>

												<tr class=""> 

													<th class="" colspan='10'><?=$sem_name;?> Semester</th>

												</tr>

											</tbody>

										</table>

										<table class="students-exam-details" style="table-layout: fixed;">

											<tbody>

												<?php if(!empty($subject)){

													$j=1; 

													$subject_count = count($subject);

													$remaining_row =10-$subject_count;

													foreach($subject as $subject_result){

														$total_year = $subject_result->year_sem;	

														$cgpa_total_marks = (int)$cgpa_total_marks+(int)$subject_result->internal_mark+(int)$subject_result->external_mark;

														$cgpa_subject_count++;

												?>

													<tr style="text-align: center;">

														<td style="width: 15px;"><?=$j++;?></td>

														<td style="text-align:left;width: 47px;"><?=$subject_result->subject_code;?></td>

														<td style="text-align:left; width: 175px;height:30px"><?=$subject_result->subject_name;?></td>

														<td style="width: 13px;"><?=$subject_result->credit?></td>

														<td style="width: 13px;"><?=$subject_result->internal_mark?></td>

														<td style="width: 13px;"><?=$subject_result->external_mark?></td>						

														<td style="width: 24px;"><?=$subject_result->internal_mark+$subject_result->external_mark?></td>

														<td style="width: 20px;"><?=$subject_result->total_marks?></td>

														<td style="width: 13px;"><?=$subject_result->grade?></td>

														<td style="width: 22px;"><?=$subject_result->result?></td>

													</tr>

												<?php }?>

												<?php if($remaining_row != 0){

													for($q=1;$q<=$remaining_row;$q++){

												?>

													<tr style="text-align: center;">

														<td style="width: 15px;"> &nbsp </td>

														<td style="text-align:left;width: 47px;"> &nbsp </td>

														<td style="text-align:left; width: 175px;height:30px"> &nbsp </td>

														<td style="width: 13px;"> &nbsp </td>

														<td style="width: 13px;"> &nbsp </td>

														<td style="width: 13px;"> &nbsp </td>						

														<td style="width: 24px;"> &nbsp </td>

														<td style="width: 20px;"> &nbsp </td>

														<td style="width: 13px;"> &nbsp </td>

														<td style="width: 22px;"> &nbsp </td>

													</tr>

												<?php }}?>

												<?php }else{?>

													<?php for($k=1;$k<=10;$k++){?>

														<tr style="text-align: center;">

															<td style="width: 15px;"> &nbsp </td>

															<td style="text-align:left;width: 47px;"> &nbsp </td>

															<td style="text-align:left; width: 175px;height:30px"> &nbsp </td>

															<td style="width: 13px;"> &nbsp </td>

															<td style="width: 13px;"> &nbsp </td>

															<td style="width: 13px;"> &nbsp </td>						

															<td style="width: 24px;"> &nbsp </td>

															<td style="width: 20px;"> &nbsp </td>

															<td style="width: 13px;"> &nbsp </td>

															<td style="width: 22px;"> &nbsp </td>

														</tr>

													<?php }?>

												<?php }?>

											</tbody>

										</table>

									</div>

								<?php }}?>

							

						</div>

						<p class="credit_note"><b><?=$marksheet_id->note?></b></p>

					</div>

					



					<!-----------------Final statement start----------------------->

							<?php if($total_page == $p){

								$total_mark_obtaind = 0;

								$mark_obtaind = 0;

								$total_mark = 0;

								$mark = 0;	

								//$percent=(int)($total_mark*100)/(int)$mark_obtaind;

								$percent =0;

							?>

								

							

							

							<table class="students-exam-details" style="margin-top: 23px;width: 97%;">

								<body>

									<div class="clearfix"></div>

									<tr class="student-marks-total">

										<td>SEM/YEAR</td>

										<?php

										$year_sem_start_end = $this->Consolidated_model->get_selected_semester_subject_for_result_year_sem($marksheet_id->id);

										$xp_year = explode("@@@",$year_sem_start_end);

										

										for($y=$xp_year[0];$y<=$xp_year[1];$y++){$k++;

										?>

										<td><?=$y?></td>

										<?php }?> 

										<td>Grand Total</td>

										<td>Result</td>

										<td>SGPA/CGPA</td>

									</tr>

									<tr class="student-marks-total">

										<td>Full Marks</td>

										<?php 

											$year_sem_start_end = $this->Consolidated_model->get_selected_semester_subject_for_result_year_sem($marksheet_id->id);

											$xp_year = explode("@@@",$year_sem_start_end);

										

										for($y=$xp_year[0];$y<=$xp_year[1];$y++){$k++;

										

												$mark = $this->Consolidated_model->get_total_marks_cons($y,$marksheet_id->id);	

												$total_mark += $mark;

										?>

										<td><?=$mark?></td>

										<?php }?> 	

												<td><?=$total_mark?></td>	

												<td  rowspan="2">PASS</td>	

												<td  rowspan="2">

													<?php  

													$percent =($cgpa_total_marks*100)/$total_mark;

													$cgpa = $percent/9.5;

													echo number_format($cgpa,2);

													//echo $cgpa_total_marks/$cgpa_subject_count;  

													?>

												</td>

									</tr>

									<tr class="student-marks-total">

										<td>Mark Obtained</td>

										<?php

										

										$year_sem_start_end = $this->Consolidated_model->get_selected_semester_subject_for_result_year_sem($marksheet_id->id);

										$xp_year = explode("@@@",$year_sem_start_end);

										

										for($y=$xp_year[0];$y<=$xp_year[1];$y++){$k++;

										

											$mark_obtaind = $this->Consolidated_model->get_total_obt_marks_cons($y,$marksheet_id->id);

											$total_mark_obtaind += $mark_obtaind;

										?>

										<td><?=$mark_obtaind?></td>

										<?php }?> 

											<td><?=$total_mark_obtaind?></td>

									</tr>

								</tbody>

							</table> 

							<?php $exam_month_year = $this->Consolidated_model->get_student_last_exam_month_year($marksheet->id)?>

							

							<div class="month-and-year">Month and Year of final exam : <span><?=$exam_month_year;?></span> </div>

							<?php } ?>	

					<!-----------------Final statement end----------------------->

					

					<div class="bottom-sign-section" style="bottom:95px">



					 <div class="left-remark" style="top:118px;">

							<div class="remark-info">

							   <!-- <span>Remarks:P- Pass; F- Fail; A- Absent Gm Grace Marks</span>-->

							</div>

							<div class="result-date">

							   <span>Date of issue: <p class="date-text"> <strong><?=date("d-M-Y",strtotime($marksheet_id->issue_date))?></p></strong></span>

							</div>

						</div>

						<div class="barcode-middle" style="text-align:center;">

						<img class="barcode-img" style="top:106px; height: 35px;" alt="<?=$barcode?>" src="<?=base_url();?>barcode.php?codetype=Code39&size=40&text=<?=$barcode?>&print=true" />

						</div>

					<!-- <div class="right-controller">

							<div style="text-align:center;">

				 <img style="width: 90px;display: block;margin: 0px auto;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">

				 <strong class="marksheet_sign">Registrar / Controller of Examination</strong>

			</div>

			</div>

				  -->



				  <div class="right-controller">

				<div style="text-align:center;">

					<img style="width: 90px;display: block;margin: 0px auto;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$single->signature)?>">

					<strong class="marksheet_sign"><?=$single->dispalay_signature;?></strong>

				</div>

			</div>

			</div>

			

		</div>  

		<!-- <div class="bottom_strip">

			<img src="<?=base_url();?>images/marksheet_footer_strip.png">

		</div> -->

		</div>

		</div>

	<?php }?>

<?php }

//}

?>	



 <script src="<?=base_url();?>back_panel/vendors/base/vendor.bundle.base.js"></script>

  <script src="<?=base_url();?>js/bootstrap.min.js"></script>

    <script src="<?=base_url();?>css/marksheet/main.js"></script>

	

	

	

    

    

</body>

</html>