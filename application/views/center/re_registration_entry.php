<?php include("header.php");?>
<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">
<style>
	
</style>

<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
        <div class="content-wrapper">
        <?php if($this->session->userdata('center_id') != "1"){?>
			<div class="row">
				<div class="col-md-5 col-md-offset-2 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="main_div">
								<div class="col-md-12">
									<form method="post" name="otp_form" id="otp_form" enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-12">
												<div class="personal_details">
													<h3>Enrollment Verification</h3>
													<small>Please provide your enrollment number</small>
													<hr>
												</div>
											</div>
										</div>
										<div class="row edu">
											<div class="col-md-12">
												<div class="form-group">
													<label>Enter Your Enrollment Number<span class="req">*</span></label>
													<input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter Your Enrollment Number">
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12 edu">
												<div class="form-group">
													<label></label>
													<button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Next</button>
													<div class="pull-right">
													</div>
												</div>
											</div>	
										</div> 
									</form>
								</div>  
								<div class="clearfix"></div>
							</div>
						
						</div>
					</div>
				</div>
			</div>
            <?php }?>
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

<?php include("footer.php");?>

<script>    
jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	
$('#otp_form').validate({
	rules: {
		enrollment_number: {
			required: true,
		},
	},
	messages: {
		enrollment_number: {
			required: "Please enter your enrollment number",
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
$('#otp_verification').validate({
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
 
  
</script>