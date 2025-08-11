<?php
include('header.php');
 $university_details = $this->Setting_model->get_university_details();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="SHORTCUT ICON" href="images/favicon.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <meta http-equiv="CACHE-CONTROL" content="no-store" /> 
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="sd" content="no-cache" />
        <title><?php if(!empty($university_details)){ echo $university_details->university_name;}?> - Print Form Information</title>
 <style type="text/css">
	html,body{
		margin: 0px;
	}
	table.headerTable{
		font-family: "Calibri","Century Gothic","Avant Garde",Helvetica,Arial,sans-serif;
		border-width: 0px;
		border-collapse: collapse;
	}
	table.headerTable td{
		font-size: 12px;
		color: #333333;
		font-weight: bold;
	}
	table.headerTable td.other{
		font-size: 12px;
		color: #333333;
		font-weight: bold;
	}
	table.headerTable td.colhead{
		color: #6289ca;
		font-weight:  bold;
		font-size: 18px;
	}
	table.headerTable td.orange{
		color: #ff8800;
		font-size: 12px;
		font-weight: bold; 
	}
	table.headerTable td.brown{
		color: #993300;
		font-size: 12px;
		font-weight: bold; 
	}
	span.form{
		font-family: "Calibri","Century Gothic","Avant Garde",Helvetica,Arial,sans-serif;
		font-weight: bold;
		font-size: 16px;
		color: #fff;
		background: #6289ca;
		border: 1px solid #6289ca;
		padding: 5px;
	}
	p.dec{
		font-family: "Calibri","Century Gothic","Avant Garde",Helvetica,Arial,sans-serif;
		font-weight: &nbsp; Normal;
		font-size: 12px;
		color: #000000;
		text-align: justify;
	}
	table.detailTable{
		font-family: "Calibri","Century Gothic","Avant Garde",Helvetica,Arial,sans-serif;
		border-collapse: collapse;
	}
	table.detailTable td{
		font-weight: bold;
		font-size: 13px;
		color: #000000;
	}
	table.detailTable td.up{
		font-size: 13px;
		color: #000000;
	}
	table.detailTable td.heading{ 
		font-weight: 600;
		font-size: 17px;
    color: #28a84b;
    padding: 5px;
	}

	table.detailTable td.heading2{ 
		font-weight: bold;
		font-size: 12px;
		color: #333333;
		text-decoration: underline;
	}
	table.detailTable td.data{ 
		font-weight: 200;
    	font-size: 13px;
		color: #000000;
		text-transform: uppercase;
	}
	table.detailTable td.data1{ 
		font-weight: bold;
		font-size: 12px;
		color: #000000;
		border-bottom: 1px dotted #cccccc;
	}
	table.examTable{
		font-family: "Calibri","Century Gothic","Avant Garde",Helvetica,Arial,sans-serif;
		border-collapse: collapse;
		border: 1px solid #cccccc;
	}
	table.examTable td{
		font-weight: bold;
		font-size: 12px;
		color: #000000;
		border: 1px solid #cccccc;
	}
	table.examTable td.heading{ 
		font-weight: bold;
		font-size: 17px;
    color: #28a84b;
  
    padding: 5px;
    text-transform: uppercase;
	}
	table.examTable td.heading1{ 
		font-weight: bold;
		font-size: 15px !important;
		color: #333333;
	}
	table.examTable td.data{ 
		font-weight: 300;
		font-size: 13px;
		color: #000000;
		text-transform: uppercase;
	}
	table.examTable td.data1{ 
		font-weight: 600;
		font-size: 13px;
		color: #000000;
		text-transform: uppercase;
	}
	.btn {
		display: inline-block;
		margin-bottom: 0;
		font-weight: 400;
		text-align: center;
		white-space: &nbsp; Nowrap;
		vertical-align: middle;
		-ms-touch-action: manipulation;
		touch-action: manipulation;
		cursor: pointer;
		background-image: &nbsp; None;
		border: 1px solid transparent;
		padding: 6px 12px;
		font-size: 14px;
		line-height: 1.42857143;
		border-radius: 4px;
		-webkit-user-select: &nbsp; None;
		-moz-user-select: &nbsp; None;
		-ms-user-select: &nbsp; None;
		user-select: &nbsp; None;
	}
	.btn-primary {
		color: #fff;
		background-color: #337ab7;
		border-color: #2e6da4;
	}
	.form-control{
		margin: 2px;
	}
	.formv{
		margin: 2%;
	}
.centertd{
		text-align:center !important;
	}
	.radio-box{
		font-size: 13px;
	}
	a{
		font-size: 13px;	
	}
	.bg-light {
    background-color: #ffffff!important;
}
.detailsadd 
{
	font-size:12px !important;
}
.heading{
	font-weight: bold;
    font-size: 17px;
    color: #28a84b;
    padding: 5px;
	
    text-transform: uppercase;
}
.center_layer{
	text-align:center;
}
table{
	margin-top:5px;
	margin-bottom:15px;
}
/* .clicka a{
	color:#000 !important;
}
.clicka a:hover{
	color: #26a54a !important;

} */
.form11 h4 {
    font-weight: 600;
    color: #2bae4d;
}
table.detailTable {
    font-family: "Calibri","Century Gothic","Avant Garde",Helvetica,Arial,sans-serif;
    border-collapse: collapse;
}
.heading {
    font-weight: bold;
    font-size: 17px;
    color: #28a84b;
    padding: 5px 0px;
    text-transform: uppercase;
}
.page-content {
    display: inline-block;
    width: 100%;
    padding-left: 0px;
    padding-top: 20px;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.card-form {
    padding: 0px 20px 15px;
    box-shadow: 0 0.46875rem 2.1875rem rgb(4 9 20 / 3%), 0 0.9375rem 1.40625rem rgb(4 9 20 / 3%), 0 0.25rem 0.53125rem rgb(4 9 20 / 5%), 0 0.125rem 0.1875rem rgb(4 9 20 / 3%);
    border-radius: 10px;
    background: white;
    border: 1px solid #ddd;
}
.new_table td{
	padding: 10px 15px 10px 6px;
    font-size: 14px !important;
}
.center_layer{
	text-align:center;
}
.mdi-check-circle{
	color:#38aa05;
	font-size:20px;
}
.mdi-close-circle-outline{
  color:#f10b0b;
  font-size:20px;
}	
.new_table{
	background:#f7f4f4;
	    border-radius: 4px;
}
</style> 
<section>
    <div >
        <div class="container-fuild formv">
            <div class="row">
                <div class="well col-md-12">
				
                    <div class="row">  
					<div class="col-md-6">
						<table class="detailTable" width="100%" cellpadding="6">
							<tbody>
                				<tr>
									
									<td ><span class="form11"><h4>ADMISSION FORM&nbsp;-&nbsp;#<?=$admission->id?></h4></span>
										<input type="hidden" name="id" value="<?=$admission->id?>">
										<input type="hidden" name="student_type" value="0">
									</td>
									<td>&nbsp;</td>
		   				
								</tr>
              					<tr><td class="up">ENROLLMENT NUMBER:&nbsp;&nbsp;&nbsp;<span class="detailsadd"><?php echo strtoupper($admission->enrollment_number) ?></span></td></tr>
              					<tr><td class="up">SESSION:&nbsp;&nbsp;&nbsp;<span class="detailsadd"><?php echo strtoupper($admission->session_name) ?></span></td></tr>
        						<tr><td class="up">COURSE:&nbsp;&nbsp;&nbsp;<span class="detailsadd"><?php echo strtoupper($admission->print_name) ?></span></td></tr>
        						<tr><td class="up">STREAM:&nbsp;&nbsp;&nbsp;<span class="detailsadd"><?php echo strtoupper($admission->stream_name) ?></span></td></tr>
        						
    						</tbody>
						</table>
					</div>
					<div class="col-md-6" style="text-align: right;">
						 
					</div>
				</div>
				<hr>
				<span class="heading">GENERAL INFORMATION</span>
			
						<table class="detailTable new_table" width="100%">
    						<tbody>
							
							<!-- <tr><td class="heading" colspan="8">GENERAL INFORMATION</td></tr> -->
							
							<tr>
									<td class="heading1">Name of the Candidate:</td>
            						<td colspan=3 class="data"><?=$admission->student_name?></td>
									<td class="centertd" > 
										<div class="radio-box" >
											<?php if(!empty($verified) && $verified->name_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
										</div>
									</td>
									<td>
										 <?php if(!empty($verified)){ echo $verified->name_remark;}?> 
									</td>
        						</tr>
        						<tr>
									<td class="heading1">Father's Name:</td>
            						<td colspan=3 class="data"><?=$admission->father_name?></td>
									<td class="centertd">
										<div class="radio-box" >
											<?php if(!empty($verified) && $verified->father_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
										</div>
									</td>
									<td>
										 <?php if(!empty($verified)){ echo $verified->father_remark;}?> 
									</td>
        						</tr>
       							 <tr>
									<td class="heading1">Mother's Name:</td>
            						<td  colspan=3 class="data"><?=$admission->mother_name?></td>
									<td class="centertd">
										<div class="radio-box">
											<?php if(!empty($verified) && $verified->mother_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
										</div>
									</td>
									<td>
										 <?php if(!empty($verified)){ echo $verified->mother_remark;}?> 
									</td>
       							 </tr>    
        						<tr>
								<tr><td class="heading1">Date Of Birth:</td>
                       					<td colspan=3 class="data" width="170px"><?=date("d-m-Y",strtotime($admission->date_of_birth))?></td>
										<td class="centertd" >
											<div class="radio-box">
												<?php if(!empty($verified) && $verified->birth_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
											</div>
										</td>
										<td> 
											 <?php if(!empty($verified)){ echo $verified->birth_remark;}?> 
										</td>
                                    </tr> 
									 
									<tr><td class="heading1">Candidate Address:</td>
        							    <td colspan=3 class="data"><?=$admission->address?></td>
										<td class="centertd" >
											<div class="radio-box">
												<?php if(!empty($verified) && $verified->address_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
											</div>
										</td>
										<td>
											 <?php if(!empty($verified)){ echo $verified->address_remark;}?> 
										</td>
        							</tr>
									  
									<tr>
										<td class="heading1" width="160px">Contact Number:</td>
                						<td colspan=3 class="data" width="170px"><?=$admission->mobile?></td>
										<td class="centertd" >
											<div class="radio-box">
												<?php if(!empty($verified) && $verified->mobile_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
											</div> 
										</td>						
										<td>
											<?php if(!empty($verified)){ echo $verified->mobile_remark;}?> 
										</td>
									</tr>
									<tr>
                        				<td class="heading1" width="160px">Email Address:</td>
                        				<td colspan=3 class="data" width="170px"><?=$admission->email?></td>
										<td class="centertd" >
											<div class="radio-box">
												<?php if(!empty($verified) && $verified->email_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
											</div> 
										</td>						
										<td>
											<?php if(!empty($verified)){ echo $verified->email_remark;}?>
										</td>
                    				</tr> 
									 
									<tr>
                    				    <td class="heading1" width="160px">Gender:</td>
                    				    <td colspan=3 class="data" width="170px"><?=$admission->gender?></td>
										<td class="centertd">
											<div class="radio-box">
												<?php if(!empty($verified) && $verified->gender_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
											</div> 
										</td>						
										<td>
											<?php if(!empty($verified)){ echo $verified->gender_remark;}?>
										</td>
                    				</tr>
									<tr>
									    <td class="heading1" width="160px">Year/Sem:</td>
                    				    <td colspan=3 class="data" width="170px"><?=$admission->year_sem?></td>
										<td class="centertd">
											<div class="radio-box">
												<?php if(!empty($verified) && $verified->year_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
											</div> 
										</td>						
										<td>
											<?php if(!empty($verified)){ echo $verified->year_remark;}?>
										</td>
                    				</tr>	
									<tr>
									    <td class="heading1" width="160px">Religion:</td>
                    				    <td colspan=3 class="data" width="170px"><?=$admission->religion?></td>
										<td class="centertd">
											Religion Specify:
										</td>						
										<td>
											<?php if(!empty($admission)){ echo $admission->religin_specify;}?>
										</td>
                    				</tr>	
								</body>
 							</table>
							 <hr>
<span class="heading">Identity Information</span>

<table class="examTable" width="100%" cellpadding="6">
     <tbody>
            <!-- <tr><td class="heading" colspan="6">Identity Information</td></tr> -->
                <td class="heading1">ID Number</td>
                <td class="heading1">ID Copy</td> 
                <td class="heading1">Verified</td> 
                <td class="heading1">Remark</td> 
            </tr>
			 
			<tr>
				 
				<td class="data"><?=$admission->id_number?></td>
				<td class="data">
					<?php if($admission->identity_softcopy !=""){?>
					<a href="<?=$admission->identity_softcopy_path?>" target="_blank">Click to view</a>
					<?php }else{?>
					&nbsp; Not Uploaded
					<?php }?>
					 
				</td>
				<td>
					<div class="radio-box">
						<?php if(!empty($verified) && $verified->id_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
					</div>
				</td>
				<td>
					<?php if(!empty($verified)){ echo $verified->id_remark;}?>
				</td>
			</tr> 
			 
    </tbody>
</table>

<span class="heading">Qualification Information</span>

<table class="examTable" width="100%" cellpadding="6">
     <tbody>
            <!-- <tr><td class="heading" colspan="7">Qualification Information</td></tr> -->
                <td class="heading1">Soft Copy</td>
                <td class="heading1">Verified</td>
                <td class="heading1">Reamrk</td>
            </tr>
		 
			<tr>  
				<td>
					<?php if($admission->document !=""){?>
					<a href="<?=$admission->document_path?>" target="_blank">Click to view</a>
					<?php }else{?>
					&nbsp; Not Uploaded
					<?php }?>
					
				</td>
				<td>
					<div class="radio-box">
						<?php if(!empty($verified) && $verified->admission_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
					</div>
				</td>
				<td>
					<?php if(!empty($verified)){ echo $verified->admission_remark;}?>
				</td>
			</tr>
			   
    </tbody>
</table>
  
<span class="heading">Social Information</span>
  
<table class="examTable" width="100%" cellpadding="6">
     <tbody>
            <!-- <tr><td class="heading" colspan="5">Social Information</td></tr> -->
            <tr>
				<td class="heading1">Social Media</td>
                <td class="heading1">Link</td>
                <td class="heading1">Verified</td> 
                <td class="heading1">Remark</td> 
            </tr> 
			<tr>
				<td class="data1">Facebook</td>
				<td class="data">
					<?php if(!empty($verified)){ echo $verified->facebook_url;}?>
				</td>
				<td>
					<div class="radio-box">
						<?php if(!empty($verified) && $verified->facebook_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
					</div>
				</td>
				<td class="data">
					<?php if(!empty($verified)){ echo $verified->facebook_url;}?>
				</td> 
			</tr>
			<tr>
				<td class="data1">Instagram</td>
				<td class="data">
					<?php if(!empty($verified)){ echo $verified->instagram_url;}?>
				</td>
				<td>
					<div class="radio-box">
						<?php if(!empty($verified) && $verified->instagram_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
					</div>
				</td>
				<td class="data">
				<?php if(!empty($verified)){ echo $verified->instagram_remark;}?>
				</td> 
			</tr>
			<tr>
				<td class="data1">Linkedin</td>
				<td class="data"><?php if(!empty($verified)){ echo $verified->linkedin_url;}?></td>
				<td>
					<div class="radio-box">
						<?php if(!empty($verified) && $verified->linkedin_verified == "1"){?><i class="mdi mdi-check-circle"></i><?php }else{ ?><i class="mdi mdi-close-circle-outline"></i><?php }?>	
					</div>
				</td>
				<td class="data">
					<?php if(!empty($verified)){ echo $verified->linkedin_remark;}?>
				</td> 
			</tr>
    </tbody>
</table>  
<span class="heading">Verification Remarks in Details</span>
<table class="examTable" width="100%" cellpadding="6" style="margin-bottom: 10px;">
     <tbody>
		<!-- <tr>
			<td class="heading" colspan="5">Verification Remarks in Details</td>
		</tr> -->
		 <tr>
			<td class="data"><?php if(!empty($verified)){ echo $verified->remark;}?></td>
		</tr> 
    </tbody>
</table>      
<form method="post">
<?php if($admission->doc_verified == 2){?>

<input type="hidden" name="student_id" value="<?=$admission->id?>">
<button name="re_ini" value="re_ini" class="btn btn-danger" onclick="return confirm('Are you sure to re send it for verification?');">Re Send for Verification</button>

<?php }?>
</form>
      
                </div>
            </div>
        </div>
    </div>
</section> 
<?php 
include('footer.php');
?>