<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
		  <?php if(!isset($_GET['course'])){?>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Theoretical Question Data</h4>
                  <p class="card-description">
                    Please enter required details
                  </p>
				  
					<form class="forms-sample" name="selection_form" id="selection_form" method="get" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Course *</label>
									<select class="form-control" id="course" name="course"> 
										<option value="">Select</option>
										<?php if(!empty($course)){ foreach($course as $course_result){?>
										<option value="<?=$course_result->id?>"><?=$course_result->course_name?></option>
										<?php }}?> 
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Stream *</label>
									<select class="form-control" id="stream" name="stream"> 
										<option value="">Select</option>
										 
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Year/Sem *</label>
									<select class="form-control" id="year_sem" name="year_sem"> 
										<option value="">Select</option>
										 
									</select>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleInputUsername1">Subject *</label>
									<select class="form-control" id="subject" name="subject"> 
										<option value="">Select</option>
										 
									</select>
								</div>
							</div>
						</div>
						<div class="row"> 
							<div class="col-md-3">
								<div class="form-group">
									<button type="submit" id="save_btn" class="btn btn-primary mr-2">Next</button> 
								</div>
							</div>
						</div>
					</form>		
				</div>
            </div>
        </div>
		<?php }?>
		<?php if(isset($_GET['course'])){?>
			 
			<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Question List for <?=$file_name?></h4>
					<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
						<thead>
							<tr>
								<th>Sr. No.</th>
								<th>Question</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $sr=1;if(!empty($questions)){ foreach($questions as $questions_result){?>
								<tr>
									<td><?=$sr++?></td>
									<td><?=$questions_result->question?></td>
									<td>
										<a onclick="return confirm('Are you sure, you want to delete this record permanently?')"' data-toggle='tooltip' title='Permanently Delete' href="<?=base_url()?>delete/<?=$questions_result->id?>/tbl_theoretical_data" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>										
										 
									</td>
								</tr>
							<?php }}?>
						</tbody>
					</table>
                </div>
              </div>
            </div>
		<?php }?>
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

$("#course").change(function(){  
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream",
		data:{'course':$("#course").val()},
		success: function(data){
			$("#stream").empty();
			$('#stream').append('<option value="">Select Stream</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#stream').append('<option value="' + d.id + '">' + d.stream_name + '</option>');
			});
			$('#stream').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});
$("#stream").change(function(){  
	$("#year_sem").html("<option value=''>Select Semester/Year</option>");
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_duration",
		data:{'course':$("#course").val(),'stream':$("#stream").val()},
		success: function(data){
			$("#year_sem").html(data);
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}); 
$("#year_sem").change(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>web/Web_controller/get_course_stream_subject",
		data:{'course':$("#course").val(),'stream':$("#stream").val(),'year_sem':$("#year_sem").val()},
		success: function(data){
			$("#subject").empty();
			$('#subject').append('<option value="">Select</option>');
			var opts = $.parseJSON(data);
			$.each(opts, function(i, d) {
			   $('#subject').append('<option value="' + d.id + '">' + d.subject_name + '</option>');
			});
			$('#subject').trigger('change');
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}); 
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
				
                filename:"<?=$file_name?>",
			} 
		],
		dom:"Bfrtip",
 });
</script>
 