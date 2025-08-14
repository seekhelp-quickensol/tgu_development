<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title>Bachelor Of Library & Information Science| GLOBAL University </title>
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
                            <div class="herotext_2">Admission Open For B.Lib.I.Sc 2022-23</div>
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
                                    <input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="Bachelor Of Library & Information Science">
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
            background: url("landing_assets/images/BTU/library2.jpg");
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
    
margin-left: 250px;
margin-bottom:20px;
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



.head_p{
    width: 47%;
margin-left: 250px;
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
                <li> <img src="<?=base_url()?>landing_assets/images/t1.png"> <span class="edu_p">Bachelor Of Library & Information Science
                </span> <span class="edu_p_mob">B.Lib.I.Sc</span> </li>
                </a>
            </div>


            <section>
                <div class="main">
                    <div class="container info_group_main">
                        <h2 class="course_heading">Bachelor Of Library & Information Science</h2>
                    
                        <div class="row mba_main">
						     <div class="container info_group">
                                        <div class="col-lg-6 col-md-12 col-sm-12 d_pharm_info ">
                                            <!-- <h3 class="course_heading">MBA Admissions 2022</h3>
                                            <h3 class="course_heading">Top MBA College In Manipur, India</h3> 
                                            <p>Are you looking for the best MBA college in Manipur, India? Look no further! <b>THE GLOBAL UNIVERSITY </b> is the top choice for students seeking quality education in <b> business administration.</b> We offer a comprehensive curriculum that will prepare you for a <b> successful career</b> in the business world. Our faculty are experienced professionals who will guide you through your studies and help you reach your goals. We are proud to offer a top-notch education at an <b> affordable price.</b> Contact us today to learn more about our college and how we can help you achieve your dreams!</p>    -->
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 d_pharm_img">
                                             <img src="<?=base_url();?>landing_assets/images/main.jpg">
                                        </div>
						           <p class="head_p">B.Lib.I.Sc (Bachelor Of Library And Information Science) Is a one-year span college class in library science. In the B.Lib.I.Sc course, understudies are shown different parts of library science including the executives, support, and safeguarding of data involving wellsprings of schooling as well as data innovation.</p>
                             </div>
					    </div>
                   

                        <div class="container info_group">    
                            <div class="what_bls">
                                <h3 class="course_heading">What Is A Bachelor Of Library And Information Science?</h3>
                                 <p>B.Lib.I.Sc essentially manages the protection and upkeep of libraries. B.Lib.I.Sc confirmation process fluctuates from one foundation to another. Organizations give direct admission to competitors based on their imprints scored at graduation. On other hand, a few colleges/schools direct selection tests to offer admission to up-and-comers in B.Lib.I.Sc courses. The course is accessible as both a full-time and part-time program at colleges.</p>   
                                  <p>Given under is all you truly need to know about the B.Lib.I.Sc course to the extent that its expected scope of capacities, capability measures, course instructive arrangement, and work prospects, and that is just a hint of something larger.The Bachelor of Library and Information Science B.Lib.I.Sc students obtain a common remuneration of Rs 1.8 LPA to Rs 6 LPA. A part of the ordinary work profiles consolidates law custodians, deputy bookkeepers, library collaborators, etc.</p>
                            </div>
                        </div>

               
                        <div class="container info_group">
                            <div class="crite_bls">
                                        <h3 class="course_heading">B.Lib.I.Sc Eligibility Criteria</h3>
                                       <p>Candidates must have passed at least a bachelor's degree examination (3 years)</p>
                            </div>
                        </div>

                        <div class="container info_group">
                             <div class="who_bls">
                                <h3 class="course_heading">Who Can Pursue Bachelor Of Library And Information Science?</h3>
                                  <ol>
                                    <li>Creativity</li>
                                    <li>Innovation</li>
                                    <li>Research Skills</li>
                                    <li>Analytical Skills</li>
                                    <li>Decision-making Skills</li>
                                    <li>Adaptability</li>
                                    <li>Competency Skills</li>
                                    <li>Communication Skills</li>
                                    <li>Administrative Skills</li>
                                    <li>Interpersonal Skills</li>
                                    <li>Leadership Skills</li>
                                  </ol>
                             </div>
                       </div>
                   
                      <div class="container info_group">
                        <div class="info_bls">
                            <h3 class="course_heading">Bachelor Of Library And Information Science Career Scope/Job Prospects After Bachelor Of Library And Information Science [B.Lib.I.Sc]</h3>
                               <p>Competitors after effectively finishing the bachelor's tasks in Library and Information Science can choose higher examinations and seek a master's certificate in library and information science.</p>
                               <p>There are different professions potential open doors for competitors who complete the B.Lib.I.Sc course effectively. Up-and-comers who wish to seek after a task after the fruition of the course can track down work open doors at news organizations, public/confidential libraries, photograph/film libraries, colleges, and other scholastic establishments, unfamiliar international safe havens, galleries, libraries of radio broadcasts, and so forth. A portion of the well-known work profiles for B.Lib.I.Sc up-and-comers include:</p>
                            <h4 class="course_heading">Library Information Officer </h4>
                           <p>A library data official oversees data to make it effectively open to other people. The expert regularly works with electronic data, for example, online information bases content administration frameworks, computerized assets, and customary library materials.</p>
                          <h4 class="course_heading">Library Assistant</h4>
                           <p>A library assistant is a person who lends as well as collects books/ periodicals/ videotapes, updates patrons’ records on a computer, and processes new materials such as books, software, audiovisual material, etc.</p>
                        <h4 class="course_heading">Assistant Director</h4>
                        <p>An associate chief appoints assignments to the staff at the flow work area, prepares new staff in the library, offers peruser's warning support for benefactors, and so on.</p>
                           <h4 class="course_heading">Librarian</h4> 
                            <p>Some of the daily responsibilities of a librarian include organizing library materials so that the books, periodicals etc are easily accessible; assembling and indexing databases of library materials; etc</p>
                         <h4 class="course_heading">Library Specialist</h4>
                         <p>A library media expert is an expert who generally works in schools to assist understudies and staff with tracking down materials and figuring out how to lead research. Not with standing, such up-and-comers regularly need to have a graduate degree in library science to function as library subject matter experts.</p>
                        <h4 class="course_heading">Cataloguer</h4>
                        <p>A cataloguer is answerable for dealing with the inventory of materials at a library.</p>
                        <h4 class="course_heading">Lecturer</h4>
                          <p>Candidates interested in academics can also become a lecturer in a college or a university.</p>
                        <h4 class="course_heading">Indexer</h4>
                         <p>An indexer surveys different records and aggregates files to make data look simpler. An indexer works with different archives like books, periodicals, compositions, writing, reports, sites, DVDs, sound accounts, and so forth</p>
                         <h4 class="course_heading">Assistant Professor</h4> 
                        <p>An assistant professor provides knowledge to the students in subjects related to Library and Information Science.</p>



                        </div>
                      </div>

                        <div class="container info_group">
                            <div class="recrute_bls">
                                <h3 class="course_heading">Top Recruiters For Bachelor Of Library And Information Science</h3>   
                                <ul>
                                    <li>Libraries</li>
                                    <li>Universities</li>
                                    <li>Colleges</li>
                                    <li>Corporate Training Centers</li>
                                    <li>Research Institutions</li>
                                    <li>Media Organizations</li>
                                    <li>Consulting Firms</li>
                                   <li>Galleries</li>
                                    <li>Museums</li>
                                    <li>Foreign Embassies</li>
                                </ul>
                            </div>
                        </div>

                      <div class="container info_group">
                        <div class="kind_bls">
                        <h3 class="course_heading">What kinds of work might you do as an information professional?</h3> 
                           <p>The common thread among information and library science careers is working with information. but beyond that, your interests and the skills you choose to develop throughout our IS program will determine what type of work you do.</p>
                            <p>For example, you might discover a passion for working with young adults and start your career as a teen librarian in a public library. or you might find that you love to do business research,</p>
                            <p>and work in competitive intelligence for a start-up or become a business librarian for either a large public or an academic library.</p>   
                            <p>In fact, as you go through the UT information sciences bachelor and/or master’s programs you’ll be encouraged to “try out” as many different types of information work as you can to get a good sense of what most engages you. You’ll want to explore questions like –</p>
                             
                            <ol>
                                <li>Do you prefer working with people, systems, technology, or data?</li>
                                <li>Do you thrive in a team or a more solitary environment?</li>
                                <li>How do you feel about working with technology?</li>
                                <li>Do you prefer a familiar routine or always-changing project work?</li>
                            </ol>
                          <p>Why? because the universe of information and library science careers offers all these options and more. consequently, because the work you do and who you might do it for is so diverse, you can easily take your IS career in a new direction should you choose to do so.</p>
                        </div>
                      </div> 
                    
                     
                      <div class="container info_group">
                            <div class="future_bls">
                                <h3 class="course_heading">Bachelor Of Library And Information Science Future Scope</h3>   
                                <p>Understudies with a bachelor's in library degree can work in both general society and confidential areas. Competitors may likewise work in instructive establishments as custodians. In the wake of finishing their B.Sc of Library and Information Science certificate, people can likewise show up for common assistance tests.</p>
                                <p>A few confidential workplaces enlist B.Sc of Library and Information Science understudies. Working at such organizations could give understudies exceptionally alluring compensation. Graduates have the choice of proceeding with their schooling. They could seek a graduate degree in library science after that.</p>
                                <p>In the wake of following through with the tasks, competitors can seek a graduate degree in library and information science, M.Lib.I.Sc up-and-comers who complete the course might have the option to function as data modelers or in government libraries. subsequent to finishing the certificate, understudies can seek a vocation as an essayist.</p>
                            </div>
                        </div>

                        <div class="container info_group">
                            <div class="univer_bls">
                                <h3 class="course_heading">Why To Study Bachelor Of Library And Information Science AtTHE GLOBAL UNIVERSITY - Top University In Manipur ?</h3>   
                                <p>The Bachelor of Library and Information Science is a degree that helps meet the demand for human resources in the field of library and information activities.</p>
                                <p>These individuals occupy various positions in libraries, documentation centers, and information centers.</p>
                                <p>With US you would flourish in an IS profession if you enjoy dealing with people, being a part of high-performing teams, organizing information, researching hard-to-find information, and converting technology into solutions, systems, and strategic and actionable outcomes.</p>
                               <p>Working with children and early literacy, helping a community grow and thrive, or working with geographic information to identify patterns and emerging trends for grant-funded programs are all possibilities for a career in information and library sciences if you’re passionate about contributing to the common good.</p>
                               <p>This is just a tiny sample of how alumni of information and library science degrees are putting their knowledge to work in their communities, businesses, and other organizations.</p>
                               <p><b>BIR TIKENDRAJIT UNIVERSITY,</b> realizing the need of trained library personnel, instituted training courses in librarianship at the school of library science. The school offers diploma, bachelor’s, and master’s in library & information science along with a Ph.D. program.</p>
                               <p>The programs are based on the practices and underlying theories of information acquisition, organization, dissemination, and utilization.</p>
                               <p>On completion of the courses, the students demonstrate the values, attitudes, and behaviors associated with the roles and responsibilities of information and library professionals in accordance with market-oriented employment.</p>
                               <p>The mission is not simply to ensure that each student gains adequate employment but to prepare graduates to assume responsible positions in libraries and information centers.</p>
                            </div>
                        </div>


                        <div class="container info_group">
                            <div class="bls_qa">
                                <h3 class="course_heading">FAQs Related To Bachelor of Library And Information Science :</h3>
                                

                                <p><u><b class="que">Question - </b></u> Is a Bachelor’s degree in Library and Information Science the same as a master’s degree?</p>
                                <p><u><b class="ans">Answer - </b></u>One-year diploma courses are comparable to bachelor’s degree courses, whereas three-year bachelor’s degree courses are equivalent to master’s degree courses.</p>
                                    
                                <p><u><b class="que">Question - </b></u>How long will it take me to finish my Bachelor’s degree in Library and Information Science B.Lib.I.Sc?</p>
                                <p><u><b class="ans">Answer - </b></u>The Bachelor of Library and Information Science B.Lib.I.Sc program takes one year to complete.</p>

                                <p><u><b class="que">Question - </b></u> What is the scope of B.Lib.I.Sc?</p>
                                <p><u><b class="ans">Answer - </b></u> Candidates after successfully completing the course will be able to work in galleries, museums and even can lad up jobs in foreign embassies.</p>

                                <p><u><b class="que">Question - </b></u> What is the eligibility for B.Lib.l.Sc?</p>
                                <p><u><b class="ans">Answer - </b></u> The candidates need to complete their bachelor's degree in any discipline with at least 50-55% marks.</p>
                               
                                <p><u><b class="que">Question - </b></u> How can I get admission into B.Lib.l.Sc course?</p>
                                <p><u><b class="ans">Answer - </b></u> Admissions in B.Lib.l.Sc is done on the basis of merit, i.e, based entirely on the merit list based on the graduation marks. Some colleges/universities conduct their separate entrance exams for the course.</p>

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