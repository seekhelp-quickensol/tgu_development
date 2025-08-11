<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>Diploma In Horticulture (DIH)  | Global University </title>
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
                            <div class="herotext_2">Admission Open For DIH 2022-23</div>
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
                                    <input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="Diploma In Horticulture">
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
            background: url("landing_assets/images/BTU/hoticulture1.jpg");
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
                <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Diploma In Horticulture   
                </span> <span class="edu_p_mob">DIH</span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Diploma In Horticulture (DIH) </h2>
                    
                        <div class="row horti_main">
						     <div class="container info_group">
                                    <div class="col-lg-6 col-md-12 col-sm-12 d_pharm_img">
                                            <img src="<?=base_url();?>landing_assets/images/Diploma in Horticulture (DIH)-1.png">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 d_pharm_info">
                                            <p class="capitalize">   A diploma in Horticulture is a particular field of farming that includes ranch and the administration of the plants. Nonetheless, farming is a wide region where the up-and-comers concentrate on harvests and animals and their administration. A recognition in Horticulture shows plant development, blossoms, trees, cultivation, and various bugs and worms which influence the plants.  </p>
                                           <p class="capitalize">A cultivation proficient utilizes his particular information and abilities in the creation of different kinds of yields and plants. The reason for offering a Diploma in Horticulture course is to deliver experts who might be engaged with practical ranch and review of unhealthy plants and harvests. They likewise recommend answers for getting obstruction against plant bugs.</p>
                                    
                                        </div>
						     </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="about_horti">
                                <h3 class="course_heading">Diploma In Horticulture What Is It About?</h3>
                                <p>A certificate in Horticulture is a course That is sought after by the up-and-comer after the opposition in class tenth examinations. It manages the investigations of strategies and procedures associated with the development of plant harvests and blooming plants.</p>
                                <p>A Horticulture proficient utilizes his specific information and expertise in creating various sorts of yields and plants. The reason for offering a Diploma in Horticulture is to deliver experts who might be engaged with economical manner and examination of unhealthy plants and yields they likewise propose answers for getting obstruction against plant vermin and bugs.</p>
                                <p>The term of confirmation in Horticulture is from one year to two years. The agriculture Diploma is about plant development and the administration of plants. Agriculture is a particular part of the manor where the understudies concentrate on the systems and strategies engaged with the development of plants, blossoms, and yields.</p>
                                <p>The Horticulture field can be isolated into three classes: Pomology, fancy agriculture, and Olericulture. The up-and-comers chasing after recognition in Horticulture make their profession in the fields of home planting, arboriculture, metropolitan cultivating, and gardening.</p>
                            
                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="why_horti">
                                        <h3 class="course_heading">Why Study Diploma In Horticulture?</h3>
                                        <p>A diploma in Horticulture is a short duration undergraduate 2-year diploma course. The course has so advantages, some of which are discussed below:</p>
                                       <ul>
                                        <li>The competitors having this recognition course can take their action into various professional fields of cultivation.</li>
                                        <li>The need for horticulturists has gotten energy as the public authority has been finding a way more ways to control the rising contamination level in the urban communities.</li>
                                        <li>In India, a greater part of individuals doesn't know how to build development yields by utilizing the logical strategies for cultivation. Thus, there are many chances in India to satisfy the need for horticulturists.</li>
                                        <li>The up-and-comers holding the recognition in cultivation are furnished with an exceptional reservation during admission to the B.Sc. course.</li>
                                      
                                    </ul>
                             </div>
                        </div>

                        <div class="container info_group">
                        <div class="crit_horti">
                            <h3 class="course_heading">Diploma In Horticulture Eligibility Criteria</h3>
                              <p class="capitalize">The minimum eligibility for admission with a diploma in horticulture is given below</p>
                              <ul>
                                <li>The candidate must Finish HSC In the PCB category.</li>
                                  <li>In certain states, inclinations in affirmation are given to the children of ranchers. A specific measure of seats is held for them. </li>
                            </ul>
                        </div>
                        </div>
                   
                      <div class="container info_group">
                        <div class="addmi_proce">
                            <h3 class="course_heading">Diploma In Horticulture Admission Process</h3>
                           <p class="capitalize">There is no particular selection test for a certificate in cultivation course. Confirmation is for the most part finished on a legitimacy premise. Understudies execution in the class tenth board is considered as a confirmation in the certificate in cultivation course.</p>
                           <p class="capitalize">However, admission also depends upon various factors like the number of seats available in an institute for a specific course, category-wise reservation, etc</p>
                      
                        </div>
                      </div>

                        <div class="container info_group">
                            <div class="career_horti">
                            <h3 class="course_heading">Diploma In Horticulture Career Option And Job Perspective</h3>   
                            <p>After the fulfillment of the Diploma in Horticulture course, an up-and-comer can decide to work in different areas like farming, the Pharmaceutical industry, fragrances and beauty care products creation enterprises, and so forth. The applicant can likewise set up his business.</p>
                            <p>Developing vegetables, natural products, and blossoms are one of the significant business potential open doors accessible for the people who need to be associated with the business. Applicants can go for innovative work as well as agribusiness scene the executives later on.</p>   
                            <p>Some of the job roles that a candidate who completes a diploma in horticulture course can choose from are as follows -</p>
                            <ul>
                                <li>Horticulturist </li>
                                <li>Floriculturist</li>
                                <li>Pomologist</li>
                                <li>Pest Controller</li>
                                <li>Marketing Professional</li>
                                <li>Sales Executive</li>
                            </ul>
                        </div>
                        </div>

                      <div class="container info_group">
                        <div class="scope_horti">
                        <h3 class="course_heading">Diploma In Horticulture Future Scope</h3> 
                         <p class="capitalize">The field of cultivation is filling sought after as it is everything about Endlessly established Management.</p>
                          <ul>
                            <li>Today, all that we eat isn't unadulterated, and individuals are becoming mindful of natural food sources. They will be leaned toward natural food. Horticulturists will be sought after, in India as well as in different nations of the world. Individuals love unadulterated, natural vegetables that are developed with natural cultivation.</li>
                          <li>Contamination has turned into a perplexing issue in metropolitan regions because of smoke from vehicles and manufacturing plants. In any case, the best way to control it is by developing an ever-increasing number of plants here. The Govt. has felt the requirement for parks/gardens, and to satisfy these ventures, it will employ horticulturists in the country.</li>
                           <li>Gardening and pomology are the fields of agriculture where the applicants can track down open doors.</li>
                        
                        </ul>

                        </div>
                      </div> 
                           
                     <div class="container info_group">
                        <div class="horti_qa">
                          <h3 class="course_heading">Diploma In Horticulture: FAQs</h3>
                          <p><u><b class="que">Question - </b></u>Which are the sectors in which a Horticulturist can make his career? </p>
                          <p><u><b class="ans">Answer - </b></u> A Horticulturist can make his career in the following preferred branches of Horticulture:</p>
                                             <ul>
                                                <li>Food Corporation</li>
                                                <li>Agriculture Product Selling</li>
                                                <li>Gardening</li>
                                                <li>Agriculture Research</li>
                                                <li>Irrigation Department</li>
                                             </ul>

                          <p><u><b class="que">Question - </b></u> Are there any Cons to the Diploma in Horticulture course?</p>
                          <p><u><b class="ans">Answer - </b></u>There are a lot of opportunities for a Horticulture Diploma. In any case, a few Cons are likewise engaged in the field.</p>
                            <p class="capitalize">They stay presented to synthetic compounds and harmful substances.</p>
                            <p class="capitalize">They have broad restricted positions in research regions.</p>
                          <p><u><b class="que">Question - </b></u>What is the job of an ornamental horticulturist?</p>
                          <p><u><b class="ans">Answer - </b></u>As the name suggests, an ornamental horticulturist works for the decoration of plants and flowers. The role of an ornamental horticulturist is at the shop of florists, home to design Bouquets, Corsages, and other home plants.</p>

                          <p><u><b class="que">Question - </b></u> When is a student considered qualified?</p>
                          <p><u><b class="ans">Answer - </b></u> A student is considered qualified for the diploma in Horticulture based on the overall performance during the course. He ought to cover the base required credits in the Diploma course. He ought to make the base required the participation in the Diploma course.</p>
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