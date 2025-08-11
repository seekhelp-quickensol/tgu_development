
<!DOCTYPE html>
<html>
<head>
    <title>Migration Certificate</title>
    <meta name="description">
    <meta name="keywords">
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
            background-color: #FAFAFA;
            font-family: 'Abel', sans-serif;
            font-family: 'Barlow Semi Condensed', sans-serif;
            color: #444444;
            font-size: 13px;
            padding:10px;
        }
        
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
			.form-control {
				background-color: #e9ecef00 !important;
				opacity: 1;
			}
        	.page {
               
                width: 205mm;
                min-height: 291mm;
                padding: 0mm;
                margin: 0mm auto;
                background: white;
                position: relative;
            }
            .letter_area{
                height: 291mm !important; 
            }
            .head_top_logo{
                height:219px;
                 text-align: center;
            }
            .padd_wrapper{
                
                height:100%;
                padding:38px;
            }
            .head_top_logo img{
                width:350px;
            }
		</style>
	</head>
	<body>

    	<div class="page">
			 	
		<div class="letter_area"" style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/new_marksheet-without.jpeg')?>);background-position: center;background-size: cover;border: 2px solid #e8612b;height: 100%;">  
            						    <div class="padd_wrapper">
            							<div class="head_top_logo"><img src="<?=$this->Digitalocean_model->get_photo('images/only-logo.png')?>"></div>
    			
    
    					<p style="float: right;margin-top:0px;font:bold; font-weight: 700">Serial No. :  <?=$migration->id;?></p>
    
    					<p style="text-align: center"><b>University Campus: </b>Canchipur, South View, Imphal West, Manipur, Pincode - 795003</p>
    					<br>
    					<br>
    
    				
    							<p style="width: 285px;margin: 0px auto;color: #000;font-weight: 700;font-size: 17px; text-align: center">MIGRATION CERTIFICATE </p>
    					
    					<div class="row" style="padding-right: 20px;padding-left: 20px">
    						
    						<div class="col-lg-12 col-md-12">
    							<p style="font-size: 15px;color: #000;font-weight: 700;margin-top: 10px;margin-bottom: 10px;">Enrollment No.: <?=$migration->enrollment_number;?></p>
    						</div>
    						<br>
    						<div class="col-lg-12 col-md-12">
    							<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 600;margin-bottom: 0px;line-height: 30px; word-spacing: 10px">This is to certify that this University has no objection to permit <b><?=$migration->student_name;?></b> son/daughter of <b><?=$migration->father_name;?></b> who has studied <b><?=$migration->course_name;?> (<?=$migration->sort_name;?>) <?php if(date("Y-m-d",strtotime($migration->created_on)) >= "2023-09-19"){?> in <?=$migration->stream_name;?><?php }?></b> course with enrollment no. <b><?=$migration->enrollment_number;?></b> during academic/ calender year <b><?=date("Y",strtotime($migration->session_start_date))?></b> in this University, for pursuing his/ her futher studies in any other University/Institution.</p>
    
    							
    							<br>
    							<br>
    							<br>
    
    							<p style="font-size: 16px;color: #000;margin-bottom: 2px;">Imphal, Manipur  <span style="margin-left: 112px;"></span></p>
    							<br>
    							<p style="font-size: 16px;color: #000;margin-bottom: 2px;">Date:  <span style="margin-left: 10px;"><?=date("d-m-Y",strtotime($migration->issue_date));?></span></p>
    							
    
    						</div>
    						<div class="col-lg-12 col-md-12">
    							<div style="width: 205px;float: right;text-align: center;margin-top: 35px;">
    								<?php if(date("Y-m-d",strtotime($migration->issue_date)) <= "2022-02-19"){ ?>
    								<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/Deputy_Registrar.png')?>">
    								<?php }else{
    								if($migration->course_id ==23){
    								?> 
    								<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/resurch_reg.PNG')?>">
    								<?php }else{?>
    								<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/norm_reg.PNG')?>">
    								<?php }}?>
    								<?php if(date("Y-m-d",strtotime($migration->created_on)) <= "2023-09-19"){?>
    								<p style="color: #000;font-size: 18px;font-weight: 900;margin-bottom: 0px;">Registrar</p>
									<?php }else{?>
									<p style="color: #000;font-size: 18px;font-weight: 900;margin-bottom: 0px;">Dy. Registrar / Controller of Examination</p>
									<?php }?>
    							</div>
    						</div>
    						
    				
    				</div>
    			</div>	
    		</div>
	</div>
   
</body>										
