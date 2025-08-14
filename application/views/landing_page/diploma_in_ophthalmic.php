<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>Diploma In Ophthalmic Assistant ( DOA )| Global University </title>
    <link rel="canonical" href="<?=base_url()?>university-courses" />
    <meta name="author" content="GLOBAL UNIVERSITY">
    <meta name="keywords" content="">
    <meta name="Description" content="Admissions open now atTHE GLOBAL UNIVERSITY, we offer B Tech courses, Engineering | Course Admissions | Top university in Manipur India">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?=base_url()?>favicon.ico">
    <link rel="shortcut icon" href="<?=base_url()?>images/logo/5946920e9234e40ca915a088283a8e5c.png" />
    <link href="<?=base_url()?>landing_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>landing_assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?=base_url()?>landing_assets/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>favicon.ico">

    <link rel="shortcut icon" href="<?=base_url()?>images/logo/5946920e9234e40ca915a088283a8e5c.png" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
       body{
        
       }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172017165-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-172017165-1');
    </script>

    <!-- Global site tag (gtag.js) - Google Ads: 595335465 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-595335465"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-595335465');
    </script>



</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg_p1 shadow mob_bg">
        <div class="container">
            <a class="navbar-brand" href="<?=base_url()?>"> <img src="<?=base_url()?>landing_assets/logo/btu_new.png" class="logo">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
        <div class="hamburger-toggle">
          <div class="hamburger">
<img src="<?=base_url()?>landing_assets/images/menu-button-of-three-horizontal-lines.png" width="16" height="16">
          </div>
        </div>
      </button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <h1 class="heading_1">BIR TIKENDRAJIT UNIVERSITY<br><span class="heading_inner_text">Complete Learning Management Solution Process</span> </h1>

                <form class="d-flex ms-auto">
                    <div class="input-group">

                        <a class="hreftext" href="mailto:info@theglobaluniversity.edu.in"> <i class="fa fa-envelope" style="font-size:18px"></i> info@theglobaluniversity.edu.in</a>
                        <!-- <input class="form-control border-0 mr-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary border-0" type="submit">Search</button> -->
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <section class="home_banner">
        <div class="container-fluid overlay">
            <div class="container">
                <div class="row ">

                    <div class="col-lg-8">
                        <div class="hero_content">
                            <h2 class="herotext">Welcome To <br>THE GLOBAL UNIVERSITY</h2>
                            <div class="herotext_2">Admission Open For DOA 2022-23</div>
                        </div>


                    </div>
                    <div class="col-lg-4">

                        <div class="enquir_form">

                            <form method="post" name="course_form" id="course_form">
                                <div class="form-group">
                                    <input type="text" class="form-control input_lbl" name="name" id="name" placeholder="Full Name*">
                                </div>
                                <div class="clearfix" style="margin-bottom: 5px;"></div>
                                <div class="form-group">
                                    <input type="text" class="form-control input_lbl" name="email" id="email" placeholder="Email*">
                                </div>
                                <div class="clearfix" style="margin-bottom: 5px;"></div>
                                <div class="form-group">
                                    <input type="text" class="form-control input_lbl" name="mobile" id="mobile" placeholder="Mobile*">
                                </div>
                                <div class="clearfix" style="margin-bottom: 5px;"></div>
                                <div class="row">
                                    <div class="form-group col-md-6"> 
                                        <select name="state" id="state" class="form-control select-arrow-cust widget_input">
											<option value="">State*</option>
											<?php if(!empty($state)){ foreach($state as $state_result){?>
											<option value="<?=$state_result->name?>"><?=$state_result->name?></option>
											<?php }}?>
										</select>
                                    </div> 
                                    <div class="form-group col-md-6"> 
                                        <select name="city" id="city" class="form-control select-arrow-cust widget_input">
											<option value="">City*</option>
										</select>
                                    </div> 
                                </div> 
                                <div class="clearfix" style="margin-bottom: 5px;"></div>
                                <div class="form-group">
                                    <input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="Diploma In Ophthalmic Assistant">
                                    <!--<select name="course" id="course" class="form-control select-arrow-cust widget_input">
										<option value="">Select Course*</option>
										<option value="Certifiction Course">Certifiction Course</option>
										<option value="Diploma Course">Diploma Course</option>
										<option value="Bachelor of Arts">Bachelor of Arts</option>
										<option value="Bachelor of Science">Bachelor of Science</option>
										<option value="Bachelor of Commerce">Bachelor of Commerce</option>
										<option value="Bachelor of Business Administration">Bachelor of Business Administration</option>
										<option value="Bachelor of Pharmacy">Bachelor of Pharmacy</option>
										<option value="Bachelor of Computer Application">Bachelor of Computer Application</option>
										<option value="Bachelor of Technology">Bachelor of Technology (B.Tech)</option>
										<option value="BSC AIRCRAFT MAINTENANCE ENGINEERING ">BSC AIRCRAFT MAINTENANCE ENGINEERING </option>
										<option value="Bachelor of Law (LLb)">Bachelor of Law (LLb)</option>
										<option value="Bachelor of fine arts">Bachelor of fine arts</option>
										<option value="Master of Arts">Master of Arts</option>
										<option value="Master of Science">Master of Science</option>
										<option value="Master of Commerce">Master of Commerce</option>
										<option value="Master of Business Administration">Master of Business Administration</option>
										<option value="Post Graduate Diploma">Post Graduate Diploma</option>
										<option value="Master in Pharmacy">Master in Pharmacy</option>
										<option value="Bachelor of Technology">Bachelor of Technology</option>
										<option value="Master of Technology">Master of Technology</option>
										<option value="Master of Education">Master of Education</option>
										<option value="Master of Law">Master of Law</option>
										<option value="Master of Computer Application">Master of Computer Application</option>
									</select>-->
                                    <!--
                                    <select name="course_type" id="course_type" class="form-control select-arrow-cust widget_input"> 
										<option value="">Program Level*</option>
																				<option value="Certificate">Certificate</option>
																				<option value="Diploma">Diploma</option>
																				<option value="Under graduate Course">Under graduate Course</option>
																				<option value="Post Graduate Course">Post Graduate Course</option>
																				<option value="PG Diploma">PG Diploma</option>
																				<option value="Research">Research</option>
																				<option value="Doctorate">Doctorate</option>
																			</select>-->
                                </div>
                                <div class="clearfix" style="margin-bottom: 5px;"></div>
                                <!--<div class="row"> 
                                    <div class="form-group col-md-6"> 
                                        <select name="course" id="course" class="form-control select-arrow-cust widget_input">
											<option value="">Course *</option>
										</select>
                                    </div> 
                                    <div class="form-group col-md-6"> 
                                        <select name="stream" id="stream"  class="form-control select-arrow-cust widget_input">
											<option value="">Stream *</option>
										</select>
                                    </div>
                                </div>-->
                                <div class="clearfix" style="margin-bottom: 5px;"></div>
                                <div class="checkbox">
                                    <label><input type="hidden" name="Agree" value="0">
										<input type="checkbox" class="chkbox_size" checked="checked" name="agree" value="1" id="agree" class="widget_input">
										<span class="agree-condition">I agree to receive information regarding my submitted application.</span>
									</label>
                                </div>


                                <div class="form-group" style="text-align: center;">
                                    <button class="submit_btn" type="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>
    <section class="hero_tabs">

        <div class="container">
            <center>

                <div class="row mx-auto">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="tabs">
                            <img src="<?=base_url()?>landing_assets/images/1.png" class="three_img">
                            <p>Accorded Institution Of Eminence By UGC, AICTE Govt. of India</p>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="tabs">
                            <img src="<?=base_url()?>landing_assets/images/2.png" class="three_img">
                            <p>No.1 Private University In India By Education World Ranking 2022</p>
                        </div>


                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="tabs">
                            <img src="<?=base_url()?>landing_assets/images/3.png" class="three_img">
                            <p>A Legacy Of The Field Of Higher Education</p>
                        </div>

                    </div>
                    <hr class="tabs_hr">

                </div>
            </center>
        </div>
    </section>

     <style>
.home_banner {
            min-height: 450px !important;
            background: url("landing_assets/images/BTU/young_girl_eyes_consult.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .call-icon {
            position: fixed;
            bottom: 57px;
            float: left;
            z-index: 1000;
        }



.d_pharm_img{
    float: right;
}

.d_pharm_img img{
   
    margin-left: 25px;
}
.course_heading1{color: #3a29a4;
}



.info_heding{
    color: #e67b29;
}





.why_d table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 15px;
}

.step_f{
    font-size:15px;
}



.pharm_skill{
    margin-top:100px;
}

.pharm_skill_ul,li{
       width:50%
       float:left;
}


.skilimg{
    height: 200px;
    width:400px
}
     </style>
 


    <div class="container info_group_main">
            <div class="edu_tabs" style="text-align:center">
                <a class="active showSingle" target="1">
                <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Diploma In Ophthalmic Assistant     
                </span> <span class="edu_p_mob">DOA</span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Diploma In Ophthalmic Assistant (DOA)  </h2>
                    
                        <div class="row horti_main">
						     <div class="container info_group">
                             <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_info">
                                            <p class="capitalize">A certificate in Ophthalmic Assistant is a twelfth-level Ophthalmology Medical course. An ophthalmic partner is an individual who works with an ophthalmologist (eye specialist) to give care to the patients. He performs a wide range of eye-related clinical capabilities. Ophthalmic colleagues assist ophthalmologists with really focusing on patients by taking accounts, carrying out different techniques and tests, and planning patients to see the specialist.</p>
                                        </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_img">
                                            <img src="<?=base_url();?>landing_assets/images/ophthalmic_technician.jpg">
                                    </div>
                                    
						     </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="what_ophtha">
                                <h3 class="course_heading">What Is Diploma In Ophthalmic Assistant Course? </h3>
                               <p class="capitalize">Certificate in Ophthalmic Technology otherwise called DOT Is a two-year confirmation course intended to create, prepare and qualify experts who help the ophthalmologist analyze and treat patients. After the finishing of the DOT course understudy will have a strong groundwork in eye care essentials and can fill in as will actually want to productively carry out the different ophthalmic methods.</p>
                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="detil_ophtha">
                                        <h3 class="course_heading">DIPLOMA IN OPHTHALMIC ASSISTANT: BASIC DETAILS</h3>
                                       <p class="capitalize">It is a Diploma endorsement program. Subsequent to finishing the DOA course, fruitful competitors will get an endorsement of fulfillment from an important guaranteeing authority/college/organization.</p>
                                        <p class="capitalize">This preparation program takes care of the requirements of the united medical services area. This program trains understudies and transforms them into talented ophthalmic specialists/collaborators. This calling goes under the unified medical services area. So, this is a paramedical schooling program.</p>
                                       <p class="capitalize">It is an ideal Diploma testament program for twelfth-pass understudies. As the name proposes, this program spins around ophthalmic innovation and its partnered regions.
                                          What's really going on with ophthalmology, you might inquire. Ophthalmology is a part of medication and medical procedure that arranges the conclusion and therapy of eye problems and conditions.</p>
                                        <p class="capitalize">An Ophthalmologist is an expert in the area of ophthalmology. Keep in mind, Ophthalmologists are gifted and qualified Doctors who have spent significant time in the area of ophthalmology (through MS, MD, or PG Diploma programs in the wake of finishing MBBS). What's more, the DOA course won't assist you with acquiring the title of Doctor or Ophthalmologist!</p>
                               </div>
                        </div>

                        <div class="container info_group">
                        <div class="eligi_ophtha">
                            <h3 class="course_heading">Diploma In Ophthalmic Assistant Course Eligibility</h3>
                              <p class="capitalize">Applicants ought to have passed 10+2 with half checks total in Physics, Chemistry and Biology is the necessity.</p>
                        </div>
                        </div>
                   
                      <div class="container info_group">
                        <div class="sutible_ophtha">
                            <h3 class="course_heading">Diploma In Ophthalmic Assistant Course Suitability</h3>
                           <p class="capitalize">The course is proper for people who love to help people. Up-and-comers who have an interest in and appreciate science can take the plunge.</p>
                           <p class="capitalize">Competitors who have excellent critical thinking abilities are additionally fitting for this course.</p>
                        
                        </div>
                      </div>

                        <div class="container info_group">
                            <div class="benifit_ophtha">
                            <h3 class="course_heading">How Is A Diploma In Ophthalmic Assistant Course Beneficial?</h3>   
                           <p class="capitalize">Ophthalmic Assistants appreciate working in an expert climate with gifted and committed doctors and specialists.</p>
                            <p class="capitalize">Its significant advantage is for working guardians, who are chasing after advanced education, and so on; in light of the fact that most ophthalmic practices recruit both full-and temporary jobs and permit a massive level of adaptability in work plans.
                                Ophthalmic colleagues appreciate many open positions overall in view of their particular abilities. They are usually situated in emergency clinics, centers, college research offices, and confidential practices.
                            </p>
                        </div>
                        </div>

                      <div class="container info_group">
                        <div class="addmi_poces_ophtha">
                        <h3 class="course_heading">Diploma In Ophthalmic Assistant Admission Process</h3> 
                         <p class="capitalize">The admission process for a diploma in ophthalmic assistant varies from institute to institute. The institutes are known to conduct direct admission processes And When it comes to merit-based admission processes, relevant entrance exams are conducted to facilitate the admission process.</p>
                         <h3 class="course_heading">Direct Admission</h3>
                         <p><span class="course_heading step_f">Step 1 – </span>In the first step, students need to register themselves as the new applicant.</p>
                         <p><span class="course_heading step_f">Step 2 – </span> In the second step, students need to fill the application form as per given instructions.</p>
                         <p><span class="course_heading step_f">Step 3 – </span> In this students need to provide their current or working email id and contact details for verification.</p>
                         <p><span class="course_heading step_f">Step 4 – </span>Students need to submit the asked documents in the given format.</p>
                         <p><span class="course_heading step_f">Step 5 – </span>Pay the application fee through net banking for further process.</p>
                         <p><span class="course_heading step_f">Step 6 – </span>Submit the application form.</p>
                        
                        </div>
                      </div> 
                           
                        <div class="container info_group">
                            <div class="employe_ophtha">
                               <h3 class="course_heading">Diploma In Ophthalmic Assistant Employment Areas</h3>
                                              <ul>
                                                <li>Content Writing (Medical)</li>
                                                <li>Medical Colleges & Universities</li>
                                                <li>Military Health Services</li>
                                                <li>Nursing Homes</li>
                                                <li>Pharma Companies</li>
                                                <li>Research Labs</li>
                                                <li>Self-Run-Clinics</li>
                                             </ul>
                               </div>
                            </div>

                            <div class="container info_group">
                            <div class="assis_ophtha">
                               <h3 class="course_heading">Diploma In Ophthalmic Assistant Job Types</h3>
                                              <ul>
                                                <li>Assistant Sales Manager</li>
                                                <li>Medical Receptionist</li>
                                                <li>Military Health Services</li>
                                                <li>Ophthalmic Assistant</li>
                                                <li>Ophthalmic Consultant</li>
                                                <li>Ophthalmic Nursing Assistant</li>
                                               
                                             </ul>
                               </div>
                            </div>
                            <div>
                                   <a href="<?=base_url()?>admission-form" target="_blank" > <button class="course_applay" type="button">Apply Now</button></a>
                             </div>

                    </div>
                </div>



            </section>
	
    </div>


<?php include('footer.php');?>