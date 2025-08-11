<?php include('header.php');
$university_details = $this->Setting_model->get_university_details();


?>


<!-- Start Page Title Area -->
<div class="page-title-area bg-16">
    <div class="container">
        <div class="page-title-content">
            <h2>RTI/Grievances</h2>

            <ul>
                <li>
                    <a href="<?= base_url() ?>">
                        Home
                    </a>
                </li>

                <li class="active">RTI/Grievances</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Product Details Area -->
<section class="product-details-area ptb-90">
    <div class="container">
        <div class="row align-items-center">


            <div class="col-lg-12 col-md-12">
                <div class="tab product-details-tab">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <ul class="tabs">
                                <li>
                                    Whom to approach?
                                </li>
                                <li>
                                    About
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="tab_content">
                                <div class="tabs_item">
                                    <div class="product-details-tab-content">
                                        <h3>Whom to approach?</h3>
                                        <small>In Case of any such incident, Kindly make contact on (Mob. <?php if (!empty($university_details)) {
                                                                                                                echo $university_details->contact_number;
                                                                                                            } ?>) and register a Complaint or Register it Online Here.</small>
                                    </div>
                                    <!-- <d class="admission_box"> -->

                                    <div class="candidates-resume-content">
                                        <form class="resume-info" method="post" name="gbd_form" id="gbd_form" enctype="multipart/form-data" onsubmit="return validateForm();">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Student / Teacher / Non-Teaching Staff/Others <span class="req">*</span></label>
                                                        <select name="student_teacher" id="student_teacher" autocomplete="off" class="form-control charector">
                                                            <option value="">Please Select</option>
                                                            <option value="Student">Student</option>
                                                            <option value="Teacher">Teacher</option>
                                                            <option value="Non-Teaching Staff">Non-Teaching Staff</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4" id="enrollment_div" style="display:none">
                                                    <div class="form-group">
                                                        <label id="enrollment_label">Enrollment Number <span class="req">*</span></label>
                                                        <input type="text" name="enrollment_number" id="enrollment_number" class="form-control" placeholder="Please enter your enrollment number">
                                                    </div>
                                                    <label id="employee-error" class="error" for="employee" style="display: none;"></label>

                                                </div>
                                                <div class="col-lg-4 col-md-4" id="added_by" style="display:none">
                                                    <div class="form-group">
                                                        <label>Your Name <span class="req">*</span></label>
                                                        <input type="text" name="added_by_name" id="added_by_name" class="form-control" placeholder="Your Name">
                                                    </div>
                                                    <label id="added_by_name-error" class="error" for="added_by_name" style="display: none;"></label>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label id="fisrt_name_label">First Name </label>

                                                        <input type="text" name="first_name" id="first_name" class="form-control charector" placeholder="First Name">

                                                    </div>

                                                </div>

                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label id="last_name_label">Last Name</label>
                                                        <input type="text" name="last_name" id="last_name" class="form-control charector" placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Address <span class="req">*</span></label>
                                                        <input type="text" name="address" id="address" class="form-control charector" placeholder="Address">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>City <span class="req">*</span></label>
                                                        <input type="text" name="city" id="city" class="form-control charector" placeholder="City">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Pincode <span class="req">*</span></label>
                                                        <input type="text" name="pincode" id="pincode" class="form-control charector" placeholder="Pincode">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Gender <span class="req">*</span></label>
                                                        <select name="gender" id="gender" class="form-control charector">
                                                            <option value="">Please Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Phone or Mobile <span class="req">*</span></label>
                                                        <input type="text" name="mobile_number" id="mobile_number" class="form-control charector" placeholder="Phone / Mobile Number">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Email Address <span class="req">*</span></label>
                                                        <input type="email" name="email" id="email" class="form-control charector" placeholder="Email Address">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Upload file <small>(if any)</small> <span class="req">*</span></label>
                                                        <input type="file" name="userfile" id="userfile" class="form-control" accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label>Complaint <span class="req">*</span></label>
                                                        <textarea name="complaint" id="complaint" class="form-control charector" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <div class="g-recaptcha" data-sitekey="<?= GOOGLE_DATA_SITEKEY ?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label></label>
                                                        <button type="submit" class="btn btn-primary" name="register" id="register">Register Complaint</button>
                                                        <div class="pull-right">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                                <div class="tabs_item">
                                    <div class="product-details-tab-content">
                                        <h3>About</h3>
                                        <small>In Case of any such incident, Kindly make contact on (Mob. +91-7042550366) and register a Complaint or Register it Online Here.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Details Area -->
<?php include('footer.php'); ?>


<script>
    $("#student_teacher").change(function() {
        var enrollmentNumberField = $('#enrollment_number');
        var enrollmentNumberRule = $('#gbd_form').validate().settings.rules.enrollment_number;
        if ($(this).val() == "Student") {
            enrollmentNumberField.rules('add', enrollmentNumberRule);

            $('#enrollment_label').text('Enrollment Number *');
            $("#enrollment_div").show();
            $("#added_by").hide();
            $("#fisrt_name_label").html("First Name");
            $("#last_name_label").html("Last Name");
        } else {
            $("#enrollment_div").hide();
            $("#added_by").hide();
            $("#fisrt_name_label").html("First Name");
            $("#last_name_label").html("Last Name");
        }
        if ($(this).val() === "Others") {
            enrollmentNumberField.rules('remove', 'required');
            $('#enrollment_label').text('Enrollment Number');
            $("#enrollment_div").show();
            $("#added_by").show();
            $("#fisrt_name_label").html("Student First Name");
            $("#last_name_label").html("Student Last Name");
        }
        /*$("#student_teacher").change(function(){
        	window.location.href="<?= base_url(); ?>caste-based-discrimination";
        });*/
        // $('#admission_form').valid();
    });



    jQuery.validator.addMethod("validate_email", function(value, element) {

        if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

            return true;

        } else {

            return false;

        }

    }, "Please enter a valid Email.");

    $('#gbd_form').validate({

        rules: {

            student_teacher: {
                required: true,
            },
            enrollment_number: {
                required: function(element) {
                    return $('#student_teacher').val() === 'Student';
                },
            },
            /*first_name: { 
            	required: true, 
            },*/
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            pincode: {
                required: true,
                number: true,
            },
            gender: {
                required: true,
            },
            mobile_number: {
                required: true,
                // 			number: true, 
                // 			minlength: 10, 
                // 			maxlength: 10, 
            },
            email: {
                required: true,
                validate_email: true,
            },
            complaint: {
                required: true,
            },

        },
        messages: {
            enrollment_number: {
                required: "Please enter enrollment number.",
            },
            /*first_name: { 
            	required: "Please enter first name.", 
            },*/
            address: {
                required: "Please enter address.",
            },
            city: {
                required: "Please enter city.",
            },
            pincode: {
                required: "Please enter pincode.",
                number: "Only number allowed.",
            },
            gender: {
                required: "Please select gender.",
            },
            student_teacher: {
                required: "Please select.",
            },
            mobile_number: {
                required: "Please enter mobile number.",
                // 			number: "Only number allowed.", 
                // 			minlength: "Minimum 10 digit required.", 
                // 			maxlength: "Maximum 10 digit allowed.", 
            },
            email: {
                required: "Please enter email.",
                validate_email: "Please enter valid email.",
            },
            complaint: {
                required: "Please enter your complaint.",
            },

        },
        submitHandler: function(form) {
            $('#added_by_name-error').text('');
            $('#added_by_name-error').hide();
            $('#employee-error').text('');
            $('#employee-error').hide();

            if ($('#student_teacher').val() == 'Student') {
                if ($('#enrollment_number').val() == '') {
                    $('#employee-error').text('Please enter enrollment no!');
                    $('#employee-error').show();
                } else {
                    $('#employee-error').text('');
                    $('#employee-error').hide();
                    form.submit();
                }
            } else if ($('#student_teacher').val() == 'Others') {
                if ($('#added_by_name').val() == '') {
                    $('#added_by_name-error').text('Please enter your name!');
                    $('#added_by_name-error').show();
                } else {
                    $('#added_by_name-error').text('');
                    $('#added_by_name-error').hide();
                    form.submit();
                }
            } else {
                $('#employee-error').text('');
                $('#employee-error').hide();
                $('#added_by_name-error').text('');
                $('#added_by_name-error').hide();
                form.submit();
            }
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


    $("#enrollment_number").keyup(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url(); ?>web/Web_controller/get_student_data_ajax_new",
            data: {
                'enrollment_number': $("#enrollment_number").val()
            },
            // print_r(data);exit;
            success: function(data) {
                var opts = $.parseJSON(data);
                if (opts) {
                    var split_name = opts['student_name'].split(" ");
                    $("#first_name").val(split_name[0]);
                    $("#last_name").val(split_name[1]);
                } else {
                    $("#first_name").val('');
                    $("#last_name").val('');
                    $("#address").val('');
                    $("#city").val('');
                    $("#pincode").val('');
                    $("#mobile_number").val('');
                    $("#email").val('');
                    $("#gender").html("<option value''>Select Gender</option><option value'Male'>Male</option><option value'Female'>Female</option>");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }

        });
    });
</script>

<script>
    function validateForm() {
        var recaptchaResponse = grecaptcha.getResponse();
        if (recaptchaResponse.length === 0) {
            alert("Please complete the captcha!");
            return false;
        }
        return true;
    }
</script>