<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title">Fees Setting <a href="<?=base_url();?>list_manage_fees" class="btn btn-primary mr-2 float-right">View List</a></h4><p class="card-description">
                    Please enter Fees details
                  </p>
                  <form class="forms-sample" name="relation_form" id="relation_form" method="post" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputUsername1">Seesion *</label>
						  <select class="form-control js-example-basic-single fees_add" id="session" name="session">
							<option value="">Select Session</option>
							<?php if(!empty($session)){ foreach($session as $session_result){?>
							<option value="<?=$session_result->id?>" <?php if(!empty($single) && $single->session_id == $session_result->id){?>selected="selected"<?php }?>><?=$session_result->session_name?></option>
							<?php }}?>
						  </select>
						  <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
						</div>
						</div> 
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Course Name *</label>
                      <select class="form-control js-example-basic-single fees_add" id="course" name="course">
						<option value="">Select Course</option>
						<?php if(!empty($course)){ foreach($course as $course_result){?>
						<option value="<?=$course_result->course?>" <?php if(!empty($single) && $single->course_id == $course_result->course){?>selected="selected"<?php }?>><?=$course_result->course_name?> (<?php if($course_result->course_type == 0){?>Regular<?php }else if($course_result->course_type == 2){?>B.Voc<?php }else{?>Pulp<?php }?>)</option>
						<?php }}?>
					  </select>
					  <div class="error" id="relation_error"></div>
                    </div>
                    </div>
					
					<?php 
						$stream = array();
						if(!empty($single)){
							$stream = $this->Course_model->get_selected_course_stream($single->course_id);
						}
					?>
					<div class="col-md-4">
					
                    <div class="form-group">
                      <label for="exampleInputUsername1">Stream Name *</label>
                      <select class="form-control js-example-basic-single fees_add" id="stream" name="stream">
						<option value="">Select Stream</option>
						<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
						<option value="<?=$stream_result->id?>@@@<?=$stream_result->stream?>" <?php if(!empty($single) && $single->stream_id == $stream_result->stream){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
						<?php }}?>
					  </select>
                    </div>
					</div>
					</div>
					 <div class="row">
					<div class="col-md-4"  style="display:none">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Registration Fees *</label>
                      <input type="text" class="form-control" id="registration_fees" name="registration_fees" value="<?php if(!empty($single)){ echo $single->registration_fees;}?>">
                    </div>
					</div>

					<div class="col-md-4"  style="display:none">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Exam Fees *</label>
                      <input type="text" class="form-control" id="exam_fees" name="exam_fees" value="<?php if(!empty($single)){ echo $single->exam_fees;}?>">
                    </div>
					</div>
<!-- 
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Admission Fees *</label>
                      <input type="text" class="form-control" id="admission_fees" name="admission_fees" value="<?php if(!empty($single)){ echo $single->admission_fees;}?>">
                    </div>
					</div> -->


					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1"> Fees (Year) *</label>
                      <input type="text" class="form-control" id="fees" name="fees" value="<?php if(!empty($single)){ echo $single->fees;}?>">
                    </div>
					</div>

					<div class="col-md-4"  style="display:none">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Campus Fees (Year) *</label>
                      <input type="text" class="form-control" id="campus_fees" name="campus_fees" value="<?php if(!empty($single)){ echo $single->campus_fees;}?>">
                    </div>
					</div>
					<div class="col-md-4"  style="display:none">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Foreign Fees (Year) *</label>
                      <input type="text" class="form-control" id="foregin_fees" name="foregin_fees" value="<?php if(!empty($single)){ echo $single->foregin_fees;}?>">
                    </div>
					</div>
					

					</div>
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
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
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#relation_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			session: {
				required: true,
			},
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			fees: {
				required: true,
				number: true,
			},
			exam_fees:{
				required: true,
				number: true,
			},
			// admission_fees:{
			// 	required:true,
			// 	number:true,
			// },
			campus_fees: {
				required: true,
				number: true,
			},
			registration_fees: {
				required: true,
				number: true,
			},
			foregin_fees: {
				required: true,
				number: true,
			},
		},
		messages: {
			session: {
				required: "Please select session",
			},
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
			fees: {
				required: "Please enter fees",
				number: "Please enter valid fees",
			},
			exam_fees:{
				required: "Please enter exam fees",
				number: "Please enter valid exam fees",
			},
			// admission_fees:{
			// 	required: "Please enter admission fees",
			// 	number: "Please enter valid admission fees",
			// },
			campus_fees: {
				required: "Please enter campus fees",
				number: "Please enter valid fees",
			},
			registration_fees: {
				required: "Please enter registration fees",
				number: "Please enter valid fees",
			},
			foregin_fees: {
				required: "Please enter foregin fees",
				number: "Please enter valid fees",
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
$(".fees_add").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_course_stream_fees",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'session':$("#session").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "0"){
				$("#relation_error").html("");
				$("#save_btn").show();
			}else{
				$("#relation_error").html("This relation is already added");
				$("#save_btn").hide();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#course").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.id + '@@@' + d.stream + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});


$('#session').on('change', function() {
    $('#session').valid();
});
$('#course').on('change', function() {
    $('#course').valid();
});
$('#stream').on('change', function() {
    $('#stream').valid();
});


</script>
 