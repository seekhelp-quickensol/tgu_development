<?php include('header.php');?>
<style>
	.fake_news_div{
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
		padding-top: 70px;
		padding-bottom: 70px;
		position: relative;
	}
	.fake_news_div:before{
		content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #ffffffb3;
    opacity: 0.9;
    z-index: 1;
	}
	.modal-dialog{
		margin:0 auto;
		z-index: 1;
		max-width: 600px;
	}
	.modal-content{
		border:none !important;
		border-top:6px solid #92210f !important;
		box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
	}
</style>
<section class="fake_news_div" style="background-image:url('<?=base_url()?>assets/images/banner/banner-bg-1.jpg');">
<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="col-md-12 home_modal">  
					<p>We want to remind you to always use our genuine website <a style="font-weight:600;color: #991b30;" href="https://www.tgu.ac.in/">https://www.tgu.ac.in/</a> to protect your personal and financial information.</p>
						<p>Do not use below websites. This website may be fake or malicious. Please do not enter any sensitive information.</p>
						<ol>
							<li>www.theglobaluniversity.com</li>
							<li>www.theglobaluniversity.co.in</li>
							<li>www.tguap.co.in</li>
							<li>www.tguap.in</li>
							<li>www.tguap.com</li>
							<li>www.tguap.org.in</li>
							<li>www.tguap.co</li>
							<li>www.theglobaluniversity.org.in</li>
							<li>www.theglobaluniversityap.com</li>
							<li>www.theglobaluniversity.net.in</li>
							<li>www.theglobaluniversityap.co.in</li>
							<li>www.theglobaluniversityap.ac</li>
							<li>www.theglobaluniversityap.org</li>
							<li>www.tguaap.in</li>
						</ol>
						<p>Your online safety is our top priority.</p>
				</div>
    		</div>
  		</div>
	</div>
</section>
	

<?php include('footer.php');?>