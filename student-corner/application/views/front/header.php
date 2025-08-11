<?php 
$university_details = $this->Front_model->get_university_details();
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

$student = $this->Front_model->get_student_details();
// echo "<pre>";print_r($student);exit;
if(empty($student)){
    redirect(base_url());
}
if(!empty($student) && $student->identity_softcopy == "" || $student->id_number == ""){
	if($this->uri->segment(1) != "update_document"){
		//redirect('update_document');
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <meta name="author" content="">
      <title>Welcome to The Global University</title>
      <!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="assets/images/global_university_logo.png"> 
		<link href="<?=base_url();?>front_style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
		<link href="<?=base_url();?>front_style/vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet"> 
		<link href="<?=base_url();?>front_style/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css"> 
		<link href="<?=base_url();?>front_style/vendor/slick-master/slick/slick.css" rel="stylesheet" type="text/css"> 
		<link href="<?=base_url();?>front_style/vendor/lightgallery-master/dist/css/lightgallery.min.css" rel="stylesheet"> 
		<link href="<?=base_url();?>front_style/vendor/select2/css/select2-bootstrap.css" />
		<link href="<?=base_url();?>front_style/vendor/select2/css/select2.min.css" rel="stylesheet"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> 
		<link href="<?=base_url();?>front_style/css/style.css" rel="stylesheet">
		<link href="<?=base_url();?>front_style/css/responsive.css" rel="stylesheet"> 
		<!-- <link rel="stylesheet" href="<?=base_url();?>front_style/css/date-picker.min.css">  -->
		<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  -->

		<style>
			.form-control {
				background-color: #e9ecef00 !important;
				opacity: 1;
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
		.dropdown-user{
			display: flex;
			align-items: center;
			gap: 5px;
		}
		.dropdown-user-details-name{
			font-size: 16px;
		}
		</style>
	</head>
	<body>
	    <?php if($student->verified_status == "0"){?>
		<div class="overlay">
			<div class="overlay__inner">
				<div class="overlay__content"><span class="spinner"></span></div>
				<div class="loader_content">
					<h5>Dear <?=$student->student_name?>,Your admission is under review, Please wait.......</h5>
				</div>
			</div>
		</div>
		<?php }?>
		<nav class="navbar navbar-expand-lg navbar-light topbar static-top shadow-sm bg-white osahan-nav-top px-0">
			<div class="container">
				<a class="navbar-brand respn_logo" href="<?=base_url();?>">
					 <img src="<?=base_url();?>assets/images/global_university_logo.png" alt="">
				</a>  
				<ul class="navbar-nav align-items-center ml-auto respn_sp_btn"> 
               
			     <li class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications"> 
                  <!--<a href="tel:+91" class="contact_no">
                  <i class="fa fa-phone" aria-hidden="true"></i> 
                  </a>--> 
                  <a href="<?=base_url();?>my_results" class="offer-text ">
                     <span class="blink"> Results</span>
                  </a>
                 
                  <a href="<?=base_url();?>marksheets" class="book_free_demo">
                     <span class="blink"><?php if($student->course_id != "23"){?> Marksheet<?php }else{?>Course Work<?php }?></span>
                  </a>
               </li>
             
               <li class="nav-item dropdown no-arrow no-caret dropdown-user">
                  
                  <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  	<img class="dropdown-user-img" src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$student->photo)?>">
					
				  	<!-- <span class="nav-profile-name"><?php if (!empty($student)) { echo $student->student_name; } ?></span>	 -->
				 
				  <!-- <img class="img-fluid" src="<?=base_url();?>assets/images/global_university_logo.png"> -->
				</a>
				<div class="dropdown-user-details-name"><b><?php if(!empty($student)){ echo $student->student_name;}?></b></div>

                  <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                     <!-- <h6 class="dropdown-header d-flex align-items-center"> -->

                        <!-- <img class="dropdown-user-img" src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$student->photo)?>"> -->
                        <div class="dropdown-user-details">
                           <!-- <div class="dropdown-user-details-name"><b><?php if(!empty($student)){ echo $student->student_name;}?></b></div> -->
                           <div class="dropdown-user-details-email"></div>
                        </div>
                     </h6>
                     <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="<?=base_url('dashboard');?>">
                        <div class="dropdown-item-icon">
                          <i class="fa fa-tachometer" aria-hidden="true"></i>
                        </div>
                        Dashboard
                     </a>
					  
                     <a class="dropdown-item" href="<?=base_url('student-password');?>">
                        <div class="dropdown-item-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                              <circle cx="12" cy="12" r="3"></circle>
                              <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                           </svg>
                        </div>
                        Account Setting
                     </a>
                     <a class="dropdown-item" href="<?=base_url('student_logout');?>">
                        <div class="dropdown-item-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                              <polyline points="16 17 21 12 16 7"></polyline>
                              <line x1="21" y1="12" x2="9" y2="12"></line>
                           </svg>
                        </div>

                        Logout
                     </a>
                  </div>
               </li>
                    

            </ul>
         </div>
      </nav>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white osahan-nav-mid px-0 border-top shadow-sm sub_nav">
         <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars bar_layer" aria-hidden="true"></i>
            </button>
			
			<div class="collapse navbar-collapse menu_layer" id="navbarResponsive">
				
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url();?>dashboard">Dashboard</a>
					</li>
				
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url();?>e_library">E-Library</a>
					</li>

					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Print & Documents<i class="fa fa-chevron-down ml-1" ></i></a>
						<div class="dropdown-menu">
							
							<?php if($student->course_id == "24" || $student->course_id == "296"){?> 
							<!--<a class="dropdown-item" href="<?=base_url()?>undertaking_letter">Undertaking</a>-->
							<?php }?>
							<a class="dropdown-item" href="<?=base_url()?>admission_form">Admission Form</a>
							<a class="dropdown-item" href="<?=base_url()?>id_card">ID Card</a>
							<?php if($student->course_id == "23"){?>
							<a target="_blank" class="dropdown-item" href="<?=base_url()?>provisional_registration_letter">Provisional Registration Letter</a>
							<?php }?>
							<a class="dropdown-item" href="<?=base_url()?>student_qualification_details">Qualification Details</a>
							<?php if($student->course_id == "23"){?>
							<a class="dropdown-item" href="<?=base_url()?>scholar-extra-details">Scholar Extra Details</a>
							<?php }?>  
							<?php if ($student->show_collaborator_undertaking == 1) { ?>
								<?php 
								$collaborator_undertaking = $this->Digitalocean_model->get_photo('images/student_identity_softcopy/' . $student->ohter_files);
								?>
								<a class="dropdown-item" href="<?= $collaborator_undertaking ?>">View Collaborator Undertaking</a>
							<?php } ?>

							<?php if ($student->show_undertaking == 1) { ?>
								<?php 
								$undertaking = $this->Digitalocean_model->get_photo('images/permission_letter/' . $student->undertaking);
								?>
								<a class="dropdown-item" href="<?= $undertaking ?>">View Undertaking</a>
							<?php } ?>
						
							<!--<a class="dropdown-item" target="_blank" href="https://www.birtikendrajituniversity.ac.in/assesment-form">Self Assessment & Parent Assessment Form</a>
							<a class="dropdown-item" target="_blank" href="https://www.birtikendrajituniversity.ac.in/teacher-assessment-form">Teacher Assessment Form</a>
							<a class="dropdown-item" target="_blank" href="https://www.birtikendrajituniversity.ac.in/industry-assessment-form">Industry Assessment Form</a>
							-->
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Results & Assessment<i class="fa fa-chevron-down ml-1"></i></a>
						<div class="dropdown-menu">
							<?php if($student->course_id != "23"){?>
							<a class="dropdown-item" href="<?=base_url()?>my_results">Results</a>
							<?php }?>
							<a class="dropdown-item" href="<?=base_url()?>marksheets"><?php if($student->course_id != "23"){?> Marksheet<?php }else{?>Coursework Marksheet<?php }?></a>
							<a class="dropdown-item" href="<?=base_url()?>upload_assessment">Upload Assessment</a>
							<?php if($student->course_id != "23"){?>
							
							<!--
							<a class="dropdown-item" href="<?=base_url()?>student_self_Assessment_form">Self Assement</a>
							<a class="dropdown-item" href="<?=base_url()?>student_assignment_form">Assignment Form</a>
							<a class="dropdown-item" href="<?=base_url()?>student_teacher_Assessment_form">Teacher Assement Form</a>
							<a class="dropdown-item" href="<?=base_url()?>student_industry_Assessment_form">Industry Assement Form</a>
							<a class="dropdown-item" href="<?=base_url()?>student_parent_Assessment_form">Parent Assement Form</a>
							<a class="dropdown-item" href="<?=base_url()?>update_document">Upload Document</a>-->
							<?php }?>
							<?php if($student->course_id == "23"){?> 
							<a class="dropdown-item" href="<?=base_url()?>upload_progress_report">Progress Report</a>
							<a class="dropdown-item" href="<?=base_url()?>upload_synopsis">Synopsis Submission</a>
							<a class="dropdown-item" href="<?=base_url()?>print_synopsis" target="_blank">Synopsis Letter</a>
							<a class="dropdown-item" href="<?=base_url()?>upload_abstract_report">Abstract Report</a>
							<a class="dropdown-item" href="<?=base_url()?>upload_thesis">Thesis Submission</a>
							<?php }?>
						</div>
					</li>
					<?php if($student->course_id != "23"){?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Degree & Certificate<i class="fa fa-chevron-down ml-1"></i></a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?=base_url()?>student-provisional-degree">Provisional Degree</a>
							<?php if($student->course_id != "23"){?>
							<a class="dropdown-item" href="<?=base_url()?>student-degree">Degree</a>
							<?php }?>
							<a class="dropdown-item" href="<?=base_url()?>transfer-certificate">Transfer Certificate</a>
							<a class="dropdown-item" href="<?=base_url()?>transcript_application">Transcript Application</a>
							<a class="dropdown-item" href="<?=base_url()?>migration-certificate">Migration Certificate</a>
							<a class="dropdown-item" href="<?=base_url()?>student_consolidate_student_marksheet">Consolidate Student Marksheet</a>
							<a class="dropdown-item" href="<?=base_url()?>student_bonafide">Bonafide Certificate</a>
							<a class="dropdown-item" href="<?=base_url()?>bonafide_certificate_for_scholarship">Bonafide Certificate for Scholarship</a>
							<a class="dropdown-item" href="<?=base_url()?>letter-of-recommendation">Letter of Recommendation</a>
							<!--<a class="dropdown-item" href="<?=base_url()?>upload-letter-of-recommendation">Upload Letter of Recommendation</a>-->
							<a class="dropdown-item" href="<?=base_url()?>second-letter-of-recommendation">II Letter of Recommendation</a>
							<a class="dropdown-item" href="<?=base_url()?>student_medium_inst">Medium Of Instruction</a>
							<a class="dropdown-item" href="<?=base_url()?>student_no_backlog">No Backlog Summary</a>
							<a class="dropdown-item" href="<?=base_url()?>student_no_split">No Split Issue Letter</a>
							<?php if($student->center_id == "9" && $student->course_id == "20"){?>
							<a class="dropdown-item" href="<?=base_url()?>credit_transfer_certificate">Credit Transfer Certificate</a>
							<?php }?>
							<a class="dropdown-item" href="<?=base_url()?>student_character">Character Certificate</a>
						</div>
					</li>
					<?php }?>
				    <!--<li class="nav-item">
						<a class="nav-link" href="<?=base_url();?>my-online-study">Online Study</a>
					</li> -->
						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile Setting<i class="fa fa-chevron-down ml-1"></i></a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?=base_url()?>student-password">Setting</a>
							<a class="dropdown-item" href="<?=base_url()?>student_logout">Logout</a>
							
						</div>
					</li> 
					<?php  //if($student->center_id == "9"){?> 
					<!--<li class="nav-item"> 
						<a class="nav-link" href="<?=base_url();?>book_visit_appoinment">Book Appointment</a> 
					</li>-->
					<?php //}?>

               </ul>
            </div>
            <ul class="navbar-nav ml-auto">
        
               <li class="nav-item layer_disp_n">
                  <a href="<?=base_url('want_help');?>" class="want_help">
                  <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                  Want Help?
                  </a>
               </li>
           
            
            </ul>
         </div>
      </nav>
      <span class="loader"></span>