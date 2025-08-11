<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Documents Setting</h4>
                  <p class="card-description">
                    Please enter document details
                  </p>
                  <form class="forms-sample" name="document_form" id="document_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Head Name*</label>
                      <select class="form-control js-example-basic-single" id="head_name" name="head_name">
						<option value="">Select Head</option>
						<?php if(!empty($head)){ foreach($head as $head_result){
							if(!empty($doc_previledge)){
								$previledges = explode(',',$doc_previledge->privilege);
							}else{
								$previledges = array();
							}
							if(in_array($head_result->id,$previledges)){
							?>
						<option value="<?=$head_result->id?>" <?php if(!empty($single) && $single->head_id == $head_result->id){?>selected="selected"<?php }?>><?=$head_result->head_name?></option>
						<?php }}}?>
					  </select>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    </div>
					 <div class="form-group">
                      <label for="exampleInputUsername1">Sub Head Name*</label>
                      <select class="form-control js-example-basic-single" id="sub_head_name" name="sub_head_name">
						<option value="">Select Sub Head</option>
						<?php if(!empty($sub_head)){ foreach($sub_head as $sub_head_result){?>
						<option value="<?=$sub_head_result->id?>" <?php if(!empty($single) && $single->sub_head_id == $sub_head_result->id){?>selected="selected"<?php }?>><?=$sub_head_result->name?></option>
						<?php }}?>
					  </select>
                    </div>
					<div class="form-group">
                      <label>document* &nbsp;&nbsp;&nbsp;
					  <?php if(!empty($single) && $single->document != ""){?>
						<a href="<?=$this->Digitalocean_model->get_photo('uploads/'.$single->document)?>" target="_blank">View</a>
						<?php }?>
					  </label>
                      <input type="file" name="photo" id="photo" class="file-upload-default" accept=".pdf,.png,.jpeg,.jpg,.xls,.xlsx">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload document">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
					  <input type="hidden" class="form-control" id="old_photo" name="old_photo" value="<?php if(!empty($single)){ echo $single->document;}?>">
					  </div>
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Document List</h4>
                  <p class="card-description">
                    <!-- All list of documents -->
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Head Name</th>
						<th>Sub Head Name</th>
						<th>View</th>
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
	$('#document_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			head_name: {
				required: true,
			},
			sub_head_name: {
				required: true,
			},
			<?php if(empty($single)){?>
			photo: {
				required: true,
			},
			<?php }?>
		},
		messages: {
			head_name: {
				required: "Please select head name",
			},
			sub_head_name: {
				required: "Please select sub head name",
			},
			<?php if(empty($single)){?>
			photo: {
				required: "Please upload document",
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


$('#head_name').on('change', function() {
			$('#head_name').valid();
		});

		$('#sub_head_name').on('change', function() {
			$('#sub_head_name').valid();
		});
$("#head_name").change(function(){ 
	//alert($('#country').val());
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_all_sub_head_ajax",
		data:{'head_id':$("#head_name").val()},
		success: function(data){
			$("#sub_head_name").empty();
			$('#sub_head_name').append('<option value="">Select sub head name</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#sub_head_name').append('<option value="' + d.id + '">' + d.name + '</option>');
			});
			$('#sub_head_name').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
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
				title:"Document List",
				messageBottom: 'The information in this table is copyright to Global University.',
				exportOptions: {
                    columns: [0, 1,2,4],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_document_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});

</script>
 