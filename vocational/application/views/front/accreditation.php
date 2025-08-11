<?php include('header.php');?><style>.border_img {    margin-bottom: 20px;    /* border: 1px solid #2f5aed; */    background: #f4f4f4;    padding: 10px;    box-shadow: 0 0 4px 0 rgb(50 50 50 / 45%);    border-radius: 10px;}.border_img img {    border: 6px solid #b53712;    border-radius: 20px 0 20px 0;}.img-responsive, .thumbnail a>img, .thumbnail>img {    display: block;    max-width: 100%;    height: auto;}.accreditation_wrapper {    padding: 50px 0 50px;    background-position: 100% 100%;    background-repeat: no-repeat;    background-size: cover;    position: relative;}</style>
			<div class="header_cc_area" style="background-image:url('<?=$this->Digitalocean_model->get_photo('images/header_area.jpg')?>')">
				<div class="container">
					<div class="row">
					<div class="col-lg-12 col-md-12">
						<h1>Accreditation</h1>
						<p>Home / Accreditation</p>
					</div>
						</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="uni_mainWrapper" style="min-height:500px;">
				<div class="container">
					<section class="accreditation_wrapper hidden-xs" >   <div class="container">      <div class="row">            <!-- <h3>Accreditation</h3> -->         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">            <div class="border_img">               <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/iso_certificate_1.png')?>" class="img-responsive" alt="">             </div>         </div>         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">            <div class="border_img">               <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/iso_certificate_2.png')?>" class="img-responsive" alt="">             </div>         </div>         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">            <div class="border_img">               <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/iso_certificate_1.png')?>" class="img-responsive" alt="">             </div>         </div>         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">            <div class="border_img">               <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/nepal_pharmacy.jpeg')?>" class="img-responsive" alt="">             </div>         </div>         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">            <div class="border_img">               <img src="<?=$this->Digitalocean_model->get_photo('images/accreditation/nepal_health.jpeg')?>" class="img-responsive" alt="">             </div>         </div>      </div>   </div></section>
				</div>
			</div>
<?php include('footer.php');?>