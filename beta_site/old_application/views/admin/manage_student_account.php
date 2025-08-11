<?php include('header.php'); ?>
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Account Details</h4>
							<p class="card-description">
								Please enter account details
							</p>
							<form class="forms-sample" name="bank_form" id="bank_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Bank Name *</label>
											<select class="form-control" id="bank" name="bank">
												<option value="">Select Bank</option>
												<?php if (!empty($bank)) {
													foreach ($bank as $bank_result) { ?>
														<option value="<?= $bank_result->id ?>" <?php if (!empty($single) && $single->bank_id == $bank_result->id) { ?>selected="selected" <?php } ?>><?= $bank_result->bank_name ?> | <?= $bank_result->account_number ?></option>
												<?php }
												} ?>
											</select>
											<div class="error" id="id_name_error"></div>
											<input type="hidden" class="form-control" id="student_id" name="student_id" value="<?php if (!empty($student)) {
																																	echo $student->id;
																																} ?>">
											<input type="hidden" class="form-control" id="id" name="id" value="<?php if (!empty($single)) {
																													echo $single->id;
																												} else {
																													echo "0";
																												} ?>">
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Transaction No *</label>
											<input type="text" autocomplete="off" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction Number" value="<?php if (!empty($single)) {
																																																echo $single->transaction_id;
																																															} ?>">
											<div class="error" id="transaction_error"></div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Year/Sem*</label>
											<select class="form-control" id="year_sem" name="year_sem">
												<option value="">Select</option>
												<?php for ($s = 1; $s <= 12; $s++) { ?>
													<option value="<?= $s ?>" <?php if (!empty($single) && $single->year_sem == $s) { ?>selected="selected" <?php } ?>><?= $s ?></option>
												<?php } ?>
											</select>
										</div>

									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Fees Type *</label>
											<select class="form-control" id="fees_type" name="fees_type">
												<option value="">Select</option>
												<option value="1" <?php if (!empty($single) && $single->fees_type == "1") { ?>selected="selected" <?php } ?>>Admission</option>
												<option value="4" <?php if (!empty($single) && $single->fees_type == "4") { ?>selected="selected" <?php } ?>>RR Fees</option>
												<option value="2" <?php if (!empty($single) && $single->fees_type == "2") { ?>selected="selected" <?php } ?>>Examination</option>
												<option value="3" <?php if (!empty($single) && $single->fees_type == "3") { ?>selected="selected" <?php } ?>>Degree</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Payment Mode *</label>
											<select class="form-control" id="payment_mode" name="payment_mode">
												<option value="">Select Mode</option>
												<option value="1" <?php if (!empty($single) && $single->payment_mode == "1") { ?>selected="selected" <?php } ?>>Online</option>
												<option value="2" <?php if (!empty($single) && $single->payment_mode == "2") { ?>selected="selected" <?php } ?>>Challan</option>
												<option value="3" <?php if (!empty($single) && $single->payment_mode == "3") { ?>selected="selected" <?php } ?>>Cash</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Payment Date *</label>
											<input type="text" class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Payment Date" value="<?php if (!empty($single) && $single->payment_date != "0000:00:00" && $single->payment_date != "1970:01:01") {
																																											echo date("d-m-Y", strtotime($single->payment_date));
																																										} ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Payment Status *</label>
											<select class="form-control" id="payment_status" name="payment_status">
												<option value="">Select Mode</option>
												<option value="1" <?php if (!empty($single) && $single->payment_status == "1") { ?>selected="selected" <?php } ?>>Success</option>
												<option value="0" <?php if (!empty($single) && $single->payment_status == "0") { ?>selected="selected" <?php } ?>>Failed</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Late Fees *</label>
											<input type="text" class="form-control discount" id="late_fees" name="late_fees" placeholder="Late Fees" value="<?php if (!empty($single)) {
																																								echo $single->late_fees;
																																							} ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Bank Fees *</label>
											<input type="text" class="form-control discount" id="bank_fees" name="bank_fees" placeholder="Bank Fees" value="<?php if (!empty($single)) {
																																								echo $single->bank_fees;
																																							} ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Discount (%)*</label>
											<input type="text" class="form-control discount" id="discount" name="discount" placeholder="Discount" value="<?php if (!empty($single)) {
																																								echo $single->discount;
																																							} ?>">
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Registration Fees *</label>
											<input type="text" class="form-control discount" id="registration_fees" name="registration_fees" placeholder="Registration Fees" value="<?php if (!empty($single)) {
																																														echo $single->registration_fees;
																																													} ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Fees *</label>
											<input type="text" class="form-control discount" id="amount" name="amount" placeholder="Fees" value="<?php if (!empty($single)) {
																																						echo $single->amount;
																																					} ?>">
										</div>
									</div>


									<div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputUsername1">Total Fees *</label>
											<input type="text" class="form-control" id="total_fees" name="total_fees" placeholder="Total Fees" value="<?php if (!empty($single)) {
																																							echo $single->total_fees;
																																						} ?>">
										</div>
									</div>
									<div class="col-md-7">
										<div class="form-group">
											<label for="exampleInputUsername1">Remark</label>
											<input type="text" class="form-control" id="remark" name="remark" placeholder="Remark" value="<?php if (!empty($single)) {
																																				echo $single->remark;
																																			} ?>">
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-12">
										<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Account List of <?php if (!empty($student)) {
																	echo $student->student_name;
																} ?></h4>
						<div class="row">
							<?php $payable_amt = 0;
							if (!empty($student)) {
								$payable_amt = $this->Student_model->get_student_total_payable_fees($student->id);
							}

							?>
							<div class="col-lg-3">
								<h5 class="card-title">Total Payable Fees: ₹ <?= number_format($payable_amt, 2); ?></h5>
							</div>
							<?php $total_paid_amt = 0;
							if (!empty($paid_amt)) {
								foreach ($paid_amt as $paid_amt_result) {
									$total_paid_amt = $total_paid_amt + $paid_amt_result->amount + $paid_amt_result->registration_fees;
								}
							}
							?>
							<div class="col-lg-3">
								<h5 class="card-title">Total Paid Admission Fees: ₹ <?= number_format($total_paid_amt, 2); ?> </h5>
							</div>
							<?php $total_exam_amt = 0;
							if (!empty($exam_amt)) {
								foreach ($exam_amt as $exam_amt_result) {
									$total_exam_amt = $total_exam_amt + $exam_amt_result->amount;
								}
							}
							?>
							<div class="col-lg-3">
								<h5 class="card-title">Total Paid Exam Fees: ₹ <?= number_format($total_exam_amt, 2); ?> </h5>
							</div>
							<?php if (!empty($student) && $student->admission_type == '1') { ?>
								<div class="col-lg-3">
									<!-- <h5 class="card-title">Lateral Entry Fees: ₹ <?= number_format($lateral_amt, 2); ?> </h5> -->
									<h5 class="card-title">Lateral Entry Fees: ₹ <?= number_format($single_lateral_fee->lateral_entry_fees, 2); ?></h5>
								</div>
							<?php } ?>

							<div class="col-lg-3">
								<h5 class="card-title">Registration Fees: ₹ <?= number_format($single_registration_fee->registration_fees, 2); ?> </h5>
							</div>

						</div>
						<p class="card-description">
							All list of Payment's
						</p>
						<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
							<thead>
								<tr>
									<th>Sr. No.</th>
									<th>Status</th>
									<th>Fees Type</th>
									<th>Payment Mode</th>
									<th>Payment Date</th>
									<th>Transaction ID</th>
									<th>Year/Sem</th>
									<th>Late Fee</th>
									<th>Bank Fee</th>
									<th>Discount</th>
									<th>Lateral Entry Fees</th>
									<th>Registration Fees</th>
									<th>Fees</th>
									<th>Total Fees</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$access = $this->Setting_model->get_user_privilege_link();
								$i = 1;
								if (!empty($payment)) {
									foreach ($payment as $payment_result) { ?>
										<tr>
											<td><?= $i++ ?></td>
											<td>
												<?php
												if ($payment_result->payment_status == "1") {
													echo "Success";
												} else {
													echo "Failed";
												}
												?>
											</td>
											<td>
												<?php
												$fee_type = "";
												if ($payment_result->fees_type == "1") {
													$fee_type = "Admission";
												} else if ($payment_result->fees_type == "2") {
													$fee_type = "Examination";
												} else if ($payment_result->fees_type == "3") {
													$fee_type = "Degree";
												} else if ($payment_result->fees_type == "4") {
													$fee_type = "RR Fees";
												}
												echo $fee_type;
												?>
											</td>
											<td>
												<?php
												$payment_mode = "";
												if ($payment_result->payment_mode == "1") {
													$payment_mode = "Online";
												} else if ($payment_result->payment_mode == "2") {
													$payment_mode = "Challan";
												} else if ($payment_result->payment_mode == "3") {
													$payment_mode = "Cash";
												} else if ($payment_result->payment_mode == "4") {
													$payment_mode = "Wallet";
												}
												echo $payment_mode;
												?>
											</td>
											<td><?= date("d/m/Y", strtotime($payment_result->payment_date)) ?></td>
											<td><?= $payment_result->transaction_id ?></td>
											<td><?= $payment_result->year_sem ?></td>
											<td><?= $payment_result->late_fees ?></td>
											<td><?= $payment_result->bank_fees ?></td>
											<td><?= $payment_result->discount ?></td>
											<td><?= $payment_result->lateral_entry_fees; ?></td>
											<td><?= $payment_result->registration_fees ?></td>
											<td><?= $payment_result->amount ?></td>
											<td><?= $payment_result->total_fees ?></td>
											<td>
												<a type="button" title="Edit" data-toggle="tooltip" href="<?= base_url() ?>manage_student_account/<?= $this->uri->segment(2) ?>/<?= $payment_result->id ?>" class='btn btn-success btn-sm edit_student_payment'><i class='mdi mdi-table-edit'></i></a>
												<a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle="tooltip" title="Permanently Delete" href="<?= base_url() ?>delete/<?= $payment_result->id ?>/tbl_student_fees" class='btn btn-danger btn-sm delete_student_payment'><i class='mdi mdi-delete'></i></a>
												<?php if (in_array('print_admission_receipt', $access)) { ?>
													<!--<a type='button' title='Print' target='_blank' data-toggle='tooltip' href="<?= base_url() ?>print_admission_receipt/<?= $this->uri->segment(2) ?>/<?= $payment_result->id ?>" class='btn btn-success btn-sm'><i class='mdi mdi-eye'></i></a>-->
												<?php } ?>
												<a target="_blank" data-toggle="tooltip" title="Print Receipt" href="<?=base_url()?>print_payment_receipt/<?=$payment_result->id?>/tbl_student" class="btn btn-danger btn-sm"><i class="mdi mdi mdi-printer"></i></a>
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
			jQuery.validator.addMethod("validate_email", function(value, element) {
				if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
					return true;
				} else {
					return false;
				}
			}, "Please enter a valid Email.");


			$.validator.addMethod("noSpaceatfirst", function (value, element) {
				return this.optional(element) || /^\s/.test(value) === false;
			}, "First Letter Can't Be Space!");
			
			$.validator.addMethod("alphabetsOnly", function(value, element) {
				return /^[a-zA-Z_ ]+$/.test(value);
			});
			$('#bank_form').validate({
				rules: {
					bank: {
						required: true,
					},
					transaction_id: {
						required: true,
						noSpaceatfirst:true,
					},
					year_sem: {
						required: true,
					},
					fees_type: {
						required: true,
					},
					payment_mode: {
						required: true,
					},
					payment_date: {
						required: true,
					},
					payment_status: {
						required: true,
					},
					late_fees: {
						required: true,
						number: true,
					},
					bank_fees: {
						required: true,
						number: true,
					},
					discount: {
						required: true,
						number: true,
					},
					amount: {
						required: true,
						number: true,
					},
					registration_fees: {
						required: true,
						number: true,
					},
					total_fees: {
						required: true,
						number: true,
					},
					remark:{
						noSpaceatfirst:true,
					},
				},
				messages: {
					bank: {
						required: "Please select bank",
					},
					transaction_id: {
						required: "Please select transaction id",
						noSpaceatfirst: "First letter can't be space",
					},
					year_sem: {
						required: "Please select year/sem",
					},
					fees_type: {
						required: "Please select payment type",
					},
					payment_mode: {
						required: "Please select payment mode",
					},
					payment_date: {
						required: "Please select payment date",
					},
					payment_status: {
						required: "Please select payment status",
					},
					late_fees: {
						required: "Please enter amount",
						number: "Please enter valid amount",
					},
					bank_fees: {
						required: "Please enter amount",
						number: "Please enter valid amount",
					},
					discount: {
						required: "Please enter amount",
						number: "Please enter valid amount",
					},
					amount: {
						required: "Please enter amount",
						number: "Please enter valid amount",
					},
					registration_fees: {
						required: "Please enter registration fees",
						number: "Please enter valid registration fees",
					},
					total_fees: {
						required: "Please enter amount",
						number: "Please enter valid amount",
					},
					remark:{
						noSpaceatfirst: "First letter can't be space",
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
		$("#account_number").keyup(function() {
			$.ajax({
				type: "POST",
				url: "<?= base_url(); ?>admin/ajax_controller/get_unique_bank",
				data: {
					'account_number': $("#account_number").val(),
					'id': '<?= $id ?>'
				},
				success: function(data) {
					if (data == "0") {
						$("#account_error").html("");
						$("#save_btn").show();
					} else {
						$("#account_error").html("This account is already added");
						$("#save_btn").hide();
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}
			});
		});
		$(document).ready(function() {
			$('#example').DataTable({
				dom: "Bfrtip",
				buttons: [
					// {
					// 	extend: 'copyHtml5',
					// 	exportOptions: {
					// 	 columns: ':contains("Office")'
					// 	}
					// },
					'excelHtml5',
					// 'csvHtml5',
					// 'pdfHtml5'
				],
			});
		});
		$(function() {
			$(".datepicker").datepicker({
				dateFormat: "dd-mm-yy",
				changeMonth: true,
				changeYear: true,
				maxDate: 0,
				/*maxDate: "-12Y",
				minDate: "-80Y",
				yearRange: "-100:-0"*/
			});
		});
		$("#transaction_id").keyup(function() {
			$.ajax({
				type: "POST",
				url: "<?= base_url(); ?>admin/Ajax_controller/get_unique_transaction",
				data: {
					'transaction_id': $("#transaction_id").val(),
					'fees': $("#fees_id").val()
				},
				success: function(data) {
					if (data == "0") {
						$("#save_btn").show();
						$("#transaction_error").html("");
					} else {
						$("#save_btn").hide();
						$("#transaction_error").html("This transaction number is already in used");
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}
			});
		});
		$(".discount").keyup(function() {
			var main = $('#amount').val();
			var disc = $('#discount').val();
			var dec = (disc / 100).toFixed(2);
			var mult = main * dec;
			var discont = main - mult;

			//$("#amount").val(discont);
			var total_amount = parseInt($("#late_fees").val()) + parseInt($("#bank_fees").val()) + parseInt($("#amount").val());
			total_amount = total_amount - parseInt(mult);

			if (isNaN(total_amount)) {
				total_amount = 0;
			}
			$("#total_fees").val(parseInt(total_amount));
		});


		$(document).ready(function() {
			$('#discount').val(0);
			$(".discount").trigger("keyup");
		});
	</script>

	<script>
		document.getElementById('fees_type').addEventListener('change', function() {
			var feesType = this.value;
			// console.log(feesType);
			registration_fees = 0;
			var fees = 0;
			var degree = 0;
			var jsonDecode = <?php echo json_encode($fees); ?>;
			var jsonDecode1 = <?php echo json_encode($degree); ?>;
			console.log(jsonDecode);
			switch (feesType) {
				case '1':
					// fees = jsonDecode.admission_fees;
					fees = jsonDecode.fees;
					registration_fees = jsonDecode.registration_fees;
					break;
				case '4':
					// fees = jsonDecode.admission_fees;
					fees = jsonDecode.fees;
					registration_fees = 0;
					break;
				case '2':
					fees = jsonDecode.exam_fees;
					registration_fees = 0;
					break;
				default:
					fees = jsonDecode1.certificate_fees;
					registration_fees = 0;
					break;
			}
			document.getElementById('amount').value = fees;
			document.getElementById('registration_fees').value = registration_fees;

		});
	</script>