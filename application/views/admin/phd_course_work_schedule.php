<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
		  <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">Course Work Schedule
				  </h4>
                  <p class="card-description">
                    Please enter Schedule Date
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" >
                      <?php if(!empty($edit_data)): ?>
                        <input type="hidden" name="id" value="<?=$edit_data->id;?>">
                      <?php endif; ?>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Schedule date *</label>
                      <input type="text" class="form-control" id="schedule_date" name="schedule_date" placeholder="date" value="<?php if(!empty($edit_data)){echo $edit_data->schedule_date;}?>">
					  
					  <div class="error" id="course_error"></div>
                    </div>
                   
                    
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
		  
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">Course Work Schedule List
				  </h4>
                  <p class="card-description">
                    <!-- All list of Schedule dates -->
                  </p>
				  
                  <table id="example" class="table dt-responsive " style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Schedule date</th>
						<th>Status</th>
						<th>Action</th> 
					</tr>
				</thead>
				<tbody >
					<?php $zz =1; foreach($all_data as $all_d): ?>
                        <tr>
                            <td><?=$zz++;?></td>
                            <td><?=$all_d->schedule_date;?></td>
                            <td>
                            <?php if($all_d->status == "1"){ 
                              echo "Active";
                              }else{
                              echo "Deactive";
                             } ?>

                          </td>

                            <td>
                                <?php if($all_d->status=="1"): ?>
                                    <a onclick="return confirm('Are you sure, you want to deactivate this record?')" data-toggle='tooltip' title='Deactivate' href="<?=base_url("inactive/".$all_d->id."/tbl_phd_course_work_schedules")?>" class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a> 
                                <?php else: ?>
                                    <a onclick="return confirm('Are you sure, you want to activate this record?')" data-toggle='tooltip' title='Activate' href="<?=base_url("active/".$all_d->id."/tbl_phd_course_work_schedules")?>" class='btn btn-danger btn-sm'><i class='mdi mdi-playlist-remove'></i></a>
                                <?php endif; ?>
                                <a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle='tooltip' title='Permanently Delete' href="<?=base_url("delete/".$all_d->id."/tbl_phd_course_work_schedules")?>" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>

									<a type='button' title='Edit' data-toggle='tooltip' href="<?=base_url("phd_course_work_schedule/".$all_d->id)?>"  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
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
	
	$('#single_form').validate({
		rules: {
			schedule_date: {
				required: true,
			},
			
		},
		messages: {
			schedule_date: {
				required: "Please enter Schedule date",
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
}); 

// $("#example").DataTable();

$('#example').DataTable({
		dom:"Bfrtip",
	 	buttons: [
	 		{
				extend: "excelHtml5",
        title:"Course Work Schedule List",
	 			exportOptions: {
	 			//  columns: ':contains("Office")'
				 columns: [0, 1,2],
	 			}
	 		},
	 		// 'excelHtml5',
	 		// 'csvHtml5',
	 		// 'pdfHtml5'
	 	],
    }); 
	

$("#schedule_date").datepicker({
    dateFormat:"dd-mm-yy",
});
</script>
 