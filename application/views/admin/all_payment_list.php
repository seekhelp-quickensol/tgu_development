<?php include('header.php');
$center_amount_total=0;
$total_fees_btu=0;
$grand_amount=0;
?>

<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  
                <h4>Day Wise Payment</h4> 
                
                <form method="get">
                         <div class="row">
					        <div class="col-md-6">
						        <div class="form-group">
                                    <input type="text" placeholder="Select Date for filter records" name="date" id="date" class="form-control datepicker">
                                </div>
                            </div>
                    <input style="height:48px;" type="submit" name="search" class="btn btn-primary" value="Search">
                    </form>
        <table id="student_table" style="width:100%" class="table table_account table-striped datatable_parent">
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
                    <th>BTU AMT</th>
                    <th>Total AMT</th> 
                </tr>
            </thead>
            <tbody>
                 <?php  if(!empty($monthly_account_student)){
                $i= 1;
                $total_amount_student=0;
            foreach($monthly_account_student as $monthly_account_student_result ){
              
                $monthly_account_student_result->student_id;
                $total_amount_student += $monthly_account_student_result->amount;
            ?>
                <tr>
                    <td class="center"><?=$i?></td>
                    <td><?=date("d/m/Y",strtotime($monthly_account_student_result->payment_date));?></td>
                    <td>
                    <?php if ($monthly_account_student_result->fees_type == '1'){
                    echo "Admission Fees";
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

                <?php if ($monthly_account_student_result->fees_type == '1' || $monthly_account_student_result->fees_type == '4'){
                    $exp = $this->Account_model->get_original_amount($monthly_account_student_result->student_id);
                    if(!empty( $exp)){
                        $exp = explode('@@@',$exp);
                        $original_amount = $exp[1];
                        $actual_amount = (int) $monthly_account_student_result->lateral_entry_fees + (int)$original_amount;
                        $exp=$exp[0];
                    }else{
                        $exp=0;
                    }

                    $total_fees = isset($monthly_account_student_result->total_fees) ? (int)$monthly_account_student_result->total_fees : 0;
                    if($monthly_account_student_result->center_id == 1){
                        $total_fees = $total_fees;
                        $center_amount = 0;     
                        $total_amount =$total_fees;
                    }else{
                        $total_fees = $total_fees;
						$minus_fee = intval($total_fees) - intval($monthly_account_student_result->lateral_entry_fees);
                        $center_amount = $exp;     
						if($monthly_account_student_result->enrollment_number == 201009103251690){
							 
						}
                        $total_amount = $exp+$total_fees;
                    }
                    
					}else{
						 $total_fees = $total_fees;
						 $center_amount = 0;
						 $total_amount = $total_fees;
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

        <br>
       <?php /* <h4 class="statement_title title_padding">Seperate Student All Payment List</h4>
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
                <?php  if(!empty($monthly_account_separate_student)){
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
    */?>
    </div>
</section>
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
                    title: 'All Student Payment List',
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
                    title: 'All Payment Separate Student',
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
    $( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
});
</script>