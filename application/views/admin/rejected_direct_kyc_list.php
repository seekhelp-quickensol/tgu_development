<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Rejected Direct KYC List</h4><p class="card-description">
                 <p class="card-description">
                    
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>KYC Date</th>   
                        <!-- <th>Documents</th>    -->
                        <th>Remark</th>   
                        <th>Video</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
				<?php 
				$i=1;
				if(!empty($kyc)){ foreach($kyc as $kyc_result){?>
                    <tr>
                        <td><?=$i++?></td> 
                        <td><?=$kyc_result->name?></td> 
                        <?php if($kyc_result->created_on != ""){?>
                        <td><?=date("d/m/Y",strtotime($kyc_result->created_on))?></td> 
                        <?php }else{ ?>
                          <td>NA</td> 
                        <?php } ?>
                        <td><?=$kyc_result->reject_remark?></td> 
						<!-- <td>
							<a target="_blank" href="<?=base_url()?>student_qualification/<?=$kyc_result->id?>">Documents</a>
						</td> -->
						<td>
							<a target="_blank" download href="https://personalkyc.org/uploads/video_kyc/<?=$kyc_result->video?>">View Video</a>
						</td>
						<td>
						<a href="<?=base_url();?>delete/<?=$kyc_result->id?>/tbl_direct_video_kyc" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger">Delete</a>
						<a href="<?=base_url();?>approve_direct_kyc/<?=$kyc_result->id?>" onclick="return confirm('Are you sure to approve this record?');" class="btn btn-info">Approve</a>
						<!-- <a href="<?=base_url();?>send_new_regular_kyc/<?=$kyc_result->id?>" onclick="return confirm('Are you sure to send to new this record?');" class="btn btn-danger">Send To New</a> -->
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
 