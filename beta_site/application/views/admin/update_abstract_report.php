<?php include('header.php')?>
    <div class="row wrapper border-bottom white-bg page-heading">
        
    </div>
    <div class="mt_20"></div>
        <div class="card-body animated fadeInUp">
            <div class="row">
                <div class="col-md-6">
                        <div class="card-body">
                            <form id="synopsis_form" name="synopsis_form" method="POST"  enctype="multipart/form-data">
                                
                                <div class="form-group">
                                     <label for="" class="lable_style">Upload Report:<span style="color:red" > </span></label>
                                   <input type="file" name="userfile1" class="form-control" id="userfile1">
                                   <input type="hidden" name="upload_report" id="upload_report"  value="<?php if(!empty($single)){ echo $single->upload_report; } ?>">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Category Name">
                                </div>
                                
                                  
                                    <div class="form-group">
                                    <label for="" class="lable_style">Report Status<span style="color:red" > *</span></label>
                                    <select class="form-control" required name="report_status" id="report_status">
                                         <option value="">Please select Status</option>
                                         <option value="0" <?php if(!empty($single) && $single->report_status == "0"){?>selected="selected"<?php }?>>Under Review</option>
                                         <option value="1" <?php if(!empty($single) && $single->report_status == "1"){?>selected="selected"<?php }?>>Approved</option>
                                         <option value="2" <?php if(!empty($single) && $single->report_status == "2"){?>selected="selected"<?php }?>>Reject</option>
                                    </select>
                                </div>
								<div class="form-group">
                                      <label for="exampleInputUsername1">Remark</label>
                                      <input type="text" class="form-control" id="remark" name="remark" placeholder="Remarks" value="<?php if(!empty($single)){$single->remark;}?>"> 
                                    </div>
                                <div class="font-weight-600">
                                    <button type="submit" class="btn btn-danger btn-block"> <i class="fa fa-plus"></i>Submit</button>                            
                                </div>
                            </form>
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
            $('#synopsis_form').validate({

                rules: {
                    thesis_title:{
                        required: true,
                    },
                    guide:{
                        required:true
                    },                    
                    issue_date:{
                        required:true
                    },
                    synopsis_status:{
                        required:true
                    }
                },
                messages: {
                    thesis_title: {
                        required: "Please enter thesis title",
                    },
                    guide: {
                        required: "Please select guide name",
                    },
                    issue_date: {
                        required: "Please select date",
                    },                    
                    synopsis_status:{
                        required:"Please select status"
                    }
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

 $( function() {
    $( ".datepicker" ).datepicker({
        dateFormat:"dd-mm-yy",
        changeMonth:true,
        changeYear:true,
        /*maxDate: "-12Y",
        minDate: "-80Y",
        yearRange: "-100:-0"*/
    });
  } );

    </script>