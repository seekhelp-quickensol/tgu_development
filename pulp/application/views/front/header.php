<!DOCTYPE html>
<html lang="en">
<style>
  .whatsup {
    position: fixed;
    right: 15px;
    bottom: 100px;
    z-index: 11;
    animation: whatsup 1500ms infinite alternate;
    width: 42px;
    cursor: pointer;
}
</style>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PULP: <?php if($this->uri->segment(1) !="" ){ echo str_replace("-"," ",ucwords($this->uri->segment(1)));}else{ echo "Welcome to The Global University";}?></title>
  <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css" />

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
 
  <link rel="shortcut icon" href="https://www.tgu.ac.in/images/logo/logo.png" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Abel|Barlow+Semi+Condensed:400,500,700,800,900&amp;display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<style>
	.error{
		color:red;
	}
	</style>
  <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11002063744"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11002063744'); </script>
  <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
  <!-- Google tag (gtag.js) --> <amp-analytics type="gtag" data-credentials="include"> <script type="application/json"> { "vars": { "gtag_id": "AW-11002063744", "config": { "AW-11002063744": { "groups": "default" } } }, "triggers": { } } </script> </amp-analytics>

</head>
<script>
        $(window).load(function() {
            setTimeout(function() {
                $(".popup-overlay").fadeIn();
            }, 1000);
        });
       
    </script>

<body>
  <header id="site-header">
    <div class="container-fluid">
      <div class="top-nav">
      <span class="helpline-no-header">Helpline No : <a href="tel:08044070088"> 08044070088</a>, <a href="tel:08044070089"> 08044070089</a> </span>

      </div>
      <nav class="navbar navbar-expand-lg stroke">
        <a href="https://www.tgu.ac.in/"
          class="d-flex align-items-center bir_logo">
          <img src="https://www.tgu.ac.in/assets/images/global_university_logo.png" id="TGU-logo" style="height: 80px;"/>
          <div id="TGU-brand-div">
            <h4>The Global University</h4>
            <p>Empowering Minds, Transforming Futures</p>
          </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav ml-lg-auto d-flex justify-content-end">
            
            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == ''){?>active<?php }?>" href="<?=base_url();?>">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == 'about'){?>active<?php }?>" href="<?=base_url();?>about">About</a>
            </li>
		       
            <div class="dropdown main-dropdown" id="program-btn">
              <a class="btn border-0 dropdown-toggle px-0" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Programs
              </a>

              <ul class="dropdown-menu rounded-0">
			  <li>
			  <a class="dropdown-item mba-program" href="<?=base_url();?>diploma-in-mechanical-engineering">Diploma in Mechanical Engineering </a>
			  </li>
                <!--				<li>			  <a class="dropdown-item mba-program" href="<?=base_url();?>mba">MBA Program</a>			  </li>				<li>
                  <a class="dropdown-item diploma-main-link1" href="#" id="program1">
                    Diploma Engineering &raquo;
                  </a>
                  <ul class="dropdown-menu dropdown-submenu rounded-0 ">
                    <li>
                      <a class="dropdown-item diploma1" href="<?=base_url();?>diploma-in-electrical-engineering-air-conditioner">Diploma in
                        Electrical Engineering/Air Conditioner</a>
                    </li>
                    <li>
                      <a class="dropdown-item diploma2" href="<?=base_url();?>diploma-in-mechanical-engineering-nanotechnology">Diploma in
                        Mechanical Engineering/Nanotechnology</a>
                    </li>
                    <li>
                      <a class="dropdown-item diploma3"
                        href="<?=base_url();?>diploma-in-electrical-electronics-engineering-instrumentation">Diploma in Electrical
                        &amp; Electronics Engineering/Instrumentation</a>
                    </li>
                    <li>
                      <a class="dropdown-item diploma4" href="<?=base_url();?>diploma-in-computer-science">Diploma in Computer Science</a>
                    </li>
                    <li>
                      <a class="dropdown-item diploma5" href="<?=base_url();?>diploma-in-civil-engineering">Diploma in Civil Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item diploma6" href="<?=base_url();?>diploma-in-electronics-communication">Diploma in Electronics
                        &amp; Communication</a>
                    </li>
                    <li>
                      <a class="dropdown-item diploma7" href="<?=base_url();?>diploma-in-automobile-engineering">Diploma in Automobile
                        Engineering</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a class="dropdown-item diploma-main-link2" href="#" id="program2">
                    Bachelor of Technology &raquo;
                  </a>
                  <ul class="dropdown-menu dropdown-submenu rounded-0 ">
                    <li>
                      <a class="dropdown-item btech1" href="<?=base_url();?>b-tech-in-electronics-communication-telecommunication">B.Tech
                        in Electronics &amp; Communication/Telecommunication</a>
                    </li>
                    <li>
                      <a class="dropdown-item btech2" href="<?=base_url();?>b-tech-in-information-technology">B.Tech in Information
                        Technology</a>
                    </li>
                    <li>
                      <a class="dropdown-item btech3" href="<?=base_url();?>b-tech-in-mechanical-engineering">B.Tech in Mechanical
                        Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item btech4" href="<?=base_url();?>b-tech-in-electrical-engineering">B.Tech in Electrical
                        Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item btech5" href="<?=base_url();?>b-tech-in-computer-science">B.Tech in Computer Science</a>
                    </li>
                    <li>
                      <a class="dropdown-item btech6" href="<?=base_url();?>b-tech-in-civil-engineering">B.Tech in Civil Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item btech7" href="<?=base_url();?>b-tech-in-electrical-electronics-engineering">B.Tech in
                        Electrical &amp; Electronics Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item btech8" href="<?=base_url();?>b-tech-in-automobile">B.Tech in Automobile</a>
                    </li>
                    <li>
                      <a class="dropdown-item btech9" href="<?=base_url();?>environmental-engineering">Environmental Engineering</a>
                    </li>
                  </ul>
                </li>

                <li style="display:none">
                  <a class="dropdown-item" href="#" id="program3">
                    Master of technology &raquo;
                  </a>
                  <ul class="dropdown-menu dropdown-submenu rounded-0 ">
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>electronics-communication">Electronics &amp; Communication</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>mechanical-engineering">Mechanical Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>electrical-engineering">Electrical Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>computer-science">Computer Science</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>civil-engineering">Civil Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>thermal-engineering">Thermal Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>industrial-engineering-management">Industrial Engineering &amp;
                        Management</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>transportation-engineering">Transportation Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>structural-engineering">Structural Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>VLSI">VLSI(Design &amp; Embedded System)</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>power-system">Power System</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>construction-engineering-management">Construction Engineering
                        &amp; Management</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>m-tech-in-environmental-engineering">Environmental
                        Engineering</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=base_url();?>remote-sensing">Remote Sensing</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a class="dropdown-item mca-program" href="<?=base_url();?>mca" id="program4">
                    MCA
                  </a>
                </li>-->
              </ul>
            </div>

            
            <div class="dropdown main-dropdown2" id="program-btn">
              <a class="btn border-0 dropdown-toggle px-0" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Recognitions
              </a>

              <ul class="dropdown-menu rounded-0"> 
                <li><a class="dropdown-item reco2" href="https://www.tgu.ac.in/university-approvals" target="_blank">University Gazette</a></li>
                <li><a class="dropdown-item reco3" href="https://www.tgu.ac.in/indian-council-of-agricultural-research-approval" target="_blank">Indian Council of Agricultural Research(ICAR)</a></li>
                <li><a class="dropdown-item reco4" href="https://www.tgu.ac.in/pharmacy-council-of-india-approval" target="_blank">Pharmacy Council of India (PCI)</a></li>
                <li><a class="dropdown-item reco5" href="https://www.tgu.ac.in/bar-council-of-india" target="_blank">BAR Council of India (BCI)</a></li> 
               
              
               
              </ul>
            </div>
            <li class="nav-item">
              <a class="nav-link" href="https://www.tgu.ac.in/collaboration-form?pulp" target="_blank">Collaborations</a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == 'admissions'){?>active<?php }?>" href="<?=base_url();?>admissions">Admissions</a>
            </li>



            <li class="nav-item">
              <a class="nav-link <?php if($this->uri->segment(1) == 'contact'){?>active<?php }?>" href="<?=base_url();?>contact">Contact</a>
            </li>
            <li class="nav-item login-btn-nav">
							    <a class="nav-link student-login" href="https://www.tgu.ac.in/student-corner/" target="_blank">
									<!-- <div class="text-center"><img src="https://TGU-filer.sfo3.digitaloceanspaces.com/images/header/employee-t.png?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=DO00PF9DQMELFK73ZR2B%2F20240321%2Fsfo3%2Fs3%2Faws4_request&amp;X-Amz-Date=20240321T060132Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Expires=7200&amp;X-Amz-Signature=bf0733c608ff94e765bc6039f65d6fff251e73fdfc3f2f0b929605ed48a43fb3" class="header-menu-img" alt="Bir"> </div> -->
					 Student Login 
								</a></li>
          </ul>
         
        </div>
      </nav>
    </div>

<?php if($this->uri->segment(1) != "admissions"){?>
    <div class="fixed-cta" id="fixed-cta">
      <div>
        <!-- <a href="" onclick="openApply1()" class="tooltip1"><i class="fa-solid fa-check-double "></i> <span class="tooltiptext1"> Apply Now</span></a> -->
        <a href="<?=base_url();?>" id="cta-apply-fixed" class="visible small"><i class="fa-solid fa-file-circle-check"></i>
          Apply Now</a>
          <!--<a href="https://api.whatsapp.com/send?phone=7860024050&amp;text=">
    <img src="<?=base_url();?>assets/img/whatsup.png" class="whatsup">
  </a>-->
          <!-- <a href="<?=base_url();?>" id="cta-apply-fixed" class="visible small"><i class="fa-solid fa-file-circle-check"></i>
          WhatsApp</a> -->
      </div>
    </div>
<?php }?>
  </header>
