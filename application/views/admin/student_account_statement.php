<?php include('header.php');

// echo "<pre>";
// print_r($student_account);

?>





<div class="container-fluid page-body-wrapper">

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="statement_title">Name : <?php if (!empty($single_student)) {
                                                                    echo $single_student->student_name;
                                                                } ?> </h4>

                            <h4 class="statement_title">Enrollment Number : <?php if (!empty($single_student)) {
                                                                                echo $single_student->enrollment_number;
                                                                            } ?> </h4>

                            <h4 class="statement_title">Center Name : <?php if (!empty($single_student)) {
                                                                            echo $single_student->center_name;
                                                                        } ?> </h4>

                            <table id="example" class="table table_account table-striped datatable_parent" style="width:100%">

                                <thead class="">

                                    <tr class="">

                                        <th>Sr No</th>

                                        <th>Date</th>

                                        <th>Payment Type</th>

                                        <th class="text-center">Transaction ID</th>

                                        <th class="text-center">Center AMT</th>

                                        <th class="text-center"> BTU AMT</th>

                                        <th class="text-center"> Total AMT </th>





                                    </tr>

                                </thead>

                                <tbody>

                                    <?php if (!empty($student_account)) {

                                        $i = 1;
                                        $center_amount_total=0;
                                        $total_fees_btu=0;
                                        $grand_amount=0;
                                        foreach ($student_account as $student_account_result) {

                                    ?>

                                            <tr>

                                                <td class="center"><?= $i ?></td>

                                                <td><?= date("d-m-Y", strtotime($student_account_result->created_on)); ?></td>

                                                <td>

                                                    <?php if ($student_account_result->fees_type == '1') {

                                                        echo "Admission";
                                                    } elseif ($student_account_result->fees_type == '4') {

                                                        echo "RE-registration fees";
                                                    } elseif ($student_account_result->fees_type == '2') {

                                                        echo "Examination Fees";
                                                    } elseif ($student_account_result->fees_type == 'migration') {

                                                        echo "Migration Fees";
                                                    } elseif ($student_account_result->fees_type == 'provisinal') {

                                                        echo "Provisional Fees";
                                                    } elseif ($student_account_result->fees_type == 'transfer') {

                                                        echo "Transfer Fees";
                                                    } elseif ($student_account_result->fees_type == 'Degree') {

                                                        echo "Degree Fees";
                                                    } elseif ($student_account_result->fees_type == 'transcript') {

                                                        echo "Transcript Fees";
                                                    }

                                                    ?>



                                                </td>

                                                <td class="text-center"><?= $student_account_result->transaction_id ?></td>

                                                <?php if ($student_account_result->fees_type == '1' || $student_account_result->fees_type == '4') {

                                                    $exp = $this->Account_model->get_original_amount($student_account_result->student_id);
                                                    if(!empty($exp)){
                                                        $exp = explode('@@@', $exp);
                                                        $original_amount = $exp[1];
                                                        $actual_amount = (int) $student_account_result->lateral_entry_fees + (int)$original_amount;
                                                        $exp=$exp[0];
                                                    }else{
                                                        $exp=0;
                                                    }

                                                    $total_fees = isset($student_account_result->total_fees) ? (int)$student_account_result->total_fees : 0;

                                                    if ($student_account_result->center_id == 1) {

                                                        //$total_fees = $original_amount+$student_account_result->lateral_entry_fees;

                                                        $total_fees = $total_fees;

                                                        $center_amount = 0;

                                                        $total_amount = $total_fees;
                                                    } else {

                                                        $total_fees = $total_fees;

                                                        $center_amount = $exp;

                                                        $total_amount =  $total_fees + $exp;
                                                    }
                                                } else {

                                                    $total_fees =  $total_fees;

                                                    $center_amount = 0;

                                                    $total_amount = $total_fees;
                                                }

                                                ?>

                                                <td class="text-center"><?= $center_amount ?></td>

                                                <td class="text-center"><?= $total_fees ?></td>

                                                <td class="text-center"><?= $total_amount ?></td>

                                            </tr>

                                        <?php 
                                            $center_amount_total += $center_amount;

                                            $total_fees_btu += $total_fees;

                                            $grand_amount += $total_amount;

                                            $i++;
                                        }
                                    } else { ?>

                                        <tr>

                                            <td class="text-center" colspan="7">No Data Available</td>

                                        </tr>

                                    <?php } ?>
                                </tbody>

                                <tfoot>

                                    <tr>

                                        <td></td>

                                        <td></td>

                                        <td></td>

                                        <td class="bold_table_text text-center">Total</td>

                                        <td class="bold_table_text text-center"><?= $center_amount_total ?></td>

                                        <td class="bold_table_text text-center"><?= $total_fees_btu ?></td>

                                        <td class="bold_table_text text-center"><?= $grand_amount ?></td>

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

<section>

    <div class="container-fluid  table-responsive-sm">



    </div>

</section>



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