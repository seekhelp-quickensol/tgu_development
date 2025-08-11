<?php include('header.php')?>
<style>
    .dataTables_wrapper{
        overflow-x:scroll;
    }
</style>
    <div class="row wrapper border-bottom white-bg page-heading">
        
    </div>
    <div class="mt_20"></div>
        <div class="card-body animated fadeInUp">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                             <h4 class="card-title">SEO Setup List</h4>

                            <form id="exampl" method="POST" >
                                <div class="form-group">
                                    <label for="" class="lable_style">Url Name<span style="color:red" > *</span></label>
                                    <input type="text" id="url" name="url" value="<?php if(!empty($single_seo_data)){ echo $single_seo_data->url;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Url Name">
                                </div>
                                <div class="form-group">
                                     <label for="" class="lable_style">Meta Title<span style="color:red" > *</span></label>
                                    <input type="text" id="meta_title" name="meta_title" value="<?php if(!empty($single_seo_data)){ echo $single_seo_data->meta_title;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Meta Title">
                                </div>
                                <div class="form-group">
                                     <label for="" class="lable_style">Keyword<span style="color:red" > *</span></label>
                                    <input type="text" id="keyword" name="keyword" value="<?php if(!empty($single_seo_data)){ echo $single_seo_data->keyword;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Keyword">
                                   
                                </div>
                                <div class="form-group">
                                     <label for="" class="lable_style">Meta Description<span style="color:red" > *</span></label>
                                    <input type="text" id="meta_description" name="meta_description" value="<?php if(!empty($single_seo_data)){ echo $single_seo_data->meta_description;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Meta Description">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="hidden_id" name="hidden_id" value="<?php if(!empty($single_seo_data)){ echo $single_seo_data->id;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Category Name">
                                </div>
                            
                                <div class="font-weight-600">
                                    <button style="height: 48px; font-size: 16px;" type="submit" class="btn btn-danger btn-block"> Submit</button>                            
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
              
            <div class="col-lg-8">
                 <div class="card">
                        <div class="card-body">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="example">
                    <thead>
                        <tr class="thead-light">   
                            <th>Sr. No.</th>
                            <th>Url Name</th>
                            <th>Meta Title</th>                          
                            <th>Keyword</th>                         
                            <th>Meta Description</th>
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
<?php include('footer.php');?>
<script>
    $(document).ready(function() { 
        
        var oldExportAction = function (self, e, dt, button, config) {
            if (button[0].className.indexOf('buttons-excel') >= 0) {
                if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
                    $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
                }
                else {
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
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "cache": false,
            "order": [[0, "desc" ]],

            buttons:[
                
                {
                    extend: "excelHtml5",
                    //title: 'All Order '+$("#start_date").val()+' '+$("#end_date").val(),
                    title:"SEO Setup List",
                    messageBottom: '',
                    exportOptions: {
                        columns: [0, 1,2,3,4,5],
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        },
                    },
                    action: newExportAction,
                }
            ],
            dom:"Bfrtip",
            
            "ajax":{
                "url" : "<?=base_url();?>admin/Ajax_controller/get_seo_setup_list",
                "type": "POST",
            },  
            "complete": function() {
                $('[data-toggle="tooltip"]').tooltip();         
            },
        });
        table.buttons().container().appendTo( '#example_wrapper .col-lg-8:eq(0)' );
        
    });


        $(document).ready(function () {     
            jQuery.validator.addMethod("validate_email", function(value, element) {
                if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
                    return true;
                }else {
                    return false;
                }
            }, "Please enter a valid Email.");  
            $('#exampl').validate({

                rules: {
                    url:{
                        required: true,
                    },
                    meta_title:{
                        required:true
                    },
                    keyword:{
                        required:true
                    },
                    meta_description:{
                        required:true
                    },
                    
                },
                messages: {
                    url: {
                        required: "Please enter url name",
                    },
                    meta_title: {
                        required: "Please enter meta title",
                    },
                    keyword: {
                        required: "Please enter keyword",
                    },
                    meta_description: {
                        required: "Please enter meta description",
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
</script>


