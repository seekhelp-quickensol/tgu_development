<div style="display:none;">
<?php include('header.php');?>
</div>

		

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-15" style="display:none;">
			<div class="container">
				<div class="page-title-content">
					<h2>Login</h2>

					<ul>
						<li>
							<a href="">
								Home 
							</a>
						</li>

						<li class="active">Login</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

	

		<!-- Start User Area -->
		<section class="user-area py-5">
			<div class="container">
				<div class="row justify-content-center align-items-center">
					<div class="col-lg-6 user-form-content mt-3">
					<form class="user-form" method="post" name="course_login_form" id="course_login_form" enctype="multipart/form-data">
						<h3>Log in to your account</h3>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="text" name="email" id="email">
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="password" name="password" id="password">
								</div>
							</div>

							<div class="col-12">
								<div class="login-action">
									<span class="log-rem">
										<input id="remember-2" type="checkbox">
										<label>Keep me logged in</label>
									</span>
									
									<span class="forgot-login">
										<a href="#">Forgot your password?</a>
									</span>
								</div>
							</div>

							<div class="col-12">
								<button class="default-btn" type="submit">
									Log in
								</button>
							</div>
	<!-- 
							<div class="col-12">
								<p class="create">Don’t have an account? <a href="register.html">create</a></p>
							</div> -->
						</div>
					</form>
				</div>
				</div>
			</div>
		</section>
		<!-- End User Area -->

<div style="display:none;">
<?php include('footer.php');?>
</div>


<script>
	$(document).ready(function() {
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
            

	$('#course_login_form').validate({
		rules: {
			email: {
				required: true,
				noHTMLtags: true,
			},
			password: {
				required: true,
				noHTMLtags: true,
			},
		},
		messages: {
			email: {
				required: "Please enter your email",
				noHTMLtags:"HTML tags not allowed!",
			},
			password: {
				required: "Please enter password",
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
});

	</script>