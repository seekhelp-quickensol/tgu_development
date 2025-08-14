<?php include('header.php');?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
			<?php if($this->session->userdata('admin_id') != '19'){ ?>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
			  <div class="card-header custom-header">
			  <h4 class="card-title">Vendor Bill Setting</h4>
              </div>

                <div class="card-body">
                  
                  <p class="card-description">
                    Please enter vendor bill details
                  </p>
                  <form class="forms-sample" name="vendor_form" id="vendor_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Vendor Name *</label>
                      <select class="form-control js-example-basic-single select2_single" id="vendor_id" name="vendor_id">
                          <option value="">Select Vendor</option>
                          <?php if(!empty($vendor)){ foreach($vendor as $vendor_result){?>
                          <option value="<?=$vendor_result->id?>"><?=$vendor_result->vendor?></option>
                          <?php }}?>
                      </select>
                      <div class="error" id="session_error"></div>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Date</label>
                      <input type="text" class="form-control datepicker" id="date" name="date" placeholder="Date" value="<?php if(!empty($single)){ echo date("d-m-Y",strtotime($single->date));}?>">
					</div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Amount</label>
                      <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php if(!empty($single)){ echo $single->amount;}?>">
					</div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Item Name (, separated)</label>
                      <input type="text" class="form-control" id="item" name="item" placeholder="Item" value="<?php if(!empty($single)){ echo $single->item;}?>">
					</div>
					<div class="form-group">
                      <label for="exampleInputUsername1">Remark</label>
                      <textarea class="form-control" id="remark" name="remark" placeholder="Remarks"></textarea><?php if(!empty($single)){ echo $single->remark;}?></textarea>
					</div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Bill</label>
                      <input type="file" class="form-control" id="userfile" name="userfile">
                      <input type="hidden" class="form-control" id="old_userfile" name="old_userfile" value="<?php if(!empty($single)){ echo $single->bill;}?>">
					</div> 
                      <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
			<?php } ?>
            <div class="col-md-6 grid-margin stretch-card">
			<div class="card">
			  <div class="card-header custom-header">
			  <h4 class="card-title">Vendor Bill List</h4>
              </div>

                <div class="card-body">
                  
                  <p class="card-description">
                  </p>

							<form method="get">

								<div class="row">

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputUsername1">From Date</label>

											<input type="text" class="form-control datepicker" id="from_date" name="from_date" placeholder="From Date" value="">

										</div>

									</div>

									<div class="col-md-4">

										<div class="form-group">

											<label for="exampleInputUsername1">To Date</label>

											<input type="text" class="form-control datepicker" id="to_date" name="to_date" placeholder="To Date" value="">

										</div>

									</div>

									<div class="col-md-4 d-flex align-items-center"> 

										<input type="submit" name="search" class="btn btn-primary row-btns" value="Search">



									</div>

								</div>

							</form>

							<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

								<thead>

									<tr>

										<th>Sr. No.</th>

										<th>Vendor Name</th>

										<th>Item</th>

										<th>Contact Number</th>

										<th>Email</th>

										<th>Amount</th>

										<th>Date</th>
									    <th>Remark</th>

										<th>Bill</th>

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
		</div>
		</div>
		<input type="hidden" id="from_date" value="<?php if(isset($_GET['from_date'])){echo $_GET['from_date'];}?>">
		<input type="hidden" id="to_date"  value="<?php if(isset($_GET['to_date'])){echo $_GET['to_date'];}?>">

<?php include('footer.php');
		$id = 0;
		if ($this->uri->segment(2) != "") {
			$id = $this->uri->segment(2);
		}
		?>

		<script>
			$(document).ready(function() {

				jQuery.validator.addMethod("validate_email", function(value, element) {

					if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

						return true;

					} else {

						return false;

					}

				}, "Please enter a valid Email.");

				$('#vendor_form').validate({
					ignore: ":hidden:not(select)",
					rules: {

						vendor_id: {

							required: true,

						},

						date: {

							required: true,

						},

						amount: {

							required: true,

						},

						<?php if (empty($single)) { ?>

							userfile: {

								required: true,

							},

						<?php } ?>

					},

					messages: {

						vendor_id: {

							required: "Please select vendor",

						},

						date: {

							required: "Please select date",

						},

						amount: {

							required: "Please enter amount",

						},

						<?php if (empty($single)) { ?>

							userfile: {

								required: "Please upload bill",

							},

						<?php } ?>

					},

					errorElement: 'span',

					errorPlacement: function(error, element) {

						error.addClass('invalid-feedback');

						element.closest('.form-group').append(error);

					},

					highlight: function(element, errorClass, validClass) {

						$(element).addClass('is-invalid');

					},

					unhighlight: function(element, errorClass, validClass) {

						$(element).removeClass('is-invalid');

					}

				});

			});



			$('#vendor_id').on('change', function() {
			$('#vendor_id').valid();
		});

		

			$("#session_name").keyup(function() {

				$.ajax({

					type: "POST",

					url: "<?= base_url(); ?>admin/Ajax_controller/get_unique_session",

					data: {
						'session_name': $("#session_name").val(),
						'id': '<?= $id ?>'
					},

					success: function(data) {

						if (data == "0") {

							$("#session_error").html("");

							$("#save_btn").show();

						} else {

							$("#session_error").html("This session is already added");

							$("#save_btn").hide();

						}

					},

					error: function(jqXHR, textStatus, errorThrown) {

						console.log(textStatus, errorThrown);

					}

				});

			});



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
							title:"Vendor Bill List",
							messageBottom: 'The information in this table is copyright to the global University.',

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

						"url": "<?= base_url(); ?>admin/Ajax_controller/get_all_account_vendor_bill_ajax",

						"type": "POST",

						"data": {
							'from_date':$("#start_get").val(),
							'to_date': $("#start_get").val()
						},

					},

					"complete": function() {

						$('[data-toggle="tooltip"]').tooltip();

					},

				});

				//table.buttons().container().appendTo( '#example_wrapper:eq(0)' );



			});
		</script>