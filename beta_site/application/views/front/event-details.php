<?php include('header.php')?>

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-20">
			<div class="container">
				<div class="page-title-content">
					<h2>News details</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>

						<li class="active">News details</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Event Details Area -->
		<section class="event-details-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-default-content mr-15">
							

							<?php if(!empty($news)){
								?>
									<span class="top-title"><?=$news->news_type?></span>
									<h2><?=$news->heading?></h2>
									<ul class="date-time">
								<li>
									<i class="ri-calendar-2-line"></i>
							
    								<?=date('d, M Y', strtotime($news->date)) ?>
								</li>
								<!-- <li>
									<i class="ri-time-line"></i>
									<?=date('l g:iA', strtotime($news->created_on)) ?>
								</li> -->
								<!-- <li>
									<i class="ri-map-pin-2-line"></i>
									London, UK
								</li> -->
							</ul>

							<div class="gap-20"></div>

							<!-- <img src="assets/images/event-details-img.jpg" alt="Image"> -->
							<?php if (!empty($news->file)): ?>
								<!-- <img src="<?= base_url(); ?>assets/images/<?= $news->photo ?>" style="height:30%"> -->
								<?php
									// $imagePath = $this->Digitalocean_model->get_photo('uploads/news/' . $news->file);
							
									// echo "<img src='$imagePath' alt='News Image'>";
									// echo "";
									
								?>
							<?php endif; ?>
							<div class="read-news-bg-main" style="background-image: url('<?php echo (!empty($news->file)) ? $this->Digitalocean_model->get_photo('uploads/news/' . $news->file) : 'path_to_default_image'; ?>'); "></div>
						
							<div class="gap-20"></div>

							<!-- <h3>Event Description</h3> -->
							<p><?=$news->news?></p>

							<p><?=$news->long_news?></p>

							<?php }?>
						</div>
					</div>

					<!-- <div class="col-lg-4">
						<div class="event-sidebar ml-15">
							<div class="event-single-sidebar">
								<?php 
									$formattedDate = date('j M', strtotime($news->date));
									$year = date('Y', strtotime($news->date));
								?>
								<h3>Events description - <?=$year?></h3>

								<ul>
									<li>
										Start
										<span><?=$formattedDate.' '.$year?></span>
									</li>
									<li>
										End	
										<span><?=$formattedDate.' '.$year?></span>
									</li>
									<li>
										Event Category
										<span><?=$news->news_type?></span>
									</li>
									<li>
										Location
										<span>London</span>
									</li>
									<li>
										Total slot
										<span>100</span>
									</li>
									<li>
										Booked Slot	
										<span>0</span>
									</li>
									<li>
										Website	
										<a href="index.html">www.unco.com</a>
									</li>
								</ul>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</section>
		<!-- End Event Details Area -->

	<?php include('footer.php')?>