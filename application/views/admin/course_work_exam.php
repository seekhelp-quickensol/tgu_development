<?php

// echo "<pre>";print_r($stream);exit;
include('header.php');?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Course Work Exam Setup<span style="float: right;"></h4> 
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" name="exam_form" id="exam_form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-lg-3">
							<label for="exampleInputUsername1">Course *</label>
							<!-- <select class="form-control js-example-basic-single course_relation" id="course" name="course" placeholder="Select Course">
								<option value="">Please Select Course</option>
								<?php if(!empty($course)){foreach($course as $course_result){?>
									<option value="<?=$course_result->id;?>"<?php if(!empty($single) && $single->course == $course_result->id){?>selected="selected"<?php }?>><?=$course_result->course_name;?></option>


								<?php }}?>
							</select> -->

							<input type="text" id="course" name="course" class="form-control" value="Ph.D" readonly>
							<input type="hidden" name="course_work_exam_exam_id" id="course_work_exam_id" value="<?php echo $this->uri->segment(2);?>">
						</div>
					
						<div class="form-group col-lg-3">
							<label for="exampleInputUsername1">Exam Type*</label>
							<select class="form-control js-example-basic-single stream_relation" id="exam_type" name="exam_type" placeholder="elect Exam type">
								<option value="" selected disabled >Please Select Exam type</option>
								<option value="1"<?php if(!empty($single) && $single->exam_type == 1){?>selected="selected"<?php }?> >Common Exam</option>
								<option value="2" <?php if(!empty($single) && $single->exam_type == 2){?>selected="selected"<?php }?> >Stream Wise</option>
							</select>
						</div>
						<?php
						 if(!empty($single)){
						 		$stream = $this->Exam_model->get_selected_stream_new($single->course);
						 }
						?>
						<div class="form-group col-lg-3" id="stream_div" <?php if(!empty($single) && $single->exam_type == "1"){?>style="display:none"<?php }else{ ?>style="display:block"<?php }?>>
							<label for="exampleInputUsername1">Stream *</label>
							<select class="form-control js-example-basic-single stream_relation" id="stream" name="stream" placeholder="Select Stream">
								<option value="" selected disabled>Please Select Stream</option>
									<!-- <?php if(!empty($stream)){foreach($stream as $stream_result){?>
									<option value="<?=$stream_result->stream;?>"<?php if(!empty($stream) && $stream_result->stream == $single->stream){?>selected="selected"<?php }?>><?=$stream_result->stream_name;?></option>
									<?php } } ?> -->

									<?php if(!empty($course)){foreach($course as $stream_result){?>
									<option value="<?=$stream_result->stream;?>"<?php if(!empty($stream) && $stream_result->stream == $single->stream){?>selected="selected"<?php }?>><?=$stream_result->stream_name;?></option>
									<?php } } ?>
							</select>
						</div>
						<div class="form-group col-lg-3 reg" <?php if(!empty($single) && $single->exam_type == "2"){?>style="display:block"<?php }else{ ?>style="display:none"<?php }?>>
							<label for="exampleInputUsername1">Exam Name*</label>
               				<input type="text" class="form-control" id="exam_name" name="exam_name" placeholder="Exam Name" value="<?php if(!empty($single)){ echo $single->exam_name;}?>">
					  		<div class="error" id="course_error"></div>
						</div>
						
						
						<div class="form-group col-lg-3 com" <?php if(!empty($single) && $single->exam_type == "1"){?>style="display:block"<?php }else{ ?>style="display:none"<?php }?>>
							 <label for="exampleInputUsername1">Exam Name*</label>
               		<select class="form-control" id="new_exam_name" name="new_exam_name" placeholder="Exam Name"> 
                   <option value="Research Methodology" <?php if(!empty($single) && $single->exam_name == "Research Methodology"){ ?>selected="selected"<?php }?>>Research Methodology</option>
                   <option value="Literature Review" <?php if(!empty($single) && $single->exam_name == "Literature Review"){ ?>selected="selected"<?php }?>>Literature Review</option>
                   </select>
					  		<div class="error" id="course_error"></div>
						</div>
					<!--	<div class="form-group col-lg-3">
							 <label for="exampleInputUsername1">Exam Duration In Minutes*</label>
               <input type="text" class="form-control" id="exam_duration" name="exam_duration" placeholder="Exam Duration In Hours" value="<?php if(!empty($single)){ echo $single->exam_duration;}?>">
					  		<div class="error" id="course_error"></div>
						</div>-->
						<div class="form-group col-lg-3">
							 <label for="exampleInputUsername1">Number Of Question*</label>
               <input type="text" class="form-control" id="no_of_question" name="no_of_question" placeholder="Number Of Question" value="<?php if(!empty($single)){ echo $single->no_of_question;}?>">
					  		<div class="error" id="course_error"></div>
						</div>
						<div class="form-group col-lg-3">
							 <label for="exampleInputUsername1">Exam Date*</label>
               <input type="text" class="form-control datepicker" id="exam_date" name="exam_date"  autocomplete="off" placeholder="Exam Date" value="<?php if(!empty($single)){ echo $single->exam_date;}?>">
					  		<div class="error" id="course_error"></div>
						</div>
						<div class="form-group col-lg-3">
							 <label for="exampleInputUsername1">Start Time*</label>
               <input type="text" class="form-control timepicker" id="start_time" name="start_time"  autocomplete="off" value="<?php if(!empty($single)){ echo $single->start_time;}?>">
					  		<div class="error" id="course_error"></div>
						</div>
						
						<div class="form-group col-lg-3">
							 <label for="exampleInputUsername1">End Time*</label>
               <input type="text" class="form-control timepicker" id="end_time" name="end_time"  autocomplete="off" value="<?php if(!empty($single)){ echo $single->end_time;}?>">
					  		<div class="error" id="course_error"></div>
						</div>

					
					
				<!-- 		<div class="form-group col-lg-3">
							<label for="exampleInputUsername1">Subject *</label>
							<select class="form-control js-example-basic-single" id="subject" name="subject" placeholder="Select Subject">
								<option value="">Please Select Subject</option>
							</select>
						</div> -->
	<!-- 					<div class="form-group col-lg-3">
							<label for="exampleInputUsername1">Upload Excel *</label>
							<input type="file" class="form-control" id="userfile" name="userfile" placeholder="Select Excel">
						</div> -->
					</div>
          <button type="submit" id="save_btn" name="upload" value="Upload" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Stream Course Work Exam List</h4>
                  <p class="card-description">
                    <!-- Stream Course Work Exam List -->
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Course</th>
							<!-- <th>Exam Type</th> -->
							<th>Stream</th>
							<th>Exam Name</th>
							<th>Exam Duration</th>
							<th>Number Of Question</th>
							<th>Exam Date</th>
							<th>Exam Time</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				   </table>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Common Course Work Exam List</h4>
                  <p class="card-description">
                    <!-- Common Course Work Exam List -->
                  </p>
                  <table id="example_1" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Course</th>
							<th>Exam Name</th>
							<th>Exam Duration</th>
							<th>Number Of Question</th>
							<th>Exam Date</th>
							<th>Exam Time</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				   </table>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
 <script>
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
  
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#exam_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			course: {
				required: true,
			},
			exam_name: {
				required: true,
			},
			exam_duration: {
				required: true,
				number: true,

			},
			no_of_question: {
				required: true,
				number: true,
			},
			exam_date: {
				required: true,
			},
			exam_type: {
				required: true,
			},
			stream: {
				required: true,
			},
		},
		messages: {
			course: {
				required: "Please select course",
			},
			exam_name: {
				required: "Enter Exam Name",
			},
			exam_duration: {
				required: "Enter Exam Duration",
			},
			no_of_question: {
				required: "Enter No Of Question",
			},
			exam_date: {
				required: "Enter Exam Date",
			},
			exam_type: {
				required: "Select Exam Type",
			},
			stream: {
				required: "Select Stream",
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

$('#exam_type').on('change', function() {
			$('#exam_type').valid();
		});

$(document).ready(function() { 
	var oldExportAction = function (self, e, dt, button, config) {
        if (button[0].className.indexOf('buttons-excel') >= 0) {
            if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
                $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
            }
            else {
                $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
            }
        } else if (button[0].className.indexOf('buttons-print') >= 0) {
            $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
        }
    };
    
    var newExportAction = function (e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
    
        dt.one('preXhr', function (e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
    
            dt.one('preDraw', function (e, settings) {
                // Call the original action function 
                oldExportAction(self, e, dt, button, config);
    
                dt.one('preXhr', function (e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
    
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
    
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
    
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    };
	
	var table = $('#example').DataTable({
	    "lengthChange": false,
		"processing": true,
		"serverSide": true,
		"responsive": true,
		"cache": false,
		"order": [[0, "desc" ]],
		buttons:[
			
			{
				extend: "excelHtml5",
				title:"Stream Course Work Exam List",
				messageBottom: 'The information in this table is copyright to the global University.',
				exportOptions: {
                    columns: [0, 1,2,3,4,5,6,7,8],
                    modifier: {
						search: 'applied',
						order: 'applied'
					},
                },
                action: newExportAction,
			}
		],
		dom:"Bfrtip",
		
		"ajax":{
			"url" : "<?=base_url();?>admin/Ajax_controller/get_stream_course_work_exam_list_ajax",
			"type": "POST",
			"data":{'exam_id':$("#exam_id").val()},
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});

$(document).ready(function() { 
	var oldExportAction = function (self, e, dt, button, config) {
        if (button[0].className.indexOf('buttons-excel') >= 0) {
            if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
                $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
            }
            else {
                $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
            }
        } else if (button[0].className.indexOf('buttons-print') >= 0) {
            $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
        }
    };
    
    var newExportAction = function (e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
    
        dt.one('preXhr', function (e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
    
            dt.one('preDraw', function (e, settings) {
                // Call the original action function 
                oldExportAction(self, e, dt, button, config);
    
                dt.one('preXhr', function (e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
    
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
    
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
    
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    };
	
	var table = $('#example_1').DataTable({
	    "lengthChange": false,
		"processing": true,
		"serverSide": true,
		"responsive": true,
		"cache": false,
		"order": [[0, "desc" ]],
		buttons:[
			
			{
				extend: "excelHtml5",
				title:"Common Course Work Exam List",
				messageBottom: 'The information in this table is copyright to the global University.',
				exportOptions: {
                    columns: [0, 1,2,3,4,5,6,7],
                    modifier: {
						search: 'applied',
						order: 'applied'
					},
                },
                action: newExportAction,
			}
		],
		dom:"Bfrtip",
		
		"ajax":{
			"url" : "<?=base_url();?>admin/Ajax_controller/get_common_course_work_exam_list_ajax",
			"type": "POST",
			"data":{'exam_id':$("#exam_id").val()},
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});






$('.course_relation').change(function(){
	  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Please Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.stream + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
// $('.stream_relation').change(function(){
// 	$.ajax({
// 		type: "POST",
// 		url: "<?=base_url();?>admin/Ajax_controller/get_stream_subject_ajax",
// 		data:{'course':$("#course").val(),'stream':$("#stream").val()},
// 		success: function(data){
// 			$("#subject").empty();
// 			$('#subject').append('<option value="">Please Select Subject</option>');
// 			var opts = $.parseJSON(data);

// 			$.each(opts, function(i, d) {
// 			   $('#subject').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
// 			});
// 			$('#subject').trigger('change');	
// 		},
// 		 error: function(jqXHR, textStatus, errorThrown) {
// 		   console.log(textStatus, errorThrown);
// 		}
// 	});	
// });

$('#exam_type').change(function(){
	// alert("hiii");
 if($('#exam_type').val()==1){
		$('#stream_div').hide();	
		$('#stream').val('');	
		$('.reg').hide();
		$('.com').show();
	}
	if($('#exam_type').val()==2){	
		$('#stream_div').show();
		$('.com').hide();
		$('.reg').show();
	}
});
<?php if(empty($this->uri->segment(2))){ ?>
	$('#stream_div').hide();	
<?php } ?>



$(document).ready(function(){
    $('input.timepicker').timepicker({});
});


</script>
 