<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Subject List <a href="<?=base_url();?>center-subject-list" class="btn btn-primary mr-2 float-right">Add New</a></h4><p class="card-description">
                 <p class="card-description">
                    All list of Subject <?php if(!empty($subject)){?>[<?=$subject[0]->course_name?> | <?=$subject[0]->stream_name?>]<?php }?>
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Subject Code</th>
							<th>Subject Name</th>
							<th>Course</th>
							<th>Stream</th>
							<th>Subject Type</th>
							<th>Mode</th>
							<th>Year/Sem</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
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
		"processing": true,
		"serverSide": true,
		"cache": false,
		"order": [[0, "asc" ]],
		dom:"Bfrtip",
		buttons: [
			{
				extend: "excelHtml5",
				title:"Subject List ",
				messageBottom: 'The information in this table is copyright to the global University.',
				exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8],
                }
			}
		 
			// 'csvHtml5',
 
		],
		"ajax":{
			"url": "<?=base_url();?>center/Center_ajax_controller/get_all_added_subject",
			"type": "POST",
		},		
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    }); 
}); 
</script>
