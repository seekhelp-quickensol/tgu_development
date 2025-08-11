<?php include('header.php'); ?>
<style>

</style>
<div class="main-page second py-5">
	<div class="container">
		<div class="row">
			<div class="layer_data">
				<div class="col-md-12">
					<h2 class="mb-3">Upload Progress Report</h2>
					<ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
						<li class="nav-item"></li>
					</ul>
					<div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1 doc_box">
						<div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" id="printable_div">
								<form class="forms-sample" name="password_form" id="password_form" method="post" enctype="multipart/form-data">
									<div class="col-sm-12 uid_soft_input">
										<div class="form-group">
											<label class="uid_soft_label">Report 1 <?php if (!empty($progress_report) && $progress_report->report_one != '') { ?><a href="<?= $this->Digitalocean_model->get_photo('images/progress_report/' . $progress_report->report_one . ''); ?>">View</a><?php } ?></label>
											<input type="file" class="form-control" name="progress_report_one" id="progress_report_one">
											<input type="hidden" class="form-control" name="old_progress_report_one" id="old_progress_report_one" value="<?php if (!empty($progress_report)) {
																																								echo $progress_report->report_one;
																																							} ?>">
										</div>
									</div>
									<div class="col-sm-12">
										<button type="submit" name="upload_report_1" value="upload_report_1" class="btn btn-primary mr-2 password_submit">Upload</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1 doc_box">
						<div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" id="printable_div">
								<form class="forms-sample" name="password_form" id="password_form" method="post" enctype="multipart/form-data">
									<div class="col-sm-12 uid_soft_input">
										<div class="form-group">
											<label class="uid_soft_label">Report 2 <?php if (!empty($progress_report) && $progress_report->report_two != '') { ?><a href="<?= $this->Digitalocean_model->get_photo('images/progress_report/' . $progress_report->report_two . ''); ?>">View</a><?php } ?></label>
											<input type="file" class="form-control" name="progress_report_two" id="progress_report_two">
											<input type="hidden" class="form-control" name="old_progress_report_two" id="old_progress_report_two" value="<?php if (!empty($progress_report)) {
																																								echo $progress_report->report_two;
																																							} ?>">
										</div>
									</div>
									<div class="col-sm-12">
										<button type="submit" name="upload_report_2" value="upload_report_2" class="btn btn-primary mr-2 password_submit">Upload</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1 doc_box">
						<div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" id="printable_div">
								<form class="forms-sample" name="password_form" id="password_form" method="post" enctype="multipart/form-data">
									<div class="col-sm-12 uid_soft_input">
										<div class="form-group">
											<label class="uid_soft_label">Report 3 <?php if (!empty($progress_report) && $progress_report->report_three != '') { ?><a href="<?= $this->Digitalocean_model->get_photo('images/progress_report/' . $progress_report->report_three . ''); ?>">View</a><?php } ?></label>
											<input type="file" class="form-control" name="progress_report_three" id="progress_report_three">
											<input type="hidden" class="form-control" name="old_progress_report_three" id="old_progress_report_three" value="<?php if (!empty($progress_report)) {
																																									echo $progress_report->report_three;
																																								} ?>">
										</div>
									</div>
									<div class="col-sm-12">
										<button type="submit" name="upload_report_3" value="upload_report_3" class="btn btn-primary mr-2 password_submit">Upload</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1 doc_box">
						<div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" id="printable_div">
								<form class="forms-sample" name="password_form" id="password_form" method="post" enctype="multipart/form-data">
									<div class="col-sm-12 uid_soft_input">
										<div class="form-group">
											<label class="uid_soft_label">Report 4 <?php if (!empty($progress_report) && $progress_report->report_four != '') { ?><a href="<?= $this->Digitalocean_model->get_photo('images/progress_report/' . $progress_report->report_four . ''); ?>">View</a><?php } ?></label>
											<input type="file" class="form-control" name="progress_report_four" id="progress_report_four">
											<input type="hidden" class="form-control" name="old_progress_report_four" id="old_progress_report_four" value="<?php if (!empty($progress_report)) {
																																								echo $progress_report->report_four;
																																							} ?>">
										</div>
									</div>
									<div class="col-sm-12">
										<button type="submit" name="upload_report_4" value="upload_report_4" class="btn btn-primary mr-2 password_submit">Upload</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1 doc_box">
						<div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" id="printable_div">
								<form class="forms-sample" name="password_form" id="password_form" method="post" enctype="multipart/form-data">
									<div class="col-sm-12 uid_soft_input">
										<div class="form-group">
											<label class="uid_soft_label">Report 5 <?php if (!empty($progress_report) && $progress_report->report_five != '') { ?><a href="<?= $this->Digitalocean_model->get_photo('images/progress_report/' . $progress_report->report_five . ''); ?>">View</a><?php } ?></label>
											<input type="file" class="form-control" name="progress_report_five" id="progress_report_five">
											<input type="hidden" class="form-control" name="old_progress_report_five" id="old_progress_report_five" value="<?php if (!empty($progress_report)) {
																																								echo $progress_report->report_five;
																																							} ?>">
										</div>
									</div>
									<div class="col-sm-12">
										<button type="submit" name="upload_report_5" value="upload_report_5" class="btn btn-primary mr-2 password_submit">Upload</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1 doc_box">
						<div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" id="printable_div">
								<form class="forms-sample" name="password" id="password" method="post" enctype="multipart/form-data">
									<div class="col-sm-12 uid_soft_input">
										<div class="form-group">
											<label class="uid_soft_label">Report 6 <?php if (!empty($progress_report) && $progress_report->report_six != '') { ?><a href="<?= $this->Digitalocean_model->get_photo('images/progress_report/' . $progress_report->report_six . ''); ?>">View</a><?php } ?></label>
											<input type="file" class="form-control" name="progress_report_six" id="progress_report_six">
											<input type="hidden" class="form-control" name="old_progress_report_six" id="old_progress_report_six" value="<?php if (!empty($progress_report)) {
																																								echo $progress_report->report_six;
																																							} ?>">
										</div>
									</div>
									<div class="col-sm-12">
										<button type="submit" name="upload_report_6" value="upload_report_6" class="btn btn-primary mr-2 password_submit">Upload</button>
									</div>
								</form>
							</div>
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
		$('#password_form').validate({
			rules: {
				identity_numer: {
					required: true,
				},
				identity_file: {
					required: true,
				},
			},
			messages: {
				identity_numer: {
					required: "Please enter identity numer",
				},
				identity_file: {
					required: "Please select identity softcopy",
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

		// $('#password').validate({
		// 	rules: {
		// 		<?php if (!empty($progress_report) && $progress_report->report_six == '') { ?>
		// 			progress_report_six: {
		// 				required: true,
		// 			},
		// 		<?php } else if (empty($progress_report)) { ?>
		// 			progress_report_six: {
		// 				required: true,
		// 			},
		// 		<?php } ?>
		// 	},
		// 	messages: {
		// 		<?php if (!empty($progress_report) && $progress_report->report_six == '') { ?>
		// 			progress_report_six: {
		// 				required: "Please upload file",
		// 			},
		// 		<?php } else if (empty($progress_report)) { ?>
		// 			progress_report_six: {
		// 				required: "Please upload file",
		// 			},
		// 		<?php } ?>
		// 	},
		// 	errorElement: 'span',
		// 	errorPlacement: function(error, element) {
		// 		error.addClass('invalid-feedback');
		// 		element.closest('.form-group').append(error);
		// 	},
		// 	highlight: function(element, errorClass, validClass) {
		// 		$(element).addClass('is-invalid');
		// 	},
		// 	unhighlight: function(element, errorClass, validClass) {
		// 		$(element).removeClass('is-invalid');
		// 	}
		// });
	});

	$("#identity_file").change(function() {
		var ext = this.value.match(/\.(.+)$/)[1];
		switch (ext) {
			case 'JPEG':
			case 'jpeg':
			case 'jpg':
			case 'pdf':
				break;
			default:
				alert('Only jpg, pdf file supported');
				this.value = '';
		}
	});
</script>