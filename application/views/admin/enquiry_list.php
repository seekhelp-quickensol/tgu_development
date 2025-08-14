<?php include('header.php');?>

<link rel="stylesheet" src="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Enquiry List</h4>

                  <p class="card-description">

                    All list of Enquiry

                  </p>

				   <form class="mb-3" method="get">

				  <div class="row">

					

				  <div class="col-md-4">

				  <input type="text" autocomplete="off" name="start_date" id="start_date" class="form-control datepicker" placeholder="Start Date" value="<?php if(isset($_GET['start_date'])){ echo $_GET['start_date'];}?>">

				  </div>

				  

				  <div class="col-md-4">

				  <input type="text" autocomplete="off" name="end_date" id="end_date" class="form-control datepicker" placeholder="End Date" value="<?php if(isset($_GET['end_date'])){ echo $_GET['end_date'];}?>">

				  </div>

				  

				  <div class="col-md-4">

				  <button type="submit" class="btn btn-primary search_button">Search</button>

				  </div>

				  </div>

				  </form>

                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

				<thead>

					<tr>

						<th>Sr. No.</th>

						<th>Date</th>

						<th>Name</th>

						<th>Mobile Number</th>

						<th>Email</th>

						<th>Country</th>

						<th>State</th>

						<th>Query</th> 

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

if($this->uri->segment(2) !=""){

	$id = $this->uri->segment(2);

}

?>



<script>

$( function() {

	$( ".datepicker" ).datepicker({

		dateFormat:"dd-mm-yy",

		changeMonth:true,

		changeYear:true,

		/*maxDate: "-12Y",

		minDate: "-80Y",

		yearRange: "-100:-0"*/

	});

} ); 

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

				messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',

				exportOptions: {

                    columns: [0, 1,2,3,4,5,6,7],

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

			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_enquiry_ajax",

			"type": "POST",

			"data":{'start_date':$("#start_date").val(),'end_date':$("#end_date").val()},

		},	

		"complete": function() {

			$('[data-toggle="tooltip"]').tooltip();			

		},

    });

    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

	

});

</script>

 