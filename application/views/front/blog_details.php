<?php include('header.php')?>
<style>
	.sidebar-widget.recent-post ul li a img{
		width:80px;
	}
</style>

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-23">
			<div class="container">
				<div class="page-title-content">
					<h2>Blog Details</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>

						<li class="active">Blog Details</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Blog Details Area -->
		<section class="blog-details-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="blog-details-content mr-15">
							<div class="blog-details-img">
								<!-- <img src="assets/images/blog/blog-1.jpg" alt="Image"> -->
								<!-- <?php if (!empty($blogs->file)): ?>
									<?php
										$imagePath = $this->Digitalocean_model->get_photo('blog/' . $blogs->file);
										echo "<img src='$imagePath' alt='blog Image'>";
									?>
								<?php else: ?>
									<img src="path_to_default_image" alt="Default Image">
								<?php endif; ?> -->
								<div class="read-blogs-bg-main" style="background-image: url('<?php echo (!empty($blogs->file)) ? $this->Digitalocean_model->get_photo('blog/' . $blogs->file) : 'path_to_default_image'; ?>'); "></div>
							</div>
							
							

							<div class="blog-top-content">
								<div class="blog-content">

									<ul class="admin">
										<?php if(!empty($blogs)){
											?>
										<!-- <li> 
											<a href="#">
												<i class="ri-user-3-fill"></i>
												Harold McLeod
											</a>
										</li> -->

										<li>
											<i class="ri-calendar-2-line"></i>
											<!-- <?=$blogs->date?> -->
											<?=date('d, M Y', strtotime($blogs->date)) ?>
											<!-- April 26, 2021 -->
										</li>

										<!-- <li> 
											<a href="#">
												<i class="ri-discuss-line"></i>
												(03)No comments
											</a>
										</li> -->
									</ul>
									
									<h3><?=$blogs->heading?></h3>
									<p><?=$blogs->long_blogs?></p>


									<div class="gap-mb-20"></div>
								</div>

								<!-- <h3>Research and Self-Assessment</h3>
								<p>The university application process begins with a thorough self-assessment and research phase. This is where you need to ask yourself essential questions, such as:</p>
								<ul>
									<li>What are your academic interests and career goals?</li>
									<li>What type of university and location would be the best fit for you?</li>
									<li>What are your financial considerations and scholarship options?</li>
								</ul>

								<p>I started by researching different universities and their programs. Websites, brochures, and talking to current students can be valuable resources to gather information.</p>
												<?php }?> -->
							</div>

							<!-- <div class="tags">
								<ul class="tag-link">
									<li class="title">
										<i class="ri-price-tag-line"></i>
									</li>
									<li>
										<a href="javascript:void(0);" >
											Academic,
										</a>
									</li>
									<li>
										<a href="javascript:void(0);" >
											University,
										</a>
									</li>
									<li>
										<a href="javascript:void(0);" >
											Scholarships,
										</a>
									</li>
									<li>
										<a href="javascript:void(0);" >
											Student
										</a>
									</li>
								</ul>

								<div class="share-link">
									<ul class="social-icon">
										<li>
											<span>Share</span>
										</li>
										<li>
											<a href="javascript:void(0);" >
												<i class="ri-facebook-fill"></i>
											</a>
										</li>
										<li>
											<a href="javascript:void(0);" >
												<i class="ri-instagram-line"></i>
											</a>
										</li>
										<li>
											<a href="javascript:void(0);" >
												<i class="ri-linkedin-fill"></i>
											</a>
										</li>
										<li>
											<a href="javascript:void(0);" >
												<i class="ri-twitter-fill"></i>
											</a>
										</li>
									</ul>
								</div>
							</div> -->

							<!-- <ul class="comment">
								<li>
									<img src="assets/images/blog-details/comment-1.jpg" alt="Image">
									<h3>Admin1</h3>
									<span>1, july 2023</span>
									<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, quos! Pariatur ipsum aperiam alias distinctio vel molestiae id. Aut atque sequi eius omnis et? Nesciunt blanditiis incidunt.</p>

									<a href="#" class="read-more">Reply</a>
								</li>

								<li class="margin-left">
									<img src="assets/images/blog-details/comment-2.jpg" alt="Image">
									<h3>Admin2</h3>
									<span>20, may 2023</span>
									<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, quos! Pariatur ipsum aperiam alias distinctio vel molestiae id. Aut atque sequi eius omnis et? Nesciunt.</p>

									<a href="#" class="read-more">Reply</a>
								</li>

								<li>
									<img src="assets/images/blog-details/comment-3.jpg" alt="Image">
									<h3>Admin3</h3>
									<span>14, march 2023</span>
									<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, quos! Pariatur ipsum aperiam alias distinctio vel molestiae id. Aut atque sequi eius omnis Nesciunt blanditiis.</p>

									<a href="#" class="read-more">Reply</a>
								</li>
							</ul> -->

							<!-- <div class="leave-reply">
								<h3>Leave a reply</h3>

								<form>
									<p>Your email address will not be published. Required fields are marked*</p>
									<div class="row">
										<div class="col-lg-6 col-sm-6">
											<div class="form-group">
												<label>Name*</label>
												<input type="text" name="name" id="name" class="form-control">
											</div>
										</div>
			
										<div class="col-lg-6 col-sm-6">
											<div class="form-group">
												<label>Email*</label>
												<input type="email" name="email" id="email" class="form-control">
											</div>
										</div>

										<div class="col-12">
											<div class="form-group">
												<label>Your Website Link</label>
												<input type="text" name="website" id="website" class="form-control">
											</div>
										</div>
			
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<label>Comment</label>
												<textarea name="message" class="form-control" id="message" rows="8"></textarea>
											</div>
										</div>
			
										<div class="col-lg-12 col-md-12">
											<button type="submit" class="default-btn">
												Post a comment
											</button>
										</div>
									</div>
								</form>
							</div> -->
						</div>
					</div>

					<div class="col-lg-4">
						<div class="widget-sidebar ml-15">
							<!-- <div class="sidebar-widget search">
								<form class="search-form">
									<input class="form-control" name="search" placeholder="Search..." type="text">
									<button class="search-button" type="submit">
										<i class="ri-search-line"></i>
									</button>
								</form>	
							</div> -->

							<!-- <div class="sidebar-widget categories">
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
							</div> -->

							<div class="sidebar-widget recent-post">
								<h3 class="widget-title">Latest Blogs</h3>
								
								<ul>
									<?php
										$counter = 0;
										foreach ($latest_blogs as $blog):
											if ($counter < 3):
									?>
									<li>
										<a href="<?= base_url() ?>read-blogs/<?=str_replace(" ","-",$blog->file)?>/?id=<?=$blog->id?>">
											<?= $blog->heading ?>
											<!-- <img src="assets/images/blog-details/blog-3.jpg" alt="Image"> -->
											<?php if (!empty($blog->file)): ?>
											<?php
												$imagePath = $this->Digitalocean_model->get_photo('blog/' . $blog->file);
												echo "<img src='$imagePath' alt='blogs Image'>";
											?>
											<?php else: ?>
												<img src="path_to_default_image" alt="Default Image">
											<?php endif; ?>
										</a>
										<span><?= date('d M, Y', strtotime($blog->date))?></span>
									</li>

									<?php
										$counter++;
										endif;
										endforeach;
									?>
</ul>
							</div>

							<!-- <div class="sidebar-widget categories">
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
							</div> -->
	
							<!-- <div class="sidebar-widget tags mb-0">
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
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Blog Details Area -->

<?php include('footer.php')?>