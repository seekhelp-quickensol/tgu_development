<?php include('header.php'); 
$roman_arr = array( 
	'1' => 'I', 
	'2' => 'II', 
	'3' => 'III', 
	'4' => 'IV', 
	'5' => 'V', 
	'6' => 'VI', 
	'7' => 'VII', 
	'8' => 'VIII', 
	'9' => 'IX', 
	'10' => 'X', 
	'11' => 'XI', 
	'12' => 'XII', 
);
?> 
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            <div class="layer_data">
                <div class="col-md-12">
                    <h2 class="mb-3">Consolidated Marksheet</h2>
                    <ul class="nav osahan-tabs nav-tabs flex-column flex-sm-row ">
                        <li class="nav-item"></li> 
                    </ul>
                    <div class="tab-content osahan-table bg-white rounded shadow-sm px-3 pt-1">
                        <div class="tab-pane active" id="active">
							<div class="table-responsive box-table mt-3" style="padding-bottom: 20px;">
								<?php 
									if(!empty($consolidate) && $consolidate->issue_status == "1"){ 
								?>
								<div class="col-sm-12" style="margin:0px auto">
									<div class="box_layer_t">
										<div class="btn_center"> 
										    <div class="step_Box">
										        <ul>
								            <li><div class="step_box">1</div><div class="content_a">Appy for Consolidate Marksheet</div></li>
											<li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
											<li><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
								            <li class="step_active"><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
										    </div>
									    </div> 
											<p class="mid_bix">Congratulations! your Consolidate Marksheet has been approved, please <a href="<?=base_url();?>print_consolidate_student_marksheet/<?=base64_encode($consolidate->id);?>" target="_blank">Click here</a> to print Consolidate Marksheet.</p>
										<!-- <p class="mid_bix">Dear <b><?=$student->student_name?></b>, Please be patient your consolidated marksheet is under process once it will complete you can print here direclty.</p>-->
									
									</div>
								</div>
								<?php 
									}else if(!empty($consolidate) && $consolidate->issue_status == "0"){?>
									<div class="box_layer_t">
								    <div class="btn_center"> 
										    <div class="step_Box">
										        <ul>
												<li><div class="step_box">1</div><div class="content_a">Appy for Consolidate Marksheet</div></li>
												<li ><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
								            <li class="step_active"><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
								            <li><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
										    </div>
									    </div> 
											<p class="mid_bix">Dear <b><?=$student->student_name?></b>, Please be patient your Consolidate marksheet is under process, once it will approved your Consolidate marksheet will be availble here.</p>
					
								</div>
								<?php }else{?>
								<div class="box_layer_t">
								    <div class="btn_center"> 
										    <div class="step_Box">
										        <ul>
												<li class="step_active"><div class="step_box">1</div><div class="content_a">Appy for Consolidate Marksheet</div></li>
												<li><div class="step_box">2</div><div class="content_a">Process Fee</div></li>
								            <li class=""><div class="step_box">3</div><div class="content_a">Waiting For Approval</div></li>
								            <li><div class="step_box">4</div><div class="content_a">Print Certificate</div></li>
										    </div>
									    </div> 
											<p class="mid_bix">Dear <b><?=$student->student_name?></b>, Please apply for your consolidated marksheet and pay Rs. <?php if(!empty($certificate_fee)){ echo $certificate_fee;}?> to complete process. <a href="<?=base_url();?>apply_consolidate_student">Click to apply</a></p>
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

