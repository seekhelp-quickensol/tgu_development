<?php

// echo "<pre>";print_r($book);exit;
include('header.php');?>
<div class="main-page py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">E-library</li>
					</ol>
				</nav> 
				<div id="syll" class="table-package e_lib">
					<h3>Welcome to E-library</h3>
				</div>                      
				<div class="course_topics">
					<div class="accordion" id="accordionExample">
						<div class="mt_10"></div>
						<div class="card">
								<div class="" id="headingOne">
									<h2 class="mb-0">
										<a target="_blank" href="https://ndl.iitkgp.ac.in/" class="btn btn-block text-left">MHRD Library</a>
									</h2>
								</div>
							</div>
						   <div class="mt_10"></div>
						   <div class="card">
								<div class="" id="headingOne">
									<h2 class="mb-0">
										<a target="_blank" href="https://openlibrary.org/" class="btn btn-block text-left">Digital Library</a>
									</h2>
								</div>
							</div>
						   <div class="mt_10"></div>
						   <div class="card">
								<div class="" id="headingOne">
									<h2 class="mb-0">
										<a target="_blank" href="http://ebooksgo.org/" class="btn btn-block text-left">Ebooksgo Library</a>
									</h2>
								</div>
							</div>
						   <div class="mt_10"></div>
						<?php if(!empty($book)){
							foreach($book as $book_result){?>
							<div class="card">
								<div class="" id="headingOne">
									<h2 class="mb-0">
										<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/ebook/'.$book_result->ebook)?>" class="btn btn-block text-left"><?=$book_result->book_name;?></a>
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

