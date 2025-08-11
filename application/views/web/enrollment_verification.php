<?php include "header.php"; ?>
<section class="c-padding inner-bg-3">


	<div class="uni_mainWrapper container box-shadow-global">

		<div class="main_div">
			<div class="col-md-12">
				<h2 class="title">Enrollment Verification</h2>
				<form method="post" name="verification_form" id="verification_form">
					<div class="row">
						<div class="col-md-12">
							<div class="personal_details">

								<small>Please provide your enrollment number</small>
								<hr>
							</div>
						</div>
					</div>
					<div class="row edu">
						<div class="col-md-12">
							<div class="form-group">
								<label>Enter Your Enrollment Number<span class="req">*</span></label>
								<input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter Your Your Enrollment Number" value="<?php if (!empty($this->input->post("enrollment_number"))) {
																																															echo $this->input->post("enrollment_number");
																																														} ?>">
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-12 edu">
							<div class="form-group">
								<label></label>
								<button type="submit" class="btn btn-primary" name="next" id="next" value="next">Next</button>
								<div class="pull-right">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>



		<div class="container" style="margin-top: 40px ;margin-bottom: 30px">
			<table class="table" border="1">
				<thead style="background-color: #991b30;
color: white;">
					<th>S.No.</th>
					<th>Name</th>
					<th>Father Name</th>

					<th>Date Of Birth</th>
					<th>Enrollment Number</th>
					<th>Course Name</th>
					<th>Stream Name</th>

				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td><?php echo !empty($data->student_name) ? $data->student_name : '- - - -'; ?></td>
						<td><?php echo !empty($data->father_name) ? $data->father_name : '- - - -'; ?></td>

						<td><?php echo !empty($data->date_of_birth) ? date("d-m-Y", strtotime($data->date_of_birth)) : '- - - -'; ?></td>
						<td><?php echo !empty($data->enrollment_number) ? $data->enrollment_number : '- - - -'; ?></td>
						<td><?php echo !empty($data->course_name) ? $data->course_name : '- - - -'; ?></td>
						<td><?php echo !empty($data->stream_name) ? $data->stream_name : '- - - -'; ?></td>

					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>

<?php include "footer.php"; ?>
<script type="text/javascript">
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

	$("#verification_form").validate({
		ignore: [],
		rules: {
			enrollment_number: {
				required: true,
				noHTMLtags: true,
			},
		},
		messages: {
			enrollment_number: {
				required: "Please enter enrollment number!",
				noHTMLtags: "HTML tags not allowed!",
			},
		},
		submitHandler: function(form) {
			form.submit();
		}
	});
</script>