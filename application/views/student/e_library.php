<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body e-lib-btns">
                  <h4 class="card-title">E-Library</h4>
                  <p class="card-description">
                    Please find books
                  </p>
					<a class="btn btn-primary cust-ebtn" href="https://ndl.iitkgp.ac.in/" target="_blank">MHRD Library</a>
					<a class="btn btn-primary cust-ebtn" href="https://openlibrary.org/" target="_blank">Digital Library</a>
					<a class="btn btn-primary cust-ebtn" href="http://ebooksgo.org/" target="_blank">Ebooksgo Library</a>
					<a class="btn btn-primary cust-ebtn" href="<?=base_url('video_list'); ?>" >Video Library</a>
					<a class="btn btn-primary cust-ebtn" href="<?=base_url('e_book_list'); ?>" >E-Book Library</a>
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
	});
	
$("#old_password").keyup(function(){
	$.ajax({
	   type: "POST",
	   url: "<?=base_url();?>student/Student_controller/get_old_password",
	   data:{'old_password':$("#old_password").val()},
	   success: function(data){console.log(data);
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
 
