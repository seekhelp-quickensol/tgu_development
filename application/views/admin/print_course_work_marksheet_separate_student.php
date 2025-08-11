<?php 
$obj = new SimpleFunctions();
?>
<?php 
	$profile = $this->Admin_model->get_profile();
	$university_details = $this->Setting_model->get_university_details();
	$access = $this->Setting_model->get_user_privilege_link();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" />
	
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
<title>The Global University Course Work Marks Card</title>
<link href="<?=base_url();?>css/print.css" rel="stylesheet" type="text/css" />
<style type="text/css">
@media screen,print{	
	.container{
		width:  830px;
		height: 1060px;
		border-width: 5px;
		border-color: #085dab;
		border-style: solid;
		position:relative;
		margin: 0px auto;
	}
	.detailTable3 th{
	background: #f4f4f4;
    font-family: sans-serif;
    font-size: 14px;
    border-right: 1px solid #ccc;
    padding: 10px 0;
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
.btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
} 
.certificate_main_div{
	margin-left: 45px; 
}
 
</style>
<script type="text/javascript">
    function printChallan(){ 
		var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
		disp_setting+="scrollbars=yes,width=780, height=700, left=100, top=25"; 
		var content_vlue = document.getElementById("printDiv").innerHTML; 
		var docprint=window.open("","",disp_setting); 
		docprint.document.open(); 
		docprint.document.write('<html><head><title>Course Work Certificate</title><link href="<?=base_url();?>css/print.css" rel="stylesheet" type="text/css" />'); 
		docprint.document.write('<style type=text/css media=print>body{page:verticle;}@page{size: verticle;}@media screen,print{.container{width:  730px;height: 1060px;border-width: 5px;border-color: #085dab;border-style: solid;position:relative;margin: 0px auto;}.detailTable3 th{background: #f4f4f4;font-family: sans-serif;font-size: 14px;border-right: 1px solid #ccc;padding: 10px 0;}table.detailTable3 td {font-weight: bold;font-size: 14px;color: #000000;border-top: 0px;border-bottom: 0px;border-left: 1px solid #cccccc;border-right: 1px solid #cccccc;height: 40px;font-family: sans-serif;padding: 0 10px;}table.detailTable2 td.up{font-size: 15px;font-family: sans-serif;}table.detailTable2 td.up:last-child{font-size: 16px;}table.headerTable td.other{font-size: 14px;color: #333333;font-weight: bold;line-height: 30px;}.logo_heading{display: flex;align-items: center;justify-content: space-between;}.logo_heading{display: flex;align-items: center;text-align: center;position: relative;display: flex;align-items: center;text-decoration: none;}.logo{width: 100px;position: absolute;top: 0px;padding: 10px 30px 0;left: -12px;}.univercity_text {flex: 1;text-align: center;}.univercity_text h4{font-size: 40px;color: #255bab;text-decoration: none;text-align: center;margin: 30px 0 0;line-height: 30px;}.univercity_text p {font-family: sans-serif;font-size: 16px; color: #255bab;text-align: center;margin-bottom: 6px;letter-spacing: 2px;}table.detailTable2 td {font-weight: bold;font-size: 16px;color: #000000;font-family: sans-serif; text-align: center;}.stream_text{font-size: 18px !important;text-align: center;}}.btn {display: inline-block;margin-bottom: 0;font-weight: 400;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;cursor: pointer;background-image: none;border: 1px solid transparent;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;border-radius: 4px;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}.btn-primary {color: #fff;background-color: #337ab7;border-color: #2e6da4;} </style></head><body onLoad="self.print()"><center>');          
		docprint.document.write(content_vlue);          
		docprint.document.write('</center></body></html>'); 
		docprint.document.close(); 
		docprint.focus(); 
    }
</script>
</head>
<body>
<?php if(!empty($marksheet_result)){?>
<div class="">
	<!--<div class="pay-bottom text-center" style="width: 65%;margin: 10px auto;">
		<button class="btn btn-primary" onclick="printChallan()">Print Certificate</button>
	</div>-->
</div>
<div class="container" style="height:1200px">
	<div id="printDiv">
    <div style="margin-top: 30px;" class="certificate_main_div">
		<div  style="background-image: url('<?=$this->Digitalocean_model->get_photo('images/new_marksheet-background.png')?>'); background-position: top; background-repeat: no-repeat; width: 760px; background-size:contain; padding:130px 0px;">
		<div class="blank_box" style="height:100px;">

			</div>	
		<table class="headerTable" width="760px" align="center">
				<!-- <div class="logo_heading"> -->
					<!-- <div class="logo"> -->
						<!-- <img src="<?=$this->Digitalocean_model->get_photo('images/logo.png')?>" width="100" height="100" /> -->
					<!-- </div> -->
					<!-- <div class="univercity_text"> -->
						<!-- <h4>THE GLOBAL UNIVERSITY</h4> -->
						<?php
						if(!empty($university_details)){ 
							echo $university_details->university_name;
						}; ?>
						<!-- <p>Complete Learning Management Solution Process</p> -->


					<!-- </div> -->
					<?php
					if(!empty($university_details)){ 
						echo $university_details->address;
					}; ?>
				<!-- </div> -->
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
					<tr><td align="center" style="height: 20px;">RESULT-cum-DETAILED MARKS CARD</td></tr>
					<tr><td align="center" style="height: 20px;">PRE-DOCTORATE OF PHILOSOPHY</td></tr>
					<tr><td align="center" class="stream_text" style="height: 20px;">(<?=$marksheet_result->stream_name?>)</td></tr>
					<tr><td align="center" style="height: 20px;">COURSE WORK CERTIFICATE</td></tr>
				 
			</table>
			<table class="detailTable2" width="760px" cellpadding="2" align="center">
					<tr><td>&nbsp;</td></tr>
					<tr><td>Student Name:</td><td><?php echo $marksheet_result->student_name; ?></td><td width="100px">&nbsp;</td><td>Enrollment No:</td><td><?php echo $marksheet_result->enrollment_number; ?></td></tr>   
					<tr><td>Father's Name:</td><td><?php echo $marksheet_result->father_name; ?></td><td width="100px">&nbsp;</td><td><!--CWC No:--></td><td style="color:  red;"><?php //$marksheet_result->marksheet_number?></td></tr>
					<tr><td>&nbsp;</td></tr>
			</table>
			<table class="detailTable3  table-bordered" width="760px" cellpadding="2" align="center">
				<tr>
					 <th>SUBJECT CODE</th>
                     <th>SUBJECT</th>
                     <th>MARKS</th> 
                     <th>MARKS OBTAINED</th>

				</tr> 
				<?php
					$subject_details = $this->Separate_students_model->get_course_work_marksheet_details_separate_student($marksheet_result->id);
				// error_reporting('e_all');
				
				$total_max_marks = 0;
				$total_min_marks = 0;
				$total_obt_marks = 0; 
				 if(!empty($subject_details)){ foreach($subject_details as $subject_details_result){
					
				 	// $total_max_marks += $subject_details_result->int_max+$subject_details_result->ext_max;

					// $total_min_marks += $subject_details_result->int_min+$subject_details_result->ext_min;

					// $total_obt_marks += $subject_details_result->int_obt+$subject_details_result->ext_obt;

					$int_max = is_numeric($subject_details_result->int_max) ? $subject_details_result->int_max : 0;
					$int_min = is_numeric($subject_details_result->int_min) ? $subject_details_result->int_min : 0;
					$int_obt = is_numeric($subject_details_result->int_obt) ? $subject_details_result->int_obt : 0;

					$ext_max = is_numeric($subject_details_result->ext_max) ? $subject_details_result->ext_max : 0;
					$ext_min = is_numeric($subject_details_result->ext_min) ? $subject_details_result->ext_min : 0;
					$ext_obt = is_numeric($subject_details_result->ext_obt) ? $subject_details_result->ext_obt : 0;

					$total_max_marks += $int_max + $ext_max;

					$total_min_marks += $int_min + $ext_min;

					$total_obt_marks += $int_obt + $ext_obt;

				 ?>
				<tr class= "detail table-bordered" width="600px">
					<td><?=$subject_details_result->subject_code?></td>
					<td><?=strtoupper($subject_details_result->subject_name)?></td>
					<td>
						<table width="100%">
							<tr>
								<td class="noborder" width="70px"><?php echo intval($subject_details_result->int_max) + intval($subject_details_result->ext_max); ?></td>
								<td class="noborder"><?php if($subject_details_result->int_max !="0"){ echo $subject_details_result->int_max;}?>
									<?php //echo $subject_details_result->ext_max?>
									<!-- 40 -->
								</td>
							</tr>
						</table>
					</td>
					<td>
						<table width="100%">
							<tr>
								<!-- <td class="noborder" width="70px"><?php echo intval($subject_details_result->int_max) + intval($subject_details_result->ext_max); ?></td> -->
								<td class="noborder"><?=$subject_details_result->int_obt?><?=$subject_details_result->ext_obt?></td>
							</tr>
						</table>
					</td>
				</tr>
			<?php }}?>
				 
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" class="heading3">GRAND TOTAL</td>
					<td class="heading3"><?=$total_max_marks?></td>
					<td class="heading3"><?=$total_obt_marks?></td>
				</tr>
			</table>
			
			<table class="detailTable2" width="760px" cellpadding="2" align="center">
			<tr>
				<td>
					<table class="detailTable2" cellpadding="8" align="left">
						<tr><td>&nbsp;</td></tr>
						<tr><td class="up">RESULT:</td>
							<td class="up">PASSED AND OBTAINED  <?=$obj->toText($total_obt_marks)?>  MARKS</td>
						</tr>   
						<tr>
							<td class="up">DATED:</td><td class="up" style="text-align: left;"> <?=date("d-m-Y",strtotime($marksheet_result->issue_date))?></td>
						</tr>
						<tr><td class="up" colspan="2"  style="text-align: left;">Itanagar, Arunachal Pradesh</td></tr>
					</table>
				</td>
			<td>
			<!-- <table class="detailTable2" cellpadding="2" align="center">
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td><img src="<?=$this->Digitalocean_model->get_photo('images/blended_coursework_signature.png')?>" width="100" /></td></tr>
				<tr><td align="center">Asst. Registrar</td></tr>                   
			</table> -->
		</table>
		
		<div class="bottom_box">
			<ul style="margin-top: 75px; list-style-type:none; display:flex; justify-content:center; gap:80px;">
				
				<li>
					<img style="width: 100px;height:50px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$marksheet_result->prepared_signature)?>">   
						<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$marksheet_result->prepared_dispalay_signature;?></p>
					
				</li>
				<li>
					<img style="width: 100px;height:50px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$marksheet_result->checked_signature)?>">   
					<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$marksheet_result->checked_dispalay_signature;?></p>
					
				</li>
				<li>
					<img style="width: 100px;height:50px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$marksheet_result->signature)?>">   
					<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$marksheet_result->dispalay_signature;?></p>
				</li>
				 </ul>
				<!-- <li> <div class="images_area"><img src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$marksheet_result->signature)?>" width="100" /></div> <div class="label_area"><?=$marksheet_result->dispalay_signature;?></div></li></ul> -->
				<div style="clear:both"></div>
			<p style="font-family: arial;margin-top:65px;margin-left: 15px;">NB: Qualifying Marks for Ph.D. Admission = 55% in Aggregate</p>
		</div>  
	</div>
</div>
</div>
</div>
<?php }else{?>
	<?php 
		redirect('student-dashboard');
	?>

<?php }?>
</body>
</html> 