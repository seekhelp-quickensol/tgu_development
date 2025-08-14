<?php include('header.php')?>

<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Co-Guide Payment Details:</h4>
                  <h4 class="card-title">Name: <?php if(!empty($single_guide)){ echo $single_guide->name;}?></h4>
				  <div class="row">
					<div class="col-lg-3">
                        <?php $total_fees = 0;
                            if(!empty($all_guide_fees)){ foreach($all_guide_fees as $all_guide_fees_result){		
                            $total_fees = $total_fees + $all_guide_fees_result->co_guide_fees; 
                        }}?>
						<h5 class="card-title">Total Guide Fees: ₹ <?=number_format($total_fees,2);?></h5>
					</div>
					<?php $total_paid_amt = 0;
						if(!empty($all_guide_payments)){ foreach($all_guide_payments as $all_guide_payments_result){							
							$total_paid_amt = $total_paid_amt + $all_guide_payments_result->amount;
						}}
					?>
					<div class="col-lg-3">
						<h5 class="card-title">Total Paid Amount: ₹ <?=number_format($total_paid_amt,2);?> </h5>
					</div>
					<?php $total_pending_amt = $total_fees - $total_paid_amt ?>
					<div class="col-lg-3">
						<h5 class="card-title">Total Pending : ₹ <?=number_format($total_pending_amt,2);?> </h5>
					</div>
                  </div>
				  <p class="card-description">
                    List of All Payments
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Student Name</th>
						<th>Payment Mode</th>
						<th>Payment Date</th>
						<th>Transaction ID</th>
						<th>Amount</th>
						<!-- <th>Action</th> -->
					</tr>
				</thead>
				<tbody>
						<?php 
						$i = 1;
						if(!empty($all_guide_payments)){ foreach($all_guide_payments as $all_guide_payments_result){?>							
							<tr>
								<td><?=$i++?></td>
                                <td><?=$all_guide_payments_result->student_name?></td>
								<td> 
									<?php 
										$mode = "";
										if($all_guide_payments_result->mode == "1"){
											$mode = "Online";
										}else if($all_guide_payments_result->mode == "2"){
											$mode = "Cash";
										}else if($all_guide_payments_result->mode == "3"){
											$mode = "Cheque";
										}
										echo $mode;
									?>
								</td>
								<td><?=$all_guide_payments_result->payment_date?></td>
								<td><?=$all_guide_payments_result->transaction_no?></td>
								<td><?=$all_guide_payments_result->amount?></td>
								<!-- <td>
									<a type="button" title="Edit" data-toggle="tooltip" href="<?=base_url()?>guide_payments/<?=$this->uri->segment(2)?>/<?=$payment_result->id?>"  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle="tooltip" title="Permanently Delete" href="<?=base_url()?>delete/<?=$payment_result->id?>/tbl_guide_payment" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									
								</td> -->
							</tr>
						<?php }}?>
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
                    <h4 class="card-title">Co-Guide Payment Details: (Blended)</h4>
                  <h4 class="card-title">Name: <?php if(!empty($single_guide)){ echo $single_guide->name;}?></h4>
				  <div class="row">
					<div class="col-lg-3">
                        <?php $total_fees = 0;
                            if(!empty($all_guide_fees_blended)){ foreach($all_guide_fees_blended as $all_guide_fees_blended_result){		
                            $total_fees = $total_fees + $all_guide_fees_blended_result->co_guide_fees; 
                        }}?>
						<h5 class="card-title">Total Guide Fees: ₹ <?=number_format($total_fees,2);?></h5>
					</div>
					<?php $total_paid_amt = 0;
						if(!empty($all_guide_payments_blended)){ foreach($all_guide_payments_blended as $all_guide_payments_blended_result){							
							$total_paid_amt = $total_paid_amt + $all_guide_payments_blended_result->amount;
						}}
					?>
					<div class="col-lg-3">
						<h5 class="card-title">Total Paid Amount: ₹ <?=number_format($total_paid_amt,2);?> </h5>
					</div>
					<?php $total_pending_amt = $total_fees - $total_paid_amt ?>
					<div class="col-lg-3">
						<h5 class="card-title">Total Pending : ₹ <?=number_format($total_pending_amt,2);?> </h5>
					</div>
                  </div>
				  <p class="card-description">
                    List of All Payments
                  </p>
                  <table id="example2" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Student Name</th>
						<th>Payment Mode</th>
						<th>Payment Date</th>
						<th>Transaction ID</th>
						<th>Amount</th>
						<!-- <th>Action</th> -->
					</tr>
				</thead>
				<tbody>
						<?php 
						$i = 1;
						if(!empty($all_guide_payments_blended)){ foreach($all_guide_payments_blended as $all_guide_payments_blended_result){?>							
							<tr>
								<td><?=$i++?></td>
                                <td><?=$all_guide_payments_blended_result->student_name?></td>
								<td> 
									<?php 
										$mode = "";
										if($all_guide_payments_blended_result->mode == "1"){
											$mode = "Online";
										}else if($all_guide_payments_blended_result->mode == "2"){
											$mode = "Cash";
										}else if($all_guide_payments_blended_result->mode == "3"){
											$mode = "Cheque";
										}
										echo $mode;
									?>
								</td>
								<td><?=$all_guide_payments_blended_result->payment_date?></td>
								<td><?=$all_guide_payments_blended_result->transaction_no?></td>
								<td><?=$all_guide_payments_blended_result->amount?></td>
								<!-- <td>
									<a type="button" title="Edit" data-toggle="tooltip" href="<?=base_url()?>guide_payments/<?=$this->uri->segment(2)?>/<?=$payment_result->id?>"  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
									<a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle="tooltip" title="Permanently Delete" href="<?=base_url()?>delete/<?=$payment_result->id?>/tbl_guide_payment" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
									
								</td> -->
							</tr>
						<?php }}?>
				</tbody>
			</table>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php include('footer.php')?>
 <script>
$(document).ready(function() {
	$('#example').DataTable({
		dom:"Bfrtip",
		buttons: [
			{
				extend: 'excelHtml5',
				exportOptions: {
				 columns: ':contains("Office")'
				}
			},
			
			// 'csvHtml5',
			// 'pdfHtml5'
		],
    }); 
}); 
</script>
<script>
$(document).ready(function() {
	$('#example2').DataTable({
		dom:"Bfrtip",
		buttons: [
			{
				extend: 'excelHtml5',
				exportOptions: {
				 columns: ':contains("Office")'
				}
			},
			
			// 'csvHtml5',
			// 'pdfHtml5'
		],
    }); 
}); 
</script>