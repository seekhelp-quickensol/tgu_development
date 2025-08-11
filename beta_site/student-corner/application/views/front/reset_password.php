<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Gurdeep singh osahan">
      <meta name="author" content="Gurdeep singh osahan">
      <title>Welcome to The Global Univerisity</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="images/fav.svg">
      <!-- Bootstrap core CSS -->
      <link href="<?=base_url();?>front_style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome-->
      <link href="<?=base_url();?>front_style/vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- Material Design Icons -->
      <link href="<?=base_url();?>front_style/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css">
      <!-- Slick -->
      <link href="<?=base_url();?>front_style/vendor/slick-master/slick/slick.css" rel="stylesheet" type="text/css">
      <!-- Lightgallery -->
      <link href="<?=base_url();?>front_style/vendor/lightgallery-master/dist/css/lightgallery.min.css" rel="stylesheet">
      <!-- Select2 CSS -->
      <link href="<?=base_url();?>front_style/vendor/select2/css/select2-bootstrap.css" />
      <link href="<?=base_url();?>front_style/vendor/select2/css/select2.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <link href="<?=base_url();?>front_style/css/style.css" rel="stylesheet">
      <link href="<?=base_url('assets/admin/css/animate.css');?>" rel="stylesheet">
   </head>
   <body style="background-image:url(<?=base_url();?>front_style/logo.png);background-repeat: no-repeat;
    background-size: 100% 100%;min-height:100vh; overflow-y: hidden;">

      <!-- Login -->
      <div class="login-overlay"  >
         <div class="container">
            <div class="justify-content-center align-items-center d-flex front-login-details animated fadeInDown">
               <div class="mx-auto">
                  <div class="osahan-login py-4">
                     <div class="text-center mb-4">
                         <a href="<?=base_url();?>"><img src="<?=base_url();?>images/global_university_logo.png" alt=""></a>
                        <h5 class="font-weight-bold mt-3 company_name">The Global University</h5>
                        <p class="text-muted company_caption">Complete Learning Management</p>
                     </div>
                     <form id="reset_form" method="post">
                        <div class="form-group">
                           <label class="mb-1">New Password </label>
                           <div class="position-relative icon-form-control">
                              <i class="mdi mdi-account-key position-absolute"></i>
                              <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New password">
                           </div>
                        </div>
						 <div class="form-group">
                           <label class="mb-1">Confirm Password</label>
                           <div class="position-relative icon-form-control">
                              <i class="mdi mdi-account-key position-absolute"></i>
                              <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password">
                           </div>
                        </div>
                        <div class="user_error" id="user_error" style="color:red" ></div>
                          

                        <button class="btn btn-success btn-block text-uppercase submit-btn" type="submit"> Update </button>
                        <div class="py-3 d-flex align-item-center"> 
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript -->
      <script src="<?=base_url();?>front_style/vendor/jquery/jquery.min.js"></script>
      <script src="<?=base_url();?>front_style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Contact form JavaScript -->
      <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <script src="<?=base_url();?>front_style/js/jqBootstrapValidation.js"></script>
      <script src="<?=base_url();?>front_style/js/contact_me.js"></script>
      <!-- Slick -->
      <script src="<?=base_url();?>front_style/vendor/slick-master/slick/slick.js" type="text/javascript" charset="utf-8"></script>
      <!-- lightgallery -->
      <script src="<?=base_url();?>front_style/vendor/lightgallery-master/dist/js/lightgallery-all.min.js"></script>
      <!-- select2 Js -->
      <script src="<?=base_url();?>front_style/vendor/select2/js/select2.min.js"></script>
      <!-- Custom -->
      <script src="<?=base_url();?>front_style/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script> 
    <script>
        jQuery.validator.addMethod("noHTMLtags", function(value, element){
			if(this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)){
				return false;
			} else {
				return true;
			}
			}, "HTML tags are Not allowed.");

    $(document).ready(function(){
	   $("#reset_form").validate({
		  errorElement:'div',
		  rules:{
			new_password:{
				required:true,
				noHTMLtags:true,
			},
			confirm_password:{
				required:true,
				equalTo:"#new_password",
				noHTMLtags:true,
			},
		  },
		  messages:{
			 new_password:{
				required:"Please enter new password",
				noHTMLtags:"html not allowed.",
			 },
			 confirm_password:{
				required:"Please enter confirm password",
				equalTo:"Confirm password does not match",
				noHTMLtags:"html not allowed.",
			 }, 
		  } 
	   });
});
      </script>
    
	</body>
</html>
