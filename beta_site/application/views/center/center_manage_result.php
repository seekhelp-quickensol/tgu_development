<?php include('header.php'); ?>
<style>
	input {
		height: auto !important;
	}

	.input_mark {
		width: 65px !important
	}

	/* #example thead th {
  width: 10%;
} */
</style>

<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Manage Assignment</h4>
							<p class="card-description">
								Please enter assignment details
							</p>
							<form method="post" name="search_form" id="search_form">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Examination*</label>
											<select name="month" id="month" class="form-control">
												<option value="">Select Month</option>
												<?php if ($this->session->userdata('center_id') == "23" || $this->session->userdata('center_id') == "31") { ?>
													<!--<option value="July" <?php if ($this->input->post('show_subject') != "" && $this->input->post('month') == "July") { ?>selected="selected"<?php } ?>>July</option>-->
												<?php } ?>
												<option value="January" <?php if ($this->input->post('show_subject') != "" && $this->input->post('month') == "January") { ?>selected="selected" <?php } ?>>January</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Year*</label>
											<select name="year" id="year" class="form-control">
												<option value="">Select Year</option>
												<?php if ($this->session->userdata('center_id') == "23" || $this->session->userdata('center_id') == "31") { ?>
													<!--<option value="2024"  <?php if ($this->input->post('show_subject') != "" && $this->input->post('year') == "2024") { ?>selected="selected"<?php } ?>>2024</option>-->
												<?php } ?>
												<option value="2025" <?php if ($this->input->post('show_subject') != "" && $this->input->post('year') == "2025") { ?>selected="selected" <?php } ?>>2025</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Exam Status*</label>
											<select name="exam_status" id="exam_status" class="form-control">
												<option value="">Exam Status</option>
												<option value="0" <?php if ($this->input->post('show_subject') != "" && $this->input->post('exam_status') == "0") { ?>selected="selected" <?php } ?>>Main Exam</option>
												<option value="1" <?php if ($this->input->post('show_subject') != "" && $this->input->post('exam_status') == "1") { ?>selected="selected" <?php } ?>>Re-Exam</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Year/Sem*</label>
											<select name="year_sem" id="year_sem" class="form-control">
												<option value="">Select Year/Sem</option>

												<option value="1" <?php if ($this->input->post('year_sem') != "" && $this->input->post('year_sem') == "1") { ?>selected="selected" <?php } ?>>1</option>
												<option value="2" <?php if ($this->input->post('year_sem') != "" && $this->input->post('year_sem') == "2") { ?>selected="selected" <?php } ?>>2</option>
												<option value="3" <?php if ($this->input->post('year_sem') != "" && $this->input->post('year_sem') == "3") { ?>selected="selected" <?php } ?>>3</option>
												<option value="4" <?php if ($this->input->post('year_sem') != "" && $this->input->post('year_sem') == "4") { ?>selected="selected" <?php } ?>>4</option>
												<option value="5" <?php if ($this->input->post('year_sem') != "" && $this->input->post('year_sem') == "5") { ?>selected="selected" <?php } ?>>5</option>
												<option value="6" <?php if ($this->input->post('year_sem') != "" && $this->input->post('year_sem') == "6") { ?>selected="selected" <?php } ?>>6</option>
												<option value="7" <?php if ($this->input->post('year_sem') != "" && $this->input->post('year_sem') == "7") { ?>selected="selected" <?php } ?>>7</option>
												<option value="8" <?php if ($this->input->post('year_sem') != "" && $this->input->post('year_sem') == "8") { ?>selected="selected" <?php } ?>>8</option>

											</select>
											<!--<input type="text" readonly name="year_sem" id="year_sem" class="form-control" value="<?php if (!empty($student)) {
																																			echo $student->year_sem;
																																		} ?>">-->

										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Enrollment*</label>
											<input type="text" name="enrollment" id="enrollment" class="form-control" value="<?php if ($this->input->post('show_subject') != "") {
																																	echo $this->input->post('enrollment');
																																} ?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="submit" name="show_subject" id="show_subject" class="btn btn-primary btn-sm" value="Show Subject">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">

							<?php if ($this->input->post('show_subject') == "Show Subject") {
								// echo "<pre>";print_r($exam_form);exit;
								if ($exam_form >= 0) {
									// echo "<pre>";print_r($student_exam_status->exam_status);exit;
									if ($student_exam_status && $student_exam_status->exam_status == 1) {
							?>

										<form method="post" name="add_result_form" id="add_result_form" enctype="multipart/form-data">

											<?php
											// echo "<pre>";print_r($subject);exit;
											if (!empty($subject)) { ?>
												<div class="col-md-12">
													<h3>
														<?php
														$course_id_btech = 0;
														if (!empty($course_stream)) {
															$course_id_btech = $course_stream->course_id;
															echo  $course_stream->course_name . "-";
														} ?>
														<?php if (!empty($course_stream)) {
															echo $course_stream->stream_name;
														} ?>
													</h3>
													<br>
													<h5>Student Name :<?php if (!empty($student)) {
																			echo $student->student_name;
																		} ?></h5>
													<br>
												</div>
												<table class="detailTable" align="center" width="900" cellspacing="5" cellpadding="4">

													<tr>
														<td>Total MM</td>
														<td><input type="text" name="txtTMM" id="txtTMM" class="detail_text" maxlength="10" /></td>
														<td>Total MO</td>
														<td><input type="text" name="txtTMO" id="txtTMO" class="detail_text" maxlength="10" /></td>
														<td>Percent</td>
														<td><input type="text" name="txtPercent" id="txtPercent" class="detail_text" maxlength="10" readonly /></td>
													</tr>
												</table>
												<div class="col-md-12" style="margin-top:10px;"></div>
												<table id="example" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
													<thead>
														<tr>
															<th><input type="checkbox" value="0" name="chAll" id="chAll" onclick="checkAll();" />Subject Code</th>
															<th><span>Subject Name</span></th>
															<th><span>Study Type</span></th>
															<th><span>Int. Max Marks</span></th>
															<th><span>Int. Marks Obt.</span></th>
															<th><span>Ext. Max Marks</span></th>
															<th><span>Ext. Marks Obt.</span></th>
															<th><span>Result</span></th>
														</tr>
													</thead>
													<tbody>
														<?php
														if (!empty($subject)) {
															$i = 1;
															foreach ($subject as $result_arr) {
																if ($result_arr->subject_type == 0) {
																	$studyType = "Theory";
																} else {
																	$studyType = "Practical";
																}
														?>
																<tr>
																	<td>
																		<input type="checkbox" class="check_access max_number" value="<?= $i ?>" name="txtChoice<?= $i ?>" id="txtChoice<?= $i ?>" onclick="addMarks();">
																		<?= $result_arr->subject_code ?>
																	</td>
																	<td><?= $result_arr->subject_name ?></td>
																	<td><?= $studyType ?>
																		<input type="hidden" value="<?= $result_arr->id ?>" name="txtSubjectId<?= $i ?>" id="txtSubjectId<?= $i ?>" />
																	</td>
																	<td><input class="input_mark max_number" type="text" value="<?= $result_arr->internal_marks ?>" name="txtIMM<?= $i ?>" id="txtIMM<?= $i ?>" class="detail_text_right2" readonly="readonly" /></td>
																	<!-- <td><input class="input_mark" type="text" name="txtIMO<?= $i ?>" id="txtIMO<?= $i ?>" onblur="addMarks();" class="detail_text_right2 max_number" maxlength="3" onkeypress="disableNonNumeric(event)"/></td> -->
																	<td><input class="input_mark" type="text" name="txtIMO<?= $i ?>" id="txtIMO<?= $i ?>" onblur="addMarks();" class="detail_text_right2 max_number" maxlength="3" onkeypress="return isNumberKey(event)" /></td>

																	<td><input class="input_mark" type="text" value="<?= $result_arr->external_mark ?>" name="txtEMM<?= $i ?>" id="txtEMM<?= $i ?>" class="detail_text_right2" readonly="readonly" /></td>
																	<!-- <td><input class="input_mark" type=text name="txtEMO<?= $i ?>" id="txtEMO<?= $i ?>" onblur="addMarks();" class="detail_text_right2 max_number" maxlength="3" onkeypress="disableNonNumeric(event)"/></td> -->
																	<td><input class="input_mark max_number" type=text name="txtEMO<?= $i ?>" id="txtEMO<?= $i ?>" onblur="addMarks();" class="detail_text_right2 max_number" maxlength="3" onkeypress="return isNumberKey(event)" /></td>

																	<td>
																		<select name="comboResult<?= $i ?>" id="comboResult<?= $i ?>" class="detail_combo_status">
																			<option value="1">Fail</option>
																			<option value="2">Absent</option>
																			<option value="0" selected>Pass</option>
																		</select>
																	</td>
																</tr>
														<?php
																$i++;
															}
														} ?>
														<tr class="result4">
															<td colspan="3" align="right"><b>TOTAL MARKS</b></td>
															<td><input type="text" value="0" name="txtTIMM" id="txtTIMM" class="detail_text_right2" readonly="readonly" /></td>
															<td><input type="text" value="0" name="txtTIMO" id="txtTIMO" class="detail_text_right2" readonly="readonly" /></td>
															<td><input type="text" value="0" name="txtTEMM" id="txtTEMM" class="detail_text_right2" readonly="readonly" /></td>
															<td><input type="text" value="0" name="txtTEMO" id="txtTEMO" class="detail_text_right2" readonly="readonly" /></td>
															<td>
																<select name="comboTResult" id="comboTResult" class="detail_combo_status">
																	<option value="select">Select</option>
																	<option value="2">Reappear</option>
																	<option value="1">Fail</option>
																	<option value="0" selected>Pass</option>
																	<option value="3">Absent</option>
																</select>
															</td>
														</tr>
													</tbody>
												</table>
												<?php if ($this->input->post('year_sem') == "") {
													//$this->session->set_flashdata('message','There is some thing issue in year/sem, please cordinate with admin team with enrolment number');
													//redirect('center_manage_result');
												} ?>
												<input type="hidden" value="<?php if ($this->input->post('month') != "") {
																				echo $this->input->post('month');
																			} ?>" name="txtMonth" id="txtMonth" />
												<input type="hidden" value="<?php if ($this->input->post('year') != "") {
																				echo $this->input->post('year');
																			} ?>" name="txtYear" id="txtYear" />
												<input type="hidden" value="<?php if (!empty($course_stream)) {
																				echo $course_stream->course_id;
																			} ?>" name="txtCourseId" id="txtCourseId" />
												<input type="hidden" value="<?php if (!empty($course_stream)) {
																				echo $course_stream->stream_id;
																			} ?>" name="txtStreamId" id="txtStreamId" />
												<input type="hidden" value="<?php if ($this->input->post('year_sem') != "") {
																				echo $this->input->post('year_sem');
																			} ?>" name="txtYS" id="txtYS" />
												<input type="hidden" value="<?php if ($this->input->post('exam_status') != "") {
																				echo $this->input->post('exam_status');
																			} ?>" name="txtExamStatus" id="txtExamStatus" />
												<input type="hidden" value="<?php if ($this->input->post('enrollment') != "") {
																				echo $this->input->post('enrollment');
																			} ?>" name="txtEnNo" id="txtEnNo" />
												<input type="hidden" value="<?php if (!empty($course_stream)) {
																				echo $course_stream->id;
																			} ?>" name="student_id" id="student_id" />
												<input type="hidden" value="<?= $i - 1 ?>" name='txtSubjectCount' id='txtSubjectCount' />

												<!-- <?php if ($exam_form != "0") { ?>
					<div class="col-md-2 col-md-offset-4">
						<div class="form-group">
							<input class="btn btn-primary btn-sm" type="submit" name="add_result" id="add_result" value="Add Result">
						</div>
					</div>
				<?php } else { ?>
					<div class="col-md-12 col-md-offset-4">
						<div class="form-group">
							<span class="error">Student exam form not submited. That's why result generate not allowed.</span>
						</div>
					</div>
				<?php } ?> -->

												<div class="col-md-2 col-md-offset-4">
													<div class="form-group">
														<input class="btn btn-primary btn-sm add_result" type="submit" name="add_result" id="add_result" value="Add Result" onclick="validateCheckbox();">
													</div>
												</div>
												<div class="col-md-2 col-md-offset-4">
													<div class="form-group">
														<label>Auto Set Percentage</label>
														<select name="comboPercent" id="comboPercent" class="form-control" onchange="fillMarks();">
															<option value="0">Select</option>
															<option value="65">65</option>
															<option value="66">66</option>
															<option value="67">67</option>
															<option value="68">68</option>
															<option value="69">69</option>
															<option value="70">70</option>
														</select>
													</div>
												</div>

											<?php } else {
												if ($this->input->post('show_subject') == "Show Subject") {
													echo "<span class=error>No Subject added for this semester/Year</span>";
												}
											?>
											<?php } ?>

										</form>
									<?php } else { ?>
										<div class="col-md-12 col-md-offset-4">
											<div class="form-group">
												<span class="error">Hallticket is not activate for student, Please activate hallticket to generate marksheet</span>
											</div>
										</div>
									<?php } ?>
								<?php } else { ?>
									<div class="col-md-12 col-md-offset-4">
										<div class="form-group">
											<span class="error">Result could not generate, because student not fill exam form.</span>
										</div>
									</div>
							<?php }
							} ?>

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

		<script type="text/javascript">
			$('.max_number').keyup(function() {
				marksValidation();
				if ($(this).val() > 75) {

					alert("No numbers above 75");

					$(this).val('0');

				}

			});

			$(".add_result").click(function() {

				var no_of_subject = 0;

				$(".check_access").each(function() {

					if ($(this).prop('checked') == true) {

						no_of_subject = no_of_subject + 1;

					}

				});

				<?php

				if ($course_id_btech == 20) { ?>

					if ($("#txtYS").val() == "6" || $("#txtYS").val() == "7" || $("#txtYS").val() == "8") {

						if (no_of_subject > 10) {

							alert('Please select maximum 10 subject only!');

							return false;

						}

					}

				<?php } ?>

				<?php if ($this->session->userdata('center_id') == 9) { ?>

					if (no_of_subject > 10) {

						alert('Please select maximum 10 subject only!');

						return false;

					}

				<?php } ?>

			});

			function fillMarks() {

				var i = 1;

				var percent = parseInt(document.getElementById("comboPercent").value);

				var percent1 = (percent - 8) / 100;

				var j = parseInt(document.getElementById("txtSubjectCount").value);

				var totalIntMM = 0,
					totalExtMM = 0,
					totalIntMO = 0,
					totalExtMO = 0;

				var subjectId = 0;



				for (i = 1; i <= j; i++) {

					if (document.getElementById("txtChoice" + i))

						if (document.getElementById("txtChoice" + i).checked == true) {

							subjectId = document.getElementById("txtSubjectId" + i).value;



							var maximum = Math.floor(parseInt(document.getElementById("txtIMM" + i).value) * percent / 100);

							var minimum = Math.floor(parseInt(document.getElementById("txtIMM" + i).value) * percent1);

							var maximum1 = Math.floor(parseInt(document.getElementById("txtEMM" + i).value) * percent / 100);

							var minimum1 = Math.floor(parseInt(document.getElementById("txtEMM" + i).value) * percent1);



							document.getElementById("txtIMO" + i).value = Math.floor(Math.random() * (maximum - minimum + 1)) + minimum;

							document.getElementById("txtEMO" + i).value = Math.floor(Math.random() * (maximum1 - minimum1 + 1)) + minimum1;

						}

					else {

						document.getElementById("txtIMO" + i).value = "";

						document.getElementById("txtEMO" + i).value = "";

					}

				}

				addMarks();

			}

			function checkAll() {

				var i = 1;

				var j = parseInt(document.getElementById("txtSubjectCount").value);

				if (document.getElementById("chAll").checked == true) {

					for (i = 1; i <= j; i++)

						if (document.getElementById("txtChoice" + i))

							document.getElementById("txtChoice" + i).checked = true;

				} else {

					for (i = 1; i <= j; i++)

						if (document.getElementById("txtChoice" + i))

							document.getElementById("txtChoice" + i).checked = false;

				}



			}

			function addMarks() {

				var i = 1;

				var j = parseInt(document.getElementById("txtSubjectCount").value);

				var totalIntMM = 0,
					totalExtMM = 0,
					totalIntMO = 0,
					totalExtMO = 0;

				var subjectId = 0;

				for (i = 1; i <= j; i++) {

					if (document.getElementById("txtChoice" + i))

						if (document.getElementById("txtChoice" + i).checked == true) {

							subjectId = document.getElementById("txtSubjectId" + i).value;



							if (subjectId == 6736 || subjectId == 6735 || subjectId == 6734) {

								if (document.getElementById("txtIMM" + i).value.length == 0)

									document.getElementById("txtIMM" + i).value = 0;



								if (document.getElementById("txtEMM" + i).value.length == 0)

									document.getElementById("txtEMM" + i).value = 0;



								if (document.getElementById("txtIMO" + i).value.length == 0)

									document.getElementById("txtIMO" + i).value = 0;



								if (document.getElementById("txtEMO" + i).value.length == 0)

									document.getElementById("txtEMO" + i).value = 0;





							} else {

								if (document.getElementById("txtIMM" + i).value.length == 0)

									document.getElementById("txtIMM" + i).value = 0;

								else

									totalIntMM += parseInt(document.getElementById("txtIMM" + i).value);



								if (document.getElementById("txtEMM" + i).value.length == 0)

									document.getElementById("txtEMM" + i).value = 0;

								else

									totalExtMM += parseInt(document.getElementById("txtEMM" + i).value);



								if (document.getElementById("txtIMO" + i).value.length == 0)

									document.getElementById("txtIMO" + i).value = 0;

								else

									totalIntMO += parseInt(document.getElementById("txtIMO" + i).value);



								if (document.getElementById("txtEMO" + i).value.length == 0)

									document.getElementById("txtEMO" + i).value = 0;

								else

									totalExtMO += parseInt(document.getElementById("txtEMO" + i).value);

							}

						}

					else {

						document.getElementById("txtIMO" + i).value = "";

						document.getElementById("txtEMO" + i).value = "";

					}

				}

				if (document.getElementById("txtTIMM")) {

					document.getElementById("txtTIMM").value = totalIntMM;

					document.getElementById("txtTEMM").value = totalExtMM;

					document.getElementById("txtTMM").value = totalIntMM + totalExtMM;

				}

				if (document.getElementById("txtTIMO")) {

					document.getElementById("txtTIMO").value = totalIntMO;

					document.getElementById("txtTEMO").value = totalExtMO;

					document.getElementById("txtTMO").value = totalIntMO + totalExtMO;

				}

				var totper = (totalIntMO + totalExtMO) * 100 / (totalIntMM + totalExtMM);

				if (totper > 70) {

					alert('Please add below the 70% result only');

					window.location.href = "<?= base_url(); ?>center_manage_result";

				}

				document.getElementById("txtPercent").value = (totalIntMO + totalExtMO) * 100 / (totalIntMM + totalExtMM);

				check_per();

			}

			function checkMarks() {

				var i = 1;

				var j = parseInt(document.getElementById("txtSubjectCount").value);

				var retVal = true;



				for (i = 1; i <= j; i++) {

					if (document.getElementById("txtChoice" + i))

						if (document.getElementById("txtChoice" + i).checked == true) {



							if (parseInt(document.getElementById("txtIMM" + i).value) < parseInt(document.getElementById("txtIMO" + i).value)){
        
								retVal = false;
                            }


							if (parseInt(document.getElementById("txtEMM" + i).value) < parseInt(document.getElementById("txtEMO" + i).value))

								retVal = false;

						}

				}

				return retVal;

			}

			function marksValidation() {

				if (checkMarks() == false) {
					$(".max_number").val('0');
					alert("Internal Marks Obtained cannot exceed Internal Maximum Marks.");

					return false;

				}

				addMarks();

				document.getElementById("mDiv").style.display = "none";

				document.getElementById("aDiv").style.display = "";

				return true;

			}

			function fillMarks() {

				var i = 1;

				var percent = parseInt(document.getElementById("comboPercent").value);

				var percent1 = (percent - 8) / 100;

				var j = parseInt(document.getElementById("txtSubjectCount").value);

				var totalIntMM = 0,
					totalExtMM = 0,
					totalIntMO = 0,
					totalExtMO = 0;

				var subjectId = 0;



				for (i = 1; i <= j; i++) {

					if (document.getElementById("txtChoice" + i))

						if (document.getElementById("txtChoice" + i).checked == true) {

							subjectId = document.getElementById("txtSubjectId" + i).value;



							var maximum = Math.floor(parseInt(document.getElementById("txtIMM" + i).value) * percent / 100);

							var minimum = Math.floor(parseInt(document.getElementById("txtIMM" + i).value) * percent1);

							var maximum1 = Math.floor(parseInt(document.getElementById("txtEMM" + i).value) * percent / 100);

							var minimum1 = Math.floor(parseInt(document.getElementById("txtEMM" + i).value) * percent1);



							document.getElementById("txtIMO" + i).value = Math.floor(Math.random() * (maximum - minimum + 1)) + minimum;

							document.getElementById("txtEMO" + i).value = Math.floor(Math.random() * (maximum1 - minimum1 + 1)) + minimum1;

						}

					else {

						document.getElementById("txtIMO" + i).value = "";

						document.getElementById("txtEMO" + i).value = "";

					}

				}

				addMarks();

			}
		 
		</script>
		<script type="text/javascript">
			function validation() {
				var retVal = true;
				if (!document.AddForm.comboTResult)
					retVal = false;
				if (document.AddForm.comboTResult)
					if (document.AddForm.comboTResult.selectedIndex == 0) {
						alert("Please select result status.");
						retVal = false;
					}
				return retVal;
			}

			$("#search_form").validate({
				rules: {
					month: "required",
					year: "required",
					year_sem: "required",
					exam_status: "required",
					enrollment: {
						"required": true,
						"number": true
					},

				},
				messages: {
					month: "Please select month",
					year: "Please select year",
					exam_status: "Please select exam status",
					year_sem: "Please select year/sem",
					enrollment: {
						required: "Please enter enrollment",
						number: "Only number allowed"
					},
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		</script>

		<!-- <script>

submitHandler: function(form) {
	var fields = $("input[type='checkbox']").serializeArray(); 
	alert(fields);
	if (fields.length === 0){ 
		
		// $('.checkbox_error').text('Please select atleast one checkbox.');
		alert('Please select at least one subject.');
		return false;
	}else{ 
		
		form.submit();
	}
	
}
</script> -->

		<script>
			$(document).ready(function() {
				$("#add_result_form").submit(function(event) {
					var checkedCheckboxes = $("input[type='checkbox']:checked").length;
					if (checkedCheckboxes === 0) {
						alert("Please select at least one subject.");
						event.preventDefault();
					} /*else {
						var totalMarks = parseInt($("#txtTMM").val()) + parseInt($("#txtTEMM").val());
						var obtainedMarks = parseInt($("#txtTMO").val()) + parseInt($("#txtTEMO").val());
						var percentage = (obtainedMarks / totalMarks) * 100;
						if (percentage > 70) {
							alert("Please add below the 70% result only");
							event.preventDefault();
						}
					}*/
				});
			});
		</script>

		<!-- <script>
$(document).ready(function() {
    $("#add_result_form").submit(function(event) {
        // alert("Form submission attempted.");
        var checkedCheckboxes = $("input[type='checkbox']:checked").length;
        // alert("Number of checked checkboxes: " + checkedCheckboxes);
        if (checkedCheckboxes === 0) {
            alert("Please select at least one subject.");
            event.preventDefault(); // Prevent the form from submitting
        } else {
            var totalMarks = parseInt($("#txtTMM").val()) + parseInt($("#txtTEMM").val());
            var obtainedMarks = parseInt($("#txtTMO").val()) + parseInt($("#txtTEMO").val());
            var percentage = (obtainedMarks / totalMarks) * 100;
            // alert("Percentage: " + percentage);
            if (percentage > 70) {
                alert("Percentage cannot exceed 70%.");
                event.preventDefault(); // Prevent the form from submitting
            } else {
                var error = false;
                $("input[id^='txtIMO']").each(function() {
                    var maxMarksId = $(this).attr('id').replace("txtIMO", "txtIMM");
                    var maxMarks = parseInt($("#" + maxMarksId).val());
                    var obtainedMarks = parseInt($(this).val());
                    // alert("Max Marks: " + maxMarks + ", Obtained Marks: " + obtainedMarks);
                    if (obtainedMarks > maxMarks) {
                        alert("Internal Marks Obtained cannot exceed Internal Maximum Marks.");
                        error = true;
                        return false; // Exit the loop
                    }
                });
                if (error) {
                    event.preventDefault(); // Prevent the form from submitting
                }
            }
        }
    });
});


</script>

 -->

		<script>
			function isNumberKey(evt) {
				var charCode = (evt.which) ? evt.which : event.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57)) {
					return false;
				}
				return true;
			}
		</script>