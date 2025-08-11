<?php include('header.php');?>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Abstract Details</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
					 <div class="card">
					<?php if(!empty($single_abstract) && $single_abstract->report_status == 2){?>
                        <div class="col-lg-12" style="margin:0px auto;padding: 10px">
                        <p style="color:red">There are following deficiency</p>
                        <p><?=$single_abstract->remark?></p>
						
                    </div>
                    <?php }?>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1 doc_box">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" id="printable_div">
                                <?php if(empty($single_abstract) || $single_abstract->report_status == 2){?>
                                <form class="forms-sample" name="abstract_form" id="abstract_form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="" class="lable_style">Upload Abstract Report:<span style="color:red" > *</span>
										<?php  if(!empty($single_abstract)){?>
											<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/abstract/'.$single_abstract->upload_report)?>">Click to View Report</a>
										 <?php }?>
										</label>
                                        <input type="file" name="userfile2" class="form-control" id="userfile2">
                                        <input type="hidden" name="upload_report" id="upload_report"  value="<?php if(!empty($single_abstract)){ echo $single_abstract->upload_report; } ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="lable_style">Remark<span style="color:red" ></span></label>
                                        <input type="text" id="remark" name="remark" value="<?php if(!empty($single_abstract)){ echo $single_abstract->remark;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Remark">
                                    </div>
                                    <div class="form-group">
                                    <input type="hidden" id="validate" name="validate" value="abc">
                                        <input type="hidden" id="hidden_id" name="hidden_id" value="<?php if(!empty($single_abstract)){ echo $single_abstract->id;}?>" class="form-control custom_select"  aria-describedby="" placeholder="Category Name">
                                    </div>
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary mr-2 password_submit">Submit</button>
                                </form>
                                <?php }else if(!empty($single_abstract) && $single_abstract->report_status == 0){?> 
                                     <div class="tab-pane active" id="active">
										<div class="table-responsive box-table mt-3" id="printable_div">
											<div class="form-group">
												<label for="" class="lable_style">Waiting from Campus!</label>
											</div>
										</div>
									</div>
                                <?php }else if(!empty($single_abstract) && $single_abstract->report_status == 1){?> 
								<div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" id="printable_div">
								<div class="form-group">
									<label for="" class="lable_style">Congrotulations! Your abstract report has been approved.</label>
									<?php  if(!empty($single_abstract)){?>
										<a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/abstract/'.$single_abstract->upload_report)?>">Click to View Report</a>
									 <?php }?>
								</div>
							</div>
						</div>
								<?php }?>
                            </div>		
						</div>
					</div>
					</div> 
				</div>  
			</div>
		</div>
	</div>
</div> 
<?php include('footer.php');?>

    <script>
        $(document).ready(function () {     
            jQuery.validator.addMethod("validate_email", function(value, element) {
                if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
                    return true;
                }else {
                    return false;
                }
            }, "Please enter a valid Email.");  
            $('#abstract_form').validate({
                rules: {
                    userfile2:{
                        required:true
                    },
                },
                messages: {
                    userfile2:{
                        required:"Please upload abstract report"
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
    </script>               