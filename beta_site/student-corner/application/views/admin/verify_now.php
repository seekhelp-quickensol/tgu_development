<?php include('header.php');?>
<?php include('sidebar.php');?>
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
		border-bottom: 1px dotted #cccccc;
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

.modal-content {
    width: 150%;
    height: 745px;
    margin-left: -265px;
}
.frame-class img{
	width: 100% !important;
}

	 
</style> 
<section>
    <div >
        <div class="container-fuild formv">
            <div class="row">
                <div class="well col-md-12">
                    <form class="card-form " method="post" id="add-customer" enctype='multipart/form-data' name="add-customer" &nbsp; Novalidate="&nbsp; Novalidate">
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
              					<tr><td class="up">SESSION:&nbsp;&nbsp;&nbsp;<span class="detailsadd"><?php echo strtoupper($admission->session_name) ?></span></td></tr>
        						<tr><td class="up">COURSE:&nbsp;&nbsp;&nbsp;<span class="detailsadd"><?php echo strtoupper($admission->print_name) ?></span></td></tr>
        						<tr><td class="up">STREAM:&nbsp;&nbsp;&nbsp;<span class="detailsadd"><?php echo strtoupper($admission->stream_name) ?></span></td></tr>
    						</tbody>
						</table>
					</div>
					<div class="col-md-6" style="text-align: right;">
						<table class="detailTable" style="width:100%" cellpadding="6">
						<tbody >
                				<tr>
									<td width="105px">
										<div >
											<img src="<?=$admission->photo_path?>"  alt="" style="border: 1px dotted #333333;" width="95" height="100"/>
											<!-- <div class="radio-box" style="margin-top: 6px;">
												<input type="radio" name="photo_verified" value="1" <?php if(!empty($verified) && $verified->photo_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												<input type="radio" name="photo_verified" value="0" <?php if(!empty($verified) && $verified->photo_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div> -->
										</div>
										<div >
											
											<div class="radio-box" style="margin-top: 6px;">
												<input type="radio" name="photo_verified" value="1" <?php if(!empty($verified) && $verified->photo_verified == "1"){?>checked="checked"<?php }?>> &nbsp; Yes
												&nbsp;
												<input type="radio" name="photo_verified" value="0" <?php if(!empty($verified) && $verified->photo_verified == "0"){?>checked="checked"<?php }?>> &nbsp; No
											</div>
										</div>
		   							</td>
								</tr>
              					
    						</tbody>
							
						</table>
					</div>
				</div>
				<hr>
				<span class="heading">GENERAL INFORMATION</span>
			
						<table class="detailTable" width="100%">
    						<tbody>
							
							<!-- <tr><td class="heading" colspan="8">GENERAL INFORMATION</td></tr> -->
							
							<tr>
									<td class="heading1">Name of the Candidate:</td>
            						<td colspan=3 class="data"><?=$admission->student_name?></td>
									<td class="centertd" > 
										<div class="radio-box" >
											<input type="radio" name="name_verified" value="1" <?php if(!empty($verified) && $verified->name_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
											&nbsp;	
											<input type="radio" name="name_verified" value="0" <?php if(!empty($verified) && $verified->name_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
										</div>
									</td>
									<td>
										<input class="form-control widthhless" type="text" name="name_remark" value="<?php if(!empty($verified)){ echo $verified->name_remark;}?>" placeholder="Remark if any?" >
									</td>
        						</tr>
        						<tr>
									<td class="heading1">Father's Name:</td>
            						<td colspan=3 class="data"><?=$admission->father_name?></td>
									<td class="centertd">
										<div class="radio-box" >
											<input type="radio" name="father_verified" value="1" <?php if(!empty($verified) && $verified->father_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
											&nbsp;
											<input type="radio" name="father_verified" value="0" <?php if(!empty($verified) && $verified->father_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
										</div>
									</td>
									<td>
										<input class="form-control widthhless" type="text" name="father_remark" value="<?php if(!empty($verified)){ echo $verified->father_remark;}?>" placeholder="Remark if any?">
									</td>
        						</tr>
       							 <tr>
									<td class="heading1">Mother's Name:</td>
            						<td  colspan=3 class="data"><?=$admission->mother_name?></td>
									<td class="centertd">
										<div class="radio-box" >
											<input type="radio" name="mother_verified" value="1" <?php if(!empty($verified) && $verified->mother_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
											&nbsp;
											<input type="radio" name="mother_verified" value="0" <?php if(!empty($verified) && $verified->mother_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
										</div>
									</td>
									<td>
										<input class="form-control widthhless" type="text" name="mother_remark" value="<?php if(!empty($verified)){ echo $verified->mother_remark;}?>" placeholder="Remark if any?" >
									</td>
       							 </tr>    
        						<tr>
								<tr><td class="heading1">Date Of Birth:</td>
                       					<td colspan=3 class="data" width="170px"><?=date("d-m-Y",strtotime($admission->date_of_birth))?></td>
										<td class="centertd" >
											<div class="radio-box">
												<input type="radio" name="birth_verified" value="1" <?php if(!empty($verified) && $verified->birth_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="birth_verified" value="0" <?php if(!empty($verified) && $verified->birth_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div>
										</td>
										<td> 
											<input class="form-control" type="text" name="birth_remark" value="<?php if(!empty($verified)){ echo $verified->birth_remark;}?>" placeholder="Remark if any?"> 
										</td>
                                    </tr> 
									<tr><td class="heading1" width="160px">Nationality:</td>
                        				<td colspan=3 class="data" width="170px"><?=$admission->nationality?></td>
										<td class="centertd" >
											<div class="radio-box">
												<input type="radio" name="nationality_verified" value="1" <?php if(!empty($verified) && $verified->nationality_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="nationality_verified" value="0" <?php if(!empty($verified) && $verified->nationality_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div>
										</td>
										<td>
											<input class="form-control" type="text" name="nationality_remark" value="<?php if(!empty($verified)){ echo $verified->nationality_remark;}?>" placeholder="Remark if any?">
										</td>
        							</tr>  
									<tr><td class="heading1">Candidate Address:</td>
        							    <td colspan=3 class="data"><?=$admission->address?></td>
										<td class="centertd" >
											<div class="radio-box">
												<input type="radio" name="address_verified" value="1" <?php if(!empty($verified) && $verified->address_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="address_verified" value="0" <?php if(!empty($verified) && $verified->address_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div>
										</td>
										<td>
											<input class="form-control" type="text" name="address_remark" value="<?php if(!empty($verified)){ echo $verified->address_remark;}?>" placeholder="Remark if any?">
										</td>
        							</tr>
									<tr>
										<td class="heading1" width="100px">City:</td>
        							    <td colspan=3 class="data" width="150px"><?=$admission->city_name?></td>
										<td class="centertd" >
											<div class="radio-box">
												<input type="radio" name="city_verified" value="1" <?php if(!empty($verified) && $verified->city_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="city_verified" value="0" <?php if(!empty($verified) && $verified->city_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div>
										</td>
										<td>
											<input class="form-control" type="text" name="city_remark" value="<?php if(!empty($verified)){ echo $verified->city_remark;}?>" placeholder="Remark if any?">
										</td>
									
									</tr>
									<tr>
										<td class="heading1" width="100px">Pin Code:</td>
										<td colspan=3 class="data" width="150px"><?=$admission->pincode?></td>
										<td class="centertd" >
											<div class="radio-box">
												<input type="radio" name="pin_verified" value="1" <?php if(!empty($verified) && $verified->pin_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="pin_verified" value="0" <?php if(!empty($verified) && $verified->pin_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div>
										</td>
											<td>
												<input class="form-control" type="text" name="pin_remark" value="<?php if(!empty($verified)){ echo $verified->pin_remark;}?>" placeholder="Remark if any">
											</td>
									</tr>
									<tr>
										<td class="heading1" width="100px">State:</td>
                        				<td colspan=3 class="data" width="150px"><?=$admission->state_name?></td>
										<td class="centertd" >
											<div class="radio-box">
												<input type="radio" name="state_verified" value="1" <?php if(!empty($verified) && $verified->state_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="state_verified" value="0" <?php if(!empty($verified) && $verified->state_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div> 
										</td>									
										<td>
											<input class="form-control" type="text" name="state_remark" value="<?php if(!empty($verified)){ echo $verified->state_remark;}?>" placeholder="Remark if any?">
										</td>
            						</tr>
									<tr>
										<td class="heading1" width="100px">Country:</td>
										<td colspan=3 class="data" width="150px"><?=$admission->country_name?></td>
										<td class="centertd" >
											<div class="radio-box">
												<input type="radio" name="country_verified" value="1" <?php if(!empty($verified) && $verified->country_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="country_verified" value="0" <?php if(!empty($verified) && $verified->country_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div> 
										</td>						
										<td>
											<input class="form-control" type="text" name="country_remark" value="<?php if(!empty($verified)){ echo $verified->country_remark;}?>" placeholder="Remark if any?">
										</td>
									</tr>
									<tr>
										<td class="heading1" width="160px">Contact Number:</td>
                						<td colspan=3 class="data" width="170px"><?=$admission->mobile?></td>
										<td class="centertd" >
											<div class="radio-box">
												<input type="radio" name="mobile_verified" value="1" <?php if(!empty($verified) && $verified->mobile_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="mobile_verified" value="0" <?php if(!empty($verified) && $verified->mobile_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div> 
										</td>						
										<td>
											<input class="form-control" type="text" name="mobile_remark" value="<?php if(!empty($verified)){ echo $verified->mobile_remark;}?>" placeholder="Remark if any?">
										</td>
									</tr>
									<tr>
                        				<td class="heading1" width="160px">Email Address:</td>
                        				<td colspan=3 class="data" width="170px"><?=$admission->email?></td>
										<td class="centertd" >
											<div class="radio-box">
												<input type="radio" name="email_verified" value="1" <?php if(!empty($verified) && $verified->email_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="email_verified" value="0" <?php if(!empty($verified) && $verified->email_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div> 
										</td>						
										<td>
											<input class="form-control" type="text" name="email_remark" value="<?php if(!empty($verified)){ echo $verified->email_remark;}?>" placeholder="Remark if any?">
										</td>
                    				</tr> 
									<tr>
										<td class="heading1" width="160px">Category:</td>
                    					<td colspan=3 class="data" width="170px"><?=$admission->category?></td>
										<td class="centertd" >
											<div class="radio-box">
												<input type="radio" name="category_verified" value="1" <?php if(!empty($verified) && $verified->category_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="category_verified" value="0" <?php if(!empty($verified) && $verified->category_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div> 
										</td>						
										<td>
											<input class="form-control" type="text" name="cauntry_remark" value="<?php if(!empty($verified)){ echo $verified->cauntry_remark;}?>" placeholder="Remark if any?">
										</td>
									</tr>
									<tr>
                    				    <td class="heading1" width="160px">Gender:</td>
                    				    <td colspan=3 class="data" width="170px"><?=$admission->gender?></td>
										<td class="centertd">
											<div class="radio-box">
												<input type="radio" name="gender_verified" value="1" <?php if(!empty($verified) && $verified->gender_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="gender_verified" value="0" <?php if(!empty($verified) && $verified->gender_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div> 
										</td>						
										<td>
											<input class="form-control" type="text" name="gender_remark" value="<?php if(!empty($verified)){ echo $verified->gender_remark;}?>" placeholder="Remark if any?">
										</td>
                    				</tr>
									<tr>
									    <td class="heading1" width="160px">Year/Sem:</td>
                    				    <td colspan=3 class="data" width="170px"><?=$admission->year_sem?></td>
										<td class="centertd">
											<div class="radio-box">
												<input type="radio" name="year_verified" value="1" <?php if(!empty($verified) && $verified->year_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
												&nbsp;
												<input type="radio" name="year_verified" value="0" <?php if(!empty($verified) && $verified->year_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
											</div> 
										</td>						
										<td>
											<input class="form-control" type="text" name="year_remark" value="<?php if(!empty($verified)){ echo $verified->year_remark;}?>" placeholder="Remark if any?">
										</td>
                    				</tr>	
								</body>
 							</table>
							 <hr>
<span class="heading">Identity Information</span>

<table class="examTable" width="100%" cellpadding="6">
     <tbody>
            <!-- <tr><td class="heading" colspan="6">Identity Information</td></tr> -->
            <tr><td class="heading1">ID Name</td>
                <td class="heading1">ID Number</td>
                <td class="heading1">ID Copy</td> 
                <td class="heading1">Verified</td> 
                <td class="heading1">Remark</td> 
            </tr>
			 
			<tr>
				<td class="data"><?php if($admission->id_type == "1"){ echo "Aadharcard";}else if($admission->id_type == "2"){ echo "Passport";}else if($admission->id_type == "3"){ echo "VoterID";}else if($admission->id_type == "4"){ echo "Pan Card";}else if($admission->id_type == "5"){ echo "Driving License";}?></td>
				<td class="data"><?=$admission->id_number?></td>
				<td class="data">
					<?php if($admission->identity_softcopy !=""){?>
					<a target="_blank" href="<?=base_url();?>view_doc?name=<?=base64_encode($admission->identity_softcopy_path)?>&naming=<?=$admission->identity_softcopy?>">Click to view</a>
					<?php }else{?>
					&nbsp; Not Uploaded
					<?php }?>
				</td>
				<td>
					<div class="radio-box">
						<input type="radio" name="id_verified" value="1" <?php if(!empty($verified) && $verified->id_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
						&nbsp;
						<input type="radio" name="id_verified" value="0" <?php if(!empty($verified) && $verified->id_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
					</div>
				</td>
				<td>
					<input class="form-control" type="text" name="id_remark" value="<?php if(!empty($verified)){ echo $verified->id_remark;}?>" placeholder="Remark if any?">
				</td>
			</tr> 
			 
    </tbody>
</table>

<span class="heading">Qualification Information</span>

<table class="examTable" width="100%" cellpadding="6">
     <tbody>
            <!-- <tr><td class="heading" colspan="7">Qualification Information</td></tr> -->
            <tr><td class="heading1">Examination</td>
                <td class="heading1">Year</td>
                <td class="heading1">Board/University</td>
                <td class="heading1">Marks(%)</td>
                <td class="heading1">Soft Copy</td>
                <td class="heading1">Verified</td>
                <td class="heading1">Reamrk</td>
            </tr>
			<?php
				if(!empty($qualification) && $qualification->secondary_year !=""){
			?>
			<tr>
				<td class="data">Secondary</td>
				<td class="data"><?=$qualification->secondary_year?></td>
				<td class="data"><?=$qualification->secondary_university?></td>
				<td class="data"><?=$qualification->secondary_marks?></td>
				<td>
					<?php if($qualification->secondary_marksheet !=""){?>
					
					<a target="_blank" href="<?=base_url();?>view_doc?name=<?=base64_encode($qualification->secondary_marksheet_path)?>&naming=<?=$qualification->secondary_marksheet?>">Click to view</a>
					<?php }else{?>
					&nbsp; Not Uploaded
					<?php }?>
					 
				</td>
				<td>
					<div class="radio-box">
						<input type="radio" name="secondary_verified" value="1" <?php if(!empty($verified) && $verified->secondary_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
						&nbsp;
						<input type="radio" name="secondary_verified" value="0" <?php if(!empty($verified) && $verified->secondary_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
					</div>
				</td>
				<td>
					<input class="form-control" type="text" name="secondary_remark" value="<?php if(!empty($verified)){ echo $verified->secondary_remark;}?>" placeholder="Remark if any?">
				</td>
			</tr>
			<?php }?>
			
			<?php
				if(!empty($qualification) && $qualification->sr_secondary_year !=""){
			?>
			<tr>
				<td class="data">Sr. Secondary</td>
				<td class="data"><?=$qualification->sr_secondary_year?></td>
				<td class="data"><?=$qualification->sr_secondary_university?></td>
				<td class="data"><?=$qualification->sr_secondary_marks?></td>
				<td>
					<?php if($qualification->sr_secondary_marksheet !=""){?>
					<a target="_blank" href="<?=base_url();?>view_doc?name=<?=base64_encode($qualification->sr_secondary_marksheet_path)?>&naming=<?=$qualification->sr_secondary_marksheet?>">Click to view</a>
					<?php }else{?>
					&nbsp; Not Uploaded
					<?php }?>
					
				</td>
				<td> 
					<div class="radio-box">
						<input type="radio" name="sr_secondary_verified" value="1" <?php if(!empty($verified) && $verified->sr_secondary_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
						&nbsp;
						<input type="radio" name="sr_secondary_verified" value="0" <?php if(!empty($verified) && $verified->sr_secondary_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
					</div>
				</td>
				<td>
					<input class="form-control" type="text" name="sr_secondary_remark" value="<?php if(!empty($verified)){ echo $verified->sr_secondary_remark;}?>" placeholder="Remark if any?">
				</td>
			</tr>
			<?php }?>
			
			<?php
				if(!empty($qualification) && $qualification->graduation_year !=""){
			?>
			<tr>
				<td class="data">Graduation</td>
				<td class="data"><?=$qualification->graduation_year?></td>
				<td class="data"><?=$qualification->graduation_university?></td>
				<td class="data"><?=$qualification->graduation_marks?></td>
				<td>
					<?php if($qualification->graduation_marksheet !=""){?>
					<a target="_blank" href="<?=base_url();?>view_doc?name=<?=base64_encode($qualification->graduation_marksheet_path)?>&naming=<?=$qualification->graduation_marksheet?>">Click to view</a>
					<?php }else{?>
					&nbsp; Not Uploaded
					<?php }?>
					 
				</td>
				<td> 
					<div class="radio-box">
						<input type="radio" name="graduation_verified" value="1" <?php if(!empty($verified) && $verified->graduation_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
						&nbsp;
						<input type="radio" name="graduation_verified" value="0" <?php if(!empty($verified) && $verified->graduation_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
					</div>
				</td>
				<td>
					<input class="form-control" type="text" name="graduation_remark" value="<?php if(!empty($verified)){ echo $verified->graduation_remark;}?>" placeholder="Remark if any?">
				</td>
			</tr>
			<?php }?>
			
			<?php
				if(!empty($qualification) && $qualification->post_graduation_year !=""){
			?>
			<tr>
				<td class="data">Post Graduation</td>
				<td class="data"><?=$qualification->post_graduation_year?></td>
				<td class="data"><?=$qualification->post_graduation_university?></td>
				<td class="data"><?=$qualification->post_graduation_marks?></td>
				<td>
					<?php if($qualification->post_graduation_marksheet !=""){?>
					<a target="_blank" href="<?=base_url();?>view_doc?name=<?=base64_encode($qualification->post_graduation_marksheet_path)?>&naming=<?=$qualification->post_graduation_marksheet?>">Click to view</a>
					<?php }else{?>
					&nbsp; Not Uploaded
					<?php }?>
					 
				</td>
				<td> 
					<div class="radio-box">
						<input type="radio" name="post_gratuation_verified" value="1" <?php if(!empty($verified) && $verified->post_gratuation_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
						<input type="radio" name="post_gratuation_verified" value="0" <?php if(!empty($verified) && $verified->post_gratuation_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
					</div>
				</td>
				<td>
					<input class="form-control" type="text" name="post_gratuation_remark" value="<?php if(!empty($verified)){ echo $verified->post_gratuation_remark;}?>" placeholder="Remark if any?">
				</td>
			</tr>
			<?php }?>
			
			<?php
				if(!empty($qualification) && $qualification->other_qualification_year !=""){
			?>
			<tr>
				<td class="data">Others</td>
				<td class="data"><?=$qualification->other_qualification_year?></td>
				<td class="data"><?=$qualification->other_qualification_university?></td>
				<td class="data"><?=$qualification->other_qualification_marks?></td> 
				<td class="clicka">
					<?php if($qualification->other_qualification_marksheet !=""){?>
					<a target="_blank" href="<?=base_url();?>view_doc?name=<?=base64_encode($qualification->other_qualification_marksheet_path)?>&naming=<?=$qualification->other_qualification_marksheet?>">Click to view</a>
					<?php }else{?>
					&nbsp; Not Uploaded
					<?php }?>
					
				</td>
				<td>
					<div class="radio-box">
						<input type="radio" name="other_verified" value="1" <?php if(!empty($verified) && $verified->other_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
						&nbsp;
						<input type="radio" name="other_verified" value="0" <?php if(!empty($verified) && $verified->other_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
					</div>
				</td>
				<td>
					<input class="form-control" type="text" name="other_remark" value="<?php if(!empty($verified)){ echo $verified->other_remark;}?>" placeholder="Remark if any?">
				</td>
			</tr>
			<?php }?>
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
				<td class="data"><input class="form-control" type="text" name="facebook_url" placeholder="Facebook URL?" value="<?php if(!empty($verified)){ echo $verified->facebook_url;}?>"></td>
				<td>
					<div class="radio-box">
						<input type="radio" name="facebook_verified" value="1" <?php if(!empty($verified) && $verified->facebook_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
						&nbsp;
						<input type="radio" name="facebook_verified" value="0" <?php if(!empty($verified) && $verified->facebook_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
					</div>
				</td>
				<td class="data"><input class="form-control" type="text" name="facebook_remark" placeholder="Remark if any?" value="<?php if(!empty($verified)){ echo $verified->facebook_url;}?>"></td> 
			</tr>
			<tr>
				<td class="data1">Instagram</td>
				<td class="data"><input class="form-control" type="text" name="instagram_url" placeholder="Instagram URL" value="<?php if(!empty($verified)){ echo $verified->instagram_url;}?>"></td>
				<td>
					<div class="radio-box">
						<input type="radio" name="instagram_verified" value="1" <?php if(!empty($verified) && $verified->instagram_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
						&nbsp;
						<input type="radio" name="instagram_verified" value="0" <?php if(!empty($verified) && $verified->instagram_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
					</div>
				</td>
				<td class="data"><input class="form-control" type="text" name="instagram_remark" placeholder="Remrak if any?" value="<?php if(!empty($verified)){ echo $verified->instagram_remark;}?>"></td> 
			</tr>
			<tr>
				<td class="data1">Linkedin</td>
				<td class="data"><input class="form-control" type="text" name="linkedin_url" placeholder="Linkedin URL?" value="<?php if(!empty($verified)){ echo $verified->linkedin_url;}?>"></td>
				<td>
					<div class="radio-box">
						<input type="radio" name="linkedin_verified" value="1" <?php if(!empty($verified) && $verified->linkedin_verified == "1"){?>checked="checked"<?php }?>>&nbsp; Yes
						&nbsp;
						<input type="radio" name="linkedin_verified" value="0" <?php if(!empty($verified) && $verified->linkedin_verified == "0"){?>checked="checked"<?php }?>>&nbsp; No
					</div>
				</td>
				<td class="data"><input class="form-control" type="text" name="linkedin_remark" placeholder="Remrak if any?" value="<?php if(!empty($verified)){ echo $verified->linkedin_remark;}?>"></td> 
			</tr>
    </tbody>
</table>  
<span class="heading">Verification/Rejection Remarks in Details</span>
<table class="examTable" width="100%" cellpadding="6" style="margin-bottom: 10px;">
     <tbody>
		<!-- <tr>
			<td class="heading" colspan="5">Verification Remarks in Details</td>
		</tr> -->
		 <tr>
			<td class="data"><textarea class="form-control" name="remark"><?php if(!empty($verified)){ echo $verified->remark;}?></textarea></td>
		</tr> 
    </tbody>
</table>
  <input type="submit" class="btn btn-primary">
  <input type="submit" class="btn btn-info" name="final_verification" value="Complete Verification" onclick="return confirm('If you will submit this then it will be removed from verification list?');">
  <input type="submit" class="btn btn-danger" name="reject_verification" value="Reject Verification" onclick="return confirm('If you will submit this then it will be removed from verification list?');">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>
<script>
    $(function () {
        $("form[name='add-customer']").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                last_name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                mobile_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                <?php if(!empty($single) && $single->file ==""){   ?>
                file:{
                    required: true,
                },
                <?php } ?>
                gst_&nbsp; No: "required"
            },
            messages: {
                name: "Please specify your name",
                email: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of john.smith@gmail.com"
                },
                mobile_number: {
                    required: "Please enter phone number",
                    digits: "Please enter valid phone number",
                    minlength: "Phone number field accept only 10 digits",
                    maxlength: "Phone number field accept only 10 digits",
                },
                <?php if(!empty($single) && $single->file ==""){  ?>
                file:{
                    required: "Please upload file",
                },
                <?php }?>
              gst_&nbsp; No: "Please enter your gst &nbsp; No"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>