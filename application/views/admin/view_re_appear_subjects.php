<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title"><?php if(!empty($single)){ echo $single->enrollment_number;} ?> Re Appear Subject for <?php if(!empty($single)){ echo $single->year_sem;} ?> year/sem</h4><p class="card-description">
                 <p class="card-description"> 
                  </p>
					 
					<div class="clearfix"></div><br>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th> 
						<th>Subject Code</th>  
						<th>Subject Name</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sr=1;
					if(!empty($subjects)){ foreach($subjects as $subjects_result){?>
						<tr>
							<td><?=$sr++?></td> 
							<td><?=$subjects_result->subject_code?></td>
							<td><?=$subjects_result->subject_name?></td> 
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
                        filename: 'Success Re Appear List',
                        exportOptions: {
                            columns: [0,1,2] 
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
 