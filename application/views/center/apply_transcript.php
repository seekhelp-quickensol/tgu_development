<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Transcript Application</h4>
								<p class="card-description"></p> 
								<div class="col-lg-12" style="display:block;"> 
									<form class="form-horizontal" name="single_form" id="single_form" method="post">
										<div class="panel-body">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label" for="email">Enrollent Number</label>
															<div class="col-md-6">
																<input id="enrollment_number" name="enrollment_number" type="text" placeholder="Enrollment Number" class="form-control" value="">
																<div class="form-group"><br> 
																		<input type="submit" id="search" name="search" value="Next" class="btn btn-primary"> 
																</div>
															</div>
														</div>
													</div> 
												</div> 
											</div>  
										</div>
									</form>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	
<?php include('footer.php');?>

<script>
$(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#single_form').validate({
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