<?php 
$university_details = $this->Setting_model->get_university_details();
$title = "";
$keywords = "";
$description = "";
$page_name = $this->uri->segment(1);
if($page_name == ""){
	$title = "Welcome toTHE GLOBAL UNIVERSITY";
	$keywords = "";
	$description = "";
}else{
	$title = str_replace("-"," ",$this->uri->segment(1));
	$keywords = "";
	$description = "";
}
$marquee_new = $this->Web_model->get_marquee_news();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?=base_url();?>favicon.ico">
	<link rel="shortcut icon" href="<?=base_url();?>images/logo/<?php if(!empty($university_details) && $university_details->logo != ""){ echo $university_details->logo;}else{ echo "demologo.png";}?>" />
    <title><?=ucwords($title)?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&display=swap" rel="stylesheet">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="<?=base_url();?>css/bootstrap.css" rel="stylesheet">

	<link href="<?=base_url();?>css/style.css" rel="stylesheet">
	<link href="<?=base_url();?>css/responsive.css" rel="stylesheet">
	<link href="<?=base_url();?>css/animate.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172017165-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-172017165-1');
</script>

  </head>

  <body>
	
 <div class="nav_bar_area">
	<div class="header_area ">
		<div class="container">
		<div class="row">
			<div class="col-lg-6 bir_logo">
				<a href="<?=base_url();?>">
				<img src="<?=base_url();?>images/logo/<?php if(!empty($university_details) && $university_details->logo !=""){ echo $university_details->logo;}else{?>demologo.png<?php }?>">
				<h4><?php if(!empty($university_details)){ echo $university_details->university_name;}?></h4>
				<p><?php if(!empty($university_details)){ echo $university_details->slogan;}?></p>
				</a>
			</div>
			<div class="col-lg-6">
				<div class="help_desk" id="demo">
					<h5>Helpline Number : <a href="tel:+918810588341">8810588341</a> | (10 AM to 5 PM)</h5>
				</div>
		        <div class="header_box">
				    <a href="<?=base_url();?>student-login" target="_blank"  class="admin center_login"><i class="fa fa-user" aria-hidden="true"></i> Student <span class="hide_sm">Login </span></a>
					<a href="<?=base_url();?>center-access" target="_blank" class="center_login"><i class="fa fa-university" aria-hidden="true"></i> Center <span class="hide_sm">Login</span></a>
                    <a href="<?=base_url();?>erp-access" target="_blank"  class="admin_Area center_login"><i class="fa fa-user" aria-hidden="true"></i> Employee </a>
                    <a href="<?=base_url();?>faculty_login" target="_blank"  class="admin_Area center_login"><i class="fa fa-user" aria-hidden="true"></i> Faculty Login</a>
                    <a href="<?=base_url();?>direct_pay" target="_blank"  class="admin_Area center_login"><i class="fa fa-credit-card" aria-hidden="true"></i> Pay Online </a>
					<div class="nav_bar" style="display:none"><i class="fa fa-bars" aria-hidden="true"></i></div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="header_Area">
		<div class="uni_mainWrapper_right_overlay">
			<div class="uni_header_menu ">
				<div class="container">
					<div class="row">
						<ul class="uni_header_menu_main">
							<li class="mega_bar "><a href="#">About University <i class="fas fa-angle-down"></i></a>
								<ul class="submenu slideInUp animated">
									<li><a href="<?=base_url();?>about-us">About Us</a></li>
									<li><a href="<?=base_url();?>chairman-desk">Chairman Desk</a></li>
									<li><a href="<?=base_url();?>chancellor-message">Chancellor Message</a></li>
									<li><a href="<?=base_url();?>vice-chancellor-message">Vice-Chancellor Message</a></li>
									<li><a href="<?=base_url();?>former-president-letter">Former President Message</a></li>
									<li><a href="<?=base_url();?>former-president-letter">Appreciation by former president of india for the establishment of THE GLOBAL UNIVERSITY Arunachal Pradesh in north east India</a></li>
									<!--<li><a href="<?=base_url();?>road-map"> BTU Roadmap </a></li>-->
									<li><a href="<?=base_url();?>vision-and-mission">Vision & Mission</a></li>
								</ul>
							</li> 
							<li class="mega_bar "><a href="#">Courses <i class="fas fa-angle-down"></i></a>
								<ul class="submenu slideInUp animated">
									<?php 
									$fac = $this->Web_model->get_all_active_faculty();
									if(!empty($fac)){ foreach($fac as $fac_result){?>
									<li><a href="<?=base_url();?><?=str_replace(" ","-",$fac_result->faculty_name)?>"><?=$fac_result->faculty_name?> </a></li>
									<?php }}?> 
								</ul>
							</li>
							<li class="mega_bar "><a href="#">Admission <i class="fas fa-angle-down"></i></a>
								<ul class="submenu slideInUp animated">
									<li><a href="<?=base_url();?>admission-procedure">Admission Procedure </a></li>
									<li><a href="<?=base_url();?>admission-form">Admission Form</a></li>
									<li><a href="<?=base_url();?>re-registration-form">Re-registration Form</a></li>
									<li><a href="<?=base_url();?>syllabus-list">Syllabus</a></li>
								</ul>
							</li>
							<li class="mega_bar "><a href="#">Examination <i class="fas fa-angle-down"></i></a>
								<ul class="submenu slideInUp animated">
									<li><a href="<?=base_url();?>examination-form">Examination Form</a></li>
									<li><a href="<?=base_url();?>hallticket">Download Hallticket</a></li>
									<li><a href="<?=base_url();?>exam-login">Exam Login</a></li>
									<li><a target="_blank" href="<?=base_url();?>images/assessment/self-&-parent-assessment-form.pdf">Self Assessment & Parent Assessment Form </a></li>
									<li><a target="_blank" href="<?=base_url();?>images/assessment/teacher-assessment-form.pdf">Teacher Assessment Form</a></li>
									<li><a href="<?=base_url();?>result_view">View Results</a></li>
								</ul>
							</li>
							<li class="mega_bar "><a href="#">Recognition<i class="fas fa-angle-down"></i></a>
								<ul class="submenu slideInUp animated">
									<li><a href="<?=base_url();?>university-ugc">UGC Approvals</a></li>
									<li><a href="<?=base_url();?>university-approvals">University Gazette</a></li>
									<li><a target="_blank" href="<?=base_url();?>images/approvals/btu_approval_.pdf">AICTE</a></li>
									<li><a target="_blank" href="<?=base_url();?>images/approvals/AIU-Letter.pdf">AIU</a></li>
									<li><a target="_blank" href="<?=base_url();?>images/approvals/Prospectus.pdf">Prospectus</a></li>
								</ul>
							</li>
							<li class="mega_bar "><a href="#">Collaboration <i class="fas fa-angle-down"></i></a>
								<ul class="submenu slideInUp animated">
									<li><a href="<?=base_url();?>collaboration-enquiry">Online Form</a></li>
									<!--<li><a href="<?=base_url();?>collaborations-with-apll">Collaborations with APLL</a></li>-->
								</ul>
							</li>
							<li class="mega_bar "><a href="#">Research<i class="fas fa-angle-down"></i></a>
								<ul class="submenu slideInUp animated">
									<li><a href="<?=base_url();?>phd_registration_form">Ph.D Registration Form</a></li>
									<li><a target="_blank" href="<?=base_url();?>uploads/syllabus/Coursework-Syllabus.pdf">Course Work Syllabus</a></li>
									<li><a href="<?=base_url();?>phd_exam_login">Examination Login</a></li>
								</ul>
							</li>
							<!--<li><a href="#">Placement Area  <i class="fas fa-angle-down"></i></a></li>-->
							<!--<li><a href="#">Latest News  <i class="fas fa-angle-down"></i></a></li>-->
							<li><a href="<?=base_url();?>e-libraries">E-Library</a></li>
							<li><a href="<?=base_url();?>advertisement">Advertisement</a></li>
							<li class="blink"><a href="<?=base_url();?>press-release">Press Release</a></li>
							<li class=""><a href="<?=base_url();?>extension-activities">Extension Activities</a></li>
							<li><a href="<?=base_url();?>contact-us">Contact Us</a></li>
							<li class="mob_help_desk">Helpline Number : <a href="tel:+918810588341">8810588341</a> | (10 AM to 5 PM)</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<div class="uni_news_media">
				
				<div class="uni_latest_marques">
					<marquee onmouseover="this.stop();" onmouseout="this.start();"> 
					<?php if(!empty($marquee_new)){ foreach($marquee_new as $marquee_new_result){
						echo $marquee_new_result->news." ";
						if($marquee_new_result->file !=""){
						?>
					<a href="<?=base_url();?>uploads/news/<?=$marquee_new_result->file?>" target="_blank">View More</a>
						<?php }}}?>
					</marquee>
				</div>
					<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
