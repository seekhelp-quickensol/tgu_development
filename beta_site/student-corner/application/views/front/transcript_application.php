<?php include('header.php');?>
<style>
@page {
	size: A4;
	margin: 0;
	border:1px solid #000;
	height: 100%
}
</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Transcript Application</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
								 
								<div class="col-lg-12" style="display:block;">
									<?php if(empty($transcript)){?>
									<form onsubmit="return checkSubject();" class="form-horizontal" name="transcript_form" id="transcript_form" method="post">
										<div class="panel-body">
											<div class="col-md-12">
											    	<div class="box_layer_t" style="margin-bottom:10px">
											         <div class="btn_center"> 
												    <div class="step_Box">
												        <ul>
												            
												             <li class="step_active"><div class="step_box">1</div><div class="content_a">Apply</div></li>
												            <li ><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
												            <li ><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
												            <li><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
												        </ul>
												    </div>
											    </div>  
											    </div>  
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label" for="email">Name</label>
															<input id="name" required="" name="name" type="text" readonly="" placeholder="Name" class="form-control" value="<?php if(!empty($student_details)){ echo $student_details->student_name;}?>">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label" for="message">Enrollment Number</label>
																<input type="text" required="" readonly="" class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enrollment Number" value="<?php if(!empty($student_details)){ echo $student_details->enrollment_number;}?>">
																<input type="hidden" required="" readonly="" class="form-control" id="registration_id" name="registration_id" value="<?php if(!empty($student_details)){ echo $student_details->id;}?>">
														</div>			
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label" for="message">Branch</label>
															<input type="text" required="" class="form-control" id="branch" name="branch" placeholder="Branch Name" readonly="" value="<?php if(!empty($student_details)){ echo $student_details->stream_name;}?>">
														</div>			
													</div>	
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label" for="message">Degree Received</label>
															<input type="text" required="" class="form-control" id="degree_received" name="degree_received" placeholder="Degree Received" readonly="" value="<?php if(!empty($student_details)){ echo $student_details->print_name;}?>">
														</div>
													</div>	
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label" for="message">Course Duration*</label>
															<select required class="form-control" id="duration_of_course" name="duration_of_course">
																<option value="">Select Duration</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
															</select>
														</div>			
													</div>	 
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label" for="message">Year of Passing*</label>
															<input type="text"  class="form-control" id="year_of_passing" name="year_of_passing" placeholder="Year of Passing" value="">
														</div>			
													</div>
													<!-- <div class="col-md-4">
														<div class="form-group">
															<label class="control-label" for="message">Credit Note</label>
															<input type="text"  class="form-control" id="credit_note" name="credit_note" placeholder="Credit Note" value="<?php if(!empty($consolidated)){ echo $consolidated->note;}?>" readonly>
														</div>			
													</div> -->
												</div>
												<hr style="border:1px solid #eee !important;margin:10px 0;">
												<div class="col-md-12">
													<div class="col-md-6 col-md-offset-5">
														<div class="form-group">
															<label class="control-label" for="message">Fill below details</label>
															
														</div>	
													</div>
												</div>
												<hr style="border:1px solid #eee !important;margin:10px 0;">
												<div class="optionBox">
													
													<?php 
													if($student_details->center_id == 9){
													if(!empty($consolidated_details)){ foreach($consolidated_details as $consolidated_details_result){?>
													<div class="block">
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-2">
																	<label class="control-label" for="message">Sem/Year</label>
																	<input type="text" readonly class="form-control" id="sem1" name="sem[]" value="<?=$consolidated_details_result->year_sem?>" readonly> 
																</div>
																<div class="col-md-4">
																	<label class="control-label" for="message">Subject Name</label>
																	<input type="text" class="form-control" id="subject1" name="subject[]" placeholder="Type only one Subject in one box" value="<?=$consolidated_details_result->subject_name?>" readonly>
																</div> 
																<div class="col-md-2">
																	<label class="control-label" for="message">Type</label>
																	<select class="form-control" id="type1" name="type[]">
																		<option value="Theory">Theory</option>
																		<option value="Practical">Practical</option>
																	</select>
																 </div> 
																<div class="col-md-2"> 
																	<label class="control-label" for="message">Max Marks</label>
																	<input type="text" class="form-control" id="max_mark1" name="max_mark[]" placeholder="Max Mark" value="<?=$consolidated_details_result->total_marks?>" readonly>
																</div> 
																<div class="col-md-2"> 
																	<label class="control-label" for="message">Marks Obtained</label>
																	<input type="text" class="form-control" id="obtained1" name="obtained[]" placeholder="Marks Obtained" value="<?=$consolidated_details_result->total?>" readonly>
																</div> 
															</div>
														</div>
													</div> 
													<?php }}}else{
													if(!empty($consolidated_details)){ foreach($consolidated_details as $consolidated_details_result){	
														?>
													<div class="block">
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-2">
																	<label class="control-label" for="message">Sem/Year</label>
																	<input type="text" readonly class="form-control" id="sem1" name="sem[]" value="<?=$consolidated_details_result->year_sem?>" readonly> 
																</div>
																<div class="col-md-4">
																	<label class="control-label" for="message">Subject Name</label>
																	<input type="text" class="form-control" id="subject1" name="subject[]" placeholder="Type only one Subject in one box" value="<?=$consolidated_details_result->subject_name?>" readonly>
																</div> 
																<div class="col-md-2">
																	<label class="control-label" for="message">Type</label>
																	 <input type="text" readonly class="form-control" id="type1" name="type[]" value="<?php if($consolidated_details_result->subject_type == "0"){ echo "Theory";}else{ echo "Practical";}?>"> 
																 </div> 
																<div class="col-md-2"> 
																	<label class="control-label" for="message">Max Marks</label>
																	<input type="text" readonly  class="form-control" id="max_mark1" name="max_mark[]" placeholder="Max Mark" value="<?=$consolidated_details_result->internal_max_marks+$consolidated_details_result->external_max_marks?>">
																</div> 
																<div class="col-md-2"> 
																	<label class="control-label" for="message">Marks Obtained</label>
																	<input type="text" readonly class="form-control" id="obtained1" name="obtained[]" placeholder="Marks Obtained" value="<?=$consolidated_details_result->internal_marks_obtained+$consolidated_details_result->external_marks_obtained?>">
																</div> 
															</div>
														</div>
													</div> 
													<?php }}}?>
													<div class="box_layer_t" style="margin-top:5px">
														  
														<button type="submit" class="btn btn-success">Submit</button>  
														
													</div>
												</div>  
											</div> 
										</div>
										<div class="row"> 
										</div> 
									</div> 
								</div>
								</form>
								<?php } if(!empty($transcript) && $transcript->payment_status == 0){ ?>
							<div class="box_layer_t">
							        <div class="btn_center"> 
												    <div class="step_Box">
												        <ul>
												            
												             <li><div class="step_box">1</div><div class="content_a">Apply</div></li>
												            <li class="step_active"><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
												            <li ><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
												            <li><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
												        </ul>
												    </div>
											    </div>  
							        <p class="mid_bix">Dear <b><?=$student->student_name?></b>, please complete Transcript Certificate payment/fees to get your Transcript Certificate.</p>
									<a href="<?=base_url();?>pay_transcrip_certificate_fees" class="btn btn-success">Pay Transcript Fees</a>
								</div>
								<?php }if(!empty($transcript) && $transcript->payment_status == 1 && $transcript->approve_status == 0){?>
						        	<div class="box_layer_t">
						        	<div class="btn_center"> 
												    <div class="step_Box">
												        <ul>
												            
												             <li><div class="step_box">1</div><div class="content_a">Apply</div></li>
												            <li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
												            <li class="step_active"><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
												            <li><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
												        </ul>
												    </div>
											    </div>  
							       	<p class="mid_bix">Dear <b><?=$student->student_name?></b>, Please be patient your Transcript Certificate is under process, once it will approved your Transcript Certificate will be availble here.</p>
								</div>
							<?php }
								if(!empty($transcript) && $transcript->payment_status == 1 && $transcript->approve_status == 1){
							?>
								<div class="box_layer_t">
						        	<div class="btn_center"> 
												    <div class="step_Box">
												        <ul>
												            <li><div class="step_box">1</div><div class="content_a">Apply</div></li>
												             <li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
												           
												            <li><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
												            <li class="step_active"><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
												        </ul>
												    </div>
											    </div>  
							       <p class="mid_bix">Congratulations! your Transcript Certificate has been approved, please <a href="<?=base_url();?>print_transcript/<?=base64_encode($transcript->id)?>" target="_blank">Click here</a> to print your Transcript Certificate.</p>
								</div>
								
							 
							  	<?php }?> 
							</div>
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
function checkSubject(){
	if (document.getElementById("sem1").value.length==0 || document.getElementById("subject1").value.length==0 || document.getElementById("type1").value.length==0 || document.getElementById("obtained1").value.length==0 || document.getElementById("max_mark1").value.length==0){ 
		alert ("Please fill all fields for subject 1");
		return false; 
	}
   for(i=2;i<=100;i++){
		if (document.getElementById("sem" + i).value.length!=0 || document.getElementById("subject" + i).value.length!=0 || document.getElementById("type" + i).value.length!=0 || document.getElementById("obtained" + i).value.length!=0 || document.getElementById("max_mark" + i).value.length!=0)
		if (document.getElementById("sem" + i).value.length==0 || document.getElementById("subject" + i).value.length==0 || document.getElementById("type" + i).value.length==0 || document.getElementById("obtained" + i).value.length==0 || document.getElementById("max_mark" + i).value.length==0){
			alert ("Please fill all fields for subject " + i);
			return false; 
		}   
	} 
}

$("#transcript_form").validate({

rules: {

	duration_of_course: {

		required: true,

	},   
	year_of_passing: {

		required: true,

	},   

},

messages: {

	duration_of_course: {

		required: "Please select course duration",

	},
	year_of_passing: {

		required: "Please enter year of passing",

	},

},

submitHandler: function(form) {

	form.submit();

},

});

</script>
 