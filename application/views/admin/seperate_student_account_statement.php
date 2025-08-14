<?php include('header.php');?>


<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="statement_title">Name :<?php if(!empty($single_separete_student)){ echo $single_separete_student->student_name;}?> </h4>

                            <h4 class="statement_title"> Enrollment Number: <?php if(!empty($single_separete_student)){ echo $single_separete_student->enrollment_number;}?> </h4>
                    
                        <table id="example" class="table table_account table-striped" style="width:100%">
                                <thead class="">
                                    <tr class="bg-theme">
                                        <th >Sr No</th>
                                        <th>Date</th>
                                        <th>Payment Type</th>
                                        <th>Transaction ID</th>
                                        <th>Center AMT</th>
                                        <th> BTU AMT</th>
                                        <th>Total AMT </th>
                                    

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  if(!empty($seperate_student_account)){
                                    $i = 1;
                                    foreach($seperate_student_account as $seperate_student_account_result){
                                    ?>
                                    <tr>
                                        <td class="center"><?=$i?></td>
                                        <td><?=date("d-m-Y",strtotime($seperate_student_account_result->created_on));?></td>
                                        <td>
                                        <?php if ($seperate_student_account_result->fees_type == 'admission'){
                                            echo "Admission";
                                        }elseif($seperate_student_account_result->fees_type == 'migration'){
                                            echo "Migration Fees";
                                        }elseif($seperate_student_account_result->fees_type =='provisinal'){
                                        echo "Provisional Fees";
                                        }elseif($seperate_student_account_result->fees_type == 'transfer'){
                                            echo "Transfer Fees";
                                        }elseif($seperate_student_account_result->fees_type == 'Degree'){
                                            echo "Degree Fees";
                                        }elseif($seperate_student_account_result->fees_type == 'transcript'){
                                            echo "Transcript Fees";
                                        }
                                            ?>

                                        </td>
                                        <td><?=$seperate_student_account_result->transaction_id?></td>

                                        <?php 
                            $total_fees = $seperate_student_account_result->amount;
                            $center_amount = 0;
                            $total_amount = $seperate_student_account_result->amount;

                        ?>

                                        <td><?=$center_amount?></td>
                                        <td><?=$total_fees?></td>
                                        <td><?=$total_amount?></td>

                                
                                    </tr>
                                    </tbody>
                                    <?php $center_amount_total += $center_amount;
                                    $total_fees_btu += $total_fees; 
                                    $grand_amount += $total_amount; 
                                    $i++;  }}else{ ?>
                                        <tr>
                                            <td class="text-center" colspan= "7">No Data Available</td>
                                        </tr>
                                        <?php } ?>
                                        <tfoot>
                                    <tr>
                                            <td ></td>
                                            <td ></td>
                                        <td></td>
                                        <td class="bold_table_text">Total</td>
                                        <td class="bold_table_text"><?=$center_amount_total?></td>
                                        <td class="bold_table_text"><?=$total_fees_btu?></td>
                                        <td  class="bold_table_text"><?=$grand_amount?></td>
                                        
                                
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
<?php include('footer.php');?>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
            "lengthChange": false,
            "processing": true,
            "serverSide": false,
            "responsive": true,
            "cache": false,
            "order": [[0, "asc" ]],
            buttons:[
                
                {
                    extend: "excelHtml5",
                    title: 'Data in Table Format (Separate Student)',
                    messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6],
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        },
                    },
                    
                }
            ],
            dom:"Bfrtip",
            
            
            "complete": function() {
                $('[data-toggle="tooltip"]').tooltip();			
            },
        });
} );

 </script>