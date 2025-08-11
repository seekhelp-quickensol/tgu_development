<?php include('header.php')?>
<!-- Start Page Title Area -->
<div class="page-title-area bg-14">
			<div class="container">
				<div class="page-title-content">
					<h2>Download Hallticket</h2>

					<ul>
						<li>
							<a href="javascript:void(0);">
                            Examination 
							</a>
						</li>

						<li class="active">Download Hallticket</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->
       
        	<!-- Start Costing Area -->
		<section class="costing-area pt-100 pb-70">
			<div class="container">
				<div class="row justify-content-center align-items-center">
					
					

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


                            <form class="Enrollmentform" name="hallticket_form" id="hallticket_form" method="post" enctype="multipart/form-data">

								<div class="row">

									<div class="col-md-12">

										<div class="personal_details">

											<h3>Enrollment Verification</h3>	

											<small>Please provide your enrollment number</small>

											<!-- <hr> -->

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
                                            <!-- <a href="javascript:void(0);" class="default-btn2">Next
                                                <i class="ri-arrow-right-line"></i>
                                            </a> -->
										<button class="default-btn2" type="submit" name="generate" id="generate" value="Generate">Download Now
                                            <i class="ri-arrow-right-line"></i>
                                        </button>
                                    </div>
                                <div class="pull-right">

                                </div>

                                </div>

							</form>

                        </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Costing Area -->
		
		<?php include('footer.php')?>

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
            

		$('#hallticket_form').validate({
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
		});
</script>