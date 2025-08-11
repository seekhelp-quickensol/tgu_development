<?php
// echo "<pre>";print_r($single);exit;
include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<form class="forms-sample" name="register_form" id="register_form" method="post" enctype="multipart/form-data">
				<div class="row">				
					<div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?php if(!empty($register)){ echo $register->register_name;}?> Register Attendance</h4>
								<p class="card-description"> Please enter Register Attendance  details </p>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputUsername1">Date*</label>
											<input type="text" autocomplete="off" class="form-control datepicker" id="date" name="date" placeholder="Date" value="<?=$this->uri->segment(3)?>">
											<input type="hidden" class="form-control" id="register_name" name="register_name" placeholder="Register Name" value="<?php if(!empty($register)){ echo $register->id;}?>"> 
										</div>
									</div>
								</div>	 
							</div>
						</div>
					</div>
					<?php if(!empty($student)){ ?>
					<div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?php if(!empty($register)){ echo $register->register_name;}?> Attendance List</h4>
								<p class="card-description">
									All list of Attendance
								</p>
								<table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%"> 
									<?php 
											$explode = array();
											if(!empty($single)){
												// $trim = trim(",",$single->student_id);
												// $explode = explode(",",$trim);

												$explode=explode(",",$single->student_id);
												array_pop($explode);
											}
											foreach($student as $student_result){ 
										?>
									<tr <?php if(!empty($explode) && in_array($student_result->id,$explode)){?>style="background:green;color:#fff"<?php }else{?>style="background:red;color:#fff"<?php }?>>
										<td><?=$student_result->student_name?></td>
									</tr>   
									<?php }?>
									<tr>
									<td>Total Present: <?=count($explode);?>/<?=count($student);?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					 
					<?php }?>
				</div>
			</form>
        </div> 
    </div> 
</div> 
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
 <script> 
$("#date").change(function(){
	location.href = "<?=base_url();?>admin_view_attendance/<?=$this->uri->segment(2)?>/"+$("#date").val();
}); 
$(function(){
	$( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		maxDate: "0",
		/*maxDate: "-12Y", 
		yearRange: "-100:-0"*/
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
	$('#register_form').validate({
		ignore:[],
		rules: {
			date: {
				required: true,
			},
			register_id: {
				required: true,
			},
		},
		messages: {
			date: {
				required: "Please enter select date",
			},
			register_id: {
				required: "Please enter register name",
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
 