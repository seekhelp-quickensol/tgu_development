<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add  Papers</h4>
                  <p class="card-description">
                    Please enter papers details
                  </p>
                  <form class="forms-sample" name="paper_form" id="paper_form" method="post" enctype="multipart/form-data">
					 <div class="form-group">
                      <label for="exampleInputUsername1">Course Name *</label>
					  <select class="form-control js-example-basic-single course_relation" id="course" name="course">
						<option value="">Select Course</option>
						<?php if(!empty($course)){ foreach($course as $course_result){?>
						<option value="<?=$course_result->id?>"  <?php if(!empty($single) && $single->course_id == $course_result->id){?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
						<?php }}?>
					  </select>
					  <div class="error" id="relation_error"></div>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    </div>

					<div class="form-group">
                      <label for="exampleInputUsername1">Stream Name *</label>
                      <select class="form-control js-example-basic-single course_relation" id="stream" name="stream">
						<option value="">Select Stream</option>
						<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
						<option value="<?=$stream_result->id?>" <?php if(!empty($single) && $single->stream_id == $stream_result->id){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
						<?php }}?>
					  </select>
                    </div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Subject Name *</label>
                      <select class="form-control js-example-basic-single course_relation" id="subject" name="subject">
						<option value="">Select Subject</option>
						<?php if(!empty($subject)){ foreach($subject as $subject_result){?>
						<option value="<?=$subject_result->id?>" <?php if(!empty($single) && $single->subject_id == $subject_result->id){?>selected="selected"<?php }?>><?=$subject_result->subject_name?></option>
						<?php }}?>
					  </select>
                    </div>
					<?php $course_mode = '';
						if(!empty($single)){
							$course_mode = $this->Admin_model->get_selected_course_mode($single->course_id,$single->stream_id);
						}
					?>
					<div class="form-group">
						<label>Mode <span class="req">*</span></label>
						<select id="course_mode" name="course_mode" class="form-control js-example-basic-single course_relation">
							<option value="">Select Course Mode</option>
							<?php if(!empty($course_mode)){?>
								<?php if($course_mode->course_mode == "1"){ ?>
									<option value='1' <?php if(!empty($single) && $single->course_mode == '1'){?>selected="selected"<?php }?>>Year</option>
								<?php }else if($course_mode->course_mode == "2"){?>
									<option value='2' <?php if(!empty($single) && $single->course_mode == '2'){?>selected="selected"<?php }?>>Semester</option>
								<?php }else if($course_mode->course_mode == "4"){?>
									<option value='4' <?php if(!empty($single) && $single->course_mode == '4'){?>selected="selected"<?php }?>>Month</option>
								<?php }else if($course_mode->course_mode == "3"){?>
									<option value='1' <?php if(!empty($single) && $single->course_mode == '1'){?>selected="selected"<?php }?>>Year</option>
									<option value='2' <?php if(!empty($single) && $single->course_mode == '2'){?>selected="selected"<?php }?>>Semester</option>
								<?php }else{?>
									<option value=''>Select Course Mode</option>
								<?php }?>
							<?php }?>
						</select>
					</div>
					<?php $course_year_sem = '';
					
						if(!empty($single)){
							$course_year_sem = $this->Admin_model->get_selected_year_sem($single->course_id,$single->stream_id,$single->course_mode);
						}
					?>
					<div class="form-group">
						<label>Semester/Year/Month <span class="req">*</span></label>
						<select id="year_sem" name="year_sem" class="form-control js-example-basic-single">
							<option value="">Select Semester/Year/Month</option>
							<?php if(!empty($course_year_sem)){
									if(!empty($single) && $single->course_mode == "1"){
										$mode = "Year";
										$entry_year = $course_year_sem->year_duration;
										for($s=1;$s<=$entry_year;$s++){
							?>
									<option value="<?=$s;?>" <?php if(!empty($single) && $single->year_sem == $s){?>selected="selected"<?php }?>><?=$s." ".$mode;?></option>
								
									<?php }?>
							<?php }else if(!empty($single) && $single->course_mode == "2"){
								
									$mode = "Semester";
									$entry_year = $course_year_sem->sem_duration;
									for($s=1;$s<=$entry_year;$s++){
							?>
									<option value="<?=$s;?>" <?php if(!empty($single) && $single->year_sem == $s){?>selected="selected"<?php }?>><?=$s." ".$mode;?></option>
							
									<?php }?>
							<?php }else if(!empty($single) && $single->course_mode == "4"){
								
								$mode = "Month";
								$entry_year = $course_year_sem->month_duration;
								for($s=1;$s<=$entry_year;$s++){
							?>
									<option value="<?=$s;?>" <?php if(!empty($single) && $single->year_sem == $s){?>selected="selected"<?php }?>><?=$s." ".$mode;?></option>
							
									<?php }?>
								<?php }?>
							<?php }?>
						</select>
					</div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Session *</label>
                      <select class="form-control js-example-basic-single course_relation" id="session" name="session">
						<option value="">Select Session</option>
						<?php if(!empty($session)){ foreach($session as $session_result){?>
						<option value="<?=$session_result->id?>" <?php if(!empty($single) && $single->session_id == $session_result->id){?>selected="selected"<?php }?>><?=$session_result->session_name;?></option>
						<?php }}?>
					  </select>
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputUsername1">Upload File *</label>
					  <input type="hidden" class="form-control" id="old_file" name="old_file" value="<?php if(!empty($single)){ echo $single->file;}?>">
                 
                      <input type="file" class="form-control" id="file" name="file" placeholder="File" value="<?php if(!empty($single)){ echo $single->file;}?>">
                    </div>
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Paper List</h4>
                  <p class="card-description">
                    All list of Papers
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Course Name</th>
						<th>Stream Name</th>
						<!-- <th>Subject Name</th>
						<th>Course Mode</th>
						<th>Year/Sem.</th>
						<th>Session</th>
						<th>File</th>
						<th>Status</th> -->
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
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#paper_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			subject: {
				required: true,
			},
			session: {
				required: true,
			},
			course_mode: {
				required: true,
			},
			year_sem: {
				required: true,
			},
			<?php if(!empty($single) && $single->file !=""){  }else{ ?>
			file: {
				required: true,
			},
			<?php  } ?>
		},
		messages: {
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
			subject: {
				required: "Please select subject",
			},
			session: {
				required: "Please select session",
			},
			course_mode: {
				required: "Please select course mode",
			},
			year_sem: {
				required: "Please select semester/year/month",
			},
			file: {
				required: "Please select file to upload",
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

		$('#course').on('change', function() {
			$('#course').valid();
		});

		$('#stream').on('change', function() {
			$('#stream').valid();
		});

		$('#subject').on('change', function() {
			$('#subject').valid();
		});

		$('#session').on('change', function() {
			$('#session').valid();
		});

		$('#course_mode').on('change', function() {
			$('#course_mode').valid();
		});

		$('#year_sem').on('change', function() {
			$('#year_sem').valid();
		});


$("#course").change(function(){
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$("#course_mode").html("<option value=''>Select Course Mode</option>");
	  $.ajax({
		  type: "post",
		  url: "<?=base_url();?>admin/Ajax_controller/get_stream_name_course",
		  data:{'course':$("#course").val()},
		  success: function(data){    
			  console.log(data);
			  $('#stream').empty(); 
			  $('#stream').append('<option value="">Select Stream</option>');
			  var opts = $.parseJSON(data);
			  $.each(opts, function(i, d) {
				  $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
			  });
			  $('#stream').trigger("chosen:updated");
		  },
		  error: function(jqXHR, textStatus, errorThrown) { 
			  console.log(textStatus, errorThrown);
		  }
	  });	
  });


  $("#stream").change(function(){
     $("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$("#course_mode").html("<option value=''>Select Course Mode</option>");
	 $.ajax({
		 type: "post",
		 url: "<?=base_url();?>admin/Ajax_controller/get_subject_name_stream",
		 data:{'stream':$("#stream").val()},
		 success: function(data){    
			 console.log(data);
			 $('#subject').empty(); 
			 $('#subject').append('<option value="">Select Subject</option>');
			 var opts = $.parseJSON(data);
			 $.each(opts, function(i, d) {
				 $('#subject').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
			 });
			 $('#subject').trigger("chosen:updated");
		 },
		 error: function(jqXHR, textStatus, errorThrown) { 
			 console.log(textStatus, errorThrown);
		 }
	 });

	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_course_mode",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#course_mode").html(data); 
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});		 
 });
 
 $("#course_mode").change(function(){  
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'course_mode':$("#course_mode").val()},
		success: function(data){
			$("#year_sem").html(data);
			$.ajax({
				type: "POST",
				url: "<?=base_url();?>web/Web_controller/get_course_stream_fees",
				data:{'session':$("#session").val(),'course':$("#course").val(),'stream':$("#stream").val(),'country':$("#country").val()},
				success: function(data){
					data =  data.split("@@@");
					$("#late_fees").val(data[1]);
					$("#admission_fees").val(data[0]);
					$("#total_admission_fees").val(parseInt(data[0])+parseInt(data[1]));
					late_cal();
				},
				 error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
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
				// title: 'Paper List Excel -THE GLOBAL UNIVERSITY',
				title: 'Paper List',

				messageBottom: 'The information in this table is copyright to Global University.',
				exportOptions: {
                    columns: [0,1,2],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_paper_ajax",
			"type": "POST",
			
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});	
</script>
 