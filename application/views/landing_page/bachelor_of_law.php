<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>Bachelor of Law(LLB) | GLOBAL University </title>
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
                            <div class="herotext_2">Admission open for DMLT 2022-23</div>
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
                                    <input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="Diploma In Medical Laboratory">
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
                            <p>Accorded Institution of Eminence by UGC, AICTE Govt. of India</p>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="tabs">
                            <img src="<?=base_url()?>landing_assets/images/2.png" class="three_img">
                            <p>No. 1 Private University in India by Education World Ranking 2022</p>
                        </div>


                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="tabs">
                            <img src="<?=base_url()?>landing_assets/images/3.png" class="three_img">
                            <p>A legacy of the field of Higher Education</p>
                        </div>

                    </div>
                    <hr class="tabs_hr">

                </div>
            </center>
        </div>
    </section>

     <style>
.d_pharm_img{
    float: right;
}

.d_pharm_img img{
    width: 700px;
margin-left: 160px;
}
.course_heading1{color: #3a29a4;
}


/
.info_heding{
    color: #e67b29;
}






.tryimg{
    height:200px;
    width:200px;
    float:right;
}
.tryimg1{
    height:200px;
    width:200px;
    float:left;
}

.low_list li{
    width:50%;
    float:left;
   
}

     </style>
 


    <div class="container info_group_main">
            <div class="edu_tabs" style="text-align:center">
                <a class="active showSingle" target="1">
                   <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Bachelor Of Low
                   </span> <span class="edu_p_mob">LLB</span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Bachelor Of Low(LLB)</h2>
                    
                        <div class="row d_P_main">
						     <div class="container info_group">
                                    <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_img">
                                            <img src="<?=base_url();?>landing_assets/images/LLB (Bachelor of Law)-1.png">
                                    </div>
                                    <!-- <div class="col-lg-6 col-md-12 col-sm-12 d_pharm_info">
                                             <p>    A diploma in Pharmacy is a 2-year-long career-oriented, diploma course. Students who wish to pursue a long-term career in the medical field of pharmaceutical sciences, and start a career in the pharmaceutical industry, can take admitted to the D Pharma course. 
                                            D Pharmacy syllabus is designed to prepare candidates to work under the supervision of a licensed pharmacist in hospitals, community pharmacies, and other pharmaceutical-related fields. Candidates can also pursue MBA in Pharmaceutical Management after this course, though they would need to complete their undergraduate degree first.
                                            </p> 
                                    </div> -->
						     </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="what_llb">
                                <h3 class="course_heading">What is LLB (Bachelor of Law)?</h3>
                                  <p>LLB, also known as Bachelor of Law or Legum Baccalaureus, is an undergraduate law program of 3-year or 5-year duration that can be pursued after graduation and 10+2 respectively. </p>
                                  <p>The Bachelor of Law is a foundational course in law that teaches students about legal procedures followed in the profession. </p>
                                  <p>The course help students develop a logical, analytical and critical understanding of legal affairs and teach them how to use these skills to resolve social, and legal issues in society. </p>
                                  <p>Competitors who have finished their graduation in any discipline are qualified to seek after 3-year LLB, The 5-year LLB is a coordinated regulation program that can be sought after in the middle of the road.</p>
                                  <p>The course is offered by colleges that are approved by the Bar Council of India (BCI).</p>
                                  <p>Also note that to pursue law in India, the LLB degree holder also has to qualify in the All India Bar Examination (AIBE) conducted by the BCI. </p>
                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="eligi_d">
                                        <h3 class="course_heading">Advantages of doing LLB (Bachelor of Law) Degree</h3>
                                           <p>A strong starting point for additional schooling - Many courses engage understudies to join their regulation examinations with business or bookkeeping, as well as to consolidate regulation and non-lawful degrees.</p>
                                   
                                        <div class="row">
                                           <div class="col-sm-12 col-md-5">
                                              <img class="tryimg" src="<?=base_url();?>landing_assets/images/job_opurtunity.png">
                                           </div>
                                           <div class="col-sm-12 col-md-7">
                                              <p><strong class="course_heading">Lots of job options -</strong><br> In addition to being a lawyer, law graduates are potential candidates for various fields such as media and law, academics, commerce and industry, social work, politics, and more.</p>
                                           </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-7">
                                                <p><strong class="course_heading">Financial stability - </strong><br> Getting a regulation degree can ensure quick achievement or an exceptionally enormous measure of cash yet it is up and coming. This expert title permits one to appreciate more employer stability and a more significant pay contrasted with the people who don't.</p>
                                            </div>
                                            <div class="col-sm-12 col-md-5">
                                                 <img class="tryimg1" src="<?=base_url();?>landing_assets/images/money_stability.png">
                                            </div>
                                        </div>

                                        <div class="row">
                                           <div class="col-sm-12 col-md-5">
                                               <img class="tryimg" src="<?=base_url();?>landing_assets/images/thinking.png">
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <p><strong class="course_heading">Master critical thinking and analytical skills -</strong><br>  The knowledge and skills acquired in the study of law enable students to analyze both sides of complex situations or problems and to make effective solutions based on solid reasoning and critical thinking. </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-7">
                                                <p><strong class="course_heading">Power to make a difference by law - </strong><br> You can have a strong sense of justice and wish to improve the disability in the system. Studying law gives you the legal education and qualifications to finally make that important change. </p>
                                            </div>
                                            <div class="col-sm-12 col-md-5">
                                                <img class="tryimg1" src="<?=base_url();?>landing_assets/images/low_power.png">
                                            </div>
                                        </div>
                                   
                                        <!-- <ul>
                                        <li>The candidate must have passed Class 12 or equivalent from a recognized board. 
                                        </li>
                                        <li>Students must have studied Physics, Chemistry, and Biology as compulsory subjects and  Mathematics as an optional subject. 
                                        </li>
                                        <li> The candidate must have a minimum of 40% marks in aggregate.
                                        </li>
                                    </ul> -->
                            </div>
                        </div>

                        <div class="container info_group">
                            <div class="law_eligi">
                                <h3 class="course_heading">LLB (Bachelor of Law) Eligibility  </h3>
                                <p>The qualification models of Bachelor of Law might differ across universities, particularly those connected with least checks; allude to the focuses beneath for all relevant info. It is vital that the competitor knows the qualification rules ahead of time on the grounds that generally one's candidature can be invalidated at any phase of the confirmation cycle. </p>
                                <h4 class="course_heading">Eligibility criteria of LLB program -</h4>
                                <p>Since 3-year LLB is a law course offered after graduation, candidates aspiring for a law degree must have passed graduation with a minimum of 45% marks from a recognized institute in any discipline like BA, B.Com, B.Sc, BBA, BCA, etc.</p>
                                <p><strong>Age limit:</strong>There is no upper age limit for the course.</p>
                            </div>
                        </div>
                   
                      <div class="container info_group">
                        <div class="low_specil">
                            <h3 class="course_heading">LLB (Bachelor of Law) Specializations </h3>
                              <p>There is generally no such thing as specialization in a Bachelor of Law program. That being said, the candidate has the flexibility to pick some subject combinations which help them to specialize in certain subjects in their LLM degree. The undergraduate degree usually covers core modules like Criminal Law, Tort Law, Contract Law, Constitutional Law, Administrative Law, Equity and Trusts, Land Law, and European Law. At the postgraduate level, the candidate can do specialization in a chosen subject, which may be:</p>
                                <ul class="low_list">
                                    <li  class="low_type">Constitutional Law.</li>
                                    <li  class="low_type">Labour Law.</li>
                                    <li  class="low_type">Family Law.</li>                                                                                                
                                    <li  class="low_type">Intellectual Property Law.</li>                                                                                                   
                                    <li  class="low_type">Taxation Law.</li>                                                                                                    
                                    <li  class="low_type">Corporate Law and Governance (including International Business)</li>                                                                                                    
                                    <li  class="low_type">Criminal Law.</li>                                                                                                    
                                    <li  class="low_type">Environmental Law.</li>                                                                                                   
                                    <li  class="low_type">Human Rights.</li>                                                                                                   
                                    <li  class="low_type">Insurance Laws.</li>                                                                                                    
                                </ul>

                           </div>
                      </div>

                        <div class="container info_group">
                            <div class="loow_scope">
                               <h3 class="course_heading">Scope of LLB (Bachelor of Law) </h3>   
                               <p>Many candidates decide to do LLB after graduation because it is considered a safe career option. If the candidate completes LLB, he or she may go on to become an advocate and work in legal cases. The LLB degree holder has the option of working both as a private lawyer and working for the government. To work in the government sector, the candidate generally needs to qualify in an entrance exam conducted by the Public Service Commission.</p>
                        </div>
                        </div>

                      <div class="container info_group">
                        <div class="career_opurtunity">
                        <h3 class="course_heading">Careers Opportunities after LLB (Bachelor of Law) </h3> 
                        <p>There is no limit as to what level one can reach after completing an LLB degree. Because if we look at social personalities dominating the public, starting from the late Arun Jaitley and Ram Jethmalani, to present luminaries like Harish Salve and Aryama Sundaram, to the former Chief Justice Ranjan Gogoi, the sky's the limit. </p>
                        <p>Then some may also decide to go for higher studies and pursue LLM and even Ph.D. At the master's level, one may opt for specialization, which can give more muscle to one’s resume and job prospects. Again, some may decide to become teachers, a profession which is getting more attention in recent times.</p>
                        <p>After completing the LLB degree, one may work in a variety of roles - corporate lawyer, judge, legal advisor, or legal manager. How far one goes, however, depends on factors like skills levels, profession chosen, experience, etc. Some individuals again become social activists and fight for the legal rights of marginal sections of society. The role can be unglamorous and require a lot of sacrifices and standing up to powerful people, but the job satisfaction can be immense. </p>
                       
                       </div>
                      </div> 
                    
                     <div class="container info_group">
                        <div class="advocate">
                             <h3 class="course_heading"><u>Advocate</u></h3>
                             <p>Advocacy is a popular career path for LLB graduates. Students who choose this route can practice in the courts. It should be noted that in order to qualify for their profession, candidates must first pass the All India Bar Council test.</p>
                            </div>
                     </div>    
                    
                     <div class="container info_group">
                        <div class="selc_process">
                           <h3 class="course_heading"><u>Government Services</u></h3>
                           <p>After completing their LLB, students might choose to work for the government.</p>
                           <p>Those who meet the requirements could even join the Air Force, Indian Army, or Navy. </p>
                           <p>They are also eligible to take UPSC (Union Public Service Commission) or SPSC examinations such as HAS and IAS (State Public Service Commission).</p>
                           <p>Ph.D. At the master's level, one may opt for specialization, which can give more muscle to one’s resume and job prospects. Again, some may decide to become teachers, a profession which is getting more attention in recent times.</p>
                        </div>
                     </div>


                      

                     <div class="container info_group">
                        <div class="leagl_cou">
                             <h3 class="course_heading"><u>Legal Counsel</u></h3>
                             <p>Following the successful completion of your LLB, you can work as a legal counselor in law offices, private companies, corporate firms, or banks. You can give legal advice on a variety of topics. Furthermore, your legal knowledge might be put to use in NGOs.</p>
                            </div>
                     </div>  

                     <div class="container info_group">
                        <div class="Judiciary">
                             <h3 class="course_heading"><u>Judiciary </u></h3>
                             <p>students could also work for the country's justice system as judges or magistrates. A judicial exam is conducted by the public service commission and candidates are required to pass the exam to be appointed as a judge or magistrate. This is an extremely difficult exam to pass.</p>
                           
                            </div>
                        </div>  

                     <div class="container info_group">
                        <div class="Teaching">
                             <h3 class="course_heading"><u>Teaching</u></h3>
                             <p>Then some may also decide to go for higher studies and pursue LLM and even Ph.D. At the master's level, one may opt for specialization, which can give more muscle to one’s resume and job prospects. Again, some may decide to become teachers, a profession which is getting more attention in recent times.</p>
                            <p>Students with strong academic credentials and the ability to explain and narrate various topics to a group of people are ideal candidates for the position of lecturer at one of the country's most prestigious universities or law schools.</p>
                            </div>
                     </div> 









                     <div class="container info_group">
                        <div class="low_qa">
                          <h3 class="course_heading">LLB (Bachelor of Law): FAQs</h3>
                          <p><u><b class="que">Question -</b></u>What is the LLB course? </p>
                          <p><u><b class="ans">Answer -</b></u> The LLB degree is a three-year duration course that candidates can pursue after their graduation degree. The LLB course is different from the five-year integrated LLB courses such as BA LLB, BBA LLB, BSc LLB, BCom LLB, etc. </p>

                          <p><u><b class="que">Question -</b></u>Is Mathematics compulsory for the LLB course? </p>
                          <p><u><b class="ans">Answer -</b></u>As per the eligibility criteria of the LLB course, the candidates holding a bachelor's degree in any discipline can pursue the course. No such requirement of Mathematics as a mandatory subject for admission to an LLB course.</p>

                          <p><u><b class="que">Question -</b></u>Do I need to appear for CLAT for admission to LLB degree? </p>
                          <p><u><b class="ans">Answer -</b></u> No, the CLAT exam is conducted only for admissions to five-year LLB courses and LLM courses. For admission to an LLB degree, candidates have to appear for the entrance exam conducted by the university/ law colleges. 
                             (CLAT is an entrance exam only for National Universities butTHE GLOBAL UNIVERSITY does not conduct any exam like this for admissions.) <br>
                           Then some may also decide to go for higher studies and pursue LLM and even Ph.D. At the master's level, one may opt for specialization, which can give more muscle to one’s resume and job prospects. Again, some may decide to become teachers, a profession which is getting more attention in recent times.</p>

                          <p><u><b class="que">Question -</b></u>What is the minimum percentage required for admission to an LLB degree? </p>
                          <p><u><b class="ans">Answer -</b></u>Candidates should have secured at least 45% marks in their bachelor's degree for admission to the LLB degree. </p>
                       
                          <p><u><b class="que">Question -</b></u>Can I pursue LLB after Class 12?</p>
                          <p><u><b class="ans">Answer -</b></u>No, the three-year LLB course can be pursued only after completing graduation. To pursue Law after Class 12, you need to enroll in courses such as BA LLB, BCom LLB, BBA LLB, and BSc LLB. </p>
                       
                        </div>
                     </div>

                            <div>
                                   <a href=""><button class="course_applay" type="button">Applay Now</button></a>
                             </div>
                    
                    </div>
                </div>


            </section>
	
    </div>


<?php include('footer.php');?>