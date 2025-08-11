<?php include('header.php');
if(!empty($student)){
    $guide = $this->Center_details_model->get_assigned_guide($student->guide_id);
    $co_guide = $this->Center_details_model->get_assigned_guide($student->co_guide_id);
?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-3">
							        <h4 class="card-title">Set Scholar Extra Details</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
							        <h5 class="card-title"><?=$student->student_name;?></h5>
								</div>
                                <?php if($student->enrollment_number != ""){?>
								<div class="col-md-3">
							        <h5 class="card-title">Enrollment: <?=$student->enrollment_number;?></h5>
								</div>
                                <?php } ?>
								<div class="col-md-3">
							        <h5 class="card-title">Stream: <?=$student->stream_name;?></h5>
								</div>
								<div class="col-md-3">
							        <h5 class="card-title">Session: <?=$student->session_name;?></h5>
								</div>
							</div>
							<form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" id="student_details_id" name="student_details_id" value="<?php if(!empty($extra_details)){ echo $extra_details->id;}?>">
                                <input type="hidden" class="form-control" id="student_id" name="student_id" value="<?php echo $student->id; ?>">
                                <div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Scholar Type*</label>
                                            <select <?php if(!empty($extra_details) && $extra_details->scholar_type != ""){ echo 'disabled'; }?> class="form-control js-example-basic-single" id="scholar_type" name="scholar_type">
                                                <option value="">Select Scholar Type</option>
                                                <option value="Full Time" <?php if(!empty($extra_details) && $extra_details->scholar_type == 'Full Time'){ echo 'selected';} ?>>Full Time</option>
                                                <option value="Part Time" <?php if(!empty($extra_details) && $extra_details->scholar_type == 'Part Time'){ echo 'selected';} ?>>Part Time</option>
                                            </select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Entrance Exam*</label>
                                            <select <?php if(!empty($extra_details) && $extra_details->entrance_exam != ""){ echo 'disabled'; }?> class="form-control js-example-basic-single" id="entrance_exam" name="entrance_exam">
                                                <option value="">Select Entrance Exam</option>
                                                <option value="NET" <?php if(!empty($extra_details) && $extra_details->entrance_exam == 'NET'){ echo 'selected';} ?>>NET</option>
                                                <option value="SET" <?php if(!empty($extra_details) && $extra_details->entrance_exam == 'SET'){ echo 'selected';} ?>>SET</option>
                                                <option value="SLET" <?php if(!empty($extra_details) && $extra_details->entrance_exam == 'SLET'){ echo 'selected';} ?>>SLET</option>
                                            </select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Supervisor & Co- Supervisor Allocation Process*</label>
											<input <?php if(!empty($extra_details) && $extra_details->guide_allocation_process != ""){ echo 'readonly'; }?> type="text" name="guide_allocation_process" id="guide_allocation_process"  class="form-control" value="<?php if(!empty($extra_details)){ echo $extra_details->guide_allocation_process;}?>">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Assigned Supervisor*</label>
											<input readonly type="text" name="guide" id="guide"  class="form-control" value="<?php if(!empty($guide)){ echo $guide->name;}else{ echo 'NA';}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Supervisor Designation*</label>
											<input readonly type="text" name="designation" id="designation"  class="form-control" value="<?php if(!empty($guide)){ echo $guide->designation;}else{ echo 'NA';}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Supervisor Department*</label>
											<input readonly type="text" name="department" id="department"  class="form-control" value="<?php if(!empty($guide)){ echo $guide->research_area;}else{ echo 'NA';}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Is Regular Teacher?*</label>
                                            <select <?php if(!empty($extra_details) && $extra_details->is_regular_teacher != ""){ echo 'disabled'; }?> class="form-control js-example-basic-single" id="is_regular_teacher" name="is_regular_teacher">
                                                <option value="">Select Option</option>
                                                <option value="Yes" <?php if(!empty($extra_details) && $extra_details->is_regular_teacher == 'Yes'){ echo 'selected';} ?>>Yes</option>
                                                <option value="No" <?php if(!empty($extra_details) && $extra_details->is_regular_teacher == 'No'){ echo 'selected';} ?>>No</option>
                                            </select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Total No Of Scholars Under Supervision* <br><small>(At The Time Of Scholar Registration)</small></label>
											<input <?php if(!empty($extra_details) && $extra_details->scholars_under_guide != ""){ echo 'readonly'; }?> type="text" name="scholars_under_guide" id="scholars_under_guide"  class="form-control" value="<?php if(!empty($extra_details)){ echo $extra_details->scholars_under_guide;}?>">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Assigned Co-Supervisor*</label>
											<input readonly type="text" name="co_guide" id="co_guide"  class="form-control" value="<?php if(!empty($co_guide)){ echo $co_guide->name;}else{ echo 'NA';}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Co-Supervisor Designation*</label>
											<input readonly type="text" name="co_designation" id="co_designation"  class="form-control" value="<?php if(!empty($co_guide)){ echo $co_guide->designation;}else{ echo 'NA';}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Co-Supervisor Department*</label>
											<input readonly type="text" name="co_department" id="co_department"  class="form-control" value="<?php if(!empty($co_guide)){ echo $co_guide->research_area;}else{ echo 'NA';}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Is Regular Teacher?*</label>
                                            <select <?php if(!empty($extra_details) && $extra_details->co_is_regular_teacher != ""){ echo 'disabled'; }?> class="form-control js-example-basic-single" id="co_is_regular_teacher" name="co_is_regular_teacher">
                                                <option value="">Select Option</option>
                                                <option value="Yes" <?php if(!empty($extra_details) && $extra_details->co_is_regular_teacher == 'Yes'){ echo 'selected';} ?>>Yes</option>
                                                <option value="No" <?php if(!empty($extra_details) && $extra_details->co_is_regular_teacher == 'No'){ echo 'selected';} ?>>No</option>
                                            </select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Total No Of Scholars Under Co-Supervision* <br><small>(At The Time Of Scholar Registration)</small></label>
											<input <?php if(!empty($extra_details) && $extra_details->scholars_under_co_guide != ""){ echo 'readonly'; }?> type="text" name="scholars_under_co_guide" id="scholars_under_co_guide"  class="form-control" value="<?php if(!empty($extra_details)){ echo $extra_details->scholars_under_co_guide;}?>">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label>Course Work Start Date<span class="req">*</span></label>
											<input <?php if(!empty($extra_details) && $extra_details->course_work_start_date != ""){ echo 'readonly'; }?> type="text" class="form-control datepicker" name="course_work_start_date" id="course_work_start_date" value="<?php if(!empty($extra_details)){ echo date("d-m-Y",strtotime($extra_details->course_work_start_date));}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Course Work Period From<span class="req">*</span></label>
											<input <?php if(!empty($extra_details) && $extra_details->course_work_period_from != ""){ echo 'readonly'; }?> type="text" class="form-control" name="course_work_period_from" id="course_work_period_from" value="<?php if(!empty($extra_details)){ echo $extra_details->course_work_period_from;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Course Work Period To<span class="req">*</span></label>
											<input <?php if(!empty($extra_details) && $extra_details->course_work_period_to != ""){ echo 'readonly'; }?> type="text" class="form-control" name="course_work_period_to" id="course_work_period_to" value="<?php if(!empty($extra_details)){ echo $extra_details->course_work_period_to;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Course Work Report Type*</label>
                                            <select <?php if(!empty($extra_details) && $extra_details->course_work_report_type != ""){ echo 'disabled'; }?> class="form-control js-example-basic-single" id="course_work_report_type" name="course_work_report_type">
                                                <option value="">Select Option</option>
                                                <option value="Grade" <?php if(!empty($extra_details) && $extra_details->course_work_report_type == 'Grade'){ echo 'selected';} ?>>Grade</option>
                                                <option value="Marks" <?php if(!empty($extra_details) && $extra_details->course_work_report_type == 'Marks'){ echo 'selected';} ?>>Marks</option>
                                            </select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Constitution of Research Advisory Committee<span class="req">*</span></label>
                                            <input <?php if(!empty($extra_details) && $extra_details->research_committee != ""){ echo 'readonly'; }?> type="text" class="form-control" name="research_committee" id="research_committee" value="<?php if(!empty($extra_details)){ echo $extra_details->research_committee;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Research Proposal Topic Report<span class="req">*</span> <br><small>(Google drive link)</small></label>
											<input <?php if(!empty($extra_details) && $extra_details->research_proposal_link != ""){ echo 'readonly'; }?> type="text" class="form-control" name="research_proposal_link" id="research_proposal_link" value="<?php if(!empty($extra_details)){ echo $extra_details->research_proposal_link;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Periodical Review (6 Monthly) Report<span class="req">*</span> <br><small>(Google drive link)</small></label>
											<input <?php if(!empty($extra_details) && $extra_details->periodical_review_link != ""){ echo 'readonly'; }?> type="text" class="form-control" name="periodical_review_link" id="periodical_review_link" value="<?php if(!empty($extra_details)){ echo $extra_details->periodical_review_link;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Presentation Date<span class="req">*</span><br></label>
											<input <?php if(!empty($extra_details) && $extra_details->presentation_date != ""){ echo 'readonly'; }?> type="text" class="form-control datepicker" name="presentation_date" id="presentation_date" value="<?php if(!empty($extra_details)){ echo date("d-m-Y",strtotime($extra_details->presentation_date));}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Research Papers Published<span class="req">*</span></label>
                                            <input <?php if(!empty($extra_details) && $extra_details->research_papers != ""){ echo 'readonly'; }?> type="text" class="form-control" name="research_papers" id="research_papers" value="<?php if(!empty($extra_details)){ echo $extra_details->research_papers;}?>">
                                        </div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Thesis Submission Date<span class="req">*</span></label>
											<input <?php if(!empty($extra_details) && $extra_details->thesis_submission_date != ""){ echo 'readonly'; }?> type="text" class="form-control datepicker" name="thesis_submission_date" id="thesis_submission_date" value="<?php if(!empty($extra_details)){ echo date("d-m-Y",strtotime($extra_details->thesis_submission_date));}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Examiner Name*</label>
											<input <?php if(!empty($extra_details) && $extra_details->examiner != ""){ echo 'readonly'; }?> type="text" name="examiner" id="examiner"  class="form-control" value="<?php if(!empty($extra_details)){ echo $extra_details->examiner;}?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Examiner From*</label>
                                            <select <?php if(!empty($extra_details) && $extra_details->examiner_from != ""){ echo 'disabled'; }?> class="form-control js-example-basic-single" id="examiner_from" name="examiner_from">
                                                <option value="">Select Examiner From</option>
                                                <option value="Within State" <?php if(!empty($extra_details) && $extra_details->examiner_from == 'Within State'){ echo 'selected';} ?>>Within State</option>
                                                <option value="Outside State" <?php if(!empty($extra_details) && $extra_details->examiner_from == 'Outside State'){ echo 'selected';} ?>>Outside State</option>
                                                <option value="Outside Country" <?php if(!empty($extra_details) && $extra_details->examiner_from == 'Outside Country'){ echo 'selected';} ?>>Outside Country</option>
                                            </select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Plagiarism Check Report<span class="req">*</span> <small>(Google drive link)</small></label>
											<input <?php if(!empty($extra_details) && $extra_details->plagiarism_check_review_link != ""){ echo 'readonly'; }?> type="text" class="form-control" name="plagiarism_check_review_link" id="plagiarism_check_review_link" value="<?php if(!empty($extra_details)){ echo $extra_details->plagiarism_check_review_link;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Thesis Sent To Examiner Date<span class="req">*</span></label>
											<input <?php if(!empty($extra_details) && $extra_details->thesis_examiner_submission_date != ""){ echo 'readonly'; }?> type="text" class="form-control datepicker" name="thesis_examiner_submission_date" id="thesis_examiner_submission_date" value="<?php if(!empty($extra_details)){ echo date("d-m-Y",strtotime($extra_details->thesis_examiner_submission_date));}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Thesis Received From Examiner Date<span class="req">*</span></label>
											<input <?php if(!empty($extra_details) && $extra_details->thesis_examiner_receive_date != ""){ echo 'readonly'; }?> type="text" class="form-control datepicker" name="thesis_examiner_receive_date" id="thesis_examiner_receive_date" value="<?php if(!empty($extra_details)){ echo date("d-m-Y",strtotime($extra_details->thesis_examiner_receive_date));}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Examiner Thesis Suggestions Report <span class="req">*</span><small>(Google drive link)</small></label>
											<input <?php if(!empty($extra_details) && $extra_details->examiner_thesis_suggestion_link != ""){ echo 'readonly'; }?> type="text" class="form-control" name="examiner_thesis_suggestion_link" id="examiner_thesis_suggestion_link" value="<?php if(!empty($extra_details)){ echo $extra_details->examiner_thesis_suggestion_link;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Examiner Report <span class="req">*</span><small>(Google drive link)</small></label>
											<input <?php if(!empty($extra_details) && $extra_details->examiner_report_link != ""){ echo 'readonly'; }?> type="text" class="form-control" name="examiner_report_link" id="examiner_report_link" value="<?php if(!empty($extra_details)){ echo $extra_details->examiner_report_link;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Viva-Voce Date<span class="req">*</span></label>
											<input <?php if(!empty($extra_details) && $extra_details->viva_date != ""){ echo 'readonly'; }?> type="text" class="form-control datepicker" name="viva_date" id="viva_date" value="<?php if(!empty($extra_details)){ echo date("d-m-Y",strtotime($extra_details->viva_date));}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Viva-Voce Report <span class="req">*</span><small>(Google drive link)</small></label>
											<input <?php if(!empty($extra_details) && $extra_details->viva_report_link != ""){ echo 'readonly'; }?> type="text" class="form-control" name="viva_report_link" id="viva_report_link" value="<?php if(!empty($extra_details)){ echo $extra_details->viva_report_link;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>PH.D. Award Date<span class="req">*</span></label>
											<input <?php if(!empty($extra_details) && $extra_details->phd_award_date != ""){ echo 'readonly'; }?> type="text" class="form-control datepicker" name="phd_award_date" id="phd_award_date" value="<?php if(!empty($extra_details)){ echo date("d-m-Y",strtotime($extra_details->phd_award_date));}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Evidence of Thesis Upload on Shodhganga<span class="req">*</span> <small>(Google drive link)</small></label>
											<input <?php if(!empty($extra_details) && $extra_details->thesis_evidence_link != ""){ echo 'readonly'; }?> type="text" class="form-control" name="thesis_evidence_link" id="thesis_evidence_link" value="<?php if(!empty($extra_details)){ echo $extra_details->thesis_evidence_link;}?>">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Provisional Certificate Field<span class="req">*</span></label>
											<input <?php if(!empty($extra_details) && $extra_details->provisional_certificate != ""){ echo 'readonly'; }?> type="text" class="form-control" name="provisional_certificate" id="provisional_certificate" value="<?php if(!empty($extra_details)){ echo $extra_details->provisional_certificate;}?>">
                                        </div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
                                            <label>Other Information<span class="req">*</span></label>
											<textarea <?php if(!empty($extra_details) && $extra_details->other_information != ""){ echo 'readonly'; }?> class="form-control" name="other_information" id="other_information"><?php if(!empty($extra_details)){ echo $extra_details->other_information;}?></textarea>
										</div>
									</div>
								</div>
								<button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
<?php } include('footer.php');
$id=0;
if($this->uri->segment(2) != ""){
	$id = $this->uri->segment(2);
}
?>
 <script>
 $(document).ready(function () {		
	$('#single_form').validate({
		rules: {
			scholar_type: {
				required: true,
			},
			entrance_exam:{
				required:true,
			},
			guide_allocation_process: {
				required: true,
			},
			is_regular_teacher: {
				required: true,
			},
			scholars_under_guide: {
				required: true,
				number: true,
				minlength: 0,
			},
			co_is_regular_teacher: {
				required: true,
			},
			scholars_under_co_guide: {
				required: true,
				number: true,
				minlength: 0,
			},
			course_work_start_date: {
				required: true,
			},
			research_proposal_link: {
				required: true,
			},
			periodical_review_link: {
				required: true,
			},
			presentation_date: {
				required: true,
			},
			thesis_submission_date: {
				required: true,
			},
			examiner: {
				required: true,
			},
			examiner_from: {
				required: true,
			}, 
			plagiarism_check_review_link: {
				required: true,
			},
			thesis_examiner_submission_date: {
				required: true,
			},
			thesis_examiner_receive_date: {
				required: true,
			},
			examiner_thesis_suggestion_link: {
				required: true,
			},
			examiner_report_link: {
				required: true,
			},
			viva_date:{
				required: true,	
			},
			viva_report_link: {
				required:true,
			},
			phd_award_date: {
				required:true,
			},
			thesis_evidence_link: {
				required:true,
			},
			other_information: {
				required:true,
			},
			course_work_period_from: {
				required: true,
			},
			course_work_period_to:{
				required: true,	
			},
			course_work_report_type: {
				required:true,
			},
			research_committee: {
				required:true,
			},
			research_papers: {
				required:true,
			},
			provisional_certificate: {
				required:true,
			},
		},
		messages: {
			scholar_type: {
				required:'Please select scholar type',
			},
			entrance_exam:{
				required:'Please select entrance exam',
			},
			guide_allocation_process: {
				required:'Please enter allocation process',
			},
			is_regular_teacher: {
				required:'Please select option',
			},
			scholars_under_guide: {
				required:'Please enter scholars count',
				number: 'Enter numbers only',
				minlength: 'Minimum value 0 is allowed',
			},
			co_is_regular_teacher: {
				required:'Please select option',
			},
			scholars_under_co_guide: {
				required:'Please enter scholars count',
				number: 'Enter numbers only',
				minlength: 'Minimum value 0 is allowed',
			},
			course_work_start_date: {
				required:'Please select date',
			},
			research_proposal_link: {
				required:'Please enter link',
			},
			periodical_review_link: {
				required:'Please enter link',
			},
			presentation_date: {
				required:'Please select date',
			},
			thesis_submission_date: {
				required:'Please select date',
			},
			examiner: {
				required:'Please enter examiner name',
			},
			examiner_from: {
				required:'Please select option',
			}, 
			plagiarism_check_review_link: {
				required:'Please enter link',
			},
			thesis_examiner_submission_date: {
				required:'Please select date',
			},
			thesis_examiner_receive_date: {
				required:'Please select date',
			},
			examiner_thesis_suggestion_link: {
				required:'Please enter link',
			},
			examiner_report_link: {
				required:'Please enter link',
			},
			viva_date:{
				required:'Please select Viva/Voce date',
			},
			viva_report_link: {
				required:'Please enter link',
			},
			phd_award_date: {
				required:'Please select PHD award date',
			},
			thesis_evidence_link: {
				required:'Please enter link',
			},
			other_information: {
				required:'Please enter other information',
			},
			course_work_period_from: {
				required:'Please enter period from',
			},
			course_work_period_to:{
				required:'Please enter period to',
			},
			course_work_report_type: {
				required:'Please enter report type',
			},
			research_committee: {
				required:'Please enter committee details',
			},
			research_papers: {
				required:'Please enter research paper details',
			},
			provisional_certificate: {
				required:'Please enter provisional certificate details',
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
        submitHandler: function (form) {
            if (confirm("Are you sure you want to submit the form? \nPlease ensure the entered details are accurate, as they can not be editable later.")) {
				form.submit();
			} else {
				return false;
			}
		}
	});
});
$( function() {
    $( ".datepicker" ).datepicker({
		dateFormat:"dd-mm-yy",
		changeMonth:true,
		changeYear:true,
	});
});

</script>
 