<?php include('header.php');
   
   ?>
<style>
   
</style>
<div class="container-fluid page-body-wrapper">
<div class="main-panel">
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h3>Examination : <?php if(!empty($exam)){ echo $exam->exam_name;}?></h3>
               <hr>
               
                  <?php //echo "<pre>";print_r($answerbook);
                     for ($i=0; $i < count($answerbook); $i++) {
                     	$q_no = $i + 1;
                     	$question_set = $answerbook[$i];
                     	$text_data = json_decode($question_set->text_data);
                      
                     	$options = $text_data->options->options; 
                     	  
                     	?>
                  <div class="row">
                     <p style="font-size: 18px;font-weight: 600;margin-bottom: 10px;padding: 10px;width: 100%;<?php if($question_set->correct_answer!= "" && $question_set->correct_ans == $question_set->correct_answer){?>background: #89f089;<?php }else{?>background: #eee;<?php }?>">
                         <?=$q_no?> : <?php if($text_data->options->question != ""){ echo str_replace('�',' ',$text_data->options->question) ;}?> 
                         <b>[Correct Ans: <?=$question_set->correct_ans?>]</b>                        
                         </p>
                    
                     <div class="input-group mb-12"> 
                        <fieldset class='<?=$text_data->options->question?>'>

                           <ul style="list-style: none;width: 200%;">
                              <?php 
                              $a=1;
                              $fieldset_class = '';
                                 for ($j=0; $j < count($options); $j++) {
                                 	$op_data = $options[$j];
                                 	?>
                              <li style="display: inline-block;width: 49%;">
                                  <input type="radio" <?php if($question_set->correct_answer != "" && $a == $question_set->correct_answer){?>checked="checked"<?php }?> value="<?= ($j+1)?>"  name='<?= $fieldset_class?>'> <?=str_replace('�',' ',$op_data) ?></li>
                              <?php $a++;} ?>
                               </ul>
                        </fieldset>

                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <?php
                     }
                     ?>
            </div> 
         </div>
      </div>
      
   </div>
</div>
<?php include('footer.php');?>