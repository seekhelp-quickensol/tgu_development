<?php include('header.php');?>
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
                  <h4 class="card-title">Update Consolidated Marksheet</h4>
                  <p class="card-description">
                    Please enter result details
                  </p>
                 <form method="post" name="search_form" id="search_form">
                     <input type="hidden" name="hidden_consolidate_id" value="<?=$this->uri->segment(2)?>" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Credit Note</label>
                            <input type="text"  name="note" id="note" class="form-control" value="<?php if(!empty($single)){ echo $single->note;}?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
							<label>Issue Date</label>
							<input type="text" autocomplete="off" name="issue_date" id="issue_date" class="form-control datepicker" value="<?php if(!empty($single) && $single->issue_date != "1970-01-01" && $single->issue_date != "0000-00-00"){ echo date("d-m-Y",strtotime($single->issue_date));}?>">
						</div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
							<label>Issue Status</label>
							<select name="issue_status" id="issue_status" class="form-control">
								<option value="0" <?php if(!empty($single) && $single->issue_status == "0"){?>selected="selected"<?php }?>>Un Approved</option>
								<option value="1" <?php if(!empty($single) && $single->issue_status == "1"){?>selected="selected"<?php }?>>Approved</option>
							</select>
						</div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
							<label>Payment Date</label>
							<input type="text" autocomplete="off" name="payment_date" id="payment_date" class="form-control datepicker" value="<?php if(!empty($single) && $single->payment_date != "1970-01-01" && $single->payment_date != "0000-00-00"){ echo date("d-m-Y",strtotime($single->payment_date));}?>">
						</div>
                    </div>
					 <div class="col-md-6">
                        <div class="form-group">
							<label>Payment ID</label>
							<input type="text" autocomplete="off" name="payment_id" id="payment_id" class="form-control" value="<?php if(!empty($single)){ echo $single->payment_id;}?>">
						</div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
							<label>Payment Status</label>
							<select name="payment_status" id="payment_status" class="form-control"> 
								<option value="0" <?php if(!empty($single) && $single->payment_status == "0"){?>selected="selected"<?php }?>>Failed</option>
								<option value="1" <?php if(!empty($single) && $single->payment_status == "1"){?>selected="selected"<?php }?>>Success</option>
							</select>
						</div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Signature</label>
                            <select class="form-control" id="signature" name="signature">
                                <option value="">Select Signature</option>
                                <?php if(!empty($signature)){ foreach($signature as $signature_result){?>
                                <option value="<?=$signature_result->id?>" <?php if(!empty($single) && $single->signature_id == $signature_result->id){?>selected="selected"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
                                <?php }}?> 
                            </select>
						</div>
                    </div>
					 
                </div>
                <?php /*if(!empty($consolidate_details)){
                     $k=1;
                    foreach($consolidate_details as $consolidate_details_result){?>
                    <div class="row count_loop" id="po_div_<?=$k?>">                          
                          <div class="col-md-3">
                                <div class="form-group">
                                    <label>Subject Code</label>
                                    <input type="text"  name="subject_code[]" id="subject_code" class="form-control subject_code" value="<?=$consolidate_details_result->subject_code?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Subject Name</label>
                                    <input type="text" name="subject_name[]" id="subject_name" class="form-control subject_code" value="<?=$consolidate_details_result->subject_name?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Year/Sem</label>
                                    <select name="year_sem[]" id="year_sem" class="form-control subject_code">
                                        <option value="">Select Year/Sem</option>
                                        <?php for($s=1;$s<=12;$s++){?>
                                        <option value="<?=$s?>"  <?php if($consolidate_details_result->year_sem == $s){ ?>selected="selected"<?php }?>><?=$s?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Internal </label>
                                    <input type="text" name="internal_mark[]" onkeyup="calculate_rate(<?=$k?>)" data-id="<?=$k?>"   id="internal_mark<?=$k?>" class="form-control subject_code" value="<?=$consolidate_details_result->internal_mark?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>External</label>
                                    <input type="text" name="external_mark[]"  onkeyup="calculate_rate(<?=$k?>)" data-id="<?=$k?>"  id="external_mark<?=$k?>" class="form-control subject_code" value="<?=$consolidate_details_result->external_mark?>">
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" name="total[]" data-id="<?=$k?>" id="total<?=$k?>" class="form-control subject_code" value="<?=$consolidate_details_result->internal_mark+$consolidate_details_result->external_mark?>">
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="text"  name="total_marks[]" id="total_marks" class="form-control subject_code" value="<?=$consolidate_details_result->internal_mark+$consolidate_details_result->external_mark?>">
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Grade</label>
                                    <input type="text"  name="grade[]" id="grade" class="form-control subject_code" value="<?=$consolidate_details_result->grade?>">
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Credit</label>
                                    <input type="text"  name="credit[]" id="credit" class="form-control subject_code" value="<?=$consolidate_details_result->credit?>">
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Result</label>
                                    <input type="text"  name="result[]" id="result" class="form-control subject_code" value="<?=$consolidate_details_result->result?>">
                                </div>
                            </div> 
                            <?php /*if($k == '1'){}else{?>
                            <div class="col-md-1">
                            <span class="fa  btn btn-primary fa-trash remove_margin" title="Delete" id="po_div <?=$k?>"   onclick="remove(<?=$k?>)" ></span>
                        </div>
                        <?php }*//* ?>
                     </div>
					 <hr>
                     <?php $k++; } }*/?>
                         <!-- <div class ="appending_div " >
                           </div>
                            <div class="col-md-1">
                                 <span id="add" class="fa btn btn-primary fa-plus add">Add</span>
                            </div>-->
							<br>
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
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
<script type="text/javascript"> 
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
		maxDate:0,
		/*maxDate: "-12Y",
		minDate: "-80Y",
		yearRange: "-100:-0"*/
	});
  } );
  
  
 function get_name(obj){
   var  enrollment_number = $(obj).val();
     $.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_name_student",
		data:{'enrollment_number': enrollment_number},
		success: function(data){
         
            var obj = JSON.parse(data);
					var name = obj['student_name'];
                    
                    var father_name = obj['father_name']
                    var course_name = obj['course_name']
                    var stream_name = obj['stream_name']
                    $("#student_name").val(name);
                    $("#father_name").val(father_name);
                    $("#course_name").val(course_name);
                    $("#stream_name").val(stream_name);

		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
 }

 function minus(obj)
		{
     if (confirm('Do you really want to delete these records?')) {
      		var id = $(obj).attr('id');
		$('#'+id).remove();
            }{}
	}

 var i=1;
    $("#add").click(function(){
        
var field ='<div class="row" id= "appending_div"> <div class="col-md-2"><div class="form-group"><label>Subject Code</label><input type="text" name="subject_code[]" id="subject_code" class="form-control subject_code" value=""></div>  </div>  <div class="col-md-2">  <div class="form-group"> <label>Subject Name</label> <input type="text" name="subject_name[]" id="subject_name" class="form-control subject_code" value=""> </div> </div><div class="col-md-2"><div class="form-group"><label>Year/Sem</label><select name="year_sem[]" id="year_sem" class="form-control subject_code"><option value="">Select Year/Sem</option><?php for($s=1;$s<=12;$s++){?><option value="<?=$s?>"  <?php if($this->input->post('show_subject') != "" && $this->input->post('year_sem') == $s){ ?>selected="selected"<?php }?>><?=$s?></option><?php }?> </select></div></div> <div class="col-md-2"> <div class="form-group"> <label>Internal </label><input type="text" name="internal_mark[]" data-id = "'+i+'" onkeyup="calculate(this)" id="internal_mark1'+i+'" class="form-control subject_code"></div> </div><div class="col-md-2"><div class="form-group"><label>External</label><input type="text" name="external_mark[]" data-id = "'+i+'" onkeyup="calculate(this)" id="external_mark1'+i+'" class="form-control subject_code"> </div> </div><div class="col-md-2"><div class="form-group"><label>Credit</label><input type="text" name="credit[]" id="credit" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"> <label>Total</label><input type="text" name="total[]" readonly data-id = "'+i+'" id="total1'+i+'" class="form-control"> </div></div><div class="col-md-2"><div class="form-group"><label>Grade</label><input type="text" name="grade[]" id="grade" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"><span class="fa fa-trash btn btn-primary remove_margin" id="appending_div"   onclick="minus(this)"></span> </div></div></div>';
$(".appending_div").append(field);
        i++;
    });



function calculate(obj){

    var data_id = $(obj).attr('data-id');
    var id = $(obj).attr('id');

    var internal_mark = $('#internal_mark1'+data_id).val(); 

    var external_mark = $('#external_mark1'+data_id).val();
    var value = Number(external_mark)+ Number(internal_mark);
    $('#total1'+data_id).val(value);        
}

function calculate_rate(obj){
    internal_mark = $('#internal_mark1'+obj).val();
    external_mark = $('#external_mark1'+obj).val();			
    var value = Number(external_mark)+ Number(internal_mark);
    $('#total1'+obj).val(value);  		
}

 function remove(obj){
var i  = $('.count_loop').length;    
if(i>1){
if (confirm('Do you really want to delete these records?')) {
      
    $('#po_div_'+obj).remove();
}else{}
}
}
        
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
		issue_date: "required",			
		payment_date: "required",			
		payment_status: "required",			
		payment_id: "required",			
		issue_status: "required",			
		enrollment: {"required":true,minlength:10,maxlength:20},	
        signature:"required":true,	
			
	},
	messages: {
		student_name: "Please student name!",
		father_name: "Please enter father name!",
		course_name: "Please enter course name",
		stream_name: "Please enter stream name!",
		issue_date: "Please select date",			
		payment_date: "Please select date",			
		payment_status: "Please select status",			
		payment_id: "Please enter payment id",		
		issue_status: "Please select status id",		
		enrollment: {required:"Please enter enrollment!",minlength:"Enter valid digit enrollment number",maxlength:"Enter valid digit enrollment number"},
		signature: "Please select signature",		
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
	
</script>     