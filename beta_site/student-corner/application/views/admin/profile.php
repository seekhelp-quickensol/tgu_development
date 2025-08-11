<?php include('header.php');?>
<?php include('sidebar.php');?>


    <title>Vasantam Food</title>
         
<!-- <link href="http://fonts.cdnfonts.com/css/tt-commons" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url();?>admin_assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url();?>admin_assets/css/style.css"> -->


<section>
<div class="">
    <div class="container-fluid">

        <div class="form_container">
            <div class="card  profile-width">
                <h2 class="form-heading">Please Update Your Profile</h2>
                <div class="card-body">
                    <form action="" method="post" id="login-form" novalidate="novalidate">

                    <div id="form-content" method="post" class="row">
                            <div class="form-group col-lg-6">
                            <label for="company_name">First Name<span class="p-1 star-color">*</span></label>
                            <input class="form-control" type="text" placeholder="First Name" name="first_name" id="first_name" value="<?php if(!empty($single)){ echo $single->first_name;}?>">
                                <input class="form-control" type="hidden" name="hidden_id" id="hidden_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
							   </div>
                               <div class="form-group col-lg-6">
                            <label for="parent_name">Parent Name<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text" placeholder="Parent Name" name="parent_name" id="parent_name" value="<?php if(!empty($single)){ echo $single->parent_name;}?>">
                            </div>

                            <div class="form-group col-lg-6">
                            <label for="last_name">Last Name<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text" placeholder="Last Name" name="last_name" id="last_name" value="<?php if(!empty($single)){ echo $single->last_name;}?>">
                         </div>
                       
                         <div class="form-group col-lg-6">
                                <label for="number">Employee Mobile No.<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text"  placeholder="Employee Mobile No" name="mobile_number" id="mobile_number" value="<?php if(!empty($single)){ echo $single->mobile_number;}?>">
                                <div class="mobile_error error"></div>
                            </div>

                           
                            <div class="form-group col-lg-6">
                            <label for="parent_name">Parent Mobile No.<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text" placeholder="Parent Mobile No" name="parent_mobile_number" id="parent_mobile_number" value="<?php if(!empty($single)){ echo $single->parent_mobile_number;}?>">
                           </div>
                           <div class="form-group col-lg-6">
                            <label for="last_name">Department<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text" readonly placeholder="Last Name" name="department" id="department" value="<?php if(!empty($single)){ echo $single->department_name;}?>">
                         </div>
                         <div class="form-group col-lg-6">
                            <label for="last_name">Designation<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="text" readonly placeholder="Last Name" name="designation" id="designation" value="<?php if(!empty($single)){ echo $single->designation;}?>">
                         </div>
                            <div class="form-group col-lg-6">
                            <label for="last_name">Blood Group<span class="p-1 star-color">*</span></label>
                            <select class="form-control" name='blood_group' id='blood_group'>
                                    <option value="">Select Your Blood Group</option>
                                    <option value='A_positive' <?php if(!empty($single) && $single->blood_group == 'A_positive'){?>selected<?php }?>>A positive</option>
                                    <option value='A_negative' <?php if(!empty($single) && $single->blood_group == 'A_negative'){?>selected<?php }?>>A negative</option>
                                    <option value='B_positive' <?php if(!empty($single) && $single->blood_group == 'B_positive'){?>selected<?php }?>>B positive</option>
                                    <option value='B_negative' <?php if(!empty($single) && $single->blood_group == 'B_negative'){?>selected<?php }?>>B negative</option>
                                    <option value='AB_positive' <?php if(!empty($single) && $single->blood_group == 'AB_positive'){?>selected<?php }?>>AB positive</option>
                                    <option value='AB_negative' <?php if(!empty($single) && $single->blood_group == 'AB_negative'){?>selected<?php }?>>AB negative</option>
                                    <option value='O_positive' <?php if(!empty($single) && $single->blood_group == 'O_positive'){?>selected<?php }?>>O positive</option>
                                    <option value='O_negative' <?php if(!empty($single) && $single->blood_group == 'O_negative'){?>selected<?php }?>>O negative</option>
                                </select>
                         </div>
                            <div class="form-group col-lg-6">
                            <label for="choose_file">Upload Photo<span class="p-1 star-color">*</span> </label>
                                <input class="form-control" type="file" name="userfile" id="userfile">
                                <input class="form-control" type="hidden" name="old_userfile" id="old_userfile" value="<?php if(!empty($single)){ echo $single->photo;}?>">
                           </div>
                           <div class="form-group col-lg-6">
                           
                            <label for="aadhar_photo">Upload Aadhaar<span class="p-1 star-color">*</span></label>
                                <input class="form-control" type="file" name="aadhar_photo" id="aadhar_photo">
                                <input class="form-control" type="hidden" name="old_aadhar_photo" id="old_aadhar_photo" value="<?php if(!empty($single)){ echo $single->adhar_card;}?>">
                              </div>
                              <div class="form-group col-lg-6">
                           
                              <label for="aadhar_no">Aadhaar Number<span class="p-1 star-color">*</span></label>
                                <input class="form-control" placeholder="Aadhaar No" type="text" name="aadhar_no" id="aadhar_no" value="<?php if(!empty($single)){ echo $single->adhar_card_number;}?>">
                            </div>

                        </div>

                       <div class="row">
                            <!-- <div class="col-12 text-left">
                                <a href="<?=base_url();?>forgot-password" class="btn btn-link forgot_password">Forgot Password</a>
                            </div> -->
                            <div class="col-12">
                                <button type="submit" class="btn-login">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- <?php if($this->session->flashdata('success') !=""){?>
<div class="alert alert-success animated fadeInUp">
    <strong>Success!</strong> <?=$this->session->flashdata('success')?>
</div>
<?php }else if($this->session->flashdata('message') !=""){?>
<div class="alert alert-danger animated fadeInUp">
    <strong>Error!</strong> <?=$this->session->flashdata('message')?>
</div>
<?php }elseif(validation_errors()!=''){?>
<div class="alert alert-danger animated fadeInUp">
    <strong>Error!</strong> <?=validation_errors()?>
</div>
<?php }?> -->

<?php include('footer.php');?>

<!-- <script src="<?=base_url();?>admin_assets/js/jquery.slim.min.js"></script>
<script src="<?=base_url();?>admin_assets/js/popper.min.js"></script>
<script src="<?=base_url();?>admin_assets/js/bootstrap.bundle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script> -->
<script>
    $(".toggle-password").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
<script>
    $(document).ready(function ($) {
        $.validator.addMethod("validadhar", function(value, element) {
        return this.optional(element) || /^[1-9][0-9]*$/.test(value);
	
    }); 

    $.validator.addMethod("alphabetscaps", function(value, element) {
        return this.optional(element) || /^[a-z\d\-_\s]+$/i.test(value);
    });


    $.validator.addMethod("space", function(value, element) {
        return this.optional(element) ||  /^\S/i.test(value);
    });

    $.validator.addMethod("text_name", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
	
    }); 
        $("#login-form").validate({
            rules: {
                first_name: {
                    required: true,
                    alphabetscaps: true,
                    space: true,
                    text_name:true,

                },
                last_name: {
                    required: true,
                    alphabetscaps: true,
                    space: true,
                    text_name:true,
                },
                parent_name: {
                    required: true,
                    alphabetscaps: true,
                    alphabetscaps: true,
                    space: true,
                    text_name:true,
                },
                parent_mobile_number: {
                    required: true,
                   
                },
                
                parent_mobile_number: {
                    required: true,
                        digits: true,
                        minlength: 10,
                        maxlength:10,

                 
                },
                mobile_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                blood_group: {
                    required: true,
                    // minlength: 6
                },
                <?php if(empty($single->photo)){?>
                userfile: {
                    required: true,
                    // minlength: 6
                },
                <?php } ?>

                <?php if(empty($single->adhar_card)){?>
                aadhar_photo: {
                    required: true,
                    // minlength: 6
                },
                <?php }?>
                aadhar_no: {
                    required: true,
                     validadhar: true,
                     minlength: 12,
                        maxlength:12,
                }
            },
            messages: {                    
                first_name: {
                    required: "Please enter your first name", 
                    alphabetscaps:"please enter valid  first name",
                    space:"please enter valid  first name",
                    text_name:"please enter valid  first name",
                    
                },
                last_name: {
                    required: "Please enter your last name",  
                    alphabetscaps:"please enter valid last name",
                    space:"please enter valid last name", 
                    text_name:"please enter valid  first name",
                },
                parent_name: {
                    required: "Please enter your parent name",
                    alphabetscaps:"please enter valid parent name",
                    space:"please enter valid parent name",
                    text_name:"please enter valid parent name",
                }    ,     
                parent_mobile_number: {
                    required:"Please enter your mobile no.",
					number:"Only number allowed.",
					 digits: "Please enter valid phone no",
                    	minlength: "Phone number field accept only 10 digits",
                        maxlength: "Phone number field accept only 10 digits",
                },
                mobile_number: {
                    required: "Please enter employee mobile number.",
                    digits: "Please enter valid mobile number.",
                    minlength: "Please enter 10 digits mobile number.",
                    maxlength: "Please enter 10 digits mobile number.",
                },
                blood_group: {
                    required:"Please select blood group.",
                },
                address: {
                    required: "Please enter your address",
                    // minlength: "Your password must be at least 6 characters long"
                },
                <?php if(empty($single->photo)){?>
                userfile: {
                    required:"Please upload photo.",
                },
                <?php } ?>
                <?php if(empty($single->adhar_card)){?>
                aadhar_photo: {
                    required:"Please upload photo.",
                },
                <?php }?>
                aadhar_no: {
                    required:"Please enter adhar number.",
                    validadhar:"Please enter 12 digits Adhar number.",
                },
            },
            errorPlacement: function (error, element) {
                if (element.is(":radio")) {
                    error.appendTo(element.parents('.form-group'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>
<!-- <script>
    $(".alert").fadeTo(3000, 500).slideUp(500, function () {
        $(".alert").slideUp(300);
    });
</script> -->

</html>