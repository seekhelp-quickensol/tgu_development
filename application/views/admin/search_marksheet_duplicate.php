<?php include('header.php');?>
<style>
	.row-btns{
		height:48px !important;
		line-height:25px;
		color:#fff !important;
	}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Search Duplicate Marksheet</h4>
                  <!-- <p class="card-description">
                    Please enter search details
                  </p> -->
					<form method="post" name="search_form" id="search_form">
					<div class="row">
				 
				<div class="col-md-3">
					<div class="form-group">
						<label>Year/Sem</label>
						<select name="year" id="year" class="form-control js-example-basic-single select2_single">
							<option value="">Select</option>
							<?php for($year=1;$year <= 12;$year++){?>
							<option value="<?=$year?>"><?=$year?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Course</label>
						<select name="course" id="course" class="form-control js-example-basic-single select2_single">
							<option value="">Select Course</option>
							<?php if(!empty($course)){ foreach($course as $course_result){?>
							<option value="<?=$course_result->id?>"><?=$course_result->course_name?></option>
							<?php }}?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Stream</label>
						<select name="stream" id="stream" class="form-control js-example-basic-single select2_single">
							<option value="">Select Stream</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Enrollment</label>
						<input type="text" name="enrollment" id="enrollment" class="form-control">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Marksheet Number</label>
						<input type="text" name="marksheet_number" id="marksheet_number" class="form-control">
					</div>
				</div>
				  
				 
				<div class="col-md-12">
					<div class="form-group">
						<input type="submit" name="search" id="search" class="btn btn-primary btn-sm" value="Search">
					</div>
				</div>
				</div>
			</form>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
					<form method="post" name="send_to_print" id="send_to_print">
						      <!-- <input type="checkbox" name="select_all" id="select_all">
										<label>Select All</label> -->
                  <a type="submit" name="send_btn" class="btn btn-primary row-btns" value="send_btn" style="margin-bottom:10px;" onclick="validateCheckbox()">Send to Print</a>
                  <div id="print_error_message" style="color: red;margin-bottom:10px;"></div>
						<table id="example" class="resultTable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
							<thead>
								<tr>
									<td>Sr.No</td>
									<!-- <td class="heading">
									<input type="checkbox" id="toggle-all"> 
									Check All for Print</td> -->
									<td class="heading">Select</td>
									<td class="heading">Examination</td>
									<td class="heading">Student Name</td>
									<td class="heading">Enrollment Number</td>
									<td class="heading">Markheet Number</td>
									<td class="heading">Course</td>
									<td class="heading">Stream</td>
									<td class="heading">Is Final</td>
									<td class="heading">Year/Sem</td> 
									<td class="heading">Issue Date</td> 
									<td class="heading">Result</td> 
									<td class="heading">Actions</td>
								</tr>
							</thead>
							<tbody>
							<?php	
							$marksheetGenerated =0;
							if(!empty($marksheet)){
								$i=1;
								foreach($marksheet as $marksheet_result){
									if($marksheet_result->display_mode == 1){
										$ys=$marksheet_result->year_sem." Year";
									}else{
										$ys=$marksheet_result->year_sem." Sem";
									}
									if($marksheet_result->result == 0){
										$final_result="Pass";
									}else if($marksheet_result->result == 2){
										$final_result="Re-Appear";
									}else if($marksheet_result->result == 1){
										$final_result="Fail";
									}else{
										$final_result="Absent";
									}
									if($marksheet_result->status == 0){
										$sta="Inactive";
									}else if($marksheet_result->status == 1){
										$sta="Active";
									} 
									// echo "<pre>"; print_r($marksheet_result);
								?>
									<tr class="" id="" style="<?php if(!empty($marksheetGenerated) && $marksheetGenerated->final_status == '0'){ ?>background-color: #4caf50 !important;color:#fff;<?php }else{?>background-color: #1b7fdc !important;color:#fff;<?php }?>">
										<td><?=$i?></td>
										<!-- <td><input name="ids[]" type="checkbox" class="checkbox" value="<?=$marksheet_result->id?>" <?php if($marksheet_result->sent_for_print_new == 1){?>checked="checked"<?php }?>></td> -->
										<td>
										<?php 
											if($marksheet_result->sent_for_print == '0'){
												echo '<input required name="print_id[]" id="print_id" type="checkbox" class="input_checkBox" value='.$marksheet_result->duplicate_id.'>';
											}else{
												echo 'Sent to Print';
											}
										?>
										</td>
										<td><?=$marksheet_result->examination_month."-".$marksheet_result->examination_year?></td>
										<td><?=$marksheet_result->student_name?></td>
										<td><?=$marksheet_result->enrollment_number?></td>
										<td><?=$marksheet_result->marksheet_number?></td>
										<td><?=$marksheet_result->course_name?></td>
										<td><?=$marksheet_result->stream_name?></td>
										
										<td><?=$marksheet_result->final_status==1?"yes":"no"?></td>
										
										<td><?=$ys?></td>
										<td><?=date("d-m-Y",strtotime($marksheet_result->marksheet_issue_date))?></td>                             
										<td><?=$final_result?></td>
										<td >
											<!-- <a href="<?=base_url();?>print_duplicate_inner_marksheet_blended/<?=$marksheet_result->id?>" title="Print Marksheet" target="_blank"><i class="mdi mdi-printer"></i></a> -->
											<a href="<?=base_url();?>print_duplicate_inner_marksheet/<?=$marksheet_result->id?>" title="Print Marksheet" target="_blank"><i class="mdi mdi-printer"></i></a>
										</td>
									</tr>
									
									 
							<?php 
								$i++;
								}
							}?>
							</tbody>
						</table>
						</form>
				</div>
			</div> 
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
<script type="text/javascript"> 
$(document).ready(function(){
  // Toggle all checkboxes
  $('#toggle-all').click(function(){
    $('.checkbox').prop('checked', $(this).prop('checked'));
  });
  
  // Toggle the "Toggle All" checkbox if all checkboxes are checked or unchecked
  $('.checkbox').click(function(){
    if($('.checkbox:checked').length == $('.checkbox').length){
      $('#toggle-all').prop('checked', true);
    } else {
      $('#toggle-all').prop('checked', false);
    }
  });
});
  
  $('#example').DataTable({
	  "responsive": true,
	 buttons:[
			
			{
				extend: "excelHtml5",
				title:"Marksheet List",
				messageBottom: 'The information in this table is copyright to the global University.',
				exportOptions: {
                    columns: [0,2,3,4,5,6,7,8,9,10,11],
                    modifier: {
						search: 'applied',
						order: 'applied'
					},
                }, 
                // filename:"Master of Arts-History-1- Medicine and Public Health in Modern India",
			} 
		],
		dom:"Bfrtip",
 });
$(document).ready(function () {		
	$('#send_to_print').validate({
		ignore: [],
		rules: {
			'print_id[]': {
				required: true,
			},
		},
		messages: {
			'print_id[]': {
				required: "Please select at least one certificate",
			},
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
			$('#print_error_message').text(error.text()); // Set the error message in the <span> element
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		},
	});
});
</script>     

<!-- <script>
    $(document).ready(function() {
        $("#send_btn").click(function() {
            // Check if at least one checkbox is selected
            var checkedCheckboxes = $("input[name='print_id[]']:checked").length;

            if (checkedCheckboxes === 0) {
                $("#print_error_message").html("Please select at least one checkbox.");
                return false; // Prevent further action
            } else {
                // Clear the error message if checkboxes are selected
                $("#print_error_message").html("");
                // Perform the "Sent to Print" action
                // Add your logic here to handle the "Sent to Print" action
            }
        });
    });
</script> -->


<script>
    $(document).ready(function() {
        $("#search").click(function() {
            var year = $("#year").val();
            var course = $("#course").val();
            var stream = $("#stream").val();
            var enrollment = $("#enrollment").val();
            var marksheetNumber = $("#marksheet_number").val();
            
            if (!year && !course && !stream && !enrollment && !marksheetNumber) {
                alert("Please select at least one filter.");
                return false; 
            }

            $("#search_form").submit();
        });
    });
</script>

<script>
function validateCheckbox() {
    var checkboxes = document.getElementsByName('print_id[]');
    var isChecked = false;

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            isChecked = true;
            break;
        }
    }

    if (isChecked) {
        document.getElementById('send_to_print').submit();
    } else {
        alert('Please select at least one checkbox.');
    }
}
</script>