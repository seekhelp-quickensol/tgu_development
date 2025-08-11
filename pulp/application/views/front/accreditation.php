<?php include('header.php');?>
<div class="header_cc_area" style="background-image:url('<?=$this->Digitalocean_model->get_photo('images/header_area.jpg')?>')">
   <div class="container">
      <div class="row">
         <h1>Accreditation</h1>
         <p><a href="<?=base_url();?>" class="breadcrumb_heding">Home</a> / Accreditation</p>
      </div>
   </div>
</div>
<section class="accreditation_wrapper hidden-xs" style="background-image:url('<?=$this->Digitalocean_model->get_photo('images/accreditation/univercity_bg.jpg')?>')">
   <div class="container">
      <div class="row">
            <!-- <h3>Accreditation</h3> -->
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="border_img">
               <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/iso_certificate_1.png')?>" class="img-responsive" alt=""> 
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="border_img">
               <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/iso_certificate_2.png')?>" class="img-responsive" alt=""> 
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="border_img">
               <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/iso_certificate_1.png')?>" class="img-responsive" alt=""> 
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="border_img">
               <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/nepal_pharmacy.jpeg')?>" class="img-responsive" alt=""> 
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="border_img">
               <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/nepal_health.jpeg')?>" class="img-responsive" alt=""> 
            </div>
         </div>
      </div>
   </div>
</section>
<!-- <section class="accreditation_wrapper hidden-lg hidden-md hidden-sm mobile_certificate_slider" style="background-image:url('<?=$this->Digitalocean_model->get_photo('images/accreditation/univercity_bg')?>')">
   <div class="container">
      <div class="row">
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="item active border_img">
                  <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/iso_certificate_1.png')?>" class="img-responsive" alt=""> 
               </div>
               <div class="item border_img">
                  <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/iso_certificate_2.png')?>" class="img-responsive" alt=""> 
               </div>
               <div class="item border_img">
                  <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/iso_certificate_3.png')?>" class="img-responsive" alt=""> 
               </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </div>
   </div>
</section> -->
<?php include('footer.php');?>