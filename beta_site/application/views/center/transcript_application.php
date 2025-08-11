<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<h4 class="card-title">Transcript Application</h4>
					<p class="card-description"></p>
					<?php
					  $true=0;
					  if($self == "0"){
					  $true=1;
					  ?>
						  <p style="color:red">Please upload self assessment form</p>
					  <?php }?>
					  <?php if($teacher == "0"){
						$true=1;
					  ?>
					  <p style="color:red">Please upload teacher assessment form</p>
					  <?php }?>
					  <?php if($assignment == "0"){
					  $true=1;
					  ?>
					  <p style="color:red">Please upload assignment assessment form</p>
					  <?php }?>
					  <?php if($true==0){
					 ?>
						<div class="col-lg-12" style="display:block;">
						<?php if(empty($transcript)){?>
						<form onsubmit="return checkSubject();" class="form-horizontal" name="transcript_form" id="transcript_form" method="post">
		<div class="panel-body">
			<div class="col-md-12">
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
						<label class="control-label" for="message">Course Duration</label>
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
						<label class="control-label" for="message">Year of Passing</label>
						<input type="text" required class="form-control" id="year_of_passing" name="year_of_passing" placeholder="Year of Passing" value="">
					</div>			
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label" for="message">Credit Note</label>
						<input type="text" required="" class="form-control" id="credit_note" name="credit_note" placeholder="Credit Note" value="<?php if(!empty($consolidate)){ echo $consolidate->note;}?>" readonly>
					</div>			
				</div>
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
						<?php if(!empty($consolidate_details)){ foreach($consolidate_details as $consolidate_details_result){?>
						<div class="block">
							<div class="col-md-12">
				                <div class="row">
				                    <div class="col-md-2">
        								<label class="control-label" for="message">Sem/Year</label>
								        <input type="text" readonly class="form-control" id="sem1" name="sem[]" value="<?=$consolidate_details_result->year_sem?>" readonly> 
							        </div>
						            <div class="col-md-4">
							    	    <label class="control-label" for="message">Subject Name</label>
								        <input type="text" class="form-control" id="subject1" name="subject[]" placeholder="Type only one Subject in one box" value="<?=$consolidate_details_result->subject_name?>" readonly>
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
            							<input type="text" class="form-control" id="max_mark1" name="max_mark[]" placeholder="Max Mark" value="<?=$consolidate_details_result->total_marks?>" readonly>
							        </div> 
            						<div class="col-md-2"> 
        								<label class="control-label" for="message">Marks Obtained</label>
        								<input type="text" class="form-control" id="obtained1" name="obtained[]" placeholder="Marks Obtained" value="<?=$consolidate_details_result->total?>" readonly>
        							</div> 
        						</div>
        					</div>
        				</div> 
						<?php }}?>
						 
            		<div class="col-md-4 col-md-offset-4" style="margin-top:10%">
			<button type="submit" class="btn btn-primary">Apply &amp; Pay for Transcript</button> 
		</div>
				</div>
				
		
				</div>
	
	</div>

<div class="row">
     	
    
</div>
 

</div>
						
</div></form>
						<?php }
						if(!empty($transcript) && $transcript->payment_status == 0){
						?>
						<a href="<?=base_url();?>center_pay_transcrip_certificate_fees/<?=$student_details->id?>" class="btn btn-success">Pay Transcript Fees</a>
						<?php }
						if(!empty($transcript) && $transcript->payment_status == 1 && $transcript->approve_status == 0){
						?>
					<button  class="btn btn-primary">Waiting for approval .....</button>
						<?php }
							if(!empty($transcript) && $transcript->payment_status == 1 && $transcript->approve_status == 1){
						?>
					<a href="<?=base_url();?>center_print_transcript/<?=$student_details->id?>" target="_blank" class="btn btn-success">Print Transcript</a>
					  <?php }}?>
						</div>
							<div class="container" id="container">
					 
      
	</div>



							 

                </div>
              </div>
            </div>
          </div>
        </div>
      
<?php include('footer.php');?>

<script>
  
function checkSubject(){
	if (document.getElementById("sem1").value.length==0 || document.getElementById("subject1").value.length==0 || document.getElementById("type1").value.length==0 || document.getElementById("obtained1").value.length==0 || document.getElementById("max_mark1").value.length==0)
	{ 
		alert ("Please fill all fields for subject 1");
		return false;
		
	}
   for(i=2;i<=100;i++){
		if (document.getElementById("sem" + i).value.length!=0 || document.getElementById("subject" + i).value.length!=0 || document.getElementById("type" + i).value.length!=0 || document.getElementById("obtained" + i).value.length!=0 || document.getElementById("max_mark" + i).value.length!=0)
			if (document.getElementById("sem" + i).value.length==0 || document.getElementById("subject" + i).value.length==0 || document.getElementById("type" + i).value.length==0 || document.getElementById("obtained" + i).value.length==0 || document.getElementById("max_mark" + i).value.length==0)
			{
				alert ("Please fill all fields for subject " + i);
				return false;
				
			}   
	}
		
}
	
</script>