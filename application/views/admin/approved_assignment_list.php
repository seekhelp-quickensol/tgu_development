<?php include('header.php'); ?>

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Approved Assignment List</h4>
                            <p class="card-description">All list of Student</p>

                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Center Name</th>
                                        <th>Student Name</th>
                                        <th>Enrollment Number</th>
                                        <th>Course</th>
                                        <th>Stream</th>
                                        <th>Year/Sem</th>
                                        <th>Title</th>
                                        <th>File</th>
                                        <th>Action</th>
                                        <th>Reject & Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loaded via AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="selfNoteModal" style="background-color: rgba(0, 0, 0, 0.62);" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
            <div class="modal-dialog" id="order_note_dialog" style="margin-top:125px;width:500px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="noteModalLabel" style="display: flex; justify-content: space-between; align-items: center;">
                            <span>Data</span>
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="position:absolute; right:10px; top:10px;" onclick="closePopup('selfNoteModal')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="self_table_response"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include('footer.php'); 
    $id = ($this->uri->segment(2) != "") ? $this->uri->segment(2) : 0;
?>

<script>
$(document).ready(function() {

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
            data.start = 0;
            data.length = 2147483647;

            dt.one('preDraw', function (e, settings) {
                oldExportAction(self, e, dt, button, config);

                dt.one('preXhr', function (e, s, data) {
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });

                setTimeout(dt.ajax.reload, 0);
                return false;
            });
        });

        dt.ajax.reload();
    };

    var table = $('#example').DataTable({
        lengthChange: false,
        processing: true,
        serverSide: true,
        responsive: true,
        cache: false,
        order: [[0, "desc"]],
        dom: "Bfrtip",
        buttons: [
            {
                extend: "excelHtml5",
                title: "Self Assessment Pending List",
                messageBottom: "The information in this table is copyright to the global University.",
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8,9,10],
                    modifier: {
                        search: 'applied',
                        order: 'applied'
                    }
                },
                action: newExportAction
            }
        ],
        ajax: {
            url: "<?= base_url(); ?>admin/Ajax_controller/get_all_approved_assignment_ajax",
            type: "POST"
        },
        complete: function() {
            $('[data-toggle="tooltip"]').tooltip();
            validateRejectRemark();
        }
    });

});

function showselfTableDiv(id) {
    $.ajax({
        url: "<?= base_url(); ?>admin/Ajax_controller/get_self_table_data_ajx",
        method: 'POST',
        data: { table_id: id },
        success: function(response) {
            $('#self_table_response').html(response);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching booking details:', error);
            alert("Error fetching self details");
        }
    });
}

function closePopup(id) {
    $('#' + id).modal('hide');
}

// Optional validation function (commented out)
/*
function validate(id) {
    var input_value = $("#reject_remark_" + id).val();
    if (input_value == "") {
        alert("Please enter a reject remark.");
        $("#reject_remark_" + id).attr('required', true);
        return false;
    } else {
        return true;
    }
}
*/
</script>
