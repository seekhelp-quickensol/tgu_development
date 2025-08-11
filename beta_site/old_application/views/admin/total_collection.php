<?php

include('header.php'); 

$center_amount_total_seprate =0;

$total_fees_btu_seperate =0;

$grand_amount_separate =0;
?>

<div class="container-fluid page-body-wrapper" style="display:none">

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">Total Collection : Student & Center</h4>

                            <div class="chart-container">

                                <canvas id="myChart_bar"></canvas>

                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </div>

    </div>



</div>

<div class="container-fluid page-body-wrapper" >

    <div class="main-panel">

        <div class="content-wrapper">
<!-- 1 -->
            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">Center Payment Data</h4>

                            <table id="example" style="width:100%" class="table table_account table-bordered table-striped datatable_parent">

            <thead class="">

    <!-- <h4 class="statement_title title_padding">Center Payment Data</h4> -->

                <tr class="">

                    <th>Sr No</th>

                    <th>Year</th>

                    <th>Center Name</th>

                    <th>Name</th>

                    <th> Contact Number</th>

                    <th>Amount</th>





                </tr>

            </thead>

            <tbody>

                <?php

                $center_total_amount = 0;

                if (!empty($total_collection_center)) {

                    $i = 1;

                    foreach ($total_collection_center as $total_collection_center_result) {

                        $center_total_amount += $total_collection_center_result->amount;

                ?>

                        <tr>

                            <td><?= $i ?></td>

                            <td><?= date("Y", strtotime($total_collection_center_result->payment_date)); ?></td>

                            <td><?= $total_collection_center_result->center_name ?></td>

                            <td><?= $total_collection_center_result->contact_person_name ?></td>

                            <td><?= $total_collection_center_result->contact_person_contact ?></td>

                            <td><?= $total_collection_center_result->amount ?></td>





                        </tr>

                    <?php $i++;
                    }
                } else { ?>

                    <tr>

                        <td class="text-center" colspan="6">No Data Available</td>

                    </tr>

                <?php } ?>

            </tbody>

            <tfoot>

                <tr>

                    <td></td>

                    <td></td>

                    <td></td>



                    <td class="bold_table_text"></td>

                    <td class="bold_table_text">Total</td>

                    <td class="bold_table_text"><?= $center_total_amount ?></td>

                </tr>

            </tfoot>





        </table>

                        </div>

                    </div>

                </div>



            </div>
<!-- 2 -->
            <div class="row">

<div class="col-md-12 grid-margin stretch-card">

    <div class="card">

        <div class="card-body">

            <h4 class="card-title">Student Data</h4>

            <table id="student_examples" style="width:100%" class="table table_account table-striped datatable_parent">

            <thead class="">

    <!-- <h4 class="statement_title title_padding">Student Data</h4> -->

                <tr class="">

                    <th>Sr No</th>

                    <th>Year</th>

                    <th>Payment For</th>

                    <th>Center AMT</th>

                    <th>BTU AMT</th>

                    <th>Total AMT</th>





                </tr>

            </thead>

            <tbody>

                <?php

                $center_amount_total = 0;

                $total_fees_btu = 0;

                $grand_amount = 0;

                if (!empty($student_account_total)) {

                    $i = 1;

                    foreach ($student_account_total as $student_account_result) {

                        //echo "<pre>";print_r($student_account_result);

                        if ($student_account_result['total_amount'] != "") {

                ?>

                            <tr>

                                <td class="center"><?= $i ?></td>

                                <td><?= $student_account_result['year'] ?></td>

                                <td><?= $student_account_result['fees_type'] ?></td>

                                <td><?= $student_account_result['center_amount'] ?></td>

                                <td><?= $student_account_result['btu_fees'] ?></td>

                                <td><?= $student_account_result['total_amount'] ?></td>





                            </tr>

                    <?php

                            $center_amount_total += $student_account_result['center_amount'];

                            $total_fees_btu += $student_account_result['btu_fees'];

                            $grand_amount += $student_account_result['total_amount'];

                            $i++;
                        }
                    }
                } else { ?>

                    <tr>

                        <td class="text-center" colspan="7">No Data Available</td>

                    </tr>

                <?php } ?>

            <tfoot>

                <tr>

                    <td></td>

                    <td></td>

                    <td class="bold_table_text">Total</td>

                    <td class="bold_table_text"><?= $center_amount_total ?></td>

                    <td class="bold_table_text"><?= $total_fees_btu ?></td>

                    <td class="bold_table_text"><?= $grand_amount ?></td>

                </tr>

            </tfoot>

            </tbody>

        </table>

        </div>

    </div>

</div>



</div>

<!-- 3 -->
<div class="row">

<div class="col-md-12 grid-margin stretch-card">

    <div class="card">

        <div class="card-body">

            <h4 class="card-title">Separate Student Data</h4>

            <table id="separate_student_examples" style="width:100%" class="table table_account table-striped datatable_parent">

            <thead class="">

                <!-- <h4 class="statement_title title_padding">Separate Student Data</h4> -->

                <tr class="">

                    <th>Sr No</th>

                    <th>Year</th>

                    <th>Payment Type</th>

                    <th>Center AMT</th>

                    <th>BTU AMT</th>

                    <th>Total AMT</th>

                </tr>

            </thead>

            <tbody>

                <?php



                $sep_center_amount_total = 0;

                $sep_total_fees_btu = 0;

                $sep_grand_amount = 0;

                if (!empty($separate_student_account_total)) {

                    $i = 1;
                    foreach ($separate_student_account_total as $seperate_student_account_result) {

                        if ($seperate_student_account_result['total_amount'] != "") {

                ?>

                            <tr>

                                <td class="center"><?= $i ?></td>

                                <td><?= $seperate_student_account_result['year'] ?></td>

                                <td><?= $seperate_student_account_result['fees_type'] ?></td>

                                <td><?= $seperate_student_account_result['center_amount'] ?></td>

                                <td><?= $seperate_student_account_result['btu_fees'] ?></td>

                                <td><?= $seperate_student_account_result['total_amount'] ?></td>





                            </tr>

                    <?php

                            $sep_center_amount_total += $seperate_student_account_result['center_amount'];

                            $sep_total_fees_btu += $seperate_student_account_result['btu_fees'];

                            $sep_grand_amount += $seperate_student_account_result['total_amount'];

                            $i++;
                        }
                    }
                } else { ?>

                    <tr>

                        <td class="text-center" colspan="7">No Data Available</td>

                    </tr>

                <?php } ?>

            <tfoot>

                <tr>

                    <td></td>

                    <td></td>

                    <td class="bold_table_text">Total</td>

                    <td class="bold_table_text"><?= $sep_center_amount_total ?></td>

                    <td class="bold_table_text"><?= $sep_total_fees_btu ?></td>

                    <td class="bold_table_text"><?= $sep_grand_amount ?></td>

                </tr>



                </tbody>

                <tfoot>

                    <tr>

                        <td></td>

                        <td></td>

                        <td></td>

                        <td class="bold_table_text">Total</td>

                        <td class="bold_table_text"><?= $center_amount_total_seprate ?></td>

                        <td class="bold_table_text"><?= $total_fees_btu_seperate ?></td>

                        <td class="bold_table_text"><?= $grand_amount_separate ?></td>





                    </tr>



                </tfoot>

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

                    messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',

                    exportOptions: {

                        columns: [0, 1, 2, 3, 4, 5, ],

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

    });
</script>

<script>
    $(document).ready(function() {

        var table = $('#student_examples').DataTable({

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

                    title: 'Data in Table Format (Student)',

                    messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',

                    exportOptions: {

                        columns: [0, 1, 2, 3, 4, 5, ],

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

    });
</script>

<script>
    $(document).ready(function() {

        var table = $('#separate_student_examples').DataTable({

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

                    title: 'Data in Table Format (Separate Student)',

                    messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',

                    exportOptions: {

                        columns: [0, 1, 2, 3, 4, 5, 6],

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

    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>

<script>
    var ctx = document.getElementById("myChart_bar").getContext('2d');



    <?php

    $years = array('2020', '2021', '2022');

    ?>



    var myChart_bar = new Chart(ctx, {

        type: 'bar',



        data: {

            labels: [<?php

                        for ($d = 0; $d < count($years); $d++) {



                            $day = '202' . $d;

                            $year = $day;

                            echo $year . ',';
                        }

                        ?>],

            datalabels: {

                display: false,

            },



            datasets: [{

                label: 'Center Payment',

                data: [<?php

                        for ($d = 0; $d < count($years); $d++) {



                            $year = '202' . $d;



                            $result = $this->Account_model->get_date_wise_center_total_collection($year);

                            echo $result . ",";
                        }

                        ?>],



                backgroundColor: "rgba(68,114,196,1)"

            }, {
                label: 'Student Payment',

                data: [<?php

                        for ($d = 0; $d < count($years); $d++) {
                            if (!empty($student_account_total)) {
                                $i = 1;
                                $total = 0;
                                foreach ($student_account_total as $student_account_result) {

                                    //echo "<pre>";print_r($student_account_result);

                                    if ($student_account_result['total_amount'] != "" && $student_account_result['year'] == $years[$i]) {

                                        $total += $student_account_result['total_amount'] . ",";

                                        $i++;
                                    }

                                    echo $total . ",";
                                }
                            }
                        } ?>],

                backgroundColor: "rgba(255,74,18,1)"

            }, {

                label: 'Separate Student Payment',

                data: [<?php

                        if (!empty($separate_student_account_total)) {

                            $i = 1;

                            foreach ($separate_student_account_total as $seperate_student_account_result) {

                                if ($seperate_student_account_result['total_amount'] != "") {



                                    echo $seperate_student_account_result['total_amount'] . ",";
                                }
                            }
                        }

                        ?>],

                backgroundColor: "rgba(254,744,18,1)"

            }]

        }



    });
</script>