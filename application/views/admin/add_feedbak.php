<?php include('faculty_header.php');?>
<style>
	.dtr-data{
		white-space: break-spaces;
	}
</style>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"></h4>
							<p class="card-description">For the improvement of software please send your feedback or comments that how we can improve this faculty management system. </p>
							<form class="forms-sample" name="register_form" id="register_form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleInputUsername1">Feedback *</label>
											<textarea class="form-control" id="feedback" name="feedback" rows="12" placeholder="Please enter feedback"></textarea>
											<div class="error" id="id_name_error"></div>
											<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
										</div>
									</div> 
								</div> 
								<div class="clearfix"></div>
								<div class="row">
									<div class= "col-lg-12 col-md-12 col-sm-12">
										<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Feedback List</h4>
                  <p class="card-description"></p>
					<table id="example" class="table table-striped table-bordered dt-responsive nowrap" width="100%">
						<thead>
							<tr>
								<th>Sr. No.</th>
								<th>Feedback</th>  
							</tr>
						</thead>
						<tbody>
							<?php $i=1;if(!empty($feedback)){ foreach($feedback as $feedback_result){?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$feedback_result->feedback?></td>
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
$(document).ready(function(){
	$('#example').DataTable({
		"order": [],
		dom: 'Bfrtip',
		buttons: [ 
			{
				extend:'excelHtml5', 
				title:"Feedback List",
			}
			
		]
	});	
});


// $(".table").addClass('table-responsive');
</script>
 
<script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#register_form').validate({
		// ignore: ":hidden:not(#content),.note-editable.panel-body",
		rules: {
			feedback: {
				required: true,
			},
		},
		messages: {
			feedback: {
				required: "Please enter feedback",
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