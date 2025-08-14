<?php 

// echo "<pre>";print_r($yearly_account_student);exit;
include('header.php');
$total_amount=0;
$center_amount_total=0;
$total_fees_btu=0;
$grand_amount=0;
$center_amount_total_seperate=0;
$total_fees_btu_seperate=0;
$grand_amount_seperate=0;
?>

		

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Yearly  Collection: Student & Center</h4>
                            <div class="chart-container">
                                <canvas id="myChart_bar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- 1 -->
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Center Data</h4>
                            <table id="example"  style="width:100%" class="table table_account table-striped datatable_parent">
        <thead class="">
		<!-- <h4 class="statement_title title_padding">Center Data</h4> -->
            <tr class="">
            <th >Sr No</th>
				<th>Month</th>
       		    <th>Center Name</th>
                <th>Name</th>
                <th> Contact Number</th>
                <th>Transaction ID</th>
    			<th>Amount </th>
            </tr>
        </thead>
        <tbody>
        <?php   if(!empty($yearly_account_center)){
                $i=1;
                foreach($yearly_account_center as $yearly_account_center){
                    $total_amount  += $yearly_account_center->amount;
                    ?>
            <tr>
                <td class="center"><?=$i?></td>
               <?php 
               $month = date("m",strtotime($yearly_account_center->payment_date));
               $monthName = date('F', mktime(0, 0, 0, $month, 10));
               ?>
                <td><?=$monthName?></td>
                <td><a target = _blank href="<?=base_url();?>center_account_details_all/<?=$yearly_account_center->center_id;?>"><?=$yearly_account_center->center_name?></a></td>
                <td><?=$yearly_account_center->contact_person_name?></td>
                <td><?=$yearly_account_center->contact_person_contact?></td>
                <td><?=$yearly_account_center->transaction_no?></td>
				<td><?=$yearly_account_center->amount?> </td>        
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
				<td class="bold_table_text">Total</td>
                <td  class="bold_table_text"><?=$total_amount?></td>
            </tr>
            </tfoot>	
        </tbody>
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
                            <table id="student_table"  style="width:100%" class="table table_account table-striped datatable_parent">
        <thead class="">
		<!-- <h4 class="statement_title title_padding">Student Data</h4> -->
            <tr class="">
            <th >Sr No</th>
				<th>Month</th>
                <th>Payment Type</th>
				<th>Name</th>
                <th>Enrollment Number</th>
                <th>Contact</th>
                <th>Transaction ID</th>
                <th>Center AMT</th>
                <th> BTU AMT</th>
                <th>Total AMT </th> 
            </tr>
        </thead>
        <tbody>
        <?php 
         if(!empty($yearly_account_student)){
            $i= 1;
            $total_amount_student=0;
            foreach($yearly_account_student as $yearly_account_student_result ){
                $yearly_account_student_result->transaction_id;
                $total_amount_student += $yearly_account_student_result->amount;
            ?>
            <tr>
                <td class="center"><?=$i?></td>
                <?php 
               $month = date("m",strtotime($yearly_account_student_result->payment_date));
               $monthName = date('F', mktime(0, 0, 0, $month, 10));
               ?>
                <td><?=$monthName?></td>

                   <td>

                    <?php if ($yearly_account_student_result->fees_type == '1'){

                    echo "Admission Fees";

                }elseif($yearly_account_student_result->fees_type == '4'){

                    echo "RE-registration Fees";

                }elseif($yearly_account_student_result->fees_type == '2'){

                    echo "Examination Fees";

                }elseif($yearly_account_student_result->fees_type == 'migration'){

                    echo "Migration Fees";

                }elseif($yearly_account_student_result->fees_type =='provisinal'){

                  echo "Provisional Fees";

                }elseif($yearly_account_student_result->fees_type == 'transfer'){

                    echo "Transfer Fees";

                }elseif($yearly_account_student_result->fees_type == 'Degree'){

                    echo "Degree Fees";

                }elseif($yearly_account_student_result->fees_type == 'transcript'){

                    echo "Transcript Fees";

                }

                    ?>

                

                </td>



                <??>

                <td><a target =_blank href="<?=base_url();?>student_account_statement_yearly/<?=$yearly_account_student_result->student_id?>"><?=$yearly_account_student_result->student_name?></a></td>

				<td ><?=$yearly_account_student_result->enrollment_number?></td>

                <td><?=$yearly_account_student_result->mobile?></td>

                <td><?=$yearly_account_student_result->transaction_id?></td>



                <?php  

                    if ($yearly_account_student_result->fees_type == '1' || $yearly_account_student_result->fees_type == '4'){

                        $exp = $this->Account_model->get_original_amount($yearly_account_student_result->student_id);


                        if($exp == 0){
                            $original_amount =0;
                        }else{
                            $exp = explode('@@@',$exp);
                            $original_amount = $exp[1];
                        }

                        $lateral_entry_fees = isset($yearly_account_student_result->lateral_entry_fees) ? (int)$yearly_account_student_result->lateral_entry_fees : 0;
                        $actual_amount = (int) $yearly_account_student_result->lateral_entry_fees + (int)$original_amount;

                        if($yearly_account_student_result->center_id == 1){

                            $total_fees =$yearly_account_student_result->amount+$lateral_entry_fees;

                            $center_amount = 0;     

                            $total_amount = $yearly_account_student_result->amount;

                        }else{

                             $total_fees = $yearly_account_student_result->amount+$lateral_entry_fees;

                            // $center_amount = $exp[0];
                            $center_amount = isset($exp[0]) ? $exp[0] : 0;

                            $total_amount = $yearly_account_student_result->amount+$lateral_entry_fees;

                        }
                    }else{
                        $total_fees = $yearly_account_student_result->amount + $lateral_entry_fees;

                        $center_amount = 0;

                        $total_amount = $yearly_account_student_result->amount + $lateral_entry_fees;

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

                    <td class="text-center" colspan= "10">No Data Available</td>

                </tr>

                <?php } ?>

                </tbody>

                <tfoot>

			<tr>

                <td></td>

                <td></td>

                <td></td>

                <td></td>

				<td ></td>

                <td></td>

                <td class="bold_table_text text-center" >Total</td>

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
<!-- 3 -->
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Separate Student Data</h4>
                            <table id="separate_student_table"  style="width:100%" class="table table_account table-striped datatable_parent">

        <thead class="">

		<!-- <h4 class="statement_title title_padding">Separate Student Data</h4> -->

            <tr class="">

            <th >Sr No</th>

				<th>Month</th>

                <th>Payment Type</th>

				<th>Name</th>

                <th>Enrollment Number</th>

                <th>Contact</th>

                <th>Transaction ID</th>

                <th>Center AMT</th>

                <th> BTU AMT</th>

                <th>Total AMT </th>

               

               



            </tr>

        </thead>

        <tbody>

        <?php if(!empty($yearly_account_seperate_student)){

                $i= 1;

            foreach($yearly_account_seperate_student as $yearly_account_seperate_student_result ){
                

                $yearly_account_seperate_student_result->student_id;

                $total_amount_student += $yearly_account_seperate_student_result->amount;
               

            ?>

            <tr>

                <td class="center"><?=$i?></td>

                <?php 

               $month = date("m",strtotime($yearly_account_seperate_student_result->payment_date));

               $monthName = date('F', mktime(0, 0, 0, $month, 10));

               ?>

                <td><?=$monthName?></td>

                   <td>

                   <?php if ($yearly_account_seperate_student_result->fees_type == 'admission'){

                    echo "Admission";

                }elseif($yearly_account_seperate_student_result->fees_type == 'migration'){

                    echo "Migration Fees";

                }elseif($yearly_account_seperate_student_result->fees_type =='provisinal'){

                  echo "Provisional Fees";

                }elseif($yearly_account_seperate_student_result->fees_type == 'transfer'){

                    echo "Transfer Fees";

                }elseif($yearly_account_seperate_student_result->fees_type == 'Degree'){

                    echo "Degree Fees";

                }elseif($yearly_account_seperate_student_result->fees_type == 'transcript'){

                    echo "Transcript Fees";

                }

                    ?>

                

                </td>



                <??>

                <td><a target =_blank href="<?=base_url();?>separate_student_account_statement_yearly/<?=$yearly_account_seperate_student_result->student_id?>"><?=$yearly_account_seperate_student_result->student_name?></a></td>

				<td ><?=$yearly_account_seperate_student_result->enrollment_number?></td>

                <td><?=$yearly_account_seperate_student_result->mobile?></td>

                <td><?=$yearly_account_seperate_student_result->transaction_id?></td>





                <?php 

                   $total_fees_seperate = $yearly_account_seperate_student_result->amount;

                     $center_amount_seperate = 0;

                  $total_amount_seperate = $yearly_account_seperate_student_result->amount;

               

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

                    <td class="text-center" colspan= "10">No Data Available</td>

                </tr>

                <?php } ?>

                		

        </tbody>

                <tfoot>

			<tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
				<td ></td>
                <td></td>
                <td class="bold_table_text">Total</td>
                <td class="bold_table_text text-center"><?= $center_amount_total_seperate ?></td>
                <td class="bold_table_text"><?=$total_fees_btu_seperate?></td>
                <td  class="bold_table_text"><?=$grand_amount_seperate?></td>
            </tr>
            </tfoot>
         </tr>
    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<script>
var ctx = document.getElementById("myChart_bar").getContext('2d');
var myChart_bar = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:["Jan.", "Feb.", "Mar.", "Apr.","May.","Jun.","Jul.","Aug.","Sep.","Oct.","Nov.","Dec."],
        datalabels: {
            display: false,
        },
        datasets: [{
            label: 'Center Payment',
            data: [
                <?php  
                    for($d=1;$d<=12;$d++){
                        $month='';
                        if(strlen($d) == 1){
                            $month = '0'.$d;
                        }else{
                            $month = $d;
                        } 
                        $result =  $this->Account_model->get_date_wise_center_yearly($month); 
                        echo $result.",";
                    }
                ?>                
            ],
            backgroundColor: "rgba(68,114,196,1)"
        },{
            label: 'Student Payment',
            data: [<?php  
                    for($d=1;$d<=12;$d++){
                        $month='';
                        if(strlen($d) == 1){
                            $month = '0'.$d;
                        }else{
                            $month = $d;
                        } 
                        $result =  $this->Account_model->get_date_wise_student_amount_yearly($month,1); 
                        echo $result.",";
                    }
                    ?>  ],
              backgroundColor: "rgba(255,74,18,1)"
        }, {
            label: 'Separate Student Payment',
            data: [<?php  
                    for($d=1;$d<=12;$d++){
                        $month='';
                        if(strlen($d) == 1){
                            $month = '0'.$d;
                        }else{
                            $month = $d;
                        } 
                        $result =  $this->Account_model->get_date_wise_Separate_student_amount_yearly($month); 
                        echo $result.",";
                    }
                    ?>],
         backgroundColor: "rgba(254,744,18,1)"
        }]
    }
});
</script>

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

                    messageBottom: 'The information in this table is copyright to the global University.',

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

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

} );



    </script>

    <script>

   $(document).ready(function() {

            var table = $('#student_table').DataTable({

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

                        columns: [0,1,2,3,4,5,6,7,8,9],

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

     <script>

   $(document).ready(function() {

    var table = $('#separate_student_table').DataTable({

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

                    messageBottom: 'The information in this table is copyright to the global University.',

                    exportOptions: {

                        columns: [0,1,2,3,4,5,6,7,8,9],

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

