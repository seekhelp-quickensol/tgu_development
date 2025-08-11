<?php include('faculty_header.php');?>
<style>
.after_details{
	display:none;
}
</style> 
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
				<?php if(!empty($video)){?>
				 <h4 class="card-title">Online Classes</h4>
                  <p class="card-description">
                    Please enter details
                  </p>
                  <form class="forms-sample" name="upload_video" id="upload_video" method="post" enctype="multipart/form-data">  
                    <div class="form-group">
                      <label for="exampleInputUsername1">Title *</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?=$video->title?>" readonly>  
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">Video File *</label>
                      <input type="file" class="form-control" id="video_file" name="video_file" placeholder="Upload video">  
                      <input type="hidden" class="form-control" id="old_file" name="old_file" placeholder="Title" value="<?=$video->video?>">
                      <input type="hidden" class="form-control" id="id" name="id"  value="<?=$video->id?>">
                    </div> 
                    <button type="submit" id="upload_video" name="upload_video" value="upload_video" class="btn btn-primary mr-2s">Submit</button>
                    
                  </form>
				<?php }else{?>
                  <h4 class="card-title">Online Classes</h4>
                  <p class="card-description">
                    Please enter details
                  </p>
                  <form class="forms-sample" name="class_form" id="class_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Course *</label>
                      <select class="form-control js-example-basic-single course_relation" id="course" name="course">
                      		<option value="">Select Course</option>
                      		<?php if(!empty($course)){ foreach($course as $course_result){?>
                      			<option value="<?=$course_result->id?>"><?=$course_result->course_name?></option>
                      		<?php }}?>
                      </select>  
                    </div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Stream *</label>
                      <select class="form-control js-example-basic-single course_relation" id="stream" name="stream">
                      		<option value="">Select Stream</option> 
                      </select>  
                    </div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Year/Sem *</label>
                      <select class="form-control js-example-basic-single course_relation" id="year_sem" name="year_sem">
                      		<option value="">Select Year/Sem</option>
                      		<?php for($y=1;$y<=12;$y++){?>
                      			<option value="<?=$y?>"><?=$y?></option>
                      		<?php }?>
                      </select>  
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Title *</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Title">  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Date of Class *</label>
                      <input type="text" class="form-control datepicker" id="meeting_date" name="meeting_date" placeholder="dd/mm/yyyy" value="">  
                    </div> 
					<div class="form-group">
                      <label for="exampleInputUsername1">Time *</label>
                      <input type="text" class="form-control" id="time" name="time" placeholder="Enter Time" value="">  
                    </div>
					<!-- placeholder="10:30" -->
					<div class="form-group">
                      <label for="exampleInputUsername1">Class Duration <small>In Minutes</small>*</label>
                      <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter Class Duration" value="">  
                    </div>	
					<!-- placeholder="30" -->

                    <!--<button type="button" id="get_meeting" class="btn btn-danger mr-2">Get Meeting Details</button>-->
					 <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    <div class="form-group after_details">
                      <label for="exampleInputUsername1">Description of Meeting *</label>
                      <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>  
                    </div> 
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2 after_details">Submit</button>
                    
                  </form>
				<?php }?>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Online Classes List</h4>
                  <p class="card-description">
                    All list of online classes
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>Sr. No.</th>
								<th>Title</th>
								<th>Details of Meeting</th>
								<th>Course</th>
								<th>Stream</th>
								<th>Year/Sem</th>
								<th>Date</th>
								<th>Video</th>
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
	$('#class_form').validate({
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
			title: {
				required: true,
			},
			meeting_date: {
				required: true,
			},
			time: {
				required: true,
			},
			duration: {
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
			year_sem: {
				required: "Please select year/sem",
			},
			title: {
				required: "Please enter title",
			}, 
			meeting_date: {
				required: "Please select meeting date",
			}, 
			time: {
				required: "Please enter time",
			},
			duration: {
				required: "Please enter duration",
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
				title:"Online Classes List",
				messageBottom: 'The information in this table is copyright to the global University.',
				exportOptions: {
                    columns: [0, 1, 2 ,3,4,5,6],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_online_class_meet",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
</script>
 