<?php include('header.php');?>
<?php include('sidebar.php');?>


<title>Vasantam Food</title>
    <meta name="description" content="">
        <meta name="keywords" content="">
        
    <link href="http://fonts.cdnfonts.com/css/tt-commons" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url();?>admin_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>admin_assets/css/style.css">
    <!-- <header class="login-form-header">
        <h2> <a href="<?=base_url();?>"> Mywindow </a>   </h2>
    </header> -->
<style>
 
</style>
<div class="">
    <div class="container-fluid">


     <!-- <div class="text-center"> 
     <a href="<?=base_url();?>"> <img src="<?=base_url();?>admin_assets/images/logo-01.png" class=""> </a>
     </div> -->

        <div class="form_container"> 
            <div class="card login-form-holder">
       
     
                <h2 class="form-heading">Change Password</h2>
                <div class="card-body">
                    <form action="" method="post" id="setting-form" novalidate="novalidate">
                        <div class="form-group">
                            <label for="password_field" class="control-label">Old Password</label>
                            <input id="old_password" type="password" class="form-control" placeholder="Old Password" name="old_password" >
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>


                        <div class="form-group">
                            <label for="password_field_new" class="control-label">New Password</label>
                            <input id="new_password" type="password" class="form-control" placeholder="New Password" name="new_password" >
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>


                        <div class="form-group">
                            <label for="password_field_conform" class="control-label">Confirm Password</label>
                            <input id="confirm_password" type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>

                        <div class="row">
                            <!-- <div class="col-12 text-left">
                                <a href="<?=base_url();?>forgot-password" class="btn btn-link forgot_password">Forgot Password</a>
                            </div> -->
                            <div class="col-12">
                                <button type="submit" class="btn-login submit">Submit</button>
                            </div>
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
     $(document).ready(function($) {
        
        $("#setting-form").validate({
        rules: {
            email: {required: true, email: true   },
                               
            old_password: {
                required: true,
               // minlength: 6
            },
            new_password: {
                required: true,
                minlength:4,
				maxlength:4,
            },
            confirm_password: {
                required: true,
                equalTo:"#new_password",
                minlength:4,
                maxlength:4,
            }
        },
        messages: {
            // email: "Please enter your email Address",     

            old_password: {
                required: "Please enter old password",
               // minlength: "Your password must be at least 6 characters long"
            },
            new_password: {
                required: "Please enter new password",
               // minlength: "Your password must be at least 6 characters long"
            },
            confirm_password: {
                required: "Please confirm password",
               // minlength: "Your password must be at least 6 characters long"
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

$(".submit").hide();      
 $('#old_password').keyup(function(){
      var old_pass =$('#old_password').val();
         $.ajax({
            type:"POST",
            url :"<?=base_url();?>admin/Ajax_controller/check_unique_password",
            data:{'old_pass':old_pass},
            success:function(data){
				console.log(data);
               if(data !=="0"){
                  $(".submit").show();
               }else{
				$(".submit").hide();
               }
            },
            error:function(jqXHR,textStatus,errorThrown){
               console.log(textStatus,errorThrown);
            }

         });
      });
</script>

<script>

$(".alert").fadeTo(3000, 500).slideUp(500, function(){
     $(".alert").slideUp(300);
 }); 
 </script>


</html>