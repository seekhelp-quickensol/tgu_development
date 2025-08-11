<?php include_once('header.php');?>
 <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                <form method="post" name="AddForm" id="AddForm" enctype="multipart/form-data">
                    <div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputUsername1">Enrollment No *</label>
								<input type="text" class="form-control" value="<?php if(!empty($single)){ echo $single->enrollment_number;}?>" name="enrollment_number" id="enrollment_number" placeholder="Enrollment number">
								<input type="hidden" class="form-control" value="<?php if(!empty($single)){ echo $single->registration_id;}?>" name="student_id" id="student_id" >
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputUsername1">Attending Status *</label>
								<select name="attending_status" id="attending_status" class="form-control">
									<option value="">Select status</option>
									<option value="No" <?php if(!empty($single) && $single->thesis_status == "No"){?>selected="selected"<?php }?>>No</option>
									<option value="Yes" <?php if(!empty($single) && $single->thesis_status == "Yes"){?>selected="selected"<?php }?>>Yes</option>
									<option value="Exempted" <?php if(!empty($single) && $single->thesis_status == "Exempted"){?>selected="selected"<?php }?>>Exempted</option>                                
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Subject *</label>
								<input type="readonly" name="stream_name" id="stream_name" value="<?php if(!empty($single)){ echo $single->stream_name;}?>" class="form-control"> 
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Issue Date *</label>
								<!-- <input type="text" name="issue_date" id="issue_date" class="form-control datepicker" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->issue_date));}?>"> -->
								<input type="text" name="issue_date" id="issue_date" class="form-control datepicker" value="<?php echo (!empty($single) && property_exists($single, 'issue_date')) ? date("d-m-Y", strtotime($single->issue_date)) : ''; ?>">
    						</div>

							
						</div>
					</div>


					<div class="row">

						<div class="col-md-3">
							<div class="form-group">
							<label for="exampleInputPassword1">Issuance Status *</label>
							<select name="issue_status" id="issue_status" class="form-control">
									<option value="">Select</option>
									<option value="0"<?php if(!empty($single) && $single->thesis_status == "0"){?>selected="selected"<?php }?>>No</option>
									<option value="1"<?php if(!empty($single) && $single->thesis_status == "1"){?>selected="selected"<?php }?>>Yes</option>                                
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Marksheet Type</label>
								<select autocomplete="off" name="course_work_type" id="course_work_type" class="form-control">
									<option value="">Select</option>
									<option value="0" <?php if(!empty($single) && $single->course_work_type == "0"){ ?>selected="selected"<?php }?>>Ofline</option>
									<option value="1" <?php if(!empty($single) && $single->course_work_type == "1"){ ?>selected="selected"<?php }?>>Online</option>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputConfirmPassword1">Upload Review Report(pdf) </label>
								<input type="file" name="userfile" class="form-control" id="userfile">
								<!-- <input type="hidden" name="review_report" id="review_report"  value="<?php if(!empty($single)){ echo $single->review_report; } ?>"> -->
								<input type="hidden" name="review_report" id="review_report"  value="<?php if(!empty($single) && property_exists($single, 'review_report')) { echo $single->review_report; } ?>">
							</div>
						</div>
						<!-- </div> -->
				<div class="col-md-12">	
					<table class="resultTable" align="center"  cellspacing="5" cellpadding="3" border="1" style="width: 100%;">
						<!--<tr>
							<td colspan="2">&nbsp;</td>
							<td class="heading" colspan="2" align="center">Internal Marks</td>
							<td class="heading" colspan="2" align="center">External Marks</td>
						</tr>-->
						<tr>
							<td class="heading">Subject Code</td>
							<td class="heading">Subject Name</td>
							<td class="heading">Marks</td> 
							<td class="heading">Obtained</td>  
						</tr>
						<tr>
							<td class="data">PHD-001
								<input type="hidden" name='subject_code1' id='subject_code1' value="PHD-001"/>
							</td>
							<td class="data">RESEARCH METHODOLOGY
								<input type="hidden" name='subject_name1' id='subject_name1' value="RESEARCH METHODOLOGY"/>
							</td>  
							<td class="data" align="center">100 
								<input type="hidden" name='ext_max_mark1' id='ext_max_mark1' value="100"/>
							</td>
							<td align="center"><input type="text" name='txtEMO1' id='txtEMO1' onblur='addMarks();' class="detail_text_right2" maxlength="2" onkeypress='disableNonNumeric(event)' /></td>
							</td>
						</tr>
						<tr>
							<td class="data">PHD-002</td>
							    <input type="hidden" name='subject_code2' id='subject_code2' value="PHD-002"/>
							<td class="data">
								<input type="text" name='subject_name2' id='subject_name2' class="form-control" value="" required/>
							</td> 
							<td class="data" align="center">100
								<input type="hidden" name='ext_max_mark2' id='ext_max_mark2' value="100"/>
							</td> 
							<td align="center">
								<input type="text" name='txtEMO2' id='txtEMO2' onblur='addMarks();' class="detail_text_right2" maxlength="2" onkeypress='disableNonNumeric(event)' />
							</td>
							</td>
						</tr>
						<tr>
							<td class="data">PHD-003
								<input type="hidden" name='subject_code3' id='subject_code3' value="PHD-003"/>
							</td>
							<td class="data">REVIEW OF LITERATURE FOR Ph.D. TOPIC & SEMINAR
								<input type="hidden" name='subject_name3' id='subject_name3' value="REVIEW OF LITERATURE FOR Ph.D. TOPIC & SEMINAR"/>
							</td> 
							<td class="data" align="center">100
								<input type="hidden" name='ext_max_mark3' id='ext_max_mark3' value="100"/>
							</td>
							<td align="center">
								<input type="text" name='txtEMO3' id='txtEMO3' onblur='addMarks();' class="detail_text_right2" maxlength="2" onkeypress='disableNonNumeric(event)' />
							</td>
							</td>
						</tr>
						
						<tr class="result1">
							<td class="data" colspan="2" align="right">TOTAL MARKS
								<input type="hidden" name='total_marks' id='total_marks' value="TOTAL MARKS"/>
							</td>  
							<td class="data" align="center">300
								<input type="hidden" name='total_ext_max_marks' id='total_ext_max_marks' value="300"/>
							</td> 
							</td>
							<td align="center"><input type="text" name='txtTEMO' id='txtTEMO' class="detail_text_right2" readonly="readonly" /></td>
							</td>
						</tr>
						<!-- <tr><td>&nbsp;</td></tr> -->
						<tr><td align="center" colspan="8"><input type="submit" name="buttSave" value="Add Certificate" class="btn btn-primary btn-sm" />
							&nbsp;<input type="button" name="buttSave" value="Cancel" onclick="hideDiv('addnewdiv');" class="btn btn-danger btn-sm" /></td></tr>
						<tr>
							<!-- <td><input type="hidden" name="txtAction" id="txtAction" value="Add" /></td> -->
						</tr>
					</table>
				</div>
				
			</form>
			<div class="col-md-12"><hr></div>
			
		</div>
	</div>
<?php include_once('footer.php');?>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
		"order": [],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                 columns: ':contains("Office")'
                }
            },
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );	
} );

$(function(){
	$( ".datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
} );
</script>
<script type="text/javascript">
function addMarks(){
	if(document.AddForm.attending_status.selectedIndex==2){
		if (document.AddForm.txtEMO1.value.length==0)
			document.AddForm.txtEMO1.value=0;
		if (document.AddForm.txtEMO2.value.length==0)
			document.AddForm.txtEMO2.value=0;
		if (document.AddForm.txtEMO3.value.length==0)
			document.AddForm.txtEMO3.value=0;
		 emo1=parseInt(document.AddForm.txtEMO1.value);
		 emo2=parseInt(document.AddForm.txtEMO2.value);
		 emo3=parseInt(document.AddForm.txtEMO3.value);
		 totalIMO=0;
		 totalEMO=emo1+emo2+emo3;
		// document.AddForm.txtTIMO.value=totalIMO;
		 document.AddForm.txtTEMO.value=totalEMO;
	}
	else{
	 
		document.AddForm.txtEMO1.value=0;
		document.AddForm.txtIMO2.value=0;
	 	document.AddForm.txtIMO3.value=0; 
		//document.AddForm.txtTIMO.value=0;
		document.AddForm.txtTEMO.value=0;
	}
}
$("#AddForm").validate({
	rules: {
		enrollment_number	: {required:true,minlength:10,maxlength:15},
		attending_status	: "required",
		subject				: "required",
		issue_status		: "required",
		issue_date			: "required",
		course_work_type	: "required",
		
	},
	messages: {
		enrollment_number	: {
			required:"Please enter enrollment number!",
			minlength:"Please enter correct enrollment number!",
			maxlength:"Please enter correct enrollment number!",
		},
		attending_status	: "Please select attending status",
		subject				: "Please select subject",
		issue_status		: "Please select Issuance status",
		issue_date			: "Please select issue date",
		course_work_type	: "Please select course work type",
		
	},
	submitHandler: function(form) {
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
function disableNonNumeric(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
  