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
            padding: 0 0 0 0px;
            margin-bottom: 0;
			margin-top: 0;
			font-weight: 600;
        }
        
        .scan-img {
            float: right;
			text-align:center;
        }
        
        .right-bar-code {
            float: left;
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
			color: #510000;
            text-transform: uppercase;
            margin-bottom: 15px;
            position: relative;
            margin-top: 15px;
			font-family: 'ariblk_0';
        }
        
        /* .statement::before {
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
        } */
        
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
            color: #000000;
			border: 1px solid #000000;
        }
        
        table {
            border-collapse: collapse;
			border: 1px solid #000000;
			font-family: 'ariblk_0';
			color:#000000;
			font-weight:700;
			text-align:center;
        }
        
        .students-exam-details th,
        td {
            font-size: 14px;
            /* font-weight: 500; */
            border-collapse: collapse !important;
            /*background: #ffffffa3 !important;*/
            /* border-color: #8a6eaf; */
            border-left: 1px solid #000000;
            border-collapse: collapse;
            padding:8px;
			color:#000000;
			font-weight:700;
			
        }
        
        tbody tr {
            border-image-source: linear-gradient(to left, #743ad5, #d53a9d) !important;
            border-collapse: collapse !important;
        }
        
        .student-marks-total {
            text-align: center;
			border: 1px solid #000000;
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
    top: 55px;
}
        
		.barcode-middle {
			
			  float: left;
            width:32.5%;
		}
		
		.bottom-sign-section {
			/*height: 90px;*/
			position: absolute;
			width: 20.4cm;
			bottom: 60px;
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
		.head_table_1{
			width: 92%;
			margin: 0 auto;
			border: none;
			margin-bottom:8px;
			font-size: 14px;
		}
		.head_table_1 td{
			border:none;
			text-align:center;
		}
		
		.head_table_1 th{
			border:1px solid #000;
			text-align:center;
			width:50%;
			padding:10px 0px;
		}
		.head_table_2{
			width: 92%;
    		margin: 0 auto;
			border: none;
			font-size: 14px;
		}
		.head_table_2 td{
			border:none;
			text-align:center;
		}
		.head_table_2 th{
			border:1px solid #000;
			text-align:center;
			width:calc(100% / 3);
			padding:10px 0px;
		}
		.head_table_3{
			width: 92%;
    		margin: 0 auto;
			border: none;
			margin-bottom:15px; 
			font-size: 14px;
		}
		.head_table_3 th{
			border:1px solid #000;
			text-align:center;
			padding:10px 0px;
			text-transform:uppercase;
		}
		.td-left-text{
			text-align:left;
			padding-left:25px;
		}
		.no_border{
			border:none;
		}
    </style>
</head>

<body>
    <div class="book">
        <div class="page">
            <div class="subpage"  style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet_background.png')?>)">
<?php 
	$courses = array(262,263,261,228,278);
	
	if(!empty($marksheet) && in_array($marksheet->course_id,$courses)){
		?>
		
            <div class="print-wrapper">
            <?php 
				$smart = $marksheet->id."-".$marksheet->student_id."-".$marksheet->enrollment_number."-".$marksheet->marksheet_number."-".$marksheet->student_name."-".$marksheet->father_name;
				
				
				$generated_qr = $this->Common_model->generate_qrcode_data($smart);
				$barcode = $marksheet->enrollment_number."-".$marksheet->marksheet_number;
				?>
            <div class="first-row">
                        <div class="scan-img">
						<p style="color:red;"><b>Duplicate</b></p>
                            <!-- <img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?=$smart?>&choe=UTF-8"/> -->
							<img style="width:70px !important;" src="<?=$generated_qr;?>"/>
                        </div>
                        <div class="right-bar-code">
                            <p>
								<?php if(date("Y-m-d",strtotime($marksheet->created_on)) < "2022-08-23"){?>Sr No:<?=$marksheet->sr_number?><?php }?>
							</p>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class="markshit-header ">
                        <h2 style="font-size:14px;color: #335c9e;margin-bottom: 6px; margin-top: 66px;">Imphal Arunachal Pradesh, INDIA</h2>
                        <h2 class="statement">Annual Statements of marks</h2>
						
                        <!-- <h3><?=$marksheet->course_name?> <?php if($marksheet->print_stream == 1){ echo "(".$marksheet->stream_name.")";}?></h3> -->
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
					<tbody >
                    <?php 
					$subject = $this->Separate_student_model->get_selected_subject_for_result($marksheet->result_id);
					// echo "<pre>";print_r($subject);exit; 
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
                    <tr style="text-align: center;text-transform: uppercase;">
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

				 <div class="left-remark" style="top:44px;">
                        <div class="remark-info">
                            <span>Remarks:P- Pass; F- Fail; A- Absent Gm Grace Marks</span>
                        </div>
                        <div class="result-date">
                           <span>Date of issue: <p class="date-text"> <strong><?=date("d-M-Y",strtotime($marksheet->marksheet_issue_date))?></p></strong></span>
                        </div>
                    </div>
					<div class="barcode-middle" style="text-align:center;">
					<img class="barcode-img" style="top:40px; height: 35px;" alt="<?=$barcode?>" src="<?=base_url();?>barcode.php?codetype=Code39&size=40&text=<?=$barcode?>&print=true" />
					</div>
				<div class="right-controller">
                        <div style="text-align:center;">
			 <?php 
			 
			 $old = array(2020069063020779,2020069067071990,2020069067060985,2020069067062976);
			 if(in_array($marksheet->enrollment_number,$old) && $marksheet->year_sem == 1){?>
				<img style="width: 98px;display: block;margin: 0px auto;margin-bottom: -22px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/seprate_reg.PNG')?>">
				<?php }else{?>
				    <?php if($marksheet->examination_month == "August"  && $marksheet->examination_year =="2021"){?>
    					<?php if(date("Y-m-d",strtotime($marksheet->created_on)) <= '2022-02-12'){?>
    						<img style="width: 80px;display: block;margin: 0px auto;margin-bottom: -22px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png')?>">
    					<?php }else if(date("Y-m-d",strtotime($marksheet->created_on)) >= '2022-02-19'){?>
    						<img style="width: 95px;display: block;margin: 0px auto;margin-bottom: -22px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
    					<?php }?>
				    <?php }else if($marksheet->examination_month == "January"  && $marksheet->examination_year =="2022"){?>
    					<!--<img style="width: 80px;margin-right: -124px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/new_reg.png");?>">-->
    					<?php if(date("Y-m-d",strtotime($marksheet->created_on)) <= '2022-02-12'){?>
    						<img style="width: 80px;display: block;margin: 0px auto;margin-bottom: -22px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png')?>">
    					<?php }else if(date("Y-m-d",strtotime($marksheet->created_on)) >= '2022-02-19'){?>
    						<img style="width: 81px;display: block;margin: 0px auto;margin-bottom: -22px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
    					<?php }?>
				    <?php }else if($marksheet->examination_month == "July"  && $marksheet->examination_year =="2021"){?>
				    <img style="width: 81px;display: block;margin: 0px auto;margin-bottom: -22px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
				    <?php }else if($marksheet->examination_month == "July"  && $marksheet->examination_year =="2022"){?>
				    <img style="width: 81px;display: block;margin: 0px auto;margin-bottom: -22px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
					<?php }else if($marksheet->examination_month == "January"  && $marksheet->examination_year =="2023"){?>
				    <img style="width: 81px;display: block;margin: 0px auto;margin-bottom: -22px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
				    <?php }?>
					
					
					<?php }?>
		            <strong class="marksheet_sign">Registrar / Controller of Examination</strong>
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
		$smart = $marksheet->id."-".$marksheet->student_id."-".$marksheet->enrollment_number."-".$marksheet->marksheet_number."-".$marksheet->student_name."-".$marksheet->father_name;
		$barcode = $marksheet->id."-".$marksheet->student_id."-".$marksheet->enrollment_number."-".$marksheet->marksheet_number;
		?>
		<div class="first-row">
			<div class="scan-img">
			<p style="color:red;"><b>Duplicate</b></p> 
				<img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?=$smart?>&choe=UTF-8"/>
			
			</div>
			<div class="right-bar-code">
				<p><?php   
					/*$exam_month_arr = array('May 2021','August 2021','January 2021','January 2022');
					$compare = $marksheet->examination_month.' '.$marksheet->examination_year;
					if(in_array($compare,$exam_month_arr)){
						if($marksheet->id <= 1950 && $marksheet->year_sem > "1"){
					?>
					Serial No:<?=$marksheet->id?>
				<?php }
				if($marksheet->id >= 1950 && $marksheet->year_sem == "1"){
					?>
					Serial No:<?=$marksheet->id?>

					<?php }}else if(in_array($marksheet->enrollment_number,array(20200690629008975,20200690270920793)) && $marksheet->year_sem == "2"){?>
					Serial No:<?="2".$marksheet->id."0";?>
					<?php }*/?>
					Sr No:<?=$marksheet->sr_number;?>
				</p>
				<!-- <p style="color: #e41212;padding: 10px 0px 0px 96px;">DUPLICATE</p>  -->
			</div>
		</div>
		<div style="clear:both"></div>
		<div class="markshit-header ">
			<h2 style="font-size:14px;color: #335c9e;margin-bottom: 40px;margin-top:66px;"></h2>
			<h2 class="statement">Annual Statements of marks</h2>
			<!-- <h3><?=$marksheet->course_name?> <?php if($marksheet->print_stream == 1){ echo "(".$marksheet->stream_name.")";}?></h3> -->
		</div>
					<table class="head_table_1">
						<tr>
							<th>CANDIDATE’S NAME</th>
							<th>MONTH & YEAR OF EXAMINATION</th>
						</tr>
						<tr>
							<td><?=$marksheet->student_name?></td>
							<td><?=$marksheet->examination_month?> <?=$marksheet->examination_year?></td>
						</tr>
					</table>
					
					<table class="head_table_2">
						<tr>
							<th>ENROLLMENT NO.</th>
							<th>MOTHER’S NAME</th>
							<th>FATHER’S NAME</th>
						</tr>
						<tr>
							<td><?=$marksheet->enrollment_number?></td>
							<td><?=$marksheet->mother_name?></td>
							<td><?=$marksheet->father_name?></td>
						</tr>
					</table>
				
					<table class="head_table_3">
						<tr>
							<th>COURSE NAME</th>
							<th><?=$marksheet->course_name?> <?php if($marksheet->print_stream == 1){ echo "(".$marksheet->stream_name.")";}?></th>
						</tr>
					</table>
					

		<!-- <div class="students-info student-info-left">
			<p>Name: <?=$marksheet->student_name?></p>
			<p> Father's Name: <?=$marksheet->father_name?></p>
			<p> Enrollment .No. : <?=$marksheet->enrollment_number?></p>
		</div> -->
		<!-- <div class="students-info student-info-right">
			<p>Seat No.: <?=$marksheet->marksheet_number?></p>
			<p>  Year/Sem</strong>: <?=$roman_arr[$marksheet->year_sem]?></p>
			<p> Month &amp; Year Of Exam : <?=$marksheet->examination_month?> <?=$marksheet->examination_year?></p>
		</div> -->

		<table class="students-exam-details">
			<thead>
				<tr>
					<th style="width: 42%;" rowspan="2" colspan="1">Subject Name</th>
					<th style="width: 10%;" rowspan="2" colspan="1">Max. Marks</th>
					<th rowspan="1" colspan="3">Marks Obtained <br> In Figures</th>
					<th rowspan="2" colspan="1">Total In <br> Words</th>
				</tr>
				<tr>
					<th style="width: 10%;" rowspan="2">Theory</th>
					<th style="width: 10%;" rowspan="2">Practical</th>
					<th style="width: 10%;" rowspan="2">Total</th>
				</tr>
			</thead>
			<tbody>
			<?php 
					$subject = $this->Separate_student_model->get_selected_subject_for_result($marksheet->result_id); 
					

					$total_internal_mark_obtained = 0;
					$total_external_max_marks = 0;
					$total_external_marks_obtained = 0;
					$total = 0;
					$total_internal_mark = 0;
					$subjectcount = 0;
				
					if(!empty($subject)){
					foreach($subject as $subject_result){
						$subjectcount++;
						
					 $total_internal_marks_obtained1 = $subject_result->internal_marks_obtained;
					 $total_external_marks_obtained1 = $subject_result->external_marks_obtained;
					 $total_obtained = $total_internal_marks_obtained1 + $total_external_marks_obtained1;
					 $total += $total_obtained;
					
					 $total_internal_max_mark1 = $subject_result->internal_max_marks;
					 $total_external_max_mark1 = $subject_result->external_max_marks;
					 $total_max_marks = $total_internal_max_mark1 + $total_external_max_mark1;		
					//  $total_max += $total_max_marks;
					 $fourty_percente = ( $total_max_marks * 40 ) / 100	;
					 $total_ = $subject_result->external_max_marks;
						
					$total_internal_mark += $subject_result->internal_max_marks;
					$total_internal_mark_obtained += $subject_result->internal_marks_obtained;
					$total_external_max_marks += $subject_result->external_max_marks;
					$total_external_marks_obtained += $subject_result->external_marks_obtained;

					
					// $grand_total =intval($total/$subjectcount);

				?>

				<tr>
					<td class="td-left-text"><?=$subject_result->subject_name?></td>
					<td><?=$total_max_marks ?></td>
					<td><?=$total_internal_marks_obtained1 ?></td>
					<td class="no_border"><?=$total_external_marks_obtained1 ?></td>
					<td class="no_border"><?=$total_obtained ?></td>
					<td><?=$obj->toText($total_obtained );?></td>
				</tr> 

				<?php 
				// $total_rows++;
				 }}
							// $extra = 11-$total_rows;
							// for($e=1;$e<=$extra;$e++){
								
								?>
								
								<?php 
							// }
						$total_int_mark = $total_internal_mark+$total_external_max_marks;
						$total_obt = $total_internal_mark_obtained+$total_external_marks_obtained;
						// echo "<pre>";print_r($total_obt);exit;

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
				<tr style="border:1px solid #000000;">
            <td class="td-left-text">GRAND TOTAL: <?=$total?></td>
            <td>Result <?php if($marksheet->result == "0"){ echo "PASS";}else if($marksheet->result == "1"){ echo "FAIL";}else if($marksheet->result == "2"){ echo "REAPPEAR";}else if($marksheet->result == "3"){ echo "ABSENT";}?></td>
			<td colspan="3" style="padding:0px;">
				<div style="display:flex; align-items: center;">
					<div style="width:50%; border-right: 1px solid; height: 50px; text-align: center; display: flex; justify-content: center; align-items: center;">
						Percentage <br>
						<?=number_format($percent,2)?>%
					</div>
					<div style="width:50%;">
						Grade <br>
						<?=$grade?>
					</div>

				</div>
			</td>
            <td >
				CGPA <br>
				<?php  
					// $percent =($cgpa_total_marks*100)/$total;
					$cgpa = $percent/9.5;
					echo number_format($cgpa,2);
				?>
			</td>



        </tr>
				<tr>
				<td class="td-left-text"  colspan="5">IN WORDS: <?=$obj->toText($total );?></td>
				</tr>
				
			</tbody>

		</table>
		<table class="students-exam-details" style="border:none; margin-top:50px;">
			<tr>
				<td style="border:none; text-align:left;">
				DATE: <?=date("d-M-Y",strtotime($marksheet->marksheet_issue_date))?>
				</td>
				<td style="border:none;  padding-left:20px; padding-top: 30px;">

				<img style="width: 80px;margin-right: -13px;margin-bottom: 13px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$marksheet->signature)?>">   
                <p><?=$marksheet->dispalay_signature;?></p>
				<!-- COE/ DY. REGISTRAR <br>
				Auth. Sign. -->
				</td>
			</tr>
		</table>
		
            <!-- <table class="students-exam-details">
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
						
					</tr>
				</thead>
				<tbody>
				 
						<?php 
							$subject = $this->Separate_student_model->get_selected_subject_for_result($marksheet->result_id);
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
						<tr style="text-align: center;text-transform: uppercase;">
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
							<td rowspan="" colspan="6" style="font-weight:600;font-size:14px">Grand Total</td>
							<td><?=$total_int_mark?></td>
							<td><?=$total_obt?></td>
							<td><?=number_format($percent,2)?>%</td>
						</tr>
						<tr  class="student-marks-total" style="background-color:transparent">
							<td rowspan="" colspan="6" style="font-weight:600;font-size:14px">Result</td>
							
							<td style="font-weight:600;font-size:14px"></td>
							<td></td>
							<td style="font-weight:600;font-size:14px"><?php if($marksheet->result == "0"){ echo "PASS";}else if($marksheet->result == "1"){ echo "FAIL";}else if($marksheet->result == "2"){ echo "REAPPEAR";}else if($marksheet->result == "3"){ echo "ABSENT";}?></td>
						</tr>
						
                        </tbody>
                    </table>  -->
					
				<!-- <div class="bottom-sign-section" style="">

					<div class="left-remark" style="top: 65px;">
                        <div class="remark-info">
                            <span>Remarks:P- Pass; F- Fail; A- Absent Gm Grace Marks</span>
                        </div>
                        <div class="result-date">
                           <span>Date of issue: <p class="date-text"> <strong><?=date("d-M-Y",strtotime($marksheet->marksheet_issue_date))?></p></strong></span>
                        </div>
                    </div>
					<div class="barcode-middle" style="text-align:center;">
					<img style="top: 64px;" class="barcode-img" alt="<?=$barcode?>" src="<?=base_url();?>barcode.php?codetype=Code39&size=40&text=<?=$barcode?>&print=true" />
					</div>
                    <div class="right-controller" style="padding-top: 11px;">
                        <div style="text-align:center;"> 
							   <?php $old = array(2020069063020779,2020069067071990,2020069067060985,2020069067062976);
								 if(in_array($marksheet->enrollment_number,$old) && $marksheet->year_sem == 1){?>
									<img style="width: 116px; display: block;margin: 0px auto;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/seprate_reg.PNG')?>">
									<?php }else{?>
								<?php if($marksheet->examination_month == "August"  && $marksheet->examination_year =="2021"){?>
									<?php if(date("Y-m-d",strtotime($marksheet->created_on)) <= '2022-02-12'){?>
										<img style="width: 80px; display: block;margin: 0px auto;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png')?>">
									<?php }else if(date("Y-m-d",strtotime($marksheet->created_on)) >= '2022-02-19'){?>
										<img style="width: 81px; display: block;margin: 0px auto;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
									<?php }?>
								 <?php }else if($marksheet->examination_month == "January"  && $marksheet->examination_year =="2022"){?>
									
									<?php if(date("Y-m-d",strtotime($marksheet->created_on)) <= '2022-02-12'){?>
										<img style="width: 80px; display: block;margin: 0px auto;"  src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png')?>">
									<?php }else if(date("Y-m-d",strtotime($marksheet->created_on)) >= '2022-02-19'){?>
										<img style="width: 81px; display: block;margin: 0px auto;"  src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
									<?php }?>
								<?php }else if($marksheet->examination_month == "July" && $marksheet->examination_year =="2022"){?>
            				        <img style="width: 81px;display: block;margin: 0px auto;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
            				    <?php }else if($marksheet->examination_month == "July"  && $marksheet->examination_year =="2021"){?>
            				    <img style="width: 81px;display: block;margin: 0px auto;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png');?>">
            				    <?php }else if($marksheet->examination_month == "January"  && $marksheet->examination_year =="2023"){?>
				    <img style="width: 81px;display: block;margin: 0px auto;margin-bottom: -22px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
				    			<?php }}?>
							<strong>Controller of Examinations/Dy. Registrar</strong>
							</div>
						</div>
				</div> -->
				<!-- <?php if($marksheet->credit_transfer == '1'){?>
					<div class="credit_transfer_remark" style="position: absolute;bottom: 34px;left: 18px;">
						<span><?=$marksheet->credit_transfer_remark;?></span>
					</div>
				<?php }?> -->
			</div>
		</div>
		<!-- <div class="bottom_strip">
					<img src="<?=$this->Digitalocean_model->get_photo('images/marksheet_footer_strip.png')?>">
				</div> -->
   
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