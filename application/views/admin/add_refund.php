<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add  Refunds</h4>
                  <p class="card-description">
                    Please enter papers details
                  </p>
                  <form class="forms-sample" name="paper_form" id="paper_form" method="post" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-md-3">	
                  <div class="form-group">
                      <label for="exampleInputUsername1"> Account Number *</label>
                      <input type="hidden" name="id" id="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                      <input type="text" class="form-control" id="account_number" name="account_number"  value="<?php if(!empty($single)){ echo $single->account_number;}?>">
                    <input type="hidden" name="student_id" id="student_id" value="<?=$this->uri->segment(2);?>">
                    </div>
</div>
                   
                    <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1"> Account Name *</label>
                      <input type="text" class="form-control" id="account_name" name="account_name"  value="<?php if(!empty($single)){ echo $single->account_name;}?>">
                    </div>
</div>
<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1"> IFSC *</label>
                      <input type="text" class="form-control" id="ifsc" name="ifsc"  value="<?php if(!empty($single)){ echo $single->ifsc;}?>">
                    </div>
</div>
<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1"> Reference Id *</label>
                      <input type="text" class="form-control" id="reference_id" name="reference_id"  value="<?php if(!empty($single)){ echo $single->reference_id;}?>">
                    </div>
</div>
<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1"> Refund Amount  *</label>
                      <input type="text" class="form-control" id="refund_amount" name="refund_amount"  value="<?php if(!empty($single)){ echo $single->refund_amount;}?>">
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1"> Remark  *</label>
                      <input type="text" class="form-control" id="remark" name="remark"  value="<?php if(!empty($single)){ echo $single->remark;}?>">
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1"> Date *</label>
                      <!-- <input type="text" readonly class="form-control" id="date" name="date"  value="<?php if(!empty($single)){ echo $single->date;}?>"> -->
					  <input type="text" readonly class="form-control" id="date" name="date" value="<?php echo (!empty($single) && !empty($single->date)) ? $single->date : date('d-m-Y'); ?>">
					</div>
					</div>
					
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1"> Upload Document </label>
                      <input type="file" class="form-control" id="userfile" name="userfile">
                      <input type="hidden" class="form-control" id="old_userfile" name="old_userfile"  value="<?php if(!empty($single)){ echo $single->document;}?>">
                    </div>
					</div>
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
	$('#paper_form').validate({
		rules: {
			account_number: {
				required: true,
			},
			account_name: {
				required: true,
			},
			ifsc: {
				required: true,
			},
			reference_id: {
				required: true,
			},
			refund_amount: {
				required: true,
			},
            remark: {
				required: true,
			},
			date: {
				required: true,
			},
			<?php if(!empty($single) && $single->file !=""){  }else{ ?>
			file: {
				required: true,
			},
			<?php  } ?>
		},
		messages: {
			account_number: {
				required: "Please enter  account number",
			},
			account_name: {
				required: "Please enter account name",
			},
			ifsc: {
				required: "Please enter ifsc code",
			},
			reference_id: {
				required: "Please enter reference id",
			},
			refund_amount: {
				required: "Please enter refund amount",
			},
			date: {
				required: "Please select date",
			},
            remark: {
				required: "Please enter remark",
			},
            
			file: {
				required: "Please select file to upload",
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
    $( "#date" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
  } );
 
 



</script>
 