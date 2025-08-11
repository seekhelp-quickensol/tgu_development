<title>Welcome to Verification Portal</title>
<link rel="icon" type="image/png" href="<?=base_url();?>admin_assets/images/logo-01.png">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url();?>admin_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>admin_assets/css/style.css">
    <header class="login-form-header">
        <!-- <h2> <a href="<?=base_url();?>"> Mywindow </a>   </h2> -->
    </header>
<style>
 
</style>
<div class="bg-gradient-form" style=" background-image: url(<?=base_url();?>/admin_assets/images/loginbg.jpg);">
<div class="layer">
    </div>   



     <!-- <div class="text-center"> 
     <a href="<?=base_url();?>"> <img src="<?=base_url();?>admin_assets/images/logo.jpeg" class="mywindow-logo"> </a>
     </div> -->

        <div class="form_container"> 

        <div class="container login_page" style=" padding-left: 0px !important; ">
            <div class="col-left">
                <div class="login-text">
              
              
                    <h2>Welcome To</h2><h2>Verification Portal</h2>
                   
            <p>Login the page and verify your documents</p>
            <p>Verify that Government certifications actually belong to the applicant. </p>
                </div>
                
               
            </div>
   
            <div class="col-right">
                
              <div class="login-form">
              <img src="<?=base_url();?>admin_assets/images/dvlogo.png" class="mywindow-logo">

                <h2>Login</h2>
                
                <form method="post" id="login-form" novalidate="novalidate">
                  <p>
                    <!-- <label>Username or email address<span>*</span></label>
                    <input type="text" placeholder="Username or Email" required> -->
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" />
                  </p>
                  <p>
                    <!-- <label>Password<span>*</span></label>
                    <input type="password" placeholder="Password" required> -->
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <label for="password_field" class="control-label">Password</label>
                    <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" >
                    <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>                  </p> -->
                  <p>
                    <!-- <input type="submit" value="Sing In" /> -->
                    <button type="submit" >Log In </button>
                  </p>
                  <p>
                     <a href="<?=base_url();?>forgot-password" class="btn btn-link forgot_password">Forgot Password</a>
                  </p>
                </form>
              
              </div>
            </div>
            <!-- <div class="row loginform">
                <div class="col-md-6 login-form-holder1">
                    
                </div>
                <div class="col-md-6 card login-form-holder">
                    <h2 class="form-heading">Welcome To Verification Portal</h2>
                    <div class="card-body">
                        <form method="post" id="login-form" novalidate="novalidate">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" />
                            </div>
                            <div class="form-group">
                                <label for="password_field" class="control-label">Password</label>
                                <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" >
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="row">
                                <div class="col-12 text-left">
                                    <a href="<?=base_url();?>forgot-password" class="btn btn-link forgot_password">Forgot Password</a>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-login">Log In </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<?php if($this->session->flashdata('success') !=""){?>
        <div class="alert alert-success animated fadeInUp">
            <strong>Success!</strong> <?=$this->session->flashdata('success')?>
        </div>
    <?php }else if($this->session->flashdata('message') !=""){?>
        <div class="alert alert-danger animated fadeInUp">
            <strong>Error!</strong> <?=$this->session->flashdata('message')?>
        </div>
    <?php }elseif(validation_errors()!=''){?>
        <div class="alert alert-danger animated fadeInUp">
            <strong>Error!</strong> <?=validation_errors()?>
        </div>
    <?php }?>
   

<script src="<?=base_url();?>admin_assets/js/jquery.slim.min.js"></script>
<script src="<?=base_url();?>admin_assets/js/popper.min.js"></script>
<script src="<?=base_url();?>admin_assets/js/bootstrap.bundle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script>
    $(".toggle-password").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    }); 
    $(document).ready(function($) { 
        $("#login-form").validate({
			rules: {
				email: {required: true, email: true   },
								   
				password: {
					required: true,
				   // minlength: 6
				} 
			},
			messages: {
				// email: "Please enter your email Address",     
				email: {
					required: "Please enter your email Address",
							email: "Please enter valid email Address"
				}              ,
				password: {
					required: "Please provide a password",
				   // minlength: "Your password must be at least 6 characters long"
				}
			},
			errorPlacement: function(error, element){
				if(element.is(":radio")){
					error.appendTo( element.parents('.form-group') );
				}else{ 
					error.insertAfter( element );
				}
			},
			submitHandler: function(form) {
				form.submit();
			} 
		});
	}); 
	$(".alert").fadeTo(3000, 500).slideUp(500, function(){
		$(".alert").slideUp(300);
	});  
</script>  
</html>