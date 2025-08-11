<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
			  <div class="card-header custom-header">
			  <h4 class="card-title">Coupon Setting</h4>
              </div>

                <div class="card-body">
                
                  <p class="card-description">
                    Please enter coupon details
                  </p>
                  <form class="forms-sample" name="designation_form" id="designation_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Coupon Code *</label>
                      <input type="text" class="form-control" id="coupon_code" name="coupon_code" placeholder="Coupon Code" value="<?php if(!empty($single)){ echo $single->coupon_code;}?>">
					  <div class="error" id="designation_error"></div>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Amount *</label>
                      <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php if(!empty($single)){ echo $single->amount;}?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Start Date *</label>
                      <input type="text" autocomplete="off" class="form-control datepicker" id="start_date" name="start_date" placeholder="Start Date" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->start_date));}?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputUsername1">End Date *</label>
                      <input type="text" autocomplete="off" class="form-control datepicker" id="end_date" name="end_date" placeholder="End Date" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->end_date));}?>">
                    </div>
                    
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
			  <div class="card-header custom-header">
			  <h4 class="card-title">Coupon Code List</h4>
              </div>


                <div class="card-body">
                 
                  <p class="card-description">
                    All list of Coupon Code
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Coupon Code</th>
						<th>Amount</th>
						<th>Start Date</th>
						<th>End Date</th>
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
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#designation_form').validate({
		rules: {
			coupon_code: {
				required: true,
			},
			amount: {
				required: true,
				number: true,
			},
			start_date: {
				required: true,
			},
			end_date: {
				required: true,
			}, 
		},
		messages: {
			coupon_code: {
				required: "Please enter coupon code",
			},
			amount: {
				required: "Please enter amount",
				number: "Please enter valid amount",
			},
			start_date: {
				required: "Please select start date",
			},
			end_date: {
				required: "Please select end date",
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
$("#coupon_code").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_coupon",
		data:{'coupon_code':$("#coupon_code").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "0"){
				$("#designation_error").html("");
				$("#save_btn").show();
			}else{
				$("#designation_error").html("This coupon is already added");
				$("#save_btn").hide();
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
				messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
				exportOptions: {
                    columns: [0, 1, 2,3,4,5 ],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_coupon_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
</script>
 