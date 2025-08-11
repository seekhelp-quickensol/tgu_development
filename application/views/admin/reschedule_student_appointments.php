<?php include('header.php');?>
<style>
.modal-dialog {
  min-width: 100%;
  min-height: 100%;
  padding: 0;
}

.modal-content {
  height: 100%;
  border-radius: 0;
}
	table, th, td, tr, tbody, thead {
  border: 1px solid;
}

</style> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Re-schedule Appoinment</h4>
							<p class="card-description"></p> 
							<div class="col-lg-12" style="display:block;">
								<form onsubmit="return checkSubject();" class="form-horizontal" name="transcript_form" id="transcript_form" method="post">
									<div class="panel-body">
										<div class="col-md-12">
											<div class="row">
												 <div class="form-group col-md-4">
												  <label for="exampleInputUsername1">Enrollment Number *</label>
												  <input type="text" readonly class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enrollment Number" value="<?php if(!empty($single)){ echo $single->enrollment_number;}?>">
												</div>
												<div class="form-group col-md-4">
												  <label for="exampleInputUsername1">Student Name *</label>
												  <input type="text" readonly class="form-control" id="student_name" name="student_name" placeholder="Student Name" value="<?php if(!empty($single)){ echo $single->student_name;}?>">
												  <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
												  <div class="error" id="session_error"></div> 
												</div> 
												<div class="form-group col-md-4">
												  <label for="exampleInputUsername1">Mobile Number *</label>
												  <input type="text" class="form-control" required id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="<?php if(!empty($single)){ echo $single->mobile_number;}?>">
												</div> 
												<div class="form-group col-md-4">
												  <label for="exampleInputUsername1">Email *</label>
												  <input type="text" required class="form-control" id="email" name="email" placeholder="Email" value="<?php if(!empty($single)){ echo $single->email;}?>">
												</div> 
												<div class="form-group col-md-4">
												  <label for="exampleInputUsername1">Date of Visiting in University*</label>
												  <select class="form-control" id="date_of_visiting_in_university" name="date_of_visiting_in_university">
													  <option value="">Select Date</option>
													  <?php
                                                        //   '2025-01-26'
                                							$holidays_new = [
                                								'2025-01-01', '2025-01-09', '2025-01-11', '2025-01-12',
                                								'2025-02-15',
                                								'2025-03-14', '2025-03-15', '2025-03-17', '2025-03-30', '2025-03-31',
                                								'2025-04-14', '2025-04-18', '2025-04-23',
                                								'2025-05-01',
                                								'2025-06-07', '2025-06-27',
                                								'2025-08-13', '2025-08-15',
                                								'2025-09-05', '2025-09-08', '2025-09-30',
                                								'2025-10-02', '2025-10-07', '2025-10-21', '2025-10-23',
                                								'2025-12-12', '2025-12-25', '2025-12-31'
                                							];  
                                
                                							$weekend_holidays_new = [
                                								'2025-01-11', '2025-01-12', '2025-01-25', 
                                								'2025-02-08', '2025-02-09', '2025-02-22', '2025-02-23',
                                								'2025-03-08', '2025-03-09', '2025-03-22', '2025-03-23',
                                								'2025-04-12', '2025-04-13', '2025-04-26', '2025-04-27',
                                								'2025-05-10', '2025-05-11', '2025-05-24', '2025-05-25',
                                								'2025-06-14', '2025-06-15', '2025-06-28', '2025-06-29',
                                								'2025-07-12', '2025-07-13', '2025-07-26', '2025-07-27',
                                								'2025-08-09', '2025-08-10', '2025-08-23', '2025-08-24',
                                								'2025-09-13', '2025-09-14', '2025-09-27', '2025-09-28',
                                								'2025-10-11', '2025-10-12', '2025-10-25', '2025-10-26',
                                								'2025-11-08', '2025-11-09', '2025-11-22', '2025-11-23',
                                								'2025-12-13', '2025-12-14', '2025-12-27', '2025-12-28'
                                							];	
                                							
                                						$holidaysnew = array_unique(array_merge($holidays_new, $weekend_holidays_new));
													    sort($holidaysnew);
                            
                                                            if(!empty($holidaysnew)){
                                                                for($i=0;$i<count($holidaysnew);$i++){
                                									 
                                                        ?>
                                                          <option value="<?=$holidaysnew[$i]?>"><?=date('d M, Y',strtotime($holidaysnew[$i]))?></option>
                                                        <?php
                                									}
                                                            }
                                                          ?>
													  
													  <?php
														$holidays = ['2024-06-02','2024-06-08','2024-06-09','2024-06-16','2024-06-17','2024-06-23','2024-06-30','2024-07-07','2024-07-08','2024-07-13','2024-07-14','2024-07-21','2024-07-28','2024-08-04','2024-08-10','2024-08-11','2024-08-13','2024-08-15','2024-08-18','2024-08-25','2024-09-01','2024-09-08','2024-09-14','2024-09-15','2024-09-16','2024-09-22','2024-09-29','2024-09-30','2024-10-02','2024-10-06','2024-10-11','2024-10-12','2024-10-13','2024-10-17','2024-10-20','2024-10-27','2024-11-01','2024-11-03','2024-11-09','2024-11-10','2024-11-17','2024-11-24','2024-12-01','2024-12-08','2024-12-12','2024-12-14','2024-12-15','2024-12-22','2024-12-25','2024-12-29'];
														if(!empty($holidays)){
															for($i=0;$i<count($holidays);$i++){
													?>
													  <option value="<?=$holidays[$i]?>" <?php if(!empty($single) && $single->date_of_visiting_in_university == $holidays[$i]){?>selected="selected"<?php }?>><?=date('d M, Y',strtotime($holidays[$i]))?></option>
													<?php
															}
														}
													  ?>
												  </select>
												</div>
												<div class="form-group col-md-4">
												  <label for="exampleInputUsername1">Time of Visiting in University*</label>
												  <input type="text" class="form-control" id="time_of_visiting_in_university" name="time_of_visiting_in_university" placeholder="ex 10:30 AM" value="<?php if(!empty($single)){ echo $single->time_of_visiting_in_university;}?>">
												</div>
											</div>	
										</div>	   
										<div class="col-md-4 col-md-offset-4" style="margin-top:5%">
											<button type="submit" class="btn btn-primary">Update</button> 
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
<?php include('footer.php');?> 
<script> 
</script>