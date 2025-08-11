<html>
	<head>
		<title> Payment Gateway</title>
	</head>
	<body>
		<center> 
		<?php include('Crypto.php'); 
			error_reporting(0); 
			$merchant_data= CCMERCHANT;
			$working_key= CCWORKINGCODE;
			$access_code= CCACCESSCODE; 
			foreach ($_POST as $key => $value){
				$merchant_data.=$key.'='.$value.'&';
			} 
			$encrypted_data=encrypt($merchant_data,$working_key);  
		?>
		<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
		<?php
		echo "<input type=hidden name=encRequest value=$encrypted_data>";
		echo "<input type=hidden name=access_code value=$access_code>";
		?>
		</form>
		</center>
		<script language='javascript'>document.redirect.submit();</script>
	</body>
</html>

