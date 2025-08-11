<?php
	$center_profile = $this->Cluster_center_model->get_profile();
	$university_details = $this->Setting_model->get_university_details(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Welcome to <?php if (!empty($university_details)) {
							echo $university_details->university_name;
						} ?></title>
						  <link rel="shortcut icon" href="<?=base_url();?>images/logo/logo.png" />
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
	<!-- <link rel="shortcut icon" href="<?= base_url('images/logo/' . $university_details->logo) ?>" /> -->

	<link href="<?= base_url(); ?>back_panel/css/jquery.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet"> -->
	<style>
		

		 
	</style>
</head>

<!-- <script>

var btn = document.querySelector('.toggle');
var btnst = true;
btn.onclick = function() {
  if(btnst == true) {
    document.querySelector('.toggle span').classList.add('toggle');
    document.getElementById('sidebar').classList.add('sidebarshow');
    btnst = false;
  }else if(btnst == false) {
    document.querySelector('.toggle span').classList.remove('toggle');
    document.getElementById('sidebar').classList.remove('sidebarshow');
    btnst = true;
  }
}
	</script> -->
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

						
						<!-- <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
							<a class="navbar-brand brand-logo" href="<?= base_url(); ?>erp-dashboard">
								<img src="<?= $this->Digitalocean_model->get_photo('images/logo/' . $university_details->logo) ?>" alt="logo" />
							</a>
							<a class="navbar-brand brand-logo-mini" href="<?= base_url(); ?>erp-dashboard">
								<img src="<?= $this->Digitalocean_model->get_photo('images/logo/' . $university_details->logo) ?>" alt="logo" />
							</a>
						</div> -->
						<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
							<a class="navbar-brand brand-logo" href="<?= base_url(); ?>erp-dashboard">
								<img src="<?=base_url(); ?>images/footer-logo.png" alt="logo" />
							</a>
							<a class="navbar-brand brand-logo-mini" href="<?= base_url(); ?>erp-dashboard">
								<img src="<?=base_url(); ?>images/footer-logo.png" alt="logo" />
							</a>
						</div>

						

						<!-- <ul class="erp-dashboard-ul-cust">
							<h2 class="admin_dashboard_header univ_name">THE GLOBAL UNIVERSITY</h2>
							
						</ul> -->
						
						<ul class="navbar-nav navbar-nav-right">
							<!-- <li class="nav-item help_module">
								<div class="col-sm-12">
									<input type="text" autocomplete="off" name="search" id="search" class="form-control" placeholder="For Help Search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
								</div>
								<div class="col-sm-3">
									<button type="submit" class="btn btn-primary x1_button">Search</button>
									<button type="reset" class="btn btn-primary x1_button" onclick="resetForm()">Reset</button>
								</div>
							</li> -->

							<li class="nav-item nav-profile dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
									<span class="nav-profile-name"><?php if(!empty($center_profile)){ echo $center_profile->name;}?></span>
									<!-- <span class="online-status"></span> -->
									<!--<img src="<?= $this->Digitalocean_model->get_photo('images/employee/' . $profile->profile_pic) ?>" alt="profile" />-->
								</a>
								<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
									 
									<a class="dropdown-item" href="<?=base_url();?>cluster-center-logout">
											<i class="mdi mdi-logout text-primary"></i>Logout
										</a>
								</div>
							</li>
						</ul>
						<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center admin-menu-btn" type="button" data-toggle="horizontal-menu-toggle">
							<span class="mdi mdi-menu"></span>
						</button>
					</div>
				</div>
			</nav>



			<nav class="bottom-navbar navbar navbar-expand-md" style="display:none;">
			<!-- <button class="close-button btn btn-secondary">Close</button> -->
			
				<!-- <div class="container-fluid custom_container"> -->
				<div class="container-fluid ">
				<div class="sidebar card1" id="sidebar">
					<ul class="nav page-navigation ulscroll">
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url(); ?>cluster-center-dashboard">
								<i class="mdi mdi-table menu-icon "></i>
								<span class="menu-title">Dashboard</span>
							</a>
						</li>
						 
						
					</ul>
				</div>				 
				</div>
			</nav>
		</div>


