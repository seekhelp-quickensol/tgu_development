<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Progress Report List</h4><p class="card-description">
                 <p class="card-description">
                    
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Enrollment Number</th>
                        <th>Student Name</th>
                        <th>KYC Date</th> 
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
                        <td><a target="_blank" download href="<?=base_url();?>uploads/video_kyc/<?=$kyc_result->video?>">View Video</a></td> 
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
         
    });
    
});
</script>
 