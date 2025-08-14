<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>Master Of Computer Applications (MCA) | Global University </title>
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
                            <div class="herotext_2">Admission Open For MCA 2022-23</div>
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
                                    <input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="Master Of Computer Applications">
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
            background: url("landing_assets/images/BTU/mca_bg1.jpg");
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
                    <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Master Of Computer Applications 
                    </span> <span class="edu_p_mob">MCA</span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Master Of Computer Applications (MCA)</h2>
                    
                        <div class="row d_P_main">
						     <div class="container info_group">
                                    <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_img">
                                            <img src="<?=base_url();?>landing_assets/images/Master of Computer Applications (mca)-1.png">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_info">
                                           <p>MCA Full Form is Master of Computer Application. MCA is a postgraduate course that trains students in the various aspects of computer programs, application software, computer architecture, operating systems, and many more. MCA Course duration is 2 years.</p>
                                           <p>The MCA confirmation will be finished based on legitimacy or placement test. The base MCA course qualification measures is a Bachelor's certificate in PC application-BCA, or in any connected field with math as a mandatory subject in Class 12. The top MCA schools in India like to concede understudies based on scores from selection tests.</p>      
                                   
                                   
                                  </div>
						     </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="why_mca">
                                <h3 class="course_heading">Why Study MCA Course?</h3>
                                 <p>MCA course is a two-year PG course designed for aspirants who want to excel in the world of technology. Master of Computer Applications is thriving with endless opportunities in both the public and private sectors.</p>
                                  <ul>
                                    <li>The MCA job sector is booming with 2,05,000 new job opportunities every year, and it has a steady growth of 7.7% every year.</li>
                                    <li>MCA course candidates have unlimited job opportunities in a variety of industries/sectors as well as job roles.</li>  
                                    <li>After completing the MCA course, candidates will get a quick placement with a minimum salary of a minimum INR 4 LPA.</li>
                                    <li>Promising MCA  course candidates can also expect to get hired by the world-best MNCs and IT companies such as Google, Microsoft, Amazon, etc., where they can expect a minimum salary of INR 13 LPA which will grow rapidly over time. </li>
                                
                                
                                </ul>



                                    
                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="who_mca">
                                        <h3 class="course_heading">Who Should Study MCA Course?</h3>
                                      <ul>
                                        <li>The Master of Computer Applications should be taken up by candidates who are interested in pursuing a career as a software developer. Most of the MCA graduates are involved in application and software development programs.</li>
                                        <li>The MCA course should be taken up by candidates who want to work in the IT industry.</li>  
                                        <li>Master of Computer Applications can be pursued by working professionals in distance mode who wish to enhance their job prospects and career growth.</li>
                                        <li>Master of Computer Applications is also taken up by candidates who wish to pursue a career as a UI Developer. </li>
                                       <li>Candidates who have completed their BCA program can take up the MCA course for better job roles</li>
                                       <li>Similarly, candidates from other relevant streams who want to change their careers can take up the Master of Computer Applications.</li>
                                    
                                    
                                    </ul>
                            </div>
                        </div>

                        <div class="container info_group">
                             <div class="eligi_mca">
                                    <h3 class="course_heading">MCA Eligibility</h3>
                                        <p>MCA Course Eligibility criteria are mentioned below:</p>
                                <ul>
                                    <li>Students must have graduated in computer applications, computer science, or related field with a minimum of 50% marks obtained at the UG level to be eligible for the MCA course.</li>   
                                    <li>Students must have mathematics as one of the subjects in Class 12 is compulsory.</li>   
                                    <p>This is just a basic overview of the eligibility criteria, it may be different in different colleges. </p>
                        
                        
                                </ul>
                         
                            </div>
                        </div>
                   
                      <div class="container info_group">
                        <div class="speci_mca">
                            <h3 class="course_heading">MCA Course Specializations</h3>
                           <ul>
                            <li>Systems Management</li>
                            <li>Management Information Systems (MIS)</li>
                            <li>Systems Development</li>
                            <li>Systems Engineering</li>
                            <li>Networking</li>
                            <li>Internet</li>
                            <li>Application Software</li>   
                           <li>Software Development</li>
                            <li>Troubleshooting</li>
                             <li>Hardware Technology</li>
                        </ul>
                        </div>
                      </div>

                        <div class="container info_group">
                            <div class="joab_mca">
                               <h3 class="course_heading">MCA Jobs</h3>   
                               <p>With the quick development in the IT and programming area, vocation opens doors for an MCA Graduate are supposed to work on before long. There are different Master of Computer Applications occupations accessible in high-level IT and consultancy firms. </p>
                               <p>MCA graduates can track down open doors in new businesses. The startup culture that has been moving in India, resembles a shelter for MCA Freshers. Aside from first-rate IT firms, more modest firms or new businesses likewise offer attractive compensations to tech individuals.</p>
                              <p>The typical beginning Master of Computer Applications pay is 2.5 to 3.6 LPA in a normal level IT Company. The fact of the matter is that these days there is a blast in IT enterprises, so in the wake of getting an MCA course degree there are heaps of professional potential open doors accessible in the ongoing situation, and Industry specialists feel that there are not many possibilities of relapse before very long.</p>
                              </div>
                        </div>

                      <div class="container info_group">
                        <div class="skill_mca">
                            <h3 class="course_heading">Skillset For MCA</h3> 
                          <table>
                            <tr>
                                <td>Good communication and behavioral skills</td>
                                <td>A positive attitude</td>
                            </tr>
                             <tr>
                                <td>Confidence</td>
                                <td>Strong technical skills</td>
                             </tr>
                             <tr>
                                <td>Good command over programming languages like C, C++, Java, .Net, etc.</td>
                                <td>Good programming skills and hands-on experience</td>
                             </tr>
                             <tr>
                                <td>Knowledge of data structure and database</td>
                               <td>Awareness of latest technology trends</td> 
                            </tr>


                          </table>    
                        
                        
                        </div>
                      </div> 
                    
                     

                     <div class="container info_group">
                        <div class="mca_qa">
                          <h3 class="course_heading">MCA FAQs</h3>
                          <p><u><b class="que">Question - </b></u>Is MCA a 2-years course?</p>
                          <p><u><b class="ans">Answer - </b></u>MCA course duration is of 3-years but as of February 12,2022, a notification has been released from the government stating that MCA will be a 2-year course from the next year. The All India Council of Technical Education (AICTE) worked with the University Grants Commission to reduce the tenure of the MCA courses.</p>

                          <p><u><b class="que">Question - </b></u>Is the MCA course equal to B.Tech?</p>
                          <p><u><b class="ans">Answer - </b></u>MCA course is generally equivalent to BTech but Mtech has more scope than the MCA course. It would be better if the student studying the MCA course remains in the academic field where his knowledge will be given more importance.</p>

                          <p><u><b class="que">Question - </b></u>What is the average salary of MCA graduates?</p>
                          <p><u><b class="ans">Answer - </b></u>The average salary of MCA graduates is around INR 4,00,000 to INR 6,50,000 per year.</p>

                          <p><u><b class="que">Question - </b></u> What are the MCA course subjects?</p>
                          <p><u><b class="ans">Answer - </b></u> The common subjects included in the MCA syllabus are Computer Organisation & Architecture, Operating Systems, and Systems Software, Data Structures using Computer Programming with Cooperation Research & Optimisation Techniques, Object Oriented Programming With Java, and more.</p>
                        
                          <p><u><b class="que">Question - </b></u>Is MCA a 2-years Course or a 3-Years Course?</p>
                          <p><u><b class="ans">Answer - </b></u>In the 545th Meeting of the University Grant Commission (UGC) held in December 2019, the duration of the MCA course has been reduced to 2 years from 3 years which is effective from the 2022-23 session.</p>
       
                        
                        </div>
                     </div>
                            
                             <div>
                                   <a href="<?=base_url()?>admission-form" target="_blank"><button class="course_applay" type="button">Apply Now</button></a>
                             </div>
                    
                    </div>
                </div>









            </section>
	
    </div>


<?php include('footer.php');?>
       