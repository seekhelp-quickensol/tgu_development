<?php include('header.php')?> 
<div class="page-title-area bg-14"> 
	<div class="container"> 
		<div class="page-title-content"> 
			<h2>Re-evaluation Form</h2> 
			<ul>
				<li><a href="javascript:void(0);">Examination</a></li>  
				<li class="active">Re-evaluation Form</li> 
			</ul> 
		</div> 
	</div> 
</div>  
<section class="costing-area pt-100 pb-70"> 
	<div class="container"> 
		<div class="row justify-content-center align-items-center">    
				<div class="col-lg-6 col-md-6"> 
					<div class="single-costing-card"> 
						<div class="admission_box">  
							<form class="Enrollmentform" enctype="multipart/form-data" name="verification_form" id="verification_form" method="post">  
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
									<label>Enter Your Year/Semester<span class="req">*</span></label>
									<select id="year_sem" name="year_sem" class="form-control">
										<option value="">Select Year/Sem</option>
										<option value="1">1 </option>
										<option value="2">2 </option>
										<option value="3">3 </option>
										<option value="4">4 </option>
										<option value="5">5 </option>
										<option value="6">6 </option>
									</select>
                                </div> 
                                <br>  
                                <div class="form-group"> 
                                    <div class="mt-1 "> 
                                        <button class="default-btn2" type="submit" name="generate" id="generate" value="generate">Next 
                                            <i class="ri-arrow-right-line"></i> 
                                        </button>   
                                    </div> 
                                <div class="pull-right"></div> 
                               </div> 
						</form> 
                  </div> 
				</div> 
			</div>  
		</div> 
	</div> 
</section>  
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


		$.validator.addMethod("noSpaceatfirst", function (value, element) {
            return this.optional(element) || /^\s/.test(value) === false;
        }, "First Letter Can't Be Space!");

		$("#verification_form").validate({
			// ignore:[],
			rules: {
				enrollment_number: {
					required: true,
					noHTMLtags: true,
					noSpaceatfirst:true,
					number:true,
				},	
				year_sem: {
					required: true,
					noHTMLtags: true,
				},
			},
			messages: {
				enrollment_number: {
					required: "Please enter enrollment number!",
					noHTMLtags:"HTML tags not allowed!",
					noSpaceatfirst:"First letter can't be space",
					number:"Please enter valid enrollment number",
				},
				year_sem: {
					required: "Please select year/sem!",
					noHTMLtags:"HTML tags not allowed!",
				},
			}, 
			submitHandler: function(form){
				form.submit();
			} 
		}); 
	}); 
</script>