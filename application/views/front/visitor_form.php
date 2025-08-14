<?php include("header.php"); ?>
	<div class="page-title-area bg-27">
			<div class="container">
				<div class="page-title-content">
					<h2>Visitor Form</h2>
					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>
						<li class="active">Visitor Form</li>
					</ul>
				</div>
			</div>
		</div>
		
		<section class="candidates-resume-area ptb-100">
			<div class="container">
				<div class="candidates-resume-content">
					<?php if($this->session->userdata('receipt_password') == "ABVB"){?>	
					<form class="resume-info" method="post" name="payment_form" id="payment_form" enctype="multipart/form-data"> 
						<div class="row"> 
							<div class="col-lg-4 col-md-4"> 
								<div class="form-group"> 
									<label>Name <span class="req">*</span></label> 
									<input type="text" name="name" id="name" class="form-control charector" placeholder="Please enter name"> 
								</div> 
							</div>   
							<div class="col-lg-4 col-md-4"> 
								<div class="form-group"> 
									<label>Mobile Number<span class="req">*</span></label> 
									<input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Please enter mobile number"> 
								</div> 
							</div>  
							<div class="col-lg-4 col-md-4"> 
								<div class="form-group"> 
									<label>Email</label> 
									<input type="text" name="email" id="email" class="form-control" placeholder="Please enter email"> 
								</div> 
							</div>  	
							<div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>Visit For<span class="req">*</span></label>
                                    <input type="text" name="visit_for" id="visit_for" class="form-control" placeholder="Please enter visit for"> 
                                </div>
							</div>
							<div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                <label>Address<span class="req">*</span></label>
                                  <textarea name="address" id="address" class="form-control" placeholder="Please enter address"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                <label>Upload File<span class="req">*</span></label>
                                    <input type="file" name="visitorfile" id="visitorfile" class="form-control upload_photo">
                                    <input type="hidden" name="hidden_visitorfile" id="hidden_visitorfile">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="clearboth" style="margin-bottom:10px"></div>
                                    <div class="col-md-12 edu">
                                        <div class="form-group">
                                            <label></label>
                                            <button type="submit" class="default-btn" name="register" id="register">Register</button>
                                            <div class="pull-right">
                                            </div>
                                        </div>
                                    </div>	
                                </div>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12"></div><br>
						</div>
					</form>
						<?php }else{?>
						<div class="col-md-4 col-md-offset-4">
							<div class="admission_div">
								<form method="post" name="password_form" id="password_form" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="common_details">
												<div class="col-md-12">
													<h3>Password Verification</h3>
													<small>Please provide your password to activate form</small>
												</div>
												<div class="clearfix"></div>
											</div>
										</div> 
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-12">
												<div class="form-group">
													<label>Password<span class="req">*</span></label>
													<input type="text" name="password" id="password" class="form-control" placeholder="Enter your password">
												</div>
											</div>
											<div class="clearboth" style="margin-bottom:10px"></div>
											<div class="col-md-12 edu">
												<div class="form-group">
													<label></label>
													<button type="submit" class="default-btn" name="verify_button" id="verify_button" value="Verify Now">Verify Now</button>
													<div class="pull-right"></div>
												</div>
											</div>											
										</div>											
									</div>  
									<div class="row">
									</div> 
								</form>
							</div>
							</div>
						<?php }?> 
					<div class="clearfix"></div> 
					</div>
			</div>
			</div>
			</div>
		</section>
<?php include("footer.php");?>
<script> 
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

jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email!");	

$("#password_form").validate({
	rules: {
		password: {
            required:true,
            noHTMLtags:true
        }, 
	},
	messages: {
		password: {
            required:"Please enter password!",
            noHTMLtags:"HTML tags not allowed!"
        },				
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});
$("#payment_form").validate({
	rules: {
		name: {
            required:true,
            noHTMLtags:true,
        }, 
		visit_for: {
            required:true,
            noHTMLtags:true,
        }, 
		address: {
            required:true,
            noHTMLtags:true,
        }, 
		visitorfile: {
            required:true, 
        }, 
		mobile_number: {
            required:true,
            number:true,
            minlength:10,
            maxlength:10,
            noHTMLtags:true,
        }, 	
        email: {
            email:true,
            noHTMLtags:true,
        }, 
	},
	messages: {
		name: {
            required:"Please enter name!",
            noHTMLtags:"HTML tags not allowed!",
        },	 
		visit_for: {
			required:"Please enter visit for!",
            noHTMLtags:"HTML tags not allowed!",
        }, 	 
		address: {
            required:"Please enter address!",
             noHTMLtags:"HTML tags not allowed!",
        }, 
		visitorfile: {
           required:"Please upload visitor file!",
        }, 
		mobile_number: {
            required:"Please enter mobile number!",
            number:"Please enter valid number!",
            minlength:"Please enter 10 digit mobile number!",
            maxlength:"Please enter 10 digit mobile number!",
            noHTMLtags:"HTML tags not allowed!",
        }, 
        email: {
            email:"Please enter valid email",
            noHTMLtags:"HTML tags not allowed!",
        }, 
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});
</script>
