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
                  <h4 class="card-title">PARENT'S ASSESSMENT
				  </h4>
                  <?php if(!empty($single)){
                   
                        $local_data = $single;
                        $hidden_id = $single->id;
                        $student_id = $single->student_id;

                        $relation = $single->relation;
                        $father_name = $single->father_name;
                        $contact_no = $single->contact_no;
                        $satisfaction = $single->satisfaction;
                        $father_signature = $single->father_signature;                        $year_sem = $single->year_sem;
                    
                     }else if(!empty($center_student)) { 
                        // echo "<pre>";print_r($center_student);exit;
                        $local_data = $center_student;
                        $hidden_id = '';
                        $student_id = $center_student->id;
                       
                        $relation = '';
                        $father_name = '';
                        $contact_no = '';
                        $satisfaction = '';
                        $father_signature = '';						$year_sem = $center_student->year_sem;
                        
                    } ?>
				  <?php
                    if(!empty($local_data)){
                        // echo "<pre>";print_r($local_data);exit;
                    ?>
						<form class="forms-sample" name="exam_form" id="exam_form" method="post" enctype="multipart/form-data">
							<div class="col-md-12">
								<div class="row"> 
									<div class="col-md-3">
										<div class="form-group">
											<label>Name of Father/Mother/Guardian <span class="req">*</span></label>
											<input type="text" name="father_name" id="father_name" readonly class="form-control charector" placeholder="Name of Father/Mother/Guardian" value="<?php if(!empty($local_data)){ echo $local_data->father_name;}?>">
											<input type="hidden" name="hidden_id" id="hidden_id" class="form-control" value="<?= $hidden_id; ?>">
											<input type="hidden" name="student_id" id="student_id" class="form-control" value="<?= $student_id; ?>">											<input type="hidden" name="year_sem" id="year_sem" class="form-control" value="<?= $year_sem; ?>">
                                        </div>
									</div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Contact No <span class="req">*</span></label>
                                            <input type="text" name="contact_no" id="contact_no" class="form-control charector" placeholder="Contact No" value="<?=$contact_no?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
								<div class="row"> 
                                    <div class="col-md-12">
                                        <div class="form-group inline-checkbox">
                                            <label>Relation with the student:</label>
                                            <input type="checkbox" id="father" name="relation" value="0" <?php echo ($relation == '0') ? 'checked' : ''; ?>>
                                            <label> Father</label><br>
                                            <input type="checkbox" id="mother" name="relation" value="1" <?php echo ($relation == '1') ? 'checked' : ''; ?>>
                                            <label> Mother</label><br>
                                            <input type="checkbox" id="guardian" name="relation" value="2" <?php echo ($relation == '2') ? 'checked' : ''; ?>>
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
                                                                    <input type="checkbox" id="satisfied" name="satisfaction" value="1" <?php echo ($satisfaction == '1') ? 'checked' : ''; ?>>
                                                                    <label> I am satisfied</label><br>
                                                                    <input type="checkbox" id="not_satisfied" name="satisfaction" value="0" <?php echo ($satisfaction == '0') ? 'checked' : ''; ?>>
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
                                                    <label>Signature of Father/Mother/Guardian <?php if($father_signature !=""){?><a target="_blank" href="<?=$this->Digitalocean_model->get_photo('images/signature/'.$father_signature)?>">View</a><?php }?></label>
                                                    <input type="file" class="form-control" name="signature" id="signature">
											        <input type="hidden" class="form-control" name="old_signature" id="old_signature" value="<?=$father_signature?>">
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
                                            <input type="text" name="enrollment_number" id="enrollment_number" required class="form-control" placeholder="Enter Your Enrollment Number"> 
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
 