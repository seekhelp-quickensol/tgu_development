<?php include('header.php');?>

    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          
		  <button id="btn" class="btn btn-primary">Print</button>
		  <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
			
		   <div id="print_id" style="width: 1000px;height:335px;border:4px solid #0566b1;margin:0px auto;margin-top: 50px;position: relative;background:#fff;">
	<div style="width: 487px;border-right: 3px solid #0566b1;height:335px;float:left;">
		<div style="text-align: center;height: 85px;"><img style="width: 348px;margin-top:2px" src="<?=base_url();?>images/logo/logo.png"></div>
		<div style="height:40px;background: linear-gradient(to right, #b73710, #184098);padding-top:9px;text-align: center;">	
		<p style="margin:0px;font-size: 14px;font-family: arial;font-weight: 600;text-transform: uppercase;color: #fff;">Student ID Card</p></div>
		<div style="position:relative;padding: 10px 0px;">
			<table style="width:84%;font-family:arial;font-size:14px">
				
				<tr>
					<td style="padding:10px;font-weight:600;width:40%">Registration No:</td>
					<td style="padding:10px;"><?=$student_profile->id?></td>
				</tr>
				<tr>
					<td style="padding:8px;font-weight:600;">Student Name:</td>
					<td style="padding:8px;"><?=$student_profile->student_name?></td>
				</tr>
				<tr>
					<td style="padding:8px;font-weight:600;">Father's/ Husband Name:</td>
					<td style="padding:8px;"><?=$student_profile->father_name?></td>
				</tr>
				<tr>
					<td style="padding:8px;font-weight:600;">Faculty:</td>
					<td style="padding:8px;"><?=$admission->faculty_name?></td>
				</tr>
			</table>
			<div style="position:absolute;right:30px;top:10px;">
				<img src="<?=base_url();?>images/profile_pic/<?php if(!empty($student_profile) && $student_profile->photo !=""){ echo $student_profile->photo; }else{?>default.jpg<?php }?>" style="height:100px;border-radius: 6px;">
			</div>
		</div>
	</div>
	<div style="width:505px;height:335px;float:left;position: relative;" >
		<img src="<?=base_url();?>images/logo/bir.png" style="position: absolute;right: 0;top: 9px;">
		
		<div style="position:relative;padding: 10px 0px;">
			<table style="width:84%;font-family:arial;font-size:14px">
				<tr>
					<td style="padding:10px;font-weight:600;width:40%">Course : </td>
					<td style="padding:10px;"> <?=$admission->print_name?> </td>
				</tr>
				<tr>
					<td style="padding:10px;font-weight:600;width:40%">Registration Date:</td>
					<td style="padding:10px;"><?=date("d/m/Y",strtotime($student_profile->admission_date))?></td>
				</tr>
				
				<tr>
					<td style="padding:8px;font-weight:600;">Address:</td>
					<td style="padding:8px;"><?=$student_profile->address?> - <?=$student_profile->mobile?></td>
				</tr>
				<tr>
					<td style="padding:8px;font-weight:600;">Signature:</td>
					<td style="padding:8px;"><img style="width:150px;height:100px" src="<?=base_url();?>images/signature/<?=$student_profile->signature?>"></td>
				</tr>
			</table>
			
		</div>
		<div style="position:absolute;left:0px;right:0;bottom:0px;background: linear-gradient(to right, #b73710, #184098);height: 45px;width: 509px;"><p style="text-align: center;color: #fff;font-family: arial;font-size: 14px;margin: 0px;padding-top: 14px;font-weight: 600;">www.birtikendrajituniversity.com</p></div>
	</div>
		</div>

	</div>
	</div>
	
    </div>
      
<?php include('footer.php');?>
<script>

function printData()
{
   var divToPrint=document.getElementById("print_id");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
</script>
 