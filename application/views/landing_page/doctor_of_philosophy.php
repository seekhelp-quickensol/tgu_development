<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>Doctor Of Philosophy(Ph.D.)  | Global University </title>
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
                            <div class="herotext_2">Admission Open For Ph.D 2022-23</div>
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
                                    <input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="Doctor Of Philosophy">
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
            background: url("landing_assets/images/BTU/P_Hd_bg.jpg");
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
    width: 450px;

height: 300px;
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
                <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Doctor Of Philosophy   
                </span> <span class="edu_p_mob">Ph.D.</span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Doctor Of Philosophy(Ph.D.)</h2>
                    
                        <div class="row horti_main">
						     <div class="container info_group">
                                    <div class="col-lg-6 col-md-12 col-sm-12 d_pharm_img">
                                            <img src="<?=base_url();?>landing_assets/images/Phd_hed_1.png">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 d_pharm_info">
                                      <p>Ph.D. is a doctoral degree with an academic focus. A Ph.D. course is usually of three years duration and candidates need to complete the course within a maximum time span of five to six years. However, the course duration may vary from one institute to the other. Aspirants need to possess a master’s degree to be eligible to pursue a Ph.D. program.</p>      
                                       <p>Candidates can pursue a Ph.D. program in any stream. In a Ph.D. course, aspirants need to select a topic or a subject and do in-depth research on it and answer any queries related to the topic/ subject.</p>
                                    <p>Earlier, candidates could pursue the Ph.D. courses through the distance mode, however, as per a circular issued by UGC in 2017 it has been informed that a Ph.D. course pursued through the distance education mode would no longer be recognized.</p>
                                   </div>
						     </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="elgi_phd">
                                <h3 class="course_heading">Eligibility Criteria For Ph.D.</h3>
                                <p>The admission procedure for Ph.D. courses requires a master's degree from a recognized University. Students should have secured a minimum of 45-50% in their exams post, which they are required to qualify for any one of the national/state level entrance exams to get admitted for</p>
                                <p>Ph.D.Students should prepare their research proposal as they will have to send it to the college of their choice for the application process. The Ph.D. eligibility criteria depend on the college, and the course students are interested in applying for.</p>
                            
                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="why_phd">
                                        <h3 class="course_heading">Why Study  Ph.D.?</h3>
                                        <ul>
                                            <li>Ph.D. help the students to start or continue their research in a field they are passionate about.</li>
                                             <li>It helps in improving employment prospects. It can unlock many career opportunities. If someone wants to become a lecturer or University researcher then a Ph.D. degree is usually the main requirement.</li>
                                            <li>The Indian government has reduced the tax incentive for firms conducting R&D, which is consistent with the finding of the previous UNESCO Science Report (2015).</li>
                                            <li>The Gross expenditure on R&D (GERD) in the country has been consistently increasing over the years and has nearly tripled from INR. 39,437.77 crore in 2007- 08 to INR. 1,13,825.03 crore in 2017-18. It is estimated to be INR 1,23,847.70 crore in 2018-19.</li>
                                           <li>Academic researchers contribute the bulk of all scientific and technical articles published in India.</li>
                                          <li>Higher Education Institutions and Research and Development organizations play an important role in nation-building.</li>
                                          <li>Investment in R&D by foreign multinationals is on the rise, accounting for as much as 16% of private-sector investment in R&D in 2019.</li>
                                           <li>There is an encouraging increase in scientific publications by Indian researchers on cutting-edge technologies.</li>

                                        </ul>
                             </div>
                        </div>

                        <div class="container info_group">
                        <div class="skil_phd">
                            <h3 class="course_heading">Required Skillset For Ph.D.</h3>
                            <p>Any aspirant who wants to pursue a Ph.D. in the subject/ field of their choice needs to have a lot of interest and passion for the topic at hand. A Ph.D. requires aspirants to study a topic in-depth and so candidates need to possess the required skill-set and dedication along with being extremely hard working when pursuing a Ph.D. Apart from these skills, candidates should be good at performing research and collaborating on the findings of research conducted by them.</p>  
                            <p>A Ph.D. also requires aspirants to be quick and good at presenting their thoughts and findings and so it is a requirement that candidates be well-versed with written communication and have good writing capacity.</p>
                            <b>Some key skills that an aspirant should possess while pursuing a Ph.D. are listed below</b>
                            <table>
                                <tr>
                                    <td>Inquisitive</td>
                                    <td>Good at research</td>
                                </tr>
                                <tr>
                                    <td>Dedicated</td>
                                    <td>Hard-working</td>
                                </tr>
                                <tr>
                                    <td>Good writing capacity</td>
                                    <td>Organised</td>
                                </tr>
                                <tr>
                                    <td>Self-motivated</td>
                                    <td>Keen observer</td>
                                </tr>

                                








                            </table>
     










                        </div>
                        </div>
                   
                      <div class="container info_group">
                        <div class="elgi_phd">
                            <h3 class="course_heading">Eligibility Criteria For Ph.D.</h3>
                           <p>Aspirants are eligible to pursue a Ph.D. course only if they have completed their master’s degree in a similar course/ field/ stream in which they want to pursue a Ph.D. Some colleges also specify that candidates need to have completed an MPhil to pursue a Ph.D. course offered by them.</p>
                           <p>Apart from this, many colleges state that candidates meet the eligibility criteria for Ph.D. programs offered by them if they have cleared UGC NET. Candidates who want to pursue a Ph.D.in Engineering need to possess a valid GATE score.</p>


                        </div>
                      </div>

                        <div class="container info_group">
                            <div class="who_phd">
                            <h3 class="course_heading">Who Should Study For A  Ph.D.?</h3>   
                           <ul>
                            <li>Students who want to make a career out of academics or research should definitely pursue a Doctor of Philosophy.</li>
                            <li>This is a unique opportunity to broaden the horizon of the subject that an individual loves. It brings immense pride and respect to the individual who wants to do a Doctor of Philosophy.</li>
                            <li>To understand if you are capable of doing a Doctor of Philosophy, the individual must have a severe conversation with lecturers and former Doctor of Philosophy students who guide better.</li>  
                            <li>Students should research different Doctor of Philosophy programs to get a general sense of what Ph.D. Degrees are like. After understanding the whole structure then only students must decide to do a Doctor of Philosophy.</li>   
                        </ul>



                        </div>
                        </div>

                      <div class="container info_group">
                        <div class="struc_phd">
                        <h3 class="course_heading">Ph.D. Course Structure</h3> 
                         <p>Steps that candidates need to follow when pursuing a Ph.D. course in order to be conferred a Ph.D. degree are listed below</p>
                         <ol>
                            <li>Once candidates are selected for Ph.D. courses offered at educational institutes they need to submit their Research Proposal along with their Research Topic.</li>
                            <li>Then, candidates are allocated a research supervisor/ guide.</li>
                            <li>After this candidates are provided details of the Course Work, evaluation methodology, and the teaching schedule by the Research Programme Coordinator/ Guide/ Supervisor.</li> 
                            <li>While performing research work most educational institutes require aspirants to submit six-month progress reports for their research work.</li>
                            <li>Further, as a Research Student one needs to give at least two seminar presentations as part of their tenure as a Research Scholar and thereafter submit a Certificate in the prescribed format to the Research Unit.</li> 
                            <li>Next, Ph.D.  students need to publish at least one research paper in a peer-reviewed/refereed Journal and also submit a Certificate in the prescribed format to the Research Unit before they submit their Ph.D.thesis.</li>
                            <li>Before aspirants submit their thesis, their supervisor or guide will organize a Pre-submission Seminar. This seminar will be open to all. As part of this seminar, a report will be submitted which will include suggestions for improvement and the supervisor would ensure that candidates incorporate all these suggestions in the final thesis.</li>                         
                            <li>Candidates then need to incorporate all the changes and submit a summary of their thesis to their supervisor or guide at least 45 days before the submission of the thesis.</li>
                            <li>Finally, candidates need to submit their thesis in hard copy as well as soft copy. This thesis will be examined by external experts. In case any expert suggests any modifications in the research paper submitted by the candidate then he/ she needs to re-submit a modified thesis.</li>
                            <li>Next, a viva-voce is conducted wherein candidates can openly defend their thesis and present their point of view before a panel of experts.</li>
                            <li>Candidates who complete all these steps to perfection would only be conferred a Ph.D. degree.</li>

                        </ol>
                        </div>
                      </div> 
                           
                     <div class="container info_group">
                        <div class="phd_qa">
                          <h3 class="course_heading">Ph.D FAQs</h3>
                          <p><u><b class="que">Question - </b></u>How many years does it take to have a Ph.D.?</p>
                          <p><u><b class="ans">Answer - </b></u>Ph.D. courses take a maximum of five to six years. However, the duration may vary as per the institute where the students have applied.</p>
                                             

                          <p><u><b class="que">Question - </b></u>Can I finish my Ph.D. in four years?</p>
                          <p><u><b class="ans">Answer - </b></u>There is a possibility that a student can finish his/her Ph.D. in four years, but that completely depends on the chosen degree and institute.</p>
                          <p><u><b class="que">Question - </b></u>What is a Ph.D. course?</p>
                          <p><u><b class="ans">Answer - </b></u>Ph.D. is the short form of Doctor of Philosophy and to be eligible, the students are required to have completed their Master’s degree.</p>

                          <p><u><b class="que">Question - </b></u>Do I need to qualify for an entrance exam for Ph.D. admissions?</p>
                          <p><u><b class="ans">Answer - </b></u>No. Students are not required to qualify for any entrance exam for Ph.D. admissions.</p>
                        

                          <p><u><b class="que">Question - </b></u>How can I get a fellowship for Ph.D.?</p>
                          <p><u><b class="ans">Answer - </b></u>Students can get fellowships by attempting and qualifying for entrance exams such as UGC-NET, GATE, and more.</p>
                          
                          <p><u><b class="que">Question - </b></u>What are the required skillset for Ph.D.?</p>
                          <p><u><b class="ans">Answer - </b></u>Students should be dedicated and good at research for Ph.D. Additionally; they should also be self-motivated and good at writing all the reports and their thesis, that they will prepare.</p>
                          
                          <p><u><b class="que">Question - </b></u>How can I get Ph.D. admission?</p>
                          <p><u><b class="ans">Answer - </b></u>For Ph.D. admissions, the students will have to apply at the official website of the institute they prefer. Some institutes may also ask for research proposals to select the students for admission into their institute.</p>
                          
                          <p><u><b class="que">Question - </b></u>How is the course flow of Ph.D.?</p>
                          <p><u><b class="ans">Answer - </b></u>After admissions, the students will have to work on their research proposal along with their allotted supervisor/guide. Students will have to participate in seminars and research papers while preparing their thesis. The final thesis will have to be submitted as a hard copy as well as a soft copy. A viva-voce will be conducted where the students will have to defend their thesis.</p>
                        
                          <p><u><b class="que">Question - </b></u>Is a person with Ph.D. a doctor?</p>
                          <p><u><b class="ans">Answer - </b></u>A person with Ph.D. has completed his/her Doctorate of Philosophy while a doctor has completed his education in Medicine and works to help other people with their medical conditions.</p>

                          <p><u><b class="que">Question - </b></u>Do I need MPhil to apply for Ph.D?</p>
                          <p><u><b class="ans">Answer - </b></u>Most of the colleges accept students with a Master’s degree for Ph.D. However, some institutes may require MPhil for Ph.D. admissions.</p>

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