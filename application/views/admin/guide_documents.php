<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Document List of <?php if(!empty($qualification)){?><?=$qualification->name?><?php }?></h4><p class="card-description">
                 <p class="card-description">
                    All list of Qualification 
                  </p>
                  <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Qualification</th>
						<th>Year</th>
						<th>Board/University</th>
						<th>Marks</th>
						<th>Marksheet</th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($qualification) && $qualification->secondary_year !=""){?>
					<tr>
						<td>Secondary</td>
						<td><?=$qualification->secondary_year?></td>
						<td><?=$qualification->secondary_university?></td>
						<td><?=$qualification->secondary_subject?></td>
						<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/guide_pic/guide_document/'.$qualification->secondary_subject_marksheet)?>"><i class="mdi mdi mdi-eye"</i></a></td>
					</tr>
					<?php }?>
					<?php if(!empty($qualification) && $qualification->sr_secondary_year !=""){?>
					<tr>
						<td>Sr. Secondary</td>
						<td><?=$qualification->sr_secondary_year?></td>
						<td><?=$qualification->sr_secondary_university?></td>
						<td><?=$qualification->sr_secondary_subject?></td>
						<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/guide_pic/guide_document/'.$qualification->sr_secondary_subject_marksheet)?>"><i class="mdi mdi mdi-eye"</i></a></td>
					</tr>
					<?php }?>
					<?php if(!empty($qualification) && $qualification->graduation_year !=""){?>
					<tr>
						<td>Graduation</td>
						<td><?=$qualification->graduation_year?></td>
						<td><?=$qualification->graduation_university?></td>
						<td><?=$qualification->graduation_subject?></td>
						<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/guide_pic/guide_document/'.$qualification->graduation_subject_marksheet)?>"><i class="mdi mdi mdi-eye"</i></a></td>
					</tr>
					<?php }?>
					<?php if(!empty($qualification) && $qualification->post_graduation_year !=""){?>
					<tr>
						<td>Post Graduation</td>
						<td><?=$qualification->post_graduation_year?></td>
						<td><?=$qualification->post_graduation_university?></td>
						<td><?=$qualification->post_graduation_subject?></td>
						<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/guide_pic/guide_document/'.$qualification->post_graduation_subject_marksheet)?>"><i class="mdi mdi mdi-eye"</i></a></td>
					</tr>
					<?php }?>
					<?php if(!empty($qualification) && $qualification->phd_year !=""){?>
					<tr>
						<td>Ph.D.</td>
						<td><?=$qualification->phd_year?></td>
						<td><?=$qualification->phd_university?></td>
						<td><?=$qualification->phd_subject?></td>
						<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/guide_pic/guide_document/'.$qualification->phd_subject_marksheet)?>"><i class="mdi mdi mdi-eye"</i></a></td>
					</tr>
					<?php }?>
					<?php if(!empty($qualification) && $qualification->other_qualification_year !=""){?>
					<tr>
						<td>Other</td>
						<td><?=$qualification->other_qualification_year?></td>
						<td><?=$qualification->other_qualification_university?></td>
						<td><?=$qualification->other_qualification_subject?></td>
						<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/guide_pic/guide_document/'.$qualification->other_qualification_subject_marksheet)?>"><i class="mdi mdi mdi-eye"</i></a></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
                </div>
              </div>
            </div>
			<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Biodata & Aadhar card of <?php if(!empty($qualification)){?><?=$qualification->name?><?php }?></h4><p class="card-description">
                  <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Biodata</th>
						<th>Aadhar card</th>
					</tr>
				</thead>
				<tbody>
				    <tr>
						<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/guide_pic/guide_document/'.$qualification->biodata)?>"><i class="mdi mdi mdi-eye"></i></a></td>
					 
						<td><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/guide_pic/guide_document/'.$qualification->aadhar_card)?>"><i class="mdi mdi mdi-eye"></i></a></td>
				 
					</tr>
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
		buttons: [
			{
				extend: 'copyHtml5',
				exportOptions: {
				 columns: ':contains("Office")'
				}
			},
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5'
		],
    }); 
});
</script>
 