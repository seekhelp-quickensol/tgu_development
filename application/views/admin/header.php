<?php

$profile = $this->Admin_model->get_profile();

$university_details = $this->Setting_model->get_university_details();

// echo "<pre>";print_r($help);exit;



// $no_reply_mail ="";

// $no_reply_name ="";



// if (!empty($university_details) && isset($university_details->mail)) {

//     $no_reply_mail = $university_details->mail;

// }



// if (!empty($university_details) && isset($university_details->university_name)) {

//     $no_reply_name = $university_details->university_name;

// }



// define('no_reply_mail', $no_reply_mail);

// define('no_reply_name', $no_reply_name);



// if (!defined('no_reply_mail')) {

// 	define('no_reply_mail', ''); 

// }

// if (!defined('no_reply_name')) {

// 	define('no_reply_name', ''); 

// }



$access = $this->Setting_model->get_user_privilege_link();


// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1); 

?>

<!DOCTYPE html>

<html lang="en">



<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Welcome to <?php if (!empty($university_details)) { echo $university_details->university_name;} ?></title>

	<link rel="shortcut icon" href="<?= base_url(); ?>images/logo/logo.png" />

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



	<!-- <link href="<?= base_url(); ?>back_panel/css/jquery.css" rel="stylesheet"> -->



	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"

		integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="

		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet"> -->

<style> 
.feedback-form-btn {
    position: absolute;
    right: 100%;
    color: #fff;
    transform: rotate(90deg);
    top: 40%;
    border: none;
    border-radius: 0px 0px 8px 8px;
	margin-right: -50px;
}
.feedback-form a {
    background: #6f5b45;
}
.feedback-form a:focus,.feedback-form a:active {
	background-color: #6f5b45 !important;
    border-color: #6f5b45 !important;
	box-shadow:none !important;
}
.feedback-form a:hover {
    background: #a91014;
}
.feedback-form {
    position: absolute;
    top: 20%;
    right: 0px;
    z-index: 100;
	height:100%;
}
.feedback_form_area_inner {
    
    color: #000;
    padding: 15px;
}
.feedback_form_area_inner .form-group {
    margin-bottom: 5px;
}
.feedback_form_area {
    position: relative;
    display: none;
    overflow: hidden; 
    padding: 10px;
    padding-top: 10px;
    background: white; 
    border-radius: 8px 0px 0px 8px;
    bottom: 12px;
	width:900px;
} 
.declare table {
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 100%;
}
.declare td, th {
	border: 1px solid #dddddd;
	text-align: left;
	padding: 8px;
}
.declare tr:nth-child(even) {
	background-color: #dddddd;
}
<?php if (in_array('view_blended_verify_details', $access)) { ?>
.view_blended_verify_details { 
	display: inline-block !important;
} 
<?php } else { ?>.view_blended_verify_details { 
	display: none !important; 
} 
		<?php } ?><?php if (in_array('delete_class', $access)) { ?>.delete_class {

			display: inline-block !important;

		}



		<?php } else { ?>.delete_class {

			display: none !important;

		}



		<?php } ?><?php if (in_array('student_qualification', $access)) { ?>.student_qualification {

			display: inline-block !important;

		}



		<?php } else { ?>.student_qualification {

			display: none !important;

		}



		<?php } ?><?php if (in_array('admin_print_id', $access)) { ?>.admin_print_id {

			display: inline-block !important;

		}



		<?php } else { ?>.admin_print_id {

			display: none !important;

		}



		<?php } ?><?php if (in_array('print_admission_form', $access)) { ?>.print_admission_form {

			display: inline-block !important;

		}



		<?php } else { ?>.print_admission_form {

			display: none !important;

		}



		<?php } ?><?php if (in_array('cancel_student', $access)) { ?>.cancel_student {

			display: inline-block !important;

		}



		<?php } else { ?>.cancel_student {

			display: none !important;

		}



		<?php } ?><?php if (in_array('manage_student_account', $access)) { ?>.manage_student_account {

			display: inline-block !important;

		}



		<?php } else { ?>.manage_student_account {

			display: none !important;

		}



		<?php } ?><?php if (in_array('edit_student_payment', $access)) { ?>.edit_student_payment {

			display: inline-block !important;

		}



		<?php } else { ?>.edit_student_payment {

			display: none !important;

		}



		<?php } ?><?php if (in_array('delete_student_payment', $access)) { ?>.delete_student_payment {

			display: inline-block !important;

		}



		<?php } else { ?>.delete_student_payment {

			display: none !important;

		}



		<?php } ?><?php if (in_array('activate-login-single', $access)) { ?>.activate-login-single {

			display: inline-block !important;

		}



		<?php } else { ?>.activate-login-single {

			display: none !important;

		}



		<?php } ?><?php if (in_array('hold-login-single', $access)) { ?>.hold-login-single {

			display: inline-block !important;

		}



		<?php } else { ?>.hold-login-single {

			display: none !important;

		}



		<?php } ?><?php if (in_array('enrolled_new_student', $access)) { ?>.enrolled_new_student {

			display: inline-block !important;

		}



		<?php } else { ?>.enrolled_new_student {

			display: none !important;

		}



		<?php } ?><?php if (in_array('approved_admission', $access)) { ?>.approved_admission {

			display: inline-block !important;

		}



		<?php } else { ?>.approved_admission {

			display: none !important;

		}



		<?php } ?><?php if (in_array('edit_class', $access)) { ?>.edit_class {
			display: inline-block !important;

		}

		<?php } else { ?>.edit_class {
			display: none !important;
		}

		<?php } ?><?php if (in_array('edit_subject', $access)) { ?>.edit_subject {
			display: inline-block !important;

		}

		<?php } else { ?>.edit_subject {
			display: none !important;
		}

		<?php } ?><?php if (in_array('activate_clas', $access)) { ?>.activate_clas {

			display: inline-block !important;

		}



		<?php } else { ?>.activate_clas {

			display: none !important;

		}



		<?php } ?><?php if (in_array('inactivate_clas', $access)) { ?>.inactivate_clas {

			display: inline-block !important;

		}



		<?php } else { ?>.inactivate_clas {

			display: none !important;

		}



		<?php } ?><?php if (in_array('cancel_admission', $access)) { ?>.cancel_admission_btn {

			display: inline-block !important;

		}



		<?php } else { ?>.cancel_admission_btn {

			display: none !important;

		}



		<?php } ?><?php if (in_array('create_subject_quize', $access)) { ?>.create_subject_quize {

			display: inline-block !important;

		}



		<?php } else { ?>.create_subject_quize {

			display: none !important;

		}



		<?php } ?><?php if (in_array('faculty_left', $access)) { ?>.faculty_left {

			display: inline-block !important;

		}



		<?php } else { ?>.faculty_left {

			display: none !important;

		}



		<?php } ?><?php if (in_array('admin_faculty_documents', $access)) { ?>.admin_faculty_documents {

			display: inline-block !important;

		}



		<?php } else { ?>.admin_faculty_documents {

			display: none !important;

		}



		<?php } ?><?php if (in_array('faculty_not_left', $access)) { ?>.faculty_not_left {

			display: inline-block !important;

		}



		<?php } else { ?>.faculty_not_left {

			display: none !important;

		}



		<?php } ?><?php if (in_array('reset_faculty_password', $access)) { ?>.reset_faculty_password {

			display: inline-block !important;

		}



		<?php } else { ?>.reset_faculty_password {

			display: none !important;

		}



		<?php } ?><?php if (in_array('inactive_hallticket', $access)) { ?>.inactive_hallticket {

			display: inline-block !important;

		}



		<?php } else { ?>.inactive_hallticket {

			display: none !important;

		}



		<?php } ?><?php if (in_array('active_hallticket', $access)) { ?>.active_hallticket {

			display: inline-block !important;

		}



		<?php } else { ?>.active_hallticket {

			display: none !important;

		}



		<?php } ?><?php if (in_array('unapproved_student_degree', $access)) { ?>.unapproved_student_degree {

			display: inline-block !important;

		}



		<?php } else { ?>.unapproved_student_degree {

			display: none !important;

		}



		<?php } ?><?php if (in_array('approved_student_degree_request', $access)) { ?>.approved_student_degree_request {

			display: inline-block !important;

		}



		<?php } else { ?>.approved_student_degree_request {

			display: none !important;

		}



		<?php } ?><?php if (in_array('update_payment_reccom', $access)) { ?>.update_payment_reccom {

			display: inline-block !important;

		}



		<?php } else { ?>.update_payment_reccom {

			display: none !important;

		}



		<?php } ?><?php if (in_array('second_update_payment_reccom', $access)) { ?>.second_update_payment_reccom {

			display: inline-block !important;

		}



		<?php } else { ?>.second_update_payment_reccom {

			display: none !important;

		}



		<?php } ?><?php if (in_array('unapproved_student_recommendation_letter', $access)) { ?>.unapproved_student_recommendation_letter {

			display: inline-block !important;

		}



		<?php } else { ?>.unapproved_student_recommendation_letter {

			display: none !important;

		}



		<?php } ?><?php if (in_array('approve_student_recommendation_letter', $access)) { ?>.approve_student_recommendation_letter {

			display: inline-block !important;

		}



		<?php } else { ?>.approve_student_recommendation_letter {

			display: none !important;

		}



		<?php } ?><?php if (in_array('second_unapproved_student_recommendation_letter', $access)) { ?>.second_unapproved_student_recommendation_letter {

			display: inline-block !important;

		}



		<?php } else { ?>.second_unapproved_student_recommendation_letter {

			display: none !important;

		}



		<?php } ?><?php if (in_array('second_approve_student_recommendation_letter', $access)) { ?>.second_approve_student_recommendation_letter {

			display: inline-block !important;

		}



		<?php } else { ?>.second_approve_student_recommendation_letter {

			display: none !important;

		}



		<?php } ?><?php if (in_array('unapproved_student_transfer_certificate', $access)) { ?>.unapproved_student_transfer_certificate {

			display: inline-block !important;

		}



		<?php } else { ?>.unapproved_student_transfer_certificate {

			display: none !important;

		}



		<?php } ?><?php if (in_array('approved_student_certificate', $access)) { ?>.approved_student_certificate {

			display: inline-block !important;

		}



		<?php } else { ?>.approved_student_certificate {

			display: none !important;

		}



		<?php } ?><?php if (in_array('unverify_student_migration_certificate', $access)) { ?>.unverify_student_migration_certificate {

			display: inline-block !important;

		}



		<?php } else { ?>.unverify_student_migration_certificate {

			display: none !important;

		}



		<?php } ?><?php if (in_array('student_migration_certificate_add_requests', $access)) { ?>.student_migration_certificate_add_requests {

			display: inline-block !important;

		}



		<?php } else { ?>.student_migration_certificate_add_requests {

			display: none !important;

		}



		<?php } ?><?php if (in_array('verify_student_migration_requests', $access)) { ?>.verify_student_migration_requests {

			display: inline-block !important;

		}



		<?php } else { ?>.verify_student_migration_requests {

			display: none !important;

		}



		<?php } ?><?php if (in_array('approved_student_provisional_degrees', $access)) { ?>.approved_student_provisional_degrees {

			display: inline-block !important;

		}



		<?php } else { ?>.approved_student_provisional_degrees {

			display: none !important;

		}



		<?php } ?><?php if (in_array('apply_student_provisional_degrees', $access)) { ?>.apply_student_provisional_degrees {

			display: inline-block !important;

		}



		<?php } else { ?>.apply_student_provisional_degrees {

			display: none !important;

		}



		<?php } ?><?php if (in_array('verify_separate_student_migration_requests', $access)) { ?>.verify_separate_student_migration_requests {

			display: inline-block !important;

		}



		<?php } else { ?>.verify_separate_student_migration_requests {

			display: none !important;

		}



		<?php } ?><?php if (in_array('unverify_separate_student_migration_certificate', $access)) { ?>.unverify_separate_student_migration_certificate {

			display: inline-block !important;

		}



		<?php } else { ?>.unverify_separate_student_migration_certificate {

			display: none !important;

		}



		<?php } ?><?php if (in_array('separate_student_transfer_certificate', $access)) { ?>.separate_student_transfer_certificate {

			display: inline-block !important;

		}



		<?php } else { ?>.separate_student_transfer_certificate {

			display: none !important;

		}



		<?php } ?><?php if (in_array('unapproved_separate_student_transfer_certificate', $access)) { ?>.unapproved_separate_student_transfer_certificate {

			display: inline-block !important;

		}



		<?php } else { ?>.unapproved_separate_student_transfer_certificate {

			display: none !important;

		}



		<?php } ?><?php if (in_array('approve_separate_student_recommendation_letter', $access)) { ?>.approve_separate_student_recommendation_letter {

			display: inline-block !important;

		}



		<?php } else { ?>.approve_separate_student_recommendation_letter {

			display: none !important;

		}



		<?php } ?><?php if (in_array('unapproved_separate_student_recommendation_letter', $access)) { ?>.unapproved_separate_student_recommendation_letter {

			display: inline-block !important;

		}



		<?php } else { ?>.unapproved_separate_student_recommendation_letter {

			display: none !important;

		}



		<?php } ?><?php if (in_array('approved_separate_student_degree_request', $access)) { ?>.approved_separate_student_degree_request {

			display: inline-block !important;

		}



		<?php } else { ?>.approved_separate_student_degree_request {

			display: none !important;

		}



		<?php } ?><?php if (in_array('unapproved_separate_student_degree', $access)) { ?>.unapproved_separate_student_degree {

			display: inline-block !important;

		}



		<?php } else { ?>.unapproved_separate_student_degree {

			display: none !important;

		}



		<?php } ?><?php if (in_array('separate_student_provisional_degrees', $access)) { ?>.separate_student_provisional_degrees {

			display: inline-block !important;

		}



		<?php } else { ?>.separate_student_provisional_degrees {

			display: none !important;

		}



		<?php } ?><?php if (in_array('add_course_work_exam_question', $access)) { ?>.add_course_work_exam_question {

			display: inline-block !important;

		}



		<?php } else { ?>.add_course_work_exam_question {

			display: none !important;

		}



		<?php } ?><?php if (in_array('course_work_exam', $access)) { ?>.course_work_exam {

			display: inline-block !important;

		}



		<?php } else { ?>.course_work_exam {

			display: none !important;

		}



		<?php } ?><?php if (in_array('update_course_work_question', $access)) { ?>.update_course_work_question {

			display: inline-block !important;

		}



		<?php } else { ?>.update_course_work_question {

			display: none !important;

		}



		<?php } ?><?php if (in_array('approve_course_work_registration', $access)) { ?>.approve_course_work_registration {

			display: inline-block !important;

		}



		<?php } else { ?>.approve_course_work_registration {

			display: none !important;

		}



		<?php } ?><?php if (in_array('course_work_update_payment', $access)) { ?>.course_work_update_payment {

			display: inline-block !important;

		}



		<?php } else { ?>.course_work_update_payment {

			display: none !important;

		}



		<?php } ?><?php if (in_array('generate_course_work_result', $access)) { ?>.generate_course_work_result {

			display: inline-block !important;

		}



		<?php } else { ?>.generate_course_work_result {

			display: none !important;

		}



		<?php } ?><?php if (in_array('disapprove_course_work_registration', $access)) { ?>.disapprove_course_work_registration {

			display: inline-block !important;

		}



		<?php } else { ?>.disapprove_course_work_registration {

			display: none !important;

		}



		<?php } ?><?php if (in_array('course_work_answer_book', $access)) { ?>.course_work_answer_book {

			display: inline-block !important;

		}



		<?php } else { ?>.course_work_answer_book {

			display: none !important;

		}



		<?php } ?><?php if (in_array('left_employee', $access)) { ?>.left_employee {

			display: inline-block !important;

		}



		<?php } else { ?>.left_employee {

			display: none !important;

		}



		<?php } ?><?php if (in_array('refund_btn', $access)) { ?>.refund_btn {

			display: inline-block !important;

		}



		<?php } else { ?>.refund_btn {

			display: none !important;

		}



		<?php } ?><?php if (in_array('separate_reregistration', $access)) { ?>.separate_reregistration {

			display: inline-block !important;

		}



		<?php } else { ?>.separate_reregistration {

			display: none !important;

		}



		<?php } ?><?php if (in_array('account_details_separate', $access)) { ?>.account_details_separate {

			display: inline-block !important;

		}



		<?php } else { ?>.account_details_separate {

			display: none !important;

		}



		<?php } ?><?php if (in_array('hold_login', $access)) { ?>.hold_login {

			display: inline-block !important;

		}



		<?php } else { ?>.hold_login {

			display: none !important;

		}



		<?php } ?><?php if (in_array('activate_login', $access)) { ?>.activate_login {

			display: inline-block !important;

		}



		<?php } else { ?>.activate_login {

			display: none !important;

		}



		<?php } ?><?php if (in_array('edit_job_application', $access)) { ?>.edit_job_application {
			display: inline-block !important;
		}

		<?php } else { ?>.edit_job_application {
			display: none !important;
		}

		<?php } ?><?php if (in_array('hold_remark', $access)) { ?>.hold_remark {
			display: inline-block !important;
		}

		<?php } else { ?>.hold_remark {
			display: none !important;
		}

		<?php } ?>
		<?php if (in_array('update_student', $access)) { ?>.update_student {
			display: inline-block !important;
		}

		<?php } else { ?>.update_student {
			display: none !important;
		}

		<?php } ?>
		
		<?php if (in_array('document_download_access', $access)) { ?>
    		.document_download_access {
    			display: inline-block !important;
    		}
		<?php } else { ?>
    		.document_download_access {
    			display: none !important;
    		}
    	<?php }?>
    	<?php if (in_array('document_view_access', $access)) { ?>
    		.document_view_access {
    			display: inline-block !important;
    		}
		<?php } else { ?>
    		.document_view_access {
    			display: none !important;
    		}
    	<?php }?>
    	
    	<?php if (in_array('delete_answer_book', $access)) { ?>
    		.delete_answer_book {
    			display: inline-block !important;
    		}
		<?php } else { ?>
    		.delete_answer_book {
    			display: none !important;
    		}
    	<?php }?>
    	<?php if (in_array('update_answer_book', $access)) { ?>
    		.update_answer_book {
    			display: inline-block !important;
    		}
		<?php } else { ?>
    		.update_answer_book {
    			display: none !important;
    		}
    	<?php }?>
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

								<img src="<?= base_url(); ?>images/footer-logo.png" alt="logo" />

							</a>

							<a class="navbar-brand brand-logo-mini" href="<?= base_url(); ?>erp-dashboard">

								<img src="<?= base_url(); ?>images/footer-logo.png" alt="logo" />

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

									<span class="nav-profile-name"><?php if (!empty($profile)) {

																		echo $profile->first_name;
																	} ?></span>

									<!-- <span class="online-status"></span> -->

									<img src="<?= $this->Digitalocean_model->get_photo('images/employee/' . $profile->profile_pic) ?>" alt="profile" />

								</a>

								<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

									<a class="dropdown-item" href="<?= base_url(); ?>profile-setting">

										<i class="mdi mdi-settings"></i>Settings

									</a>

									<a class="dropdown-item" href="<?= base_url(); ?>erp-logout">

										<i class="mdi mdi-logout"></i>Logout

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

							<?php if (in_array('erp-dashboard', $access)) { ?>

								<li class="nav-item">

									<a class="nav-link" href="<?= base_url(); ?>erp-dashboard">

										<i class="mdi mdi-table menu-icon "></i>

										<span class="menu-title">Dashboard</span>

									</a>

								</li>

							<?php } ?>

							<!-- <?php if (in_array('erp-dashboard', $access)) { ?>

							<li class="nav-item">

								<a class="nav-link" href="<?= base_url(); ?>erp-dashboard">

									<i class="mdi mdi-table menu-icon "></i>

									<span class="menu-title">Dashboard</span>

								</a>

							</li>

						<?php } ?> -->

							<?php if (in_array('coupon_setting', $access) || in_array('signature_management', $access) || in_array('website_setting', $access) || in_array('center_session', $access)  || in_array('bank_management', $access) || in_array('id_management', $access) || in_array('designation_management', $access) || in_array('user_privilege', $access) || in_array('user_sub_privilege', $access) || in_array('employee_list', $access) || in_array('add_employee', $access) || in_array('assign_user_privilege', $access) || in_array('left_employee_list', $access) || in_array('job_applications', $access) || in_array('cbd_complaint_list', $access) || in_array('placement_record_form_list', $access) ||  in_array('visitor_list', $access)) { ?>

								<li class="nav-item">

									<a href="#" class="nav-link">

										<i class="mdi mdi-settings menu-icon "></i>

										<span class="menu-title dropdown_mob">Setting</span>

										<i class="menu-arrow"></i>

									</a>

									<div class="submenu" id="overflow_y_scroll">

										<ul>



											<?php if (in_array('website_setting', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "website_setting") { ?>active<?php } ?>" href="<?= base_url(); ?>website_setting">Website Setting</a></li>

											<?php } ?>

											<?php if (in_array('coupon_setting', $access)) { ?>

												<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>coupon_setting">Coupon Setting</a></li>

											<?php } ?>



											<?php if (in_array('terms_and_conditions', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "terms_and_conditions") { ?>active<?php } ?>" href="<?= base_url(); ?>terms_and_conditions">Terms and conditions Setting</a></li>

											<?php } ?>


											<?php if (in_array('center_session', $access)) { ?>
												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "center_session") { ?>active<?php } ?>" href="<?= base_url(); ?>center_session">Center Session</a></li>
											<?php } ?>


											<?php if (in_array('privacy_policy', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "privacy_policy") { ?>active<?php } ?>" href="<?= base_url(); ?>privacy_policy">Privacy and Policy Setting</a></li>

											<?php } ?>



											<?php if (in_array('certificate_fees_management', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "certificate_fees_management") { ?>active<?php } ?>" href="<?= base_url(); ?>certificate_fees_management">Certificate Fees Management</a></li>

											<?php } ?>



											<?php if (in_array('signature_management', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "signature_management") { ?>active<?php } ?>" href="<?= base_url(); ?>signature_management">Signature Setting</a></li>

											<?php } ?>

											<?php if (in_array('exam_setup', $access)) { ?>

												<!-- <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>exam_setup">Exam Setup</a></li> -->

												<li class="nav-item"><a class="nav-link<?php if ($this->uri->segment(1) == "exam_setup") { ?>active<?php } ?>" href="<?= base_url(); ?>exam_setup">Exam Setup </a></li>



											<?php } ?>



											<!--<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>password_setting">Password Setting</a></li>-->

											<?php if (in_array('bank_management', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "bank_management") { ?>active<?php } ?>" href="<?= base_url(); ?>bank_management">Bank Management</a></li>

											<?php } ?>

											<!-- <?php if (in_array('id_management', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "id_management") { ?>active<?php } ?>" href="<?= base_url(); ?>id_management">ID Management</a></li>

										<?php } ?> -->

											<?php if (in_array('designation_management', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "designation_management") { ?>active<?php } ?>" href="<?= base_url(); ?>designation_management">Designation Management</a></li>

											<?php } ?>

											<?php if (in_array('user_privilege', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "user_privilege") { ?>active<?php } ?>" href="<?= base_url(); ?>user_privilege">Privilege Label</a></li>

											<?php } ?>

											<?php if (in_array('user_sub_privilege', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "user_sub_privilege") { ?>active<?php } ?>" href="<?= base_url(); ?>user_sub_privilege">Sub Privilege Label</a></li>

											<?php } ?>

											<?php if (in_array('assign_user_privilege', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "assign_user_privilege") { ?>active<?php } ?>" href="<?= base_url(); ?>assign_user_privilege">Manage Employee Privilege</a></li>

											<?php } ?>



											<?php if (in_array('add_employee', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_employee") { ?>active<?php } ?>" href="<?= base_url(); ?>add_employee">Add Employee</a></li>

											<?php } ?>

											<?php if (in_array('employee_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "employee_list") { ?>active<?php } ?>" href="<?= base_url(); ?>employee_list">Employee List</a></li>

											<?php } ?>

											<?php if (in_array('left_employee_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "left_employee_list") { ?>active<?php } ?>" href="<?= base_url(); ?>left_employee_list">Left Employee List</a></li>

											<?php } ?>



											<?php if (in_array('job_applications', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "job_applications") { ?>active<?php } ?>" href="<?= base_url(); ?>job_applications">Job Applications</a></li>

											<?php } ?>

											<?php if (in_array('cbd_complaint_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "cbd_complaint_list") { ?>active<?php } ?>" href="<?= base_url(); ?>cbd_complaint_list">CBD Complaint List</a></li>

											<?php } ?>



											<?php if (in_array('rti_grievance_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "rti_grievance_list") { ?>active<?php } ?>" href="<?= base_url(); ?>rti_grievance_list">RTI Grievance List</a></li>

											<?php } ?>







											<?php if (in_array('placement_record_form_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "placement_record_form_list") { ?>active<?php } ?>" href="<?= base_url(); ?>placement_record_form_list">Placement Student List</a></li>

											<?php } ?>





											<?php if (in_array('help_setup_questions', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "help_setup_questions") { ?>active<?php } ?>" href="<?= base_url(); ?>help_setup_questions">Help Setup</a></li>

											<?php } ?>

											<?php if (in_array('visitor_list', $access)) { ?>
												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "visitor_list") { ?>active<?php } ?>" href="<?= base_url(); ?>visitor_list">Visitor List</a></li>
											<?php } ?>




										</ul>

									</div>

								</li>

							<?php } ?>

							<?php if (in_array('manage_session', $access) || in_array('manage_faculty', $access) || in_array('manage_course_type', $access) || in_array('manage_course', $access) || in_array('manage_stream', $access) || in_array('course_stream_relation', $access) || in_array('list_course_stream_relation', $access) || in_array('manage_fees', $access) || in_array('manage_subject', $access) || in_array('list_subject', $access) || in_array('add_course_syllabus', $access)  || in_array('emp_syllabus_list', $access)) { ?>

								<li class="nav-item">

									<a href="#" class="nav-link">

										<i class="mdi mdi-book-multiple menu-icon "></i>

										<span class="menu-title">Courses</span>

										<i class="menu-arrow"></i>

									</a>

									<div class="submenu" id="overflow_y_scroll">

										<ul>

											<?php if (in_array('manage_session', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_session") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_session">Manage Session</a></li>

											<?php } ?>

											<?php if (in_array('manage_faculty', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_faculty") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_faculty">Manage Faculty</a></li>

											<?php } ?>

											<?php if (in_array('manage_course_type', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_course_type") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_course_type">Manage Course Type</a></li>

											<?php } ?>

											<?php if (in_array('manage_course', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_course") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_course">Manage Course</a></li>

											<?php } ?>

											<?php if (in_array('manage_stream', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_stream") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_stream">Manage Stream</a></li>

											<?php } ?>

											<?php if (in_array('course_stream_relation', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "course_stream_relation") { ?>active<?php } ?>" href="<?= base_url(); ?>course_stream_relation">Add Course Stream Relation</a></li>

											<?php } ?>

											<?php if (in_array('list_course_stream_relation', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "list_course_stream_relation") { ?>active<?php } ?>" href="<?= base_url(); ?>list_course_stream_relation">List Course Stream Relation</a></li>

											<?php } ?>

											<?php if (in_array('manage_fees', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_fees") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_fees">Add Fees</a></li>

											<?php } ?>

											<?php if (in_array('list_manage_fees', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "list_manage_fees") { ?>active<?php } ?>" href="<?= base_url(); ?>list_manage_fees">Fees List</a></li>

											<?php } ?>

											<?php if (in_array('lateral_manage_fees', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "lateral_manage_fees") { ?>active<?php } ?>" href="<?= base_url(); ?>lateral_manage_fees">lateral Entry Fees</a></li>

											<?php } ?>

											<?php if (in_array('manage_subject', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_subject") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_subject">Add Subject</a></li>

											<?php } ?>

											<?php if (in_array('list_subject', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "list_subject") { ?>active<?php } ?>" href="<?= base_url(); ?>list_subject">Subject List</a></li>

											<?php } ?>

											<?php if (in_array('add_course_syllabus', $access)) { ?>

												<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>add_course_syllabus">Add Syllabus</a></li>

											<?php } ?>



											<?php if (in_array('emp_syllabus_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link<?php if ($this->uri->segment(1) == "emp_syllabus_list") { ?>active<?php } ?>" href="<?= base_url(); ?>emp_syllabus_list">Syllabus List</a></li>

											<?php } ?>

										</ul>

									</div>

								</li>

							<?php } ?>

							<?php if (in_array('center_document_status_list', $access) || in_array('center_wallet_payment_details', $access) || in_array('information_center_list', $access) || in_array('manage_center_enquiry', $access) || in_array('information_center_failed_list', $access) || in_array('information_center_success_list', $access) || in_array('deactive_center', $access) || in_array('hold_center', $access) || in_array('manage_center', $access) || in_array('list_manage_center', $access) || in_array('pending_center', $access) || in_array('pending_center_subject', $access) || in_array('add_center_login', $access) || in_array('add_center_private_account', $access) || in_array('add_cluster_center', $access) || in_array('cluster_center_list', $access)) { ?>

								<li class="nav-item">

									<a href="#" class="nav-link">

										<i class="mdi mdi-webcam menu-icon "></i>

										<span class="menu-title">Center</span>

										<i class="menu-arrow"></i>

									</a>

									<div class="submenu">

										<ul>

											<?php if (in_array('manage_center_enquiry', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_center_enquiry") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_center_enquiry">Center Enquiry</a></li>

											<?php } ?>

											<?php if (in_array('manage_center', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_center") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_center">Add New Center</a></li>

											<?php } ?>

											<?php if (in_array('list_manage_center', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "list_manage_center") { ?>active<?php } ?>" href="<?= base_url(); ?>list_manage_center">Active Center's List</a></li>

											<?php } ?>

											<?php if (in_array('pending_center', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "pending_center") { ?>active<?php } ?>" href="<?= base_url(); ?>pending_center">Pending Center's List</a></li>

											<?php } ?>

											<?php /*if (in_array('deactive_center', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if($this->uri->segment(1)=="deactive_center"){?>active<?php }?>" href="<?= base_url(); ?>deactive_center">Deactive Center's List</a></li>

										<?php }*/ ?>

											<?php

											// if (in_array('hold_center', $access)) {

											?>

											<!-- <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "hold_center") { ?>active<?php } ?>" href="<?= base_url(); ?>hold_center">Hold Center's List</a></li> -->

											<?php

											//  } 

											?>

											<?php if (in_array('pending_center_subject', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "pending_center_subject") { ?>active<?php } ?>" href="<?= base_url(); ?>pending_center_subject">Pending Center's Subject</a></li>

											<?php } ?>

											<?php if (in_array('manage_center_course', $access)) { ?>

												<!--<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_center_course") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_center_course">Manage Center Course Sharing</a></li>-->

											<?php } ?>

											<?php if (in_array('copy_center_fees', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "copy_center_fees") { ?>active<?php } ?>" href="<?= base_url(); ?>copy_center_fees">Copy Center Fee </a></li>

											<?php } ?>

											<?php

											// if (in_array('add_center_login', $access)) { 

											?>

											<!-- <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_center_login") { ?>active<?php } ?>" href="<?= base_url(); ?>add_center_login">Add Account Center Login</a></li> -->

											<?php

											// } 

											?>

											<?php

											// if (in_array('add_center_private_account', $access)) { 

											?>

											<!-- <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_center_private_account") { ?>active<?php } ?>" href="<?= base_url(); ?>add_center_private_account">Center Account Ledger</a></li> -->

											<?php

											// } 

											?>

											<?php

											if (in_array('add_cluster_center', $access)) {

											?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_cluster_center") { ?>active<?php } ?>" href="<?= base_url(); ?>add_cluster_center">Add Cluster Center</a></li>

											<?php

											}

											?>

											<?php

											if (in_array('cluster_center_list', $access)) {

											?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "cluster_center_list") { ?>active<?php } ?>" href="<?= base_url(); ?>cluster_center_list">Cluster Center List</a></li>

											<?php

											}

											?>

											<?php

											if (in_array('center_wallet_payment_details', $access)) {

											?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "center_wallet_payment_details") { ?>active<?php } ?>" href="<?= base_url(); ?>center_wallet_payment_details">Center Wallet Payments</a></li>

											<?php

											}

											?>



											<?php

											//  if (in_array('information_center_success_list', $access)) {

											?>

											<!-- <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "information_center_success_list") { ?>active<?php } ?>" href="<?= base_url(); ?>information_center_success_list">Information Center Success Payment</a></li> -->

											<?php

											// } 

											?>

											<?php

											// if (in_array('information_center_failed_list', $access)) { 

											?>

											<!-- <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "information_center_failed_list") { ?>active<?php } ?>" href="<?= base_url(); ?>information_center_failed_list">Information Center Failed Payment</a></li> -->

											<?php

											//  } 

											?>

											<?php

											// if (in_array('information_center_list', $access)) { 

											?>

											<!-- <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "information_center_list") { ?>active<?php } ?>" href="<?= base_url(); ?>information_center_list">Information Center List</a></li> -->

											<?php

											// } 

											?>
											
											<?php if(in_array('center_document_status_list',$access)){?>
    										    <li class="nav-item"><a class="nav-link" href="<?=base_url();?>center_document_status_list">Center Document Status List</a></li>
    										<?php }?>	

										</ul>

									</div>

								</li>

							<?php } ?>

							<?php if(in_array('information_center_list',$access) || in_array('information_center_failed_list',$access) || in_array('information_center_success_list',$access) || in_array('deactive_center',$access) || in_array('hold_center',$access) || in_array('manage_center',$access) || in_array('list_manage_center',$access) || in_array('pending_center',$access) || in_array('pending_center_subject',$access) || in_array('add_center_login',$access) || in_array('add_center_private_account',$access) || in_array('add_cluster_center',$access) || in_array('cluster_center_list',$access) || in_array('add_cluster_center',$access) || in_array('cluster_center_list',$access)){?>

							<li class="nav-item">

								<a href="#" class="nav-link">

									<i class="mdi mdi-webcam menu-icon "></i>

									<span class="menu-title">Pulp Center</span>

									<i class="menu-arrow"></i>

								</a>

								<div class="submenu">

									<ul>  

										<?php if(in_array('list_manage_center',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>list_manage_center?type=1">Pulp Active Center List</a></li>

										<?php }?>

										<?php if(in_array('pending_center',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>pending_center?type=1">Pulp New Centers</a></li>

										<?php }?>

										<?php if(in_array('deactive_center',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>deactive_center?type=1">Pulp Deactive Centers</a></li>

										<?php }?>

										<?php if(in_array('hold_center',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>hold_center?type=1">Pulp Hold Centers</a></li>

										<?php }?>

										<?php if(in_array('add_cluster_center',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>add_cluster_center?page=pulp">Add Cluster Center</a></li>

										<?php }?>	

										<?php if(in_array('cluster_center_list',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>cluster_center_list?page=pulp">Cluster Center List</a></li>

										<?php }?>

									</ul>

								</div>

							</li>

						 <?php }?>




							<?php if (in_array('manage_center_enquiry', $access) || in_array('information_center_failed_list', $access) || in_array('information_center_success_list', $access) || in_array('manage_center', $access) || in_array('list_manage_center', $access) || in_array('pending_center', $access) || in_array('pending_center_subject', $access)) { ?>

								<li class="nav-item">

									<a href="#" class="nav-link">

										<i class="mdi mdi-webcam menu-icon "></i>

										<span class="menu-title">B.VOC Center</span>

										<i class="menu-arrow"></i>

									</a>

									<div class="submenu">

										<ul>

											<?php if (in_array('list_manage_center', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "list_manage_center") { ?>active<?php } ?>" href="<?= base_url(); ?>list_manage_center?type=2">B.VOC Active Center's List</a></li>

											<?php } ?>

											<?php if (in_array('pending_center', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "pending_center") { ?>active<?php } ?>" href="<?= base_url(); ?>pending_center?type=2">B.VOC Pending Center's List</a></li>

											<?php } ?>

										</ul>

									</div>

								</li>

							<?php } ?>









							<?php if (in_array('passout_student_list', $access) || in_array('pan_india_admission_list', $access) || in_array('pan_india_admission_list', $access) || in_array('replied_student_feedback_list', $access) || in_array('student_feedback_list', $access) || in_array('search_student', $access) || in_array('pending_reregistration_student_list', $access) ||   in_array('new_pending_student', $access) || in_array('admission_list', $access) || in_array('amount-filter', $access) || in_array('re-registered-student-success', $access) || in_array('re-registered-student-fail', $access) || in_array('cancel_admission_list', $access) ||  in_array('pulp_admission_list', $access)  || in_array('refunded_student_list', $access) || in_array('hold_admission_list', $access) || in_array('new_admission', $access)  || in_array('passout_student_list', $access)) { ?>

								<li class="nav-item">

									<a href="#" class="nav-link">

										<i class="mdi mdi-account-multiple menu-icon "></i>

										<span class="menu-title">Students</span>

										<i class="menu-arrow"></i>

									</a>

									<div class="submenu" id="overflow_y_scroll">

										<ul>

											<?php if (in_array('search_student', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "search_student") { ?>active<?php } ?>" href="<?= base_url(); ?>search_student">Student Details</a></li>

											<?php } ?>



											<?php

											// if (in_array('amount-filter', $access)) { 

											?>

											<!-- <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "amount-filter") { ?>active<?php } ?>" href="<?= base_url(); ?>amount-filter">Filter Amount</a></li> -->

											<?php

											// } 

											?>

											<?php if (in_array('new_pending_student', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "new_pending_student") { ?>active<?php } ?>" href="<?= base_url(); ?>new_pending_student">Failed Admission Student List</a></li>

											<?php } ?>

											<?php if (in_array('new_admission', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "new_admission") { ?>active<?php } ?>" href="<?= base_url(); ?>new_admission">Success Admission (Documents & Approvals) List</a></li>

											<?php } ?>

											<?php if (in_array('today_admission', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "today_admission") { ?>active<?php } ?>" href="<?= base_url(); ?>today_admission">Today's Success Admission List</a></li>

											<?php } ?>

											<?php if (in_array('admission_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admission_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admission_list">All Admissions List</a></li>

											<?php } ?>

											<?php if (in_array('cancel_admission_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "cancel_admission_list") { ?>active<?php } ?>" href="<?= base_url(); ?>cancel_admission_list">Cancel Admission List</a></li>

											<?php } ?>

											<?php if (in_array('hold_admission_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "hold_admission_list") { ?>active<?php } ?>" href="<?= base_url(); ?>hold_admission_list">Hold Admission List</a></li>

											<?php } ?>
											<?php if (in_array('pan_india_new_pending_student', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "pan_india_new_pending_student") { ?>active<?php } ?>" href="<?= base_url(); ?>pan_india_new_pending_student">Pan India Failed Admission Student List</a></li>

											<?php } ?>

											<?php if (in_array('pan_india_admission_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "pan_india_admission_list") { ?>active<?php } ?>" href="<?= base_url(); ?>pan_india_admission_list">Pan India All Admission List</a></li>

											<?php } ?>

                                            
                                            <?php if (in_array('pending_reregistration_student_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "pending_reregistration_student_list") { ?>active<?php } ?>" href="<?= base_url(); ?>pending_reregistration_student_list">Pending RR Student list</a></li>

											<?php } ?>



											<?php if (in_array('re-registered-student-fail', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "re-registered-student-fail") { ?>active<?php } ?>" href="<?= base_url(); ?>re-registered-student-fail">Failed RR Student List</a></li>

											<?php } ?>



											<?php if (in_array('re-registered-student-success', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "re-registered-student-success") { ?>active<?php } ?>" href="<?= base_url(); ?>re-registered-student-success">Success RR Student List</a></li>

											<?php } ?>




											<option disabled> --------------------------------------------------------- </option>

											<option disabled> * B.VOC Students *</option>

											<?php if (in_array('bvoc_new_pending_student', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "bvoc_new_pending_student") { ?>active<?php } ?>" href="<?= base_url(); ?>new_pending_student?type=2">B.VOC Failed Admission Student List</a></li>

											<?php } ?>

											<?php if (in_array('bvoc_new_admission', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "bvoc_new_admission") { ?>active<?php } ?>" href="<?= base_url(); ?>new_admission?type=2">B.VOC Success Admission (Documents & Approvals) List</a></li>

											<?php } ?>

											<?php if (in_array('bvoc_today_admission', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "bvoc_today_admission") { ?>active<?php } ?>" href="<?= base_url(); ?>today_admission?type=2">B.VOC Today's Success Admission List</a></li>

											<?php } ?>

											<?php if (in_array('bvoc_admission_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "bvoc_admission_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admission_list?type=2">B.VOC All Admissions List</a></li>

											<?php } ?>

											<?php if (in_array('bvoc_cancel_admission_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "bvoc_cancel_admission_list") { ?>active<?php } ?>" href="<?= base_url(); ?>cancel_admission_list?type=2">B.VOC Cancel Admission List</a></li>

											<?php } ?>

											<?php if (in_array('bvoc_hold_admission_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "bvoc_hold_admission_list") { ?>active<?php } ?>" href="<?= base_url(); ?>hold_admission_list?type=2">B.VOC Hold Admission List</a></li>

											<?php } ?>



											<option disabled> --------------------------------------------------------- </option>





											<?php if (in_array('refunded_student_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "refunded_student_list") { ?>active<?php } ?>" href="<?= base_url(); ?>refunded_student_list">Refunded Student List</a></li>

											<?php } ?>



											<option disabled> --------------------------------------------------------- </option>

										<option disabled> * Pulp Students *</option>										

										<?php if(in_array('pulp_new_pending_student',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>new_pending_student?type=1">Pulp New Pending Admission</a></li>

										<?php }?>

										<?php if(in_array('pulp_new_admission',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>new_admission?type=1">Pulp Pending for Documents & Approvals</a></li>

										<?php }?>

										<?php if(in_array('pulp_today_admission',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>today_admission?type=1">Pulp Today Admissions</a></li>

										<?php }?>

										<?php if(in_array('pulp_admission_list',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>admission_list?type=1">Pulp All Admissions</a></li>

										<?php }?>

										<?php if(in_array('pulp_cancel_admission_list',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>cancel_admission_list?type=1">Pulp All Cancel Admissions</a></li>

										<?php }?>

										<?php if(in_array('pulp_hold_admission_list',$access)){?>

										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>hold_admission_list?type=1">Pulp All Hold Admissions</a></li>

										<?php }?>

											<?php if (in_array('admin_fill_exam_form', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_fill_exam_form") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_fill_exam_form">Fill Exam Form</a></li>

											<?php } ?>

											<?php if (in_array('admin_set_reregistration_form', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_set_reregistration_form") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_set_reregistration_form">Fill RR Form</a></li>

											<?php } ?>



											<?php if (in_array('pulp_pending_reregistration_student_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "pulp_pending_reregistration_student_list") { ?>active<?php } ?>" href="<?= base_url(); ?>pulp_pending_reregistration_student_list?type=1">Pulp Pending RR Student list</a></li>

											<?php } ?>



											<?php if (in_array('pulp-re-registered-student-fail', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "pulp-re-registered-student-fail") { ?>active<?php } ?>" href="<?= base_url(); ?>pulp-re-registered-student-fail?type=1">Pulp Failed RR Student List</a></li>

											<?php } ?>



											<?php if (in_array('pulp-re-registered-student-success', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "pulp-re-registered-student-success") { ?>active<?php } ?>" href="<?= base_url(); ?>pulp-re-registered-student-success?type=1">Pulp Success RR Student List</a></li>

											<?php } ?>



											<?php if (in_array('student_feedback_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_feedback_list") { ?>active<?php } ?>" href="<?= base_url(); ?>student_feedback_list">Student Feedback</a></li>

											<?php } ?>

											<?php if (in_array('replied_student_feedback_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>replied_student_feedback_list">Completed Feedback of Student</a></li>

											<?php } ?>



											<?php if (in_array('passout_student_list', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "passout_student_list") { ?>active<?php } ?>" href="<?= base_url(); ?>passout_student_list">Passout Student List</a></li>

											<?php } ?>

										</ul>

									</div>

								</li>

							<?php } ?>



							<?php if (in_array('search_global_student', $access) || in_array('search_student_payment', $access)) { ?>

								<li class="nav-item">

									<a href="#" class="nav-link">

										<i class="mdi mdi-account-plus menu-icon "></i>

										<span class="menu-title">Search Student</span>

										<i class="menu-arrow"></i>

									</a>

									<div class="submenu">

										<ul class="submenu-item">

											<?php if (in_array('search_global_student', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "search_global_student") { ?>active<?php } ?>" href="<?= base_url(); ?>search_global_student">Search Student</a></li>

											<?php } ?>

											<?php if (in_array('search_global_blended_student', $access)) { ?>

												<!--<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "search_global_blended_student") { ?>active<?php } ?>" href="<?= base_url(); ?>search_global_blended_student">Search Blended Student</a></li>-->

											<?php } ?>

											<?php if (in_array('search_student_payment', $access)) { ?>

												<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>search_student_payment">Search Student Payment</a></li>

											<?php } ?>

										</ul>

									</div>

								</li>

							<?php } ?>



							<?php if (in_array('student_certificate_history', $access) || in_array('second_print_reccom_letter', $access) || in_array('second_student_approved_reccom_letter', $access) || in_array('second_disapprove_reccom_application', $access) || in_array('second_approve_reccom_application', $access) || in_array('second_update_payment_reccom', $access) || in_array('second_student_apply_reccom_letter', $access) || in_array('second_student_req_reccom_letter', $access) || in_array('approved_student_recommendation_letters', $access) || in_array('student_migration_certificate_add_requests', $access) || in_array('student_reccomendation_letter_requests', $access) || in_array('student_migration_certificate_requests', $access) || in_array('student_migration_certificates', $access) || in_array('student_transfer_certificate_requests', $access) || in_array('approved_student_transfer_certificate', $access) || in_array('student_degree_requests', $access) || in_array('student_degree_failed_payment', $access) || in_array('approved_student_degrees', $access) || in_array('student_provisional_degree_requests', $access) || in_array('apply_student_provisional_degrees', $access) || in_array('approved_student_provisional_degrees', $access)) { ?>

								<li class="nav-item">

									<a href="#" class="nav-link">

										<i class="mdi mdi-receipt menu-icon "></i>

										<span class="menu-title">Student Certificates</span>

										<i class="menu-arrow"></i>

									</a>

									<div class="submenu" id="overflow_y_scroll">

										<ul>
											<?php if (in_array('consolidated_student_certificate_requests', $access)) { ?>

												<option disabled>----------------------------- All Certificate Requests --------------------------</option>

												<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>consolidated_student_certificate_requests?payment_status=1">Payment Success Certificate Requests</a></li>

												<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>consolidated_student_certificate_requests?payment_status=0">Payment Failed Certificate Requests</a></li>

											<?php } ?>
											<option disabled>----------------------------------Student Certificate History----------------------------------</option>

											<?php if (in_array('student_certificate_history', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_certificate_history") { ?>active<?php } ?>" href="<?= base_url(); ?>student_certificate_history">Student Certificate History</a></li>

											<?php } ?>

											<option disabled>----------------------------------Migration Certificate----------------------------------</option>

											<?php if (in_array('student_migration_certificate_add_requests', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_migration_certificate_add_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>student_migration_certificate_add_requests">Apply Migration Certificate</a></li>

											<?php } ?>

											<?php if (in_array('student_migration_certificate_requests', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_migration_certificate_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>student_migration_certificate_requests">Migration Certificate Request</a></li>

											<?php } ?>



											<?php if (in_array('student_migration_certificates', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_migration_certificates") { ?>active<?php } ?>" href="<?= base_url(); ?>student_migration_certificates">Approved Migration Certificate</a></li>

											<?php } ?>



											<option disabled>----------------------------------B.VOC Migration Certificate----------------------------------</option>



											<?php if (in_array('bvoc_student_migration_certificate_requests', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_migration_certificate_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>student_migration_certificate_requests?type=2">B.VOC Migration Certificate Request</a></li>

											<?php } ?>

											<?php if (in_array('bvoc_student_migration_certificates', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_migration_certificates") { ?>active<?php } ?>" href="<?= base_url(); ?>student_migration_certificates?type=2">B.VOC Approved Migration Certificate</a></li>

											<?php } ?>





											<option disabled>-----------------------------------Transfer Certificate----------------------------------</option>

											<?php if (in_array('add_student_transfer_requests', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_student_transfer_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>add_student_transfer_requests">Apply Transfer Certificate</a></li>

											<?php } ?>





											<?php if (in_array('student_transfer_certificate_requests', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_transfer_certificate_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>student_transfer_certificate_requests">Transfer Certificate Request</a></li>

											<?php } ?>



											<?php if (in_array('approved_student_transfer_certificate', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approved_student_transfer_certificate") { ?>active<?php } ?>" href="<?= base_url(); ?>approved_student_transfer_certificate">Approved Transfer Certificate</a></li>

											<?php } ?>



											<option disabled>-----------------------------------B.VOC Transfer Certificate----------------------------------</option>



											<?php if (in_array('bvoc_student_transfer_certificate_requests', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_transfer_certificate_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>student_transfer_certificate_requests?type=2">B.VOC Transfer Certificate Request</a></li>

											<?php } ?>



											<?php if (in_array('bvoc_approved_student_transfer_certificate', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approved_student_transfer_certificate") { ?>active<?php } ?>" href="<?= base_url(); ?>approved_student_transfer_certificate?type=2">B.VOC Approved Transfer Certificate</a></li>

											<?php } ?>



											<!-- <option disabled>---------------------------- Student Recommendation Letter-------------------------------------</option> -->



											<!-- <?php if (in_array('student_reccomendation_letter_requests', $access)) { ?>

										<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>student_reccomendation_letter_requests">Student Reccomendation Letter Requests</a></li>

										<?php } ?>



										<?php if (in_array('approved_student_recommendation_letters', $access)) { ?>

										<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>approved_student_recommendation_letters">Approved Student Recommendation Letters</a></li>

										<?php } ?> -->

											<option disabled>------------------------------------- Degree Certificate -------------------------------------</option>



											<?php if (in_array('add_student_degree_requests', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_student_degree_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>add_student_degree_requests">Apply Degree Certificate</a></li>

											<?php } ?>



											<?php if (in_array('student_degree_failed_payment', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_degree_failed_payment") { ?>active<?php } ?>" href="<?= base_url(); ?>student_degree_failed_payment">Degree Certificate Request</a></li>

											<?php } ?>



											<!-- <?php if (in_array('student_degree_requests', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_degree_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>student_degree_requests">Student Degree Requests</a></li>

										<?php } ?> -->



											<?php if (in_array('approved_student_degrees', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approved_student_degrees") { ?>active<?php } ?>" href="<?= base_url(); ?>approved_student_degrees">Approved Degree Certificate</a></li>

											<?php } ?>



											<option disabled>-----------------------------------B.VOC Degree Certificate----------------------------------</option>



											<?php if (in_array('bvoc_student_degree_failed_payment', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_degree_failed_payment") { ?>active<?php } ?>" href="<?= base_url(); ?>student_degree_failed_payment?type=2">B.VOC Degree Certificate Request</a></li>

											<?php } ?>



											<?php if (in_array('bvoc_approved_student_degrees', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approved_student_degrees") { ?>active<?php } ?>" href="<?= base_url(); ?>approved_student_degrees?type=2">B.VOC Approved Degree Certificate</a></li>

											<?php } ?>



											<option disabled>-------------------------------- Provisional Degree Certificate -------------------------------------</option>

											<?php if (in_array('apply_student_provisional_degrees', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "apply_student_provisional_degrees") { ?>active<?php } ?>" href="<?= base_url(); ?>apply_student_provisional_degrees">Apply Provisional Degree Certificate</a></li>

											<?php } ?>



											<?php if (in_array('student_provisional_degree_requests', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_provisional_degree_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>student_provisional_degree_requests">Provisional Degree Certificate Request</a></li>

											<?php } ?>



											<?php if (in_array('student_approved_provisional_degrees', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_approved_provisional_degrees") { ?>active<?php } ?>" href="<?= base_url(); ?>student_approved_provisional_degrees">Approved Provisional Degrees Certificate</a></li>

											<?php } ?>

											<option disabled>----------------------------Bonafide Certificate------------------------------------</option>

											<?php if (in_array('student_apply_bonafide_cer', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_apply_bonafide_cer") { ?>active<?php } ?>" href="<?= base_url(); ?>student_apply_bonafide_cer">Apply Bonafide Certificate</a></li>

											<?php } ?>

											<?php if (in_array('student_req_bonafide_cer', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_req_bonafide_cer") { ?>active<?php } ?>" href="<?= base_url(); ?>student_req_bonafide_cer">Bonafide Certificate Request</a></li>

											<?php } ?>

											<?php if (in_array('student_approved_bonafide_cer', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_approved_bonafide_cer") { ?>active<?php } ?>" href="<?= base_url(); ?>student_approved_bonafide_cer">Approved Bonafide Certificate</a></li>

											<?php } ?>

											<option disabled>----------------------------Scholarship Bonafide Certificate------------------------------------</option>

											<?php if (in_array('student_apply_bonafide_scholarship_cer', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_apply_bonafide_scholarship_cer") { ?>active<?php } ?>" href="<?= base_url(); ?>student_apply_bonafide_scholarship_cer">Apply Bonafide Certificate</a></li>

											<?php } ?>

											<?php if (in_array('student_req_bonafide_scholarship_cer', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_req_bonafide_scholarship_cer") { ?>active<?php } ?>" href="<?= base_url(); ?>student_req_bonafide_scholarship_cer">Bonafide Certificate Request</a></li>

											<?php } ?>

											<?php if (in_array('student_approved_bonafide_scholarship_cer', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_approved_bonafide_scholarship_cer") { ?>active<?php } ?>" href="<?= base_url(); ?>student_approved_bonafide_scholarship_cer">Approved Bonafide Certificate</a></li>

											<?php } ?>

											<option disabled>----------------------------Medium Of Instruction-----------------------------------</option>

											<?php if (in_array('student_apply_inst_medium_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_apply_inst_medium_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_apply_inst_medium_letter">Apply Medium of Instruction Letter</a></li>

											<?php } ?>

											<?php if (in_array('student_req_inst_medium_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_req_inst_medium_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_req_inst_medium_letter">Medium of Instruction Letter Request</a></li>

											<?php } ?>

											<?php if (in_array('student_approved_inst_medium_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_approved_inst_medium_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_approved_inst_medium_letter">Approved Medium of Instruction Letter</a></li>

											<?php } ?>

											<option disabled>----------------------------No Backlog Summary--------------------------------------</option>

											<?php if (in_array('student_apply_no_backlog_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_apply_no_backlog_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_apply_no_backlog_letter">Apply No Backlog Summary Letter</a></li>

											<?php } ?>

											<?php if (in_array('student_req_no_backlog_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_req_no_backlog_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_req_no_backlog_letter">No Backlog Summary Letter Request</a></li>

											<?php } ?>

											<?php if (in_array('student_approved_no_backlog_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_approved_no_backlog_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_approved_no_backlog_letter">Approved No Backlog Summary Letter</a></li>

											<?php } ?>

											<option disabled>----------------------------No Split Issue Letter-----------------------------------</option>

											<?php if (in_array('student_apply_no_split_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_apply_no_split_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_apply_no_split_letter">Apply No Split Issue Letter</a></li>

											<?php } ?>

											<?php if (in_array('student_req_no_split_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_req_no_split_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_req_no_split_letter">No Split Issue Letter Request</a></li>

											<?php } ?>

											<?php if (in_array('student_approved_no_split_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_approved_no_split_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_approved_no_split_letter">Approved No Split Issue Letter</a></li>

											<?php } ?>

											<option disabled>----------------------------Recommendation Letter-----------------------------------</option>

											<?php if (in_array('student_apply_reccom_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_apply_reccom_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_apply_reccom_letter">Apply Recommendation Letter</a></li>

											<?php } ?>

											<?php if (in_array('student_req_reccom_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_req_reccom_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_req_reccom_letter">Recommendation Letter Request</a></li>

											<?php } ?>

											<?php if (in_array('student_approved_reccom_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_approved_reccom_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>student_approved_reccom_letter">Approved Recommendation Letter</a></li>

											<?php } ?>



											<option disabled>----------------------------II Recommendation Letter--------------------------------</option>

											<?php if (in_array('second_student_apply_reccom_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "second_student_apply_reccom_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>second_student_apply_reccom_letter">Apply II Recommendation Letter</a></li>

											<?php } ?>

											<?php if (in_array('second_student_req_reccom_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "second_student_req_reccom_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>second_student_req_reccom_letter">II Recommendation Letter Request</a></li>

											<?php } ?>

											<?php if (in_array('second_student_approved_reccom_letter', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "second_student_approved_reccom_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>second_student_approved_reccom_letter">Approved II Recommendation Letter</a></li>

											<?php } ?>



											<option disabled>----------------------------Character Certificate ----------------------------------</option>



											<?php if (in_array('add_student_character_requests', $access)) { ?>

												<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_student_character_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>add_student_character_requests">Apply Character Certificate</a></li>

											<?php } ?>



											<?php if (in_array('student_character_certificate_requests', $access)) { ?>

												<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>student_character_certificate_requests">Character Certificate Request</a></li>

											<?php } ?>

											<?php if (in_array('student_character_certificate_approved', $access)) { ?>

												<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>student_character_certificate_approved">Approved Character Certificate</a></li>

											<?php } ?>



										</ul>

									</div>

								</li>

							<?php } ?> 

							<?php if (in_array('admin-upload-answer-book',$access) || in_array('success_re_evaluation_list',$access) || in_array('failed_re_evaluation_list',$access) || in_array('complete_re_evaluation_list',$access) || in_array('generated_results_excel_pre', $access) || in_array('generated_results_excel', $access) || in_array('examination_list', $access) || in_array('today_assignment_list', $access) || in_array('all_assignment_list', $access) || in_array('mcq_report', $access) || in_array('theoretical_question_data', $access) || in_array('mcq_question_data', $access) || in_array('add_examination', $access) || in_array('examination_form_list', $access) || in_array('examination_form_list_failed', $access) || in_array('appeared_examination_list', $access) || in_array('manage_admin_result', $access) || in_array('search_admin_result', $access) || in_array('search_admin_result_subject_count', $access) || in_array('search_marksheet', $access) || in_array('bulk_activate_marksheet', $access) || in_array('duplicate_marksheet', $access) || in_array('generated_results', $access) || in_array('admin_answer_book', $access)  || in_array('create_time_table', $access) || in_array('time_sheet_list', $access)) { ?>



								<li class="nav-item">

									<a href="#" class="nav-link">

										<i class="fa fa-pencil-square-o menu-icon" aria-hidden="true"></i>



										<!-- <i class="mdi fa fa-pencil-square-o menu-icon "></i> -->

										<span class="menu-title">Examination</span>

										<i class="menu-arrow"></i>

									</a>



									<div class="submenu">

										<ul class="submenu-item">



											<!-- <?php if (in_array('today_assignment_list', $access) || in_array('all_assignment_list', $access) || in_array('mcq_report', $access) || in_array('theoretical_question_data', $access) || in_array('mcq_question_data', $access)) { ?>

											<li class="nav-item dropdown">

												<a class="nav-link dropdown-toggle " href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

													Assignment

												</a>

												<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

													<?php if (in_array('today_assignment_list', $access)) { ?>

														<a class="dropdown-item <?php if ($this->uri->segment(1) == "today_assignment_list") { ?>active<?php } ?>" href="<?= base_url(); ?>today_assignment_list">Today Assignment List</a>

													<?php } ?>

													<?php if (in_array('all_assignment_list', $access)) { ?>

														<a class="dropdown-item <?php if ($this->uri->segment(1) == "all_assignment_list") { ?>active<?php } ?>" href="<?= base_url(); ?>all_assignment_list">All Assignment List</a>

													<?php } ?>



												</div>

											</li>

										<?php } ?> -->



											<?php if (in_array('student_examination_history', $access) ||  in_array('add_examination', $access) || in_array('examination_list', $access) || in_array('examination_form_list', $access) || in_array('examination_form_list_failed', $access) || in_array('appeared_examination_list', $access) || in_array('re_appear_examination_form_list', $access) || in_array('re_appear_examination_form_list_failed', $access) || in_array('create_time_table', $access) || in_array('time_sheet_list', $access)) { ?>

												<li class="nav-item dropdown">

													<?php if (in_array('student_examination_history', $access)) { ?>

												<!--<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_examination_history") { ?>active<?php } ?>" href="<?= base_url(); ?>student_examination_history">Student Examination History</a></li>-->

											<?php } ?>



											<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

												Examination

											</a>

											<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

												<?php /*if (in_array('mcq_report', $access)) { ?>

														<a class="dropdown-item<?php if($this->uri->segment(1)=="mcq_report"){?>active<?php }?>" href="<?= base_url(); ?>mcq_report">MCQ Report</a>

													<?php } ?>

													<?php if (in_array('theoretical_question_data', $access)) { ?>

														<a class="dropdown-item<?php if($this->uri->segment(1)=="theoretical_question_data"){?>active<?php }?>" href="<?= base_url(); ?>theoretical_question_data">Theoretical Question Data</a>

													<?php } ?>

													<?php if (in_array('mcq_question_data', $access)) { ?>

														<a class="dropdown-item<?php if($this->uri->segment(1)=="mcq_question_data"){?>active<?php }?>" href="<?= base_url(); ?>mcq_question_data">MCQ Question Data</a>

													<?php } ?>

													<?php if (in_array('add_examination', $access)) { ?>

														<a class="dropdown-item<?php if($this->uri->segment(1)=="add_examination"){?>active<?php }?>" href="<?= base_url(); ?>add_examination">Add Exam</a>

													<?php } ?>

													<?php if (in_array('examination_list', $access)) { ?>

														<a class="dropdown-item<?php if($this->uri->segment(1)=="examination_list"){?>active<?php }?>" href="<?= base_url(); ?>examination_list">Exam List</a>

													<?php }*/ ?>



												<?php if (in_array('examination_form_list_failed', $access)) { ?>

													<a class="dropdown-item<?php if ($this->uri->segment(1) == "examination_form_list_failed") { ?>active<?php } ?>" href="<?= base_url(); ?>examination_form_list_failed">Failed Examination List </a>

												<?php } ?>

												<?php if (in_array('examination_form_list', $access)) { ?>

													<a class="dropdown-item<?php if ($this->uri->segment(1) == "examination_form_list") { ?>active<?php } ?>" href="<?= base_url(); ?>examination_form_list">Success Examination List </a>

												<?php } ?>

												<?php if (in_array('re_appear_examination_form_list_failed', $access)) { ?>

													<a class="dropdown-item<?php if ($this->uri->segment(1) == "re_appear_examination_form_list_failed") { ?>active<?php } ?>" href="<?= base_url(); ?>re_appear_examination_form_list_failed">Failed Re Appear List</a>

												<?php } ?>

												<?php if (in_array('re_appear_examination_form_list', $access)) { ?>

													<a class="dropdown-item<?php if ($this->uri->segment(1) == "re_appear_examination_form_list") { ?>active<?php } ?>" href="<?= base_url(); ?>re_appear_examination_form_list">Success Re Appear List</a>

												<?php } ?>



												<?php

												// if (in_array('appeared_examination_list', $access)) { 

												?>

												<!-- <a class="dropdown-item<?php if ($this->uri->segment(1) == "appeared_examination_list") { ?>active<?php } ?>" href="<?= base_url(); ?>appeared_examination_list">Appeared Exam List</a> -->

												<?php

												// } 

												?>

												<?php if (in_array('create_time_table', $access)) { ?>

													<a class="dropdown-item<?php if ($this->uri->segment(1) == "create_time_table") { ?>active<?php } ?>" href="<?= base_url(); ?>create_time_table">Time Table</a>

												<?php } ?>
												
											</div>

								</li>

							<?php } ?>

							 
							<?php if(in_array('success_re_evaluation_list',$access) || in_array('failed_re_evaluation_list',$access) || in_array('complete_re_evaluation_list',$access)) {?>
								<li class="nav-item dropdown"> 
									<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Re-evaluation Form
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										<?php if (in_array('success_re_evaluation_list', $access)) { ?>
											<a class="dropdown-item<?php if ($this->uri->segment(1) == "success_re_evaluation_list") { ?>active<?php } ?>" href="<?= base_url(); ?>success_re_evaluation_list">Success Re-evaluation List</a>
										<?php } ?> 
										<?php if (in_array('failed_re_evaluation_list', $access)) { ?>
											<a class="dropdown-item<?php if ($this->uri->segment(1) == "failed_re_evaluation_list") { ?>active<?php } ?>" href="<?= base_url(); ?>failed_re_evaluation_list">Failed Re-evaluation List</a>
										<?php } ?> 
										<?php if (in_array('complete_re_evaluation_list',$access)) { ?> 
											<a class="dropdown-item<?php if ($this->uri->segment(1) == "complete_re_evaluation_list") { ?>active<?php } ?>" href="<?= base_url(); ?>complete_re_evaluation_list">Complete Re-evaluation List</a>
										<?php } ?> 
									</div> 
								</li> 
							<?php } ?> 
							<?php if (in_array('search_admin_result_subject_count', $access) || in_array('manage_admin_result', $access) || in_array('search_admin_result', $access) || in_array('generated_results', $access) || in_array('admin_answer_book', $access) || in_array('bulk_activate_marksheet', $access)) { ?>
								<li class="nav-item dropdown">

									<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

										Results

									</a>

									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

										<?php if (in_array('manage_admin_result', $access)) { ?>

											<a class="dropdown-item<?php if ($this->uri->segment(1) == "manage_admin_result") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_admin_result">Manage Result</a>

										<?php } ?>

										<?php if (in_array('search_admin_result', $access)) { ?>

											<a class="dropdown-item<?php if ($this->uri->segment(1) == "search_admin_result") { ?>active<?php } ?>" href="<?= base_url(); ?>search_admin_result">Search Result</a>

										<?php } ?>

										<?php if (in_array('bulk_activate_marksheet', $access)) { ?>

											<a class="dropdown-item <?php if ($this->uri->segment(1) == "bulk_activate_marksheet") { ?>active<?php } ?>" href="<?= base_url(); ?>bulk_activate_marksheet">Bulk Activate Marksheet</a>

										<?php } ?>

										<?php

										// if (in_array('search_admin_result_subject_count', $access)) { 

										?>

										<!-- <a class="dropdown-item<?php if ($this->uri->segment(1) == "search_admin_result_subject_count") { ?>active<?php } ?>" href="<?= base_url(); ?>search_admin_result_subject_count">Search Result Subject Count</a> -->

										<?php

										//  } 

										?>

										<?php /*if (in_array('generated_results', $access)) { ?>

														<a class="dropdown-item<?php if($this->uri->segment(1)=="generated_results"){?>active<?php }?>" href="<?= base_url(); ?>generated_results">Generated Results</a>

													<?php } */ ?>

										<?php if (in_array('admin_answer_book', $access)) { ?>

											<a class="dropdown-item<?php if ($this->uri->segment(1) == "admin_answer_book") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_answer_book">Center Answer Book</a>

										<?php } ?>



									</div>

								</li>

							<?php } ?>

							<?php if (in_array('admin-upload-answer-book', $access) || in_array('duplicate_marksheet', $access) || in_array('search_marksheet', $access) || in_array('generated_results_excel', $access) || in_array('generated_results_excel_pre', $access)) { ?>

								<li class="nav-item dropdown">

									<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

										Marksheet

									</a>

									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

										<?php if (in_array('search_marksheet', $access)) { ?>

											<a class="dropdown-item <?php if ($this->uri->segment(1) == "search_marksheet") { ?>active<?php } ?>" href="<?= base_url(); ?>search_marksheet">Search Marksheet</a>

										<?php } ?>

										<?php if (in_array('duplicate_marksheet', $access)) { ?>

											<a class="dropdown-item <?php if ($this->uri->segment(1) == "duplicate_marksheet") { ?>active<?php } ?>" href="<?= base_url(); ?>duplicate_marksheet">Duplicate Marksheet</a>

										<?php } ?>

										<?php

										 if (in_array('generated_results_excel', $access)) { 

										?>

										 <a class="dropdown-item <?php if ($this->uri->segment(1) == "generated_results_excel") { ?>active<?php } ?>" href="<?= base_url(); ?>generated_results_excel">Download Marksheet Excel</a> 

										<?php

										 } 

										?>
                                    


										<?php

										//  if (in_array('generated_results_excel_pre', $access)) {

										?>

										<!-- <a class="dropdown-item <?php if ($this->uri->segment(1) == "generated_results_excel_pre") { ?>active<?php } ?>" href="<?= base_url(); ?>generated_results_excel_pre">Download Pre Marksheet Excel</a> -->

										<?php

										//  }

										?>

									</div>

								</li>

							<?php } ?>
							<?php

							 if (in_array('marksheet_back_sample', $access)) { 

							?>
							    <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "marksheet_back_sample") { ?>active<?php } ?>" href="<?= base_url(); ?>marksheet_back_sample" target="_blank">Marksheet Back Side Sample</a></li>
							<?php

										 } 

										?>
						    <?php if (in_array('admin-upload-answer-book', $access)) { ?>

								<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin-upload-answer-book") { ?>active<?php } ?>" href="<?= base_url(); ?>admin-upload-answer-book">Upload Answer Book</a></li>

							<?php } ?>


						</ul>

					</div>

					</li>

				<?php } ?>

				<?php if (in_array('examination', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-book-multiple menu-icon "></i>

							<span class="menu-title">Degree</span>

							<i class="menu-arrow"></i>

						</a>

					</li>

				<?php } ?>





				<?php





				if (in_array('guide_application_list', $access) || in_array('successfull_phd_registration', $access) || in_array('failed_phd_registration', $access) || in_array('create_tests', $access) || in_array('phd_exams_student', $access) || in_array('phd_course_work_schedule', $access) || in_array('phd_course_work_data', $access) || in_array('approve_guide_application_list', $access) || in_array('phd_course_work_schedule', $access) || in_array('phd_course_work_data_success', $access) || in_array('phd_course_work_data_fail', $access) || in_array('phd_course_work_approved_list', $access) || in_array('course_work_exam', $access) || in_array('course_work_exam_appeared_list', $access) || in_array('course_work_result_list', $access) || in_array('new_thesis_list', $access) || in_array('complete_thesis_list', $access) || in_array('rejected_thesis_list', $access) || in_array('new_synopsis_list', $access) || in_array('complete_synopsis_list', $access) || in_array('progress_report_list', $access) || in_array('abstract_report_list', $access) || in_array('refunded_phd_registration', $access) || in_array('rejected_synopsis_list', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-flask-outline menu-icon "></i>

							<span class="menu-title">Research</span>

							<i class="menu-arrow"></i>

						</a>



						<div class="submenu">

							<ul class="submenu-item">



								<?php if (in_array('guide_application_list', $access) || in_array('approve_guide_application_list', $access)  || in_array('assigned_guide_to_scholar', $access)) { ?>

									<li class="nav-item dropdown">

										<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

											Guide Applications

										</a>

										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

											<?php if (in_array('guide_application_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "guide_application_list") { ?>active<?php } ?>" href="<?= base_url(); ?>guide_application_list">Guide Applications</a>

											<?php } ?>

											<?php if (in_array('approve_guide_application_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "approve_guide_application_list") { ?>active<?php } ?>" href="<?= base_url(); ?>approve_guide_application_list">Approve Guide Applications</a>

											<?php } ?>

											<?php if (in_array('assigned_guide_to_scholar', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "assigned_guide_to_scholar") { ?>active<?php } ?>" href="<?= base_url(); ?>assigned_guide_to_scholar">Assign Guide to Scholar</a>

											<?php } ?>

											<?php if (in_array('assigned_guide_seperate_student', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "assigned_guide_seperate_student") { ?>active<?php } ?>" href="<?= base_url(); ?>assigned_guide_seperate_student">Assign Guide to Blended Scholar</a>

											<?php } ?>

										</div>

									</li>

								<?php } ?>



								<?php if (in_array('successfull_phd_registration', $access) || in_array('failed_phd_registration', $access) || in_array('refunded_phd_registration', $access)) { ?>

									<li class="nav-item dropdown">

										<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

											Registration Forms

										</a>

										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

											<?php if (in_array('failed_phd_registration', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "failed_phd_registration") { ?>active<?php } ?>" href="<?= base_url(); ?>failed_phd_registration">Failed Registrations</a>

											<?php } ?>

											<?php if (in_array('successfull_phd_registration', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "successfull_phd_registration") { ?>active<?php } ?>" href="<?= base_url(); ?>successfull_phd_registration">Successfull Registrations</a>

											<?php } ?>



											<?php if (in_array('refunded_phd_registration', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "refunded_phd_registration") { ?>active<?php } ?>" href="<?= base_url(); ?>refunded_phd_registration">Refunded Registrations</a>

											<?php } ?>

										</div>

									</li>

								<?php } ?>



								<?php if (in_array('create_tests', $access) || in_array('phd_exams_student', $access)) { ?>

									<li class="nav-item dropdown">

										<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

											Entrance Exam

										</a>

										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

											<?php if (in_array('create_tests', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "create_tests") { ?>active<?php } ?>" href="<?= base_url(); ?>create_tests">Entrance Exam Setup</a>

											<?php } ?>

											<?php if (in_array('phd_exams_student', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "phd_exams_student") { ?>active<?php } ?>" href="<?= base_url(); ?>phd_exams_student">Appeared Entrance Examination</a>

											<?php } ?>

										</div>

									</li>

								<?php }



								?>



								<?php if (in_array('phd_course_work_schedule', $access) || in_array('phd_course_work_data_success', $access) || in_array('phd_course_work_data_fail', $access) || in_array('phd_course_work_approved_list', $access) || in_array('course_work_exam', $access) || in_array('course_work_exam_appeared_list', $access) || in_array('course_work_result_list', $access)) { ?>

									<li class="nav-item dropdown">

										<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

											Course Work

										</a>

										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

											<?php if (in_array('phd_course_work_schedule', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "phd_course_work_schedule") { ?>active<?php } ?>" href="<?= base_url(); ?>phd_course_work_schedule">Course Work Schedule</a>

											<?php } ?>

											<?php if (in_array('phd_course_work_data_fail', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "phd_course_work_data_fail") { ?>active<?php } ?>" href="<?= base_url(); ?>phd_course_work_data_fail">Course Work Data Fail</a>

											<?php } ?>

											<?php if (in_array('phd_course_work_data_success', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "phd_course_work_data_success") { ?>active<?php } ?>" href="<?= base_url(); ?>phd_course_work_data_success">Course Work Data Success</a>

											<?php } ?>



											<?php if (in_array('phd_course_work_approved_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "phd_course_work_approved_list") { ?>active<?php } ?>" href="<?= base_url(); ?>phd_course_work_approved_list">Course Work Approve List</a>

											<?php } ?>

											<?php if (in_array('course_work_exam', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "course_work_exam") { ?>active<?php } ?>" href="<?= base_url(); ?>course_work_exam">Course Work Exam Setup</a>

											<?php } ?>

											<?php if (in_array('course_work_exam_appeared_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "course_work_exam_appeared_list") { ?>active<?php } ?>" href="<?= base_url(); ?>course_work_exam_appeared_list">Course Work Exam Appeared List</a>

											<?php } ?>



											<?php if (in_array('course_work_result_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "course_work_result_list") { ?>active<?php } ?>" href="<?= base_url(); ?>course_work_result_list">Course Work Result</a>

											<?php } ?>

										</div>

									</li>

								<?php } ?>



								<?php



								if (in_array('phd_course_work_schedule', $access) || in_array('phd_course_work_data_success', $access) || in_array('phd_course_work_data_fail', $access) || in_array('phd_course_work_approved_list', $access) || in_array('course_work_exam', $access) || in_array('course_work_exam_appeared_list', $access) || in_array('course_work_result_list', $access) || in_array('progress_report_list_research', $access) || in_array('rejected_synopsis_list', $access) || in_array('rejected_thesis_list', $access)  || in_array('new_synopsis_list', $access) || in_array('complete_synopsis_list', $access)  || in_array('rejected_synopsis_list', $access) || in_array('add_progress_report', $access)) { ?>

									<li class="nav-item dropdown">

										<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

											Documents

										</a>

										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

											<?php if (in_array('new_thesis_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "new_thesis_list") { ?>active<?php } ?>" href="<?= base_url(); ?>new_thesis_list">All Pending ThesisList </a>

											<?php } ?>



											<?php if (in_array('complete_thesis_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "complete_thesis_list") { ?>active<?php } ?>" href="<?= base_url(); ?>complete_thesis_list">Approved Thesis List</a>

											<?php } ?>



											<?php if (in_array('rejected_thesis_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "rejected_thesis_list") { ?>active<?php } ?>" href="<?= base_url(); ?>rejected_thesis_list">Rejected/Deficiency Thesis List</a>

											<?php } ?>



											<?php if (in_array('new_synopsis_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "new_synopsis_list") { ?>active<?php } ?>" href="<?= base_url(); ?>new_synopsis_list">All Pending Synopsis List</a>

											<?php } ?>



											<?php if (in_array('complete_synopsis_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "complete_synopsis_list") { ?>active<?php } ?>" href="<?= base_url(); ?>complete_synopsis_list">Approved Synopsis List</a>

											<?php } ?>



											<?php if (in_array('rejected_synopsis_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "rejected_synopsis_list") { ?>active<?php } ?>" href="<?= base_url(); ?>rejected_synopsis_list">Rejected Synopsis List</a>

											<?php } ?>



											<?php if (in_array('abstract_report_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "abstract_report_list") { ?>active<?php } ?>" href="<?= base_url(); ?>abstract_report_list">Pending Abstract Report List</a>

											<?php } ?>
											<?php if (in_array('approved_abstract_report_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "approved_abstract_report_list") { ?>active<?php } ?>" href="<?= base_url(); ?>approved_abstract_report_list">Approved Abstract Report List</a>

											<?php } ?>

											<?php if (in_array('rejected_abstract_report_list', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "rejected_abstract_report_list") { ?>active<?php } ?>" href="<?= base_url(); ?>rejected_abstract_report_list">Rejected Abstract Report List</a>

											<?php } ?>
											<?php if (in_array('add_progress_report', $access)) { ?>
												<a class="dropdown-item" href="<?= base_url(); ?>add_progress_report">Add Progress Report</a>
											<?php } ?>


											<?php if (in_array('progress_report_list_research', $access)) { ?>

												<a class="dropdown-item <?php if ($this->uri->segment(1) == "progress_report_list_research") { ?>active<?php } ?>" href="<?= base_url(); ?>progress_report_list_research">Research Progress Report List</a>

											<?php } ?>

											<?php
											//  if (in_array('progress_report_list', $access)) {
											?>
											<!-- <a class="dropdown-item <?php if ($this->uri->segment(1) == "progress_report_list") { ?>active<?php } ?>" href="<?= base_url(); ?>progress_report_list">Old Progress Report List</a> -->
											<?php
											// } 
											?>


										</div>
									</li>
								<?php } ?>
							</ul>
						</div>
					</li>
				<?php } ?>

				<?php if (in_array('add_staff_faculty', $access) || in_array('staff_faculty', $access) || in_array('today_staff_faculty', $access) || in_array('all_staff_faculty', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi  mdi-account-star menu-icon "></i>

							<span class="menu-title">Faculty</span>

							<i class="menu-arrow"></i>

						</a>



						<div class="submenu">

							<ul class="submenu-item">

								<!-- <?php if (in_array('all_online_classes', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "all_online_classes") { ?>active<?php } ?>" href="<?= base_url(); ?>all_online_classes">All List of Online Classes</a></li>

										<?php } ?> -->

								<?php if (in_array('bulk_attendance_list', $access)) { ?>

									<!--<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>bulk_attendance_list">Student Attendance List</a></li>-->

								<?php } ?>

								<?php if (in_array('admin_staff_attendance', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_staff_attendance") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_staff_attendance">Staff Attendance</a></li>

								<?php } ?>

								<?php if (in_array('add_staff_faculty', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_staff_faculty") { ?>active<?php } ?>" href="<?= base_url(); ?>add_staff_faculty">Add Staff Faculty</a></li>

								<?php } ?>

								<?php if (in_array('staff_faculty', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "staff_faculty") { ?>active<?php } ?>" href="<?= base_url(); ?>staff_faculty">Staff Faculty</a></li>

								<?php } ?>

								<?php if (in_array('left_staff_faculty', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "left_staff_faculty") { ?>active<?php } ?>" href="<?= base_url(); ?>left_staff_faculty">Left Staff Faculty</a></li>

								<?php } ?>

								<?php if (in_array('today_staff_faculty', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "today_staff_faculty") { ?>active<?php } ?>" href="<?= base_url(); ?>today_staff_faculty">Today Report</a></li>

								<?php } ?>

								<?php if (in_array('all_staff_faculty', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "all_staff_faculty") { ?>active<?php } ?>" href="<?= base_url(); ?>all_staff_faculty">All Report</a></li>

								<?php } ?>

								<?php if (in_array('waiting_list_for_report', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "waiting_list_for_report") { ?>active<?php } ?>" href="<?= base_url(); ?>waiting_list_for_report">Waiting List for Report</a></li>

								<?php } ?>

								<?php if (in_array('admin_view_register', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_view_register") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_view_register">All Register's</a></li>

								<?php } ?>

								<?php if (in_array('feedback_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "feedback_list") { ?>active<?php } ?>" href="<?= base_url(); ?>feedback_list">Feedback</a></li>

								<?php } ?>



							</ul>

						</div>

					</li>

				<?php } ?>













				<?php if (in_array('create_topic', $access) || in_array('topic_list', $access) || in_array('create_exam', $access) || in_array('created_exam_list', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-account-plus menu-icon "></i>

							<span class="menu-title">Online</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">

								<?php if (in_array('create_topic', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "create_topic") { ?>active<?php } ?>" href="<?= base_url(); ?>create_topic">Create Topic</a></li>

								<?php } ?>

								<?php if (in_array('topic_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "topic_list") { ?>active<?php } ?>" href="<?= base_url(); ?>topic_list">All Topics</a></li>

								<?php } ?>

								<?php if (in_array('create_exam', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "create_exam") { ?>active<?php } ?>" href="<?= base_url(); ?>create_exam">Create Exam</a></li>

								<?php } ?>

								<?php if (in_array('created_exam_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "created_exam_list") { ?>active<?php } ?>" href="<?= base_url(); ?>created_exam_list">Exam List</a></li>

								<?php } ?>

								<?php /*	

										<?php if(in_array('mcq_question_list',$access)){?>

											<li class="nav-item"><a class="nav-link" href="<?=base_url();?>mcq_question_list">MCQ Question List</a></li>

										<?php }?>	

										<?php if(in_array('fill_in_blanks_question_list',$access)){?>

											<li class="nav-item"><a class="nav-link" href="<?=base_url();?>fill_in_blanks_question_list">Fill in th Blank Question List</a></li>

										<?php }?>	

										<?php if(in_array('one_word_ans_question_list',$access)){?>

											<li class="nav-item"><a class="nav-link" href="<?=base_url();?>one_word_ans_question_list">One word Question List</a></li>

										<?php }?>	

										<?php if(in_array('picture_question_list',$access)){?>

											<li class="nav-item"><a class="nav-link" href="<?=base_url();?>picture_question_list">Picture Question List</a></li>

										<?php }?>	

										<?php if(in_array('tick_mark_question_list',$access)){?>

											<li class="nav-item"><a class="nav-link" href="<?=base_url();?>tick_mark_question_list">Tick Mark Question List</a></li>

										<?php }?>

										<?php if(in_array('passage_reading_question_list',$access)){?>

											<li class="nav-item"><a class="nav-link" href="<?=base_url();?>passage_reading_question_list">Passage Reading Question List</a></li>

										<?php }?>	

										<?php if(in_array('match_the_following_question_list',$access)){?>

											<li class="nav-item"><a class="nav-link" href="<?=base_url();?>match_the_following_question_list">Match Question List</a></li>

										<?php } */ ?>

							</ul>

						</div>

					</li>

				<?php } ?>





				<?php if (in_array('marquee_news', $access) || in_array('manage_news', $access) || in_array('manage_conference', $access) || in_array('university_activity', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi mdi-newspaper menu-icon "></i>

							<span class="menu-title">News/ <br>Conference</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">

								<?php if (in_array('marquee_news', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "marquee_news") { ?>active<?php } ?>" href="<?= base_url(); ?>marquee_news">Manage Marquee News</a></li>

								<?php } ?>



								<!-- <?php if (in_array('manage_conference', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_conference") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_conference">Manage Conference</a></li>

										<?php } ?> -->



								<?php if (in_array('manage_news', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_news") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_news">Manage News</a></li>

								<?php } ?>



								<?php if (in_array('manage_blogs', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_blogs") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_blogs">Manage Blogs</a></li>

								<?php } ?>



								<?php if (in_array('university_activity', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "university_activity") { ?>active<?php } ?>" href="<?= base_url(); ?>university_activity">University Activities</a></li>

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>

				<?php if ($this->session->userdata('blended_validated') == "1") { ?>

					<?php if (in_array('generated_separate_student_results_excel', $access) || in_array('separate_student_search_marksheet', $access) || in_array('duplicate_marksheet_blended', $access) || in_array('student_addmission_form', $access) || in_array('separate_student_results', $access) || in_array('enrolled_student_list', $access) || in_array('manage_separate_student_result', $access) || in_array('search_separate_student_result', $access) || in_array('new_separate_synopsis_list

                         ', $access) || in_array('separate_complete_synopsis_list', $access) || in_array('new_separate_thesis_list', $access) || in_array('separate_complete_thesis_list', $access) || in_array('separate_progress_report_list', $access) || in_array('separate_marksheet_print_dispatch_list', $access) || in_array('cancel_blended_student_list', $access)) { ?>



						<li class="nav-item">

							<a href="#" class="nav-link">

								<i class="mdi  mdi-library menu-icon "></i>

								<span class="menu-title">Blended Students</span>

								<i class="menu-arrow"></i>

							</a>

							<div class="submenu" id="overflow_y_scroll">

								<ul class="submenu-item">

									<option disabled>--------------------Blended Student -------------------</option>





									<?php if (in_array('student_addmission_form', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_addmission_form") { ?>active<?php } ?>" href="<?= base_url(); ?>student_addmission_form">Student Admission Form</a></li>

									<?php } ?>

									<?php if (in_array('enrolled_student_list', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "enrolled_student_list") { ?>active<?php } ?>" href="<?= base_url(); ?>enrolled_student_list">Enrolled Student List</a></li>

									<?php } ?>

									<?php if (in_array('cancel_blended_student_list', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "cancel_blended_student_list") { ?>active<?php } ?>" href="<?= base_url(); ?>cancel_blended_student_list">Cancel Student List</a></li>

									<?php } ?>

									<option disabled>------------------- Blended Student Result ----------------</option>



									<?php if (in_array('manage_separate_student_result', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_separate_student_result") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_separate_student_result">Manage result</a></li>

									<?php } ?>

									<?php if (in_array('search_separate_student_result', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "search_separate_student_result") { ?>active<?php } ?>" href="<?= base_url(); ?>search_separate_student_result">Search result</a></li>

									<?php } ?>



									<?php if (in_array('separate_student_results', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_student_results") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_student_results">Generated results</a></li>

									<?php } ?>



									<option disabled>------------------ Blended Student Marksheet ----------------</option>



									<?php if (in_array('separate_student_search_marksheet', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_student_search_marksheet") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_student_search_marksheet">Search Marksheet</a></li>

									<?php } ?>

									<?php if (in_array('duplicate_marksheet_blended', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "duplicate_marksheet_blended") { ?>active<?php } ?>" href="<?= base_url(); ?>duplicate_marksheet_blended">Search Duplicate Marksheet</a></li>

									<?php } ?>



									<option disabled>------------------- Result Excel -----------------------</option>



									<?php if (in_array('generated_separate_student_results_excel', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "generated_separate_student_results_excel") { ?>active<?php } ?>" href="<?= base_url(); ?>generated_separate_student_results_excel">Download Blended Students Results Excel</a></li>

									<?php } ?>



									<?php if (in_array('generated_separate_student_results_excel', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "generated_pre_student_results_excel") { ?>active<?php } ?>" href="<?= base_url(); ?>generated_pre_student_results_excel">Download Pre Student results excel</a></li>

									<?php } ?>

								<?php } ?>





								<?php if (in_array('separate_marksheet_print_dispatch_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_marksheet_print_dispatch_list") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_marksheet_print_dispatch_list">Marksheet Dispatch List</a></li>

								<?php } ?>



								<option disabled>--------------------- Research Document ------------------</option>

								<?php if (in_array('add_thesis', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_thesis") { ?>active<?php } ?>" href="<?= base_url(); ?>add_thesis">Add Thesis</a></li>

								<?php } ?>



								<?php if (in_array('new_separate_thesis_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "new_separate_thesis_list") { ?>active<?php } ?>" href="<?= base_url(); ?>new_separate_thesis_list">New Thesis List</a></li>

								<?php } ?>

								<?php if (in_array('separate_complete_thesis_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_complete_thesis_list") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_complete_thesis_list">Approved Thesis List</a></li>

								<?php } ?>



								<?php if (in_array('apply_separate_synopsis_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link<?php if ($this->uri->segment(1) == "apply_separate_synopsis_list") { ?>active<?php } ?>" href="<?= base_url(); ?>apply_separate_synopsis_list">Apply Synopsis</a></li>

								<?php } ?>



								<?php if (in_array('new_separate_synopsis_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "new_separate_synopsis_list") { ?>active<?php } ?>" href="<?= base_url(); ?>new_separate_synopsis_list">New Synopsis List</a></li>

								<?php } ?>

								<?php if (in_array('separate_complete_synopsis_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_complete_synopsis_list") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_complete_synopsis_list">Approved Synopsis List</a></li>

									<?php if (in_array('separate_abstract_report_list', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_abstract_report_list") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_abstract_report_list">Abstract Report List</a></li>

									<?php } ?>





									<?php if (in_array('add_separate_progress_report', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_separate_progress_report") { ?>active<?php } ?>" href="<?= base_url(); ?>add_separate_progress_report">Apply Progress Report</a></li>

									<?php } ?>



									<?php if (in_array('separate_progress_report_list', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_progress_report_list") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_progress_report_list">Progress Report List</a></li>

									<?php } ?>



									<?php

									// }

									?>

								</ul>

							</div>

						</li>

					<?php } ?>





					<?php if (in_array('approved_separate_student_provisional_degrees', $access) || in_array('separate_student_provisional_degree_requests', $access) || in_array('apply_for_transfer', $access) || in_array('separate_student_degree_apply', $access) || in_array('apply_for_recommendation_letter', $access) || in_array('approved_separate_student_degrees', $access) || in_array('separate_student_degree_requests', $access) || in_array('approved_separate_student_recommendation_letters', $access) || in_array('separate_student_reccomendation_letter_requests', $access) || in_array('approved_separate_student_transfer_certificate', $access) || in_array('separate_student_transfer_certificate_requests', $access) || in_array('separate_student_migration_certificate_requests', $access) || in_array('separate_student_migration_certificates', $access)  || in_array('apply_separate_student_provisional_degrees', $access) ||  in_array('add_phd_course_work_application', $access) ||  in_array('phd_course_work_application_success_list', $access) ||  in_array('phd_course_work_application_failed_list', $access) ||  in_array('phd_course_work_application_approved_list', $access)  ||  in_array('phd_course_work_approved_application_result_list', $access)  || in_array('s_student_transcript_certificate_add', $access) || in_array('s_student_transcript_certificate_failed', $access) || in_array('s_student_transcript_certificate_success', $access) || in_array('s_student_transcript_certificate_approved', $access) || in_array('add_consolidated_separate_student', $access) || in_array('consolidated_list_separate_student', $access) || in_array('consolidated_separate_request', $access)) { ?>

						<li class="nav-item">

							<a href="#" class="nav-link">

								<i class="mdi  mdi-image-filter-none menu-icon "></i>

								<span class="menu-title">Blended Students Certificates</span>

								<i class="menu-arrow"></i>

							</a>

							<div class="submenu" id="overflow_y_scroll">

								<ul class="submenu-item">

									<option disabled>----------------------------Migration Certificate--------------------------------------</option>

									<?php if (in_array('apply_for_migration', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "apply_for_migration") { ?>active<?php } ?>" href="<?= base_url(); ?>apply_for_migration">Apply for Migration</a></li>

									<?php } ?>

									<?php if (in_array('separate_student_migration_certificate_requests', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_student_migration_certificate_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_student_migration_certificate_requests">Migration Certificate Requests</a></li>

									<?php } ?>



									<?php if (in_array('separate_student_migration_certificates', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_student_migration_certificates") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_student_migration_certificates">Migration Certificates</a></li>

									<?php } ?>

									<option disabled>----------------------------Transfer Certificate --------------------------------------</option>

									<?php if (in_array('apply_for_transfer', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "apply_for_transfer") { ?>active<?php } ?>" href="<?= base_url(); ?>apply_for_transfer">Apply for Transfer</a></li>

									<?php } ?>



									<?php if (in_array('separate_student_transfer_certificate_requests', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_student_transfer_certificate_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_student_transfer_certificate_requests">Tansfer Certificates Requests</a></li>

									<?php } ?>



									<?php if (in_array('approved_separate_student_transfer_certificate', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approved_separate_student_transfer_certificate") { ?>active<?php } ?>" href="<?= base_url(); ?>approved_separate_student_transfer_certificate">Approved Transfer Certificate</a></li>

									<?php } ?>

									<option disabled>---------------------------- Recommendation Request Letter--------------------------------------</option>





									<?php if (in_array('apply_for_recommendation_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "apply_for_recommendation_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>apply_for_recommendation_letter">Apply Reccomendation Letter</a></li>

									<?php } ?>



									<?php if (in_array('separate_student_reccomendation_letter_requests', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_student_reccomendation_letter_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_student_reccomendation_letter_requests">Reccomendation Letter Requests</a></li>

									<?php } ?>



									<?php if (in_array('approved_separate_student_recommendation_letters', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approved_separate_student_recommendation_letters") { ?>active<?php } ?>" href="<?= base_url(); ?>approved_separate_student_recommendation_letters">Approved Recommendation Letters</a></li>

									<?php } ?>

									<option disabled>---------------------------- Degree Certificate --------------------------------------</option>



									<?php if (in_array('separate_student_degree_apply', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_student_degree_apply") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_student_degree_apply">Apply Degree</a></li>

									<?php } ?>





									<?php if (in_array('separate_student_degree_requests', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_student_degree_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_student_degree_requests">Degree Requests</a></li>

									<?php } ?>



									<?php if (in_array('approved_separate_student_degrees', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approved_separate_student_degrees") { ?>active<?php } ?>" href="<?= base_url(); ?>approved_separate_student_degrees">Approved Degrees</a></li>

									<?php } ?>

									<option disabled>---------------------------- Provisional Degree Certificate --------------------------------------</option>



									<?php if (in_array('apply_separate_student_provisional_degrees', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "apply_separate_student_provisional_degrees") { ?>active<?php } ?>" href="<?= base_url(); ?>apply_separate_student_provisional_degrees">Apply Provisional</a></li>

									<?php } ?>





									<?php if (in_array('separate_student_provisional_degree_requests', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "separate_student_provisional_degree_requests") { ?>active<?php } ?>" href="<?= base_url(); ?>separate_student_provisional_degree_requests">Provisional Degree Requests</a></li>

									<?php } ?>





									<?php if (in_array('approved_separate_student_provisional_degrees', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approved_separate_student_provisional_degrees") { ?>active<?php } ?>" href="<?= base_url(); ?>approved_separate_student_provisional_degrees">Approved Provisional Degrees</a></li>

									<?php } ?>



									<option disabled>---------------------------- Ph.D Course Work Application --------------------------------------</option>



									<?php if (in_array('add_phd_course_work_application', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_phd_course_work_application") { ?>active<?php } ?>" href="<?= base_url(); ?>add_phd_course_work_application">Add Ph.D Course Work Application</a></li>

									<?php } ?>



									<?php if (in_array('phd_course_work_application_success_list', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "phd_course_work_application_success_list") { ?>active<?php } ?>" href="<?= base_url(); ?>phd_course_work_application_success_list">Ph.D Course Work Application Success List</a></li>

									<?php } ?>



									<?php if (in_array('phd_course_work_application_failed_list', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "phd_course_work_application_failed_list") { ?>active<?php } ?>" href="<?= base_url(); ?>phd_course_work_application_failed_list">Ph.D Course Work Application Failed List</a></li>

									<?php } ?>



									<?php if (in_array('phd_course_work_application_approved_list', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "phd_course_work_application_approved_list") { ?>active<?php } ?>" href="<?= base_url(); ?>phd_course_work_application_approved_list">Ph.D Course Work Application Approved List</a></li>

									<?php } ?>

									<?php if (in_array('phd_course_work_approved_application_result_list', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "phd_course_work_approved_application_result_list") { ?>active<?php } ?>" href="<?= base_url(); ?>phd_course_work_approved_application_result_list">Ph.D Course Work Approved Application Result List</a></li>

									<?php } ?>



									<option disabled>---------------------------- Transcript Application --------------------------------------</option>





									<?php if (in_array('s_student_transcript_certificate_add', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "s_student_transcript_certificate_add") { ?>active<?php } ?>" href="<?= base_url(); ?>s_student_transcript_certificate_add">Add Transcript</a></li>

									<?php } ?>

									<?php if (in_array('s_student_transcript_certificate_failed', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "s_student_transcript_certificate_failed") { ?>active<?php } ?>" href="<?= base_url(); ?>s_student_transcript_certificate_failed">Transcript Payment Failed List</a></li>

									<?php } ?>



									<?php if (in_array('s_student_transcript_certificate_success', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "s_student_transcript_certificate_success") { ?>active<?php } ?>" href="<?= base_url(); ?>s_student_transcript_certificate_success">Transcript Payment Success List</a></li>

									<?php } ?>



									<?php if (in_array('s_student_transcript_certificate_approved', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "s_student_transcript_certificate_approved") { ?>active<?php } ?>" href="<?= base_url(); ?>s_student_transcript_certificate_approved">Transcript Payment Approved List</a></li>

									<?php } ?>



									<option disabled>---------------------------- Consolidated Application --------------------------------------</option>



									<?php if (in_array('add_consolidated_separate_student', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_consolidated_separate_student") { ?>active<?php } ?>" href="<?= base_url(); ?>add_consolidated_separate_student">Add Consolidated Marksheet Blended Students</a></li>

									<?php  } ?>

									<?php if (in_array('consolidated_separate_request', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "consolidated_separate_request") { ?>active<?php } ?>" href="<?= base_url(); ?>consolidated_separate_request"> Consolidated Marksheet Request Blended Students</a></li>

									<?php  } ?>

									<?php if (in_array('consolidated_list_separate_student', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "consolidated_list_separate_student") { ?>active<?php } ?>" href="<?= base_url(); ?>consolidated_list_separate_student"> Consolidated Marksheet List Blended Students</a></li>

									<?php  } ?>



									<option disabled>----------------------------Bonafide Certificate--------------------------------------</option>

									<?php if (in_array('blended_student_apply_bonafide_cer', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_apply_bonafide_cer") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_apply_bonafide_cer">Apply Bonafide Certificate</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_req_bonafide_cer', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_req_bonafide_cer") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_req_bonafide_cer">Requested Bonafide Certificate</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_approved_bonafide_cer', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_approved_bonafide_cer") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_approved_bonafide_cer">Approved Bonafide Certificate</a></li>

									<?php } ?>

									<option disabled>----------------------------Medium Of Instruction--------------------------------------</option>

									<?php if (in_array('blended_student_apply_inst_medium_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_apply_inst_medium_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_apply_inst_medium_letter">Apply Medium of Instruction Letter</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_req_inst_medium_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_req_inst_medium_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_req_inst_medium_letter">Requested Medium of Instruction Letter</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_approved_inst_medium_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_approved_inst_medium_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_approved_inst_medium_letter">Approved Medium of Instruction Letter</a></li>

									<?php } ?>

									<option disabled>----------------------------No Backlog Summary--------------------------------------</option>

									<?php if (in_array('blended_student_apply_no_backlog_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_apply_no_backlog_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_apply_no_backlog_letter">Apply No Backlog Summary Letter</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_req_no_backlog_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_req_no_backlog_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_req_no_backlog_letter">Requested No Backlog Summary Letter</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_approved_no_backlog_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_approved_no_backlog_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_approved_no_backlog_letter">Approved No Backlog Summary Letter</a></li>

									<?php } ?>

									<option disabled>----------------------------No Split Issue Letter--------------------------------------</option>

									<?php if (in_array('blended_student_apply_no_split_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_apply_no_split_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_apply_no_split_letter">Apply No Split Issue Letter</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_req_no_split_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_req_no_split_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_req_no_split_letter">Requested No Split Issue Letter</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_approved_no_split_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_approved_no_split_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_approved_no_split_letter">Approved No Split Issue Letter</a></li>

									<?php } ?>

									<option disabled>---------------------------- II Recommendation Letter--------------------------------------</option>

									<?php if (in_array('blended_student_apply_reccom_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_apply_reccom_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_apply_reccom_letter">Apply Recommendation Letter</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_req_reccom_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_req_reccom_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_req_reccom_letter">Requested Recommendation Letter</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_approved_reccom_letter', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_approved_reccom_letter") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_approved_reccom_letter">Approved Recommendation Letter</a></li>

									<?php } ?>



									<option disabled>---------------------------- Character Certificate --------------------------------------</option>

									<?php if (in_array('blended_student_apply_character_certificate', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_apply_character_certificate") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_apply_character_certificate">Apply Character Certificate</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_req_character_certificate', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_req_character_certificate") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_req_character_certificate">Requested Character Certificate</a></li>

									<?php } ?>

									<?php if (in_array('blended_student_approved_character_certificate', $access)) { ?>

										<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_student_approved_character_certificate") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_student_approved_character_certificate">Approved Character Certificate</a></li>

									<?php } ?>



								</ul>

							</div>

						</li>

					<?php } ?>

				<?php } ?>



				<?php if (in_array('direct_payment_success_list', $access) || in_array('direct_payment_failed_list', $access) || in_array('pr_list', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-credit-card menu-icon "></i>

							<span class="menu-title">DP & PR</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">



								<!-- <?php if (in_array('direct_payment_success_list', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "direct_payment_success_list") { ?>active<?php } ?>" href="<?= base_url(); ?>direct_payment_success_list">Payment Success List</a></li>

										<?php } ?> -->



								<!-- <?php if (in_array('direct_payment_failed_list', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "direct_payment_failed_list") { ?>active<?php } ?>" href="<?= base_url(); ?>direct_payment_failed_list">Payment Failed List</a></li>

										<?php } ?> -->

								<?php if (in_array('pr_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "pr_list") { ?>active<?php } ?>" href="<?= base_url(); ?>pr_list">PR List</a></li>

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>



				<?php

				if (in_array('student_appointments',$access) || in_array('student_appointments_completed',$access) || in_array('enquiry_lead_list', $access) || in_array('add_enquiry_lead', $access) || in_array('admin_campus_enquiry', $access) || in_array('enquiry_head', $access) || in_array('enquiry_list', $access) || in_array('otp_lead', $access) || in_array('_', $access) || in_array('pulp_enquiry_list', $access)) {

				?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi  mdi-twitter-retweet menu-icon "></i>

							<span class="menu-title">Enquiries</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">

								<?php

								if (in_array('manage_center_enquiry', $access)) {

								?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_center_enquiry") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_center_enquiry">Center Enquiry</a></li>

								<?php

								}

								?>

								<?php /*if (in_array('otp_lead', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if($this->uri->segment(1)=="otp_lead"){?>active<?php }?>" href="<?= base_url(); ?>otp_lead">OTP Lead List</a></li>

										<?php }*/ ?>

								<?php if (in_array('enquiry_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "enquiry_list") { ?>active<?php } ?>" href="<?= base_url(); ?>enquiry_list">Student Enquiry</a></li>

								<?php } ?>

								<?php /*if (in_array('pulp_enquiry_list', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if($this->uri->segment(1)=="pulp_enquiry_list"){?>active<?php }?>" href="<?= base_url(); ?>pulp_enquiry_list">Pulp Enquiry</a></li>

										<?php }*/ ?>

								<?php /*if (in_array('enquiry_head', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if($this->uri->segment(1)=="enquiry_head"){?>active<?php }?>" href="<?= base_url(); ?>enquiry_head">Enquiry Heads</a></li>

										<?php } ?>

										<?php if (in_array('admin_campus_enquiry', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if($this->uri->segment(1)=="admin_campus_enquiry"){?>active<?php }?>" href="<?= base_url(); ?>admin_campus_enquiry">Campus Enquiry</a></li>

										<?php }*/ ?>

								<?php if (in_array('add_enquiry_lead', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_enquiry_lead") { ?>active<?php } ?>" href="<?= base_url(); ?>add_enquiry_lead">Add Enquiry Lead</a></li>

								<?php } ?>

								<?php if (in_array('enquiry_lead_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "enquiry_lead_list") { ?>active<?php } ?>" href="<?= base_url(); ?>enquiry_lead_list">Enquiry Lead List</a></li>

								<?php } ?>
								<?php if(in_array('student_appointments',$access)){?> 
								<li class="nav-item"><a class="nav-link" href="<?=base_url();?>student_appointments">Campus Visit Appointments</a></li> 
								<?php }?> 
								<?php if(in_array('student_appointments_completed',$access)){?> 
								<li class="nav-item"><a class="nav-link" href="<?=base_url();?>student_appointments_completed">Completed Visit Appointments</a></li> 
								<?php }?>  
							</ul>

						</div>

					</li>

				<?php

				}

				?>







				<?php if (in_array('account_vendor', $access) || in_array('account_bill_list', $access) || in_array('account_monthly_collection', $access) || in_array('account_yearly_collection', $access) || in_array('total_collection', $access) || in_array('student_payment_pending', $access) || in_array('center_payment_pending', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-account-circle menu-icon "></i>

							<span class="menu-title">Account</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">

								<?php if (in_array('account_monthly_collection', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "account_monthly_collection") { ?>active<?php } ?>" href="<?= base_url(); ?>account_monthly_collection">Monthly Collection</a></li>

								<?php } ?>

								<?php if (in_array('account_yearly_collection', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "account_yearly_collection") { ?>active<?php } ?>" href="<?= base_url(); ?>account_yearly_collection">Yearly Collection</a></li>

								<?php } ?>

								<?php if (in_array('total_collection', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "total_collection") { ?>active<?php } ?>" href="<?= base_url(); ?>total_collection">Total Collection</a></li>

								<?php } ?>

								<?php if (in_array('student_payment_pending', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_payment_pending") { ?>active<?php } ?>" href="<?= base_url(); ?>student_payment_pending">Student Payment Pending</a></li>

								<?php } ?>

								<?php if (in_array('center_payment_pending', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "center_payment_pending") { ?>active<?php } ?>" href="<?= base_url(); ?>center_payment_pending">Center Payment Pending</a></li>

								<?php } ?>

								<?php if (in_array('student_payment_account_pending', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_payment_account_pending") { ?>active<?php } ?>" href="<?= base_url(); ?>student_payment_account_pending">Student Payment <br> Account Pending</a></li>

								<?php } ?>

								<?php if (in_array('account_vendor', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "account_vendor") { ?>active<?php } ?>" href="<?= base_url(); ?>account_vendor">Account Vendors</a></li>

								<?php } ?>

								<?php if (in_array('account_bill_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "account_bill_list") { ?>active<?php } ?>" href="<?= base_url(); ?>account_bill_list">Bills</a></li>

								<?php } ?>

								<?php if (in_array('all_payment_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "all_payment_list") { ?>active<?php } ?>" href="<?= base_url(); ?>all_payment_list">All Payment List</a></li>

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>



				<?php if (in_array('add_paper', $access) || in_array('center_paper_list', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi  mdi-clipboard menu-icon "></i>

							<span class="menu-title">Papers</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">



								<?php if (in_array('add_paper', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_paper") { ?>active<?php } ?>" href="<?= base_url(); ?>add_paper">Add Paper</a></li>

								<?php  } ?>

								<?php if (in_array('center_paper_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "center_paper_list") { ?>active<?php } ?>" href="<?= base_url(); ?>center_paper_list">Center Paper's</a></li>

								<?php  } ?>

							</ul>

						</div>





					</li>

				<?php } ?>







				<?php if (in_array('kyc_list', $access) || in_array('blended_kyc_list', $access) || in_array('approve_blended_kyc_list', $access) || in_array('rejected_blended_kyc_list', $access) || in_array('create_blended_kyc', $access) || in_array('direct_kyc_list', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-account-plus menu-icon "></i>

							<span class="menu-title">Video KYC </span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu" id="overflow_y_scroll">

							<ul class="submenu-item">

								<?php if (in_array('kyc_list', $access)) { ?>

									<!--<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>kyc_list">KYC List</a></li>-->

								<?php } ?>

								<option disabled>----------------------------Blended KYC--------------------------------------</option>

								<?php if (in_array('create_blended_kyc', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "create_blended_kyc") { ?>active<?php } ?>" href="<?= base_url(); ?>create_blended_kyc">Create Blended KYC Link</a></li>

								<?php } ?>

								<?php if (in_array('blended_kyc_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "blended_kyc_list") { ?>active<?php } ?>" href="<?= base_url(); ?>blended_kyc_list">New KYC List</a></li>

								<?php } ?>

								<?php if (in_array('rejected_blended_kyc_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "rejected_blended_kyc_list") { ?>active<?php } ?>" href="<?= base_url(); ?>rejected_blended_kyc_list">Rejected Blended KYC List</a></li>

								<?php } ?>

								<?php if (in_array('approve_blended_kyc_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approve_blended_kyc_list") { ?>active<?php } ?>" href="<?= base_url(); ?>approve_blended_kyc_list">Approved Blended KYC List</a></li>

								<?php } ?>

								<option disabled>----------------------------Regular KYC--------------------------------------</option>

								<?php if (in_array('create_regular_kyc', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "create_regular_kyc") { ?>active<?php } ?>" href="<?= base_url(); ?>create_regular_kyc">Create KYC Link</a></li>

								<?php } ?>

								<?php if (in_array('regular_kyc_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "regular_kyc_list") { ?>active<?php } ?>" href="<?= base_url(); ?>regular_kyc_list">New KYC List</a></li>

								<?php } ?>

								<?php if (in_array('rejected_regullar_kyc_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "rejected_regullar_kyc_list") { ?>active<?php } ?>" href="<?= base_url(); ?>rejected_regullar_kyc_list">Rejected KYC List</a></li>

								<?php } ?>

								<?php if (in_array('approve_regular_kyc_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approve_regular_kyc_list") { ?>active<?php } ?>" href="<?= base_url(); ?>approve_regular_kyc_list">Approved KYC List</a></li>

								<?php } ?>

								<option disabled>----------------------------Direct KYC--------------------------------------</option>

								<?php if (in_array('direct_kyc_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "direct_kyc_list") { ?>active<?php } ?>" href="<?= base_url(); ?>direct_kyc_list">Direct KYC List</a></li>

								<?php } ?>

								<?php if (in_array('rejected_direct_kyc_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "rejected_direct_kyc_list") { ?>active<?php } ?>" href="<?= base_url(); ?>rejected_direct_kyc_list">Rejected KYC List</a></li>

								<?php } ?>

								<?php if (in_array('approve_direct_kyc_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approve_direct_kyc_list") { ?>active<?php } ?>" href="<?= base_url(); ?>approve_direct_kyc_list">Approved KYC List</a></li>

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>



				<?php if (in_array('add_consolidated', $access) || in_array('consolidated_request', $access) || in_array('consolidated_list', $access)  || in_array('add_student_transcript_certificate', $access) || in_array('student_transcript_certificate_failed', $access) || in_array('student_transcript_certificate_success', $access) || in_array('student_transcript_certificate_approved', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-format-align-justify menu-icon "></i>

							<span class="menu-title">Consolidated</span>

							<i class="menu-arrow"></i>

						</a>



						<div class="submenu">

							<ul class="submenu-item">



								<?php if (in_array('add_consolidated', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_consolidated") { ?>active<?php } ?>" href="<?= base_url(); ?>add_consolidated">Add Consolidated Marksheet</a></li>

								<?php  } ?>

								<?php if (in_array('consolidated_request', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "consolidated_request") { ?>active<?php } ?>" href="<?= base_url(); ?>consolidated_request"> Consolidated Marksheet Request</a></li>

								<?php  } ?>

								<?php if (in_array('consolidated_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "consolidated_list") { ?>active<?php } ?>" href="<?= base_url(); ?>consolidated_list"> Consolidated Marksheet List</a></li>

								<?php  } ?>







								<?php if (in_array('add_student_transcript_certificate', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_student_transcript_certificate") { ?>active<?php } ?>" href="<?= base_url(); ?>add_student_transcript_certificate">Add Transcript</a></li>

								<?php } ?>

								<?php if (in_array('student_transcript_certificate_failed', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_transcript_certificate_failed") { ?>active<?php } ?>" href="<?= base_url(); ?>student_transcript_certificate_failed">Transcript Payment Failed List</a></li>

								<?php } ?>



								<?php if (in_array('student_transcript_certificate_success', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_transcript_certificate_success") { ?>active<?php } ?>" href="<?= base_url(); ?>student_transcript_certificate_success">Transcript Payment Success List</a></li>

								<?php } ?>



								<?php if (in_array('student_transcript_certificate_approved', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_transcript_certificate_approved") { ?>active<?php } ?>" href="<?= base_url(); ?>student_transcript_certificate_approved">Transcript Payment Approved List</a></li>

								<?php } ?>



							</ul>

						</div>





					</li>

				<?php } ?>



				<?php if (in_array('manage_head', $access) || in_array('manage_sub_head', $access) || in_array('upload_documents', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-folder-multiple menu-icon "></i>

							<span class="menu-title">Documentation</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">

								<?php if (in_array('manage_head', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_head") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_head">Manage Head</a></li>

								<?php } ?>

								<?php if (in_array('manage_sub_head', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "manage_sub_head") { ?>active<?php } ?>" href="<?= base_url(); ?>manage_sub_head">Manage Sub Head</a></li>

								<?php } ?>

								<?php if (in_array('upload_documents', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "upload_documents") { ?>active<?php } ?>" href="<?= base_url(); ?>upload_documents">Upload documents</a></li>

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>



				<?php if (in_array('seo_registration', $access) || in_array('seperate_student_assessmet', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-earth menu-icon "></i>

							<span class="menu-title">SEO Setup</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">



								<?php if (in_array('seo_registration', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "seo_registration") { ?>active<?php } ?>" href="<?= base_url(); ?>seo_registration">SEO Setup List</a></li>

								<?php  } ?>



							</ul>

						</div>

					</li>

				<?php } ?>

				<?php if (in_array('add_library', $access) || in_array('library_list', $access) || in_array('count_library_list', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-library-books menu-icon "></i>

							<span class="menu-title">E-Library</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">



								<?php if (in_array('add_library', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_library") { ?>active<?php } ?>" href="<?= base_url(); ?>add_library">Add E-Library</a></li>

								<?php  } ?>

								<?php if (in_array('library_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "library_list") { ?>active<?php } ?>" href="<?= base_url(); ?>course_library_list">E-Library List</a></li>

								<?php  } ?>



								<?php if (in_array('count_library_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "count_library_list") { ?>active<?php } ?>" href="<?= base_url(); ?>count_library_list">Library List</a></li>

								<?php  } ?>

							</ul>

						</div>

					</li>

				<?php } ?>







				<?php if (in_array('create_mail', $access) || in_array('created_mail_list', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-account-plus menu-icon "></i>

							<span class="menu-title">Mail Setup</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">

								<?php if (in_array('create_mail', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "create_mail") { ?>active<?php } ?>" href="<?= base_url(); ?>create_mail">Create Mail</a></li>

								<?php } ?>

								<?php if (in_array('created_mail_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "created_mail_list") { ?>active<?php } ?>" href="<?= base_url(); ?>created_mail_list">All Mail</a></li>

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>



				<?php /*if (in_array('create_account_team', $access) || in_array('list_account_team', $access) || in_array('verified_transaction_list', $access)) { ?>

							<li class="nav-item">

								<a href="#" class="nav-link">

									<i class="mdi mdi-account-plus menu-icon "></i>

									<span class="menu-title">Account Verification</span>

									<i class="menu-arrow"></i>

								</a>

								<div class="submenu">

									<ul class="submenu-item">

										<?php if (in_array('create_account_team', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if($this->uri->segment(1)=="create_account_team"){?>active<?php }?>" href="<?= base_url(); ?>create_account_team">Create User</a></li>

										<?php } ?>

										<?php if (in_array('list_account_team', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if($this->uri->segment(1)=="list_account_team"){?>active<?php }?>" href="<?= base_url(); ?>list_account_team">All User</a></li>

										<?php } ?>

										<?php if (in_array('verified_transaction_list', $access)) { ?>

											<li class="nav-item"><a class="nav-link <?php if($this->uri->segment(1)=="verified_transaction_list"){?>active<?php }?>" href="<?= base_url(); ?>verified_transaction_list">Verified List</a></li>

										<?php } ?>

									</ul>

								</div>

							</li>

						<?php }*/ ?>



				<?php if (in_array('create_my_report', $access) || in_array('view_emp_reports_today', $access) || in_array('view_emp_reports_all', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-account-plus menu-icon "></i>

							<span class="menu-title">EMP Reporting</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">

								<?php if (in_array('create_my_report', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "create_my_report") { ?>active<?php } ?>" href="<?= base_url(); ?>create_my_report">Create Report List</a></li>

								<?php } ?>

								<?php if (in_array('view_emp_reports_today', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "view_emp_reports_today") { ?>active<?php } ?>" href="<?= base_url(); ?>view_emp_reports_today">Today Report List</a></li>

								<?php } ?>

								<?php if (in_array('view_emp_reports_all', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "view_emp_reports_all") { ?>active<?php } ?>" href="<?= base_url(); ?>view_emp_reports_all">All Report List</a></li>

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>





				<?php



				if (in_array('pending_assignment_list', $access) ||  in_array('rejected_assignment_list', $access) ||  in_array('approved_assignment_list', $access) ||  in_array('student_assessment', $access) || in_array('seperate_student_assessmet', $access) || in_array('admin_self_Assessment_pending_list', $access) || in_array('admin_self_Assessment_rejected_list', $access) || in_array('admin_self_Assessment_approved_list', $access) || in_array('admin_teacher_Assessment_pending_list', $access) || in_array('admin_teacher_Assessment_rejected_list', $access) || in_array('admin_teacher_Assessment_approved_list', $access) || in_array('admin_industry_Assessment_pending_list', $access) || in_array('admin_industry_Assessment_rejected_list', $access) || in_array('admin_industry_Assessment_approved_list', $access) || in_array('admin_parent_Assessment_pending_list', $access) || in_array('admin_parent_Assessment_rejected_list', $access) || in_array('admin_parent_Assessment_approved_list', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi  mdi-pencil-box menu-icon "></i>

							<span class="menu-title">Assessment And Assignment</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item" style="overflow-y: scroll;height: 350px;">
								<option disabled=""> ---------------------PDF Assessment-------------------- </option>
								<?php 
								if (in_array('student_assessment', $access)) {  
								?> 
								 <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_assessment") { ?>active<?php } ?>" href="<?= base_url(); ?>student_assessment">Student Assesment</a></li> 
								<?php 
								  } 
								?> 
								<?php 
								  if (in_array('teacher_assessment', $access)) {  
								?> 
								 <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "teacher_assessment") { ?>active<?php } ?>" href="<?= base_url(); ?>teacher_assessment">Teacher Assesment</a></li> 
								<?php
								 } 
								?>
								<?php
								  if (in_array('student_assignment', $access)) { 
								?>
								 <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_assignment") { ?>active<?php } ?>" href="<?= base_url(); ?>student_assignment">Student Assignment</a></li> 
								<?php
								  }
								?>
								<?php
								 if (in_array('student_industry_assessment', $access)) {
								?>
								 <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_industry_assessment") { ?>active<?php } ?>" href="<?= base_url(); ?>student_industry_assessment">Industry Assesment</a></li> 
								<?php
								  }  
								?> 
								<?php 
								  if (in_array('student_guardian_assessment', $access)) { 
								?> 
								 <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "student_guardian_assessment") { ?>active<?php } ?>" href="<?= base_url(); ?>student_guardian_assessment">Parent Assesment</a></li> 
								<?php 
								 }  
								?>  
								<?php 
								if (in_array('rejected_assessment', $access)) { 
								?> 
								 <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "rejected_assessment") { ?>active<?php } ?>" href="<?= base_url(); ?>rejected_assessment">Rejected Assessment List</a></li> 
								<?php 
								}  
								?> 
								<?php 
								 if (in_array('approved_assessment', $access)) {  
								?> 
								 <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approved_assessment") { ?>active<?php } ?>" href="<?= base_url(); ?>approved_assessment">Approved Assessment List</a></li> 
								<?php 
								 }  
								?> 
								<?php 
								 if (in_array('seperate_student_assessment', $access)) {  
								?> 
								 <!--<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "seperate_student_assessment") { ?>active<?php } ?>" href="<?= base_url(); ?>seperate_student_assessment">Blended Student</a></li> -->
								<?php 
								  }  
								?>
				



								<div class="nav-header mt-3">
									<strong>Form Assignment</strong>
								</div>
								<?php if (in_array('pending_assignment_list', $access)) { ?>
									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "pending_assignment_list") { ?>active<?php } ?>" href="<?= base_url(); ?>pending_assignment_list">Pending Assignment List</a></li>
								<?php  } ?>
								<?php if (in_array('rejected_assignment_list', $access)) { ?>
									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "rejected_assignment_list") { ?>active<?php } ?>" href="<?= base_url(); ?>rejected_assignment_list">Rejected Assignment List</a></li>
								<?php  } ?>
								<?php if (in_array('approved_assignment_list', $access)) { ?>
									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "approved_assignment_list") { ?>active<?php } ?>" href="<?= base_url(); ?>approved_assignment_list">Approved Assignment List</a></li>
								<?php  } ?>
								<div class="nav-header mt-3">
									<strong>Self Assessment</strong>
								</div>

								<?php if (in_array('admin_self_Assessment_pending_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_self_Assessment_pending_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_self_Assessment_pending_list">Student Self Assessment Pending List</a></li>

								<?php  } ?>

								<?php if (in_array('admin_self_Assessment_rejected_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_self_Assessment_rejected_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_self_Assessment_rejected_list">Student Self Assessment Reject List</a></li>

								<?php  } ?>

								<?php if (in_array('admin_self_Assessment_approved_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_self_Assessment_approved_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_self_Assessment_approved_list">Student Self Assessment Approved List</a></li>

								<?php  } ?>


								<div class="nav-header mt-3">
									<strong>Teacher Assessment</strong>
								</div>
								<?php if (in_array('admin_teacher_Assessment_pending_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_teacher_Assessment_pending_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_teacher_Assessment_pending_list">Student Teacher Assessment Pending List</a></li>

								<?php  } ?>

								<?php if (in_array('admin_teacher_Assessment_rejected_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_teacher_Assessment_rejected_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_teacher_Assessment_rejected_list">Student Teacher Assessment Reject List</a></li>

								<?php  } ?>

								<?php if (in_array('admin_teacher_Assessment_approved_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_teacher_Assessment_approved_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_teacher_Assessment_approved_list">Student Teacher Assessment Approved List</a></li>

								<?php  } ?>


								<div class="nav-header mt-3">
									<strong>Industry Assessment</strong>
								</div>
								<?php if (in_array('admin_industry_Assessment_pending_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_industry_Assessment_pending_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_industry_Assessment_pending_list">Student Industry Assessment Pending List</a></li>

								<?php } ?>

								<?php if (in_array('admin_industry_Assessment_rejected_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_industry_Assessment_rejected_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_industry_Assessment_rejected_list">Student Industry Assessment Reject List</a></li>

								<?php } ?>

								<?php if (in_array('admin_industry_Assessment_approved_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_industry_Assessment_approved_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_industry_Assessment_approved_list">Student Industry Assessment Approved List</a></li>

								<?php } ?>


								<div class="nav-header mt-3">
									<strong>Parent Assessment</strong>
								</div>
								<?php if (in_array('admin_parent_Assessment_pending_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_parent_Assessment_pending_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_parent_Assessment_pending_list">Student Parent Assessment Pending List</a></li>

								<?php } ?>

								<?php if (in_array('admin_parent_Assessment_rejected_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_parent_Assessment_rejected_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_parent_Assessment_rejected_list">Student Parent Assessment Reject List</a></li>

								<?php } ?>

								<?php if (in_array('admin_parent_Assessment_approved_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "admin_parent_Assessment_approved_list") { ?>active<?php } ?>" href="<?= base_url(); ?>admin_parent_Assessment_approved_list">Student Parent Assessment Approved List</a></li>

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>







				<?php if (in_array('document_verification_success', $access) || in_array('document_verification_pending', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi  mdi-checkbox-marked-circle-outline menu-icon "></i>

							<span class="menu-title">Document Verification</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">

								<?php if (in_array('document_verification_success', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "document_verification_success") { ?>active<?php } ?>" href="<?= base_url(); ?>document_verification_success">Document Verification List Success</a></li>

								<?php } ?>

								<?php if (in_array('document_verification_pending', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "document_verification_pending") { ?>active<?php } ?>" href="<?= base_url(); ?>document_verification_pending">Document Verification List Failed</a></li>

								<?php } ?>

								<?php if (in_array('offline_document_verification_add', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "offline_document_verification_add") { ?>active<?php } ?>" href="<?= base_url(); ?>offline_document_verification_add">Add Offline Document Verification</a></li>

								<?php } ?>

								<?php if (in_array('offline_document_verification_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "offline_document_verification_list") { ?>active<?php } ?>" href="<?= base_url(); ?>offline_document_verification_list">Offline Document Verification List </a></li>

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>



				<?php



				if (in_array('add_external_verification_user', $access) || in_array('external_verification_user', $access) || in_array('external_verification_student_list', $access) || in_array('external_verification_student_rejected_list', $access) || in_array('external_blended_verification_student_list', $access)  || in_array('external_blended_verification_student_rejected_list', $access)  || in_array('view_blended_verify_details', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi  mdi-checkbox-marked-circle-outline menu-icon "></i>

							<span class="menu-title">External Verification Team</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">

								<?php if (in_array('add_external_verification_user', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "add_external_verification_user") { ?>active<?php } ?>" href="<?= base_url(); ?>add_external_verification_user">Add User</a></li>

								<?php } ?>

								<?php if (in_array('external_verification_user', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "external_verification_user") { ?>active<?php } ?>" href="<?= base_url(); ?>external_verification_user">User List</a></li>

								<?php } ?>

								<?php if (in_array('external_verification_student_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "external_verification_student_list") { ?>active<?php } ?>" href="<?= base_url(); ?>external_verification_student_list">Verified Student List</a></li>

								<?php } ?>

								<?php if (in_array('external_verification_student_rejected_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "external_verification_student_rejected_list") { ?>active<?php } ?>" href="<?= base_url(); ?>external_verification_student_rejected_list">Rejected Student List</a></li>

								<?php } ?>

								<?php if (in_array('external_blended_verification_student_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "external_blended_verification_student_list") { ?>active<?php } ?>" href="<?= base_url(); ?>external_blended_verification_student_list">Blended Student List</a></li>

								<?php } ?>

								<?php if (in_array('external_blended_verification_student_rejected_list', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "external_blended_verification_student_rejected_list") { ?>active<?php } ?>" href="<?= base_url(); ?>external_blended_verification_student_rejected_list">Blended Rejected <br> Student List</a></li>

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>


				<?php if (in_array('blended_enrolled_student_missing_document_qualification', $access) || in_array('regular_student_missing_qualification_docs_pending', $access) || in_array('regular_enrolled_student_missing_document', $access) || in_array('regular_student_missing_document', $access) || in_array('blended_enrolled_student_missing_document', $access) || in_array('blended_student_missing_document', $access) || in_array('regular_student_missing_qualification_docs', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi mdi-account-plus menu-icon "></i>

							<span class="menu-title">Missing Documents</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">
							<ul class="submenu-item">
								<option disabled>Regular </option>
								<?php if (in_array('regular_enrolled_student_missing_document', $access)) { ?>
									<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>regular_enrolled_student_missing_document">Enrolled Student KYC Docs</a></li>
								<?php } ?>
								<?php if (in_array('regular_student_missing_qualification_docs', $access)) { ?>

									<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>regular_student_missing_qualification_docs">Enrolled Student Qualification docs</a></li>

								<?php } ?>

								<?php if (in_array('regular_student_missing_document', $access)) { ?>

									<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>regular_student_missing_document">Pending Student KYC Docs</a></li>

								<?php } ?>

								<?php if (in_array('regular_student_missing_qualification_docs_pending', $access)) { ?>

									<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>regular_student_missing_qualification_docs_pending">Pending Student Qualification docs</a></li>
								<?php } ?>

								<option disabled>Blended </option>

								<?php if (in_array('blended_enrolled_student_missing_document', $access)) { ?>

									<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>blended_enrolled_student_missing_document">Enrolled Student KYC Docs</a></li>

								<?php } ?>

								<?php if (in_array('blended_enrolled_student_missing_document_qualification', $access)) { ?>

									<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>blended_enrolled_student_missing_document_qualification">Enrolled Student Qualification Docs</a></li>

								<?php } ?>

								<?php if (in_array('blended_student_missing_document', $access)) { ?>

									<!--<li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>blended_student_missing_document">Pending Blended</a></li>-->

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>


				<?php if (in_array('erp_video_manual', $access)) { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url(); ?>erp_video_manual">
							<i class="mdi mdi-help-circle menu-icon"></i>
							<span class="menu-title">ERP Video Manual</span>
						</a>
					</li>
				<?php } ?>
				<?php if (in_array('send_custom_mail_via_erp', $access)) { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url(); ?>send_custom_mail_via_erp">
							<i class="mdi mdi-help-circle menu-icon"></i> 
							<span class="menu-title">Send Custom Mail</span>
						</a>
					</li>
				<?php } ?>


				<?php if (in_array('search_help_setup', $access)) { ?>

					<li class="nav-item">

						<a href="#" class="nav-link">

							<i class="mdi  mdi-help-circle menu-icon "></i>

							<span class="menu-title">Help Setup</span>

							<i class="menu-arrow"></i>

						</a>

						<div class="submenu">

							<ul class="submenu-item">

								<?php if (in_array('search_help_setup', $access)) { ?>

									<li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(1) == "search_help_setup") { ?>active<?php } ?>" href="<?= base_url(); ?>search_help_setup">Search Help Setup</a></li>

								<?php } ?>

							</ul>

						</div>

					</li>

				<?php } ?>
				
				
				<?php if(in_array('global_search',$access)){?> 
					<li class="nav-item"> 
						<a class="nav-link" href="<?=base_url();?>global_search"> 
							<i class="mdi mdi-account-plus menu-icon "></i>
							<span class="menu-title">Global Search</span> 
						</a> 
					</li>  
				<?php }?>
				

				</div>

				</ul>



		</div>

		</nav>

	</div>