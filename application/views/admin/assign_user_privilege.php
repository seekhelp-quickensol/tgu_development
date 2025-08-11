<?php include('header.php');?>

    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Privilege Setting</h4>

                  <p class="card-description">

                    Please enter Privilege details

                  </p>

				  <div class="">

                  <form name="add_form" id="add_form" method="post" enctype="multipart/form-data" class="form-horizontal">

						

						<div class="col-lg-12 form-group p-0" >

							<div class="">

								<label class=" form-control-label"><b>User</b></label>

							</div>

							<div class="">

								<select name="user" id="user" class="form-control js-example-basic-single">

									<option value="">Select User</option>

									<?php if(!empty($user)){ foreach($user as $user_result){?>

									<option value="<?=$user_result->id?>" <?php if($this->uri->segment(2) == $user_result->id){?>selected="selected"<?php }?>><?=$user_result->first_name?> <?=$user_result->last_name?> | <?=$user_result->email?></option>

									<?php }}?>

								</select>

								<input type="hidden" name="id" id="id" class="form-control" value="<?php if(!empty($single)){ echo $single->id;}?>">

							</div>

						</div>

					
						<div class="form-check">
							<input  type="checkbox" value="" id="selectAllCheckbox">
							<label  for="selectAllCheckbox">
								select all
							</label>
						</div>
								
						<div id="accordion">

							  <?php if(!empty($sinlge_user)){

								if(!empty($privilege)){

									foreach($privilege as $privilege_result){

								?>

						

							  <div class="card">

								<div class="card-header">

								  <a class="card-link" data-toggle="collapse" href="#collapseOne<?=$privilege_result->id?>">

									 <?=$privilege_result->name?> <i class="fa fa-angle-down" aria-hidden="true"></i>

								  </a>

								</div>

							

								<div id="collapseOne<?=$privilege_result->id?>" class="collapse show" data-parent="#accordion">

								  <div class="card-body">

									<?php 

										$exp = array();

										if(!empty($user_privilege)){

											$exp = explode(",",$user_privilege->privilege);

										}

										$link = $this->Setting_model->get_selected_link($privilege_result->id);

										if(!empty($link)){ foreach($link as $link_result){

											?>

											<input type="checkbox" name="link[]" value="<?=$link_result->id?>" <?php if(in_array($link_result->id,$exp)){?>checked="checked"<?php }?>> <?=$link_result->level?>

											<br>

											<?php 

										}

									}

									?>

								  </div>

								</div>

							  </div>

								<?php }}}?>

								<?php if(!empty($sinlge_user)){ ?>
						
									<div class="card">
									<div class="card-header">
										<a class="card-link" data-toggle="collapse" href="#collapseOne_doc">
										Documentation Heads <i class="fa fa-angle-down" aria-hidden="true"></i>
										</a>
									</div>
									<div id="collapseOne_doc" class="collapse show" data-parent="#accordion">
										<div class="card-body">
										<?php 
											$exp = array();
											if(!empty($user_doc_privilege)){
												$exp = explode(",",$user_doc_privilege->privilege);
											}
											if(!empty($document_heads)){ foreach($document_heads as $document_heads_result){
												?>
												<input type="checkbox" name="doc_link[]" value="<?=$document_heads_result->id?>" <?php if(in_array($document_heads_result->id,$exp)){?>checked="checked"<?php }?>> <?=$document_heads_result->head_name;?>
												<br>
												<?php 
											}
										}
										?>
										</div>
									</div>
									</div>
									<?php }?>

							</div>

						

						

						<div class="row form-group">

							<div class="col-lg-6 col-lg-offset-6">

								<button type="submit" name="save" id="save" class="btn btn-primary save_button" value="Save">Save</button>

							</div>

						</div>

					</form>

					</div>

                </div>

                </div>

              </div>

            </div>

            

          </div>

        </div>

        </div>

      

<?php include_once('footer.php');

if($this->uri->segment(2) == ""){

	$id = 0;

}else{

	$id = $this->uri->segment(2);

}

?>

<script>

	$('#selectAllCheckbox').on('change', function () {
        $('#accordion input[type="checkbox"]').prop('checked', this.checked);
    });

	$("#user").change(function(){

		window.location.href="<?=base_url();?>assign_user_privilege/"+$(this).val();

	});

	$("#add_form").validate({

		rules: { 	

			user: "required", 			

		},

		messages: { 	

			user: "Please select user!",  

		}, 

		submitHandler: function(form){

			form.submit();

		} 

	});

	$(document).ready(function() {

		$('#example').DataTable( {

			"order": [],

			dom: 'Bfrtip',

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

			]

		} );	

	} );

	

</script>

 