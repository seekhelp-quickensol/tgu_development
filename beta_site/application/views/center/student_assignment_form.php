<?php include('header.php');?> 
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
    .inline-checkbox{ 
        display: flex; 
        gap:13px; 
        align-items:end; 
    } 
    .inline-checkbox input{ 
        width:17px; 
        margin-bottom: 2px; 
    } 
</style> 
<div class="container-fluid page-body-wrapper"> 
	<div class="main-panel"> 
		<div class="content-wrapper"> 
			<div class="row"> 
				<div class="col-md-12 grid-margin stretch-card"> 
					<div class="card"> 
						<div class="card-body"> 
							<h4 class="card-title">Assignment Form</h4> 
							<?php if(!empty($student)){ ?> 
							<form class="forms-sample" name="exam_form" id="exam_form" method="post" enctype="multipart/form-data"> 
								<div class="col-md-12"> 
									<div class="row">  
										<div class="col-md-4"> 
											<div class="form-group"> 
												<label>Name of the student <span class="req">*</span></label> 
												<input type="text" name="student_name" id="student_name" readonly class="form-control charector" placeholder="" value="<?php if(!empty($student)){ echo $student->student_name;}?>">  
												<input type="hidden" name="student_id" id="student_id" class="form-control" value="<?=$student->id;?>">												<input type="hidden" name="year_sem" id="year_sem" class="form-control" value="<?=$student->year_sem;?>"> 
											</div> 
										</div> 
										<div class="col-md-4"> 
											<div class="form-group"> 
												<label>Enrollment Number <span class="req">*</span></label> 
												<input type="text" readonly name="enrollment_number" id="enrollment_number" class="form-control" placeholder="Enrollment Number" value="<?=$student->enrollment_number?>"> 
											</div> 
										</div> 
										<div class="col-md-4"> 
											<div class="form-group"> 
												<label>Year/Sem <span class="req">*</span></label> 
												<input type="text" name="year_sem" id="year_sem" class="form-control"  readonly placeholder="Year/Sem" value="<?=$student->year_sem?>"> 
											</div> 
										</div> 
									</div> 
								</div> 
								<div class="col-md-12">  
									<div class="row">  
										<div class="col-md-12"> 
											<div class="row"> 
												<div class="col-md-10"> 
													<div class="form-group"> 
														<table class="table table-bordered" id="example"> 
															<thead> 
																<tr> 
																	<th>Title</th> 
																	<th><input type="text" name="title" id="title" class="form-control"></th> 
																</tr> 
															</thead> 
															<tbody>                                                     
																<tr>                        
																	<td> 
																		Upload Assignment
																	</td> 
																	<td> 
																		<input type="file" id="userfile" name="userfile" class="form-control">  
																	</td> 
																</tr>   
															</tbody>                   
														</table>                                                  
													</div> 
												</div> 
											</div> 
										</div> 
										<div class="col-md-12">  
											<div class="row"> 
												<div class="col-md-12 edu"> 
													<div class="form-group">
														<label></label>
														<button type="submit" class="btn btn-primary" name="register" id="register" value="Register">Submit</button>														<div class="pull-right"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
                        <?php }else{ ?> 
                            <form method="post" name="verification_form" id="verification_form" enctype="multipart/form-data"> 
                                <div class="row">  
                                    <div class="col-md-12">  
                                        <div class="personal_details"> 
                                        </div>  
                                    </div>  
                                </div>  
                                <div class="row edu">  
                                    <div class="col-md-12">  
                                        <div class="form-group">  
                                            <label>Enter Your Enrollment Number<span class="req">*</span></label>  
                                            <input type="text" name="enrollment" id="enrollment" required class="form-control" placeholder="Enter Your Enrollment Number">  
                                        </div>  
                                    </div>  
                                </div>   
                                <div class="row">  
                                    <div class="col-md-12 edu">  
                                        <div class="form-group">  
                                            <label></label>  
                                            <button type="submit" class="btn btn-primary" name="generate" id="generate" value="Generate">Next</button>  
                                            <div class="pull-right">  
                                            </div>  
                                        </div> 
                                    </div>	 
                                </div>  
                            </form> 
					<?php }?> 
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
$.validator.addMethod("noHTMLtags", function(value, element) { 
    var htmlPattern = /<\/?[^>]+(>|$)/g; 
    return !htmlPattern.test(value); 
}, "HTML tags are not allowed!");  
$("#verification_form").validate({  
	rules: {  
		enrollment: {  
			required: true,  
			noHTMLtags: true, 
		},	  
	},  
	messages: {  
		enrollment: {  
			required: "Please enter enrollment number!",  
			noHTMLtags:"HTML tags not allowed!",  
		},  
	},  
	submitHandler: function(form){ 
		form.submit(); 
	}  
});  
$("#exam_form").validate({  
    ignore: ":hidden:not(select)", 
	rules: { 
		title: { 
			required: true,   
		}, 
		userfile: { 
			required: true, 
		}, 	 
	}, 
	messages: { 
		title: { 
			required: "Please enter title!",   
		}, 
		userfile: { 
			required: "Please upload assignment!", 
		},   
	},  
	submitHandler: function(form){ 
		form.submit(); 
	}  
}); 
 </script>
 