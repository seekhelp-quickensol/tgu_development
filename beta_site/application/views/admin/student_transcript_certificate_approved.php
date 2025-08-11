<?php include('header.php');?>



    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                   <h4 class="card-title">Student Transcript Payment Approved List</h4><p class="card-description">

                 <p class="card-description">

                    All list  

                  </p>

                  <form method="post" name="send_to_print" id="send_to_print" action="<?=base_url();?>student_transcript_send_to_print">

						      <!-- <input type="checkbox" name="select_all" id="select_all">

										<label>Select All</label> -->

                  <input type="checkbox" id="toggle-all">

						<button type="submit" name="send_btn" class="btn btn-primary send_button" value="send_btn" style="margin-bottom:10px;">Send to Print</button>

                  <div id="print_error_message" style="color: red;margin-bottom:10px;"></div>

                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

				<thead>

					<tr>

						<th>Sr. No.</th>

						<th>Send to Print</th>
						<th>Print Count</th>

						<th>Username</th>

						<th>Password</th>

						<th>Student Name</th>

						<th>Center Name</th>

						<th>Enrollment No</th>

						<th>Transaction ID</th>

						<th>Payment Date</th>  

						<th>Action</th>

					</tr>

				</thead>

				<tbody>

					

				</tbody>

			</table>

</form>

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
				title:"Student Transcript Payment Approved List",

				messageBottom: 'The information in this table is copyright to the global University.',

				exportOptions: {

                    columns: [0,2,3,4,5,6,7,8,9],

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

			"url" : "<?=base_url();?>admin/Ajax_controller/get_student_transcript_certificate_approved",

			"type": "POST",

		},	

		"complete": function() {

			$('[data-toggle="tooltip"]').tooltip();			

		},

    });

    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

	

});



$(document).ready(function () {		

	$('#send_to_print').validate({

		ignore: [],

		rules: {

			'print_id[]': {

				required: true,

			},

		},

		messages: {

			'print_id[]': {

				required: "Please select at least one certificate",

			},

		},

		errorElement: 'span',

		errorPlacement: function (error, element) {

			error.addClass('invalid-feedback');

			element.closest('.form-group').append(error);

			$('#print_error_message').text(error.text()); // Set the error message in the <span> element

		},

		highlight: function (element, errorClass, validClass) {

			$(element).addClass('is-invalid');

		},

		unhighlight: function (element, errorClass, validClass) {

			$(element).removeClass('is-invalid');

		},

	});

});



$(document).ready(function(){

  // Toggle all checkboxes

  $('#toggle-all').click(function(){

    $('.checkbox').prop('checked', $(this).prop('checked'));

  });

  

  // Toggle the "Toggle All" checkbox if all checkboxes are checked or unchecked

  $('.checkbox').click(function(){

    if($('.checkbox:checked').length == $('.checkbox').length){

      $('#toggle-all').prop('checked', true);

    } else {

      $('#toggle-all').prop('checked', false);

    }

  });

});

</script>

 