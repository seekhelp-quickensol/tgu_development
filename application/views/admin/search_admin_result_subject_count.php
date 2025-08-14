<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                  <!--<div class="card-body">
              		 <h4 class="card-title">Activate all the results</h4>
              		 <a class='btn btn-danger' onclick='return confirm("Are sure to do this ?")' href="<?=base_url('activate_all_results');?>">Activate</a>
              	</div>-->
                <div class="card-body">
                  <h4 class="card-title">
					<!-- Search Result -->
					Search Result Subject Count
				</h4>
                  <!-- <p class="card-description">
                    Please enter search details
                  </p> -->
					<form method="post" name="search_form" id="search_form">
					<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Examination</label>
						<select name="month" id="month" class="form-control js-example-basic-single select2_single">
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
						<select name="year" id="year" class="form-control js-example-basic-single select2_single">
							<option value="">Select Year</option>
							<?php for($year=2021;$year <= date("Y");$year++){?>
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
						<label>Result Status</label>
						<select name="result_status" id="result_status" class="form-control js-example-basic-single select2_single">
							<option value="">Select</option>
							<option value="0">Inactive</option>
							<option value="1">Active</option> 
						</select>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
						<label>Result</label>
						<select name="result" id="result" class="form-control js-example-basic-single select2_single">
							<option value="">Select</option>
							<option value="0">Pass</option>
							<option value="2">Re-Appear</option>
							<option value="1">Fail</option>
							<option value="3">Absent</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Center</label>
						<select name="center" id="center" class="form-control js-example-basic-single select2_single">
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
						<select name="year_sem" id="year_sem" class="form-control js-example-basic-single select2_single">
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
					<div class=" " >
						
						<div id="dvData" style="">  
							<table id="example" class="resultTable table table-striped table-bordered dt-responsive nowrap" style="width:100%;" cellpadding="5">
							<thead>
									<tr>
									  <td class="heading">Total Subject</td>
									  <td class="heading">Examination</td>
									  <td class="heading">Student Name</td>
									  <td class="heading">Enrollment number</td>
									  <td class="heading">Course</td>
									  <td class="heading">Stream</td>
									  <td class="heading">Year/Sem</td> 
									  <td class="heading">Exam Type</td> 
									</tr>
								</thead>
								<tbody>
								<?php	
								$marksheetGenerated =0;
								if(!empty($result)){
									$i=0;
									foreach($result as $result_arr){ 
										if($result_arr->course_mode == 1){
											$ys=$result_arr->year_sem." Year";
										}else{
											$ys=$result_arr->year_sem." Sem";
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
											<td><?=$result_arr->total_subject?></td>
											<td><?=$result_arr->examination_month."-".$result_arr->examination_year?></td>
											<td><?=$result_arr->student_name?></td>
											<td><?=$result_arr->enrollment_number?></td>
											<td><?=$result_arr->course_name?></td>
											<td><?=$result_arr->stream_name?></td>
											<td><?=$ys?></td>
											<td><?php if($result_arr->examination_status == '0'){ echo "Main Exam";}else{ echo "Re-Exam";}?></td> 
										</tr> 
								<?php 
									$i++;
									}
								}?>
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
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
    } );
} ); 
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
</script>     