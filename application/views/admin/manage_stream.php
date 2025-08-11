<?php include('header.php');?><style>.suggestions {	border: 1px solid #ccc;	max-height: 150px;	overflow-y: auto;	position: absolute;	background: #fff;	width: 93.3%;	z-index: 1000;	display: none;}.suggestion-item {	padding: 5px;	cursor: pointer;}.suggestion-item:hover {	background-color: #f0f0f0;}.input-container {	position: relative;}</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Stream Setting</h4>
                  <p class="card-description">
                    Please enter stream details
                  </p>
                  <form class="forms-sample" name="stream_form" id="stream_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Stream Name *</label>
                      <input type="text" class="form-control" id="stream_name" autocomplete="off" name="stream_name" placeholder="Stream Name" value="<?php if(!empty($single)){ echo $single->stream_name;}?>">
					  <div class="error" id="stream_error"></div>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">					  					  <div id="suggestions" class="suggestions"></div>
                    </div>
                    
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">stream List</h4>
                  <p class="card-description">
                    All list of stream
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Stream Name</th>
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
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
 <script>   $('#stream_name').off('keyup').on('keyup', function() {// clearTimeout(timeout);// timeout = setTimeout(() => {	var stream_name = $(this).val().trim().replace(/\s+/g, ' ');	var $suggestions = $('#suggestions');	var $message = $('#message');	$suggestions.empty().hide(); // Clear previous suggestions	$message.removeClass('success error').hide();	if (stream_name.length > 0) {		$.ajax({			url: '<?= base_url('admin/Ajax_controller/get_similar_streams') ?>',			type: 'POST',			data: { stream_name: stream_name },			dataType: 'json',			success: function(response) {				console.log('Ajax Success:', response);				if (response.status === 'success') {					if (response.streams && response.streams.length > 0) {						$suggestions.empty(); // Clear before appending						$.each(response.streams, function(index, stream) {							// if (stream.stream_name.toLowerCase() === stream_name.toLowerCase()) {								// $message.addClass('error').text('stream name already exists').show();							// }							$suggestions.append('<div class="suggestion-item">' + stream.stream_name + '</div>');						});						$suggestions.show();					} else {						$message.addClass('success').text('Stream name available').show();					}				} else {					$message.addClass('error').text('Error fetching suggestions').show();				}			},			error: function(xhr, status, error) {				console.error('Ajax Error:', xhr, status, error);				$message.addClass('error').text('Error connecting to server').show();			}		});	}//}, 300);});// Click suggestion to fill input$(document).on('click', '.suggestion-item', function() {	$('#stream_name').val($(this).text());	$('#suggestions').empty().hide();	$.ajax({		type: "POST",		url: "<?=base_url();?>admin/Ajax_controller/get_unique_stream",		data:{'stream_name':$("#stream_name").val(),'id':'<?=$id?>'},		success: function(data){			if(data == "0"){				$("#stream_error").html("");				$("#save_btn").show();			}else{				$("#stream_error").html("This stream is already added");				$("#save_btn").hide();			}		},		 error: function(jqXHR, textStatus, errorThrown) {		   console.log(textStatus, errorThrown);		}	});	//$('#message').addClass('error').text('Course name already exists').show();});// Hide suggestions when clicking outside$(document).on('click', function(e) {if (!$(e.target).closest('#stream_name, #suggestions').length) {	$('#suggestions').empty().hide();}});
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#stream_form').validate({
		rules: {
			stream_name: {
				required: true,
			},
		},
		messages: {
			stream_name: {
				required: "Please enter stream name",
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
$("#stream_name").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_stream",
		data:{'stream_name':$("#stream_name").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "0"){
				$("#stream_error").html("");
				$("#save_btn").show();
			}else{
				$("#stream_error").html("This stream is already added");
				$("#save_btn").hide();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});

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
				title:"Manage Stream",
				messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',
				exportOptions: {
                    columns: [0, 1,2],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_stream_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});
</script>
 