<?php 

	$profile = $this->Faculty_model->get_profile();

	$university_details = $this->Setting_model->get_university_details();

	$access = $this->Setting_model->get_user_privilege_link();

	if($this->uri->segment(1) != "faculty_profile_setting"){

		if($profile->adharcard_number == ""){

			$this->session->set_flashdata('message','Please update all details');

			redirect('faculty_profile_setting');

		}

	}

?>

<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Welcome to <?php if (!empty($university_details)) {
							echo $university_details->university_name;
						} ?></title>
	<link rel="stylesheet" href="<?= base_url() ?>back_panel/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>back_panel/vendors/base/vendor.bundle.base.css">
	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/croppie.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/vendors/base/vendor.bundle.base.css">
	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/vendors/select2/select2.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
	<link href="<?= base_url(); ?>back_panel/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>back_panel/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>back_panel/css/responsive.dataTables.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>back_panel/css/buttons.dataTables.min.css" rel="stylesheet">
	<!--<link href="https://nightly.datatables.net/css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="https://nightly.datatables.net/buttons/css/buttons.dataTables.min.css" rel="stylesheet">
		<link href="https://nightly.datatables.net/responsive/css/responsive.dataTables.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.2.1/b-html5-2.2.1/datatables.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/responsive.bootstrap4.min.css">
	<!-- <link rel="shortcut icon" href="<?= $this->Digitalocean_model->get_photo('images/logo/' . $university_details->logo) ?>" /> -->
	<link rel="shortcut icon" href="<?= base_url('images/logo/' . $university_details->logo) ?>" />

	<link href="<?= base_url(); ?>back_panel/css/jquery.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<style>

			.error{

				color:red;

			}

		</style>

	</head>

	<body>

		<div class="container-scroller">

			<div class="pro-banner" id="pro-banner">

					<div class="card pro-banner-bg border-0 rounded-0">

					<div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
					<p class="mb-0 text-white font-weight-medium mb-2 mb-lg-0 mb-xl-0">
						<marquee>Welcome to <?= $university_details->university_name ?></marquee>
					</p>
					<div class="d-flex">
						<button id="bannerClose" class="btn border-0 p-0">
							<i class="mdi mdi-close text-white"></i>
						</button>
					</div>
				</div>

				</div>

			</div>

			<div class="horizontal-menu">

				<nav class="navbar top-navbar col-lg-12 col-12 p-0">

					<div class="container-fluid">

						<div class="navbar-menu-wrapper ">
							
								<div class="header_in">
									<button type="button" class="toggle" id="toggle">
										<span></span>
									</button>
								</div>

							<!-- <ul class="navbar-nav navbar-nav-left">

							</ul> -->

							<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
							<!-- <a class="navbar-brand brand-logo" href="<?= base_url(); ?>erp-dashboard">
								<img src="<?=base_url();?>images/footer-logo.png" alt="logo" />
							</a> -->
							<!-- <a class="navbar-brand brand-logo-mini" href="<?= base_url(); ?>erp-dashboard">
								<img src="<?=base_url();?>images/footer-logo.png" alt="logo" />
							</a> -->

							<a class="navbar-brand brand-logo" href="<?= base_url(); ?>faculty_dashboard">
								<img src="<?=base_url();?>images/footer-logo.png" alt="logo" />
							</a>
						</div>

						
							<ul class="navbar-nav navbar-nav-right">

								 <li class="nav-item nav-profile dropdown">

									<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

										<span class="nav-profile-name"><?php if(!empty($profile)){ echo $profile->first_name;}?></span>

										<span class="online-status"></span>

										<img src="<?=base_url();?>images/employee/default.jpg" alt="profile"/>

									</a>

									<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

										<a class="dropdown-item" href="<?=base_url();?>faculty_profile">

											<i class="mdi mdi-settings text-primary"></i>Settings

										</a>	

										<a class="dropdown-item" href="<?=base_url();?>faculty_profile_setting">

											<i class="mdi mdi-settings text-primary"></i>Profile Settings

										</a>

										<a class="dropdown-item" href="<?=base_url();?>faculty_logout">

											<i class="mdi mdi-logout text-primary"></i>Logout

										</a>

									</div>

								</li>

							</ul>

							<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">

								<span class="mdi mdi-menu"></span>

							</button>

						</div>

					</div>

				</nav>

				<nav class="bottom-navbar navbar navbar-expand-md" style="display:none;">

					<div class="container-fluid">

						<div class="sidebar card1" id="sidebar">
						<ul class="nav page-navigation ulscroll">

							<li class="nav-item">

							<a class="nav-link" href="<?=base_url();?>faculty_dashboard">

								<i class="mdi mdi-file-document-box menu-icon "></i>

								<span class="menu-title">Dashboard</span>

							</a>

							</li>

							<?php if(!empty($profile) && $profile->user_type == "0"){?> 

							<li class="nav-item">

							<a href="#" class="nav-link">

								<i class="mdi mdi-settings menu-icon "></i>

								<span class="menu-title">Register Management</span>

								<i class="menu-arrow"></i>

							</a>

							<div class="submenu">

								<ul> 

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>add_register">Manage Register</a></li> 

									<!--<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_attendance">Manage Attendance</a></li> -->

								</ul>

							</div>

							</li>

							<?php }?>

							<?php if(!empty($profile) && $profile->user_type == "0"){?> 

							<!--<li class="nav-item">

							<a href="#" class="nav-link">

								<i class="mdi mdi-settings menu-icon mdi-spin"></i>

								<span class="menu-title">Syllabus Management</span>

								<i class="menu-arrow"></i>

							</a>

							<div class="submenu">

								<ul> 

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>add_syllabus">Manage Syllabus</a></li>

								</ul>

							</div>

							</li>-->

							<?php }?>

							<li class="nav-item">

							<a href="#" class="nav-link">

								<i class="mdi mdi-settings menu-icon "></i>

								<span class="menu-title">Report Management</span>

								<i class="menu-arrow"></i>

							</a>

							<div class="submenu">

								<ul> 

									<?php if(!empty($profile) && $profile->user_type == "0"){?>

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>add_daily_report">Add daily Report</a></li>

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>my_daily_report">My All Report</a></li>

									<?php }else{?> 

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>staff_attendance">Staff Attendance</a></li>

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>staff_added_mcq_report">Staff MCQ Report</a></li>										

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>new_daily_report">New Daily Report</a></li>

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>all_daily_report">All Daily Report</a></li>

									<?php }?>

								</ul>

							</div>

							</li>

							<li class="nav-item">

							<a class="nav-link" href="<?=base_url();?>give_feedbak">

								<i class="mdi mdi-file-document-box menu-icon "></i>

								<span class="menu-title">Feedback</span>

							</a>

							</li>

							<li class="nav-item">

							<a class="nav-link" href="<?=base_url();?>faculty_documents">

								<i class="mdi mdi-file-document-box menu-icon "></i>

								<span class="menu-title">Documents</span>

							</a>

							</li>

							<li class="nav-item">

							<a href="#" class="nav-link">

								<i class="mdi mdi-settings menu-icon "></i>

								<span class="menu-title">Assignments</span>

								<i class="menu-arrow"></i>

							</a>

							<div class="submenu">

								<ul>  

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>assignments_mcq"> MCQ Assignments</a></li> 

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>add_theoretical_questions"> Theoretical Questions</a></li> 

								</ul>

							</div>

							</li>



							<li class="nav-item">

							<a href="#" class="nav-link">

								<i class="mdi mdi-settings menu-icon "></i>

								<span class="menu-title">Online Materials</span>

								<i class="menu-arrow"></i>

							</a>

							<div class="submenu">

								<ul>  

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>faculty_online_class_meet"> Online Classes</a></li> 

									<!--<li class="nav-item"><a class="nav-link" href="<?=base_url();?>course_video_add"> Course Video Add</a></li> 

									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>course_video_list"> Course Video List</a></li> -->

								</ul>

							</div>

							</li>





							<li class="nav-item">

							<a class="nav-link" href="<?=base_url();?>faculty_logout">

								<i class="mdi mdi-file-document-box menu-icon "></i>

								<span class="menu-title">Logout</span>

							</a>

							</li>

							</ul>
						</div>

					</div>

				</nav>


				

			</div>