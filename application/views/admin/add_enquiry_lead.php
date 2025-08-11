<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Enquiry Leads </h4>
                  <p class="card-description">
                    Please enter required details
                  </p>
				  
					<form class="forms-sample" name="selection_form" id="selection_form" method="POST" enctype="multipart/form-data">
						<?php if(!empty($data)): ?>
							<?php endif; ?>
						<div class="row">
							
                            
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Name *</label>
                                    <input type="hidden" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
						
									<input type="text" class="form-control" id="name" name="name" value="<?php if(!empty($single)){ echo $single->name;}?>"> 
								</div>
							</div>
                             
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Email *</label>
									<input type="text" class="form-control" id="email" name="email" value="<?php if(!empty($single)){ echo $single->email;}?>"> 
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Date *</label>
									<input type="text" readonly class="form-control" id="datepicker" name="date" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->date));}?>"> 
								</div>
							</div>
                             
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Mobile Number *</label>
									<input type="text" class="form-control" id="mobile_number" name="mobile_number" value="<?php if(!empty($single)){ echo $single->mobile_number;}?>"> 
								</div>
							</div>
                            <div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Course Name *</label>
									<input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(!empty($single)){ echo $single->course_name;}?>"> 
								</div>
							</div>
                            <div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Description *</label>
                                    <textarea class="form-control" name="description" id="description"><?php if(!empty($single)){ echo $single->description;}?></textarea>
									</div>
							</div>
							
						</div>
						<div class="row"> 
							<div class="col-md-3">
								<div class="form-group">
									<button type="submit" id="save_btn" class="btn btn-primary mr-2">Save</button> 
								</div>
							</div>
						</div>
					</form>		
					
					
                </div>
            </div>
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

 $("#upload_type").change(function(){ 
 if($(this).val() == "Form"){
	$(".upload_div").hide(); 
	$(".form_div").show(); 
 }else{  
	$(".form_div").hide(); 
	$(".upload_div").show();
 }
 });

$("#course").change(function(){   
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
			});
			<?php if(!empty($data)):?>
			document.getElementById("stream").value = "<?= $data->stream; ?>";
			<?php endif; ?>
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#stream").change(function(){   
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}); 

$("#year_sem").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_subject",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'year_sem':$("#year_sem").val()},
		success: function(data){
			$("#subject").empty();
			$('#subject').append('<option value="">Select</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#subject').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
			});
			<?php if(!empty($data)):?>
			document.getElementById("subject").value = "<?= $data->subject; ?>";
			<?php endif; ?>
			$('#subject').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	
$('#selection_form').validate({
	rules: {
		name: {
			required: true,
		},
		mobile_number: {
			required: true,
            // maxlength:10,
            // minlength:10,
		},
		email: {
			required: true,
            validate_email:true,
		},
		description: {
			required: true,
		},
		course_name:{
			required:true,
		},
		date:{
			required:true,
		},
		<?php if(empty($single)){?>
		userfile:{
			required:true,
		},
		<?php }?>
	},
	messages: {
		name: {
			required: "Please enter name",
		},
		mobile_number: {
			required: "Please enter mobile number",
		},
		email: {
			required: "Please enter email",
            validate_email:"please enter valid email",
		},
		date:{
			required: "Please select date",
		},
		description: {
			required: "Please enter description",
		},
		course_name:{
			required:"Please enter course name",
		},
		<?php if(empty($single)){?>
		userfile:{
			required:"Please upload e-book",
		},
		<?php }?>
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
 
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
