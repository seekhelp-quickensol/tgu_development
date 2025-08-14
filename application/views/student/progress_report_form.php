<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 form-align-center grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Progress Report</h4>
                  <p class="card-description">
                 
                  </p>
                  <?php if(empty($single_progress_report)){?>
                  <form class="forms-sample" name="progress_report_form" id="progress_report_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="lable_style">Upload Progress Report:<span style="color:red" > *</span></label>
                        <input type="file" name="userfile1" class="form-control" id="userfile1">
                        <input type="hidden" name="progress_report" id="progress_report"  value="<?php if(!empty($single_progress_report)){ echo $single_progress_report->progress_report; } ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="lable_style">Remark<span style="color:red" ></span></label>
                        <input type="text" id="remark" name="remark" value="<?php if(!empty($single_progress_report)){ echo $single_progress_report->remark;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Remark">
                    </div>
					<div class="form-group">
                    <input type="hidden" id="validate" name="validate" value="abc">
                         <input type="hidden" id="hidden_id" name="hidden_id" value="<?php if(!empty($single_progress_report)){ echo $single_progress_report->id;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Category Name">
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary mr-2 password_submit">Submit</button>
                  </form>
                  <?php }else{?>
                    <label for="" class="lable_style">Thanks, your report has been submitted!</label>
                    <?php }?>
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
            $('#progress_report_form').validate({

                rules: {
                    userfile1:{
                        required:true
                    },
                                    
                    
                },
                messages: {
                    userfile1:{
                        required:"Please upload progress report"
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