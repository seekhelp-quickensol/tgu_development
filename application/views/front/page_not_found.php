<?php include('header.php');?>
<style>
	 

        .error-container {
            text-align: center;
            padding: 30px;
        }
 

        p {
            font-size: 1.2rem;
            margin: 10px 0;
        }

       

        
        
        .error-image {
            max-width: 300px;
            margin-bottom: 20px;
        }

        .social-icons {
            margin-top: 20px;
        }
 
</style>

		 
		<!-- Start Page Title Area -->
		<div class="page-title-area bg-1">
			<div class="container">
				<div class="page-title-content">
					<h2>Page Under Construction</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>

						<li class="active">Page Under Construction</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Stat About Area -->
		<section class="about-area ptb-100" style="background-image: url(''); background-size: cover; background-position: center;">
			<div class="container">
				<div class="error-container">
					<img src="<?= base_url(); ?>images/404_image.webp" alt="404 Error" class="error-image"> <br>
					<a href="<?= base_url(); ?>">Go to Homepage</a>
				</div>
			</div>
		</section>
		  
		    

		<?php include('footer.php');?>