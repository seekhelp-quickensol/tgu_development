<!--<!DOCTYPE html><html><head>    <title>Degree</title>    <meta name="description">    <meta name="keywords">    <link rel="preconnect" href="https://fonts.googleapis.com">    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">    <meta name="viewport" content="width=device-width, initial-scale=1">    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&display=swap" rel="stylesheet">    <style>        @import "https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap";        @import "https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap";        body {            width: 100%;            height: 100%;            margin: 0;            background-color: #FAFAFA;            font-family: 'Abel', sans-serif;            font-family: 'Barlow Semi Condensed', sans-serif;            color: #444444;            font-size: 13px;            padding:10px;        }                * {            box-sizing: border-box;            -moz-box-sizing: border-box;        }			.form-control {				background-color: #e9ecef00 !important;				opacity: 1;			}        	.page {                               width: 205mm;                min-height: 291mm;                padding: 0mm;                margin: 0mm auto;                background: white;                position: relative;            }            .letter_area{                height: 291mm !important;             }            .head_top_logo{                height:219px;                 text-align: center;            }            .padd_wrapper{                                height:100%;                padding:38px;            }            .head_top_logo img{                width:350px;            }			page[size="A4"][layout="landscape"] {  width: 29.7cm !important;  height: 21cm !important;  }			@media print {			  body, page {				margin: 0;				box-shadow: 0;			  }		</style>-->				 		<!DOCTYPE html><html><head>    <title>Provisional Degree</title>    <meta name="description">    <meta name="keywords">    <link rel="preconnect" href="https://fonts.googleapis.com">    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">    <meta name="viewport" content="width=device-width, initial-scale=1">    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&display=swap" rel="stylesheet">    <style>        @import "https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap";        @import "https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap";        body {            width: 100%;            height: 100%;            margin: 0;            background-color: #FAFAFA;            font-family: 'Abel', sans-serif;            font-family: 'Barlow Semi Condensed', sans-serif;            color: #444444;            font-size: 13px;            padding:10px;        }                * {            box-sizing: border-box;            -moz-box-sizing: border-box;        }			.form-control {				background-color: #e9ecef00 !important;				opacity: 1;			}        	.page {                               width: 205mm;                min-height: 291mm;                padding: 0mm;                margin: 0mm auto;                background: white;                position: relative;            }            .letter_area{                height: 291mm !important;             }            .head_top_logo{                height:219px;                 text-align: center;            }            .padd_wrapper{                                height:100%;                padding:38px;            }            .head_top_logo img{                width:350px;            }		</style>		<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">	</head>	<body>	<div class="page">         	<div id="letter_section">             					<div>             	<div id="letter_section">					<div>						<div class="letter_area"" style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/new_marksheet-without.jpeg')?>);background-position: center;background-size: cover;border: 2px solid #e8612b;height: 100%;">              						    <div class="padd_wrapper">            							<div class="head_top_logo"><img src="<?=$this->Digitalocean_model->get_photo('images/only-logo.png')?>"></div>            					           							                <p style="text-align: center"><b>University Campus: </b>Canchipur, South View, Imphal West, Manipur, Pincode - 795003</p>            					           	<div style="clear:both"></div>

						<p style="float: right;margin-top: -287px;font:bold; font-weight: 700">Serial No. :  <?="D-".$degree->id;?></p>
						
						<img style="float: right;margin-top: -232px;width: 15%;" src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$degree->photo)?>" width="95px" height="110px">
						
						<p style="font-size: 15px;color: #000;font-weight: 700;margin-top: -287px;margin-bottom: 10px;">Enrollment No.: <?=$degree->enrollment_number;?></p>

					
						<p style="margin-top: 300px;text-align: center"></p>
						<br>
						<br>

						<div class="row" >
							<div class="col-lg-12 col-md-12">
								<p style="width: 285px;margin: 0px auto;color: #000;font-weight: 500;font-size: 35px; text-align: center;font-family: 'Italianno', cursive;"><?=$degree->course_name; ?> </p>
							</div>
						</div>
						<br>
						<div class="row" style="padding-right: 20px;padding-left: 20px">
							
						
							<div class="col-lg-12 col-md-12">
								<p style="margin-top: 10px;color: #000;font-size: 32px;margin-bottom: 0px;line-height: 42px; word-spacing: 10px;font-family: 'Italianno', cursive;">This is to certify that <?=$degree->student_name; ?> Son/Doughter/Wife of <?=$degree->father_name;?> is hereby awarded the <?=$degree->course_name;?> in <?=$degree->stream_name;?> after having passed the examination for the said degree held in <?=date("Y",strtotime($division["date"]));?> He/She is placed in <?=$division["division"]?>. </p>

								
							 
								
								<p style="font-size: 30px;color: black;margin-left:112px;margin-bottom: 2px;font-family: 'Italianno', cursive;text-align:center;font-weight:500;"> Given under the seal of the University <span style="margin-left: 112px;"></span></p>
								<br>
								<center >
								<img style="width: 150px;" src="<?=$this->Digitalocean_model->get_photo('images/degree_seal.png')?>" alt="image">
								</center>
								

							</div>
							<div class="col-lg-12 col-md-12">
								<div style="width: 205px;float: left;text-align: center;margin-top: 35px;">
								<?php if(date("Y-m-d",strtotime($degree->issue_date)) <= "2022-02-19"){ ?>
						<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/Deputy_Registrar.png')?>">
						<?php }else{
						if($degree->course_id ==23){
						?> 
						<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/resurch_reg.PNG')?>">
						<?php }else{?>
						<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/norm_reg.PNG')?>">
						<?php }}?>
									
									<p style="color: #000;font-size: 18px;font-weight: 900;margin-bottom: 0px;">Registrar</p>
								</div>
								<div style="width: 205px;float: right;text-align: center;margin-top: 23px;">
									<img style="width: 130px;" src="<?=$this->Digitalocean_model->get_photo('images/chancellor.png')?>">
									
									<p style="color: #000;font-size: 18px;font-weight: 900;margin-bottom: 0px;">Chancellor</p>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			 
		</div>
	</div>
	</div> 