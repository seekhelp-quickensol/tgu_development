<?php include('header.php')?>

<!-- Start Page Title Area -->

<div class="page-title-area bg-14">

			<div class="container">

				<div class="page-title-content">

					<h2>Apply Now</h2>



					<ul>

						<li>

							<a href="index.html">

								Home 

							</a>

						</li>

						<li class="active">Admission</li>

						<li class="active">Apply Now</li>

					</ul>

				</div>

			</div>

		</div>

		<!-- End Page Title Area -->

		





			<!-- Start Checkout Area -->

			<section class="checkout-area ptb-100">

			<div class="container">

				<div class="row justify-content-center align-items-center">

					<div class="col-lg-6 col-md-12">

						<div class="log-in-coupon-code mr-15">

							<div class="faq-accordion">

								<ul class="accordion">

									<li class="accordion-item">

										<a class="accordion-title" href="javascript:void(0)">

										New Admission

										</a>

										

										<div class="contact-form-action accordion-content">

											

											

											<div class="col-12">

											

											<a href="<?=base_url()?>admission-form" class="default-btn2">

											Apply Now

											</a>

										</div>

										</div>

									</li>

								</ul>

							</div>



							<div class="faq-accordion">

								

								<ul class="accordion">

									<li class="accordion-item">

										<a class="accordion-title" href="javascript:void(0)">

										Already Have Enrollment Number

										</a>

										

										<div class="contact-form-action accordion-content">

										<br>

											<form method="get" action="<?=base_url();?>admission-form" name="apply_now_form" id="apply_now_form" enctype="multipart/form-data">

												<div class="row">

													<div class="col-12">

														<div class="form-group">

														<label><b>Enter Enrollment Number:</b><span class="req"></span></label>

														<input type="text" id="old_enrollment" name="old_enrollment" class="form-control new_control" autocomplete="off"></input>

														</div>

													</div>

						

													<div class="col-12">

											

													<!-- <a  href="<?=base_url();?>admission-form" class="default-btn2">

													Apply now

													</a> -->

													<button  class="default-btn2">

														Apply now

													</button>

													</div>

												</div>

											</form>

										</div>

									</li>

								</ul>

							</div>

						</div>

					</div>

				</div>

			</div>

		</section>

		<!-- End Checkout Area -->



		<?php include('footer.php')?>





		<script>

	$(document).ready(function(){ 

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

$('#apply_now_form').validate({
    rules: {
        old_enrollment: {
            required: true,   
			noSpaceatfirst:true,
			number:true,
        },
    },
    messages: {
        old_enrollment: {
            required: "Please enter enrollment number",
			noSpaceatfirst:"First letter can't be space",
			number: "Please enter valid enrollment number",
        },
    },
    submitHandler: function (form) {
        form.submit();
    },
});
});

</script>



