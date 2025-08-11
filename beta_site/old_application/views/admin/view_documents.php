<?php include('header.php');?>
<link rel="stylesheet" src="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Center Documents</h4>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Documents</th>
						</tr>
					</thead>
				
            
                    <tbody>
                            <!-- <?php if(!empty($documents)) { $i = 1; foreach($documents as $documents_result) { ?>
                                <tr>
                                    <th><?=$i++;?></th>
                                    <td>
                                        <?php               
                                            $image_filenames = explode(',', $documents_result->other_doc);
                                        ?>                                
                                        <?php foreach ($image_filenames as $filename) { ?>                                        
                                            <?php  if (!empty($filename)){
                                                $document = $this->Digitalocean_model->get_photo('images/center/other_document/'.$filename); 
                                            }?>
                                            <?php if (!empty($filename) && !empty($document)) { ?>
                                                <a href="<?=$document?>" target="_blank" class="btn btn-success"><?=$filename;?></a>
                                            <?php } else if(empty($filename) && empty($document)){ ?>
                                                <span>Documents not found</span>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php }}?> -->




                            <?php if (!empty($documents)) { $i = 1; foreach ($documents as $documents_result) { ?>
                                <?php 
                                $image_filenames = explode(',', $documents_result->other_doc);
                                foreach ($image_filenames as $filename) {
                                    if (!empty($filename)) {
                                        $document = $this->Digitalocean_model->get_photo('images/center/other_document/'.$filename); 
                                    }
                                ?>
                                <tr>
                                    <th><?=$i++;?></th>
                                    <td>
                                        <?php if (!empty($filename) && !empty($document)) { ?>
                                            <a href="<?=$document?>" target="_blank" class="btn btn-success"><?=$filename;?></a>
                                        <?php } else if(empty($filename) && empty($document)){ ?>
                                            <span>Document not found</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php }}} ?>
                            
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
	
	var table = $('#example').DataTable({
	    "lengthChange": false,
		//"processing": true,
		//"serverSide": true,
		"responsive": true,
		"cache": false,
		//"order": [[0, "desc" ]],
		buttons:[
			
			{
				extend: "excelHtml5",
                title:"Center Documents",
				messageBottom: 'The information in this table is copyright to The global University.',
				exportOptions: {
                    columns: [0, 1],
                    modifier: {
						search: 'applied',
						order: 'applied'
					},
                },
                action: newExportAction,
			}
		],
		dom:"Bfrtip",
		
		
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
// $(".table").addClass('table-responsive');
</script>
 