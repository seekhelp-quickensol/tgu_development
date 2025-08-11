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
                  
                  <p class="card-description">
                    Please enter transaction details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
						 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter Transaction ID *</label>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                                <input type="text" class="form-control no_space" id="transaction_id" name="transaction_id" placeholder="Enter Transaction ID" value="<?php if(!empty($single)){ echo $single->transaction_id;}?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter Amount *</label>
                                <input type="text" class="form-control no_space" id="payment_amount" name="payment_amount" placeholder="Enter Amount" value="<?php if(!empty($single)){ echo $single->payment_amount;}?>">
                            </div>
                        </div>
						<div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Payment Date *</label>
                                <input type="text" class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Issue date" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->payment_date));}?>">
                            </div>
                        </div> 
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Select Payment Status *</label>
                                <select name="payment_status" id="payment_status" class="form-control">
                                    <option value="">Select Payment Status</option>
                                    <option value="0" <?php if(!empty($single) && $single->payment_status == "0"){?>selected<?php } ?>>Failed</option>
                                    <option value="1" <?php if(!empty($single) && $single->payment_status == "1"){?>selected<?php } ?>>Success</option> 
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
  $(".no_space").on("input", function() {
        // Trim leading spaces
        if ($(this).val().startsWith(" ")) {
            $(this).val($(this).val().trimStart());
        }
    });
});
</script>

 <script> 
 $(document).ready(function () { 
 
	$('#single_form').validate({
		rules: {
			transaction_id: {
				required: true, 
			},
			payment_date: {
				required: true,
			}, 
			payment_amount: {
				required: true,
				number: true,
			}, 
			payment_status: {
				required: true,
			},
		},
		messages: {
			transaction_id: {
				required: "Please enter transaction ID", 
			},
			payment_date: {
				required: "Please select payment date",
			}, 
			payment_amount: {
				required: "Please enter amount",
				number: "Please enter amount",
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
 