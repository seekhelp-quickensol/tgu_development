<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card priviledge-form">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Privilege Setting</h4>
                  <p class="card-description">
                    Please enter Privilege details
                  </p>
                  <form class="forms-sample" name="id_form" id="id_form" method="post" enctype="multipart/form-data">
					<div class="row form-group">
							<div class="col col-md-3">
								<label class=" form-control-label">Privilege </label>
							</div>
							<div class="col-12 col-md-9">
								<select name="privilege" id="privilege" class="form-control">
									<option value="">Select Privilege</option>
									<?php if(!empty($active_privilege)){ foreach($active_privilege as $privilege_result){?>
									<option value="<?=$privilege_result->id?>" <?php if(!empty($single) && $single->privilege == $privilege_result->id) {?>selected="selected"<?php }?>><?=$privilege_result->name?></option>
									<?php }}?>
								</select>
								<span  for="privilege" generated="true" class="error invalid-feedback" style="display: none;">Please select privilege!</span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label class=" form-control-label">Level</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" name="level" id="level" class="form-control" value="<?php if(!empty($single)){ echo $single->level;}?>">
								<span for="level" generated="true" class="error invalid-feedback" style="display: none;">Please select label!</span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label class=" form-control-label">Link</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" name="link" id="link" class="form-control" value="<?php if(!empty($single)){ echo $single->link;}?>">
								<input type="hidden" name="id" id="id" class="form-control" value="<?php if(!empty($single)){ echo $single->id;}?>">
								<div class="error" id="des_error"></div>
								<span for="link" generated="true" class="error invalid-feedback" style="display: none;">Please enter link!</span>
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
                  <h4 class="card-title">ID Privilege List</h4>
                  <p class="card-description">
                    All list of Privilege
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					 <tr>
						<th>Sr.No</th>
						<th>Privilege Level</th> 
						<th>Level</th> 
						<th>Status</th> 
						<th class="">Action</th>
						
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
	$('#id_form').validate({
		rules: {
			privilege: "required", 		
			level: "required", 		
			link: "required", 	
		},
		messages: {
			privilege: "Please select privilege!",  
			level: "Please select label!",  
			link: "Please enter link!",  
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


$("#link").keyup(function(){ 
	$.ajax({
        type: "POST",
        url: "<?=base_url();?>admin/Ajax_controller/get_unique_privilege_link",
        data:{'link':$("#link").val(),'id':'<?=$id?>'},
        success: function(data){ console.log(data);
           if(data == 0){
			   $("#save_btn").show();
			   $("#des_error").html('');
		   }else{
			   $("#save_btn").hide();
			   $("#des_error").html('Link already added');
		   }
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
				title:"User Sub Privilege",
				messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
				exportOptions: {
                    columns: [0, 1,2 ,3],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_privilege_link_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});	
</script>
 