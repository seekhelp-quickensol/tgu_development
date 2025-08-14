
<style>
.page {
    width: 21.01cm;
    height: auto;
    /* min-height: 29.7cm; */
    /* padding: 1.5cm; */
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.under-page {

    min-height: 25.62cm;

}


@page {
    size: A4;
    margin: 0;
}

@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }

    .logo {
        width: 100%;
        height: auto;
    }


}
</style>
<?php 
$university_details = $this->Setting_model->get_university_details();
if(!empty($single)){
    // echo "<pre>";print_r($single);exit;
    $division = $this->Admin_model->get_student_division_for_degree($single->student_id); 
    if(isset($division)){
        $div = $division['division'];
        $date = $division['date'];
    }else{
        $div = '';
        $date = '';
    }
    // echo "<pre>";print_r($division['date']);exit;
    $session_name = $this->Admin_model->get_paper_session($single->session_id);
    $stream_name = $this->Admin_model->get_stream($single->stream_id);
    $course_name = $this->Admin_model->get_course($single->course_id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>No Backlog Certificate</title>
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
                    <!-- <p style="float: left;padding-left:20px;font:bold; font-weight: 700">Sr No. :  <?=$single->id;?></p>			     -->
                    <p style="float: left;padding-left: 30px; margin-bottom:0px;font:bold; font-weight: 700">Sr No. : <?=date('Y',strtotime($single->created_on));?><?=substr($single->enrollment_number,-6);?></p>	

						<div class="letter_area" style=" background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet_background.png')?>);background-position: center top; background-size: cover;border: 2px solid #e8612b;height: 100%;">  
            						    <div class="padd_wrapper">
            							<!-- <div class="head_top_logo"><img src="<?=$this->Digitalocean_model->get_photo('images/only-logo.png')?>"></div> -->
            					           
							                <p style="text-align: center"><b>University Campus: </b><?php if($university_details){ echo $university_details->address; }?></p>
            					           	<div style="clear:both"></div>
                                        	<div>
                                        	<p style="float: right;font:bold; font-weight: 700">Date : <?=date("d-m-Y",strtotime($single->application_date));?></p>
                                        	<p style="float: left;font-size: 15px;color: #000;font-weight: 700;">Ref No.: TGU/<?=$single->id;?>/NB/<?=date('Y',strtotime($single->application_date));?></p>
                                            </div>
							                <div style="clear:both"></div>
							
									<p style="color: #000;font-weight: 700;font-size: 25px; margin-top: 25px;text-align: center"><u>NO BACKLOG SUMMARY LETTER</u> </p>
							
							<div style="display: block;">
									<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
									This is to certify that Mr./Ms.  <b><?php echo $single->student_name;?></b>  (<?php echo $single->enrollment_no;?>)
									was a bonafide student of  <?php echo $course_name;?> degree under <?php echo $stream_name;?> branch in The Global University. He/She
									 has credit transferred from <b><?php echo $single->tranfer_university;?></b> and successfully completed the course and cleared all the backlogs in the <b> <?php echo $course_name;?></b> degree examination held in
									 
									 <b>  <?=$date; ?> </b>
									 
									 in The Global University and placed in 
									
									 <!-- First Class.    -->
									 <b> <?=$div;?></b>.
                                     

								</p>
								<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
									
									His/Her conduct was good
								</p>
								<p style="margin-top: 10px;color: #000;font-size: 18px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;float:left">
								This certificate is issued on his/her request to apply for Higher Studies.
								</p>
								<div>
								<section style="padding: 0.5cm 1.5cm; font-family: sans-serif;font-weight: 400;">
									<div style="width: 50%; height: 300px; overflow: hidden; float:left;zoom:1.2;">
										<div>
												<!--<img style="width: 118px;margin-top: 120px;" src="<?=$this->Digitalocean_model->get_photo('images/btu-seal.png')?>"> -->
                                                <img style="width: 118px;margin-top: 117px;" src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->stamp)?>">   
											
											<p>
											UNIVERSITY SEAL  
											</p>
										</div> 
									</div>
										<div style="width: 50%;  overflow: auto; float:right; padding-top:180px;">
											<div style="text-align:center;">
											<img style="margin-top:-65px;width:100%;"  src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$single->signature)?>">   
											<p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;"><?=$single->dispalay_signature;?></p>
											</div>
											
											 
										</div>
									
									<div style="clear:both"></div>
								</section>	
								 
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