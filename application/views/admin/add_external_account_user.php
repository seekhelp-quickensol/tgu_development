<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Setting
				  <a href="<?=base_url();?>list_account_team" class="btn btn-primary mr-2 float-right">View List</a>
				  </h4>
                  <p class="card-description">
                    Please enter user details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Full Name *</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Please enter full name" value="<?php if(!empty($single)){ echo $single->name;}?>">
                      <input type="hidden" class="form-control" id="id" name="id"  value="<?php if(!empty($single)){ echo $single->id;}?>">
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email *</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Please enter email" value="<?php if(!empty($single)){ echo $single->email;}?>">
					   <div class="error" id="email_error"></div>
                    </div>
					</div> 
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Mobile Number *</label>
                      <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="<?php if(!empty($single)){ echo $single->mobile_number;}?>">
					  <div class="error" id="contact_number_error"></div>
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Alternate Number</label>
                      <input type="text" class="form-control" id="alternate_number" name="alternate_number" placeholder="Alternate Number" value="<?php if(!empty($single)){ echo $single->alternate_number;}?>">
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Password *</label>
                      <input type="text" class="form-control" id="password" name="password" placeholder="Please enter password" value="<?php if(!empty($single)){ echo $single->password;}?>">
					 
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Address </label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php if(!empty($single)){ echo $single->address;}?>">
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
      <input type="hidden" name="contact_number_val" id="contact_number_val" value="0">
      <input type="hidden" name="email_val" id="email_val" value="0">
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
	 
	$('#single_form').validate({
		rules: {
			name: {
				required: true,
			}, 
			mobile_number: {
				required: true,
				number:true,
				minlength:10,
				maxlength:12,
			},
			alternate_number: {
				number:true,
				minlength:10,
				maxlength:12,
			},
			email: {
				required:true,
				validate_email:true,
			},
			password: {
				required:true,
			}, 
		},
		messages: {
			name: {
				required: "Please enter name",
			}, 
			mobile_number: {
				required: "Please enter contact number",
				number: "Please enter valid contact number",
				minlength: "Please enter valid contact number",
				maxlength: "Please enter valid contact number",
			},
			alternate_number: {
				number: "Please enter valid alternate number",
				minlength: "Please enter valid alternate number",
				maxlength: "Please enter valid alternate number",
			},
			email: {
				required: "Please enter email",
				validate_email: "Please enter valid email",
			},
			password: {
				required: "Please enter password",
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
$("#country").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_state_ajax",
		data:{'country':$("#country").val()},
		success: function(data){
			$("#state").empty();
			$('#state').append('<option value="">Select State</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#state').append('<option value="' + d.id + '">' + d.name + '</option>');
			});
			$('#state').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#state").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_city_ajax",
		data:{'state':$("#state").val()},
		success: function(data){
			$("#city").empty();
			$('#city').append('<option value="">Select City</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#city').append('<option value="' + d.id + '">' + d.name + '</option>');
			});
			$('#city').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#email").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_acc_verification_emp_unique_email",
		data:{'email':$("#email").val(),'id':'<?=$id?>'},
		success: function(data){
			$("#email_val").val(data);
			check_avaliable();
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#mobile_number").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_acc_verification_emp_unique_contact_number",
		data:{'mobile_number':$("#mobile_number").val(),'id':'<?=$id?>'},
		success: function(data){
			$("#contact_number_val").val(data);
			check_avaliable();
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
function check_avaliable(){
	if($("#email_val").val() != "0"){
		$("#email_error").html("This email is already used, please try another.");
	}else{
		$("#email_error").html("");
	}
	if($("#contact_number_val").val() != "0"){
		$("#contact_number_error").html("This contact number is already used, please try another.");
	}else{
		$("#contact_number_error").html("");
	}
	if($("#contact_number_val").val() == "0" && $("#email_val").val() == "0"){
		$("#single_button").show();
	}else{
		$("#single_button").hide();
	}
}
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
  
  $('#image-id').change(function () {
 // alert("hello");
    var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png':
             // $('#btn_save').attr('disabled', false);
            break;
        default:
            alert('Only jpg,jpeg,png file supported');
            this.value = '';
    }
});
 </script>
 