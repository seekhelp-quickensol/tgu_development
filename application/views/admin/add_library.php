<?php
// print_r($single);exit;
include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Library Management 
					<a href="<?=base_url();?>course_library_list" class="btn btn-primary mr-2 float-right">View List</a>
				  </h4>
                  <p class="card-description">
                    Please enter required details
                  </p>
				  
					<form class="forms-sample" name="selection_form" id="selection_form" method="POST" enctype="multipart/form-data">
						<?php if(!empty($data)): ?>
							<input type="hidden" name="id" value="<?=$data->id; ?>">
						<?php endif; ?>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Course *</label>
									<select class="form-control js-example-basic-single" id="course" name="course"> 
										<option value="">Select</option>
										<?php if(!empty($course)){ foreach($course as $course_result){?>
										<option value="<?=$course_result->id?>" <?php if(!empty($single) && $single->course == $course_result->id){?>selected="selected" <?php }?>><?=$course_result->course_name?></option>
										<?php }}?> 
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Stream *</label>
									<select class="form-control js-example-basic-single" id="stream" name="stream"> 
										<option value="">Select</option>
									    <?php if(!empty($stream)){ foreach($stream as $stream_result){?>
										<option value="<?=$stream_result->id?>" <?php if(!empty($single) && $single->stream == $stream_result->id){?>selected="selected" <?php }?>><?=$stream_result->stream_name?></option>
										<?php }}?> 
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Year/Sem *</label>
									<select class="form-control js-example-basic-single" id="year_sem" name="year_sem"> 
											<option value="">Select</option>
											<option value="1" <?php if(!empty($single) && $single->year_sem == 1){?>selected="selected" <?php }?>>1</option>
											<option value="2" <?php if(!empty($single) && $single->year_sem == 2){?>selected="selected" <?php }?>>2</option>
											<option value="3" <?php if(!empty($single) && $single->year_sem == 3){?>selected="selected" <?php }?>>3</option>
											<option value="4" <?php if(!empty($single) && $single->year_sem == 4){?>selected="selected" <?php }?>>4</option>
											<option value="5" <?php if(!empty($single) && $single->year_sem == 6){?>selected="selected" <?php }?>>5</option>
											<option value="6" <?php if(!empty($single) && $single->year_sem == 6){?>selected="selected" <?php }?>>6</option>
											<option value="7" <?php if(!empty($single) && $single->year_sem == 7){?>selected="selected" <?php }?>>7</option>
											<option value="8" <?php if(!empty($single) && $single->year_sem == 8){?>selected="selected" <?php }?>>8</option>
											<option value="9" <?php if(!empty($single) && $single->year_sem == 9){?>selected="selected" <?php }?>>9</option>
											<option value="10" <?php if(!empty($single) && $single->year_sem == 10){?>selected="selected" <?php }?>>10</option>
											<option value="11" <?php if(!empty($single) && $single->year_sem == 11){?>selected="selected" <?php }?>>11</option>
											<option value="12" <?php if(!empty($single) && $single->year_sem == 12){?>selected="selected" <?php }?>>12</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Subject *</label>
									<!-- <input type="text" name="subject" id="subject" value="<?php if(!empty($single)){ echo $single->subject;} ?>" class="form-control"> -->

									<select class="form-control js-example-basic-single" id="subject" name="subject"> 
										<option value="">Select</option>
										 <?php if(!empty($subject)){
											// echo "<pre>";print_r($subject);exit;
											
											foreach($subject as $subject_result){?>
										<option value="<?=$subject_result->id?>" <?php if(!empty($single) && $single->subject == $subject_result->id){?>selected="selected" <?php }?>><?=$subject_result->subject_name?></option>
										<?php }}?> 
									</select>
								</div>
							</div>
                            
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Book Name *</label>
									<input type="text" class="form-control" id="book_name" name="book_name" value="<?php if(!empty($single)){ echo $single->book_name;}?>"> 
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">E-Book pdf *  
									<?php if($single && $single->ebook !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/ebook/'.$single->ebook)?>">View</a><?php }?>
									
									</label>
									<input type="file" class="form-control" id="userfile" name="userfile" accept=".pdf"> 
									<input type="hidden" class="form-control" id="old_ebbok" name="old_ebbok" value="<?php if(!empty($single)){ echo $single->ebook;}?>"> 
									<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>"> 
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
	ignore: ":hidden:not(select)",
	rules: {
		course: {
			required: true,
		},
		stream: {
			required: true,
		},
		year_sem: {
			required: true,
		},
		subject: {
			required: true,
		},
		book_name:{
			required:true,
		},
		<?php if(empty($single)){?>
		userfile:{
			required:true,
		},
		<?php }?>
	},
	messages: {
		course: {
			required: "Please select course",
		},
		stream: {
			required: "Please select stream",
		},
		year_sem: {
			required: "Please select year/sem",
		},
		subject: {
			required: "Please select subject",
		},
		book_name:{
			required:"Please enter book name",
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
 

$('#course').on('change', function() {
    $('#course').valid();
});

$('#stream').on('change', function() {
    $('#stream').valid();
});

$('#year_sem').on('change', function() {
    $('#year_sem').valid();
});

$('#subject').on('change', function() {
    $('#subject').valid();
});


</script>
