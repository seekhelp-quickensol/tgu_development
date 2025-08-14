
<?php include('header.php');?>

<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row" style="min-height:500px">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Welcome : <?=$this->session->userdata('student_name');?></h4>
					<h3>Student Email : <?=$this->session->userdata('student_email');?></h3>
                </div>
              </div>
            </div>
			<div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<h3>Examination's</h3>
                   <?php 
						$i=1;
						if(!empty($exam_list)){ foreach($exam_list as $exam_list_result){
						$score = $this->Quiz_model->get_score_of_student($this->session->userdata('student_email'),$exam_list_result->id);
						//echo $score;exit;
					?>
                	<p><?=$i++?>. <?=$exam_list_result->test_name?> </p>
					<?php /*if(!empty($score)){?>(Score-<?=$score->score?>) <?php }*/?>
                	<?php 
					if(empty($score)){
                	?>
                	<a class="btn btn-success" href="show_exam/<?=$exam_list_result->id?>">Start Test</a>
					<?php } }}?>
              </div>
            </div>
          </div>
        </div>
			
	
<?php include('footer.php');?>
<script>
	$(document).ready(function() {


	});

</script>