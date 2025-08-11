
<!DOCTYPE html>
<html>
<head>
    <title>Letters</title>
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
            						<div class="letter_area"" style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/new_marksheet-without.jpeg')?>);background-position: center;background-size: cover;border: 2px solid #e8612b;height: 100%;">  
            						    <div class="padd_wrapper">
            							<div class="head_top_logo"><img src="<?=$this->Digitalocean_model->get_photo('images/only-logo.png')?>"></div>
            							<div style="clear:both"></div>
            							<p style="text-align: center;margin-top:5px"><b>University Campus: </b>Canchipur, South View, Imphal West, Manipur, Pincode - 795003</p> 
            							<br> 
            							<p style="font: bold;text-align: right;font-weight: 600">Date : <?=date("Y-m-d");?></p> 
            						    <p style="color: #000;font-weight: 700;font-size: 25px; text-align: center;color:#000;margin:0px;margin-bottom: 44px;">Letter Of Recommendation </p> 
            								
            							<div>  
            								<div > 
            									<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 500;margin-bottom: 0px;line-height: 23px;"> 
            										I would like to take an opportunity as Head of the Department of Management, Bir Tikendrajit University, Imphal, Manipur, India to offer a formal recoccomendation for Mr./Ms./Mrs. <?=$recommendation->student_name;?>
            									</p>  
            									<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 500;margin-bottom: 0px;line-height: 23px;">  
            										I have known Mr./Ms./Mrs. <?=$recommendation->student_name;?> for almost <?php echo date("Y",strtotime($recommendation->created_on)) - date("Y",strtotime($recommendation->session_start_date)) == 0?1:date("Y",strtotime($recommendation->created_on)) - date("Y",strtotime($recommendation->session_start_date)); ?> years, from the start of his lectures and the other staffs of the University.  
            									</p>	 
            										<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 500;margin-bottom: 0px;line-height: 23px;"> 
            										Graduate program in Bir Tikendrajit University, India. He/She registered in the graduate program in <?=date("Y",strtotime($recommendation->session_start_date));?> in the Department of <?=$recommendation->course_name; ?> obtained <?=$recommendation->stream_name;?> Degree from the University.   
            									</p>	  
            										<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 500;margin-bottom: 0px;line-height: 23px;"> 
            										During the period of his/her studies, he/she was very gentle, soft speaking and very intelligent individual with so much confident and exibit exceptional knowledge towards his/her field.
            										Mr./Ms./Mrs. <?=$recommendation->student_name;?> is also known to be a very humble and he always give respect to his lecturers and the other staffs of the University. 
            									</p>  
            										<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 500;margin-bottom: 0px;line-height: 23px;"> 
            										As his/her lecturer and Head of Department, I know him to be honest and also very hard working. His/Her communication skills are excellent both in speaking and writing.    
            									</p> 
            									<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 500;margin-bottom: 0px;line-height: 23px;"> 
            										It is for this reasons that, I offer a high recommendation for Mr./Ms./Mrs. <?=$recommendation->student_name;?> without reservation. His/Her positive approach and abilities will truly be an asset to your University.  
            									</p> 
            								
            									<div class="col-lg-12 col-md-12"> 
            										<div style="float: left;text-align: center;margin-top: 35px;">  
            											<img style="width: 130px;" src="<?=$this->Digitalocean_model->get_photo('images/reccomendation_letter_mark_image.png')?>">
            											<br> 
            											<?php if(date("Y-m-d",strtotime($recommendation->created_on)) <= "2022-02-19"){ ?> 
            												<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/Deputy_Registrar.png')?>"> 
            											<?php }else{ 
            													if($recommendation->course_id ==23){ 
            											?>  
            												<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/resurch_reg.PNG')?>"> 
            												<?php }else{?> 
            													<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/norm_reg.PNG')?>"> 
            											<?php }}?>  
            											<p style="color: #000;font-size: 18px;font-weight: 600;margin-bottom: 0px;margin-top: 0px;">Registrar</p>  
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
										
<script> 
	$("#print_btn").click(()=>{ 
		$("#print_btn").hide(); 
		let contain = document.getElementById("container").innerHTML; 
		let newWindow = window.open('','',900,600); 
		newWindow.document.write(contain); 
		newWindow.focus(); 
		newWindow.print(); 
		newWindow.close(); 
		$("#print_btn").show(); 
	});
</script>