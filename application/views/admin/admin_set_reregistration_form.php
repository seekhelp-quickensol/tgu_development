<?php include('header.php');?>
<style>
	.btn-small{
		padding: 5px 10px;
	}
	.no_doc{
		margin-bottom: 0px;
		padding: 5px;
		background: #ddd;
		color: #000;
		text-align: center;
	}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fill RR Form
				  </h4>
                  <!-- <p class="card-description">
                    Please enter RR details
                  </p> -->
				  <?php if(empty($student)){?>
					<form method="post" name="verification_form" id="verification_form" enctype="multipart/form-data">
						<div class="row"> 
							<div class="col-md-12"> 
								<div class="personal_details"> 
									<!-- <h3>Enrollment Verification</h3>	 
									<small>Please provide your enrollment number</small> 
									<hr>  -->
								</div> 
							</div> 
						</div> 
						<div class="row edu"> 
							<div class="col-md-12"> 
								<div class="form-group"> 
									<label>Enter Your Enrollment Number<span class="req">*</span></label> 
									<input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter Your Enrollment Number"> 
								</div> 
							</div> 
						</div>  
						<div class="row"> 
							<div class="col-md-12 edu"> 
								<div class="form-group"> 
									<label></label> 
									<button type="submit" class="btn btn-primary" name="next" id="next" value="next">Next</button> 
									<div class="pull-right"> 
									</div> 
								</div>
							</div>	
						</div> 
					</form>
				  
				  <?php }else{
							
				?>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
					<div class="col-md-3">
					<div class="form-group">
						<label>Student Name <span class="req">*</span></label>
						<input type="text" name="student_name" id="student_name" readonly class="form-control charector" placeholder="Student Full Name" value="<?php if(!empty($student)){ echo $student->student_name;}?>">

					 </div>
					</div>

					<div class="col-md-3">
                    <div class="form-group">
                     <label>Enrollment Number <span class="req">*</span></label>
					<input type="text" readonly id="enrollment_number" name="enrollment_number" class="form-control" value="<?php if(!empty($student)){ echo $student->enrollment_number;}?>">

					 </div>
					</div>

					<div class="col-md-3">
					<div class="form-group">
                      <label>Father's Name <span class="req">*</span></label>
					<input type="text" name="father_name" id="father_name" readonly class="form-control charector" placeholder="Fathers Name" value="<?php if(!empty($student)){ echo $student->father_name;}?>">

                    </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
						<label>Mother's Name <span class="req">*</span></label>
						<input type="text" name="mother_name" id="mother_name" readonly class="form-control charector" placeholder="Mothers Name" value="<?php if(!empty($student)){ echo $student->mother_name;}?>">

					  </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                      <label>Date of Birth <span class="req">*</span></label>
					<input type="text" name="date_of_birth" id="date_of_birth" readonly class="form-control" placeholder="DD-MM-YY" value="<?php if(!empty($student)){ echo date("d/m/Y",strtotime($student->date_of_birth));}?>">

                    </div>
					</div>

					<div class="col-md-3">
                    <div class="form-group">
                     <label>Email <span class="req">*</span></label>
					<input type="text" readonly id="email" name="email" class="form-control" value="<?php if(!empty($student)){ echo $student->email;}?>">

					 </div>
					</div>

					<!-- </div>
					<div class="row"> -->
					
					<div class="col-md-3">
                    <div class="form-group">
                      <label>Session<span class="req">*</span></label>
					<input type="text" readonly id="session" name="session" class="form-control" value="<?php if(!empty($student)){ echo $student->session_name;}?>">

					  </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
						<label>Course<span class="req">*</span></label>
						<input type="text" readonly id="course_name" name="course_name" class="form-control" value="<?php if(!empty($student)){ echo $student->course_name;}?>">

					  </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">
                     <label>Stream <span class="req">*</span></label>
					<input type="text" readonly id="stream_name" name="stream_name" class="form-control" value="<?php if(!empty($student)){ echo $student->stream_name;}?>">

					 </div>
					</div>
					<div class="col-md-3">
                    <div class="form-group">                     
						<label>Semester/Year <span class="req">*</span></label> 
						<select id="year_sem" name="year_sem" class="form-control"> 
							<option value="<?=$student->year_sem+1?>"><?=$student->year_sem+1?></option> 
						</select>
					 </div>
					</div>
					
					</div>
					 
					
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($student)){ echo $student->id;}?>">
				  
                    <button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
				  <?php }?>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      
<?php include('footer.php');
$id=0;
if($this->uri->segment(2) != ""){
	$id = $this->uri->segment(2);
}
?>
 <script>
 $.validator.addMethod("noHTMLtags", function(value, element) {
    var htmlPattern = /<\/?[^>]+(>|$)/g;
    return !htmlPattern.test(value);
}, "HTML tags are not allowed!");
$("#verification_form").validate({ 
	ignore:[], 
	rules: { 
		enrollment_number: { 
			required: true, 
			noHTMLtags: true, 
		},	 
	}, 
	messages: { 
		enrollment_number: { 
			required: "Please enter enrollment number!", 
			noHTMLtags:"HTML tags not allowed!", 
		}, 
	}, 
	submitHandler: function(form){
		form.submit();
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
 