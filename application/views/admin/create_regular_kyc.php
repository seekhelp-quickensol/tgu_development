<?php include('header.php'); ?>
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Link Setting</h4>
							<p class="card-description">
								Please enter link details
							</p>
							<form class="forms-sample" name="session_form" id="session_form" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="exampleInputUsername1">Enrollment Number *</label>
									<input type="text" class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enrollment Number">
									<div class="error" id="session_error"></div>
								</div>

								<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>

							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">KYC Link List</h4>
							<p class="card-description">
								All list of KYC Link
							</p>
							<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>Enrollment Number</th>
										<th>KYC Link</th>
										<th>Created on</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									if (!empty($kyc)) {
										foreach ($kyc as $kyc_result) { ?>
											<tr>
												<td><?= $i++ ?></td>
												<td><?= $kyc_result->enrollment_number ?></td>
												<td>https://personalkyc.org/start_my_kyc/<?= base64_encode($kyc_result->enrollment_number) ?></td>
												<td><?= date("d/m/Y", strtotime($kyc_result->created_on)) ?></td>
												<td>
													<?php
													if ($kyc_result->status == "1") {
													?>
														<a onclick="return confirm('Are you sure, you want to deactivate this record?')" data-toggle='tooltip' title='Deactivate' href="<?= base_url() ?>inactive/<?= $kyc_result->id ?>/tbl_blended_kyc_link" class='btn btn-success btn-sm inactivate_clas'><i class='mdi mdi-bookmark-check'></i></a>
													<?php
													} else { ?>
														<a onclick="return confirm('Are you sure, you want to activate this record?')" data-toggle='tooltip' title='Activate' href="<?= base_url() ?>active/<?= $kyc_result->id ?>/tbl_blended_kyc_link" class='btn btn-danger btn-sm activate_clas'><i class='mdi mdi-playlist-remove'></i></a>
													<?php } ?>
													<a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle='tooltip' title='Permanently Delete' href="<?= base_url() ?>delete/<?= $kyc_result->id ?>/tbl_blended_kyc_link" class='btn btn-danger btn-sm delete_class'><i class='mdi mdi-delete'></i></a>
												</td>
											</tr>
									<?php }
									} ?>
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
		<script>
			$(document).ready(function() {
				$('#example').DataTable({
					dom: 'Bfrtip',
					buttons: [
						'excel'
					]
				});
			});
			$(document).ready(function() {
				jQuery.validator.addMethod("validate_email", function(value, element) {
					if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
						return true;
					} else {
						return false;
					}
				}, "Please enter a valid Email.");
				$('#session_form').validate({
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
			});
		</script>