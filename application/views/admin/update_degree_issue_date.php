<?php  
include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
			  <div class="card-header custom-header">
			  <h4 class="card-title">Update Details</h4>
              </div>
                <div class="card-body">
                 
                  <p class="card-description"> 
                  </p>
                  <form class="forms-sample" name="migration_form" id="degree_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Issue Date</label>
                      <input type="text" class="form-control datepicker" id="issue_date" name="issue_date" placeholder="Issue Date" value="<?php if(!empty($degree) && $degree->issue_date !="0000-00-00"){ echo date("d-m-Y",strtotime($degree->issue_date));}?>">
                      <input type="hidden" name="id" value="<?php if(!empty($degree)){ echo $degree->id;}?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Amount*</label>
                      <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php if(!empty($degree)){ echo $degree->amount;}?>">
                      <!-- <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php if(!empty($amount)){ echo $amount->certificate_fees;}?>"> -->
					</div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Payment ID*</label>
                      <input type="text" class="form-control" id="transaction_id" name="transaction_id" placeholder="Payment ID" value="<?php if(!empty($degree)){ echo $degree->transaction_id;}?>">
					  <div class="error" id="transaction_error"></div>
                    </div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Payment Status</label>
                      <select class="form-control js-example-basic-single select2_single" id="payment_status" name="payment_status">
						<option value="0" <?php if(!empty($degree) && $degree->payment_status == "0"){?>selected="selected"<?php }?>>Failed</option>
						<option value="1" <?php if(!empty($degree) && $degree->payment_status == "1"){?>selected="selected"<?php }?>>Success</option>
					  </select>
                    </div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Degree Approve Status</label>
                      <select class="form-control js-example-basic-single select2_single" id="approve_status" name="approve_status">
						<option value="0" <?php if(!empty($degree) && $degree->approve_status == "0"){?>selected="selected"<?php }?>>Unapproved</option>
						<option value="1" <?php if(!empty($degree) && $degree->approve_status == "1"){?>selected="selected"<?php }?>>Approved</option>
					  </select>
                    </div> 
					<div class="form-group">
						<label for="exampleInputUsername1">Signature *</label>
						<select class="form-control js-example-basic-single select2_single" id="signature" name="signature">
							<option value="">Select Signature</option>
							<?php if(!empty($signature)){ foreach($signature as $signature_result){?>
							<option value="<?=$signature_result->id?>" <?php if(!empty($degree) && $degree->signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
							<?php }}?> 
						</select>
					</div> 

					<div class="form-group">
						<label for="exampleInputUsername1">Chancellor Signature *</label>
						<select class="form-control js-example-basic-single select2_single" id="chancellor_signature" name="chancellor_signature">
							<option value="">Select Signature</option>
							<?php if(!empty($signature)){ foreach($signature as $signature_result){?>
							<option value="<?=$signature_result->id?>" <?php if(!empty($degree) && $degree->chancellor_signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
							<?php }}?> 
						</select>
					</div> 
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
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
	$('#degree_form').validate({
		rules: {
			issue_date: {
				required: true,
			},
			amount: {
				required: true,
			},
			transaction_id: {
				required: true,
			},
			payment_status: {
				required: true,
			},
			approve_status: {
				required: true,
			}, 
			signature: {
				required: true,
			},
		},
		messages: {
			issue_date: {
				required: "Please select issue date",
			},
			amount: {
				required: "Please enter amount",
			},
			transaction_id: {
				required: "Please enter transaction id",
			},
			payment_status: {
				required: "Please select payment status",
			},
			approve_status: {
				required: "Please select approve status",
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
  $("#transaction_id").keyup(function(){
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_transaction",
		data:{'transaction_id':$("#transaction_id").val(),'fees':$("#fees_id").val()},
		success: function(data){
			if(data == "0"){
				$("#save_btn").show();
				$("#transaction_error").html("");
			}else{
				$("#save_btn").hide();
				$("#transaction_error").html("This transaction number is already in used");
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
</script>
 