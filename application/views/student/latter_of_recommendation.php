<?php include('header.php');?>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Letter of Recommendation</h4>

                  <p class="card-description">

                    

                  </p>



					<?php if(empty($recommendation)): ?>

						<a href="<?=base_url("pay_recommendation_letter_fees");?>" class="btn btn-success">Pay Recommendation letter fees</a>

						<?php else: ?>



							<?php if($recommendation->status == '0'): ?>

								<button  class="btn btn-primary">Waiting for UNIVERSITY verfication .....</button>

							<?php else: ?>







							<div class="container" id="container">

      <div class="main-panel">

        <div class="content-wrapper" style="background: #fff;position: relative;">

			<div class="row" id="letter_section">

				<div class="col-md-10">
BIR TIKENDRAJIT UNIVERSITY
					<div style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/marksheet-bg-with-logo.jpeg')?>);background-position: center;background-size: cover;padding: 550px 25px;border: 2px solid #e8612b;">



						





						
BIR TIKENDRAJIT UNIVERSITY
						<p style="margin-top: -130px;text-align: center"><b>University Campus: </b>Model Village Naharlagun, Itanagar, Arunachal Pradesh - 791110</p>

						<br>

						

						<p style="font: bold;text-align: right;font-weight: 600">Date : <?=date("Y-m-d");?></p>

						<br>

						<br>

						<br>



						<div class="row" >

							<div class="col-lg-12 col-md-12">

								<p style="color: #000;font-weight: 700;font-size: 30px; text-align: center">Letter Of Recommendation </p>

							</div>

						</div>

						<br>

						<div class="row" style="padding-right: 20px;padding-left: 20px">

							

						

							<div class="col-lg-12 col-md-12">

								<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 700;margin-bottom: 0px;">



									

									I would like to take an opportunity as Head of the Department of Management,THE GLOBAL UNIVERSITY, Imphal, Arunachal Pradesh, India to offer a formal recoccomendation for Mr./Ms./Mrs. <?=$recommendation->student_name;?>



								</p>



								<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 700;margin-bottom: 0px;">



									

									I have known Mr./Ms./Mrs. <?=$recommendation->student_name;?> for almost <?php echo date("Y",strtotime($recommendation->created_on)) - date("Y",strtotime($recommendation->session_start_date)) == 0?1:date("Y",strtotime($recommendation->created_on)) - date("Y",strtotime($recommendation->session_start_date)); ?> years, from the start of his lectures and the other staffs of the University.



								</p>	

								

								<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 700;margin-bottom: 0px;">

									Graduate program inTHE GLOBAL UNIVERSITY, India. He/She registered in the graduate program in <?=date("Y",strtotime($recommendation->session_start_date));?> in the Department of <?=$recommendation->course_name; ?> obtained <?=$recommendation->stream_name;?> Degree from the University. 



								</p>	





								<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 700;margin-bottom: 0px;">

									During the period of his/her studies, he/she was very gentle, soft speaking and very intelligent individual with so much confident and exibit exceptional knowledge towards his/her field.

									Mr./Ms./Mrs. <?=$recommendation->student_name;?> is also known to be a very humble and he always give respect to his lecturers and the other staffs of the University. 



								</p>



								<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 700;margin-bottom: 0px;">

									As his/her lecturer and Head of Department, I know him to be honest and also very hard working. His/Her communication skills are excellent both in speaking and writing.  



								</p>



								<p style="margin-top: 10px;color: #000;font-size: 15px;font-weight: 700;margin-bottom: 0px;">

									It is for this reasons that, I offer a high recommendation for Mr./Ms./Mrs. <?=$recommendation->student_name;?> without reservation. His/Her positive approach and abilities will truly be an asset to your University. 



								</p>





								<br>

								<br>

								<br>



								<div class="col-lg-12 col-md-12">

								<div style="float: left;text-align: center;margin-top: 35px;">

								    

									<img style="width: 130px;" src="<?=$this->Digitalocean_model->get_photo('images/reccomendation_letter_mark_image.png')?>">

									<br>

									 <?php if(date("Y-m-d",strtotime($recommendation->created_on)) <= "2022-02-19"){ ?>

									<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/Deputy_Registrar.png')?>">

									<?php }else{

									if($recommendation->course_id ==23){

									?> 

									<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/resurch_reg.PNG')?>">

									<?php }else{?>

									<img style="width: 110px;" src="<?=$this->Digitalocean_model->get_photo('images/norm_reg.PNG')?>">

									<?php }}?>

									

									<p style="color: #000;font-size: 18px;font-weight: 900;margin-bottom: 0px;">Registrar</p>

									

								</div>

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







							<?php endif; ?>

						<?php endif; ?>



                </div>

              </div>

            </div>

          </div>

        </div>

      

<?php include('footer.php');?>



<script type="text/javascript">

	

	$("#print_btn").click(()=>{

		$("#print_btn").hide();

		let contain = document.getElementById("container").innerHTML;

		let newWindow = window.open('','',900,600);

		newWindow.document.write(contain);

		newWindow.focus();

		newWindow.print();

		newWindow.close();

		$("#print_btn").show();



	});

</script>

