<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Account Details</h4>
                  <p class="card-description">
                    Please enter account details
                  </p>
                  <form class="forms-sample" name="bank_form" id="bank_form" method="post" enctype="multipart/form-data">
				  <div class="row">
				  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Bank Name *</label>
                      <select class="form-control js-example-basic-single select2_single" id="bank" name="bank">
						<option value="">Select Bank</option>
						<?php if(!empty($bank)){ foreach($bank as $bank_result){?>
						<option value="<?=$bank_result->id?>" <?php if(!empty($transcript) && $transcript->bank_id == $bank_result->id){?>selected="selected"<?php }?>><?=$bank_result->bank_name?> | <?=$bank_result->account_number?></option>
						<?php }}?>
					  </select>
					  <div class="error" id="id_name_error"></div> 
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($transcript)){ echo $transcript->id;}else{ echo "0";}?>">
                    </div>
					</div>
					
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Transaction No *</label>
                      <input type="text" autocomplete="off" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction Number" value="<?php if(!empty($transcript)){ echo $transcript->transaction_id;}?>">
					  <div class="error" id="transaction_error"></div>
					 </div>
					 </div>
					<div class="col-md-3">
					 <div class="form-group">
                      <label for="exampleInputUsername1">Payment Mode *</label>
                      <select class="form-control js-example-basic-single select2_single" id="payment_mode" name="payment_mode">
						<option value="">Select Mode</option>
						<option value="1" <?php if(!empty($transcript) && $transcript->payment_mode == "1"){?>selected="selected"<?php }?>>Online</option>
						<option value="2" <?php if(!empty($transcript) && $transcript->payment_mode == "2"){?>selected="selected"<?php }?>>Challan</option>
						<option value="3" <?php if(!empty($transcript) && $transcript->payment_mode == "3"){?>selected="selected"<?php }?>>Cash</option>
					  </select>
					 </div>
					 </div>
					 <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Payment Date *</label>
                      <input type="text" class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Payment Date" value="<?php if(!empty($transcript)  && $transcript->payment_date != "1970-01-01" && $transcript->payment_date != "0000-00-00"){ echo date("d-m-Y",strtotime($transcript->payment_date));}?>">
					 </div>
					 </div>
					 <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Payment Status *</label>
                      <select class="form-control js-example-basic-single select2_single" id="payment_status" name="payment_status">
						<option value="">Select Mode</option>
						<option value="1" <?php if(!empty($transcript) && $transcript->payment_status == "1"){?>selected="selected"<?php }?>>Success</option>
						<option value="0" <?php if(!empty($transcript) && $transcript->payment_status == "0"){?>selected="selected"<?php }?>>Failed</option>
					  </select>
					 </div>
					 </div>
					 <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Fees *</label>
                      <!-- <input type="text" class="form-control" id="amount" name="amount" placeholder="Fees" value="<?php if(!empty($transcript)){ echo $transcript->amount;}?>"> -->
                      <input type="text" class="form-control" readonly id="amount" name="amount" placeholder="Fees" value="<?php if(!empty($amount)){ echo $amount->certificate_fees;}?>">
					</div>
					 </div> 


					 <div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputUsername1">Signature</label>
					<select class="form-control js-example-basic-single select2_single" id="signature" name="signature">
						<option value="">Select Signature</option>
						<?php if(!empty($signature)){ foreach($signature as $signature_result){?>									
						<option value="<?=$signature_result->id?>" <?php if(!empty($transcript) && $transcript->signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
						<?php }}?> 
					</select>
					</div>
				</div>
                    <div class="clearfix"></div>
					<div class="col-md-12">
					<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    </div>
                  </form>
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
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#bank_form').validate({
		rules: {
			bank: {
				required: true,
			},
			transaction_id: {
				required: true,
			},
			payment_mode: {
				required: true,
			},
			payment_date: {
				required: true,
			},
			payment_status: {
				required: true,
			},
			amount: {
				required: true,
				number: true,
			},
		},
		messages: {
			bank: {
				required: "Please select bank",
			},
			transaction_id: {
				required: "Please select transaction id",
			},
			payment_mode: {
				required: "Please select payment mode",
			},
			payment_date: {
				required: "Please select payment date",
			},
			payment_status: {
				required: "Please select payment status",
			},
			amount: {
				required: "Please enter amount",
				number: "Please enter valid amount",
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
		maxDate:0,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
} );
</script>
 