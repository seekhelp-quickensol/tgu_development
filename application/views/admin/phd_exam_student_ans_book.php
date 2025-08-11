<?php include('header.php');?>

<div class="container-fluid page-body-wrapper">
<div class="main-panel">
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h3>Examination : <?php if(!empty($student_ans_book_test_name)){ echo $student_ans_book_test_name[0]->test_name;}?></h3>
               <hr>
               
                  <?php  
                  // echo "<pre>";print_r($student_ans_book_test_name);exit;
                  //echo $student_ans_book_test_name->test_ans;
                  //$question_data = json_decode($student_ans_book_test_name->test_ans);
                 // echo "<pre>";print_r($question_data);
                  $sr=1;
                  	// echo "<pre>";print_r($student_ans_book_test_name);exit;
                  if(!empty($student_ans_book_test_name)){ foreach($student_ans_book_test_name as $question_data_result){
                   //  echo "<pre>";print_r($question_data_result);
                     //echo $question_data_result->ans;
                     //$selected_anser = json_decode($question_data_result->ans);
                     //print_r($selected_anser);
                     	    $question_details = $this->Student_model->get_entrance_question_details($question_data_result->question_id); 
                        // echo "<pre>";print_r($question_details);exit;
                             $question = json_decode($question_details->text_data);                   
                     	// echo $question->options->question;
                     	?>
                        <div class="row">
                        <p style="font-size: 18px;font-weight: 600;margin-bottom: 10px;padding: 10px;width: 100%;<?php if($question_data_result->given_answer == $question_details->correct_ans){?>background: #89f089;<?php }else{?>background: #eee;<?php }?>">
                           <?= $sr++ ?> : <?=str_replace("<p>","",str_replace('</p>','',$question->options->question))?>  
                           <b>[Correct Ans: <?=$question_details->correct_ans?>]</b>                   
                        </p>

                            <div class="input-group mb-12"> 
                                <fieldset class="A test of research aptitude for candidates of the UGC NET, is aimed at "> 
                                <ul style="list-style: none;width: 100%;">
                                <?php 
                                $k=1;
                                for($o=0;$o<count($question->options->options);$o++){ ?>
                                <li style="display: inline-block;width: 49%;">
                                 <input type="radio" value="" name="" <?php if($k==$question_data_result->given_answer){?>checked="checked"<?php }?>> <?=$question->options->options[$o]?>
                                </li>
                                <?php $k++;}?>
                                </ul>
                                </fieldset> 
                            </div>
                        </div>
                 
                  <div class="clearfix"></div>
                  <?php
                     }}
                     ?>
            </div> 
         </div>
      </div>
   </div>
                  </div>
                  </div>
</div>
<?php include('footer.php');?>