<?php //$obj = new SimpleFunctions(); ?>
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
		.credit_note {
		      position: absolute;
    padding: 0px 30px;
		}
    </style>
</head>

<body>
<?php  
$subject = $this->Consolidated_model->get_selected_subject_for_result($marksheet_id->id);
$cgpa_subject_count = $subject; 
$cgpa_total_marks = 0; 
$total_page =  $subject/15;
$total_page = ceil($total_page);
$total_year=0; 
$start=0;
$limit=15;
for($p=1;$p<=$total_page;$p++){
	$loop_subject = $this->Consolidated_model->get_selected_subject_for_result_loop($marksheet_id->id,$limit,$start);
	//echo $start;
	$start=$start+15;
	//echo "<pre>";print_r($loop_subject);
?>

    <div class="book">
        <div class="page">
            <div class="subpage"  style="background-image:url(<?=base_url();?>images/new_marksheet-background.png)">

		
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
                        <h2 style="font-size:14px;color: #335c9e;margin-bottom: 6px; margin-top: 66px;">Imphal Arunachal Pradesh, INDIA</h2>
                        <h2 class="statement"> Consolidated statement of marks</h2>
                        <h3><?=$marksheet->course_name?> (<?=$marksheet->stream_name?>)</h3>
                    </div>
                    <div class="students-info student-info-left" style="margin-bottom: 0px;">
                        <p>Name of Student: <?=$marksheet->student_name?></p>
                        <p>Father's Name: <?=$marksheet->father_name?></p>
                        <!--<p>Month and Year of last Exam Examination: <?php if(!empty($last_exam)){ echo $last_exam->exam_month.' '.$last_exam->exam_year;}?></p>-->
                    </div>
                    
                    <div class="students-info student-info-right;" style="height:95px;">
                      <p>Mother Name : <?=$marksheet->mother_name?></p>
                      <p>Enrollment .No. : <?=$marksheet->enrollment_number?></p>
					  
                       
                         
                    </div>
					<div style="clearboth"></div>
					<!-- <div style="text-align:center;color:#05549e"><h2 style="margin-top: 0px;">Annual Examination<h2></div> -->
					 <table class="students-exam-details">
                        
                    
					<thead>
						<tr class="heading_table"> 
							<th>SEM/YEAR</th>
							<th>SUBJECT CODE</th>
							<th>SUBJECT TITLE</th>
							<th>CREDITS</th>
							<th>INTERNAL</th>
							<th>EXTERNAL</th>
							<th>TOTAL</th>
							<th>TOTAL MARKS</th>
							<th>GRADE</th>
							<th>RESULT</th>
						</tr> 
					</thead>
					<tbody>
                    <?php   
					if(!empty($loop_subject)){
					foreach($loop_subject as $loop_subject_result){ 
						$total_year = $loop_subject_result->year_sem;	
						$cgpa_total_marks = $cgpa_total_marks+$loop_subject_result->internal_mark+$loop_subject_result->external_mark;
						$cgpa_subject_count++;
						
					?>
                    <tr style="text-align: center;">
						<td><?=$loop_subject_result->year_sem?></td>
						<td style="text-align:left"><?=$loop_subject_result->subject_code?></td>
						<td style="text-align:left"><?=$loop_subject_result->subject_name?></td>
						<td><?=$loop_subject_result->credit?></td>
						<td><?=$loop_subject_result->internal_mark?></td>
						<td><?=$loop_subject_result->external_mark?></td>						
						<td><?=$loop_subject_result->internal_mark+$loop_subject_result->external_mark?></td>
						<td><?=$loop_subject_result->total_marks?></td>
						<td><?=$loop_subject_result->grade?></td>
						<td><?=$loop_subject_result->result?></td>
                    </tr>
                    <?php  }}  ?>
                 
					</tbody>
                </table>
				<p class="credit_note"><b><?=$marksheet_id->note?></b></p>
				</div>
				

				<!-----------------Final statement start----------------------->
						<?php if($total_page == $p){
							$total_mark_obtaind = 0;
							$mark_obtaind = 0;
							$total_mark = 0;
							$mark = 0;	
							$percent=($total_mark*100)/$mark_obtaind;
						?>
							<table class="students-exam-details" style="margin-top: 70px;">
								<body>
									<div class="clearfix"></div>
									<tr class="student-marks-total">
										<td>SEM/YEAR</td>
										<?php for($y=1;$y<=$total_year;$y++){?>
										<td><?=$y?></td>
										<?php }?> 
										<td>Grand Total</td>
										<td>Result</td>
										<td>SGPA/CGPA</td>
									</tr>
									<tr class="student-marks-total">
										<td>Full Marks</td>
										<?php 
										
										
											for($y=1;$y<=$total_year;$y++){
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
										<?php for($y=1;$y<=$total_year;$y++){
											$mark_obtaind = $this->Consolidated_model->get_total_obt_marks_cons($y,$marksheet_id->id);
											$total_mark_obtaind += $mark_obtaind;
										?>
										<td><?=$mark_obtaind?></td>
										<?php }?> 
											<td><?=$total_mark_obtaind?></td>
									</tr>
								</tbody>
							</table> 
									
						<?php } ?>
				<!-----------------Final statement end----------------------->
				
				<div class="bottom-sign-section" style="bottom:95px">

				 <div class="left-remark" style="top:126px;">
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
				<div class="right-controller">
                        <div style="text-align:center;">
			 <img style="width: 98px;display: block;margin: 0px auto;" src="<?=base_url("images/signature_contrroler/sahakhan.png");?>">
			 <strong class="marksheet_sign">Registrar / Controller of Examination</strong>
		</div>
		</div>
             
        </div>
		
    </div>  
    <div class="bottom_strip">
		<img src="<?=base_url();?>images/marksheet_footer_strip.png">
	</div>
	</div>
		<?php


}?>

  <script src="<?=base_url();?>js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>css/marksheet/main.js"></script>
</body>
</html>