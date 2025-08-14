<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          	<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Single Course Work Question</h4> 
                    
                 <?php if(!empty($question)){
                    $test_data = json_decode($question->text_data);
                 }    
                ?>
                <form class="forms-sample" name="exam_form" id="exam_form" action="<?=base_url()?>add_single_course_question/<?=$this->uri->segment(2)?>" method="post" enctype="multipart/form-data">
				    	<div class="row">
						  <?php 
									$course = $this->Exam_model->get_course_work_exam_name($this->uri->segment(2));
								?> 
						<div class="form-group col-lg-12">
							<label for="exampleInputUsername1">Question *</label>
							<input type="text" class="form-control" value="<?php if(!empty($question)){ echo $test_data->options->question ; } ?>" id="question" name="question" placeholder="Enter Question">
						</div>
						<div class="form-group col-lg-6">
							<label for="exampleInputUsername1">Option 1st *</label>
							<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[0] ; } ?>" id="option_1" name="option_1" placeholder="Option 1st">
						</div>
						<div class="form-group col-lg-6">
							<label for="exampleInputUsername1">Option 2nd *</label>
							<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[1] ; } ?>" id="option_2" name="option_2" placeholder="Option 2nd">
						</div>
						<div class="form-group col-lg-6">
							<label for="exampleInputUsername1">Option 3rd *</label>
							<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[2] ; } ?>" id="option_3" name="option_3" placeholder="Option 3rd">
						</div>
						<div class="form-group col-lg-6">
							<label for="exampleInputUsername1">Option 4th *</label>
							<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[3] ; } ?>" id="option_4" name="option_4" placeholder="Option 4th">
						</div>
						<div class="form-group col-lg-6">
							<label for="exampleInputUsername1">Correct Answer *</label>
							<select class="form-control" id="corrent_answer" name="corrent_answer"
							  placeholder="Select Correct Answer">
								<option value="" selected disabled >Please Correct Option</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>
					<input type="hidden" name="course_work_id" id="course_work_id" value="<?php echo $this->uri->segment(2);?>">
            <button type="submit" id="save_btn" name="upload" value="Upload" class="btn btn-primary mr-2">Submit</button>
            
          </form>
        </div>
      </div>
    </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
			            <?php 
										$course = $this->Exam_model->get_course_work_exam_name($this->uri->segment(2));
									?>  
               	<h4 class="card-title">Add Bulk Course Work Questions<span style="float: right;"><a href="<?=base_url();?>upload/PhD_Course_work_question.xlsx" class="btn btn-primary">Download Sample Excel</a></span></h4>
                  <p class="card-description">
                    Add Bulk Course Work Questions
                  </p>
                  <form class="forms-sample" name="exam_form_1" id="exam_form_1" method="post" enctype="multipart/form-data">
									<div class="row">
					
						<div class="form-group col-lg-6">
							<label for="exampleInputUsername1">Upload Excel *</label>
							<input type="file" class="form-control" id="userfile" name="userfile" placeholder="Select Excel">
						</div>
							<input type="hidden" name="course_work_id" id="course_work_id" value="<?php echo $this->uri->segment(2);?>">
					</div>
            <button type="submit" id="save_btn" name="upload" value="Upload" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?php if(!empty($course)){ echo $course->exam_name; }?> Questions List</h4>
                  <p class="card-description">
                    All list of questions
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<!-- <th>Course</th> -->
							<!-- <th>Stream</th> -->
							<th>Question</th>
							<th>Option 1st</th>
							<th>Option 2nd</th>
							<th>Option 3rd</th>
							<th>Option 4th</th>
							<th>Currect Answer</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				   </table>
                </div>
              </div>
            </div>
<!--             <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Course Work Stream Wise Questions List</h4>
                  <p class="card-description">
                    All list of questions
                  </p>
                  <table id="example_1" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Course</th>
							<th>Question</th>
							<th>Option 1st</th>
							<th>Option 2nd</th>
							<th>Option 3rd</th>
							<th>Option 4th</th>
							<th>Currect Answer</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				   </table>
                </div> -->
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
	$('#exam_form').validate({
		rules: {
			question: {
				required: true,
			},
			option_1: {
				required: true,
			},
			option_2: {
				required: true,
			},
			option_3: {
				required: true,
			},
			option_4: {
				required: true,
			},
			corrent_answer: {
				required: true,
			},
		},
		messages: {
			question: {
				required: "Please enter question",
			},
			option_1: {
				required: "Please enter option 1 ",
			},
			option_2: {
				required: "Please enter option 2",
			},
			option_3: {
				required: "Please enter option 3",
			},
			option_4: {
				required: "Please enter option 4",
			},
			corrent_answer: {
				required: "Please enter current_answer",
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

 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#exam_form_1').validate({
		rules: {
			userfile: {
				required: true,
			},
		},
		messages: {
			userfile: {
				required: "Please  select excel file",
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_course_work_stream_wise_question",
			"type": "POST",
			"data":{'course_work_id':$("#course_work_id").val()},
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
// $('.course_relation').change(function(){
// 	$.ajax({
// 		type: "POST",
// 		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
// 		data:{'course':$("#course").val()},
// 		success: function(data){
// 			$("#stream").empty();
// 			$('#stream').append('<option value="">Please Select Stream</option>');
// 			var opts = $.parseJSON(data);
// 			$.each(opts, function(i, d) {
// 			   $('#stream').append('<option value="' + d.stream + '">' + d.stream_name + '</option>');
// 			});
// 			$('#stream').trigger('change');	
// 		},
// 		 error: function(jqXHR, textStatus, errorThrown) {
// 		   console.log(textStatus, errorThrown);
// 		}
// 	});	
// });
// $('.stream_relation').change(function(){
// 	$.ajax({
// 		type: "POST",
// 		url: "<?=base_url();?>admin/Ajax_controller/get_stream_subject_ajax",
// 		data:{'course':$("#course").val(),'stream':$("#stream").val()},
// 		success: function(data){
// 			$("#subject").empty();
// 			$('#subject').append('<option value="">Please Select Subject</option>');
// 			var opts = $.parseJSON(data);
// 			$.each(opts, function(i, d) {
// 			   $('#subject').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
// 			});
// 			$('#subject').trigger('change');	
// 		},
// 		 error: function(jqXHR, textStatus, errorThrown) {
// 		   console.log(textStatus, errorThrown);
// 		}
// 	});	
// });

// $(document).ready(function() { 
// 	var oldExportAction = function (self, e, dt, button, config) {
//         if (button[0].className.indexOf('buttons-excel') >= 0) {
//             if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
//                 $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
//             }
//             else {
//                 $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
//             }
//         } else if (button[0].className.indexOf('buttons-print') >= 0) {
//             $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
//         }
//     };
    
//     var newExportAction = function (e, dt, button, config) {
//         var self = this;
//         var oldStart = dt.settings()[0]._iDisplayStart;
    
//         dt.one('preXhr', function (e, s, data) {
//             // Just this once, load all data from the server...
//             data.start = 0;
//             data.length = 2147483647;
    
//             dt.one('preDraw', function (e, settings) {
//                 // Call the original action function 
//                 oldExportAction(self, e, dt, button, config);
    
//                 dt.one('preXhr', function (e, s, data) {
//                     // DataTables thinks the first item displayed is index 0, but we're not drawing that.
//                     // Set the property to what it was before exporting.
//                     settings._iDisplayStart = oldStart;
//                     data.start = oldStart;
//                 });
    
//                 // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
//                 setTimeout(dt.ajax.reload, 0);
    
//                 // Prevent rendering of the full data to the DOM
//                 return false;
//             });
//         });
    
//         // Requery the server with the new one-time export settings
//         dt.ajax.reload();
//     };
	
// 	var table = $('#example_1').DataTable({
// 	    "lengthChange": false,
// 		"processing": true,
// 		"serverSide": true,
// 		"responsive": true,
// 		"cache": false,
// 		"order": [[0, "desc" ]],
// 		buttons:[
			
// 			{
// 				extend: "excelHtml5",
// 				messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
// 				exportOptions: {
//                     columns: [0, 1],
//                     modifier: {
// 						search: 'applied',
// 						order: 'applied'
// 					},
//                 },
//                 action: newExportAction,
// 			}
// 		],
// 		dom:"Bfrtip",
		
// 		"ajax":{
// 			"url" : "<?=base_url();?>admin/Ajax_controller/get_course_work_common_question",
// 			"type": "POST",
// 			"data":{'course_work_id':$("#course_work_id").val()},
// 		},	
// 		"complete": function() {
// 			$('[data-toggle="tooltip"]').tooltip();			
// 		},
//     });
//     //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
// });

</script>
 