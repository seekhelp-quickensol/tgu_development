<?php include('header.php'); ?>

<style>
	.card-body .dataTables_wrapper {

		display: block !important;

	}
</style>
<?php
// $result =  $this->Admin_model->get_center_total_amount();
// echo $result;exit;
?>


<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		
	<div class="row mt-4">

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

			<div class="card">

				<div class="card-body">

					<h5 class="card-title">Center Count Registration</h5>

					<div id="center_count"></div>

				</div>

			</div>

		</div>

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

		<div class="card">

			<div class="card-body">

				<h5 class="card-title">Total Amount</h5>

				<div id="total_amount"></div>

			</div>

		</div>

		</div>

	</div>
		<div class="row mt-4">

			<div class="col-lg-12 grid-margin stretch-card">

				<div class="card">

					<div class="card-body">

						<h5 class="card-title">Student Admission Month Count</h5>

						<div id="month_count"></div>
					</div>

				</div>

			</div>
		</div>

	<div class="content-wrapper">

<div class="row mt-12">

	<div class="col-lg-12 grid-margin stretch-card p-0">

		<div class="card col-lg-12">

			<div class="card-body">

				<h4 class="card-title">Birthday List</h4>

				<p class="card-description">

					All Birthdays

				</p>

				<div class="col-lg-2">

					<label for="exampleInputUsername1">Select Month *</label>

					<select type="text" class="form-control js-example-basic-single select2_single" id="birthday_month" name="birthday_month">

						<option value="">Select Month</option>

						<option value="01" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '01') { ?> selected="selected" <?php } ?>>January</option>

						<option value="02" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '02') { ?> selected="selected" <?php } ?>>February</option>

						<option value="03" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '03') { ?> selected="selected" <?php } ?>>March</option>

						<option value="04" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '04') { ?> selected="selected" <?php } ?>>April</option>

						<option value="05" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '05') { ?> selected="selected" <?php } ?>>May</option>

						<option value="06" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '06') { ?> selected="selected" <?php } ?>>June</option>

						<option value="07" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '07') { ?> selected="selected" <?php } ?>>July</option>

						<option value="08" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '08') { ?> selected="selected" <?php } ?>>August</option>

						<option value="09" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '09') { ?> selected="selected" <?php } ?>>September</option>

						<option value="10" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '10') { ?> selected="selected" <?php } ?>>October</option>

						<option value="11" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '11') { ?> selected="selected" <?php } ?>>November</option>

						<option value="12" <?php if (!empty($this->uri->segment(2)) && $this->uri->segment(2) == '12') { ?> selected="selected" <?php } ?>>December</option>

					</select>

				</div>

				<div class="card-body">

					<table id="example1" class="table table-striped table-bordered dataTable" style="display:block;">

						<thead>

							<tr>

								<th width="10%">Sr. No.</th>

								<th width="40%">Name</th>

								<th width="40%">Type</th>

								<th width="10%">Date of Birth</th>

							</tr>

						</thead>

						<tbody>

							<?php $i = 1; ?>

							<?php if (!empty($all_birthdays[0])) { ?>

								<?php foreach ($all_birthdays[0] as $guide) { ?>

									<tr>

										<td><?= $i++ ?></td>

										<td><?= $guide->name ?></td>

										<td>Guide</td>

										<!-- <td><?php echo date("d-m-Y", strtotime($guide->date_of_birth)); ?></td> -->

										<td>

											<?php

											if (!empty($guide->date_of_birth)) {

												echo date("d-m-Y", strtotime($guide->date_of_birth));
											} else {

												echo "NA";
											}

											?>

										</td>

									</tr>

								<?php } ?>

							<?php } ?>

							<?php if (!empty($all_birthdays[1])) {  ?>

								<?php foreach ($all_birthdays[1] as $employee) { ?>

									<tr>

										<td><?= $i++ ?></td>

										<td><?= $employee->first_name ?> <?= $employee->last_name ?></td>

										<td>Employee</td>

										<!-- <td><?php echo date("d-m-Y", strtotime($employee->date_of_birth)); ?></td> -->

										<td>

											<?php

											if (!empty($employee->date_of_birth)) {

												echo date("d-m-Y", strtotime($employee->date_of_birth));
											} else {

												echo "NA";
											}

											?>

										</td>

									</tr>

								<?php } ?>

							<?php } ?>

							<?php if (!empty($all_birthdays[2])) {  ?>

								<?php foreach ($all_birthdays[2] as $staff) { ?>

									<tr>

										<td><?= $i++ ?></td>

										<td><?= $staff->first_name ?> <?= $staff->last_name ?></td>

										<td>Staff</td>

										<!-- <td><?php echo date("d-m-Y", strtotime($staff->date_of_birth)); ?></td> -->

										<td>

											<?php

											if (!empty($staff->date_of_birth)) {

												echo date("d-m-Y", strtotime($staff->date_of_birth));
											} else {

												echo "NA";
											}

											?>

										</td>

									</tr>

								<?php } ?>

							<?php } ?>

							<?php if (empty($all_birthdays[0]) && empty($all_birthdays[1]) && empty($all_birthdays[2])) { ?>

								<tr>

									<td class="text-center" colspan="4">No Data Available</td>

								</tr>

							<?php } ?>

						</tbody>

					</table>

				</div>

			</div>

		</div>

	</div>

	<?php if ($this->session->userdata('admin_id') == "51" || $this->session->userdata('admin_id') == "25") { ?>

		<div class="card col-lg-12">

			<div class="card-body">

				<h2>Logs Data <a href="<?= base_url(); ?>all_logs_view" class="btn btn-primary pull-right">View All</a></h2>

				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

					<thead>

						<tr>

							<th>Sr. No.</th>

							<th>Emp Code</th>

							<th>Name</th>

							<th>Log</th>

							<th>Date</th>

						</tr>

					</thead>

					<tbody id="">

						<?php $i = 1;
						if (!empty($logs)) {
							foreach ($logs as $logs_result) { ?>

								<tr>

									<td><?= $i++ ?></td>

									<td><?= $logs_result->employee_code ?></td>

									<td><?= $logs_result->first_name . ' ' . $logs_result->last_name ?></td>

									<td><?= $logs_result->description ?></td>

									<td><?= date("d/m/Y H:i A", strtotime($logs_result->created_on)) ?></td>

								</tr>

						<?php }
						} ?>

					</tbody>

				</table>

			</div>

		</div>

	<?php } ?>

</div>

</div>



		</div>

	</div>

</div>

</div>

<?php include('footer.php'); ?>



<script>
	document.addEventListener("DOMContentLoaded", () => {

		new ApexCharts(document.querySelector("#month_count"), {

			series: [{

				name: 'Student',

				data: [<?php

						for ($d = 1; $d <= 12; $d++) {

							$month = '';

							if (strlen($d) == 1) {

								$month = '0' . $d;
							} else {

								$month = $d;
							}

							$result =  $this->Admin_model->get_monthly_count_admission($month);
							echo $result . ",";
						}

						?>]

			}, {

				name: 'Separate Student',

				data: [<?php



						for ($d = 1; $d <= 12; $d++) {

							$month = '';

							if (strlen($d) == 1) {

								$month = '0' . $d;
							} else {

								$month = $d;
							}

							$result =  $this->Admin_model->get_monthly_count_admission_seperate($month);

							echo $result . ",";
						}

						?>]

			}],

			chart: {

				type: 'bar',

				height: 350

			},

			plotOptions: {

				bar: {

					horizontal: false,

					columnWidth: '55%',

					endingShape: 'rounded'

				},

			},

			dataLabels: {

				enabled: false

			},

			stroke: {

				show: true,

				width: 2,

				colors: ['transparent']

			},

			xaxis: {

				categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

			},

			yaxis: {

				title: {

					text: ' Student Count'

				}

			},

			fill: {

				opacity: 1

			},

			tooltip: {

				y: {

					formatter: function(val) {

						return " " + val + " "

					}

				}

			}

		}).render();

	});
</script>

<script>
	document.addEventListener("DOMContentLoaded", () => {

		new Chart(document.querySelector('#month_count_option'), {

			type: 'bar',

			data: {

				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],

				datasets: [{

					label: 'Bar Chart',

					data: [65, 59, 80, 81, 56, 55, 40],

					backgroundColor: [

						'rgba(255, 99, 132, 0.2)',

						'rgba(255, 159, 64, 0.2)',

						'rgba(255, 205, 86, 0.2)',

						'rgba(75, 192, 192, 0.2)',

						'rgba(54, 162, 235, 0.2)',

						'rgba(153, 102, 255, 0.2)',

						'rgba(201, 203, 207, 0.2)'

					],

					borderColor: [

						'rgb(255, 99, 132)',

						'rgb(255, 159, 64)',

						'rgb(255, 205, 86)',

						'rgb(75, 192, 192)',

						'rgb(54, 162, 235)',

						'rgb(153, 102, 255)',

						'rgb(201, 203, 207)'

					],

					borderWidth: 1

				}]

			},

			options: {

				scales: {

					y: {

						beginAtZero: true

					}

				}

			}

		});

	});
</script>

<script>
	document.addEventListener("DOMContentLoaded", () => {

		new ApexCharts(document.querySelector("#center_count"), {

			series: [{

				name: "Center Count Registration",

				data: [<?php

						//echo "45,234"	;

						for ($d = 1; $d <= 12; $d++) {

							$month = '';

							if (strlen($d) == 1) {

								$month = '0' . $d;
							} else {

								$month = $d;
							}

							$result =  $this->Admin_model->get_monthly_count_center($month);

							echo $result . ",";
						}

						?>]

			}],

			chart: {

				height: 350,

				type: 'line',

				zoom: {

					enabled: false

				}

			},

			dataLabels: {

				enabled: false

			},

			stroke: {

				curve: 'straight'

			},

			grid: {

				row: {

					colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns

					opacity: 0.5

				},

			},

			xaxis: {

				categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

			}

		}).render();

	});
</script>

<script>
	document.addEventListener("DOMContentLoaded", () => {

		new ApexCharts(document.querySelector("#total_amount"), {

			series: [<?php
						$result =  $this->Admin_model->get_student_total_amount();

						echo $result;
						
						?>, <?php

						$result =  $this->Admin_model->get_separate_student_total_amount();
						echo $result;
						?>, <?php
						$result =  $this->Admin_model->get_center_total_amount();

						echo $result;
						?>],

			chart: {

				height: 362,

				type: 'pie',

				toolbar: {

					show: true

				}

			},

			labels: ['Student', 'Seperate', 'Center', ]

		}).render();

	});
</script>



<!-- birthdays -->

<script>
	$(document).ready(function() {

		$('#example1').DataTable();

	});

	$(document).ready(function() {

		$('#example').DataTable();

	});

	$("#birthday_month").change(function() {

		window.location.href = "<?= base_url(); ?>erp-dashboard/" + $("#birthday_month").val();

	});
</script>