<?php include('header.php') ?>
<style>

</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Upload Synopsis</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li>
                    </ul>
                    <div class="card">
                        <?php if (!empty($single_synopsis_thesis) && $single_synopsis_thesis->synopsis_status == 3) { ?>
                            <div class="col-lg-12" style="margin:0px auto;padding: 10px">
                                <p style="color:red">There are following deficiency</p>
                                <p><?= $single_synopsis_thesis->remarks ?></p>

                            </div>
                        <?php } ?>

                        <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1 doc_box">

                            <?php if (empty($single_synopsis_thesis) || $single_synopsis_thesis->synopsis_status == "3") { ?>
                                <div class="tab-pane active" id="active">
                                    <div class="table-responsive box-table mt-3" id="printable_div">
                                        <form id="synopsis_form" id="synopsis_form" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="" class="lable_style">Synopsis title<span style="color:red"> *</span></label>
                                                <input type="text" id="thesis_title" name="thesis_title" value="<?php if (!empty($single_synopsis_thesis)) {
                                                                                                                    echo $single_synopsis_thesis->thesis_title;
                                                                                                                } ?>" class="form-control custom_select" aria-describedby="" placeholder="Synopsis title">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="lable_style">Upload Synopsis:<span style="color:red"> *</span>
                                                    <?php if (!empty($single_synopsis_thesis)) { ?>
                                                        <a target="_blank" href="<?= $this->Digitalocean_model->get_photo('images/thesis/' . $single_synopsis_thesis->soft_copy) ?>">Click to View Thesis</a>
                                                    <?php } ?>
                                                </label>
                                                <input type="file" name="userfile1" class="form-control" id="userfile1">
                                                <input type="hidden" name="soft_copy" id="soft_copy" value="<?php if (!empty($single_synopsis_thesis)) {
                                                                                                                echo $single_synopsis_thesis->soft_copy;
                                                                                                            } ?>">
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" id="hidden_id" name="hidden_id" value="<?php if (!empty($single_synopsis_thesis)) {
                                                                                                                echo $single_synopsis_thesis->id;
                                                                                                            } ?>" class="form-control custom_select" aria-describedby="" placeholder="Category Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="lable_style">Guide name<span style="color:red"> *</span></label>
                                                <select class="form-control" name="name" id="name">
                                                    <option value="">Please select Guide Name</option>
                                                    <?php
                                                    if (!empty($guide)) {
                                                        foreach ($guide as $guide_res) { ?>
                                                            <option value="<?= $guide_res->id; ?>" <?php if (!empty($single_synopsis_thesis) && $single_synopsis_thesis->guide_id == $guide_res->id) { ?>selected="selected" <?php } ?>><?= $guide_res->name; ?></option>

                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="font-weight-600">
                                                <button type="submit" class="btn btn-primary mr-2 password_submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php }
                            if (!empty($single_synopsis_thesis) && $single_synopsis_thesis->synopsis_status == 2) { ?>
                                <div class="tab-pane active" id="active">
                                    <div class="table-responsive box-table mt-3" id="printable_div">
                                        <div class="form-group">
                                            <label for="" class="lable_style">Waiting from Campus!</label>
                                        </div>
                                    </div>
                                </div>
                            <?php } else if (!empty($single_synopsis_thesis) && $single_synopsis_thesis->synopsis_status == 0) { ?>
                                <div class="tab-pane active" id="active">
                                    <div class="table-responsive box-table mt-3" id="printable_div">
                                        <div class="form-group">
                                            <label for="" class="lable_style">Congrotulations! Your synopsis has been approved.</label>
                                            <?php if (!empty($single_synopsis_thesis)) { ?>
                                                <a target="_blank" href="<?= $this->Digitalocean_model->get_photo('images/thesis/' . $single_synopsis_thesis->soft_copy) ?>">Click to View Synopsis</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
<script>
    $(document).ready(function() {
        jQuery.validator.addMethod("validate_email", function(value, element) {
            if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
                return true;
            } else {
                return false;
            }
        }, "Please enter a valid Email.");
        $('#synopsis_form').validate({

            rules: {
                thesis_title: {
                    required: true,
                },
                userfile1: {
                    required: true,
                },
                name: {
                    required: true
                },

            },
            messages: {
                thesis_title: {
                    required: "Please enter synopsis title",
                },
                userfile1: {
                    required: "Please upload synopsis",
                },
                name: {
                    required: "Please select guide name",
                },

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>