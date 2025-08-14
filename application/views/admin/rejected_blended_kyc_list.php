<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Rejected KYC List</h4><p class="card-description">
                 <p class="card-description">
                    
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Enrollment Number</th>
                        <th>Student Name</th>
                        <th>KYC Date</th> 
                        <th>Documents</th> 
                        <th>Video</th>
                        <th>Remark</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
				<?php 
				$i=1;
				if(!empty($kyc)){ foreach($kyc as $kyc_result){?>
                    <tr>
                        <td><?=$i++?></td> 
                        <td><?=$kyc_result->enrollment_number?></td> 
                        <td><?=$kyc_result->student_name?></td> 
                        <td><?=date("d/m/Y",strtotime($kyc_result->create_date))?></td> 
						<td>
							<?php 
							if($kyc_result->document != ""){
								$files = $this->Digitalocean_model->get_photo('images/separate_student/'.$kyc_result->document);
								?> 
								<a data-toggle='tooltip' title='View Document' href="<?=$files?>" target='_blank' class='btn btn-success btn-sm'><i class='mdi mdi mdi-eye'></i></a>
								<?php 
							}else{
								echo "NA";
							}
							?>
						</td>
                        <td>
							<a target="_blank" download href="https://personalkyc.org/uploads/video_kyc/<?=$kyc_result->video?>">View Video</a>
						</td>
            <td><?=$kyc_result->reject_remark;?></td>
						<td>
						<a href="<?=base_url();?>delete/<?=$kyc_result->kyc_id?>/tbl_blended_video_kyc" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger">Delete</a>
						<a href="<?=base_url();?>approve_blen_kyc/<?=$kyc_result->kyc_id?>" onclick="return confirm('Are you sure to approve this record?');" class="btn btn-info">Approve</a>
						<a href="<?=base_url();?>send_new_blen_kyc/<?=$kyc_result->kyc_id?>" onclick="return confirm('Are you sure to send to new this record?');" class="btn btn-danger">Send To New</a>
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
        extend: "excelHtml5",
         "ordering": false 
    });
    
});
</script>
 