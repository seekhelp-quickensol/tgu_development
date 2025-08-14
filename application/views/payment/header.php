<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$university_details = $this->Setting_model->get_university_details();

$center_profile = $this->Web_model->get_center_profile();

// echo "<pre>";print_r($center_profile);exit;

$marquee_new = $this->Web_model->get_marquee_news();
?>


<?php
$title = "The Global University";
$keyword = "";
$meta_description = "";

$meta_data = $this->Setting_model->get_seo_meta_data();

// if (!empty($meta_data)) {
// 	$title = $meta_data->meta_title;
// 	$keyword = $meta_data->keyword;
// 	$meta_description = $meta_data->meta_description;
// }
?>


<!--<title><?= $title ?></title>-->
<!--<link rel="canonical" href="<?= current_url() ?>">-->
<!--<meta name="author" content="The Global Univeristy">-->
<!--<meta name="keywords" content="<?= $keyword ?>">-->
<!--<meta name="Description" content="<?= $meta_description ?>">-->


<?php if (!empty($meta_data)) {
  
?>
	<title><?= $meta_data->meta_title ?></title>
	<link rel="canonical" href="<?= current_url() ?>" />
	<meta name="author" content="The Global University">
	<meta name="keywords" content="<?= $meta_data->keyword ?>">
	<meta name="Description" content="<?= $meta_data->meta_description ?>">
	<!---------    OPEN GRAPH DATA    ---------->
	<meta property="og:title" content="<?= $meta_data->meta_title ?>" />
	<meta property="og:description" content="<?= $meta_data->meta_description ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?= current_url() ?>" />
	<meta property="og:image" content="<?= $this->Digitalocean_model->get_photo('images/logo/' . $university_details->logo) ?>" />
	<meta property="fb:app_id" content="104557558048854" />
	<meta property="og:image:alt" content="The Global University" />
	<!---------    Twitter Card    ---------->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@GlobalUniversity" />
	<meta name="twitter:title" content="<?= $meta_data->meta_title ?>" />
	<meta name="twitter:description" content="<?= $meta_data->meta_description ?>" />
	<meta name="twitter:image" content="<?= $this->Digitalocean_model->get_photo('images/logo/' . $university_details->logo) ?>" />
<?php } else { ?>
	<title>The Global University</title>
<?php } ?>


<?php if ($this->uri->segment(1) == "") { ?>
	<title>The Global University | Transforming Education in Arunachal Pradesh</title>
	<link rel="canonical" href="<?= current_url() ?>" />
	<meta name="author" content="The Global University">
	<meta name="keywords" content="higher education, top university in India, higher education, MBA courses">
	<meta name="Description" content="Discover The Global University, offering diverse programs in higher education, engineering, MBA courses, management, law, and science. Join one of the top universitie in India which is building a brighter future through innovative education and research.">
	<!---------    OPEN GRAPH DATA    ---------->
	<meta property="og:title" content="The Global University | Transforming Education in Arunachal Pradesh" />
	<meta property="og:description" content="Discover The Global University, offering diverse programs in higher education, engineering, MBA courses, management, law, and science. Join one of the top universitie in India which is building a brighter future through innovative education and research." />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?= current_url() ?>" />
	<meta property="og:image" content="<?= $this->Digitalocean_model->get_photo('images/logo/' . $university_details->logo) ?>" />
	<meta property="fb:app_id" content="104557558048854" />
	<meta property="og:image:alt" content="The Global University" />
	<!---------    Twitter Card    ---------->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@GlobalUniversity" />
	<meta name="twitter:title" content="The Global University | Transforming Education in Arunachal Pradesh" />
	<meta name="twitter:description" content="Discover The Global University, offering diverse programs in higher education, engineering, MBA courses, management, law, and science. Join one of the top universitie in India which is building a brighter future through innovative education and research." />
	<meta name="twitter:image" content="<?= $this->Digitalocean_model->get_photo('images/logo/' . $university_details->logo) ?>" />
<?php } ?>

<!doctype html>
<html lang="zxx">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap Min CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<!-- Owl Theme Default Min CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.theme.default.min.css">
	<!-- Owl Carousel Min CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.min.css">
	<!-- Remixicon CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/remixicon.css">
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/flaticon.css">
	<!-- Meanmenu Min CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/meanmenu.min.css">
	<!-- Animate Min CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.min.css">
	<!-- Odometer Min CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/odometer.min.css">
	<!-- Magnific Popup Min CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/magnific-popup.min.css">
	<!-- Date Picker Min CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/date-picker.min.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/responsive.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/css/select2.min.css">

	<!-- Favicon -->
	<!-- <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/images/favicon.png"> -->
	<link rel="shortcut icon" href="<?= base_url(); ?>images/logo/logo.png" />
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- Title -->
	<title>The Global University</title>
	<style>
		.error {
			color: red;
		}
		.desktop-nav .navbar .navbar-nav .nav-item a {
			font-size: 13px;
		}
	</style>
</head>

<body>
	<!-- Start Preloader Area -->
	<!--<div class="preloader">
		<div class="lds-ripple">
			<div class="pl-flip-1 pl-flip-2"></div>
		</div>
	</div>-->
	<!-- End Preloader Area -->

	<!-- Start Header Area -->
	<header class="header-area">
		<!-- Start Top Header -->
		<div class="top-header">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-sm-6">
						<ul class="header-left-content">
							<li>
								<a href="tel:+917042550366">
									<i class="ri-phone-fill"></i>
									Helpline Number :<?php if (!empty($university_details)) {
															echo $university_details->helpline_number;
														} ?>
								</a>
								| (10 AM to 5 PM)
							</li>
							<li>
								<a href="<?= base_url() ?>caste-based-discrimination">CBD/Grievances</a>
							</li>
						</ul>
					</div>

					<div class="col-lg-6 col-sm-6">
						<div class="header-right-content">
							<!-- <div class="languages-switcher">
									<i class="ri-global-line"></i>
									<select>
										<option value="1">English</option>	
										<option value="2">العربيّة</option>
										<option value="3">Deutsch</option>
										<option value="4">Português</option>
										<option value="5">简体中文</option>
									</select>
								</div>

								<div class="my-account">
									<a href="my-account.html">
										<i class="ri-user-fill"></i>
									</a>
								</div>

								<div class="cart-icon">
									<a href="cart.html">
										<i class="ri-shopping-cart-line"></i>
										<span>03</span>
									</a>
								</div> -->
							<div class="right_login">
								<a href="<?= base_url() ?>student-corner">
									<img src="<?= base_url() ?>assets/images/icons/employee.png" alt="">
									Student Login
								</a>
								<span>|</span>
								<a href="<?= base_url() ?>center-access">
									<img src="<?= base_url() ?>assets/images/icons/center2.png" alt="">

									CC Login
								</a>
								<span>|</span>
								<a href="<?= base_url() ?>erp-access">
									<img src="<?= base_url() ?>assets/images/icons/employee.png" alt="">
									Employee
								</a>
								<span>|</span>
								<a href="<?= base_url() ?>generate_cash_receipt">
									<img src="<?= base_url() ?>assets/images/icons/PR.png" alt="">
									PR
								</a>
								<span>|</span>
								<a href="<?= base_url() ?>faculty_login">
									<img src="<?= base_url() ?>/assets/images/icons/faculty.png" alt="">
									Faculty
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Start Top Header -->

		<!-- Start Navbar Area -->
		<div class="navbar-area">
			<div class="mobile-responsive-nav">
				<div class="container">
					<div class="mobile-responsive-menu">
						<div class="logo">
							<a href="<?= base_url() ?>">
								<img src="<?= base_url(); ?>assets/images/global_university_logo.png" alt="logo">
							</a>
						</div>

						<div class="others-options-for-mobile-devices">
							<ul>
								<li>
									<a href="<?= base_url() ?>" class="default-btn">
										Application Form
									</a>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="desktop-nav">
				<div class="container-fluid nav-container">
					<nav class="navbar navbar-expand-md navbar-light">
						<a class="navbar-brand" href="<?= base_url() ?>">
							<img src="<?= base_url(); ?>assets/images/global_university_logo.png" alt="logo">
							<div class="logo_content">
								<h4><?php if (!empty($university_details)) {
										echo $university_details->university_name;
									} ?></h4>
								<p class="logo-text"><?php if (!empty($university_details)) {
															echo $university_details->slogan;
														} ?></p>

							</div>
						</a>


						<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
							<ul class="navbar-nav ">
								<!-- <li class="nav-item ">
										<a href="<?= base_url() ?>" class="nav-link <?php if ($this->uri->segment(1) == "") { ?>active<?php } ?>">
											Home 
										</a>
									</li> -->
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link ">
										About University
										<i class="ri-arrow-down-s-line"></i>
									</a>
									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="<?= base_url() ?>about-us" class="nav-link <?php if ($this->uri->segment(1) == "about-us") { ?>active<?php } ?>">About Us</a>
										</li>

										<!-- <li class="nav-item">
												<a href="<?= base_url() ?>chairman-desk" class="nav-link <?php if ($this->uri->segment(1) == "chairman-desk") { ?>active<?php } ?>">Chairman Desk</a>
											</li> -->

										<li class="nav-item">
											<a href="<?= base_url() ?>chancellor-message" class="nav-link <?php if ($this->uri->segment(1) == "chancellor-message") { ?>active<?php } ?>">Chancellor Message</a>
										</li>

										<li class="nav-item">
											<a href="<?= base_url() ?>pro-chancellor-message" class="nav-link <?php if ($this->uri->segment(1) == "pro-chancellor-message") { ?>active<?php } ?>">Pro-Chancellor Message</a>
										</li>

										<li class="nav-item">
											<a href="<?= base_url() ?>vice-chancellor-message" class="nav-link <?php if ($this->uri->segment(1) == "vice-chancellor-message") { ?>active<?php } ?>">Vice-Chancellor
												Message</a>
										</li>

										<li class="nav-item">
											<a href="<?= base_url() ?>registrar-message" class="nav-link <?php if ($this->uri->segment(1) == "registrar-message") { ?>active<?php } ?>">Registrar Message</a>
										</li>

										<li class="nav-item">
											<a href="<?= base_url() ?>vision-and-mission" class="nav-link <?php if ($this->uri->segment(1) == "vision-and-mission") { ?>active<?php } ?>">Vision & Mission</a>
										</li>

										<!-- <li class="nav-item">
												<a href="<?= base_url() ?>awards" class="nav-link <?php if ($this->uri->segment(1) == "awards") { ?>active<?php } ?>">Awards</a>
											</li> -->
									</ul>
								</li>

								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link ">
										Courses
										<i class="ri-arrow-down-s-line"></i>
									</a>
									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="<?= base_url() ?>faculty-of-commerce-&-management" class="nav-link <?php if ($this->uri->segment(1) == "faculty-of-commerce-&-management") { ?>active<?php } ?>">Faculty of Commerce & Management</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>faculty-of-computer-application" class="nav-link <?php if ($this->uri->segment(1) == "faculty-of-computer-application") { ?>active<?php } ?>">Faculty of Computer Application</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>faculty-of-engineering" class="nav-link <?php if ($this->uri->segment(1) == "faculty-of-engineering") { ?>active<?php } ?>">Faculty of Engineering</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>faculty-of-humanities" class="nav-link <?php if ($this->uri->segment(1) == "faculty-of-humanities") { ?>active<?php } ?>">Faculty of Humanities</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>faculty-of-law" class="nav-link <?php if ($this->uri->segment(1) == "faculty-of-law") { ?>active<?php } ?>">Faculty of law</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>faculty-of-management" class="nav-link <?php if ($this->uri->segment(1) == "faculty-of-management") { ?>active<?php } ?>">Faculty of Management</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>faculty-of-pharmacy" class="nav-link <?php if ($this->uri->segment(1) == "faculty-of-pharmacy") { ?>active<?php } ?>">Faculty of Pharmacy</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>faculty-of-school-education" class="nav-link <?php if ($this->uri->segment(1) == "faculty-of-school-education") { ?>active<?php } ?>">Faculty Of School Education</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>faculty-of-science" class="nav-link <?php if ($this->uri->segment(1) == "faculty-of-science") { ?>active<?php } ?>">Faculty of Science</a>
										</li>
									</ul>
								</li>

								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link ">
										Admission
										<i class="ri-arrow-down-s-line"></i>
									</a>

									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="<?= base_url() ?>admission-procedure" class="nav-link <?php if ($this->uri->segment(1) == "admission-procedure") { ?>active<?php } ?>">Admission Procedure</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>apply-now" class="nav-link <?php if ($this->uri->segment(1) == "apply-now") { ?>active<?php } ?> <?php if ($this->uri->segment(1) == "admission-form") { ?>active<?php } ?>">Admission Form</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>re-registration-form" class="nav-link <?php if ($this->uri->segment(1) == "re-registration-form") { ?>active<?php } ?>">Re-registration Form</a>
										</li>
										<li class="nav-item">
											<a href="javascript:void(0);" class="nav-link ">Credit Transfer Policy</a>
										</li>
									</ul>
								</li>

								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link ">
										Verification
										<i class="ri-arrow-down-s-line"></i>
									</a>

									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="<?= base_url() ?>enrollment-verification" class="nav-link <?php if ($this->uri->segment(1) == "enrollment-verification") { ?>active<?php } ?>">Enrollment Verification</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>document-verification" class="nav-link <?php if ($this->uri->segment(1) == "document-verification") { ?>active<?php } ?>">Document Verification</a>
										</li>

									</ul>
								</li>

								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link ">
										Examination
										<i class="ri-arrow-down-s-line"></i>
									</a>

									<ul class="dropdown-menu">

										<li class="nav-item">
											<a href="<?= base_url(); ?>examination-form" class="nav-link <?php if ($this->uri->segment(1) == "examination-form") { ?>active<?php } ?>">Examination Form</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url(); ?>re-appear-form" class="nav-link <?php if ($this->uri->segment(1) == "re-appear-form") { ?>active<?php } ?>">Re-Appear Examination Form</a>
										</li>
										<li class="nav-item">
											<a href="<?=base_url();?>re_evaluation" class="nav-link <?php if ($this->uri->segment(1) == "re_evaluation") { ?>active<?php } ?>">Re-evaluation Form</a>
										</li> 
										<li class="nav-item">
											<a href="<?= base_url() ?>exam-timetable " class="nav-link <?php if ($this->uri->segment(1) == "exam-timetable") { ?>active<?php } ?>">Time Table</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url(); ?>hallticket" class="nav-link <?php if ($this->uri->segment(1) == "hallticket") { ?>active<?php } ?>">Download Hallticket</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url(); ?>hallticket-re-appear" class="nav-link <?php if ($this->uri->segment(1) == "hallticket-re-appear") { ?>active<?php } ?>">Download Re-Appear Hallticket</a>
										</li>
										<li class="nav-item">
											<a target="_blank" href="<?= $this->Digitalocean_model->get_photo('images/assessment/SELF-ASSESSMENT.pdf') ?>">Self Assessment Form</a>
										</li>

										<li class="nav-item">
											<a target="_blank" href="<?= $this->Digitalocean_model->get_photo('images/assessment/parent-assessment-form.pdf') ?>">Parent Assessment Form</a>
										</li>
										<li class="nav-item">
											<a target="_blank" href="<?= $this->Digitalocean_model->get_photo('images/assessment/teacher-assessment-form.pdf') ?>">Teacher Assessment Form</a>
										</li>
										<li class="nav-item">
											<a target="_blank" href="<?= $this->Digitalocean_model->get_photo('images/assessment/POTENTIAL_EMPLOYER_ASSESSMENT_FORM.pdf') ?>">Industry Assessment Form</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url(); ?>result-view" class="nav-link <?php if ($this->uri->segment(1) == "result-view") { ?>active<?php } ?>">View Results</a>
										</li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										Recognition
										<i class="ri-arrow-down-s-line"></i>
									</a>

									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="<?= base_url() ?>university-approvals" class="nav-link <?php if ($this->uri->segment(1) == "university-approvals") { ?>active<?php } ?>">University Gazette</a>
										</li>
										<li><a href="<?= base_url() ?>indian-council-of-agricultural-research-approval">Indian Council of Agricultural Research(ICAR)</a></li>
										<li><a href="<?= base_url() ?>pharmacy-council-of-india-approval">Pharmacy Council of India (PCI)</a></li>
										<li><a href="<?= base_url() ?>bar-council-of-india">Bar Council of India (BCI)</a></li>

									</ul>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										Collaboration
										<i class="ri-arrow-down-s-line"></i>
									</a>

									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="<?= base_url() ?>collaboration-enquiry" class="nav-link <?php if ($this->uri->segment(1) == "collaboration-enquiry") { ?>active<?php } ?>">Collaboration Enquiry</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>collaboration-form" class="nav-link <?php if ($this->uri->segment(1) == "collaboration-form") { ?>active<?php } ?>">Collaboration Form</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>collaboration-enquiry-foreign" class="nav-link <?php if ($this->uri->segment(1) == "collaboration-enquiry-foreign") { ?>active<?php } ?>">Collaboration Foreign Enquiry</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url() ?>collaboration-form-foreign" class="nav-link <?php if ($this->uri->segment(1) == "collaboration-form-foreign") { ?>active<?php } ?>">Collaboration Foreign Form</a>
										</li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										Research
										<i class="ri-arrow-down-s-line"></i>
									</a>

									<ul class="dropdown-menu">

										<li class="nav-item">
											<a href="javascript:void(0);" class="nav-link">
												Ph.D Performa
												<i class="ri-arrow-down-s-line"></i>
											</a>

											<ul class="dropdown-menu">
												<li class="nav-item">
													<a href="<?= base_url() ?>phd-registration-form" class="nav-link <?php if ($this->uri->segment(1) == "phd-registration-form") { ?>active<?php } ?>">Ph.D Entrance Form</a>
												</li>
												<li class="nav-item">
													<a href="<?= base_url() ?>phd_exam_login" class="nav-link <?php if ($this->uri->segment(1) == "phd_exam_login") { ?>active<?php } ?>">Entrance Examination Login</a>
												</li>
												<li class="nav-item">
													<a href="javascript:void(0);" class="nav-link ">Ph.D. Appendices</a>
												</li>
												<li class="nav-item">
													<a href="javascript:void(0);" class="nav-link ">Guidelines for Thesis</a>
												</li>
												<li class="nav-item">
													<!-- <a href="<?= base_url() ?>phd-rules-and-regulations" class="nav-link ">Ph.D. Rules and Regulations</a> -->
													<a href="javascript:void(0);" class="nav-link ">Ph.D. Rules and Regulations</a>

												</li>

											</ul>
										</li>

										<li class="nav-item">
											<a href="javascript:void(0);" class="nav-link">
												Ph.D Course Work
												<i class="ri-arrow-down-s-line"></i>
											</a>

											<ul class="dropdown-menu">
												<li class="nav-item">
													<a href="javascript:void(0);" class="nav-link ">Course Work Syllabus</a>
												</li>
												<li class="nav-item">
													<a href="<?= base_url() ?>phd-course-work" class="nav-link <?php if ($this->uri->segment(1) == "phd-course-work") { ?>active<?php } ?>">Ph.D Course Work Form</a>
												</li>
												<li class="nav-item">
													<a href="<?= base_url() ?>course_work_login" class="nav-link <?php if ($this->uri->segment(1) == "course_work_login") { ?>active<?php } ?>">Course Work Examination Login</a>
												</li>
											</ul>
										</li>
										<li class="nav-item">
											<a href="javascript:void(0);" class="nav-link">
												Guide/Supervisors
												<i class="ri-arrow-down-s-line"></i>
											</a>

											<ul class="dropdown-menu">
												<li class="nav-item">
													<a href="<?= base_url() ?>guide-application-form" class="nav-link <?php if ($this->uri->segment(1) == "guide-application-form") { ?>active<?php } ?>">Application For Guide/Supervisors</a>
												</li>
												<li class="nav-item">
													<a href="<?= base_url() ?>appointment-letter-for-supervisors" class="nav-link <?php if ($this->uri->segment(1) == "appointment-letter-for-supervisors") { ?>active<?php } ?>">Appointment Letter For Supervisors</a>
												</li>

											</ul>
										</li>

									</ul>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										Useful Links
										<i class="ri-arrow-down-s-line"></i>
									</a>

									<ul class="dropdown-menu">
										<li class="nav-item">
											<a href="<?=base_url()?>directorate-of-health-services-ap-notification" class="nav-link <?php if ($this->uri->segment(1) == "university-approvals") { ?>active<?php } ?>">Directorate of Health Services, AP, Notification</a>
										</li>
										<li><a href="<?=base_url()?>directorate-of-medical-education-training-and-research-ap-notification">Directorate of Medical Education, Training and Research, AP, Notification</a></li> 

									</ul>
								</li>
								<li class="nav-item">
									<a href="<?= base_url() ?>contact-us" class="nav-link <?php if ($this->uri->segment(1) == "contact-us") { ?>active<?php } ?>">Contact Us</a>
								</li>								<li class="nav-item">									<a target="_blank" class="nav-link" href="<?=$this->Digitalocean_model->get_photo('documents/UPDATED THE GLOBAL UNIVERSITY prospectus.pdf')?>">Prospectus</a>								</li>
							</ul>

							
						</div>
						<marquee onmouseover="this.stop();" onmouseout="this.start();">
							<?php

							if (!empty($marquee_new)) {
								foreach ($marquee_new as $marquee_new_result) {

									echo $marquee_new_result->news . " ";
									if ($marquee_new_result->file != "") {
							?>
										<a href="<?= $this->Digitalocean_model->get_photo('uploads/news/' . $marquee_new_result->file) ?>" target="_blank">View More</a>
									<?php } ?>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<?php }
							} ?>
						</marquee>
						
					</nav>
					
				</div>
			</div>
		</div>
		<div class="others-options">
								<ul>
									<li style="    margin-right: -2px;">
										<a href="<?= base_url() ?>apply-now" class="default-btn">
											Admission Form

										</a>
									</li>
									<li style="    margin-right: -2px;">
										<a href="<?= base_url() ?>enquiry" class="default-btn">
											Enquiry Form

										</a>
									</li>
									<li style="    margin-right: -2px;"> 
										<a href="https://www.vocational.tgu.ac.in/" class="default-btn"> 
											B. Voc   
										</a> 
									</li> 
									<li style="    margin-right: -2px;"> 
										<a href="https://pulp.tgu.ac.in/" target="_blank" class="default-btn"> 
											PULP   
										</a> 
									</li> 
									<!-- <li>
											<button type="button" class="search-btn" data-bs-toggle="modal" data-bs-target="#exampleModalsrc">
												<i class="ri-search-line"></i>
											</button>
										</li> -->
								</ul>
							</div>

		<!-- End Navbar Area -->
	</header>
	<!-- End Header Area -->