<?php include('header.php');?>
<link rel="stylesheet" href="<?=base_url();?>back_panel/vendors/select2/select2.min.css">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Payment Setting</h4>
                  <p class="card-description">
                    Please enter payment details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Payment Date *</label>
                      <input type="text" class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Payment Date" value="<?php if(!empty($single)){ echo $single->payment_date;}?>">
                    </div>
					 <div class="form-group">
                      <label for="exampleInputUsername1">Payment Mode *</label>
                      <select class="form-control select2_single" id="payment_mode" name="payment_mode">
						<option value="">Select</option>
						<option value="1" <?php if(!empty($single) && $single->payment_mode == "1"){?>selected="selected"<?php }?>>Online</option>
						<option value="2" <?php if(!empty($single) && $single->payment_mode == "2"){?>selected="selected"<?php }?>>Cash</option>
						<option value="3" <?php if(!empty($single) && $single->payment_mode == "3"){?>selected="selected"<?php }?>>Cheque</option>
						<option value="4" <?php if(!empty($single) && $single->payment_mode == "4"){?>selected="selected"<?php }?>>DD</option>
					  </select>
                    </div>
					<div class="form-group trans" style="<?php if(!empty($single) && $single->payment_mode !="2"){?>display:block<?php }else{?>display:none<?php }?>">
                      <label for="exampleInputUsername1">Transaction/Cheque/DD No *</label>
                      <input type="text" class="form-control" id="transaction_no" name="transaction_no" placeholder="Transaction/Cheque/DD No" value="<?php if(!empty($single)){ echo $single->transaction_no;}?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Amount *</label>
                      <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php if(!empty($single)){ echo $single->amount;}?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Payment Status *</label>
                      <select class="form-control select2_single" id="payment_status" name="payment_status">
						<option value="">Select Status</option>
						<option value="1" <?php if(!empty($single) && $single->payment_status == "1"){?>selected="selected"<?php }?>>Success</option>
						<option value="0" <?php if(!empty($single) && $single->payment_status == "0"){?>selected="selected"<?php }?>>Failed</option>
					  </select>
                    </div>
					<input type="hidden" class="form-control" id="center_id" name="center_id" value="<?php if(!empty($center)){ echo $center->id;}?>">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Payment List of <?php if(!empty($center)){ echo $center->center_name;}?></h4>
                  <p class="card-description">
                    All list of payment
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Payment Date</th>
						<th>Payment Mode</th>
						<th>Transaction No.</th>
						<th>Amount</th>
						<th>Payment Status</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
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
<script src="<?=base_url();?>back_panel/js/select2.min.js"></script>
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#single_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			payment_date: {
				required: true,
			},
			payment_mode: {
				required: true,
			},
			transaction_no: {
				required: true,
			},
			amount: {
				required: true,
				number: true,
			},
			payment_status: {
				required: true,
			},
		},
		messages: {
			payment_date: {
				required: "Please select payment date",
			},
			payment_mode: {
				required: "Please select payment mode",
			},
			transaction_no: {
				required: "Please enter transaction no",
			},
			amount: {
				required: "Please enter amount",
				number: "Please enter valid amount",
			},
			payment_status: {
				required: "Please select payment status",
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



$(document).ready(function() {
	$('#example').DataTable({
		"processing": true,
		"serverSide": true,
		"cache": false,
		"order": [[0, "asc" ]],
		dom:"Bfrtip",
		buttons: [
			// {
			// 	extend: 'copyHtml5',
			// 	exportOptions: {
			// 	 columns: ':contains("Office")'
			// 	}
			// },
			// 'excelHtml5',
			// 'csvHtml5',
			// 'pdfHtml5'
		],
		"ajax":{
			"url": "<?=base_url();?>admin/Ajax_controller/get_center_payment_ajax",
			"type": "POST",
			"data":{'center_id':'<?=$id?>'},
		},		
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
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
$("#payment_mode").change(function(){  
  if($(this).val() == "2"){
	  $(".trans").hide();
  }else{
	   $(".trans").show();
  }
});


		$('#payment_mode').on('change', function() {
			$('#payment_mode').valid();
		});

		$('#payment_status').on('change', function() {
			$('#payment_status').valid();
		});

</script>
 