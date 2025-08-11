<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title">Time Table <a href="<?=base_url();?>time_sheet_list" class="btn btn-primary mr-2 float-right">View List</a></h4><p class="card-description">
                    Please enter Time Table details
                  </p>
                  <form class="forms-sample" name="relation_form" id="relation_form" method="post" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Course Name *</label>
							  <select class="form-control js-example-basic-single exist_fees course_list" id="course" name="course">
								<option value="">Select Course</option>
								<?php if(!empty($course)){ foreach($course as $course_result){
										if($course_result->course_type == "1"){
											$type = "Pulp";
										}else{
											$type = "Regular";
										}
								?>
								<option value="<?=$course_result->course?>"><?=$course_result->course_name .'('.$type.')'?></option>
								<?php }}?>
							  </select>
							  <div class="error" id="relation_error"></div>
							</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
						  <label for="exampleInputUsername1">Stream Name *</label>
						  <select class="form-control js-example-basic-single exist_fees course_list" id="stream" name="stream">
							<option value="">Select Stream</option>
							<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
							<option value="<?=$stream_result->id?>" <?php if(!empty($single) && $single->stream == $stream_result->id){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
							<?php }}?>
						  </select>
						</div>
					</div>
					</div>
					 <div class="row">
						<div class="col-md-4">
							<div class="form-group">
							  <label for="exampleInputUsername1">Year/Sem *</label>
							  <select class="form-control js-example-basic-single" id="year_sem" name="year_sem">
								<option value="">Select</option>
								<?php for($y=1;$y<=12;$y++){?>
								<option value="<?=$y?>"><?=$y?></option>
								<?php }?>
							  </select>
							</div>
						</div> 
						<div class="col-md-4">
							<div class="form-group">
							  <label for="exampleInputUsername1">Exam Month *</label>
							  <select class="form-control js-example-basic-single" id="exam_month" name="exam_month">
								<option value="">Select</option>
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
							  </select>
							</div>
						</div> 
						<div class="col-md-4">
							<div class="form-group">
							  <label for="exampleInputUsername1">Exam Year*</label>
							  <select class="form-control js-example-basic-single" id="exam_year" name="exam_year">
								<option value="">Select</option>
								<?php for($y=2023;$y<=date("Y");$y++){?>
								<option value="<?=$y?>"><?=$y?></option>
								<?php }?>
							  </select>
							</div>
						</div> 
					</div> 
					<div class="manual">
					 <div class="row">
						<div class="col-md-12">
							 <table class="resultTable"> 
									<td  class="heading" style="width:500px">Subject Name</td>
									<td  class="heading" style="width:400px">Date</td>
									<td  class="heading" style="width:400px">Day</td> 
								</tr>  
								<?php
									for($i=1;$i<20;$i++){
								?>                      
									<tr>
										<td><input type="text" name="subject[]" id="subject<?php echo $i ?>" class="form-control" value=""/></td>
										<td><input type="text" name="date[]" id="date<?php echo $i ?>" class="form-control datepicker"/></td>
										<td>
											<select name="day[]" id="day<?php echo $i ?>" class="form-control">
												<option value="">Select Day</option>
												<option value="Monday">Monday</option>
												<option value="Tuesday">Tuesday</option>
												<option value="Wednesday">Wednesday</option>
												<option value="Thursday">Thursday</option>
												<option value="Friday">Friday</option>
												<option value="Saturday">Saturday</option>
												<option value="Sunday">Sunday</option>
											</select>
										</td>
									</tr>
								<?php
									}
								?>
							</table>
						</div>
					</div>
					
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
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
 $("#add_type").change(function(){
	 if($(this).val() == "1"){
		 $(".manual").hide();
		 $(".excel").show();
	 }else{
		 $(".excel").hide();
		 $(".manual").show();
	 }
 });
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
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			course_mode: {
				required: true,
			},
			year_sem: {
				required: true,
			},
			exam_month: {
				required: true,
			},
			exam_year: {
				required: true,
			},
		},
		messages: {
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
			course_mode: {
				required: "Please select course mode",
			},
			year_sem: {
				required: "Please select year/sem",
			},
			exam_month: {
				required: "Please select exam month",
			},
			exam_year: {
				required: "Please select exam year",
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
		},
		submitHandler: function(form) {
			if(checkSubject()==false){
				return false;
			}else{
				form.submit();
			}
		}
	});
	$('#course').on('change', function() {
    $('#course').valid();
});
$('#stream').on('change', function() {
    $('#stream').valid();
});
$('#exam_year').on('change', function() {
    $('#exam_year').valid();
});
$('#year_sem').on('change', function() {
    $('#year_sem').valid();
});
$('#exam_month').on('change', function() {
    $('#exam_month').valid();
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
$(".exist_fees").change(function(){   
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_mode",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#course_mode").empty();
			$("#course_mode").html(data);
			$('#course_mode').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
function checkSubject(){
	var valid=true;
	if($(".manual").is(":visible")){
		if (document.getElementById("subject1").value.length==0 || document.getElementById("day1").value.length==0 || document.getElementById("date1").value.length==0)
		{
			alert ("Please fill all fields for subject 1");
			valid=false;
		}
	   for(i=2;i<=10;i++){
			if (document.getElementById("subject" + i).value.length!=0 || document.getElementById("date" + i).value.length!=0 || document.getElementById("day" + i).value.length!=0)
				if (document.getElementById("subject" + i).value.length==0 || document.getElementById("day" + i).value.length==0 || document.getElementById("date" + i).value.length==0)
				{
					alert ("Please fill all fields for subject " + i);
					valid=false;
					break;
				}   
		}
	}
	return valid;
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
  } );
</script>
 