<?php include('header.php') ?>
<style>

</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Upload Thesis</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li>
                    </ul>
                    <div class="card">
                        <?php if (!empty($single_thesis) && $single_thesis->thesis_status == 1) { ?>
                            <div class="col-lg-12" style="margin:0px auto;padding: 10px">
                                <p style="color:red">There are following deficiency</p>
                                <p><?= $single_thesis->remarks ?></p>
                            </div>
                        <?php } ?>
                        <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1 doc_box">
                            <?php
                            if (empty($single_thesis) || $single_thesis->thesis_status == 1) {
                            ?>
                                <div class="tab-pane active" id="active">
                                    <div class="table-responsive box-table mt-3" id="printable_div">
                                        <form class="forms-sample" name="password_form" id="password_form" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="" class="lable_style">Thesis title<span style="color:red"> *</span></label>
                                                <input type="text" id="thesis_title" name="thesis_title" value="<?php if (!empty($single_thesis)) {
                                                                                                                    echo $single_thesis->thesis_title;
                                                                                                                } ?>" class="form-control custom_select" aria-describedby="" placeholder="Thesis title">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="lable_style">Upload Thesis:<span style="color:red"> * </span>
                                                    <?php if (!empty($single_thesis)) { ?>
                                                        <a target="_blank" href="<?= $this->Digitalocean_model->get_photo('images/thesis/' . $single_thesis->softcopy) ?>">Click to View Thesis</a>
                                                    <?php } ?>
                                                </label>
                                                <input type="file" name="userfile2" class="form-control" id="userfile2">
                                                <input type="hidden" name="softcopy" id="softcopy" value="<?php if (!empty($single_thesis)) {
                                                                                                                echo $single_thesis->softcopy;
                                                                                                            } ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="lable_style">Paper Journal<span style="color:red"> *</span></label>
                                                <input type="text" id="paper_journal1" name="paper_journal1" value="<?php if (!empty($single_thesis)) {
                                                                                                                        echo $single_thesis->paper_journal1;
                                                                                                                    } ?>" class="form-control custom_select" aria-describedby="" placeholder="Paper journal">

                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" id="hidden_id" name="hidden_id" value="<?php if (!empty($single_thesis)) {
                                                                                                                echo $single_thesis->id;
                                                                                                            } ?>" class="form-control custom_select" aria-describedby="" placeholder="Category Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="lable_style">Guide name<span style="color:red"> *</span></label>
                                                <select class="form-control" name="name" id="name">
                                                    <option value="">Please select Guide Name</option>
                                                    <?php
                                                    if (!empty($guide_data)) {
                                                        foreach ($guide_data as $guide_data_res) { ?>
                                                            <option value="<?= $guide_data_res->id; ?>" <?php if (!empty($single_thesis) && $single_thesis->guide_id == $guide_data_res->id) { ?>selected="selected" <?php } ?>><?= $guide_data_res->name; ?></option>

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
                            <?php
                            } else if (!empty($single_thesis) && $single_thesis->thesis_status == 2) {
                            ?>
                                <div class="tab-pane active" id="active">
                                    <div class="table-responsive box-table mt-3" id="printable_div">
                                        <div class="form-group">
                                            <label for="" class="lable_style">Waiting from Campus!</label>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            } else if (!empty($single_thesis) && $single_thesis->thesis_status == 0) {
                            ?>
                                <div class="tab-pane active" id="active">
                                    <div class="table-responsive box-table mt-3" id="printable_div">
                                        <div class="form-group">
                                            <label for="" class="lable_style">Congrotulations! Your thesis has been approved.</label>
                                            <?php if (!empty($single_thesis)) { ?>
                                                <a target="_blank" href="<?= $this->Digitalocean_model->get_photo('images/thesis/' . $single_thesis->softcopy) ?>">Click to View Thesis</a>
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
        $('#password_form').validate({
            rules: {
                thesis_title: {
                    required: true,
                },
                userfile2: {
                    required: true,
                },
                paper_journal1: {
                    required: true
                },
                name: {
                    required: true
                },
            },
            messages: {
                thesis_title: {
                    required: "Please enter thesis title",
                },
                userfile2: {
                    required: "Please upload thesis",
                },
                paper_journal1: {
                    required: "Please enter paper journal"
                },
                name: {
                    required: "Please select guide name",
                },
            },
            submitHandler: function(form) {
                form.submit();
            },
        });
    });
</script>