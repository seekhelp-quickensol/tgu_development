<?php
// echo "<pre>";print_r($course);exit;
include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Search Subject </h4><p class="card-description">
                 <p class="card-description">All list of Subject</p>
                  <form class="forms-sample" name="relation_form" id="relation_form" method="get" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    <div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="exampleInputUsername1">Course Name *</label>
							  <select class="form-control js-example-basic-single exist_fees course_list" id="course" name="course">
								<option value="">Select Course</option>
								<?php if(!empty($course)){ foreach($course as $course_result){?>
								<option value="<?=$course_result->course?>"  <?php if(isset($_GET['course']) && $_GET['course'] == $course_result->course){?>selected="selected"<?php }?>><?=$course_result->course_name?></option>
								<?php }}?>
							  </select>
							  <div class="error" id="relation_error"></div>
							</div>
						</div>
						<?php 
						
						$stram_set = 0;
						if(isset($_GET['stream']) && $_GET['stream']){
						    $stream_exp = explode("@@@",$_GET['stream']);
						    $stram_set = $stream_exp[1];
						}
						?>
						<div class="col-md-12">
						<div class="form-group">
						  <label for="exampleInputUsername1">Stream Name *</label>
						  <select class="form-control js-example-basic-single exist_fees course_list" id="stream" name="stream">
							<option value="">Select Stream</option>
							<?php 
							$stram_set = 0;
							$stream = array();
							if(isset($_GET['stream']) && $_GET['stream'] && isset($_GET['course'])){
								$stream_exp = explode("@@@",$_GET['stream']);
								$stram_set = $stream_exp[1];
								$stream = $this->Course_model->get_related_course_stream($_GET['course']); 
							}
							?>
							<?php if(!empty($stream)){ 	foreach($stream as $stream_result){?>
								<option value="<?=$stream_result->id?>@@@<?=$stream_result->stream ?>" <?php if($stram_set == $stream_result->id){?>selected="selected"<?php }?>><?=$stream_result->stream_name?></option>
							<?php }} ?>
						  </select>
						</div>
					</div>
					<div class="col-md-12">
							<div class="form-group">
							  <label for="exampleInputUsername1">Year/Sem *</label>
							  <select class="form-control js-example-basic-single" id="year_sem" name="year_sem">
								<option value="">Select</option>
								<?php for($y=1;$y<=12;$y++){?>
								<option value="<?=$y?>" <?php if(isset($_GET['year_sem']) && $_GET['year_sem'] == $y){?>selected="selected"<?php }?>><?=$y?></option>
								<?php }?>
							  </select>
							</div>
						</div>
					</div>
					 <div class="row">
						<?php /* <div class="col-md-6">
							<div class="form-group">
							  <label for="exampleInputUsername1">Course Mode *</label>
							  <select class="form-control js-example-basic-single" id="course_mode" name="course_mode">
								<option value="">Select Mode</option>
								<?php if(!empty($mode)){
								    if($mode->course_mode =="3"){
								    ?>
                						<option value=''>Select Course Mode</option>
                						<option value='1' <?php if(isset($_GET['course_mode']) && $_GET['course_mode'] == 1){?>selected="selected"<?php }?>>Year</option>
                						<option value='2' <?php if(isset($_GET['course_mode']) && $_GET['course_mode'] == 2){?>selected="selected"<?php }?>>Semester</option>
                						<option value='3' <?php if(isset($_GET['course_mode']) && $_GET['course_mode'] == 3){?>selected="selected"<?php }?>>Both</option>
                				 
                				<?php }else if($mode->course_mode =="2"){ ?> 
                						<option value=''>Select Course Mode</option>
                						<option value='2' <?php if(isset($_GET['course_mode']) && $_GET['course_mode'] == 2){?>selected="selected"<?php }?>>Semester</option>
                						<option value='3' <?php if(isset($_GET['course_mode']) && $_GET['course_mode'] == 3){?>selected="selected"<?php }?>>Both</option> 
                				<?php }else if($mode->course_mode =="1"){?> 
                						<option value=''>Select Course Mode</option>
                						<option value='1' <?php if(isset($_GET['course_mode']) && $_GET['course_mode'] == 1){?>selected="selected"<?php }?>>Year</option> 
                				<?php }else if($mode->course_mode =="4"){?> 
                						<option value=''>Select Course Mode</option>
                						<option value='4' <?php if(isset($_GET['course_mode']) && $_GET['course_mode'] == 4){?>selected="selected"<?php }?>>Month</option> 
                				<?php }
								}?>
							  </select>
							</div>
						</div>*/?>
					
					</div>
					
					
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Search</button>
                    <a href="<?=base_url();?>list_subject" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
			<div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <h4 class="card-title">Subject List <a href="<?=base_url();?>manage_subject" class="btn btn-primary mr-2 float-right">Add New</a></h4><p class="card-description">
                 <p class="card-description">
                    All list of Subject <?php if(!empty($subject)){?>[<?=$subject[0]->course_name?> | <?=$subject[0]->stream_name?>]<?php }?>
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Center/Campus</th>
							<th>Subject Code</th>
							<th>Subject Name</th>
							<th>Subject Type</th> 
							<th>Mode</th>
							<th>Year/Sem</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php if(!empty($subject)){ 
						$i=1;
						foreach($subject as $subject_result){?>
						<tr>
							<td><?=$i++?></td>
							<td><?php if($subject_result->center_id == "1"){ echo "Campus";}else{ echo $subject_result->center_name;}?></td>
							<td><?=$subject_result->subject_code?></td>
							<td><?=$subject_result->subject_name?></td>
							<td>
								<?php 
									if($subject_result->subject_type == "0"){
										echo "Theory";
									}else{
										echo "Practical";
									}
								?>
							</td>
							<td>
								<?php 
									if($subject_result->mode == "3"){
										echo "Both";
									}else if($subject_result->mode == "2"){
										echo "Semester";
									}else if($subject_result->mode == "1"){
										echo "Year";
									}
								?>
							</td>
							<td><?=$subject_result->year_sem?></td>
							<td>
								<?php if($subject_result->status == "1"){
										echo "Active";
									}else{
										echo "Inactive";
									}
								?>
							</td>
							<td>
								<?php if($subject_result->status == "1"){ ?>
									<a onclick="return confirm('Are you sure, you want to deactivate this record?')" data-toggle="tooltip" title="Deactivate" href="<?=base_url()?>inactive/<?=$subject_result->id?>/tbl_subject" class="btn btn-success btn-sm inactivate_clas"><i class="mdi mdi-bookmark-check"></i></a>   
									<a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle="tooltip" title="Permanently Delete" href="<?=base_url()?>delete/<?=$subject_result->id?>/tbl_subject" class="btn btn-danger btn-sm delete_class"><i class="mdi mdi-delete"></i></a>
									<a type="button" title="Edit" data-toggle="tooltip" href="<?=base_url()?>edit_subject?id=<?=$subject_result->id?>&course=<?=$_GET['course']?>&stream=<?=$_GET['stream']?>&course_mode=<?=$subject_result->mode?>&year_sem=<?=$_GET['year_sem']?>"  class="btn btn-success btn-sm edit_subject"><i class="mdi mdi-table-edit"></i></a>
								<?php }else{?>
								<a onclick="return confirm('Are you sure, you want to activate this record?')" data-toggle="tooltip" title="Activate" href="<?=base_url()?>active/<?=$subject_result->id?>/tbl_subject" class="btn btn-danger btn-sm activate_clas"><i class="mdi mdi-playlist-remove"></i></a>
									<a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle="tooltip" title="Permanently Delete" href="<?=base_url()?>delete/<?=$subject_result->id?>/tbl_subject" class="btn btn-danger btn-sm delete_class"><i class="mdi mdi-delete"></i></a>
									<a type="button" title="Edit" data-toggle="tooltip" href="<?=base_url()?>edit_subject?id=<?=$subject_result->id?>&course=<?=$_GET['course']?>&stream=<?=$_GET['stream']?>&course_mode=<?=$subject_result->mode?>&year_sem=<?=$_GET['year_sem']?>"  class="btn btn-success btn-sm edit_subject"><i class="mdi mdi-table-edit"></i></a>
								<?php }?>
							</td>
						</tr>
					<?php }}?>
					</tbody>
				</table>
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
 
// $(document).ready(function() {
// 	$('#example').DataTable({
// 		 dom: 'Bfrtip',
// 		buttons: [ 
// 			'excel', 
// 		],
//     }); 
// });

$('#example').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'excelHtml5',
            title: "Subject List",
			exportOptions: {
                columns: [0, 1, 2, 3,4,5,6,7], 
            },
        }
    ],
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
$(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
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
			form.submit();
			
		}
	});
});


		$('#course').on('change', function() {
			$('#course').valid();
		});

		$('#stream').on('change', function() {
			$('#stream').valid();
		});

		$('#year_sem').on('change', function() {
			$('#year_sem').valid();
		});
		
</script>
 