<?php 
	$profile = $this->Admin_model->get_profile();
	$university_details = $this->Setting_model->get_university_details();
	$access = $this->Setting_model->get_user_privilege_link();
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
		<link rel="shortcut icon" href="<?=base_url();?>images/logo/<?php if(!empty($university_details) && $university_details->logo != ""){ echo $university_details->logo;}else{ echo "demologo.png";}?>" />
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
							<ul class="navbar-nav navbar-nav-left">
								<li class="nav-item ml-0 mr-5 d-lg-flex d-none">
									<a href="#" class="nav-link horizontal-nav-left-menu"><i class="mdi mdi-format-list-bulleted"></i></a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
										<i class="mdi mdi-bell mx-0"></i>
										<span class="count bg-success">2</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
										<p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
										<a class="dropdown-item preview-item">
											<div class="preview-thumbnail">
												<div class="preview-icon bg-success">
													<i class="mdi mdi-information mx-0"></i>
												</div>
											</div>
											<div class="preview-item-content">
												<h6 class="preview-subject font-weight-normal">Application Error</h6>
												<p class="font-weight-light small-text mb-0 text-muted">
												  Just now
												</p>
											</div>
										</a>
										<a class="dropdown-item preview-item">
											<div class="preview-thumbnail">
												<div class="preview-icon bg-warning">
													<i class="mdi mdi-settings mx-0"></i>
												</div>
											</div>
											<div class="preview-item-content">
												<h6 class="preview-subject font-weight-normal">Settings</h6>
												<p class="font-weight-light small-text mb-0 text-muted">
													Private message
												</p>
											</div>
										</a>
										<a class="dropdown-item preview-item">
											<div class="preview-thumbnail">
												<div class="preview-icon bg-info">
													<i class="mdi mdi-account-box mx-0"></i>
												</div>
											</div>
											<div class="preview-item-content">
												<h6 class="preview-subject font-weight-normal">New user registration</h6>
												<p class="font-weight-light small-text mb-0 text-muted">
													2 days ago
												</p>
											</div>
										</a>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
										<i class="mdi mdi-email mx-0"></i>
										<span class="count bg-primary">4</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
										<p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
										<a class="dropdown-item preview-item">
											<div class="preview-thumbnail">
												<img src="images/faces/face4.jpg" alt="image" class="profile-pic">
											</div>
											<div class="preview-item-content flex-grow">
												<h6 class="preview-subject ellipsis font-weight-normal">David Grey</h6>
												<p class="font-weight-light small-text text-muted mb-0">
												The meeting is cancelled
												</p>
											</div>
										</a>
										<a class="dropdown-item preview-item">
											<div class="preview-thumbnail">
												<img src="images/faces/face2.jpg" alt="image" class="profile-pic">
											</div>
											<div class="preview-item-content flex-grow">
												<h6 class="preview-subject ellipsis font-weight-normal">Tim Cook</h6>
												<p class="font-weight-light small-text text-muted mb-0">New product launch</p>
											</div>
										</a>
										<a class="dropdown-item preview-item">
											<div class="preview-thumbnail">
												<img src="images/faces/face3.jpg" alt="image" class="profile-pic">
											</div>
											<div class="preview-item-content flex-grow">
											<h6 class="preview-subject ellipsis font-weight-normal"> Johnson</h6>
												<p class="font-weight-light small-text text-muted mb-0">Upcoming board meeting</p>
											</div>
										</a>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a href="#" class="nav-link count-indicator "><i class="mdi mdi-message-reply-text"></i></a>
								</li>
									
							</ul>
							<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
								<a class="navbar-brand brand-logo" href="<?=base_url();?>erp-dashboard"><img src="<?=base_url();?>images/logo/<?php if(!empty($university_details) && $university_details->logo != ""){ echo $university_details->logo;}else{ echo "demologo.png";}?>" alt="logo"/></a>
								<a class="navbar-brand brand-logo-mini" href="<?=base_url();?>erp-dashboard"><img src="<?=base_url();?>images/logo/<?php if(!empty($university_details) && $university_details->logo != ""){ echo $university_details->logo;}else{ echo "demologo.png";}?>" alt="logo"/></a>
							</div>
							<ul class="navbar-nav navbar-nav-right">
								<li class="nav-item dropdown  d-lg-flex d-none">
									<button type="button" class="btn btn-inverse-primary btn-sm">Shortcut </button>
								</li>
								<li class="nav-item dropdown d-lg-flex d-none">
									<a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-sm" id="nreportDropdown" href="#" data-toggle="dropdown">
										Links
									</a>
									<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="nreportDropdown">
										<p class="mb-0 font-weight-medium float-left dropdown-header">Direct Links</p>
										<a href="<?=base_url();?>employee_list" class="dropdown-item">
											<i class="mdi mdi-file-pdf text-primary"></i>Employees
										</a>
										<a href="<?=base_url();?>manage_session" class="dropdown-item">
											<i class="mdi mdi-file-excel text-primary"></i>Session 
										</a>
										<a href="<?=base_url();?>manage_faculty" class="dropdown-item">
											<i class="mdi mdi-file-excel text-primary"></i>Faculty
										</a>
										<a href="<?=base_url();?>manage_course" class="dropdown-item">
											<i class="mdi mdi-file-excel text-primary"></i>Courses
										</a>
										<a href="<?=base_url();?>manage_stream" class="dropdown-item">
											<i class="mdi mdi-file-excel text-primary"></i>Streams
										</a>
										<a href="<?=base_url();?>list_course_stream_relation" class="dropdown-item">
											<i class="mdi mdi-file-excel text-primary"></i>All Courses
										</a>
										<a href="<?=base_url();?>list_manage_fees" class="dropdown-item">
											<i class="mdi mdi-file-excel text-primary"></i>Fees
										</a>
									</div>
								</li>
								<li class="nav-item dropdown d-lg-flex d-none">
									<button type="button" class="btn btn-inverse-primary btn-sm">Shortcut</button>
								</li>
								<li class="nav-item nav-profile dropdown">
									<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
										<span class="nav-profile-name"><?php if(!empty($profile)){ echo $profile->first_name;}?></span>
										<span class="online-status"></span>
										<img src="<?=base_url();?>images/employee/<?php if(!empty($profile) && $profile->profile_pic !=""){ echo $profile->profile_pic; }else{?>default.jpg<?php }?>" alt="profile"/>
									</a>
									<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
										<a class="dropdown-item" href="<?=base_url();?>profile-setting">
											<i class="mdi mdi-settings text-primary"></i>Settings
										</a>
										<a class="dropdown-item" href="<?=base_url();?>erp-logout">
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
				<nav class="bottom-navbar">
					<div class="container custom_container">
						<ul class="nav page-navigation">
						 <?php if(in_array('erp-dashboard',$access)){?>
							<li class="nav-item">
								<a class="nav-link" href="<?=base_url();?>erp-dashboard">
									<i class="mdi mdi-file-document-box menu-icon mdi-spin"></i>
									<span class="menu-title">Dashboard</span>
								</a>
							</li>
						 <?php }?>
						 <?php if(in_array('website_setting',$access) || in_array('bank_management',$access) || in_array('id_management',$access) || in_array('designation_management',$access) || in_array('user_privilege',$access) || in_array('user_sub_privilege',$access) || in_array('employee_list',$access) || in_array('add_employee',$access) || in_array('assign_user_privilege',$access)){?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="mdi mdi-settings menu-icon mdi-spin"></i>
									<span class="menu-title">Setting</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="submenu">
									<ul>
										<?php if(in_array('website_setting',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>website_setting">Website Setting</a></li>
										<?php }?>
										<!--<li class="nav-item"><a class="nav-link" href="<?=base_url();?>password_setting">Password Setting</a></li>-->
										<?php if(in_array('bank_management',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>bank_management">Bank Management</a></li>
										<?php }?>
										<?php if(in_array('id_management',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>id_management">ID Management</a></li>
										<?php }?>
										<?php if(in_array('designation_management',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>designation_management">Designation Management</a></li>
										<?php }?>
										<?php if(in_array('user_privilege',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>user_privilege">Privilege Label</a></li>
										<?php }?>
										<?php if(in_array('user_sub_privilege',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>user_sub_privilege">Sub Privilege Label</a></li>
										<?php }?>
										<?php if(in_array('employee_list',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>employee_list">Employee List</a></li>
										<?php }?>
										<?php if(in_array('add_employee',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>add_employee">Add Employee</a></li>
										<?php }?>
										<?php if(in_array('assign_user_privilege',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>assign_user_privilege">Manage Employee Privilege</a></li>
										<?php }?>
										<?php if(in_array('job_applications',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>job_applications">Job Applications</a></li>
										<?php }?>
									</ul>
								</div>
							</li>
						 <?php }?>
						 <?php if(in_array('manage_session',$access) || in_array('manage_faculty',$access) || in_array('manage_course_type',$access) || in_array('manage_course',$access) || in_array('manage_stream',$access) || in_array('course_stream_relation',$access) || in_array('list_course_stream_relation',$access) || in_array('manage_fees',$access) || in_array('manage_subject',$access) || in_array('list_subject',$access)){?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="mdi mdi-cube-outline menu-icon mdi-spin"></i>
									<span class="menu-title">Courses</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="submenu">
									<ul>
										<?php if(in_array('manage_session',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_session">Manage Session</a></li>
										<?php }?>
										<?php if(in_array('manage_faculty',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_faculty">Manage Faculty</a></li>
										<?php }?>
										<?php if(in_array('manage_course_type',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_course_type">Manage Course Type</a></li>
										<?php }?>
										<?php if(in_array('manage_course',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_course">Manage Course</a></li>
										<?php }?>
										<?php if(in_array('manage_stream',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_stream">Manage Stream</a></li>
										<?php }?>
										<?php if(in_array('course_stream_relation',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>course_stream_relation">Add Course Stream Relation</a></li>
										<?php }?>
										<?php if(in_array('list_course_stream_relation',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>list_course_stream_relation">List Course Stream Relation</a></li>
										<?php }?>
										<?php if(in_array('manage_fees',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_fees">Add Fees</a></li>
										<?php }?>
										<?php if(in_array('list_manage_fees',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>list_manage_fees">Fees List</a></li>
										<?php }?>
										<?php if(in_array('lateral_manage_fees',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>lateral_manage_fees">lateral Entry Fees</a></li>
										<?php }?>
										<?php if(in_array('manage_subject',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_subject">Add Subject</a></li>
										<?php }?>
										<?php if(in_array('list_subject',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>list_subject">Subject List</a></li>
										<?php }?>
									</ul>
								</div>
							</li>
						 <?php }?>
						 <?php if(in_array('manage_center_enquiry',$access) || in_array('manage_center',$access) || in_array('list_manage_center',$access) || in_array('pending_center',$access) || in_array('pending_center_subject',$access)){?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="mdi mdi-account menu-icon mdi-spin"></i>
									<span class="menu-title">Center</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="submenu">
									<ul>
										<?php if(in_array('manage_center_enquiry',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_center_enquiry">New Enquiry</a></li>
										<?php }?>
										<?php if(in_array('manage_center',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_center">Add New Center</a></li>
										<?php }?>
										<?php if(in_array('list_manage_center',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>list_manage_center">Active Center List</a></li>
										<?php }?>
										<?php if(in_array('pending_center',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>pending_center">Pending Center's</a></li>
										<?php }?>
										<?php if(in_array('pending_center_subject',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>pending_center_subject">Pending Center's Subject</a></li>
										<?php }?>
									</ul>
								</div>
							</li>
						 <?php }?>
						 <?php if(in_array('otp_lead',$access) || in_array('enquiry_list',$access) || in_array('new_pending_student',$access) || in_array('admission_list',$access)){?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="mdi mdi-account-multiple menu-icon mdi-spin"></i>
									<span class="menu-title">Students</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="submenu">
									<ul>
										<?php if(in_array('otp_lead',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>otp_lead">OTP Lead List</a></li>
										<?php }?>
										<?php if(in_array('enquiry_list',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>enquiry_list">Enquiry List</a></li>
										<?php }?>
										<?php if(in_array('new_pending_student',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>new_pending_student">New Pending Admission</a></li>
										<?php }?>
										<?php if(in_array('new_admission',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>new_admission">Pending for Documents & Approvals</a></li>
										<?php }?>
										<?php if(in_array('today_admission',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>today_admission">Today Admissions</a></li>
										<?php }?>
										<?php if(in_array('admission_list',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>admission_list">All Admissions</a></li>
										<?php }?>
										<?php if(in_array('student_feedback_list',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>student_feedback_list">Student Feedback</a></li>
										<?php }?>
										
									</ul>
								</div>
							</li>
						 <?php }?>
						 <?php if(in_array('examination_list',$access)){?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="mdi mdi-account-multiple menu-icon mdi-spin"></i>
									<span class="menu-title">Examination</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="submenu">
									<ul>
										<?php if(in_array('today_assignment_list',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>today_assignment_list">Today Assignment List</a></li>
										<?php }?>
										<?php if(in_array('all_assignment_list',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>all_assignment_list">All Assignment List</a></li>
										<?php }?>
										<?php if(in_array('mcq_report',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>mcq_report">MCQ Report</a></li>
										<?php }?>
										<?php if(in_array('theoretical_question_data',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>theoretical_question_data">Theoretical Question Data</a></li>
										<?php }?>
										<?php if(in_array('mcq_question_data',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>mcq_question_data">MCQ Question Data</a></li>
										<?php }?>
										<?php if(in_array('add_examination',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>add_examination">Add Exam</a></li>
										<?php }?>
										<?php if(in_array('examination_list',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>examination_list">Exam List</a></li>
										<?php }?>
										<?php if(in_array('examination_form_list',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>examination_form_list">Examination form List Success</a></li>
										<?php }?>
										<?php if(in_array('examination_form_list_failed',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>examination_form_list_failed">Examination form List Failed</a></li>
										<?php }?>
										<?php if(in_array('appeared_examination_list',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>appeared_examination_list">Appeared Exam List</a></li>
										<?php }?>
										<?php if(in_array('manage_admin_result',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_admin_result">Manage Result</a></li>
										<?php }?>
										<?php if(in_array('search_admin_result',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>search_admin_result">Search Result</a></li>
										<?php }?>
										<?php if(in_array('search_admin_result',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>search_marksheet">Search Marksheet</a></li>
										<?php }?>
									</ul>
								</div>
							</li>
						 <?php }?>
						 <?php if(in_array('examination',$access)){?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="mdi mdi-book-multiple menu-icon mdi-spin"></i>
									<span class="menu-title">Degree</span>
									<i class="menu-arrow"></i>
								</a>
							</li>
						 <?php }?>
						 <?php if(in_array('guide_application_list',$access) || in_array('successfull_phd_registration',$access) || in_array('failed_phd_registration',$access) || in_array('create_tests',$access) || in_array('phd_exams_student',$access)) {?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="mdi mdi-flask-outline menu-icon mdi-spin"></i>
									<span class="menu-title">Research</span>
									<i class="menu-arrow"></i>
								</a>
								
								<div class="submenu">
									<ul class="submenu-item">
										<?php if(in_array('guide_application_list',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>guide_application_list">Guide Applications</a></li>
										<?php }?>
										<?php if(in_array('successfull_phd_registration',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>successfull_phd_registration">Successfull Ph.D Registrations</a></li>
										<?php }?>
										<?php if(in_array('failed_phd_registration',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>failed_phd_registration">Failed Ph.D Registrations</a></li>
										<?php }?>
										<?php if(in_array('create_tests',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>create_tests">Create Ph.D Examination</a></li>
										<?php }?>
										<?php if(in_array('phd_exams_student',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>phd_exams_student">Appeared Examination</a></li>
										<?php }?>
									</ul>
								</div>
							</li>
						 <?php }?>
						 
						 
						 <?php if(in_array('add_staff_faculty',$access) || in_array('staff_faculty',$access) || in_array('today_staff_faculty',$access) || in_array('all_staff_faculty',$access)){?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="mdi mdi-flask-outline menu-icon mdi-spin"></i>
									<span class="menu-title">Faculty</span>
									<i class="menu-arrow"></i>
								</a>
								
								<div class="submenu">
									<ul class="submenu-item">
										<?php if(in_array('bulk_attendance_list',$access)){?>
										<!--<li class="nav-item"><a class="nav-link" href="<?=base_url();?>bulk_attendance_list">Student Attendance List</a></li>-->
										<?php }?>
										<?php if(in_array('admin_staff_attendance',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>admin_staff_attendance">Staff Attendance</a></li>
										<?php }?>
										<?php if(in_array('add_staff_faculty',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>add_staff_faculty">Add Staff Faculty</a></li>
										<?php }?>
										<?php if(in_array('staff_faculty',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>staff_faculty">Staff Faculty</a></li>
										<?php }?>
										<?php if(in_array('staff_faculty',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>left_staff_faculty">Left Staff Faculty</a></li>
										<?php }?>
										<?php if(in_array('today_staff_faculty',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>today_staff_faculty">Today Report</a></li>
										<?php }?>
										<?php if(in_array('all_staff_faculty',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>all_staff_faculty">All Report</a></li>
										<?php }?> 
										<?php if(in_array('waiting_list_for_report',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>waiting_list_for_report">Waiting List for Report</a></li>
										<?php }?> 
										<?php if(in_array('admin_view_register',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>admin_view_register">All Register's</a></li>
										<?php }?> 
										<?php if(in_array('feedback_list',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>feedback_list">Feedback</a></li>
										<?php }?> 
										 
									</ul>
								</div>
							</li>
						 <?php }?>
						 
						 
						 <?php if(in_array('manage_head',$access) || in_array('upload_documents',$access)){?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="mdi mdi-folder-multiple menu-icon mdi-spin"></i>
									<span class="menu-title">Documentation</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="submenu">
									<ul class="submenu-item">
										<?php if(in_array('manage_head',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_head">Manage Head</a></li>
										<?php }?>
										<?php if(in_array('upload_documents',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>upload_documents">Upload documents</a></li>
										<?php }?>
									</ul>
								</div>
							</li>
						 <?php }?>
						 <?php if(in_array('marquee_news',$access) || in_array('manage_news',$access) || in_array('manage_conference',$access)){?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="mdi mdi mdi-newspaper menu-icon mdi-spin"></i>
									<span class="menu-title">News/Conference</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="submenu">
									<ul class="submenu-item">
										<?php if(in_array('marquee_news',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>marquee_news">Manage Marquee News</a></li>
										<?php }?>
										<?php if(in_array('manage_news',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_news">Manage News</a></li>
										<?php }?>
										<?php if(in_array('manage_conference',$access)){?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url();?>manage_conference">Manage Conference</a></li>
										<?php }?>
									</ul>
								</div>
							</li>
						 <?php }?>
						</ul>
					</div>
				</nav>
			</div>