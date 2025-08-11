<?php include('faculty_header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Syllabus Setting</h4>
							<p class="card-description"> Please enter Syllabus details </p>
							<form class="forms-sample" name="syllabus_form" id="syllabus_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputUsername1">Syllabus Name *</label>
											<input type="text" class="form-control" id="syllabus_name" name="syllabus_name" placeholder="Syllabus Name" value="<?php if(!empty($single)){ echo $single->syllabus_name;}?>">
											<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
											<input type="hidden" class="form-control" id="old_file" name="old_file" value="<?php if(!empty($single)){ echo $single->files;}?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputUsername1">Description</label>
											<textarea class="form-control" id="description" name="description" placeholder="Description"><?php if(!empty($single)){ echo $single->description;}?></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputUsername1">File <?php if(empty($single)){?>*<?php }?></label>
											<input type="file" class="form-control" id="userfile" name="userfile[]" multiple>
										</div> 
									</div>
								</div>
								<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
							</form>
						</div>
					</div>
				</div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Syllabus List</h4>
                  <p class="card-description">
                    All list of Syllabus
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Syllabus Name</th> 
						<th>Syllabus</th> 
						<th>Description</th>  
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
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#syllabus_form').validate({
		ignore:[],
		rules: {
			syllabus_name: {
				required: true,
			},
			<?php if(empty($single)){?>
			'userfile[]': {
				required: true,
			},
			<?php }?>
		},
		messages: {
			syllabus_name: {
				required: "Please enter syllabus name",
			},
			<?php if(empty($single)){?>
			'userfile[]': {
				required: "Please upload syllabus",
			},
			<?php }?>
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
                    columns: [0, 1, 2, 3, 4, 5 ],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_my_all_syllabus",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
</script>
 