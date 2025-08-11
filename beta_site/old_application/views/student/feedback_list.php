<?php include('header.php');?>
<link rel="stylesheet" src="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Feedback</h4>
                  <p class="card-description">
                    Add your Feedback
                  </p>
					<form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Feedback *</label>
                      <textarea class="form-control" id="feedback" name="feedback" placeholder="Please enter your feedback/complain"></textarea>
					 </div>
                    
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Feedback List</h4>
                  <p class="card-description">
                    All list of Feedback
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>  
							<th>Date</th> 
							<th>Feedback</th>  
						</tr>
					</thead>
					<tbody>
						<?php $i=1;if(!empty($feedback)){ foreach($feedback as $feedback_result){?>
						<tr>
							<td><?=$i++?></td>
							<td><?=date("d/m/Y",strtotime($feedback_result->created_on))?></td>
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
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#single_form').validate({
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
 