<?php
$university_details = $this->Setting_model->get_university_details();
$title = "";
$keywords = "";
$description = "";
$page_name = $this->uri->segment(1);
if ($page_name == "") {
   $title = "Welcome to The Global University";
   $keywords = "";
   $description = "";
} else {
   $title = str_replace("-", " ", $this->uri->segment(1));
   $keywords = "";
   $description = "";
}
$marquee_new = $this->Web_model->get_marquee_news();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
   <?php if (!empty($meta_data)) {
   ?>
      <title><?= $meta_data->meta_title ?></title>

      <link rel="icon" href="<?= base_url(); ?>images/global_university_logo.png">
      <link rel="shortcut icon" href="images/global_university_logo.png" />

      <link rel="canonical" href="<?= current_url() ?>" />
      <meta name="author" content="The Global University">
      <meta name="keywords" content="<?= $meta_data->keyword ?>">
      <meta name="Description" content="<?= $meta_data->meta_description ?>">
   <?php } else { ?>
      <title>Global University</title>
   <?php } ?>
   <link rel="icon" href="<?= base_url(); ?>favicon.ico">
   <link rel="shortcut icon" href="<?= base_url(); ?>images/logo/<?php if (!empty($university_details) && $university_details->logo != "") { echo $university_details->logo;} else { echo "demologo.png";} ?>" />
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&display=swap" rel="stylesheet">
   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css">
   <link href="<?= base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
   <link href="<?= base_url(); ?>css/style.css" rel="stylesheet">
   <link href="<?= base_url(); ?>css/responsive.css" rel="stylesheet">
   <link href="<?= base_url(); ?>css/animate.min.css" rel="stylesheet">
   <link href="<?= base_url(); ?>css/TimeCircles.min.css" rel="stylesheet">
   <!-- <link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/croppie.css"> -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src='https://www.google.com/recaptcha/api.js'></script>
   <style>
      .global-tabs .learn-more {
         display: none;
      }
      
.popup-overlay_inquiry_open{	
	position: fixed;
    z-index: 9999;
    background-color: #00000052;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    height: 100%;
    width: 100%;
	/*display:none;*/
}

.close-overlay{	
    background: #00000085;
    float: right;
    border: 2px solid #ed7a04;
    width: 32px;
    height: 32px;
    text-align: center;
    border-radius: 50%;
    position: absolute;
    right: 0;
    top: -10px;
    color: #ff590a;
    line-height: 0;
    padding: 0;
    font-size: 35px;
    padding-bottom: 5px;
}
   </style>
</head>

<body>
   <section class="header-bg">
      <div class="container">
         <nav class="navbar navbar-default" role="navigation">

            <div class="col-md-12 upper-text">
               <div class="col-md-5">
                  <span class="helpline"> <i class="fa fa-phone-square" aria-hidden="true"></i>

                     <a href="tel:+917042550366"> Helpline Number : 7042550366</a> | (10 AM to 5 PM) </span>
                  <span class="caste"> <a href="<?= base_url(); ?>caste-based-discrimination">CBD/Grievances</a> </span>
               </div>
               <!--<div class="col-md-6">
                  <div class="noti_link hidden-sm hidden-md hidden-lg" id="demo">
                  <a href="<?= base_url(); ?>examination-form" title="Examination Form">
                     <div class="">
                        <div class="blink_noti size"><i class="fab fa-wpforms"></i> Examination Form</div>
                     </div>
                  </a>
               </div>-->
               <!--<div class="noti_link_view_result hidden-sm hidden-md hidden-lg" id="demo-second">
                  <a href="<?= base_url(); ?>result_view" title="View Result 2021">
                     <div class="">
                        <div class="blink_noti size"><i class="fa fa-eye" aria-hidden="true"></i> View Result 2021</div>
                     </div>
                  </a>
               </div> -->


               <div class="right-icons" style="float: right;">
                  <!-- <a title="student login" href="<?= base_url(); ?>student-login" target="_blank" class="center_login hidden-xs">
                     <i class="top-btns student" aria-hidden="true"></i> <img src="<?= base_url(); ?>images/icons/student2.png" width="18" height="18px">
                     <span class="hide_sm"> Student Login </span>
                  </a>
                  <span class="span-pipe">|</span> -->

                  <a title="Center Login" href="<?= base_url(); ?>center-access" target="_blank" class="center_login hidden-xs ">
                     <i class="top-btns" aria-hidden="true"></i>
                     <img src="<?= base_url(); ?>images/icons/center2.png" width="18" height="18px">
                     <span class="hide_sm"> CC Login</span>
                  </a>

                  <span class="span-pipe">|</span> <a title="Employee Login" href="<?= base_url(); ?>erp-access" target="_blank" class="center_login hidden-xs"><i class="top-btns" aria-hidden="true"></i> <img src="<?= base_url(); ?>images/icons/employee.png" width="18" height="18px"> <span> Employee </span> </a>

                  <!-- <span class="span-pipe">|</span>
   --> <!-- <a title="Faculty Login" href="<?= base_url(); ?>faculty_login" target="_blank" class="center_login hidden-xs">
                     <i class="top-btns" aria-hidden="true"></i>
                     <img src="<?= base_url(); ?>images/icons/faculty2.png" width="18" height="18px">
                     <span> Faculty Login </span>
                  </a>
                  <span class="span-pipe">|</span>
                  <a title="Pay Online" href="<?= base_url(); ?>direct_pay" target="_blank" class="center_login hidden-xs">
                     <i class="top-btns" aria-hidden="true"></i>
                     <img src="<?= base_url(); ?>images/icons/pay-online2.png" width="18" height="18px">
                     <span> Pay Online </span>
                  </a> -->
                  <div class="nav_bar" style="display:none"><i class="fa fa-bars" aria-hidden="true"></i></div>

               </div>

            </div>
      </div>
      </div>
      </div>
      </div>
      </nav>
      </div>
   </section>
   <section class="container">
      <div class="col-md-4">
         <div class="mt-0">
            <a href="<?= base_url(); ?>">
               <!-- <img class="logo" width="80" height="80" src="<?= base_url(); ?>images/logo/<?php if (!empty($university_details) && $university_details->logo != "") {
                                                                                                   echo $university_details->logo;
                                                                                                } else { ?>global_university_logo.png<?php } ?>"> -->
               <img class="logo" width="80" height="80" src="<?= base_url(); ?>images/logo/global_university_logo.png">
               <div class="logo_content">
                  <h4><?php if (!empty($university_details)) {
                           echo $university_details->university_name;
                        } ?></h4>
                  <p class="logo-text"><?php if (!empty($university_details)) {
                                          echo $university_details->slogan;
                                       } ?></p>
               </div>
            </a>
         </div>
      </div>
      <div class="col-md-8">
         <!--Start of menu-->
         <nav class="navbar navbar-default">
            <div class="container-fluid">
               <div class="row assignfixedwidth">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                     <div class="col-xs-3 col-sm-12">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                           <span class="sr-only">Toggle navigation</span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                        </button>
                     </div>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse main-nav" id="bs-example-navbar-collapse-1">
                     <ul class="nav navbar-nav navbar-right navbar-nav-custom">
                        <li><a class="active" href="<?= base_url() ?>#">Home</a></li>
                        <!--<li class="dropdown dd-main">
                           <a href="<?= base_url() ?>about-us" class="dropdown-toggle" data-toggle="dropdown">About<span class="caret"></span></a>
                           <ul class="dropdown-menu dropdown-menu-custom">

                              <li><a href="<?= base_url() ?>about-us"> About Us</a></li>
                              <li><a href="<?= base_url() ?>chairman-desk"> Chairman Desk</a></li>
                              <li><a href="<?= base_url() ?>chancellor-message"> Chancellor Message</a></li>
                              <li><a href="<?= base_url() ?>vice-chancellor-message"> Vice-Chancellor Message</a></li>
                              <li><a href="<?= base_url() ?>vision-and-mission"> Vision &amp; Mission</a></li>
                           </ul>
                        </li>-->

                       <li>
                           <!-- <a href="<?= base_url() ?>about-us">About Us</a> -->
                       
                           <a class="accordion-heading" data-toggle="collapse" data-target="#submenu15">
                              <span class="nav-header-primary"> About University <span class="pull-right"><b class="caret"></b></span></span>
                           </a>
                           <ul class="nav nav-list collapse" id="submenu15">

                              <li><a href="<?= base_url() ?>about-us">About Us</a></li>
                              <li><a href="<?= base_url() ?>chairman-message">Chairman Desk</a></li>
                              <li><a href="<?= base_url() ?>chancellor-message">Chancellor Desk</a></li>
                              <li><a href="<?= base_url() ?>pro-chancellor-message">Pro Chancellor Message</a></li>
                              <li><a href="<?= base_url() ?>vice-chancellor-message">Vice Chancellor Desk</a></li> 
                              <li><a href="<?= base_url() ?>registrar-message">Registrar Message</a></li>
                           </ul>
                           </li>


                        <li><a href="<?= base_url() ?>admission-procedure">Admissions</a></li>

                        <!-- <li class="dropdown dd-main">
                           <a href="<?= base_url() ?>about-us" class="dropdown-toggle" data-toggle="dropdown">Brochure<span class="caret"></span></a>
                           <ul class="dropdown-menu dropdown-menu-custom">

                              <li><a target="_blank" href="<?= base_url() ?>images/approvals/Prospectus.pdf">Prospectus</a></li>
                              <li><a target="_blank" href="<?= base_url() ?>images/approvals/BTU Law.pdf">LLB Prospectus</a></li>
                              <li><a target="_blank" href="<?= base_url() ?>images/approvals/D-Pharm-Brochure.pdf"> D.Pharm Brochure </a></li>

                           </ul>
                        </li> -->
                        <!-- <li><a href="news-events.html">News &amp; Events</a></li> -->
                        <li><a href="<?= base_url() ?>career">Career</a></li>
                       <!-- <li><a href="<?= base_url() ?>contact-us">Contact Us</a></li>-->
                        <li>
                           <a class="accordion-heading" data-toggle="collapse" data-target="#submenu7">
                              <span class="nav-header-primary"> Collaboration <span class="pull-right"><b class="caret"></b></span></span>
                           </a>
                           <ul class="nav nav-list collapse" id="submenu7">

                              <li><a href="<?= base_url() ?>collaboration-enquiry">Collaborations Enquiry</a></li>
                              <li><a href="<?= base_url() ?>collaboration-form">Collaborations Form</a></li>
                              <li><a href="<?= base_url() ?>collaboration-enquiry-foreign">Collaborations Foreign Enquiry</a></li>
                              <li><a href="<?= base_url() ?>collaboration-form-foreign">Collaborations Foreign Form</a></li>
                           </ul>
                        </li>
                        <li>
                           <a class="accordion-heading" data-toggle="collapse" data-target="#submenu2">
                              <span class="nav-header-primary"> Recognition <span class="pull-right"><b class="caret"></b></span></span>
                           </a>
                           <ul class="nav nav-list collapse" id="submenu2">
                              <!-- <li><a href="<?= base_url() ?>university-ugc">UGC Approvals</a></li> -->
                              <li><a href="<?= base_url() ?>university-approvals">University Gazette</a></li>
                              <li><a href="<?= base_url() ?>indian-council-of-agricultural-research-approval">Indian Council of Agricultural Research(ICAR)</a></li> 
                           </ul>
                        </li>
                        <li>
                           <a class="accordion-heading" data-toggle="collapse" data-target="#submenu8">
                              <span class="nav-header-primary"> Research <span class="pull-right"><b class="caret"></b></span></span>
                           </a>
                           <ul class="nav nav-list collapse" id="submenu8">
                              <li class="dropdown">
                                 <a class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Ph.D Performa
                                    <span class="caret"></span>
                                 </a>
                                 <ul class="dropdown-menu submenu_ul" id="a">
                                    <li>
                                       <a href="<?= base_url(); ?>phd_registration_form">Ph.D Entrance Form</a>
                                    </li>
                                    <li>
                                       <a href="<?= base_url(); ?>phd_exam_login">Entrance Examination Login</a>
                                    </li>
                                    <!-- <li>
                                    <a href="<?= base_url(); ?>documents/appendices.pdf">Ph.D. Appendices</a>
                                 </li>
                                 <li>
                                    <a href="<?= base_url(); ?>documents/Guidelines_for_thesis.pdf">Guidelines for Thesis</a>
                                 </li>
                                 <li>
                                    <a href="<?= base_url(); ?>documents/phd_rules_and_regulation.pdf">Ph.D. Rules and Regulations</a>
                                 </li> -->
                                 </ul>
                              </li>
                              <li class="dropdown">
                                 <a class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Ph.D Course Work
                                    <span class="caret"></span>
                                 </a>
                                 <ul class="dropdown-menu submenu_ul" id="a">
                                    <!-- <li>
                                    <a href="<?= base_url(); ?>uploads/syllabus/Coursework-Syllabus.pdf">Course Work Syllabus</a>
                                 </li> -->
                                    <li>
                                       <a href="<?= base_url(); ?>phd_course_work">Ph.D Course Work Form</a>
                                    </li>
                                    <li>
                                       <a href="<?= base_url(); ?>course_work_login">Course Work Examination Login</a>
                                    </li>

                                 </ul>
                              </li>
                              <li class="dropdown">
                                 <a class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Guide/Supervisors
                                    <span class="caret"></span>
                                 </a>
                                 <ul class="dropdown-menu submenu_ul" id="a">
                                    <li>
                                       <a href="<?= base_url(); ?>guide-application-form">Application For Guide/Supervisors</a>
                                    </li>
                                    <li>
                                       <a href="<?= base_url(); ?>appointment-letter-for-supervisors">Appointment Letter For Supervisors</a>
                                    </li>

                                 </ul>
                              </li>

                           </ul>
                        </li>
                     </ul>
                  </div>
                  <!-- end of navbar-collapse -->
               </div>
               <!-- end of row -->
            </div>
            <!-- end of container-fluid -->
         </nav>
      </div>
   </section>
   <!--<div id="menuToggle" type="button" class="container collapse navbar-collapse" data-toggle="modal" data-target="#myModal">

      <input type="checkbox" />
      <span></span>
      <span></span>
      <span></span>
   </div>-->


   </div>

   <div class="modal fade container-fluid inner-sidebar  desk-sidebar sidebar-inner" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="container">

         <div class="welcome">
            <h2> Welcome To Global University</h2>

            <div class="right-close" data-dismiss="modal">
               <img src="<?= base_url() ?>images/cancel.png" width="24" height="24">


            </div>
         </div>
         <!-- <hr> -->
         <nav id="column_left">
            <ul class="nav nav-list">

               <li>
                  <a class="accordion-heading" data-toggle="collapse" data-target="#submenu1">
                     <span class="nav-header-primary">About University <span class="pull-right"><b class="caret"></b></span></span>
                  </a>
                  <ul class="nav nav-list collapse" id="submenu1">
                     <li><a href="<?= base_url() ?>about-us">- About Us</a></li>
                     <li><a href="<?= base_url() ?>chairman-desk">- Chairman Desk</a></li>
                     <li><a href="<?= base_url() ?>chancellor-message">- Chancellor Message</a></li>
                     <li><a href="<?= base_url() ?>vice-chancellor-message">- Vice-Chancellor Message</a></li>
                     <li><a href="<?= base_url() ?>vision-and-mission">- Vision &amp; Mission</a></li>
                  </ul>
               </li>

               <li>
                  <a class="accordion-heading" data-toggle="collapse" data-target="#submenu2">
                     <span class="nav-header-primary">Courses <span class="pull-right"><b class="caret"></b></span></span>
                  </a>
                  <ul class="nav nav-list collapse" id="submenu2">

                     <li><a href="<?= base_url() ?>Faculty-of-Commerce-&amp;-Management">- Faculty of Commerce &amp; Management </a></li>
                     <li><a href="<?= base_url() ?>Faculty-of-Computer-Application">- Faculty of Computer Application </a></li>
                     <li><a href="<?= base_url() ?>Faculty-of-Engineering">- Faculty of Engineering </a></li>
                     <li><a href="<?= base_url() ?>Faculty-of-Humanities">- Faculty of Humanities </a></li>
                     <li><a href="<?= base_url() ?>Faculty-of-Management">- Faculty of Management </a></li>
                     <li><a href="<?= base_url() ?>Faculty-of-Pharmacy">- Faculty of Pharmacy </a></li>
                     <li><a href="<?= base_url() ?>Faculty-Of-School-Education">- Faculty Of School Education </a></li>
                     <li><a href="<?= base_url() ?>Faculty-of-Science">- Faculty of Science </a></li>

                  </ul>
               </li>

               <!--<li>
                  <a class="accordion-heading" data-toggle="collapse" data-target="#submenu3">
                     <span class="nav-header-primary">Admission <span class="pull-right"><b class="caret"></b></span></span>
                  </a>
                  <ul class="nav nav-list collapse" id="submenu3">

                     <li><a href="<?= base_url() ?>admission-procedure">- Admission Procedure </a></li>
                     <li><a href="<?= base_url() ?>admission-form">- Admission Form</a></li>
                     <li><a href="<?= base_url() ?>re-registration-form">- Re-registration Form</a></li>
                     <li><a href="<?= base_url() ?>syllabus-list">- Syllabus</a></li>

                  </ul>
               </li>-->


               <li>
                  <a class="accordion-heading" data-toggle="collapse" data-target="#submenu4">
                     <span class="nav-header-primary">Verification <span class="pull-right"><b class="caret"></b></span></span>
                  </a>
                  <ul class="nav nav-list collapse" id="submenu4">

                     <li><a href="<?= base_url() ?>enrollment-verification">- Enrollment Verification</a></li>
                     <li><a href="<?= base_url() ?>document-verification">- Document Verification</a></li>


                  </ul>
               </li>



               <li>
                  <a class="accordion-heading" data-toggle="collapse" data-target="#submenu5">
                     <span class="nav-header-primary">Examination <span class="pull-right"><b class="caret"></b></span></span>
                  </a>
                  <ul class="nav nav-list collapse" id="submenu5">
                     <!--<li><a href="<?= base_url() ?>examination-form">Examination Form</a></li>-->
                     <li><a href="<?= base_url() ?>hallticket">Download Hallticket</a></li>
                     <!--<li><a href="<?= base_url() ?>exam-login">Exam Login</a></li>-->
                     <li><a target="_blank" href="<?= base_url() ?>images/assessment/self-&amp;-parent-assessment-form.pdf">- Self Assessment &amp; Parent Assessment Form </a></li>
                     <li><a target="_blank" href="<?= base_url() ?>images/assessment/teacher-assessment-form.pdf">- Teacher Assessment Form</a></li>
                     <li><a href="<?= base_url() ?>result_view">View Results</a></li>

                  </ul>
               </li>


               <li>
                  <a class="accordion-heading" data-toggle="collapse" data-target="#submenu6">
                     <span class="nav-header-primary">Recognation <span class="pull-right"><b class="caret"></b></span></span>
                  </a>
                  <ul class="nav nav-list collapse" id="submenu6">
                     <li><a href="<?= base_url() ?>university-ugc">-UGC Approvals</a></li>
                     <li><a href="<?= base_url() ?>university-approvals">- University Gazette</a></li>
                     <li><a target="_blank" href="<?= base_url() ?>images/approvals/btu_approval_.pdf">- AICTE</a></li>
                     <li><a target="_blank" href="<?= base_url() ?>images/approvals/AIU-Letter.pdf">- AIU</a></li>
                     <li><a target="_blank" href="<?= base_url() ?>images/approvals/BCI-Approval-Letter.pdf">- BAR Council of India (BCI)</a></li>
                     <li><a target="_blank" href="<?= base_url() ?>images/approvals/Pharmacy-Council-of-India-Letter.pdf">- Pharmacy Council of India (PCI)</a></li>
                  </ul>
               </li>

               <li>
                  <a class="accordion-heading" data-toggle="collapse" data-target="#submenu7">
                     <span class="nav-header-primary"> Collaboration <span class="pull-right"><b class="caret"></b></span></span>
                  </a>
                  <ul class="nav nav-list collapse" id="submenu7">

                     <li><a href="<?= base_url() ?>collaboration-enquiry">- Online Form</a></li>
                     <li><a href="<?= base_url() ?>collaborations-with-apll">Collaborations Form</a></li>
                  </ul>
               </li>


               <li>
                  <a class="accordion-heading" data-toggle="collapse" data-target="#submenu9">
                     <span class="nav-header-primary">Research <span class="pull-right"><b class="caret"></b></span></span>
                  </a>
                  <ul class="nav nav-list collapse" id="submenu9">

                     <li>
                        <a class="accordion-heading" data-toggle="collapse" data-target="#level-3-submenu1">Ph.D Performa <span class="pull-right"><b class="caret"></b></span></a>
                        <ul class="nav nav-list collapse" id="level-3-submenu1">
                           <li><a href="<?= base_url() ?>phd_registration_form">- Ph.D Entrance Form</a></li>
                           <li><a href="<?= base_url() ?>phd_exam_login">- Entrance Examination Login</a></li>
                           <li><a href="<?= base_url() ?>documents/appendices.pdf" target="_blank">- Ph.D. Appendices</a></li>
                           <li><a href="<?= base_url() ?>documents/Guidelines_for_thesis.pdf" target="_blank">- Guidelines for Thesis</a></li>
                           <li><a href="<?= base_url() ?>documents/phd_rules_and_regulation.pdf" target="_blank">- Ph.D. Rules and Regulations</a></li>
                        </ul>
                     </li>


                     <li>
                        <a class="accordion-heading" data-toggle="collapse" data-target="#level-3-submenu2"> Ph.D Course Work <span class="pull-right"><b class="caret"></b></span></a>
                        <ul class="nav nav-list collapse" id="level-3-submenu2">

                           <li><a href="<?= base_url() ?>uploads/syllabus/Coursework-Syllabus.pdf" target="_blank">- Course Work Syllabus</a></li>
                           <li><a href="<?= base_url() ?>phd_course_work">- Ph.D Course Work Form</a></li>
                           <li><a href="<?= base_url() ?>course_work_login">- Course Work Examination Login</a></li>
                        </ul>
                     </li>


                     <li>
                        <a class="accordion-heading" data-toggle="collapse" data-target="#level-3-submenu3"> Guide/Supervisors <span class="pull-right"><b class="caret"></b></span></a>
                        <ul class="nav nav-list collapse" id="level-3-submenu3">
                           <li><a href="<?= base_url() ?>guide-application-form">- Application For Guide/Supervisors</a></li>
                           <li><a href="<?= base_url() ?>appointment-letter-for-supervisors">- Appointment Letter For Supervisors</a></li>
                        </ul>
                     </li>

                  </ul>
               </li>




               <li>
                  <a class="accordion-heading" href="<?= base_url() ?>e-libraries">
                     <span class="nav-header-primary"> E-Liabrary <span class="pull-right"></span></span>
                  </a>

               </li>

               <li>
                  <a class="accordion-heading" href="<?= base_url() ?>advertisement">
                     <span class="nav-header-primary"> Advertisement <span class="pull-right"></span></span>
                  </a>

               </li>


               <li>
                  <a class="accordion-heading" href="<?= base_url() ?>press-release">
                     <span class="nav-header-primary"> Press Release <span class="pull-right"></span></span>
                  </a>

               </li>


               <li>
                  <a class="accordion-heading" href="<?= base_url() ?>extension-activities">
                     <span class="nav-header-primary"> Extension Activities <span class="pull-right"></span></span>
                  </a>

               </li>



               <li>
                  <a class="accordion-heading" data-toggle="collapse" data-target="#submenu8">
                     <span class="nav-header-primary"> Brochure <span class="pull-right"><b class="caret"></b></span></span>
                  </a>
                  <ul class="nav nav-list collapse" id="submenu8">
                     <li><a target="_blank" href="<?= base_url() ?>images/approvals/Prospectus.pdf">- Prospectus</a></li>
                     <li><a target="_blank" href="<?= base_url() ?>images/approvals/BTU Law.pdf">- LLB Prospectus</a></li>
                     <li><a target="_blank" href="<?= base_url() ?>images/approvals/D-Pharm-Brochure.pdf">- D.Pharm Brochure </a></li>
                  </ul>
               </li>

               <li>
                  <a class="accordion-heading" href="<?= base_url() ?>contact-us">
                     <span class="nav-header-primary"> Contact Us <span class="pull-right"></span></span>
                  </a>
               </li>





            </ul>
         </nav>

      </div>
   </div>

   <!--End of menu-->
   <!--<div class="clearfix"></div>
   <div class="uni_news_media">
      <div class="uni_latest_marques">
         <marquee onmouseover="this.stop();" onmouseout="this.start();">
            <?php if (!empty($marquee_new)) {
               foreach ($marquee_new as $marquee_new_result) {
                  echo $marquee_new_result->news . " ";
                  if ($marquee_new_result->file != "") {
            ?>
                     <a href="<?= base_url(); ?>uploads/news/<?= $marquee_new_result->file ?>" target="_blank">View More</a>
            <?php }
               }
            } ?>
         </marquee>
      </div>
      <div class="clearfix"></div>
   </div>-->
   <div class="clearfix"></div>