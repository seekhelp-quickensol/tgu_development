<?php include('header.php');?>
<style>
	.btn-small{
		padding: 5px 10px;
	}
	.no_doc{
		margin-bottom: 0px;
		padding: 5px;
		background: #ddd;
		color: #000;
		text-align: center;
	} 
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Search Student
				  </h4>
                  <p class="card-description">
                    Please enter enrollment number
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="get" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter Enrollment No *</label>
                                <input type="text" class="form-control" id="enrollment" name="enrollment" placeholder="Enter Enrollment No" value="<?php if(isset($_GET['enrollment'])){ echo $_GET['enrollment'];}?>">
                                <div class="error" id="status_error"></div>
                                <div class="error" id="status_error_new"></div>
                                </div>
                        </div>	
                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" id="single_button" class="btn btn-primary mr-2" style="margin-top:28px;">Search</button>
                            </div>
                        </div>
					</div>		
                  </form>
                  <?php 
                    if(isset($_GET['enrollment'])){
                        $details = $this->Student_model->get_student_details($_GET['enrollment']);
                        if(!empty($details)){    
                            $exam = $this->Student_model->get_student_last_exam($details->id); 
                  ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Student Name</b> : <?=$details->student_name;?></label><br>
                                <label><b>Email</b> : <?=$details->email;?></label><br>
                                <label><b>Mobile</b> : <?=$details->mobile;?></label><br>
                                <label><b>Center Name</b> : <?=$details->center_name;?></label><br>
                                <label><b>Admission Date</b> : <?=date('d-m-Y', strtotime($details->admission_date));?></label><br>
                                <label><b>Last Exam</b> : <?=$exam;?></label>
                            </div>
                        </div>
					</div>
                    <?php }else{ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>No Student Found </label>
                            </div>
                        </div>
					</div>
                    <?php }} ?>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
      
<?php include('footer.php');?>
 <script>
 $(document).ready(function () {		
	$('#single_form').validate({
		rules: {
			enrollment: {
				required: true,
				number: true,
			},
		},
		messages: {
			enrollment: {
				required: "Please enter enrollment number",
				number: "Please enter valid enrollment number",
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
 </script>
 