<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">E-Books</h4>
                  <p class="card-description">
                    Please find the E-Book: 
                  </p>
					

                  <div class="row row-cols-1 row-cols-md-5 g-4">
					  <?php if(!empty($book)): ?>
					  	<?php foreach($book as $book_result): ?>
					  							  <div class="col">
					    <div class="card">
					      <a href="<?=$this->Digitalocean_model->get_photo('images/ebook/'.$book_result->ebook)?>" target="_blank">
					      <div class="card-body">
					      	<h6 class="card-title"><?=$book_result->book_name; ?></h6>
					        </div>
					    </div>
					    </a>
					  </div>
					  <?php endforeach; ?>
					  <?php else: ?>
					  	<p style="margin-left: 15px"><strong>No E-Book Found !</strong></p>
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