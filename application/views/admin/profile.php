<?php include('header.php');
?>
<style>
	.btn.btn-primary{
		color:#fff !important;
		height:34px !important;
	}
	.file-upload-browse.btn.btn-primary{
		height:48px !important;
	}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Profile Setting</h4>
                  <p class="card-description">
                    Please enter your personal details
                  </p>
                  <form class="forms-sample" name="profile_form" id="profile_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
					  <label for="exampleInputUsername1">Name Prefix *</label>
					  <select class="form-control js-example-basic-single" id="name_prefix" name="name_prefix">
						<option value="">Select</option>
						<option value="Mr" <?php if($profile->name_prefix == "Mr"){?>selected="selected"<?php }?>>Mr</option>
						<option value="Mrs" <?php if($profile->name_prefix == "Mrs"){?>selected="selected"<?php }?>>Mrs</option>
						<option value="Ms" <?php if($profile->name_prefix == "Ms"){?>selected="selected"<?php }?>>Ms</option>
						<option value="Dr" <?php if($profile->name_prefix == "Dr"){?>selected="selected"<?php }?>>Dr</option>
						<option value="Er" <?php if($profile->name_prefix == "Er"){?>selected="selected"<?php }?>>Er</option>
					  </select>
					</div>
					<div class="form-group">
                      <label for="exampleInputUsername1">First Name *</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php if(!empty($profile)){ echo $profile->first_name;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Last Name *</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php if(!empty($profile)){ echo $profile->last_name;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contact Number *</label>
                      <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="<?php if(!empty($profile)){ echo $profile->contact_number;}?>">
					  <div class="error" id="contact_number_error"></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Alternate Number</label>
                      <input type="text" class="form-control" id="alternate_number" name="alternate_number" placeholder="Alternate Number" value="<?php if(!empty($profile)){ echo $profile->alternate_number;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Email *</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php if(!empty($profile)){ echo $profile->email;}?>">
					  <div class="error" id="email_error"></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Address *</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php if(!empty($profile)){ echo $profile->address;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Country *</label>
                      <select class="form-control js-example-basic-single" id="country" name="country" placeholder="Country">
						<option value="">Select Country</option>
						<?php if(!empty($country)){ foreach($country as $country_result){?>
						<option value="<?=$country_result->id?>" <?php if(!empty($profile) && $profile->country == $country_result->id){?>selected="selected"<?php }?>><?=$country_result->name?></option>
						<?php }}?>
					  </select>
                    </div>
					<?php 
						$state = array();
						if(!empty($profile)){
							$state = $this->Admin_model->get_selected_state($profile->country);
						}
						$city = array();
						if(!empty($profile)){
							$city = $this->Admin_model->get_selected_city($profile->state);
						}
					?>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">State *</label>
                      <select class="form-control js-example-basic-single" id="state" name="state" placeholder="State">
						<option value="">Select State</option>
						<?php if(!empty($state)){ foreach($state as $state_result){?>
						<option value="<?=$state_result->id?>" <?php if(!empty($profile) && $profile->state == $state_result->id){?>selected="selected"<?php }?>><?=$state_result->name?></option>
						<?php }}?>
					  </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">City *</label>
                      <select class="form-control js-example-basic-single" id="city" name="city" placeholder="City">
						<option value="">Select City</option>
						<?php if(!empty($city)){ foreach($city as $city_result){?>
						<option value="<?=$city_result->id?>" <?php if(!empty($profile) && $profile->city == $city_result->id){?>selected="selected"<?php }?>><?=$city_result->name?></option>
						<?php }}?>
					  </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Pincode *</label>
                      <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?php if(!empty($profile)){ echo $profile->pincode;}?>">
                    </div>
					<div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="userfile" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
					  <input type="hidden" class="form-control" id="old_userfile" name="old_userfile" value="<?php if(!empty($profile)){ echo $profile->profile_pic;}?>">
                    </div>
					
                    <button type="submit" id="profile_button" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Password Setting</h4>
                  <p class="card-description">
                    Please enter your password
                  </p>
                  <form class="forms-sample" name="password_form" id="password_form" method="post">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Old Password *</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
						<div class="error" id="password_error"></div>
						<span for="old_password" generated="true" class="error invalid-feedback" style="display: none;">Please enter your old password</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-4 col-form-label">New Password *</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
						<span for="new_password" generated="true" class="error invalid-feedback" style="display: none;">Please enter your new password</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-4 col-form-label">Confirm Password *</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
						<span for="confirm_password" generated="true" class="error invalid-feedback" style="display: none;">Please enter confirm password</span>
                      </div>
                    </div>
                    <button type="submit" name="password_submit" value="password_submit" class="btn btn-primary password_submit">Submit</button>
                    
					<input type="hidden" name="contact_number_val" id="contact_number_val" value="0">
					<input type="hidden" name="email_val" id="email_val" value="0">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      
<?php include('footer.php');?>
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#password_form').validate({
		rules: {
			old_password: {
				required: true,
			},
			new_password: {
				required: true,
			},
			confirm_password: {
				required: true,
				equalTo:"#new_password",
			},
		},
		messages: {
			old_password: {
				required: "Please enter your old password",
			},
			new_password: {
				required: "Please enter your new password",
			},
			confirm_password: {
				required: "Please enter confirm password",
				EqualTo: "Password does not match",
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
	$('#profile_form').validate({
		rules: {
			name_prefix: {
				required: true,
			},
			first_name: {
				required: true,
			},
			last_name: {
				required: true,
			},
			contact_number: {
				required: true,
				number:true,
				minlength:10,
				maxlength:12,
			},
			alternate_number: {
				number:true,
				minlength:10,
				maxlength:12,
			},
			email: {
				required:true,
				validate_email:true,
			},
			address: {
				required:true,
			},
			country: {
				required:true,
			},
			state: {
				required:true,
			},
			city: {
				required:true,
			},
			pincode: {
				required:true,
				number:true,
				minlength:6,
				maxlength:6,
			},
		},
		messages: {
			name_prefix: {
				required: "Please select your ",
			},
			first_name: {
				required: "Please enter your first name",
			},
			last_name: {
				required: "Please enter your last name",
			},
			contact_number: {
				required: "Please enter contact number",
				number: "Please enter valid contact number",
				minlength: "Please enter valid contact number",
				maxlength: "Please enter valid contact number",
			},
			alternate_number: {
				number: "Please enter valid alternate number",
				minlength: "Please enter valid alternate number",
				maxlength: "Please enter valid alternate number",
			},
			email: {
				required: "Please enter email",
				validate_email: "Please enter valid email",
			},
			address: {
				required: "Please enter address",
			},
			country: {
				required: "Please select country",
			},
			state: {
				required: "Please select state",
			},
			city: {
				required: "Please select city",
			},
			pincode: {
				required: "Please enter pincode",
				minlength: "Please enter valid pincode",
				maxlength: "Please enter valid pincode",
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
$("#old_password").keyup(function(){
	$.ajax({
	   type: "POST",
	   url: "<?=base_url();?>admin/Ajax_controller/get_old_paasword",
	   data:{'old_password':$("#old_password").val()},
	   success: function(data){
		 if(data == "0"){
			 $(".password_submit").hide();
			 $("#password_error").html("Password does not match");
		 }else{
			 $(".password_submit").show();
			 $("#password_error").html("");
		 }
	   },
	  error: function(jqXHR, textStatus, errorThrown) {
		console.log(textStatus, errorThrown);
	   }
	});  
});
$("#country").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/ajax_controller/get_state_ajax",
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
$("#email").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_my_unique_email",
		data:{'email':$("#email").val()},
		success: function(data){
			$("#email_val").val(data);
			check_avaliable();
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#contact_number").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_my_unique_contact_number",
		data:{'contact_number':$("#contact_number").val()},
		success: function(data){
			$("#contact_number_val").val(data);
			check_avaliable();
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
function check_avaliable(){
	if($("#email_val").val() == "1"){
		$("#email_error").html("This email is already used, please try another.");
	}else{
		$("#email_error").html("");
	}
	if($("#contact_number_val").val() == "1"){
		$("#contact_number_error").html("This contact number is already used, please try another.");
	}else{
		$("#contact_number_error").html("");
	}
	if($("#contact_number_val").val() == "0" && $("#email_val").val() == "0"){
		$("#profile_button").show();
	}else{
		$("#profile_button").hide();
	}
}
 </script>
 