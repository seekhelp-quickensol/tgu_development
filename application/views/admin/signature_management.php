<?php include('header.php');?>
<link rel="stylesheet" href="<?=base_url();?>back_panel/css/croppie.css">
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
                  <h4 class="card-title">Signature Setting</h4>
                  <p class="card-description">
                    Please enter Signature details
                  </p>
                  <form class="forms-sample" name="id_form" id="id_form" method="post" enctype="multipart/form-data">
					<div class="row">
							<div class="col col-md-12">
								<div class="form-group">
									<label class=" form-control-label">Signature Name and Use For * </label>
									<input type="text" name="name_of_signature" id="name_of_signature" class="form-control" value="<?php if(!empty($single)){ echo $single->name;}?>"> 
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col col-md-12">
								<div class="form-group">
									<label class=" form-control-label">Display Text Below Sign *</label>
									<input type="text" name="dispalay_signature" id="dispalay_signature" class="form-control" value="<?php if(!empty($single)){ echo $single->dispalay_signature;}?>"> 
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col col-md-12">
								<div class="form-group">
									<label class=" form-control-label">Signature For</label>
									<select name="signature_for" id="signature_for" class="form-control">
										<option value="0" <?php if(!empty($single) && $single->signature_for == "0"){?>selected="selected"<?php }?>>Regular</option>
										<option value="1" <?php if(!empty($single) && $single->signature_for == "1"){?>selected="selected"<?php }?>>Blended</option>
									</select>	
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col col-md-12">
								<div class="form-group">
									<label class=" form-control-label">Signature *
									<?php if(!empty($single) && $single->signature != ""){?>
										<a href="<?=$this->Digitalocean_model->get_photo('certificate_signature/'.$single->signature)?>" target="_blank" class="btn btn-info btn-small">View</a>
									<?php }?>
									</label>
									<input accept=".jpeg,.png,.jpg" type="file" name="signature" id="signature" class="form-control">
									<input type="hidden" name="old_signature" id="old_signature" class="form-control" value="<?php if(!empty($single)){ echo $single->signature;}?>">
									<input type="hidden" name="id" id="id" class="form-control" value="<?php if(!empty($single)){ echo $single->id;}?>">
									<input type="hidden" name="hidden_image" class="form-control" style="vertical-align:middle" id="hidden_image">
								</div>
							</div>
						</div> 
						<div id="loader" style="display: none; text-align: center; margin-bottom: 20px;">
							<span class="dot dot1"></span><span class="dot dot2"></span><span class="dot dot3"></span><span class="dot dot4"></span>
						</div>
						<button type="submit" id="save_btn" class="btn btn-primary mr-2">Submit</button> 
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Signature List</h4>
                  <p class="card-description">
                    All list of Signature
                  </p>
                  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					 <tr>
						<th>Sr.No</th>
						<th>Name</th> 
						<th>Signature For</th> 
						<th>Text Below Sign</th> 
						<th>Signature</th> 
						<th class="">Action</th>
						
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
      


<!--------------------------------------   CROPING TOOL   -----------------------------------------------> 
<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title">Crop Image</h4>
				<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 col-sm-8 col-xs-12 text-center">
						  <div id="profile_image_data" style="width:350px; margin-top:30px"></div>
  					</div>
  					<div class="col-md-4 col-sm-4 col-xs-12 croping_button">
						<button class="btn btn-success crop_image" data-dismiss="modal" style="height:50px;">Crop & Upload Image</button>
						<button type="button" class="btn btn-default close_crop_model" data-dismiss="modal">Cancel</button>
					</div>
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
<script src="<?=base_url();?>back_panel/js/croppie.js"></script>
 <script>
$(document).ready(function(){
   $image_crop = $('#profile_image_data').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:100,
      type:'square'
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#signature').on('change', function(e){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
		$("#save_btn").attr('disabled', true);
        $('#loader').show();
      $.ajax({
        url:"<?=base_url();?>admin/Ajax_controller/update_signature_photo",
        type: "POST",
        data:{"image": response},
        success:function(data){
			console.log(data)
        	$('#loader').hide();
			$("#save_btn").attr('disabled', false);
			$("#hidden_image").val(data);
        },
		error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
        }
      });
    })
  });
  $('.close_crop_model').click(function() {
	$('#signature').val('');
  });
});
 $(document).ready(function () {		
	jQuery.validator.addMethod("validate_email", function(value, element) {
		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
			return true;
		}else {
			return false;
		}
	}, "Please enter a valid Email.");	
	$('#id_form').validate({
		rules: {
			name_of_signature: "required", 		
			dispalay_signature: "required", 	
			<?php if(empty($single)){?>	
			signature: "required", 		
			<?php }?>			
		},
		messages: {
			name_of_signature: "Please enter name of signature", 
			dispalay_signature: "Please enter signature below text", 
			<?php if(empty($single)){?>	
			signature: "Please upload signature",   
			<?php }?>
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
				title:"Signature List",
				messageBottom: 'The information in this table is copyright to The Global University.',
				exportOptions: {
                    columns: [0, 1,2,3],
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
			"url" : "<?=base_url();?>admin/Ajax_controller/get_all_signature_ajax",
			"type": "POST",
		},	
		"complete": function() {
			$('[data-toggle="tooltip"]').tooltip();			
		},
    });
    //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );
	
});	
</script>
 