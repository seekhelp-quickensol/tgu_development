<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Account Details</h4>
                  <p class="card-description">
                    Please enter account details
                  </p>
                  <form class="forms-sample" name="bank_form" id="bank_form" method="post" >
				  <div class="row">


				  	<?php if(!empty($single)): ?>
				  		<input type="hidden" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
				  	<?php endif; ?>
					 
				<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Student Name *</label>
                      <input type="text" class="form-control discount" value="<?php if(!empty($student)){ echo $student->student_name;}?>" readonly>
                      <input type="hidden" name="separate_student_id" value="<?php if(!empty($student)){ echo $student->id;}?>">

                      <input type="hidden" name="year_sem" value="<?php if(!empty($student)){ echo $student->year_sem;}?>">

					 </div>
				</div>

				<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Fees *</label>
                      <input type="number" class="form-control discount" id="fees" name="fees" placeholder="Fees" value="<?php if(!empty($single)){ echo $single->fees;}?>">
					 </div>
				</div>

				<div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Remark *</label>
                      <input type="text" autocomplete="off" class="form-control" id="remark" name="remark" placeholder="Remark" value="<?php if(!empty($single)){ echo $single->remark;}?>">
					  <div class="error" id="transaction_error"></div>
					</div>
				</div>



                    <div class="clearfix"></div>
					<div class="col-md-12">
					<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Account List of <?php if(!empty($student)){ echo $student->student_name;}?></h4>
                  <p class="card-description">
                    All list of Payment's
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<td>Year/Sem</td>
						<th>Fees</th>
						<th>Remark</th>
						<th>Created On</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php $i=1; foreach($account as $acc): ?>

							<tr>
								<td><?=$i++;?></td>
								<td><?=$acc->year_sem;?></td>
								<td><?=$acc->fees;?></td>

								<td><?=$acc->remark;?></td>
								<td><?=$acc->created_on;?></td>
								<td>

									<a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle='tooltip' title='Permanently Delete' href="<?=base_url('delete/'.$acc->id."/tbl_separate_student_fees")?>"   class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>


									<a type='button' title='Edit' data-toggle='tooltip' href="<?=base_url("manage_separate_student_account/".$this->uri->segment(2)."/".$acc->id);?>"  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>



								</td>

							</tr>
						<?php endforeach; ?>
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
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");
	
	$.validator.addMethod("positiveNumber", function(value, element) {
		return Number(value) > 0;
	}, "Please enter a positive amount");

	$('#bank_form').validate({
		rules: {
			fees: {
				required: true,
				number:true,
				positiveNumber:true,
			},
			
			remark:{
				required:true,
			}
		},
		messages: {
			
			fees: {
				required: "Please enter fees",
				number:"Not a valid fees",
				positiveNumber:"Please enter positive amount",
			},
			remark:{
				required: "Please enter remark",
			}
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
});

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
			,
			// 'csvHtml5',
			// 'pdfHtml5'
		],
    }); 
}); 



</script>
 