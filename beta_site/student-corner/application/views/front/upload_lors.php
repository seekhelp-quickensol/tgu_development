<?php include('header.php');
 	
?>
<style>
@page {
    size:A4
}
</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Upload I Letter of Recommendation</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
								<form  class="form-horizontal" name="lor_form" id="lor_form" enctype="multipart/form-data" method="post">
									<input type="hidden" name="student_id" value="<?=$this->session->userdata("student_id")?>">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6 form-group">
												<label class="control-label" for="message">Upload LOR <?php if(!empty($lor)){?><a href="<?=$this->Digitalocean_model->get_photo('images/lor/'.$lor->lor_file)?>">View</a><?php }?></label>
												<input type="file" class="form-control" id="userfile" name="userfile" accept=".pdf,.jpg,.jpeg,.png"> 
											</div>
											<br>
											<div class="col-md-6 form-group"></div>
											<div class="col-md-6" style="margin-top:5px"> 
												<button type="submit" class="btn btn-success">Upload</button>   
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
	 
	$('#lor_form').validate({
		rules: {
			userfile: {
				required: true,
			}, 
		},
		messages: {
			userfile: {
				required: "Please upload lor",
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
 