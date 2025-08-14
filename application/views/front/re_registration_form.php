<?php include('header.php')?>

	<!-- Start Page Title Area -->

		<div class="page-title-area bg-27">

			<div class="container">

				<div class="page-title-content">

					<h2>Re-registration Form</h2>



					<ul>

						<li>

							<a href="<?=base_url()?>">

								Home 

							</a>

						</li>

						<li class="active">Admission</li>

						<li class="active">Re-registration Form</li>

					</ul>

				</div>

			</div>

		</div>

		<!-- End Page Title Area -->



		<!-- Start Candidates Resume Area -->

		<section class="candidates-resume-area ptb-100">

			<div class="container">

		

				<div class="candidates-resume-content col-sm-12">

		

							<?php if (empty($student)) { ?>

                            <form class="reregistration-form" active="" method="post" enctype="multipart/form-data" name="re_registration_form" id="re_registration_form">



								<div class="row">



									<div class="col-md-12">



										<div class="personal_details">



											<h3>Enrollment Verification</h3>	



											<small>Please provide your enrollment number</small>



											<!-- <hr> -->



										</div>



									</div>



								</div>

                                <br>

                                <div class="form-group">



                                    <label><b>Enter Your Enrollment Number</b><span class="req">*</span></label>



                                    <input type="text" name="enrollment_number" id="enrollment_number" required class="form-control new_control" placeholder="Enter Your Enrollment Number">



                                    </div>

                                    <br>



                                <div class="form-group">

									<label><b>Enter Your Date of Birth</b><span class="req">*</span></label>

									<input type="text" autocomplete="off" name="date_of_birth" id="date_of_birth" required class="form-control datepicker new_control" placeholder="Enter Your Date of Birth">

                                </div>

                                <br>



                                <div class="form-group">

                                    <div class=" mt-4">

                                            <!-- <a href="javascript:void(0);" class="default-btn2">Next

                                                <i class="ri-arrow-right-line"></i>

                                            </a> -->

											<button class="default-btn2" type="submit" class="apply-now" name="next" id="next" value="next">Next

                                                <i class="ri-arrow-right-line"></i>

                                            </button>

                                    </div>

							</div>

                                <!-- <div class="pull-right"> -->



                                

							</form>

							</div>

							

							</div>

							</div>

							</div>

							</div>

							<?php }else{?>

				<div class="admission_div container">

					

					<form class="resume-info" method="post" name="admission_form" id="admission_form" enctype="multipart/form-data" onsubmit="return validateForm();">

						<div class="row">								

							<h3>Personal Details</h3>

							<p><small>Please provide your personal details</small></p>					

						</div>	

					

						<div class="row">

							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Student Name <span class="req">*</span></label>

									<input class="form-control" type="text" name="student_name" id="student_name" readonly value="<?php if (!empty($student)) { echo $student->student_name;} ?>">

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Father's Name <span class="req">*</span></label>

									<input type="text" class="form-control" name="father_name" id="father_name" readonly value="<?php if (!empty($student)) { echo $student->father_name;} ?>">

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Mother's Name <span class="req">*</span></label>

									<input type="text" class="form-control" name="mother_name" id="mother_name" readonly value="<?php if (!empty($student)) { echo $student->mother_name;} ?>">

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Date of Birth <span class="req">*</span></label>

									<div class="input-group date" id="datetimepicker">

										<input type="text" class="form-control" name="date_of_birth" id="date_of_birth" autocomplete="off" placeholder="DD-MM-YY" readonly value="<?php if (!empty($student)) { echo date("d/m/Y", strtotime($student->date_of_birth));} ?>">

										<span class="input-group-addon"></span>

										<i class="bx bx-calendar"></i>

									</div>	

								</div>

							</div>

						</div>



						<div class="row">

							<div class="col-md-12">

								<div class="common_details">

									<div class="col-md-12">

									<h3>Course/Programme Details</h3>

									<p><small>Please enter course/programme details</small></p>

									</div>

									<div class="clearfix"></div>

								</div>

							</div>

						</div>	

						<div class="row">

							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Session <span class="req">*</span></label>

									<input class="form-control" type="text" name="session" id="session" readonly value="<?php if (!empty($student)) {echo $student->session_name;} ?>">

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Course <span class="req">*</span></label>

									<input type="text" class="form-control" name="course_name" id="course_name" readonly value="<?php if (!empty($student)) {echo $student->print_name;} ?>">

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

								<div class="form-group">

									<label>Stream <span class="req">*</span></label>

									<input type="text" class="form-control" name="stream_name" id="stream_name" readonly value="<?php if (!empty($student)) {echo $student->stream_name;} ?>">

								</div>

							</div>



							<div class="col-lg-3 col-md-3">

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



						<div class="row">

							<div class="col-md-12 edu mb-3">

								<strong>Captcha <span class="req">*</span></strong>

							</div>

							<div class="col-lg-6 col-md-6">

								<div class="form-group"> 

									<div class="g-recaptcha" data-sitekey="<?=GOOGLE_DATA_SITEKEY?>"></div> 

								</div>

							</div>  

						</div>





						<div class="row">

							<div class="col-md-12 edu">

								<div class="form-group">

									<label></label>

									<button type="submit" class="default-btn2" name="register" id="register">Next</button>

									<div class="pull-right">

									</div>

								</div>

							</div>

						</div>



						</form>

						</div>

						<?php }?>



                        </div>

						</div>

					</div>

				</div>

			</div>

		</section>

		<!-- End Costing Area -->



		<!--------------------------------------   CROPING TOOL   ----------------------------------------------->

 





		<?php include('footer.php')?>





		<script>

	$(document).ready(function(){ 

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

            

$.validator.addMethod("noSpaceatfirst", function (value, element) {
	return this.optional(element) || /^\s/.test(value) === false;
}, "First Letter Can't Be Space!");

$('#re_registration_form').validate({

	ignore: [],

    rules: {

        enrollment_number: {

            required: true,   
			noSpaceatfirst:true,
			number:true,
        },

		date_of_birth: {

            required: true,   

        },

    },

    messages: {

        enrollment_number: {
            required: "Please enter enrollment number",
			noSpaceatfirst:"First letter can't be space",
			number:"Please enter valid enrollment number",
        },

		date_of_birth: {

            required: "Please select date of birth",

        },

    },

    submitHandler: function (form) {

        form.submit();

    },

});

});

</script>



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

				format: 'dd-mm-yyyy',

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

            required: "Please enter Full name",

            noHTMLtags: "HTML tags not allowed",

        },

        father_name: {

            required: "Please enter father name",

            noHTMLtags: "HTML tags not allowed",

        },

        mother_name: {

            required: "Please enter mother name",

            noHTMLtags: "HTML tags not allowed",

        },

        date_of_birth: {

            required: "Please select date of birth",

            noHTMLtags: "HTML tags not allowed",

        },

        year_sem: {

            required: "Please select year/sem Name",

            noHTMLtags: "HTML tags not allowed",

        },

        payment_mode: {

            required: "Please select payment mode",

            noHTMLtags: "HTML tags not allowed",

        },

        'subject[]': {

            required: "Please select subject",

            minlength: "Please select subject",

            noHTMLtags: "HTML tags not allowed",

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



    $("#payment_mode").change(function() {

        if ($(this).val() == "2") {

            $("#bank_div").show();

        } else {

            $("#bank_div").hide();

        }

    });

});





</script>



<script>

document.getElementById('date_of_birth').addEventListener('input', function() {

    // Get the entered value

    var inputValue = this.value;



    // Remove non-numeric characters

    var numericValue = inputValue.replace(/\D/g, '');



    // Update the input value with numeric characters only

    this.value = numericValue;

});

</script>



<script>

	function validateForm() {

		// Check if the reCAPTCHA checkbox is checked

		var recaptchaResponse = grecaptcha.getResponse();

		

		if (recaptchaResponse.length === 0) {

			// If not checked, display an error message

			alert("Please complete the captcha!");

			return false;

		}



		// Proceed with form submission

		return true;

	}

</script>