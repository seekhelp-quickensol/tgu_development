<?php include("header.php");?>


<!-- <div class="header_cc_area" style="background-image:url('<?=base_url();?>images/header_area.jpg')">
   <div class="container">
      <div class="row">
         <h1>Document Verification</h1>
         <p>Admission / Document Verification</p>
      </div>
   </div>
</div> -->


<section>


	<div class="header_cc_area slide-bg">
		<div class="container  overlay-about" style="width: 100%;">
      <p>Admission / Document Verification</p>

			<div class=" container-fluid text-center inner-heading-content">
				<h2 class="main-heading-inner-pages border-b border">Document Verification</h2>
				<p> We believe in providing education that cultivates creative understanding </p>

			</div>

		</div>
	</div>
</section>




<section class="c-padding inner-bg-3">

	<div class="uni_mainWrapper container box-shadow-global">


   <h2 class="title">Document Verification</h2>

            <div class="online_wrapper">
               <div class="admission_div">
                  <form method="POST" name="admission_form" id="admission_form" enctype="multipart/form-data">
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
                     <div class="row">
                        <div class="col-md-12">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name <span class="req">*</span></label>
                                 <input type="text" name="name" id="name" class="form-control charector" placeholder="Name"  >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Address <span class="req">*</span></label>
                                 <input type="text" name="address" id="address" class="form-control charector" placeholder="Address" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>City <span class="req">*</span></label>
                                 <input type="text" name="city" id="city" class="form-control charector" placeholder="City" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Pin Code <span class="req">*</span></label>
                                 <input type="number" name="pin_code" id="pin_code" class="form-control " >
                              </div>
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
                           <div class="col-md-6">
                              <div class="form-group">
                              <label>Mobile Number <span class="req">*</span></label>
                              <input type="number" class="form-control rules" name="mobile_number" id="mobile_number" >
                           </div>
                           </div>
                            <div class="col-md-6">
                              <div class="form-group">
                              <label>Email <span class="req">*</span></label>
                              <input type="email" class="form-control rules" name="email" id="email" >
                           </div>
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
                     <div class="row" >
                        <div id="contain-ammount">
                        <div class="col-md-12" id="div1">
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label>Document Name <span class="req">*</span></label>
                                 <input placeholder="Document Name" type="text"  name="document_name[]" class="form-control" >
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label>Document <span class="req">*</span></label>
                                 <input  type="file" name="files[]" class="form-control" >
                              </div>
                           </div>
                        </div>
                        </div>
                        <div class="col-sm-12">
                        <a onclick="add_more_fields()" class="btn btn-danger" style="margin-left: 15px;margin-top:10px">Add</a>
                        </div>
                     </div>
                     <br>

                
                     
                     <div class="row">
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
                        <div class="col-md-12">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Student Name <span class="req">*</span></label>
                                 <input type="text" name="student_name" id="student_name" class="form-control charector" placeholder="Student Name"  >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Enrolment Number <span class="req">*</span></label>
                                 <input type="text" name="enrolment_number" id="enrolment_number" class="form-control charector" placeholder="Enrolment Number" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Passing Year <span class="req">*</span></label>
                                 <input type="number" name="passing_year" id="passing_year" class="form-control charector" placeholder="Passing Year" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Course Name <span class="req">*</span></label>
                                 <input type="text" name="course_name" id="course_name" class="form-control " placeholder="Course Name" >
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Mention your query<span class="req">*</span></label>
                                <textarea  name="query" id="query" placeholder="Mention your query" class="form-control "></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                
                     
                     <div class="col-md-12">
                        
                       
                        <div class="row">
                           <div class="col-md-12 edu">
                              <div class="form-group">
                                 <label></label>
                                 <input vaue="Submit" class="btn btn-primary" name="register" id="register" type="submit">
                                 <div class="pull-right">
                                 

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
                  <div class="clearfix"></div>
               </div>
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
           enrolment_number:{
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
        var data = `<div class="col-md-12" id="div${field_count}">

                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label>Document Name <span class="req">*</span></label>
                                 <input placeholder="Document Name" type="text" id="document_name" name="document_name[]" class="form-control" >
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label>Document <span class="req">*</span></label>
                                 <input  type="file" name="files[]" class="form-control" >
                              </div>
                           </div>

                           <div class="col-sm-2">
                              <div class="form-group" style="margin-top:25px">
                                 <a class="btn btn-success " onclick="remove_field(${field_count})">remove</a>
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