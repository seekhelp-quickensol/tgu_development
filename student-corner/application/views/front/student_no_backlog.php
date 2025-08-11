<?php include('header.php');
	if(!empty($no_backlog) && $no_backlog->payment_status != '1'){
		redirect('pay_no_backlog_fees');
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
                    <h2 class="mb-3">No Backlog Summary</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
							    <?php if(!empty($student) && $student->admission_status == '4'){?> 
    								<?php if(empty($no_backlog)){ ?> 
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
    										<p class="mid_bix">Dear <b><?=$student->student_name?></b>, please complete No Backlog Summary payment/fees to get your Letter.</p>
    									<a style="text-align:center" href="<?=base_url("pay_no_backlog_fees");?>" class="btn btn-success">Pay No Backlog Summary Letter fees</a> 
    									</div>
    								<?php }else{ ?>  
    									<?php if($no_backlog->approve_status == '0'){ ?> 
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
    												<p class="mid_bix">Dear <b><?=$student->student_name?></b>, Please be patient your No Backlog Summary is under process, once it will approved your No Backlog Summary will be availble here.</p>
    										    </div> 
    											
    											<?php }elseif($no_backlog->approve_status == "1"){ ?>  
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
    										<p class="mid_bix">Congratulations! your No Backlog Summary has been approved, please <a href="<?=base_url();?>print_no_backlog/<?=base64_encode($no_backlog->id);?>" target="_blank">Click here</a> to print your No Backlog Summary.</p>
    										    </div> 
    										<?php } ?> 
    								<?php } ?>	
    							<?php }else{?>
            					    <div class="box_layer_t nodata_img d-flex justify-content-center" style="background-image:url('<?=base_url();?>images/nodata.jpg')">    
            					        <div class="btn_center"> 
        									<div class="step_Box">
        										<p>Sorry! You are not eligible to apply for No Backlog Summary Letter.</p>
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
 