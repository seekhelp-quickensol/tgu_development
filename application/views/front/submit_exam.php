<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
		
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
	<style>
		.site-header img{
			width: 16%;
			margin-bottom: 28px;
		}
		.site-header {
			padding-top: 10%;
		}
		.main-content__body{
			font-size: 18px;
		}
		.site-footer {
			padding: 90px 0 25px;
		}
		.site-header__title {
			font-size: 24px;
			text-transform: initial !important;
		}
		@media (max-width: 768px){
			.site-header {
				margin: 0 auto;
				padding: 230px 0 0;
				max-width: 820px;
			}
			.site-header img {
				width: 60%;
				margin-bottom: 30px;
			}
			.main-content__body {
				font-size: 16px;
				margin-bottom: 70px;
			}
			.site-footer {
				padding: 0px 0 25px;
			}
			.site-header__title {
				font-size: 40px;
			}
			
		}
		.main-content__checkmark {
				font-size: 2.75rem !important;
			}
		
	</style>
</head>
<body>
	<header class="site-header" id="header">
		<img src="<?=base_url();?>images/logo.png" class="img-responsive">
		<h1 class="site-header__title" data-lead-id="site-header-title">Congratulations on submitting your exam successfully!</h1>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">It's important to keep in mind that the result of the exam is just one part of the journey. No matter what the outcome is, you can always learn from the experience and use it to improve and grow.</p>
		<p>Good luck and congratulations again on submitting your exam successfully!</p>
	</div>

	<footer class="site-footer" id="footer">
		<p class="site-footer__fineprint" id="fineprint"></p>
	</footer>
</body>
</html>
<script>
function deleteAllCookies() {
 var c = document.cookie.split("; ");
 for (i in c) 
  document.cookie =/^[^=]+/.exec(c[i])[0]+"=;expires=Thu, 01 Jan 1970 00:00:00 GMT";    
}
</script>