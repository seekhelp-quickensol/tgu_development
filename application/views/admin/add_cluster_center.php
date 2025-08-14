<?php include('header.php');?>
<style>
	.btn-small{
		padding: 5px 10px;
	}
	.no_doc{
		margin-bottom: 0px;
		padding: 5px;
		background: #ddd;
		color: #000;
		text-align: center;
	}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Cluster Center
				  <a href="<?=base_url();?>cluster_center_list" class="btn btn-primary mr-2 float-right">View List</a>
				  </h4>
                  <p class="card-description">
                    Please enter cluster center details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Cluster Center Name *</label>
                                <input type="hidden" class="form-control" id="old_id" name="old_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Cluster Center Name" value="<?php if(!empty($single)){ echo $single->name;}?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Select Centers *</label>
                                <select class="form-control choosen" id="center" name="center[]" multiple>
                                    <option value="">Select Center</option>
                                    <?php if(!empty($active_centers)){ foreach($active_centers as $active_centers_result){ ?>
                                        <option value="<?=$active_centers_result->id?>" <?php if(!empty($single) && in_array($active_centers_result->id, explode(',', $single->centers))){ echo 'selected="selected"'; } ?>>
                                            <?=$active_centers_result->center_name?>
                                        </option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Remark *</label>
                                <textarea type="text" class="form-control" id="remark" name="remark" placeholder="Remark"><?php if(!empty($single)){ echo $single->remark;}?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">User Name *</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="<?php if(!empty($single)){ echo $single->username;}?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Password </label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php if(!empty($single)){ echo $single->password;}?>">
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
    </div>
</div>
      
<?php include('footer.php');
$id=0;
if($this->uri->segment(2) != ""){
	$id = $this->uri->segment(2);
}
?>
<script>
$(document).ready(function() {
  $('.choosen').select2();
});
</script>

 <script>
 $(document).ready(function () {		
	$('#single_form').validate({
		rules: {
			name: {
				required: true,
			},
			center: {
				required: true,
			},
			remark: {
				required: true,
			},
			username: {
				required: true,
			},
			password: {
				required: true,
			},
		},
		messages: {
			name: {
				required: "Please enter cluster center name",
			},
			center: {
				required: "Please select center",
			},
			remark: {
				required: "Please enter remark",
			},
			username: {
				required: "Please enter username",
			},
			password: {
				required: "Please enter password",
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
 