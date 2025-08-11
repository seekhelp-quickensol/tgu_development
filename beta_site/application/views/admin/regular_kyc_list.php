<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">New KYC List</h4><p class="card-description">
                 <p class="card-description">
                    
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Enrollment Number</th>
                        <th>Student Name</th>
                        <th>KYC Date</th> 
                        <th>Document</th>
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
                        <td><?=$kyc_result->enrollment_number?></td> 
                        <td><?=$kyc_result->student_name?></td> 
                        <td><?=date("d/m/Y",strtotime($kyc_result->create_date))?></td> 
                        <td>
							<a target="_blank" href="<?=base_url()?>student_qualification/<?=$kyc_result->id?>">Documents</a>
						</td>
                        <td>
							<a target="_blank" download href="https://personalkyc.org/uploads/video_kyc/<?=$kyc_result->video?>">View Video</a>
						</td>
						<td>
						<a href="<?=base_url();?>delete/<?=$kyc_result->kyc_id?>/tbl_regular_video_kyc" onclick="return confirm('Are you sure to delete this record?');" class="btn btn-danger">Delete</a>
						<a href="<?=base_url();?>approve_regular_kyc/<?=$kyc_result->kyc_id?>" onclick="return confirm('Are you sure to approve this record?');" class="btn btn-info">Approve</a>
						<!-- <a href="<?=base_url();?>reject_regular_kyc/<?=$kyc_result->kyc_id?>" onclick="return confirm('Are you sure to reject this record?');" class="btn btn-danger">Reject</a> -->
            <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong" onclick="return click_popup(<?=$kyc_result->kyc_id;?>)">Reject</a>
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
      
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reject KYC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="response">
             
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong2" onclick="return click_popup2()">Approve</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong3" onclick="return click_popup3()">Reject</button>
      </div> -->
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
function click_popup(str){
            $.ajax({
                type: "POST",
                url: "<?=base_url();?>admin/Ajax_controller/get_reject_popup_regular",
                data: {'id': str},
                success: function(data) { 
                    $("#response").html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
</script>
 