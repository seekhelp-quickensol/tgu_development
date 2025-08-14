<?php include('faculty_header.php');?>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Password Setting</h4>
                  <p class="card-description">
                    Please enter your password
                  </p>
                  <form class="forms-sample" name="password_form" id="password_form" method="post">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Old Password *</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
						<div class="error" id="password_error"></div>
						<span style="display:none;" for="old_password" generated="true" class="error invalid-feedback" style="display: inline;">Please enter your old password</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-4 col-form-label">New Password *</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
						<span style="display:none;" for="new_password" generated="true" class="error invalid-feedback" style="display: inline;">Please enter your new password</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-4 col-form-label">Confirm Password *</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
						<span style="display:none;" for="confirm_password" generated="true" class="error invalid-feedback" style="display: inline;">Please enter confirm password</span>
                      </div>
                    </div>
                    <button type="submit" name="password_submit" value="password_submit" class="btn btn-primary mr-2 password_submit">Submit</button>
                    
					<input type="hidden" name="contact_number_val" id="contact_number_val" value="0">
					<input type="hidden" name="email_val" id="email_val" value="0">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      
<?php include('footer.php');?>
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#password_form').validate({
		rules: {
			old_password: {
				required: true,
			},
			new_password: {
				required: true,
			},
			confirm_password: {
				required: true,
				equalTo:"#new_password",
			},
		},
		messages: {
			old_password: {
				required: "Please enter your old password",
			},
			new_password: {
				required: "Please enter your new password",
			},
			confirm_password: {
				required: "Please enter confirm password",
				EqualTo: "Password does not match",
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
	$('#profile_form').validate({
		rules: {
			first_name: {
				required: true,
			},
			last_name: {
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
			address: {
				required:true,
			},
		},
		messages: {
			first_name: {
				required: "Please enter your first name",
			},
			last_name: {
				required: "Please enter your last name",
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
			address: {
				required: "Please enter address",
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
$("#old_password").keyup(function(){
	$.ajax({
	   type: "POST",
	   url: "<?=base_url();?>admin/Ajax_controller/get_old_paasword_faculty",
	   data:{'old_password':$("#old_password").val()},
	   success: function(data){
		 if(data == "0"){
			 $(".password_submit").hide();
			 $("#password_error").html("Password does not match");
		 }else{
			 $(".password_submit").show();
			 $("#password_error").html("");
		 }
	   },
	  error: function(jqXHR, textStatus, errorThrown) {
		console.log(textStatus, errorThrown);
	   }
	});  
}); 
 </script>
 