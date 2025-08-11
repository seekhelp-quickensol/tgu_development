<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">View Document</h4>
                    <div class="">
                        <?php
                            // echo "<pre>";
                            // print_r($single);exit;
                            if(!empty($single)){
                                $files = $this->Digitalocean_model->get_photo('uploads/' . $single->document);
                            }else{
                                $files = '';
                            }
                            
                            if($files != ''){
                        ?>
                            <!--<iframe src="<?=$files;?>" width="100%" height="600px"></iframe>-->
                            <iframe 
                                src="<?php echo base_url('assets/pdfjs/web/viewer.html'); ?>?file=<?php echo urlencode($files); ?>&toolbar=0&navpanes=0&scrollbar=0" 
                                width="100%" 
                                height="100%" 
                                style="border:none;">
                            </iframe>
                        <?php }?>
                    </div>
                </div>
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
 