<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="row">
					<div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-header custom-header">
								<h4 class="card-title">Search Student Payment</h4>
							</div>
							<div class="card-body">							
								<p class="card-description">Please enter Trasaction No</p>
								<form class="forms-sample" name="search_form" id="search_form" method="get" enctype="multipart/form-data">
									<div class="form-group">
										<label for="exampleInputUsername1">Transaction No.*</label>
										<input type="text" class="form-control" id="transaction_no" name="transaction_no" placeholder="Enter Transaction No" value="<?php if(isset($_GET['transaction_no'])){ echo $_GET['transaction_no'];}?>"> 
									</div> 
									<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
								</form>
							</div>
						</div>
					</div> 
					<?php if(isset($_GET['transaction_no']) && $_GET['transaction_no'] != ""){ ?>
					<div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-header custom-header">
								<h4 class="card-title">Payment Details</h4>
							</div>
							<div class="card-body">	
								<?php if(!empty($details) && $details['status'] == '1'){ ?>
								<label style="display:block;"><b>Transaction No:</b> <?=$details['transaction_no'];?></label>
								<label style="display:block;"><b>Student Name:</b> <?=$details['student_name'];?></label>
								<label style="display:block;"><b>Enrollment No:</b> <?=$details['enrollment_no'];?></label>
								<label style="display:block;"><b>Center:</b> <?=$details['center'];?></label>
								<label style="display:block;"><b>Payment For:</b> <?=$details['payment_for'];?></label>
								<label style="display:block;"><b>Amount:</b> Rs. <?=$details['payment_amount'];?></label>
								<label style="display:block;"><b>Payment Date:</b> <?=($details['payment_date'] != "" && $details['payment_date'] != null && $details['payment_date'] != "0000-00-00" && $details['payment_date'] != "1970-01-01") ? date('d-m-Y',strtotime($details['payment_date'])) : '-';?></label>
								<label style="display:block;"><b>Payment Status:</b> <?=($details['payment_status'] == '1') ? 'Success' : 'Failed';?></label>
								<?php if($details['page_link'] != ""){ ?>
								    <label style="display:block;"><b>View Details: </b> <a href="<?=$details['page_link'];?>" style="text-decoration:underline;">Click Here</a></label>
								<?php } ?>
								<?php }else{ ?>
								<label class="error">Transaction details not found.</label>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } ?> 
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
<script>
 $(document).ready(function () {			
	$('#search_form').validate({
		rules: {
			transaction_no: {
				required: true,
			}, 
		},
		messages: {
			transaction_no: {
				required: "Please enter transaction no",
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
 