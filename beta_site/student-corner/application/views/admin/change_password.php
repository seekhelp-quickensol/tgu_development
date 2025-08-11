<?php include('header.php');?>
<?php include('sidebar.php');?>

<section>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="well col-md-offset-3 col-md-8 ">
                    <form class="card-form" method="post" id="add-customer" enctype='multipart/form-data' name="add-customer" novalidate="novalidate">
                        <h2 class="table-title add_customer">Update Your Password</h2>
                        <hr>
                        <div id="form-content" method="post" class="row">
                            <div class="form-group col-lg-6">
                                <label for="full_name">New Password</label>
                                <input class="form-control" type="password" id="new_password" name="new_password" value="">
                            </div> 
                            <div class="form-group col-lg-6">
                                <label for="email">Confirm Password</label>
                                <input class="form-control" type="password" id="confirm_password" name="confirm_password">
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
                new_password: {
                    required: true,
                    minlength: 4,
                },
                confirm_password: {
                    required: true,
                    equalTo: "#new_password",
                }, 
            },
            messages: { 
			    new_password: {
                    required: "Please enter new password",
                    minlength: "Please enter minimum 4 digit password",
                },
                confirm_password: {
                    required: "Please enter confirm password",
                    equalTo: "Password does not match",
                }, 
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>