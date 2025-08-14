<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Student List Pulp</h4><p class="card-description">
                 <p class="card-description">
                    All list of Student 
					 <a href="<?=base_url();?>activate-login" class="btn btn-primary" style="float: right;">Activate Login</a>
				   <a href="<?=base_url();?>hold-login" class="btn btn-danger" style="float: right;">Hold Login</a>
                  </p>
				   <form method="get">
				  <div class="row">
					
				  <div class="col-md-4">
				  <input type="text" autocomplete="off" name="start_date" id="start_date" class="form-control datepicker" placeholder="Start Date" value="<?php if(isset($_GET['start_date'])){ echo $_GET['start_date'];}?>">
				  </div>
				  
				  <div class="col-md-4">
				  <input type="text" autocomplete="off" name="end_date" id="end_date" class="form-control datepicker" placeholder="End Date" value="<?php if(isset($_GET['end_date'])){ echo $_GET['end_date'];}?>">
				  </div>
				  
				  <div class="col-md-4">
				  <button type="submit" class="btn btn-primary">Search</button>
				  </div>
				  </div>
				  </form>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Class Mode</th>
						<th>Registration No</th>
						<th>Enrollment No</th>
						<th>Enrollment Date</th>
						<th>Registration Date</th>
						<th>Admission Status</th>
						<th>Center Name</th>
						<th>Employee Type</th>
						<th>Student Name</th>
						<th>Father Name</th>
						<th>Mother Name</th>
						<th>Mobile Number</th>
						<th>Email</th>
						<th>Session</th>
						<th>Faculty</th>
						<th>Course Type</th>
						<th>Course Name</th>
						<th>Stream Name</th>
						<th>Course Mode</th>
						<th>Entry Type</th>
						<th>Study Mode</th>
						<th>Current Year/Sem</th>
						<th>Total Payable Fees</th>
						<th>Total Paid Admission Fees</th>
						<th>Total Paid Exam Fees</th>
						<th>Identity Type</th>
						<th>Identity Number</th>
						<th>Identity Softcopy</th>
						<th>Action</th>
						<th>Hold/Active Login</th>
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
		
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Cancel Reason</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form class="forms-sample" name="syllabus_form" id="syllabus_form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputUsername1">Remark</label>
								<textarea class="form-control" id="remark" name="remark" placeholder="Remark" required></textarea>
								<input type="hidden" name="student_id" id="student_id" value="">
							</div>
						</div>
					</div>
					<button type="submit" id="save_btn" name="save_btn" class="btn btn-primary mr-2" value="reply_submit">Submit</button> 
				</form>
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
                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25],
                    modifier: {
						search: 'applied',
						order: 'applied'
					},
                },
				customizeData: function(data) {
					for(var i = 0; i < data.body.length; i++) {
					  for(var j = 0; j < data.body[i].length; j++) {
						data.body[i][j] = '\u200C' + data.body[i][j];
					  }
					}
				},
                action: newExportAction,
			}
		],
		dom:"Bfrtip",
		
		"ajax":{
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_admission_list_pulp",
			"type": "POST",
			"data":{'start_date':$("#start_date").val(),'end_date':$("#end_date").val()},
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
function cancel_student(student_id) {
  $('#student_id').val('');
  
  $('#student_id').val(student_id);
}
</script>
 