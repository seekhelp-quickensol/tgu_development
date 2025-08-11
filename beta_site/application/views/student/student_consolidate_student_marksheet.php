<?php include('header.php');
$roman_arr = array(
	'1' => 'I',
	'2' => 'II',
	'3' => 'III',
	'4' => 'IV',
	'5' => 'V',
	'6' => 'VI',
	'7' => 'VII',
	'8' => 'VIII',
	'9' => 'IX',
	'10' => 'X',
	'11' => 'XI',
	'12' => 'XII',
);
?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">My Marksheet</h4> 
                  <p class="card-description"> 
                    Marksheet details 
                  </p>
                    <div class="form-group row">
					<?php 
					if(!empty($consolidate)){ ?>
                      <div class="col-sm-4">
						<a target="_blank" href="<?=base_url();?>print_consolidate_student_marksheet/<?=$consolidate->id?>">
						<button type="button" class="btn btn-primary"> Click to View</button>
						</a>
                      </div>
					<?php 
					}else{?>
					  <div class="col-sm-4">
						<p>Please wait it is under review!</p>
                      </div>
					<?php }?>					  
                    </div> 
					
                </div>
              </div>
            </div>
          </div>
        </div>
      
<?php include('footer.php');?>
