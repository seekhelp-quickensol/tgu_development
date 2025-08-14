<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Transaction List
				  </h4>
                  <p class="card-description">
                    All list of transactions
                  </p>
					<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>Sr. No.</th>
								<th>Student Name</th>
								<th>Enrollment Number</th> 
								<th>Verified By</th>
								<th>Verified On</th>
								<th>Fees Type</th>
								<th>Transaction ID</th> 
								<th>Payment Date</th> 
								<th>Payment Mode</th> 
								<th>Payment Status</th> 
								<th>Late Fees</th>  
								<th>Lateral Entry Fees</th>  
								<th>Registration Fees</th>  
								<th>Discount</th>  
								<th>Amount</th>  
								<th>Remark</th>  
							</tr>
						</thead>
						<tbody>
							<?php $i=1;
								if(!empty($transaction)){ foreach($transaction as $transaction_result){ 
							?>
							<tr <?php if($transaction_result->verified_by_ext == 1 && $transaction_result->payment_status == 1){?>style="color:green"<?php }else if($transaction_result->payment_status == 2){?>style="color:red"<?php }?>>
								<td><?=$i++?></td>
								<td><?=$transaction_result->student_name;?></td>
								<td><?=$transaction_result->enrollment_number;?></td> 
								<td><?=$transaction_result->name;?></td> 
								<td><?php if($transaction_result->verified_date !="0000-00-00"){ echo date("d-m-Y",strtotime($transaction_result->verified_date));}?></td> 
								<td>
									<?php 
										if($transaction_result->fees_type == "1"){ 
											$fee_type = "Admission Fees"; 
										}else if($transaction_result->fees_type == "2"){
											$fee_type = "Exam Fees";
										}else if($transaction_result->fees_type == "3"){
											$fee_type = "Degree Fees";
										}else if($transaction_result->fees_type == "4"){
											$fee_type = "Re-registration Fees";
										}else{
											$fee_type = "NA";
										}
										echo $fee_type;
									?>
								</td>
								<td><?=$transaction_result->transaction_id;?></td> 
								<td><?=date("d-m-Y",strtotime($transaction_result->payment_date));?></td> 
								<td>
									<?php 
									if($transaction_result->payment_mode == "1"){
										echo "Online";
									}else if($transaction_result->payment_mode == "2"){
										echo "Challan";
									}else if($transaction_result->payment_mode == "3"){
										echo "Cash";
									}
									?>
								</td>
								<td>
								<?php  
									if($transaction_result->payment_status == "1"){
										echo  "Success";
									}else if($transaction_result->payment_status == "0"){
										echo  "Failed";
									}else if($transaction_result->payment_status == "2"){
										echo  "Rejected";
									} 
									?>
								</td>
								<td><?=$transaction_result->late_fees;?></td>
								<td><?=$transaction_result->lateral_entry_fees;?></td>
								<td><?=$transaction_result->registration_fees;?></td>
								<td><?=$transaction_result->discount;?></td>
								<td><?=$transaction_result->total_fees;?></td>
								<td><?=$transaction_result->remark;?></td>
							</tr>
							<?php }}?>
						</tbody>
					</table>
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
 <script>
 $(document).ready(function() {
  $('#example').DataTable();
} );
</script>
 