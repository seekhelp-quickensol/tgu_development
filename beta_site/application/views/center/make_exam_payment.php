<?php include('header.php');
if(empty($student)){	
	redirect('center_examination_form');
}
$session = array(	
	'session_amount' 	=> $fees->amount,	
	'order_id' 			=> $fees->id,
);
$this->session->set_userdata($session);?>
<script>	
window.onload = function() {		
	var d = new Date().getTime();		
	document.getElementById("tid").value = d;	
};
</script>	
<div class="container-fluid page-body-wrapper">		
	<div class="main-panel">			
		<div class="content-wrapper">				
			<div class="row">					
				<div class="col-md-12 col-md-offset-2 grid-margin stretch-card">						
				<div class="card">														
				<form method="post" name="customerData" action="<?=base_url();?>ccavRequestHandler">								
				<div class="row">									
					<div class="col-lg-12">										
						<div class="btn_center" style="width: 175px;margin: 25px auto 0px;">											
							<button type="submit" class="btn btn-primary" value="CheckOut">Click to Pay</button>										
							</div>									
						</div>								
					</div>								
					<table width="40%" height="100" border='1' align="center">
						<caption><font size="4" color="blue"></font></caption>
					</table>								
					<table width="40%" height="100" border='1' align="center" style="display:none;">									
						<tr>										
							<td>Parameter Name:</td><td>Parameter Value:</td>									
						</tr>									
						<tr>										
							<td colspan="2"> Compulsory information</td>									
						</tr>									
						<tr>										
							<td>TID	:</td><td><input type="text" name="tid" id="tid" readonly /></td>	
						</tr>									
						<tr>										
							<td>Merchant Id	:</td><td><input type="text" name="merchant_id" value="<?=CCMERCHANT?>"/></td>									
						</tr>									
						<tr>										
							<td>Order Id	:</td><td><input type="text" name="order_id" value="<?=$fees->id?>"/></td>									
						</tr>									
						<tr>										
							<td>Amount	:</td><td><input type="text" name="amount" value="<?=$fees->amount?>.00"/></td>									
						</tr>									
						<tr>										
							<td>Currency	:</td><td><input type="text" name="currency" value="INR"/></td>									
						</tr>									
						<tr>										
							<td>Redirect URL	:</td><td><input type="text" name="redirect_url" value="<?=base_url();?>ccavResponseHandler"/></td>		
						</tr>									
						<tr>										
							<td>Cancel URL	:</td><td><input type="text" name="cancel_url" value="<?=base_url();?>ccavResponseHandler"/></td>	
						</tr>									
						<tr>										
							<td>Language	:</td><td><input type="text" name="language" value="EN"/></td>									
						</tr>									
						<tr>										
							<td colspan="2">Billing information(optional):</td>									
						</tr>									
						<tr>										
							<td>Billing Name	:</td><td><input type="text" name="billing_name" value="<?=$student->student_name?>"/></td>									
						</tr>									
						<tr>										
							<td>Billing Address	:</td><td><input type="text" name="billing_address" value="<?=$student->address?>"/></td>									
						</tr>									
						<tr>										
							<td>Billing City	:</td><td><input type="text" name="billing_city" value="<?=$student->city_name?>"/></td>									
						</tr>									
						<tr>										
							<td>Billing State	:</td><td><input type="text" name="billing_state" value="<?=$student->state_name?>"/></td>									
						</tr>									
						<tr>										
							<td>Billing Zip	:</td><td><input type="text" name="billing_zip" value="<?=$student->pincode?>"/></td>									
						</tr>									
						<tr>										
							<td>Billing Country	:</td><td><input type="text" name="billing_country" value="India"/></td>									
						</tr>									
						<tr>										
							<td>Billing Tel	:</td><td><input type="text" name="billing_tel" value="<?=$student->mobile?>"/></td>									
						</tr>									
						<tr>										
							<td>Billing Email	:</td><td><input type="text" name="billing_email" value="<?=$student->email?>"/></td>									
						</tr>									
						<tr>										
							<td colspan="2">Shipping information(optional)</td>									
						</tr>									
						<tr>										
							<td>Shipping Name	:</td><td><input type="text" name="delivery_name" value="<?=$student->student_name?>"/></td>									
						</tr>									
						<tr>										
							<td>Shipping Address	:</td><td><input type="text" name="delivery_address" value="<?=$student->address?>"/></td>		
						</tr>									
						<tr>										
							<td>shipping City	:</td><td><input type="text" name="delivery_city" value="<?=$student->city_name?>"/></td>									
						</tr>									
						<tr>										
							<td>shipping State	:</td><td><input type="text" name="delivery_state" value="<?=$student->state_name?>"/></td>									
						</tr>									
						<tr>										
							<td>shipping Zip	:</td><td><input type="text" name="delivery_zip" value="<?=$student->pincode?>"/></td>									
						</tr>									
						<tr>										
							<td>shipping Country	:</td><td><input type="text" name="delivery_country" value="India"/></td>								
						</tr>									
						<tr>										
							<td>Shipping Tel	:</td><td><input type="text" name="delivery_tel" value="<?=$student->pincode?>"/></td>									
						</tr>									
						<tr>										
							<td>Merchant Param1	:</td><td><input type="text" name="merchant_param1" value="The Global University"/></td>									
						</tr>									
						<tr>										
							<td>Merchant Param2	:</td><td><input type="text" name="merchant_param2" value="tbl_examination_form"/></td>									
						</tr>
						<tr>
							<td>Merchant Param3	:</td><td><input type="text" name="merchant_param3" value="additional Info."/></td>									
						</tr>									
						<tr>										
							<td>Merchant Param4	:</td><td><input type="text" name="merchant_param4" value="additional Info."/></td>									
						</tr>									
						<tr>										
							<td>Merchant Param5	:</td><td><input type="text" name="merchant_param5" value="additional Info."/></td>									
						</tr>									
						<tr>										
							<td>Promo Code	:</td><td><input type="text" name="promo_code" value=""/></td>									
						</tr>									
						<tr>										
							<td>Vault Info.	:</td><td><input type="text" name="customer_identifier" value=""/></td>									
						</tr>									
						<tr>										
							<td>Integration Type	:</td><td><input type="text" name="integration_type" value="iframe_normal"/></td>								
						</tr>									
						<tr>										
							<td></td><td></td>									
						</tr>								
					</table>							
				</form>
				</div>		
			</div>								
		</div>					
	</div>			
	</div>    
	</div>
	<?php include('footer.php');?>
	