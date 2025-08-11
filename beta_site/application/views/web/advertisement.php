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
			<!-- <div class="header_cc_area" style="background-image:url('<?=base_url();?>images/header_area.jpg')">
				<div class="container">
					<div class="row">
						<h1>Advertisement</h1>
						<p>Home / Advertisement</p>
					</div>
				</div>
			</div> -->
			<section>

<div class="header_cc_area slide-bg">
	<div class="container  overlay-about" style="width: 100%;">
	<p>Home / Advertisement</p>

		<div class=" container-fluid text-center inner-heading-content">
			<h2 class="main-heading-inner-pages border-b border"> Advertisement </h2>
			<p> We believe in providing education that cultivates creative understanding </p>

		</div>

	</div>
</div>
</section>

<section class="c-padding inner-bg-99">

<div class="uni_mainWrapper container box-shadow-global">
			<div class="content_work">
                <div class="container">
                    <div class="row">
                         <br/>
                        <h2 class="title">University Advertisement</h2>
                        <div class="grid" id="masonry-grid">
						   <!-- <div class="item">
								<div class="card">
									<img src="<?=base_url();?>images/notice_board/notice_01.jpg" alt="Notice Board" >
								</div>
	                        </div>-->
	                    </div>    
					<div class="clearfix"></div>
                    </div>
                </div>
			
            </div> 
</div> 
</section>
			
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