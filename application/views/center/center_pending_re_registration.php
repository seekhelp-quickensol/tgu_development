<?php include('header.php');?>
<style>


td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Pending Re-Registration Student List</h4><p class="card-description">
                 <p class="card-description">
                    All list of Student 
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<!-- <th>Sr. No.</th>
						<th>Registration No</th>
						<th>Enrollment No</th>
						<th>Enrollment Date</th>
						<th>Admission Status</th>
						<th>Center Name</th>
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
						<th>Action</th>
						<th>Letters</th> -->
                        <th>Sr. No.</th>
                        <th>Enrollment Number</th>
                        <!-- <th>Center Name</th> -->
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
					
						<th>Course Mode</th>
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
				title:"Pending Registration Student List",
				messageBottom: 'The information in this table is copyright to the global University.',
				exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8],
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
			"url" : "<?=base_url();?>center/Center_ajax_controller/get_all_pending_re_registration_list",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
   
	
});
// function view_fees(str){
// 	$.ajax({
// 		type: "POST",
// 		url: "<?=base_url();?>center/Center_ajax_controller/get_student_fees_ajax",
// 		data:{'student':str,'type':'1'},
// 		success: function(data){
// 			var inc = 1;
// 			$("#fees_response").html(''); 
// 			var opts = $.parseJSON(data);
// 			$.each(opts, function(i, d) {
// 				var dateAr = d.payment_date.split('-');
// 				var newDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
// 			   $('#fees_response').append('<tr><td>' + inc + '</td><td>' + d.year_sem + '</td><td>' + d.total_fees + '</td><td>' + newDate + '</td></tr>');
			
// 				inc++;
// 			});
// 			$('#myModal').modal('show');
// 		},
// 		 error: function(jqXHR, textStatus, errorThrown) {
// 		   console.log(textStatus, errorThrown);
// 		}
// 	});	  
// }
// function view_exam_fees(str){
// 	$.ajax({
// 		type: "POST",
// 		url: "<?=base_url();?>center/Center_ajax_controller/get_student_fees_ajax",
// 		data:{'student':str,'type':'2'},
// 		success: function(data){
// 			var inc = 1;
// 			$("#fees_response").html(''); 
// 			var opts = $.parseJSON(data);
// 			$.each(opts, function(i, d) {
// 				var dateAr = d.payment_date.split('-');
// 				var newDate = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
// 			   $('#fees_response').append('<tr><td>' + inc + '</td><td>' + d.year_sem + '</td><td>' + d.total_fees + '</td><td>' + newDate + '</td></tr>');
			
// 				inc++;
// 			});
// 			$('#myModal').modal('show');
// 		},
// 		 error: function(jqXHR, textStatus, errorThrown) {
// 		   console.log(textStatus, errorThrown);
// 		}
// 	});	  
// }
</script>
 