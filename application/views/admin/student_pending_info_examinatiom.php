<?php include('header.php');?>


<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="statement_title">Name :<?php if(!empty($student)){ echo $student->contact_person_name;}?></h4>

                            <h4 class="statement_title">Center Name :<?php if(!empty($student)){ echo $student->center_name;}?> </h4>
                    
                        <table id="examples" class="table table_account table-striped" style="width:100%">
        <thead class="">
		<h4 class="statement_title title_padding">Student Payment List</h4>
            <tr class="bg-theme">
            <th >Sr No</th>
				<th>Date</th>
       		    <th>Transaction ID</th>
                <th> AMT</th>
               
            </tr>
            <?php
             if (!empty($student_examination)){
            $i = 1;
        foreach ($student_examination as $student_reregistration_result){
                    $amount += $student_reregistration_result ->amount;
                ?>
            <tr>
                <td><?=$i++;?></td>
                <td><?=date("d-m-Y",strtotime($student_reregistration_result->payment_date));?></td>
                <td><?=$student_reregistration_result->transaction_id?></td>
                <td><?=$student_reregistration_result->amount?></td>
               

</tr>
</thead>
<?php } } else{ ?>
                <tr>
                    <td class="text-center" colspan= "10">No Data Available</td>
                </tr>
                <?php } ?>

                    <tfoot>
                    <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td><?=$amount?></td>
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
</div>
<?php include('footer.php');?>
<script>
   $(document).ready(function() {
        var table = $('#examples').DataTable({
            "lengthChange": false,
            "processing": true,
            "serverSide": false,
            "responsive": true,
            "cache": false,
            "order": [[0, "asc" ]],
            buttons:[
                
                {
                    extend: "excelHtml5",
                    title: 'Data in Table Format (Seperate Student)',
                    messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
                    exportOptions: {
                        columns: [0, 1,2,3],
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
        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
} );

    </script>