<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Test Name : <?php if(!empty(!empty($test_title))){ echo $test_title->test_name;}?></h4>
                </div>
              </div>
            </div>
			<div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                   <h3>Upload Question via CSV</h3>
                   
                   <form method="post" name="registration_form" id="registration_form" enctype="multipart/form-data">
                  	<div class="input-group">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
						  </div>
						  <div class="custom-file">
						    <input type="file" class="custom-file-input" id="userfile" name="userfile"
						      aria-describedby="inputGroupFileAddon01">
						    <label class="custom-file-label" for="inputGroupFile01">Upload CSV</label>
						  </div>
						</div>
						<div class="input-group">
							<button class="btn btn-primary mb-2" type="submit" id="submit_question">Submit</button>
						</div>
                </div>
            </form>
              </div>
            </div>
          </div>
        </div>
      
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
 <script>
</script>
 