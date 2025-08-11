<?php
// echo "<pre>"; print_r($student);exit;
include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Appeared Entrance Examination Student List
				  </h4>
                  <p class="card-description">
                    <!-- All list of Student -->
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Student Name</th>
						<th>Email</th>
						<th>Mobile Number</th>
						<th>Exam Name</th>
						<th>Score</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=1;
					if(!empty($student)){ foreach($student as $student_result){
				?>
					<tr>
						<td><?=$i++?></td>
						<td><?=$student_result->student_name?></td>
						<td><?=$student_result->email_id?></td>
						<td><?=$student_result->mobile_number?></td>
						<td><?=$student_result->test_name?></td>
						<td><?=$student_result->score?></td>
						<td><?=date("d/m/Y",strtotime($student_result->date_of_exam))?></td>
						<td>
							<a type="button" title="Delete" data-toggle="tooltip" href="<?=base_url()?>clear_exam/<?=$student_result->email_id?>/<?=$student_result->test_id?>"  class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>			
							<?php if(date("Y-m-d",strtotime($student_result->created_on)) > "2022-05-25"){?>
							<a type="button" title="View" data-toggle="tooltip" href="<?=base_url()?>phd_exam_student_ans_book/<?=$student_result->student_exam_id?>/<?=$student_result->test_id?>"  class="btn btn-danger btn-sm"><i class="mdi mdi-eye"></i></a>
							<?php }?>
							<a type="button" title="Send Mail" data-toggle="tooltip" href="<?=base_url()?>send_phd_result_mail/<?=$student_result->id?>"  class="btn btn-danger btn-sm"><i class="mdi mdi-email"></i></a>
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
      
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
 <script>
$(document).ready(function() {
	$('#example').DataTable({
		dom:"Bfrtip",
	 	buttons: [
	 		{
				extend: "excelHtml5",
        		title:"Appeared Entrance Examination Student List",
	 			exportOptions: {
	 			//  columns: ':contains("Office")'
				 columns: [0, 1,2,3,4,5,6],
	 			}
	 		},
	 		// 'excelHtml5',
	 		// 'csvHtml5',
	 		// 'pdfHtml5'
	 	],
    }); 
	
});
</script>
 