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
                                    <label for="" class="lable_style">Thesis title<span style="color:red" > *</span></label>
                                    <input type="text" id="thesis_title" name="thesis_title" value="<?php if(!empty($single_synopsis)){ echo $single_synopsis->thesis_title;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Thesis title">
                                </div>
                                <div class="form-group">
                                     <label for="" class="lable_style">Upload Synopsis:<span style="color:red" > </span></label>
                                   <input type="file" name="userfile1" class="form-control" id="userfile1">
                                   <input type="hidden" name="soft_copy" id="soft_copy"  value="<?php if(!empty($single_synopsis)){ echo $single_synopsis->soft_copy; } ?>">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" value="<?php if(!empty($single_synopsis)){ echo $single_synopsis->id;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="" class="lable_style">Guide name<span style="color:red" > *</span></label>
                                    <select class="form-control js-example-basic-single select2_single" required name="guide" id="guide">
                                         <option value="">Please select Guide</option>
                                       <?php 
                                            if(!empty($guide_list)){foreach ($guide_list as $guide_list_result){?>
                                             <option value="<?=$guide_list_result->id;?>" <?php if(!empty($single_synopsis) && $single_synopsis->guide_id == $guide_list_result->id){?>selected="selected"<?php }?>><?=$guide_list_result->name;?></option>

                                            <?php } } ?>
                                    </select>
                                </div>
                                 <div class="form-group">
                                      <label for="exampleInputUsername1">Issue Date*</label>
                                      <input type="text" class="form-control datepicker" id="issue_date" name="issue_date" placeholder="Issue Date" value="<?php if(!empty($single_synopsis)){ echo date("d-m-Y",strtotime($single_synopsis->issue_date));}?>"> 
                                    </div>
                                    <div class="form-group">
                                    <label for="" class="lable_style">Synopsis Status<span style="color:red" > *</span></label>
                                    <select class="form-control" required name="synopsis_status" id="synopsis_status">
                                         <option value="">Please select Status</option>
                                         <option value="0" <?php if(!empty($single_synopsis) && $single_synopsis->synopsis_status == "0"){?>selected="selected"<?php }?>>Original</option>
                                         <option value="1" <?php if(!empty($single_synopsis) && $single_synopsis->synopsis_status == "1"){?>selected="selected"<?php }?>>Duplicate</option>
                                         <option value="2" <?php if(!empty($single_synopsis) && $single_synopsis->synopsis_status == "2"){?>selected="selected"<?php }?>>Under Review</option>
                                         <option value="3" <?php if(!empty($single_synopsis) && $single_synopsis->synopsis_status == "3"){?>selected="selected"<?php }?>>Rejected</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputUsername1">Signature *</label>
                                    <select class="form-control js-example-basic-single select2_single" id="signature" name="signature">
                                        <option value="">Select Signature</option>
                                        <?php if(!empty($signature)){ foreach($signature as $signature_result){?>
                                        <option value="<?=$signature_result->id?>" <?php if(!empty($degree) && $degree->signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
                                        <?php }}?> 
                                    </select>
                                </div> 

								<div class="form-group">
                                      <label for="exampleInputUsername1">Remark</label>
                                      <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks" value="<?php if(!empty($single_synopsis)){$single_synopsis->remarks;}?>"> 
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
                ignore: ":hidden:not(select)",
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
                    },
                    signature:{
                        required:true
                    },
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
                    },
                    signature:{
                        required:"Please select signature"
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

        $('#signature').on('change', function() {
			$('#signature').valid();
		});

        $('#guide').on('change', function() {
			$('#guide').valid();
		});

        
 $( function() {
    $( ".datepicker" ).datepicker({
        dateFormat:"dd-mm-yy",
        changeMonth:true,
        changeYear:true,
        maxDate: "+14Y",
        minDate: "-80Y",
        yearRange: "-100:-0"
    });
  } );

    </script>