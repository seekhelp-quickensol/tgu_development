<?php 
$university_details = $this->Setting_model->get_university_details();
if(!empty($single)){
    $session_name = $this->Admin_model->get_paper_session($single->session_id);
    $stream_name = $this->Admin_model->get_stream($single->stream_id);
    $course_name = $this->Admin_model->get_course($single->course_id);
	 
?>

<!DOCTYPE html>
<html>
<head>
    <title>CHARACTER CERTIFICATE</title>
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
            color: #000;
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
			.padd_wrapper {
				height: 100%;
				padding: 250px 55px 0px 55px;
			}

            .head_top_logo img{
                width:350px;
            }
            .data_box td:first-child{
            	width:50%;
            	font-weight:500;
            }
             .data_box td:last-child{
            	width:50%;
            	font-weight:500;
				border-bottom: 1px solid;
            }
            .data_box{
            
             margin:0px auto;
            }
            .data_box table{
             width:100%;
             
            }
            .data_box td{
             padding:3px;
            }
            .layer_s{
             text-align:center;
            }
			.statement{
				font-size: 28px;
            font-weight: 700;
            text-align: center;
			color: #000;
            text-transform: uppercase;
            margin-bottom: 15px;
            position: relative;
            margin-top: 15px;
			font-family: 'ariblk_0';
			}
			p{
				color:#000;
				padding-left:20px;
			}
		</style>
	</head>
	<body>
	<div class="page">
         	<div id="letter_section"> 
            					<div> 
            	<div id="letter_section">
					<div>

                    <!-- <p style="float: left;padding-left:20px;font:bold; font-weight: 700">Sr No. :  <?=$single->id;?></p>			     -->
                    <p style="float: left;padding-left: 30px; margin-bottom:0px;font:bold; font-weight: 700">Sr No. : <?=date('Y',strtotime($single->created_on));?><?=substr($single->enrollment_number,-6);?></p>	

						<div class="letter_area" style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet_background.png')?>);background-position: center;background-size: cover;border: 2px solid #e8612b;height: 100%;">  
            						    <div class="padd_wrapper">
            							<!-- <div class="head_top_logo"><img src="<?=$this->Digitalocean_model->get_photo('images/only-logo.png')?>"></div> -->
            					           
							                <p style="text-align: center"><b>University Campus: </b><?php  if(!empty($university_details)){ echo $university_details->address; }?></p>
            					           	<div style="clear:both"></div>
                                        	<div>
                                           </div>
							                <div style="clear:both"></div>
							
									<p style="color: #000;font-weight: 700;font-size: 25px; margin-top: 25px;text-align: center"><u>CHARACTER CERTIFICATE</u></p>
							
							<div style="display: block;">
								
								
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                    This is to certify that
                                    <b><?=$single->student_name?></b> S/D of Shri <b><?=$single->father_name?></b> Bearing enrollment <b><?=$single->enrollment_number?></b>
									course <b><?=$course_name?></b> completed.
                                     </p>
									 <p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">He / she bears good character, to the best of my knowledge.</p>
								<div>
									<div style="width: 318px;float: left;margin-top: 125px;">
											<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;">Date: <?=date("d/m/Y",strtotime($single->issue_date))?>  </p>
											 
									</div>
								
									<div style="float: right;text-align: center;margin-top: 125px;">
                                        <?php if($single->signature != ""){?>
                                        <img src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$single->signature)?>" style="width:100%">   
                                        <p style="color: #000;margin-bottom: 0px;font-weight: 600;font-size: 16px;"><?=$single->dispalay_signature;?></p>
                                        <?php }else{?>
                                        <!-- <img style="width: 84px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
                                        <p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;">Sign Authority </p> -->
                                        <img src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$single->auth_signature)?>">   
                                        <p style="color: #000;margin-bottom: 0px;font-weight: 600;font-size: 16px;"><?=$single->auth_dispalay_signature;?></p>
                                        <?php }?>
										 
										<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;">  </p>
										<!-- <img style="width: 145px;margin-top: 30px;" src="<?=$this->Digitalocean_model->get_photo('images/btu-seal.png')?>"> -->

                                        <img style="width: 145px;margin-top: 30px;" src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->stamp)?>">   
									</div>
								</div>
									
							</div>
							<div style=" text-align: center;margin-top: 250px;margin: 0px auto;"> 
						</div> 
						</div>
					</div>
					</div>
				</div>
					</div>
					</div>
				</div>

</body>										

<?php } ?>




<script src="<?=base_url();?>vendors/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#print-button').click(function() {
        $(".print_button").hide();
        window.print();
        $(".print_button").show();

    });
});
</script>