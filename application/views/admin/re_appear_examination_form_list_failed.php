<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Failed Re Appear List</h4><p class="card-description">
                 <p class="card-description">
                    <!-- All list of re appear examination form  -->
                  </p>
					 <?php /*<div class="row">
						<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputUsername1">Month *</label>
						  <select class="form-control filter-change" id="month" name="month">
						  <option value="">Select Month</option>
						  <option value="January" <?php if(isset($_GET['month']) && $_GET['month'] == "January"){?>selected="month"<?php }?>>January</option>
						  <option value="February" <?php if(isset($_GET['month']) && $_GET['month'] == "February"){?>selected="month"<?php }?>>February</option>
						  <option value="March" <?php if(isset($_GET['month']) && $_GET['month'] == "March"){?>selected="month"<?php }?>>March</option>
						  <option value="April" <?php if(isset($_GET['month']) && $_GET['month'] == "April"){?>selected="month"<?php }?>>April</option>
						  <option value="May" <?php if(isset($_GET['month']) && $_GET['month'] == "May"){?>selected="month"<?php }?>>May</option>
						  <option value="June" <?php if(isset($_GET['month']) && $_GET['month'] == "June"){?>selected="month"<?php }?>>June</option>
						  <option value="July" <?php if(isset($_GET['month']) && $_GET['month'] == "July"){?>selected="month"<?php }?>>July</option>
						  <option value="August" <?php if(isset($_GET['month']) && $_GET['month'] == "August"){?>selected="month"<?php }?>>August</option>
						  <option value="September" <?php if(isset($_GET['month']) && $_GET['month'] == "September"){?>selected="month"<?php }?>>September</option>
						  <option value="October" <?php if(isset($_GET['month']) && $_GET['month'] == "October"){?>selected="month"<?php }?>>October</option>
						  <option value="November" <?php if(isset($_GET['month']) && $_GET['month'] == "November"){?>selected="month"<?php }?>>November</option>
						  <option value="December" <?php if(isset($_GET['month']) && $_GET['month'] == "December"){?>selected="month"<?php }?>>December</option>
						  </select>
						</div>
						</div>
						<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputUsername1">Year*</label>
						  <select class="form-control filter-change" id="year" name="year">
						  <option value="">Select Year</option>
						  <option value="2020" <?php if(isset($_GET['year']) && $_GET['year'] == "2020"){?>selected="month"<?php }?>>2020</option>
						  <option value="2021" <?php if(isset($_GET['year']) && $_GET['year'] == "2021"){?>selected="month"<?php }?>>2021</option>
						  <option value="2022" <?php if(isset($_GET['year']) && $_GET['year'] == "2022"){?>selected="month"<?php }?>>2022</option>
						  <option value="2023" <?php if(isset($_GET['year']) && $_GET['year'] == "2023"){?>selected="month"<?php }?>>2023</option>
						  </select>
						</div>
						</div>
						<div class="col-md-3">
						<div class="form-group"><br><br>
							<a href="<?=base_url();?>examination_form_list" class="btn btn-primary">All</a>
						</div>
						</div>
					</div>
				    <form method="post" name="activation">
					<input type="submit" name="activate_hall_ticket" value="Activate" class="btn btn-primary">
					*/?>
					<div class="clearfix"></div><br>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th> 
						<th>Action</th> 
						<th>Year/Sem</th>  
						<th>Number of Subject</th>  
						<th>Student Name</th>
						<th>Enrollment No</th>
						<th>Center Name</th>
						<th>Transaction No.</th>   
						<th>Date</th>
						<th>Payment Status</th> 
						<th>Year/Sem</th>
						<th>Father Name</th>
						<th>Mother Name</th>
						<th>Mobile Number</th>
						<th>Email</th> 
						<th>Course Name</th>
						<th>Stream Name</th> 
					</tr>
				</thead>
				<tbody>
					<?php 
					$sr=1;
					if(!empty($form)){ foreach($form as $form_result){?>
						<tr>
							<td><?=$sr++?></td>
							<td>
								<a type="button" title="Update Payment" data-toggle="tooltip" href="<?=base_url();?>update_re_appear_exam_payment/<?=$form_result->id?>" class="btn btn-success btn-sm edit_class"><i class="mdi mdi-table-edit"></i></a>
								<a target="_blank" data-toggle="tooltip" title="Print Receipt" href="<?=base_url()?>print_payment_receipt/<?=$form_result->id?>/tbl_re_appear" class="btn btn-danger btn-sm"><i class="mdi mdi mdi-printer"></i></a>
								<a target="_blank" data-toggle="tooltip" title="View Subjects" href="<?=base_url()?>view_re_appear_subjects/<?=$form_result->id?>" class="btn btn-danger btn-sm"><i class="mdi mdi mdi-eye"></i></a>
							</td>
							 
							<td><?=$form_result->year_sem?></td>
							<td><?=$form_result->number_of_paper?></td>
							<td><?=$form_result->student_name?></td>
							<td><?=$form_result->enrollment_number?></td>
							<td><?=$form_result->center_name?></td>
							<td><?=$form_result->payment_id?></td>
							<td><?=date("d/m/Y",strtotime($form_result->payment_date))?></td>
							<td><?php if($form_result->payment_status == "1"){ echo "Success";}else{ echo "Failed";}?></td>
							<td><?=$form_result->year_sem?></td>
							<td><?=$form_result->father_name?></td>
							<td><?=$form_result->mother_name?></td>
							<td><?=$form_result->mobile?></td>
							<td><?=$form_result->email?></td>
							<td><?=$form_result->course_name?></td>
							<td><?=$form_result->stream_name?></td>
						</tr>
					<?php }}?>
				</tbody>
			</table>
			</form>
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
    // $('#example').DataTable();
	$('#example').DataTable({ 
            dom: 'Bfrtip',
            responsive: true,
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
             
                buttons: [
                    
                    {
                        extend: 'excel',
                        filename: 'Failed Re Appear List',
                        exportOptions: {
                            columns: [0,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16] 
                        }
                    },
                    
                    
                ], 
        });
} );
$( function() {
	$( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
} );
 
</script>
 