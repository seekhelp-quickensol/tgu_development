<?php include('header.php'); ?>

<!-- <div class="header_cc_area" style="background-image:url('<?= base_url(); ?>images/header_area.jpg')">

				<div class="container">

					<div class="row">

					<div class="col-lg-12 col-md-12">

						<h1>Contact Us</h1>

						<p class="">Home / Contact Us</p>

					</div>

						</div>

				</div>

			</div> -->



<section>



	<div class="header_cc_area slide-bg">

		<div class="container  overlay-about" style="width: 100%;">

			<p class="">Home / Contact Us</p>



			<div class=" container-fluid text-center inner-heading-content">

				<h2 class="main-heading-inner-pages border-b border">Contact Us</h2>

				<p class=""> We believe in providing education that cultivates creative understanding </p>



			</div>



		</div>

	</div>

</section>



<div class="clearfix"></div>

<section class="c-padding inner-bg-99">



	<div class="uni_mainWrapper container box-shadow-global ">



		<div class="contact-service contact-us-bg">

			<div class="col-lg-12">

				<div class="contact_area">

					<h2 class="title"><span>Talk To Us Today</span></h2>

				</div>

				<div class="form_area col-md-4">

					<div class="col-lg-2">

						<i class="fa fa-phone" aria-hidden="true"></i>

					</div>

					<div class="col-lg-10">

						<label>Contact </label>

						<p class=""><a href="tel:(+91)<?php if (!empty($university_details)) {
															echo $university_details->contact_number;
														} ?>">(+91) <?php if (!empty($university_details)) {
																																						echo $university_details->contact_number;
																																					} ?></a></p>

					</div>

					<div class="clearfix"></div>

				</div>

				<div class="form_area col-md-4">

					<div class="col-lg-2">

						<i class="fa fa-envelope" aria-hidden="true"></i>

					</div>

					<div class="col-lg-10">

						<label>Email </label>

						<p class=""><a href="mailto:<?php if (!empty($university_details)) {
														echo $university_details->email;
													} ?>"><?php if (!empty($university_details)) {
																																	echo $university_details->email;
																																} ?></a></p>



						<a href="#" data-toggle="modal" data-target=".email-modal">Informaitional Emails</a>



						<div class="modal fade email-modal" tabindex="-1" role="dialog">

							<div class="modal-dialog" role="document">

								<div class="modal-content">

									<div class="modal-header">

										<h3 class="modal-title">Informaitional Emails</h3>

										<button type="button" class="close" data-dismiss="modal" aria-label="Close">

											<span aria-hidden="true">&times;</span>

										</button>

									</div>



									<div class="modal-footer">

										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

									</div>

								</div>

							</div>

						</div>

					</div>

					<div class="clearfix"></div>

				</div>

				<div class="form_area col-md-4">

					<div class="col-lg-2">

						<i class="fa fa-university" aria-hidden="true"></i>

					</div>

					<div class="col-lg-10">

						<label>Address </label>

						<p class="">

							<?php if (!empty($university_details)) {
								echo $university_details->address;
							} ?>

						</p>





					</div>

					<div class="clearfix"></div>

				</div>













				<!--<div class="form_area" id="demo" style="padding: 15px;">

												<div class="col-lg-2">

														<i class="fa fa-university" aria-hidden="true"></i>

												</div>

												<div class="col-lg-10">

													<label>Engineering Division Exam Venue</label>

													<p class="">

														THE GLOBAL UNIVERSITY,

													</p>

													<p class="">

														Yaingangpokpi, Ukhrul Road, Imphal East - 795145 Manipur

													</p>

												</div>

												<div class="clearfix"></div>

											</div>-->



			</div>

			<div class="container-fluid">

				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7558165.828858951!2d86.2171538204595!3d22.334339106230672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1suniversity%20near%20Bir%20Tikendrajit%20International%20Airport%2C%20Tipaimukh%20Rd%2C%20Hiangtam%20Lamka%2C%20Imphal%2C%20Manipur!5e0!3m2!1sen!2sin!4v1593022613697!5m2!1sen!2sin" style="padding-top:40px" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

			</div>

		</div>

	</div>

</section>



<?php include('footer.php'); ?>