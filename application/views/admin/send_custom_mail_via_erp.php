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
            <div class="col-md-12 grid-margin stretch-card"> 
              <div class="card"> 
              <div class="card-header custom-header"> 
              <h4 class="card-title">Send Custom Mail</h4> 
              </div> 
                <div class="card-body">  
                  <p class="card-description"> 
                    Please enter mailing details 
                  </p> 
                  <form class="forms-sample" name="news_form" id="news_form" method="post" enctype="multipart/form-data"> 
						<div class="row"> 							<div class="col-md-6">								<div class="form-group"> 									<label for="exampleInputUsername1">To*</label> 									<input type="text" class="form-control" id="to" name="to" placeholder="Please enter to mail" value=""> 								</div> 							</div>							<div class="col-md-6">								<div class="form-group"> 									<label for="exampleInputUsername1">Subject*</label> 									<input type="text" class="form-control" id="subject" name="subject" placeholder="Please enter subject" value="Regarding Online Video KYC Verification"> 								</div> 							</div>
						</div>						<div class="row">							<div class="col-md-12">								<div class="form-group"> 									<label for="exampleInputUsername1">CC <small>Please enter multiple email with ; seprated</small></label> 									<input type="text" class="form-control" id="cc" name="cc" placeholder="Please enter cc mail" value=""> 								</div> 							</div>						</div>						<div class="row">							<div class="col-md-12">
								<div class="form-group"> 
									<label for="exampleInputUsername1">Description*</label> 
									<textarea class="form-control" id="content" name="content" placeholder="Description"></textarea> 
								</div> 							</div>						</div>
                    
					<button type="submit" id="save_btn" class="btn btn-primary mr-2">Send</button>   
                  </form> 
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
			subject: { 
				required: true, 
			}, 
			to: { 
				required: true, 
			},  
		}, 
		messages: {  
			subject: { 
				required: "Please enter subject", 
			}, 
			to: { 
				required: "Please enter to email", 
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> 
<script> 
$(document).ready(function () { 
     $('#content').summernote({ 
         height: 400, 
         callbacks: { 
            onImageUpload: function (image) { 
                 sendFile(image[0]); 
             } 
         }   
     });  
    function sendFile(image) { 
        var data = new FormData(); 
        data.append("image", image);  
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
