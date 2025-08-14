<?php include('header.php'); ?>

<style>
	/* Tooltip container */

	.tooltip_old {

		position: relative;

		display: inline-block;

	}

	.btn.btn-primary.row-btns {
		height: 48px !important;
	}

	/* Tooltip text */

	.tooltip_old .tooltiptext_old {

		visibility: hidden;

		background-color: #333;

		color: #fff;

		text-align: center;

		border-radius: 6px;

		padding: 5px;

		position: absolute;

		z-index: 1;

		bottom: 150%;

		left: 50%;

		margin-left: -60px;

	}



	/* Tooltip arrow */

	.tooltip_old .tooltiptext_old::after {

		content: "";

		position: absolute;

		top: 100%;

		left: 50%;

		margin-left: -5px;

		border-width: 5px;

		border-style: solid;

		border-color: #333 transparent transparent transparent;

	}



	/* Show the tooltip text when hovering over the tooltip container */

	.tooltip_old:hover .tooltiptext_old {

		visibility: visible;

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
													} ?> Failed Admission Student List</h4>
							<p class="card-description">

							<p class="card-description">

								All list of Student

							</p>

							<form class="mb-3" method="get" id="searchForm">

								<div class="row">

									<div class="col-md-4">

										<input type="text" autocomplete="off" name="start_date" id="start_date" class="form-control datepicker" placeholder="Start Date" value="<?php if (isset($_GET['start_date'])) {
																																													echo $_GET['start_date'];
																																												} ?>">

									</div>

									<div class="col-md-4">

										<input type="text" autocomplete="off" name="end_date" id="end_date" class="form-control datepicker" placeholder="End Date" value="<?php if (isset($_GET['end_date'])) {
																																												echo $_GET['end_date'];
																																											} ?>">

									</div>

									<div class="col-md-4">

										<button type="submit" class="btn btn-primary row-btns search_button">Search</button>
										<a type="button" class="btn btn-primary row-btns" href="<?= base_url(); ?><?= $this->uri->segment(1); ?>">Reset</a>

									</div>

								</div>
							</form>

							<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

								<thead>
									<tr>
										<th>Sr. No.</th>

										<th>Registration No</th>

										<th>Admission Date</th>

										<th>Center Name</th>

										<th>Employee Type</th>

										<th>Student Name</th>

										<th>Father/Husband Name</th>

										<th>Father/Husband Profession</th>

										<th>Mother Name</th>

										<th>Mobile Number</th>

										<th>Email</th>
										<th>ABC/APAAR ID</th>

										<th>Session</th>

										<th>Faculty</th>
										<th>Course Type</th>
										<th>Course Name</th>
										<th>Stream Name</th>
										<th>Course Mode</th>
										<th>Entry Type</th>
										<th>Study Mode</th>
										<th>Current Year/Sem/Month</th>
										<th>Date of Birth</th>
										<th>Gender</th>
										<th>Category</th>
										<th>Employment Details</th>
										<th>Country</th>
										<th>Pin Code</th>
										
										<!-- <th>Payment Mode</th> -->
										<!-- <th>Late Fees</th>	 -->
										<!-- <th>Admission Fees</th>	 -->
										<!-- <th>Total Admission Fees</th> -->
										
										<!-- <th>Identity Type</th>
										<th>Identity Number</th>
										<th>Identity Softcopy</th> -->
										<th>ID Type</th>
										<th>ID Number</th>
										<th>NOC</th>
										<th>Signature</th>
										<th>ID Softcopy</th>
										<th>Permission Letter</th>
										<th>Photo</th>
										<th>Undertaking</th>
										<th>Affidavit</th>
										<th>Nationality</th>
										<th>Religion</th>
										<th>Religion Specify</th>
										<th>Address</th>
										<th>City</th>
										<th>State</th>																				<th>Anti-Ragging Reference ID of Student</th>																				<th>Anti-Ragging Reference ID of Parents</th>																				<th>Old Migration</th>
										<th>Pending Remarks</th>
										<th>Enter Pending Remark</th>
										<th>Action</th>
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

		<!-- <script>
    function resetForm() {
        document.getElementById("searchForm").reset();
    }
</script> -->

		<script>
			function resetForm() {
				document.getElementById("searchForm").reset();
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

					"lengthChange": false,

					"processing": true,

					"serverSide": true,

					"responsive": true,

					"cache": false,

					"order": [
						[0, "desc"]
					],

					buttons: [{
							extend: "excelHtml5",
							title: "Failed Admission Student List",
							messageBottom: 'The information in this table is copyright to the global University.',
							exportOptions: {
								columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 36, 37, 38, 39,40,41,42,43,44],
								modifier: {
									search: 'applied',
									order: 'applied'
								},

							},


							action: newExportAction,

						}

					],

					dom: "Bfrtip",
					"ajax": {

						"url": "<?= base_url(); ?>admin/Ajax_controller/get_all_new_admission_pending",

						"type": "POST",

						"data": {
							'start_date': $("#start_date").val(),
							'end_date': $("#end_date").val(),
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

		<!-- <script>

    var tooltipText = document.querySelector('.tooltiptext_old');

    tooltipText.style.width = tooltipText.offsetWidth + 'px';

    tooltipText.style.height = tooltipText.offsetHeight + 'px';

</script>
 -->