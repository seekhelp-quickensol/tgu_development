<?php include('header.php'); ?>
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Course stream Setting <a href="<?= base_url(); ?>course_stream_relation" class="btn btn-primary mr-2 float-right">Add New</a></h4>
              <p class="card-description">
              <p class="card-description">
                All list of stream
              </p>
              <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Course Category</th>
                    <th>Course Code</th>
                    <th>Faculty</th>
                    <th>Course Type</th>
                    <th>Course Name</th>
                    <th>Stream Name</th>
                    <th>Course Mode</th>
                    <th>Duration</th>
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


              return false;
            });
          });

          // Requery the server with the new one-time export settings
          dt.ajax.reload();
        };

        var table = $('#example1').DataTable({
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
              title: "Course Stream Relation List",
              messageBottom: 'The information in this table is copyright to the global University.',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
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
            "url": "<?= base_url(); ?>admin/Ajax_controller/get_all_course_stream_relation_ajax",
            "type": "POST",
          },
          "complete": function() {
            $('[data-toggle="tooltip"]').tooltip();
          },
        });
        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

      });
    </script>