<?php

$host="localhost"; // Host name 
$username="healgvnf_reader"; // Mysql username 
$password="Raaso2016"; // Mysql password 
$db_name="healgvnf_health2"; // Database name 
$tbl_name="community_user"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
	// Register $myusername, $mypassword and redirect to file "login_success.php"
	/* session_register($myusername);
	session_register($mypassword);  */
	session_start(); 
	$_SESSION['user'] = $myusername; 
	header("location:https://health-connect.site/login_success.php");
}
else 
{
	echo 'Wrong Username or Password<br>';
	echo '<a href="https://health-connect.site/report_login.php">Try Again</a>';
}

?>