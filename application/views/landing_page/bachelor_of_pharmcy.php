<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>Bachelor Of Pharmacy(B.Pharm) | GLOBAL University </title>
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
                            <div class="herotext_2">Admission Open For B.Pharm 2022-23</div>
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
                                    <input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value=" Bachelor Of Pharmacy">
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
                            <p>Accorded Institution Of Eminence By UGC, AICTE Govt. Of India</p>
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
            background: url("landing_assets/images/BTU/b_pharm.jpg");
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
    width: 1000px;
margin-left: -500px;
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



.pharm_skill{
    margin-top:100px;
}

.skill_b_ul ,li{
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
                <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Bachelor Of Pharmacy
                </span> <span class="edu_p_mob">B.Pharm</span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Bachelor Of Pharmacy(B.Pharm)</h2>
                    
                        <div class="row d_P_main">
						     <div class="container info_group">
                                    <div class="col-lg-6 col-md-12 col-sm-12 d_pharm_img">
                                            <img src="<?=base_url();?>landing_assets/images/b_pharm_main.jpg">
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-12 col-sm-12 d_pharm_info">
                                            <p>    A diploma in Pharmacy is a 2-year-long career-oriented, diploma course. Students who wish to pursue a long-term career in the medical field of pharmaceutical sciences, and start a career in the pharmaceutical industry, can take admitted to the D Pharma course. 
                                            D Pharmacy syllabus is designed to prepare candidates to work under the supervision of a licensed pharmacist in hospitals, community pharmacies, and other pharmaceutical-related fields. Candidates can also pursue MBA in Pharmaceutical Management after this course, though they would need to complete their undergraduate degree first.
                                            </p>
                                    </div> -->
						     </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="about_b">
                                <h3 class="course_heading">About Bachelor Of Pharmacy (B.Pharm)</h3>
                                <p class="capitalize">B.Pharma's full structure is Bachelor of Pharmacy, It is a four-year term undergrad program in the field of drug store which is viewed as essential for the act of drug specialist or physicist.</p>
                                <p class="capitalize">The Pharmacy field offers heaps of professional open doors (Career choices after B.Pharm and D.Pharmacy). In the event that you wish to create your transporter in the field of the drug store, you can pick one of the few courses. It could be a certificate, degree, or PG course. A single man of Pharmacy (B. Pharmacy) is a college degree course in the field of Pharmacy.</p>
                                <p class="capitalize">The B.Pharm is one of the well-known work arranged courses among science understudies after class 12th. In this course, the understudies concentrate on medications and drugs, Pharmaceutical Engineering, Medicinal Chemistry, and so on. This course gives a huge number of open positions in both the general population and confidential areas.</p>
                                <p class="capitalize">The course assists understudies with getting to know the creation and assembling of medications and their conveyance the nation over. Different choices open whenever understudies have finished the B.Pharmacy course, for example, that of Pharmacist, Drug Inspector, Drug Counselor, Pharmaceutical Scientist, Quality Control Associate, Clinical Research Associate, and Medical author. The drug business is a consistently developing industry, where there is generally an extent of development and improvement.</p>

                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="key_points_b">
                                        <h3 class="course_heading">Bachelor Of Pharmacy (B.Pharm) Key Points</h3>
                                        <p>A Bachelor of Pharmacy Course makes you ready to enter the Pharmacy area in the Medical and Health Care Industry. One who seeks this certification concentrates on center subjects including Pharmaceuticals, Pharmacology, Pharmaceutical Chemistry, and Pharmacognosy. A single man of Pharmacy (B.Pharma) is a college degree program in the field of Pharmacy. B.Pharmacy schedule - including medical care and biochemical science.</p>
                                       <p>The Pharmacy Courses are supported by the All India Council of Technical Education (AICTE) and Pharmacy Council of India (PCI).</p>
                                       <p>As per law, Universities do not require AICTE approval. Only institutions which are affiliated with Universities require approval. AsTHE GLOBAL UNIVERSITY is a Self-Financed University established by a State Act, it does not require AICTE approval.</p>        
                         
                           </div>
                        </div>

                        <div class="container info_group">
                        <div class="eligi_b">
                            <h3 class="course_heading">Bachelor Of Pharmacy (B.Pharm) Eligibility Criteria</h3>
                              <p>The base qualification standard that practically every one of the schools requests is that the up-and-comers applying for B.Pharmacy need to pass 10+2 with at least half total imprints in Physics, Chemistry, and Biology or Math from CBSE or comparable board.
A few schools likewise acknowledge understudies who have concentrated on biotechnology or life sciences rather than science or math in 10+2.</p>
                            <p>Public level and state level selection tests are likewise led to actually take a look at understudies' inclination and capacity.</p>
                           <p>Nonetheless, the affirmation standards change from one school to another. Some take affirmation totally founded on merit though others take understudies in view of entry scores and stamps got in their 10+2.</p>
                        
                        </div>
                        </div>
                   
                      <div class="container info_group">
                        <div class="who_b">
                            <h3 class="course_heading">Who Should Pursue Bachelor Of Pharmacy (B.Pharm)?</h3>
                           
                           <ul class="pharma_list">
                            <li>Students who want to make a career in the Pharmaceutical Industry should pursue a B.Pharmacy</li>
                            <li>Students who want to make a career in clinical research and scientific writing should opt for B.Pharmacy.</li>
                            <li>Students who want to join the healthcare industry and work at various hospitals, nursing homes, etc can pursue B.Pharmacy</li>
                            <li>B.Pharmacy can also be pursued by students who want to make a career in the pharmaceutical industry abroad, by studying courses in B.Pharmacy Abroad.</li>
                           </ul>
                        </div>
                      </div>

                        <div class="container info_group">
                            <div class="jobs_b">
                            <h3 class="course_heading">Bachelor Of Pharmacy (B.Pharm) Jobs</h3>   
                            <p class="capitalize">As already discussed, after the successful completion of the B. Pharmacy course, one can opt for a wide range of choices to pursue their career. B. Pharmacy degrees also give the opportunity to work for both Government and Private sector organizations.</p>
                            <p class="capitalize">The average salary post the completion of this course ranges from INR 4 - 6 LPA.</p>
                            
                            </div>
                        </div>

                      <div class="container info_group">
                        <div class="scope_b">
                        <h3 class="course_heading">Bachelor Of Pharmacy (B.Pharm) Scope</h3> 
                         <p class="capitalize">After completion of B.Pharmacy courses, one can choose to study further, like M.Pharmacy,D.Pharm, and others. However, the majority of the students prefer joining the party ideology once they complete their degree.</p>
                         <p class="capitalize">The pharmacy sector offers lots of opportunities to the students after the completion of the course. The students can work in a Pharmaceutical company or can practice as a Pharmacist. There is a huge number of opportunities available for students in both public and the private sector like government hospitals, private medical shops & private hospitals/clinics. You can also start your own consultancies & medical shop.</p>
                         <p class="capitalize">With knowledge of pharmacy, you can also work with the Indian Army. The army recruits B.Pharmacy graduate candidates with proper physical ability. Army Medical Corps or Soldier Phrma and Sepoy pharma are some of the positions that students can apply for.
                               The students can work in a Pharmaceutical company or can practice as a Pharmacist. In a Pharmaceutical Company, you can work in departments such as quality control, manufacturing, packing marketing, production, etc.</p>

                       
                        </div>
                      </div> 
                    
                     <div class="container info_group">
                        <div class="skill_b">
                             <h3 class="course_heading">Required Skill Set For Bachelor of Pharmacy (B.Pharm)</h3>
                             <p class="capitalize">In order to understand their concept and maximize their learning experience individuals interested in enrolling in the B.Pharma course must process a number of skill tests. These skills are also required for a successful career and good experience in the field of pharmacy. During their time in the program, participants can increase their skills and knowledge. </p>
                              <p class="capitalize">Below is the list of the most important skills required:-</p>
                            
                            <ul class="skill_b_ul" >
                                <li>Communication Skills And Interpersonal Skills.</li>
                                <li>Medicinal and Scientific Research Skills. </li>
                                <li>Curiosity And Persuasive Skills.</li>
                                <li>Business Skills Like Marketing, And Organizing. </li>
                                <li>Science Wizard And Technical Skills.</li>
                                <li>Sharp Memory And Wicked Knowledge.</li>
                                <li>Therapeutic And Counseling Skills.</li>
                                <li>Medical Writing And Ethics.</li>
                                <li>Determinant And Consistency skills. </li>
                                <li>Adaptation Ability To A Dynamic Situation.</li>
                            </ul>

                            </div>
                     </div>    
                    
                     

                     <div class="container info_group">
                        <div class="b_qa">
                          <h3 class="course_heading">FAQs Bachelor Of Pharmacy (B.Pharm)</h3>
                          <p><u><b class="que">Question - </b></u>Is B.Pharmacy a good course? </p>
                          <p><u><b class="ans">Answer - </b></u>It is a very good course and is job oriented. It provides diverse job opportunities in both Government and Private sectors.</p>

                          <p><u><b class="que">Question - </b></u>Is Biology compulsory for B.Pharmacy?</p>
                          <p><u><b class="ans">Answer - </b></u>Yes, Biology is compulsory. You have to score 40% in class 12th with mandatory subjects like Physics, Chemistry, and Biology.</p>

                          <p><u><b class="que">Question - </b></u>Is NEET necessary for B.Pharmacy?</p>
                          <p><u><b class="ans">Answer - </b></u>No, different colleges have their own entrance exams, and some of the common entrance exams are MET, BITSAT, UPSEE, and PU CET.
                            Note - BTU doesn't take any entrance exam for this course.</p>

                          <p><u><b class="que">Question - </b></u> What are the jobs after B.Pharmacy?</p>
                          <p><u><b class="ans">Answer - </b></u> Some of the jobs post completion of B.Pharmacy are Medical Writers, Drug Inspectors, Clinical associates, Marketing/Sales Executives, etc.</p>
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