<?php include('header.php');?>
<?php include('sidebar.php');?>
<section>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="well col-md-offset-3 col-md-12">
                    <form class="card-form" method="post" id="add-employee" name="add-employee" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="form-cart-heading">
							<div class="row">
								<div class="col-lg-8">
									<?php if($this->uri->segment(2) != ''){?>
										<h2 class="table-title add_customer">Update Agent</h2>
									<?php }else{?>
										<h2 class="table-title add_customer">Personal Details : </h2>
									<?php }?>
								</div>
								<!-- <div class="col-lg-4 text-right">
									<a class="text-white btn btn-primary bg-theme" href="<?=base_url();?>employee-list"> View List</a> 
								</div> -->
							</div>
						</div>
                        <hr>
                        <div id="form-content" class="row">
                            <div class="form-group col-lg-4">
                                <label for="full_name">Name <span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text" placeholder="Please enter name" name="name" id="name" value="<?php if(!empty($single)){ echo $single->name;}?>">
                                <input class="form-control" type="hidden" name="hidden_id" id="hidden_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
							</div>
                            <!-- <div class="form-group col-lg-4">
                                <label for="parent_name">Agent Code<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text" placeholder="Please enter agent Code" name="agent_code" id="agent_code" value="<?php if(!empty($single)){ echo $single->agent_code;}?>">
                            </div> -->
                            <div class="form-group col-lg-4">
                                <label for="aadhar_no">Insurance Company Name <span class="p-1 star-color">*</span></label>
                                <input class="form-control" placeholder="Please enter insurance company Name" type="text" name="insurance_company_name" id="insurance_company_name" value="<?php if(!empty($single)){ echo $single->insurance_company_name;}?>">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="email">Email<span class="p-1 star-color">*</span></label>
                                <input class="form-control email"  placeholder="Please enter email" type="text" name="email" id="email" value="<?php if(!empty($single)){ echo $single->email;}?>">
								<div class="email_error p-1 star-color"></div>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="email">Password<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text" placeholder="Please enter password" name="password" id="password" value="<?php if(!empty($single)){ echo $single->password;}?>">
							
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="number">Mobile Number<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text"  placeholder="Please enter mobile number" name="mobile_number" id="mobile_number" value="<?php if(!empty($single)){ echo $single->mobile;}?>">
                                <div class="mobile_error  p-1 star-color"></div>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="parent_name">Alternate  Number<span class="p-1 star-color"></span></label>
                                <input class="form-control" type="text" placeholder="Please enter alternate number" name="alternate_number" id="alternate_number" value="<?php if(!empty($single)){ echo $single->alternate_number;}?>">
                                <div class="parent_error error"></div>
                            </div>
                           <div class="form-group col-lg-4">
                                <label for="employee_id">Address<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text" name="address" placeholder="Please enter address" id="address" value="<?php if(!empty($single)){ echo $single->address;}?>">
                            </div>
							<div class="form-group col-lg-4">
                            <label for="full_name">State <span class="p-1 star-color">*</span></label>
                                    <select class="form-control" name="state" id="state">
                                    <option value="">Select State</option>
									<?php if(!empty($state)){foreach($state as $state_result){?>
										<option value='<?=$state_result->id;?>' <?php if(!empty($single) && $single->state_id == $state_result->id){?>selected<?php }?>><?=$state_result->state_name;?></option>
									<?php }}?>
                                    </select>
                            </div>
                            <div class="form-group col-lg-4">
                            <label for="full_name">City <span class="p-1 star-color">*</span></label>
                                    <select class="form-control" name="city" id="city">
                                    <option value="">Select City</option>
									<?php if(!empty($city)){foreach($city as $city_result){?>
										<option value='<?=$city_result->id;?>' <?php if(!empty($single) && $single->city_id == $city_result->id){?>selected="selected"<?php }?>><?=$city_result->citie_name;?></option>
									<?php }}?>
                                    </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="number">Pincode Number<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text"  placeholder="Please enter pincode number" name="pincode" id="pincode" value="<?php if(!empty($single)){ echo $single->pincode;}?>">
                                <div class="mobile_error error p-1 star-color"></div>
                            </div>
                           <div class="form-group col-lg-4">
                                <label for="number">Pancard Number<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text"  placeholder="Please enter pancard number" name="pancard" id="pancard" value="<?php if(!empty($single)){ echo $single->pancard;}?>">
                                <div class="pancard_error error p-1 star-color"></div>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="aadhar_no">Aadhaar Number<span class="p-1 star-color">*</span></label>
                                <input class="form-control" placeholder="Please enter aadhaar number" type="text" name="aadhar_no" id="aadhar_no" value="<?php if(!empty($single)){ echo $single->aadhar_number;}?>">
                                <div class="aadhar_error error p-1 star-color"></div>
                            </div>
                           <div class="form-group col-lg-4">
                                <label for="choose_file">Upload Aadhaar Copy<span class="p-1 star-color"></span></label>
                                <input class="form-control" type="file" name="aadhar_photo" id="aadhar_photo">
                                <input class="form-control" type="hidden" name="old_aadhar_photo" id="old_aadhar_photo" value="<?php if(!empty($single)){ echo $single->aadhar_photo;}?>">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="aadhar_photo">Upload Pancard copy<span class="p-1 star-color"></span></label>
                                <input class="form-control" type="file" name="pan_file" id="pan_file">
                                <input class="form-control" type="hidden" name="old_pan_file" id="old_pan_file" value="<?php if(!empty($single)){ echo $single->pan_file ;}?>">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="choose_file">Upload Photo<span class="p-1 star-color"></span></label>
                                <input class="form-control" type="file" name="userfile" id="userfile">
                                <input class="form-control" type="hidden" name="old_userfile" id="old_userfile" value="<?php if(!empty($single)){ echo $single->userfile;}?>">
                            </div><br><br><br><br>
                            <div class="form-group col-lg-12"></div>
                            <div class="form-group col-lg-12">
                            <h2 class="table-title add_customer">Bank Details: </h2>
                                    </div>
                            <div class="form-group col-lg-4">
                                <label for="aadhar_no">Account Number<span class="p-1 star-color"></span></label>
                                <input class="form-control" placeholder="Please enter account number" type="text" name="account_number" id="account_number" value="<?php if(!empty($single)){ echo $single->account_number;}?>">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="full_name">Account Holder Name <span class="p-1 star-color"></span></label>
                                <input class="form-control" type="text" placeholder="Please enter account holder name" name="account_name" id="account_name" value="<?php if(!empty($single)){ echo $single->account_name;}?>">
                                <input class="form-control" type="hidden" name="hidden_id" id="hidden_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
							</div>
                            <div class="form-group col-lg-4">
                                <label for="full_name">Bank Name <span class="p-1 star-color"></span></label>
                                <input class="form-control" type="text" placeholder="Please enter bank name" name="bank_name" id="bank_name" value="<?php if(!empty($single)){ echo $single->bank_name;}?>">
                                <input class="form-control" type="hidden" name="hidden_id" id="hidden_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
							</div>
                            <div class="form-group col-lg-4">
                                <label for="full_name">IFSC Code <span class="p-1 star-color"></span></label>
                                <input class="form-control" type="text" placeholder="Please enter ifsc code" name="ifsc_code" id="ifsc_code" value="<?php if(!empty($single)){ echo $single->ifsc_code;}?>">
                                <input class="form-control" type="hidden" name="hidden_id" id="hidden_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
							</div>
                            <div class="form-group col-lg-4">
                                <label for="full_name">Branch Name <span class="p-1 star-color"></span></label>
                                <input class="form-control" type="text" placeholder="Please enter branch name" name="branch_name" id="branch_name" value="<?php if(!empty($single)){ echo $single->branch_name;}?>">
                                <input class="form-control" type="hidden" name="hidden_id" id="hidden_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
							</div>
                        </div>
                        <!-- <div class="form-group">
                            <button type="submit" class="btn btn-primary bg-theme">Add </button>
                        </div> -->
                        <div class="btn-group">
                            <button type="submit" id="save_employee" class="btn btn-primary bg-theme">
								<?php if($this->uri->segment(2) != ''){?>
									Update
								<?php }else{?>
									Save
								<?php }?>
							</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>
<script>
    $.validator.addMethod("validadhar", function(value, element) {
        return this.optional(element) || /^[1-9][0-9]*$/.test(value);
	
    }, "Please enter a valid aadhaar number");

    $.validator.addMethod("alphabetscaps", function(value, element) {
        return this.optional(element) || /^[a-z\d\-_\s]+$/i.test(value);
    });


    $.validator.addMethod("space", function(value, element) {
        return this.optional(element) ||  /^\S/i.test(value);
    });

    $.validator.addMethod("text_name", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
	
    }); 
    jQuery.validator.addMethod("validate_email", function(value, element) {
  if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
    return true;
  } else {
    return false;
  }
}, "Please enter a valid Email.");
    $.validator.addMethod("all_zero", function(value, element) {
        return this.optional(element) ||  /^[1-9][0-9]*$/i.test(value);
    });

    jQuery.validator.addMethod("validate_pan", function(value, element) {

if (/[A-Z]{5}\d{4}[A-Z]{1}/.test(value)) {
   return true;
}else {
   return false;
}

}, "Please enter a valid pancard number");
//   jQuery.validator.addMethod("validate_ifsc", function(value, element) {

// if ("^[A-Z]{4}\{0}[A-Z]{6}/".test(value)) {
//    return true;
// }else {
//    return false;
// }

// }, "Please enter valid ifsc code");
jQuery.validator.addMethod("validate_ifsc", function(value, element) {

if (/[A-Z]{4}\d{0}[A-Z0-9]{6}/.test(value)) {
   return true;
}else {
   return false;
}

}, "");
	$(function () {
        $("form[name='add-employee']").validate({
            rules: {
                name: {
        required: true,
        alphabetscaps:true,
        space:true,
        text_name:true,
    },
    agent_code: {
        required: true,
        number: true,
    },
    email: {
        required: true,
        validate_email: true,
        space:true,
        //all_zero:true,
    },
    mobile_number: {
        required: true,
        number: true,
        minlength: 10,
        maxlength: 10,
        space:true,
        all_zero:true,
    },
    alternate_number: {
        // number: true,
        // minlength: 10,
        // maxlength: 10,
        space:true,
        all_zero:true,
    },
    pincode: {
        required: true,
        number: true,
        minlength: 6,
        maxlength: 6,
     },
    account_number: {
        maxlength: 14,
        number: true,
        space:true,
        all_zero:true,
    },
    address: {
        required: true,
    },
    state: {
        required: true,
    },	

    city: {
        required: true,
    },
    aadhar_number: {
        required: true,
        number: true,
        minlength: 12,
        maxlength: 12,
     },
    insurance_company_name: {
        required: true,
        alphabetscaps:true,
        space:true,
        text_name:true,
    },
    pancard: {
				required:true,
				validate_pan:true,
			},
   password:{
        required: true,
        space:true,
       // all_zero:true,
    },
    bank_name: {
        alphabetscaps:true,
        space:true,
        text_name:true,
    },
    account_name: {
        alphabetscaps:true,
        space:true,
        text_name:true,
    },
   branch_name: {
        alphabetscaps:true,
        space:true,
        text_name:true,
    },
    ifsc_code: {
        maxlength: 11,
       // validate_ifsc:true,
      },
    // pan_file:{
    //     required: true,
    // },
    // <?php if(empty($single->adhar_card)){?>
    // aadhar_photo:{
    //     required: true,
    // },
    <?php } ?>
    
    aadhar_no:{
        required: true,
        validadhar:true,
        number: true,
        minlength: 12,
        maxlength: 12,
     },
    <?php if(empty($single->photo)){?>
        // userfile:{
        //     required: true,
        // },
    <?php }?>
},
messages: {
    name: {
        required: "Please enter  name",
        alphabetscaps:"please enter valid  name",
        space:"please enter valid  name",
        text_name:"please enter valid  name",

    },
    bank_name: {
        required: "Please enter bank name.",
        alphabetscaps:"please enter valid bank name",
        space:"please enter valid bank name",
        text_name:"please enter valid bank name",

    },
    account_name: {
        required: "Please enter account name.",
        alphabetscaps:"please enter valid account name",
        space:"please enter valid account name",
        text_name:"please enter valid account name",

    },
    branch_name: {
        required: "Please enter branch name.",
        alphabetscaps:"please enter valid account name",
        space:"please enter valid account name",
        text_name:"please enter valid account name",

    },
    insurance_company_name: {
        required: "Please enter insurance company name",
        alphabetscaps:"Please enter insurance company name",
        space:"Please enter insurance company name",
        text_name:"Please enter insurance company name",
    },
    ifsc_code: {
       
        maxlength: "Please enter   valid ifsc code",
        validate_ifsc:"Please enter valid ifsc  code ",
      
    },
    agent_code: {
        required: "Please enter agent code ",
        digits:"please enter valid agent code",
    },
    email: {
        required: "Please enter email",
        email: "Please enter valid email.",
        space:"please enter valid email ",
        all_zero:"please enter valid email ",
    },
    alternate_number: {
        required: "Please enter alternate number",
        digits: "Please enter valid alternate number",
        minlength: "Please enter valid alternate number",
        maxlength: "Please enter valid alternate number",
        space:"please enter valid alternate number",
        all_zero:"please enter valid alternate number.",
    },
    mobile_number: {
        required: "Please enter  mobile number",
        digits: "Please enter valid mobile number",
        minlength: "please enter valid  mobile number",
        maxlength: "please enter valid  mobile number",
        space:"please enter valid mobile number",
        all_zero:"please enter valid mobile number",
    },
    pincode: {
        required: "Please enter  pincode",
        digits: "Please enter valid pincode number",
        minlength: "please enter valid  pincode number",
        maxlength: "please enter valid  pincode number",
        space:"please enter valid pincode number",
        all_zero:"please enter valid pincode number",
    },
    account_number: {
        required: "Please enter  account number.",
        number: "Please enter valid account number.",
        maxlength: "please enter valid  account number",
        space:"please enter valid account number",
        all_zero:"please enter valid account number",
    },
    pancard: {
				required: "Please enter pancard number",
				required: "Please enter pancard number",
			},
    aadhar_number: {
        required: "Please enter  aadhar number",
        number: "Please enter valid aadhar number",
        minlength: "please enter valid  aadhar number",
        maxlength: "please enter valid  aadhar number",
        
    },
    address: {
        required: "Please enter address",
    },
    state: {
        required: "Please select state",
    },
    city: {
        required: "Please select city",
    },
                password: {
                    required: "Please enter password",
                    space:"please enter valid password",
                    all_zero:"please enter valid password",
                },
                userfile: {
                    required: "Please upload  photo",
                },
                aadhar_photo: {
                    required: "Please upload aadhar photo",
                },
                pan_file: {
                    required: "Please upload pancard photo",
                },
                aadhar_no: {
                    required: "Please enter aadhaar number",
                    validadhar:"please enter valid adhaar number",
                    number:"please enter valid adhaar number",
                },

            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>
<script>
$("#state").change(function(){
    var state =$("#state").val();
    $.ajax({
    type: "POST",
    url: "<?=base_url();?>admin/Ajax_controller/get_city_ajax",
    data:{'state':$("#state").val()},
    success: function(data){ 
        alert(data),
    $("#city").empty();
    $('#city').append('<option value="">Select City</option>');
    var opts = $.parseJSON(data);
    $.each(opts, function(i, d) {
    $('#city').append('<option value="' + d.id + '">' + d.citie_name + '</option>');
    });
    $('#city').trigger('change');
    },
    error: function(jqXHR, textStatus, errorThrown) {

    console.log(textStatus, errorThrown);
    }
    });	
});
	$('.email').keyup(function(){       
		$.ajax({
			type: "POST",
			url: "<?=base_url();?>admin/Ajax_controller/get_exist_registered_email",
			data:{'email':$("#email").val(),'id':$("#hidden_id").val()},
			success: function(data){
				if(data == "0"){                   
					$(".email_error").text('');
					$("#save_employee").attr('disabled',false);
				}else{
					$(".email_error").text('This email is already registered.');
					$("#save_employee").attr('disabled',true);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			},
		}); 
	});
	
    $('#mobile_number').keyup(function(){       
		$.ajax({
			type: "POST",
			url: "<?=base_url();?>admin/Ajax_controller/get_exist_mobile_number",
			data:{'mobile_number':$("#mobile_number").val(),'id':$("#hidden_id").val()},
			success: function(data){
               
				if(data == "0"){                   
					$(".mobile_error").text('');
					$("#save_employee").attr('disabled',false);
				}else{
					$(".mobile_error").text('This mobile is already registered.');
					$("#save_employee").attr('disabled',true);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			},
		}); 
	});

    $('#aadhar_no').keyup(function(){       
		$.ajax({
			type: "POST",
			url: "<?=base_url();?>admin/Ajax_controller/get_exist_aadhar_no",
			data:{'aadhar_no':$("#aadhar_no").val(),'id':$("#hidden_id").val()},
			success: function(data){
               
				if(data == "0"){                   
					$(".aadhar_error").text('');
					$("#save_employee").attr('disabled',false);
				}else{
					$(".aadhar_error").text('This aadhaar is already registered.');
					$("#save_employee").attr('disabled',true);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			},
		}); 
	});
    
    $('#pancard').keyup(function(){       
		$.ajax({
			type: "POST",
			url: "<?=base_url();?>admin/Ajax_controller/get_exist_pancard_no",
			data:{'pancard':$("#pancard").val(),'id':$("#hidden_id").val()},
			success: function(data){
               
				if(data == "0"){                   
					$(".pancard_error").text('');
					$("#save_employee").attr('disabled',false);
				}else{
					$(".pancard_error").text('This pancard is already registered.');
					$("#save_employee").attr('disabled',true);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			},
		}); 
	});

    $('#parent_mobile_number').keyup(function(){ 

        
     var mob =  $("#mobile_number").val();
     parent =   $('#parent_mobile_number').val();
     
        if(mob == parent){          
            $(".parent_error").text('This mobile number is already Added please add another one.');
					$("#save_employee").attr('disabled',true);   					
				}else{
                    $(".parent_error").text('');
					$("#save_employee").attr('disabled',false);
					
				} 
	});
	
	$(".toggle-password").click(function () {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

   $('#employee').closest('.cust-dropdown').show();
$('#employee').addClass('active_red');

$("#date_of_joining").change(function(){
var joining_date =  $("#date_of_joining").val();
document.getElementById("contract_end_date").setAttribute("min", joining_date);

});



</script>