<?php include("header.php"); ?>

<!-- <link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/croppie.css"> -->
<style>
	.thank-you-container {
		margin-top: 50px;
		margin-bottom: 50px;
		padding: 50px;
		background-color: #fff;
		border-radius: 5px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		display: flex;
		justify-content: center;
		flex-direction: column;
		align-items: center;
	}
	.th_class{
		display: flex;
		justify-content: center;
	}
	.th_class img{
		width: 50px;
    	margin-bottom: 10px;
	}
	.btn-primary{
		background: #991b30;
    	color: #fff;
	}
</style>


<div class="uni_mainWrapper">

	<div class="container">

		<div class="row">

			<div class="container">

				<div class="online_wrapper">

					<!-- <div class="admission_div"> -->
					<div class="row th_class">
						<div class="col-md-12  thank-you-container">
							<h1>Thank You!</h1>
							<img src="<?= base_url()?>/images/thank.png" alt="">
							<p>Your application has been received.</p>
							<p>We will get back to you shortly.</p>
							<a href="<?=base_url()?>" class="default-btn2">Back to Home</a>
						</div>
					</div>

					<div class="clearfix"></div>
					<!-- </div> -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>


