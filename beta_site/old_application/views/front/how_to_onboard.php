<?php include('header.php');?>
	<style>
		figure {
		  border: 1px #cccccc solid;
		  padding: 4px;
		  margin: auto;
		}
		figcaption {
		  background-color: black;
		  color: white;
		  font-style: italic;
		  padding: 2px;
		  text-align: center;
		}
		video{
            width: 60%;
            height: 550px;
            object-fit: cover !important;
		}
	</style>
	<div class="header_cc_area">
		<div class="container">
			<div class="row">
    			<div class="col-lg-12 col-md-12">
    				<h1 style="text-align: center;">How to Fill Collaboration Form </h1>
    			</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="uni_mainWrapper gallery_video_iamgesa"  style="min-height:500px;">
		<div class="container">	
        	<div class="row" id="Menu2">
        		<div class="gallery university_activities"> 
        			<div class="col-lg-12">
        				<div style="text-align:center;margin-bottom:10px">
        					<video width="100%" height="500" controls controlsList="nodownload">
                                <source src="<?=$this->Digitalocean_model->get_photo('images/help/video/collaboration.mp4')?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
<?php include('footer.php');?>