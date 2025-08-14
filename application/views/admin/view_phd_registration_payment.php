<?php 

include('header.php');?>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-6 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                   <h4 class="card-title">Qualification List of <?php if(!empty($student)){?><a target="_blank" href="<?=base_url();?>print_admission_form/<?=$student->id?>"><?=$student->student_name?></a><?php }?></h4><p class="card-description">

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

					<?php if(!empty($student) && $student->secondary_year !=""){?>

					<tr>

						<td>Secondary</td>

						<td><?=$student->secondary_year?></td>

						<td><?=$student->secondary_board?></td>

						<td><?=$student->secondary_percentage?></td>

						<!-- <td><a target="_blank" href="<?=base_url();?>images/phd_registration/<?=$student->secondary_marksheet?>"><i class="mdi mdi mdi-eye"></i></a></td> -->
						<td>
							<?php if (!empty($student->secondary_marksheet)): ?>
								<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/phd_registration/' . $student->secondary_marksheet)?>" download><i class="mdi mdi mdi-eye"></i></a>
							<?php endif; ?>
						</td>
					</tr>

					<?php }?>

					<?php if(!empty($student) && $student->sr_secondary_year !=""){?>

					<tr>

						<td>Sr. Secondary</td>

						<td><?=$student->sr_secondary_year?></td>

						<td><?=$student->sr_secondary_board?></td>

						<td><?=$student->sr_secondary_percentage?></td>

						<!-- <td><a target="_blank" href="<?=base_url();?>images/phd_registration/<?=$student->sr_secondary_marksheet?>"><i class="mdi mdi mdi-eye"></i></a></td> -->
						<td>
							<?php if (!empty($student->sr_secondary_marksheet)){ ?>	
								<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/phd_registration/' . $student->sr_secondary_marksheet)?>" download><i class="mdi mdi mdi-eye"></i></a>
							<?php } ?>
						</td>

					</tr>

					<?php }?>

					<?php if(!empty($student) && $student->graduation_year !=""){?>

					<tr>

						<td>Graduation</td>

						<td><?=$student->graduation_year?></td>

						<td><?=$student->graduation_board?></td>

						<td><?=$student->graduation_percentage?></td>

						<!-- <td><a target="_blank" href="<?=base_url();?>images/phd_registration/<?=$student->graduation_marksheet?>"><i class="mdi mdi mdi-eye"></i></a></td> -->
						<td>
							<?php if (!empty($student->graduation_marksheet)): ?>		
								<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/phd_registration/' . $student->graduation_marksheet)?>" download><i class="mdi mdi mdi-eye"></i></a>
							<?php endif; ?>
						</td>

					</tr>

					<?php }?>

					<?php if(!empty($student) && $student->post_graduation_year !=""){?>

					<tr>

						<td>Post Graduation</td>

						<td><?=$student->post_graduation_year?></td>

						<td><?=$student->post_graduation_board?></td>

						<td><?=$student->post_graduation_percentage?></td>

						<!-- <td><a target="_blank" href="<?=base_url();?>images/phd_registration/<?=$student->post_graduation_marksheet?>"><i class="mdi mdi mdi-eye"></i></a></td> -->
						<td>
							<?php if (!empty($student->post_graduation_marksheet)): ?>		
								<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/phd_registration/' . $student->post_graduation_marksheet)?>" download><i class="mdi mdi mdi-eye"></i></a>
							<?php endif; ?>
						</td>

					</tr>

					<?php }?>

					<?php if(!empty($student) && $student->mphil_year !=""){?>

					<tr>

						<td>Mphil</td>

						<td><?=$student->mphil_year?></td>

						<td><?=$student->mphil_board?></td>

						<td><?=$student->mphil_percentage?></td>

						<!-- <td><a target="_blank" href="<?=base_url();?>images/phd_registration/<?=$student->mphil_marksheet?>"><i class="mdi mdi mdi-eye"></i></a></td> -->
						<td>
							<?php if (!empty($student->mphil_marksheet)): ?>		
								
							<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/phd_registration/' . $student->mphil_marksheet)?>" download><i class="mdi mdi mdi-eye"></i></a>
							<?php endif; ?>
					
						</td>

					</tr>

					<?php }?>

					<?php if(!empty($student) && $student->other_year !=""){?>

					<tr>
						<td>Other</td>

						<td><?=$student->other_year?></td>

						<td><?=$student->other_board?></td>

						<td><?=$student->other_percentage?></td>

						<!-- <td><a target="_blank" href="<?=base_url();?>images/phd_registration/<?=$student->other_marksheet?>"><i class="mdi mdi mdi-eye"></i></a></td> -->
						<td>
							<?php if (!empty($student->other_marksheet)): ?>				
								<a target="_blank"  href="<?=$this->Digitalocean_model->get_photo('images/phd_registration/' . $student->other_marksheet)?>" download><i class="mdi mdi mdi-eye"></i></a>
							<?php endif; ?>	
						</td>

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

 