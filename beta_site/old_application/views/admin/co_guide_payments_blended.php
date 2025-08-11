<?php include('header.php')?>

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
                      <label for="exampleInputUsername1">Bank Account Number *</label>
					  <?php $guide = $this->Research_model->get_single_guide_account($student);
					//   print_r($guide);exit();
					  ?>
						<input type="text" placeholder="Bank Account Number" class="form-control" id="guide_account" name="guide_account" value="<?php if(!empty($single)){ echo $single->account_number;}else{ if(!empty($guide)){ echo $guide->account_number;}else{ echo "NA"; }}?>">
					  <div class="error" id="id_name_error"></div>
                      <input type="hidden" class="form-control" id="student_id" name="student_id" value="<?php if(!empty($student)){ echo $student->id;}?>">
                      <input type="hidden" class="form-control" id="co_guide_id" name="co_guide_id" value="<?php if(!empty($student)){ echo $student->co_guide_id;}?>">
                      <input type="hidden" class="form-control" id="single_payment_id" name="single_payment_id" value="<?php if(!empty($single)){ echo $single->id;}else{ echo "0";}?>">
                      
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Bank Name *</label>
                      <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php if(!empty($single)){ echo $single->bank_name;}else{ if(!empty($guide)){ echo $guide->bank_name;}}?>">
					 <div class="error" id="transaction_error"></div>
					 </div>
					 </div> 
					 <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Account Name *</label>
                      <input type="text" class="form-control" id="account_name" name="account_name" value="<?php if(!empty($single)){ echo $single->account_name;}else{ if(!empty($guide)){ echo $guide->account_name;}}?>">
					 <div class="error" id="transaction_error"></div>
					 </div>
					 </div> 
					 <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">IFSC Code *</label>
                      <input type="text" class="form-control" id="guide_ifsc" name="guide_ifsc" value="<?php if(!empty($single)){ echo $single->ifsc_code;}else{ if(!empty($guide)){ echo $guide->ifsc_code;}}?>">
					 <div class="error" id="transaction_error"></div>
					 </div>
					 </div> 
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Transaction No *</label>
                      <input type="text" autocomplete="off" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction Number" value="<?php if(!empty($single)){ echo $single->transaction_no;}?>">
					  <div class="error" id="transaction_error"></div>
					 </div>
					 </div> 
					<div class="col-md-3">
					 <div class="form-group">
                      <label for="exampleInputUsername1">Payment Mode *</label>
                      <select class="form-control" id="payment_mode" name="payment_mode">
						<option value="">Select Mode</option>
						<option value="1" <?php if(!empty($single) && $single->mode == "1"){?>selected="selected"<?php }?>>Online</option>
						<option value="2" <?php if(!empty($single) && $single->mode == "2"){?>selected="selected"<?php }?>>Cash</option>
						<option value="3" <?php if(!empty($single) && $single->mode == "3"){?>selected="selected"<?php }?>>Cheque</option>
					  </select>
					 </div>
					 </div>
					 <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Payment Date *</label>
                      <input type="text" class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Payment Date" value="<?php if(!empty($single)){ echo $single->payment_date;}?>">
					 </div>
					 </div>
					 <!-- <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Payment Status *</label>
                      <select class="form-control" id="payment_status" name="payment_status">
						<option value="">Select Mode</option>
						<option value="1" <?php if(!empty($single) && $single->payment_status == "1"){?>selected="selected"<?php }?>>Success</option>
						<option value="0" <?php if(!empty($single) && $single->payment_status == "0"){?>selected="selected"<?php }?>>Failed</option>
					  </select>
					 </div>
					 </div> -->
					 <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Amount *</label>
                      <input type="text" class="form-control" id="total_fees" name="total_fees" placeholder="Amount" value="<?php if(!empty($single)){ echo $single->amount;}?>">
					 </div>
					 </div>
					 <div class="col-md-7">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Remark</label>
                      <input type="text" class="form-control" id="remark" name="remark" placeholder="Remark" value="<?php if(!empty($single)){ echo $single->remark;}?>">
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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Co Guide Payment List for - <?php if(!empty($student)){ echo $student->student_name;}?></h4>
				  <div class="row">
					<div class="col-lg-3">
                        <?php if(!empty($student)){ 
                            $total_fees = $student->co_guide_fees;
                        } ?>
						<h5 class="card-title">Total Guide Fees: ₹ <?=number_format((float)$total_fees, 2);?></h5>
					</div>
					<?php $total_paid_amt = 0;
						if(!empty($payment)){ foreach($payment as $payment_result){							
							$total_paid_amt = $total_paid_amt + $payment_result->amount;
						}}
					?>
					<div class="col-lg-3">
						<h5 class="card-title">Total Paid Amount: ₹ <?=number_format($total_paid_amt,2);?> </h5>
					</div>
					<?php $total_pending_amt = (int)$total_fees - $total_paid_amt ;
						$total_pending_amt = abs($total_pending_amt);
					// echo "<pre>";print_r($total_pending_amt);exit;
					?>
					<div class="col-lg-3">
						<h5 class="card-title">Total Pending : ₹ <?=number_format($total_pending_amt,2);?> </h5>
					</div>
                  </div>
				  <p class="card-description">
                    All list of Payment's
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Payment Mode</th>
						<th>Payment Date</th>
						<th>Transaction ID</th>
						<th>Amount</th>
						<th>Remark</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php 
						$i = 1;
						if(!empty($payment)){ foreach($payment as $payment_result){?>							
							<tr>
								<td><?=$i++?></td>
								<td> 
									<?php 
										$mode = "";
										if($payment_result->mode == "1"){
											$mode = "Online";
										}else if($payment_result->mode == "2"){
											$mode = "Cash";
										}else if($payment_result->mode == "3"){
											$mode = "Cheque";
										}
										echo $mode;
									?>
								</td>
								<td><?=$payment_result->payment_date?></td>
								<td><?=$payment_result->transaction_no?></td>
								<td><?=$payment_result->amount?></td>
								<td><?=$payment_result->remark?></td>
								<td>
									<a type="button" title="Edit" data-toggle="tooltip" href="<?=base_url()?>co_guide_payments_blended/<?=$this->uri->segment(2)?>/<?=$payment_result->id?>"  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle="tooltip" title="Permanently Delete" href="<?=base_url()?>delete/<?=$payment_result->id?>/tbl_co_guide_payment_blended" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									
								</td>
							</tr>
						<?php }}?>
				</tbody>
			</table>
                </div>
              </div>
            </div>
          </div>
        </div>
									</div>
									</div>

<?php include('footer.php')?>
 <script>
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
});

 $(document).ready(function () {		

	$.validator.addMethod("ifscValidation", function(value, element) {
            return /^[A-Z0-9]{11}$/.test(value);
        }, "Please enter valid ifsc code");


	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#bank_form').validate({
		rules: {
			guide_account: {
				required: true,
			},
			guide_ifsc: {
				required: true,
				ifscValidation:true,
			},
			transaction_id: {
				required: true,
			},
			bank_name:{
				required:true,
			},
			account_name:{
				required:true,
			},
			year_sem: {
				required: true,
			},
			fees_type: {
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
			late_fees: {
				required: true,
				number: true,
			},
			bank_fees: {
				required: true,
				number: true,
			},
			discount: {
				required: true,
				number: true,
			},
			amount: {
				required: true,
				number: true,
			},
			total_fees: {
				required: true,
				number: true,
			},
		},
		messages: {
			guide_account: {
				required: "Please enter bank account number",
			},
			guide_ifsc: {
				required: "Please enter IFSC Code",
				ifscValidation:"Please enter valid ifsc code",
			},
			transaction_id: {
				required: "Please enter transaction number",
			},
			bank_name:{
				required:"Please enter bank name",
			},
			account_name:{
				required:"Please enter account name",
			},
			year_sem: {
				required: "Please select year/sem",
			},
			fees_type: {
				required: "Please select payment type",
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
			late_fees: {
				required: "Please enter amount",
				number: "Please enter valid amount",
			},
			bank_fees: {
				required: "Please enter amount",
				number: "Please enter valid amount",
			},
			discount: {
				required: "Please enter amount",
				number: "Please enter valid amount",
			},
			amount: {
				required: "Please enter amount",
				number: "Please enter valid amount",
			},
			total_fees: {
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
</script>
<script>
$("#account_number").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/ajax_controller/get_unique_bank",
		data:{'account_number':$("#account_number").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "0"){
				$("#account_error").html("");
				$("#save_btn").show();
			}else{
				$("#account_error").html("This account is already added");
				$("#save_btn").hide();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}); 
$(document).ready(function() {
	$('#example').DataTable({
		dom:"Bfrtip",
		buttons: [
			{
				extend: 'copyHtml5',
				exportOptions: {
				 columns: ':contains("Office")'
				}
			},
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5'
		],
    }); 
}); 

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
$(".discount").keyup(function(){
	var main = $('#amount').val();
	var disc = $('#discount').val();
	var dec = (disc / 100).toFixed(2);
	var mult = main * dec;
	var discont = main - mult;
	
	//$("#amount").val(discont);
	var total_amount = parseInt($("#late_fees").val())+parseInt($("#bank_fees").val())+parseInt($("#amount").val());
	total_amount = total_amount-parseInt(mult);
	$("#total_fees").val(parseInt(total_amount));
});
</script>