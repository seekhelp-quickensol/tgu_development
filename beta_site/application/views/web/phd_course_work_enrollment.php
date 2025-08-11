<?php include("header.php");?>
<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">
<style>
	
</style>
<div class="header_cc_area" style="background-image:url('<?=base_url();?>images/header_area.jpg')">
				<div class="container">
					<div class="row">
						<h1>Ph.D Course Work Form</h1>
						<p>Research / Course Work Form</p>
					</div>
				</div>
			</div>
<div class="uni_mainWrapper">
	<div class="container">
		<div class="row">	
			<div class="container">
				<div class="online_wrapper">
					 
					<div class="main_div">
						<div class="col-md-12">
							<form method="post" name="form_verification" id="form_verification" enctype="multipart/form-data">
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
											<label>Enter Your Enrollment Numbere<span class="req">*</span></label>
											<input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter your your enrollment number">
										</div>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-md-12 edu">
										<div class="form-group">
											<label></label>
											<button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Continue</button>
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

$('#form_verification').validate({
	rules: {
		enrollment_number: {
			required: true,
			noHTMLtags:true
		},
		
	},
	messages: {
		enrollment_number: {
			required: "Please enter your enrollment number",
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
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		maxDate: "-18Y",
		minDate: "-80Y",
		yearRange: "-100:-0"
	});
} ); 
  
</script>