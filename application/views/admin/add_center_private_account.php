<?php include('header.php');?>
<style>
	.btn-small{
		padding: 5px 10px;
	}
	.no_doc{
		margin-bottom: 0px;
		padding: 5px;
		background: #ddd;
		color: #000;
		text-align: center;
	}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Center Ledger
				  <!-- <a href="<?=base_url();?>center_login_list" class="btn btn-primary mr-2 float-right">View List</a> -->
				  </h4>
                  <p class="card-description">
                    Please enter center ledger details details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="old_id" name="old_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                                <label for="exampleInputUsername1">Select Center *</label>
                                <select class="form-control" id="center" name="center">
                                    <option value="">Select Center</option>
                                    <?php if(!empty($active_centers)){ foreach($active_centers as $active_centers_result){ ?>
                                        <option value="<?=$active_centers_result->id?>" <?php if($this->uri->segment(2) == $active_centers_result->id){?>selected="selected"<?php }?>><?=$active_centers_result->center_name?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enrollment Number *</label>
                                <input type="text" class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enrollment Number" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Student Name </label>
                                <input type="text" class="form-control" readonly id="student_name" name="student_name" placeholder="Student Name" value="">
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Session </label>
                                <input type="text" class="form-control" id="session" name="session" placeholder="Session" value="">
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Total Amount </label>
                                <input type="text" class="form-control" id="total_amount" name="total_amount" placeholder="Total Amount" value="">
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Amount </label>
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="">
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Installment </label>
                                <select class="form-control" id="installment" name="installment">
									<option value="">Select Installment</option>
									<option value="1">1 Installment</option>
									<option value="2">2 Installment</option>
									<option value="3">3 Installment</option>
									<option value="4">4 Installment</option>
									<option value="5">5 Installment</option>
									<option value="6">6 Installment</option> 
								</select>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Reference Number *</label>
                                <input type="text" class="form-control" id="reference_number" name="reference_number" placeholder="Reference Number" value="">
                            </div>
                        </div>
					</div>			
					<button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
                  </form>
				  ---------------------------------------------------OR------------------------------------------------
				  
				  <form class="forms-sample" name="upload_form" id="upload_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                          
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Upload File</label>
                                <input type="file" class="form-control" id="userfile" name="userfile">
								<input type="hidden" class="form-control" id="center_id" name="center_id" value="<?=$this->uri->segment(2)?>"> 
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Download File Format</label> <br>
								<a href="<?=base_url();?>documents/center_ledger.xlsx" class="btn btn-primary">Download</a> 
                            </div>
                        </div>						
					</div>			
					<button type="submit" id="upload" name="upload" value="upload" class="btn btn-primary mr-2 file-upload-browse">Upload</button>
                  </form>
				  
                </div>
              </div>
            </div>
			
			<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Center Ledger
				  <!-- <a href="<?=base_url();?>center_login_list" class="btn btn-primary mr-2 float-right">View List</a> -->
				  </h4>
                  <p class="card-description">
                    Please enter center ledger details details
                  </p>
                  <form class="forms-sample" name="bank_form" id="bank_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="old_id" name="old_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                                <label for="exampleInputUsername1">Select Center *</label>
                                <select class="form-control" id="center_id" name="center_id">
                                    <option value="">Select Center</option>
                                    <?php if(!empty($active_centers)){ foreach($active_centers as $active_centers_result){ ?>
                                        <option value="<?=$active_centers_result->id?>" <?php if($this->uri->segment(2) == $active_centers_result->id){?>selected="selected"<?php }?>><?=$active_centers_result->center_name?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Date*</label>
                                <input type="text" class="form-control datepicker" id="date" name="date" placeholder="Date" value="">
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Remitter Name *</label>
                                <input type="text" class="form-control" id="benificiary_name" name="benificiary_name" placeholder="Remitter Name" value="">
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Remitter Bank *</label>
                                <input type="text" class="form-control" id="benificiary_bank" name="benificiary_bank" placeholder="Remitter Bank" value="">
                            </div>
                        </div>
						  <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Benificiary Name *</label>
                                <input type="text" class="form-control" id="recipient_name" name="recipient_name" placeholder="Benificiary Name" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Benificiary Bank *</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Benificiary Name" value="">
                            </div>
                        </div>
                        
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Amount </label>
                                <input type="text" class="form-control" id="center_amount" name="center_amount" placeholder="Amount" value="">
                            </div>
                        </div> 
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Remark</label>
                                <input type="text" class="form-control" id="remark" name="remark" placeholder="" value="">
                            </div>
                        </div> 
					</div>			
					<button type="submit" id="button" name="bank_submit" value="bank_submit" class="btn btn-primary mr-2 save_button">Submit</button>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body" style="overflow:scroll">
                  <form method="post" name="delete_form">
				  <h4 class="card-title">Center Student Ledger List<br></h4>
				  <input type="checkbox" id="check" class="check" value="1" name="checkall">Check All | 
				  <input onclick="return confirm('Are you sure, you want to delete this record?')" type="submit" name="delete" value="Delete" class="btn btn-danger">
				  <br>
				  <br>
                  
				  
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th> 
							<th>Reference Number</th> 
							<th>Enrollment Number</th>
							<th>Student Name</th>
							<th>Total Amount</th>
							<th>Amount</th>
							<th>Installment</th>
							<!--<th>2 Installment</th>
							<th>3 Installment</th>
							<th>4 Installment</th>
							<th>5 Installment</th>
							<th>6 Installment</th>-->
							<th>Balance</th>
							<th>Date</th>
							<th>Course Name</th>
							<th>Stream Name</th>
							<th>Session Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$total_fees_amount = 0;
						$total_installment__received=0; 
						function searchSubArray($center_students_all, $key, $value) {   
							$new_arr = array();
							foreach ($center_students_all as $subarray){  
								if (isset($subarray->$key) && $subarray->$key == $value)
								  $new_arr[] = $subarray;       
							} 
							return $new_arr;
						}
						
						$i=1;
						if(!empty($ledger)){
							foreach($ledger as $ledger_result){
								$student_details = $this->Center_model->get_student_ledger_individual($ledger_result->enrollment_number);
								//$total_fees_amount += $ledger_result->total_amount;
								//$total_installment__received += $ledger_result->amount; 
								//$new_amount = searchSubArray($center_students_all, "enrollment_number", $ledger_result->enrollment_number);
								$student_till_receive_amout = 0;
							if(!empty($student_details)){
								foreach($student_details as $student_details_result){
									$student_till_receive_amout +=$student_details_result->amount;
									$total_installment__received += $student_details_result->amount;
									$total_fees_amount += $student_details_result->total_amount;
						?>
						<tr>
                            <td><?=$i++;?>
							<input type="checkbox" name="delete_multiple[]" value="<?=$student_details_result->id?>">
							</td>
							<td><?=$student_details_result->reference_number;?></td>
							<td><?=$student_details_result->enrollment_number;?></td>
							<td><?=$student_details_result->student_name;?></td>
							<td><?=$student_details_result->total_amount;?></td>
							<td><?=$student_details_result->amount;?></td>
							<td>
							<?php
							echo $student_details_result->installment;;
							/*$ins=0;	
							 
							$received_amount = 0;							
							if(!empty($new_amount)){ 
								
								foreach($new_amount as $result_arr){
								$received_amount += $result_arr->amount;
								$total_installment__received += $result_arr->amount; 
								?>
							<td><?=$ledger_result->amount;?></td>
							<?php $ins++;}}
							$new_loop = 6-$ins;
							for($k=1;$k<=$new_loop;$k++){
								
							?>
							<td>-</td>
							<?php }*/?>
							</td>
							<td><?=$student_details_result->total_amount-$student_till_receive_amout?></td>
							<td><?=date("d-m-Y",strtotime($student_details_result->date));?></td>
							<td><?=$student_details_result->course_name;?></td>
							<td><?=$student_details_result->stream_name;?></td>
							<td><?=$student_details_result->session_name;?></td>
							<td>
								<a onclick="return confirm('Are you sure, you want to delete this record?')" data-toggle="tooltip" title="Delete" href="<?=base_url();?>delete/<?=$student_details_result->id;?>/tbl_center_student_separate_ledger" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a> 
							</td>
						</tr>
						<?php }}}} ?>
					</tbody>
					<tfoot>
						<tr>
							<td><input onclick="return confirm('Are you sure, you want to delete this record?')" type="submit" name="delete" value="Delete" class="btn btn-danger"></td>
							<td></td>
							<td></td>
							<td></td>
							<td><b>Total Fees: <?=number_format($total_fees_amount, 2, '.', ',');?></b></td>
							<td><b>Total Received: <?=number_format($total_installment__received, 2, '.', ',');?></b></td>
							<td><b><?=$total_fees_amount-$total_installment__received?></b></td>
							<td></td>
							<td></td>
							<td></td> 
							<td></td> 
							<td></td>
							<td></td>
						</tr>
					</tfoot>
				</table>
				
                </div>
				</form>
              </div>
            </div>
			<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Center Received Ledger List</h4>
                  <table id="example_received" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th> 
							<th>Date</th>
							<th>Reference Number</th>
							<th>Benificiary Name</th>
							<th>Benificiary Bank</th>
							<th>Remitter Name</th>
							<th>Remitter Bank</th> 
							<th>Amount</th>
							<th>Balance</th>
							<th>Remark</th> 
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$k=1;
						$i=1;$total_amount = 0; $total_balance = 0;
							if(!empty($received)){foreach($received as $received_result){ 
								$total_amount = $total_amount + $received_result->amount;
								$total_balance = $total_balance + ($received_result->amount-$received_result->balance);
						?>
						<tr>
                            <td><?=$i++;?></td>
							<td><?=date("d-m-Y",strtotime($received_result->date));?></td>
							<td><?=$received_result->ref_number;?></td>
							<td><?=$received_result->recipient_name;?></td>
							<td><?=$received_result->bank_name;?></td>
							<td><?=$received_result->benificiary_name;?></td>
							<td><?=$received_result->benificiary_bank;?></td>
							<td><?=$received_result->amount;?></td>
							<td><?=$received_result->amount-$received_result->balance?></td>
							<td><?=$received_result->remark;?></td>   
							<td>
								<a onclick="return confirm('Are you sure, you want to delete this record?')" data-toggle="tooltip" title="Delete" href="<?=base_url();?>delete/<?=$received_result->id;?>/tbl_center_private_received_amount" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a> 
							</td>
						</tr>
                        <?php }} ?>
					</tbody>
					<tfoot>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><b>Total Amount: </b></td>
							<td><b><?= number_format($total_amount, 2, '.', ','); ?></b></td>
							<td><b>Total Balance: </b></td>
							<td><b><?= number_format($total_balance, 2, '.', ','); ?></b></td>
							<td></td>
							<td></td>
							<td></td>
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
      
<?php include('footer.php');
$id=0;
if($this->uri->segment(2) != ""){
	$id = $this->uri->segment(2);
}
?>
 <script>
  $(".check").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
 $("#center").change(function(){
	window.location.href="<?=base_url();?>add_center_private_account/"+$(this).val(); 
 });
 $(document).ready(function () {		
	$('#single_form').validate({
		rules: {
			center: {
				required: true,
			},
			enrollment_number: {
				required: true,
			},
			session: {
				required: true,
			},
			total_amount: {
				required: true,
			},
			amount: {
				required: true,
			},
			installment: {
				required: true,
			},
			reference_number: {
				required: true,
			},
		},
		messages: {
			center: {
				required: "Please select center",
			},
			enrollment_number: {
				required: "Please enter enrollment number",
			},
			session: {
				required: "Please enter session",
			},
			total_amount: {
				required: "Please enter total amount",
			},
			amount: {
				required: "Please enter amount",
			},
			installment: {
				required: "Please select installment",
			},
			reference_number: {
				required: "Please enter reference number",
			},
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});
	$('#bank_form').validate({
		rules: {
			center_id: {
				required: true,
			},
			bank_name: {
				required: true,
			},
			date: {
				required: true,
			},
			center_amount: {
				required: true,
			},
			benificiary_name: {
				required: true,
			},
			benificiary_bank: {
				required: true,
			},
			recipient_name: {
				required: true,
			},
		},
		messages: {
			center_id: {
				required: "Please select center",
			},
			bank_name: {
				required: "Please enter bank name",
			},
			date: {
				required: "Please select date",
			},
			center_amount: {
				required: "Please enter amount",
			},
			benificiary_name: {
				required: "Please enter Remitter name",
			},
			benificiary_bank: {
				required: "Please enter bank name",
			},
			recipient_name: {
				required: "Please enter benificiary name",
			},
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});
	
	
	$("#enrollment_number").keyup(function(){
		$.ajax({
			type: "POST",
			url: "<?=base_url();?>admin/Ajax_controller/get_ledger_center_student",
			data:{'enrollment_number':$("#enrollment_number").val(),'center':'<?=$this->uri->segment(2)?>'},
			success: function(data){
				if(data !=""){
					data = data.split("@@@");
					$("#student_name").val(data[0]);
					$("#session").val(data[1]);
					$("#total_amount").val(data[2]);
					$("#single_button").show();
				}else{
					$("#student_name").val('');
					$("#session").val('');
					$("#total_amount").val('');
					$("#single_button").hide();
				}
			},
			 error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
		});
	});
});
// $(document).ready(function() {
//  	$('#example').DataTable( {
//         dom: 'Bfrtip',
//         scrollX:        true,
//         scrollCollapse: true,
       
//         fixedColumns:   {
//             left: 5
//         },	
//         buttons: [
// 		'copy', 'csv', 'excel','print',
//             {
// 				extend : 'pdfHtml5',
// 				title : "Student Statement",
// 				orientation : 'landscape',
// 				pageSize : 'LEGAL',
// 				exportOptions: {
// 						  columns: [0,1,2,3,4,5,6,7,8,9,10,11]
// 					 }
// 			},
//         ]
//     } );  
// });
	$(document).ready(function() {
		$('#example').DataTable({
			"order": [],
			"columnDefs": [{
			"orderable": false,
			// "targets": [0, 1, 2, 3]
			}],
			dom: 'Bfrtip',
			buttons: [
			{
				extend: 'excelHtml5',
				exportOptions: {
				columns: [0,1,2,3,4,5,6,7,8,9,10,11]
				}
			},
			// 'csvHtml5',
			// 'pdfHtml5'
			],
			lengthMenu: [
				[10, 25, 50, -1],
				['10', '25', '50', 'All']
			],
			pageLength: 10
		});
	});
	$(document).ready(function() {
		$('#example_received').DataTable({
			"order": [],
			"columnDefs": [{
			"orderable": false,
			// "targets": [0, 1, 2, 3]
			}],
			dom: 'Bfrtip',
			buttons: [
			{
				extend: 'excelHtml5',
				exportOptions: {
				columns: [0,1,2,3,4,5,6,7,8,9,10]
				}
			},
			// 'csvHtml5',
			// 'pdfHtml5'
			],
			lengthMenu: [
				[10, 25, 50, -1],
				['10', '25', '50', 'All']
			],
			pageLength: 10
		});
	});
// $(document).ready(function() {
//       $('#example').DataTable({
//         dom: 'Bfrtip', 
//         buttons: ['excel'],
//         searching: true
//       });
//     });
// $(document).ready(function() {
//       $('#example_received').DataTable({
//         dom: 'Bfrtip', 
//         buttons: ['excel'],
//         searching: true
//       });
//     });
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		maxDate:0,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
});
 </script>
 