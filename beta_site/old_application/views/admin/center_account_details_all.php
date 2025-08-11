<?php include('header.php');?>


<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="statement_title">Name : <?php if(!empty($center_info)){ echo $center_info->contact_person_name;}?></h4>

                            <h4 class="statement_title">Center Name : <?php if(!empty($center_info)){ echo $center_info->center_name;}?> </h4>
                    
                        <table id="example" style="width:100%;" class="table dt-responsive nowrap table_account table-striped">
        <thead class="">
            <tr class="bg-theme">
                <th >Sr No</th>
				<th>Month</th>
       		    <th>Transaction ID</th>
                <th>Amount</th>
        <!--        <th> BTU AMT</th>
                <th>Total AMT </th>-->
               

            </tr>
        </thead>
        <tbody>
            <?php 
         if(!empty($account_details_center)){
            
             $i = 1;
             foreach ($account_details_center as $account_details_center ){
                 $totol_amount += $account_details_center->amount;
         
            ?>
            <tr>
                <td class="center"><?=$i?></td>

                <?php 
               $month = date("m",strtotime($account_details_center->payment_date));
               $monthName = date('F', mktime(0, 0, 0, $month, 10));
               ?>
                <td><?=$monthName?></td>
                <td><?=$account_details_center->transaction_no?></td>
                <td><?=$account_details_center->amount?></td>
             <!--   <td>6000</td>
                <td>10000</td>-->

        
            </tr>
            <?php $i++; } }else{ ?>
                <tr>
                    <td class="text-center" colspan= "4">No Data Available</td>
                </tr>
                <?php } ?>

			
                </tbody>
                <tfoot>
			<tr>
    				<td ></td>
                <td></td>
                <td class="bold_table_text">Total</td>
                <td class="bold_table_text"><?=$totol_amount?></td>
              <!--  <td class="bold_table_text">6000</td>
                <td  class="bold_table_text">10000</td>-->
            </tr>
            <tfoot>

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
                    title: 'Data in Table Format (Center)',
                    messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
                    exportOptions: {
                        columns: [0,1,2,3],
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
 