<?php include('header.php') ?>
<section class="py-5">
   <div class="container">
      <div class="row">
         <div class="layer_data">
            <ul class="main_ul">
				<li class="<?php if($this->uri->segment(1) == "dashboard"){?>active<?php }?>"><a href="<?=base_url();?>dashboard">Dashboard</a></li> 
                <li class="<?php if($this->uri->segment(1) == "exams"){?>active<?php }?>"><a href="<?=base_url()?>exams">Exam</a></li>
				<?php if($student->course_id != "23"){?>
                <li class="<?php if($this->uri->segment(1) == "my_results"){?>active<?php }?>" ><a href="<?=base_url()?>my_results">Result</a></li>
				<?php }?>
                <li class="<?php if($this->uri->segment(1) == "marksheets"){?>active<?php }?>" ><a href="<?=base_url()?>marksheets">Marksheet</a></li> 
            </ul>
            <div class="mt_5"></div>
            <div class="Dashboard_layer resp_pad">
               <div>
                  <div class="box assesment_layer shadow-sm rounded bg-white ">
                     <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Exam List</h6>
                     </div>
                     <div class="box-body p-0">
                        <?php if($exams){
							foreach($exams as $exam_result){ 
                        ?>
                        <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header respn_exam_btn">
                           <div class="font-weight-bold mr-3 respn_exam_text">
                              <div class="text-truncate"><?=$exam_result->exam_name?></div>
                              <div class="small"><?=$exam_result->exam_description?></div>
                           </div>
						   <?php 
						   //if($exam_result->exam_date < date("Y-m-d") ){?>
                           <span class="ml-auto mb-auto text-right">
                              <div class="btn-group">
                                 <button class="click_course set_layer_<?=$exam_result->id?> dropdown-item" type="button" data-course='<?=$exam_result->id?>'> 
									<a data-toggle="modal" data-target="#exampleModal<?=$exam_result->id?>"><i class="fa fa-desktop" aria-hidden="true"></i> Start Exam</a>
								 </button>
                             </div>
                              <br>
                             </span>
						   <?php  /*}else{ ?>
						   <span class="ml-auto mb-auto text-right">
						   <h5>Attempts Over</h5>
						   </span>
						   <?php }*/ ?>
                        </div>
                         <?php } }else{?>
							<h5 class="no_data">Sorry,No Data Found </h5>
						<?php } ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Modal -->
 <?php if($exams){
		foreach($exams as $exam_result){ 
?>
<div class="modal fade" id="exampleModal<?=$exam_result->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exam Guidelines</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>1.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.  (injected humour and the like).</p>
         <p>2.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</p>
          <p>3.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.  (injected humour and the like).</p>
          <p>4.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
           <p>5.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
            <p>6.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.  (injected humour and the like).</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a id="start_btn" href="<?=base_url()?>start-capture/<?=base64_encode($exam_result->id)?>" class="btn btn-primary">Start Exam</a>
      </div>
    </div>
  </div>
</div>
<?php }}?>
<?php include('footer.php') ?>
<script>
   
</script>
<script type="text/javascript">
   $('.click_course').click(function(){
      var data_box = $(this).data('course') + '01';
    //  alert(data_box);
   localStorage.setItem('exam_start', data_box);
   });
</script>