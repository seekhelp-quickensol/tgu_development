<?php include('header.php')?>

<!-- <div class="page-title-area bg-14">
			<div class="container">
				<div class="page-title-content">
					<h2>Result</h2>

					<ul>
						<li>
							<a href="javascript:void(0);">
                            Examination 
							</a>
						</li>

						<li class="active">Result</li>
					</ul>
				</div>
			</div>
		</div>
		
		<section class="costing-area pt-100 pb-70">
			<div class="container">
				<div class="row justify-content-center align-items-center">
					
					<div class="col-lg-6 col-md-6">
						
                        <div class="single-costing-card">
                        <div class="admission_box">
						
                            <form class="view-time-table-form">

								<div class="row">

									<div class="col-md-12">

										<div class="personal_details">

											<h3>Download Result</h3>	

											<small>Please provide your details</small>

											

										</div>

									</div>

								</div>
                                <br>
                                <div class="form-group">

                                    <label><b>Course</b><span class="req">*</span></label>

                                    <select class="form-control" name="course_name" id="course_name">
                                        <option value="">Select Course</option>	
                                        <option value="Web Design" <?php if(!empty($student) && $student->course_name == 'Web Design'){?> selected="selected" <?php }?>>Web Design</option>
                                        <option value="Web Developement" <?php if(!empty($student) && $student->course_name == 'Web Developement'){?> selected="selected" <?php }?>>Web Developement</option>
                                        <option value="Graphic Design" <?php if(!empty($student) && $student->course_name == 'Graphic Design'){?> selected="selected" <?php }?>>Graphic Design</option>
                                        <option value="App Developement" <?php if(!empty($student) && $student->course_name == 'App Developement'){?> selected="selected" <?php }?>>App Developement</option>
								    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                    </div>
                                    <br>

                                <div class="form-group">

                                <label><b>Stream</b><span class="req">*</span></label>

                                <select class="form-control" name="stream_name" id="stream_name">
                                        <option value="">Select Stream</option>	
                                        <option value="Web Design">Web Design</option>
                                        <option value="Web Developement">Web Developement</option>
                                        <option value="Graphic Design">Graphic Design</option>
                                        <option value="App Developement">App Developement</option>
								    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <br>
                                <div class="form-group">

                                <label><b>Year/Sem</b><span class="req">*</span></label>

                                <select class="form-control" name="year_sem" id="year_sem">
                                        <option value="1">Select</option>	
                                        <option value="2">Web Design</option>
                                        <option value="3">Web Developement</option>
                                        <option value="4">Graphic Design</option>
                                        <option value="5">App Developement</option>
								    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <br>

                                <div class="form-group">
                                    <div class=" mt-4">
                                            <a href="javascript:void(0);" class="default-btn2">Search -->
                                                <!-- <i class="ri-arrow-right-line"></i> -->
                                            <!-- </a>
                                    </div>
                                <div class="pull-right">

                                </div>

                                </div>

							</form>

                        </div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
	
        <style>

#contentDiv {
    text-transform: uppercase
}

.panel-group .panel {
    border-radius: 0;
    box-shadow: none;
    border-color: #EEEEEE;
}

.panel-default > .panel-heading {
    padding: 0;
    border-radius: 0;
    color: #212121;
    background-color: #FAFAFA;
    border-color: #EEEEEE;
}

.panel-title {
    font-size: 14px;
}

.panel-title > a {
    display: block;
    padding: 15px;
    text-decoration: none;
}

.more-less {
    float: right;
    color: #212121;
}

.panel-default > .panel-heading + .panel-collapse > .panel-body {
    border-top-color: #EEEEEE;
}

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
    /*background-color: #dddddd;*/
}

.align_center {
    text-align: center;
}

.image_height {
    height: 30px;
    width: 30px;
}


</style>

<div class="page-title-area bg-14">
			<div class="container">
				<div class="page-title-content">
					<h2>View Results</h2>

					<ul>
						<li>
							<a href="javascript:void(0);">
                            Examination 
							</a>
						</li>

						<li class="active">View Results</li>
					</ul>
				</div>
			</div>
		</div>


        <section class="c-padding inner-bg-2">
        <div class="container">
				<div class="candidates-resume-content">
					<form class="resume-info" id="result_form" name="result_form" enctype="multipart/form-data" method="post">
						<h3>Download Result</h3>
						<p><Small>Please provide your details</Small></p>

						<div class="row">
							<div class="col-lg-4 col-md-4">
                                <div class="form-group">
									<label>Enrollment Number<span class="req">*</span></label>
									<input type="text" name="enrollment_number" autocomplete="off" id="enrollment_number" required class="form-control" placeholder="Enter Your Enrollment Number">
								</div>
							</div>

							<div class="col-lg-4 col-md-4">
                                <div class="form-group">
									<label>Exam<span class="req">*</span></label>
									<select name="examination_status" id="examination_status" class="form-control">
										<option value="">Select Exam</option>
										<option value="0">Main</option>
										<option value="1">Reappear</option>
									</select>
								</div>
							</div>

							<div class="col-lg-4 col-md-4">
                                <div class="form-group">
									<label>Year/Sem<span class="req">*</span></label>
									<select name="year_sem" id="year_sem" required class="form-control">
										<option value="">Select</option>
										<?php for ($y = 1; $y <= 12; $y++) { ?>
											<option value="<?= $y ?>"><?= $y ?></option>
										<?php } ?>
									</select>
								</div>
							</div> 
						
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label></label>
                                    <button type="submit" class="default-btn" name="search" id="search" value="Search">Search</button>
                                    <div class="pull-right"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<div class="row">
	<div class="col-md-12">
		<?php
		// if ($this->input->post('search') == "Search" && !empty($student)) {
		// 	if (!empty($student)) {
		// 		if (substr($student->enrollment_number, 0, 5) == "20100") {
		// 			$subject = $this->Exam_model->get_selected_subject_for_result($student->id);
        //             echo "<pre>";print_r($subject);exit;
		// 		} else {
		// 			$subject = $this->Exam_model->get_selected_subject_for_saperate_student_result($student->id);
		// 		}
		// 		$i = 0;
		?>
        
        <?php
            if ($this->input->post('search') == "Search" && !empty($student)) {
                // echo "<pre>";print_r($subject);exit;
                if (!empty($student)) {
                    $subject = $this->Exam_model->get_selected_subject_for_result($student->id);
                }else{
                    $subject = $this->Exam_model->get_selected_subject_for_saperate_student_result($student->id);
                }
                $i = 0;
		?>

<table align="center" class="detailTable" style="width:70%;margin-top:25px;" cellpadding="2">
	<tr>
		<td width="180px" class="data">Name</td>
		<td width="250px" class="data"><?php echo $student->student_name ?></td>
		<td width="180px" class="data">Father/Husband Name</td>
		<td width="250px" class="data"><?php echo $student->father_name ?></td>
		<td width="90px" class="data">Year/Sem</td>
		<td width="140px" class="data"><?php echo $student->year_sem ?></td>
	</tr>
	<tr>
		<td width="<?php if ($student->examination_status == '0') { ?>90px<?php } else { ?>100px<?php } ?>" class="data"><?php if ($student->examination_status == '0') { ?>Exam. Held<?php } else { ?>Re-Exam. Held<?php } ?></td>
		<td width="140px" class="data"><?php echo $student->examination_month . ' ' . $student->examination_year ?></td>
		<td width="180px" class="data">Enrollment No</td>
		<td width="250px" class="data"><?= $student->enrollment_number ?></td>
		<td width="250px">Course</td>
		<td width="250px"><?= $student->course_name; ?> - <?= $student->stream_name; ?></td>
	</tr>
</table>
<table align="center" border="1" cellpadding="3" style="width:70%;margin-bottom:25px;" class="detailTable">
	<tr>
		<td class="data" rowspan="2" align="center">S.No</td>
		<td class="data" rowspan="2" align="center">Subject Code</td>
		<td class="data" rowspan="2" align="center">Subject(s)/Paper(s)</td>
		<td class="data" colspan="2" align="center">Internal Assessment</td>
		<td class="data" colspan="2" align="center">External Assessment</td>
		<td class="data" colspan="2" align="center">Total Marks</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
		<td class="data" rowspan="2" align="center">Remarks</td>
	</tr>
	<tr>
		<td class="data" align="center">M.M.</td>
		<td class="data" align="center">M.O.</td>
		<td class="data" align="center">M.M.</td>
		<td class="data" align="center">M.O.</td>
		<td class="data" align="center">M.M.</td>
		<td class="data" align="center">M.O.</td>
	</tr>
	<?php
	
    $sr = 1;
$total_internal = 0;
$total_external = 0;

foreach ($subject as $subject_result) {
    if ($subject_result->subject_type == 0) {
        $subject_type = "Theory";
    } else {
        $subject_type = "Practical";
    }

    if ($subject_result->result == 0) {
        $paper_result = "Pass";
    } else if ($subject_result->result == 1) {
        $paper_result = "Reappear";
    } else {
        $paper_result = "Absent";
    }

    $total_internal += $subject_result->internal_max_marks + $subject_result->external_max_marks;
    $total_external += $subject_result->internal_marks_obtained + $subject_result->external_marks_obtained;
?>
    <tr>
        <td><?= $sr++ ?></td>
        <td style="padding-left: 35px"><?= $subject_result->subject_code ?></td>
        <td style="padding-left: 35px"><?= $subject_result->subject_name ?></td>
        <?php if ($subject_result->internal_max_marks != "0") { ?>
            <td><?= $subject_result->internal_max_marks ?></td>
        <?php } else { ?>
            <td>-</td>
        <?php } ?>
        <?php if ($subject_result->internal_marks_obtained != "0") { ?>
            <td><?= $subject_result->internal_marks_obtained ?></td>
        <?php } else { ?>
            <td>-</td>
        <?php } ?>
        <td><?= $subject_result->external_max_marks ?></td>
        <td><?= $subject_result->external_marks_obtained ?></td>
        <td><?= $subject_result->internal_max_marks + $subject_result->external_max_marks ?></td>
        <td><?= $subject_result->internal_marks_obtained + $subject_result->external_marks_obtained ?></td>
        <td><?= $paper_result ?></td>
    </tr>
<?php
}
?>

<tr>
    <td colspan=7><b>Total Marks</b></td>
    <td align=center><b><?= $total_internal ?></b></td>
    <td align=center><b><?= $total_external ?></b></td>
    <td align=center><b>
            <?php
            if ($student->result == "0") {
                echo "Pass";
            } else if ($student->result == "1") {
                echo "Fail";
            } else if ($student->result == "2") {
                echo "Reappear";
            } else if ($student->result == "3") {
                echo "Absent";
            }
            ?>
        </b></td>
</tr>
<?php
}
?>
</table>

<?php
// }
?>

</section>

<?php include('footer.php'); ?>

<script>
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



$('#result_form').validate({
    rules: {
        enrollment_number: {
            required: true,
            noHTMLtags: true,
        },
        examination_status: {
            required: true,
            noHTMLtags: true,
        },
        year_sem: {
            required: true,
            noHTMLtags: true,
        },
    },
    messages: {
        enrollment_number: {
            required: "Please enter enrollment number",
            noHTMLtags: "HTML tags not allowed!",
        },
        examination_status: {
            required: "Please select exam",
            noHTMLtags: "HTML tags not allowed!",
        },
        year_sem: {
            required: "Please select year/sem",
            noHTMLtags: "HTML tags not allowed!",
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
</script>
		
		