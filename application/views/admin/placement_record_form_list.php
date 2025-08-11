<?php include('header.php');?>
<style>
.clearfix{
	clear:both
	margin-top:10px;
	margin-bottom:20px;
}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">

      
        <div class="content-wrapper">
          <div class="row">
         
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
              
                <div class="card-body">
                <h4 class="card-title">Placement List</h4>
              
				    <div class="clearfix"></div>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Enrollment Number</th> 
						<th>Student Name</th> 
						<th>Mobile Number</th>
						<th>Email ID</th>
						<th>Course Name</th>
						<th>Passout Year</th>
						<th>Employment Type</th>
						<th>Orgnization Name</th>
						<th>Department Name</th>
						<th>Designation</th>
						<th>Country</th>
						<th>State</th>
						<th>City</th> 
					</tr>
				</thead>
				<tbody>
                <?php $i=1;if(!empty($placement_record_form_list)){ foreach($placement_record_form_list as $placement_record_form_list_result){?>
					<td><?=$i++?></td>
                    <td><?=$placement_record_form_list_result->enrollment_no?></td>
                    <td><?=$placement_record_form_list_result->student_name?></td>
                    <td><?=$placement_record_form_list_result->mobile?></td>
                    <td><?=$placement_record_form_list_result->email?></td>
                    <td><?=$placement_record_form_list_result->course_name?></td>
                    <td><?=$placement_record_form_list_result->passout_year?></td>
                    <td><?=$placement_record_form_list_result->employment_type?></td>
                    <td><?=$placement_record_form_list_result->organization?></td>
                    <td><?=$placement_record_form_list_result->department?></td>
                    <td><?=$placement_record_form_list_result->designation?></td>
                    <td><?=$placement_record_form_list_result->country_name?></td>
                    <td><?=$placement_record_form_list_result->state_name?></td>
                    <td><?=$placement_record_form_list_result->city_name?></td>
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
<!-- <script>
    
	$('#example').DataTable({ });
</script> -->

<script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            $('#example').DataTable({ 
            dom: 'Bfrtip',
            responsive: true,
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
             
                buttons: [
                    // {
                    //     extend: 'copy',
                    //     filename: 'broker-list-bumpload',
                    //     exportOptions: {
                    //         columns: [0,1,2,3,4,5,6,7] 
                    //     }
                    // },
                    // {
                    //     extend: 'csv',
                    //     filename: 'broker-list-bumpload',
                    //     exportOptions: {
                    //         columns: [0,1,2,3,4,5,6,7] 
                    //     }
                    // },
                    {
                        extend: 'excel',
                        filename: 'Placement Record List',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13] 
                        }
                    },
                    // {
                    //     extend: 'pdf',
                    //     filename: 'broker-list-bumpload',
                    //     exportOptions: {
                    //         columns: [0,1,2,3,4,5,6,7] 
                    //     }
                    // },
                    // {
                    //     extend: 'print',
                    //     filename: 'broker-list-bumpload',
                    //     exportOptions: {
                    //         columns: [0,1,2,3,4,5,6,7] 
                    //     }
                    // }
                    
                ], 
        });
        </script>
 