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
    .hidden-label {
        display: none;
    }
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Disapprove Blended Student No Backlog Summary Application</h4>
                  <h2 class="card-title">Enrollment No. : <?php if(!empty($single)){echo $single->enrollment_no;}?></h2>
                  <h2 class="card-title">Student Name : <?php if(!empty($single)){echo $single->student_name;}?></h2>
                  <p class="card-description">
                    Please enter details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter Remark *</label>
                                <input type="hidden" class="form-control" id="old_id" name="old_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                                <textarea type="text" class="form-control" id="remark" name="remark" placeholder="Enter Remark"><?php if(!empty($single)){ echo $single->disapprove_remark;}?></textarea>
                            </div>
                        </div>
					</div>	
					<button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
      
<?php include('footer.php');
$id=0;
if($this->uri->segment(2) != ""){
	$id = $this->uri->segment(2);
}
?>
<script>
$(document).ready(function() {
  $('.choosen').select2();
});
</script>

 <script>
 $(document).ready(function () {		
	$('#single_form').validate({
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
});
 </script>
 