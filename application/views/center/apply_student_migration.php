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
        display: block;
    }
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Apply Migration 
				  </h4>
                  <p class="card-description">
                    Please enter application details
                  </p>
                  <form class="forms-sample" action="<?=base_url();?>pay_student_migration/<?php if(!empty($student)){ echo $student->id;}?>" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter Enrollment No *</label>
                                <input type="hidden" class="form-control" id="student_id" name="student_id" value="<?php if(!empty($student)){ echo $student->id;}?>">
                                <input readonly type="text" class="form-control" id="enrollment_no" name="enrollment_no" placeholder="Enter Enrollment No" value="<?php if(!empty($student)){ echo $student->enrollment_number;}?>">
                                <div class="error" id="status_error"></div>

                              </div>
                        </div>
					</div>	
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
							<label for="exampleInputUsername2" class="hidden-label">Student Name : <?php if(!empty($student)){ echo $student->student_name;}?></label><br>
                                <label for="exampleInputUsername3" class="hidden-label">Email : <?php if(!empty($student)){ echo $student->email;}?></label><br>
                                <label for="exampleInputUsername4" class="hidden-label">Mobile : <?php if(!empty($student)){ echo $student->mobile;}?></label>
                                <label for="exampleInputUsername4" class="hidden-label">Fees : Rs. <?php if(!empty($amount)){ echo $amount->certificate_fees; }?> /-</label>

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
     $("#enrollment_no").keyup(function(){ 
      $.ajax({
            type: "POST",
            url: "<?=base_url();?>admin/Ajax_controller/get_prev_application_checked_ajax",
            data:{'enrollment_no':$("#enrollment_no").val(),'table':'tbl_student_migration'},
            success: function(data){
              var res = $.trim(data);
              if (res == '0') {
                $("#status_error").html("");
                $("#single_button").attr('disabled', false);
              }else{
                $("#status_error").html("Application already submitted");
                $("#single_button").attr('disabled', true);
              }            
            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
            }
        });
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>admin/Ajax_controller/get_student_info_ajax",
            data:{'enrollment_no':$("#enrollment_no").val()},
            success: function(data){
                var studentInfo = JSON.parse(data);
                console.log(studentInfo)
                $("label[for='exampleInputUsername2']").eq(0).text("Student Name: " + studentInfo.student_name).removeClass("hidden-label");
                $("label[for='exampleInputUsername3']").eq(1).text("Email: " + studentInfo.email).removeClass("hidden-label");
                $("label[for='exampleInputUsername4']").eq(2).text("Mobile: " + studentInfo.mobile).removeClass("hidden-label");
            
            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
            }
        });
    });
 $(document).ready(function () {		
	$('#single_form').validate({
		rules: {
			enrollment_no: {
				required: true,
				number: true,
			},
		},
		messages: {
			enrollment_no: {
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
 