<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Apply For Synopsis Certificate</h4>
							<p class="card-description"> Please enter details </p>
							<?php if(empty($single)){?>
							<form class="forms-sample" name="enrollment_form" id="enrollment_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Enrollment Number*</label>
											<input type="text" class="form-control" id="enrollment_number_verify" name="enrollment_number_verify" placeholder="Enrollment Number">   
										</div>
									</div>
								</div>
								<button type="submit" id="next" name="next" value="Next" class="btn btn-primary mr-2">Next</button> 
							</form> 
							<?php }else{
								//echo "<pre>";print_r($single);
								?>
							<form class="forms-sample" name="syllabus_form" id="syllabus_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Enrollment Number*</label>
											<input type="text" class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enrollment Number" value="<?php if(!empty($single)){ echo $single->enrollment_number;}?>" <?php if(!empty($single)){ ?>readonly<?php }?>> 
											<input type="hidden" class="form-control" id="student_id" name="student_id" value="<?php if(!empty($single)){ echo $single->id;}?>"> 
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Student Name</label>
											<input type="text" class="form-control" id="student_name" name="student_name" placeholder="Student Name" value="<?php if(!empty($single)){ echo $single->student_name;}?>" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Thesis Title</label>
											<textarea class="form-control" id="thesis_title" name="thesis_title" placeholder=""><?php if(!empty($single)){ echo $single->thesis_title;}?></textarea>
										</div>
									</div>
									 
									
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Father Name</label>
											<input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name" value="<?php if(!empty($single)){ echo $single->father_name;}?>" readonly>
										</div>
									</div>
									 
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Issue Date</label>
											<input type="text" class="form-control datepicker" id="issue_date" name="issue_date" placeholder="Issue Date" value="<?php if(!empty($single) && $single->issue_date != ""){ echo date("d-m-Y",strtotime($single->issue_date));}?>">
										</div>
									</div>
									 
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Approve Status</label>
											<select class="form-control" id="synopsis_status" name="synopsis_status">
												<option value="">Select Status</option>
												<option value="0"  <?php if(!empty($single) && $single->synopsis_status == "0"){?>selected="selected"<?php }?>>Original</option>
												<option value="1"  <?php if(!empty($single) && $single->synopsis_status == "1"){?>selected="selected"<?php }?>>Duplicate</option>
												<option value="2"  <?php if(!empty($single) && $single->synopsis_status == "2"){?>selected="selected"<?php }?>>Under Review</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputUsername1">Signature *</label>
											<select class="form-control" id="signature" name="signature">
												<option value="">Select Signature</option>
												
                                                
                                                <?php if(!empty($signature)){ foreach($signature as $signature_result){?>									
                                                <option value="<?=$signature_result->id?>" <?php if(!empty($single) && $single->signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
                                                <?php }}?> 
											</select>
										</div> 
									</div> 
									 
								</div>
								<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
							</form>
							<?php }?>
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
		ignore:[],
		rules: {
			enrollment_number: {
				required: true,
			}, 
			reason_of_transfer: {
				required: true,
			},
			/*			
			transaction_id: {
				required: true,
			}, 
			amount: {
				required: true,
			}, */
			issue_date: {
				required: true,
			}, 
			/*payment_status: {
				required: true,
			},*/ 
			approve_status: {
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
			reason_of_transfer: {
				required: "Please enter reason of transfer",
			},  
			/*
			father_name: {
				required: "Please enter father name",
			}, 
			transaction_id: {
				required: "Please enter transaction id",
			}, 
			amount: {
				required: "Please enter amount",
			}, 
			*/
			issue_date: {
				required: "Please select issue date",
			}, 
			/*
			payment_status: {
				required: "Please select payment status",
			},*/ 
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
$("#enrollment_number").keyup(function(){
	$("#name").val('');
	$("#father_name").val(''); 
	$.ajax({
				type: "POST",
				url: "<?=base_url();?>admin/Ajax_controller/get_seprate_student_details",
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
 