<?php

/*

// Set the default time zone to UTC

date_default_timezone_set('UTC');



// Get the current UTC time

$currentTimeUtc = gmdate('Y-m-d H:i:s');



// Example: Desired time zone for storage (replace with the desired time zone)

$desiredTimeZone = 'America/New_York';



// Create a DateTime object with the current UTC time

$utcDateTime = new DateTime($currentTimeUtc, new DateTimeZone('UTC'));



// Set the desired time zone

$utcDateTime->setTimezone(new DateTimeZone($desiredTimeZone));



// Get the time in the desired time zone

$currentTimeDesiredTimeZone = $utcDateTime->format('Y-m-d H:i:s');



// Store $currentTimeDesiredTimeZone in your database

// Perform the database insert or update using $currentTimeDesiredTimeZone



// Output the result

echo "Current time in $desiredTimeZone: $currentTimeDesiredTimeZone";exit;*/

?>



<?php include('header.php');?>



<style>

	.preloader{

		display:none;

	}

	.blog_unique{

		font-size:14px !important;

	}

	.activities .owl-carousel .item {

    /* position: relative; */

    /*z-index: 100;*/

    /*-webkit-backface-visibility: hidden;*/

    /*height: auto;*/

    /*overflow: hidden;*/

    	background-size: cover;

 background-position: center top;

 background-repeat: no-repeat;

 height: 300px;

 position: relative;

}

.img-container {

    position: relative;

    overflow: hidden;

    border-radius: 5px;

}

.owl-item .img-container img {

    display: block;

    width: 100%;

    transform: scale(1);

    transition: 0.6s all ease-in-out;

    position: relative;

	min-height: 233px;

    max-height: 233px;

}



.img-caption {

    -webkit-box-sizing: border-box;

    -moz-box-sizing: border-box;

    box-sizing: border-box;

    position: absolute;

    /* background: #A8A8A8; */

	background: #9a1e10;

    color: #fff;

    cursor: pointer;

    text-align: center;

    font-size: 1.2em;

    transition: all 0.8s ease-out;

    bottom: -160px;

    width: 100%;

    display: block;

    min-height: 40px;

    padding: 10px 2px;

}

.img-container:hover img{

	transform: scale(1.3);

    transition: 0.9s;

}

.img-container:hover .img-caption {

    opacity: 1;

}

.img-container:hover .bottom-top {

    bottom: -10px;

}



.img-container:hover .img-caption {

    opacity: 1;

}

.img-container:hover .bottom-top {

    bottom: -10px;

}

.activities .owl-nav .owl-prev {

    left: -30px;

}

.activities .owl-nav .owl-next {

    right: -30px;

}



.activities .owl-nav>div {

    margin-top: -26px;

    position: absolute;

    top: 50%;

    color: #cdcbcd;

}

.activities .owl-nav i {

    /*font-size: 52px;*/

    /*color: crimson;*/

    font-size: 40px;

    color: #fff;

    background-color: #92210f;

}





</style>

<link href="<?=base_url();?>css/logo-slider.css" rel="stylesheet">

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/letest-all.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.1/assets/owl.carousel.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"> -->

<!-- start of hero -->

<link href="<?=base_url();?>css/swiper.min.css" rel="stylesheet">

<link href="<?=base_url();?>css/all.min.css" rel="stylesheet">

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"> -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" rel="stylesheet">

<link href="<?=base_url();?>css/owl.carousel.css" rel="stylesheet">

<link rel="stylesheet" href="<?=base_url();?>css/magnific-popup.css">

		<!-- Search Modal -->

		<div class="modal fade search-modal-area" id="exampleModalsrc">

			<div class="modal-dialog modal-dialog-centered">

				<div class="modal-content">

					<button type="button" data-bs-dismiss="modal" class="closer-btn">

						<i class="ri-close-line"></i>

					</button>



					<div class="modal-body">

						<form class="search-box">

							<div class="search-input">

								<input type="text" name="Search" placeholder="Search for..." class="form-control">



								<button type="submit" class="search-btn">

									<i class="ri-search-line"></i>

								</button>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>

		<!-- Search Modal -->



		<!-- Start Banner Area -->

		<section class="banner-area bg-1 jarallax" data-jarallax='{"speed": 0.3}'>

			<!-- <div class="d-table">

				<div class="d-table-cell"> -->

				<div class="">

				<div class="">

					<div class="container">

						<div class="row mt-2">

							<div class="col-lg-6 col-sm-12">

								<div class="banner-content">

									<span> Get started with </span>

									<h1>The Global University</h1>

									<p>“We want that education by which character is formed, strength of mind is increased, the intellect is

								 expanded, and by which one can stand on one's own feet” - Swami Vivekananda.</p>



									<div class="banner-btn mb-4 ">

										<a href="<?=base_url()?>about-us" class="default-btn">

											Explore More

											<i class="ri-arrow-right-line"></i>

										</a>

									</div>



									<!-- <div class="courses-link">

										<a href="<?=base_url()?>all-corses">

											Explore our courses  

											<i class="ri-arrow-right-line"></i>

										</a>

										

									</div> -->

								</div>

							</div>



							<div class="col-lg-6 col-sm-12">

								<!-- <div class="banner-img">

									<img src="assets/images/banner/banner-img-1.jpg" alt="Image">

								</div> -->

								<div class="campus-experience-slider owl-carousel owl-theme">

							<div class="single-campus-experience">

							<div class="banner-img">

									<img src="assets/images/banner/tgu-banner-2.jpg" alt="TGU">

								</div>

								<!-- <h3>The campus experience</h3>

								<p>Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie lacinia eget consectetur posuere blandit.</p>

								<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget consectetur sed amet quam vehicula elementum.</p>

	

								<a href="campus-experience.html" class="read-more">

									Find out more

									<i class="ri-arrow-right-line"></i>

								</a> -->

							</div>



							<div class="single-campus-experience">

							<div class="banner-img">

									<img src="assets/images/banner/tgu-banner-4.jpg" alt="Image">

								</div>

								<!-- <h3>The campus experience about</h3>

								<p>Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie lacinia eget consectetur posuere blandit.</p>

								<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget consectetur sed amet quam vehicula elementum.</p>

	

								<a href="campus-experience.html" class="read-more">

									Find out more

									<i class="ri-arrow-right-line"></i>

								</a> -->

							</div>

						</div>

							</div>

						</div>

					</div>

				</div>

			</div>



			<ul class="social-link">

				<li>

					<a href="https://www.facebook.com/theglobaluni/" target="_blank">

						Facebook

					</a>

				</li>

				<li>

					<a href="https://www.instagram.com/theglobaluniversity?igsh=ejMxaTc1bndudDlk" target="_blank">

						Instagram

					</a>

				</li>

				<li>

					<a href="https://x.com/theglobaluni?t=t4DU0MYYkGovmWlIhplEww&s=09" target="_blank">

						Twitter

					</a>

				</li>

				<li>

					<a href="https://www.linkedin.com/in/the-global-university-427b12295/?originalSubdomain=in" target="_blank">

						Linkedin

					</a>

				</li>

			</ul>

		</section>

		<!-- End Banner Area -->



		<!-- Stat About Area -->

		<section class="about-area ptb-100">

			<div class="container">

				<div class="row align-items-center">

					<div class="col-lg-6">

						<div class="about-img mr-15">

							<img src="assets/images/tgu-2.png" alt="Image">

						</div>

					</div>



					<div class="col-lg-6">

						<div class="about-content ml-15">

							<span>ABOUT THE GLOBAL UNIVERSITY</span>

							<h2>Welcome To The Global University</h2>



							<p>A university is a diverse and dynamic institution of higher education that plays a central role in shaping the future of individuals and societies. It is a place where students embark on educational journeys that can transform their lives, while faculty and researchers engage in cutting-edge studies and contribute to the advancement of knowledge. Universities are often characterized by academic excellence, research activities, and a vibrant community of students, faculty, and staff.</p>



							<a href="<?=base_url()?>about-us" class="default-btn">

							Discover More

								<i class="ri-arrow-right-line"></i>

							</a>

						</div>

					</div>

				</div>

			</div>

		</section>

		<!-- End About Area -->

		





		<!-- Start Our Campus Information Area -->

		<section class="our-campus-information-area pb-100">

			<div class="container">

				<div class="row align-items-center">

					<!-- <div class="col-xl-7">

						<div class="campus-img">

							<img src="assets/images/campus-img.jpg" alt="Image">

						</div>

					</div> -->



					<div class="col-xl-12">

						<div class="campus-content">

							<!-- <span>Our campus information</span> -->

							<h2>The Global University</h2>

							<p>A university is a hub of learning, discovery, and innovation, where knowledge is cultivated, shared, and advanced. It serves as a beacon of intellectual growth, offering a wide array of academic programs spanning various disciplines, from the arts and sciences to professional and vocational fields. Universities provide a nurturing environment that empowers students to explore their passions, expand their horizons, and develop the critical thinking and problem-solving skills necessary for a successful and fulfilling future</p>

							<!-- <p>With a rich history of educational excellence spanning over decades,The Global University stands as a beacon of knowledge, promoting a culture of inclusivity and intellectual curiosity. Our distinguished faculty members, comprising accomplished scholars and industry experts, provide a stimulating learning environment, imparting valuable insights and practical skills to prepare students for the complexities of the modern world.</p> -->

							<!-- <p>At The Global University, we prioritize student success and well-being, offering state-of-the-art facilities, comprehensive support services, and a vibrant campus life. Our global network of partnerships with leading organizations and institutions ensures that our graduates are well-equipped to excel in their chosen fields, making a positive impact on a global scale.</p>

							<p>Join us at The Global University and embark on a transformative educational journey that will not only broaden your horizons but also equip you with the knowledge and skills to thrive in an ever-evolving global landscape.</p> -->

								

							<a href="<?=base_url()?>about-us" class="read-more">

								Read More

								<span class="ri-arrow-right-line"></span>

							</a>

						</div>

					</div>

				</div>

			</div>

		</section>

		<!-- End Our Campus Information Area -->



				<!-- Start Study Area -->

				<!-- <section class="study-area pt-100 pb-70">

			<div class="container">

				<div class="section-title white-title">

					<h2>Browse courses by study area</h2>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

				</div>



				<div class="row justify-content-center">

					<div class="study-slider owl-carousel owl-theme">

						<div class="single-study">

							<i class="flaticon-finance"></i>

							<h3>

								<a href="study-online.html">Business and finance</a>

							</h3>

							<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore.</p>



							<a href="study-online.html" class="read-more">

								Find out more

								<span class="ri-arrow-right-line"></span>

							</a>

						</div>



						<div class="single-study">

							<i class="flaticon-data-scientist"></i>

							<h3>

								<a href="study-online.html">IT and data science</a>

							</h3>

							<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore.</p>



							<a href="study-online.html" class="read-more">

								Find out more

								<span class="ri-arrow-right-line"></span>

							</a>

						</div>



						<div class="single-study">

							<i class="flaticon-compliant"></i>

							<h3>

								<a href="study-online.html">Law and criminology</a>

							</h3>

							<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore.</p>



							<a href="study-online.html" class="read-more">

								Find out more

								<span class="ri-arrow-right-line"></span>

							</a>

						</div>



						<div class="single-study">

							<i class="flaticon-health"></i>

							<h3>

								<a href="study-online.html">Health and medicine</a>

							</h3>

							<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore.</p>



							<a href="study-online.html" class="read-more">

								Find out more

								<span class="ri-arrow-right-line"></span>

							</a>

						</div>



						<div class="single-study">

							<i class="flaticon-data-scientist"></i>

							<h3>

								<a href="study-online.html">Business and finance</a>

							</h3>

							<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore.</p>



							<a href="study-online.html" class="read-more">

								Find out more

								<span class="ri-arrow-right-line"></span>

							</a>

						</div>

					</div>

				</div>

			</div>

		</section> -->

		<!-- End Study Area -->



			<!-- Start Study Area -->

			<section class="studys-area pb-70">

			<div class="container">

				<div class="section-title">

				<h2>WHY THE GLOBAL UNIVERSITY?</h2>

					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p> -->

				</div>



				<div class="row justify-content-center">

					<div class="col-lg-4 col-md-6">

						<div class="single-study study-f3f3f4 wc_block cc1" >

							

							<h3>

							Extraordinary Education

							</h3>

							<p>Empowering through extraordinary education. </p>



						

						</div>

					</div>



					<div class="col-lg-4 col-md-6">

						<div class="single-study study-f3f3f4 wc_block cc2">

							

							<h3>

							Expertise Staff

							</h3>

							<p>Guided by expertise, our staff ensures unparalleled learning experiences. </p>



							

						</div>

					</div>



					<div class="col-lg-4 col-md-6">

						<div class="single-study study-f3f3f4 wc_block cc3">

							

							<h3>

							Peaceful Campus

							</h3>

							<p>Discover a serene academic environment on our peaceful campus, fostering focused learning and personal growth. </p>

	

							

						</div>

					</div>

					<div class="col-lg-4 col-md-6">

						<div class="single-study study-f3f3f4 wc_block cc4">

							

							<h3>

							Vision

							</h3>

							<p>Envisioning a brighter tomorrow through innovation and education, shaping global leaders. </p>



							

						</div>

					</div>



					<div class="col-lg-4 col-md-6">

						<div class="single-study study-f3f3f4 wc_block cc5">

							

							<h3>

							Library

							</h3>

							<p>Explore a world of knowledge at our state-of-the-art library, offering extensive resources for academic excellence and research </p>



							

						</div>

					</div>



					<div class="col-lg-4 col-md-6">

						<div class="single-study study-f3f3f4 wc_block cc6">

					

							<h3>

								Achievements

							</h3>

							<p>Celebrating remarkable milestones and exceptional accomplishments, inspiring excellence and progress </p>

	

							

						</div>

					</div>

				</div>

			</div>

		</section>

		<!-- End Study Area -->



		<!-- Start Simple Steps Area -->

		<!-- <section class="simple-steps-area pb-70">

			<div class="container">

				<div class="section-title">

					<h2>WHY THE GLOBAL UNIVERSITY?</h2>



				</div>



				<div class="row">

					<div class="col-lg-3 col-sm-6">

						<div class="single-simple-steps">

							<i class="flaticon-search"></i>

							<h3>Querist</h3>

							<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore.</p>

						</div>

					</div>



					<div class="col-lg-3 col-sm-6">

						<div class="single-simple-steps">

							<i class="flaticon-choosing"></i>

							<h3>Choose</h3>

							<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore.</p>

						</div>

					</div>



					<div class="col-lg-3 col-sm-6">

						<div class="single-simple-steps">

							<i class="flaticon-contract"></i>

							<h3>Enroll</h3>

							<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore.</p>

						</div>

					</div>



					<div class="col-lg-3 col-sm-6">

						<div class="single-simple-steps">

							<i class="flaticon-presentation"></i>

							<h3>Start</h3>

							<p>Lorem ipsum dolor sit consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore.</p>

						</div>

					</div>

				</div>

			</div>

		</section> -->

		<!-- End Simple Steps Area -->



		<!-- Start Study Area -->

		<!-- <section class="study-area study-area-style-two pt-100 pb-70">

			<div class="container">

				<div class="section-title">

					<h2>Our Recruiters</h2>

					

				</div>



				<div class="row justify-content-center">

					<div class="study-slider owl-carousel owl-theme">





						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-0.png" alt="Image">

						</div>

						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-1.png" alt="Image">

						</div>



						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-2.png" alt="Image">

						</div>



						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-3.png" alt="Image">

						</div>



						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-4.png" alt="Image">

						</div>



						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-5.png" alt="Image">

						</div>

						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-6.png" alt="Image">

						</div>



						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-7.png" alt="Image">

						</div>



						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-8.png" alt="Image">

						</div>



						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-9.png" alt="Image">

						</div>

						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-10.png" alt="Image">

						</div>

						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-11.png" alt="Image">

						</div>



						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-12.png" alt="Image">

						</div>



						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-13.png" alt="Image">

						</div>



						<div class="single-study style-img">

							<img class="img-responsive" src="assets/images/clients/our-recuirement-img-14.png" alt="Image">

						</div>







						

					</div>

				</div>

			</div>

		</section> -->

		<!-- End Study Area -->



		<!-- Start Events Area -->

		<section class="events-area bg-color ptb-100" id="news_section">

			<div class="container">

				<div class="row align-items-center">

					<div class="col-lg-12">

						<div class="events-content mr-15">

							<!-- <span>Events</span> -->

							<div class="section-title">

								<h2>News</h2>

							</div>

							

							



							<!-- <ul class="events-list">

							<?php if(!empty($news)){ 

										foreach($news as $new){

									?>

								<li>

									<div class="events-date">

									<?php $formattedDate = date('j M', strtotime($new->date));

    								$year = date('Y', strtotime($new->date)); ?>

										<span class="mb-2"><?=$formattedDate?></span>

										<span><?=$year?></span>

									</div>

									<span><?=$new->news_type?></span>

									<h3>

										<a href="<?=base_url()?>event-details/<??>">

											<?=$new->news?>

										</a>

									</h3>

									<p><?=$new->long_news?></p>

									<a href="<?=base_url()?>event-details" class="read-more">

										Find out more

										<i class="ri-arrow-right-line"></i>

									</a>

								</li>



								<?php }}?> -->



								



								<ul class="events-list">



									<?php

									$counter = 0; 

									foreach ($news as $new):

										if ($counter < 3): 

											$formattedDate = date('j M', strtotime($new->date));

											$year = date('Y', strtotime($new->date));

									?>

											<li>

												<div class="events-date">

													<span class="mb-2"><?= $formattedDate ?></span>

													<span><?= $year ?></span>

												</div>

												<span><?= $new->news_type ?></span>

												<h3>

													<a href="<?= base_url() ?>read-news/<?=str_replace(" ","-",$new->heading)?>/?id=<?=$new->id?>">

														<?= $new->heading ?>

													</a>

												</h3>

												<!-- <p><?= $new->long_news ?></p>

												<a href="<?= base_url() ?>event-details/<?=$new->id?>" class="read-more">

													Find out more

													<i class="ri-arrow-right-line"></i>

												</a> -->

											</li>

										<?php

											$counter++;

										endif;

									endforeach;

									?>

									<br>

								</ul>



								



								<!-- <li>

									<div class="events-date">

										<span class="mb-2">02 May</span>

										<span>2021</span>

									</div>



									<span>Conference</span>

									<h3>

										<a href="<?=base_url()?>event-details">

											History and culture open day conference 2021

										</a>

									</h3>

									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>



									<a href="<?=base_url()?>event-details" class="read-more">

										Find out more

										<i class="ri-arrow-right-line"></i>

									</a>

								</li> -->



								<!-- <li>

									<div class="events-date">

										<span class="mb-2">03 May</span>

										<span>2021</span>

									</div>



									<span>Conference</span>

									<h3>

										<a href="<?=base_url()?>event-details">

											Undergraduate and postgraduate open days 2021

										</a>

									</h3>

									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>



									<a href="<?=base_url()?>event-details" class="read-more">

										Find out more

										<i class="ri-arrow-right-line"></i>

									</a>

								</li> -->

							</ul>

							

						<!-- </div>

							<div class="comman_button">

								<a href="<?=base_url()?>all-news" class="default-btn2">

											Explore More

									<i class="ri-arrow-right-line"></i>

								</a>

							</div>	

						</div> -->



						<div class="comman_button">

							<?php if (count($news) > 3): ?>

								<a href="<?= base_url() ?>all-news" class="default-btn2">

									Explore More

									<i class="ri-arrow-right-line"></i>

								</a>

							<?php endif; ?>

						</div>



					

					<!-- <div class="col-lg-5">

						<div class="events-timer ml-15">

							<div class="event-img">

                                <img src="assets/images/event-img.jpg" alt="Image">

                            </div>



                            <span>Next Event</span>

                            

                            <div id="timer">

                                <div id="days"></div>

                                <div id="hours"></div>

                                <div id="minutes"></div>

                                <div id="seconds"></div>

                            </div>



                            <a href="application.html" class="default-btn">

                                Book now

                                <i class="ri-arrow-right-line"></i>

                            </a>

                        </div>

					</div> -->

				</div>

			</div>

		</section>

		<!-- End Events Area -->



		<!-- Stat Admission Area -->

		<!-- <section class="admission-area ptb-100">

			<div class="container">

				<div class="row align-items-center">

					<div class="col-lg-6">

						<div class="admission-img mr-15">

							<img src="assets/images/admission-img.jpg" alt="Image">

						</div>

					</div>



					<div class="col-lg-6">

						<div class="admission-content ml-15">

							<span>Admission information</span>

							<h2>All types of university admission information can be found here</h2>

							<p>Curabitur aliquet quam id dui posuere blandit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>



							<a href="admissions.html" class="default-btn">

								Overview

								<i class="ri-arrow-right-line"></i>

							</a>

						</div>

					</div>

				</div>

			</div>

		</section> -->

		<!-- End Admission Area -->



		<!-- Start Find A Courses Area -->

		<!-- <section class="find-courses-area pt-100 pb-100">

			<div class="find-courses-bg">

				<div class="container">

					<div class="row align-items-center">

						<div class="col-lg-6">

							<form class="find-courses-from-bg mr-15">

								<h2>Find a courses</h2>

	

								<div class="row">

									<div class="col-lg-6 col-sm-6">

										<label class="single-check">

											Undergraduate

											<input type="radio" checked="checked" name="radio-2">

											<span class="checkmark"></span>

										</label>

									</div>

	

									<div class="col-lg-6 col-sm-6">

										<label class="single-check">

											Postgraduate   

											<input type="radio" name="radio-2">

											<span class="checkmark"></span>

										</label>

									</div>

								</div>

	

								<div class="form-group">

									<input class="form-control" type="text" placeholder="Keyword search">

								</div>

	

								<div class="form-group">

									<select class="form-control">

										<option value="1">Category course</option>	

										<option value="2">Web Design</option>

										<option value="3">Web Developement</option>

										<option value="4">Graphic Design</option>

										<option value="5">App Developement</option>

									</select>

									<i class="ri-arrow-down-s-line"></i>

								</div>

	

								<div class="form-group">

									<select class="form-control">

										<option value="1">United States</option>	

										<option value="2">العربيّة</option>

										<option value="3">Deutsch</option>

										<option value="4">Português</option>

										<option value="5">简体中文</option>

									</select>

									<i class="ri-arrow-down-s-line"></i>

								</div>

	

								<button type="submit" class="default-btn">

									Search

									<i class="ri-search-line"></i>

								</button>

							</form>

						</div>



						<div class="col-lg-6">

							<div class="ml-15">

								<div class="row">

									<div class="col-lg-6 col-sm-6">

										<div class="single-counter">

											<i class="flaticon-graduated"></i>

			

											<div class="count-title">

												<h2>

													<span class="odometer" data-count="4517">00</span> 

												</h2>

												<h4>Students</h4>

											</div>

										</div>

									</div>



									<div class="col-lg-6 col-sm-6">

										<div class="single-counter bg-172f41">

											<i class="flaticon-teacher"></i>

			

											<div class="count-title">

												<h2>

													<span class="odometer" data-count="640">00</span> 

												</h2>

												<h4>Teachers</h4>

											</div>

										</div>

									</div>



									<div class="col-lg-6 col-sm-6">

										<div class="single-counter bg-172f41">

											<i class="flaticon-book-1"></i>

			

											<div class="count-title">

												<h2>

													<span class="odometer" data-count="54">00</span> 

												</h2>

												<h4>Subjects</h4>

											</div>

										</div>

									</div>



									<div class="col-lg-6 col-sm-6">

										<div class="single-counter">

											<i class="flaticon-graduation-cap"></i>

			

											<div class="count-title">

												<h2>

													<span class="odometer" data-count="269">00</span> 

												</h2>

												<h4>Degrees</h4>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</section> -->

		<!-- End Find A Courses Area -->



		<!-- Start Campus Experience Area -->

		<!-- <section class="campus-experience-area ptb-100">

			<div class="container">

				<div class="row align-items-center">

					<div class="col-lg-6">

						<div class="logistics-solutions-img bg-2">

							<div class="video-button">

								<a href="https://www.youtube.com/watch?v=rl93WvCJt-U" class="popup-youtube video-btn">

									<i class="flaticon-play-button"></i>

								</a>

							</div>

						</div>

					</div>



					<div class="col-lg-6">

						<div class="campus-experience-slider owl-carousel owl-theme">

							<div class="single-campus-experience">

								<h3>The campus experience</h3>

								<p>Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie lacinia eget consectetur posuere blandit.</p>

								<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget consectetur sed amet quam vehicula elementum.</p>

	

								<a href="campus-experience.html" class="read-more">

									Find out more

									<i class="ri-arrow-right-line"></i>

								</a>

							</div>



							<div class="single-campus-experience">

								<h3>The campus experience about</h3>

								<p>Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie lacinia eget consectetur posuere blandit.</p>

								<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget consectetur sed amet quam vehicula elementum.</p>

	

								<a href="campus-experience.html" class="read-more">

									Find out more

									<i class="ri-arrow-right-line"></i>

								</a>

							</div>

						</div>

					</div>

				</div>

			</div>

		</section> -->

		<!-- End Campus Experience Area -->



		<!-- Start Blog Area -->

		<section class="blog-area pt-100 pb-70">

			<div class="container">

				<div class="section-title">

					<h2>Academic’s Blogs</h2>

					<!-- <p>Embracing digital innovation, academia is evolving, fostering a dynamic blend of traditional scholarship and modern methodologies to advance research and knowledge dissemination -->

						

					</p>

				</div>



				<div class="row justify-content-md-center home_blog_sec">

					<?php

						$counter = 0;

						foreach ($blogs as $blog):

							if ($counter < 3):

					?>

							<div class="col-lg-4 col-md-6">

								<div class="single-blog">

								

									<a href="<?= base_url() ?>read-blogs/<?=str_replace(" ","-",$blog->file)?>/?id=<?=$blog->id?>" class="blog-img">

									<!-- <img src="assets/images/blog/blog-1.jpg" alt="Image"> -->

										<!-- <span>Academics</span> -->

										<!-- <?php if (!empty($blog->file)): ?>

											<?php

												$imagePath = $this->Digitalocean_model->get_photo('blog/' . $blog->file);

												echo "<img src='$imagePath' alt='blogs Image'>";

											?>

										<?php else: ?>

											

											<img src="path_to_default_image" alt="Default Image">

										<?php endif; ?> -->

										

										<div class="blog-img-home" style="background-image: url('<?php echo (!empty($blog->file)) ? $this->Digitalocean_model->get_photo('blog/' . $blog->file) : 'path_to_default_image'; ?>');">

										</div>

									</a>



									<div class="blog-content">

										<ul>

											

											<li>

												<i class="ri-calendar-line"></i>

												<span><?= date('d, M Y', strtotime($blog->date)) ?></span>

											</li>

										</ul>



										<h3>

											<!-- <a href="<?= base_url() ?>blog-details/<?=$blog->id?>"> -->

											<a href="<?= base_url() ?>read-blogs/<?=str_replace(" ","-",$blog->heading)?>/?id=<?=$blog->id?>">

												<?= $blog->heading ?>

											</a>

										</h3>



										<p class="blog_unique"><?= $blog->long_blogs ?></p>

									</div>

								</div>

							</div>

					<?php

					$counter++;

					endif;

					endforeach;

					?>

				</div>







					<!-- <div class="col-lg-4 col-md-6">

						<div class="single-blog">

							<a href="<?=base_url()?>blog-details" class="blog-img">

								<img src="assets/images/blog/blog-2.jpg" alt="Image">

								<span>Academics</span>

							</a>



							<div class="blog-content">

								<ul>

									<li>

										<i class="ri-calendar-line"></i>

										<span>28 March, 2021</span>

									</li>

								</ul>

	

								<h3>

									<a href="<?=base_url()?>blog-details">

										What and where choosing to study

									</a>

								</h3>

	

								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam animi dicta ex labore. Ipsum nobis amet nisi voluptate corporis consectetur adipisicing elit alias</p>

							</div>

						</div>

					</div>



					<div class="col-lg-4 col-md-6">

						<div class="single-blog">

							<a href="<?=base_url()?>blog-details" class="blog-img">

								<img src="assets/images/blog/blog-3.jpg" alt="Image">

								<span>Academics</span>

							</a>



							<div class="blog-content">

								<ul>

									<li>

										<i class="ri-calendar-line"></i>

										<span>29 March, 2021</span>

									</li>

								</ul>

	

								<h3>

									<a href="<?=base_url()?>blog-details">

										A day in the life of a student

									</a>

								</h3>

	

								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam animi dicta ex labore. Ipsum nobis amet nisi voluptate corporis consectetur adipisicing elit alias</p>

							</div>

						</div>

					</div> -->

					<div class="comman_button">

					<!-- <?php if (count($blogs) > 3): ?> -->

						<a href="<?=base_url()?>blog" class="default-btn">

							Explore More

							<i class="ri-arrow-right-line"></i>

						</a>

						<?php endif; ?>

					</div>

				<!-- </div> -->

				

			</div>

		</section>

		

		<section class="blog-area pt-100 pb-70 activities-section">

			<div class="container activities-content">

				<h3 class="section-title">University Activities</h3>

				<p class="p-md text-center">

					<b>Though numerous extracurricular activities exist, the following activities are those that are most commonly found on college campuses.</b>

				</p>

				<div class="container mt-5">

        <div class="activities carousel-wrap">

            <div class="owl-carousel">

			

				

				

				<?php if (!empty($univerisity_activity)) {

					foreach ($univerisity_activity as $univerisity_activity_result) { ?>

						<div class="item act-it img-container activity-slide" style="background-image: url('<?=$this->Digitalocean_model->get_photo('images/university_activity/images/'.$univerisity_activity_result->file)?>');">

							<h3 class="img-caption bottom-top"><?=$univerisity_activity_result->image_title?></h3>

						</div>

				<?php }} ?>

			

					</div>

					</div>

					</div>

			<div class="text-center mt-5"> 

				<a class="default-btn" href="<?=base_url();?>university-activities">Explore More<i class="ri-arrow-right-line"></i></a>  

			</div>

			</div>

		</section>

<!--		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->

<!--			<div class="modal-dialog modal-md">-->

<!--				<div class="modal-content">-->

<!--				<div class="modal-header">-->

<!--					<h5 class="modal-title" id="exampleModalLabel" style="color: #991b30;">Important</h5>-->

<!--					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->

<!--				</div>-->

<!--				<div class="modal-body">-->

<!--				<div class="col-md-12 home_modal">  -->

					

<!--					<p>We want to remind you to always use our genuine website <a style="font-weight:600;color: #991b30;" href="https://www.tgu.ac.in/">https://www.tgu.ac.in/</a> to protect your personal and financial information.</p>-->



<!--						<p>Do not use below websites. This website may be fake or malicious. Please do not enter any sensitive information.</p>-->



<!--						<ol>-->

<!--							<li>www.theglobaluniversity.com</li>-->

<!--							<li>www.theglobaluniversity.co.in</li>-->

<!--							<li>www.tguap.co.in</li>-->

<!--							<li>www.tguap.in</li>-->

<!--							<li>www.tguap.com</li>-->

<!--							<li>www.tguap.org.in</li>-->

<!--							<li>www.tguap.co</li>-->

<!--							<li>www.theglobaluniversity.org.in</li>-->

<!--							<li>www.theglobaluniversityap.com</li>-->

<!--							<li>www.theglobaluniversity.net.in</li>-->

<!--							<li>www.theglobaluniversityap.co.in</li>-->

<!--							<li>www.theglobaluniversityap.ac</li>-->

<!--							<li>www.theglobaluniversityap.org</li>-->

<!--							<li>www.tguaap.in</li>-->

<!--						</ol>-->

<!--						<p>Your online safety is our top priority.</p>-->

<!--				</div>-->

<!--    </div>-->

<!--  </div>-->

<!--</div>-->

<!--</div>-->

		<!-- End Blog Area -->

		

<!--	<div class="modal fade in show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->

<!--		<div class="modal-dialog modal-md">-->

<!--			<div class="modal-content">-->

<!--				<div class="modal-header">-->

<!--					<h5 class="modal-title" id="exampleModalLabel" style="color: #991b30;">Essential Updates Notice</h5>-->

<!--					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->

<!--				</div>-->

<!--				<div class="modal-body">-->

<!--				<div class="col-md-12 home_modal">  -->

					

<!--					<p>Some pages may not be accessible at the moment as we are performing essential updates. We are working continuously to restore full functionality as soon as possible.</p>-->

<!--        			<p>Thank you for your patience and understanding!</p>-->

<!--				</div>-->

<!--    </div>-->

<!--  </div>-->

<!--</div>-->

<!--</div>-->

		

		



		<?php include('footer.php');?>



	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script> -->

<script src="<?=base_url();?>js/swiper.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<!-- <script src="<?=base_url();?>js/3.6.0/jquery.min.js"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script src="<?=base_url();?>js/3.4.1/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- #counter -->

<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/jquery.counterup/1.0/jquery.counterup.min.js"></script> -->

<script src="<?=base_url();?>js/jquery.counterup.min.js"></script>

<script src="<?=base_url();?>back_panel/js/jquery.bootstrap.newsbox.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script> -->

<script src="<?=base_url();?>js/slick.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.1/owl.carousel.min.js"></script> -->

<script src="<?=base_url();?>js/owl.carousel.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script> -->

<script src="<?=base_url();?>js/jquery.magnific-popup.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script> -->

<script src="<?=base_url();?>js/2.1.3/owl.carousel.min.js"></script>

<!-- <script src="<?=base_url();?>js/bootstrap.min.js"></script> -->

		<script>

<?php if(isset($_GET['informationcenter'])){?>

const scrollToDiv = document.getElementById('informationcenter'); 

window.addEventListener('load', function() {

    scrollToDiv.scrollIntoView({ behavior: 'smooth' });

});

<?php }?>

	$(window).load(function(){

		setTimeout(function() {

			$(".popup-overlay").fadeIn();

		}, 1000); 

	});

	$(".close-overlay").click(function(){

		$(".popup-overlay").fadeOut();

	});

    $('.activities .owl-carousel').owlCarousel({

        loop: true,

        margin: 10,

        autoplay: false,

        nav: true,

        navText: [

            // "<i class='fa fa-caret-left'></i>",

            // "<i class='fa fa-caret-right'></i>"

             "<i class='ri-arrow-left-s-fill'></i>",

            "<i class='ri-arrow-right-s-fill'></i>"

        ],

        autoplay: true,

        autoplayHoverPause: true,

        responsive: {

            0: {

                items: 1

            },

            600: {

                items: 3

            },

            1000: {

                items: 3

            }

        }

    })

    // HERO SLIDER

    var menu = [];

    jQuery('.swiper-slide').each(function (index) {

        menu.push(jQuery(this).find('.slide-inner').attr("data-text"));

    });

    var interleaveOffset = 0.5;

    var swiperOptions = {

        loop: true,

        speed: 1000,

        parallax: true,

        autoplay: {

            delay: 6500,

            disableOnInteraction: false,

        },

        watchSlidesProgress: true,

        pagination: {

            el: '.swiper-pagination',

            clickable: true,

        },

        navigation: {

            nextEl: '.swiper-button-next',

            prevEl: '.swiper-button-prev',

        },

        on: {

            progress: function () {

                var swiper = this;

                for (var i = 0; i < swiper.slides.length; i++) {

                    var slideProgress = swiper.slides[i].progress;

                    var innerOffset = swiper.width * interleaveOffset;

                    var innerTranslate = slideProgress * innerOffset;

                    swiper.slides[i].querySelector(".slide-inner").style.transform =

                        "translate3d(" + innerTranslate + "px, 0, 0)";

                }

            },

            touchStart: function () {

                var swiper = this;

                for (var i = 0; i < swiper.slides.length; i++) {

                    swiper.slides[i].style.transition = "";

                }

            },

            setTransition: function (speed) {

                var swiper = this;

                for (var i = 0; i < swiper.slides.length; i++) {

                    swiper.slides[i].style.transition = speed + "ms";

                    swiper.slides[i].querySelector(".slide-inner").style.transition =

                        speed + "ms";

                }

            }

        }

    };

    var swiper = new Swiper(".swiper-container", swiperOptions);

    // DATA BACKGROUND IMAGE

    var sliderBgSetting = $(".slide-bg-image");

    sliderBgSetting.each(function (indx) {

        if ($(this).attr("data-background")) {

            $(this).css("background-image", "url(" + $(this).data("background") + ")");

        }

    });

</script>