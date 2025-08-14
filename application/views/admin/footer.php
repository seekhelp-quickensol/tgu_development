<div id="feedback-form" class="feedback-form"> 
      <button type="button" class="feedback-form-btn btn btn-success btn-lg btn-enquiry" id="OpenForm"><b><i class="mdi mdi-calendar"></i></b></button> 
      <div class="feedback_form_area"> 
         <div class="form-head"> 
            <h3>List of issue dates</h3> 
         </div> 
         <div class="feedback_form_area_inner"> 
		 <div class="col-md-12"> 
				<div class="row">  
					<div class="col-md-6"> 
						<h4>Regular List</h4> 
						<table class="declare" style="450px;"> 
							<thead> 
								<tr> 
									<th>Sr.No</th> 
									<th>Exam Month</th> 
									<th>Exam Year</th> 
									<th>Result Declare Date </th> 
									<th>Marksheet Declare Date </th> 
								</tr> 
							</thead> 
							<tbody>	 
								<?php 
									$declare_dates = $this->Setting_model->get_declare_dates();
									$i=1;
									if(!empty($declare_dates)){
										foreach($declare_dates as $declare_dates_result){
								?>
								<tr> 
									<td><?=$i++?></td> 
									<td><?=$declare_dates_result->month?></td> 
									<td><?=$declare_dates_result->year?></td> 
									<td><?=date("d/m/Y",strtotime($declare_dates_result->result_declare_date))?></td> 
									<td><?=date("d/m/Y",strtotime($declare_dates_result->marksheet_issue_date))?></td> 
								</tr>  
								<?php }}?>
							</tbody>  
						</table> 
					</div> 
					<div class="col-md-6" style="display:none">  
						<h4>Blended List</h4> 
						<table class="declare" style="450px;"> 
							<thead> 
								<tr> 
									<th>Sr.No</th> 
									<th>Exam Month</th> 
									<th>Exam Year</th> 
									<th>Result Declare Date </th> 
									<th>Marksheet Declare Date </th> 
								</tr> 
							</thead> 
							<tbody>	 
								<tr> 
									<td>1</td> 
									<td>July</td> 
									<td>2021</td> 
									<td>01-11-2021</td> 
									<td>01-11-2021</td> 
								</tr> 					  
							</tbody>  
						</table> 
					</div> 
				</div> 
			</div> 
         </div> 
    </div> 
</div>


			<footer class="footer">

				<div class="footer-wrap">

					<div class="w-100 clearfix">

						<span class="d-block text-center text-sm-left d-sm-inline-block">
							<!-- Copyright © 2023  -->
							 <?php if(!empty($university_details)){ echo $university_details->copyright;}?></span>

						<?php /*<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><i class="mdi mdi-heart-outline"></i></span>*/?>

					</div>

				</div>

			</footer>

		</div>

	</div>

</div>

	<?php if($this->session->flashdata('success') !=""){?>

		<div class="alert alert-success animated fadeInUp">

			<strong>Success!</strong> <?=$this->session->flashdata('success')?>

		</div>

	<?php }else if($this->session->flashdata('message') !=""){?>

		<div class="alert alert-danger animated fadeInUp">

			<strong>Error!</strong> <?=$this->session->flashdata('message')?>

		</div>

	<?php }elseif(validation_errors()!=''){?>

		<div class="alert alert-danger animated fadeInUp">

			<strong>Error!</strong> <?=validation_errors()?>

		</div>

	<?php }?>
	<script src="<?=base_url();?>back_panel/js/jquery.min.js"></script>

    <script src="<?=base_url();?>back_panel/vendors/base/vendor.bundle.base.js"></script>

    <script src="<?=base_url();?>back_panel/js/template.min.js"></script>

    <script src="<?=base_url();?>back_panel/vendors/chart.js/Chart.min.js"></script>

    <script src="<?=base_url();?>back_panel/vendors/progressbar.js/progressbar.min.js"></script>

	<script src="<?=base_url();?>back_panel/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>

	<script src="<?=base_url();?>back_panel/vendors/justgage/raphael-2.1.4.min.js"></script>

	<script src="<?=base_url();?>back_panel/vendors/justgage/justgage.js"></script>

    <script src="<?=base_url();?>back_panel/js/dashboard.min.js"></script>

	<script src="<?=base_url();?>back_panel/vendors/typeahead.js/typeahead.bundle.min.js"></script>

	<script src="<?=base_url();?>back_panel/vendors/select2/select2.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/file-upload.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/typeahead.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/select2.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/jquery.validate.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/jquery.dataTables.min.js"></script> 

	<script src="<?=base_url();?>back_panel/js/dataTables.responsive.min.js"></script>

	

	<script src="<?=base_url();?>back_panel/js/dataTables.bootstrap.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/dataTables.buttons.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/jszip.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/pdfmake.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/vfs_fonts.js"></script>

	<script src="<?=base_url();?>back_panel/js/buttons.html5.min.js"></script> 

	<script src="<?=base_url();?>back_panel/js/dataTables.rowReorder.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/dataTables.responsive.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/dataTables.responsive.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/responsive.bootstrap4.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/buttons.print.min.js"></script>

	<script src="<?=base_url();?>back_panel/js/buttons.colVis.min.js"></script>

		<script src="<?=base_url();?>back_panel/js/apexchart.js"></script>

	<?php if($this->uri->segment(1) !="manage_blogs" && $this->uri->segment(1) !="course_stream_relation" && $this->uri->segment(1) !="create_subject_quiz" && $this->uri->segment(1) !="manage_news" && $this->uri->segment(1) !="manage_conference" && $this->uri->segment(1) != "add_daily_report" && $this->uri->segment(1) != "update_daily_report" && $this->uri->segment(1) != "assignments_mcq" && $this->uri->segment(1) != "manage_course" && $this->uri->segment(1) != "create_topic"){?>
	<!-- <script src="<?=base_url();?>back_panel/js/jquery-ui.js"></script> -->
	<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script> 
	<?php }?> 
	<script> 
		$(".alert").fadeTo(5000, 500).slideUp(500, function(){ 
			$(".alert").slideUp(500); 
		}); 
		$(document).ready(function(){ 
			$("#OpenForm").click(function(){ 
				$(".feedback_form_area").animate({ 
					width: "toggle" 
				}); 
			}); 
		});  
		$(document).ready(function() {
			$('.header_in').click(function() {
				$('.bottom-navbar').slideToggle();
			}); 
		});
	</script> 
  </body> 
</html>

