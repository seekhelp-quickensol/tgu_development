<?php include ('header.php')?>

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-5">
			<div class="container">
				<div class="page-title-content">
					<h2>All News</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>

						<li class="active">All News</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Events Area -->
		<section class="events-area events-area-style-two ptb-100">
			<div class="container">
				<div class="row">
					<!-- <div class="col-lg-5">
						<div class="events-timer mr-15">
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

                            <a href="#" class="default-btn">
                                Book now
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
					</div> -->

					<div class="col-lg-12">
						<div class="events-content ml-15">
							<!-- <span>Events</span> -->
							<h2>All News</h2>


							<ul class="events-list">
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
										<a href="<?=base_url()?>event-details/<?=$new->id?>">
											<?=$new->news?>
										</a>
									</h3>
									<p><?=$new->long_news?></p>
									<a href="<?=base_url()?>event-details/<?=$new->id?>" class="read-more">
										Find out more
										<i class="ri-arrow-right-line"></i>
									</a>
								</li>

								<?php }}?>
							</ul>


							<!-- <ul class="events-list">
								<li>
									<div class="events-date">
										<span class="mb-2">01 May</span>
										<span>2021</span>
									</div>

									<span>Conference</span>
									<h3>
										<a href="event-details.html">
											Universities admission conference 2021
										</a>
									</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

									<a href="event-details.html" class="read-more">
										Find out more
										<i class="ri-arrow-right-line"></i>
									</a>
								</li>

								<li>
									<div class="events-date">
										<span class="mb-2">02 May</span>
										<span>2021</span>
									</div>

									<span>Conference</span>
									<h3>
										<a href="event-details.html">
											History and culture open day conference 2021
										</a>
									</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

									<a href="event-details.html" class="read-more">
										Find out more
										<i class="ri-arrow-right-line"></i>
									</a>
								</li>

								<li>
									<div class="events-date">
										<span class="mb-2">03 May</span>
										<span>2021</span>
									</div>

									<span>Conference</span>
									<h3>
										<a href="event-details.html">
											Undergraduate & Postgraduate Open Days 2021
										</a>
									</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

									<a href="event-details.html" class="read-more">
										Find out more
										<i class="ri-arrow-right-line"></i>
									</a>
								</li>

								<li>
									<div class="events-date">
										<span class="mb-2">07 Jun</span>
										<span>2021</span>
									</div>

									<span>Conference</span>
									<h3>
										<a href="event-details.html">
											Graduation ceremonies conference 2021
										</a>
									</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

									<a href="event-details.html" class="read-more">
										Find out more
										<i class="ri-arrow-right-line"></i>
									</a>
								</li>

								<li>
									<div class="events-date">
										<span class="mb-2">15 Jun</span>
										<span>2021</span>
									</div>

									<span>Conference</span>
									<h3>
										<a href="event-details.html">
											Innovation awards 2021
										</a>
									</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

									<a href="event-details.html" class="read-more">
										Find out more
										<i class="ri-arrow-right-line"></i>
									</a>
								</li>

								<li>
									<div class="events-date">
										<span class="mb-2">25 Jun</span>
										<span>2021</span>
									</div>

									<span>Conference</span>
									<h3>
										<a href="event-details.html">
											Marketing and communication awards 2021
										</a>
									</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

									<a href="event-details.html" class="read-more">
										Find out more
										<i class="ri-arrow-right-line"></i>
									</a>
								</li> -->
								
								<div class="pagination-area">
									<span class="page-numbers current" aria-current="page">1</span>
									<a href="#" class="page-numbers">2</a>
									<a href="#" class="page-numbers">3</a>
									
									<a href="#" class="next page-numbers">
										<i class="ri-arrow-right-line"></i>
									</a>
								</div>
							<!-- </ul> -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Events Area -->

		<?php include('footer.php')?>