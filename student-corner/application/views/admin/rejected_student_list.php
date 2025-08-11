<?php include('header.php');?>
<?php include('sidebar.php');?>


<section>
    <div >
        <div class="container tables">
            <div class="row">
                <div class="col-md-12 ">
                    <h2 class="table-title add_customer">New Verification List</h2>
                    <div class="table-responsive py-5 employee_table">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="">
                                <tr class="list_tr">
                                    <th scope="col">Sr No</th>
                                      <th scope="col">Rejection Date</th>
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
                                <td><?=date("d/m/Y",strtotime($student_result->doc_verified_date))?></td>
                                    <td><?=$student_result->student_name?></td>
                                    <td><?=$student_result->father_name?></td>
                                    <td><?=$student_result->mother_name?></td>
                                    <td><?=$student_result->mobile?></td>
                                    <td><?=$student_result->email?></td>
                                    <td><?=date("d/m/Y",strtotime($student_result->date_of_birth))?></td> 
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?=base_url();?>verify-now/<?=base64_encode($student_result->id)?>" class="btn btn-success">Verify Now</a>
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

