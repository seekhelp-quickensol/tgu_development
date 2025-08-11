
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
            .data_box td:first-child{
            	width:70%;
            	font-weight:500;
            }
             .data_box td:last-child{
            	width:30%;
            	font-weight:500;
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
		</style>
	</head>
	<body>
	    	<div class="page">
					<div class="row" id="letter_section"> 
					
							<div class="letter_area" style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/new_marksheet-without.jpeg')?>);background-position: center;background-size: cover;border: 2px solid #e8612b;height: 100%;">  
            						    <div class="padd_wrapper">
            							<div class="head_top_logo"><img src="<?=$this->Digitalocean_model->get_photo('images/only-logo.png')?>"></div>
            						<p style="text-align: center; "><b>University Campus: </b>Canchipur, South View, Imphal West, Manipur, Pincode - 795003</p> 
								<div class="row" style="margin-top: 20px"> 
									<div class="col-lg-12 col-md-12"> 
										<a href="javascript:void(0)"><h3 style="text-align: center;font-weight: 900;font-size: x-large;color: black;margin:0px;margin-bottom:5px">ORIGINAL </h3></a> 
										<a href="javascript:void(0)"><h3 style="text-align: center;font-size: x-large;font-weight: 900;color: black;margin:0px;margin-bottom:5px">TRANSFER CERTIFICATE </h3></a> 
									</div> 
								</div> 
								<br> 
								<div> 
									
									<div class="data_box">  
										
										<table> 
											<tr> 
												<td>Sr.No. <?=$transfer->id;?></td> 
												
												<td></td> 
											</tr>  
											<tr> 
												<td>Name of the Student</td> 
											
												<td><?=$transfer->student_name;?></td>   
											</tr> 
											<tr> 
												<td>Name of the Father</td> 
											
												<td><?=$transfer->father_name;?></td>	   
											</tr>  
											<tr> 
												<td>Enrollment No.</td> 
											 
												<td><?=$transfer->enrollment_number;?></td> 
											</tr> 
											<tr> 
												<td>Date of Birth</td> 
											
												<td><span>AS PER SECONDARY SCHOOL <br> CERTIFICATE</span></td>   
											</tr>  
											<tr> 
												<td>Gender(Male/Female)</td> 
											
												<td><?=$transfer->gender;?></td>  
											</tr> 
											<tr> 
												<td>Nationality & Religion</td> 
											 
												<td><span>AS PER SECONDARY SCHOOL <br> CERTIFICATE</span></td>   
											</tr> 
											<tr> 
												<td>Course of Study</td> 
										
												<td><?=$transfer->course_name;?></td>  
											</tr>  
											<tr> 
												<td>Discipline</td> 
											
												<td><?=$transfer->stream_name;?></td>  
											</tr>  
											<tr> 
												<td>Medium of Instruction</td> 
												
												<td><span>ENGLISH</span></td>  
											</tr>  
											<tr> 
												<td>Reason of Transfer</td> 
												
												<td><?=$transfer->reason_of_transfer;?></td>   
											</tr>  
											<tr> 
												<td>Character & Conduct</td> 
												  
												<td><?=$transfer->character_conduct;?></td>  
											</tr>   
											<tr> 
												<td>TC Issue Date</td> 
												
												<td><?=date("Y-m-d");?></td>  
											</tr> 
											<tr class="mt-3"> 
												<td>Imphal <br> 
												Date : <?=date("Y-m-d")?> 
												</td> 
												<td></td>  
											</tr> 
										</table>  
										
											<div class="layer_s"> 
													<img style="width: 400px;" src="<?=$this->Digitalocean_model->get_photo('images/spacial_officer.png')?>">  
												</div> 
									</div>  
								</div>
							</div>
					</div>
					</div>
					</div>

</body>										
