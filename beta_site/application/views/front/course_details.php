 <?php include('header.php');?> 
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

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-12">
			<div class="container">
				<div class="page-title-content">
					<h2><?=str_replace('-',' ',strtoupper($this->uri->segment(1)))?></h2>

					<ul>
						<li>
							<a href="javascript:void(0)">
								Course 
							</a>
						</li>

						<li class="active"><?=$course->sort_name?></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Study Online Area -->
		<section class="study-online-area ptb-100">
			<div class="container">
				<div class="main-default-content">
					<?=$course->description?>
					</div>
			</div>
		</section>
		<!-- End Study Online Area -->

		<!-- Start Application Submit Area -->
		<!-- <section class="application-submit-area pb-100">
			<div class="container">
				<div class="application-submit-bg">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="application-submit-content">
								<h2>Are you ready for your next journey with us?</h2>
								<a href="application.html" class="default-btn">
									Application form
									<i class="ri-arrow-right-line"></i>
								</a>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="application-submit-img">
								<img src="assets/images/application-submit-img.png" alt="Image">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
		<!-- End Application Submit Area -->

		<?php include('footer.php');?>