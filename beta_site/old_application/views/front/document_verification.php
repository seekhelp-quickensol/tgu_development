<!-- <?php 
// include('header.php')
?>
		
		
        <div class="page-title-area bg-27">
			<div class="container">
				<div class="page-title-content">
					<h2>Document Verification</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home
							</a>
						</li>
						<li class="active">Verification</li>
						<li class="active">Document Verification</li>
					</ul>
				</div>
			</div>
		</div>
		
		<section class="candidates-resume-area ptb-100">
			<div class="container">
				<div class="candidates-resume-content">
					<form class="resume-info" method="post" name="document_verification_form" id="document_verification_form" enctype="multipart/form-data" onsubmit="return validateForm();">
						
					<h3>Personal/Company Details</h3>
					<p>Please provide your personal details</p>
					
					<div class="row">
						<div class="col-lg-3 col-md-3">
							<div class="form-group">
								<label>Name <span class="req">*</span></label>
								<input class="form-control" type="text" name="name" id="name" autocomplete="off">
							</div>
						</div>

						<div class="col-lg-3 col-md-3">
							<div class="form-group">
								<label>Address <span class="req">*</span></label>
								<input type="text" class="form-control" id="address" name="address" autocomplete="off">
							</div>
						</div>

						

						<div class="col-lg-3 col-md-3">
							<div class="form-group">
								<label>City <span class="req">*</span></label>
								<input type="text" class="form-control" id="city" name="city" autocomplete="off">
							</div>
						</div>


						<div class="col-lg-3 col-md-3">
							<div class="form-group">
								<label>Pincode <span class="req">*</span></label>
								<input type="text" class="form-control" id="pin_code" name="pin_code" autocomplete="off">
							</div>
						</div>
					</div>
					<h3>Contact Details</h3>
					<p>Please provide your contact details</p>
					
					<div class="row">

						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Mobile Number <span class="req">*</span></label>
								<input class="form-control" type="text" name="mobile_number" id="mobile_number" autocomplete="off">
							</div>
						</div>

						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Email <span class="req">*</span></label>
								<input type="text" class="form-control" id="email" name="email" autocomplete="off">
							</div>
						</div>
					</div>

					<h3>Document to Verify</h3>
					<p>Please provide your document details</p>
									
					<div class="row" id="contain-ammount">
						
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label>Document Name<span class="req">*</span></label>
								<input type="text" class="form-control" id="document_name" name="document_name[]" autocomplete="off">
							</div>
						</div>

						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label>Document<span class="req">*</span></label>
								<input type="file" class="form-control" id="document" name="document[]" autocomplete="off">
							</div>
						</div>

					

						<div class="col-lg-12 col-md-12">
							<a onclick="add_more_fields();" class="default-btn" style="margin-left: 15px;margin-top:10px;color:#fff">Add</a>
						</div>
					</div>
					
				
					<br><br>

					<h3>Student Details</h3>
					<p>Please provide your student details</p>
					<div class="row">

						<div class="col-lg-3 col-md-3">
							<div class="form-group">
								<label>Student Name <span class="req">*</span></label>
								<input type="text" class="form-control" id="student_name" name="student_name" autocomplete="off">
							</div>
						</div>

						<div class="col-lg-3 col-md-3">
							<div class="form-group">
								<label>Enrollment Number <span class="req">*</span></label>
								<input type="text" class="form-control" id="enrollment_number" name="enrollment_number" autocomplete="off">
							</div>
						</div>

						<div class="col-lg-3 col-md-3">
							<div class="form-group">
								<label>Passing Year <span class="req">*</span></label>
								<input type="text" class="form-control" id="passing_year" name="passing_year" autocomplete="off">
							</div>
						</div>

						<div class="col-lg-3 col-md-3">
							<div class="form-group">
								<label>Course Name <span class="req">*</span></label>
								<input type="text" class="form-control" id="course_name" name="course_name" autocomplete="off">
							</div>
						</div>

						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<label>Mention your query *</label>
								<textarea row="3" cols="30" class="form-control" id="query" name="query" autocomplete="off"></textarea>
							
							</div>
						</div>

		
					</div>
					
						

							

							<div class="col-lg-12">
							
							
								<input class="default-btn" name="register" id="register" type="submit" value="Submit Application">
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	

	<?php
	//  include('footer.php')
	 ?>
	
	<script>
	

		$.validator.addMethod("allDocumentNameRequired", function (value, element) {
	var flag = true;

	$("[name^=document_name]").each(function (i, j) {
		$(this).parent('p').find('label.error').remove();
		$(this).parent('p').find('label.error').remove();
		if ($.trim($(this).val()) == '') {
			flag = false;

			$(this).parent('p').append('<label  id="id_ct' + i + '-error" class="error">This field is required.</label>');
		}
	});
	return flag;
   }, "");

   $.validator.addMethod("allDocumentRequired", function (value, element) {
	var flag = true;

	$("[name^=document]").each(function (i, j) {
		$(this).parent('p').find('label.error').remove();
		$(this).parent('p').find('label.error').remove();
		if ($.trim($(this).val()) == '') {
			flag = false;

			$(this).parent('p').append('<label  id="id_ct' + i + '-error" class="error">This field is required.</label>');
		}
	});
	return flag;
   }, "");


	$.validator.addMethod("mobile_number", function(phone_number, element) {
			phone_number = phone_number.replace(/\s+/g, "");
			return phone_number.length > 9;
		}, "Please enter a valid mobile number ");

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
            

function validation_form(){

$('#document_verification_form').validate({
	ignore:'',
    rules: {
        name: {
            required: true,   
        },
        address: {
            required: true,
        },
        city: {
            required: true,
        },
        pin_code: {
            required: true,
			number:true,
			maxlength:6,
			minlength:6,
        },
        mobile_number: {
			required: true,
			mobile_number: true,
			minlength: 10,
			maxlength: 12,
        },
		'document[]':{
			required:true,
			allDocumentRequired:true, 
		},
        email: {
			required: true,
			validate_email:true,
        },
        student_name: {
			required: true,
        },
        enrollment_number: {
			required: true,
        },
		'document_name[]': {
			required: true,
			allDocumentNameRequired:true,
        },
        passing_year: {
            required: true,
			minlength:4,
			maxlength:4,
        },
		course_name: {
			required: true,
        },
        query: {
			required: true,
        },
    },
    messages: {
        name: {
            required: "Please enter name",
        },
        address: {
            required: "Please enter address",
        },
        city: {
            required: "Please enter city",
        },
        pin_code: {
            required: "Please enter pincode",
			number:"Please enter valid pincode",
			maxlength:"Please enter 6 digit pincode",
			minlength:"Please enter 6 digit pincode",
        },
		'document[]':{
			required:"Please upload document",
		},
        mobile_number: {
            required: "Please enter mobile number",
			mobile_number: "Please enter 10 digit mobile number",
			minlength: "Please enter 10 digit mobile number ",
			maxlength: "Please enter 10 digit mobile number",
        },
        email: {
            required: "Please enter email",
			validate_email:"Please enter valid email",
        },
        student_name: {
            required: "Please enter student name",
        },
        enrollment_number: {
            required: "Please enter enrollment number",
        },
		'document_name[]': {
			required: "Please enter document name",
        },
        passing_year: {
            required: "Please enter passing year",
			minlength:"Please enter valid passing year",
			maxlength:"Please enter valid passing year",
        },
		course_name: {
            required: "Please enter course name",
        },
        query: {
            required: "Please enter query",
        },
    },
    submitHandler: function (form) {
        form.submit();
    },
});
}

validation_form();



var field_count = 2;
    function add_more_fields(){  

        var data = '<div class="col-lg-4 col-md-4 div'+field_count+'">\<div class="form-group">\<label>Document Name <span class="req">*</span></label>\
		<input type="text" class="form-control" id="document_name" name="document_name[]" autocomplete="off" >\</div>\</div>\<div class="col-lg-4 col-md-4 div'+field_count+'">\
		<div class="form-group">\
		<label>Document <span class="req">*</span></label>\
		<input  type="file" class="form-control" id="document" name="document[]" autocomplete="off" >\
		</div>\
		</div>\
		<div class="col-lg-2 col-md-2 div'+field_count+'">\
		<div class="form-group" style="margin-top:25px">\
		<a class="default-btn " onclick="remove_field('+field_count+')">remove</a>\
		</div>\
		</div>';

            $("#contain-ammount").append(data);   

            field_count++;      

	}



    function remove_field(id){

      $(".div"+id).remove();

    }



</script>

<script>
	function validateForm(){
		alert();
		var recaptchaResponse = grecaptcha.getResponse();
		if (recaptchaResponse.length === 0) {
			alert("Please complete the captcha!");
			return false;
		}
		return true;
	}
</script>
 -->


 <?php include("header.php");?>





 <div class="page-title-area bg-27">
			<div class="container">
				<div class="page-title-content">
					<h2>Document Verification</h2>

					<ul>
						<li>
							<a href="<?=base_url()?>">
								Home
							</a>
						</li>
						<li class="active">Verification</li>
						<li class="active">Document Verification</li>
					</ul>
				</div>
			</div>
		</div>
		

		<section class="candidates-resume-area ptb-100">
			<div class="container">
				<div class="candidates-resume-content">
                  <form method="POST" name="admission_form" id="admission_form" enctype="multipart/form-data" onsubmit="return validateForm();">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="common_details">
                              <div class="col-md-12">
                                 <h3>Personal/Company Details</h3>
                                 <small>Please provide your personal details</small>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </div>
                     <div class="row pt-3 pb-3">
                        
                           <div class="col-md-3 form-group">
                             
                                 <label>Name <span class="req">*</span></label>
                                 <input type="text" name="name" id="name" class="form-control charector" placeholder="Name"  >

                           </div>
                           <div class="col-md-3 form-group">
                             
                                 <label>Address <span class="req">*</span></label>
                                 <input type="text" name="address" id="address" class="form-control charector" placeholder="Address" >

                           </div>
                           <div class="col-md-3 form-group">
                             
                                 <label>City <span class="req">*</span></label>
                                 <input type="text" name="city" id="city" class="form-control charector" placeholder="City" >

                           </div>
                           <div class="col-md-3 form-group">
                             
                                 <label>Pin Code <span class="req">*</span></label>
                                 <input type="number" name="pin_code" id="pin_code" class="form-control charector" placeholder="Pin Code">

                           </div>
                       
                     </div>
                     
                     <div class="row pt-3 pb-3">
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
                        
                           <div class="col-md-6 form-group">
                              
                              <label>Mobile Number <span class="req">*</span></label>
                              <input type="number" class="form-control rules" name="mobile_number" id="mobile_number" placeholder="Mobile Number">
                           
                           </div>
                            <div class="col-md-6 form-group">
                              
                              <label>Email <span class="req">*</span></label>
                              <input type="email" class="form-control rules" name="email" id="email" placeholder="Email">
                           
                           </div>
                      

                     </div>
                     
                     
                     
                     <div class="common_details pt-3 pb-3">
                        <div class="col-md-12">
                           <h3>Documents to Verify </h3>
                           <small>Please provide your document details</small>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="row" >
					
                        <div id="contain-ammount">
						<div class="row" id="div1">
                           <div class="col-sm-5">
                              <div class="form-group">
                                 <label>Document Name <span class="req">*</span></label>
                                 <input placeholder="Document Name" type="text"  name="document_name[]" class="form-control" >
                              </div>
                           </div>
                           <div class="col-sm-5">
                              <div class="form-group">
                                 <label>Document <span class="req">*</span></label>
                                 <input  type="file" name="files[]" class="form-control" >
                              </div>
                           </div>
                        
                    
                        <div class="col-sm-2">
							<label for="" style="visibility:hidden;">btn</label><br>
                        <a onclick="add_more_fields()" class="default-btn" style="margin-top:5px">Add</a>
                        </div>
						</div>
						</div>
                     </div>
                     <br>

                     <div class="row pt-3 pb-3">
                        <div class="col-md-12">
                           <div class="common_details">
                              <div class="col-md-12">
                                 <h3>Student Details</h3>
                                 <small>Please provide Student's details</small>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <!-- <div class="col-md-12"> -->
                           <div class="col-md-6 form-group">
                              
                                 <label>Student Name <span class="req">*</span></label>
                                 <input type="text" name="student_name" id="student_name" class="form-control charector" placeholder="Student Name"  >
                              
                           </div>
                           <div class="col-md-6 form-group">
                              
                                 <label>Enrollment Number <span class="req">*</span></label>
                                 <input type="text" name="enrollment_number" id="enrollment_number" class="form-control charector" placeholder="Enrollment Number" >
                              
                           </div>
                           <div class="col-md-6 form-group">
                              
                                 <label>Passing Year <span class="req">*</span></label>
                                 <input type="number" name="passing_year" id="passing_year" class="form-control charector" placeholder="Passing Year" >
                              
                           </div>
                           <div class="col-md-6 form-group">
                              
                                 <label>Course Name <span class="req">*</span></label>
                                 <input type="text" name="course_name" id="course_name" class="form-control charector" placeholder="Course Name" >
                             
                           </div>

                           <div class="col-md-12 form-group">
                              
                                 <label>Mention your query<span class="req">*</span></label>
                                <textarea  name="query" id="query" placeholder="Mention your query" class="form-control charector"></textarea>
                             
                           </div>
                        <!-- </div> -->
                     </div>
                
                     
                    
                        
                       
                        <!-- <div class="row"> -->
                           <div class="col-md-12 edu form-group">
                             
                                 <label></label>
                                 <input value="Submit" class="default-btn" name="register" id="register" type="submit" style="margin-top: 20px;">
                                 <div class="pull-right">
                                 

                                 </div>
                              
                           </div>
                        <!-- </div> -->
                   
                  </form>
                  <div class="clearfix"></div>
               </div>
            </div>
        
</section>
<?php include("footer.php");?>
<script>
   
   
   //validation function for dynamic form fields 

   $.validator.addMethod("allDocumentNameRequired", function (value, element) {
	var flag = true;

	$("[name^=document_name]").each(function (i, j) {
		$(this).parent('p').find('label.error').remove();
		$(this).parent('p').find('label.error').remove();
		if ($.trim($(this).val()) == '') {
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
           name:{
            required:true,
			noHTMLtags: true,
           },
           address:{
            required:true,
			noHTMLtags: true,
           },
           city:{
            required:true,
			noHTMLtags: true,
           },
           pin_code:{
            required:true,
			number:true,
			maxlength:6,
			minlength:6,
			noHTMLtags: true,
           },
           mobile_number:{
            required:true,
            minlength:10,
            maxlength:12,
			noHTMLtags: true,
           },
           email:{
            required:true,
            email:true,
			noHTMLtags: true,
           },
           'document_name[]':{
            required:true,
            allDocumentNameRequired:true,
			noHTMLtags: true,
           },
      	  'files[]':{
            required:true,
            allDocumentRequired:true,
           },
           student_name:{
            required:true,
			noHTMLtags: true,
           },
           enrollment_number:{
            required:true,
			noHTMLtags: true,
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
           query:{
            required:true,
			noHTMLtags: true,
           },
   	},
   	messages: {
        name:{
            required:"Please enter name",
			noHTMLtags:"HTML tags not allowed!",
           },
           address:{
            required:"Please enter address",
			noHTMLtags:"HTML tags not allowed!",
           },
           city:{
            required:"Please enter city",
			noHTMLtags:"HTML tags not allowed!",
           },
           pin_code:{
            required:"Please enter pincode",
			number:"Please enter valid pincode",
			maxlength:"Please enter 6 digit pincode",
			minlength:"Please enter 6 digit pincode",
			noHTMLtags:"HTML tags not allowed!",
           },
           mobile_number:{
            required:"Please enter mobile number",
            minlength:"Please enter valid mobile number",
            maxlength:"Please enter valid mobile number",
			noHTMLtags:"HTML tags not allowed!",
           },
           email:{
            required:"Please enter email",
            email:"Please enter valid email",
			noHTMLtags:"HTML tags not allowed!",
           },
           'document_name[]':{
            required:"Please enter document name",
			noHTMLtags:"HTML tags not allowed!",
           },
           'files[]':{
            required:"Please select document",
           },
           student_name:{
            required:"Please enter student name",
			noHTMLtags:"HTML tags not allowed!",
           },
           enrollment_number:{
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
           query:{
            required:"Please enter your query",
			noHTMLtags:"HTML tags not allowed!",
           },
   	}, 
   submitHandler: function(form){
   		form.submit();
   	} ,
   });
   }
   
   validate_form();

   
   var field_count = 2;
    function add_more_fields(){
        var data = `<div class="row" id="div${field_count}">

                           <div class="col-sm-5">
                              <div class="form-group">
                                 <label>Document Name <span class="req">*</span></label>
                                 <input placeholder="Document Name" type="text" id="document_name" name="document_name[]" class="form-control" >
                              </div>
                           </div>
                           <div class="col-sm-5">
                              <div class="form-group">
                                 <label>Document <span class="req">*</span></label>
                                 <input  type="file" name="files[]" class="form-control" >
                              </div>
                           </div>

                           <div class="col-sm-2">
                              <div class="form-group" style="margin-top:25px">
                                 <a class="default-btn" onclick="remove_field(${field_count})">remove</a>
                              </div>
                           </div>
                        </div>`;
            $("#contain-ammount").append(data);   
            field_count++;  
            
            
            $( ".datepicker" ).datepicker({
   		dateFormat:"dd-mm-yy",
   		changeMonth:true,
   		changeYear:true,
   		// maxDate: "-18Y",
   		minDate: "-80Y",
   		yearRange: "-100:+0"
   	});
      validate_form();
    }

    function remove_field(id){
      $("#div"+id).remove();
    }

   
</script>


<script>
	function validateForm(){
		
		var recaptchaResponse = grecaptcha.getResponse();
		if (recaptchaResponse.length === 0) {
			alert("Please complete the captcha!");
			return false;
		}
		return true;
	}
</script>