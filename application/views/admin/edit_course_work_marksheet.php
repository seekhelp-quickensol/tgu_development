<?php

// echo "<pre>";print_r($signature);exit;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 include('header.php');?>
<style>
    .visible_error{
        color:red !important;
    }
    </style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Coursework Marksheet</h4>
                  <p class="card-description">
                    Please enter Coursework details
                  </p>
                 <form method="post" name="search_form" id="search_form"> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Enrollment Number</label>
                                <input type="text"  name="enrollment_number" id="enrollment_number" class="form-control" value="<?php if(!empty($single)){ echo $single->enrollment_number;}?>" readonly>
                                <input type="hidden"  name="id" id="id" class="form-control" value="<?php if(!empty($single)){ echo $single->id;}?>" readonly>
                            </div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Issue Date</label>
								<input type="text" autocomplete="off" name="issue_date" id="issue_date" class="form-control datepicker" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->issue_date));}?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Marksheet Type</label>
								<select autocomplete="off" name="course_work_type" id="course_work_type" class="form-control">
									<option value="">Select</option>
									<option value="0" <?php if(!empty($single) && $single->course_work_type == "0"){ ?>selected="selected"<?php }?>>Offline</option>
									<option value="1" <?php if(!empty($single) && $single->course_work_type == "1"){ ?>selected="selected"<?php }?>>Online</option>
								</select>
							</div>
						</div>


            <div class="col-md-6">
              <div class="form-group">
                <label>Prepared By Signature *</label>
                <select class="form-control" id="prepared_signature" name="prepared_signature">
                  <option value="">Select Signature</option>
                  <?php if(!empty($signature)){ foreach($signature as $signature_result){?>
                  <option value="<?=$signature_result->id?>" <?php if(!empty($single) && $single->prepared_signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
                  <?php }}?> 
                </select>
            </div> 
            </div>
           
            <div class="col-md-6">
              <div class="form-group">
              <label>Checked By Signature *</label>
              <select class="form-control" id="checked_signature" name="checked_signature">
                <option value="">Select Signature</option>
                <?php if(!empty($signature)){ foreach($signature as $signature_result){?>
                <option value="<?=$signature_result->id?>" <?php if(!empty($single) && $single->checked_signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
                <?php }}?> 
              </select>
            </div>
            </div>
					
              <div class="col-md-6">
                <div class="form-group">
                  <label>Signature *</label>
                  <select class="form-control" id="signature" name="signature">
                    <option value="">Select Signature</option>
                    <?php if(!empty($signature)){ foreach($signature as $signature_result){?>
                    <option value="<?=$signature_result->id?>" <?php if(!empty($single) && $single->signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
                    <?php }}?> 
                  </select>
              </div>
              </div>
         
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" name="show_subject" id="show_subject" class="btn btn-primary btn-sm" value="Submit">
                        </div>
                    </div>				
				</form>
                </div>
              </div>
            </div>           
          </div>
        </div>
      
<?php include('footer.php');
?>
<script type="text/javascript">     
$("#search_form").validate({
	rules: { 
		enrollment_number: {"required":true,minlength:10,maxlength:20},
		issue_date: "required", 
		course_work_type: "required", 
    signature:"required",
	},
	messages: { 
		enrollment_number: {required:"Please enter enrollment!",minlength:"Enter valid digit enrollment number",maxlength:"Enter valid digit enrollment number"},
		issue_date: "Please select date",	 
		course_work_type: "Please type date",	 
    signature:"Please select signature",
	}, 
	submitHandler: function(form){
		//form.submit();
        new_validate();
	} 
});
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
  } );
</script>     