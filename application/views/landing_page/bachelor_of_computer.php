<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>Bachelor Of Computer Applications (BCA) | Birtikendrajit University </title>
    <link rel="canonical" href="<?=base_url()?>university-courses" />
    <meta name="author" content="BIR TIKENDRAJIT UNIVERSITY">
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
                            <div class="herotext_2">Admission Open For BCA 2022-23</div>
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
                                    <input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="Bachelor Of Computer Applications">
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
                            <p>A Legacy Of the field Of Higher Education</p>
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
            background: url("landing_assets/images/BTU/bca_bg1.jpg");
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
   
    margin-left: 20px;
margin-bottom: 20px;
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





.pharma_list li{
    width:33%;
    float:right;
    list-style: none;
}

.pharma_list li:before {
    content: '>> ';
}

.pharm_skill{
    margin-top:100px;
}

.pharm_skill_ul,li{
       width:50%
       float:left;
}


.skilimg {
    height: 200px;
    width:400px
}
     </style>
 


    <div class="container info_group_main">
            <div class="edu_tabs" style="text-align:center">
                <a class="active showSingle" target="1">
                    <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Bachelor Of Computer Applications  
                    </span> <span class="edu_p_mob">BCA</span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Bachelor Of Computer Applications (BCA)</h2>
                    
                        <div class="row d_P_main">
						     <div class="container info_group">
                                    <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_img">
                                            <img src="<?=base_url();?>landing_assets/images/BCA (Bachelor of Computer Applications)-1.png">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_info">
                                         <p>The complete form of BCA is Bachelor in Computer Application. BCA is a 3-years undergraduate degree program that focuses on knowledge of the basics of computer application and software development. A BCA degree is considered at par with a BTech/BE degree in Computer Science or Information Technology. The degree helps interested students set up a sound academic base for an advanced career in Computer Applications. The course of BCA includes database management systems, operating systems, software engineering, web technology, and languages such as C, C++, HTML, Java, etc.</p>
                                   
                                  </div>
						     </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="eligi_bca">
                                <h3 class="course_heading">Eligibility For BCA Course</h3>
                                <p>To pursue a BCA program, one need not have Physics, Chemistry, and Maths as compulsory subjects in Class 12. In fact, candidates who have pursued Arts or Commerce in class XII can also join the course. </p> 
                                
                                <ul>
                                <li>Aspirants must have passed Class 12 from any stream with English as a subject with a minimum of 45 to 55 percent marks in aggregate (the pass percentage might vary from college to college).</li>
                                <li>While some colleges/universities admit aspirants on a merit basis, others admit students on the basis of personal interviews and written examinations.</li>
                                
                                </ul>
                                <p><b>Note - </b> The eligibility criteria might differ from college to college.</p>  


                                    
                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="specil_bca">
                                        <h3 class="course_heading">BCA Specializations</h3>
                                      <p>Some popular BCA specializations available for admission  are</p>
                                        <ul>
                                       <li>Internet Technologies</li>
                                       <li>Animation</li>
                                       <li>Network Systems</li>
                                      <li>Programming Languages (C++, JAVA, etc.)</li>
                                      <li>Systems Analysis</li>
                                      <li>Music And Video Processing</li>
                                      <li>Management Information System (MIS)</li>
                                      <li>Accounting Application</li>  


                                    </ul>
                            </div>
                        </div>

                        <div class="container info_group">
                             <div class="benifit_bca">
                                    <h3 class="course_heading">BCA Course Benefits</h3>
                                  <ul>
                                    <li>Unlike BTech courses, it focuses on the study of computers for three years which will help me gain skills and knowledge to make a career in computer-related fields.</li>
                                    <li>BCA course offers multiple job opportunities in the field of IT and computers.</li>
                                    <li>Both the public and private sectors are known to recruit graduates of BCA courses.</li>
                                    <li>BCA is mostly a software-oriented course, with no or little stress on the hardware. Thus it demands no physical effort and allows you to have a stress-free work environment.</li>  
                                    <li>Students have the options of studying BCA in various specializations like BCA Computer Science, BCA Data Science, etc</li>
                                
                                </ul>
                            </div>
                        </div>
                   
                      <div class="container info_group">
                        <div class="job_bca">
                            <h3 class="course_heading">BCA Top Companies & Jobs</h3>
                           <p>In the ever-growing, IT industry, the demand for BCA graduates is increasing rapidly. With a BCA degree, candidates can find lucrative job opportunities in the private as well as public sectors.</p>
                           <p>Some of the leading IT companies recruiting BCA graduates include Oracle, IBM, Infosys, and Wipro. Government organizations like the Indian Air Force(IAF), the Indian Army, and the Indian Navy hire a large number of computer professionals for their IT departments.</p>
                           <p>Some of the job profiles that one can bag after completing a BCA program is that of a:</p>

                        <ul>
                            <li>System Engineer</li>
                            <li>Software Tester</li>
                            <li>Junior Programmer</li>
                            <li>Web Developer</li>
                            <li>System Administrator</li>
                            <li>Software Developer</li>
                        </ul>
                        </div>
                      </div>

                        <div class="container info_group">
                            <div class="scope_bca">
                               <h3 class="course_heading">Scope Of BCA</h3>   
                               <p>BCA is considered a job-oriented course, there is plenty of job offers that aspirants can get after completing their undergraduate course. After completing a graduate degree in computer applications, students can also opt for higher studies by pursuing Masters's in Computer Applications or pursuing an MBA program. A postgraduate program or postgraduate diploma program in computer applications provides specialization in different fields such as ethical hacking, system security, cloud computing, and software application. There are many job opportunities for Bachelor of Computer Applications graduates in the sectors like IT, web designing, digital marketing, banking, logistics, data communications, desktop publishing, E-Commerce, consultancies, system maintenance, and cloud networking.</p>
                              <p>There are many certification programs offered by various institutions. One can pursue a Cisco Certified Network Professional (CCNP) certificate program for Network administrators and Network Operations Specialists. BCA graduates can start freelancing or build up their own startups.</p>

                            </div>
                        </div>

                     
                     <div class="container info_group">
                        <div class="bca_qa">
                          <h3 class="course_heading">FAQs BCA</h3>
                          <p><u><b class="que">Question - </b></u>What is a BCA course?</p>
                          <p><u><b class="ans">Answer - </b></u>BCA or Bachelor of Computer Applications is an undergraduate course that will build the knowledge of the students regarding computer language. By completing this three-year course, the students will be able to build their careers in Information Technology and Computer Applications field.</p>

                          <p><u><b class="que">Question - </b></u>I have finished my 10+2 with the Arts stream. Am I eligible for BCA?</p>
                          <p><u><b class="ans">Answer - </b></u>Yes. Candidates of any stream from a recognized institute will be eligible for BCA admissions. English is a compulsory subject that will be required for admission by many institutes.</p>

                          <p><u><b class="que">Question - </b></u> What is the scope of BCA?</p>
                          <p><u><b class="ans">Answer - </b></u>Due to the ever-growing requirement for technology, the demand for BCA graduates is increasing rapidly. After graduation, BCA students can opt to work for leading IT companies or Government organizations.</p>

                          <p><u><b class="que">Question - </b></u>Can I apply for BCA without Maths?</p>
                          <p><u><b class="ans">Answer - </b></u>Yes. Students without Maths will be eligible for BCA admissions.</p>
                        
                          <p><u><b class="que">Question - </b></u>Are BCA and B.Tech equal?</p>
                          <p><u><b class="ans">Answer - </b></u>While BCA is the study of computer applications, BTech in Computer Science Engineering focuses on training the students about computer engineering and hardware. Both courses are good programs to choose from and depend on the interest of the students and their career goals.</p>
                           
                          <p><u><b class="que">Question - </b></u>What options are there after BCA?</p>
                          <p><u><b class="ans">Answer - </b></u>After graduation, BCA students can either opt to start their career in the IT industry or pursue higher education by opting for MCA, MBA, MSc, and more.</p>
                       

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
