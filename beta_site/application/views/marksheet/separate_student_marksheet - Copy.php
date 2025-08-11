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
<?php 
	$courses = array(262,263,261,228);
	
	if(!empty($marksheet) && in_array($marksheet->course_id,$courses)){
		
		?>
		
		<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
    
    page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
    width: 210mm;
    height: 297mm;
  }
  
}
        .marksheet_container {
            width: 21cm;
           
            margin: auto !important;
            font-family: 'Roboto', sans-serif;
            font-weight: 16px;
            text-indent: 10px;
            background-size: 100% 100%;
            border: 10px solid #cd4b0e;
            padding-bottom: 20px;
        }
        
        .marksheet_inner {
            margin: auto;
            position: relative;
            left: 0px;
        }
        
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        .footer_sign {
            position: absolute;
            top: -82px;
            right: 10px;
        }
        
        .footer_sign img {
            position: relative;
            left: 171px;
            top: -25px;
        }
        
        td,
        th {
            border: 0px solid #dddddd;
            text-align: left;
            padding: 8px;
            font-size: 14px;
        }
        
        .anual_exam {
            border: 1px solid #a1a1a1;
            margin-top: 20px;
            float: left;
            width: 100;
        }
        
        .anual_exam td,
        .anual_exam th {
            border: 1px solid #a1a1a1;
            text-align: center;
        }
        
        .last_table {
            margin-top: 30px;
        }
        
        .last_table td,
        .last_table th {
            border: 1px solid #a1a1a1;
            text-align: center;
            margin-top: 30px;
        }
        
        .anual_exam th {
            font-weight: 700;
        }
        
        .anual_exam td {
            font-weight: 600;
        }
        
        .marksheet_logo {
            width: 100px;
        }
        
        .university_header {
            text-align: center;
            padding-top: 20px;
        }
        
        .university_heading {
            color: #cd4b0e;
            /* background: -webkit-linear-gradient(transparent, transparent), -webkit-linear-gradient(top, rgba(213, 173, 109, 1) 0%, rgba(213, 173, 109, 1) 26%, rgba(226, 186, 120, 1) 35%, rgb(195 128 21) 45%, rgb(237 150 10) 61%, rgba(213, 173, 109, 1) 100%);
            background: -o-linear-gradient(transparent, transparent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent; */
            font-size: 45px;
            text-decoration: none;
            margin-top: 0px;
        }
        
        .university_tagline {
            font-size: 12px;
            margin-top: -30px;
            font-weight: 600;
            text-transform: capitalize;
        }
        .issue_date{
			    padding-bottom: 8px;
			}
        .print_btn {
            background: #cd4b0e;
            color: white;
            font-weight: bold;
            padding: 12px;
            position: absolute;
            top: 0px;
            right: 0px;
            border: none;
        }
        
        .student_details {
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 600;
        }
        
        .marksheet_text {
            font-size: 32px;
        }
        
        .t_heading_exam {
            text-align: center;
            font-size: 24px;
            border: 1px solid black;
        }
        
        .qr_scan {
            width: 80px;
            height: 80px;
        }
        
        .total_marks {
            font-size: 16px;
            font-weight: 600;
            padding-top: 10px;
        }
        
        .total_marks span {
            text-decoration: underline;
        }
        
        .barcode {
            width: 170px;
            margin-left: 10px;
            height: 90px;
        }
        
        .signature_marksheet {
            float: right;
            margin-top: 15px;
            font-weight: bold;
            margin-right: 40px;
        }
        
        .blackwhite {
            -webkit-filter: grayscale(100%);
            / Safari 6.0 - 9.0 /
            filter: grayscale(100%);
        }
        /* .heading_table th:nth-child(1) {
            color: red;
        } */
        
        .heading_table th:nth-child(1) {
            width: 90px;
            / color: red; /
        }
        
        .heading_table td:nth-child(1) {
            width: 90px;
        }
        
        .heading_table th:nth-child(2) {
            text-align: left !important;
            width: 350px;
            border: none;
            float: left;
            / color: red; /
            margin-top: 9px;
        }
        
        .anual_exam td:nth-child(2) {
            text-align: left;
            width: 80px;
        }
        
        .heading_table th:nth-child(2) {
            text-align: left !important;
            width: 350px;
            border: none;
            float: left;
            / color: red; /
            margin-top: 9px;
        }
        
        .anual_exam td:nth-child(2) {
            text-align: left;
        }
        

        @media print {
            .print_btn {
                display: none;
            }
            .university_heading {
                color: #cd4b0e;
                font-size: 32px;
                text-decoration: none;
                margin-top: 0px;
            }
            .marksheet_text {
                font-size: 26px;
            }
            td,
            th {
                border: 0px solid #dddddd;
                text-align: left;
                padding: 5.5px;
                font-size: 14px;
            }
            .signature_marksheet {
                float: right;
                margin-top: 50px;
                font-weight: bold;
                margin-right: 40px;
            }
            .marksheet_container {
                / background: url(./images/mob-border.png); /
                padding-left: 0px;
                border: 10px solid #cd4b0e;
                padding-right: 0px;
                /* margin-right: auto;
                margin: auto;
                margin-left: auto; */
                / background-size: 100% 100%; /
                width: 767px;
                /* margin-top: 0px;
                margin-bottom: 0px; */
            }
            .marksheet_inner {}
        }
        
        .marksheet_sign {}
    </style>
    <title>Marksheet</title>
</head>

<body>
    <div class="marksheet_container" style="background-image:url(<?=base_url();?>images/watermark_pre.png);background-position:center;background-size:cover;"> 
        <div class="marksheet_inner">
            <div class="university_header">
                <img src="<?=base_url();?>css/marksheet/img/main-logo.png" alt="" class="img-fluid">
                <h2 class="university_heading">THE GLOBAL UNIVERSITY</h2>
                <p class="university_tagline">Established by the Act of Arunachal Pradesh State Government Under Section 2 (F) of UGC Act 1956. Government of India</p>
                <h2 class="marksheet_text">Marksheet</h2>
            </div>
            <?php 
				$smart = $marksheet->id."-".$marksheet->student_id."-".$marksheet->enrollment_number."-".$marksheet->marksheet_number."-".$marksheet->student_name."-".$marksheet->father_name."-".$marksheet->examination_month."-".$marksheet->examination_year."-".$marksheet->created_on;
				$barcode = $marksheet->enrollment_number."-".$marksheet->marksheet_number;
				?>
            <div class="certificate_body">
                <table class="student_details">
                    <tr>
                        <td>Name Of Student</td>
                        <td>:<?=$marksheet->student_name?></td>
                        <td>Father Name</td>
                        <td>:<?=$marksheet->father_name?></td>
                    </tr>
                    
                    <tr>
                        <td>Mother Name</td>
                        <td>:<?=$marksheet->mother_name?></td>
                        <td>Enrollment No</td>
                        <td>:<?=$marksheet->enrollment_number?></td>
                    </tr>
                    <tr>
                        <td>Session</td>
                        <td>:<?=$marksheet->pre_session;?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="7">Program: <?=$marksheet->course_name?></td>
                    </tr>
                </table>
                <table class="anual_exam">
                    <tr>
                        <th colspan="7" class="t_heading_exam">Annual Examination</th>
                    </tr>
                <tr class="heading_table">
                        <th>Code</th>
                        <th>Subject</th>
                        <th>Mark Obtained</th>
                        <th>Minimum  Mark</th>
                        <th>Maximum Mark</th>
                    </tr>
                    <?php 
					$subject = $this->Separate_student_model->get_selected_subject_for_result($marksheet->result_id); 
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
                    <tr>
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
                        <td style="text-align: center;"><?php if($marksheet->result == "0"){ echo "Pass";}else if($marksheet->result == "1"){ echo "Fail";}else if($marksheet->result == "2"){ echo "Reappear";}else if($marksheet->result == "3"){ echo "Absent";}?></td>
                    </tr>
                </table>
                <table class="last_table">
                    <tr>
                        <th></th>
                        <th>Annual</th>
                        <th>Grand Total</th>
                        <th>Division</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Maximum Mark</th>
                        <th><?=$total_max?></th>
                        <th rowspan="2"><?=$total?></th>
                        <th rowspan="2"><?=$division?></th>
                        <th rowspan="2"> 
							<img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?=$smart?>&choe=UTF-8"/>
                           </th>
                    </tr>
                    <tr>
                        <th>Total Mark Obtained</th>
                        <th><?=$total?></th>
                    </tr>
                </table>
                <h3 class="total_marks">Marks in words : <span><?=$obj->toText($total );?></span> </h3>
                <div class="issue_date">Date Of issue: <?=date("d-m-Y",strtotime($marksheet->marksheet_issue_date))?></div>
                <img  alt="<?=$barcode?>" src="<?=base_url();?>barcode.php?codetype=Code39&size=40&text=<?=$barcode?>&print=true" />
              
                </div>
<div style="/* float:right; *//* margin-top: -106px; *//* position: absolute; */position: relative;magin-right: -52px;right: 0;top: 0;">
                <div class="footer_sign">
			
			 <?php $old = array(2020069063020779,2020069067071990,2020069067060985,2020069067062976);
			 if(in_array($marksheet->enrollment_number,$old) && $marksheet->year_sem == 1){?>
				<img style="width: 80px;margin-right: -124px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/seprate_reg.PNG");?>">
				<?php }else{?>
				<?php if($marksheet->examination_month == "August"  && $marksheet->examination_year =="2021"){?>
					<?php if(date("Y-m-d",strtotime($marksheet->created_on)) <= '2022-02-12'){?>
						<img style="width: 80px;margin-right: -124px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png");?>">
					<?php }else if(date("Y-m-d",strtotime($marksheet->created_on)) >= '2022-02-19'){?>
						<img style="width: 105px;margin-right: -175px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/sahakhan.png");?>">
					<?php }?>
				 <?php }else if($marksheet->examination_month == "January"  && $marksheet->examination_year =="2022"){?>
					<!--<img style="width: 80px;margin-right: -124px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/new_reg.png");?>">-->
					<?php if(date("Y-m-d",strtotime($marksheet->created_on)) <= '2022-02-12'){?>
						<img style="width: 80px;margin-right: -124px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png");?>">
					<?php }else if(date("Y-m-d",strtotime($marksheet->created_on)) >= '2022-02-19'){?>
						<img style="width: 105px;margin-right: -175px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/sahakhan.png");?>">
					<?php }?>
				<?php }}?>
		<strong class="marksheet_sign">Registrar / Controller of Examination</strong>
		</div>
		</div>
            <div class="signature_marksheet"></div>
        </div>
    </div>
    <button onclick="window.print()" class="print_btn">Print this page</button>
</body>

</html>
		
		
		
		
		
		
		
		
		
		<?php
	}
	else{
	
	?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markshit</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&display=swap" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url();?>css/marksheet/bootstrap.min.css">
    	<!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url();?>css/marksheet/style.css">
    <style>
        @import "https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap";
    @import "https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap";

                        body{
                background-size: cover;
                background-repeat: no-repeat;
                color: #000000;
                padding:0px;
                margin:0px;
                font-size: 15px;
                font-family: 'Abel', sans-serif;
				font-family: 'Barlow Semi Condensed', sans-serif;
                line-height: 1.80857;
            }   
            
            .main-header{
                max-width:100%;
                border:2px solid #000;
                margin:50px auto 50px;
                border: 15px solid transparent;
                padding: 0px;
                border-image-source: url('./img/border.png');
                border-image-repeat: round;
                border-image-slice: 30;
                box-shadow: 0 0 4px 4px #38333330;
                position: relative;
            }
            .scan-img img{
                max-width:25%;
            }
            .middle-main-logo{
                text-align: center;
				display: none;
            }
            .middle-main-logo img{
                text-align: center;
                margin:0 auto;
                max-width:30%;
            }
            .right-bar-code img{
                text-align: center;
                margin: 0px 115px;
                max-width: 60%;
            }
            .right-bar-code p{
                color:#000;
                font-size:14px;
                text-align: center;
                padding: 0 0 0 90px;
                margin-bottom: 0;
				font-weight: 600;
            }
            .univercity-name-header h2{
                font-size: 50px;
                font-weight: 600;
                color: #05549e;
                text-transform: uppercase;
                margin-top: 10px;
                margin-bottom: 0px;
                text-align: center;
            }
            .univercity-name-header p{
                font-size: 18px;
                font-weight:500;
                color:#000;
                text-align: center;
                margin-bottom:0px;
            }
            .univercity-name-header address {
                margin-bottom: 2rem;
                font-style: normal;
                line-height: inherit;
                font-size: 22px;
                text-align: center;
                font-weight: 500;
            }
            .markshit-header{
                margin:0 auto;
                opacity: 1;
                text-align:center;
                transform: translate(-50% -50%);
            }
            .markshit-header h2{
                font-size: 36px;
                font-weight: 700;
                text-align: center;
                color: #b73710;
                text-transform: uppercase;
                margin-bottom:15px;
            }
            .markshit-header h3{
                color:#05549e;
                text-align: center;
                font-size: 24px;
                text-transform: uppercase;
                font-weight: 600;
                margin-bottom: 25px;
            }
            .main-header{
                background: url('./img/background-new.png');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                padding:25px 10px 20px;
            }
            .students-details{
            margin:0 auto;
            }
            .background-logo{
                background: url(./img/main-logo.png);
                background-repeat: no-repeat;
                background-position: center;
                background-size: 400px 400px;
                opacity: 0.25!important;
                min-height: 100%;
                width:400px;
                position: absolute;
                transform: translate(-50%,-50%)!important;
                /* z-index: 2; */
                top:600px;
                left:50%;
            }
            .students-info p{ 
                font-size: 16px;
                font-weight: 500;
                color: #000;
                margin-bottom: 0px;
                line-height:2;
            }
            .students-info{
                max-width: 70%;
            }
            /* table css start from here */
            .students-exam-details table {
                width: 100%;
                margin: auto;
                background: transparent;
                color: #000;
            }

            .students-exam-details table, th, td {
                border: 2px solid #000;
                border-collapse: collapse;
                text-align: center;
                line-height: 1.3;
            }

            .students-exam-details th, td {
                padding: 8px;
            } 
            .students-exam-details th, td {
                padding: 8px;
                padding: 8px;
                font-size: 15px;
                color: #000;
                font-weight: 500;
            }
            .students-exam-details th{
                padding: 8px 13px;
                color: #000;
                font-weight: 600;
                font-size: 16px;
            }
            /* .students-exam-details  tr:nth-child(even){background-color: #f2f2f2;} */

            /* .students-exam-details  tr:hover {background-color: #ddd;} */

            /* tr:nth-child(even) {
                background-color: #689ebe70;
            } */
            .students-exam-details{
            margin:30px 15px;
            }
            .remark-info{
                color:#000;
                font-size: 16px;
                padding: 0 15px;
            }
            .date-text{
                display: flex;
                font-size: 16px;
            
            }
            .result-date span{
            display: inline-block;
            padding: 0 15px;
            }
            .result-date p{
                display: inline;
                padding: 0 5px;
            }
            .controllers-signature strong{
                font-size: 18px;
                float: right;
                padding: 25px 15px 0px;
            }
			.main-header{
				border: 5px solid #f0a638 !important;
			}
            /* table css end */
			.main-header{
				height: 1500px;
				margin-top: 15px;
			}
			.univercity-name-header{
				display: none;
			}
			.markshit-header{
				padding-top: 290px;
			}
			@media print {
				.main-header{
					height: 1375px;
					margin-top: 15px;
				}
			}
    </style>
</head>
<body>
    <section class="main-top-header">
        <div class="container">
            <!--<div class="background-logo"></div>-->
            <div class="main-header" style="background-image:url(<?=base_url();?>images/marksheet-bg-with-logo.jpeg)">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row"><!--row start-->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="scan-img"> 
								<?php 
								$smart = $marksheet->id."-".$marksheet->student_id."-".$marksheet->enrollment_number."-".$marksheet->marksheet_number."-".$marksheet->student_name."-".$marksheet->father_name."-".$marksheet->examination_month."-".$marksheet->examination_year."-".$marksheet->created_on;
								$barcode = $marksheet->id."-".$marksheet->student_id."-".$marksheet->enrollment_number."-".$marksheet->marksheet_number;
								?>
								<img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?=$smart?>&choe=UTF-8"/>
                                    
                                </div>
                               
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="middle-main-logo">
                                    <img src="<?=base_url();?>css/marksheet/img/main-logo.png" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="right-bar-code">
                                    <p>Serial No:<?=$marksheet->id?></p>
                                    <img src="<?=base_url();?>barcode.php?codetype=Code39&size=40&text=<?=$barcode?>&print=true" alt="" class="img-fluid">
                                </div>
                            </div>
                            
                        </div><!--row end-->
                        <div class="row"><!--row start-->
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="univercity-name-header">
                                    <h2>BIR TIKENDRAJIT UNIVERSITY</h2>
                                    <p>Established Under Section UGC 2F of UGC Act 1956.</p>
                                    <address>Canchipur, near Arunachal Pradesh University, South View. Imphal West, Arunachal Pradesh</address>
                                </div>
                          </div>  
                        </div><!--row end-->
                      
                        <div class="row"><!--row start-->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " >
                               
                                <div class="markshit-header ">
                                    <h2> Statements of marks</h2>
                                    <h3><?=$marksheet->course_name?> <?php if($marksheet->print_stream == 1){ echo "(".$marksheet->stream_name.")";}?></h3>
                                </div>
                            
                            </div>
                        </div><!--row end-->
                    
                    <div class="row"><!--row start-->
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 students-details">
                            <div class="row"><!--row start-->
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 students-info">
                                        <p><strong>Name</strong>: <?=$marksheet->student_name?></p>
                                        <p> <strong>Father's Name</strong>: <?=$marksheet->father_name?></p>
                                        <p> <strong>Enrollment .No.</strong> : <?=$marksheet->enrollment_number?></p>
                                </div>
                                <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="background-logo"></div>
                                </div> -->
                                <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12 students-info" style="padding:0 0 0 130px">
                                   <?php if($marksheet->result_declare_date <"2022-03-14"){?>
                                    <p><strong>Seat No.</strong>: <?=$marksheet->marksheet_number?></p>
                                    <?php }?>
                                    <p> <strong><?php if($marksheet->display_mode == "1"){?>Year<?php }else{?>Semester<?php }?></strong>: <?=$roman_arr[$marksheet->year_sem]?></p>
                                    <p> <strong>Month & Year Of Exam</strong> : <?=$marksheet->examination_month?> <?=$marksheet->examination_year?></p>
                                </div>
                            </div><!--row end-->
                        </div>
                    </div><!--row end-->
                        <!-- <div class="background-logo"></div> -->
                            <div class="row"><!--row start-->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
												$subject = $this->Separate_student_model->get_selected_subject_for_result($marksheet->result_id);
												$total_internal_mark = 0;
												$total_internal_mark_obtained = 0;
												$total_external_max_marks = 0;
												$total_external_marks_obtained = 0;
												if(!empty($subject)){
													foreach($subject as $subject_result){
														$total_internal_mark += $subject_result->internal_max_marks;
														$total_internal_mark_obtained += $subject_result->internal_marks_obtained;
														$total_external_max_marks += $subject_result->external_max_marks;
														$total_external_marks_obtained += $subject_result->external_marks_obtained;
											?>
                                            <tr>
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
											<?php }}
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
                                                <td rowspan="" colspan="6" style="font-weight:600;font-size:16px">Grand Total</td>
                                                <td><?=$total_int_mark?></td>
                                                <td><?=$total_obt?></td>
                                                <td><?=number_format($percent,2)?>%</td>
                                            </tr>
                                            <tr  class="student-marks-total" style="background-color:transparent">
                                                <td rowspan="" colspan="6" style="font-weight:600;font-size:16px">Result</td>
                                                <!--<td style="font-weight:600;font-size:16px">Grade</td>
                                                <td><?=$grade?></td>-->
												<td style="font-weight:600;font-size:16px"></td>
                                                <td></td>
                                                <td style="font-weight:600;font-size:16px"><?php if($marksheet->result == "0"){ echo "Pass";}else if($marksheet->result == "1"){ echo "Fail";}else if($marksheet->result == "2"){ echo "Reappear";}else if($marksheet->result == "3"){ echo "Absent";}?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--row end-->
                            <div class="row"><!--row start-->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="remark-info">
                                                <strong><span>Remarks:P- Pass; F- Fail; A- Absent</span></strong>
                                            </div>
                                            <div class="result-date">
                                                <strong><span>Date : <p class="date-text"><?=date("d-m-Y",strtotime($marksheet->result_declare_date))?></p></span></strong>
                                            </div>
                                        </div>
                                        
                                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div style="float: right;">
                                                
                                               <?php $old = array(2020069063020779,2020069067071990,2020069067060985,2020069067062976);
			 if(in_array($marksheet->enrollment_number,$old) && $marksheet->year_sem == 1){?>
				<img style="width: 80px;margin-right: -124px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/seprate_reg.PNG");?>">
				<?php }else{?>
                                                <?php if($marksheet->examination_month == "August"  && $marksheet->examination_year =="2021"){?>
													<?php if(date("Y-m-d",strtotime($marksheet->created_on)) <= '2022-02-12'){?>
														<img style="width: 80px;margin-right: -124px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png");?>">
													<?php }else if(date("Y-m-d",strtotime($marksheet->created_on)) >= '2022-02-19'){?>
														<img style="width: 105px;margin-right: -175px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/sahakhan.png");?>">
													<?php }?>
												 <?php }else if($marksheet->examination_month == "January"  && $marksheet->examination_year =="2022"){?>
                                                    <!--<img style="width: 80px;margin-right: -124px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/new_reg.png");?>">-->
													<?php if(date("Y-m-d",strtotime($marksheet->created_on)) <= '2022-02-12'){?>
														<img style="width: 80px;margin-right: -124px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/SIGNATURE_OF_CONTROLLER_OF_EXAMINATIONS.png");?>">
													<?php }else if(date("Y-m-d",strtotime($marksheet->created_on)) >= '2022-02-19'){?>
														<img style="width: 105px;margin-right: -175px;margin-bottom: 88px;" src="<?=base_url("images/signature_contrroler/sahakhan.png");?>">
													<?php }?>
                                                <?php }}?>
                                            <strong>Controller of Examinations/Dy. Registrar</strong>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div><!--row end-->
                       
                    </div>
                </div>
                 <?php if($marksheet->credit_transfer == '1'){?>
					<div class="credit_transfer_remark" style="position: absolute;bottom: 10px;left: 26px;">
						<strong><span><?=$marksheet->credit_transfer_remark;?></span></strong>
					</div>
				<?php }?>
                
            </div>
            
        </div>
    </section>
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>css/marksheet/main.js"></script>
</body>
</html>
<?php }?>
