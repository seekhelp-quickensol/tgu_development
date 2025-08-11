<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Payment Details</h4>
                  <p class="card-description">
                    Please enter payment details
                  </p>
                  <form class="forms-sample" name="bank_form" id="bank_form" method="post" enctype="multipart/form-data">
				 <input type="hidden" name="student_id" value="<?=$stu_data['id'];?>">
				 <input type="hidden" name="enrollment_number" value="<?=$stu_data['enrollment_number'];?>">
				 <input type="hidden" name="original_fees" value="<?=$stu_data['original_fees'];?>">
				 
				 
				  <div class="row">
				  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Bank Name *</label>
                      <select class="form-control" id="bank" name="bank">
						<option value="">Select Bank</option>
						<?php if(!empty($bank)){ foreach($bank as $bank_result){?>
						<option value="<?=$bank_result->id?>" <?php if(!empty($single) && $single->bank_id == $bank_result->id){?>selected="selected"<?php }?>><?=$bank_result->bank_name?> | <?=$bank_result->account_number?></option>
						<?php }}?>
					  </select>
					  <div class="error" id="id_name_error"></div>
                     
                    </div>
					</div>
					
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Transaction No *</label>
                      <input type="text" autocomplete="off" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction Number" value="<?php if(!empty($single)){ echo $single->payment_id;}?>">
					  <div class="error" id="transaction_error"></div>
					 </div>
					 </div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Previous Year/Sem*</label>
                      <select class="form-control" id="previous_year_sem" name="previous_year_sem">
						<option value="">Select</option>
						<option value="<?=$stu_data['year_sem'];?>" selected><?=$stu_data['year_sem'];?></option>
					  </select>
					 </div>
					 
					</div> 
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Current Year/Sem*</label>
                      <select class="form-control" id="year_sem" name="year_sem">
						<option value="">Select</option>
						<option value="<?=$stu_data['year_sem']+1;?>" selected><?=$stu_data['year_sem']+1;?></option>
					  </select>
					 </div>
					 
					</div> 
					 
					<div class="col-md-3">
					 <div class="form-group">
                      <label for="exampleInputUsername1">Payment Mode *</label>
                      <select class="form-control" id="payment_mode" name="payment_mode">
						<option value="">Select Mode</option>
						<option value="1" <?php if(!empty($single) && $single->payment_mode == "1"){?>selected="selected"<?php }?>>Online</option>
						<option value="2" <?php if(!empty($single) && $single->payment_mode == "2"){?>selected="selected"<?php }?>>Challan</option>
						<option value="3" <?php if(!empty($single) && $single->payment_mode == "3"){?>selected="selected"<?php }?>>Cash</option>
					  </select>
					 </div>
					 </div>
					 <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Payment Date *</label>
                      <input type="text" class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Payment Date" value="<?php if(!empty($single)){ echo date("d/m/Y",strtotime($single->payment_date));}?>">
					 </div>
					 </div>
					 <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Payment Status *</label>
                      <select class="form-control" id="payment_status" name="payment_status">
						<option value="">Select Mode</option>
						<option value="1" <?php if(!empty($single) && $single->payment_status == "1"){?>selected="selected"<?php }else{?>selected<?php }?>>Success</option>
						<!--<option value="0" <?php if(!empty($single) && $single->payment_status == "0"){?>selected="selected"<?php }?>>Failed</option>-->
					  </select>
					 </div>
					 </div> 
                     <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Total Fees *</label>
                      <input type="text" class="form-control" id="university_share" name="university_share" placeholder="Total Fees" value="<?php if(!empty($stu_data)){ echo $stu_data['university_share'];}?>">
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

	$.validator.addMethod("noSpaceatfirst", function (value, element) {
		return this.optional(element) || /^\s/.test(value) === false;
	}, "First Letter Can't Be Space!");
	
	$('#bank_form').validate({
		rules: {
			bank: {
				required: true,
			},
			transaction_id: {
				required: true,
				noSpaceatfirst:true,
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
			university_share:{
				noSpaceatfirst:true,
				number:true,
			},
			remark:{
				noSpaceatfirst:true,
			},
		},
		messages: {
			bank: {
				required: "Please select bank",
			},
			transaction_id: {
				required: "Please select transaction id",
				noSpaceatfirst:"First letter can't be space",
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
			university_share:{				
				noSpaceatfirst:"First letter can't be space",
				number:"Please enter valid total fees",
			},
			remark:{				
				noSpaceatfirst:"First letter can't be space",
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
 