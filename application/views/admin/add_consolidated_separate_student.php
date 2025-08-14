<?php include('header.php');
error_reporting('e_all');
?>
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
                  <h4 class="card-title">Add Consolidated Marksheet</h4>
                  <p class="card-description">
                    Please enter result details
                  </p>
                 <form method="post" name="search_form" id="search_form">
				 <div class="row">
                    <div class="col-md-3">
						<div class="form-group">
							<label>Enrollment Number</label>
							<input type="text" name="enrollment" placeholder="Enrollment Number" id="enrollment" class="form-control" value="<?php if(!empty($student)){ echo $student->enrollment_number;}?>">
						</div>
					</div>
					<?php if(!empty($student)){?>
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
							<label>Note</label>
							<input type="text"  name="note" id="note" class="form-control" value="" placeholder="Note">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Issue Date</label>
							<input type="text" autocomplete="off" name="issue_date" id="issue_date" placeholder="Issue Date" class="form-control datepicker" value="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Issue Status</label>
							<select name="issue_status" id="issue_status" class="form-control">
								<option value="0">Inactive</option>
								<option value="1">Active</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Payment Date</label>
							<input type="text" autocomplete="off" name="payment_date" placeholder="Payment Date"  id="payment_date" class="form-control datepicker" value="">
						</div>
					</div>
					 <div class="col-md-3">
						<div class="form-group">
							<label>Payment ID</label>
							<input type="text" autocomplete="off" name="payment_id" placeholder="Payment ID" id="payment_id" class="form-control" value="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label>Payment Status</label>
						<select name="payment_status" id="payment_status" class="form-control"> 
							<option value="0">Failed</option>
							<option value="1">Success</option>
						</select>	
						</div>
					</div>
 
					</div>
				<hr>
                    <?php if(!empty($subject)){ foreach($subject as $subject_result){?>
                    <div class="row">                          
                          <div class="col-md-2">
                                <div class="form-group">
                                    <label>Subject Code</label>
                                    <input type="text"  name="subject_code[]" id="subject_code" class="form-control subject_code" value="<?=$subject_result->subject_code?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Subject Name</label>
                                    <input type="text" name="subject_name[]" id="subject_name" class="form-control subject_code" value="<?=$subject_result->subject_name?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Year/Sem</label>
                                    <select name="year_sem[]" id="year_sem" class="form-control subject_code"> 
                                        <option value="<?=$subject_result->year_sem?>"><?=$subject_result->year_sem?></option>
                                    </select>
                                </div>
                            </div>                        
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Internal </label>
                                    <input type="text" name="internal_mark[]"   id="internal_mark" class="form-control subject_code" value="<?=$subject_result->internal_marks_obtained?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>External</label>
                                    <input type="text" name="external_mark[]"   id="external_mark" class="form-control subject_code" value="<?=$subject_result->external_marks_obtained?>">
                                </div>
                            </div>
                            
                           
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text"  readonly name="total[]" id="total" class="form-control subject_code" value="<?=$subject_result->internal_marks_obtained+$subject_result->external_marks_obtained?>">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="text"  name="total_marks[]" id="total_marks" class="form-control subject_code" value="<?=$subject_result->internal_max_marks+$subject_result->external_max_marks?>">
                                </div>
                            </div>
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Grade</label>
                                    <input type="text"  name="grade[]" id="grade" class="form-control subject_code" value="<?=get_grade($subject_result->internal_marks_obtained+$subject_result->external_marks_obtained);?>">
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Credit</label>
                                    <input type="text"  name="credit[]" id="credit" class="form-control subject_code" value="6">
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Result</label>
                                    <input type="text"  name="result[]" id="result" class="form-control subject_code" value="<?=$subject_result->result?>">
                                </div>
                            </div>  
                     </div>
					 
						<?php }}}?>
						<?php /*
					 <br>
                        <div class ="appending_div " >
                        </div>
                        <div class="col-md-1">
                                <span id="add" class="fa btn btn-primary fa-plus add">Add</span>
                        </div>
						<?php */?>
							<br>
							
                    <div class="col-md-12">
                        <div class="form-group">
						<?php if(!empty($student)){?>
                            <input type="submit" name="show_subject" id="show_subject" class="btn btn-primary btn-sm" value="Submit">
						<?php }else{?>
                            <input type="submit" name="next" id="next" class="btn btn-primary btn-sm" value="Next">
						<?php }?>
						</div>
					</div>
				</form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      
<?php include('footer.php');


function get_grade($total_obtain){
	if($total_obtain >= 91){
		return "O";
	}else if($total_obtain >= 81 && $total_obtain <= 90){
		return "A+";
	}else if($total_obtain >= 71 && $total_obtain <= 80){
		return "A";
	}else if($total_obtain >= 61 && $total_obtain <= 70){
		return "B+";
	}else if($total_obtain >= 51 && $total_obtain <= 60){
		return "B";
	}else if($total_obtain >= 41 && $total_obtain <= 65){
		return "C";
	}else if($total_obtain >= 40 && $total_obtain <= 50){
		return "P";
	}else{
		return "F";
	}
}
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
<script type="text/javascript">     
$("#enrollment").keyup(function(){ console.log();
    $.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_name_separate_student",
		data:{'enrollment_number': $("#enrollment").val()},
		success: function(data){ 
            var obj = JSON.parse(data);
			if(obj){ console.log(obj);
				$("#student_name").val(obj['student_name']);
				$("#father_name").val(obj['father_name']);
				$("#course_name").val(obj['course_name']);
				$("#stream_name").val(obj['father_name']);
			}else{ console.log(obj);
				$("#student_name").val('');
				$("#father_name").val('');
				$("#course_name").val('');
				$("#stream_name").val('');
			} 
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});	
  

 function minus(obj)
		{
if (confirm('Do you really want to delete these records?')) {
		var id = $(obj).attr('id');
		$('#'+id).remove();
            }{}
	}

    var i=1;
    $("#add").click(function(){        
var field ='<div class="row" id= "appending_div"> <div class="col-md-2"><div class="form-group"><label>Subject Code</label><input type="text" name="subject_code[]" id="subject_code" class="form-control subject_code" value=""></div>  </div>  <div class="col-md-2">  <div class="form-group"> <label>Subject Name</label> <input type="text" name="subject_name[]" id="subject_name" class="form-control subject_code" value=""> </div> </div><div class="col-md-2"><div class="form-group"><label>Year/Sem</label><select name="year_sem[]" id="year_sem" class="form-control subject_code"><option value="">Select Year/Sem</option><?php for($s=1;$s<=12;$s++){?><option value="<?=$s?>"  <?php if($this->input->post('show_subject') != "" && $this->input->post('year_sem') == $s){ ?>selected="selected"<?php }?>><?=$s?></option><?php }?> </select></div></div> <div class="col-md-2"> <div class="form-group"> <label>Internal </label><input type="text" name="internal_mark[]" data-id = "'+i+'" onkeyup="calculate(this)" id="internal_mark'+i+'" class="form-control subject_code"></div> </div><div class="col-md-2"><div class="form-group"><label>External</label><input type="text" name="external_mark[]" data-id = "'+i+'" onkeyup="calculate(this)" id="external_mark'+i+'" class="form-control subject_code"> </div> </div><div class="col-md-2"><div class="form-group"><label>Credit</label><input type="text" name="credit[]" id="credit" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"> <label>Total</label><input type="text" readonly name="total[]" data-id = "'+i+'" id="total'+i+'" class="form-control"> </div></div> <div class="col-md-2"><div class="form-group"><label>Total</label><input type="text" name="total_marks[]" id="total_marks" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"><label>Grade</label><input type="text" name="grade[]" id="grade" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"><span class="fa fa-trash btn btn-primary remove_margin" id="appending_div"   onclick="minus(this)"></span> </div></div></div>';
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
		student_name: "required",			
		father_name: "required",			
		course_name: "required",			
		stream_name: "required",			
		enrollment: {"required":true,minlength:10,maxlength:20},
        issue_date: "required",			
		payment_date: "required",			
		payment_status: "required",			
		issue_status: "required",			
		payment_id: "required",					
			
	},
	messages: {
		student_name: "Please student name!",
		father_name: "Please enter father name!",
		course_name: "Please enter course name",
		stream_name: "Please enter stream name!", 
		enrollment: {required:"Please enter enrollment!",minlength:"Enter valid digit enrollment number",maxlength:"Enter valid digit enrollment number"},
		issue_date: "Please select date",			
		payment_date: "Please select date",			
		payment_status: "Please select status",			
		issue_status: "Please select status",			
		payment_id: "Please enter payment id",	
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