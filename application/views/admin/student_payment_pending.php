<?php include('header.php');
$total_fees = 0;
$total_exam_fees = 0;
?>

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data in Table Format (Student Pending Examination)</h4>

                            <table style="width:100%" id="example" class="table table_account table-striped">
                                 <thead class="">
                                    <tr class="bg-theme">

                            <th>Sr No</th>

                            <th>Enrollment Number</th>

                            <th>Name</th>



                            <th>Year/Sem</th>

                            <th>Amount</th>

                            <th>Center Name</th>

                        </tr>



                    </thead>

                    <?php
                    if (!empty($student_pending)) {
                        // print_r($student_pending);
                        $i = 1;


                        foreach ($student_pending as $student_pending_result) {
                            $date_exam_date =  date('Y-m-d', strtotime($student_pending_result->payment_date . '+60 days'));
                            $student_pending_info =  $this->Account_model->get_student_pending_info($student_pending_result->student_id, $student_pending_result->year_sem);
                            if (!empty($student_pending_info)) {
                    ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <!-- <td><?= $student_pending_info->id ?></td>     -->
                                    <td><?= $student_pending_info->enrollment_number ?></td>
                                    <td><a target=_blank href="<?= base_url(); ?>student_account_statement/<?= $student_pending_info->id ?>"><?= $student_pending_info->student_name ?></a> </td>
                                    <td><?= $student_pending_info->year_sem ?></td>
                                    <td><?= $student_pending_result->examination_fees ?></td>
                                    <td><?= $student_pending_info->center_name ?></td>
                            <?php
                                $total_fees += $student_pending_result->examination_fees;
                            }
                        }
                    } ?>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td><?= $total_fees ?></td>
                                    <td></td>
                                </tr>
                                <tfoot>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data in Table Format (Student Re-registration Examination)</h4>

                            <table style="width:100%" id="example_reregistration" class="table table_account table-striped">

                    <thead class="">

                        <!-- <h4 class="statement_title title_padding">Data in Table Format (Student Re-registration Examination)</h4> -->

                        <tr class="bg-theme">

                            <th>Sr No</th>

                            <th>Enrollment Number</th>

                            <th>Name</th>

                            <th>Year/Sem</th>

                            <th> Amount Due</th>

                            <th>Center Name</th>

                        </tr>



                    </thead>

                    <?php if (!empty($student_reregistration_data)) {

                        $i = 1;

                        foreach ($student_reregistration_data as $student_reregistration_data_result) {

                            $exam_fees = '1000';

                            if (!empty($student_reregistration_data_result)) {



                                if ($student_reregistration_data_result->course_mode == '1') {

                                    if ($student_reregistration_data_result->course_id == '233' || $student_reregistration_data_result->course_id == '234' || $student_reregistration_data_result->course_id == '193' || $student_reregistration_data_result->course_id == '17') {



                                        $exam_fees = '2500';
                                    } else {



                                        $exam_fees = '1000';
                                    }
                                } else if ($student_reregistration_data_result->course_mode == '2') {

                                    if ($student_reregistration_data_result->course_id == '233' || $student_reregistration_data_result->course_id == '234' || $student_reregistration_data_result->course_id == '193' || $student_reregistration_data_result->course_id == '17') {

                                        $exam_fees = '2500';
                                    } else {

                                        $exam_fees = '1000';
                                    }
                                }
                            }

                            $registration_date = $student_reregistration_data_result->created_on;

                            //print_r($registration_date);

                            $current_date = date("Y-m-d");

                            /// print_r($current_date);



                            $datediff = (strtotime($current_date) - strtotime($registration_date));

                            $count = floor($datediff / (60 * 60 * 24));

                            if ($count > 60) {

                                //   echo "ok";

                                $student_reregistration_info =  $this->Account_model->get_student_reregistration_info($student_reregistration_data_result->student_id, $student_reregistration_data_result->current_year_sem);





                                if (!empty($student_reregistration_info)) {

                    ?>



                                    <tr>

                                        <td><?= $i++ ?><?= $student_reregistration_info->id ?></td>

                                        <td><?= $student_reregistration_info->enrollment_number ?></td>



                                        <td><a target=_blank href="<?= base_url(); ?>student_pending_info_reregistration/<?= $student_reregistration_info->id ?>"><?= $student_reregistration_info->student_name ?></a></td>



                                        <td><?= $student_reregistration_info->year_sem ?></td>

                                        <td><?= $exam_fees ?></td>

                                        <td><?= $student_reregistration_info->center_name ?></td>

                                    </tr>

                        <?php $total_exam_fees += $exam_fees;
                                }
                            }
                        }
                    }  ?>

                    <tfoot>

                        <tr>

                            <td></td>

                            <td></td>

                            <td></td>

                            <td>Total</td>

                            <td><?= $total_exam_fees ?></td>

                            <td></td>

                        </tr>

                        <tfoot>

                            </thead>



                            </tbody>

                </table>

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

        var table = $('#example').DataTable({

            "lengthChange": false,

            "processing": true,

            "serverSide": false,

            "responsive": true,

            "cache": false,

            "order": [
                [0, "asc"]
            ],

            buttons: [



                {

                    extend: "excelHtml5",

                    title: 'Data in Table Format (Center)',

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [0, 1, 2, 3, 4, 5],

                        modifier: {

                            search: 'applied',

                            order: 'applied'

                        },

                    },



                }

            ],

            dom: "Bfrtip",





            "complete": function() {

                $('[data-toggle="tooltip"]').tooltip();

            },

        });

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

    });
</script>

<script>
    $(document).ready(function() {

        var table = $('#example_reregistration').DataTable({

            "lengthChange": false,

            "processing": true,

            "serverSide": false,

            "responsive": true,

            "cache": false,

            "order": [
                [0, "asc"]
            ],

            buttons: [



                {

                    extend: "excelHtml5",

                    title: 'Data in Table Format (Center)',

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [0, 1, 2, 3, 4, 5],

                        modifier: {

                            search: 'applied',

                            order: 'applied'

                        },

                    },



                }

            ],

            dom: "Bfrtip",





            "complete": function() {

                $('[data-toggle="tooltip"]').tooltip();

            },

        });

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

    });
</script>