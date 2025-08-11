<?php
// echo "<pre>";print_r($news);exit;

include('header.php');?>
<section class="pt-5">
   <div class="container">
      <div class="row">
         <div class="layer_data">
            <!-- <?php include('student_dashboard_header.php');?> -->
            <ul class="main_ul">
				<li class="<?php if($this->uri->segment(1) == "dashboard"){?>active<?php }?>"><a href="<?=base_url();?>dashboard">Dashboard</a></li> 
				<?php if($student->center_id == "9"){?>
				<li class="<?php if($this->uri->segment(1) == "exams"){?>active<?php }?>"><a target="_blank" href="https://www.exam.tgu.ac.in/">Exam</a></li>
				<?php }?>
                <?php 
                if($student->id == "3182" || $student->id == "3170"){
                ?>
               <!-- <li class="<?php if($this->uri->segment(1) == "exams"){?>active<?php }?>"><a href="<?=base_url()?>exams">Exam</a></li>-->
				<?php } ?>
				<?php if($student->course_id != "23"){?>
                <li class="<?php if($this->uri->segment(1) == "my_results"){?>active<?php }?>" ><a href="<?=base_url()?>my_results">Result</a></li>
				<?php }?>
                <li class="<?php if($this->uri->segment(1) == "marksheets"){?>active<?php }?>" ><a href="<?=base_url()?>marksheets">Marksheet</a></li>
            </ul>
            <div class="Dashboard_layer">
               <div class="row">
            
               <div class="col-lg-12">
                  <div class="bg-white rounded shadow-sm sidebar-page-right">
                     <div>
                        <div class="p-3 border-bottom">
                           <form method="post" id="change_password" >
                            
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4 dashboard_data">
                                    <img class="id-image" style="width:50%" src="<?=$this->Digitalocean_model->get_photo('images/profile_pic/'.$student->photo)?>">
									<p><?=$student->student_name?></p>
								    <p><i class="fa fa-phone" aria-hidden="true"></i> <?=$student->mobile?></p>
								     <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <?=$student->email?></p>
                                 </div>
                                 <div class="col-md-8 marque_data">
                                      <p class="text-muted font-weight-bold">Welcome to The Global University.</p>
								
										
										
										  <marquee  direction="up" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();">
                                          <?php if ($student->center_id == 9 && $student->admission_status == "4") { ?>
                                             <p>Failure to apply for your Provisional Degree Certificate before January 20th 2024 may lead to delays in issuing your Final Degree Certificate.</p>
                                          <?php } else { ?>
                                             <p>
                                                 <!--No Latest news found!-->
                                             </p>
                                          <?php } ?>
                                          
                                           <p>That the issuance of Mark Cards is Subject to the satisfaction of and compliance with all of the provision and  requirements viz clearance and non pendency and the Issuer has sole authority to issue and deliver Mark card.</p>
                                       </marquee>

                                 </div>
                              </div>
                              <div class="text-right">
                                 <a target="_blank" class="btn btn-success" href="https://www.tgu.ac.in/" >Visit Website</a>
                              </div>
                           </form>
                        </div> 
                     </div>
                  </div>
               </div>
            </div>
            </div>
         </div>
      </div>
   </div>
</section>



<div id="myModal_two" class="modal fade" role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        

      </div>

      <div class="modal-body">

        <p>Dear <?php if(!empty($student)){ echo $student->student_name;}?>,<br><br>



    The last date for  re-registration of 2nd Semester in online mode is 03.06.2025.

</p>

<p> The last date of online registration of examination is 05.06.2025.<br><br>



Thanks & Regards,<br>

Team TGU

</p>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>

    </div>



  </div>

</div>
<?php include('footer.php');?>         
<script src="<?=base_url();?>front_style/js/custom.js"></script>

<script>
    <?php if(!empty($student) && $student->center_id == '12'){?>
        $(document).ready(function() {
           //$("#myModal_two").modal("show");
        });
    <?php }?>
</script>

