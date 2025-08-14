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
                                        <th>Adhar/Passport</th>
                                        <th>Photo</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Registration No</th>
                                        <th>Enrollment No</th>
                                        <th>Center Name</th>
                                        <th>Student Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>

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
                                                        <?php if ($document_result->identity_softcopy == "") { ?><span style="font-size: 16px; color: red;">❌</span><?php } else { ?><span style="font-size: 16px; color: green;">✔️</span><?php } ?>
                                                        <input type="file" name="identity_softcopy">
                                                        <input type="submit" name="identity_softcopy_btn" value="Upload" class="btn btn-primary">
                                                        <input type="hidden" name="id" value="<?= $document_result->id ?>">
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="post" enctype="multipart/form-data">
                                                        <?php if ($document_result->photo == "") { ?><span style="font-size: 16px; color: red;">❌</span><?php } else { ?><span style="font-size: 16px; color: green;">✔️</span><?php } ?>
                                                        <input type="file" name="photo">
                                                        <input type="submit" name="photo_btn" value="Upload" class="btn btn-primary">
                                                        <input type="hidden" name="id" value="<?= $document_result->id ?>">
                                                    </form>
                                                </td>
                                                <td><?= $document_result->username ?></td>
                                                <td><?= $document_result->password ?></td>
                                                <td><?= $document_result->id ?></td>
                                                <td><?= $document_result->enrollment_number ?></td>
                                                <td><?= $document_result->center_name ?></td>
                                                <td><?= $document_result->student_name ?></td>
                                                <td><?= $document_result->mobile ?></td>
                                                <td><?= $document_result->email ?></td>
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



                        messageBottom: 'The information in this table is copyright to The Global University.',

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