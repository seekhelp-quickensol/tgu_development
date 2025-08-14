<?php include('header.php'); ?>

<div class="container-fluid page-body-wrapper">

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-header custom-header">

                            <h4 class="card-title">

                                <?php

                                $text = 'All';

                                if (isset($_GET['payment_status'])) {

                                    if ($_GET['payment_status'] == '0') {

                                        $text = 'Payment Failed';
                                    } elseif ($_GET['payment_status'] == '1') {

                                        $text = 'Payment Success';
                                    }
                                }
                                ?>
                                <?= $text; ?> Certificate Requests
                            </h4>
                        </div>
                        <div class="card-body">

                            <p class="card-description">

                            <p class="card-description">

                                All list

                            </p>

                            <form method="get" name="search_form" id="search_form">

                                <div class="row">

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>From Date</label>

                                            <input type="text" name="from_date" id="from_date" placeholder="From Date" class="form-control datepicker" value="<?php if (isset($_GET['from_date']) && $_GET['from_date'] != "") {
                                                                                                                                                                    echo date('d-m-Y', strtotime($_GET['from_date']));
                                                                                                                                                                } ?>">

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>To Date</label>

                                            <input type="text" name="to_date" id="to_date" placeholder="To Date" class="form-control datepicker" value="<?php if (isset($_GET['to_date']) && $_GET['to_date'] != "") {
                                                                                                                                                            echo date('d-m-Y', strtotime($_GET['to_date']));
                                                                                                                                                        } ?>">

                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group" style="margin-top: 29px;">

                                            <input type="submit" name="show_subject" id="show_subject" class="btn btn-primary btn-sm" value="Search">

                                            <?php if (isset($_GET['from_date']) || isset($_GET['to_date'])) { ?>

                                                <a href="<?= base_url(); ?><?= $this->uri->segment(1); ?>" class="btn btn-warning btn-sm">Reset</a>

                                            <?php } ?>

                                        </div>

                                    </div>

                                </div>

                                <input type="hidden" name="payment_status" id="payment_status" value="<?php if (isset($_GET['payment_status'])) {
                                                                                                            echo $_GET['payment_status'];
                                                                                                        } ?>">

                            </form>

                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                                <thead>

                                    <tr>

                                        <th>Sr. No.</th>

                                        <th>Type</th>

                                        <th>Student Name</th>

                                        <th>Enrollment No</th>

                                        <th>Course Name</th>
                                        <th>Stream Name</th>
                                        <th>Center</th>

                                        <th>Amount</th>

                                        <th>Created On</th>

                                        <th>Payment Status</th>

                                        <th>Transaction ID</th>

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

        if ($this->uri->segment(2) != "") {

            $id = $this->uri->segment(2);
        }



        if (isset($_GET['type']) && $_GET['type'] != '') {

            $type = $_GET['type'];
        } else {

            $type = '0';
        }

        ?>

        <script>
            $(function() {

                $(".datepicker").datepicker({

                    dateFormat: "dd-mm-yy",

                    changeMonth: true,

                    changeYear: true,

                    /*maxDate: "-12Y",

                    minDate: "-80Y",

                    yearRange: "-100:-0"*/

                });

            });

            $(document).ready(function() {

                var type = <?php echo $type; ?>;

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
                    buttons: [{
                            extend: "excelHtml5",

                            messageBottom: 'The information in this table is copyright to The Global University.',

                            exportOptions: {

                                columns: [0, 1, 2, 3, 4, 5, 6, 7],

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

                        "url": "<?= base_url(); ?>admin/Ajax_controller/get_consolidated_student_certificate_requests_list",

                        "type": "POST",

                        "data": {
                            'type': type,
                            'from_date': $('#from_date').val(),
                            'to_date': $('#to_date').val(),
                            'payment_status': $('#payment_status').val()
                        },

                    },

                    "complete": function() {

                        $('[data-toggle="tooltip"]').tooltip();

                    },

                });

            });
        </script>