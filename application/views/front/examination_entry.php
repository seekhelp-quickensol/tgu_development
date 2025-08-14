<?php include('header.php')?>

<div class="page-title-area bg-14">
			<div class="container">
				<div class="page-title-content">
					<h2>Examination Form</h2>

					<ul>
						<li>
							<a href="javascript:void(0);">
                            Examination 
							</a>
						</li>

						<li class="active">Examination Form</li>
					</ul>
				</div>
			</div>
		</div>
		
		<section class="costing-area pt-100 pb-70">
			<div class="container">
				<div class="row justify-content-center align-items-center">
					
					
                <?php if($this->session->userdata('exam_otp') == ""){?>
					<div class="col-lg-6 col-md-6">
						
                        <div class="single-costing-card">
                        <div class="admission_box">


							<!-- <h3>Enrollment Verification</h3>
                            <small>Please provide your enrollment number</small> -->
							<!-- <form class="enrollment_form_one" method="get"  name="old_admission_form" id="old_admission_form">
								<div class="form-group">
									<label><b>Enter Enrollment Number:</b><span class="req"></span></label>
									<input type="text" id="old_enrollment" name="old_enrollment" class="form-control new_control"></input>
								</div>
								<div class=" button_div mt-4">
                                <a href="javascript:void(0);" class="default-btn2">
                                Apply Now
											<i class="ri-arrow-right-line"></i>
										</a>
								</div>
								</div>
							</form> -->


                            <form class="Enrollmentform" enctype="multipart/form-data" name="examination_form" id="examination_form" method="post">

								<div class="row">

									<div class="col-md-12">

										<div class="personal_details">

											<h3>Enrollment Verification</h3>	

											<small>Please provide your enrollment number</small>

											
										</div>

									</div>

								</div>
                                <br>
                                

                                   
                                <div class="form-group">

                                <label><b>Enter Your Enrollment Number</b><span class="req">*</span></label>

                                <input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter Your Enrollment Number">
                                </div>
                                <br>

                                <div class="form-group">
                                    <div class="mt-1 ">
                                        <button class="default-btn2" type="submit" name="generate" id="generate" value="generate">Next
                                            <i class="ri-arrow-right-line"></i>
                                        </button>
										<!-- <a class="default-btn2" type="submit" name="generate" id="generate" value="generate">Next
											<i class="ri-arrow-right-line"></i>
										</a> -->
                                    </div>
                                <div class="pull-right">

                                </div>

                                </div>

							</form>

                        </div>
						</div>
					</div>

                    <?php }else if($this->session->userdata('exam_otp') != ""){?>


                        <div class="col-lg-6 col-md-6">
						
                        <div class="single-costing-card">
                        <div class="admission_box">

                            <form class="Enrollmentform" enctype="multipart/form-data" name="otp_verification" id="otp_verification" method="post">

								<div class="row">

									<div class="col-md-12">

										<div class="personal_details">

											<h3>OTP Verification</h3>	

											<small>Please provide your OTP</small>

											
										</div>

									</div>

								</div>
                                <br>
                                

                                   
                                <div class="form-group">

                                <label><b>Enter One Time Password</b><span class="req">*</span></label>

                                <input type="text" name="otp_code" id="otp_code" required class="form-control number_only" placeholder="Enter One Time Password">
                                </div>
                                <br>

                                <div class="form-group">
                                    <button type="submit" class="default-btn2" name="verify" id="verify" value="verify">Verify</button>
                                    Didn't get OTP? <a href="<?=base_url();?>resend_exam_otp">Click Here</a> | Start from beginning <a href="<?=base_url();?>reset_exam_form">Click Here</a>

                                <div class="pull-right">

                                </div>

                                </div>

							</form>

                        </div>
						</div>
					</div>

                    <?php }?> 


				</div>
			</div>
		</section> 
		
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

        
<?php include('footer.php');?>
<script>
	$(document).ready(function(){ 
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
            

		$('#examination_form').validate({
			rules: {
				enrollment_number: {
					required: true,   
				},	
			},
			messages: {
				enrollment_number: {
					required: "Please enter enrollment number",
				},
			},
			submitHandler: function (form) {
				form.submit();
			},
		});
		


        $('#examination_form').validate({
			rules: {
				otp_code: {
					required: true,   
				},	
			},
			messages: {
				otp_code: {
					required: "Please enter your otp",
				},
			},
			submitHandler: function (form) {
				form.submit();
			},
		});
		});
</script>