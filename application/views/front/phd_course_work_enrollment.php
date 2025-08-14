<?php include('header.php');?>



		<!-- Search Modal -->

		<div class="modal fade search-modal-area" id="exampleModalsrc">

			<div class="modal-dialog modal-dialog-centered">

				<div class="modal-content">

					<button type="button" data-bs-dismiss="modal" class="closer-btn">

						<i class="ri-close-line"></i>

					</button>



					<div class="modal-body">

						<form class="search-box">

							<div class="search-input">

								<input type="text" name="Search" placeholder="Search for..." class="form-control">



								<button type="submit" class="search-btn">

									<i class="ri-search-line"></i>

								</button>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>

		<!-- Search Modal -->



		<!-- Start Page Title Area -->

		<div class="page-title-area bg-15">

			<div class="container">

				<div class="page-title-content">

					<h2>Ph.D Course Work Form</h2>



					<ul>

						<li>

							<a href="<?=base_url()?>">

								Home 

							</a>

						</li>

						<li class="active">Research</li>

						<li class="active"> Ph.D Course Work</li>

						<li class="active">Ph.D Course Work Form</li>

					</ul>

				</div>

			</div>

		</div>

		<!-- End Page Title Area -->



	



		<!-- <section>

            <div class="container">



            </div>



        </section> -->

		<br>

<div class="uni_mainWrapper">

	<div class="container">

		<div class="row">	

			<!-- <div class="container"> -->

				<div class="online_wrapper">

					<div class="main_div">

						<div class="col-md-12">

							

							<form method="post" name="phd_course_work_enrollment_form" id="phd_course_work_enrollment_form" enctype="multipart/form-data">

								<div class="row">

									<div class="col-md-12">

										<div class="personal_details">

											<h3>Enrollment Verification</h3>

											<small>Please provide your enrollment number</small>

											<hr>

										</div>

									</div>

								</div>

								<div class="row edu">

									<div class="col-md-12">

										<div class="form-group">

											<label>Enter Your Enrollment Number<span class="req">*</span></label>

											<input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter enter your enrollment number">

										</div>

									</div>

								</div>



                                <br>

								<div class="row">

									<div class="col-md-12 edu">

										<div class="form-group">

											<label></label>

											<button type="submit" class="default-btn" name="generate" id="generate" value="Generate">Continue</button>

											<!-- <div class="pull-right"></div> -->

										</div>

									</div>	

								</div> 

							</form>

						</div>

						<div class="clearfix"></div>

					</div>

				</div>

			<!-- </div> -->

		</div>

	</div>

</div>



		<br>



		<?php include('footer.php');?>



        <script>

	$(document).ready(function() {

			jQuery.validator.addMethod("validate_email", function(value, element) {

                if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

                    return true;

                }else {

                    return false;

                }

            }, "Please enter a valid Email.");  

            jQuery.validator.addMethod("noHTMLtags", function(value, element){

                if(this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)){

                    if(value == ""){

                        return true;

                    }else{

                        return false;

                    }

                } else {

                    return true;

                }

            }, "HTML tags are Not allowed."); 

            

	$.validator.addMethod("noSpaceatfirst", function (value, element) {
		return this.optional(element) || /^\s/.test(value) === false;
	}, "First Letter Can't Be Space!");

	$('#phd_course_work_enrollment_form').validate({

		rules: {

			enrollment_number: {

				required: true,

				noHTMLtags: true,
				noSpaceatfirst:true,
				number:true,
			},

		},

		messages: {

			enrollment_number: {

				required: "Please enter your enrollment number",

				noHTMLtags:"HTML tags not allowed!",
				noSpaceatfirst:"First letter can't be space",
				number:"Please enter valid enrollment number",

			},

		},

		errorElement: 'span',

		errorPlacement: function (error, element) {

			error.addClass('invalid-feedback');

			element.closest('.form-group').append(error);

		},

		highlight: function (element, errorClass, validClass) {

			$(element).addClass('is-invalid');

		},

		unhighlight: function (element, errorClass, validClass) {

			$(element).removeClass('is-invalid');

		}

	});

});



	</script>