<?php
include('Authentication.php');
$encData = null;
$clientCode = CLIENT_CODE;
$username = USER_NAME;
$password = PASS;
$authKey = AUTH_KEY;
$authIV = AUTH_IV;
$order_id=$_POST['order_id'];
// echo"<pre>";print_r($order_id);exit;
$payerName = $_POST['billing_name'];
$payerEmail = $_POST['billing_email'];
$payerMobile = $_POST['billing_tel'];
$payerAddress = $_POST['delivery_address'].' '.$_POST['delivery_city'].' '.$_POST['delivery_state'].' '.$_POST['delivery_zip']."___".$order_id;

$clientTxnId = rand(1000, 9999);
$amount = $_POST['amount'];
// $amount = 50;
$amountType = 'INR';
$mcc = 5137;
$channelId = 'W';
$callbackUrl = $_POST['redirect_url'];

$encData = "?clientCode=" . $clientCode . "&transUserName=" . $username . "&transUserPassword=" . $password . "&payerName=" . $payerName .
	"&payerMobile=" . $payerMobile . "&payerEmail=" . $payerEmail . "&payerAddress=" . $payerAddress . "&clientTxnId=" . $clientTxnId .
	"&amount=" . $amount . "&amountType=" . $amountType . "&mcc=" . $mcc . "&channelId=" . $channelId . "&callbackUrl=" . $callbackUrl;
//."&udf1=".$Class."&udf2=".$Roll;

$AesCipher = new AesCipher();
$data = $AesCipher->encrypt($authKey, $authIV, $encData); 
?>
<html>

<head>
	<title> Custom Form Kit </title>
</head>

<body>
	<center>
		<!--<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction">--> 
		<form method="post" name="redirect" action="<?=subpay_link?>">
		<!--<form method="post" name="redirect" action="https://securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1">-->
			<input type="hidden" name="encData" value="<?php echo $data ?>" id="frm1">
			<input type="hidden" name="clientCode" value="<?php echo $clientCode ?>" id="frm2">
		</form>
	</center>
	<script language='javascript'>
		document.redirect.submit();
	</script>
</body>

</html>








