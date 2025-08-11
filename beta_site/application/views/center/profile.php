<?php

// echo "<pre>";print_r($center_profile);exit;
include('header.php');?>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Profile Setting

				  </h4>

                  <p class="card-description">

                    Please enter profile details

                  </p>

                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">

                    <div class="row">

					<div class="col-md-3">

					<div class="form-group">

                      <label for="exampleInputUsername1">Center Name *</label>

                      <input type="text" class="form-control" id="center_name" name="center_name" placeholder="Center Name" value="<?php if(!empty($center_profile)){ echo $center_profile->center_name;}?>">

                    </div>

					</div>

					<div class="col-md-3">

					<div class="form-group">

                      <label for="exampleInputUsername1">Head Name *</label>

                      <input type="text" class="form-control" id="head_name" name="head_name" placeholder="Head Name" value="<?php if(!empty($center_profile)){ echo $center_profile->head_name;}?>">

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputEmail1">Head Email *</label>

                      <input type="text" class="form-control" id="head_email" name="head_email" placeholder="Head Email" value="<?php if(!empty($center_profile)){ echo $center_profile->head_email;}?>">

					  <div class="error" id="email_error"></div>

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputEmail1">Head Contact Number *</label>

                      <input type="text" class="form-control" id="head_contact_number" name="head_contact_number" placeholder="Head Contact Number" value="<?php if(!empty($center_profile)){ echo $center_profile->head_contact_number;}?>">

					  <div class="error" id="contact_number_error"></div>

                    </div>

					</div>

					</div>

					<div class="row">

					

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputPassword1">Contact Person Name *</label>

                      <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" placeholder="Contact Person Name" value="<?php if(!empty($center_profile)){ echo $center_profile->contact_person_name;}?>">

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Contact Person Number *</label>

                      <input type="text" class="form-control" id="contact_person_contact" name="contact_person_contact" placeholder="Contact Person Contact" value="<?php if(!empty($center_profile)){ echo $center_profile->contact_person_contact;}?>">

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Contact Person Email *</label>

                      <input type="text" class="form-control" id="contact_person_email" name="contact_person_email" placeholder="Contact Person Email" value="<?php if(!empty($center_profile)){ echo $center_profile->contact_person_email;}?>">

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Center Address *</label>

                      <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php if(!empty($center_profile)){ echo $center_profile->address;}?>">

                    </div>

					</div>

					

					</div>

					<div class="row">

					

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Country *</label>

                      <select class="form-control js-example-basic-single" id="country" name="country" placeholder="Country">

						<option value="">Select Country</option>

						<?php if(!empty($country)){ foreach($country as $country_result){?>

						<option value="<?=$country_result->id?>" <?php if(!empty($center_profile) && $center_profile->country == $country_result->id){?>selected="selected"<?php }?>><?=$country_result->name?></option>

						<?php }}?>

					  </select>

                    </div>

					</div>

					

					<?php 

						$state = array();

						if(!empty($center_profile)){

							$state = $this->Admin_model->get_selected_state($center_profile->country);

						}

						$city = array();

						if(!empty($center_profile)){

							$city = $this->Admin_model->get_selected_city($center_profile->state);

						}

					?>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">State *</label>

                      <select class="form-control js-example-basic-single" id="state" name="state" placeholder="State">

						<option value="">Select State</option>

						<?php if(!empty($state)){ foreach($state as $state_result){?>

						<option value="<?=$state_result->id?>" <?php if(!empty($center_profile) && $center_profile->state == $state_result->id){?>selected="selected"<?php }?>><?=$state_result->name?></option>

						<?php }}?>

					  </select>

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">City *</label>

                      <select class="form-control js-example-basic-single" id="city" name="city" placeholder="City">

						<option value="">Select City</option>

						<?php if(!empty($city)){ foreach($city as $city_result){?>

						<option value="<?=$city_result->id?>" <?php if(!empty($center_profile) && $center_profile->city == $city_result->id){?>selected="selected"<?php }?>><?=$city_result->name?></option>

						<?php }}?>

					  </select>

                    </div>

					</div>

					

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Pincode *</label>

                      <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?php if(!empty($center_profile)){ echo $center_profile->pincode;}?>">

                    </div>

					</div>

					</div>

					

					

					

					<div class="row">

					

					<div class="col-md-3">

                    <div class="form-group">

                      <label>Head Photo</label>

                      <input type="file" name="photo" id="photo" class="file-upload-default">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Photo">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  <input type="hidden" class="form-control" id="old_photo" name="old_photo" value="<?php if(!empty($center_profile)){ echo $center_profile->photo;}?>">

					  </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label>Upload Head Adharcard</label>

                      <input type="file" name="adhar_card" id="adhar_card" class="file-upload-default">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Adharcard">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  <input type="hidden" class="form-control" id="old_adhar_card" name="old_adhar_card" value="<?php if(!empty($center_profile)){ echo $center_profile->adhar_card;}?>">

					  </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label>Upload MOU</label>

                      <input type="file" name="mou" id="mou" class="file-upload-default">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload MOU">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  </div>

					</div>

					</div>

					

					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($center_profile)){ echo $center_profile->id;}?>">

				  <input type="hidden" class="form-control" id="email_val" name="email_val" value="0">

				  <input type="hidden" class="form-control" id="contact_number_val" name="contact_number_val" value="0">

					

                    <button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>

                    

                  </form>

                </div>

              </div>

            </div>

            

          </div>

        </div>

      

<?php include('footer.php');

$id=0;

if($this->uri->segment(2) != ""){

	$id = $this->uri->segment(2);

}

?>

 <script>

 $(document).ready(function () {		

	jQuery.validator.addMethod("validate_email", function(value, element) {

		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

			return true;

		}else {

			return false;

		}

	}, "Please enter a valid Email.");	

	$('#single_form').validate({

		rules: {

			center_name: {

				required: true,

			},

			head_name: {

				required: true,

			},

			head_email: {

				required: true,

				validate_email: true,

			},

			head_contact_number: {

				required: true,

				number: true,

			},

			contact_person_contact: {
				required: true,
				number: true,

			},

			contact_person_email: {
				required: true,
				validate_email: true,

			},

			contact_person_name:{
				required: true,
			},

			

			address: {

				required: true,

			},

			country: {

				required: true,

			},

			state: {

				required: true,

			},

			city: {

				required: true,

			},

			pincode: {

				required: true,

				number: true,

				minlength: 6,

				maxlength: 6,

			},

			start_date: {

				required: true,

			},

			end_date: {

				required: true,

			},

			fee_share: {

				required: true,

				number: true,

			},

			operation: {

				required: true,

			},

		},

		messages: {

			center_name: {

				required: "Please enter center name",

			},

			head_name: {

				required: "Please enter head name",

			},

			head_email: {

				required: "Please enter email",

				validate_email: "Please eneter valid email",

			},

			head_contact_number: {

				required: "Please enter contact number",

				number: "Please eneter valid contact number",

			},

			contact_person_name:{
				required: "Please enter person name",
			},

			contact_person_contact: {
				required: "Please enter contact number",

				number: "Please neter valid contact number",

			},

			contact_person_email: {

				validate_email: "Please eneter valid email",

			},

			address: {

				required: "Please eneter address",

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

				number: "Please enter valid pincode",

				minlength: "Please enter valid pincode",

				maxlength: "Please enter valid pincode",

			},

			start_date: {

				required: "Please select start date",

			},

			end_date: {

				required: "Please select end date",

			},

			fee_share: {

				required: "Please enter fees amount",

				number: "Please enter valid fees amount",

			},

			operation: {

				required: "Please select operation status",

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

$("#head_email").keyup(function(){  

	$.ajax({

		type: "POST",

		url: "<?=base_url();?>center/Center_ajax_controller/get_center_unique_email",

		data:{'head_email':$("#head_email").val(),'id':'<?=$id?>'},

		success: function(data){

			$("#email_val").val(data);

			check_avaliable();

		},

		 error: function(jqXHR, textStatus, errorThrown) {

		   console.log(textStatus, errorThrown);

		}

	});	

});

$("#head_contact_number").keyup(function(){  

	$.ajax({

		type: "POST",

		url: "<?=base_url();?>center/Center_ajax_controller/get_center_unique_contact_number",

		data:{'head_contact_number':$("#head_contact_number").val(),'id':'<?=$id?>'},

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

	if($("#email_val").val() != "0"){

		$("#email_error").html("This email is already used, please try another.");

	}else{

		$("#email_error").html("");

	}

	if($("#contact_number_val").val() != "0"){

		$("#contact_number_error").html("This contact number is already used, please try another.");

	}else{

		$("#contact_number_error").html("");

	}

	if($("#contact_number_val").val() == "0" && $("#email_val").val() == "0"){

		$("#single_button").show();

	}else{

		$("#single_button").hide();

	}

}

$( function() {

    $( ".datepicker" ).datepicker({

		dateFormat:"dd-mm-yy",

		changeMonth:true,

		changeYear:true,

		/*maxDate: "-12Y",

		minDate: "-80Y",

		yearRange: "-100:-0"*/

	});

  } );

 </script>

 