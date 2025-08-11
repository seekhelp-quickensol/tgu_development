<?php 
    $university_details = $this->Setting_model->get_university_details();

?>
<!-- <html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title> -->
	<!-- <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" />
    
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script> -->
<!-- </head> -->


<?php include('header.php');?>

<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?=$this->Digitalocean_model->get_photo('images/logo/'.$university_details->logo)?>" />
    
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
			.horizontal-menu{
			display:none;
		}
		a:link, a:visited{
			color: white !important;
		}
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
<body>
	<div class="site-header" id="header" style="padding-top: 135px;">
		<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
	</div>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body" style="text-align:center;">Exam has been successfully completed.</p>
		<p class="main-content__body" data-lead-id="main-content-body" style="text-align:center;margin-top: 0px;">Result will be declared soon.</p>
		<a href="<?=base_url()?>" class="btn btn-primary">Go to Homepage</a>
	</div>

	<footer class="site-footer" id="footer">
		<p class="site-footer__fineprint" id="fineprint">Copyright ©2020 | All Rights Reserved</p>
	</footer>
	
</body>
<!-- </html> -->

<script>
    window.onload = function() {
        setTimeout(function() {
			console.log('redirecting..');
            window.location.href = "<?=base_url()?>";
        },3000); 
    };
</script>


