<?php $university_details = $this->Setting_model->get_university_details();
// print_r($university_details->logo);exit;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <link rel="SHORTCUT ICON" href="images/favicon.ico" />

        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

        <meta http-equiv="CACHE-CONTROL" content="no-store" /> 

        <meta http-equiv="expires" content="0" />

        <meta http-equiv="sd" content="no-cache" />

        <title><?php if(!empty($university_details)){ echo $university_details->university_name;}?> - Print Form Information</title>

        <style type="text/css">

            html,body{

                margin: 0px;

            }

            table.headerTable{

                font-family: "Calibri","Century Gothic","Avant Garde",Helvetica,Arial,sans-serif;

                border-width: 0px;

                border-collapse: collapse;

            }

            table.headerTable td{

                font-size: 12px;

                color: #333333;

                font-weight: bold;

            }

            table.headerTable td.other{

                font-size: 12px;

                color: #333333;

                font-weight: bold;

            }

            table.headerTable td.colhead{

                color: #4b0605;

                font-weight:  bold;

                font-size: 18px;

            }

            table.headerTable td.orange{

                color: #ff8800;

                font-size: 12px;

                font-weight: bold; 

            }

            table.headerTable td.brown{

                color: #993300;

                font-size: 12px;

                font-weight: bold; 

            }

            span.form{

                font-family: "Calibri","Century Gothic","Avant Garde",Helvetica,Arial,sans-serif;

            	font-weight: bold;

            	font-size: 16px;

            	color: #fff;

				background: #4b0605;

				border: 1px solid #4b0605;

                padding: 5px;

            }

            p.dec{

                font-family: "Calibri","Century Gothic","Avant Garde",Helvetica,Arial,sans-serif;

            	font-weight: normal;

            	font-size: 12px;

            	color: #000000;

                text-align: justify;

            }

            table.detailTable{

            	font-family: "Calibri","Century Gothic","Avant Garde",Helvetica,Arial,sans-serif;

                border-collapse: collapse;

            }

            table.detailTable td{

            	font-weight: bold;

            	font-size: 12px;

            	color: #000000;

            }

            table.detailTable td.up{

            	font-size: 12px;

            	color: #000000;

            }

            table.detailTable td.heading{ 

            	font-weight: bold;

            	font-size: 14px;

            	color: #fff;

				background: #4b0605;

                border: 1px solid #cccccc;

                padding: 5px;

            }

            table.detailTable td.heading1{ 

            	font-weight: bold;

            	font-size: 12px;

            	color: #333333;

            }

            table.detailTable td.heading2{ 

            	font-weight: bold;

            	font-size: 12px;

            	color: #333333;

                text-decoration: underline;

            }

            table.detailTable td.data{ 

            	font-weight: bold;

            	font-size: 12px;

            	color: #000000;

                text-transform: uppercase;

                border-bottom: 1px dotted #cccccc;

            }

            table.detailTable td.data1{ 

            	font-weight: bold;

            	font-size: 12px;

            	color: #000000;

                border-bottom: 1px dotted #cccccc;

            }

            table.examTable{

            	font-family: "Calibri","Century Gothic","Avant Garde",Helvetica,Arial,sans-serif;

                border-collapse: collapse;

                border: 1px solid #cccccc;

            }

            table.examTable td{

            	font-weight: bold;

            	font-size: 12px;

            	color: #000000;

                border: 1px solid #cccccc;

            }

            table.examTable td.heading{ 

            	font-weight: bold;

            	font-size: 14px;

            	color: #fff;

				background: #4b0605;

                border: 1px solid #cccccc;

                padding: 5px;

				text-transform: uppercase;

            }

            table.examTable td.heading1{ 

            	font-weight: bold;

            	font-size: 12px;

            	color: #333333;

            }

            table.examTable td.data{ 

            	font-weight: bold;

            	font-size: 12px;

            	color: #000000;

                text-transform: uppercase;

            }

			.btn {

				display: inline-block;

				margin-bottom: 0;

				font-weight: 400;

				text-align: center;

				white-space: nowrap;

				vertical-align: middle;

				-ms-touch-action: manipulation;

				touch-action: manipulation;

				cursor: pointer;

				background-image: none;

				border: 1px solid transparent;

				padding: 6px 12px;

				font-size: 14px;

				line-height: 1.42857143;

				border-radius: 4px;

				-webkit-user-select: none;

				-moz-user-select: none;

				-ms-user-select: none;

				user-select: none;

			}

			.btn-primary {

				color: #fff;

				background-color: #337ab7;

				border-color: #2e6da4;

			}

        </style> 
		<?php 

		$name = "";

		if(!empty($admission)){

			$name = $admission->student_name;

		}	

		?>

<script type="text/javascript">

    function printChallan(){ 

		var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 

		disp_setting+="scrollbars=yes,width=780, height=700, left=100, top=25"; 

		var content_vlue = document.getElementById("challanDiv").innerHTML; 

		var docprint=window.open("","",disp_setting); 

		docprint.document.open(); 

		docprint.document.write('<html><head><title><?php echo $name;?> Admission Form</title>'); 

		docprint.document.write('<style type=text/css media=print>body{page:verticle;}@page{size: verticle;}</style></head><body onLoad="self.print()"><center>');          

		docprint.document.write(content_vlue);          

		docprint.document.write('</center></body></html>'); 

		docprint.document.close(); 

		docprint.focus(); 

    }

</script>

    </head>

    <body>  

<?php     

    if(!empty($admission)){?>

	<!--<div class="pay-bottom text-center" style="width: 65%;margin: 10px auto;">-->
 <!--       <a href="<?=base_url() ?>new_admission" class="btn btn-primary">Back</a>-->
	<!--	<button class="btn btn-primary" onclick="printChallan()">Print Form</button>-->
	<!--</div>-->
	<div style="width: 670px;margin: 0px auto;border: 2px dashed #4b0605;" id="challanDiv">

        <table class="detailTable" width="670" cellpadding="6">

          <tbody>

          <tr><td colspan="4" style="border-bottom: 2px solid #cccccc;">

            <table class="headerTable" width="100%" cellpadding="2" align="center">

                <tbody>

                    <tr>
                        <td align="right" rowspan="2">
                            <img src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" width="90" height="90" />
                            <!-- <img src="<?=base_url()?>images/logo/logo.png" width="90" height="90" /> -->
                    </td>

                        <td class="colhead" align="center"><?php if(!empty($university_details)){ echo $university_details->university_name;}?>

						<br>

						<?php if(!empty($university_details)){ echo $university_details->slogan;}?>

						</td></tr>

                    <tr><td align="center" class="other"><?php if(!empty($university_details)){ echo $university_details->address;}?></td></tr>

                    <tr><td colspan="2">

                        <table width="100%" align="center">

                            <tr>

                                <td  class="other">Phone:</td><td class="brown"><?php if(!empty($university_details)){ echo $university_details->contact_number;}?></td>

                                <td  class="other">Website:</td><td class="brown"><?php if(!empty($university_details)){ echo $university_details->website;}?></td>

                                <td  class="other">Email:</td><td class="brown"><?php if(!empty($university_details)){ echo $university_details->email;}?></td>

                            </tr>

                        </table>

                    </td></tr>

                </tbody>

            </table>

        </td></tr>

        <tr><td>&nbsp;</td></tr>

        

        <tr><td width="150px"><?php /*Application Date:&nbsp;&nbsp;<?=date("d-m-Y",strtotime($admission->admission_date))*/?></td>

			<td align="center"><span class="form">ADMISSION FORM&nbsp;-&nbsp;#<?=$admission->id?></span></td>

			<td>&nbsp;</td>

		   <td rowspan="5" align="right" width="105px">

				<div style="position: absolute;top: 200px;">

					<img src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$admission->photo)?>"  alt="" style="border: 1px dotted #333333;" width="95" height="100"/>

				</div>

		   </td>

		</tr>

        <!--<tr><td>&nbsp;</td><td align="center" class="up">SESSION:&nbsp;&nbsp;&nbsp;<?php //echo $row["session"] ?></td>-->

            

        </tr>

        <tr><td>&nbsp;</td><td align="center" class="up">Session:&nbsp;&nbsp;&nbsp;<?php echo strtoupper($admission->session_name) ?></td></tr>

        <tr><td>&nbsp;</td><td align="center" class="up">COURSE:&nbsp;&nbsp;&nbsp;<?php echo strtoupper($admission->print_name) ?></td></tr>

        <tr><td>&nbsp;</td><td align="center" class="up">STREAM:&nbsp;&nbsp;&nbsp;<?php echo strtoupper($admission->stream_name) ?></td></tr>

        <tr><td class="heading" align="center" colspan="4">GENERAL INFORMATION</td></tr>

    </tbody>

</table>

<table class="detailTable" width="670" cellpadding="6">

    <tbody>

        <tr><td colspan="2">

            <table width="100%">

                <tr><td class="heading1" width="18%">Username:</td>

                    <td class="data1" width="32%"><?=$admission->username?></td>

                    <td class="heading1" width="18%">Password:</td>

                    <td class="data1" width="32%"><?=$admission->password?></td>

                </tr>

                

            </table>

            </td>

        </tr>

        <tr><td colspan="2">

                <table width="100%">

                    <tr><td class="heading1" width="18%">Enrollment No:</td>

                        <td class="data" width="32%"><?=$admission->enrollment_number?></td>

                        <td class="heading1" width="18%">Name of the Candidate:</td>

                        <td class="data"  width="32%"><?=$admission->student_name?></td>


                    </tr>

                    

                </table>

            </td>

        </tr>

        <tr><td colspan="2">

<table width="100%">

    <tr>
<td class="heading1" width="18%">Father's/Husband Name: </td>

<td class="data" width="32%"><?=$admission->father_name?></td>

<td class="heading1" width="18%">Mother's Name:</td>

<td class="data" width="32%"><?=$admission->mother_name?></td>



    </tr>

    

</table>

</td>

</tr>

      

          

        <tr><td colspan="2">

                <table width="100%">

                    <tr><td class="heading1" width="18%">Date Of Birth:</td>

                        <td class="data" width="32%"><?=date("d-m-Y",strtotime($admission->date_of_birth))?></td>

                        <td class="heading1" width="18%">Nationality:</td>

                        <td class="data" width="32%"><?=$admission->nationality?></td>

                    </tr>

                    

                </table>

            </td>

        </tr>        
		<tr><td colspan="2">

                <table width="100%">

                    <tr><td class="heading1" width="18%">Religion:</td>

                        <td class="data" width="32%"><?=$admission->religion?></td>

                       

                        <td class="data" width="32%"><?=$admission->religin_specify?></td>
						 <td class="data" width="18%"></td>
                    </tr>

                    

                </table>

            </td>

        </tr>        

        <tr><td colspan="2">

        <table width="100%">

            <tr><td class="heading1" width="18%">Candidate Address:</td>

                <td class="data" width="82%"><?=$admission->address?></td>

            </tr>

            

        </table>

        </td>

        </tr>  

     

        <tr><td colspan="2">

            <table width="100%">

                <tr><td class="heading1" width="18%">City:</td>

                    <td class="data" width="32%"><?=$admission->city_name?></td>

                    <td class="heading1" width="18%">Pin Code:</td>

                    <td class="data" width="32%"><?=$admission->pincode?></td>


                </tr>

                

            </table>

            </td>

            </tr>

        

        <tr><td  colspan="2">

                <table width="100%">

                    <tr><td class="heading1" width="18%">State:</td>

                        <td class="data" width="32%"><?=$admission->state_name?></td>

                        <td class="heading1" width="18%">Country:</td>

                        <td class="data" width="32%"><?=$admission->country_name?></td>

                    </tr>

                </table>

            </td>

        </tr>

        <tr><td colspan="2">

                <table width="100%">

                    <tr><td class="heading1" width="18%">Contact Number:</td>

                        <td class="data" width="32%"><?=$admission->mobile?></td>

                        <td class="heading1" width="18%">Email Address:</td>

                        <td class="data" width="32%"><?=$admission->email?></td>

                    </tr>

                    

                </table>

            </td>

        </tr>

        <tr><td colspan="2">

                <table width="100%">

                    <tr><td class="heading1" width="18%">Category:</td>

                        <td class="data" width="32%"><?=$admission->category?></td>

                        <td class="heading1" width="18%">Gender:</td>

                        <td class="data" width="32%"><?=$admission->gender?></td>

                    </tr>

                    

                </table>

            </td>

        </tr>

        <tr><td colspan="2">

                <table width="100%">

                    <tr><td class="heading1" width="18%">Study Mode:</td>

                        <td class="data" width="32%">

                            <?php 

                            if($admission->study_mode=="1"){ 

                                echo "Regular";

                            }

                            else if($admission->study_mode=="2"){

                                echo "Online";

                            }else{

                                echo "Part-Time";

                            }

                        ?>

                        </td>

                        <td class="heading1" width="18%">Year/Sem :</td>

                        <td class="data" width="32%">
                            <?=$admission->year_sem;?>
                            <?php 
                                if($admission->course_mode == "1"){
                                    echo " Year";
                                }else if($admission->course_mode == "2"){
                                    echo " Semester";
                                }else if($admission->course_mode == "4"){
                                    echo " Month";
                                }   
                            ?>
                        </td>

                    </tr>

                    

                </table>

            </td>

        </tr>        

    </tbody>

</table>

<table class="examTable" width="670" cellpadding="6">

     <tbody>

            <tr><td class="heading" colspan="4" align="center">Qualification Information</td></tr>

            <tr><td class="heading1">Examination</td>

                <td class="heading1">Year</td>

                <td class="heading1">Board/University</td>

                <td class="heading1">Marks(%)</td>

            </tr>

			<?php

				if(!empty($qualification) && $qualification->secondary_year !=""){

			?>

			<tr>

				<td class="data">Secondary</td>

				<td class="data"><?=$qualification->secondary_year?></td>

				<td class="data"><?=$qualification->secondary_university?></td>

				<td class="data"><?=$qualification->secondary_marks?></td>

			</tr>

			<?php }?>

			

			<?php

				if(!empty($qualification) && $qualification->sr_secondary_year !=""){

			?>

			<tr>

				<td class="data">Sr. Secondary</td>

				<td class="data"><?=$qualification->sr_secondary_year?></td>

				<td class="data"><?=$qualification->sr_secondary_university?></td>

				<td class="data"><?=$qualification->sr_secondary_marks?></td>

			</tr>

			<?php }?>

			

			<?php

				if(!empty($qualification) && $qualification->graduation_year !=""){

			?>

			<tr>

				<td class="data">Graduation</td>

				<td class="data"><?=$qualification->graduation_year?></td>

				<td class="data"><?=$qualification->graduation_university?></td>

				<td class="data"><?=$qualification->graduation_marks?></td>

			</tr>

			<?php }?>

			

			<?php

				if(!empty($qualification) && $qualification->post_graduation_year !=""){

			?>

			<tr>

				<td class="data">Post Graduation</td>

				<td class="data"><?=$qualification->post_graduation_year?></td>

				<td class="data"><?=$qualification->post_graduation_university?></td>

				<td class="data"><?=$qualification->post_graduation_marks?></td>

			</tr>

			<?php }?>

			

			<?php
// echo "<pre>";print_r($qualification);exit;
				if(!empty($qualification) && $qualification->other_qualification_year !=""){

			?>

			<tr>

				<td class="data">Others</td>

				<td class="data"><?=$qualification->other_qualification_year?></td>

				<td class="data"><?=$qualification->other_qualification_university?></td>

				<td class="data"><?=$qualification->other_qualification_marks?></td>

			</tr>

			<?php }?>

    </tbody>

</table>

 

<table  class="detailTable" width="670" cellspacing="4" cellpadding="4">

	<tr><td>

		<p align="justify"><b>Declaration:</b></p>

		<p align="justify"><b>I confirm that I have not made payment of any other amount to anybody other than deposited in the prescribed University account.</b></p>

		<p align="justify"><b>I solemnly declare and confirm that I am duly qualified to take admission in the course for which I have applied and all the certificates and testimonials attached with my application are true and valid. I have fully satisfied myself about the legal status of the University i.e. it is an autonomous statutory body with regulations making power for it's functioning and the University is duly authorized and competent to take my admission in the course for which I have applied and also to award the degree / diploma as per rules and regulation of the University. I also undertake not to ever raise any objection about Universities legal status to take my admission and award degrees on qualifying prescribed examinations. I also undertake not to demand refund of fee/charges paid by me. In case of any dispute/differences/claim of any value settlement by University arbitration clause shall be applicable.</b></p>

		<p align="justify"><b>I shall always follow the rules and regulations of the University and in case of any breach thereto, I shall be liable to be penalized for the same which may include expulsion from the University.</b></p>

		<p align="justify">As per law and legal opinion University is empowered by authority of law to award degree's, diplomas, & certificate in all course of Education, there being no requirement to take approval from any other authorities all certificate degrees diplomas certificate awarded by University are Sui - generis valid in law and degree/diploma/certificate holders are automatically entitled to be recognised for government jobs and for Registration with all Professional Council. For Legal opinion and relevent laws and Court Judgments Visit University website.</p>

	</td></tr>

</table>

<table  class="detailTable" width="670" cellspacing="4" cellpadding="4">

    <tr><td colspan="3">&nbsp;</td><td  align="center" width="80px">

		<?php if($admission->signature !=""){?>

			<img src="<?=$this->Digitalocean_model->get_photo('images/signature/'.$admission->signature)?>"  alt="" width="50" height="30" />

		<?php }?>     

    </td></tr>

        <tr><td width="50px">Place:</td><td width="150px"><p class="dec">...............................</p></td>

            <td width="260px">&nbsp;</td><td width="200px" align="center">(Signature of Candidate)</td>

        </tr>

</table> 

</div>                          

<?php

        }

        else{

                echo "<p><span class=form>No details found.</span></p>";

        }

                    

?>

</body>

</html>