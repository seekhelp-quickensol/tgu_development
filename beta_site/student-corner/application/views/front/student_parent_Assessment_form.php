<?php include('header.php');?><?php // echo "<pre>"; print_r($student);exit;?><style>  </style><div class="main-page second py-5">    <div class="container">        <div class="row">            <div class="layer_data">                <div class="col-md-12">                    <h2 class="mb-3">Parent assement Form</h2>                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">                        <li class="nav-item"></li>                     </ul>                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">							<?php if(!empty($assement) && $assement->assessment_status !="1"){?>															<div class="col-md-12"> 									<div class="row">  										<div class="col-md-12"> 											<div class="form-group">												<?php if($assement->assessment_status == "0"){?>												<p>Your parent assement form has been submitted successfully and currently it is under review</p>												<?php }else if($assement->assessment_status == "2"){?>												<p>Your parent assement form has been appreved</p>												<?php }?>											</div>												</div>											</div>										</div>									<?php }else{?>							<?php if(!empty($assement) && $assement->assessment_status =="1"){?>							<p>Your parent assement form has been rejected please submit it again</p>							<?php }?>
						<form class="forms-sample" name="exam_form" id="exam_form" method="post" enctype="multipart/form-data">
							<div class="col-md-12">
								<div class="row"> 
									<div class="col-md-3">
										<div class="form-group">
											<label>Name of Father/Mother/Guardian <span class="req">*</span></label>
											<input type="text" name="father_name" id="father_name" readonly class="form-control charector" placeholder="Name of Father/Mother/Guardian" value="<?php if(!empty($student)){ echo $student->father_name;}?>">

											<input type="hidden" name="student_id" id="student_id" class="form-control" value="<?= $student->id; ?>">											<input type="hidden" name="year_sem" id="year_sem" class="form-control" value="<?= $student->year_sem; ?>">
                                        </div>
									</div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Contact No <span class="req">*</span></label>
                                            <input type="text" name="contact_no" id="contact_no" class="form-control charector" placeholder="Contact No" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
								<div class="row"> 
                                    <div class="col-md-12">
                                        <div class="form-group inline-checkbox">
                                            <label>Relation with the student:</label><br>
                                            <input type="checkbox" id="father" name="relation" value="0" >
                                            <label> Father</label><br>
                                            <input type="checkbox" id="mother" name="relation" value="1" >
                                            <label> Mother</label><br>
                                            <input type="checkbox" id="guardian" name="relation" value="2" >
                                            <label> Guardian</label><br>
                                            <label for="relation" generated="true" class="error" style="display:none;">Please check relation with the student!</label>
                                        </div>
                                    </div>       
								</div>
							</div> 

							<div class="col-md-12"> 
								<div class="row"> 
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <table class="table table-bordered" id="example">
                                                        <thead>
                                                            <tr>
                                                                <th>GRADE YOUR WARD’S PERFORMANCE (Between 1 to 10)</th>
                                                                <th><input type="text" name="word" id="word" class="form-control"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>                                                    
                                                            <tr>                       
                                                                <td>
                                                                SATISFACTION
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" id="satisfied" name="satisfaction" value="1">
                                                                    <label> I am satisfied</label><br>
                                                                    <input type="checkbox" id="not_satisfied" name="satisfaction" value="0">
                                                                    <label> I am not satisfied</label><br>
                                                            <label for="satisfaction" generated="true" class="error" style="display:none;">Please select satisfaction!</label>                                                        
    
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
                                            <div class="col-md-12">
                                                <div class="form-group inline-checkbox">
                                                    <label>DECLARATION BY THE GUARDIAN/PARENT:</label>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12"> 
								        <div class="row"> 
                                            <div class="col-md-12">
                                                <div class="form-group inline-checkbox">
                                                      <label>I declare that the above information provided by my ward is true to my knowledge.</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12"> 
								        <div class="row"> 
                                            <div class="col-md-3">
										        <div class="form-group">
                                                    <label>Signature of Father/Mother/Guardian </label>
                                                    <input type="file" class="form-control" name="signature" id="signature">
											        <input type="hidden" class="form-control" name="old_signature" id="old_signature" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

									<div class="col-md-12"> 
										<div class="row">
											<div class="col-md-12 edu">
												<div class="form-group">
													<label></label>
													<button type="submit" class="btn btn-primary" name="register" id="register" value="Register">Submit</button>
													<div class="pull-right"></div>
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
        </div>        </div>
      
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
		enrollment_number: { 
			required: true, 
			noHTMLtags: true, 
		},	 
	}, 
	messages: { 
		enrollment_number: { 
			required: "Please enter enrollment number!", 
			noHTMLtags:"HTML tags not allowed!", 
		}, 
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});
</script>
<script>
$("#exam_form").validate({ 
    ignore: ":hidden:not(select)",
	rules: {
		student_name: {
			required: true,
			noHTMLtags: true,
		},
		study_mode: {
			required: true,
			noHTMLtags: true,
		}, 	
        assessor_name:{
            required: true,
			noHTMLtags: true,
        },
        relation:{
            required: true,
			noHTMLtags: true,
        },
        satisfaction:{
            required: true,
			noHTMLtags: true,
        },
        <?php if (!empty($father_signature) && $father_signature == "") { ?>
        signature :{
            required: true,
            noHTMLtags: true,
        }, 
        <?php }else if(empty($father_signature)){ ?>
            signature :{
            required: true,
            noHTMLtags: true,
        }, 
        <?php } ?>
        contact_no :{
            required: true,
            minlength:10,
            maxlength:10,
            noHTMLtags: true,
        },
	},
	messages: {
		student_name: {
			required: "Please enter Full name!",
			noHTMLtags: "HTML tags not allowed!",
		},
		study_mode: {
			required: "Please select study mode!",
			noHTMLtags: "HTML tags not allowed!",
		},
        assessor_name:{
            required: "Please enter assessor name!",
			noHTMLtags: "HTML tags not allowed!",
        },
        relation:{
            required: "Please select relation!",
			noHTMLtags: "HTML tags not allowed!",
        },
        satisfaction:{
            required: "Please select satisfaction!",
			noHTMLtags: "HTML tags not allowed!",
        },
       
        <?php if (!empty($father_signature) && $father_signature == "") { ?>
            signature :{
            required: "Please select signature!",
            noHTMLtags: "HTML tags not allowed!",
        }, 
        <?php }else if(empty($father_signature)){ ?>
            signature :{
            required: "Please select signature!",
            noHTMLtags: "HTML tags not allowed!",
        }, 
        <?php } ?>
        contact_no :{
            required: "Please enter contact no!",
            minlength :"Please enter valid contact no!",
            maxlength :"Please enter valid contact no!",
            noHTMLtags: "HTML tags not allowed!",
        },
        
	}, 
	submitHandler: function(form){
		form.submit();
	} 
});
 </script>
 