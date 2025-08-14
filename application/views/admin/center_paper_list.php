<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Center Paper List</h4>
                  <p class="card-description">
                    <!-- All list of Papers -->
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Center Name</th>
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
				required: "Please select year sem",
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
				title:"Center Paper List",
				messageBottom: 'The information in this table is copyright to the global University.',
				exportOptions: {
                    columns: [0,1,2,3],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_center_all_paper_ajax",
			"type": "POST",
			
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});	
</script>
 