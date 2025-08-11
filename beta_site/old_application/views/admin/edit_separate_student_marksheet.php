<?php include('header.php');?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
				<div class="col-md-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<form method="post" name="marksheet" id="marksheet" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-4">					
										<div class="form-group">
											<label>Marksheet Number</label>
											<input type="text" class="form-control" readonly name="marksheet_number" id="marksheet_number" value="<?=$marksheet->marksheet_number?>">
											<input type="hidden" class="form-control" readonly name="id" id="id" value="<?=$marksheet->id?>">
										</div>
									</div>
									<div class="col-md-4">					
										<div class="form-group">
											<label>Result Declare Date</label>
											<input type="text" class="form-control datepicker" name="result_declare_date" id="result_declare_date" value="<?=date("d-m-Y",strtotime($marksheet->result_declare_date));?>">
										</div>
									</div>
									<div class="col-md-4">					
										<div class="form-group">
											<label>Marksheet Issue Date</label>
											<input type="text" class="form-control datepicker" name="marksheet_issue_date" id="marksheet_issue_date" value="<?=date("d-m-Y",strtotime($marksheet->marksheet_issue_date));?>">
										</div>
									</div>
									<div class="col-md-4">					
										<div class="form-group">
											<label>Marksheet Status</label>
											<select class="form-control" name="marksheet_status" id="marksheet_status">
												<option value="">Select</option>
												<option value="0" <?php if($marksheet->marksheet_status == 0){?>selected="selected"<?php }?>>Original</option>
												<option value="1" <?php if($marksheet->marksheet_status == 1){?>selected="selected"<?php }?>>Duplicate</option>                        
												<option value="2" <?php if($marksheet->marksheet_status == 2){?>selected="selected"<?php }?>>Cancelled</option>
											</select>
										</div>
									</div>
									<div class="col-md-4">					
										<div class="form-group">
											<label>Print Stream</label>
											<select class="form-control" name="print_stream" id="print_stream">
												<option value="">Select</option>
												<option value="1" <?php if($marksheet->print_stream == 1){?>selected="selected"<?php }?>>Yes</option>
												<option value="0" <?php if($marksheet->print_stream == 0){?>selected="selected"<?php }?>>No</option> 
											</select>
										</div>
									</div>
									<div class="col-md-4">					
										<div class="form-group">
											<label>Final Status</label>
											<select class="form-control" name="final_status" id="final_status">
												<option value="">Select</option>
												<option value="1" <?php if($marksheet->final_status == 1){?>selected="selected"<?php }?>>Yes</option>
												<option value="0" <?php if($marksheet->final_status == 0){?>selected="selected"<?php }?>>No</option> 
											</select>
											<input type="hidden" name="marksheet" id="marksheet" value="<?=$marksheet->marksheet_number?>">
											<input type="hidden" name="result" id="result" value="<?=$marksheet->result_id?>">
										</div>
									</div>
									<div class="col-md-4">	 
										<div class="form-group">
											<label>Mode</label>
											<select class="form-control" name="display_mode" id="display_mode">
												<option value="">Select Mode</option>
												<option value="1" <?php if($marksheet->display_mode == 1){?>selected="selected"<?php }?>>Year</option>
												<option value="2" <?php if($marksheet->display_mode == 2){?>selected="selected"<?php }?>>Semester</option>
											</select>
										</div> 
									</div> 
									<div class="col-md-4">
										<div class="form-group">
											<label>Year/Sem</label>
											<select name="year_sem" id="year_sem" class="form-control">
											   <option value="">Select</option> 
											   <?php for($y=1;$y<=12;$y++){?>
											   <option value="<?=$y?>" <?php if($marksheet->year_sem == $y){?>selected="selected"<?php }?>><?=$y?></option>
											   <?php }?>                            
											 </select>
										</div>
									</div> 
									<div class="col-md-4">
										<div class="form-group">
											<label>Credit Transfer</label>
											<select name="credit_transfer" required id="credit_transfer" class="form-control">
											   <option value="">Select</option>  
											   <option value="0" <?php if($marksheet->credit_transfer == '0'){?>selected="selected"<?php }?>>No</option>
											   <option value="1" <?php if($marksheet->credit_transfer == '1'){?>selected="selected"<?php }?>>Yes</option>
											 </select>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Signature *</label>
											<select class="form-control" id="signature" name="signature">
												<option value="">Select Signature</option>
												<?php if(!empty($signature)){ foreach($signature as $signature_result){?>
												<option value="<?=$signature_result->id?>" <?php if(!empty($marksheet) && $marksheet->signature_id == $signature_result->id){?>selected="selcted"<?php } ?>><?=$signature_result->name?> <?=$signature_result->dispalay_signature?> </option>
												<?php }}?> 
											</select>
										</div> 
									</div>

								    <div class="col-md-4 credit_transfer_remark" style="<?php if($marksheet->credit_transfer == '0'){?>display:none;<?php }else if($marksheet->credit_transfer == '1'){?>display:block<?php }else{?>display:none;<?php }?>">
										<div class="form-group">
											<label>Credit Transfer Remark</label>
											<input type="text" name="remark" id="remark" placeholder="Remark" class="form-control" value="<?=$marksheet->remark;?>">
										</div>
									</div>
									<div class="col-md-12">					
										<div class="form-group">
											<label>&nbsp;</label>
											<input type="submit" class="btn btn-primary btn-sm" name="submit" id="submit" value="Edit Marksheet">
											<a href="<?=base_url();?>search_marksheet" class="btn btn-danger btn-sm">Cancel</a>
										</div>
									</div>
									</div>
							</form>	
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>
      
<?php include('footer.php');
$id = 0;
if($this->uri->segment(2) !=""){
	$id = $this->uri->segment(2);
}
?>
<script type="text/javascript">            
 
$(function(){
	$( ".datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd-mm-yy',

	});
} );

$("#marksheet").validate({
	rules: {
		marksheet_number	: "required", 
		result_declare_date	: "required",
		print_stream: "required",
		final_status	: "required",
		marksheet_issue_date: "required",
		display_mode: "required",
		year_sem: "required",
		credit_transfer: "required",
		signature :"required",
	},
	messages: {
		marksheet_status	: "Please select marksheet status",
		result_declare_date	: "Please select date",
		print_stream: "Please select print stream",
		final_status	: "Please select status",
		marksheet_issue_date: "Please select date",
		display_mode: "Please select mode",
		year_sem: "Please select year/sem",
		credit_transfer: "Please select credit transfer",
		signature :"Please select signature",
	},
	submitHandler: function(form) {		 
		form.submit();
	}
});

$('#credit_transfer').change(function(){
	if($('#credit_transfer').val() == '0'){
		$('.credit_transfer_remark').hide();
	}else if($('#credit_transfer').val() == '1'){
		$('.credit_transfer_remark').show();
	}else{
		$('.credit_transfer_remark').hide();
	}
});
</script>     