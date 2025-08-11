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
		<div class="page-title-area bg-26">
			<div class="container">
				<div class="page-title-content">
					<h2>Contact Us</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>

						<li class="active">Contact</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Contact Info Area -->
		<section class="contact-info-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="map-area">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3551.3555357180867!2d93.71082527482562!3d27.113609476527966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37440127e3f9d913%3A0xc232c3d8bd8235c4!2sModel%20village%20naharlagun!5e0!3m2!1sen!2sin!4v1702634758424!5m2!1sen!2sin" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>

					<div class="col-lg-5">
						<div class="contact-info">
							<h2>Get in touch</h2>

							<ul class="address">
								<li class="location">
									<i class="ri-map-pin-2-fill"></i>
									<span>Address</span>
									<?php if(!empty($university_details)){ echo $university_details->address; }?>
								</li>
								<li>
									<i class="ri-mail-line"></i>
									<span>Email</span>
									<a href="info@theglobaluniversity.edu.in"><?php if(!empty($university_details)){ echo $university_details->email; }?></a>
								</li>
								<li>
									<i class="ri-phone-fill"></i>
									<span>Phone</span>
									<a href="+91"><?php if(!empty($university_details)){ echo $university_details->contact_number; }?></a>
								</li>
							</ul>

							<h3>Follow Us</h3>
							<ul class="social-link">
								<li>
									<a href="https://www.facebook.com/theglobaluni/" target="_blank">
										<i class="ri-facebook-fill"></i>
									</a>
								</li>
								<li>
									<a href="https://www.instagram.com/theglobaluniversity?igsh=ejMxaTc1bndudDlk" target="_blank">
										<i class="ri-instagram-fill"></i>
									</a>
								</li>
								<li>
									<a href="https://www.linkedin.com/in/the-global-university-427b12295/?originalSubdomain=in" target="_blank">
										<i class="ri-linkedin-box-fill"></i>
									</a>
								</li>
								<li>
									<a href="https://x.com/theglobaluni?t=t4DU0MYYkGovmWlIhplEww&s=09" target="_blank">
										<i class="ri-twitter-fill"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Contact Info Area -->

		<!-- Start Contact Area -->
		<section class="contact-area pb-100">
			<div class="container">
				<div class="section-title">
					<h2>Send us a quick message</h2>
					<!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis ut nostrum, quibusdam, voluptatum eaque illo cum, aperiam accusantium reprehenderit</p> -->
				</div>
				
				<form  name="contact_us_form" id="contact_us_form" method="post">
					<div class="row">
						<div class="col-lg-6 col-sm-6">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
								<!-- <div class="help-block with-errors"></div> -->
							</div>
						</div>

						<div class="col-lg-6 col-sm-6">
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" id="email" class="form-control" autocomplete="off" required>
								<!-- <div class="help-block with-errors"></div> -->
							</div>
						</div>

						<div class="col-lg-6 col-sm-6 mt-2 mb-2">
							<div class="form-group">
								<label>Phone</label>
								<input type="text" name="phone_number" id="phone_number" required  autocomplete="off" class="form-control">
								<!-- <div class="help-block with-errors"></div> -->
							</div>
						</div>

						<div class="col-lg-6 col-sm-6 mt-2 mb-2">
							<div class="form-group">
								<label>Subject</label>
								<input type="text" name="msg_subject" id="msg_subject" class="form-control" autocomplete="off" required>
								<!-- <div class="help-block with-errors"></div> -->
							</div>
						</div>

						<div class="col-lg-12 mt-2 mb-2">
							<div class="form-group">
								<label>Message</label>
								<textarea name="message" class="form-control" id="message" cols="30" rows="6"  autocomplete="off" required ></textarea>
								<!-- <div class="help-block with-errors"></div> -->
							</div>
						</div>

						<div class="col-lg-12 col-md-12 mt-2 mb-2">
							<div class="form-group checkboxs">
								<input type="checkbox" id="chb2">
								<span>
								Accept <a href="<?=base_url();?>terms-conditions"><b>Terms &amp; Conditions</b></a> And <a href="<?=base_url();?>privacy-policy"><b>Privacy Policy.</b></a>

								</span>
								
							</div>
						</div>

						<div class="col-lg-12 col-md-12 text-center">
							<button type="submit" class="default-btn2" name="register" id="register" value="Register">
								Send message
							</button>

							<!-- <a type="submit" class="default-btn" value="register" id="register" value="Register">Send Messsage</a> -->
							<!-- <div id="msgSubmit" class="h3 text-center hidden"></div>
							<div class="clearfix"></div> -->
						</div>
					</div>
				</form>
			</div>
		</section>
		<!-- End Contact Area -->

		<?php include('footer.php');?>


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
            

	$('#contact_us_form').validate({
		rules: {
			name: {
				required: true,   
			},
			email: {
				required: true,   
			},
			phone_number: {
				required: true,
				minlength: 10,
				maxlength:10,   
			},
			msg_subject: {
				required: true,   
			},
			message: {
				required: true,   
			},
		},
		messages: {
			name: {
				required: "Please enter name",
			},
			email: {
				required: "Please enter email",
			},
			phone_number: {
				required: "Please enter phone number",
				minlength:"Please enter 10 digit phone number",
				maxlength:"Please enter 10 digit phone number",
			},
			msg_subject: {
				required: "Please enter subject",
			},
			message: {
				required: "Please enter message",
			},
		},
		submitHandler: function (form) {
			form.submit();
		},
	});
});
</script>