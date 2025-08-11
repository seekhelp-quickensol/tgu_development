<?php include('header.php');?>
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
	@keyframes loading {
		0%, 20% {
			opacity: 1; 
		}
		40%, 60% {
			opacity: 0; 
		}
		80%, 100% {
			opacity: 1;
		}
	}

	#loader span {
		display: inline-block;
		width: 8px; 
		height: 8px;
		background-color: #000; 
		border-radius: 50%;
		margin: 0 2px;
		animation: loading 1.4s infinite; 
	}

	#loader .dot1 {
		animation-delay: 0s;
	}

	#loader .dot2 {
		animation-delay: 0.2s;
	}

	#loader .dot3 {
		animation-delay: 0.4s;
	}

	#loader .dot4 {
		animation-delay: 0.6s;
	}
	.close_crop_model{
		padding: 6px 44px !important;
	}
</style>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card priviledge-form">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Help Setup Setting</h4>
                  <p class="card-description">
                    Please enter help setup details
                  </p>
                  <form class="forms-sample" name="help_setup_form" id="help_setup_form" method="post" enctype="multipart/form-data">
					<div class="row">
							<div class="col col-md-12">
								<div class="form-group">
									<label class=" form-control-label">Question * </label>
									<input type="text" name="question" id="question" class="form-control" Placeholder="Enter Question" value="<?php if(!empty($single)){ echo $single->question;}?>"> 
                                </div>
							</div>
						</div>
						<div class="row">
							<div class="col col-md-12">
								<div class="form-group">
									<label class=" form-control-label">Short Description *</label>
									<input type="text" name="short_description" id="short_description" Placeholder="Enter Short Description" class="form-control" value="<?php if(!empty($single)){ echo $single->short_description;}?>"> 
								</div>	
							</div>
						</div>

                        <div class="row">
							<div class="col col-md-12">
								<div class="form-group">
									<label class=" form-control-label">Long Description *</label>
								    <textarea class="form-control" id="long_description" name="long_description"><?php if(!empty($single)){ echo $single->long_description;}?></textarea>
                                </div>	
							</div>
						</div>

						<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Help Setup List</h4>
                  <p class="card-description">
                    All list of Help Setup
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					 <tr>
						<th>Sr.No</th>
						<th>Question</th> 
						<th>Short Description</th> 
						<th>Long Description</th> 
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
 <script>
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#help_setup_form').validate({
		ignore: ":hidden:not(#long_description),.note-editable.panel-body",
		rules: {
			question: "required", 		
			short_description: "required", 	
			long_description: "required",	
		},
		messages: {
			question: "Please enter question", 
			short_description: "Please enter short description",
			long_description: "Please enter long description",
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
				title:"Help Setup List",
				messageBottom: 'The information in this table is copyright to The Global University.',
				exportOptions: {
                    columns: [0,1,2],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_question_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});	
</script>
 

<script>
$(document).ready(function () {
     $('#long_description').summernote({
         height: 200,
         callbacks: {
            onImageUpload: function (image) {
                 sendFile(image[0]);
             }
         } 
     });

	 function sendFile(image) {
        var data = new FormData();
        data.append("image", image);
        //if you are using CI 3 CSRF
        data.append("<?= $this->security->get_csrf_token_name() ?>", "<?= $this->security->get_csrf_hash() ?>");
        $.ajax({
            data: data,
            type: "POST",
            url: "<?=base_url()?>admin/Ajax_controller/upload_news_image",
            cache: false,
            contentType: false,
            processData: false,
            success: function (url) {
                var image = url;
                $('#long_content').summernote("insertImage", image);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
	  
	 
  });    
     </script>