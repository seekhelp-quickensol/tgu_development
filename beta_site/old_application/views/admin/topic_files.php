<?php include('header.php');?>
<style>
    .error{
        color:red;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"><?php if(!empty($topic)){ echo $topic->topic_name_show;}?></h4>
							<p class="card-description"> Please enter file details </p>
							<form id="topic" method="post" enctype="multipart/form-data">
								<hr>
								<div class="row">
									<div class="form-group col-lg-12 col-md-12">
										<label class="col-form-label">File Title<span style="color:red;">*</span></label>
										<input name="title" id="title" type="text" placeholder="" class="form-control" value="<?php if(!empty($single)){ echo $single->title;}?>"> 
										<input name="id" id="id" type="hidden" placeholder="" class="form-control" value="<?php if(!empty($single)){ echo $single->id;}?>"> 
										<input name="topic_id" id="topic_id" type="hidden" placeholder="" class="form-control" value="<?=$this->uri->segment(2)?>"> 
									</div>
									<div class="form-group col-lg-12 col-md-12">
										<label class="col-form-label">Upload File<span style="color:red;">*</span><?php if(!empty($single) && $single->file !="" && $single->file != "NULL"){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('uploads/topic/'.$single->file)?>">View</a><?php }?></label>
										<input name="userfile" id="userfile" type="file" class="form-control" accept=".pdf"> 
										<input name="old_file" id="old_file" type="hidden" class="form-control" value="<?php if(!empty($single)){ echo $single->file;}?>"> 
									</div> 
								</div> 
								<br><br>
								<button class="btn btn-sm btn-success submit-btn" type="submit">Submit</button>
							</div>	
						</form>
					</div>
				</div>
				<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">File List</h4><p class="card-description">
                 <p class="card-description">
                    
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Title</th>
                        <th>File</th> 
                        <th>Created Date</th> 
                        <th>Status</th>
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
	</div>
</div>
<?php include("footer.php"); ?>
<script type="text/javascript"> 

$(document).ready(function(){
	$("#topic").validate({
		rules:{
			title:{
				required:true,
			},
			<?php if(empty($single)){?>
			userfile:{
				required:true,
			},
			<?php }?> 
		},
		messages:{
			title:{
				required:"Please enter title",
			},
			<?php if(empty($single)){?>
			userfile:{
				required:"Please upload file",
			},
			<?php }?> 
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
                title:"File List",
                messageBottom: 'The information in this table is copyright to global University.',
                exportOptions: {
                    columns: [0, 1,2,3,4],
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
            "url" : "<?=base_url();?>admin/Online_controller/get_all_topic_file_ajax",
            "type": "POST",
        },  
        "complete": function() {
            $('[data-toggle="tooltip"]').tooltip();         
        },
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
    
});
</script>  