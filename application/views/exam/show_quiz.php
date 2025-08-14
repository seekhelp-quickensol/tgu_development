<?php

// echo"<pre>";print_r($question_paper);exit;
include('header.php');
if($this->session->userdata('start_exam') == ""){
	$session = array(
		'start_exam' => '1',
		'start_time' => date("H:i:s")
	);
	$this->session->set_userdata($session);
}
$datatime = 60;
$examdate = date("Y-m-d");
$current_datetime = date("Y-m-d") . ' ' . date("H:i:s", strtotime(date('h:i:sa')));
$exam_start_time = $this->session->userdata('start_time');

$exam_start_time = date("Y-m-d H:i:s", strtotime($exam_start_time));
$duration = "60" . ' minute';
$end_time = strtotime($exam_start_time . '+' . $duration);
$exam_end_time = date('Y-m-d H:i:s', $end_time);
$remaining_minutes = strtotime($exam_end_time) - time();
?>
<link rel="stylesheet" href="<?=base_url();?>css/TimeCircles.css">
<style>
.sticky-top {
    top: 25px!important;
    z-index: 99;
}
.sticky {
    position: -webkit-sticky; /* for safari */
   position: sticky;
   width: 200px;
   float: left;
   top: 10px;
    z-index: 1020;
}
#exam_timer {
    width: 400px;
    height: 100px;
    margin-bottom: 10px;
}
small.codeType {
    position: absolute;
    top: -2px;
    right: 5px;
    font-weight: bold;
    color: #900;
}
h2,h3 {
    margin-top: 1.5em;
}

pre {
    position: relative;
}
.code {
    position: relative;
    font-family: Monaco,Menlo,Consolas,"Courier New",monospace;
    font-size: 13px;
    line-height: 1.428571429;
    color: #000;
    white-space: pre-line;
}

.nav li {
    list-style: none;
}
.nav li a {
    color: #60686F;
    display: block;
}
.nav li a:hover {
    text-decoration: none;
    background-color: rgb(238, 238, 238);
}
.nav li.active > a {
    border-right: solid #C0C8CF 2px;
    font-weight: bold;
}


.nav li.active {
}

.nav li ul {
    display: none;
}

.nav li.active ul {
    display: block;
}
#newsidebar {
    width: 100%;
    position: fixed;
    right: 15px;
	order:2
}

.stretch-card{
	order:1
}
@media (max-width:767px){
	#newsidebar {
		width: 100%;
    position: static;
    order: 1;
    margin-top: -81px;
}
	.stretch-card{
		order:2
	}
}
</style>
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
			
            <div class="col-md-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<h3>Examination : <?= $test_title?></h3>
					<p>Total Number of Questions: <?= count($question_paper)?></p>
					<p>Total Attepted Questions: <span id="totalAttemptedCount">0</span></p>
					<hr>
					<form class="forms-sample" name="question_paper_form" id="question_paper_form" method="post" enctype="multipart/form-data">
                		<input type="hidden" name="student_email" id="student_email"  value="<?= $student_email?>"/>
                		<input type="hidden" name="total_questions" id="total_questions"  value="<?= count($question_paper)?>"/>
                   	<?php
                   		for ($i=0; $i < count($question_paper); $i++) {
                   			$q_no = $i + 1;
                   			$question_set = $question_paper[$i];
                   			$text_data = json_decode($question_set->text_data);
                   			$options = $text_data->options->options;
                   			$fieldset_class = "question_".$question_set->id;
                   			
                   			?>
                   			<div class="row">
				              	<p style="font-size: 18px;font-weight: 600;margin-bottom: 10px;padding: 10px;width: 100%;background: #eee;"><?=$q_no?> : <?php if(is_string($text_data->options->question)){ echo str_replace('�',' ',str_replace('<p>',"",$text_data->options->question));} ?></p>
				              	<?php
				              	if(isset($text_data->options->img_data)){
				              		$img_data = $text_data->options->img_data;

				              		if($img_data){
				              			$img_src = base_url()."images/phd_quiz/".$img_data;
				              			?>
				              				<img src="<?= $img_src?>" height="100" width="100"> 
				              			<?php
				              		}
				              	}
				              	
				              	?>
				              	<div class="input-group mb-12" id='<?= $fieldset_class?>'>
									<fieldset class='<?=$fieldset_class?>'>
									    <ul style="list-style: none;width: 100%;">
											<input type="hidden" name="question[]"  value="<?=$question_set->id?>">
											
            				              	<?php 
            				              		for ($j=0; $j < count($options); $j++) {
            				              			$op_data = $options[$j];
            				              			?>
            										<li style="display: inline-block;width: 49%;"> 
														<input type="radio" value="<?=($j+1)?>" data-question-id="<?=$question_set->id?>" name="option<?=$question_set->id?>[]"> <?php if(is_string($op_data)) { echo str_replace('�',' ',$op_data); } ?>
														
													</li>
            											
            												  
            				              			<?php
            				              		}
            				              	?>
            				              	<!-- <button type="button" class="btn btn-primary" style="margin-top: 10px;margin-bottom: 15px;padding: 5px 10px;display: block;" onclick="clearSelectedAns('<?= $fieldset_class?>')">Clear</button> -->
    				              	    </ul>
    				              	</fieldset>
										
								</div>
				             </div>
							 <div class="clearfix"></div>
                   			<?php
                   		}
                   	?>
                
                </div>
				<button class="btn btn-primary mb-2" type="submit" id="submit_question">Submit</button>
            	</form>
                </div>
              </div>
			  <div class="col-md-3 sticky-top" id="newsidebar">
				<div class="card">
					<div class="card-body">
						<div class="example" id="exam_timer" data-timer="<?=$remaining_minutes;?>"></div>
					</div>
				</div>
			</div>
            </div>
        </div>
			
	


	
	<?php include('footer.php');?>
	<script src="<?=base_url();?>back_panel/js/TimeCircles.js"></script>
<script>
/*$(".example").TimeCircles({count_past_zero: false}).addListener(countdownComplete);
	
function countdownComplete(unit, value, total){
	if(total<=1){
		//$("#question_paper_form").submit();
	}
}*/
$("#exam_timer").TimeCircles({ 
	time:{Days:{show:false},Hours:{show:true}}
});
setInterval(function(){
	var remaining_second = $("#exam_timer").TimeCircles().getTime();
	if(remaining_second < 1){
		//$("#exam_timer").TimeCircles().end().fadeOut();
		document.getElementById("question_paper_form").submit();
	}
}, 1000);


 function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
$(document).on("keydown", disableF5);
});

history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
history.pushState({ page: 1 }, "Title 1", "#no-back");
window.onhashchange = function (event) {
  window.location.hash = "no-back";
};



	$(document).ready(function() {


	});

	function clearSelectedAns(class_name){
		$('input:radio[name='+class_name+ ']').each(function () { $(this).prop('checked', false); });
	}

//window.open ("https://www.theglobaluniversity.edu.in/show_exam/","mywindow","status=1,toolbar=0");

</script>



<script>
$(document).ready(function() {
    var attemptedCounts = {};

    $(document).on('click', 'input[type="radio"]', function() {
        var questionId = $(this).data('question-id');
        updateCount(questionId);	
    });
    function updateCount(questionId) {
        var selectedCount = $('input[name="option' + questionId + '[]"]:checked').length;
        attemptedCounts[questionId] = selectedCount;
        $('#attemptedCount_' + questionId).text(selectedCount);
        var sum = Object.values(attemptedCounts).reduce(function (acc, count) {
            return acc + count;
        }, 0);
        $('#totalAttemptedCount').text(sum);
        console.log('Sum of Attempted Counts:', sum);
    }
});
</script>




