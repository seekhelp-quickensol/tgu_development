<?php 

	$student_profile = $this->Student_exam_model->get_student_profile();

	$university_details = $this->Setting_model->get_university_details();

?>

<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Welcome to <?php if(!empty($university_details)){ echo $university_details->university_name;}?></title>

		<link rel="stylesheet" href="<?=base_url()?>back_panel/vendors/mdi/css/materialdesignicons.min.css">

		<link rel="stylesheet" href="<?=base_url()?>back_panel/vendors/base/vendor.bundle.base.css">

		<link rel="stylesheet" href="<?=base_url();?>back_panel/css/style.css">

		<link rel="stylesheet" href="<?=base_url();?>back_panel/vendors/base/vendor.bundle.base.css">

		<link rel="stylesheet" href="<?=base_url();?>back_panel/vendors/select2/select2.min.css">

		<link rel="stylesheet" href="<?=base_url();?>back_panel/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">

		<link href="<?=base_url();?>back_panel/css/jquery.dataTables.min.css" rel="stylesheet">

		<link href="<?=base_url();?>back_panel/css/dataTables.bootstrap.min.css" rel="stylesheet">

		<link href="<?=base_url();?>back_panel/css/responsive.dataTables.min.css" rel="stylesheet">

		<link href="<?=base_url();?>back_panel/css/buttons.dataTables.min.css" rel="stylesheet">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<link rel="stylesheet" href="<?=base_url();?>back_panel/css/responsive.bootstrap4.min.css">

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

		<link rel="shortcut icon" href="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" />

		<style>

			.error{

				color:red;

			}

			.overlay {

			left: 0;

			top: 0;

			width: 100%;

			height: 100%;

			position: fixed;

			background: #00000078;

			z-index: 99999;

		}



		.overlay__inner {

			left: 0;

			top: 0;

			width: 100%;

			height: 100%;

			position: absolute;
BIR TIKENDRAJIT UNIVERSITY
		}



		.overlay__content {

			left: 50%;

			position: absolute;

			top: 50%;

			transform: translate(-50%, -50%);

		} 

		.spinner {

			width: 75px;

			height: 75px;

			display: inline-block;

			border-width: 2px;

			border-color: rgba(255, 255, 255, 0.05);

			border-top-color: #fff;

			animation: spin 1s infinite linear;

			border-radius: 100%;

			border-style: solid;

		}



		@keyframes spin {

		  100% {

			transform: rotate(360deg);

		  }

		}

		.loader_content{

			left: 50%;

			position: absolute;

			top: 60%;

			transform: translate(-50%, -50%);

		}

		.loader_content h5{

			color: #fff;

			font-weight: 600;

		}

		</style>

	</head>

	<body> 

		<div class="container-scroller">

			<div class="pro-banner" id="pro-banner">

					<div class="card pro-banner-bg border-0 rounded-0 orange">

						<div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">

							<p class="mb-0 text-white font-weight-medium mb-2 mb-lg-0 mb-xl-0" style="width:90%">

							<marquee>Welcome to THE GLOBAL UNIVERSITY</marquee>

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

						<div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">

						

							<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

								<a class="navbar-brand brand-logo" href="javacript:void(0)"><img src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" alt="logo"/></a>

								<a class="navbar-brand brand-logo-mini" href="<?=base_url();?>exam-dashboard"><img src="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" alt="logo"/></a>

							</div>

							<ul class="navbar-nav navbar-nav-right">

								 <?php if($this->uri->segment(1) != "start_exam"){?>

								<li class="nav-item nav-profile dropdown">

									<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

										<span class="nav-profile-name"><?php if(!empty($student_profile)){ echo $student_profile->student_name;}?></span>

										<span class="online-status"></span>

										<img src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$student_profile->photo)?>" alt="profile"/>

									</a>

									<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

										<a class="dropdown-item" href="<?=base_url();?>exam_student_logout">

											<i class="mdi mdi-logout text-primary"></i>Logout

										</a>

									</div>

								</li>

								 <?php }?>

							</ul>

							<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">

								<span class="mdi mdi-menu"></span>

							</button>

						</div>

					</div>

				</nav>

				<nav class="bottom-navbar">

					<div class="container">

						

					</div>

				</nav>

			</div>