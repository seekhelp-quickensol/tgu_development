<?php  
include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Certificate</h4>
                  <p class="card-description"> 
                  </p>
                  <form class="forms-sample" name="transcript_form" id="transfer_form" method="post" enctype="multipart/form-data">
                      <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                      <label for="exampleInputUsername1">Transaction ID*</label>
                      <input type="text" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction ID" value="<?php if(!empty($transfer)){ echo $transfer->transaction_id;}?>">
                    </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                      <label for="exampleInputUsername1">Amount*</label>
                      <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php if(!empty($transfer)){ echo $transfer->amount;}?>">
                      <!-- <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php if(!empty($amount)){ echo $amount->certificate_fees;}?>" readonly> -->
					</div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                      <label for="exampleInputUsername1">Payment Status*</label>
                      <select class="form-control js-example-basic-single select2_single" id="payment_status" name="payment_status">
                            <option value="">Select Payment Staus</option>
                            <option value="1" <?php if(!empty($transfer) && $transfer->payment_status == "1"){?>selected<?php } ?>>Success</option>
                            <option value="0" <?php if(!empty($transfer) && $transfer->payment_status == "0"){?>selected<?php } ?>>Failed</option>
                      </select>
                    </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                      <label for="exampleInputUsername1">Issue Status*</label>
						<select class="form-control js-example-basic-single select2_single" id="approve_status" name="approve_status">
                            <option value="">Select Approve Staus</option>
                            <option value="1" <?php if(!empty($transfer) && $transfer->approve_status == "1"){?>selected<?php } ?>>Approved</option>
                            <option value="0" <?php if(!empty($transfer) && $transfer->approve_status == "0"){?>selected<?php } ?>>Un Approved</option>
						</select>
                    </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                      <label for="exampleInputUsername1">Issue Date*</label>
                      <input type="text" class="form-control datepicker" id="issue_date" name="issue_date" placeholder="Issue Date" value="<?php if(!empty($transfer) && $transfer->issue_date != "0000-00-00"){ echo date("d-m-Y",strtotime($transfer->issue_date));}?>" autocomplete="off">
                      <input type="hidden" name="id" value="<?php if(!empty($transfer)){ echo $transfer->id;}?>">
                    </div>
                    </div>
					<div class="col-md-4">
					<div class="form-group">
						<label for="exampleInputUsername1">Signature *</label>
						<select class="form-control js-example-basic-single select2_single" id="signature" name="signature">
							<option value="">Select Signature</option>
							<?php if(!empty($signature)){ foreach($signature as $signature_result){?>
							<option value="<?=$signature_result->id?>" <?php if(!empty($transfer) && $transfer->signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
							<?php }}?> 
						</select>
					</div> 
					</div>
                    <div class="col-md-4">
                        <div class="form-group">
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    </div>
                    </div>
                    </div>
                  </form>
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
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#transfer_form').validate({
		rules: {
			transaction_id: {
				required: true,
			},
			amount: {
				required: true,
				number: true,
			},
			approve_status: {
				required: true,
			},
			payment_status: {
				required: true,
			},
			issue_date: {
				required: true,
			},
			payment_date: {
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
			approve_status: {
				required: "Please select issue status",
			},
			payment_status: {
				required: "Please select payment status",
			},
			issue_date: {
				required: "Please select issue date",
			},
			payment_date: {
				required: "Please select payment date",
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
  } );
  
</script>
 