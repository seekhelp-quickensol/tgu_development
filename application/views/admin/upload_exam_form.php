<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Exam papper Upload</h4>
                  <p class="card-description">
                    
                  </p>
                  <form class="forms-sample" name="exam_form" id="exam_form" method="post" enctype="multipart/form-data">
				  <div class="row">
                        <?php if(!empty($edit_data)):  ?>
                        <input type="hidden" name="id" value="<?=$edit_data->id;?>">
                        <?php endif; ?>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Course *</label>
                      <select class="form-control" id="course" name="course">
						<option value="">Select</option>
						<?php if(!empty($course)){ foreach($course as $course_result){?>
						<option value="<?=$course_result->id?>" <?php if(!empty($edit_data) && $edit_data->course == $course_result->id){?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
						<?php }}?>
					  </select>
					</div>
					</div>
					<?php 
					$stream = array();
					if(!empty($single)){
						$stream = $this->Course_model->get_selected_stream($single->course_id);
					}
					?>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Stream *</label>
                      <select class="form-control" id="stream" name="stream">
						<option value="">Select Stream</option>
						<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
						<option value="<?=$stream_result->stream?>" <?php if(!empty($single) && $single->stream_id == $stream_result->stream){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
						<?php }}?>
					  </select>
					</div>
					</div>
					<?php $duration = 0;
						if(!empty($single)){
							$duration = $this->Exam_model->get_course_stream_duration($single->course_id,$single->stream_id);
						}
					?>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Year/Sem*</label>
                      <select class="form-control" id="year_sem" name="year_sem">
						<option value="">Select Year/Sem</option>
						<?php for($y=1;$y<=$duration;$y++){?>
						<option value="<?=$y?>" <?php if(!empty($single) && $single->year_sem ==$y){?>selected="selected"<?php }?>><?=$y?></option>
						<?php }?>
					  </select>
					</div>
					</div>
					<?php 
					$subject = array();
					if(!empty($single)){
						$subject = $this->Exam_model->get_selected_course_subject($single->course_id,$single->stream_id,$single->year_sem);
					}
					?>
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Subject*</label>
                      <select class="form-control" id="subject" name="subject">
						<option value="">Select Subject</option>  
						<?php if(!empty($subject)){ foreach($subject as $subject_result){?>
						<option value="<?=$subject_result->id?>"  <?php if(!empty($single) && $single->subject_id ==$subject_result->id){?>selected="selected"<?php }?>><?=$subject_result->subject_code?> <?=$subject_result->subject_name?></option>  
						<?php }}?>
					  </select>
					</div>
					</div>

					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">File*</label>
                      <input type="hidden" name="old_file" value="<?php if(!empty($edit_data)){echo $edit_data->file;}?>">
                      <input type="file" name="file" id="file-id" class="form-control" accept=".pdf,.docx, .csv">
					</div>
					</div>
					


					</div>
                    
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Exam Papper List</h4>
                  <p class="card-description">
                    All list of Pappers
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						
						<th>Course</th>
						<th>Stream</th>
						<th>Subject</th>
						<th>Year/Sem</th>
						
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
    
        <!-- all papper data ends heres -->
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
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
  
  $("#course").change(function(){  
	if($(this).val() == "23"){
		$("#payment_option").show();
	}else{
		$("#payment_option").hide();
	}
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
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
$("#stream").change(function(){  
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
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
$("#year_sem").change(function(){  
    $('#subject').html("<option value=''>Select Subject</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_subject",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'year_sem':$("#year_sem").val()},
		success: function(data){
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#subject').append('<option value="' + d.id + '">' + d.subject_code + ' ' + d.subject_name + '</option>');
			});
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
$('#exam_form').validate({
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
        subject:{
            required:true,
        },
        <?php if(empty($edit_data)): ?>
        file:{
            required:true,
        }
		<?php endif; ?>
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
		subject:{
            required:"Please select subject",
        }, 
        file:{
            required:"Please enter exam papper.",
        }
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

$(document).ready(function(){




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
                    columns: [0, 1,2,3,4,5],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_examination_papper_list_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });




    
    <?php if(!empty($edit_data)): ?>
        $("#year_sem").html("<option value=''>Select Semester/Year</option>");
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
            
                $("#stream").val(<?=$edit_data->stream;?>);
             
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	


        //for year sem
        $.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",
		data:{'course':<?=$edit_data->course;?>,'stream':<?=$edit_data->stream;?>},
		success: function(data){
			$("#year_sem").html(data);
                
                $("#year_sem").val(<?=$edit_data->year_sem;?>);
        
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	

        //For subject 
        $.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_subject",
		data:{'course':<?=$edit_data->course;?>,'stream':<?=$edit_data->stream;?>,'year_sem':<?=$edit_data->year_sem;?>},
		success: function(data){
			var opts = $.parseJSON(data);
            
			$.each(opts, function(i, d) {
			   $('#subject').append('<option value="' + d.id + '">' + d.subject_code + ' ' + d.subject_name + '</option>');
			});
         $("#subject").val(<?=$edit_data->subject;?>);
                
        
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	


    <?php endif; ?>
});
</script>
 