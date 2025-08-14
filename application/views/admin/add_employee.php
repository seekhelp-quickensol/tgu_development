<?php include('header.php'); ?>

<div class="container-fluid page-body-wrapper">

	<div class="main-panel">

		<div class="content-wrapper">

			<div class="row">

				<div class="col-md-12 grid-margin stretch-card">

					<div class="card">

						<div class="card-body">

							<h4 class="card-title">Employee Setting

								<a href="<?= base_url(); ?>employee_list" class="btn btn-primary mr-2 float-right">View List</a>

							</h4>

							<p class="card-description">

								Please enter employee details

							</p>

							<form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">

								<div class="row">

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputUsername1">Designation *</label>

											<select class="form-control js-example-basic-single" id="designation" name="designation">

												<option value="">Select</option>

												<?php if (!empty($designation)) {
													foreach ($designation as $designation_result) { ?>

														<option value="<?= $designation_result->id ?>" <?php if (!empty($single) && $single->designation_id == $designation_result->id) { ?>selected="selected" <?php } ?>><?= $designation_result->designation ?></option>
												<?php }
												} ?>

											</select>

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputUsername1">Name Prefix *</label>

											<select class="form-control js-example-basic-single" id="name_prefix" name="name_prefix">

												<option value="">Select</option>

												<option value="Mr" <?php if (!empty($single) && $single->name_prefix == "Mr") { ?>selected="selected" <?php } ?>>Mr</option>

												<option value="Mrs" <?php if (!empty($single) && $single->name_prefix == "Mrs") { ?>selected="selected" <?php } ?>>Mrs</option>

												<option value="Ms" <?php if (!empty($single) && $single->name_prefix == "Ms") { ?>selected="selected" <?php } ?>>Ms</option>

												<option value="Dr" <?php if (!empty($single) && $single->name_prefix == "Dr") { ?>selected="selected" <?php } ?>>Dr</option>

												<option value="Er" <?php if (!empty($single) && $single->name_prefix == "Er") { ?>selected="selected" <?php } ?>>Er</option>

											</select>

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputUsername1">First Name *</label>

											<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php if (!empty($single)) {
																																							echo $single->first_name;
																																						} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputEmail1">Last Name *</label>

											<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php if (!empty($single)) {
																																						echo $single->last_name;
																																					} ?>">

										</div>

									</div>


									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputPassword1">Contact Number *</label>

											<input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="<?php if (!empty($single)) {
																																										echo $single->contact_number;
																																									} ?>">

											<div class="error" id="contact_number_error"></div>

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Alternate Number</label>

											<input type="text" class="form-control" id="alternate_number" name="alternate_number" placeholder="Alternate Number" value="<?php if (!empty($single)) {
																																											echo $single->alternate_number;
																																										} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Email *</label>

											<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php if (!empty($single)) {
																																			echo $single->email;
																																		} ?>">

											<div class="error" id="email_error"></div>

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Date Of Birth *</label>

											<input type="text" class="form-control datepicker" id="dob" name="dob" value="<?php if (!empty($single)) {
																																echo $single->date_of_birth;
																															} ?>" placeholder="Date Of Birth">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Address *</label>

											<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php if (!empty($single)) {
																																					echo $single->address;
																																				} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Country *</label>

											<select class="form-control js-example-basic-single" id="country" name="country" placeholder="Country">

												<option value="">Select Country</option>

												<?php if (!empty($country)) {
													foreach ($country as $country_result) { ?>

														<option value="<?= $country_result->id ?>" <?php if (!empty($single) && $single->country == $country_result->id) { ?>selected="selected" <?php } ?>><?= $country_result->name ?></option>

												<?php }
												} ?>

											</select>

										</div>

									</div>



									<?php

									$state = array();

									if (!empty($single)) {

										$state = $this->Admin_model->get_selected_state($single->country);
									}

									$city = array();

									if (!empty($single)) {

										$city = $this->Admin_model->get_selected_city($single->state);
									}

									?>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">State *</label>

											<select class="form-control js-example-basic-single" id="state" name="state" placeholder="State">

												<option value="">Select State</option>

												<?php if (!empty($state)) {
													foreach ($state as $state_result) { ?>

														<option value="<?= $state_result->id ?>" <?php if (!empty($single) && $single->state == $state_result->id) { ?>selected="selected" <?php } ?>><?= $state_result->name ?></option>

												<?php }
												} ?>

											</select>

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">City *</label>

											<select class="form-control js-example-basic-single" id="city" name="city" placeholder="City">

												<option value="">Select City</option>

												<?php if (!empty($city)) {
													foreach ($city as $city_result) { ?>

														<option value="<?= $city_result->id ?>" <?php if (!empty($single) && $single->city == $city_result->id) { ?>selected="selected" <?php } ?>><?= $city_result->name ?></option>

												<?php }
												} ?>

											</select>

										</div>

									</div>



									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Pincode *</label>

											<input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?php if (!empty($single)) {
																																					echo $single->pincode;
																																				} ?>">

										</div>

									</div>

									<div class="col-md-3">

										<div class="form-group">

											<label for="exampleInputConfirmPassword1">Join Date *</label>

											<input type="text" class="form-control datepicker" id="join_date" name="join_date" placeholder="Join Date" value="<?php if (!empty($single)) {
																																									echo date("d-m-Y", strtotime($single->join_date));
																																								} ?>">

										</div>

									</div>


									<!--<div class="col-md-3">-->

									<!--	<div class="form-group">-->

									<!--		<label for="exampleInputConfirmPassword1">Exit Date</label>-->

									<!--		<input type="text" class="form-control datepicker" id="exit_date" name="exit_date" placeholder="Exit Date" 	value="-->
									<?php
									// 			if (!empty($single) && $single->exit_date != '' && $single->exit_date != '01-01-1970') {
									// 																																	echo date("d-m-Y", strtotime($single->exit_date));
									// 																																}
									?>
									<!--																															">-->

									<!--	</div>-->

									<!--</div>-->

									<div class="col-md-3">

										<div class="form-group">

											<label>Upload Profile Picture <?php if (!empty($single) && $single->profile_pic != "") { ?><a class="btn btn-success btn-sm" target="_blank" href="<?= $this->Digitalocean_model->get_photo('images/employee/' . $single->profile_pic) ?>"><i class="fa fa-eye"></i></a><?php } ?></label>

											<input type="file" name="userfile" class="file-upload-default" id="image-id">

											<div class="input-group col-xs-12">

												<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">

												<span class="input-group-append">

													<button class="file-upload-browse btn btn-primary" type="button">Upload</button>

												</span>

											</div>

											<input type="hidden" class="form-control" id="old_userfile" name="old_userfile" value="<?php if (!empty($single)) {
																																		echo $single->profile_pic;
																																	} ?>">

											<input type="hidden" class="form-control" id="id" name="id" value="<?php if (!empty($single)) {
																													echo $single->id;
																												} ?>">

											<input type="hidden" class="form-control" id="email_val" name="email_val" value="0">

											<input type="hidden" class="form-control" id="contact_number_val" name="contact_number_val" value="0">

										</div>

									</div>


									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputConfirmPassword1">Password <?php if (empty($single)) { ?> *<?php } ?></label>
											<input type="password" class="form-control" id="add_password" name="add_password" placeholder="Add Password" value="">
										</div>
									</div>

								</div>
								<button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
							</form>

						</div>

					</div>

				</div>



			</div>

		</div>



		<?php include('footer.php');

		$id = 0;

		if ($this->uri->segment(2) != "") {

			$id = $this->uri->segment(2);
		}

		?>

		<script>
			$(document).ready(function() {

				jQuery.validator.addMethod("validate_email", function(value, element) {

					if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

						return true;

					} else {

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

							equalTo: "#new_password",

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

					errorPlacement: function(error, element) {

						error.addClass('invalid-feedback');

						element.closest('.form-group').append(error);

					},

					highlight: function(element, errorClass, validClass) {

						$(element).addClass('is-invalid');

					},

					unhighlight: function(element, errorClass, validClass) {

						$(element).removeClass('is-invalid');

					}

				});

				$('#single_form').validate({
					ignore: ":hidden:not(select)",
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

							// number: true,

							minlength: 10,

							maxlength: 12,

						},

						alternate_number: {
							// required: true,
							// number: true,

							minlength: 10,

							maxlength: 12,

						},

						email: {

							required: true,

							validate_email: true,

						},

						dob: {

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

						join_date: {

							required: true,

						},

						// 		exit_date: {

						// 			required: true,

						// 			},

						<?php if (empty($single)) { ?>
							add_password: {

								required: true,

							},
						<?php } ?>

					},

					messages: {

						name_prefix: {

							required: "Please select your name prefix ",

						},

						designation: {

							required: "Please select your designation",

						},

						first_name: {

							required: "Please enter your first name",

						},

						last_name: {

							required: "Please enter your last name",

						},

						contact_number: {

							required: "Please enter contact number",

							// number: "Please enter valid contact number",

							minlength: "Please enter 10 or 12 digit contact number",

							maxlength: "Please enter 10 or 12 digit contact number",

						},

						alternate_number: {
							// required: "Please enter alternate number",

							// number: "Please enter valid alternate number",

							minlength: "Please enter 10 or 12 digit alternate number",

							maxlength: "Please enter 10 or 12 digit alternate number",

						},

						email: {

							required: "Please enter email",

							validate_email: "Please enter valid email",

						},

						dob: {

							required: "Please select date of birth",

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



						// 		exit_date: {

						// 			required: "Please select exit date",

						// 			},

						<?php if (empty($single)) { ?>
							add_password: {

								required: "Please Enter Password",

							},
						<?php } ?>

					},

					errorElement: 'span',

					errorPlacement: function(error, element) {

						error.addClass('invalid-feedback');

						element.closest('.form-group').append(error);

					},

					highlight: function(element, errorClass, validClass) {

						$(element).addClass('is-invalid');

					},

					unhighlight: function(element, errorClass, validClass) {

						$(element).removeClass('is-invalid');

					}

				});

			});

			$("#country").change(function() {

				$.ajax({

					type: "POST",

					url: "<?= base_url(); ?>admin/Ajax_controller/get_state_ajax",

					data: {
						'country': $("#country").val()
					},

					success: function(data) {

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

			$("#state").change(function() {

				$.ajax({

					type: "POST",

					url: "<?= base_url(); ?>admin/Ajax_controller/get_city_ajax",

					data: {
						'state': $("#state").val()
					},

					success: function(data) {

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

			$("#email").keyup(function() {

				$.ajax({

					type: "POST",

					url: "<?= base_url(); ?>admin/Ajax_controller/get_emp_unique_email",

					data: {
						'email': $("#email").val(),
						'id': '<?= $id ?>'
					},

					success: function(data) {

						$("#email_val").val(data);

						check_avaliable();

					},

					error: function(jqXHR, textStatus, errorThrown) {

						console.log(textStatus, errorThrown);

					}

				});

			});

			$("#contact_number").keyup(function() {

				$.ajax({

					type: "POST",

					url: "<?= base_url(); ?>admin/Ajax_controller/get_emp_unique_contact_number",

					data: {
						'contact_number': $("#contact_number").val(),
						'id': '<?= $id ?>'
					},

					success: function(data) {

						$("#contact_number_val").val(data);

						check_avaliable();

					},

					error: function(jqXHR, textStatus, errorThrown) {

						console.log(textStatus, errorThrown);

					}

				});

			});

			function check_avaliable() {

				if ($("#email_val").val() != "0") {

					$("#email_error").html("This email is already used, please try another.");

				} else {

					$("#email_error").html("");

				}

				if ($("#contact_number_val").val() != "0") {

					$("#contact_number_error").html("This contact number is already used, please try another.");

				} else {

					$("#contact_number_error").html("");

				}

				if ($("#contact_number_val").val() == "0" && $("#email_val").val() == "0") {

					$("#single_button").show();

				} else {

					// $("#single_button").hide();

				}

			}

			$(function() {

				$(".datepicker").datepicker({

					dateFormat: "dd-mm-yy",

					changeMonth: true,

					changeYear: true,

					/*maxDate: "-12Y",

					minDate: "-80Y",

					yearRange: "-100:-0"*/

				});

			});



			$('#image-id').change(function() {

				// alert("hello");

				var ext = this.value.match(/\.(.+)$/)[1];

				switch (ext) {

					case 'jpg':

					case 'jpeg':

					case 'png':

						// $('#btn_save').attr('disabled', false);

						break;

					default:

						alert('Only jpg,jpeg,png file supported');

						this.value = '';

				}

			});


			$('#country').on('change', function() {
				$('#country').valid();
			});

			$('#state').on('change', function() {
				$('#state').valid();
			});

			$('#city').on('change', function() {
				$('#city').valid();
			});

			$('#name_prefix').on('change', function() {
				$('#name_prefix').valid();
			});

			$('#designation').on('change', function() {
				$('#designation').valid();
			});
		</script>