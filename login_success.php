<?php
	session_start();
	
	if(!empty($_SESSION['user']))
	{
		header("location:https://health-connect.site/database.php");
 	}
	else
	{
		header("location:https://health-connect.site/report_login.php");
	}
?>

<html>
<body>
Login Successful
</body>
</html>