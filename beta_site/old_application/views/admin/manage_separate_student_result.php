<?php include('header.php');?>
<style>
	
	
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}
</style>

    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Manage Result</h4>
                  <p class="card-description">
                    Please enter result details
                  </p>
                 <form method="post" name="search_form" id="search_form">
				 <div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Examination</label>
							<select name="month" id="month" class="form-control js-example-basic-single select2_single">
								<option value="">Select Month</option>
								<option value="January" <?php if($this->input->post('show_subject') != "" && $this->input->post('month') == "January"){ ?>selected="selected"<?php }?>>January</option>
								<option value="July" <?php if($this->input->post('show_subject') != "" && $this->input->post('month') == "July"){ ?>selected="selected"<?php }?>>July</option>
								<option value="August" <?php if($this->input->post('show_subject') != "" && $this->input->post('month') == "August"){ ?>selected="selected"<?php }?>>August</option>
								<option value="April" <?php if($this->input->post('show_subject') != "" && $this->input->post('month') == "April"){ ?>selected="selected"<?php }?>>April</option>
							
							</select>
							<label style="display:none;" for="month" generated="true" class="error">Please select month!</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Year</label>
							<select name="year" id="year" class="form-control js-example-basic-single select2_single">
								<option value="">Select Year</option>
								<!-- <option value="2021"  <?php if($this->input->post('show_subject') != "" && $this->input->post('year') == "2021"){ ?>selected="selected"<?php }?>>2021</option>
								<option value="2022"  <?php if($this->input->post('show_subject') != "" && $this->input->post('year') == "2022"){ ?>selected="selected"<?php }?>>2022</option>
								<option value="2023"  <?php if($this->input->post('show_subject') != "" && $this->input->post('year') == "2023"){ ?>selected="selected"<?php }?>>2023</option> -->
								<option value="2024"  <?php if($this->input->post('show_subject') != "" && $this->input->post('year') == "2024"){ ?>selected="selected"<?php }?>>2024</option>

							</select>
							<label style="display:none;" for="year" generated="true" class="error">Please select year!</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Exam Status</label>
							<select name="exam_status" id="exam_status" class="form-control js-example-basic-single select2_single">
								<option value="">Exam Status</option>
								<option value="0"  <?php if($this->input->post('show_subject') != "" && $this->input->post('exam_status') == "0"){ ?>selected="selected"<?php }?>>Main Exam</option>
								<option value="1"  <?php if($this->input->post('show_subject') != "" && $this->input->post('exam_status') == "1"){ ?>selected="selected"<?php }?>>Re-Exam</option>
							</select>
							<label style="display:none;" for="exam_status" generated="true" class="error">Please select exam-status!</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Year/Sem</label>
							<select name="year_sem" id="year_sem" class="form-control js-example-basic-single select2_single">
								<option value="">Select Year/Sem</option>
								<?php for($s=1;$s<=12;$s++){?>
								<option value="<?=$s?>"  <?php if($this->input->post('show_subject') != "" && $this->input->post('year_sem') == $s){ ?>selected="selected"<?php }?>><?=$s?></option>
								<?php }?>
							</select>
							<label style="display:none;" for="year_sem" generated="true" class="error">Please select year/sem!</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Enrollment</label>
							<input type="text" name="enrollment" id="enrollment" class="form-control" value="<?php if($this->input->post('show_subject') != ""){ echo $this->input->post('enrollment');}?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<input type="submit" name="show_subject" id="show_subject" class="btn btn-primary btn-sm" value="Show Subject">
						</div>
					</div>
					</div>
				</form>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

				<?php if($this->input->post('show_subject') == "Show Subject"){ ?>
	
			<form method="post" name="add_result_form" id="add_result_form" enctype="multipart/form-data">
			<?php if(!empty($subject)){?>
				<div class="col-md-12 ">
					<h2>
					<?php if(!empty($course_stream)){ echo $course_stream->course_name."-";}?>
					<?php if(!empty($course_stream)){ echo $course_stream->stream_name;}?>
					</h2>
					<br>
				</div>
				 <table class="detailTable" align="center" width="900" cellspacing="5" cellpadding="4">
				   <tr>
                        <td>Total MM</td><td><input type="text" name="txtTMM" id="txtTMM" class="detail_text" maxlength="10" /></td>
                        <td>Total MO</td><td><input type="text" name="txtTMO" id="txtTMO" class="detail_text" maxlength="10" /></td>
                        <td>Percent</td><td><input type="text" name="txtPercent" id="txtPercent" class="detail_text" maxlength="10" /></td>
                    </tr>
                </table>
				<div class="col-md-12" style="margin-top:10px;"></div>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th><input type="checkbox" value="0" name="chAll" id="chAll" onclick="checkAll();"/>Subject Code</th>
							<th>Subject Name</th>
							<th>Study Type</th>
							<th>Int. Max Marks</th>
							<th>Int. Marks Obt.</th>
							<th>Ext. Max Marks</th>
							<th>Ext. Marks Obt.</th>
							<th>Result</th>
						</tr>
					</thead>
					<tbody>
					<?php	
					if(!empty($subject)){
						$i = 1;
						foreach($subject as $result_arr){ 
							if($result_arr->subject_type ==0){
								$studyType="Theory";
							}else{
								$studyType="Practical";
							}
							
						?>
							<tr>
								  <td>
									<input type="checkbox" value="<?=$i?>" name="txtChoice<?=$i?>" id="txtChoice<?=$i?>" onclick="addMarks();">
									
									<?=$result_arr->subject_code?>
								  
								  </td>
                                  <td><?=$result_arr->subject_name?></td>
                                  <td><?=$studyType?>
                                  <input type="hidden" value="<?=$result_arr->id?>" name="txtSubjectId<?=$i?>" id="txtSubjectId<?=$i?>"/>
                                  </td>
                                  <td align="center"><input type="number" value="<?=$result_arr->internal_marks?>" name="txtIMM<?=$i?>" id="txtIMM<?=$i?>" class="detail_text_right2"  <?php if(!in_array($this->session->userdata("admin_id"),array(1,15))){echo "readonly";}?>/></td>

                                  <td align="center"><input type="number" name="txtIMO<?=$i?>" id="txtIMO<?=$i?>" onkeyup="addMarks();" class="detail_text_right2 max_number" maxlength="3" onkeypress="disableNonNumeric(event)"/>
								  <div id="manage_error<?=$i?>" style="color:red"></div></td>
									
                                  <td align="center"><input type="number" value="<?=$result_arr->external_mark?>" name="txtEMM<?=$i?>" id="txtEMM<?=$i?>" class="detail_text_right2"  <?php if(!in_array($this->session->userdata("admin_id"),array(1,15))){echo "readonly";}?>/></td>

                                  <td align="center"><input type=number name="txtEMO<?=$i?>" id="txtEMO<?=$i?>" onkeyup="addMarks();" class="detail_text_right2 max_number" maxlength="3" onkeypress="disableNonNumeric(event)"/> 
								  <div id="manage_error_ext<?=$i?>" style="color:red"></div></td>
								 
								
                                  <td align="center">
									<select name="comboResult<?=$i?>" id="comboResult<?=$i?>" class="detail_combo_status">
										<option value="1">Fail</option>
										  <option value="2">Absent</option>                              
										  <option value="0" selected>Pass</option>
									</select>
                                  </td>
                        	</tr>
					<?php 
						$i++;}
					}?>
					<tr class="result4">
						 <td colspan="3" align="right"><b>TOTAL MARKS</b></td>
						 <td align="center"><input type="text"  value="0" name="txtTIMM" id="txtTIMM" class="detail_text_right2" readonly="readonly"/></td>
						 <td align="center"><input type="text" value="0" name="txtTIMO" id="txtTIMO" class="detail_text_right2"  readonly="readonly"/></td>
						 <td align="center"><input type="text" value="0" name="txtTEMM" id="txtTEMM" class="detail_text_right2" readonly="readonly"/></td>
						 <td align="center"><input type="text" value="0" name="txtTEMO" id="txtTEMO" class="detail_text_right2" readonly="readonly"/></td>
						 <td align="center">
							<select name="comboTResult" id="comboTResult" class="detail_combo_status">
								 <option value="select">Select</option>
								 <option value="2">Reappear</option>
								 <option value="1">Fail</option>
								 <option value="0" selected>Pass</option>
								 <option value="3">Absent</option>
							</select>
						 </td>
					</tr>
			</tbody>
		</table>
				 <input type="hidden" value="<?php if($this->input->post('month') !=""){ echo $this->input->post('month');}?>" name="txtMonth" id="txtMonth"/>
				<input type="hidden" value="<?php if($this->input->post('year') !=""){ echo $this->input->post('year');}?>" name="txtYear" id="txtYear"/>       
				<input type="hidden" value="<?php if(!empty($course_stream)){ echo $course_stream->course_id;}?>" name="txtCourseId" id="txtCourseId"/>
				<input type="hidden" value="<?php if(!empty($course_stream)){ echo $course_stream->stream_id;}?>" name="txtStreamId" id="txtStreamId" />
				<input type="hidden" value="<?php if($this->input->post('year_sem') !=""){ echo $this->input->post('year_sem');}?>" name="txtYS" id="txtYS" />
				<input type="hidden" value="<?php if($this->input->post('exam_status') !=""){ echo $this->input->post('exam_status');}?>" name="txtExamStatus" id="txtExamStatus"/>
				<input type="hidden" value="<?php if($this->input->post('enrollment') !=""){ echo $this->input->post('enrollment');}?>" name="txtEnNo" id="txtEnNo"/>
				<input type="hidden" value="<?php if(!empty($course_stream)){ echo $course_stream->id;}?>" name="student_id" id="student_id"/>
				<input type="hidden" value="<?=$i-1?>" name='txtSubjectCount' id='txtSubjectCount' />
				

				<div class="col-md-2 col-md-offset-4 add-manage-result">
					<div class="form-group">
						<!-- <input class="btn btn-primary btn-sm" type="submit" name="add_result" id="add_result" value="Add Result" <?php if($exam_form_disabled) echo "disabled"; ?>> -->
						<input class="btn btn-primary btn-sm" type="submit" name="add_result" id="add_result" value="Add Result">

					</div>
				</div>
				<div class="col-md-2 col-md-offset-4">
					<div class="form-group">
						<label>Auto Set Percentage</label>
						<select name="comboPercent" id="comboPercent" class="form-control" onchange="fillMarks();">
							<option value="0">Select</option>
							<option value="65">65</option>    
							<option value="66">66</option>
							<option value="67">67</option>    
							<option value="68">68</option>
							<option value="69">69</option>    
							<option value="70">70</option>
							<?php if($this->session->userdata('admin_id') != "15"){?>
							<option value="71">71</option>    
							<option value="72">72</option>
							<option value="73">73</option>   
							<option value="74">74</option>
							<option value="75">75</option>     
							<option value="76">76</option>
							<option value="77">77</option>  
							<option value="78">78</option>
							<option value="79">79</option>    
							<option value="80">80</option> 
							<option value="81">81</option>
							<option value="82">82</option>
							<option value="83">83</option>
							<option value="85">85</option>
							<?php }?>
						</select>
					</div>
				</div>
			
		<?php }else{
			if($this->input->post('show_subject') == "Show Subject"){
				echo "<span class=error>No Subject added for this semester/Year</span>";
			}
			?>
		<?php }?>
            </form> 
					
		
			<?php } ?>
			
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
<?php if($this->session->userdata('admin_id') == "15"){?>
$('.max_number').keyup(function(){
  if ($(this).val() > 70){
    alert("No numbers above 70");
    $(this).val('0');
  }
});   
<?php }?>
// function imarkschange(num){
// 	// alert("hello")
// 	var imarks = $('#txtIMM'+num).val();
// 	console.log(imarks);
// 	$("#txtEMM"+num).val(100-parseInt(imarks));
// 	// addMarks();
// }

// function emarkschange(num){
// 	var emarks = $('#txtEMM'+num).val();
// 	console.log(emarks);
// 	$("#txtIMM"+num).val(100-parseInt(emarks));
// 	// addMarks();
// }

function fillMarks(){
	
	var i=1;
	var percent=parseInt(document.getElementById("comboPercent").value);
	var percent1=(percent-8)/100;
	var j=parseInt(document.getElementById("txtSubjectCount").value);
	var totalIntMM=0,totalExtMM=0,totalIntMO=0,totalExtMO=0;
	var subjectId=0;
					
	for (i=1;i<=j;i++){
		if(document.getElementById("txtChoice" + i))
			if(document.getElementById("txtChoice" + i).checked==true)  {
				subjectId=document.getElementById("txtSubjectId" + i).value;
				
				var maximum=Math.floor(parseInt(document.getElementById("txtIMM" + i).value)*percent/100);
				var minimum=Math.floor(parseInt(document.getElementById("txtIMM" + i).value)*percent1);
				var maximum1=Math.floor(parseInt(document.getElementById("txtEMM" + i).value)*percent/100);
				var minimum1=Math.floor(parseInt(document.getElementById("txtEMM" + i).value)*percent1);
				
				document.getElementById("txtIMO" + i).value = Math.floor(Math.random() * (maximum - minimum + 1)) + minimum;
				document.getElementById("txtEMO" + i).value = Math.floor(Math.random() * (maximum1 - minimum1 + 1)) + minimum1;
			}
			else{
				document.getElementById("txtIMO" + i).value="";
				document.getElementById("txtEMO" + i).value="";
			}
	}
	addMarks();
}
function checkAll(){
   
	var i=1;
	var j=parseInt(document.getElementById("txtSubjectCount").value);
	if(document.getElementById("chAll").checked==true){
		for (i=1;i<=j;i++)
			if(document.getElementById("txtChoice" + i))
				document.getElementById("txtChoice" + i).checked=true;
	}
	else{
		for (i=1;i<=j;i++)
			if(document.getElementById("txtChoice" + i))
				document.getElementById("txtChoice" + i).checked=false;
	}
							   
}
function addMarks(){
	console.log("addmarks");
	var i=1;
	var j=parseInt(document.getElementById("txtSubjectCount").value);
	var totalIntMM=0,totalExtMM=0,totalIntMO=0,totalExtMO=0;
	var subjectId=0;
	for (i=1;i<=j;i++){
		if(document.getElementById("txtChoice" + i))
			if(document.getElementById("txtChoice" + i).checked==true)  {
if(parseInt(document.getElementById("txtIMM" + i).value) < parseInt(document.getElementById("txtIMO" + i).value)){
if(parseInt(document.getElementById("txtEMM" + i).value) < parseInt(document.getElementById("txtEMO" + i).value)){
	document.getElementById("txtEMO" + i).value=0;
	
}else{
}
document.getElementById("txtIMO" + i).value=0;
     
}else{

	if(parseInt(document.getElementById("txtEMM" + i).value) < parseInt(document.getElementById("txtEMO" + i).value)){
		document.getElementById("txtEMO" + i).value=0;

}else{

				subjectId=document.getElementById("txtSubjectId" + i).value;
						
				if(subjectId==6736 || subjectId==6735 || subjectId==6734){
					if(document.getElementById("txtIMM" + i).value.length==0)
						document.getElementById("txtIMM" + i).value=0;
					
					if(document.getElementById("txtEMM" + i).value.length==0)
						document.getElementById("txtEMM" + i).value=0;
						
					if(document.getElementById("txtIMO" + i).value.length==0)
						document.getElementById("txtIMO" + i).value=0;
					
					if(document.getElementById("txtEMO" + i).value.length==0)
						document.getElementById("txtEMO" + i).value=0;
					
					
				}
				else{
					if(document.getElementById("txtIMM" + i).value.length==0)
						document.getElementById("txtIMM" + i).value=0;
					else
						totalIntMM+=parseInt(document.getElementById("txtIMM" + i).value);
					
					if(document.getElementById("txtEMM" + i).value.length==0)
						document.getElementById("txtEMM" + i).value=0;
					else
						totalExtMM+=parseInt(document.getElementById("txtEMM" + i).value);
						
					if(document.getElementById("txtIMO" + i).value.length==0)
						document.getElementById("txtIMO" + i).value=0;
					else
						totalIntMO+=parseInt(document.getElementById("txtIMO" + i).value);
					
					if(document.getElementById("txtEMO" + i).value.length==0)
						document.getElementById("txtEMO" + i).value=0;
					else
						totalExtMO+=parseInt(document.getElementById("txtEMO" + i).value);
				}
			}
			}
			}
			else{
				document.getElementById("txtIMO" + i).value="";
				document.getElementById("txtEMO" + i).value="";
			}
	}
	if(document.getElementById("txtTIMM")){
		document.getElementById("txtTIMM").value=totalIntMM;
		document.getElementById("txtTEMM").value=totalExtMM;
		document.getElementById("txtTMM").value=totalIntMM + totalExtMM;
	}
	if(document.getElementById("txtTIMO")){
		document.getElementById("txtTIMO").value=totalIntMO;
		document.getElementById("txtTEMO").value=totalExtMO;
		document.getElementById("txtTMO").value=totalIntMO + totalExtMO;
	}
	document.getElementById("txtPercent").value=(totalIntMO + totalExtMO)*100/(totalIntMM + totalExtMM);
}
function checkMarks(){
	var i=1;
	var j=parseInt(document.getElementById("txtSubjectCount").value);
	var retVal=true;                
	for (i=1;i<=j;i++){
		if(document.getElementById("txtChoice" + i))
			if(document.getElementById("txtChoice" + i).checked==true)  {
				
				if(parseInt(document.getElementById("txtIMM" + i).value)<parseInt(document.getElementById("txtIMO" + i).value))
					retVal=false;
				
				if(parseInt(document.getElementById("txtEMM" + i).value)<parseInt(document.getElementById("txtEMO" + i).value))
					retVal=false;
			}                        
	}
	return retVal;
}
function marksValidation(){
	if (checkMarks()==false){
			alert("Please check marks entry.");
			return false;
	}
	addMarks();
	document.getElementById("mDiv").style.display="none";
	document.getElementById("aDiv").style.display="";
	return true;
}
function fillMarks(){
	var i=1;
	var percent=parseInt(document.getElementById("comboPercent").value);
	var percent1=(percent-8)/100;
	var j=parseInt(document.getElementById("txtSubjectCount").value);
	var totalIntMM=0,totalExtMM=0,totalIntMO=0,totalExtMO=0;
	var subjectId=0;
					
	for (i=1;i<=j;i++){
		if(document.getElementById("txtChoice" + i))
			if(document.getElementById("txtChoice" + i).checked==true)  {
				subjectId=document.getElementById("txtSubjectId" + i).value;
				
				var maximum=Math.floor(parseInt(document.getElementById("txtIMM" + i).value)*percent/100);
				var minimum=Math.floor(parseInt(document.getElementById("txtIMM" + i).value)*percent1);
				var maximum1=Math.floor(parseInt(document.getElementById("txtEMM" + i).value)*percent/100);
				var minimum1=Math.floor(parseInt(document.getElementById("txtEMM" + i).value)*percent1);
				
				document.getElementById("txtIMO" + i).value=Math.floor(Math.random() * (maximum - minimum + 1)) + minimum;
				document.getElementById("txtEMO" + i).value=Math.floor(Math.random() * (maximum1 - minimum1 + 1)) + minimum1;
			}
			else{
				document.getElementById("txtIMO" + i).value="";
				document.getElementById("txtEMO" + i).value="";
			}
	}
	addMarks();
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
	ignore: ":hidden:not(select)",
	rules: {
		month: "required",			
		year: "required",			
		exam_status: "required",			
		year_sem: "required",			
		enrollment: {"required":true,minlength:10,maxlength:20},		
			
	},
	messages: {
		month: "Please select month",
		year: "Please select year",
		exam_status: "Please select exam-status",
		year_sem: "Please select year/sem",
		enrollment: {required:"Please enter enrollment",minlength:"Enter valid digit enrollment number",maxlength:"Enter valid digit enrollment number"},
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});


$('#month').on('change', function() {
    $('#month').valid();
});
$('#year').on('change', function() {
    $('#year').valid();
});
$('#exam_status').on('change', function() {
    $('#exam_status').valid();
});
$('#year_sem').on('change', function() {
    $('#year_sem').valid();
});


</script>     