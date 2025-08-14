<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Document Verification Detail List</h4><p class="card-description">
                 <p class="card-description">
                   
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Document Name</th>
							<th>Document</th> 
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
                title:"Document Verification Data List",
		        messageBottom: 'The information in this table is copyright to Golbal University.',
		        exportOptions: {
                    columns: [0, 1,3],
                    modifier: {
		            search: 'applied',
		            order: 'applied'
		          },
                },
                action: newExportAction,
     		}
		],
		"ajax":{
			"url": "<?=base_url();?>admin/Ajax_controller/get_all_document_verification_detail_data",
			"type": "POST",
            "data":{
                "document_verification_id":'<?=$this->uri->segment('2');?>',
            }
		},		
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    }); 
}); 
</script>
 