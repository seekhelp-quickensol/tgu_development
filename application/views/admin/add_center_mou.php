<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">MOU Setting</h4>
                  <p class="card-description">
                    Please enter mou details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
							<label for="exampleInputUsername1">Document Name *</label>
							<input type="text" class="form-control" id="document_name" name="document_name" placeholder="Enter Document Name" value="<?php if(!empty($single)){ echo $single->document_name;}?>">
					  </div>
					  
                    <div class="form-group">
                      <label>Upload MOU</label>
                      <input type="file" name="mou" id="mou" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload MOU">
						&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
					  </div>
					  
					 

					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($center)){ echo $center->id;}?>">
                    
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">MOU List of <?php if(!empty($center)){ echo $center->center_name;}?></h4>
                  <p class="card-description">
                    All list of mou's
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Document Name</th>
						<th>File Name</th>
						<th>Added On</th>
						<th>View MOU</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
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
			mou: {
				required: true,
			},
			document_name:{
				required: true,
			},
		},
		messages: {
			mou: {
				required: "Please upload mou",
			},
			document_name:{
				required: "Please enter document name",
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
		"processing": true,
		"serverSide": true,
		"cache": false,
		"order": [[0, "asc" ]],
		dom:"Bfrtip",
		scrollX:300,
		responsive:false,
		buttons: [
			// {
			// 	extend: 'copyHtml5',
			// 	exportOptions: {
			// 	 columns: ':contains("Office")'
			// 	}
			// },
			// 'excelHtml5',
			// 'csvHtml5',
			// 'pdfHtml5'
		],
		"ajax":{
			"url": "<?=base_url();?>admin/ajax_controller/get_center_mou_ajax",
			"type": "POST",
			"data":{'center_id':'<?=$id?>'},
		},		
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    }); 
});

</script>
 