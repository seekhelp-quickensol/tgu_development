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
                  <h4 class="card-title">Add Center Login
				  <!-- <a href="<?=base_url();?>center_login_list" class="btn btn-primary mr-2 float-right">View List</a> -->
				  </h4>
                  <p class="card-description">
                    Please enter center login details details
                  </p>
                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="old_id" name="old_id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                                <label for="exampleInputUsername1">Select Center *</label>
                                <select class="form-control" id="center" name="center">
                                    <option value="">Select Center</option>
                                    <?php if(!empty($active_centers)){ foreach($active_centers as $active_centers_result){ ?>
                                        <option value="<?=$active_centers_result->id?>" <?php if(!empty($single) && $single->center_id == $active_centers_result->id){ ?> selected="selected" <?php }?>><?=$active_centers_result->center_name?></option>
                                    <?php }} ?>
                                </select>
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

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Center Login List</h4>
                  <table id="example" class="table example list_table" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Center Name</th>
							<th>Username</th>
							<th>Password</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1;if(!empty($centers_login)){foreach($centers_login as $centers_login_result){ ?>
						<tr>
                            <td><?=$i++;?></td>
							<td><?=$centers_login_result->center_name;?></td>
							<td><?=$centers_login_result->username;?></td>
							<td><?=$centers_login_result->password;?></td>
							<td>
								<?php if ($centers_login_result->status == "1"){?>
									<a onclick="return confirm('Are you sure, you want to deactivate this record?')" data-toggle="tooltip" title="Deactivate" href="<?php base_url();?>inactive/<?=$centers_login_result->id;?>/tbl_center_login" class="btn btn-success btn-sm inactivate_clas"><i class="mdi mdi-bookmark-check"></i></a>   
									<a type="button" title="Edit" data-toggle="tooltip" href="<?php base_url();?>add_center_login/<?=$centers_login_result->id?>"  class="btn btn-info btn-sm" title="Edit"><i class="mdi mdi-table-edit"></i></a>
									<a onclick="return confirm('Are you sure, you want to delete this record?')" data-toggle="tooltip" title="Delete" href="<?php base_url();?>delete/<?=$centers_login_result->id;?>/tbl_center_login" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
								<?php }else{ ?>
									<a onclick="return confirm('Are you sure, you want to activate this record?')" data-toggle="tooltip" title="Activate" href="<? base_url();?>active/<?=$centers_login_result->id;?>/tbl_center_login" class="btn btn-danger btn-sm activate_clas"><i class="mdi mdi-playlist-remove"></i></a>
									<a type="button" title="Edit" data-toggle="tooltip" href="<?php base_url();?>add_center_login/<?=$centers_login_result->id?>"  class="btn btn-info btn-sm" title="Edit"><i class="mdi mdi-table-edit"></i></a>
									<a onclick="return confirm('Are you sure, you want to delete this record?')" data-toggle="tooltip" title="Delete" href="<?php base_url();?>delete/<?=$centers_login_result->id;?>/tbl_center_login" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
								<?php }?>
							</td>
						</tr>
                        <?php }} ?>
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
$id=0;
if($this->uri->segment(2) != ""){
	$id = $this->uri->segment(2);
}
?>
 <script>
 $(document).ready(function () {		
	$('#single_form').validate({
		rules: {
			center: {
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
			center: {
				required: "Please select center",
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
// $(document).ready(function() {
// 	$('#example').DataTable();  
// } );


			$(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            $('#example').DataTable({ 
            dom: 'Bfrtip',
            responsive: true,
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
             
                buttons: [
                    // {
                    //     extend: 'copy',
                    //     filename: 'broker-list-bumpload',
                    //     exportOptions: {
                    //         columns: [0,1,2,3,4,5,6,7] 
                    //     }
                    // },
                    // {
                    //     extend: 'csv',
                    //     filename: 'broker-list-bumpload',
                    //     exportOptions: {
                    //         columns: [0,1,2,3,4,5,6,7] 
                    //     }
                    // },
                    {
                        extend: 'excel',
                        filename: 'center-login-list',
                        exportOptions: {
                            columns: [0,1,2,3] 
                        }
                    },
                    // {
                    //     extend: 'pdf',
                    //     filename: 'broker-list-bumpload',
                    //     exportOptions: {
                    //         columns: [0,1,2,3,4,5,6,7] 
                    //     }
                    // },
                    // {
                    //     extend: 'print',
                    //     filename: 'broker-list-bumpload',
                    //     exportOptions: {
                    //         columns: [0,1,2,3,4,5,6,7] 
                    //     }
                    // }
                    
                ], 
        });
 </script>
 