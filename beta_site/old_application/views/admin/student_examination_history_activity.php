<?php include('header.php');?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans">
<style> 
th{
    font-weight: bold;
}
</style>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="uni_mainWrapper syllabus-section" style="min-height:500px;"> 
								<div class="container"> 
									<div class="row">  
										<div class="col-md-12">
                                            <h4><b>Examination History</b></h4>
											<br>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label><b>Student Name</b> : <?=$student->student_name;?></label><br>
														<label><b>Email</b> : <?=$student->email;?></label><br>
														<label><b>Mobile</b> : <?=$student->mobile;?></label><br>
														<label><b>Center Name</b> : <?=$student->center_name;?></label><br>
													</div>
												</div>
											</div>
											 <section class="page">    
													
															
												<table class="table table-striped table-boarded dt-responsive nowrap" style="width:100%" id="example">
													<thead>
														<tr>
															<th style="font-weight:bold">Sr.No</th>
															<th style="font-weight:bold">Examination Activity</th>
															<th style="font-weight:bold">Date</th>
														</tr>                                                   
													</thead>
													<tbody>
													
													<?php if(!empty($activity)){
															$i=1;
															// echo "<pre>";print_r($activity);exit;
															foreach($activity as $activity_result){
																// echo "<pre>";print_r($activity_result);exit;
														?>
														<tr>
															<td><?= $i++;?></td>
															<td><?=$activity_result['title']?></td>
															<td><?=date('d-m-Y',strtotime($activity_result['created_on']))?></td>
														</tr>
														<?php }}?>
													</tbody>
												</table>
												</section>
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
	  <form method="post" enctype="multipart/form-data" name="remark_form" id="remark_form"> 
      <div class="modal-body">
	  <div class="form-group">
	  <label>Remark*</label>
	  <textarea name="remark" id="remark" rows="5" class="form-control"></textarea>
	  </div>
	  <div class="form-group"> 
	  <label>Files</label>
	  <input type="file" name="userfile[]" multiple class="form-control"> 
	  </div>
       <input type="hidden" name="student_id" value="<?=$this->uri->segment(2)?>">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>

  </div>
</div>
<?php include('footer.php');?>
<script> 
$('#remark_form').validate({
		rules: {
			remark: {
				required: true,
			}, 
		},
		messages: {
			remark: {
				required: "Please enter remark",
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
</script>
