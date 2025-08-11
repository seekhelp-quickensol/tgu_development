<?php 
// error_reporting('e_all');
$university_details = $this->Setting_model->get_university_details();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Provisional Degree</title>
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
         	<div id="letter_section"> 
            					<div> 
            	<div id="letter_section">
					<div>
						<div class="letter_area" style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/new_marksheet-without.jpeg')?>);background-position: center;background-size: cover;border: 2px solid #e8612b;height: 100%;">  
            						    <div class="padd_wrapper">
            							<div class="head_top_logo"><img src="<?=$this->Digitalocean_model->get_photo('images/only-logo.png')?>"></div>
            					           
							                <p style="text-align: center"><b>University Campus: </b><?php if(!empty($university_details)){ echo $university_details->address;}?></p>
            					           	<div style="clear:both"></div>
                                        	<div>
                                        	<p style="float: right;font:bold; font-weight: 700">Serial No. :  <?=$provisional_degree->id;?></p>
                                        	<p style="float: left;font-size: 15px;color: #000;font-weight: 700;">Enrollment No.: <?=$provisional_degree->enrollment_number;?></p>
                                            </div>
							                <div style="clear:both"></div>
											<p style="color: #000;font-weight: 700;font-size: 25px; margin-top: 25px;text-align: center">
									<?php $courses = array(262,263,261,228,278);
										if(in_array($provisional_degree->course_id,$courses)){
									?>
									PROVISIONAL CERTIFICATE
										<?php }else{?>
									PROVISIONAL <?=strtoupper($provisional_degree->in_degree)?>
										<?php }?>
									 </p>
							
								<div style="display: block;">
								
								
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">This is to certify that <b><?=$provisional_degree->student_name;?></b>
										S/D/O <b><?=$provisional_degree->father_name;?></b> appeared in <b><?=$provisional_degree->print_name;?> - <?=$provisional_degree->stream_name;?></b> From this University and has been declared passed in <b><?=$division['division'];?></b> examination held in <b><?=$division['date'];?></b>.
									</p>
								<div>
									<div style="width: 205px;float: left;">
									<!-- <p style="font-size: 16px;color: #000;margin-bottom: 2px;;">Imphal</p> -->
								 
									<p style="font-size: 16px;color: #000;margin-bottom: 2px;">Date:  <span style="margin-left: 10px;"><?=date("d/m/Y",strtotime($provisional_degree->issue_date));?></span></p>
									</div>
									<div style="width: 205px;float: right;text-align: center;margin-top: 125px;">
											<!--<img style="width: 110px;" src="<?=base_url();?>images/norm_reg.PNG">-->
												<?php  
												if(date("Y-m-d",strtotime($provisional_degree->created_on)) >= '2023-10-28'){
												?>
													<img style="width: 84px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/misal_sign.png')?>">
												<?php }else{?>
													<img style="width: 84px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
												<?php }?> 
										
										<!-- <p style="color: #000;font-size: 16px;font-weight: 900;margin-bottom: 0px;">Dy. Registrar</p> -->
									</div>
									<!-- <div style=" text-align: center;margin-top: 125px;margin: 0px auto;">
									<img style="width: 145px;margin-top: 250px;" src="<?=$this->Digitalocean_model->get_photo('images/btu-seal.png')?>">  -->
									<div style="width: 205px;float: right;text-align: center;margin-top: 125px;">
										<img style="width: 170px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$provisional_degree->signature)?>">   
										<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$provisional_degree->dispalay_signature;?></p>
									</div>
								</div>
								</div>
								
							</div>
						</div>
					</div>
					</div>
				</div>
					</div>
					</div>
				</div>

</body>										
