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
                  <h4 class="card-title">My Marksheets</h4>
                  <p class="card-description">
                    All marksheet details
                  </p>
                    <div class="row">
					<?php 
					if($student_profile->course_id == "23"){
							if(!empty($result)){ foreach($result as $result_res){?>
                      <div class="col-sm-4">
                          <div class="form-group">
						<a href="<?=base_url();?>show_my_course_marksheet/<?=$result_res->id?>">
						<button type="button" class="btn btn-primary"><?=$result_res->marksheet_number?> <i class="mdi mdi-arrow-right"></i></button>
						</a>
                      </div>
                      </div>
					<?php 
					}}}else{
					if(!empty($result)){ foreach($result as $result_res){?>
                      <div class="col-sm-4">
						<a href="<?=base_url();?>show_my_marksheet/<?=$result_res->id?>">
						<button type="button" class="btn btn-primary"><?=$roman_arr[$result_res->year_sem]?> - <?=$result_res->marksheet_number?> <i class="mdi mdi-arrow-right"></i></button>
						</a>
                      </div>
					<?php }}}?>					  
                    </div> 
					
                </div>
              </div>
            </div>
          </div>
        </div>
      
<?php include('footer.php');?>
