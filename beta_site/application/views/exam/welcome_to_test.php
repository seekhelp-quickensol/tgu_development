<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Quiz</title>
		<link rel="stylesheet" href="<?=base_url()?>back_panel/vendors/mdi/css/materialdesignicons.min.css">
		<link rel="stylesheet" href="<?=base_url()?>back_panel/vendors/base/vendor.bundle.base.css">
		<link rel="stylesheet" href="<?=base_url();?>back_panel/css/style.css">
		<link rel="stylesheet" href="<?=base_url();?>back_panel/vendors/base/vendor.bundle.base.css">
		<link rel="stylesheet" href="<?=base_url();?>back_panel/vendors/select2/select2.min.css">
		<link rel="stylesheet" href="<?=base_url();?>back_panel/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
		<link href="<?=base_url();?>back_panel/css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="<?=base_url();?>back_panel/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_url();?>back_panel/css/responsive.dataTables.min.css" rel="stylesheet">
		<link href="<?=base_url();?>back_panel/css/buttons.dataTables.min.css" rel="stylesheet">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="<?=base_url();?>back_panel/css/responsive.bootstrap4.min.css">
		<link rel="shortcut icon" href="<?=base_url();?>images/logo/<?php if(!empty($university_details) && $university_details->logo != ""){ echo $university_details->logo;}else{ echo "demologo.png";}?>" />
		<style>
			.error{
				color:red;
			}
		</style>
		<script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>
	</head>
	<body>
	<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
              <div class="card container">
                <h3>Quiz Name : <?= $test_title?></h3>
              	<h3>Student Email : <?= $student_email?></h3>
              	<input type="hidden" id="student_email" value="<?= $student_email ?>" name="student_email"/>
                <div class="card-body">
                	<h3>Instructions to Test</h3>
                	<p>1. </p>

                	<?php 
                		$test_id = $this->uri->segment(2);
                		$test_url = base_url().'show_quiz/'.$test_id;
                	?>
                	<a class="btn btn-success" target="_blank" href="<?= $test_url?>">Start Test</a>
                </div>
                
              </div>

          </div>
	</body>
</html>

<script>
	$(document).ready(function() {


	});

</script>