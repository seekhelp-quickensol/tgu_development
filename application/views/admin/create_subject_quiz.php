<?php 

// echo "<pre>";print_r($single_stream);exit;
include('header.php');?>
<style>
.note-children-container{
	display:none;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Stream Question Setting <span style="float: right;"><a href="<?=base_url();?>upload/PhD_subject_wise_question.xlsx" class="btn btn-primary">Download Sample Excel</a></span></h4>
                  <p class="card-description">
                    Please enter subject wise question
                  </p>
                  <div class="row">
                  	<div class="col-md-6">
                  		<form class="forms-sample" name="exam_form" id="exam_form" method="post" enctype="multipart/form-data">
									<!-- <div class="form-group col-lg-12">
										<label for="exampleInputUsername1">Course *</label>
										<select class="form-control js-example-basic-single" id="single_course" name="single_course" placeholder="Select Course">
											<option value="">Please Select Course</option>
											<?php if(!empty($course)){foreach($course as $course_result){?>
												<option value="<?=$course_result->id;?>"><?=$course_result->course_name;?></option>
											<?php }}?>
										</select>
										<input type="hidden" name="exam_id" id="exam_id" value="<?php echo $this->uri->segment(2);?>">
									</div>
									<div class="form-group col-lg-12">
										<label for="exampleInputUsername1">Stream *</label>
										<select class="form-control js-example-basic-single stream_relation" id="single_stream" name="single_stream" placeholder="Select Stream">
											<option value="">Please Select Stream</option>
										</select>
									</div> -->


									<div class="form-group col-lg-12">
										<label for="exampleInputUsername1">Course *</label>																										
										<input type="text" name="single_course" id="single_course" class="form-control" value="Ph.D" readonly>		
										<input type="hidden" name="exam_id" id="exam_id"  value="<?php echo $this->uri->segment(2);?>">
									</div>
									<div class="form-group col-lg-12">
										<label for="exampleInputUsername1">Stream *</label>
										<select class="form-control js-example-basic-single" id="single_stream" name="single_stream" placeholder="Select Stream">
											<option value="">Please Select Stream</option>
											<?php if(!empty($single_stream)){foreach($single_stream as $single_stream_result){?>
												<option value="<?=$single_stream_result->stream;?>"><?=$single_stream_result->stream_name;?></option>
											<?php }}?>
										</select>
									</div>
									<div class="form-group col-lg-12">
										<label for="exampleInputUsername1">Question *</label>
										<!-- <input type="text" class="form-control" id="exam_question" name="exam_question" placeholder="Enter Question" value="<?php if(!empty($question)){ echo $question->options->question;} ?>"> -->
										<textarea class="form-control" id="exam_question" name="exam_question" placeholder="Enter Question"><?php if(!empty($question)){ echo $question->options->question;} ?></textarea>

									</div>
									<div class="form-group col-lg-12">
										<label for="exampleInputUsername1">Option 1st *</label>
										<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[0] ; } ?>" id="option_1" name="option_1" placeholder="Option 1st">
									</div>
									<div class="form-group col-lg-12">
										<label for="exampleInputUsername1">Option 2nd *</label>
										<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[1] ; } ?>" id="option_2" name="option_2" placeholder="Option 2nd">
									</div>
									<div class="form-group col-lg-12">
										<label for="exampleInputUsername1">Option 3rd *</label>
										<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[2] ; } ?>" id="option_3" name="option_3" placeholder="Option 3rd">
									</div>
									<div class="form-group col-lg-12">
										<label for="exampleInputUsername1">Option 4th *</label>
										<input type="text" class="form-control" value="<?php if(!empty($question)){ echo  $test_data->options->options[3] ; } ?>" id="option_4" name="option_4" placeholder="Option 4th">
									</div>
									<div class="form-group col-lg-12">
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
											<input type="hidden" name="exam_id" id="exam_id" value="<?php echo $this->uri->segment(2);?>">
					            <button type="submit" id="save_single" name="save_single" value="save_single" class="btn btn-primary mr-2">Submit</button>
					            
					          </form>
												</form>
						</div> 
						<div class="col-md-6">
							<form class="forms-sample" name="exam_form_1" id="exam_form_1" method="post" enctype="multipart/form-data">
								<!-- <div class="form-group col-lg-12">
									<label for="exampleInputUsername1">Course *</label>
									<select class="form-control js-example-basic-single course_relation" id="course" name="course" placeholder="Select Course">
										<option value="">Please Select Course</option>
										<?php if(!empty($course)){foreach($course as $course_result){?>
											<option value="<?=$course_result->id;?>"><?=$course_result->course_name;?></option>
										<?php }}?>
									</select>
									<input type="hidden" name="exam_id" id="exam_id" value="<?php echo $this->uri->segment(2);?>">
								</div>
								<div class="form-group col-lg-12">
									<label for="exampleInputUsername1">Stream *</label>
									<select class="form-control js-example-basic-single stream_relation" id="stream" name="stream" placeholder="Select Stream">
										<option value="">Please Select Stream</option>
									</select>
								</div> -->

								<div class="form-group col-lg-12">
									<label for="exampleInputUsername1">Course *</label>																										
									<input type="text" name="course" id="course" class="form-control" value="Ph.D" readonly>		
									<input type="hidden" name="exam_id" id="exam_id"  value="<?php echo $this->uri->segment(2);?>">
								</div>
								<div class="form-group col-lg-12">
									<label for="exampleInputUsername1">Stream *</label>
									<select class="form-control js-example-basic-single" id="stream" name="stream" placeholder="Select Stream">
										<option value="">Please Select Stream</option>
										<?php if(!empty($single_stream)){foreach($single_stream as $single_stream_result){?>
											<option value="<?=$single_stream_result->stream;?>"><?=$single_stream_result->stream_name;?></option>
										<?php }}?>
									</select>
								</div>


						<!-- 		<div class="form-group col-lg-3">
									<label for="exampleInputUsername1">Subject *</label>
									<select class="form-control js-example-basic-single" id="subject" name="subject" placeholder="Select Subject">
										<option value="">Please Select Subject</option>
									</select>
								</div> -->
								<div class="form-group col-lg-12">
									<label for="exampleInputUsername1">Upload Excel *</label>
									<input type="file" class="form-control" id="userfile" name="userfile" placeholder="Select Excel">
								</div>
											
                    <button type="submit" id="save_btn" name="upload" value="Upload" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                  </div>
                  	</div>
                  	</div>
              </div>
            </div> 
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Questions List</h4>
                  <p class="card-description">
                    All list of questions
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Course</th>
							<th>Stream</th>
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
		// ignore: ":hidden:not(select)",
		ignore: ":hidden:not(#exam_question),.note-editable.panel-body",
		rules: {
			// single_course:{
			// 	required: true,
			// },
			single_stream:{
				required: true,
			},
			exam_question:{
				required: true,
			},
			option_1:{
				required: true,
			},
			option_2:{
				required: true,
			},
			option_3:{
				required: true,
			},
			option_4:{
				required: true,
			},
			corrent_answer:{
				required: true,
			},
			// course: {
			// 	required: true,
			// },
			// stream: {
			// 	required: true,
			// },
			// subject: {
			// 	required: true,
			// },
			// userfile: {
			// 	required: true,
			// },
		},
		messages: {
			// single_course:{
			// 	required: "Please select course",
			// },
			single_stream:{
				required: "Please select stream",
			},
			exam_question:{
				required: "Please enter question",
			},
			option_1:{
				required: "Please enter option 1",
			},
			option_2:{
				required: "Please enter option 2",
			},
			option_3:{
				required: "Please enter option 3",
			},
			option_4:{
				required: "Please enter option 4",
			},
			corrent_answer:{
				required: "Please select correct answer",
			},
			// course: {
			// 	required: "Please select course",
			// },
			// stream: {
			// 	required: "Please select stream",
			// },
			// subject: {
			// 	required: "Please select subject",
			// },
			// userfile: {
			// 	required: "Please select excel",
			// },
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



	$('#exam_form_1').validate({
		ignore: ":hidden:not(select)",
		ignore: ":hidden:not(#question),.note-editable.panel-body",
		rules: {
			// course: {
			// 	required: true,
			// },
			stream: {
				required: true,
			},
			subject: {
				required: true,
			},
			userfile: {
				required: true,
			},
		},
		messages: {
			// course: {
			// 	required: "Please select course",
			// },
			stream: {
				required: "Please select stream",
			},
			subject: {
				required: "Please select subject",
			},
			userfile: {
				required: "Please select excel",
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

$("#single_course").change(function() {
    $("#single_course").valid();
});

$("#single_stream").change(function() {
    $("#single_stream").valid();
});

$("#course").change(function() {
    $("#course").valid();
});

$("#stream").change(function() {
    $("#stream").valid();
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
				title:"Questions List",
				messageBottom: 'The information in this table is copyright to Global University.',
				exportOptions: {
                    columns: [0, 1,2,3,4,5,6,7,8,9],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_phd_subject_questions_ajax",
			"type": "POST",
			"data":{'exam_id':$("#exam_id").val()},
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
$('.course_relation').change(function(){
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Please Select Stream</option>');
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

$('#single_course').change(function(){;
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
		data:{'course':$("#single_course").val()},
		success: function(data){
			$("#single_stream").empty();
			$('#single_stream').append('<option value="">Please Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#single_stream').append('<option value="' + d.stream + '">' + d.stream_name + '</option>');
			});
			$('#single_stream').trigger('change');	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});

$('.stream_relation').change(function(){
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_stream_subject_ajax",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#subject").empty();
			$('#subject').append('<option value="">Please Select Subject</option>');
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
});


</script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>

$(document).ready(function () {
     $('#exam_question').summernote({
         height: 200,
         callbacks: {
            onImageUpload: function (image) {
                 sendFile(image[0]);
             }
         } 
     });

	 function sendFile(image) {
        var data = new FormData();
        data.append("image", image);
        //if you are using CI 3 CSRF
        data.append("<?= $this->security->get_csrf_token_name() ?>", "<?= $this->security->get_csrf_hash() ?>");
        $.ajax({
            data: data,
            type: "POST",
            url: "<?=base_url()?>admin/Ajax_controller/upload_news_image",
            cache: false,
            contentType: false,
            processData: false,
            success: function (url) {
                var image = url;
                $('#long_content').summernote("insertImage", image);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
	  
	 
  });    
     </script>