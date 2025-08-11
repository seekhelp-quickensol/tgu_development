<?php include('header.php')?>
    <div class="row wrapper border-bottom white-bg page-heading">
        
    </div>
    <div class="mt_20"></div>
        <div class="card-body animated fadeInUp">
            <div class="row">
                
                <?php if(empty($single_synopsis_thesis)){?>
                    <div class="col-lg-4 form-align-center">
                    <div class="card"> 
                        <div class="card-body">
                            <form id="synopsis_form" id ="synopsis_form" method="POST"  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="" class="lable_style">Thesis title<span style="color:red" > *</span></label>
                                    <input type="text" id="thesis_title" name="thesis_title" value="<?php if(!empty($single_synopsis_thesis)){ echo $single_synopsis_thesis->thesis_title;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Thesis title">
                                </div>
                                <div class="form-group">
                                     <label for="" class="lable_style">Upload Synopsis:<span style="color:red" > *</span></label>
                                   <input type="file" name="userfile1" class="form-control" id="userfile1">
                                   <input type="hidden" name="soft_copy" id="soft_copy"  value="<?php if(!empty($single_synopsis_thesis)){ echo $single_synopsis_thesis->soft_copy; } ?>">
                                </div>

                                <div class="form-group">
                                    <input type="hidden" id="hidden_id" name="hidden_id" value="<?php if(!empty($single_synopsis_thesis)){ echo $single_synopsis_thesis->id;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="" class="lable_style">Guide name<span style="color:red" > *</span></label>
                                    <select class="form-control"  name="name" id="name">
                                         <option value="">Please select Guide Name</option>
                                       <?php 
                                            if(!empty($guide)){foreach ($guide as $guide_res){?>
                                             <option value="<?=$guide_res->id;?>"><?=$guide_res->name;?></option>

                                            <?php } } ?>
                                    </select>
                                </div>
                                <div class="font-weight-600">
                                    <button type="submit" class="btn btn-danger btn-block"> <i class="fa fa-plus"></i>Submit</button>                            
                                </div>
                            </form>
                        </div>
                    </div>
                        <?php }
                        if(!empty($single_synopsis_thesis) && $single_synopsis_thesis->synopsis_status == 2){ ?>
                           <div class="col-lg-4 form-align-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                             <label for="" class="lable_style">Waiting from Campus!</label>
                            </div>
                        </div>
                    </div>
                    </div>
                        <?php } ?> 
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
                    userfile1:{
                        required: true,
                    },
                    name:{
                        required:true
                    },                    
                    
                },
                messages: {
                    thesis_title: {
                        required: "Please enter synopsis title",
                    },                    
                    userfile1:{
                        required: "Please upload synopsis",
                    },
                    name: {
                        required: "Please select guide name",
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