<?php include('header.php');
// echo "<pre>";print_r($character);exit;
	// if(!empty($character) && $character->payment_status != '1'){
	// 	redirect('pay_character_fees');
	// }		
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
                    <h2 class="mb-3">Character Certificate</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
							<?php if($student->center_id != "1" && $student->pcc == ""){?>
								<div class="box_layer_t"> 
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
									</div>
								<?php }else{?>
								<?php if(empty($character)){ ?> 
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
											<p class="mid_bix">Dear <b><?=$student->student_name?></b>, please complete Character Certificate payment/fees to get your Letter.</p>
										<a style="text-align:center" href="<?=base_url("pay_character_fees");?>" class="btn btn-success">Pay Character Certificate fees</a> 
									</div>
								<?php }else{ ?>  
									<?php if($character->approve_status == '0'){ ?> 
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
												<p class="mid_bix">Dear <b><?=$student->student_name?></b>, Please be patient your Character Certificate is under process, once it will approved your Character Certificate will be available here.</p>
										    </div> 
											
									<?php }elseif($character->approve_status == "1"){ ?>  
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
											<p class="mid_bix">Congratulations! your Character Certificate has been approved, please <a href="<?=base_url();?>print_character/<?=base64_encode($character->id);?>" target="_blank">Click here</a> to print your Character Certificate.</p>
										    </div> 
									<?php } ?> 
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
 