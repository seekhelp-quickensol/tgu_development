<?php include('header.php');?>
<?php include('sidebar.php');?>

<section>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="well col-md-offset-3 col-md-8 ">
                    <form class="card-form" method="post" id="add-customer" enctype='multipart/form-data' name="add-customer"
                        novalidate="novalidate">
                        <h2 class="table-title add_customer">Update Profile</h2>
                        <hr>
                        <div id="form-content" method="post" class="row">
                            <div class="form-group col-lg-6">
                                <label for="full_name">Full Name</label>
                                <input class="form-control" type="text" id="name" name="name" value="<?php if(!empty($profile)){ echo $profile->name;}?>">
                            </div> 
                            <div class="form-group col-lg-6">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" id="email" name="email" value="<?php if(!empty($profile)){ echo $profile->email;}?>">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="number">Mobile No</label>
                                <input class="form-control" type="text" name="mobile_number" value="<?php if(!empty($profile)){ echo $profile->mobile_number;}?>">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="last_name">Image</label>
                                <input type="hidden" name="old_img" id="old_img" value="<?php if(!empty($single)){ echo $single->file;}?>">
                                <input class="form-control" type="file" name="file" value="<?php if(!empty($single)){ echo $single->file;}?>" >
                            </div>
                        </div> 
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary bg-theme">Update </button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>
<script>
    $(function () {
        $("form[name='add-customer']").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                last_name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                mobile_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                <?php if(!empty($single) && $single->file ==""){   ?>
                file:{
                    required: true,
                },
                <?php } ?>
                gst_no: "required"
            },
            messages: {
                name: "Please specify your name",
                email: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of john.smith@gmail.com"
                },
                mobile_number: {
                    required: "Please enter phone number",
                    digits: "Please enter valid phone number",
                    minlength: "Phone number field accept only 10 digits",
                    maxlength: "Phone number field accept only 10 digits",
                },
                <?php if(!empty($single) && $single->file ==""){  ?>
                file:{
                    required: "Please upload file",
                },
                <?php }?>
              gst_no: "Please enter your gst no"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>