<!-- <?php
//  include('header.php');
 ?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title">Fees Management Setting <a href="<?=base_url();?>list_manage_exam_fees" class="btn btn-primary mr-2 float-right">View List</a></h4><p class="card-description">
                    Please enter Fees details
                  </p>
                  <form class="forms-sample" name="fees_relation_form" id="fees_relation_form" method="post" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="exampleInputUsername1">Seesion *</label>
						  <select class="form-control js-example-basic-single fees_add" id="session" name="session">
							<option value="">Select Session</option>
							<?php if(!empty($session)){ foreach($session as $session_result){?>
							<option value="<?=$session_result->id?>" <?php if(!empty($single) && $single->session_id == $session_result->id){?>selected="selected"<?php }?>><?=$session_result->session_name?></option>
							<?php }}?>
						  </select>
						  <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
						</div>
						</div> 
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Course Name *</label>
                      <select class="form-control js-example-basic-single fees_add" id="course" name="course">
						<option value="">Select Course</option>
						<?php if(!empty($course)){ foreach($course as $course_result){?>
						<option value="<?=$course_result->course?>" <?php if(!empty($single) && $single->course_id == $course_result->course){?>selected="selected"<?php }?>><?=$course_result->course_name?> (<?php if($course_result->course_type == 0){?>Regular<?php }else{?>Pulp<?php }?>)</option>
						<?php }}?>
					  </select>
					  <div class="error" id="relation_error"></div>
                    </div>
                    </div>
					
					<?php 
						$stream = array();
						if(!empty($single)){
							$stream = $this->Course_model->get_selected_course_stream($single->course_id);
						}
					?>
					<div class="col-md-4">
					
                    <div class="form-group">
                      <label for="exampleInputUsername1">Stream Name *</label>
                      <select class="form-control js-example-basic-single fees_add" id="stream" name="stream">
						<option value="">Select Stream</option>
						<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
						<option value="<?=$stream_result->id?>@@@<?=$stream_result->stream?>" <?php if(!empty($single) && $single->stream_id == $stream_result->stream){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
						<?php }}?>
					  </select>
                    </div>
					</div>
					</div>
					 <div class="row">
					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Admission Fees *</label>
                      <input type="text" class="form-control" id="admission_fees" name="admission_fees" value="<?php if(!empty($single)){ echo $single->admission_fees;}?>">
                    </div>
					</div>

					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">RR Fees *</label>
                      <input type="text" class="form-control" id="rr_fees" name="rr_fees" value="<?php if(!empty($single)){ echo $single->rr_fees;}?>">
                    </div>
					</div>

					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Examination Fees *</label>
                      <input type="text" class="form-control" id="exam_fees" name="exam_fees" value="<?php if(!empty($single)){ echo $single->exam_fees;}?>">
                    </div>
					</div>

					<div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Degree Fees *</label>
                      <input type="text" class="form-control" id="degree_fees" name="degree_fees" value="<?php if(!empty($single)){ echo $single->degree_fees;}?>">
                    </div>
					</div>
					</div>
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      
<?php
//  include('footer.php');
// $id = 0;
// if($this->uri->segment(2) !=""){
// 	$id = $this->uri->segment(2);
// }
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
	$('#fees_relation_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			session: {
				required: true,
			},
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			admission_fees: {
				required: true,
				number: true,
			},
			rr_fees:{
				required: true,
				number: true,
			},
			exam_fees: {
				required: true,
				number: true,
			},
			degree_fees: {
				required: true,
				number: true,
			},
		},
		messages: {
			session: {
				required: "Please select session",
			},
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
			admission_fees: {
				required: "Please enter admission fees",
				number: "Please enter valid fees",
			},
			rr_fees:{
				required: "Please enter re-registration fees",
				number: "Please enter valid fees",
			},
			exam_fees: {
				required: "Please enter exam fees",
				number: "Please enter valid fees",
			},
			degree_fees: {
				required: "Please enter degree fees",
				number: "Please enter valid fees",
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
			   $('#stream').append('<option value="' + d.id + '@@@' + d.stream + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});


$('#session').on('change', function() {
    $('#session').valid();
});
$('#course').on('change', function() {
    $('#course').valid();
});
$('#stream').on('change', function() {
    $('#stream').valid();
});


</script> -->


<?php include('header.php');?>

    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card priviledge-form">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Certificate Fees Management</h4>
                  <p class="card-description">
                    Please enter certificate fees management details
                  </p>
                  <form class="forms-sample" name="certificate_fees_form" id="certificate_fees_form" method="post" enctype="multipart/form-data">
					<div class="row">
							<div class="col col-md-12">
								<div class="form-group">
									<label class=" form-control-label">Certificate * </label>
									<!-- <input type="text" name="name_of_signature" id="name_of_signature" class="form-control" value="<?php if(!empty($single)){ echo $single->name;}?>">  -->
									<select name="certificate_type" id="certificate_type" class="form-control js-example-basic-single">
										<option value="">Select Certificate Type</option>
										<option value="0" <?php if(!empty($single) && $single->certificate_type == "0"){?>selected="selected"<?php }?>>Migration Certificate</option>
										<option value="1" <?php if(!empty($single) && $single->certificate_type == "1"){?>selected="selected"<?php }?>>Transfer Certificate</option>
										<option value="2" <?php if(!empty($single) && $single->certificate_type == "2"){?>selected="selected"<?php }?>>Degree Certificate</option>
										<option value="3" <?php if(!empty($single) && $single->certificate_type == "3"){?>selected="selected"<?php }?>>Provisional Degree Certificate</option>
										<option value="4" <?php if(!empty($single) && $single->certificate_type == "4"){?>selected="selected"<?php }?>>Bonafide Certificate</option>
										<option value="5" <?php if(!empty($single) && $single->certificate_type == "5"){?>selected="selected"<?php }?>>Medium of Instruction Letter</option>
										<option value="6" <?php if(!empty($single) && $single->certificate_type == "6"){?>selected="selected"<?php }?>>No Backlog Summary Letter</option>
										<option value="7" <?php if(!empty($single) && $single->certificate_type == "7"){?>selected="selected"<?php }?>>No Split Issue Letter</option>
										<option value="8" <?php if(!empty($single) && $single->certificate_type == "8"){?>selected="selected"<?php }?>>Recommendation Letter</option>
										<option value="9" <?php if(!empty($single) && $single->certificate_type == "9"){?>selected="selected"<?php }?>>II Recommendation Letter</option>
										<option value="10" <?php if(!empty($single) && $single->certificate_type == "10"){?>selected="selected"<?php }?>>Character Certificate</option>
										<option value="11" <?php if(!empty($single) && $single->certificate_type == "11"){?>selected="selected"<?php }?>>Transcript Application</option>
										<option value="12" <?php if(!empty($single) && $single->certificate_type == "12"){?>selected="selected"<?php }?>>Consolidated Marksheet</option>
									</select>	
									<div class="error" id="certificate_type_error"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col col-md-12">
								<div class="form-group">
									<label class=" form-control-label">Certificate Fees</label>
									<input type="text" name="certificate_fees" id="certificate_fees" class="form-control" value="<?php if(!empty($single)){ echo $single->certificate_fees;}?>"> 
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
                  <h4 class="card-title">Certificate Fees Management List</h4>
                  <p class="card-description">
                    All list of Certificate Fees
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr.No</th>
						<th>Certificate Type</th> 
						<th>Certificate Fees</th> 
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
	$('#certificate_fees_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			certificate_type: "required", 		
			certificate_fees:"required",		
		},
		messages: {
			certificate_type: "Please select certificate type", 
			certificate_fees: "Please enter certificate fees",   
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

$('#certificate_type').on('change', function() {
    $('#certificate_type').valid();
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
				title:"Certificate Fees List",
				messageBottom: 'The information in this table is copyright to The Global University.',
				exportOptions: {
                    columns: [0, 1],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_certificate_fees_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});	


		$("#certificate_type").change(function() {
			if($("#certificate_type").val() != ''){
				$.ajax({
					type: "POST",
					url: "<?= base_url(); ?>admin/Ajax_controller/get_unique_certificate_type",
					data: {
						'certificate_type': $("#certificate_type").val(),
						'id': '<?= $id ?>'
					},
					success: function(data) {
						console.log(data);
						if (data == "0") {
							$("#certificate_type_error").html('');
							$("#save_btn").show();
						} else {
							$("#certificate_type_error").html('This certificate type is already added');
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
 
 