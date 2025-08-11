<?php include('header.php');
// print_r($student_profile);exit;
?>
<style>
  
</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Upload Document</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1 doc_box">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" id="printable_div">
								<form class="forms-sample" name="password_form" id="password_form" method="post"  enctype="multipart/form-data">
									<div class="col-sm-12 uid_input">
										<div class="form-group">
											<label class="uid_label"><?php if(!empty($student) && $student->country == '101'){?>Aadhaar<?php }else{?>Passport<?php }?> Number <span class="req">*</span></label>
											<input type="text" class="form-control identity_numer" name="identity_numer" id="identity_numer" placeholder="Enter <?php if(!empty($student) && $student->country == '101'){?>Aadhaar<?php }else{?>Passport<?php }?> Number" value="<?php if(!empty($student)){ echo $student->id_number;} ?>">
											<input type="hidden" class="form-control id_type" name="id_type" id="id_type" value="<?php if(!empty($student) && $student->country == '101'){?>1<?php }else{?>2<?php }?>">
											
										</div>
									</div>
									<div class="col-sm-12 uid_soft_input">
										<div class="form-group">
											<label class="uid_soft_label">Upload <?php if(!empty($student) && $student->country == '101'){?>Aadhaar<?php }else{?>Passport<?php }?> Softcopy <span class="req">*</span></label>
											<input type="file" class="form-control identity_file" name="identity_file" id="identity_file" placeholder="Upload Aadhaar Softcopy">
											<input type="hidden" class="form-control" name="old_identity_file" id="old_identity_file" value="<?php if(!empty($student)){ echo $student->id_number;} ?>">
										</div>
									</div>
									<div class="col-sm-12">
										<button type="submit" name="password_submit" value="password_submit" class="btn btn-primary mr-2 password_submit">Submit</button>
									</div>
								</form>  			
							</div>
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
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#password_form').validate({
		rules: {
			identity_numer: {
				required: true,
			},
			identity_file: {
				required: true,
			},
		},
		messages: {
			identity_numer: {
				required: "Please enter identity numer",
			},
			identity_file: {
				required: "Please select identity softcopy",
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

 $("#identity_file").change(function(){
 	var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case 'JPEG':
        case 'jpeg':
        case 'jpg':
        case 'pdf':
            break;
        default:
            alert('Only jpg, pdf file supported');
            this.value = '';
    }
 });
 </script>
 