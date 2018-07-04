<!DOCTYPE html>
<html>
<head>
	<title>JMS</title>
</head>

<body>
	<center>
		<h3>Your payment is successful! <br>Please note your transaction ID for future reference: <label style="color: #f00"><?php echo $data['txnid'] ?></label></h3>
		<br>
		<a href="<?php echo base_url() ?>userhome">Go Home</a>
	</center>
</body>
</html>