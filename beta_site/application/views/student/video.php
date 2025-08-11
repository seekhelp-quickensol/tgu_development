<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <p class="card-description">
                  <strong> Sub :  <?=$this->db->where("id",$data->subject)->get("tbl_subject")->row()->subject_name;?> </strong>
                  </p>
                  <strong><h4><?=$data->video_title; ?></h4></strong>
							<iframe width="900" height="506" src="<?php echo "https://www.youtube.com/embed/".explode('/',$data->video_url)[3]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					

              </div>
            </div>
          </div>
        </div>
      
<?php include('footer.php');?>
 <script>
 
 </script>
 

 <!-- http://img.youtube.com/vi/<YouTube_Video_ID_HERE>/hqdefault.jpg -->