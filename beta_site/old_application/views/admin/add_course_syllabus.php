<?php include('header.php'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/croppie.css">
<style>
	@keyframes loading {

		0%,
		20% {
			opacity: 1;
		}

		40%,
		60% {
			opacity: 0;
		}

		80%,
		100% {
			opacity: 1;
		}
	}

	#loader span {
		display: inline-block;
		width: 8px;
		height: 8px;
		background-color: #000;
		border-radius: 50%;
		margin: 0 2px;
		animation: loading 1.4s infinite;
	}

	#loader .dot1 {
		animation-delay: 0s;
	}

	#loader .dot2 {
		animation-delay: 0.2s;
	}

	#loader .dot3 {
		animation-delay: 0.4s;
	}

	#loader .dot4 {
		animation-delay: 0.6s;
	}

	.close_crop_model {
		padding: 6px 44px !important;
	}
</style>
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-6 grid-margin stretch-card priviledge-form">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Add Syllabus</h4>
							<p class="card-description">
								Please enter Syllabus details
							</p>
							<form class="forms-sample" name="id_form" id="id_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col col-md-12">
										<div class="form-group">
											<label class=" form-control-label">Faculty * </label>
											<select name="faculty" id="faculty" class="form-control js-example-basic-single">
												<option value="">Select Faculty</option>
												<?php if (!empty($faculty)) {
													foreach ($faculty as $result) { ?>
														<option value="<?= $result->id; ?>" <?php if (!empty($single) && $single->faculty == $result->id) {
																								echo 'selected';
																							} ?>><?= $result->faculty_name; ?> [<?= $result->faculty_code; ?>]</option>
												<?php }
												} ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col col-md-6">
										<div class="form-group">
											<label class=" form-control-label">Course Name *</label>
											<input type="text" name="course_name" id="course_name" class="form-control" value="<?php if (!empty($single)) {
																																	echo $single->course_name;
																																} ?>" placeholder="Course Name">
										</div>
									</div>
									<div class="col col-md-6">
										<div class="form-group">
											<label class=" form-control-label">Year/Sem *</label>
											<input type="text" name="year_sem" id="year_sem" class="form-control" value="<?php if (!empty($single)) {
																																echo $single->year_sem;
																															} ?>" placeholder="Year/Sem">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col col-md-12">
										<div class="form-group">
											<label class=" form-control-label">File *
												<?php if (!empty($single) && $single->file != "") { ?>
													<a href="<?= $this->Digitalocean_model->get_photo('course_syllabus/' . $single->file) ?>" target="_blank" class="btn btn-info btn-small">View</a>
												<?php } ?>
											</label>
											<input accept=".pdf" type="file" name="file" id="file" class="form-control">
											<input type="hidden" name="old_file" id="old_file" class="form-control" value="<?php if (!empty($single)) {
																																echo $single->file;
																															} ?>">
											<input type="hidden" name="id" id="id" class="form-control" value="<?php if (!empty($single)) {
																													echo $single->id;
																												} ?>">
										</div>
									</div>
								</div>
								<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Syllabus List</h4>
							<p class="card-description">
								All list of Syllabus
							</p>
							<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
								<thead>
									<tr>
										<th>Sr.No</th>
										<!-- <th>Status</th>  -->
										<th>Faculty</th>
										<th>Course Name</th>
										<th>Year/Sem</th>
										<th>File</th>
										<th class="">Action</th>

									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
							<?php
							// echo '<pre>';print_r($course_result);
							// if(!empty($course_result)){ 
							// 	for($i=0;$i<count($course_result);$i++){
							?>
							<!-- <div class="panel panel-default"> 
					<div class="panel-heading" role="tab" id="heading_<?= $course_result[$i]['faculty_id']; ?>"> 
						<h4 class="panel-title"> 
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?= $course_result[$i]['faculty_id']; ?>" aria-expanded="true" aria-controls="collapse_<?= $course_result[$i]['faculty_id']; ?>"> 
								<i class="more-less glyphicon glyphicon-plus"></i> 
								<?= $course_result[$i]['faculty_name'] . ' [' . $course_result[$i]['faculty_code'] . ']'; ?>
							</a> 
						</h4> 
					</div> 
						<div id="collapse_<?= $course_result[$i]['faculty_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?= $course_result[$i]['faculty_id']; ?>"> 
						<div class="panel-body">   
							<table> 
								<thead>
									<tr> 
										<th class="align_center">SR.NO</th> 
										<th class="align_center">NAME</th> 
										<th class="align_center">YEAR/SEM</th> 
										<th class="align_center">DOWNLOAD</th> 
									</tr> 
								</thead>
								<tbody>
									<?php
									if (!empty($course_result[$i]['result'])) {
										foreach ($course_result[$i]['result'] as $data) {
									?>
									<tr> 
										<td class="align_center"><?= $j++; ?></td> 
										<td><?= $data->course_name; ?></td> 
										<td class="align_center"><?= $data->year_sem; ?></td> 
										<td class="align_center"><a href="<?= $this->Digitalocean_model->get_photo('course_syllabus/' . $data->file) ?>" target="_blank"><img src="<?= $this->Digitalocean_model->get_photo('images/pdf.png') ?>" class="image_height"></a></td> 
									</tr> 
									<?php }
									} ?>
								</tbody> 
							</table>
						</div>
					</div>
				</div> -->
							<?php
							// }}else{ 
							?>
							<!-- <div class="panel panel-default"> 
						<h4 class="panel-title"> 
							Course Syllabus not available.
						</h4> 
				</div>  -->
							<?php
							// } 
							?>
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
		<script src="<?= base_url(); ?>back_panel/js/croppie.js"></script>
		<script>
			$(document).ready(function() {
				$('#id_form').validate({
					ignore: ":hidden:not(select)",
					rules: {
						faculty: "required",
						course_name: "required",
						year_sem: "required",
						<?php if (empty($single)) { ?>
							file: "required",
						<?php } ?>
					},
					messages: {
						faculty: "Please select faculty",
						course_name: "Please enter course name",
						year_sem: "Please enter year/sem",
						<?php if (empty($single)) { ?>
							file: "Please upload file",
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

			$('#faculty').on('change', function() {
				$('#faculty').valid();
			});

			$(document).ready(function() {
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
						title: "Syllabus List",
						messageBottom: 'The information in this table is copyright to The Global University.',
						exportOptions: {
							columns: [0, 1, 2, 3],
							modifier: {
								search: 'applied',
								order: 'applied'
							},
						},
						action: newExportAction,
					}],
					dom: "Bfrtip",

					"ajax": {
						"url": "<?= base_url(); ?>admin/Ajax_controller/get_all_syllabus_ajax",
						"type": "POST",
					},
					"complete": function() {
						$('[data-toggle="tooltip"]').tooltip();
					},
				});
				//table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

			});
		</script>