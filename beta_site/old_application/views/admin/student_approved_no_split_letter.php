<?php include('header.php');?>
<style>
	.row-btns{
		height:48px !important;
    line-height:25px;
    color:#fff !important;
	}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Approved No Split Issue Letter</h4><p class="card-description">
				     <form method="post" name="send_to_print" id="send_to_print">
						<input type="checkbox" id="toggle-all">
						<a type="submit" name="send_btn" class="btn btn-primary row-btns" value="send_btn" style="padding: 10px;margin: 10px;margin-top: -12px;">Send to Print</a>
						 	
                 <p class="card-description">
                    All list  
                  </p>
				   
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Check/Uncheck</th>
						<th>Print Count</th> 
						<!--<th>University Name</th>-->
						<th>Student Name</th>
						<th>Enrollment No</th>
						<th>Payment Status</th>
						<th>Issue Date</th>
						<th>Transaction Id</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			</form>
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
        title:"Approved No Split Issue Letter",
				messageBottom: 'The information in this table is copyright to The Global University.',
				exportOptions: {
                    columns: [0,2,3,4,5,6,7],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_approv_no_split_list",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
		"drawCallback": function(settings) {
			$(".tranfer_uni").keyup(function(){
				var id = $(this).attr("id");
				id = id.split("-");
				$.ajax({
					type: "POST",
					url: "<?=base_url();?>admin/Ajax_controller/set_update_letter_transfer_university",
					data:{'id':id[1],'tranfer_university':$(this).val(),'tbl':'tbl_no_split_application'},
					success: function(data){ 
					},
					 error: function(jqXHR, textStatus, errorThrown) {
					   console.log(textStatus, errorThrown);
					}
				});	
			});
        }
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
$(document).ready(function(){
  // Toggle all checkboxes
  $('#toggle-all').click(function(){
    $('.checkbox').prop('checked', $(this).prop('checked'));
  });
  
  // Toggle the "Toggle All" checkbox if all checkboxes are checked or unchecked
  $('.checkbox').click(function(){
    if($('.checkbox:checked').length == $('.checkbox').length){
      $('#toggle-all').prop('checked', true);
    } else {
      $('#toggle-all').prop('checked', false);
    }
  });
});	

</script>
 