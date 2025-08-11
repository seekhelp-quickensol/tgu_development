<?php include('header.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<style type="text/css">
.camera_area{
	padding-top:50px;
	
}
#my_camera video{
    width: 490px;
    height: 390px;
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 10px;
    background: #fff;
}
.camera_area h4{
    font-size: 24px;
    text-transform: uppercase;
    font-weight: 800;
    margin-bottom: 5px;
}
#results img{
	height:333px;
	max-width:100%;
}
#results {
	  width: 490px;
	height: 390px;
	  border:1px solid #ccc;
    text-align: center;
    background: #fff;
    padding: 27px;
    border-radius: 10px;
	
    margin-bottom: 15px;
}

.camera_area p{
    text-align: center;
    margin-bottom: 55px;
    font-size: 13px;
}
.camera_area{
	padding-bottom:50px;
}

@media (min-width:320px) and (max-width: 767px) {
	#my_camera-ios_div, #results {
		  width: 320px !important;
	}
	#my_camera{
		  width: 320px !important;
		  background-color:#fff;
	}
	#results{
		margin-top:50px;
	}
}


</style>  
<div class="camera_area">
<div class="container">
<div class="camera_area">

    <h4 class="text-center">Capture your photo by webcam to continue your exam</h4>
   <p>Smiling for the camera is not about being perfect, it's about being authentic and letting your true self shine through.</p>
    <form method="POST" action="storeImage.php">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type="button" class="btn btn-success" value="Click to take photo" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
				<input type="hidden" name="exam" value="<?=$this->uri->segment(2)?>">
                <button class="btn btn-success" name="submit" value="submit">Continue and Submit</button>
            </div>
          
        </div>
    </form>
</div>
 </div>
  </div>
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
 <?php include('footer.php');?>