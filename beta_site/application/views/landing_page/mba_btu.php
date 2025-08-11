<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>Master Of Business Administration ( MBA)| Global University </title>
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
                            <div class="herotext_2">Admission Open For MBA 2022-23</div>
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
                                    <input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="Master Of Business Administration">
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
            background: url("landing_assets/images/BTU/mba_bg1.jpg");
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
    width: 530px;
margin-left: 20px;
margin-top: 100px;
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



.mbaimg_group{   margin: 20px 0px 20px 220px;
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
                <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Master Of Business Administration
                </span> <span class="edu_p_mob">MBA</span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Master Of Business Administration ( MBA)</h2>
                    
                        <div class="row mba_main">
						     <div class="container info_group">
                             <div class="col-lg-6 col-md-12 col-sm-12 d_pharm_img">
                                       <img src="<?=base_url();?>landing_assets/images/mba_1.jpg">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 d_pharm_info">
                                        <!-- <h3 class="course_heading">MBA Admissions 2022</h3> -->
                                        <h3 class="course_heading">Top MBA College In Manipur, India</h3> 
                                        <p class="capitalize">Are you looking for the best MBA college in manipur, india? look no further! <b>THE GLOBAL UNIVERSITY </b> is the top choice for students seeking quality education in <b> business administration.</b> We offer a comprehensive curriculum that will prepare you for a <b> successful career</b> in the business world. Our faculty are experienced professionals who will guide you through your studies and help you reach your goals. We are proud to offer a top-notch education at an <b> affordable price.</b> Contact us today to learn more about our college and how we can help you achieve your dreams!</p>   
                                    </div>
                                   
						     </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="why_mba">
                                <h3 class="course_heading">Why Should You Pursue MBA As A Career?</h3>
                                <p class="capitalize">If you're considering your career options, <b>MBA</b> May be a good choice. An MBA can give you the skills and knowledge you need to succeed in business. 
                               Employers who are looking for individuals with severe business awareness and leadership skills to drive future growth find MBA students to be a very attractive proposition because of the all-around development they experience while attending a business school. every industry, including <b> healthcare and finance,</b> has a place for <b> MBA </b> graduates.</p>
                              <img class="mbaimg_group" class="mbaimg_group" src="<?=base_url();?>landing_assets/images/mba_2.jpg">
                              <p class="capitalize">It might be difficult for students to choose their dream job because there are <b> so many employment opportunities </b>available after receiving an MBA. additionally, picking on a business school and an MBA focus might be influenced by your career goals after earning your MBA. We discuss the most sought-after MBA positions in India below to assist you and hopefully facilitate your decision-making.</p>      
                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="admi_mba">
                                        <h3 class="course_heading">MBA Admissions 2022-23 At BTU -</h3>
                                       <p class="capitalize">For its MBA programs, BTU offers more than 15 different specialties. Admission to this degree program requires both a counseling session and valid mark sheets.
                                        <b> BTU University's</b> MBA Program For the Year 2022-23 </p> 
                            </div>
                        </div>

                        <div class="container info_group">
                             <div class="top_mba">
                                <h3 class="course_heading">MBA Top Courses At BTU</h3>
                                  <img class="mbaimg_group" src="<?=base_url();?>landing_assets/images/mba_3.png"> 
                                    <p class="capitalize">More than 20-course selections are available to you. Not all Indian colleges and universities, however, offer every MBA major. The most popular top MBA programs in India focus on management education with a strong emphasis on career development. Regardless of the style or length of an MBA program, the courses not only provide excellent learning opportunities but are also tailored to meet the needs of the industry. An MBA prepares you to become an expert in the particular field covered in the program, as well as to become well-rounded in other areas. 
                                     According to the projected career growth in the current environment, the top 23 specialties for MBA programs at BTU are as follows:</p>
                                         <ul>
                                            <li><b>Human Resource Management - </b> The practice of recruiting, hiring, assigning, and managing personnel is known as human resource management. Human resource is a common abbreviation for HRM.</li>
                                            <li><b>Marketing Management & Finance - </b>Financial marketing management is a concept in business that entails efficiently managing an organization's resources by using recognized macroeconomic and microeconomic aspects in relation to the firm in question.</li>
                                            <li> <b>Banking & Insurance - </b>A two-year postgraduate program in management called the MBA in Banking and Insurance examines management theories in the banking and insurance sectors. One of the main industries in India where financial experts are employed in the banking and insurance sector, which is the target audience for the course.</li>
                                            <li><b>Banking & Insurance - </b> A two-year postgraduate program in management called the MBA in Banking and Insurance examines management theories in the banking and insurance sectors. One of the main industries in India where financial experts are employed in the banking and insurance sector, which is the target audience for the course.</li>
                                            <img class="mbaimg_group" src="<?=base_url();?>landing_assets/images/mba_4.jpg"> 
                                            <li><b>Finance - </b>Students with an MBA in Finance have access to a range of career prospects in the financial sector. Students learn how to evaluate corporate reports, predict economic trends, maximize stock value, select investment portfolios, and strike a balance between risk and profitability in this course.</li>
                                            <li><b>Travel & Tourism Management - </b>A two-year post-graduate specialized course called an MBA in Travel and Tourism covers many different facets of business management but places a particular emphasis on travel, tourism, and hospitality.</li>
                                            <img class="mbaimg_group" src="<?=base_url();?>landing_assets/images/mba_5.jpg"> 
                                            <li><b>Journalism & Mass Communication - </b>Managing teams of media experts, media entertainment production companies, numerous mass communication channels, and technology are all part of the field of business administration known as "media management."</li>
                                            <li><b>Executive - </b>For students who are further along in their careers and wish to continue working full-time while attending school, an executive MBA program, often known as an EMBA program, has been developed. While every program has a different schedule, the majority provide part-time options including weekend classes.</li>
                                            <li><b>Supply Chain Management - </b>Management of the supply chain MBA programs are professional master's degrees that combine supply chain management specialized courses with a primary business administration curriculum. Master's degrees in business administration typically take one to three years to complete.</li>
                                            <li><b>Industrial Engineering - </b>Students in industrial engineering gain knowledge of optimizing complex organizations, processes, and systems. Engineering, science, and math are all combined in this subject of study. Students may also learn about topics including quality assurance, operations management, and statistical analysis.</li>
                                            <li><b>Hotel Management - </b>The goal of the postgraduate MBA in Hotel Management program is to help students develop the managerial skills necessary for working in the services, tourism, or hotel industries.</li>
                                            <img class="mbaimg_group" src="<?=base_url();?>landing_assets/images/mba_6.png"> 
                                            <li><b>Pharmaceutical Management/Biotechnology - </b>The goal of this management is to train managers in the biopharmaceutical, bio agricultural, bio-supplier, bio-services, and bioinformatics industries. The course structure has been created to meet the demands of this industry.</li>
                                            <li><b>IT - </b> With the typical business understanding of an MBA combined with specialist courses on information security, telecommunications, and IT project management, to mention a few, an MBA in IT will equip you with the abilities required to manage both IT systems and personnel.</li>
                                            <li><b>Operations & Production - </b>The management of the procedures and activities used by businesses to create their products and services falls under the category of production and operations. It is the research into the planning, running, and enhancement of production systems for effectiveness and efficiency.</li>
                                            <li><b>International Business Development - </b>Similar to a conventional MBA, an MBA in International Business also teaches you the leadership and communication skills required to succeed in multinational firms, as well as information on international markets, global economics, and cross-border partnerships.</li>
                                            <li><b>Total Quality Management - </b>The MBA in Total Quality Management is made to meet the high-level academic and professional needs of managers in the public and private sectors of the economy who want to alter the management culture of business and raise the standards of management practices to those of international best practices.</li>
                                            <li><b>Project Management - </b>Graduates who combine their project management training with an MBA have a more comprehensive understanding of how projects can help overall business operations. It comes with definite advantages by nature. The future of business lies in project management.</li>
                                            <li><b>Retail - </b>Knowledge of the management of the retail industry is provided via an MBA in Retail Management. In order to streamline the retail process, key managerial skills must be learned and practiced through this program.</li>
                                            <li><b>Medical Plants & Agriculture - </b>The student learns the methods used in the production and distribution of foods and fibers, as well as related business concepts, in the Master of Business Administration course in Agriculture.</li>
                                            <img class="mbaimg_group" src="<?=base_url();?>landing_assets/images/mba_7.png">
                                            <li><b>Health Administration - </b>A two-year postgraduate management degree program called the MBA in Healthcare Management prepares students to oversee various operations in healthcare systems like hospitals and pharmaceutical corporations.</li>
                                            <li><b>Management - </b>A student with a general management MBA will be prepared to enter a variety of industries and professional pathways because it covers numerous business-related topics. Graduating students should anticipate gaining a solid understanding of financial models, human resource management, as well as marketing, and corporate strategy.</li>
                                            <li><b>Business Analytics - </b>One of the most popular MBA specializations available is the MBA in Business Analytics, an MBA degree with a focus on analytics. The course material covers the principles of business while preparing you to approach a company from a data-driven viewpoint.</li>
                                            <li><b>Marketing Management - </b>The most popular mainstream course is an MBA in marketing. Students with an MBA in Marketing who possess strong marketing skills are always in demand because marketing is the driving force behind any organization that brings in customers and money for the business.</li>
                                            <img class="mbaimg_group" src="<?=base_url();?>landing_assets/images/mba_8.jpg">
                                            <li><b>Hospital Management - </b>The two-year postgraduate MBA Hospital Management program's goal is to give students a comprehensive understanding of the dynamics of the healthcare industry. The planning, controlling, and management of the healthcare system and its administration are the primary foci of this professional degree.</li>
                                            <li><b>Data Science - </b>The MBA in Data Science and Analytics is a specialized program that trains professionals to address complex business problems in the future that call for the integration of data-driven decision-making modules into IT, contemporary software, and mobile applications.</li>
                                         </ul>
                             </div>
                       </div>
                   
                      <div class="container info_group">
                        <div class="elgi_mba">
                            <h3 class="course_heading">Eligibility Criteria - </h3>
                             <p>Candidates must have passed at least a Bachelor's Degree Examination <b> (3 years)</b></p>
                             <h3 class="course_heading"> Skillset Required For MBA  </h3>
                             <img class="mbaimg_group" src="<?=base_url();?>landing_assets/images/mba_9.png">
                        </div>
                      </div>

                        <div class="container info_group">
                            <div class="admin_mba">
                                <h3 class="course_heading">BTU’s Admission Process for MBA in 2022-23 </h3>   
                                <p>Candidates for admission must complete the application form according to the instructions below.</p>
                                
                                <p><b>Step 1 - </b>Visit the official website of THE GLOBAL UNIVERSITY <a href="<?=base_url()?>" target="_blank" >https://www.theglobaluniversity.edu.in/</a> then select the "Admission" tab. Select “Admission Form” and fill in details respectively.</p>
                                <p><b>Step 2 - </b>The application must be completed with the required information following successful registration.</p>
                                <p><b>Step 3 - </b>Pay Admission Fees</p>
                                <p><b>Step 4 - </b>Upload Required Documents</p>
                                <p><b>Step 5 - </b>To finish the Admission procedure, Submit and Wait For the Document's Approval Verification.</p>
                            </div>
                        </div>

                      <div class="container info_group">
                        <div class="doc_need_mba">
                        <h3 class="course_heading">Documents Needed During The Admission Process</h3> 
                           <ul>
                            <li>Class 10th Mark Sheet</li>
                            <li>Class 12th Mark Sheet</li>
                            <li>Aadhar Card</li>
                            <li>Debit/Credit Card Details </li>
                            <li>Passport Size Photo</li>
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