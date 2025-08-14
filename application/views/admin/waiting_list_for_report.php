<?php include('header.php');?>
<link rel="stylesheet" src="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Waiting for report List</h4>
                  <p class="card-description">
                    All list of waiting report
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Name</th> 
							<th>Action</th> 
						</tr>
					</thead>
					<tbody>
						<?php $i=1;if(!empty($faculty)){ foreach($faculty as $faculty_result){?>
						<tr>
							<td><?=$i++?></td>
							<td><?=$faculty_result->first_name.' '.$faculty_result->last_name?></td>
							<td><a class="btn <?php if($faculty_result->reminder_date == date("Y-m-d")){?>btn-success<?php }else{?>btn-primary<?php }?>" href="<?=base_url();?>send_report_reminder/<?=$faculty_result->id?>"><?php if($faculty_result->reminder_date == date("Y-m-d")){?>Reminder Sent <?php }else{?>Send Reminder<?php }?></a></td>
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

</script>
 