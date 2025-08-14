<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>Btech| GLOBAL University </title>
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
    width: 1050px;
    margin-bottom:15px;
    
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



.img_group{
    width:1000px;
    margin-bottom:15px;
    margin-top:15px;
}

.img_group1{
    width:1000px;
    margin-bottom:15px;
    margin-top:15px;
    margin-left:35px;
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
                <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Btech    
                </span> <span class="edu_p_mob"></span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Btech </h2>
                    
                        <div class="row btech_main">
						     <div class="container info_group">
                             <h3 class="course_heading">Btech admissions 2022 </h3>
                             <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_info">
                             <h3 class="course_heading">Why You should choose engineering as a career? </h3>
                                            <p>There are many reasons to choose engineering as a <b> career.</b> Engineering is a field that is constantly evolving and changing, which means there are always new challenges to keep things interesting. Additionally, <b> engineering</b> can be a gratifying field, both <b> financially</b> and in terms of job satisfaction. Those who choose engineering as a career can feel confident that they will always have a job that is in high demand.
</p>
                                        </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_img">
                                            <img src="<?=base_url();?>landing_assets/images/BTU B.Tech Content-1.jpg">
                                    </div>
                                    <p>It is a <b>stable field</b>with <b>good job</b>prospects. Engineers can work in many different <b>industries,</b> and there are many different types of engineering. This demonstrates that there is always new information to <b>learn.</b>Engineering is a great career for people who are interested in <b>problem-solving</b>and working with their hands.</p>
						     </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="admi_btech">
                                <h3 class="course_heading">Engineering Admissions 2022-23 At BTU</h3>
                               <p>BTU features more than <b> 30 different</b> specializations for its BTech programs. Valid mark sheets and a counseling session are required for admission to this degree.</p>
                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="specil_btech">
                            <p><b> BTU University's</b> BTech Program For the Year 2022-23</p>
                           
                           
                            <table>
                                <tr>
                                    <th colspan="2" > Specializations
</th>
                                </tr>
                                <tr>
                                    <th>Environmental Engineering</th>
                                    <th>Mining Engineering & Production</th>
                                </tr>
                                <tr>
                                    <th>Chemical Engineering</th>
                                    <th>Mechatronics</th>
                                </tr>
                                <tr>
                                    <th>Polymer Engineering</th>
                                    <th>Production Technology</th>
                                </tr>
                                <tr>
                                    <th>Fire & Safety Engineering</th>
                                    <th>instrumentation & Control Engineering</th>
                                </tr>
                                <tr>
                                    <th>FOOD TECHNOLOGY</th>
                                    <th>Petroleum Engineering</th>
                                </tr>
                                <tr>
                                    <th>Automobile</th>
                                    <th>Biomedical Engineering</th>
                                </tr>
                                <tr>
                                    <th>Bio-Technology</th>
                                    <th>Electrical & Electronics Engineering</th>
                                </tr>
                                <tr>
                                    <th>Architecture</th>
                                    <th>Chemical</th>
                                </tr>
                                <tr>
                                    <th>Civil Engineering</th>
                                    <th>Aeronautical Engineering</th>
                                </tr>
                                <tr>
                                    <th>Electrical Engineering</th>
                                    <th>Computer Science</th>
                                </tr>
                                <tr>
                                    <th>BTech Integrated</th>
                                    <th>Mechanical Engineering</th>
                                </tr>
                                <tr>
                                    <th>Electronics & Tele Communication Engineering</th>
                                    <th>Information Technology</th>
                                </tr>
                                <tr>
                                    <th>Water Resources</th>
                                    <th>Leather Technology & Cosmetology</th>
                                </tr>
                                <tr>
                                    <th>Metallurgical</th>
                                    <th>Textile Technology</th>
                                </tr>
                                <tr>
                                    <th>Applied Electronics & Instrumentation</th>
                                    <th>Electronics & Communication Engineering</th>
                                </tr>
                                <tr>
                                    <th>Electronics</th>
                                    <th></th>
                                </tr>


                            </table>


                            </div>
                        </div>

                        <div class="container info_group">
                        <div class="eligi_ophtha">
                            <h3 class="course_heading">B Tech Particular Branches At BTU</h3>
                              <p>You have access to more than 50 B.Tech subject options. All B Tech majors are not, however, offered by all Indian schools and universities. While other B Tech fields, like mechanical and civil, can be found in any university in the nation.</p>
                             <ul>
                                <li><b>Fire & Safety Engineering - </b>Fire Safety In preparation for a severe occurrence, engineers create systems and structures that are latent within our constructed world. For people within a building to escape, for the fire and rescue services to function, and for the protection of property, knowledge, technology, and engineering that contribute to fire safety are essential.</li>
                                <li><b>Biotechnology for B Tech - </b> Engineering biological creatures for human benefit is the focus of B Tech Biotechnology.</li>
                                <li><b>Polymer Engineering - </b> Designing, analyzing, and modifying polymer materials is the general focus of polymer engineering.</li>
                            </ul>
                            <img class="img_group1" src="<?=base_url();?>landing_assets/images/BTU B.Tech Content-3.jpg">
                            
                            <ul>
                                <li><b>Leather Technology & Cosmetology - </b>Engineering's field of leather technology focuses on the synthesis, manufacture, and refinement of leather for practical application. It also covers the creation of synthetic leather and how effectively commercial products may be made using it.</li>
                                <li><b>Water Resources engineering - </b>Water collection, storage, control, transportation, regulation, measurement, and use concerns are addressed by hydraulic and water resource engineering, which applies fluid mechanics principles to these issues.</li>
                                <li><b>Applied Electronics & Instrumentation - </b>Many different cadres, including design, development, automation, control, fabrication, inspection, quality control, maintenance, and service, etc.</li>
                                <li><b>Environmental Engineering - </b>Environmental engineers create answers to environmental issues using engineering, soil science, biology, and chemistry principles. They strive to make recycling, waste management, public health, and air and water pollution control better.</li>
                                <li><b>Chemical Engineering - </b>Designing and troubleshooting processes for the manufacture of chemicals, fuels, foods, pharmaceuticals, and biologicals, to name a few, is the primary responsibility of chemical engineers. Large-scale industrial facilities use them most frequently to enhance productivity and product quality while lowering expenses.</li>
                                <li><b>FOOD TECHNOLOGY - </b>Designing and troubleshooting processes for the manufacture of chemicals, fuels, foods, pharmaceuticals, and biologicals, to name a few, is the primary responsibility of chemical engineers. Large-scale industrial facilities use them most frequently to enhance productivity and product quality while lowering expenses.</li>

                                <li><b>FOOD TECHNOLOGY - </b>Food engineering is a scientific, academic, and professional area that analyses and applies engineering, science, and math principles to the production, handling, storage, conservation, control, packaging, and distribution of food products.</li>
                                <li><b>Automobile - </b>Engineering for automobiles. Automobile engineering is a subfield of engineering that teaches automobile production, design, mechanical mechanisms, and operation. It serves as an introduction to the engineering of vehicles, including trucks, buses, cars, and motorbikes.</li>
                                <li><b>Architectural engineering - </b>Architectural engineering is the study of designing all building systems, such as the mechanical, electrical and structural systems of a building, as well as organizing the building and building system development process.</li>

                                <li><b>Textile Technology - </b>Biotechnology One of the most advanced and productive fields of science and technology in engineering. The field focuses on physics, chemistry, biology, engineering, and math concepts and principles combined to create goods and technology that improve human existence.</li>
                                
                                <img class="img_group" src="<?=base_url();?>landing_assets/images/BTU B.Tech Content-5.jpg">

                                <li><b>Civil engineering - </b>Civil engineering is a career that involves planning and building infrastructure for the general public, including highways, power plants, sewage systems, bridges, aqueducts, canals, dams, and other structures.</li>
                                <li><b>Electronics & Communication Engineering - </b> Research, design, development, and testing of electronic equipment utilized in diverse systems are all part of electronics and communications engineering (ECE). Engineers in electronics and communications also design and direct the production of broadcast and communication systems.</li>

                                <li><b>Electrical Engineering - </b>Electric motors, radar and navigation systems, communications systems, or equipment used in power generation are just a few examples of electrical equipment that electrical engineers design, develop, test, and oversee the production of electrical systems of cars.</li>
                              
                                <img class="img_group" src="<?=base_url();?>landing_assets/images/BTU B.Tech Content-6.jpg">
                               
                                <li><b>BTech Integrated - </b>One receives a combined bachelor's and master's degree through an integrated curriculum. It offers dual degree programs, which are those that grant degrees in two distinct areas.</li>
                                <li><b>Electronics & Tele Communication Engineering - </b>Engineers in electronics and telecommunications are involved in the design, development, testing, and maintenance of telecommunications equipment and its parts. Thus, integrated circuit components for telecommunication systems and equipment are developed by electronics and communications engineers.</li>

                                <li><b>Metallurgical Engineering - </b> Engineers in the field of metallurgy research and make the materials that power our bodies and the rest of the planet. They convert metals into high-performance alloys, high-purity metals, and novel materials that are used in a wide range of products, such as superconductors, sophisticated coatings, automobiles, airplanes, and medical implants</li>
                                <li><b>Electronics engineering - </b>Electronics engineers create and design a variety of electronic gadgets, such as portable music players and Global Positioning System (GPS) devices, as well as broadcast and communications systems. Many people also work in fields that are directly related to computer hardware.</li>
                                <li><b>Mining Engineering - </b>These raw minerals can be collected and refined thanks to mining engineers. Both technical design and business management are involved in the work. Mining engineers identify the locations of reserves of valuable and easily accessible materials. They come up with strategies to get them out of the ground securely.</li>
                                <img class="img_group" src="<?=base_url();?>landing_assets/images/BTU B.Tech Content-7.jpg">

                                <li><b>Mechatronics - </b>Robotics, electronics, computer science, telecommunications, systems, control, and product engineering are all included in this interdisciplinary field of engineering, which focuses on the integration of mechanical, electronic, and electrical engineering systems.</li>
                                <li><b>Production Technology - </b>Planning, creating, developing, and managing diverse processes to generate high-quality products is the focus of production engineering, sometimes referred to as manufacturing engineering.</li>
                                <li><b>Instrumentation & Control Engineering - </b>investigates system design and implementation, as well as the measurement and control of process variables. Process variables include force, speed, flow, pH, temperature, humidity, and pressure.</li>
                                <li><b>Petroleum Engineering - </b>The processes involved in the production of hydrocarbons—which might be either crude oil or natural gas—are the focus of petroleum engineering, a branch of engineering.
                                    As far as the oil and gas business is concerned, exploration and production are considered to be upstream activities.</li>
                                <li><b>Biomedical Engineering - </b>This application of engineering concepts and design principles to biology and medicine for healthcare reasons is known as biomedical engineering or medical engineering.</li>
                                <li><b>Electronic engineering - </b>This engineering field deals with the creation, maintenance, and use of electronic circuits, systems, and equipment.</li>

                                <li><b>Aeronautical Engineering-</b>The principal area of engineering dealing with the creation of aircraft and spacecraft is aerospace engineering. Aeronautical engineering and astronautical engineering are two of their main, overlapping fields. In addition to investigating the aerodynamic performance of aircraft and building materials, their main responsibilities include developing aircraft and propulsion systems.</li>
                                <img class="img_group" src="<?=base_url();?>landing_assets/images/BTU B.Tech Content-8.jpg">
                                <li><b>Computer Science - </b>The study of computing, automation, and information is known as computer science. Theoretical and practical fields are both covered by computer science.</li>
                                <li><b>Mechanical Engineering - </b>To design, analyze, construct, and maintain mechanical systems, mechanical engineers use a combination of materials science, engineering physics, and mathematical principles.</li>

                                <li><b>Information technology - </b>Information technology is the practice of generating, processing, storing, retrieving, and exchanging various types of electronic data and information using computers.</li>
                                
                            </ul>

                            </div>
                        </div>
                   
                      <div class="container info_group">
                        <div class="fulltime_btech">
                            <h3 class="course_heading">Full-Time B Tech Courses At BTU -</h3>
                           <p>An ability-based course with a stronger focus on practical learning is the B Tech Full Time or B Tech Regular Course. Full-time B Tech programs last four years. </p>
                          <ul>
                            <li>Engineering courses that are offered full-time are the most popular. In India, more than <b> 1 million </b> students pursue full-time B Tech studies each year.</li>
                         <li>The distinction between a Bachelor of Technology and a BE program is that a Bachelor of Technology program places a <b> greater interest</b> in research than in <b>practical application.</b></li>
                          <li>Qualification for 10+2 with physics, chemistry, and maths is the requirement for admission to full-time <b> B Tech programs.</b> However, additional requirements for entrance tests vary from college to college.</li>
                        </ul>
                        
                        </div>
                      </div>

                        <div class="container info_group">
                            <div class="enroll_btech">
                            <h3 class="course_heading">The following is a list of the requirements for enrollment in the B Tech program:-</h3>   
                        <ol>
                            <li>Candidates who have completed a <b> relevant diploma </b> program are also qualified to enroll in the <b> Bachelor of Technology/Engineering.</b></li>
                            <li>Students must have earned a 10+2 diploma with Physics, Math, and Chemistry as their <b> core subjects </b>from an accredited board.</li>
                        </ol>
                        <img class="img_group" src="<?=base_url();?>landing_assets/images/BTU B.Tech Content-10.jpg">
                        </div>
                        </div>

                      <div class="container info_group">
                        <div class="entry_btech">
                        <h3 class="course_heading">Lateral Entry for B Tech At BTU</h3> 
                         <p>Entrance exams are required for B Tech Lateral Entry applicants. Students with a Diploma or BSc in an appropriate <b> technological field </b> or engineering who wish to enroll in the Bachelor of Technology programme in the <b> third semester</b> may do so through the B Tech Lateral Entry option.</p>
                         <img class="img_group" src="<?=base_url();?>landing_assets/images/BTU B.Tech Content-11.jpg">
                        </div>
                      </div> 
                           
                        <div class="container info_group">
                            <div class="subje_btech">
                               <h3 class="course_heading">Technical Subjects At BTU-</h3>
                                              <p>The Bachelor of Technology offers various <b> specialization options.</b> All B Tech specialties require students to take the same core courses, including <b> physics, chemistry, math, communication skills, environmental science, engineering mechanics, basic electrical engineering, engineering graphics,</b> etc. The following three years are dedicated to teaching the fundamentals of the Bachelor of Technology speciality.</p>
                                            <p>The B Tech subject varies depending on the specialties that are provided, however the B Tech Syllabus in the bulk of the country's <b> universities</b> is essentially the same with a few minor differences.</p>
                                <p>Admissions for BTU University BTech Admission <b> 2022/23 </b></p>
                                
                                </div>
                            </div>

                            <div class="container info_group">
                            <div class="admi_proces_btech">
                               <h3 class="course_heading">BTU’s Admission Process for BTech in 2022-23</h3>
                                   <p><span> Step 1</span>Visit the official website of THE GLOBAL UNIVERSITY <a href="#">https://www.theglobaluniversity.edu.in/</a>then select the "Admission" tab. Select “Admission Form” and fill details respectively.</p>
                                   <p><span> Step 2</span>The application must be completed with the required information following successful registration.</p>
                                   <p><span> Step 3</span>Pay Admission Fees</p>
                                   <p><span> Step 4</span>Upload Required Documents</p>
                                   <p><span> Step 5</span>To finish the Admission procedure, Submit and Wait For the Docu</p> 
                               </div>
                            </div>

                            <div class="container info_group">
                            <div class="doc_tech">
                               <h3 class="course_heading">Documents Needed During the Admission Process-</h3>
                                  <ol>
                                    <li>Class 10th Mark Sheet</li>
                                    <li>Class 12th Mark Sheet</li>
                                    <li>Adhar Card</li>
                                    <li>Debit/credit card details </li>
                                    <li>Passport Size Photo</li>
                                  </ol>
                            
                            </div>
                            </div>

                            <div class="container info_group">
                            <div class="placeme_btech">
                               <h3 class="course_heading">Placements At BTU</h3>
                               <p>Choosing a career is a difficult decision, but if you're interested in engineering, it can be a great choice. <b> Students</b> and <b>businesses</b> are connected with BTU University's <b> Career Development Center.</b> Engineering offers many opportunities to use your creativity and problem-solving skills. You'll also have the chance to work on cutting-edge <b> technologies </b> and make a difference in the <b> world. </b> If you're looking for a challenging and rewarding career, engineering is a great option. </p>  
                                <p>However, the <b> 20+ hiring partners </b> list the major achievements in placements at BTU University during the course of the previous years.</p>


                            </div>
                            </div>

                            <div class="container info_group">
                            <div class="profile_btech">
                               <h3 class="course_heading">Top Job profiles After Engineering </h3>
                                  <p>Over the years, technologies including machine learning, cloud computing, data analytics, and artificial intelligence have expanded quickly. They have become crucial in today's society with the spread of the pandemic and the global health problem.</p>
                                  <img class="img_group" src="<?=base_url();?>landing_assets/images/BTU B.Tech Content-13.jpg">
                            
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
