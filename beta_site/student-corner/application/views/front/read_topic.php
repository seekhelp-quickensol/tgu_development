<?php include('header.php');?>
<div class="main-page py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				
				<div id="syll" class="table-package">
					<h3><?php if(!empty($read_topic)){ echo $read_topic->topic_name_show;}?></h3>
				</div>                      
				<div class="course_topics">
					<div class="accordion" id="accordionExample">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group"> 
											<?php if(!empty($read_topic)){ echo $read_topic->topic_info;}?>
										</div>
									</div> 
								</div>
							</div>
						</div> 
					</div>
					<div class="accordion" id="accordionExample">	
						<?php if(!empty($pdf)){?>  
						<div class="card">  
							<div class="card-body"> 
								<h4>Related Documents</h4>
								<div class="mt_10"></div>
								<div class="row">
									<?php foreach($pdf as $pdf_result){?>
									<div class="card" style="padding:5px;margin-right:5px">
										<div class="" id="headingOne">
											<h2 class="mb-0">
												<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('uploads/topic/'.$pdf_result->file)?>" class="btn btn-block text-left"><?=$pdf_result->title;?></a>
											</h2>
										</div>
									</div>
								   <div class="mt_10"></div>
									<?php }?>
								</div>
							</div>
						</div>
						<?php }?>
					</div> 
					<div class="accordion" id="accordionExample">	
						<?php if(!empty($pdf)){?> 
						<div class="card"> 
							<div class="card-body">
								<h4>Related Documents</h4>
								<div class="mt_10"></div>
								<div class="card-body">
									<div class="row">
										<?php foreach($video as $video_result){?>
										<div class="card" style="padding:5px;margin-right:5px">
											<div class="" id="headingOne">
												<h2 class="mb-0">
													<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('uploads/topic/'.$video_result->file)?>" class="btn btn-block text-left"><?=$video_result->title;?></a>
												</h2>
											</div>
										</div>
									   <div class="mt_10"></div>
										<?php }?>
									</div>
								</div>
							</div>
						<?php }?>
					</div>
					<div class="mt_10"></div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php include('footer.php');?>
<script>
   $(document).ready(function(){
      $('#pay_button').click(function(){
         var user_id     = '<?=$this->session->userdata('user_id')?>';
         var course_name = '<?=$this->uri->segment(2)?>';
         // alert(course_name);
         $.ajax({
            type:"POST",
            url :"<?=base_url();?>front/User_ajax_controller/payment_data",
            data:{'user_id':user_id,'course_name':course_name},
            success:function(data){
               if(data !=="0"){
                  alert('Please pay');
               }
            },
            error:function(jqXHR,textStatus,errorThrown){
               cansol.log(textStatus,errorThrown);
            }
      });
   });
});
</script>

