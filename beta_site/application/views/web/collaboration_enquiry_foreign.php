<?php include("header.php");?>
<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">
<style>
	
</style>
<div class="header_cc_area" style="background-image:url('images/header_area.jpg')">
				<div class="container">
					<div class="row">
						<h1>Collaboration Foreign Enquiry Form</h1>
						<p>Collaboration / Foreign Enquiry Form</p>
					</div>
				</div>
			</div>
<div class="uni_mainWrapper">
	<div class="container">
		<div class="row">	
			<div class="container">
				<div class="online_wrapper">
					
					<!--<h1>University Admission Form 2020-2021</h1>-->
					
					<div class="admission_div">
						<form method="post" name="admission_form" id="admission_form" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="common_details">
										<div class="col-md-12">
											<h3>Details Required</h3>
											<small>Please provide your personal details</small>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									
									<div class="col-md-3">
										<div class="form-group">
											<label>Center Name <span class="req">*</span></label>
											<input type="text" name="center_name" id="center_name" class="form-control charector" placeholder="Center Name">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Head Name <span class="req">*</span></label>
											<input type="text" name="head_name" id="head_name" class="form-control charector" placeholder="Full Name">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Contact Person Name <span class="req">*</span></label>
											<input type="text" name="contact_person_name" id="contact_person_name" class="form-control charector" placeholder="Contact Person Name">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Contact Number <span class="req">*</span></label>
											<input autocomplete="off" type="text" name="mobile" id="mobile" class="form-control number_only" placeholder="Contact Number" maxlength="10">
											<div class="error" id="mobile_error"></div>
										</div>
									</div>
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-3">
										<div class="form-group">
											<label>Email ID <span class="req">*</span></label>
											<input autocomplete="off" type="email" name="email" id="email" class="form-control" placeholder="Email ID">
											<div class="error" id="email_error"></div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Country <span class="req">*</span></label>
											<select class="form-control" name="country" id="country">
												<option value="">Select Country</option>
												<?php if(!empty($country)){
													foreach($country as $country_result){
												?>
												<option value="<?=$country_result->id?>" <?php if(!empty($students) && $students->country_code == $country_result->sortname){?>selected="selected"<?php }?>><?=$country_result->name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>State <span class="req">*</span></label>
											<select class="form-control" required name="state" id="state">
												<option value="">Select state</option>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>City <span class="req">*</span></label>
											<select class="form-control" required name="city" id="city">
												<option value="">Select City</option>
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Pin Code <span class="req">*</span></label>
											<input class="form-control number_only" required name="pincode" id="pincode" placeholder="PinCode" <?php if(!empty($students)){?>value="<?=$students->pin_code?>"<?php }?>>
										</div>
									</div>
									<div class="col-md-6">
										<label>Address <span class="req">*</span></label>
										<input type="text" class="form-control rules" name="address" id="address" placeholder="Address">
									</div>
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									
									<div class="col-md-3">
										<div class="form-group">
										  <label>Head Photo *</label>
										  <input type="file" name="photo" id="photo" class="form-control" accept=".jpg,.png,.gif,.jpeg">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
										  <label>Upload Head Passport *</label>
										  <input type="file" name="passport" id="passport" class="form-control" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="uid_soft_label">Other Document(You can upload multiple document)</label>
											<input type="file" class="form-control" name="other_document[]" id="other_document" multiple placeholder="Upload Other Document" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
										</div>
									</div>
									<div class="col-md-3">

										<div class="form-group"> 
										  <label>Reference Name</label> 
										  <input type="text" placeholder="Please enter if any reference" name="reference" id="reference" class="form-control">

										</div>

									</div>
								</div>
							</div>
							
							
							<hr>
							
							
							<div class="col-md-12">
								
								<div class="row">
									<div class="col-md-2 edu">
										<strong>Captcha <span class="req">*</span></strong>
									</div>
									<div class="col-md-6 edu">
										<div class="form-group">
											<div class="g-recaptcha" data-sitekey="<?=GOOGLE_DATA_SITEKEY?>"></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 edu">
										<div class="form-group">
											<label></label>
											<button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
											<div class="pull-right">
											</div>
										</div>
									</div>	
								</div>
							</div>
						</form>
					<div class="clearfix"></div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!--------------------------------------   CROPING TOOL   -----------------------------------------------> 


<?php include("footer.php");?>

<script>

$("#country").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_state_ajax",
		data:{'country':$("#country").val()},
		success: function(data){
			$("#state").empty();
			$('#state').append('<option value="">Select State</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#state').append('<option value="' + d.id + '">' + d.name + '</option>');
			});
			$('#state').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#state").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_city_ajax",
		data:{'state':$("#state").val()},
		success: function(data){
			$("#city").empty();
			$('#city').append('<option value="">Select City</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#city').append('<option value="' + d.id + '">' + d.name + '</option>');
			});
			$('#city').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"
	});
} );

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

$("#admission_form").validate({
	rules: {
		center_name: {
			required:true,
			noHTMLtags:true
		},
		head_name: {
			required:true,
			noHTMLtags:true
		},
		contact_person_name: {
			required:true,
			noHTMLtags:true
		},
		mobile: {
			required:true,
			number:true,
			minlength:10,
			maxlength:12,
			noHTMLtags:true
		},		
		email: {
			required:true,
			validate_email:true,
			noHTMLtags:true
		},	
		address: {
			required:true,
			noHTMLtags:true
		},
		country: {
			required:true,
			noHTMLtags:true
		},
		state: {
			required:true,
			noHTMLtags:true
		},
		city: {
			required:true,
			noHTMLtags:true
		},
		pincode: {
			required:true,
			noHTMLtags:true
		},
		photo: {
				required: true,
			},
			passport: {
				required: true,
			},
		
	},
	messages: {
		center_name: {
			required: "Please enter center name!",
			noHTMLtags:"HTML tags not allowed!",
		},
		head_name: {
			required: "Please enter head name!",
			noHTMLtags:"HTML tags not allowed!",
		},
		contact_person_name: {
			required: "Please enter contact person name!",
			noHTMLtags:"HTML tags not allowed!",
		},
		mobile: {
			required:"Please enter mobile number",
			number:"Please enter only number",
			minlength:"Please enter 10 to 12 digit mobile number.",
			maxlength:"Please enter 10 to 12 digit mobile number.",
			noHTMLtags:"HTML tags not allowed!",
		},
		email: {
			required:"Please enter email",
			validate_email:"Please enter valid email",
			noHTMLtags:"HTML tags not allowed!",
		},
		address: {
			required: "Please enter address!",
			noHTMLtags:"HTML tags not allowed!",
		},
		country: {
			required: "Please select country!",
			noHTMLtags:"HTML tags not allowed!",
		},
		state: {
			required: "Please select state!",
			noHTMLtags:"HTML tags not allowed!",
		},
		city: {
			required: "Please select city!",
			noHTMLtags:"HTML tags not allowed!",
		},
		pincode: {
			required: "Please enter pincode!",
			noHTMLtags:"HTML tags not allowed!",
		},
		photo: {
				required: "Please select head photo",
			},
			passport: {
				required: "Please select passport",
			},
			
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});

</script>