<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Payment Details</h4>
                  <p class="card-description">
                    Please enter payment details
                  </p>
                  <form class="forms-sample" name="bank_form" id="bank_form" method="post" enctype="multipart/form-data">
				  <div class="row">
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Transaction Number *</label>
                      <input type="text" autocomplete="off" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction Number" value="<?php if(!empty($single)){ echo $single->transaction_id;}?>">
					  <div class="error" id="transaction_error"></div>
					 </div>
					 </div>
				  	<div class="col-md-3">
					 <div class="form-group">
                      <label for="exampleInputUsername1">Payment Mode *</label>
                      <select class="form-control" id="payment_mode" name="payment_mode">
						<option value="">Select Mode</option>
						<option value="1" <?php if(!empty($single) && $single->payment_mode == "1"){?>selected="selected"<?php }?>>Cash</option>
						<option value="2" <?php if(!empty($single) && $single->payment_mode == "2"){?>selected="selected"<?php }?>>Online</option>
					  </select>
					 </div>
					 </div>
					 <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputUsername1">Payment Date *</label>
                  <input type="text" class="form-control datepicker" readonly id="payment_date" name="payment_date" placeholder="Payment Date" value="<?php if(!empty($single->payment_date)){ echo date("d/m/Y",strtotime($single->payment_date));}?>">
					 </div>
					 </div>
					 <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Payment Status *</label>
                      <select class="form-control" id="payment_status" name="payment_status">
						<option value="">Select Mode</option>
						<option value="1" <?php if(!empty($single) && $single->payment_status == "1"){?>selected="selected"<?php }?>>Success</option>
						<option value="0" <?php if(!empty($single) && $single->payment_status == "0"){?>selected="selected"<?php }?>>Failed</option>
					  </select>
					 </div>
					 </div> 
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Total Fees *</label>
                      <input type="text" class="form-control" id="total_fees" name="total_fees" placeholder="Total Fees" value="<?php if(!empty($single)){ echo $single->payment_ammount;}?>" readonly >
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
	$('#bank_form').validate({
		rules: {
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
			total_fees: {
				required: true,
				number: true,
			},
		},
		messages: {
			transaction_id:{
				required: "Please select transaction Number",
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
// $("#account_number").keyup(function(){  
// 	$.ajax({
// 		type: "POST",
// 		url: "<?=base_url();?>admin/ajax_controller/get_unique_bank",
// 		data:{'account_number':$("#account_number").val(),'id':'<?=$id?>'},
// 		success: function(data){
// 			if(data == "0"){
// 				$("#account_error").html("");
// 				$("#save_btn").show();
// 			}else{
// 				$("#account_error").html("This account is already added");
// 				$("#save_btn").hide();
// 			}
// 		},
// 		 error: function(jqXHR, textStatus, errorThrown) {
// 		   console.log(textStatus, errorThrown);
// 		}
// 	});	
// }); 
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
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_transaction_for_tbl_course_work",
		data:{'transaction_id':$("#transaction_id").val()},
		success: function(data){
			// alert(data);	
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
// $(".discount").keyup(function(){
// 	var main = $('#amount').val();
// 	var disc = $('#discount').val();
// 	var dec = (disc / 100).toFixed(2);
// 	var mult = main * dec;
// 	var discont = main - mult;
	
// 	//$("#amount").val(discont);
// 	var total_amount = parseInt($("#late_fees").val())+parseInt($("#bank_fees").val())+parseInt($("#amount").val());
// 	total_amount = total_amount-parseInt(mult);
// 	$("#total_fees").val(parseInt(total_amount));
// });
// history.pushState(null, null, window.location.href);
// history.back();
// window.onpopstate = () => history.forward();

function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
// if ( window.history.replaceState ) {
//   window.history.replaceState( null, null, window.location.href );
// }
</script>
 