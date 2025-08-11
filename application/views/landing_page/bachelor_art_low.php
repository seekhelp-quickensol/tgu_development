<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>Bachelor Of Arts - Bachelor Of Law  | Birtikendrajit University </title>
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
                            <div class="herotext_2">Admission Open For B.A. LL.B. 2022-23</div>
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
                                    <input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="Bachelor Of Arts - Bachelor Of Law">
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
                            <p>A legacy Of The Field Of Higher Education</p>
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
            background: url('landing_assets/images/BTU/art_of_law_bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
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


.skilimg{
    height: 200px;
    width:400px
}
     </style>
 


    <div class="container info_group_main">
            <div class="edu_tabs" style="text-align:center">
                <a class="active showSingle" target="1">
                <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Bachelor of Arts - Bachelor of Law 
                </span> <span class="edu_p_mob">B.A. LL.B.</span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Bachelor Of Arts - Bachelor Of Law</h2>
                    
                        <div class="row mba_main">
						     <div class="container info_group">


                                        <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_info ">
                                            <!-- <h3 class="course_heading">MBA Admissions 2022</h3>
                                            <h3 class="course_heading">Top MBA College In Manipur, India</h3> 
                                            <p>Are you looking for the best MBA college in Manipur, India? Look no further! <b>THE GLOBAL UNIVERSITY </b> is the top choice for students seeking quality education in <b> business administration.</b> We offer a comprehensive curriculum that will prepare you for a <b> successful career</b> in the business world. Our faculty are experienced professionals who will guide you through your studies and help you reach your goals. We are proud to offer a top-notch education at an <b> affordable price.</b> Contact us today to learn more about our college and how we can help you achieve your dreams!</p>    -->
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_img">
                                             <img src="<?=base_url();?>landing_assets/images/low_main.png">
                                        </div>
						           <p>B.A. LL.B. (Bachelor of Arts - Bachelor of Law) is a five-year coordinated LLB course that up-and-comers are qualified to seek after subsequent to finishing Class 12. The Law course is a combination of Humanities and Law streams, which permits the possibility to concentrate on subjects like History, Sociology, Administrative Law, Criminology, Family Law, etc.</p>
                                   <p>The B.A. LL.B. course is a sought-after course among those interested in law plus arts in India and worldwide. B.A. LL.B. students will have a strong foundation in core disciplines such as business laws, constitutional law, code of civil procedure, election law, political science, drafting & pleading economics, and others, ensuring a financially and socially rewarding career. After finishing a B.A. LL.B. students can pursue higher legal studies such as LLM or ph. D</p>
                                   <p>Most Law schools run a semester framework in which the five-year span course is separated into 10 semesters. The B.A. LL.B. course expense in the top regulation schools in India goes from Rs 1.5-2.8 lakh per annum.</p>
                             </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="elgie_bal">
                                <h3 class="course_heading">B.A. LL.B. Eligibility</h3>
                                 <p>B.Lib.I.Sc essentially manages the protection and upkeep of libraries. B.Lib.I.Sc confirmation process fluctuates from one foundation to another. Organizations give direct admission to competitors based on their imprints scored at graduation. On other hand, a few colleges/schools direct selection tests to offer admission to up-and-comers in B.Lib.I.Sc courses. The course is accessible as both a full-time and part-time program at colleges.</p>   
                                  <ul>
                                    <li>Candidates should clear Class 12 in any stream from a recognized school.</li>
                                    <li>Candidates should clear Class 12 with a minimum 40-50 percent aggregate.</li> 
                                    <li>There is no age bar to pursuing the course.</li>
                                    <p><b>Note: </b>Given above is the basic B.A. LL.B. eligibility might vary depending on the college to which a candidate is applying.</p>
                                  </ul>
                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="skill_bal">
                                        <h3 class="course_heading">B.A. LL.B. Skills</h3>
                                       <p>Students planning to pursue B.A. LL.B. should possess a skill set in order to perform well in the course and later have a prosperous career. Some skills that candidates should have for the course include:</p>
                          
                                       <ul>
                                            <li>Confidence</li>
                                            <li>Research skills</li>
                                            <li>Convincing skills</li>
                                            <li>Verbal And Written Communication Skills</li>
                                            <li>Good Judgment Skills</li>
                                            <li>Integrity</li>
                                            <li>Presentation Skills</li>
                                            <li>Objectivity</li>
                                            <li>Ability To Work For Long Hours</li>
                                            <li>Time Management Skills</li>
                                       </ul>
                            </div>
                        </div>

                        <div class="container info_group">
                             <div class="whystu_bal">
                                <h3 class="course_heading">Why Study B.A. LL.B.</h3>
                                  <p>Candidates who wish to have a rewarding career in the field of law with numerous scopes and ample growth opportunities must pursue B.A. LL.B. course </p>
                                  <p>after compilation of their 10+2 or equivalent examination from a recognized board. Today, firms and big corporations are expanding globally with mergers, acquisitions, collaboration, and consolidation which has, in turn, expanded and enhanced the need for a legal advisor, attorney, lawyer, etc.</p>
                                  <p>A legal job after B.A. LL.B. program can be intellectually stimulating, financially gratifying, and personally rewarding. If you have the potential to handle legal queries, draft a legal document, and become a legal representative of a firm then you can definitely look to pursue B.A. LL.B. The B.A. LL.B. course will not only prepare you to handle various legal facets and challenging legal situations but will also provide you with a gratifying career.</p>
                                  <p>A few reasons to pursue B.A. LL.B. courses are mentioned below</p>
                                  
                                  <ul>
                                    <li>Wide-Ranging Career Option</li>
                                    <li>Service To Clients</li>
                                    <li>Rapid Growth Opportunities</li>
                                    <li>Intellectual Stimulation</li>
                                    <li>Prestigious Career Option</li>
                                  </ul> 
                             </div>
                       </div>
                   
                      <div class="container info_group">
                        <div class="who_bal">
                            <h3 class="course_heading">Who Should do B.A. LL.B.? </h3>
                              <p>If you are interested in working with various organizations and gaining an enriching experience, you should pursue B.A. LL.B. integrated undergraduate degree. Students who want to work in the legal industry for some of the world’s most prestigious businesses should opt for the B.A. LL.B. course.</p>
                        </div>
                      </div>

                            <div class="container info_group">
                                <div class="specil_bal">
                                        <h3 class="course_heading">B.A. LL.B. Course Specialization</h3> 
                                        <p>Although there is no proper B.A. LL.B. specialization but there are few elective subjects in the last year of B.A. LL.B. course: Candidates can choose based on their interests, goals, and career aspiration. A few of the electives that candidates can choose from are international trade laws, Investment law, International banking, finance, etc.</p>
                                    <ul>
                                        <li><b>Lecturer - </b>A lecturer will formulate and take law lessons and classes in a college or a university, and teach law aspirants about the basics of the Indian Legal System. </li>
                                        <li><b>Law Officer - </b>A Law Officer is responsible to regulate all the legal aspects of the organization. Their main job includes protecting the organization from any legal trouble and solving their legal problems.</li>
                                        <li><b>Legal Associate - </b>A legal associate coordinates with the clients and understands their requirements and formulates them in a formally legal manner.</li>
                                        <li><b>Junior Lawyer - </b>Junior lawyers are basically freshers who have just started their legal careers.</li>
                                        <li><b>Legal Expert Advisor - </b>A Legal Advisor develops and presents content in a large forum to inform internal and external clients on different legal issues and other regulatory developments affecting plans and programs.</li>
                                        <li><b>Corporate Lawyer - </b>A Legal Advisor develops and presents content in a large forum to inform internal and external clients on different legal issues and other regulatory developments affecting plans and programs.</li>
                                        <li><b>Litigator - </b>Litigators are also known as trial lawyers. They are responsible for managing all the phases of litigation from the investigation, pleadings, discovery, etc. through the different processes like pre-trial, trial, settlement, and appeal processes before a high court/ district court.</li>
                                        <li><b>Private Practice - </b>They are private lawyers which may be associated with some firm or practice in their personal space.</li>
                                        <li><b>Advocate - </b>Advocates are the legal face and representatives of a company, person, or client and manage and solve their legal activities and legal problems from top to bottom.</li>
                                        <li><b>Legal Counsel - </b>A Legal Counsel guides the company or a client about different legal terms and conditions and helps to save and protect the company from any legal issues.</li>
                                        <li><b>Paralegal - </b> A paralegal usually works in a law office or a law firm and has an administrative role to play like drafting documents, filing motions, interviewing clients, preparing retainers, etc</li>
                                        <li><b>Government Lawyer - </b>A government lawyer assists the state/ central government in all the legal activities, from formulating to applying to regulating.</li>
                                        <li><b>Magistrate - </b>A magistrate serves in a lower court and resolves the local and regional issues presented before him/her.</li>
                                        <li><b>Notary - </b>A Notary is responsible for verifying documents and legal agreements.</li>
                                    </ul>
                                </div>
                            </div>

                      

                        <div class="container info_group">
                            <div class="bal_qa">
                                <h3 class="course_heading">FAQs About B.A. LL.B.</h3>
                                

                                <p><u><b class="que">Question - </b></u>What is B.A. LL.B.?</p>
                                <p><u><b class="ans">Answer - </b></u>Yes. Students of any stream can apply for B.A. LL.B.  provided that they meet the essential eligibility criteria.</p>
                                    
                                <p><u><b class="que">Question - </b></u>What is the scope of B.A. LL.B.?</p>
                                <p><u><b class="ans">Answer - </b></u>Students who graduate with a B.A. LL.B. degree can start working in the law field. They can work as a lawyer, advocates, solicitors and more. They can also pursue higher education such as LLM or even MBA.</p>

                                <p><u><b class="que">Question - </b></u> Do I need to study Political Science with B.A. LL.B.?</p>
                                <p><u><b class="ans">Answer - </b></u>  Yes. Students will also be required to study Political Science along with some other Arts subjects in B.A LL.B.</p>

                                <p><u><b class="que">Question - </b></u> What is the salary of B.A. LL.B. graduates?</p>
                                <p><u><b class="ans">Answer - </b></u>The salary of B.A. LL.B. graduates will differ as per the field they are working in or the company or organization that they are working at. However, the average salary falls between INR 3 to 6 Lakhs per annum.</p>
                               
                                

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