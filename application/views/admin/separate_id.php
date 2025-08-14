<?php $profile = $this->Admin_model->get_profile();$university_details = $this->Setting_model->get_university_details();$access = $this->Setting_model->get_user_privilege_link();error_reporting('e_all');?><meta charset="UTF-8">	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	<title>Welcome to <?php if (!empty($university_details)) {							echo $university_details->university_name;						} ?></title>	<link rel="stylesheet" href="<?= base_url() ?>back_panel/vendors/mdi/css/materialdesignicons.min.css">	<link rel="stylesheet" href="<?= base_url() ?>back_panel/vendors/base/vendor.bundle.base.css">	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/style.css">	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/croppie.min.css">	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/vendors/base/vendor.bundle.base.css">	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/vendors/select2/select2.min.css">	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">	<link href="<?= base_url(); ?>back_panel/css/jquery.dataTables.min.css" rel="stylesheet">	<link href="<?= base_url(); ?>back_panel/css/dataTables.bootstrap.min.css" rel="stylesheet">	<link href="<?= base_url(); ?>back_panel/css/responsive.dataTables.min.css" rel="stylesheet">	<link href="<?= base_url(); ?>back_panel/css/buttons.dataTables.min.css" rel="stylesheet">	<!--<link href="https://nightly.datatables.net/css/jquery.dataTables.min.css" rel="stylesheet">		<link href="https://nightly.datatables.net/buttons/css/buttons.dataTables.min.css" rel="stylesheet">		<link href="https://nightly.datatables.net/responsive/css/responsive.dataTables.min.css" rel="stylesheet">		<link href="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.2.1/b-html5-2.2.1/datatables.min.css" rel="stylesheet">-->	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">	<link rel="stylesheet" href="<?= base_url(); ?>back_panel/css/responsive.bootstrap4.min.css">	<!-- <link rel="shortcut icon" href="<?= $this->Digitalocean_model->get_photo('images/logo/' . $university_details->logo) ?>" /> -->	<link rel="shortcut icon" href="<?= base_url('images/logo/' . $university_details->logo) ?>" />	<link href="<?= base_url(); ?>back_panel/css/jquery.css" rel="stylesheet">	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />	<!-- <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet"> -->

    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          
		  <button id="btn" class="btn btn-primary">Print</button>
		  <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
			
		   <div id="print_id" style="width: 1000px;height:335px;border:4px solid #0566b1;margin:0px auto;margin-top: 50px;position: relative;background:#fff;">
	<div style="width: 487px;border-right: 3px solid #0566b1;height:335px;float:left;">
					<div style="text-align: center;height: 85px;"><img style="width: 348px;margin-top:2px" src="<?=base_url();?>images/logo/logo.png"></div>
					<div style="height:40px;background: linear-gradient(to right, #b73710, #184098);padding-top:9px;text-align: center;">	
					<p style="margin:0px;font-size: 14px;font-family: arial;font-weight: 600;text-transform: uppercase;color: #fff;">Student ID Card</p></div>
					<div style="position:relative;padding: 10px 0px;">
						<table style="width:84%;font-family:arial;font-size:14px">
							
							<tr>
								<td style="padding:10px;font-weight:600;width:40%">Registration No:</td>
								<td style="padding:10px;"><?=$student_profile->id?></td>
							</tr>
							<tr>
								<td style="padding:8px;font-weight:600;">Student Name:</td>
								<td style="padding:8px;"><?=$student_profile->student_name?></td>
							</tr>
							<tr>
								<td style="padding:8px;font-weight:600;">Father's/ Husband Name:</td>
								<td style="padding:8px;"><?=$student_profile->father_name?></td>
							</tr>
							<tr>
								<td style="padding:8px;font-weight:600;">Faculty:</td>
								<td style="padding:8px;"><?=$student_profile->faculty_name?></td>
							</tr>
						</table>
						<div style="position:absolute;right:30px;top:10px;">
							<img src="<?=$this->Digitalocean_model->get_photo('images/separate_student/photo/'.$student_profile->photo)?>" style="height:100px;border-radius: 6px;">
						</div>
					</div>
		</div>
				<div style="width:505px;height:335px;float:left;position: relative;" >
					<img src="<?=$this->Digitalocean_model->get_photo('images/logo/bir.png')?>" style="position: absolute;right: 0;top: 9px;">
					
					<div style="position:relative;padding: 10px 0px;">
						<table style="width:84%;font-family:arial;font-size:14px">
							<tr>
								<td style="padding:10px;font-weight:600;width:40%">Course : </td>
								<td style="padding:10px;"> <?=$student_profile->course_name?> in <?=$student_profile->stream_name?> </td>
							</tr>
							<tr>
								<td style="padding:10px;font-weight:600;width:40%">Registration Date:</td>
								<td style="padding:10px;"><?=date("d/m/Y",strtotime($student_profile->admission_date))?></td>
							</tr>
							
							<tr>
								<td style="padding:8px;font-weight:600;">Address:</td>
								<td style="padding:8px;"><?=$student_profile->address?> - <?=$student_profile->mobile?></td>
							</tr>
							<tr>
								<td style="padding:8px;font-weight:600;">Signature:</td>
								<td style="padding:8px;">
								    <!--<img style="width:150px;height:100px" src="<?=$this->Digitalocean_model->get_photo('images/signature/'.$student_profile->signature)?>">--></td>
							</tr>
						</table>
						
					</div>
					<div style="position:absolute;left:0px;right:0;bottom:0px;background: linear-gradient(to right, #b73710, #184098);height: 45px;width: 509px;"><p style="text-align: center;color: #fff;font-family: arial;font-size: 14px;margin: 0px;padding-top: 14px;font-weight: 600;">www.theglobaluniversity.edu.in</p></div>
		</div>
		</div>
	</div>
	</div>
	
        </div>
       	<script src="<?=base_url();?>back_panel/js/jquery.min.js"></script>    <script src="<?=base_url();?>back_panel/vendors/base/vendor.bundle.base.js"></script>    <script src="<?=base_url();?>back_panel/js/template.min.js"></script>    <script src="<?=base_url();?>back_panel/vendors/chart.js/Chart.min.js"></script>    <script src="<?=base_url();?>back_panel/vendors/progressbar.js/progressbar.min.js"></script>	<script src="<?=base_url();?>back_panel/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>	<script src="<?=base_url();?>back_panel/vendors/justgage/raphael-2.1.4.min.js"></script>	<script src="<?=base_url();?>back_panel/vendors/justgage/justgage.js"></script>    <script src="<?=base_url();?>back_panel/js/dashboard.min.js"></script>	<script src="<?=base_url();?>back_panel/vendors/typeahead.js/typeahead.bundle.min.js"></script>	<script src="<?=base_url();?>back_panel/vendors/select2/select2.min.js"></script>	<script src="<?=base_url();?>back_panel/js/file-upload.min.js"></script>	<script src="<?=base_url();?>back_panel/js/typeahead.min.js"></script>	<script src="<?=base_url();?>back_panel/js/select2.min.js"></script>	<script src="<?=base_url();?>back_panel/js/jquery.validate.min.js"></script>	<script src="<?=base_url();?>back_panel/js/jquery.dataTables.min.js"></script> 	<script src="<?=base_url();?>back_panel/js/dataTables.responsive.min.js"></script>		<script src="<?=base_url();?>back_panel/js/dataTables.bootstrap.min.js"></script>	<script src="<?=base_url();?>back_panel/js/dataTables.buttons.min.js"></script>		<script src="<?=base_url();?>back_panel/js/jszip.min.js"></script>	<script src="<?=base_url();?>back_panel/js/pdfmake.min.js"></script>	<script src="<?=base_url();?>back_panel/js/vfs_fonts.js"></script>	<script src="<?=base_url();?>back_panel/js/buttons.html5.min.js"></script> 	<script src="<?=base_url();?>back_panel/js/dataTables.rowReorder.min.js"></script>	<script src="<?=base_url();?>back_panel/js/dataTables.responsive.min.js"></script>	<script src="<?=base_url();?>back_panel/js/dataTables.responsive.min.js"></script>	<script src="<?=base_url();?>back_panel/js/responsive.bootstrap4.min.js"></script>	<script src="<?=base_url();?>back_panel/js/buttons.print.min.js"></script>	<script src="<?=base_url();?>back_panel/js/buttons.colVis.min.js"></script>		<script src="<?=base_url();?>back_panel/js/apexchart.js"></script>	<?php if($this->uri->segment(1) !="create_mail" && $this->uri->segment(1) !="course_stream_relation" && $this->uri->segment(1) !="create_subject_quiz" && $this->uri->segment(1) !="manage_news" && $this->uri->segment(1) !="manage_conference" && $this->uri->segment(1) != "add_daily_report" && $this->uri->segment(1) != "update_daily_report" && $this->uri->segment(1) != "assignments_mcq" && $this->uri->segment(1) != "manage_course" && $this->uri->segment(1) != "create_topic"){?>	<script src="<?=base_url();?>back_panel/js/jquery-ui.js"></script>	<?php }?>	
<script>

function printData()
{
   var divToPrint=document.getElementById("print_id");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
</script>
 