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
                  <h4 class="card-title">Add Consolidated Marksheet</h4>
                  <p class="card-description">
                    Please enter result details
                  </p>
                 <form method="post" name="search_form" id="search_form">
                     <input type="hidden" name="hidden_consolidate_id" value="<?=$this->uri->segment(2)?>" >
                     <input type="hidden" name="hidden_consolidate_id" value="<?=$this->uri->segment(2)?>" >
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text"  name="note" id="note" class="form-control" value="<?php if(!empty($single)){ echo $single->note;}?>">
                            </div>
                        </div>
                    </div>
                <?php if(!empty($consolidate_details)){
                     $k=1;
                    foreach($consolidate_details as $consolidate_details_result){?>
                    <div class="row count_loop" id="po_div_<?=$k?>">                          
                          <div class="col-md-2">
                                <div class="form-group">
                                    <label>Subject Code</label>
                                    <input type="text"  name="subject_code[]" id="subject_code" class="form-control subject_code" value="<?=$consolidate_details_result->subject_code?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Subject Name</label>
                                    <input type="text" name="subject_name[]" id="subject_name" class="form-control subject_code" value="<?=$consolidate_details_result->subject_name?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
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
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Internal </label>
                                    <input type="text" name="internal_mark[]" onkeyup="calculate_rate(<?=$k?>)"    id="internal_mark<?=$k?>" class="form-control subject_code" value="<?=$consolidate_details_result->internal_mark?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>External</label>
                                    <input type="text" name="external_mark[]"  onkeyup="calculate_rate(<?=$k?>)"   id="external_mark<?=$k?>" class="form-control subject_code" value="<?=$consolidate_details_result->external_mark?>">
                                </div>
                            </div> 
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" name="total[]"  id="total<?=$k?>" class="form-control subject_code" value="<?=$consolidate_details_result->total?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Total Marks</label>
                                    <input type="text"  name="total_marks[]" id="total_marks" class="form-control subject_code" value="<?=$consolidate_details_result->total_marks?>" readonly>
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
                                    <input type="text"  name="credit[]" id="credit" class="form-control subject_code" value="<?=$consolidate_details_result->credit?>" readonly>
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label>Result</label>
                                    <input type="text"  name="result[]" id="result" class="form-control subject_code" value="<?=$consolidate_details_result->result?>" readonly>
                                </div>
                            </div> 
                            <?php if($k == '1'){}else{?>
                            <div class="col-md-1 delete">
                            <span class="fa  btn btn-primary fa-trash remove_margin" title="Delete" id="po_div <?=$k?>"   onclick="remove(<?=$k?>)" ></span>
                        </div>
                        <?php }?>
                     </div>
                     <?php $k++; } }?>
                          <div class ="appending_div " >
                           </div>
                        <div class="col-md-1">
                                <span id="add" class="fa  btn btn-primary fa-plus add">Add</span>
                        </div>
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
    var field ='<div class="row" id= "appending_div"> <div class="col-md-2"><div class="form-group"><label>Subject Code</label><input type="text" name="subject_code[]" id="subject_code" class="form-control subject_code" value=""></div>  </div>  <div class="col-md-2">  <div class="form-group"> <label>Subject Name</label> <input type="text" name="subject_name[]" id="subject_name" class="form-control subject_code" value=""> </div> </div><div class="col-md-2"><div class="form-group"><label>Year/Sem</label><select name="year_sem[]" id="year_sem" class="form-control subject_code"><option value="">Select Year/Sem</option><?php for($s=1;$s<=12;$s++){?><option value="<?=$s?>"  <?php if($this->input->post('show_subject') != "" && $this->input->post('year_sem') == $s){ ?>selected="selected"<?php }?>><?=$s?></option><?php }?> </select></div></div> <div class="col-md-2"> <div class="form-group"> <label>Internal </label><input type="text" name="internal_mark[]" data-id = "'+i+'" onkeyup="calculate(this)" id="internal_marka'+i+'" class="form-control subject_code"></div> </div><div class="col-md-2"><div class="form-group"><label>External</label><input type="text" name="external_mark[]" data-id = "'+i+'" onkeyup="calculate(this)" id="external_marka'+i+'" class="form-control subject_code"> </div> </div><div class="col-md-2"><div class="form-group"><label>Credit</label><input type="text" name="credit[]" id="credit" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"> <label>Total</label><input type="text" readonly name="total[]" data-id = "'+i+'" id="totala'+i+'" class="form-control"> </div></div> <div class="col-md-2"> <div class="form-group"><label>Total Marks</label><input type="text"  name="total_marks[]" id="total_marks" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"><label>Grade</label><input type="text" name="grade[]" id="grade" class="form-control subject_code"></div></div><div class="col-md-2"><div class="form-group"><span class="fa fa-trash btn btn-primary remove_margin" id="appending_div"   onclick="minus(this)"></span> </div></div></div>';
    $(".appending_div").append(field);
            i++;
    });



function calculate(obj){
    var data_id = $(obj).attr('data-id');
    var id = $(obj).attr('id');
    var internal_marka = $('#internal_marka'+data_id).val(); 
    var external_marka = $('#external_marka'+data_id).val();
    var value = Number(external_marka)+ Number(internal_marka);
    $('#totala'+data_id).val(value);        
}

function calculate_rate(obj){
    internal_mark = $('#internal_mark'+obj).val();
    external_mark = $('#external_mark'+obj).val();			
    var value = Number(external_mark)+ Number(internal_mark);
    $('#total'+obj).val(value);  		
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
		enrollment: {"required":true,minlength:10,maxlength:20},		
			
	},
	messages: {
		student_name: "Please student name!",
		father_name: "Please enter father name!",
		course_name: "Please enter course name",
		stream_name: "Please enter stream name!",
		enrollment: {required:"Please enter enrollment!",minlength:"Enter valid digit enrollment number",maxlength:"Enter valid digit enrollment number"},
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