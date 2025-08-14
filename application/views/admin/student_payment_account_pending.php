<?php include('header.php'); ?>

<div class="container-fluid page-body-wrapper">

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <form id="form_input" name="form_input" method="post" enctype="multipart/form-data" action="<?= base_url() ?>filter_instollment">

                <div class="filter_course_details">



                    <div class="form-group">

                        <div class="row pt-4">

                            <div class="col-md-6">

                                <label for="">Center </label>

                                                    <select id="center_name" name="center_name" class="form-control js-example-basic-single select2_single">

                                    <option value="">Select Center</option>

                                    <?php if (!empty($center)) {
                                        foreach ($center as $center_result) { ?>

                                            <option value="<?= $center_result->id ?>"><?= $center_result->center_name ?></option>



                                    <?php }
                                    } ?>



                                </select>

                            </div>

                            <div class="col-md-6">

                                <label for="">Year Semester </label>

                                                    <select id="year_sem" name="year_sem" class="form-control js-example-basic-single select2_single">

                                    <option value="">Select Year Semester</option>

                                    <?php for ($y = 1; $y <= 12; $y++) { ?>

                                        <option value="<?= $y ?>"><?= $y ?></option>



                                    <?php }  ?>



                                </select>

                            </div>

                        </div>

                        <div class="row pt-2 ">

                            <br>

                            <div class="col-md-6">

                                <label for="">Session </label>

                                                    <select id="session_name" name="session_name" class="form-control js-example-basic-single select2_single">

                                    <option value="">Select Session</option>

                                    <?php if (!empty($session)) {
                                        foreach ($session as $session_result) { ?>

                                            <option value="<?= $session_result->id ?>"><?= $session_result->session_name ?></option>



                                    <?php }
                                    } ?>







                                </select>

                            </div>

                            <div class="col-md-6">

                                <label for="">Enrollment Number </label>

                                <input type="text" class="form-control" placeholder="Enrollment Number" name="enrollement" id="enrollement">



                            </div>



                            <div class="col-md-6 mt-3">

                                <span class="filter_course_btn">

                                    <input class="search_btn btn btn-primary mr-2" type="submit" id="save" name="save" value="Search">

                                    <button class="btn btn-primary mr-2 single_btn"><a style="text-decoration:none;" class="text-white" href="<?= base_url() ?>student_payment_account_pending">Refresh</a></button>

                                </span>

                            </div>

                            <!-- <div class="filter_course_btn">

							<input class="search_btn" type="submit" id="save" name="save" value="Search">

							<input class="search_btn" type="hidden" id="" name="course" value="Search">

							<a href="<?= base_url() ?>mcq_question_list">Refresh</a>

						</div>		 -->

                        </div>

                    </div>

                </div>

            </form>

                        </div>

                    </div>

                </div>



            </div>


            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">Student Remaining Installment Fees</h4>

                            <table style="width:100%" id="example_pending" class="table table_account table-striped">

                <thead class="">

    <!-- <h4 class="statement_title title_padding">Student Remaining Installment Fees </h4> -->

                    <tr class="bg-theme">

                        <th>Sr No</th>

                        <th>Enrollment Number</th>

                        <th>Name</th>

                        <th>Course</th>

                        <th>Year/Sem</th>

                        <th>Course Mode</th>

                        <th>Center Name</th>

                        <th>Session Name</th>

                        <th>Totol Fees</th>

                        <th>Paid Fees</th>

                        <th>Remaining Fees</th>

                    </tr>



                </thead>

                <?php

                echo "<pre>";

                if (!empty($student_pending_yearly)) {

                    $i = 1;



                    foreach ($student_pending_yearly as $student_pending_yearly_result) {



                        $total_fees_calculated = $this->Account_model->get_all_fees_student_pending($student_pending_yearly_result->id);



                        $remaing_fees = $total_fees_calculated - $student_pending_yearly_result->total_fees;



                        if (!empty($student_pending_yearly_result)) {

                            if ($total_fees_calculated > $student_pending_yearly_result->total_fees) {



                ?>



                                <tr>

                                    <td><?= $i++ ?></td>

                                    <td><?= $student_pending_yearly_result->enrollment_number ?></td>

                                    <td><?= $student_pending_yearly_result->student_name ?></td>

                                    <td><?= $student_pending_yearly_result->course_name ?></td>



                                    <td><?php echo $student_pending_yearly_result->year_sem; ?>

                                    </td>

                                    <td><?php if ($student_pending_yearly_result->course_mode == '1') {
                                            echo "year";
                                        } elseif ($student_pending_yearly_result->course_mode == '2') {
                                            echo "sem";
                                        } elseif ($student_pending_yearly_result->course_mode == '3') {
                                            echo "both";
                                        } else {
                                            echo "month";
                                        } ?></td>

                                    <td><?php echo $student_pending_yearly_result->center_name; ?>

                                    </td>

                                    <td><?php echo $student_pending_yearly_result->session_name; ?>

                                    </td>

                                    <td><?= $total_fees_calculated ?></td>

                                    <td><?= $student_pending_yearly_result->total_fees ?></td>

                                    <td><?= $remaing_fees ?></td>

                                </tr>

                    <?php // $total_exam_fees += $exam_fees;

                            }
                        }
                        $i++;
                    }
                } ?>

                <tfoot>

                    <!-- <tr>

        <td></td>

        <td></td>

        <td></td>

        <td>Total</td>

        <td><?= $total_exam_fees ?></td>

        <td></td>

        <td></td>

    </tr> -->

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

        <script>
            $(document).ready(function() {

                var table = $('#example_pending').DataTable({

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

                                columns: [0, 1, 2, 3, 4, 5,6,7,8,9,10],

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