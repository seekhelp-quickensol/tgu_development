<?php
// print_r($amount->certificate_fees);exit;
include('header.php');?>

<style>
	.error{
		color:red;
	}
</style>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
					<div class="card-header custom-header">
					<h4 class="card-title">Apply Transfer</h4>
              		</div>
						<div class="card-body">
							
							<p class="card-description"> Please enter details </p>
							<form class="forms-sample" name="syllabus_form" id="syllabus_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Enrollment Number *</label>
											<input type="text" class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enrollment Number" value="<?php if(!empty($single)){ echo $single->enrollment_number;}?>" <?php if(!empty($single)){ ?>readonly<?php }?>>
											<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>"> 
											<input type="hidden" class="form-control" id="student_id" name="student_id" value="<?php if(!empty($single)){ echo $single->student_id;}?>"> 
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Student Name *</label>
											<input type="text" class="form-control" id="name" name="name" placeholder="Student Name" value="<?php if(!empty($single)){ echo $single->student_name;}?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Father Name *</label>
											<input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name" value="<?php if(!empty($single)){ echo $single->father_name;}?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Transaction ID *</label>
											<input type="text" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction ID" value="<?php if(!empty($single)){ echo $single->transaction_id;}?>">
											<div class="error" id="transaction_id_error"></div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Amount *</label>
											<!-- <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php if(!empty($single)){ echo $single->amount;}?>"> -->
											<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php echo !empty($amount) ? $amount->certificate_fees : 0; ?>">

										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Issue Date *</label>
											<input type="text" class="form-control datepicker" autocomplete="off" id="issue_date" name="issue_date" placeholder="Issue Date" value="<?php if(!empty($single) && $single->issue_date !="0000-00-00"){ echo date("d-m-Y",strtotime($single->issue_date));}?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Payment Status *</label>
											<select class="form-control js-example-basic-single select2_single" id="payment_status" name="payment_status">
												<option value="">Select Status</option>
												<option value="1" <?php if(!empty($single) && $single->payment_status == "1"){?>selected="selected"<?php }?>>Success</option>
												<option value="0" <?php if(!empty($single) && $single->payment_status == "0"){?>selected="selected"<?php }?>>Failed</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Approve Status *</label>
											<select class="form-control js-example-basic-single select2_single" id="approve_status" name="approve_status">
												<option value="">Select Status</option>
												<option value="1"  <?php if(!empty($single) && $single->approve_status == "1"){?>selected="selected"<?php }?>>Approved</option>
												<option value="0"  <?php if(!empty($single) && $single->approve_status == "0"){?>selected="selected"<?php }?>>Un Approved</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Signature *</label>
											<select class="form-control js-example-basic-single select2_single" id="signature" name="signature">
												<option value="">Select Signature</option>
												<?php if(!empty($signature)){ foreach($signature as $signature_result){?>
												<option value="<?=$signature_result->id?>" <?php if(!empty($single) && $single->signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
												<?php }}?> 
											</select>
										</div> 
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
										<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
										</div>
									</div>
									<!-- <div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Active Status *</label>
											<select class="form-control" id="status" name="status">
												<option value="">Select Status</option>
												<option value="1" <?php if(!empty($single) && $single->status == "1"){?>selected="selected"<?php }?>>Active</option>
												<option value="0" <?php if(!empty($single) && $single->status == "0"){?>selected="selected"<?php }?>>Inactive</option>
											</select>
										</div>
									</div> -->
									 
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
	$('#syllabus_form').validate({
		// ignore:[],
		
ignore: ":hidden:not(select)",
		rules: {
			enrollment_number: {
				required: true,
			}, 
			name: {
				required: true,
			}, 
			father_name: {
				required: true,
			}, 
			transaction_id: {
				required: true,
			}, 
			// amount: {
			// 	required: true,
			// }, 
			issue_date: {
				required: true,
			}, 
			payment_status: {
				required: true,
			}, 
			approve_status: {
				required: true,
			}, 
			status: {
				required: true,
			}, 
			signature: {
				required: true,
			}, 
		},
		messages: {
			enrollment_number: {
				required: "Please enter enrollment number",
			}, 
			name: {
				required: "Please enter student name",
			}, 
			father_name: {
				required: "Please enter father name",
			}, 
			transaction_id: {
				required: "Please enter transaction id",
			}, 
			// amount: {
			// 	required: "Please enter amount",
			// }, 
			issue_date: {
				required: "Please select issue date",
			}, 
			payment_status: {
				required: "Please select payment status",
			}, 
			approve_status: {
				required: "Please select approve status",
			}, 
			status: {
				required: "Please select status",
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

$('#payment_status').on('change', function() {
			$('#payment_status').valid();
		});

		$('#approve_status').on('change', function() {
			$('#approve_status').valid();
		});

		$('#signature').on('change', function() {
			$('#signature').valid();
		});

$("#enrollment_number").keyup(function(){
	$("#name").val('');
	$("#father_name").val(''); 
	$.ajax({
				type: "POST",
				url: "<?=base_url();?>admin/Ajax_controller/get_student_details",
				data:{'enrollment_number':$("#enrollment_number").val()},
				success: function(data){
					var opts = $.parseJSON(data);
					 $("#name").val(opts.student_name);
					 $("#father_name").val(opts.father_name); 
					 $("#student_id").val(opts.id); 
				},
				 error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});	
});



$("#transaction_id").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/ajax_controller/get_unique_transaction_id",
		data:{'transaction_id':$("#transaction_id").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "0"){
				$("#transaction_id_error").html("");
				$("#save_btn").show();
			}else{
				$("#transaction_id_error").html("This transaction id is already added");
				$("#save_btn").hide();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$( function() {
    // $( ".datepicker" ).datepicker({
	// 	dateFormat:"dd-mm-yy",
	// 	changeMonth:true,
	// 	changeYear:true,
	// 	// maxDate: "-12Y",
	// 	// minDate: "-80Y",
	// 	// yearRange: "-100:-0"
	// });

	$(".datepicker").datepicker({
		dateFormat: "dd-mm-yy",
		changeMonth: true,
		changeYear: true,
		minDate: 0, 
		maxDate: "+32Y",
		yearRange: "-100:+32"
	});
});
</script>


 