<?php include('header.php'); ?>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<div class="container-fluid page-body-wrapper">

	<div class="main-panel">

		<div class="content-wrapper">

			<div class="row">

				

			<div class="col-md-12 grid-margin stretch-card">

				<div class="card">

					<div class="card-body">

						<h4 class="card-title">Pending For Approval Course List</h4>

						<p class="card-description">

							All list of pending course

						</p>



						<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

							<thead>

								<tr>

									<th>Sr. No.</th>

									<th>Course Type</th>

									<th>Course Name</th>

									<th>Print Name</th>

									<th>Sort Name</th>

									<th>Similar Courses</th>
									<th>Action</th>

								</tr>

							</thead>

							<tbody id="">
								<?php 
									$similer_courses = [];
									if (!empty($course_result)) {
										$i = 1;
										foreach ($course_result as $course_results) {
											$similer_courses = $this->Course_model->get_similar_courses($course_results->course_name, $course_results->id);
								?>
											<tr>
												<td><?=$i++;?></td>
												<td>
													<?php
														if ($course_results->course_type == 0) {
															echo "Regular";
														} else if ($course_results->course_type == 2) {
															echo "B.Voc";
														} else {
															echo "Pulp";
														}
													?>
												</td>
												<td><?=$course_results->course_name . ' (Id: ' . $course_results->id . ')'?></td>
												<td><?=$course_results->print_name?></td>
												<td><?=$course_results->sort_name?></td>
												<td>
													<?php if (!empty($similer_courses)) {
														$c = 1;
														foreach ($similer_courses as $similer_courses_result) {
															if ($course_results->id != $similer_courses_result['id']) {
													?>
																<?=$c . '. ' . $similer_courses_result['course_name'] . ' (Id: ' . $similer_courses_result['id'] . ')<br>';?>
													<?php $c++; } } } else { ?>
														-
													<?php } ?>
												</td>
												<td>
													<?php if($course_results->is_approved == '0'){?>
														<a onclick="return confirm('Are you sure, you want to approve this course?')" data-toggle='tooltip' title='Approve Course' href="<?=base_url();?>approve_course/<?=$course_results->id;?>" class='btn btn-success btn-sm approve_course'><i class='mdi mdi-bookmark-check'></i></a> 
														<a onclick="return confirm('Are you sure, you want to reject this course?')" data-toggle='tooltip' title='Reject Course' href="<?=base_url();?>reject_course/<?=$course_results->id;?>" class='btn btn-danger btn-sm reject_course'><i class='mdi mdi-playlist-remove'></i></a>	
													<?php }?>
												</td>
											</tr>
								<?php } } ?>
							</tbody>

						</table>



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

	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

	<script>
		
	


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

				"processing": false,

				"serverSide": false,

				"responsive": true,

				"cache": false,

				"order": [

					[0, "asc"]

				],

				buttons: [



					{

						extend: "excelHtml5",

						title: "Manage Course",

						messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',

						exportOptions: {

							columns: [0, 1, 2, 3],

							modifier: {

								search: 'applied',

								order: 'applied'

							},

						},

						action: newExportAction,

					}

				],

				dom: "Bfrtip",
				
				"complete": function() {

					$('[data-toggle="tooltip"]').tooltip();

				},

			});

			//table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
		});


	</script>