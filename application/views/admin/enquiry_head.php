<?php include('header.php');?>
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>

</style>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Head Setting</h4>
                  <p class="card-description">
                    Please enter head details
                  </p>
                  <form class="forms-sample" name="course_form" id="course_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Head Name *</label>
                      <input type="text" class="form-control" id="head_name" name="head_name" placeholder="Head Name" value="<?php if(!empty($single)){ echo $single->head_name;}?>">
					  <div class="error" id="course_error"></div>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">
                    </div>
                    </div> 
                    
                    <div class="col-md-12">
                    <div class="form-group">
                    <button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
                    </div>
                    </div>
                  </form>
                </div>
              </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Head List</h4>
                  <p class="card-description">
                    All list of Head
                  </p>
				  
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Head Name</th> 
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="">
					
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
	$('#course_form').validate({
		rules: {
			head_name: {
				required: true,
			}, 
		},
		messages: {
			head_name: {
				required: "Please enter head name",
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
$("#course_name").keyup(function(){  
	$.ajax({
		type: "POST",
		url: "<?=base_url();?>admin/Ajax_controller/get_unique_course",
		data:{'course_name':$("#course_name").val(),'id':'<?=$id?>'},
		success: function(data){
			if(data == "0"){
				$("#course_error").html("");
				$("#save_btn").show();
			}else{
				$("#course_error").html("This course is already added");
				$("#save_btn").hide();
			}
		},
		 error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
});

/*$(document).ready(function() {
	$('#example').DataTable({
		"processing": true,
		"serverSide": true,
		"cache": false,
		"order": [[0, "asc" ]],
		dom:"Bfrtip",
		buttons: [
			{
				extend: 'copyHtml5',
				exportOptions: {
				 columns: ':contains("Office")'
				}
			},
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5'
		],
		"ajax":{
			"url": "<?=base_url();?>admin/Ajax_controller/get_all_course_ajax",
			"type": "POST",
		},		
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    }); 
});
*/


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
                    columns: [0, 1, ],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_campus_enq_head_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});


$(document).ready(function () {
     $('#description').summernote({
         height: 400,
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
                $('#description').summernote("insertImage", image);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
});

</script>
  