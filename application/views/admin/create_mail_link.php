<?php
// echo "<pre>";print_r($single);exit;


include('header.php');?>
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Create Mail Link</h4>
							<p class="card-description"> Please enter details </p>
							<form id="mail_form" method="post" enctype="multipart/form-data">
								<hr>
								<div class="row">  
									<div class="form-group col-lg-4 col-md-3">
										<label class="col-form-label">Mail Name<span style="color:red;">*</span></label>
										<input name="mail_name" id="mail_name" type="text" placeholder="Mail Name" class="form-control" value="<?php if(!empty($single)){ echo $single->name;}?>"> 
										<input name="id" id="id" type="hidden" class="" value="<?php if(!empty($single)){ echo $single->id;}?>"> 
									</div>
									<div class="form-group col-lg-4 col-md-3">
										<label class="col-form-label">Expire Date<span style="color:red;">*</span></label>
										<input name="expire_date" id="expire_date" type="text"  class="form-control datepicker" value="<?php if(!empty($single)){ echo $single->expiry_date;}?>" placeholder="DD-MM-YYYY"> 
									</div> 
									<div class="form-group col-lg-4 col-md-3">
										<label class="col-form-label">File Upload<span style="color:red;"></span>  
										<?php 
											if (!empty($single->file)) {
												$files = explode(',', $single->file);
												foreach ($files as $file) {
													$file = trim($file); 
													if (!empty($file)) { ?>
														<a style="padding: 5px;" target="_blank" href="<?= $this->Digitalocean_model->get_photo('images/mail_file/' . $file) ?>" class="btn btn-success">View </a>
														
										<?php }}} ?></label>
										<input multiple name="file_upload[]" id="file_upload" type="file" class="form-control"> 
										<input type="hidden" class="form-control" id="old_file_upload" name="old_file_upload" value="<?php if(!empty($single)){ echo $single->file;}?>">
									</div> 
								</div>
								<div class="user_error" id="user_error" style="color:red" ></div>
								<div class="row">
									<div class="form-group col-lg-12 col-md-3">
										<label class="col-form-label">Mail Content<span style="color:red;">*</span></label>
										<textarea name="content" id="content"  placeholder="" class="form-control"><?php if(!empty($single)){ echo $single->content;}?></textarea> 
									</div>
								</div> 
								<br><br>
								<button class="btn btn-sm btn-success submit-btn single_btn" type="submit">Submit</button>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
	$(".datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        minDate: 0, // Prevents selection of past dates
        onSelect: function(dateText, inst) {
            $(this).valid(); // Trigger validation on date select
        },
    });
</script>

<script>
$(document).ready(function () {
     $('#content').summernote({
        height: 300,
        callbacks: {
            onImageUpload: function (image) {
                 sendFile(image[0]);
            }
        }
     }); 
    function sendFile(image) {
        var data = new FormData();
        data.append("image", image);
        //if you are using CI 3 CSRF
        data.append("<?= $this->security->get_csrf_token_name() ?>", "<?= $this->security->get_csrf_hash() ?>");
        $.ajax({
            data: data,
            type: "POST",
            url: "<?=base_url()?>admin/Ajax_controller/upload_news_image",
            cache: false,
            contentType: false,
            processData: false,
            success: function (url) {
                var image = url;
                $('#content').summernote("insertImage", image);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
});

</script>
<script>


$(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#mail_form').validate({
		ignore: ":hidden:not(#content),.note-editable.panel-body",
		rules: {
			mail_name: {
				required: true,
			},
			expire_date: {
				required: true,
			}, 
		},
		messages: {
			mail_name: {
				required: "Please enter mail name",
			},
			expire_date: {
				required: "Please select expiry date",
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
