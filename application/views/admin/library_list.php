<!-- <?php 
// include('header.php');
?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Library List 
					          <a href="<?=base_url();?>add_library" class="btn btn-primary mr-2 float-right">Add New</a>
                  </h4>

                  <p class="card-description">
                    All list of Library's
                  </p>
					  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Course Name</th>
							<th>Stream Name</th>
							<th>Subject</th>
							<th>Book Name</th>
							<th>View Book</th>
							<th>Year/Sem</th> 
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
      
<?php
//  include('footer.php');
// $id = 0;
// if($this->uri->segment(2) !=""){
// 	$id = $this->uri->segment(2);
// }
?>
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
        title:"Library List",
				messageBottom: 'The information in this table is copyright to Global University.',
				exportOptions: {
                    columns: [0, 1,2,3,4,6,7],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_e_library_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
</script>
  -->




  <?php
// echo "<pre>";print_r($document);exit;
include('header.php');?>
<style>
	#book{
		display:flex;
		align-items: center;
	}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">E-Library 
					<a href="<?=base_url();?>add_library" class="btn btn-primary mr-2 float-right">Add New</a>
				  </h4>
                  <p class="card-description">
                    <!-- Please enter required details -->
                  </p>
				  
					<form class="forms-sample" name="selection_form" id="selection_form" method="get" enctype="multipart/form-data">
						<?php if(!empty($data)): ?>
							<input type="hidden" name="id" value="<?=$data->id; ?>">
						<?php endif; ?>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Course *</label>
									<select class="form-control js-example-basic-single" id="course" name="course"> 
										<option value="">Select</option>
										<?php if(!empty($course)){ foreach($course as $course_result){?>
										<option value="<?=$course_result->id?>" <?php if(isset($_GET['course']) && $_GET['course']  == $course_result->id){?>selected="selected" <?php }?>><?=$course_result->course_name?></option>
										<?php }}?> 
									</select>
								</div>
							</div>

							<?php
							$stream = [];
							
							if(isset($_GET["course"])){
								$stream = $this->Library_model->get_selected_course($_GET["course"]);
							}
							?>

							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Stream *</label>
									<select class="form-control js-example-basic-single" id="stream" name="stream"> 
										<option value="">Select</option>
									    <?php if(!empty($stream)){ foreach($stream as $stream_result){?>
										<option value="<?=$stream_result->stream_table_id?>" <?php if(isset($_GET['stream']) && $_GET['stream'] == $stream_result->stream){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
										<?php }}?> 
									</select>
								</div>
							</div>
							

							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Year/Sem *</label>
									<select class="form-control js-example-basic-single" id="year_sem" name="year_sem"> 
											<option value="">Select</option>
											<option value="1" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 1){?>selected="selected" <?php }?>>1</option>
											<option value="2" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 2){?>selected="selected" <?php }?>>2</option>
											<option value="3" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 3){?>selected="selected" <?php }?>>3</option>
											<option value="4" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 4){?>selected="selected" <?php }?>>4</option>
											<option value="5" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 6){?>selected="selected" <?php }?>>5</option>
											<option value="6" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 6){?>selected="selected" <?php }?>>6</option>
											<option value="7" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 7){?>selected="selected" <?php }?>>7</option>
											<option value="8" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 8){?>selected="selected" <?php }?>>8</option>
											<option value="9" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 9){?>selected="selected" <?php }?>>9</option>
											<option value="10" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 10){?>selected="selected" <?php }?>>10</option>
											<option value="11" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 11){?>selected="selected" <?php }?>>11</option>
											<option value="12" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == 12){?>selected="selected" <?php }?>>12</option>
									</select>
								</div>
							</div>
							<?php
							$subject = [];
							
							if(isset($_GET["course"]) && isset($_GET["stream"])){
								$subject = $this->Library_model->get_selected_course_stream($_GET["course"],$_GET["stream"]);
							}
							?>

							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Subject *</label>
									
									<select class="form-control js-example-basic-single" id="subject" name="subject"> 
										<option value="">Select</option>
										 <?php if(!empty($subject)){ foreach($subject as $subject_result){?>
										<option value="<?=$subject_result->id?>" <?php if(isset($_GET['subject']) && $_GET['subject'] == $subject_result->id){?>selected="selected"<?php }?>><?=$subject_result->subject_name?></option>
										<?php }}?> 
									</select>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
								<button type="submit" class="btn btn-primary x1_button">Search</button>
							<a href="<?=base_url();?>library_list" class="btn btn-danger">Reset</a>
								</div>
							</div>


							

							<!-- <div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Book Name *</label>
									<select class="form-control js-example-basic-single" id="book_name" name="book_name"> 
										<option value="">Select</option>
										<?php if(!empty($document)) { foreach($document as $document_result) { ?>
											<option value="<?= $document_result->id ?>" <?php if (!empty($single) && $single->book_name == $document_result->id) { ?>selected="selected" <?php } ?>>
												<?= $document_result->book_name ?>
											</option>
										<?php }} ?> 
									</select>
								</div>
							</div> -->


							<!-- <div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Book Name *</label>
									<select class="form-control js-example-basic-single" id="book_name" name="book_name">
										<option value="">Select</option>
										<?php
										// if (!empty($document)) {
										// 	$addedBookNames = array(); 
										// 	foreach ($document as $document_result) {
										// 		$bookId = $document_result->id;
										// 		$bookName = $document_result->book_name;
										// 		if (!in_array($bookName, $addedBookNames)) {
										// 			$selected = (!empty($single) && $single->book_name == $bookId) ? 'selected="selected"' : '';
										// 			echo '<option value="' . $bookId . '" ' . $selected . '>' . $bookName . '</option>';
										// 			$addedBookNames[] = $bookName;
										// 		}
										// 	}
										// }
										?>
									</select>
								</div>
							</div> -->


							<!-- <div class="col-md-2">
								<div class="form-group">
									<label for="exampleInputUsername1">E-Book pdf * </label>
									<div id="show_ebook"></div>

									<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>"> 
								</div>
							</div>
 -->

							<div id="book">
							<input type="hidden">
								<!-- <?php if ($document->status == "1") { ?>
									<a onclick="return confirm('Are you sure, you want to delete this record permanently?');"  href="<?=base_url()?>delete/<?=$document->id?>/tbl_ebook_library"><i class='mdi mdi-delete'></i></a>
									<a class="btn btn-info" onclick="return confirm('Are you sure, you want to deactivate this record permanently?');" href="<?= base_url()?>inactive/<?= $document->id ?>/tbl_ebook_library"><i class='mdi mdi-bookmark-check'></i></a>
									<a class="btn btn-success" href="<?= base_url() ?>add_library/<?= $document->id ?>"><i class='mdi mdi-table-edit'></i></a>
								<?php } else { ?>
									<a onclick="return confirm('Are you sure, you want to delete this record permanently?');"  href="<?=base_url()?>delete/<?=$document->id?>/tbl_ebook_library"><i class='mdi mdi-delete'></i></a>
									<a class="btn btn-info" onclick="return confirm('Are you sure, you want to activate this record permanently?');" href="<?= base_url()?>active/<?= $document->id ?>/tbl_ebook_library"><i class='mdi mdi-bookmark-check'></i></a>
								<a class="btn btn-success" href="<?= base_url() ?>add_library/<?= $document->id ?>"><i class='mdi mdi-table-edit'></i></a>
								<?php } ?> -->
							</div>
						</div>
						
					</form>
					
					</div>
		</div>
	</div>
			
			 
          </div>

		  <div class="row">
						<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
							<h4 class="card-title">Library List 
							
										
							</h4>

							<p class="card-description">
								<!-- All list of Library's -->
							</p>
								<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>Course</th>
										<th>Stream</th>
										<th>Year/Sem</th>
										<th>Subject</th>
										<th>Book Name</th>
										<th>View Book</th>				
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

$("#course").change(function(){   
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
			
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
				// console.log(data);
			   $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
			});
			
			<?php if(!empty($data)):?>
			document.getElementById("stream").value = "<?= $data->stream; ?>";
			<?php endif; ?>
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#stream").change(function(){   
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}); 

	$("#year_sem").change(function(){  
		$.ajax({
			type: "POST",
			url: "<?=base_url();?>web/Web_controller/get_course_stream_subject",
			data:{'course':$("#course").val(),'stream':$("#stream").val(),'year_sem':$("#year_sem").val()},
			success: function(data){
				$("#subject").empty();
				$('#subject').append('<option value="">Select</option>');
				var opts = $.parseJSON(data);
				$.each(opts, function(i, d) {
				$('#subject').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
				});
				<?php if(!empty($data)):?>
				document.getElementById("subject").value = "<?= $data->subject; ?>";
				<?php endif; ?>
				$('#subject').trigger('change');
			},
			error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
			}
		});	
	});


	$("#book_name").change(function () {
    if ($("#course").val() != '' && $("#stream").val() != '' && $("#year_sem").val() != '' && $("#subject").val() != '' && $("#book_name").val() != '') {
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_year_sem_subject_book_name",
            data: {
                'book_name': $("#book_name").val()
            },
            success: function (data) {
				console.log(data);
                var opts = $.parseJSON(data);
				console.log(opts.ebook);
                var ebookUrl = "<?=$this->Digitalocean_model->get_photo('images/ebook/+opts.ebook+')?>";
				console.log(ebookUrl);
                var viewLink = '<a  class="btn btn-success" target="_blank" href="' + ebookUrl + '"><i class="fa fa-file"></i> view</a>';
				
                $('#show_ebook').html(viewLink);

				var buttonsHtml = '';
                if (opts.status == "1") {
                    buttonsHtml += '<a class="btn btn-danger" style="margin-right: 5px;" onclick="return confirm(\'Are you sure, you want to delete this record permanently?\');" href="<?=base_url()?>delete/' + opts.id + '/tbl_ebook_library"><i class=\'mdi mdi-delete\'></i></a>';
                    buttonsHtml += '<a class="btn btn-info" style="margin-right: 5px;" onclick="return confirm(\'Are you sure, you want to deactivate this record permanently?\');" href="<?= base_url()?>inactive/' + opts.id + '/tbl_ebook_library"><i class=\'mdi mdi-bookmark-check\'></i></a>';
					buttonsHtml += '<a class="btn btn-success" href="<?= base_url() ?>add_library/' + opts.id + '"><i class=\'mdi mdi-table-edit\'></i></a>';
                } else {
                    buttonsHtml += '<a class="btn btn-danger" style="margin-right: 5px;" onclick="return confirm(\'Are you sure, you want to delete this record permanently?\');" href="<?=base_url()?>delete/' + opts.id + '/tbl_ebook_library"><i class=\'mdi mdi-delete\'></i></a>';
                    buttonsHtml += '<a class="btn btn-primary" style="margin-right: 5px;" onclick="return confirm(\'Are you sure, you want to activate this record permanently?\');" href="<?= base_url()?>active/' + opts.id + '/tbl_ebook_library"><i class=\'mdi mdi-bookmark-check\'></i></a>';
					buttonsHtml += '<a class="btn btn-success" href="<?= base_url() ?>add_library/' + opts.id + '"><i class=\'mdi mdi-table-edit\'></i></a>';
				}

                $('#book').html(buttonsHtml);
			
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
});


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
	
	var course = '<?php if(isset($_GET['course'])){ echo $_GET['course'];}else{echo "";}?>';
	// echo "<pre>";print_r(isset($_GET['stream']));exit;

	var stream = '<?php if(isset($_GET['stream'])){ echo $_GET['stream'];}else{echo "";}?>';
	var year_sem = '<?php if(isset($_GET['year_sem'])){ echo $_GET['year_sem'];}else{echo "";}?>';
	var subject = '<?php if(isset($_GET['subject'])){ echo $_GET['subject'];}else{echo "";}?>';


	// if (course !== '' || stream !== '' || year_sem !== '' || subject !== '') {
	// 	$('#example').show();
    // } else {
    //     $('#example').hide();
    // }

	// $('#example').on('draw.dt', function () {
    //     if (course !== '' || stream !== '' || year_sem !== '' || subject !== '') {
    //         $('#example_wrapper').show();
    //     } else {
    //         $('#example_wrapper').hide();
    //     }
    // });
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
        		title:"Library List",
				messageBottom: 'The information in this table is copyright to Global University.',
				exportOptions: {
                    columns: [0, 1,2,3,4,5,7],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_e_library_list_ajax",

			"type": "POST",
			"data":{'course':course,'stream':stream,'year_sem':year_sem,'subject':subject},

		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });

});


</script>

