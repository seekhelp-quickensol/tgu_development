<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   
				   <?php if($this->session->userdata('admin_id') =="1"){?>
				   <form method="post">
					   <div class="row">
							<div class="col-md-6">
								<label>Center</label>
								<select class="form-control" name="center" id="center_name">
									<option value="">Select</option>
									<option value="All">All</option>
									<?php if(!empty($centers)){ foreach($centers as $centers_result){?>
									<option value="<?=$centers_result->id?>"><?=$centers_result->center_name?></option>
									<?php }}?>
								</select>
							</div>
							<div class="col-md-6">
								<button class="btn btn-primary" type="submit" name="activate" value="activate">Activate Login</button>
								<button class="btn btn-danger" value="hold" name="hold">Hold Login</button>
							</div> 
					   </div>
				   </form>
				   <?php }?>
				   <br>
				<hr>
				  <div class="clearfix"></div>
				  <div class="col-md-12">
				   <form method="get">
				  <div class="row">
					
				  <div class="col-md-3">
					<input type="text" autocomplete="off" name="start_date" id="start_date" class="form-control datepicker" placeholder="Start Date" value="<?php if(isset($_GET['start_date'])){ echo $_GET['start_date'];}?>">
				  </div> 
				  <div class="col-md-3">
					<input type="text" autocomplete="off" name="end_date" id="end_date" class="form-control datepicker" placeholder="End Date" value="<?php if(isset($_GET['end_date'])){ echo $_GET['end_date'];}?>">
				  </div>
				  <div class="col-md-2">
					<select name="session" id="session" class="form-control">
						<option value="">Session</option>
						<?php if(!empty($session)){ foreach($session as $session_result){?>
						<option value="<?=$session_result->id?>" <?php if(isset($_GET['session']) && $_GET['session'] == $session_result->id){ ?>selected="selected"<?php }?>><?=$session_result->session_name?></option>
						<?php }}?>
					</select>
				  </div>
				  <div class="col-md-2">
					<select class="form-control" name="center" id="center">
						<option value="">Center</option>
						<?php if(!empty($centers)){ foreach($centers as $centers_result){?>
						<option value="<?=$centers_result->id?>" <?php if(isset($_GET['center']) && $_GET['center'] == $centers_result->id){ ?>selected="selected"<?php }?>><?=$centers_result->center_name?></option>
						<?php }}?>
					</select>
				  </div>
				  
				  <div class="col-md-2">
				  <button type="submit" class="btn btn-primary">Search</button>
				  <a href="<?=base_url();?>enrolled_student_list" class="btn btn-danger">Reset</a>
				  </div>
				  </div>
				  </form>
				  </div>
				  <hr>
				  
				   <h4 class="card-title">Student List
				   </h4><p class="card-description">
                 <p class="card-description">
                    All list of Student 
                  </p>
				   
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Username</th>
						<th>Password</th> 
						<th>Registration No</th>
						<th>Enrollment No</th>  
						<th>Admission Date</th>
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
						<th>Current Year/Sem</th>
						<th>Fees</th>
						<th>Religion</th> 
						<th>Specify Religion</th> 
						<th>Address</th> 
						<th>State</th> 
						<th>Pincode</th> 
						<th>Identity Type</th>
						<th>Identity Number</th>
						<th>Identity Softcopy</th> 
						<th>Photo</th>
						<th>Signature</th>
						<th>Single Document</th> 
						<th>Documents </th> 
						<th>Action</th>
						<th>Hold/Activate</th>
						<th>Hall Ticket</th>
						<th>Remark</th>
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
				title:"Enrolled Student List",
				messageBottom: 'The information in this table is copyright to The Global University.',
				exportOptions: {
                    columns: [0, 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_enrolled_student_admission_list",
			"type": "POST",
			"data":{'start_date':$("#start_date").val(),'end_date':$("#end_date").val(),'session':$("#session").val(),'center':$("#center").val()},
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
</script>

 