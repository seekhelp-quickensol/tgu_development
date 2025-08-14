<?php include_once('header.php');?>
 <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                <form method="post" name="AddForm" id="AddForm" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Subject Code *</label>
                      <input type="text" class="form-control" name="subject_code" id="subject_code" placeholder="Subject code">
                    </div>
					</div>
					<div class="col-md-3">
					<div class="form-group">
                      <label for="exampleInputUsername1">Subject Name *</label>
                      <input type="text" class="form-control" name="subject_name" id="subject_name" placeholder="Subject name">                               
						</select>
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Integer Max*</label>
                      <input type="readonly" name="int_max" id="int_max" class="form-control"> 
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                       <label for="exampleInputEmail1">Issue Date *</label>
                       <input type="text" name="issue_date" id="issue_date" class="form-control datepicker">
                    </div>
					</div>
					</div>
					<div class="row">
					
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Issuance Status *</label>
                       <select name="issue_status" id="issue_status" class="form-control">
							<option value="">Select</option>
							<option value="0"<?php if(!empty($single) && $single->thesis_status == "0"){?>selected="selected"<?php }?>>No</option>
							<option value="1"<?php if(!empty($single) && $single->thesis_status == "1"){?>selected="selected"<?php }?>>Yes</option>                                
						</select>
                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Upload Review Report(pdf) </label>
                       <input type="file" name="userfile" class="form-control" id="userfile">
                        <input type="hidden" name="review_report" id="review_report"  value="<?php if(!empty($single)){ echo $single->review_report; } ?>">
                    </div>
					</div>