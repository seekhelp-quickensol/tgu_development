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
                       <input type="text" name="issue_date" id="issue_date" class="form-control datepicker" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->issue_date));}?>">
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
                      <label for="exampleInputConfirmPassword1">Upload Review Report(pdf) </label>
                       <input type="file" name="userfile" class="form-control" id="userfile">
                        <input type="hidden" name="review_report" id="review_report"  value="<?php if(!empty($single)){ echo $single->review_report; } ?>">
                    </div>
					</div>
				<div class="col-md-12">	
					<table class="resultTable" align="center"  cellspacing="5" cellpadding="3" border="1">
						<tr>
							<td colspan="2">&nbsp;</td>
							<td class="heading" colspan="3" align="center">Internal Marks</td>
							<td class="heading" colspan="3" align="center">External Marks</td>
						</tr>
						<tr>
							<td class="heading">Subject Code</td>
							<td class="heading">Subject Name</td>
							<td class="heading">Maximum</td>
							<td class="heading">Minimum</td>
							<td class="heading">Obtained</td>
							<td class="heading">Maximum</td>
							<td class="heading">Minimum</td>
							<td class="heading">Obtained</td>
						</tr>
						<tr>
							<td class="data">BOR-P01
								<input type="hidden" name='subject_code1' id='subject_code1' value="BOR-P01"/>
							</td>
							<td class="data">RESEARCH METHODOLOGY
								<input type="hidden" name='subject_name1' id='subject_name1' value="RESEARCH METHODOLOGY"/>
							</td>
							<td class="data" align="center">40
								<input type="hidden" name='int_max_mark1' id='int_max_mark1' value="40"/>
							</td>
							<td class="data" align="center">20
								<input type="hidden" name='int_min_mark1' id='int_min_mark1' value="20"/>
							</td>
							<td align="center">
								<input type="text" name='txtIMO1' id='txtIMO1' onblur='addMarks();' class="detail_text_right2" maxlength="2" onkeypress='disableNonNumeric(event)' />
							</td>
							<td class="data" align="center">60
								<input type="hidden" name='ext_max_mark1' id='ext_max_mark1' value="60"/>
							</td>
							<td class="data" align="center">30
								<input type="hidden" name='ext_min_mark1' id='ext_min_mark1' value="30"/>
							</td>
							<td align="center"><input type="text" name='txtEMO1' id='txtEMO1' onblur='addMarks();' class="detail_text_right2" maxlength="2" onkeypress='disableNonNumeric(event)' /></td>
							</td>
						</tr>
						<tr>
							<td class="data">BOR-P02</td>
							    <input type="hidden" name='subject_code2' id='subject_code2' value="BOR-P02"/>
							<td class="data">BASIC COMPUTER AND SCIENTIFIC COMMUNICATION
								<input type="hidden" name='subject_name2' id='subject_name2' value="BASIC COMPUTER AND SCIENTIFIC COMMUNICATION"/>
							</td>
							<td class="data" align="center">40
								<input type="hidden" name='int_max_mark2' id='int_max_mark2' value="40"/>
							</td>
							<td class="data" align="center">20
								<input type="hidden" name='int_min_mark2' id='int_min_mark2' value="20"/>
							</td>
							<td align="center">
								<input type="text" name='txtIMO2' id='txtIMO2' onblur='addMarks();' class="detail_text_right2" maxlength="2" onkeypress='disableNonNumeric(event)' />
							</td>
							<td class="data" align="center">60
								<input type="hidden" name='ext_max_mark2' id='ext_max_mark2' value="60"/>
							</td>
							<td class="data" align="center">30
								<input type="hidden" name='ext_min_mark2' id='ext_min_mark2' value="30"/>
							</td>
							<td align="center">
								<input type="text" name='txtEMO2' id='txtEMO2' onblur='addMarks();' class="detail_text_right2" maxlength="2" onkeypress='disableNonNumeric(event)' />
							</td>
							</td>
						</tr>
						<tr>
							<td class="data">BOR-P03
								<input type="hidden" name='subject_code3' id='subject_code3' value="BOR-P03"/>
							</td>
							<td class="data">PRINCIPAL OF MANAGEMENT AND SOCIAL ETHICS
								<input type="hidden" name='subject_name3' id='subject_name3' value="PRINCIPAL OF MANAGEMENT AND SOCIAL ETHICS"/>
							</td>
							<td class="data" align="center">40
								<input type="hidden" name='int_max_mark3' id='int_max_mark3' value="40"/>
							</td>
							<td class="data" align="center">20
								<input type="hidden" name='int_min_mark3' id='int_min_mark3' value="20"/>
							</td>
							<td align="center">
								<input type="text" name='txtIMO3' id='txtIMO3' onblur='addMarks();' class="detail_text_right2" maxlength="2" onkeypress='disableNonNumeric(event)' />
							</td>
							<td class="data" align="center">60
								<input type="hidden" name='ext_max_mark3' id='ext_max_mark3' value="60"/>
							</td>
							<td class="data" align="center">30
								<input type="hidden" name='ext_min_mark3' id='ext_min_mark3' value="30"/>
							</td>
							<td align="center">
								<input type="text" name='txtEMO3' id='txtEMO3' onblur='addMarks();' class="detail_text_right2" maxlength="2" onkeypress='disableNonNumeric(event)' />
							</td>
							</td>
						</tr>
						<tr>
							<td class="data">BOR-P04
								<input type="hidden" name='subject_code4' id='subject_code4' value="BOR-P04"/>
							</td>
							<td class="data">REVIEW WRITING AND PRESENTATION/SEMINAR
								<input type="hidden" name='subject_name4' id='subject_name4' value="REVIEW WRITING AND PRESENTATION/SEMINARS"/>
							</td>
							<td class="data" align="center">50
								<input type="hidden" name='int_max_mark4' id='int_max_mark4' value="50"/>
							</td>
							<td class="data" align="center">25
								<input type="hidden" name='int_min_mark4' id='int_min_mark4' value="25"/>
							</td>
							<td align="center">
								<input type="text" name='txtIMO4' id='txtIMO4' onblur='addMarks();' class="detail_text_right2" maxlength="2" onkeypress='disableNonNumeric(event)' />
							</td>
							<td class="data" align="center">50
								<input type="hidden" name='ext_max_mark4' id='ext_max_mark4' value="50"/>
							</td>
							<td class="data" align="center">25
								<input type="hidden" name='ext_min_mark4' id='ext_min_mark4' value="25"/>
							</td>
							<td align="center"><input type="text" name='txtEMO4' id='txtEMO4' onblur='addMarks();' class="detail_text_right2" maxlength="2" onkeypress='disableNonNumeric(event)' /></td>
							</td>
						</tr>
						<tr class="result1">
							<td class="data" colspan="2" align="right">TOTAL MARKS
								<input type="hidden" name='total_marks' id='total_marks' value="TOTAL MARKS"/>
							</td>
							<td class="data" align="center">170
								<input type="hidden" name='total_int_max_marks' id='total_int_max_marks' value="170"/>
							</td><td class="data" align="center">85
								<input type="hidden" name='total_int_min_marks' id='total_int_min_marks' value="170"/>
							</td>
							<td align="center">
								<input type="text" name='txtTIMO' id='txtTIMO' class="detail_text_right2" readonly="readonly" />
							</td>
							<td class="data" align="center">230
								<input type="hidden" name='total_ext_max_marks' id='total_ext_max_marks' value="230"/>
							</td>
							<td class="data" align="center">115
								<input type="hidden" name='total_ext_min_marks' id='total_ext_max_marks' value="115"/>
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
		if (document.AddForm.txtIMO1.value.length==0)
			document.AddForm.txtIMO1.value=0;
		if (document.AddForm.txtEMO1.value.length==0)
			document.AddForm.txtEMO1.value=0;
		if (document.AddForm.txtIMO2.value.length==0)
			document.AddForm.txtIMO2.value=0;
		if (document.AddForm.txtEMO2.value.length==0)
			document.AddForm.txtEMO2.value=0;
		if (document.AddForm.txtIMO3.value.length==0)
			document.AddForm.txtIMO3.value=0;
		if (document.AddForm.txtEMO3.value.length==0)
			document.AddForm.txtEMO3.value=0;
		if (document.AddForm.txtIMO4.value.length==0)
			document.AddForm.txtIMO4.value=0;
		if (document.AddForm.txtEMO4.value.length==0)
			document.AddForm.txtEMO4.value=0;
		 imo1=parseInt(document.AddForm.txtIMO1.value);    
		 emo1=parseInt(document.AddForm.txtEMO1.value);
		 imo2=parseInt(document.AddForm.txtIMO2.value);    
		 emo2=parseInt(document.AddForm.txtEMO2.value);
		 imo3=parseInt(document.AddForm.txtIMO3.value);    
		 emo3=parseInt(document.AddForm.txtEMO3.value);
		 imo4=parseInt(document.AddForm.txtIMO4.value);    
		 emo4=parseInt(document.AddForm.txtEMO4.value);
		 totalIMO=imo1+imo2+imo3+imo4;
		 totalEMO=emo1+emo2+emo3+emo4;
		 document.AddForm.txtTIMO.value=totalIMO;
		 document.AddForm.txtTEMO.value=totalEMO;
	}
	else{
	
		document.AddForm.txtIMO1.value=0;
		document.AddForm.txtEMO1.value=0;
		document.AddForm.txtIMO2.value=0;
		document.AddForm.txtEMO2.value=0;
		document.AddForm.txtIMO3.value=0;
		document.AddForm.txtEMO3.value=0;
		document.AddForm.txtIMO4.value=0;
		document.AddForm.txtEMO4.value=0;
		document.AddForm.txtTIMO.value=0;
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
  