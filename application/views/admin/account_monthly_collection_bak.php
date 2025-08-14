<?php include('header.php');
// error_reporting('e_all');
?>

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Monthly Collection: Student & Center</h4>

                            <div class="chart-container">
                                <canvas id="myChart_bar"></canvas>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Center Data</h4>
                        <table 
            style="width:100%"
            id="example"
            class="table table_account table-striped datatable_parent">
            <thead class="">
                <!-- <h4 class="statement_title title_padding">Center Data</h4> -->
                <tr class="">
                    <th >Sr No</th>
                    <th>Date</th>
                    <th>Center Name</th>
                    <th>Name</th>
                    <th>
                        Contact Number</th>
                    <th>Transaction ID</th>
                    <th>Amount
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $total_amount = 0;
             if(!empty($mothly_account_center)){
                $i=1;
               
                foreach($mothly_account_center as $mothly_account_center_result){
                    $total_amount  += $mothly_account_center_result->amount;
                   //echo $mothly_account_center_result->center_id;
                    ?>
                <tr>
                    <td class="center"><?=$i?></td>

                    <td><?=date("d-m-Y",strtotime($mothly_account_center_result->payment_date));?></td>
                    <td>
                        <a target="_blank" href="<?=base_url();?>center_account_details/<?=$mothly_account_center_result->center_id;?>"><?=$mothly_account_center_result->center_name?></a>
                    </td>
                    <td><?=$mothly_account_center_result->contact_person_name?></td>
                    <td><?=$mothly_account_center_result->contact_person_contact?></td>
                    <td><?=$mothly_account_center_result->transaction_no?></td>
                    <td><?=$mothly_account_center_result->amount?>
                    </td>

                </tr>
            <?php $i++; }} else{ ?>
                <tr>
                    <td class="text-center" colspan="7">No Data Available</td>
                </tr>
                <?php } ?>
                <tfoot>
                    <tr>
                        <td></td>
                        <td ></td>
                        <td></td>
                        <td class="bold_table_text"></td>
                        <td class="bold_table_text"></td>
                        <td class="bold_table_text ">Total</td>
                        <td class="bold_table_text text-center"><?=$total_amount?></td>
                    </tr>
                </tfoot>
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
                        <h4 class="card-title">Student Data</h4>
                        <table
            id="student_table"
            style="width:100%"
            class="table table_account table-striped datatable_parent">
            <thead class="">
                <!-- <h4 class="statement_title title_padding">Student Data</h4> -->
                <tr class="">
                    <th >Sr No</th>
                    <th>Date</th>
                    <th>Payment Type</th>
                    <th>Name</th>
                    <th>Enrollment Number</th>
                    <th>Contact</th>
                    <th>Transaction ID</th>
                    <th>Center AMT</th>
                    <th>
                        BTU AMT</th>
                    <th>Total AMT
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php 
                $total_amount_student = 0;
                 $grand_amount = 0;
                  $center_amount_total = 0;
                  $total_fees_btu = 0;
                if(!empty($monthly_account_student)){
                $i= 1;
            foreach($monthly_account_student as $monthly_account_student_result ){
              
                $monthly_account_student_result->student_id;
                $total_amount_student += $monthly_account_student_result->amount;
            ?>
                <tr>
                    <td class="center"><?=$i?></td>
                    <td><?=date("d-m-Y",strtotime($monthly_account_student_result->payment_date));?></td>
                    <td>
                    <?php if ($monthly_account_student_result->fees_type == '1'){
                    echo "Admission Fess";
                }elseif($monthly_account_student_result->fees_type == '4'){
                    echo "RE-registration Fees";
                }elseif($monthly_account_student_result->fees_type == '2'){
                    echo "Examination Fees";
                }              
                elseif($monthly_account_student_result->fees_type == 'migration'){
                    echo "Migration Fees";
                }elseif($monthly_account_student_result->fees_type =='provisinal'){
                  echo "Provisional Fees";
                }elseif($monthly_account_student_result->fees_type == 'transfer'){
                    echo "Transfer Fees";
                }elseif($monthly_account_student_result->fees_type == 'Degree'){
                    echo "Degree Fees";
                }elseif($monthly_account_student_result->fees_type == 'transcript'){
                    echo "Transcript Fees";
                }
                    ?>

                    </td>
                    <td>
                        <a
                            target="_blank"
                            href="<?=base_url();?>student_account_statement/<?=$monthly_account_student_result->student_id?>"><?=$monthly_account_student_result->student_name?></a>
                    </td>
                    <td ><?=$monthly_account_student_result->enrollment_number?></td>
                    <td><?=$monthly_account_student_result->mobile?></td>
                    <td><?=$monthly_account_student_result->transaction_id?></td>

                <?php 
                
                if ($monthly_account_student_result->fees_type == '1' || $monthly_account_student_result->fees_type == '4'){
                    $exp = $this->Account_model->get_original_amount($monthly_account_student_result->student_id);
                    if(!empty($exp)){
                        $exp = explode('@@@',$exp);
                        $original_amount = $exp[1];
                    }else{
                        $original_amount = 0;
                    }
                    $actual_amount = (int) $monthly_account_student_result->lateral_entry_fees + (int)$original_amount;
                    if(!empty($yearly_account_student_result) && $yearly_account_student_result->center_id == 1){
                            $total_fees = $monthly_account_student_result->total_fees;
                            $center_amount = 0;     
                            $total_amount = $original_amount+$monthly_account_student_result->lateral_entry_fees;
                        }else{
                            $total_fees = $monthly_account_student_result->total_fees;
							$minus_fee = $monthly_account_student_result->total_fees-$monthly_account_student_result->lateral_entry_fees;
                            $center_amount = $original_amount-$minus_fee;     
							if($monthly_account_student_result->enrollment_number == 201009103251690){
								 
							}
                            $total_amount = $original_amount+$monthly_account_student_result->lateral_entry_fees;
                        }
                        
					}else{
						 $total_fees = $monthly_account_student_result->amount;
						 $center_amount = 0;
						 $total_amount = $monthly_account_student_result->amount;
					}
                
                    ?>
                    <td><?=$center_amount?></td>
                    <td><?=$total_fees;?></td>
                    <td><?=$total_amount?></td>

                </tr>
            <?php $center_amount_total += $center_amount;
            $total_fees_btu += $total_fees; 
            $grand_amount += $total_amount; 
            $i++;  }}else{ ?>
                <tr>
                    <td class="text-center" colspan="10">No Data Available</td>
                </tr>
                <?php } ?>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td ></td>
                        <td></td>
                        <td class="bold_table_text text-center">Total</td>
                        <td class="bold_table_text text-center"><?=$center_amount_total?></td>
                        <td class="bold_table_text text-center"><?=$total_fees_btu?></td>
                        <td class="bold_table_text text-center"><?=$grand_amount?></td>

                    </tr>
                </tfoot>

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
                        <h4 class="card-title">Seperate Student Data</h4>
                        <table
            id="separate_student_table"
            class="table table_account table-striped datatable_parent" 
            style="width:100%">
            <thead class="">

                <tr class="">
                    <th >Sr No</th>
                    <th>Date</th>
                    <th>Payment Type</th>
                    <th>Name</th>
                    <th>Enrollment Number</th>
                    <th>Contact</th>
                    <th>Transaction ID</th>
                    <th>Center AMT</th>
                    <th>
                        BTU AMT</th>
                    <th>Total AMT
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $center_amount_total_seperate = 0;
                $total_fees_btu_seperate = 0;
                $grand_amount_seperate = 0;
                if(!empty($monthly_account_separate_student)){
                $i= 1;
            foreach($monthly_account_separate_student as $monthly_account_separate_student_result ){
            $monthly_account_separate_student_result->student_id;
                $total_amount_student += $monthly_account_separate_student_result->amount;
            ?>
                <tr>
                    <td class="center"><?=$i?></td>
                    <td><?=date("d-m-Y",strtotime($monthly_account_separate_student_result->created_on));?></td>
                    <td>
                    <?php if ($monthly_account_separate_student_result->fees_type == 'admission'){
                    echo "Admission";
                }elseif($monthly_account_separate_student_result->fees_type == 'migration'){
                    echo "Migration Fees";
                }elseif($monthly_account_separate_student_result->fees_type =='provisinal'){
                  echo "Provisional Fees";
                }elseif($monthly_account_separate_student_result->fees_type == 'transfer'){
                    echo "Transfer Fees";
                }elseif($monthly_account_separate_student_result->fees_type == 'Degree'){
                    echo "Degree Fees";
                }elseif($monthly_account_separate_student_result->fees_type == 'transcript'){
                    echo "Transcript Fees";
                }
                    ?>

                    </td>
                    <td>
                        <a
                            target="_blank"
                            href="<?=base_url();?>seperate_student_account_statement/<?=$monthly_account_separate_student_result->student_id?>"><?=$monthly_account_separate_student_result->student_name?></a>
                    </td>
                    <td ><?=$monthly_account_separate_student_result->enrollment_number?></td>
                    <td><?=$monthly_account_separate_student_result->mobile?></td>
                    <td><?=$monthly_account_separate_student_result->transaction_id?></td>

                    <?php 
                   $total_fees_seperate = $monthly_account_separate_student_result->amount;
                     $center_amount_seperate = 0;
                  $total_amount_seperate = $monthly_account_separate_student_result->amount;
               
                    ?>
                    <td><?=$center_amount_seperate?></td>
                    <td><?=$total_fees_seperate?></td>
                    <td><?=$total_amount_seperate?></td>

                </tr>
            <?php $center_amount_total_seperate += $center_amount_seperate;
            $total_fees_btu_seperate += $total_fees_seperate; 
            $grand_amount_seperate += $total_amount_seperate; 
            $i++;  }} else{ ?>
                <tr>
                    <td class="text-center" colspan="10">No Data Available</td>
                </tr>
                <?php } ?>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td ></td>
                        <td></td>
                        <td class="bold_table_text text-center">Total</td>
                        <td class="bold_table_text text-center"><?=$center_amount_total_seperate?></td>
                        <td class="bold_table_text text-center"><?=$total_fees_btu_seperate?></td>
                        <td class="bold_table_text text-center"><?=$grand_amount_seperate?></td>

                    </tr>

                </tfooot>
            </tbody>
        </table>

                        </div>
                    </div>
                </div>

            </div>

            
        </div>
    </div>

</div>




<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<script>
    var ctx = document
        .getElementById("myChart_bar")
        .getContext('2d');

    var myChart_bar = new Chart(ctx, {
        type: 'bar',

        <?php 
$date = new DateTime('last day of this month');
$numDaysOfCurrentMonth = $date->format('d');
        ?>

        data: {
            labels: [<?php 
        for($d=1;$d<=$numDaysOfCurrentMonth;$d++){
            $day='';
            if(strlen($d) == 1){
                $day = '0'.$d;
            }else{
                $day = $d;
            }
                 $date = $day;
                 echo $date.',';
            }
        ?>],

            datalabels: {
                display: false
            },

            datasets: [
                {
                    label: 'Center Payment',
                    data: [<?php  
                    for($d=1;$d<=$numDaysOfCurrentMonth;$d++){
                        $day='';
                        if(strlen($d) == 1){
                            $day = '0'.$d;
                        }else{
                            $day = $d;
                        } 
                        $result =  $this->Account_model->get_date_wise_center($day); 
                        echo $result.",";
                    }
                    ?>],
                    backgroundColor: "rgba(68,114,196,1)"
                }, {
                    label: 'Student Payment',
                    data: [<?php  
                    for($d=1;$d<=$numDaysOfCurrentMonth;$d++){
                        $day='';
                        if(strlen($d) == 1){
                            $day = '0'.$d;
                        }else{
                            $day = $d;
                        } 
                        $result =  $this->Account_model->get_date_wise_student_amount($day); 
                        echo $result.",";
                    }
                    ?>],
                    backgroundColor: "rgba(255,74,18,1)"
                }, {
                    label: 'Separate Student Payment',
                    data: [<?php  
                    for($d=1;$d<=$numDaysOfCurrentMonth;$d++){
                        $day='';
                        if(strlen($d) == 1){
                            $day = '0'.$d;
                        }else{
                            $day = $d;
                        } 
                        $result =  $this->Account_model->get_date_wise_separate_student_amount($day); 
                        echo $result.",";
                    }
                    ?>],
                    backgroundColor: "rgba(254,744,18,1)"
                }
            ]
        }

    });
</script>
<script>
    $(document).ready(function () {
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
                        columns: [
                            0,
                            1,
                            2,
                            3,
                            4,
                            5,
                            6
                        ],
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        }
                    }
                }
            ],
            dom: "Bfrtip",

            "complete": function () {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
    });
</script>
<script>
    $(document).ready(function () {

        var table = $('#student_table').DataTable({
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
                    messageBottom: 'The information in this table is copyright to the global University.',
                    exportOptions: {
                        columns: [
                            0,
                            1,
                            2,
                            3,
                            4,
                            5,
                            6,
                            7,
                            8,
                            9
                        ],
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        }
                    }
                }
            ],
            dom: "Bfrtip",

            "complete": function () {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
    });
</script>
<script>
    $(document).ready(function () {
        var table = $('#separate_student_table').DataTable({
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
                    title: 'Data in Table Format (Seperate Student)',
                    messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
                    exportOptions: {
                        columns: [
                            0,
                            1,
                            2,
                            3,
                            4,
                            5,
                            6,
                            7,
                            8,
                            9
                        ],
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        }
                    }
                }
            ],
            dom: "Bfrtip",

            "complete": function () {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
    });
</script>