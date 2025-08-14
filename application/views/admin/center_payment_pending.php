<?php include('header.php');?>

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table
                                id="example"
                                class="table table_account table-striped"
                                style="width:100%">
                                <thead class="">
                                    <h4 class="statement_title title_padding">Data in Table Format (Center)</h4>
                                    <tr class="bg-theme">
                                        <tr class="bg-theme">
                                            <th>Sr No</th>
                                            <th>Center Name</th>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            <th>Last Payment Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
              <?php if(!empty($payment_pending_center)){
                $i=1;
                foreach($payment_pending_center as $payment_pending_center_result){
                    // $total_amount  += $payment_pending_center_result->amount;
                    //echo $payment_pending_center_result->center_id;
                    ?>                      <tr>
                                            <td><?=$i?></td>
                                            <td><a target="_blank"
                                                    href="<?=base_url();?>center_account_details_pending/<?=$payment_pending_center_result->center_id;?>"><?=$payment_pending_center_result->center_name?></a></td>
                                            <td><?=$payment_pending_center_result->contact_person_name?></td>
                                            <td><?=$payment_pending_center_result->contact_person_contact?></td>
                                            <?php  $end_date = date("d-m-Y",strtotime($payment_pending_center_result->end_date));
                                            if($end_date ==  '01-01-1970'){
                                                $end_date = "";
                                            }?>
                                            <td><?=$end_date?></td>                                  
                                            </tr>
                                           
                                   
                                    <?php $i++; }}  else{ ?>
                                        <tr>
                                            <td class="text-center" colspan="5">No Data Available</td>
                                        </tr>
                                        <?php } ?>
                                        </tbody> 
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
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
                    title: 'Data in Table Format (Center)',
                    messageBottom: 'The information in this table is copyright to the global University.',
                    exportOptions: {
                        columns: [
                            0,
                            1,
                            2,
                            3,
                            4,
                            
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