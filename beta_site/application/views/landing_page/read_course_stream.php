<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden">

<head>
    <title><?=$course->sort_name?> Course in India | Global University </title> 
	<meta name="author" content="GLOBAL UNIVERSITY">
	<meta name="keywords" content="">
	<meta name="Description" content="Admissions open now atTHE GLOBAL UNIVERSITY, we offer B Tech courses, Engineering | Course Admissions | Top university in Manipur India"> 
<link rel="canonical" href="<?=current_url()?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="icon" href="https://www.theglobaluniversity.edu.in/favicon.ico">
	<link rel="shortcut icon" href="https://www.theglobaluniversity.edu.in/images/logo/5946920e9234e40ca915a088283a8e5c.png" />
    <link href="landing_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="landing_assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 -->
    <script src="landing_assets/js/bootstrap.bundle.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="https://www.theglobaluniversity.edu.in/favicon.ico">
	
	<link rel="shortcut icon" href="<?=$this->Digitalocean_model->get_photo('images/logo/5946920e9234e40ca915a088283a8e5c.png')?>"/>

    <style>
         
		.home_banner{
			min-height:450px !important;
			background: url(landing_assets/images/btech_banner.jpg);
		}
    </style>
		<!-- Global site tag (gtag.js) - Google Analytics -->


<!-- Global site tag (gtag.js) - Google Ads: 595335465 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-595335465"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-595335465');
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MCGM1KW7T6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MCGM1KW7T6');
</script>

</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg_p1 shadow mob_bg">
        <div class="container">
        <a class="navbar-brand" href="<?=base_url();?>"> <img src="<?=$this->Digitalocean_model->get_photo('landing_assets/logo/btu_new.png')?>" class="logo"></a> 
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
				<div class="hamburger-toggle">
					<div class="hamburger">
						<img src="<?=$this->Digitalocean_model->get_photo('landing_assets/images/menu-button-of-three-horizontal-lines.png')?>" width="16" height="16">
					</div>
				</div>
			</button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <h1 class="heading_1">BIR TIKENDRAJIT UNIVERSITY<br><span class="heading_inner_text">Complete Learning Management Solution Process</span> </h1>

                <form class="d-flex ms-auto">
                    <div class="input-group">

                        <a class="hreftext" href="mailto:info@theglobaluniversity.edu.in"> <i class="fa fa-envelope" style="font-size:18px"></i> info@theglobaluniversity.edu.in</a>
                        <!-- <input class="form-control border-0 mr-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary border-0" type="submit">Search</button> -->
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <section class="home_banner" style="background: url(<?=$this->Digitalocean_model->get_photo('images/course/'.$course->slider_image)?>);">
        <div class="container-fluid overlay">
            <div class="container">
                <div class="row ">

                    <div class="col-lg-8">
                        <div class="hero_content">
                            <h2 class="herotext"><?=$course->print_name?></h2>
                            <div class="herotext_2">Admission open for <?=$course->sort_name?> <?=$course->stream_name?> <?=date("Y")?>-<?=date("y")+1?></div>
                        </div>


                    </div>
                    <div class="col-lg-4">

                        <div class="enquir_form">

                            <form method="post" name="course_form" id="course_form">
                                <div class="form-group"> 
                                    <input type="text" class="form-control input_lbl" name="name" id="name" placeholder="Full Name*">
                                </div>
								<div class="clearfix" style="margin-bottom: 5px;"></div>
                                <div class="form-group"> 
                                    <input type="text" class="form-control input_lbl" name="email" id="email" placeholder="Email*">
                                </div>
								<div class="clearfix" style="margin-bottom: 5px;"></div>
                                <div class="form-group"> 
                                    <input type="text" class="form-control input_lbl" name="mobile" id="mobile" placeholder="Mobile*">
                                </div>
								<div class="clearfix" style="margin-bottom: 5px;"></div>
                                <div class="row">
                                    <div class="form-group col-md-6"> 
                                        <select name="state" id="state" class="form-control select-arrow-cust widget_input">
											<option value="">State*</option>
											<?php if(!empty($state)){ foreach($state as $state_result){?>
											<option value="<?=$state_result->name?>"><?=$state_result->name?></option>
											<?php }}?>
										</select>
                                    </div> 
                                    <div class="form-group col-md-6"> 
                                        <select name="city" id="city" class="form-control select-arrow-cust widget_input">
											<option value="">City*</option>
										</select>
                                    </div> 
                                </div> 
								<div class="clearfix" style="margin-bottom: 5px;"></div>
                                <div class="form-group"> 
								<input type="text" name="course" id="course" placeholder="Course Name*" class="form-control select-arrow-cust widget_input" value="<?=$course->print_name?>">
                                </div>
								<div class="clearfix" style="margin-bottom: 5px;"></div>
								<div class="clearfix" style="margin-bottom: 5px;"></div> 
                                <div class="checkbox">
									<label><input type="hidden" name="Agree" value="0">
										<input type="checkbox" class="chkbox_size" checked="checked" name="agree" value="1" id="agree" class="widget_input">
										<span class="agree-condition">I agree to receive information regarding my submitted application.</span>
									</label>
								</div>


                                <div class="form-group" style="text-align: center;">
                                    <button class="submit_btn" type="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>
    <section class="hero_tabs">

        <div class="container">


            <center>

                <div class="row mx-auto">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="tabs">
                            <img src="<?=$this->Digitalocean_model->get_photo('landing_assets/images/1.png')?>" class="three_img">
                            <p>Accorded Institution of Eminence by UGC, AICTE Govt. of India</p>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="tabs">
                            <img src="<?=$this->Digitalocean_model->get_photo('landing_assets/images/2.png')?>" class="three_img">
                            <p>No. 1 Private University in India by Education World Ranking <?=date("Y")?></p>
                        </div>


                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="tabs">
                            <img src="<?=$this->Digitalocean_model->get_photo('landing_assets/images/3.png')?>" class="three_img">
                            <p>A legacy of the field of Higher Education</p>
                        </div>

                    </div>
                    <hr class="tabs_hr">

                </div>
            </center>
        </div>
    </section>


    <div class="container">

        <div class="edu_tabs" style="text-align:center">
            <a class="active showSingle" target="1">
                <li> <img src="<?=$this->Digitalocean_model->get_photo('landing_assets/images/t1.png')?>"> <span class="edu_p"><?=$course->print_name?> (<?=$course->sort_name?>) </span> <span class="edu_p_mob"><?=$course->sort_name?></span> </li>
            </a> 
        </div> 
        <div id="div1" class="targetDiv">
		<br><br>
           <?=$course->description?>

			
        </div>
        <?php /* if(!empty($faq)){?>
        <section class="p-4 d-flex justify-content-center w-100" style="border-radius: .5rem .5rem 0 0; background-color:#fbfbfb;">
        <div class="accordion w-100" id="basicAccordion">
           
          <?php $s=1; foreach($faq as $faq_result){?>
          <div class="accordion-item">
            
            <h2 class="accordion-header" id="heading<?=$faq_result->id?>">
              <button class="accordion-button <?php if($s != 1){?>collapsed<?php }?>" type="button" data-bs-toggle="collapse" data-bs-target="#basicAccordionCollapseTwo<?=$faq_result->id?>" aria-expanded="false" aria-controls="collapseTwo">
                Q.<?=$s;?> - <?=$faq_result->question?>
              </button>
            </h2>
            <div id="basicAccordionCollapseTwo<?=$faq_result->id?>" class="accordion-collapse collapse <?php if($s == 1){?>show<?php }?>" aria-labelledby="heading<?=$faq_result->id?>" data-bs-parent="#basicAccordion" style="">
              <div class="accordion-body" style="background: #f8fbff;">
                <b>Ans.</b> - <?=$faq_result->answer?>
              </div>
            </div>
          </div>
          <?php $s++; }?>
          
        </div>
      </section>
      <?php }*/?>
        <div style="margin-top:10px">
				   <a href="<?=base_url();?>admission-form"><button class="course_applay" type="button">Apply Now</button></a>
			 </div>
        </div>
<?php include('footer.php');?>