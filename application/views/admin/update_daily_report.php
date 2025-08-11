<?php include('faculty_header.php');?>
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
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Report Setting</h4>
                  <p class="card-description">
                    Please enter Report details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-md-12">
					<div class="form-group">
                      <label for="exampleInputUsername1">Date : <?php if(!empty($single)){ echo $single->date;}?></label> 
                      <input type="hidden" class="form-control" id="id" name="id" value="<?=$this->uri->segment(2)?>">
                    </div>
					</div>
					<div class="col-md-12">
					<div class="form-group">
                      <label for="exampleInputUsername1">Details</label>
					  <?php if(!empty($single)){ echo $single->details;}?>
                    </div>
					</div>
					
					<div class="col-md-12">
					<div class="form-group">
                      <label for="exampleInputUsername1">Status</label>
					  <select class="form-control" name="status" id="status">
						<option value="">Select</option>
						<option value="1">Approved</option>
						<option value="2">Rejected</option>
					  </select>
                    </div>
					</div>
					<div class="col-md-12">
					<div class="form-group">
                      <label for="exampleInputUsername1">Remark *</label>
                      <textarea class="form-control" id="content" name="content" placeholder="Please enter remark"></textarea>
                    </div>
					</div>     
					<div class="col-md-6">  
						<button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
                    </div>
                  </form>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#single_form').validate({
		rules: {
			date: {
				required: true,
			},
			description: {
				required: true,
			}, 
		},
		messages: {
			date: {
				required: "Please select date",
			},
			description: {
				required: "Please enter last name",
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
  
$(document).ready(function () {
     $('#content').summernote({
         height: 400,
         callbacks: {
            onImageUpload: function (image) {
                 //sendFile(image[0]);
             }
         }

     });  
});
 
 </script>
 