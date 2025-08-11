<?php include('header.php');

if(empty($student)){

	redirect('transfer-certificate');

}

$session = array(

	'session_amount' => $student->amount,

	'transfer_order_id' 	=> $student->id,

);

$this->session->set_userdata($session);



?>

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

			<div class="container">

				<div class="row">	

					<div class="container">

						<div class="online_wrapper">

							<div class="col-md-12">

								<div class="card">

									<div class="card-header">

									  <h3 class="card-title"></h3>

									</div>

									<!-----Axis Bank Payment---->

				  

									<div class="card-body">

										<!--<form enctype="application/json" action="https://checkout.freecharge.in/api/v1/co/pay/init" id="searchForm" method="post">

											 <fieldset>

												<div><input type="hidden" id="merchantId" value="<?= $req['merchantId']?>" name="merchantId"></div>

												<div><input type="hidden" id="merchantTxnId" value="<?= $req['merchantTxnId']?>" name="merchantTxnId" ></div>

												<div><input type="hidden" id="amount" value="<?= $req['amount']?>" name="amount"></div>

												<div><input type="hidden" id="currency" name="currency" value="<?= $req['currency']?>"></div>

												<div><input type="hidden" id="furl" name="furl" value="<?= $req['furl']?>"></div>

												<div><input type="hidden" id="surl" name="surl" value="<?= $req['surl']?>"></div>

												<div><input type="hidden" id="checksum" name="checksum" value="<?=$checksum?>"></div>

												<div><input type="hidden" id="email" name="email" value="<?= $req['email']?>"></div>

												<div><input type="hidden" id="mobile" name="mobile"  value="<?= $req['mobile']?>"></div>

												<div><input type="hidden" id="customerName" value="<?= $req['customerName']?>" name="customerName"></div>

												<div><input type="hidden" id="customNote" name="customNote" value="<?= $req['customNote']?>"></div>

												<div><input type="hidden" id="channel" name="channel" value="<?= $req['channel']?>" ></div>

											 </fieldset>

											<div class="col-lg-12">

												<div class="btn_center" style="width: 175px;margin: 25px auto 0px;">

													<button id="checkout" class="btn signin btn-primary">Pay Via Freecharge</button> 

												</div>

											</div>Arunachal Pradesh

											<p id="msg"></p>

										</form>-->

										<form method="post" name="customerData" action="<?=base_url();?>student_transfer_ccavRequestHandler">

											<div class="row">

												<div class="col-lg-12">

													<div class="btn_center" style="width: 175px;margin: 25px auto 0px;">

														<button type="submit" class="btn btn-primary" value="CheckOut">Pay Via CC Avenue</button>

													</div>

												</div>

											</div>

											<table width="40%" height="100" border='1' align="center"><caption><font size="4" color="blue"></font></caption></table>

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

													<td>Merchant Id	:</td><td><input type="text" name="merchant_id" value="266775"/></td>

												</tr>

												<tr>

													<td>Order Id	:</td><td><input type="text" name="order_id" value="<?=$student->id?>"/></td>

												</tr>

												<tr>

													<td>Amount	:</td><td><input type="text" name="amount" value="<?=$student->amount?>.00"/></td>

												</tr>

												<tr>

													<td>Currency	:</td><td><input type="text" name="currency" value="INR"/></td>

												</tr>

												<tr>

													<td>Redirect URL	:</td><td><input type="text" name="redirect_url" value="<?=base_url();?>student_transfer_ccavResponseHandler"/></td>

												</tr>

												<tr>

													<td>Cancel URL	:</td><td><input type="text" name="cancel_url" value="<?=base_url();?>student_transfer_ccavResponseHandler"/></td>

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

													<td>Billing City	:</td><td><input type="text" name="billing_city" value="Manipur"/></td>

												</tr>

												<tr>

													<td>Billing State	:</td><td><input type="text" name="billing_state" value="MP"/></td>

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

													<td>Shipping Name	:</td><td><input type="text" name="delivery_name" value="Chaplin"/></td>

												</tr>

												<tr>

													<td>Shipping Address	:</td><td><input type="text" name="delivery_address" value="room no.701 near bus stand"/></td>

												</tr>

												<tr>

													<td>shipping City	:</td><td><input type="text" name="delivery_city" value="Hyderabad"/></td>

												</tr>

												<tr>

													<td>shipping State	:</td><td><input type="text" name="delivery_state" value="Andhra"/></td>

												</tr>

												<tr>

													<td>shipping Zip	:</td><td><input type="text" name="delivery_zip" value="425001"/></td>

												</tr>

												<tr>

													<td>shipping Country	:</td><td><input type="text" name="delivery_country" value="India"/></td>

												</tr>

												<tr>

													<td>Shipping Tel	:</td><td><input type="text" name="delivery_tel" value="9876543210"/></td>

												</tr>

												<tr>

													<td>Merchant Param1	:</td><td><input type="text" name="merchant_param1" value="additional Info."/></td>

												</tr>

												<tr>

													<td>Merchant Param2	:</td><td><input type="text" name="merchant_param2" value="additional Info."/></td>

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

									<!-- /.card-body -->

								</div>

								<!-- /.card -->

							</div>

							<!-- /.card-body -->

						</div>

						<!-- /.card -->

					</div>

					<!-- /.col -->

				</div>

			  <!-- /.row -->

			</div>

			<!-- /.content -->

		</div>

	</div>

   </div>

</div>

<?php include('footer.php');?>

<!-- <script language="javascript" type="text/javascript" src="json.js"></script>-->

<!-- <script src="jquery-1.7.2.min.js"></script>-->

 <script language="javascript" type="text/javascript" src="<?=base_url();?>back_panel/js/json.js"></script>

 <script src="<?=base_url();?>js/jquery-1.7.2.min.js"></script>

<script type="text/javascript">

  $(function(){

  

	 /* json object contains

	 	1) payOptType - Will contain payment options allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.

	 	2) cardType - Will contain card type allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.

	 	3) cardName - Will contain name of card. E.g. Visa, MasterCard, American Express or and bank name in case of Net banking. 

	 	4) status - Will help in identifying the status of the payment mode. Options may include Active or Down.

	 	5) dataAcceptedAt - It tell data accept at CCAvenue or Service provider

	 	6)error -  This parameter will enable you to troubleshoot any configuration related issues. It will provide error description.

	 */	  

  	  var jsonData;

  	  var access_code="AVVM67DI04BP90MVPB" // shared by CCAVENUE 

	  var amount="<?=$req['amount']?>";

	//   var amount="1.00";

  	  var currency="INR";

  	  

      $.ajax({

           url:'https://secure.ccavenue.com/transaction/transaction.do?command=getJsonData&access_code='+access_code+'&currency='+currency+'&amount='+amount,

           dataType: 'jsonp',

           jsonp: false,

           jsonpCallback: 'processData',

           success: function (data) { 

                 jsonData = data;

                 // processData method for reference

                 processData(data); 

		 // get Promotion details

                 $.each(jsonData, function(index,value) {

			if(value.Promotions != undefined  && value.Promotions !=null){  

				var promotionsArray = $.parseJSON(value.Promotions);

		               	$.each(promotionsArray, function() {

					console.log(this['promoId'] +" "+this['promoCardName']);	

					var	promotions=	"<option value="+this['promoId']+">"

					+this['promoName']+" - "+this['promoPayOptTypeDesc']+"-"+this['promoCardName']+" - "+currency+" "+this['discountValue']+"  "+this['promoType']+"</option>";

					$("#promo_code").find("option:last").after(promotions);

				});

			}

		});

           },

           error: function(xhr, textStatus, errorThrown) {

               alert('An error occurred! ' + ( errorThrown ? errorThrown :xhr.status ));

               //console.log("Error occured");

           }

   		});

   		

   		$(".payOption").click(function(){

   			var paymentOption="";

   			var cardArray="";

   			var payThrough,emiPlanTr;

		    var emiBanksArray,emiPlansArray;

   			

           	paymentOption = $(this).val();

           	$("#card_type").val(paymentOption.replace("OPT",""));

           	$("#card_name").children().remove(); // remove old card names from old one

            $("#card_name").append("<option value=''>Select</option>");

           	$("#emi_div").hide();

           	

           	//console.log(jsonData);

           	$.each(jsonData, function(index,value) {

           		//console.log(value);

            	  if(paymentOption !="OPTEMI"){

	            	 if(value.payOpt==paymentOption){

	            		cardArray = $.parseJSON(value[paymentOption]);

	                	$.each(cardArray, function() {

	    	            	$("#card_name").find("option:last").after("<option class='"+this['dataAcceptedAt']+" "+this['status']+"'  value='"+this['cardName']+"'>"+this['cardName']+"</option>");

	                	});

	                 }

	              }

	              

	              if(paymentOption =="OPTEMI"){

		              if(value.payOpt=="OPTEMI"){

		              	$("#emi_div").show();

		              	$("#card_type").val("CRDC");

		              	$("#data_accept").val("Y");

		              	$("#emi_plan_id").val("");

						$("#emi_tenure_id").val("");

						$("span.emi_fees").hide();

		              	$("#emi_banks").children().remove();

		              	$("#emi_banks").append("<option value=''>Select your Bank</option>");

		              	$("#emi_tbl").children().remove();

		              	

	                    emiBanksArray = $.parseJSON(value.EmiBanks);

	                    emiPlansArray = $.parseJSON(value.EmiPlans);

	                	$.each(emiBanksArray, function() {

	    	            	payThrough = "<option value='"+this['planId']+"' class='"+this['BINs']+"' id='"+this['subventionPaidBy']+"' label='"+this['midProcesses']+"'>"+this['gtwName']+"</option>";

	    	            	$("#emi_banks").append(payThrough);

	                	});

	                	

	                	emiPlanTr="<tr><td>&nbsp;</td><td>EMI Plan</td><td>Monthly Installments</td><td>Total Cost</td></tr>";

							

	                	$.each(emiPlansArray, function() {

		                	emiPlanTr=emiPlanTr+

							"<tr class='tenuremonth "+this['planId']+"' id='"+this['tenureId']+"' style='display: none'>"+

								"<td> <input type='radio' name='emi_plan_radio' id='"+this['tenureMonths']+"' value='"+this['tenureId']+"' class='emi_plan_radio' > </td>"+

								"<td>"+this['tenureMonths']+ "EMIs. <label class='merchant_subvention'>@ <label class='emi_processing_fee_percent'>"+this['processingFeePercent']+"</label>&nbsp;%p.a</label>"+

								"</td>"+

								"<td>"+this['currency']+"&nbsp;"+this['emiAmount'].toFixed(2)+

								"</td>"+

								"<td><label class='currency'>"+this['currency']+"</label>&nbsp;"+ 

									"<label class='emiTotal'>"+this['total'].toFixed(2)+"</label>"+

									"<label class='emi_processing_fee_plan' style='display: none;'>"+this['emiProcessingFee'].toFixed(2)+"</label>"+

									"<label class='planId' style='display: none;'>"+this['planId']+"</label>"+

								"</td>"+

							"</tr>";

						});

						$("#emi_tbl").append(emiPlanTr);

	                 } 

                  }

           	});

           	

         });

   

	  

      $("#card_name").click(function(){

      	if($(this).find(":selected").hasClass("DOWN")){

      		alert("Selected option is currently unavailable. Select another payment option or try again later.");

      	}

      	if($(this).find(":selected").hasClass("CCAvenue")){

      		$("#data_accept").val("Y");

      	}else{

      		$("#data_accept").val("N");

      	}

      });

          

     // Emi section start      

          $("#emi_banks").live("change",function(){

	           if($(this).val() != ""){

	           		var cardsProcess="";

	           		$("#emi_tbl").show();

	           		cardsProcess=$("#emi_banks option:selected").attr("label").split("|");

					$("#card_name").children().remove();

					$("#card_name").append("<option value=''>Select</option>");

				    $.each(cardsProcess,function(index,card){

				        $("#card_name").find("option:last").after("<option class=CCAvenue value='"+card+"' >"+card+"</option>");

				    });

					$("#emi_plan_id").val($(this).val());

					$(".tenuremonth").hide();

					$("."+$(this).val()+"").show();

					$("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().attr("checked",true);

					$("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().trigger("click");

					 

					 if($("#emi_banks option:selected").attr("id")=="Customer"){

						$("#processing_fee").show();

					 }else{

						$("#processing_fee").hide();

					 }

					 

				}else{

					$("#emi_plan_id").val("");

					$("#emi_tenure_id").val("");

					$("#emi_tbl").hide();

				}

				

				

				

				$("label.emi_processing_fee_percent").each(function(){

					if($(this).text()==0){

						$(this).closest("tr").find("label.merchant_subvention").hide();

					}

				});

				

		 });

		 

		 $(".emi_plan_radio").live("click",function(){

			var processingFee="";

			$("#emi_tenure_id").val($(this).val());

			processingFee=

					"<span class='emi_fees' >"+

			 			"Processing Fee:"+$(this).closest('tr').find('label.currency').text()+"&nbsp;"+

			 			"<label id='processingFee'>"+$(this).closest('tr').find('label.emi_processing_fee_plan').text()+

			 			"</label><br/>"+

                			"Processing fee will be charged only on the first EMI."+

                	"</span>";

             $("#processing_fee").children().remove();

             $("#processing_fee").append(processingFee);

             

             // If processing fee is 0 then hiding emi_fee span

             if($("#processingFee").text()==0){

             	$(".emi_fees").hide();

             }

			  

		});

		

		

		$("#card_number").focusout(function(){

			/*

			 emi_banks(select box) option class attribute contains two fields either allcards or bin no supported by that emi 

			*/ 

			if($('input[name="payment_option"]:checked').val() == "OPTEMI"){

				if(!($("#emi_banks option:selected").hasClass("allcards"))){

				  if(!$('#emi_banks option:selected').hasClass($(this).val().substring(0,6))){

					  alert("Selected EMI is not available for entered credit card.");

				  }

			   }

		   }

		  

		});

			

			

	// Emi section end 		

   

   

   // below code for reference 

 

   function processData(data){

         var paymentOptions = [];

         var creditCards = [];

         var debitCards = [];

         var netBanks = [];

         var cashCards = [];

         var mobilePayments=[];

         $.each(data, function() {

         	 // this.error shows if any error   	

             console.log(this.error);

              paymentOptions.push(this.payOpt);

              switch(this.payOpt){

                case 'OPTCRDC':

                	var jsonData = this.OPTCRDC;

                 	var obj = $.parseJSON(jsonData);

                 	$.each(obj, function() {

                 		creditCards.push(this['cardName']);

                	});

                break;

                case 'OPTDBCRD':

                	var jsonData = this.OPTDBCRD;

                 	var obj = $.parseJSON(jsonData);

                 	$.each(obj, function() {

                 		debitCards.push(this['cardName']);

                	});

                break;

              	case 'OPTNBK':

	              	var jsonData = this.OPTNBK;

	                var obj = $.parseJSON(jsonData);

	                $.each(obj, function() {

	                 	netBanks.push(this['cardName']);

	                });

                break;

                

                case 'OPTCASHC':

                  var jsonData = this.OPTCASHC;

                  var obj =  $.parseJSON(jsonData);

                  $.each(obj, function() {

                  	cashCards.push(this['cardName']);

                  });

                 break;

                   

                  case 'OPTMOBP':

                  var jsonData = this.OPTMOBP;

                  var obj =  $.parseJSON(jsonData);

                  $.each(obj, function() {

                  	mobilePayments.push(this['cardName']);

                  });

              }

              

            });

           

           //console.log(creditCards);

          // console.log(debitCards);

          // console.log(netBanks);

          // console.log(cashCards);

         //  console.log(mobilePayments);

            

      }

  });



$("#checkout").trigger("click");

</script>

</html>

