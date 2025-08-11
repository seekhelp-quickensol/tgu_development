<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Failed Re-evaluation List
				  </h4>
                  <!-- <p class="card-description">
                    All list of center's
                  </p> -->
					  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
                            <th>Center Name</th>
							<th>Student Name</th>
							<th>Course Name</th>
							<th>Stream Name</th>
							<th>Enrollment Number</th>
							<th>Year/Sem</th>
							<th>Course Mode</th>
							<!-- <th>Status</th> -->
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
if(isset($_GET['type']) && $_GET['type'] != ''){
	$type = $_GET['type'];
}else{
	$type = '0';
}
?>
 <script>
$(document).ready(function() { 
	var type = <?php echo $type; ?>;
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
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                setTimeout(dt.ajax.reload, 0);
                return false;
            });
        });
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
                    columns: [0,1,2,3,4,5,6,7],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_failed_re_evaluation_ajax",
			"type": "POST",
			'data':{ 'type':type },
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();		
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
});


</script>


 