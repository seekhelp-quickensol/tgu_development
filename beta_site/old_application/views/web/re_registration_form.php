<?php include("header.php"); ?>

<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/croppie.css">
<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td,
	th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #dddddd;
	}
</style>
<section>
	<div class="header_cc_area slide-bg ">
		<div class="container overlay-about" style="width: 100%;">
			<p>Admission / Re-registration Form</p>

			<div class=" container-fluid text-center inner-heading-content">
				<h2 class="main-heading-inner-pages border-b border">
					Re-registration Form

				</h2>
				<p> We believe in providing education that cultivates creative understanding </p>
			</div>



		</div>
	</div>
</section>
<section class="c-padding inner-bg-2">
<div class="uni_mainWrapper container box-shadow-global">



		
				<div class="online_wrapper">

					<?php if (empty($student)) { ?>
						<div class="main_div">
							<div class="col-md-12"><h2 class="title">Enrollment Verification</h2>
								<form method="post" name="verification_form" id="verification_form" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="personal_details">
												<small>Please provide your enrollment number</small>
												<hr>
											</div>
										</div>
									</div>
									<div class="row edu">
										<div class="col-md-12">
											<div class="form-group">
												<label>Enter Your Enrollment Number<span class="req">*</span></label>
												<input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter Your Your Enrollment Number">
											</div>
										</div>
									</div>
									<div class="row edu">
										<div class="col-md-12">
											<div class="form-group">
												<label>Enter Your Date of Birth<span class="req">*</span></label>
												<input type="text" autocomplete="off" name="date_of_birth" id="date_of_birth" required class="form-control datepicker" placeholder="Enter Your Your Date of Birth">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-12 edu">
											<div class="form-group">
												<label></label>
												<button type="submit" class="apply-now" name="next" id="next" value="next">Next</button>
												<div class="pull-right">
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
					<?php } else { ?>
						<div class="admission_div">
							<form method="post" name="admission_form" id="admission_form" enctype="multipart/form-data">


								<div class="row">
									<div class="col-md-12">
										<div class="common_details">
											<div class="col-md-12">
												<h3>Personal Details</h3>
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
												<label>Student Name <span class="req">*</span></label>
												<input type="text" name="student_name" id="student_name" readonly class="form-control charector" placeholder="Student Full Name" value="<?php if (!empty($student)) {
																																															echo $student->student_name;
																																														} ?>">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Father's Name <span class="req">*</span></label>
												<input type="text" name="father_name" id="father_name" readonly class="form-control charector" placeholder="Fathers Name" value="<?php if (!empty($student)) {
																																														echo $student->father_name;
																																													} ?>">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Mother's Name <span class="req">*</span></label>
												<input type="text" name="mother_name" id="mother_name" readonly class="form-control charector" placeholder="Mothers Name" value="<?php if (!empty($student)) {
																																														echo $student->mother_name;
																																													} ?>">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Date of Birth <span class="req">*</span></label>
												<input type="text" name="date_of_birth" id="date_of_birth" readonly class="form-control" placeholder="DD-MM-YY" value="<?php if (!empty($student)) {
																																											echo date("d/m/Y", strtotime($student->date_of_birth));
																																										} ?>">
											</div>
										</div>
									</div>
								</div>




								<div class="common_details">
									<div class="col-md-12">
										<h3>Course/Programme Details</h3>
										<small>Please enter course/programme details</small>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="edu">
											<div class="col-sm-3">
												<div class="form-group">
													<label>Session<span class="req">*</span></label>
													<input type="text" readonly id="session" name="session" class="form-control" value="<?php if (!empty($student)) {
																																			echo $student->session_name;
																																		} ?>">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>Course<span class="req">*</span></label>
													<input type="text" readonly id="course_name" name="course_name" class="form-control" value="<?php if (!empty($student)) {
																																					echo $student->print_name;
																																				} ?>">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>Stream <span class="req">*</span></label>
													<input type="text" readonly id="stream_name" name="stream_name" class="form-control" value="<?php if (!empty($student)) {
																																					echo $student->stream_name;
																																				} ?>">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>Semester/Year <span class="req">*</span></label>
													<select id="year_sem" name="year_sem" class="form-control">
														<option value="<?= $student->year_sem + 1 ?>"><?= $student->year_sem + 1 ?></option>
													</select>
												</div>
											</div>

											<div class="col-sm-3" id="bank_div" style="display:none">
												<div class="form-group">
													<label>Bank</label>
													<select id="bank" name="bank" class="form-control">
														<option value="">Select Bank</option>
														<?php if (!empty($bank)) {
															foreach ($bank as $bank_result) { ?>
																<option value="<?= $bank_result->id ?>"><?= $bank_result->bank_name ?></option>
														<?php }
														} ?>
													</select>
												</div>
											</div>

										</div>


									</div>
								</div>
						</div>
						
						<?php /* ?>
							<div class="common_details">
								<div class="col-md-12">
									<h3>Payment Details</h3>
									<small>Pay fees in university account only other accounts fees will not be accept</small>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php 
							<div class="row">
								<div class="col-md-12">
									<div class="col-sm-3">
										<div class="form-group">
											<label>Late Fees <span class="req">*</span></label>
											<input placeholder="Late Fees" type="text" id="late_fees" name="late_fees" class="form-control" value="0" readonly>
										</div>				
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Examination Fees <span class="req">*</span></label>
											<input placeholder="Examination Fees" type="text" id="examination_fees" name="examination_fees" class="form-control" value="1000" readonly>
										</div>				
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Total Examination Fees <span class="req">*</span></label>
											<input placeholder="Total Examination Fees" type="text" id="total_examination_fees" name="total_examination_fees" class="form-control" value="1000" readonly>
										</div>				
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Payment Mode <span class="req">*</span></label>
											<select id="payment_mode" name="payment_mode" class="form-control">
												<option value="">Select Payment Mode</option>
												<option value="1">Online</option>
												<option value="3">Cash</option>
												<!--<option value="2">By Challan</option>
												-->
											</select>
										</div>				
									</div>
									*/ ?>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12 edu">
									<div class="form-group">
										<!--<input type="checkbox" name="mycheckbox" id="mycheckbox" value="0" required="required" /> <label style="color:red">I Agree to the declaration<span class="req">*</span></label>-->
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 edu">
									<strong>Captcha <span class="req">*</span></strong>
								</div>
								<div class="col-md-6 edu">
									<div class="form-group">
										<?php
										if (base_url() == "https://www.birtikendrajituniversity.com/") {
										?>
											<div class="g-recaptcha" data-sitekey="6LfinagZAAAAAKe-UpfD2RCOoBSC-lec5DcClqY1"></div>
										<?php } else { ?>
											<div class="g-recaptcha" data-sitekey="6Ld04bQZAAAAAESEZ2t9Z8jge9k860wPt59Pcwus"></div>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 edu">
									<div class="form-group">
										<label></label>
										<button type="submit" class="btn btn-primary" name="register" id="register">Next</button>
										<div class="pull-right">

										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
			<hr>

			<div class="col-md-12">
				<div class="row collapseOne" style="display:none">
					<div class="col-md-12 terms">
						<table class="detailTable" cellspacing="5" cellpadding="5">
							<tr>
								<td>
									<h4 align="justify"><b>Declaration:</b></h4>
									<br>
								</td>
							</tr>
						</table>
					</div>
				</div>

				<?php /*<div class="row">
									<div class="col-md-12 terms">
										<table  class="detailTable" cellspacing="5" cellpadding="5">
											<tr>
												<td>
													<br>
													<b>Declaration:</b>
													<br>
													<p align="justify"><b>I confirm that I have not made payment of any other amount to anybody other than deposited in the prescribed University account.</b></p>
													<p align="justify"><b>I solemnly declare and confirm that I am duly qualified to take admission in the course for which I have applied and all the certificates and testimonials attached with my application are true and valid. I have fully satisfied myself about the legal status of the University i.e. it is an autonomous statutory body with regulations making power for it's functioning and the University is duly authorized and competent to take my admission in the course for which I have applied and also to award the degree / diploma as per rules and regulation of the University. I also undertake not to ever raise any objection about Universities legal status to take my admission and award degrees on qualifying prescribed examinations. I also undertake not to demand refund of fee/charges paid by me. In case of any dispute/differences/claim of any value settlement by University arbitration clause shall be applicable.</b></p>
													<p align="justify"><b>I shall always follow the rules and regulations of the University and in case of any breach thereto, I shall be liable to be penalized for the same which may include expulsion from the University.</b></p>
													<br>
													<p align="justify">As per law and legal opinion University is empowered by authority of law to award degree's, diplomas, & certificate in all course of Education, there being no requirement to take approval from any other authorities all certificate degrees diplomas certificate awarded by University are Sui - generis valid in law and degree/diploma/certificate holders are automatically entitled to be recognised for government jobs and for Registration with all Professional Council. For Legal opinion and relevent laws and Court Judgments Visit University website.</p>
													
												</td>
											</tr>
										</table>
									</div>	*/ ?>
			</div>
			<hr>
		</div>
		</form>
		<div class="clearfix"></div>
	</div>
<?php } ?>
</div>
</section>



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

<?php include("footer.php"); ?>

<script>
	$("#fees_option").change(function() {
		var admission_fees = $("#admission_fees").val();
		admission_fees = admission_fees / 2;
		var total = parseInt($("#late_fees").val()) + parseInt(admission_fees);
		$("#total_admission_fees").val(total);

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
	$(function() {
		$(".datepicker").datepicker({
			dateFormat: "dd-mm-yy",
			changeMonth: true,
			changeYear: true,
			maxDate: "-18Y",
			minDate: "-80Y",
			yearRange: "-100:-0"
		});
	});

	jQuery.validator.addMethod("subject", function(value, elem, param) {
		return $(".subject:checkbox:checked").length > 0;
	}, "You must select at least one!");
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		} else {
			return false;
		}
	}, "Please enter a valid Email.");

	jQuery.validator.addMethod("noHTMLtags", function(value, element) {
		if (this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)) {
			if (value == "") {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}
	}, "HTML tags are Not allowed.");

	$("#verification_form").validate({
		ignore: [],
		rules: {
			enrollment_number: {
				required: true,
				noHTMLtags: true,
			},
			date_of_birth: {
				required: true,
				noHTMLtags: true,
			},
		},
		messages: {
			enrollment_number: {
				required: "Please enter enrollment number!",
				noHTMLtags: "HTML tags not allowed!",
			},
			date_of_birth: {
				required: "Please enter date of birth!",
				noHTMLtags: "HTML tags not allowed!",
			},
		},
		submitHandler: function(form) {
			form.submit();
		}
	});

	$("#admission_form").validate({
		ignore: [],
		rules: {
			student_name: {
				required: true,
				noHTMLtags: true,
			},
			father_name: {
				required: true,
				noHTMLtags: true,
			},
			mother_name: {
				required: true,
				noHTMLtags: true,
			},
			date_of_birth: {
				required: true,
				noHTMLtags: true,
			},
			year_sem: {
				required: true,
				noHTMLtags: true,
			},
			payment_mode: {
				required: true,
				noHTMLtags: true,
			},
			'subject[]': {
				required: true,
				minlength: 1,
				noHTMLtags: true,
			},
		},
		messages: {
			student_name: {
				required: "Please enter Full name!",
				noHTMLtags: "HTML tags not allowed!",
			},
			father_name: {
				required: "Please enter father name!",
				noHTMLtags: "HTML tags not allowed!",
			},
			mother_name: {
				required: "Please enter mother name!",
				noHTMLtags: "HTML tags not allowed!",
			},
			date_of_birth: {
				required: "Please select date of birth!",
				noHTMLtags: "HTML tags not allowed!",
			},
			year_sem: {
				required: "Please select year/sem Name!",
				noHTMLtags: "HTML tags not allowed!",
			},
			payment_mode: {
				required: "Please select payment mode!",
				noHTMLtags: "HTML tags not allowed!",
			},
			'subject[]': {
				required: "Please select subject!",
				minlength: "Please select subject!",
				noHTMLtags: "HTML tags not allowed!",
			},
		},
		submitHandler: function(form) {
			form.submit();
		}
	});
	$(document).ready(function() {
		$image_crop = $('#profile_image_data').croppie({
			enableExif: true,
			viewport: {
				width: 200,
				height: 200,
				type: 'square' //circle
			},
			boundary: {
				width: 300,
				height: 300
			}
		});

		$('#userfile').on('change', function(e) {
			var reader = new FileReader();
			reader.onload = function(event) {
				$image_crop.croppie('bind', {
					url: event.target.result
				}).then(function() {
					console.log('jQuery bind complete');
				});
			}
			reader.readAsDataURL(this.files[0]);
			$('#uploadimageModal').modal('show');
		});

		$('.crop_image').click(function(event) {
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {
				$.ajax({
					url: "<?= base_url(); ?>update_pic_photo.php",
					type: "POST",
					data: {
						"image": response
					},
					success: function(data) {
						$("#hidden_image").val(data);

					}
				});
			})
		});
	});
	$("#payment_mode").change(function() {
		if ($(this).val() == "2") {
			$("#bank_div").show();
		} else {
			$("#bank_div").hide();
		}
	});
</script>