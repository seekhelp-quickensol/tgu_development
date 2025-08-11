<?php
// echo "<pre>";print_r($single);exit;
include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 grid-margin" style="margin:0px auto">
              <div class="card">
                <div class="card-body">
                  
                  <h4 class="card-title">Manage Center Course Sharing</h4>
				  <p class="card-description">
                  </p>
                  <form class="forms-sample" name="relation_form" id="relation_form" method="post" enctype="multipart/form-data">
                    <div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputUsername1">From Center for Fees *</label>
								<select class="form-control js-example-basic-single" onchange="updateDropdowns();" id="from_center" name="from_center">
									<option value="">Select Center Name</option>
									<?php if(!empty($center)){ foreach($center as $center_result){ ?>
									<option value="<?=$center_result->id?>"><?=$center_result->center_name?></option>
									<?php }} ?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputUsername1">To Center for Fees *</label>
								<select class="form-control js-example-basic-single" onchange="updateDropdowns();" id="to_center" name="to_center">
									<option value="">Select Center Name</option>
									<?php if(!empty($center)){ foreach($center as $center_result){ ?>
									<option value="<?=$center_result->id?>"><?=$center_result->center_name?></option>
									<?php }} ?>
								</select>
							</div>
						</div>

					</div>
					<div class="row">
						
					</div>
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
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
			from_center: {
				required: true,
			},
			to_center: {
				required: true,
			}, 
		},
		messages: {
			from_center: {
				required: "Please select center name",
			},
			to_center: {
				required: "Please select center name",
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
</script>
 
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    // Initialize the select2 plugin
    $('#from_center, #to_center').select2();

    // Function to disable the selected value in the other dropdown
    function updateDropdowns() {
        var fromCenter = $('#from_center').val();
        var toCenter = $('#to_center').val();

        // Re-enable all options
        $('#from_center option, #to_center option').prop('disabled', false);

        // If a center is selected in "From Center", disable it in "To Center"
        if (fromCenter) {
            $('#to_center option[value="' + fromCenter + '"]').prop('disabled', true);
        }

        // If a center is selected in "To Center", disable it in "From Center"
        if (toCenter) {
            $('#from_center option[value="' + toCenter + '"]').prop('disabled', true);
        }

        // Refresh Select2 dropdowns
        $('#from_center').select2();
        $('#to_center').select2();
    }

    // Attach the event handler to update both dropdowns when one is changed
    $('#from_center, #to_center').on('change', function() {
        updateDropdowns();
    });

    // Call updateDropdowns on page load to disable pre-selected values (if any)
    updateDropdowns();
});
</script>

