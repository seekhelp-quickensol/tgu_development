<?php include('header.php'); ?>

<style>
	.clearfix {

		clear: both margin-top:10px;

		margin-bottom: 20px;

	}

	.row-btns {
		height: 48px !important;
		line-height: 25px;
	}
</style>

<div class="container-fluid page-body-wrapper">

	<div class="main-panel">

		<div class="content-wrapper">

			<div class="row">

				<div class="col-md-12 grid-margin stretch-card">

					<div class="card">

						<div class="card-body">
							<h4 class="card-title"><?php if (isset($_GET['type']) && $_GET['type'] == '1') {
														echo 'Pulp';
													} else if (isset($_GET['type']) && $_GET['type'] == '2') {
														echo 'B.VOC';
													} else {
														echo 'Regular';
													} ?> All Admission List</h4>

							<?php if ($this->session->userdata('admin_id') == "1") { ?>

								<div class="col-md-12">

									<form method="post">

										<div class="row">

											<div class="col-md-6">

												<label>Center</label>

												<select class="form-control" name="center" id="center_name">

													<option value="">Select</option>

													<option value="All">All</option>

													<?php if (!empty($centers)) {
														foreach ($centers as $centers_result) { ?>

															<option value="<?= $centers_result->id ?>"><?= $centers_result->center_name ?></option>

													<?php }
													} ?>

												</select>

											</div>
											<?php if (isset($_GET['type']) && $_GET['type'] != "") { ?>
												<input type="hidden" name="type" id="type" value="<?= $_GET['type']; ?>">
											<?php } else { ?>
												<input type="hidden" name="type" id="type" value="0">
											<?php } ?>

											<div class="col-md-6 d-flex align-items-center" style="gap:15px;">


												<button class="btn btn-primary x2_button mt-4 row-btns" type="submit" name="activate" value="activate">Activate Login</button>

												<button class="btn btn-danger x2_button mt-4 row-btns" value="hold" name="hold">Hold Login</button>

											</div>

										</div>

									</form>



								</div>

							<?php } ?>

							<br>

							<hr>

							<div class="clearfix"></div>

							<div class="col-md-12">

								<form method="get">

									<div class="row">



										<div class="col-md-3">

											<input type="text" autocomplete="off" name="start_date" id="start_date" class="form-control datepicker" placeholder="Start Date" value="<?php if (isset($_GET['start_date'])) {
																																														echo $_GET['start_date'];
																																													} ?>">

										</div>

										<div class="col-md-3">

											<input type="text" autocomplete="off" name="end_date" id="end_date" class="form-control datepicker" placeholder="End Date" value="<?php if (isset($_GET['end_date'])) {
																																													echo $_GET['end_date'];
																																												} ?>">

										</div>

										<div class="col-md-2">

											<select name="session" id="session" class="form-control">

												<option value="">Session</option>

												<?php if (!empty($session)) {
													foreach ($session as $session_result) { ?>

														<option value="<?= $session_result->id ?>" <?php if (isset($_GET['session']) && $_GET['session'] == $session_result->id) { ?>selected="selected" <?php } ?>><?= $session_result->session_name ?></option>

												<?php }
												} ?>

											</select>

										</div>

										<div class="col-md-2">

											<select class="form-control" name="center" id="center">

												<option value="">Center</option>

												<?php if (!empty($centers)) {
													foreach ($centers as $centers_result) { ?>

														<option value="<?= $centers_result->id ?>" <?php if (isset($_GET['center']) && $_GET['center'] == $centers_result->id) { ?>selected="selected" <?php } ?>><?= $centers_result->center_name ?></option>

												<?php }
												} ?>

											</select>

										</div>

										<?php if (isset($_GET['type']) && $_GET['type'] != "") { ?>
											<input type="hidden" name="type" id="type" value="<?= $_GET['type']; ?>">
										<?php } else { ?>
											<input type="hidden" name="type" id="type" value="0">
										<?php } ?>

										<div class="col-md-2">

											<button type="submit" class="btn btn-primary x1_button row-btns">Search</button>

											<a href="<?= base_url(); ?>admission_list" class="btn btn-danger row-btns">Reset</a>

										</div>

									</div>

								</form>

							</div>

							<hr>

							<div class="clearfix"></div>

							<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>Username</th>
										<th>Password</th>
										<th>Center Name</th>
										<th>Enrollment No</th>
										<th>Registration No</th>
										<th>Student Name</th>
										<th>Session</th>
										<!-- <th>Class Mode</th>  -->
										<th>Study Mode</th>
										<th>Login Status</th>
										<th>Enrollment Date</th>
										<th>Registration Date</th>
										<th>Date of Birth</th>
										<th>Admission Status</th>
										<th>Center Name</th>
										<th>Employee Type</th>
										<th>Father/Husband Name</th>
										<th>Father/Husband Profession</th>
										<th>Mother Name</th>
										<th>Mobile Number</th>
										<th>Email</th>
										<th>ABC/APAAR ID</th>
										<th>Gender</th>
										<th>Category</th>
										<th>Current Address</th>
										<!-- <th>ID Type</th>
										<th>ID Number</th>
										-->
										<th>Employment Details</th>
										<th>Country</th>
										<th>Pin Code</th>
										<!-- <th>Payment Mode</th> -->								
										<th>Show Collaborator undertaking</th>
										<th>Student Undertaking</th>
										<th>Update Status</th>
										<th>Faculty</th>
										<th>Course Type</th>
										<th>Course Name</th>
										<th>Stream Name</th>
										<th>Course Mode</th>
										<th>Entry Type</th>
										<th>Study Mode</th>
										<th>Current Year/Sem</th>
										<th>Total Payable Fees</th>
										<th>Total Paid Admission Fees</th>
										<th>Total Paid Exam Fees</th>
										<th>Identity Type</th>
										<th>Identity Number</th>
										<th>Signature</th>
										<th>Identity softcopy</th>
										<th>NOC</th>
										<th>Permission Letter</th>
										<th>Old Migration</th>
										<th>Undertaking</th>
										<th>Collaborator undertaking</th>
										<th>Photo</th>
										<th>Affidavit</th>
										<th>Nationality</th>
										<th>Religion</th>
										<th>Religion Specify</th>
										<th>Address</th>
										<th>City</th>
										<th>State</th>																				<th>Anti-Ragging Reference ID of Student</th>																				<th>Anti-Ragging Reference ID of Parents</th>																				<th>Old Migration</th>
										<th>Remarks</th>						
										<th>Action</th>
										<th>Hold/Active Remark</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>

						</div>

					</div>

				</div>

			</div>

		</div>



		<!-- Modal -->

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<div class="modal-header">

						<h5 class="modal-title" id="exampleModalLabel">Add Cancel Reason</h5>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">

							<span aria-hidden="true">&times;</span>

						</button>

					</div>

					<div class="modal-body">

						<form class="forms-sample" name="syllabus_form" id="syllabus_form" method="post" enctype="multipart/form-data">

							<div class="row">

								<div class="col-md-12">

									<div class="form-group">

										<label for="exampleInputUsername1">Remark</label>

										<textarea class="form-control" id="remark" name="remark" placeholder="Remark" required></textarea>

										<input type="hidden" name="student_id" id="student_id" value="">

									</div>

								</div>

							</div>

							<button type="submit" id="save_btn" name="save_btn" class="btn btn-primary mr-2" value="reply_submit">Submit</button>

						</form>

					</div>

				</div>

			</div>

		</div>



		<?php include('footer.php');

		$id = 0;

		if ($this->uri->segment(2) != "") {

			$id = $this->uri->segment(2);
		}

		if (isset($_GET['type']) && $_GET['type'] != '') {
			$type = $_GET['type'];
		} else {
			$type = '0';
		}
		?>


		<script>
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

			$(document).ready(function() {
				var type = <?php echo $type; ?>;
				var oldExportAction = function(self, e, dt, button, config) {

					if (button[0].className.indexOf('buttons-excel') >= 0) {

						if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {

							$.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);

						} else {

							$.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);

						}

					} else if (button[0].className.indexOf('buttons-print') >= 0) {

						$.fn.dataTable.ext.buttons.print.action(e, dt, button, config);

					}

				};



				var newExportAction = function(e, dt, button, config) {

					var self = this;

					var oldStart = dt.settings()[0]._iDisplayStart;



					dt.one('preXhr', function(e, s, data) {

						// Just this once, load all data from the server...

						data.start = 0;

						data.length = 2147483647;



						dt.one('preDraw', function(e, settings) {

							// Call the original action function 

							oldExportAction(self, e, dt, button, config);



							dt.one('preXhr', function(e, s, data) {

								// DataTables thinks the first item displayed is index 0, but we're not drawing that.

								// Set the property to what it was before exporting.

								settings._iDisplayStart = oldStart;

								data.start = oldStart;

							});



							// Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.

							setTimeout(dt.ajax.reload, 0);



							// Prevent rendering of the full data to the DOM

							return false;

						});

					});



					// Requery the server with the new one-time export settings

					dt.ajax.reload();

				};



				var table = $('#example').DataTable({

					"lengthChange": true,

					"select": true,

					"processing": true,

					"serverSide": true,

					"responsive": true,

					"cache": false,

					"order": [
						[0, "desc"]
					],



					buttons: [

						{
							extend: "excelHtml5",
							title: "All Admission List",
							messageBottom: 'The information in this table is copyright to Global University.',

							exportOptions: {
								columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27,28,29,30,31,32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43,53, 54, 55, 56, 57, 58,59,60,61,62],
								modifier: {
									search: 'applied',
									order: 'applied'
								},
							},


							customizeData: function(data) {

								for (var i = 0; i < data.body.length; i++) {

									for (var j = 0; j < data.body[i].length; j++) {

										data.body[i][j] = '\u200C' + data.body[i][j];

									}

								}

							},

							action: newExportAction,

						}

					],

					dom: "Bfrtip",



					"ajax": {

						"url": "<?= base_url(); ?>admin/Ajax_controller/get_all_admission_list",

						"type": "POST",

						"data": {
							'start_date': $("#start_date").val(),
							'end_date': $("#end_date").val(),
							'session': $("#session").val(),
							'center': $("#center").val(),
							'type': type
						},

					},

					"complete": function() {

						$('[data-toggle="tooltip"]').tooltip();

					},

				});

				//table.buttons().container().appendTo( '#example_wrapper:eq(0)' );



			});

			function cancel_student(student_id) {

				$('#student_id').val('');



				$('#student_id').val(student_id);

			}

			function chnage_pci(id, value) {

				$.ajax({

					type: "POST",

					url: "<?= base_url(); ?>admin/Ajax_controller/get_update_pci",

					data: {
						'student': id,
						'pci': value
					},

					success: function(data) {



					},

					error: function(jqXHR, textStatus, errorThrown) {

						console.log(textStatus, errorThrown);

					}

				});

			};
		</script>