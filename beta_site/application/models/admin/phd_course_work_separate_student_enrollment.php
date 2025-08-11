<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  
                <h1>Ph.D Course Work Form</h1>
						<p>Research / Course Work Form</p>
                  <form class="forms-sample" name="form_verification" id="form_verification" method="post" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="personal_details">
                            <h3>Enrollment Verification</h3>
                            <small>Please provide your enrollment number</small>
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Enter Your Enrollment Number<span class="req">*</span></label>
                            <input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter your enrollment number">
							<div class="email_error error"></div>
						</div>
                    </div>				
						
					</div>
					<div class="row">
						
					</div>
                    <label></label>
                    <button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Continue</button>
                    <div class="pull-right">
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
jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	

jQuery.validator.addMethod("noHTMLtags", function(value, element){
	if(this.optional(element) || /<\/?[^>]+(>|$)/g.test(value)){
		if(value == ""){
			return true;
		}else{
			return false;
		}
	} else {
		return true;
	}
}, "HTML tags are Not allowed.");

$('#form_verification').validate({
	rules: {
		enrollment_number: {
			required: true,
			noHTMLtags:true
		},
		
	},
	messages: {
		enrollment_number: {
			required: "Please enter your enrollment number",
			noHTMLtags:"HTML tags not allowed!",
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
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"
	});
} ); 
  
$('#enrollment_number').keyup(function(){
	
        var t = $.trim($(this).val())   
		$.ajax({
			type: "POST",
			url: "<?=base_url();?>admin/Ajax_controller/get_unique_enrollment",
			data:{'enrollment_number': t,'id':$("#hidden_id").val()},
			success: function(data){
				if(data == "0"){                    
					$(".email_error").text('');
					$("#generate").attr('disabled',false);
				}else{
					$(".email_error").text('This enroll is already added.');
					$("#generate").attr('disabled',true);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			},
		}); 
	});
</script>
 