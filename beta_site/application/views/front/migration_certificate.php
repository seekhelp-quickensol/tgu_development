<?php 
// echo "<pre>";print_r($student);exit;
include('header.php');?>
<style>
@page {
	size: A4;
	margin: 0;
	border:1px solid #000;
	height: 100%
}
.box_layer_t{
	text-align:left !important;
}
.step_Box, .mid_bix{
	text-align:center !important;
} 
</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Migration Certificate</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
						<?php if(empty($migration)): ?>
						 <?php if($student->old_migration!=""){ ?>
						 	<?php if($student->migration_terms =="1" || $student->migration_terms =="0"){?>
								<div class="col-md-12" style="margin:0px auto">
								        
									<div class="box_layer_t">
									    <div class="btn_center"> 
										<div class="step_Box">
											<ul>
												<li><div class="step_box">1</div><div class="content_a">Upload Old Migration</div></li>
												<!-- <li><div class="step_box">2</div><div class="content_a">Accept Terms & Conditions</div></li> -->
												<li class="step_active"><div class="step_box">3</div><div class="content_a">Process Fee</div></li>
												<li ><div class="step_box">4</div><div class="content_a">Waiting For Approval</div></li>
												<li><div class="step_box">5</div><div class="content_a">Print Certificate</div></li>
											</ul>
										</div>
									</div> 
									<p class="mid_bix">Dear <b><?=$student->student_name?></b>, please complete Migration Certificate payment/fees to get your Migration Certificate. *</p>
											
										<div class="text-center">
											<a href="<?=base_url("pay_migration_certificate_fees");?>" class="btn btn-success">Pay Migration Certificate fees</a>
										</div>
									</div>
								</div>
						<!-- <?php
					 }else{
						?>
							<div class="col-md-12" style="margin:0px auto">
								<div class="box_layer_t">
								    <div class="btn_center"> 
										<div class="step_Box">
											<ul>
												<li><div class="step_box">1</div><div class="content_a">Upload Old Migration</div></li>
												<li class="step_active"><div class="step_box">2</div><div class="content_a">Accept Terms & Conditions</div></li>
												<li><div class="step_box">3</div><div class="content_a">Process Fee</div></li>
												<li ><div class="step_box">4</div><div class="content_a">Waiting For Approval</div></li>
												<li><div class="step_box">5</div><div class="content_a">Print Certificate</div></li>
											</ul>
										</div>
									</div> 
								    <p class="mid_bix">Dear <?=$student->student_name?>, please accept our terms & conditions to continue for your Migration Certificate, when you will click on <b>I Accept Terms & Conditions</b> you will received an email on your registered email you have to accept by clicking link that will received over mail, then payment button will be activate automatically</p>
									<a href="<?=base_url("accept_migration_undertaking");?>" class="btn btn-success">I Accpet Terms & Conditions</a>
								</div>
							</div> -->
						<?php }?>
					<?php }else{ ?>
						<div class="col-lg-12" style="display:block;">
							<div class="box_layer_t">
							<div class="btn_center"> 
									<div class="step_Box">
										<ul>
											<li class="step_active"><div class="step_box">1</div><div class="content_a">Upload Old Migration</div></li>
											<!-- <li><div class="step_box">2</div><div class="content_a">Accept Terms & Conditions</div></li> -->
											<li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
											<li ><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
											<li><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
										</ul>
									</div>
								</div> 
									<p class="mid_bix">Dear <b><?=$student->student_name?></b>, please upload your old  Migration Certificate to get your new  Migration Certificate.</p>
									
								<form method="post" action="<?=base_url();?>upload_old_migration_certificate" name="file" id="file" enctype="multipart/form-data">
									<div class="col-lg-6 md_ly">
									<input  type="file" class="form-control" name="userfile"><br><br>
									<input  type="hidden" name="student_id" value="<?=$this->session->userdata('student_id');?>">
									<div class="text-center">
									<button class="btn btn-success" name="save" value="Upload_Form">Upload</button>
									</div>
									</div>
								</form>
							</div>
						</div>
					<?php } ?>
						<?php else: ?>
							<?php if($migration->approve_status == '0'): ?>
								<div class="box_layer_t">
								<div class="btn_center"> 
									<div class="step_Box">
										<ul>
											<li><div class="step_box">1</div><div class="content_a">Upload Old Migration</div></li>
											<!-- <li><div class="step_box">2</div><div class="content_a">Accept Terms & Conditions</div></li> -->
											<li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
											<li class="step_active"><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
											<li><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
										</ul>
									</div>
								</div> 
									<p class="mid_bix">Dear <b><?=$student->student_name?></b>, Please be patient your Migration Certificate is under process, once it will approved your Migration Certificate will be availble here.</p>
								</div>
							<?php else: ?>
                                	<div class="box_layer_t">
							        <div class="btn_center"> 
										<div class="step_Box">
											<ul>
												<li><div class="step_box">1</div><div class="content_a">Upload Old Migration</div></li>
												<!-- <li><div class="step_box">2</div><div class="content_a">Accept Terms & Conditions</div></li> -->
												<li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
												<li><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
												<li class="step_active"><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
											</ul>
										</div>
									</div> 
                            	<p class="mid_bix">Congratulations! your Migration Certificate has been approved, please <a href="<?=base_url();?>print_migration_certificate/<?=base64_encode($migration->id)?>" target="_blank">Click here</a> to print your Migration Certificate.</p>
							</div> 

									<?php endif; ?>
								<?php endif; ?>
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
function checkSubject(){
	if (document.getElementById("sem1").value.length==0 || document.getElementById("subject1").value.length==0 || document.getElementById("type1").value.length==0 || document.getElementById("obtained1").value.length==0 || document.getElementById("max_mark1").value.length==0){ 
		alert ("Please fill all fields for subject 1");
		return false; 
	}
   for(i=2;i<=100;i++){
		if (document.getElementById("sem" + i).value.length!=0 || document.getElementById("subject" + i).value.length!=0 || document.getElementById("type" + i).value.length!=0 || document.getElementById("obtained" + i).value.length!=0 || document.getElementById("max_mark" + i).value.length!=0)
		if (document.getElementById("sem" + i).value.length==0 || document.getElementById("subject" + i).value.length==0 || document.getElementById("type" + i).value.length==0 || document.getElementById("obtained" + i).value.length==0 || document.getElementById("max_mark" + i).value.length==0){
			alert ("Please fill all fields for subject " + i);
			return false; 
		}   
	} 
}
</script>

<script>
	$(document).ready(function () {
	$('#file').validate({
		rules: {
			userfile: {
				required: true,
			},
		},
		messages: {
			userfile: {
				required: "Please upload your old migration certificate",
			},
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
            if (element.attr("name") == "userfile") {
                // If the error is for the userfile input, place it after the input
                error.insertAfter(element);
            } else {
                // For other inputs, place the error inside the parent form-group
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            }
        },
		// highlight: function (element, errorClass, validClass) {
		// 	$(element).addClass('is-invalid');
		// },
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass('is-invalid');
		}
	});
});
</script>
 