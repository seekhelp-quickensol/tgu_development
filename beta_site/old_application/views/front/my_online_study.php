<?php include('header.php');?>
<div class="main-page py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Online Study</li>
					</ol>
				</nav> 
				<div id="syll" class="table-package">
					<h3>Welcome to Online Study Park</h3>
				</div>                      
				<div class="course_topics">
					<div class="accordion" id="accordionExample">
						<div class="mt_10"></div>
						<?php if(!empty($topic)){
							foreach($topic as $topic_result){?>
							<div class="card " >
								<div class="" id="headingOne">
									<h2 class="mb-0">
										<a href="<?=base_url();?>read-topic/<?=base64_encode($topic_result->id)?>" class="btn btn-block text-left"><?=$topic_result->topic_name_show;?></a>
									</h2>
								</div>
							</div>
						   <div class="mt_10"></div>
					<?php }}?> 
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

