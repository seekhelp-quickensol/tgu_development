
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
	
				<div class="col-md-4 grid-margin stretch-card">
					     <div class="card">
                <div class="card-body">
					<h3>Appear Examination's</h3>
                   <?php 
						$i=1;
						$a=0;
						if(!empty($exam_list)){ foreach($exam_list as $exam_list_result){	
						echo date('h:i A');
						if($exam_list_result->start_time <= date('h:i A') && $exam_list_result->end_time >= date('h:i A')){
						?>
                	<p><?=$i++?>. <?=$exam_list_result->exam_name?> </p>
                <a class="btn btn-success" href="<?=base_url()?>my_course_work_exam/<?=$exam_list_result->id?>">Start Test</a>
					<?php } }}else{ ?>
						<div class="no-data-no-exam">
							<img src="<?=base_url()?>/back_panel/images/no-results.png" alt="">
							<h5 >No Exam Pending !</h5>
						</div>
						    
					 <?php  } ?>
					<!-- <br> -->
              </div>
            </div>
					
				</div>
				<div class="col-md-4 grid-margin stretch-card">
					     <div class="card">
                <div class="card-body">
					<h3>Appeared Examination's</h3>
				 <table class="table" >
				 	<tr>
				 		<th>Sr.No</th>
				 		<th>Exam Name</th>
				 		<th>Exam Date</th>
				 	</tr>
				 	<tbody>
				 		<?php 
						$i=1;
						if(!empty($exam_list_appeared)){ foreach($exam_list_appeared as $exam_list_appeared_result){
						
					?> 
				 		<tr>
				 			<td><?=++$a;?></td>
				 			<td><?=$exam_list_appeared_result->exam_name?></td>
				 			<td><?=date('d-m-Y',strtotime($exam_list_appeared_result->exam_date))?></td>
				 		</tr>
				 	<?php  } }else{?>
				 	     <tr>
				 			<td  colspan="3">No appeared exam found ! </td>
				 		</tr>
					 <?php  } ?>
				 	</tbody>
				 </table>

					<!-- <br> -->
              </div>
            </div>
					
				</div>
         
  
        </div>
			
	
<?php include('footer.php');?>
<script>
	$(document).ready(function() {


	});

</script>