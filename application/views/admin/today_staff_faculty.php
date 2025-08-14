<?php include('header.php');?>
<link rel="stylesheet" src="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Today Report List</h4>
                  <p class="card-description">
                    <!-- All list of Report -->
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Staff Name</th>
							<th>Date</th>
							<th>Present Student</th>
							<th>Description</th> 
							<th>Approved</th> 
							<th>Approved By</th> 
							<th>Approved Date</th> 
							<th>Remark</th>
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
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Reply Form</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form class="forms-sample" name="syllabus_form" id="syllabus_form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputUsername1">Reply</label>
								<textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
								<input type="hidden" name="report_id" id="report_id" value="">
								<input type="hidden" name="faculty_id" id="faculty_id" value="">
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
				title:"Today Report List",
				messageBottom: 'The information in this table is copyright to Global University.',
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_today_daily_report",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});

function reply_faculty(id,faculty_id) {
  $('#report_id').val('');
  $('#faculty_id').val('');
  
  $('#report_id').val(id);
  $('#faculty_id').val(faculty_id);
}
</script>
 