<?php include('header.php');?>
<style>
.note-children-container{
	display:none;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Password</h4>
                  <p class="card-description">
                    Please enter details
                  </p>
				  <?php if($this->session->userdata('blended_validated') == "1"){?> 
					<a href="<?=base_url();?>logout_blend" class="btn btn-primary mr-2">Logout</a> 
				  <?php }else{?>
                  <form class="forms-sample" name="news_form" id="news_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Password *</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password"> 
                    </div> 
					<button type="submit" id="save_btn" class="btn btn-primary mr-2">Validate</button> 
                  </form>
				  <?php }?>
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

 
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#news_form').validate({
		rules: {
			password: {
				required: true,
			}, 
		},
		messages: {
			password: {
				required: "Please enter password",
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
 