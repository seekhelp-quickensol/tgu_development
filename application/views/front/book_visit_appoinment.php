<?php include('header.php');?> 
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Book Appointment</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
								 <form class="forms-sample" name="appoinment_form" id="appoinment_form" method="post" enctype="multipart/form-data">
									  <div class="row">
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Enrollment Number *</label>
										  <input type="hidden" readonly class="form-control" id="center_id" name="center_id" placeholder="Enrollment Number" value="<?=$student->center_id?>">
										  <input type="text" readonly class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enrollment Number" value="<?=$student->enrollment_number?>">
										</div>
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Student Name *</label>
										  <input type="text" readonly class="form-control" id="student_name" name="student_name" placeholder="Student Name" value="<?=$student->student_name?>">
										  <div class="error" id="session_error"></div> 
										</div> 
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Course *</label>
										  <input type="text" readonly class="form-control" id="course" name="course" placeholder="Course" value="<?=$student->print_name?>">
										</div>
										</div>
										<div class="row">
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Branch*</label>
										  <input type="text" readonly class="form-control" id="branch" name="branch" placeholder="Branch" value="<?=$student->stream_name?>">
										</div>
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Year OF Completion *</label>
										  <input type="text" class="form-control" id="year_of_completion" name="year_of_completion" placeholder="Year OF Completion " value="">
										</div>
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Place *</label>
										  <input type="text" class="form-control" id="place" name="place" placeholder="Place" value="">
										</div>
										</div>
										<div class="row">
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Country*</label>
										  <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?=$student->country_name?>">
										</div>
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">State*</label>
										  <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?=$student->state_name?>">
										</div>
						 <!--               <div class="form-group col-md-4">-->
						 <!--                 <label for="exampleInputUsername1">Date of Visiting in University*</label>-->
						 <!--                 <input type="text" class="form-control datepicker" id="date_of_visiting_in_university" name="date_of_visiting_in_university" placeholder="Date of Visiting in University" value="">-->
										<!--</div>-->
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Date of Visiting in University*</label>
										  <select class="form-control" id="date_of_visiting_in_university" name="date_of_visiting_in_university">
											  <option value="">Select Date</option>
											  <?php
											//   '2025-01-26'
												$holidays = [
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

												$weekend_holidays = [
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
												
												if($this->session->userdata('student_center_id') == '9'){
													$holidays = array_unique(array_merge($holidays, $weekend_holidays));
												}
												
												sort($holidays);
												
												if(!empty($holidays)){
													for($i=0;$i<count($holidays);$i++){
														$available_date = $this->Front_model->get_available_slot($holidays[$i]);
														if($available_date < 20 && $holidays[$i] >= date("Y-m-d")){
											?>
											  <option value="<?=$holidays[$i]?>"><?=date('d M, Y',strtotime($holidays[$i]))?></option>
											<?php
														}}
												}
											  ?>
										  </select>
										</div>
										</div>
										<div class="row">
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Time of Visiting in University*</label>
										  <input type="text" class="form-control" id="time_of_visiting_in_university" name="time_of_visiting_in_university" placeholder="ex 10:30 AM" value="">
										</div>
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Email*</label>
										  <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?=$student->email?>">
										</div>
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Mobile Number*</label>
										  <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="<?=$student->mobile?>">
										</div>
										</div>
										<div class="row">
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Alternate Mobile Number</label>
										  <input type="text" class="form-control" id="alternamte_mobile_number" name="alternamte_mobile_number" placeholder="Alternate Mobile Number" value="">
										</div>
										
										<div class="form-group col-md-4">
										  <label for="exampleInputUsername1">Purpose of Visit*</label>
										  <select class="form-control" id="purpose_of_visit" name="purpose_of_visit">
											<option value="Final Degree Certificate">Final Degree Certificate</option>
											<option value="Other">Other</option>
										  </select>
										</div>
										</div>
										
										<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
										
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
 