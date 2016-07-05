<?php 
	session_start();
	unset($_SESSION['user']); 
	session_destroy();
	
	header("location:https://health-connect.site/report_login.php");
?>