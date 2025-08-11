<?php 
// echo "<pre>";print_r($student);exit;
include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <!-- <h4 class="card-title">Qualification List of <?php if(!empty($student)){?><a target="_blank" href="<?=base_url();?>print_admission_form/<?=$student->id?>"><?=$student->student_name?></a><?php }?></h4><p class="card-description"> -->
					<h4 class="card-title">Qualification List of 
						<?php if(!empty($student)){?>
							<a target="_blank" href="<?=base_url();?>print_admission_form/<?=$student->id?>"><?=$student->student_name?></a>
						<?php }?>
					</h4>

				   <p class="card-description">
                    All list of Qualification 
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
						<td><?=$qualification->secondary_marks?></td>
						<td><a class="btn btn-danger btn-sm" target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->secondary_marksheet)?>"><i class="mdi mdi mdi-download"></i></a></td>
					</tr>
					<?php }?>
					<?php if(!empty($qualification) && $qualification->sr_secondary_year !=""){?>
					<tr>
						<td>Sr. Secondary</td>
						<td><?=$qualification->sr_secondary_year?></td>
						<td><?=$qualification->sr_secondary_university?></td>
						<td><?=$qualification->sr_secondary_marks?></td>
						<td><a class="btn btn-danger btn-sm" target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->sr_secondary_marksheet)?>"><i class="mdi mdi mdi-download"></i></a></td>
					</tr>
					<?php }?>
					<?php if(!empty($qualification) && $qualification->graduation_year !=""){?>
					<tr>
						<td>Graduation</td>
						<td><?=$qualification->graduation_year?></td>
						<td><?=$qualification->graduation_university?></td>
						<td><?=$qualification->graduation_marks?></td>
						<td><a class="btn btn-danger btn-sm" target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->graduation_marksheet)?>"><i class="mdi mdi mdi-download"></i></a></td>
					</tr>
					<?php }?>
					<?php if(!empty($qualification) && $qualification->post_graduation_year !=""){?>
					<tr>
						<td>Post Graduation</td>
						<td><?=$qualification->post_graduation_year?></td>
						<td><?=$qualification->post_graduation_university?></td>
						<td><?=$qualification->post_graduation_marks?></td>
						<td><a class="btn btn-danger btn-sm" target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->post_graduation_marksheet)?>"><i class="mdi mdi mdi-download"></i></a></td>
					</tr>
					<?php }?>
					<?php if(!empty($qualification) && $qualification->other_qualification_year !=""){?>
					<tr>
						<td>Other</td>
						<td><?=$qualification->other_qualification_year?></td>
						<td><?=$qualification->other_qualification_university?></td>
						<td><?=$qualification->other_qualification_marks?></td>
						<td><a class="btn btn-danger btn-sm" target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/qualification/'.$qualification->other_qualification_marksheet)?>"><i class="mdi mdi mdi-download"></i></a></td>
					</tr>
					<?php }?>
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
 