<?php 
$university_details = $this->Front_model->get_university_details();
if(!empty($single)){
    $session_name = $single->session_name;
    $stream_name = $single->stream_name;
    $course_name = $single->course_name;
?>

<!DOCTYPE html>
<html>
<head>
    <title>II Letter Of Recommendation</title>
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
            					           
							                <p style="text-align: center"><b>University Campus: </b>Canchipur, South View, Imphal West, Manipur, Pincode - 795003</p>
            					           	<div style="clear:both"></div>
                                        	<div>
                                        	<p style="float: right;font:bold; font-weight: 700">Date :  <?=date("d/m/Y", strtotime($single->application_date));?></p>
                                        	<p style="float: left;font-size: 15px;color: #000;font-weight: 700;">Ref No.: BTU/<?=$single->id;?>/LOR/<?= date('Y', strtotime($single->application_date));?></p>
                                            </div>
							                <div style="clear:both"></div>
							
									<p style="color: #000;font-weight: 700;font-size: 25px; margin-top: 25px;text-align: center">TO WHOMSOEVER IT MAY CONCERN </p>
							
							<div style="display: block;">
								
								
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                    It is with utmost pleasure that I am writing this letter of recommendation for 
                                    <b><?php if($single->gender == 'Male'){?>
                                    Mr.
                                    <?php }else{ ?>
                                        Ms. 
                                    <?php } ?>  
                                    <?=$single->student_name;?></b> S/O <b><?=$single->father_name;?></b>, 
                                    <?php /* echo $course_name;?></b> (<?php echo $stream_name;?>)
                                    with 
                                    <b>Enrollment Number: <?php echo $single->enrollment_no;?> </b>
                                    to take up higher studies. 
									</p>
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                        <b>
                                        <?php if($single->gender = 'Male'){?>
                                            Mr.
                                        <?php }else{ ?>
                                            Mrs. 
                                        <?php } ?>  
                                        <?php echo $single->student_name;?> </b>
                                            had maintained an excellent academic record throughout the years of graduation.
                                    </p>
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                    <?php if($single->gender = 'Male'){?>
                                        He
                                    <?php }else{ ?>
                                        She
                                    <?php } ?>  
                                        has a strong urge to pursue higher studies and 
                                        <?php if($single->gender = 'Male'){?>
                                        he
                                    <?php }else{ ?>
                                        she
                                    <?php } ?>  
                                        is able to grasp things easily. Therefore, I strongly recommend 
                                        <b><?php if($single->gender = 'Male'){?>
                                        Mr.
                                    <?php }else{ ?>
                                        Mrs. 
                                    <?php } ?>  
                                        <?php echo $single->student_name;?></b>
                                        to be considered for admission in your esteemed University.
                                    </p>
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                    I wish 
                                    <?php if($single->gender = 'Male'){?>
                                        him
                                    <?php }else{ ?>
                                        her
                                    <?php } ?> 
                                    all the success in his future endeavors.
                                    </p>*/?>
									
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">I have been his mentor during the course of study and found him to be a hardworking, dedicated & very sincere student. He is a very motivated and responsible individual, who can be a positive addition for your institution as well.</p>
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">I have witnessed <b><?php if($single->gender == 'Male'){?>
                                    Mr.
                                    <?php }else{ ?>
                                        Ms. 
                                    <?php } ?>  <?=$single->student_name;?></b> trying to perform with the best of his abilities. He is able to establish camaraderie and a wonderful rapport with people of all ages and has excellent verbal communication skills.</p>
									
								<div>
									
								
									<div style="width: 205px;float: right;text-align: center;margin-top: 125px;">
											<!--<img style="width: 110px;" src="<?=base_url();?>images/norm_reg.PNG">-->
												<!--<img style="width: 84px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">-->
												<img style="width: 170px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/Mr_Robin_Singh.png')?>">
										
										<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;">Mr Y. Bonney Singh<br>Faculty Of Engineering & Technology</p>
									</div>
								</div>
									
							</div>
							<div style=" text-align: center;margin-top: 250px;margin: 0px auto;">
							<img style="width: 145px;margin-top: 100px;" src="<?=$this->Digitalocean_model->get_photo('images/btu-seal.png')?>"> 
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