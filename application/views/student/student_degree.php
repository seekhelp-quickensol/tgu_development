<?php include('header.php');?>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Degree</h4>

                  <p class="card-description">

                    

                  </p>



					<?php if(empty($degree)){ ?>

						<a href="<?=base_url("pay_degree_fees");?>" class="btn btn-success">Pay Degree fees</a>

						<?php }else{ ?>



							<?php if($degree->approve_status == "0" && $degree->payment_status == "1")?>
							Model Village Naharlagun, Itanagar, Arunachal Pradesh - 791110

								<button  class="btn btn-primary">Waiting for UNIVERSITY Approvals .....</button>

							<?php }else{ ?>







							<div class="container" id="container">

      <div class="main-panel">

        <div class="content-wrapper" style="background: #fff;position: relative;">

			<div class="row" id="letter_section">

				<div class="col-md-10">

					<div style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet-bg-with-logo.jpeg')?>);background-position: center;background-size: cover;padding: 370px 25px;border: 2px solid #e8612b;">



						<p style="float: right;margin-top: -356px;font:bold; font-weight: 700">Serial No. :  <?="D-".$degree->id;?></p>

						

						<img style="float: right;margin-top: -300px;" src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$degree->photo)?>" width="95px" height="110px">

						

						<p style="font-size: 15px;color: #000;font-weight: 700;margin-top: -356px;margin-bottom: 10px;">Enrollment No.: <?=$degree->enrollment_number;?></p>



					

						<p style="margin-top: 300px;text-align: center"><b>University Campus: </b>Canchipur, South View, Imphal West, Arunachal Pradesh, Pincode - 795003</p>

						<br>

						<br>



						<div class="row" >

							<div class="col-lg-12 col-md-12">

								<p style="width: 285px;margin: 0px auto;color: #000;font-weight: 500;font-size: 35px; text-align: center;font-family: 'Italianno', cursive;"><?=$degree->course_name; ?> </p>

							</div>

						</div>

						<br>

						<div class="row" style="padding-right: 20px;padding-left: 20px">

							

						

							<div class="col-lg-12 col-md-12">

								<p style="margin-top: 10px;color: #000;font-size: 32px;margin-bottom: 0px;line-height: 42px; word-spacing: 10px;font-family: 'Italianno', cursive;">This is to certify that <?=$degree->student_name; ?> Son/Doughter/Wife of <?=$degree->father_name;?> is hereby awarded the <?=$degree->course_name;?> in <?=$degree->stream_name;?> after having passed the examination for the said degree held in <?=date("Y",strtotime($division["date"]));?> He/She is placed in <?=$division["division"]?>. </p>



								

								<br>

								<br>

								<br>

								

								<p style="font-size: 30px;color: black;margin-left:112px;margin-bottom: 2px;font-family: 'Italianno', cursive;text-align:center;font-weight:500;"> Given under the seal of the University <span style="margin-left: 112px;"></span></p>

								<br>

								<center >

								<img style="width: 150px;" src="<?=$this->Digitalocean_model->get_photo('images/degree_seal.png')?>" alt="image">

								</center>

								



							</div>

							<div class="col-lg-12 col-md-12">

								<div style="width: 205px;float: left;text-align: center;margin-top: 35px;">

								<?php if(date("Y-m-d",strtotime($degree->issue_date)) <= "2022-02-19"){ ?>

						<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/Deputy_Registrar.png')?>">

						<?php }else{

						if($degree->course_id ==23){

						?> 

						<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/resurch_reg.PNG')?>">

						<?php }else{?>

						<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/norm_reg.PNG')?>">

						<?php }}?>

									

									<p style="color: #000;font-size: 18px;font-weight: 900;margin-bottom: 0px;">Registrar</p>

								</div>

								<div style="width: 205px;float: right;text-align: center;margin-top: 23px;">

									<img style="width: 130px;" src="<?=$this->Digitalocean_model->get_photo('images/chancellor.png')?>">

									

									<p style="color: #000;font-size: 18px;font-weight: 900;margin-bottom: 0px;">Chancellor</p>

								</div>

							</div>

							

						</div>

					</div>

				</div>

			</div>

			<div style="position: absolute;top: 25px;right: 85px;">

				<button type="button" class="btn btn-primary" id="print_btn">Print &nbsp <i class="fas fa-print"></i></button>

			</div>

		</div>

	</div>

	</div>







							<?php }} ?> 



                </div>

              </div>

            </div>

          </div>

        </div>

      

<?php include('footer.php');?>



<script type="text/javascript">

	

	$("#print_btn").click(()=>{

		$("#print_btn").hide();

		// let contain = document.getElementById("container").innerHTML;

		// let newWindow = window.open('','',900,1000);

		// newWindow.document.write(contain);

		// newWindow.focus();

		// newWindow.print();

		// newWindow.close();

		window.print();

		$("#print_btn").show();



	});

</script>

