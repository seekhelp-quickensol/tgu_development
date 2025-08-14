<?php include('exam_header.php');
if(empty($exam)){ 
	redirect('exam-dashboard');
}
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
$duration = $exam->exam_duration . ' minute';
$end_time = strtotime($exam_start_time . '+' . $duration);
$exam_end_time = date('Y-m-d H:i:s', $end_time);
$remaining_minutes = strtotime($exam_end_time) - time();

?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=TeX-MML-AM_CHTML' async></script>
<style>

#exam_timer {
    width: 400px;
    height: 100px;
    margin-bottom: 10px;
}
	.content {
		display: none;
	}
	button {
		margin-top: 30px;
	}
	.back {
		display: none;
	}
	.next {
		margin-left: 50px;
	}
	.end {
		display: none;
	}
</style>

<link rel="stylesheet" href="<?=base_url();?>css/TimeCircles.css">
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-lg-6 grid-margin grid-margin-md-0">
							<div class="card">
								<div class="card-body">
									<div class="row">
									<div class="col-lg-6">
										<h3 class="bold_bx" style="margin-top: 50px;"><?php if(!empty($exam)){ echo $exam->exam_name;}?></h3> 
									</div>
									<div class="col-lg-6">
										<div class="example" id="exam_timer" data-timer="<?=$remaining_minutes;?>"></div>
									</div>
									</div>
								</div>
								<div class="card-body col-lg-12">
									
									<form method="post" name="question_paper_form" id="question_paper_form">
										<div class="content-holder">
											<input type="hidden" name="exam_id" value="<?php if(!empty($exam)){ echo $exam->id;}?>">
											<?php $k=1; if(!empty($question)){ foreach($question as $question_result){?>
											<div class="content" id="content-<?=$k?>" data-id='<?=$k?>' <?php if($k==1){?>style="display: block;"<?php }?>>
												<p>Q.No <?=$k?> -> <?=$question_result->question?></p>
												<input type="hidden" name="question[]" value="<?=$question_result->id?>">
												<input type="radio" class="selection" id="<?=$k?>" name="option<?=$question_result->id?>[]" value="1"> <?=$question_result->option_a?> <br />
												<input type="radio" class="selection" id="<?=$k?>" name="option<?=$question_result->id?>[]" value="2"> <?=$question_result->option_b?> <br />
												<input type="radio" class="selection" id="<?=$k?>" name="option<?=$question_result->id?>[]" value="3"> <?=$question_result->option_c?> <br />
												<input type="radio" class="selection" id="<?=$k?>" name="option<?=$question_result->id?>[]" value="4"> <?=$question_result->option_d?> <br /> 
											</div>
											<?php $k++;}}?> 
											<button type="button" class="back btn btn-danger">Back</button>
											<button type="button" class="next btn btn-primary">Next</button>
										</div>
										<div class="end" data-id='<?=count($question)+1?>'>
											<p>Congratulation! You are done!</p>
											<button type="button" class="edit-previous btn btn-success">Edit Previous Options</button>
											<button type="submit" class="edit-previous btn btn-success">Submit</button>
										</div>
									</form>	
								</div>	
							</div>
						</div>
					 
						
						<div class="col-lg-6 grid-margin grid-margin-md-0">
							<div class="card">
								<div class="card-body col-lg-12">
									<h3 class="bold_bx">Question Statics</h3>
									<div class="row icons-list">
										<?php $j=1; if(!empty($question)){ foreach($question as $question_result){?>
											<div class="card-body col-lg-2 target_question" id="show-<?=$j?>" style="text-align: center;">
												<p>Q.No <br><?=$j?></p> 
											</div>
										<?php $j++;}}?> 
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<?php include('footer.php');?>
<script>
/*
MathJax.Hub.Config({
 "HTML-CSS": { scale:100,linebreaks: { automatic: true } },
		SVG: {scale: 100, linebreaks: { automatic: true } }
});*/
$(".selection").click(function(){
	var ids = $(this).attr("id"); 
	$("#show-"+ids).css('background-color','green');
	$("#show-"+ids).css('color','#fff');
});
$(".target_question").click(function(){
	var val = $(this).attr("id");
	val  = val.split('-');
	//alert(val[1]);
	 $('.content').hide();
    $('.end').hide();
    $('.content-holder').show();
    $('#content-'+val[1]).show();
	if(val[1] == "1"){
		$(".back").hide();
	}
});
  $('body').on('click', '.next', function() { 
    var id = $('.content:visible').data('id');
    var nextId = $('.content:visible').data('id')+1;
    $('[data-id="'+id+'"]').hide();
    $('[data-id="'+nextId+'"]').show();
	if(nextId > <?=count($question)+1?>){
		$('.content-holder').hide();
        $('.end').show();
	}
    if($('.back:hidden').length == 1){
        $('.back').show();
    }

    if(nextId == <?=count($question)+1?>){
        $('.content-holder').hide();
        $('.end').show();
    }
});

$('body').on('click', '.back', function() { 
    var id = $('.content:visible').data('id');
    var prevId = $('.content:visible').data('id')-1;
    $('[data-id="'+id+'"]').hide();
    $('[data-id="'+prevId+'"]').show();

    if(prevId == 1){
        $('.back').hide();
    }    
});

$('body').on('click', '.edit-previous', function() { 
    $('.content').hide();
    $('.end').hide();
    $('.content-holder').show();
    $('#content-'+<?=count($question)?>).show();
});
</script>
<script src="<?=base_url();?>back_panel/js/TimeCircles.js"></script>
<script>
$("#exam_timer").TimeCircles({ 
	time:{Days:{show:false},Hours:{show:true}}
});
setInterval(function(){
	var remaining_second = $("#exam_timer").TimeCircles().getTime();console.log(remaining_second);
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
