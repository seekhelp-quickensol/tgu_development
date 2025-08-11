<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Payment Setting
				  </h4>
                  <p class="card-description">
                    Please enter payment details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Student Name*</label>
                      <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Student Name" value="<?php if(!empty($single)){ echo $single->student_name;}?>">
                    </div>
					</div>

					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Father's Name*</label>
                      <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name" value="<?php if(!empty($single)){ echo $single->father_name;}?>">
                    </div>
					</div>

					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Mother's Name*</label>
                      <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name" value="<?php if(!empty($single)){ echo $single->mother_name;}?>">
                    </div>
					</div>
					

					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Date of Birth*</label>
                      <input type="text" class="form-control datepicker" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" value="<?php if(!empty($single)){ echo $single->date_of_birth;}?>">
                    </div>
					</div>


					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">ID Number*</label>
                      <input type="text" class="form-control" id="id_number" name="id_number" placeholder="ID Number" value="<?php if(!empty($single)){ echo $single->id_number;}?>">
                    </div>
					</div>


					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Nationality*</label>
                      <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality" value="<?php if(!empty($single)){ echo $single->nationality;}?>">
                    </div>
					</div>


					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Employment Details*</label>
                      <!-- <input type="text" class="form-control" id="employment_details" name="employment_details" placeholder="Employment Details" value="<?php if(!empty($single)){ echo $single->employment_details;}?>"> -->
            
					  	<select class="form-control" name="employment_details" id="employment_details">
							<option value="">Select Employment Type</option> 
							<option value="Government Employee" <?php if(!empty($single) && $single->employment_details == "Government Employee"){?>selected="selected"<?php }?>>Government Employee</option> 
							<option value="Private Sector Employee" <?php if(!empty($single) && $single->employment_details == "Private Sector Employee"){?>selected="selected"<?php }?>>Private Sector Employee</option> 
							<option value="Not Working" <?php if(!empty($single) && $single->employment_details == "Not Working"){?>selected="selected"<?php }?>>Not Working</option> 
						</select>
					</div>
					</div>

					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">NOC* <?php if($single->noc !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/noc/'.$single->noc)?>">View</a><?php }?></label>
					  <input type="file" class="form-control" name="noc" id="noc">

						<input type="hidden" class="form-control" name="old_noc" id="old_noc">
					</div>
					</div>




					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Email *</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php if(!empty($single)){ echo $single->email_id;}?>">
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mobile Number *</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" value="<?php if(!empty($single)){ echo $single->mobile_number;}?>">
					  <div class="error" id="mobile_error"></div>
                    </div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
						<label for="exampleInputEmail1">Category *</label>
						<!-- <input type="text" class="form-control" id="category" name="category" placeholder="Category" value="<?php if(!empty($single)){ echo $single->category;}?>"> -->
						<select id="category" name="category" class="form-control">
							<option value="">Select Category</option>
							<option value="General" <?php if(!empty($single) && $single->category == "General"){?>selected="selected"<?php }?>>General (Open)</option>
							<option value="Other Backward Class" <?php if(!empty($single) && $single->category == "Other Backward Class"){?>selected="selected"<?php }?>>Other Backward Class (OBC)</option>
							<option value="Scheduled Caste" <?php if(!empty($single) && $single->category == "Scheduled Caste"){?>selected="selected"<?php }?>>Scheduled Caste (SC)</option>
							<option value="Scheduled Tribe" <?php if(!empty($single) && $single->category == "Scheduled Tribe"){?>selected="selected"<?php }?>>Scheduled Tribe (ST)</option>
						</select>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label for="exampleInputEmail1">Gender *</label>
							<select class="form-control" id="gender" name="gender">
								<option value="Male" <?php if(!empty($single) && $single->gender == "Male"){?>selected="selected"<?php }?>>Male</option>
								<option value="Female" <?php if(!empty($single) && $single->gender == "Female"){?>selected="selected"<?php }?>>Female</option>
					  		</select>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
						<label for="exampleInputEmail1">Address *</label>
						<input type="text" class="form-control" id="current_address" name="current_address" placeholder="Address" value="<?php if(!empty($single)){ echo $single->current_address;}?>">
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
						<label for="exampleInputEmail1">Username *</label>
						<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Username" value="<?php if(!empty($single)){ echo $single->mobile_number;}?>">
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
						<label for="exampleInputEmail1">Password *</label>
						<input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php if(!empty($single)){ echo $single->password;}?>">
						</div>
					</div>




					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Stream *</label>
                      <select class="form-control" id="stream" name="stream">
					  <option value="">Select Stream</option>
					  <?php 
					  $stream = array();
					  if(!empty($single)){
						  $stream = $this->Student_model->get_phd_stream($single->course);
					  }
					  if(!empty($stream)){ foreach($stream as $stream_result){?>
					  <option value="<?=$stream_result->id?>" <?php if(!empty($single) && $stream_result->id == $single->stream){ ?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
					  <?php }}?>
					  </select>
                    </div>
					</div>
					
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Payment Id *</label>
                      <input type="text" class="form-control" id="payment_id" name="payment_id" placeholder="Payment ID" value="<?php if(!empty($single)){ echo $single->payment_id;}?>">
					  <div class="error" id="payment_id_error"></div>
                    </div>
					</div> 
					
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Payment Status *</label>
                      <select class="form-control" id="payment_status" name="payment_status">
						<option value="1" <?php if(!empty($single) && $single->payment_status == "1"){?>selected="selected"<?php }?>>Success</option>
						<option value="0" <?php if(!empty($single) && $single->payment_status == "0"){?>selected="selected"<?php }?>>Failed</option>
					  </select>
                    </div>
					</div> 
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Payment Date *</label>
                      <input type="text" readonly class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Payment Date"  value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->payment_date));}?>">
					  </div>
					</div>
					
					<div class="col-md-3">
					<div class="form-group">
					<label for="exampleInputConfirmPassword1">Fees *</label>
                      <input type="text" class="form-control" id="fees" name="fees" placeholder="Fees"  value="<?php if(!empty($single)){ echo $single->amount;}?>">
					  </div>
					</div>
					
					</div>
					
					
					
					
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
					
                    <button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
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
	
	$.validator.addMethod("alphabetsOnly", function(value, element) {
		return /^[a-zA-Z_ ]+$/.test(value);
	});


	$('#single_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			student_name: {
				required: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,
			},
			father_name:{
				required: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,
			},
			mother_name:{
				required: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,
			},
			date_of_birth:{
				required: true,
			},
			id_number:{
				required: true,
				noSpaceatfirst:true,
				number:true,
			},
			nationality:{
				required: true,
				noSpaceatfirst:true,
				alphabetsOnly:true,
			},
			employment_details:{
				required: true,
			},
			noc:{
				required: true,
			},
			category:{
				required: true,
			},
			gender:{
				required: true,
			},
			current_address:{
				required: true,
			},
			password:{
				required: true,
				noSpaceatfirst:true,
			},
			email: {
				required: true,
				validate_email: true,
			},
			mobile: {
				required: true,
				number: true,
			},
			payment_id: {
				required: true,
				number: true,
			},
			payment_status: {
				required: true,
			},
			payment_date: {
				required: true,
			},
			fees: {
				required: true,
				number: true,
			},
			stream: {
				required: true, 
			},
		},
		messages: {
			student_name: {
				required: "Please enter student name",
				noSpaceatfirst:"First letter can't be space",
				alphabetsOnly:'Student name must contain only alphabets',
			},
			father_name:{
				required: "Please enter father name",
				noSpaceatfirst:"First letter can't be space",
				alphabetsOnly:'Father name must contain only alphabets',
			},
			mother_name:{
				required: "Please enter mother name",
				noSpaceatfirst:"First letter can't be space",
				alphabetsOnly:'Mother name must contain only alphabets',
			},
			date_of_birth:{
				required: "Please select date of birth",
			},
			id_number:{
				required: "Please enter id number",
				noSpaceatfirst:"First letter can't be space",
				number:"Please enter valid id number",
			},
			nationality:{
				required: "Please enter nationality",
				noSpaceatfirst:"First letter can't be space",
				alphabetsOnly:'Nationality must contain only alphabets',
			},
			employment_details:{
				required: "Please select employment details",
			},
			noc:{
				required: "Please upload noc",
			},
			category:{
				required: "Please select category",
			},
			gender:{
				required: "Please select gender",
			},
			current_address:{
				required: "Please enter address",
				noSpaceatfirst:"First letter can't be space",
			},
			password:{
				required: "Please enter password",
				noSpaceatfirst:"First letter can't be space",
			},
			email: {
				required: "Please enter email",
				validate_email: "Please eneter valid email",
			},
			mobile: {
				required: "Please enter contact number",
				number: "Please enter valid contact number",
			},
			payment_id: {
				required: "Please enter payment id",
				number: "Please enter valid payment id",
			},
			payment_status: {
				required: "Please select payment status",
			},
			fees: {
				required: "Please enter fees",
				number: "Please enter valid fees",
			},
			payment_date: {
				required: "Please select payment date",
			},
			stream: {
				required: "Please select stream",
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
$("#payment_id").keyup(function(){  
	var payment_id = $("#payment_id").val();
	if(payment_id.trim() != ""){
		$.ajax({
			type: "POST",
			url: "<?=base_url();?>admin/Ajax_controller/get_unique_phd_payment",
			data:{'payment_id':$("#payment_id").val(),'id':'<?=$id?>'},
			success: function(data){
				if(data == "0"){
					$("#payment_id_error").html('');
				}else{
					$("#payment_id_error").html('this payment is already used');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
			}
		});	
	}else{
		$("#payment_id_error").html('');
	}
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
 </script>
 