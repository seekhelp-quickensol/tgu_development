<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="row">
					<div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Student Examination History</h4>
								<p class="card-description">Please enter enrollment number</p>
								<form class="forms-sample" name="search_form" id="search_form" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="exampleInputUsername1">Enrollment Number *</label>
										<input type="text" class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enrollment Number"> 
									</div> 
									<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
								</form>
							</div>
						</div>
					</div> 
				</div> 
            </div> 
        </div> 
    </div>  
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.13/tinymce.min.js"></script>
<script>
$(".table_tr").click(function(){
	$(this).each(function(i, row){console.log('yes');
		var $row = $(row); 
		var files = $row.find('td:nth-child(5)').text();
		var report = $row.find('td:nth-child(7)').text();
		var remark = $row.find('td:nth-child(8)').text();
		  
		$('#report_details').html(report);
		$('#remark_view').html(remark);
	});   
}); 
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#search_form').validate({
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
 