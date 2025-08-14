<?php  
$university_details = $this->Setting_model->get_university_details();
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
    <title>Certificate</title>
    <meta name="description" content="India's leading manufacturer of premium Aluminium Sliding Windows and Doors">
    <meta name="keywords" content="aluminium, sliding, window, section, glass, door">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url();?>back_panel/css/style.css">
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
            
            padding: 2mm;
            border-radius: 5px;
            background: white;
            
			position: relative;
        }
        
        .subpage {
           
			position:relative;
            min-height: 367mm;
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
            top: 40px;
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
               
            }
            .print {
                display: none;
            }
        }
    </style>
</head>

<body>
  
	<?php if(!empty($migration)){ ?>  
		<div class="book" id="book">
			<div class="page">
				<div class="subpage"  style="background-position: center;background-size: cover;border: 2px solid #e8612b;background-image:url(<?=$this->Digitalocean_model->get_photo('images/new_marksheet-background.png')?>)"> 
					<div class="print-wrapper"> 
						<div class="first-row"> 
							<div class="right-bar-code">  
								<p style="font:bold; font-weight: 700">Serial No. :  <?=$migration->id;?></p>
							</div>
						</div>
						<div style="clear:both"></div>
						<div class="markshit-header">
							<h2 style="font-size:14px;color: #335c9e;margin-bottom: 6px; margin-top: 165px;"><b>University Campus: </b><?php if(!empty($university_details)){ echo $university_details->address; }?></h2>
						</div> 
						<div style="text-align:center;color:#05549e"><h2 style="width: 285px;margin: 0px auto;color: #000;font-weight: 700;font-size: 17px;text-align: center;">MIGRATION CERTIFICATE<h2></div>
					</div> 
					<div class="col-md-12">
						<p style="  margin-top: 10px;color: #000;font-size: 15px;font-weight: 600;margin-bottom: 0px;line-height: 30px;word-spacing: 10px;">Enrollment No.: <?=$migration->enrollment_number;?></p>
						<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 500;margin-bottom: 0px;line-height: 30px; word-spacing: 10px">This is to certify that this University has no objection to permit <b><?=$migration->student_name;?></b> son/daughter of <b><?=$migration->father_name;?></b> who has studied <b><?=$migration->course_name;?> (<?=$migration->sort_name;?>) <?php if(date("Y-m-d",strtotime($migration->created_on)) >= "2023-09-19"){?> in <?=$migration->stream_name;?><?php }?></b> course with enrollment no. <b><?=$migration->enrollment_number;?></b> during academic/ calender year <b><?=$migration->migration_session?></b> in this University, for pursuing his/ her futher studies in any other University/Institution.</p>
					</div>
					<div class="col-md-12">
						<br>
						<br>
						<p style="font-size: 16px;color: #000;margin-bottom: 2px;">Imphal, Arunachal Pradesh  <span style="margin-left: 112px;"></span></p>
						<p style="font-size: 16px;color: #000;margin-bottom: 2px;font-weight: 600;line-height: 30px;word-spacing: 10px;">Date:  <span style="margin-left: 10px;"><?=date("d-m-Y",strtotime($migration->issue_date));?></span></p>
						<div style=" text-align: center;margin-top: 125px;margin: 0px auto;">
							<!-- <img style="width: 145px;margin-top: 0px;" src="<?=$this->Digitalocean_model->get_photo('images/btu-seal.png')?>">  -->
                            <img style="width: 145px;margin-top: 0px;" src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->stamp)?>">   
                                                
						</div> 
						<div style="float:right">
							<!-- <?php if($migration->issue_date < "2022-02-19"){?> 
								<img style="width: 110px;margin-left: 30%;" src="<?=$this->Digitalocean_model->get_photo('images/Deputy_Registrar.png')?>">
							<?php }else{?> 
								<img style="width: 110px; margin-left: 33%;" src="<?=$this->Digitalocean_model->get_photo('images/seprate_reg.PNG')?>" alt="">
							<?php }?>
							<br>
							<?php if(date("Y-m-d",strtotime($migration->created_on)) <= "2023-09-19"){?>
							<strong class="marksheet_sign">Registrar / Controller of Examination</strong>
							<?php }else{?>
							<strong class="marksheet_sign">Dy. Registrar / Controller of Examination</strong>
							<?php }?> -->

                            <img style="width: 110px;margin-left: 30%;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$migration->signature)?>">   
                            <p style="width: 110px;margin-left: 30%;"><?=$migration->dispalay_signature;?></p>
						</div>
					</div>
					<div class="signature_marksheet"></div>
				</div>
			</div>  
			<div class="bottom_strip"></div>
		</div>  
	<?php } ?>  
	<script src="<?=base_url();?>js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>css/marksheet/main.js"></script>
</body>
</html>

