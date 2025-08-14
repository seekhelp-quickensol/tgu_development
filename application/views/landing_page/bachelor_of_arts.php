<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title> Bachelor Of Arts (BA)| GLOBAL University </title>
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
                            <div class="herotext_2">Admission Open For BA 2022-23</div>
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
                                    <input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="Bachelor Of Arts">
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
            background: url("landing_assets/images/BTU/ba_bg.jpg");
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
   
    

margin-bottom: 20px;
width: 1100px;
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
                    <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Bachelor Of Arts  
                    </span> <span class="edu_p_mob">BA</span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Bachelor Of Arts (BA)</h2>
                    
                        <div class="row d_P_main">
						     <div class="container info_group">
                                    <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_img">
                                            <img src="<?=base_url();?>landing_assets/images/BA_hed_1.png">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_info">
                                          <p>Four-years certification in liberal arts or BA is an undergrad program in expressions. There are different teaches like English, Hindi, History, Journalism, and Psychology in which BA can be sought after. The course can be sought after just subsequent to passing class twelfth in India. Generally, a three-year course Arts program is presented by schools under different streams like Design, Mass Communication, and Hospitality. BA (Hons) or BA course can be sought after in a full-time, part-time, correspondence, or distance training mode. It is compulsory to concentrate on five subjects alongside a couple of elective subjects. The subjects will change contingent upon the chosen subject.</p>
                                   
                                  </div>
						     </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="elgi_ba">
                                <h3 class="course_heading">Eligibility Criteria For Bachelor Of Arts</h3>
                                 <p>Candidates can check the below-mentioned eligibility criteria for admission to the BA course</p>
                                    <ul>
                                        <li>Aspirants must have completed their 10+2 from a recognized board.</li>
                                        <li>Some colleges also specify that aspirants should have secured a minimum of 50% aggregate marks at the 10+2 level.</li>
                                        <li>Some colleges also offer a 5% mark relaxation in this criterion for SC/ ST candidates.</li>
                                    </ul>
                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="why_ba">
                                        <h3 class="course_heading">Why Study Bachelor Of Arts?</h3>
                                      <p>With over 9 million people choosing to pursue a Bachelor of Arts, a BA degree has become one of the most popular courses in India. The following are some of the reasons why you should pursue a BA after class 12</p>
                                      
                                        <ul>
                                             <li>A bachelor's degree in the arts provides more diverse career opportunities than a bachelor's degree in science or commerce.</li>
                                             <li>Unlike, BSc, BBA, or BCom which concentrates on a specific discipline, a Bachelor of Arts concentrates on a broad range of concepts.</li>
                                             <li>Aspirants with a BA degree have the option of working in healthcare, Management, business, Finance, Commerce, or any other field.</li>
                                             <li>There are just as many job opportunities for Bachelor of Arts graduates as there are for IT and Medical Courses.</li>
                                            <li>Cultural knowledge is emphasized in the Bachelor of Arts, which is not taught in other courses. Check: Fine Arts Courses</li>
                                            <li>The Bachelor of Arts focuses more on emotional intelligence and interpersonal skills. See Also: Culinary Arts Courses</li> 
                                    
                                        </ul>
                            </div>
                        </div>

                        <div class="container info_group">
                             <div class="who_ba">
                                    <h3 class="course_heading">Who Should Do Bachelor Of Arts?</h3>
                               <ul>
                                <li>Students who want to learn about different cultures and backgrounds should consider pursuing a BA in Literature.</li>
                                <li>BA psychology can be studied by those who are interested in human psychology and study the ways to deal with emotional stress and related health complications.</li>
                                <li>Bachelor of Arts also lets those students who want to explore earth, and its history, study geography via BA Geography or history via BA History.</li>
                                <li>Students who want to specialize in one of the languages can consider pursuing a Bachelor of Arts in various specializations such as BA Hindi, BA English, BA French, etc.</li>
                                <li>Bachelor of Arts also lets students who want to make a career in journalism, pursue BA in Journalism and get jobs at top reputed media companies.</li>  
                            
                            
                            
                            </ul>
                         
                            </div>
                        </div>
                   
                      <div class="container info_group">
                        <div class="skil_bca">
                            <h3 class="course_heading">Required Skillset For Bachelor Of Arts</h3>
                           <p>Candidates who aspire to pursue a BA course should possess the below-mentioned skillset</p>
                            
                           <table>
                            <tr>
                                <th colspan="2">Skillset For BA Courses</th>
                            </tr>

                            <tr>
                                <td>Good Communication Skills</td>
                                <td>Problem-Solving Skills</td>
                            </tr>
                             <tr>
                                <td>Management Skills</td>
                                <td>Analytical Thinking</td>
                             </tr>

                             <tr>
                                <td>Goal-Oriented</td>
                                <td>Ability To Work Under Pressure</td>
                             </tr>

                             <tr>
                                <td>Intellectually Curious</td>
                                <td>Inquisitive</td>
                             </tr>
                             <tr>
                                <td>Organisation Skills</td>
                                <td>Interpersonal Skills</td>
                             </tr>
                         
                           </table>







                        </div>
                      </div>

                        <div class="container info_group">
                            <div class="joab_ba">
                               <h3 class="course_heading">Jobs And Career Options After Bachelor Of Arts</h3>   
                                     <p>Aspirants can pursue a career in different fields after pursuing BA. Candidates can also go for higher studies i.e. can pursue an MA course in the same discipline they pursued graduation with. MA or Master of Arts is a postgraduate degree.</p>   
                                <h4 class="course_heading"> Job Sectors And Profiles For BA Graduates</h4>
                                 <p>Given Below are a few sectors and  profiles for BA graduates</p>
                                <p><b>Journalism And Mass Communication - </b>The study of disseminating information to a large audience via multiple modes of communication is known as mass communication. Whereas, Journalism is the practice of reporting on current events for newspapers, periodicals, and other publications. Various job profiles are Content Writer, Journalist, Reporter, Editor, Public Relations Associate, and more.</p>
                                <p><b>Social Work - </b>It is the field wherein an individual is taught how to help uplift and solve the problems of a person, society, and more. It deals with helping people function the best they can in their environment. Some of the job profiles are Child & Family Social Worker, School Social worker, Clinical Social Worker, Mental Health Social worker, and more.</p>
                                <p><b>Foreign Language Experts - </b>With a BA in Foreign language, one can become a Teacher (a B.Ed degree is a must), Interpreter, Translator, Book writer, and more.
                                      Other sectors a BA graduate can apply for are Religious Studies, Civil Services, Public Administration, Event Planning, BPOs, International Relations, the Government sector, and more.</p>
                            </div>
                        </div>

                      <div class="container info_group">
                        <div class="scope_ba">
                            <h3 class="course_heading">Bachelor of Arts Scope</h3> 
                            <ul>
                                <li>BA degree holders become eligible to work in both government and private sectors with an average salary ranging from INR 4-7LPA.</li>
                                <li>Educational Institutes, Economic Development, Export Companies, Foreign Affairs, Law Firms, Lobbying Firms, Media Houses, etc. are some of the main domains for these candidates to work.</li>
                               <li>Bachelor of Arts students with less than 1 year of experience can expect a minimum salary of around INR 18,000- 25,000. In cities like Delhi, Mumbai, Bangalore, Chennai, etc., you can expect a minimum salary of INR 22,000- 28,000.</li>
                                <li>In other cities, the minimum salary can start from INR 15,000- 18,000 but it largely depends upon the job profile and the company.</li>
                            <li>Deloitte, ITC Hotels, NIIT, Byju’s, Toppr, BCG, ICICI Bank, HDFC Bank, KPMG, Accenture, etc. are some of the top recruiting companies for Bachelor of Arts.</li>
                                                        
                            
                            </ul>    
                        
                        
                        </div>
                      </div> 
                    
                     

                     <div class="container info_group">
                        <div class="mca_qa">
                          <h3 class="course_heading">FAQs BA</h3>
                          <p><u><b class="que">Question - </b></u>What is the difference between a BSc and a BA degree?</p>
                          <p><u><b class="ans">Answer - </b></u>The Bachelor of Science or BSc largely focuses on the research and mathematical skills of a candidate. Whereas, the BA program degree develops a student’s abilities to communicate clearly and critically analyze theories, ideas, and concepts. Students learn how to reach their own conclusions and express them logically.</p>

                          <p><u><b class="que">Question - </b></u>How is BA (Hons) better than BA?</p>
                          <p><u><b class="ans">Answer - </b></u>By doing a Bachelor of Arts (Honours) course, you can specialize in a particular subject which is offered. In a normal BA course, there is no specialization. For example, you can have BA (Hons) in History and can take a specialization in Psychology or Sociology.</p>

                          <p><u><b class="que">Question - </b></u>Do I need to have learned Sociology in Class 12 to pursue B.A. in Sociology?</p>
                          <p><u><b class="ans">Answer - </b></u>It is advisable to have learned Sociology in Class 12 in order to pursue a course in Sociology. If not, apply for admission to universities that offer admission on the basis of entrance exams.</p>

                          <p><u><b class="que">Question - </b></u>What can I do after my BA?</p>
                          <p><u><b class="ans">Answer - </b></u>You can pursue your further studies or pursue a job if you want to. However, it is advisable to continue with your further studies as you can specialize in a particular subject and narrow down on what you want to do in your career.</p>
                        
                          <p><u><b class="que">Question - </b></u>Can I do MBA after my BA?</p>
                          <p><u><b class="ans">Answer - </b></u>Yes, you can. However, it also depends on the course you opted for in your graduation and how it will benefit you while doing your MBA.</p>
                          
                          <p><u><b class="que">Question - </b></u>Are Liberal Arts courses offered through BA?</p>
                          <p><u><b class="ans">Answer - </b></u>Yes. There are various universities and colleges which offer BA Liberal Arts courses. The duration of a BA in Liberal Arts is four years.</p>
                          
                          <p><u><b class="que">Question - </b></u>Can I do a BA in Political Science through a distance course?</p>
                          <p><u><b class="ans">Answer - </b></u> Yes. Now there are various universities/colleges/institutes which offer admission to BA Political Science. However, the degree is only valid unless the university is recognized by UGC.</p>
                          
                          <p><u><b class="que">Question - </b></u>Can I take up another subject after doing a BA in Philosophy?</p>
                          <p><u><b class="ans">Answer - </b></u>Yes. Students can take up a Master of Arts (MA) in any other subject as Philosophy can be related to any Humanities and Social Science subject.</p>  

                          <p><u><b class="que">Question - </b></u>What are the subjects to pursue a Bachelor of Arts?</p>
                          <p><u><b class="ans">Answer - </b></u> Well, the list is quite long. However, some of the major subjects that are taught in BA are – English, History, Psychology, Philosophy, Social work, Economics, Sociology, and more.</p>                        
                          
                          <p><u><b class="que">Question - </b></u>Can I do Ph.D after my BA?</p>
                          <p><u><b class="ans">Answer - </b></u> After completing your BA, you need to complete post-graduation in your preferred subject. Thereafter, you can enroll yourself in a PhD course. However, make sure to check if Ph.D. in your preferred field is available in India or not.</p>
                          
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
       