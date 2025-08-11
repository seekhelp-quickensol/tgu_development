<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
		   
			<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">MCQ Report</h4>
					<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>Sr.No</th>
								<th>Course Name</th>
								<th>Stream Name</th> 
								<th>Subject Name</th>
								<th>Year/Sem</th>
								<th>Total Question</th>
							</tr>
						</thead>
						<tbody>
							<?php $sr=1;
							if(!empty($course)){ foreach($course as $course_result){
									$subject = $this->Exam_model->get_mcq_paper_details($course_result->course_id,$course_result->stream_id,$course_result->year_sem);
							?>
							<?php if(!empty($subject)){ foreach($subject as $subject_result){
										$total = $this->Exam_model->get_total_subject_mcq_count($subject_result->course,$subject_result->stream,$subject_result->year_sem,$subject_result->id);	
									?>
								<tr>
									<td><?=$sr++?></td>
									<td><?=$course_result->course_name?></td>
									<td><?=$course_result->stream_name?></td>
									 
									<td style="text-align:left;width:50%"><?=$subject_result->subject_name?></td>
									<td style="text-align:left;width:25%"><?=$subject_result->year_sem?></td>
									<td style="text-align:left;width:25%"><?=$total?></td>
									</tr>
								 
									<?php }}?>
							<?php }}?>
						</tbody>
					</table>
                </div>
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
<script>

jQuery.validator.addMethod("validate_email", function(value, element) {
	if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
		return true;
	}else {
		return false;
	}
}, "Please enter a valid Email.");	
$('#selection_form').validate({
	rules: {
		course: {
			required: true,
		},
		stream: {
			required: true,
		},
		year_sem: {
			required: true,
		},
		subject: {
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
		year_sem: {
			required: "Please select year/sem",
		},
		subject: {
			required: "Please select subject",
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
	}
}); 
   
$('#example').DataTable({
	 buttons:[
			
			{
				extend: "excelHtml5",
				messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
				exportOptions: {
                    columns: [0, 1,2,3,4,5],
                    modifier: {
						search: 'applied',
						order: 'applied'
					},
                }, 
                filename:"exam form",
			} 
		],
		dom:"Bfrtip",
 });
</script>
 