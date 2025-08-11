<?php include('header.php');?>
<?php include('sidebar.php');?>


<section>
    <div>
        <div class="container tables">
			<div class="row">
                <div class="col-md-12 ">
                    <h2 class="table-title add_customer">Search Details</h2>
                    <div class="table-responsive py-5 employee_table">
						<form method="get">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<select class="form-control" type="text" name="month">
											<option value="">Select Session</option>
											<?php if(!empty($session)){ foreach($session as $session_result){?>
											<option value="<?=base64_encode($session_result->id)?>"><?=$session_result->session_name?></option>
											<?php }}?>
										</select> 
									</div>
									
									<div class="col-md-4">
										<input type="submit" class="btn btn-primary" name="search" value="Search"> 
										<a href="<?=base_url();?>new_verifications" class="btn btn-danger">Clear</a> 
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-md-12 ">
                    <h2 class="table-title add_customer">New Verification List</h2>
                    <div class="table-responsive py-5 employee_table">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="">
                                <tr class="list_tr">
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Father Name</th>
                                    <th scope="col">Mother Name</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Email ID</th> 
                                    <th scope="col">Date Of Birth</th>    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
			    				<?php if(!empty($student)){
			    					$i=1;
			    					foreach($student as $student_result){?>
                                <tr>
                                    <td scope="row"><?=$i++?></td>
                                    <td><?=$student_result->student_name?></td>
                                    <td><?=$student_result->father_name?></td>
                                    <td><?=$student_result->mother_name?></td>
                                    <td><?=$student_result->mobile?></td>
                                    <td><?=$student_result->email?></td>
                                    <td><?=date("d/m/Y",strtotime($student_result->date_of_birth))?></td> 
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?=base_url();?>blended-verify-now/<?=base64_encode($student_result->id)?>" class="btn btn-success">Verify Now</a>
                                        </div> 
                                    </td>
                                </tr>  
			    				<?php }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>

<script>
var json = [
	[1, 2, 3, 4, 5, 6, 7, 8, 9]
];


$('.table').dataTable({
		// Doesnt work with dom option (read documentation https://datatables.net/reference/option/dom)
    //"dom": 't',
    
    "bSort":false,
    "pageLength": 10,
    "paging": true,
    "bPaginate":true,
    "pagingType":"full_numbers",

    "columnDefs": [
        {className: "pad-md-left-p-10 pad-top-bottom-p-10", "targets": [0,1,2,3,4,5,6,7]}
        ]

}); // End of datatable function 
</script>

