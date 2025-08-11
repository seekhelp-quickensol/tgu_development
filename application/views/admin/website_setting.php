<?php include('header.php');?>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Website Setting</h4>

                  <p class="card-description">

                    Please enter website details

                  </p>

                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">

                    <div class="row">

					<div class="col-md-4">

					<div class="form-group">

                      <label for="exampleInputUsername1">University Name *</label>

                      <input type="text" class="form-control" id="university_name" name="university_name" placeholder="University Name" value="<?php if(!empty($university_details)){ echo $university_details->university_name;}?>">

                      <input type="hidden" class="form-control" id="uni_id" name="uni_id" value="<?php if(!empty($university_details)){ echo $university_details->id;}?>">

                    </div>

					</div>

					<div class="col-md-4">

					<div class="form-group">

                      <label for="exampleInputUsername1">Slogan *</label>

                      <input type="text" class="form-control" id="slogan" name="slogan" placeholder="University Slogan" value="<?php if(!empty($university_details)){ echo $university_details->slogan;}?>">

                    </div>

					</div>

					<div class="col-md-4">

                    <div class="form-group">

                      <label for="exampleInputEmail1">Contact Number *</label>

                      <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="<?php if(!empty($university_details)){ echo $university_details->contact_number;}?>">

                    </div>

					</div>



					

					</div>

					<div class="row">

					

					<div class="col-md-4">

                    <div class="form-group">

                      <label for="exampleInputPassword1">Email *</label>

                      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php if(!empty($university_details)){ echo $university_details->email;}?>">

					</div>

					</div>

					<div class="col-md-4">

                    <div class="form-group">

                      <label for="exampleInputPassword1">Website *</label>

                      <input type="text" class="form-control" id="website" name="website" placeholder="Website" value="<?php if(!empty($university_details)){ echo $university_details->website;}?>">

					</div>

					</div>

					<div class="col-md-4">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Copyright *</label>

                      <input type="text" class="form-control" id="copyright" name="copyright" placeholder="Copyright" value="<?php if(!empty($university_details)){ echo $university_details->copyright;}?>">

					</div>

					</div>

					</div>

					<div class="row">
					<div class="col-md-4">

                    <div class="form-group">

                      <label for="exampleInputEmail1">Helpline Number *</label>

                      <input type="text" class="form-control" id="helpline_number" name="helpline_number" placeholder="Helpline Number" value="<?php if(!empty($university_details)){ echo $university_details->helpline_number;}?>">

                    </div>

					</div>

					<div class="col-md-4">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Address*</label>

                      <textarea class="form-control" id="address" name="address" placeholder="Address"><?php if(!empty($university_details)){ echo $university_details->address;}?></textarea>

                    </div>

					</div>

					

					<div class="col-md-4">

                    <div class="form-group">

                      <label>Logo upload</label>

                      <input type="file" name="userfile" class="file-upload-default">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Logo">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

						<button>
							<!-- <?php if (!empty($university_details) && $university_details->logo != "") { ?><a class="btn btn-primary" href="<?= base_url(); ?>images/logo/<?= $university_details->logo ?>" target="_blank">View</a><?php } ?> -->

							<?php if(!empty($university_details) && $university_details->logo != ""){?>
									<a href="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" target="_blank" class="btn btn-info btn-small">View</a>
								<?php }?>
						</button>
					
                      </div>

					  <input type="hidden" class="form-control" id="old_userfile" name="old_userfile" value="<?php if(!empty($university_details)){ echo $university_details->logo;}?>">

					</div>

					</div>


					<div class="col-md-4">

						<div class="form-group">

						<label>Stamp upload</label>

						<input type="file" name="userfile1" class="file-upload-default">

						<div class="input-group col-xs-12">

							<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Stamp">

							<span class="input-group-append">

							<button class="file-upload-browse btn btn-primary" type="button">Upload</button>

							</span>

							
							<button>
								<!-- <?php if (!empty($university_details) && $university_details->stamp != "") { ?><a class="btn btn-primary" href="<?= base_url();?>images/logo/<?= $university_details->stamp ?>" target="_blank">View</a><?php } ?> -->
							
								<?php if(!empty($university_details) && $university_details->stamp != ""){?>
									<a href="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->stamp)?>" target="_blank" class="btn btn-info btn-small">View</a>
								<?php }?>
						
							</button>

						</div>

						<input type="hidden" class="form-control" id="old_userfile1" name="old_userfile1" value="<?php if(!empty($university_details)){ echo $university_details->stamp;}?>">

						</div>

						</div>
                        <div class="col-md-4">

    						<div class="form-group">
        						<label>Public Self Disclosure Status</label>
        						<select class="form-control" id="public_self_disclosure_status" name="public_self_disclosure_status">
    						        <option value="">Please Select Status</option>
    						        <option value="0" <?php if(!empty($university_details) && $university_details->public_self_disclosure_status == '0'){?>selected<?php }?>>Hold</option>
    						        <option value="1" <?php if(!empty($university_details) && $university_details->public_self_disclosure_status == '1'){?>selected<?php }?>>Active</option>
    						    </select>
    
    						</div>
    
    					</div>
					</div>
					
					
				
					<!-- <div class="row">
					<div class="col-md-4">

                    <div class="form-group">

                      <label for="exampleInputPassword1">Email Mail ID *</label>

                      <input type="text" class="form-control" id="mail_email" name="mail_email" placeholder="Email Mail ID" value="<?php if(!empty($university_details)){ echo $university_details->mail_email;}?>">

					</div>

					</div>
					</div> -->

                    <button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>

                    <a href="<?=base_url();?>close_web_temp" class="btn btn-danger mr-2" >Down the website</a>

					<!-- <?php if(!empty($university_details) && $university_details->is_alumni == "0"){ ?>

                    <a href="<?=base_url();?>hide_alumni" class="btn btn-danger mr-2" style="display:none">Hide Alumni</a>

					<?php }else{?>

                    <a href="<?=base_url();?>show_alumni" class="btn btn-danger mr-2" style="display:none">Show Alumni</a> 

					<?php }?>  -->

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

			university_name: {

				required: true,

			},

			slogan: {

				required: true,

			},

			website: {

				required: true,

			},

			contact_number: {

				required: true,

			},
		
			helpline_number:{
				required: true,

				number:true,

				minlength:10,

				maxlength:12,
			},

			email: {

				required: true,

			},
			mail_email:{
				required:true,
				validate_email:true,
			},

			address: {

				required: true,

			},

			copyright: {

				required: true,

			},

		},

		messages: {

			university_name: {

				required: "Please enter university name",

			},

			website: {

				required: "Please enter website",

			},

			slogan: {

				required: "Please enter university slogan",

			},

			contact_number: {

				required: "Please enter university contact number",

			},

			helpline_number:{
				required: "Please enter helpline number",

				number: "Please enter valid helpline number",

				minlength: "Please enter valid helpline number",

				maxlength: "Please enter valid helpline number",
			},


			email: {

				required: "Please enter university email",

			},
			mail_email:{
				required: "Please enter email mail id",

				validate_email: "Please enter valid email",

			},

			address: {

				required: "Please enter university address",

			},

			copyright: {

				required: "Please enter university copyright",

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

	$('#single_form').validate({

		rules: {

			name_prefix: {

				required: true,

			},

			designation: {

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

			helpline_number:{
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

			mail_email:{
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

			join_date: {

				required:true,

			},

		},

		messages: {

			name_prefix: {

				required: "Please select your ",

			},

			designation: {

				required: "Please select designation",

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

			helpline_number:{
				required: "Please enter helpline number",

				number: "Please enter valid helpline number",

				minlength: "Please enter valid helpline number",

				maxlength: "Please enter valid helpline number",
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
			mail_email:{
				required: "Please enter email mail id",

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

			join_date: {

				required: "Please select join date",

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

// $("#country").change(function(){  

// 	$.ajax({

// 		type: "POST",

// 		url: "<?=base_url();?>admin/Ajax_controller/get_state_ajax",

// 		data:{'country':$("#country").val()},

// 		success: function(data){

// 			$("#state").empty();

// 			$('#state').append('<option value="">Select State</option>');

// 			var opts = $.parseJSON(data);

// 			$.each(opts, function(i, d) {

// 			   $('#state').append('<option value="' + d.id + '">' + d.name + '</option>');

// 			});

// 			$('#state').trigger('change');

// 		},

// 		 error: function(jqXHR, textStatus, errorThrown) {

// 		   console.log(textStatus, errorThrown);

// 		}

// 	});	

// });

// $("#state").change(function(){  

// 	$.ajax({

// 		type: "POST",

// 		url: "<?=base_url();?>admin/Ajax_controller/get_city_ajax",

// 		data:{'state':$("#state").val()},

// 		success: function(data){

// 			$("#city").empty();

// 			$('#city').append('<option value="">Select City</option>');

// 			var opts = $.parseJSON(data);

// 			$.each(opts, function(i, d) {

// 			   $('#city').append('<option value="' + d.id + '">' + d.name + '</option>');

// 			});

// 			$('#city').trigger('change');

// 		},

// 		 error: function(jqXHR, textStatus, errorThrown) {

// 		   console.log(textStatus, errorThrown);

// 		}

// 	});	

// });

// $("#email").keyup(function(){  

// 	$.ajax({

// 		type: "POST",

// 		url: "<?=base_url();?>admin/Ajax_controller/get_emp_unique_email",

// 		data:{'email':$("#email").val(),'id':'<?=$id?>'},

// 		success: function(data){

// 			console.log(data)

// 			$("#email_val").val(data);

// 			check_avaliable();

// 		},

// 		 error: function(jqXHR, textStatus, errorThrown) {

// 		   console.log(textStatus, errorThrown);

// 		}

// 	});	

// });

// $("#contact_number").keyup(function(){  

// 	$.ajax({

// 		type: "POST",

// 		url: "<?=base_url();?>admin/Ajax_controller/get_emp_unique_contact_number",

// 		data:{'contact_number':$("#contact_number").val(),'id':'<?=$id?>'},

// 		success: function(data){

// 			$("#contact_number_val").val(data);

// 			check_avaliable();

// 		},

// 		 error: function(jqXHR, textStatus, errorThrown) {

// 		   console.log(textStatus, errorThrown);

// 		}

// 	});	

// });

// function check_avaliable(){

// 	if($("#email_val").val() != "0"){

// 		$("#email_error").html("This email is already used, please try another.");

// 	}else{

// 		$("#email_error").html("");

// 	}

// 	if($("#contact_number_val").val() != "0"){

// 		$("#contact_number_error").html("This contact number is already used, please try another.");

// 	}else{

// 		$("#contact_number_error").html("");

// 	}

// 	if($("#contact_number_val").val() == "0" && $("#email_val").val() == "0"){

// 		$("#single_button").show();

// 	}else{

// 		$("#single_button").hide();

// 	}

// }

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

 