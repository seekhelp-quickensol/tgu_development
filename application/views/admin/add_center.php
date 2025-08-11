<?php 
// echo "<pre>";print_r($single);exit;
include('header.php');?>

<style>

	.btn-small{

		padding: 5px 10px;

	}

	.no_doc{

		margin-bottom: 0px;

		padding: 5px;

		background: #ddd;

		color: #000;

		text-align: center;

	}
</style>
    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Add New Center

				  <a href="<?=base_url();?>list_manage_center" class="btn btn-primary mr-2 float-right">View List</a>

				  </h4>

                  <p class="card-description">

                    Please enter center details

                  </p>

                  <form class="forms-sample" name="single_form" id="single_form" method="post" enctype="multipart/form-data">

                    <div class="row">

					<!-- <div class="col-md-3">

					<div class="form-group">

                      <label for="exampleInputUsername1">Center Type *</label>

                      <select class="form-control" id="is_information" name="is_information">

						<option value="0" <?php if(!empty($single) && $single->is_information == "0"){ ?>selected="selected"<?php }?>>Regular</option>

						<option value="1" <?php if(!empty($single) && $single->is_information == "1"){ ?>selected="selected"<?php }?>>Information</option>

                    </div>

					</div> -->


					<div class="col-md-3">

					<div class="form-group">

                      <label for="exampleInputUsername1">Center Name *</label>

                      <input type="text" class="form-control" id="center_name" name="center_name" placeholder="Center Name" value="<?php if(!empty($single)){ echo $single->center_name;}?>">

                    </div>

					</div>


				<div class="col-md-3">

					<div class="form-group">

					<label for="exampleInputConfirmPassword1">Collaboration Status *</label>

					<select class="form-control js-example-basic-single" id="collaboration_status" name="collaboration_status">

						<option value="">Select</option>

						<option value="1" <?php if(!empty($single) && $single->collaboration_status == "1"){?>selected="selected"<?php }?>>Foreign</option>

						<option value="0" <?php if(!empty($single) && $single->collaboration_status == "0"){?>selected="selected"<?php }?>>Indian</option>

					</select>

					</div>

					</div>


					<div class="col-md-3">

					<div class="form-group">

                      <label for="exampleInputUsername1">Reference Name </label>

                      <input type="text" class="form-control" id="reference" name="reference" placeholder="Reference Name" value="<?php if(!empty($single)){ echo $single->reference;}?>">

                    </div>

					</div>

					<div class="col-md-3">

					<div class="form-group">

                      <label for="exampleInputUsername1">Head Name *</label>

                      <input type="text" class="form-control" id="head_name" name="head_name" placeholder="Head Name" value="<?php if(!empty($single)){ echo $single->head_name;}?>">

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputEmail1">Head Email *</label>

                      <input type="text" class="form-control" id="head_email" name="head_email" placeholder="Head Email" value="<?php if(!empty($single)){ echo $single->head_email;}?>">

					  <div class="error" id="email_error"></div>

                    </div>

					</div>

						<div class="col-md-3">

							<div class="form-group">

								<label for="exampleInputEmail1">Head Contact Number *</label>

								<input type="text" class="form-control" id="head_contact_number" name="head_contact_number" placeholder="Head Contact Number" value="<?php if(!empty($single)){ echo $single->head_contact_number;}?>">

								<div class="error" id="contact_number_error"></div>

							</div>

						</div>


						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Account Name</label>
								<input type="text" class="form-control" id="account_name" name="account_name" placeholder="Account Name" value="<?php if(!empty($single)){ echo $single->account_name;}?>">
							</div>
						</div>


						<div class="col-md-3">

							<div class="form-group">

								<label for="exampleInputEmail1">Account Number</label>

								<input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number" value="<?php if(!empty($single)){ echo $single->account_number;}?>">

							</div>

						</div>

						<div class="col-md-3">

							<div class="form-group">

								<label for="exampleInputEmail1">Bank Name</label>

								<input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name" value="<?php if(!empty($single)){ echo $single->bank_name;}?>">

							</div>

						</div>


						<div class="col-md-3">

							<div class="form-group">

								<label for="exampleInputEmail1">IFSC Code</label>

								<input type="text" class="form-control" id="ifsc" name="ifsc" placeholder="IFSC Code" value="<?php if(!empty($single)){ echo $single->ifsc;}?>">

							</div>

						</div>

						
					<!-- </div>

					<div class="row"> -->

					

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputPassword1">Contact Person Name *</label>

                      <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" placeholder="Contact Person Name" value="<?php if(!empty($single)){ echo $single->contact_person_name;}?>">

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Contact Person Contact </label>

                      <input type="text" class="form-control" id="contact_person_contact" name="contact_person_contact" placeholder="Contact Person Contact" value="<?php if(!empty($single)){ echo $single->contact_person_contact;}?>">

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Contact Person Email </label>

                      <input type="text" class="form-control" id="contact_person_email" name="contact_person_email" placeholder="Contact Person Email" value="<?php if(!empty($single)){ echo $single->contact_person_email;}?>">

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Center Address *</label>

                      <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php if(!empty($single)){ echo $single->address;}?>">

                    </div>

					</div>

					<!-- </div>

					<div class="row"> -->

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Country *</label>

                      <select class="form-control js-example-basic-single" id="country" name="country" placeholder="Country">

						<option value="">Select Country</option>

						<?php if(!empty($country)){ foreach($country as $country_result){?>

						<option value="<?=$country_result->id?>" <?php if(!empty($single) && $single->country == $country_result->id){?>selected="selected"<?php }?>><?=$country_result->name?></option>

						<?php }}?>

					  </select>

                    </div>

					</div>

				
					<?php 

						$state = array();

						if(!empty($single)){

							$state = $this->Admin_model->get_selected_state($single->country);

						}

						$city = array();

						if(!empty($single)){

							$city = $this->Admin_model->get_selected_city($single->state);

						}

					?>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">State *</label>

                      <select class="form-control js-example-basic-single" id="state" name="state" placeholder="State">

						<option value="">Select State</option>

						<?php if(!empty($state)){ foreach($state as $state_result){?>

						<option value="<?=$state_result->id?>" <?php if(!empty($single) && $single->state == $state_result->id){?>selected="selected"<?php }?>><?=$state_result->name?></option>

						<?php }}?>

					  </select>

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">City *</label>

                      <select class="form-control js-example-basic-single" id="city" name="city" placeholder="City">

						<option value="">Select City</option>

						<?php if(!empty($city)){ foreach($city as $city_result){?>

						<option value="<?=$city_result->id?>" <?php if(!empty($single) && $single->city == $city_result->id){?>selected="selected"<?php }?>><?=$city_result->name?></option>

						<?php }}?>

					  </select>

                    </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label for="exampleInputConfirmPassword1">Pincode *</label>

                      <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?php if(!empty($single)){ echo $single->pincode;}?>">

                    </div>

					</div>

					<!-- </div>

					<div class="row"> -->

					<div class="col-md-3">

					<div class="form-group">

					<label for="exampleInputConfirmPassword1">Start Date *</label>

                      <input type="text" readonly class="form-control datepicker" id="start_date" name="start_date" placeholder="Start Date"  value="<?php if(!empty($single) && $single->start_date != "1970-01-01"){ echo date("d-m-Y",strtotime($single->start_date));}?>">

					  </div>

					</div>

					<div class="col-md-3">

						<div class="form-group">

							<label for="exampleInputConfirmPassword1">End Date *</label>

							<input type="text" readonly class="form-control datepicker" id="end_date" name="end_date" placeholder="End Date"  value="<?php if(!empty($single) && $single->end_date != "1970-01-01"){ echo date("d-m-Y",strtotime($single->end_date));}?>">

						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label>Lateral Entry/Credit Transfer Fees *</label>
							<input type="text" name="lateral_entry_fees" id="lateral_entry_fees" class="form-control" value="<?php if(!empty($single)){ echo $single->lateral_entry_fees;}?>" placeholder="Lateral Entry Fees"> 									
						</div>	
					</div>	

					<div class="col-md-3">

					<div class="form-group">

					<label for="exampleInputConfirmPassword1">Payment Terms *</label>
						<select class="form-control js-example-basic-single" id="payment_term" name="payment_term">
							<option value="1" <?php if(!empty($single) && $single->payment_term == "1"){?>selected="selected"<?php }?>>Year</option>
							<option value="2" <?php if(!empty($single) && $single->payment_term == "2"){?>selected="selected"<?php }?>>Semester</option>
							<option value="3" <?php if(!empty($single) && $single->payment_term == "3"){?>selected="selected"<?php }?>>Both</option>
						</select>
					  </div>

					</div>

					<div class="col-md-3">

					<div class="form-group">

					<label for="exampleInputConfirmPassword1">Operation Status *</label>

                      <select class="form-control js-example-basic-single" id="operation" name="operation">

						<option value="">Select</option>

						<option value="1" <?php if(!empty($single) && $single->operation == "1"){?>selected="selected"<?php }?>>On</option>

						<option value="0" <?php if(!empty($single) && $single->operation == "0"){?>selected="selected"<?php }?>>Off</option>

					  </select>

					  </div>

					</div>

					<!-- </div>


					<div class="row"> -->
					<!--<div class="col-md-3">

                    <div class="form-group">

                      <label style="width:100%">Head Photo 

						<?php if(!empty($single) && $single->photo != ""){?>

							<span style="float: right;">

								<a href="<?=$this->Digitalocean_model->get_photo('images/center/photo/'.$single->photo)?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>

							</span>

						<?php }?>

					  </label>

                      <input type="file" name="photo" id="photo" class="file-upload-default">

                      <div class="input-group col-xs-12">
					  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Photo">

                
                        <span class="input-group-append">
						
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  <input type="hidden" class="form-control" id="old_photo" name="old_photo" value="<?php if(!empty($single)){ echo $single->photo;}?>">

					  </div>

					</div>

					 

					<div class="col-sm-3 uid_soft_input" <?php if(empty($single)){?>style="display:none;"<?php }?>>
						<div class="form-group">
							<label class="uid_soft_label"><?php if(!empty($single) && $single->country == '101'){?>Upload Aadhaar Card<?php }else{?>Upload Passport<?php }?><span class="req">*</span>
						
								<?php if(!empty($single) && $single->adhar_card != ""){?>
									<a href="<?=$this->Digitalocean_model->get_photo('images/center/adharcard/'.$single->adhar_card)?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>
								<?php }?>
						
							</label>
							<input type="file" name="identity_file" id="identity_file"  accept=".jpg,.png,.gif,.jpeg,.pdf,.docs" class="file-upload-default">
							<div class="input-group col-xs-12">
								<input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
								<input type="hidden" name="old_identity_file" id="old_identity_file" value="<?php if(!empty($single)){ echo $single->adhar_card;}?>">
								<span class="input-group-append">
								<button class="file-upload-browse btn btn-primary" type="button">Upload</button>
								</span>
                      		</div>
						</div>
						<div id="validationMessage" style="color: red;"></div>
					</div>-->
            
					<?php 
					// if(!empty($single) && $single->country == "101"){
						?>
					<!-- <div class="col-md-3 uid_soft_input" style="display:none;">

                    <div class="form-group">

                      <label style="width:100%" class="uid_soft_label">Upload Head Adharcard

						<?php if(!empty($single) && $single->adhar_card != ""){?>

							<span style="float: right;">

								<a href="<?=$this->Digitalocean_model->get_photo('images/center/adharcard/'.$single->adhar_card)?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>

							</span>

						<?php }?>

					  </label>

                      <input type="file" name="adhar_card" id="adhar_card" class="file-upload-default identity_file">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Adharcard">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  <input type="hidden" class="form-control" id="old_adhar_card" name="old_adhar_card" value="<?php if(!empty($single)){ echo $single->adhar_card;}?>">

					  </div>

					</div> -->

					<!-- <div class="col-md-3">

                    <div class="form-group">

                      <label style="width:100%">Upload PAN Card

						<?php if(!empty($single) && $single->pan_card != ""){?>

							<span style="float: right;">

								<a href="<?=$this->Digitalocean_model->get_photo('images/center/pan_card/'.$single->pan_card)?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>

							</span>

						<?php }?>

					  </label>

                      <input type="file" name="pan_card" id="pan_card" class="file-upload-default">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Pan Card">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  <input type="hidden" class="form-control" id="old_pan_card" name="old_pan_card" value="<?php if(!empty($single)){ echo $single->pan_card;}?>">

					  

					  </div>

					</div> -->

						<?php
					//  }else{
						?>

					<!-- <div class="col-md-3" style="display:none;">

                    <div class="form-group">

                      <label style="width:100%">Upload Passport

						<?php if(!empty($single) && $single->passport != ""){?>

							<span style="float: right;">

								<a href="<?=$this->Digitalocean_model->get_photo('images/center/pass_port/'.$single->passport)?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>

							</span>

						<?php }?>

					  </label>

                      <input type="file" name="passport" id="passport" class="file-upload-default">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Pan Card">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  <input type="hidden" class="form-control" id="old_passport" name="old_passport" value="<?php if(!empty($single)){ echo $single->passport;}?>">
					  </div>

					</div> -->
							<?php 
						// }
						?>

							<!-- <div class="col-sm-6 uid_soft_input" style="display:none;">
								<div class="form-group">
									<label class="uid_soft_label">Upload Aadhaar Softcopy <span class="req">*</span></label>
									<input type="file" class="form-control identity_file" name="identity_file" id="identity_file" placeholder="Upload Aadhaar Softcopy"  accept=".jpg,.png,.gif,.jpeg,.pdf,.docs">
								</div>
							</div> -->

					<!-- <div class="col-md-4">

                    <div class="form-group">

                      <label style="width:100%">Other Documents</label>

                      <div class="">

						<?php if(!empty($single) && $single->other_doc != ""){

							$other_doc = explode(',',$single->other_doc);

							for($i=0; $i<count($other_doc); $i++){

						?>
							<span>
								<a href="<?=$this->Digitalocean_model->get_photo('images/center/other_document/'.$other_doc[$i])?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>

							</span>

						<?php }}else{?>

							<div class="">

								<p class="no_doc">No Document Found</p>

							</div>

						<?php }?>

					  </div>

					  </div>

					</div> -->

					</div>
					
					<div class="row">					

					<div class="col-md-3">

                    <div class="form-group">

                      <label style="width:100%">Head Photo 

						<?php if(!empty($single) && $single->photo != ""){?>

							<span style="float: right;">

								<a href="<?=$this->Digitalocean_model->get_photo('images/center/photo/'.$single->photo)?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>

							</span>

						<?php }?>

					  </label>

                      <input type="file" name="photo" id="photo" class="file-upload-default">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Photo">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  <input type="hidden" class="form-control" id="old_photo" name="old_photo" value="<?php if(!empty($single)){ echo $single->photo;}?>">

					  </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label>Upload MOU</label>

                      <input type="file" name="mou" id="mou" class="file-upload-default">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload MOU">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  </div>

					</div>

					<?php if(!empty($single) && $single->collaboration_status == "0"){?>

					<div class="col-md-3">

                    <div class="form-group">

                      <label style="width:100%">Upload Aadhaar Card

						<?php if(!empty($single) && $single->adhar_card != ""){?>

							<span style="float: right;">

								<a href="<?=$this->Digitalocean_model->get_photo('images/center/adharcard/'.$single->adhar_card)?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>

							</span>

						<?php }?>

					  </label>

                      <input type="file" name="identity_file" id="identity_file" class="file-upload-default">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Adharcard">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  <input type="hidden" class="form-control" id="old_identity_file" name="old_identity_file" value="<?php if(!empty($single)){ echo $single->adhar_card;}?>">

					  </div>

					</div>

					<div class="col-md-3">

                    <div class="form-group">

                      <label style="width:100%">Upload PAN Card

						<?php if(!empty($single) && $single->pan_card != ""){?>

							<span style="float: right;">

								<a href="<?=$this->Digitalocean_model->get_photo('images/center/pan_card/'.$single->pan_card)?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>

							</span>

						<?php }?>

					  </label>

                      <input type="file" name="pan_card" id="pan_card" class="file-upload-default">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Pan Card">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  <input type="hidden" class="form-control" id="old_pan_card" name="old_pan_card" value="<?php if(!empty($single)){ echo $single->pan_card;}?>">

					  

					  </div>

					</div>

						<?php }else{?>

							<div class="col-md-3">

                    <div class="form-group">

                      <label style="width:100%">Upload Passport

						<?php if(!empty($single) && $single->passport != ""){?>

							<span style="float: right;">

								<a href="<?=$this->Digitalocean_model->get_photo('images/center/pass_port/'.$single->passport)?>" target="_blank" class="btn btn-info btn-small"><i class="mdi mdi-file-document"></i></a>

							</span>

						<?php }?>

					  </label>

                      <input type="file" name="passport" id="passport" class="file-upload-default">

                      <div class="input-group col-xs-12">

                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Passport">

                        <span class="input-group-append">

                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>

                        </span>

                      </div>

					  <input type="hidden" class="form-control" id="old_passport" name="old_passport" value="<?php if(!empty($single)){ echo $single->passport;}?>">

					  

					  </div>

					</div>

							<?php }?>
				</div>
					<input type="hidden" class="form-control" id="id" name="id" value="<?php if(!empty($single)){ echo $single->id;}?>">

				  <input type="hidden" class="form-control" id="email_val" name="email_val" value="0">

				  <input type="hidden" class="form-control" id="contact_number_val" name="contact_number_val" value="0">

                    <button type="submit" id="single_button" class="btn btn-primary mr-2">Submit</button>

                  </form>
                  
                  
                  
                  <hr>

                  <p class="card-description" style="text-align: center;font-size: 20px;">

                    <strong>Center Documents & Images</strong>

                  </p>

					<hr>
					<div class="">

						<form class="forms-sample" name="single_document_form" id="single_document_form" method="post" enctype="multipart/form-data">

							<table class="table" style="width:100%">
													
								<tr>
									<th>NGO/Society/Trust/Firm/Company Documents</th>
									<td>
										<?php if (!empty($single) && $single->company_documents != "") {

											$company_documents = explode(',', $single->company_documents);

											for ($i = 0; $i < count($company_documents); $i++) {
												if($company_documents[$i] != ""){
										?>																					
												<div style="display: inline-block; margin-right: 10px; text-align: center;">
													<a href="<?= $this->Digitalocean_model->get_photo('images/center/other_document/' . $company_documents[$i]) ?>" 
													target="_blank" 
													class="btn btn-info btn-sm" 
													style="display: block; margin-bottom: 5px;">
														<i class="mdi mdi-file-document"></i>
													</a>

													<a title="Delete Document" href="<?= base_url(); ?>delete-document/<?= $single->id; ?>/company_documents/<?= base64_encode($company_documents[$i]); ?>" 
													style="color: red; display: inline-block; font-size: 16px;" 
													onclick="return confirm('Are you sure you want to delete this document?');">
														<i class="mdi mdi-close-circle-outline"></i>
													</a>
												</div>
										<?php }
										}} else { ?>
											-
										<?php } ?>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-9">
												<input type="file" class="form-control" name="company_documents" multiple accept=".jpg,.png,.gif,.jpeg,.pdf,.doc,.docx">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary" name="submit_documents" value="company_documents">Submit</button>
											</div>
										</div>
									</td>
								</tr>
													
								<tr>
									<th>Institute Documents <small>(Registration, Deed, PAN, etc.)</small></th>
									<td>
										<?php if (!empty($single) && $single->institute_documents != "") {

											$institute_documents = explode(',', $single->institute_documents);

											for ($i = 0; $i < count($institute_documents); $i++) {
												if($institute_documents[$i] != ""){
										?>																					
												<div style="display: inline-block; margin-right: 10px; text-align: center;">
													<a href="<?= $this->Digitalocean_model->get_photo('images/center/other_document/' . $institute_documents[$i]) ?>" 
													target="_blank" 
													class="btn btn-info btn-sm" 
													style="display: block; margin-bottom: 5px;">
														<i class="mdi mdi-file-document"></i>
													</a>

													<a title="Delete Document" href="<?= base_url(); ?>delete-document/<?= $single->id; ?>/institute_documents/<?= base64_encode($institute_documents[$i]); ?>" 
													style="color: red; display: inline-block; font-size: 16px;" 
													onclick="return confirm('Are you sure you want to delete this document?');">
														<i class="mdi mdi-close-circle-outline"></i>
													</a>
												</div>
										<?php }
										}} else { ?>
											-
										<?php } ?>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-9">
												<input type="file" class="form-control" name="institute_documents" multiple accept=".jpg,.png,.gif,.jpeg,.pdf,.doc,.docx">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary" name="submit_documents" value="institute_documents">Submit</button>
											</div>
										</div>
									</td>
								</tr>
													
								<tr>
									<th>PAN & Aadhar Card of Trustees/Members/Directors</th>
									<td>
										<?php if (!empty($single) && $single->member_documents != "") {

											$member_documents = explode(',', $single->member_documents);

											for ($i = 0; $i < count($member_documents); $i++) {
												if($member_documents[$i] != ""){
										?>						
												<div style="display: inline-block; margin-right: 10px; text-align: center;">
													<a href="<?= $this->Digitalocean_model->get_photo('images/center/other_document/' . $member_documents[$i]) ?>" 
													target="_blank" 
													class="btn btn-info btn-sm" 
													style="display: block; margin-bottom: 5px;">
														<i class="mdi mdi-file-document"></i>
													</a>

													<a title="Delete Document" href="<?= base_url(); ?>delete-document/<?= $single->id; ?>/member_documents/<?= base64_encode($member_documents[$i]); ?>" 
													style="color: red; display: inline-block; font-size: 16px;" 
													onclick="return confirm('Are you sure you want to delete this document?');">
														<i class="mdi mdi-close-circle-outline"></i>
													</a>
												</div>
										<?php }
										}} else { ?>
											-
										<?php } ?>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-9">
												<input type="file" class="form-control" name="member_documents" multiple accept=".jpg,.png,.gif,.jpeg,.pdf,.doc,.docx">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary" name="submit_documents" value="member_documents">Submit</button>
											</div>
										</div>
									</td>
								</tr>
													
								<tr>
									<th>Authorization Letter <small>(If signatory not filling form)</small></th>
									<td>
										<?php if (!empty($single) && $single->authorization_letter != "") {

											$authorization_letter = explode(',', $single->authorization_letter);

											for ($i = 0; $i < count($authorization_letter); $i++) {
												if($authorization_letter[$i] != ""){
										?>						
												<div style="display: inline-block; margin-right: 10px; text-align: center;">
													<a href="<?= $this->Digitalocean_model->get_photo('images/center/other_document/' . $authorization_letter[$i]) ?>" 
													target="_blank" 
													class="btn btn-info btn-sm" 
													style="display: block; margin-bottom: 5px;">
														<i class="mdi mdi-file-document"></i>
													</a>

													<a title="Delete Document" href="<?= base_url(); ?>delete-document/<?= $single->id; ?>/authorization_letter/<?= base64_encode($authorization_letter[$i]); ?>" 
													style="color: red; display: inline-block; font-size: 16px;" 
													onclick="return confirm('Are you sure you want to delete this document?');">
														<i class="mdi mdi-close-circle-outline"></i>
													</a>
												</div>
										<?php }
										}} else { ?>
											-
										<?php } ?>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-9">
												<input type="file" class="form-control" name="authorization_letter" multiple accept=".jpg,.png,.gif,.jpeg,.pdf,.doc,.docx">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary" name="submit_documents" value="authorization_letter">Submit</button>
											</div>
										</div>
									</td>
								</tr>
													
								<tr>
									<th>Infrastructure Details</th>
									<td>
										<?php if (!empty($single) && $single->infrastructure_details != "") {

											$infrastructure_details = explode(',', $single->infrastructure_details);

											for ($i = 0; $i < count($infrastructure_details); $i++) {
												if($infrastructure_details[$i] != ""){
										?>						
												<div style="display: inline-block; margin-right: 10px; text-align: center;">
													<a href="<?= $this->Digitalocean_model->get_photo('images/center/other_document/' . $infrastructure_details[$i]) ?>" 
													target="_blank" 
													class="btn btn-info btn-sm" 
													style="display: block; margin-bottom: 5px;">
														<i class="mdi mdi-file-document"></i>
													</a>

													<a title="Delete Document" href="<?= base_url(); ?>delete-document/<?= $single->id; ?>/infrastructure_details/<?= base64_encode($infrastructure_details[$i]); ?>" 
													style="color: red; display: inline-block; font-size: 16px;" 
													onclick="return confirm('Are you sure you want to delete this document?');">
														<i class="mdi mdi-close-circle-outline"></i>
													</a>
												</div>
										<?php }
										}} else { ?>
											-
										<?php } ?>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-9">
												<input type="file" class="form-control" name="infrastructure_details" multiple accept=".jpg,.png,.gif,.jpeg,.pdf,.doc,.docx">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary" name="submit_documents" value="infrastructure_details">Submit</button>
											</div>
										</div>
									</td>
								</tr>
													
								<tr>
									<th>Images of Classrooms</th>
									<td>
										<?php if (!empty($single) && $single->classroom_images != "") {

											$classroom_images = explode(',', $single->classroom_images);

											for ($i = 0; $i < count($classroom_images); $i++) {
												if($classroom_images[$i] != ""){
										?>						
												<div style="display: inline-block; margin-right: 10px; text-align: center;">
													<a href="<?= $this->Digitalocean_model->get_photo('images/center/other_document/' . $classroom_images[$i]) ?>" 
													target="_blank" 
													class="btn btn-info btn-sm" 
													style="display: block; margin-bottom: 5px;">
														<i class="mdi mdi-file-document"></i>
													</a>

													<a title="Delete Document" href="<?= base_url(); ?>delete-document/<?= $single->id; ?>/classroom_images/<?= base64_encode($classroom_images[$i]); ?>" 
													style="color: red; display: inline-block; font-size: 16px;" 
													onclick="return confirm('Are you sure you want to delete this document?');">
														<i class="mdi mdi-close-circle-outline"></i>
													</a>
												</div>
										<?php }
										}} else { ?>
											-
										<?php } ?>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-9">
												<input type="file" class="form-control" name="classroom_images" multiple accept=".jpg,.png,.gif,.jpeg,.pdf,.doc,.docx">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary" name="submit_documents" value="classroom_images">Submit</button>
											</div>
										</div>
									</td>
								</tr>
													
								<tr>
									<th>Subject Related Laboratories <small>(Details & Images)</small></th>
									<td>
										<?php if (!empty($single) && $single->lab_details_images != "") {

											$lab_details_images = explode(',', $single->lab_details_images);

											for ($i = 0; $i < count($lab_details_images); $i++) {
												if($lab_details_images[$i] != ""){
										?>
												<div style="display: inline-block; margin-right: 10px; text-align: center;">
													<a href="<?= $this->Digitalocean_model->get_photo('images/center/other_document/' . $lab_details_images[$i]) ?>" 
													target="_blank" 
													class="btn btn-info btn-sm" 
													style="display: block; margin-bottom: 5px;">
														<i class="mdi mdi-file-document"></i>
													</a>

													<a title="Delete Document" href="<?= base_url(); ?>delete-document/<?= $single->id; ?>/lab_details_images/<?= base64_encode($lab_details_images[$i]); ?>" 
													style="color: red; display: inline-block; font-size: 16px;" 
													onclick="return confirm('Are you sure you want to delete this document?');">
														<i class="mdi mdi-close-circle-outline"></i>
													</a>
												</div>
										<?php }
										}} else { ?>
											-
										<?php } ?>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-9">
												<input type="file" class="form-control" name="lab_details_images" multiple accept=".jpg,.png,.gif,.jpeg,.pdf,.doc,.docx">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary" name="submit_documents" value="lab_details_images">Submit</button>
											</div>
										</div>
									</td>
								</tr>
													
								<tr>
									<th>Images of Institute & Classrooms</th>
									<td>
										<?php if (!empty($single) && $single->institute_images != "") {

											$institute_images = explode(',', $single->institute_images);

											for ($i = 0; $i < count($institute_images); $i++) {
												if($institute_images[$i] != ""){
										?>
												<div style="display: inline-block; margin-right: 10px; text-align: center;">
													<a href="<?= $this->Digitalocean_model->get_photo('images/center/other_document/' . $institute_images[$i]) ?>" 
													target="_blank" 
													class="btn btn-info btn-sm" 
													style="display: block; margin-bottom: 5px;">
														<i class="mdi mdi-file-document"></i>
													</a>

													<a title="Delete Document" href="<?= base_url(); ?>delete-document/<?= $single->id; ?>/institute_images/<?= base64_encode($institute_images[$i]); ?>" 
													style="color: red; display: inline-block; font-size: 16px;" 
													onclick="return confirm('Are you sure you want to delete this document?');">
														<i class="mdi mdi-close-circle-outline"></i>
													</a>
												</div>
										<?php }
										}} else { ?>
											-
										<?php } ?>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-9">
												<input type="file" class="form-control" name="institute_images" multiple accept=".jpg,.png,.gif,.jpeg,.pdf,.doc,.docx">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary" name="submit_documents" value="institute_images">Submit</button>
											</div>
										</div>
									</td>
								</tr>
													
								<tr>
									<th>Correspondence Address Proof</th>
									<td>
										<?php if (!empty($single) && $single->correspondence_address != "") {

											$correspondence_address = explode(',', $single->correspondence_address);

											for ($i = 0; $i < count($correspondence_address); $i++) {
												if($correspondence_address[$i] != ""){
										?>												
												<div style="display: inline-block; margin-right: 10px; text-align: center;">
													<a href="<?= $this->Digitalocean_model->get_photo('images/center/other_document/' . $correspondence_address[$i]) ?>" 
													target="_blank" 
													class="btn btn-info btn-sm" 
													style="display: block; margin-bottom: 5px;">
														<i class="mdi mdi-file-document"></i>
													</a>

													<a title="Delete Document" href="<?= base_url(); ?>delete-document/<?= $single->id; ?>/correspondence_address/<?= base64_encode($correspondence_address[$i]); ?>" 
													style="color: red; display: inline-block; font-size: 16px;" 
													onclick="return confirm('Are you sure you want to delete this document?');">
														<i class="mdi mdi-close-circle-outline"></i>
													</a>
												</div>
										<?php }
										}} else { ?>
											-
										<?php } ?>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-9">
												<input type="file" class="form-control" name="correspondence_address" multiple accept=".jpg,.png,.gif,.jpeg,.pdf,.doc,.docx">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary" name="submit_documents" value="correspondence_address">Submit</button>
											</div>
										</div>
									</td>
								</tr>
													
								<tr>
									<th>Stamp Papers <small>(2 x ₹100)</small></th>
									<td>
										<?php if (!empty($single) && $single->stamp_papers != "") {

											$stamp_papers = explode(',', $single->stamp_papers);

											for ($i = 0; $i < count($stamp_papers); $i++) {
												if($stamp_papers[$i] != ""){
										?>
												<div style="display: inline-block; margin-right: 10px; text-align: center;">
													<a href="<?= $this->Digitalocean_model->get_photo('images/center/other_document/' . $stamp_papers[$i]) ?>" 
													target="_blank" 
													class="btn btn-info btn-sm" 
													style="display: block; margin-bottom: 5px;">
														<i class="mdi mdi-file-document"></i>
													</a>

													<a title="Delete Document" href="<?= base_url(); ?>delete-document/<?= $single->id; ?>/stamp_papers/<?= base64_encode($stamp_papers[$i]); ?>" 
													style="color: red; display: inline-block; font-size: 16px;" 
													onclick="return confirm('Are you sure you want to delete this document?');">
														<i class="mdi mdi-close-circle-outline"></i>
													</a>
												</div>
										<?php }
										}} else { ?>
											-
										<?php } ?>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-9">
												<input type="file" class="form-control" name="stamp_papers" multiple accept=".jpg,.png,.gif,.jpeg,.pdf,.doc,.docx">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary" name="submit_documents" value="stamp_papers">Submit</button>
											</div>
										</div>
									</td>
								</tr>								
													
								<tr>
									<th>Other Documents & Images</th>
									<td>
										<?php if (!empty($single) && $single->other_doc != "") {

											$other_doc = explode(',', $single->other_doc);

											for ($i = 0; $i < count($other_doc); $i++) {
												if($other_doc[$i] != ""){
										?>
											<div style="display: inline-block; margin-right: 10px; text-align: center;">
												<a href="<?= $this->Digitalocean_model->get_photo('images/center/other_document/' . $other_doc[$i]) ?>" 
												target="_blank" 
												class="btn btn-info btn-sm" 
												style="display: block; margin-bottom: 5px;">
													<i class="mdi mdi-file-document"></i>
												</a>

												<a title="Delete Document" href="<?= base_url(); ?>delete-document/<?= $single->id; ?>/other_doc/<?= base64_encode($other_doc[$i]); ?>" 
												style="color: red; display: inline-block; font-size: 16px;" 
												onclick="return confirm('Are you sure you want to delete this document?');">
													<i class="mdi mdi-close-circle-outline"></i>
												</a>
											</div>
										<?php }
										}} else { ?>
											-
										<?php } ?>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-9">
												<input type="file" class="form-control" name="other_doc" multiple accept=".jpg,.png,.gif,.jpeg,.pdf,.doc,.docx">
											</div>
											<div class="col-lg-2">
												<button type="submit" class="btn btn-primary" name="submit_documents" value="other_doc">Submit</button>
											</div>
										</div>
									</td>
								</tr>

							</table>		                    

						</form>

					</div>

                </div>

              </div>

            </div>

            

          </div>

        </div>

      

<?php include('footer.php');

$id=0;

if($this->uri->segment(2) != ""){

	$id = $this->uri->segment(2);

}

?>

 <script>

 $(document).ready(function () {
     
     let clickedButton = '';

	$('[name="submit_documents"]').on('click', function (e) {
		clickedButton = $(this).val();
	});	

	$('#single_document_form').validate({

		rules: {

			correspondence_address: {

                required: function () {

                    return clickedButton === 'correspondence_address';

                }

			},	

			institute_images: {

                required: function () {

                    return clickedButton === 'institute_images';

                }

			},	

			lab_details_images: {

                required: function () {

                    return clickedButton === 'lab_details_images';

                }

			},	

			classroom_images: {

                required: function () {

                    return clickedButton === 'classroom_images';

                }

			},	

			infrastructure_details: {

                required: function () {

                    return clickedButton === 'infrastructure_details';

                }

			},	

			authorization_letter: {

                required: function () {

                    return clickedButton === 'authorization_letter';

                }

			},	

			member_documents: {

                required: function () {

                    return clickedButton === 'member_documents';

                }

			},	

			institute_documents: {

                required: function () {

                    return clickedButton === 'institute_documents';

                }

			},	

			company_documents: {

                required: function () {

                    return clickedButton === 'company_documents';

                }

			},	

			stamp_papers: {

                required: function () {

                    return clickedButton === 'stamp_papers';

                }

			},	

			other_doc: {

                required: function () {

                    return clickedButton === 'other_doc';

                }

			},	

		},

		messages: {

			company_documents: {

				required: "Please select file",

			},

			institute_documents: {

				required: "Please select file",

			},

			member_documents: {

				required: "Please select file",

			},

			authorization_letter: {

				required: "Please select file",

			},

			infrastructure_details: {

				required: "Please select file",

			},

			classroom_images: {

				required: "Please select file",

			},

			lab_details_images: {

				required: "Please select file",

			},

			institute_images: {

				required: "Please select file",

			},

			correspondence_address: {

				required: "Please select file",

			},

			stamp_papers: {

				required: "Please select file",

			},

			other_doc: {

				required: "Please select file",

			},

		},

		submitHandler: function(form){

			form.submit();

		},

	});

	jQuery.validator.addMethod("validate_email", function(value, element) {

		if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {

			return true;

		}else {

			return false;

		}

	}, "Please enter a valid Email.");	



	// $.validator.addMethod("endDate", function(value, element) {
	// 	var startDate = $('#start_date').val();
	// 	return Date.parse(startDate) <= Date.parse(value) || value == "";
	// }, "End date must be greater than or equal to start date");


	$.validator.addMethod("endDate", function(value, element) {
		var startDate = $('#start_date').datepicker('getDate');
		var endDate = $('#end_date').datepicker('getDate');
		
		return endDate >= startDate || value === '';
	}, "End date must be greater than start date");
	
	$('#single_form').validate({
		ignore: ":hidden:not(select)",
		rules: {

			center_name: {

				required: true,

			},

			head_name: {

				required: true,

			},

			head_email: {

				required: true,

				validate_email: true,

			},

			head_contact_number: {

				required: true,

				number: true,

			},

			contact_person_contact: {

				number: true,

			},

			// contact_person_email: {

			// 	validate_email: true,

			// },

			address: {

				required: true,

			},

			country: {

				required: true,

			},

			state: {

				required: true,

			},

			city: {

				required: true,

			},

			pincode: {

				required: true,

				number: true,

				minlength: 6,

				maxlength: 6,

			},

			contact_person_name:{
				required: true,
			},

			start_date: {

				required: true,

			},

			end_date: {

				required: true,
				endDate : true,

			},

			fee_share: {

				required: true,

				number: true,

			},

			operation: {

				required: true,

			},
			collaboration_status:{
				required: true,

			},
			lateral_entry_fees:{
				required: true,
				number: true,
			},

		},

		messages: {

			center_name: {

				required: "Please enter center name",

			},

			head_name: {

				required: "Please enter head name",

			},

			head_email: {

				required: "Please enter email",

				validate_email: "Please eneter valid email",

			},

			head_contact_number: {

				required: "Please enter head contact number",

				number: "Please enter valid head contact number",

			},

			contact_person_contact: {

				number: "Please enter valid contact number",

			},

			// contact_person_email: {

			// 	validate_email: "Please enter valid email",

			// },

			contact_person_name:{
				required: "Please enter contact person name",
			},

			address: {

				required: "Please enter address",

			},

			country: {

				required: "Please select country",

			},

			state: {

				required: "Please select state",

			},

			city: {

				required: "Please select city",

			},

			pincode: {

				required: "Please enter pincode",

				number: "Please enter valid pincode",

				minlength: "Please enter valid pincode",

				maxlength: "Please enter valid pincode",

			},

			start_date: {

				required: "Please select start date",

			},

			end_date: {

				required: "Please select end date",
				endDate : "End date must be greater than start date",
			},

			fee_share: {

				required: "Please enter fees share",

				number: "Please enter valid fees share",

			},

			operation: {

				required: "Please select operation status",

			},
			collaboration_status:{
				required: "Please select collaboration status",

			},
			lateral_entry_fees:{
				required: "Please enter lateral entry fees",
				number: "Please enter a valid lateral entry fee",
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




$('#country').on('change', function() {
    $('#country').valid();
});

$('#state').on('change', function() {
    $('#state').valid();
});

$('#city').on('change', function() {
    $('#city').valid();
});

$('#operation').on('change', function() {
    $('#operation').valid();
});


$('#collaboration_status').on('change', function() {
    $('#collaboration_status').valid();
});

$("#country").change(function(){  

	$.ajax({

		type: "POST",

		url: "<?=base_url();?>admin/Ajax_controller/get_state_ajax",

		data:{'country':$("#country").val()},

		success: function(data){

			$("#state").empty();

			$('#state').append('<option value="">Select State</option>');

			var opts = $.parseJSON(data);

			$.each(opts, function(i, d) {

			   $('#state').append('<option value="' + d.id + '">' + d.name + '</option>');

			});

			$('#state').trigger('change');

		},

		 error: function(jqXHR, textStatus, errorThrown) {

		   console.log(textStatus, errorThrown);

		}

	});	


	$(document).ready(function() {
		$('#identity_numer').on('blur', function() {
			if($('#country').val() == '101'){
				var aadharInput = $(this).val();
				var aadharRegex = /^\d{12}$/;

				if (!aadharRegex.test(aadharInput)) {
					alert("Please enter a valid Aadhaar number");
				}
			}else{
				var passportInput = $(this).val();
				var passportRegex = /^[A-Z0-9]{8,15}$/;

				if (!passportRegex.test(passportInput)) {
					alert("Please enter a valid Passport number");
				}
			}
		});
	});

	
	if($('#country').val() == '101'){
		$('.uid_input').show();
		$('.uid_soft_input').show();
		$('.uid_label').html('Aadhaar Number');
		$('.uid_soft_label').html('Upload Head Adharcard *');
		$('.identity_numer').attr("placeholder", "Enter Aadhaar Number");
		$('.identity_numer').prop('required',true);
		$('.adhar_card').attr("placeholder", "Upload Head Adharcard");
		$('.adhar_card').prop('required',true);
		$('.id_type').val('1');
	}else{
		$('.uid_input').show();
		$('.uid_soft_input').show();
		$('.uid_label').html('Passport Number');
		$('.uid_soft_label').html('Upload Head Passport *');
		$('.identity_numer').attr("placeholder", "Enter Passport Number");
		$('.identity_numer').prop('required',true);
		$('.adhar_card').attr("placeholder", "Upload Head Passport");
		$('.adhar_card').prop('required',true);
		$('.id_type').val('2');
	}

});


$("#state").change(function(){  

	$.ajax({

		type: "POST",

		url: "<?=base_url();?>admin/Ajax_controller/get_city_ajax",

		data:{'state':$("#state").val()},

		success: function(data){

			$("#city").empty();

			$('#city').append('<option value="">Select City</option>');

			var opts = $.parseJSON(data);

			$.each(opts, function(i, d) {

			   $('#city').append('<option value="' + d.id + '">' + d.name + '</option>');

			});

			$('#city').trigger('change');

		},

		 error: function(jqXHR, textStatus, errorThrown) {

		   console.log(textStatus, errorThrown);

		}

	});	

});

$("#head_email").keyup(function(){  

	$.ajax({

		type: "POST",

		url: "<?=base_url();?>admin/Ajax_controller/get_center_unique_email",

		data:{'head_email':$("#head_email").val(),'id':'<?=$id?>'},

		success: function(data){

			$("#email_val").val(data);

			check_avaliable();

		},

		 error: function(jqXHR, textStatus, errorThrown) {

		   console.log(textStatus, errorThrown);

		}

	});	

});

$("#head_contact_number").keyup(function(){  

	$.ajax({

		type: "POST",

		url: "<?=base_url();?>admin/Ajax_controller/get_center_unique_contact_number",

		data:{'head_contact_number':$("#head_contact_number").val(),'id':'<?=$id?>'},

		success: function(data){

			$("#contact_number_val").val(data);

			check_avaliable();

		},

		 error: function(jqXHR, textStatus, errorThrown) {

		   console.log(textStatus, errorThrown);

		}

	});	

});

function check_avaliable(){

	if($("#email_val").val() != "0"){

		$("#email_error").html("This email is already used, please try another.");

	}else{

		$("#email_error").html("");

	}

	if($("#contact_number_val").val() != "0"){

		$("#contact_number_error").html("This contact number is already used, please try another.");

	}else{

		$("#contact_number_error").html("");

	}

	if($("#contact_number_val").val() == "0" && $("#email_val").val() == "0"){

		$("#single_button").show();

	}else{

		$("#single_button").hide();

	}

}

$( function() {

    $( ".datepicker" ).datepicker({

		dateFormat:"dd-mm-yy",

		changeMonth:true,

		changeYear:true,

		/*maxDate: "-12Y",

		minDate: "-80Y",

		yearRange: "-100:-0"*/
		onSelect: function (dateText, inst) {
            $(this).valid(); // Trigger validation on date select
        },

	});
  } );

 </script>
<script>
	/*
	$(document).ready(function() {
    $('#single_button').on('click', function(event) {
        var selectedCountry = $('#country').val();
        if (selectedCountry === '101') {
            if ($('#identity_file').val() === '') {    
                event.preventDefault();
                $('#validationMessage').text('Please upload Aadhaar card.');
            } else{
				$('#validationMessage').text('');
			}
        } else {
            if ($('#identity_file').val() === '') {     
                event.preventDefault();
                $('#validationMessage').text('Please upload Passport.');
            } else{
				$('#validationMessage').text('');
			}
        }
    });
});*/


</script>
 