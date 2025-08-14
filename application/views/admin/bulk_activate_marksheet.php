<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card"> 
                <div class="card-body">
                  <h4 class="card-title">
					<!-- Search Result -->
					Bulk Activate Marksheet
				  </h4>
                  <p class="card-description">
                    Please enter search details
                  </p>
					<form method="post" name="search_form" id="search_form">
					<div class="row">
				<!-- <div class="col-md-3">
					<div class="form-group">
						<label>Examination</label>
						<select name="month" id="month" class="form-control js-example-basic-single">
							<option value="">Select Month</option>
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
				<div class="col-md-3">
					<div class="form-group">
						<label>Year</label>
						<select name="year" id="year" class="form-control js-example-basic-single">
							<option value="">Select Year</option>
							<?php for($year=2021;$year <= date("Y");$year++){?>
							<option value="<?=$year?>"><?=$year?></option>
							<?php }?>
						</select>
					</div>
				</div> -->


				<div class="col-md-3">
					<div class="form-group">
						<label>Examination*</label>
						<select name="month" id="month" class="form-control js-example-basic-single">
							<option value="">Select Month</option>
							<option value="January" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'January'){ echo 'selected';}?>>January</option>
							<option value="February" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'February'){ echo 'selected';}?>>February</option>
							<option value="March" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'March'){ echo 'selected';}?>>March</option>
							<option value="April" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'April'){ echo 'selected';}?>>April</option>
							<option value="May" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'May'){ echo 'selected';}?>>May</option>
							<option value="June" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'June'){ echo 'selected';}?>>June</option>
							<option value="July" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'July'){ echo 'selected';}?>>July</option>
							<option value="August" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'August'){ echo 'selected';}?>>August</option>
							<option value="September" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'September'){ echo 'selected';}?>>September</option>
							<option value="October" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'October'){ echo 'selected';}?>>October</option>
							<option value="November" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'November'){ echo 'selected';}?>>November</option>
							<option value="December" <?php if($this->input->post('search') == 'Search' && $this->input->post('month') == 'December'){ echo 'selected';}?>>December</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Year*</label>
						<select name="year" id="year" class="form-control js-example-basic-single">
							<option value="">Select Year</option>
							<?php for($year=2021;$year <= date("Y");$year++){?>
							<option value="<?=$year?>" <?php if($this->input->post('search') == 'Search' && $this->input->post('year') == $year){ echo 'selected';}?>><?=$year?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Course</label>
						<select name="course" id="course" class="form-control js-example-basic-single">
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
						<select name="stream" id="stream" class="form-control js-example-basic-single">
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
						<label>Result Status</label>
						<select name="result_status" id="result_status" class="form-control js-example-basic-single">
							<option value="">Select</option>
							<option value="0">Inactive</option>
							<option value="1">Active</option> 
						</select>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
						<label>Result</label>
						<select name="result" id="result" class="form-control js-example-basic-single">
							<option value="">Select</option>
							<option value="0" <?php if($result == '0') {?>selected="selected"<?php } ?>>Pass</option>
							<option value="2" <?php if($result == '2') {?>selected="selected"<?php } ?>>Re-Appear</option>
							<option value="1" <?php if($result == '1') {?>selected="selected"<?php } ?>>Fail</option>
							<option value="3" <?php if($result == '3') {?>selected="selected"<?php } ?>>Absent</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Center</label>
						<select name="center" id="center" class="form-control js-example-basic-single">
							<option value="">Select Center</option>
							<?php if(!empty($center)){
								foreach($center as $center_result){?>
									<option value="<?=$center_result->id?>"><?=$center_result->center_name?></option>
							<?php }}?>
						</select>
					</div>
				</div> 


				<div class="col-md-3">
					<div class="form-group">
						<label>Year/Sem</label>
						<select name="year_sem" id="year_sem" class="form-control js-example-basic-single">
							<option value="">Select year/sem</option>
							<?php for($i=1;$i<=12;$i++){?>
									<option value="<?=$i?>"><?=$i?></option>
							<?php }?>
						</select>
					</div>
				</div> 
				<div class="col-md-12">
					<div class="form-group">
						<input type="submit" name="search" id="search" class="btn btn-primary btn-sm" value="Search">
						<!-- <a href="<?=base_url();?>bulk_activate_marksheet" class="btn btn-danger btn-sm">Reset</a> -->
					</div>
				</div>
				</div>
			</form>
                </div>
              </div>
            </div>
		<?php 	if($this->input->post('search') == "Search"){?>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<div class="row col-md-12">
						<div class="col-md-12" style="margin:10px 0px;">
							<!--<a class="btn btn-primary btn-sm pull-right" href="#" id="btnExport" onclick="return exportexcel();">Export</a>-->
						</div>
							<div id="dvData"> 
							<div class="row col-md-12">
									<div class="col-md-12">
										<h4><b>Exam : <?=$this->input->post('month').' - '.$this->input->post('year');?></b></h4>
									</div>
								</div>
																
							<?php if(!empty($exam_setup)){ 
								
								// echo "<pre>";print_r($exam_setup);exit;
								?>


							<form method="post" id="activate_marksheet">  

								<div class="card">
									<div class="card-body">
										<div class="row col-md-12">
											<div class="col-md-3">
												<div class="form-group">
													<label>Signature</label>
													<!-- <select class="form-control js-example-basic-single" name="signature" id="signature">
														<option value="">Select Signature</option>
														<?php if(!empty($signature)){ foreach($signature as $signature_result){?>
														<option value="<?=$signature_result->id?>" ><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
														<?php }}?>
													</select> -->
													
													<select class="form-control js-example-basic-single" name="signature" id="signature">
														<option value="">Select Signature</option>
														<?php if(!empty($signature)){ foreach($signature as $signature_result){?>
														<option value="<?=$signature_result->id?>" <?php if (!empty($exam_setup) &&  $exam_setup->signature == $signature_result->id) { ?>selected="selected"<?php } ?>><?=$signature_result->dispalay_signature?> </option>
														<?php }}?>
													</select>
                                                </option>
												</div>
											</div>


											<div class="col-md-3">
												<div class="form-group">
													<label>Checked By Signature</label>
													<select class="form-control js-example-basic-single" name="checked_signature_id" id="checked_signature_id">
														<option value="">Select Checked By Signature</option>
														<?php
														// echo "<pre>";print_r($signature);exit;
														
														if(!empty($signature)){ foreach($signature as $signature_result){	
														?>
														<option value="<?=$signature_result->id?>"  <?php if (!empty($exam_setup) &&  $exam_setup->checked_signature_id == $signature_result->id) { ?>selected="selected"<?php } ?>><?=$signature_result->dispalay_signature?> </option>
														<?php }}?>
													</select>
                                                </option>
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group">
													<label>Prepared By Signature</label>
													<select class="form-control js-example-basic-single" name="prepared_signature_id" id="prepared_signature_id">
														<option value="">Select Prepared By Signature</option>
														<?php if(!empty($signature)){ foreach($signature as $signature_result){?>
														<option value="<?=$signature_result->id?>"  <?php if (!empty($exam_setup) &&  $exam_setup->prepared_signature_id == $signature_result->id) { ?>selected="selected"<?php } ?>><?=$signature_result->dispalay_signature?> </option>
														<?php }}?>
													</select>
                                                </option>
												</div>
											</div>


											<div class="col-md-3">
												<div class="form-group">
													<label>Result Declare Date</label>
													<input type="text" class="form-control datepicker" name="result_declare_date" id="result_declare_date" value="<?php if (!empty($exam_setup)) { echo $exam_setup->result_declare_date;} ?>"> 
												</div>
											</div>
											
											<div class="col-md-3">
												<div class="form-group">
													<label>Marksheet Issue Date</label>
													<input type="text" class="form-control datepicker" name="marksheet_issue_date" id="marksheet_issue_date" value="<?php if (!empty($exam_setup)) { echo $exam_setup->marksheet_issue_date;} ?>"> 
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<input type="submit" name="activate_separate_marksheet_bulk" value="Activate Marksheet" class="btn btn-info" style="margin-top: 33px;">
												</div> 
											</div>

											<!-- <div class="col-md-3 signature_img_inner" style="display:none;">
												<label>Signature</label>
												<img src="" alt="Signature" name="signature_img" id="signature_img" style="max-width: 50%;">											
											</div> -->
										</div>
										
									</div>
								</div>
								<?php if($this->input->post('enrollment') !=""){?>
								<strong>Total Subject: <span id="total_subject">0</span></strong>
								<?php }?>
								
								<table id="mytable" class="resultTable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
								<thead>
										<tr>
										  <td class="heading"><input type="checkbox" class="checkall" name="checkall" id="checkAll"><br>Examination</td>
										  <td class="heading">Student Name</td>
										  <td class="heading">Enrollment number</td>
										  <td class="heading">Course</td>
										  <td class="heading">Stream</td>
										  <td class="heading">Year/Sem</td>
										  <td class="heading">Internal</td>
										  <td class="heading">External</td>
										  <td class="heading">Result</td>
										  <td colspan="3" class="heading">Exam Type</td>
										  <td class="heading">Status</td>
										  <td class="heading">Actions</td>
										</tr>
									</thead>
									<tbody>
									<?php	
									$total_subject = "0";
									$marksheetGenerated =0;
									if(!empty($result)){
										$i=0;
										foreach($result as $result_arr){
											//$marksheetGenerated = $this->mics_model->get_marksheet_status($result_arr->result_id);
											//$student = $this->mics_model->get_student_name($result_arr->enrollment_number);
											if($result_arr->course_mode == 1){
												$ys=$result_arr->year_sem." Year";
											}else if($result_arr->course_mode == 2){
												$ys=$result_arr->year_sem." Sem";
											}else if($result_arr->course_mode == 3){
												$ys=$result_arr->year_sem." Both";
											}else{
												$ys=$result_arr->year_sem." Month";
											}
											if($result_arr->result == 0){
												$res="Pass";
											}else if($result_arr->result == 2){
												$res="Re-Appear";
											}else if($result_arr->result == 1){
												$res="Fail";
											}else{
												$res="Absent";
											}
											if($result_arr->status == 0){
												$sta="Inactive";
											}else if($result_arr->status == 1){
												$sta="Active";
											} 
											if($i%2==0){
												$resultClass="result";
											}else{
												$resultClass="result1";
											}
											  
										?>
											<tr>
												<td><input type="checkbox" name="resukt_id[]" value="<?=$result_arr->id?>"> <?=$result_arr->examination_month."-".$result_arr->examination_year?></td>
												<td><?=$result_arr->student_name?></td>
												<td><?=$result_arr->enrollment_number?></td>
												<td><?=$result_arr->course_name?></td>
												<td><?=$result_arr->stream_name?></td>
												<td><?=$ys?></td>
												<td><?=$result_arr->internal_marks_obtained?></td>                             
												<td><?=$result_arr->external_marks_obtained?></td>                          
												<td><?=$res?></td>
												<td colspan="3"><?php if($result_arr->examination_status == '0'){ echo "Main Exam";}else{ echo "Re-Exam";}?></td>
												<td><?=$sta?></td>
												<td width="10%"> 
												<?php if($this->session->userdata("admin_id")!=15): ?>	 	
												<a href="<?=base_url();?>generate_marksheet/<?=$result_arr->id.'/'.$result_arr->enrollment_number.'/'.$result_arr->year_sem?>" title="Generate Marksheet" target="_blank"><i class="mdi mdi-apps"></i></a>
													<?php endif; ?>
														<a href="<?=base_url();?>update_result/<?=$result_arr->id?>" title="Edit Result"><i class="mdi mdi-table-edit"></i></a>
														<a href="<?=base_url();?>delete_result/<?=$result_arr->id?>" onclick="return confirm('Are you sure to delete result?');" title="Delete Result"><i class="mdi mdi-delete"></i></a>
												</td>
											</tr>
											
											<tr class="<?=$resultClass?>" id="subrow<?=$i?>" style="display:none;">
												<td colspan="10">
														<tr>
															<td class="heading">Subject Code</td>
															<td class="heading" colspan="4">Subject Name</td>
															<td class="heading" colspan="2">Internal Max Marks</td>
															<td class="heading" colspan="2">Internal Marks</td> 
															<td class="heading" colspan="2">External Max Marks</td>
															<td class="heading" colspan="2">External Marks</td>
															<td class="heading" colspan="2">Result</td>
														</tr>
												<?php 
												$subject = $this->Exam_model->get_selected_subject_for_result($result_arr->id);
											 
											  if(!empty($subject)){
												foreach($subject as $subject_result){
													$total_subject = $total_subject+1;
													if($subject_result->result == 0){
														$res1="Pass";
													}else if($subject_result->result == 1){
														$res1="Re-Appear";
													}else{
														$res1="Absent";
													}
											?>
												 <tr>
													 <td><?=$subject_result->subject_code?></td>
													 <td colspan="4"><?=$subject_result->subject_name?></td>
													 <td colspan="2"><?=$subject_result->internal_max_marks?></td>
													 <td colspan="2"><?=$subject_result->internal_marks_obtained?></td>
													 <td colspan="2"><?=$subject_result->external_max_marks?></td>
													 <td colspan="2"><?=$subject_result->external_marks_obtained?></td>
													 <td colspan="2"><?=$res1?></td>                            
												 </tr>
											  <?php }}
											
												  ?>
												<tr>
													<td align="center" colspan="14">
														<?php if($result_arr->status == "1"){?>
														<a href="<?=base_url();?>inactivate_results/<?=$result_arr->id?>" class="btnsml btn btn-primary btn-sm">Hide Result</a>&nbsp;
														<?php }else{?>
														<a href="<?=base_url();?>activate_results/<?=$result_arr->id?>" class="btnsml btn btn-primary btn-sm">Show Result</a>&nbsp; 
														<?php }?>
													</td>
												</tr>
												
												  
											 
										   </td>
								   </tr>
										<tr><td style="border:none;" colspan="14">&nbsp;</td></tr>	
									<?php 
										$i++;
										}
									}?>
									</tbody>
								</table>
								<input type="hidden" id="total_subject_count" value="<?=$total_subject?>">
								</form>

								<?php }else{ ?>
								<div class="card">
									<div class="card-body">
										<div class="col-lg-12">
											<span class="error">Exam setup not found. Please add the exam setup first. <a href="<?=base_url();?>exam_setup" style="text-decoration:underline;">Add Now</a> </span>
										</div>
									</div>
								</div>
								<?php } ?>
								
								
						</div>
					</div>
					    
			
                </div>
              </div>
            </div>
			<?php } ?>

          </div>
        </div>
      
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
<script type="text/javascript">
$('#activate_marksheet').validate({ 
		rules: {
			signature: {
				required: true,
			},
			result_declare_date: {
				required: true,
			},
			marksheet_issue_date: {
				required: true,
			},
		},
		messages: {
			signature: {
				required: "Please select signature",
			},
			result_declare_date: {
				required: "Please select result declare date",
			},
			marksheet_issue_date: {
				required: "Please select marksheet issue date",
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
 $(window).on('load', function() {
  $("#total_subject").html($("#total_subject_count").val());
}); 
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
}); 
$("#course").change(function(){  
	if($(this).val() == "23"){
		$("#payment_option").show();
	}else{
		$("#payment_option").hide();
	}
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');
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
		maxDate:0, 
		/*maxDate: "-12Y", 
		minDate: "-80Y", 
		yearRange: "-100:-0"*/ 
	}); 
});
</script>    

<script>

// $("#signature").change(function(){  
// 	if($('signature').val() != ""){
// 	$.ajax({
// 		type: "POST",
// 		url: "<?=base_url();?>admin/Ajax_controller/get_signature",
// 		data:{'signature':$("#signature").val()},
// 		success: function(data){
// 			console.log(data);
// 			if(data != ""){
// 				$('.signature_img_inner').show();
// 				$('#signature_img').attr('src',data);
// 			}else{
// 				$('.signature_img_inner').hide();
// 				$('#signature_img').attr('src','');
// 			}
// 		},
// 		 error: function(jqXHR, textStatus, errorThrown) {
// 		   console.log(textStatus, errorThrown);
// 		}
// 	});	
// }
// });
$('#mytable').DataTable({
   
   responsive: true

});


$('#search_form').validate({ 
	ignore: ":hidden:not(select)",
		rules: {
			month: {
				required: true,
			},
			year: {
				required: true,
			},
			
		},
		messages: {
			month: {
				required: "Please select month",
			},
			year: {
				required: "Please select year",
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

	$('#month').on('change', function() {
    	$('#month').valid();
	});

	$('#year').on('change', function() {
    	$('#year').valid();
	});
</script>


