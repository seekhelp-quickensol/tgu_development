<?php include('header.php');?>
<style>


input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}


input[type=number] {
  -moz-appearance: textfield;
}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                <h1>Ph.d Course Work Form</h1>
         <p>Research / Course Work Form</p>
         <form method="POST" name="admission_form" id="admission_form" >
                  <div class="row">
                        <div class="col-md-12">
                           <div class="common_details">
                              <div class="col-md-12">
                                 <h3>Personal Details</h3>
                                 <small>Please provide your personal details</small>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </div> 
                  <div class="row">
                    <div class="col-md-3">
                              <div class="form-group">
                                 <label>Student Name <span class="req">*</span></label>
                                 <input type="text" name="student_name" id="student_name" class="form-control charector" placeholder="Student Full Name" value="<?php if(!empty($stu_data)){echo $stu_data->student_name;}?>"  readonly>
                                 <input type="hidden" name="student_no" id="student_no" class="form-control" value="<?php if(!empty($stu_data)){echo $stu_data->id;}?>"  readonly>
                              </div>
                           </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                 <label>Father's Name <span class="req">*</span></label>
                                 <input type="text" name="father_name" id="father_name" class="form-control charector" placeholder="Fathers Name" value="<?php if(!empty($stu_data)){echo $stu_data->father_name;}?>" readonly>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Mother's Name <span class="req">*</span></label>
                                 <input type="text" name="mother_name" id="mother_name" class="form-control charector" placeholder="Mothers Name" value="<?php if(!empty($stu_data)){echo $stu_data->mother_name;}?>" readonly>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Date of Birth <span class="req">*</span></label>
                                 <input type="text" name="date_of_birth" id="date_of_birth" class="form-control " placeholder="DD-MM-YY" value="<?php if(!empty($stu_data)){echo date("d-m-Y",strtotime($stu_data->date_of_birth));}?>" readonly>
                              </div>
                           </div>
				
					</div>
               <div class="row">
                        
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Mobile Number <span class="req">*</span></label>
                                 <input autocomplete="off" type="text" name="mobile" id="mobile" class="form-control number_only" placeholder="Mobile Number" maxlength="10" minlength="10" value="<?php if(!empty($stu_data)){echo $stu_data->mobile;}?>" readonly>
                                 <div class="error" id="mobile_error"></div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Email ID <span class="req">*</span></label>
                                 <input autocomplete="off" type="email" name="email" id="email" class="form-control" placeholder="Email ID" value="<?php if(!empty($stu_data)){echo $stu_data->email;}?>" readonly>
                                 <div class="error" id="email_error"></div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Gender <span class="req">*</span></label>
                                 <input type="text" name="gender" class="form-control" value="<?php if(!empty($stu_data)){echo $stu_data->gender;}?>" readonly>
                              </div>
                           </div>
                        
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="common_details">
                              <div class="col-md-12">
                                 <h3>Contact Details </h3>
                                 <small>Please provide your contact details</small>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                     
                     <div class="col-md-12">
                        <label>Current Address <span class="req">*</span></label>
                        <input type="text" class="form-control rules" name="address" id="address" placeholder="Address" value="<?php if(!empty($stu_data)){echo $stu_data->address;}?>" readonly>
                     
                  </div>
               </div>
                     <div class="row">
                        
                           <!-- <div class="col-sm-3">
                              <div class="form-group">
                                 <label>Country <span class="req">*</span></label>
                                 <input type="text" class="form-control" name="country_id" value="<?php if(!empty($stu_data)){echo $stu_data->country_name;}?>" readonly>
                                 <input type="hidden" class="form-control" name="country_id" value="<?php if(!empty($stu_data)){echo $stu_data->country;}?>" readonly>
                              </div>
                           </div> -->
                           <div class="col-sm-3">
                              <div class="form-group">
                                 <label>State <span class="req">*</span></label>
                                 <input type="text" class="form-control" name="state_id"  value="<?php if(!empty($stu_data)){echo $stu_data->state;}?>" readonly>
                                 <input type="hidden" class="form-control" name="state_id"  value="<?php if(!empty($stu_data)){echo $stu_data->state;}?>" readonly>
                              </div>
                           </div>
                           <!-- <div class="col-sm-3">
                              <div class="form-group">
                                 <label>City <span class="req">*</span></label>
                                 <input type="text" class="form-control" name="city_id"  value="<?php if(!empty($stu_data)){echo $stu_data->city_name;}?>"  readonly>
                                 <input type="hidden" class="form-control" name="city_id"  value="<?php if(!empty($stu_data)){echo $stu_data->city;}?>"  readonly>
                              </div>
                           </div> -->
                           <!-- <div class="col-sm-3">
                              <div class="form-group">
                                 <label>Pin Code <span class="req">*</span></label>
                                 <input class="form-control number_only" required name="pincode" id="pincode" placeholder="PinCode" value="<?php if(!empty($stu_data)){echo $stu_data->pincode;}?>" readonly>
                              </div>
                           
                        </div> -->
                     </div>
                     <div class="common_details">
                        <div class="col-md-12">
                           <h3>Course/Programme Details</h3>
                           <small>Please enter course/programme details </small>
                        </div>
                        <div class="clearfix"></div>
                     </div>                       
                           <div class="edu">
                              <div class="row">
								 
									  <div class="col-sm-3">
										 <div class="form-group">
											<label>Enrollment Number<span class="req">*</span></label>
											<input type="text" name="enrollment_no" value="<?php if(!empty($stu_data)){echo $stu_data->enrollment_number;}?>" class="form-control" readonly>
										 </div>
									  </div>
									  <div class="col-sm-3">
										 <div class="form-group">
											<label>Schedule<span class="req">*</span></label>
											<select id="course" name="schedule" class="form-control">
											   <option value="">Select Schedule Date</option>
											   <?php foreach($schedule_dates as $date): ?>
												  <option value="<?=$date->schedule_date?>"><?=$date->schedule_date?></option>
												  <?php endforeach; ?>
											</select>
										 </div>
									  </div>
									  <div class="col-sm-3">
										 <div class="form-group">
											<label>Course <span class="req">*</span></label>
											<input type="text" name="course_id" class="form-control" value="<?php if(!empty($stu_data)){echo $stu_data->course_name;}?>" readonly>
											<input type="hidden" name="course_id" class="form-control" value="<?php if(!empty($stu_data)){echo $stu_data->course_id;}?>" readonly>
										 </div>
									  </div>
									  <div class="col-sm-3">
										 <div class="form-group">
											<label>Stream  <span class="req">*</span></label>
											<input type="text" name="stream_id" value="<?php if(!empty($stu_data)){echo $stu_data->stream_name;}?>" class="form-control" readonly>
											<input type="hidden" name="stream_id" value="<?php if(!empty($stu_data)){echo $stu_data->stream_id;}?>" class="form-control" readonly>
										 </div>
									  </div>
								
                              </div>
                              <div class="row">
								 
									  <div class="col-sm-3">
										 <div class="form-group">
											<label>Year/Sem<span class="req">*</span></label>
											<input type="text" name="year_sem" value="<?php if(!empty($stu_data)){echo $stu_data->year_sem;}?>" class="form-control" readonly>
										 </div>
									  </div>
									  <div class="col-sm-3">
										 <div class="form-group">
											<label>Date of Registration<span class="req">*</span></label>
											<input type="text" name="date_of_registration" id="date_of_registration" class="form-control" >
										 </div>									 
								     </div>
                             <div class="col-sm-3">
                             <div class="form-group">
                              <label for="exampleInputUsername1">Payment Status *</label>
                                 <select class="form-control" id="payment_status" name="payment_status">
                              <option value="">Select Mode</option>
                              <option value="1" <?php if(!empty($single) && $single->payment_status == "1"){?>selected="selected"<?php }?>>Success</option>
                              <option value="0" <?php if(!empty($single) && $single->payment_status == "0"){?>selected="selected"<?php }?>>Failed</option>
                           </select>
                        </div>
                             </div>
                              </div>
                           </div>
                           <div class="common_details">
                        <div class="col-md-12">
                           <h3>All Year Fee Details (Mandatory to fill all fee details) </h3>
                           <small>Please enter all year/ sem fee deposit details </small>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="row" >
                        <div id="contain-ammount">
                        <div class="col-md-12" id="div1">
                        <div class="row" >
                           <div class="col-sm-3">
                              <div class="form-group">
                                 <label>Bank Name <span class="req">*</span></label>
                                 <input placeholder="Bank name" type="text" id="bank_name1" name="bank_name[]" class="form-control" value="" >
                              </div>
                           </div>
                           <div class="col-sm-2 lateral_entry" >
                              <div class="form-group">
                                 <label>Payment Mode </label>
                                 <!-- <input  type="text"  name="payment_mode" id="payment_mode" class="form-control" >  -->
                                 <select name="payment_mode[]" id="payment_mode1" class="form-control">
                                    <option value="">Select</option>
                                    <option value="cash">cash</option>
                                    <option value="online">online</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="form-group">
                                 <label>Transaction No<span class="req">*</span></label>
                                 <input placeholder="Transaction No" type="text" id="transaction_no1" name="transaction_no[]" class="form-control" >
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <div class="form-group">
                                 <label>Deposit Date <span class="req">*</span></label>
                                 <input placeholder="Deposit Date " type="text" id="deposit_date1" name="deposit_date[]" class="form-control datepicker" >
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <div class="form-group">
                                 <label>Amount <span class="req">*</span></label>
                                 <input placeholder="Amount " min=1 type="number" id="amount1" name="ammount[]" class="form-control" >
                              </div>
                           </div>
                           <!-- <div class="col-sm-2">
                        
                           </div> -->
                                    </div>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <a onclick="add_more_fields()" class="btn btn-danger" style="margin-left: 15px;margin-top:10px">Add</a>
                        </div>
                     </div
                     <hr>
                     <!-- <div class="common_details">
                        <div class="col-md-12">
                           <h3>Course Work Fee is Rs. 5000.</h3>
                           <small>Please examination fee deposit details.  </small>
                        </div>
                        <div class="clearfix"></div>
                     </div> -->
                     <div class="row">
                    
                     <div class="col-sm-2">
                              <div class="form-group">
                                 <!-- <label>Amount <span class="req">*</span></label> -->
                                 <input type="text" style="display:none" class="form-control" name="payment_ammount" value="5000" readonly>
                              </div>
                           </div>
                     </div>
                     <!-- <div class="col-md-12">
                         <hr>
                        <div class="row collapseOne" style="display:none">
                           <div class="col-md-12 terms">
                              <table  class="detailTable" cellspacing="5" cellpadding="5">
                                 <tr>
                                    <td>
                                       <h4 align="justify"><b>Declaration:</b></h4>
                                       <br>
                                    </td>
                                 </tr>
                              </table>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12 terms">
                              <table  class="detailTable" cellspacing="5" cellpadding="5">
                                 <tr>
                                    <td>
                                       <br>
                                       <b>Declaration:</b>
                                       <br>
                                       <p align="justify"><b>I confirm that I have not made payment of any other amount to anybody other than deposited in the prescribed University account. </b></p>
                                       <p align="justify"><b>I solemnly declare and confirm that I am duly qualified to take admission in the course for which I have applied and all the certificates and testimonials attached with my application are true and valid. I have fully satisfied myself about the legal status of the University i.e. it is an autonomous statutory body with regulations making power for it’s functioning and the University is duly authorized and competent to take my admission in the course for which I have applied and also to award the degree / diploma as per rules and regulation of the University. I also undertake not to ever raise any objection about Universities legal status to take my admission and award degrees on qualifying prescribed examinations. I also undertake not to demand refund of fee/charges paid by me. In case of any dispute/ differences/ claim of any value settlement by University arbitration clause shall be applicable. </b></p>
                                       <p align="justify"><b>I shall always follow the rules and regulations of the University and in case of any breach thereto, I shall be liable to be penalized for the same which may include expulsion from the University. .</b></p>
                                       <br>
                                    </td>
                                 </tr>
                              </table>
                           </div>
                        </div>
                        <hr>
                     </div> -->
                     <div class="col-md-12">
                        <div class="row">
                           <div class="col-md-12 edu">
                              <div class="form-group">
                                 <!-- <input type="checkbox" name="mycheckbox" id="mycheckbox" value="0" required="required" /> <label style="color:red">Read Instructions <span class="req">*</span></label> -->
                              </div>
                           </div>
                        </div>
                        <!-- <div class="row">
                           <div class="col-md-2 edu">
                           	<strong>Captcha <span class="req">*</span></strong>
                           </div>
                           <div class="col-md-6 edu">
                           	<div class="form-group">
                           	<?php
                              if(base_url() == "https://www.tgu.com/"){
                              ?>
                           		<div class="g-recaptcha" data-sitekey="6LfinagZAAAAAKe-UpfD2RCOoBSC-lec5DcClqY1"></div>
                           	<?php }else{ ?>
                           		<div class="g-recaptcha" data-sitekey="6Ld04bQZAAAAAESEZ2t9Z8jge9k860wPt59Pcwus"></div>
                           	<?php }?>
                           	</div>
                           </div>
                           </div> -->
                        <div class="row">
                           <div class="col-md-12 edu">
                              <div class="form-group">
                                 <label></label>
                                 <input vaue="Submit" class="btn btn-primary" name="register" id="register" type="submit">
                                 <div class="pull-right">
                                 <!-- <input vaue="Reset" class="btn btn-primary"  type="reset"> -->
                                 <!-- <input vaue="Reset" class="btn btn-primary" onclick="javascript:location.reload();"  type="reset"> -->

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                    
					
                    <!-- <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> -->
                    
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
   $( function() {
       $( ".datepicker" ).datepicker({
   		dateFormat:"dd-mm-yy",
   		changeMonth:true,
   		changeYear:true,
   		// maxDate: "-12Y",
   		minDate: "-80Y",
   		yearRange: "-100:+0"
   	});
   } );
   
   
   //validation function for dynamic form fields 

   $.validator.addMethod("allBankNameRequired", function (value, element) {
	var flag = true;

	$("[name^=bank_name]").each(function (i, j) {
		$(this).parent('p').find('label.error').remove();
		$(this).parent('p').find('label.error').remove();
		if ($.trim($(this).val()) == '') {
			flag = false;

			$(this).parent('p').append('<label  id="id_ct' + i + '-error" class="error">This field is required.</label>');
		}
	});
	return flag;
   }, "");

   $.validator.addMethod("allPaymentModeRequired", function (value, element) {
	var flag = true;

	$("[name^=payment_mode]").each(function (i, j) {
		$(this).parent('p').find('label.error').remove();
		$(this).parent('p').find('label.error').remove();
		if ($.trim($(this).val()) == '') {
			flag = false;

			$(this).parent('p').append('<label  id="id_ct' + i + '-error" class="error">This field is required.</label>');
		}
	});
	return flag;
   }, "");

   $.validator.addMethod("allTransactionNumberRequired", function (value, element) {
	var flag = true;

	$("[name^=transaction_no]").each(function (i, j) {
		$(this).parent('p').find('label.error').remove();
		$(this).parent('p').find('label.error').remove();
		if ($.trim($(this).val()) == '') {
			flag = false;

			$(this).parent('p').append('<label  id="id_ct' + i + '-error" class="error">This field is required.</label>');
		}
	});
	return flag;
   }, "");

   $.validator.addMethod("allDepositDateRequired", function (value, element) {
	var flag = true;

	$("[name^=deposit_date]").each(function (i, j) {
		$(this).parent('p').find('label.error').remove();
		$(this).parent('p').find('label.error').remove();
		if ($.trim($(this).val()) == '') {
			flag = false;

			$(this).parent('p').append('<label  id="id_ct' + i + '-error" class="error">This field is required.</label>');
		}
	});
	return flag;
   }, "");

   $.validator.addMethod("allAmmountRequired", function (value, element) {
	var flag = true;

	$("[name^=ammount]").each(function (i, j) {
		$(this).parent('p').find('label.error').remove();
		$(this).parent('p').find('label.error').remove();
		if ($.trim($(this).val()) == '') {
			flag = false;

			$(this).parent('p').append('<label  id="id_ct' + i + '-error" class="error">This field is required.</label>');
		}
	});
	return flag;
   }, "");
   //ends here 
 
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
   
   function validate_form(){
      $("#admission_form").validate({
         
       ignore:'',
   	rules: {
        schedule: {
            required:true,
            noHTMLtags:true,
         },	
        date_of_registration: {
            required:true,
            noHTMLtags:true,
         },	
   		"bank_name[]":{
            required:true,
            allBankNameRequired:true,
            noHTMLtags:true,
         },
   		"payment_mode[]":{
            required:true,
            allPaymentModeRequired:true,
            noHTMLtags:true,
         },
   		"transaction_no[]":{
            required:true,
            allTransactionNumberRequired:true,
            noHTMLtags:true,
         },
   		"deposit_date[]":{
            required:true,
            allDepositDateRequired:true,
            noHTMLtags:true,
         },
   		"ammount[]":{
            required:true,
            allAmmountRequired:true,
            noHTMLtags:true,
         },

   		"mycheckbox":"required",
   					
   	},
   	messages: {
        schedule: {
            required:"Please select schedule date!",
            noHTMLtags:"HTML tags not allowed!",
         },
        date_of_registration: {
            required:"Please enter Date of Registration!",
            noHTMLtags:"HTML tags not allowed!",
         },

         "bank_name[]":{
            required:"Please enter bank name!",
            allBankNameRequired:"Please enter bank name!",
			noHTMLtags:"HTML tags not allowed!",
         },
   		"payment_mode[]":{
            required:"please select payment mode!",
            allPaymentModeRequired:"Please enter bank name!",
			noHTMLtags:"HTML tags not allowed!",
         },
   		"transaction_no[]":{
            required:"Please enter transaction no!",
            allTransactionNumberRequired:"Please enter transaction no!",
			noHTMLtags:"HTML tags not allowed!",
         },
   		"deposit_date[]":{
            required:"Please enter deposit date!",
            allDepositDateRequired:"Please enter deposit date!",
			noHTMLtags:"HTML tags not allowed!",
         },
   		"ammount[]":{
            required:"Please enter amount!",
            allAmmountRequired:"Please enter amount!",
			noHTMLtags:"HTML tags not allowed!",
         },

   		"mycheckbox":"Please confime!",
   		
   	}, 
   submitHandler: function(form){
   		form.submit();
   	} ,
   });
   }
   
   validate_form();

   $("#date_of_registration").datepicker({
       dateFormat:"dd-mm-yy",
   });
    
   var field_count = 2;
    function add_more_fields(){
        var data = `<div class="col-md-12" id="div${field_count}"><hr>
        <div class="row">
                           <div class="col-sm-3">
                         
                              <div class="form-group">
                                 <label>Bank Name <span class="req">*</span></label>
                                 <input  placeholder="Bank name" type="text" id="bank_name${field_count}" name="bank_name[]" class="form-control"  required>
                              </div>
                           </div>
                           <div class="col-sm-2 lateral_entry" >
                              <div class="form-group">
                                 <label>Payment Mode </label>
                                 <!-- <input  type="text"  name="payment_mode" id="payment_mode" class="form-control" >  -->
                                 <select  name="payment_mode[]" id="payment_mode${field_count}" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="cash">cash</option>
                                    <option value="online">online</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-sm-3">
                              <div class="form-group">
                                 <label>Transaction No<span class="req">*</span></label>
                                 <input  placeholder="Transaction No" type="text" id="transaction_no${field_count}" name="transaction_no[]" class="form-control" required>
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <div class="form-group">
                                 <label>Deposit Date <span class="req">*</span></label>
                                 <input  placeholder="Deposit Date " type="text" id="deposit_date${field_count}" name="deposit_date[]" class="form-control datepicker" required>
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <div class="form-group">
                                 <label>Ammount <span class="req">*</span></label>
                                 <input  placeholder="Amount " min=1  type="number" id="amount${field_count}" name="ammount[]" class="form-control" required>
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <div class="form-group" style="margin-top:25px">
                                 <a class="btn btn-success " onclick="remove_field(${field_count})">remove</a>
                              </div>
                           </div>
                           </div>
                        </div>`;
            $("#contain-ammount").append(data);   
            field_count++;      
            $( ".datepicker" ).datepicker({
   		dateFormat:"dd-mm-yy",
   		changeMonth:true,
   		changeYear:true,
   		// maxDate: "-12Y",
   		minDate: "-80Y",
   		yearRange: "-100:+0"
   	});
      validate_form();
    }

    function remove_field(id){
        if(confirm("Are you sure ?")){
         $("#div"+id).remove();
        }
    }

   // $("#register").attr("disabled",true);

   //  $("#mycheckbox").change(function(){
   //     var data = $("#mycheckbox").is(":checked");
   //     if(data==false){
   //       $("#register").attr("disabled",true);
   //     }else{
   //       $("#register").attr("disabled",false);
   //     }
   //  });
</script>