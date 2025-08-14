<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title">Center Session Setting 
                    <a href="<?=base_url();?>center_session_list" class="btn btn-primary mr-2 float-right">View List</a></h4><p class="card-description">
                    Please enter Fees details
                  </p>
                  <form class="forms-sample" name="relation_form" id="relation_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="exampleInputUsername1">Center Name *</label>
                            <select class="form-control js-example-basic-single" id="center_id" name="center_id">
                                <option value="">Select Center</option>
                                <option value="All">All</option>
                                <?php if(!empty($center_data)){ foreach($center_data as $center_data_result){?>
                                <option value="<?=$center_data_result->id?>" <?php if(!empty($single) && $single->center_id == $center_data_result->id){?>selected="selected"<?php }?>><?=$center_data_result->center_name?></option>
                                <?php }}?>
                            </select>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="exampleInputUsername1">Seesion *</label>
                            <select class="form-control js-example-basic-single" id="session_id" name="session_id">
                                <option value="">Select Session</option>
                                <?php if(!empty($session)){ foreach($session as $session_result){?>
                                <option value="<?=$session_result->id?>" <?php if(!empty($single) && $single->session_id == $session_result->id){?>selected="selected"<?php }?>><?=$session_result->session_name?></option>
                                <?php }}?>
                            </select>
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Course Mode *</label>
                                <select class="form-control js-example-basic-single" id="course_mode" name="course_mode">
                                    <option value="">Select Course Mode</option>
                                    <option value="1" <?php if(!empty($single) && $single->course_mode == '1'){?>selected="selected"<?php }?>>Year</option>
                                    <option value="2" <?php if(!empty($single) && $single->course_mode == '2'){?>selected="selected"<?php }?>>Semester</option>
                                    <option value="4" <?php if(!empty($single) && $single->course_mode == '4'){?>selected="selected"<?php }?>>Month</option>
                                    <option value="3" <?php if(!empty($single) && $single->course_mode == '3'){?>selected="selected"<?php }?>>Year & Semester</option>
                                    <option value="5" <?php if(!empty($single) && $single->course_mode == '5'){?>selected="selected"<?php }?>>Year & Month</option>
                                    <option value="6" <?php if(!empty($single) && $single->course_mode == '6'){?>selected="selected"<?php }?>>Semester & Month</option>
                                    <option value="7" <?php if(!empty($single) && $single->course_mode == '7'){?>selected="selected"<?php }?>>All</option>
                                </select>
                            </div>
                        </div>      
					</div>

					 <div class="row">
                        
                        <div class="col-md-4 year_fee" style="<?php if (!empty($single) && ($single->course_mode == '1' || $single->course_mode == '4')) {
                                    echo 'display:block';
                                    } else {
                                    echo 'display:none';
                                    } ?>">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Year Late Fees *</label>
                                <input type="text" class="form-control" id="year_late_fee" name="year_late_fee" value="<?php if(!empty($single)){ echo $single->year_late_fee;}?>">
                            </div>
                        </div>
                        <div class="col-md-4 sem_fee"  style="<?php if (!empty($single) && ($single->course_mode == '2' || $single->course_mode == '4')) {
                                    echo 'display:block';
                                    } else {
                                    echo 'display:none';
                                    } ?>">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Semester Late Fees *</label>
                                <input type="text" class="form-control" id="sem_late_fee" name="sem_late_fee" value="<?php if(!empty($single)){ echo $single->sem_late_fee;}?>">
                            </div>
                        </div>
                        <div class="col-md-4 month_fee"  style="<?php if (!empty($single) && ($single->course_mode == '3' || $single->course_mode == '4')) {
                                    echo 'display:block';
                                    } else {
                                    echo 'display:none';
                                    } ?>">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Month Late Fees *</label>
                                <input type="text" class="form-control" id="month_late_fee" name="month_late_fee" value="<?php if(!empty($single)){ echo $single->month_late_fee;}?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                  </form>
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
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#relation_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			center_id: {
				required: true,
			},
			session_id: {
				required: true,
			},
			course_id: {
				required: true,
			},
			course_mode: {
				required: true,
			},
			year_late_fee: {
				required: true,
			},
			sem_late_fee: {
				required: true,
			},
            month_late_fee:{
                required: true,
            },
		},
		messages: {
			center_id: {
				required: "Please select center",
			},
			session_id: {
				required: "Please select session",
			},
			course_id: {
				required: "Please select course",
			},
			course_mode: {
				required: "Please select course mode",
			},
			year_late_fee: {
				required: "Please enter year late fees",
			},
			sem_late_fee: {
				required: "Please enter sem late fees",
			},
            month_late_fee: {
				required: "Please enter month late fees",
			},
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});
});

$('#center_id').on('change', function() {
    $('#center_id').valid();
});
$('#course_id').on('change', function() {
    $('#course_id').valid();
});
$('#session_id').on('change', function() {
    $('#session_id').valid();
});
$('#course_mode').on('change', function() {
    $('#course_mode').valid();
});

$('#course_mode').on('change', function() {
    $course_mode = $('#course_mode').val();
    if($course_mode == '1'){
        $('.year_fee').show();
        $('.sem_fee').hide();
        $('.month_fee').hide();
    }
    if($course_mode == '2'){
        $('.sem_fee').show();
        $('.year_fee').hide();
        $('.month_fee').hide();
    }
    if($course_mode == '3'){
        $('.year_fee').show();
        $('.sem_fee').show();
        $('.month_fee').hide();
    }
    if($course_mode == '4'){
        $('.year_fee').hide();
        $('.sem_fee').hide();
        $('.month_fee').show();
    }
    if($course_mode == '5'){
        $('.year_fee').show();
        $('.sem_fee').hide();
        $('.month_fee').show();
    }
    if($course_mode == '6'){
        $('.year_fee').hide();
        $('.sem_fee').show();
        $('.month_fee').show();
    }
    if($course_mode == '7'){
        $('.year_fee').show();
        $('.sem_fee').show();
        $('.month_fee').show();
    }
   
});

</script>
 