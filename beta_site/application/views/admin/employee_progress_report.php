<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title">Add <?php 
                  // if(!empty($employee)){ echo $employee->first_name;}
                  ?> Employee Progress Report  </h4> -->
                  <h4 class="card-title"><?php if(!empty($employee)){ echo $employee->first_name;}?> Progress Report  </h4>

                  <p class="card-description">
                    Please enter employee progress report details
                  </p>
                  <form class="forms-sample" name="progress_form" id="progress_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Select Month *</label>
                      <select type="text" class="form-control" id="month" name="month">
                        <option value="">Select Month</option>
                        <option value="January" <?php if(!empty($single) && $single->month == 'January'){?> selected <?php }?>>January</option>
                        <option value="February" <?php if(!empty($single) && $single->month == 'February'){?> selected <?php }?>>February</option>
                        <option value="March" <?php if(!empty($single) && $single->month == 'March'){?> selected <?php }?>>March</option>
                        <option value="April" <?php if(!empty($single) && $single->month == 'April'){?> selected <?php }?>>April</option>
                        <option value="May" <?php if(!empty($single) && $single->month == 'May'){?> selected <?php }?>>May</option>
                        <option value="June" <?php if(!empty($single) && $single->month == 'June'){?> selected <?php }?>>June</option>
                        <option value="July" <?php if(!empty($single) && $single->month == 'July'){?> selected <?php }?>>July</option>
                        <option value="August" <?php if(!empty($single) && $single->month == 'August'){?> selected <?php }?>>August</option>
                        <option value="September" <?php if(!empty($single) && $single->month == 'September'){?> selected <?php }?>>September</option>
                        <option value="October" <?php if(!empty($single) && $single->month == 'October'){?> selected <?php }?>>October</option>
                        <option value="November" <?php if(!empty($single) && $single->month == 'November'){?> selected <?php }?>>November</option>
                        <option value="December" <?php if(!empty($single) && $single->month == 'December'){?> selected <?php }?>>December</option>
                      </select>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Select Year *</label>
                      <select type="text" class="form-control" id="year" name="year">
                        <option value="">Select Year</option>  
                        <?php for($year=2020; $year<= date('Y'); $year++){?>
                            <option value="<?=$year?>" <?php if(!empty($single) && $single->year == $year){?> selected <?php }?>><?=$year?></option>
                        <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Upload File *</label>
                      <input type="file" class="form-control" id="upload_file" name="upload_file">
                      <!-- <input type="file" class="form-control" id="file" name="file"> -->

                      <input type="hidden" class="form-control" id="old_upload_file" name="old_upload_file" value="<?php if(!empty($single)){ echo $single->file;}?>">
					          </div>
                                        
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Progress Reports List</h4>
                  <p class="card-description">
                    All Progress Reports
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Month</th>
						<th>Year</th>
						<th>File</th>
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
	$('#progress_form').validate({
		rules: {
			month: {
				required: true,
			},
			year: {
				required: true,
			},
     
        upload_file: {
				required: true,
			},
      
		},
		messages: {
			month: {
				required: "Please select month",
			},
			year: {
				required: "Please select year",
			},

			upload_file: {
				required: "Please upload file",
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
                    columns: [0,1,2],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_employee_progress_reports",
			"type": "POST",
            "data":{"id":'<?=$this->uri->segment(2)?>'},
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});	
</script>