<?php include('header.php');?>



		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Transcript Application</h4>

                  <p class="card-description">

                    

                  </p>

            

						<div class="col-lg-12" style="display:block;">

						<?php if(empty($student_details)){?>

							<form class="form-horizontal" name="verification_form" id="verification_form" method="post">

								<div class="panel-body">

									<div class="col-md-12">

										<div class="row"> 

											<div class="col-md-6">

												<div class="form-group">

													<label class="col-md-4 control-label" for="message">Enrollment Number</label>

													<div class="col-md-6">

														<input type="text" required="" class="form-control" id="enrollment_number" name="enrollment_number" placeholder="Enrollment Number" value="">

													</div>

												</div>

												<div class="col-md-6" style="margin-top:5%">

													<button type="submit" name="next" value="next" class="btn btn-primary single_btn">Next</button> 

												</div>

											</div> 

											

										</div> 

									</div>

								</div>

							</form> 

						<?php }else{?>

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

						<select required="" class="form-control" id="duration_of_course" name="duration_of_course">

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

						<label class="ontrol-label" for="message">Year of Passing</label>

						<input type="text" required="" class="form-control" id="year_of_passing" name="year_of_passing" placeholder="Year of Passing" value="">

					</div>			

				</div>			 

				<div class="col-md-4">

					<div class="form-group">

						<label class="ontrol-label" for="message">Credit Note</label>

						<!-- <input type="text" required="" readonly class="form-control" id="credit_note" name="credit_note" placeholder="Credit Note" value="<?php if(!empty($consolidate)){ echo $consolidate->note;}?>"> -->
						<input type="text" required="" class="form-control" id="credit_note" name="credit_note" placeholder="Credit Note" value="<?php if(!empty($consolidate)){ echo $consolidate->note;}?>">
					</div>			

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label class="control-label" for="message">Issue Date</label>

						<input type="text" class="form-control datepicker" autocomplete="off" id="issue_date" name="issue_date" placeholder="Issue Date" value="">

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

						<?php if(!empty($subject_details)){ foreach($subject_details as $subject_details_result){?>

					    <div class="block">

							<div class="col-md-12">

				                <div class="row">

				                    <div class="col-md-2">

        								<label class="control-label" for="message">Sem/Year</label>

								        <input type="text" readonly class="form-control" id="sem1" name="sem[]" value="<?=$subject_details_result->year_sem?>"> 

							        </div>

						            <div class="col-md-4">

							    	    <label class="control-label" for="message">Subject</label>

								        <input type="text" readonly class="form-control" id="subject1" name="subject[]" placeholder="Type only one Subject in one box" value="<?=$subject_details_result->subject_name?>">

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

            							<input type="text" readonly  class="form-control" id="max_mark1" name="max_mark[]" placeholder="Max Mark" value="<?=$subject_details_result->total_marks?>">

							        </div> 

            						<div class="col-md-2"> 

        								<label class="control-label" for="message">Marks Obtained</label>

        								<input type="text" readonly class="form-control" id="obtained1" name="obtained[]" placeholder="Marks Obtained" value="<?=$subject_details_result->total?>">

        							</div>

        						</div>

        					</div>

        				</div>

						<?php }}?>  

            		<div class="col-md-4 col-md-offset-4" style="margin-top:10%">

			<button type="submit" class="btn btn-primary">Submit</button> 

		</div>

				</div>

				

		

				</div>

	

	</div>



<div class="row">

</div>

</div></div></form>

						<?php }?>

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



$("#verification_form").validate({

	rules: {

		enrollment_number: "required",			 

	},

	messages: {

		enrollment_number: "Please enter enrollment number!", 

	}, 

	submitHandler: function(form){

		form.submit();

	} 

});



var x=1;

$('.add').click(function() {

	x++;

    $('.block:last').before('<div class="block"><div class="col-md-12"><div class="row"><div class="col-md-2"> <div class="form-group"> 	<label class="control-label" for="message">Sem/Year</label> <select class="form-control" id="sem'+x+'" name="sem[]"> <option value="">Select Sem/Year</option>  <option value="1">1</option>  <option value="2">2</option>  <option value="3">3</option>  <option value="4">4</option>  <option value="5">5</option>  <option value="6">6</option>  <option value="7">7</option>  <option value="8">8</option>  <option value="9">9</option>  <option value="10">10</option>  <option value="11">11</option>  <option value="12">12</option>  </select> </div> </div><div class="col-md-4"> <div class="form-group"> <label class="control-label" for="message">Subject</label> <input type="text" class="form-control" id="subject'+x+'" name="subject[]" placeholder="Type only one Subject in one box" value=""> </div> </div> <div class="col-md-2"> <div class="form-group"> <label class="control-label" for="message">Type</label> 	<select class="form-control" id="type'+x+'" name="type[]"> <option value="Theory">Theory</option> <option value="Practical">Practical</option> </select> </div> </div>  <div class="col-md-2"> <div class="form-group"> <label class="control-label" for="message">Max Marks</label> <input type="text" class="form-control" id="max_mark'+x+'" name="max_mark[]" placeholder="Max Mark" value=""> </div> </div><div class="col-md-2"> <div class="form-group"> <label class="control-label" for="message">Marks Obtained</label> <input type="text" class="form-control" id="obtained'+x+'" name="obtained[]" placeholder="Marks Obtained" value=""> </div> </div>	</div><span class="remove"><i class="fa fa-minus btn btn-danger"></i></span></div></div>');

	

});

$('.optionBox').on('click','.remove',function() {

    $(this).parent().remove();

});



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