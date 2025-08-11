<?php include('header.php')?> 
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
		<div class="page-title-area bg-2">
			<div class="container">
				<div class="page-title-content">
					<h2><?=str_replace("-"," ",ucwords($this->uri->segment(1)))?></h2> 
					<ul>
						<li>
							<a href="index.html">
								Home 
							</a>
						</li> 
						<li class="active">Courses</li>
					</ul>
				</div>
			</div>
		</div> 
		<section class="studys-area study-area-style-two ptb-100">
			<div class="container">
				<div class="section-title">
					<h2>Discover Courses Categorized By Academic Field.</h2>
				</div> 
				<div class="row justify-content-center">
					<?php if(!empty($course)){ foreach($course as $home_course_result){ ?>
					<div class="col-lg-4 col-sm-6 courses_main_div">
						<div class="single-study style-img">  
							<a href="<?=base_url();?><?=$home_course_result->course_link?>">
								<div class="courses_image_div" style="background-image: url('<?=$this->Digitalocean_model->get_photo('images/course/'.$home_course_result->course_image)?>');">
								</div>
							</a> 
							<div class="single-study-content">
								<i class="flaticon-graduation-cap"></i>
								<h3>
									<a href="<?=base_url();?><?=$home_course_result->course_link?>"><?=$home_course_result->course_name?></a>
								</h3>
								<p><?=substr($home_course_result->course_description,0,150)?></p> 
								<a href="<?=base_url();?><?=$home_course_result->course_link?>" class="read-more">Find out more
									<span class="ri-arrow-right-line"></span>
								</a>
							</div>
						</div>
					</div>
					<?php }}?> 
				</div>
			</div>
		</section> 
<?php include('footer.php') ?>