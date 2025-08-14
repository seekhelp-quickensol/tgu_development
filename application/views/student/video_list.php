<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Videos</h4>
                  <p class="card-description">
                    Please find the video you want : 
                  </p>
					

                  <div class="row row-cols-1 row-cols-md-5 g-4">
					  <?php if(!empty($data)): ?>
					  	<?php foreach($data as $dt): ?>
					  							  <div class="col">
					    <div class="card">
					      <a href="<?= base_url('video/'.$dt->id); ?>"><img src="<?php echo 'http://img.youtube.com/vi/'.explode('/',$dt->video_url)[3].'/hqdefault.jpg'; ?>" class="card-img-top" alt="..."></a>
					      <div class="card-body">
					      	<h6 class="card-title"><?php echo $dt->video_title; ?></h6>
					        <p><strong>Subject :</strong> <small><?php echo $this->db->where("id",$dt->subject)->get("tbl_subject")->row()->subject_name; ?></small></p>
					        
					        <small><strong>By - </strong> Mr./Mrs. <?php echo $this->db->where("id",$dt->added_by)->get("tbl_staff_faculty")->row()->first_name; ?></small>
					      </div>
					    </div>
					  </div>
					  <?php endforeach; ?>
					  <?php else: ?>
					  	<p style="margin-left: 15px"><strong>No Video Found !</strong></p>
					  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      
<?php include('footer.php');?>
 <script>
 
 </script>
 

 <!-- http://img.youtube.com/vi/<YouTube_Video_ID_HERE>/hqdefault.jpg -->