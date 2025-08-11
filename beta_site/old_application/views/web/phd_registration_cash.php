<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(!empty($university_details)){ echo $university_details->university_name;}?> - Fee Deposit Slip</title>
<style type="text/css">
table.challanTable{
    font-family: verdana;
    font-size: 12px;
}
table.challanTable td{
    font-family: verdana;
    font-size: 12px;
}
table.challanTable td.data{
    font-family: verdana;
    font-size: 11px;
    font-weight: bold;
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
</style>
<?php 
$name = "";
if(!empty($student)){
	$name = $student->student_name;
}
?>
<script type="text/javascript">
    function printChallan()
    { 
      var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
          disp_setting+="scrollbars=yes,width=780, height=700, left=100, top=25"; 
      var content_vlue = document.getElementById("challanDiv").innerHTML; 
      var docprint=window.open("","",disp_setting); 
       docprint.document.open(); 
       docprint.document.write('<html><head><title><?=$name?> Admission Challan</title>'); 
       docprint.document.write('<style type=text/css media=print>body{page:verticle;}@page{size: verticle;}</style></head><body onLoad="self.print()"><center>');          
       docprint.document.write(content_vlue);          
       docprint.document.write('</center></body></html>'); 
       docprint.document.close(); 
       docprint.focus(); 
    }
</script>
</head>

<body>
<div id="mainDiv">
</div>
<div id="challanDiv">
<div class="pay-bottom text-center" style="width: 65%;margin: 10px auto;">
<button class="btn btn-primary" onclick="printChallan()">Print Reciept</button>
</div>
<?php
  $obj = new SimpleFunctions();
  if(!empty($student)){
?>

<table width="765" class="challanTable" border="0" align="center">
  <tr>
    <td width="255" style="border-right:dotted"><table width="250" border="0">
      <tr>
        <td colspan="2" align="center">
			<div class=""><img src="<?=base_url();?>images/logo/<?php if(!empty($university_details) && $university_details->logo != ""){ echo $university_details->logo; }else{ echo "demologo.png"; }?>"></div>
			<strong><?php if(!empty($university_details)){ echo $university_details->university_name;}?></strong>
			<p style="margin-top: 5px;margin-bottom: 5px;"><?php if(!empty($university_details)){ echo $university_details->address;}?></p>
			<p style="margin-top: 5px;margin-bottom: 5px;">Contact No: <?php if(!empty($university_details)){ echo $university_details->contact_number;}?></p>
			<p style="margin-top: 5px;margin-bottom: 5px;">Email: <?php if(!empty($university_details)){ echo $university_details->email;}?> </p>
			<p style="margin-top: 5px;margin-bottom: 5px;"><?php if(!empty($university_details)){ echo $university_details->website;}?></p>
		</td>
        </tr>
      <tr>
        <td colspan="2" align="center">Student Copy</td>
        </tr>
      <tr>
        <td width="115">Payment ID No:</td>
        <td width="125">&nbsp;</td>
      </tr>
      <tr>
        <td>Cash Boucher</td>
        <td class="data">-----------------</td>
      </tr>
      <tr>
        <td>Name:</td>
        <td class="data"><?=strtoupper($student->student_name)?></td>
      </tr>
      <tr>
        <td>Father's Name:</td>
        <td class="data"><?=strtoupper($student->father_name)?></td>
      </tr>
      <tr>
        <td>Course:</td>
        <td class="data"><?=strtoupper($student->print_name). " - " . strtoupper($student->stream_name)?></td>
      </tr>
      <tr>
        <td>Date of Registration:</td>
        <td class="data"><?=date("d-m-Y",strtotime($student->created_on))?></td>
      </tr>
      <tr>
        <td>Student ID:</td>
        <td class="data"><?=$student->id?></td>
      </tr>
      <tr>
        <td colspan="2">----------------------------------------</td>
        </tr>
      <tr>
        <td>Mode of Payment:</td>
        <td class="data">CASH</td>
      </tr>
      <tr>
        <td>Amount:</td>
        <td class="data"><?=$student->amount?></td>
      </tr>
      <tr>
        <td>Deposit Date:</td>
        <td class="data"><?=date("d-m-Y",strtotime($student->payment_date))?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><br /><br /><br/><br/><br/><br/>Sing. &amp; Seal of Bank</td>
      </tr>
    </table></td>
    <td width="255" style="border-right:dotted"><table width="255" border="0" style="padding-left:5px">
      <tr>
       <td colspan="2" align="center">
			<div class=""><img src="<?=base_url();?>images/logo/<?php if(!empty($university_details) && $university_details->logo != ""){ echo $university_details->logo; }else{ echo "demologo.png"; }?>"></div>
			<strong><?php if(!empty($university_details)){ echo $university_details->university_name;}?></strong>
			<p style="margin-top: 5px;margin-bottom: 5px;"><?php if(!empty($university_details)){ echo $university_details->address;}?></p>
			<p style="margin-top: 5px;margin-bottom: 5px;">Contact No: <?php if(!empty($university_details)){ echo $university_details->contact_number;}?></p>
			<p style="margin-top: 5px;margin-bottom: 5px;">Email: <?php if(!empty($university_details)){ echo $university_details->email;}?> </p>
			<p style="margin-top: 5px;margin-bottom: 5px;"><?php if(!empty($university_details)){ echo $university_details->website;}?></p>
		</td>
      </tr>
      <tr>
        <td colspan="2" align="center">University Copy</td>
      </tr>
      <tr>
        <td width="115">Payment ID No:</td>
        <td width="125">&nbsp;</td>
      </tr>
      <tr>
        <td>Cash Boucher</td>
        <td class="data">-----------------</td>
      </tr>
      <tr>
        <td>Name:</td>
        <td class="data"><?=strtoupper($student->student_name)?></td>
      </tr>
      <tr>
        <td>Father's Name:</td>
        <td class="data"><?=strtoupper($student->father_name)?></td>
      </tr>
      <tr>
        <td>Course:</td>
        <td class="data"><?=strtoupper($student->print_name). " - " . strtoupper($student->stream_name)?></td>
      </tr> 
      <tr>
        <td>Date of Registration:</td>
        <td class="data"><?=date("d-m-Y",strtotime($student->created_on)) ?></td>
      </tr>
      <tr>
        <td>Student ID:</td>
        <td class="data"><?=$student->id?></td>
      </tr>
      <tr>
        <td colspan="2">----------------------------------------</td>
        </tr>
      <tr>
        <td>Mode of Payment:</td>
        <td class="data">CASH</td>
      </tr>
      <tr>
        <td>Amount:</td>
        <td class="data"><?=$student->amount?></td>
      </tr>
      <tr>
        <td>Deposit Date:</td>
        <td class="data"><?=date("d-m-Y",strtotime($student->payment_date))?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><br /><br /><br/><br/><br/><br/>Sing. &amp; Seal of Bank</td>
      </tr>
    </table></td>
    <td width="255"><table width="255" border="0" style="padding-left:5px">
      <tr>
        <td colspan="2" align="center">
			<div class=""><img src="<?=base_url();?>images/logo/<?php if(!empty($university_details) && $university_details->logo != ""){ echo $university_details->logo; }else{ echo "demologo.png"; }?>"></div>
			<strong><?php if(!empty($university_details)){ echo $university_details->university_name;}?></strong>
			<p style="margin-top: 5px;margin-bottom: 5px;"><?php if(!empty($university_details)){ echo $university_details->address;}?></p>
			<p style="margin-top: 5px;margin-bottom: 5px;">Contact No: <?php if(!empty($university_details)){ echo $university_details->contact_number;}?></p>
			<p style="margin-top: 5px;margin-bottom: 5px;">Email: <?php if(!empty($university_details)){ echo $university_details->email;}?> </p>
			<p style="margin-top: 5px;margin-bottom: 5px;"><?php if(!empty($university_details)){ echo $university_details->website;}?></p>
		</td>
      </tr>
      <tr>
        <td colspan="2" align="center">Bank Copy</td>
      </tr>
      <tr>
        <td width="115">Payment ID No:</td>
        <td width="125">&nbsp;</td>
      </tr>
      <tr>
        <td>Cash Boucher</td>
        <td class="data">-----------------</td>
      </tr>
      <tr>
        <td>Name:</td>
        <td class="data"><?=strtoupper($student->student_name)?></td>
      </tr>
      <tr>
        <td>Father's Name:</td>
        <td class="data"><?=strtoupper($student->father_name)?></td>
      </tr>
      <tr>
        <td>Course:</td>
        <td class="data"><?=strtoupper($student->print_name). " - " . strtoupper($student->stream_name)?></td>
      </tr> 
      <tr>
        <td>Date of Registration:</td>
        <td class="data"><?=date("d-m-Y",strtotime($student->created_on))?></td>
      </tr>
      <tr>
        <td>Student ID:</td>
        <td class="data"><?=$student->id?></td>
      </tr>
      <tr>
        <td colspan="2">----------------------------------------</td>
        </tr>
      <tr>
        <td>Mode of Payment:</td>
        <td class="data">CASH</td>
      </tr>
      <tr>
        <td>Amount:</td>
        <td class="data"><?=$student->amount?></td>
      </tr>
      <tr>
        <td>Deposit Date:</td>
        <td class="data"><?=date("d-m-Y",strtotime($student->payment_date))?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><br /><br /><br/><br/><br/><br/>Sing. &amp; Seal of Bank</td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
  }
?>
</div>
</body>
</html>
