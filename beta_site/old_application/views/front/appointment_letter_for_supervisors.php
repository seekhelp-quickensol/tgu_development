<?php include('header.php');?>

		<!-- Search Modal -->
		<div class="modal fade search-modal-area" id="exampleModalsrc">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<button type="button" data-bs-dismiss="modal" class="closer-btn">
						<i class="ri-close-line"></i>
					</button>

					<div class="modal-body">
						<form class="search-box">
							<div class="search-input">
								<input type="text" name="Search" placeholder="Search for..." class="form-control">

								<button type="submit" class="search-btn">
									<i class="ri-search-line"></i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Search Modal -->

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-15">
			<div class="container">
				<div class="page-title-content">
					<h2>Appointment Letter For Supervisors</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home 
							</a>
						</li>
						<li class="active">Research</li>
						<li class="active"> Guide/Supervisors</li>
						<li class="active">Appointment Letter For Supervisors</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

	
		<?php if($this->uri->segment(2) == ""){?>
		<section class="candidates-resume-area ptb-100">
            <div class="container">
				<div class="candidates-resume-content">
				<form class="resume-info" method="post" name="appointment_letter_form" id="appointment_letter_form" enctype="multipart/form-data">	
					<h3>Password Verification</h3>
					<p><small>Please provide your password</small></p>
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label>Enter Your Password <span class="req">*</span></label>
							<input type="text" name="password" id="password" class="form-control" placeholder="Enter Your Password">
							</div>
						</div>
					</div>

					<div class="col-lg-12">
						<button type="submit" class="default-btn" name="generate" id="generate" value="Generate">Next</button>
					</div>
				</form>
				</div>
            </div>

        </section>

		
		
		<?php } ?>

		<?php if($this->uri->segment(2) != ""){?>
			<div class="letter_div">

<div class="col-md-12">

	<div class="row letter_section" id="letter_section">

		<div class="col-md-10 mt-15 full-width">

			<div class="letter-padding" style="background-image:url(<?=$this->Digitalocean_model->get_photo('images/BTU.jpeg')?>);background-position: top;background-size: cover;padding: 297px 25px 165px;border: 2px solid #e8612b;">

			

				

				<div class="row">

					<!--<div class="col-lg-6 col-md-6">

						<p class="letter-ref" style="color: #000;font-weight: 700;font-size: 14px;margin-top: 20px;">Ref. No.: BTU/PRL/<?=date("Y",strtotime($stu_data->enrollment_date));?>/<?php print_r(array_reduce(array_slice(str_split((string)$stu_data->enrollment_number),-5),function($a,$b){return $a.$b;}))?></p>

					</div>

					<div class="col-lg-6 col-md-6">

						<p class="letter-ref" style="color: #000;font-weight: 700;font-size: 14px;text-align: right;margin-top: 20px;">Dated: <?=date("d-m-Y",strtotime($stu_data->enrollment_date));?></p>

					</div>-->

					<div class="col-lg-12 col-md-12">

						<p style="color: #000;font-size: 16px;font-weight: 500;">To,

							<span style="display: block;font-weight: 700;"><?php if(!empty($guide)){ echo $guide->name;}?></span>
							<span style="display: block;font-weight: 700;"><?php if(!empty($guide)){ echo date("d/m/Y",strtotime($guide->updated_on));}?></span>

						</p>

					</div>

					<div class="col-lg-12 col-md-12">

						<p style="font-size: 16px;color: #000;font-weight: 700;margin-top: 10px;margin-bottom: 10px;">Address: <?php if(!empty($guide)){ echo $guide->address.', '.$guide->city_name.', '.$guide->state_name.', '.$guide->country_name.', Pincode - '.$guide->pincode;}?></p>

					</div>

					<div class="col-lg-12 col-md-12">

						<p style="font-size: 16px;color: #000;font-weight: 700;margin-top: 10px;margin-bottom: 10px;">Subject: Appointment of Research Supervisor</p>

					</div>

					<div class="col-lg-12 col-md-12">

						<p style="margin-top: 10px;color: #000;font-size: 16px;font-weight: 500;margin-bottom: 2px;">Sir/Madam,</p>

						<p style="color: #000;font-weight: 500;font-size: 16px;margin-bottom: 15px;">With reference to the above, we are pleased to inform you that your name has been approved as Research Supervisor in the Subject of <b><u><?php if(!empty($guide)){ echo $guide->specilisation;}?></u></b> by a committee constituted to such effect by the Bir Tikendrajit University.</p>

						<p style="font-size: 16px;font-weight: 500;color: #000;margin-bottom: 15px;">The name and numbers of Research Scholars under your guidance, as recommended by the Research Committee will be  informed to you Shortly.<!-- for providing all the research scholars till final submission of thesis for award of Ph.D by the University.--></p>

						<p style="font-size: 16px;font-weight: 500;color: #000;">With regards and best wishes,</p>

					</div>

					<div class="col-lg-12 col-md-12">

						<div style="width: 205px;text-align: center;margin-top: 35px;">

							<img style="width: 140px;" src="<?=$this->Digitalocean_model->get_photo('images/AR-sign.jpeg')?>">

						</div>

						<div style="width: 205px;text-align: center;margin-top: 0px;margin-bottom: 10px;">

							<img style="width: 155px;transform: rotate(-15deg);margin-bottom: 20px;" src="<?=$this->Digitalocean_model->get_photo('images/btu-seal.png')?>">

						</div>

					</div>

					<div class="col-lg-12 col-md-12">

						<p style="color: #000;font-size: 14px;font-weight: 500;margin-bottom: 2px;">Copy to:</p>

						<p style="color: #000;font-size: 14px;font-weight: 500;margin-bottom: 2px;">1. Chancellor /Vice Chancellor /Director /Pro.VC./Registrar /Deputy Registrar</p>

						<p style="color: #000;font-size: 14px;font-weight: 500;margin-bottom: 2px;">2. Academics</p>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div style="position: absolute;top: 25px;right: 85px;">

		<!--<button type="button" class="btn btn-primary" onclick="PrintElem('.letter_section')" id="print_btn">Print &nbsp <i class="fas fa-print"></i></button>-->

		<button type="button" class="btn btn-primary" id="print_btn">Print &nbsp <i class="fas fa-print"></i></button>

	</div>

</div>

<div class="clearfix"></div>

</div>

			<?php }?>

		<?php include('footer.php');?>


		<script>
	$(document).ready(function() {
			jQuery.validator.addMethod("validate_email", function(value, element) {
                if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
                    return true;
                }else {
                    return false;
                }
            }, "Please enter a valid Email.");  
            jQuery.validator.addMethod("noHTMLtags", function(value, element){
                if(this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)){
                    if(value == ""){
                        return true;
                    }else{
                        return false;
                    }
                } else {
                    return true;
                }
            }, "HTML tags are Not allowed."); 
            

	$('#appointment_letter_form').validate({
		rules: {
			password: {
				required: true,
				noHTMLtags: true,
			},
		},
		messages: {
			password: {
				required: "Please enter password",
				noHTMLtags:"HTML tags not allowed!",
			},
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});
});

	</script>