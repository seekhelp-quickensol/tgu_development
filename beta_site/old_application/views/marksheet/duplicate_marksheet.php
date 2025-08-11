<?php $obj = new SimpleFunctions(); ?>
<?php if(empty($marksheet)){ redirect(base_url());}
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
            width: 210mm;
            min-height: 297mm;
            padding: 0mm;
            margin: 0mm auto;
            border-radius: 5px;
            background: white;
            
			position: relative;
        }
        
        .subpage {
           
			position:relative;
            min-height: 295mm;
            /*border: 2px solid transparent;*/
			background-size: cover;
            background-position: center;
			/*border: none;*/
			border-left: 6px solid #fff;
			border-right: 7px solid #fff;
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
            padding-top: 75px;
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
            margin-bottom: 15px;
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
            margin-bottom: 10px;
        }
        
        .students-info p {
            font-size: 13px;
            font-weight: 500;
            color: #000;
            line-height: 1;
        }
        
        .students-exam-details th {
            color: #d53a9d;
        }
        
        table {
            border-collapse: collapse;
        }
        
        .students-exam-details th,
        td {
            font-size: 12px;
            font-weight: 500;
            border-collapse: collapse !important;
            /*background: #ffffffa3 !important;*/
            border-color: #8a6eaf;
            border: 1px solid #8a6eaf;
            border-collapse: collapse;
            padding:3px;
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
    top: 51px;
}
        
		.barcode-middle {
			
			  float: left;
            width:32.5%;
		}
		
		.bottom-sign-section {
			/*height: 90px;*/
			position: absolute;
			width: 20.4cm;
			bottom: 50px;
			width: 100%;
			padding:0px 15px;
		}
.barcode-img {
    max-width: 85%;
    height: 33px;
    position: relative;
    top: 50px;
}
        .right-controller {
            float: left;
            width: 32.5%;
        }
        
        .marks-center {
            text-align: center;
        }
        
        .students-exam-details {
            margin-bottom: 15px;
			width: 92%;	
			margin: 0px auto;
        }
		
		.bottom_strip{
			position: absolute;
			bottom: 0px;
		}
		.bottom_strip img{
			width: 100%;
		}
		.scan-img img{
			width: 75%;
		}
		.total_marks{
		    width: 92%;
            margin: 15px auto;
		}
        
        @page {
            size: A4;
            margin: 0;
        }
        
        @media print {
            html,
            body {
                width: 210mm;
                height: 297mm;
            }
            .print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="book">
        <div class="page">
            <div class="subpage"  style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/new_marksheet-background.png')?>)">
<?php 
	$courses = array(262,263,261,228,278);
	
	if(!empty($marksheet) && in_array($marksheet->course_id,$courses)){
		
		?>
		
            <div class="print-wrapper">
            <?php 
				$smart = $marksheet->id."-".$marksheet->student_id."-".$marksheet->enrollment_number."-".$marksheet->marksheet_number."-".$marksheet->student_name."-".$marksheet->father_name."-".$marksheet->examination_month."-".$marksheet->examination_year."-".$marksheet->created_on;
				$barcode = $marksheet->enrollment_number."-".$marksheet->marksheet_number;
				?>
            <div class="first-row">
                        <div class="scan-img">
                            <img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?=$smart?>&choe=UTF-8"/>
                        </div>
                        <div class="right-bar-code">
                            <p>Serial No:<?=$marksheet->id?></p>
                           
				<p style="color: #e41212;padding: 10px 0px 0px 96px;">DUPLICATE</p>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class="markshit-header ">
                        <h2 style="font-size:14px;color: #335c9e;margin-bottom: 6px; margin-top: 66px;">Imphal Arunachal Pradesh, INDIA</h2>
                        <h2 class="statement"> Marksheet</h2>
                        <h3><?=$marksheet->course_name?> <?php if($marksheet->print_stream == 1){ echo "(".$marksheet->stream_name.")";}?></h3>
                    </div>
                    <div class="students-info student-info-left" style="margin-bottom: 0px;">
                        <p>Name of Student: <?=$marksheet->student_name?></p>
                        <p>Father's Name: <?=$marksheet->father_name?></p>
                        <p>Session: <?=$marksheet->pre_session?></p>
                    </div>
                    <div class="students-info student-info-right;" style="height:95px;">
                      <p>Mother Name : <?=$marksheet->mother_name?></p>
                      <p>Enrollment .No. : <?=$marksheet->enrollment_number?></p>
                      <?php if($marksheet->course_id == 278){?>
                      <p>Date of Birth : <?=date("d/m/Y",strtotime($marksheet->date_of_birth))?></p>
						<?php }?>
                       
                         
                    </div>
					<div style="clearboth"></div>
					<div style="text-align:center;color:#05549e"><h2 style="margin-top: 0px;">Annual Examination<h2></div>
					 <table class="students-exam-details">
                        
                    
					<thead>
                   <tr class="heading_table">
                        <th>Code</th>
                        <th>Subject</th>
                        <th>Mark Obtained</th>
                        <th>Minimum  Mark</th>
                        <th>Maximum Mark</th>
                    </tr>
					</thead>
					<tbody>
                    <?php 
					$subject = $this->Exam_model->get_selected_subject_for_result($marksheet->result_id); 
					$total_internal_mark_obtained = 0;
					$total_external_max_marks = 0;
					$total_external_marks_obtained = 0;
					if(!empty($subject)){
					foreach($subject as $subject_result){
						
						
					 $total_internal_marks_obtained1 = $subject_result->internal_marks_obtained;
					 $total_external_marks_obtained1 = $subject_result->external_marks_obtained;
					 $total_obtained = $total_internal_marks_obtained1 + $total_external_marks_obtained1;
					 $total += $total_obtained;
					 $total_internal_max_mark1 = $subject_result->internal_max_marks;
					 $total_external_max_mark1 = $subject_result->external_max_marks;
					 $total_max_marks = $total_internal_max_mark1 + $total_external_max_mark1;		
					 $total_max += $total_max_marks;
					 $fourty_percente = ( $total_max_marks * 40 ) / 100	;
					 $total_ = $subject_result->external_max_marks;
						
								 $total_internal_mark += $subject_result->internal_max_marks;
														$total_internal_mark_obtained += $subject_result->internal_marks_obtained;
														$total_external_max_marks += $subject_result->external_max_marks;
														$total_external_marks_obtained += $subject_result->external_marks_obtained;
								
													
											?>
                    <tr style="text-align: center;">
                         <td><?=$subject_result->subject_code?></td>
                         <td><?=$subject_result->subject_name?></td>
                        <td><?=$total_obtained?></td>
                        <td><?=$fourty_percente?></td>
                        <td><?=$total_max_marks ?></td>
                    </tr>
                    <?php  }}
                    
                   $total_int_mark = $total_internal_mark+$total_external_max_marks;
											$total_obt = $total_internal_mark_obtained+$total_external_marks_obtained;
											$percent=($total_obt*100)/$total_int_mark;
								
											if($percent>=60){
												$division="First";
											}else if($percent<60 && $percent>=45){
												$division="Second";
											}else{ 
												$division="Third";
											}
											
											if($percent >= 90){
												$grade ="A+"; 
											}else if($percent >= 80 && $percent < 90){
												$grade ="A"; 
											}else if($percent >= 70 && $percent < 80){
												$grade ="B+"; 
											}else if($percent >= 60 && $percent < 70){
												$grade ="B"; 
											}else if($percent >= 50 && $percent < 60){
												$grade ="C"; 
											}else if($percent >= 45 && $percent < 50){
												$grade ="D"; 
											}else if($percent >= 40 && $percent < 45){
												$grade ="E"; 
											}else if($percent < 40){
												$grade ="F"; 
											}
										
                    
                    ?>
                   <tr>
                        <td colspan="4">Result</td>
                        <td style="text-align: center;"><?php if($marksheet->result == "0"){ echo "PASS";}else if($marksheet->result == "1"){ echo "FAIL";}else if($marksheet->result == "2"){ echo "REAPPEAR";}else if($marksheet->result == "3"){ echo "ABSENT";}?></td>
                    </tr>
					</tbody>
                </table>
                <table class="students-exam-details">
                    <tr>
                        <th></th>
                        <th>Annual</th>
                        <th>Grand Total</th>
                        <th>Division</th>
                        
                    </tr>
                    <tr>
                        <th>Maximum Mark</th>
                        <th><?=$total_max?></th>
                        <th rowspan="2"><?=$total?></th>
                        <th rowspan="2"><?=$division?></th>
                        
							 
                    </tr>
                    <tr>
                        <th>Total Mark Obtained</th>
                        <th><?=$total?></th>
                    </tr>
                </table>
                <h3 class="total_marks" style="color:#05549e">Marks in words : <span><?=$obj->toText($total );?></span> </h3>
                 
                </div>
				
				<div class="bottom-sign-section" style="bottom:50px">

				 <div class="left-remark" style="top:60px;">
                        <div class="remark-info">
                            <span>Remarks:P- Pass; F- Fail; A- Absent Gm Grace Marks</span>
                        </div>
                        <div class="result-date">
                           <span>Date of issue: <p class="date-text"> <strong><?=date("d-M-Y",strtotime($marksheet->marksheet_issue_date))?></p></strong></span>
                        </div>
                    </div>
					<div class="barcode-middle" style="text-align:center;">
					<img class="barcode-img" style="top:54px; height: 35px;" alt="<?=$barcode?>" src="<?=base_url();?>barcode.php?codetype=Code39&size=40&text=<?=$barcode?>&print=true" />
					</div>
				<div class="right-controller">
                        <div style="text-align:center;">
			
			 <!-- <?php if($marksheet->examination_month == "August"  && $marksheet->examination_year =="2021"){?>
			<img style="width: 80px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png')?>">
			<?php }else if($marksheet->examination_month == "January"  && $marksheet->examination_year =="2021"){?>
			<img style="width: 80px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>"> 
			<?php }else if($marksheet->examination_month == "January"  && $marksheet->examination_year =="2022"){?>
				<img style="width: 80px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>"> 
			<?php }?>  
		            <strong class="marksheet_sign">Registrar / Controller of Examination</strong> -->
                    <img style="width: 80px;margin-right: -138px;margin-bottom: 13px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$marksheet->signature)?>">   
                <p style="margin-right: -138px;"><?=$marksheet->dispalay_signature;?></p>
		</div>
		</div>
            <div class="signature_marksheet"></div>
        </div>
		
    </div>  
    <div class="bottom_strip">
		<img src="<?=$this->Digitalocean_model->get_photo('images/marksheet_footer_strip.png')?>">
	</div>
		
		<?php
	}
	else{
	
	?>
	 <div class="print-wrapper">
		<?php 
		$smart = $marksheet->id."-".$marksheet->student_id."-".$marksheet->enrollment_number."-".$marksheet->marksheet_number."-".$marksheet->student_name."-".$marksheet->father_name."-".$marksheet->examination_month."-".$marksheet->examination_year."-".$marksheet->created_on;
		$generated_qr = $this->Common_model->generate_qrcode_data($smart);
        $barcode = $marksheet->id."-".$marksheet->student_id."-".$marksheet->enrollment_number."-".$marksheet->marksheet_number;
		?>
		<div class="first-row">
			<div class="scan-img">
				<!-- <img src="https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl=<?=$smart?>&choe=UTF-8"/> -->
                <img style="width:70px !important;" src="<?=$generated_qr;?>"/>
			</div>
			<div class="right-bar-code">
				<p> Serial No:<?=$marksheet->id?></p>
				<p style="color: #e41212;padding: 10px 0px 0px 96px;">DUPLICATE</p>
			</div>
		</div>
		<div style="clear:both"></div>
		<div class="markshit-header ">
			<h2 style="font-size:14px;color: #335c9e;margin-bottom: 6px;margin-top:66px;">Imphal Arunachal Pradesh, INDIA</h2>
			<h2 class="statement"> Statements of marks</h2>
			<h3><?=$marksheet->course_name?> <?php if($marksheet->print_stream == 1){ echo $marksheet->stream_name;}?></h3>
		</div>
		<div class="students-info student-info-left">
			<p>Name: <?=$marksheet->student_name?></p>
			<p> Father's Name: <?=$marksheet->father_name?></p>
			<p> Enrollment .No. : <?=$marksheet->enrollment_number?></p>
		</div>
		<div class="students-info student-info-right">
			<p>Seat No.: <?=$marksheet->marksheet_number?></p>
			<p>  <?php if($marksheet->display_mode == "1"){?>Year<?php }else{?>Semester<?php }?></strong>: <?=$roman_arr[$marksheet->year_sem]?></p>
			<p> Month &amp; Year Of Exam : <?=$marksheet->examination_month?> <?=$marksheet->examination_year?></p>
		</div>
            <table class="students-exam-details">
				<thead>
					<tr>
						<th rowspan="2" colspan="1">Paper Code</th>
						<th rowspan="2" colspan="1">Paper Title</th>
						<th rowspan="1" colspan="2">Internal Assessment</th>
						<th rowspan="1" colspan="2">External Assessment</th>
						<th rowspan="1" colspan="2">Total</th>
						<th rowspan="2" colspan="1">Remarks</th>
					</tr>
					<tr>
						<th rowspan="2">Maximum Marks</th>
						<th rowspan="2">Marks Secured</th>
						<th rowspan="1">Maximum Marks</th>
						<th rowspan="1">Marks Secured</th>
						<th rowspan="1">Max Marks</th>
						<th rowspan="1">Marks Secured</th>
						<!-- <th rowspan="1">Marks Secured</th> -->
						<!-- <th rowspan="2">Section</th> -->
					</tr>
				</thead>
				<tbody>
				 
						<?php 
							$subject = $this->Exam_model->get_selected_subject_for_result($marksheet->result_id);
							$total_internal_mark = 0;
							$total_internal_mark_obtained = 0;
							$total_external_max_marks = 0;
							$total_external_marks_obtained = 0;
							$total_rows = 1;
							if(!empty($subject)){
								foreach($subject as $subject_result){
									$total_internal_mark += $subject_result->internal_max_marks;
									$total_internal_mark_obtained += $subject_result->internal_marks_obtained;
									$total_external_max_marks += $subject_result->external_max_marks;
									$total_external_marks_obtained += $subject_result->external_marks_obtained;
						?>
						<tr style="text-align: center;">
							<td><?=$subject_result->subject_code?></td>
							<td><?=$subject_result->subject_name?></td> 
							<?php if($subject_result->internal_max_marks != "0"){?>
								<td><?=$subject_result->internal_max_marks?></td>
							<?php }else{?>
								<td>-</td>
							<?php }?>
							<?php if($subject_result->internal_marks_obtained != "0"){?>
								<td><?=$subject_result->internal_marks_obtained?></td>
							<?php }else{?>
								<td>-</td>
							<?php }?>
							<td><?=$subject_result->external_max_marks?></td>
							<td><?=$subject_result->external_marks_obtained?></td>
							<td><?=$subject_result->internal_max_marks+$subject_result->external_max_marks?></td>
							<td><?=$subject_result->internal_marks_obtained+$subject_result->external_marks_obtained?></td>
							<td><?php if($subject_result->result == "0"){ echo "P";}else if($subject_result->result == "1"){ echo "F";}else{ echo "A";}?></td>
						</tr>
						 
						<?php $total_rows++; }}
							$extra = 11-$total_rows;
							for($e=1;$e<=$extra;$e++){
								?>
								<tr style="height:22px">
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
								<?php 
							}
						$total_int_mark = $total_internal_mark+$total_external_max_marks;
						$total_obt = $total_internal_mark_obtained+$total_external_marks_obtained;
						$percent=($total_obt*100)/$total_int_mark;
						if($percent>=60){
							$division="First";
						}else if($percent<60 && $percent>=45){
							$division="Second";
						}else{ 
							$division="Third";
						}
						if($percent >= 90){
							$grade ="A+"; 
						}else if($percent >= 80 && $percent < 90){
							$grade ="A"; 
						}else if($percent >= 70 && $percent < 80){
							$grade ="B+"; 
						}else if($percent >= 60 && $percent < 70){
							$grade ="B"; 
						}else if($percent >= 50 && $percent < 60){
							$grade ="C"; 
						}else if($percent >= 45 && $percent < 50){
							$grade ="D"; 
						}else if($percent >= 40 && $percent < 45){
							$grade ="E"; 
						}else if($percent < 40){
							$grade ="F"; 
						}
						?>
						<tr class="student-marks-total">
							<td rowspan="" colspan="6" style="font-weight:600;font-size:13px">Grand Total</td>
							<td><?=$total_int_mark?></td>
							<td><?=$total_obt?></td>
							<td><?=number_format($percent,2)?>%</td>
						</tr>
						<tr  class="student-marks-total" style="background-color:transparent">
							<td rowspan="" colspan="6" style="font-weight:600;font-size:13px">Result</td>
							<!--<td style="font-weight:600;font-size:16px">Grade</td>
							<td><?=$grade?></td>-->
							<td style="font-weight:600;font-size:13px"></td>
							<td></td>
							<td style="font-weight:600;font-size:13px"><?php if($marksheet->result == "0"){ echo "PASS";}else if($marksheet->result == "1"){ echo "FAIL";}else if($marksheet->result == "2"){ echo "REAPPEAR";}else if($marksheet->result == "3"){ echo "ABSENT";}?></td>
						</tr>
						
                        </tbody>
                    </table> 
					
				<div class="bottom-sign-section" style="">

					<div class="left-remark">
                        <div class="remark-info">
                            <span>Remarks:P- Pass; F- Fail; A- Absent Gm Grace Marks</span>
                        </div>
                        <div class="result-date">
                           <span>Date of issue: <p class="date-text"> <strong><?=date("d-M-Y",strtotime($marksheet->marksheet_issue_date))?></p></strong></span>
                        </div>
                    </div>
					<div class="barcode-middle" style="text-align:center;">
					<img class="barcode-img" alt="<?=$barcode?>" src="<?=base_url();?>barcode.php?codetype=Code39&size=40&text=<?=$barcode?>&print=true" />
					</div>
                    <div class="right-controller">
                        <div style="text-align:center;"> 
							   <!-- <?php if($marksheet->examination_month == "August"  && $marksheet->examination_year =="2021"){?>
									<img style="width: 80px;margin-right: -138px;margin-bottom: 13px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png')?>">
									<?php }else if($marksheet->examination_month == "January"  && $marksheet->examination_year =="2021"){?>
									<img style="width: 80px;margin-right: -138px;margin-bottom: 13px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>"> 
									<?php }else if($marksheet->examination_month == "January"  && $marksheet->examination_year =="2022"){?>
										<img style="width: 80px;margin-right: -138px;margin-bottom: 13px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>"> 
									<?php }else if($marksheet->examination_month == "July"  && $marksheet->examination_year =="2022"){?>
										<img style="width: 80px;margin-right: -138px;margin-bottom: 13px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>"> 
									<?php }else if($marksheet->examination_month == "August"  && $marksheet->examination_year =="2022"){?>
									<img style="width: 80px;margin-right: -138px;margin-bottom: 13px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>"> 									
									<?php }?>
							<strong>Controller of Examinations/Dy. Registrar</strong> -->

                            <img style="width: 80px;margin-right:-138px;margin-bottom: 13px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$marksheet->signature)?>">   
                            <p style="margin-right: -138px;"><?=$marksheet->dispalay_signature;?></p>

							</div>
						</div>
				</div>
				<?php if($marksheet->credit_transfer == '1'){?>
					<div class="credit_transfer_remark" style="position: absolute;bottom: 34px;left: 18px;">
						<span><?=$marksheet->credit_transfer_remark;?></span>
					</div>
				<?php }?>
			</div>
		</div><!--row end-->
		<div class="bottom_strip">
					<img src="<?=$this->Digitalocean_model->get_photo('images/marksheet_footer_strip.png')?>">
				</div>
   
</div>
</div>
                 
				
                
            </div>
            
        </div>
    </section>
  
<?php }?>

  <script src="<?=base_url();?>js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>css/marksheet/main.js"></script>
</body>
</html>