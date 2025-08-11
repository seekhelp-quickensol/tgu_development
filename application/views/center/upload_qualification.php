<?php include('header.php');?>

<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Previous Educational Details Form

				  </h4>

                  <p class="card-description">

				   Please enter previous education details

                  </p>

                  <form method="post" name="qualification_form" id="qualification_form" enctype="multipart/form-data">

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

											<label>Signature<span class="req">*</span></label>

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

              </div>

            </div>

            

          </div>

        </div>

      

<!--------------------------------------   CROPING TOOL   -----------------------------------------------> 

<div id="uploadimageModal" class="modal" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

      		<div class="modal-header">

        		<h4 class="modal-title">Upload & Crop Image</h4>

				<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->

      		</div>

      		<div class="modal-body">

        		<div class="row">

  					<div class="col-md-8 col-sm-8 col-xs-12 text-center">

						  <div id="profile_image_data" style="width:350px; margin-top:30px"></div>

  					</div>

  					<div class="col-md-4 col-sm-4 col-xs-12 croping_button">

						<button class="btn btn-success crop_image" data-dismiss="modal">Crop & Upload Image</button>

						<button type="button" class="btn btn-default close_crop_model" data-dismiss="modal">Cancel</button>

					</div>

				</div>

      		</div>

    	</div>

    </div>

</div>



<?php include('footer.php');

$id=0;

if($this->uri->segment(2) != ""){

	$id = $this->uri->segment(2);

}

?>

<script src="<?=base_url();?>back_panel/js/croppie.js"></script>

 

<script>



$.validator.addMethod("noNumbers", function(value, element) {

    return this.optional(element) || !/^\d+$/.test(value);

}, "Please enter valid board name");





// $.validator.addMethod("alphanumeric", function(value, element) {

//     return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);

// }, "Please enter valid marks");

$.validator.addMethod("noSpaceatfirst", function (value, element) {
	return this.optional(element) || /^\s/.test(value) === false;
}, "First Letter Can't Be Space!");



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

			noNumbers:true,
			noSpaceatfirst:true,

		},

		secondary_marks: {

			required: true,

			digits: true,

			// alphanumeric: true,

            // maxlength: 3,

		},

		secondary_marksheet: {

			required: true,

		},

		sr_secondary_year: {

			number: true,

			minlength: 4,

			maxlength: 4,

		},

		sr_secondary_university: {

			noNumbers:true,
			noSpaceatfirst:true,
		},

		sr_secondary_marks: {

			digits: true,

			// alphanumeric: true,

            // maxlength: 3,

		},

		graduation_year: {

			number: true,

			minlength: 4,

			maxlength: 4,

		},

		graduation_university: {

			noNumbers:true,
			noSpaceatfirst:true,
		},

		graduation_marks: {

			digits: true,

			// alphanumeric: true,

            // maxlength: 3,

		},

		post_graduation_year: {

			number: true,

			minlength: 4,

			maxlength: 4,

		},

		post_graduation_university: {

			noNumbers:true,
			noSpaceatfirst:true,
		},

		post_graduation_marks: {

			digits: true,

			// alphanumeric: true,

            // maxlength: 3,

		},

		other_qualification_year: {

			number: true,

			minlength: 4,

			maxlength: 4,

		},

		other_qualification_university: {

			noNumbers:true,
			noSpaceatfirst:true,

		},

		other_qualification_marks: {

			digits: true,

			// alphanumeric: true,

            // maxlength: 3,

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

			noNumbers:"Please enter valid board name",
			noSpaceatfirst: "First letter can't be space",

		},

		secondary_marks: {

			required: "Please enter marks",

			digits: "Please enter valid marks",

			// alphanumeric: "Please enter valid marks",

            // maxlength: "Please enter valid marks",

		},

		secondary_marksheet: {

			required: "Please enter upload marksheet",

		},

		sr_secondary_year: {

			number: "Please enter valid year",

			minlength: "Please enter 4 digit year",

			maxlength: "Please enter 4 digit year",

		},

		sr_secondary_university: {

			noNumbers:"Please enter valid board name",
			noSpaceatfirst: "First letter can't be space",


		},

		sr_secondary_marks: {

			digits: "Please enter valid marks",

			// alphanumeric: "Please enter valid marks",

            // maxlength: "Please enter valid marks",

		},

		graduation_year: {

			number: "Please enter valid year",

			minlength: "Please enter 4 digit year",

			maxlength: "Please enter 4 digit year",

		},

		graduation_university: {

			noNumbers:"Please enter valid board name",
			noSpaceatfirst: "First letter can't be space",
		},

		graduation_marks: {

			digits: "Please enter valid marks",

			// alphanumeric: "Please enter valid marks",

            // maxlength: "Please enter valid marks",

		},

		post_graduation_year: {

			number: "Please enter valid year",

			minlength: "Please enter 4 digit year",

			maxlength: "Please enter 4 digit year",

		},

		post_graduation_university: {

			noNumbers:"Please enter valid board name",
			noSpaceatfirst: "First letter can't be space",

		},

		post_graduation_marks: {

			digits: "Please enter valid marks",

			// alphanumeric: "Please enter valid marks",

            // maxlength: "Please enter valid marks",

		},

		other_qualification_year: {

			number: "Please enter valid year",

			minlength: "Please enter 4 digit year",

			maxlength: "Please enter 4 digit year",

		},

		other_qualification_university: {

			noNumbers:"Please enter valid board name",
			noSpaceatfirst: "First letter can't be space",

		},

		other_qualification_marks: {

			digits: "Please enter valid marks",

			// alphanumeric: "Please enter valid marks",

            // maxlength: "Please enter valid marks",

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