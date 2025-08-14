<?php include('header.php');?>

<style>
	.error{
		color:red;
	}
	.download-btn-ex{
		height: 48px;
		line-height: 25px;
	}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Subject Setting <a href="<?=base_url();?>list_subject" class="btn btn-primary mr-2 float-right">View List</a></h4><p class="card-description">
                    Please enter Subject details
                  </p>
                  <form class="forms-sample" name="relation_form" id="relation_form" method="post" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Course Name *</label>
							  <select class="form-control js-example-basic-single exist_fees course_list course_relation" id="course" name="course">
								<option value="">Select Course</option>
								<?php if(!empty($course)){ foreach($course as $course_result){
										if($course_result->course_type == "1"){
											$type = "Pulp";
										}else{
											$type = "Regular";
										}
								?>
								<option value="<?=$course_result->course?>"><?=$course_result->course_name .'('.$type.')'?></option>
								<?php }}?>
							  </select>
							  <div class="error" id="relation_error"></div>
							</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
						  <label for="exampleInputUsername1">Stream Name *</label>
						  <select class="form-control js-example-basic-single exist_fees course_list course_relation" id="stream" name="stream">
							<option value="">Select Stream</option>
							<?php if(!empty($stream)){ foreach($stream as $stream_result){?>
							<option value="<?=$stream_result->id?>" <?php if(!empty($single) && $single->stream == $stream_result->id){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
							<?php }}?>
						  </select>
						  <div class="error" id="stream_error"></div>

						</div>
					</div>
					</div>
					 <div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Course Mode *</label>
							  <select class="form-control js-example-basic-single course_relation" id="course_mode" name="course_mode">
								<option value="">Select Mode</option>
							  </select>
							  <div class="error" id="course_mode_error"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Year/Sem *</label>
							  <select class="form-control js-example-basic-single course_relation" id="year_sem" name="year_sem">
								<option value="">Select</option>
								<?php for($y=1;$y<=12;$y++){?>
								<option value="<?=$y?>"><?=$y?></option>
								<?php }?>
							  </select>
							  <div class="error" id="year_sem_error"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Add Type *</label>
							  <select class="form-control" id="add_type" name="add_type">
								<option value="">Select</option>
								<option value="1">Excel</option>
								<option value="0">Manual</option>
								 
							  </select>
							</div>
						</div>
					</div>
					
					<div class="excel" style="display:none">
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Upload *</label>
							  <input type="file" class="form-control" id="userfile" name="userfile">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							  <label class="d-block" for="exampleInputUsername1">Format: </label>
							  <a class="btn btn-success download-btn-ex" href="<?=base_url();?>uploads/subject_format.xlsx"><i class="fa fa-download"></i> Click to Download</a>
							</div>
						</div>
						</div>
						 <button type="submit" id="save_btn" name="upload" value="Upload" class="btn btn-primary mr-2">Upload</button>
					</div>
					<!-- <div class="manual" style="display:none">
					 <div class="row">
						<div class="col-md-12">
							 <table class="resultTable">
								<tr><td class="heading">Subject Code</td>
									<td  class="heading">Subject Name</td>
									<td  class="heading">Subject Type</td>
									<td  class="heading">Internal Marks</td>
									<td  class="heading">External Marks</td>
									<td  class="heading">Credits</td>
								</tr>  
								<?php
									for($i=1;$i<11;$i++){
								?>                      
									<tr><td><input type="text" name="txtSubjectCode[]" id="txtSubjectCode<?php echo $i ?>" class="form-control" maxlength="20" value=""/></td>
										<td><input type="text" name="txtSubjectName[]" id="txtSubjectName<?php echo $i ?>" class="form-control" maxlength="254" /></td>
										<td>
											<select name="comboType[]" id="comboType<?php echo $i ?>" class="form-control">
												<option value="0">Theory</option>
												<option value="1">Practical</option>                            
											</select>
										</td>                    
										<td><input type="text" name="txtIMM[]" id="txtIMM<?php echo $i ?>" class="form-control" maxlength="4" onkeypress="return isNumber(event)" /></td>
										<td><input type="text" name="txtEMM[]" id="txtEMM<?php echo $i ?>" class="form-control" maxlength="4" onkeypress="return isNumber(event)"/></td>
										<td><input type="text" name="txtCredit[]" id="txtCredit<?php echo $i ?>" class="form-control" maxlength="2" onkeypress="return isNumber(event)" /></td>
									</tr>
								<?php
									}
								?>
							</table>
						</div>
					</div>
					
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
					</div>     -->


<div class="manual" style="display:none">
    <div class="row">
        <div class="col-md-12">
            <table class="resultTable">
                <tr>
                    <td class="heading">Subject Code</td>
                    <td class="heading">Subject Name</td>
                    <td class="heading">Subject Type</td>
                    <td class="heading">Internal Marks</td>
                    <td class="heading">External Marks</td>
                    <td class="heading">Credits</td>
                </tr>
                <tbody id="subjectTableBody">
                    <?php 
					// for ($i = 1; $i <= 2; $i++) { 
						?>
                        <tr>
                            <td><input type="text" name="txtSubjectCode[]" class="form-control" maxlength="20" value=""/></td>
                            <td><input type="text" name="txtSubjectName[]" class="form-control" maxlength="254" /></td>
                            <td>
                                <select name="comboType[]" class="form-control js-example-basic-single select2_single">
                                    <option value="0">Theory</option>
                                    <option value="1">Practical</option>
                                </select>
                            </td>
                            <td><input type="text" name="txtIMM[]" class="form-control" maxlength="4" onkeypress="return isNumber(event)" /></td>
                            <td><input type="text" name="txtEMM[]" class="form-control" maxlength="4" onkeypress="return isNumber(event)"/></td>
                            <td><input type="text" name="txtCredit[]" class="form-control" maxlength="2" onkeypress="return isNumber(event)" /></td>
                        </tr>
                    <?php
				//  } 
				 ?>
				 
                </tbody>
            </table>
        </div>
    </div>

    <button type="button" id="addMore" class="btn btn-primary mr-2">Add More</button>
    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
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

<script>
    $(document).ready(function () {

        var newRowCounter = 1;

        function addNewRow() {
            var newRow = '<tr>' +
                '<td><input type="text" name="txtSubjectCode[]" class="form-control" maxlength="20" value=""/></td>' +
                '<td><input type="text" name="txtSubjectName[]" class="form-control" maxlength="254" /></td>' +
                '<td>' +
                '<select name="comboType[]" class="form-control">' +
                '<option value="0">Theory</option>' +
                '<option value="1">Practical</option>' +
                '</select>' +
                '</td>' +
                '<td><input type="text" name="txtIMM[]" class="form-control" maxlength="4" onkeypress="return isNumber(event)" /></td>' +
                '<td><input type="text" name="txtEMM[]" class="form-control" maxlength="4" onkeypress="return isNumber(event)"/></td>' +
                '<td><input type="text" name="txtCredit[]" class="form-control" maxlength="2" onkeypress="return isNumber(event)" /></td>' +
                '<td><button type="button" class="btn btn-danger btn-sm removeRow">Remove</button></td>' +
				'</tr>';

            // Append the new row to the table body
            $('#subjectTableBody').append(newRow);

            // Increment the counter
            newRowCounter++;
        }

        // Add event listener for the "Add More" button
        $('#addMore').click(function () {
            addNewRow();
        });

		$(document).on('click', '.removeRow', function () {
            $(this).closest('tr').remove();
        });
    });
</script>

 <script>
 $("#add_type").change(function(){
	 if($(this).val() == "1"){
		 $(".manual").hide();
		 $(".excel").show();
	 }else{
		 $(".excel").hide();
		 $(".manual").show();
	 }
 });
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	

$('#course').on('change', function() {
    $('#course').valid();
});

$('#stream').on('change', function() {
    $('#stream').valid();
});

$('#course_mode').on('change', function() {
    $('#course_mode').valid();
});

$('#year_sem').on('change', function() {
    $('#year_sem').valid();
});

	$('#relation_form').validate({
		ignore: ":hidden:not(select)",
		rules: {
			course: {
				required: true,
			},
			stream: {
				required: true,
			},
			course_mode: {
				required: true,
			},
			year_sem: {
				required: true,
			},
		},
		messages: {
			course: {
				required: "Please select course",
			},
			stream: {
				required: "Please select stream",
			},
			course_mode: {
				required: "Please select course mode",
			},
			year_sem: {
				required: "Please select year/sem",
			},
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
			error.addClass('invalid-feedback');
			element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		},
		submitHandler: function(form) {
			if(checkSubject()==false){
				return false;
			}else{
				form.submit();
			}
		}
	});
});



$(".fees_add").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_course_stream_fees",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'session':$("#session").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "0"){
				$("#relation_error").html("");
				$("#save_btn").show();
			}else{
				$("#relation_error").html("This relation is already added");
				$("#save_btn").hide();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#course").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_ajax",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.id + '@@@' + d.stream + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');	
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$(".exist_fees").change(function(){   
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_course_stream_mode",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#course_mode").empty();
			$("#course_mode").html(data);
			$('#course_mode').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
function checkSubject(){
	var valid=true;
	if($(".manual").is(":visible")){
		if (document.getElementById("txtSubjectCode1").value.length==0 || document.getElementById("txtSubjectName1").value.length==0 || document.getElementById("txtIMM1").value.length==0 || document.getElementById("txtEMM1").value.length==0 || document.getElementById("txtCredit1").value.length==0)
		{
			alert ("Please fill all fields for subject 1");
			valid=false;
		}
	   for(i=2;i<=10;i++){
			if (document.getElementById("txtSubjectCode" + i).value.length!=0 || document.getElementById("txtSubjectName" + i).value.length!=0 || document.getElementById("txtIMM" + i).value.length!=0 || document.getElementById("txtEMM" + i).value.length!=0 || document.getElementById("txtCredit" + i).value.length!=0)
				if (document.getElementById("txtSubjectCode" + i).value.length==0 || document.getElementById("txtSubjectName" + i).value.length==0 || document.getElementById("txtIMM" + i).value.length==0 || document.getElementById("txtEMM" + i).value.length==0 || document.getElementById("txtCredit" + i).value.length==0)
				{
					alert ("Please fill all fields for subject " + i);
					valid=false;
					break;
				}   
		}
	}
	return valid;
}

// $(document).ready(function() {
// 	$(".course_relation").on("change", function() {  
// 		var streamValue = $("#stream").val();
//         var streamParts = streamValue.split('@@@');

//         var course = streamParts[0]; 
//         var stream = streamParts[1];  
// 		if($("#course").val() != '' && stream != '' && $("#course_mode").val() != '' && $("#year_sem").val() != ''){
// 			// alert(course);
// 			// alert(stream);
// 			// alert($("#course_mode").val());
// 			// alert($("#year_sem").val());
// 			$.ajax({
// 				type: "POST",
// 				url: "<?=base_url();?>admin/Ajax_controller/get_unique_course_stream_year_relation",
// 				data:{'course':$("#course").val(),'stream':stream,'course_mode':$("#course_mode").val(),'year_sem':$("#year_sem").val(),'id':'<?=$id?>'},
// 				success: function(data){
// 					console.log(data);
// 					if(data == "0"){
					
// 						$("#relation_error").html('');
// 						$("#course_error").html('');
// 						$("#stream_error").html('');
// 						$("#course_mode_error").html('');
// 						$("#year_sem_error").html('');
// 						$("#save_btn").show();
// 						//$("#submit").attr('disabled',false);
// 					}else{
// 						$("#year_sem_error").html('This relation is already added');
// 						$("#save_btn").hide();
// 					}  
// 				},
// 				error: function(jqXHR, textStatus, errorThrown) {
// 				console.log(textStatus, errorThrown);
// 				}
// 			});	
// 		}
// 	});	 
//     });
</script>
 