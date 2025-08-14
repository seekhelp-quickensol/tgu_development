<?php 
// echo "<pre>";print_r($marksheet_result);exit;
$obj = new SimpleFunctions();
$university_details = $this->Setting_model->get_university_details();

?>
<?php  
if($marksheet_result->issue_date < "2023-03-23"){?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="<?=base_url();?>images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
<title>Global University Course Work Marks Card</title>
<link href="<?=base_url();?>css/print.css" rel="stylesheet" type="text/css" />
<style type="text/css">
@media screen,print{
table.detailTable3 td.heading3{
	background: #fff !important;
}	
	.container{
		width:  830px;
		height: 1060px;
		border-width: 5px;
		border-color: #085dab;
		border-style: solid;
		position:relative;
	}
	.detailTable3 th{
	 
    font-family: sans-serif;
    font-size: 14px;
    border-right: 1px solid #ccc;
    padding: 10px 0;
    border-bottom: 1px solid #ccc;
	}
	table.detailTable3 td {
    font-weight: bold;
    font-size: 14px;
    color: #000000;
    border-top: 0px;
    border-bottom: 0px;
    border-left: 1px solid #cccccc;
    border-right: 1px solid #cccccc;
    height: 40px;
    font-family: sans-serif;
    padding: 0 10px;
}
table.detailTable2 td.up{
	font-size: 15px;
    font-family: sans-serif;
}
table.detailTable2 td.up:last-child{
	font-size: 16px;
}
table.headerTable td.other{
	 font-size: 14px;
    color: #333333;
    font-weight: bold;
    line-height: 30px;
}
.logo_heading{
	display: flex;
	align-items: center;
	justify-content: space-between;
}
.logo_heading{
	    display: flex;
    align-items: center;
    text-align: center;
    position: relative;
    display: flex;
    align-items: center;
    text-decoration: none;
}
.logo{
    width: 100px;
    position: absolute;
    top: 0px;
    padding: 10px 30px 0;
    left: -12px;
}
.univercity_text {
    flex: 1;
    text-align: center;
}
.univercity_text h4{
	font-size: 40px;
    color: #255bab;
    text-decoration: none;
    text-align: center;
    margin: 30px 0 0;
    line-height: 30px;
}
.univercity_text p {
     font-family: sans-serif;
    font-size: 16px;
    color: #255bab;
    text-align: center;
    margin-bottom: 6px;
    letter-spacing: 2px;
}
table.detailTable2 td {
    font-weight: bold;
    font-size: 16px;
    color: #000000;
    font-family: sans-serif;
    text-align: center;
}
.stream_text{
	font-size: 18px !important;
	text-align: center;
}
} 
 .bottom_box ul{
 	margin: 0;
 	padding: 0;
 }
.align_left td{
	text-align: left !important;
}
 .bottom_box ul li{
 	width: 33.33%;
 	float: left;
 	list-style: none;
 }
 .images_area{
 	height: 75px;
 }
 .label_area{
 	font-weight: bold;
 	font-family:arial ;
 }
</style>
</head>
<body>

<div class="container" style="height:1200px">
    <div id="printDiv" style="margin-left: 45px; margin-top: 30px;">
		<div  style="background-image: url('<?=$this->Digitalocean_model->get_photo('images/asd.jpg')?>'); background-position: center; background-repeat: no-repeat; width: 760px">
			<table class="headerTable" width="760px" align="center">
				<div class="logo_heading">
					<div class="logo"><img src="<?=$this->Digitalocean_model->get_photo('images/only-logo.png')?>" width="100" height="100" /></div>
					<div class="univercity_text">
						<h4><?php
						if(!empty($university_details)){ 
							echo $university_details->university_name;
						}; ?>
						 </h4>
						<p>Complete Learning Management Solution Process</p>
					</div>
				</div>
				<div>
					University Campus:<?php
					if(!empty($university_details)){ 
						echo $university_details->address;
					}; ?>
										
				</div>
				<!-- <tr><td rowspan="3"></td>
					<td align="center"><img src="<?=base_url()?>images/logo.png" width="100" height="100" /></td>
				</tr> -->
				<!-- <tr><td align="center" class="other">Complete Learning Management Solution Process</td></tr> -->
				<tr><td>
					<table align="center">
						<tr>
							<td  class="other">Website:</td><td class="brown"><?php if(!empty($university_details)){ 
							echo $university_details->website;
						}; ?></td>
							<td width="20px">&nbsp;</td>
							<td  class="other">Email:</td><td class="brown"><?php if(!empty($university_details)){ 
							echo $university_details->email;
						}; ?></td>
						</tr>

						
					 </table>
				</td></tr>
				

			</table>
			<table class="detailTable2" width="760px" cellpadding="2" align="center">   
					<tr><td>&nbsp;</td></tr>
					<!--<tr><td align="center" style="height: 20px;">RESULT-cum-DETAILED MARKS CARD</td></tr>
					<tr><td align="center" style="height: 20px;">PRE-DOCTORATE OF PHILOSOPHY</td></tr>-->
					<tr><td align="center" style="height: 20px;">MARK SHEET</td></tr>
					<tr><td align="center" style="height: 20px;">Pre Ph.D Course Examination <?=date("Y",strtotime($marksheet_result->issue_date))?></td></tr>
					<tr><td align="center" class="stream_text" style="height: 20px;"><?=$marksheet_result->stream_name?></td></tr>
					<!--<tr><td align="center" style="height: 20px;">COURSE WORK CERTIFICATE</td></tr>-->
				 
			</table>
			<table class="detailTable2 align_left" width="760px" cellpadding="2" align="center">
					<tr><td>&nbsp;</td></tr>
					<tr><td>Student Name:</td><td><?php echo $marksheet_result->student_name; ?></td><td width="100px">&nbsp;</td><td>Enrollment No:</td><td><?php echo $marksheet_result->enrollment_number; ?></td></tr>   
					<tr><td>Father's Name:</td><td><?php echo $marksheet_result->father_name; ?></td><td width="100px">&nbsp;</td>
					<!--<td>CWC No:</td><td style="color:  red;"><?=$marksheet_result->marksheet_number?></td>-->
					<td>Course Mode:</td><td style=""><?php if($marksheet_result->course_work_type == "1"){ echo "Online";}else{ echo "Regular";}?></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
			</table>
			<table class="detailTable3  table-bordered" width="760px" cellpadding="2" align="center">
				<tr>
					 <th>Course Code</th>
                     <th>Course Title</th>
                     <th>Full Marks</th> 
                     <th>Pass Marks</th> 
                     <th>Marks Obtained</th>

				</tr> 
				<?php
				$total_max_marks = 0;
				$total_min_marks = 0;
				$total_obt_marks = 0; 
				 if(!empty($subject_details)){ foreach($subject_details as $subject_details_result){
					$int_max = is_numeric($subject_details_result->int_max) ? $subject_details_result->int_max : 0;
					$int_min = is_numeric($subject_details_result->int_min) ? $subject_details_result->int_min : 0;
					$int_obt = is_numeric($subject_details_result->int_obt) ? $subject_details_result->int_obt : 0;

					$ext_max = is_numeric($subject_details_result->ext_max) ? $subject_details_result->ext_max : 0;
					$ext_min = is_numeric($subject_details_result->ext_min) ? $subject_details_result->ext_min : 0;
					$ext_obt = is_numeric($subject_details_result->ext_obt) ? $subject_details_result->ext_obt : 0;

					$total_max_marks += $int_max + $ext_max;

					$total_min_marks += $int_min + $ext_min;

					$total_obt_marks += $int_obt + $ext_obt;

				 	// $total_max_marks += $subject_details_result->int_max + $subject_details_result->ext_max;

					// $total_min_marks += $subject_details_result->int_min + $subject_details_result->ext_min;

					// $total_obt_marks += $subject_details_result->int_obt + $subject_details_result->ext_obt;

				 ?>
				<tr class= "detail table-bordered" width="600px" style="text-align: center;">
					<td><?=$subject_details_result->subject_code?></td>
					<td><?=strtoupper($subject_details_result->subject_name)?></td>
					<td>
						<table width="100%">
							<tr>
								<td class="noborder" ><?=$subject_details_result->int_max+$subject_details_result->ext_max?></td>
								
							</tr>
						</table>
					</td>
					<td class="noborder">40</td>
					<td>
						<table width="100%">
							<tr> 
								<td class="noborder"><?=$subject_details_result->int_obt?><?=$subject_details_result->ext_obt?></td>
							</tr>
						</table>
					</td>
				</tr>
			<?php }}?>
				 
				
				<tr>
					<td colspan="2" class="heading3">GRAND TOTAL</td>
					<td class="heading3"><?=$total_max_marks?></td>
					<td class="heading3"></td>
					<td class="heading3"><?=$total_obt_marks?></td>
				</tr>
				<tr>

					<td colspan="5" style="text-align: right;padding-right: 15px;" class="heading3">Percentage of Mark Obtained = 
						<?php  
							$new_width = ($total_obt_marks / 300) * 100;
							echo number_format($new_width,2);
						?>%
					</td> 
				</tr>
				<tr>
					<td colspan="5" style="text-align: left;padding-left: 10px;" class="heading3">RESULT: Qualified for Ph.D. Admission</td> 
				</tr>
			</table>
			
			<table class="detailTable2" width="760px" cellpadding="2" align="">
			<tr>
				<td>
					<table class="detailTable2" cellpadding="8" align="">
						<tr><td>&nbsp;</td></tr>
						<!--<tr><td class="up">RESULT:</td>
							<td class="up">PASSED AND OBTAINED  <?=$obj->toText($total_obt_marks)?>  MARKS</td>
						</tr>-->   
						<tr>
							<td class="up" style="text-align:left">DATED:</td><td class="up" style="text-align: left;"> <?=date("d-m-Y",strtotime($marksheet_result->issue_date))?></td>
						</tr>
						<tr ><td class="up" colspan="2"  style="text-align: left;">Itanagar, Arunachal Pradesh</td></tr>
					</table>
				</td>
			</tr>
			</table>
		<div class="bottom_box">
			<ul style="margin-top: 75px;">
				<!-- <li> <div class="images_area"><img src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/coursework_verified.png')?>" width="100" /></div> <div class="label_area"> Prepared By </div></li>
				<li> <div class="images_area"><img src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/course_work_ckecked_by.png')?>" width="100" /></div> <div class="label_area"> Checked By</div></li>
				<li> <div class="images_area"><img src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>" width="100" /></div> <div class="label_area"> Dy. Registrar </div></li></ul> -->
				<li>
					<!-- <div style="width: 205px;float: right;text-align: center;margin-top: 125px;"> -->
						<img style="width: 170px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$marksheet_result->prepared_signature)?>">   
						<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$marksheet_result->prepared_dispalay_signature;?></p>
					<!-- </div> -->

				</li>
				<li>
					<!-- <div style="width: 205px;float: right;text-align: center;margin-top: 125px;"> -->
						<img style="width: 170px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$marksheet_result->checked_signature)?>">   
						<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$marksheet_result->checked_dispalay_signature;?></p>
					<!-- </div> -->
				</li>
				<li>
					<!-- <div style="width: 205px;float: right;text-align: center;margin-top: 125px;"> -->
						<img style="width: 170px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$marksheet_result->signature)?>">   
						<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$marksheet_result->dispalay_signature;?></p>
					<!-- </div> -->
				</li>


				<!-- <li> <div class="images_area"><img src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$marksheet_result->signature)?>" width="100" /></div> <div class="label_area"><?=$marksheet_result->dispalay_signature;?></div></li></ul> -->
				<div style="clear:both"></div>
			<p style="font-family: arial;margin-top: 25%;margin-left: -35px;">NB: Qualifying Marks for Ph.D. Admission = 55% in Aggregate</p>
		</div>  
	</div>
</div>
</div>

<?php }else{?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="<?=base_url();?>images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
<title>BIR TikendUniversity Course Work Marks Card</title>
<link href="<?=base_url();?>css/print.css" rel="stylesheet" type="text/css" />
<style type="text/css">
@media screen,print{
table.detailTable3 td.heading3{
	background: #fff !important;
}	
	.container{
		width:  830px;
		height: 1060px;
		border-width: 5px;
		border-color: #085dab;
		border-style: solid;
		position:relative;
	}
	.detailTable3 th{
	 
    font-family: sans-serif;
    font-size: 14px;
    border-right: 1px solid #ccc;
    padding: 10px 0;
    border-bottom: 1px solid #ccc;
	}
	table.detailTable3 td {
    font-weight: bold;
    font-size: 14px;
    color: #000000;
    border-top: 0px;
    border-bottom: 0px;
    border-left: 1px solid #cccccc;
    border-right: 1px solid #cccccc;
    height: 40px;
    font-family: sans-serif;
    padding: 0 10px;
}
table.detailTable2 td.up{
	font-size: 15px;
    font-family: sans-serif;
}
table.detailTable2 td.up:last-child{
	font-size: 16px;
}
table.headerTable td.other{
	 font-size: 14px;
    color: #333333;
    font-weight: bold;
    line-height: 30px;
}
.logo_heading{
	display: flex;
	align-items: center;
	justify-content: space-between;
}
.logo_heading{
	    display: flex;
    align-items: center;
    text-align: center;
    position: relative;
    display: flex;
    align-items: center;
    text-decoration: none;
}
.logo{
    width: 100px;
    position: absolute;
    top: 0px;
    padding: 10px 30px 0;
    left: -12px;
}
.univercity_text {
    flex: 1;
    text-align: center;
}
.univercity_text_head{
	font-size: 30px;
    color: #255bab;
    text-decoration: none;
    text-align: center;
    margin: 30px 0 0;
    line-height: 1px;
}
.estable{
	font-size: 16px !important;
    color: #0d0e0f;
    text-decoration: none;
    text-align: center; 
}
.estable_addr{
	font-size: 16px !important;
    color: #255bab;
    text-decoration: none;
    text-align: center; 
	margin-top: -16px;
}
.univercity_text p {
     font-family: sans-serif;
    font-size: 16px;
    color: #255bab;
    text-align: center;
    margin-bottom: 6px;
    letter-spacing: 2px;
}
table.detailTable2 td {
    font-weight: bold;
    font-size: 16px;
    color: #000000;
    font-family: sans-serif;
    text-align: center;
}
.stream_text{
	font-size: 18px !important;
	text-align: center;
}
} 
 .bottom_box ul{
 	margin: 0;
 	padding: 0;
 }
.align_left td{
	text-align: left !important;
}
 .bottom_box ul li{
 	width: 33.33%;
 	float: left;
 	list-style: none;
 }
 .images_area{
 	height: 75px;
 }
 .label_area{
 	font-weight: bold;
 	font-family:arial ;
 }
</style>
</head>
<body>
<div class="container" style="height:1200px">
    <div id="printDiv" style="margin-left: 45px; margin-top: 30px;">
		<div  style="background-image: url('<?=$this->Digitalocean_model->get_photo('images/asd.jpg')?>'); background-position: center; background-repeat: no-repeat; width: 760px">
			<table class="headerTable" width="760px" align="center">
				<div class="logo_heading">
					<div class="logo"><img src="<?=$this->Digitalocean_model->get_photo('images/logo.png')?>" width="100" height="100" /></div>
					<div class="univercity_text">
						<h4 class="univercity_text_head">BIR TIKENDRAJIT UNIVERSITY</h4>
						<h4 class="estable">Established Under Section 2(f) UGC Act, 1956</h4>
						<h4 class="estable_addr">IMPHAL MANIPUR, INDIA</h4>
					</div>
				</div>
				<!-- <tr><td rowspan="3"></td>
					<td align="center"><img src="<?=base_url()?>images/logo.png" width="100" height="100" /></td>
				</tr> -->
				<!-- <tr><td align="center" class="other">Complete Learning Management Solution Process</td></tr> -->
				<!--<tr><td>
					<table align="center">
						<tr>
							<td  class="other">Website:</td><td class="brown">www.theglobaluniversity.edu.in</td>
							<td width="20px">&nbsp;</td>
							<td  class="other">Email:</td><td class="brown">info@theglobaluniversity.edu.in</td>
						</tr>
					 </table>
				</td></tr>-->
			</table>
			<table class="detailTable2" width="760px" cellpadding="2" align="center">   
					<tr><td>&nbsp;</td></tr>
					<!--<tr><td align="center" style="height: 20px;">RESULT-cum-DETAILED MARKS CARD</td></tr>
					<tr><td align="center" style="height: 20px;">PRE-DOCTORATE OF PHILOSOPHY</td></tr>-->
					<tr><td align="center" style="height: 20px;">MARK SHEET</td></tr>
					<tr><td align="center" style="height: 20px;">Pre Ph.D Course Work Examination 
					<?php 
							$exp_sess = explode(" ",$marksheet_result->session_name);
							$print_sess = end($exp_sess);
							echo $print_sess;
						?>
					<?php //echo date("Y",strtotime($marksheet_result->issue_date))?>
					</td></tr>
					<tr><td align="center" class="stream_text" style="height: 20px;">Department of <?=$marksheet_result->stream_name?></td></tr>
					<!--<tr><td align="center" style="height: 20px;">COURSE WORK CERTIFICATE</td></tr>-->
				 
			</table>
			<table class="detailTable2 align_left" width="760px" cellpadding="2" align="center">
					<tr><td>&nbsp;</td></tr>
					<tr><td>Student Name:</td><td><?php echo $marksheet_result->student_name; ?></td><td width="100px">&nbsp;</td><td>Enrollment No:</td><td><?php echo $marksheet_result->enrollment_number; ?></td></tr>   
					<tr><td>Father's Name:</td><td><?php echo $marksheet_result->father_name; ?></td><td width="100px">&nbsp;</td><!--<td>CWC No:</td><td style="color:  red;"><?=$marksheet_result->marksheet_number?></td>--></tr>
					<tr><td>&nbsp;</td></tr>
			</table>
			<table class="detailTable3  table-bordered" width="760px" cellpadding="2" align="center">
				<tr>
					 <th>Course Code</th>
                     <th>Course Title</th>
                     <th>Full Marks</th> 
                     <th>Pass Marks</th> 
                     <th>Marks Obtained</th>

				</tr> 
				<?php
				$total_max_marks = 0;
				$total_min_marks = 0;
				$total_obt_marks = 0; 
				 if(!empty($subject_details)){ foreach($subject_details as $subject_details_result){
				 	$total_max_marks += $subject_details_result->int_max+$subject_details_result->ext_max;

					$total_min_marks += $subject_details_result->int_min+$subject_details_result->ext_min;

					$total_obt_marks += $subject_details_result->int_obt+$subject_details_result->ext_obt;

				 ?>
				<tr class= "detail table-bordered" width="600px" style="text-align: center;">
					<td><?=$subject_details_result->subject_code?></td>
					<td><?=$subject_details_result->subject_name?></td>
					<td>
						<table width="100%">
							<tr>
								<td class="noborder" ><?=$subject_details_result->int_max+$subject_details_result->ext_max?></td>
								
							</tr>
						</table>
					</td>
					<td class="noborder">40</td>
					<td>
						<table width="100%">
							<tr> 
								<td class="noborder"><?=$subject_details_result->int_obt?><?=$subject_details_result->ext_obt?></td>
							</tr>
						</table>
					</td>
				</tr>
			<?php }}?>
				 
				
				<tr>
					<td colspan="2" class="heading3">GRAND TOTAL</td>
					<td class="heading3"><?=$total_max_marks?></td>
					<td class="heading3"></td>
					<td class="heading3"><?=$total_obt_marks?></td>
				</tr>
				<tr>

					<td colspan="5" style="text-align: right;padding-right: 15px;" class="heading3">Percentage of Mark Obtained = 
						<?php  
							$new_width = ($total_obt_marks / 300) * 100;
							echo number_format($new_width,2);
						?>%
					</td> 
				</tr>
				<tr>
					<td colspan="5" style="text-align: left;padding-left: 10px;" class="heading3">RESULT: PASS</td> 
				</tr>
			</table>
			
			<table class="detailTable2" width="760px" cellpadding="2" align="">
			<tr>
				<td>
					<table class="detailTable2" cellpadding="8" align="">
						<tr><td>&nbsp;</td></tr>
						<!--<tr><td class="up">RESULT:</td>
							<td class="up">PASSED AND OBTAINED  <?=$obj->toText($total_obt_marks)?>  MARKS</td>
						</tr>-->   
						<tr>
							<td class="up" style="text-align:left">DATED:</td><td class="up" style="text-align: left;"> <?=date("d-m-Y",strtotime($marksheet_result->issue_date))?></td>
						</tr>
						<tr ><td class="up" colspan="2"  style="text-align: left;">Canchipur Imphal West, Manipur</td></tr>
					</table>
				</td>
			</tr>
			</table>
		<div class="bottom_box">
			<ul style="margin-top: 75px;">
				<li> <div class="images_area"><img src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/coursework_verified.png')?>" width="100" /></div> <div class="label_area"> Prepared By </div></li>
				<li> <div class="images_area"><img src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/course_work_ckecked_by.png')?>" width="100" /></div> <div class="label_area"> Checked By</div></li>
				<li> <div class="images_area"><img src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>" width="100" /></div> <div class="label_area">COE/Dy. Registrar </div></li></ul>
				<div style="clear:both"></div>
			<p style="font-family: arial;margin-top: 25%;margin-left: -35px;"></p>
		</div>  
	</div>
</div>
</div>
<?php }?>
</body>
</html> 