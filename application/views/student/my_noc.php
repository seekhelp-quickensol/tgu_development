<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">My NOC</h4>
                  <p class="card-description"> 
                  </p> 
                    <div class="form-group row">
                      <iframe src="<?=$this->Digitalocean_model->get_photo('images/noc/'.$student_profile->noc)?>" width="100%" height="900px" frameborder="0"></iframe>
								
                    </div> 
                    </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      
<?php include('footer.php');?>
  
 