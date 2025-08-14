<?php include('faculty_header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"><?php if(!empty($register)){ echo $register->register_name;}?> Register Student Setting</h4>
							<p class="card-description"> Please enter Register Student  details </p>
							<form class="forms-sample" name="register_form" id="register_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<!-- <label for="exampleInputUsername1">Register Name *</label> -->
											<input type="hidden" class="form-control" id="register_name" name="register_name" placeholder="Register Name" value="<?php if(!empty($register)){ echo $register->id;}?>">
											<div class="error" id="id_name_error"></div>
											<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
										</div>
									</div>
									<?php if(!empty($single)){?>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputUsername1">Student Name *</label>
											<input type="text" class="form-control" id="student_name" name="student_name" placeholder="Student Name" value="<?=$single->student_name?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputUsername1">Contact Number </label>
											<input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="<?=$single->contact_number?>">
										</div> 
									</div>
									<?php }else{?>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputUsername1">Student Name *</label>
											<input type="text" class="form-control" id="student_name" name="student_name[]" placeholder="Student Name" value="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputUsername1">Contact Number </label>
											<input type="text" class="form-control" id="contact_number" name="contact_number[]" placeholder="Contact Number" value="">
										</div> 
									</div>
									<?php }?>
								</div>
								<?php if(empty($single)){?>
								<div class="row optionBox">
									
								</div>
								<div class="row">
									<div class= "col-lg-12 col-md-12 col-sm-12">
										<div class="plus-btn add">
											<a href="javascript:void(0)"><i class="mdi mdi-plus"></i></a>
										</div>
									</div>
								</div>
								<?php }?>
								<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
							</form>
						</div>
					</div>
				</div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?php if(!empty($register)){ echo $register->register_name;}?> Students List</h4>
                  <p class="card-description">
                    All list of Register
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Student Name</th> 
						<th>Contact Number</th> 
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;
						if(!empty($student)){ foreach($student as $student_result){
					?>
					<tr>
						<td><?=$i++?></td>
						<td><?=$student_result->student_name?></td>
						<td><?=$student_result->contact_number?></td>
						<td>
							<a onclick="return confirm('Are you sure, you want to deactivate this record?')" data-toggle='tooltip' title='Deactivate' href="<?=base_url()?>inactive<?=$student_result->id?>/tbl_staff_register_student" class='btn btn-success btn-sm'><i class='mdi mdi-bookmark-check'></i></a>   
							<a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle='tooltip' title='Permanently Delete' href="<?=base_url()?>delete/<?=$student_result->id?>/tbl_staff_register_student" class='btn btn-danger btn-sm'><i class='mdi mdi-delete'></i></a>
							<a type='button' title='Edit' data-toggle='tooltip' href="<?=base_url()?>view_register_student/<?=$this->uri->segment(2)?>/<?=$student_result->id?>"  class='btn btn-success btn-sm'><i class='mdi mdi-table-edit'></i></a>
							 
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
 
$('.add').click(function() {
    $('.optionBox').append('<div class="col-md-12">\
		<div class="row">\
		<div class="col-lg-6 col-md-6">\
			<div class="form-group">  \
				<input type="text" class="notes-details-input form-control" id="student_name" name="student_name[]" placeholder="Student Name"> \
			</div>\
		</div> \
		<div class="col-lg-6 col-md-6">\
			<div class="form-group">  \
				<input type="text" class=" notes-details-input form-control" id="contact_number" name="contact_number[]" placeholder="Contact Number"> \
			</div>\
		</div> \
		</div> \
		<div class="remove"><i class="mdi mdi-delete"></i></div>\
	</div>');
});


$('.optionBox').on('click', '.remove', function() {
    $(this).closest('.col-md-12').remove();
});

 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#register_form').validate({
		ignore:[],
		rules: {
			'student_name[]': {
				required: true,
			},
			register_id: {
				required: true,
			},
		},
		messages: {
			'student_name[]': {
				required: "Please enter student name",
			},
			register_id: {
				required: "Please enter register name",
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
});

</script>
 