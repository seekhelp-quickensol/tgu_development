<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Create Exam 

							<a href="<?=base_url();?>created_exam_list" class="btn btn-primary mr-2 float-right">View List</a>

							</h4>
							<!-- <p class="card-description"> Please enter details </p> -->
							<form id="topic" method="post" enctype="multipart/form-data">
								<hr>
								<div class="row">
									<div class="form-group col-lg-3 col-md-3">
										<label class="col-form-label">Course Name<span style="color:red;">*</span></label>
										<select  style="height:34px;" name="course_name" id="course_name" class="form-control js-example-basic-single">
											<option value="">Select Course</option>
											<?php if(!empty($course)){ foreach ($course as $course_result){?>
											<option value="<?=$course_result->id?>" <?php if(!empty($single) && $single->course_id == $course_result->id){?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
											<?php } } ?>
										</select> 
									</div>
									<div class="form-group col-lg-3 col-md-3">
										<label class="col-form-label">Stream Name<span style="color:red;">*</span></label>
										<select name="stream" id="stream" style="height:34px;" class="form-control js-example-basic-single" >
											<option value="">Select Stream</option>
											<?php if(!empty($stream)){ foreach ($stream as $stream_result){?>
											<option value="<?=$stream_result->id?>" <?php if(!empty($single) && $single->stream_id == $stream_result->id){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
											<?php } } ?>
										</select> 
									</div>
									<div class="form-group col-lg-3 col-md-3">
										<label class="col-form-label">Year/Sem<span style="color:red;">*</span></label>
										<select name="year_sem" id="year_sem" style="height:34px;" class="form-control username js-example-basic-single" >
											<option value="">Select Year/Sem</option> 
											<?php for($y=1;$y<=12;$y++){?>
											<option value="<?=$y?>" <?php if(!empty($single) && $single->year_sem == $y){?>selected="selected"<?php }?>><?=$y?></option> 
											<?php }?>
										</select> 
									</div>
									<div class="form-group col-lg-3 col-md-3">
										<label class="col-form-label">Exam Name<span style="color:red;">*</span></label>
										<input name="exam_name" id="exam_name" type="text" placeholder="" class="form-control username" value="<?php if(!empty($single)){ echo $single->exam_name;}?>"> 
										<input name="id" id="id" type="hidden"class="" value="<?php if(!empty($single)){ echo $single->id;}?>"> 
									</div> 
									<div class="form-group col-lg-3 col-md-3">
										<label class="col-form-label">Exam Date<span style="color:red;">*</span></label>
										<input readonly name="exam_date" id="exam_date" type="text" placeholder="" class="form-control datepicker" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->exam_date));}?>"> 
									</div> 
									<div class="form-group col-lg-3 col-md-3">
										<label class="col-form-label">Exam Start Time<span style="color:red;">*</span></label>
										<select name="start_time" id="start_time" placeholder="" class="form-control js-example-basic-single">
											<option value="">Select Time</option>
											<option value="01:00" <?php if(!empty($single) && $single->start_time =="01:00:00"){?>selected="selected"<?php }?>>01:00</option>
											<option value="01:30" <?php if(!empty($single) && $single->start_time =="01:30:00"){?>selected="selected"<?php }?>>01:30</option>
											<option value="02:00" <?php if(!empty($single) && $single->start_time =="02:00:00"){?>selected="selected"<?php }?>>02:00</option>
											<option value="02:30" <?php if(!empty($single) && $single->start_time =="02:30:00"){?>selected="selected"<?php }?>>02:30</option>
											<option value="03:00" <?php if(!empty($single) && $single->start_time =="03:00:00"){?>selected="selected"<?php }?>>03:00</option>
											<option value="03:30" <?php if(!empty($single) && $single->start_time =="03:30:00"){?>selected="selected"<?php }?>>03:30</option>
											<option value="04:00" <?php if(!empty($single) && $single->start_time =="04:00:00"){?>selected="selected"<?php }?>>04:00</option>
											<option value="04:30" <?php if(!empty($single) && $single->start_time =="04:30:00"){?>selected="selected"<?php }?>>04:30</option>
											<option value="05:00" <?php if(!empty($single) && $single->start_time =="05:00:00"){?>selected="selected"<?php }?>>05:00</option>
											<option value="05:30" <?php if(!empty($single) && $single->start_time =="05:30:00"){?>selected="selected"<?php }?>>05:30</option>
											<option value="06:00" <?php if(!empty($single) && $single->start_time =="06:00:00"){?>selected="selected"<?php }?>>06:00</option>
											<option value="06:30" <?php if(!empty($single) && $single->start_time =="06:30:00"){?>selected="selected"<?php }?>>06:30</option>
											<option value="07:00" <?php if(!empty($single) && $single->start_time =="07:00:00"){?>selected="selected"<?php }?>>07:00</option>
											<option value="07:30" <?php if(!empty($single) && $single->start_time =="07:30:00"){?>selected="selected"<?php }?>>07:30</option>
											<option value="08:00" <?php if(!empty($single) && $single->start_time =="08:00:00"){?>selected="selected"<?php }?>>08:00</option>
											<option value="08:30" <?php if(!empty($single) && $single->start_time =="08:30:00"){?>selected="selected"<?php }?>>08:30</option>
											<option value="09:00" <?php if(!empty($single) && $single->start_time =="09:00:00"){?>selected="selected"<?php }?>>09:00</option>
											<option value="09:30" <?php if(!empty($single) && $single->start_time =="09:30:00"){?>selected="selected"<?php }?>>09:30</option>
											<option value="10:00" <?php if(!empty($single) && $single->start_time =="10:00:00"){?>selected="selected"<?php }?>>10:00</option>
											<option value="10:30" <?php if(!empty($single) && $single->start_time =="10:30:00"){?>selected="selected"<?php }?>>10:30</option>
											<option value="11:00" <?php if(!empty($single) && $single->start_time =="11:00:00"){?>selected="selected"<?php }?>>11:00</option>
											<option value="11:30" <?php if(!empty($single) && $single->start_time =="11:30:00"){?>selected="selected"<?php }?>>11:30</option>
											<option value="12:00" <?php if(!empty($single) && $single->start_time =="12:00:00"){?>selected="selected"<?php }?>>12:00</option>
											<option value="12:30" <?php if(!empty($single) && $single->start_time =="12:30:00"){?>selected="selected"<?php }?>>12:30</option>
											<option value="13:00" <?php if(!empty($single) && $single->start_time =="13:00:00"){?>selected="selected"<?php }?>>13:00</option>
											<option value="13:30" <?php if(!empty($single) && $single->start_time =="13:30:00"){?>selected="selected"<?php }?>>13:30</option>
											<option value="14:00" <?php if(!empty($single) && $single->start_time =="14:00:00"){?>selected="selected"<?php }?>>14:00</option>
											<option value="14:30" <?php if(!empty($single) && $single->start_time =="14:30:00"){?>selected="selected"<?php }?>>14:30</option>
											<option value="15:00" <?php if(!empty($single) && $single->start_time =="15:00:00"){?>selected="selected"<?php }?>>15:00</option>
											<option value="15:30" <?php if(!empty($single) && $single->start_time =="15:30:00"){?>selected="selected"<?php }?>>15:30</option>
											<option value="16:00" <?php if(!empty($single) && $single->start_time =="16:00:00"){?>selected="selected"<?php }?>>16:00</option>
											<option value="16:30" <?php if(!empty($single) && $single->start_time =="16:30:00"){?>selected="selected"<?php }?>>16:30</option>
											<option value="17:00" <?php if(!empty($single) && $single->start_time =="17:00:00"){?>selected="selected"<?php }?>>17:00</option>
											<option value="17:30" <?php if(!empty($single) && $single->start_time =="17:30:00"){?>selected="selected"<?php }?>>17:30</option>
											<option value="18:00" <?php if(!empty($single) && $single->start_time =="18:00:00"){?>selected="selected"<?php }?>>18:00</option>
											<option value="18:30" <?php if(!empty($single) && $single->start_time =="18:30:00"){?>selected="selected"<?php }?>>18:30</option>
											<option value="19:00" <?php if(!empty($single) && $single->start_time =="19:00:00"){?>selected="selected"<?php }?>>19:00</option>
											<option value="19:30" <?php if(!empty($single) && $single->start_time =="19:30:00"){?>selected="selected"<?php }?>>19:30</option>
											<option value="20:00" <?php if(!empty($single) && $single->start_time =="20:00:00"){?>selected="selected"<?php }?>>20:00</option>
											<option value="20:30" <?php if(!empty($single) && $single->start_time =="20:30:00"){?>selected="selected"<?php }?>>20:30</option>
											<option value="21:00" <?php if(!empty($single) && $single->start_time =="21:00:00"){?>selected="selected"<?php }?>>21:00</option>
											<option value="21:30" <?php if(!empty($single) && $single->start_time =="21:30:00"){?>selected="selected"<?php }?>>21:30</option>
											<option value="22:00" <?php if(!empty($single) && $single->start_time =="22:00:00"){?>selected="selected"<?php }?>>22:00</option>
											<option value="22:30" <?php if(!empty($single) && $single->start_time =="22:30:00"){?>selected="selected"<?php }?>>22:30</option>
											<option value="23:00" <?php if(!empty($single) && $single->start_time =="23:00:00"){?>selected="selected"<?php }?>>23:00</option>
											<option value="23:30" <?php if(!empty($single) && $single->start_time =="23:30:00"){?>selected="selected"<?php }?>>23:30</option>
											<option value="24:00" <?php if(!empty($single) && $single->start_time =="24:00:00"){?>selected="selected"<?php }?>>24:00</option>
											<option value="24:30" <?php if(!empty($single) && $single->start_time =="24:30:00"){?>selected="selected"<?php }?>>24:30</option>
										</select>
									</div> 
									<div class="form-group col-lg-3 col-md-3">
										<label class="col-form-label">Exam End Time<span style="color:red;">*</span></label>
										<select name="end_time" id="end_time" placeholder="" class="form-control js-example-basic-single">
											<option value="">Select Time</option>
											<option value="01:00" <?php if(!empty($single) && $single->end_time =="01:00:00"){?>selected="selected"<?php }?>>01:00</option>
											<option value="01:30" <?php if(!empty($single) && $single->end_time =="01:30v"){?>selected="selected"<?php }?>>01:30</option>
											<option value="02:00" <?php if(!empty($single) && $single->end_time =="02:00:00"){?>selected="selected"<?php }?>>02:00</option>
											<option value="02:30" <?php if(!empty($single) && $single->end_time =="02:30:00"){?>selected="selected"<?php }?>>02:30</option>
											<option value="03:00" <?php if(!empty($single) && $single->end_time =="03:00:00"){?>selected="selected"<?php }?>>03:00</option>
											<option value="03:30" <?php if(!empty($single) && $single->end_time =="03:30:00"){?>selected="selected"<?php }?>>03:30</option>
											<option value="04:00" <?php if(!empty($single) && $single->end_time =="04:00:00"){?>selected="selected"<?php }?>>04:00</option>
											<option value="04:30" <?php if(!empty($single) && $single->end_time =="04:30:00"){?>selected="selected"<?php }?>>04:30</option>
											<option value="05:00" <?php if(!empty($single) && $single->end_time =="05:00:00"){?>selected="selected"<?php }?>>05:00</option>
											<option value="05:30" <?php if(!empty($single) && $single->end_time =="05:30:00"){?>selected="selected"<?php }?>>05:30</option>
											<option value="06:00" <?php if(!empty($single) && $single->end_time =="06:00:00"){?>selected="selected"<?php }?>>06:00</option>
											<option value="06:30" <?php if(!empty($single) && $single->end_time =="06:30:00"){?>selected="selected"<?php }?>>06:30</option>
											<option value="07:00" <?php if(!empty($single) && $single->end_time =="07:00:00"){?>selected="selected"<?php }?>>07:00</option>
											<option value="07:30" <?php if(!empty($single) && $single->end_time =="07:30:00"){?>selected="selected"<?php }?>>07:30</option>
											<option value="08:00" <?php if(!empty($single) && $single->end_time =="08:00:00"){?>selected="selected"<?php }?>>08:00</option>
											<option value="08:30" <?php if(!empty($single) && $single->end_time =="08:30:00"){?>selected="selected"<?php }?>>08:30</option>
											<option value="09:00" <?php if(!empty($single) && $single->end_time =="09:00:00"){?>selected="selected"<?php }?>>09:00</option>
											<option value="09:30" <?php if(!empty($single) && $single->end_time =="09:30:00"){?>selected="selected"<?php }?>>09:30</option>
											<option value="10:00" <?php if(!empty($single) && $single->end_time =="10:00:00"){?>selected="selected"<?php }?>>10:00</option>
											<option value="10:30" <?php if(!empty($single) && $single->end_time =="10:30:00"){?>selected="selected"<?php }?>>10:30</option>
											<option value="11:00" <?php if(!empty($single) && $single->end_time =="11:00:00"){?>selected="selected"<?php }?>>11:00</option>
											<option value="11:30" <?php if(!empty($single) && $single->end_time =="11:30:00"){?>selected="selected"<?php }?>>11:30</option>
											<option value="12:00" <?php if(!empty($single) && $single->end_time =="12:00:00"){?>selected="selected"<?php }?>>12:00</option>
											<option value="12:30" <?php if(!empty($single) && $single->end_time =="12:30:00"){?>selected="selected"<?php }?>>12:30</option>
											<option value="13:00" <?php if(!empty($single) && $single->end_time =="13:00:00"){?>selected="selected"<?php }?>>13:00</option>
											<option value="13:30" <?php if(!empty($single) && $single->end_time =="13:30:00"){?>selected="selected"<?php }?>>13:30</option>
											<option value="14:00" <?php if(!empty($single) && $single->end_time =="14:00:00"){?>selected="selected"<?php }?>>14:00</option>
											<option value="14:30" <?php if(!empty($single) && $single->end_time =="14:30:00"){?>selected="selected"<?php }?>>14:30</option>
											<option value="15:00" <?php if(!empty($single) && $single->end_time =="15:00:00"){?>selected="selected"<?php }?>>15:00</option>
											<option value="15:30" <?php if(!empty($single) && $single->end_time =="15:30:00"){?>selected="selected"<?php }?>>15:30</option>
											<option value="16:00" <?php if(!empty($single) && $single->end_time =="16:00:00"){?>selected="selected"<?php }?>>16:00</option>
											<option value="16:30" <?php if(!empty($single) && $single->end_time =="16:30:00"){?>selected="selected"<?php }?>>16:30</option>
											<option value="17:00" <?php if(!empty($single) && $single->end_time =="17:00:00"){?>selected="selected"<?php }?>>17:00</option>
											<option value="17:30" <?php if(!empty($single) && $single->end_time =="17:30:00"){?>selected="selected"<?php }?>>17:30</option>
											<option value="18:00" <?php if(!empty($single) && $single->end_time =="18:00:00"){?>selected="selected"<?php }?>>18:00</option>
											<option value="18:30" <?php if(!empty($single) && $single->end_time =="18:30:00"){?>selected="selected"<?php }?>>18:30</option>
											<option value="19:00" <?php if(!empty($single) && $single->end_time =="19:00:00"){?>selected="selected"<?php }?>>19:00</option>
											<option value="19:30" <?php if(!empty($single) && $single->end_time =="19:30:00"){?>selected="selected"<?php }?>>19:30</option>
											<option value="20:00" <?php if(!empty($single) && $single->end_time =="20:00:00"){?>selected="selected"<?php }?>>20:00</option>
											<option value="20:30" <?php if(!empty($single) && $single->end_time =="20:30:00"){?>selected="selected"<?php }?>>20:30</option>
											<option value="21:00" <?php if(!empty($single) && $single->end_time =="21:00:00"){?>selected="selected"<?php }?>>21:00</option>
											<option value="21:30" <?php if(!empty($single) && $single->end_time =="21:30:00"){?>selected="selected"<?php }?>>21:30</option>
											<option value="22:00" <?php if(!empty($single) && $single->end_time =="22:00:00"){?>selected="selected"<?php }?>>22:00</option>
											<option value="22:30" <?php if(!empty($single) && $single->end_time =="22:30:00"){?>selected="selected"<?php }?>>22:30</option>
											<option value="23:00" <?php if(!empty($single) && $single->end_time =="23:00:00"){?>selected="selected"<?php }?>>23:00</option>
											<option value="23:30" <?php if(!empty($single) && $single->end_time =="23:30:00"){?>selected="selected"<?php }?>>23:30</option>
											<option value="24:00" <?php if(!empty($single) && $single->end_time =="24:00:00"){?>selected="selected"<?php }?>>24:00</option>
											<option value="24:30" <?php if(!empty($single) && $single->end_time =="24:30:00"){?>selected="selected"<?php }?>>24:30</option>
										</select>
									</div>
									<div class="form-group col-lg-3 col-md-3">
										<label class="col-form-label">Total Exam Marks</label>
										<input name="total_marks" id="total_marks" type="number" min="1" placeholder="" class="form-control" value="<?php if(!empty($single)){ echo $single->total_marks;}?>"> 
									</div>
									<div class="form-group col-lg-12 col-md-12">
										<label class="col-form-label">Exam Description</label>
										<textarea name="exam_description" id="exam_description" type="text" placeholder="" class="form-control"><?php if(!empty($single)){ echo $single->exam_description;}?></textarea> 
									</div> 
									 
								</div> 
								<br><br>
								<button class="btn btn-sm btn-primary submit-btn" type="submit">Submit</button>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>

<script type="text/javascript">
$("#course_name").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
		data:{'course':$("#course_name").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="'+ d.stream + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});

$(document).ready(function(){
	$("#topic").validate({
		rules:{
			course_name:{
				required:true,
			},
			stream:{
				required:true,
			},
			year_sem:{
				required:true,
			},
			exam_name:{
				required:true,
			},
			exam_date:{
				required:true,
			},
			start_time:{
				required:true,
			}, 
			end_time:{
				required:true,
			},  
			total_marks:{
				required:true,
			},   
		},
		messages:{
			course_name:{
				required:"Please select course",
			},
			stream:{
				required:"Please select stream",
			},
			year_sem:{
				required:"Please select year/sem",
			},
			exam_name:{
				required:"Please enter exam name",
			},
			exam_date:{
				required:"Please select exam date",
			},
			start_time:{
				required:"Please select start time",
			}, 
			end_time:{
				required:"Please select end time",
			},  
			total_marks:{
				required:"Please enter total marks",
			},   
		}, 
		errorPlacement: function(error, element) {
			  if (element.hasClass('select2-hidden-accessible')) {
				error.insertAfter(element.next('.select2-container').find('.select2-selection__rendered'));
			  } else {
				error.insertAfter(element);
			  }
			}
		});
		$('.js-example-basic-single').on('select2:select', function() {
    $(this).valid();
  });
}); 
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		minDate:0,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
});
</script>  