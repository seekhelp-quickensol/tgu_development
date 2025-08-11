<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<h4 class="card-title">Offline Document Verification List
						<a href="<?=base_url();?>offline_document_verification_add" class="btn btn-primary mr-2 float-right">Add Document Verification</a>
					</h4><p class="card-description">
					<p class="card-description"></p>
					<form method="get">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<select name="type" class="form-control">
											<option value="">Select Type</option>
											<option value="0">Regular</option>
											<option value="1">Blended</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<input type="submit" class="btn btn-primary" value="Search">
								</div>
							</div>
						</div>	
					</form>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Status</th>
							<th>Department Name</th>
							<th>Department Address</th>
							<th>City</th>
							<th>Pin code</th>
							<th>Mobile number</th>
							<th>Email</th>
							<th>Student name</th>
							<th>Enrollment number</th>

							<th>Passing year</th>
							<th>Course name</th>
							<th>Query</th>
							<th>Payment status</th>
							<th>Transaction Id</th>
							<th>Amount</th>
							<th>Created On</th>
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
$type = "";
if($this->input->get('type') !=""){
	$type = $this->input->get('type');
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
	
	
	$('#example').DataTable({
		"processing": true,
		"serverSide": true,
		"cache": false,
		"order": [[0, "asc" ]],
		dom:"Bfrtip",
		buttons: [
			{
		        extend: "excelHtml5",
				title:"Offline Document Verification List",
		        messageBottom: 'The information in this table is copyright to Global University.',
		        exportOptions: {
					columns: [0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13,14,15,16], 
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
		"ajax":{
			"url": "<?=base_url();?>admin/Ajax_controller/get_all_document_verification_data_offline",
			"type": "POST",
			"data": {'type':'<?=$type?>'},
		},		
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    }); 
}); 
</script>
 