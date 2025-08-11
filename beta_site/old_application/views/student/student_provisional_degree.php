<?php include('header.php');?>
<style>

	@page {
            size: A4;
            margin: 0;
			border:1px solid #000;
			height: 100%
        }
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Provisional Degree Certificate</h4>
                  <p class="card-description">
                    
                  </p>

					<?php if(empty($provisional_degree)){
					    if($student_profile->provisional_degree =="1"){
					?>
					<a href="<?=base_url("pay_provisional_degree_fees");?>" class="btn btn-success">Pay Provisional Degree Fees</a>
						<?php }else{?>
						
						<a href="<?=base_url("accept_provisional_undertaking");?>" class="btn btn-success">I Accpet Terms & Conditions</a>
						<?php }?>
						<?php }else{ ?>

							<?php if($provisional_degree->status == '0'){ ?>
								<button  class="btn btn-primary">Waiting for UNIVERSITY verfication .....</button>
							<?php }else{ ?>



							<div class="container" id="container">
      <div class="main-panel">
        <div class="content-wrapper" style="background: #fff;position: relative;">
			<div class="row" id="letter_section">
				<div class="col-md-10 page" id="printableArea">
					<div style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet-bg-with-logo.jpeg')?>);background-position: center;background-size: cover;padding: 530px 25px;border: 2px solid #e8612b;height:1500px">

					
<p style="float: right;margin-top: -490px;font:bold; font-weight: 700">Serial No. :  <?=$provisional_degree->id;?></p>

						<p style="float: left;margin-top: -490px;font-size: 15px;color: #000;font-weight: 700;">Enrollment No.: <?=$provisional_degree->enrollment_number;?></p>

						
						<p style="margin-top: -171px;text-align: center"><b>University Campus: </b>Model Village Naharlagun, Itanagar, Arunachal Pradesh - 791110</p>
						<br>
						<br>

						<div class="row" >
							<div class="col-lg-12 col-md-12">
								<p style="color: #000;font-weight: 700;font-size: 30px; margin-top: 25px;text-align: center">PROVISIONAL DEGREE </p>
							</div>
						</div>
						<br>
						<div class="row" style="padding-right: 20px;padding-left: 20px;display: block;">
							
							
							<div class="col-lg-12 col-md-12">
								<p style="margin-top: 10px;color: #000;font-size: 20px;font-weight: 500;margin-bottom: 0px;line-height: 40px; word-spacing: 7px;margin-left: 30px;margin-right: 30px;float:left">This is to certify that <b><?=$provisional_degree->student_name;?></b>
 									S/D/O <b><?=$provisional_degree->father_name;?></b> appeared in <b><?=$provisional_degree->course_name;?> - <?=$provisional_degree->stream_name;?></b> From this University and has been declared passed in <b><?=$division["division"];?></b> examination held in <b><?=$division["date"];?></b>.
								</p>
								<br>
								<br>
								<br>

								
								

							</div>
							<div class="col-lg-12 col-md-12">
							    <div style="width: 205px;float: left;text-align: center;margin-top: 175px;">
							    <p style="font-size: 16px;color: #000;margin-bottom: 2px;margin-left: 30px;">Imphal<span style="margin-left: 112px;"></span></p>
							 
								<p style="font-size: 16px;color: #000;margin-bottom: 2px;margin-left: -11px">Date:  <span style="margin-left: 10px;"><?=date("d-m-Y",strtotime($provisional_degree->issue_date));?></span></p>
								</div>
								<div style="width: 205px;float: right;text-align: center;margin-top: 125px;">
								    	<!--<img style="width: 110px;" src="<?=base_url();?>images/norm_reg.PNG">-->
                    						<img style="width: 84px;" src="<?=$this->Digitalocean_model->get_photo('images/signature_contrroler/sahakhan.png')?>">
									
									<p style="color: #000;font-size: 16px;font-weight: 900;margin-bottom: 0px;">Dy. Registrar</p>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div style="position: absolute;top: 25px;right: 85px;">
			<button type="button" class="btn btn-primary" id="print_btn" onclick="printDiv('printableArea')" >Print &nbsp <i class="fas fa-print"></i></button>
			</div>
		</div>
	</div>
	</div>



							<?php } ?>
						<?php } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      
<?php include('footer.php');?>

<script type="text/javascript">


	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>