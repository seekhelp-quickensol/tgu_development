<?php include('header.php');?> 
<style>

</style> 
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?php if(!empty($course)){ echo $course->print_name;}?> Course FAQ</h4>
                  <p class="card-description">
                    Please enter FAQ's details
                  </p>
                  <form class="forms-sample" name="course_form" id="course_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Question *</label>
                      <input type="text" class="form-control" id="question" name="question" placeholder="Question" value="<?php if(!empty($single)){ echo $single->question;}?>">
					  <div class="error" id="course_error"></div>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                      <input type="hidden" class="form-control" id="course_id" name="course_id" value="<?=$this->uri->segment(2)?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Answer *</label>
                      <textarea class="form-control" id="answer" name="answer" placeholder="Answer"><?php if(!empty($single)){ echo $single->answer;}?></textarea>
					</div>
                     
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
                  </form>
                </div>
              </div>
              </div>
            
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?php if(!empty($course)){ echo $course->print_name;}?> Course FAQ List</h4>
                  <p class="card-description">
                    All list of course
                  </p>
				  
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Question</th>
						<th>Answer</th> 
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="">
					
				    <?php if(!empty($faq)){ 
						 $sr=1;
						foreach($faq as $faq_result){?>
					<tr>
					    <td><?=$sr++?></td>
					    <td><?=$faq_result->question?></td>
					    <td><?=$faq_result->answer?></td>
					    <td>
					        <?php if($faq_result->status == "1"){?>
					        <a onclick="return confirm('Are you sure, you want to deactivate this record?')" data-toggle='tooltip' title='Deactivate' href="<?=base_url()?>inactive/<?=$faq_result->id?>/tbl_course_faq" class='btn btn-success btn-sm inactivate_clas'><i class='mdi mdi-bookmark-check'></i></a>   
					        <?php }else{?>
					        <a onclick="return confirm('Are you sure, you want to activate this record?')" data-toggle='tooltip' title='Activate' href="<?=base_url()?>active/<?=$faq_result->id?>/tbl_course_faq" class='btn btn-danger btn-sm activate_clas'><i class='mdi mdi-playlist-remove'></i></a>
									
					        <?php }?>
									<a onclick="return confirm('Are you sure, you want to delete this record permanently?')" data-toggle='tooltip' title='Permanently Delete' href="<?=base_url()?>delete/<?=$faq_result->id?>/tbl_course_faq" class='btn btn-danger btn-sm delete_class'><i class='mdi mdi-delete'></i></a>
									<a type='button' title='Edit' data-toggle='tooltip' href="<?=base_url()?>manage_course_faq/<?=$this->uri->segment(2)?>/<?=$faq_result->id?>"  class='btn btn-success btn-sm edit_class'><i class='mdi mdi-table-edit'></i></a>
								
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
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#course_form').validate({
		rules: {
			question: {
				required: true,
			},
			answer: {
				required: true,
			}, 
		},
		messages: {
			question: {
				required: "Please enter question",
			},
			answer: {
				required: "Please enter answer",
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
$(document).ready(function() {
	$('#example').DataTable({
		 
		buttons: [
			{
				extend: 'copyHtml5',
				exportOptions: {
				 columns: ':contains("Office")'
				}
			},
			'excelHtml5',
			],
		 
    }); 
});

 
</script>
  