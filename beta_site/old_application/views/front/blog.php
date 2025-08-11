<?php 
// echo "<pre>";print_r($blogs);exit;
include('header.php')?>

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-13">
			<div class="container">
				<div class="page-title-content">
					<h2>Blog</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>

						<li class="active">Blog</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Blog Area -->
		<section class="blog-post-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="row justify-content-md-center">
							<div class="col-lg-12 col-md-6">
								<div class="single-blog">

								<?php if(!empty($blogs)){
									foreach($blogs as $blog){?>

									<a href="<?=base_url()?>blog-details" class="blog-img">
										<!-- <img src="assets/images/blog/blog-1.jpg" alt="Image">
										<span>Academics</span> -->
										<?php if (!empty($blog->file)): ?>
											<?php
												$imagePath = $this->Digitalocean_model->get_photo('blog/' . $blog->file);
												echo "<img src='$imagePath' alt='blogs Image'>";
											?>
										<?php else: ?>
											
											<img src="path_to_default_image" alt="Default Image">
										<?php endif; ?>
									</a>
		
									<div class="blog-content">
										<ul>
											<li>
												<i class="ri-calendar-line"></i>
												<?php $formattedDate = date('j M', strtotime($blog->date));
    											$year = date('Y', strtotime($blog->date)); ?>
    								
												<span><?=$formattedDate.' '.$year?></span>
											</li>
										</ul>
			
										<h3>
											<!-- <a href="<?=base_url()?>blog-details/<?=$blog->id?>"> -->
											<a href="<?=base_url()?>read-blogs/<?=str_replace(" ","-",$blog->heading)?>/?id=<?=$blog->id?>">

												<?=$blog->heading?>
											</a>
										</h3>
			
										<p><?=$blog->long_blogs?></p>
									</div>

									<?php }}?>
								</div>
							</div>
		
							<!-- <div class="col-lg-12 col-md-6">
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
			
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore nemo unde, porro cum asperiores illum quia voluptatum? Vero corporis aspernatur, saepe iusto tempora maiores qui optio eveniet soluta ipsa inventore! ipsum dolor sit amet consectetur adipisicing elit. Inventore nemo unde asperiores illum quia voluptatum asperiores illum quia</p>
									</div>
								</div>
							</div> -->
		
							<!-- <div class="col-lg-12 col-md-6">
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
			
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore nemo unde, porro cum asperiores illum quia voluptatum? Vero corporis aspernatur, saepe iusto tempora maiores qui optio eveniet soluta ipsa inventore! ipsum dolor sit amet consectetur adipisicing elit. Inventore nemo unde asperiores illum quia voluptatum asperiores illum quia</p>
									</div>
								</div>
							</div> -->

							<div class="col-12">
								<div class="pagination-area">
									<a href="#" class="prev page-numbers">
										<i class="ri-arrow-left-line"></i>
									</a>
									<span class="page-numbers current" aria-current="page">1</span>
									<a href="#" class="page-numbers">2</a>
									<a href="#" class="page-numbers">3</a>
									
									<a href="#" class="next page-numbers">
										<i class="ri-arrow-right-line"></i>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="widget-sidebar ml-15">
							<div class="sidebar-widget search">
								<form class="search-form">
									<input class="form-control" name="search" placeholder="Search..." type="text">
									<button class="search-button" type="submit">
										<i class="ri-search-line"></i>
									</button>
								</form>	
							</div>

							<div class="sidebar-widget categories">
								<h3>Categories</h3>
	
								<ul>
									<li>
										<a href="javascript:void(0);">
											Academies
											<i class="ri-arrow-right-s-line"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											Academies
											<i class="ri-arrow-right-s-line"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											Alumni
											<i class="ri-arrow-right-s-line"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											Application
											<i class="ri-arrow-right-s-line"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											Engineering
											<i class="ri-arrow-right-s-line"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											Design
											<i class="ri-arrow-right-s-line"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											Business
											<i class="ri-arrow-right-s-line"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											Science
											<i class="ri-arrow-right-s-line"></i>
										</a>
									</li>
								</ul>
							</div>

							<div class="sidebar-widget recent-post">
								<h3 class="widget-title">Latest news</h3>
								
								<ul>
									<li>
										<a href="<?=base_url()?>blog">
											Managing the study of management
											<img src="assets/images/blog-details/blog-3.jpg" alt="Image">
										</a>
										<span>March 08, 2021</span>
									</li>
									<li>
										<a href="<?=base_url()?>blog">
											Show your appreciation this valentine's day!
											<img src="assets/images/blog-details/blog-2.jpg" alt="Image">
										</a>
										<span>March 11, 2021</span>
									</li>
									<li>
										<a href="<?=base_url()?>blog">
											Positivity and productivity during COVID-19
											<img src="assets/images/blog-details/blog-1.jpg" alt="Image">
										</a>
										<span>March 10, 2021</span>
									</li>
								</ul>
							</div>

							<div class="sidebar-widget categories">
								<h3>Archives</h3>
	
								<ul>
									<li>
										<a href="#">
											January
											<span>2021</span>
										</a>
									</li>
									<li>
										<a href="#">
											October
											<span>2020</span>
										</a>
									</li>
									<li>
										<a href="#">
											January
											<span>2019</span>
										</a>
									</li>
									<li>
										<a href="#">
											February
											<span>2019</span>
										</a>
									</li>
									<li>
										<a href="#">
											October
											<span>2019</span>
										</a>
									</li>
									<li>
										<a href="#">
											June
											<span>2019</span>
										</a>
									</li>
									<li>
										<a href="#">
											February
											<span>2019</span>
										</a>
									</li>
									<li>
										<a href="#">
											January
											<span>2018</span>
										</a>
									</li>
								</ul>
							</div>
	
							<div class="sidebar-widget tags mb-0">
								<h3>Tags</h3>
	
								<ul>
									<li>
										<a href="javascript:void(0);">Academies</a>
									</li>
									<li>
										<a href="javascript:void(0);">Students</a>
									</li>
									<li>
										<a href="javascript:void(0);">Alumni</a>
									</li>
									<li>
										<a href="javascript:void(0);">Business</a>
									</li>
									<li>
										<a href="javascript:void(0);">University</a>
									</li>
									<li>
										<a href="javascript:void(0);">Engineering</a>
									</li>
									<li>
										<a href="javascript:void(0);">Course</a>
									</li>
									<li>
										<a href="javascript:void(0);">Scholarships</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Blog Area -->
<?php include('footer.php')?>