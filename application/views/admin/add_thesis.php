<?php include('header.php')?>
    <div class="row wrapper border-bottom white-bg page-heading">
        
    </div>
    <div class="mt_20"></div>
        <div class="card-body animated fadeInUp">
            <div class="row">
                <div class="col-md-12">
                        <div class="card-body">
                            <form id="thesis_form" name="thesis_form" method="POST"  enctype="multipart/form-data">
                <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="lable_style">Thesis title<span style="color:red" > *</span></label>
                                    <input type="text" id="thesis_title" name="thesis_title" value="<?php if(!empty($single)){ echo $single->thesis_title;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Thesis title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label for="" class="lable_style">Upload Thesis:<span style="color:red" > </span></label>
                                   <input type="file" name="userfile2" class="form-control" id="userfile2">
                                   <input type="hidden" name="softcopy" id="softcopy"  value="<?php if(!empty($single)){ echo $single->softcopy; } ?>">
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                     <label for="" class="lable_style">Paper Journal<span style="color:red" > *</span></label>
                                    <input type="text" id="paper_journal1" name="paper_journal1" value="<?php if(!empty($single)){ echo $single->paper_journal1;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Paper journal">  
                                    <input type="hidden" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>" class="form-control"  aria-describedby="" placeholder="">                                 
                                </div>
                            </div>
                             
                                
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="lable_style">Guide name<span style="color:red" > *</span></label>
                                    <select class="form-control" required name="guide_name" id="guide_name">
                                         <option value="">Please select Guide Name</option>
                                       <?php 
                                            if(!empty($guide)){foreach ($guide as $guide_result){?>
                                             <option value="<?=$guide_result->id;?>" <?php if(!empty($single) && $single->guide_id == $guide_result->id){?>selected="selected"<?php }?>><?=$guide_result->name;?></option>

                                            <?php } } ?>
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                      <label for="exampleInputUsername1">Submission Date*</label>
                                      <input type="text" class="form-control datepicker" id="submission_date" name="submission_date" placeholder="Issue Date" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->submission_date));}?>"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="lable_style">Thesis Status<span style="color:red" > *</span></label>
                                    <select class="form-control" name="thesis_status" id="thesis_status">
                                        <option value="">Please select Status</option>
                                        <option value="0" <?php if(!empty($single) && $single->thesis_status == "0"){?>selected="selected"<?php }?>>Ok</option>
                                        <option value="1" <?php if(!empty($single) && $single->thesis_status == "1"){?>selected="selected"<?php }?>>Deficiency</option>
                                        <option value="2" <?php if(!empty($single) && $single->thesis_status == "2"){?>selected="selected"<?php }?>>Under Review</option>  
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                     <label for="" class="lable_style">Remark (if any)<span style="color:red" ></span></label>
                                    <textarea id="remarks" name="remarks" class="form-control"><?php if(!empty($single)){ echo $single->remarks;}?></textarea>
                                                                   
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <hr>
                                <div class="font-weight-600">
                                    <button type="submit" class="btn btn-danger btn-block"> <i class="fa fa-plus"></i>Submit</button>                            
                                </div>
                            </div>
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
            $('#thesis_form').validate({

                rules: {
                    thesis_title:{
                        required: true,
                    },
                    paper_journal1: {
                        required: true,
                    },
                    guide_name:{
                        required:true
                    },                    
                    submission_date:{
                        required:true
                    },
                    thesis_status:{
                        required:true
                    }
                },
                messages: {
                    thesis_title: {
                        required: "Please enter thesis title",
                    },
                    paper_journal1: {
                        required: "Please enter paper paper journal",
                    },
                    guide_name: {
                        required: "Please select guide name",
                    },
                    submission_date: {
                        required: "Please select date",
                    },
                    thesis_status:{
                        required:"Please select thesis status"
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