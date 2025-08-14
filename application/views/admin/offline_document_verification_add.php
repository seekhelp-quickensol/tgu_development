<?php include('header.php');?>

<style>

	.btn-small{

		padding: 5px 10px;

	}

	.no_doc{

		margin-bottom: 0px;

		padding: 5px;

		background: #ddd;

		color: #000;

		text-align: center;

	}

	.common_details{

	    background: #500405;
    color: #fff;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 10px;

	}

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

                <div class="card-body">

                  <h4 class="card-title">Offline Document Verification

				  <a href="<?=base_url();?>offline_document_verification_list" class="btn btn-primary mr-2 float-right">View List</a>

				  </h4>

                  <p class="card-description">

                    Please enter details

                  </p>

                  <form method="POST" name="admission_form" id="admission_form" enctype="multipart/form-data">

 

                           <div class="common_details"> 

                              <div class="col-md-12"> 

                                 <h3>Personal/Department Details</h3> 

                                 <small>Please provide your personal details</small> 

                              </div> 

                              <div class="clearfix"></div> 

                           </div> 

						   <div class="row">

							   <div class="col-md-3"> 

								  <div class="form-group"> 

									 <label>Name/Department Name <span class="req">*</span></label> 

									 <input type="text" name="name" id="name" class="form-control charector" placeholder="Name" value="<?php if(!empty($single)){ echo $single->name;}?>"> 

									 <input type="hidden" name="id" id="id" class="form-control charector" placeholder="Name" value="<?php if(!empty($single)){ echo $single->id;}?>"> 

								  </div> 

							   </div> 

							   <div class="col-md-3"> 

								  <div class="form-group"> 

									 <label>Address <span class="req">*</span></label> 

									 <input type="text" name="address" id="address" class="form-control charector" placeholder="Address" value="<?php if(!empty($single)){ echo $single->address;}?>"> 

								  </div> 

							   </div> 

								<div class="col-md-3"> 

									<div class="form-group"> 

										<label>City <span class="req"></span></label>

										<input type="text" name="city" id="city" class="form-control charector" placeholder="City" value="<?php if(!empty($single)){ echo $single->city;}?>">

									</div>

								</div>

								<div class="col-md-3">

									<div class="form-group">

										<label>Pin Code <span class="req"></span></label>

										<input type="number" name="pin_code" id="pin_code" class="form-control" placeholder="Pin Code" value="<?php if(!empty($single)){ echo $single->pin_code;}?>">

									</div>

								</div>

							</div>   

							<div class="common_details">

								<div class="col-md-12">

									<h3>Contact Details </h3>

									<small>Please provide your contact details</small>

								</div>

								<div class="clearfix"></div>

							</div> 

							<div class="row"> 

								<div class="col-md-4">

									<div class="form-group">

										<label>Mobile Number <span class="req"></span></label>

										<input type="text" class="form-control rules" name="mobile_number" id="mobile_number" placeholder="Mobile Number" maxlength="10" minlength="10" value="<?php if(!empty($single)){ echo $single->mobile_number;}?>">
										<div class="error" id="mobile_number_error"></div>
									</div>

								</div>

								<div class="col-md-4">

									<div class="form-group">

										<label>Email <span class="req"></span></label>

										<input type="email" class="form-control rules" name="email" placeholder="Email" id="email" value="<?php if(!empty($single)){ echo $single->email;}?>">

									</div>

								</div> 

							</div>

 							<div class="common_details">

								<div class="col-md-12">

									<h3>Documents to Verify </h3>

									<small>Please provide your document details</small>

								</div>

								<div class="clearfix"></div>

							</div>

							<div class="row" id="contain-ammount">  

								<div class="col-sm-4" >

									<div class="form-group">

										<label>Document Name <span class="req">*</span></label>

										<input placeholder="Document Name" type="text"  name="document_name[]" class="form-control" >

									</div>

								</div>

								<div class="col-sm-4">

									<div class="form-group">

										<label>Document <span class="req">*</span></label>

										<input  type="file" name="files[]" class="form-control" >

									</div>

								</div> 

								<div class="col-sm-12">

									<a onclick="return add_more_fields();" class="btn btn-danger" style="margin-left: 15px;margin-top:10px;color:#fff">Add</a>

								</div>

							</div>

							<br>   

							<div class="common_details">

								<div class="col-md-12">

                                <h3>Student Details</h3>

                                <small>Please provide Student's details</small> 

                              </div> 

                              <div class="clearfix"></div> 

							</div>  

							<div class="row"> 

								<div class="col-md-3">

									<div class="form-group">

										<label>Enrollment Number <span class="req">*</span></label>

										<input type="text" name="enrolment_number" id="enrolment_number" class="form-control charector" placeholder="Enrollment Number" value="<?php if(!empty($single)){ echo $single->enrollment_number;}?>">

									</div>

								</div>

								<div class="col-md-3"> 

									<div class="form-group">

										<label>Student Name <span class="req">*</span></label>

										<input type="text" name="student_name" id="student_name" class="form-control charector" placeholder="Student Name"   value="<?php if(!empty($single)){ echo $single->student_name;}?>">

									</div>

								</div> 

								<div class="col-md-3">

									<div class="form-group">

										<label>Passing Year <span class="req">*</span></label>

										<input type="number" name="passing_year" id="passing_year" class="form-control charector" placeholder="Passing Year"  value="<?php if(!empty($single)){ echo $single->passing_year;}?>">

									</div>

								</div>

								<div class="col-md-3">

									<div class="form-group">

										<label>Course Name <span class="req">*</span></label>

										<input type="text" name="course_name" id="course_name" class="form-control " placeholder="Course Name"  value="<?php if(!empty($single)){ echo $single->course_name;}?>">

									</div>

								</div> 

								<div class="col-md-3">

									<div class="form-group">

										<label>Mobile Number <span class="req">*</span></label>

										<input type="text" name="student_mobile" id="student_mobile" maxlength="10" minlength="10" class="form-control"  placeholder="Mobile Number"  value="<?php if(!empty($single)){ echo $single->student_mobile;}?>">
										
										<div class="error" id="student_mobile_number_error"></div>

									</div>

								</div> 

								<div class="col-md-3">

									<div class="form-group">

										<label>Email ID <span class="req">*</span></label>

										<input type="text" name="student_email" id="student_email" class="form-control " placeholder="Email" value="<?php if(!empty($single)){ echo $single->student_email;}?>">

									</div>

								</div> 

								<div class="col-md-3">

									<div class="form-group">

										<label>Address <span class="req">*</span></label>

										<input type="text" name="student_address" id="student_address" class="form-control " placeholder="Address" value="<?php if(!empty($single)){ echo $single->student_address;}?>">

									</div>

								</div> 

								<div class="col-md-3">

									<div class="form-group">

										<label>Student Type <span class="req">*</span></label>

										<select name="student_type" id="student_type" class="form-control">

											<option value="">Select Student Type</option>

											<option value="0" <?php if(!empty($single) && $single->student_type == "0"){ ?>selected="selected"<?php }?>>Regular</option>

											<option value="1" <?php if(!empty($single) && $single->student_type == "1"){ ?>selected="selected"<?php }?>>Blended</option>

										</select>

									</div>

								</div>

								<div class="col-md-8">

									<div class="form-group">

										<label>Courier/Speed post Tracking Number</label>

										<input type="text" name="courier_number" id="courier_number" class="form-control " placeholder="Courier/Speed post Tracking Number"  value="<?php if(!empty($single)){ echo $single->courier_number;}?>">

									</div>

								</div>

								<div class="col-md-4">

									<div class="form-group">

										<label>Dispatch Date</label>

										<input type="text" name="dispatch_date" id="dispatch_date" class="form-control datepicker" placeholder="Dispatch Date"   value="<?php if(!empty($single)){ echo $single->dispatch_date;}?>">

									</div>

								</div>								

								<div class="col-md-12">

									<div class="form-group">

										<label>Mention your query<span class="req"></span></label>

										<textarea name="query" id="query" placeholder="Mention your query" class="form-control "><?php if(!empty($single)){ echo $single->query;}?></textarea>

									</div>

								</div>

							</div>  

							

							<div class="common_details">

								<div class="col-md-12">

									<h3>Payment Details </h3>

									<small>Please provide your payment details</small>

								</div>

								<div class="clearfix"></div>

							</div> 

							<div class="row"> 

								<div class="col-md-4">

									<div class="form-group">

										<label>Transaction/Reference Number<span class="req"></span></label>

										<input type="text" class="form-control" name="transaction_id" id="transaction_id" placeholder="Transaction/Reference Number" value="<?php if(!empty($single)){ echo $single->transaction_id;}?>">

									</div>

								</div>

								<div class="col-md-4">

									<div class="form-group">

										<label>Amount <span class="req"></span></label>

										<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php if(!empty($single)){ echo $single->amount;}?>">

									</div>

								</div>  

								<div class="col-md-4">

									<div class="form-group">

										<label>Payment Date <span class="req"></span></label>

										<input type="text" class="form-control datepicker" name="payment_date" id="payment_date" placeholder="Payment Date" value="<?php if(!empty($single)){ echo $single->payment_date;}?>">

									</div>

								</div>  

								<div class="col-md-4">

									<div class="form-group">

										<label>Payment Status<span class="req"></span></label>

										<select class="form-control" name="payment_status" id="payment_status"> 

											<option value="">Select Payment Status</option>

											<option value="0" <?php if(!empty($single) && $single->payment_status == "0"){?>selected="selected"<?php }?>>Failed</option>

											<option value="1" <?php if(!empty($single) && $single->payment_status == "1"){?>selected="selected"<?php }?>>Success</option>

										</select>

									</div>

								</div> 

							</div>

							<div class="col-md-12"> 

								<div class="row">

									<div class="col-md-12 edu">

										<div class="form-group">

											<label></label>

											<input value="Submit" class="btn btn-primary" name="register" id="register" type="submit">

											<div class="pull-right"></div> 

										</div>

									</div>

								</div>

							</div>

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

 $("#enrolment_number").keyup(function(){

	if($("#enrolment_number").val() == ""){

		$("#student_name").val('');

		$("#course_name").val(''); 

		$("#student_email").val('');  

		$("#student_mobile").val('');  

		$("#student_address").val(''); 

	}else{

		$.ajax({

			type: "POST",

			url: "<?=base_url();?>admin/Ajax_controller/get_student_details_both",

			data:{'enrollment_number':$("#enrolment_number").val()},

			success: function(data){

				var opts = $.parseJSON(data); 

				 $("#student_name").val(opts.student_name);

				 $("#course_name").val(opts.course_name);  

				 $("#student_email").val(opts.email);  

				 $("#student_mobile").val(opts.mobile);  

				 $("#student_address").val(opts.address);  

			},

			 error: function(jqXHR, textStatus, errorThrown) {

			   console.log(textStatus, errorThrown);

			}

		});	 

	}

 });

   $.validator.addMethod("allDocumentNameRequired", function (value, element) { 

	var flag = true; 

	$("[name^=document_name]").each(function (i, j){ 

		$(this).parent('p').find('label.error').remove(); 

		$(this).parent('p').find('label.error').remove(); 

		if ($.trim($(this).val()) == ''){ 

			flag = false; 

			$(this).parent('p').append('<label  id="id_ct' + i + '-error" class="error">This field is required.</label>'); 

		} 

	}); 

	return flag; 

   }, "");   

   $.validator.addMethod("allDocumentRequired", function (value, element) { 

	var flag = true;   

	$("[name^=files]").each(function (i, j) { 

		$(this).parent('p').find('label.error').remove(); 

		$(this).parent('p').find('label.error').remove(); 

		if ($.trim($(this).val()) == ''){ 

			flag = false; 

			$(this).parent('p').append('<label  id="id_ct' + i + '-error" class="error">This field is required.</label>'); 

		} 

	}); 

	return flag; 

   }, ""); 


   	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (value.trim() === "") {
			return true;
		}

	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

		return true;

	}else {

		return false;

	}

	}, "Please enter a valid Email.");	


	$.validator.addMethod("validate_mobile", function(value, element) {
		if (value.trim() === "") {
			return true;
		}
		return /^(?:[1-9]\d*|0)$/.test(value);
	}, "Please enter a valid mobile number ");

	
	// jQuery.validator.addMethod("validate_mobile", function(value, element) {
    //     return /^\d{10}$/.test(value);
    // }, "Please enter a valid Mobile Number.");


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

           name:{ 

				required:true, 

				noHTMLtags: true, 

			}, 
			email:{
				validate_email:true,
			},
			student_email:{
				required:true, 
				validate_email:true,
				noHTMLtags: true, 
			},
			address:{ 

				required:true, 

				noHTMLtags: true, 

			}, 

			student_address:{
				required:true, 

				noHTMLtags: true, 
			},
			student_type:{
				required:true, 

				noHTMLtags: true, 
			},
			<?php if(empty($single)){?>

           'document_name[]':{ 

				required:true, 

				allDocumentNameRequired:true, 

				noHTMLtags: true, 

			}, 

			'files[]':{ 

				required:true, 

				allDocumentRequired:true, 

			}, 

			<?php }?>

			student_name:{ 

				required:true, 

				noHTMLtags: true, 

			}, 

			mobile_number:{
				validate_mobile:true,
				maxlength:10,
				minlength:10,
			},
           enrolment_number:{ 

				required:true,

				noHTMLtags: true, 

			}, 

			student_mobile:{
				required:true,
				validate_mobile:true,
				maxlength:10,
				minlength:10,
			},

			passing_year:{ 

				required:true, 

				minlength:4,

				maxlength:4, 

				noHTMLtags: true, 

			}, 

			course_name:{ 

				required:true, 

				noHTMLtags: true, 

           },  

		}, 

		messages: { 

			name:{ 

				required:"Please enter name", 

				noHTMLtags:"HTML tags not allowed!", 

			}, 
			email:{
				validate_email:"Please enter valid email id",
			},
			student_email:{
				required:"Please enter email id", 
				validate_email:"Please enter valid email id",
				noHTMLtags:"HTML tags not allowed!", 
			},
			address:{ 

				required:"Please enter address", 

				noHTMLtags:"HTML tags not allowed!", 

			}, 
			student_address:{
				required:"Please enter address", 

				noHTMLtags:"HTML tags not allowed!", 
			},
			student_type:{
				required:"Please select student type", 

				noHTMLtags:"HTML tags not allowed!", 
			},
			<?php if(empty($single)){?>

			'document_name[]':{ 

				required:"Please enter document name", 

				noHTMLtags:"HTML tags not allowed!", 

           }, 

           'files[]':{ 

				required:"Please select document", 

			}, 

			<?php }?>

			student_name:{ 

				required:"Please enter student name", 

				noHTMLtags:"HTML tags not allowed!", 

			}, 

			mobile_number:{
				validate_mobile:"Please enter valid mobile number",
				maxlength:"Please enter 10 digit mobile number",
				minlength:"Please enter 10 digit mobile number",
			},
			student_mobile:{
				required:"Please enter mobile number", 
				validate_mobile:"Please enter valid mobile number",
				maxlength:"Please enter 10 digit mobile number",
				minlength:"Please enter 10 digit mobile number",
			},
			enrolment_number:{ 

				required:"Please enter enrollment number", 

				noHTMLtags:"HTML tags not allowed!", 

			}, 

			passing_year:{ 

				required:"Please enter passing year", 

				minlength:"Please enter valid passing year",  

				maxlength:"Please enter valid passing year",

				noHTMLtags:"HTML tags not allowed!",

			}, 

			course_name:{ 

				required:"Please enter course name", 

				noHTMLtags:"HTML tags not allowed!", 

			}, 

		},  

		submitHandler: function(form){ 

			form.submit(); 

		},

	});

} 

validate_form();


   var field_count = 2;
    function add_more_fields(){  

        var data = '<div class="col-sm-4 div'+field_count+'">\<div class="form-group">\<label>Document Name <span class="req">*</span></label>\
		<input placeholder="Document Name" type="text" id="document_name" name="document_name[]" class="form-control" >\</div>\</div>\<div class="col-sm-4 div'+field_count+'">\
		<div class="form-group">\
		<label>Document <span class="req">*</span></label>\
		<input  type="file" name="files[]" class="form-control" >\
		</div>\
		</div>\
		<div class="col-sm-2 div'+field_count+'">\
		<div class="form-group" style="margin-top:25px">\
		<a class="btn btn-success " onclick="remove_field('+field_count+')">remove</a>\
		</div>\
		</div>';

            $("#contain-ammount").append(data);   

            field_count++;      

	}


    function remove_field(id){

      $(".div"+id).remove();

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

});





 </script>

 