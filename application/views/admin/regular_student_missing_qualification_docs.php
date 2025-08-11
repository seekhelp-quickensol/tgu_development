<?php
include('header.php');
?>
<style>
    .clearfix {
        clear: both margin-top:10px;
        margin-bottom: 20px;
    }
</style>

<div class="container-fluid page-body-wrapper">

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">



                            <h4 class="card-title"></h4>



                            <div class="clearfix"></div>

                            <!--<a class="btn btn-primary" style="margin-bottom: 10px;" href="<?= base_url(); ?>download_student_data?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>&session=<?= $session_filter ?>&center=<?= $center_filter ?>&type=<?= $type ?>&admit=<?= $admit ?>">Download</a>-->

                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Secondary Marksheet</th>
                                        <th>Sr Secondary Marksheet</th>
                                        <th>Graduation Marksheet</th>
                                        <th>Post Graduation Marksheet</th>
                                        <th>Other Qualification Marksheet</th>
                                        <th>Enrollment No</th>
                                        <th>Center Name</th>
                                        <th>Student Name</th>
                                        <th>Course Name</th>
                                        <th>Stream Name</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 1;
                                    if (!empty($document)) {
                                        foreach ($document as $document_result) {
                                    ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <form method="post" enctype="multipart/form-data">
                                                        <?php if ($document_result->secondary_year != "" && $document_result->secondary_marksheet == "") { ?><span style="font-size: 16px; color: red;">❌</span>
                                                            <input type="file" name="secondary_marksheet">
                                                            <input type="submit" name="secondary_marksheet_btn" value="Upload" class="btn btn-primary">
                                                            <input type="hidden" name="id" value="<?= $document_result->id ?>">
                                                            <?php } else {
                                                            if ($document_result->course_type >= 1) {
                                                            ?>
                                                                <span style="font-size: 16px; color: green;">✔️</span>
                                                        <?php
                                                            }
                                                        } ?>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="post" enctype="multipart/form-data">
                                                        <?php if ($document_result->sr_secondary_year != "" &&  $document_result->sr_secondary_marksheet == "") { ?>
                                                            <span style="font-size: 16px; color: red;">❌</span>
                                                            <input type="file" name="sr_secondary_marksheet">
                                                            <input type="submit" name="sr_secondary_marksheet_btn" value="Upload" class="btn btn-primary">
                                                            <input type="hidden" name="id" value="<?= $document_result->id ?>">
                                                            <?php } else {
                                                            if ($document_result->course_type > 1) {
                                                            ?>
                                                                <span style="font-size: 16px; color: green;">✔️</span>
                                                        <?php } else {
                                                                echo "Not Required";
                                                            }
                                                        } ?>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="post" enctype="multipart/form-data">
                                                        <?php if ($document_result->graduation_year != "" && $document_result->graduation_marksheet == "") { ?>
                                                            <span style="font-size: 16px; color: red;">❌</span>
                                                            <input type="file" name="graduation_marksheet">
                                                            <input type="submit" name="graduation_marksheet_btn" value="Upload" class="btn btn-primary">
                                                            <input type="hidden" name="id" value="<?= $document_result->id ?>">
                                                            <?php } else {
                                                            if ($document_result->course_type >= 4) {
                                                            ?>
                                                                <span style="font-size: 16px; color: green;">✔️</span>
                                                        <?php } else {
                                                                echo "Not Required";
                                                            }
                                                        } ?>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="post" enctype="multipart/form-data">
                                                        <?php if ($document_result->post_graduation_year != "" && $document_result->post_graduation_marksheet == "") { ?>
                                                            <span style="font-size: 16px; color: red;">❌</span>
                                                            <input type="file" name="post_graduation_marksheet">
                                                            <input type="submit" name="post_graduation_marksheet_btn" value="Upload" class="btn btn-primary">
                                                            <input type="hidden" name="id" value="<?= $document_result->id ?>">
                                                            <?php } else {
                                                            if ($document_result->course_type >= 5) {
                                                            ?>
                                                                <span style="font-size: 16px; color: green;">✔️</span>
                                                        <?php } else {
                                                                echo "Not Required";
                                                            }
                                                        } ?>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="post" enctype="multipart/form-data">
                                                        <?php if ($document_result->other_qualification_year != "" && $document_result->other_qualification_marksheet == "") { ?>
                                                            <span style="font-size: 16px; color: red;">❌</span>
                                                            <input type="file" name="other_qualification_marksheet">
                                                            <input type="submit" name="other_qualification_marksheet_btn" value="Upload" class="btn btn-primary">
                                                            <input type="hidden" name="id" value="<?= $document_result->id ?>">
                                                            <?php } else {
                                                            if ($document_result->course_type >= 6) {
                                                            ?>
                                                                <span style="font-size: 16px; color: green;">✔️</span>
                                                        <?php } else {
                                                                echo "Not Required";
                                                            }
                                                        } ?>
                                                    </form>
                                                </td>


                                                <td><?= $document_result->enrollment_number ?></td>
                                                <td><?= $document_result->center_name ?></td>
                                                <td><?= $document_result->student_name ?></td>
                                                <td><?= $document_result->course_name ?></td>
                                                <td><?= $document_result->stream_name ?></td>
                                            </tr>

                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php include('footer.php');

        $id = 0;

        if ($this->uri->segment(2) != "") {

            $id = $this->uri->segment(2);
        }







        ?>

        <script>
            $('#example').DataTable({
                buttons: [


                    {

                        extend: "excelHtml5",



                        messageBottom: 'The information in this table is copyright to The global University.',

                        exportOptions: {

                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25],

                            modifier: {

                                search: 'applied',

                                order: 'applied'

                            },

                        },


                    }

                ],



            });
        </script>