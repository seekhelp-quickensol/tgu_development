<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Document Verification Detail</h4>
                  <p class="card-description">
                    Please enter details
                  </p>
                  <form class="forms-sample" name="paper_form" id="paper_form" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Courier/Speed post Tracking Number<span class="req">*</span></label>
						<input type="text" name="courier_number" id="courier_number" class="form-control " placeholder="Courier/Speed post Tracking Number"  value="<?php if(!empty($single)){ echo $single->courier_number;}?>">
					</div>
					<div class="form-group">
						<label>Dispatch Date<span class="req">*</span></label>
						<input type="text" name="dispatch_date" id="dispatch_date" class="form-control datepicker" placeholder="Dispatch Date" value="<?php if(!empty($single)){ echo $single->dispatch_date;}?>">
					</div>
					<div class="form-group">
						<label>Transaction ID<span class="req">*</span></label>
                        <input class="form-control"  type="text" name="transaction_id" id="transaction_id" value="<?php if(!empty($single)){ echo $single->transaction_id;}?>">
						<input type="hidden" id="hidden_id" name="hidden_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
					</div>
                    <div class="form-group">
						<label>Payment Status<span class="req">*</span></label> 
                        <select class="form-control"  type="text" name="payment_status" id="payment_status">
                            <option value="">Select Payment Status</option>
                            <option value="0" <?php if(!empty($single) && $single->payment_status == '0'){?>selected="selected"<?php }?>>Failed</option>
                            <option value="1" <?php if(!empty($single) && $single->payment_status == '1'){?>selected="selected"<?php }?>>Success</option>
                        </select>
                        <!-- <input class="form-control"  type="text" name="payment_status" id="payment_status" value="<?php if(!empty($single)){ echo $single->payment_status;}?>"> -->
						
					</div>
                    <!-- <div class="form-group">
						<label>Payment Date <span class="req">*</span></label>
                        <input class="form-control"  type="text" name="payment_date" id="payment_date" value="<?php if(!empty($single)){ echo $single->transaction_id;}?>">
						
					</div> -->
				
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
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
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#paper_form').validate({
		rules: {
			courier_number: {
				required: true,
			},
			dispatch_date: {
				required: true,
			},  
			transaction_id: {
				required: true,
			},  
			payment_status: {
				required: true,
			},  
		},
		messages: {
			courier_number: {
				required: "Please enter courier/speed post number",
			},
			dispatch_date: {
				required: "Please select dispatch status",
			}, 
			transaction_id: {
				required: "Please enter transaction id",
			},  
			payment_status: {
				required: "Please select payment status",
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

$("#course").change(function(){
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$("#course_mode").html("<option value=''>Select Course Mode</option>");
	  $.ajax({
		  type: "post",
		  url: "<?=base_url();?>admin/Ajax_controller/get_stream_name_course",
		  data:{'course':$("#course").val()},
		  success: function(data){    
			  console.log(data);
			  $('#stream').empty(); 
			  $('#stream').append('<option value="">Select Stream</option>');
			  var opts = $.parseJSON(data);
			  $.each(opts, function(i, d) {
				  $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
			  });
			  $('#stream').trigger("chosen:updated");
		  },
		  error: function(jqXHR, textStatus, errorThrown) { 
			  console.log(textStatus, errorThrown);
		  }
	  });	
  });


  $("#stream").change(function(){
     $("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$("#course_mode").html("<option value=''>Select Course Mode</option>");
	 $.ajax({
		 type: "post",
		 url: "<?=base_url();?>admin/Ajax_controller/get_subject_name_stream",
		 data:{'stream':$("#stream").val()},
		 success: function(data){    
			 console.log(data);
			 $('#subject').empty(); 
			 $('#subject').append('<option value="">Select Subject</option>');
			 var opts = $.parseJSON(data);
			 $.each(opts, function(i, d) {
				 $('#subject').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
			 });
			 $('#subject').trigger("chosen:updated");
		 },
		 error: function(jqXHR, textStatus, errorThrown) { 
			 console.log(textStatus, errorThrown);
		 }
	 });

	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_course_mode",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#course_mode").html(data); 
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});		 
 });
 
 $("#course_mode").change(function(){  
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'course_mode':$("#course_mode").val()},
		success: function(data){
			$("#year_sem").html(data);
			$.ajax({
				type: "POST",
				url: "<?=base_url();?>web/Web_controller/get_course_stream_fees",
				data:{'session':$("#session").val(),'course':$("#course").val(),'stream':$("#stream").val(),'country':$("#country").val()},
				success: function(data){
					data =  data.split("@@@");
					$("#late_fees").val(data[1]);
					$("#admission_fees").val(data[0]);
					$("#total_admission_fees").val(parseInt(data[0])+parseInt(data[1]));
					late_cal();
				},
				 error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});	
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
				title: 'Paper List Excel -THE GLOBAL UNIVERSITY',
				messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
				exportOptions: {
                    columns: [0,1,2,3,4,5,6],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_paper_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});	
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
});

</script>
 