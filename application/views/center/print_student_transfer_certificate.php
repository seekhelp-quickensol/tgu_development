<?php 
// $university_details = $this->Setting_model->get_university_details();
// if(!empty($single)){
//     $session_name = $this->Admin_model->get_paper_session($single->session_id);
//     $stream_name = $this->Admin_model->get_stream($single->stream_id);
//     $course_name = $this->Admin_model->get_course($single->course_id);
?>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Transfer Certificate</title>
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
		</style> -->
	<!-- </head>
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
                                        	<p style="float: right;font:bold; font-weight: 700">Date :  <?=date("d/m/Y");?></p>
                                        	<p style="float: left;font-size: 15px;color: #000;font-weight: 700;">Ref No.: TGU/<?=$single->id;?>/Transfer/<?= date('Y', strtotime($single->application_date));?></p>
                                            </div>
							                <div style="clear:both"></div>
							
									<p style="color: #000;font-weight: 700;font-size: 25px; margin-top: 25px;text-align: center"><u>To Whom So It May Concern</u> </p>
							
							<div style="display: block;">
								
								 -->
									<!-- <p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                        This is to certify that <b><?php echo $single->student_name;?></b>
                                        <?php if($single->gender = 'Male'){?>
                                            S/O
                                        <?php }else{ ?>
                                            D/O 
                                        <?php } ?>
                                        <b><?php if(!empty($single)){echo $single->father_name;}?></b> , Enrollment No . <b><?php echo $single->enrollment_no;?></b>, was a bonafide Regular student of THE GLOBAL UNIVERSITY. 
                                        <?php if($single->gender = 'Male'){?>
                                            He
                                        <?php }else{ ?>
                                            She
                                        <?php } ?> -->
                                        <!-- has successfully completed the <b><?php echo $course_name;?> (<?php echo $stream_name;?>)</b> Degree Programme in <b><?php echo $session_name;?></b> from our University.
									</p>
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                    This Certificate is issued on 
                                    <?php if($single->gender = 'Male'){?>
                                        his
                                    <?php }else{ ?>
                                        her
                                    <?php } ?>
                                    own request.                                    
                                    </p>
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
                                     We wish 
                                    <?php if($single->gender = 'Male'){?>
                                        him
                                    <?php }else{ ?>
                                        her
                                    <?php } ?>
                                    all success in life. 
                                    </p>
								<div>
									
								
									<div style="width: 205px;float: right;text-align: center;margin-top: 125px;"> -->
											<!--<img style="width: 110px;" src="<?=base_url();?>images/norm_reg.PNG">-->
												<!-- <img style="width: 84px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
										
										<p style="color: #000;font-size: 16px;font-weight: 900;margin-bottom: 0px;">Dy. Registrar</p>
									</div>
								</div>
									
							</div>
							<div style=" text-align: center;margin-top: 250px;margin: 0px auto;"> -->
							<!-- <img style="width: 145px;margin-top: 200px;" src="<?=$this->Digitalocean_model->get_photo('images/btu-seal.png')?>">  -->
						<!-- </div> 
						</div>
					</div>
					</div>
				</div>
					</div>
					</div>
				</div>

</body>										 -->

<?php
//  }
 ?>




<!-- <script src="<?=base_url();?>vendors/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#print-button').click(function() {
        $(".print_button").hide();
        window.print();
        $(".print_button").show();

    });
});
</script> -->






<?php 

// echo "<pre>";print_r($transfer);exit;
$university_details = $this->Setting_model->get_university_details();
if(!empty($single)){
    $session_name = $this->Admin_model->get_paper_session($single->session_id);
    $stream_name = $this->Admin_model->get_stream($single->stream_id);
    $course_name = $this->Admin_model->get_course($single->course_id);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transfer Certificate</title>
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
					<div class="row" id="letter_section"> 
							<div class="letter_area" style=" background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet_background.png')?>);background-position: center top; background-repeat: no-repeat; background-size: cover;border: 2px solid #e8612b;height: 100%;">  
            				<!-- <p><b>Sr.No. <?=$single->id;?></b></p>		     -->
							<p style="float: left;padding-left: 30px; margin-bottom:0px;font:bold; font-weight: 700">Sr No. : <?=date('Y',strtotime($single->created_on));?><?=substr($single->enrollment_number,-6);?></p>	

							<div class="padd_wrapper">
            							<!-- <div class="head_top_logo"><img src="<?=$this->Digitalocean_model->get_photo('images/only-logo.png')?>"></div> -->
            						<p style="text-align: center; "><b>University Campus: </b><?php if(!empty($university_details)){ echo $university_details->address;}?></p> 
								<div class="row" style="margin-top: 20px"> 
									<h2 class="statement">
										ORIGINAL <br>
										 TRANSFER CERTIFICATE
									</h2>
									<!-- <div class="col-lg-12 col-md-12"> 
										<a href="javascript:void(0)"><h3 style="text-align: center;font-weight: 900;font-size: x-large;color: black;margin:0px;margin-bottom:5px">ORIGINAL </h3></a> 
										<a href="javascript:void(0)"><h3 style="text-align: center;font-size: x-large;font-weight: 900;color: black;margin:0px;margin-bottom:5px">TRANSFER CERTIFICATE </h3></a> 
									</div>  -->
								</div> 
								<br> 
								<div> 
									
									<div class="data_box">  
										
										<table> 
											
											<tr> 
												<td>Name of the Student</td> 
												<td>:</td>
												<td><?=$single->student_name;?></td>   
											</tr> 
											<tr> 
												<td>Name of the Father</td> 
												<td>:</td>
												<td><?=$single->father_name;?></td>	   
											</tr>  
											<tr> 
												<td>Enrollment No.</td> 
												<td>:</td>
												<td><?=$single->enrollment_number;?></td> 
											</tr> 
											<tr> 
												<td>Date of Birth</td> 
												<td>:</td>
												<!-- <td><span>AS PER SECONDARY SCHOOL <br> CERTIFICATE</span></td>    -->
												<td><?=date('d-m-Y',strtotime($single->date_of_birth));?></td> 
										
											</tr>  
											<tr> 
												<td>Gender</td> 
												<td>:</td>
												<td><?=$single->gender;?></td>  
											</tr> 
											<tr> 
												<td>Nationality & Religion</td> 
												<td>:</td>
												<td>AS PER SECONDARY SCHOOL CERTIFICATE</td>   
											</tr> 
											<tr> 
												<td>Course of Study</td> 
												<td>:</td>
												<td><?=$course_name;?></td>  
											</tr>  
											<tr> 
												<td>Discipline</td> 
												<td>:</td>
												<td><?=$stream_name;?></td>  
											</tr>  
											<tr> 
												<td>Medium of Instruction</td> 
												<td>:</td>
												<td><span>ENGLISH</span></td>  
											</tr>  
											<tr> 
												<td>Reason of Transfer</td> 
												<td>:</td>
												<td><?=$single->reason_of_transfer;?></td>   
											</tr>  
											<tr> 
												<td>Character & Conduct</td> 
												<td>:</td>
												<td><?=$single->character_conduct;?></td>  
											</tr>   
											<tr> 
												<td>TC Issue Date</td> 
												<td>:</td>
												<td><?=date("d/m/Y",strtotime($single->issue_date));?></td>  
											</tr> 
											<tr class="mt-5"> 
												<td>
													
												</td> 
												<td style="border:none;"></td>
												<td style="border:none;"></td>   
											</tr> 
											<tr class="mt-5"> 
												<td>
													
												</td> 
												<td style="border:none;"></td>
												<td style="border:none;"></td>   
											</tr> 
											<tr class="mt-5"> 
												<td>
													<!-- Imphal <br>  -->
												
												</td> 
												<td style="border:none;"></td>
												<td style="border:none;"></td>   
											</tr> 
										</table>  
										
											<!-- <div class="layer_s"> 
													<img style="width: 400px;" src="<?=$this->Digitalocean_model->get_photo('images/spacial_officer.png')?>">  
												</div>  -->
												<div style="width: 205px;float: left;text-align: left;margin-top: 160px;">
												
												<b>Date : <?=date("d/m/Y",strtotime($single->issue_date));?></b>
											</div>

											<div style="width: 205px;float: right;text-align: center;margin-top: 125px;">
												<img style="width: 100px; height:50px;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$single->signature)?>">   
												<span style=" display:block; color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$single->dispalay_signature;?></span>
											</div>
									</div>  
								</div>
							</div>
					</div>
					</div>
					</div>

</body>										
