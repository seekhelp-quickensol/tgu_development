<?php include('header.php');?><?php // echo "<pre>"; print_r($student);exit;?><style>  </style><div class="main-page second py-5">    <div class="container">        <div class="row">            <div class="layer_data">                <div class="col-md-12">                    <h2 class="mb-3">Teacher Assessment Form</h2>                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">                        <li class="nav-item"></li>                     </ul>                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">							<?php if(!empty($assement) && $assement->assessment_status !="1"){?>															<div class="col-md-12"> 									<div class="row">  										<div class="col-md-12"> 											<div class="form-group">												<?php if($assement->assessment_status == "0"){?>												<p>Your teacher assessment form has been submitted successfully and is currently under review.</p>												<?php }else if($assement->assessment_status == "2"){?>												<p>Your teacher assement form has been appreved</p>												<?php }?>											</div>												</div>											</div>										</div>									<?php }else{?>							<?php if(!empty($assement) && $assement->assessment_status =="1"){?>							<p>Your teacher assement form has been rejected please submit it again</p>							<?php }?>
						<form class="forms-sample" name="exam_form" id="exam_form" method="post" enctype="multipart/form-data">
							<div class="col-md-12">
								<div class="row"> 
									<div class="col-md-3">
										<div class="form-group">
											<label>Student Name <span class="req">*</span></label>
											<input type="text" name="student_name" id="student_name" readonly class="form-control charector" placeholder="Student Full Name" value="<?php if(!empty($student)){ echo $student->student_name;}?>">

											<input type="hidden" name="student_id" id="student_id" class="form-control" value="<?= $student->id; ?>">											<input type="hidden" name="year_sem" id="year_sem" class="form-control" value="<?= $student->year_sem; ?>">
                                        </div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label>Enrollment Number <span class="req">*</span></label>
											<input type="text" name="enroll_number" id="enroll_number" readonly class="form-control charector" placeholder="Enrollment Number" value="<?php if(!empty($student)){ echo $student->enrollment_number;}?>">
										</div>
									</div>

                                    <div class="col-md-3">
										<div class="form-group">
											<label>Course & Stream <span class="req">*</span></label>
                                            <input type="text" name="course_stream" id="course_stream" readonly class="form-control " placeholder="Course & Stream" value="<?php if (!empty($student)) { echo $student->course_name . ' ' . '(' .$student->stream_name .')'; } ?>">
                                            <input type="hidden" name="course" id="course" readonly class="form-control " value="<?php if (!empty($student)) { echo $student->course_id; } ?>">
                                            <input type="hidden" name="stream" id="stream" readonly class="form-control " value="<?php if (!empty($student)) { echo $student->stream_id; } ?>">	                                            <input type="hidden" name="year_sem" id="year_sem" readonly class="form-control" value="<?=$student->year_sem?>">	
                                        </div>
									</div>

                                    
								</div>
							</div> 

							<div class="col-md-12"> 
								<div class="row"> 
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <table class="table table-bordered" id="example">
                                                        <thead>
                                                            <tr>
                                                                <th>SUBJECT(S) NAME</th>
                                                                <th>ASSESSMENT OF KNOWLEDGE <br>(Grade between 1 to 10)</th>
                                                                <th>ASSESSMENT OF APPLICATION OF KNOWLEDGE <br>(Grade between 1 to 10)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = 0;  
                                                        ?>
                                                            
                                                            <tr>
                                                                <input type="hidden" value="<?=$i;?>" name="indices[]">
                                                                <td>
                                                                    <input type="text" name="subject_name_<?=$i;?>[]" id="subject_name_<?=$i;?>" class="form-control" value="">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="assessment_knowledge_<?=$i;?>[]" id="assessment_knowledge_<?=$i;?>" class="form-control" value="">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="assessment_application_<?=$i;?>[]" id="assessment_application_<?=$i;?>" class="form-control" value="">
                                                                </td>                                                             
                                                            </tr>
                                                          
                                                        </tbody>
                                                        <tbody id="add_more_div"></tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="form-group col-lg-12">
                                                            <a id="add_more_button" class="btn btn-primary mr-2" style="margin-top:30px;color:white;" onclick="createAddMoreFields()">Add More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12"> 
								        <div class="row"> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Name of Assessor <span class="req">*</span></label>
                                                    <input type="text" name="assessor_name" id="assessor_name" class="form-control charector" placeholder="Name of Assessor" value="">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
										        <div class="form-group">
                                                    <label>Signature of Assessor <span class="req">*</span></label>
                                                    <input type="file" class="form-control" name="signature" id="signature">
											        <input type="hidden" class="form-control" name="old_signature" id="old_signature" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

									<div class="col-md-12"> 
										<div class="row">
											<div class="col-md-12 edu">
												<div class="form-group">
													<label></label>
													<button type="submit" class="btn btn-primary" name="register" id="register" value="Register">Submit</button>
													<div class="pull-right"></div>
												</div>
											</div>	
										</div>
									</div>	
								</div>
							</div>
						</form>
							<?php }?>
                </div>
              </div>
            </div>
            
          </div>
        </div>        </div>
      
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
</script>
<script>
$("#exam_form").validate({ 
    ignore: ":hidden:not(select)",
	rules: {
		student_name: {
			required: true,
			noHTMLtags: true,
		},
		study_mode: {
			required: true,
			noHTMLtags: true,
		}, 	
        assessor_name:{
            required: true,
			noHTMLtags: true,
        },
        <?php if (!empty($assessor_signature) && $assessor_signature == "") { ?>
            old_signature :{
                required: true,
                noHTMLtags: true,
            },
        <?php }else if(empty($assessor_signature)){ ?>
            old_signature :{
                required: true,
                noHTMLtags: true,
            },
        <?php } ?>
	},
	messages: {
		student_name: {
			required: "Please enter Full name!",
			noHTMLtags: "HTML tags not allowed!",
		},
		study_mode: {
			required: "Please select study mode!",
			noHTMLtags: "HTML tags not allowed!",
		},
        assessor_name:{
            required: "Please enter assessor name!",
			noHTMLtags: "HTML tags not allowed!",
        },
        <?php if (!empty($assessor_signature) && $assessor_signature == "") { ?>
            old_signature :{
                required: "Please select signature!",
                noHTMLtags: "HTML tags not allowed!",
            }, 
        <?php }else if(empty($assessor_signature)){ ?>
            old_signature :{
                required: "Please select signature!",
                noHTMLtags: "HTML tags not allowed!",
            }, 
        <?php } ?>
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});

$('#study_mode').change(function () {
    $('#study_mode').valid();
});


function deleteRow(id) {
    if(confirm("Are you sure you want to delete this?")){ 
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>admin/Ajax_controller/remove_unused_setup_details",
            data: {
                'id': id,
            },
            success: function(data) {
                    $("#removable_details_"+id).remove();             
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
}

var i = <?php echo $i; ?>;
function createAddMoreFields() {
    let appedData = `<tr>
                        <input type="hidden" value="${i}" name="indices[]">
                        <td>
                            <input type="text" name="subject_name_${i}[]" id="subject_name_${i}" class="form-control" value="">
                        </td>
                        <td>
                            <input type="number" name="assessment_knowledge_${i}[]" id="assessment_knowledge_${i}" class="form-control" value="">
                        </td>
                        <td>
                            <input type="number" name="assessment_application_${i}[]" id="assessment_application_${i}" class="form-control" value="">
                        </td>
                        <td>
                            <span onclick="removeRow(this)" class="delete_area"><i class="fa fa-close" style="color:red;margin-top:35px;" aria-hidden="true"></i></span>
                        </td>
                    </tr>`;
    $('#add_more_div').append(appedData);
    i++;
}
function removeRow(arg) {
    $(arg).parent().parent().remove();
}   

 </script>
 