<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bank Management</h4>
                  <p class="card-description">
                    Please enter Bank details
                  </p>
                  <form class="forms-sample" name="bank_form" id="bank_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Account Holder Name *</label>
                      <input type="text" class="form-control" id="account_holder" name="account_holder" placeholder="Account Holder Name" value="<?php if(!empty($single)){ echo $single->account_holder;}?>">
					  <div class="error" id="id_name_error"></div>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Bank Name *</label>
                      <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" value="<?php if(!empty($single)){ echo $single->bank_name;}?>">
					 </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Account Number *</label>
                      <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" value="<?php if(!empty($single)){ echo $single->account_number;}?>">
					  <div class="error" id="account_error"></div>
					 </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Branch Name *</label>
                      <input type="text" class="form-control" id="branch" name="branch" placeholder="Branch Name" value="<?php if(!empty($single)){ echo $single->branch;}?>">
					 </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">IFSC Code *</label>
                      <input type="text" class="form-control" id="ifsc" name="ifsc" placeholder="IFSC Code" value="<?php if(!empty($single)){ echo $single->ifsc;}?>">
					 </div>
                    <div class="form-group">
						<label for="exampleInputUsername1">Show for challan *</label>
						<select class="form-control js-example-basic-single" name="show_for_challan" id="show_for_challan">
							<option value="1" <?php if(!empty($bank) && $bank->show_status == '1'){?>selected="selected"<?php }?>>Yes</option>
							<option value="0" <?php if(!empty($bank) && $bank->show_status == '0'){?>selected="selected"<?php }?>>No</option>
						</select>
					</div>
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bank List</h4>
                  <p class="card-description">
                    All list of Bank 
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Account Holder</th>
						<th>Account Number</th>
						<th>Bank Name</th>
						<th>Branch Name</th>
						<th>IFSC Code</th>
						<th>Show for Challan</th>
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
	$('#bank_form').validate({
		rules: {
			account_holder: {
				required: true,
			},
			account_number: {
				required: true,
			},
			bank_name: {
				required: true,
			},
			branch: {
				required: true,
			},
			ifsc: {
				required: true,
			},
			show_for_challan: {
				required: true,
			},
		},
		messages: {
			account_holder: {
				required: "Please enter account holder name",
			},
			account_number: {
				required: "Please enter account number",
			},
			bank_name: {
				required: "Please enter bank name",
			},
			branch: {
				required: "Please enter branch name",
			},
			ifsc: {
				required: "Please enter ifsc code",
			},
			show_for_challan: {
				required: "Please select show for challan",
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
$("#account_number").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/ajax_controller/get_unique_bank",
		data:{'account_number':$("#account_number").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "0"){
				$("#account_error").html("");
				$("#save_btn").show();
			}else{
				$("#account_error").html("This account is already added");
				$("#save_btn").hide();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
/*
$(document).ready(function() {
	$('#example').DataTable({
		"processing": true,
		"serverSide": true,
		"cache": false,
		"order": [[0, "asc" ]],
		dom:"Bfrtip",
		buttons: [
			{
				extend: 'copyHtml5',
				exportOptions: {
				 columns: ':contains("Office")'
				}
			},
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5'
		],
		"ajax":{
			"url": "<?=base_url();?>admin/ajax_controller/get_all_bank_ajax",
			"type": "POST",
		},		
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    }); 
});
*/

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
				title :"Bank Management",
				messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
				exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5 ,6],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_bank_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
</script>
 