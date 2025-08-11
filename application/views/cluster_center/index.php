<?php include('header.php'); ?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">

                    <div class="col-lg-12 grid-margin grid-margin-md-0">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php if (!empty($center_profile)) {
                                                            echo $center_profile->name;
                                                        } ?></h4>
                                <form class="forms-sample" name="single_form" id="single_form" method="GET">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Select Center *</label>
                                                <select class="form-control" id="center" name="center">
                                                    <option value="">Select Center</option>
                                                    <?php if (!empty($cluster_centers)) {
                                                        foreach ($cluster_centers as $cluster_centers_result) { ?>
                                                            <option value="<?= $cluster_centers_result->id ?>" <?php if (isset($_GET['center'])) {
                                                                                                                    if ($_GET['center'] == $cluster_centers_result->id) { ?> selected="selected" <?php }
                                                                                                                                                                                            } ?>><?= $cluster_centers_result->center_name ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php

                    if (isset($_GET['center'])) {
                    ?>

                        <div class="col-lg-12 grid-margin grid-margin-md-0" style="padding-top:20px;">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Students List</h4>
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap table-responsive" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Student Name</th>
                                                <th>Session</th>
                                                <th>Course Name</th>
                                                <th>Stream Name</th>
                                                <th>Date of Birth</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $students = $this->Cluster_center_model->get_center_students($_GET['center']);
                                            $i = 1;
                                            if (!empty($students)) {
                                                foreach ($students as $students_result) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $students_result->student_name; ?></td>
                                                        <td><?= $students_result->session_name; ?></td>
                                                        <td><?= $students_result->course_name; ?></td>
                                                        <td><?= $students_result->stream_name; ?></td>
                                                        <td><?= $students_result->date_of_birth; ?></td>
                                                        <td><?= $students_result->mobile; ?></td>
                                                        <td><?= $students_result->email; ?></td>
                                                        <!-- <td></td> -->
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    });
</script>