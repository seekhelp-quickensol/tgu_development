<?php 
include('header.php');?>
<?php 
// echo "<pre>"; print_r($student);exit;

?>
<style>
  
</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Assignment Form</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
							<?php if(!empty($assement) && $assement->assessment_status !="1"){?>
							
								<div class="col-md-12"> 
									<div class="row">  
										<div class="col-md-12"> 
											<div class="form-group">
												<?php if($assement->assessment_status == "0"){?>
												<p>Your assignment form has been submitted successfully and currently it is under review</p>
												<?php }else if($assement->assessment_status == "2"){?>
												<p>Your assignment form has been appreved</p>
												<?php }?>
											</div>		
										</div>		
									</div>		
								</div>		
							<?php }else{?>
							<?php if(!empty($assement) && $assement->assessment_status =="1"){?>
							<p>Your assignment form has been rejected please submit it again</p>
							<?php }?>
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
                        
					<?php }?> 
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
 