<?php include('header.php');?>
<style>
	.btn-small{
		padding: 5px 10px;
	}
	.no_doc{
		margin-bottom: 0px;
		padding: 5px;
		background: #ddd;
		color: #000;
		text-align: center;
	} 
    .hidden-label {
        display: none;
    }
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update payment details for Character Certificate</h4>
                  <h2 class="card-title">Enrollment No. : <?php if(!empty($single)){echo $single->enrollment_number;}?></h2>
                  <h2 class="card-title">Student Name : <?php if(!empty($single)){echo $single->student_name;}?></h2>
                  <p class="card-description">
                    Please enter transaction details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter Transaction ID *</label>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                                <input type="text" class="form-control" id="transaction_id" name="transaction_id" placeholder="Enter Transaction ID" value="<?php if(!empty($single)){ echo $single->transaction_id;}?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Amount *</label>
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount" value="<?php if(!empty($single)){ echo $single->amount;}?>">
                                <!-- <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php if(!empty($amount)){ echo $amount->certificate_fees ;}?>" readonly> -->
                            </div>
                        </div>
						<div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Issue Date *</label>
                                <input type="text" class="form-control datepicker" id="issue_date" name="issue_date" placeholder="Issue date" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->issue_date));}?>">
                            </div>
                        </div> 
						<div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Issue Status *</label>
                                <select name="approve_status" id="approve_status" class="form-control js-example-basic-single">
                                    <option value="">Select Approved Status</option> 
                                    <option value="1" <?php if(!empty($single) && $single->approve_status == "1"){?>selected<?php } ?>>Approved</option>
                                    <option value="0" <?php if(!empty($single) && $single->approve_status == "0"){?>selected<?php } ?>>Un Approved</option>
                                </select>
                            </div>
                        </div>
						<!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Payment Date *</label>
                                <input type="text" class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Payment date" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->payment_date));}?>">
                            </div>
                        </div>  -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Select Payment Status *</label>
                                <select name="payment_status" id="payment_status" class="form-control js-example-basic-single">
                                    <option value="">Select Payment Status</option> 
                                    <option value="1" <?php if(!empty($single) && $single->payment_status == "1"){?>selected<?php } ?>>Success</option>
                                    <option value="0" <?php if(!empty($single) && $single->payment_status == "0"){?>selected<?php } ?>>Failed</option>
                                </select>
                            </div>
                        </div>
						<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputUsername1">Signature *</label>
							<select class="form-control js-example-basic-single" id="signature" name="signature">
								<option value="">Select Signature</option>
								<?php if(!empty($signature)){ foreach($signature as $signature_result){?>
								<option value="<?=$signature_result->id?>" <?php if(!empty($single) && $single->signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
								<?php }}?> 
							</select>
						</div> 
					</div>


						<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputUsername1">Authority Signature *</label>
							<select class="form-control js-example-basic-single" id="auth_signature" name="auth_signature">
								<option value="">Select Authority Signature</option>
								<?php if(!empty($signature)){ foreach($signature as $signature_result){?>
								<option value="<?=$signature_result->id?>" <?php if(!empty($single) && $single->auth_signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
								<?php }}?> 
							</select>
						</div>
						</div>
					</div>	
					<button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
      
<?php include('footer.php');
$id=0;
if($this->uri->segment(2) != ""){
	$id = $this->uri->segment(2);
}
?>
<script>
$(document).ready(function() {
  $('.choosen').select2();
});
</script>

 <script>
 $(document).ready(function () {		
	$('#single_form').validate({
		rules: {
			transaction_id: {
				required: true,
			},
			amount: {
				required: true,
				number: true,
			},
			issue_date: {
				required: true,
			},
			issue_status: {
				required: true,
			},
			payment_date: {
				required: true,
			},
			payment_status: {
				required: true,
			},
			signature: {
				required: true,
			}, 
		},
		messages: {
			transaction_id: {
				required: "Please enter transaction ID",
			},
			amount: {
				required: "Please enter amount",
				number: "Please enter amount",
			},
			issue_date: {
				required: "Please select issue date",
			},
			issue_status: {
				required: "Please select issue status",
			},
			payment_date: {
				required: "Please select payment date",
			},
			payment_status: {
				required: "Please select payment status",
			}, 
			signature: {
				required: "Please select signature",
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
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
});
 </script>
 