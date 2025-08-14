<!DOCTYPE html>

<html>
<!--onload="window.print()"-->
	<body >

	<style type="text/css">

	#customers {

  font-family: Arial, Helvetica, sans-serif;

  border-collapse: collapse;

  width: 100%;

}



#customers td, #customers th {

 /* border: 1px solid #ddd;*/

  padding: 3px;

}

 



#customers th {

  padding-top: 12px;

  padding-bottom: 12px;

  text-align: left;

  background-color: #4CAF50;

  color: white;

}

		.Mystar

		{

			color: Red;

		}

		.card

		{

			box-shadow: 1px 4px 8px 1px rgba(0, 0, 0, 0.2);

			width: 650px;

			margin: auto;

			text-align: left;

			border: 2px solid;

		}

		button

		{

			border: none;

			outline: 0;

			display: inline-block;

			padding: 8px;

			color: #000;

			background-color: #3e9dff;

			text-align: center;

			cursor: pointer;

			width: 100%;

			font-size: 18px;

			font-weight: bold;

		}

	 

		.title

		{

			color: grey;

			font-size: 18px;

		}

		.subject_table tr td{ 

  border: 1px solid black; 

		} 

		 /* .mar{

             margin-top: 200px;

         } */

	</style>

	

	<?php
    // echo "<pre>";print_r($students);exit;
    $university_details = $this->Setting_model->get_university_details();?>


	<?php if(!empty($students)){ ?>

        <div id="div1" class="block">

                <div class="form-body">

                   

                    <div id="div-1" class="block">

                        <table class="card">

                            <tr>

                                <td colspan="3" style="border-bottom: 2px solid;">

                                    <table style="width:100%; text-align: center;">

                                        <tr>

                                            <td>

                                                <img src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" alt="Logo" style="width: 75px; height: 75px;">

                                            </td>

                                           
                                           
                                        </tr>

                                        <tr>

											 <td>

                                                <div class="uni-details">

                                                    <span style="color: #101444d1; font-size: 30px; font-weight: bold;">Global University</span>

													<p style="margin:2px 0px;">Complete Learning Management </p>	

													<p style="margin-top: 2px;margin-bottom: 5px;font-size: 18px;font-weight: 600;color: #3b3e66;"><?php if(!empty($university_details)){ echo $university_details->address; } ?></p>

													

                                                    <span style="color: #000; font-size: 20px; font-weight: bold;">Re Appear Hall Ticket</span>

                                                </div>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                                <td colspan="3" style="text-align: center;">

                                    <span style="color: #000; font-weight: bold;">(Information as furnished by the Candidate)</span><br />

                                    <span style="float: right; margin-right: 30px; font-size: 15px; font-weight: bold;">

                                        Enrollment No</span><br />

                                    <br />

                                    <div style="float: right; border: 1px solid; width: 180px; height: 35px; margin-right: 7px;">

                                        <span style="float: right; margin-right: 30px; font-size: 15px; font-weight: bold;margin-top: 7px;">

                                            <label ID="lblIdno"><?=$students->enrollment_number?></label></span>

                                    </div>

                                    <br />

                                    <div style="float: right; border: 1px solid; margin: 30px -135px 0 0;">

                                        <img id="imgpo" width="100px" height="100px" Style="margin: 5px 5px 5px 5px;" src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$students->photo)?>" />

                                    </div>

                                    <br />

                                    <div style="float: right; border: 1px solid; width: 180px; height: 40px; margin: 135px -184px 0 0;">

                                        <img id="Imagesignature" width="100px" height="30px" style="margin: 5px 5px 5px 5px;" src="<?=$this->Digitalocean_model->get_photo('images/signature/'.$students->signature)?>"/>

                                    </div>

                                </td>

                            </tr>

                            <tr>

                                <td colspan="3">

                                    <table style="border: 1px solid; margin: -209px 0 0 10px; width: 415px; height: 155px;

                                        font-weight: bold;">

                                        <tr>

                                            <td style="padding-left: 10px;">

                                                Name

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                                <label class="uppercase"><?=$students->student_name?></label>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td style="padding-left: 10px;">

                                                Father name

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                                <label class="uppercase"><?=$students->father_name?></label>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td style="padding-left: 10px;">

                                                Date of birth

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                                <label class="uppercase"><?=date("d/m/Y",strtotime($students->date_of_birth))?></label>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td style="padding-left: 10px;">

                                                Course

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                                <label class="uppercase"><?=$students->print_name?></label>

                                            </td>

                                        </tr>

										 <tr>

                                            <td style="padding-left: 10px;">

                                               Stream

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                                <label class="uppercase"><?=$students->stream_name?></label>

                                            </td>

											

                                        </tr>

										<tr>

										<td style="padding-left: 10px;">

                                               Year/Sem

                                            </td>

                                            <td>

                                                :

                                            </td>

											 <td>

                                                <label class="uppercase"><?=$students->year_sem?></label>

                                            </td>

										</tr>

                                        <tr>

											

                                            <td style="padding-left: 10px;">

                                                Category

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                               <label class="uppercase"><?=$students->category?></label>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td style="padding-left: 10px;">

                                                Address

                                            </td>

                                            <td>

                                                :

                                            </td>

                                            <td>

                                                <label id="lbldoorno" ><?=$students->address?></label>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                                <!--<td>

                                    <table class="subject_table" id="customers" style="margin: 1px 0 0 10px;height: 100px;width: 65%;font-weight: bold;"> 

										<tr>

											<td style="font-size: 15px;">Subject Code</td>

											<td style="font-size: 15px;">Subject Name</td>

										</tr>

										<?php if(!empty($subject)){ foreach($subject as $subject_result){?>

										<tr>

											<td style="font-size: 15px;"><?=$subject_result->subject_code?></td>

											<td style="font-size: 15px;"><?=$subject_result->subject_name?></td>   

										</tr> 

										<?php }}?> 								

									</table>

                                </td>-->

                            </tr>

							<tr>

								<td>

									<p style="padding-left: 13px;">Declaration:-</p>

									<p style="padding-left: 13px;">I solemnly declare and confirm that I am duly qualified to take examination in the

course for which I have applied and all the certificates and testimonials attached

with my application are true and valid. I have also cleared all my University’s dues.</p>

								<p  style="padding-left: 13px;">I shall always follow the rules and regulations of the University and in case of any

breach thereto, I shall be liable to be penalized for the same which may include

expulsion from the University.</p>

								</td>

							</tr>

                            <tr>

                                <tr>

								<td>

									<ul style="list-style: none;padding-left:10px">

										<li  style="float:left">

										<!-- <img src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>" width="100px" height="50px"  style="float:left; margin: -35px 18px -90px 22px;" alt="sigen" />

                                        <span style="">Controller of Examination</span></li> -->

                                    <img src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$exam_sign->signature)?>">   
			                        <p style="color: #000;font-size: 16px;font-weight: 600;margin-bottom: 0px;text-align:center;"><?=$exam_sign->dispalay_signature;?></p>				

									<li style="float:right">
                                    <img style="visibility:hidden;" src="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$exam_sign->signature)?>">  
                                     <p style="margin-right:15px;font-weight: 600;">Signature of Student</p>
                                    
                                </li>

									</ul>
                                </td>

								 

                            </tr>

                         

                        </table>

                    </div>

                </div>

            </div>



    <?php }  ?>

           

	</body>

</html>
