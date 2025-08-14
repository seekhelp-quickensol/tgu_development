<?php include('header.php')?>
<style>
.terms_para{
	display:none;
}
</style>

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-27">
			<div class="container">
				<div class="page-title-content">
					<h2>Qualification Details</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>

						<li class="active">Qualification Details</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Candidates Resume Area -->
		<section class="candidates-resume-area ptb-100">
			<div class="container">
				<div class="candidates-resume-content">
					<form class="resume-info" id="qualification_form" name="qualification_form" enctype="multipart/form-data" method="post">
						<h3>Academic Details</h3>
						<p><Small>Please provide your academic details</Small></p> 
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Secondary Year<span class="req">*</span></label>
									<input type="text" required name="secondary_year" id="secondary_year" class="form-control" maxlength="4" placeholder="Secondary Year">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Secondary Board<span class="req">*</span></label>
									<input type="text" name="secondary_university" id="secondary_university" class="form-control" placeholder="Secondary Board">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Secondary Marks<span class="req">*</span></label>
									<input type="text" name="secondary_marks" id="secondary_marks" class="form-control" placeholder="Secondary Marks">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Secondary Marksheet<span class="req">*</span></label>
									<input type="file" name="secondary_marksheet" id="secondary_marksheet" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Sr. Secondary Year</label>
									<input type="text" name="sr_secondary_year" id="sr_secondary_year" class="form-control" maxlength="4" placeholder="Sr. Secondary Year">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Sr. Secondary Board</label>
									<input type="text" name="sr_secondary_university" id="sr_secondary_university" class="form-control" placeholder="Sr. Secondary Board">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Sr. Secondary Marks</label>
									<input type="text" name="sr_secondary_marks" id="sr_secondary_marks" class="form-control" placeholder="Sr. Secondary Marks">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Sr. Secondary Marksheet</label>
									<input type="file" name="sr_secondary_marksheet" id="sr_secondary_marksheet" class="form-control">
								</div>
							</div>
						</div>
						<div class="row edu">
							<div class="col-md-3">
								<div class="form-group">
									<label>Graduation Year</label>
									<input type="text" name="graduation_year" id="graduation_year" class="form-control" maxlength="4" placeholder="Graduation Year">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Graduation University</label>
									<input type="text" name="graduation_university" id="graduation_university" class="form-control" placeholder="Graduation University">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Graduation Marks</label>
									<input type="text" name="graduation_marks" id="graduation_marks" class="form-control" placeholder="Graduation Marks">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Graduation Marksheet</label>
									<input type="file" name="graduation_marksheet" id="graduation_marksheet" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
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
									<input type="file" name="post_graduation_marksheet" id="post_graduation_marksheet" class="form-control">
								</div>
							</div>
						</div>  
						<div class="row edu">
							<div class="col-md-3">
								<div class="form-group">
									<label>Other Qualification Year</label>
									<input type="text" name="other_qualification_year" id="other_qualification_year" class="form-control" maxlength="4" placeholder="Other Qualification Year">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Other Qualification University</label>
									<input type="text" name="other_qualification_university" id="other_qualification_university" class="form-control" placeholder="Other Qualification University">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Other Qualification Marks</label>
									<input type="text" name="other_qualification_marks" id="other_qualification_marks" class="form-control" placeholder="Other Qualification Marks">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Other Qualification Marksheet</label>
									<input type="file" name="other_qualification_marksheet" id="other_qualification_marksheet" class="form-control">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Signature <span class="req">*</span></label>
									<input type="file" name="signature" id="signature" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 edu">
								<div class="form-group">
									<label></label>
									<button type="submit" class="default-btn" name="generate" id="generate" value="Generate">Continue</button>
									<div class="pull-right"></div>
								</div>
							</div>
						</div> 
					</form> 
				</div>
			</div>
		</section> 

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
			// required:true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
		// sr_secondary_university:{
		// 	required:true,
		// },
		// sr_secondary_marks:{
		// 	required:true,
		// },
		// sr_secondary_marksheet:{
		// 	required:true,
		// },
        graduation_year: {
			// required:true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
		// graduation_university:{
		// 	required:true,
		// },
		// graduation_marks:{
		// 	required:true,
		// },
		// graduation_marksheet:{
		// 	required:true,
		// },
        post_graduation_year: {
			// required:true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
		// post_graduation_university:{
		// 	required:true,
		// },
		// post_graduation_marks:{
		// 	required:true,
		// },
		// post_graduation_marksheet:{
		// 	required:true,
		// },
        other_qualification_year: {
			// required:true,
            number: true,
            minlength: 4,
            maxlength: 4,
        },
		// other_qualification_university:{
		// 	required:true,
		// },
		// other_qualification_marks:{
		// 	required:true,
		// },
		// other_qualification_marksheet:{
		// 	required:true,
		// },
        signature: {
            required: true,
        },
    },
    messages: {
        secondary_year: {
            required: "Please enter year",
            number: "Please enter a valid year",
            minlength: "Please enter a 4-digit year",
            maxlength: "Please enter a 4-digit year",
        },
        secondary_university: {
            required: "Please enter board",
        },
        secondary_marks: {
            required: "Please enter marks",
        },
        secondary_marksheet: {
            required: "Please upload marksheet",
        },
        sr_secondary_year: {
			// required:"Please enter year",
            number: "Please enter a valid year",
            minlength: "Please enter a 4-digit year",
            maxlength: "Please enter a 4-digit year",
        },
		// sr_secondary_university:{
		// 	required:"Please enter board",
		// },
		// sr_secondary_marks:{
		// 	required:"Please enter marks",
		// },
		// sr_secondary_marksheet:{
		// 	required:"Please upload marksheet",
		// },
        graduation_year: {
			// required:"Please enter graduation year",
            number: "Please enter a valid year",
            minlength: "Please enter a 4-digit year",
            maxlength: "Please enter a 4-digit year",
        },
		// graduation_university:{
		// 	required:"Please enter board",
		// },
		// graduation_marks:{
		// 	required:"please enter marks",
		// },
		// graduation_marksheet:{
		// 	required:"Please upload marksheet",
		// },
        post_graduation_year: {
			// required:"Please enter graduation year",
            number: "Please enter a valid year",
            minlength: "Please enter a 4-digit year",
            maxlength: "Please enter a 4-digit year",
        },
		// post_graduation_university:{
		// 	required:"Please enter board",
		// },
		// post_graduation_marks:{
		// 	required:"Please enter marks",
		// },
		// post_graduation_marksheet:{
		// 	required:"Please upload marksheet",
		// },
        other_qualification_year: {
			// required:"Please enter qualification year",
            number: "Please enter a valid year",
            minlength: "Please enter a 4-digit year",
            maxlength: "Please enter a 4-digit year",
        },
		// other_qualification_university:{
		// 	required:"Please enter board",
		// },
		// other_qualification_marks:{
		// 	required:"Please enter marks",
		// },
		// other_qualification_marksheet:{
		// 	required:"Please upload marksheet",
		// },
        signature: {
            required: "Please upload your signature",
        },
    },
    submitHandler: function (form) {
        form.submit();
    },
});

</script>