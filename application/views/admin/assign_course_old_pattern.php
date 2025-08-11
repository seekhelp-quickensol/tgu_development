<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Courses Setting</h4>
                  <p class="card-description">
                    Please enter courses details
                  </p>
				  <div class="card-body card-block form-body">

                  <form name="search_form" id="search_form" method="get" enctype="multipart/form-data" class="form-horizontal">
						<div class="row">
							<div class="col-sm-3">
								<input type="text" autocomplete="off" name="search" id="search" class="form-control" placeholder="Search Course" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
							</div>
							<div class="col-sm-3">
								<button type="submit" class="btn btn-primary x1_button">Search</button>
								<button type="reset" class="btn btn-primary x1_button" onclick="resetForm()">Reset</button>

								<!-- <a href="<?=base_url();?>assign_course/" class="btn btn-danger">Reset</a> -->
							</div>
						</div>
					</form>


                  <form name="add_form" id="add_form" method="post" enctype="multipart/form-data" class="form-horizontal">
						<input type="hidden" name="id" id="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
						<div id="accordion">
							  <div class="card">
								<div class="card-header">
								  <a class="card-link" data-toggle="collapse" href="#collapseOne1">
									 Courses for <?php if(!empty($single)){ echo $single->center_name;}?> <i class="fa fa-angle-down" aria-hidden="true"></i>
								  </a>
								</div>
								<div id="collapseOne1" class="collapse show" data-parent="#accordion">
								  <div class="card-body">
									<input type="checkbox" name="all_course" id="all_course" value="All"> All Course
									

									<br>
										
									<?php	
									
									$exp = array();
									if(!empty($single)){ 
										$exp = explode(",",$single->courses);
									}

									$data['course'] = $this->Center_model->get_active_course();
										if(!empty($course)){ foreach($course as $course_result){
												$stream = $this->Center_model->get_course_stream($course_result->id);
									?>
										<div class="card-header">
										  <a class="card-link" data-toggle="collapse" href="#collapseOne1"><?=$course_result->course_name?></h4></a>
										 </div> 
										<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
										<input type="checkbox" class="all" name="stream[]" value="<?=$stream_result->id?>" <?php if(in_array($stream_result->id,$exp)){?>checked="checked"<?php }?>> <?=$stream_result->stream_name?><br>
										<?php }}?>
										<br>
										<?php 
										}
									}
									?>
								  </div>
								</div>
							  </div>
								 
							</div>
						
						
						<div class="row form-group">
							<div class="col-lg-6 col-lg-offset-6">
								<button type="submit" name="save" id="save" class="btn btn-primary" value="Save">Save</button>
							</div>
						</div>
					</form>
					</div>
                </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        </div>
      
<?php include_once('footer.php');
if($this->uri->segment(2) == ""){
	$id = 0;
}else{
	$id = $this->uri->segment(2);
}
?>
<script>
	$("#user").change(function(){
		window.location.href="<?=base_url();?>assign_user_privilege/"+$(this).val();
	});
	$("#add_form").validate({
		rules: { 	
			user: "required", 			
		},
		messages: { 	
			user: "Please select user!",  
		}, 
		submitHandler: function(form){
			form.submit();
		} 
	});
	$("#all_course").change(function(){
		$("input:checkbox").prop('checked', $(this).prop("checked"));
	});


	// $("#search").change(function(){
	// 	$("input:text").prop('search', $(this).prop("search"));
	// });

	
</script>

<script>
    function resetForm() {
        document.getElementById("search").value = ''; // Clear search input
        window.location.href = window.location.pathname; // Redirect without search parameter
    }
</script>