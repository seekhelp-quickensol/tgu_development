<?php include("header.php");?>
<style>
	.main_div{
		width: 60%;
		margin: 0px auto;
		border: 1px solid #082d5d;
		margin-top: 50px;
		border-radius: 6px;
	}
	.admission_div{
		width: 100%;
		margin: 0px auto;
		border: 1px solid #082d5d;
		margin-top: 50px;
		border-radius: 6px;
	}
	.btn-primary{
		background: linear-gradient(to right, #b73710, #184098);
	}
	.online_wrapper{
		margin-bottom: 50px;
	}
	.admission_div h3{
		margin-top: 0px;
		margin-bottom: 0px;
	}
	.common_details{
		background: #082d5d;
		color: #fff;
		padding: 10px 0px;
		margin-bottom: 15px;
	}
	.error{
		color:red;
	}
</style>
<div class="header_cc_area" style="background-image:url('<?=base_url();?>images/header_area.jpg')">
				<div class="container">
					<div class="row">
						<h1>Qualification Details</h1>
						<p>Admisison / Qualification Details</p>
					</div>
				</div>
			</div>
<div class="uni_mainWrapper">
	<div class="container">
		<div class="row">	
			<div class="container">
				<div class="online_wrapper">
					
					<!--<h1>University Admission Form 2020-2021</h1>-->
					<div class="main_div">
						<div class="col-md-12">
							<form method="post" name="qualification_form" id="qualification_form" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12">
										<div class="personal_details">
											<h3>Qualification Details</h3>
											<small>Please Upload Your Qualification Details<</small>
											<hr>
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Year<span class="req">*</span></label>
											<input type="text" required name="secondary_year" id="secondary_year"  class="form-control" maxlength="4" placeholder="Secondary Year">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Board<span class="req">*</span></label>
											<input type="text" name="secondary_university" id="secondary_university"  class="form-control" placeholder="Secondary Board">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Marks<span class="req">*</span></label>
											<input type="text" name="secondary_marks" id="secondary_marks"  class="form-control" placeholder="Secondary Marks">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Secondary Marksheet<span class="req">*</span></label>
											<input type="file" name="secondary_marksheet" id="secondary_marksheet"  class="form-control">
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Year</label>
											<input type="text" name="sr_secondary_year" id="sr_secondary_year"  class="form-control" maxlength="4" placeholder="Sr. Secondary Year">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Board</label>
											<input type="text" name="sr_secondary_university" id="sr_secondary_university"  class="form-control" placeholder="Sr. Secondary Board">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Marks</label>
											<input type="text" name="sr_secondary_marks" id="sr_secondary_marks"  class="form-control" placeholder="Sr. Secondary Marks">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Sr. Secondary Marksheet</label>
											<input type="file" name="sr_secondary_marksheet" id="sr_secondary_marksheet"  class="form-control">
										</div>
									</div>
								</div>
								
								<div class="row edu">
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation Year</label>
											<input type="text" name="graduation_year" id="graduation_year"  class="form-control" maxlength="4" placeholder="Graduation Year">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation University</label>
											<input type="text" name="graduation_university" id="graduation_university"  class="form-control" placeholder="Graduation University">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation Marks</label>
											<input type="text" name="graduation_marks" id="graduation_marks"  class="form-control" placeholder="Graduation Marks">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Graduation Marksheet</label>
											<input type="file" name="graduation_marksheet" id="graduation_marksheet"  class="form-control">
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation Year</label>
											<input type="text" name="post_graduation_year" id="post_graduation_year" class="form-control" maxlength="4" placeholder="Post Graduation Year">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation University</label>
											<input type="text" name="post_graduation_university" id="post_graduation_university" class="form-control" placeholder="Post Graduation University">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation Marks</label>
											<input type="text" name="post_graduation_marks" id="post_graduation_marks" class="form-control" placeholder="Post Graduation Marks">
											<input type="hidden" name="student_id" id="student_id" value="<?=$student->id?>">
											<input type="hidden" name="fees_id" id="fees_id" value="<?=$fees->id?>">
											<input type="hidden" name="payment_mode" id="payment_mode" value="<?=$fees->payment_mode?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Post Graduation Marksheet</label>
											<input type="file" name="post_graduation_marksheet" id="post_graduation_marksheet"  class="form-control">
										</div>
									</div>
								</div>
								<div class="row edu">
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification Year</label>
											<input type="text" name="other_qualification_year" id="other_qualification_year"  class="form-control" maxlength="4" placeholder="Other Qualification Year">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification University</label>
											<input type="text" name="other_qualification_university" id="other_qualification_university"  class="form-control" placeholder="Other Qualification University">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification Marks</label>
											<input type="text" name="other_qualification_marks" id="other_qualification_marks"  class="form-control" placeholder="Other Qualification Marks">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Other Qualification Marksheet</label>
											<input type="file" name="other_qualification_marksheet" id="other_qualification_marksheet"  class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Signature</label>
											<input type="file" name="signature" id="signature"  class="form-control">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12 edu">
										<div class="form-group">
											<label></label>
											<button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Continue</button>
											<div class="pull-right">
											</div>
										</div>
									</div>	
								</div> 
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
						
					
					
					<div class="clearfix"></div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php");?>
<script> 
$('#qualification_form').validate({
	rules: {
		secondary_year: {
			required: true,
			number: true,
			minlength: 4,
			maxlength: 4,
		},
		secondary_university: {
			required: true,
		},
		secondary_marks: {
			required: true,
		},
		secondary_marksheet: {
			required: true,
		},
		sr_secondary_year: {
			number: true,
			minlength: 4,
			maxlength: 4,
		},
		graduation_year: {
			number: true,
			minlength: 4,
			maxlength: 4,
		},
		post_graduation_year: {
			number: true,
			minlength: 4,
			maxlength: 4,
		},
		other_qualification_year: {
			number: true,
			minlength: 4,
			maxlength: 4,
		},
		signature: {
			required: true,
		},
	},
	messages: {
		secondary_year: {
			required: "Please enter year",
			number: "Please enter valid year",
			minlength: "Please enter 4 digit year",
			maxlength: "Please enter 4 digit year",
		},
		secondary_university: {
			required: "Please enter board",
		},
		secondary_marks: {
			required: "Please enter marks",
		},
		secondary_marksheet: {
			required: "Please enter upload marksheet",
		},
		sr_secondary_year: {
			number: "Please enter valid year",
			minlength: "Please enter 4 digit year",
			maxlength: "Please enter 4 digit year",
		},
		graduation_year: {
			number: "Please enter valid year",
			minlength: "Please enter 4 digit year",
			maxlength: "Please enter 4 digit year",
		},
		post_graduation_year: {
			number: "Please enter valid year",
			minlength: "Please enter 4 digit year",
			maxlength: "Please enter 4 digit year",
		},
		other_qualification_year: {
			number: "Please enter valid year",
			minlength: "Please enter 4 digit year",
			maxlength: "Please enter 4 digit year",
		},
		signature: {
			required: "Please upload your signature",
		},
	},
	submitHandler: function(form){
		form.submit();
	}, 
});
</script>