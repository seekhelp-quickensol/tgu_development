<?php include('header.php'); ?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header custom-header">
                            <h4 class="card-title">Add Progress Report</h4>
                        </div>
                        <div class="card-body"> <?php if ($this->uri->segment(2) == "") { ?>
                                <p class="card-description">Please enter Enrollment number</p>
                                <form class="forms-sample" name="enroll_verify" id="enroll_verify" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Enrollment Number*</label>
                                        <input type="text" class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enter Enrollment Number" value="">
                                    </div>
                                    <button type="submit" id="save_btn" name="next" value="next" class="btn btn-primary mr-2">Next</button>
                                </form> <?php } else { ?> <p class="card-description">Please upload Progress report <a href="<?= base_url(); ?>add_progress_report" class="pull-right">Go to Back</a></p>
                                <form class="forms-sample" name="progress_report_form" id="progress_report_form" method="post" enctype="multipart/form-data">
                                    <div class="form-group"> <label for="exampleInputUsername1">Report No*</label> <select class="form-control" id="report_no" name="report_no">
                                            <option value="">Select Report</option>
                                            <option value="1">Report One</option>
                                            <option value="2">Report Two</option>
                                            <option value="3">Report Three</option>
                                            <option value="4">Report Four</option>
                                            <option value="5">Report Five</option>
                                            <option value="6">Report Six</option>
                                        </select> <input type="hidden" class="form-control" id="student_id" name="student_id" value="<?= $this->uri->segment(2) ?>"> </div>
                                    <div class="form-group"> <label for="exampleInputUsername1">upload Report*</label> <input type="file" class="form-control" id="userfile" name="userfile"> </div> <button type="submit" id="save_btn" name="upload" value="upload" class="btn btn-primary mr-2">Upload</button>
                                </form> <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
<script>
    $(document).ready(function() {
        jQuery.validator.addMethod("validate_email", function(value, element) {
            if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
                return true;
            } else {
                return false;
            }
        }, "Please enter a valid Email.");
        $('#enroll_verify').validate({
            rules: {
                enrollment_number: {
                    required: true,
                },
            },
            messages: {
                enrollment_number: {
                    required: "Please enter enrollment number",
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
        $('#progress_report_form').validate({
            rules: {
                report_no: {
                    required: true,
                },
                userfile: {
                    required: true,
                },
            },
            messages: {
                report_no: {
                    required: "Please select report number",
                },
                userfile: {
                    required: "Please upload report file",
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
    });
</script>