<?php include('header.php');?>
<style>
	.error{
		color:red;
	}
</style>
 
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Assign Guide To Scholar</h4>
                  <!-- <p class="card-description">
                    Please enter details
                  </p> -->
                  <form class="forms-sample" name="scholar_form" id="scholar_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Guide Name *</label>
                      <select class="form-control js-example-basic-single select2_single" id="guide_name" name="guide_name">
						<option value="">Select Guide</option>
						<?php if(!empty($guide)){ foreach($guide as $guide_result){?>
						<option value="<?=$guide_result->id?>" <?php if(!empty($single) && $single->guide_id == $guide_result->id){?>selected="selected"<?php }?>><?=$guide_result->name?></option>
						<?php }}?>
					  </select>
					  <div class="error" id="relation_error"></div>
					 </div>
					 <div class="form-group">
                      <label for="exampleInputUsername1">Co-Guide Name </label>
                      <select class="form-control js-example-basic-single select2_single" id="co_guide_name" name="co_guide_name">
						<option value="">Select Co-Guide</option>
						<?php if(!empty($guide)){ foreach($guide as $guide_result){?>
						<option value="<?=$guide_result->id?>" <?php if(!empty($single) && $single->co_guide_id == $guide_result->id){?>selected="selected"<?php }?>><?=$guide_result->name?></option>
						<?php }}?>
					  </select>
					  <div class="error" id="co_guide_relation_error"></div>

					 </div>
					 <div class="form-group">
					  <label for="exampleInputUsername1">Student Name *</label>
                      <select class="form-control js-example-basic-single select2_single" id="student_name" name="student_name">
						<option value="">Select Student</option>
						<?php if(!empty($student)){ foreach($student as $student_result){?>
						<option value="<?=$student_result->id?>" <?php if(!empty($single) && $single->id == $student_result->id){?>selected="selected"<?php }?>>Name: <?=$student_result->student_name?> |Enrollment : <?=$student_result->enrollment_number?> | Stream: <?=$student_result->stream_name?> | Session: <?=$student_result->session_name?></option>
						<?php }}?>
					</select>  
					<div class="error" id="student_name_error"></div>
					
                    </div> 
					<div class="form-group">
					  <label for="exampleInputUsername1">Guide Fees *</label>
                      <input type="text" class="form-control" id="guide_fees" name="guide_fees" value="<?php if(!empty($single->guide_fees)){echo $single->guide_fees;}?>"></input>
					</div> 
					<div class="form-group">
					  <label for="exampleInputUsername1">Co Guide Fees </label>
                      <input type="text" class="form-control" id="co_guide_fees" name="co_guide_fees" value="<?php if(!empty($single->guide_fees)){echo $single->co_guide_fees;}?>"></input>
					</div> 
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Assign Guide To Scholar List</h4>
                  <p class="card-description">
                    <!-- All list of Assigned scholar -->
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Guide Name</th>
						<th>Guide Contact Number</th>
						<th>Guide Fees</th>
						<th>Student Name</th>
						<th>Student Contact Number</th>
						<th>Enrollment Number</th>
						<th>Stream Name</th>
						<th>Session</th>
						<th>Co-Guide Name</th>
						<th>Co-Guide Mobile</th>
						<th>Co-Guide Fees</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<!-- <td>hello</td> -->
					</tr>
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
 //$(".chosen-select").chosen({disable_search_threshold: 10});
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#scholar_form').validate({
		rules: {
			guide_name: {
				required: true,
			},
			student_name: {
				required: true,
			},
			guide_fees: {
				required: true,
				number: true,
			},
		},
		messages: {
			guide_name: {
				required: "Please select guide name",
			},
			student_name: {
				required: "Please select student name",
			},
			guide_fees: {
				required: "Please enter guide fee amount",
				number: "Enter digits only"
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


$('#guide_name').on('change', function() {
    $('#guide_name').valid();
});

$('#student_name').on('change', function() {
    $('#student_name').valid();
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
				title:"Assign Guide To Scholar List",
				messageBottom: 'The information in this table is copyright to the global University.',
				exportOptions: {
                    columns: [0, 1,2,3,4,5,6,7,8,9,10,11],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_assigned_scholar_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
});
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css"/> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" /> -->
<script>
	$(document).ready(function () {
		//Select2
		$(".chosen-select").select2({
			maximumSelectionLength: 2,
		});
		//Chosen
		/*$(".chosen-select").chosen({
			max_selected_options: 2,
		});*/
	});
</script>

<script>
	$(".scholar_relation").on("change", function(){ 
	if($("#guide_name").val() != "" && $("#student_name").val() != ""){
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_guide_student",
		data:{'guide_name':$("#guide_name").val(),'student_name':$("#student_name").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "0"){
				$("#relation_error").html("");
				$("#student_name_error").html("");
				$("#save_btn").show();
			}else{
				$("#student_name_error").html("This relation is already added");
				$("#save_btn").hide();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}
});
</script> 

<script>
	$(".relation_scholar").on("change", function(){ 
	if($("#guide_name").val() != "" && $("#co_guide_name").val() != ""){

	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_guide_co_guide_student",
		data:{'guide_name':$("#guide_name").val(),'co_guide_name':$("#co_guide_name").val(),'id':'<?=$id?>'},

		success: function(data){
			// alert(data)
			if(data == "0"){
				$("#relation_error").html("");
				$("#co_guide_relation_error").html("");
				$("#save_btn").show();
			}else{
				$("#co_guide_relation_error").html("You can't select same guide and co-guide name for student");
				$("#save_btn").hide();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}
});
</script> 