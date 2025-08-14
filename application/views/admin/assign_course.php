<?php include('header.php');?>
<style>
.loader-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
  display: none; /* Initially hidden */
  justify-content: center;
  align-items: center;
  z-index: 9999; /* Ensures it covers the page */
}

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.box_update th{
font-size: 12px;
    border: none;
    text-align: center;
    font-weight: 600;
	
}
.card{
	background:transparent;
}
.box_update thead{
   border:none;
}
.box_update th tr{
   border:none;
}
.box_update tr td:first-child{
	text-align:center;
}
.box_update tr td{
	padding-left:10px;
}
.box_update tr td input{
	border:none;
	text-align:center;
}
.box_update table{
	border-color:#e1e1e1;
}
.card-header{
	background-color:transparent !important;
	border:none;
}
.paarent_stream{
  margin-bottom: 25px;
    background: #fff;
    padding-bottom: 20px;
    border-radius: 9px;
    border: 1px solid #ccc;
	transition:1s ease;
}
.paarent_stream:hover{
transition:0.5s ease;
box-shadow: 0px 0px 18px rgb(0 0 0 / 22%);
}

.percentag{
	font-size:12px;
}
.card-link{
    color: #4b0605 !important;
	cursor: default;
	font-weight:600;
}
.card{
	box-shadow:none !important; 
}
</style>
<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body"  style="background-color:#fff; border-radius: 6px;  border: 1px solid #ccc;">
							<h4 class="card-title">Course & Fees setup for <?php if(!empty($single)){ echo $single->center_name;}?></h4>
							<p></p>
							<div class="form-body"> 
								<form name="search_form" id="search_form" method="get" enctype="multipart/form-data" class="form-horizontal">
									<div class="row">
										<div class="col-sm-10">
											<select name="search" id="search" class="form-control js-example-basic-single">
											<?php
												//$course = $this->Center_model->get_active_course_all();
												if(!empty($course)) { 
													foreach($course as $course_result) {
												?>
											<option value="<?=$course_result->course_name?>" <?php if(isset($_GET['search']) && $_GET['search'] == $course_result->course_name){?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
											<?php }}?>
											</select>
										</div>
										<div class="col-sm-2">
											<button type="submit" class="btn btn-primary x1_button" style="padding-bottom: 30px;line-height: 19px;" >Search</button>
											<button type="reset" class="btn btn-primary x1_button" onclick="resetForm()" style="padding-bottom: 30px;line-height: 19px;" >Reset</button>
										</div>
									</div>
								</form>
							</div> 
						</div> 
					</div> 
				</div> 
			</div>
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div>
							
								
								<div id="accordion">
									<div class="card">
										<div id="collapseOne1" class="collapse show" data-parent="#accordion">
											<div class="card-body" style="background-color:#fff;border-radius:6px;  border: 1px solid #ccc;">
												<div class="row">
													<div class="col-md-3">
														<div>
															<label style=" line-height: 75px; margin: 0;"> <input type="checkbox" style="margin-top" title="Select All" class="form-control" name="all_course" id="all_course" value="All"> Select All Course</label>
															
														</div>
													</div>
													<!--<div class="col-md-3">
														<div class="form-group">
															<label>Session</label>
															<select name="session" id="session" class="form-control js-example-basic-single">
																<option value="">Select Session</option>
																<?php if(!empty($session)) { foreach($session as $session_result) { ?>
																<option value="<?=$session_result->id?>" <?php if(isset($_GET['session']) && $_GET['session'] == $session_result->id){?>selected="selected"<?php }?>><?=$session_result->session_name?></option>
																<?php }} ?>
															</select>
														</div>
													</div>-->
													<div class="col-md-3">
														<div class="form-group">
															<label class="percentag">Percentage</label>	
															<input type="text" name="common_percentage" id="common_percentage" class="form-control">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<button type="button" style="padding-bottom: 30px;margin-top: 34px;line-height: 19px;" onclick="return apply_for_all();" class="btn btn-primary">Apply for all</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<br>

									<div class="card">
										<?php	 
										/*if(isset($_GET['session']) && $_GET['session'] !=""){
											$exp = array();
											if(!empty($single)){ 
												$exp = explode(",", $single->courses);
											}
											$session_id = "0";
											if(isset($_GET['session'])){
												$session_id = $_GET['session'];
											}else{
												if(!empty($session)){
													$session_id = $session[0]->id; 
												}
											}*/
											//$course = $this->Center_model->get_active_course();
											if(!empty($course)) { 
												foreach($course as $course_result) {
													?>
													<form name="add_form" id="add_form" method="post" enctype="multipart/form-data" class="form-horizontal">
													<input type="hidden" name="id" id="id" value="<?php if(!empty($single)){ echo $single->id;} ?>">
													<input type="hidden" name="course_id" id="course_id" value="<?=$course_result->id?>">
													<?php 
													if((isset($_GET['search']) && $_GET['search'] == $course_result->course_name) || (!isset($_GET['search']) && !empty($course_result))){
														$stream = $this->Center_model->get_course_stream_with_fees($course_result->id,$this->uri->segment(2));
										?>
										<div class="divider"></div>
										<div class="paarent_stream">
											<div class="card-header">
												<div class="row">
													<div class="col-md-12">
														<a class="card-link" data-toggle="collapse" href="#collapseOne1" style="font-size: 19px;font-weight: 600;cursor:default;"><?=$course_result->course_name?></a>
													</div>
													<div class="col-md-12">
													<div class="row">
														<div class="form-group col-md-3">
															<label class="percentag">Fees</label>
															<input type="text" name="stream_fees" id="stream_fees" class="form-control" value="<?php if($stream[0]->actual_fees !="0"){ echo $stream[0]->actual_fees;}else{ echo $stream[0]->fees;}?>">
														</div>
														<div class="form-group col-md-3">
															<button type="button" style="padding-bottom: 30px;margin-top: 34px;line-height:21px" onclick="return apply_for_all_stream_fees(this);" class="btn btn-primary">Apply Fees</button>
														</div>
														<div class="form-group col-md-3">
															<label class="percentag">Percentage</label>
															<input type="text" name="stream_percentage" id="stream_percentage" class="form-control">
														</div>
														<div class="form-group col-md-3">
															<button type="button" style="padding-bottom: 30px;margin-top: 34px;line-height:21px" onclick="return apply_for_all_stream(this);" class="btn btn-primary">Apply Percentage</button>
														</div>
														</div>
													</div>
													
												</div>
											</div>
											<div class="col-lg-12 box_update">
											<table border="1">
												<thead>
													<tr>
														<th><input type="checkbox" class="all_stream" value="All">Select</th>
														<th>Stream Name</th>
														<th>Total Fees</th>
														<th>Percentage</th>
														<th>Total Paid Fees Center</th>
														<th>Total Paid Fees Foreign Center</th>
														<th>Registration Fees</th>
														<th>Exam Fees</th>
													</tr>
												</thead>
												<?php if(!empty($stream)) { foreach($stream as $stream_result) { 
													if($stream_result->fees_session_id !="0" && $stream_result->fees_session_id !=""){
														 $session_id = $stream_result->fees_session_id;
													}
													//echo $session_id.'=='.$stream_result->center_course_id.' == '.$stream_result->center_stream_id."<br>";
												?>
												<tbody>
													<tr <?php if($stream_result->fees =="0"){?>style="color:red"<?php }?>>
														<td>
															<input type="checkbox" class="all stream-checkbox" name="stream_data[]" id="stream_data___<?=$course_result->id?>___<?=$stream_result->stream?>" value="<?=$stream_result->stream?>" <?php if($stream_result->fees_peky !="0") { ?>checked="checked"<?php } ?>></td>
														<td style="padding-left:10px;font-size:14px;">
															<?=$stream_result->stream_name?>
															<input type="hidden" class="common_update" value="<?=$course_result->id?>___<?=$stream_result->stream?>">
														</td>
														<td>
															<input type="text" class="form-control fees_cal actual_fees" onkeyup="return saver_dis('<?=$course_result->id?>___<?=$stream_result->stream?>');" name="fees[]" id="fees___<?=$course_result->id?>___<?=$stream_result->stream?>" value="<?php if($stream_result->actual_fees !="" && $stream_result->actual_fees !="0"){ echo $stream_result->actual_fees;}else{ echo $stream_result->fees;}?>">
														</td>
														<td>
															<input type="text" class="form-control percentage" onkeyup="return saver_dis('<?=$course_result->id?>___<?=$stream_result->stream?>');" name="percentage[]" id="percentage___<?=$course_result->id?>___<?=$stream_result->stream?>" value="<?=$stream_result->percentage?>">
														</td>
														<td>
															<input type="text" class="form-control total_paid_fees" onkeyup="return saver_dis('<?=$course_result->id?>___<?=$stream_result->stream?>');" name="total_paid_fees[]" id="total_paid_fees___<?=$course_result->id?>___<?=$stream_result->stream?>" value="<?=$stream_result->paid_fees?>">
														</td>
														<td>
															<input type="text" class="form-control foreign_fees" onkeyup="return saver_dis('<?=$course_result->id?>___<?=$stream_result->stream?>');" name="foreign_fees[]" id="foreign_fees___<?=$course_result->id?>___<?=$stream_result->stream?>" value="<?=$stream_result->foregin_fees?>">
														</td>
														<td>
															<input type="text" class="form-control" onkeyup="return saver_dis('<?=$course_result->id?>___<?=$stream_result->stream?>');" name="registration_fees[]" id="registration_fees___<?=$course_result->id?>___<?=$stream_result->stream?>" value="<?php if($stream_result->registration_fees == "") { echo "100"; } else { echo $stream_result->registration_fees; } ?>">
														</td>
														<td>
															<input type="text" class="form-control" onkeyup="return saver_dis('<?=$course_result->id?>___<?=$stream_result->stream?>');" name="examination_fees[]" id="examination_fees___<?=$course_result->id?>___<?=$stream_result->stream?>" value="<?php if($stream_result->exam_fees == "") { echo "1000"; } else { echo $stream_result->exam_fees; } ?>">
														</td>
													</tr>
												</tbody>
												<?php }} ?>
											</table>
											<button type="submit" name="save" id="save" class="btn btn-info" style="margin-left: 41%;margin-top: 2%;padding-top: 6px;" value="Save">Fianl Save of This Course Box</button>
											</div>
										</div>
												<?php }?>
													
												</form>
												<?php }
											}
										?>
									</div>
									</div>

									<div class="row form-group">
										<div class="col-lg-6 col-lg-offset-6">
											<!--<button type="submit" name="save" id="save" class="btn btn-primary" value="Save">Save</button>-->
										</div>
									</div>
								</div>
							 
					</div>
                </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        </div>
 <div id="loaderOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 9999; justify-content: center; align-items: center;">
    <div class="loader" style="border: 8px solid #f3f3f3; border-radius: 50%; border-top: 8px solid #3498db; width: 60px; height: 60px; animation: spin 1s linear infinite;"></div>
</div>     
<?php include_once('footer.php');
if($this->uri->segment(2) == ""){
	$id = 0;
}else{
	$id = $this->uri->segment(2);
}
?>
<script>
	$("#user").change(function(){
		window.location.href="<?=base_url();?>assign_user_privilege/"+$(this).val();
	});
	$("#add_form").validate({
		rules: { 	
			user: "required", 			
		},
		messages: { 	
			user: "Please select user!",  
		}, 
		submitHandler: function(form){
			form.submit();
		} 
	});
	$("#all_course").change(function(){
		$("input:checkbox").prop('checked', $(this).prop("checked"));
	});
	
	document.querySelectorAll('.all_stream').forEach(function(selectAllCheckbox) {
		selectAllCheckbox.addEventListener('click', function() {
			// Get the table containing this select-all checkbox
			const table = this.closest('table');
			// Get all checkboxes within this table
			const checkboxes = table.querySelectorAll('.stream-checkbox');
			// Set the checked status for all checkboxes
			checkboxes.forEach(checkbox => {
				checkbox.checked = this.checked;
			});
		});
	});

	
</script>

<script>
    function resetForm() {
        document.getElementById("search").value = ''; // Clear search input
        window.location.href = window.location.pathname; // Redirect without search parameter
    }
	
</script>

<script>
function apply_for_all(){
	start_load();
	// Add an event listener for the common_percentage input field
	//document.getElementById('common_percentage').addEventListener('input', function() {
		$(".percentage").val($('#common_percentage').val());
		let commonPercentage = parseFloat($('#common_percentage').val());
		
		// Get all the rows with class 'percentage'
		let rows = document.querySelectorAll('.total_paid_fees');
		let forrows = document.querySelectorAll('.foreign_fees');
		
		// Loop through each row and calculate the total paid fees
		rows.forEach(function(row, index) {
			let feesField = document.querySelectorAll('input[name="fees[]"]')[index];
			let fees = parseFloat(feesField.value) || 0;

			// Calculate total paid fees based on the common percentage
			let totalPaidFees = (fees * commonPercentage) / 100;

			// Set the calculated value in the total_paid_fees field
			row.value = totalPaidFees;
		});
		forrows.forEach(function(rowf, index) {
			let feesField = document.querySelectorAll('input[name="fees[]"]')[index];
			let fees = parseFloat(feesField.value) || 0;

			// Calculate total paid fees based on the common percentage
			let totalPaidFees = (fees * commonPercentage) / 100;

			// Set the calculated value in the total_paid_fees field
			rowf.value = totalPaidFees*2;
		});
	//});
	apply_for_all_per();
}

function apply_for_all_stream(button) { 
    // Find the closest card container to the button
    var card = button.closest('.paarent_stream');
    if (!card) { 
        console.error('Error: .card not found');
        return;
    }

    // Find the percentage input field within the same card
    var percentage_input = card.querySelector('#stream_percentage');
    if (!percentage_input) { 
        console.error('Error: #stream_percentage input not found');
        return;
    }

    // Parse the percentage value from the input field
    var percentage = parseFloat(percentage_input.value) || 0;

    // Find the table within the same card
    var table = card.querySelector('table');
    if (!table) {
        console.error('Error: Table not found within .card');
        return;
    }

    // Get all rows in the tbody of the table
    var rows = table.querySelectorAll('tbody tr');
    if (rows.length === 0) {
        console.error('Error: No rows found in the table');
        return;
    }

    // Loop through each row and apply the percentage
    rows.forEach(function (row) {  
        // Find the fees input within the row
        var fees_input = row.querySelector('input[name="fees[]"]');
        if (!fees_input) { 
            console.error('Error: Fees input not found');
            return;
        }

        // Get the original fees value
        var original_fees = parseFloat(fees_input.value) || 0;

        // Calculate the new fees based on the percentage
        var new_fees = (original_fees * percentage) / 100;

        // Find the total paid fees input and update its value
        var total_paid_fees_input = row.querySelector('.total_paid_fees');
        var total_foreign_fees_input = row.querySelector('.foreign_fees');
        var percentage_input_single = row.querySelector('.percentage');
        
        if (total_paid_fees_input) {
            total_paid_fees_input.value = new_fees; // Update with formatted value
        } else {
            console.error('Error: Total paid fees input not found');
        }

        if (total_foreign_fees_input) {
            total_foreign_fees_input.value = (new_fees * 2); // Assuming this is the desired calculation
        }

        if (percentage_input_single) {
            percentage_input_single.value = percentage; // Update percentage input
        }
    });
	apply_for_all_per();
}

function apply_for_all_stream_fees(button) { 
    // Find the closest card container to the button
    var card = button.closest('.paarent_stream');
    if (!card) { 
        console.error('Error: .card not found');
        return;
    }

    // Find the percentage input field within the same card
    var stream_fees_input = card.querySelector('#stream_fees');
    

    // Parse the percentage value from the input field
    var stream_fees = parseFloat(stream_fees_input.value) || 0;

    // Find the table within the same card
    var table = card.querySelector('table');
    if (!table) {
        console.error('Error: Table not found within .card');
        return;
    }

    // Get all rows in the tbody of the table
    var rows = table.querySelectorAll('tbody tr');
    if (rows.length === 0) {
        console.error('Error: No rows found in the table');
        return;
    }

    // Loop through each row and apply the percentage
    rows.forEach(function (row) {  
         
        // Find the total paid fees input and update its value
        var actual_fees_input = row.querySelector('.actual_fees'); 
        
        if (actual_fees_input) {
            actual_fees_input.value = stream_fees; // Update with formatted value
        } else {
            console.error('Error: Total paid fees input not found');
        }
    });
	
	rows.forEach(function (row) {  
        var total_paid_fees_input = row.querySelector('.total_paid_fees');
        var total_foreign_fees_input = row.querySelector('.foreign_fees');
        var percentage_input_single = row.querySelector('.percentage');
        var actual_fees_input_single = row.querySelector('.actual_fees');
        
		 var new_fees = (actual_fees_input_single.value * percentage_input_single.value) / 100;
		 //console.log(actual_fees_input_single.value);
        if (total_paid_fees_input) {console.log(actual_fees_input_single.value);
            total_paid_fees_input.value = new_fees; // Update with formatted value
        } else {
            console.error('Error: Total paid fees input not found');
        }

        if (total_foreign_fees_input) {
            total_foreign_fees_input.value = (new_fees * 2); // Assuming this is the desired calculation
        }
 
    });
	apply_for_all_per();
}



document.querySelectorAll('.percentage').forEach(function(percentageField, index) {
	percentageField.addEventListener('input', function() {
		let percentage = parseFloat(this.value) || 0;  
		let feesField = document.querySelectorAll('input[name="fees[]"]')[index];   
		let totalPaidFeesField = document.querySelectorAll('.total_paid_fees')[index];   
		let totalForePaidFeesField = document.querySelectorAll('.foreign_fees')[index];  
		let fees = parseFloat(feesField.value) || 0;  
		let totalPaidFees = (fees * percentage) / 100; 
		totalPaidFeesField.value = totalPaidFees;
		totalForePaidFeesField.value = totalPaidFees*2; 
	});
});
document.querySelectorAll('.fees_cal').forEach(function(percentageField, index) {
	percentageField.addEventListener('input', function() {
		let feesField = document.querySelectorAll('input[name="fees[]"]')[index];   
		let percentage = document.querySelectorAll('.percentage')[index]; 
		let totalPaidFeesField = document.querySelectorAll('.total_paid_fees')[index];   
		let totalForePaidFeesField = document.querySelectorAll('.foreign_fees')[index];    
		let fees = parseFloat(feesField.value) || 0;   
		let totalPaidFees = (fees * percentage.value) / 100; 
		totalPaidFeesField.value = totalPaidFees;
		totalForePaidFeesField.value = totalPaidFees*2; 
	});
});
	
	







document.addEventListener("DOMContentLoaded", function () {

    // Function to enable or disable inputs in the same row as the checkbox
    function toggleRowInputs(checkbox) {
        let row = checkbox.closest("tr");
        let inputs = row.querySelectorAll('input[type="text"]');

        if (checkbox.checked) {
            inputs.forEach(input => input.disabled = false);
        } else {
            inputs.forEach(input => input.disabled = true);
        }
    }

    // Initialize the state of inputs based on the initial state of checkboxes
    document.querySelectorAll(".stream-checkbox").forEach(function (checkbox) {
        toggleRowInputs(checkbox); // Toggle based on initial checked status

        // Toggle inputs on checkbox change
        checkbox.addEventListener("change", function () {
            toggleRowInputs(checkbox);

            // Check/uncheck the corresponding table's select-all checkbox based on the row checkboxes
            let table = checkbox.closest("table");
            let allChecked = table.querySelectorAll(".stream-checkbox:checked").length === table.querySelectorAll(".stream-checkbox").length;
            table.querySelector(".all_stream").checked = allChecked;
        });
    });

    // Handle the "Select All" checkbox for each table
    document.querySelectorAll(".all_stream").forEach(function (allStreamCheckbox) {
        allStreamCheckbox.addEventListener("change", function () {
            let table = allStreamCheckbox.closest("table");
            let isChecked = allStreamCheckbox.checked;

            // Check/uncheck all row checkboxes in the table
            table.querySelectorAll(".stream-checkbox").forEach(function (checkbox) {
                checkbox.checked = isChecked;
                toggleRowInputs(checkbox);  // Enable/disable inputs in the row
            });
        });
    });

    // Handle the global "Select All" checkbox for all tables
    document.getElementById("all_course").addEventListener("change", function () {
        let isChecked = this.checked;

        // Check/uncheck all row checkboxes in all tables and enable/disable inputs
        document.querySelectorAll(".stream-checkbox").forEach(function (checkbox) {
            checkbox.checked = isChecked;
            toggleRowInputs(checkbox);  // Enable/disable inputs in the row
        });

        // Check/uncheck all individual table "Select All" checkboxes
        document.querySelectorAll(".all_stream").forEach(function (allStreamCheckbox) {
            allStreamCheckbox.checked = isChecked;
        });
    });

});
//course->$course_result->id/stream->$stream_result->id/center$this->uri->segment(2)?>
function apply_for_all_per(){
	$(".common_update").each(function(){
		saver_dis($(this).val());
	});
}
/*function saver_dis(str){  
	//start_load();
	str_val = str.split("___");
	if($("#stream_data___"+str).is(':checked')){
		$.ajax({ 
			type: "POST", 
			url: "<?=base_url();?>admin/Ajax_controller/set_center_fees_ajax", 
			data:{
				'course_id':str_val[0],
				'stream_id':str_val[1],
				'fees':$("#fees___"+str).val(),
				'percentage':$("#percentage___"+str).val(),
				'total_paid_fees':$("#total_paid_fees___"+str).val(),
				'foreign_fees':$("#foreign_fees___"+str).val(),
				'registration_fees':$("#registration_fees___"+str).val(),
				'examination_fees':$("#examination_fees___"+str).val(),
				'center':'<?=$this->uri->segment(2)?>',
				'session':$("#session_id").val()
			}, 
			success: function(data){ 
				 $("#stream_data___"+str).val(data);
			}, 
			 error: function(jqXHR, textStatus, errorThrown){ 
			   console.log(textStatus, errorThrown); 
			} 
		});	
	}
}*/
/*
$(".stream-checkbox").change(function(){ 
	//start_load();
	if($(this).is(':checked')){ 
		str = $(this).attr("id");
		str_val = str.split("___");
		id_name = str_val[1]+'___'+str_val[2];
		//if($("#stream_data___"+str).is(':checked')){
			$.ajax({ 
				type: "POST", 
				url: "<?=base_url();?>admin/Ajax_controller/set_center_fees_ajax", 
				data:{
					'course_id':str_val[1],
					'stream_id':str_val[2],
					'fees':$("#fees___"+id_name).val(),
					'percentage':$("#percentage___"+id_name).val(),
					'total_paid_fees':$("#total_paid_fees___"+id_name).val(),
					'foreign_fees':$("#foreign_fees___"+id_name).val(),
					'registration_fees':$("#registration_fees___"+id_name).val(),
					'examination_fees':$("#examination_fees___"+id_name).val(),
					'center':'<?=$this->uri->segment(2)?>',
					'session':'0',
					'id':$(this).val(),
				}, 
				success: function(data){  
					$("#stream_data___"+id_name).val(data);
				}, 
				 error: function(jqXHR, textStatus, errorThrown){ 
				   console.log(textStatus, errorThrown); 
				} 
			});	
		//}
	}else{  
		$.ajax({ 
			type: "POST", 
			url: "<?=base_url();?>admin/Ajax_controller/remove_course_fees_center", 
			data:{
				'id':$(this).val(), 
			}, 
			success: function(data){ 
			}, 
			 error: function(jqXHR, textStatus, errorThrown){ 
			   console.log(textStatus, errorThrown); 
			} 
		});	
	}
});*/
function start_load() {
    var loader = document.getElementById('loaderOverlay');
    if (loader) {
        loader.style.display = 'flex';
        
        // Hide the loader after 3 seconds
        setTimeout(function() {
            loader.style.display = 'none';
        }, 3000);
    } else {
        console.error("Element with ID 'loaderOverlay' not found.");
    }
}
$("#session").change(function(){
	window.location.href="<?=base_url()?>/assign_course/<?=$this->uri->segment(2)?>";
});
</script>