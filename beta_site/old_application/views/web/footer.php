			<div class="mob_login_details">
				<!-- <ul class="login_details_ul"> -->
				<span class="mobile_all_login_details hidden-sm hidden-md hidden-lg"><i class="fa fa-user" aria-hidden="true"></i></span>

				<a href="<?= base_url(); ?>student-login" target="_blank" class="admin center_login hidden-sm hidden-md hidden-lg"><i class="fa fa-user" aria-hidden="true"></i> Student <span class="hide_sm">Login </span></a>

				<a href="<?= base_url(); ?>center-access" target="_blank" class="center_login  hidden-sm hidden-md hidden-lg"><i class="fa fa-university" aria-hidden="true"></i> Center <span class="hide_sm">Login</span></a>
				<a href="<?= base_url(); ?>erp-access" target="_blank" class="admin_Area center_login hidden-sm hidden-md hidden-lg"><i class="fa fa-user" aria-hidden="true"></i> Employee </a>
				<a href="<?= base_url(); ?>faculty_login" target="_blank" class="admin_Area center_login hidden-sm hidden-md hidden-lg"><i class="fa fa-user" aria-hidden="true"></i> Faculty Login</a>
				<a href="<?= base_url(); ?>direct_pay" target="_blank" class="admin_Area center_login hidden-sm hidden-md hidden-lg"><i class="fa fa-credit-card" aria-hidden="true"></i> Pay Online </a>
				<!-- </ul> -->
			</div>
			<?php if ($this->session->flashdata('success') != "") { ?>
				<div class="alert alert-success animated fadeInUp">
					<strong>Success!</strong> <?= $this->session->flashdata('success') ?>
				</div>
			<?php } else if ($this->session->flashdata('message') != "") { ?>
				<div class="alert alert-danger animated fadeInUp">
					<strong>Error!</strong> <?= $this->session->flashdata('message') ?>
				</div>
			<?php } elseif (validation_errors() != '') { ?>
				<div class="alert alert-danger animated fadeInUp">
					<strong>Error!</strong> <?= validation_errors() ?>
				</div>
			<?php } ?>
			<div class="clearfix"></div>

			<div class="uni_section_footer">
				<div class="uni_section_footer_subFooter">
					<p>Make your dream with us ! Register today now... <a class="enquiry-btn" href="<?= base_url(); ?>enquiry">Enquiry</a> </p>

				</div>
				<div class="clearfix"></div>
				<div class="uni_section_footer_main">
					<div class="row">
						<div class="col-md-3 col-sm-3 about_bir ">
							<a href="<?= base_url(); ?>">
								<!--<img class="logo-footer" width="80" height="80" src="<?=base_url(); ?>images/logo/<?php if (!empty($university_details) && $university_details->logo != "") {
																														echo $university_details->logo;
																													} else { ?>global_university_logo.png<?php } ?>">-->
																													
								<img class="logo-footer" width="80" height="80" src="<?=base_url(); ?>images/footer-logo.png">
																													
																													
							</a>
							<h3>THE GLOBAL UNIVERSITY</h3>
							<p>Global University, Arunachal Predesh is established by the Arunachal Predesh Government as an Act No. 9 of 2017.</p>
						</div>
						<!--<div class="col-md-2 col-sm-2">
							<h3>Official Links</h3>

							<ul>
								<li><a href="<?= base_url(); ?>">Home</a></li>
								<li><a href="<?= base_url(); ?>about-us">About Us</a></li>
								<li><a href="<?= base_url(); ?>admission-form">Admission</a></li>
								<li><a>Campus Life</a></li>
								<li><a href="javascript:void(0)">Latest Events</a></li>
								 <li><a href="javascript:void(0)">Our Courses</a></li>
								 <li><a href="javascript:void(0)">Latest News</a></li>
								 <li><a href="javascript:void(0)">Campus Life</a></li>
								<li><a href="<?= base_url(); ?>career">Career</a></li>
								<li><a>Anti-Ragging</a></li>
								<li><a href="<?= base_url(); ?>documents/Holidays-List.pdf" target="_blank"> Holidays List</a></li>
								<li><a href="<?= base_url(); ?>documents/Inner-Line-Permit-Arunachal Pradesh.pdf" target="_blank"> Inner Line Permit News</a></li>
								<li><a href="<?= base_url(); ?>all-rti"> RTI</a></li>
								<li><a href="<?= base_url(); ?>images/approvals/Interview-Form.doc">Interview Form</a></li>

							</ul>
						</div>-->
						<!--<div class="col-md-2 col-sm-2">
							<h3>Quick Links</h3>

							<ul>
								<li><a href="<?= base_url(); ?>" target="_blank">E-Brochure</a></li>
								<li><a href="<?= base_url(); ?>university-accouts">University Accounts</a></li>
								<li><a href="<?= base_url(); ?>guide-application-form">Application For Guide/Supervisors</a></li>
								<li><a>Hostel Facilities</a></li>
								<li><a>Learning Facilities</a></li>
								<li><a href="<?= base_url(); ?>university-ugc">UGC Approvals </a></li>
								<li><a target="_blank" href="<?= base_url(); ?>">AICTE </a></li>
								<li><a>FAQ </a></li>
								<li><a> Terms and Conditions</a></li>
								<li><a> Privacy & Policy</a></li>
							</ul>
						</div>-->
						<div class="col-md-2 col-sm-2">

						</div>
						<div class="col-md-2 col-sm-2">

						</div>

						<div class="col-md-4 col-sm-4 address_uni">
							<h3>Reach Us</h3>
							<p><?php if (!empty($university_details)) {
									echo $university_details->address;
								} ?></p>
							<h5>Phone No: - <?php if (!empty($university_details)) {
												echo $university_details->contact_number;
											} ?></h5>
							<h5>Email : - <?php if (!empty($university_details)) {
												echo $university_details->email;
											} ?></h5>

							<div class="social__container">

								<!-- 
									<div class="social__item">
										<a target="_blank" href="" class="social__icon--linkedin"><i class="icon--linkedin"></i></a>
									</div> -->

								<div class="social__item">
									<a target="_blank" href="https://twitter.com/theglobaluni08" class="social__icon--twitter"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></i></a>
								</div>

								<div class="social__item">
									<a target="_blank" href="https://www.tumblr.com/blog/theglobaluni" class="social__icon--tumbler"><i class="icon--tumbler"></i></a>
								</div>

																<!-- <div class="social__item">
									<a target="_blank" href="" class="social__icon--reddit"><i class="icon--reddit"></i></a>
								</div> -->


								<div class="social__item">
									<a target="_blank" href="https://www.instagram.com/theglobaluni/" class="social__icon--instagram"><i class="icon--instagram"></i></a>
								</div>

								<div class="social__item">
									<a target="_blank" href="https://www.facebook.com/profile.php?id=61552508215825" class="social__icon--facebook"><i class="icon--facebook"></i></a>
								</div>

								<div class="social__item">
									<a target="_blank" href="https://in.pinterest.com/globaluniversity08/" class="social__icon--pintrest"><i class="icon--pintrest"></i></a>
								</div>
							</div>

							<!-- 
							<ul class="footer_social">
								<li><a target="_blank" href="https://www.facebook.com/globaluniversity/"><i class="fab fa-facebook-square"></i></a></li>
								<li><a target="_blank" href="https://www.instagram.com/globaluniversity/"><i class="fab fa-instagram"></i></a></li>
								<li><a target="_blank" href="https://twitter.com/globaluniversity"><i class="fab fa-twitter-square"></i></a></li>
								<li><a target="_blank" href="https://www.linkedin.com/company/globaluniversity/"><i class="fab fa-linkedin"></i></a></li>
								<li><a target="_blank" href="https://globaluniversity.tumblr.com/"><i class="fab fa-tumblr-square"></i></a></li>
								<li><a target="_blank" href="https://www.reddit.com/user/globaluniversity"><i class="fab fa-reddit-square"></i></a></li>
								<li><a target="_blank" href="https://in.pinterest.com/globaluniversity/"><i class="fab fa-pinterest-square"></i></a></li>
							</ul> -->

						</div>
					</div>
				</div>
			</div>
			<div class="uni_section_footer_btm">
				© 2023 THE GLOBAL UNIVERSITY | ALL RIGHTS RESERVED <a href="https://www.quickensol.com"></a>
			</div>
			</div>
			
			
			<div class="popup-overlay_inquiry_open">
	<div class="modal-dialog" role="document" style="top: 0%;width: 538px;height: 470px;background-color: #fff;opacity: 1;">
		<div class="modal-body"> 
			<button type="button" class="close-overlay_open"><span aria-hidden="true">&times;</span></button>
			<div class="col-md-12">  
				<img class="img-responsive" src="<?=$this->Digitalocean_model->get_photo('uploads/career_opening.jpeg')?>">
			</div>
			<!--<div class="col-md-12"> 
			<a style="margin-left: 34%;margin-top: 10px;" href="<?=base_url();?>admission-form" class="btn btn-primary close-overlay_open">Apply Now</a>
			</div>-->
		</div>
	</div>
</div>

			<!-- Bootstrap core JavaScript
    ================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
			<script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
			<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="<?= base_url(); ?>back_panel/js/jquery.validate.min.js"></script>
			<script src="<?= base_url(); ?>back_panel/js/croppie.js"></script>
			<script>
				$(document).ready(function() {
					$(".mobile_all_login_details").click(function() {
						$(".mob_login_details").toggleClass("active");
					})
				})
			</script>
			<script>
				$(".alert").fadeTo(5000, 500).slideUp(500, function() {
					$(".alert").slideUp(500);
				});
			</script>
			<script>
				$('.nav_bar').click(function() {
					$('.uni_header_menu_main').slideToggle();
				});
				$(function() {
					setInterval(blinkLi, 500);
				});

				function blinkLi() {
					$('ul .blink').toggleClass('blink_orange blink_red');
				};

				/*		
				document.addEventListener('keydown', function() {
				  if (event.keyCode == 123) {
				    alert("Sorry! you can not do this.");
				    return false;
				  } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
				    alert("Sorry! you can not do this.");
				    return false;
				  } else if (event.ctrlKey && event.keyCode == 85) {
				    alert("Sorry! you can not do this.");
				    return false;
				  }
				}, false);

				if (document.addEventListener) {
				  document.addEventListener('contextmenu', function(e) {
				    alert("Sorry! you can not do this.");
				    e.preventDefault();
				  }, false);
				} else {
				  document.attachEvent('oncontextmenu', function() {
				    alert("Sorry! you can not do this.");
				    window.event.returnValue = false;
				  });
				}
				$(document).keydown(function(e){
				    if(e.which === 123){
				       return false;
				    }
				});


				document.addEventListener('keydown', function() {
				  if (event.keyCode == 123) {
				    alert("Sorry! you can not do this.");
				    return false;
				  } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
				    alert("Sorry! you can not do this.");
				    return false;
				  } else if (event.ctrlKey && event.keyCode == 85) {
				    alert("Sorry! you can not do this.");
				    return false;
				  }
				}, false);

				if (document.addEventListener) {
				  document.addEventListener('contextmenu', function(e) {
				    alert("Sorry! you can not do this.");
				    e.preventDefault();
				  }, false);
				} else {
				  document.attachEvent('oncontextmenu', function() {
				    alert("Sorry! you can not do this.");
				    window.event.returnValue = false;
				  });
				}
				$(document).keydown(function(e){
				    if(e.which === 123){
				       return false;
				    }
				});
				*/
				
				$(document).ready(function() {
	setTimeout(function() {
		
		var closedTimestamp = localStorage.getItem('popupClosedTimestamp');
		  if (closedTimestamp) {
			var currentTime = new Date().getTime();console.log(currentTime);
			var twoHours = 2 * 60 * 60 * 1000; // 2 hours in milliseconds
			if (currentTime - closedTimestamp < twoHours) { console.log('out');
			 //$(".popup-overlay_inquiry").fadeOut();
			 $(".popup-overlay_inquiry_open").fadeOut();
			}else{
				//$(".popup-overlay_inquiry").fadeIn();
				$(".popup-overlay_inquiry_open").fadeIn();
			}
		  }else{console.log('in');
			  $(".popup-overlay_inquiry").fadeIn();
			  //$(".popup-overlay_inquiry_open").fadeIn();
		  }
		  
    
  }, 10000);
});

$(".close-overlay").click(function(){
	 var closedTimestamp = new Date().getTime();
	localStorage.setItem('popupClosedTimestamp', closedTimestamp);
	$(".popup-overlay_inquiry").fadeOut();
});	
$(".close-overlay_open").click(function(){
	 var closedTimestamp = new Date().getTime();
	localStorage.setItem('popupClosedTimestamp', closedTimestamp);
	$(".popup-overlay_inquiry_open").fadeOut();
	$(".popup-overlay_inquiry").fadeIn();
});	
			</script>


			</body>

			</html>