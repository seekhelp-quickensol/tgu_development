<?php include('faculty_header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Attendance Setting</h4>
							<p class="card-description"> Please enter Attendance details </p>
							<form class="forms-sample" name="register_form" id="register_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="course">Course Name*</label>
											<select class="form-control subject_event" id="course" name="course">
												<option value="">Select Course</option>
												<?php if(!empty($course)){ foreach($course as $course_result){?>
												<option value="<?=$course_result->id?>" <?php if(!empty($single) && $single->course == $course_result->id){?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<?php 
										$stream = array();
										if(!empty($single)){
											$stream = $this->Faculty_model->get_selected_course_stream($single->course);
										}
									?>
									<div class="col-md-6">
										<div class="form-group">
											<label for="stream">Stream Name*</label>
											<select class="form-control subject_event" id="stream" name="stream">
												<option value="">Select Stream</option>
												<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
												<option value="<?=$stream_result->id?>" <?php if(!empty($single) && $single->stream == $stream_result->id){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
												<?php }}?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="year_sem">Year/Sem *</label>
											<select class="form-control subject_event" id="year_sem" name="year_sem">
												<option value="">Select Year/Sem</option>
												<?php for($y=1;$y<=6;$y++){?>
												<option value="<?=$y?>" <?php if(!empty($single) && $single->year_sem == $y){?>selected="selected"<?php }?>><?=$y?></option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="subject_name">Subject Name *</label>
											<select class="form-control" id="subject_name" name="subject_name">
												<option value="">Select Subject</option>
											</select>
										</div>
									</div>
									
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="register_name">Total Present Student *</label>
											<input type="number" class="form-control" id="present_student" name="present_student" placeholder="Total Present Student" value="<?php if(!empty($single)){ echo $single->register_name;}?>">
											<div class="error" id="id_name_error"></div>
											<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
										</div>
									</div>
									</div>
								<div class="clearfix"></div>
								<div class="row">
									<div class= "col-lg-12 col-md-12 col-sm-12">
										<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Today Attendance List</h4>
                  <p class="card-description">
                    All list of Attendance
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Course Name</th> 
						<th>Stream Name</th> 
						<th>Year/Sem</th> 
						<th>Subject</th> 
						<th>Present Student</th> 
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
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#register_form').validate({
		ignore:[],
		rules: {
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			subject_name: {
				required: true,
			},
			year_sem: {
				required: true,
			},
			present_student: {
				required: true,
			}
		},
		messages: {
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
			subject_name: {
				required: "Please enter subject name",
			},
			year_sem: {
				required: "Please select year/sem",
			}, 
			present_student: {
				required: "Please enter present student",
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
				messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
				exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5 ],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_today_attendanc_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
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
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$(".subject_event").change(function(){ 
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_subject",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'year_sem':$("#year_sem").val()},
		success: function(data){
			$("#subject_name").empty();
			$('#subject_name').append('<option value="">Select Subject</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#subject_name').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
			});
			$('#subject_name').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
</script>
 