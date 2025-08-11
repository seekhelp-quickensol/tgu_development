<?php include('header.php');?>
 <style>
ol.vertical li {
    display: block;
    margin: 5px;
    padding: 5px;
    border: 1px solid #cccccc; 
}
.drag_icon{
	cursor: pointer;
	padding-left: 0px;
}
</style>
   <section class="py-5 main-page">
         <div class="container">
            <div class="row">
            	<!-- left sidebar start -->
               <div class="col-lg-3 right mb-3">
                  <div class="sticky left-section">
                     <ul class="nav nav-tabs">
                        <li><a class="active font-17" data-toggle="tab" href="#basic"><?php //if(!empty($exams)){ echo $exams->exam_name;}?></a></li>
                     </ul>
                     <div class="tab-content p-0">
                        <div id="basic" class="tab-pane fade show active">
                           <div class="header">
                              <div class="dropdown-menu-show"> 
                              </div>                           
                           </div>
                           <div class="main_que_list">
                            <a class="dropdown-item py-2 active">All Questions</a>
                              <div class="paginator">
                                 <ul class="total_question" >
									<?php
									$qst = 1;
									if(!empty($mcq)){ foreach($mcq as $mcq_result){?>
									<li id="mcqli_<?=$mcq_result->id?>"><a href="#mcq_<?=$mcq_result->id?>"><span><?=$qst++?></span></a></li>	
									<?php }}?> 
									<?php /* 
									if(!empty($fill)){ foreach($fill as $fill_result){?>
									<li id="fillli_<?=$fill_result->id?>"><a href="#fill_<?=$fill_result->id?>"><span><?=$qst++?></span></a></li>	
									<?php }}*/?> 
									<?php /*
									if(!empty($one_word)){ foreach($one_word as $one_word_result){?>
									<li id="oneli_<?=$one_word_result->id?>"><a href="#one_<?=$one_word_result->id?>"><span><?=$qst++?></span></a></li>	
									<?php }}*/?> 
									<?php 
									if(!empty($picture)){ 
									foreach($picture as $picture_result){
										$picture_question = $this->Front_model->get_picture_selected_question($picture_result->id);
										if(!empty($picture_question)){ foreach($picture_question as $picture_question_res){
									?>
									<li id="pictureli_<?=$picture_question_res->id?>"><a href="#picture_<?=$picture_question_res->id?>"><span><?=$qst++?></span></a></li>	
									<?php }}}}?> 
									<?php /*
									if(!empty($tick_mark)){ foreach($tick_mark as $tick_mark_result){?>
									<li id="tickli_<?=$tick_mark_result->id?>"><a href="#tick_<?=$tick_mark_result->id?>"><span><?=$qst++?></span></a></li>	
									<?php }}*/?> 
									<?php 
									if(!empty($passage)){ 
									foreach($passage as $passage_result){
										$passage_question = $this->Front_model->get_passage_selected_question($passage_result->id);
										if(!empty($passage_question)){ foreach($passage_question as $passage_question_res){
									?>
									<li id="passageli_<?=$passage_question_res->id?>"><a href="#passage_<?=$passage_question_res->id?>"><span><?=$qst++?></span></a></li>	
									<?php }}}}?> 
									<?php /*
									if(!empty($match)){ foreach($match as $match_result){?>
									<li id="matchli_<?=$match_result->id?>"><a href="#match_<?=$match_result->id?>"><span><?=$qst++?></span></a></li>	
									<?php }}*/?> 
                                 </ul>
                              </div>
                              <div class="clearfix"></div>
							  <!--
                              <div class="quick_guideline">
                                  <p><b>Quick Guidelines</b></p>
                                  <ul>
                                      <li>-There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</li>
                                      <li>-The majority have suffered alteration in some form.</li>
                                      <li>-Variations of passages of Lorem Ipsum available</li>
                                      <li>-Lorem Ipsum is therefore always free from repetition.</li>
                                      <li>-It uses a dictionary of over 200 Latin words, combined with a handful of model</li>
                                  </ul>
                              </div>-->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- left sidebar end -->
               
               <!-- right qna section start -->
               <div class="col-lg-9">
                  <div class="bg-white rounded shadow-sm sidebar-page-right_qna">
                     <div class="">
                        
                        
                           <h6 class="qna_timer mr-2 mt-2 ">
						   
							<?php
							  $diff_minutes = 0;
								if(!empty($exams)){ 
									$datetime_1 = date("Y-m-d").$exams->start_time; 
									$datetime_2 = date("Y-m-d").$exams->end_time;  
									$from_time = strtotime($datetime_1); 
									$to_time = strtotime($datetime_2); 
									$diff_minutes = round(abs($from_time - $to_time) / 60,2);
									 
								}
							  ?> 
							
                             <div class="countdown" id="time">
							  
							  </div>
                           </h6>
                           <hr class="hr mt-0">
                           
                        <div class="container">  
								<div class="questions">
									<?php $sr=1;
									if(!empty($mcq)){?>
									<div class="mcq_question">
										<?php foreach($mcq as $mcq_result){?>
												<div class="ques_Box mcq_ques_Box_<?=$mcq_result->id?>" id="mcq_<?=$mcq_result->id?>">
													<p><span></span>
														<strong><?=$sr++?> : <?=$mcq_result->question?></strong>
													</p>
												  <input type="hidden" id="question_id" name="question_id[]" value="<?=$mcq_result->id?>"> 
												  <ul>
													<li>
														<div class="form-check">
														   <input class="mcq_select_ans" type="radio" name="mcq_select_ans_<?=$mcq_result->id?>" id="<?=$mcq_result->option_a?>" value="A" onclick="return submit_mcq('<?=$mcq_result->option_a?>','<?=$mcq_result->id?>','1')">
														   <label class="form-check-label" for="">
														   <?=$mcq_result->option_a?>
														   </label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="mcq_select_ans" type="radio" name="mcq_select_ans_<?=$mcq_result->id?>" id="<?=$mcq_result->option_b?>" value="B" onclick="return submit_mcq('<?=$mcq_result->option_b?>','<?=$mcq_result->id?>','1')">
														   <label class="form-check-label" for="">
														   <?=$mcq_result->option_b?>
														   </label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="mcq_select_ans" type="radio" name="mcq_select_ans_<?=$mcq_result->id?>" id="<?=$mcq_result->option_c?>" value="C" onclick="return submit_mcq('<?=$mcq_result->option_c?>','<?=$mcq_result->id?>','1')">
															<label class="form-check-label" for="">
																<?=$mcq_result->option_c?>
															</label>
														</div>
													</li>
													<li>
														<div class="form-check">
															<input class="mcq_select_ans" type="radio" name="mcq_select_ans_<?=$mcq_result->id?>" id="<?=$mcq_result->option_d?>" value="D"  onclick="return submit_mcq('<?=$mcq_result->option_d?>','<?=$mcq_result->id?>','1')">
															<label class="form-check-label" for="">
																<?=$mcq_result->option_d?>
															</label>
														</div>
													</li>
													</ul>
												  <!--<button class="btn btn-sm btn-success submit-btn_mcq" onclick="submit_mcq('')" >submit</button>-->
												  <div class="clearfix"></div>
											   </div>
										<?php }?>
									</div>
									<?php }?>
								
									<?php /*if(!empty($fill)){?>
									<div class="fill_blank">
										<?php foreach($fill as $fill_result){
												$fill_exp = explode(",",$fill_result->fill_blank_option); 
												$replace_bank = '
													<select  name="fill_answer[]" class="fill_cls_'.$fill_result->id.'" onchange="submit_fill_in_blank('.$fill_result->id.','.$fill_result->id.');">
													<option>select correct</option>';
													if(!empty($fill_exp)){ 
														for($f=0;$f<count($fill_exp);$f++){
															$replace_bank .='<option value="'.$fill_exp[$f].'">'.$fill_exp[$f].'</option>';
														}
													}
												$replace_bank .='</select>';
										?>
											<div class="wrapper_box" style="font-size:16px;" id="fill_<?=$fill_result->id?>">
											 <?=$sr++?> :<?=str_replace('blank_space',$replace_bank,$fill_result->question)?>                                                                                                                                                                                                                                                                                                             
												
												
											</div>
										<?php }?>
									</div>
									<?php }?>
									
									<?php if(!empty($one_word)){?>
									<div class="one_word">
										<?php foreach($one_word as $one_word_result){
											$fill_exp = explode(",",$one_word_result->fill_blank_option);
												$replace_bank = '
													<select class="cc_inline one_word_cls_'.$one_word_result->id.'" name="answer[]" onchange="submit_one_word('.$one_word_result->id.','.$one_word_result->id.');">
													<option>select correct</option>';
												 if(!empty($fill_exp)){ 
														for($f=0;$f<count($fill_exp);$f++){
												$replace_bank .='	
													<option value="'.$fill_exp[$f].'">'.$fill_exp[$f].'</option>';
													
												}}
												$replace_bank .='</select>';
										?>
										<div class="wrapper_box" style="font-weight:bold; font-size:16px;" id="one_<?=$one_word_result->id?>">
											<?=$sr++?> :<?=str_replace('blank_space',$replace_bank,$one_word_result->question)?>  
												
											</div>
										<?php }?>
									</div>
									<?php }*/?>
									
									<?php if(!empty($picture)){?>
									<div class="picture_type">
										<?php foreach($picture as $picture_result){
											$pic_exp = explode(",",$picture_result->question_image);
											$picture_question = $this->Front_model->get_picture_selected_question($picture_result->id);
											?>
											<p><?=$picture_result->question_description?></p>
											<div class="row">
											<?php for($im=0;$im<count($pic_exp);$im++){
													if($pic_exp[$im] != ""){
											?>
											<div class="col-md-6">
												<div style="background-image: url('<?=$this->Digitalocean_model->get_photo('uploads/question_image/'.$pic_exp[$im])?>');display: block;height: 150px;background-repeat: no-repeat;background-size: 100% 100%;">
												</div> 
												</div> 
											<?php }}?>
											</div>
											<div class="ques_Box">
											<?php if(!empty($picture_question)){
													foreach($picture_question as $picture_question_result){
											?>
											 <p id="picture_<?=$picture_question_result->id?>"><?=$sr++?> :
											 <strong><?=$picture_question_result->question?>
											</strong>
											 </p>
											 <div class="form-check passage_mg">
												<input class="select_answer_12" type="radio" name="exampleRadios<?=$picture_question_result->id?>" value="<?=$picture_question_result->option_a?>" onchange="return submit_picture('<?=$picture_question_result->option_a?>','<?=$picture_question_result->id?>',4);">
												<span class="form-check-label" for="" style="font-size: 16px; padding-left: 11px;">
												<?=$picture_question_result->option_a?>
												</span>
											 </div>
											 <div class="form-check passage_mg">
												<input class="select_answer_12" type="radio" name="exampleRadios<?=$picture_question_result->id?>"  value="<?=$picture_question_result->option_b?>" onchange="return submit_picture('<?=$picture_question_result->option_b?>','<?=$picture_question_result->id?>',4);">
												<span class="form-check-label" for="" style="font-size: 16px; padding-left: 11px;">
												<?=$picture_question_result->option_b?>
												</span>
											 </div>
											 <div class="form-check passage_mg">
												<input class="select_answer_12" type="radio" name="exampleRadios<?=$picture_question_result->id?>"  value="<?=$picture_question_result->option_a?>" onchange="return submit_picture('<?=$picture_question_result->option_c?>','<?=$picture_question_result->id?>',4);">
												<span class="form-check-label" for="" style="font-size: 16px; padding-left: 11px;">
												<?=$picture_question_result->option_c?>
												</span>
											 </div>
											 <div class="form-check passage_mg">
												<input class="select_answer_12" type="radio" name="exampleRadios<?=$picture_question_result->id?>"  value="<?=$picture_question_result->option_d?>" onchange="return submit_picture('<?=$picture_question_result->option_d?>','<?=$picture_question_result->id?>',4);">
												<span class="form-check-label" for="" style="font-size: 16px; padding-left: 11px;">
												<?=$picture_question_result->option_d?>
												</span>
											 </div>
											 
											<?php }}?>
											 <div class="clearfix"></div>
										  </div>
										<?php }?>
									</div>
									<?php }?>
									
									<?php /*if(!empty($tick_mark)){?>
									<div class="tick_mark">
										<?php foreach($tick_mark as $tick_mark_result){?>
										<div class="options" style="font-weight:bold;" id="tick_<?=$tick_mark_result->id?>">
										<span><?=$sr++?> :</span>
										<?=$tick_mark_result->question?>
										<br><br>
										<label title="item1">
										<input class="select_answer_110" type="radio" name="radio<?=$tick_mark_result->id?>" value="<?=$tick_mark_result->option_a?>" onchange="return submit_tick_mark('<?=$tick_mark_result->option_a?>','<?=$tick_mark_result->id?>',5);">
											<img><span class="option_align"><?=$tick_mark_result->option_a?> </span>
										</label>
										<br>
										<label title="item1">
											<input class="select_answer_110" type="radio" name="radio<?=$tick_mark_result->id?>" value="<?=$tick_mark_result->option_a?>" onchange="return submit_tick_mark('<?=$tick_mark_result->option_a?>','<?=$tick_mark_result->id?>',5);">
											<img><span class="option_align"><?=$tick_mark_result->option_b?></span>
										</label>
										<br>
									</div>
										<?php }?>
									</div>
									<?php }*/?>
									
									<?php if(!empty($passage)){?>
									<div class="passage_reading">
										 <p>
											 <strong>Please read the passage and give answer to below questions</strong>
										</p>
										<?php foreach($passage as $passage_result){
											$passage_question = $this->Front_model->get_passage_selected_question($passage_result->id);
											?>
											<p><?=$passage_result->passage?></p>
											<div class="ques_Box">
											<?php if(!empty($passage_question)){
													foreach($passage_question as $passage_question_result){
											?>
											 <p id="passage_<?=$passage_question_result->id?>"><?=$sr++?> :
											 <strong><?=$passage_question_result->question?>
											</strong>
											 </p>
											 <div class="form-check passage_mg">
												<input class="select_answer_12" type="radio" name="exampleRadio<?=$passage_question_result->id?>" value="<?=$passage_question_result->option_a?>" onchange="return submit_passage('<?=$passage_question_result->option_a?>','<?=$passage_question_result->id?>',6);">
												<span class="form-check-label" for="" style="font-size: 16px; padding-left: 11px;">
												<?=$passage_question_result->option_a?>
												</span>
											 </div>
											 <div class="form-check passage_mg">
												<input class="select_answer_12" type="radio" name="exampleRadio<?=$passage_question_result->id?>" value="<?=$passage_question_result->option_b?>" onchange="return submit_passage('<?=$passage_question_result->option_b?>','<?=$passage_question_result->id?>',6);">
												<span class="form-check-label" for="" style="font-size: 16px; padding-left: 11px;">
												<?=$passage_question_result->option_b?>
												</span>
											 </div>
											 <div class="form-check passage_mg">
												<input class="select_answer_12" type="radio" name="exampleRadio<?=$passage_question_result->id?>" value="<?=$passage_question_result->option_c?>" onchange="return submit_passage('<?=$passage_question_result->option_c?>','<?=$passage_question_result->id?>',6);">
												<span class="form-check-label" for="" style="font-size: 16px; padding-left: 11px;">
												<?=$passage_question_result->option_c?>
												</span>
											 </div>
											 <div class="form-check passage_mg">
												<input class="select_answer_12" type="radio" name="exampleRadio<?=$passage_question_result->id?>" value="<?=$passage_question_result->option_d?>" onchange="return submit_passage('<?=$passage_question_result->option_d?>','<?=$passage_question_result->id?>',6);">
												<span class="form-check-label" for="" style="font-size: 16px; padding-left: 11px;">
												<?=$passage_question_result->option_d?>
												</span>
											 </div>
											 
											<?php }}?>
											 <div class="clearfix"></div>
										  </div>
										<?php }?>
									</div>
									<?php }?>
									
									<?php /*if(!empty($match)){?>
									<div class="match_the_following">									
										<?php foreach($match as $match_result){?>
										<p id="match_<?=$match_result->id?>"><?=$sr++?>: <?=$match_result->question?></p>
											<div class="res_match" style="font-size: 16px; display:flex;">
											 <div class=" respons_match_the_f">
												<ul id="non-sortable" class="respn_mobile_h">
												   <li><span class="break"><?=$match_result->question_a?></span></li>
												   <li><span class="break"><?=$match_result->question_b?> </span></li>
												   <li><span class="break"><?=$match_result->question_c?></span></li>
												   <li><span class="break"><?=$match_result->question_d?></span></li>
												   <li><span class="break"><?=$match_result->question_e?></span></li>
												</ul>
											 </div>
											 <div class="respons_match_the_f" style="padding: 0px;">
												<ul class="euqal_alignment">
												   <li>=</li>
												   <li>=</li>
												   <li>=</li>
												   <li>=</li>
												   <li>=</li>
												</ul>
											 </div>

											 <div class=" respons_match_the_f ">
												<div class="sortable ui-sortable" id="sortable<?=$match_result->id?>">
													<ol class="simple_with_drop vertical">
														
														<li id="<?=$match_result->id?>-5" class="sortIt_<?=$match_result->id?> drag_match_t_f tool ui-sortable-handle" style="" >
														  <?=$match_result->answer_e?>
														 <i class="fa fa-arrows drag_icon"></i>
														</li>
														<li id="<?=$match_result->id?>-4" class="sortIt_<?=$match_result->id?> drag_match_t_f tool ui-sortable-handle"> 
														  <?=$match_result->answer_d?>
														  <i class="fa fa-arrows drag_icon"></i>
														</li>
														<li id="<?=$match_result->id?>-3" class="sortIt_<?=$match_result->id?> drag_match_t_f tool ui-sortable-handle">
														  <?=$match_result->answer_c?>
														  <i class="fa fa-arrows drag_icon"></i>
														</li>
														<li id="<?=$match_result->id?>-2" class="sortIt_<?=$match_result->id?> drag_match_t_f tool ui-sortable-handle" style="">
															<?=$match_result->answer_b?>
														 <i class="fa fa-arrows drag_icon"></i>
														</li>
														<li id="<?=$match_result->id?>-1" class="sortIt_<?=$match_result->id?> drag_match_t_f tool ui-sortable-handle">
														  <?=$match_result->answer_a?>
														 <i class="fa fa-arrows drag_icon"></i>
														</li> 
													</ol>
													  
													<!--<div id="5" class="sortIt drag_match_t_f tool ui-sortable-handle"><span class="break"><?=$match_result->answer_e?> </span> 
														<div><i class="fa fa-arrows drag_icon"></i></div> 
														<span class="tooltiptext">Drag to the match</span>
													</div>
													<div id="4" class="sortIt drag_match_t_f tool ui-sortable-handle"><span class="break"><?=$match_result->answer_d?></span>
														<div><i class="fa fa-arrows drag_icon"></i></div>
														<span class="tooltiptext">Drag to the match</span> 
													</div>
													<div id="3" class="sortIt drag_match_t_f tool ui-sortable-handle"><span class="break"><?=$match_result->answer_c?></span>
													<div><i class="fa fa-arrows drag_icon"></i></div>
														<span class="tooltiptext">Drag to the match</span>
													</div>
													<div id="2" class="sortIt drag_match_t_f tool ui-sortable-handle"><span class="break"><?=$match_result->answer_b?></span>
														<div><i class="fa fa-arrows drag_icon"></i></div>
														<span class="tooltiptext">Drag to the match</span>
													</div>
													<div id="1" class="sortIt drag_match_t_f tool ui-sortable-handle"><span class="break"><?=$match_result->answer_a?></span>
														<div><i class="fa fa-arrows drag_icon"></i></div>
														<span class="tooltiptext">Drag to the match</span>  
													</div>-->
												</div>
											 </div>
										  </div>  
										 
										
										<?php }?>
									</div>
									<?php }*/?>
								</div>
								<form method="post" id="submit_exam">
									<input type="hidden" name="exam_id" value="<?=$this->uri->segment(2)?>">
									<input type="hidden" name="attempt" value="<?=$papaer_set->id?>">
									<div id="all_answer">
										
									</div>
									<div class="ml-4">
										<button class="btn btn-sm btn-green mt-2 ml-2 mb-2" onclick="submit_test()" style="background-color: green;">Submit Test</button>                     
									</div>
								</form>
							</div> 
                        
                     </div>
                  </div>
               </div>
               <!-- right qna section end -->
            </div>
         </div>
   </section>

<?php include('footer.php'); ?>
<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable.js"></script> 
<input type="hidden" value="<?=$diff_minutes?>" id="htime">
<script>
/*
var minutes = 0;
var seconds = 0;
function startTimer(duration, display) {
  var timer = duration,
      minutes, seconds;
  setInterval(function() {
    minutes = parseInt(timer / 60, 10);
    seconds = parseInt(timer % 60, 10);

    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    display.textContent = minutes + ":" + seconds;

    setCookie("minutes", minutes.toString(), 1);
    setCookie("seconds", seconds.toString(), 1);
	if (timer < 59) {
        var f = document.getElementById("time"); f.style.color="#ff0000";
    setInterval(function(){
    $('#time').shake();
    },300); 
        }
    if (--timer < 0) {
      timer = 0;
	  $("#submit_exam").submit();
    }
  }, 1000);
}


window.onload = function() {
   var minutes_data = getCookie("minutes");
   var seconds_data = getCookie("seconds");
   var timer_amount = (60*'<?=$diff_minutes?>'); //default
    if (!minutes_data || !seconds_data){
      //no cookie found use default
    }
    else{
      console.log(minutes_data+" minutes_data at start");
      console.log(seconds_data+" seconds_data at start");
      console.log(parseInt(minutes_data*60)+parseInt(seconds_data));
			timer_amount = parseInt(minutes_data*60)+parseInt(seconds_data)
    }

  var fiveMinutes = timer_amount,
      display = document.querySelector('#time');
  startTimer(fiveMinutes, display); //`enter code here`
};

 function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + "; " + expires;
 } 
 
 function getCookie(cname) {
 var name = cname + "=";
 var ca = document.cookie.split(';');
 for(var i=0; i<ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1);
    if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
 }
 return "";
} */

</script>
 
<script type="text/javascript"> 

$("ol.simple_with_drop").sortable({ 
  group: 'no-drop',
  handle: 'li.drag_match_t_f',
  connectWith: '.sortable',
  onDragStart: function ($item, container, _super) {
    if(!container.options.drop) 
      $item.clone().insertAfter($item);
    _super($item, container);
	 
	var current = $("li.drag_match_t_f").attr("id");
		submit_match(current);  
	},  
	
});

function submit_match(id) {
	type = 7;
	var ids = id.split("-");
	$("#"+ids[0]+'-'+type).remove(); 
	$("#matchli_"+ids[0]).css("background-color","#1fc9c9;");
	var answers = '';
	$(".sortIt_"+id[0]).each(function(){
		var expected_resilt = $(this).attr("id");
		expected_resilt = expected_resilt.split("-");
		answers = answers+','+expected_resilt[1];
	});
  $("#all_answer").append('<input type="hidden" name="question[]" id='+ids[0]+'-'+type+' value="'+ids[0]+'-'+answers+'-7">'); 
}
$("ol.simple_with_no_drop").sortable({
  group: 'no-drop',
  drop: false
});
$("ol.simple_with_no_drag").sortable({
  group: 'no-drop',
  drag: false
});

/*
$('.sortable').sortable({
	items: '.tool',
	connectWith: '.sortable',
	over: function (e, ui) {
	   $(ui.sender).sortable('instance').scrollParent = $(e.target) 
	}
});*/  
function submit_mcq(option,question,type){
	$("#mcqli_"+question).css("background-color","#1fc9c9;");
	var question_id = question+'-'+type;
	$("#"+question_id).remove();
	$("#all_answer").append('<input type="hidden" name="question[]" id='+question+'-'+type+' value="'+question+'-'+option+'-1">'); 
}
function submit_fill_in_blank(class_name,question){
	$("#fillli_"+question).css("background-color","#1fc9c9;");
	var type = 2;
	var question_id = question+'-'+type;
	$("#"+question_id).remove(); 
	var option = "";
	$(".fill_cls_"+class_name).each(function(){
		option = option+$(this).find(":selected").val()+',';
	}); 
	$("#all_answer").append('<input type="hidden" name="question[]" id='+question_id+' value="'+question+'-'+option+'-2">');
} 
function submit_one_word(class_name,question){
	$("#oneli_"+question).css("background-color","#1fc9c9;");
	var type = 3;
	var question_id = question+'-'+type;
	$("#"+question_id).remove(); 
	var option = "";
	$(".one_word_cls_"+class_name).each(function(){
		option = option+$(this).find(":selected").val()+',';
	}); 
	$("#all_answer").append('<input type="hidden" name="question[]" id='+question_id+' value="'+question+'-'+option+'-3">');
}
function submit_picture(option,question,type){
	$("#pictureli_"+question).css("background-color","#1fc9c9;");
	var question_id = question+'-'+type;
	$("#"+question_id).remove();
	$("#all_answer").append('<input type="hidden" name="question[]" id='+question_id+' value="'+question+'-'+option+'-4">'); 
}
function submit_tick_mark(option,question,type){
	$("#tickli_"+question).css("background-color","#1fc9c9;");
	var question_id = question+'-'+type;
	$("#"+question_id).remove();
	$("#all_answer").append('<input type="hidden" name="question[]" id='+question_id+' value="'+question+'-'+option+'-5">'); 
}
function submit_passage(option,question,type){
	$("#passageli_"+question).css("background-color","#1fc9c9;");
	var question_id = question+'-'+type;
	$("#"+question_id).remove();
	$("#all_answer").append('<input type="hidden" name="question[]" id='+question_id+' value="'+question+'-'+option+'-6">'); 
}

</script>
