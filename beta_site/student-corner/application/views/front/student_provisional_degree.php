<?php 
// echo "<pre>";print_r($result_data);exit;

include('header.php');?>
<style>
@page {
	size: A4;
	margin: 0;
	border:1px solid #000;
	height: 100%
}
</style>
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Provisional Degree Certificate</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
							<?php if(empty($result_data)){?>
							<div class="box_layer_t nodata_img d-flex justify-content-center" style="background-image:url('<?=base_url();?>images/nodata.jpg')">    	
								<div class="btn_center"> 
									<div class="step_Box">
										<p>Sorry! You are not eligible to apply Provisional Degree</p>
									</div>
								</div> 
							<?php }else{?>
								<?php if(empty($provisional_degree)){
										if($student->provisional_degree =="1" || $student->provisional_degree =="0"){ 
								?>
								    <div class="box_layer_t"> 
										    	
								<div class="btn_center"> 
									<div class="step_Box">
										<ul>
											<li><div class="step_box">1</div><div class="content_a">Accept Terms & Conditions</div></li>
											<li class="step_active"><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
											<li><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
											<li><div class="step_box">4</div><div class="content_a">Print Degree</div></li>
										</ul>
									</div>
								</div> 
									<p class="mid_bix">Dear <b><?=$student->student_name?></b>, please complete Provisional Degree payment/fees to get your Provisional Degree.</p>
								<a style="text-align:center" href="<?=base_url("pay_provisional_degree_fees");?>" class="btn btn-success">Pay Provisional Degree fees</a> 
							</div>
									 
									<?php }else{?>  
											<div class="box_layer_t"> 
											<div class="btn_center"> 
												    <div class="step_Box">
												        <ul>
												            <li class="step_active"><div class="step_box">1</div><div class="content_a">Accept Terms & Conditions</div></li>
												            <li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
												            <li ><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
												            <li><div class="step_box">4</div><div class="content_a">Print Degree</div></li>
												        </ul>
												    </div>
											    </div> 
											<p class="mid_bix">Dear <b> <?=$student->student_name?></b>, please accept our terms & conditions to continue for your provisional degree, when you will click on <b>I Accept Terms & Conditions</b> you will received an email on your registered email you have to accept by clicking link that will received over mail, then payment button will be activate automatically</p>
												<a href="<?=base_url("accept_provisional_undertaking");?>" class="btn btn-success">I Accpet Terms & Conditions</a>
											</div>
										<?php  
									}}else{ ?>
										<?php if($provisional_degree->approve_status == '0'){ ?>
											<div class="box_layer_t"> 
										<div class="btn_center"> 
												    <div class="step_Box">
												        <ul>
												            <li><div class="step_box">1</div><div class="content_a">Accept Terms & Conditions</div></li>
												            <li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
												            <li class="step_active"><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
												            <li><div class="step_box">4</div><div class="content_a">Print Degree</div></li>
												        </ul>
												    </div>
											    </div>
												 	<p class="mid_bix">Dear <b><?=$student->student_name?></b>, Please be patient your Provisional Degree is under process, once it will approved your Provisional Degree will be availble here.</p>
											 </div>
										<?php }else{ ?>
										 <div class="box_layer_t">
											<div class="btn_center"> 
												<div class="step_Box">
													<ul>
														<li><div class="step_box">1</div><div class="content_a">Accept Terms & Conditions</div></li>
												<li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
												<li ><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
												<li class="step_active"><div class="step_box">4</div><div class="content_a">Print Degree</div></li>
													</ul>
												</div>
											</div> 
											<p class="mid_bix">Congratulations! your Provisional Degree has been approved, please <a href="<?=base_url();?>print_provisional_degree/<?=base64_encode($provisional_degree->id)?>" target="_blank">Click here</a> to print your Provisional Degree.</p>
										    </div> 
										 
										<?php } ?> 
							<?php } }?>	  
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
 