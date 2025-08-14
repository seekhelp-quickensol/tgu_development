<?php include('header.php');?>


<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="statement_title">Name : <?php if(!empty($single_student)){echo $single_student->student_name;}?> </h4>
                            <h4 class="statement_title">Enrollment Number  : <?php if(!empty($single_student)){echo $single_student->enrollment_number;}?> </h4>
                            <h4 class="statement_title">Center Name  : <?php if(!empty($single_student)){echo $single_student->center_name;}?> </h4>
                    
             <table id="example" style="width:100%;" class="table table_account datatable_parent table-striped">
        <thead class="">
            <tr>
                <th >Sr No</th>
				<th>Month</th>
                <th>Payment Type</th>
                
       		    <th>Transaction ID</th>
                <th>Center AMT</th>
                <th> BTU AMT</th>
                <th>Total AMT </th>
               

            </tr>
        </thead>
        <tbody>
            <?php if(!empty($student_account)){
            $i = 1;
            foreach($student_account as $student_account_result){
            ?>
            <tr>
                <td class="center"><?=$i?></td>
                <?php 
               $month = date("m",strtotime($student_account_result->created_on));
               $monthName = date('F', mktime(0, 0, 0, $month, 10));
               ?>
                <td><?=$monthName?></td>
       
                <td>
                <?php if ($student_account_result->fees_type == '1'){
                    echo "Admission Fees";
                }elseif($student_account_result->fees_type == '4'){
                    echo "RE-registration Fees";
                }elseif($student_account_result->fees_type == '2'){
                    echo "Examination Fees";
                }elseif($student_account_result->fees_type == 'migration'){
                    echo "Migration Fees";
                }elseif($student_account_result->fees_type =='provisinal'){
                  echo "Provisional Fees";
                }elseif($student_account_result->fees_type == 'transfer'){
                    echo "Transfer Fees";
                }elseif($student_account_result->fees_type == 'Degree'){
                    echo "Degree Fees";
                }elseif($student_account_result->fees_type == 'transcript'){
                    echo "Transcript Fees";
                }
                    ?>

                </td>
                <td><?=$student_account_result->transaction_id?></td>

                <?php if ($student_account_result->fees_type == '1' || $student_account_result->fees_type == '4'){
						$exp = $this->Account_model->get_original_amount($student_account_result->student_id);
						$exp = explode('@@@',$exp);
						$original_amount = $exp[1];
						$actual_amount = (int) $student_account_result->lateral_entry_fees + (int)$original_amount;
						if($yearly_account_student_result->center_id == 1){
								$total_fees = $original_amount+$student_account_result->lateral_entry_fees;
								$center_amount = 0;     
								$total_amount = $original_amount+$student_account_result->lateral_entry_fees;
							}else{
								$total_fees = $original_amount-$exp[0]+$student_account_result->lateral_entry_fees;
								$center_amount = $exp[0];     
								$total_amount = $original_amount+$student_account_result->lateral_entry_fees;
							}
							
					   }else{
						 $total_fees = $student_account_result->amount+$student_account_result->lateral_entry_fees;
						 $center_amount = 0;
						 $total_amount = $student_account_result->amount+$student_account_result->lateral_entry_fees;
					}
        
					 
?>
                <td><?=$center_amount?></td>
                <td><?=$total_fees?></td>
                <td><?=$total_amount?></td>

        
            </tr>
            <?php $center_amount_total += $center_amount;
            $total_fees_btu += $total_fees; 
            $grand_amount += $total_amount; 
            $i++;  }} else{ ?>
                <tr>
                    <td class="text-center" colspan= "7">No Data Available</td>
                </tr>
                <?php } ?>
		
                </tbody>
                <tfoot>
			<tr>
    				<td ></td>
                    <td ></td>
                <td></td>
                <td class="bold_table_text">Total</td>
                <td class="bold_table_text"><?=$center_amount_total?></td>
                <td class="bold_table_text"><?=$total_fees_btu?></td>
                <td  class="bold_table_text text-center"><?=$grand_amount?></td>
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
<?php include('footer.php');
?>
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
                    title: 'Data in Table Format (Student)',
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