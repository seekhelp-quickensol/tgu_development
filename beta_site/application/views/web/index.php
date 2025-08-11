<?php include('header.php'); ?>
<style>
	/*.modal-dialog {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}

.modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 0;
}*/
	.ul_class_imp ul {
		padding: 0px;
		margin: 0px;
		list-style: none;
	}

	.news-item {
		padding: 4px 4px;
		margin: 0px;
		border-bottom: 1px dotted #555;
	}

	.approved_area {
		padding: 0px;
	}
</style>

<div class="uni_mainWrapper">
	<section class="patch1">

		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="1200">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				<li data-target="#carousel-example-generic" data-slide-to="3"></li>
				<li data-target="#carousel-example-generic" data-slide-to="4"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="latest_area btu_enquiry_form">
					<h3 class="quick-text"><span> </span></h3>
					<div class="hr_linearea"></div>
					<div class="enquir_form">
						<h3>Join the community of modern thinking students:- Quick Enquiry </h3>
						<form method="post" name="enquiry_from" id="enquiry_from">
							<div class="form-group">
								<label>Full Name*</label>
								<input type="text" class="form-control input_lbl" name="full_name" id="full_name" placeholder="Full Name">
							</div>
							<div class="form-group">
								<label>Email*</label>
								<input type="text" class="form-control input_lbl" name="full_email" id="full_email" placeholder="Email">
							</div>
							<div class="form-group">
								<label>Mobile* </label>
								<input type="text" class="form-control input_lbl" name="full_mobile" id="full_mobile" placeholder="Mobile">
							</div>
							<div class="form-group">
								<label>Courses* </label>
								<input type="text" class="form-control input_lbl" name="full_course" id="full_course" placeholder="Course Name">
							</div>
							<div class="form-group">
								<button type="submit">Submit</button>
							</div>
						</form>
					</div>
				</div>

				<div class="item active">
					<div width="100%" class="slider-img1">
						<div class="carousel-caption">
							<h6> Get started with </h6>
							<h1 class="main-heading"> The Global University</h1>

							<p>“We want that education by which character is formed, strength of mind is increased, the intellect is
								expanded, and by which one can stand on one's own feet” - Swami Vivekananda.</p>

							<div class="mt-4"><a class="explore-btn" href="<?= base_url() ?>about-us"> Explore More</a> </div>

						</div>
					</div>
				</div>


				<div class="item">
					<div width="100%" class="slider-img2">
						<div class="carousel-caption">
							<h6> Get started with </h6>
							<h1 class="main-heading"> The Global University</h1>

							<p>“We want that education by which character is formed, strength of mind is increased, the intellect is
								expanded, and by which one can stand on one's own feet” - Swami Vivekananda.</p>

							<div class="mt-4"><a class="explore-btn" href="<?= base_url() ?>about-us"> Explore More</a> </div>

						</div>
					</div>
				</div>



				<div class="item">
					<div width="100%" class="slider-img3">
						<div class="carousel-caption">
							<h6> Get started with </h6>
							<h1 class="main-heading"> The Global University</h1>

							<p>“We want that education by which character is formed, strength of mind is increased, the intellect is
								expanded, and by which one can stand on one's own feet” - Swami Vivekananda.</p>

							<div class="mt-4"><a class="explore-btn" href="<?= base_url() ?>about-us"> Explore More</a> </div>

						</div>
					</div>
				</div>


				<div class="item">
					<div width="100%" class="slider-img4">
						<div class="carousel-caption">
							<h6> Get started with </h6>
							<h1 class="main-heading"> The Global University</h1>

							<p>“We want that education by which character is formed, strength of mind is increased, the intellect is
								expanded, and by which one can stand on one's own feet” - Swami Vivekananda.</p>

							<div class="mt-4"><a class="explore-btn" href="<?= base_url() ?>about-us"> Explore More</a> </div>

						</div>
					</div>
				</div>

				<div class="item">
					<div width="100%" class="slider-img5">
						<div class="carousel-caption">
							<h6> Get started with </h6>
							<h1 class="main-heading"> The Global University</h1>

							<p>“We want that education by which character is formed, strength of mind is increased, the intellect is
								expanded, and by which one can stand on one's own feet” - Swami Vivekananda.</p>

							<div class="mt-4"><a class="explore-btn" href="<?= base_url() ?>about-us"> Explore More</a> </div>

						</div>
					</div>
				</div>



			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<i class="fa fa-angle-left" aria-hidden="true"></i>

				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<i class="fa fa-angle-right" aria-hidden="true"></i>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<div class="container hero-tabs">
			<div class="row">
			    	<a href="<?= base_url() ?>admission-procedure">
					<div class="global-tabs global-third">
						<div> <img src="images/icons/s3.png"> </div>
						<span> Admissions </span>
						<p>Confirm your seat with a few easy steps in admission form</p> <a href="<?= base_url() ?>admission-procedure" class="learn-more">Learn More</a>
					</div>
				</a>
				<a href="<?= base_url(); ?>examination-form">
					<div class="global-tabs global-first">
						<div> <img src="images/icons/s-1.png"> </div> <span> Examiniation Form </span>
						<p> Fill up the exmination form here with some easy steps</p>
						<a class="learn-more" href="<?= base_url(); ?>examination-form">Learn More</a>

					</div>
				</a>
				<a href="<?= base_url(); ?>result_view">
					<div class="global-tabs global-second">
						<div> <img src="images/icons/s2.png"> </div> <span>Results </span>
						<p> View your results by entering your enrollment number</p> <a class="learn-more" href="<?= base_url(); ?>result_view">Learn More</a>
					</div>
				</a>
			


				<a href="<?= base_url() ?>Faculty-of-Commerce-&amp;-Management">--
					<div class="global-tabs global-forth">
						<div> <img src="images/icons/s4.png"> </div> <span>Courses </span>
						<p> TGU to learn more about your preferred program</p> <a class="learn-more" href="<?= base_url() ?>Faculty-of-Commerce-&amp;-Management">Learn More</a>
					</div>
				</a>

				<a href="javascript:void(0)">
					<div class="global-tabs global-second">
						<div> <img src="images/icons/s2.png"> </div> <span>Degree </span>
						<p>Obtain your degree from your chosen program</p> <a class="learn-more" href="<?= base_url(); ?>result_view">Learn More</a>
					</div>
				</a>

			</div>
		</div>

	</section>

	<div class="clearfix"></div>

	<div class="clearfix"></div>

	<section class="about-padding">
		<div class="container">
			<div class="row">

				<div class="col-lg-5">
					<div class="about-bg text-white">
						<h6 class="about-h6">About The Global University</h6>
						<h2 class="about-h2">Welcome To The Global University</h2>
						<p class="about-p">We believe in providing education that cultivates creative understanding, enables diverse, talented, hardworking graduates to pursue disruptive thinking leading to productivity, to enjoy the pleasures of lifelong learning, and to reap the satisfactions of aiding communities around us.</p>
						<div class="mt-4"><a class="discover-btn" href="<?= base_url() ?>about-us"> Discover More</a> </div>

					</div>

				</div>
				<div class="col-lg-7">
					<div class="">
						<h3 class="heading-3">The Global University </h3>
						<p style="font-size: 15px;" class="">Welcome to the Global University, a prestigious institution dedicated to fostering academic excellence, innovative research, and holistic development. Renowned for its commitment to cultivating leaders and thinkers of tomorrow, The Global University offers a diverse array of programs across various disciplines, empowering students to pursue their passions and achieve their full potential.</p>

						<p style="font-size: 15px;" class="">With a rich history of educational excellence spanning over decades,The Global University stands as a beacon of knowledge, promoting a culture of inclusivity and intellectual curiosity. Our distinguished faculty members, comprising accomplished scholars and industry experts, provide a stimulating learning environment, imparting valuable insights and practical skills to prepare students for the complexities of the modern world.</p>
						<p style="font-size: 15px;"> At The Global University, we prioritize student success and well-being, offering state-of-the-art facilities, comprehensive support services, and a vibrant campus life. Our global network of partnerships with leading organizations and institutions ensures that our graduates are well-equipped to excel in their chosen fields, making a positive impact on a global scale.</p>
						<p style="font-size: 15px;">Join us at The Global University and embark on a transformative educational journey that will not only broaden your horizons but also equip you with the knowledge and skills to thrive in an ever-evolving global landscape.</p>
					</div>
					<!-- <div class="col-lg-4">
						<div class="counter-item one">
							<h2 class="number rs-count"><span>100</span><span class="counter-prefix">+</span></h2>
							<h4 class="title mb-0">Course</h4>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="counter-item two">
							<h2 class="number rs-count"><span>300</span><span class="counter-prefix">k+</span></h2>
							<h4 class="title mb-0">Faculty</h4>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="counter-item three">
							<h2 class="number rs-count"><span>25</span><span class="counter-prefix">k+</span></h2>
							<h4 class="title mb-0">Students</h4>
						</div>
					</div> -->

					<div class="row">
						<div class="col-lg-6">
							<div class="course-images">
								<div class="course-1"></div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="course-images">
								<div class="course-2"></div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>




	</section>

	<!-- 
	<div class="about_area">
		<div class="container">



			<div class="row">
				<div class="col-md-12">

					<div class="col-lg-6 col-md-6 padd_left">
						<img src="images/about.jpg" class="img-responsive">
					</div>



					<div class="col-lg-6 col-md-6 padd_left padd_rt message_area">

						<div class="uni_welcome">
							<h2> About <span>Global University</span></h2>
							<p> Global University is a new age university driving individual empowerment and social progress through blended learning. </p>
							<hr />
						</div>

						<p>We believe in providing education that cultivates creative understanding, enables diverse, talented, hardworking graduates to pursue disruptive thinking leading to productivity, to enjoy the pleasures of lifelong learning, and to reap the satisfactions of aiding communities around us.</p>
						<p>“The highest education is that which does not merely give us information but makes our life in harmony with all existence.” - Rabindranath Tagore. </p>
						<div class="mt-4"><a class="discover-btn" href="<?= base_url() ?>about-us"> Discover More</a> </div>
					</div>


					<div class="clearfix"></div>

				</div>

			</div>
		</div>

	</div> -->


	<section class="uni_welcome_box">
		<div class="container">
			<h2 class="">Why <span class=""> The Global University?</span></h2>
			<div class="col-lg-3">
				<div class="uni_welcome_left">
					<ul>
						<li class="active">
							<a class="show" target="1">

								<div class="left-top">

									<div class="left-top-text">
										<h3>Extraordinary Education</h3>
										<p>Empowering through extraordinary education. </p>
									</div>

								</div>
							</a>

						</li>
						<li>
							<a class="show" target="2">
								<div class="left-middle">
									<div class="left-top-text">
										<h3>Expertise Staff </h3>
										<p>Guided by expertise, our staff ensures unparalleled learning experiences. </p>
									</div>

								</div>
							</a>
						</li>

						<li>
							<a class="show" target="3">
								<div class="right-top">

									<div class="right-top-text">
										<h3>Peaceful Campus </h3>
										<p>Discover a serene academic environment on our peaceful campus, fostering focused learning and personal growth. </p>
									</div>
								</div>
							</a>
						</li>

				</div>
			</div>

			<div class="col-lg-6">
				<div id="div1" class="targetDiv">
					<div class="container-circle bg-1">


						<div class="center-div">

							<h4> Extraordinary Education</h4>
							<p>Empowering through extraordinary education. </p>
						</div>
					</div>
				</div>

				<div id="div2" class="targetDiv">
					<div class="container-circle bg-2">


						<div class="center-div">

							<h4> Expertise Staff </h4>
							<p>Guided by expertise, our staff ensures unparalleled learning experiences. </p>
						</div>
					</div>
				</div>

				<div id="div3" class="targetDiv">
					<div class="container-circle bg-3">


						<div class="center-div">

							<h4> Peaceful Campus </h4>
							<p>Discover a serene academic environment on our peaceful campus, fostering focused learning and personal growth. </p>
						</div>
					</div>
				</div>

				<div id="div4" class="targetDiv">
					<div class="container-circle bg-4">


						<div class="center-div">

							<h4> Vision</h4>
							<p>Envisioning a brighter tomorrow through innovation and education, shaping global leaders.</p>
						</div>
					</div>
				</div>


				<div id="div5" class="targetDiv">
					<div class="container-circle bg-5">


						<div class="center-div">

							<h4>Library</h4>
							<p>Explore a world of knowledge at our state-of-the-art library, offering extensive resources for academic excellence and research </p>
						</div>
					</div>
				</div>

				<div id="div6" class="targetDiv">
					<div class="container-circle bg-6">


						<div class="center-div">
							<h4>Achievements </h4>
							<p>Celebrating remarkable milestones and exceptional accomplishments, inspiring excellence and progress </p>

						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<li>
					<a class="show" target="4">
						<div class="right-bottom">


							<div class="right-bottom-text">
								<h3>Vision</h3>
								<p>Envisioning a brighter tomorrow through innovation and education, shaping global leaders. </p>
							</div>
						</div>

					</a>
				</li>

				<li>
					<a class="show" target="5">
						<div class="right-middle">


							<div class="left-top-text">
								<h3>Library</h3>
								<p>Explore a world of knowledge at our state-of-the-art library, offering extensive resources for academic excellence and research </p>
							</div>

						</div>

					</a>
				</li>


				<li>
					<a class="show" target="6">

						<div class="left-bottom">


							<div class="left-bottom-text">
								<h3>Achievements</h3>
								<p>Celebrating remarkable milestones and exceptional accomplishments, inspiring excellence and progress </p>
							</div>
						</div>
					</a>
				</li>
			</div>


			</ul>
		</div>


		<div class="about_area approved_area" style="display: none;">

			<div class="about_area approved_by_area">

				<div class="row">
					<div class="container">

						<div class="col-lg-3 col-md-3">
							<div class="approved_inner">

								<img src="<?= base_url(); ?>images/PCI-LOGO.png">
								<h6>Approved By</h6>
								<h5>Pharmacy Council of India</h5>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="approved_inner">

								<img src="<?= base_url(); ?>images/BCI-LOGO.png">
								<h6>Approved By</h6>
								<h5>Bar Council of India</h5>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="approved_inner">

								<img src="<?= base_url(); ?>images/Association_of_Indian_Universities_Logo.png">
								<h6>Member Of</h6>
								<h5>Association of Indian Universities</h5>
							</div>
						</div>
						<div class="col-lg-3 col-md-3">
							<div class="approved_inner">

								<img src="<?= base_url(); ?>images/THSC.png">
								<h6>Approved By</h6>
								<h5>Tourism and Hospitality Skill Council</h5>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>



	</section>


	<div class="clearfix"></div>
</div>



<div class="clearfix"></div>

<div class="uni_latest our_recruiters_wrapper">
	<div class="container">

		<div class="row">

			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 latest_area">

				<h2 class="text-left">Our <span>Recruiters</span></h2>

				<div class="btu_recruitment_details">

					<div class="hr_linearea"></div>
					<div class="carousel_details">
						<div id="myCarousel2" class="carousel slide desk_item" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#myCarousel2" data-slide-to="0" class="active">.</li>
								<li data-target="#myCarousel2" data-slide-to="1">.</li>
							</ol>
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<ul class="our_recruiters">
										<li>
											<div class="recruiters_set mt-20">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-5.PNG" class="img-responsive" alt="" loading="lazy">
											</div>
										</li>
										<li>
											<div class="recruiters_set mt-20">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-4.PNG" class="img-responsive" alt="" loading="lazy">
											</div>
										</li>
										<!--<li>
											<div class="recruiters_set mt-20">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-3.PNG" class="img-responsive go_lang" alt="" loading="lazy">
											</div>
										</li>-->
                                        <li>
											<div class="recruiters_set ">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-21.PNG" class="img-responsive jaguar_logo" alt="" loading="lazy">
											</div>
										</li>

										<li>
											<div class="recruiters_set mt-0">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-6.PNG" class="img-responsive jaguar_logo" alt="" loading="lazy">
											</div>
										</li>
										<li>
											<div class="recruiters_set mt-20">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-16.png" class="img-responsive" alt="" loading="lazy">
											</div>
										</li>
										<li>
											<div class="recruiters_set">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-22.PNG" class="img-responsive" alt="" loading="lazy">
											</div>
										</li>
										<li>
											<div class="recruiters_set mt-0">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-23.PNG" class="img-responsive go_lang" alt="" loading="lazy">
											</div>
										</li>


										<li>
											<div class="recruiters_set ">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-24.PNG" class="img-responsive jaguar_logo" alt="" loading="lazy">
											</div>
										</li>
									</ul>
								</div>
								<!-- first item end here -->
								<div class="item">
									<ul class="our_recruiters">
										<li>
											<div class="recruiters_set  mt-20">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-9.PNG" class="img-responsive" alt="" loading="lazy">
											</div>
										</li>
										<li>
											<div class="recruiters_set  mt-20">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-11.PNG" class="img-responsive" alt="" loading="lazy">
											</div>
										</li>
										<li>
											<div class="recruiters_set  mt-20">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-15.png" class="img-responsive go_lang" alt="" loading="lazy">
											</div>
										</li>


										<li>
											<div class="recruiters_set  mt-20">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-20.PNG" class="img-responsive jaguar_logo" alt="" loading="lazy">
											</div>
										</li>
										<li>
											<div class="recruiters_set  mt-20">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-13.PNG" class="img-responsive" alt="" loading="lazy">
											</div>
										</li>
										<li>
											<div class="recruiters_set  mt-20">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-24.PNG" class="img-responsive" alt="" loading="lazy">
											</div>
										</li>
										<li>
											<div class="recruiters_set  mt-20">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-7.PNG" class="img-responsive go_lang" alt="" loading="lazy">
											</div>
										</li>


										<li>
											<div class="recruiters_set ">
												<img src="<?= base_url(); ?>images/recruiter/our-recuirement-img-18.png" class="img-responsive jaguar_logo" alt="" loading="lazy">
											</div>
										</li>
									</ul>
								</div>
								<!-- second item end here -->
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="notice">
					<div class="bs-example">
						<div id="myCarousel" class="carousel slide">
							<!-- Carousel indicators -->
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>

							</ol>
							<!-- Carousel items -->
							
							<ul class="carousel-inner">
															<div></div>
								<li class="active item">
								<a href="<?= base_url(); ?>">
               <!--<img class="logo-slider" width="80" height="80" src="<?= base_url(); ?>images/logo/<?php if (!empty($university_details) && $university_details->logo != "") {
                                                                                          echo $university_details->logo;
                                                                                       } else { ?>global_university_logo.png<?php } ?>">-->
                <img class="logo-slider" width="80" height="80" src="<?= base_url(); ?>images/footer-logo.png">
            </a>
								
								<!--<a target="_blank" href="<?= base_url(); ?>images/notice_board/PhD-Admission-Notice-2022-23.pdf">Ph.D Admission Notice<br> 2022-23</a> </li>-->

								
								<li class="item">
								<a href="<?= base_url(); ?>">
               <!--<img class="logo-slider" width="80" height="80" src="<?= base_url(); ?>images/<?php if (!empty($university_details) && $university_details->logo != "") {
                                                                                          echo $university_details->logo;
                                                                                       } else { ?>global_university_logo.png<?php } ?>">-->
                    <img class="logo-slider" width="80" height="80" src="<?= base_url(); ?>images/footer-logo.png">
            </a>
								
							<!--	<a target="_blank" href="<?= base_url(); ?>images/notice_board/PhD-Admission-Notice-2022-23.pdf">Ph.D Admission Notice <br>2022-23</a> </li>-->
							</ul>
							<!-- Carousel nav --> <a class="carousel-control left-flat left-pdf" href="#myCarousel" data-slide="prev">&lsaquo;</a>
							<a class="carousel-control right-flat" href="#myCarousel" data-slide="next">&rsaquo;</a>

						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4" style="display: none;">
				<div class="notice">
					<h3 class="text-center"><span>Notices & Updates</span></h3>
					<!-- <div class="hr_linearea"></div> -->
					<ul class="ul_class_imp demo1">
						<!--<li class="news-item"><a href="<?= base_url(); ?>uploads/syllabus/EntranceTestNotice.pdf">Notice of Ph.D Entrance Exam</a></li>
							<li class="news-item"><a target="_blank" href="<?= base_url(); ?>uploads/syllabus/Course-Work-Classes-Schedule.pdf">Course Work Classes Schedule</a></li>
							<li class="news-item"><a target="_blank" href="<?= base_url(); ?>uploads/syllabus/Ph_D-Course-Work-Time-Table.pdf">Ph.D Course Work Time-Table</a></li>
							<li class="news-item"><a target="_blank" href="http://103.47.54.107/btu/">Ph.D Entrance Exam</a></li>  -->
						<!--<li class="news-item"><a target="_blank" href="<?= base_url(); ?>images/notice_board/PhD-Admission-Notice-2022-23.pdf">Ph.D Admission Notice 2022-23</a>-->
							<!--<li class="news-item"><a target="_blank" href="<?= base_url(); ?>images/notice_board/time-table-pg-arts.pdf">Examination Timetable 2020-2021 (Post Graduate Arts)</a>
							</li>  
							<li class="news-item"><a target="_blank" href="<?= base_url(); ?>images/notice_board/time-table-pg-science.pdf">Examination Timetable 2020-2021 (Post Graduate Science)</a>
							</li>  
							<li class="news-item"><a target="_blank" href="<?= base_url(); ?>images/notice_board/admission_notice_2021.jpg">Admission Notice 2021</a>
							</li>
							<li class="news-item"><a target="_blank" href="<?= base_url(); ?>images/notice_board/EXAMINATION-2021.pdf">Examination Timetable 2020-2021</a>
							</li>-->
					</ul>

					<div class="row">
						<!--<div class="col-md-12 col-lg-12">
								<div class="shortcut_link_top">
									<div class="col-lg-8 col-md-8">
										<h5>Online Admission Form</h5>
										<p>Interested students can apply an online admission form</p>
									</div>
									<div class="col-lg-4 col-md-4">
										<div class="shortcut_link" id="demo">
											<a href="<?= base_url(); ?>admission-form" title="Admission Form">
												<div class="blink_noti"></i>Apply Now</div>
											</a>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>-->
					</div>
				</div>
			</div>
			<!-- <div class="col-lg-4 col-md-4 latest_area">
							<h3><span>Latest News</span></h3>
							<div class="hr_linearea"></div>
							<div class="latest_news">
								<div class="latest_date">
								<span class="date">18</span>
								<span class="month">July</span>
								</div>
								<div class="latest_date_para">
									<h4>Mca Exam started from 14-Aug-2020 Last date 18-Aug-2020</h4>
									<a href="#" class="read_more">Read More ></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="latest_news">
								<div class="latest_date">
								<span class="date">10</span>
								<span class="month">July</span>
								</div>
								<div class="latest_date_para">
									<h4>Mca Exam started from 14-Aug-2020 Last date 18-Aug-2020</h4>
									<a href="#" class="read_more">Read More ></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="latest_news">
								<div class="latest_date">
								<span class="date">8</span>
								<span class="month">July</span>
								</div>
								<div class="latest_date_para">
									<h4>Mca Exam started from 14-Aug-2020 Last date 18-Aug-2020</h4>
									<a href="#" class="read_more">Read More ></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="latest_news">
								<div class="latest_date">
								<span class="date">9</span>
								<span class="month">July</span>
								</div>
								<div class="latest_date_para">
									<h4>Mca Exam started from 14-Aug-2020 Last date 18-Aug-2020</h4>
									<a href="#" class="read_more">Read More ></a>
								</div>
								<div class="clearfix"></div>
							</div>
						</div> -->
			<!-- <div class="col-lg-4 col-md-4 latest_area">
							<h3><span>Latest Events</span></h3>
							<div class="hr_linearea"></div>
							<div class="latest_news">
								<div class="latest_date latest_bg" style="background-image:url('images/event1.jpg')">
								</div>
								<div class="latest_date_para">
									<h4>MBA Conference for 1st year students on <br/>18-Aug-2020</h4>
									<a href="#" class="read_more">Read More ></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="latest_news">
								<div class="latest_date latest_bg" style="background-image:url('images/event2.jpg')">
								</div>
								<div class="latest_date_para">
									<h4>PG Conference  on <br/>18-Aug-2020</h4>
									<a href="#" class="read_more">Read More ></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="latest_news">
								<div class="latest_date latest_bg" style="background-image:url('images/event3.jpg')">
								</div>
								<div class="latest_date_para">
								<h4>MCA Conference on <br/>22-Aug-2020</h4>
									<a href="#" class="read_more">Read More ></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="latest_news">
								<div class="latest_date latest_bg" style="background-image:url('images/event4.jpeg')">
								</div>
								<div class="latest_date_para">
									<h4>MBA Conference on <br/>18-Aug-2020</h4>
									<a href="#" class="read_more">Read More ></a>
								</div>
								<div class="clearfix"></div>
							</div>
						</div> -->


		</div>
	</div>
</div>


<!--<div class="uni_box_Camp" style="background-image:url('images/campus.jpg')">-->

<!-- <div class="uni_box_Camp">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-6">

				<video loop autoplay muted id="myVideo" style="width:100%;">
					<source src="<?= base_url(); ?>images/btu-video.mp4" type="video/mp4">
					<source src="<?= base_url(); ?>images/btu-video.mp4" type="video/ogg">
					Your browser does not support the video tag.
				</video>

			</div>
			<div class="col-lg-5 col-md-6">
				<div class="Play_Box">
			
					<h3>Peaceful Campus Life at Manipur </h3>
					<p>Performing contemporary works for percussion and marimba ensemble with a diverse array</p>
				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="clearfix"></div>
<!--<div class="">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="un_news">
								<a href="https://www.unmultimedia.org/avlibrary/" target="_blank">
									<img src="<?= base_url(); ?>images/news-report.png">
									<h5>UN News & Media</h5>
								</a>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="national_digital">
								<a href="https://ndl.iitkgp.ac.in/" target="_blank">
									<img src="<?= base_url(); ?>images/digital-book.png">
									<h5>National Digital Library of India</h5>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>-->

<div class="modal fade" id="demo-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin: 0;padding: 0;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"></h4>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<img style="width:100%" src="<?= base_url(); ?>images/notice_board/notice_01.jpg">
				</div>
				<div class="clearfix"></div>
			</div>


		</div>
	</div>
</div>
<?php include('footer.php'); ?>
<script src="<?= base_url(); ?>back_panel/js/jquery.bootstrap.newsbox.min.js"></script>

</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
<script>
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		} else {
			return false;
		}
	}, "Please enter a valid Email.");
	$('#enquiry_from').validate({
		rules: {
			full_name: {
				required: true,
			},
			full_mobile: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10,
			},
			full_email: {
				required: true,
				validate_email: true,
			},
			full_course: {
				required: true,
			},
		},
		messages: {
			full_name: {
				required: "Please enter your name",
			},
			full_mobile: {
				required: "Please enter mobile number",
				number: "Please enter valid number",
				minlength: "Please enter 10 gigit mobile number",
				maxlength: "Please enter 10 gigit mobile number",
			},
			full_email: {
				required: "Please enter email",
				validate_email: "Please enter valid email",
			},
			full_course: {
				required: "Please enter course",
			},
		},
		errorElement: 'span',
		errorPlacement: function(error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function(element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});


	$(document).ready(function() {

		//$("#demo-2").modal('show');
	});
	$(function() {


		$(".demo1").bootstrapNews({
			newsPerPage: 10,
			autoplay: true,
			pauseOnHover: true,
			navigation: false,
			direction: 'down',
			newsTickerInterval: 1500,
			onToDo: function() {}
		});


	});

	$(".carousel").swipe({
		swipe: function(
			event,
			direction,
			distance,
			duration,
			fingerCount,
			fingerData
		) {
			if (direction == "left") $(this).carousel("next");
			if (direction == "right") $(this).carousel("prev");
		},
		allowPageScroll: "vertical"
	});

	$(".carousel").swipe({
		swipe: function(
			event,
			direction,
			distance,
			duration,
			fingerCount,
			fingerData
		) {
			if (direction == "left") $(this).carousel("next");
			if (direction == "right") $(this).carousel("prev");
		},
		allowPageScroll: "vertical"
	});



	$('.targetDiv:not(#div1)').hide();
	$('.show').click(function() {
		$('.targetDiv').hide();
		$('#div' + $(this).attr('target')).show();
	});
</script>