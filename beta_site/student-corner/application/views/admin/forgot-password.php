
    <link href="http://fonts.cdnfonts.com/css/tt-commons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url();?>admin_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>admin_assets/css/style.css">
<!-- 
    <header class="login-form-header">
    <h2> <a href="<?=base_url();?>"> Logo </a>   </h2>
    </header> -->



<div class="bg-gradient-form">

<div class="text-center"> 
     <a href="<?=base_url();?>"> <img src="<?=base_url();?>admin_assets/images/logo.jpeg" class="mywindow-logo"> </a>
     </div>
     
    <div class="container-fluid">
        <img src="<?=base_url();?>admin_assets/images/shape.png" class="shape_left">
        <img src="<?=base_url();?>admin_assets/images/shape.png" class="shape_right">
        <div class="form_container">
            <div class="card login-form-holder">
                <h2 class="form-heading">Change Password</h2>
                <div class="card-body">
                    <form id="login-form" method="post">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control" placeholder="Email Address" />
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button class="btn-login">Reset </button>
                            </div>

                            <div class="col-12 ">
                            <a class="btn-back" href="<?=base_url();?>login"> Back </a>                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($this->session->flashdata('success') !=""){?>
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
    <?php }?>
   
<script src="<?=base_url();?>admin_assets/js/jquery.slim.min.js"></script>
<script src="<?=base_url();?>admin_assets/js/popper.min.js"></script>
<script src="<?=base_url();?>admin_assets/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
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
     $(document).ready(function($) {
        
        $("#login-form").validate({
        rules: {
            email: {required: true, email: true   },
                               
            password_field: {
                required: true,
                minlength: 6
            }
         
        },
        messages: {
            // email: "Please enter your email Address",     
            email: {
                required: "We need your email address to contact you",
                        email: "Your email address must be in the format of john.smith@gmail.com"
            }              ,
            password_field: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            }
        },
         errorPlacement: function(error, element) 
{
    if ( element.is(":radio") ) 
    {
        error.appendTo( element.parents('.form-group') );
    }
    else 
    { 
        error.insertAfter( element );
    }
 },
        submitHandler: function(form) {
            form.submit();
        }
        
    });
});
</script>

<script>

$(".alert").fadeTo(3000, 500).slideUp(500, function(){
     $(".alert").slideUp(300);
 }); 
 </script>
