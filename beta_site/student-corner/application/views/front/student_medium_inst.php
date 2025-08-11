<?php
// echo "<pre>";print_r($medium_inst);exit;
include('header.php');
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
                    <h2 class="mb-3">Medium of Instruction Letter</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
								<?php if(empty($medium_inst)){ ?> 
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
											<p class="mid_bix">Dear <b><?=$student->student_name?></b>, please complete Medium of Instruction Letter payment/fees to get your Letter.</p>
										<a style="text-align:center" href="<?=base_url("pay_medium_inst_fees");?>" class="btn btn-success">Pay Medium of Instruction Letter fees</a> 
									</div>
								<?php }else{ ?>  
									<?php if($medium_inst->approve_status == '0'){ ?> 
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
												<p class="mid_bix">Dear <b><?=$student->student_name?></b>, Please be patient your Medium of Instruction Letter is under process, once it will approved your Medium of Instruction Letter will be availble here.</p>
										    </div> 
											
											<?php }elseif($medium_inst->approve_status == "1"){ ?>  
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
												    <p class="mid_bix">Congratulations! your Medium of Instruction Letter has been approved, please <a href="<?=base_url();?>print_medium_inst/<?=base64_encode($medium_inst->id);?>" target="_blank">Click here</a> to print your Medium of Instruction Letter.</p>
										    </div> 
										<?php } ?> 
								<?php } ?>	  
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
 