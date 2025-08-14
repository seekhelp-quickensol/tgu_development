<?php include('header.php');?>
<style>
    .visible_error{
        color:red !important;
    }
	.text-container {
	  max-height: 50px; /* Set the maximum height to show */
	  overflow: hidden;
	  position: relative;
	}

	.text-container.expanded {
	  max-height: none; /* Show the entire content when expanded */
	}

	.read-more {
	  display: block;
	  position: absolute;
	  bottom: 0;
	  right: 0;
	  background-color: #f1f1f1;
	  padding: 5px 10px;
	}
    </style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
					Add Other University Result
					<a class="btn btn-primary btn-sm" style="float:right" href="<?=base_url();?>add_consolidated/<?=$this->uri->segment(2)?>">Back</a>
				  </h4>
                  <p class="card-description">
                    Please enter result details
                  </p>
                 <form method="post" name="search_form" id="search_form" enctype="multipart/form-data">
				 <div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Enrollment</label>
							<input type="text" <?php if(!empty($student)){?>readonly<?php }?> name="enrollment" id="enrollment" class="form-control" value="<?php if(!empty($student)){ echo $student->enrollment_number;}?>">
						</div>
					</div>
					 
					<div class="col-md-3">
						<div class="form-group">
							<label>Student Name</label>
							<input type="text" readonly name="student_name" id="student_name" class="form-control" value="<?=$student->student_name?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Father Name</label>
							<input type="text" readonly name="father_name" id="father_name" class="form-control" value="<?=$student->father_name?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Course Name</label>
							<input type="text" readonly name="course_name" id="course_name" class="form-control" value="<?=$student->print_name?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Stream Name</label>
							<input type="text" readonly name="stream_name" id="stream_name" class="form-control" value="<?=$student->stream_name?>">
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="form-group">
							<label>Upload Result</label>
							<input type="file" name="userfile" id="userfile" class="form-control">
						</div>
					</div>   
					<div class="col-md-3">
						<div class="form-group">
							<label>Previous University Name*</label>
							<input type="text" name="result_university" id="result_university" class="form-control" placeholder="Result University Name">
						</div>
					</div>
                </div>
				<hr>
				<div class="appending_div">
				    <div class="row">                          
							<div class="col-md-2">
								<div class="form-group">
									<label>Year/Sem*</label>
									<select name="year_sem[]" id="year_sem" class="form-control subject_code" required> 
										<option value="">Select Year/Sem</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
									</select>
								</div>
							</div>   
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Subject Code</label>
                                    <input type="text"  name="subject_code[]" id="subject_code" class="form-control subject_code">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Subject Name</label>
                                    <input type="text" name="subject_name[]" id="subject_name" class="form-control subject_code">
                                </div>
                            </div>
                                                 
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Internal </label>
                                    <input type="text" name="internal_mark[]"   id="internal_mark" class="form-control subject_code">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>External</label>
                                    <input type="text" name="external_mark[]"   id="external_mark" class="form-control subject_code">
                                </div>
                            </div>
                            
                           
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text"  name="total[]" id="total" class="form-control subject_code">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="text"  name="total_marks[]" id="total_marks" class="form-control subject_code">
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Grade</label>
                                    <input type="text"  name="grade[]" id="grade" class="form-control subject_code" value="">
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Credit</label>
                                    <input type="text" name="credit[]" id="credit" class="form-control subject_code" value="">
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Result</label>
                                    <input type="text"  name="result[]" id="result" class="form-control subject_code" value="PASS">
                                </div>
                            </div> 
						</div>
					</div>
						<div class="col-md-12">
							<button type="button" class="btn btn-primary btn-sm" name="add_more" id="add">Add More</button>
						</div>	
						<hr>
						<div class="text-container">
							<p>
							<b><input type="checkbox" checked="checked" disabled>Acceptance of Responsibility for Uploaded Results</b><br><br>
							I acknowledge that the results uploading are accurate and authentic to the best of my knowledge. As the responsible party for these documents, I take full ownership of their veracity and compliance with any relevant regulations and guidelines.
							<br><br>
							I am fully aware of the importance of academic integrity and adherence to the policies set forth by <b>THE GLOBAL UNIVERSITY Arunachal Pradesh.</b> Therefore, I assure you that all information provided will be in line with the university's standards and will not be subject to any misrepresentation or fabrication.
							</p>
							<a href="#" class="read-more">Read More</a>
						</div>

						<input type="submit" name="show_subject" id="show_subject" class="btn btn-primary btn-sm" value="Submit">
						</div> 
					</form>
                </div>
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
<script type="text/javascript">     
 $(document).ready(function() {
  const restrictedWords = ['birtikendrajituniversity', 'tgu.ac.in','bir tikendraji tuniversity','BIR TIKENDRAJIT UNIVERSITY','bir','Bir','BTU','btu','Arunachal Pradesh','Arunachal Pradesh'];

  $('#result_university').on('keyup', function(e) {
    const inputText = $(this).val() + String.fromCharCode(e.which);

    for (const word of restrictedWords) {
      if (inputText.indexOf(word) !== -1) {
        e.preventDefault();
        alert(`The word "${word}" is not allowed.`);
		$('#result_university').val('');
        break;
      }
    }
  });
   $('.read-more').on('click', function(e) {
      e.preventDefault();
      const textContainer = $(this).closest('.text-container');
      textContainer.toggleClass('expanded');
      if (textContainer.hasClass('expanded')) {
        $(this).text('Read Less');
      } else {
        $(this).text('Read More');
      }
    });
});

 function minus(obj)
		{
        if (confirm('Do you really want to delete these records?')) {
			$(obj).closest('.row').remove();
		//var id = $(obj).attr('id');alert(id);
		//$('#'+id).remove();
            }{}
	}
 var i=1;
    $("#add").click(function(){       
		var field ='<hr><div class="row" id= ""><div class="col-md-2"><div class="form-group"><label>Year/Sem*</label><select name="year_sem[]" id="year_sem" class="form-control subject_code" required><option value="">Select Year/Sem</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select></div></div><div class="col-md-2"><div class="form-group"><label>Subject Code</label><input type="text"  name="subject_code[]" id="subject_code" class="form-control subject_code"></div></div><div class="col-md-4"><div class="form-group"><label>Subject Name</label><input type="text" name="subject_name[]" id="subject_name" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"><label>Internal </label><input type="text" name="internal_mark[]"   id="internal_mark" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"><label>External</label><input type="text" name="external_mark[]"   id="external_mark" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"><label>Total</label><input type="text"  name="total[]" id="total" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"><label>Total Marks</label><input type="text"  name="total_marks[]" id="total_marks" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"><label>Grade</label><input type="text"  name="grade[]" id="grade" class="form-control subject_code" value=""></div></div><div class="col-md-2"><div class="form-group"><label>Credit</label><input type="text" name="credit[]" id="credit" class="form-control subject_code" value=""></div></div><div class="col-md-2"><div class="form-group"><label>Result</label><input type="text"  name="result[]" id="result" class="form-control subject_code" value="PASS"></div></div> <div class="col-md-2"><div class="form-group"><span class="fa fa-trash btn btn-primary remove_margin" id="appending_div"   onclick="minus(this)"></span> </div></div>';
		$(".appending_div").append(field);
        i++;
    });



function calculate(obj){
    var data_id = $(obj).attr('data-id');
    var id = $(obj).attr('id');

    var internal_mark = $('#internal_mark'+data_id).val(); 
    var external_mark = $('#external_mark'+data_id).val();
    var value = Number(external_mark)+ Number(internal_mark);
    $('#total'+data_id).val(value);        
}
/*
$('#external_mark').keyup(function(){
    var external_mark = $('#external_mark').val();
    var internal_mark = $('#internal_mark').val();
        var value = Number(external_mark ) + Number(internal_mark);
    $('#total').val(value);
});

$('#internal_mark').keyup(function(){
    var external_mark = $('#external_mark').val();
    var internal_mark = $('#internal_mark').val();
        var value = Number(external_mark)+ Number(internal_mark);
    ;
    $('#total').val(value);
        
});
 */      
</script>
<script type="text/javascript">
function validation(){
	var retVal=true;
	if (!document.AddForm.comboTResult)
		retVal=false;
	if (document.AddForm.comboTResult)
		if (document.AddForm.comboTResult.selectedIndex==0)
		{
			alert("Please select result status.");
			retVal=false;
		}
	return retVal;
}

$("#search_form").validate({
	rules: {
		year_sem: "required",			
		/*userfile: "required",*/			
		result_university: "required",			
			
			
	},
	messages: {
		year_sem: "Please select year/sem",			
		/*userfile: "Please upload result",*/			
		result_university: "Please enter university name",		 
	}, 
	submitHandler: function(form){
		//form.submit();
        new_validate();
	} 
});

function new_validate() { 
	 $(".visible_error").html("");
	var st = 0;
	 $('.subject_code').each(function(){
		
		if($(this).val() == ""){
			st=1;
			$(this).after('<label generated="true" class="visible_error">Field is required</label>');
				$(".visible_error").attr("style", "display:block","color:red");
				
		} 
	});
	if(st == "0"){
		form.submit();
	}else{
		event.preventDefault();
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