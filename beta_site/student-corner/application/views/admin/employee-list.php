<?php include('header.php');?>
<?php include('sidebar.php');?>
<style>
    #example_wrapper {
        width: fit-content;
    }
</style>
<section>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <?php if($this->uri->segment(2) == ''){?>



                    <div class="col-md-12">
                    <div class="customer_table card-form master-table">
                        <h2 class="table-title add_customer">Employee List </h2>
                        <hr>
                        <table id="example" class="table table-bordered table-hover table-striped" style="width:100%">
                            <thead class="">
                            <tr class="list_tr">
                                <th class="text-center" scope="col">Sr No</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Parent Name</th>
                                <th scope="col">Mobile Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">Employee ID</th>
                                <th scope="col">Password</th>
                                <th scope="col">Department</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Blood Group </th>
                                <th scope="col">Parent Mobile Number</th>
                                <th scope="col">Date Of Joining</th>
                                <th scope="col">Contract End Date</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Adhar Card</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($all)){
                                    $i = 1;
                                    foreach($all as $all_resutl){?>
                                <tr>
                                <td><?=$i++;?></td>
                                <td> <?=$all_resutl->first_name;?></td>
                                <td> <?=$all_resutl->last_name;?></td>
                                <td> <?=$all_resutl->parent_name?></td>
                                <td> <?=$all_resutl->mobile_number?></td>
                                <td> <?=$all_resutl->email?></td>
                               
                                <td> <?=$all_resutl->employee_id?></td>
                                <td> <?=$all_resutl->org_password?></td>
                                <td> <?=$all_resutl->department_name?></td>
                                <td> <?=$all_resutl->designation?></td>
                                <td> <?=$all_resutl->blood_group?></td>
                                <td> <?=$all_resutl->parent_mobile_number?></td>
                                
                                <td> <?=$all_resutl->date_of_joining?></td>
                                <td> <?=$all_resutl->contract_end_date?></td>
                                <td>  <a target=_blank class="btn btn-primary"  href="<?=base_url();?>admin_assets/images/employee_document/<?=$all_resutl->photo?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                                <a class="btn btn-primary" download="<?=$all_resutl->photo?>" href="<?=base_url();?>admin_assets/images/employee_document/<?=$all_resutl->photo?>" title="Download Image"><i class="fa fa-download" aria-hidden="true"></i><img  >
                                    </a>
                                  </td>
                                <td>  <a target=_blank class="btn btn-primary"  href="<?=base_url();?>admin_assets/images/employee_document/<?=$all_resutl->adhar_card?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                            
                                <a class="btn btn-primary" download="<?=$all_resutl->adhar_card?>" href="<?=base_url();?>admin_assets/images/employee_document/<?=$all_resutl->adhar_card?>" title="Download Image"><i class="fa fa-download" aria-hidden="true"></i><img  >
                                    </a></td>
                                    <td class="action_btns">
                                <a title="Edit" class="btn btn-primary"  href="<?=base_url();?>add-employee/<?=$all_resutl->id?>" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>            
                                <a title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete this record?');"  href="<?=base_url();?>delete/<?=$all_resutl->id?>/tbl_employee/Employee" class="btn btn-info"> <i class="fa fa-trash"></i></a>
                             <?php if($all_resutl->status == '1'){?>
                                     <a class="btn btn-secondary" title="Inactive" onclick="return confirm('Are you sure to inactive this record?');" href="<?=base_url();?>inactive/<?=$all_resutl->id?>/tbl_employee/Employee"><i class="fa fa-times" aria-hidden="true"></i></a>
                                <?php }else{ ?> 
                                     <a  class="btn btn-success" title="Active" onclick="return confirm('Are you sure to active this record?');" href="<?=base_url();?>active/<?=$all_resutl->id?>/tbl_employee/Employee" class="btn btn-info"><i class="fas fa-check-circle"></i></a>
                                <?php }?>                                       
                                    </td>
                                </tr>
                                <?php } } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            <?php }?>
        </div>
    </div>
    </div>
</section>
<?php include('footer.php');?>
<script>
    $(function () {
        $("form[name='add-category-level-1']").validate({
            rules: {
                designation: "required"
            },
            messages: {
                designation: "Please enter designation."
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
   
    var oldExportAction = function (self, e, dt, button, config) {
        if (button[0].className.indexOf('buttons-excel') >= 0) {
            if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
                $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
            } else {
                $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
            }
        } else if (button[0].className.indexOf('buttons-print') >= 0) {
            $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
        }
    };
    var newExportAction = function (e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
        dt.one('preXhr', function (e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
            dt.one('preDraw', function (e, settings) {
                // Call the original action function 
                oldExportAction(self, e, dt, button, config);
                dt.one('preXhr', function (e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    };
    var table = $('#example').DataTable({
        "lengthChange": false,
        "processing": false,
        "serverSide": false,
        "responsive": true,
        "cache": false,
        "order": [
            [0, "asc"]
        ],
        buttons: [
            {
                extend: "excelHtml5",
                messageBottom: '',
                exportOptions: {
                    columns: [0, 1,2,3,4,5,6,7,8,9,10,11,12,13],
                    modifier: {
                        search: 'applied',
                        order: 'applied'
                    },
                },
            }
        ],
        dom: "Bfrtip",
        /*"ajax":{
        	"url" : "<?=base_url();?>Ajax_controller/get_all_designation_list_ajx",
        	"type": "POST",
        },*/
        "complete": function () {
            $('[data-toggle="tooltip"]').tooltip();
        },
    });
    $('#employeelist').closest('.cust-dropdown').show();
    $('#employeelist').addClass('active_red');
</script>