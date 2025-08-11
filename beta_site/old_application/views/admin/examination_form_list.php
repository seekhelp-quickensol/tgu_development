<?php include('header.php');?>
<style>
	.row-btns{
		height:48px !important;
		line-height:25px;
		color:#fff !important;
	}
</style>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                   <h4 class="card-title">Success Examination List</h4><p class="card-description">

                 <p class="card-description">

                    <!-- All list of examination form  -->

                  </p>

					 <div class="row">

						<div class="col-md-3">

						<div class="form-group">

						  <label for="exampleInputUsername1">Month *</label>

						  <select class="form-control filter-change js-example-basic-single select2_single" id="month" name="month">

						  <option value="">Select Month</option>

						  <option value="January" <?php if(isset($_GET['month']) && $_GET['month'] == "January"){?>selected="month"<?php }?>>January</option>

						  <option value="February" <?php if(isset($_GET['month']) && $_GET['month'] == "February"){?>selected="month"<?php }?>>February</option>

						  <option value="March" <?php if(isset($_GET['month']) && $_GET['month'] == "March"){?>selected="month"<?php }?>>March</option>

						  <option value="April" <?php if(isset($_GET['month']) && $_GET['month'] == "April"){?>selected="month"<?php }?>>April</option>

						  <option value="May" <?php if(isset($_GET['month']) && $_GET['month'] == "May"){?>selected="month"<?php }?>>May</option>

						  <option value="June" <?php if(isset($_GET['month']) && $_GET['month'] == "June"){?>selected="month"<?php }?>>June</option>

						  <option value="July" <?php if(isset($_GET['month']) && $_GET['month'] == "July"){?>selected="month"<?php }?>>July</option>

						  <option value="August" <?php if(isset($_GET['month']) && $_GET['month'] == "August"){?>selected="month"<?php }?>>August</option>

						  <option value="September" <?php if(isset($_GET['month']) && $_GET['month'] == "September"){?>selected="month"<?php }?>>September</option>

						  <option value="October" <?php if(isset($_GET['month']) && $_GET['month'] == "October"){?>selected="month"<?php }?>>October</option>

						  <option value="November" <?php if(isset($_GET['month']) && $_GET['month'] == "November"){?>selected="month"<?php }?>>November</option>

						  <option value="December" <?php if(isset($_GET['month']) && $_GET['month'] == "December"){?>selected="month"<?php }?>>December</option>

						  </select>

						</div>

						</div>

						<div class="col-md-3">

						<div class="form-group">

						  <label for="exampleInputUsername1">Year*</label>

						  <select class="form-control filter-change js-example-basic-single select2_single" id="year" name="year">

						  <option value="">Select Year</option>

						  <option value="2020" <?php if(isset($_GET['year']) && $_GET['year'] == "2020"){?>selected="month"<?php }?>>2020</option>

						  <option value="2021" <?php if(isset($_GET['year']) && $_GET['year'] == "2021"){?>selected="month"<?php }?>>2021</option>

						  <option value="2022" <?php if(isset($_GET['year']) && $_GET['year'] == "2022"){?>selected="month"<?php }?>>2022</option>

						  <option value="2023" <?php if(isset($_GET['year']) && $_GET['year'] == "2023"){?>selected="month"<?php }?>>2023</option>

						  </select>

						</div>

						</div>

						<div class="col-md-3 d-flex align-items-center">

						<div class="form-group mt-1"><br>

							<a href="<?=base_url();?>examination_form_list" class="btn btn-primary row-btns">All</a>

						</div>

						</div>

					</div>

				    <form method="post" name="activation" id="activationForm">
				        
                    Check All <input type="checkbox" id="toggle-all"><br><br>

					<input type="submit" name="activate_hall_ticket" value="Activate" class="btn btn-primary" onclick="activateHallTicket()">

					<div class="clearfix"></div><br>

                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

				<thead>

					<tr>

						<th>Sr. No.</th> 

						<th>Select</th>

						<th>Action</th> 

						<th>Session</th>  

						<th>Student Name</th>

						<th>Enrollment No</th>

						<th>Center Name</th>

						<th>Transaction No.</th>

						<th>Exam Type</th> 

						<th>Hallticket Status</th> 

						<th>Date of Birth</th>

						<th>Date</th>

						<th>Payment Status</th> 

						<th>Year/Sem</th>

						<th>Father Name</th>

						<th>Mother Name</th>

						<th>Mobile Number</th>

						<th>Email</th> 

						<th>Course Name</th>

						<th>Stream Name</th> 

						<th>Remark</th> 

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

$(".filter-change").change(function(){

	window.location.href="<?=base_url();?>examination_form_list?month="+$("#month").val()+"&year="+$("#year").val();

});

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
				title:"Success Examination Form List",

				messageBottom: 'The information in this table is copyright to the global University.',

				exportOptions: {

                    columns: [0,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],

                    modifier: {

						search: 'applied',

						order: 'applied'

					},

					format: {

                        body: function(data, row, column, node) {

                            var ret =  column === 2 ? "\0" + data : data;

                            //ret = ret.replace('&amp;', '&')

                            return ret;

                        }

                    },

                },

			/*	customizeData: function(data) {

					for(var i = 0; i < data.body.length; i++) {

					  for(var j = 0; j < data.body[i].length; j++) {

						data.body[i][j] = '\u200C' + data.body[i][j];

					  }

					}

				},*/

                action: newExportAction,

			}

		],

		dom:"Bfrtip",

		

		"ajax":{

			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_examination_form_list",

			"type": "POST",

			"data":{'month':$("#month").val(),'year':$("#year").val()},

		},	

		"complete": function() {

			$('[data-toggle="tooltip"]').tooltip();			

		},

    });

    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
});
</script>

<script>
function activateHallTicket() {
    var checkboxes = document.querySelectorAll('#activationForm .selecter:checked');
    if (checkboxes.length === 0) {
        alert("Please select at least one checkbox to activate.");
        return;
    }
    document.activation.submit();
}

    // JavaScript to handle Check All/Uncheck All functionality
    document.getElementById('toggle-all').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('.selecter');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>


 