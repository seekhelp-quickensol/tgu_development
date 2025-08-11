<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title">Time Table <a href="<?=base_url();?>create_time_table" class="btn btn-primary mr-2 float-right">Add Time Table</a></h4><p class="card-description">
                    <!-- Please enter Time Table details -->
                  </p>
                  <form class="forms-sample" name="relation_form" id="relation_form" method="get" enctype="multipart/form-data" onsubmit="showDataTable()">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Course Name *</label>
							  <select class="form-control js-example-basic-single exist_fees course_list" id="course" name="course">
								<option value="">Select Course</option>
								<?php if(!empty($course)){ foreach($course as $course_result){
										if($course_result->course_type == "1"){
											$type = "Pulp";
										}else{
											$type = "Regular";
										}
								?>
								<option value="<?=$course_result->course?>"><?=$course_result->course_name .'('.$type.')'?></option>
								<?php }}?>
							  </select>
							  <div class="error" id="relation_error"></div>
							</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
						  <label for="exampleInputUsername1">Stream Name *</label>
						  <select class="form-control js-example-basic-single exist_fees course_list" id="stream" name="stream">
							<option value="">Select Stream</option>
							<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
							<option value="<?=$stream_result->id?>" <?php if(!empty($single) && $single->stream == $stream_result->id){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
							<?php }}?>
						  </select>
						</div>
					</div>
					</div>
					 <div class="row">
						 
						<div class="col-md-4">
							<div class="form-group">
							  <label for="exampleInputUsername1">Year/Sem *</label>
							  <select class="form-control js-example-basic-single" id="year_sem" name="year_sem">
								<option value="">Select</option>
								<?php for($y=1;$y<=12;$y++){?>
								<option value="<?=$y?>"><?=$y?></option>
								<?php }?>
							  </select>
							</div>
						</div> 
						<div class="col-md-4">
							<div class="form-group">
							  <label for="exampleInputUsername1">Exam Month *</label>
							  <select class="form-control js-example-basic-single" id="exam_month" name="exam_month">
								<option value="">Select</option>
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
							  </select>
							</div>
						</div> 
						<div class="col-md-4">
							<div class="form-group">
							  <label for="exampleInputUsername1">Exam Year*</label>
							  <select class="form-control js-example-basic-single" id="exam_year" name="exam_year">
								<option value="">Select</option>
								<?php for($y=2023;$y<=date("Y");$y++){?>
								<option value="<?=$y?>"><?=$y?></option>
								<?php }?>
							  </select>
							</div>
						</div> 
						<div class="col-md-12">
							<div class="form-group">
							<button type="submit" id="save_btn" class="btn btn-primary mr-2">Search</button>
							</div>
						</div> 
						
					
					</div> 
					</div>  
                    </div>    
                  </form>
                </div> 
              </div>
			  
				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body" style="overflow:scroll"> 
								<h4 class="card-title">Time Table List 
									<p class="card-description">
										<!-- Please enter Time Table details -->
									</p></h4>
									<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
									 <thead>
										<tr>
											<th>Sr. No.</th>
											<th>Course Name</th>
											<th>Stram Name</th>
											<th>Year/Sem</th>
											<th>Exam Month</th>
											<th>Exam Year</th>
											<th>Paper Details</th>  
											<th>Action</th>
										</tr>
									</thead>
									<tbody> 
									<?php 
									$i=1;
									if(!empty($time_sheet)){ foreach($time_sheet as $time_sheet_result){?>
										<tr>
											<td><?=$i++?></td> 
											<td><?=$time_sheet_result->print_name?></td> 
											<td><?=$time_sheet_result->stream_name?></td> 
											<td><?=$time_sheet_result->year_sem?></td> 
											<td><?=$time_sheet_result->exam_month?></td> 
											<td><?=$time_sheet_result->exam_year?></td>  
											<td>
												<?php  
															?>
															<table>
																<tr>
																	<td>Sr.No</td>
																	<td>Subject Name</td>
																	<td>Date</td>
																	<td>Paper</td>
																	<td>Action</td>
																</tr>
															<?php 
																$kk=1;
																for($pp=0;$pp<count($time_sheet_result->data);$pp++){
																?>
																	<tr>
																		<td><?=$kk++?></td>
																		<td><?=$time_sheet_result->data[$pp]->subject;?></td>
																		<td><?=$time_sheet_result->data[$pp]->date;?></td>
																		<td><?=$time_sheet_result->data[$pp]->day;?></td>
																		<td>
																			<a href="<?=base_url();?>delete/<?=$time_sheet_result->data[$pp]->id?>/tbl_timesheet_details" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger">Delete</a>
																		</td>
																	</tr>
																<?php 
																}
															?>
															</table>
															<?php 
														 
													
												?>
											</td>
											<td>
												<a href="<?=base_url();?>delete/<?=$time_sheet_result->id?>/tbl_time_table" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger">Delete</a>
											</td> 
										</tr>
									<?php }}?>
									</tbody>
								</table>
							</div>
						</div>
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
   $('#example').DataTable({
        extend: "excelHtml5",
         "ordering": false 
    });
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	/*$('#relation_form').validate({
		rules: {
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			course_mode: {
				required: true,
			},
			year_sem: {
				required: true,
			},
			exam_month: {
				required: true,
			},
			exam_year: {
				required: true,
			},
		},
		messages: {
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
			course_mode: {
				required: "Please select course mode",
			},
			year_sem: {
				required: "Please select year/sem",
			},
			exam_month: {
				required: "Please select exam month",
			},
			exam_year: {
				required: "Please select exam year",
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
	});*/
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
$(".exist_fees").change(function(){   
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_mode",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#course_mode").empty();
			$("#course_mode").html(data);
			$('#course_mode').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
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
  } );


</script>
<!-- <script>
document.addEventListener("DOMContentLoaded", function() {
    // Initialize DataTable
    var dataTable = $('#example').DataTable({
        // DataTable options
    });

    // Function to show or hide the DataTable
    function showOrHideDataTable() {
        var table = document.getElementById('example');
        table.style.display = (dataTable.rows().count() === 0) ? 'none' : 'table';
    }

    // Function to be called after each DataTable draw event
    dataTable.on('draw', function() {
        showOrHideDataTable();
    });

    // Call the function initially
    showOrHideDataTable();

    // Function to destroy DataTable before reinitializing
    function destroyDataTable() {
        if ($.fn.DataTable.isDataTable('#example')) {
            $('#example').DataTable().destroy();
        }
    }

    // Function to initialize DataTable
    function initializeDataTable() {
        destroyDataTable(); // Destroy the existing DataTable instance
        dataTable = $('#example').DataTable({
            // DataTable options
        });
        showOrHideDataTable();
    }

    // Call the function to initialize DataTable when needed
    function showDataTable() {
        initializeDataTable();
        document.getElementById('example').style.display = 'table';
    }
});
</script>
 -->
