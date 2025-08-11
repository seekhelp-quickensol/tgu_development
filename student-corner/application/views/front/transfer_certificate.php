<?php include('header.php');?>
<style>
table tr td{ 
	padding-top: 10px; 
	padding-right: 0px; 
	color: black; 
	font:bold; 
	font-weight: 600 
}
</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Transfer Certificate</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
							    <?php if(!empty($student) && $student->admission_status == '4'){?>   
        								<?php
        								//  if($student->center_id != "1" && $student->pcc == ""){
        									?>
        								<!-- <div class="box_layer_t"> 
        										<div class="btn_center"> 
        											<div class="step_Box"> 
        											</div>
        										</div> 
        										<p class="mid_bix">Dear <b><?=$student->student_name?></b>, please upload your Police Clearance Certificate (PCC) to continue.</p>
        										<form method="post" name="upload_form" id="upload_form" enctype="multipart/form-data">
        											<div class="col-md-4" style="margin: 0px auto;">
        												<div class="form-group">
        													<input type="file" name="userfile" id="userfile" class="form-control">
        												</div>
        											</div>
        											<div class="form-group">
        												<input type="submit" name="upload" class="btn btn-primary" value="Upload">
        											</div>
        										</form>
        									</div> -->
        								<?php 
        							// }else{
        								?>
        								<?php if(empty($transfer)){ ?> 
        									<?php if($student->transfer_cert =="1"){?>
        										<div class="box_layer_t"> 
        										    	<div class="btn_center"> 
        												    <div class="step_Box">
        												        <ul>
        												            <li><div class="step_box">1</div><div class="content_a">Accept Terms & Conditions</div></li>
        												            <li class="step_active"><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
        												            <li ><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
        												            <li><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
        												        </ul>
        												    </div>
        											    </div> 
        											<p class="mid_bix">Dear <b><?=$student->student_name?></b>, please complete Transfer Certificate payment/fees to get your Transfer Certificate.</p>
        										<a href="<?=base_url("pay_transfer_certificate_fees");?>" class="btn btn-success">Pay Transfer Certificate fees</a>
        									</div>
        								<?php }else{?>
        								<div class="box_layer_t"> 
        											<div class="btn_center"> 
        												    <div class="step_Box">
        												        <ul>
        												            <li class="step_active"><div class="step_box">1</div><div class="content_a">Accept Terms & Conditions</div></li>
        												            <li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
        												            <li ><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
        												            <li><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
        												        </ul>
        												    </div>
        											    </div> 
        											<p class="mid_bix">Dear <?=$student->student_name?>, please accept our terms & conditions to continue for your Transfer Certificate, when you will click on <b>I Accept Terms & Conditions</b> you will received an email on your registered email you have to accept by clicking link that will received over mail, then payment button will be activate automatically</p>
        												<a href="<?=base_url("accept_transfer_undertaking");?>" class="btn btn-success">I Accpet Terms & Conditions</a>
        											</div>
        								<?php }?>
        								<?php }else{?>
        									<?php if($transfer->approve_status == '0'){?>
        											<div class="box_layer_t">
        												<div class="btn_center"> 
        													<div class="step_Box">
        														<ul>
        															<li><div class="step_box">1</div><div class="content_a">Accept Terms & Conditions</div></li>
        													<li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
        													<li  class="step_active"><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
        													<li><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
        													</div>
        												</div> 
        												<p class="mid_bix">Dear <b><?=$student->student_name?></b>, Please be patient your Transfer Certificate is under process, once it will approved your Transfer Certificate will be availble here.</p>
        										    </div> 
        									<?php }else{?>
        									<div class="box_layer_t">
        											<div class="btn_center"> 
        												<div class="step_Box">
        													<ul>
        														<li><div class="step_box">1</div><div class="content_a">Accept Terms & Conditions</div></li>
        												<li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
        												<li><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
        												<li class="step_active"><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
        												</div>
        											</div> 
        									<p class="mid_bix">Congratulations! your Transfer Certificate has been approved, please <a href="<?=base_url();?>print_transfer_certificate/<?=base64_encode($student->id);?>" target="_blank">Click here</a> to print your Transfer Certificate.</p>
        									</div> 
        									
        									<?php } ?> 
        								<?php } ?> 
        								<?php 
        							// }
        							?>
        						<?php }else{?>
            					    <div class="box_layer_t nodata_img d-flex justify-content-center" style="background-image:url('<?=base_url();?>images/nodata.jpg')">    
            					        <div class="btn_center"> 
        									<div class="step_Box">
        										<p>Sorry! You are not eligible to apply for Transfer Certificate.</p>
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
<?php include('footer.php');?>
<script> 
$("#print_btn").click(()=>{
	$("#print_btn").hide();
	let contain = document.getElementById("container").innerHTML;
	let newWindow = window.open('','',900,600);
	newWindow.document.write(contain);
	newWindow.focus();
	newWindow.print();
	newWindow.close();
	$("#print_btn").show();
});
 
</script>
 
