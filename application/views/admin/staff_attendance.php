<?php include('faculty_header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Staff Attendance List</h4><p class="card-description">
                 	<p class="card-description">
                    	All list of Staff Attendance
                    	<div style="float:right;">
                    		<form method="get">
		                  		<div class="col-md-12">
		                  			<input type="text" class="form-control datepicker" autocomplete="off" id="date" name="date" placeholder="Select Month">
		                  		</div>
		                  	</form>
                    	</div>
                  	</p>
                  	
                  	<div class="clearfix"></div>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Name</th>
						<th>Total Present Days</th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($staff)){
						$sr = 1;foreach($staff as $staff_result){
						$total = $this->Faculty_model->get_total_attendance($staff_result->id);	
					?>
					<tr>
						<td><?=$sr++?></td>
						<td><?=$staff_result->first_name?> <?=$staff_result->last_name?></td>
						<td><?=$total?></td>
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
$('#example').DataTable({
	    "lengthChange": false,
		"responsive": true,
		"cache": false,
		 
		buttons:[
			
			{
				extend: "excelHtml5",
				 
			}
		],
		dom:"Bfrtip",
		
		 
    });
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
$("#date").change(function(){
	window.location.href='<?=base_url();?>staff_attendance?date='+$("#date").val();
});
</script>
 
