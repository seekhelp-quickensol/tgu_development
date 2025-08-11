<?php include('header.php');?>
<section class="member_certification_wrapper" style="background-image:url('<?=$this->Digitalocean_model->get_photo('images/accreditation/member_certification_bg.png')?>')">
    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-xl-offset-2 col-lg-offset-2 col-md-offset-2 col-sm-offset-2"> -->
                <div class="col-lg-4 col-md-4 col-sm-6 xol-xs-12">
                    <a href="<?=base_url();?>membership" target="_blank">
                        <div class="member_details">
                            <div class="members_info">
                                <img src="<?=$this->Digitalocean_model->get_photo('images/logo/5946920e9234e40ca915a088283a8e5c.png')?>">
                                <a href="<?=base_url();?>membership-inner" class="member_ship_btn"><i class="fa fa-user-plus" aria-hidden="true"></i>Membership</a>
                            </div>
                        </div>
                    </a>
                      
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 xol-xs-12">
                    <a href="<?=base_url();?>accreditation" target="_blank">
                        <div class="accrediation_details">
                            <div class="accrediation_info">
                                <img src="<?=$this->Digitalocean_model->get_photo('images/logo/5946920e9234e40ca915a088283a8e5c.png')?>">
                                <a href="<?=base_url();?>accreditation" class="accreditation_btn"><i class="fa fa-certificate" aria-hidden="true" ></i>Accreditation</a>
                            </div>
                        </div>
                    </a>
                </div>
            <!-- </div> -->
        </div>
    </div>
</section>
<?php include('footer.php');?>