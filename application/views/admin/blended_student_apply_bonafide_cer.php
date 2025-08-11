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
                  <h4 class="card-title">Apply Blended Student Bonafide Certificate
				  </h4>
                  <p class="card-description">
                    Please enter application details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter Enrollment No *</label>
                                <input type="hidden" class="form-control" id="old_id" name="old_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                                <input type="text" class="form-control" id="enrollment_no" name="enrollment_no" placeholder="Enter Enrollment No" value="<?php if(!empty($single)){ echo $single->enrollment_no;}?>">
                                <div class="error" id="status_error"></div>
                                <div class="error" id="status_error_new"></div>
                              </div>
                        </div>
					</div>	
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername2" class="hidden-label">Student Name :</label><br>
                                <label for="exampleInputUsername3" class="hidden-label">Email :</label><br>
                                <label for="exampleInputUsername4" class="hidden-label">Mobile :</label>
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
      $("label[for='exampleInputUsername2']").eq(0).text("").addClass("hidden-label");
      $("label[for='exampleInputUsername3']").eq(1).text("").addClass("hidden-label");
      $("label[for='exampleInputUsername4']").eq(2).text("").addClass("hidden-label");
      var enrollmentNumber = $("#enrollment_no").val().trim();
      if (enrollmentNumber.length >= 5) {
        $.ajax({
              type: "POST",
              url: "<?=base_url();?>admin/Ajax_controller/get_prev_application_checked_ajax",
              data:{'enrollment_no':$("#enrollment_no").val(),'table':'tbl_bonafide_cer_application_blended'},
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
              url: "<?=base_url();?>admin/Ajax_controller/get_student_info_blended_ajax",
              data:{'enrollment_no':$("#enrollment_no").val()},
              success: function(data){
                  var studentInfo = JSON.parse(data);
                  console.log(studentInfo)
                if(studentInfo != null){
                  $("label[for='exampleInputUsername2']").text("Student Name: " + studentInfo.student_name).removeClass("hidden-label");
                  $("label[for='exampleInputUsername3']").text("Email: " + studentInfo.email).removeClass("hidden-label");
                  $("label[for='exampleInputUsername4']").text("Mobile: " + studentInfo.mobile).removeClass("hidden-label");
                  $("#status_error_new").html("");
                }else{
                  $("#status_error_new").html("No student found");
                }
              },
              error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
              }
          });
        }else{
        $("#status_error").html("");
        $("#status_error_new").html("");
        $("#single_button").attr('disabled', false);
      }
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
 