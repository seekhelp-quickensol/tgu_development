<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>B Tech Course in India | Birtikendrajit University </title>
	<link rel="canonical" href="https://www.theglobaluniversity.edu.in/university-courses"/>
	<meta name="author" content="BIR TIKENDRAJIT UNIVERSITY">
	<meta name="keywords" content="">
	<meta name="Description" content="Admissions open now atTHE GLOBAL UNIVERSITY, we offer B Tech courses, Engineering | Course Admissions | Top university in Manipur India"> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="icon" href="https://www.theglobaluniversity.edu.in/favicon.ico">
	<link rel="shortcut icon" href="https://www.theglobaluniversity.edu.in/images/logo/5946920e9234e40ca915a088283a8e5c.png" />
    <link href="landing_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="landing_assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="landing_assets/js/bootstrap.bundle.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="https://www.theglobaluniversity.edu.in/favicon.ico">
	
	<link rel="shortcut icon" href="https://www.theglobaluniversity.edu.in/images/logo/5946920e9234e40ca915a088283a8e5c.png" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
         
		.home_banner{
			min-height:450px !important;
			background: url(landing_assets/images/btech_banner.jpg);
		}
    </style>
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172017165-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-172017165-1');
</script>

<!-- Global site tag (gtag.js) - Google Ads: 595335465 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-595335465"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-595335465');
</script>



</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg_p1 shadow mob_bg">
        <div class="container">
        <a class="navbar-brand" href="<?=base_url();?>"> <img src="landing_assets/logo/btu_new.png" class="logo">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
        <div class="hamburger-toggle">
          <div class="hamburger">
<img src="landing_assets/images/menu-button-of-three-horizontal-lines.png" width="16" height="16">
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
                            <h2 class="herotext">Bachelor <br>of Technology</h2>
                            <div class="herotext_2">Admission open for B.Tech 2022-23</div>
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
								<input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="Bachelor of Technology (B.Tech)">
                                </div>
								<div class="clearfix" style="margin-bottom: 5px;"></div>
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
                            <img src="landing_assets/images/1.png" class="three_img">
                            <p>Accorded Institution of Eminence by UGC, AICTE Govt. of India</p>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="tabs">
                            <img src="landing_assets/images/2.png" class="three_img">
                            <p>No. 1 Private University in India by Education World Ranking <?=date("Y")?></p>
                        </div>


                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="tabs">
                            <img src="landing_assets/images/3.png" class="three_img">
                            <p>A legacy of the field of Higher Education</p>
                        </div>

                    </div>
                    <hr class="tabs_hr">

                </div>
            </center>
        </div>
    </section>


    <div class="container">

        <div class="edu_tabs" style="text-align:center">
            <a class="active showSingle" target="1">
                <li> <img src="landing_assets/images/t1.png"> <span class="edu_p">Bachelor of Technology (B.Tech) </span> <span class="edu_p_mob">B.Tech</span> </li>
            </a> 
        </div> 
        <div id="div1" class="targetDiv">
            <h2 class="course_heading">Why You should choose engineering as a career? </h2>
			<p class="class_paragraph">There are many reasons to choose engineering as a career. Engineering is a field that is constantly evolving and changing, which means there are always new challenges to keep things interesting. Additionally, engineering can be a gratifying field, both financially and in terms of job satisfaction. Those who choose engineering as a career can feel confident that they will always have a job that is in high demand.</p>
			<img class="course_image img-responsive" src="<?=base_url();?>landing_assets/images/btech.jpg">
			<p class="class_paragraph">It is a stable field with good job prospects. Engineers can work in many different industries, and there are many different types of engineering. This demonstrates that there is always new information to learn. Engineering is a great career for people who are interested in problem-solving and working with their hands.</p>
			<h2 class="course_heading">Engineering Admissions 2022-23 At BTU </h2>
			<p class="class_paragraph">BTU features more than 30 different specializations for its BTech programs. Valid mark sheets and a counseling session are required for admission to this degree.</p>
			<p class="class_paragraph"><b>BTU University's</b> B Tech Program For the Year 2022-23</p>
			<h3 class="course_heading">Specializations</h3>
			<ul class="unorder_list tick_class specializations_list">
				<li> Environmental Engineering</li>
				<li> Chemical Engineering</li>
				<li> Mechatronics</li>
				<li> Polymer Engineering</li>
				<li> Production Technology</li>
				<li> Fire & Safety Engineering</li>
				<li> Instrumentation & Control Engineering</li>
				<li> Food Technology</li>
				<li> Petroleum Engineering</li>
				<li> Automobile</li>
				<li> Biomedical Engineering</li>
				<li> Bio-Technology</li>
				<li> Electrical & Electronics Engineering</li>
				<li> Architecture</li>
				<li> Chemical</li>
				<li> Civil Engineering</li>
				<li> Aeronautical Engineering</li>
				<li> Electrical Engineering</li>
				<li> Computer Science</li>
				<li> B Tech Integrated</li>
				<li> Mechanical Engineering</li>
				<li> Electronics & Tele Communication Engineering</li>
				<li> Information Technology</li>
				<li> Water Resources</li>
				<li> Leather Technology & Cosmetology</li>
				<li> Metallurgical</li>
				<li> Textile Technology</li>
				<li> Applied Electronics & Instrumentation</li>
				<li> Electronics & Communication Engineering</li>
				<li> Electronics</li>
			</ul>
			<div class="clearfix"></div>
			<h2 class="course_heading">B Tech Particular Branches At BTU -</h2>
			<p class="class_paragraph">You have access to more than 50 B.Tech subject options. All B Tech majors are not, however, offered by all Indian schools and universities. While other B Tech fields, like mechanical and civil, can be found in any university in the nation.</p>
			<ul class="unorder_list">
				<li><b>Fire & Safety Engineering</b>- Fire Safety In preparation for a severe occurrence, engineers create systems and structures that are latent within our constructed world. For people within a building to escape, for the fire and rescue services to function, and for the protection of property, knowledge, technology, and engineering that contribute to fire safety are essential.</li>
				<li><b>Biotechnology for B Tech</b> -  Engineering biological creatures for human benefit is the focus of B Tech Biotechnology.</li>
				<li><b>Polymer Engineering</b> - Designing, analyzing, and modifying polymer materials is the general focus of polymer engineering.</li>
				<img class="course_image img-responsive" src="<?=base_url();?>landing_assets/images/Polymer-Engineering.jpg">
				<li><b>Leather Technology & Cosmetology</b> - Engineering's field of leather technology focuses on the synthesis, manufacture, and refinement of leather for practical application. It also covers the creation of synthetic leather and how effectively commercial products may be made using it.</li>
				<li><b>Water Resources engineering</b> - Water collection, storage, control, transportation, regulation, measurement, and use concerns are addressed by hydraulic and water resource engineering, which applies fluid mechanics principles to these issues.</li>
				<li><b>Applied Electronics & Instrumentation</b> - Many different cadres, including design, development, automation, control, fabrication, inspection, quality control, maintenance, and service, etc.</li>
				<li><b>Environmental Engineering</b> - Environmental engineers create answers to environmental issues using engineering, soil science, biology, and chemistry principles. They strive to make recycling, waste management, public health, and air and water pollution control better.</li>
				<li><b>Chemical Engineering</b>- Designing and troubleshooting processes for the manufacture of chemicals, fuels, foods, pharmaceuticals, and biologicals, to name a few, is the primary responsibility of chemical engineers. Large-scale industrial facilities use them most frequently to enhance productivity and product quality while lowering expenses.</li>
				<li><b>Food Technology</b> - Food engineering is a scientific, academic, and professional area that analyses and applies engineering, science, and math principles to the production, handling, storage, conservation, control, packaging, and distribution of food products.</li>
				<li><b>Automobile</b> - Engineering for automobiles. Automobile engineering is a subfield of engineering that teaches automobile production, design, mechanical mechanisms, and operation. It serves as an introduction to the engineering of vehicles, including trucks, buses, cars, and motorbikes.</li>
				<li><b>Architectural Engineering</b> - Architectural engineering is the study of designing all building systems, such as the mechanical, electrical and structural systems of a building, as well as organizing the building and building system development process.</li>
				<li><b>Textile Technology</b> - A thorough academic curriculum in textile technology equips students for professions in the design, development, and production of goods for a number of industries, including aerospace, medical, architecture, the automotive industry, fashion, sports, and many more.</li>
				<li><b>Bio-Technology Engineering</b> - Biotechnology One of the most advanced and productive fields of science and technology is engineering. The field focuses on physics, chemistry, biology, engineering, and math concepts and principles combined to create goods and technology that improve human existence.</li>
				<li><b>Civil Engineering</b> - Civil engineering is a career that involves planning and building infrastructure for the general public, including highways, power plants, sewage systems, bridges, aqueducts, canals, dams, and other structures.</li>
				<li><b>Electronics & Communication Engineering</b> - Research, design, development, and testing of electronic equipment utilized in diverse systems are all part of electronics and communications engineering (ECE). Engineers in electronics and communications also design and direct the production of broadcast and communication systems.</li>
				<li><b>Electrical Engineering</b> - Electric motors, radar and navigation systems, communications systems, or equipment used in power generation are just a few examples of electrical equipment that electrical engineers design, develop, test, and oversee the production of electrical systems of cars.</li>
				<img class="course_image img-responsive" src="<?=base_url();?>landing_assets/images/Electrical-Engineering.jpg">
				<li><b>B Tech Integrated</b> - One receives a combined bachelor's and master's degree through an integrated curriculum. It offers dual degree programs, which are those that grant degrees in two distinct areas.</li>
				<li><b>Electronics & Tele Communication Engineering</b> - Engineers in electronics and telecommunications are involved in the design, development, testing, and maintenance of telecommunications equipment and its parts. Thus, integrated circuit components for telecommunication systems and equipment are developed by electronics and communications engineers.</li>
				<li><b>Metallurgical Engineering</b> - Engineers in the field of metallurgy research and make the materials that power our bodies and the rest of the planet. They convert metals into high-performance alloys, high-purity metals, and novel materials that are used in a wide range of products, such as superconductors, sophisticated coatings, automobiles, airplanes, and medical implants</li>
				<li><b>Electronics Engineering</b> - Electronics engineers create and design a variety of electronic gadgets, such as portable music players and Global Positioning System (GPS) devices, as well as broadcast and communications systems. Many people also work in fields that are directly related to computer hardware.</li>
				<li><b>Mining Engineering</b> - These raw minerals can be collected and refined thanks to mining engineers. Both technical design and business management are involved in the work. Mining engineers identify the locations of reserves of valuable and easily accessible materials. They come up with strategies to get them out of the ground securely.</li>
				<img class="course_image img-responsive" src="<?=base_url();?>landing_assets/images/Mining-Engineering.jpg">
				<li><b>Mechatronics</b> - Robotics, electronics, computer science, telecommunications, systems, control, and product engineering are all included in this interdisciplinary field of engineering, which focuses on the integration of mechanical, electronic, and electrical engineering systems.</li>
				<li><b>Production Technology</b>- Planning, creating, developing, and managing diverse processes to generate high-quality products is the focus of production engineering, sometimes referred to as manufacturing engineering.</li>
				<li><b>Instrumentation & Control Engineering</b> - investigates system design and implementation, as well as the measurement and control of process variables. Process variables include force, speed, flow, pH, temperature, humidity, and pressure.</li>
				<li><b>Petroleum Engineering</b> - The processes involved in the production of hydrocarbons—which might be either crude oil or natural gas—are the focus of petroleum engineering, a branch of engineering. As far as the oil and gas business is concerned, exploration and production are considered to be upstream activities.</li>
				<li><b>Biomedical Engineering</b>- This application of engineering concepts and design principles to biology and medicine for healthcare reasons is known as biomedical engineering or medical engineering.</li>
				<li><b>Electronic Engineering</b> - This engineering field deals with the creation, maintenance, and use of electronic circuits, systems, and equipment.</li>
				<li><b>Aeronautical Engineering</b>- The principal area of engineering dealing with the creation of aircraft and spacecraft is aerospace engineering. Aeronautical engineering and astronautical engineering are two of their main, overlapping fields. In addition to investigating the aerodynamic performance of aircraft and building materials, their main responsibilities include developing aircraft and propulsion systems.</li>
				<img class="course_image img-responsive" src="<?=base_url();?>landing_assets/images/Aeronautical-Engineering.jpg">
				<li><b>Computer Science</b>- The study of computing, automation, and information is known as computer science. Theoretical and practical fields are both covered by computer science.</li>
				<li><b>Mechanical Engineering</b> - To design, analyze, construct, and maintain mechanical systems, mechanical engineers use a combination of materials science, engineering physics, and mathematical principles.</li>
				<li><b>Information Technology</b>- Information technology is the practice of generating, processing, storing, retrieving, and exchanging various types of electronic data and information using computers.</li> 
			</ul>
			<h3 class="course_heading">Full-Time B Tech Courses At BTU</h3>
			<p class="class_paragraph">An ability-based course with a stronger focus on practical learning is the B Tech Full Time or B Tech Regular Course. Full-time B Tech programs last four years. </p>
			<ul class="unorder_list">
				<li>Engineering courses that are offered full-time are the most popular. In India, more than <b>1 million</b> students pursue full-time B Tech studies each year.</li>
				<li>The distinction between a Bachelor of Technology and a BE programe is that a Bachelor of Technology programe places a <b>greater interest</b> in research than in <b>practical application</b>.</li>
				<li>Qualification for 10+2 with physics, chemistry, and maths is the requirement for admission to full-time <b>B Tech programes</b>. However, additional requirements for entrance tests vary from college to college.</li>
			</ul>
			<h3 class="course_heading">The following is a list of the requirements for enrollment in the B Tech program</h3>
			<ol class="unorder_list">
				<li>Candidates who have completed a <b>relevant diploma</b> program are also qualified to enroll in the <b>Bachelor of Technology/Engineering</b></li>
				<li>Students must have earned a 10+2 diploma with Physics, Math, and Chemistry as their <b>core subjects</b> from an accredited board.</li>
			</ol>
			<img class="course_image img-responsive" src="<?=base_url();?>landing_assets/images/B-Tech-program.jpg">
			<h3 class="course_heading">Lateral Entry for B Tech At BTU</h3>
			<p class="class_paragraph">Entrance exams are required for B Tech Lateral Entry applicants. Students with a Diploma or BSc in an appropriate <b>technological field</b> or engineering who wish to enroll in the Bachelor of Technology programme in the <b>third semester</b> may do so through the B Tech Lateral Entry option.</p>
			<h3 class="course_heading">Technical Subjects At BTU</h3>
			<p class="class_paragraph">The Bachelor of Technology offers various <b>specialization</b> options. All B Tech specialties require students to take the same core courses, including <b>physics, chemistry, math, communication skills, environmental science, engineering mechanics, basic electrical engineering, engineering graphics,</b> etc. The following three years are dedicated to teaching the fundamentals of the Bachelor of Technology speciality.</p>
			<p class="class_paragraph">The B Tech subject varies depending on the specialties that are provided, however the B Tech Syllabus in the bulk of the country's <b>universities</b> is essentially the same with a few minor differences.</p>
			<!--<h3 class="course_heading">Admissions for BTU University BTech Admission 2022/23</h3>-->
			<h3 class="course_heading">BTU’s Admission Process for BTech in 2022-23</h3>
			<p class="class_paragraph">Candidates for admission must complete the application form according to the instructions below.</p>
			<p class="class_paragraph"><b>Step 1 - </b>Visit the official website of <a href="https://www.theglobaluniversity.edu.in" target="_blank">BIR TIKENDRAJIT UNIVERSITY</a> (https://www.theglobaluniversity.edu.in) then select the "Admission" tab. Select “Admission Form” and fill details respectively.</p>
			
			<p class="class_paragraph"><b>Step 2 - </b>The application must be completed with the required information following successful registration.</p>
			
			<p class="class_paragraph"><b>Step 3 - </b>Pay Admission Fees.</p>
			
			<p class="class_paragraph"><b>Step 4 - </b>Upload Required Documents.</p>
			
			<p class="class_paragraph"><b>Step 5 - </b>To finish the Admission procedure, Submit and Wait For the Document's Approval Verification.</p>
			
			<h3 class="course_heading">Documents Needed During the Admission Process-</h3>
			<ol>
				<li>Class 10th Mark Sheet</li>
				<li>Class 12th Mark Sheet</li>
				<li>Adhar Card</li>
				<li>Debit/credit card details </li>
				<li>Passport Size Photo</li>
			</ol>
			<h3 class="course_heading">Placements At BTU </h3>
			<p class="class_paragraph">Choosing a career is a difficult decision, but if you're interested in engineering, it can be a great choice. <b>Students</b> and <b>businesses</b> are connected with BTU University's <b>Career Development Center</b>. Engineering offers many opportunities to use your creativity and problem-solving skills. You'll also have the chance to work on cutting-edge <b>technologies</b> and make a difference in the <b>world</b>. If you're looking for a challenging and rewarding career, engineering is a great option.</p>
			<p class="class_paragraph">However, the <b>20+ hiring partners</b> list the major achievements in placements at BTU University during the course of the previous years.</p>
			<h3 class="course_heading">Top Job profiles After Engineering </h3>
			<p class="class_paragraph">Over the years, technologies including machine learning, cloud computing, data analytics, and artificial intelligence have expanded quickly. They have become crucial in today's society with the spread of the pandemic and the global health problem.</p>
			<img class="course_image img-responsive" src="<?=base_url();?>landing_assets/images/profiles-After-Engineering.png">
		</div>
    </div>




    <section id="services" class="services" style="display:none">
        <div class="container">

            <div class="section-title aos-init aos-animate" data-aos="fade-up">
                <h2 class="heading_2 mb-5">The BTU Advantage</h2>

            </div>

            <div class="row">
                <div class="col-md-6 col-lg-2 col-xs-6 col-sm-6  d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <img src="landing_assets/images/35k-students.png" title="">
                        <h4 class="title"><a href=""><span class="price_text">10K</span> STUDENTS</a></h4>
                        <p class="description">from 15 countries make this University town their home</p>
                    </div>
                    <img src="landing_assets/images/grey-line.png" class="border-img">
                </div>

                <div class="col-md-6 col-lg-2 col-xs-6 col-sm-6 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <img src="landing_assets/images/400+ CAREER.png" title="">
                        <h4 class="title">
                            <a href=""> <span class="price_text">300+</span> CAREER CENTRIC PROGRAMS</a>
                        </h4>
                        <p class="description">across 30+ diverse disciplines</p>
                    </div>
                    <img src="landing_assets/images/grey-line.png" class="border-img">
                </div>

                <div class="col-md-6 col-lg-2 col-xs-6 col-sm-6 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <img src="landing_assets/images/2950+ RENOWNED.png" title="">
                        <h4 class="title">
                            <a href=""> <span class="price_text">200+</span> RENOWNED FACULTY</a>
                        </h4>
                        <p class="description">members</p>
                    </div> <img src="landing_assets/images/grey-line.png" class="border-img">
                </div>
                <div class="col-md-6 col-lg-2 col-xs-6 col-sm-6 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <img src="landing_assets/images/2,00,000+ ALUMNI.png" title="">
                        <h4 class="title">
                            <a href=""> <span class="price_text">700+</span> ALUMNI</a>
                        </h4>
                        <p class="description">part of a global alumni network</p>
                    </div> <img src="landing_assets/images/grey-line.png" class="border-img">
                </div>
                <div class="col-md-6 col-lg-2 col-xs-6 col-sm-6 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <img src="landing_assets/images/36 Cr in RESEARCH.png" title="">
                        <h4 class="title">
                            <a href=""> <span class="price_text"></span>RESEARCH </a>

                        </h4>
                        <p class="description">funding to build a strong research eco-system</p>
                    </div> <img src="landing_assets/images/grey-line.png" class="border-img">
                </div>
                <div class="col-md-6 col-lg-2 col-xs-6 col-sm-6 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <img src="landing_assets/images/250+ COLLABORATIONS.png" title="">
                        <h4 class="title">
                            <a href=""> <span class="price_text">250+</span> COLLABORATIONS</a>
                        </h4>
                        <p class="description">with International Entities</p>
                    </div>
                </div>

            </div>

			<div>
				   <a href="<?=base_url();?>admission-form"><button class="course_applay" type="button">Applay Now</button></a>
			 </div>
        </div>
    </section>

<?php include('footer.php');?>