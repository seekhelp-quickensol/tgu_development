<?php include('header.php');?>
<style>
.common_details {
    background: #4c0000;
    color: #fff;
    padding: 10px 0px;
    margin-bottom: 15px;
}
.admission_div h3 {
   margin-top: 0px;
    margin-bottom: 0px;
    color: #fff;
    padding-left: 10px;
}
.small, small {
    font-size: 85%;
	padding-left: 10px;
}
</style>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
 
<link rel="stylesheet" href="https://www.tgu.ac.in/back_panel/css/croppie.css">
<div class="breakcrumb-wrapper">
    <div class="card text-white">
      <!-- <img src="https://via.placeholder.com/1200x250.png" class="card-img" alt=""> -->
      <img src="<?=base_url();?>assets/img/btech_banner.jpg" height="250px" width="100%" class="card-img" alt="">
      <div class="card-img-overlay d-flex justify-content-center flex-column container">
        <h5 class="card-title">Admission</h5>
        <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
        <p class="card-text">Home / Admission </p>
      </div>
    </div>
  </div>
<section class="flex-column align-items-center justify-content-center" id="mainform">
<div class="container-fluid">
	<div class="">
		<div class="">	
			<div class="container-fluid">
				<div class="online_wrapper">
					
					<!--<h1>University Admission Form 2020-2021</h1>-->
					<?php if($this->session->userdata('otp_otp') == "vxcv"){?>
					<div class="main_div">
						<div class="col-md-12 m-cust">
							<form method="post" name="otp_form" id="otp_form" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12 m-cust">
										<div class="personal_details">
											<h3>Mobile Number Verification</h3>
											<small>Please provide your mobile number</small>
											<hr>
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-12 m-cust">
										<div class="form-group">
											<label>Enter Your Name<span class="req">*</span></label>
											<input type="text" name="otp_name" id="otp_name" required class="form-control charector" placeholder="Enter Your Name">
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-12 m-cust">
										<div class="form-group">
											<label>Enter Your Mobile Number<span class="req">*</span></label>
											<input type="text" name="otp_mobile_number" id="otp_mobile_number" required class="form-control number_only" placeholder="Enter Your Mobile Number">
											<div id="mobile_otp_error"></div>
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-12 m-cust">
										<div class="form-group">
											<label>Enter Your Email<span class="req">*</span></label>
											<input type="text" name="otp_email" id="otp_email" required class="form-control" placeholder="Enter Your Email">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12 m-cust edu">
										<div class="form-group">
											<label></label>
											<button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Generate OTP</button>
											<div class="pull-right">
											</div>
										</div>
									</div>	
								</div> 
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
						
					<?php //}else if($this->session->userdata('otp_otp') != "" && $this->session->userdata('is_verified') != "1"){
					 }else if($this->session->userdata('otp_otp') == "dsadsads" && $this->session->userdata('is_verified') == "dsadsads"){
						?>
					<div class="main_div">
						<div class="col-md-12 m-cust">
							<form method="post" name="otp_verification" id="otp_verification" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12 m-cust">
										<div class="personal_details">
											<h3>OTP Verification</h3>
											<small>Please provide your OTP</small>
											<hr>
										</div>
									</div> 
								</div>
								<div class="row edu">
									<div class="col-md-12 m-cust">
										<div class="form-group">
											<label>Enter One Time Password<span class="req">*</span></label>
											<input type="text" name="otp_code" id="otp_code" required class="form-control number_only" placeholder="Enter One Time Password">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 m-cust edu">
										<div class="form-group">
											<label></label>
											<button type="submit" class="btn btn-primary" name="verify" id="verify" value="verify">Verify</button>
											Didn't get OTP?<a href="<?=base_url();?>resend_otp">Click Here</a>
											<div class="pull-right"> 
											</div>
										</div>
									</div>	
								</div>
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
					<?php 
					//}else if($this->session->userdata('is_verified') == "1"){
					}else{
						?>
					<div class="admission_div">
						<form method="post" name="admission_form" id="admission_form" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="common_details">
										<div class="col-md-12 m-cust">
											<h3>Personal Details</h3>
											<small>Please provide your personal details</small>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								
							</div>
							<div class="col-md-12 m-cust">	
								<div class="row"> 
									<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>Student Name <span class="req">*</span></label>
											<input type="text" name="student_name" id="student_name" class="form-control charector" placeholder="Student Full Name">
										</div>
									</div>
									<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>Father's Name <span class="req">*</span></label>
											<input type="text" name="father_name" id="father_name" class="form-control charector" placeholder="Fathers Name">
										</div>
									</div>
									<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>Mother's Name <span class="req">*</span></label>
											<input type="text" name="mother_name" id="mother_name" class="form-control charector" placeholder="Mothers Name">
										</div>
									</div>
									<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>Date of Birth <span class="req">*</span></label>
											<input type="text" name="date_of_birth" id="date_of_birth" class="form-control datepicker" placeholder="DD-MM-YY">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 m-cust">	
								<div class="row">
									<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>Mobile Number <span class="req">*</span></label>
											<input autocomplete="off" type="text" name="mobile" id="mobile" class="form-control number_only" placeholder="Mobile Number" maxlength="10" minlength="10" value="<?php echo $this->session->userdata('otp_mobile');?>">
											<div class="error" id="mobile_error"></div>
										</div>
									</div>
									<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>Email ID <span class="req">*</span></label>
											<input autocomplete="off" type="email" name="email" id="email" class="form-control" placeholder="Email ID">
											<div class="error" id="email_error"></div>
										</div>
									</div>
									<div class="col-md-3 m-cust">
										<div class="form-group">
										<label>Gender <span class="req">*</span></label>
											<select id="gender" name="gender" class="form-control">
												<option value="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												<option value="Transgender">Transgender</option>
											</select>
										</div>
									</div>
									<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>Category <span class="req">*</span></label>
											<select id="category" name="category" class="form-control">
												<option value="">Select Category</option>
												<option value="General">General (Open)</option>
												<option value="Other Backward Class">Other Backward Class (OBC)</option>
												<option value="Scheduled Caste">Scheduled Caste (SC)</option>
												<option value="Scheduled Tribe">Scheduled Tribe (ST)</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 m-cust">	
								<div class="row"> 
									<div class="col-md-6">
										<label>Current Address <span class="req">*</span></label>
										<input type="text" class="form-control rules" name="address" id="address" placeholder="Address">
									</div>
									<!--<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>Id Type <span class="req">*</span></label>
											<select name="id_type" id="id_type" class="form-control">
												<option value="">Select ID Type</option>
												<?php if(!empty($id_name)){ foreach($id_name as $id_name_result){?>
												<option value="<?=$id_name_result->id?>"><?=$id_name_result->id_name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>Id Number <span class="req">*</span></label>
											<input type="text" name="id_number" id="id_number" class="form-control rules" maxlength="100" placeholder="">
										</div>
									</div>-->
									<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>Nationality <span class="req">*</span></label>
											<input type="text" name="nationality" id="nationality" class="form-control charector" maxlength="100" placeholder="Nationality" <?php if(!empty($students)){?>value="<?=$students->nationality?>"<?php }?>>
										</div>
									</div>
									<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>Photo <span class="req">*</span></label>
											<input type="file" name="userfile" id="userfile" class="form-control">
											<!--<input type="file" name="userfile" id="userfile" class="form-control upload_photo">-->
											<input type="hidden" name="hidden_image" id="hidden_image">
										</div>
									</div>
									<div class="col-md-3 m-cust">
										<div class="form-group">
											<label>NOC</label>
											<input type="file" name="noc" id="noc" class="form-control" >
											
										</div>
									</div>
									<div class="col-sm-3 m-cust">
										<div class="form-group">
											<label>Employment Details <span class="req">*</span></label>
											<select class="form-control mode_of_change" name="employement_type" id="employement_type">
												<option value="">Select Employment Type</option> 
												<option value="Government Employee">Government Employee</option> 
												<option value="Private Sector Employee">Private Sector Employee</option> 
												<option value="Not Working">Not Working</option> 
											</select>
										</div>
									</div>
									<div class="col-sm-3 m-cust">
										<div class="form-group">
											<label>Country <span class="req">*</span></label>
											<select class="form-control js-example-basic-single" name="country" id="country">
												<option value="">Select Country</option>
												<?php if(!empty($country)){
													foreach($country as $country_result){
												?>
												<option value="<?=$country_result->id?>" <?php if(!empty($students) && $students->country_code == $country_result->sortname){?>selected="selected"<?php }?>><?=$country_result->name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-sm-3 m-cust">
										<div class="form-group">
											<label>State <span class="req">*</span></label>
											<select class="form-control js-example-basic-single" required name="state" id="state">
												<option value="">Select state</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 m-cust"> 
								<div class="row">
									<div class="col-sm-3 m-cust">
										<div class="form-group">
											<label>City <span class="req">*</span></label>
											<select class="form-control js-example-basic-single" required name="city" id="city">
												<option value="">Select City</option>
											</select>
										</div>
									</div>
									<div class="col-sm-3 m-cust">
										<div class="form-group">
											<label>Pin Code <span class="req">*</span></label>
											<input class="form-control number_only" required name="pincode" id="pincode" placeholder="PinCode" <?php if(!empty($students)){?>value="<?=$students->pin_code?>"<?php }?>>
										</div>
									</div>
									<div class="col-sm-3 m-cust uid_input" style="display:none;">
										<div class="form-group">
											<label class="uid_label">Aadhaar Number <span class="req">*</span></label>
											<input type="text" class="form-control identity_numer" name="identity_numer" id="identity_numer" placeholder="Enter Aadhaar Number">
											<input type="hidden" class="form-control id_type" name="id_type" id="id_type">
										</div>
									</div>
									<div class="col-sm-3 m-cust uid_soft_input" style="display:none;">
										<div class="form-group">
											<label class="uid_soft_label">Upload Aadhaar Softcopy <span class="req">*</span></label>
											<input type="file" class="form-control identity_file" name="identity_file" id="identity_file" placeholder="Upload Aadhaar Softcopy">
										</div>
									</div>
								</div>
							</div>
							
							<div class="common_details">
								<div class="col-md-12 m-cust">
									<h3>Course/Programme Details</h3>
									<small>Please enter course/programme details </small>
								</div>
								<div class="clearfix"></div>
							</div> 
							<div class="col-md-12 m-cust">	
								<div class="row">
								<div class="col-sm-3 m-cust " >
											<div class="form-group">
												<label>Center</label>
												<input  type="text" readonly readonly name="centers" id="centers" class="form-control" value="PULP"> 
											</div>
										</div> 
										<!--<div class="col-sm-3 m-cust">
											<div class="form-group">
												<label>Session<span class="req">*</span></label>
												<select id="session" name="session" class="form-control">
													<option value="">Select Session</option>
													<?php if(!empty($session)){
														foreach($session as $session_result){
													?>
													<option value="<?=$session_result->id;?>" selected><?=$session_result->session_name;?></option>
													<?php }} ?>	
												</select>
											</div>				
										</div>-->
										<?php $course_id = "";
											if(!empty($this->uri->segment(2))){ 
												$course_id = base64_decode($this->uri->segment(2)); 
											}
											//print_r($course_id);exit;
										?>
										<div class="col-sm-3 m-cust">
											<div class="form-group">
												<label>Course with Duration<span class="req">*</span></label>
												<select id="course" name="course" class="form-control mode_of_change js-example-basic-single">
													<option value="">Select Course</option>
													<?php 
													$not_course = array(24,180,120,267,26,227,25,42,155,33,158,260);
													if(!empty($course)){
														foreach($course as $course_result){
															if(!in_array($course_result->id,$not_course)){
													?>
													<option value="<?=$course_result->id;?>" <?php if($course_id != "" && $course_result->id == $course_id){?>selected<?php }?>><?=$course_result->course_name;?></option>
													<?php }}} ?>	
												</select>
											</div>				
										</div>
										<div class="col-sm-3 m-cust">
											<div class="form-group">
												<label>Session<span class="req">*</span></label>
												<select id="session" name="session" class="form-control js-example-basic-single">
													<option value="">Select Session</option>
													<?php if(!empty($session)){
														foreach($session as $session_result){
													?>
													<option value="<?=$session_result->id;?>" selected><?=$session_result->session_name;?></option>
													<?php }} ?>	
												</select>
											</div>				
										</div>
										<div class="col-sm-3 m-cust">
											<div class="form-group">
												<label>Stream <span class="req">*</span></label>
												<select name="stream" id="stream" class="form-control js-example-basic-single">
													<option value="">Select Stream</option>
													<?php if(!empty($stream)){foreach($stream as $stream_result){?>
														<option value="<?=$stream_result->id;?>"><?=$stream_result->stream_name;?></option>
													<?php }}?>
												</select>
											</div>
										</div>

										<div class="col-sm-3 m-cust">
											<div class="form-group">
												<label>Mode <span class="req">*</span></label>
												<select id="course_mode" name="course_mode" class="form-control">
													<option value="">Select Course Mode</option>
												</select>
											</div>
										</div>
										
										<div class="col-sm-3 m-cust">
											<div class="form-group">
												<label>Semester/Year/Month <span class="req">*</span></label>
												<select id="year_sem" name="year_sem" class="form-control">
													<option value="">Select Semester/Year/Month</option>
												</select>
											</div>
										</div>
										<div class="col-sm-3 m-cust">
											<div class="form-group">
												<label>Study Mode</label>
												<select id="study_mode" name="study_mode" class="form-control">
													<option value="">Select Study Mode</option>
													<option value="1">Regular</option>
													<option value="2">Online</option>
													<option value="3">Part-Time</option>
													<option value="4">Self Study</option> 
													 
												</select>
											</div>
										</div>
										<div class="col-sm-3 m-cust">
											<div class="form-group">
												<label>Payment Mode</label>
												<select id="payment_mode" name="payment_mode" class="form-control">
													<option value="">Select Payment Mode</option>
													<option value="1">Online</option>
													<option value="3">Cash</option>
													<!--<option value="2">By Challan</option>
													-->
												</select>
											</div>
										</div>
										<div class="col-sm-3 m-cust lateral_entry" style="display:none;">
											<div class="form-group">
												<label>Entry Type</label>
												<input  type="text" readonly name="entry_type" id="entry_type" class="form-control" value="Lateral Entry"> 
											</div>
										</div>
										<div class="col-sm-3 m-cust" id="payment_option" style="display:none">
											<div class="form-group">
												<label>Fees Option</label>
												<select id="fees_option" name="fees_option" class="form-control">
													<option value="">Select Fees Option</option>
													<option value="1">Full</option>
													<option value="2">Half</option>
													<!--<option value="2">By Challan</option>
													-->
												</select>
											</div>
										</div>
										<div class="col-sm-3 m-cust" id="bank_div" style="display:none">
											<div class="form-group">
												<label>Bank</label>
												<select id="bank" name="bank" class="form-control">
													<option value="">Select Bank</option>
													<?php if(!empty($bank)){ foreach($bank as $bank_result){?>
													<option value="<?=$bank_result->id?>"><?=$bank_result->bank_name?></option>
													<?php }}?>
												</select>
											</div>
										</div>
									</div>	
								</div> 
							<div class="common_details">
								<div class="col-md-12 m-cust">
									<h3>Payment Details</h3>
									<small>Pay fees in university account only other accounts fees will not be accept</small>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="col-md-12 m-cust">
								<div class="row"> 
									<div class="col-sm-3 m-cust">
										<div class="form-group">
											<label>Late Fees <span class="req">*</span></label>
											<input placeholder="Late Fees" type="text" id="late_fees" name="late_fees" class="form-control" value="" readonly>
										</div>				
									</div>
									<div class="col-sm-3 m-cust lateral_entry" style="display:none;">
										<div class="form-group">
											<label>Lateral Entry Fees</label>
											<input  type="text" readonly name="lateral_entry_fees" id="lateral_entry_fees" class="form-control" value="<?php if(!empty($lateral_fees)){ echo $lateral_fees->fees_amount;}?>"> 
										</div>
									</div>
									<div class="col-sm-3 m-cust">
										<div class="form-group">
											<label>Registration Fees <span class="req">*</span></label>
											<input placeholder="Registration Fees" type="text" id="registration_fees" name="registration_fees" class="form-control" value="" readonly>
										</div>				
									</div>
									<div class="col-sm-3 m-cust">
										<div class="form-group">
											<label>Admission Fees <span class="req">*</span></label>
											<input placeholder="Admission Fees" type="text" id="admission_fees" name="admission_fees" class="form-control" value="" readonly>
										</div>				
									</div>
									<div class="col-sm-3 m-cust">
										<div class="form-group">
											<label>Total Fees <span class="req">*</span></label>
											<input placeholder="Total Fees" type="text" id="total_admission_fees" name="total_admission_fees" class="form-control" value="" readonly>
										</div>				
									</div>
								</div>
							</div>
							<hr>
							
							<div class="col-md-12 m-cust">
								<div class="row collapseOne" style="display:none">
									<div class="col-md-12 m-cust terms">
										<table  class="detailTable" cellspacing="5" cellpadding="5">
											<tr>
												<td>
													<h4 align="justify"><b>Declaration:</b></h4>
													<br>
												</td>
											</tr>
										</table>
									</div>	
								</div>
							
								<div class="row">
									<div class="col-md-12 m-cust terms">
										<table  class="detailTable" cellspacing="5" cellpadding="5">
											<tr>
												<td>
													<br>
													<b>Declaration:</b>
													<br>
													<p align="justify"><b>I confirm that I have not made payment of any other amount to anybody other than deposited in the prescribed University account.</b></p>
													<p align="justify"><b>I solemnly declare and confirm that I am duly qualified to take admission in the course for which I have applied and all the certificates and testimonials attached with my application are true and valid. I have fully satisfied myself about the legal status of the University i.e. it is an autonomous statutory body with regulations making power for it's functioning and the University is duly authorized and competent to take my admission in the course for which I have applied and also to award the degree / diploma as per rules and regulation of the University. I also undertake not to ever raise any objection about Universities legal status to take my admission and award degrees on qualifying prescribed examinations. I also undertake not to demand refund of fee/charges paid by me. In case of any dispute/differences/claim of any value settlement by University arbitration clause shall be applicable.</b></p>
													<p align="justify"><b>I shall always follow the rules and regulations of the University and in case of any breach thereto, I shall be liable to be penalized for the same which may include expulsion from the University.</b></p>
													<br>
													<p align="justify">As per law and legal opinion University is empowered by authority of law to award degree's, diplomas, & certificate in all course of Education, there being no requirement to take approval from any other authorities all certificate degrees diplomas certificate awarded by University are Sui - generis valid in law and degree/diploma/certificate holders are automatically entitled to be recognised for government jobs and for Registration with all Professional Council. For Legal opinion and relevent laws and Court Judgments Visit University website.</p>
													
												</td>
											</tr>
										</table>
									</div>	
								</div>
								<hr>
							</div>
							<div class="col-md-12 m-cust">
								<div class="row">
									<div class="col-md-12 m-cust edu">
										<div class="form-group">
											<input type="checkbox" name="mycheckbox" id="mycheckbox" value="0" required="required" /> <label style="color:red">I Agree to the declaration<span class="req">*</span></label>
										</div>
									</div>
								</div>
								<div class="row">
								<div class="col-md-12 m-cust edu">
									<div class="col-md-2 edu">
										<strong>Captcha <span class="req">*</span></strong>
									</div>
									<div class="col-md-6 edu">
										<div class="form-group">
										 
											<div class="g-recaptcha" data-sitekey="6LcwIJcoAAAAAHWA5hzVuHwZBU8Gmnb3yWs1NJR3"></div>
										
										</div>
									</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 m-cust edu">
										<div class="form-group">
											<label></label>
											<button type="submit" class="btn btn-primary" name="register" id="register">Register</button>
											<div class="pull-right">
												
											</div>
										</div>
									</div>	
								</div>
							</div>
						</form>
					<?php }?>
					<div class="clearfix"></div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!--------------------------------------   CROPING TOOL   -----------------------------------------------> 
<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title">Upload & Crop Image</h4>
				<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 col-sm-8 col-xs-12 text-center">
						  <div id="profile_image_data" style="width:350px; margin-top:30px"></div>
  					</div>
  					<div class="col-md-4 col-sm-4 col-xs-12 croping_button">
						<button class="btn btn-success crop_image" data-dismiss="modal">Crop & Upload Image</button>
						<button type="button" class="btn btn-default close_crop_model" data-dismiss="modal">Cancel</button>
					</div>
				</div>
      		</div>
    	</div>
    </div>
</div>


<?php include('footer.php'); 
$base_url = "https://www.tgu.ac.in/";
?>

<script src="https://www.tgu.ac.in/back_panel/js/croppie.js"></script>
<script>
$(".mode_of_change").change(function(){
    if($("#course").val() == "23"){
        if($("#employement_type").val() !="Not Working"){
            $("#study_mode").html('<option value="">Select Study Mode</option><option value="3">Part-Time</option>');
        }else{ 
            $("#study_mode").html('<option value="">Select Study Mode</option><option value="1">Regular</option><option value="3">Part-Time</option><option value="2">Online</option><option value="4">Self Study</option>'); 
        }
    }else{
        if($("#employement_type").val() !="Not Working"){
            $("#study_mode").html('<option value="">Select Study Mode</option><option value="2">Online</option><option value="4">Self Study</option>');
        }else{ 
            $("#study_mode").html('<option value="">Select Study Mode</option><option value="1">Regular</option><option value="2">Online</option><option value="4">Self Study</option>'); 
        }
    }
});
$("#fees_option").change(function(){
	var admission_fees = $("#admission_fees").val();
	if($("#fees_option").val()==2) admission_fees = admission_fees/2;
	var total = parseInt($("#late_fees").val())+parseInt(admission_fees);
	$("#total_admission_fees").val(total);
	
});
$("#country").change(function(){ 
	//alert($('#country').val());
	$.ajax({
		type: "POST",
		url: "<?=base_url()?>Welcome/get_state_ajax",
		data:{'country':$("#country").val()},
		success: function(data){
			$("#state").empty();
			$('#state').append('<option value="">Select State</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#state').append('<option value="' + d.id + '">' + d.name + '</option>');
			});
			$('#state').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
	
	if($('#country').val() == '101'){
		$('.uid_input').show();
		$('.uid_soft_input').show();
		$('.uid_label').html('Aadhaar Number <span class="req">*</span>');
		$('.uid_soft_label').html('Upload Aadhaar Softcopy <span class="req">*</span>');
		$('.identity_numer').attr("placeholder", "Enter Aadhaar Number");
		$('.identity_numer').prop('required',true);
		$('.identity_file').attr("placeholder", "Upload Aadhaar Softcopy");
		$('.identity_file').prop('required',true);
		$('.id_type').val('1');
	}else{
		$('.uid_input').show();
		$('.uid_soft_input').show();
		$('.uid_label').html('Passport Number <span class="req">*</span>');
		$('.uid_soft_label').html('Upload Passport Softcopy <span class="req">*</span>');
		$('.identity_numer').attr("placeholder", "Enter Passport Number");
		$('.identity_numer').prop('required',true);
		$('.identity_file').attr("placeholder", "Upload Passport Softcopy");
		$('.identity_file').prop('required',true);
		$('.id_type').val('2');
	}
});
$("#state").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url()?>Welcome/get_city_ajax",
		data:{'state':$("#state").val()},
		success: function(data){
			$("#city").empty();
			$('#city').append('<option value="">Select City</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#city').append('<option value="' + d.id + '">' + d.name + '</option>');
			});
			$('#city').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#course").change(function(){  
	if($(this).val() == "23"){
		$("#payment_option").show(); 
		$("#session").html('<option value="10">January 2024</option><option value="8">June 2023</option>');
	}else{
		$("#payment_option").hide(); 
		$("#session").html('<option value="10">January 2024</option><option value="8">June 2023</option>');
	}
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$("#course_mode").html("<option value=''>Select Course Mode</option>");
	$.ajax({
		type: "POST",
		url: "<?=$base_url?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#stream").change(function(){  
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$("#course_mode").html("<option value=''>Select Course Mode</option>");
	$.ajax({
		type: "POST",
		url: "<?=$base_url?>web/Web_controller/get_course_stream_course_mode",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#course_mode").html(data); 
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});

$("#course_mode").change(function(){  
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=$base_url?>web/Web_controller/get_course_stream_duration",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'course_mode':$("#course_mode").val()},
		success: function(data){
			$("#year_sem").html(data);
			$.ajax({
				type: "POST",
				url: "<?=$base_url?>web/Web_controller/get_course_stream_fees",
				data:{'session':$("#session").val(),'course':$("#course").val(),'stream':$("#stream").val(),'country':$("#country").val()},
				success: function(data){
					data =  data.split("@@@");
					$("#late_fees").val(data[1]);
					$("#admission_fees").val(data[0]);
					$("#registration_fees").val(data[2]);
					$("#total_admission_fees").val(parseInt(data[0])+parseInt(data[1])+parseInt(data[2]));
					late_cal();
				},
				 error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#session").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=$base_url?>web/Web_controller/get_course_stream_fees",
		data:{'session':$("#session").val(),'course':$("#course").val(),'stream':$("#stream").val(),'country':$("#country").val()},
		success: function(data){
			data = data.split("@@@");
			$("#late_fees").val(data[1]);
			$("#admission_fees").val(data[0]);
			$("#registration_fees").val(data[2]);
			$("#total_admission_fees").val(parseInt(data[0])+parseInt(data[1])+parseInt(data[2]));
			late_cal();
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#country").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=$base_url?>web/Web_controller/get_course_stream_fees",
		data:{'session':$("#session").val(),'course':$("#course").val(),'stream':$("#stream").val(),'country':$("#country").val()},
		success: function(data){
			data = data.split("@@@");
			$("#late_fees").val(data[1]);
			$("#admission_fees").val(data[0]);
			$("#registration_fees").val(data[2]);
			$("#total_admission_fees").val(parseInt(data[0])+parseInt(data[1])+parseInt(data[2]));
			late_cal();
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
function late_cal(){
	if($("#year_sem").val() == "1" || $("#year_sem").val() == ""){
		$(".lateral_entry").hide();
		$("#total_admission_fees").val(parseInt($("#admission_fees").val())+parseInt($("#late_fees").val())+parseInt($("#registration_fees").val()));
	}else{
		$(".lateral_entry").show();
		$("#total_admission_fees").val(parseInt($("#admission_fees").val())+parseInt($("#late_fees").val())+parseInt($("#lateral_entry_fees").val())+parseInt($("#registration_fees").val()));
	}
}
$("#year_sem").change(function(){
	if($(this).val() == "1"){
		$(".lateral_entry").hide();
		$("#total_admission_fees").val(parseInt($("#admission_fees").val())+parseInt($("#late_fees").val())+parseInt($("#registration_fees").val()));
	}else{
		$(".lateral_entry").show();
		$("#total_admission_fees").val(parseInt($("#admission_fees").val())+parseInt($("#late_fees").val())+parseInt($("#lateral_entry_fees").val())+parseInt($("#registration_fees").val()));
	}
});


jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	

jQuery.validator.addMethod("noHTMLtags", function(value, element){
	if(this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)){
		if(value == ""){
			return true;
		}else{
			return false;
		}
	} else {
		return true;
	}
}, "HTML tags are Not allowed.");


$('#otp_form').validate({
	rules: {
		otp_name: {
			required: true,
			noHTMLtags: true,
		},
		otp_mobile_number: {
			required: true,
			number: true,
			minlength: 10,
			maxlength: 10,
			noHTMLtags: true,
		},
		otp_email: {
			required: true,
			validate_email: true,
			noHTMLtags: true,
		},
	},
	messages: {
		otp_name: {
			required: "Please enter your name",
			noHTMLtags:"HTML tags not allowed!",
		},
		otp_mobile_number: {
			required: "Please enter mobile number",
			number: "Please enter valid number",
			minlength: "Please enter 10 gigit mobile number",
			maxlength: "Please enter 10 gigit mobile number",
			noHTMLtags:"HTML tags not allowed!",
		},
		otp_email: {
			required: "Please enter your email",
			validate_email: "Please enter your valid email",
			noHTMLtags:"HTML tags not allowed!",
		},
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
		error.addClass('invalid-feedback');
		element.closest('.form-group').append(error);
	},
	highlight: function (element, errorClass, validClass) {
		$(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
		$(element).removeClass('is-invalid');
	}
});




$("#admission_form").validate({
	rules: {
		student_name: {
			required:true,
			noHTMLtags:true
		},		
		father_name: {
			required:true,
			noHTMLtags:true
		},		
		mother_name: {
			required:true,
			noHTMLtags:true
		},		
		userfile: {
			required:true
		},		
		date_of_birth: {
			required:true,
			noHTMLtags:true
		},		
		mobile: {
			required:true,
			number:true,
			minlength:10,
			maxlength:12,
			noHTMLtags:true
		},		
		email: {
			required:true,
			validate_email:true,
			noHTMLtags:true
		},	
		gender: {
			required:true,
			noHTMLtags:true
		},
		nationality: {
			required:true,
			noHTMLtags:true
		},
		category: {
			required:true,
			noHTMLtags:true
		},	
		session: {
			required:true,
			noHTMLtags:true
		},			
		course: {
			required:true,
			noHTMLtags:true
		},		
		stream: {
			required:true,
			noHTMLtags:true
		},		
		year_sem: {
			required:true,
			noHTMLtags:true
		},		
		address: {
			required:true,
			noHTMLtags:true
		},		
		country: {
			required:true,
			noHTMLtags:true
		},		
		state: {
			required:true,
			noHTMLtags:true
		},		
		city: {
			required:true,
			noHTMLtags:true
		},		
		pincode: {
			required:true,
			noHTMLtags:true
		},		
		payment_method: {
			required:true,
			noHTMLtags:true
		},		
		accept: {
			required:true,
			noHTMLtags:true
		},		
		late_fees: {
			required:true,
			noHTMLtags:true
		},		
		admission_fees: {
			required:true,
			noHTMLtags:true
		},		
		total_admission_fees: {
			required:true,
			noHTMLtags:true
		},					
		study_mode: {
			required:true,
			noHTMLtags:true
		},				
		payment_mode: {
			required:true,
			noHTMLtags:true
		},				
		employement_type: {
			required:true,
			noHTMLtags:true
		},		
		// noc:"required",		
	},
	messages: {
		student_name: {
			required:"Please enter Full name!",
			noHTMLtags:"HTML tags not allowed!",
		},
		father_name: {
			required:"Please enter father name!",
			noHTMLtags:"HTML tags not allowed!",
		},
		mother_name: {
			required:"Please enter mother name!",
			noHTMLtags:"HTML tags not allowed",
		},
		userfile: {
			required:"Please select photo!",
		},
		date_of_birth: {
			required:"Please select date of birth!",
			noHTMLtags:"HTML tags not allowed",
		},
		mobile: {
			required:"Please enter mobile number",
			number:"Please enter only number",
			minlength:"Please enter 10 to 12 digit mobile number.",
			maxlength:"Please enter 10 to 12 digit mobile number.",
			noHTMLtags:"HTML tags not allowed",
		},
		email: {
			required:"Please enter email",
			validate_email:"Please enter valid email",
			noHTMLtags:"HTML tags not allowed",
		},
		gender: {
			required:"Please select gender!",
			noHTMLtags:"HTML tags not allowed",
		},
		nationality: {
			required:"Please enter nationality!",
			noHTMLtags:"HTML tags not allowed",
		},
		category: {
			required:"Please select category!",
			noHTMLtags:"HTML tags not allowed",
		},
		mode: {
			required:"Please select payment mode",	
			noHTMLtags:"HTML tags not allowed",
		},	
		deposit_date: {
			required:"Please select deposit date",	
			noHTMLtags:"HTML tags not allowed",
		},		
		session: {
			required:"Please select session!",
			noHTMLtags:"HTML tags not allowed",
		},		
		course: {
			required:"Please select Course Name!",
			noHTMLtags:"HTML tags not allowed",
		},		
		stream: {
			required:"Please select stream Name!",
			noHTMLtags:"HTML tags not allowed",
		},		
		year_sem: {
			required:"Please select year/sem Name!",
			noHTMLtags:"HTML tags not allowed",
		},		
		address: {
			required:"Enter correspondence address!",
			noHTMLtags:"HTML tags not allowed",
		},		
		country: {
			required:"Please select country!",
			noHTMLtags:"HTML tags not allowed",
		},		
		state: {
			required:"Please select state!",
			noHTMLtags:"HTML tags not allowed",
		},		
		city: {
			required:"Please select city!",
			noHTMLtags:"HTML tags not allowed",
		},		
		pincode: {
			required:"Please enter pincode!",
			noHTMLtags:"HTML tags not allowed",
		},		
		payment_method: {
			required:"Please select payment method!",
			noHTMLtags:"HTML tags not allowed",
		},		
		accept: {
			required:"Please accept our terms & conditions!",
			noHTMLtags:"HTML tags not allowed",
		},		
		late_fees: {
			required:"Please enter late fees!",
			noHTMLtags:"HTML tags not allowed",
		},		
		admission_fees: {
			required:"Please enter admission fees!",
			noHTMLtags:"HTML tags not allowed",
		},		
		total_admission_fees: {
			required:"Please enter total admission fees!",
			noHTMLtags:"HTML tags not allowed",
		},
		study_mode: {
			required:"Please select study mode!",
			noHTMLtags:"HTML tags not allowed",
		},
		payment_mode: {
			required:"Please select payment mode!",
			noHTMLtags:"HTML tags not allowed",
		},
		employement_type: {
			required:"Please select employement type!",
			noHTMLtags:"HTML tags not allowed",
		},
		// noc:"NOC required!",
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});

  
$("#payment_mode").change(function(){
	if($(this).val() == "2"){
		$("#bank_div").show();
	}else{
		$("#bank_div").hide();
	}
}); 
 $('#session').change(function() {
 	$("#course").empty();
 	if($("#session").val() =="2"){ 

 		$('#course').append('<option value="">Select Course</option>');
 		 $('#course').append('<option value="23">Ph.D</option>');
        }else{
        	$.ajax({
				type: "POST",
				url: "<?=$base_url?>web/Web_controller/get_ajax_course_list",
				data:{},
				success: function(data){
					$("#course").empty();
					$('#course').append('<option value="">Select Course</option>');
					var opts = $.parseJSON(data);
					$.each(opts, function(i, d) {
					   $('#course').append('<option value="' + d.id + '">' + d.course_name + '</option>');
					});
					$('#course').trigger('change');
				},
				 error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});	
        }

    }); 

 $("#noc").change(function(){
 	var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case 'jpg':
        case 'pdf':
            break;
        default:
            alert('Only jpg,pdf file supported');
            this.value = '';
    }
 });
 $("#identity_file").change(function(){
 	var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case 'JPEG':
        case 'jpeg':
        case 'jpg':
        case 'pdf':
            break;
        default:
            alert('Only jpg, pdf file supported');
            this.value = '';
    }
 });
 $("#employement_type").change(function(){
	 if($(this).val() == "Government Employee"){
		 $("#noc").prop('required',true);
	 }else{
		 $("#noc").prop('required',false);
	 }
 });
</script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		maxDate: "-18Y",
		minDate: "-80Y",
		yearRange: "-100:-0"
	});
} );
</script>
