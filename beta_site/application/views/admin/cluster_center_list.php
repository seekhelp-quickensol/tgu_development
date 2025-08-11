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
                  <h4 class="card-title">Cluster Center Details
				  <a href="<?=base_url();?>add_cluster_center" class="btn btn-primary mr-2 float-right">Add New</a>
				  </h4>
                  <table id="example" class="table example list_table" style="width:100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Name</th>
							<th>Username</th>
							<th>Password</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
						<?php $i=1;if(!empty($cluster_center)){foreach($cluster_center as $cluster_center_result){ ?>
						<tr>
                            <td><?=$i++;?></td>
							<td><?=$cluster_center_result->name;?></td>
							<td><?=$cluster_center_result->username;?></td>
							<td><?=$cluster_center_result->password;?></td>
							<td>
								<?php if ($cluster_center_result->status == "1"){?>
									<a onclick="return confirm('Are you sure, you want to deactivate this record?')" data-toggle="tooltip" title="Deactivate" href="<?php base_url();?>inactive/<?=$cluster_center_result->id;?>/tbl_cluster_center" class="btn btn-success btn-sm inactivate_clas"><i class="mdi mdi-bookmark-check"></i></a>   
									<a type="button" title="Edit" data-toggle="tooltip" href="<?php base_url();?>add_cluster_center/<?=$cluster_center_result->id?>"  class="btn btn-info btn-sm" title="Edit"><i class="mdi mdi-table-edit"></i></a>
									<a onclick="return confirm('Are you sure, you want to delete this record?')" data-toggle="tooltip" title="Delete" href="<?php base_url();?>delete/<?=$cluster_center_result->id;?>/tbl_cluster_center" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
								<?php }else{ ?>
									<a onclick="return confirm('Are you sure, you want to activate this record?')" data-toggle="tooltip" title="Activate" href="<? base_url();?>active/<?=$cluster_center_result->id;?>/tbl_cluster_center" class="btn btn-danger btn-sm activate_clas"><i class="mdi mdi-playlist-remove"></i></a>
									<a type="button" title="Edit" data-toggle="tooltip" href="<?php base_url();?>add_cluster_center/<?=$cluster_center_result->id?>"  class="btn btn-info btn-sm" title="Edit"><i class="mdi mdi-table-edit"></i></a>
									<a onclick="return confirm('Are you sure, you want to delete this record?')" data-toggle="tooltip" title="Delete" href="<?php base_url();?>delete/<?=$cluster_center_result->id;?>/tbl_cluster_center" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
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
 <!-- <script>
 $(document).ready(function() {
	$('#example').DataTable();  
 } );
 </script> -->

 

<script>
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
                        filename: 'cluster-center-list',
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
 