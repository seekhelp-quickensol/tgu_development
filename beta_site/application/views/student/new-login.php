<?php $university_details = $this->Setting_model->get_university_details();
if($this->session->userdata('admin_id') !=""){
	redirect('erp-dashboard');
}	
if($this->session->userdata('faculty_id') !=""){
	redirect('faculty_profile');
}
if($this->session->userdata('center_id') !=""){
	redirect('center-dashboard');
}
if($this->session->userdata('student_id') !=""){
	redirect('student-dashboard');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="<?=base_url();?>back_panel/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url();?>back_panel/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?=base_url();?>back_panel/css/style.css">
  <link rel="shortcut icon" href="<?=base_url();?>images/logo/<?php if(!empty($university_details) && $university_details->logo != ""){ echo $university_details->logo;}else{ echo "demologo.png";}?>" />
		
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-12 d-flex align-items-center justify-content-center">
            <img src="<?=base_url();?>images/maintenance_page.jpg" class="img-responsive">
          </div>
          <!--<div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; <?=date("Y")?>  <?php if(!empty($university_details)){ echo $university_details->copyright;}?></p>
          </div>-->
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
			$('#login_form').validate({
				rules: {
					username: {
						required: true,
					},
					password: {
						required: true,
					},
				},
				messages: {
					username: {
						required: "Please enter your username",
					},
					password: {
						required: "Please enter your password",
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
