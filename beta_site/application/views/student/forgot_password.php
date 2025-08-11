<?php $university_details = $this->Setting_model->get_university_details();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="<?=base_url();?>back_panel/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url();?>back_panel/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?=base_url();?>back_panel/css/style.css">
  <link rel="shortcut icon" href="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" />
		
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" alt="logo">
              </div>
              <h4>Forgot Password</h4>
              <h6 class="font-weight-light">Please enter your email!</h6>
              <form class="pt-3" id="login_form" name="login_form" method="post" >
                <div class="form-group">
                  <label for="email">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="email" name="email" placeholder="Please enter your Email">
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    
                  </div>
                  <a href="<?=base_url();?>student-login" class="auth-link text-black">Back to Login?</a>
                </div>
                <div class="my-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">RESET NOW</button>
                </div>
                
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; <?=date("Y")?>  <?php if(!empty($university_details)){ echo $university_details->copyright;}?></p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
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

	<script src="<?=base_url();?>back_panel/vendors/base/vendor.bundle.base.js"></script>
	<script src="<?=base_url();?>back_panel/js/template.js"></script>
	<script src="<?=base_url();?>back_panel/js/jquery.validate.min.js"></script>
	<script>
		$(document).ready(function () {		
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
			
			$('#login_form').validate({
				rules: {
					email: {
						required: true,
						validate_email: true,
						noHTMLtags: true,
					},
				},
				messages: {
					email: {
						required: "Please enter your email",
						validate_email: "Please enter valid email",
						noHTMLtags: "HTML tags not allowed!",
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
</body>

</html>
