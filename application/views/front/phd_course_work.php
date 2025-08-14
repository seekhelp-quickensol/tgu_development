<?php include('header.php');?>

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

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-15">
			<div class="container">
				<div class="page-title-content">
					<h2>Ph.D Course Work</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>
						<li class="active">Research</li>
						<!-- <li class="active"> Ph.D Course Work</li> -->
						<li class="active">Ph.D Course Work</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

	

		<!-- <section>
            <div class="container">

            </div>

        </section> -->
		<br>
		<section class="c-padding inner-bg-2" id="about">
			<div class="uni_mainWrapper container box-shadow-global">

				<!--<h1>University Admission Form 2020-2021</h1>-->
				<div class="container custom-container" style="width: 100%;">
					<p class="tabs-p">
						It is for the information to all the scholars of The Global  UNIVERSITY that as per the guidelines issued from the UGC, each student shall be required to undertake course work which will be treated as M.Phil./Ph.D. preparation. All the scholars have to fill online Ph.D. course work admission form available on the website. The Ph.D. course work classes will be starting according to following schedule at University campus:
					</p>
				</div>
				<br>
				<center><a href="<?=base_url() ?>phd_course_work/enrollment" class="default-btn" style="margin-bottom:10px">Fill Online Ph.D Course Work Admission From</a></center>
			</div>
		</section>
		<br>

		<?php include('footer.php');?>