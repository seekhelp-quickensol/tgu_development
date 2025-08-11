<?php include('header.php');?>
<link rel="stylesheet" src="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Generate Result/Marksheet Excel</h4>
                  <p class="card-description">
                  
                  </p>
                  
                  <form method="POST" id="generate-result-excel">
                    <div class="row">
                      <div class="col-4">
                        <input type="text" name="date" id="date" class="form-control">
                      </div>
                      <div class="col-3">
                        <input type="submit" name="Submit" class="btn btn-success">
                      </div>
                    </div>    
                  </form>
                </div>

                <?php if(!empty($name)): ?>
                  <div class="col-3" >
                    <a href="<?=base_url("result_excels/".$name);?>" download class="btn btn-primary" style="margin-left:15px;margin-top: 20px">Click here to download result data</a>
                  </div>
                <?php endif; ?>

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
 

	
	
	$('#generate-result-excel').validate({
      rules:{
          date:"required",
      },
      messages:{
        date:"Please enter a date"
      }
  });
  
    $("#date").datepicker({
    changeMonth: true, // if you want to change months
    changeYear: true,  // if you want to change years
    yearRange: "-50:+10",
    clickInput: true,
  });
</script>
 