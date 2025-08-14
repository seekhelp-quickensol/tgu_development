<?php
// echo "<pre>";print_r($single);exit;
include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 grid-margin">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title">Manage Center Course Sharing</h4>
				  <p class="card-description">
                    Please enter center details
                  </p>
                  <form class="forms-sample" name="relation_form" id="relation_form" method="post" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    <div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="exampleInputUsername1">Course Name *</label>
							  <select class="form-control js-example-basic-single exist_fees course_list" id="course" name="course">
								<option value="">Select Course Name</option>
								<?php if(!empty($course)){ foreach($course as $course_result){?>
								<option value="<?=$course_result->id?>" <?php if(!empty($single) && $single->course_id == $course_result->id){?>selected<?php }?>><?=$course_result->course_name?></option>
								<?php }}?>
							  </select>
							  <div class="error" id="relation_error"></div>
							</div>
						</div>
						<?php 
							if(!empty($single)){ 
								$stream = $this->Center_model->get_selected_stram($single->course_id); 
								// echo "<pre>";print_r($stream);exit;
							}
						?>
						<div class="col-md-12">
							<div class="form-group">
							  <label for="exampleInputUsername1">Stream Name *</label>
							  <select class="form-control js-example-basic-single exist_fees course_list" id="stream" name="stream">
								<option value="">Select Stream Name</option>
								<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
									<option value="<?=$stream_result->id?>" <?php if(!empty($single) && $single->stream_id == $stream_result->stream){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
								<?php }}?>
							  </select>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
							  <label for="exampleInputUsername1">Center Name*</label>
							  <select class="form-control js-example-basic-single exist_fees course_list" id="center" name="center">
								<option value="">Select Center Name</option>
								<?php if(!empty($center)){ foreach($center as $center_result){?>
								<option value="<?=$center_result->id?>" <?php if(!empty($single) && $single->center_id == $center_result->id){?>selected="selected"<?php }?>><?=$center_result->center_name?></option>
								<?php }}?>
							  </select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							  <label for="exampleInputUsername1">Share (In %) *</label>
							  <input type="text" class="form-control" id="share" name="share" value="<?php if(!empty($single)){ echo $single->share; }?>">
							</div>
						</div>
					</div>
					<div class="row">
						
					</div>
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
				
              </div>
            </div>
			<div class="col-md-8 grid-margin">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Manage Center Course Sharing List</h4>
						<p class="card-description">
							All list
						</p>
						<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
							<thead>
								<tr>
									<th>Sr. No.</th>
									<th>Center Name</th>
									<th>Course Name</th>
									<th>Stream Name</th>
									<th>Share</th>
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
 $("#add_type").change(function(){
	 if($(this).val() == "1"){
		 $(".manual").hide();
		 $(".excel").show();
	 }else{
		 $(".excel").hide();
		 $(".manual").show();
	 }
 });
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#relation_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			center: {
				required: true,
			},
			share: {
				required: true,
			},
		},
		messages: {
			course: {
				required: "Please select course name",
			},
			stream: {
				required: "Please select stream name",
			},
			center: {
				required: "Please select center name",
			},
			share: {
				required: "Please enter center share",
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
		},
		submitHandler: function(form) {
			if(checkSubject()==false){
				return false;
			}else{
				form.submit();
			}
		}
	});
});


$('#course').on('change', function() {
			$('#course').valid();
		});

		$('#stream').on('change', function() {
			$('#stream').valid();
		});

		$('#center').on('change', function() {
			$('#center').valid();
		});

$(".fees_add").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_course_stream_fees",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'session':$("#session").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "0"){
				$("#relation_error").html("");
				$("#save_btn").show();
			}else{
				$("#relation_error").html("This relation is already added");
				$("#save_btn").hide();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#course").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.stream + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
/*$("#stream").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_subject_ajax",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			//alert(data);
			$("#subject").empty();
			$('#subject').append('<option value="">Select Subject</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#subject').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
			});
			$('#subject').trigger('change');	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});*/
</script>
<script>
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
					title:"Manage Center Course Sharing List",
					messageBottom: 'The information in this table is copyright to the global University.',
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
				"url" : "<?=base_url();?>admin/Ajax_controller/get_all_course_share_ajx",
				"type": "POST",
				"data":{'start_date':$("#start_date").val(),'end_date':$("#end_date").val()},
			},	
			"complete": function() {
				$('[data-toggle="tooltip"]').tooltip();			
			},
		});
		//table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
		
	});
</script>
 