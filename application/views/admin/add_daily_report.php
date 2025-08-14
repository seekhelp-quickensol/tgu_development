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
                  <h4 class="card-title">Daily Report

				  <a href="<?=base_url();?>my_daily_report" class="btn btn-primary mr-2 float-right">View List</a>

				  </h4>
                  <p class="card-description">
                    Please enter Report details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Date*</label>
                      <input data-provide="datepicker" type="date" class="form-control datepicker" id="date" name="date" placeholder="Date" value="<?php echo date('Y-m-d'); ?>">
                    </div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputUsername1">Total Present Student*</label>
						  <input type="number" class="form-control" id="present_student" name="present_student" placeholder="Total Present Student">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputUsername1">Campus In-time (24 Hours Format)*</label>
						  <input type="time" class="form-control" id="in_time" name="in_time">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputUsername1">Campus Exit-time (24 Hours Format)*</label>
						  <input type="time" class="form-control" id="out_time" name="out_time">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputUsername1">File *</label>
						  <input type="hidden" class="form-control" id="old_file" name="old_file" >
						  <input type="file" class="form-control" id="file" name="file" placeholder="File">
						</div>
					</div>
					<div class="col-md-12">
					<div class="form-group">
                      <label for="exampleInputUsername1">Details *</label>
                      <textarea class="form-control" id="content" name="content" placeholder="Please enter details"></textarea>
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
		ignore: ":hidden:not(#content),.note-editable.panel-body",
		rules: {
			date: {
				required: true,
			},
			present_student: {
				required: true,
			}, 
			in_time: {
				required: true,
			}, 
			out_time: {
				required: true,
			}, 
			description: {
				required: true,
			}, 
			file:{
				required: true,
			},
		},
		messages: {
			date: {
				required: "Please select date",
			},
			present_student: {
				required: "Please enter present student",
			}, 
			in_time: {
				required: "Please enter campus in-time",
			}, 
			out_time: {
				required: "Please enter campus out-time",
			}, 
			description: {
				required: "Please enter last name",
			}, 
			file:{
				required: "Please upload file",
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
 