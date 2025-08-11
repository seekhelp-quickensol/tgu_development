<?php include('header.php');
	if(!empty($medium_inst) && $medium_inst->payment_status != '1'){
		redirect('pay_medium_inst_fees');
	}		
?>
<style>
@page {
    size:A4
}
</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Credit Transfer Certificate</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
							    <?php if(!empty($student) && $student->admission_status == '4'){?> 
    								<?php if(empty($credit_transfer)){ ?> 
    										<div class="box_layer_t"> 
    										    	
    														<div class="btn_center"> 
    														    <div class="step_Box">
    														        <ul>
    														            <li  class="step_active"><div class="step_box">1</div><div class="content_a">Process Fee</div></li>
    														            <li><div class="step_box">2</div><div class="content_a">Waiting For Approval</div></li>
    														            <li><div class="step_box">3</div><div class="content_a">Print Letter</div></li>
    														        </ul>
    														    </div>
    													    </div> 
    											<p class="mid_bix">Dear <b><?=$student->student_name?></b>, please complete Credit Transfer Certificate payment/fees to get your Certificate.</p>
    											<form method="post" action="<?=base_url();?>pay_credit_transfer_certificate" id="pay_credit_transfer_certificate_form" name="pay_credit_transfer_certificate_form">
    											<div class="col-md-4" style="margin: 0px auto;">
    												<div class="form-group">
    													<input type="text" name="previous_university" id="previous_university" class="form-control" placeholder="Please neter Previous University Name">
    												</div>
    											</div>
    										<button style="text-align:center"class="btn btn-success" type="submit">Pay Credit Transfer Certificate fees</button> 
    										</form>
    									</div>
    								<?php }else{ ?>  
    									<?php if($credit_transfer->approve_status == '0'){ ?> 
    										<div class="box_layer_t">
    										                <div class="btn_center"> 
    														    <div class="step_Box">
    														        <ul>
    														            <li><div class="step_box">1</div><div class="content_a">Process Fee</div></li>
    														            <li class="step_active"><div class="step_box">2</div><div class="content_a">Waiting For Approval</div></li>
    														            <li><div class="step_box">3</div><div class="content_a">Print Letter</div></li>
    														        </ul>
    														    </div>
    													    </div> 
    												<p class="mid_bix">Dear <b><?=$student->student_name?></b>, Please be patient your Credit Transfer Certificate is under process, once it will approved your Credit Transfer Certificate will be availble here.</p>
    										    </div> 
    											
    											<?php }elseif($credit_transfer->approve_status == "1"){ ?>  
    										 <div class="box_layer_t">
    										                <div class="btn_center"> 
    														    <div class="step_Box">
    														        <ul>
    														            <li><div class="step_box">1</div><div class="content_a">Process Fee</div></li>
    														            <li><div class="step_box">2</div><div class="content_a">Waiting For Approval</div></li>
    														            <li class="step_active"><div class="step_box">3</div><div class="content_a">Print Letter</div></li>
    														        </ul>
    														    </div>
    													    </div> 
    												    <p class="mid_bix">Congratulations! your Credit Transfer Certificate has been approved, please <a href="<?=base_url();?>print_cerdit_transfer_certificate/<?=base64_encode($credit_transfer->id);?>" target="_blank">Click here</a> to print your Credit Transfer Certificate.</p>
    										    </div> 
    										<?php } ?> 
    								<?php } ?>
    							<?php }else{?>
            					    <div class="box_layer_t nodata_img d-flex justify-content-center" style="background-image:url('<?=base_url();?>images/nodata.jpg')">    
            					        <div class="btn_center"> 
        									<div class="step_Box">
        										<p>Sorry! You are not eligible to apply for Credit Transfer Certificate.</p>
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
 $(document).ready(function () {     
	$('#pay_credit_transfer_certificate_form').validate({
		rules: {
			previous_university:{
				required: true,
			},
		},
		messages: {
			previous_university: {
				required: "Please enter previous university name",
			},
		},
		submitHandler: function(form) {
			form.submit();
		},
	});
});
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
 