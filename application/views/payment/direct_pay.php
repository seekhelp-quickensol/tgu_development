<?php include("header.php");redirect(base_url());?> <style>.panel-heading {    padding: 5px 15px;}-primary>.panel-heading {    color: #fff;    background-color: #0959a9 !important;    border-color: #ed143d;}.top-cls{	border: 2px solid #ed143d;		margin-top:10px;	margin-bottom:10px;}.panel-primary>.panel-heading {    color: #fff;    background-color: #ed143d;    border-color: #ed143d;}</style>
<div class="header_cc_area" style="background-image:url('<?=$this->Digitalocean_model->get_photo('images/header_area.jpg')?>')"> 
				<div class="container"> 
					<div class="row"> 
						<h1>Online Payment Form</h1> 
						<p>Payment / Payment Form</p> 
					</div> 
				</div> 
			</div> 
<div class="uni_mainWrapper"> 
	<div class="container"> 
		<div class="row">	 
			<div class="container"> 
				<div class="online_wrapper">   
						<div class="col-md-6 col-md-offset-3 top-cls"> 
							<form method="post" name="payment_form" id="payment_form" enctype="multipart/form-data"> 
								<div class="row"> 
									<div class="col-md-12"> 
										<div class="personal_details"> 
											<h3>Online Payment Form</h3> 
											<hr> 
										</div> 
									</div> 
								</div> 
								<div class="row edu"> 									<div class="panel panel-primary">										<div class="panel-heading">Transaction Details</div>									</div>									<div class="col-md-4"> 										<div class="form-group"> 											<label>Pay For<span class="req">*</span></label> 											<select name="pay_for" id="pay_for" required class="form-control"> 												<option value="">Select</option>												<?php if(!empty($head)){ foreach($head as $head_result){?>																								<option value="<?=$head_result->id?>"><?=$head_result->head_name?></option> 												<?php }}?>											</select> 										</div> 									</div>  									<div class="col-md-4"> 										<div class="form-group"> 											<label>ID/Enrollment Number</label> 											<input type="text" name="registration_number" id="registration_number" class="form-control" placeholder="Enter Your Registration Number"> 										</div> 									</div>	
									<div class="col-md-4">										<div class="form-group">											<label>Enter Amount<span class="req">*</span></label>											<input type="text" name="amount" id="amount" required class="form-control number_only" placeholder="Enter Amount">										</div>									</div>									</div>									<div class="row edu"> 									<div class="panel panel-primary">										<div class="panel-heading">Billing Address</div>									</div>  
									<div class="col-md-4">										<div class="form-group">											<label>Enter Your Name<span class="req">*</span></label>											<input type="text" name="name" id="name" required class="form-control" placeholder="Enter Your Name">											<div id="mobile_otp_error"></div>										</div>									</div>									<div class="col-md-4"> 
										<div class="form-group"> 
											<label>Enter Your Mobile Number<span class="req">*</span></label> 
											<input type="text" name="mobile_number" id="mobile_number" required class="form-control number_only" placeholder="Enter Your Mobile Number"> 
										</div> 
									</div> 
									<div class="col-md-4"> 
										<div class="form-group"> 
											<label>Enter Your Email<span class="req">*</span></label>
											<input type="text" name="email" id="email" required class="form-control number_only" placeholder="Enter Your Email">
										</div>
									</div>
									<div class="col-md-4"> 
										<div class="form-group"> 
											<label>Enter Your Address<span class="req">*</span></label> 
											<input type="text" name="address" id="address" required class="form-control" placeholder="Enter Your Address"> 
										</div> 
									</div> 
									<div class="col-md-4"> 
										<div class="form-group"> 
											<label>Enter Your Pincode<span class="req">*</span></label> 
											<input type="text" name="pincode" id="pincode" required class="form-control number_only" placeholder="Enter Your Pincode"> 
										</div> 
									</div>   
									<div class="col-md-4">										<div class="form-group"> 
											<label>Remark(if any)</label> 
											<input type="text" name="remark" id="remark" class="form-control" placeholder="Enter Remark"> 
										</div> 
									</div>  
								</div> 
								<div class="row"> 
									<div class="col-md-2 edu"> 
										<strong>Captcha <span class="req">*</span></strong> 
									</div> 
									<div class="col-md-6 edu"> 
										<div class="form-group"> 
										<div class="g-recaptcha" data-sitekey="6Ld04bQZAAAAAESEZ2t9Z8jge9k860wPt59Pcwus"></div> 
										</div> 
									</div> 
								</div> 
								<div class="row"> 
									<div class="col-md-12 edu"> 
										<div class="form-group"> 
											<label></label> 
											<button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Pay Now</button> 
											<div class="pull-right"> 
											</div> 
										</div> 
									</div>	 
								</div>  
							</form> 
						</div> 
						<div class="clearfix"></div> 
					</div>  
				</div> 
			</div> 
		</div> 
	</div> 
</div>


<?php include("footer.php");?>

<script>$("#pay_for").change(function(){	$.ajax({		type: "POST",		url: "<?=base_url();?>web/Web_controller/get_head_payment",		data:{'pay_for':$("#pay_for").val()},		success: function(data){ 			   $('#amount').val(data); 		},		 error: function(jqXHR, textStatus, errorThrown) {		   console.log(textStatus, errorThrown);		}	});	});
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

$("#payment_form").validate({
	rules: {
		registration_number: {noHTMLtags:true},		
		name: {required:true,noHTMLtags:true},		
		mobile_number: {required:true,number:true,minlength:10,maxlength:12,noHTMLtags:true},		
		email: {required:true,validate_email:true,noHTMLtags:true},	
		address: {required:true,noHTMLtags:true},		
		pincode: {required:true,number:true,minlength:6,maxlength:6,noHTMLtags:true},
		amount: {required:true,number:true,noHTMLtags:true},
		pay_for: {required:true,noHTMLtags:true},		
	},
	messages: {
		registration_number: {
			noHTMLtags: "HTML tags not allowed!",
		},	
		name: {
			required:"Please enter name",
			noHTMLtags: "HTML tags not allowed!",
		},		
		mobile_number: {
			required:"Please enter mobile number",
			number:"Please enter only number",
			minlength:"Please enter 10 to 12 digit mobile number.",
			maxlength:"Please enter 10 to 12 digit mobile number.",
			noHTMLtags: "HTML tags not allowed!",
		},
		email: {
			required:"Please enter email",
			validate_email:"Please enter valid email",
			noHTMLtags: "HTML tags not allowed!",
		},
		address: {
			required:"Please enter address",
			noHTMLtags: "HTML tags not allowed!",
		},		
		pincode: {required:"Please enter pincode",number:"Please enter valid pincode",minlength:"Please enter valid pincode",maxlength:"Please enter valid pincode",noHTMLtags: "HTML tags not allowed!",},
		amount: {required:"Please enter amount",number:"Please enter valid amount",noHTMLtags: "HTML tags not allowed!",},
		pay_for: {
			required:"Please select pay for",
			noHTMLtags: "HTML tags not allowed!",
		},		
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});
</script>