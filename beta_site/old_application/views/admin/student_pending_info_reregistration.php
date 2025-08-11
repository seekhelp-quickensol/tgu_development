<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="statement_title">Name :<?php if(!empty($student)){ echo $student->student_name;}?></h4>

                            <h4 class="statement_title">Center Name :<?php if(!empty($student)){ echo $student->center_name;}?>
                            </h4>
                            <table
                                id="example"
                                class="table table_account table-striped"
                                style="width:100%">
                                <thead class="">
                                    <h4 class="statement_title title_padding">Data in Table Format (Student Pending Re-registration)</h4>
                                    <tr class="bg-theme">
                                        <th >Sr No</th>
                                        <th>Date</th>
                                        <th>Transaction ID</th>
                                        <th>Center AMT</th>
                                        <th>BTU AMT</th>
                                        <th>Total AMT</th>
                                    </tr>
                                </thead>
                                <?php 
             if (!empty($student_reregistration)){
            $i = 1;
        foreach ($student_reregistration as $student_reregistration_result){
                
                ?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=date("d-m-Y",strtotime($student_reregistration_result->date));?></td>
                                    <td><?=$student_reregistration_result->transaction_id?></td>
                                <?php if(!empty($student_reregistration_result)){
                $amount_reregistration = $this->Account_model->get_center_share_reregistration($student_reregistration_result->id,$student_reregistration_result->session_id,$student_reregistration_result->course_id,$student_reregistration_result->stream_id);
                $center_share = $this->Account_model->get_center_share($student_reregistration_result->stud_id);
            
              if(empty($center_share->fee_share)){
                 $btu_fees = $amount_reregistration->fees;
                 $center_fees = 0;
                 $totol_amount = $btu_fees;
                 if($student_reregistration_result->country != '101'){
                     $btu_fees = 2* $amount_reregistration->fees;
                     $totol_amount = $btu_fees;
                 }
              }else{
                  
                $amount = $amount_reregistration->fees;  
                $share_fees = $center_share->fee_share;
                $center_fees =  ($share_fees/100)*$amount;
                $btu_fees = $amount - $center_fees;             
                $totol_amount = $btu_fees+$center_fees;
                if($student_reregistration_result->country != '101'){   
                $share_fees = $center_share->fee_share;
                $center_fees = (($share_fees/100)*$amount);
                $btu_fees = ($amount - $center_fees); 
                $center_fees =2*$center_fees;
                $btu_fees = 2*$btu_fees;            
                $totol_amount = $btu_fees+$center_fees;
                }
              }
                
            }
               ?>
                                    <td><?=$center_fees?></td>

                                    <td><?=$btu_fees?></td>
                                    <td><?=$totol_amount?></td>

                                </tr>
                            </tbody>

                        <?php 
                    $totol_btu_fees += $btu_fees;
                    $total_center_fees += $center_fees;
                    $totol_amount_fees += $totol_amount;
                    } }else{ ?>
                                                <tr>
                                <td class="text-center" colspan="6">No Data Available</td>
                            </tr>
                            <?php } ?>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td><?=$total_center_fees?></td>
                                    <td><?=$totol_btu_fees?></td>
                                    <td><?=$totol_amount_fees?></td>
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
<div class="container-fluid  table-responsive-sm"></div>
</section>
</div>
<?php include('footer.php');?>
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
            title: 'Data in Table Format (Student)',
            messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
            exportOptions: {
                columns: [
                    0,
                    1,
                    2,
                    3,
                    4,
                    5
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