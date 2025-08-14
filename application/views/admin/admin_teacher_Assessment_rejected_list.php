<?php include('header.php'); ?>

<div class="container-fluid page-body-wrapper">

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">Teacher Assessment Rejected List</h4>
                            <p class="card-description">

                            <p class="card-description">

                                All list of Student

                            </p>

                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>Sr. No.</th>

                                        <th>Student Name</th>
                                        <th>Center Name</th>
                                        <th>Enrollment Number</th>

                                        <th>Course</th>

                                        <th>Stream</th>
                                        
                                        <th>Mode</th>

                                        <th>Semester/year</th>

                                        <th>Assessor Name</th>

                                        <th>Assessor Signature</th>

                                        <th>Reject Remark</th>

                                        <th>Action</th>

                                        <th>View</th>

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





        <div class="modal fade" id="teacherNoteModal" style="background-color: rgba(0, 0, 0, 0.62);" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">

            <div class="modal-dialog" id="order_note_dialog" style="margin-top:125px;width:500px;">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title" id="noteModalLabel" style="display: flex; justify-content: space-between; align-items: center;">

                            <span>Data</span>

                        </h5>

                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="float:none !important; position:absolute;right:10px;top:10px;" onclick="closePopup('teacherNoteModal')">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>

                    <div class="modal-body" id="teacher_table_response"></div>

                </div>

            </div>

        </div>





        <?php include('footer.php');

        $id = 0;

        if ($this->uri->segment(2) != "") {

            $id = $this->uri->segment(2);
        }

        ?>

        <script>
            $(document).ready(function() {

                var oldExportAction = function(self, e, dt, button, config) {

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



                var newExportAction = function(e, dt, button, config) {

                    var self = this;

                    var oldStart = dt.settings()[0]._iDisplayStart;



                    dt.one('preXhr', function(e, s, data) {

                        // Just this once, load all data from the server...

                        data.start = 0;

                        data.length = 2147483647;



                        dt.one('preDraw', function(e, settings) {

                            // Call the original action function 

                            oldExportAction(self, e, dt, button, config);



                            dt.one('preXhr', function(e, s, data) {

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

                    "order": [
                        [0, "desc"]
                    ],

                    buttons: [

                        {

                            extend: "excelHtml5",

                            title: "Teacher Assessment Rejected List",

                            messageBottom: 'The information in this table is copyright to the global University.',

                            exportOptions: {

                                columns: [0, 1, 2, 3, 4, 5, 6, 8, 9],

                                modifier: {

                                    search: 'applied',

                                    order: 'applied'

                                },

                            },

                            action: newExportAction,

                        }

                    ],

                    dom: "Bfrtip",



                    "ajax": {

                        "url": "<?= base_url(); ?>admin/Ajax_controller/get_teacher_assessment_rejected_ajax",

                        "type": "POST",

                    },

                    "complete": function() {

                        $('[data-toggle="tooltip"]').tooltip();

                    },

                });

                //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );



            });









            function showteacherTableDiv(id) {

                $.ajax({

                    url: "<?= base_url(); ?>admin/Ajax_controller/get_teacher_table_data_ajx",

                    method: 'POST',

                    data: {
                        table_id: id
                    },

                    success: function(response) {

                        $('#teacher_table_response').html(response)

                    },

                    error: function(xhr, status, error) {

                        console.error('Error fetching booking details:', error);

                        alert("Error fetching teacher details");

                    }

                });

            }





            function closePopup(id) {

                var exampleModal = $('#' + id).modal('hide');

            }
        </script>