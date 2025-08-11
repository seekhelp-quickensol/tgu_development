<?php include('header.php');?>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-radius: 5px; 
  margin-bottom: 5px; 
}
.item{
	width: 31.33%;
	margin: 0 1% 20px 1%;
	height: auto;
	 box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 10s ease;
  border-radius: 5px; 
}
.item img{
width: 100%;
	}
</style>
<link href="<?=base_url();?>css/masonry-docs.css">
			<div class="header_cc_area" style="background-image:url('<?=$this->Digitalocean_model->get_photo('images/header_area.jpg')?>')">
				<div class="container">
					<div class="row">
						<h1>Advertisement</h1>
						<p>Home / Advertisement</p>
					</div>
				</div>
			</div>
				<div class="uni_mainWrapper" >
			<div class="content_work">
                <div class="container">
                    <div class="row">
                         <br/>
                        <h2 class="">University Advertisement</h2>
                        <div class="grid" id="masonry-grid">
						    <div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/new_adv.jpg" alt="Notice Board" >
								</div>
	                        </div>
							<div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/advertise_2022.jpg" alt="Notice Board" >
								</div>
	                        </div>
							<div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/notice_phd.jpeg" alt="Notice Board" >
								</div>
	                        </div>
							<div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/notice_01.jpg" alt="Notice Board" >
								</div>
	                        </div>
	                        <div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/notice_e.jpeg" alt="Notice Board" >
								</div>
	                        </div>
	                        <div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/notice_b.jpg" alt="Notice Board" >
								</div>
	                        </div>
	                        <div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/notice_c.jpg" alt="Notice Board" >
								</div>
	                        </div>
	                        <div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/notice_d.jpg" alt="Notice Board" >
								</div>
	                        </div>
							<div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/notice_5.jpeg" alt="Notice Board" >
								</div>
	                        </div>
	                        
							
							<div class=" item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/notice_7.jpeg" alt="Notice Board" >
								</div>
	                        </div>
							<div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/notice_4.jpeg" alt="Notice Board" >
								</div>
	                        </div>
							<div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/noticeone.jpeg" alt="Notice Board" >
								</div>
	                        </div>
							
							<div class=" item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/adv-1.jpeg" alt="Notice Board" >
								</div>
	                        </div>
							<div class="col-md-6 item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/adv-2.jpeg" alt="Notice Board" >
								</div>
	                        </div>
							
							<div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/adv-4.jpeg" alt="Notice Board" >
								</div>
	                        </div>
							<div class=" item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/adv-5.jpeg" alt="Notice Board" >
								</div>
	                        </div>
							<div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/adv-3.jpeg" alt="Notice Board" >
								</div>
	                        </div>
	                        
	                        <div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/notice_new.jpeg" alt="Notice Board" >
								</div>
	                        </div>
	                    </div>    
					<div class="clearfix"></div>
                    </div>
                </div>
			
            </div>
			
<div class="clearfix"></div>

	
		</div>
			
<?php include('footer.php');?>
<script src="<?=base_url();?>js/masonry.pkgd.min.js"></script>
<script>
	setInterval(function(){
        var container = document.querySelector('#masonry-grid');
        var msnry = new Masonry( container, {
           itemSelector: '.item'
        });          
        },1000);
</script>