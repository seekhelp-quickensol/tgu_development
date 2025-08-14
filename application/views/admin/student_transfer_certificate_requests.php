<?php include('header.php'); ?>

<!-- modal starts -->

<button type="button" style="display: none;" id="modal_button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"></button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="approve-form">
          <input type="hidden" name="id" id="transsfer_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Reason Of Transfer:</label>
            <input type="text" class="form-control" name="reason_of_transfer" id="Reason-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Character & Conduct:</label>
            <input type="text" class="form-control" name="character_conduct" id="Character-text">
          </div>
          <input type="submit" name="submit" value="Approve" class="btn btn-primary">
        </form>
      </div>

    </div>
  </div>
</div>

<!-- modal ends  -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-header custom-header">
              <h4 class="card-title"> <?php if (isset($_GET['type']) && $_GET['type'] == '1') {
                                        echo 'Pulp';
                                      } else if (isset($_GET['type']) && $_GET['type'] == '2') {
                                        echo 'B.VOC';
                                      } else {
                                        echo 'Regular';
                                      } ?> Student Transfer Certificate Requests</h4>
            </div>

            <div class="card-body">
              <p class="card-description">
              <p class="card-description">
                All list
              </p>

              <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Student Name</th>
                    <th>Enrollment No</th>
                    <th>Transaction Id</th>
                    <th>Amount</th>
                    <th>Issue Date</th>
                    <!-- <th>PCC</th> -->
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
          buttons: [

            {
              extend: "excelHtml5",
              title: "Student Transfer Certificate Requests",
              messageBottom: 'The information in this table is copyright to The Global University.',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6],
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
            "url": "<?= base_url(); ?>admin/Ajax_controller/get_all_transfer_certificate_requests_list",
            "type": "POST",
            "data": {
              'type': type
            },
          },
          "complete": function() {
            $('[data-toggle="tooltip"]').tooltip();
          },
        });
        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

      });

      function modalOpen(id) {
        document.getElementById("transsfer_id").value = "";
        document.getElementById("transsfer_id").value = id;

        $("#modal_button").trigger("click");

      }

      $("#approve-form").validate({
        rules: {
          reason_of_transfer: {
            required: true,
          },
          character_conduct: {
            required: true,
          }
        },
        messages: {
          reason_of_transfer: {
            required: "Please enter reason of transfer",
          },
          character_conduct: {
            required: "Please enter character & conduct",
          }

        }
      });
    </script>