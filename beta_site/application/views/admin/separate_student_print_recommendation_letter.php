<?php 
// echo "<pre>";print_r($recommendation);exit;
$university_details = $this->Setting_model->get_university_details();
if(!empty($recommendation)){
    // $session_name = $this->Admin_model->get_paper_session($recommendation->session_id);
    // $stream_name = $this->Admin_model->get_stream($recommendation->stream_id);
    // $course_name = $this->Admin_model->get_course($recommendation->course_id);
	$passing_year = $this->Exam_model->get_last_pass_year($recommendation->enrollment_number);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Letter Of Recommendation</title>
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
            .padd_wrapper {
				height: 100%;
				padding: 250px 38px 0px 38px;
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

                    <!-- <p style="float: left;padding-left:20px;font:bold; font-weight: 700">Sr No. :  <?=$recommendation->id;?></p>			     -->
                    <p style="float: left;padding-left: 30px; margin-bottom:0px;font:bold; font-weight: 700">Sr No. : <?=date('Y',strtotime($recommendation->created_on));?><?=substr($recommendation->enrollment_number,-6);?></p>	
						<div class="letter_area" style=" background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet_background.png')?>);background-position: center top; background-size: cover;border: 2px solid #e8612b;height: 100%;">  
            						    <div class="padd_wrapper">
            							<!-- <div class="head_top_logo"><img src="<?=$this->Digitalocean_model->get_photo('images/only-logo.png')?>"></div> -->
            					           
							                <p style="text-align: center"><b>University Campus: </b><?php if($university_details){ echo $university_details->address; }?></p>
            					           	<div style="clear:both"></div>
                                        	<div>
                                        	<!-- <p style="float: right;font:bold; font-weight: 700">Date :  <?=date("d/m/Y",strtotime($recommendation->application_date));?></p>
                                        	<p style="float: left;font-size: 15px;color: #000;font-weight: 700;">Ref No.: TGU/<?=$recommendation->id;?>/LOR/<?= date('Y', strtotime($recommendation->application_date));?></p> -->
                                            </div>
							                <div style="clear:both"></div>
							
									<p style="color: #000;font-weight: 700;font-size: 25px; margin-top: 25px;text-align: center">LETTER OF RECOMMENDATION FOR HIGHER STUDIES </p>
							
							<div style="display: block;">
								
								
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                    I take immense pleasure in recommending 
                                    <b>Mr./Ms.  
                                    <?php echo $recommendation->student_name;?></b>,<b> 
                                    <?php echo $recommendation->course_name;?></b> (<?php echo $recommendation->stream_name;?>)
                                    with 
                                    <b>Enrollment Number: <?php echo $recommendation->enrollment_number;?> </b>
                                    to take up higher studies. 
									</p>
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                        <b>Mr./Ms.  
                                        <?php echo $recommendation->student_name;?> </b>
                                            had maintained an excellent academic record throughout the years of graduation.
                                    </p>
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                        He/She
                                        has a strong urge to pursue higher studies and 
                                        he/she 
                                        is able to grasp things easily. Therefore, I strongly recommend 
                                        <b>
                                        Mr./Ms.  
                                        <?php echo $recommendation->student_name;?></b>
                                        to be considered for admission in your esteemed University.
                                    </p>
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                    I wish him/her all the success in his future endeavors.
                                    </p>
								<div>
									
								
									<div style="width: 205px;float: right;text-align: center;margin-top: 125px;">
										<img src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$recommendation->signature)?>">   
										<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$recommendation->dispalay_signature;?></p>
									</div>
								</div>
									
							</div>
							<div style=" text-align: center;margin-top: 250px;margin: 0px auto;">
							<!--<img style="width: 145px;margin-top: 100px;" src="<?=$this->Digitalocean_model->get_photo('images/btu-seal.png')?>"> -->
                            <img style="width: 145px;margin-top: 100px;" src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->stamp)?>">   
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