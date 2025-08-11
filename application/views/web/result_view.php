<?php include('header.php'); ?>
<style>
	#contentDiv {
		text-transform: uppercase
	}

	;

	.panel-group .panel {
		border-radius: 0;
		box-shadow: none;
		border-color: #EEEEEE;
	}

	.panel-default>.panel-heading {
		padding: 0;
		border-radius: 0;
		color: #212121;
		background-color: #FAFAFA;
		border-color: #EEEEEE;
	}

	.panel-title {
		font-size: 14px;
	}

	.panel-title>a {
		display: block;
		padding: 15px;
		text-decoration: none;
	}

	.more-less {
		float: right;
		color: #212121;
	}

	.panel-default>.panel-heading+.panel-collapse>.panel-body {
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


<section>


	<div class="header_cc_area slide-bg">
		<div class="container  overlay-about" style="width: 100%;">
			<p>Examination / Result</p>

			<div class=" container-fluid text-center inner-heading-content">
				<h2 class="main-heading-inner-pages border-b border">Result</h2>
				<p> We believe in providing education that cultivates creative understanding </p>

			</div>

		</div>
	</div>
</section>

<div class="clearfix"></div>
<section class="c-padding inner-bg-2">

	<div class="uni_mainWrapper container box-shadow-global">
	<h2 class="title">Download Result</h2>

		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="row">
				<div class="col-md-12">
					<form method="post" name="result_form" id="result_form" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="personal_details">
								
									<small>Please provide your details</small>
									<hr>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Enrollment Number<span class="req">*</span></label>
									<input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter Your Enrollment Number">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Exam<span class="req">*</span></label>
									<select name="examination_status" id="examination_status" class="form-control">
										<option value="0">Main</option>
										<option value="1">Reappear</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
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
									<button type="submit" class="btn btn-primary" name="search" id="search" value="Search">Search</button>
									<div class="pull-right">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

				<div class="row">
					<div class="col-md-12">
						<?php if ($this->input->post('search') == "Search" && !empty($student)) {
							if (!empty($student)) {
								if (substr($student->enrollment_number, 0, 5) == "20100") {
									$subject = $this->Exam_model->get_selected_subject_for_result($student->id);
								} else {
									$subject = $this->Exam_model->get_selected_subject_for_saperate_student_result($student->id);
								}


								$i = 0;
						?>


								<table align="center" class="detailTable" style="width:70%" cellpadding="2">
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

										<td width="180px" class="data">Enrolment No</td>
										<td width="250px" class="data"><?= $student->enrollment_number ?></td>
										<td width="250px">Course</td>
										<td width="250px"><?= $student->course_name; ?> - <?= $student->stream_name; ?></td>
									</tr>
								</table>
								<table align="center" border="1" cellpadding="3" style="width:70%" class="detailTable">
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
										<td align=center><b><?php if ($student->result == "0") {
																echo "Pass";
															} else if ($student->result == "1") {
																echo "Fail";
															} else if ($student->result == "2") {
																echo "Reappear";
															} else if ($student->result == "3") {
																echo "Absent";
															} ?></b></td>
									</tr>

								<?php
							}

								?>

								</table>


							<?php
						}

							?>

					</div>
				</div>
			</div>
		</div>
	</div>
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