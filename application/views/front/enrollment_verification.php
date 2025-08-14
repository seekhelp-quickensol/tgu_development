<?php include('header.php')?>
<!-- Start Page Title Area -->
		
<div class="page-title-area bg-27">
			<div class="container">
				<div class="page-title-content">
					<h2>Enrollment Verification</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
						Home
							</a>
						</li>
						<li class="active">Verification</li>
						<li class="active">Enrollment Verification</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

       
        	<!-- Start Costing Area -->
		<section class="costing-area pt-100 pb-70">
			<div class="container">
				<div class="row justify-content-center align-items-center">
					
					

					<div class="col-lg-6 col-md-6">
						
                        <div class="single-costing-card">
                        <div class="admission_box">
							<!-- <h3>Enrollment Verification</h3>
                            <small>Please provide your enrollment number</small> -->
							<!-- <form class="enrollment_form_one" method="get"  name="old_admission_form" id="old_admission_form">
								<div class="form-group">
									<label><b>Enter Enrollment Number:</b><span class="req"></span></label>
									<input type="text" id="old_enrollment" name="old_enrollment" class="form-control new_control"></input>
								</div>
								<div class=" button_div mt-4">
                                <a href="javascript:void(0);" class="default-btn2">
                                Apply Now
											<i class="ri-arrow-right-line"></i>
										</a>
								</div>
								</div>
							</form> -->


                            <form class="Enrollmentform" method="post" name="enrollment_verification_form" id="enrollment_verification_form" enctype="multipart/form-data">

								<div class="row">

									<div class="col-md-12">

										<div class="personal_details">

											<h3>Enrollment Verification</h3>	

											<small>Please provide your enrollment number</small>

											<!-- <hr> -->

										</div>

									</div>

								</div>
                                <br>
                                

                                   
                                <div class="form-group">

                                <label><b>Enter Your Enrollment Number</b><span class="req">*</span></label>

                                <input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter Your Enrollment Number">
                                </div>
                                <br>

                                <div class="form-group">
                                    <div class="mt-1 ">
										<!-- <a href="javascript:void(0);" class="default-btn2">Next
											<i class="ri-arrow-right-line"></i>
										</a> -->
										<button class="default-btn2" type="submit" name="next" id="next" value="next">Next
                                            <i class="ri-arrow-right-line"></i>
                                        </button>
                                    </div>
                                <div class="pull-right">

                                </div>

                                </div>

							</form>

                        </div>
						</div>
					</div>
				</div>
			</div>

			<?php  if (!empty($data->enrollment_number)) { ?>
            <div class="container">
            <table class="table table-bordered">
					<thead>
						<tr>
							<th>S.No.</th>
							<th>Name</th>
							<th>Father Name</th>
							<th>Date Of Birth</th>
							<th>Enrollment Number</th>
							<th>Course Name</th>
							<th>Stream Name</th>
						</tr>
					</thead> 
															
					<tbody>
						<!-- <?php if (!empty($load)) {
								$i = 1;
								foreach ($load as $load_result) {
							?>
						<tr>
							<td scope="row"><?php $i++ ?></td>
							<td><?=$load_result->student_name?></td>
							<td><?=$load_result->father_name?></td>
							<td><?=$load_result->date_of_birth?></td>
							<td><?=$load_result->enrollment_number?></td>
							<td><?=$load_result->course_name?></td>
							<td><?=$load_result->stream_name?></td>
						<?php }}?>
						</tr> -->


						<tr>
							<td>1</td>
							<td><?php echo !empty($data->student_name) ? $data->student_name : '- - - -'; ?></td>
							<td><?php echo !empty($data->father_name) ? $data->father_name : '- - - -'; ?></td>
							<td><?php echo !empty($data->date_of_birth) ? date("d-m-Y", strtotime($data->date_of_birth)) : '- - - -'; ?></td>
							<td><?php echo !empty($data->enrollment_number) ? $data->enrollment_number : '- - - -'; ?></td>
							<td><?php echo !empty($data->course_name) ? $data->course_name : '- - - -'; ?></td>
							<td><?php echo !empty($data->stream_name) ? $data->stream_name : '- - - -'; ?></td>
						</tr>							
					</tbody>
				</table>
						
			</div>

			<?php } else { ?>
            <div class="container" style="display:none;">
			
            <table class="table table-bordered">
					<thead>
						<tr>
							<th>S.No.</th>
							<th>Name</th>
							<th>Father Name</th>
							<th>Date Of Birth</th>
							<th>Enrollment Number</th>
							<th>Course Name</th>
							<th>Stream Name</th>
						</tr>
					</thead> 
															
					<tbody>
						<!-- <?php if (!empty($load)) {
								$i = 1;
								foreach ($load as $load_result) {
							?>
						<tr>
							<td scope="row"><?php $i++ ?></td>
							<td><?=$load_result->student_name?></td>
							<td><?=$load_result->father_name?></td>
							<td><?=$load_result->date_of_birth?></td>
							<td><?=$load_result->enrollment_number?></td>
							<td><?=$load_result->course_name?></td>
							<td><?=$load_result->stream_name?></td>
						<?php }}?>
						</tr> -->


						<tr>
							<td>1</td>
							<td><?php echo !empty($data->student_name) ? $data->student_name : '- - - -'; ?></td>
							<td><?php echo !empty($data->father_name) ? $data->father_name : '- - - -'; ?></td>
							<td><?php echo !empty($data->date_of_birth) ? date("d-m-Y", strtotime($data->date_of_birth)) : '- - - -'; ?></td>
							<td><?php echo !empty($data->enrollment_number) ? $data->enrollment_number : '- - - -'; ?></td>
							<td><?php echo !empty($data->course_name) ? $data->course_name : '- - - -'; ?></td>
							<td><?php echo !empty($data->stream_name) ? $data->stream_name : '- - - -'; ?></td>
						</tr>							
					</tbody>
				</table>
						
			</div>
       		<?php } ?>
		</section>
		<!-- End Costing Area -->

        	<!-- Start Wishlist Area -->
		
		<!-- End Wishlist Area -->
		
		<?php include('footer.php')?>

<script>
	$(document).ready(function(){ 
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
            

		$('#enrollment_verification_form').validate({
			rules: {
				enrollment_number: {
					required: true,   
				},	
			},
			messages: {
				enrollment_number: {
					required: "Please enter enrollment number",
				},
			},
			submitHandler: function (form) {
				form.submit();
			},
		});
		});
</script>